<?php /* Smarty version Smarty-3.1.11, created on 2015-09-24 21:22:24
         compiled from "application/views/templates/administrator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81370371656015c073c42c3-85021716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3f0ac2b2d60403361ce5a757a8961e435c70042' => 
    array (
      0 => 'application/views/templates/administrator.tpl',
      1 => 1443103522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81370371656015c073c42c3-85021716',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_56015c078983c0_81841792',
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'operation' => 0,
    'eStatuses' => 0,
    'industries' => 0,
    'selectedindustries' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56015c078983c0_81841792')) {function content_56015c078983c0_81841792($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
administrator.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
multiselect.min.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
bootstrap.min.css">
 <div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="iconfa-user"></i></a> <span class="separator"></span></li>
            <li><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                           <?php } ?></li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	 <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                     <!--
                        Change By : Mayur Gajjar
                        Date : 30/7/2014
                        Chage : multilanguage 
                     -->
                    
                         <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                           <?php } ?>
                     <?php }else{ ?>
                         <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Client'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                          <?php } ?>
                     <?php }?>
               </h1>
            </div>
        </div>
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">  
                	<div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                
                  <!--  <div class="widget-title">-->
                    <h4 class="widgettitle">
                    <i class="icon-reorder"></i>
                        <?php if ($_smarty_tpl->tpl_vars['operation']->value=='add'){?>                       
                          <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                           <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add Administrator'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                          <?php } ?>
                          <?php }else{ ?>
                                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add Client'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?>
                          <?php }?>           
                    	  <?php }else{ ?>                  
                          <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                           		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit Administrator'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?>
                          <?php }else{ ?>
                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit Clinet'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?>
                          <?php }?> 
                    <?php }?>
                     </h4>
                    <span class="tools">
                        <a href="javascript:;" class=""></a>
                        <a href="javascript:;" class=""></a>
                    </span>
                </div>
                <div class="widget purple">
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
                              <?php } ?> <i class="icon-plus"></i>
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
                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/<?php echo $_smarty_tpl->tpl_vars['data']->value['mode'];?>
" method="post">
                        <input type="hidden" name="iAdminId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iAdminId'];?>
">  
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='First Name'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vFirstName" name="Data[vFirstName]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vFirstName'];?>
" minlength="2" maxlength="50"/>
                                </div>
                            </div>
                            <div class="control-group">
                                    <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Last Name'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                    <div class="controls">
                                        <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vLastName" name="Data[vLastName]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vLastName'];?>
" minlength="2" maxlength="50"/>
                                    </div>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['admin']['vEmail']==''){?>
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Email'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <input type="text" placeholder="" class="input-large" id="vEmail" name="Data[vEmail]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vEmail'];?>
" minlength="2" autocomplete="off" maxlength="50"/>

                                </div>
                            </div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['admin']['vPassword']==''){?>
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Password'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <input type="password" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 6 characters allowed" class="input-large" id="vPassword" name="Data[vPassword]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vPassword'];?>
" minlength="6" autocomplete="off" maxlength="50"/>

                                </div>
                            </div>
                            <?php }?>
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Contact Number'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <input maxlength="16" type="text" placeholder="" class="input-large" id="vPhone" name="Data[vPhone]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vPhone'];?>
" maxlength="50"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Address'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 150 characters allowed" class="input-large" id="vAddress" name="Data[vAddress]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vAddress'];?>
" minlength="2" maxlength="150"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Zipcode'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 8 characters allowed" class="input-large" id="vZipCode" name="Data[vZipCode]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vZipCode'];?>
" minlength="2" maxlength="8" />

                                </div>
                            </div>
                       <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']==1){?>
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Role'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <select class="input-large m-wrap" tabindex="1" name="Data[iRoleId]" id="iRoleId" onchange="return showhidexmlurl(this.value);" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iRoleId'];?>
">
                                        <option value="">---- Select Role ----</option>
                                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['roles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iRoleId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iRoleId']==$_smarty_tpl->tpl_vars['data']->value['admin']['iRoleId']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['data']->value['roles'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</option>
                                        <?php endfor; endif; ?>
                                    </select>
                                </div>
                            </div>
                       <?php }?>
                       
                       
                       <div class="control-group" id="xmlUrlData"  style="display: none;">
                                <label class="control-label">Xml Url</label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vXmlUrl" name="Data[vXmlUrl]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vXmlUrl'];?>
" minlength="2" maxlength="50"/>

                                </div>
                            </div>                     
                            <!-- <div class="control-group">
                                <label class="control-label">Country</label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" tabindex="1" id="iCountryId" name="Data[iCountryId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iCountryId'];?>
">
                                            <option value="">---- Select Country ----</option>
                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['countries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['countries'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['countries'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId']==$_smarty_tpl->tpl_vars['data']->value['admin']['iCountryId']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['data']->value['countries'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
                                            <?php endfor; endif; ?>
                                    </select>
                                  </div>
                            </div>  -->      
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='State'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" tabindex="1" id="iStateId" name="Data[iStateId]">
                                            <option value="">---- Select State ----</option>
                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['states']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['states'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iStateId'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['states'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iStateId']==$_smarty_tpl->tpl_vars['data']->value['admin']['iStateId']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['data']->value['states'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vState'];?>
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
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='City'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vCity" name="Data[vCity]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vCity'];?>
" maxlength="50"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Status'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></label>
                                    <div class="controls" >
                                        <select class="input-large m-wrap" tabindex="1" name="Data[eStatus]">
                                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['eStatuses']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
" <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['admin']['eStatus']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
                                            <?php endfor; endif; ?>
                                        </select>
                                    </div>
                            </div> 
                            <!--	multiselect for package start	--> 
                            <label class="control-label">Select Package</label>
						   <div class="row">
							<div class="col-xs-3">
								<select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
									<!--<option value="1">Item 1</option>
									<option value="2">Item 5</option>
									<option value="2">Item 2</option>
									<option value="2">Item 4</option>
									<option value="3">Item 3</option>-->
                                 	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['industries']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['industries']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIndustryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['industries']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</option>
                                    <?php endfor; endif; ?>
								</select>
							</div>
	
							<div class="col-xs-2">
								<button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
								<button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
								<button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
								<button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
							</div>
	
							<div class="col-xs-3">
								<select name="Data[vPackages][]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['selectedindustries']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<option value="<?php echo $_smarty_tpl->tpl_vars['selectedindustries']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iIndustryId'];?>
"><?php echo $_smarty_tpl->tpl_vars['selectedindustries']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</option>
								<?php endfor; endif; ?>
								</select>
							</div>
						</div>
						<!--	multiselect for package end	--> 
                            <div class="form-actions">
                               <button type="submit" class="btn btn-success" id="btn-save">
                               <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                               <?php } ?></button>
                               <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                                 	<button type="button" class="btn" onclick="returnme()"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                     <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Cancel'){?>
                                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                     <?php }?>
                                  <?php } ?></button>
                               <?php }?>
                            </div>
                    </form>
                 </div>
            </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
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



<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
    <!--<div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
        <!--<div class="row-fluid">
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
             <!--   <h3 class="page-title">
            
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
           <!-- </div>-->
         <!-- END PAGE HEADER-->   
        <!--</div>-->
        <!-- BEGIN PAGE CONTENT-->
        <!--<div class="row-fluid">-->
              
    <!-- END PAGE CONTENT-->         
    <!--</div>-->
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
        $("#vEmail").val("");
        $("#vPassword").val("");
    });
    //code for multiselect
    jQuery(document).ready(function($) {
		$('#multiselect').multiselect();
	});
</script>

    <?php }} ?>