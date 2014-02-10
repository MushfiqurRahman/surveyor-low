<div class="representatives index">
	<h2><?php 
        echo __('Representatives'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('house_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('superviser_name'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile_no'); ?></th>			
                        <th><?php echo $this->Paginator->sort('br_code'); ?></th>	
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php 
            //pr($representatives);exit;
        foreach ($representatives as $representative): ?>
	<tr>
		<td><?php echo h($representative['Representative']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($representative['House']['title'], array('controller' => 'houses', 'action' => 'view', $representative['House']['id'])); ?>
		</td>
                
		<td><?php echo h($representative['Representative']['name']); ?>&nbsp;</td>
                <td><?php echo h($representative['Representative']['superviser_id']==0 ? '' : $representative['Representative']['superviser_name']);?></td>
		<td><?php 
                        if( !empty($representative['Mobile']) ){
                            foreach($representative['Mobile'] as $mb){
                                echo $mb['mobile_no'].'&nbsp;';
                            }
                        }
                    ?>&nbsp;</td>
                
                <td><?php echo h($representative['Representative']['br_code']);?></td>
		
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $representative['Representative']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $representative['Representative']['id']), null, __('Are you sure you want to delete # %s?', $representative['Representative']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Representative'), array('action' => 'add')); ?></li>		
	</ul>
</div>
