<?php /* Smarty version Smarty-3.1.11, created on 2015-07-09 19:06:11
         compiled from "application\views\templates\set_default_background_image_popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31517559e63b373bce0-78085326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abba1fcaf95be271caa25ffac8e34296105d0c14' => 
    array (
      0 => 'application\\views\\templates\\set_default_background_image_popup.tpl',
      1 => 1428669811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31517559e63b373bce0-78085326',
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
  'unifunc' => 'content_559e63b3c786e2_90064101',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559e63b3c786e2_90064101')) {function content_559e63b3c786e2_90064101($_smarty_tpl) {?><!-- Modal -->
<div id="myModal_set_backimg" class="modal hide fade modalsetbg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="myModalLabel"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Set a Background Image'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h3>
  </div>
  <br>
  <div id="err"></div>
  <div class="modal-body">
	
	<!--<div class="popuprow">
		<div class="popupleftpart">dfs</div>
		<div class="popuprightpart">fs</div>
	</div>-->
	<div class="popuprow">sdgdsgsd</div>
    <div class="background_tab">
		<ul>
			<li ><a href="#background_tab_yi"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Your Image'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> </a></li>
			<li ><a href="#background_tab_pi"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Preset Image'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> </a></li>
		</ul>
		<form name="frm_add_back_img" id="frm_add_back_img" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/set_default_background_image" enctype="multipart/form-data">
		<div class="uploadimage">
			<input type="file" name="vImage" id="file" onchange="CheckValidFile(this.value,'file');" style="width:220px;" >
			  <button type="button" class="btn btn-inverse" id="upld_bcimg" ><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Upload Photo'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
		</div>
		<div id="background_tab_yi">
		<div class="background_box">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['your_tabbackground']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				
					<div class="boxwrapimg">
						<div class="imgboxbg1"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" onclick="bimgselect_tab_icon(<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
);" id="eticon-<?php echo $_smarty_tpl->tpl_vars['data']->value['all_tabcustomicon'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iTabcustomiconId'];?>
" class="bticonimage"/></div>
						<div class="selectedimg" style="display:none;" id="selectedimg_<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
						<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
selected.png">-->
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='selected'){?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png">
						 <?php }?>
						<?php } ?>
						</div>
						<div class="boxinfo">
							<h3 id="bac_img_<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
</h3>
							<!--p>640 x 860</p>
							<p>425.21 KB</p-->
							<span class="prvicon"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
preview-icon.png" width="20" height="18" alt="" /></a></span>						</div>
						</div>
						
						
				<?php endfor; endif; ?>
					</div>
				<div style="clear:both;"></div>
			
		</div>
		<div id="background_tab_pi" class="overscroll">

				<div class="background_box">
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][0]['iAppTabId'];?>
"  name="data[iAppTabId]" id="back_img_apptabid">
				<input type="hidden" value=""  name="data[iBackgroundimgId]" id="back_img_id">
				<input type="hidden" value="Mobile"  name="data[eType]" id="back_img_type">
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
"  name="iApplicationId" >

				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['tabbackground']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

					<div class="boxwrapimg">
						<div class="imgboxbg1"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" onclick="bimgselect_tab_icon(<?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
);" id="eticon-<?php echo $_smarty_tpl->tpl_vars['data']->value['all_tabcustomicon'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iTabcustomiconId'];?>
" class="bticonimage" /></div>
						<div class="selectedimg" style="display:none;" id="selectedimg_<?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
						<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
selected.png">-->
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='selected'){?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png">
						 <?php }?>
						<?php } ?>
						</div>
						<div class="boxinfo">
							<h3 id="bac_img_<?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
</h3>
							<!--p>640 x 860</p>
							<p>425.21 KB</p-->
							<span class="prvicon"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
preview-icon.png" width="20" height="18" alt="" /></a></span>						</div>
					</div>
				<?php endfor; endif; ?>
			</form>
				
				</div>
			<div style="clear:both;"></div>
		</div>
    
    </div>
    
  </div>
  <div class="modal-footer">
    <span id="sel_back_img_name" style="color:black;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='No image selected'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> </span>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
    <button type="button" class="btn btn-primary" id="save_bcimg" style="display:none;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save My Choice'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
  </div>
</div>
<?php }} ?>