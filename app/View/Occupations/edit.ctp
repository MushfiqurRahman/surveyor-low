<div class="occupations form">
<?php echo $this->Form->create('Occupation');?>
	<fieldset>
		<legend><?php echo __('Edit Occupation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('required'));
		echo $this->Form->input('code', array('required'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Occupation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Occupation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('action' => 'index'));?></li>		
	</ul>
</div>
