<!DOCTYPE html><head>
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
		{if $lang == 'rEnglish'}
			<img class="center easyapp" src="http://admin.easy-apps.co.uk/assets/images/logo.png" width="257px" alt="logo">
		{elseif $lang == 'rFrench'}
			<img class="center easyapp" src="http://admin.easy-apps.co.uk/assets/images/logo_french.png" width="257px" alt="logo">
		{/if}
		</a><br><br>
		<div class="register_form">
		{if $lang == 'rEnglish'}
			<form name="register" id="registerdetail" method="post" action="http://admin.easy-apps.co.uk/package/buy" class="registerdetail" onSubmit="return insert_register();">
		{elseif $lang == 'rFrench'}
			<form name="register" id="registerdetail" method="post" action="http://admin.easyapps.fr/package/buy" class="registerdetail" onSubmit="return insert_register_fr();">	
		{/if}
		
			
			
			<h2> {foreach from=$language item=val}{if $val.rLabelName == 'Create a Free Account'}{$val.rField}{/if}{/foreach} </h2>
			<img src="../assets/css/images/divider.png" alt="">
				<input type="hidden" name="eLanguage" id="eLanguage" value="{$lang}" />
				<input type="hidden" name="iRoleId" id="iRoleId" value="2" />
				<input type="hidden" name="vType" id="vType" value="Trial" />
				<input type="hidden" name="vPackages" id="packages" value="{$packages}" />
				<input type="hidden" name="penny" id="penny" value="{$penny}" />
				<input type="hidden" name="packagename" id="packagename" value="{$packagename}" />
				<div id="validation_msg" class="validation_msg" style="display:none;top:11% !important;"></div>
				<div class="registraion_input">
					<div class="label_text">{foreach from=$language item=val}{if $val.rLabelName == 'Email'}{$val.rField}{/if}{/foreach}*:</div>
					{if $lang == 'rEnglish'}					
						<input type="text" class="login_inputbtn" name="vEmail" id="vEmail" onBlur="return check_emailid_exist();" />
					{elseif $lang == 'rFrench'}
						<input type="text" class="login_inputbtn" name="vEmail" id="vEmail" onBlur="return check_emailid_fr_exist();" />
					{/if}
				</div>

				<div class="registraion_input">
					<div class="label_text">{foreach from=$language item=val}{if $val.rLabelName == 'Password'}{$val.rField}{/if}{/foreach}*:</div>
					<input type="password" class="login_inputbtn" name="vPassword" id="vPassword" />
				</div>
				<div class="submit_btn">
				<div class="save_btn_design">
				{foreach from=$language item=val}
					{if $val.rLabelName == 'Save'}
						<input type="Submit" class="btn login-btn savebtn" value="{$val.rField}" style="width: 90% !important;"/>
					{/if}
				{/foreach}
				</div>
				<div class="back_btn_design">	
				{foreach from=$language item=val}
					{if $val.rLabelName == 'Back'}
						<input type="button" class="btn login-btn backbtn" onClick="history.go(-1);" value="{$val.rField}" style="width: 90% !important;" />
						{/if}
				{/foreach}	
					</div>
				</div>
				<div class="policylnk">
					{if $lang == 'rFrench'}
					J'accepte<a href="http://www.easyapps.fr/intimite-politique"> 
la politique de confidentialité et les </a> & <a href="http://www.easyapps.fr/conditions-generales-de-vente">conditions générales de ventes.</a>
					{else if $lang == 'rEnglish'}
					By signing up you agree to our<a href="http://www.easy-apps.co.uk/privacy-policy"> Privacy Policy  </a> & <a href="http://www.easy-apps.co.uk/terms-conditions">Terms of Service.</a>
					{/if}
				</div>
			</form>
		</div>
		<!-- Already Register -->
		{if $lang == 'rEnglish'}
		<form name="register" id="registerdetail" method="post" action="http://www.admin.easy-apps.co.
		uk/authentication/already_register" class="registerdetail">	
		{else if $lang == 'rFrench'}
		<form name="register" id="registerdetail" method="post" action="http://www.admin.easyapps.fr/authentication/already_register" class="registerdetail">	
		{/if}
			<input type="hidden" name="eLanguage" id="eLanguage" value="{$lang}" />
			<input type="hidden" name="iRoleId" id="iRoleId" value="2" />
			<input type="hidden" name="vType" id="vType" value="Trial" />
			<input type="hidden" name="vPackages" id="packages" value="{$packages}" />
			<input type="hidden" name="penny" id="penny" value="{$penny}" />
			<input type="hidden" name="packagename" id="packagename" value="{$packagename}" />
			{foreach from=$language item=val}
					{if $val.rLabelName == 'Already Registered? Login here'}
			<input type="Submit" class="btn login-btn backbtn" value="{$val.rField}
" style="align-content: center;
margin: 14px 200px;text-transform:none;" />
			{/if}
				{/foreach}
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

{literal}
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
{/literal}
</html>
