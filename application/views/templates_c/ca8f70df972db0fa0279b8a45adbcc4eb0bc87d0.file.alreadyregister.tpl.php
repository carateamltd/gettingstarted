<?php /* Smarty version Smarty-3.1.11, created on 2015-06-18 19:56:00
         compiled from "application/views/templates/alreadyregister.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8509547995582bfe01f83e7-66867639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca8f70df972db0fa0279b8a45adbcc4eb0bc87d0' => 
    array (
      0 => 'application/views/templates/alreadyregister.tpl',
      1 => 1430194597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8509547995582bfe01f83e7-66867639',
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
  'unifunc' => 'content_5582bfe02c3e91_73847513',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582bfe02c3e91_73847513')) {function content_5582bfe02c3e91_73847513($_smarty_tpl) {?><!DOCTYPE html><head>
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
			<img class="center easyapp" src="http://admin.easyapps.fr/assets/images/logo_french.png" width="257px" alt="logo">
		<?php }?>
		</a><br><br>
		<div class="register_form">
		<?php if ($_smarty_tpl->tpl_vars['lang']->value=='rEnglish'){?>
			<form name="register" id="registerdetail" method="post" action="http://admin.easy-apps.co.uk/newpackage/buy" class="registerdetail" onSubmit="return insert_register();">
		<?php }elseif($_smarty_tpl->tpl_vars['lang']->value=='rFrench'){?>
			<form name="register" id="registerdetail" method="post" action="http://admin.easyapps.fr/newpackage/buy" class="registerdetail" onSubmit="return insert_register_fr();">	
		<?php }?>
		
		<h2><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Purchase New App'){?><?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
<?php }?><?php } ?>
			 </h2>
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
				<div id="validation_msg" class="validation_msg" style="display:none;top:17%;"></div>
				<div class="registraion_input" style="margin-top:15px;">
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
				
				<div class="submit_btn">
				<div class="save_btn_design">
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Save'){?>
						<input type="Submit" class="btn login-btn savebtn" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>
" />
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
" />
					<?php }?>
					<?php } ?>
				</div>
				</div>
				
				<div class="policylnk">
					<?php if ($_smarty_tpl->tpl_vars['lang']->value=='rFrench'){?>
					J'accepte<a href="http://www.easyapps.fr/intimite-politique"> 
politique de confidentialité et les </a> & <a href="http://www.easyapps.fr/conditions-generales-de-vente">conditions générales de ventes.</a>
					<?php }elseif($_smarty_tpl->tpl_vars['lang']->value=='rEnglish'){?>
					By signing up you agree to our<a href="http://www.easy-apps.co.uk/privacy-policy"> Privacy Policy  </a> & <a href="http://www.easy-apps.co.uk/terms-conditions">Terms of Service.</a>
					<?php }?>
				</div>
			</form>
		</div>
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
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);
		
		if(vEmail == ''){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Email.</div>');
			$("#validation_msg").show();
			$("#vEmail").focus();
			return false;
		}else {
			$("#validation_msg").hide();
		}

		$("#registerdetail").submit();
	}


	function insert_register_fr(){
		var vEmail = document.getElementById("vEmail").value;
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);
		
		if(vEmail == ''){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Email.</div>');
			$("#validation_msg").show();
			$("#vEmail").focus();
			return false;
		}else {
			$("#validation_msg").hide();
		}

		$("#registerdetail").submit();
	}

	/** check email id **/
	function check_emailid_exist()
	{
		var vEmail = document.getElementById("vEmail").value;
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);

		if(vEmail == ''){
			$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Email.</div>');
			$("#validation_msg").show();
			$("#vEmail").focus();
			return false;
		}else{
		
		$.ajax({
			url:'http://www.admin.easy-apps.co.uk/authentication/check_email_already_registration',
			type:'GET',   
			data:'vEmail='+vEmail,
			dataType: 'json',
			success: function (data) {
			   /** Check Email Exist or not **/
			   if(data.msg == 'Email does not Exist'){
				$("#validation_msg").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Email does not Exist.</div>');
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
	}
</script>

</html>
<?php }} ?>