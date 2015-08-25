<?php /* Smarty version Smarty-3.1.11, created on 2015-08-25 21:01:21
         compiled from "application/views/templates/view-app-step2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19016884805582a0b55708b1-56806866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61251a00f315681e296593c6c7625e49684d6443' => 
    array (
      0 => 'application/views/templates/view-app-step2.tpl',
      1 => 1440511269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19016884805582a0b55708b1-56806866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5582a0b57c1e67_73604963',
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
    'checkName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582a0b57c1e67_73604963')) {function content_5582a0b57c1e67_73604963($_smarty_tpl) {?><div class="rightpanel">
	<ul class="breadcrumbs">	
		<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
		<li>
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application'){?>
					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

				<?php }?>
			<?php } ?>
		</li>
    </ul>
    <div class="pageheader">
        <div class="pageicon"><span class="icon-book"></span></div>
        <div class="pagetitle">
        	<h5>
        		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='All Features Summary'){?>
                       <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?>
            </h5>
            <h1>
            	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
            		<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application'){?>
            			<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

            		<?php }?>
            	<?php } ?>
            </h1>
        </div>
        </div>
        <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
                	<div class="span12">
         				<!-- BEGIN EXAMPLE TABLE widget-->
         				<div class="widget purple brdrnone"  >
             				<!-- <div class="widget-title">
             		    		<h4><i class="icon-reorder"></i> Application</h4>
               					<span class="tools">
                    				<a href="javascript:;" class="icon-chevron-down"></a>
                    				<a href="javascript:;" class="icon-remove"></a>
                				</span>
							</div> -->
             				<div class="widget-body" style="">
                 			<div>
                     		<!--div class="clearfix">
                         		<div class="btn-group">
                             		<a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
                                 		Add New <i class="icon-plus"></i>
                             		</a>
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
                      		</div-->
                     
                     		<!--div class="space15">
                     			<div class="span6">
                        			<div class="span6 ">
                            			<?php if (count($_smarty_tpl->tpl_vars['data']->value['role'])>0){?>
                            				<p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
                            			<?php }?>
                        			</div>
                    			</div>
                    		</div-->
                        	<!--table class="table table-striped table-hover table-bordered" id="editable-sample">
                        		<thead>
                        			<tr>
                            			<th>Title</th>
                            			<th style="text-align:center;">Status</th>
                            			<th style="text-align:center;">Edit</th>
                            			<th style="text-align:center;">Delete</th>
                        			</tr>
                        		</thead>
								<tbody-->
								<!--
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['role']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
									<tr class="">
										<td><?php echo $_smarty_tpl->tpl_vars['data']->value['role'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</td>
										<td style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['data']->value['role'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
										<td style="text-align:center !important;"><a href="#" data-toggle="modal">
											<i title="Edit" class="icon-pencil helper-font-24"></i></a>
										</td>
										<td style="text-align:center !important;"><a href="#"  data-toggle="modal" >
											<i title="Delete"  class="icon-trash helper-font-24"></i></a>
										</td>
									</tr>
								<?php endfor; endif; ?>
								-->
								<!--/tbody>
                        	</table-->
            				<div class="mainpartcont">
            					<?php echo $_smarty_tpl->getSubTemplate ("tab.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            					<div class="tbdata">
            						<div class="progress progress-striped active" >
              							<div class="bar" style="width: 20%;"></div>
            						</div>
              						<div class="div_inner">
                          				<div class="box_grey dark dark_shadow clearall no-margin">
                          					<h2 style="display: inline-block;width: auto;">
                          						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Tabs'){?>
                       									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     								<?php }?>
                     							<?php } ?> 
												<!-- <a class="btn btn-primary fright" href="#myModal_add_btn" id="addtab" data-toggle="modal"> <img src="http://192.168.1.41/php/slb_new/assets/images/icon_plus.png" />&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i>  
                            					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                            						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add New Tab'){?>
                              							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                            						<?php }?>
                            					<?php } ?> </a> -->
                            				</h2>
                            				
                            				<a class="btn btn-primary" href="#" style="float: right;display: inline-block;" onclick="add_custom_tab();">Add New Tab</a> 
                          				</div> 
                          				<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                            				<div class="alert alert-info">
                                				<?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

                            				</div>
                          				<?php }?>
                						<div class="new-dlg-container">
                            				<form name="buildwiz" method="post">
                              					<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped table-hover table-bordered" id="listItem">
                									<div id="tbl_msg"></div>
                                  					<tr class="nodrop">
                                    					<th style="text-align:center;" class="">#</th>
                                    					<th style="display: none;">
                                    						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                    							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Old'){?>
                                      								<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                    							<?php }?>
                                    						<?php } ?>
                                    					</th>
                                    					<th style="text-align:center;">
                                    						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                     							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Icon'){?>
                                        							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                     							<?php }?>
                                     						<?php } ?>
                                     					</th>
                                    					<th style="text-align:center;">
                                    						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                     							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Active'){?>
                                        							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                     							<?php }?>
                                     						<?php } ?>
                                     					</th>
                                    					<th style="text-align:center;">
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
                                    					<th style="text-align:center;">
                                    						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                     							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Function'){?>
                                        							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                     							<?php }?>
                                     						<?php } ?>
                                     					</th>
                                    					<th style="text-align:center;" colspan="2">
                                    						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                     							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Action'){?>
                                        							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                     							<?php }?>
                                     						<?php } ?>
                                     					</th>
                                  					</tr>
                                   					<tbody id="sortable1">
                                 						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['selected_feature_details']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                                  							<tr class="row1a" id="recordsArray_<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
">
                                    							<td  style="text-align:center;"class="handle_tr icon"><!---->
                                      								<img width="16" height="16" alt="move" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
icon_move.png" />
                                      							</td>
                                      							<!--
                                      								Name:- Hem
                                      								Date:- 16-jun
                                      								Des:- Add comment for console error-->
                                    							<!--<td width="6%" style="display: none;" class="center icon"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
01-refresh.png" /></td>-->
                                    							<td width="6%" style="text-align:center;" class="center icon">
                              										<img width="25" height="25" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" />
                              									</td>
                                    							<td width="12%" style="text-align:center;"><!-- <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eActive'];?>
 -->
                                    								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                    									<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eActive']){?>
                                    										<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                    									<?php }?>
                                    								<?php } ?>
                                    							</td>
                                    							<td width="30%" style="text-align:center;">
                                    								<?php $_smarty_tpl->tpl_vars['checkName'] = new Smarty_variable(0, null, 0);?>
                                       								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                       									<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?>
                                       										<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                       										<?php $_smarty_tpl->tpl_vars['checkName'] = new Smarty_variable(1, null, 0);?>
                                       									<?php }?>
                                       								<?php } ?>
                                       								<?php if ($_smarty_tpl->tpl_vars['checkName']->value==0){?>
                                       									<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>

                                       								<?php }?>
                                        						</td>
                                    							<td width="30%" style="text-align:center;">
                                    								<!-- <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
 Tab -->
                                    								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                    									<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle']){?>
                                    										<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                    									<?php }?>
                                    								<?php } ?>
                                    							</td>
                                    							<td style="text-align:center;">
                                    								<a data-toggle="modal" href="#" onclick="edit_custom_tab('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['step'];?>
');">
                                    									<i class="icon-pencil helper-font-24" title="Edit"></i>
                                    								</a>
                                    							</td>
                                    							<td style="text-align:center;">
                                    								<a data-toggle="modal" href="#" onClick=delete_tab(<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
,<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
);>
                                     									<i class="icon-trash helper-font-24" title="Delete"></i>
                                     								</a>
                                     							</td>
                                  							</tr>
                                 						<?php endfor; endif; ?>
                                					</tbody>
                              					</table>
                            				</form>
                  						</div>
                					</div>
            					</div>
            				</div>
            				<div style="clear:both;"></div>
                        	<div class="pagination">
                    			<?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

                			</div>  
                 			</div>
             			</div>
         			</div>
         			<!-- END EXAMPLE TABLE widget-->
        		</div>
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
</div>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    		<h3 id="myModalLabel">Pick Your App Features</h3>
  		</div>
  		<br>
		<div id="err"></div>
		<form name="save_app_feature" id="save_app_feature" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/save_app_feature" method="POST">
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
"  name="appinformation[iApplicationId]" id="iApplicationId">
  			<div class="modal-body">
   				<div class="toptab">
      				<table width="100%" border="0" cellspacing="0" cellpadding="0">
  						<tr>
    						<th align="left"><strong>Industry</strong> <span class="qmark">&nbsp;</span></th>
    						<th align="left"><strong>App Name</strong> <span class="qmark">&nbsp;</span></th>
    						<th align="left"><strong>App Icon Name</strong> <span class="qmark">&nbsp;</span></th>
  						</tr>
  						<tr>
    						<td>
      							<select class="indst" id="industry" name="appinformation[iIndustryId]">
        							<option value="">Select App Industry</option>
         							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['appindustry']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
          								<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appindustry'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIndustryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['appindustry'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</option>
        							<?php endfor; endif; ?>
      							</select>
    						</td>
    						<td><input class="indst" type="text" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['tAppName'];?>
" size="30" id="app_name" name="appinformation[tAppName]"></td>
    						<td><input class="indst" type="text" maxlength="12" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['tAppIconName'];?>
" size="30" id="app_icon" name="appinformation[tAppIconName]"></td>
  						</tr>
					</table>
				</div>
				<div class="midparttp">
        			<div class="midleft">
      					<fieldset>
        					<legend>Recommended:</legend>
        					<div class="innerlft" id="inlft">
        					</div>
       					</fieldset>
    				</div>
    				<div class="midright">
      					<fieldset>
        					<legend>Optional:</legend>
        					<div class="innercont"></div>
       					</fieldset>
    				</div>
    			</div>
			</div>
		</form>
  		<div class="modal-footer">
    		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    		<button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>
  		</div>
	</div>
	<!-- Modal -->
	<div id="myModal_add_btn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    		<h3 id="myModalLabel"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='New App Tab Details'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:<?php }?><?php } ?></h3>
  		</div>
  		<br>
  		<div id="erraddtab"></div>
  		<div class="modal-body">
    		<form name="frm_add_tab" id="frm_add_tab" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/add_new_tab" enctype="multipart/form-data">
    			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
"  name="data[iApplicationId]" id="iApplicationId">
    			<div class="toptab">
      				<table width="100%" border="0" cellspacing="0" cellpadding="0">
      					<tr>
        					<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Title'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:<?php }?><?php } ?></strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> Max 20 and Min 2 characters allowed</span></a>--></th>
        					<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Function'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:<?php }?><?php } ?></strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" />Select Function</span></a>--></th>
        					<th align="left"></th>
      					</tr>
      					<tr>
        					<td valign="top">
        						<input class="indst" type="text" data-placement="right" value="" size="20" minlength="2" id="icon_vTitle1" name="data[vTitle]">
							</td>
        					<td valign="top">
        						<select class="indst" id="icon_iFeatureId" name="data[iFeatureId]">
            						<option value="">
            							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
            								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select Tab'){?>
            									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

            								<?php }?>
            							<?php } ?>
            						</option>
             						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
             							<?php if (($_smarty_tpl->tpl_vars['data']->value['flag']==$_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'])){?>
             							<?php }else{ ?>
              								<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 Tab<?php }?><?php } ?>
              								</option>
             							<?php }?>
             						<?php endfor; endif; ?>
          						</select>   
							</td>
        					<td valign="top">
        						<input type="hidden" value="No"  name="data[eActive]">
        						<input class="indst" type="checkbox" maxlength="12" value="Yes" size="30"  name="data[eActive]" checked>
        						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
        							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Active'){?>
        								<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

        							<?php }?>
        						<?php } ?> Tab
        					</td>
      					</tr>
      				</table>
    			</div>
				<div class="midparttp">
					<strong>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Icon'){?>
								<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:
							<?php }?>
						<?php } ?>
					</strong> &nbsp;
					<a class="tooltip_text" href="javascript:void(0);">
						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/>
						<span>
							<img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> Select icon
						</span>
					</a>
					<br>
    				<input type="file" value=""  name="vImage" onchange="CheckValidFile(this.value,'add_tab_img');" id="add_tab_img">
    				<br>
    				<br>
    				<input type="hidden" value=""  name="data[iIconId]" id="eiIconId">
    				<div class="icon_img_box">
      					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_icons']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
        					<img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['default_icon']['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" onclick="eselect_tab_icon(<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
);" id="eticon-<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
" class="ticonimage"/>
      					<?php endfor; endif; ?>
    				</div>
    			</div>
    		</form>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-primary" id="saveIcons" onclick="return saveappicons();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save Changes'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
			<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="clearerror();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
		</div>
	</div>
	
	<!-- Made Changes by : Sagar 19-5-2014 -->
	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        			<h3  id="myModalLabel"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Confirm Delete'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h3>
      			</div>
      			<div class="modal-body">
        			Are you sure?
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">
        				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
        					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?>
        						<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

        					<?php }?>
        				<?php } ?>
        			</button>
        			<a href="" id="mylink">
        				<button type="button" class="btn btn-primary">
        					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
        						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
        							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

        						<?php }?>
        					<?php } ?>
        				</button>
        			</a>
      			</div>
    		</div>
  		</div>
	</div>
	<!-- End -->

	<!-- Modal -->
	<div id="myModal_edit_btn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    		<h3 id="myModalLabel"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit App Tab Details'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h3>
  		</div>
  		<br>
  		<div id="validation"></div>
  		<div id="erraddtab2"></div>
  		<div class="modal-body" id="edit_tab_btn">  
		</div>
  		<div class="modal-footer">
    		<button type="button" class="btn btn-primary" id="update_icon" onclick="return editsaveappicons();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save Changes'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
    		<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="clearerror();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
		</div>
	</div>
		
	<!--<div id="main-content">-->
 		<!-- BEGIN PAGE CONTAINER-->
		<!-- <div class="container-fluid">-->
    	<!-- BEGIN PAGE HEADER-->   
   			<!-- <div class="row-fluid">
       			<div class="span12">-->
           			<!-- BEGIN THEME CUSTOMIZER-->
           			<!--div id="theme-change" class="hidden-phone">
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
           			</div-->
          			<!-- END THEME CUSTOMIZER-->
          			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
       				<!--    <h3 class="page-title"></h3>-->
           			<!--ul class="breadcrumb">
               			<li>
                   			<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">Dashboard</a>
                   			<span class="divider">/</span>
               			</li>
               			<li class="active">
                  			Application
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
      			<!-- </div>
    		</div>-->
    		<!-- END PAGE HEADER-->
    		<!-- BEGIN PAGE CONTENT-->
			<!--    <div class="row-fluid"></div>-->
			<!-- END EDITABLE TABLE widget-->
    		<!-- END PAGE CONTENT-->         
		<!-- </div>-->
 		<!-- END PAGE CONTAINER-->
	<!--</div>-->

	<!-- Modal -->

	
	<script>
		var tabcnt = <?php echo sizeof($_smarty_tpl->tpl_vars['data']->value['selected_feature_details']);?>
;
		if(tabcnt == 0)
		{
 			$('#myModal').modal('show');
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function()
		{
    		$("#icon_vTitle1").attr('maxlength','20');
    		$('#icon_vTitle1[data-toggle="tooltip"]').tooltip({
        		animated: 'fade',
        		placement: 'right',    
    		});
		});  
	</script>
	<?php }} ?>