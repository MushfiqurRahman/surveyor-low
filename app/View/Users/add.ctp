<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('first_name', array('required' => true));
		echo $this->Form->input('last_name', array('required' => true));
		echo $this->Form->input('email', array('required' => true));
		echo $this->Form->input('password', array('required' => true));
                echo $this->Form->input('retype_password', array('required' => true, 'type' => 'password'));
                echo $this->Form->input('pagination_limit', array('required' => true,'value' => 10));
                echo $this->Form->input('is_cc', array('type' => 'select','options' => array(
                    0 => 'No', 1 => 'Yes'
                )));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
