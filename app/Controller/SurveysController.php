<?php

App::uses('AppController', 'Controller');
set_time_limit ( 1600 );
/**
 * Surveys Controller
 *
 * @property Survey $Survey
 */
class SurveysController extends AppController {
    
    public $helpers = array('Excel');
    
    public $region_list = array();
    
    /**
     * 
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->region_list = $this->Survey->House->Area->Region->find('list');
        $this->set('regions', $this->region_list);        
    }
    
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Survey->recursive = 0;
        $this->set('surveys', $this->paginate());
    }
        
        /**
         * 
         */
        public function dashboard(){
            $achievements = array();
            
            if($this->current_campaign_detail){
                $achievements['total_allocation'] = $this->current_campaign_detail['Campaign']['total_target'];            
                $achievements['achieved_total'] = $this->Survey->find('count', array('conditions' => array(
                    'campaign_id' => $this->current_campaign_detail['Campaign']['id']
                    ),
                    'recursive' => -1));

                $achievements['achievement_parcentage'] = round($achievements['achieved_total']*100/$this->current_campaign_detail['Campaign']['total_target']);
                $achievements['required_rate'] = round(($this->current_campaign_detail['Campaign']['total_target'] - $achievements['achieved_total'])/($this->total_camp_days - $this->day_passed));

                $achievements['target_till_date'] = round($this->current_campaign_detail['Campaign']['total_target']*($this->day_passed+1)/$this->total_camp_days);

                $regionwise_achievements = $this->Survey->get_region_wise_achievements($this->current_campaign_detail, $this->region_list);

                //pr($regionwise_achievements);
                $this->set('achievements',$achievements);
                $this->set('regionwise_achievements',$regionwise_achievements);
            }
        }
        
        public function report(){
            $this->_set_request_data_from_params();  
            
            $houseList = $this->Survey->House->house_list($this->request->data);//('list', array('conditions' => $this->_set_conditions()));
                                   
            if( isset($this->request->data['House']['id']) && !empty($this->request->data['House']['id']) ){
                $houseIds[] = $this->request->data['House']['id'];
            }else{
                $houseIds = $this->Survey->House->id_from_list($houseList);                
            }
            
//            $SurveyIds = $this->Survey->find('list',array('fields' => 'id','conditions' => 
//                array('Survey.campaign_id' => $this->current_campaign_detail['Campaign']['id'],
//                      'Survey.house_id' => $houseIds)));     
            
            $this->Survey->Behaviors->load('Containable');

            $this->paginate = array(
                'contain' => $this->Survey->get_contain_array(),
                //'conditions' => $this->Survey->set_conditions($SurveyIds, $this->request->data),                                    
                'conditions' => $this->Survey->set_conditions($houseIds, $this->request->data, false, $this->current_campaign_detail['Campaign']['id']),                                    
                'order' => array('Survey.created' => 'DESC'),
                'limit' => $this->Auth->user('pagination_limit'),
            );                
            $Surveys = $this->paginate();
            
            //pr($Surveys);exit;
            
            $this->set('achievements',$this->Survey->Campaign->achievements_by_house(
                    $houseIds, $this->current_campaign_detail['Campaign']['id'],
                    $this->total_camp_days, $this->day_passed));

            //pr($Surveys);exit;           
            
            $this->set('houses', $houseList);
            $this->set('occupations', $this->Survey->Occupation->find('list'));
            $this->set('brands', $this->Survey->Brand->find('list'));
            $this->set('Surveys', $Surveys);
        }
        
        /**
         * @desc Export report in xlsx file 
         */
        public function export_report(){
            $this->layout = 'ajax';        
            
            ini_set('memory_limit', '2024M');
            
            if( !empty($this->request->data) ){
                
                $houseList = $this->Survey->House->house_list($this->request->data);
                       
                if( isset($this->request->data['House']['id']) && !empty($this->request->data['House']['id']) ){
                    $houseIds[] = $this->request->data['House']['id'];
                }else{
                    $houseIds = $this->Survey->House->id_from_list($houseList);                
                }

//                $SurveyIds = $this->Survey->find('list',array('fields' => 'id','conditions' => 
//                    array('Survey.campaign_id' => $this->current_campaign_detail['Campaign']['id'],
//                        'Survey.house_id' => $houseIds)));    
                
                $this->Survey->unbindModel(array('belongsTo' => 
                    array('Campaign','MoLog'),
                    'hasOne' => array('Feedback')));

                $Surveys = $this->Survey->find('all', array(
                    'fields' => array('id','house_id','representative_id','name','phone','age','occupation_id',
                        'brand_id','created', 'Representative.name','Representative.br_code',
                        'Representative.superviser_name','Brand.title','Occupation.title',
                        'House.title','House.area_id'),
                    //'conditions' => $this->Survey->set_conditions($SurveyIds, $this->request->data),
                    'conditions' => $this->Survey->set_conditions($houseIds, $this->request->data, false, $this->current_campaign_detail['Campaign']['id']),
                    'order' => array('Survey.created' => 'DESC'),      
                ));                 
                $Surveys = $this->Survey->format_for_export($Surveys);
                $this->set('surveys',$Surveys); 
            }
        }        
        
        /**
         *
         * @return type 
         */
        protected function _set_conditions(){
            $conditions = array();
            if( $this->request->data['Area']['id'] ){
                $conditions[]['area_id'] = $this->request->data['Area']['id'];
            }else if( $this->request->data['Region']['id'] ){
                $areas = $this->Survey->House->Area->find('list',array('conditions' => array(
                    'Area.region_id' => $this->request->data['Region']['id']
                )));
                
                $areaIds = array();
                foreach($areas as $k => $v){
                    $areaIds[] = $k;
                }
                $conditions[]['area_id'] = $areaIds;
            }
            return $conditions;
        }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Survey->id = $id;
		if (!$this->Survey->exists()) {
			throw new NotFoundException(__('Invalid survey'));
		}
		$this->set('survey', $this->Survey->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
		if ($this->request->is('post')) {
			$this->Survey->create();
			if ($this->Survey->save($this->request->data)) {
				$this->Session->setFlash(__('The survey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
			}
		}
		$campaigns = $this->Survey->Campaign->find('list');
		$representatives = $this->Survey->Representative->find('list');
		$moLogs = $this->Survey->MoLog->find('list');
		//$ages = $this->Survey->Age->find('list');
		$occupations = $this->Survey->Occupation->find('list');
		$houses = $this->Survey->House->find('list');
		$this->set(compact('campaigns', 'representatives', 'moLogs', 'ages', 'occupations', 'houses'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Survey->id = $id;
		if (!$this->Survey->exists()) {
			throw new NotFoundException(__('Invalid survey'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Survey->save($this->request->data)) {
				$this->Session->setFlash(__('The survey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The survey could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Survey->read(null, $id);
		}
		$campaigns = $this->Survey->Campaign->find('list');
		$representatives = $this->Survey->Representative->find('list');
		$moLogs = $this->Survey->MoLog->find('list');
		$ages = $this->Survey->Age->find('list');
		$occupations = $this->Survey->Occupation->find('list');
		$houses = $this->Survey->House->find('list');
		$this->set(compact('campaigns', 'representatives', 'moLogs', 'ages', 'occupations', 'houses'));
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
		$this->Survey->id = $id;
		if (!$this->Survey->exists()) {
			throw new NotFoundException(__('Invalid survey'));
		}
		if ($this->Survey->delete()) {
			$this->Session->setFlash(__('Survey deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Survey was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
