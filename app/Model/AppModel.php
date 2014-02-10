<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    
	/**
	 * 
	 * Enter description here ...
	 * @param unknown_type $reg_id
	 */
    public function get_region_area_house_detail( $reg_id = '' ){
        $condition = ' WHERE '.(strlen($reg_id)==0 ? 'Region.id>0' : 'Region.id = '.  $reg_id);
        $qry = 'SELECT Region.id, Region.title, Area.id, Area.title, House.id, House.title
            FROM regions AS Region
            LEFT JOIN areas AS Area ON Region.id = Area.region_id
            LEFT JOIN houses AS House ON Area.id = House.area_id '.$condition;
        
        return $this->query($qry);        
    }
    
    /**
     * 
     * Enter description here ...
     * @param unknown_type $modelName
     * @param unknown_type $data_array
     */
    public function listIds( $modelName, $data_array ){
    	$ids = array();
    	foreach( $data_array as $dt ){
    		if( is_numeric($dt[$modelName]['id']) ){
    			//$ids[$dt[ $modelName ]['id']] = $dt[ $modelName ]['title'];
                    $ids[] = $dt[ $modelName ]['id'];
    		}
    	}
        if( $modelName != 'House'){
            $ids = str_replace('"','\"',serialize($ids));
        }
    	return $ids;
    }
    
    /**
     *
     * @param type $modelName
     * @param type $data_array
     * @param type $id
     * @return type 
     */
    public function find_title( $modelName, $data_array, $id ){
        foreach( $data_array as $dt ){
            if( !empty($dt[$modelName]['id']) && $dt[$modelName]['id']==$id ){
                return $dt[$modelName]['title'];
            }
        }
        return '';
    }
    
}
