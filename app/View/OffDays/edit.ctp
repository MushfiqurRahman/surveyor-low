<div class="offDays form">
<?php echo $this->Form->create('OffDay');?>
	<fieldset>
		<legend><?php echo __('Edit Off Day'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('campaign_id');
		//echo $this->Form->input('off_day');
	?>
                <label>Select Off Day</label><input size="30" name="data[OffDay][off_day]" required="required"  onFocus="this.value=''" onClick="showCalendarControl(this);" type="text"  value="<?php echo isset($this->data['OffDay']['off_day']) ? $this->data['OffDay']['off_day'] : '';?>" />   
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('OffDay.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('OffDay.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Off Days'), array('action' => 'index'));?></li>
		
	</ul>
</div>
