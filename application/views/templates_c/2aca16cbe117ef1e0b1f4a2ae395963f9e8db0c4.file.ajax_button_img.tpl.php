<?php /* Smarty version Smarty-3.1.11, created on 2015-08-12 14:41:47
         compiled from "application/views/templates/ajax_button_img.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17936575655583d3f2b036a3-42359643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aca16cbe117ef1e0b1f4a2ae395963f9e8db0c4' => 
    array (
      0 => 'application/views/templates/ajax_button_img.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17936575655583d3f2b036a3-42359643',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583d3f2b57eb3_55808012',
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583d3f2b57eb3_55808012')) {function content_5583d3f2b57eb3_55808012($_smarty_tpl) {?><li>
    <div class="hover_active_back active_btn_mobile">
          <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
           <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='noimg'){?>
            <!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" alt="SLB" /> -->
            <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" height="75px" width="75px" alt="SLB" /> 
           <?php }?>
          <?php } ?>
      
      <label class="margin_5ptop">
        <input type="radio" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBtntabbackgroundId']){?> checked="checked" <?php }?> class="onbtn_radi"  name="tabbackimage"  onClick="chng_back_icon(0);"/>
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
" class="onbtn_radi"  name="radio-appr-buttons-tabbackg" onClick="chng_back_icon(<?php echo $_smarty_tpl->tpl_vars['data']->value['buttons_tab_background'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBtntabbackgroundId'];?>
);"/>
          </label>
        </label>
    </div>
  </li>
<?php endfor; endif; ?>
<?php }} ?>