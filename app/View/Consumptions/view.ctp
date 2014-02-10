<div class="consumptions view">
<h2><?php  echo __('Consumption');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($consumption['Consumption']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lower No'); ?></dt>
		<dd>
			<?php echo h($consumption['Consumption']['lower_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upper No'); ?></dt>
		<dd>
			<?php echo h($consumption['Consumption']['upper_no']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Consumption'), array('action' => 'edit', $consumption['Consumption']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Consumption'), array('action' => 'delete', $consumption['Consumption']['id']), null, __('Are you sure you want to delete # %s?', $consumption['Consumption']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Consumptions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Consumption'), array('action' => 'add')); ?> </li>
	</ul>
</div>
