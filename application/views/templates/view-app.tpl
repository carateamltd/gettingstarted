  <div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li>{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Application'}
                        {$val.rField}
                     {/if}
                     <!--Dashboard-->
                   {/foreach}</li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5>{foreach from=$lang item=val}
                     {if $val.rLabelName == 'All Features Summary'}
                        {$val.rField}
                     {/if}
                     <!--Dashboard-->
                   {/foreach}</h5>
                <h1>
                	{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Application'}
                        {$val.rField}
                     {/if}
                     <!--Dashboard-->
                   {/foreach}
               </h1>
            </div>
        </div>
        <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">

        <div class="span12">
         <!-- BEGIN EXAMPLE TABLE widget-->
         <div class="widget purple">
                 <h4 class="widgettitle">
                 <i class="icon-reorder"></i> 
                 <!--
                        	Change by : Mayur Gajjar
                            Date : 30/7/2014
                            change : multilanguage
              -->
           {foreach from=$lang item=val}
           	 {if $val.rLabelName == 'Application'}
             	{$val.rField}
             {/if}
           	 <!--Dashboard-->
           {/foreach} </h4>
                <span class="tools">
                    <a href="javascript:;" class=""></a>
                    <a href="javascript:;" class=""></a>
                </span>

             <div class="widget-body">
                 <div>
                     <div class="clearfix">
                        <br>
                         <div class="btn-group">
                             <a href="#myModal" class="btn btn-primary" id="add_app" role="button" data-toggle="modal">
                             <!--
                                    Change by : Mayur Gajjar
                                    Date : 30/7/2014
                                    change : multilanguage
              				-->
                             {foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Add New'}
                                    {$val.rField}
                                 {/if}
                             {/foreach}  <i class="icon-plus"></i>
                             </a>
                         </div>
                         <div class="btn-group pull-right" style="display:none;">
                             <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                             </button>
                             <ul class="dropdown-menu pull-right">
                                 <li><a href="#">Print</a></li>
                                 <li><a href="#">Save as PDF</a></li>
                                 <li><a href="#">Export to Excel</a></li>
                             </ul>
                         </div>
                      </div>
                         {if $data.message neq ''}
                            <div class="alert alert-info offset4 span3">
                              {$data.message}
                            </div>
                         {/if}
                      <div class="space15">
                         <div class="span6">
                            <div class="span6 ">
                                {if $data.role|count gt 0 }
                                <p class="text-paging">{$data.paging_message}</p>
                                {/if}
                            </div>
                        </div></div>
                        <!--
                                    Change by : Mayur Gajjar
                                    Date : 30/7/2014
                                    change : multilanguage
              			-->
                        <table class="table table-striped table-hover table-bordered" id="editable-sample"> 
                        <thead>
                        <tr>
                            <th>{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'App Name'}
                                    {$val.rField}
                                 {/if}
                             	{/foreach}
                             </th>
                            <th>{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'App Code'}
                                    {$val.rField}
                                 {/if}
                             	{/foreach}
                            </th>
                            <th>{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Client Name'}
                                    {$val.rField}
                                 {/if}
                             	{/foreach}
                            </th>
                            <!--<th>{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'App IconName'}
                                    {$val.rField}
                                 {/if}
                             	{/foreach}
                            </th> -->
                            <th style="text-align:center;">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Status'}
                                    {$val.rField}
                                 {/if}
                             	{/foreach}</th>
                            <th style="text-align:center;">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Edit'}
                                    {$val.rField}
                                 {/if}
                             	{/foreach}</th>
                            <th style="text-align:center;">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Delete'}
                                    {$val.rField}
                                 {/if}
                             	{/foreach}</th>
                        </tr>
                        </thead>
                        <tbody>
                        {if $data.appinformation}
                        {section name = i loop = $data.appinformation}
                        <tr class="">
                            <td>{$data.appinformation[i].tAppName}</td>
                            <td>{$data.appinformation[i].vApplicationCode}</td>
                            <td>{$data.appinformation[i].vFirstName} {$data.appinformation[i].vLastName}</td>
                            <!-- <td>{$data.appinformation[i].tAppIconName}</td> -->
                            <td style="text-align:center">{foreach from=$lang item=val}
                                 {if $val.rLabelName == $data.appinformation[i].eStatus}
                                    {$val.rField}
                                 {/if}
                                {/foreach}</td>
                            <td style="text-align:center !important;">
                            <a href="{$data.base_url}app/step2/{$data.appinformation[i].iApplicationId}" data-toggle="modal">
                                <i title="Edit" class="icon-pencil helper-font-24"></i></a>
                            </td>
                            <td style="text-align:center !important;"><a href="" onclick="delete_app('{$data.base_url}','{$data.appinformation[i].iApplicationId}');" data-toggle="modal">
                                <i title="Delete" class="icon-trash helper-font-24"></i></a>
                            </td>

                            <!-- Made Changes by : Sagar 19-5-2014 -->

                            <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3>{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Confirm Delete'}
                                    {$val.rField}
                                 {/if}
                                {/foreach}</h3>
                                  </div>
                                  <div class="modal-body">
                                    {foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Are you sure'}
                                    {$val.rField}
                                 {/if}
                                {/foreach}?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Close'}
                                    {$val.rField}
                                 {/if}
                                {/foreach}</button>
                                    <a href="" id="mylink"><button type="button" class="btn btn-primary">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Delete'}
                                    {$val.rField}
                                 {/if}
                                {/foreach}</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>

                           <!-- End -->
                        
                        </tr>
                        {/section}
                        {else}
                        <tr class="row1a"><td colspan="7" style="text-align:center;">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'No application found'}
                                    {$val.rField}
                                 {/if}
                              {/foreach}</td></tr>
                        {/if}
                        </tbody>
                        </table>
                        
                        <div class="pagination">
                           {$data.create_links}
                        </div>  
                 </div>
             </div>
         </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
    </div>
    <br /><br /><br /><br /><br /><br /><br />
    <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                       <!-- <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="myModalLabel">
     {foreach from=$lang item=val}{if $val.rLabelName == 'Pick Your'}{$val.rField}{/if}{/foreach}
    </h3>
  </div>
  <br>
<div id="err"></div>
<form name="save_app_feature" id="save_app_feature" action="{$data.base_url}app/save_app_feature" method="POST">
  <div class="modal-body">
   <div class="toptab">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <input type="hidden" name="language" id="language" value="{$data.mylang}" />
  <tr>
    <th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Industry'}{$val.rField}{/if}{/foreach}</strong> &nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />{foreach from=$lang item=val}{if $val.rLabelName == 'Select industry'}{$val.rField}{/if}{/foreach}</span></a></th>
    <th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Enter app name'}{$val.rField}{/if}{/foreach}</strong> &nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />{foreach from=$lang item=val}{if $val.rLabelName == 'Enter app name'}{$val.rField}{/if}{/foreach}</span></a></th>
    <!--<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Enter app icon name'}{$val.rField}{/if}{/foreach}</strong> &nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />{foreach from=$lang item=val}{if $val.rLabelName == 'Enter app icon name'}{$val.rField}{/if}{/foreach}</span></a></th>-->
    <!--<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Select App Contact Email'}{$val.rField}{/if}{/foreach}</strong>&nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />{foreach from=$lang item=val}{if $val.rLabelName == 'Enter ContactEmail'}{$val.rField}{/if}{/foreach}</span></a></th>-->
	
	

  </tr>
  <tr>
    <td valign="top">  
      <select class="indst" id="industry" name="appinformation[iIndustryId]">
        <option value="">{foreach from=$lang item=val}{if $val.rLabelName == 'Select App Industry'}{$val.rField}{/if}{/foreach}</option>
         {section name = i loop = $data.appindustry}
          <option value="{$data.appindustry[i].iIndustryId}">
            {foreach from=$lang item=val}{if $val.rLabelName == {$data.appindustry[i].vTitle}}{$val.rField}{/if}{/foreach}
          </option>
        {/section}
      </select>
    </td>
    <td><input class="indst" type="text"  maxlength="30" value="" size="30" id="app_name" name="appinformation[tAppName]"></td>
    <!--<td valign="top">
      <input class="indst" type="text"  maxlength="55" value="" size="30" id="contact_email" name="appinformation[vContactEmail]">
    </td>-->
    <!--<td><input class="indst" type="text" maxlength="20" value="" size="30" id="app_icon" name="appinformation[tAppIconName]"></td> -->
  </tr>
  
  {if $data['user_info']['iRoleId'] eq 1}
     <tr>
      <th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Select App Client'}{$val.rField}{/if}{/foreach}</strong>&nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />{foreach from=$lang item=val}{if $val.rLabelName == 'Select client'}{$val.rField}{/if}{/foreach}</span></a></th>
       <!--<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Select App Contact Email'}{$val.rField}{/if}{/foreach}</strong>&nbsp;<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />{foreach from=$lang item=val}{if $val.rLabelName == 'Select Client'}{$val.rField}{/if}{/foreach}</span></a></th>-->
     </tr>
     <tr>
      <td valign="top">
            <select class="indst" id="app_client" name="appinformation[iClientId]">
                 <option value="">{foreach from=$lang item=val}{if $val.rLabelName == 'Select Client'}{$val.rField}{/if}{/foreach}</option>
                  {section name = i loop = $data['allClientList']}
                      <option value="{$data['allClientList'][i]['iAdminId']}">{$data['allClientList'][i]['vFirstName']} {$data['allClientList'][i]['vLastName']}</option>
                 {/section}
            </select>
    </td>
   <!-- <td><input class="indst" type="text"  maxlength="55" value="" size="30" id="contact_email" name="appinformation[vContactEmail]"></td> -->
     </tr>
    {else}
    <input type="hidden" name="appinformation[iClientId]" value="{$data['user_info']['iAdminId']}"> 
  {/if}   
   
</table>

    </div>
    
    <div class="midparttp">
        <div class="midleft">
      <fieldset>
        <legend>{foreach from=$lang item=val}{if $val.rLabelName == 'Recommended'}{$val.rField}:{/if}{/foreach}</legend>
        <div class="innerlft" id="inlft">
        </div>
       </fieldset>
    </div>
    <!--<div class="midright">
      <fieldset>
        <legend>{foreach from=$lang item=val}{if $val.rLabelName == 'Optional'}{$val.rField}:{/if}{/foreach}</legend>
        <div class="innercont">

        </div> 
       </fieldset>
    </div> -->
    </div>
  </div>
</form>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary" id="save_feature">
    {foreach from=$lang item=val}{if $val.rLabelName == 'Save Feature & Continue'}{$val.rField}{/if}{/foreach}</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}{$val.rField}{/if}{/foreach}</button>
  </div>
</div>
  </div>    
        

<!--<div id="main-content">-->
 <!-- BEGIN PAGE CONTAINER-->
 <!--<div class="container-fluid">-->
    <!-- BEGIN PAGE HEADER-->   
 <!--   <div class="row-fluid">
       <div class="span12">-->
           <!-- BEGIN THEME CUSTOMIZER-->
           <!--div id="theme-change" class="hidden-phone">
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
           </div-->
          <!-- END THEME CUSTOMIZER-->
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
       <!--    <h3 class="page-title">-->
             <!--
                        	Change by : Mayur Gajjar
                            Date : 30/7/2014
                            change : multilanguage
              -->
           
        <!--   </h3>-->
           <!--ul class="breadcrumb">
               <li>
                   <a href="{$data.base_url}home">Dashboard</a>
                   <span class="divider">/</span>
               </li>
               <li class="active">
                   Application
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
     <!--  </div>
    </div>-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    
    

            <!-- END EDITABLE TABLE widget-->
    <!-- END PAGE CONTENT-->         
<!-- </div>-->
 <!-- END PAGE CONTAINER-->
<!--</div>-->


<!-- Modal -->

{literal}
<script>
    $(window).load(function() {  
      var user_warning='{/literal}{$data['warning']}{literal}';
       if(user_warning == '1')
       {
            $("#deleteMessage").html( "<p>You do not have sufficient privileges to access this page.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
       if(user_warning == 'delete')
       {
            $("#deleteMessage").html( "<p>The record which you are trying to access has been already deleted.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
    });
</script>
{/literal}
