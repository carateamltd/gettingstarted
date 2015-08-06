  <div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-gear"></i></a> <span class="separator"></span></li>
            <li>Edit Configuration </li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="icon-gear"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	 {foreach from=$lang item=val}
                         {if $val.rLabelName == 'Edit Configuration'}
                            {$val.rField}
                         {/if}
                    {/foreach}
               </h1>
            </div>
        </div>
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
                	<div class="span12">
                		<div class="widget purple">
                 
                    <h4 class="widgettitle">
                    <i class="icon-reorder"></i>
                       <!-- Change by Mayur Gajjar Date: 30/7/'14 (multilanguage) -->
                       {foreach from=$lang item=val}
                         {if $val.rLabelName == 'Edit Configuration'}
                            {$val.rField}
                         {/if}
                       {/foreach}
                     </h4>
					<span class="tools">
                        <a href="javascript:;" class=""></a>
                        <a href="javascript:;" class=""></a>
                    </span>
              
                <div class="widget-body">
                   
                        <div class="clearfix">
                            <div class="btn-group" style="display:none;">						  
                                <button id="editable-sample_new" class="btn green">
                                    Add New <i class="icon-plus"></i>
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
                    <div class="alert alert-info">{$data.message}</div>
                {/if}
                <!--
                    create :- maksudkhan
                    Date:-26-05-2014
                    Validation Check
                -->
                <div id="conf_validation" style="display:none;"></div>
                    <form class="form-horizontal border-pad" action="{$data.base_url}configuration/update" method="post">
                    <input type="hidden" name="data[iSettingId]" value="{$data.configurations.iSettingId}">  
                        <input type="hidden" name="iAdminId" value="{$data.admin['iAdminId']}">  
                            {section name=i loop=$db_config}
                            <div class="control-group">
                                <label class="control-label" style="cursor:default;">{foreach from=$lang item=val}
                         {if $val.rLabelName == $db_config[i]->tDescription}
                            {$val.rField}
                         {/if}
                       {/foreach}</label>
                                <div class="controls">
                                    {if $db_config[i]->vName eq 'TRANSACTION_MODE'}
                                        <input type="radio" placeholder="" class="input-large" id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" value="Yes" title="{$db_config[i]->tDescription}" {if $db_config[i]->vValue eq 'Yes'}checked{/if}/> Live
                                        <input type="radio" placeholder="" class="input-large" id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" value="No" title="{$db_config[i]->tDescription}" {if $db_config[i]->vValue eq 'No'}checked{/if}/> Testing
                                    {else}
                                        {if $db_config[i]->vName eq 'APP_PRICE'}
                                           GBP <input type="text" placeholder="" class="input-larges" id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" value="{$db_config[i]->vValue}" title="{$db_config[i]->tDescription}"/>
                                        {else}
                                            <input type="text" placeholder="" class="input-large" id="{$db_config[i]->vName}" name="Data[{$db_config[i]->vName}]" value="{$db_config[i]->vValue}" title="{$db_config[i]->tDescription}"/>
                                        {/if}
                                    {/if}
                                </div>
                            </div>
                           {/section}
                            <div class="form-actions">
                                 <button type="submit" class="btn btn-success" id="btn-save" onclick="return conf_save();">{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Save'}
                            {$val.rField}
                         {/if}
                       {/foreach}</button>
                            </div>
                    </form>
                 </div>
            </div>
           			</div>
                </div>
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
        
        <!-- Code Commented By Alpesh Prajapati --->
<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
    <!--<div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
        <!--<div class="row-fluid">-->
            <!--<div class="span12">
                <h3 class="page-title">
                	<!-- Change by Mayur Gajjar Date: 30/7/'14 (multilanguage) -->
			   <!--     {foreach from=$lang item=val}
                         {if $val.rLabelName == 'Edit Configuration'}
                            {$val.rField}
                         {/if}
                    {/foreach}-->
               <!-- </h3>
            </div>-->
         <!-- END PAGE HEADER-->   
       <!-- </div>-->
        <!-- BEGIN PAGE CONTENT-->
<!--        <div class="row-fluid">
            <div class="span12">-->
             	<!-- BEGIN EXAMPLE TABLE widget-->
                
         <!-- END EXAMPLE TABLE widget-->
      <!--  </div> --> 
    <!-- END PAGE CONTENT-->         
<!--    </div>
</div>-->
<!-- END PAGE CONTAINER-->
<!--</div>  -->