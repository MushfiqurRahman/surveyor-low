<div class="feedbacks index">
	<h2><?php echo __('Feedbacks');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('survey_id');?></th>
			<th><?php echo $this->Paginator->sort('is_right_name');?></th>
			<th><?php echo $this->Paginator->sort('is_right_age');?></th>
			<th><?php echo $this->Paginator->sort('is_right_occupation');?></th>
			<th><?php echo $this->Paginator->sort('current_brand');?></th>
			<th><?php echo $this->Paginator->sort('new_pack');?></th>
			<th><?php echo $this->Paginator->sort('tobacco_quality');?></th>
			<th><?php echo $this->Paginator->sort('tested');?></th>
			<th><?php echo $this->Paginator->sort('br_toolkit');?></th>
			<th><?php echo $this->Paginator->sort('got_ptr');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($feedbacks as $feedback): ?>
	<tr>
		<td><?php echo h($feedback['Feedback']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($feedback['Survey']['name'], array('controller' => 'surveys', 'action' => 'view', $feedback['Survey']['id'])); ?>
		</td>
		<td><?php echo h($feedback['Feedback']['is_right_name']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['is_right_age']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['is_right_occupation']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['current_brand']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['new_pack']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['tobacco_quality']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['tested']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['br_toolkit']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['got_ptr']); ?>&nbsp;</td>
		<td><?php echo h($feedback['Feedback']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $feedback['Feedback']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feedback['Feedback']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
