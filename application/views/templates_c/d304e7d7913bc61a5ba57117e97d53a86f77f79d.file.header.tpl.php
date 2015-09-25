<?php /* Smarty version Smarty-3.1.11, created on 2015-09-25 18:57:32
         compiled from "application/views/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8419581615582a05c1074a8-04656769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd304e7d7913bc61a5ba57117e97d53a86f77f79d' => 
    array (
      0 => 'application/views/templates/header.tpl',
      1 => 1443182100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8419581615582a05c1074a8-04656769',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5582a05c194cd8_84889905',
  'variables' => 
  array (
    'lang' => 0,
    'data' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582a05c194cd8_84889905')) {function content_5582a05c194cd8_84889905($_smarty_tpl) {?><!--  top_menutop_menutop_menutop_menutoppp  BEGIN TOP NAVIGATION BAR -->
<div class="logo">
<?php if ($_smarty_tpl->tpl_vars['lang']->value[0]['rField']=='Connexion'){?>
<a class="brand" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">
           <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['logo_name_fr'];?>
" alt="SLB" /> 
  </a>
<?php }elseif($_smarty_tpl->tpl_vars['lang']->value[0]['rField']!='Connexion'){?>
<a class="brand" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">
           <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['logo_name_en'];?>
" alt="SLB" /> 
  </a>
<?php }?>
	
</div>
<div class="headerinner">
	<ul class="headmenu">
    	<li class="right">
        	<div class="userloggedinfo">
            		 <!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
profle.png" alt=""> -->
                     <div class="userinfo">
                     	<h5><?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['vLastName'];?>
</h5>
                        <ul>
                        	<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['iAdminId'];?>
" data-toggle="modal">
                             <i class="icon-pencil helper-font-24"></i>
                             <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                   <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='My Profile'){?>
                                      <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                   <?php }?>
                                  <?php } ?>
                             </a></li>
                            <!--<li><a href="#"><i class="icon-cog"></i> My Settings</a></li>-->
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
logout"><i class="icon-key"></i>
                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                   <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Log Out'){?>
                                      <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                   <?php }?>
                                  <?php } ?></a></li>
                        </ul>
                     </div>
            </div>
        </li>
    </ul>
</div>

<!--<div class="navbar-inner">
   	<div class="container-fluid">-->
      	<!--BEGIN SIDEBAR TOGGLE-->
      <!-- 	<div class="sidebar-toggle-box hidden-phone">
           <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
       	</div>-->
       	<!--END SIDEBAR TOGGLE-->
       	<!-- BEGIN LOGO -->
       	<!--<a class="brand" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">
           <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
logo.png" alt="SLB" /> 
       	</a>-->
		<!-- END LOGO -->
       	<!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <!-- 	<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
           	<span class="icon-bar"></span>
           	<span class="icon-bar"></span>
           	<span class="icon-bar"></span>
           	<span class="arrow"></span>
       	</a>-->
        <!-- mayur gajjar language -->
       <!--  <div id="language" style="">
        	<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home/index?lang=rEnglish" title="Uk"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/images/en.png"></a>
        	<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home/index?lang=rFrench" title="France"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/images/fr.png"></a>
          
          
        </div> -->
       	<!-- END RESPONSIVE MENU TOGGLER -->
    <!--   	<div id="top_menu" class="nav notify-row">-->
           	<!-- BEGIN NOTIFICATION -->
           <!--	<ul class="nav top-menu">-->
               	<!-- BEGIN SETTINGS -->
             <!--  	<li class="dropdown">-->
                   	<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       	<i class="icon-tasks"></i>
                       	<span class="badge badge-important">6</span>
                   	</a> -->
                   	<!-- <ul class="dropdown-menu extended tasks-bar">
                       	<li>
                           	<p>You have 6 pending tasks</p>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">44%</div>
                               	</div>
                               	<div class="progress progress-striped active no-margin-bot">
                                <div class="bar" style="width: 44%;"></div>
                               	</div>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<div class="task-info">
                                   	<div class="desc">Database Update</div>
                                   	<div class="percent">65%</div>
                               	</div>
                               	<div class="progress progress-striped progress-success active no-margin-bot">
                                   	<div class="bar" style="width: 65%;"></div>
                               	</div>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<div class="task-info">
                                   	<div class="desc">Iphone Development</div>
                                   	<div class="percent">87%</div>
                               	</div>
                               	<div class="progress progress-striped progress-info active no-margin-bot">
                                   	<div class="bar" style="width: 87%;"></div>
                               	</div>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<div class="task-info">
                                   	<div class="desc">Mobile App</div>
                                   	<div class="percent">33%</div>
                               	</div>
                               	<div class="progress progress-striped progress-warning active no-margin-bot">
                                   	<div class="bar" style="width: 33%;"></div>
                               	</div>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<div class="task-info">
                                   	<div class="desc">Dashboard v1.3</div>
                                   	<div class="percent">90%</div>
                               	</div>
                               	<div class="progress progress-striped progress-danger active no-margin-bot">
                                   	<div class="bar" style="width: 90%;"></div>
                               	</div>
                           	</a>
                       	</li>
                       	<li class="external">
                           	<a href="#">See All Tasks</a>
                       	</li>
                   	</ul>
               	</li> -->
               	<!-- END SETTINGS -->
               	<!-- BEGIN INBOX DROPDOWN -->
               	<!-- <li class="dropdown" id="header_inbox_bar">
                   	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       	<i class="icon-envelope-alt"></i>
                       	<span class="badge badge-important">5</span>
                   	</a>
                   	<ul class="dropdown-menu extended inbox">
                       	<li>
                           	<p>You have 5 new messages</p>
                       	</li>
                       	<li>
                           	<a href="#">
                            <span class="photo"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
avatar-mini.png" alt="avatar" /></span>
                            <span class="subject">
                            <span class="from">Jonathan Smith</span>
                            <span class="time">Just now</span>
                            </span>
                            <span class="message">
                                Hello, this is an example msg.
                            </span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="photo"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
avatar-mini.png" alt="avatar" /></span>
                            	<span class="subject">
                            	<span class="from">Jhon Doe</span>
                            	<span class="time">10 mins</span>
                            	</span>
                            	<span class="message">
                             	Hi, Jhon Doe Bhai how are you ?
                            	</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="photo"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
avatar-mini.png" alt="avatar" /></span>
                            	<span class="subject">
                            	<span class="from">Jason Stathum</span>
                            	<span class="time">3 hrs</span>
                            	</span>
                            	<span class="message">
                                This is awesome dashboard.
                            	</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="photo"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
avatar-mini.png" alt="avatar" /></span>
                            	<span class="subject">
                            	<span class="from">Jondi Rose</span>
                            	<span class="time">Just now</span>
                            	</span>
                            	<span class="message">
                                Hello, this is metrolab
                            	</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">See all messages</a>
                       	</li>
                   	</ul>
               	</li> -->
               	<!-- END INBOX DROPDOWN -->
               	<!-- BEGIN NOTIFICATION DROPDOWN -->
               	<!-- <li class="dropdown" id="header_notification_bar">
                   	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bell-alt"></i>
                       	<span class="badge badge-warning">7</span>
                   	</a>
                   	<ul class="dropdown-menu extended notification">
                       	<li>
                           	<p>You have 7 new notifications</p>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="label label-important"><i class="icon-bolt"></i></span>
                               	Server #3 overloaded.
                               	<span class="small italic">34 mins</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="label label-warning"><i class="icon-bell"></i></span>
                               	Server #10 not respoding.
                               	<span class="small italic">1 Hours</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="label label-important"><i class="icon-bolt"></i></span>
                               	Database overloaded 24%.
                               	<span class="small italic">4 hrs</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="label label-success"><i class="icon-plus"></i></span>
                               	New user registered.
                               	<span class="small italic">Just now</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">
                               	<span class="label label-info"><i class="icon-bullhorn"></i></span>
                               	Application error.
                               	<span class="small italic">10 mins</span>
                           	</a>
                       	</li>
                       	<li>
                           	<a href="#">See all notifications</a>
                       	</li>
                   	</ul>
               	</li> -->
               	<!-- END NOTIFICATION DROPDOWN -->
		<!--	</ul>
       	</div>-->
       	<!-- END  NOTIFICATION -->
 <!--   <div class="top-nav ">
        <ul class="nav pull-right top-menu" >-->
            <!-- BEGIN SUPPORT -->
            <!--<li class="dropdown mtop5">

            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
            <i class="icon-comments-alt"></i>
                </a>
               	</li>
               	<li class="dropdown mtop5">
                   	<a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                    <i class="icon-headphones"></i>
                   	</a>
               	</li>-->
            <!-- END SUPPORT -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
              <!-- 	<li class="dropdown">
                   	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
profle.png" alt="" style="height:37px;"> <?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['vLastName'];?>
-->
                       	<!-- <span class="username"><?php echo $_smarty_tpl->tpl_vars['data']->value['slb_administrator']['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['slb_administrator']['vLastName'];?>
</span> -->
                     <!--  	<b class="caret"></b>
                   	</a>
                   	<ul class="dropdown-menu extended logout">
                       	<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/update/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['iAdminId'];?>
" data-toggle="modal">
                         <i class="icon-pencil helper-font-24"></i>
                         My Profile</a></li>-->
                       	<!--<li><a href="#"><i class="icon-cog"></i> My Settings</a></li>-->
                       <!--	<li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
logout"><i class="icon-key"></i> Log Out</a></li>
                   	</ul>
               	</li>-->
               	<!-- END USER LOGIN DROPDOWN -->
       <!-- </ul>-->
        <!-- END TOP NAVIGATION MENU -->
  <!--  </div>
   </div>
</div>-->
<!-- END TOP NAVIGATION BAR -->
<?php }} ?>