<div class="tab_main_title">
  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table_new">
	 <tr>
			<td width="350" align="left" style="padding-left: 20px;">
				<h2>{foreach from=$lang item=val}{if $val.rLabelName == 'App Layout'}{$val.rField}{/if}{/foreach}<!--<a href="javascript:void(0);" class="tooltip_text"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Arrange your app’s tab order by resorting the list below.<br/>Just drag the tab to any new location, or disable it by dragging to [Inactive] section.</span></a>--></h2>
			</td>
	 </tr>
  </table>
</div>
<!-- 
Modified By : Nizam Kadri
Modified Date : 02/06/2014
Issue Fixed of : App Layout word Wrapping.
-->
<div id="both_avtiveInactiveTab" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">
  <div class="div_inactive_tabs" >  
		 <h3>{foreach from=$lang item=val}{if $val.rLabelName == 'Inactive'}{$val.rField} Tabs{/if}{/foreach} </h3>
		  <div class="page_line1">Page <strong>1</strong></div>
		  <ul class="inactive_list_icon" id="inactive_list_icons" >
			 {section name=i loop=$data.selected_feature_details}			 
			   {if $data.selected_feature_details[i].eActive eq 'No'}
				  <li id="{$data.selected_feature_details[i].iAppTabId}" >
					<div class="tab_custom_button">
						<div class="button_back"><img  src="{$data.base_logo}icon_back_area.png"></div>
						<div class="overlay_icon_color"></div>
						<div class="icon_btnpack">
						  <img src="{$data.base_upload}tab_icon/{$data.selected_feature_details[i].iIconcolorId}/{$data.selected_feature_details[i].vImage}" />					
						</div>
						<div class="title_icn" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">{$data.selected_feature_details[i].vTitle}</div>
					</div>
					<div class="fright_link_title" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">{$data.selected_feature_details[i].vTitle}</div>
					<div class="fright_link">				    
						 <!--
       						Modified By : Nizam Kadri
					        Modified Date : 17-05-2014 
					        Purpose : Purpose to set User on same page while he/she click on navigation help icon.
					      -->
						<!--<a title="Details" class="lnk_eachtab_design" href="#" ><img src="{$data.base_logo}detail_icon.png"></a>-->
						<a title="Details" class="lnk_eachtab_design" href="javascript:void(0);" onclick="edit_custom_tab('{$data.selected_feature_details[i].iAppTabId}','{$data['step']}');"><i class="icon-edit"></i></a>
						<br><br>
						<!--<a title="Make Inactive" class="lnk_eachtab_inactive" href="#"><img src="{$data.base_logo}remove_icon.png"></a>-->
						<a title="Make Inactive" class="lnk_eachtab_inactive" href="javascript:void(0);" onclick="return makeInActive('{$data.selected_feature_details[i].iAppTabId}','{$data['iApplicationId']}');"><i class="icon-bitbucket"></i><!--<img src="{$data.base_logo}remove_icon.png">--></a>
					</div>
				</li>		 
			   {/if}		
			 {/section}		
		  </ul>
  </div>

  <div class="div_active_tabs">
		  <h3>{foreach from=$lang item=val}{if $val.rLabelName == 'Onlgets'}{$val.rField} {/if}{/foreach}  </h3>
		  <div class="page_line2">Page <strong>1</strong></div>
		  <ul class="active_list_icon" id="active_list_icons" >
		    {section name=i loop=$data.selected_feature_details}
			 {if $data.selected_feature_details[i].eActive eq 'Yes'}		  
			   <li id="{$data.selected_feature_details[i].iAppTabId}">
				  <div class="tab_custom_button">
					  <div class="button_back"><img  src="{$data.base_logo}icon_back_area.png"></div>
					  <div class="overlay_icon_color"></div>
					  <div class="icon_btnpack">
						<img src="{$data.base_upload}tab_icon/{$data.selected_feature_details[i].iIconcolorId}/{$data.selected_feature_details[i].vImage}" />
					  </div>
					  <div class="title_icn" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">
					 
					 {foreach from=$lang item=val}{if $val.rLabelName == {$data.selected_feature_details[i].vTitle}}{$val.rField} {/if}{/foreach} 
				  </div>
				  </div>
				  <div class="fright_link_title" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">
				  {foreach from=$lang item=val}{if $val.rLabelName == {$data.selected_feature_details[i].vTitle}}{$val.rField} {/if}{/foreach} 
			   </div>
				  <div class="fright_link">
					  <a title="Details" class="lnk_eachtab_design botspash" href="javascript:void(0);" onclick="edit_custom_tab('{$data.selected_feature_details[i].iAppTabId}','{$data['step']}');"><i class="icon-edit"></i><!--<img src="{$data.base_logo}detail_icon.png">--></a>
					  <br>
					  <a title="Make Inactive" class="lnk_eachtab_inactive" href="javascript:void(0);" onclick="return makeInActive('{$data.selected_feature_details[i].iAppTabId}','{$data['iApplicationId']}');"><i class="icon-bitbucket"></i><!--<img src="{$data.base_logo}remove_icon.png">--></a>
				  </div>
			   </li>
			 {/if}
		    {/section}
		  </ul>
  </div>
</div>




<!-- Modal -->
<div id="myModal_edit_btn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    <h3 id="myModalLabel">{foreach from=$lang item=val}{if $val.rLabelName == 'Edit App Tab Detailss'}{$val.rField} {/if}{/foreach} </h3>
  </div>
  <br>
  <div id="validation"></div>
  <div class="modal-body" id="edit_tab_btn">  
    
 
    
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary" id="update_icon">{foreach from=$lang item=val}{if $val.rLabelName == 'Save Changes'}{$val.rField} {/if}{/foreach}</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}{$val.rField} {/if}{/foreach}</button>
  </div>
</div>