<div class="rightpanel">
	<ul class="breadcrumbs">	
		<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
		<li>
			{foreach from=$lang item=val}
				{if $val.rLabelName == 'Application'}
					{$val.rField}
				{/if}
			{/foreach}
		</li>
    </ul>
    <div class="pageheader">
        <div class="pageicon"><span class="icon-book"></span></div>
        <div class="pagetitle">
        	<h5>
        		{foreach from=$lang item=val}
                    {if $val.rLabelName == 'All Features Summary'}
                       {$val.rField}
                    {/if}
                {/foreach}
            </h5>
            <h1>
            	{foreach from=$lang item=val}
            		{if $val.rLabelName == 'Application'}
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
         				<div class="widget purple brdrnone"  >
             				<!-- <div class="widget-title">
             		    		<h4><i class="icon-reorder"></i> Application</h4>
               					<span class="tools">
                    				<a href="javascript:;" class="icon-chevron-down"></a>
                    				<a href="javascript:;" class="icon-remove"></a>
                				</span>
							</div> -->
             				<div class="widget-body" style="">
                 			<div>
                     		<!--div class="clearfix">
                         		<div class="btn-group">
                             		<a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
                                 		Add New <i class="icon-plus"></i>
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
                      		</div-->
                     
                     		<!--div class="space15">
                     			<div class="span6">
                        			<div class="span6 ">
                            			{if $data.role|count gt 0 }
                            				<p class="text-paging">{$data.paging_message}</p>
                            			{/if}
                        			</div>
                    			</div>
                    		</div-->
                        	<!--table class="table table-striped table-hover table-bordered" id="editable-sample">
                        		<thead>
                        			<tr>
                            			<th>Title</th>
                            			<th style="text-align:center;">Status</th>
                            			<th style="text-align:center;">Edit</th>
                            			<th style="text-align:center;">Delete</th>
                        			</tr>
                        		</thead>
								<tbody-->
								<!--
								{section name = i loop = $data.role}
									<tr class="">
										<td>{$data.role[i].vTitle}</td>
										<td style="text-align:center">{$data.role[i].eStatus}</td>
										<td style="text-align:center !important;"><a href="#" data-toggle="modal">
											<i title="Edit" class="icon-pencil helper-font-24"></i></a>
										</td>
										<td style="text-align:center !important;"><a href="#"  data-toggle="modal" >
											<i title="Delete"  class="icon-trash helper-font-24"></i></a>
										</td>
									</tr>
								{/section}
								-->
								<!--/tbody>
                        	</table-->
            				<div class="mainpartcont">
            					{include file="tab.tpl" }
            					<div class="tbdata">
            						<div class="progress progress-striped active" >
              							<div class="bar" style="width: 20%;"></div>
            						</div>
              						<div class="div_inner">
                          				<div class="box_grey dark dark_shadow clearall no-margin">
                          					<h2>
                          						{foreach from=$lang item=val}
                    								{if $val.rLabelName == 'App Tabs'}
                       									{$val.rField}
                     								{/if}
                     							{/foreach} 
												<!-- <a class="btn btn-primary fright" href="#myModal_add_btn" id="addtab" data-toggle="modal"> <img src="http://192.168.1.41/php/slb_new/assets/images/icon_plus.png" />&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i>  
                            					{foreach from=$lang item=val}
                            						{if $val.rLabelName == 'Add New Tab'}
                              							{$val.rField}
                            						{/if}
                            					{/foreach} </a> -->
                            				</h2> 
                          				</div> 
                          				{if $data.message neq ''}
                            				<div class="alert alert-info">
                                				{$data.message}
                            				</div>
                          				{/if}
                						<div class="new-dlg-container">
                            				<form name="buildwiz" method="post">
                              					<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped table-hover table-bordered" id="listItem">
                									<div id="tbl_msg"></div>
                                  					<tr class="nodrop">
                                    					<th style="text-align:center;" class="">#</th>
                                    					<th style="display: none;">
                                    						{foreach from=$lang item=val}
                                    							{if $val.rLabelName == 'Old'}
                                      								{$val.rField}
                                    							{/if}
                                    						{/foreach}
                                    					</th>
                                    					<th style="text-align:center;">
                                    						{foreach from=$lang item=val}
                                     							{if $val.rLabelName == 'Icon'}
                                        							{$val.rField}
                                     							{/if}
                                     						{/foreach}
                                     					</th>
                                    					<th style="text-align:center;">
                                    						{foreach from=$lang item=val}
                                     							{if $val.rLabelName == 'Active'}
                                        							{$val.rField}
                                     							{/if}
                                     						{/foreach}
                                     					</th>
                                    					<th style="text-align:center;">
                                    						{foreach from=$lang item=val}
                                     							{if $val.rLabelName == 'Name'}
                                        							{$val.rField}
                                     							{/if}
                                     						{/foreach}
                                     					</th>
                                    					<th style="text-align:center;">
                                    						{foreach from=$lang item=val}
                                     							{if $val.rLabelName == 'Tab Function'}
                                        							{$val.rField}
                                     							{/if}
                                     						{/foreach}
                                     					</th>
                                    					<th style="text-align:center;" colspan="2">
                                    						{foreach from=$lang item=val}
                                     							{if $val.rLabelName == 'Action'}
                                        							{$val.rField}
                                     							{/if}
                                     						{/foreach}
                                     					</th>
                                  					</tr>
                                   					<tbody id="sortable1">
                                 						{section name = i loop = $data.selected_feature_details}
                                  							<tr class="row1a" id="recordsArray_{$data.selected_feature_details[i].iAppTabId}">
                                    							<td  style="text-align:center;"class="handle_tr icon"><!--{*SEQ*}-->
                                      								<img width="16" height="16" alt="move" src="{$data.base_image}icon_move.png" />
                                      							</td>
                                      							<!--
                                      								Name:- Hem
                                      								Date:- 16-jun
                                      								Des:- Add comment for console error-->
                                    							<!--<td width="6%" style="display: none;" class="center icon"><img src="{$data.base_image}01-refresh.png" /></td>-->
                                    							<td width="6%" style="text-align:center;" class="center icon">
                              										<img width="25" height="25" src="{$data.base_upload}tab_icon/{$data.selected_feature_details[i].iIconcolorId}/{$data.selected_feature_details[i].vImage}" />
                              									</td>
                                    							<td width="12%" style="text-align:center;"><!-- {$data.selected_feature_details[i].eActive} -->
                                    								{foreach from=$lang item=val}
                                    									{if $val.rLabelName == $data.selected_feature_details[i].eActive}
                                    										{$val.rField}
                                    									{/if}
                                    								{/foreach}
                                    							</td>
                                    							<td width="30%" style="text-align:center;">
                                    								{$checkName=0}
                                       								{foreach from=$lang item=val}
                                       									{if $val.rLabelName == $data.selected_feature_details[i].vTitle}
                                       										{$val.rField}
                                       										{$checkName=1}
                                       									{/if}
                                       								{/foreach}
                                       								{if $checkName==0}
                                       									{$data.selected_feature_details[i].vTitle}
                                       								{/if}
                                        						</td>
                                    							<td width="30%" style="text-align:center;">
                                    								<!-- {$data.selected_feature_details[i].default_vTitle} Tab -->
                                    								{foreach from=$lang item=val}
                                    									{if $val.rLabelName == $data.selected_feature_details[i].default_vTitle}
                                    										{$val.rField}
                                    									{/if}
                                    								{/foreach}
                                    							</td>
                                    							<td style="text-align:center;">
                                    								<a data-toggle="modal" href="#" onclick="edit_custom_tab('{$data.selected_feature_details[i].iAppTabId}','{$data['step']}');">
                                    									<i class="icon-pencil helper-font-24" title="Edit"></i>
                                    								</a>
                                    							</td>
                                    							<td style="text-align:center;">
                                    								<a data-toggle="modal" href="#" onClick=delete_tab({$data.selected_feature_details[i].iAppTabId},{$data.iApplicationId});>
                                     									<i class="icon-trash helper-font-24" title="Delete"></i>
                                     								</a>
                                     							</td>
                                  							</tr>
                                 						{/section}
                                					</tbody>
                              					</table>
                            				</form>
                  						</div>
                					</div>
            					</div>
            				</div>
            				<div style="clear:both;"></div>
                        	<div class="pagination">
                    			{$data.create_links}
                			</div>  
                 			</div>
             			</div>
         			</div>
         			<!-- END EXAMPLE TABLE widget-->
        		</div>
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
</div>
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    		<h3 id="myModalLabel">Pick Your App Features</h3>
  		</div>
  		<br>
		<div id="err"></div>
		<form name="save_app_feature" id="save_app_feature" action="{$data.base_url}app/save_app_feature" method="POST">
			<input type="hidden" value="{$data.iApplicationId}"  name="appinformation[iApplicationId]" id="iApplicationId">
  			<div class="modal-body">
   				<div class="toptab">
      				<table width="100%" border="0" cellspacing="0" cellpadding="0">
  						<tr>
    						<th align="left"><strong>Industry</strong> <span class="qmark">&nbsp;</span></th>
    						<th align="left"><strong>App Name</strong> <span class="qmark">&nbsp;</span></th>
    						<th align="left"><strong>App Icon Name</strong> <span class="qmark">&nbsp;</span></th>
  						</tr>
  						<tr>
    						<td>
      							<select class="indst" id="industry" name="appinformation[iIndustryId]">
        							<option value="">Select App Industry</option>
         							{section name = i loop = $data.appindustry}
          								<option value="{$data.appindustry[i].iIndustryId}">{$data.appindustry[i].vTitle}</option>
        							{/section}
      							</select>
    						</td>
    						<td><input class="indst" type="text" value="{$data.appinformation.tAppName}" size="30" id="app_name" name="appinformation[tAppName]"></td>
    						<td><input class="indst" type="text" maxlength="12" value="{$data.appinformation.tAppIconName}" size="30" id="app_icon" name="appinformation[tAppIconName]"></td>
  						</tr>
					</table>
				</div>
				<div class="midparttp">
        			<div class="midleft">
      					<fieldset>
        					<legend>Recommended:</legend>
        					<div class="innerlft" id="inlft">
        					</div>
       					</fieldset>
    				</div>
    				<div class="midright">
      					<fieldset>
        					<legend>Optional:</legend>
        					<div class="innercont"></div>
       					</fieldset>
    				</div>
    			</div>
			</div>
		</form>
  		<div class="modal-footer">
    		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    		<button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>
  		</div>
	</div>
	<!-- Modal -->
	<div id="myModal_add_btn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    		<h3 id="myModalLabel">{foreach from=$lang item=val}{if $val.rLabelName == 'New App Tab Details'}{$val.rField}:{/if}{/foreach}</h3>
  		</div>
  		<br>
  		<div id="erraddtab"></div>
  		<div class="modal-body">
    		<form name="frm_add_tab" id="frm_add_tab" method="POST" action="{$data.base_url}app/add_new_tab" enctype="multipart/form-data">
    			<input type="hidden" value="{$data.iApplicationId}"  name="data[iApplicationId]" id="iApplicationId">
    			<div class="toptab">
      				<table width="100%" border="0" cellspacing="0" cellpadding="0">
      					<tr>
        					<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Tab Title'}{$val.rField}:{/if}{/foreach}</strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Max 20 and Min 2 characters allowed</span></a>--></th>
        					<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Tab Function'}{$val.rField}:{/if}{/foreach}</strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />Select Function</span></a>--></th>
        					<th align="left"></th>
      					</tr>
      					<tr>
        					<td valign="top">
        						<input class="indst" type="text" data-placement="right" value="" size="20" minlength="2" id="icon_vTitle1" name="data[vTitle]">
							</td>
        					<td valign="top">
        						<select class="indst" id="icon_iFeatureId" name="data[iFeatureId]">
            						<option value="">
            							{foreach from=$lang item=val}
            								{if $val.rLabelName == 'Select Tab'}
            									{$val.rField}
            								{/if}
            							{/foreach}
            						</option>
             						{section name = i loop = $data.all_appindustryfeature}
             							{if ($data.flag == $data.all_appindustryfeature[i].iFeatureId)}
             							{else}
              								<option value="{$data.all_appindustryfeature[i].iFeatureId}">{foreach from=$lang item=val}{if $val.rLabelName == $data.all_appindustryfeature[i].vTitle}{$val.rField} Tab{/if}{/foreach}
              								</option>
             							{/if}
             						{/section}
          						</select>   
							</td>
        					<td valign="top">
        						<input type="hidden" value="No"  name="data[eActive]">
        						<input class="indst" type="checkbox" maxlength="12" value="Yes" size="30"  name="data[eActive]" checked>
        						{foreach from=$lang item=val}
        							{if $val.rLabelName == 'Active'}
        								{$val.rField}
        							{/if}
        						{/foreach} Tab
        					</td>
      					</tr>
      				</table>
    			</div>
				<div class="midparttp">
					<strong>
						{foreach from=$lang item=val}
							{if $val.rLabelName == 'Tab Icon'}
								{$val.rField}:
							{/if}
						{/foreach}
					</strong> &nbsp;
					<a class="tooltip_text" href="javascript:void(0);">
						<img src="{$data.base_image}quaton_icon.png" align="absmiddle"/>
						<span>
							<img class="callout_text" src="{$data.base_image}callout.gif" /> Select icon
						</span>
					</a>
					<br>
    				<input type="file" value=""  name="vImage" onchange="CheckValidFile(this.value,'add_tab_img');" id="add_tab_img">
    				<br>
    				<br>
    				<input type="hidden" value=""  name="data[iIconId]" id="eiIconId">
    				<div class="icon_img_box">
      					{section name = i loop = $data.all_icons}
        					<img  src="{$data.base_upload}tab_icon/{$data.default_icon.iIconcolorId}/{$data.all_icons[i].vImage}" onclick="eselect_tab_icon({$data.all_icons[i].iIconId});" id="eticon-{$data.all_icons[i].iIconId}" class="ticonimage"/>
      					{/section}
    				</div>
    			</div>
    		</form>
    	</div>
    	<div class="modal-footer">
    		<button type="button" class="btn btn-primary" id="saveIcons" onclick="return saveappicons();">{foreach from=$lang item=val}{if $val.rLabelName == 'Save Changes'}{$val.rField}{/if}{/foreach}</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="clearerror();">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}{$val.rField}{/if}{/foreach}</button>
		</div>
	</div>
	
	<!-- Made Changes by : Sagar 19-5-2014 -->
	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        			<h3  id="myModalLabel">{foreach from=$lang item=val}{if $val.rLabelName == 'Confirm Delete'}{$val.rField}{/if}{/foreach}</h3>
      			</div>
      			<div class="modal-body">
        			Are you sure?
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">
        				{foreach from=$lang item=val}
        					{if $val.rLabelName == 'Close'}
        						{$val.rField}
        					{/if}
        				{/foreach}
        			</button>
        			<a href="" id="mylink">
        				<button type="button" class="btn btn-primary">
        					{foreach from=$lang item=val}
        						{if $val.rLabelName == 'Delete'}
        							{$val.rField}
        						{/if}
        					{/foreach}
        				</button>
        			</a>
      			</div>
    		</div>
  		</div>
	</div>
	<!-- End -->

	<!-- Modal -->
	<div id="myModal_edit_btn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    		<h3 id="myModalLabel">{foreach from=$lang item=val}{if $val.rLabelName == 'Edit App Tab Details'}{$val.rField}{/if}{/foreach}</h3>
  		</div>
  		<br>
  		<div id="validation"></div>
  		<div id="erraddtab2"></div>
  		<div class="modal-body" id="edit_tab_btn">  
		</div>
  		<div class="modal-footer">
    		<button type="button" class="btn btn-primary" id="update_icon" onclick="return editsaveappicons();">{foreach from=$lang item=val}{if $val.rLabelName == 'Save Changes'}{$val.rField}{/if}{/foreach}</button>
    		<button class="btn" data-dismiss="modal" aria-hidden="true" onclick="clearerror();">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}{$val.rField}{/if}{/foreach}</button>
		</div>
	</div>
		
	<!--<div id="main-content">-->
 		<!-- BEGIN PAGE CONTAINER-->
		<!-- <div class="container-fluid">-->
    	<!-- BEGIN PAGE HEADER-->   
   			<!-- <div class="row-fluid">
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
       				<!--    <h3 class="page-title"></h3>-->
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
      			<!-- </div>
    		</div>-->
    		<!-- END PAGE HEADER-->
    		<!-- BEGIN PAGE CONTENT-->
			<!--    <div class="row-fluid"></div>-->
			<!-- END EDITABLE TABLE widget-->
    		<!-- END PAGE CONTENT-->         
		<!-- </div>-->
 		<!-- END PAGE CONTAINER-->
	<!--</div>-->

	<!-- Modal -->

	{literal}
	<script>
		var tabcnt = {/literal}{sizeof($data.selected_feature_details)}{literal};
		if(tabcnt == 0)
		{
 			$('#myModal').modal('show');
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function()
		{
    		$("#icon_vTitle1").attr('maxlength','20');
    		$('#icon_vTitle1[data-toggle="tooltip"]').tooltip({
        		animated: 'fade',
        		placement: 'right',    
    		});
		});  
	</script>
	{/literal}