<!DOCTYPE html>
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
   <link href="{$data.base_bootstrap}css/bootstrap.min.css" rel="stylesheet" />
   <link href="{$data.base_bootstrap}css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="{$data.base_font_awsome}css/font-awesome.css" rel="stylesheet" />
   <link href="{$data.base_css}style.css" rel="stylesheet" />
   <link href="{$data.base_css}style-responsive.css" rel="stylesheet" />
   <link href="{$data.base_css}style-default.css" rel="stylesheet" id="style_color" />
   <script src="{$data.base_js}jquery-1.8.3.min.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="lock">
     
    <!-- mayur gajjar language -->
    <!-- <div id="language" style="float:right;">
    <a href="{$data.base_url}authentication/index?lang=rEnglish" title="Uk"><img src="{$data.base_url}assets/images/en.png"></a>
    <a href="{$data.base_url}authentication/index?lang=rFrench" title="France"><img src="{$data.base_url}assets/images/fr.png"></a>
    </div> -->
	  

    <form class="form-signin" id="frmsignin" action="authentication" method="post">
        <input type="hidden" name="language" id="language" value="{$mylang}" />
        <div class="login-wrap" id="logindiv">
        <div class="lock-header">
        <!-- BEGIN LOGO -->
        {if $mylang == 'rEnglish'}
        <a class="center" id="logo" href="">
            <img class="center easyapp" alt="logo" src="{$data.base_logo}{$data.logo_name_en}">
        </a>
        {else if $mylang == 'rFrench'}
        <a class="center" id="logo" href="">
            <img class="center easyapp" alt="logo" src="{$data.base_logo}{$data.logo_name_fr}">
        </a>
        {/if}
  <!-- END LOGO -->
    	</div>
		    
    		<div class="login_box">
        <div id="validation_msg" class="validation_msg" style="display:none;"></div>  
        {if $data.message neq ''}
        <div class="alert alert-info" style="color:#ff0000;font-size:14px;left:0;position:absolute;top:-40%;" id="alert">
        {$data.message}
        </div>
        {/if}  
    		<div class="email_txtbox">
		  {foreach from=$lang item=val}
		        {if $val.rLabelName == 'Email address'}	
            			<input type="text" placeholder="{$val.rField}" class="login_inputbtn" maxlength="255" name="vEmail" id="vEmail">
			{/if}
  		{/foreach}
              </div>
              <div class="password_txtbox">
  		{foreach from=$lang item=val}
  		         {if $val.rLabelName == 'Password'}	
             		<input type="password" placeholder="{$val.rField}" class="login_inputbtn" maxlength="255" name="vPassword" id="vPassword">

  			{/if}	
  		{/foreach}
            </div>
            <div class="login_btn">
            	<button type="submit" class="btn login-btn" onClick="return login();">
                    {foreach from=$lang item=val}
                         {if $val.rLabelName == 'Login'}
                            {$val.rField}
                         {/if}
                    {/foreach}
                    <!--<i class=" icon-long-arrow-right"></i>-->
                </button>
            </div>
            </div>
            <!--<div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span>
                    	{foreach from=$lang item=val}
                             {if $val.rLabelName == 'Login'}
                                {$val.rField}
                             {/if}
           				{/foreach}
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
                        {foreach from=$lang item=val}
                             {if $val.rLabelName == 'Forgot Password'}
                                {$val.rField}
                             {/if}
                        {/foreach}?
                    </a>
                </div>
			<div class="Registration">
     {if $mylang == 'rEnglish'}
			<a id="register-detail" class="" href="http://www.easy-apps.co.uk/packageprice">{foreach from=$lang item=val}
                             {if $val.rLabelName == 'Sign Up'}
                                {$val.rField}
                             {/if}
                        {/foreach}</a>
      {else if $mylang == 'rFrench'}                  
        <a id="register-detail" class="" href="http://www.easyapps.fr/packageprix">{foreach from=$lang item=val}
                             {if $val.rLabelName == 'Sign Up'}
                                {$val.rField}
                             {/if}
                        {/foreach}</a>  
      {/if}
				</div>
            </div>
        </div>
    </form>
     

    <form class="form-signin" id="forgetdiv" style="display:none;">
        <div class="login-wrap" id="logindiv">
            <!--<div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Login'}
                            {$val.rField}
                         {/if}
                    {/foreach}</span>
                </div>
            </div>-->
            <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="">
            <img class="center easyapp" alt="logo" src="{$data.base_logo}logo.png">
        </a>
        <!-- END LOGO -->
    	</div>
            <div class="login_box">
            	<div class="email_txtbox">
			{foreach from=$lang item=val}
		         {if $val.rLabelName == 'Email address'}
                		<input type="text" maxlength="255" placeholder="{$val.rField}" name="vEmailId" id="vEmailId" class="login_inputbtn">
			 {/if}
		   	{/foreach}
                </div>
                <div class="login_btn">
                    <button type="button" class="btn login-btn" onClick="sendpassword();">
                    {foreach from=$lang item=val}
                         {if $val.rLabelName == 'Save'}
                            {$val.rField}
                         {/if}
                    {/foreach}
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
                <img src="{$data.base_image}ajax-loader.gif">
            </div>
            <div class="login-footer">
                <div class="remember-hint pull-left"></div>
                <div class="forgot-hint pull-right">
                    <a id="forget-password" class="" href="javascript:void(0);" onClick="return showlogindiv();"><!--Back Login-->			{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Back Login'}
                            {$val.rField}
                         {/if}
                    {/foreach}</a>
                </div>
			</div>
        </div>
    </form>
    


</body>
<!-- END BODY -->
{literal}
<script type="text/javascript">
var site_url = "{/literal}{$data.base_url}{literal}";
var imagepath = "{/literal}{$data.base_image}{literal}";
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
{/literal}
</html>
