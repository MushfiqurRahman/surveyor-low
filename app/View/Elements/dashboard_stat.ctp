<!-- BEGIN DASHBOARD STATS -->
<div class="row-fluid">
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat blue">
                        <div class="visual">
                                <i class="icon-comments"></i>
                        </div>
                        <div class="details">
                                <div class="number">
                                        <?php echo isset($achievements['total_allocation']) ? $achievements['total_allocation'] : 0;?>
                                </div>

                        </div>
                        <a class="more" href="#">
                        Total Allocation
                        </a>						
                </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat gold">
                        <div class="visual">
                                <i class="icon-shopping-cart"></i>
                        </div>
                        <div class="details">
                                <div class="number"><?php echo isset($achievements['target_till_date']) ? $achievements['target_till_date'] : 0;?></div>

                        </div>
                        <a class="more" href="#">
                        Target Till Date
                        </a>						
                </div>
        </div>
        <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
                <div class="dashboard-stat purple">
                        <div class="visual">
                                <i class="icon-globe"></i>
                        </div>
                        <div class="details">
                                <div class="number"><?php echo isset($achievements['achieved_total']) ? $achievements['achieved_total'] : 0;?></div>

                        </div>
                        <a class="more" href="#">
                        Achieved Till Date
                        </a>						
                </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat green">
                        <div class="visual">
                                <i class="icon-shopping-cart"></i>
                        </div>
                        <div class="details">
                                <div class="number"><?php echo (isset($achievements['achievement_parcentage']) ? $achievements['achievement_parcentage'] : 0).'%';?></div>

                        </div>
                        <a class="more" href="#">
                        Achievement Percentage
                        </a>						
                </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
                <div class="dashboard-stat yellow">
                        <div class="visual">
                                <i class="icon-bar-chart"></i>
                        </div>
                        <div class="details">
                                <div class="number"><?php echo isset($achievements['required_rate']) ? $achievements['required_rate'] : 0;?></div>

                        </div>
                        <a class="more" href="#">
                        Required Rate
                        </a>						
                </div>
        </div>
</div>
<!-- END DASHBOARD STATS -->