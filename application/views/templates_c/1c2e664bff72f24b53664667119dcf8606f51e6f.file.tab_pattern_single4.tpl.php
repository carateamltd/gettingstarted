<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 15:12:52
         compiled from "application/views/templates/default_template/tab_pattern_single4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9571715885583cf04088c46-05591040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c2e664bff72f24b53664667119dcf8606f51e6f' => 
    array (
      0 => 'application/views/templates/default_template/tab_pattern_single4.tpl',
      1 => 1432624657,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9571715885583cf04088c46-05591040',
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
  'unifunc' => 'content_5583cf040b5612_28216300',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583cf040b5612_28216300')) {function content_5583cf040b5612_28216300($_smarty_tpl) {?><div class="footer_tab" id="ftab">  
    <ul style="list-style:none; padding:0; margin:0; height:80px; overflow:hidden;">
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
                <li style="background:#520000;" class="indv_tab">
                    <a href="#">
                        <span class="tab_bg"><img src='<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
/tab_btn_background/1/TB1.png' width="100%" /></span>
                        <span class="menumain">
                            <span><img width="25" height="25" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
"  orgname = "<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
"/></span>
                            <span class="pre_tab_title">
                               <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_tmp1){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                                <?php } ?>
                            </span>
                        </span>
                        <span style="height:80px; width:71px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;" class="indv_tab">&nbsp;</span>
                    </a>
                </li>
            <?php }?>
        <?php endfor; endif; ?> 
    </ul>
</div><?php }} ?>