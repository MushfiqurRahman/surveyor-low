<div class="campaigns view">
<h2><?php  echo __('Campaign');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Target'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['total_target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($campaign['Campaign']['end_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Campaign'), array('action' => 'edit', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Campaign'), array('action' => 'delete', $campaign['Campaign']['id']), null, __('Are you sure you want to delete # %s?', $campaign['Campaign']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaign Details'), array('controller' => 'campaign_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Detail'), array('controller' => 'campaign_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Campaign Details');?></h3>
	<?php if (!empty($campaign['CampaignDetail'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Campaign Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('House Target'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($campaign['CampaignDetail'] as $campaignDetail): ?>
		<tr>
			<td><?php echo $campaignDetail['id'];?></td>
			<td><?php echo $campaignDetail['campaign_id'];?></td>
			<td><?php echo $campaignDetail['house_id'];?></td>
			<td><?php echo $campaignDetail['house_target'];?></td>
			<td><?php echo $campaignDetail['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'campaign_details', 'action' => 'view', $campaignDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'campaign_details', 'action' => 'edit', $campaignDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'campaign_details', 'action' => 'delete', $campaignDetail['id']), null, __('Are you sure you want to delete # %s?', $campaignDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign Detail'), array('controller' => 'campaign_details', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Surveys');?></h3>
	<?php if (!empty($campaign['Survey'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Campaign Id'); ?></th>
		<th><?php echo __('House Id'); ?></th>
		<th><?php echo __('Representative Id'); ?></th>
		<th><?php echo __('Mo Log Id'); ?></th>
		<th><?php echo __('Survey Counter'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Age Id'); ?></th>
		<th><?php echo __('Adc'); ?></th>
		<th><?php echo __('Occupation Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($campaign['Survey'] as $survey): ?>
		<tr>
			<td><?php echo $survey['id'];?></td>
			<td><?php echo $survey['campaign_id'];?></td>
			<td><?php echo $survey['house_id'];?></td>
			<td><?php echo $survey['representative_id'];?></td>
			<td><?php echo $survey['mo_log_id'];?></td>
			<td><?php echo $survey['survey_counter'];?></td>
			<td><?php echo $survey['name'];?></td>
			<td><?php echo $survey['phone'];?></td>
			<td><?php echo $survey['age_id'];?></td>
			<td><?php echo $survey['adc'];?></td>
			<td><?php echo $survey['occupation_id'];?></td>
			<td><?php echo $survey['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'surveys', 'action' => 'view', $survey['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'surveys', 'action' => 'edit', $survey['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'surveys', 'action' => 'delete', $survey['id']), null, __('Are you sure you want to delete # %s?', $survey['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
