<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 17:03:22
         compiled from "application/views/templates/notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107543395583e8eaad6ec6-87692851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0826aba8d53b67ccf8058f307029de4878ee2c81' => 
    array (
      0 => 'application/views/templates/notification.tpl',
      1 => 1430136998,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107543395583e8eaad6ec6-87692851',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'operation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583e8eacbddb3_29540449',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583e8eacbddb3_29540449')) {function content_5583e8eacbddb3_29540449($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
notification.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.form.js"></script>


<style>
.push{
        background: url('../assets/images/push.png');
        background-repeat: no-repeat;
        width: 47px;
        height: 43px;
        display: inline-table;
}
.pushmobile
{
        background: url('../assets/images/push.png');
        background-repeat: no-repeat;
        width: 12px;
        height: 18px;
        display: inline-table;
        background-size: 16px;
}
</style>

<div class="rightpanel">
	<ul class="breadcrumbs">   
            <li><a href="#"><i class="pushmobile"></i></a> <span class="separator"></span></li>
            <li><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Push Notification'){?>
                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                 <?php }?>
            <?php } ?>  </li>
    </ul>
    <div class="pageheader">
            <div class="pageicon"><span class="push"></span></div>
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
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Push Notification'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                            <?php } ?>
               </h1>
            </div>
    </div>
    
    <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
            <div class="span12">
             	<!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget purple">
           
                    <h4 class="widgettitle">
                    <i class="icon-reorder"></i>
                    <?php if ($_smarty_tpl->tpl_vars['operation']->value=='add'){?>				       						  						  						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Create  Notification'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                            <?php } ?>				  
				    <?php }else{ ?>				    
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Create  Notification'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?>
				    <?php }?>
                    </h4>
					<span class="tools">
                        <a href="javascript:;" class=""></a>
                        <a href="javascript:;" class=""></a>
                    </span>
               
                <div class="widget-body">
                   
                        <div class="clearfix">
                            <div class="btn-group" style="display:none;">
                                <button id="editable-sample_new" class="btn green">
							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add New'){?>
									<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

								 <?php }?>
							<?php } ?> 
					<i class="icon-plus"></i>
					</button>
					</div>
                    <div class="btn-group pull-right" style="display:none;">
                        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i></button>
                            <ul class="dropdown-menu pull-right" style="display:none;">
                                <li><a href="#">Print</a></li>
                                <li><a href="#">Save as PDF</a></li>
                                <li><a href="#">Export to Excel</a></li>
                            </ul>
                    </div>
                 </div>
				    
			     <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                    <div class="alert alert-info">
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

                    </div>
                 <?php }?>
				    
                 <div class="space15"></div>
				
				<!--action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
notification/<?php echo $_smarty_tpl->tpl_vars['data']->value['mode'];?>
"-->
<!--action="http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/notfiyfromXMl.php"-->
				<form class="form-horizontal" id="form_notification"   method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
notification">
				        <input type="hidden" name="iAdminId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['iAdminId'];?>
">
						
						<input type="hidden" name="iApplicationId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_applications'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iApplicationId'];?>
">
				        <input type="hidden" name="XmlUrl" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['client_url'];?>
">
					   
					    <div class="control-group">
                                    <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select Application'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                            <?php } ?></label>
                                    <div class="controls">
								<select name="data[iApplicationId]" id="iApplicationId" onchange="return get_users()">
                                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_applications'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
">--<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select Application'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                            <?php } ?> --</option>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['user_applications']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_applications'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iApplicationId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_applications'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tAppName'];?>
</option>
                                <?php endfor; endif; ?>                                  
                                </select>                                     
                                    </div>
                        </div>			   
					     
                            <div class="control-group">
                                    <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Message'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></label>
                                    <div class="controls">
                                        <textarea class="input-xxlarge" id="vMessage" rows="3" name="message"></textarea>
                                    </div>
                            </div>
							
							 <div class="control-group">
                                    <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='TabName'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></label>
                                    <div class="controls">
                                       <select name="data[tabname]" id="tabname">
									   <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_applications'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
">-- <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select iApplicationIdon'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?> --</option>
									    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['tabname']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									   		<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tabname'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iFeatureId'];?>
">
                                                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['tabname'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle']){?> <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
 <?php }?> <?php } ?>
                                            </option>
										<?php endfor; endif; ?> 
									   </select>
                                    </div>
                            </div>
							
                            <div class="control-group">
                                    <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Type'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" value="Individual" id="Individual">
                                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Individual'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" value="Group" id="Group" >
                                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Group'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" value="All" id="All">
                                            All
                                        </label>
                                    </div>
					   </div>
					   
					    <div class="control-group" style="display: none;" id="group_names">
						<label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Group Name'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></label>
						<div class="controls">
						<select name="group_name" id="group">
							<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_group'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
">--<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select Group Name'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?>--</option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_group'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['all_group'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
							<?php endfor; endif; ?>
							
						</select>
						</div>
                       </div>
					   
					    <div class="control-group" style="display: none;" id="individual_names">
                            <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Individual'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></label>
                                <div class="controls">
                                    <select name="data[individual_name]" id="individual">
							 	       <option value="">--<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select Individual Name'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?>--</option>
								    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['all_individuals']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								        <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['all_individuals'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iUserId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['all_individuals'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vDevicename'];?>
</option>
								    <?php endfor; endif; ?>								    
								    </select>

                                </div>
                        </div>
					   
					    <div class="form-actions">
                                    <button type="button" class="btn btn-primary" id="send_notification" ><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Send'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></button>
									 <button type="button" class="btn btn-primary"  onclick="return returnme();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Cancel'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></button>
                            </div>
					   
					   
                            
                    </form>
                 </div>
            </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>  
    <!-- END PAGE CONTENT-->         
    
            
          
            
            <div class="clearfix"></div>
			<br /><br /><br /><br /><br /><br /> <br /> <br /><br /> <br /> <br /> <br />
               </div>   <div class="footer">
                	  <div class="footer-left">
                        <span>Copyright &copy; 2014 Easy Apps All rights reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>
                    </div>
                </div>
    </div></div>
            
<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
    <!--<div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
     <!--   <div class="row-fluid">
            <div class="span12">-->
               <!-- BEGIN THEME CUSTOMIZER-->
                <!--<div id="theme-change" class="hidden-phone">
                   <i class="icon-cogs"></i>
                    <span class="settings">
                        <span class="text">Theme Color:</span>
                        <span class="colors">
                        <span class="color-default" data-style="default"></span>
                        <span class="color-green" data-style="green"></span>
                        <span class="color-gray" data-style="gray"></span>
                        <span class="color-purple" data-style="purple"></span>
                        <span class="color-red" data-style="red"></span>
                        </span>
                    </span>
                </div>-->
            <!-- END THEME CUSTOMIZER-->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
         <!--       <h3 class="page-title">
			 
			  
              
			 
                </h3>-->
                <!--ul class="breadcrumb">
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">Dashbosssard</a>
                        <span class="divider">/</span>
                    </li>
				<?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator">
						<?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						   View  Administrator
						  <?php }else{ ?>
							View Client
						  <?php }?>
				    </a>
				    <span class="divider">/</span>
				</li>
				<?php }?>
                    <li class="current">
				    <?php if ($_smarty_tpl->tpl_vars['operation']->value=='add'){?>				       
						  <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						   Add  Administrator
						  <?php }else{ ?>
							Add Client
						  <?php }?>			  
				    <?php }else{ ?>				    
						  <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						   Edit  Administrator
						  <?php }else{ ?>
							Edit Client
						  <?php }?> 
				    
				    <?php }?>
				</li>
                    <li class="pull-right search-wrap">
                        <form action="search_result.html" class="hidden-phone">
                            <div class="input-append search-input-area">
                                <input class="" id="appendedInputButton" type="text">
                                <button class="btn" type="button"><i class="icon-search"></i> </button>
                            </div>
                        </form>
                    </li>
                </ul-->
            <!-- END PAGE TITLE & BREADCRUMB-->
        <!--    </div>-->
         <!-- END PAGE HEADER-->   
        <!--</div>-->
        <!-- BEGIN PAGE CONTENT-->
        
<!-- END PAGE CONTAINER-->
<!--</div>-->
    

<script>
    $(window).load(function() {  
       var user_mode ='<?php echo $_smarty_tpl->tpl_vars['data']->value['mode'];?>
';
	  var user_role='<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iRoleId'];?>
';	  
	   if (user_role=='2' && user_mode=='update') {
            $("#xmlUrlData").show();
        }else{
		  $("#xmlUrlData").hide();
	   }
	  
    });
    
</script>

    
<?php }} ?>