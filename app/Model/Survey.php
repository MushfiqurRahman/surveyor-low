<?php
App::uses('AppModel', 'Model');
/**
 * Survey Model
 *
 * @property Campaign $Campaign
 * @property Representative $Representative
 * @property MoLog $MoLog
 * @property Age $Age
 * @property Occupation $Occupation
 * @property House $House
 */
class Survey extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'campaign_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'representative_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mo_log_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'survey_counter' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'age' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'brand_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'occupation_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Campaign' => array(
			'className' => 'Campaign',
			'foreignKey' => 'campaign_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Representative' => array(
			'className' => 'Representative',
			'foreignKey' => 'representative_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MoLog' => array(
			'className' => 'MoLog',
			'foreignKey' => 'mo_log_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Brand' => array(
			'className' => 'Brand',
			'foreignKey' => 'brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Occupation' => array(
			'className' => 'Occupation',
			'foreignKey' => 'occupation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'House' => array(
			'className' => 'House',
			'foreignKey' => 'house_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        
        /**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Feedback' => array(
			'className' => 'Feedback',
			'foreignKey' => 'survey_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
                        'dependent' => true
		)
	);
        
        
         /**
        *
        * @return type 
        */
        public function get_contain_array( $is_feedback = false, $data = null ){
            
            if( !$is_feedback ){
                return array(
                    'Representative' => array(
                        'fields' => array('name','superviser_name', 'br_code'),
                        'House' => array(
                                    'fields' => array('title'),
                                    'Area' => array(
                                        'fields' => array('title'),
                                        'Region' => array('fields' => array('title')))),
                        ),
                    'Occupation' => array('title'),
                    'Brand' => array('title')
                );
            }else{                
                $conditions = array();
                if( isset($data['start_date']) ){
                    $conditions[]['DATE(Feedback.created) >= '] = $data['start_date'];
                }
                if( isset($data['end_date']) ){
                    $conditions[]['DATE(Feedback.created) <='] = $data['end_date'];
                }
                return array(
                    'Feedback' => array('fields' => array('Feedback.*'),
                        'conditions' => $conditions),
                    'Representative' => array(
                        'fields' => array('name','superviser_name'),
                        'House' => array(
                                    'fields' => array('title'),
                                    'Area' => array(
                                        'fields' => array('title'),
                                        'Region' => array('fields' => array('title')))),
                        ),
                    'Occupation' => array('title'),
                    'Brand' => array('title')
                );
            }
        }
        
        /**
         *
         * @return type 
         */
        public function set_conditions( $surveyIds = null, $data = array(), $is_feedback = false ){
            
            $conditions = array();
            
            if( $surveyIds ){
                $conditions[]['Survey.id'] = $surveyIds;                
            }else{
                $conditions[]['Survey.id'] = 0;
            }
            
            //since Feedback reporting on Feedbacks created date. Not on survey date
            if( !$is_feedback ){
                if( isset($data['start_date']) && !empty($data['start_date']) ){
                    $conditions[]['DATE(Survey.created) >='] = $data['start_date'];
                }
                if( isset($data['end_date']) && !empty($data['end_date']) ){
                    $conditions[]['DATE(Survey.created) <='] = $data['end_date'];
                }
            }
            
            if( isset($data['occupation_id']) && !empty($data['occupation_id']) ){
                $conditions[]['Survey.occupation_id'] = $data['occupation_id'];
            }
            if( isset($data['age_limit']) && !empty($data['age_limit']) ){
                $limits = $this->_get_limits($data['age_limit']);
                $conditions[]['age >='] = $limits['lower'];
                if( isset($limits['upper']) ){
                    $conditions[]['age <='] = $limits['upper'];
                }                
            }
            //maybe the following conditions would be brand
//            if( isset($data['adc']) && !empty($data['adc']) ){
//                $limits = $this->_get_limits($data['adc']);
//                $conditions[]['adc >='] = $limits['lower'];
//                if( isset($limits['upper']) ){
//                    $conditions[]['adc <='] = $limits['upper'];
//                }
//            }
            if( isset($data['brand_id']) && !empty($data['brand_id']) ){
                $conditions[]['Survey.brand_id'] = $data['brand_id'];
            }
            return $conditions;
        }
        
        /**
         * 
         */
        protected function _get_limits( $str ){
            $hasSeperator = strpos($str,'.');
            
            if( $hasSeperator!==false ){
                $res['lower'] = substr($str,0,$hasSeperator);
                $res['upper'] = substr($str, $hasSeperator+1);
            }else{
                $res['lower'] = $str;
            }
            return $res;
        }
        
        /**
         *
         * @param type $current_campaign
         * @param type $regions
         * @return type 
         */
        public function get_region_wise_achievements( $current_campaign, $regions ){
            $reg_achievements = array();
            foreach($regions as $k => $rg){
                foreach( $current_campaign['Achievement'] as $ach ){
                    if( $ach['region_id']==$k ){
                        $reg_achievements[$rg]['parcent_achieved'] = round(($ach['region_achieved']*100)/$ach['region_target']);
                        $reg_achievements[$rg]['total_disbursed'] = $ach['region_achieved'];
                        break;
                    }
                }
            }
            return $reg_achievements;            
        }
        
        /**
         * @desc Used in surveys controller for excel export. In the export_report method
         * @param type $surveys 
         */
        public function format_for_export( $surveys ){
            $formatted = array();
            $i = 0;
            
            foreach( $surveys as $srv ){
                $formatted[$i]['id'] = $srv['Survey']['id'];
                $formatted[$i]['region'] = $srv['Representative']['House']['Area']['Region']['title'];
                $formatted[$i]['area'] = $srv['Representative']['House']['Area']['title'];
                $formatted[$i]['house'] = $srv['Representative']['House']['title'];
                $formatted[$i]['br_name'] = $srv['Representative']['name'];
                $formatted[$i]['br_code'] = $srv['Representative']['br_code'];
                $formatted[$i]['sup_name'] = $srv['Representative']['superviser_name'];
                $formatted[$i]['customer_name'] = $srv['Survey']['name'];
                $formatted[$i]['phone_no'] = $srv['Survey']['phone'];
                $formatted[$i]['age'] = $srv['Survey']['age'];
                //$formatted[$i]['adc'] = $srv['Survey']['adc'];                
                $formatted[$i]['occupation'] = $srv['Occupation']['title'];
                $formatted[$i]['brand'] = $srv['Brand']['title'];
                $formatted[$i]['date'] = date('Y-m-d',strtotime($srv['Survey']['created']));
                $i++;
            }
            return $formatted;
        }
        
        /**
         *
         * @param type $feedbacks
         * @return type 
         */
//        public function format_for_feedback_export( $feedbacks ){
//            $formatted = array();
//            $i = 0;
//            
//            foreach( $feedbacks as $srv ){
//                $formatted[$i]['id'] = $srv['Feedback']['id'];
//                $formatted[$i]['region'] = $srv['Representative']['House']['Area']['Region']['title'];
//                $formatted[$i]['area'] = $srv['Representative']['House']['Area']['title'];
//                $formatted[$i]['house'] = $srv['Representative']['House']['title'];
//                $formatted[$i]['br_name'] = $srv['Representative']['name'];
//                $formatted[$i]['sup_name'] = $srv['Representative']['superviser_name'];
//                
//                $formatted[$i]['customer_name'] = $srv['Feedback']['is_right_name']==1? 'Right' : 'Wrong';
//                $formatted[$i]['phone_no'] = $srv['Survey']['phone'];
//                $formatted[$i]['age'] = $srv['Feedback']['is_right_age']==1? 'Right' : 'Wrong';                
//                $formatted[$i]['occupation'] = $srv['Feedback']['is_right_occupation']==1? 'Right' : 'Wrong';
//                $formatted[$i]['current_brand'] = $srv['Feedback']['current_brand'];
//                $formatted[$i]['notice_new_pack'] = $srv['Feedback']['new_pack']==1 ? 'Yes' : 'No';                
//                $formatted[$i]['tobacco_quality'] = $srv['Feedback']['tobacco_quality']==1 ? 'Yes' : 'No';
//                $formatted[$i]['br_toolkit'] = $srv['Feedback']['br_toolkit']==1 ? 'Yes' : 'No';
//                $formatted[$i]['ptr_back_check'] = $srv['Feedback']['got_ptr']==1 ? 'Yes' : 'No';
//                $formatted[$i]['date'] = date('Y-m-d',strtotime($srv['Feedback']['created']));
//                $i++;
//            }
//            return $formatted;
//        }
        
        /**
         *
         * @desc Used in Feedback Model
         * @param type $campaign_id
         * @param type $houseId
         * @param type $date
         * @return boolean true/false
         */
        public function is_feedback_achieved($campaign_id, $houseId, $date ){
            $houseTarget = $this->Campaign->CampaignDetail->find('first',array('fields' => array(
                    'CampaignDetail.house_feedback_target'
                ),
                'conditions' => array('CampaignDetail.campaign_id' => $campaign_id,
                    'CampaignDetail.house_id' => $houseId), 
                'recursive' => -1
            ));
            
            $total_feedback = $this->find('count',array('conditions' => array(
                'Survey.campaign_id' => $campaign_id, 'Survey.house_id' => $houseId,
                'Survey.feedback_taken' => 1,'DATE(Survey.created)' => $date
            )));            
            
            if( $total_feedback >= $houseTarget['CampaignDetail']['house_feedback_target'] ){
                return true;
            }
            return false;
        }
        
        /**
         * @desc Used in Feedback.php model
         * @param type $campaignId
         * @param type $houseId
         * @param type $survey_date
         * @return boolean 
         */
        public function has_survey_for_feedback($campaignId, $houseId, $survey_date){
            $totalRemains = $this->find('count',array('conditions' => array(
                'Survey.campaign_id' => $campaignId, 'Survey.house_id' => $houseId,
                'Survey.feedback_taken' => 0, 'DATE(Survey.created)' => $survey_date
            )));
            if( $totalRemains > 0){
                return true;
            }
            return false;
        }
}
