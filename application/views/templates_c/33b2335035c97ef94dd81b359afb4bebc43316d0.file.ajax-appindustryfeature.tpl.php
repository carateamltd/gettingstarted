<?php /* Smarty version Smarty-3.1.11, created on 2015-07-09 19:27:45
         compiled from "application\views\templates\ajax-appindustryfeature.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18891559e68c1666067-18748068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33b2335035c97ef94dd81b359afb4bebc43316d0' => 
    array (
      0 => 'application\\views\\templates\\ajax-appindustryfeature.tpl',
      1 => 1415015295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18891559e68c1666067-18748068',
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
  'unifunc' => 'content_559e68c1810971_73482875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559e68c1810971_73482875')) {function content_559e68c1810971_73482875($_smarty_tpl) {?><ul id="atleastone">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['appindustryfeature']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<li><input name="appfeatureicon[<?php echo $_smarty_tpl->tpl_vars['data']->value['appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId'];?>
" checked/><input name="appfeature[<?php echo $_smarty_tpl->tpl_vars['data']->value['appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
]" type="checkbox" value="" checked/> <span><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['default_icon']['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['custom_all_icons'][$_smarty_tpl->tpl_vars['data']->value['appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconId']]['vImage'];?>
" alt="" height="20" width="20"/></span> <span>
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['appindustryfeature'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:<?php }?><?php } ?>
		</span></li>
	<?php endfor; endif; ?>
</ul>	
<?php }} ?>