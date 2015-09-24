<script type="text/javascript" src="{$data.basedatatable_js}administrator_listing.js"></script>
<script type="text/javascript" src="{$data.basedatatable_js}common.js"></script>

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
                	{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Administrator'}
                        {$val.rField}
                     {/if}
                   {/foreach}
               </h1>
            </div>
        </div>
        
      <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">  
        <form name="frmlist" id="frmlist" action="{$data.base_url}administrator/action_update" method="post">
  			<input type="hidden" name="action" id="action">
		    <div class="row-fluid">
		        <div class="span12">
		         <!-- BEGIN EXAMPLE TABLE widget-->
                 
               <h4 class="widgettitle">
               		<i class="icon-reorder"></i>
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
               </h4>
               <span class="tools">
		                    <a href="javascript:;" class=""></a>
		                    <a href="javascript:;" class=""></a>
		                </span>
		        <div class="widget purple">
		           <!-- <div class="widget-title">
		                <h4>
					   
					 
					 </h4>
		                
					</div>-->
		        <div class="widget-body">
		        	<div class="clearfix">
			            <div class="btn-group">
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
		            <div class="alert alert-info offset4 span4">
		               {$data.message}
		            </div>
		        {/if}            
		       <div class="space15">
                    <div class="pull-right">
	                    <button type="submit" id="btn-active" class="btn btn-primary btn-rounded" onclick="check_all" >{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Make Active'}
                        {$val.rField}
                     {/if}
                   {/foreach}</button>
	                    <button type="submit" id="btn-inactive" class="btn btn-primary btn-rounded">
	                    	{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Make Inactive'}
                        {$val.rField}
                     {/if}
                   {/foreach}
                   </button>
	                    <a href="{$admin_url}administrator/create" class="btn btn-primary btn-rounded">{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Add New'}
                        {$val.rField}
                     {/if}
                   {/foreach}<i class="icon-plus"></i></a>
	                    <button type="submit" id="btn-delete" class="btn btn-primary btn-rounded">
	                    {foreach from=$lang item=val}
                     {if $val.rLabelName == 'Delete'}
                        {$val.rField}
                     {/if}
                   {/foreach}</button>
                    </div>
                </div>
		    <table class="table table-striped table-bordered" id="AdminlistId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th width="1%" style="text-align:center;"><input type="checkbox" id="check_all" name="check_all"></th>
                        <th width="25%" style="text-align:center;">
							{foreach from=$lang item=val}
							{if $val.rLabelName == 'Name'}
							{$val.rField}
							{/if}
							{/foreach}
						</th>
                        <th width="29%" style="text-align:center;">
                        	{foreach from=$lang item=val}
							{if $val.rLabelName == 'Email'}
							{$val.rField}
							{/if}
							{/foreach}</th>
                        <th width="20%" style="text-align:center;">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Phone'}
                        	{$val.rField}
                        {/if}
                        {/foreach}
                        	</th>
                        <th width="10%" style="text-align:center;">
                        	{foreach from=$lang item=val}
                        		{if $val.rLabelName =='Role'}
                        		{$val.rField}
                        		{/if}
                        	{/foreach}
                        	</th>
                        <th width="9%" style="text-align:center;">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Status'}
                        	{$val.rField}
                        {/if}
                        {/foreach}</th>
                        <th width="6%" style="text-align:center;">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Edit'}
                        	{$val.rField}
                        {/if}
                        {/foreach}</th>
                        <!-- 
<th width="2%" style="text-align:center;">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Delete'}
                        	{$val.rField}
                        {/if}
                        {/foreach}</th>
 -->
                    </tr>
                    {foreach from=$data.user_list item=val}
						<tr>
							<td style="text-align:center;background: none !important;"><input type="checkbox" id="check_admin{$val.iAdminId}" name="iId[]" value="{$val.iAdminId}"></td>
							<td style="text-align:center;background: none !important;">{$val.vFirstName} {$val.vLastName}</td>
							<td style="text-align:center;background: none !important;">{$val.vEmail}</td>
							<td style="text-align:center;background: none !important;">{$val.vPhone}</td>
							<td style="text-align:center;background: none !important;">{$val.vTitle}</td>
							<td style="text-align:center;background: none !important;">{$val.eStatus}</td>
							<td style="text-align:center;background: none !important;">
								<a href="{$admin_url}administrator/edituser/{$val.iAdminId}" data-toggle="modal">
                                	<i title={foreach from=$lang item=val}
                        				{if $val.rLabelName == 'Edit'}
                        					{$val.rField}
                        				{/if}
                        			{/foreach} class="icon-pencil helper-font-24"></i>
                                </a>
                            </td>
                            <!-- 
<td style="text-align:center;">
								<a href="#" data-toggle="modal">
                                	<i title={foreach from=$lang item=val}
                        				{if $val.rLabelName == 'Delete'}
                        					{$val.rField}
                        				{/if}
                        			{/foreach} class="icon-trash helper-font-24"></i>
                                </a>
                            </td>
 -->
						</tr>
					{/foreach}
                </thead>
            </table>         
		        <!-- END EXAMPLE TABLE widget-->
			</div>   
			<!-- END PAGE CONTENT-->         
</div>
		</div>
		</div>
	</form>
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
  
    
    	 <br /><br /><br /><br /><br /><br /><br />
                </div>
                <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>-->
                    </div>
                </div>
    </div>
  </div>
<!--<div id="main-content">-->
	<!-- BEGIN PAGE CONTAINER-->
<!-- 	<div class="container-fluid">-->
	    <!-- BEGIN PAGE HEADER-->   
	    <!--<div class="row-fluid">
	        <div class="span12">-->
	            <!-- BEGIN THEME CUSTOMIZER-->
	           <!-- <div id="theme-change" class="hidden-phone">
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
	<!--	        <h3 class="page-title">
		            {foreach from=$lang item=val}
                     {if $val.rLabelName == 'Administrator'}
                        {$val.rField}
                     {/if}
                   {/foreach}
		        </h3>-->
			        <!--ul class="breadcrumb">
			            <li>
			                <li>
			                    <a href="{$data.base_url}home">Dashboard</a>
			                    <span class="divider">/</span>
			                </li>
			            </li>
			            <li class="active">
			             
						  {if $data['user_info']['iRoleId'] eq '1'}
						   Administrator
						  {else}
							Client
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
	    <!--   	</div>-->
	    <!-- END PAGE HEADER-->  	
	  <!--  </div>-->
		 	<!-- BEGIN PAGE CONTENT-->
	<!--	 	<form name="frmlist" id="frmlist" action="{$data.base_url}administrator/action_update" method="post">
  			<input type="hidden" name="action" id="action">
		    <div class="row-fluid">
		        <div class="span12">-->
		         <!-- BEGIN EXAMPLE TABLE widget-->
		        <!--<div class="widget purple">
		            <div class="widget-title">
		                <h4><i class="icon-reorder"></i>
					    {if $data['user_info']['iRoleId'] eq '1'}
						  {foreach from=$lang item=val}
                     {if $val.rLabelName == 'Administrator'}
                        {$val.rField}
                     {/if}
                   {/foreach}r
						  {else}
							{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Client'}
                        {$val.rField}
                     {/if}
                  {/foreach}
						  {/if}	
					   
					 
					 </h4>
		                <span class="tools">
		                    <a href="javascript:;" class=""></a>
		                    <a href="javascript:;" class=""></a>
		                </span>
					</div>
		        <div class="widget-body">
		        	<div class="clearfix">
			            <div class="btn-group">
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
                    <div class="pull-right">
	                    <button type="submit" id="btn-active" class="btn green" onclick="check_all" >{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Make Active'}
                        {$val.rField}
                     {/if}
                   {/foreach}</button>
	                    <button type="submit" id="btn-inactive" class="btn green">
	                    	{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Make Inactive'}
                        {$val.rField}
                     {/if}
                   {/foreach}
                   </button>
	                    <a href="{$admin_url}administrator/create" class="btn green">{foreach from=$lang item=val}
                     {if $val.rLabelName == 'Add New'}
                        {$val.rField}
                     {/if}
                   {/foreach}<i class="icon-plus"></i></a>
	                    <button type="submit" id="btn-delete" class="btn green">
	                    {foreach from=$lang item=val}
                     {if $val.rLabelName == 'Delete'}
                        {$val.rField}
                     {/if}
                   {/foreach}</button>
                    </div>
                </div>
		    <table class="table table-striped table-bordered" id="AdminlistId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th width="5%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                        <th width="20%">
							{foreach from=$lang item=val}
							{if $val.rLabelName == 'Name'}
							{$val.rField}
							{/if}
							{/foreach}
						</th>
                        <th width="20%">
                        	{foreach from=$lang item=val}
							{if $val.rLabelName == 'Email'}
							{$val.rField}
							{/if}
							{/foreach}</th>
                        <th width="15%">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Phone'}
                        	{$val.rField}
                        {/if}
                        {/foreach}
                        	</th>
                        <th width="10%">
                        	{foreach from=$lang item=val}
                        		{if $val.rLabelName =='Role'}
                        		{$val.rField}
                        		{/if}
                        	{/foreach}
                        	</th>
                        <th width="8%" style="text-align:center;">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Status'}
                        	{$val.rField}
                        {/if}
                        {/foreach}</th>
                        <th width="8%" style="text-align:center;">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Edit'}
                        	{$val.rField}
                        {/if}
                        {/foreach}</th>
                        <th width="10%" style="text-align:center;">
                        {foreach from=$lang item=val}
                        {if $val.rLabelName == 'Delete'}
                        	{$val.rField}
                        {/if}
                        {/foreach}</th>				    
                    </tr>
                </thead>
            </table>   -->      
		        <!-- END EXAMPLE TABLE widget-->
		<!--	</div>   -->
			<!-- END PAGE CONTENT-->         
<!--</div>
		</div>
		</div>
	</form>-->
<!--<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Confirm Delete</h3>
          </div>
          <div class="modal-body">
            Are you sure?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" id="mylink"><button type="button" class="btn btn-primary">Delete</button></a>
          </div>
        </div>
      </div>
    </div>-->

	<!--	</div>-->
	<!-- END PAGE CONTAINER-->

<!--</div>-->
{literal}
<style type="text/css">
a.deleteicon{color: #4E4E4E; text-decoration: none;}
</style>
{/literal}
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
