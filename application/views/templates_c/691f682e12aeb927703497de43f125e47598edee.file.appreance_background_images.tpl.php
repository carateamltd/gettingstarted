<?php /* Smarty version Smarty-3.1.11, created on 2015-08-07 17:12:49
         compiled from "application/views/templates/appreance_background_images.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2288117235583d352c42734-54633238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '691f682e12aeb927703497de43f125e47598edee' => 
    array (
      0 => 'application/views/templates/appreance_background_images.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2288117235583d352c42734-54633238',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583d353269808_67565967',
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583d353269808_67565967')) {function content_5583d353269808_67565967($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
icheck.js?v=1.0.1"></script>
<div class="tab_main_title">
  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table_new">
	 <tr>
			<td width="350" align="left" style="padding-left: 20px;">
				<h2><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Background Image'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h2>
			</td>
			
			<td width="300">
			<!--<a href="#" class="tooltip_text"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> 1. Upload a background image or select from our image library.<br/>2. Scroll down to choose the sections to apply the background.<br/>3. Scroll back uo and hit save. viola!<br/>Click <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> for more details.</span></a>-->
			</td>
			<td align="right" id="button_save">
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save Background Settings'){?>
				<input type="button" class="btn btn_upload_icon" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" id="Save_Background_Settings" onclick="return saveBackgroundSettings();">
				<?php }?><?php } ?>
			</td>
	 </tr>
  </table>
  <!--<span id="save_changes" style="float: left;margin-left: 10px;display: none;" >Processing Please Wait....</span>-->
  
</div>
<input type="hidden" name="common_type" value="Mobile" id="common_tab">
<input type="hidden" name="main_app_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" id="main_app_id">
<div class="leftpartappearance main_content_back">
		  <ul class="tabbgchange">
			 <li class="activetabbtn"><a href="#background_setting" id="mobile_tab">Mobile</a></li>
			 <li class="tbbg"><a href="#back-iphones" id="mobile_tab">Iphone</a></li>
			 <li class="tbbg"><a href="#back-ipads" id="iPad_page">Ipad</a></li>
		  </ul>	
		  <div id="errmsg" style="margin:50px 0 0 10px;"></div>	  
		  <div class="fix_div_top">
		  <div class="button_1">
		    <form name="uploadBackgroundIamge" id="uploadBackgroundIamge" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/uploadBackgroundIamge">
			 <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" name="iAppId">			 
				    <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table">
						<tr>
						  <td><label><!--<a class="tooltip_text" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/><span><img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> 1. Upload an image or select one from below image list.<br> 2. Select tabs, locations, and sliding images by check the checkbox.<br>3. Hit Save Background Settings button to save.</span></a>--></label></td>
						  <td><input type="file" name="file_uploads_btn" id="file_upload_app_image">(100px*143px)
						  </td>
						  <td align="right" width="100">
						  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Upload an image'){?>	
						  	<input type="button" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" name="upload_btn_icon" class="btn btn_upload_icon" onclick="return uploadAppBgImage();">
						 	<?php }?><?php } ?>
						  </td>
						  <td align="right" width="100">
						  	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select from image library'){?>
						    <input type="button" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" name="upload_btn_icon" class="btn btn_upload_icon" id="open_img_library" onclick="return openImgGallery();" >
						    <?php }?><?php } ?>
						  </td>
						</tr>
				   </table>
		    </form>	    
		 </div>
		  
		  </div>	
		  <div style="clear:both;"></div> 
		  
		  <!--Mobile Setting coding start-->
		  <div id="background_setting">
		   <form name="saveBackgroundSetting" id="saveBackgroundSetting" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/saveBackgroundSetting?iApplicationId=<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
		   	 <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" name="iApplicationId">	
		   	 <input type="hidden" value="" name="" id="slide_info1">
		   	 <input type="hidden" value="" name="" id="slide_info2">
		   	 <input type="hidden" value="" name="" id="slide_info3">
		   	 <input type="hidden" value="" name="" id="slide_info4">
		   	 <input type="hidden" value="" name="" id="slide_info5">
             <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode'];?>
" name="" id="slidermode">                   			 
			 <div id="back-mobiles" class="back-mobiles">
				  <div class="stock_section">			  		
					  <ul>
					   <?php if (count($_smarty_tpl->tpl_vars['data']->value['your_tabbackground'])>0){?>
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
						  <li>
						  <?php if (count($_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'])>0){?>	  
						    <span class="tabdata">
						    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<?php if ($_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle']!=''){?>
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
							</br>
								<?php }else{ ?>
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['default_vTitle']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></br>
							   <?php }?>
						    <?php endfor; endif; ?>
							 </span>						    
						  <?php }?>
							  <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
">							 
							  <div class="links_bottoms">
								  <!--<a href="javascript:void(0);">
								    <span class="btn_bg btn_bg_check" id="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
" onclick="selectBackground('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
');">							</span>
								    <input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
								  </a>-->
								  <div class="demo-list">
								    <ul>
									  <li>
									    <input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
									  </li>
								    </ul>
								  </div>
								  <a href="javascript:void(0);" ><span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','background_setting');"></span></a>
								  <a href="javascript:void(0);"><span class="btn_bg btn_bg_details" onclick="return detailsAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
');"></span></a>
							  </div>
						  </li>
						  <?php endfor; endif; ?>
						  <?php }else{ ?>
						   <span style="color: rgb(255,255,255) !important;">
						   	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='No Background'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?>
						   </span>
						  <?php }?>
					  </ul>
				  </div>
			  </div>
			  
			   <div class="button_row">
			  <div class="button_1">
					   <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
						    <tr>
						    <td><label class="spec_label">
						    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Choose which sections'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?>:</label></td>
						    <td><!--<label>
						    <input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>-->
								<div class="skin skin-line-mobile">
									  <ul class="list tabs_checked">
										<li>
										  <input tabindex="18" type="checkbox" id="selectAll" value="1" >
										  <label for="selectAll"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select all'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></label>
										</li>
									  </ul>
								  </div>
						    </td>
						    </tr>
					   </table>
			  </div>
			  </div>
			  
			  <div class="button_row1">
				  <!--<div class="label">Home Screen</div>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> Background</label>-->
				  <div class="label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tabs'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></div>				  
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
				  <?php if (!in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?>
					 <!--<label class="lbl_checkbox">
					   <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
						<?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>

                        <?php }?>
					 </label>-->

					 <div class="skin skin-line-mobile">
							  <ul class="list tabs_checked">
								<li>								  
								  <input tabindex="17" name="iAppTabId[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" class="democls" id="tabId" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
								  <label for="tabId">
                                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> 
                                  </label>
								</li>
								<!--<li>
								  <input tabindex="18" type="checkbox" id="line-checkbox-2" checked>
								  <label for="line-checkbox-2">Checkbox 2</label>
								</li>-->
							  </ul>
							  </div>
						  <?php }?>  
						  <?php endfor; endif; ?>
				  
				  
				  
				  <!--<div class="label">Locations</div>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>-->
			  </div>
		    <?php if (count($_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])>0){?>
			<div class="button_row">
			<div class="button_1">
				      <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
						  <tr>
						  <td><label class="spec_label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='have backgrounds'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> :</label></td>
						  </tr>
				      </table>
			</div>
		     </div>		    
			 <div class="button_row1">
				<!--<div class="label">Home Screen</div>-->				
				<!--<div class="label">Tabs</div>-->				
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
				  <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?>
				   <!-- <label class="lbl_checkbox">
					 <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
					   <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?>
				    </label>-->					
					 <div class="skin skin-line-mobile skin_line_cross">
							  <ul class="list tabs_checked">
								<li>
								  <input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" class="close_checkbox"  >
								  <label for="tabId"><?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?></label>
								</li>								
							  </ul>
					</div>
				  <?php }?>
				  <?php endfor; endif; ?>				  
				<!--<div class="label">Locations</div>-->
			</div>
		    <?php }?>
		  </form>
		   
		   	
		   
		</div>
		 
		   
		<!--mobile coding setting end-->
		
		<div id="back-iphones">
			<form name="saveBackgroundSetting" id="saveBackgroundSetting" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/saveBackgroundSetting?iApplicationId=<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
		   	 <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" name="iApplicationId">	
		   	 <input type="hidden" value="" name="" id="slide_info1">
		   	 <input type="hidden" value="" name="" id="slide_info2">
		   	 <input type="hidden" value="" name="" id="slide_info3">
		   	 <input type="hidden" value="" name="" id="slide_info4">
		   	 <input type="hidden" value="" name="" id="slide_info5">
             <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode'];?>
" name="" id="slidermode">                   			 
			 <div id="back-mobiles" class="back-mobiles">
				  <div class="stock_section">			  		
					  <ul>
					   <?php if (count($_smarty_tpl->tpl_vars['data']->value['your_tabbackground'])>0){?>
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
						  <li>
						  <?php if (count($_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'])>0){?>	  
						    <span class="tabdata">
						    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<?php if ($_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle']!=''){?>
								<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle'];?>
</br>
								<?php }else{ ?>
								<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['apptab_deatils'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['default_vTitle'];?>
</br>
							   <?php }?>
						    <?php endfor; endif; ?>
							 </span>						    
						  <?php }?>
							  <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
">							 
							  <div class="links_bottoms">
								  <!--<a href="javascript:void(0);">
								    <span class="btn_bg btn_bg_check" id="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
" onclick="selectBackground('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
');">								  
								    </span>
								    <input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
								  </a>-->
								  <div class="demo-list">
								    <ul>
									  <li>
									    <input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
									  </li>
								    </ul>
								  </div>
								  <a href="javascript:void(0);" ><span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','background_setting');"></span></a>
								  <a href="javascript:void(0);"><span class="btn_bg btn_bg_details" onclick="return detailsAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
');"></span></a>
							  </div>
						  </li>
						  <?php endfor; endif; ?>
						  <?php }else{ ?>
						   <span style="color: rgb(255,255,255) !important;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='No Background'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></span>
						  <?php }?>
					  </ul>
				  </div>
			  </div>
			  
			   <div class="button_row">
			  <div class="button_1">
					   <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
						    <tr>
						    <td><label class="spec_label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='No Background'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></label></td>
						    <td><!--<label>
						    <input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>-->
								<div class="skin skin-line-iphone">
								  <ul class="list tabs_checked">
									<li>
									  <input tabindex="18" type="checkbox" class="close_checkbox" id="selectAll_iPhone_tab" value="1" >
									  <label for="selectAll_iPhone_tab"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select all'){?>
                       <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                     <?php } ?></label>
									</li>
								  </ul>
								  </div>
						    </td>
						    </tr>
					   </table>
			  </div>
			  </div>
			  
			  <div class="button_row1">
				  <!--<div class="label">Home Screen</div>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> Background</label>-->
				  <div class="label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tabs'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></div>				  
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
				  <?php if (!in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?>
					 <!--<label class="lbl_checkbox">
					   <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
						<?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>

                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>

                        <?php }?>
					 </label>-->
					 
					 <div class="skin skin-line-iphone">
							  <ul class="list tabs_checked">
								<li>								  
								  <input tabindex="17" name="iAppTabId[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" class="iphone_checkbox" id="tabId" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
								  <label for="tabId">
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>

                                    </label>
								</li>
								<!--<li>
								  <input tabindex="18" type="checkbox" id="line-checkbox-2" checked>
								  <label for="line-checkbox-2">Checkbox 2</label>
								</li>-->
							  </ul>
							  </div>
				  <?php }?>  
				  <?php endfor; endif; ?>
				  
				  
				  
				  <!--<div class="label">Locations</div>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="iphonelabel>-->
			  </div>
		    <?php if (count($_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])>0){?>
			<div class="button_row">
			<!--<div class="button_1">
				      <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
						  <tr>
						  <td><label class="spec_label">These sections already have backgrounds assigned:</label></td>
						  </tr>
				      </table>
			         
			</div>-->
		     </div>		    
			 <div class="button_row1">
				<!--<div class="label">Home Screen</div>-->				
				<!--<div class="label">Tabs</div>-->				
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
				  <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?>
				   <!-- <label class="lbl_checkbox">
					 <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
					   <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?>
				    </label>-->					
					 <div class="skin skin-line-iphone skin_line_cross">
							  <ul class="list tabs_checked">
								<li>
								  <input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" class="close_checkbox"  >
								  <label for="tabId"><?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?></label>
								</li>								
							  </ul>
					</div>
				  <?php }?>
				  <?php endfor; endif; ?>				  
				<!--<div class="label">Locations</div>-->
			</div>
		    <?php }?>
		  </form>
            
            
            
            
		</div>
		
		
		<!--iPad coding setting start-->
<!-- 		<div class="fix_div_top"> -->
		<div id="back-ipads">
				    
		  <form name="save_iPad_BackgroundSetting" id="save_iPad_BackgroundSetting" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/saveBackgroundSetting?iApplicationId=<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
             <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" name="iApplicationId">	
		   	 <input type="hidden" value="" name="" id="slide_info1">
		   	 <input type="hidden" value="" name="" id="slide_info2">
		   	 <input type="hidden" value="" name="" id="slide_info3">
		   	 <input type="hidden" value="" name="" id="slide_info4">
		   	 <input type="hidden" value="" name="" id="slide_info5">
             <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode'];?>
" name="" id="slidermode">    
            
            
			<input type="hidden" value="iPad" name="App_type" id="app_type">
			 <div id="back-ipad" class="back-mobiles">
				  <div class="stock_section">			  		
					  <ul>
					   <?php if (count($_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'])>0){?>
					   <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						  <?php if (count($_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPad_tab'])>0){?>	  
						    <span class="tabdata">
						    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPad_tab']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<?php if ($_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPad_tab'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle']!=''){?>
								<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPad_tab'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vTitle'];?>

								</br>
								<?php }else{ ?>
								<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPad_tab'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['default_vTitle'];?>
</br>
							   <?php }?>
						    <?php endfor; endif; ?>
							 </span>						    
						  <?php }?>
							  <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
">							 
							  <div class="links_bottoms">
								  <!--<a href="javascript:void(0);">
								    <span class="btn_bg btn_bg_check" id="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
" onclick="selectBackground('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
');">								  
								    </span>
								    <input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
								  </a>-->
								  <div class="demo-list clear">
								    <ul>
									  <li>
									    <input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
									  </li>
								    </ul>
								  </div>
								  <a href="javascript:void(0);" ><span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','back_ipads');"></span></a>
								  <a href="#"><span class="btn_bg btn_bg_details" onclick="return detailsAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
');"></span></a>
							  </div>
						  </li>
						  <?php endfor; endif; ?>
						  <?php }else{ ?>
						   <span style="color: rgb(255,255,255) !important;">
						   	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='No Background'){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?>
						   </span>
						  <?php }?>
					  </ul>
				  </div>
			   </div>
		     <div class="button_row">
			   <div class="button_1">
				  <!--<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
					 <tr>
					 <td><label class="spec_label">Choose which sections to apply this background to:</label></td>
					 <td><label>
					 <input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>
					   <div class="skin skin-line-ipad">
						<ul class="list tabs_checked">
						   <li>
							<input tabindex="18" class="close_checkbox" type="checkbox" id="selectAll_iPad_tab" value="1" >
							<label for="selectAll_iPad_tab">Select all</label>
						   </li>
						</ul>
						</div>
					 </td>
					 </tr>
				  </table>-->
			   </div>
			 </div>
			
			 <div class="button_row1">
				  <!--<div class="label">Home Screen</div>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> Background</label>-->
				  <div class="label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Tabs'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></div>				  
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
				  <?php if (!in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['selected_iPad_tab'])){?>
					 <!--<label class="lbl_checkbox">
					   <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
						<?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?>
					 </label>-->					 
					 <div class="skin skin-line-ipad">
							  <ul class="list tabs_checked">
								<li>								  
								  <input tabindex="17" name="iAppTabId[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" class="ipad_checkbox" id="tabId" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['selected_iPad_tab'])){?> checked="checked" <?php }?>>
								  <label for="tabId"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?>
						   		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

						   	<?php }?><?php } ?></label>
								</li>
								<!--<li>
								  <input tabindex="18" type="checkbox" id="line-checkbox-2" checked>
								  <label for="line-checkbox-2">Checkbox 2</label>
								</li>-->
							  </ul>
			               </div>
				  <?php }?>  
				  <?php endfor; endif; ?>				  
				  <!--<div class="label">Locations</div>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>
				  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>-->
			  </div>
			 <?php if (count($_smarty_tpl->tpl_vars['data']->value['selected_iPad_tab'])>0){?>
			 <div class="button_row">
			   <div class="button_1">
				  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
					   <tr>
					   		<td><label class="spec_label">These sections already have backgrounds assigned:</label></td>
					   </tr>
				  </table>
			   </div>			   
			 </div>		 
			   <div class="button_row1">				
				<!--<div class="label">Home Screen</div>-->				
				<!--<div class="label">Tabs</div>-->				
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
				  <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['selected_iPad_tab'])){?>
				   <!-- <label class="lbl_checkbox">
					 <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
					   <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?>
				    </label>-->					
					 <div class="skin skin-line-ipad skin_line_cross">
						  <ul class="list tabs_checked">
							<li>
							  <input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" class="iPad_closecheck"  >
							  <label for="tabId"><?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?></label>
							</li>								
						  </ul>
					</div>
				  <?php }?>
				  <?php endfor; endif; ?>				  
				<!--<div class="label">Locations</div>-->
			 </div>
			   <?php }?>
		  </form>	  
		</div>
		<!-- </div>
		</div> -->
		
		<!--ipad coding setting end-->		
		
		<div class="fix_div_top">
		<!--<div class="button_1">
				      <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
						  <tr>
						  <td><label class="spec_label">Set home screen sliding images </label></td>
						  <td><label>Auto Switching Mode: <a class="tooltip_text" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/><span><img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> You can disalbe automatic home sliding image switching, or set it with either sliding or fading effect.</span></a></label></td>
						  <td>
						  	<ul class="tab_select">
								
                                <li <?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode']=='hide'){?>class="active"<?php }?>><a href="javascript:void(0);" data_type="hide" >Disable</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode']=='slide'){?>class="active"<?php }?>><a href="javascript:void(0);" data_type="slide">Sliding</a></li>
								<li <?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode']=='fade'){?>class="active"<?php }?>><a href="javascript:void(0);" data_type="fade">Fade</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode']=='blind'){?>class="active"<?php }?>><a href="javascript:void(0);" data_type="blind">Blind</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode']=='clip'){?>class="active"<?php }?>><a href="javascript:void(0);" data_type="clip">Clip</a></li>
                                <li <?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['vSliderMode']=='drop'){?>class="active"<?php }?>><a href="javascript:void(0);" data_type="drop">Drop</a></li>
							</ul>
						  </td>
						  </tr>
				      </table>
		</div> -->
		
		<div class="button_1">
			<!--<div class="item_1">
				<a class="lnk_linkedit" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
lnk_buttons.png"></a>

				<?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg1Id']==0||$_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg1Id']]['vImage']==''){?>
				
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no-image itom1'){?>
						<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" id="slideimg1" >
					 <?php }?>
                <?php } ?>
				<?php }else{ ?>
				<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg1Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg1Id']]['vImage'];?>
" size="32x43" id="slideimg1">
				<?php }?>
				<span class="label_item">Slider 1</span>
				<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(1);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
triangle.png" size="32x43"></a>
				<div class="hidden_div_show" id="hidden_div_show_1">
					<a class="close_bar" href="#">&nbsp;</a>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allBackImgByApp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					  <a class="lnk_slider_item" href="javascript:void(0);">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" size="32x43" onclick="set_slide_img(1,'<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
')">
					  </a>
					<?php endfor; endif; ?>
					
				</div>
			</div> -->
			<!--<div class="item_1">
				<a class="lnk_linkedit" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
lnk_buttons.png"></a>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg2Id']==0||$_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg2Id']]['vImage']==''){?>
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no-image itom1'){?>
						<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" id="slideimg1" >
					 <?php }?>
                <?php } ?>
				<?php }else{ ?>
				<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg2Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg2Id']]['vImage'];?>
" size="32x43" id="slideimg2">
				<?php }?>
				<span class="label_item">Slider 2</span>
				<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(2);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
triangle.png"></a>
				
				<div class="hidden_div_show" id="hidden_div_show_2">
					<a class="close_bar" href="#">&nbsp;</a>
					
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allBackImgByApp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					  <a class="lnk_slider_item" href="javascript:void(0);">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" size="32x43" onclick="set_slide_img(2,'<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
')">
					  </a>
					<?php endfor; endif; ?>
					
					
				</div>
				
			</div>
			<!--<div class="item_1">

				<a class="lnk_linkedit" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
lnk_buttons.png"></a>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg3Id']==0||$_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg3Id']]['vImage']==''){?>
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no-image itom1'){?>
						<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" id="slideimg1" >
					 <?php }?>
                <?php } ?>
				
				<?php }else{ ?>
				<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg3Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg3Id']]['vImage'];?>
" size="32x43" id="slideimg3">
				<?php }?>
				<span class="label_item">Slider 3</span>
				<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(3);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
triangle.png"></a>
				
				<div class="hidden_div_show" id="hidden_div_show_3">
					<a class="close_bar" href="#">&nbsp;</a>
					
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allBackImgByApp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					  <a class="lnk_slider_item" href="javascript:void(0);">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" size="32x43" onclick="set_slide_img(3,'<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
')">
					  </a>
					<?php endfor; endif; ?>
					
					
				</div>
				
			</div>-->
			<!--<div class="item_1">
				<a class="lnk_linkedit" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
lnk_buttons.png"></a>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg4Id']==0||$_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg4Id']]['vImage']==''){?>
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no-image itom1'){?>
						<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" id="slideimg1" >
					 <?php }?>
                <?php } ?>
				<?php }else{ ?>
				<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg4Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg4Id']]['vImage'];?>
" size="32x43" id="slideimg4">
				<?php }?>
				<span class="label_item">Slider 4</span>
				<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(4);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
triangle.png"></a>
				
				<div class="hidden_div_show" id="hidden_div_show_4">
					<a class="close_bar" href="#">&nbsp;</a>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allBackImgByApp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					  <a class="lnk_slider_item" href="javascript:void(0);">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" size="32x43" onclick="set_slide_img(4,'<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
')">
					  </a>
					<?php endfor; endif; ?>
					
				</div>
				
			</div>-->
			<!--<div class="item_1">
				<a class="lnk_linkedit" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
lnk_buttons.png"></a>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg5Id']==0||$_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg5Id']]['vImage']==''){?>
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='no-image itom1'){?>
						<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" id="slideimg1" >
					 <?php }?>
                <?php } ?>
				<?php }else{ ?>
				<img class="img_noimg" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg5Id'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['all_backimg_by_backgroundid'][$_smarty_tpl->tpl_vars['data']->value['exist_slider_img']['iSliderImg5Id']]['vImage'];?>
" size="32x43" id="slideimg5">
				<?php }?>
				<span class="label_item">Slider 5</span>
				<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(5);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
triangle.png"></a>
				
				<div class="hidden_div_show" id="hidden_div_show_5">
					<a class="close_bar" href="#">&nbsp;</a>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allBackImgByApp']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					  <a class="lnk_slider_item" href="javascript:void(0);">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" size="32x43" onclick="set_slide_img(5,'<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['allBackImgByApp'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
')">
					  </a>
					<?php endfor; endif; ?>
					
				</div>
				
			</div>-->
		</div>
		</div>
		
		<!--iPad coding end-->
		
		
		
</div>
    <div class="applicationbackgroundimages">
	 	
    </div>
<div id="bimg_details">    
	<?php echo $_smarty_tpl->getSubTemplate ("back_img_detail_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
		
</div>

<script type="text/javascript">
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
/*Description: Modifide:-change in iphone select box  
Name: Chavda Hem
Date: 20-5-2014 */
	  
$(document).ready(function(){
              $('.skin-line-mobile input').each(function(){
                var self = $(this),
                  label = self.next(),
                  label_text = label.text();

                label.remove();
                self.iCheck({
                  checkboxClass: 'icheckbox_line-blue',
                  radioClass: 'iradio_line-blue',
                  insert: '<div class="icheck_line-icon"></div>' + label_text
                });
              });
              $('.skin-line-iphone input').each(function(){
                var self = $(this),
                  label = self.next(),
                  label_text = label.text();

                label.remove();
                self.iCheck({
                  checkboxClass: 'icheckbox_line-blue',
                  radioClass: 'iradio_line-blue',
                  insert: '<div class="icheck_line-icon"></div>' + label_text
                });
              });
              $('.skin-line-ipad input').each(function(){
                var self = $(this),
                  label = self.next(),
                  label_text = label.text();

                label.remove();
                self.iCheck({
                  checkboxClass: 'icheckbox_line-blue',
                  radioClass: 'iradio_line-blue',
                  insert: '<div class="icheck_line-icon"></div>' + label_text
                });
              });			  
			  
$('#selectAll').on('ifChecked', function(event){
		$('.democls').iCheck('check');
});

$('#selectAll').on('ifUnchecked', function(event){
 		$('.democls').iCheck('uncheck');
});

$('.close_checkbox').on('ifClicked', function(event){
    var iAppTabId = $(this).val();
	var iApplicationId='<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
';
	var extra='';
	extra+='?iApplicationId='+iApplicationId;
	extra+='&iAppTabId='+iAppTabId;
	extra+='&Operation=Delete';
	var url = base_url+'app/saveBackgroundSetting';
	var pars=extra;
	show_loading();
    $.post(url+pars,function(data){	 
        hide_loading();                
	   $("#background_setting").html(data.trim());	 
    });
});




$('.iPad_closecheck').on('ifClicked', function(event){  
	var iAppTabId = $(this).val();
	var appType=$("#app_type").val();	
	var iApplicationId='<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
';
	var extra='';
	extra+='?iApplicationId='+iApplicationId;
	extra+='&iAppTabId='+iAppTabId;
	extra+='&Operation=Delete';
	extra+='&App_type='+appType;
	var url = base_url+'app/saveBackgroundSetting';
	var pars=extra;
	show_loading();
    $.post(url+pars,function(data){
        hide_loading();
	   $("#back_ipads").html(data.trim());	 
    });
});


$('#selectAll_iPad_tab').on('ifChecked', function(event){
		$('.ipad_checkbox').iCheck('check');
});

$('#selectAll_iPad_tab').on('ifUnchecked', function(event){
 		$('.ipad_checkbox').iCheck('uncheck');
});

$('#selectAll_iPhone_tab').on('ifChecked', function(event){
		$('.iphone_checkbox').iCheck('check');
});

$('#selectAll_iPhone_tab').on('ifUnchecked', function(event){
 		$('.iphone_checkbox').iCheck('uncheck');
});

});



function deleteAppImage(iBackgroundId,divId){
  
  var msg = confirm("Are you sure, You want to delete this image?");
	 if (msg == true){		    
			var url = base_url+'app/deleteBackgroundImg';			
			var appType=$("#common_tab").val();
			var iApplicationId='<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
';
			var extra='';
		     extra+='?iApplicationId='+iApplicationId;
			extra+='&iBackgroundId='+iBackgroundId;
		     extra+='&Operation=Delete';
		     extra+='&App_type='+appType;			
			var pars=extra;
			show_loading();
			 $.post(url+pars,function(data){
			   hide_loading();			   
			   $("#"+divId).html(data.trim());			   
			 });			 
	 }
	 else{
		  return false;
	 }
}

function detailsAppImage(iBackgroundId,imagename){
  
			var url = base_url+'app/detailBackgroundImg';			
			var appType=$("#common_tab").val();
			var iApplicationId='<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
';
			var extra='';
		    extra+='?iApplicationId='+iApplicationId;
			extra+='&iBackgroundId='+iBackgroundId;
		    extra+='&App_type='+appType;
		    extra+='&vImage='+imagename;			
			var pars=extra;
			//alert(pars);return false;
			show_loading();
			 $.post(url+pars,function(data){
			   hide_loading();
			   $("#bimg_details").html(data);		
			   $("#back_img_detail").modal('show');			   
			 });			 
}

if($('.tab_select')){
    $(".tab_select li a").click(function() {
         var type = $(this).attr("data_type");   
         $(this).parent().addClass('active').siblings().removeClass('active');
         $('#slidermode').val(type);
    });
}
</script>

<?php }} ?>