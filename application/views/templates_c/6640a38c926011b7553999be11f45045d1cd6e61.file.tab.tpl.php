<?php /* Smarty version Smarty-3.1.11, created on 2015-06-18 17:43:01
         compiled from "application/views/templates/tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16169933495582a0b57d2118-76490794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6640a38c926011b7553999be11f45045d1cd6e61' => 
    array (
      0 => 'application/views/templates/tab.tpl',
      1 => 1415026129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16169933495582a0b57d2118-76490794',
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
  'unifunc' => 'content_5582a0b58c1864_57374721',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582a0b58c1864_57374721')) {function content_5582a0b58c1864_57374721($_smarty_tpl) {?>
<div class="tabingbtn">
	<?php if ($_smarty_tpl->tpl_vars['data']->value['tpl_name']=='view-app-step2.tpl'){?><div class="activetab"><?php }else{ ?><div class="tbtn"><?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/step2/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
			<span><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
settings.png" alt="" /></span>
			<h2>1. <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Functionality'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></h2>
			<p><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Customize App Tabs'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></p>
		</a>								
	</div>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['tab_cnt']==0){?>
		<div class="tbtn dvdisable">
	<?php }else{ ?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['tpl_name']=='view-app-step3.tpl'){?><div class="activetab "><?php }else{ ?><div class="tbtn"><?php }?>
	<?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/step3/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
			<span><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
content.png" alt="" /></span>
			<h2>2. <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Content'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></h2>
			<p><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Customize App Content'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></p>
		</a>								
	</div>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['tab_cnt']==0){?>
		<div class="tbtn dvdisable">
	<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['tpl_name']=='view-app-step4.tpl'||$_smarty_tpl->tpl_vars['data']->value['tpl_name']=='newdesign_templates.tpl'){?><div class="activetab"><?php }else{ ?><div class="tbtn"><?php }?>
	<?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/step4/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
			<span><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
appearance.png" alt="" /></span>
			<h2>3. <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Appearance'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></h2>
			<p><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Customize App Appearance'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></p>
		</a>								
	</div>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['tab_cnt']==0){?>
		<div class="tbtn dvdisable">
	<?php }else{ ?>
		<?php if ($_smarty_tpl->tpl_vars['data']->value['tpl_name']=='view-app-step5.tpl'){?><div class="activetab"><?php }else{ ?><div class="tbtn"><?php }?>
	<?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/step5/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
			<span><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
preview.png" alt="" /></span>
			<h2>4. <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Preview'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></h2>
			<p><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Preview Your Applications'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></p>
		</a>								
	</div>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['tab_cnt']==0){?>
		<div class="tbtn dvdisable">
	<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['data']->value['tpl_name']=='view-app-step6.tpl'){?><div class="activetab"><?php }else{ ?><div class="tbtn"><?php }?>
	<?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/step6/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
			<span><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
Publish.png" alt="" /></span>
			<h2>5. <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Publish'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></h2>
			<p><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Publish To App Stores'){?>
                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
             <?php } ?></p>
		</a>								
	</div>
</div>

<?php }} ?>