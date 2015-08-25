<?php /* Smarty version Smarty-3.1.11, created on 2015-08-25 14:55:42
         compiled from "application/views/templates/ajax_iPad_appearance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44189955955dc1f7ea6a976-40400420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '665a177dfc77c1db5ec3a0fea671c8f94a6ffcfe' => 
    array (
      0 => 'application/views/templates/ajax_iPad_appearance.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44189955955dc1f7ea6a976-40400420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55dc1f7ed35b17_85073481',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dc1f7ed35b17_85073481')) {function content_55dc1f7ed35b17_85073481($_smarty_tpl) {?><form name="save_iPad_BackgroundSetting" id="save_iPad_BackgroundSetting" method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
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
<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" name="iApplicationId">			 

<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" name="iApplicationId">
<input type="hidden" value="iPad" name="App_type" id="app_type">
 <div id="back-ipad" class="back-mobiles">
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
					  <div class="demo-list clear">
					    <ul>
						  <li>
						    <input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
">
						  </li>
					    </ul>
					  </div>
					  <a href="javascript:void(0);" ><span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['your_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','back_ipads');"></span></a>
					  <a href="#"><span class="btn_bg btn_bg_details" onclick="return detailsAppImage('<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBackgroundId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['iPad_tabbackground'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
');"></span></a>
				  </div>
			  </li>
			  <?php endfor; endif; ?>
			   <?php }else{ ?>
			     <span style="color: rgb(255,255,255) !important;">No Background Image Avilable</span>
			  <?php }?>
		  </ul>
	  </div>
   </div>
 <div class="button_row">
   <div class="button_1">
	  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
		 <tr>
		 <td><label class="spec_label">Choose which sections to apply this background to:</label></td>
		 <td><!--<label>
		 <input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>-->
		   <div class="skin skin-line-ipad">
		   <div class="skin skin-line-ipad">
			<ul class="list tabs_checked">
			   <li>
				<input tabindex="18" type="checkbox" id="selectAll_iPad_tab" value="1" >
				<label for="selectAll_iPad_tab">Select all</label>
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
	  <div class="label">Tabs</div>				  
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
			<?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']==''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php }?>
		 </label>-->					 
		 <div class="skin skin-line-ipad">
				  <ul class="list tabs_checked">
					<li>								  
					  <input tabindex="17" name="iAppTabId[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" class="ipad_checkbox" id="tabId" <?php if (in_array($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'],$_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])){?> checked="checked" <?php }?>>
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
	  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>-->
  </div>
 <?php if (count($_smarty_tpl->tpl_vars['data']->value['finalSelected_tab_array'])>0){?>
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
   <?php }?>
	  
	<!--<div class="label">Locations</div>-->
 </div>		 
</form>	 

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
	  
$(document).ready(function(){
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
});

if($('.tab_select')){
    $(".tab_select li a").click(function() {
         var type = $(this).attr("data_type");   
         $(this).parent().addClass('active').siblings().removeClass('active');
         $('#slidermode').val(type);
    });
}
</script>

<?php }} ?>