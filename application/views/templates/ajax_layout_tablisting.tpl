<div class="div_inactive_tabs">  
		 <h3>Inactive Tabs</h3>
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
						<div class="title_icn">{$data.selected_feature_details[i].vTitle}</div>
					</div>
					<div class="fright_link_title">{$data.selected_feature_details[i].vTitle}</div>
					<div class="fright_link">				    
						<!--<a title="Details" class="lnk_eachtab_design" href="#" ><img src="{$data.base_logo}detail_icon.png"></a>-->
						<a title="Details" class="lnk_eachtab_design" href="javascript:void(0);" onclick="edit_custom_tab('{$data.selected_feature_details[i].iAppTabId}','{$data['step']}');"><i class="icon-edit"></i><!--<img src="{$data.base_logo}detail_icon.png">--></a>
						<br><br>
						<!--<a title="Make Inactive" class="lnk_eachtab_inactive" href="#"><img src="{$data.base_logo}remove_icon.png"></a>-->
						<a title="Make Inactive" class="lnk_eachtab_inactive" href="javascript:void(0);" onclick="return makeInActive('{$data.selected_feature_details[i].iAppTabId}','{$data['iApplicationId']}');"><i class="icon-bitbucket"></i><!--<img src="{$data.base_logo}remove_icon.png">--></a>
					</div>
				</li>		 
			   {/if}		
			 {/section}		
		  </ul>
  </div>
 <!-- 
 Modified by : Nizam Kadri.
 Modified date : 19/05/2014.
 Purpose : To set App Layout's Icons in proper manner without changing color after inactivate the tab.
-->
  <div class="div_active_tabs">
		  <h3>Active Tabs</h3>
		  
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
					  <div class="title_icn">
					 {$data.selected_feature_details[i].vTitle}
				  </div>
				  </div>
				  <div class="fright_link_title">
				  {$data.selected_feature_details[i].vTitle}
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
  
  
{literal}
<script>		 
$("#active_list_icons").sortable({
		 connectWith:"#inactive_list_icons",
		 receive: function(event, ui){			  
		 var url = base_url+'app/udpate_status';			
		 var id=ui.item.attr('id');
		 var extra='';
		 extra+='?id='+id;
		 extra+='&eStatus=Yes';
		 var pars=extra;			
		 $.post(url+pars, function(theResponse){				
		 });
		 }   
});
		 
$("#inactive_list_icons").sortable({
		 connectWith: "#active_list_icons",
		 receive: function(event, ui){			  	
		 var url = base_url+'app/udpate_status';			
		 var id=ui.item.attr('id');
		 var extra='';
		 extra+='?id='+id;
		 extra+='&eStatus=No';
		 var pars=extra;			
		 $.post(url+pars, function(theResponse){				
		 });
		 }	
});	
		 
		 
</script>
{/literal}
  