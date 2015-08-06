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
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="">
            <img class="center" alt="logo" src="{$data.base_logo}logo.png">
        </a>
        <!-- END LOGO -->
    </div>
    <form class="form-signin" id="frmsignin" action="authentication" method="post">
    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
                <span>Login</span>
            </div>
        </div>
        <div class="metro double-size green">
            <div class="input-append lock-input">
                <input type="text" placeholder="Email address" maxlength="255" name="vEmail" id="vEmail">
            </div>
        </div>
        <div class="metro double-size yellow">
            <div class="input-append lock-input">
                <input type="password" placeholder="Password" maxlength="255" name="vPassword" id="vPassword">
            </div>
        </div>
        <div class="metro single-size terques login">
                <button type="submit" class="btn login-btn">
                    Login
                    <i class=" icon-long-arrow-right"></i>
                </button>
        </div>
        
        <div class="login-footer">
            <div class="remember-hint pull-left">
                <input type="checkbox" id=""> Remember Me
            </div>
            <div class="forgot-hint pull-right">
                <a id="forget-password" class="" href="javascript:;">Forgot Password?</a>
            </div>
        </div>
    </div>
    </form>
</body>
<!-- END BODY -->
</html>