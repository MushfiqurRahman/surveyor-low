<div class="representatives index">
	<h2><?php 
        echo __('Representatives'); ?></h2>
    <hr/>
    <div>
        <b>Search BR by BR code</b>
        <?php
            echo $this->Form->create('Representative', array('action' => 'search'));
            echo $this->Form->input('br_code', array('type' => 'text', 'required' => true));
            echo $this->Form->end('Search');
        ?>
        
    </div>
    <hr/>
    
    <?php if(isset($representative)){ ?>
    
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'id'; ?></th>
			<th><?php echo 'house_id'; ?></th>
			<th><?php echo 'name'; ?></th>
                        <th><?php echo 'superviser_name'; ?></th>
			<th><?php echo 'mobile_no'; ?></th>			
                        <th><?php echo 'br_code'; ?></th>	
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
        
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

	</table>
    <?php 
    
                            }
                            else{
                                echo 'Sorry! No br found with the given br code';
                            }
?>
    
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Representative'), array('action' => 'add')); ?></li>		
	</ul>
</div>
