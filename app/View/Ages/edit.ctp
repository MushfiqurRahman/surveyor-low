<div class="ages form">
<?php echo $this->Form->create('Age');?>
	<fieldset>
		<legend><?php echo __('Edit Age'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lower_age', array('required' => true));
		echo $this->Form->input('upper_age', array('required' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Age.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Age.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ages'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
