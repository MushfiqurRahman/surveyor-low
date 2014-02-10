<?php
App::uses('AppModel', 'Model');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MoLog
 *
 * @author Shakil
 */
class MoLog extends AppModel{
    //put your code here
  public function sms_process($sms_temp) {
	
	while(substr_count($sms_temp, '  ')) {
		$sms_temp = str_replace('  ',' ',trim($sms_temp));
	}
	return strtoupper($sms_temp);
}  

     public function check_rep_br_code($br_code = null){
         
         $qry = 'SELECT representatives.id, representatives.house_id, representatives.superviser_id, '.
                ' representatives.br_code FROM representatives WHERE representatives.br_code="'.$br_code.'"';
         
         $res = $this->query($qry);
        
        //pr($res);exit;
        
        if( count($res)>0 ){
            return $res;
        }
        return false;
    }
    
    /**
     *
     * @param type $tlp
     * @param type $mobile
     * @return boolean 
     */
    public function check_tlp_mobile( $tlp, $mobile ){
        $res = $this->query('SELECT * FROM representatives LEFT JOIN outlets ON '.
                'representatives.house_id = outlets.house_id WHERE representatives.mobile_no="'.
                $mobile.'" AND outlets.code="'.$tlp.'"');
        
//        pr($res);
        
        if( count($res)>0 && ( isset($res[0]['outlets']['code']) && $res[0]['outlets']['code'] == $tlp ) ){
            return true;
        }
        return false;
    }
    
    /**
     *
     * @param type $outletCode
     * @param type $mobile
     * @return boolean 
     */
    public function get_outlet_id( $outletCode, $mobile ){
        $res = $this->query('SELECT * FROM outlets WHERE outlets.code="'.$outletCode.'" AND outlets.phone_no="'.
                $mobile.'"');
        
        if( count($res)>0 ){
            return $res[0]['outlets']['id'];
        }
        return false;
    }
    
    /**
     *
     * @param type $mobile_number
     * @param type $tlp_code
     * @return boolean 
     */
    public function srTlpId( $mobile_number, $tlp_code ){
        $res = $this->query('SELECT * FROM representatives LEFT JOIN outlets ON representatives.house_id = outlets.house_id 
            WHERE representatives.mobile_no="'.$mobile_number.'" AND outlets.code="'.$tlp_code.'"');
        
        if( count($res)>0 && isset($res[0]['outlets'])){
            $ids['representative_id'] = $res[0]['representatives']['id'];
            $ids['outlet_id'] = $res[0]['outlets']['id'];
            $ids['section_id'] = $res[0]['outlets']['section_id'];
            return $ids;
        }
        return false;
    }
    
    /**
     *
     * @param type $params
     * @return boolean 
     */
    public function numeric_check( $params ){
        if( $params[0] == 'RP' ){
            $total = 4;
        }else if( $params[0] == 'CUP' ){
            $total = 7;
        }else{
            return false;
        }   
        for($i=3;$i<$total;$i++){
            if( $params[$i]===0 ) continue;
            if( !is_numeric($params[$i]) ){
                return false;
            }
        }
        return true;
    }

public function mobile_number_process($mobile_num_temp) {
		
	$mobile_num=str_replace('-','',$mobile_num_temp);
	$mobile_num=trim($mobile_num);
	
	if(strlen($mobile_num) < 13)
		$mobile_num = "88".$mobile_num;
	
	return $mobile_num;
}


    /**
     *
     * @param type $mobile_number
     * @param type $sms
     * @param type $keyword
     * @param type $date
     * @param type $time_int
     * @return type 
     */
    public function save_log( $mobile_number, $sms, $keyword, $date, $time_int){
        $moLog['MoLog']['msisdn'] = $mobile_number;
        $moLog['MoLog']['sms'] = $sms;
        $moLog['MoLog']['keyword'] = $keyword;
        $moLog['MoLog']['datetime'] = $date;
        $moLog['MoLog']['time_int'] = $time_int;        
        $this->save($moLog);
        return $this->id;
    }
    
    	
    public function send_sms_free_of_charge($to, $msg,$recid,$keyword, $date = '', $time_int = 0){
    
		$this->query("INSERT INTO mt_logs(msisdn, sms,keyword,datetime,time_int) VALUES('$to',".
                        "'$msg','$keyword','$date',$time_int)");
		
		$date=date('Y-m-d h:i A');
		$ftp = fopen("log.txt",'a+');
        	fwrite($ftp,$to." ".$msg."	".$date."\n");
        	fclose($ftp);
		
		echo $msg; 
    }

    public function get_telcoID($mobile_num_temp){
		
			$operator = substr($mobile_num_temp,0,5);
			
			if($operator == '88017'){
					$telcoID = '1';
			}else if($operator == '88018'){
					$telcoID = '4';
			}else if($operator == '88015'){
					$telcoID = '5';
			}else if($operator == '88019'){
					$telcoID = '3';
			}else if($operator == '88011'){
					$telcoID = '2';				
			}else if($operator == '88016'){
					$telcoID = '6';				
			}else{ $telcoID = '7'; }
			
			return $telcoID;
	}
}