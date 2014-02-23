<?php 
App::import('Vendor','XLSXWriter',array('file' => 'PHP_XLSXWriter-master/xlsxwriter.class.php'));
App::uses('AppHelper', 'View/Helper');

class XLSXWriterHelper extends AppHelper {
    
    var $xls;
    var $sheet;
    var $data;
    var $blacklist = array();
    var $writer;
    
    function xlsxWriterHelper() {
        $this->writer = new XLSXWriter();
    }
                 
    function generate(&$data, $title = 'Report') {
//         $this->data =& $data;
         
         //$this->writer->setAuthor($title);
         
        // pr($this->data);
         
         
         
//         $headers = array();
//         foreach ($this->data[0] as $field => $value) {
//            $headers = $field;
//         }
         
//         $this->writer->writeSheet($this->data,'Sheet1');
//         $this->writer->writeToFile('example.xlsx');
        
        $data = array(
    array('year','month','amount'),
    array('2003','1','220'),
    array('2003','2','153.5'),
);

$writer = new XLSXWriter();
$writer->writeSheet($data);
$writer->writeToFile('output.xlsx');
         
         return true;
    }
}
?>