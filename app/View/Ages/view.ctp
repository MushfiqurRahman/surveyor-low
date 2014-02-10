<div class="ages view">
<h2><?php  echo __('Age');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($age['Age']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lower Age'); ?></dt>
		<dd>
			<?php echo h($age['Age']['lower_age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upper Age'); ?></dt>
		<dd>
			<?php echo h($age['Age']['upper_age']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Age'), array('action' => 'edit', $age['Age']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Age'), array('action' => 'delete', $age['Age']['id']), null, __('Are you sure you want to delete # %s?', $age['Age']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Surveys');?></h3>
	<?php if (!empty($age['Survey'])):?>
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
		foreach ($age['Survey'] as $survey): ?>
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
