<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 14:02:44
         compiled from "application/views/templates/ajax_edit_custom_tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12959320215583be948a0dc4-88396687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69d2739da6d358e3c624736b9a9d6591762a58d8' => 
    array (
      0 => 'application/views/templates/ajax_edit_custom_tab.tpl',
      1 => 1429284244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12959320215583be948a0dc4-88396687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583be949cb8a1_25328818',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583be949cb8a1_25328818')) {function content_5583be949cb8a1_25328818($_smarty_tpl) {?><form name="frm_edit_tab" id="frm_edit_tab" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/update_custom_tab" enctype="multipart/form-data">
   <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_record']['iAppTabId'];?>
"  name="iAppTabId">
    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_record']['iApplicationId'];?>
"  name="data[iApplicationId]">
	<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['step'];?>
"  name="step" id="step">	 
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
callout.gif" />Enter title</span></a>--></th>
				<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Function'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:<?php }?><?php } ?></strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" />Select function</span></a>--></th>
				<th align="left"></th>
			</tr>
			<tr>
				<td>

				<?php if ($_smarty_tpl->tpl_vars['data']->value['exist_record']['vTitle']==''){?>
				<input class="indst" type="text" data-toggle="tooltip" data-placement="right" title="" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_record']['vTitle'];?>
" size="30" id="edit_icon_vTitle" name="data[vTitle]" disabled="disabled" maxlength="20" minlength="2" onblur="return checkTitleLength();">
				<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['exist_record']['vTitle'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_tmp1){?>
				<input class="indst" type="text" data-toggle="tooltip" data-placement="right" title="" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" size="30" id="edit_icon_vTitle" name="data[vTitle]" maxlength="20" disabled="disabled" minlength="2" onblur="return checkTitleLength();">
				<?php }?><?php } ?>
				<?php }?>
					
				
				
				</td>
				<td>
					
					<?php if (($_smarty_tpl->tpl_vars['data']->value['exist_record']['iFeatureId']==$_smarty_tpl->tpl_vars['data']->value['flag'])){?>
						<select class="indst" id="edit_icon_iFeatureId" name="data[iFeatureId]">
							<option value="">Select Tab</option>
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
								
								<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId']==$_smarty_tpl->tpl_vars['data']->value['exist_record']['iFeatureId']){?>selected="selected"<?php }?>><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></option>
								
							<?php endfor; endif; ?>
						</select>
					<?php }else{ ?>		
						<select class="indst" id="edit_icon_iFeatureId" name="data[iFeatureId]">
						<option value="">Select Tab</option>
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
" <?php if ($_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId']==$_smarty_tpl->tpl_vars['data']->value['exist_record']['iFeatureId']){?>selected="selected"<?php }?>><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['all_appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?><?php } ?></option>
							<?php }?>
						<?php endfor; endif; ?>
						</select>
					<?php }?>	

				</td>
				<td><input type="hidden" value="No"  name="data[eActive]"><input class="indst" type="checkbox" maxlength="12" value="Yes" size="30"  name="data[eActive]" <?php if ($_smarty_tpl->tpl_vars['data']->value['exist_record']['eActive']=='Yes'){?>checked<?php }?>> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Active'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></td>
			</tr>
	
		</table>
    </div>
    
    <div class="midparttp">
		<strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tab Icon'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" />Select icon</span></a>--><br>
		<input type="file" value=""  name="vImage" onchange="CheckValidFile(this.value,'tab_img');" id="tab_img"><br><br>
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_record']['iIconId'];?>
"  name="data[iIconId]" id="selectediconId">
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
" onclick="select_tab_icon(<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
);" id="ticon-<?php echo $_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['data']->value['all_icons'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId']==$_smarty_tpl->tpl_vars['data']->value['exist_record']['iIconId']){?>selected_image<?php }else{ ?>ticonimage<?php }?>"/>
			<?php endfor; endif; ?>
		</div>
 
    </div>
    
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#edit_icon_vTitle").attr('maxlength','20');
    $('#edit_icon_vTitle[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
  
});  
</script><?php }} ?>