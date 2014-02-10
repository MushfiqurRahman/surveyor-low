<div class="feedbacks form">
<?php echo $this->Form->create('Feedback');?>
	<fieldset>
		<legend><?php echo __('Edit Feedback'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('survey_id');
		echo $this->Form->input('is_right_name');
		echo $this->Form->input('is_right_age');
		echo $this->Form->input('is_right_occupation');
		echo $this->Form->input('current_brand');
		echo $this->Form->input('new_pack');
		echo $this->Form->input('tobacco_quality');
		echo $this->Form->input('tested');
		echo $this->Form->input('br_toolkit');
		echo $this->Form->input('got_ptr');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Feedback.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Feedback.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
