<?php /* Smarty version Smarty-3.1.11, created on 2015-06-18 19:27:40
         compiled from "application/views/templates/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4423765725582b93cd681a4-07174496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2707ab0acc682bc626c51f9193f8cef2d544cf1' => 
    array (
      0 => 'application/views/templates/register.tpl',
      1 => 1432625802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4423765725582b93cd681a4-07174496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'language' => 0,
    'val' => 0,
    'packages' => 0,
    'penny' => 0,
    'packagename' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5582b93ce2cae0_90938055',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582b93ce2cae0_90938055')) {function content_5582b93ce2cae0_90938055($_smarty_tpl) {?><!DOCTYPE html><head>
   <meta charset="utf-8" />
   <title>Registration</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   
   <!-- Registration css and javascript-->
   <link href="http://admin.easy-apps.co.uk/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="http://admin.easy-apps.co.uk/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="http://admin.easy-apps.co.uk/assets/css/font-awesome.css" rel="stylesheet" />
   <link href="http://admin.easy-apps.co.uk/assets/css/style.css" rel="stylesheet" />
   <link href="http://admin.easy-apps.co.uk/assets/css/style-responsive.css" rel="stylesheet" />
   <link href="http://admin.easy-apps.co.uk/assets/css/style-default.css" rel="stylesheet" id="style_color" />
   <script src="http://admin.easy-apps.co.uk/assets/jquery-1.8.3.min.js"></script>
   <script src="http://admin.easy-apps.co.uk/assets/js/jquery.validate.min.js"></script>
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <!-- End Registration -->
</head>

<!-- Registration Form -->
<body class="lock">
<center>
<div class="login-wrap" id="logindiv">
	
	<div class="register_add">
		<a id="logo" class="center" href="">
		<?php if ($_smarty_tpl->tpl_vars['lang']->value=='rEnglish'){?>
			<img class="center easyapp" src="http://admin.easy-apps.co.uk/assets/images/logo.png" width="257px" alt="logo">
		<?php }elseif($_smarty_tpl->tpl_vars['lang']->value=='rFrench'){?>
			<img class="center easyapp" src="http://admin.easy-apps.co.uk/assets/images/logo_french.png" width="257px" alt="logo">
		<?php }?>
		</a><br><br>
		<div class="register_form">
		<?php if ($_smarty_tpl->tpl_vars['lang']->value=='rEnglish'){?>
			<form name="register" id="registerdetail" method="post" action="http://admin.easy-apps.co.uk/package/buy" class="registerdetail" onSubmit="return insert_register();">
		<?php }elseif($_smarty_tpl->tpl_vars['lang']->value=='rFrench'){?>
			<form name="register" id="registerdetail" method="post" action="http://admin.easyapps.fr/package/buy" class="registerdetail" onSubmit="return insert_register_fr();">	
		<?php }?>
		
			
			
			<h2> <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Create a Free Account'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?> </h2>
			<img src="../assets/css/images/divider.png" alt="">
				<input type="hidden" name="eLanguage" id="eLanguage" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
" />
				<input type="hidden" name="iRoleId" id="iRoleId" value="2" />
				<input type="hidden" name="vType" id="vType" value="Trial" />
				<input type="hidden" name="vPackages" id="packages" value="<?php echo $_smarty_tpl->tpl_vars['packages']->value;?>
" />
				<input type="hidden" name="penny" id="penny" value="<?php echo $_smarty_tpl->tpl_vars['penny']->value;?>
" />
				<input type="hidden" name="packagename" id="packagename" value="<?php echo $_smarty_tpl->tpl_vars['packagename']->value;?>
" />
				<div id="validation_msg" class="validation_msg" style="display:none;top:11% !important;"></div>
				<div class="registraion_input">
					<div class="label_text"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Email'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>*:</div>
					<?php if ($_smarty_tpl->tpl_vars['lang']->value=='rEnglish'){?>					
						<input type="text" class="login_inputbtn" name="vEmail" id="vEmail" onBlur="return check_emailid_exist();" />
					<?php }elseif($_smarty_tpl->tpl_vars['lang']->value=='rFrench'){?>
						<input type="text" class="login_inputbtn" name="vEmail" id="vEmail" onBlur="return check_emailid_fr_exist();" />
					<?php }?>
				</div>

				<div class="registraion_input">
					<div class="label_text"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Password'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>*:</div>
					<input type="password" class="login_inputbtn" name="vPassword" id="vPassword" />
				</div>
				<div class="submit_btn">
				<div class="save_btn_design">
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save'){?>
						<input type="Submit" class="btn login-btn savebtn" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" style="width: 90% !important;"/>
					<?php }?>
				<?php } ?>
				</div>
				<div class="back_btn_design">	
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Back'){?>
						<input type="button" class="btn login-btn backbtn" onClick="history.go(-1);" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" style="width: 90% !important;" />
						<?php }?>
				<?php } ?>	
					</div>
				</div>
				<div class="policylnk">
					<?php if ($_smarty_tpl->tpl_vars['lang']->value=='rFrench'){?>
					J'accepte<a href="http://www.easyapps.fr/intimite-politique"> 
la politique de confidentialité et les </a> & <a href="http://www.easyapps.fr/conditions-generales-de-vente">conditions générales de ventes.</a>
					<?php }elseif($_smarty_tpl->tpl_vars['lang']->value=='rEnglish'){?>
					By signing up you agree to our<a href="http://www.easy-apps.co.uk/privacy-policy"> Privacy Policy  </a> & <a href="http://www.easy-apps.co.uk/terms-conditions">Terms of Service.</a>
					<?php }?>
				</div>
			</form>
		</div>
		<!-- Already Register -->
		<?php if ($_smarty_tpl->tpl_vars['lang']->value=='rEnglish'){?>
		<form name="register" id="registerdetail" method="post" action="http://www.admin.easy-apps.co.
		uk/authentication/already_register" class="registerdetail">	
		<?php }elseif($_smarty_tpl->tpl_vars['lang']->value=='rFrench'){?>
		<form name="register" id="registerdetail" method="post" action="http://www.admin.easyapps.fr/authentication/already_register" class="registerdetail">	
		<?php }?>
			<input type="hidden" name="eLanguage" id="eLanguage" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value;?>
" />
			<input type="hidden" name="iRoleId" id="iRoleId" value="2" />
			<input type="hidden" name="vType" id="vType" value="Trial" />
			<input type="hidden" name="vPackages" id="packages" value="<?php echo $_smarty_tpl->tpl_vars['packages']->value;?>
" />
			<input type="hidden" name="penny" id="penny" value="<?php echo $_smarty_tpl->tpl_vars['penny']->value;?>
" />
			<input type="hidden" name="packagename" id="packagename" value="<?php echo $_smarty_tpl->tpl_vars['packagename']->value;?>
" />
			<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Already Registered? Login here'){?>
			<input type="Submit" class="btn login-btn backbtn" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

" style="align-content: center;
margin: 14px 200px;text-transform:none;" />
			<?php }?>
				<?php } ?>
		</form>
	</div>
</div>
</center>
</body>

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->


<script>
	/** Register **/
	function insert_register()
	{	
		var vEmail = document.getElementById("vEmail").value;
		var vPassword = document.getElementById("vPassword").value;
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);
	//	var myPassword= /(?=^.{6,30}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z]){&quot;&quot;:;'?&gt;.&lt;,]).*$/;
	//	var isvalidpwd = myPassword.test(vPassword);
		
		if(vEmail == ''){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Email.</div>');
			$("#validation_msg").show();
			$("#vEmail").focus();
			return false;
		}else {
			$("#validation_msg").hide();
		}
		
		if(isvalid == false){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter valid Email.</div>');
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
		
		if(vPassword.length < 6){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Passowrd must be more than 6 characters.</div>');
			$("#validation_msg").show();
			$("#vPassword").focus();
			return false;
		}else{
			$("#validation_msg").hide();
		}
		
		/*if(isvalidpwd == false){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Password must be 1 Upper case,1 Lower case, 1 Digit,1 special character.</div>');
			$("#validation_msg").show();
			$("#vPassword").focus();
			return false;
		}else{
			$("#validation_msg").hide();
		}*/
		
		$("#registerdetail").submit();
	}
	
	/** **/
	function insert_register_fr()
	{
	var vEmail = document.getElementById("vEmail").value;
		var vPassword = document.getElementById("vPassword").value;
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);
	//	var myPassword = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,12}$/;
	//	var isvalidpwd = myPassword.test(vPassword);
		
		if(vEmail == ''){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Veuillez saisir une adresse email.</div>');
			$("#validation_msg").show();
			$("#vEmail").focus();
			return false;
		}else {
			$("#validation_msg").hide();
		}
		
		if(isvalid == false){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Veuillez entrer une adresse email valide svp.</div>');
			$("#validation_msg").show();
			$("#vEmail").focus();
			return false;
		}else {
			$("#validation_msg").hide();
		}
		
		if(vPassword == ''){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Veuillez saisir votre mot de passe.</div>');
			$("#validation_msg").show();
			$("#vPassword").focus();
			return false;
		}else{
			$("#validation_msg").hide();
		}
		
		if(vPassword.length < 6){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Votre mot de passe doit comporter 6 caractères minimum.</div>');
			$("#validation_msg").show();
			$("#vPassword").focus();
			return false;
		}else{
			$("#validation_msg").hide();
		}
		
		/*if(isvalidpwd == false){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Mot de passe doit être une majuscule, une minuscule, 1 chiffre, 1 caractère spécial.</div>');
			$("#validation_msg").show();
			$("#vPassword").focus();
			return false;
		}else{
			$("#validation_msg").hide();
		}*/
		
		$("#registerdetail").submit();
	}
	
	
	/** check email id **/
	function check_emailid_exist()
	{
		var vEmail = document.getElementById("vEmail").value;
		var vPassword = document.getElementById("vPassword").value;
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);
		
		$.ajax({
			url:'http://admin.easy-apps.co.uk/authentication/check_email_registration',
			type:'GET',   
			data:'vEmail='+vEmail,
			dataType: 'json',
			success: function (data) {
			   /** Check Email Exist or not **/
			   if(data.msg == "Test"){
					$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Email Already in Use.</div>');
					$("#validation_msg").show();
					$("#vEmail").focus();
					return false;
			   }
			   
			   /** Done **/
			   if(data.msg == 'Done'){
				 $("#validation_msg").hide();
			   }
			},
			error: function(){
				alert("TEST");
			}
		});
	}
	
	
	/** **/
	function check_emailid_fr_exist()
	{
		var vEmail = document.getElementById("vEmail").value;
		var vPassword = document.getElementById("vPassword").value;
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);
		$.ajax({
			url:'http://admin.easyapps.fr/authentication/check_email_registration_french',
			type:'GET',   
			data:'vEmail='+vEmail,
			dataType: 'json',
			success: function (data) {
				 /** Check Email Exist or not **/
			   if(data.msg == "Test"){
					$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Email déjà utilisé.</div>');
					$("#validation_msg").show();
					$("#vEmail").focus();
					return false;
			   }
			   
			   /** Done **/
			   if(data.msg == 'Done'){
				 $("#validation_msg").hide();
			   }
			}
		});
	}
	
</script>

</html>
<?php }} ?>