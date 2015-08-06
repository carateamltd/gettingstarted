<script type="text/javascript" src="{$data.base_js}notification.js"></script>
<script src="{$data.base_js}jquery.form.js"></script>

<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Push Notification'}
                            {$val.rField}
                         {/if}
                    {/foreach} </li>
    </ul>
    <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5>{foreach from=$lang item=val}
                         {if $val.rLabelName == 'All Features Summary'}
                            {$val.rField}
                         {/if}
                    {/foreach}</h5>
                <h1>
                	{foreach from=$lang item=val}
                         {if $val.rLabelName == 'Push Notification'}
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
             	<!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget purple">
           
                    <h4 class="widgettitle">
                    <i class="icon-reorder"></i>
                    {if $operation eq 'add'}				       						  						  			 {foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Create  Notification'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}						  
				    {else}				    
						{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Create  Notification'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}
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
							{/foreach} 
					<i class="icon-plus"></i>
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
				
				<!--action="{$data.base_url}notification/{$data['mode']}"-->
            <!--action="http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/notfiyfromXMl.php"-->
           <form class="form-horizontal" id="form_notification"   method="post" action="{$data.base_url}notification/save_notification">
			        <input type="hidden" name="iAdminId" value="{$data['user_info']['iAdminId']}">
					<input type="hidden" name="iApplicationId" value="{$data['user_applications'][i]['iApplicationId']}">
			        <!--<input type="hidden" name="XmlUrl" value="{$data['client_url']}">-->
					   
				    <div class="control-group">
                        <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Select Application'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}</label>
                                    <div class="controls">
								<select name="data[iApplicationId]" id="iApplicationId" onchange="return get_users()">
                                <option value="{$data['user_applications'][i]}">--{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Select Application'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}--</option>
                                {section name=i loop=$data['user_applications']}
                                        <option value="{$data['user_applications'][i]['iApplicationId']}">{$data['user_applications'][i]['tAppName']}</option>
                                {/section}                                  
                                </select>                                     
                            </div>
                        </div>			   
					     
                        <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                             {if $val.rLabelName == 'Message'}
                                {$val.rField}
                             {/if}
                        {/foreach}</label>
                                <div class="controls">
                                    <textarea class="input-xxlarge" id="vMessage" rows="3" name="message"></textarea>
                                </div>
                        </div>
							
						 <div class="control-group">
                                <label class="control-label">{foreach from=$lang item=val}
                             {if $val.rLabelName == 'TabName'}
                                {$val.rField}
                             {/if}
                        {/foreach}</label>
                                <div class="controls">
                                   <select name="data[tabname]" id="tabname">
								   <option value="{$data['user_applications'][i]}">--{foreach from=$lang item=val}
                             {if $val.rLabelName == 'Select Application'}
                                {$val.rField}
                             {/if}
                        {/foreach}--</option>
								    {section name=i loop=$data['tabname']}
								   		<option value="{$data['tabname'][i]['iFeatureId']}">{$data['tabname'][i]['vTitle']}</option>
									{/section} 
								   </select>
                                </div>
                        </div>
							
                            <div class="control-group">
                                    <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Type'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" value="Individual" id="Individual">
                                            {foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Individual'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}
                                        </label>
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" value="Group" id="Group" >
                                           {foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Group'}
                                    {$val.rField}
                                 {/if}
                            {/foreach} 
                                        </label>
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" value="All" id="All">
                                            All
                                        </label>
                                    </div>
					   </div>
					   
					    <div class="control-group" style="display: none;" id="group_names">
						<label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Group Name'}
                                    {$val.rField}
                                 {/if}
                            {/foreach} </label>
						<div class="controls">
						<select name="group_name" id="group">
							<option value="{$data['all_group'][i]}">--{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Select Group Name'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}--</option>
							{section name=i loop=$data['all_group']}
							<option value="{$data['all_group'][i]}">{$data['all_group'][i]}</option>
							{/section}
							
						</select>
						</div>
                       </div>
					   
					    <div class="control-group" style="display: none;" id="individual_names">
                            <label class="control-label">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Individual'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}</label>
                                <div class="controls">
                                    <select name="data[individual_name]" id="individual">
							 	       <option value="">--{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Select Individual Name'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}--</option>
								    {section name=i loop=$data['all_individuals']}
								        <option value="{$data['all_individuals'][i]['iUserId']}">{$data['all_individuals'][i]['vDevicename']}</option>
								    {/section}								    
								    </select>

                                </div>
                        </div>
					   
					    <div class="form-actions">
                                    <button type="button" class="btn btn-primary" id="send_notification" >{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Send'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}</button>
									 <button type="button" class="btn btn-primary"  onclick="return returnme();">{foreach from=$lang item=val}
                                 {if $val.rLabelName == 'Cancel'}
                                    {$val.rField}
                                 {/if}
                            {/foreach}</button>
                            </div>
					   
					   
                            
                    </form>
                 </div>
            </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>  
    <!-- END PAGE CONTENT-->         
    
            
          
            
            <div class="clearfix"></div>
			<br /><br /><br /><br /><br /><br /> <br /> <br /><br /> <br /> <br /> <br />
               </div>   <div class="footer">
                	  <div class="footer-left">
                        <span>Copyright &copy; 2014 Easy Apps All rights reserved.</span>
                    </div>
                    <div class="footer-right">
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
                    </div>
                </div>
    </div></div>
            
<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
    <!--<div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
     <!--   <div class="row-fluid">
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
         <!--       <h3 class="page-title">
			 
			  
              
			 
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
        <!--    </div>-->
         <!-- END PAGE HEADER-->   
        <!--</div>-->
        <!-- BEGIN PAGE CONTENT-->
        
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
	  
    });
    
</script>
{/literal}
    
