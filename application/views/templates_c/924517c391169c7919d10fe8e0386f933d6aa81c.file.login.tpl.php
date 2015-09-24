<?php /* Smarty version Smarty-3.1.11, created on 2015-09-22 21:14:17
         compiled from "application/views/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19247794525582a2e6de19e6-24404200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924517c391169c7919d10fe8e0386f933d6aa81c' => 
    array (
      0 => 'application/views/templates/login.tpl',
      1 => 1442930645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19247794525582a2e6de19e6-24404200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5582a2e6f27485_81326591',
  'variables' => 
  array (
    'data' => 0,
    'mylang' => 0,
    'lang' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582a2e6f27485_81326591')) {function content_5582a2e6f27485_81326591($_smarty_tpl) {?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_bootstrap'];?>
css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_bootstrap'];?>
css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_font_awsome'];?>
css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
style.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
style-responsive.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
style-default.css" rel="stylesheet" id="style_color" />
   <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery-1.8.3.min.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="lock">
     
    <!-- mayur gajjar language -->
    <!-- <div id="language" style="float:right;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
authentication/index?lang=rEnglish" title="Uk"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/images/en.png"></a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
authentication/index?lang=rFrench" title="France"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
assets/images/fr.png"></a>
    </div> -->
	  

    <form class="form-signin" id="frmsignin" action="authentication" method="post">
        <input type="hidden" name="language" id="language" value="<?php echo $_smarty_tpl->tpl_vars['mylang']->value;?>
" />
        <div class="login-wrap" id="logindiv">
        <div class="lock-header">
        <!-- BEGIN LOGO -->
        <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
        <a class="center" id="logo" href="">
            <img class="center easyapp" alt="logo" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
logo.png">
        </a>
        <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>
        <a class="center" id="logo" href="">
            <img class="center easyapp" alt="logo" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
logo_french.png">
        </a>
        <?php }?>
  <!-- END LOGO -->
    	</div>
		    
    		<div class="login_box">
        <div id="validation_msg" class="validation_msg" style="display:none;"></div>  
        <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
        <div class="alert alert-info" style="color:#ff0000;font-size:14px;left:0;position:absolute;top:-40%;" id="alert">
        <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

        </div>
        <?php }?>  
    		<div class="email_txtbox">
		  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
		        <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Email address'){?>	
            			<input type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" class="login_inputbtn" maxlength="255" name="vEmail" id="vEmail">
			<?php }?>
  		<?php } ?>
              </div>
              <div class="password_txtbox">
  		<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
  		         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Password'){?>	
             		<input type="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" class="login_inputbtn" maxlength="255" name="vPassword" id="vPassword">

  			<?php }?>	
  		<?php } ?>
            </div>
            <div class="login_btn">
            	<button type="submit" class="btn login-btn" onClick="return login();">
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Login'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                    <?php } ?>
                    <!--<i class=" icon-long-arrow-right"></i>-->
                </button>
            </div>
            </div>
            <!--<div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span>
                    	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Login'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
           				<?php } ?>
                    </span>
                </div>
            </div>-->
           <!-- <div class="metro double-size green">
                <div class="input-append lock-input">
                    
                </div>
            </div>
            <div class="metro double-size yellow" id="yellow">
                <div class="input-append lock-input">
                    
                </div>
            </div>
            <div class="metro single-size terques login">
                
            </div>-->
            <div class="login-footer">
                <div class="remember-hint pull-left" style="display:none;">
                    <input type="checkbox" id="">Remember Me
                </div>
                <div class="forgot-hint">
                    <a id="forget-password" class="" href="javascript:void(0);" onClick="return forgetpwd();"><!--Forgot Password-->
                        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Forgot Password'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?>?
                    </a>
                </div>
			<div class="Registration">
     <?php if ($_smarty_tpl->tpl_vars['mylang']->value=='rEnglish'){?>
			<a id="register-detail" class="" href="http://www.easy-apps.co.uk/packageprice"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Sign Up'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></a>
      <?php }elseif($_smarty_tpl->tpl_vars['mylang']->value=='rFrench'){?>                  
        <a id="register-detail" class="" href="http://www.easyapps.fr/packageprix"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                             <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Sign Up'){?>
                                <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                             <?php }?>
                        <?php } ?></a>  
      <?php }?>
				</div>
            </div>
        </div>
    </form>
     

    <form class="form-signin" id="forgetdiv" style="display:none;">
        <div class="login-wrap" id="logindiv">
            <!--<div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Login'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                    <?php } ?></span>
                </div>
            </div>-->
            <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="">
            <img class="center easyapp" alt="logo" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_logo'];?>
logo.png">
        </a>
        <!-- END LOGO -->
    	</div>
            <div class="login_box">
            	<div class="email_txtbox">
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
		         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Email address'){?>
                		<input type="text" maxlength="255" placeholder="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" name="vEmailId" id="vEmailId" class="login_inputbtn">
			 <?php }?>
		   	<?php } ?>
                </div>
                <div class="login_btn">
                    <button type="button" class="btn login-btn" onClick="sendpassword();">
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                    <?php } ?>
                   <!-- <i class=" icon-long-arrow-right"></i>-->
                </button>
                </div>
            </div>
            <!--<div class="metro double-size green" style="width:628px !important;">
                <div class="input-append lock-input">
                    
                </div>
            </div>
            <div class="metro single-size terques login" id="buttondiv">
               
            </div>-->
            <div class="metro single-size terques login" id="forgetloder" style="display:none;">
                <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
ajax-loader.gif">
            </div>
            <div class="login-footer">
                <div class="remember-hint pull-left"></div>
                <div class="forgot-hint pull-right">
                    <a id="forget-password" class="" href="javascript:void(0);" onClick="return showlogindiv();"><!--Back Login-->			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                         <?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Back Login'){?>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                         <?php }?>
                    <?php } ?></a>
                </div>
			</div>
        </div>
    </form>
    


</body>
<!-- END BODY -->

<script type="text/javascript">
var site_url = "<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
";
var imagepath = "<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
";
function forgetpwd(){
    $("#logindiv").hide();
    $("#forgetdiv").show();
}
function showlogindiv(){
    $("#forgetdiv").hide();    
    $("#logindiv").show();
}
function sendpassword(){
    var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
    var valid = emailRegex.test($('#vEmailId').val());
    var vEmail=$("#vEmailId").val();
	  var vPassword=$("#vPassword").val();

 //    if(vEmail == ''){
	// 	$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Veuillez saisir une adresse email.</div>');
	// 	$("#validation_msg").show();
	// 	$("#vEmail").focus();
	// 	return false;
	// }else {
	// 	$("#validation_msg").hide();
	// }
	
	// if(valid == false){
	// 	$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Veuillez entrer une adresse email valide svp.</div>');
	// 	$("#validation_msg").show();
	// 	$("#vEmail").focus();
	// 	return false;
	// }else {
	// 	$("#validation_msg").hide();
	// }
	
	// if(vPassword == ''){
	// 	$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Veuillez saisir votre mot de passe.</div>');
	// 	$("#validation_msg").show();
	// 	$("#vPassword").focus();
	// 	return false;
	// }else{
	// 	$("#validation_msg").hide();
	// }

    if(vEmail.trim() != '' && valid){
            var extra = '';
            extra+='?email='+vEmail;
            var url = site_url + 'authentication/forgetpassword';
            var pars = extra;
            $("#forgetloder").show();
            $("#buttondiv").hide();
            $.post(url+pars,
               function(data){
                 //alert(data);return false;
                  if(data.trim() == 0){
                     $("#buttondiv").show();
                     $("#forgetloder").hide();
                     $("#vEmailId").val('');
                     alert('Username and Password send on your email.Please check your mail');
                  }
                  else{
                     $("#buttondiv").show();
                     $("#forgetloder").hide();
                     alert('This email id is not registred. Please try another one!');
                  }
            });
      }
      else{
            return false;
      }
}

function login()
{
    var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
    var valid = emailRegex.test($('#vEmail').val());
    var vEmail=$("#vEmail").val();
	   var vPassword = $("#vPassword").val();
    var language = $('#language').val();
	
    if(language == 'rEnglish'){
    if(vEmail == ''){
		$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Email.</div>');
		$("#validation_msg").show();
		$("#vEmail").focus();
		return false;
	}else {
		$("#validation_msg").hide();
	}
	
	if(valid == false){
		$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Valid Email.</div>');
		$("#validation_msg").show();
		$("#vEmail").focus();
		return false;
	}else {
		$("#validation_msg").hide();
	}
	
	if(vPassword == ''){
		$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Password.</div>');
		$("#validation_msg").show();
		$("#vPassword").focus();
		return false;
	}else{
		$("#validation_msg").hide();
	}
}else if(language == 'rFrench'){
     if(vEmail == ''){
        $("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Votre Email.</div>');
        $("#validation_msg").show();
        $("#vEmail").focus();
        return false;
    }else {
        $("#validation_msg").hide();
    }
    
    if(valid == false){
        $("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button> Entrez e-mail valide.</div>');
        $("#validation_msg").show();
        $("#vEmail").focus();
        return false;
    }else {
        $("#validation_msg").hide();
    }
    
    if(vPassword == ''){
        $("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Votre Mot De Passe.</div>');
        $("#validation_msg").show();
        $("#vPassword").focus();
        return false;
    }else{
        $("#validation_msg").hide();
    }
}
}
jQuery(document).ready(function () {
    setTimeout(function(){ jQuery("#alert").fadeOut('slow'); },5000);
});
</script>

</html>
<?php }} ?>