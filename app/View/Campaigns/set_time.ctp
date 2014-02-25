<div class="campaigns form">
<?php echo $this->Form->create('Campaign');?>
	<fieldset>
		<legend><?php echo __('Set Campaign Time (24 Hrs format)'); ?></legend>
                 <input name="data[Campaign][id]" type="hidden" value="<?php echo $this->data['Campaign']['id'];?>"/>   
                 <?php
                 //pr($this->data);
                    $housrs = array();
                    for($i=0;$i<24;$i++){
                        $temp = $i<10 ? '0'.$i : $i;
                        $housrs[ $temp ] = $temp;
                    }

                    $mins = array();
                    for($i=0;$i<60;$i++){
                        $temp = $i<10 ? '0'.$i : $i;
                        $mins[ $temp ] = $temp;
                    }
                ?>
                 <table>
                     <tr>
                         <td>&nbsp;</td><td>Hour</td><td>Min</td>
                     </tr>
                     
                     <tr>
                         <td>Start Time</td>
                         <td>
                             <?php echo $this->Form->input('start_time_hour', array('required' => true, 'type' => 'select',
                    'options' => $housrs, 'style' => 'width:50px;', 'label' => false), array('div' => false));?>
                         </td>
                         <td>
                             <?php echo $this->Form->input('start_time_min', array('required' => true, 'type' => 'select',
                    'options' => $mins, 'style' => 'width:50px;', 'label' => false), array('div' => false));?>
                         </td>
                     </tr>
                     
                     <tr>
                         <td>End Time</td>
                         <td>
                             <?php echo $this->Form->input('end_time_hour', array('required' => true, 'type' => 'select',
                    'options' => $housrs, 'style' => 'width:50px;', 'label' => false), array('div' => false));?>
                         </td>
                         <td>
                             <?php echo $this->Form->input('end_time_min', array('required' => true, 'type' => 'select',
                    'options' => $mins, 'style' => 'width:50px;', 'label' => false), array('div' => false));?>
                         </td>
                     </tr>
                 </table>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Campaigns'), array('action' => 'index'));?></li>		
	</ul>
</div>
