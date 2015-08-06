<?php /* Smarty version Smarty-3.1.11, created on 2015-07-30 14:23:19
         compiled from "application/views/templates/view-app.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6158354265582a09be9ccd1-88817256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59a1c7f52d11a86e27ff0f834665cd4f8d45fad0' => 
    array (
      0 => 'application/views/templates/view-app.tpl',
      1 => 1436444837,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6158354265582a09be9ccd1-88817256',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5582a09c1e41b1_26049732',
  'variables' => 
  array (
    'lang' => 0,
    'val' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582a09c1e41b1_26049732')) {function content_5582a09c1e41b1_26049732($_smarty_tpl) {?>  <div class="rightpanel">
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
                     <!--Dashboard-->
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
                     <!--Dashboard-->
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
                     <!--Dashboard-->
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
                 <!--
                        	Change by : Mayur Gajjar
                            Date : 30/7/2014
                            change : multilanguage
              -->
           <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
           	 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application'){?>
             	<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

             <?php }?>
           	 <!--Dashboard-->
           <?php } ?> </h4>
                <span class="tools">
                    <a href="javascript:;" class=""></a>
                    <a href="javascript:;" class=""></a>
                </span>

             <div class="widget-body">
                 <div>
                     <div class="clearfix">
                        <br>
                         <div class="btn-group">
                             <a href="#myModal" class="btn btn-primary" id="add_app" role="button" data-toggle="modal">
                             <!--
                                    Change by : Mayur Gajjar
                                    Date : 30/7/2014
                                    change : multilanguage
              				-->
                             <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Add New'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             <?php } ?>  <i class="icon-plus"></i>
                             </a>
                         </div>
                         <div class="btn-group pull-right" style="display:none;">
                             <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                             </button>
                             <ul class="dropdown-menu pull-right">
                                 <li><a href="#">Print</a></li>
                                 <li><a href="#">Save as PDF</a></li>
                                 <li><a href="#">Export to Excel</a></li>
                             </ul>
                         </div>
                      </div>
                         <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
                            <div class="alert alert-info offset4 span3">
                              <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

                            </div>
                         <?php }?>
                      <div class="space15">
                         <div class="span6">
                            <div class="span6 ">
                                <?php if (count($_smarty_tpl->tpl_vars['data']->value['role'])>0){?>
                                <p class="text-paging"><?php echo $_smarty_tpl->tpl_vars['data']->value['paging_message'];?>
</p>
                                <?php }?>
                            </div>
                        </div></div>
                        <!--
                                    Change by : Mayur Gajjar
                                    Date : 30/7/2014
                                    change : multilanguage
              			-->
                        <table class="table table-striped table-hover table-bordered" id="editable-sample"> 
                        <thead>
                        <tr>
                            <th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Name'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             	<?php } ?>
                             </th>
                            <th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Code'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             	<?php } ?>
                            </th>
                            <th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Client Name'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             	<?php } ?>
                            </th>
                            <!--<th><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App IconName'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             	<?php } ?>
                            </th> -->
                            <th style="text-align:center;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Status'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             	<?php } ?></th>
                            <th style="text-align:center;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             	<?php } ?></th>
                            <th style="text-align:center;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                             	<?php } ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']){?>
                        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['appinformation']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <tr class="">
                            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tAppName'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vApplicationCode'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</td>
                            <!-- <td><?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tAppIconName'];?>
</td> -->
                            <td style="text-align:center"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus']){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                                <?php } ?></td>
                            <td style="text-align:center !important;">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/step2/<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iApplicationId'];?>
" data-toggle="modal">
                                <i title="Edit" class="icon-pencil helper-font-24"></i></a>
                            </td>
                            <td style="text-align:center !important;"><a href="" onclick="delete_app('<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iApplicationId'];?>
');" data-toggle="modal">
                                <i title="Delete" class="icon-trash helper-font-24"></i></a>
                            </td>

                            <!-- Made Changes by : Sagar 19-5-2014 -->

                            <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Confirm Delete'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                                <?php } ?></h3>
                                  </div>
                                  <div class="modal-body">
                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Are you sure'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                                <?php } ?>?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                                <?php } ?></button>
                                    <a href="" id="mylink"><button type="button" class="btn btn-primary"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Delete'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                                <?php } ?></button></a>
                                  </div>
                                </div>
                              </div>
                            </div>

                           <!-- End -->
                        
                        </tr>
                        <?php endfor; endif; ?>
                        <?php }else{ ?>
                        <tr class="row1a"><td colspan="7" style="text-align:center;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                                 <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='No application found'){?>
                                    <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                                 <?php }?>
                              <?php } ?></td></tr>
                        <?php }?>
                        </tbody>
                        </table>
                        
                        <div class="pagination">
                           <?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

                        </div>  
                 </div>
             </div>
         </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
    </div>
    <br /><br /><br /><br /><br /><br /><br />
    <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                       <!-- <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="myModalLabel">
     <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Pick Your'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
    </h3>
  </div>
  <br>
<div id="err"></div>
<form name="save_app_feature" id="save_app_feature" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/save_app_feature" method="POST">
  <div class="modal-body">
   <div class="toptab">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <input type="hidden" name="language" id="language" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mylang'];?>
" />
  <tr>
    <th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Industry'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></strong> &nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select industry'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a></th>
    <th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Enter app name'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></strong> &nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Enter app name'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a></th>
    <!--<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Enter app icon name'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></strong> &nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Enter app icon name'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a></th>-->
    <!--<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select App Contact Email'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></strong>&nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Enter ContactEmail'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a></th>-->
	
	

  </tr>
  <tr>
    <td valign="top">  
      <select class="indst" id="industry" name="appinformation[iIndustryId]">
        <option value=""><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select App Industry'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></option>
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
">
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['data']->value['appindustry'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']==$_tmp1){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
          </option>
        <?php endfor; endif; ?>
      </select>
    </td>
    <td><input class="indst" type="text"  maxlength="30" value="" size="30" id="app_name" name="appinformation[tAppName]"></td>
    <!--<td valign="top">
      <input class="indst" type="text"  maxlength="55" value="" size="30" id="contact_email" name="appinformation[vContactEmail]">
    </td>-->
    <!--<td><input class="indst" type="text" maxlength="20" value="" size="30" id="app_icon" name="appinformation[tAppIconName]"></td> -->
  </tr>
  
  <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']==1){?>
     <tr>
      <th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select App Client'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></strong>&nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select client'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a></th>
       <!--<th align="left"><strong><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select App Contact Email'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></strong>&nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif" /><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select Client'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></span></a></th>-->
     </tr>
     <tr>
      <td valign="top">
            <select class="indst" id="app_client" name="appinformation[iClientId]">
                 <option value=""><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Select Client'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></option>
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['allClientList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                      <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['allClientList'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iAdminId'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['allClientList'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vFirstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['allClientList'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLastName'];?>
</option>
                 <?php endfor; endif; ?>
            </select>
    </td>
   <!-- <td><input class="indst" type="text"  maxlength="55" value="" size="30" id="contact_email" name="appinformation[vContactEmail]"></td> -->
     </tr>
    <?php }else{ ?>
    <input type="hidden" name="appinformation[iClientId]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['iAdminId'];?>
"> 
  <?php }?>   
   
</table>

    </div>
    
    <div class="midparttp">
        <div class="midleft">
      <fieldset>
        <legend><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Recommended'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:<?php }?><?php } ?></legend>
        <div class="innerlft" id="inlft">
        </div>
       </fieldset>
    </div>
    <!--<div class="midright">
      <fieldset>
        <legend><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Optional'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
:<?php }?><?php } ?></legend>
        <div class="innercont">

        </div> 
       </fieldset>
    </div> -->
    </div>
  </div>
</form>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary" id="save_feature">
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save Feature & Continue'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
    <button class="btn" data-dismiss="modal" aria-hidden="true"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Close'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
  </div>
</div>
  </div>    
        

<!--<div id="main-content">-->
 <!-- BEGIN PAGE CONTAINER-->
 <!--<div class="container-fluid">-->
    <!-- BEGIN PAGE HEADER-->   
 <!--   <div class="row-fluid">
       <div class="span12">-->
           <!-- BEGIN THEME CUSTOMIZER-->
           <!--div id="theme-change" class="hidden-phone">
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
           </div-->
          <!-- END THEME CUSTOMIZER-->
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
       <!--    <h3 class="page-title">-->
             <!--
                        	Change by : Mayur Gajjar
                            Date : 30/7/2014
                            change : multilanguage
              -->
           
        <!--   </h3>-->
           <!--ul class="breadcrumb">
               <li>
                   <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">Dashboard</a>
                   <span class="divider">/</span>
               </li>
               <li class="active">
                   Application
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
     <!--  </div>
    </div>-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    
    

            <!-- END EDITABLE TABLE widget-->
    <!-- END PAGE CONTENT-->         
<!-- </div>-->
 <!-- END PAGE CONTAINER-->
<!--</div>-->


<!-- Modal -->


<script>
    $(window).load(function() {  
      var user_warning='<?php echo $_smarty_tpl->tpl_vars['data']->value['warning'];?>
';
       if(user_warning == '1')
       {
            $("#deleteMessage").html( "<p>You do not have sufficient privileges to access this page.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
       if(user_warning == 'delete')
       {
            $("#deleteMessage").html( "<p>The record which you are trying to access has been already deleted.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
    });
</script>

<?php }} ?>