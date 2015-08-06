{section name = i loop = $data.single_newdesign_templates}
<li>
	<div class="theme_room">
		<div class="">
			<a href="#" class="preview"><img  src="{$data.base_upload}newdesign_template/{$data.single_newdesign_templates[i].iTemplateId}/{$data.single_newdesign_templates[i].vImage}" width="150px" /></a>
		</div>
		<div class="label"> Single Row {$smarty.section.i.index+1} </div>
	</div>
</li>
{/section}

{section name = i loop = $data.multi_newdesign_templates}
<li>
	<div class="theme_room">
		<div class="">
			<a href="#" class="preview"><img  src="{$data.base_upload}newdesign_template/{$data.multi_newdesign_templates[i].iTemplateId}/{$data.multi_newdesign_templates[i].vImage}" width="150px" /></a>
		</div>
		<div class="label"> Multi Row {$smarty.section.i.index +1} </div>
	</div>
</li>
{/section}
