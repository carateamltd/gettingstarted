<script type="text/javascript" src="{$data.base_js}administrator.js"></script>


 <div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="iconfa-user"></i></a> <span class="separator"></span></li>
            <li>{foreach from=$lang item=val}
                             {if $val.rLabelName == 'Administrator'}
                                {$val.rField}
                             {/if}
                           {/foreach}</li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	 {if $data['user_info']['iRoleId'] eq '1'}
                     <!--
                        Change By : Mayur Gajjar
                        Date : 30/7/2014
                        Chage : multilanguage 
                     -->
                    
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
                
                  <!--  <div class="widget-title">-->
                    <h4 class="widgettitle">
                    <i class="icon-reorder"></i>
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
                                 {if $val.rLabelName == 'Edit Clinet'}
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
                </div>
                <div class="widget purple">
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
                    <form class="form-horizontal" action="{$data.base_url}administrator/{$data['mode']}" method="post">
                        <input type="hidden" name="iAdminId" value="{$data.admin['iAdminId']}">  
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'First Name'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vFirstName" name="Data[vFirstName]" value="{$data.admin['vFirstName']}" minlength="2" maxlength="50"/>
                                </div>
                            </div>
                            <div class="control-group">
                                    <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Last Name'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vLastName" name="Data[vLastName]" value="{$data.admin['vLastName']}" minlength="2" maxlength="50"/>
                                    </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Email'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                <div class="controls">
                                    <input type="text" placeholder="" class="input-large" id="vEmail" name="Data[vEmail]" value="{$data.admin['vEmail']}" minlength="2" autocomplete="off" maxlength="50"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Password'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                <div class="controls">
                                    <input type="password" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 6 characters allowed" class="input-large" id="vPassword" name="Data[vPassword]" value="{$data.admin['vPassword']}" minlength="6" autocomplete="off" maxlength="50"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Contact Number'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                <div class="controls">
                                    <input maxlength="16" type="text" placeholder="" class="input-large" id="vPhone" name="Data[vPhone]" value="{$data.admin['vPhone']}" maxlength="50"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Address'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 150 characters allowed" class="input-large" id="vAddress" name="Data[vAddress]" value="{$data.admin['vAddress']}" minlength="2" maxlength="150"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Zipcode'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 8 characters allowed" class="input-large" id="vZipCode" name="Data[vZipCode]" value="{$data.admin['vZipCode']}" minlength="2" maxlength="8" />

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
                                    <select class="input-large m-wrap" tabindex="1" name="Data[iRoleId]" id="iRoleId" onchange="return showhidexmlurl(this.value);" value="{$data.admin['iRoleId']}">
                                        <option value="">---- Select Role ----</option>
                                        {section name = i loop = $data.roles}
                                            <option value="{$data.roles[i].iRoleId}" {if $data.roles[i].iRoleId eq $data.admin.iRoleId} selected="selected" {/if} >{$data.roles[i].vTitle}</option>
                                        {/section}
                                    </select>
                                </div>
                            </div>
                       {/if}
                       
                       
                       <div class="control-group" id="xmlUrlData"  style="display: none;">
                                <label class="control-label">Xml Url</label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vXmlUrl" name="Data[vXmlUrl]" value="{$data.admin['vXmlUrl']}" minlength="2" maxlength="50"/>

                                </div>
                            </div>                     
                            <!-- <div class="control-group">
                                <label class="control-label">Country</label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" tabindex="1" id="iCountryId" name="Data[iCountryId]" value="{$data.admin['iCountryId']}">
                                            <option value="">---- Select Country ----</option>
                                            {section name = i loop = $data.countries}
                                                <option value="{$data.countries[i].iCountryId}" {if $data.countries[i].iCountryId eq $data.admin.iCountryId} selected="selected" {/if} >{$data.countries[i].vCountry}</option>
                                            {/section}
                                    </select>
                                  </div>
                            </div>  -->      
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'State'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" tabindex="1" id="iStateId" name="Data[iStateId]">
                                            <option value="">---- Select State ----</option>
                                            {section name = i loop = $data.states}
                                            <option value="{$data.states[i].iStateId}" {if $data.states[i].iStateId eq $data.admin.iStateId} selected="selected" {/if} >{$data.states[i].vState}</option>
                                            {/section}
                                        </select>
                                    </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'City'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                <div class="controls">
                                    <input type="text" placeholder="" data-toggle="tooltip" data-placement="right" title="Max 50 and Min 2 characters allowed" class="input-large" id="vCity" name="Data[vCity]" value="{$data.admin['vCity']}" maxlength="50"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Status'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</label>
                                    <div class="controls" >
                                        <select class="input-large m-wrap" tabindex="1" name="Data[eStatus]">
                                            {section name=i loop=$eStatuses}
                                            <option value="{$eStatuses[i]}" {if $eStatuses[i] eq $data.admin.eStatus}selected="selected"{/if}>{$eStatuses[i]}</option>
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
            </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
        <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
                    </div>
                </div>
                </div>
                
            </div>
        </div>



<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
    <!--<div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
        <!--<div class="row-fluid">
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
            
                </h3>-->
                <!--ul class="breadcrumb">
                    <li>
                        <a href="{$data.base_url}home">Dashbosssard</a>
                        <span class="divider">/</span>
                    </li>
                {if $data['user_info']['iRoleId'] eq '1'}
                    <li><a href="{$data.base_url}administrator">
                        {if $data['user_info']['iRoleId'] eq '1'}
                           View  Administrator
                          {else}
                            View Client
                          {/if}
                    </a>
                    <span class="divider">/</span>
                </li>
                {/if}
                    <li class="current">
                    {if $operation eq 'add'}                       
                          {if $data['user_info']['iRoleId'] eq '1'}
                           Add  Administrator
                          {else}
                            Add Client
                          {/if}           
                    {else}                  
                          {if $data['user_info']['iRoleId'] eq '1'}
                           Edit  Administrator
                          {else}
                            Edit Client
                          {/if} 
                    
                    {/if}
                </li>
                    <li class="pull-right search-wrap">
                        <form action="search_result.html" class="hidden-phone">
                            <div class="input-append search-input-area">
                                <input class="" id="appendedInputButton" type="text">
                                <button class="btn" type="button"><i class="icon-search"></i> </button>
                            </div>
                        </form>
                    </li>
                </ul-->
            <!-- END PAGE TITLE & BREADCRUMB-->
           <!-- </div>-->
         <!-- END PAGE HEADER-->   
        <!--</div>-->
        <!-- BEGIN PAGE CONTENT-->
        <!--<div class="row-fluid">-->
              
    <!-- END PAGE CONTENT-->         
    <!--</div>-->
<!-- END PAGE CONTAINER-->
<!--</div>-->
    
{literal}
<script>
    $(window).load(function() {  
       var user_mode ='{/literal}{$data['mode']}{literal}';
      var user_role='{/literal}{$data['admin']['iRoleId']}{literal}';     
       if (user_role=='2' && user_mode=='update') {
            $("#xmlUrlData").show();
        }else{
          $("#xmlUrlData").hide();
       }
        $("#vEmail").val("");
        $("#vPassword").val("");
    });
    
</script>
{/literal}
    