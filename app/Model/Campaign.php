<?php
App::uses('AppModel', 'Model');
/**
 * Campaign Model
 *
 * @property CampaignDetail $CampaignDetail
 * @property Survey $Survey
 */
class Campaign extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_target' => array(
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
		'start_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'end_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CampaignDetail' => array(
			'className' => 'CampaignDetail',
			'foreignKey' => 'campaign_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Survey' => array(
			'className' => 'Survey',
			'foreignKey' => 'campaign_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
                'Achievement' => array(
			'className' => 'Achievement',
			'foreignKey' => 'campaign_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
        
        /**
         * Changing fields as datetime field 
         */
        public function beforeSave($options = array()){
            return true;
        }
        
        
        /**
         *
         * @desc The following method is useful when a new campaign being created. User may enter campaign target
         * not equal to the sum of all the house targets. That's why the following method. Used in
         * CampaignsController's add and edit method.
         * 
         * @return boolean 
         */
        public function check_total( $data = array() ){
            $houseTotal = 0;
            foreach($data['CampaignDetail'] as $cd){
                $houseTotal += $cd['house_target'];
            }
            if( $data['Campaign']['total_target']==$houseTotal){
                return true;
            }
            return false;
        }
        
        /**
         *
         * @desc Used in Surveys controller's in report method.
         * 
         * @param type $house_ids 
         */
        public function achievements_by_house($house_ids = array(), $campaign_id, $camp_days, $day_passed){
            $campDetails = $this->CampaignDetail->find('all',array(
                'conditions' => array(
                    'campaign_id' => $campaign_id,
                    'house_id' => $house_ids),
                'recursive' => -1));
            
            $achievements = array();
            $total_target = $total_ach = 0;
            foreach( $campDetails as $cmp ){
                $total_target += $cmp['CampaignDetail']['house_target'];
                $total_ach += $cmp['CampaignDetail']['house_achieved'];
            }
            $achievements['total_allocation'] = $total_target;
            $achievements['achieved_total'] = $total_ach;
            $achievements['achievement_parcentage'] = round(100*$total_ach/$total_target);
            $achievements['target_till_date'] = round($achievements['total_allocation']*($day_passed+1)/$camp_days);
            if( $camp_days == $day_passed ){
                $achievements['required_rate'] = ($achievements['total_allocation'] - $achievements['achieved_total']);
            }else{
                $achievements['required_rate'] = round(($achievements['total_allocation'] - $achievements['achieved_total'])/($camp_days - $day_passed));
            }
            return $achievements;
        }
}
