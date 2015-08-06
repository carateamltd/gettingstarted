<!-- Modal -->
<div id="myModal_set_backimg" class="modal hide fade modalsetbg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="myModalLabel">{foreach from=$lang item=val}{if $val.rLabelName == 'Set a Background Image'}{$val.rField}{/if}{/foreach}</h3>
  </div>
  <br>
  <div id="err"></div>
  <div class="modal-body">
	
	<!--<div class="popuprow">
		<div class="popupleftpart">dfs</div>
		<div class="popuprightpart">fs</div>
	</div>-->
	<div class="popuprow">sdgdsgsd</div>
    <div class="background_tab">
		<ul>
			<li ><a href="#background_tab_yi">{foreach from=$lang item=val}{if $val.rLabelName == 'Your Image'}{$val.rField}{/if}{/foreach} </a></li>
			<li ><a href="#background_tab_pi">{foreach from=$lang item=val}{if $val.rLabelName == 'Preset Image'}{$val.rField}{/if}{/foreach} </a></li>
		</ul>
		<form name="frm_add_back_img" id="frm_add_back_img" method="POST" action="{$data.base_url}app/set_default_background_image" enctype="multipart/form-data">
		<div class="uploadimage">
			<input type="file" name="vImage" id="file" onchange="CheckValidFile(this.value,'file');" style="width:220px;" >
			  <button type="button" class="btn btn-inverse" id="upld_bcimg" >{foreach from=$lang item=val}{if $val.rLabelName == 'Upload Photo'}{$val.rField}{/if}{/foreach}</button>
		</div>
		<div id="background_tab_yi">
		<div class="background_box">
				{section name = i loop = $data.your_tabbackground}				
				
					<div class="boxwrapimg">
						<div class="imgboxbg1"><img  src="{$data.base_upload}background_image/{$data.your_tabbackground[i].iBackgroundId}/{$data.your_tabbackground[i].vImage}" onclick="bimgselect_tab_icon({$data.your_tabbackground[i].iBackgroundId});" id="eticon-{$data.all_tabcustomicon[i].iTabcustomiconId}" class="bticonimage"/></div>
						<div class="selectedimg" style="display:none;" id="selectedimg_{$data.your_tabbackground[i].iBackgroundId}">
						<!--<img src="{$data.base_image}selected.png">-->
						{foreach from=$lang item=val}
						 {if $val.rLabelName == 'selected'}
							<img src="{$data.base_image}{$val.rField}.png">
						 {/if}
						{/foreach}
						</div>
						<div class="boxinfo">
							<h3 id="bac_img_{$data.your_tabbackground[i].iBackgroundId}">{$data.your_tabbackground[i].vImage}</h3>
							<!--p>640 x 860</p>
							<p>425.21 KB</p-->
							<span class="prvicon"><a href="{$data.base_upload}background_image/{$data.your_tabbackground[i].iBackgroundId}/{$data.your_tabbackground[i].vImage}" target="_blank"><img src="{$data.base_image}preview-icon.png" width="20" height="18" alt="" /></a></span>						</div>
						</div>
						
						
				{/section}
					</div>
				<div style="clear:both;"></div>
			
		</div>
		<div id="background_tab_pi" class="overscroll">

				<div class="background_box">
				<input type="hidden" value="{$data.selected_feature_details[0].iAppTabId}"  name="data[iAppTabId]" id="back_img_apptabid">
				<input type="hidden" value=""  name="data[iBackgroundimgId]" id="back_img_id">
				<input type="hidden" value="Mobile"  name="data[eType]" id="back_img_type">
				<input type="hidden" value="{$data.iApplicationId}"  name="iApplicationId" >

				{section name = i loop = $data.tabbackground}

					<div class="boxwrapimg">
						<div class="imgboxbg1"><img  src="{$data.base_upload}background_image/{$data.tabbackground[i].iBackgroundId}/{$data.tabbackground[i].vImage}" onclick="bimgselect_tab_icon({$data.tabbackground[i].iBackgroundId});" id="eticon-{$data.all_tabcustomicon[i].iTabcustomiconId}" class="bticonimage" /></div>
						<div class="selectedimg" style="display:none;" id="selectedimg_{$data.tabbackground[i].iBackgroundId}">
						<!--<img src="{$data.base_image}selected.png">-->
						{foreach from=$lang item=val}
						 {if $val.rLabelName == 'selected'}
							<img src="{$data.base_image}{$val.rField}.png">
						 {/if}
						{/foreach}
						</div>
						<div class="boxinfo">
							<h3 id="bac_img_{$data.tabbackground[i].iBackgroundId}">{$data.tabbackground[i].vImage}</h3>
							<!--p>640 x 860</p>
							<p>425.21 KB</p-->
							<span class="prvicon"><a href="{$data.base_upload}background_image/{$data.tabbackground[i].iBackgroundId}/{$data.tabbackground[i].vImage}" target="_blank"><img src="{$data.base_image}preview-icon.png" width="20" height="18" alt="" /></a></span>						</div>
					</div>
				{/section}
			</form>
				
				</div>
			<div style="clear:both;"></div>
		</div>
    
    </div>
    
  </div>
  <div class="modal-footer">
    <span id="sel_back_img_name" style="color:black;">{foreach from=$lang item=val}{if $val.rLabelName == 'No image selected'}{$val.rField}{/if}{/foreach} </span>
    <button class="btn" data-dismiss="modal" aria-hidden="true">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}{$val.rField}{/if}{/foreach}</button>
    <button type="button" class="btn btn-primary" id="save_bcimg" style="display:none;">{foreach from=$lang item=val}{if $val.rLabelName == 'Save My Choice'}{$val.rField}{/if}{/foreach}</button>
  </div>
</div>
