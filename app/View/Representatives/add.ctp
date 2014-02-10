<div class="representatives form">
<?php echo $this->Form->create('Representative'); ?>
	<fieldset>
		<legend><?php echo __('Add BR or Superviser'); ?></legend>
	<?php
		echo $this->Form->input('house_id');
		echo $this->Form->input('name', array('required' => true));
                echo $this->Form->input('br_code', array('label' => 'Br Code(If not superviser)'));
    ?>
                <div class="mobile_nos">
                    <label>Mobile No</label>
                    <input type="text" name="data[Mobile][0][mobile_no]" class="mobile_no"/>                
                    <a href="javascript:void(0);" id="add_more_mobile">Add More mobile</a>
                </div>
                
                <?php 
                    echo $this->Form->input('type',array('type' => 'select','options' => 
                        array('br' => 'BR','superviser' => 'Superviser'), 'empty' => 'Select type'));
                ?>
        
                <div id="div_ss" style="display:none;">
                    <label>Select Superviser</label>
                    <select id="ss_id" name="data[Representative][superviser_id]"></select>
                </div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Representatives'), array('action' => 'index')); ?></li>		
	</ul>
</div>
<script>
    $(document).ready(function(){        
        var total_mobile = 1;
        $("#add_more_mobile").click(function(){
            $(".mobile_nos").append('<br /><input type="text" name="data[Mobile]['+total_mobile+'][mobile_no]" class="mobile_no" />');
            total_mobile++;
        });
        
        $("#RepresentativeHouseId").change(function(){
            if($("#RepresentativeType").val()=='br'){
                select_superviser();
            }
        });
        
        $("#RepresentativeType").change(function(){            
           if( $(this).val()=='br' ){
               select_superviser();
           }else{
               $("#ss_id").html('');
           } 
        });
        
        function select_superviser(){
            $.ajax({
                  url:"<?php echo Configure::read('base_url')?>/representatives/ajax_superviser_list",
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
                            $("#ss_id").html(ss);
                            $("#div_ss").show();
                        }
                  }
             });
        }
    });
</script>
