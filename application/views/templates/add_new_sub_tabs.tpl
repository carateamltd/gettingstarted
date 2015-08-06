 <div id="add_new_subtab" class="modal hide fade" tabindex="-1" >
   <div class="modal-header">
    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>-->
    <h3 id="myModalLabel">
    			{foreach from=$lang item=val}{if $val.rLabelName == 'New App Tab Details'}
						   		{$val.rField}
				  	{/if}{/foreach}</h3>
  </div>
  <br>
  <div id="subtab_validation"></div>
  <div class="modal-body">
    
    
    <form name="addSubTab" id="addSubTab" method="POST" action="{$data.base_url}app/addNewSubTab" enctype="multipart/form-data">
    <input type="hidden" value="{if $data['iSubTabId'] neq ''}{$data['AllSubTabImages']['iApplicationId']}{else}{$data.iApplicationId}{/if}"  name="data[iApplicationId]" id="iApplicationId">
    <input type="hidden" value="{$data['AllSubTabImages']['iIconId']}"  name="data[iIconId]" id="iIconId">
    <input type="hidden" value="{$data['iSubTabId']}"  name="iSubTabId" id="iSubTabId">
    <div class="toptab">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Tab Title'}
						   		{$val.rField}
						   	{/if}{/foreach}</strong> <span class="qmark">&nbsp;</span></th>
				<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Tab Label Text Color'}
						   		{$val.rField}
						   	{/if}{/foreach}</strong> <span class="qmark">&nbsp;</span></th>				
				<th align="left"></th>
			</tr>
			<tr>
				<td>
				<input class="indst" type="text" value="{if $data['iSubTabId'] neq ''}{$data['AllSubTabImages']['vTabTitle']}{/if}" size="30" id="icon_vTitle" name="data[vTabTitle]">
				</td>
				<td>		
					<input class="indst" type="text" value="{if $data['iSubTabId'] neq ''}{$data['AllSubTabImages']['vLableTextColor']}{/if}" size="30" id="text_color" name="data[vLableTextColor]">
				    <!--<input type="text"  value="rgb(0,194,255,0.78)" id="textColor" data-color-format="rgba" class="cp2 color_text_hide" style="width:25px !important;background:rgb(255,255,255);">-->
				</td>
				
				<td>
				  <input type="checkbox" value="Yes" id="ActiveSubTab"  name="data[eActive]" {if $data['iSubTabId'] neq ''}{if $data['AllSubTabImages']['eActive'] eq 'Yes'}checked{/if}{/if} >
				     {foreach from=$lang item=val}{if $val.rLabelName == 'Active Tab'}
						   		{$val.rField}
						   	{/if}{/foreach}
				</td>
			</tr>
	
		</table>
    </div>
    
    <div class="midparttp">
		<strong>Select a tab</strong> <span class="qmark">&nbsp;</span><br>		
		<select name="data[iAppTabId]" id="iAppTabId" name="data[iAppTabId]" >
				    <option value="">-- Choose --</option>					  
				     {section name=i loop=$data.selected_feature_details}					 
					 {if $data.selected_feature_details[i].vTitle neq "Home" || $data.selected_feature_details[i].default_vTitle neq "Home"}
					  <option value="{$data.selected_feature_details[i].iAppTabId}" {if $data.selected_feature_details[i].iAppTabId eq $data['AllSubTabImages']['iAppTabId']} selected{/if}>
					   {if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}
					  </option>
					  {/if}
					  {/section}
				  </select>	
		  
		<div class="icon_img_box">
			{section name = i loop = $data.all_icons}
				<img  src="{$data.base_upload}tab_icon/{$data.default_icon.iIconcolorId}/{$data.all_icons[i].vImage}"
					 onclick="return putIconId({$data.all_icons[i].iIconId});"
					 id="eticon-{$data.all_icons[i].iIconId}"
					 {if $data['iSubTabId'] neq ''}
					 {if $data['AllSubTabImages']['iIconId'] eq $data.all_icons[i].iIconId}class="selected_image"{else} class="ticonimage"{/if}{/if}/>
			{/section}
		</div>
 
    </div>
    
    </form>
    
  </div>
  <div class="modal-footer">
    <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>-->
    <button type="button" class="btn btn-primary" id="saveTabData" onclick="return saveTabData();" >{foreach from=$lang item=val}{if $val.rLabelName == 'Save Changes'}
						   		{$val.rField}
						   	{/if}{/foreach}</button>
    <button type="button" class="btn btn-primary" id="hideSubTabPopup" onclick="return hideSubTabPopup();">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}
						   		{$val.rField}
						   	{/if}{/foreach}</button>
  </div>
  
</div>