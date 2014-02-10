<div class="campaigns form">
<?php echo $this->Form->create('Campaign', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Add Campaign'); ?></legend>
	<?php            
		echo $this->Form->input('title', array('required' => true));
		echo $this->Form->input('total_target', array('required' => true));
        ?>
                <label>Start Date</label>   <input size="30" name="data[Campaign][start_date]" required="required"  onFocus="this.value=''" onClick="showCalendarControl(this);" type="text"  value="<?php echo isset($this->data['Campaign']['start_date']) ? $this->data['Campaign']['start_date'] : '';?>" />   
                <label>End Date</label><input size="30" name="data[Campaign][end_date]" required="required" onFocus="this.value=''" onClick="showCalendarControl(this);" type="text"  value="<?php echo isset($this->data['Campaign']['end_date']) ? $this->data['Campaign']['end_date'] : '';?>" />
                        
                <h3>Import House Target</h3>
                <?php echo $this->Form->input('xls_file',array('type' => 'file','required' => true,'label' => 'Select your xls file'));?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index'));?></li>		
	</ul>
</div>
