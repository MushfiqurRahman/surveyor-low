<?php
App::uses('AppModel', 'Model');
/**
 * Region Model
 *
 * @property Area $Area
 */
class Region extends AppModel {

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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'region_id',
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
			'foreignKey' => 'region_id',
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
         *
         * @param type $data
         * @return string 
         */
        public function get_titles( $data ){
            
            $titles = array();
            if( !$data['Region']['id'] ){
                $titles['region_title'] = 'All';                
                $titles['area_title'] = 'All';
                $titles['house_title'] = 'All';
            }else if( !$data['Area']['id'] ){
                $titles['region_title'] = $this->field('title',array('id' => $data['Region']['id']));
                $titles['area_title'] = 'All';
                $titles['house_title'] = 'All';
            }else if( $data['Region']['id'] && $data['Area']['id'] ){
                $reg_area_title = $this->query('SELECT Region.title, Area.title FROM regions as Region 
                    LEFT JOIN areas AS Area ON Region.id=Area.region_id WHERE 
                    Region.id='.$data['Region']['id'].' AND Area.id='.$data['Area']['id']);
                
                $titles['region_title'] = $reg_area_title[0]['Region']['title'];
                $titles['area_title'] = $reg_area_title[0]['Area']['title'];
                
                if( isset($data['House']['id']) && !$data['House']['id'] ){
                    $titles['house_title'] = 'All';
                }else if( isset($data['House']['id']) ){
                    $titles['house_title'] = $this->Area->House->field('title', array('House.id' => $data['House']['id']));
                }
            }
            return $titles;
        }
        
        /**
         *
         * @param type $field_name
         * @param type $value
         * @return int 
         */
        public function get_id_by_field( $field_name, $value ){
            $reg = $this->find('first',array('fields' => array('id'),'conditions' => array(
                'Region.'.$field_name => $value), 'recursive' => -1));
            if( !empty($reg) ){
                return $reg['Region']['id'];
            }
            return 0;
        }

}
