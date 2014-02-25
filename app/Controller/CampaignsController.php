<?php
App::uses('AppController', 'Controller');
/**
 * Campaigns Controller
 *
 * @property Campaign $Campaign
 */
class CampaignsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {            
		$this->Campaign->recursive = 0;
		$this->set('campaigns', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Campaign->id = $id;
		if (!$this->Campaign->exists()) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		$this->set('campaign', $this->Campaign->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    if( !empty($this->request->data['Campaign']['xls_file']) ){
                        //pr($this->request->data);exit;
                        $this->request->data['Campaign']['start_date'] = $this->request->data['Campaign']['start_date'].' 00:00:00';
                        $this->request->data['Campaign']['end_date'] = $this->request->data['Campaign']['end_date'].' 00:00:00';

                        $this->request->data['CampaignDetail'] = $this->_import_house_target();
                        
                        if( !isset($this->request->data['CampaignDetail']['error']) ){
                            
                            unset($this->request->data['Campaign']['xls_file']);

                            if($this->Campaign->check_total($this->request->data)){
                                //pr($this->data);exit;
                                $this->Campaign->create();
                                if ($this->Campaign->saveAssociated($this->request->data)) {  

                                    //setting regionwise target
                                    $this->Campaign->Achievement->set_region_target($this->request->data, $this->Campaign->id);

                                        $this->Session->setFlash(__('The campaign has been saved'));
                                        $this->redirect(array('action' => 'index'));
                                } else {
                                        $this->Session->setFlash(__('The campaign could not be saved. Please, try again.'));
                                }
                            }else{
                                $this->Session->setFlash(__('Save Failed! Total target and sum of houses target are not equal.'));
                            }
                        }else{
                            $this->Session->setFlash(__($this->request->data['CampaignDetail']['error']));
                        }
                    }else{
                        $this->Session->setFlash(__('You have not selected any file to upload.'));
                    }
		}
                $this->set('houses',$this->Campaign->CampaignDetail->House->house_list(null));
	}
        
        /**
         * 
         */
        protected function _import_house_target(){            
            
            $campaignDetails = array();
            
            $renamed_f_name = time().$this->request->data['Campaign']['xls_file']['name'];
            if( move_uploaded_file($this->request->data['Campaign']['xls_file']['tmp_name'], WWW_ROOT.$renamed_f_name) ){

                App::import('Vendor','PHPExcel',array('file' => 'PHPExcel/Classes/PHPExcel.php'));
            
                //here i used microsoft excel 2007
                $objReader = PHPExcel_IOFactory::createReader('Excel2007');
                //set to read only
                $objReader->setReadDataOnly(true);
                //load excel file
                $objPHPExcel = $objReader->load($renamed_f_name);
                $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

                $totalRow = $objPHPExcel->getActiveSheet()->getHighestRow();

                //pr($totalRow);
                
                $j = 0;

                for($i=2; $i<=$totalRow; $i++){                
                    $regionTitle = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                    $areaTitle = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
                    $houseTitle = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                    
                    $regId = $this->Campaign->CampaignDetail->House->Area->Region->field('id',array(
                        'title' =>$regionTitle));
                    if( $regId ){
                        $areaId = $this->Campaign->CampaignDetail->House->Area->field('id',array(
                            'title' => $areaTitle,'region_id' => $regId
                        ));
                        if( $areaId ){
                            $houseId = $this->Campaign->CampaignDetail->House->field('id',array(
                                'title' => $houseTitle,'area_id' => $areaId
                            ));  
                            //echo $regionTitle.' '.$areaTitle.' '.$houseTitle.' '.$regId.' '.$areaId.' '.$houseId.'<br/>';
                            if( $houseId ){                        
                                $campaignDetails[$j]['house_id'] = $houseId;
                                $campaignDetails[$j]['house_target'] = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
                                $j++;
                            }else{
                                $campaignDetails['error'] = 'Invalid house found! '.$houseTitle.' is not an existing house!';
                                break;
                            }
                        }else{
                            $campaignDetails['error'] = 'Invalid area found! '.$areaTitle.' is not an existing area.';
                            break;
                        }
                    }else{
                        $campaignDetails['error'] = 'Invalid region found! '.$regionTitle.' is not an existing region.';
                        break;
                    }
                }
            }else{
                $campaignDetails['error'] = 'File upload failed! Please try again.';
            }
            return $campaignDetails;
        }
        

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Campaign->id = $id;
		if (!$this->Campaign->exists()) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
                    //pr($this->data);exit;
                    if($this->Campaign->check_total($this->request->data)){
                        
                        if( strpos($this->request->data['Campaign']['start_date'], ' 00:00:00')===false ){
                            $this->request->data['Campaign']['start_date'] = $this->data['Campaign']['start_date'].' 00:00:00';
                        }
                        if( strpos($this->request->data['Campaign']['end_date'], ' 00:00:00')===false ){
                            $this->request->data['Campaign']['end_date'] = $this->data['Campaign']['end_date'].' 00:00:00';
                        }
                        
			if ($this->Campaign->saveAssociated($this->request->data)) {
                            
                            $this->Campaign->Achievement->update_region_target($this->request->data, $id);
				$this->Session->setFlash(__('The campaign has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campaign could not be saved. Please, try again.'));
			}
                    }else{
                        $this->Session->setFlash(__('Save Failed! Total target and sum of houses target are not equal.'));
                    }
		}
                $this->Campaign->Behaviors->load('Containable');
                $this->request->data = $this->Campaign->find('first',array('contain' => array(
                    'CampaignDetail' => array(
                        'fields' => array('id','house_id','house_target', 'house_achieved', 'house_feedback_target'),
                        'House' => array('title')
                    )),
                    'conditions' => array('Campaign.id' => $id)));
                    //pr($this->request->data);
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Campaign->id = $id;
		if (!$this->Campaign->exists()) {
			throw new NotFoundException(__('Invalid campaign'));
		}
		if ($this->Campaign->delete()) {
			$this->Session->setFlash(__('Campaign deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Campaign was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        /**
         * 
         */
        public function set_time( $id ){
            if( $this->request->is('post') || $this->request->is('put') ){
                
                $this->request->data['Campaign']['start_time'] = $this->request->data['Campaign']['start_time_hour'] .':'. $this->request->data['Campaign']['start_time_min'];
                $this->request->data['Campaign']['end_time'] = $this->request->data['Campaign']['end_time_hour'] .':'. $this->request->data['Campaign']['end_time_min'];
                
                unset($this->request->data['Campaign']['start_time_hour']);
                unset($this->request->data['Campaign']['start_time_min']);
                unset($this->request->data['Campaign']['end_time_hour']);
                unset($this->request->data['Campaign']['end_time_min']);
                
                if( $this->Campaign->save($this->request->data) ){
                    $this->Session->setFlash(__('Time has been set'));
                    $this->redirect(array('action' => 'index'));
                }else{
                    $this->Session->setFlash(__('Time set has been failed!'));
                }
            }
            $this->request->data = $this->Campaign->find('first',array('conditions' => 
                array('Campaign.id' => $id), 'recursive' => -1));     
            if( !empty($this->request->data) ){
                
                $this->request->data['Campaign']['start_time_hour'] = substr($this->data['Campaign']['start_time'], 0, 2);
                $this->request->data['Campaign']['start_time_min'] = substr($this->data['Campaign']['start_time'], 3, 2);
                $this->request->data['Campaign']['end_time_hour'] = substr($this->data['Campaign']['end_time'], 0, 2);
                $this->request->data['Campaign']['end_time_min'] = substr($this->data['Campaign']['end_time'], 3, 2);
            }
        }
}
