
<div id="main-content">
 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    
    <div class="row-fluid">
       <div class="span12">
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
           <h3 class="page-title">
             Application
           </h3>
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
       </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    
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
		<div class="progress" >
			<div class="bar" style="width:99%;"></div>
		</div>
		<div style="margin-left: 23px; width: 96%;display: none;" id="msg"><div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button></div></div>
		<div class="div_inner">
			{if $data.paymentinfo.eStatus neq 'Completed'}
			<a href="{$data.base_url}publish_app/{$data.iApplicationId}">
				<button style="margin:0 2% 20px 0; float:right;width:150px; padding:10px 0;"  class="btn" type="button" >Publish Your App</button>
			</a>
			{/if}
			{if $data.paymentmessage neq ''}
			<div class="alert alert-info">
				{$data.paymentmessage}
			</div>
			{/if}
			
				<div class="top_bord">
					<!--<img src="{$data.base_url}assets/images/app_icon.png" width="16" height="16"/>--><h1>App Information</h1>
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
						<div class="name1"> <label class="lable"><h4>App Name  </a> <a class="tooltip_text" href="#"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter your App Name. This is the title that shows up in the App Store and App Marketplace.(30 characters or less)</span></a></h4></label>
							<input type="text" class="text_box_bg" id="tAppName"  name="data[tAppName]" value="{$data['appinformation']['tAppName']}" />					   
						</div>
						<div class="name1"> <label  class="lable"><h4>App Icon Name <a class="tooltip_text" href="#"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> This will be displayed under your app icon on your users' homescreen on their device.(12 characters or less)</span></a></h4></label>
							<input type="text" class="text_box_bg"  id="tAppIconName" name="data[tAppIconName]" value="{$data['appinformation']['tAppIconName']}" />					   
						</div>
						<div class="name1"> <label  class="lable"><h4>App Keywords <a class="tooltip_text" href="#"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter keywords that describe your specific app.  Each keyword must be separated with a comma.  Avoid generic terms like 'music', charcter limit is 100.  These will be used for your iTunes App Store listing.</span></a></h4></label>
							<input type="text" class="text_box_bg" id="tAppKeywords"  name="data[tAppKeywords]" value="{$data['appinformation']['tAppKeywords']}" />			   
						</div>
						<div class="description_left"> <label  class="lable"><h4>App Description <a class="tooltip_text" href="#"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> This description will appear in the iTunes App Store/Google Play Store and must meet high standards. <br> Plain text only, no HTML.</span></a></h4></label>
							<textarea class="text_aera_style" id="tDescription" name="data[tDescription]" >{$data['appinformation']['tDescription']}</textarea>
						</div>
						<!--<div class="description_right">
							<h3>Write BELOW in bullet point format, what useful features are included in your app? (List at least 5)</h3>
							<textarea class="text_aera_style"  ></textarea>
						</div>   -->
						<div class="dts_btn">
							<lable class="btn btn-success" id="character-count">{if $data['appinformation']['tDescription']|@count gt 0}{$data['appinformation']['tDescription']|strlen} {else}'0'{/if}</lable>
							<lable id="content-msg" >{if $data['appinformation']['tDescription']|@strlen gt 249}Good. You have now enough content.{else}Insufficient content!{/if}</lable>
						</div>								  	
						<div class="name1"> <label  class="lable"><h4>Contact Email  <a class="tooltip_text" href="#"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> The contact email through which customers can reach to you.</span></a></h4></label>
							<input type="text" class="text_box_bg" id="vContactEmail"  name="data[vContactEmail]" value="{$data['appinformation']['vContactEmail']}" />
						</div>
						<div class="name1"> <label  class="lable"><h4>Official Website <a class="tooltip_text" href="#"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Enter the URL for your organization's website here.</span></a></h4></label>
							<input type="text" class="text_box_bg" id="vWebsite"  name="data[vWebsite]" value="{$data['appinformation']['vWebsite']}" />
						</div>
						<div class="name1"> <label  class="lable"><h4>App Price <a class="tooltip_text" href="#"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> You can set any price you want for your app, or you can give it away for free. <br>Most apps range from $0.99 - $4.99 </span></a> </h4></label>
							<input type="text" class="text_box_bg" id="fPrice"  name="data[fPrice]" value="{if $data['appinformation']['fPrice'] neq ''}{$data['appinformation']['fPrice']}{else}{/if}" onkeypress="return isNumberKey(event);" />
						</div>
						<div class="radio_right">
							<h4 style="width:100%; float:left;"><span style="float:left;">App Icon Gloss</span> <a style="margin:0;" class="tooltip_text" href="#"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Your app icon will show on users' phones and in the App Store/Marketplace. The corners will be rounded for  you.</span></a></h4>
							<div class="rdo">
								<label class="width50">
									<input type="radio" value="On"  {if $data['appinformation']['eAppIconGloss'] eq 'On'}checked{/if} class="onbtn_radi"  name="data[eAppIconGloss]"  onClick=  "change_layout('icon_time_box');"//>On
								</label>
								<label class="width50">
									<input type="radio" value="Off" {if $data['appinformation']['eAppIconGloss'] eq 'Off'}checked{/if} class="onbtn_radi"  name="data[eAppIconGloss]"  onClick= "change_layout('icon_time_box');"/>Off
								</label>
							</div>
							<a  href="#"> <img src="{$data.base_url}assets/images//app_icon_no.png" width="75" height="75" /></a>
						</div>
						<div class="save_chg"><button type="button" class="btn" onclick="return saveappdata();" >Save Changes</button></div>
					</div>
				</form>
			</div>
			<div style="clear:both;">  </div>
			<div class="top_bord">
				<h1>App Icon</h1>
			</div>
			<form name="app_data" id="upate_appdata" method="post"  enctype="multipart/form-data" action="{$data.base_url}app/uploadAppicon">
				<input type="hidden" class="text_box_bg"  name="app_image" value="{$data['appinformation']['vImage']}" />
				<input type="hidden" class="text_box_bg"  name="ApplicationId" value="{$data['iApplicationId']}" />
				<div class="app_icon_new">
					<div class="name1"> <h4>App Name  <a class="tooltip_text" href="#"><img src="{$data.base_url}assets/images/icon-help.png" width="16" height="16"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Your app icon will show on users' phones and in the App Store/Marketplace. The corners will be rounded for  you.</span></a></h4>
						<div class="inner_box_file"><input type="file"  name="icon" id="icon" accept="image/png" class="file_beauty" style="position: absolute; z-index: 100; padding: 5px; opacity: 0;">
							<input name="ji" type="file"  value="Browse"/>
							<p class="label1">PNG: 1024 x 1024</p>
							<div class="upload_app_btn "> <button type="button " class="btn upload_app_btn" onclick="return checkvalidation();">Upload App Icon</button></div>
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
 </div>
 <!-- END PAGE CONTAINER-->
</div>





