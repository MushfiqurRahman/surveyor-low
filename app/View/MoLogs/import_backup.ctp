<?php 
    echo $this->Form->create('MoLog',array('type' => 'file'));
    echo $this->Form->input('backup_xls',array('type' => 'file', 'label' => 'Import Sales, Coupon'));
    echo $this->Form->end('Import');
?>