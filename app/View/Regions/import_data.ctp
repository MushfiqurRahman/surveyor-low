<?php
    echo $this->Form->create('Region',array('type' => 'file'));
    echo $this->Form->input('xls_file',array('type' => 'file','label' => 'Select your xls file'));
    
    echo $this->Form->end('Import');
?>