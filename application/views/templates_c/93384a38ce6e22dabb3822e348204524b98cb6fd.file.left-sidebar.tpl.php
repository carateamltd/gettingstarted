<?php /* Smarty version Smarty-3.1.11, created on 2015-09-22 21:16:26
         compiled from "application/views/templates/left-sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5548081445582a05c19bc33-10989021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93384a38ce6e22dabb3822e348204524b98cb6fd' => 
    array (
      0 => 'application/views/templates/left-sidebar.tpl',
      1 => 1442931368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5548081445582a05c19bc33-10989021',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5582a05c30b189_33117425',
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582a05c30b189_33117425')) {function content_5582a05c30b189_33117425($_smarty_tpl) {?><!-- BEGIN SIDEBAR -->
<div class="leftpanel">
	<div class="leftmenu"> 
    	<ul class="nav nav-tabs nav-stacked">
        	<li class="nav-header">Navigation</li>
        	<?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']!='1'){?>
            <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'home')!==false){?>active<?php }?>">
              <a class="" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">
                  <i class="icon-dashboard"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Dashboard'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'administrator')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator" class="">
                  <i class="icon-user"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
                  <!--<span class="arrow"></span>-->
              </a>
          </li>
          <!-- 
<li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-app')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application Design'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'configuration')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
configuration" class="">
                  <i class="icon-gear"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Configuration'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'cms')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
cms" class="">
                  <i class="icon-wrench"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='CMS'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-notification')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
notification" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Push Notification'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
                  <!~~<span class="arrow"></span>~~>
              </a>
          </li>
 -->
          <?php }else{ ?>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-app')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application Design'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-notification')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
notification" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Push Notification'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
                  <!--<span class="arrow"></span>-->
              </a>
          </li>
          <!--<li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-resturantinfo')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/update/" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Basic Info'){?>
                           <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
                  
              </a>
          </li> -->
        <?php }?>
        </ul>
    </div>
</div>



<!--<div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">-->
    
     <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
<!--     <div class="navbar-inverse">
        <form class="navbar-search visible-phone">
           <input type="text" class="search-query" placeholder="Search" />
        </form>
     </div>-->
     <!-- END RESPONSIVE QUICK SEARCH FORM -->
     <!-- BEGIN SIDEBAR MENU -->
<!--      <ul class="sidebar-menu">
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'home')!==false){?>active<?php }?>">
              <a class="" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">
                  <i class="icon-dashboard"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Dashboard'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'administrator')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Administrator'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>-->
                  <!--<span class="arrow"></span>-->
            <!--  </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-app')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application Design'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'configuration')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
configuration" class="">
                  <i class="icon-wrench"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Configuration'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'cms')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
cms" class="">
                  <i class="icon-wrench"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='CMS'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <?php }else{ ?>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-app')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application Design'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>
              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-notification')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
notification" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Push Notification'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>-->
                  <!--<span class="arrow"></span>-->
<!--              </a>
          </li>
          <li class="sub-menu <?php if (strpos($_smarty_tpl->tpl_vars['data']->value['tpl_name'],'-resturantinfo')!==false){?>active<?php }?>">
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
resturantinfo" class="">
                  <i class="icon-book"></i>
                  <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Basic Info'){?>
                           <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                       <?php } ?></span>-->
                  <!--<span class="arrow"></span>-->
     <!--         </a>
          </li>
        <?php }?>
       
      </ul>-->
     <!-- END SIDEBAR MENU -->
<!--    </div>
</div>-->
<!-- END SIDEBAR -->
<?php }} ?>