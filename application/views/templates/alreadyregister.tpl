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
		{else if $lang == 'rFrench'}
			<img class="center easyapp" src="http://admin.easyapps.fr/assets/images/logo_french.png" width="257px" alt="logo">
		{/if}
		</a><br><br>
		<div class="register_form">
		{if $lang == 'rEnglish'}
			<form name="register" id="registerdetail" method="post" action="http://admin.easy-apps.co.uk/newpackage/buy" class="registerdetail" onSubmit="return insert_register();">
		{elseif $lang == 'rFrench'}
			<form name="register" id="registerdetail" method="post" action="http://admin.easyapps.fr/newpackage/buy" class="registerdetail" onSubmit="return insert_register_fr();">	
		{/if}
		
		<h2>{foreach from=$language item=val}{if $val.rLabelName == 'Purchase New App'}{$val.rField}{/if}{/foreach}
			 </h2>
			<img src="../assets/css/images/divider.png" alt="">
				<input type="hidden" name="eLanguage" id="eLanguage" value="{$lang}" />
				<input type="hidden" name="iRoleId" id="iRoleId" value="2" />
				<input type="hidden" name="vType" id="vType" value="Trial" />
				<input type="hidden" name="vPackages" id="packages" value="{$packages}" />
				<input type="hidden" name="penny" id="penny" value="{$penny}" />
				<input type="hidden" name="packagename" id="packagename" value="{$packagename}" />
				<div id="validation_msg" class="validation_msg" style="display:none;top:17%;"></div>
				<div class="registraion_input" style="margin-top:15px;">
					<div class="label_text">{foreach from=$language item=val}{if $val.rLabelName == 'Email'}{$val.rField}{/if}{/foreach}*:</div>
					{if $lang == 'rEnglish'}					
						<input type="text" class="login_inputbtn" name="vEmail" id="vEmail" onBlur="return check_emailid_exist();" />
					{elseif $lang == 'rFrench'}
						<input type="text" class="login_inputbtn" name="vEmail" id="vEmail" onBlur="return check_emailid_fr_exist();" />
					{/if}
				</div>
				
				<div class="submit_btn">
				<div class="save_btn_design">
				{foreach from=$language item=val}
					{if $val.rLabelName == 'Save'}
						<input type="Submit" class="btn login-btn savebtn" value="{$val.rField}" />
					{/if}
				{/foreach}
				</div>
				<div class="back_btn_design">	
					{foreach from=$language item=val}
					{if $val.rLabelName == 'Back'}
						<input type="button" class="btn login-btn backbtn" onClick="history.go(-1);" value="{$val.rField}" />
					{/if}
					{/foreach}
				</div>
				</div>
				
				<div class="policylnk">
					{if $lang == 'rFrench'}
					J'accepte<a href="http://www.easyapps.fr/intimite-politique"> 
politique de confidentialité et les </a> & <a href="http://www.easyapps.fr/conditions-generales-de-vente">conditions générales de ventes.</a>
					{else if $lang == 'rEnglish'}
					By signing up you agree to our<a href="http://www.easy-apps.co.uk/privacy-policy"> Privacy Policy  </a> & <a href="http://www.easy-apps.co.uk/terms-conditions">Terms of Service.</a>
					{/if}
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

{literal}
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
{/literal}
</html>
