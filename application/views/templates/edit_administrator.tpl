<script type="text/javascript" src="{$data.base_js}administrator.js"></script>
<div class="rightpanel">
<ul class="breadcrumbs">
    <li><a href="#"><i class="icon-user"></i></a> <span class="separator"></span></li>
    <li>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Administrator'}
                        {$val.rField}
                    {/if}
                {/foreach}</li>
</ul>
<div class="pageheader">
    <div class="pageicon"><span class="icon-user"></span></div>
    <div class="pagetitle">
        <h5>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'All Features Summary'}
                        {$val.rField}
                    {/if}
                {/foreach}</h5>

        <h1>
            {if $data['user_info']['iRoleId'] eq '1'}
                {foreach from=$lang item=val}
                    {if $val.rLabelName == 'Administrator'}
                        {$val.rField}
                    {/if}
                {/foreach}
            {else}
                {foreach from=$lang item=val}
                    {if $val.rLabelName == 'Client'}
                        {$val.rField}
                    {/if}
                {/foreach}
            {/if}
        </h1>
    </div>
</div>

<div class="maincontent">
<div class="maincontentinner">
<div class="row-fluid">
<div class="span12">
<!-- BEGIN EXAMPLE TABLE widget-->
<div class="widget purple">

<h4 class="widgettitle"><i class="icon-reorder"></i>
    {if $operation eq 'add'}
        {if $data['user_info']['iRoleId'] eq '1'}
            {foreach from=$lang item=val}
                {if $val.rLabelName == 'Add Administrator'}
                    {$val.rField}
                {/if}
            {/foreach}
        {else}
            {foreach from=$lang item=val}
                {if $val.rLabelName == 'Add Client'}
                    {$val.rField}
                {/if}
            {/foreach}
        {/if}
    {else}
        {if $data['user_info']['iRoleId'] eq '1'}
            {foreach from=$lang item=val}
                {if $val.rLabelName == 'Edit Administrator'}
                    {$val.rField}
                {/if}
            {/foreach}
        {else}
            {foreach from=$lang item=val}
                {if $val.rLabelName == 'Edit Client'}
                    {$val.rField}
                {/if}
            {/foreach}
        {/if}

    {/if}
</h4>
<span class="tools">
<a href="javascript:;" class=""></a>
<a href="javascript:;" class=""></a>
</span>

<div class="widget-body">

<div class="clearfix">
    <div class="btn-group" style="display:none;">
        <button id="editable-sample_new" class="btn green">
            {foreach from=$lang item=val}
                {if $val.rLabelName == 'Add New'}
                    {$val.rField}
                {/if}
            {/foreach} <i class="icon-plus"></i>
        </button>
    </div>
    <div class="btn-group pull-right" style="display:none;">
        <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i></button>
        <ul class="dropdown-menu pull-right" style="display:none;">
            <li><a href="#">Print</a></li>
            <li><a href="#">Save as PDF</a></li>
            <li><a href="#">Export to Excel</a></li>
        </ul>
    </div>
</div>
{if $data.message neq ''}
    <div class="alert alert-info">
        {$data.message}
    </div>
{/if}
<div class="space15"></div>
<!--BEGIN TABS-->
<div class="tabbable custom-tab">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1_1" data-toggle="tab">{foreach from=$lang item=val}
                {if $val.rLabelName == 'Info'}
                    {$val.rField}
                {/if}
            {/foreach} </a></li>
    {if $data['user_info']['iRoleId'] eq '2'}
        <!--<li><a href="#tab_1_2" data-toggle="tab">Fee Type</a></li>-->
        <li><a href="#tab_1_3" data-toggle="tab">Paypal Info</a></li>
    {/if}
</ul>

<div class="tab-content">
<div class="tab-pane active" id="tab_1_1">
    <form class="form-horizontal border-pad" action="{$data.base_url}administrator/{$data['mode']}" method="post">
        <input type="hidden" name="Data[iAdminId]" value="{$data.admin['iAdminId']}">

        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'First Name'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vFirstName" name="Data[vFirstName]"
                       value="{$data.admin['vFirstName']}"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Last Name'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vLastName" name="Data[vLastName]"
                       value="{$data.admin['vLastName']}"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Email'}
                        {$val.rField}
                    {/if}
                {/foreach} <span style="color:#ff0000;">*</span></label>

            <div class="controls">
                <input type="text" disabled="disabled" placeholder="" class="input-large" id="vEmail"
                       name="Data[vEmail]" value="{$data.admin['vEmail']}"/>
            </div>
        </div>
        <input type="hidden" placeholder="" class="input-large" id="vPassword" name="Data[vPassword]"
                          value="{$data.admin['vPassword']}" />
        {*<div class="control-group">*}
            {*<label class="control-label">{foreach from=$lang item=val}*}
                    {*{if $val.rLabelName == 'Password'}*}
                        {*{$val.rField}*}
                    {*{/if}*}
                {*{/foreach}</label>*}

            {*<div class="controls">*}
                {*{if $data['user_info']['iAdminId'] eq $data.admin['iAdminId'] && $data['user_info']['iRoleId'] eq 1 OR $data['user_info']['iRoleId'] eq 2 }*}
                    {*<input type="password" placeholder="" class="input-large" id="vPassword" name="Data[vPassword]"*}
                           {*value="{$data.admin['vPassword']}"/>*}
                {*{else}*}
                    {*<input type="password" disabled="disabled" placeholder="" class="input-large" id="vPassword"*}
                           {*name="Data[vPassword]" value="{$data.admin['vPassword']}"/>*}
                {*{/if}*}
            {*</div>*}
        {*</div>*}
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Contact Number'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <input maxlength="16" type="text" placeholder="" class="input-large" id="vPhone" name="Data[vPhone]"
                       value="{$data.admin['vPhone']}"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Address'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vAddress" name="Data[vAddress]"
                       value="{$data.admin['vAddress']}" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Zip'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vZipCode" name="Data[vZipCode]"
                       value="{$data.admin['vZipCode']}" maxlength="8"/>
            </div>
        </div>
        {if $data['user_info']['iRoleId'] eq 1}
            <div class="control-group">
                <label class="control-label">{foreach from=$lang item=val}
                        {if $val.rLabelName == 'Role'}
                            {$val.rField}
                        {/if}
                    {/foreach}</label>

                <div class="controls">
                    <select {if $data['user_info']['iAdminId'] eq $data.admin['iAdminId']} disabled{/if}
                            class="input-large m-wrap" tabindex="1" name="Data[iRoleId]" id="iRoleId"
                            onchange="return showhidexmlurl(this.value);" value="{$data.admin['iRoleId']}">
                        <option value="">---- Select Role ----</option>
                        {section name = i loop = $data.roles}
                            <option value="{$data.roles[i].iRoleId}" {if $data.roles[i].iRoleId eq $data.admin.iRoleId} selected="selected" {/if} >{$data.roles[i].vTitle}</option>
                        {/section}
                    </select>
                </div>
            </div>
        {/if}


        <!--<div class="control-group" id="xmlUrlData" style="display: none;">
            <label class="control-label">Xml Url</label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vXmlUrl" name="Data[vXmlUrl]"
                       value="{$data.admin['vXmlUrl']}"/>
            </div>
        </div> -->
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'State'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <!--<select class="input-large m-wrap" tabindex="1" id="iStateId" name="Data[iStateId]"
                        value="{$data.admin['iStateId']}">
                    <option value="">---- Select State ----</option>
                    {section name = i loop = $data.states}
                        <option value="{$data.states[i].iStateId}" {if $data.states[i].iStateId eq $data.admin.iStateId} selected="selected" {/if} >{$data.states[i].vState}</option>
                    {/section}
                </select>-->
		          <input type="text" name="Data[iStateId]" id="iStateId" value="{$data.admin.iStateId}" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'City'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <input type="text" placeholder="" class="input-large" id="vCity" name="Data[vCity]"
                       value="{$data.admin['vCity']}"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Status'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <select {if $data['user_info']['iAdminId'] eq $data.admin['iAdminId']} disabled{/if}
                        class="input-large m-wrap" tabindex="1" name="Data[eStatus]">
                    {section name=i loop=$eStatuses}
                        <option value="{$eStatuses[i]}"
                                {if $eStatuses[i] eq $data.admin.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
                    {/section}
                </select>
            </div>
        </div>


        <!-- change by mayur gajjar -->
        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Primary Language'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>

            <div class="controls">
                <select class="input-large m-wrap" tabindex="1" name="Data[eLanguage]">
                    <option value="rEnglish" {if $data.admin['eLanguage'] eq rEnglish}selected="selected"{/if}>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'English'}
                        {$val.rField}
                    {/if}
                {/foreach}
                    </option>
                    <option value="rFrench" {if $data.admin['eLanguage'] eq rFrench}selected="selected"{/if}>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'French'}
                        {$val.rField}
                    {/if}
                {/foreach}
                    </option>
                </select>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Currency'}
                        {$val.rField}
                    {/if}
                {/foreach}</label>
            <div class="controls">
                <select class="input-large m-wrap" tabindex="1" id="vCurrency" name="Data[vCurrency]" value="{$data.admin['vCurrency']}">
                    <option value="">{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Currency'}
                        {$val.rField}
                    {/if}
                {/foreach}</option>
                    {section name = i loop = $data.currencies}
                    <option value="{$data.currencies[i].currency_code}" {if $data.currencies[i].currency_code eq $data.admin.vCurrency} selected="selected" {/if} >{$data.currencies[i].currency_name} ( {$data.currencies[i].currency_code} )</option>
                    {/section}
                </select>
            </div>
        </div>


        <div class="form-actions">
            <button type="submit" class="btn btn-success" id="btn-save">
                {foreach from=$lang item=val}
                    {if $val.rLabelName == 'Save'}
                        {$val.rField}
                    {/if}
                {/foreach}</button>
            {if $data['user_info']['iRoleId'] eq '1'}
                <button type="button" class="btn" onclick="returnme()">{foreach from=$lang item=val}
                        {if $val.rLabelName == 'Cancel'}
                            {$val.rField}
                        {/if}
                    {/foreach}</button>
            {/if}
        </div>
    </form>
</div>
{if $data['user_info']['iRoleId'] eq '2'}
    <div class="tab-pane" id="tab_1_2">
        <a href="#" id="AddMoreFileBox" class="btn btn-info">Add More Field <i class="icon-plus"></i></a>

        <div class="space15"></div>
        <form class="form-horizontal" action="{$data.base_url}administrator/save_fee_onfo" method="post"
              id="fee_info_admin">
            <input type="hidden" name="iClientId" value="{$data.admin['iAdminId']}">

            <div class="control-group" id="InputsWrapper">
                {section name = i loop = $data.fee_info}
                    {$indx = $smarty.section.i.index + 1}
                    <div style=" margin: 0 0 5px;">
                        <input type="text" name="data[{$indx}][vFeetype]" id="name_{$indx}"
                               value="{$data.fee_info[i]['vFeetype']}" placeholder="Name">
                        <input type="text" name="data[{$indx}][fPrice]" id="price_{$indx}"
                               value="{$data.fee_info[i]['fPrice']}" placeholder="Price">
                        <a href="#" class="removeclass"><i class="icon-remove"></i></a>
                    </div>
                {/section}
                <div style=" margin: 0 0 5px;">
                    {if sizeof($data.fee_info) == 0}
                        <input type="text" name="data[0][vFeetype]" id="name_0" value="" placeholder="Name">
                        <input type="text" name="data[0][fPrice]" id="price_0" value="" placeholder="Price">
                    {/if}

                    <!--a href="#" class="removeclass"><i class="icon-remove"></i></a-->
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success" id="btn-save-fee">Save</button>
                {if $data['user_info']['iRoleId'] eq '1'}
                    <button type="button" class="btn" onclick="returnme()">Cancel</button>
                {/if}
            </div>
        </form>
    </div>
    <div class="tab-pane" id="tab_1_3">
        <form class="form-horizontal" action="{$data.base_url}administrator/save_paypal_onfo" method="post"
              id="paypal_info_admin">
            <input type="hidden" name="iPaypalinfoId" value="{$data.paypal_info['iPaypalinfoId']}">
            <input type="hidden" name="Data[iClientId]" value="{$data.admin['iAdminId']}">

            <div class="control-group" style="display:none;">
                <label class="control-label">Username</label>

                <div class="controls">
                    <!--<input type="text" placeholder="Paypal Username" class="input-large" id="vPusername"
                           name="Data[vUsername]" value="{$data.paypal_info['vUsername']}"/>-->
                    <input type="text" placeholder="Paypal Username" class="input-large" id="vPusername"
                           name="Data[vUsername]" value="-"/>
                </div>
            </div>
            <div class="control-group" style="display:none;">
                <label class="control-label">Paypal Password</label>

                <div class="controls">
                    <!--<input type="text" placeholder="Paypal Password" class="input-large" id="vPpassword"
                           name="Data[vPassword]" value="{$data.paypal_info['vPassword']}"/>-->
                    <input type="text" placeholder="Paypal Password" class="input-large" id="vPpassword"
                           name="Data[vPassword]" value="-"/>
                </div>
            </div>
            <div class="control-group">
                <!--<label class="control-label">Paypal Signature</label>-->
                <label class="control-label">Paypal App Client ID (LIVE)</label>

                <div class="controls">
                    <input type="text" placeholder="Paypal Signature" class="input-large" id="vPsignature"
                           name="Data[vSignature]" value="{$data.paypal_info['vSignature']}" style="width: 450px;" />
                </div>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-success" id="btn-paypal_save">
                    Save
                </button>
                {if $data['user_info']['iRoleId'] eq '1'}
                    <button type="button" class="btn" onclick="returnme()">Cancel</button>
                {/if}
            </div>

            <!--                                     <div class="control-group">
                                                <label class="control-label">Payment Method</label>
                                                    <div class="controls" >
                                                        <select class="input-large m-wrap" tabindex="1" name="Data[eMethod]">
                                                            <option value="visa">Visa</option>
                                                            <option value="master">Master Card</option>
                                                            <option value="paypal">Paypal</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Name of card</label>
                                                <div class="controls">
                                                    <input type="text" placeholder="Name of card" class="input-large" id="vCity" name="Data[vCardname]" value=""/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Card Number</label>
                                                <div class="controls">
                                                    <input type="text" placeholder="" class="input-large" id="vCity" name="Data[vCardnumber]" value=""/>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Expiry</label>
                                                <div class="controls" >
                                                    <select class="input-large m-wrap" tabindex="1" name="Data[vMonth]">
                                                        <option value="">Month</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                    </select>
                                                    /
                                                    <select class="input-large m-wrap" tabindex="1" name="Data[vYear]">
                                                        <option value="">Year</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Security Code</label>
                                                <div class="controls">
                                                    <input type="text" placeholder="" class="input-large" id="vCode" name="Data[vCode]" value="" maxlength="4"/>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                 <button type="button" class="btn btn-success" id="btn-save">
                                                  Save</button>
                                                {if $data['user_info']['iRoleId'] eq '1'}
                                                    <button type="button" class="btn" onclick="returnme()">Cancel</button>
                                                {/if}
                                            </div>
         -->                                 </form>
    </div>
{/if}
</div>
</div>
<!--END TABS-->

</div>
</div>
<!-- END EXAMPLE TABLE widget-->
</div>
<!-- END PAGE CONTENT-->
</div>
<div class="footer">
    <div class="footer-left">
        <span>&copy; Carateam Ltd 2014</span>
    </div>
    <!--<div class="footer-right">
        <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>
    </div> -->
</div>
</div>
</div>
</div>


<!-- Code Comment By Alpesh Prajapati -->

<!--<div id="main-content">-->
<!-- BEGIN PAGE CONTAINER-->
<!--    <div class="container-fluid">-->
<!-- BEGIN PAGE HEADER-->
<!--        <div class="row-fluid">
            <div class="span12">-->
<!-- BEGIN THEME CUSTOMIZER-->
<!--<div id="theme-change" class="hidden-phone">
   <i class="icon-cogs"></i>
    <span class="settings">
        <span class="text">Theme Color:</span>
        <span class="colors">
        <span class="color-default" data-style="default"></span>
        <span class="color-green" data-style="green"></span>
        <span class="color-gray" data-style="gray"></span>
        <span class="color-purple" data-style="purple"></span>
        <span class="color-red" data-style="red"></span>
        </span>
    </span>
</div>-->
<!-- END THEME CUSTOMIZER-->
<!-- BEGIN PAGE TITLE & BREADCRUMB-->
<!--   <h3 class="page-title">
                 {if $data['user_info']['iRoleId'] eq '1'}
                    {foreach from=$lang item=val}
                     {if $val.rLabelName == 'Administrator'}
                        {$val.rField}
                     {/if}
                    {/foreach}
                 {else}
                    {foreach from=$lang item=val}
                     {if $val.rLabelName == 'Client'}
                        {$val.rField}
                     {/if}
                    {/foreach}
                 {/if}
                </h3>-->
<!-- END PAGE TITLE & BREADCRUMB -->
<!--   </div>-->
<!-- END PAGE HEADER-->
<!--  </div>-->
<!-- BEGIN PAGE CONTENT-->

<!-- END PAGE CONTAINER-->
<!--</div>-->

{literal}
<script>
    $(window).load(function () {
        var user_mode = '{/literal}{$data['mode']}{literal}';
        var user_role = '{/literal}{$data['admin']['iRoleId']}{literal}';
        if (user_role == '2' && user_mode == 'update') {
            $("#xmlUrlData").show();
        } else {
            $("#xmlUrlData").hide();
        }

    });
    $(document).ready(function () {

        var MaxInputs = 8; //maximum input boxes allowed
        var InputsWrapper = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton = $("#AddMoreFileBox"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount = '{/literal}{sizeof($data.fee_info)}{literal}'; //to keep track of text box added

        $(AddButton).click(function (e)  //on add input button click
        {
            if (x <= MaxInputs) //max input box allowed
            {
                FieldCount++; //text box added increment
                //add input box
                $(InputsWrapper).append('<div style=" margin: 0 0 5px;"><input type="text" name="data[' + FieldCount + '][vFeetype]" id="name_' + FieldCount + '" value="" placeholder="Name"/> <input type="text" name="data[' + FieldCount + '][fPrice]" id="price_' + FieldCount + '" value="" placeholder="Price"/> <a href="#" class="removeclass"><i class="icon-remove"></i></a>');
                x++; //text box increment
            }
            return false;
        });

        $("body").on("click", ".removeclass", function (e) { //user click on remove text
            //console.log('in'+x);
            //  if( x > 1 ) {
            $(this).parent('div').remove(); //remove text box
            // x--; //decrement textbox
            // }
            return false;
        })

    });
</script>
{/literal}

