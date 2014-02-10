<div class="campaignDetails view">
<h2><?php  echo __('Campaign Detail');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaignDetail['CampaignDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDetail['Campaign']['title'], array('controller' => 'campaigns', 'action' => 'view', $campaignDetail['Campaign']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($campaignDetail['House']['title'], array('controller' => 'houses', 'action' => 'view', $campaignDetail['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House Target'); ?></dt>
		<dd>
			<?php echo h($campaignDetail['CampaignDetail']['house_target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($campaignDetail['CampaignDetail']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign Detail'), array('action' => 'edit', $campaignDetail['CampaignDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign Detail'), array('action' => 'delete', $campaignDetail['CampaignDetail']['id']), null, __('Are you sure you want to delete # %s?', $campaignDetail['CampaignDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
