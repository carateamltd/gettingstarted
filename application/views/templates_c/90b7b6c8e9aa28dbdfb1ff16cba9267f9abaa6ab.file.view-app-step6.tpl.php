<?php /* Smarty version Smarty-3.1.11, created on 2015-07-09 19:06:10
         compiled from "application\views\templates\view-app-step6.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22516559e63b2bc7dc5-30997277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90b7b6c8e9aa28dbdfb1ff16cba9267f9abaa6ab' => 
    array (
      0 => 'application\\views\\templates\\view-app-step6.tpl',
      1 => 1432623714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22516559e63b2bc7dc5-30997277',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
    'vCurrency' => 0,
    'mylang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_559e63b373bce0_66535308',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559e63b373bce0_66535308')) {function content_559e63b373bce0_66535308($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.form.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("set_default_background_image_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
    <li><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></li>
</ul>
<div class="pageheader">
    <div class="pageicon"><span class="icon-book"></span></div>
    <div class="pagetitle">
        <h5><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='All Features Summary'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h5>

        <h1>
            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Application'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
        </h1>
    </div>
</div>
<div class="maincontent">
<div class="maincontentinner">
<div class="row-fluid">

<div class="span12">
<!-- BEGIN EXAMPLE TABLE widget-->
<div class="widget purple brdrnone">
<div class="widget-body">
<div>

<div class="mainpartcont">
<?php echo $_smarty_tpl->getSubTemplate ("tab.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="tbdata">
<div class="progress progress-striped active">
    <div class="bar" style="width:100%;"></div>
</div>
<div style="margin-left: 23px; width: 96%;display: none;" id="msg">
    <div class="alert alert-error">
        <button data-dismiss="alert" class="close" type="button">�</button>
    </div>
</div>
<div class="div_inner">

<?php if ($_smarty_tpl->tpl_vars['data']->value['paymentmessage']!=''){?>
    <div class="alert alert-info">
        <?php echo $_smarty_tpl->tpl_vars['data']->value['paymentmessage'];?>

    </div>
<?php }?>


<div id="msg1"></div>
<div class="top_bord">
    <h1><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Icon'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h1>
</div>
<form name="app_data" id="upate_appdata" method="post"  enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/uploadAppicon">
<input type="hidden" class="text_box_bg"  name="app_image" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vImage'];?>
" />
<input type="hidden" class="text_box_bg"  name="ApplicationId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
" />
<input type="hidden" class="text_box_bg"  name="language" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mylang'];?>
" />
    <div class="app_icon_new">
        <div class="name1" style="cursor:default;"> <h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Choose Icon'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h4>
            <div class="inner_box_file"><input type="file"  name="icon" id="icon" accept="image/png" class="file_beauty" >
            <p class="label1">PNG: 1024 x 1024</p>
            <div class="upload_app_btn "> <button type="button " class="btn upload_app_btn btn-primary" onclick="return checkvalidation();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Upload App Icon"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button></div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['vImage']!=''){?>
            <div class="radio_right btnicon">
            <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
app_icon/<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vImage'];?>
" width="75" height="75" />
            <button type="button " class="btn upload_app_btn delbtn" onclick="return deleteAppIcon('<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
','<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vImage'];?>
');"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Delete"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button>
            <?php }?>
            </div>
        </div>
    </div>
</form>

 <div class="top_bord">
    <h1><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Information'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h1>
</div>
<?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
    <div class="alert alert-info">
        <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

    </div>
<?php }?>
   
<form name="app_data" id="upate_appdata" method="post" enctype="multipart/form-data"
      action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
app/updateAppData">
    <input type="hidden" class="text_box_bg" name="iApplicationId" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iApplicationId'];?>
"/>

    <div id="msg"></div>

    <div class="midd_box_inner">
        <div class="name1"><label class="lable" style="cursor:default;">
                <h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Name'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></a>
                    <!--<a class="tooltip_text" href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
quaton_icon.png"
                                                                            align="absmiddle"/> <span><img
                                    class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif"/> Enter your App Name. This is the title that shows up in the App Store and App Marketplace.(30 characters or less)</span></a> -->
                <span style="color:#ff0000;">*</span></h4></label>
            <input type="text" class="text_box_bg" id="tAppName" name="data[tAppName]"
                   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['tAppName'];?>
"/>
        </div>

        <div class="name1"><label class="lable" style="cursor:default;">
                <h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Keywords'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> <!--<a
                            class="tooltip_text" href="javascript:void(0);"><img
                                src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/images/icon-help.png" width="16" height="16"/> <span><img
                                    class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif"/> Enter keywords that describe your specific app.  Each keyword must be separated with a comma.  Avoid generic terms like 'music', charcter limit is 100.  These will be used for your iTunes App Store listing.</span></a> -->
                <span style="color:#ff0000;">*</span></h4></label>
            <input type="text" class="text_box_bg" id="tAppKeywords" name="data[tAppKeywords]"
                   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['tAppKeywords'];?>
"/>
        </div>

        <div class="description_left"><label class="lable" style="cursor:default;">
                <h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Description'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
                    <!--<a
                            class="tooltip_text" href="javascript:void(0);"><img
                                src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/images/icon-help.png" width="16" height="16"/> <span><img
                                    class="callout_text" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
callout.gif"/> This description will appear in the iTunes App Store/Google Play Store and must meet high standards. <br> Plain text only, no HTML.</span></a> -->
                </h4></label>
            <textarea class="text_aera_style" id="tDescription"
                      name="data[tDescription]"><?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['tDescription'];?>
</textarea>
        </div>

        <div class="dts_btn">
            <lable class="btn btn-success"
                   id="character-count"><?php if (count($_smarty_tpl->tpl_vars['data']->value['appinformation']['tDescription'])>0){?><?php echo strlen($_smarty_tpl->tpl_vars['data']->value['appinformation']['tDescription']);?>
 <?php }else{ ?>'0'<?php }?></lable>
            <lable id="content-msg"><?php if (strlen($_smarty_tpl->tpl_vars['data']->value['appinformation']['tDescription'])>249){?>Good. You have now enough content.<?php }else{ ?><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Insufficient content'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?><?php }?></lable>
        </div>

        <div class="name1">
            <label class="lable" style="cursor:default;">
                <h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Official Website'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
                </h4></label>
            <input type="text" class="text_box_bg" id="vWebsite" name="data[vWebsite]"
                   value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vWebsite'];?>
"/>
        </div>

        <div class="name1">
            <label class="lable" style="cursor:default;">
                <h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='App Price'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> 
                <span style="color:#ff0000;">*</span></h4></label>
            <input type="text" class="text_box_bg" id="fPrice" name="data[fPrice]"
                   value="<?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['fPrice']!=''){?><?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['fPrice'];?>
<?php }else{ ?><?php }?>"
                   onkeypress="return isNumberKey(event);"/>&nbsp<?php echo $_smarty_tpl->tpl_vars['vCurrency']->value;?>

        </div>
    </div>
<!-- -->
  <div class="top_bord">
    <h1><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Apple's Information"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h1>
    </div>
    <div class="midd_box_inner">
        <div class="name1">
            <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAppleUsername']==''){?>
                        <label><input style="margin: 4px;" type="radio" name="apple" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > I have an Apple developer account.
                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAppleUsername']!=''){?>
                        <label><input style="margin: 4px;" checked="checked" type="radio" name="apple" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > I have an Apple developer account.
                    <?php }?>
            <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAppleUsername']==''){?>
                        <label><input style="margin: 4px;" type="radio" name="apple" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > J’ai un compte Développeur Apple.
                    <?php }elseif($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAppleUsername']!=''){?>
                        <label><input style="margin: 4px;" type="radio" name="apple" checked="checked" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > J’ai un compte Développeur Apple.
                    <?php }?>
            <?php }?>
        </div>

        <div class="name1">
            <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>    
            <label><input style="margin: 4px;" type="radio" name="apple" value="0" onClick="show_div('apple_new_user','apple_user_cred')" >I don't have an Apple developer account and I want to create one.</label>
            <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
            <label><input style="margin: 4px;" type="radio" name="apple" value="0" onClick="show_div('apple_new_user','apple_user_cred')" >Je n’ai pas un compte Développeur Apple.</label>
            <?php }?>
        </div>

        <div class="name1" style="width:60%;">
            <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
            <label><input type="radio" style="margin: 4px;" name="apple" value="2" onclick="return show_none('apple_new_user','apple_user_cred')" >
                I let you publish my application under your Apple developer account.
            </label>
            <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
            <label><input type="radio" style="margin: 4px;" name="apple" value="2" onclick="return show_none('apple_new_user','apple_user_cred')" >
                Je vous laisse publier mon application mobile sous votre compte développeur d’Apple.
            </label>
            <?php }?>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAppleUsername']==''){?>
        <div class="name1" id="apple_user_cred" style="display: none;">
        <?php }elseif($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAppleUsername']!=''){?>
        <div class="name1" id="apple_user_cred">
        <?php }?>
            <hr>
            <label class="lable" style="cursor:default;"><h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Email"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h4></label><input type="text" class="text_box_bg" id="vWebsite" name="data[vAppleUsername]"
                                                                            value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vAppleUsername'];?>
" />

            <label class="lable" style="cursor:default;"><h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Password"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h4></label><input type="password" class="text_box_bg" id="vWebsite" name="data[vApplePassword]"
                                                                            value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vApplePassword'];?>
"          />
        </div>

        <div class="name1" id="apple_new_user" style="display: none;">
        <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>    
            <hr>
             You have to create an Apple account before publishing your application. <a href="https://developer.apple.com/programs/ios/">Cliquer ici</a> to create one.
        <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
            <hr>
             Vous devez créer un compte Développeur Apple avant de publier votre application mobile. <a href="https://developer.apple.com/programs/ios/">Cliquer ici</a> pour créer votre compte.
        <?php }?>
        </div>
    </div>


    <div class="top_bord">
        <h1><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Google's Information"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h1>
    </div>
    <div class="midd_box_inner">
        <div class="name1">
            <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidUsername']==''){?>
                    <label><input style="margin: 4px;" type="radio" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >I have an Google developer account.</label>
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidUsername']!=''){?>
                    <label><input style="margin: 4px;" checked="checked" type="radio" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >I have an Google developer account.</label>
                <?php }?>
            <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidUsername']==''){?>
                    <label><input style="margin: 4px;" type="radio" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >J’ai un compte Développeur Google.</label>
                <?php }elseif($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidUsername']!=''){?>
                    <label><input style="margin: 4px;" type="radio" checked = "checked" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >J’ai un compte Développeur Google.</label>
                <?php }?>
            <?php }?>
        </div>
        
        <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
        <div class="name1">
                <label><input style="margin: 4px;" type="radio" name="android" value="0" onclick="return show_div('android_new_user','android_user_cred')" >I don't have a Google developer account and I want to create one : </label>
        </div>
        <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
        <div class="name1">
            <label><input style="margin: 4px;" type="radio" name="android" value="0" onclick="return show_div('android_new_user','android_user_cred')" >Je n’ai pas un compte Développeur Google. </label>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
        <div class="name1" style="width:60%;">
            <label><input type="radio" style="margin: 4px;" name="android" value="2" onclick="return show_none('android_new_user','android_user_cred')" >I let you publish my application under your Google developer account</label>
        </div>
        <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
        <div class="name1" style="width:60%;">
            <label><input type="radio" style="margin: 4px;" name="android" value="2" onclick="return show_none('android_new_user','android_user_cred')" >Je vous laisse publier mon application mobile sous votre compte développeur Google.</label>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidUsername']==''){?>
        <div class="name1" id="android_user_cred" style="display: none;">
        <?php }elseif($_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidUsername']!=''){?>
        <div class="name1" id="android_user_cred">
        <?php }?>
            <hr>
            <label class="lable" style="cursor:default;"><h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Email"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h4></label>
            <input type="text" class="text_box_bg" id="vWebsite" name="data[vAndroidUsername]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidUsername'];?>
" />

            <label class="lable" style="cursor:default;"><h4><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=="Password"){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></h4></label><input type="password" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['appinformation']['vAndroidPassword'];?>
" class="text_box_bg" id="vWebsite" name="data[vAndroidPassword]" />
        </div>

        <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
        <div class="name1" id="android_new_user" style="display: none;">
            <hr>
            You have to create a Google account before publishing your application. <a href="https://support.google.com/googleplay/android-developer/answer/6112435?hl=en">Click here</a> to create one.
        </div>
        <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
        <div class="name1" id="android_new_user" style="display: none;">
            <hr>
            Vous devez créer un compte Développeur Google avant de publier votre application mobile. <a href="https://support.google.com/googleplay/android-developer/answer/6112435?hl=en">Cliquer ici</a> pour créer votre compte.
        </div>
        <?php }?>

    </div>
</form>    

    <!-- App Icon -->

        
    

<div class="midd_box_inner">
    <div class="name1">
        <center><button type="button" class="btn btn-primary" onclick="return saveappdata();"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Publish'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?></button></center>
    </div>
</div>

<script>
    function show_div(id1,id2){
        document.getElementById(id1).style.display='block';
        document.getElementById(id2).style.display='none';
    }
    function show_none(id1,id2){
        document.getElementById(id1).style.display='none';
        document.getElementById(id2).style.display='none';
    }
</script>
<!-- new -->
</div>
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
</div>

<?php }} ?>