<?php /* Smarty version Smarty-3.1.11, created on 2015-09-24 16:38:05
         compiled from "application/views/templates/view-administrator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19109468405587f39194f6f1-14217971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e6a4f6c8f7b3e79007ffd38d11971d52e0b2ee6' => 
    array (
      0 => 'application/views/templates/view-administrator.tpl',
      1 => 1443087481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19109468405587f39194f6f1-14217971',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5587f391b23207_95586431',
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'admin_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5587f391b23207_95586431')) {function content_5587f391b23207_95586431($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
administrator_listing.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
common.js"></script>

  <div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="iconfa-user"></i></a> <span class="separator"></span></li>
            <li><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?></li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?>
               </h1>
            </div>
        </div>
        
      <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">  
        <form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/action_update" method="post">
  			<input type="hidden" name="action" id="action">
		    <div class="row-fluid">
		        <div class="span12">
		         <!-- BEGIN EXAMPLE TABLE widget-->
                 
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
		        <div class="widget purple">
		           <!-- <div class="widget-title">
		                <h4>
					   
					 
					 </h4>
		                
					</div>-->
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
				
		        <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
		            <div class="alert alert-info offset4 span4">
		               <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

		            </div>
		        <?php }?>            
		       <div class="space15">
                    <div class="pull-right">
	                    <button type="submit" id="btn-active" class="btn btn-primary btn-rounded" onclick="check_all" ><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Make Active'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?></button>
	                    <button type="submit" id="btn-inactive" class="btn btn-primary btn-rounded">
	                    	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Make Inactive'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?>
                   </button>
	                    <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
administrator/create" class="btn btn-primary btn-rounded"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add New'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?><i class="icon-plus"></i></a>
	                    <button type="submit" id="btn-delete" class="btn btn-primary btn-rounded">
	                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?></button>
                    </div>
                </div>
		    <table class="table table-striped table-bordered" id="AdminlistId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th width="1%" style="text-align:center;"><input type="checkbox" id="check_all" name="check_all"></th>
                        <th width="25%" style="text-align:center;">
							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Name'){?>
							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

							<?php }?>
							<?php } ?>
						</th>
                        <th width="29%" style="text-align:center;">
                        	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Email'){?>
							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

							<?php }?>
							<?php } ?></th>
                        <th width="20%" style="text-align:center;">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Phone'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?>
                        	</th>
                        <th width="10%" style="text-align:center;">
                        	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        		<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Role'){?>
                        		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        		<?php }?>
                        	<?php } ?>
                        	</th>
                        <th width="9%" style="text-align:center;">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Status'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></th>
                        <th width="6%" style="text-align:center;">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></th>
                        <!-- 
<th width="2%" style="text-align:center;">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></th>
 -->
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['user_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						<tr>
							<td style="text-align:center;background: none !important;"><input type="checkbox" id="check_admin<?php echo $_smarty_tpl->tpl_vars['val']->value['iAdminId'];?>
" name="iId[]" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['iAdminId'];?>
"></td>
							<td style="text-align:center;background: none !important;"><?php echo $_smarty_tpl->tpl_vars['val']->value['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['val']->value['vLastName'];?>
</td>
							<td style="text-align:center;background: none !important;"><?php echo $_smarty_tpl->tpl_vars['val']->value['vEmail'];?>
</td>
							<td style="text-align:center;background: none !important;"><?php echo $_smarty_tpl->tpl_vars['val']->value['vPhone'];?>
</td>
							<td style="text-align:center;background: none !important;"><?php echo $_smarty_tpl->tpl_vars['val']->value['vTitle'];?>
</td>
							<td style="text-align:center;background: none !important;"><?php echo $_smarty_tpl->tpl_vars['val']->value['eStatus'];?>
</td>
							<td style="text-align:center;background: none !important;">
								<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
administrator/edituser/<?php echo $_smarty_tpl->tpl_vars['val']->value['iAdminId'];?>
" data-toggle="modal">
                                	<i title=<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        				<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit'){?>
                        					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        				<?php }?>
                        			<?php } ?> class="icon-pencil helper-font-24"></i>
                                </a>
                            </td>
                            <!-- 
<td style="text-align:center;">
								<a href="#" data-toggle="modal">
                                	<i title=<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        				<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                        					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        				<?php }?>
                        			<?php } ?> class="icon-trash helper-font-24"></i>
                                </a>
                            </td>
 -->
						</tr>
					<?php } ?>
                </thead>
            </table>         
		        <!-- END EXAMPLE TABLE widget-->
			</div>   
			<!-- END PAGE CONTENT-->         
</div>
		</div>
		</div>
	</form>
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Confirm Delete'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></h3>
          </div>
          <div class="modal-body">
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Are you sure'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></button>
            <a href="" id="mylink"><button type="button" class="btn btn-primary"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></button></a>
          </div>
        </div>
      </div>
    </div>
  
    
    	 <br /><br /><br /><br /><br /><br /><br />
                </div>
                <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>-->
                    </div>
                </div>
    </div>
  </div>
<!--<div id="main-content">-->
	<!-- BEGIN PAGE CONTAINER-->
<!-- 	<div class="container-fluid">-->
	    <!-- BEGIN PAGE HEADER-->   
	    <!--<div class="row-fluid">
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
	<!--	        <h3 class="page-title">
		            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?>
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
	    <!--   	</div>-->
	    <!-- END PAGE HEADER-->  	
	  <!--  </div>-->
		 	<!-- BEGIN PAGE CONTENT-->
	<!--	 	<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/action_update" method="post">
  			<input type="hidden" name="action" id="action">
		    <div class="row-fluid">
		        <div class="span12">-->
		         <!-- BEGIN EXAMPLE TABLE widget-->
		        <!--<div class="widget purple">
		            <div class="widget-title">
		                <h4><i class="icon-reorder"></i>
					    <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?>r
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
					</div>
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
				
		        <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
		            <div class="alert alert-info offset4 span3">
		               <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

		            </div>
		        <?php }?>            
		       <div class="space15">
                    <div class="pull-right">
	                    <button type="submit" id="btn-active" class="btn green" onclick="check_all" ><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Make Active'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?></button>
	                    <button type="submit" id="btn-inactive" class="btn green">
	                    	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Make Inactive'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?>
                   </button>
	                    <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
administrator/create" class="btn green"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add New'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?><i class="icon-plus"></i></a>
	                    <button type="submit" id="btn-delete" class="btn green">
	                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                   <?php } ?></button>
                    </div>
                </div>
		    <table class="table table-striped table-bordered" id="AdminlistId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th width="5%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                        <th width="20%">
							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Name'){?>
							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

							<?php }?>
							<?php } ?>
						</th>
                        <th width="20%">
                        	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Email'){?>
							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

							<?php }?>
							<?php } ?></th>
                        <th width="15%">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Phone'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?>
                        	</th>
                        <th width="10%">
                        	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        		<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Role'){?>
                        		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        		<?php }?>
                        	<?php } ?>
                        	</th>
                        <th width="8%" style="text-align:center;">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Status'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></th>
                        <th width="8%" style="text-align:center;">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></th>
                        <th width="10%" style="text-align:center;">
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                        	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                        <?php }?>
                        <?php } ?></th>				    
                    </tr>
                </thead>
            </table>   -->      
		        <!-- END EXAMPLE TABLE widget-->
		<!--	</div>   -->
			<!-- END PAGE CONTENT-->         
<!--</div>
		</div>
		</div>
	</form>-->
<!--<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Confirm Delete</h3>
          </div>
          <div class="modal-body">
            Are you sure?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" id="mylink"><button type="button" class="btn btn-primary">Delete</button></a>
          </div>
        </div>
      </div>
    </div>-->

	<!--	</div>-->
	<!-- END PAGE CONTAINER-->

<!--</div>-->

<style type="text/css">
a.deleteicon{color: #4E4E4E; text-decoration: none;}
</style>


<script>
    $(window).load(function() {  
      var user_warning='<?php echo $_smarty_tpl->tpl_vars['data']->value['warning'];?>
';
       if(user_warning == '1')
       {
            $("#deleteMessage").html( "<p>You do not have sufficient privileges to access this page.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
       if(user_warning == 'delete')
       {
            $("#deleteMessage").html( "<p>The record which you are trying to access has been already deleted.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
    });
</script>


<?php }} ?>