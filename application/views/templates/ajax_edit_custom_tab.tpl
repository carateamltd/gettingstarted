<form name="frm_edit_tab" id="frm_edit_tab" method="POST" action="{$data.base_url}app/update_custom_tab" enctype="multipart/form-data">
   <input type="hidden" value="{$data.exist_record.iAppTabId}"  name="iAppTabId">
    <input type="hidden" value="{$data.exist_record.iApplicationId}"  name="data[iApplicationId]">
	<input type="hidden" value="{$data['step']}"  name="step" id="step">	 
    <div class="toptab">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Tab Title'}{$val.rField}:{/if}{/foreach}</strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />Enter title</span></a>--></th>
				<th align="left"><strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Tab Function'}{$val.rField}:{/if}{/foreach}</strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />Select function</span></a>--></th>
				<th align="left"></th>
			</tr>
			<tr>
				<td>

				{if $data.exist_record.vTitle == ""}
					<input class="indst" type="text" data-toggle="tooltip" data-placement="right" title="" value="{$data.exist_record.vTitle}" size="30" id="edit_icon_vTitle" name="data[vTitle]" maxlength="20" minlength="2" onblur="return checkTitleLength();">
				{else}
					{$checkName=0}
					{foreach from=$lang item=val}
						{if $val.rLabelName == {$data.exist_record.vTitle}}
							<input class="indst" type="text" data-toggle="tooltip" data-placement="right" title="" value="{$val.rField}" size="30" id="edit_icon_vTitle" name="data[vTitle]" maxlength="20" minlength="2" onblur="return checkTitleLength();">
							{$checkName=1}
						{/if}
					{/foreach}
					{if $checkName==0}
						<input class="indst" type="text" data-toggle="tooltip" data-placement="right" title="" value="{$data.exist_record.vTitle}" size="30" id="edit_icon_vTitle" name="data[vTitle]" maxlength="20" minlength="2" onblur="return checkTitleLength();">
					{/if}
				{/if}
					
				
				
				</td>
				<td>
					
					{if ($data.exist_record.iFeatureId == $data.flag)}
						<select class="indst" id="edit_icon_iFeatureId" name="data[iFeatureId]">
							<option value="">Select Tab</option>
							 {section name = i loop = $data.all_appindustryfeature}
								
								<option value="{$data.all_appindustryfeature[i].iFeatureId}" {if $data.all_appindustryfeature[i].iFeatureId == $data.exist_record.iFeatureId }selected="selected"{/if}>{foreach from=$lang item=val}{if $val.rLabelName == $data.all_appindustryfeature[i].vTitle}{$val.rField}{/if}{/foreach}</option>
								
							{/section}
						</select>
					{else}		
						<select class="indst" id="edit_icon_iFeatureId" name="data[iFeatureId]">
						<option value="">Select Tab</option>
						 {section name = i loop = $data.all_appindustryfeature}

							{if ($data.flag == $data.all_appindustryfeature[i].iFeatureId)}
             				{else}
							<option value="{$data.all_appindustryfeature[i].iFeatureId}" {if $data.all_appindustryfeature[i].iFeatureId == $data.exist_record.iFeatureId }selected="selected"{/if}>{foreach from=$lang item=val}{if $val.rLabelName == $data.all_appindustryfeature[i].vTitle}{$val.rField} {/if}{/foreach}</option>
							{/if}
						{/section}
						</select>
					{/if}	

				</td>
				<td><input type="hidden" value="No"  name="data[eActive]"><input class="indst" type="checkbox" maxlength="12" value="Yes" size="30"  name="data[eActive]" {if $data.exist_record.eActive == 'Yes'}checked{/if}> {foreach from=$lang item=val}{if $val.rLabelName == 'Active'}{$val.rField}{/if}{/foreach}</td>
			</tr>
	
		</table>
    </div>
    
    <div class="midparttp">
		<strong>{foreach from=$lang item=val}{if $val.rLabelName == 'Tab Icon'}{$val.rField}{/if}{/foreach}</strong>&nbsp;<!--<a class="tooltip_text" href="javascript:void(0);"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span> <img class="callout_text" src="{$data.base_image}callout.gif" />Select icon</span></a>--><br>
		<input type="file" value=""  name="vImage" onchange="CheckValidFile(this.value,'tab_img');" id="tab_img"><br><br>
		<input type="hidden" value="{$data.exist_record.iIconId}"  name="data[iIconId]" id="selectediconId">
		<div class="icon_img_box">
			{section name = i loop = $data.all_icons}				
				<img  src="{$data.base_upload}tab_icon/{$data.default_icon.iIconcolorId}/{$data.all_icons[i].vImage}" onclick="select_tab_icon({$data.all_icons[i].iIconId});" id="ticon-{$data.all_icons[i].iIconId}" class="{if $data.all_icons[i].iIconId == $data.exist_record.iIconId}selected_image{else}ticonimage{/if}"/>
			{/section}
		</div>
 
    </div>
    
</form>

<script type="text/javascript">
$(document).ready(function(){
    $("#edit_icon_vTitle").attr('maxlength','20');
    $('#edit_icon_vTitle[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
  
});  
</script>