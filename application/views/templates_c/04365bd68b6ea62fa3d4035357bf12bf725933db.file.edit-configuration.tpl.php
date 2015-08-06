<?php /* Smarty version Smarty-3.1.11, created on 2015-06-27 21:26:54
         compiled from "application/views/templates/edit-configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:419469775558eb2ae674670-62721880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04365bd68b6ea62fa3d4035357bf12bf725933db' => 
    array (
      0 => 'application/views/templates/edit-configuration.tpl',
      1 => 1416051129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '419469775558eb2ae674670-62721880',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
    'db_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_558eb2ae735207_89663713',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558eb2ae735207_89663713')) {function content_558eb2ae735207_89663713($_smarty_tpl) {?>  <div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-gear"></i></a> <span class="separator"></span></li>
            <li>Edit Configuration </li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="icon-gear"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	 <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit Configuration'){?>
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
                		<div class="widget purple">
                 
                    <h4 class="widgettitle">
                    <i class="icon-reorder"></i>
                       <!-- Change by Mayur Gajjar Date: 30/7/'14 (multilanguage) -->
                       <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit Configuration'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?>
                     </h4>
					<span class="tools">
                        <a href="javascript:;" class=""></a>
                        <a href="javascript:;" class=""></a>
                    </span>
              
                <div class="widget-body">
                   
                        <div class="clearfix">
                            <div class="btn-group" style="display:none;">						  
                                <button id="editable-sample_new" class="btn green">
                                    Add New <i class="icon-plus"></i>
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
                    <div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>
</div>
                <?php }?>
                <!--
                    create :- maksudkhan
                    Date:-26-05-2014
                    Validation Check
                -->
                <div id="conf_validation" style="display:none;"></div>
                    <form class="form-horizontal border-pad" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
configuration/update" method="post">
                    <input type="hidden" name="data[iSettingId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['configurations']['iSettingId'];?>
">  
                        <input type="hidden" name="iAdminId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['admin']['iAdminId'];?>
">  
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['db_config']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                            <div class="control-group">
                                <label class="control-label" style="cursor:default;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></label>
                                <div class="controls">
                                    <?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName=='TRANSACTION_MODE'){?>
                                        <input type="radio" placeholder="" class="input-large" id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" value="Yes" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
" <?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue=='Yes'){?>checked<?php }?>/> Live
                                        <input type="radio" placeholder="" class="input-large" id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" value="No" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
" <?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue=='No'){?>checked<?php }?>/> Testing
                                    <?php }else{ ?>
                                        <?php if ($_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName=='APP_PRICE'){?>
                                           GBP <input type="text" placeholder="" class="input-larges" id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
                                        <?php }else{ ?>
                                            <input type="text" placeholder="" class="input-large" id="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
" name="Data[<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vName;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->vValue;?>
" title="<?php echo $_smarty_tpl->tpl_vars['db_config']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->tDescription;?>
"/>
                                        <?php }?>
                                    <?php }?>
                                </div>
                            </div>
                           <?php endfor; endif; ?>
                            <div class="form-actions">
                                 <button type="submit" class="btn btn-success" id="btn-save" onclick="return conf_save();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></button>
                            </div>
                    </form>
                 </div>
            </div>
           			</div>
                </div>
                <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>
                    </div>
                </div>
            </div>
        </div>
   </div>     
        
        <!-- Code Commented By Alpesh Prajapati --->
<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
    <!--<div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
        <!--<div class="row-fluid">-->
            <!--<div class="span12">
                <h3 class="page-title">
                	<!-- Change by Mayur Gajjar Date: 30/7/'14 (multilanguage) -->
			   <!--     <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit Configuration'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                    <?php } ?>-->
               <!-- </h3>
            </div>-->
         <!-- END PAGE HEADER-->   
       <!-- </div>-->
        <!-- BEGIN PAGE CONTENT-->
<!--        <div class="row-fluid">
            <div class="span12">-->
             	<!-- BEGIN EXAMPLE TABLE widget-->
                
         <!-- END EXAMPLE TABLE widget-->
      <!--  </div> --> 
    <!-- END PAGE CONTENT-->         
<!--    </div>
</div>-->
<!-- END PAGE CONTAINER-->
<!--</div>  --><?php }} ?>