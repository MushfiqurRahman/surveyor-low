<div class="feedbacks view">
<h2><?php  echo __('Feedback');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Survey'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedback['Survey']['name'], array('controller' => 'surveys', 'action' => 'view', $feedback['Survey']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Right Name'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['is_right_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Right Age'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['is_right_age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Right Occupation'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['is_right_occupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Brand'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['current_brand']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('New Pack'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['new_pack']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tobacco Quality'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['tobacco_quality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tested'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['tested']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Br Toolkit'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['br_toolkit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Got Ptr'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['got_ptr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Feedback'), array('action' => 'edit', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
