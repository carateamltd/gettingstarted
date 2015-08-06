<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 17:02:58
         compiled from "application/views/templates/view-notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2798697125583e8d2db1fe6-94433559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6c15b40a4ed967e3543cd93aa1254f99df57b21' => 
    array (
      0 => 'application/views/templates/view-notification.tpl',
      1 => 1429789572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2798697125583e8d2db1fe6-94433559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'admin_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583e8d2e8aa62_25286356',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583e8d2e8aa62_25286356')) {function content_5583e8d2e8aa62_25286356($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
notification_listing.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
common.js"></script>

<style>
.push{
		background: url('../assets/images/push.png');
		background-repeat: no-repeat;
		width: 47px;
		height: 43px;
		display: inline-table;
}
.pushmobile
{
		background: url('../assets/images/push.png');
		background-repeat: no-repeat;
		width: 12px;
		height: 18px;
		display: inline-table;
		background-size: 16px;
}
</style>
<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="pushmobile"></i></a> <span class="separator"></span></li>
            <li><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
				 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Push Notification'){?>
					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

				 <?php }?>
			<?php } ?>  </li>
    </ul>
    <div class="pageheader">
        	<div class="pageicon"><span class="push"></span></div>
            <div class="pagetitle">
                <h5><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='All Features Summary'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?></h5>
                <h1>
                	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Push Notification'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?>
               </h1>
            </div>
    </div>
    
    <div class="maincontent">
        	<div class="maincontentinner">
             
            <form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/action_update" method="post">
  			<input type="hidden" name="action" id="action">
		    <div class="row-fluid">
		        <div class="span12">
		         <!-- BEGIN EXAMPLE TABLE widget-->
		        <div class="widget purple">
		        
		                <h4 class="widgettitle">
                        <i class="icon-reorder"></i>
					    <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						   <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?>
						  <?php }else{ ?>
							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Client'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?>
						  <?php }?>	
					   
					 
					 </h4>
		                <span class="tools">
		                    <a href="javascript:;" class=""></a>
		                    <a href="javascript:;" class=""></a>
		                </span>
				
		        <div class="widget-body">
		        	<div class="clearfix">
			            <div class="btn-group">
			            </div>
			            <div class="btn-group pull-right" style="display:none;">
			                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
			                </button>
			                <ul class="dropdown-menu pull-right">
			                    <li><a href="#">Print</a></li>
			                    <li><a href="#">Save as PDF</a></li>
			                    <li><a href="#">Export to Excel</a></li>
			                </ul>
			            </div>
		        	</div>
				
		        
		       <div class="space15">
                    <div class="pull-right">
	                    <!--<button type="submit" id="btn-active" class="btn green" onclick="check_all();" >Make Active</button>
	                    <button type="submit" id="btn-inactive" class="btn green">Make Inactive</button>-->
	                    <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
notification/create" class="btn btn-primary"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add New'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?> <i class="icon-plus"></i></a>
						<!--<button type="submit" id="btn-delete" class="btn green">Delete</button>-->
                    </div>
                </div>
		    <table class="table table-striped table-bordered" id="AdminlistId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th width="5%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                        <th width="40%"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Message'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?></th>
                        <th width="10%"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Send'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?></th>                        
				    <th width="10%"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Send Date'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?></th>                        
                        <th width="8%" style="text-align:center;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?></th>
                        <!--<th width="10%" style="text-align:center;">Delete</th>				    -->
                    </tr>
                </thead>
            </table>         
		        <!-- END EXAMPLE TABLE widget-->
			</div>   
			<!-- END PAGE CONTENT-->         
		</div>
	</form>
                  <div class="clearfix"></div>
                  
                  <br /><br /><br /><br /><br /><br /> <br /> <br /><br /> <br /> <br />
                <div class="footer">
                	  <div class="footer-left">
                        <span>Copyright &copy; 2014 Easy Apps All rights reserved.</span>
                    </div>
                    <div class="footer-right">
                      <!--  <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
                    </div>
                </div>
    		</div>
            
            
    </div>
</div>


<!--<div id="main-content">-->
	<!-- BEGIN PAGE CONTAINER-->
 	<!--<div class="container-fluid">-->
	    <!-- BEGIN PAGE HEADER-->   
	<!--    <div class="row-fluid">
	        <div class="span12">-->
	            <!-- BEGIN THEME CUSTOMIZER-->
	           <!-- <div id="theme-change" class="hidden-phone">
	                <i class="icon-cogs"></i>
	                <span class="settings">
	                    <span class="text">Theme Color:</span>
	                    <span class="colors">
	                        <span class="color-default" data-style="default"></span>
	                        <span class="color-green" data-style="green"></span>
	                        <span class="color-gray" data-style="gray"></span>
	                        <span class="color-purple" data-style="purple"></span>
	                        <span class="color-red" data-style="red"></span>
	                    </span>
	                </span>
	            </div>-->
	        <!-- END THEME CUSTOMIZER-->
	        
	        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
		        <!--<h3 class="page-title">
		            
		        </h3>-->
			        <!--ul class="breadcrumb">
			            <li>
			                <li>
			                    <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">Dashboard</a>
			                    <span class="divider">/</span>
			                </li>
			            </li>
			            <li class="active">
			             
						  <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						   Administrator
						  <?php }else{ ?>
							Client
						  <?php }?>			  
			            </li>
			            <li class="pull-right search-wrap">
			                <form action="search_result.html" class="hidden-phone">
			                    <div class="input-append search-input-area">
			                        <input class="" id="appendedInputButton" type="text">
			                        <button class="btn" type="button"><i class="icon-search"></i> </button>
			                    </div>
			                </form>
			            </li>
			        </ul-->
	        <!-- END PAGE TITLE & BREADCRUMB-->
	       	<!--</div>-->
	    <!-- END PAGE HEADER-->  	
	  <!--  </div>-->
		 	<!-- BEGIN PAGE CONTENT-->
	<!--	 	
		</div>-->
	<!-- END PAGE CONTAINER-->

<!--</div>-->
<?php }} ?>