<div id="dashboard">

    <div class="clearfix"></div>

    <div class="row-fluid">
            <div class="span12">
                <?php 
                if( isset($target_achieved) ){
                    echo '<font color="red"><b>Your selected house(s) feedback target already filled! Better you select '.
                    'other Region/Area/House/Date.</b></font>';
                }
                else if( !empty($survey) ){ 
                    //pr($survey);
                ?>
            <!-- BEGAIN MAIN CONTENT-->
            <div class="portlet box green">
                    <div class="portlet-title">
                            <h4><i class="icon-info-sign"></i>Caller Info</h4>
                            <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                            </div>
                    </div>
                <?php //pr($survey);?>
                    <div class="portlet-body">
                            <h5>House Name : <?php echo $survey['House']['title'];?></h5>
                            <h5>Today's Submission: <?php echo $todays_total_fb_by_cc;?></h5>
                            <h5 style="background:yellow; font-weight:bold;">Consumer Mobile Number: <?php echo $survey['Survey']['phone'];?></h5>
                    </div>
            </div>

            <!-- BEGAIN FILTERING PORTLET-->
            <div class="portlet box red">
                    <div class="portlet-title">
                            <h4><i class="icon-info-sign"></i>PTR Back Check Form - For Call Centre</h4>
                            <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                            </div>
                    </div>
                    <div class="portlet-body">
                            <div style="height:900px;">

                            <form class="form-horizontal" name="search" method="post" action="" id="">

    <div>
            <div class="control-group">
                <?php //echo $this->Form->create('Feedback',array('type' => 'post','action' => 'caller_panel', 'class' => 'form-horizontal')); ?>
                
                
        <?php
        //pr($survey);
//            if( isset($this->data['Region']['id']) ){
//                echo $this->Form->input('Region.id',array('type' => 'hidden'));
//            }
//            if( isset($this->data['Area']['id']) ){
//                echo $this->Form->input('Area.id', array('type' => 'hidden'));
//            }
//            if( isset( $this->data['House']['id']) ){
//                echo $this->Form->input('House.id', array('type' => 'hidden'));
//            }
        ?>
                
                <input type="hidden" name="data[Region][id]" value="<?php echo $this->data['Region']['id'];?>"/>
                <input type="hidden" name="data[Area][id]" value="<?php echo $this->data['Area']['id'];?>"/>
                <input type="hidden" name="data[House][id]" value="<?php echo $this->data['House']['id'];?>"/>
                <input type="hidden" name="data[Survey][created]" value="<?php echo $this->data['Survey']['created'];?>"/>
                <input type="hidden" name="data[Feedback][survey_id]" value="<?php echo $survey['Survey']['id'];?>"/>
        
<label class="control-label-cc" style="font-weight:bold;">1. Aapni Ki <?php echo $survey['Survey']['name'];?> Shaheb Bolchen?</label>
    <div class="controls-cc" style="margin-left:10px;">
       <?php 
//        echo $this->Form->input('Feedback.is_right_name', array(
//           'type' => 'radio', 'legend' => false,'label' => false,'div' => false,
//            'separator' => '&nbsp;&nbsp;&nbsp;',
//            'required' => true,
//            'options' => array('Right' => 'Right', 'Wrong' => 'Wrong', 'Duplicate Consumer' => 'Duplicate Consumer'),
//           
//       ));?>
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_name]" value="Right" required="required">
        Right
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_name]" value="Wrong" required="required">
        Wrong
        </label>   
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_name]" value="Duplicate Consumer" required="required">
        Duplicate Consumer
        </label> 
    </div>

</div>

            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">2. Aapnar Boyosti Ki Bolben? - <?php echo $survey['Survey']['age'];?></label>
    <div class="controls-cc" style="margin-left:10px;">
        <label class="radio">
            
        <input type="radio" name="data[Feedback][is_right_age]" value="Right" required="required">
        Right
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_age]" value="Wrong" required="required">
        Wrong
        </label>   
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_age]" value="Under 18" required="required">
        Under 18
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_age]" value="30+" required="required">
        30+
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_age]" value="N/A" required="required">
        N/A
        </label>
<?php 
//        echo $this->Form->input('Feedback.is_right_age', array(
//           'type' => 'radio', 'legend' => false,'label' => false,'div' => false,
//            'separator' => '&nbsp;&nbsp;&nbsp;',
//            'options' => array('Right' => 'Right', 'Wrong' => 'Wrong', 'Under 18' => 'Under 18',
//                '30+' => '30+', 'N/A' => 'N/A'),
//            'required' => true,
//           
//       ));?>
    </div>
</div>

            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">3. Bortomaney Aapni Ki Koren (Pesha)? - <?php echo $survey['Occupation']['title'];?></label>
    <div class="controls-cc" style="margin-left:10px;">
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_occupation]" value="Right" required="required">
        Right
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_occupation]" value="Wrong" required="required">
        Wrong
        </label> 
        <label class="radio">
        <input type="radio" name="data[Feedback][is_right_occupation]" value="N/A" required="required">
        N/A
        </label>
<?php 
//        echo $this->Form->input('Feedback.is_right_occupation', array(
//           'type' => 'radio', 'legend' => false,'label' => false,'div' => false,
//            'separator' => '&nbsp;&nbsp;&nbsp;',
//            'options' => array('Right' => 'Right', 'Wrong' => 'Wrong', 'N/A' => 'N/A'),
//            'required' => true,
//           
//       ));?>
    </div>
</div>


            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">4. Bortomaney Apni Kon Brand Dhumpan Koren?</label>
    <div class="controls-cc" style="margin-left:10px;">
        <select class="medium m-wrap" tabindex="1" name="data[Feedback][current_brand]">
            <option value="Gold Leaf" />Gold Leaf
            <option value="B &amp; H" />B &amp; H
            <option value="B &amp; H Light" />B &amp; H Light
            <option value="B &amp; H Switch" />B &amp; H Switch
            <option value="Pall Mall" />Pall Mall
            <option value="Marlbro FF" />Marlbro FF
            <option value="Marlbro Gold" />Marlbro Gold
            <option value="Star" />Star
            <option value="Capstain" />Capstain
            <option value="JPGL" />JPGL
            <option value="Navy" />Navy
            <option value="Derby"/>Derby
            <option value="Hollywood"/>Hollywood
            <option value="Marise"/>Marise
            <option value="Rally"/>Rally
            <option value="Sheikh"/>Sheikh
            <option value="Star"/>Star
            <option value="Star Light"/>Star Light
            <option value="Switch"/>Switch
            <option value="PM"/>PM
            <option value="Others"/>Others
            <option value="N/A"/>N/A
            <option value="Non Smoker"/>Non Smoker
        </select>  
    </div>
</div>

            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">5. Aapni Ki Bajarey Gold Leaf Er Simito Somoyer Notun, Adhunik O Aakorshonio Packti Lokkho Koreychen?</label>
    <div class="controls-cc" style="margin-left:10px;">
        <label class="radio">
        <input type="radio" name="data[Feedback][new_pack]" value="Yes" required="required">
        Yes
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][new_pack]" value="No" required="required">
        No
        </label>   
        <label class="radio">
        <input type="radio" name="data[Feedback][new_pack]" value="N/A" required="required">
        N/A
        </label> 

<?php 
//        echo $this->Form->input('Feedback.new_pack', array(
//           'type' => 'radio', 'legend' => false,'label' => false,'div' => false,
//            'separator' => '&nbsp;&nbsp;&nbsp;',
//            'options' => array('Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A'),
//            'required' => true,
//           
//       ));?>
    </div>
</div>

            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">6. Aapni Ki Notun Pack Er Gold Leaf Er Tamak Er Maan Somporke Janen?</label>
    <div class="controls-cc" style="margin-left:10px;">
        <label class="radio">
        <input type="radio" name="data[Feedback][tobacco_quality]" value="Yes" required="required">
        Yes
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][tobacco_quality]" value="No" required="required">
        No
        </label> 
        <label class="radio">
        <input type="radio" name="data[Feedback][tobacco_quality]" value="N/A" required="required">
        N/A
        </label> 

<?php 
//        echo $this->Form->input('Feedback.tobacco_quality', array(
//           'type' => 'radio', 'legend' => false,'label' => false,'div' => false,
//            'separator' => '&nbsp;&nbsp;&nbsp;',
//            'options' => array('Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A'),
//            'required' => true,
//           
//       ));?>
    </div>
</div>

            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">7. Aapni Ki Gold Leaf Er Simito Somoyer Notun, Adhunik O Aakorshonio Packer Kono Video Dekhechilen?</label>
    <div class="controls-cc" style="margin-left:10px;">
        <label class="radio">
        <input type="radio" name="data[Feedback][br_toolkit]" value="Yes" required="required">
        Yes
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][br_toolkit]" value="No" required="required">
        No
        </label>   
        <label class="radio">
        <input type="radio" name="data[Feedback][br_toolkit]" value="N/A" required="required">
        N/A
        </label>
<?php 
//        echo $this->Form->input('Feedback.br_toolkit', array(
//           'type' => 'radio', 'legend' => false,'label' => false,'div' => false,
//            'separator' => '&nbsp;&nbsp;&nbsp;',
//            'options' => array('Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A'),
//            'required' => true,
//           
//       ));?>
    </div>
</div>

            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">8. Aapni Ki Dokan Theke Gold Leaf Er Simito Somoyer Notun, Adhunik O Aakorshonio 2ti Pack Kine Ekti Lighter Upohar Peyechilen?</label>
    <div class="controls-cc" style="margin-left:10px;">
        <label class="radio">
        <input type="radio" name="data[Feedback][got_ptr]" value="Yes" required="required">
        Yes
        </label>
        <label class="radio">
        <input type="radio" name="data[Feedback][got_ptr]" value="No" required="required">
        No
        </label>  
        <label class="radio">
        <input type="radio" name="data[Feedback][got_ptr]" value="N/A" required="required">
        N/A
        </label> 
<?php 
//        echo $this->Form->input('Feedback.got_ptr', array(
//           'type' => 'radio', 'legend' => false,'label' => false,'div' => false,
//            'separator' => '&nbsp;&nbsp;&nbsp;',
//            'options' => array('Yes' => 'Yes', 'No' => 'No', 'N/A' => 'N/A'),
//            'required' => true,
//           
//       ));?>
    </div>
</div>
      

    <hr />

            <div class="control-group">
<label class="control-label-cc" style="font-weight:bold;">Gold Leaf Er Sathei Thakun. Aamake Etokkhon Somoy Deyar Jonno Aapnake Dhonnobad.</label>
</div>

            <!-- 3rd row end -->

    </div>

    <div style="margin:0 auto;width:100%;text-align:center">
            <table><tr>
            
            <td>
                <input class="btn green btn-block" value="Submit & Next" type="submit" name="data[Feedback][save]"/>
                <?php echo $this->Form->end();?>
            </td>
            <form class="form-horizontal" name="search2" method="post" action="" id="">
            <td>                
                <input type="hidden" name="data[Region][id]" value="<?php echo $this->data['Region']['id'];?>"/>
                <input type="hidden" name="data[Area][id]" value="<?php echo $this->data['Area']['id'];?>"/>
                <input type="hidden" name="data[House][id]" value="<?php echo $this->data['House']['id'];?>"/>
                <input type="hidden" name="data[Survey][created]" value="<?php echo $this->data['Survey']['created'];?>"/>
                <input type="hidden" name="data[Feedback][survey_id]" value="<?php echo $survey['Survey']['id'];?>"/>
                <input class="btn yellow btn-block" value="Skip & Next" type="submit" name="data[Feedback][skip]"/>
                <?php echo $this->Form->end();?>
            </td>
            </tr></table>
    </div>
    <?php echo $this->Form->end();?>
                            </div>
                            </div>
                    </div>
            </div>
            <!-- END FILTERING PORTLET-->
            <?php }//end of if
                else{
                    echo 'Please select another Region/Area/House, there is no survey found for the selected Region/Area/House';
                    
                }
            ?>


                    <!-- END MAIN CONTENT-->
            </div>
    </div>