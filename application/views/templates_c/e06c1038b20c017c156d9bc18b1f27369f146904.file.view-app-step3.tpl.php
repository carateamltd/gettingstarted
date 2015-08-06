<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 13:40:11
         compiled from "application/views/templates/view-app-step3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28071995583b94bf016f6-36551925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e06c1038b20c017c156d9bc18b1f27369f146904' => 
    array (
      0 => 'application/views/templates/view-app-step3.tpl',
      1 => 1430225929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28071995583b94bf016f6-36551925',
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
  'unifunc' => 'content_5583b94c30d8e7_19130044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583b94c30d8e7_19130044')) {function content_5583b94c30d8e7_19130044($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.form.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("set_background_image_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application'){?>
                       <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                     <?php } ?></li>
    </ul>
    <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='All Features Summary'){?>
                       <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                     <?php } ?></h5>
                <h1>
                	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application'){?>
                       <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                     <?php } ?>
               </h1>
            </div>
    </div>
    <input type="hidden" name="mainactivetab" id="mainactivetab" value="" />  
    <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN EXAMPLE TABLE widget-->
				<div class="widget purple brdrnone" >
					<!--div class="widget-title">
						<h4><i class="icon-reorder"></i> Application</h4>
						<span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> <a href="javascript:;" class="icon-remove"></a> </span> </div-->
					<div class="widget-body">
						<div>
							<!--div class="clearfix">
								<div class="btn-group">
                             <a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
                                 Add New <i class="icon-plus"></i>
                             </a>
                         </div>
								<div class="btn-group pull-right" style="display:none;">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i> </button>
									<ul class="dropdown-menu pull-right">
										<li><a href="#">Print</a></li>
										<li><a href="#">Save as PDF</a></li>
										<li><a href="#">Export to Excel</a></li>
									</ul>
								</div>
							</div-->
							<!--div class="space15">
								<div class="span6">
									<div class="span6 "> <?php if (count($_smarty_tpl->tpl_vars['data']->value['role'])>0){?>
										<p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
										<?php }?> </div>
								</div>
							</div-->
							<div class="mainpartcont"> <?php echo $_smarty_tpl->getSubTemplate ("tab.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<div class="tbdata">
									<div class="progress progress-striped active" >
										<div class="bar" style="width: 40%;"></div>
									</div>
									<div id="tbl_msg"></div>
									<div class="div_inner">
										<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
"  name="appinformation[iApplicationId]" id="iApplicationId">

										<div id="tabs">
											<!-- Modify By Name:-maksudkhan 20-05-2014
									            Description: listing active
								            -->
									           <ul id="sortable2" class="sortable2">
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
									            <?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eActive']=="Yes"){?>
									            	<?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']=="ContactUs"){?>
									            		<li style="display:none" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']==0){?>activebuttontab<?php }else{ ?>buttontab<?php }?>" id="recordsArray_<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
">
									            		 <!--<a href="#tabs-<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</a>-->
									            		 <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
											             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?>
											                <a href="#tabs-<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
</a>
											             <?php }?>
											             <?php } ?>

									            	<?php }else{ ?>
									            		<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']==0){?>activebuttontab<?php }else{ ?>buttontab<?php }?>" id="recordsArray_<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"> 
									            		<!--<a href="#tabs-<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</a>-->
									            		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
											             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?>
											                <a href="#tabs-<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
</a>
											             <?php }?>
											             <?php } ?>
									            	<?php }?>
									            </li><?php }else{ ?>
									            <li style="display:none" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']==0){?>activebuttontab<?php }else{ ?>buttontab<?php }?>" id="recordsArray_<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"> <a href="#tabs-<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"> <?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
 </a> </li>
									           
									            <?php }?>
									            <?php endfor; endif; ?>
									           
									           </ul>

											<!--<div class="subtabbtn"> <a class="btn btn_upload_icon" style="text-decoration:none;color:white;float: right;" data-controls-modal="subTabs" data-backdrop="static" data-keyboard="false" href="#appr-buttons-subtbs" id="appearance_sub_tabs" role="presentation" tabindex="-1">Sub Tabs</a> </div>-->
                                            
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
											<div id="tabs-<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
">
												<div style="float:left; width:56%;"> 
													<?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['default_vTitle']=="Location"){?>
														<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['j'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allLocation']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
															<?php if ($_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']==$_smarty_tpl->tpl_vars['data']->value['allLocation'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iAppTabId']){?> <a class="btn ui-tabs-anchor"  href="javascript:void(0);" onclick="return edit_location('<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['allLocation'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iAppId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iApplicationId'];?>
');" id="" style="float: right;margin-right: 14px;width: 6%;"><?php echo $_smarty_tpl->tpl_vars['data']->value['allLocation'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iAppId'];?>
</a> <?php }?>
														
														<?php endfor; endif; ?>
													<!--<a class="btn ui-tabs-anchor"  href="javascript:void(0);" id="" style="float: right;margin-right: 14px;width: 6%;" onclick="return deleteLocation('<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
');">Edit</a>
                                                <a class="btn ui-tabs-anchor"  href="javascript:void(0);" id="" style="float: right;margin-right: 14px;width: 6%;" onclick="return deleteLocation('<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
');">Delete</a>-->
													<?php }?>
                                                      <!--
              											Modified By : Nizam Kadri
										                Modified Date : 17-05-2014 
										                Purpose : Purpose to set User on same page while he/she click on navigation help icon.
                                                     -->
													<div id="form_<?php echo $_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId'];?>
"> 
                                                        <?php echo $_smarty_tpl->tpl_vars['data']->value['html'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']];?>
 
                                                    </div>
												</div>
												<div class="main_box">
													<div class="top_head_box" id="mtabs">
														<ul class="hadbg">
															<li class="tbbg activetabbtn" onclick="mtbcls_chng(this);"><a href="#mtabs-mobile">Mobile </a> <a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> Mobile&nbsp;(100&nbsp;x&nbsp;143) </span></a></li>
															<li class="tbbg" onclick="mtbcls_chng(this);"><a href="#mtabs-iphone">Iphone</a> <a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='iPhone5_desc'){?>
                       <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                     <?php } ?>
                       </span></a></li>	<li class="tbbg" onclick="mtbcls_chng(this);"><a href="#mtabs-tablet"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    	<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='TABLET'){?>
                       <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                     <?php }?>
                     <?php } ?></a> <a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /> Tablet<br/> (960&nbsp;x&nbsp;1380) </span></a></li>
														</ul>
														<div class="tabwrapmain">
															<div id="mtabs-mobile" style="min-height:400px;" > <?php if ($_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]){?> <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iBackgroundimgId'];?>
/org_<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['vImage'];?>
" width="377px" height="" style="width:100%;height:400px;">
																<div class="delete_main" style="left: 104px;
height: 38px;"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/delete_user_background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
?bId=<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iUserTabBackImgId'];?>
" >
																
																<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
select_delete_btn.png" />-->
																<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																	 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='select delete btn'){?>
																		<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" /> 
																	 <?php }?>
																<?php } ?>
																 </a> </div>
																<?php }?> </div>
															<div id="mtabs-iphone" style="min-height:400px;"> <?php if ($_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]){?> <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iBackgroundimgId'];?>
/org_<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['vImage'];?>
" width="377px" height="">
																<div class="delete_main" style="left: 104px;
height: 38px;"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/delete_user_background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
?bId=<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iUserTabBackImgId'];?>
" >
																<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
select_delete_btn.png" /> -->
																<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																	 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='select delete btn'){?>
																		<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" style="height: 35px;margin-top: -1px;" /> 
																	 <?php }?>
																<?php } ?>
																</a> </div>
																<?php }?> </div>
															<div id="mtabs-tablet" style="min-height:400px;"> <?php if ($_smarty_tpl->tpl_vars['data']->value['back_tab_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]){?> <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['back_tab_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iBackgroundimgId'];?>
/org_<?php echo $_smarty_tpl->tpl_vars['data']->value['back_tab_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['vImage'];?>
" width="377px" height="">
																<div class="delete_main" style="left: 104px;
height: 38px;"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/delete_user_background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
?bId=<?php echo $_smarty_tpl->tpl_vars['data']->value['back_tab_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iUserTabBackImgId'];?>
" >
																<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
select_delete_btn.png" /> -->
																<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																	 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='select delete btn'){?>
																		<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" style="height: 35px;margin-top: -1px;" /> 
																	 <?php }?>
																<?php } ?>
																</a> </div>
																<?php }elseif($_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]){?> <img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iBackgroundimgId'];?>
/org_<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['vImage'];?>
" width="377px" height="">
																<div class="delete_main"><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/delete_user_background_image/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
?bId=<?php echo $_smarty_tpl->tpl_vars['data']->value['back_mob_img_details'][$_smarty_tpl->tpl_vars['data']->value['selected_feature_details'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAppTabId']]['iUserTabBackImgId'];?>
" >
																<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
select_delete_btn.png" /> -->
																<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																	 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='select delete btn'){?>
																		<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" style="height: 35px;margin-top: -1px;" /> 
																	 <?php }?>
																<?php } ?>
																</a> </div>
																<?php }?> </div>
															<div class="botton_part"> <a href="#myModal_set_backimg" data-toggle="modal" style="right: -13%;
position: relative;">
															<!--<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
select_btn.png" /> -->
															<?php if ($_smarty_tpl->tpl_vars['lang']->value[0]['rField']=='Connexion'){?>
															<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
select_btn_f.png" />
															<?php }else{ ?>
															<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
select_btn.png" />
															<?php }?>
															<!--<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
																 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select_btn'){?>
																 	<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
.png" />
																 <?php }?>
															<?php } ?> -->
															</a> </div>
														</div>
													</div>
													<div class="top_middle_box"> </div>
													<div class="set_header"></div>
												</div>
												<div style="clear:both;"></div>
											</div>
											<?php endfor; endif; ?> </div>
									</div>
									<div class="new-dlg-container">
										<form name="buildwiz" method="post">
										</form>
									</div>
								</div>
							</div>
						</div>
						<div style="clear:both;"></div>
						<div class="pagination"> <?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>
 </div>
					</div>
				</div>
			</div>
			<!-- END EXAMPLE TABLE widget-->
            <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
                    </div>
                </div>
		</div>
            </div>
    </div>
    <div id="appr-buttons-subtbs"> <?php echo $_smarty_tpl->getSubTemplate ("appearance_sub_tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 </div>
    </div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h3 id="myModalLabel">Pick Your App Features</h3>
	</div>
	<div class="modal-body">
		<div class="toptab">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th align="left"><strong>Industry</strong> <span class="qmark">&nbsp;</span></th>
					<th align="left"><strong>App Name</strong> <span class="qmark">&nbsp;</span></th>
					<th align="left"><strong>App Icon Name</strong> <span class="qmark">&nbsp;</span></th>
				</tr>
				<tr>
					<td><select class="indst" id="industry" name="appindustry">
							<option value="">Select App Industry</option>
							
				 <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['appindustry']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					
							<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appindustry'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIndustryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['appindustry'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</option>
							
				<?php endfor; endif; ?>
			
						</select>
					</td>
					<td><input class="indst" type="text" value="" size="30" id="app_name" name="app_name"></td>
					<td><input class="indst" type="text" maxlength="12" value="" size="30" id="app_icon" name="app_icon"></td>
				</tr>
			</table>
		</div>
		<div class="midparttp">
			<div id="err"></div>
			<div class="midleft">
				<fieldset>
				<legend>Recommended:</legend>
				<div class="innerlft"> Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
				</div>
				</fieldset>
			</div>
			<div class="midright">
				<fieldset>
				<legend>Optional:</legend>
				<div class="innercont"> Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
				</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>
	</div>
</div>





<!--<div id="main-content">-->

	<!-- BEGIN PAGE CONTAINER-->
	<!--<div class="container-fluid">-->
		<!-- BEGIN PAGE HEADER-->
		<!--<div class="row-fluid">
			<div class="span12">-->
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<!--<h3 class="page-title"> Application </h3>
			</div>
		</div>-->
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		
<!--	</div>-->
	<!-- END EDITABLE TABLE widget-->
	<!-- END PAGE CONTENT-->
<!--</div>-->
<!-- END PAGE CONTAINER-->
<!--</div>-->

<!-- Modal -->



<script>
$(function() {
var current_tab_id = $.session.get("curTabId");
/*if(current_tab_id){
	var current_tab_id_arr =current_tab_id.split("_");
	show_hide_gallery('Custom',current_tab_id_arr[1]);
}*/

//alert(current_tab_id_arr[1]+'current tab');
$("#tabs").bind("tabsactivate", function (event, ui) {
	$.session.set("curTabId", ui.newTab.attr('id'));
	curTabIndex = ui.newTab.index();
	$.session.set("curTabIndex", curTabIndex);
});	

var neworder = new Array();
var tabs = $( "#tabs" ).tabs();
var sel = $.session.get("curTabIndex");
if(sel){
	var tabs =$( "#tabs" ).tabs( "option", "active", sel );
}else{
	var tabs = $( "#tabs" ).tabs();
}

if($.session.get("curTabId")){
 $("#tabs").find('li').each(function(){
 	if( $(this).closest('div').attr('id') == 'tabs'){
	   $( this ).removeClass('activebuttontab').addClass('buttontab');
 	}
  });	
	$("#"+$.session.get("curTabId")).removeClass('buttontab').addClass('activebuttontab');
    if($("#"+$.session.get("curTabId")).val() !=''){
            var selectedtabid = $("#"+$.session.get("curTabId")).val();
            $('#mainactivetab').val(selectedtabid);
    }
}
/* tabs.find( ".ui-tabs-nav" ).sortable({
  axis: "x",
   update : function () {  
	      

            $('#tabs li').each(function() {    
                var id  = $(this).attr("aria-controls");

                neworder.push(id);

            });
            console.log(neworder);
   },
  stop: function() {
    tabs.tabs( "refresh" );
  }
});*/
});

$('#dStartDate').datepicker({
    format: 'yyyy-mm-dd'
});

$('#dEndDate').datepicker({
    format: 'yyyy-mm-dd'
});



function closeleanmodal(){
 $("#lean_overlay").click();   
}
$("#sortable2 li").click(function(){
	var selectedtabid = this.value;
    $('#mainactivetab').val(selectedtabid);
});
$(window).load(function() {
});
$( document ).tooltip({
 position: {
 my: "left center",
 at: "right center",
 using: function( position, feedback ) {
  $( this ).css( position );
  $( "<div>" )
  .addClass( "arrow" )
  .addClass( feedback.horizontal )
  .appendTo( this );
  }
  }
 });

	// color picker 
	$('#picker1').colorpicker().on('changeColor', function(ev){
		var cval = ev.color.toHex();
		//	$(this).val(ev.color.toHex());
		$("#red_color").css('background',cval);
		$("#rcat1").css('background',cval);
		$("#red_color").val(ev.color.toHex());
		
		//bodyStyle.backgroundColor = ev.color.toHex();
	})
	
	$('#picker2').colorpicker().on('changeColor', function(ev){
		var cval = ev.color.toHex();
		//	$(this).val(ev.color.toHex());
		$("#green_color").css('background',cval);
		$("#green_color").val(ev.color.toHex());
		//bodyStyle.backgroundColor = ev.color.toHex();
	})
	
	$('#picker3').colorpicker().on('changeColor', function(ev){
		var cval = ev.color.toHex();
		//	$(this).val(ev.color.toHex());
		$("#purple_color").css('background',cval);
		$("#purple_color").val(ev.color.toHex());
		//bodyStyle.backgroundColor = ev.color.toHex();
	})
	
	$(function() {
		$( "#sortable_aroundus" ).sortable();
		$( "#sortable_aroundus" ).disableSelection();
	});

</script>

 <?php }} ?>