<?php /* Smarty version Smarty-3.1.11, created on 2015-08-12 14:42:26
         compiled from "application/views/templates/ajax_header_img.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20901586285583e733bca664-32815847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd3eac284e66023be7fc3cfd1718b451434cc108' => 
    array (
      0 => 'application/views/templates/ajax_header_img.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20901586285583e733bca664-32815847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583e733c2ee01_78288187',
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583e733c2ee01_78288187')) {function content_5583e733c2ee01_78288187($_smarty_tpl) {?>				  <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
				    <tr>
				    <td>
				    <div class="hover_active_color active_btn_mobile">
				    <label class="flt_lft_radio">
					    <input type="radio" value="0" class="onbtn_radi"  name="lunch_header" checked/>
				    </label>
				    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no header sign'){?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" alt="SLB" /> 
					 <?php }?>
					<?php } ?>
				    <!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
no_header_sign.png" alt="SLB" /> -->
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
" class="onbtn_radi"  name="lunch_header" onClick="change_lun_header(<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
)"/>
						 </label>
						 <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
lunch_header/<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLunchheaderId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['get_all_buttons_lunch_header'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" alt="SLB" /> 
					 </div>
					  </td>
					 </tr>					 
				    <?php endfor; endif; ?>				    
				    </table><?php }} ?>