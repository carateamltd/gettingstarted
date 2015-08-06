<script src="{$data.base_js}jquery.form.js"></script>
{include file="set_default_background_image_popup.tpl"}

<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
    <li>{foreach from=$lang item=val}{if $val.rLabelName == 'Application'}{$val.rField}{/if}{/foreach}</li>
</ul>
<div class="pageheader">
    <div class="pageicon"><span class="icon-book"></span></div>
    <div class="pagetitle">
        <h5>{foreach from=$lang item=val}{if $val.rLabelName == 'All Features Summary'}{$val.rField}{/if}{/foreach}</h5>

        <h1>
            {foreach from=$lang item=val}{if $val.rLabelName == 'Application'}{$val.rField}{/if}{/foreach}
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
{include file="tab.tpl"}
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

{if $data.paymentmessage neq ''}
    <div class="alert alert-info">
        {$data.paymentmessage}
    </div>
{/if}


<div id="msg1"></div>
<div class="top_bord">
    <h1>{foreach from=$lang item=val}{if $val.rLabelName == 'App Icon'}{$val.rField}{/if}{/foreach}</h1>
</div>
<form name="app_data" id="upate_appdata" method="post"  enctype="multipart/form-data" action="{$data.base_url}app/uploadAppicon">
<input type="hidden" class="text_box_bg"  name="app_image" value="{$data['appinformation']['vImage']}" />
<input type="hidden" class="text_box_bg"  name="ApplicationId" value="{$data['iApplicationId']}" />
<input type="hidden" class="text_box_bg"  name="language" value="{$data.mylang}" />
    <div class="app_icon_new">
        <div class="name1" style="cursor:default;"> <h4>{foreach from=$lang item=val}{if $val.rLabelName == 'Choose Icon'}{$val.rField}{/if}{/foreach}</h4>
            <div class="inner_box_file"><input type="file"  name="icon" id="icon" accept="image/png" class="file_beauty" >
            <p class="label1">PNG: 1024 x 1024</p>
            <div class="upload_app_btn "> <button type="button " class="btn upload_app_btn btn-primary" onclick="return checkvalidation();">{foreach from=$lang item=val}{if $val.rLabelName == "Upload App Icon"}{$val.rField}{/if}{/foreach}</button></div>
            </div>
            {if $data['appinformation']['vImage'] neq ''}
            <div class="radio_right btnicon">
            <img src="{$data.base_upload}app_icon/{$data['iApplicationId']}/{$data['appinformation']['vImage']}" width="75" height="75" />
            <button type="button " class="btn upload_app_btn delbtn" onclick="return deleteAppIcon('{$data['iApplicationId']}','{$data['appinformation']['vImage']}');">{foreach from=$lang item=val}{if $val.rLabelName == "Delete"}{$val.rField}{/if}{/foreach}</button>
            {/if}
            </div>
        </div>
    </div>
</form>

 <div class="top_bord">
    <h1>{foreach from=$lang item=val}{if $val.rLabelName == 'App Information'}{$val.rField}{/if}{/foreach}</h1>
</div>
{if $data.message neq ''}
    <div class="alert alert-info">
        {$data.message}
    </div>
{/if}
   
<form name="app_data" id="upate_appdata" method="post" enctype="multipart/form-data"
      action="{$data.base_url}app/updateAppData">
    <input type="hidden" class="text_box_bg" name="iApplicationId" value="{$data['iApplicationId']}"/>

    <div id="msg"></div>

    <div class="midd_box_inner">
        <div class="name1"><label class="lable" style="cursor:default;">
                <h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Name'}{$val.rField}{/if}{/foreach}</a>
                    <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png"
                                                                            align="absmiddle"/> <span><img
                                    class="callout_text" src="{$data.base_image}callout.gif"/> Enter your App Name. This is the title that shows up in the App Store and App Marketplace.(30 characters or less)</span></a> -->
                <span style="color:#ff0000;">*</span></h4></label>
            <input type="text" class="text_box_bg" id="tAppName" name="data[tAppName]"
                   value="{$data['appinformation']['tAppName']}"/>
        </div>

        <div class="name1"><label class="lable" style="cursor:default;">
                <h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Keywords'}{$val.rField}{/if}{/foreach} <!--<a
                            class="tooltip_text" href="javascript:void(0);"><img
                                src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img
                                    class="callout_text" src="{$data.base_image}callout.gif"/> Enter keywords that describe your specific app.  Each keyword must be separated with a comma.  Avoid generic terms like 'music', charcter limit is 100.  These will be used for your iTunes App Store listing.</span></a> -->
                <span style="color:#ff0000;">*</span></h4></label>
            <input type="text" class="text_box_bg" id="tAppKeywords" name="data[tAppKeywords]"
                   value="{$data['appinformation']['tAppKeywords']}"/>
        </div>

        <div class="description_left"><label class="lable" style="cursor:default;">
                <h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Description'}{$val.rField}{/if}{/foreach}
                    <!--<a
                            class="tooltip_text" href="javascript:void(0);"><img
                                src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img
                                    class="callout_text" src="{$data.base_image}callout.gif"/> This description will appear in the iTunes App Store/Google Play Store and must meet high standards. <br> Plain text only, no HTML.</span></a> -->
                </h4></label>
            <textarea class="text_aera_style" id="tDescription"
                      name="data[tDescription]">{$data['appinformation']['tDescription']}</textarea>
        </div>

        <div class="dts_btn">
            <lable class="btn btn-success"
                   id="character-count">{if $data['appinformation']['tDescription']|@count gt 0}{$data['appinformation']['tDescription']|strlen} {else}'0'{/if}</lable>
            <lable id="content-msg">{if $data['appinformation']['tDescription']|@strlen gt 249}Good. You have now enough content.{else}{foreach from=$lang item=val}{if $val.rLabelName == 'Insufficient content'}{$val.rField}{/if}{/foreach}{/if}</lable>
        </div>

        <div class="name1">
            <label class="lable" style="cursor:default;">
                <h4>{foreach from=$lang item=val}{if $val.rLabelName == 'Official Website'}{$val.rField}{/if}{/foreach}
                </h4></label>
            <input type="text" class="text_box_bg" id="vWebsite" name="data[vWebsite]"
                   value="{$data['appinformation']['vWebsite']}"/>
        </div>

        <div class="name1">
            <label class="lable" style="cursor:default;">
                <h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Price'}{$val.rField}{/if}{/foreach} 
                <span style="color:#ff0000;">*</span></h4></label>
            <input type="text" class="text_box_bg" id="fPrice" name="data[fPrice]"
                   value="{if $data['appinformation']['fPrice'] neq ''}{$data['appinformation']['fPrice']}{else}{/if}"
                   onkeypress="return isNumberKey(event);"/>&nbsp{$vCurrency}
        </div>
    </div>
<!-- -->
  <div class="top_bord">
    <h1>{foreach from=$lang item=val}{if $val.rLabelName == "Apple's Information"}{$val.rField}{/if}{/foreach}</h1>
    </div>
    <div class="midd_box_inner">
        <div class="name1">
            {if $mylang == 'rEnglish'}
                    {if $data['appinformation']['vAppleUsername'] == ''}
                        <label><input style="margin: 4px;" type="radio" name="apple" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > I have an Apple developer account.
                    {else if $data['appinformation']['vAppleUsername'] != ''}
                        <label><input style="margin: 4px;" checked="checked" type="radio" name="apple" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > I have an Apple developer account.
                    {/if}
            {else if $mylang == 'rFrench'}
                    {if $data['appinformation']['vAppleUsername'] == ''}
                        <label><input style="margin: 4px;" type="radio" name="apple" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > J’ai un compte Développeur Apple.
                    {else if $data['appinformation']['vAppleUsername'] != ''}
                        <label><input style="margin: 4px;" type="radio" name="apple" checked="checked" value="1" onClick="show_div('apple_user_cred','apple_new_user')" > J’ai un compte Développeur Apple.
                    {/if}
            {/if}
        </div>

        <div class="name1">
            {if $mylang == 'rEnglish'}    
            <label><input style="margin: 4px;" type="radio" name="apple" value="0" onClick="show_div('apple_new_user','apple_user_cred')" >I don't have an Apple developer account and I want to create one.</label>
            {else if $mylang == 'rFrench'}
            <label><input style="margin: 4px;" type="radio" name="apple" value="0" onClick="show_div('apple_new_user','apple_user_cred')" >Je n’ai pas un compte Développeur Apple.</label>
            {/if}
        </div>

        <div class="name1" style="width:60%;">
            {if $mylang == 'rEnglish'}
            <label><input type="radio" style="margin: 4px;" name="apple" value="2" onclick="return show_none('apple_new_user','apple_user_cred')" >
                I let you publish my application under your Apple developer account.
            </label>
            {else if $mylang == 'rFrench'}
            <label><input type="radio" style="margin: 4px;" name="apple" value="2" onclick="return show_none('apple_new_user','apple_user_cred')" >
                Je vous laisse publier mon application mobile sous votre compte développeur d’Apple.
            </label>
            {/if}
        </div>

        {if $data['appinformation']['vAppleUsername'] == ''}
        <div class="name1" id="apple_user_cred" style="display: none;">
        {else if $data['appinformation']['vAppleUsername'] != ''}
        <div class="name1" id="apple_user_cred">
        {/if}
            <hr>
            <label class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == "Email"}{$val.rField}{/if}{/foreach}</h4></label><input type="text" class="text_box_bg" id="vWebsite" name="data[vAppleUsername]"
                                                                            value="{$data['appinformation']['vAppleUsername']}" />

            <label class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == "Password"}{$val.rField}{/if}{/foreach}</h4></label><input type="password" class="text_box_bg" id="vWebsite" name="data[vApplePassword]"
                                                                            value="{$data['appinformation']['vApplePassword']}"          />
        </div>

        <div class="name1" id="apple_new_user" style="display: none;">
        {if $mylang == 'rEnglish'}    
            <hr>
             You have to create an Apple account before publishing your application. <a href="https://developer.apple.com/programs/ios/">Cliquer ici</a> to create one.
        {else if $mylang == 'rFrench'}
            <hr>
             Vous devez créer un compte Développeur Apple avant de publier votre application mobile. <a href="https://developer.apple.com/programs/ios/">Cliquer ici</a> pour créer votre compte.
        {/if}
        </div>
    </div>


    <div class="top_bord">
        <h1>{foreach from=$lang item=val}{if $val.rLabelName == "Google's Information"}{$val.rField}{/if}{/foreach}</h1>
    </div>
    <div class="midd_box_inner">
        <div class="name1">
            {if $mylang == 'rEnglish'}
                {if $data['appinformation']['vAndroidUsername'] == ''}
                    <label><input style="margin: 4px;" type="radio" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >I have an Google developer account.</label>
                {else if $data['appinformation']['vAndroidUsername'] != ''}
                    <label><input style="margin: 4px;" checked="checked" type="radio" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >I have an Google developer account.</label>
                {/if}
            {else if $mylang == 'rFrench'}
                {if $data['appinformation']['vAndroidUsername'] == ''}
                    <label><input style="margin: 4px;" type="radio" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >J’ai un compte Développeur Google.</label>
                {else if $data['appinformation']['vAndroidUsername'] != ''}
                    <label><input style="margin: 4px;" type="radio" checked = "checked" name="android" value="1" onclick="return show_div('android_user_cred','android_new_user')" >J’ai un compte Développeur Google.</label>
                {/if}
            {/if}
        </div>
        
        {if $mylang == 'rEnglish'}
        <div class="name1">
                <label><input style="margin: 4px;" type="radio" name="android" value="0" onclick="return show_div('android_new_user','android_user_cred')" >I don't have a Google developer account and I want to create one : </label>
        </div>
        {else if $mylang == 'rFrench'}
        <div class="name1">
            <label><input style="margin: 4px;" type="radio" name="android" value="0" onclick="return show_div('android_new_user','android_user_cred')" >Je n’ai pas un compte Développeur Google. </label>
        </div>
        {/if}

        {if $mylang == 'rEnglish'}
        <div class="name1" style="width:60%;">
            <label><input type="radio" style="margin: 4px;" name="android" value="2" onclick="return show_none('android_new_user','android_user_cred')" >I let you publish my application under your Google developer account</label>
        </div>
        {else if $mylang == 'rFrench'}
        <div class="name1" style="width:60%;">
            <label><input type="radio" style="margin: 4px;" name="android" value="2" onclick="return show_none('android_new_user','android_user_cred')" >Je vous laisse publier mon application mobile sous votre compte développeur Google.</label>
        </div>
        {/if}

        {if $data['appinformation']['vAndroidUsername'] == ''}
        <div class="name1" id="android_user_cred" style="display: none;">
        {else if $data['appinformation']['vAndroidUsername'] != ''}
        <div class="name1" id="android_user_cred">
        {/if}
            <hr>
            <label class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == "Email"}{$val.rField}{/if}{/foreach}</h4></label>
            <input type="text" class="text_box_bg" id="vWebsite" name="data[vAndroidUsername]" value="{$data['appinformation']['vAndroidUsername']}" />

            <label class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == "Password"}{$val.rField}{/if}{/foreach}</h4></label><input type="password" value="{$data['appinformation']['vAndroidPassword']}" class="text_box_bg" id="vWebsite" name="data[vAndroidPassword]" />
        </div>

        {if $mylang == 'rEnglish'}
        <div class="name1" id="android_new_user" style="display: none;">
            <hr>
            You have to create a Google account before publishing your application. <a href="https://support.google.com/googleplay/android-developer/answer/6112435?hl=en">Click here</a> to create one.
        </div>
        {else if $mylang=='rFrench'}
        <div class="name1" id="android_new_user" style="display: none;">
            <hr>
            Vous devez créer un compte Développeur Google avant de publier votre application mobile. <a href="https://support.google.com/googleplay/android-developer/answer/6112435?hl=en">Cliquer ici</a> pour créer votre compte.
        </div>
        {/if}

    </div>
</form>    

    <!-- App Icon -->

        
    

<div class="midd_box_inner">
    <div class="name1">
        <center><button type="button" class="btn btn-primary" onclick="return saveappdata();">{foreach from=$lang item=val}{if $val.rLabelName == 'Publish'}{$val.rField}{/if}{/foreach}</button></center>
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
    {$data.create_links}
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

