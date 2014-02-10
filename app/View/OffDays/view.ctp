<div class="offDays view">
<h2><?php  echo __('Off Day');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($offDay['OffDay']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign'); ?></dt>
		<dd>
			<?php echo $this->Html->link($offDay['Campaign']['title'], array('controller' => 'campaigns', 'action' => 'view', $offDay['Campaign']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Off Day'); ?></dt>
		<dd>
			<?php echo h($offDay['OffDay']['off_day']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Off Day'), array('action' => 'edit', $offDay['OffDay']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Off Day'), array('action' => 'delete', $offDay['OffDay']['id']), null, __('Are you sure you want to delete # %s?', $offDay['OffDay']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Off Days'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Off Day'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
	</ul>
</div>
