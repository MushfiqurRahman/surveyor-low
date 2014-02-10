<div class="campaignDetails form">
<?php echo $this->Form->create('CampaignDetail');?>
	<fieldset>
		<legend><?php echo __('Edit Campaign Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('campaign_id');
		echo $this->Form->input('house_id');
		echo $this->Form->input('house_target');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CampaignDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CampaignDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Campaign Details'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
