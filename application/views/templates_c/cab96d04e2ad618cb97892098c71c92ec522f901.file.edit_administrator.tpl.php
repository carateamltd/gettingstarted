<?php /* Smarty version Smarty-3.1.11, created on 2015-08-06 21:20:43
         compiled from "application/views/templates/edit_administrator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94188178455855a80d56220-15615031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cab96d04e2ad618cb97892098c71c92ec522f901' => 
    array (
      0 => 'application/views/templates/edit_administrator.tpl',
      1 => 1438864761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94188178455855a80d56220-15615031',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55855a8110e814_92118288',
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'operation' => 0,
    'eStatuses' => 0,
    'indx' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55855a8110e814_92118288')) {function content_55855a8110e814_92118288($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
administrator.js"></script>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="#"><i class="icon-user"></i></a> <span class="separator"></span></li>
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
    <div class="pageicon"><span class="icon-user"></span></div>
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
            <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
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
<div class="widget purple">

<h4 class="widgettitle"><i class="icon-reorder"></i>
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
                <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit Client'){?>
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
<!--BEGIN TABS-->
<div class="tabbable custom-tab">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1_1" data-toggle="tab"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Info'){?>
                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                <?php }?>
            <?php } ?> </a></li>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='2'){?>
        <!--<li><a href="#tab_1_2" data-toggle="tab">Fee Type</a></li>-->
        <li><a href="#tab_1_3" data-toggle="tab">Paypal Info</a></li>
    <?php }?>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="tab_1_1">
    <form class="form-horizontal border-pad" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/<?php echo $_smarty_tpl->tpl_vars['data']->value['mode'];?>
" method="post">
        <input type="hidden" name="Data[iAdminId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iAdminId'];?>
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
                <input type="text" placeholder="" class="input-large" id="vFirstName" name="Data[vFirstName]"
                       value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vFirstName'];?>
"/>
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
                <input type="text" placeholder="" class="input-large" id="vLastName" name="Data[vLastName]"
                       value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vLastName'];?>
"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Email'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?> <span style="color:#ff0000;">*</span></label>

            <div class="controls">
                <input type="text" disabled="disabled" placeholder="" class="input-large" id="vEmail"
                       name="Data[vEmail]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vEmail'];?>
"/>
            </div>
        </div>
        <input type="hidden" placeholder="" class="input-large" id="vPassword" name="Data[vPassword]"
                          value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vPassword'];?>
" />
        
            
                    
                        
                    
                

            
                
                    
                           
                
                    
                           
                
            
        
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
                <input maxlength="16" type="text" placeholder="" class="input-large" id="vPhone" name="Data[vPhone]"
                       value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vPhone'];?>
"/>
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
                <input type="text" placeholder="" class="input-large" id="vAddress" name="Data[vAddress]"
                       value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vAddress'];?>
" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Zip'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?></label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vZipCode" name="Data[vZipCode]"
                       value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vZipCode'];?>
" maxlength="8"/>
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
                    <select <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iAdminId']==$_smarty_tpl->tpl_vars['data']->value['admin']['iAdminId']){?> disabled<?php }?>
                            class="input-large m-wrap" tabindex="1" name="Data[iRoleId]" id="iRoleId"
                            onchange="return showhidexmlurl(this.value);" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iRoleId'];?>
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


        <!--<div class="control-group" id="xmlUrlData" style="display: none;">
            <label class="control-label">Xml Url</label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vXmlUrl" name="Data[vXmlUrl]"
                       value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vXmlUrl'];?>
"/>
            </div>
        </div> -->
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
                <!--<select class="input-large m-wrap" tabindex="1" id="iStateId" name="Data[iStateId]"
                        value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iStateId'];?>
">
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
                </select>-->
		          <input type="text" name="Data[iStateId]" id="iStateId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iStateId'];?>
" />
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
                <input type="text" placeholder="" class="input-large" id="vCity" name="Data[vCity]"
                       value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vCity'];?>
"/>
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

            <div class="controls">
                <select <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iAdminId']==$_smarty_tpl->tpl_vars['data']->value['admin']['iAdminId']){?> disabled<?php }?>
                        class="input-large m-wrap" tabindex="1" name="Data[eStatus]">
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
"
                                <?php if ($_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]==$_smarty_tpl->tpl_vars['data']->value['admin']['eStatus']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['eStatuses']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
                    <?php endfor; endif; ?>
                </select>
            </div>
        </div>


        <!-- change by mayur gajjar -->
        <div class="control-group">
            <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Primary Language'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?></label>

            <div class="controls">
                <select class="input-large m-wrap" tabindex="1" name="Data[eLanguage]">
                    <option value="rEnglish" <?php if ($_smarty_tpl->tpl_vars['data']->value['admin']['eLanguage']=='rEnglish'){?>selected="selected"<?php }?>><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='English'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?>
                    </option>
                    <option value="rFrench" <?php if ($_smarty_tpl->tpl_vars['data']->value['admin']['eLanguage']=='rFrench'){?>selected="selected"<?php }?>><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='French'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?>
                    </option>
                </select>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Currency'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?></label>
            <div class="controls">
                <select class="input-large m-wrap" tabindex="1" id="vCurrency" name="Data[vCurrency]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['vCurrency'];?>
">
                    <option value=""><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Currency'){?>
                        <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                    <?php }?>
                <?php } ?></option>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['currencies']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['currencies'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['currency_code'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['currencies'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['currency_code']==$_smarty_tpl->tpl_vars['data']->value['admin']['vCurrency']){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['data']->value['currencies'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['currency_name'];?>
 ( <?php echo $_smarty_tpl->tpl_vars['data']->value['currencies'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['currency_code'];?>
 )</option>
                    <?php endfor; endif; ?>
                </select>
            </div>
        </div>


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
<?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='2'){?>
    <div class="tab-pane" id="tab_1_2">
        <a href="#" id="AddMoreFileBox" class="btn btn-info">Add More Field <i class="icon-plus"></i></a>

        <div class="space15"></div>
        <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/save_fee_onfo" method="post"
              id="fee_info_admin">
            <input type="hidden" name="iClientId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iAdminId'];?>
">

            <div class="control-group" id="InputsWrapper">
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['fee_info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <?php $_smarty_tpl->tpl_vars['indx'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']+1, null, 0);?>
                    <div style=" margin: 0 0 5px;">
                        <input type="text" name="data[<?php echo $_smarty_tpl->tpl_vars['indx']->value;?>
][vFeetype]" id="name_<?php echo $_smarty_tpl->tpl_vars['indx']->value;?>
"
                               value="<?php echo $_smarty_tpl->tpl_vars['data']->value['fee_info'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFeetype'];?>
" placeholder="Name">
                        <input type="text" name="data[<?php echo $_smarty_tpl->tpl_vars['indx']->value;?>
][fPrice]" id="price_<?php echo $_smarty_tpl->tpl_vars['indx']->value;?>
"
                               value="<?php echo $_smarty_tpl->tpl_vars['data']->value['fee_info'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fPrice'];?>
" placeholder="Price">
                        <a href="#" class="removeclass"><i class="icon-remove"></i></a>
                    </div>
                <?php endfor; endif; ?>
                <div style=" margin: 0 0 5px;">
                    <?php if (sizeof($_smarty_tpl->tpl_vars['data']->value['fee_info'])==0){?>
                        <input type="text" name="data[0][vFeetype]" id="name_0" value="" placeholder="Name">
                        <input type="text" name="data[0][fPrice]" id="price_0" value="" placeholder="Price">
                    <?php }?>

                    <!--a href="#" class="removeclass"><i class="icon-remove"></i></a-->
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success" id="btn-save-fee">Save</button>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                    <button type="button" class="btn" onclick="returnme()">Cancel</button>
                <?php }?>
            </div>
        </form>
    </div>
    <div class="tab-pane" id="tab_1_3">
        <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/save_paypal_onfo" method="post"
              id="paypal_info_admin">
            <input type="hidden" name="iPaypalinfoId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['paypal_info']['iPaypalinfoId'];?>
">
            <input type="hidden" name="Data[iClientId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iAdminId'];?>
">

            <div class="control-group" style="display:none;">
                <label class="control-label">Username</label>

                <div class="controls">
                    <!--<input type="text" placeholder="Paypal Username" class="input-large" id="vPusername"
                           name="Data[vUsername]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['paypal_info']['vUsername'];?>
"/>-->
                    <input type="text" placeholder="Paypal Username" class="input-large" id="vPusername"
                           name="Data[vUsername]" value="-"/>
                </div>
            </div>
            <div class="control-group" style="display:none;">
                <label class="control-label">Paypal Password</label>

                <div class="controls">
                    <!--<input type="text" placeholder="Paypal Password" class="input-large" id="vPpassword"
                           name="Data[vPassword]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['paypal_info']['vPassword'];?>
"/>-->
                    <input type="text" placeholder="Paypal Password" class="input-large" id="vPpassword"
                           name="Data[vPassword]" value="-"/>
                </div>
            </div>
            <div class="control-group">
                <!--<label class="control-label">Paypal Signature</label>-->
                <label class="control-label">Paypal App Client ID (LIVE)</label>

                <div class="controls">
                    <input type="text" placeholder="Paypal Signature" class="input-large" id="vPsignature"
                           name="Data[vSignature]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['paypal_info']['vSignature'];?>
" style="width: 450px;" />
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-success" id="btn-paypal_save">
                    Save
                </button>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                    <button type="button" class="btn" onclick="returnme()">Cancel</button>
                <?php }?>
            </div>

            <!--                                     <div class="control-group">
                                                <label class="control-label">Payment Method</label>
                                                    <div class="controls" >
                                                        <select class="input-large m-wrap" tabindex="1" name="Data[eMethod]">
                                                            <option value="visa">Visa</option>
                                                            <option value="master">Master Card</option>
                                                            <option value="paypal">Paypal</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Name of card</label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Name of card" class="input-large" id="vCity" name="Data[vCardname]" value=""/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Card Number</label>
                                                <div class="controls">
                                                    <input type="text" placeholder="" class="input-large" id="vCity" name="Data[vCardnumber]" value=""/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Expiry</label>
                                                <div class="controls" >
                                                    <select class="input-large m-wrap" tabindex="1" name="Data[vMonth]">
                                                        <option value="">Month</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                    </select>
                                                    /
                                                    <select class="input-large m-wrap" tabindex="1" name="Data[vYear]">
                                                        <option value="">Year</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Security Code</label>
                                                <div class="controls">
                                                    <input type="text" placeholder="" class="input-large" id="vCode" name="Data[vCode]" value="" maxlength="4"/>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                 <button type="button" class="btn btn-success" id="btn-save">
                                                  Save</button>
                                                <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
                                                    <button type="button" class="btn" onclick="returnme()">Cancel</button>
                                                <?php }?>
                                            </div>
         -->                                 </form>
    </div>
<?php }?>
</div>
</div>
<!--END TABS-->

</div>
</div>
<!-- END EXAMPLE TABLE widget-->
</div>
<!-- END PAGE CONTENT-->
</div>
<div class="footer">
    <div class="footer-left">
        <span>&copy; Carateam Ltd 2014</span>
    </div>
    <!--<div class="footer-right">
        <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>
    </div> -->
</div>
</div>
</div>
</div>


<!-- Code Comment By Alpesh Prajapati -->

<!--<div id="main-content">-->
<!-- BEGIN PAGE CONTAINER-->
<!--    <div class="container-fluid">-->
<!-- BEGIN PAGE HEADER-->
<!--        <div class="row-fluid">
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
                 <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
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
                </h3>-->
<!-- END PAGE TITLE & BREADCRUMB -->
<!--   </div>-->
<!-- END PAGE HEADER-->
<!--  </div>-->
<!-- BEGIN PAGE CONTENT-->

<!-- END PAGE CONTAINER-->
<!--</div>-->


<script>
    $(window).load(function () {
        var user_mode = '<?php echo $_smarty_tpl->tpl_vars['data']->value['mode'];?>
';
        var user_role = '<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iRoleId'];?>
';
        if (user_role == '2' && user_mode == 'update') {
            $("#xmlUrlData").show();
        } else {
            $("#xmlUrlData").hide();
        }

    });
    $(document).ready(function () {

        var MaxInputs = 8; //maximum input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileBox"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = '<?php echo sizeof($_smarty_tpl->tpl_vars['data']->value['fee_info']);?>
'; //to keep track of text box added

        $(AddButton).click(function (e)  //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                //add input box
                $(InputsWrapper).append('<div style=" margin: 0 0 5px;"><input type="text" name="data[' + FieldCount + '][vFeetype]" id="name_' + FieldCount + '" value="" placeholder="Name"/> <input type="text" name="data[' + FieldCount + '][fPrice]" id="price_' + FieldCount + '" value="" placeholder="Price"/> <a href="#" class="removeclass"><i class="icon-remove"></i></a>');
                x++; //text box increment
            }
            return false;
        });

        $("body").on("click", ".removeclass", function (e) { //user click on remove text
            //console.log('in'+x);
            //  if( x > 1 ) {
            $(this).parent('div').remove(); //remove text box
            // x--; //decrement textbox
            // }
            return false;
        })

    });
</script>


<?php }} ?>