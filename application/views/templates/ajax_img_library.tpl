<div id="app_bgimage_gallaery" class="modal show fade">
 <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	<h3 id="Select_image">{foreach from=$lang item=val}{if $val.rLabelName == 'Background Information'}{$val.rField}{/if}{/foreach}</h3>
 </div>
 <div class="modal-body">
   <form name="save_app_feature" id="saveAppImage" action="{$data.base_url}app/saveAppImage" method="POST">
	<input type="hidden" name="iApplicationId" value="{$data['iApplicationId']}"/>
	<input type="hidden" name="app_type" value="{$data['eType']}" id="bg_img_type"/>
   <div class="stock_section removebg">			  		
		  <ul>
		   {section name = i loop = $data.all_app_image}
			  <li>
			<!--  {if $data.all_app_image[i]['apptab_deatils']|@count gt 0}	  
			    <span class="tabdata">
			    {section name=j loop=$data.all_app_image[i]['apptab_deatils']}						    
				{if $data.all_app_image[i]['apptab_deatils'][j]['vTitle'] neq ''}
					{$data.all_app_image[i]['apptab_deatils'][j]['vTitle']}</br>
					{else}
					{$data.all_app_image[i]['apptab_deatils'][j]['default_vTitle']}</br>
				   {/if}
			    {/section}
				 </span>						    
			  {/if} -->
			  
				  <img  src="{$data.base_upload}background_image/{$data.all_app_image[i].iBackgroundId}/{$data.all_app_image[i].vImage}">							 
				  <div class="links_bottoms" >
					  <!--<a href="javascript:void(0);">
					    <span class="btn_bg btn_bg_check" id="{$data.all_app_image[i].iBackgroundId}" onclick="selectBackground('{$data.all_app_image[i].iBackgroundId}');">								  
					    </span>
					    <input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="{$data.all_app_image[i].iBackgroundId}">
					  </a>-->
					  <div class="demo-list clear" >
					    <ul>
						  <li >
						  	<input type="checkbox"  id="test" name="iBackgroundimgId[]" value="{$data.all_app_image[i].iBackgroundId}" {if in_array($data.all_app_image[i].iBackgroundId,$data['selectedMobileImgIds'])} disabled {/if}>											 
						    <!--<input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId[]" value="{$data.all_app_image[i].iBackgroundId}">-->
						  </li>
					    </ul>
					  </div>
					  <!--<a href="#"><span class="btn_bg btn_bg_delete"></span></a>
					  <a href="#"><span class="btn_bg btn_bg_details"></span></a>-->
				  </div>
			  </li>
			  {/section}				
		  </ul>
		  <div style="clear:both;"></div>
	  </div>
 </form>
    
 </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-primary" id="saveAppImage" onclick="return saveAppImage();" >{foreach from=$lang item=val}{if $val.rLabelName == 'SaveItem'}{$val.rField}{/if}{/foreach}</button>
	<button class="btn" data-dismiss="modal" aria-hidden="true">{foreach from=$lang item=val}{if $val.rLabelName == 'Close'}{$val.rField}{/if}{/foreach}</button>				
 </div>
</div>
		  
{literal}
<script>
$(document).ready(function(){
 var callbacks_list = $('.demo-callbacks ul');
 $('.demo-list input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
   callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
 }).iCheck({
   checkboxClass: 'icheckbox_square-blue',
   radioClass: 'iradio_square-blue',
   increaseArea: '20%'
 });
});
</script>
{/literal}
		  
		  