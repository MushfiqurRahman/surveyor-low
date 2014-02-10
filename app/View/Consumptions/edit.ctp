<div class="consumptions form">
<?php echo $this->Form->create('Consumption');?>
	<fieldset>
		<legend><?php echo __('Edit Consumption'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lower_no');
		echo $this->Form->input('upper_no');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Consumption.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Consumption.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Consumptions'), array('action' => 'index'));?></li>
	</ul>
</div>
