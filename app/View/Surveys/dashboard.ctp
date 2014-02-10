<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
            <div class="span12">
                    <!-- BEGIN STYLE CUSTOMIZER-->
                    <div class="styler-panel hidden-phone">
                            <i class="icon-cog"></i>
                            <i class="icon-remove"></i>
                            <span class="settings">
                            <span class="text">Style:</span>
                            <span class="colors">
                            <span class="color-default" data-style="default"></span>
                            <span class="color-blue" data-style="blue"></span>
                            <span class="color-light" data-style="light"></span>		
                            </span>
                            <span class="layout">
                            <label class="hidden-phone">
                            <input type="checkbox" class="header" checked="" value="" />Fixed Header
                            </label>							
                            </span>
                            </span>
                    </div>
                    <!-- END STYLE CUSTOMIZER-->    	
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->		
                    <h3 class="page-title">
                            Dashboard
                            <small>statistics and more</small>
                    </h3>
                    <ul class="breadcrumb">
                            <li>
                                    <i class="icon-home"></i>
                                    <a href="index.html">Home</a> 
                                    <span class="icon-angle-right"></span>
                            </li>
                            <li><a href="#">Dashboard</a></li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
    </div>
    <!-- END PAGE HEADER-->
    <div id="dashboard">
            <?php echo $this->element('dashboard_stat');?>
            <div class="clearfix"></div>

            <div class="row-fluid">
                    <div class="span12">
                    <!-- BEGAIN MAIN CONTENT-->

                    <div class="portlet box red">
                            <div class="portlet-title">
                                    <h4><i class="icon-info-sign"></i>For Further Information</h4>
                                    <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"></a>
                                    </div>
                            </div>
                            <div class="portlet-body">
                                    <div style="height:75px;">
                                    <?php echo $this->Form->create('Survey',array('type' => 'post', 'action' => 'report', 'class' => 'form-horizontal'));?>
                                            <div style="width:20%; margin-left:50px;">
                                                    <label>Dispatch Details</label>
                                            </div>

                                            <div style="width:100%; margin-top:10px; margin-left:50px;">
                                                <?php 
                                                    echo $this->Form->input('Region.id',array('type' => 'select', 
                                                        'options' => $regions, 'empty' => 'All Region', 'label' => false,
                                                        'class' => 'regionId', 'id' => 'first', 'style' => 'width:23%;float:left;',
                                                        'div' => false));

                                                    echo $this->Form->input('Area.id', array('type' => 'select', 
                                                        'options' => array(), 'empty' => 'All Area','label' => false,
                                                        'id' => 'area_first', 'class' => 'areaId', 'style' => 'width:23%;float:left; margin-left:15px;','div' => false));

                                                    echo $this->Form->input('House.id', array('type' => 'select',
                                                        'options' => array(), 'empty' => 'All House','label' => false,
                                                        'id' => 'house_first', 'style' => 'width:23%;float:left; margin-left:15px; margin-right:20px;',
                                                        'div' => false));

                                                    //echo $this->Form->end(array('label' => 'Submit', 'class' => 'mws-button orange','style' => 'float:left; margin-top:-2px;'));
                                                ?>										
                                                    <input type="submit" value="Submit" class="btn green" style="margin-top:-2px;"/>
                                                    <input type="reset" value="Reset" class="btn red" style="margin-top:-2px;"/>
                                                    <?php echo $this->Form->end();?>
                                            </div>
                                    </form>
                                    </div>
                                
                                <?php if($loggedinUser['is_cc']){?>
                                
                                <div style="height:75px;">
                                    <?php echo $this->Form->create('Feedback',array('type' => 'post', 'action' => 'feedback_report', 'class' => 'form-horizontal'));?>
                                            <div style="width:20%; margin-left:50px;">
                                                    <label>Customer Care Feedback</label>
                                            </div>

                                            <div style="width:100%; margin-top:10px; margin-left:50px;">
                                                <?php 
                                                    echo $this->Form->input('Region.id',array('type' => 'select', 
                                                        'options' => $regions, 'empty' => 'All Region', 'label' => false,
                                                        'class' => 'regionId', 'id' => 'second', 'style' => 'width:23%;float:left;',
                                                        'div' => false));

                                                    echo $this->Form->input('Area.id', array('type' => 'select', 
                                                        'options' => array(), 'empty' => 'All Area','label' => false,
                                                        'id' => 'area_second', 'class' => 'areaId', 'style' => 'width:23%;float:left; margin-left:15px;','div' => false));

                                                    echo $this->Form->input('House.id', array('type' => 'select',
                                                        'options' => array(), 'empty' => 'All House','label' => false,
                                                        'id' => 'house_second', 'style' => 'width:23%;float:left; margin-left:15px; margin-right:20px;',
                                                        'div' => false));

                                                    //echo $this->Form->end(array('label' => 'Submit', 'class' => 'mws-button orange','style' => 'float:left; margin-top:-2px;'));
                                                ?>										
                                                    <input type="submit" value="Submit" class="btn green" style="margin-top:-2px;"/>
                                                    <input type="reset" value="Reset" class="btn red" style="margin-top:-2px;"/>
                                                    <?php echo $this->Form->end();?>
                                            </div>
                                    </form>
                                    </div>
                                
                                
                                
                                <div style="height:125px;">
                                    <?php echo $this->Form->create('Feedback',array('type' => 'post', 'action' => 'caller_panel', 'class' => 'form-horizontal'));?>
                                            <div style="width:20%; margin-left:50px;">
                                                    <label>Customer Care Caller Panel</label>
                                            </div>

                                            <div style="width:100%; margin-top:10px; margin-left:50px;">
                                                <?php 
                                                    echo $this->Form->input('Region.id',array('type' => 'select', 
                                                        'options' => $regions, 'empty' => 'All Region', 'label' => false,
                                                        'class' => 'regionId', 'id' => 'third', 'style' => 'width:23%;float:left;',
                                                        'div' => false));

                                                    echo $this->Form->input('Area.id', array('type' => 'select', 
                                                        'options' => array(), 'empty' => 'All Area','label' => false,
                                                        'id' => 'area_third', 'class' => 'areaId', 'style' => 'width:23%;float:left; margin-left:15px;','div' => false));

                                                    echo $this->Form->input('House.id', array('type' => 'select',
                                                        'options' => array(), 'empty' => 'All House','label' => false,
                                                        'id' => 'house_third', 'style' => 'width:23%;float:left; margin-left:15px; margin-right:20px;',
                                                        'div' => false));

                                                    //echo $this->Form->end(array('label' => 'Submit', 'class' => 'mws-button orange','style' => 'float:left; margin-top:-2px;'));
                                                ?>				
<!--                                                <label>Survey Date</label>-->
                                                <input size="30" name="data[Survey][created]" required="required" onFocus="this.value=''" onClick="showCalendarControl(this);" type="text" value="" />   
                                                    <input type="submit" value="Submit" class="btn green" style="margin-top:-2px;"/>
                                                    <input type="reset" value="Reset" class="btn red" style="margin-top:-2px;"/>
                                                    <?php echo $this->Form->end();?>
                                            </div>
                                    </form>
                                </div>
                                <?php }?>

                            </div>
                        </div>
                    </div>

                            <!-- BEGIN STACK CHART CONTROLS PORTLET-->
                    <div class="portlet box yellow">
                            <div class="portlet-title">                                                            
                                    <h4><i class="icon-reorder"></i>Till Date (%) By Region</h4>
                                    <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"></a>
                                    </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <h5>Disbursed by Region</h5>
                                    <ul>
                                    <?php
                                        if( isset($regionwise_achievements) && !empty($regionwise_achievements) ){
                                            foreach( $regionwise_achievements as $rg => $v ){
                                                echo '<li>'.$rg.' '.$v['total_disbursed'].'</li>';
                                            }
                                        }
                                    ?>
                                    </ul>
                                </div>
                                    <div id="chart_div" style="width: 950px; height: 300px;"></div>
                            </div>
                    </div>
                    <!-- END STACK CHART CONTROLS PORTLET-->
                            <!-- END MAIN CONTENT-->
                    </div>
            </div>


    </div>

<script>
	var base_url = '<?php echo Configure::read('base_url');?>';
	$(document).ready(function(){		
		$(".regionId").change(function(e){
			find_areas( $(this).val(), $(this).attr('id') );
		});
                
                $(".areaId").change(function(){                    
                    find_houses( $(this).val(), $(this).attr('id') );	
                });
		
		function find_areas( regionId, elementId ){                    
			$.ajax({
				url: base_url+'areas/ajax_area_list',
				type: 'post',
				data: 'region_id='+regionId,
				success: function(response){					
					var areas = $.parseJSON(response);
					var areaId = 'area_'+elementId;	
                                        $("#area_"+elementId).html('<select name="data[Area][id]" id="area_'+elementId+'"><option value="">All Area</option></select>');
                                        $("#house_"+elementId).html('<select name="data[House][id]" id="house_'+elementId+'"><option value="">All House</option></select>');
					$.each(areas, function(ind,val){                                            
						$('#area_'+elementId).append('<option value="'+ind+'">'+val+'</option>');						
					});
				}
			});
		}
                
                function find_houses( areaId, elementId ){                   
                    $.ajax({
                            url: base_url+'houses/ajax_house_list',
                            type: 'post',
                            data: 'area_id='+areaId,
                            success: function(response){                                
                                    var houses = $.parseJSON(response);
                                    var houseId = 'house_'+elementId.substring(5,elementId.length);	
                                    $("#"+houseId).html('<select name="data[House][id]" id="'+houseId+'"><option value="">All House</option></select>');
                                    $.each(houses, function(ind,val){
                                        
                                            $('#'+houseId).append('<option value="'+ind+'">'+val+'</option>');						
                                    });
                            }
                    });                
                }
	});
</script>