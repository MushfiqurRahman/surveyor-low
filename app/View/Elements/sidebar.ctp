		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
		
		<!-- BEGIN LOGO -->
				</br>
				
				<a class="brand" href="index.html">
				<img src="<?php echo Configure::read('base_url');?>assets/img/logo.png" alt="logo" />
				</a>
				
				</br></br>
		<!-- END LOGO -->
				
			<!-- BEGIN SIDEBAR MENU -->
			<ul>
				<li class="active">
					<a href="<?php echo Configure::read('base_url');?>surveys/dashboard">
					<i class="icon-home"></i> Dashboard
					<span class="selected"></span>
					</a>					
				</li>
				<li><a class="" href="javascript:;" class=""><i class="icon-calendar"></i> Update</a></li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					<i class="icon-briefcase"></i> Download Zone
					<span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="ui_general.html">SMS Manual</a></li>
						<li><a class="" href="ui_buttons.html">UI Manual</a></li>
					</ul>
				</li>
                                <li>
                                    <?php echo $this->Html->link('Logout',array('controller' =>'users','action' =>'logout'), array('class' => 'icon-user'));?>
                                </li>
<!--				<li><a class="" href="login.html"><i class="icon-user"></i> Logout</a></li>-->
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->