<div class="representatives form">
<?php echo $this->Form->create('Representative'); ?>
	<fieldset>
		<legend><?php echo __('Edit SS/SR/TSA'); ?></legend>
	<?php
		echo $this->Form->input('id');		
                if( $this->data['Representative']['superviser_id']>0){
                    echo $this->Form->input('house_id', array('disabled' => 'disabled'));
                    echo $this->Form->input('superviser_id', array('options' => $ss_id));
                    echo $this->Form->input('br_code', array('label' => 'BR Code(If not Superviser)', 'required' => true));
                    echo $this->Form->input('type',array('type' => 'hidden','value' => 'br'));
                }else{
                    echo $this->Form->input('type',array('type' => 'hidden','value' => 'superviser'));
                }
		echo $this->Form->input('name', array('required' => true));
        ?>
            <table>
                <tr>
                    <td>
                        <div  class="mobile_nos">
                            <?php
                                
                                if( isset($this->request->data['Mobile']) && count($this->request->data['Mobile'])>0 ){
                                    $i = 0;
                                    foreach($this->request->data['Mobile'] as $mb){
                                        if( $i==0 ){?>
                                            <label>Mobile No</label>
                                            <input type="hidden" name="data[Mobile][0][id]" value="<?php echo $mb['id'];?>" />
                                            <input type="text" name="data[Mobile][0][mobile_no]" value="<?php echo $mb['mobile_no'];?>" />

                            <?php
                                        }else{
                                            echo '<p id="p_'.$mb['id'].'"><input type="hidden" name="data[Mobile]['.$i.'][id]" value="'.$mb['id'].'" />
                                                <input type="text" name="data[Mobile]['.$i.'][mobile_no]" value="'.$mb['mobile_no'].'"/>
                                                <a href="javascript:void(0);" class="del_mobile" id="mob_id_'.$mb['id'].'">Delete</a></p>';
                                        }
                                        $i++;
                                    }
                                }
                            ?>       

                        </div>
                    </td>
                    <td>
                        <div style="float:left"><a href="javascript:void(0);" id="add_more_mobile">Add More Mobile</a><br/></div>
                    </td>
                </tr>
            </table>       
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Representative.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Representative.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Representatives'), array('action' => 'index')); ?></li>
	</ul>
</div>
<script>
    $(document).ready(function(){        
        var total_mobile = <?php echo count($this->request->data['Mobile']);?>;
        $("#add_more_mobile").click(function(){
            $(".mobile_nos").append('<br /><input type="text" name="data[Mobile]['+total_mobile+'][mobile_no]" class="mobile_no" />');
            total_mobile++;
        });
        
        $(".del_mobile").click(function(){
            if( confirm('Are you sure you want to delete this mobile no?') ){
                var mobile_id = $(this).attr('id').replace('mob_id_','');
                $.ajax({
                   url:"<?php echo Configure::read('base_url');?>/representatives/delete_mobile",
                   type:'post',
                   data:'id='+mobile_id,
                   success:function(res){
                       if( res=='success' ){
                           $("#p_"+mobile_id).remove();
                           alert('Mobile number has been removed');
                       }
                   }
                });
            }
        });
        
        $("#RepresentativeHouseId").change(function(){
            if($("#RepresentativeType").val()=='sr'){
                select_superviser();
            }
        });
        
        $("#RepresentativeType").change(function(){            
           if( $(this).val()=='sr' ){
               select_superviser();
           }else{
               $("#RepresentativeSsId").html('');
           } 
        });
        
        function select_superviser(){
            $.ajax({
                url:'/representatives/ajax_ss_list',
                type:'post',
                data:'house_id='+$("#RepresentativeHouseId").val(),
                success:function(resp){
                    var options = $.parseJSON(resp);

                    var ss = '';

                    if( typeof(options['error']) != "undefined" ){
                        alert(options['error']);
                    }else{
                        $.each(options, function(ind, val){
                            ss += '<option value="'+ind+'">'+val+'</option>';
                        });
                        $("#RepresentativeSsId").html(ss);
                        //$("#div_ss").show();
                    }
                }
            });
        }
    });
</script>
