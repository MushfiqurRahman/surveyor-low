<div class="areas view">
<h2><?php  echo __('Area'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($area['Area']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($area['Region']['title'], array('controller' => 'regions', 'action' => 'view', $area['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($area['Area']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($area['Area']['code']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Area'), array('action' => 'edit', $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Area'), array('action' => 'delete', $area['Area']['id']), null, __('Are you sure you want to delete # %s?', $area['Area']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Campaigns'); ?></h3>
	<?php if (!empty($area['Campaign'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Trgt B1'); ?></th>
		<th><?php echo __('Trgt B2'); ?></th>
		<th><?php echo __('Trgt B3'); ?></th>
		<th><?php echo __('Trgt B4'); ?></th>
		<th><?php echo __('Trgt B5'); ?></th>
		<th><?php echo __('Trgt B6'); ?></th>
		<th><?php echo __('Trgt B7'); ?></th>
		<th><?php echo __('Trgt B8'); ?></th>
		<th><?php echo __('Trgt B9'); ?></th>
		<th><?php echo __('Trgt B10'); ?></th>
		<th><?php echo __('Trgt B11'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($area['Campaign'] as $campaign): ?>
		<tr>
			<td><?php echo $campaign['id']; ?></td>
			<td><?php echo $campaign['area_id']; ?></td>
			<td><?php echo $campaign['title']; ?></td>
			<td><?php echo $campaign['start_date']; ?></td>
			<td><?php echo $campaign['end_date']; ?></td>
			<td><?php echo $campaign['trgt_b1']; ?></td>
			<td><?php echo $campaign['trgt_b2']; ?></td>
			<td><?php echo $campaign['trgt_b3']; ?></td>
			<td><?php echo $campaign['trgt_b4']; ?></td>
			<td><?php echo $campaign['trgt_b5']; ?></td>
			<td><?php echo $campaign['trgt_b6']; ?></td>
			<td><?php echo $campaign['trgt_b7']; ?></td>
			<td><?php echo $campaign['trgt_b8']; ?></td>
			<td><?php echo $campaign['trgt_b9']; ?></td>
			<td><?php echo $campaign['trgt_b10']; ?></td>
			<td><?php echo $campaign['trgt_b11']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'campaigns', 'action' => 'view', $campaign['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'campaigns', 'action' => 'edit', $campaign['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'campaigns', 'action' => 'delete', $campaign['id']), null, __('Are you sure you want to delete # %s?', $campaign['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Houses'); ?></h3>
	<?php if (!empty($area['House'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($area['House'] as $house): ?>
		<tr>
			<td><?php echo $house['id']; ?></td>
			<td><?php echo $house['area_id']; ?></td>
			<td><?php echo $house['title']; ?></td>
			<td><?php echo $house['code']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'houses', 'action' => 'view', $house['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'houses', 'action' => 'edit', $house['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'houses', 'action' => 'delete', $house['id']), null, __('Are you sure you want to delete # %s?', $house['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
