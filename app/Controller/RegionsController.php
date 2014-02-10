<?php
App::uses('AppController', 'Controller');
set_time_limit ( 1600 );
/**
 * Regions Controller
 *
 * @property Region $Region
 */
class RegionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	
	public function index() {            
            $this->Region->recursive = 0;
            $this->set('regions', $this->paginate());
	}        
        
        /**
         * 
         */
        public function import_data(){
            if( $this->request->is('post') ){
                if( !empty($this->request->data['Region']['xls_file']) ){
                    if( $this->request->data['Region']['xls_file']['error']==0){
                        $renamed_f_name = time().$this->request->data['Region']['xls_file']['name'];
                        if( move_uploaded_file($this->request->data['Region']['xls_file']['tmp_name'], WWW_ROOT.$renamed_f_name) ){
                        	
                            if( $this->_import($renamed_f_name) ){
                            	
                                $this->Session->setFlash(__('Data import successful.'));
                            }else{
                                $this->Session->setFlash(__('Data import failed!'));
                            }
                        }else{
                            $this->Session->setFlash(__('File upload failed! Please try again.'));
                        }
                    }else{
                        $this->Session->setFlash(__('Your given file is corrupted! Please try with valid file.'));
                    }
                }else{
                    $this->Session->setFlash(__('You have not selected any file to upload.'));
                }
            }
        }
        
        
        /**
         * 
         */
        protected function _import( $xlName ){
            App::import('Vendor','PHPExcel',array('file' => 'PHPExcel/Classes/PHPExcel.php'));
            
            //here i used microsoft excel 2007
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            //set to read only
            $objReader->setReadDataOnly(true);
            //load excel file
            $objPHPExcel = $objReader->load($xlName);
            $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
            
            $totalRow = $objPHPExcel->getActiveSheet()->getHighestRow();
            
            //pr($totalRow);
            
            for($i=2; $i<=$totalRow; $i++){                
                $region['Region']['title'] = trim($objWorksheet->getCellByColumnAndRow(6,$i)->getValue());
                $regId = $this->_save_region( $region );
                
                $area['Area']['region_id'] = $regId;
                $area['Area']['title'] = trim($objWorksheet->getCellByColumnAndRow(5,$i)->getValue());
                $areaId = $this->_save_area( $area );
                
                $house['House']['area_id'] = $areaId;                
                $house['House']['title'] = trim($objWorksheet->getCellByColumnAndRow(4,$i)->getValue());
                $houseId = $this->_save_house($house);
                
                $sup['Representative']['house_id'] = $houseId;
                $sup['Representative']['name'] = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
                $sup['Representative']['superviser_name'] = $sup['Representative']['name'];
                $sup['Representative']['superviser_id'] = 0;
                $sup['Representative']['br_code'] = '';
                $sup['Mobile'] = $this->_get_mobile_nos( $objWorksheet->getCellByColumnAndRow(3,$i)->getValue() );
                $supId = $this->_save_representative( $sup );
                
                //echo '<pre>';print_r($sup);
                
                $br['Representative']['house_id'] = $houseId;
                $br['Representative']['name'] = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
                $br['Representative']['superviser_id'] = $supId;
                $br['Representative']['superviser_name'] = $sup['Representative']['name'];
                $br['Representative']['br_code'] = trim($objWorksheet->getCellByColumnAndRow(1,$i)->getValue());
                $brId = $this->_save_representative( $br );                
            }
            return true;
        }
        
        /**
         * 
         * Enter description here ...
         * @param unknown_type $mb_nos
         */
        protected function _get_mobile_nos( $mb_nos ){
            $mobiles = array();
            $i = 0;
            $tok = strtok( $mb_nos, " ,\s\t\/");                

            while( $tok !== false ){
                    if( substr($tok, 0, 2) != '88' ){
                            $tok = '88'.$tok;
                    }
                    $mobiles[$i]['mobile_no'] = $tok;        		
                    $tok = strtok(" ,\s\t\/");                 
                    $i++;
            }                
            return $mobiles;        	
        } 
        
        
        /**
         * 
         * Enter description here ...
         * @param unknown_type $region
         */
        protected function _save_region( $region ){
            $rgId = $this->Region->field('id',array('title' => $region['Region']['title']));
            if( $rgId ) return $rgId;
            $this->Region->create();
            $this->Region->save($region);
            return $this->Region->id;
        }
        
        /**
         * 
         * Enter description here ...
         * @param unknown_type $area
         */
	protected function _save_area( $area ){
            $arId = $this->Region->Area->field('id',array('Area.region_id' => $area['Area']['region_id'],
                'Area.title' => $area['Area']['title']));
            
            if( $arId ) return $arId;
            
            $this->Region->Area->create();
            $this->Region->Area->save($area);
            return $this->Region->Area->id;        	
        }
        
        /**
         * 
         * Enter description here ...
         */
	protected function _save_house( $house ){
            $hsId = $this->Region->Area->House->field('id',array('House.area_id' => $house['House']['area_id'],
                'House.title' => $house['House']['title']));
            
            if( $hsId ) return $hsId;
            $this->Region->Area->House->create();
            $this->Region->Area->House->save($house);
            return $this->Region->Area->House->id;
        }
        
        /**
         * 
         * Enter description here ...
         */
	protected function _save_representative( $rep ){ 
            
            if( isset($rep['Mobile']) && !empty($rep['Mobile']) ){
            
                $inMob = array();
                foreach( $rep['Mobile'] as $mb ){
                    $inMob[] = $mb['mobile_no'];
                }

                $rpttvs = $this->Region->Area->House->Representative->Mobile->find('all',array('conditions' =>
                    array('Mobile.mobile_no' => $inMob), 'recursive' => -1));
                
                //echo '<pre>';print_r($rpttvs);

                if( count($rpttvs)>0 ){
                    return $rpttvs[0]['Mobile']['representative_id'];
                }
            }
            $this->Region->Area->House->Representative->create();
            $this->Region->Area->House->Representative->saveAssociated($rep);
            return $this->Region->Area->House->Representative->id;
        }
	


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		$options = array('conditions' => array('Region.' . $this->Region->primaryKey => $id));
		$this->set('region', $this->Region->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Region->create();
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The region has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The region could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Region->save($this->request->data)) {
				$this->Session->setFlash(__('The region has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The region could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Region.' . $this->Region->primaryKey => $id));
			$this->request->data = $this->Region->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid region'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Region->delete()) {
			$this->Session->setFlash(__('Region deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Region was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
