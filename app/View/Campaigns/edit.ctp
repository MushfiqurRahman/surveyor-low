<div class="campaigns form">
<?php echo $this->Form->create('Campaign');?>
	<fieldset>
		<legend><?php echo __('Edit Campaign'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('total_target');
        ?>
                <label>Start Date</label>   <input size="30" name="data[Campaign][start_date]" required="required"  onFocus="this.value=''" onClick="showCalendarControl(this);" type="text"  value="<?php echo isset($this->data['Campaign']['start_date']) ? $this->data['Campaign']['start_date'] : '';?>" />   
                <label>End Date</label><input size="30" name="data[Campaign][end_date]" required="required" onFocus="this.value=''" onClick="showCalendarControl(this);" type="text"  value="<?php echo isset($this->data['Campaign']['end_date']) ? $this->data['Campaign']['end_date'] : '';?>" />
                
        <h3>Target by House</h3><br/>
            <table>
                <tr>
                    <th>House Name</th><th>House Target</th><th>House Feedback Target</th>
                </tr>
                <?php                    
                    foreach($this->data['CampaignDetail'] as $i => $cmpDt){
                ?>
                        <input type="hidden" name="data[CampaignDetail][<?php echo $i;?>][id]" value="<?php echo $cmpDt['id'];?>"/>
                        <input type="hidden" name="data[CampaignDetail][<?php echo $i;?>][campaign_id]" value="<?php echo $cmpDt['campaign_id'];?>"/>
                        <input type="hidden" name="data[CampaignDetail][<?php echo $i;?>][house_id]" value="<?php echo $cmpDt['house_id'];?>"/>
                        <input type="hidden" name="data[CampaignDetail][<?php echo $i;?>][house_achieved]" value="<?php echo $cmpDt['house_achieved'];?>"/>
                        
                        <tr>
                            <td><?php echo $cmpDt['House']['title'];?></td>
                            <td><input type="text" name="data[CampaignDetail][<?php echo $i;?>][house_target]" required="required" value="<?php echo $cmpDt['house_target'];?>"/></td>
                            <td><input type="text" name="data[CampaignDetail][<?php echo $i;?>][house_feedback_target]" required="required" value="<?php echo $cmpDt['house_feedback_target'];?>"/></td>
                        </tr>
                <?php                        
                    }
                ?>
            </table>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Campaign.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Campaign.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Campaign Details'), array('controller' => 'campaign_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Campaign Detail'), array('controller' => 'campaign_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Surveys'), array('controller' => 'surveys', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey'), array('controller' => 'surveys', 'action' => 'add')); ?> </li>
	</ul>
</div>
