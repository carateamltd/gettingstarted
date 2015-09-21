{$data.popuphtml}
<script src="{$data.base_js}jquery.form.js"></script>
{include file="set_background_image_popup.tpl" }

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
    <input type="hidden" name="mainactivetab" id="mainactivetab" value="" />  
    <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN EXAMPLE TABLE widget-->
				<div class="widget purple brdrnone" >
					<!--div class="widget-title">
						<h4><i class="icon-reorder"></i> Application</h4>
						<span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> <a href="javascript:;" class="icon-remove"></a> </span> </div-->
					<div class="widget-body">
						<div>
							<!--div class="clearfix">
								<div class="btn-group">
                             <a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
                                 Add New <i class="icon-plus"></i>
                             </a>
                         </div>
								<div class="btn-group pull-right" style="display:none;">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i> </button>
									<ul class="dropdown-menu pull-right">
										<li><a href="#">Print</a></li>
										<li><a href="#">Save as PDF</a></li>
										<li><a href="#">Export to Excel</a></li>
									</ul>
								</div>
							</div-->
							<!--div class="space15">
								<div class="span6">
									<div class="span6 "> {if $data.role|count gt 0 }
										<p class="text-paging">{$data.paging_message}</p>
										{/if} </div>
								</div>
							</div-->
							<div class="mainpartcont"> {include file="tab.tpl" }
								<div class="tbdata">
									<div class="progress progress-striped active" >
										<div class="bar" style="width: 40%;"></div>
									</div>
									<div id="tbl_msg"></div>
									<div class="div_inner">
										<input type="hidden" value="{$data.iApplicationId}"  name="appinformation[iApplicationId]" id="iApplicationId">

										<div id="tabs">
											<!-- Modify By Name:-maksudkhan 20-05-2014
									            Description: listing active
								            -->
									           <ul id="sortable2" class="sortable2">
									            {section name = i loop = $data.selected_feature_details}
									            	{if $data.selected_feature_details[i].eActive eq "Yes"}
									            		{if $data.selected_feature_details[i].vTitle eq "ContactUs"}
									            			<li style="display:none" class="{if $smarty.section.i.index == 0}activebuttontab{else}buttontab{/if}" id="recordsArray_{$data.selected_feature_details[i].iAppTabId}" value="{$data.selected_feature_details[i].iAppTabId}">
									            		 	<!--<a href="#tabs-{$data.selected_feature_details[i].iAppTabId}">{$data.selected_feature_details[i].vTitle}</a>-->
									            		 	{foreach from=$lang item=val}
											             		{if $val.rLabelName == $data.selected_feature_details[i].vTitle}
											                		<a href="#tabs-{$data.selected_feature_details[i].iAppTabId}">{$val.rField}</a>
											             		{/if}
											             	{/foreach}
														{else}
									            			<li class="{if $smarty.section.i.index == 0}activebuttontab{else}buttontab{/if}" id="recordsArray_{$data.selected_feature_details[i].iAppTabId}" value="{$data.selected_feature_details[i].iAppTabId}"> 
									            			{$checkName=0}
									            			{foreach from=$lang item=val}
											             		{if $val.rLabelName == $data.selected_feature_details[i].vTitle}
											                		<a href="#tabs-{$data.selected_feature_details[i].iAppTabId}">{$val.rField}</a>
											                		{$checkName=1}
											             		{/if}
											             	{/foreach}
											             	{if $checkName==0}
											             		<a href="#tabs-{$data.selected_feature_details[i].iAppTabId}">{$data.selected_feature_details[i].vTitle}</a>
											             	{/if}
									            		{/if}
									            		</li>
									            	{else}
									            		<li style="display:none" class="{if $smarty.section.i.index == 0}activebuttontab{else}buttontab{/if}" id="recordsArray_{$data.selected_feature_details[i].iAppTabId}" value="{$data.selected_feature_details[i].iAppTabId}"> <a href="#tabs-{$data.selected_feature_details[i].iAppTabId}"> {$data.selected_feature_details[i].vTitle} </a> </li>
									           		{/if}
									            {/section}
									          </ul>
											<!--<div class="subtabbtn"> <a class="btn btn_upload_icon" style="text-decoration:none;color:white;float: right;" data-controls-modal="subTabs" data-backdrop="static" data-keyboard="false" href="#appr-buttons-subtbs" id="appearance_sub_tabs" role="presentation" tabindex="-1">Sub Tabs</a> </div>-->
                                            
											{section name=i loop=$data.selected_feature_details}
											<div id="tabs-{$data.selected_feature_details[i].iAppTabId}">
												<div style="float:left; width:56%;"> 
													{if $data.selected_feature_details[i].default_vTitle eq "Location"}
														{section name=j loop=$data['allLocation']}
															{if $data.selected_feature_details[i].iAppTabId eq $data['allLocation'][j]['iAppTabId']} <a class="btn ui-tabs-anchor"  href="javascript:void(0);" onclick="return edit_location('{$data.selected_feature_details[i].iAppTabId}','{$data.selected_feature_details[i].iFeatureId}','{$data['allLocation'][j]['iAppId']}','{$data.selected_feature_details[i].iApplicationId}');" id="" style="float: right;margin-right: 14px;width: 6%;">{$data['allLocation'][j]['iAppId']}</a> {/if}
														
														{/section}
													<!--<a class="btn ui-tabs-anchor"  href="javascript:void(0);" id="" style="float: right;margin-right: 14px;width: 6%;" onclick="return deleteLocation('{$data['iApplicationId']}','{$data.selected_feature_details[i].iAppTabId}','{$data.selected_feature_details[i].iFeatureId}');">Edit</a>
                                                <a class="btn ui-tabs-anchor"  href="javascript:void(0);" id="" style="float: right;margin-right: 14px;width: 6%;" onclick="return deleteLocation('{$data['iApplicationId']}','{$data.selected_feature_details[i].iAppTabId}','{$data.selected_feature_details[i].iFeatureId}');">Delete</a>-->
													{/if}
                                                      <!--
              											Modified By : Nizam Kadri
										                Modified Date : 17-05-2014 
										                Purpose : Purpose to set User on same page while he/she click on navigation help icon.
                                                     -->
													<div id="form_{$data.selected_feature_details[i].iAppTabId}"> 
														{if $data.selected_feature_details[i].vTitle ne "Order"}
                                                        	{$data.html.{$data.selected_feature_details[i].iAppTabId}}
                                                        {else}
                                                        	<!-- display paypal form instead of order form -->
                                                        	<form class="form-horizontal" action="{$data.base_url}administrator/save_paypal_onfo" method="post" id="paypal_info_admin">
																<input type="hidden" name="iPaypalinfoId" value="{$data.paypal_info['iPaypalinfoId']}">
																<input type="hidden" name="Data[iClientId]" value="{$data.user_info['iAdminId']}">

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
																	<label style="width: 110px;" class="control-label">Paypal App Client ID (LIVE)</label>

																	<div class="controls" style="margin-left: 115px;margin-top: 10px;">
																		<input type="text" placeholder="Paypal Signature" class="input-large" id="vPsignature"
																			   name="Data[vSignature]" value="{$data.paypal_info['vSignature']}" style="width: 450px;" />
																	</div>
																</div>
																<div class="form-actions">
																	<button type="submit" class="btn btn-success" id="btn-paypal_save">
																		{foreach from=$lang item=val}
                    														{if $val.rLabelName == 'Save'}
                    															{$val.rField}
                     														{/if}
                     													{/foreach}
																	</button>
																	{if $data['user_info']['iRoleId'] eq '1'}
																		<button type="button" class="btn" onclick="returnme()">
																			{foreach from=$lang item=val}
																				{if $val.rLabelName == 'Cancel'}
																					{$val.rField}
																				{/if}
																			{/foreach}
																		</button>
																	{/if}
																</div>
															</form>
                                                        {/if} 
                                                    </div>
												</div>
												<div class="main_box">
													<div class="top_head_box" id="mtabs">
														<ul class="hadbg">
															<li class="tbbg activetabbtn" onclick="mtbcls_chng(this);"><a href="#mtabs-mobile">Mobile </a> <a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Mobile&nbsp;(100&nbsp;x&nbsp;143) </span></a></li>
															<li class="tbbg" onclick="mtbcls_chng(this);"><a href="#mtabs-iphone">Iphone</a> <a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />{foreach from=$lang item=val}
                    {if $val.rLabelName == 'iPhone5_desc'}
                       {$val.rField}
                     {/if}
                     {/foreach}
                       </span></a></li>	<li class="tbbg" onclick="mtbcls_chng(this);"><a href="#mtabs-tablet">{foreach from=$lang item=val}
                    	{if $val.rLabelName == 'TABLET'}
                       {$val.rField}
                     {/if}
                     {/foreach}</a> <a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" /> Tablet<br/> (960&nbsp;x&nbsp;1380) </span></a></li>
														</ul>
														<div class="tabwrapmain">
															<div id="mtabs-mobile" style="min-height:400px;" > {if $data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId]} <img  src="{$data.base_upload}background_image/{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="" style="width:100%;height:400px;">
																<div class="delete_main" style="left: 104px;
height: 38px;"><a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" >
																
																<!--<img src="{$data.base_image}select_delete_btn.png" />-->
																{foreach from=$lang item=val}
																	 {if $val.rLabelName == 'select delete btn'}
																		<img src="{$data.base_image}{$val.rField}.png" /> 
																	 {/if}
																{/foreach}
																 </a> </div>
																{/if} </div>
															<div id="mtabs-iphone" style="min-height:400px;"> {if $data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId]} <img  src="{$data.base_upload}background_image/{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="">
																<div class="delete_main" style="left: 104px;
height: 38px;"><a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" >
																<!--<img src="{$data.base_image}select_delete_btn.png" /> -->
																{foreach from=$lang item=val}
																	 {if $val.rLabelName == 'select delete btn'}
																		<img src="{$data.base_image}{$val.rField}.png" style="height: 35px;margin-top: -1px;" /> 
																	 {/if}
																{/foreach}
																</a> </div>
																{/if} </div>
															<div id="mtabs-tablet" style="min-height:400px;"> {if $data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId]} <img  src="{$data.base_upload}background_image/{$data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="">
																<div class="delete_main" style="left: 104px;
height: 38px;"><a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_tab_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" >
																<!--<img src="{$data.base_image}select_delete_btn.png" /> -->
																{foreach from=$lang item=val}
																	 {if $val.rLabelName == 'select delete btn'}
																		<img src="{$data.base_image}{$val.rField}.png" style="height: 35px;margin-top: -1px;" /> 
																	 {/if}
																{/foreach}
																</a> </div>
																{else if $data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId]} <img  src="{$data.base_upload}background_image/{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iBackgroundimgId}/org_{$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].vImage}" width="377px" height="">
																<div class="delete_main"><a href="{$data.base_url}app/delete_user_background_image/{$data.iApplicationId}?bId={$data.back_mob_img_details[$data.selected_feature_details[i].iAppTabId].iUserTabBackImgId}" >
																<!--<img src="{$data.base_image}select_delete_btn.png" /> -->
																{foreach from=$lang item=val}
																	 {if $val.rLabelName == 'select delete btn'}
																		<img src="{$data.base_image}{$val.rField}.png" style="height: 35px;margin-top: -1px;" /> 
																	 {/if}
																{/foreach}
																</a> </div>
																{/if} </div>
															<div class="botton_part"> <a href="#myModal_set_backimg" data-toggle="modal" style="right: -13%;
position: relative;">
															<!--<img src="{$data.base_image}select_btn.png" /> -->
															{if $lang.0.rField == 'Connexion'}
															<img src="{$data.base_image}select_btn_f.png" />
															{else}
															<img src="{$data.base_image}select_btn.png" />
															{/if}
															<!--{foreach from=$lang item=val}
																 {if $val.rLabelName == 'Select_btn'}
																 	<img src="{$data.base_image}{$val.rField}.png" />
																 {/if}
															{/foreach} -->
															</a> </div>
														</div>
													</div>
													<div class="top_middle_box"> </div>
													<div class="set_header"></div>
												</div>
												<div style="clear:both;"></div>
											</div>
											{/section} </div>
									</div>
									<div class="new-dlg-container">
										<form name="buildwiz" method="post">
										</form>
									</div>
								</div>
							</div>
						</div>
						<div style="clear:both;"></div>
						<div class="pagination"> {$data.create_links} </div>
					</div>
				</div>
			</div>
			<!-- END EXAMPLE TABLE widget-->
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
    <div id="appr-buttons-subtbs"> {include file="appearance_sub_tabs.tpl" } </div>
    </div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h3 id="myModalLabel">Pick Your App Features</h3>
	</div>
	<div class="modal-body">
		<div class="toptab">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<th align="left">
						<strong>
							{foreach from=$lang item=val}
								{if $val.rLabelName == 'Industry'}
									{$val.rField}
								{/if}
							{/foreach}
						</strong> 
						<span class="qmark">&nbsp;</span>
					</th>
					<th align="left">
						<strong>
							{foreach from=$lang item=val}
								{if $val.rLabelName == 'App Name'}
									{$val.rField}
								{/if}
							{/foreach}
						</strong> 
						<span class="qmark">&nbsp;</span>
					</th>
					<th align="left">
						<strong>
							{foreach from=$lang item=val}
								{if $val.rLabelName == 'App Icon Name'}
									{$val.rField}
								{/if}
							{/foreach}
						</strong> 
						<span class="qmark">&nbsp;</span>
					</th>
				</tr>
				<tr>
					<td><select class="indst" id="industry" name="appindustry">
							<option value="">
								{foreach from=$lang item=val}
									{if $val.rLabelName == 'Select App Industry'}
										{$val.rField}
									{/if}
								{/foreach}
							</option>
				 {section name = i loop = $data.appindustry}
							<option value="{$data.appindustry[i].iIndustryId}">{$data.appindustry[i].vTitle}</option>
				{/section}
						</select>
					</td>
					<td><input class="indst" type="text" value="" size="30" id="app_name" name="app_name"></td>
					<td><input class="indst" type="text" maxlength="12" value="" size="30" id="app_icon" name="app_icon"></td>
				</tr>
			</table>
		</div>
		<div class="midparttp">
			<div id="err"></div>
			<div class="midleft">
				<fieldset>
				<legend>
					{foreach from=$lang item=val}
						{if $val.rLabelName == "Recommended"}
							{$val.rField}
						{/if}
					{/foreach}
				:</legend>
				<div class="innerlft"> Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
				</div>
				</fieldset>
			</div>
			<div class="midright">
				<fieldset>
				<legend>Optional:</legend>
				<div class="innercont"> Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
					Right part<br/>
				</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">
			{foreach from=$lang item=val}
				{if $val.rLabelName == "Close"}
					{$val.rField}
				{/if}
			{/foreach}
		</button>
		<button type="button" class="btn btn-primary" id="save_feature">
			{foreach from=$lang item=val}
				{if $val.rLabelName == "Save Feature & Continue"}
					{$val.rField}
				{/if}
			{/foreach}
		</button>
	</div>
</div>





<!--<div id="main-content">-->

	<!-- BEGIN PAGE CONTAINER-->
	<!--<div class="container-fluid">-->
		<!-- BEGIN PAGE HEADER-->
		<!--<div class="row-fluid">
			<div class="span12">-->
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<!--<h3 class="page-title"> Application </h3>
			</div>
		</div>-->
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		
<!--	</div>-->
	<!-- END EDITABLE TABLE widget-->
	<!-- END PAGE CONTENT-->
<!--</div>-->
<!-- END PAGE CONTAINER-->
<!--</div>-->

<!-- Modal -->


{literal}
<script>
$(function() {
var current_tab_id = $.session.get("curTabId");
/*if(current_tab_id){
	var current_tab_id_arr =current_tab_id.split("_");
	show_hide_gallery('Custom',current_tab_id_arr[1]);
}*/

//alert(current_tab_id_arr[1]+'current tab');
$("#tabs").bind("tabsactivate", function (event, ui) {
	$.session.set("curTabId", ui.newTab.attr('id'));
	curTabIndex = ui.newTab.index();
	$.session.set("curTabIndex", curTabIndex);
});	

var neworder = new Array();
var tabs = $( "#tabs" ).tabs();
var sel = $.session.get("curTabIndex");
if(sel){
	var tabs =$( "#tabs" ).tabs( "option", "active", sel );
}else{
	var tabs = $( "#tabs" ).tabs();
}

if($.session.get("curTabId")){
 $("#tabs").find('li').each(function(){
 	if( $(this).closest('div').attr('id') == 'tabs'){
	   $( this ).removeClass('activebuttontab').addClass('buttontab');
 	}
  });	
	$("#"+$.session.get("curTabId")).removeClass('buttontab').addClass('activebuttontab');
    if($("#"+$.session.get("curTabId")).val() !=''){
            var selectedtabid = $("#"+$.session.get("curTabId")).val();
            $('#mainactivetab').val(selectedtabid);
    }
}
/* tabs.find( ".ui-tabs-nav" ).sortable({
  axis: "x",
   update : function () {  
	      

            $('#tabs li').each(function() {    
                var id  = $(this).attr("aria-controls");

                neworder.push(id);

            });
            console.log(neworder);
   },
  stop: function() {
    tabs.tabs( "refresh" );
  }
});*/
});

$('#dStartDate').datepicker({
    format: 'yyyy-mm-dd'
});

$('#dEndDate').datepicker({
    format: 'yyyy-mm-dd'
});



function closeleanmodal(){
 $("#lean_overlay").click();   
}
$("#sortable2 li").click(function(){
	var selectedtabid = this.value;
    $('#mainactivetab').val(selectedtabid);
});
$(window).load(function() {
});
$( document ).tooltip({
 position: {
 my: "left center",
 at: "right center",
 using: function( position, feedback ) {
  $( this ).css( position );
  $( "<div>" )
  .addClass( "arrow" )
  .addClass( feedback.horizontal )
  .appendTo( this );
  }
  }
 });

	// color picker 
	$('#picker1').colorpicker().on('changeColor', function(ev){
		var cval = ev.color.toHex();
		//	$(this).val(ev.color.toHex());
		$("#red_color").css('background',cval);
		$("#rcat1").css('background',cval);
		$("#red_color").val(ev.color.toHex());
		
		//bodyStyle.backgroundColor = ev.color.toHex();
	})
	
	$('#picker2').colorpicker().on('changeColor', function(ev){
		var cval = ev.color.toHex();
		//	$(this).val(ev.color.toHex());
		$("#green_color").css('background',cval);
		$("#green_color").val(ev.color.toHex());
		//bodyStyle.backgroundColor = ev.color.toHex();
	})
	
	$('#picker3').colorpicker().on('changeColor', function(ev){
		var cval = ev.color.toHex();
		//	$(this).val(ev.color.toHex());
		$("#purple_color").css('background',cval);
		$("#purple_color").val(ev.color.toHex());
		//bodyStyle.backgroundColor = ev.color.toHex();
	})
	
	$(function() {
		$( "#sortable_aroundus" ).sortable();
		$( "#sortable_aroundus" ).disableSelection();
	});

</script>

{/literal} 