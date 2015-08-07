<?php /* Smarty version Smarty-3.1.11, created on 2015-08-07 17:12:50
         compiled from "application/views/templates/back_img_detail_popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7425299855583d353314d86-16338911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a83cedc8f65286d16ea237d1a9da18bece2cfb10' => 
    array (
      0 => 'application/views/templates/back_img_detail_popup.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7425299855583d353314d86-16338911',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583d353356f70_21827841',
  'variables' => 
  array (
    'data' => 0,
    'tabname' => 0,
    'slidername' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583d353356f70_21827841')) {function content_5583d353356f70_21827841($_smarty_tpl) {?><div id="back_img_detail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Background Image Details</h3>
  </div>
  <div class="modal-body">
  	<div class="container-fluid">
  		<div class="row-fluid">
  			<div class="span5">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['image_detail']){?>
  				<img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['image_detail']['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['image_detail']['vImage'];?>
" style="height:143px;width:100px;">
        <?php }?>
  			</div>
  			<div class="span7">
  				<h3 style="margin-top: 10px;">Tabs</h3>
  				<ol style="text-align: left;">

            <?php if ($_smarty_tpl->tpl_vars['data']->value['assigned_tab']){?>
  						<?php  $_smarty_tpl->tpl_vars['tabname'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tabname']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['assigned_tab']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tabname']->key => $_smarty_tpl->tpl_vars['tabname']->value){
$_smarty_tpl->tpl_vars['tabname']->_loop = true;
?>
  							<?php echo $_smarty_tpl->tpl_vars['tabname']->value['vTitle'];?>
 Tab <br>
  						<?php } ?>
  					<?php }else{ ?>
		  				No tab is assigned with this background.
  					<?php }?>
  				</ol>
  				<h3 style=" margin-top: 10px;">Sliders</h3>
  				<ol style="text-align: left;">
  					<?php if ($_smarty_tpl->tpl_vars['data']->value['assigned_slider']){?>
  						<?php  $_smarty_tpl->tpl_vars['slidername'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slidername']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['assigned_slider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slidername']->key => $_smarty_tpl->tpl_vars['slidername']->value){
$_smarty_tpl->tpl_vars['slidername']->_loop = true;
?>
  							<?php echo $_smarty_tpl->tpl_vars['slidername']->value;?>
  <br>
  						<?php } ?>
  					<?php }else{ ?>
		  				No slider is assigned with this background.
  					<?php }?>
  				</ol>
  			</div>
  		</div>
  	</div>
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div><?php }} ?>