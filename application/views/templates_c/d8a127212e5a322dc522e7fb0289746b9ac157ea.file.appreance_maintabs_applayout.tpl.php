<?php /* Smarty version Smarty-3.1.11, created on 2015-08-06 18:00:36
         compiled from "application\views\templates\appreance_maintabs_applayout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24582559d409e62cbe1-70099043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8a127212e5a322dc522e7fb0289746b9ac157ea' => 
    array (
      0 => 'application\\views\\templates\\appreance_maintabs_applayout.tpl',
      1 => 1438781010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24582559d409e62cbe1-70099043',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_559d409ead81f5_07580742',
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559d409ead81f5_07580742')) {function content_559d409ead81f5_07580742($_smarty_tpl) {?><div class="tab_main_title">
  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table_new">
	 <tr>
			<td width="350" align="left" style="padding-left: 20px;">
				<h2><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Layout'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?><!--<a href="javascript:void(0);" class="tooltip_text"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> Arrange your app’s tab order by resorting the list below.<br/>Just drag the tab to any new location, or disable it by dragging to [Inactive] section.</span></a>--></h2>
			</td>
	 </tr>
  </table>
</div>
<!-- 
Modified By : Nizam Kadri
Modified Date : 02/06/2014
Issue Fixed of : App Layout word Wrapping.
-->
<div id="both_avtiveInactiveTab" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">
  <div class="div_inactive_tabs" >  
		 <h3><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Inactive'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 Tabs<?php }?><?php } ?> </h3>
		  <div class="page_line1">Page <strong>1</strong></div>
		  <ul class="inactive_list_icon" id="inactive_list_icons" >
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
			   <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eActive']=='No'){?>
				  <li id="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" >
					<div class="tab_custom_button">
						<div class="button_back"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
icon_back_area.png"></div>
						<div class="overlay_icon_color"></div>
						<div class="icon_btnpack">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" />					
						</div>
						<div class="title_icn" style="table-layout:auto; word-break:break-all; word-wrap:break-word;"><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</div>
					</div>
					<div class="fright_link_title" style="table-layout:auto; word-break:break-all; word-wrap:break-word;"><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</div>
					<div class="fright_link">				    
						 <!--
       						Modified By : Nizam Kadri
					        Modified Date : 17-05-2014 
					        Purpose : Purpose to set User on same page while he/she click on navigation help icon.
					      -->
						<!--<a title="Details" class="lnk_eachtab_design" href="#" ><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
detail_icon.png"></a>-->
						<a title="Details" class="lnk_eachtab_design" href="javascript:void(0);" onclick="edit_custom_tab('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['step'];?>
');"><i class="icon-edit"></i></a>
						<br><br>
						<!--<a title="Make Inactive" class="lnk_eachtab_inactive" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
remove_icon.png"></a>-->
						<a title="Make Inactive" class="lnk_eachtab_inactive" href="javascript:void(0);" onclick="return makeInActive('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
');"><i class="icon-bitbucket"></i><!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
remove_icon.png">--></a>
					</div>
				</li>		 
			   <?php }?>		
			 <?php endfor; endif; ?>		
		  </ul>
  </div>

  <div class="div_active_tabs">
		  <h3><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Onlgets'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?><?php } ?>  </h3>
		  <div class="page_line2">Page <strong>1</strong></div>
		  <ul class="active_list_icon" id="active_list_icons" >
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
			 <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eActive']=='Yes'){?>		  
			   <li id="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
">
				  <div class="tab_custom_button">
					  <div class="button_back"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
icon_back_area.png"></div>
					  <div class="overlay_icon_color"></div>
					  <div class="icon_btnpack">
						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" />
					  </div>
					  <div class="title_icn" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">
					 
					 <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_tmp1){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?><?php } ?> 
				  </div>
				  </div>
				  <div class="fright_link_title" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">
				  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_tmp2){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?><?php } ?> 
			   </div>
				  <div class="fright_link">
					  <a title="Details" class="lnk_eachtab_design botspash" href="javascript:void(0);" onclick="edit_custom_tab('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['step'];?>
');"><i class="icon-edit"></i><!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
detail_icon.png">--></a>
					  <br>
					  <a title="Make Inactive" class="lnk_eachtab_inactive" href="javascript:void(0);" onclick="return makeInActive('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
');"><i class="icon-bitbucket"></i><!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
remove_icon.png">--></a>
				  </div>
			   </li>
			 <?php }?>
		    <?php endfor; endif; ?>
		  </ul>
  </div>
</div>




<!-- Modal -->
<div id="myModal_edit_btn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    <h3 id="myModalLabel"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit App Tab Detailss'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?><?php } ?> </h3>
  </div>
  <br>
  <div id="validation"></div>
  <div class="modal-body" id="edit_tab_btn">  
    
 
    
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary" id="update_icon"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save Changes'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?><?php } ?></button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?><?php } ?></button>
  </div>
</div><?php }} ?>