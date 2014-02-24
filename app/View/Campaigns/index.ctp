<div class="campaigns index">
	<h2><?php echo __('Campaigns');?></h2>
	<table cellpadding="5" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('total_target');?></th>
			<th><?php echo $this->Paginator->sort('start_date');?></th>
			<th><?php echo $this->Paginator->sort('end_date');?></th>
                        <th>Start Time &nbsp;&nbsp;</th>
                        <th>End Time</th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($campaigns as $campaign): ?>
	<tr>
		<td><?php echo h($campaign['Campaign']['id']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['title']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['total_target']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['end_date']); ?>&nbsp;</td>
                <td><?php echo h($campaign['Campaign']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($campaign['Campaign']['end_time']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $campaign['Campaign']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $campaign['Campaign']['id'])); ?>
			<?php echo $this->Html->link(__('Set Time'), array('action' => 'set_time', $campaign['Campaign']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
