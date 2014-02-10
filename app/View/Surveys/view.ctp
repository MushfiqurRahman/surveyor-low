<div class="surveys view">
<h2><?php  echo __('Survey');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Campaign'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Campaign']['title'], array('controller' => 'campaigns', 'action' => 'view', $survey['Campaign']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('House Id'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['house_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Representative'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Representative']['name'], array('controller' => 'representatives', 'action' => 'view', $survey['Representative']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mo Log'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['MoLog']['id'], array('controller' => 'mo_logs', 'action' => 'view', $survey['MoLog']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Survey Counter'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['survey_counter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Age']['id'], array('controller' => 'ages', 'action' => 'view', $survey['Age']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adc'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['adc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Occupation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($survey['Occupation']['title'], array('controller' => 'occupations', 'action' => 'view', $survey['Occupation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($survey['Survey']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey'), array('action' => 'edit', $survey['Survey']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey'), array('action' => 'delete', $survey['Survey']['id']), null, __('Are you sure you want to delete # %s?', $survey['Survey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('controller' => 'campaigns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign'), array('controller' => 'campaigns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Representatives'), array('controller' => 'representatives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Representative'), array('controller' => 'representatives', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mo Logs'), array('controller' => 'mo_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mo Log'), array('controller' => 'mo_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ages'), array('controller' => 'ages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age'), array('controller' => 'ages', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('controller' => 'occupations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Occupation'), array('controller' => 'occupations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Houses'), array('controller' => 'houses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New House'), array('controller' => 'houses', 'action' => 'add')); ?> </li>
	</ul>
</div>
