<?php /* Smarty version Smarty-3.1.11, created on 2015-09-08 21:14:39
         compiled from "application/views/templates/view-app-step4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8335672395583cefe296ce4-95710053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53793fd0609b952a6cbb8a45ff4bb514688dacfe' => 
    array (
      0 => 'application/views/templates/view-app-step4.tpl',
      1 => 1441721676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8335672395583cefe296ce4-95710053',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583cefe8ff517_27055723',
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'bottomcheck' => 0,
    'topcheck' => 0,
    'leftcheck' => 0,
    'rightcheck' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583cefe8ff517_27055723')) {function content_5583cefe8ff517_27055723($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.form.js"></script>
<div class="rightpanel">
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
					<div class="widget purple brdrnone">
						<!--div class="widget-title">
						<h4><i class="icon-reorder"></i> Application</h4>
						<span class="tools">
						<a href="javascript:;" class="icon-chevron-down"></a>
						<a href="javascript:;" class="icon-remove"></a>
						</span>
						</div-->
						<div class="widget-body">
							<div class="clearfix">
								<div class="btn-group">
									<!--a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
									Add New <i class="icon-plus"></i>
									</a-->
								</div>
								<div class="btn-group pull-right" style="display:none;">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i></button>
									<ul class="dropdown-menu pull-right">
										<li><a href="#">Print</a></li>
										<li><a href="#">Save as PDF</a></li>
										<li><a href="#">Export to Excel</a></li>
									</ul>
								</div>
							</div>
							<div class="space15">
								<div class="span6">
									<div class="span6 ">
										<?php if (count($_smarty_tpl->tpl_vars['data']->value['role'])>0){?>
											<p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
										<?php }?>
									</div>
								</div>
							</div>
							<div class="mainpartcont">
								<?php echo $_smarty_tpl->getSubTemplate ("tab.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<div class="tbdata">
									<div class="progress progress-striped active" >
										<div class="bar" style="width: 60%;"></div>
									</div>
									<div class="midmainwrap">
										<ul>
											<li>
												<a href="#maintabs-appearance">
													<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
														<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Appearance'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

														<?php }?>
													<?php } ?>
												</a>
											</li>
											<li>
												<a href="#background_images">
													<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
														<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Background Image'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

														<?php }?>
													<?php } ?>
												</a>
											</li>
											<li>
												<a href="#maintabs-applayout">
													<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
														<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Layout'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

														<?php }?>
													<?php } ?>
												</a>
											</li>
										</ul>
										<!--************Tab 1 start**************-->		
										<!--
										Modified By : Nizam Kadri
										Modified Date : 17-05-2014 
										Purpose : Purpose to set User on same page while he/she click on navigation help icon.
										-->
										<div id="maintabs-appearance" class="main_step_3"> 
											<div class="tab_main_title">
												<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_new">
													<tr>
														<td width="350" align="left" style="padding-left: 20px;">
															<h2>
																<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																	<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Premium Design'){?>
																		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																	<?php }?>
																<?php } ?>
															</h2>
														</td>
														<td width="300">
															<!--<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> Your Current Selection is Premium Design.<br/> Click <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> for more details.</span></a> -->
														</td>
														<td align="right">
															<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='SaveItem'){?>
																	<input type="button" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
"  class="btn btn_upload_icon" onclick="saveappdesigndata();" />
																<?php }?>
															<?php } ?>
															<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/newdesign_templates/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" class="btn btn_upload_icon" style="text-decoration:none;color:white;float: right;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Back To Browse Templates'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></a>
														</td>
													</tr>
												</table>
											</div>
											<div style="float:left; width:100%;">
												<div class="leftpartappearance">
													<ul class="tabbgchange">
														<li class="activetabbtn"><a href="#appr-layout" id="showLayoutAppearance"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Layout'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></a></li>
														<li class="tbbg"><a href="#appr-buttons" id="showButtonsAppearance"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Buttons'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></a></li>
														<li class="tbbg"><a href="#appr-header" id="showHeaderAppearance"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Header'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></a></li>
														<li class="tbbg"><a href="#appr-colors" id="showColorAppearance"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Colors'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></a></li>
													</ul>
													<div style="clear:both;"></div>
													<div id="appr-layout" class="appr-layout levelborder">
														<ul class="innertabbtn">
															<li class="innertabbtncklik"><a class="btn" href="#appr-layout-rowcol">Rangées & Colonnes</a></li>
															<!--<li class="inactivebtntab"><a class="btn" data-controls-modal="subTabs" data-backdrop="static" data-keyboard="false" href="#appr-buttons-subtbs" id="appearance_sub_tabs">Sub Tabs</a></li>-->
														</ul>
														<div id="appr-layout-rowcol" class="app_layout_main">
															<div>
																<div class="button_1" id="buttonsDiv">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
																		<tr>
																			<td>
																				<label class="spec_label" style="cursor:default;">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Buttons'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:
																						<?php }?>
																					<?php } ?>
																					<!--<a href="javascript:void(0);" class="tooltip_text"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Check for buttons which will be seen at the landing screen your APP.'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a>-->
																				</label>
																			</td>
																			<td>
																				<label>
																					<input type="checkbox"  class="onbtn"  name="eCallBtn" id="eCallBtn" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['eCallBtn']=="Yes"){?> checked="ckecked" <?php }?> />
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Call Button'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</label>
																			</td>
																			<td>
																				<label>
																					<input type="checkbox"  class="onbtn"  name="eDirectionBtn" id="eDirectionBtn"  <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['eDirectionBtn']=="Yes"){?> checked="ckecked" <?php }?> />
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Direction Button'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</label>
																			</td>
																			<td>
																				<label>
																					<input type="checkbox"  class="onbtn"  name="eTellFriendBtn" id="eTellFriendBtn" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['eTellFriendBtn']=="Yes"){?> checked="ckecked" <?php }?> />
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tell Friend Button'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</label>
																			</td>
																		</tr>
																	</table>
																</div>
																<div class="button_1">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
																		<tr>
																			<td width="29%">
																				<label class="spec_label" style="cursor:default;">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Show Status Bar'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>:
																				</label>
																			</td>
																			<td>
																				<label>
																					<input type="checkbox"  class="onbtn"  name="eShowStatusBar" id="eShowStatusBar" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['eShowStatusBar']=="Yes"){?> checked="ckecked" <?php }?> />&nbsp;
																				</label>
																			</td>
																		</tr>
																	</table>
																</div>
																<div class="button_1">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
																		<tr>
																			<td>
																				<center>
																					<label>
																						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
app_layout_bottom.png" alt="SLB" />
																						<?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['eBtnLayout']=="Bottom"){?>
																							<?php $_smarty_tpl->tpl_vars["bottomcheck"] = new Smarty_variable("checked", null, 0);?>
																						<?php }else{ ?>
																							<?php $_smarty_tpl->tpl_vars["bottomcheck"] = new Smarty_variable("checked", null, 0);?>
																						<?php }?>
																						<label class="margin_5ptop">
																							<input type="radio" value="bottom" class="onbtn_radi"  name="radio_layout" id="layoutbot" <?php echo $_smarty_tpl->tpl_vars['bottomcheck']->value;?>
 onClick="change_layout('footer_tab');"/>
																							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Bottom'){?>
																									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																								<?php }?>
																							<?php } ?>
																						</label>
																					</label>
																				</center>
																			</td>
																			<td>
																				<!--<label>
																				<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
app_layout_top.png" alt="SLB" /> 
																				<label class="margin_5ptop">
																				<input type="radio" value="top" class="onbtn_radi" <?php echo $_smarty_tpl->tpl_vars['topcheck']->value;?>
  name="radio_layout" id="layouttop" onClick="change_layout('footer_tab_top');"/><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Top'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
																				</label></label>-->
																			</td>
																			<td>
																				<!--<label>
																				<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
app_layout_left.png" alt="SLB" /> 
																				<label class="margin_5ptop">
																				<input type="radio" value="left" class="onbtn_radi" <?php echo $_smarty_tpl->tpl_vars['leftcheck']->value;?>
 name="radio_layout" id="layoutleft" onClick="change_layout('footer_tab_left');"/><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Left'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
																				</label></label>-->
																			</td>
																			<td>
																				<!--<label>
																				<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
app_layout_right.png" alt="SLB" /> 
																				<label class="margin_5ptop">
																				<input type="radio" value="right" class="onbtn_radi" <?php echo $_smarty_tpl->tpl_vars['rightcheck']->value;?>
 name="radio_layout" id="layoutright" onClick="change_layout('footer_tab_right');"/><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Right'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
																				</label></label>-->
																			</td>
																		</tr>
																	</table>
																</div>
																<div class="button_1">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
																		<tr>
																			<td width="29%">
																				<label class="spec_label" style="cursor:default;">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='More Button Navigation?'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</label>
																			</td>
																			<td>
																				<label>
																					<input type="checkbox" value="1" class="onbtn"  name="checkbox7" />&nbsp;
																				</label>
																			</td>
																		</tr>
																	</table>
																</div>	    
																<!--<div class="button_1">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
																<tr>
																<td width="29%"><label class="spec_label" style="cursor:default;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Rows'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></label></td>
																<td><select  name="mapping_row" id="mapping_row" onchange="return manageButtons(this.value);">
																<option value="Single Row" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vMappingRow']=="Single Row"){?> selected="selected" <?php }?>>Single Row</option>
																<option value="2 Rows" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vMappingRow']=="2 Rows"){?> selected="selected" <?php }?>>2 Rows</option>
																<option value="3 Rows" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vMappingRow']=="3 Rows"){?> selected="selected" <?php }?>>3 Rows</option>
																<option value="4 Rows" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vMappingRow']=="4 Rows"){?> selected="selected" <?php }?>>4 Rows</option>
																</select>
																</td>
																</tr>
																</table>
																</div>  -->

																<!-- <div class="button_1">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
																<tr>
																<td width="29%"><label class="spec_label" style="cursor:default;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Columns'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> </label></td>
																<td><select  name="mapping_coll" id="mapping_coll">
																<option value="3 Columns" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vMappingCol']=="3 Columns"){?> selected="selected" <?php }?>>3 Columns</option>
																<option value="4 Columns" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vMappingCol']=="4 Columns"){?> selected="selected" <?php }?>>4 Columns</option>
																<option value="5 Columns" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vMappingCol']=="5 Columns"){?> selected="selected" <?php }?>>5 Columns</option>
																</select>
																</td>
																</tr>
																</table>
																</div> -->
				 											</div>
			      										</div>
			      										<div id="appr-buttons-subtbs">				 
				  											<?php echo $_smarty_tpl->getSubTemplate ("appearance_sub_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
			 			 
   			      										</div>
			   										</div>
			   										<div id="appr-buttons" class="appr-buttons levelborder">
			      										<ul class="innertabbtn">
															 <li class="innertabbtncklik">
															 	<a class="btn" href="#appr-buttons-tabbackg">
															 		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															 			<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Background'){?>
															 				<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															 			<?php }?>
															 		<?php } ?>
															 	</a>
															 </li>
															 <li class="inactivebtntab">
															 	<a class="btn" href="#appr-buttons-icolor">
															 		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															 			<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Background Icon Color'){?>
															 				<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															 			<?php }?>
															 		<?php } ?>
															 	</a>
															 </li>
															 <li class="inactivebtntab">
															 	<a class="btn" href="#appr-buttons-tabcol">
															 		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															 			<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Color'){?>
															 				<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															 			<?php }?>
															 		<?php } ?>
															 	</a>
															 </li>
															 <li class="inactivebtntab">
															 	<a class="btn" href="#appr-buttons-tabtext">
															 		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															 			<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Text'){?>
															 				<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															 			<?php }?>
															 		<?php } ?>
															 	</a>
															 </li>
			      										</ul>
			      										<div id="appr-buttons-tabbackg">
				  											<div class="button_1" id="addpdf_validation">
				    											<form name="buuton_upload" id="buuton_upload" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/upload_button_img" enctype="multipart/form-data">
					   												<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl_right">
					   													<tr>
																			<td class="btnbrowse btnhelp"><label></label></td>
																			<td class="btnbrowse">
																				<input type="file" id="image_upload"  name="file_uploads_btn" onchange="CheckValidFile(this.value,'this.name');" style="width:200px;"/>&nbsp (75 px * 75 px)
																			</td>				    
																			<td>
																				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Upload'){?>
																						<input type="button" class="btn btn-primary" name="upload_btn_icon"  value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" onclick="return uploadButton();"/>
																					<?php }?>
																				<?php } ?>
																			</td>
																		</tr>
																	</table>
																</form>
															</div>
															<div class="buttons_group">
																<div class="button_1">
																	<ul class="listing_select_icons" id="appearance_button_img">
																		<li>
																			<div class="hover_active_back active_btn_mobile">
																				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='noimg'){?>
																						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" height="75px" width="75px" alt="SLB" /> 
																					<?php }?>
																				<?php } ?>
																				<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
noimg.png" height="75px" width="75px" alt="SLB" /> -->
																				<label class="margin_5ptop">
																					<input type="radio" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBtntabbackgroundId']==0){?> checked="checked" <?php }?>  class="onbtn_radi"  name="tabbackimage"  onClick="chng_back_icon(0);"/>
																				</label>
																			</div>
																		</li>
																		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['buttons_tab_background']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                         													<li>
																				<label>
																					<div class="hover_active_back active_btn_mobile">
																						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_btn_background/<?php echo $_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBtntabbackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" height="75px" width="75px" alt="SLB" /> 
																						<label class="margin_5ptop">
																							<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBtntabbackgroundId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBtntabbackgroundId']==$_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iBackgroundId']){?> checked="checked" <?php }?>  class="onbtn_radi"  name="tabbackimage"  onClick="chng_back_icon(<?php echo $_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBtntabbackgroundId'];?>
);"/>
																						</label>
																					</div>
																				</label>
																			</li>
																		<?php endfor; endif; ?>
																	</ul>
																</div>
															</div>
														</div>
														<div id="appr-buttons-icolor">
															<div class="button_1 height_fix_500">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
																	<tr>
																		<td>
																			<!-- <div class="hover_active_color active_btn_mobile">
																			<label class="flt_lft_radio">
																			<input type="radio" value="" class="onbtn_radi"  name="iconcolor" onClick="change_icon_color(0)"/>
																			</label> 
																			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																			<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no icon sign'){?>
																			<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" alt="SLB" /> 
																			<?php }?>
																			<?php } ?>
																			<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
no_icon_sign.png" alt="SLB" /> 
																			</div> -->
																		</td>
																	</tr>
																	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_iconcolors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																		<tr>
																			<td>
																				<div class="hover_active_color">
																					<label class="flt_lft_radio">
																						<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_iconcolors'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['all_iconcolors'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId']==$_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iIconcolorId']){?> checked="ckecked" <?php }?> class="onbtn_radi"  name="iconcolor" onClick="change_icon_color(<?php echo $_smarty_tpl->tpl_vars['data']->value['all_iconcolors'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
)"/>
																					</label>
																					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_icons']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = (int)5;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
																						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_iconcolors'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vImage'];?>
" alt="SLB" /> 
																					<?php endfor; endif; ?>
																				</div>
																			</td>
																		</tr>
																	<?php endfor; endif; ?>
																</table>
															</div>
														</div>
														<div id="appr-buttons-tabcol">
															<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Color'){?>
																	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																<?php }?>
															<?php } ?>
															<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vTabColor'];?>
" name="vTabColor" id="vTabColor"  class="cp2" onblur="colordatepicker(this.id,this.value)" />
														</div>
														<div id="appr-buttons-tabtext">
															<div class="button_1">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
																	<tr>
																		<td>
																			<label>
																				<input type="checkbox" value="1" class="onbtn_radi"  name="checkbox7" />
																				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Show the Menu Text'){?>
																						<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																					<?php }?>
																				<?php } ?>
																			</label>
																			<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vTabTexColor'];?>
" class="cp2" name="vTabTexColor" id="vTabTexColor" onblur="colordatepicker(this.id,this.value)"/>
																		</td>
																	</tr>
																</table>
															</div>
														</div>
													</div>
													<div id="appr-header" class="appr-header levelborder">
														<ul class="innertabbtn">
															<li class="innertabbtncklik">
																<a class="btn" href="#appr-header-lh" id="launch_header">
																	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																		<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Launch Header'){?>
																			<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																		<?php }?>
																	<?php } ?>
																</a>
															</li>
															<li class="inactivebtntab">
																<a class="btn" href="#appr-header-lt" id="launcher_tint" >
																	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																		<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Launcher Tint'){?>
																			<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																		<?php }?>
																	<?php } ?>
																</a>
															</li>
				 											<li class="inactivebtntab">
				 												<a class="btn" href="#appr-header-gh" id="global_header">Global Header</a>
				 											</li>
				 											<li class="inactivebtntab">
				 												<a class="btn" href="#appr-header-gt" id="global_tint">
				 													<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
				 														<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Global Tint'){?>
				 															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

				 														<?php }?>
				 													<?php } ?>Global Tint
				 												</a>
				 											</li>
				 										</ul>
				 										<div id="appr-header-lh">
				 											<div class="button_1">
				 												<form name="header_imgupload" id="header_imgupload" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/upload_header_img" enctype="multipart/form-data">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl_right">
																		<tr>
																			<td class="btnbrowse btnhelp">
																				<label>
																					<!--<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Upload image action will also save your current settings'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a>-->
																				</label>
																			</td>
																			<td class="btnbrowse">
																				<input type="file" id="header_img" name="header_img" onchange="CheckValidFile(this.value,'header_img');" style="width:200px;" />(200px X 200px)
																			</td>
																			<td>
																				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Upload'){?>
																						<input type="button" class="btn btn-primary" name="upload_btn_icon"  value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" onclick="return uploadHeaderImg();"/>
																					<?php }?>
																				<?php } ?>	
																			</td>
																		</tr>
																	</table>
																</form>
															</div>
															<div class="button_1 height_fix_500" id="header_img_list">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
																	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																		<tr>
																			<td>
																				<div class="hover_active_color active_btn_mobile">
																				<label class="flt_lft_radio">
																				<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iLunchheaderId']==$_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId']){?> checked="ckecked" <?php }?> class="onbtn_radi"  name="lunch_header" id="iLunchheaderId" onClick="change_lun_header(<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
);"/>
																				</label>
																				<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
lunch_header/<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" style="width:320px;height:44px;" /> 
																				</div>
																			</td>
																		</tr>					 
																	<?php endfor; endif; ?>				    
																</table>
															</div>
														</div>
														<div id="appr-header-lt">
															Launcher Tint
															<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vLuncherTintColor'];?>
" name="vLuncherTintColor" id="vLuncherTintColor" data-color-format="rgb" class="cp2" onblur="colordatepicker(this.id,this.value)" />
														</div>
														<div id="appr-header-gh">
															<div class="button_1">
																<form name="header_imgupload" id="global_header_imgupload" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/upload_global_header_img" enctype="multipart/form-data">
																	<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl_right">
																		<tr>
																			<td class="btnbrowse btnhelp">
																				<label>
																					<span class="qmark">&nbsp;</span>
																				</label>
																			</td>
																			<td class="btnbrowse">
																				<input type="file" id="global_header_img" name="file_uploads_btn" onchange="CheckValidFile(this.value,'global_header_img');" style="width:200px;"/>(200px X 200px)
																			</td>
																			<td>
																				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Upload'){?>
																						<input type="button" class="btn btn-primary" name="upload_btn_icon"  value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" onclick="return uploadGlobalHeaderImg();"/>
																					<?php }?>
																				<?php } ?>
																			</td>
																		</tr>
																	</table>
																</form>
															</div>
															<div class="button_1 height_fix_500" id="global_header_img_list">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
																	<tr>
																		<td>
																			<div class="hover_active_color active_btn_mobile">
																				<label class="flt_lft_radio">
																					<input type="radio" value="0" class="onbtn_radi" onclick="chnage_global_header(this.value);" name="iGlobalHeaderId" id="iGlobalHeaderId" <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iGlobalHeaderId']=='0'){?> checked="ckecked" <?php }?>/>
																				</label>
																				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no header sign'){?>
																						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" /> 
																					<?php }?>
																				<?php } ?>
																				<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
no_header_sign.png" /> -->
																			</div>
																		</td>
																	</tr>
																	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
																		<tr>
																			<td>
																				<div class="hover_active_color active_btn_mobile">
																					<label class="flt_lft_radio">
																						<input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
"  <?php if ($_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iGlobalHeaderId']==$_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId']){?> checked="ckecked" <?php }?> class="onbtn_radi"  name="iGlobalHeaderId" id="iGlobalHeaderId" onclick="chnage_global_header(<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
);"/>
																					</label>
																					<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
lunch_header/<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" alt="SLB" /> 
																				</div>
																			</td>
																		</tr>
																	<?php endfor; endif; ?>
																</table>
															</div>
														</div>
														<div id="appr-header-gt">
															Global Tint
															<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vGlobalTintColor'];?>
" name="vGlobalTintColor" id="vGlobalTintColor" data-color-format="rgb" class="cp2" onblur="colordatepicker(this.id,this.value)" />
														</div>
													</div>
													<div id="appr-colors" class="appr-colors levelborder">
														<ul class="innertabbtn">
															<li class="innertabbtncklik">
																<a class="btn" href="#appr-colors-gac">
																	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																		<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Global App Colors'){?>
																			<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																		<?php }?>
																	<?php } ?>
																</a>
															</li>
															<!--li class="inactivebtntab"><a class="btn" href="#appr-colors-subtbs">Global Fonts</a></li-->
														</ul>
														<div id="appr-colors-gac">
															<div class="button_1">
																<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
																	<tr>
																		<td width="32%" class="spec_color_label">
																			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																				<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Start with a Color Theme'){?>
																					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																				<?php }?>
																			<?php } ?> :
																		</td>
																		<td>
																			<select  name="select" onChange="chng_color_theme(this.value);">
																				<option value="">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select a color scheme'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="0">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Aquatic Blue'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="1">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Beach Blue'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="2">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Bear Brown'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="3">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Carrot Orange'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="4">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Dark Rose'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="5">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Dazzling Red'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="6">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Forest Green'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																				<option value="7">
																					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																						<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Generic Grey'){?>
																							<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																						<?php }?>
																					<?php } ?>
																				</option>
																			</select>
																		</td>
																	</tr>
																</table>
															</div>
															<!--
															Modified By : Nizam Kadri
															Modified Date : 22-05-2014 
															Purpose : get proper alignment of colors tab.
															-->
															<div class="button_1">
																<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_select_color">
																	<tr>
																		<td width="32%" class="spec_color_label">
																			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																				<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Navigation bar'){?>
																					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																				<?php }?>
																			<?php } ?> :
																		</td>
																		<td class="withsepaline">
																			<table width="80%">
																				<tr>
																					<td width="60%" style="text-align:right;">
																						<span class="lbl_color">
																							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Bar'){?>
																									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																								<?php }?>
																							<?php } ?>:
																						</span>
																					</td>
																					<td>
																						<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationBar'];?>
" id="navigation_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important;background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationBar'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationBar'];?>
;" />
																					</td>
																					<td>
																						<span>
																							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Text'){?>
																									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																								<?php }?>
																							<?php } ?>:
																						</span>
																					</td>
																					<td>
																						<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationText'];?>
" id="navigation_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important;background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationText'];?>
;" />
																					</td>
																				</tr>
																			</table>
																		</td>
																	</tr>
																	<tr>
																		<td width="32%" class="spec_color_label">
																			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																				<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Section Bar'){?>
																					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																				<?php }?>
																			<?php } ?> :
																		</td>
																		<td class="withsepaline">
																			<table width="80%">
																				<tr>
																					<td width="60%" style="text-align:right;">
																						<span>
																							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Bar'){?>
																									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																								<?php }?>
																							<?php } ?>:
																						</span>
																					</td>
																					<td>
																						<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionBar'];?>
" id="section_bars" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionBar'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionBar'];?>
;" />
																					</td>
																					<td>
																						<span>
																							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Text'){?>
																									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																								<?php }?>
																							<?php } ?>:
																						</span>
																					</td>
																					<td>
																						<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionText'];?>
" id="section_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionText'];?>
;" />
																					</td>
																				</tr>
																			</table>
																			<!--<span>Bar:</span> <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionBar'];?>
" id="section_bars" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionBar'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionBar'];?>
;" />
																			<span>Text: </span><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionText'];?>
" id="section_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionText'];?>
;" /> -->
																		</td>
																	</tr>
																	<tr>
																		<td width="32%" class="spec_color_label">
																			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																				<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Odd Row'){?>
																					<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																				<?php }?>
																			<?php } ?> :
																		</td>
																		<td class="withsepaline">
																			<table width="80%" >
																				<tr>
																					<td width="60%" style="text-align:right;">
																						<span>
																							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Bar'){?>
																									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																								<?php }?>
																							<?php } ?>:
																						</span>
																					</td>
																					<td>
																						<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowBar'];?>
" id="oddRow_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowBar'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowBar'];?>
;" />
																					</td>
																					<td>
																						<span>
																							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																								<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Text'){?>
																									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

																								<?php }?>
																							<?php } ?>:
																						</span>
																					</td>
																					<td>
																						<input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowText'];?>
" id="oddRow_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowText'];?>
;" /></td>
															</tr>
															</table>
															<!--<span>Bar: </span><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowBar'];?>
" id="oddRow_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowBar'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowBar'];?>
;" />
															<span>Text: </span><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowText'];?>
" id="oddRow_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowText'];?>
;" />-->
															</td>
															</tr>

															<tr>
															<td width="32%" class="spec_color_label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Even Row'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?> :</td>
															<td class="withsepaline">
															<table width="80%" >
															<tr>
															<td width="60%" style="text-align:right;"><span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Bar'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?>:</span></td><td><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowBar'];?>
" id="evenrow_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowBar'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowBar'];?>
;" /></td>
															<td><span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Text'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?>:</span></td><td><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowText'];?>
" id="evenrow_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowText'];?>
;" /></td>
															</tr>
															</table>
															<!--<span>Bar:</span> <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowBar'];?>
" id="evenrow_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowBar'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowBar'];?>
;" />
															<span>Text:</span> <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowText'];?>
" id="evenrow_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowText'];?>
;" />-->
															</td>
															</tr>

															<tr>
															<td width="32%" class="spec_color_label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Feature Colors'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?> :</td>
															<td class="withsepaline">
															<table width="80%" >
															<tr>
															<td width="60%" style="text-align:right;"><span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Button Text'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?>:</span></td><td><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonTextColor'];?>
" id="featurecolors_buttontext" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonTextColor'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonTextColor'];?>
;" /></td>
															<td>&nbsp;</td><td>&nbsp;</td>
															</tr>
															</table>
															<tr>
															<td width="32%" class="spec_color_label"></td>
															<td class="withsepaline">
															<table width="80%" >
															<tr><td width="60%" style="text-align:right;"><span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='ButtonImageColors'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?>:</span></td><td><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonImageColors'];?>
" id="featurecolors_buttonimage" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonImageColors'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonImageColors'];?>
;" /></td>
															<td>&nbsp;</td><td>&nbsp;</td>
															</tr>
															</table>
															</td>
															</tr>
															<!--<span>Button Text:</span> <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonTextColor'];?>
" id="featurecolors_buttontext" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonTextColor'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonTextColor'];?>
;" />
															</td>
															</tr>
															<tr>
															<td width="32%" class="spec_color_label"></td>
															<td class="withsepaline">
															<span>Button &amp; Image Colors:</span> <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonImageColors'];?>
" id="featurecolors_buttonimage" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonImageColors'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vButtonImageColors'];?>
;" />-->
															</td>
															</tr>
															<tr>
															<td>&nbsp;</td>
															<td class="withsepaline">
															<table width="80%" >
															<tr>	
															<td width="60%" style="text-align:right;"><span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Feature Text'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?>:</span></td><td><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vFeatureText'];?>
" id="feature_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vFeatureText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vFeatureText'];?>
;" /></td>
															<td>&nbsp;</td><td>&nbsp;</td>
															</tr>
															</table>
															<!--<span>Feature Text:</span> <input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vFeatureText'];?>
" id="feature_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vFeatureText'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vFeatureText'];?>
;" />-->
															</td>
															</tr>

															<tr>
															<td width="32%" class="spec_color_label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Others'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?> :</td>
															<td class="withsepaline">
															<table width="80%" >
															<tr><td width="60%" style="text-align:right;"><span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
															<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Background Color'){?>
															<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

															<?php }?>
															<?php } ?>:</span></td>
															<td><input type="text"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOtherBackgroundColor'];?>
" id="other_background" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOtherBackgroundColor'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOtherBackgroundColor'];?>
;" /></td>	
															<td>&nbsp;</td><td>&nbsp;</td>				
															</tr>
															</table>
															</td></tr>
															</table>
															</div>
															</div>
<!-- 			   <div id="appr-colors-subtbs">
			      <div class="button_1">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
				 <tr>
				 <td width="25%"><label>Global Font</label></td>
				 <td><select  name="mapping_coll">
					 <option value="3">AmericanTypewriter</option>
					 <option value="4">AmericanTypewriter-Bold</option>
					 <option value="5">AmericanTypewriter-Condensed</option>
					 <option value="6">AmericanTypewriter-CondensedBold</option>
					 <option value="7">AmericanTypewriter-CondensedLight</option>
					 <option value="8">AppleSDGothicNeo-Bold</option>
				 </select>
				 </td>
				 </tr>
				 </table>
			      </div>
			   </div> -->
			</div>
		     </div>
			
			<div class="rightpartappearance">
			<!--Start Phone-->	
				<?php echo $_smarty_tpl->getSubTemplate ("default_template/template1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<!--End-->
		     </div>



			
				
			   </div>
			
			</div>
			<!--************Tab 1 End**************-->	
			
			<!--************Tab 2 start**************-->	
			<div id="background_images">	 		
			 <?php echo $_smarty_tpl->getSubTemplate ("appreance_background_images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
			 
			 </div>
			<!--************Tab 2 End**************-->	
			
			<!--************Tab 3 start**************-->	
			<div id="maintabs-applayout">
			
			 <?php echo $_smarty_tpl->getSubTemplate ("appreance_maintabs_applayout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			 
			 </div>
			<!--************Tab 3 End**************-->	
			
			
			</div>
		  </div>
       		</div>
	       	<div style="clear:both;"></div>
	    	<div class="pagination">
	    		<?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

	    		</div>  
 	</div></div>
   </div>
<!-- END EXAMPLE TABLE widget-->
<div style="clear:both;"></div>
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


<!--<div id="main-content">-->
	<!-- BEGIN PAGE CONTAINER-->
	<!--<div class="container-fluid">-->
		<!-- BEGIN PAGE HEADER-->
	<!--	<div class="row-fluid">
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
			<!--<h3 class="page-title">
			Application
			</h3>-->
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
 <!--   </div>
  </div>-->
  <!-- END PAGE HEADER-->
  <!-- BEGIN PAGE CONTENT-->

  
<!--</div>-->

<!-- END EDITABLE TABLE widget-->
<!-- END PAGE CONTENT-->         
<!--</div>-->
<!-- END PAGE CONTAINER-->




<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h3 id="myModalLabel">Pick Your App Features</h3>
   </div>
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
   <select class="indst" id="industry" name="appindustry">
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
   <td><input class="indst" type="text" value="" size="30" id="app_name" name="app_name"></td>
   <td><input class="indst" type="text" maxlength="12" value="" size="30" id="app_icon" name="app_icon"></td>
   </tr>
   
   </table>
   
   </div>
   
   <div class="midparttp">
   <div id="err"></div>
   <div class="midleft">
   <fieldset>
   <legend>Recommended:</legend>
   <div class="innerlft">
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   </div>
   </fieldset>
   </div>
   <div class="midright">
   <fieldset>
   <legend>Optional:</legend>
   <div class="innercont">
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   Right part<br/>
   </div>
   </fieldset>
   </div>
   </div>
   </div>
   <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>
   </div>
</div>

<script>

var icon_box = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['eBtnLayout'];?>
';
var iBtntabbackgroundId = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iBackgroundId'];?>
';
var iIconcolorId = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iIconcolorId'];?>
';
var iLunchheaderId = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iLunchheaderId'];?>
';
var iGlobalHeaderId = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['iGlobalHeaderId'];?>
';

var vTabColor = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vTabColor'];?>
';
if(vTabColor !=''){
     $(".indv_tab").css('background',vTabColor);   
}

var vTabTexColor = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vTabTexColor'];?>
';
if(vTabTexColor !=''){
    $(".pre_tab_title").css('color',vTabTexColor);    
}

var vLuncherTintColor = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vLuncherTintColor'];?>
';
if(vLuncherTintColor !=''){
    if(iLunchheaderId !=0){
        $(".header_img_top").css('background',vLuncherTintColor);    
    }
}

var vGlobalTintColor= '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vGlobalTintColor'];?>
';
if(vGlobalTintColor !=''){
    if(iGlobalHeaderId !=0){
        $("#global_preview_header_overlay").css('background',vGlobalTintColor);    
    }
}


var vNavigationBar = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationBar'];?>
';
if($('#global_preview_header_overlay')){
    if(iGlobalHeaderId !=0){
        $("#global_preview_header_overlay").css('background',vNavigationBar);
    } 
}

var vNavigationText = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationText'];?>
';
if($('#colorImage_menu')){
    $("#colorImage_menu").css('color',vNavigationText);   
}

var vNavigationShadow = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vNavigationShadow'];?>
';
if($('#colorImage_menu')){
    $("#colorImage_menu").css('text-shadow','0px 0px 0px '+vNavigationShadow);
}


var vSectionBar = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionBar'];?>
';
if($('#page_title')){
    $("#page_title").css('background-color',vSectionBar);
}

var vSectionText = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vSectionText'];?>
';
if($('#page_title')){
    $("#page_title").css('color',vSectionText);
}

var vOddRowBar = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowBar'];?>
';
if($('.odrow')){
    $(".odrow").css('background',vOddRowBar);
} 

var vOddRowText = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vOddRowText'];?>
';
if($('.odrow')){
    $(".odrow").css('color',vOddRowText); 
}


var vEvenRowBar = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowBar'];?>
';
if($('.evnrow')){
    $(".evnrow").css('background',vEvenRowBar); 
}
   
var vEvenRowText = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['vEvenRowText'];?>
';
if($('.evnrow')){
    $(".evnrow").css('color',vEvenRowText); 
}
var eShowStatusBar = '<?php echo $_smarty_tpl->tpl_vars['data']->value['allappdesignInfo'][0]['eShowStatusBar'];?>
';
chnag_status_bar(eShowStatusBar);

change_lun_header(iLunchheaderId);
change_icon_color(iIconcolorId);
chng_back_icon(iBtntabbackgroundId);
chnage_global_header(iGlobalHeaderId);


if(icon_box == 'Top'){
    change_layout('footer_tab_top');
}else if(icon_box == 'Bottom'){
   change_layout('footer_tab'); 
}else if(icon_box == 'Right'){
    change_layout('footer_tab_right');
}else if(icon_box == 'Left'){
    change_layout('footer_tab_left');
}else{
    change_layout('footer_tab');
}

function show_loading() {
  $('#loading').reveal({
    animationSpeed: 10,
    closeOnBackgroundClick: true
  });
}

function hide_loading() {
  $('#loading').delay(100).trigger('reveal:close');
}

function change_layout(val){
  $("#ftab").attr('class',val);
}


function change_lun_header(id){
	//console.log(id);
  if(id != 0){
      var url = base_upload+'lunch_header/'+id+'/h'+id+'.jpg ';
      $(".hed_bg").children('img').attr('src', url); 
      $(".header_img_top").show(); 
  }else if(id == 0 && id != ""){
    var url = base_image+'no_heade.png';
    $(".hed_bg").children('img').attr('src', url);
  	$(".header_img_top").hide();
  }else{
  }
}

function chnage_global_header(id){
    if(id !=0){
        var url = base_upload+'lunch_header/'+id+'/h'+id+'.jpg';
        $("#global_header_image").children('img').attr('src', url);    
    }else{
        var url = base_image+'no_heade.png';
        $("#global_header_image").children('img').attr('src', url);
        $("#global_header_image").css('height','44px');
    }
}

function change_icon_color(iconid){
  
  //console.log(iconid);
  $('span.menumain span img').each(function() {
     //myArray =  $(this).attr('src').split('/');
     var imgname = $(this).attr('orgname');
     if(iconid == 0){
	     var nsrc =  base_upload+'tab_icon/empty.png';
     }else{
	     var nsrc =  base_upload+'tab_icon/'+iconid+'/'+imgname;
     }
     $(this).attr('src',nsrc);
  });
}

function chng_back_icon(id){
  if(id == 0){
     var url =  base_image+'empty.png';
  }else{
    var url = base_upload+'tab_btn_background/'+id+'/TB'+id+'.png';
  }
 //console.log(base_upload);
 	$('span.tab_bg').each(function() {
        $(this).children('img').attr('src', url);
	});
}

function chnag_status_bar(chk){

	if(chk == 'No'){
		$(".iphonetopbar").hide();
	}else if(chk == 'Yes'){
		$(".iphonetopbar").show();
	}else{
		$(".iphonetopbar").hide();
	}
}
	
</script>


<?php }} ?>