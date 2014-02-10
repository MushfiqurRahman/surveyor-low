<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
    
    <link href="<?php echo Configure::read('base_url');?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo Configure::read('base_url');?>assets/css/metro.css" rel="stylesheet" />
	<link href="<?php echo Configure::read('base_url');?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo Configure::read('base_url');?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo Configure::read('base_url');?>assets/css/style.css" rel="stylesheet" />
	<link href="<?php echo Configure::read('base_url');?>assets/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo Configure::read('base_url');?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="<?php echo Configure::read('base_url');?>assets/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Configure::read('base_url');?>assets/uniform/css/uniform.default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Configure::read('base_url');?>assets/bootstrap-daterangepicker/daterangepicker.css" />
	<link href="<?php echo Configure::read('base_url');?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo Configure::read('base_url');?>assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
	
	<link href="<?php echo Configure::read('base_url');?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo Configure::read('base_url');?>assets/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" href="<?php echo Configure::read('base_url');?>assets/data-tables/DT_bootstrap.css" />
	<link rel="shortcut icon" href="favicon.png" />
        <link href="<?php echo Configure::read('base_url');?>css/CalendarControl.css" rel="stylesheet" />
        
        <script src="<?php echo Configure::read('base_url');?>assets/js/jquery-1.8.3.min.js"></script>	
	<!--[if lt IE 9]>
	<script src="assets/js/excanvas.js"></script>
	<script src="assets/js/respond.js"></script>	
	<![endif]-->	
	<script src="<?php echo Configure::read('base_url');?>assets/breakpoints/breakpoints.js"></script>		
	<script src="<?php echo Configure::read('base_url');?>assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>	
	<script src="<?php echo Configure::read('base_url');?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/js/jquery.blockui.js"></script>	
	<script src="<?php echo Configure::read('base_url');?>assets/js/jquery.cookie.js"></script>
	
	<script src="<?php echo Configure::read('base_url');?>assets/flot/jquery.flot.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/flot/jquery.flot.resize.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/flot/jquery.flot.pie.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/flot/jquery.flot.stack.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/flot/jquery.flot.crosshair.js"></script>
	
	<script type="text/javascript" src="<?php echo Configure::read('base_url');?>assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="<?php echo Configure::read('base_url');?>assets/uniform/jquery.uniform.min.js"></script>	
	<script type="text/javascript" src="<?php echo Configure::read('base_url');?>assets/js/jquery.pulsate.min.js"></script>
	<script type="text/javascript" src="<?php echo Configure::read('base_url');?>assets/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="<?php echo Configure::read('base_url');?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo Configure::read('base_url');?>assets/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo Configure::read('base_url');?>assets/data-tables/DT_bootstrap.js"></script>
	<script src="<?php echo Configure::read('base_url');?>assets/js/app.js"></script>
        
        <script src="<?php echo Configure::read('base_url');?>js/CalendarControl.js"></script>
	
	<!-- BEGAIN CHART JS -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
//        var data = google.visualization.arrayToDataTable([
//          ['Year', 'Achievement Percentage (%)'],
//          ['Dhaka',  90],
//          ['Chittagong',  80],
//          ['Bogura',  92],
//          ['Shylet',  87],
//		  ['Khulna',  83]
//        ]);           

            var data = google.visualization.arrayToDataTable([
                ['Year', 'Achievement Percentage (%)'],
                <?php 
                    foreach($regionwise_achievements as $rg => $ac){
                        echo '["'.$rg.'", '.$ac['parcent_achieved'].'],';
                    }
                ?>
                ]);

        var options = {
          title: '',
          vAxis: {title: 'Region',  titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
	<!-- END CHART JS -->
	
	
	<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.init();
		});
	</script>
</head>
    
<body class="fixed-top">   
    
    <?php echo $this->element('header');?>
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
        
        <?php echo $this->element('sidebar');?>
        <div class="page-content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('links'); ?>
        </div>
        	
    </div>
    <!-- END PAGE -->
    
    <?php echo $this->element('footer');?>
    
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
