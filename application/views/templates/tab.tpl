
<div class="tabingbtn">
	{if $data.tpl_name == 'view-app-step2.tpl'}<div class="activetab">{else}<div class="tbtn">{/if}
		<a href="{$data.base_url}app/step2/{$data.iApplicationId}">
			<span><img src="{$data.base_image}settings.png" alt="" /></span>
			<h2>1. {foreach from=$lang item=val}
             {if $val.rLabelName == 'Functionality'}
                {$val.rField}
             {/if}
             {/foreach}</h2>
			<p>{foreach from=$lang item=val}
             {if $val.rLabelName == 'Customize App Tabs'}
                {$val.rField}
             {/if}
             {/foreach}</p>
		</a>								
	</div>
	{if $data.tab_cnt == 0}
		<div class="tbtn dvdisable">
	{else}
		{if $data.tpl_name == 'view-app-step3.tpl'}<div class="activetab ">{else}<div class="tbtn">{/if}
	{/if}
		<a href="{$data.base_url}app/step3/{$data.iApplicationId}">
			<span><img src="{$data.base_image}content.png" alt="" /></span>
			<h2>2. {foreach from=$lang item=val}
             {if $val.rLabelName == 'Content'}
                {$val.rField}
             {/if}
             {/foreach}</h2>
			<p>{foreach from=$lang item=val}
             {if $val.rLabelName == 'Customize App Content'}
                {$val.rField}
             {/if}
             {/foreach}</p>
		</a>								
	</div>
	{if $data.tab_cnt == 0}
		<div class="tbtn dvdisable">
	{else}
	{if $data.tpl_name == 'view-app-step4.tpl' or  $data.tpl_name == 'newdesign_templates.tpl'}<div class="activetab">{else}<div class="tbtn">{/if}
	{/if}
		<a href="{$data.base_url}app/step4/{$data.iApplicationId}">
			<span><img src="{$data.base_image}appearance.png" alt="" /></span>
			<h2>3. {foreach from=$lang item=val}
             {if $val.rLabelName == 'Appearance'}
                {$val.rField}
             {/if}
             {/foreach}</h2>
			<p>{foreach from=$lang item=val}
             {if $val.rLabelName == 'Customize App Appearance'}
                {$val.rField}
             {/if}
             {/foreach}</p>
		</a>								
	</div>
	{if $data.tab_cnt == 0}
		<div class="tbtn dvdisable">
	{else}
		{if $data.tpl_name == 'view-app-step5.tpl'}<div class="activetab">{else}<div class="tbtn">{/if}
	{/if}
		<a href="{$data.base_url}app/step5/{$data.iApplicationId}">
			<span><img src="{$data.base_image}preview.png" alt="" /></span>
			<h2>4. {foreach from=$lang item=val}
             {if $val.rLabelName == 'Preview'}
                {$val.rField}
             {/if}
             {/foreach}</h2>
			<p>{foreach from=$lang item=val}
             {if $val.rLabelName == 'Preview Your Applications'}
                {$val.rField}
             {/if}
             {/foreach}</p>
		</a>								
	</div>
	{if $data.tab_cnt == 0}
		<div class="tbtn dvdisable">
	{else}
	{if $data.tpl_name == 'view-app-step6.tpl'}<div class="activetab">{else}<div class="tbtn">{/if}
	{/if}
		<a href="{$data.base_url}app/step6/{$data.iApplicationId}">
			<span><img src="{$data.base_image}Publish.png" alt="" /></span>
			<h2>5. {foreach from=$lang item=val}
             {if $val.rLabelName == 'Publish'}
                {$val.rField}
             {/if}
             {/foreach}</h2>
			<p>{foreach from=$lang item=val}
             {if $val.rLabelName == 'Publish To App Stores'}
                {$val.rField}
             {/if}
             {/foreach}</p>
		</a>								
	</div>
</div>

