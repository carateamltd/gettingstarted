<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 17:01:16
         compiled from "application/views/templates/ajax_img_library.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10948387645583e86c3f8bb7-75991159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '030a283c49546e5a8dce3c1acdb9da663f21bbee' => 
    array (
      0 => 'application/views/templates/ajax_img_library.tpl',
      1 => 1429261147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10948387645583e86c3f8bb7-75991159',
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
  'unifunc' => 'content_5583e86c4ceb35_59313427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583e86c4ceb35_59313427')) {function content_5583e86c4ceb35_59313427($_smarty_tpl) {?><div id="app_bgimage_gallaery" class="modal show fade">
 <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	<h3 id="Select_image"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Background Information'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h3>
 </div>
 <div class="modal-body">
   <form name="save_app_feature" id="saveAppImage" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/saveAppImage" method="POST">
	<input type="hidden" name="iApplicationId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
"/>
	<input type="hidden" name="app_type" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['eType'];?>
" id="bg_img_type"/>
   <div class="stock_section removebg">			  		
		  <ul>
		   <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_app_image']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<!--  <?php if (count($_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'])>0){?>	  
			    <span class="tabdata">
			    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>						    
				<?php if ($_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle']!=''){?>
					<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle'];?>
</br>
					<?php }else{ ?>
					<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['default_vTitle'];?>
</br>
				   <?php }?>
			    <?php endfor; endif; ?>
				 </span>						    
			  <?php }?> -->
			  
				  <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
">							 
				  <div class="links_bottoms" >
					  <!--<a href="javascript:void(0);">
					    <span class="btn_bg btn_bg_check" id="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
" onclick="selectBackground('<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
');">								  
					    </span>
					    <input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
					  </a>-->
					  <div class="demo-list clear" >
					    <ul>
						  <li >
						  	<input type="checkbox"  id="test" name="iBackgroundimgId[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'],$_smarty_tpl->tpl_vars['data']->value['selectedMobileImgIds'])){?> disabled <?php }?>>											 
						    <!--<input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_app_image'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">-->
						  </li>
					    </ul>
					  </div>
					  <!--<a href="#"><span class="btn_bg btn_bg_delete"></span></a>
					  <a href="#"><span class="btn_bg btn_bg_details"></span></a>-->
				  </div>
			  </li>
			  <?php endfor; endif; ?>				
		  </ul>
		  <div style="clear:both;"></div>
	  </div>
 </form>
    
 </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-primary" id="saveAppImage" onclick="return saveAppImage();" ><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='SaveItem'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
	<button class="btn" data-dismiss="modal" aria-hidden="true"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>				
 </div>
</div>
		  

<script>
$(document).ready(function(){
 var callbacks_list = $('.demo-callbacks ul');
 $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
   callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
 }).iCheck({
   checkboxClass: 'icheckbox_square-blue',
   radioClass: 'iradio_square-blue',
   increaseArea: '20%'
 });
});
</script>

		  
		  <?php }} ?>