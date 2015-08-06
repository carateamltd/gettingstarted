<?php /* Smarty version Smarty-3.1.11, created on 2015-06-19 15:34:51
         compiled from "application/views/templates/newdesign_templates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1625237065583d42b3cc240-71608702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28443d1aa84e16912a8446e8cfda5347f0b954c8' => 
    array (
      0 => 'application/views/templates/newdesign_templates.tpl',
      1 => 1429280184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1625237065583d42b3cc240-71608702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5583d42b474ae8_63178842',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5583d42b474ae8_63178842')) {function content_5583d42b474ae8_63178842($_smarty_tpl) {?>
<div id="main-content">
 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">
       <div class="span12">
           <h3 class="page-title">
             Application
           </h3>
       </div>
    </div>
    <div class="row-fluid">

        <div class="span12">
         <!-- BEGIN EXAMPLE TABLE widget-->
         <div class="widget purple brdrnone">
             <div class="widget-body">
                 <div>
				    <div class="mainpartcont">

					<?php echo $_smarty_tpl->getSubTemplate ("tab.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					
					<div class="tbdata">
						<div class="progress" >
							<div class="bar" style="width: 60%;"></div>
						</div>
						<div class="box_darkblue">
						<table width="100%" border="0">
						  <tr>
						  <td>
							<p>
								<b>Choose a menu style</b>
							</p>
						  </td>
						  <td align="right" class="td_rightalign" >
						  	<input type="hidden" name="iApplicationId" id="iApplicationId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
">
							Filter menu styles: 
							<select name="select_rows" class="select_rows_al" >
								<option value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['param']==0){?>selected<?php }?>>All</option>
								<option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['param']==1){?>selected<?php }?>>Single Row</option>
								<option value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['param']==2){?>selected<?php }?>>Multi Row</option>
							</select
						  ></td>
						  <td width="40%" align="center">
							<a class="btn btn_upload_icon" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/step4/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
"> Go To Detail Settings</a>
						  </td>
						  </tr>
						</table>
					  </div>
  
						<!--<ul class="samples_screens">
						
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['single_newdesign_templates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<div class="theme_room">
								<div class="">
									<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/assign_temp/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
?tmpl=<?php echo $_smarty_tpl->tpl_vars['data']->value['single_newdesign_templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iTemplateId'];?>
" class="preview"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
newdesign_template/<?php echo $_smarty_tpl->tpl_vars['data']->value['single_newdesign_templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iTemplateId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['single_newdesign_templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" width="150px" /></a>
								</div>
								<div class="label"> Single Row <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index']+1;?>
 </div>
							</div>
						</li>
						<?php endfor; endif; ?>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value['multi_newdesign_templates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<div class="theme_room">
								<div class="">
									<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/assign_temp/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
?tmpl=<?php echo $_smarty_tpl->tpl_vars['data']->value['multi_newdesign_templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iTemplateId'];?>
" class="preview"><img  src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
newdesign_template/<?php echo $_smarty_tpl->tpl_vars['data']->value['multi_newdesign_templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iTemplateId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['multi_newdesign_templates'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vImage'];?>
" width="150px" /></a>
								</div>
								<div class="label"> Multi Row <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index']+1;?>
 </div>
							</div>
						</li>
						<?php endfor; endif; ?>
						</ul> -->
					</div>
				    <div style="clear:both;"></div>
                        <div class="pagination">
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['create_links'];?>

                </div>  
                 </div>
             </div>
		   <div style="clear:both;"></div>
         </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
    </div>

            <!-- END EDITABLE TABLE widget-->
    <!-- END PAGE CONTENT-->         
 </div>
 <!-- END PAGE CONTAINER-->
</div>

<!--modal -->
<div class="modal fade" id="select_template">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="color:white;">Confirmation</h4>
      </div>
      <div class="modal-body">
        <p >Are you sure you'd like to use the <b><span id="tmplname">Single Row 2 template</span></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" id="btnyes">Yes</button>
      </div>
    </div>
  </div>
</div>
<!--End-->
 


<script type="text/javascript" language="javascript">



</script>

<?php }} ?>