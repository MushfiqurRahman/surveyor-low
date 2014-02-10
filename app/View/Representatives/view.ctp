<div class="representatives view">
<h2><?php  echo __('Representative'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($representative['Representative']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House'); ?></dt>
		<dd>
			<?php echo $this->Html->link($representative['House']['title'], array('controller' => 'houses', 'action' => 'view', $representative['House']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($representative['Representative']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile No'); ?></dt>
		<dd>
			<?php echo h($representative['Representative']['mobile_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($representative['Representative']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Representative'), array('action' => 'edit', $representative['Representative']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Representative'), array('action' => 'delete', $representative['Representative']['id']), null, __('Are you sure you want to delete # %s?', $representative['Representative']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Representatives'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Representative'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales'), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sales'); ?></h3>
	<?php if (!empty($representative['Sale'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Representative Id'); ?></th>
		<th><?php echo __('Outlet Id'); ?></th>
		<th><?php echo __('Section Id'); ?></th>
		<th><?php echo __('Date Time'); ?></th>
		<th><?php echo __('Sls B1'); ?></th>
		<th><?php echo __('Sls B2'); ?></th>
		<th><?php echo __('Sls B3'); ?></th>
		<th><?php echo __('Sls B4'); ?></th>
		<th><?php echo __('Sls B5'); ?></th>
		<th><?php echo __('Sls B6'); ?></th>
		<th><?php echo __('Sls B7'); ?></th>
		<th><?php echo __('Sls B8'); ?></th>
		<th><?php echo __('Sls B9'); ?></th>
		<th><?php echo __('Sls B10'); ?></th>
		<th><?php echo __('Sls B11'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($representative['Sale'] as $sale): ?>
		<tr>
			<td><?php echo $sale['id']; ?></td>
			<td><?php echo $sale['representative_id']; ?></td>
			<td><?php echo $sale['outlet_id']; ?></td>
			<td><?php echo $sale['section_id']; ?></td>
			<td><?php echo $sale['date_time']; ?></td>
			<td><?php echo $sale['sls_b1']; ?></td>
			<td><?php echo $sale['sls_b2']; ?></td>
			<td><?php echo $sale['sls_b3']; ?></td>
			<td><?php echo $sale['sls_b4']; ?></td>
			<td><?php echo $sale['sls_b5']; ?></td>
			<td><?php echo $sale['sls_b6']; ?></td>
			<td><?php echo $sale['sls_b7']; ?></td>
			<td><?php echo $sale['sls_b8']; ?></td>
			<td><?php echo $sale['sls_b9']; ?></td>
			<td><?php echo $sale['sls_b10']; ?></td>
			<td><?php echo $sale['sls_b11']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sales', 'action' => 'view', $sale['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sales', 'action' => 'edit', $sale['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sales', 'action' => 'delete', $sale['id']), null, __('Are you sure you want to delete # %s?', $sale['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sale'), array('controller' => 'sales', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
