<?php /* Smarty version Smarty-3.1.11, created on 2015-08-07 16:45:50
         compiled from "application/views/templates/add_new_sub_tabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6512470395583b94c62e7d5-17593292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '331f00311561ed6e78764877bf0ab63e38d55e40' => 
    array (
      0 => 'application/views/templates/add_new_sub_tabs.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6512470395583b94c62e7d5-17593292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583b94c73d9c1_20912477',
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583b94c73d9c1_20912477')) {function content_5583b94c73d9c1_20912477($_smarty_tpl) {?> <div id="add_new_subtab" class="modal hide fade" tabindex="-1" >
   <div class="modal-header">
    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>-->
    <h3 id="myModalLabel">
    			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='New App Tab Details'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

				  	<?php }?><?php } ?></h3>
  </div>
  <br>
  <div id="subtab_validation"></div>
  <div class="modal-body">
    
    
    <form name="addSubTab" id="addSubTab" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/addNewSubTab" enctype="multipart/form-data">
    <input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['iSubTabId']!=''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']['iApplicationId'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
<?php }?>"  name="data[iApplicationId]" id="iApplicationId">
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']['iIconId'];?>
"  name="data[iIconId]" id="iIconId">
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iSubTabId'];?>
"  name="iSubTabId" id="iSubTabId">
    <div class="toptab">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Title'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></strong> <span class="qmark">&nbsp;</span></th>
				<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Label Text Color'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></strong> <span class="qmark">&nbsp;</span></th>				
				<th align="left"></th>
			</tr>
			<tr>
				<td>
				<input class="indst" type="text" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['iSubTabId']!=''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']['vTabTitle'];?>
<?php }?>" size="30" id="icon_vTitle" name="data[vTabTitle]">
				</td>
				<td>		
					<input class="indst" type="text" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['iSubTabId']!=''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']['vLableTextColor'];?>
<?php }?>" size="30" id="text_color" name="data[vLableTextColor]">
				    <!--<input type="text"  value="rgb(0,194,255,0.78)" id="textColor" data-color-format="rgba" class="cp2 color_text_hide" style="width:25px !important;background:rgb(255,255,255);">-->
				</td>
				
				<td>
				  <input type="checkbox" value="Yes" id="ActiveSubTab"  name="data[eActive]" <?php if ($_smarty_tpl->tpl_vars['data']->value['iSubTabId']!=''){?><?php if ($_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']['eActive']=='Yes'){?>checked<?php }?><?php }?> >
				     <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Active Tab'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?>
				</td>
			</tr>
	
		</table>
    </div>
    
    <div class="midparttp">
		<strong>Select a tab</strong> <span class="qmark">&nbsp;</span><br>		
		<select name="data[iAppTabId]" id="iAppTabId" name="data[iAppTabId]" >
				    <option value="">-- Choose --</option>					  
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
					 <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']!="Home"||$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle']!="Home"){?>
					  <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']==$_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']['iAppTabId']){?> selected<?php }?>>
					   <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?>
					  </option>
					  <?php }?>
					  <?php endfor; endif; ?>
				  </select>	
		  
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
"
					 onclick="return putIconId(<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
);"
					 id="eticon-<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
"
					 <?php if ($_smarty_tpl->tpl_vars['data']->value['iSubTabId']!=''){?>
					 <?php if ($_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']['iIconId']==$_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId']){?>class="selected_image"<?php }else{ ?> class="ticonimage"<?php }?><?php }?>/>
			<?php endfor; endif; ?>
		</div>
 
    </div>
    
    </form>
    
  </div>
  <div class="modal-footer">
    <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>-->
    <button type="button" class="btn btn-primary" id="saveTabData" onclick="return saveTabData();" ><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save Changes'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></button>
    <button type="button" class="btn btn-primary" id="hideSubTabPopup" onclick="return hideSubTabPopup();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></button>
  </div>
  
</div><?php }} ?>