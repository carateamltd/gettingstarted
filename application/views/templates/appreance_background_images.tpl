<script src="{$data.base_js}icheck.js?v=1.0.1"></script>
<div class="tab_main_title">
	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table_new">
		<tr>
			<td width="350" align="left" style="padding-left: 20px;">
				<h2>{foreach from=$lang item=val}{if $val.rLabelName == 'Background Image'}{$val.rField}{/if}{/foreach}</h2>
			</td>
			<td width="300">
				<!--<a href="#" class="tooltip_text"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> 1. Upload a background image or select from our image library.<br/>2. Scroll down to choose the sections to apply the background.<br/>3. Scroll back uo and hit save. viola!<br/>Click <img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> for more details.</span></a>-->
			</td>
			<td align="right" id="button_save">
				{foreach from=$lang item=val}
					{if $val.rLabelName == 'Save Background Settings'}
						<input type="button" class="btn btn_upload_icon" value="{$val.rField}" id="Save_Background_Settings" onclick="return saveBackgroundSettings();">
					{/if}
				{/foreach}
			</td>
		</tr>
	</table>
	<!--<span id="save_changes" style="float: left;margin-left: 10px;display: none;" >Processing Please Wait....</span>-->
</div>
<input type="hidden" name="common_type" value="Mobile" id="common_tab" />
<input type="hidden" name="main_app_id" value="{$data['iApplicationId']}" id="main_app_id" />
<div class="leftpartappearance main_content_back">
	<ul class="tabbgchange">
		<li class="activetabbtn"><a href="#background_setting" id="mobile_tab">Mobile</a></li>
		<li class="tbbg"><a href="#back-iphones" id="mobile_tab">Iphone</a></li>
		<li class="tbbg"><a href="#back-ipads" id="iPad_page">Ipad</a></li>
	</ul>	
	<div id="errmsg" style="margin:50px 0 0 10px;"></div>	  
	<div class="fix_div_top">
		<div class="button_1">
			<form name="uploadBackgroundIamge" id="uploadBackgroundIamge" method="post" action="{$data.base_url}app/uploadBackgroundIamge">
				<input type="hidden" value="{$data['iApplicationId']}" name="iAppId" />			 
				<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table">
					<tr>
						<td>
							<label>
								<!--<a class="tooltip_text" href="#"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/><span><img class="callout_text" src="{$data.base_image}callout.gif" /> 1. Upload an image or select one from below image list.<br> 2. Select tabs, locations, and sliding images by check the checkbox.<br>3. Hit Save Background Settings button to save.</span></a>-->
							</label>
						</td>
						<td>
							<input type="file" name="file_uploads_btn" id="file_upload_app_image" />(100px*143px)
						</td>
						<td align="right" width="100">
							{foreach from=$lang item=val}
								{if $val.rLabelName == 'Upload an image'}	
									<input type="button" value="{$val.rField}" name="upload_btn_icon" class="btn btn_upload_icon" onclick="return uploadAppBgImage();" />
								{/if}
							{/foreach}
						</td>
						<td align="right" width="100">
							{foreach from=$lang item=val}
								{if $val.rLabelName == 'Select from image library'}
									<input type="button" value="{$val.rField}" name="upload_btn_icon" class="btn btn_upload_icon" id="open_img_library" onclick="return openImgGallery();" />
								{/if}
							{/foreach}
						</td>
					</tr>
				</table>
			</form>	    
		</div>
	</div>	
	<div style="clear:both;"></div> 
	<!--Mobile Setting coding start-->
	<div id="background_setting">
		<form name="saveBackgroundSetting" id="saveBackgroundSetting" method="post" action="{$data.base_url}app/saveBackgroundSetting?iApplicationId={$data['iApplicationId']}">
			<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId">	
			<input type="hidden" value="" name="" id="slide_info1" />
			<input type="hidden" value="" name="" id="slide_info2" />
			<input type="hidden" value="" name="" id="slide_info3" />
			<input type="hidden" value="" name="" id="slide_info4" />
			<input type="hidden" value="" name="" id="slide_info5" />
			<input type="hidden" value="{$data.exist_slider_img.vSliderMode}" name="" id="slidermode" />                   			 
			<div id="back-mobiles" class="back-mobiles">
				<div class="stock_section">			  		
					<ul>
						{if $data.your_tabbackground|@count gt 0}
							{section name = i loop = $data.your_tabbackground}
								<li>
									{if $data.your_tabbackground[i]['apptab_deatils']|@count gt 0}	  
										<span class="tabdata">
											{section name=j loop=$data.your_tabbackground[i]['apptab_deatils']}						    
												{if $data.your_tabbackground[i]['apptab_deatils'][j]['vTitle'] neq ''}
													{foreach from=$lang item=val}
														{if $val.rLabelName == $data.your_tabbackground[i]['apptab_deatils'][j]['vTitle']}
															{$val.rField}
														{/if}
													{/foreach}
													</br>
												{else}
													{foreach from=$lang item=val}
														{if $val.rLabelName == $data.your_tabbackground[i]['apptab_deatils'][j]['default_vTitle']}
															{$val.rField}
														{/if}
													{/foreach}
													</br>
												{/if}
											{/section}
										</span>						    
									{/if}
									<img  src="{$data.base_upload}background_image/{$data.your_tabbackground[i].iBackgroundId}/{$data.your_tabbackground[i].vImage}" />							 
									<div class="links_bottoms">
										<!--<a href="javascript:void(0);">
											<span class="btn_bg btn_bg_check" id="{$data.your_tabbackground[i].iBackgroundId}" onclick="selectBackground('{$data.your_tabbackground[i].iBackgroundId}');">							</span>
											<input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="{$data.your_tabbackground[i].iBackgroundId}">
										</a>-->
										<div class="demo-list">
											<ul>
												<li>
													<input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="{$data.your_tabbackground[i].iBackgroundId}" />
												</li>
											</ul>
										</div>
										<a href="javascript:void(0);" >
											<span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('{$data.your_tabbackground[i].iBackgroundId}','background_setting');"></span>
										</a>
										<a href="javascript:void(0);">
											<span class="btn_bg btn_bg_details" onclick="return detailsAppImage('{$data.your_tabbackground[i].iBackgroundId}','{$data.your_tabbackground[i].vImage}');"></span>
										</a>
									</div>
								</li>
							{/section}
						{else}
							<span style="color: rgb(255,255,255) !important;">
								{foreach from=$lang item=val}
									{if $val.rLabelName == 'No Background'}
										{$val.rField}
									{/if}
								{/foreach}
							</span>
						{/if}
					</ul>
				</div>
			</div>
			<div class="button_row">
				<div class="button_1">
					<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
						<tr>
							<td>
								<label class="spec_label">
									{foreach from=$lang item=val}
										{if $val.rLabelName == 'Choose which sections'}
											{$val.rField}
										{/if}
									{/foreach}:
								</label>
							</td>
							<td>
								<!--<label><input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>-->
								<div class="skin skin-line-mobile">
									<ul class="list tabs_checked">
										<li>
											<input tabindex="18" type="checkbox" id="selectAll" value="1" />
											<label for="selectAll">
												{foreach from=$lang item=val}
													{if $val.rLabelName == 'Select all'}
														{$val.rField}
													{/if}
												{/foreach}
											</label>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="button_row1">
				<!--<div class="label">Home Screen</div>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> Background</label>-->
				<div class="label">
					{foreach from=$lang item=val}
						{if $val.rLabelName == 'Tabs'}
							{$val.rField}
						{/if}
					{/foreach}
				</div>				  
				{section name=i loop=$data.selected_feature_details}
					{if ! in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
						<!--<label class="lbl_checkbox">
						<input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
						{if $data.selected_feature_details[i].vTitle == ""}
						{$data.selected_feature_details[i].default_vTitle}
						{else}
						{$data.selected_feature_details[i].vTitle}
						{/if}
						</label>-->
						<div class="skin skin-line-mobile">
							<ul class="list tabs_checked">
								<li>								  
									<input tabindex="17" name="iAppTabId[]" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="democls" id="tabId" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if} />
									<label for="tabId">
										{foreach from=$lang item=val}
											{if $val.rLabelName == $data.selected_feature_details[i].vTitle}
												{$val.rField}
											{/if}
										{/foreach} 
									</label>
								</li>
								<!--<li>
								<input tabindex="18" type="checkbox" id="line-checkbox-2" checked>
								<label for="line-checkbox-2">Checkbox 2</label>
								</li>-->
							</ul>
						</div>
					{/if}  
				{/section}
				<!--<div class="label">Locations</div>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>-->
			</div>
			{if $data['finalSelected_tab_array']|@count gt 0}
				<div class="button_row">
					<div class="button_1">
						<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
							<tr>
								<td>
									<label class="spec_label">
										{foreach from=$lang item=val}
											{if $val.rLabelName == 'have backgrounds'}
												{$val.rField}
											{/if}
										{/foreach} :
									</label>
								</td>
							</tr>
						</table>
					</div>
				</div>		    
				<div class="button_row1">
					<!--<div class="label">Home Screen</div>-->				
					<!--<div class="label">Tabs</div>-->				
					{section name=i loop=$data.selected_feature_details}
						{if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
							<!-- <label class="lbl_checkbox">
							<input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
							{if $data.selected_feature_details[i].vTitle == ""}
								{$data.selected_feature_details[i].default_vTitle}
							{else}
								{$data.selected_feature_details[i].vTitle}
							{/if}
							</label>-->					
							<div class="skin skin-line-mobile skin_line_cross">
								<ul class="list tabs_checked">
									<li>
										<input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="close_checkbox" />
										<label for="tabId">
											{if $data.selected_feature_details[i].vTitle == ""}
												{$data.selected_feature_details[i].default_vTitle}
											{else}
												{$data.selected_feature_details[i].vTitle}
											{/if}
										</label>
									</li>								
								</ul>
							</div>
						{/if}
					{/section}				  
					<!--<div class="label">Locations</div>-->
				</div>
			{/if}
		</form>
	</div>
	<!--mobile coding setting end-->
	<div id="back-iphones">
		<form name="saveBackgroundSetting" id="saveBackgroundSetting" method="post" action="{$data.base_url}app/saveBackgroundSetting?iApplicationId={$data['iApplicationId']}">
			<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId" />	
			<input type="hidden" value="" name="" id="slide_info1" />
			<input type="hidden" value="" name="" id="slide_info2" />
			<input type="hidden" value="" name="" id="slide_info3" />
			<input type="hidden" value="" name="" id="slide_info4" />
			<input type="hidden" value="" name="" id="slide_info5" />
			<input type="hidden" value="{$data.exist_slider_img.vSliderMode}" name="" id="slidermode" />                   			 
			<div id="back-mobiles" class="back-mobiles">
				<div class="stock_section">			  		
					<ul>
						{if $data.your_tabbackground|@count gt 0}
							{section name = i loop = $data.your_tabbackground}
								<li>
									{if $data.your_tabbackground[i]['apptab_deatils']|@count gt 0}	  
										<span class="tabdata">
											{section name=j loop=$data.your_tabbackground[i]['apptab_deatils']}						    
												{if $data.your_tabbackground[i]['apptab_deatils'][j]['vTitle'] neq ''}
													{$data.your_tabbackground[i]['apptab_deatils'][j]['vTitle']}</br>
												{else}
													{$data.your_tabbackground[i]['apptab_deatils'][j]['default_vTitle']}</br>
												{/if}
											{/section}
										</span>						    
									{/if}
									<img  src="{$data.base_upload}background_image/{$data.your_tabbackground[i].iBackgroundId}/{$data.your_tabbackground[i].vImage}" />							 
									<div class="links_bottoms">
										<!--<a href="javascript:void(0);">
										<span class="btn_bg btn_bg_check" id="{$data.your_tabbackground[i].iBackgroundId}" onclick="selectBackground('{$data.your_tabbackground[i].iBackgroundId}');">								  
										</span>
										<input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="{$data.your_tabbackground[i].iBackgroundId}">
										</a>-->
										<div class="demo-list">
											<ul>
												<li>
													<input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="{$data.your_tabbackground[i].iBackgroundId}" />
												</li>
											</ul>
										</div>
										<a href="javascript:void(0);" >
											<span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('{$data.your_tabbackground[i].iBackgroundId}','background_setting');"></span>
										</a>
										<a href="javascript:void(0);">
											<span class="btn_bg btn_bg_details" onclick="return detailsAppImage('{$data.your_tabbackground[i].iBackgroundId}','{$data.your_tabbackground[i].vImage}');"></span>
										</a>
									</div>
								</li>
							{/section}
						{else}
							<span style="color: rgb(255,255,255) !important;">
								{foreach from=$lang item=val}
									{if $val.rLabelName == 'No Background'}
										{$val.rField}
									{/if}
								{/foreach}
							</span>
						{/if}
					</ul>
				</div>
			</div>
			<div class="button_row">
				<div class="button_1">
					<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
						<tr>
							<td>
								<label class="spec_label">
									{foreach from=$lang item=val}
										{if $val.rLabelName == 'No Background'}
											{$val.rField}
										{/if}
									{/foreach}
								</label>
							</td>
							<td>
								<!--<label><input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>-->
								<div class="skin skin-line-iphone">
									<ul class="list tabs_checked">
										<li>
											<input tabindex="18" type="checkbox" class="close_checkbox" id="selectAll_iPhone_tab" value="1" />
											<label for="selectAll_iPhone_tab">
												{foreach from=$lang item=val}
													{if $val.rLabelName == 'Select all'}
														{$val.rField}
													{/if}
												{/foreach}
											</label>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="button_row1">
				<!--<div class="label">Home Screen</div>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> Background</label>-->
				<div class="label">
					{foreach from=$lang item=val}
						{if $val.rLabelName == 'Tabs'}
							{$val.rField}
						{/if}
					{/foreach}
				</div>				  
				{section name=i loop=$data.selected_feature_details}
					{if ! in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
						<!--<label class="lbl_checkbox">
						<input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
						{if $data.selected_feature_details[i].vTitle == ""}
						{$data.selected_feature_details[i].default_vTitle}
						{else}
						{$data.selected_feature_details[i].vTitle}
						{/if}
						</label>-->
						<div class="skin skin-line-iphone">
							<ul class="list tabs_checked">
								<li>								  
									<input tabindex="17" name="iAppTabId[]" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="iphone_checkbox" id="tabId" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if} />
									<label for="tabId">
										{$data.selected_feature_details[i].vTitle}
									</label>
								</li>
								<!--<li>
								<input tabindex="18" type="checkbox" id="line-checkbox-2" checked>
								<label for="line-checkbox-2">Checkbox 2</label>
								</li>-->
							</ul>
						</div>
					{/if}  
				{/section}
				<!--<div class="label">Locations</div>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="iphonelabel>-->
			</div>
			{if $data['finalSelected_tab_array']|@count gt 0}
				<div class="button_row">
					<!--<div class="button_1">
					<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
					<tr>
					<td><label class="spec_label">These sections already have backgrounds assigned:</label></td>
					</tr>
					</table>
					</div>-->
				</div>		    
				<div class="button_row1">
					<!--<div class="label">Home Screen</div>-->				
					<!--<div class="label">Tabs</div>-->				
					{section name=i loop=$data.selected_feature_details}
						{if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
							<!-- <label class="lbl_checkbox">
							<input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
							{if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}
							</label>-->					
							<div class="skin skin-line-iphone skin_line_cross">
								<ul class="list tabs_checked">
									<li>
										<input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="close_checkbox" />
										<label for="tabId">
											{if $data.selected_feature_details[i].vTitle == ""}
												{$data.selected_feature_details[i].default_vTitle}
											{else}
												{$data.selected_feature_details[i].vTitle}
											{/if}
										</label>
									</li>								
								</ul>
							</div>
						{/if}
					{/section}				  
					<!--<div class="label">Locations</div>-->
				</div>
			{/if}
		</form>
	</div>
	<!--iPad coding setting start-->
	<!--<div class="fix_div_top"> -->
	<div id="back-ipads">
		<form name="save_iPad_BackgroundSetting" id="save_iPad_BackgroundSetting" method="post" action="{$data.base_url}app/saveBackgroundSetting?iApplicationId={$data['iApplicationId']}">
			<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId" />	
			<input type="hidden" value="" name="" id="slide_info1" />
			<input type="hidden" value="" name="" id="slide_info2" />
			<input type="hidden" value="" name="" id="slide_info3" />
			<input type="hidden" value="" name="" id="slide_info4" />
			<input type="hidden" value="" name="" id="slide_info5" />
			<input type="hidden" value="{$data.exist_slider_img.vSliderMode}" name="" id="slidermode" />    
			<input type="hidden" value="iPad" name="App_type" id="app_type" />
			<div id="back-ipad" class="back-mobiles">
				<div class="stock_section">			  		
					<ul>
						{if $data.iPad_tabbackground|@count gt 0}
							{section name = i loop = $data.iPad_tabbackground}
								<li>						    
									{if $data.iPad_tabbackground[i]['iPad_tab']|@count gt 0}	  
										<span class="tabdata">
											{section name=j loop=$data.iPad_tabbackground[i]['iPad_tab']}						    
												{if $data.iPad_tabbackground[i]['iPad_tab'][j]['vTitle'] neq ''}
													{$data.iPad_tabbackground[i]['iPad_tab'][j]['vTitle']}
													</br>
												{else}
													{$data.iPad_tabbackground[i]['iPad_tab'][j]['default_vTitle']}</br>
												{/if}
											{/section}
										</span>						    
									{/if}
									<img  src="{$data.base_upload}background_image/{$data.iPad_tabbackground[i].iBackgroundId}/{$data.iPad_tabbackground[i].vImage}" />							 
									<div class="links_bottoms">
										<!--<a href="javascript:void(0);">
										<span class="btn_bg btn_bg_check" id="{$data.your_tabbackground[i].iBackgroundId}" onclick="selectBackground('{$data.your_tabbackground[i].iBackgroundId}');">								  
										</span>
										<input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="{$data.your_tabbackground[i].iBackgroundId}">
										</a>-->
										<div class="demo-list clear">
											<ul>
												<li>
													<input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="{$data.iPad_tabbackground[i].iBackgroundId}" />
												</li>
											</ul>
										</div>
										<a href="javascript:void(0);" >
											<span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('{$data.iPad_tabbackground[i].iBackgroundId}','back_ipads');"></span>
										</a>
										<a href="#">
											<span class="btn_bg btn_bg_details" onclick="return detailsAppImage('{$data.iPad_tabbackground[i].iBackgroundId}','{$data.iPad_tabbackground[i].vImage}');"></span>
										</a>
									</div>
								</li>
							{/section}
						{else}
							<span style="color: rgb(255,255,255) !important;">
								{foreach from=$lang item=val}
									{if $val.rLabelName == 'No Background'}
										{$val.rField}
									{/if}
								{/foreach}
							</span>
						{/if}
					</ul>
				</div>
			</div>
			<div class="button_row">
				<div class="button_1">
					<!--<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
					<tr>
					<td><label class="spec_label">Choose which sections to apply this background to:</label></td>
					<td><label>
					<input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>
					<div class="skin skin-line-ipad">
					<ul class="list tabs_checked">
					<li>
					<input tabindex="18" class="close_checkbox" type="checkbox" id="selectAll_iPad_tab" value="1" >
					<label for="selectAll_iPad_tab">Select all</label>
					</li>
					</ul>
					</div>
					</td>
					</tr>
					</table>-->
				</div>
			</div>
			<div class="button_row1">
				<!--<div class="label">Home Screen</div>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> Background</label>-->
				<div class="label">
					{foreach from=$lang item=val}
						{if $val.rLabelName == 'Tabs'}
							{$val.rField}
						{/if}
					{/foreach}
				</div>				  
				{section name=i loop=$data.selected_feature_details}
					{if ! in_array($data.selected_feature_details[i].iAppTabId,$data['selected_iPad_tab'])}
						<!--<label class="lbl_checkbox">
						<input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
						{if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}
						</label>-->					 
						<div class="skin skin-line-ipad">
							<ul class="list tabs_checked">
								<li>								  
									<input tabindex="17" name="iAppTabId[]" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="ipad_checkbox" id="tabId" {if in_array($data.selected_feature_details[i].iAppTabId,$data['selected_iPad_tab'])} checked="checked" {/if} />
									<label for="tabId">
										{foreach from=$lang item=val}
											{if $val.rLabelName == $data.selected_feature_details[i].vTitle}
												{$val.rField}
											{/if}
										{/foreach}
									</label>
								</li>
								<!--<li>
								<input tabindex="18" type="checkbox" id="line-checkbox-2" checked>
								<label for="line-checkbox-2">Checkbox 2</label>
								</li>-->
							</ul>
						</div>
					{/if}  
				{/section}				  
				<!--<div class="label">Locations</div>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>
				<label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>-->
			</div>
			{if $data['selected_iPad_tab']|@count gt 0}
				<div class="button_row">
					<div class="button_1">
						<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
							<tr>
								<td>
									<label class="spec_label">These sections already have backgrounds assigned:</label>
								</td>
							</tr>
						</table>
					</div>			   
				</div>		 
				<div class="button_row1">				
					<!--<div class="label">Home Screen</div>-->				
					<!--<div class="label">Tabs</div>-->				
					{section name=i loop=$data.selected_feature_details}
						{if in_array($data.selected_feature_details[i].iAppTabId,$data['selected_iPad_tab'])}
							<!-- <label class="lbl_checkbox">
							<input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
							{if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}
							</label>-->					
							<div class="skin skin-line-ipad skin_line_cross">
								<ul class="list tabs_checked">
									<li>
										<input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="iPad_closecheck"  />
										<label for="tabId">
											{if $data.selected_feature_details[i].vTitle == ""}
												{$data.selected_feature_details[i].default_vTitle}
											{else}
												{$data.selected_feature_details[i].vTitle}
											{/if}
										</label>
									</li>								
								</ul>
							</div>
						{/if}
					{/section}				  
					<!--<div class="label">Locations</div>-->
				</div>
			{/if}
		</form>	  
	</div>
	<!-- </div></div> -->
	<!--ipad coding setting end-->		
	<div class="fix_div_top">
		<!--<div class="button_1">
		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
		<tr>
		<td><label class="spec_label">Set home screen sliding images </label></td>
		<td><label>Auto Switching Mode: <a class="tooltip_text" href="#"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/><span><img class="callout_text" src="{$data.base_image}callout.gif" /> You can disalbe automatic home sliding image switching, or set it with either sliding or fading effect.</span></a></label></td>
		<td>
		<ul class="tab_select">
		<li {if $data.exist_slider_img.vSliderMode eq 'hide'}class="active"{/if}><a href="javascript:void(0);" data_type="hide" >Disable</a></li>
		<li {if $data.exist_slider_img.vSliderMode eq 'slide'}class="active"{/if}><a href="javascript:void(0);" data_type="slide">Sliding</a></li>
		<li {if $data.exist_slider_img.vSliderMode eq 'fade'}class="active"{/if}><a href="javascript:void(0);" data_type="fade">Fade</a></li>
		<li {if $data.exist_slider_img.vSliderMode eq 'blind'}class="active"{/if}><a href="javascript:void(0);" data_type="blind">Blind</a></li>
		<li {if $data.exist_slider_img.vSliderMode eq 'clip'}class="active"{/if}><a href="javascript:void(0);" data_type="clip">Clip</a></li>
		<li {if $data.exist_slider_img.vSliderMode eq 'drop'}class="active"{/if}><a href="javascript:void(0);" data_type="drop">Drop</a></li>
		</ul>
		</td>
		</tr>
		</table>
		</div> -->
		<div class="button_1">
			<!--<div class="item_1">
			<a class="lnk_linkedit" href="#"><img src="{$data.base_logo}lnk_buttons.png"></a>
			{if $data.exist_slider_img['iSliderImg1Id'] == 0 || $data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg1Id']].vImage == ""}
			{foreach from=$lang item=val}
			{if $val.rLabelName == 'no-image itom1'}
			<img class="img_noimg" src="{$data.base_logo}{$val.rField}.png" id="slideimg1" >
			{/if}
			{/foreach}
			{else}
			<img class="img_noimg" src="{$data.base_upload}background_image/{$data.exist_slider_img['iSliderImg1Id']}/{$data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg1Id']].vImage}" size="32x43" id="slideimg1">
			{/if}
			<span class="label_item">Slider 1</span>
			<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(1);"><img src="{$data.base_logo}triangle.png" size="32x43"></a>
			<div class="hidden_div_show" id="hidden_div_show_1">
			<a class="close_bar" href="#">&nbsp;</a>
			{section name = i loop = $data.allBackImgByApp}
			<a class="lnk_slider_item" href="javascript:void(0);">
			<img src="{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}" size="32x43" onclick="set_slide_img(1,'{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}')">
			</a>
			{/section}
			</div>
			</div> -->
			<!--<div class="item_1">
			<a class="lnk_linkedit" href="#"><img src="{$data.base_logo}lnk_buttons.png"></a>
			{if $data.exist_slider_img['iSliderImg2Id'] == 0 || $data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg2Id']].vImage == ""}
			{foreach from=$lang item=val}
			{if $val.rLabelName == 'no-image itom1'}
			<img class="img_noimg" src="{$data.base_logo}{$val.rField}.png" id="slideimg1" >
			{/if}
			{/foreach}
			{else}
			<img class="img_noimg" src="{$data.base_upload}background_image/{$data.exist_slider_img['iSliderImg2Id']}/{$data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg2Id']].vImage}" size="32x43" id="slideimg2">
			{/if}
			<span class="label_item">Slider 2</span>
			<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(2);"><img src="{$data.base_logo}triangle.png"></a>
			<div class="hidden_div_show" id="hidden_div_show_2">
			<a class="close_bar" href="#">&nbsp;</a>
			{section name = i loop = $data.allBackImgByApp}
			<a class="lnk_slider_item" href="javascript:void(0);">
			<img src="{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}" size="32x43" onclick="set_slide_img(2,'{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}')">
			</a>
			{/section}
			</div>
			</div -->
			<!--<div class="item_1">
			<a class="lnk_linkedit" href="#"><img src="{$data.base_logo}lnk_buttons.png"></a>
			{if $data.exist_slider_img['iSliderImg3Id'] == 0 || $data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg3Id']].vImage == ""}
			{foreach from=$lang item=val}
			{if $val.rLabelName == 'no-image itom1'}
			<img class="img_noimg" src="{$data.base_logo}{$val.rField}.png" id="slideimg1" />
			{/if}
			{/foreach}
			{else}
			<img class="img_noimg" src="{$data.base_upload}background_image/{$data.exist_slider_img['iSliderImg3Id']}/{$data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg3Id']].vImage}" size="32x43" id="slideimg3" />
			{/if}
			<span class="label_item">Slider 3</span>
			<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(3);"><img src="{$data.base_logo}triangle.png" /></a>
			<div class="hidden_div_show" id="hidden_div_show_3">
			<a class="close_bar" href="#">&nbsp;</a>
			{section name = i loop = $data.allBackImgByApp}
			<a class="lnk_slider_item" href="javascript:void(0);">
			<img src="{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}" size="32x43" onclick="set_slide_img(3,'{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}')" />
			</a>
			{/section}
			</div>
			</div>-->
			<!--<div class="item_1">
			<a class="lnk_linkedit" href="#"><img src="{$data.base_logo}lnk_buttons.png"></a>
			{if $data.exist_slider_img['iSliderImg4Id'] == 0 || $data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg4Id']].vImage == ""}
			{foreach from=$lang item=val}
			{if $val.rLabelName == 'no-image itom1'}
			<img class="img_noimg" src="{$data.base_logo}{$val.rField}.png" id="slideimg1" >
			{/if}
			{/foreach}
			{else}
			<img class="img_noimg" src="{$data.base_upload}background_image/{$data.exist_slider_img['iSliderImg4Id']}/{$data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg4Id']].vImage}" size="32x43" id="slideimg4">
			{/if}
			<span class="label_item">Slider 4</span>
			<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(4);"><img src="{$data.base_logo}triangle.png"></a>
			<div class="hidden_div_show" id="hidden_div_show_4">
			<a class="close_bar" href="#">&nbsp;</a>
			{section name = i loop = $data.allBackImgByApp}
			<a class="lnk_slider_item" href="javascript:void(0);">
			<img src="{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}" size="32x43" onclick="set_slide_img(4,'{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}')">
			</a>
			{/section}
			</div>
			</div>-->
			<!--<div class="item_1">
			<a class="lnk_linkedit" href="#"><img src="{$data.base_logo}lnk_buttons.png"></a>
			{if $data.exist_slider_img['iSliderImg5Id'] == 0 || $data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg5Id']].vImage == ""}
			{foreach from=$lang item=val}
			{if $val.rLabelName == 'no-image itom1'}
			<img class="img_noimg" src="{$data.base_logo}{$val.rField}.png" id="slideimg1" >
			{/if}
			{/foreach}
			{else}
			<img class="img_noimg" src="{$data.base_upload}background_image/{$data.exist_slider_img['iSliderImg5Id']}/{$data.all_backimg_by_backgroundid[$data.exist_slider_img['iSliderImg5Id']].vImage}" size="32x43" id="slideimg5">
			{/if}
			<span class="label_item">Slider 5</span>
			<a class="lnk_select_sliding" href="javascript:void(0);" onclick="tgl_div(5);"><img src="{$data.base_logo}triangle.png"></a>
			<div class="hidden_div_show" id="hidden_div_show_5">
			<a class="close_bar" href="#">&nbsp;</a>
			{section name = i loop = $data.allBackImgByApp}
			<a class="lnk_slider_item" href="javascript:void(0);">
			<img src="{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}" size="32x43" onclick="set_slide_img(5,'{$data.base_upload}background_image/{$data.allBackImgByApp[i].iBackgroundId}/{$data.allBackImgByApp[i].vImage}')">
			</a>
			{/section}
			</div>
			</div>-->
		</div>
	</div>
	<!--iPad coding end-->
</div>
<div class="applicationbackgroundimages"></div>
<div id="bimg_details">    
	{include file="back_img_detail_popup.tpl" }		
</div>
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			var callbacks_list = $('.demo-callbacks ul');
			$('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
				callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
			}).iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
		});
		/*Description: Modifide:-change in iphone select box  
		Name: Chavda Hem
		Date: 20-5-2014 */
		$(document).ready(function(){
			$('.skin-line-mobile input').each(function(){
				var self = $(this),
				label = self.next(),
				label_text = label.text();
				label.remove();
				self.iCheck({
					checkboxClass: 'icheckbox_line-blue',
					radioClass: 'iradio_line-blue',
					insert: '<div class="icheck_line-icon"></div>' + label_text
				});
			});
			$('.skin-line-iphone input').each(function(){
				var self = $(this),
				label = self.next(),
				label_text = label.text();
				label.remove();
				self.iCheck({
					checkboxClass: 'icheckbox_line-blue',
					radioClass: 'iradio_line-blue',
					insert: '<div class="icheck_line-icon"></div>' + label_text
				});
			});
			$('.skin-line-ipad input').each(function(){
				var self = $(this),
				label = self.next(),
				label_text = label.text();
				label.remove();
				self.iCheck({
					checkboxClass: 'icheckbox_line-blue',
					radioClass: 'iradio_line-blue',
					insert: '<div class="icheck_line-icon"></div>' + label_text
				});
			});
			$('#selectAll').on('ifChecked', function(event){
				$('.democls').iCheck('check');
			});
			$('#selectAll').on('ifUnchecked', function(event){
				$('.democls').iCheck('uncheck');
			});
			$('.close_checkbox').on('ifClicked', function(event){
				var iAppTabId = $(this).val();
				var iApplicationId='{/literal}{$data['iApplicationId']}{literal}';
				var extra='';
				extra+='?iApplicationId='+iApplicationId;
				extra+='&iAppTabId='+iAppTabId;
				extra+='&Operation=Delete';
				var url = base_url+'app/saveBackgroundSetting';
				var pars=extra;
				show_loading();
				$.post(url+pars,function(data){	 
					hide_loading();                
					$("#background_setting").html(data.trim());	 
				});
			});
			$('.iPad_closecheck').on('ifClicked', function(event){  
				var iAppTabId = $(this).val();
				var appType=$("#app_type").val();	
				var iApplicationId='{/literal}{$data['iApplicationId']}{literal}';
				var extra='';
				extra+='?iApplicationId='+iApplicationId;
				extra+='&iAppTabId='+iAppTabId;
				extra+='&Operation=Delete';
				extra+='&App_type='+appType;
				var url = base_url+'app/saveBackgroundSetting';
				var pars=extra;
				show_loading();
				$.post(url+pars,function(data){
					hide_loading();
					$("#back_ipads").html(data.trim());	 
				});
			});
			$('#selectAll_iPad_tab').on('ifChecked', function(event){
				$('.ipad_checkbox').iCheck('check');
			});
			$('#selectAll_iPad_tab').on('ifUnchecked', function(event){
				$('.ipad_checkbox').iCheck('uncheck');
			});

			$('#selectAll_iPhone_tab').on('ifChecked', function(event){
				$('.iphone_checkbox').iCheck('check');
			});

			$('#selectAll_iPhone_tab').on('ifUnchecked', function(event){
				$('.iphone_checkbox').iCheck('uncheck');
			});
		});
		function deleteAppImage(iBackgroundId,divId){
			var msg = confirm("Are you sure, You want to delete this image?");
			if (msg == true){		    
				var url = base_url+'app/deleteBackgroundImg';			
				var appType=$("#common_tab").val();
				var iApplicationId='{/literal}{$data['iApplicationId']}{literal}';
				var extra='';
				extra+='?iApplicationId='+iApplicationId;
				extra+='&iBackgroundId='+iBackgroundId;
				extra+='&Operation=Delete';
				extra+='&App_type='+appType;			
				var pars=extra;
				show_loading();
				$.post(url+pars,function(data){
					hide_loading();			   
					$("#"+divId).html(data.trim());			   
				});
			}
			else{
				return false;
			}
		}
		function detailsAppImage(iBackgroundId,imagename){
			var url = base_url+'app/detailBackgroundImg';			
			var appType=$("#common_tab").val();
			var iApplicationId='{/literal}{$data['iApplicationId']}{literal}';
			var extra='';
			extra+='?iApplicationId='+iApplicationId;
			extra+='&iBackgroundId='+iBackgroundId;
			extra+='&App_type='+appType;
			extra+='&vImage='+imagename;			
			var pars=extra;
			//alert(pars);return false;
			show_loading();
			$.post(url+pars,function(data){
				hide_loading();
				$("#bimg_details").html(data);		
				$("#back_img_detail").modal('show');			   
			});
		}
		if($('.tab_select')){
			$(".tab_select li a").click(function() {
				var type = $(this).attr("data_type");   
				$(this).parent().addClass('active').siblings().removeClass('active');
				$('#slidermode').val(type);
			});
		}
	</script>
{/literal}