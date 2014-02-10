	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
            
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="<?php echo Configure::read('base_url');?>assets/img/menu-toggler.png" alt="" />
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->				
				<!-- BEGIN TOP NAVIGATION MENU -->					
				<ul class="nav pull-right">
					<!-- BEGIN NOTIFICATION DROPDOWN -->	
					<li class="dropdown" id="header_notification_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-warning-sign"></i>
						<span class="badge">4</span>
						</a>
						<ul class="dropdown-menu extended notification">
							<li>
								<p>4 Users Online</p>
							</li>
							<li>
								<a href="#">
								<span class="label label-success"></i></span>
								Admin
								<span class="time">Just now</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-important"></span>
								Imran
								<span class="time">15 mins</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-warning"></span>
								Kaisar
								<span class="time">22 mins</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-info"></span>
								Baral
								<span class="time">40 mins</span>
								</a>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="<?php echo Configure::read('base_url');?>assets/img/avatar_small.png"/>
						<span class="username">Welcome, Admin</span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li class="divider"></li>
							<li><?php echo $this->Html->link('Logout',array('controller' => 'users','action'=>'logout'), array('class' => 'icon-key'));?></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->	
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->