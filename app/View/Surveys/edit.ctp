<div class="surveys form">
<?php echo $this->Form->create('Survey');?>
	<fieldset>
		<legend><?php echo __('Edit Survey'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('campaign_id');
		echo $this->Form->input('house_id');
		echo $this->Form->input('representative_id');
		echo $this->Form->input('mo_log_id');
		echo $this->Form->input('survey_counter');
		echo $this->Form->input('name');
		echo $this->Form->input('phone');
		echo $this->Form->input('age_id');
		echo $this->Form->input('adc');
		echo $this->Form->input('occupation_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Survey.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Survey.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Representatives'), array('controller' => 'representatives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Representative'), array('controller' => 'representatives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mo Logs'), array('controller' => 'mo_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mo Log'), array('controller' => 'mo_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ages'), array('controller' => 'ages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age'), array('controller' => 'ages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('controller' => 'occupations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Occupation'), array('controller' => 'occupations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
