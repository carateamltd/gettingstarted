<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 13:40:12
         compiled from "application/views/templates/appearance_sub_tabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9081730845583b94c540903-15499250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '119d59ea6d92bf6006b4fd872928db8ae30ced0d' => 
    array (
      0 => 'application/views/templates/appearance_sub_tabs.tpl',
      1 => 1429191165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9081730845583b94c540903-15499250',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583b94c61aa94_04297996',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583b94c61aa94_04297996')) {function content_5583b94c61aa94_04297996($_smarty_tpl) {?><div id="subTabs"  class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="Add_subtab"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add Sub Tabs'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></h3>
  </div>
<div id="test"></div>
<form name="save_app_feature" id="saveSubTabData" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/save_app_feature" method="POST">
  <div class="modal-body">
   <div >
   <!--<table border="0" width="100%">
		  <tbody><tr>
		  	<td width="17%"  tip="This dictates whether or not these subtabs will be appeared only in iPad APP."> Subtab Option: &nbsp;&nbsp;<span class="qmark">&nbsp;</span></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="checkbox" id="showonly4ipad" class="onbtn">
				&nbsp;&nbsp;
				<label for="only4ipad" class="label">Show only for iPad</label>
			</td>
			<td style="text-align: right;">
				<a href="#" id="btnButtonPrferenceSave" >Save Preference</a>
			</td>
		  </tr>
		</tbody></table>-->
    </div>    
    <button type="button" class="btn btn-primary"  id="addnew_subtab" style="float:right;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add New Sub Tab'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?>
						   </button>
    <div style="clear:both;"></div>
    
    <div  style="padding: 20px 20px 20px 20px; ">
	<div id="teststs" style="display: none;" class="box_info"> </div>
	<div id="table_listing">
	<table id="sub_tab_listing" width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered">
		<tbody>
		  <tr class="nodrop">
			<!--th class=""></th-->
		   	<th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Icon'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></th>
			<th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Name'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></th>
			<th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Linked Tab'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></th>
			<th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Active'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></th>
		    <th colspan="2"></th>
		</tr>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']){?>
		  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['AllSubTabImages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		  <tr class="row1a" id="23670">
			 <!--td width="5%" class="handle_tr"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
" alt="move" width="16" height="16"></td-->
			 <td align="center" width="9%">
			    <div class="img_wrapper dark_shadow" style="min-width: 32px; min-height: 32px;">
				<img width="32" height="32" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
">
			    </div>
			 </td>
			 <td align="center" width="16%">
			    <p class="sp_title"><?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTabTitle'];?>
</p>
			 </td>
			 <td align="center" width="30%"><?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['TabName'];?>
</td>
			 <td align="center" width="9%"><?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eActive'];?>
</td>
			 <td align="center" style="text-align:center;">
			    <a class="apptab_edit button white" onclick="editSubTab('<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSubTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iApplicationId'];?>
');" href="javascript:void(0);"><i class="icon-pencil helper-font-24" title="Edit"></i></a>
			 </td>
			 <td align="center" colspan="2" style="text-align:center;">
			  <a class="button grey" onclick="return deleteSubTab('<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSubTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['AllSubTabImages'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iApplicationId'];?>
')" ><i class="icon-trash helper-font-24" title="Delete"></i></a>
			 </td>
          </tr>
		  <?php endfor; endif; ?>
		  <?php }else{ ?>
		  <tr class="row1a"><td colspan="5" style="text-align:center;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='No subtab founds'){?>
	   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

	   	<?php }?><?php } ?></td></tr>
		  <?php }?>
	</tbody></table>
	</div>
	
    </div>
    
    
    
  </div>
</form>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></button>
    <!--<button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>-->
  </div>
</div>
<div id="add_newtab_popup">
<?php echo $_smarty_tpl->getSubTemplate ("add_new_sub_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div><?php }} ?>