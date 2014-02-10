<?php
    echo $this->Form->create('Feedback',array('type' => 'file'));
    echo $this->Form->input('xls_file',array('type' => 'file','label' => 'Select your xlsx file'));
    
    echo $this->Form->end('Import');
?>