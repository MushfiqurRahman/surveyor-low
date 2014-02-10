<?php
App::uses('AppModel', 'Model');
/**
 * House Model
 *
 * @property Area $Area
 * @property Outlet $Outlet
 * @property Representative $Representative
 * @property Section $Section
 */
class House extends AppModel {

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
		'area_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
//		'code' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(		
		'Representative' => array(
			'className' => 'Representative',
			'foreignKey' => 'house_id',
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
		'Survey' => array(
			'className' => 'Survey',
			'foreignKey' => 'house_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        
        public function get_ids( $data ){
            $houses = $this->house_list($data);
            $ids = array();
            
            foreach($houses as $key => $house){
                $ids[] = $key;
            }
            return $ids;
        }
        
        public function house_list(  $data ){
            //pr($data);
            $conditions = array();

            if( isset($data['House']['id']) && $data['House']['id'] ){
                $conditions = array('House.id' => $data['House']['id']);
            }else if( isset($data['Area']['id']) && $data['Area']['id'] ){
                $conditions = array('House.area_id' => $data['Area']['id']);
            }else if( isset($data['Region']['id']) && $data['Region']['id'] ){
                $areaIds = $this->Area->find('list', array('fields' => array('Area.id'),
                    'conditions' => array('Area.region_id' => $data['Region']['id'])));                
                $conditions = array('House.area_id' => $areaIds);
            }else {
                $conditions = array('House.id >' => 0);
            }

            $houses = $this->find('list',array(//'fields' => array('House.id'),
                'conditions' => $conditions));

            return $houses;
        }
        
        public function id_from_list($houseList){
            $ids = array();
            foreach($houseList as $k => $v){
                $ids[] = $k;
            }
            return $ids;
        }

}
