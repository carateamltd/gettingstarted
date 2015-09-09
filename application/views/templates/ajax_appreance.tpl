<form name="saveBackgroundSetting" id="saveBackgroundSetting" method="post" action="{$data.base_url}app/saveBackgroundSetting?iApplicationId={$data['iApplicationId']}">
	<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId">	
	<input type="hidden" value="" name="" id="slide_info1">
	<input type="hidden" value="" name="" id="slide_info2">
	<input type="hidden" value="" name="" id="slide_info3">
	<input type="hidden" value="" name="" id="slide_info4">
	<input type="hidden" value="" name="" id="slide_info5">
	<input type="hidden" value="{$data.exist_slider_img.vSliderMode}" name="" id="slidermode">     
	<input type="hidden" value="{$data['iApplicationId']}" name="iApplicationId">			 
	<div id="back-mobiles" class="back-mobiles">
		<div class="stock_section">			  		
			<ul>
				{section name = i loop = $data.your_tabbackground}
				<li>
			  		{if $data.your_tabbackground[i]['apptab_deatils']|@count gt 0}
			  			<span class="tabdata">
			  				{section name=j loop=$data.your_tabbackground[i]['apptab_deatils']}
			  					{if $data.your_tabbackground[i]['apptab_deatils'][j]['vTitle'] neq ''}
			  						<!--{$data.your_tabbackground[i]['apptab_deatils'][j]['vTitle']}-->
			  						{$foundTranslation=0}
									{foreach from=$lang item=val}
										{if $val.rLabelName == $data.your_tabbackground[i]['apptab_deatils'][j]['vTitle']}
											{$val.rField}
											{$foundTranslation=1}
										{/if}
									{/foreach}
									{if $foundTranslation==0}
										{$data.your_tabbackground[i]['apptab_deatils'][j]['vTitle']}
									{/if}
			  						</br>
			  					{else}
			  						<!--{$data.your_tabbackground[i]['apptab_deatils'][j]['default_vTitle']}-->
			  						{$foundTranslation=0}
									{foreach from=$lang item=val}
										{if $val.rLabelName == $data.your_tabbackground[i]['apptab_deatils'][j]['default_vTitle']}
											{$val.rField}
											{$foundTranslation=1}
										{/if}
									{/foreach}
									{if $foundTranslation==0}
										{$data.your_tabbackground[i]['apptab_deatils'][j]['default_vTitle']}
									{/if}
			  						</br>
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
						  <div class="demo-list">
						    <ul>
							  <li>
							    <input tabindex="3" type="radio" id="input-3" name="iBackgroundimgId" value="{$data.your_tabbackground[i].iBackgroundId}">
							  </li>
						    </ul>
						  </div>
						  <a href="javascript:void(0);" ><span class="btn_bg btn_bg_delete" onclick="return deleteAppImage('{$data.your_tabbackground[i].iBackgroundId}','background_setting');"></span></a>
						  <a href="javascript:void(0);"><span class="btn_bg btn_bg_details" onclick="return detailsAppImage('{$data.your_tabbackground[i].iBackgroundId}','{$data.your_tabbackground[i].vImage}');"></span></a>
					  </div>
				  </li>
				  {/section}
				 
			  </ul>
		  </div>
	  </div>
	  
	   <div class="button_row">
	  <div class="button_1">
			   <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table buttons_tbl">
				    <tr>
				    <td>
				    	<label class="spec_label">
				    		{foreach from=$lang item=val}
								{if $val.rLabelName == 'Choose which sections'}
									{$val.rField}
								{/if}
							{/foreach}:
				    	</label>
				    </td>
				    <td><!--<label>
				    <input type="checkbox" id="selectAll" name="Select_All" class="onbtn" value="1" onclick="return check_all();"> Select all </label>-->
						<div class="skin skin-line-mobile">
						  <ul class="list tabs_checked">
							<li>
							  <input tabindex="18" type="checkbox" id="selectAll" value="1" >
							  <label for="selectAll">
							  	{foreach from=$lang item=val}
									{if $val.rLabelName == 'Select all'}
										{$val.rField}
									{/if}
								{/foreach}
							  </label>
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
		  <div class="label">
		  	{foreach from=$lang item=val}
				{if $val.rLabelName == 'Tabs'}
					{$val.rField}
				{/if}
			{/foreach}
		  </div>				  
		  {section name=i loop=$data.selected_feature_details}
		  {if ! in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
			 <!--<label class="lbl_checkbox">
			   <input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
				{if $data.selected_feature_details[i].vTitle == ""}1222222222222222222
                    {$data.selected_feature_details[i].default_vTitle}
                {else}
                    {$data.selected_feature_details[i].vTitle}
                {/if}
			 </label>-->
			 
			 <div class="skin skin-line-mobile">
					  <ul class="list tabs_checked">
						<li>
							<input tabindex="17" name="iAppTabId[]" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="democls" id="tabId" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
						  	<label for="tabId">
								{$foundTranslation=0}
								{foreach from=$lang item=val}
									{if $val.rLabelName == $data.selected_feature_details[i].vTitle}
										{$val.rField}
										{$foundTranslation=1}
									{/if}
								{/foreach}
								{if $foundTranslation==0}
									{$data.selected_feature_details[i].vTitle}
								{/if} 
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
								<td>
									<label class="spec_label">
										{foreach from=$lang item=val}
											{if $val.rLabelName == 'have backgrounds'}
												{$val.rField}
											{/if}
										{/foreach} :
									</label>
								</td>
							</tr>
						</table>
					</div>
				</div>		    
				<div class="button_row1">
					<!--<div class="label">Home Screen</div>-->				
					<!--<div class="label">Tabs</div>-->				
					{section name=i loop=$data.selected_feature_details}
						{if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])}
							<!-- <label class="lbl_checkbox">
							<input type="checkbox" name="iAppTabId[]" id="tabId" class="onbtn_home"  value="{$data.selected_feature_details[i].iAppTabId}" {if in_array($data.selected_feature_details[i].iAppTabId,$data['finalSelected_tab_array'])} checked="checked" {/if}>
							{if $data.selected_feature_details[i].vTitle == ""}
								{$data.selected_feature_details[i].default_vTitle}
							{else}
								{$data.selected_feature_details[i].vTitle}
							{/if}
							</label>-->					
							<div class="skin skin-line-mobile skin_line_cross">
								<ul class="list tabs_checked">
									<li>
										<input tabindex="17" name="iAppTabId[]" id="ckeck_box_close" type="checkbox" value="{$data.selected_feature_details[i].iAppTabId}" class="close_checkbox" />
										<label for="tabId">
											{if $data.selected_feature_details[i].vTitle == ""}
												{$foundTranslation=0}
												{foreach from=$lang item=val}
													{if $val.rLabelName == $data.selected_feature_details[i].default_vTitle}
														{$val.rField}
														{$foundTranslation=1}
													{/if}
												{/foreach}
												{if $foundTranslation==0}
													{$data.selected_feature_details[i].default_vTitle}
												{/if}	
											{else}
												{$foundTranslation=0}
												{foreach from=$lang item=val}
													{if $val.rLabelName == $data.selected_feature_details[i].vTitle}
														{$val.rField}
														{$foundTranslation=1}
													{/if}
												{/foreach}
												{if $foundTranslation==0}
													{$data.selected_feature_details[i].vTitle}
												{/if}
											{/if}
										</label>
									</li>								
								</ul>
							</div>
						{/if}
					{/section}				  
					<!--<div class="label">Locations</div>-->
				</div>
			{/if}
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
              $('.skin-line-mobile input').each(function(){
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
