<div id="back_img_detail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Background Image Details</h3>
  </div>
  <div class="modal-body">
  	<div class="container-fluid">
  		<div class="row-fluid">
  			<div class="span5">
        {if $data.image_detail}
  				<img  src="{$data.base_upload}background_image/{$data.image_detail.iBackgroundId}/{$data.image_detail.vImage}" style="height:143px;width:100px;">
        {/if}
  			</div>
  			<div class="span7">
  				<h3 style="margin-top: 10px;">Tabs</h3>
  				<ol style="text-align: left;">

            {if $data.assigned_tab}
  						{foreach from=$data.assigned_tab item=tabname}
  							{$tabname['vTitle']} Tab <br>
  						{/foreach}
  					{else}
		  				No tab is assigned with this background.
  					{/if}
  				</ol>
  				<h3 style=" margin-top: 10px;">Sliders</h3>
  				<ol style="text-align: left;">
  					{if $data.assigned_slider}
  						{foreach from=$data.assigned_slider item=slidername}
  							{$slidername}  <br>
  						{/foreach}
  					{else}
		  				No slider is assigned with this background.
  					{/if}
  				</ol>
  			</div>
  		</div>
  	</div>
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>