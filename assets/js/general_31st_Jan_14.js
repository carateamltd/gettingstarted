var base_url;

// Kick off the jQuery with the document ready function on page load
	$(document).ready(function(){
	  
		imagePreview();
		//$('#vTabColor').colorpicker();
		
		$('.cp2').colorpicker().on('changeColor', function(ev){
		    $(this).val(ev.color.toHex());
		    //bodyStyle.backgroundColor = ev.color.toHex();
		});
	  $("#vTabTexColor").colorpicker().on('changeColor', function(ev){	
	    var cval = ev.color.toHex();    
	    $(this).val(cval);
	    $(".text_home").attr('style','color:'+cval);
	  });
	
	  $("#vTabColor").colorpicker().on('changeColor', function(ev){
	    var cval = ev.color.toHex();
	    $(this).val(cval);
	    $(".time_img").attr('style','background:'+cval);
	  });
	
	  $("#vLuncherTintColor").colorpicker().on('changeColor', function(ev){
	    var cval = ev.color.toHex();
	    $(this).val(cval);
	    $(".header_image_top").attr('style','background:'+cval);
	  });
      
      
      $("#vGlobalTintColor").colorpicker().on('changeColor', function(ev){
	    var cval = ev.color.toHex();
	    $(this).val(cval);
	    $("#global_preview_header_overlay").css('background',cval);
	  });
      
      
		/*
		 navigation color change coding start  
		*/   
		$("#navigation_bar").colorpicker().on('changeColor', function(ev){
		  var cval = ev.color.toHex();
		  $(this).val(cval);    
		  $("#navigation_bar").css('background',cval);
		  $("#navigation_bar").css('color',cval);
		  $("#global_preview_header_overlay").css('background',cval);    
		});
		
	$("#navigation_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#navigation_text").css('background',cval);
	  $("#navigation_text").css('color',cval);
	  $("#colorImage_menu").css('color',cval);    
	});
	
	
	$("#navigation_textshadow").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#navigation_textshadow").css('background',cval);
	  $("#navigation_textshadow").css('color',cval);
	  $("#colorImage_menu").css('text-shadow','1px 1px 0px '+cval);    
	});
	// navigation coding end
	
	
	// section bar coding start
	$("#section_bars").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#section_bars").css('background',cval);
	  $("#section_bars").css('color',cval);
	  $("#section_bar_menu").css('background-color',cval);    
	});
	
	$("#section_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#section_text").css('background',cval);
	  $("#section_text").css('color',cval);
	  $("#section_bar_menu").css('color',cval);    
	});
	
	// odd row coding start
	
	$("#oddRow_bar").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#oddRow_bar").css('background',cval);
	  $("#oddRow_bar").css('color',cval);
	  $(".oddrow").css('background',cval);    
	});
	
	
	$("#oddRow_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#oddRow_text").css('background',cval);
	  $("#oddRow_text").css('color',cval);
	  $(".oddrow").css('color',cval); 
	});
	
	
	// even row start
	
	$("#evenrow_bar").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#evenrow_bar").css('background',cval);
	  $("#evenrow_bar").css('color',cval);
	  $(".evenrow").css('background',cval);    
	});
	
	$("#evenrow_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#evenrow_text").css('background',cval);
	  $("#evenrow_text").css('color',cval);
	  $(".evenrow").css('color',cval);    
	});
	
	
	//feature color start
	
	$("#featurecolors_buttontext").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#featurecolors_buttontext").css('background',cval);
	  $("#featurecolors_buttontext").css('color',cval);
	  //$(".evenrow").css('color',cval);    
	});
	
	$("#featurecolors_buttonimage").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#featurecolors_buttonimage").css('background',cval);
	  $("#featurecolors_buttonimage").css('color',cval);
	  //$(".evenrow").css('color',cval);    
	});
	
	$("#feature_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#feature_text").css('background',cval);
	  $("#feature_text").css('color',cval);
	  //$(".evenrow").css('color',cval);    
	});
	
	//other field start
	
	$("#other_background").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#other_background").css('background',cval);
	  $("#other_background").css('color',cval);
	  //$(".evenrow").css('color',cval);    
	});
});






function selectBackground(iBackgroundId){
	if ( $("#"+iBackgroundId).hasClass('btn_bg btn_bg_check') ) {
		$("#"+iBackgroundId).removeClass('btn_bg btn_bg_check').addClass('btn_bg_check_tick');
     }else if ( $("#"+iBackgroundId).hasClass('btn_bg_check_tick') ){
		$("#"+iBackgroundId).removeClass('btn_bg_check_tick').addClass('btn_bg btn_bg_check');
     }
	
}


function saveBackgroundSettings(){	
	var url = base_url+'app/saveBackgroundSetting';
	var pars = '?'+$('#saveBackgroundSetting').serialize();
	show_loading();
	$.post(url+pars,function (data){
		hide_loading();
		$("#background_setting").html(data.trim());
	});
	
}

function save_iPad_BackgroundSettings() {
	var url = base_url+'app/saveBackgroundSetting';	
	var pars = '?'+$('#save_iPad_BackgroundSetting').serialize();
	show_loading();
	$.post(url+pars,function (data){
		hide_loading();
		$("#back_ipads").html(data.trim());
	});
	
	
}

$( "#mobile_tab" ).bind( "click", function() {	
	$("#Save_Background_Settings").attr("onclick","return saveBackgroundSettings();");	
	//$("#bg_img_type").val("Mobile");
	$("#common_tab").val('Mobile');	
});

$( "#iPad_page" ).bind( "click", function() {	
	$("#Save_Background_Settings").attr("onclick","return save_iPad_BackgroundSettings();");
	//$("#bg_img_type").val("Tablet");
	$("#common_tab").val("Tablet");
});






// Configuration of the x and y offsets
this.imagePreview = function(){	
		xOffset = -20;
		yOffset = 40;		
		
    $("a.preview").hover(function(e){
		var src= $(this).children('img').attr('src');
        this.t = this.title;
        this.title = "";	
	     var c = (this.t != "") ? "<br/>" + this.t : "";
         $("body").append("<p id='preview'><img src='"+ src +"' alt='Image preview' />"+ c +"</p>");								 
         $("#preview")
            .css("top",((e.pageY - xOffset)) + "px")
            .css("left",(e.pageX + yOffset) + "px")
            .fadeIn("slow");
    },
	
    function(){
        this.title = this.t;
        $("#preview").remove();

    });	
	
    $("a.preview").mousemove(function(e){
        $("#preview")
            .css("top",(((e.pageY - xOffset)-250)) + "px")
            .css("left",(e.pageX + yOffset) + "px");
           
    });			
};
$(document).ready(function(){ 
	$("#back_img_id").val('');
	$("#back_img_type").val('Mobile');
	
   $( ".top_head_box" ).tabs();
   $(".midmainwrap,.leftpartappearance,.appr-layout,.appr-buttons,.appr-header,.appr-colors,.background_tab").tabs();
	$(function() {
		$("#sortable1,#sortable2").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var iApplicationId = $("#iApplicationId").val();
			var url = base_url+'app/sort_tab';
			var order = $(this).sortable("serialize") + '&iApplicationId='+iApplicationId;
			//console.log(order);
			$.post(url, order, function(theResponse){
				$("#tbl_msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>'+theResponse+'</div>');
			});
		}
		});
	});




});

$(document).ready(function(){
	
//$( "#sortable1" ).sortable();	
//$("#active_list_icons").droppable();
	//$("#inactive_list_icons").droppable();
	$("#active_list_icons").sortable({
	  connectWith:"#inactive_list_icons",
	      receive: function(event, ui){	
		  //console.log('aSADa');		
			var url = base_url+'app/udpate_status';			
			var id=ui.item.attr('id');
			var extra='';
			extra+='?id='+id;
			extra+='&eStatus=Yes';
			var pars=extra;			
			$.post(url+pars, function(theResponse){
				//console.log(theResponse);
			});
		}
	    
	});
	$("#inactive_list_icons").sortable({
		connectWith: "#active_list_icons",
		 receive: function(event, ui){	
		  //console.log('aSADa');		
			var url = base_url+'app/udpate_status';			
			var id=ui.item.attr('id');
			var extra='';
			extra+='?id='+id;
			extra+='&eStatus=No';
			var pars=extra;			
			$.post(url+pars, function(theResponse){
				//console.log(theResponse);
			});
		}
		
	});	
	
	$("#industry").val('');
	  $('#save_feature').click(function(){
			var industry = $("#industry").val();
			var app_name = $("#app_name").val();
			var app_icon = $("#app_icon").val();
			var app_client = $("#app_client").val();
		   if( industry == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please select Industry</div>');
			   return false;
		   }
		   if( app_name == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>App Name can\'t be blank.</div>');
			   return false;
		   }
		   if( app_icon == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>App Icon can\'t be blank.</div>');
			   return false;
		   }
		   if( app_client == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please Select Client Name</div>');
			   return false;
		   }
		   
		   $("#save_app_feature").submit();

		  
	  });

	$('#industry').change(function(){
		//console.log(base_url);return false;
			var loading_img = base_url+'assets/images/loading-transparent.gif';
			$("#inlft").html('<img src='+loading_img+'>');
			var url = base_url+'app/ajax_appindustryfeature';
			
			var pars = 'iIndustryId='+$(this).val();
			$.ajax({
				 type: 'POST',
				 url: url,
				 data: pars,
				 success: function(data) {
					 if(data) {
						 $("#inlft").html(data);
						 return false;
					 }
				 }
			 });
	});

	$('.select_rows_al').change(function(){
		//console.log(base_url);return false;
			var loading_img = base_url+'assets/images/loading-transparent.gif';
			$(".samples_screens").html('<img src='+loading_img+'>');
			var url = base_url+'app/newdesign_templates_ajax';
			
			var pars = 'param='+$(this).val();
			$.ajax({
				 type: 'POST',
				 url: url,
				 data: pars,
				 success: function(data) {
					 if(data) {
						 $(".samples_screens").html(data);
						 return false;
					 }
				 }
			 });
	});
	
	
	$('#update_icon').live('click',function(){
		  //console.log('ssxxxxxxs');
			var icon_vTitle = $("#edit_icon_vTitle").val();
			//console.log('aka'+icon_vTitle);
			var icon_iFeatureId = $("#edit_icon_iFeatureId").val();
		   if( icon_vTitle == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Tab Title can\'t be blank</div>');
			   return false;
		   }
		   if( icon_iFeatureId == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Select Tab Function.</div>');
			   return false;
		   }
		    
		    var step=$("#step").val();
		    if (step=='step4') {				
				show_loading();
				$('#myModal_edit_btn').modal('hide');
				$('#frm_edit_tab').ajaxSubmit(function(data) {									
					$("#both_avtiveInactiveTab").html(data.trim());					
					hide_loading();   									
				});
		    }else{
				$("#frm_edit_tab").submit();
		    }
		    
		   

		  
	  });
	  
	  $(".tabbgchange li").click(function(){
		 $(".tabbgchange").find('li').each(function(){
			   $( this ).removeClass('activetabbtn').addClass('tbbg');
		  });
		   $( this ).removeClass('tbbg').addClass('activetabbtn');
	  })	
	  
	  $(".innertabbtn li").click(function(){
		 $(".innertabbtn").find('li').each(function(){
			   $( this ).removeClass('innertabbtncklik').addClass('inactivebtntab');
		  });
		 // console.log( $( this ).find('a').html());
		  //$(".cp2").focus();
		  if($( this ).find('a').html() == 'Tab Color'){
		    $("#vTabColor").focus();
		  }
		  if($( this ).find('a').html() == 'Tab Text'){
		    $("#vTabTexColor").focus();
		  }
		  if($( this ).find('a').html() == 'Launcher Tint'){
		    $("#vLuncherTintColor").focus();
		  }
		  if($( this ).find('a').html() == 'Global Tint'){
		    $("#appr-header-gtpick").focus();
		  }


		   $( this ).removeClass('inactivebtntab').addClass('innertabbtncklik');
	  })	

	  $(".sortable2 li").click(function(){
		  var id=$(this).attr('id').split('_').slice(1).join('');
		  $("#back_img_id").val('');
		  $("#back_img_type").val('Mobile');
		  $("#back_img_apptabid").val(id);
		  //console.log(id.split('_').slice(1).join(''));
		 $(".sortable2").find('li').each(function(){
			   $( this ).removeClass('activebuttontab').addClass('buttontab');
		  });
		   $( this ).removeClass('buttontab').addClass('activebuttontab');
	  })
	  
	  $("#save_bcimg").click(function(){
		  //console.log('ddddd');
		  $("#frm_add_back_img").submit();
	  })
	  
	  $("#upld_bcimg").click(function(){
		  if($("#file").val() != ""){
			$("#frm_add_back_img").submit();
			}
	  })
	  

	  

	  
});

function delete_tab(apptabid,appid){
	
	
	var r = confirm("Are you sure?");
	if (r == true)
	  {
			var url = base_url+'app/delete_tab';
			
			var pars = '?iApplicationId='+appid+'&iAppTabId='+apptabid;
			document.location.href=url+pars;
	  }
	else
	  {
		  return false;
	  }
}

function edit_custom_tab(apptabid,step){	
			var url = base_url+'app/ajax_edit_custom_tab';			
			var pars = 'iAppTabId='+apptabid+'&step='+step;;
			$.ajax({
				 type: 'POST',
				 url: url,
				 data: pars,
				 success: function(data) {
					 if(data) {
						 $("#edit_tab_btn").html(data);
						 $('#myModal_edit_btn').modal({backdrop:'static',keyboard:false});
						 $('#myModal_edit_btn').modal('show');
						 return false;
					 }
				 }
			 });	
	
}



function select_tab_icon(iconid){	
	$('img.selected_image').each(function() {
        $(this).attr('class', 'ticonimage');
	});
	$("#ticon-"+iconid).attr('class', 'selected_image');
	$("#selectediconId").val(iconid);	
}

function eselect_tab_icon(iconid){
	$('img.selected_image').each(function() {
        $(this).attr('class', 'ticonimage');
	});
	$("#eticon-"+iconid).attr('class', 'selected_image');
	$("#eiIconId").val(iconid);
}

function mtbcls_chng(ele){
	$('li.tbbg').each(function() {
        $(this).removeClass('activetabbtn');
	});	
	//$('img.selected_image').each(function() {
        $(ele).addClass('activetabbtn');
        var tabname=$(ele).children('a').html();
        if (tabname == 'TABLET'){
			$("#back_img_type").val('Tablet');
		}else{
			$("#back_img_type").val('Mobile');
		}
       //console.log( tabname);
        
	//});
	
}

function bimgselect_tab_icon(id){
	//console.log(id);
	$("#back_img_id").val(id);
	$(".selectedimg").hide();
	$("#selectedimg_"+id).show();
	var imgname = $("#bac_img_"+id).html();
	$("#sel_back_img_name").html('You have selected '+imgname+' from Your Images');
	$("#save_bcimg").show();
	
}

function Redirect_me(url){
  window.top.location.href=url;
  return true;
}

$( "#showLayoutAppearance,#showButtonsAppearance,#showHeaderAppearance,#launcher_tint,#launch_header" ).bind( "click", function() {
	$("#colorImageDiv").hide();
	$("#tabImagesDiv").fadeIn(700);
});

$( "#showColorAppearance,#global_header,#global_tint" ).bind( "click", function() {
	$("#tabImagesDiv").hide();
	$("#colorImageDiv").fadeIn(700);	
});

function manageButtons(val){
	var data=parseInt(val);
	if (data>1) {
		$("#buttonsDiv").hide();
	}else{
		$("#buttonsDiv").show();
	}
}





function makeInActive(val,appId) {	
	var url = base_url+'app/makeInActive';				
	var extra='';
	extra+='?id='+val;
	extra+='&iApplicationId='+appId;	
	extra+='&eStatus=No';
	var pars=extra;			
	$.post(url+pars, function(theResponse){
		$("#"+val).fadeOut(700);
		$("#inactive_list_icons").append(theResponse.trim());
	});
}




function CheckValidFile(val,name){	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();	
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  ){			     		
		return true;
	}else{	   
	   document.getElementById(name).value = "";
	   return false;
	}
}

function uploadButton(){
	var imagename=$("#image_upload").val();
	if (imagename!='') {
		$('#buuton_upload').ajaxSubmit(function(data) {
			$("#appearance_button_img").html(data.trim());
			$("#image_upload").val('');
			//console.log(data);		
		});		
	}	
}

function uploadHeaderImg(){
	var imagename=$("#header_img").val();
	if (imagename!='') {
		$('#header_imgupload').ajaxSubmit(function(data) {			
			$("#header_img_list").html(data.trim());			
			$("#header_img").val('');			
		});		
	}	
}

function uploadAppBgImage(){
	var imagename=$("#file_upload_app_image").val();	
	if (imagename!='') {
		$('#uploadBackgroundIamge').ajaxSubmit(function(data) {
			//$("#appearance_button_img").html(data.trim());			
			window.location.href = data;
			//console.log(data);		
		});		
	}	
}





/*
	file name :view-app-step4.tpl
	purpose: use to open the "New App Tab Details" popup
    
*/
$( "#appearance_sub_tabs" ).bind( "click", function() {
	$('#subTabs').modal({backdrop:'static',keyboard:false});
	$('#subTabs').modal('show');
	  
});



//$("#open_img_library").bind( "click", function() {	
//    $('#app_bgimage_gallaery').modal({backdrop:'static',keyboard:false});
//    $('#app_bgimage_gallaery').modal('show');   
//});

function openImgGallery(){
	var iApplicationId=$("#main_app_id").val();
	var selectedTab=$("#common_tab").val();
	var extra='';
	extra+='?iApplicationId='+iApplicationId;		
	extra+='&selectedTab='+selectedTab;
	var url = base_url+'app/getTabWiseImages';
	var pars=extra;	
	$.post(url+pars,function(data){
	   hide_loading();		
	   $(".applicationbackgroundimages").html(data.trim());
	   $('#app_bgimage_gallaery').modal({backdrop:'static',keyboard:false});
	   $('#app_bgimage_gallaery').modal('show');   
	});		

}


function saveAppImage(){
	$("#saveAppImage").submit();
}




//open_img_library

/*
	file name :appearance_sub_tabs.tpl
	purpose: use to open the "New App Tab Details" popup
*/
$( "#addnew_subtab" ).bind( "click", function() {
	$('#subTabs').modal('hide');
	$('#add_new_subtab').modal({backdrop:'static',keyboard:false});
	$('#add_new_subtab').modal('show');
});


/*
	file name :add_new_sub_tabs.tpl
	purpose: save new sub tab data and open previous popup.
*/
function saveTabData(){

	var vTitle=$("#icon_vTitle").val();
	var vLableTextColor=$("#text_color").val();
	var iAppTabId=$("#iAppTabId").val();
	var iIconId=$("#iIconId").val();	
	
	if( vTitle == ""){
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter App Tab Title</div>');
		//console.log('please tuitle');
		return false;
	}
	
	if( vLableTextColor == ""){
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Tab Lable Text Color</div>');
		return false;
	}
	
	if( iAppTabId == ""){
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select App Tab </div>');
		return false;
	}
	
	if( iIconId == ""){
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Tab Icon </div>');
		return false;
	}
	
	$('#addSubTab').ajaxSubmit(function(data) {			
		$("#table_listing").html(data.trim());
		$('#add_new_subtab').modal('hide');
		$('#subTabs').modal('show');			
		blankAllValue(iIconId);
	});		   
}

function blankAllValue(iIconId){
		$("#icon_vTitle").val('');
		$("#text_color").val('');
		$("#iAppTabId").val('');
		$("#iIconId").val('');
		$("#iSubTabId").val('');
		$("#ActiveSubTab").attr('checked',false);
		$("#eticon-"+iIconId).attr('class', 'ticonimage');
}

//$('#hideSubTabPopup').click(function(){
//	
//		
//});

function hideSubTabPopup() {		
	var iIconId=$("#iIconId").val();		
	$('#add_new_subtab').modal('hide'); 
	$('#subTabs').modal('show');
	blankAllValue(iIconId);
}

function putIconId(val){
	$("#iIconId").val(val);
	$('img.selected_image').each(function() {
		$(this).attr('class', 'ticonimage');
	});
	$("#eticon-"+val).attr('class', 'selected_image');		
}

function editSubTab(iSubTabId,iApplicationId){
	var url = base_url+'app/editSubTab';
	var extra='';
	extra+='?iSubTabId='+iSubTabId;
	extra+='&iApplicationId='+iApplicationId;
	var pars=extra;		
	$.post(url+pars,function(data){			
		$("#add_newtab_popup").html(data.trim());			
		$('#subTabs').modal('hide');	
		$('#add_new_subtab').modal('show'); 
	});
	
}

function deleteSubTab(iSubTabId,iApplicationId){
	var r = confirm("Are you sure?");	
	if (r == true){
		var url = base_url+'app/deleteSubTab';
		var extra='';
		extra+='?iSubTabId='+iSubTabId;
		extra+='&iApplicationId='+iApplicationId;		
		var pars=extra;		
		$.post(url+pars,function(data){			
			$("#table_listing").html(data.trim());					
		});
	}
	else{
	  return false;
	}
}





function tgl_div(id){
var dvname = 'hidden_div_show_'+id;
$("#"+dvname).toggle('slow');
}

function set_slide_img(id,src){
// console.log(src);
var setid = 'slideimg'+id;
var divid = 'hidden_div_show_'+id;
$("#"+setid).attr('src',src);
$("#"+divid).toggle('slow');
}


function save_location(formId){		
	$('#signupForm_'+formId).ajaxSubmit(function(data) {
		$("#form_"+formId).html(data);
		//console.log(data);		
	});
}




function deleteAppIcon(appid,vimage){
var r = confirm("Are you sure?");

	if (r==true){
			var url = base_url+'app/deleteAppIcon';				
			var pars = '?iApplicationId='+appid+'&vImage='+vimage;				
		}
	else{
		 return false;
	  }
}



function saveappdata() {
	var appname=$("#tAppName").val();
	var tAppIconName=$("#tAppIconName").val();
	var tAppKeywords=$("#tAppKeywords").val();
	var tDescription=$("#tDescription").val();
	var email=$("#vContactEmail").val();
	var vWebsite=$("#vWebsite").val();
	var fPrice=$("#fPrice").val();
		
	
	
	
	if (appname=='') {
		$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter application name</div>');
		$("#msg").show();
		$("#tAppName").focus();			
		return false
	}else{
		$("#msg").hide();
	}
	
	if (tAppIconName=='') {
		$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter application icon name</div>');
		$("#msg").show();
		$("#tAppIconName").focus();
		return false
	}else{
		$("#msg").hide();
	}
	
	if (tAppKeywords=='') {
		$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter application keyword</div>');
		$("#msg").show();
		$("#tAppKeywords").focus();
		return false
	}else{
		$("#msg").hide();
	}
	
	if (tDescription=='') {
		$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter application description</div>');
		$("#msg").show();
		$("#tDescription").focus();
		return false
	}else{
		$("#msg").hide();
	}
	
	if (email=='') {
		$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter conatct e-mail</div>');
		$("#msg").show();
		$("#vContactEmail").focus();
		return false
	}else{
		$("#msg").hide();
	}	
	
	if (email!='' ) {						
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(email);		
		if (!isvalid) {				
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address</div>');
			$("#msg").show();
			$("#vContactEmail").focus();
			return false;
		}				
	}else{
		$("#msg").hide();
	}
	
	if (vWebsite=='') {
		$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter web site url</div>');
		$("#msg").show();
		$("#vWebsite").focus();
		return false
	}else{
		$("#msg").hide();
	}
	
	
	if (vWebsite!='' ) {			
		if (validateURL(vWebsite)) {				
		}else{
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid url. starting with http or https.</div>');
			$("#msg").show();
			$("#vWebsite").focus();
			return false;				
		}			
	}else{
		$("#msg").hide();
	}
	
	
	if (fPrice=='') {
		$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter price</div>');
		$("#msg").show();
		$("#fPrice").focus();
		return false
	}else{
		$("#msg").hide();
	}
	
	$("#upate_appdata").submit();
	
}


function checkvalidation(){
	var file=$("#icon").val();
	if (file=='') {
		alert('Please select a file before uploading.');return false;
	}
	$("#upate_appdata").submit();
}


$('#tDescription').keydown(function(e) {
	var $this = $(this);
	setTimeout(function() {
	    var text = $this.val();
	    $("#character-count").html(text.length);
	    if (text.length >249) {
		$("#content-msg").html('Good. You have now enough content.');
	    }else{
		$("#content-msg").html('Insufficient content!');
	    }
	    
	}, 0);
});

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){       
	 return false;
	}
	return true;
}


function validateURL(textval) {
  var urlregex = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
  return urlregex.test(textval);
}


function saveappicons() {	
  	
	var icon_vTitle = $("#icon_vTitle1").val();
	var icon_iFeatureId = $("#icon_iFeatureId").val();
	if( icon_vTitle == ""){
		$("#erraddtab").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Title cannot be blank.</div>');
		return false;
	}
	if( icon_iFeatureId == ""){
		$("#erraddtab").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Select Tab Function.</div>');
		return false;
	}
	$("#frm_add_tab").submit();	  
	
	
}


function saveappdesigndata(){
show_loading();
var extra = '';

if($('#iApplicationId')){
    var iApplicationId = $('#iApplicationId').val();
    extra+='?iApplicationId='+iApplicationId; 
}

if($("#eCallBtn").is(':checked') == true){
    extra+='&eCallBtn=Yes';
}else{
    extra+='&eCallBtn=No';
}

if($("#eDirectionBtn").is(':checked') == true){
    extra+='&eDirectionBtn=Yes';
}else{
    extra+='&eDirectionBtn=No';
}

if($("#eTellFriendBtn").is(':checked') == true){
    extra+='&eTellFriendBtn=Yes';
}else{
    extra+='&eTellFriendBtn=No';
}

if($("#eShowStatusBar").is(':checked') == true){
    extra+='&eShowStatusBar=Yes';
}else{
    extra+='&eShowStatusBar=No';
}

if($("#layoutbot").is(':checked') == true){
    extra+='&eBtnLayout=Bottom';
}

if($("#layouttop").is(':checked') == true){
    extra+='&eBtnLayout=Top';
}

if($("#layoutleft").is(':checked') == true){
    extra+='&eBtnLayout=Left';
}

if($("#layoutright").is(':checked') == true){
    extra+='&eBtnLayout=Right';
}

if($('#mapping_row')){
    var mapping_row = $('#mapping_row').val();
    extra+='&vMappingRow='+mapping_row; 
}

if($('#mapping_coll')){
    var mapping_coll = $('#mapping_coll').val();
    extra+='&vMappingCol='+mapping_coll; 
}

var iBackgroundId = $('input[name="tabbackimage"]:checked').val();

if(iBackgroundId !=''){
   extra+='&iBackgroundId='+iBackgroundId; 
}

var iIconcolorId = $('input[name="iconcolor"]:checked').val();

if(iIconcolorId !=''){
   extra+='&iIconcolorId='+iIconcolorId; 
}


if($('#vTabColor')){
    var vTabColor = $('#vTabColor').val();
    extra+='&vTabColor='+vTabColor; 
}

if($('#vTabTexColor')){
    var vTabTexColor = $('#vTabTexColor').val();
    extra+='&vTabTexColor='+vTabTexColor; 
}

var iLunchheaderId = $('input[name="iLunchheaderId"]:checked').val();

if(iLunchheaderId !=''){
   extra+='&iLunchheaderId='+iLunchheaderId; 
}

if($('#vLuncherTintColor')){
    var vLuncherTintColor = $('#vLuncherTintColor').val();
    extra+='&vLuncherTintColor='+vLuncherTintColor; 
}

if($('#navigation_bar')){
    var vNavigationBar = $('#navigation_bar').val();
    extra+='&vNavigationBar='+vNavigationBar;
}

if($('#navigation_text')){
    var vNavigationText = $('#navigation_text').val();
    extra+='&vNavigationText='+vNavigationText;
}

if($('#navigation_textshadow')){
    var vNavigationShadow = $('#navigation_textshadow').val();
    extra+='&vNavigationShadow='+vNavigationShadow;
}


if($('#section_bars')){
    var vSectionBar  = $('#section_bars').val();
    extra+='&vSectionBar='+vSectionBar;
}

if($('#section_text')){
    var vSectionText  = $('#section_text').val();
    extra+='&vSectionText='+vSectionText;
}

if($('#oddRow_bar')){
    var vOddRowBar   = $('#oddRow_bar').val();
    extra+='&vOddRowBar='+vOddRowBar;
}

if($('#oddRow_text')){
    var vOddRowText   = $('#oddRow_text').val();
    extra+='&vOddRowText='+vOddRowText;
}

if($('#evenrow_bar')){
    var vEvenRowBar   = $('#evenrow_bar').val();
    extra+='&vEvenRowBar='+vEvenRowBar;
}

if($('#evenrow_text')){
    var vEvenRowText   = $('#evenrow_text').val();
    extra+='&vEvenRowText='+vEvenRowText;
}

if($('#featurecolors_buttontext')){
    var vButtonTextColor   = $('#featurecolors_buttontext').val();
    extra+='&vButtonTextColor='+vButtonTextColor;
}

if($('#featurecolors_buttonimage')){
    var vButtonImageColors   = $('#featurecolors_buttonimage').val();
    extra+='&vButtonImageColors='+vButtonImageColors;
}

if($('#feature_text')){
    var vFeatureText   = $('#feature_text').val();
    extra+='&vFeatureText='+vFeatureText;
}

if($('#other_background')){
    var vOtherBackgroundColor   = $('#other_background').val();
    extra+='&vOtherBackgroundColor='+vOtherBackgroundColor;
}


var iGlobalHeaderId = $('input[name="iGlobalHeaderId"]:checked').val();

if(iGlobalHeaderId !=''){
   extra+='&iGlobalHeaderId='+iGlobalHeaderId; 
}

if($('#vGlobalTintColor')){
    var vGlobalTintColor = $('#vGlobalTintColor').val();
    extra+='&vGlobalTintColor='+vGlobalTintColor; 
}






//alert(tabback);return false; 




var pars = extra;
var url = base_url+"app/saveappdesigninfo";
//alert(url+pars);return false;
$.post(url+pars,
    function(data) {
     //alert(data);
     hide_loading();   
     /*$('.tab_container').hide();
     $('#displayfabricdata').show();
     $('#displayfabricdata').html(data);*/
     
    });

}



function show_loading() {
  $('#loading').reveal({
    animationSpeed: 10,
    closeOnBackgroundClick: false
  });
}

function hide_loading() {
    $('#loading').delay(100).trigger('reveal:close');
}

function submitevent(){    
    var vImage = $('#vImage').val();
    var vTitle = $('#vTitle').val();
    var dStartDate = $('#dStartDate').val();
    var vStartTime = $('#vStartTime').val();    
    var dEndDate = $('#dEndDate').val();
    var vEndTime = $('#vEndTime').val();
    
     if (vImage=='') {		
		$("#addevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select images</div>');
		$("#addevent_validation").show();
		$("#vImage").focus();
		return false;
	
     }else{
		$("#addevent_validation").hide();
     }
	
	if (vTitle=='') {		
		$("#addevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter title</div>');
		$("#addevent_validation").show();
		$("#vTitle").focus();
		return false;
     }else{
		$("#addevent_validation").hide();
     }
	
	if (dStartDate=='') {		
		$("#addevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date</div>');
		$("#addevent_validation").show();
		$("#dStartDate").focus();
		return false;
     }else{
		$("#addevent_validation").hide();
     }
	
	if (vStartTime=='') {		
		$("#addevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start time</div>');
		$("#addevent_validation").show();
		$("#vStartTime").focus();
		return false;
     }else{
		$("#addevent_validation").hide();
     }
	
	
	if (dEndDate=='') {		
		$("#addevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date</div>');
		$("#addevent_validation").show();
		$("#dEndDate").focus();
		return false;
     }else{
		$("#addevent_validation").hide();
     }
	
	if (vEndTime=='') {
		$("#addevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time</div>');
		$("#addevent_validation").show();
		$("#vEndTime").focus();
		return false;
     }else{
		$("#addevent_validation").hide();
     }
    
    $('#frmevent').ajaxSubmit(function(data) {									
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           
            var pars = extra;    
            var url = base_url+"app/appwiseeventlisting";
            //console.log(url+pars);
            //alert(url+pars);;
            $.post(url+pars,
            function(data) {
             if($('#event_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#event_listing').html(data);             
             }
            });   
    });
}




function updateevent(){
	
    var vImage = $('#vOldImage').val();    
    var vTitle = $('#vTitlee').val();    
    var tDescriptione = $('#tDescriptionf').val();    
    //alert(tDescriptione);
    var dStartDate = $('#dStartDatee').val();
    var vStartTime = $('#vStartTimee').val();    
    var dEndDate = $('#dEndDatee').val();
    var vEndTime = $('#vEndTimee').val();
    
     if (vImage=='') {		
		$("#editevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select image</div>');
		$("#editevent_validation").show();
		$("#vImagee").focus();
		return false;
	
     }else{
		$("#editevent_validation").hide();
     }
	
	if (vTitle=='') {		
		$("#editevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter title</div>');
		$("#editevent_validation").show();
		$("#vTitlee").focus();
		return false;
     }else{
		$("#editevent_validation").hide();
     }
	
	if (tDescriptione =='') {		
		$("#editevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description</div>');
		$("#editevent_validation").show();
		$("#tDescriptione").focus();
		return false;
     }else{
		$("#editevent_validation").hide();
     }
	
	if (dStartDate=='') {		
		$("#editevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date</div>');
		$("#editevent_validation").show();
		$("#dStartDatee").focus();
		return false;
     }else{
		$("#editevent_validation").hide();
     }
	
	if (vStartTime=='') {		
		$("#editevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start time</div>');
		$("#editevent_validation").show();
		$("#vStartTimee").focus();
		return false;
     }else{
		$("#editevent_validation").hide();
     }
	
	
	if (dEndDate=='') {		
		$("#editevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date</div>');
		$("#editevent_validation").show();
		$("#dEndDatee").focus();
		return false;
     }else{
		$("#editevent_validation").hide();
     }
	
	if (vEndTime=='') {		
		$("#editevent_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time</div>');
		$("#editevent_validation").show();
		$("#vEndTimee").focus();
		return false;
     }else{
		$("#editevent_validation").hide();
     }   
    
    $('#frmeditevent').ajaxSubmit(function(data) {
	
            $.fancybox.close();
            var extra = '';
            show_loading();
            if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
            }
            
            var pars = extra;    
            var url = base_url+"app/appwiseeventlisting";
            //console.log(url+pars);
            //alert(url+pars);;
            $.post(url+pars,
            function(data) {
             
            
             if($('#event_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#event_listing').html(data);             
             }
            });  
    });
}


function delete_event(iEventId){
    var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iEventId !=''){
        extra += '&iEventId='+iEventId;
        
    }
    
    var pars = extra;    
    var url = base_url+"app/event_delete";
    //console.log(url+pars);
    //alert(url+pars);;
    $.post(url+pars,
    function(data) {
     if($('#event_listing')){
         hide_loading();   
        $('#event_listing').html(data);             
     }
    });   
}


	function deleteeventimage(eventId){
	var pars = '?iEventId='+eventId;  
	var url = base_url+"app/deleteeventimage";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#deletebtndivid").hide();
			$("#vOldImage").val('');
		}
	  }
	);
	}
	
	function deletrssimage(iRSSId){
		//alert(iRSSId);
	var pars = '?iRSSId='+iRSSId;  
	var url = base_url+"app/deletrssimage";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#rssimagediv").hide();
			//$("#vOldImage").val('');
		}
	  }
	);
	}
	

function edit_event(iEventId,iFeatureId){
    var extra = '';
    if(iEventId !=''){
        extra += '?iEventId='+iEventId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showediteventpopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
        $('#dStartDatee').datepicker({
            format: 'yyyy-mm-dd'
        });
        
        $('#dEndDatee').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#vStartTimee').timepicker();
        $('#vEndTimee').timepicker();
        $('.wysihtmleditor5').wysihtml5();	  
    });   
}

function location_validation(){
	
	if(!$("#vWebsite").val()){
		alert("Please fill the website field");
	}else if(!$("#vEmail").val()){
		alert("Please fill the email field");
	}else if(!$("#vTelephone").val()){
		alert("Please fill the telephone field");
	}else if(!$("#vAddress1").val()){
		alert("Please fill the Address1 field");
	}else if(!$("#vCity").val()){
		alert("Please fill the city field");
	}else if(!$("#vState").val()){
		alert("Please fill the state field");
	}else if(!$("#vZip").val()){
		alert("Please fill the zip field");
	}else if(!$("#vLatitude").val()){
		alert("Please fill the latitude field");
	}else if(!$("#vLongitude").val()){
		alert("Please fill the longitude field");
	}else{
		$('#frmlocation').submit();
	}
}

function news_validation(){
	$('#frmlocation').submit();
}

function mailinglist_validation(){
    $('#frmmailinglist').submit();	
}

function rss_validation(){
	$("#frmrss").submit();
}
function frmyoutube_validation(){
	$("#frmyoutube").submit();
}
function closeleanmodal(){
 $.fancybox.close();   
}

$('#vStartTime').timepicker();
$('#vEndTime').timepicker();
$('.wysihtmleditor5').wysihtml5();	

//Google News
$("#eGoogleNews").click(function(){
    if (this.checked){
        $("#vGoogleNewsKeyWords").removeAttr('readonly');
    }else{
        $("#vGoogleNewsKeyWords").attr('readonly', 'readonly');
    }
});

$("#eTweets").click(function(){
    if (this.checked){
        $("#vTweetsKeyWords").removeAttr('readonly');;
    }else{
        $("#vTweetsKeyWords").attr('readonly', 'readonly')
    }
});


$('#addevenitid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});



$('#addpdfid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});


function setimagevalue(val) {
	$("#vOldImage").val(val);
}


function infotab_validation(){
    $("#frminfotab").submit();    
}

function showhide_file(val){
	//console.log('call');
	//var divname = 'maindiv'+val;
	if (val == 'Pdf File'){
		$("#maindivvPdfUrl").hide();
		$("#maindivvPdfFile").show();
	}
	if (val == 'Pdf Url'){
		$("#maindivvPdfUrl").show();
		$("#maindivvPdfFile").hide();
		
	}	
	return false;
}
function showhide_fileedit(val){
	//console.log('call');
	//var divname = 'maindiv'+val;
	if (val == 'Pdf File'){
		console.log('calaaaal');
		$("#emaindivvPdfUrl").hide();
		$("#emaindivvPdfFile").show();
	}
	if (val == 'Pdf Url'){
		console.log('calaaSSaal');
		$("#emaindivvPdfUrl").show();
		$("#emaindivvPdfFile").hide();
		
	}	
	return false;
}

function CheckValidPdfFile(val,name)
{ 
 var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
 if(a == 'pdf')
 return true;
 alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only pdf (pdf)  Files!!!');
 document.getElementById(name).value = "";
 return false; 
}
function submitpdf(){
    
    var vPdfFile = $('#vPdfFile').val();
    var vPdfTitle = $('#vPdfTitle').val();
    var vPdfUrl = $('#vPdfUrl').val();
    var eFileType = $('#eFileType').val();
    
     if (vPdfTitle=='') {		
		$("#addpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name</div>');
		$("#addpdf_validation").show();
		$("#vPdfTitle").focus();
		return false;
	
     }else{
		$("#addpdf_validation").hide();
     }
     if (eFileType=='') {		
		$("#addpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file type</div>');
		$("#addpdf_validation").show();
		$("#eFileType").focus();
		return false;
	
     }else{
		$("#addpdf_validation").hide();
     }	

     if (eFileType=='Pdf File' && vPdfFile == "") {		
		$("#addpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file </div>');
		$("#addpdf_validation").show();
		$("#vPdfFile").focus();
		return false;
	
     }else{
		$("#addpdf_validation").hide();
     }		

     if (eFileType=='Pdf Url' && vPdfUrl == "") {		
		$("#addpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file url</div>');
		$("#addpdf_validation").show();
		$("#vPdfUrl").focus();
		return false;
	
     }else{
		$("#addpdf_validation").hide();
     }    
    $('#frmpdf').ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           
            var pars = extra;    
            var url = base_url+"app/appwisepdflisting";
            //console.log(url+pars);
            //alert(url+pars);;
            console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#pdf_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#pdf_listing').html(data);             
             }
            });   
    });
    
}


function delete_pdf(iPdfId){
    var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iPdfId !=''){
        extra += '&iPdfId='+iPdfId;
        
    }
    
    var pars = extra;    
    var url = base_url+"app/pdf_delete";
    //console.log(url+pars);
    //alert(url+pars);;
    $.post(url+pars,
    function(data) {
     if($('#pdf_listing')){
         hide_loading();   
        $('#pdf_listing').html(data);             
     }
    });   
}


function deletepdffile(iPdfId){
	var pars = '?iPdfId='+iPdfId;  
	var url = base_url+"app/deletepdffile";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#detetepdffile").hide();
			$("#vOldFile").val('');
		}
	  }
	);
	}

function edit_pdf(iPdfId,iFeatureId){
    var extra = '';
    if(iPdfId !=''){
        extra += '?iPdfId='+iPdfId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditpdfpopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
        $('#dStartDatee').datepicker({
            format: 'yyyy-mm-dd'
        });
        
        $('#dEndDatee').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#vStartTimee').timepicker();
        $('#vEndTimee').timepicker();
        $('.wysihtmleditor5').wysihtml5();	  
    });   
}

function updatepdf(){
  //  alert('call');return false;
    var vPdfFile = $('#vPdfFilee').val();
    var vPdfTitle = $('#vPdfTitlee').val();
    var vPdfUrl = $('#vPdfUrle').val();
    var eFileType = $('#eFileTypee').val();
   // alert(eFileType);return false;
     if (vPdfTitle=='') {		
		$("#editpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name</div>');
		$("#editpdf_validation").show();
		$("#vPdfTitlee").focus();
		return false;
	
     }else{
		$("#editpdf_validation").hide();
     }
     if (eFileType=='') {		
		$("#editpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file type</div>');
		$("#editpdf_validation").show();
		$("#eFileTypee").focus();
		return false;
	
     }else{
		$("#editpdf_validation").hide();
     }	

     if (eFileType=='Pdf File' && vPdfFile == "") {		
		$("#editpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file </div>');
		$("#editpdf_validation").show();
		$("#vPdfFilee").focus();
		return false;
	
     }else{
		$("#editpdf_validation").hide();
     }		

     if (eFileType=='Pdf Url' && vPdfUrl == "") {		
		$("#editpdf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file url</div>');
		$("#editpdf_validation").show();
		$("#vPdfUrle").focus();
		return false;
	
     }else{
		$("#addpdf_validation").hide();
     }
	
	
    
    $('#updatefrmpdf').ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           
            var pars = extra;    
            var url = base_url+"app/appwisepdflisting";
            //console.log(url+pars);
            //alert(url+pars);;
            console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#pdf_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#pdf_listing').html(data);             
             }
            });   
    });
    
}

function submitlocation(){

	var vWebsite = $("#vWebsite").val();
	var vEmail = $("#vEmail").val();
	var vTelephone = $("#vTelephone").val();
	var vAddress1 = $("#vAddress1").val();
	var vCity = $("#vCity").val();
	var vState = $("#vState").val();
	var vZip = $("#vZip").val();
	var vLatitude = $("#vLatitude").val();
	var vLongitude = $("#vLongitude").val();
    if (vWebsite=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website name</div>');
		$("#addloc_validation").show();
		$("#vWebsite").focus();
		return false;
	
    }else{
		$("#addloc_validation").hide();
    }

    if (vEmail=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email</div>');
		$("#addloc_validation").show();
		$("#vEmail").focus();
		return false;
	
    }else{
		$("#addloc_validation").hide();
    }
	if (vEmail!='' ) {						
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);		
		if (!isvalid) {				
			$("#addloc_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address</div>');
			$("#addloc_validation").show();
			$("#vEmail").focus();
			return false;
		}				
	}else{
		$("#addloc_validation").hide();
	}  
    if (vTelephone=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter telephone</div>');
		$("#addloc_validation").show();
		$("#vTelephone").focus();
		return false;
	
    }else{
		$("#addloc_validation").hide();
    }


    if (vAddress1=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter address</div>');
		$("#addloc_validation").show();
		$("#vAddress1").focus();
		return false;
	
    }else{
		$("#addloc_validation").hide();
    }


    if (vCity=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter city</div>');
		$("#addloc_validation").show();
		$("#vCity").focus();
		return false;
	
    }else{
		$("#addloc_validation").hide();
    }


    if (vState=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter state</div>');
		$("#addloc_validation").show();
		$("#vState").focus();
		return false;
	
    }else{
		$("#addloc_validation").hide();
    }


    if (vZip=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter zip</div>');
		$("#addloc_validation").show();
		$("#vZip").focus();
		return false;
	
    }else{
		$("#addloc_validation").hide();
    }


    if (vLatitude=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude</div>');
		$("#addloc_validation").show();
		$("#vLatitude").focus();
		return false;
	
    }else if(!isValidLatitude(vLatitude)){

		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid latitude</div>');
		$("#addloc_validation").show();
		$("#vLatitude").focus();
		return false;
    }
    else{

		$("#addloc_validation").hide();
    }

    if (vLongitude=='') {		
		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude</div>');
		$("#addloc_validation").show();
		$("#vLongitude").focus();
		return false;
	
    }else if(!isValidLongitude(vLongitude)){

		$("#addloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid longitude</div>');
		$("#addloc_validation").show();
		$("#vLatitude").focus();
		return false;
    }
    else{
		$("#addloc_validation").hide();
    }

    $('#frmloc').ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           
            var pars = extra;    
            var url = base_url+"app/appwiseloclisting";
            console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#loc_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#loc_listing').html(data);             
             }
            });   
    });   
  } 
function delete_loc(iLocationId){

    var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iLocationId !=''){
        extra += '&iLocationId='+iLocationId;
        
    }
    
    var pars = extra;    
    var url = base_url+"app/loc_delete";
    $.post(url+pars,
    function(data) {
     if($('#loc_listing')){
         hide_loading();   
        $('#loc_listing').html(data);             
     }
    });   
}

function edit_loc(iLocationId,iFeatureId){
    var extra = '';
    if(iLocationId !=''){
        extra += '?iLocationId='+iLocationId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditlocpopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}

function updateloc(){
	var vWebsite = $("#vWebsitee").val();
	var vEmail = $("#vEmaile").val();
	var vTelephone = $("#vTelephonee").val();
	var vAddress1 = $("#vAddress1e").val();
	var vCity = $("#vCitye").val();
	var vState = $("#vStatee").val();
	var vZip = $("#vZipe").val();
	var vLatitude = $("#vLatitudee").val();
	var vLongitude = $("#vLongitudee").val();
    if (vWebsite=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website name</div>');
		$("#editloc_validation").show();
		$("#vWebsitee").focus();
		return false;
	
    }else{
		$("#editloc_validation").hide();
    }

    if (vEmail=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email</div>');
		$("#editloc_validation").show();
		$("#vEmaile").focus();
		return false;
	
    }else{
		$("#editloc_validation").hide();
    }
	if (vEmail!='' ) {						
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vEmail);		
		if (!isvalid) {				
			$("#editloc_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address</div>');
			$("#editloc_validation").show();
			$("#vEmaile").focus();
			return false;
		}				
	}else{
		$("#editloc_validation").hide();
	}    

    if (vTelephone=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter telephone</div>');
		$("#editloc_validation").show();
		$("#vTelephonee").focus();
		return false;
	
    }else{
		$("#editloc_validation").hide();
    }


    if (vAddress1=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter address</div>');
		$("#editloc_validation").show();
		$("#vAddress1e").focus();
		return false;
	
    }else{
		$("#editloc_validation").hide();
    }


    if (vCity=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter city</div>');
		$("#editloc_validation").show();
		$("#vCitye").focus();
		return false;
	
    }else{
		$("#editloc_validation").hide();
    }


    if (vState=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter state</div>');
		$("#editloc_validation").show();
		$("#vStatee").focus();
		return false;
	
    }else{
		$("#editloc_validation").hide();
    }


    if (vZip=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter zip</div>');
		$("#editloc_validation").show();
		$("#vZipe").focus();
		return false;
	
    }else{
		$("#editloc_validation").hide();
    }


    if (vLatitude=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude</div>');
		$("#editloc_validation").show();
		$("#vLatitudee").focus();
		return false;
	
    }else if(!isValidLatitude(vLatitude)){

		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid latitude</div>');
		$("#editloc_validation").show();
		$("#vLatitudee").focus();
		return false;
    }else{
		$("#editloc_validation").hide();
    }

    if (vLongitude=='') {		
		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude</div>');
		$("#editloc_validation").show();
		$("#vLongitudee").focus();
		return false;
	
    }else if(!isValidLongitude(vLongitude)){

		$("#editloc_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid longitude</div>');
		$("#editloc_validation").show();
		$("#vLongitudee").focus();
		return false;
    }else{
		$("#editloc_validation").hide();
    }


    $('#updatefrmloc').ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           
            var pars = extra;    
            var url = base_url+"app/appwiseloclisting";
            //console.log(url+pars);
            //alert(url+pars);;
            console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#loc_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#loc_listing').html(data);             
             }
            });   
    });
    

}

function isValidLatitude($latitude){
	if ($latitude.match(/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}$/)) {
    	return true;
	} else {
    	return false;
	}
}

function isValidLongitude($longitude){
    if( $longitude.match(/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}$/
     )) {
       return true;
    } else {
       return false;
    }
}

function submitwebsite(){

	var vWebTitle = $("#vWebTitle").val();
	var vWebUrl = $("#vWebUrl").val();
    if (vWebTitle=='') {		
		$("#addwebsite_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website title</div>');
		$("#addwebsite_validation").show();
		$("#vWebTitle").focus();
		return false;
	
    }else{
		$("#addwebsite_validation").hide();
    }

    if (vWebUrl=='') {		
		$("#addwebsite_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website url</div>');
		$("#addwebsite_validation").show();
		$("#vWebUrl").focus();
		return false;
	
    }else{
		$("#addwebsite_validation").hide();
    }

    $('#frmwebsite').ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           
            var pars = extra;    
            var url = base_url+"app/appwisewebsitelisting";
            console.log(data);
            $.post(url+pars,
            function(data) {

             if($('#website_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#website_listing').html(data);             
             }
            });   
    });   
  } 
function CheckValidWebsiteImg(val,name)
{ 
 var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
 if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG'  )
 return true;
 alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
 document.getElementById(name).value = "";
 return false; 
}

function delete_website(iWebsiteId){

    var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iWebsiteId !=''){
        extra += '&iWebsiteId='+iWebsiteId;
        
    }
    
    var pars = extra;    
    var url = base_url+"app/website_delete";
    $.post(url+pars,
    function(data) {
     if($('#website_listing')){
         hide_loading();   
        $('#website_listing').html(data);             
     }
    });   
}

function edit_website(iWebsiteId,iFeatureId){
    var extra = '';
    if(iWebsiteId !=''){
        extra += '?iWebsiteId='+iWebsiteId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditwebsitepopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}

function updatewebsite(){

	var vWebTitle = $("#vWebTitlee").val();
	var vWebUrl = $("#vWebUrle").val();
    if (vWebTitle=='') {		
		$("#editwebsite_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website title</div>');
		$("#editwebsite_validation").show();
		$("#vWebTitlee").focus();
		return false;
	
    }else{
		$("#editwebsite_validation").hide();
    }

    if (vWebUrl=='') {		
		$("#editwebsite_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website url</div>');
		$("#editwebsite_validation").show();
		$("#vWebUrle").focus();
		return false;
	
    }else{
		$("#addwebsite_validation").hide();
    }

    $('#updatefrmwebsite').ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           
            var pars = extra;    
            var url = base_url+"app/appwisewebsitelisting";
            console.log(data);
            $.post(url+pars,
            function(data) {
             //if($('#website_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#website_listing').html(data);             
            // }
            });   
    });   
  } 

function deletewebsitefile(iWebsiteId){
	var pars = '?iWebsiteId='+iWebsiteId;  
	var url = base_url+"app/deletewebsitefile";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#detetewebsitefile").hide();
			$("#vOldFileweb	").val('');
		}
	  }
	);
	}

