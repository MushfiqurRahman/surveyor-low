<?php
    function xlsBOF() {
        echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
        return;
    }
    function xlsEOF(){
        echo pack("ss", 0x0A, 0x00);
        return;
    }
    function xlsWriteNumber($Row, $Col, $Value) {
        echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
        echo pack("d", $Value);
        return;
    }
    function xlsWriteLabel($Row, $Col, $Value ) {
        $L = strlen($Value);
        echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
        echo $Value;
        return;
    }
    
    //writting file here
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");;
    header("Content-Disposition: attachment;filename=exported_report.xls");
    header("Content-Transfer-Encoding: binary ");
    xlsBOF();
    
    $tableHeaders = array('ID', 'Region', 'Area', 'House', 'BR Name', 'BR Code', 'SUP Name', 'Consumer Name',
        'Phone', 'Age', 'Occupation', 'Brand', 'Date');
    $i = 0;
    foreach( $tableHeaders as $th ){
        xlsWriteLabel(0, $i, $th);
        $i++;
    }
    
    $xlsRow = 1;
    foreach($surveys as $srv){
        $col = 0;
        foreach($srv as $v){
            if( $col==0 || $col==5 || $col==8 || $col==9 ){
                xlsWriteNumber($xlsRow,$col,$v);
            }else{
                xlsWriteLabel($xlsRow,$col,$v);
            }
            $col++;
        }
        $xlsRow++;
    }
    xlsEOF();
?>