<?php
    if( !empty($mo_logs) ){?>
      <table style="width:100%;border:solid 1px;"><tr style="width:100%;"><th>ID</th><th>MSISDN</th><th>SMS</th><th>Keyword</th><th>Date & Time</th><th>Action</th></tr>
      <?php
        foreach($mo_logs as $ml){
            echo '<tr style="width:100%"><td>'.$ml['MoLog']['id'].'</td><td>'.$ml['MoLog']['msisdn'].'</td><td>'.$ml['MoLog']['sms'].
                    '</td><td>'.$ml['MoLog']['keyword'].'</td><td>'.$ml['MoLog']['datetime'].'</td><td>';
            
            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ml['MoLog']['id']), null,
                    __('Are you sure you want to delete # %s?', $ml['MoLog']['id']));
                    
        }
      ?>
      </table>
    <?php    
    }
    ?>
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