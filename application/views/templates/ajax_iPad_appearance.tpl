<form name="save_iPad_BackgroundSetting" id="save_iPad_BackgroundSetting" method="post" action="{$data.base_url}app/saveBackgroundSetting?iApplicationId={$data['iApplicationId']}">
<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId">	
<input type="hidden" value="" name="" id="slide_info1">
<input type="hidden" value="" name="" id="slide_info2">
<input type="hidden" value="" name="" id="slide_info3">
<input type="hidden" value="" name="" id="slide_info4">
<input type="hidden" value="" name="" id="slide_info5">
<input type="hidden" value="{$data.exist_slider_img.vSliderMode}" name="" id="slidermode">     
<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId">			 

<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId">
<input type="hidden" value="iPad" name="App_type" id="app_type">
 <div id="back-ipad" class="back-mobiles">
	  <div class="stock_section">			  		
		  <ul>
			 {if $data.your_tabbackground|@count gt 0}
		   {section name = i loop = $data.your_tabbackground}
			  <li>
			  {if $data.your_tabbackground[i]['apptab_deatils']|@count gt 0}	  
			    <span class="tabdata">
			    {section name=j loop=$data.your_tabbackground[i]['apptab_deatils']}						    
				{if $data.your_tabbackground[i]['apptab_deatils'][j]['vTitle'] neq ''}
					{$data.your_tabbackground[i]['apptab_deatils'][j]['vTitle']}</br>
					{else}
					{$data.your_tabbackground[i]['apptab_deatils'][j]['default_vTitle']}</br>
				   {/if}
			    {/section}
				 </span>						    
			  {/if}	
				  <img  src="{$data.base_upload}background_image/{$data.your_tabbackground[i].iBackgroundId}/{$data.your_tabbackground[i].vImage}">							 
				  <div class="links_bottoms">
					  <!--<a href="javascript:void(0);">
					    <span class="btn_bg btn_bg_check" id="{$data.your_tabbackground[i].iBackgroundId}" onclick="selectBackground('{$data.your_tabbackground[i].iBackgroundId}');">								  
					    </span>
					    <input type="radio" name="Data['iBackgroundId']" id="iBackgroundId" value="{$data.your_tabbackground[i].iBackgroundId}">
					  </a>-->
					  <div class="demo-list clear">
					    <ul>
						  <li>
						    <input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="{$data.your_tabbackground[i].iBackgroundId}">
						  </li>
					    </ul>
					  </div>
					  <a href="javascript:void(0);" ><span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('{$data.your_tabbackground[i].iBackgroundId}','back_ipads');"></span></a>
					  <a href="#"><span class="btn_bg btn_bg_details" onclick="return detailsAppImage('{$data.iPad_tabbackground[i].iBackgroundId}','{$data.iPad_tabbackground[i].vImage}');"></span></a>
				  </div>
			  </li>
			  {/section}
			   {else}
			     <span style="color: rgb(255,255,255) !important;">No Background Image Avilable</span>
			  {/if}
		  </ul>
	  </div>
   </div>
 <div class="button_row">
   <div class="button_1">
	  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
		 <tr>
		 <td><label class="spec_label">Choose which sections to apply this background to:</label></td>
		 <td><!--<label>
		 <input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>-->
		   <div class="skin skin-line-ipad">
		   <div class="skin skin-line-ipad">
			<ul class="list tabs_checked">
			   <li>
				<input tabindex="18" type="checkbox" id="selectAll_iPad_tab" value="1" >
				<label for="selectAll_iPad_tab">Select all</label>
			   </li>
			</ul>
			</div>
		 </td>
		 </tr>
	  </table>
   </div>
 </div>

 <div class="button_row1">
	  <!--<div class="label">Home Screen</div>
	  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> Background</label>-->
	  <div class="label">Tabs</div>				  
	  {section name=i loop=$data.selected_feature_details}
	  {if ! in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
		 <!--<label class="lbl_checkbox">
		   <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
			{if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}
		 </label>-->					 
		 <div class="skin skin-line-ipad">
				  <ul class="list tabs_checked">
					<li>								  
					  <input tabindex="17" name="iAppTabId[]" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="ipad_checkbox" id="tabId" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
					  <label for="tabId">
                        {$data.selected_feature_details[i].vTitle}
                      </label>
					</li>
					<!--<li>
					  <input tabindex="18" type="checkbox" id="line-checkbox-2" checked>
					  <label for="line-checkbox-2">Checkbox 2</label>
					</li>-->
				  </ul>
               </div>
	  {/if}  
	  {/section}				  
	  <!--<div class="label">Locations</div>
	  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>
	  <label class="lbl_checkbox"><input type="checkbox" name="checkbox1" class="onbtn_home" value="1"> </label>-->
  </div>
 {if $data['finalSelected_tab_array']|@count gt 0}
 <div class="button_row">
   <div class="button_1">
	  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
		   <tr>
		   <td><label class="spec_label">These sections already have backgrounds assigned:</label></td>
		   </tr>
	  </table>
   </div>
 </div>
 
   <div class="button_row1">			
	  {section name=i loop=$data.selected_feature_details}
	  {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
	   <!-- <label class="lbl_checkbox">
		 <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
		   {if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}
	    </label>-->					
		 <div class="skin skin-line-ipad skin_line_cross">
				  <ul class="list tabs_checked">
					<li>
					  <input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="iPad_closecheck"  >
					  <label for="tabId">{if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}</label>
					</li>								
				  </ul>
		</div>
	  {/if}
	  {/section}
   {/if}
	  
	<!--<div class="label">Locations</div>-->
 </div>		 
</form>	 
{literal}
<script type="text/javascript">
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
	  
$(document).ready(function(){
              $('.skin-line-ipad input').each(function(){
                var self = $(this),
                  label = self.next(),
                  label_text = label.text();

                label.remove();
                self.iCheck({
                  checkboxClass: 'icheckbox_line-blue',
                  radioClass: 'iradio_line-blue',
                  insert: '<div class="icheck_line-icon"></div>' + label_text
                });
              });
			  
			  
$('#selectAll').on('ifChecked', function(event){
		$('.democls').iCheck('check');
});

$('#selectAll').on('ifUnchecked', function(event){
 		$('.democls').iCheck('uncheck');
});

$('.close_checkbox').on('ifClicked', function(event){
	var iAppTabId = $(this).val();
	var iApplicationId='{/literal}{$data['iApplicationId']}{literal}';
	var extra='';
	extra+='?iApplicationId='+iApplicationId;
	extra+='&iAppTabId='+iAppTabId;
	extra+='&Operation=Delete';
	var url = base_url+'app/saveBackgroundSetting';
	var pars=extra;
	show_loading();
    $.post(url+pars,function(data){
        hide_loading();
	   $("#background_setting").html(data.trim());	 
    });
});




$('.iPad_closecheck').on('ifClicked', function(event){  
	var iAppTabId = $(this).val();
	var appType=$("#app_type").val();	
	var iApplicationId='{/literal}{$data['iApplicationId']}{literal}';
	var extra='';
	extra+='?iApplicationId='+iApplicationId;
	extra+='&iAppTabId='+iAppTabId;
	extra+='&Operation=Delete';
	extra+='&App_type='+appType;
	var url = base_url+'app/saveBackgroundSetting';
	var pars=extra;
	show_loading();	
    $.post(url+pars,function(data){
        hide_loading();
	   $("#back_ipads").html(data.trim());	 
    });
});


$('#selectAll_iPad_tab').on('ifChecked', function(event){
		$('.ipad_checkbox').iCheck('check');
});

$('#selectAll_iPad_tab').on('ifUnchecked', function(event){
 		$('.ipad_checkbox').iCheck('uncheck');
});			  
});

if($('.tab_select')){
    $(".tab_select li a").click(function() {
         var type = $(this).attr("data_type");   
         $(this).parent().addClass('active').siblings().removeClass('active');
         $('#slidermode').val(type);
    });
}
</script>
{/literal}
