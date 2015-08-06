                <li id="{$data.selected_feature_details.iAppTabId}" >
				   <div class="tab_custom_button">
					   <div class="button_back"><img  src="{$data.base_logo}icon_back_area.png"></div>
					   <div class="overlay_icon_color"></div>
					   <div class="icon_btnpack">
						{if $data.selected_feature_details.iIconId == 0}
						    <img src="{$data.base_upload}industry_feature/{$data.selected_feature_details.iFeatureId}/{$data.selected_feature_details.default_vImage}">
						{else}
						  <img src="{$data.base_upload}tab_icon/{$data.default_icon.iIconcolorId}/{$data.custom_all_icons[$data.selected_feature_details.iIconId].vImage}">
						{/if}    						
					   </div>
					   <div class="title_icn">{if $data.selected_feature_details.vTitle eq ''}{$data.selected_feature_details.default_vTitle} {else}{$data.selected_feature_details.vTitle}{/if}</div>
				   </div>
					<div class="fright_link">
					  <a onclick="edit_custom_tab({$data.selected_feature_details.iAppTabId},'step4');" href="javascript:void(0);" class="lnk_eachtab_design botspash" title="Details"><i class="icon-edit"></i><!--<img src="http://192.168.1.41/php/slb_new/assets/images/detail_icon.png">--></a>
					  <br>
					  <a onclick="return makeInActive({$data.selected_feature_details.iAppTabId},'1');" href="javascript:void(0);" class="lnk_eachtab_inactive" title="Make Inactive"><i class="icon-bitbucket"></i><!--<img src="http://192.168.1.41/php/slb_new/assets/images/remove_icon.png">--></a>
				  	</div>				   
<!-- 				   <div class="fright_link">
					   <a title="Details" class="lnk_eachtab_design" href="#"><img src="{$data.base_logo}detail_icon.png"></a>
					   <br>
					   <a title="Make Inactive" class="lnk_eachtab_inactive" href="#"><img src="{$data.base_logo}remove_icon.png"></a>
				   </div> -->
			   </li>		