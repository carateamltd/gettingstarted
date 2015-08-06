<script src="{$data.base_js}jquery.form.js"></script>
{include file="set_default_background_image_popup.tpl"}

<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li>{foreach from=$lang item=val}
                    {if $val.rLabelName == 'Application'}
                       {$val.rField}
                     {/if}
                     {/foreach}</li>
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
         <div class="widget purple brdrnone">
             <!--div class="widget-title">
                 <h4><i class="icon-reorder"></i> Application</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>

             </div-->
             <div class="widget-body">
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
                    </div></div-->
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
	{include file="tab.tpl"}
	<div class="tbdata">
		<div class="progress progress-striped active" >
			<div class="bar" style="width:100%;"></div>
		</div>
		<div style="margin-left: 23px; width: 96%;display: none;" id="msg"><div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button></div></div>
		<div class="div_inner">
			{*if $data.paymentinfo.eStatus neq 'Completed'*}
			<!-- <a href="{$data.base_url}publish_app/{$data.iApplicationId}"> -->
				<!-- <button style="margin:0 2% 20px 0; float:right;width:150px; padding:10px 0;"  class="btn btn-primary" type="button" >Publish Your App</button> -->
			<!-- </a> -->
			{*/if*}
			{if $data.paymentmessage neq ''}
			<div class="alert alert-info">
				{$data.paymentmessage}
			</div>
			{/if}
			
				<div class="top_bord">
					<!--<img src="{$data.base_url}assets/images/app_icon.png" width="16" height="16"/>--><h1>{foreach from=$lang item=val}{if $val.rLabelName == 'App Information'}{$val.rField}{/if}{/foreach}</h1>
				</div>
				{if $data.message neq ''}
				<div class="alert alert-info">
					{$data.message}
				</div>
				{/if}
        		<form name="app_data" id="upate_appdata" method="post"  enctype="multipart/form-data" action="{$data.base_url}app/updateAppData">
					<input type="hidden" class="text_box_bg"  name="iApplicationId" value="{$data['iApplicationId']}" />
					<div id="msg"></div>
					
					<div class="midd_box_inner">
						<div class="name1"> <label class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Name'}{$val.rField}{/if}{/foreach}</a> 
						<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter your App Name. This is the title that shows up in the App Store and App Marketplace.(30 characters or less)</span></a>--></h4></label>
							<input type="text" class="text_box_bg" id="tAppName"  name="data[tAppName]" value="{$data['appinformation']['tAppName']}" />					   
						</div>
						
						<div class="name1"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Icon Name'}{$val.rField}{/if}{/foreach} <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> This will be displayed under your app icon on your users' homescreen on their device.(12 characters or less)</span></a> --></h4></label>
							<input type="text" class="text_box_bg"  id="tAppIconName" name="data[tAppIconName]" value="{$data['appinformation']['tAppIconName']}" />					   
						</div>
						
						<div class="name1"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Keywords'}{$val.rField}{/if}{/foreach} <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter keywords that describe your specific app.  Each keyword must be separated with a comma.  Avoid generic terms like 'music', charcter limit is 100.  These will be used for your iTunes App Store listing.</span></a> --></h4></label>
							<input type="text" class="text_box_bg" id="tAppKeywords"  name="data[tAppKeywords]" value="{$data['appinformation']['tAppKeywords']}" />			   
						</div>
						
						<div class="description_left"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Description'}{$val.rField}{/if}{/foreach}<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> This description will appear in the iTunes App Store/Google Play Store and must meet high standards. <br> Plain text only, no HTML.</span></a> --></h4></label>
							<textarea class="text_aera_style" id="tDescription" name="data[tDescription]" >{$data['appinformation']['tDescription']}</textarea>
						</div>
						
						<!-- <div class="description_right">
						<h3>Write BELOW in bullet point format, what useful features are included in your app? (List at least 5)</h3>
						<textarea class="text_aera_style"  ></textarea>
						</div> -->
						
						<div class="dts_btn">
							<lable class="btn btn-success" id="character-count">{if $data['appinformation']['tDescription']|@count gt 0}{$data['appinformation']['tDescription']|strlen} {else}'0'{/if}</lable>
							<lable id="content-msg" >{if $data['appinformation']['tDescription']|@strlen gt 249}Good. You have now enough content.{else}Description Insuffisante!{/if}</lable>
						</div>	
													  	
						<div class="name1"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'Contact Email'}{$val.rField}{/if}{/foreach}  <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> The contact email through which customers can reach to you.</span></a> --></h4></label>
							<input type="text" class="text_box_bg" id="vContactEmail"  name="data[vContactEmail]" value="{$data['appinformation']['vContactEmail']}" />
						</div>
						
						<div class="name1"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'Official Website'}{$val.rField}{/if}{/foreach} <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter the URL for your organization's website here.</span></a> --></h4></label>
							<input type="text" class="text_box_bg" id="vWebsite"  name="data[vWebsite]" value="{$data['appinformation']['vWebsite']}" />
						</div>
						
						<div class="name1"> 
						<label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Price'}{$val.rField}{/if}{/foreach} <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> You can set any price you want for your app, or you can give it away for free. <br>Most apps range from $0.99 - $4.99 </span></a> --></h4></label>
							<input type="text" class="text_box_bg" id="fPrice"  name="data[fPrice]" value="{if $data['appinformation']['fPrice'] neq ''}{$data['appinformation']['fPrice']}{else}{/if}" onkeypress="return isNumberKey(event);" />
						</div>
						
						<div class="radio_right">
							<h4 style="width:100%; float:left;" style="cursor:default;"><span style="float:left;">{foreach from=$lang item=val}{if $val.rLabelName == 'App Icon Gloss'}{$val.rField}{/if}{/foreach}</span><!--<a style="margin:0;" class="tooltip_text" href="javascript:void(0);">&nbsp;<img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Your app icon will show on users' phones and in the App Store/Marketplace. The corners will be rounded for  you.</span></a>--></h4>
							<div class="rdo">
								<label class="width50">
									<input type="radio" value="On"  {if $data['appinformation']['eAppIconGloss'] eq 'On'}checked{/if} class="onbtn_radi"  name="data[eAppIconGloss]"  onClick=  "change_layout('icon_time_box');"//>{foreach from=$lang item=val}{if $val.rLabelName == 'on'}{$val.rField}{/if}{/foreach}
								</label>
								<label class="width50">
									<input type="radio" value="Off" {if $data['appinformation']['eAppIconGloss'] eq 'Off'}checked{/if} class="onbtn_radi"  name="data[eAppIconGloss]"  onClick= "change_layout('icon_time_box');"/>
									{foreach from=$lang item=val}{if $val.rLabelName == 'off'}{$val.rField}{/if}{/foreach}
								</label>
							</div>
							<a  href="javascript:void(0);"> <img src="{$data.base_url}assets/images//app_icon_no.png" width="75" height="75" /></a>
						</div>
						<div class="save_chg"><button type="button" class="btn btn-primary" onclick="return saveappdata();" >{foreach from=$lang item=val}{if $val.rLabelName == 'Save App Changes'}{$val.rField}{/if}{/foreach}</button></div>
					</div>
				</form>
				
				<!--
					Developer Name : Mayur Gajjar
					Description : Add project details
					Date : 25/9/2014
				-->	
				<!-- new -->
			<div style="clear:both;">  </div>
      <div id="msg1"></div>
			<div class="top_bord">
				<h1>{foreach from=$lang item=val}{if $val.rLabelName == 'App Icon'}{$val.rField}{/if}{/foreach}</h1>
			</div>
			
			<form name="app_data" id="upate_appdata" method="post"  enctype="multipart/form-data" action="{$data.base_url}app/uploadAppicon">
				<input type="hidden" class="text_box_bg"  name="app_image" value="{$data['appinformation']['vImage']}" />
				<input type="hidden" class="text_box_bg"  name="ApplicationId" value="{$data['iApplicationId']}" />
				<div class="app_icon_new">
					<div class="name1" style="cursor:default;"> <h4>{foreach from=$lang item=val}{if $val.rLabelName == 'App Name'}{$val.rField}{/if}{/foreach}<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Your app icon will show on users' phones and in the App Store/Marketplace. The corners will be rounded for  you.</span></a>--></h4>
						<div class="inner_box_file"><input type="file"  name="icon" id="icon" accept="image/png" class="file_beauty" >
						<p class="label1">PNG: 1024 x 1024</p>
							<div class="upload_app_btn "> <button type="button " class="btn upload_app_btn btn-primary" onclick="return checkvalidation();">{foreach from=$lang item=val}{if $val.rLabelName == 'Upload App Icon'}{$val.rField}{/if}{/foreach}</button></div>
							</div>
						{if $data['appinformation']['vImage'] neq ''}
						<div class="radio_right btnicon">
						<img src="{$data.base_upload}app_icon/{$data['iApplicationId']}/{$data['appinformation']['vImage']}" width="75" height="75" />
						<button type="button " class="btn upload_app_btn delbtn" onclick="return deleteAppIcon('{$data['iApplicationId']}','{$data['appinformation']['vImage']}');">Delete Icon</button>
						{/if}
						</div>
					</div>
				</div>
			</form>
            
            <div style="clear:both;">  </div><br /><br />
			<div class="top_bord">
				<h1>{foreach from=$lang item=val}{if $val.rLabelName == 'Default Screen Background Image'}{$val.rField}{/if}{/foreach}</h1>
			</div>
		    <div class="app_icon_new">
            	<div class="prv_main_box">
                	<div class="top_head_box" id="mtabs">
                		<ul class="hadbg">
                			<li class="tbbg activetabbtn" onclick="mtbcls_chng(this);"><a href="#mtabs-mobile">MOBILE </a> <a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Mobile&nbsp;(640&nbsp;x&nbsp;920) </span></a></li>
                			<li class="tbbg" onclick="mtbcls_chng(this);"><a href="#mtabs-iphone">IPHONE</a> <a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> iPhone5 (640 x 1096). <br>If&nbsp;not&nbsp;set,&nbsp;Mobile&nbsp;background image&nbsp;will&nbsp;be&nbsp;used. </span></a></li>
                			<li class="tbbg" onclick="mtbcls_chng(this);"><a href="#mtabs-tablet">{foreach from=$lang item=val}{if $val.rLabelName == 'TABLET'}{$val.rField}{/if}{/foreach}</a> <a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> {foreach from=$lang item=val}{if $val.rLabelName == 'TABLET'}{$val.rField}{/if}{/foreach}<br/> (960&nbsp;x&nbsp;1380) </span></a></li>
                		</ul>
                		<div class="tabwrapmain">
                			<!-- <div id="mtabs-mobile" style="min-height:400px;" >
                				{if $data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId]} 
                				<img  src="{$data.base_upload}background_image/{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="">
                				<div class="delete_main"><a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" ><img src="{$data.base_image}select_delete_btn.png" /> </a> </div>
                				{/if}
                			</div>
							<div id="mtabs-iphone" style="min-height:400px;">
                				{if $data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId]}
                				<img  src="{$data.base_upload}background_image/{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="">
                				<div class="delete_main">
                					<a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" >
                						<img src="{$data.base_image}select_delete_btn.png" />
                					</a>
                				</div>
                				{/if}
                			</div>
                			<div id="mtabs-tablet" style="min-height:400px;">
                				{if $data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId]}
                				<img  src="{$data.base_upload}background_image/{$data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="">
                				<div class="delete_main">
                					<a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" >
                						<img src="{$data.base_image}select_delete_btn.png" />
                					</a>
                				</div>
                				{else if $data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId]}
                				<img  src="{$data.base_upload}background_image/{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="">
                				<div class="delete_main">
                					<a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" >
                						<img src="{$data.base_image}select_delete_btn.png" />
                					</a>
                				</div>
                				{/if}
                			</div> -->

                			<div id="mtabs-mobile" style="min-height:400px;">
                				{if $data.mobiledefbgImg['iBackgroundId']}
                				<img src="{$data.base_upload}background_image/{$data.mobiledefbgImg['iBackgroundId']}/org_{$data.mobiledefbgImg['vImage']}" width="377px" height="">
                				<div class="delete_main">
                					<a href="{$data.base_url}app/delete_user_defbackground_image/{$data.iApplicationId}?defbgId={$data.mobiledefbgImg['iAppDefBackgroundId']}">
                						<img src="{$data.base_image}select_delete_btn.png" />
                					</a>
                				</div>
                				{/if}
                			</div>
                			<div id="mtabs-iphone" style="min-height:400px;">
                				{if $data.mobiledefbgImg['iBackgroundId']}
                				<img src="{$data.base_upload}background_image/{$data.mobiledefbgImg['iBackgroundId']}/org_{$data.mobiledefbgImg['vImage']}" width="377px" height="">
                				<div class="delete_main">
                					<a href="{$data.base_url}app/delete_user_defbackground_image/{$data.iApplicationId}?defbgId={$data.mobiledefbgImg['iAppDefBackgroundId']}">
                						<img src="{$data.base_image}select_delete_btn.png" />
                					</a>
                				</div>
                				{/if}
                			</div>
                			<div id="mtabs-tablet" style="min-height:400px;">
                				{if $data.tabletdefbgImg['iBackgroundId']}
                				<img src="{$data.base_upload}background_image/{$data.tabletdefbgImg['iBackgroundId']}/org_{$data.tabletdefbgImg['vImage']}" width="377px" height="">
                				<div class="delete_main">
                					<a href="{$data.base_url}app/delete_user_defbackground_image/{$data.iApplicationId}?defbgId={$data.tabletdefbgImg['iAppDefBackgroundId']}">
                						<img src="{$data.base_image}select_delete_btn.png" />
                					</a>
                				</div>
                				{else}
                          {if $data.mobiledefbgImg['iBackgroundId']}
                          <img src="{$data.base_upload}background_image/{$data.mobiledefbgImg['iBackgroundId']}/org_{$data.mobiledefbgImg['vImage']}" width="377px" height="">
                          <div class="delete_main">
                            <a href="{$data.base_url}app/delete_user_defbackground_image/{$data.iApplicationId}?defbgId={$data.mobiledefbgImg['iAppDefBackgroundId']}">
                              <img src="{$data.base_image}select_delete_btn.png" />
                            </a>
                          </div>
                          {/if}
                        {/if}                                        				
                			</div>
                			<div class="botton_part"> <a href="#myModal_set_backimg" data-toggle="modal"><img src="{$data.base_image}select_btn_f.png" /> </a> </div>
                		</div>
                	</div>
                	<div class="top_middle_box"> </div>
                	<div class="set_header"></div>
                </div>
            </div>

		<!--
					Developer Name : Mayur Gajjar
					Description : Add project details
					Date : 25/9/2014
				-->	
				<!-- new -->
				<div class="top_bord">
					<h1>{foreach from=$lang item=val}{if $val.rLabelName == 'Project Information'}{$val.rField}{/if}{/foreach}</h1>
				</div>
				<!--{if $data.message neq ''}
				<div class="alert alert-info">
					{$data.message}
				</div>
				{/if}-->
				<form name="app_data_content" id="upate_appdata_content" method="post"  enctype="multipart/form-data" action="{$data.base_url}app/updateDataContent">
					<input type="hidden" class="text_box_bg"  name="iApplicationId" value="{$data['iApplicationId']}" />
					
					<div id="msg"></div>
					
					<div class="midd_box_inner">
						<div class="name1"> <label class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'Project Name'}{$val.rField}{/if}{/foreach}</a> 
						<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter your Project Name.</span></a></h4></label>
							<input type="hidden" class="text_box_bg"  name="projectPrimaryId" value="{$data['projectinforamtion']['projectPrimaryId']}" />
							<input type="text" class="text_box_bg" id="tProjectName"  name="data[projectName]" value="{$data['projectinforamtion']['projectName']}" />					   
						</div>
						
						<div class="name1"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'project Domain Name'}{$val.rField}{/if}{/foreach} <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter Domain Name.</span></a>--></h4></label>
							<input type="text" class="text_box_bg"  id="tProjectDomainName" name="data[projectDomainName]" value="{$data['projectinforamtion']['projectDomainName']}" />					   
						</div>
						
						<div class="name1"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'project Domain'}{$val.rField}{/if}{/foreach} <!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter domain name like .com,.in etc</span></a>--></h4></label>
							<input type="text" class="text_box_bg" id="tProjectDomain"  name="data[projectDomain]" value="{$data['projectinforamtion']['projectDomain']}" />			   
						</div>
						
						<div class="description_left"> <label  class="lable" style="cursor:default;"><h4>{foreach from=$lang item=val}{if $val.rLabelName == 'Email'}{$val.rField}{/if}{/foreach}<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter you Mail Id.</span></a>--></h4></label>
							<input type="text" class="text_box_bg" id="tEmail"  name="data[projectEmail]" value="{$data['projectinforamtion']['projectEmail']}" />
						</div>
						
						<div class="save_chg"><button type="button" class="btn btn-primary" onclick="return saveappcontentdata();">{foreach from=$lang item=val}{if $val.rLabelName == 'Publish Your App'}{$val.rField}{/if}{/foreach}</button></div>
						<!--onclick="return saveappdata();"-->
				</form>
				<!-- End -->
			</div>
            
                           <!--<div class="top_bord">
                            <h1>Screen Shots</h1>
                          </div>
					    <div class="screen_shot1" >
                                 <div class="top_tab1">  
                                    <ul>
                                    <li><a href="#">Mobile</a></li>
                                     <li><a href="#">iPhone5</a></li>
                                      <li><a href="#">iPad</a></li>
                                    </ul>                                 
                                </div> 
                               <div class="app_icon_new1">                                
                                 <div class="name1"> <h4>App Name  <img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/></h4>
                                  <div class="inner_box_file"> <input type="file" name="icon" id="icon" accept="image/png" class="file_beauty" style="position: absolute; z-index: 100; padding: 5px; opacity: 0;">
                                  <input name="ji" type="file"  value="Browse"/>
                                   <p class="label1">*PNG:640x920</p>
                                 <div class="upload_app_btn "> <button type="button " class="btn upload_app_btn2">Upload Screen shot</button></div>
                                   </div>
                                  </div>                               
					   
					    </div>				    
					   </div>-->
                             
					   <!--<div class="top_bord">
					   <h1>Splash Loading Screen</h1>
					   </div>
					   
					   <div class="screen_shot1" >
					    <div class="top_tab1">  
					    <ul>
					    <li><a href="#">Mobile</a></li>
					     <li><a href="#">iPhone5</a></li>
						 <li><a href="#">iPad</a></li>
					    </ul>
					    
					   </div> 
					   <div class="app_icon_new1">
					   
					<div class="name1"> <h4>Splash Loading Screen  <img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/></h4>
					  <div class="inner_box_file"><input type="file" name="icon" id="icon" accept="image/png" class="file_beauty" style="position: absolute; z-index: 100; padding: 5px; opacity: 0;">
					 <input name="ji" type="file"  value="Browse"/>
					  <p class="label1">*PNG:640x920</p>
					<div class="upload_app_btn "> <button type="button " class="btn upload_app_btn1">Upload Splash Loading Screen</button></div>
					  
					    </div> 
					   
					   
					    </div>
					    
					   </div>
					  </div>-->
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
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>-->
                    </div>
                </div>      
 </div>
 
 </div>
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
      <!--     <h3 class="page-title">
             Application
           </h3>-->
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
    <!--   </div>
    </div>-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    
    
 <!-- END PAGE CONTAINER-->
<!--</div>-->

<!--{literal}
<script type="text/javascript">
function check_validdata()
{
  if($("#vContactEmail").val()=='')
  {
    alert("Please enter Contact Email Address");
    return false;
  }
  if($("#vContactEmail").val() !=''){
  var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;            
          if(!expr.test($("#vContactEmail").val())){
               alert("Please enter Valid Contact Email Address");
                return false;
          }        
        }  
  
  if($("#vWebsite").val()=='')
  {
    alert("Please enter Website URL");
    return false;
  }        
  if($("#vWebsite").val() !=''){
  var expr =  /^(ftp|http|https):\/\/[^ "]+$/;
      if(!expr.test($("#vWebsite").val())){
               alert("Please enter Valid Website URL");
                return false;
      }        
  } 
  if($("#fPrice").val()=='')
  {
    alert("Please enter App Price");
    return false;
  }     
   
}
</script>
{/literal}-->
