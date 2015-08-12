<?php /* Smarty version Smarty-3.1.11, created on 2015-08-12 14:43:32
         compiled from "application/views/templates/ajax_layout_tablisting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199069214355caf92443fe47-37869229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ef61719b1431f6ae68b9139f94688ed5dc43d5a' => 
    array (
      0 => 'application/views/templates/ajax_layout_tablisting.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199069214355caf92443fe47-37869229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55caf9245d3f13_34518605',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55caf9245d3f13_34518605')) {function content_55caf9245d3f13_34518605($_smarty_tpl) {?><div class="div_inactive_tabs">  
		 <h3>Inactive Tabs</h3>
		  <div class="page_line1">Page <strong>1</strong></div>
		  <ul class="inactive_list_icon" id="inactive_list_icons" >
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
			   <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eActive']=='No'){?>
				  <li id="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" >
					<div class="tab_custom_button">
						<div class="button_back"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
icon_back_area.png"></div>
						<div class="overlay_icon_color"></div>
						<div class="icon_btnpack">
						  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" />					
						</div>
						<div class="title_icn"><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</div>
					</div>
					<div class="fright_link_title"><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</div>
					<div class="fright_link">				    
						<!--<a title="Details" class="lnk_eachtab_design" href="#" ><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
detail_icon.png"></a>-->
						<a title="Details" class="lnk_eachtab_design" href="javascript:void(0);" onclick="edit_custom_tab('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['step'];?>
');"><i class="icon-edit"></i><!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
detail_icon.png">--></a>
						<br><br>
						<!--<a title="Make Inactive" class="lnk_eachtab_inactive" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
remove_icon.png"></a>-->
						<a title="Make Inactive" class="lnk_eachtab_inactive" href="javascript:void(0);" onclick="return makeInActive('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
');"><i class="icon-bitbucket"></i><!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
remove_icon.png">--></a>
					</div>
				</li>		 
			   <?php }?>		
			 <?php endfor; endif; ?>		
		  </ul>
  </div>
 <!-- 
 Modified by : Nizam Kadri.
 Modified date : 19/05/2014.
 Purpose : To set App Layout's Icons in proper manner without changing color after inactivate the tab.
-->
  <div class="div_active_tabs">
		  <h3>Active Tabs</h3>
		  
		  <div class="page_line2">Page <strong>1</strong></div>
		  <ul class="active_list_icon" id="active_list_icons" >
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
			   <li id="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
">
				  <div class="tab_custom_button">
					  <div class="button_back"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
icon_back_area.png"></div>
					  <div class="overlay_icon_color"></div>
					  <div class="icon_btnpack">
						<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
tab_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIconcolorId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" />
					  </div>
					  <div class="title_icn">
					 <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>

				  </div>
				  </div>
				  <div class="fright_link_title">
				  <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>

			   </div>
				  <div class="fright_link">
					  <a title="Details" class="lnk_eachtab_design botspash" href="javascript:void(0);" onclick="edit_custom_tab('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['step'];?>
');"><i class="icon-edit"></i><!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
detail_icon.png">--></a>
					  <br>
					  <a title="Make Inactive" class="lnk_eachtab_inactive" href="javascript:void(0);" onclick="return makeInActive('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
');"><i class="icon-bitbucket"></i><!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
remove_icon.png">--></a>
				  </div>
			   </li>
			 <?php }?>
		    <?php endfor; endif; ?>
		  </ul>
  </div>
  
  

<script>		 
$("#active_list_icons").sortable({
		 connectWith:"#inactive_list_icons",
		 receive: function(event, ui){			  
		 var url = base_url+'app/udpate_status';			
		 var id=ui.item.attr('id');
		 var extra='';
		 extra+='?id='+id;
		 extra+='&eStatus=Yes';
		 var pars=extra;			
		 $.post(url+pars, function(theResponse){				
		 });
		 }   
});
		 
$("#inactive_list_icons").sortable({
		 connectWith: "#active_list_icons",
		 receive: function(event, ui){			  	
		 var url = base_url+'app/udpate_status';			
		 var id=ui.item.attr('id');
		 var extra='';
		 extra+='?id='+id;
		 extra+='&eStatus=No';
		 var pars=extra;			
		 $.post(url+pars, function(theResponse){				
		 });
		 }	
});	
		 
		 
</script>

  <?php }} ?>