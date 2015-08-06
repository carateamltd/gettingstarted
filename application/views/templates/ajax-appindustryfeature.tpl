<ul id="atleastone">
	{section name = i loop = $data.appindustryfeature}
		<li><input name="appfeatureicon[{$data.appindustryfeature[i].iFeatureId}]" type="hidden" value="{$data.appindustryfeature[i].iIconId}" checked/><input name="appfeature[{$data.appindustryfeature[i].iFeatureId}]" type="checkbox" value="" checked/> <span><img src="{$data.base_upload}tab_icon/{$data.default_icon.iIconcolorId}/{$data.custom_all_icons[$data.appindustryfeature[i].iIconId].vImage}" alt="" height="20" width="20"/></span> <span>
			{foreach from=$lang item=val}{if $val.rLabelName == $data.appindustryfeature[i].vTitle}{$val.rField}:{/if}{/foreach}
		</span></li>
	{/section}
</ul>	
