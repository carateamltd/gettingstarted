var base_url;
var load_ckeditor_count = 0;

// Kick off the jQuery with the document ready function on page load
	$(document).ready(function(){
	    $('.eventd').datepicker({
              format: "yyyy-mm-dd",
              startDate: "0d",
              autoclose: true,
              orientation: "top left",
              todayHighlight: true,	
              language: "fr"	
        });
        $(".aka").ckeditor();
		$('.gcp').colorpicker();
		$('.gcp').colorpicker().on('changeColor', function(ev){
			var cval = ev.color.toHex();
		    $(this).val(ev.color.toHex());
		    $(this).css('background',cval);
		    //bodyStyle.backgroundColor = ev.color.toHex();
		})
        $('.eventtime').timepicker({showMeridian: false});

        $('.wysihtmleditor5').wysihtml5();	  
		imagePreview();
		
		$('.cp2').colorpicker().on('changeColor', function(ev){
		    $(this).val(ev.color.toHex());
		    //bodyStyle.backgroundColor = ev.color.toHex();
		});
	  $("#vTabTexColor").colorpicker().on('changeColor', function(ev){	
	    var cval = ev.color.toHex();    
	    $(this).val(cval);
	    $(".pre_tab_title").attr('style','color:'+cval);
	  });
	
	  $("#vTabColor").colorpicker().on('changeColor', function(ev){
	    var cval = ev.color.toHex();
	    $(this).val(cval);
	    $(".indv_tab").css('background',cval);
	  });
	
	  $("#vLuncherTintColor").colorpicker().on('changeColor', function(ev){
	    var cval = ev.color.toHex();
	    $(this).val(cval);
	    $(".header_img_top").css('background',cval);
	  });
      
      
      $("#vGlobalTintColor").colorpicker().on('changeColor', function(ev){
	    var cval = ev.color.toHex();
	    $(this).val(cval);
	    $("#global_preview_header_overlay").css('background',cval);
	  });
      
      
		/*
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
	  $("#page_title").css('background-color',cval);    
	});
	
	$("#section_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#section_text").css('background',cval);
	  $("#section_text").css('color',cval);
	  $("#page_title").css('color',cval);    
	});
	
	// odd row coding start
	
	$("#oddRow_bar").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#oddRow_bar").css('background',cval);
	  $("#oddRow_bar").css('color',cval);
	  $(".odrow").css('background',cval);    
	});
	
	
	$("#oddRow_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#oddRow_text").css('background',cval);
	  $("#oddRow_text").css('color',cval);
	  $(".odrow").css('color',cval); 
	});
	
	
	// even row start
	
	$("#evenrow_bar").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#evenrow_bar").css('background',cval);
	  $("#evenrow_bar").css('color',cval);
	  $(".evnrow").css('background',cval);    
	});
	
	$("#evenrow_text").colorpicker().on('changeColor', function(ev){
	  var cval = ev.color.toHex();
	  $(this).val(cval);    
	  $("#evenrow_text").css('background',cval);
	  $("#evenrow_text").css('color',cval);
	  $(".everow").css('color',cval);    
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

	//Calculation of Total Amount For Payment Tab
	var feecnt = 0;
	$(".fee_type").on('click', function(){
		
		if($(this).is(":checked")){
       		feecnt = parseInt(feecnt) + parseInt($(this).val());
    	}
		if(!$(this).is(":checked")){
       		feecnt =  parseInt(feecnt) - parseInt($(this).val());
    	}
    	if(feecnt == 0){
    		$("#total_amount").hide();
    		$("#total_amount").html('');

    	}else{
    		$("#total_amount").show();
    		$("#total_amount").html('<b>Total Amount : </b>'+feecnt+' GBP');
    		$("#fTotalPrice").val(feecnt);
    	}
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
    var extra = '';
    if($('#slidermode')){
        var slidermode = $('#slidermode').val();
        extra = '&slidermode='+slidermode;
    }    
    //var chkradiobtn = $("#back-mobiles input:radio:checked").val();
    //alert(chkradiobtn);return false;
    
    //if(chkradiobtn != '')
    if($("input[type=radio][name=iBackgroundimgId]:checked").length > 0)
    {
    	if($('input[name="iAppTabId[]"]:checked').length > 0)
    	{      
	    }
	    else
	    {
	      // 	$(".modal-body").html( "<p>Please select at least one tab for set the background image.</p>" );
	       	$(".modal-body").html( "<p>Se il vous plaît sélectionner au moins un onglet pour définir l'image d'arrière-plan.</p>" );
            $("#myalert").modal('show');
            return false;
	    } 
    }    
	var pars = '?'+$('#saveBackgroundSetting').serialize()+extra;
	show_loading();
	$.post(url+pars,function (data){
		hide_loading();
		$("#background_setting").html(data.trim());
	});
	
}
/* 
 Modified by : Nizam Kadri.
 Modified date : 19/05/2014.
 Purpose : To get proper alert msg while set background image & set alert msg in popup style.
*/
function save_iPad_BackgroundSettings()
{    
    var extra = '';
    if($('#slidermode')){
        var slidermode = $('#slidermode').val();
        extra = '&slidermode='+slidermode;
    }
    //var chkradiobtn = $("#back-ipad input:radio:checked").val();
 	//alert(chkradiobtn);
 	//if(chkradiobtn != '')
 	if($("input[type=radio][name=iBackgroundimgId]:checked").length > 0)
    {
    	if($('input[name="iAppTabId[]"]:checked').length > 0)
    	{      
	    }
	    else
	    {
	       	$(".modal-body").html( "<p>Please select at least one tab for set the background image.</p>" );
            $("#myalert").modal('show');
            return false;
	    } 
    }    
	var url = base_url+'app/saveBackgroundSetting';	
	var pars = '?'+$('#save_iPad_BackgroundSetting').serialize()+extra;
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
	//alert("ipad");
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

	$(function() {
		//-- code added for saving sorting details when app created
		var urlBreak=document.URL.split("/");
		var currentStep = urlBreak[urlBreak.length-2];
		if(currentStep == "step2")
		{
			var iApplicationId = $("#iApplicationId").val();
			var url = base_url+'app/sort_tab';
			var order = $('#sortable1').sortable("serialize") + '&iApplicationId='+iApplicationId;
			$.post(url, order, function(theResponse)
			{
				//-- success here
			});
		}
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
	function alreadyexists()
	{
		var app_name = $("#app_name").val();
		var app_client = $("#app_client").val();
		var pars='';
		var pars = 'appname='+app_name+'&app_client='+app_client;
		$.ajax({
		   type: 'POST',
		   data : pars,
		   url: base_url+'app/app_already_check',
		 	success: function(data) {
		    if(data==1)
		    { 
		    	
		    	$("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>This application already exists.</div>');
			   	return false;

		    }
		    else
		    {
			 	$("#err").hide();
			  	$("#save_app_feature").submit();
		    }
		    }
		     });    

	}	
	
	$("#industry").val('');
	  $('#save_feature').click(function(){
			var industry = $("#industry").val();
			var app_name = $("#app_name").val();
			var language = $("#language").val();
		//	var app_icon = $("#app_icon").val();
			var app_client = $("#app_client").val();
		//	var contact_email = $('#contact_email').val();
		if(language == 'rEnglish'){
			if( industry == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please select Industry.</div>');
			   return false;
		   }
		   if( app_name == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>App Name can\'t be blank.</div>');
			   return false;
		   }
		   if( app_client == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please Select Client Name.</div>');
			   return false;
		   }
		   if ($('#atleastone :checkbox:checked').length == 0 )
		   {
    			$("#err").html("<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please Select Recommended.</div>");
			   return false;
			}	
		}else if(language == 'rFrench'){
			if( industry == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please select Industry.</div>');
			   return false;
		   }
		   if( app_name == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>App nom ne peut pas être vide.</div>');
			   return false;
		   }
		   if( app_client == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Se il vous plaît Sélectionner Nom du Client.</div>');
			   return false;
		   }
		   if ($('#atleastone :checkbox:checked').length == 0 )
		   {
    			$("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Se il vous plaît Sélectionnez Recommandé.</div>');
			   return false;
			}	
		}
		   
		   
		   alreadyexists();

		  
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
			var iApplicationId = $("#iApplicationId").val();
			var url = base_url+'app/newdesign_templates_ajax/'+iApplicationId;
			
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

	//Show Preview Popup For Template
	var select_tmpl_url = "";
	$(".preview,#btnyes").click(function(){
		var tmpl_name =  $(this).parent().nextAll("div.label:first").html();
		$("#tmplname").html(tmpl_name);
		if($(this).attr('href')){
			select_tmpl_url = $(this).attr('href');
		}
		$("#select_template").modal('show');
		if(this.id == 'btnyes'){
			window.location.href=select_tmpl_url;
		}else{
			return false;
		}
		

	});

	
	
	$('#update_icon').live('click',function(){
			var icon_vTitle = $("#edit_icon_vTitle").val();
			var icon_iFeatureId = $("#edit_icon_iFeatureId").val();
		   if( icon_vTitle == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Tab Title can\'t be blank.</div>');
			   return false;
		   }
		   if( icon_iFeatureId == ""){
			   $("#err").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Select Tab Function.</div>');
			   return false;
		   }
		    
		    var step=$("#step").val();
		    if (step=='step4'){				
				show_loading();
				$('#myModal_edit_btn').modal('hide');
				$('#frm_edit_tab').ajaxSubmit(function(data){
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
		  //console.log(id);
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

//Made Changes by : Sagar 19-5-2014

function delete_app(baseurl,app_id)
{
	$('#myModalDelete').modal('show');
	var link = document.getElementById("mylink");
    link.setAttribute('href', baseurl+'app/delete/'+app_id);
	//$('#myModalDelete').modal('show');

/*
	var r = confirm("Are you sure?");
	if (r == true)
	{
		var url = baseurl+'app/delete/';
		document.location.href=url+app_id;
	}
	else
  	{
	  return false;
  	}
*/
}
//Made Changes by : Sagar 21-5-2014

function delete_admin(url)
{

	$('#myModalDelete').modal('show');
	var link = document.getElementById("mylink");
    link.setAttribute('href', url);
	//$('#myModalDelete').modal('show');
}
//Made Changes by : Sagar 19-5-2014

function delete_tab(apptabid,appid){
	
	$('#myModalDelete').modal('show');

	var link = document.getElementById("mylink");
	var url = base_url+'app/delete_tab';
	var pars = '?iApplicationId='+appid+'&iAppTabId='+apptabid;
    link.setAttribute('href', url+pars);
}

function edit_custom_tab(apptabid,step){	


			var url = base_url+'app/ajax_edit_custom_tab';			
			var pars = 'iAppTabId='+apptabid+'&step='+step;
			$.ajax({
				 type: 'POST',
				 url: url,
				 data: pars,
				 success: function(data) {
					 if(data) {
				 	 //Made Changes By Sagar On Date : 7-6-2014

    	
				 	 if(data.length > 0) {
						 $("#edit_tab_btn").html(data);
						 $('#myModal_edit_btn').modal({backdrop:'static',keyboard:false});
						 $('#myModal_edit_btn').modal('show');
						 return false;

					 }
					 else {
						 $('#deletealert').modal('show');				
						 $('#deleteMessage').html("The tab which you are trying to access has been already deleted.");
						 var link = document.getElementById("alertHref");
						 link.setAttribute('onclick', "location.reload()");			
				 		 var link1 = document.getElementById("close");
						 link1.setAttribute('onclick', "location.reload()");			

				 		 
				 		 return false;
					 }
					 //End Sagar Code


					}

				 }



			 });	

	
}

function add_custom_tab(appId)
{
	debugger;
	var url = base_url+'app/ajax_add_custom_tab';
	$.ajax(
	{
		type: 'POST',
		url: url,
		data: {
			appId: appId
		},
		success: function(data) 
		{
			if(data)
			{
				if(data.length > 0)
				{
					$("#edit_tab_btn").html(data);
					$('#myModal_edit_btn').modal({backdrop:'static',keyboard:false});
					$('#myModal_edit_btn').modal('show');
					return false;
				}
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
	if($('#mainactivetab')){
	   var mainactivetab = $('#mainactivetab').val();
       if($('#back_img_apptabid')){
        $('#back_img_apptabid').val(mainactivetab);
       }
        
	}
    $("#back_img_id").val(id);
	$(".selectedimg").hide();
	$("#selectedimg_"+id).show();
	var imgname = $("#bac_img_"+id).html();
	$("#sel_back_img_name").html('Vous avez sélectionné '+imgname+' partir de vos images');
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

function CheckValidFile(val,id){	
	//console.log(id);

	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();	
	
	//alert(a);
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  ){			     		
		//return true;
	}else{	
	   $("#errmsg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>The extension ' + a.toUpperCase() + ' is not valid. Please Upload image  (png,jpg,gif)  Files!!!</div>');
	   //alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload image  (png,jpg,gif)  Files!!!');   
	   document.getElementById(id).value = "";
	   return false;
	}
	if(document.getElementById(id).files[0].size/(1024*1024) > 2){

	   $("#errmsg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>The upload less than 2MB  Files!!!</div>');
	   //alert('The upload less than 2MB  Files!!!');   
	   document.getElementById(id).value = "";
	   return false;
	}
}

function uploadButton(){
	var imagename=$("#image_upload").val();
	if (imagename!='') {
		$('#buuton_upload').ajaxSubmit(function(data) {

			if(data==1){
				window.location.href=base_url+'authentication'; 
			}else{
				$("#appearance_button_img").html(data.trim());
				$("#image_upload").val('');
				//console.log(data);
			}
			
			
					
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

function uploadGlobalHeaderImg(){
	var imagename=$("#global_header_img").val();
	if (imagename!='') {
		$('#global_header_imgupload').ajaxSubmit(function(data) {			
			$("#global_header_img_list").html(data.trim());			
			$("#global_header_img").val('');			
		});		
	}	
}

 function colordatepicker(id, val) {
    $("#" + id).css("background-color", val);
    $("#" + id).css("color", val);
}

function uploadAppBgImage(){debugger;
	var imagename=$("#file_upload_app_image").val();
	if(imagename == "" ){
		$("#errmsg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Sélectionnez une image.</div>');
		return false;

	}else{
		$("#errmsg").html('');
	}

	if (imagename!='') {
		$('#uploadBackgroundIamge').ajaxSubmit(function(data) {
			//$("#appearance_button_img").html(data.trim());			
			//window.location.href = data;
			//console.log(data);		
			$("#errmsg").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Image chargée avec Succés.</div>');
            		$("#file_upload_app_image").val("");
            		return false;
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

//Show Status Bar
$( "#eShowStatusBar" ).bind( "click", function() {
	if ($('#eShowStatusBar').is(":checked")){
		$(".iphonetopbar").show();
	}else{
		$(".iphonetopbar").hide();
	}
})

//$("#open_img_library").bind( "click", function() {	
//    $('#app_bgimage_gallaery').modal({backdrop:'static',keyboard:false});
//    $('#app_bgimage_gallaery').modal('show');   
//});

function openImgGallery(){
	show_loading();	
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
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter App Tab Title.</div>');
		//console.log('please tuitle');
		return false;
	}
	
	if( vLableTextColor == ""){
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Tab Lable Text Color.</div>');
		return false;
	}
	
	if( iAppTabId == ""){
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select App Tab.</div>');
		return false;
	}
	
	if( iIconId == ""){
		$("#subtab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Tab Icon.</div>');
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
 //console.log(src);

var matches = src.match(/\/(\d+)\//);
var imgid = matches[1];

var setid = 'slideimg'+id;
var field = 'slidedata[iSliderImg'+id+'Id]';

$("#slide_info"+id).val(imgid);
$("#slide_info"+id).attr('name',field);


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
	
		var url = base_url+'app/deleteAppIcon';				
		var pars = '?iApplicationId='+appid+'&vImage='+vimage;
	/*var r = confirm("Are you sure?");
	
		if (r==true){
					var url = base_url+'app/deleteAppIcon';				
				var pars = '?iApplicationId='+appid+'&vImage='+vimage;			
			}
		else{
			 return false;
		  }*/
	
		/*$('#myModalDelete').modal('show');
	
		var link = document.getElementById("mylink");
		var url = base_url+'app/deleteAppIcon';				
		var pars = '?iApplicationId='+appid+'&vImage='+vimage;
		link.setAttribute('href', url+pars);*/
	
	}


	/*
		Save app
	*/
	function saveappdata() {
		var appname=$("#tAppName").val();
		var tAppIconName=$("#tAppIconName").val();
		var tDescription=$("#tDescription").val();
		var fPrice=$("#fPrice").val();
			
		if (appname=='') {
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Entrez url app  nom.</div>');
			$("#msg").show();
			$("#tAppName").focus();			
			return false
		}else{
			$("#msg").hide();
		}
		
		if (tDescription=='') {
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Entrez url app La description.</div>');
			$("#msg").show();
			$("#tDescription").focus();
			return false
		}else{
			$("#msg").hide();
		}
		
		if (fPrice=='') {
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Entrez votre prix.</div>');
			$("#msg").show();
			$("#fPrice").focus();
			return false
		}else{
			$("#msg").hide();
		}
		$("#upate_appdata").submit();
	}

	function saveappcontentdata() 
	{
		var tProjectName=$("#tProjectName").val();
		var tProjectDomainName=$("#tProjectDomainName").val();
		var tProjectDomain=$("#tProjectDomain").val();
		var email=$("#tEmail").val();
		
		if (tProjectName=='') {
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Project name.</div>');
			$("#msg").show();
			$("#tAppName").focus();			
			return false
		}else{
			$("#msg").hide();
		}
		
		if (tProjectDomainName=='') {
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Project Domain name.</div>');
			$("#msg").show();
			$("#tAppIconName").focus();
			return false
		}else{
			$("#msg").hide();
		}
		
		if (tProjectDomain=='') {
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Project Domain.</div>');
			$("#msg").show();
			$("#tAppIconName").focus();
			return false
		}else{
			$("#msg").hide();
		}
		
		if (email=='') {
			$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter conatct e-mail.</div>');
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
				$("#msg").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address.</div>');
				$("#msg").show();
				$("#vContactEmail").focus();
				return false;
			}				
		}else{
			$("#msg").hide();
		}
		
		$("#upate_appdata_content").submit();
	}


function checkvalidation(){

	var file=$("#icon").val();
	var a = file.substring(file.lastIndexOf('.') + 1).toLowerCase();
	if (file=='') {
		$("#msg1").html("<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>&times;</button>Sélectionner une image pour L'icône.</div>");
		$("#msg1").show();
		$("#icon").focus();
		return false;
	}
	if(a == 'png'){

	}
	else{
		$("#msg1").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter only png image.</div>');
		$("#msg1").show();
		$("#icon").focus();
		return false;
		/*alert('only Pdf file');return false;*/
		

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

function clearerror()
{	
	$('#erraddtab2').html('');
	$('#erraddtab').html('');	
}

function checkTitleLength()
{
	var icon_vTitle = $("#edit_icon_vTitle").val();

	if(icon_vTitle !="" && icon_vTitle.length < 2)
	{
		$("#erraddtab2").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Title Minimum 2 characters allowed.</div>');
 		$("edit_icon_vTitle").show();
 		$("edit_icon_vTitle").focus();
 		return false;
	}
	else
	{
		$("edit_icon_vTitle").hide();
	}
}

function saveappicons() {	
  	
	var icon_vTitle = $("#icon_vTitle1").val();
	var icon_iFeatureId = $("#icon_iFeatureId").val();
	var select_img = $("#eiIconId").val();
	var browse_img = $("#add_tab_img").val();
	if( icon_vTitle == ""){
		$("#erraddtab").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Title cannot be blank.</div>');
		return false;
	}
	if( icon_vTitle !="" && icon_vTitle.length < 2){
		$("#erraddtab").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Title Minimum 2 characters allowed.</div>');
 		return false;
 	}
	if( icon_iFeatureId == ""){
		$("#erraddtab").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Select Tab Function.</div>');
		return false;
	}
	if(select_img == "" && browse_img == ""){
		$("#erraddtab").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Select Tab Image.</div>');
		return false;

	}
	$("#frm_add_tab").submit();	  
}
function editsaveappicons() {	
  	var icon_vTitle = $("#edit_icon_vTitle").val();
	var icon_iFeatureId = $("#edit_icon_iFeatureId").val();
	var select_img = $("#selectediconId").val();
	var browse_img = $("#tab_img").val();

	if(icon_vTitle == ""){
		$("#erraddtab2").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Title cannot be blank.</div>');
		return false;
	}

	// if( icon_vTitle !="" && icon_vTitle.length < 2){
	// 	$("#erraddtab2").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Title Minimum 2 characters allowed.</div>');
 // 		return false;
 // }
	
	if(icon_iFeatureId == ""){
		$("#erraddtab2").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Select Tab Function.</div>');
		return false;
	}
	if(select_img == "" && browse_img == ""){
		$("#erraddtab2").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Select Tab Image.</div>');
		return false;

	}
	
	
	$("#frm_edit_tab").submit();	  
}


function saveappdesigndata()
{
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

	/*if($('#vTabTexColor')){
		var vTabTexColor = $('#vTabTexColor').val();
		extra+='&vTabTexColor='+vTabTexColor; 
	}*/

	//var iLunchheaderId = $('input[name="iLunchheaderId"]:checked').val();
	//-- Changed by Rohit 08 September for Saving Lunch Header Detail
	var iLunchheaderId = $('input[name="lunch_header"]:checked')[0].value
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

function submitmailchampinfo(iAppTabId){
	var vApikey = $("#vApikey"+iAppTabId).val();
	var vListid = $("#vListid"+iAppTabId).val();

     if (vApikey=='') {		
		$("#addmailchamp_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter api key.</div>');
		$("#addmailchamp_validation"+iAppTabId).show();
		$("#vApikey"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addmailchamp_validation"+iAppTabId).hide();
     }
     if (vListid=='') {		
		$("#addmailchamp_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter listid.</div>');
		$("#addmailchamp_validation"+iAppTabId).show();
		$("#vListid"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addmailchamp_validation"+iAppTabId).hide();
     }

    $('#frmmailchamp'+iAppTabId).ajaxSubmit(function(data) {									
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
            var pars = extra;    
            var url = base_url+"app/appwiseeventlisting";
            //console.log(url+pars);
            //alert(url+pars);;
            $.post(url+pars,
            function(data) {
             if($('#event_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#event_listing'+iAppTabId).html(data);             
             }
            });   
    });

/* 
	Modified By : Nizam Kadri
	Modified Date : 11/06/2014
	Issue fixed of event can only upload image files.
*/


}
function submitevent(iAppTabId,iFeatureId,lang)
{ 
    var language = $('#language').val();
    var tDescription = CKEDITOR.instances['tDescriptione'+iAppTabId].getData();
    var vImage = $('#vImage'+iAppTabId).val();
    var vTitle = $('#vTitle'+iAppTabId).val();
    var dStartDate = $('#dStartDate'+iAppTabId).val();
    var vStartTime = $('#vStartTime'+iAppTabId).val();    
    var dEndDate = $('#dEndDate'+iAppTabId).val();
    var vEndTime = $('#vEndTime'+iAppTabId).val();
    var ab = vImage.substring(vImage.lastIndexOf('.') + 1).toLowerCase();

    if(language == 'rEnglish')
    {
  	if (vImage=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select images.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vImage"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	
     if(ab == 'gif' || ab == 'GIF' || ab == 'jpg'  ||ab == 'JPG' ||ab == 'jpeg' ||ab == 'JPEG'||ab == 'png' ||ab == 'PNG' || ab == '' ){}else{
 		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg)  files.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vImage").val('');
		$("#vImage").focus();
		return false;
 	}

	if (vTitle=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter title.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vTitle"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }

    if (dStartDate=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#dStartDate"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	
	if (vStartTime=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start time.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vStartTime"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	
	
	if (dEndDate=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#dEndDate"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
     

	var timediff = new Date(dEndDate) - new Date(dStartDate);
	if(timediff == 0 || timediff > 0 ){
		$("#addevent_validation"+iAppTabId).hide();
		if(vStartTime == vEndTime && timediff == 0)
	     {
	     	$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>End Time must be greater than Start Time.</div>');
			$("#addevent_validation"+iAppTabId).show();
			$("#vStartTime"+iAppTabId).focus();
			return false;
	     }
	     else{
			$("#addevent_validation"+iAppTabId).hide();
	     }
	     if(vEndTime < vStartTime && timediff == 0){
	     	
			$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>End Time must be greater than Start Time.</div>');
			$("#addevent_validation"+iAppTabId).show();
			$("#vStartTime"+iAppTabId).focus();
			return false;
	     		
	     }else{
	     	

			$("#addevent_validation"+iAppTabId).hide();
			
	     }


	}else{
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>End Date must be greater than Start Date.</div>');
		$("#addevent_validation"+iAppTabId).show();
		/*$("#dEndDate"+iAppTabId).focus();*/
		return false;
	}

	//$('#dEndDate'+iAppTabId).datepicker('setStartDate', dStartDate);

	if (vEndTime=='') {
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vEndTime"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	}else if(language == 'rFrench'){

		if (vImage=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionner des images.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vImage"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	
     if(ab == 'gif' || ab == 'GIF' || ab == 'jpg'  ||ab == 'JPG' ||ab == 'jpeg' ||ab == 'JPEG'||ab == 'png' ||ab == 'PNG' || ab == '' ){}else{
 		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît télécharger uniquement l`image (gif, jpg, jpeg) fichiers.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vImage").val('');
		$("#vImage").focus();
		return false;
 	}

	if (vTitle=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrer le titre.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vTitle"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }

    if (dStartDate=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionner la date de début.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#dStartDate"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	
	if (vStartTime=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionnez l`heure de début.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vStartTime"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	
	
	if (dEndDate=='') {		
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionner la date de fin.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#dEndDate"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
     

	var timediff = new Date(dEndDate) - new Date(dStartDate);
	if(timediff == 0 || timediff > 0 ){
		$("#addevent_validation"+iAppTabId).hide();
		if(vStartTime == vEndTime && timediff == 0)
	     {
	     	$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Heure de fin doit être supérieure à Heure de début.</div>');
			$("#addevent_validation"+iAppTabId).show();
			$("#vStartTime"+iAppTabId).focus();
			return false;
	     }
	     else{
			$("#addevent_validation"+iAppTabId).hide();
	     }
	     if(vEndTime < vStartTime && timediff == 0){
	     	
			$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Heure de fin doit être supérieure à Heure de début.</div>');
			$("#addevent_validation"+iAppTabId).show();
			$("#vStartTime"+iAppTabId).focus();
			return false;
	     }else{
			$("#addevent_validation"+iAppTabId).hide();
	     }


	}else{
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Date de fin doit être supérieure à Date de début.</div>');
		$("#addevent_validation"+iAppTabId).show();
		/*$("#dEndDate"+iAppTabId).focus();*/
		return false;
	}

	//$('#dEndDate'+iAppTabId).datepicker('setStartDate', dStartDate);

	if (vEndTime=='') {
		$("#addevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionnez l`heure de fin.</div>');
		$("#addevent_validation"+iAppTabId).show();
		$("#vEndTime"+iAppTabId).focus();
		return false;
     }else{
		$("#addevent_validation"+iAppTabId).hide();
     }
	}


    var url = base_url+"app/save_event";
	/*
		Save with ajax
	*/
	
    $('#frmevent_'+iAppTabId).ajaxSubmit(function(data) {									
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }
            var pars = extra;    
            var url = base_url+"app/appwiseeventlisting";
            //console.log(url+pars);
            $.post(url+pars,
            function(data) {
             if($('#event_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#event_listing'+iAppTabId).html(data);  
              	window.location.reload();
             	}
            });   
    });
}




function updateevent(iAppTabId,iFeatureId){
	
    var vImage = $('#vOldImage').val();   
    var language = $('#language').val(); 
    var vTitle = $('#vTitlee').val();    
    var tDescriptione = $('#tDescriptionf').val();    
    var dStartDate = $('#dStartDatee'+iAppTabId).val();
    var vStartTime = $('#vStartTimee'+iAppTabId).val();    
    var dEndDate = $('#dEndDatee'+iAppTabId).val();
    var vEndTime = $('#vEndTimee'+iAppTabId).val();
    var abc = vImage.substring(vImage.lastIndexOf('.') + 1).toLowerCase();
    /*alert(dStartDate);alert(vStartTime);alert(dEndDate);alert(vEndTime);*/

    if(language == 'rEnglish'){
     if (vImage=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select image.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vImagee").focus();
		return false;
	
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
     if(abc == 'gif' || abc == 'GIF' || abc == 'jpg'  ||abc == 'JPG' ||abc == 'jpeg' ||abc == 'JPEG'||abc == 'png' ||abc == 'PNG' || abc == '' ){}else{
 		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg)  files.</div>');
		$("#editevent_validation"+iAppTabId).show();
		// $("#vImagee").val('');
		// $("#vImagee").focus();
		return false;
 	}

	if (vTitle=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter title.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vTitlee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	if (tDescriptione =='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#tDescriptione").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	if (dStartDate=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#dStartDatee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	if (vStartTime=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start time.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vStartTimee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	
	if (dEndDate=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#dEndDatee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	var timediff = new Date(dEndDate) - new Date(dStartDate);
	if(timediff == 0 || timediff > 0 ){
		$("#editevent_validation"+iAppTabId).hide();
		if(vStartTime == vEndTime && timediff == 0)
	     {
	     	$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>End Time must be greater than Start Time.</div>');
			$("#editevent_validation"+iAppTabId).show();
			$("#vStartTimee").focus();
			return false;
	     }
	     else{
			$("#editevent_validation"+iAppTabId).hide();
	     }
	     if(vEndTime < vStartTime && timediff == 0){
	     	
			$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>End Time must be greater than Start Time.</div>');
			$("#editevent_validation"+iAppTabId).show();
			$("#vStartTimee").focus();
			return false;
	     		
	     }else{
	     	

			$("#editevent_validation"+iAppTabId).hide();
			
	     }


	}else{
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>End Date must be greater than Start Date.</div>');
		$("#editevent_validation"+iAppTabId).show();
		/*$("#dEndDate"+iAppTabId).focus();*/
		return false;
	}

	if (vEndTime=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vEndTimee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
}else if(language == 'rFrench'){
if (vImage=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionnez l`image.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vImagee").focus();
		return false;
	
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
     if(abc == 'gif' || abc == 'GIF' || abc == 'jpg'  ||abc == 'JPG' ||abc == 'jpeg' ||abc == 'JPEG'||abc == 'png' ||abc == 'PNG' || abc == '' ){}else{
 		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît télécharger uniquement l`image (gif, jpg, jpeg) fichiers.</div>');
		$("#editevent_validation"+iAppTabId).show();
		// $("#vImagee").val('');
		// $("#vImagee").focus();
		return false;
 	}

	if (vTitle=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrer le titre.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vTitlee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	if (tDescriptione =='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez description.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#tDescriptione").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	if (dStartDate=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionner la date de début.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#dStartDatee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	if (vStartTime=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionnez l`heure de début.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vStartTimee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	
	if (dEndDate=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionner la date de fin.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#dEndDatee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
	
	var timediff = new Date(dEndDate) - new Date(dStartDate);
	if(timediff == 0 || timediff > 0 ){
		$("#editevent_validation"+iAppTabId).hide();
		if(vStartTime == vEndTime && timediff == 0)
	     {
	     	$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Heure de fin doit être supérieure à Heure de début.</div>');
			$("#editevent_validation"+iAppTabId).show();
			$("#vStartTimee").focus();
			return false;
	     }
	     else{
			$("#editevent_validation"+iAppTabId).hide();
	     }
	     if(vEndTime < vStartTime && timediff == 0){
	     	
			$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Heure de fin doit être supérieure à Heure de début.</div>');
			$("#editevent_validation"+iAppTabId).show();
			$("#vStartTimee").focus();
			return false;
	     		
	     }else{
	     	

			$("#editevent_validation"+iAppTabId).hide();
			
	     }


	}else{
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Date de fin doit être supérieure à Date de début.</div>');
		$("#editevent_validation"+iAppTabId).show();
		/*$("#dEndDate"+iAppTabId).focus();*/
		return false;
	}

	if (vEndTime=='') {		
		$("#editevent_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît sélectionnez l`heure de fin.</div>');
		$("#editevent_validation"+iAppTabId).show();
		$("#vEndTimee").focus();
		return false;
     }else{
		$("#editevent_validation"+iAppTabId).hide();
     }
}


    $('#frmeditevent_'+iAppTabId).ajaxSubmit(function(data) {
	
            $.fancybox.close();
            var extra = '';
            show_loading();
            if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
            }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           } 
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }                        
            var pars = extra;    
            var url = base_url+"app/appwiseeventlisting";
            //console.log(url+pars);
            //alert(url+pars);;
            $.post(url+pars,
            function(data) {
             
            
             if($('#event_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#event_listing'+iAppTabId).html(data);             
             }
            });  
    });
}


function delete_event(iEventId,iAppTabId){
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
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
     if($('#event_listing'+iAppTabId)){
         hide_loading();   
        $('#event_listing'+iAppTabId).html(data);             
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

	function deleteeventhimage(eventId){
	var pars = '?iEventId='+eventId;  
	var url = base_url+"app/deleteeventhimage";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#hdeletebtndivid").hide();
			//$("#vOldImage").val('');
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
	show_loading();
	var name = 'tDescriptionf'+iEventId;
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
    	//Made Changes By Sagar On Date : 7-6-2014
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
    	//End Sagar Code 
        $(document).ready(function () {	
        	hide_loading();			
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no',beforeShow: function(){$(".gcp").colorpicker({});}});
	    });
	     var editor = CKEDITOR.instances[name];
	     if (typeof editor === "undefined"){
    		if (editor) { editor.destroy(true); }
	     }
	     CKEDITOR.replace(name, {
	     			/**
	     				language
	     			**/
	     			language : 'fr',
	     			uiColor: '#9AB8F3'	
		});

	    $('.gcp').colorpicker().on('changeColor', function(ev){
			var cval = ev.color.toHex();
		    $(this).val(ev.color.toHex());
		    $(this).css('background',cval);
		    //bodyStyle.backgroundColor = ev.color.toHex();
		})
	    $('.eventd').datepicker({
         format: "yyyy-mm-dd",
              startDate: "0d",
              autoclose: true,
              orientation: "top left",
              todayHighlight: true,
              language: "fr"	
	});
        

        $('.eventtime').timepicker({showMeridian: false});
        $('.wysihtmleditor5').wysihtml5();	  
    });   
}

$(document).ready(function(){
	 $('#vTelephone').attr('maxlength','13');
});

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

function news_validation(iAppTabId){
	var language = $("#language").val();	
	var vGoogleNewsKeyWordse = $("#vGoogleNewsKeyWordse"+iAppTabId).val();
	var vTweetsKeyWordse = $("#vTweetsKeyWordse"+iAppTabId).val();
	if(language == 'rEnglish'){
		 if (vGoogleNewsKeyWordse=='') {		
			$("#addnews_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter google news keyWord.</div>');
			$("#addnews_validation"+iAppTabId).show();
			$("#vGoogleNewsKeyWordse"+iAppTabId).focus();
			return false;	
	     }else{
			$("#addnews_validation"+iAppTabId).hide();
	     }
		
	     if (vTweetsKeyWordse=='') {		
			$("#addnews_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter tweets keyword.</div>');
			$("#addnews_validation"+iAppTabId).show();
			$("#vTweetsKeyWordse"+iAppTabId).focus();
			return false;
		
	     }else{
			$("#addnews_validation"+iAppTabId).hide();
	     }	
	}else if(language == 'rFrench'){
			 if (vGoogleNewsKeyWordse=='') {		
				$("#addnews_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrer les mots-clés Google nouvelles.</div>');
				$("#addnews_validation"+iAppTabId).show();
				$("#vGoogleNewsKeyWordse"+iAppTabId).focus();
				return false;	
		     }else{
				$("#addnews_validation"+iAppTabId).hide();
		     }
			
		     if (vTweetsKeyWordse=='') {		
				$("#addnews_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrer tweets mot-clé.</div>');
				$("#addnews_validation"+iAppTabId).show();
				$("#vTweetsKeyWordse"+iAppTabId).focus();
				return false;
			
		     }else{
				$("#addnews_validation"+iAppTabId).hide();
		     }	
	}	   
	$('#frmlocation_'+iAppTabId).submit();
}
/* 
 Modified By : Nizam Kadri.
 Modified Date : 21/05/2014.
 Purpose : Edit at first line of mailing_validation function to get proper validation in ckeditor of mailing tab.
*/
function mailinglist_validation(iAppTabId){
	var tDescription = CKEDITOR.instances['tDescriptione'+iAppTabId].getData();
     if (tDescription=='') {		
		$("#addmailing_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
		$("#addmailing_validation"+iAppTabId).show();
		$("#tDescriptione"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addmailing_validation"+iAppTabId).hide();
     }	

    $('#frmmailinglist_'+iAppTabId).submit();	
}

function rss_validation(iAppTabId){

	var vRSSURLe = $("#vRSSURLe"+iAppTabId).val();
	var vIcone = $('#vIcone').val();
	var af = vIcone.substring(vIcone.lastIndexOf('.') + 1).toLowerCase();
	
     if (vRSSURLe=='') {

		$("#addrss_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter url.</div>');
		$("#addrss_validation"+iAppTabId).show();
		$("#vRSSURLe"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addrss_validation"+iAppTabId).hide();
     }

    if (!is_valid_url(vRSSURLe)) {		
		$("#addrss_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid url.</div>');
		$("#addrss_validation"+iAppTabId).show();
		$("#vRSSURLe"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addrss_validation"+iAppTabId).hide();
    }

   if(vIcone=='')
   	{
   		$("#addrss_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Icon.</div>');
		$("#addrss_validation"+iAppTabId).show();
		$("#vIcone").focus();
		return false;
   	}
   	else
   	{
   		$("#addrss_validation"+iAppTabId).hide();
   	}
   	if(af == 'gif' || af == 'GIF' || af == 'jpg'  ||af == 'JPG' ||af == 'jpeg' ||af == 'JPEG'||af == 'png' ||af == 'PNG' || af == '' ){}else{
 		$("#addrss_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg)  files.</div>');
		$("#addrss_validation"+iAppTabId).show();
		$("#vIcone").val('');
		$("#vIcone").focus();
		return false;
 	}
     
	$("#frmrss_"+iAppTabId).submit();
}
function frmyoutube_validation(iAppTabId){
	var vChannelNamee = $("#vChannelNamee"+iAppTabId).val();
	var language = $('#language').val();
	var tDescription = $("#tDescription"+iAppTabId).val();

if(language == 'rEnglish'){
     if (vChannelNamee=='') {		
		$("#addyoutube_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter channel name.</div>');
		$("#addyoutube_validation"+iAppTabId).show();
		$("#vChannelNamee"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addyoutube_validation"+iAppTabId).hide();
     }	

     if (tDescription=='') {		
		$("#addyoutube_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
		$("#addyoutube_validation"+iAppTabId).show();
		$("#tDescription"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addyoutube_validation"+iAppTabId).hide();
     }
}else if(language == 'rFrench'){
     if (vChannelNamee=='') {		
		$("#addyoutube_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez le nom de votre chaîne Youtube.</div>');
		$("#addyoutube_validation"+iAppTabId).show();
		$("#vChannelNamee"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addyoutube_validation"+iAppTabId).hide();
     }	

     if (tDescription=='') {		
		$("#addyoutube_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez la description.</div>');
		$("#addyoutube_validation"+iAppTabId).show();
		$("#tDescription"+iAppTabId).focus();
		return false;
	
	     }else{
			$("#addyoutube_validation"+iAppTabId).hide();
	     }
	}     	

	$("#frmyoutube_"+iAppTabId).submit();
}

function closeleanmodal(){
	$.fancybox.close();   
}

// closeleanmodal1
function closeleanmodal1(){
 	$.fancybox.close();
}

function closeleanmodal(id){
 var str = confirm("Êtes-vous sûr que vous voulez fermer !!");
 
 if(str == true){
 	$("#"+id).trigger('reset');
  	$.fancybox.close();   
 }else{
	$(".popup-body").animate({scrollTop:$(document).height()}, 1000);
	e.preventDefault();
 }
}

$('#vStartTime').timepicker({showMeridian: false});
$('#vEndTime').timepicker({showMeridian: false});
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


$('#addevenitid,#mailchamppopup,#mailingcategory,#addmailingcategory').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
$('#addtwotireid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no',
	beforeShow: function(){
        $(".gcp").colorpicker({});
    },


	
});


$('#addpdfid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addblogid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addcatalogueid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addappointmentid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});


$('#addpromotionid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});


$('#addticketinfoid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addtestonomialid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addreviewid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addserviceid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});


$('#addarrivalid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addecommerceid').fancybox({
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


function infotab_validation(iAppTabId){
	var language = $("#language").val();
	var vTitlein = $("#vTitlein"+iAppTabId).val();
	var tDescription = CKEDITOR.instances['tDescription'+iAppTabId].getData();//$("#tDescription"+iAppTabId).val();
	//console.log(tDescription);
	if(language == 'rEnglish')
	{
	     if (vTitlein=='') {		
			$("#addabout_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter title.</div>');
			$("#addabout_validation"+iAppTabId).show();
			$("#vTitlein"+iAppTabId).focus();
			return false;
		
	     }else{
			$("#addabout_validation"+iAppTabId).hide();
	     }	
	     if (tDescription=='') {		
			$("#addabout_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
			$("#addabout_validation"+iAppTabId).show();
			$("#tDescription"+iAppTabId).focus();
			return false;
		
	     }else{
			$("#addabout_validation"+iAppTabId).hide();
	     }	
	}else if(language == 'rFrench'){
	     if (vTitlein=='') {		
			$("#addabout_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Titre.</div>');
			$("#addabout_validation"+iAppTabId).show();
			$("#vTitlein"+iAppTabId).focus();
			return false;
		
	     }else{
			$("#addabout_validation"+iAppTabId).hide();
	     }	
	     if (tDescription=='') {		
			$("#addabout_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer description.</div>');
			$("#addabout_validation"+iAppTabId).show();
			$("#tDescription"+iAppTabId).focus();
			return false;
		
	     }else{
			$("#addabout_validation"+iAppTabId).hide();
	     }	
	}	   
    $("#frminfotab_"+iAppTabId).submit();    
}
/*Date : 23-5-2014
Name : hem
Description : modify
*/function showhide_file(val,id,iAppTabId){
 
 //console.log('call');
 //var divname = 'maindiv'+val;
var vPdfUrl = $("#vPdfUrl"+id).val();
var vPdfFile = $("#vPdfFile"+id).val();
/*alert(vPdfUrl);*/
 if (val == 'Pdf File'){
  $('#vPdfUrl'+id).val('');
  $("#maindivvPdfUrl").hide();
  $("#maindivvPdfFile").show();
 }
 if (val == 'Pdf Url'){
  $('#vPdfFile'+id).val('');  
  $("#maindivvPdfUrl").show();
  $("#maindivvPdfFile").hide();
  
 } 
 return false;
}
  /*
	Modified By : Nizam Kadri
	Modified Date : 07-06-2014
	Problem Fixed Related to Pdf Validations and Performation.
    */
function showhide_fileedit(val,id,iAppTabId){
 //console.log('call');
 //var divname = 'maindiv'+val;
 var vPdfUrl = $('#vPdfUrle'+id).val();
 var vPdfFile = $('#vPdfFilee'+id).val();
 if (val == 'Pdf File'){
  console.log('calaaaal');
  $('#vPdfUrle'+id).val('');
  $("#emaindivvPdfUrl").hide();
  $("#emaindivvPdfFile").show();
 }
 if (val == 'Pdf Url'){
  $('#vPdfFilee'+id).val('');
  console.log('calaaSSaal');
  $("#emaindivvPdfUrl").show();
  $("#emaindivvPdfFile").hide();
  
 } 
 return false;
}
function CheckValidPdfFile(val,name,id)
{ 
	var vPdfFile = $('#vPdfFile'+id).val();
	var vPdfTitle = $('#vPdfTitle'+id).val();
var maxCheck = (document.getElementById('vPdfFile'+id).files[0].size);



 var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();

 if((maxCheck)/(1024*1024) > 2)
       {
       	// alert((document.getElementById('vPdfFile'+id).files[0].size));
			$("#addpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Maximum file size is restricted to 2MB.Please try again Uploading other PDF document only!!</div>');
			$("#addpdf_validation"+id).show();
			$("#vPdfFile"+id).focus();
			$("#vPdfFile"+id).val('');
			return false;   
        }
        else
	  	{
			$("#addpdf_validation"+id).hide();
		}

		//var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	 //var file = val.substring(val.lastIndexOf("/")+1).toLowerCase();
	//var file = $('#vPdfFile'+id).val();
	var pars='';
	var file=val.replace(/^.*(\\|\/|\:)/,'');

	//var pars = 'iAppTabId='+file;
	var pars = 'iAppTabId='+id+'&file='+file+'&vPdfTitle='+vPdfTitle;
	//alert(pars);
	 $.ajax({
	   type: 'POST',
	   data : pars,
	   url: base_url+'app/PdfCheck',
	 
	   success: function(data) {
	    // alert(data);
	    if(data==1)
	    {
		     $("#addpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>This file is already exist with this Name, Please try another!!</div>');
		    $("#addpdf_validation"+id).show();
		   	$("#vPdfFile"+id).focus();
		   	$("#vPdfFile"+id).val('');
		   	return false;
	    }
	    else
	    {
		  	$("#addpdf_validation"+id).hide();
	    }
	    }
	     });


 if(a == 'pdf')
 return true;
 $("#addpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select PDF file.</div>');
  $("#addpdf_validation"+id).show();
  $("#vPdfTitle"+id).focus();
  return false;

}
function CheckValidPdfFilee(val,name,id)
{
	var vPdfFile = $('#vPdfFilee'+id).val();
	// var vPdfFileExist=$('#vOldFile').val();
	//alert(vPdfFileExist);
    var vPdfTitle = $('#vPdfTitlee'+id).val();
	
	 var maxCheck = (document.getElementById('vPdfFilee'+id).files[0].size);
	
	var b = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
 
	if((maxCheck)/(1024*1024) > 2)
       {
       	// alert((document.getElementById('vPdfFile'+id).files[0].size));
			$("#editpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Maximum file size is restricted to 2MB.Please try again Uploading other PDF documents only!!</div>');
			$("#editpdf_validation"+id).show();
			$("#vPdfFilee"+id).focus();
			$("#vPdfFilee"+id).val('');
			return false;   
        }
        else
	  	{
			$("#editpdf_validation"+id).hide();
		}


		var pars='';
	var file=val.replace(/^.*(\\|\/|\:)/,'');

	//var pars = 'iAppTabId='+file;
	var pars = 'iAppTabId='+id+'&file='+file+'&vPdfTitle='+vPdfTitle;
	//alert(pars);
	 $.ajax({
	   type: 'POST',
	   data : pars,
	   url: base_url+'app/PdfCheck',
	 
	   success: function(data) {
	    // alert(data);
	    if(data==1)
	    {
			     $("#editpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>This file is already exist with this Name, Please try another!!</div>');
			    $("#editpdf_validation"+id).show();
			   	$("#vPdfFilee"+id).focus();
			   	$("#vPdfFilee"+id).val('');
			   	return false;

	    }
	    else
	    {
		  	$("#editpdf_validation"+id).hide();
	    }
	    }
	     });


		

 if(b != 'pdf')
{
 // $("#addpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select PDF file.</div>');
 //  $("#addpdf_validation"+id).show();
 //  $("#vPdfTitle"+id).focus();
 $("#editpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select PDF file only.</div>');
  $("#editpdf_validation"+id).show();
  $("#vPdfFilee"+id).focus();
  // $("#vPdfFilee"+id).val('');

  return false;
}
else
{
	$("#editpdf_validation"+id).hide();
}

}

function CheckAvlPdf(val,name,id)
{
	var vPdfTitle = $('#vPdfTitlee'+id).val();
	var vPdfFile = $('#vPdfFilee'+id).val();
    var vPdfFileExist=$('#vOldFile').val();

	var pars='';
	var file=val.replace(/^.*(\\|\/|\:)/,'');

	//var pars = 'iAppTabId='+file;
	var pars = 'iAppTabId='+id+'&vPdfTitle='+vPdfTitle+'&vPdfFileExist='+vPdfFileExist;
	//alert(pars);
	 $.ajax({
	   type: 'POST',
	   data : pars,
	   url: base_url+'app/ChkAvlPdf',
	 
	   success: function(data) {
	    // alert(data);
	    if(data==1)
	    {
			     $("#editpdf_validation"+id).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>This file is already exist with this Name, Please try another!!</div>');
			    $("#editpdf_validation"+id).show();
			   	$("#vPdfFilee"+id).focus();
			   	$("#vPdfTitlee"+id).val('');
			   	return false;

	    }
	    else
	    {
		  	$("#editpdf_validation"+id).hide();
	    }
	    }
	     });    

}
function submitpdf(iAppTabId,iFeatureId){
    
    var vPdfFile = $('#vPdfFile'+iAppTabId).val();
    var vPdfTitle = $('#vPdfTitle'+iAppTabId).val();
    var vPdfUrl = $('#vPdfUrl'+iAppTabId).val();
    var eFileType = $('#eFileType'+iAppTabId).val();
     var a = vPdfFile.substring(vPdfFile.lastIndexOf('.') + 1).toLowerCase();
     if (vPdfTitle=='') {		
		$("#addpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
		$("#addpdf_validation"+iAppTabId).show();
		$("#vPdfTitle"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addpdf_validation"+iAppTabId).hide();
     }

     if (eFileType=='') {		
		$("#addpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file type.</div>');
		$("#addpdf_validation"+iAppTabId).show();
		$("#eFileType"+iAppTabId).focus();
		return false;
     }else{
		$("#addpdf_validation"+iAppTabId).hide();
     }	

     if (eFileType=='Pdf File' && vPdfFile == "") {		
		$("#addpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file.</div>');
		$("#addpdf_validation"+iAppTabId).show();
		$("#vPdfFile"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addpdf_validation"+iAppTabId).hide();
     }		

     if (eFileType=='Pdf Url' && vPdfUrl == "") {		
		$("#addpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file url.</div>');
		$("#addpdf_validation"+iAppTabId).show();
		$("#vPdfUrl"+iAppTabId).focus();
		return false;
	
     }else{
		$("#addpdf_validation"+iAppTabId).hide();
     } 
     if(eFileType=='Pdf File' && a != 'pdf'){
		   $("#addpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select pdf file.</div>');
		  $("#addpdf_validation"+iAppTabId).show();
		  $("#vPdfFile"+iAppTabId).focus();
		  return false; 
		   }else{
		  $("#addpdf_validation"+iAppTabId).hide();
     }
     if (eFileType=='Pdf Url' && vPdfUrl != "") {
	    if (!is_valid_url(vPdfUrl)) {		
			$("#addpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid pdf url.</div>');
			$("#addpdf_validation"+iAppTabId).show();
			$("#vPdfUrl"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#addpdf_validation"+iAppTabId).hide();
	    }
     }

     if (vPdfUrl !='') {
    	 var patterny = /^(http[s]?:\/\/){0,1}(www\.)[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
		if(!patterny.test(vPdfUrl)) {
			$("#addpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid PDF url.</div>');
			$("#addpdf_validation"+iAppTabId).show();
			$("#vPdfUrl"+iAppTabId).focus();
			return false;
  		}else{
			$("#addpdf_validation"+iAppTabId).hide();
		}

    }

    $('#frmpdf_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }           
           
            var pars = extra;    
            var url = base_url+"app/appwisepdflisting";
            //console.log(url+pars);
            //alert(url+pars);;
            console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#pdf_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#pdf_listing'+iAppTabId).html(data);             
             }
            });
            window.location.href=base_url+'app/step3/'+iApplicationId; 
    });
    
}


function delete_pdf(iPdfId,iAppTabId){
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
     if($('#pdf_listing'+iAppTabId)){
         hide_loading();   
        $('#pdf_listing'+iAppTabId).html(data);
    	//window.location.href=base_url+'app/step3/'+iApplicationId;             
     }
    });   
}
function deletepdffile(iPdfId)
{
	$("#deletepdffile_"+iPdfId).hide();
}

/*function deletepdffile(iPdfId){
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
	}*/


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

   	//Made Changes By Sagar On Date : 7-6-2014
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
    	//End Sagar Code
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
        $('#dStartDatee').datepicker({
            format: 'yyyy-mm-dd',
            language: "fr"
        });
        
        $('#dEndDatee').datepicker({
            format: 'yyyy-mm-dd',
            language: "fr"
        });
        $('#vStartTimee').timepicker({showMeridian: false});
        $('#vEndTimee').timepicker({showMeridian: false});
        $('.wysihtmleditor5').wysihtml5();	  
    });   
}

function updatepdf(iAppTabId,iFeatureId){
  //  alert('call');return false;
    var vPdfFile = $('#vPdfFilee'+iAppTabId).val();
    var vPdfFileExist=$('#vOldFile').val();
    var vPdfTitle = $('#vPdfTitlee'+iAppTabId).val();
    var vPdfUrl = $('#vPdfUrle'+iAppTabId).val();
    var eFileType = $('#eFileTypee'+iAppTabId).val();
    var b = vPdfFile.substring(vPdfFile.lastIndexOf('.') + 1).toLowerCase();
   // alert(eFileType);return false;
     if (vPdfTitle=='') {		
		$("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
		$("#editpdf_validation"+iAppTabId).show();
		$("#vPdfTitlee"+iAppTabId).focus();
		return false;
	
     }else{
		$("#editpdf_validation"+iAppTabId).hide();
     }
     if (eFileType=='') {		
		$("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file type.</div>');
		$("#editpdf_validation"+iAppTabId).show();
		$("#eFileTypee"+iAppTabId).focus();
		return false;
	
     }else{
		$("#editpdf_validation"+iAppTabId).hide();
     }	
     if(vPdfFileExist == '')
     {
     if (eFileType=='Pdf File' && vPdfFile == "")
     {
		$("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file.</div>');
		$("#editpdf_validation"+iAppTabId).show();
		$("#vPdfFilee"+iAppTabId).focus();
		return false;
	
     }
     else
     {
     	$("#editpdf_validation"+iAppTabId).hide();
     }
 	}

  //    if (eFileType=='Pdf Url' && vPdfUrl == "") {		
		// $("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file url</div>');
		// $("#editpdf_validation"+iAppTabId).show();
		// $("#vPdfUrle"+iAppTabId).focus();
		// return false;
	
  //    }else{
	 //    if (!is_valid_url(vPdfUrl)) {		
		// 	$("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid pdf url</div>');
		// 	$("#editpdf_validation"+iAppTabId).show();
		// 	$("#vPdfUrl"+iAppTabId).focus();
		// 	return false;
		
	 //    }else{
		// 	$("#editpdf_validation"+iAppTabId).hide();
	 //    }
  //    }
		
     
     if(vPdfFileExist == '')
     {
     	if(eFileType=='Pdf File' && b != 'pdf'){
		   $("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select PDF file only.</div>');
		  $("#editpdf_validation"+iAppTabId).show();
		  $("#vPdfFilee"+iAppTabId).focus();
		  return false; 
		   }else{
		  $("#editpdf_validation"+iAppTabId).hide();
          }
      }
     
  		
     if (eFileType=='Pdf Url' && vPdfUrl == "")

     {		
		$("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select file url.</div>');
		$("#editpdf_validation"+iAppTabId).show();
		$("#vPdfUrle"+iAppTabId).focus();
		return false;
	
     }
     else
     {
     	if (eFileType=='Pdf Url' && vPdfUrl != "") {
	    if (!is_valid_url(vPdfUrl)) {		
			$("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid pdf url.</div>');
			$("#editpdf_validation"+iAppTabId).show();
			$("#vPdfUrl"+iAppTabId).focus();
			$("#vPdfUrle"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editpdf_validation"+iAppTabId).hide();
	    }
     }
	
	

     if (vPdfUrl !='') {
    	 var ptrn = /^(http[s]?:\/\/){0,1}(www\.)[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
    	 //var ptrn = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
		if(!ptrn.test(vPdfUrl)) {
			$("#editpdf_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid PDF url.</div>');
			$("#editpdf_validation"+iAppTabId).show();
			$("#vPdfUrle"+iAppTabId).focus();
			return false;
	  		}else{
				$("#editpdf_validation"+iAppTabId).hide();
			}
	    }

 	}
	

	
    
    $('#updatefrmpdf_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           hide_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
            var pars = extra;    
            var url = base_url+"app/appwisepdflisting";
            //console.log(url+pars);
            //alert(url+pars);;
           // console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#pdf_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#pdf_listing'+iAppTabId).html(data);             
             }
            });   
    });
    
}
 $(document).ready(function(){
 	$('#vTelephone').attr('maxlength','6');
 });

 /*  15-5-2014 maksud.validation change */
function submitlocation(iAppTabId,iFeatureId){
   	var vLocationTitle = $("#vLocationTitle"+iAppTabId).val();
	var language = $('#language').val();
	var vWebsite = $("#vWebsite"+iAppTabId).val();
	var vEmail = $("#vEmail"+iAppTabId).val();
	var vTelephone = $("#vTelephone"+iAppTabId).val();
	var vAddress1 = $("#vAddress1"+iAppTabId).val();
	var vCity = $("#vCity"+iAppTabId).val();
	var vState = $("#vState"+iAppTabId).val();
	var vZip = $("#vZip"+iAppTabId).val();
	var vLatitude = $("#vLatitude"+iAppTabId).val();
	var vLongitude = $("#vLongitude"+iAppTabId).val();
    
if(language == 'rEnglish'){
    if (vLocationTitle =='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter title.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLocationTitle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }
    
    if (vEmail=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vEmail"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }
	if (vEmail!='' ) {						
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
		var isvalid = emailRegexStr.test(vEmail);		
		if (!isvalid) {				
			$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address.</div>');
			$("#addloc_validation"+iAppTabId).show();
			$("#vEmail"+iAppTabId).focus();
			return false;
		}				
	}else{
		$("#addloc_validation"+iAppTabId).hide();
	}  
    
    if (vAddress1=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter address.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vAddress1"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }


    if (vCity=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter city.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vCity"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }


    if (vState=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter state.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vState"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }
    
    if (vLatitude=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLatitude"+iAppTabId).focus();
		return false;
	
    }else if(!isValidLatitude(vLatitude)){

		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid latitude.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLatitude"+iAppTabId).focus();
		return false;
    }
    else{

		$("#addloc_validation"+iAppTabId).hide();
    }

    if (vLongitude=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLongitude"+iAppTabId).focus();
		return false;
	
    }else if(!isValidLongitude(vLongitude)){

		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid longitude.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLatitude"+iAppTabId).focus();
		return false;
    }
    else{
		$("#addloc_validation"+iAppTabId).hide();
    }
}else if(language == 'rFrench'){
if (vLocationTitle =='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer  url Site web.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLocationTitle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }
    
    
    
    if (vEmail=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez email.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vEmail"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }
	if (vEmail!='' ) {						
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
		var isvalid = emailRegexStr.test(vEmail);		
		if (!isvalid) {				
			$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez l`adresse e-mail valide.</div>');
			$("#addloc_validation"+iAppTabId).show();
			$("#vEmail"+iAppTabId).focus();
			return false;
		}				
	}else{
		$("#addloc_validation"+iAppTabId).hide();
	}  
    
    if (vAddress1=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez l`adresse.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vAddress1"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }


    if (vCity=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez ville.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vCity"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }


    if (vState=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrer dans l`état.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vState"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addloc_validation"+iAppTabId).hide();
    }
    
    if (vLatitude=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrer latitude.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLatitude"+iAppTabId).focus();
		return false;
    }else if(!isValidLatitude(vLatitude)){
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrer latitude valide.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLatitude"+iAppTabId).focus();
		return false;
    }
    else{
		$("#addloc_validation"+iAppTabId).hide();
    }

    if (vLongitude=='') {		
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez la longitude.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLongitude"+iAppTabId).focus();
		return false;
	
    }else if(!isValidLongitude(vLongitude)){
		$("#addloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez la longitude valide.</div>');
		$("#addloc_validation"+iAppTabId).show();
		$("#vLatitude"+iAppTabId).focus();
		return false;
    }
    else{
		$("#addloc_validation"+iAppTabId).hide();
    }
}

    $('#frmloc_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }            
            var pars = extra;    
            var url = base_url+"app/appwiseloclisting";
            //console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#loc_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#loc_listing'+iAppTabId).html(data);             
             }
            });   
    });   
  } 
function delete_loc(iLocationId,iAppTabId){

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
     if($('#loc_listing'+iAppTabId)){
         hide_loading();   
        $('#loc_listing'+iAppTabId).html(data);             
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
    	//Made Changes By Sagar On Date : 7-6-2014
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
    	//End Sagar Code

        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}
/* Modified By:Maksud khan
   Modified Date:15-05-2014
	
    */
function updateloc(iAppTabId,iFeatureId){
	    
    var vLocationTitle = $("#vLocationTitlee"+iAppTabId).val();
	var vWebsite = $("#vWebsitee"+iAppTabId).val();
	var vEmail = $("#vEmaile"+iAppTabId).val();
	var vTelephone = $("#vTelephonee"+iAppTabId).val();
	var vAddress1 = $("#vAddress1e"+iAppTabId).val();
	var vCity = $("#vCitye"+iAppTabId).val();
	var vState = $("#vStatee"+iAppTabId).val();
	var vZip = $("#vZipe"+iAppTabId).val();
	var vLatitude = $("#vLatitudee"+iAppTabId).val();
	var vLongitude = $("#vLongitudee"+iAppTabId).val();
	var language =  $("#language").val();
	if(language == 'rEnglish')
	{
		if (vLocationTitle =='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter title.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLocationTitlee"+iAppTabId).focus();
			return false;
		}else{
			$("#editloc_validation"+iAppTabId).hide();
		}

	    if (vWebsite=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website name.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vWebsitee"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }

	    if (vWebsite !='' && !is_valid_url(vWebsite)) {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vWebsitee"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }

	    if (vWebsite !='') {
	    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
			if(!pattern.test(vWebsite)) {
				$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
				$("#editloc_validation"+iAppTabId).show();
				$("#vWebsitee"+iAppTabId).focus();
				return false;
	  		}else{
				$("#editloc_validation"+iAppTabId).hide();
			}
	    }

	    if (vEmail=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vEmaile"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }
		if (vEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vEmail);		
			if (!isvalid) {				
				$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address.</div>');
				$("#editloc_validation"+iAppTabId).show();
				$("#vEmaile"+iAppTabId).focus();
				return false;
			}				
		}else{
			$("#editloc_validation"+iAppTabId).hide();
		}    

	     if (vAddress1=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter address.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vAddress1e"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }


	    if (vCity=='' || !vCity.match('^[a-zA-Z]+$')) {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter city.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vCitye"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }


	    if (vState=='' || !vState.match('^[a-zA-Z]+$')) {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter state.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vStatee"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }


	    if (vLatitude=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLatitudee"+iAppTabId).focus();
			return false;
		
	    }else if(!isValidLatitude(vLatitude)){

			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid latitude.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLatitudee"+iAppTabId).focus();
			return false;
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }

	    if (vLongitude=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLongitudee"+iAppTabId).focus();
			return false;
		
	    }else if(!isValidLongitude(vLongitude)){

			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid longitude.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLongitudee"+iAppTabId).focus();
			return false;
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }
	}
	else if(language == 'rFrench'){
		if (vLocationTitle =='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Titre.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLocationTitlee"+iAppTabId).focus();
			return false;
		}else{
			$("#editloc_validation"+iAppTabId).hide();
		}

	    if (vWebsite=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>URL Site Web.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vWebsitee"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }

	    if (vWebsite !='' && !is_valid_url(vWebsite)) {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vWebsitee"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }

	    if (vWebsite !='') {
	    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
			if(!pattern.test(vWebsite)) {
				$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide.</div>');
				$("#editloc_validation"+iAppTabId).show();
				$("#vWebsitee"+iAppTabId).focus();
				return false;
	  		}else{
				$("#editloc_validation"+iAppTabId).hide();
			}
	    }

	    if (vEmail=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Votre Email.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vEmaile"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }
		if (vEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vEmail);		
			if (!isvalid) {				
				$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Entrez e-mail valide.</div>');
				$("#editloc_validation"+iAppTabId).show();
				$("#vEmaile"+iAppTabId).focus();
				return false;
			}				
		}else{
			$("#editloc_validation"+iAppTabId).hide();
		}    

	    if (vAddress1=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Saisissez l`adresse.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vAddress1e"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }


	    if (vCity=='' || !vCity.match('^[a-zA-Z]+$')) {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez la ville.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vCitye"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }


	    if (vState=='' || !vState.match('^[a-zA-Z]+$')) {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button> Entrez Etat.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vStatee"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }

	    if (vLatitude=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez latitude.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLatitudee"+iAppTabId).focus();
			return false;
		
	    }else if(!isValidLatitude(vLatitude)){

			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez latitude valid.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLatitudee"+iAppTabId).focus();
			return false;
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }
	    if (vLongitude=='') {		
			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez longitude.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLongitudee"+iAppTabId).focus();
			return false;	
	    }else if(!isValidLongitude(vLongitude)){

			$("#editloc_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez latitude valid.</div>');
			$("#editloc_validation"+iAppTabId).show();
			$("#vLongitudee"+iAppTabId).focus();
			return false;
	    }else{
			$("#editloc_validation"+iAppTabId).hide();
	    }
	}	  
    $('#updatefrmloc_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
            var pars = extra;    
            var url = base_url+"app/appwiseloclisting";
            //console.log(url+pars);
            //alert(url+pars);;
           // console.log(data);
            $.post(url+pars,
            function(data) {
             if($('#loc_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#loc_listing'+iAppTabId).html(data);             
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
/* 	Create by:- Maksud
	Description :- Qr Code validation
	Date: 4-08-2014
*/
function submitqrcoupon(iAppTabId,iFeatureId){ 
    var vImage = $('#vMobileHeaderImage'+iAppTabId).val();
    var vName = $('#vName'+iAppTabId).val();
    var tQrCode = $('#tQrCode'+iAppTabId).val();
    var dStartDate = $('#dStartDate'+iAppTabId).val();    
    var dEndDate = $('#dEndDate'+iAppTabId).val();
    var vTargetAmount = $('#vTargetAmount'+iAppTabId).val();
    var vBeforeHoursCheck = $('#vBeforeHoursCheck'+iAppTabId).val();    
    var ab = vImage.substring(vImage.lastIndexOf('.') + 1).toLowerCase();
    var language = $('#language').val();

	if(language == 'rEnglish'){
		  	if (vImage=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select images.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vMobileHeaderImage"+iAppTabId).focus();
				return false;
			
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
			
		    if(ab == 'gif' || ab == 'GIF' || ab == 'jpg'  ||ab == 'JPG' ||ab == 'jpeg' ||ab == 'JPEG'||ab == 'png' ||ab == 'PNG' || ab == '' ){}else{
		 		$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg)  files.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vMobileHeaderImage").val('');
				$("#vMobileHeaderImage").focus();
				return false;
		 	}

			if (vName=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vName"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
			
			if (dStartDate=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#dStartDate"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
			if (dEndDate=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#dEndDate"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (tQrCode=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Qrcoupon.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#tQrCode"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vTargetAmount=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter TargetAmount.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vTargetAmount"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vBeforeHoursCheck=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter CheckHours.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vBeforeHoursCheck"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
	}else if(language == 'rFrench'){
		  	if (vImage=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez une image.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vMobileHeaderImage"+iAppTabId).focus();
				return false;
			
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
			
		    if(ab == 'gif' || ab == 'GIF' || ab == 'jpg'  ||ab == 'JPG' ||ab == 'jpeg' ||ab == 'JPEG'||ab == 'png' ||ab == 'PNG' || ab == '' ){}else{
		 		$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionnez  image ( gif, jpg , jpeg ) fichiers.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vMobileHeaderImage").val('');
				$("#vMobileHeaderImage").focus();
				return false;
		 	}

			if (vName=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer nom.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vName"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
			
			if (dStartDate=='') {		
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez l`heure de début.</div>');
				$("#dStartDate"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
			if (dEndDate=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez l`heure de fin.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#dEndDate"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (tQrCode=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Qr Coupon.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#tQrCode"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vTargetAmount=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Cible Montant.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vTargetAmount"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vBeforeHoursCheck=='') {		
				$("#addqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer CheckHours.</div>');
				$("#addqrcoupon_validation"+iAppTabId).show();
				$("#vBeforeHoursCheck"+iAppTabId).focus();
				return false;
		     }else{
				$("#addqrcoupon_validation"+iAppTabId).hide();
		     }
	}
  	
    $('#frmqrcoupon_'+iAppTabId).ajaxSubmit(function(data) {
    		$("input:text").val("");									
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }                       
            var pars = extra;    
            var url = base_url+"app/appwiseqrcouponlisting";
            //console.log(url+pars);
            //alert(url+pars);;
            $.post(url+pars,
            function(data) {
             if($('#qrcoupon_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#qrcoupon_listing'+iAppTabId).html(data);             
             }
            });   
    });
}

function delete_qrcoupon(iQrID,iAppTabId){
    var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iQrID !=''){
        extra += '&iQrID='+iQrID;
        
    }
    var pars = extra;    
    var url = base_url+"app/delete_qrcoupon";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
     if($('#qrcoupon_listing'+iAppTabId)){
         hide_loading();   
        $('#qrcoupon_listing'+iAppTabId).html(data);             
     }
    });   
}
function edit_qrcoupon(iQrID,iFeatureId){
	
    var extra = '';
    var name = 'tDescriptione';

    if(iQrID !=''){
        extra += '?iQrID='+iQrID;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditqrcouponpopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {

    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
    	//End Sagar Code 
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });

	    var editor = CKEDITOR.instances[name];
		if (typeof editor === "undefined")
		{
			if (editor) { editor.destroy(true); }
		}

	         	/** ckeditor **/
	     	CKEDITOR.replace(name, {
	     		language: 'fr',
		  		uiColor: '#9AB8F3'
				
			});
			$('.eventd').datepicker({
	         		format: "yyyy-mm-dd",
	              startDate: "0d",
	              autoclose: true,
	              orientation: "top left",
	              todayHighlight: true,
	              language: "fr"	
	         });  
	    	$('.wysihtmleditor5').wysihtml5();	  
    	}); 

    	
}
function updateqrcoupon(iAppTabId,iFeatureId){
	
   	var vImagee = $('#vMobileHeaderImagee'+iAppTabId).val();
    var vNamee = $('#vNamee'+iAppTabId).val();
    var tQrCodee = $('#tQrCodee'+iAppTabId).val();
    var dStartDatee = $('#dStartDatee'+iAppTabId).val();    
    var dEndDatee = $('#dEndDatee'+iAppTabId).val();
    var vTargetAmounte = $('#vTargetAmounte'+iAppTabId).val();
    var vBeforeHoursChecke = $('#vBeforeHoursChecke'+iAppTabId).val();
    var abe = vImagee.substring(vImagee.lastIndexOf('.') + 1).toLowerCase();
    var language = $('#language').val();

	if(language == 'rEnglish'){
			if (vNamee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#vNamee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
			
			if (dStartDatee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#dStartDatee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
			if (dEndDatee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#dEndDatee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (tQrCodee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Qrcoupon.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#tQrCodee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vTargetAmounte=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter TargetAmount.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#vTargetAmounte"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vBeforeHoursChecke=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter CheckHours.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#vBeforeHoursChecke"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
	}else if(language == 'rFrench'){
			if (vNamee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer nom.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#vNamee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
			
			if (dStartDatee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez la date de début.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#dStartDatee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
			if (dEndDatee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez la date de fin.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#dEndDatee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (tQrCodee=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Qrcoupon.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#tQrCodee"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vTargetAmounte=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Cible Montant.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#vTargetAmounte"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
		     if (vBeforeHoursChecke=='') {		
				$("#editqrcoupon_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer CheckHours.</div>');
				$("#editqrcoupon_validation"+iAppTabId).show();
				$("#vBeforeHoursChecke"+iAppTabId).focus();
				return false;
		     }else{
				$("#editqrcoupon_validation"+iAppTabId).hide();
		     }
	}
	
    $('#frmeditqrcoupon_'+iAppTabId).ajaxSubmit(function(data) {
	
            $.fancybox.close();
            /*var extra = '';
            show_loading();
            if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
            }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           } 
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }                        
            var pars = extra;    
            var url = base_url+"app/appwiseeventlisting";*/
            //console.log(url+pars);
            //alert(url+pars);;
           /* $.post(url+pars,
            function(data) {
             
            
             if($('#event_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#event_listing'+iAppTabId).html(data);             
             }
            });  */
    });
}
function deleteqrcouponimage(iQrID){
	var pars = '?iQrID='+iQrID;  
	var url = base_url+"app/deleteqrcouponimage";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#hdeletebtndivid").hide();
			//$("#vOldImage").val('');
		}
	  }
	);
	}


function updatesociald(iAppTabId,iFeatureId){

	var vNamee = $("#vNamee"+iAppTabId).val();
	var vUrle = $("#vUrle"+iAppTabId).val();
	if (vNamee=='') {		
		$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
		$("#editsocial_validation"+iAppTabId).show();
		$("#vNamee"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editsocial_validation"+iAppTabId).hide();
    }

    /*if (vUrle=='') {		
		$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter url.</div>');
		$("#editsocial_validation"+iAppTabId).show();
		$("#vUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editsocial_validation"+iAppTabId).hide();
    }
    if (!is_valid_url(vUrle)) {		
		$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid  url.</div>');
		$("#editsocial_validation"+iAppTabId).show();
		$("#vUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editsocial_validation"+iAppTabId).hide();
    }
    if (vUrle !='') {
    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
		if(!pattern.test(vUrle)) {
			$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid  url.</div>');
				$("#editsocial_validation"+iAppTabId).show();
				$("#vUrle"+iAppTabId).focus();
				return false;
  		}else{
			$("#editsocial_validation"+iAppTabId).hide();
		}
    }*/
    

    $('#updatefrmsocial_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
            var pars = extra;    
            var url = base_url+"app/appwisesociallisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {
             //if($('#website_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#social_listing'+iAppTabId).html(data);             
            // }
            });   
    });   
  } 
  /* Create by:- Maksud
	Description :- Loyalty validation
	Date: 22-08-2014
	*/
  function submitloyalty(iAppTabId,iFeatureId){

	var vRewardText = $("#vRewardText"+iAppTabId).val();
	var vSecretCode = $("#vSecretCode"+iAppTabId).val();
	var vThumbnail = $("#vThumbnail"+iAppTabId).val();
//	alert(vThumbnail);return false;
//	var thumbnil = vThumbnail.substring(vThumbnail.lastIndexOf('.') + 1).toLowerCase();
	var language = $('#language').val();

	if(language == 'rEnglish'){
		  	if (vThumbnail=='') {		
				$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select images.</div>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vThumbnail"+iAppTabId).focus();
				return false;
			
		     }else{
				$("#addloyalty_validation"+iAppTabId).hide();
		     }
			
		    /*if(thumbnil == 'gif' || thumbnil == 'GIF' || thumbnil == 'jpg'  ||thumbnil == 'JPG' ||thumbnil == 'jpeg' ||thumbnil == 'JPEG'||thumbnil == 'png' ||thumbnil == 'PNG' || thumbnil == '' ){}else{
		 		$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg)  files.</div>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vThumbnail").val('');
				$("#vThumbnail").focus();
				return false;
		 	}*/
		 	if (vRewardText=='') {		
				$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Rewardtext.</div>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vRewardText"+iAppTabId).focus();
				return false;
			
		    }else{
				$("#addloyalty_validation"+iAppTabId).hide();
		    }
		    if (vSecretCode=='') {		
				$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Secretcode.</div>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vSecretCode"+iAppTabId).focus();
				return false;
			
		    }else{
				$("#addloyalty_validation"+iAppTabId).hide();
		    }
	}else if(language == 'rFrench'){
		  	if (vThumbnail=='') {		
				$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez une image.</div>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vThumbnail"+iAppTabId).focus();
				return false;
			
		     }else{
				$("#addloyalty_validation"+iAppTabId).hide();
		     }
			
		    /*if(thumbnil == 'gif' || thumbnil == 'GIF' || thumbnil == 'jpg'  ||thumbnil == 'JPG' ||thumbnil == 'jpeg' ||thumbnil == 'JPEG'||thumbnil == 'png' ||thumbnil == 'PNG' || thumbnil == '' ){}else{
		 		$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionnez  image ( gif, jpg , jpeg ) fichiers.</div>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vThumbnail").val('');
				$("#vThumbnail").focus();
				return false;
		 	}*/
		 	if (vRewardText=='') {		
				$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Récompense texEntrerdiv>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vRewardText"+iAppTabId).focus();
				return false;
			
		    }else{
				$("#addloyalty_validation"+iAppTabId).hide();
		    }
		    if (vSecretCode=='') {		
				$("#addloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer code Secret.</div>');
				$("#addloyalty_validation"+iAppTabId).show();
				$("#vSecretCode"+iAppTabId).focus();
				return false;
			
		    }else{
				$("#addloyalty_validation"+iAppTabId).hide();
		    }
	}
  
    $('#frmloyalty_'+iAppTabId).ajaxSubmit(function(data) {
		   $("input:text").val("");
		   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
           
            var pars = extra;    
            var url = base_url+"app/appwiseloyaltylisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {

             if($('#loyalty_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#loyalty_listing'+iAppTabId).html(data);             
             }
            });   
    });   
  }
  function delete_loyalty(iLoyaltyID,iAppTabId){

  	var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    if(iLoyaltyID !=''){
        extra += '&iLoyaltyID='+iLoyaltyID;
        
    }
    if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
        
    }
    var pars = extra;    
    var url = base_url+"app/loyalty_delete";
    $.post(url+pars,
    function(data) {
     if($('#loyalty_listing'+iAppTabId)){
         hide_loading();   
        $('#loyalty_listing'+iAppTabId).html(data);
             
     }
    });   
  }
  function edit_loyalty(iLoyaltyID,iFeatureId){
	var extra = '';
    if(iLoyaltyID !=''){
        extra += '?iLoyaltyID='+iLoyaltyID;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditloyaltypopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}
function updateloyalty(iAppTabId,iFeatureId){
	var vRewardTexte = $("#vRewardTexte"+iAppTabId).val();
	var vSecretCode =$("#vSecretCodee"+iAppTabId).val();
 	if (vRewardTexte=='') {		
		$("#editloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Rewardtext.</div>');
		$("#editloyalty_validation"+iAppTabId).show();
		$("#vRewardTexte"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editloyalty_validation"+iAppTabId).hide();
    }
    if (vSecretCode=='') {		
		$("#editloyalty_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Secretcode.</div>');
		$("#editloyalty_validation"+iAppTabId).show();
		$("#vSecretCodee"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editloyalty_validation"+iAppTabId).hide();
    }
	$('#updatefrmloyalty_'+iAppTabId).ajaxSubmit(function(data) {
		   $("input:text").val("");
		   
		   	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
           
            var pars = extra;    
            var url = base_url+"app/appwiseloyaltylisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {

             if($('#loyalty_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#loyalty_listing'+iAppTabId).html(data);             
             }
            });   
    });   
}
  /* Create by:- Maksud
	Description :- menu validation validation
	Date: 7-08-2014
	*/
  function submitmenu(iAppTabId,iFeatureId)
  {
	var vName = $("#vName"+iAppTabId).val();
 	var language = $("#language").val();
 	if(language == 'rEnglish'){
		if (vName=='') {		
			$("#addmenu_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$("#addmenu_validation"+iAppTabId).show();
			$("#vName"+iAppTabId).focus();
		return false;
		}else{
			$("#addmenu_validation"+iAppTabId).hide();
		}
 	}else if(language == 'rFrench'){
 		if (vName=='') {		
			$("#addmenu_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
			$("#addmenu_validation"+iAppTabId).show();
			$("#vName"+iAppTabId).focus();
		return false;
		}else{
			$("#addmenu_validation"+iAppTabId).hide();
		}
 	}	
    $('#frmmenu_'+iAppTabId).ajaxSubmit(function(data) {
		   $("input:text").val("");
		   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
           
            var pars = extra;    
            var url = base_url+"app/appwisemenulisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {

             if($('#menu_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#menu_listing'+iAppTabId).html(data);    
                window.location.reload();         
             }
            });   
    });   
  }
  /* Create by:- Maksud
	Description :- Delete menu
	Date: 8-08-2014
	*/
  function delete_menu(iMenuID,iAppTabId)
  {
	var extra = '';
    show_loading();
    
    if($('#iApplicationId'))
    {
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iMenuID !=''){
        extra += '&iMenuID='+iMenuID;
        
    }
    var pars = extra;    
    var url = base_url+"app/menu_delete";
    $.post(url+pars,
    function(data) {
     if($('#menu_listing'+iAppTabId)){
         hide_loading();   
        $('#menu_listing'+iAppTabId).html(data);
             
     }
    });   
}


/*
	delete catalogue menu	
*/
function delete_catalogue_main(iCatalogueMainId,iAppTabId){
		var extra = '';
	    show_loading();
	    
	    if($('#iApplicationId'))
	    {
	        var iApplicationId = $('#iApplicationId').val();
	        extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iCatalogueMainId !=''){
	        extra += '&iCatalogueMainId='+iCatalogueMainId;
	    }
	    var pars = extra;    
	    var url = base_url+"app/catalogue_main_delete";
	    $.post(url+pars,
	    function(data) {
	     if($('#catalogue_listing'+iAppTabId)){
	         hide_loading();   
	        $('#catalogue_listing'+iAppTabId).html(data);
	             
	     }
    }); 
}

/*
	edit sub catalogue popup
*/
function edit_sub_catalogue(iCatalogueSubId,iCatalogueMainId,iAppTabId,iApplicationId)
{
		var extra = '';
		if(iCatalogueSubId !=''){
			extra +='?iCatalogueSubId='+iCatalogueSubId;
		}
		if(iCatalogueMainId){
            extra += '&iCatalogueMainId='+iCatalogueMainId;
        }
		if(iAppTabId){
            extra += '&iAppTabId='+iAppTabId;
        }
        if(iApplicationId !=''){
        	extra += '&iApplicationId='+iApplicationId;
    	} 

		var pars=extra;
		var url = base_url+"app/showeditsubcataloguepopup";

		$.post(url+pars,
			function(data){
			if(data.length<=0){
				$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
				var link = document.getElementById("alertHref");
				link.setAttribute('onclick', "location.reload()");			
		 		var link1 = document.getElementById("close");
				link1.setAttribute('onclick', "location.reload()");			
				hide_loading();
	    		exit();
			}
			$(document).ready(function () {				
	    		$.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
    		});
		});
}


function updatecataloguemain(iAppTabId,iFeatureId)
{
	var vCatalogueName = $("#vCatalogueName").val();
	var language = $("#language").val();

	if(language == 'rEnglish')
	{
		if (vCatalogueName=='') {		
			$("#editcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$("#editcatalogue_validation"+iAppTabId).show();
			$("#vCatalogueName"+iAppTabId).focus();
			return false;	
	    }else{
			$("#editcatalogue_validation"+iAppTabId).hide();
	    }
	}
	else if(language == 'rFrench'){
		if (vCatalogueName=='') {		
			$("#editcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
			$("#editcatalogue_validation"+iAppTabId).show();
			$("#vCatalogueName"+iAppTabId).focus();
			return false;	
	    }else{
			$("#editcatalogue_validation"+iAppTabId).hide();
	    }
	}

	/*
		udpate frm catalogue
	*/
	$("#updatefrmcataloguemain_"+iAppTabId).ajaxSubmit(function(data) {
		   $("input:text").val("");		   		   
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }  
		   
            var pars = extra;    
            var url = base_url+"app/appwisecataloguelisting";
            $.post(url+pars,
            function(data) {
             if($('#catalogue_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#catalogue_listing'+iAppTabId).html(data);             
             }
            });   
    });
}

/*
	edit catalogue main
*/
function edit_catalogue_main(iCatalogueMainId,iFeatureId,iApplicationId)
{
	var extra = '';
    if(iCatalogueMainId !=''){
        extra += '?iCatalogueMainId='+iCatalogueMainId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    if(iApplicationId !=''){
        extra += '&iApplicationId='+iApplicationId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditcataloguemainpopup";
   
    $.post(url+pars,
    function(data) {
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
    }); 
}

 /* Create by:- Maksud
	Description :- Delete menu
	Date: 8-08-2014
	*/
function edit_menu(iMenuID,iFeatureId){
	var extra = '';
    if(iMenuID !=''){
        extra += '?iMenuID='+iMenuID;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditmenupopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}
/* Create by:- Maksud
	Description :- Update Menu
	Date: 12-08-2014
	*/
function updatemenu(iAppTabId,iFeatureId){

	var vNamee = $("#vNamee"+iAppTabId).val();
	var language = $("#language").val();
	if(language == 'rEnglish')
	{
		if (vNamee=='') {		
			$("#editmenu_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$("#editmenu_validation"+iAppTabId).show();
			$("#vNamee"+iAppTabId).focus();
			return false;	
	    }else{
			$("#editmenu_validation"+iAppTabId).hide();
	    }
	}
	else if(language == 'rFrench'){
		if (vNamee=='') {		
			$("#editmenu_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
			$("#editmenu_validation"+iAppTabId).show();
			$("#vNamee"+iAppTabId).focus();
			return false;	
	    }else{
			$("#editmenu_validation"+iAppTabId).hide();
	    }
	}
	$("#updatefrmmenu_"+iAppTabId).ajaxSubmit(function(data) {
		   $("input:text").val("");		   		   
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }  
		   if(iMenuID){
                extra += '&iMenuID='+iMenuID;
           }  
           
            var pars = extra;    
            var url = base_url+"app/appwisemenulisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {

             if($('#menu_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#menu_listing'+iAppTabId).html(data);             
             }
            });   
    });   
}

/*
	Add Catalogue main item
*/
function add_main_item(iCatalogueMainId,iAppTabId,iApplicationId)
{
	var extra = '';
    if(iCatalogueMainId != ''){
        extra += '?iCatalogueMainId='+iCatalogueMainId;
    }

    if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }
    if(iApplicationId !=''){
        extra += '&iApplicationId='+iApplicationId;
    }
    
    var pars = extra;   
    var url = base_url+"app/showitemsubcataloguelisting";

    $.post(url+pars,
    function(data) {
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
    }); 
}


function add_item_list(iCatalogueSubId,iAppTabId,iApplicationId){
	var extra = '';
    if(iCatalogueSubId != ''){
        extra += '?iCatalogueSubId='+iCatalogueSubId;
    }

    if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }
    if(iApplicationId !=''){
        extra += '&iApplicationId='+iApplicationId;
    }
    
    var pars = extra;   
    var url = base_url+"app/showcatalogueproductlisting";

    $.post(url+pars,
    function(data) {
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
    }); 			
}

/*
	Add product list 
*/
function add_new_product(iCatalogueSubId,iApplicationId,iAppTabId)
{
		var extra = '';
	    if(iCatalogueSubId !=''){
	        extra += '?iCatalogueSubId='+iCatalogueSubId;
	    }
	    if(iApplicationId !=''){
	        extra += '&iApplicationId='+iApplicationId;
	    }
	    if(iAppTabId !=''){
	        extra += '&iAppTabId='+iAppTabId;
	    }
	    
	    var pars = extra;    
	    var url = base_url+"app/getproductform";
	    //console.log(url+pars);
	    //alert(url+pars);
	    $.post(url+pars,
	    function(data) {
	    	if(data.length<=0)
	    	{
	    		$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
				var link = document.getElementById("alertHref");
				link.setAttribute('onclick', "location.reload()");			
		 		var link1 = document.getElementById("close");
				link1.setAttribute('onclick', "location.reload()");			
				hide_loading();
	    		exit();
	    	}
	        $(document).ready(function () {				
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		    });
	  
	    });   
}

 /* Create by:- Maksud
	Description :- Add_item
	Date: 12-08-2014
	*/
function add_item(iMenuID,iAppTabId,iApplicationId){

	var extra = '';
    if(iMenuID !=''){
        extra += '?iMenuID='+iMenuID;
    }
    if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }
    if(iApplicationId !=''){
        extra += '&iApplicationId='+iApplicationId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showitemlisting";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}

/*
	Add item list
*/

	
	function add_new_sub_catalogue(iCatalogueMainId,iApplicationId,iAppTabId)
	{
		var extra = '';
	    if(iCatalogueMainId !=''){
	        extra += '?iCatalogueMainId='+iCatalogueMainId;
	    }
	    if(iApplicationId !=''){
	        extra += '&iApplicationId='+iApplicationId;
	    }
	    if(iAppTabId !=''){
	        extra += '&iAppTabId='+iAppTabId;
	    }
	    
	    var pars = extra;    
	    var url = base_url+"app/getcataloguesubitemform";
	    //console.log(url+pars);
	    //alert(url+pars);
	    $.post(url+pars,
	    function(data) {
	    	if(data.length<=0)
	    	{
	    		$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
				var link = document.getElementById("alertHref");
				link.setAttribute('onclick', "location.reload()");			
		 		var link1 = document.getElementById("close");
				link1.setAttribute('onclick', "location.reload()");			
				hide_loading();
	    		exit();
	    	}
	        $(document).ready(function () {				
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		    });
	  
	    }); 
	}


	/*
		Add catalogue new item
	*/
	function add_new_catalogue_item(iCatalogueId,iApplicationId,iAppTabId)
	{
		var extra = '';
	    if(iCatalogueId !=''){
	        extra += '?iCatalogueId='+iCatalogueId;
	    }
	    if(iApplicationId !=''){
	        extra += '&iApplicationId='+iApplicationId;
	    }
	    if(iAppTabId !=''){
	        extra += '&iAppTabId='+iAppTabId;
	    }
	    
	    var pars = extra;    
	    var url = base_url+"app/getcatalogueitemform";
	    //console.log(url+pars);
	    //alert(url+pars);
	    $.post(url+pars,
	    function(data) {
	    	if(data.length<=0)
	    	{
	    		$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
				var link = document.getElementById("alertHref");
				link.setAttribute('onclick', "location.reload()");			
		 		var link1 = document.getElementById("close");
				link1.setAttribute('onclick', "location.reload()");			
				hide_loading();
	    		exit();
	    	}
	        $(document).ready(function () {				
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		    });
	  
	    }); 
	}


 /* Create by:- Maksud
	Description :- addNew Item 
	Date: 12-08-2014
	*/
	function add_new_item(iMenuID,iApplicationId,iAppTabId)
	{
		var extra = '';
	    if(iMenuID !=''){
	        extra += '?iMenuID='+iMenuID;
	    }
	    if(iApplicationId !=''){
	        extra += '&iApplicationId='+iApplicationId;
	    }
	    if(iAppTabId !=''){
	        extra += '&iAppTabId='+iAppTabId;
	    }
	    
	    var pars = extra;    
	    var url = base_url+"app/getitemform";
	    //console.log(url+pars);
	    //alert(url+pars);
	    $.post(url+pars,
	    function(data) {
	    	if(data.length<=0)
	    	{
	    		$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
				var link = document.getElementById("alertHref");
				link.setAttribute('onclick', "location.reload()");			
		 		var link1 = document.getElementById("close");
				link1.setAttribute('onclick', "location.reload()");			
				hide_loading();
	    		exit();
	    	}
	        $(document).ready(function () {				
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		    });
	  
	    });   
	}

	/*
		Delete catalogue details
	*/
	function delete_sub_catalogue(iCatalogueSubId,iAppTabId,iCatalogueMainId)
	{
		var extra = '';
	    show_loading();
	    
	    if($('#iApplicationId')){
	        var iApplicationId = $('#iApplicationId').val();
	        extra += '?iApplicationId='+iApplicationId;
	    }
	    if(iCatalogueSubId !=''){
	        extra += '&iCatalogueSubId='+iCatalogueSubId;
	        
	    }
	    if(iAppTabId !=''){
	        extra += '&iAppTabId='+iAppTabId;
	        
	    }

	    /* 	delete sub catalogue */
	    var pars = extra;    
	    var url = base_url+"app/delete_catalogue_sub_details";
	    $.post(url+pars,
	    function(data) {
			   var extra = '';
	           extra += '?iApplicationId='+iApplicationId;
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iCatalogueMainId){
	                extra += '&iCatalogueMainId='+iCatalogueMainId;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showitemsubcataloguelisting";
	           // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	$(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            });   
	    	});   
	}

	/*
		update catalogue details
	*/
	function updatesubcatalogue(iCatalogueMainId,iCatalogueSubId,iAppTabId,iApplicationId)
	{
		var vCatalogueSubName = $('#vCatalogueSubName'+iAppTabId).val();
		
		if(vCatalogueSubName == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$('#editmenuitem_validation').show();
			$('#vCatalogueSubName').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}
		
		$("#frmsubcatalogue_item").ajaxSubmit(function(data) 
		{
			   $("input:text").val("");
	    	   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if(iApplicationId){
	                extra += '?iApplicationId='+iApplicationId;
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iCatalogueSubId){
	                extra += '&iCatalogueSubId='+iCatalogueSubId;
	           }
	           if(iCatalogueMainId){
	                extra += '&iCatalogueMainId='+iCatalogueMainId;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showitemsubcataloguelisting";
				$.post(url+pars,
	            function(data) {
	            	hide_loading();
		             $(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            });   
	    }); 
	}

	/*
		submit catalogue details
	*/
	function submitsubcatalogue(iCatalogueMainId,iAppTabId,iApplicationId)
	{
		var language = $('#language').val();
		var vCatalogueSubName = $('#vCatalogueSubName').val();
		var vImage = $('#vImage').val();

		if(language == 'rEnglish'){
			if(vCatalogueSubName == ''){
			$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$('#addmenuitem_validation').show();
			$('#vCatalogueSubName').focus();
			return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
		}else if(language == 'rFrench'){
			if(vCatalogueSubName == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
				$('#addmenuitem_validation').show();
				$('#vCatalogueSubName').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
		}
		
		/* frm sub catalogue item */
		$("#frmsubcatalogue_item").ajaxSubmit(function(data) {
			   $("input:text").val("");			   			   
	    	   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if(iApplicationId){	                
	                extra += '?iApplicationId='+iApplicationId;	                
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iCatalogueMainId){
	                extra += '&iCatalogueMainId='+iCatalogueMainId;
	           }             
	           
	           var pars = extra;    
	           var url = base_url+"app/showitemsubcataloguelisting";
	           // console.log(data);
	           $.post(url+pars,
	           function(data) {
            	hide_loading();
	            $(document).ready(function () {				
				   $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			    });
	           }); 
	            
	    });  
	}

	function submitcatalogueitem(iCatalogueSubId,iAppTabId,iApplicationId)
	{
		var language = $('#language').val();
		var vItemName = $('#vItemName').val();
		var vVarient = $('#vVarient').val();
		var tDescription = $('#tDescription').val();
		var vImage = $('#vImage').val();
		var fPrice = $('#fPrice').val();

		if(language == 'rEnglish'){
			if(vItemName == ''){
			$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$('#addmenuitem_validation').show();
			$('#vItemName').focus();
			return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(vVarient == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter variant.</div>');
				$('#addmenuitem_validation').show();
				$('#vVarient').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(tDescription == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
				$('#addmenuitem_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(vImage == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter image.</div>');
				$('#addmenuitem_validation').show();
				$('#vImage').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(fPrice == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter price.</div>');
				$('#addmenuitem_validation').show();
				$('#fPrice').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
		}else if(language == 'rFrench'){
			if(vItemName == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
				$('#addmenuitem_validation').show();
				$('#vItemName').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(vVarient == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Variante.</div>');
				$('#addmenuitem_validation').show();
				$('#vVarient').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(tDescription == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer description.</div>');
				$('#addmenuitem_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(vImage == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionnez une Image.</div>');
				$('#addmenuitem_validation').show();
				$('#vImage').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(fPrice == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Prix.</div>');
				$('#addmenuitem_validation').show();
				$('#fPrice').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
		}
		
		$("#frmitem_item").ajaxSubmit(function(data) {
			/*alert(data);*/
			   $("input:text").val("");			   			   
	    	   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if(iApplicationId){	                
	                extra += '?iApplicationId='+iApplicationId;	                
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iMenuID){
	                extra += '&iMenuID='+iMenuID;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showitemlisting";
	           // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	hide_loading();
		             $(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            }); 
	            
	    });
	}

	/*
		Submit product list of catalogue
	*/
	function submitproduct(iCatalogueSubId,iAppTabId,iApplicationId)
	{
		var language = $('#language').val();
		var vCatalogueTagname = $('#vCatalogueTagname').val();
		var tDescription = $('#tDescription').val();
		var tTotalProduct = $('#tTotalProduct').val();
		var vCurrency = $('#vCurrency').val();

		if(language == 'rEnglish'){
			if(vCatalogueTagname == ''){
			$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$('#addmenuitem_validation').show();
			$('#vCatalogueTagname').focus();
			return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(tDescription == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
				$('#addmenuitem_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			
			if(vCurrency == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter price.</div>');
				$('#addmenuitem_validation').show();
				$('#vCurrency').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
		}else if(language == 'rFrench'){
			if(vCatalogueTagname == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
				$('#addmenuitem_validation').show();
				$('#vCatalogueTagname').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(tDescription == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer description.</div>');
				$('#addmenuitem_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			
			if(vCurrency == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Prix.</div>');
				$('#addmenuitem_validation').show();
				$('#vCurrency').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
		}
		
		$("#frmproduct_product").ajaxSubmit(function(data) {
			/*alert(data);*/
			   $("input:text").val("");			   			   
	    	   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if(iApplicationId){	                
	                extra += '?iApplicationId='+iApplicationId;	                
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iCatalogueSubId){
	                extra += '&iCatalogueSubId='+iCatalogueSubId;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showcatalogueproductlisting";
	            // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	hide_loading();
		             $(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            }); 
	            
	    });
	}

	/* 
		Create by:- Maksud
		Description :- Submit Item
		Date: 12-08-2014
	*/
	function submititem(iMenuID,iAppTabId,iApplicationId)
	{
		var language = $('#language').val();
		var vItemName = $('#vItemName').val();
		var vVarient = $('#vVarient').val();
		var tDescription = $('#tDescription').val();
		var vImage = $('#vImage').val();
		var fPrice = $('#fPrice').val();
		var vSize = $('#vSizeName0').val();
		if(language == 'rEnglish'){
			if(vItemName == ''){
			$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$('#addmenuitem_validation').show();
			$('#vItemName').focus();
			return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(vVarient == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter variant.</div>');
				$('#addmenuitem_validation').show();
				$('#vVarient').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(tDescription == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
				$('#addmenuitem_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			/*if(vImage == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter image.</div>');
				$('#addmenuitem_validation').show();
				$('#vImage').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}*/
			if(fPrice == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter price.</div>');
				$('#addmenuitem_validation').show();
				$('#fPrice').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			
			if(vSize == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter size.</div>');
				$('#addmenuitem_validation').show();
				$('#fPrice').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			
		}else if(language == 'rFrench'){
			if(vItemName == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
				$('#addmenuitem_validation').show();
				$('#vItemName').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(vVarient == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Variante.</div>');
				$('#addmenuitem_validation').show();
				$('#vVarient').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			if(tDescription == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer description.</div>');
				$('#addmenuitem_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			/*if(vImage == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionnez une Image.</div>');
				$('#addmenuitem_validation').show();
				$('#vImage').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}*/
			if(fPrice == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Prix.</div>');
				$('#addmenuitem_validation').show();
				$('#fPrice').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			
			if(vSize == ''){
				$('#addmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Taille.</div>');
				$('#addmenuitem_validation').show();
				$('#fPrice').focus();
				return false;
			}else{
				$('#addmenuitem_validation').hide();
			}
			
		}
		
		$("#frmitem_item").ajaxSubmit(function(data) {
			/*alert(data);*/
			   $("input:text").val("");			   			   
	    	   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if(iApplicationId){	                
	                extra += '?iApplicationId='+iApplicationId;	                
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iMenuID){
	                extra += '&iMenuID='+iMenuID;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showitemlisting";
	           // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	hide_loading();
		             $(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            }); 
	    });   
	}

	/* Create by:- Maksud
	Description :-Delete Item
	Date: 12-08-2014
	*/
	function delete_list_item(iItemId,iAppTabId,iMenuID){

		var extra = '';
	    show_loading();
	    
	    if($('#iApplicationId')){
	        var iApplicationId = $('#iApplicationId').val();
	        extra += '?iApplicationId='+iApplicationId;
	    }
	    if(iItemId !=''){
	        extra += '&iItemId='+iItemId;
	        
	    }
	    if(iAppTabId !=''){
	        extra += '&iAppTabId='+iAppTabId;
	        
	    }
	    var pars = extra;    
	    var url = base_url+"app/item_delete";
	    $.post(url+pars,
	    function(data) {

			   var extra = '';
	           extra += '?iApplicationId='+iApplicationId;
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iMenuID){
	                extra += '&iMenuID='+iMenuID;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showitemlisting";
	           // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	$(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            });   

	    	/*alert(data);
	    	hide_loading();
			 $(document).ready(function () {				
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			 });*/		
				
	    	});   
	}

	/*
		delete product catalogue
	*/
	function delete_product_list_item(iCatalogueId,iAppTabId,iCatalogueSubId)
	{
		var extra = '';
	    show_loading();
	    
	    if($('#iApplicationId')){
	        var iApplicationId = $('#iApplicationId').val();
	        extra += '?iApplicationId='+iApplicationId;
	    }
	    if(iCatalogueId !=''){
	        extra += '&iCatalogueId='+iCatalogueId;
	        
	    }
	    if(iAppTabId !=''){
	        extra += '&iAppTabId='+iAppTabId;
	    }
	    var pars = extra;    
	    var url = base_url+"app/product_delete";
	    $.post(url+pars,
	    function(data) {

			   var extra = '';
	           extra += '?iApplicationId='+iApplicationId;
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iCatalogueSubId){
	                extra += '&iCatalogueSubId='+iCatalogueSubId;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showcatalogueproductlisting";
	           // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	$(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            });   
	    	}); 
	}

	/*
		Edit product list item
	*/
	function edit_product_list_item(iCatelogueId,iAppTabId)
	{
		var extra = '';
		if(iCatelogueId !=''){
			extra +='?iCatelogueId='+iCatelogueId;
		}

		var pars=extra;
		var url = base_url+"app/showeditcataloguepopup";
		$.post(url+pars,
			function(data){
				if(data.length<=0){
					$("#deletealert").modal('show');
		    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
					var link = document.getElementById("alertHref");
					link.setAttribute('onclick', "location.reload()");			
			 		var link1 = document.getElementById("close");
					link1.setAttribute('onclick', "location.reload()");			
					hide_loading();
		    		exit();
				}
				$(document).ready(function () {				
		    		$.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    		});
			});
	}


	/* Create by:- Maksud
	Description :-Edit Item
	Date: 13-08-2014
	*/
	function edit_list_item(iItemId,iAppTabId){

		var extra = '';
		if(iItemId !=''){
			extra +='?iItemId='+iItemId;
		}

		var pars=extra;
		var url = base_url+"app/showedititempopup";
		$.post(url+pars,
			function(data){
				if(data.length<=0){

					$("#deletealert").modal('show');
		    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
					var link = document.getElementById("alertHref");
					link.setAttribute('onclick', "location.reload()");			
			 		var link1 = document.getElementById("close");
					link1.setAttribute('onclick', "location.reload()");			
					hide_loading();
		    		exit();
				}
				$(document).ready(function () {				
		    		$.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    		});
			});
	}

	function updateitem(iMenuID,iAppTabId,iApplicationId)
	{
		var vItemName = $('#vItemName').val();
		var vVarient = $('#vVarient').val();
		var tDescription = $('#tDescription').val();
		var vImage = $('#vImage').val();
		var fPrice = $('#fPrice').val();
		if(vItemName == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$('#editmenuitem_validation').show();
			$('#vItemName').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}
		if(vVarient == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter variant.</div>');
			$('#editmenuitem_validation').show();
			$('#vVarient').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}
		if(tDescription == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
			$('#editmenuitem_validation').show();
			$('#tDescription').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}
		if(vImage == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter image.</div>');
			$('#editmenuitem_validation').show();
			$('#vImage').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}
		if(fPrice == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter price.</div>');
			$('#editmenuitem_validation').show();
			$('#fPrice').focus();
			return false;
		}else{
			$('#addmenuitem_validation').hide();
		}

		$("#updatefrmitem").ajaxSubmit(function(data) {
			/*alert(data);*/
			   $("input:text").val("");
			   
			   	
	    	   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if(iApplicationId){
	                
	                extra += '?iApplicationId='+iApplicationId;
	                
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iMenuID){
	                extra += '&iMenuID='+iMenuID;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showitemlisting";
	           // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	hide_loading();
		             $(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            });   
	    });  
	}
	

	/* 	Create by:- Maksud
	Description :- socialmedia validation
	Date: 2-08-2014
*/
	function submitsocialmedia(iAppTabId,iFeatureId)
	{

		var vName = $("#vName"+iAppTabId).val();
		var vUrl = $("#vUrl"+iAppTabId).val();
	 	if (vName=='') {		
			$("#addsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$("#addsocial_validation"+iAppTabId).show();
			$("#vName"+iAppTabId).focus();
			return false;
		
	    }else{
			$("#addsocial_validation"+iAppTabId).hide();
	    }

	    if (vUrl=='') {		
			$("#addsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter url.</div>');
			$("#addsocial_validation"+iAppTabId).show();
			$("#vUrl"+iAppTabId).focus();
			return false;		
	    }else{
			$("#addsocial_validation"+iAppTabId).hide();
	    }
	    
	    if (!is_valid_url(vUrl)) {		
			$("#addsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid  url.</div>');
			$("#addsocial_validation"+iAppTabId).show();
			$("#vUrl"+iAppTabId).focus();
			return false;		
	    }else{
			$("#addsocial_validation"+iAppTabId).hide();    
	    }

	    if (vUrl !='') 
	    {
	    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
			if(!pattern.test(vUrl)) {
				$("#addsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid  url.</div>');
				$("#addsocial_validation"+iAppTabId).show();
				$("#vUrl"+iAppTabId).focus();
				return false;
	  		}else{
				$("#addsocial_validation"+iAppTabId).hide();
			}
	    }
    
 	$('#frmsocial_'+iAppTabId).ajaxSubmit(function(data) {
		   $("input:text").val("");		   
		   	
    	   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if($('#iApplicationId')){
	                var iApplicationId = $('#iApplicationId').val();
	                extra += '?iApplicationId='+iApplicationId;
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iFeatureId){
	                extra += '&iFeatureId='+iFeatureId;
	           }             
           
	           var pars = extra;    
	           var url = base_url+"app/appwisesociallisting";
	            // console.log(data);
	           $.post(url+pars,
	           function(data) {

	             if($('#social_listing'+iAppTabId)){
	                $('#loading').delay(100).trigger('reveal:close');   
	                $('#social_listing'+iAppTabId).html(data);             
	             }
	           });   
    });   
  }


  function delete_social(iSocialMediaID,iAppTabId,iFeatureId){

	var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iSocialMediaID !=''){
        extra += '&iSocialMediaID='+iSocialMediaID;
        
    }
    if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
     }
    var pars = extra;    
    var url = base_url+"app/social_delete";
    $.post(url+pars,
    function(data) {
     if($('#social_listing'+iAppTabId)){
         hide_loading();   
        $('#social_listing'+iAppTabId).html(data);
             
     }
    });   
}
function edit_social(iSocialMediaID,iFeatureId){
	
    var extra = '';
    if(iSocialMediaID !=''){
        extra += '?iSocialMediaID='+iSocialMediaID;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditsocialpopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
        //Made Changes By Sagar On Date : 7-6-2014
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
    	//End Sagar Code 
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}
function updatesocial(iAppTabId,iFeatureId){

	var vNamee = $("#vNamee"+iAppTabId).val();
	var vUrle = $("#vUrle"+iAppTabId).val();
	if (vNamee=='') {		
		$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
		$("#editsocial_validation"+iAppTabId).show();
		$("#vNamee"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editsocial_validation"+iAppTabId).hide();
    }

    /*if (vUrle=='') {		
		$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter url.</div>');
		$("#editsocial_validation"+iAppTabId).show();
		$("#vUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editsocial_validation"+iAppTabId).hide();
    }
    if (!is_valid_url(vUrle)) {		
		$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid  url.</div>');
		$("#editsocial_validation"+iAppTabId).show();
		$("#vUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editsocial_validation"+iAppTabId).hide();
    }
    if (vUrle !='') {
    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
		if(!pattern.test(vUrle)) {
			$("#editsocial_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid  url.</div>');
				$("#editsocial_validation"+iAppTabId).show();
				$("#vUrle"+iAppTabId).focus();
				return false;
  		}else{
			$("#editsocial_validation"+iAppTabId).hide();
		}
    }*/
    

	    $('#updatefrmsocial_'+iAppTabId).ajaxSubmit(function(data) {
	
	    	   $.fancybox.close();
		   var extra = '';
		   show_loading();
		   if($('#iApplicationId')){
		        var iApplicationId = $('#iApplicationId').val();
		        extra += '?iApplicationId='+iApplicationId;
		        
		   }
		   if(iAppTabId){
		        extra += '&iAppTabId='+iAppTabId;
		   }
		   if(iFeatureId){
		        extra += '&iFeatureId='+iFeatureId;
		   }             
		    var pars = extra;    
		    var url = base_url+"app/appwisesociallisting";
		   // console.log(data);
		    $.post(url+pars,
		    function(data) {
		     //if($('#website_listing')){
			$('#loading').delay(100).trigger('reveal:close');   
		        $('#social_listing'+iAppTabId).html(data);             
		    // }
		    });   
	    });   
	  } 

	/** submit catalogue details **/
	function submitcataloguedetails(iAppTabId,iFeatureId)
	{
		var language = $("#language").val();
		var vCatalogueTagname = $("#vCatalogueTagname"+iAppTabId).val();
		var iCatalogueType = $("#iCatalogueType"+iAppTabId).val();
		var vCatalogueImage = $("#vCatalogueImage"+iAppTabId).val();
		var tDescription = $('#tDescription'+iAppTabId).val();	
		var tTotalProduct = $('#tTotalProduct'+iAppTabId).val();	
		var vCurrency = $('#vCurrency'+iAppTabId).val();	
		
	     // var a = vCatalogueImage.substring(vCatalogueImage.lastIndexOf('.') + 1).toLowerCase();
	    if(language == 'rEnglish')
		{
			if (vCatalogueTagname=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Tabname.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#vCatalogueTagname"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (iCatalogueType== '0') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website url.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#iCatalogueType"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (vCatalogueImage=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select catalogue image.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#vCatalogueImage"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (tTotalProduct=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Product details.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#tTotalProduct"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (vCurrency=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select currency.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#vCurrency"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}
		}else if(language == 'rFrench'){
			if (vCatalogueTagname=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît entrez le nom Tab.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#vCatalogueTagname"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (iCatalogueType== '0') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>URL Site Web.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#iCatalogueType"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (vCatalogueImage=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionnez une image du catalogue.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#vCatalogueImage"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (tTotalProduct=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Saissisez les détails du produit.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#tTotalProduct"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}

			if (vCurrency=='') {		
				$("#addcatalogue_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Choisir la devise.</div>');
				$("#addcatalogue_validation"+iAppTabId).show();
				$("#vCurrency"+iAppTabId).focus();
				return false;
			}else{
				$("#addcatalogue_validation"+iAppTabId).hide();
			}
		}
			   
		/*if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG' || a == '' )
		{}else{
			$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
			$("#addwebsite_validation"+iAppTabId).show();
			$("#vWebImage").val('');
			$("#vWebImage").focus();
			return false;
		}*/
    
		$('#frmcatalogue_'+iAppTabId).ajaxSubmit(function(data) {
		   $.fancybox.close();
		   $('#iCatalogueType'+iAppTabId).val('');
		   $('#vCatalogueName'+iAppTabId).val('');
		   $('#vImage'+iAppTabId).val('');
		   	document.getElementById('vImage').src = "";

		   var extra = '';
		   show_loading();
		   if($('#iApplicationId')){
			var iApplicationId = $('#iApplicationId').val();
			extra += '?iApplicationId='+iApplicationId;
		   }
		   if(iAppTabId){
			extra += '&iAppTabId='+iAppTabId;
		   }
		   if(iFeatureId){
			extra += '&iFeatureId='+iFeatureId;
		   }             
		   
		    var pars = extra;    
		    var url = base_url+"app/appwisecataloguelisting";
		    // console.log(data);
		    $.post(url+pars,
		    function(data) {
		     if($('#catalogue_listing'+iAppTabId)){
				$('#loading').delay(100).trigger('reveal:close');   
				$('#catalogue_listing'+iAppTabId).html(data);
				closeResetPopup('frmcatalogue_'+iAppTabId, 'vImage');
		     }
		    });   
		});   
	}  


	function submitarrivaldetails(iAppTabId,iFeatureId)
	{
		var vArrivalType = $('#vArrivalType'+iAppTabId).val();
		var vArrivalName = $('#vArrivalName'+iAppTabId).val();
		var vArrivalOffer = $('#vArrivalOffer'+iAppTabId).val();
		var vArrivalImage = $('#vArrivalImage'+iAppTabId).val();
		var language = $('#language').val();

		if(language == 'rEnglish'){
			if(vArrivalType == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Arrival Type.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalType"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}

			if(vArrivalName == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter arrival name.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalName"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}

			if(vArrivalOffer == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Arrival Offers.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalOffer"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}	

			if(vArrivalImage == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Arrival Image.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalImage"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}	
		}else if(language == 'rFrench'){
			if(vArrivalType == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez Type nouveau Produit.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalType"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}

			if(vArrivalName == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez le nom du nouveau Produit.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalName"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}

			if(vArrivalOffer == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Offres  du nouveau Produit.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalOffer"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}	

			if(vArrivalImage == ''){
				$("#addarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionnez  image  du nouveau Produit.</div>');
				$("#addarrival_validation"+iAppTabId).show();
				$("#vArrivalImage"+iAppTabId).focus();
				return false;
			}else{
				$("#addarrival_validation"+iAppTabId).hide();
			}
		}

		$('#frmarrival_'+iAppTabId).ajaxSubmit(function(data) {
			   $.fancybox.close();

			   var extra = '';
			   show_loading();

			    if($('#iApplicationId')){
					var iApplicationId = $('#iApplicationId').val();
					extra += '?iApplicationId='+iApplicationId;
			    }
			   
			    if(iAppTabId){
					extra += '&iAppTabId='+iAppTabId;
			    }
			    if(iFeatureId){
					extra += '&iFeatureId='+iFeatureId;
			   }             
		   
		    	var pars = extra;    
		    	var url = base_url+"app/appwisearrivallisting";
		    	/* post method */
		    	$.post(url+pars,
			    function(data) {
				    if($('#arrival_listing'+iAppTabId)){
						$('#loading').delay(100).trigger('reveal:close');   
						$('#arrival_listing'+iAppTabId).html(data);             
			     	}
			     	closeResetPopup('frmarrival_'+iAppTabId, 'vArrivalImage');
			    });   
		});   
} 

function updatearrivaldetails(iAppTabId,iFeatureId)
{
	var vArrivalType = $( "#vArrivalType_edit"+iAppTabId).val();
	var vArrivalName = $("#vArrivalName_edit"+iAppTabId).val();
	var vArrivalOffer = $("#vArrivalOffer_edit"+iAppTabId).val();
	var vArrivalImage = $("#vArrivalImage_edit"+iAppTabId).val();
	var language = $('#language').val();

	if(language == 'rEnglish'){
		if(vArrivalType == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Arrival Type.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalType"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}

		if(vArrivalName == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Arrival Name.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalName"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}

		if(vArrivalOffer == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Arrival Offer.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalOffer"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}

		if(vArrivalImage == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Arrival Image.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalImage"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}
	}else if(language == 'rFrench'){
		if(vArrivalType == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez Type nouveau Produit.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalType"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}

		if(vArrivalName == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez le nom du nouveau Produit.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalName"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}

		if(vArrivalOffer == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Offres  du nouveau Produit.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalOffer"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}

		if(vArrivalImage == ''){
			$("#editarrival_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionnez  image  du nouveau Produit.</div>');
			$("#editarrival_validation"+iAppTabId).show();
			$("#vArrivalImage"+iAppTabId).focus();
			return false;	
		}else{
			$("#editarrival_validation"+iAppTabId).hide();
		}
	}

	$('#frmeditarrival_'+iAppTabId).ajaxSubmit(function(data) {
		   $.fancybox.close();
		   var extra = '';
		   show_loading();
		   if($('#iApplicationId')){
			var iApplicationId = $('#iApplicationId').val();
			extra += '?iApplicationId='+iApplicationId;
		
		   }
		   if(iAppTabId){
			extra += '&iAppTabId='+iAppTabId;
		   }
		   if(iFeatureId){
			extra += '&iFeatureId='+iFeatureId;
		   }             
		   
		    var pars = extra;    
		    var url = base_url+"app/appwisearrivallisting";
		   // console.log(data);
		    $.post(url+pars,
		    function(data) {
		     if($('#arrival_listing'+iAppTabId)){
			$('#loading').delay(100).trigger('reveal:close');   
			$('#arrival_listing'+iAppTabId).html(data);             
		     }
		    });   
		});   
}

function submitwebsite(iAppTabId,iFeatureId){

	var vWebTitle = $("#vWebTitle"+iAppTabId).val();
	var vWebUrl = $("#vWebUrl"+iAppTabId).val();
	var vimageurl = $("#vWebImage").val();
	var language = $('#language').val();
	var a = vimageurl.substring(vimageurl.lastIndexOf('.') + 1).toLowerCase();

if(language == 'rEnglish'){
 	if (vWebTitle=='') {		
		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website title.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebTitle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addwebsite_validation"+iAppTabId).hide();
    }

    if (vWebUrl=='') {		
		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website url.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebUrl"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addwebsite_validation"+iAppTabId).hide();
    }
    

    if (!is_valid_url(vWebUrl)) {		
		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebUrl"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addwebsite_validation"+iAppTabId).hide();
    }
    if (vWebUrl !='') {
    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
		if(!pattern.test(vWebUrl)) {
			$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
			$("#addwebsite_validation"+iAppTabId).show();
			$("#vWebUrl"+iAppTabId).focus();
			return false;
  		}else{
			$("#addwebsite_validation"+iAppTabId).hide();
		}
    }
    if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG' || a == '' ){}else{
 		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebImage").val('');
		$("#vWebImage").focus();
		return false;
 	}
}else if(language == 'rFrench'){
if (vWebTitle=='') {		
		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Titre Site Web.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebTitle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addwebsite_validation"+iAppTabId).hide();
    }

    if (vWebUrl=='') {		
		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>URL Site Web.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebUrl"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addwebsite_validation"+iAppTabId).hide();
    }
    

    if (!is_valid_url(vWebUrl)) {		
		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebUrl"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addwebsite_validation"+iAppTabId).hide();
    }
    if (vWebUrl !='') {
    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
		if(!pattern.test(vWebUrl)) {
			$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide..</div>');
			$("#addwebsite_validation"+iAppTabId).show();
			$("#vWebUrl"+iAppTabId).focus();
			return false;
  		}else{
			$("#addwebsite_validation"+iAppTabId).hide();
		}
    }
    if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG' || a == '' ){}else{
 		$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Sélectionner image ( gif, jpg , jpeg ) fichiers.</div>');
		$("#addwebsite_validation"+iAppTabId).show();
		$("#vWebImage").val('');
		$("#vWebImage").focus();
		return false;
 	}
}
    
    $('#frmwebsite_'+iAppTabId).ajaxSubmit(function(data) {
		   $("input:text").val("");
		   $("input:checkbox").prop('checked', false);
		   $("input:file").val("");
		   	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
           
            var pars = extra;    
            var url = base_url+"app/appwisewebsitelisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {

             if($('#website_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#website_listing'+iAppTabId).html(data);             
             }
            });   
    });   
  } 
// function CheckValidWebsiteImg(val,name)
// { 
//  var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
//  if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG'  )
//  return true;
//  alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
//  document.getElementById(name).value = "";
//  return false; 
// }

function delete_website(iWebsiteId,iAppTabId){
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
     if($('#website_listing'+iAppTabId)){
         hide_loading();   
        $('#website_listing'+iAppTabId).html(data);
             
     }
    });   
}

function edit_ticket(iTicketId,iFeatureId){

    var extra = '';
    if(iTicketId !=''){
        extra += '?iTicketId='+iTicketId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditticketpopup";
    $.post(url+pars,
    function(data) {
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
	}

        $(document).ready(function () {				
	     $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
    	});
	$('.eventd').datepicker({
                     format: "yyyy-mm-dd",
              startDate: "0d",
              autoclose: true,
              orientation: "top left",
              todayHighlight: true,
              language: "fr"	

        });
        $('.eventtime').timepicker({showMeridian: false});
    });  
}

function edit_website(iWebsiteId,iFeatureId)
{
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
        //Made Changes By Sagar On Date : 7-6-2014
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    	}
    	//End Sagar Code 
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}

function updatewebsite(iAppTabId,iFeatureId)
{
	var vWebTitle = $("#vWebTitlee"+iAppTabId).val();
	var vWebUrl = $("#vWebUrle"+iAppTabId).val();
	var vwebimage = $("#vWebImagee"+iAppTabId).val();
	var a = vwebimage.substring(vwebimage.lastIndexOf('.') + 1).toLowerCase();
    if (vWebTitle=='') {		
		$("#editwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website title.</div>');
		$("#editwebsite_validation"+iAppTabId).show();
		$("#vWebTitlee"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editwebsite_validation"+iAppTabId).hide();
    }

    if (vWebUrl=='') {		
		$("#editwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website url.</div>');
		$("#editwebsite_validation"+iAppTabId).show();
		$("#vWebUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editwebsite_validation"+iAppTabId).hide();
    }
    if (!is_valid_url(vWebUrl)) {		
		$("#editwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
		$("#editwebsite_validation"+iAppTabId).show();
		$("#vWebUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editwebsite_validation"+iAppTabId).hide();
    }
    if (vWebUrl !='') {
    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
		if(!pattern.test(vWebUrl)) {
			$("#editwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
				$("#editwebsite_validation"+iAppTabId).show();
				$("#vWebUrle"+iAppTabId).focus();
				return false;
  		}else{
			$("#editwebsite_validation"+iAppTabId).hide();
		}
    }
    if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG' || a == '' ){ }else{
 		$("#editwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
		$("#editwebsite_validation"+iAppTabId).show();
		$("#vWebImagee"+iAppTabId).val('');
		$("#vWebImagee"+iAppTabId).focus();
		return false;
 	}

    $('#updatefrmwebsite_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
            var pars = extra;    
            var url = base_url+"app/appwisewebsitelisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {
             //if($('#website_listing')){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#website_listing'+iAppTabId).html(data);             
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
	
	/** delete home file **/
	function deletehomefile(iHomeId,lang)
	{
		var language = document.getElementById('language').value;
		var pars = '?iHomeId='+iHomeId;  
		var url = base_url+"app/deletehomefile";
		 $.post(url+pars,
		  function(data) {
			if(data.trim()=='delete'){
				if(language == 'rEnglish'){
					alert("Image has been deleted");	
				}else if(language == 'rFrench'){
					alert("Image Supprimer");	
				}
				
				$("#blah").hide();
				$("#blah").val('');
				window.location.reload();
			}
		  }
		);
	}

function voicerecordtab_validation(iAppTabId){
	var vVoiceEmailin = $("#vVoiceEmailin"+iAppTabId).val();
	var vVoiceSubjectin = $("#vVoiceSubjectin"+iAppTabId).val();
	var tVoiceDescription = $("#tVoiceDescription"+iAppTabId).val();
    if (vVoiceEmailin=='') {		
		$("#voicerecord_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email.</div>');
		$("#voicerecord_validation"+iAppTabId).show();
		$("#vVoiceEmailin"+iAppTabId).focus();
		return false;
	
    }else{
		$("#voicerecord_validation"+iAppTabId).hide();
    }
	if (vVoiceEmailin!='' ) {						
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var isvalid = emailRegexStr.test(vVoiceEmailin);		
    if (tVoiceDescription=='') {		
		$("#voicerecord_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
		$("#voicerecord_validation"+iAppTabId).show();
		$("#tVoiceDescription"+iAppTabId).focus();
		return false;
	
    }else{
		$("#voicerecord_validation"+iAppTabId).hide();
    }
	if (!isvalid) {				
			$("#voicerecord_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address.</div>');
			$("#voicerecord_validation"+iAppTabId).show();
			$("#vVoiceEmailin"+iAppTabId).focus();
			return false;
		}				
	}else{
		$("#voicerecord_validation"+iAppTabId).hide();
	}      	

    if (vVoiceSubjectin=='') {		
		$("#voicerecord_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter subject.</div>');
		$("#voicerecord_validation"+iAppTabId).show();
		$("#vVoiceSubjectin"+iAppTabId).focus();
		return false;
	
    }else{
		$("#voicerecord_validation"+iAppTabId).hide();
    }	


    $("#frmvoicerecordtab_"+iAppTabId).submit();    
}
function deletpodcastimage(iPodcastId){
		//alert(iRSSId);
	var pars = '?iPodcastId='+iPodcastId;  
	var url = base_url+"app/deletepodcastIcon";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#podcastimagediv").hide();
			//$("#vOldImage").val('');
		}
	  }
	);
}
function podcast_validation(iAppTabId){
	var vPodcastIcone = $('#vPodcastIcone'+iAppTabId).val();
	var af = vPodcastIcone.substring(vPodcastIcone.lastIndexOf('.') + 1).toLowerCase();

	var vPodcastRssUrle = $("#vPodcastRssUrle"+iAppTabId).val();

    if (vPodcastRssUrle=='') {		
		$("#podcast_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter url.</div>');
		$("#podcast_validation"+iAppTabId).show();
		$("#vPodcastRssUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#podcast_validation"+iAppTabId).hide();
    }

    if (!is_valid_url(vPodcastRssUrle)) {		
		$("#podcast_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid url.</div>');
		$("#podcast_validation"+iAppTabId).show();
		$("#vPodcastRssUrle"+iAppTabId).focus();
		return false;
	
    }else{
		$("#podcast_validation"+iAppTabId).hide();
    }

    if(vPodcastIcone=='')
   	{
   		$("#podcast_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Icon.</div>');
		$("#podcast_validation"+iAppTabId).show();
		$("#vPodcastIcone"+iAppTabId).focus();
		return false;
   	}
   	else
   	{
   		$("#podcast_validation"+iAppTabId).hide();
   	}
   	if(af == 'gif' || af == 'GIF' || af == 'jpg'  ||af == 'JPG' ||af == 'jpeg' ||af == 'JPEG'||af == 'png' ||af == 'PNG' || af == '' ){}else{
 		$("#podcast_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg)  files.</div>');
		$("#podcast_validation"+iAppTabId).show();
		$("#vPodcastIcone").val('');
		$("#vPodcastIcone").focus();
		return false;
 	}

	$("#frmpodcast_"+iAppTabId).submit();
}

function is_valid_url(url)
{
     return url.match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/);
}
function open_mailchamp(iAppTabId){
	
}


function chng_color_theme(val)
{

	var aquatic_blue = {'ghbc':'rgb(23, 145, 133)','ghc':'rgb(232, 225, 218)','ghts':'rgb(0, 0, 0)','sbbc':'rgb(83, 115, 106)','sbc':'rgb(0, 0, 0)','odrbc':'rgb(250, 253, 255)','odrc':'rgb(0, 0, 0)','evrbc':'rgb(51, 190, 214)','evrc':'rgb(0, 0, 0)'};
	var beach_blue = {'ghbc':'rgb(37, 176, 2)','ghc':'rgb(0, 0, 0)','ghts':'rgb(255, 255, 255)','sbbc':'rgb(105, 255, 115)','sbc':'rgb(0, 0, 0)','odrbc':'rgb(255, 255, 255)','odrc':'rgb(0, 0, 0)','evrbc':'rgb(218, 255, 209)','evrc':'rgb(0, 0, 0)'};
	var bear_brown = {'ghbc':'rgb(110, 63, 46)','ghc':'rgb(255, 252, 252)','ghts':'rgb(15, 15, 15)','sbbc':'rgb(77, 35, 11)','sbc':'rgb(255, 255, 255)','odrbc':'rgb(255, 241, 230)','odrc':'rgb(0, 0, 0)','evrbc':'rgb(217, 184, 126)','evrc':'rgb(0, 0, 0)'};
	var carrot_orange = {'ghbc':'rgb(255, 170, 0)','ghc':'rgb(0, 0, 0)','ghts':'rgb(252, 128, 20)','sbbc':'rgb(255, 146, 51)','sbc':'rgb(0, 0, 0)','odrbc':'rgb(255, 234, 130)','odrc':'rgb(66, 0, 0)','evrbc':'rgb(255, 152, 74)','evrc':'rgb(0, 0, 0)'};
	var dark_rose = {'ghbc':'rgb(107, 0, 0)','ghc':'rgb(255, 255, 255)','ghts':'rgb(64, 44, 40)','sbbc':'rgb(94, 79, 79)','sbc':'rgb(255, 255, 255)','odrbc':'rgb(92, 23, 32)','odrc':'rgb(255, 255, 255)','evrbc':'rgb(130, 87, 82)','evrc':'rgb(255, 255, 255)'};
	var dazzling_red = {'ghbc':'rgb(176, 33, 11)','ghc':'rgb(0, 0, 0)','ghts':'rgb(255, 255, 255)','sbbc':'rgb(255, 214, 196)','sbc':'rgb(0, 0, 0)','odrbc':'rgb(255, 255, 255)','odrc':'rgb(0, 0, 0)','evrbc':'rgb(255, 239, 230)','evrc':'rgb(0, 0, 0)'};
	var forest_green = {'ghbc':'rgb(58, 115, 7)','ghc':'rgb(0, 0, 0)','ghts':'rgb(252, 252, 252)','sbbc':'rgb(7, 181, 13)','sbc':'rgb(0, 0, 0)','odrbc':'rgb(47, 255, 15)','odrc':'rgb(66, 0, 0)','evrbc':'rgb(117, 255, 102)','evrc':'rgb(0, 0, 0)'};
	var generic_grey = {'ghbc':'rgb(0, 0, 0)','ghc':'rgb(232, 225, 218)','ghts':'rgb(15, 15, 15)','sbbc':'rgb(115, 115, 115)','sbc':'rgb(0, 0, 0)','odrbc':'rgb(250, 253, 255)','odrc':'rgb(66, 0, 0)','evrbc':'rgb(247, 247, 247)','evrc':'rgb(0, 0, 0)'};
	var theme_arr = {0:aquatic_blue,1:beach_blue,2:bear_brown,3:carrot_orange,4:dark_rose,5:dazzling_red,6:forest_green,7:generic_grey};


		//globalheader stuff
		$("#global_preview_header_overlay").css('background', theme_arr[val]['ghbc']);
		$("#colorImage_menu").css('color',theme_arr[val]['ghc']); 
		$("#colorImage_menu").css('text-shadow','1px 1px 0px '+theme_arr[val]['ghts']);

		//Section Bar Stuff
		$("#page_title").css('background', theme_arr[val]['sbbc']);
		$("#page_title").css('color', theme_arr[val]['sbc']);

		//row color setting
		$(".odrow").css('background', theme_arr[val]['odrbc']);
		$(".odrow").css('color', theme_arr[val]['odrc']);
		$(".evnrow").css('background', theme_arr[val]['evrbc']);
		$(".evnrow").css('color', theme_arr[val]['evrc']);

		//bar and text color setting
		$("#navigation_bar").colorpicker('setValue', theme_arr[val]['ghbc']);
		$("#navigation_text").colorpicker('setValue', theme_arr[val]['ghc']);
		$("#navigation_textshadow").colorpicker('setValue', theme_arr[val]['ghts']);
		$("#section_bars").colorpicker('setValue', theme_arr[val]['sbbc']);
		$("#section_text").colorpicker('setValue', theme_arr[val]['sbc']);
		$("#oddRow_bar").colorpicker('setValue', theme_arr[val]['odrbc']);
		$("#oddRow_text").colorpicker('setValue', theme_arr[val]['odrc']);
		$("#evenrow_bar").colorpicker('setValue', theme_arr[val]['evrbc']);
		$("#evenrow_text").colorpicker('setValue', theme_arr[val]['evrc']);
		$("#featurecolors_buttontext").colorpicker('setValue', 'rgb(0,0,0)');
		$("#featurecolors_buttonimage").colorpicker('setValue', 'rgb(255,255,255)');
		$("#feature_text").colorpicker('setValue', 'rgb(0,0,0)');
		$("#other_background").colorpicker('setValue', 'rgb(255,255,255)');
		$("#navigation_bar,#navigation_text,#navigation_textshadow,#section_bars,#section_text,#oddRow_bar,#oddRow_text,#evenrow_bar,#evenrow_text,#featurecolors_buttontext,#featurecolors_buttonimage,#feature_text,#other_background").focus();
		$(".colorpicker").hide();

}

function submitmailcategoryinfo(iAppTabId){
	var vName = $("#vName"+iAppTabId).val();
	var iFeatureId = $("#iFeatureId").val();
	//console.log(iFeatureId);return false;
    if (vName=='') {		
		$("#addmailingcat_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter category name.</div>');
		$("#addmailingcat_validation"+iAppTabId).show();
		$("#vName"+iAppTabId).focus();
		return false;
	
    }else{
		$("#addmailingcat_validation"+iAppTabId).hide();
    }


    $('#addfrmmailingcategory_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
            var extra = '';
            show_loading();
            if($('#iApplicationId')){
                 var iApplicationId = $('#iApplicationId').val();
                 extra += '?iApplicationId='+iApplicationId;
            }
            if(iAppTabId){
                 extra += '&iAppTabId='+iAppTabId;
            }
            if(iFeatureId){
                 extra += '&iFeatureId='+iFeatureId;
            }             
             var pars = extra;    
             //console.log(pars);
             var url = base_url+"app/getallmailingcategoryhtml";
             $.post(url+pars,
             function(data) {
                 $('#loading').delay(100).trigger('reveal:close');   
                 $('#mailcat_listing'+iAppTabId).html(data);
                 $.fancybox.open('#mailcat_listing'+iAppTabId);             
             });   
    }); 
    $("input:text").val("");

}



function edit_mailingcat(iMailcategoryId,iFeatureId){
    var extra = '';
    if(iMailcategoryId !=''){
        extra += '?iMailcategoryId='+iMailcategoryId ;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditmailcatpopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
    	//Made Changes By Sagar On Date : 7-6-2014
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deletealert").zIndex(99999);
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    		exit();
    	}
    	//End Sagar Code
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
  
    });   
}

function updatemailcategoryinfo(iAppTabId){
	var vName = $("#vNamee"+iAppTabId).val();
	var iMailcategoryId = $("#iMailcategoryId").val();
	var iFeatureId = $("#iFeatureId").val();
	//console.log(iFeatureId);
    if (vName=='') {		
		$("#editmailingcat_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter category name.</div>');
		$("#editmailingcat_validation"+iAppTabId).show();
		$("#vNamee"+iAppTabId).focus();
		return false;
	
    }else{
		$("#editmailingcat_validation"+iAppTabId).hide();
    }


    $('#editfrmmailingcategory_'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
            var extra = '';
            show_loading();
            if($('#iApplicationId')){
                 var iApplicationId = $('#iApplicationId').val();
                 extra += '?iApplicationId='+iApplicationId;
            }
            if(iAppTabId){
                 extra += '&iAppTabId='+iAppTabId;
            }
            if(iFeatureId){
                 extra += '&iFeatureId='+iFeatureId;
            }             
           
             var pars = extra;    
             console.log(pars);
             var url = base_url+"app/getallmailingcategoryhtml";
             $.post(url+pars,
             function(data) {
                 $('#loading').delay(100).trigger('reveal:close');   
                 $('#mailcat_listing'+iAppTabId).html(data);
                 $.fancybox.open('#mailcat_listing'+iAppTabId);             
             });   
    }); 

}

function delete_mailingcat(iMailcategoryId,iAppTabId,iFeatureId){

    var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iMailcategoryId !=''){
        extra += '&iMailcategoryId='+iMailcategoryId;
        
    }
    if(iAppTabId){
         extra += '&iAppTabId='+iAppTabId;
    }
    if(iFeatureId){
         extra += '&iFeatureId='+iFeatureId;
    }             
    
    var pars = extra;    
    var url = base_url+"app/mailingcategory_delete";
    $.post(url+pars,
    function(data) {
     if($('#mailcat_listing'+iAppTabId)){
         hide_loading();   
        $('#mailcat_listing'+iAppTabId).html(data);             
     }
    });   
}

function feepayment_validation(iAppTabId){
	var checkcount = $("#feetype input:checkbox:checked").length
    if (checkcount == 0) {		
		$("#addfeepayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select atleast one fee type.</div>');
		$("#addfeepayment_validation"+iAppTabId).show();
		return false;
	
    }else{
		$("#addfeepayment_validation"+iAppTabId).hide();
    }


    $("#frmfeepayment_"+iAppTabId).submit();


}

function publish_payment(){
	var vCreditCardType = $("#vCreditCardType").val();
	var vCardholdername = $("#vCardholdername").val();
	var vCardnumber = $("#vCardnumber").val();
	var vMonth = $("#vMonth").val();
	var vYear = $("#vYear").val();
	var vCvv = $("#vCvv").val();

	var msg = "{/literal}$GLOBALS['Configration_value']['PAYMENT_SUCCESS_MSG']{literal}";
	//alert(msg);
    if (vCreditCardType == '') {		
		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select CreditCardType.</div>');
		$("#payment_info_err").show();
		$("#vCreditCardType").focus();
		return false;
	
    }else{
		$("#payment_info_err").hide();
    }

    if (vCardholdername == '') {		
		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Card holder name.</div>');
		$("#payment_info_err").show();
		$("#vCardholdername").focus();
		return false;
	
    }else{
		$("#payment_info_err").hide();
    }

    if (vCardnumber == '') {		
		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Card number.</div>');
		$("#payment_info_err").show();
		$("#vCardnumber").focus();
		return false;
	
    }else{
		$("#payment_info_err").hide();
    }
    if(vCardnumber && vCreditCardType) {
	 	if (!checkCreditCard (vCardnumber,vCreditCardType)) {
			$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>'+ccErrors[ccErrorNo]+'</div>');
			$("#payment_info_err").show();
			$("#vCardnumber").focus();
			return false;
	 	}else{
			$("#payment_info_err").hide();
	 	}
 	}
    if (vMonth == '') {		
		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Expire month.</div>');
		$("#payment_info_err").show();
		$("#vMonth").focus();
		return false;
	
    }else{
		$("#payment_info_err").hide();
    }

    if (vYear == '') {		
		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Expire Year.</div>');
		$("#payment_info_err").show();
		$("#vYear").focus();
		return false;
	
    }else{
		$("#payment_info_err").hide();
    }

    if(CheckDate(vYear,vMonth) == 'invalid'){
		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select valid Expire Date.</div>');
		$("#payment_info_err").show();
		$("#vYear").focus();
		return false;
    }else{
		$("#payment_info_err").hide();
    }

    if (vCvv == '') {		
		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter cvv.</div>');
		$("#payment_info_err").show();
		$("#vCvv").focus();
		return false;
	
    }else{
		$("#payment_info_err").hide();
    }

	//$("#app_payment").ajaxSubmit(function(data) {
		
	//});
	var url = base_url+'appdetail/app_payment';
	var pars = '?'+$('#app_payment').serialize();
	show_loading();
	$.post(url+pars,function (data){
		$("#payment_info_err").hide();
		hide_loading();
		if(data != 'success'){
			$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>'+data+'</div>');
			$("#payment_info_err").show();
		}
		if(data  == 'success'){
			$("#paypalmethod").hide();
			$("#app_status").html('Completed');

		}
/*		$("#payment_info_err").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>'+data+'</div>');
		$("#payment_info_err").show();
*/	});

}

function CheckDate(ExpYear,ExpMon) {
	var result;
    var selectedDate = new Date (ExpYear,ExpMon);
    var nextmonth = selectedDate.setMonth(selectedDate.getMonth() + 1);
    var last_date_of_selected_date = new Date(nextmonth -1);
    var today = new Date();
    if (today > selectedDate) {
    	result = 'invalid';
    }
    else {
    	result = 'valid';
    }
    return result;
}


function hometab_validation(iAppTabId)
{
	var vWebsite = document.getElementById("vWebsite"+iAppTabId).value;
	var language = $('#language').val();
	var vEmail = document.getElementById("vEmail"+iAppTabId).value;
	var vTelephone = document.getElementById("vTelephone"+iAppTabId).value;
	var vAddress1 = document.getElementById("vAddress1"+iAppTabId).value;
	var vAddress2 = document.getElementById("vAddress2"+iAppTabId).value;
	var vCity = document.getElementById("vCity"+iAppTabId).value;
	var vState = document.getElementById("vState"+iAppTabId).value;
	var vZip = document.getElementById("vZip"+iAppTabId).value;
	var vLatitude  = document.getElementById("vLatitude"+iAppTabId).value;
	var vLongitude = document.getElementById("vLongitude"+iAppTabId).value;
	

if(language == 'rEnglish'){
	// validation of home page
	if (vWebsite == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Website.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vWebsite").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
	
	if (vEmail == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Your Email.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vEmail").focus();
		return false;
	} else {
			$("#hometab_validation"+iAppTabId).hide();
    }
	
	// valid email
	var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  	var isvalid = emailRegexStr.test(vEmail);  
	if (isvalid == false) {
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Valid Email.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vEmail").focus();
       	return false;  
	}else{
		$("#hometab_validation"+iAppTabId).hide();
	}
	
	if (vTelephone == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Your Telephone.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vTelephone").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    	}

	if (vTelephone !='' && !IsPhone(vTelephone)) {		
		$("#hometab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid telephone.</div>');
		$("#hometab_validation").show();
		$("#vTelephone").focus();
		return false;
	
	}else{
		$("#hometab_validation").hide();
	}
	
	if(vTelephone !='' && vTelephone.length > 11 || vTelephone.length < 11){
	    	$("#hometab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter 11 Digit.</div>');
		$("#hometab_validation").show();
		$("#vTelephone").focus();
		return false;
    	}else{
	    	$("#hometab_validation").hide();

	}
	
	if (vAddress1 == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Address.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vAddress1").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
	
	if (vCity == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter city.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vCity").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
	
	if (vState== '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter state.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vState").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
	
	if (vZip == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter zip.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vZip").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
}else if(language == 'rFrench'){
// validation of home page
	if (vWebsite == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer  url Site web.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vWebsite").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    	}
	
	if (vEmail == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Votre Email.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vEmail").focus();
		return false;
	} else {
			$("#hometab_validation"+iAppTabId).hide();
    }
	
	// valid email
	var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  	var isvalid = emailRegexStr.test(vEmail);  
	if (isvalid == false) {
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button> Entrez e-mail valide.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vEmail").focus();
       	return false;  
	}else{
		$("#hometab_validation"+iAppTabId).hide();
	}
	
	if (vTelephone == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez votre téléphone.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vTelephone").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    	}

	if (vTelephone !='' && !IsPhone(vTelephone)) {		
		$("#hometab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button> Entrez téléphone valide.</div>');
		$("#hometab_validation").show();
		$("#vTelephone").focus();
		return false;
	
	}else{
		$("#hometab_validation").hide();
	}
	
	if(vTelephone !='' && vTelephone.length > 11 || vTelephone.length < 11){
	    	$("#hometab_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez 11 chiffres.</div>');
		$("#hometab_validation").show();
		$("#vTelephone").focus();
		return false;
    	}else{
	    	$("#hometab_validation").hide();

	}
	
	if (vAddress1 == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Saisissez l`adresse.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vAddress1").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
	
	if (vCity == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez la ville.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vCity").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
	
	if (vState== '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button> Entrez Etat.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vState").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
	
	if (vZip == '') {		
		$("#hometab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez votre Code postal.</div>');
		$("#hometab_validation"+iAppTabId).show();
		$("#vZip").focus();
		return false;
	}else{
		$("#hometab_validation"+iAppTabId).hide();
    }
}
	
	/** Information Details **/
	$("#frmhometab_"+iAppTabId).submit();
	
	alert("Information sauvegardée,Vous pouvez procéder et renseigner d'autre onglet.");
}

function open_ckeditor(iAppTabId)
{
    /*	Load Ckeditor count */
	if(load_ckeditor_count  == 0){
		 for(k in CKEDITOR.instances){
		    var instance = CKEDITOR.instances[k];
		    instance.destroy()
		 }
		 CKEDITOR.replaceAll(function(textarea, config){
  			/** language **/
  			language: 'fr';
  			uiColor: '#9AB8F3';	
		});

	}else{
		var name = 'tDescriptione'+iAppTabId;
		var editor = CKEDITOR.instances[name];
		if(editor)
	    {	
	        CKEDITOR.remove(editor);
	    }
	    $("#frmevent_"+iAppTabId+" .cedit > div").hide();
	    $(".cke_inner cke_reset").hide();
	}
	load_ckeditor_count = load_ckeditor_count + 1;   
}
/*
	Open Ckeditor for service
*/
function open_ckeditor_service(iAppTabId)
{	
	if(load_ckeditor_count  == 0){
		for(k in CKEDITOR.instances){
		    var instance = CKEDITOR.instances[k];
		    instance.destroy()
		 }
		 CKEDITOR.replaceAll(function(textarea, config){
  		    language: 'fr';
			uiColor: '#9AB8F3';
		}); 
	}else{
		var name = 'tDescriptione'+iAppTabId;
		var editor = CKEDITOR.instances[name];
		if(editor)
	    {	
	        CKEDITOR.remove(editor);
	    }
	    CKEDITOR.replace(name, {
			language: 'fr',
			uiColor: '#9AB8F3'
		});
	    $("#frmservice_"+iAppTabId+" .cedit > div").hide();
	    $(".cke_inner cke_reset").hide();
	}
	load_ckeditor_count = load_ckeditor_count + 1;   
}

/*
	Edit Ajax Load Ckeditor
*/
function load_ckeditor()
{
	if(load_ckeditor_count  == 0){
		 for(k in CKEDITOR.instances){
		    var instance = CKEDITOR.instances[k];
		    instance.destroy()
		 }
		  CKEDITOR.replaceAll(function(textarea, config){
  		    language: 'fr';
			uiColor: '#9AB8F3';
		}); 
	}else{
		var name = 'tDescriptione'+iAppTabId;
		var editor = CKEDITOR.instances[name];
		if(editor)
	    {	
	    	editor.destroy(true);
	        CKEDITOR.remove(editor);
	    }
	    CKEDITOR.replace(name, {
			language: 'fr',
			uiColor: '#9AB8F3'
		});
	    $("#frmevent_"+iAppTabId+" .cedit > div").hide();
    	$("#frmtwotire"+iAppTabId+" .cedit > div").hide();
    	$(".cke_inner cke_reset").hide();
	}
	load_ckeditor_count = load_ckeditor_count + 1;   
}

function IsPhone(phone){
	var regex = /^[\d\s\(\)\-]+$/g;
    return regex.test(phone);
}

function IsZip(zip){
    var regex = /^(?=.*[0-9])(?=.*[A-Z])([A-Z0-9]+)$/;
    return regex.test(zip);
}

function getlatlangforhome(id)
{
	if($("#vGPS"+id).is(':checked')){
		var address = $("#vAddress1"+id).val();
		var vCity = $("#vCity"+id).val();
		var vState = $("#vState"+id).val();
		var vZip = $("#vZip"+id).val();
		var geocoder = new google.maps.Geocoder();
		var address = address+','+vCity+','+vState+','+vZip;
		//	address = encodeURIComponent(address);
		//	alert(address);
		geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
		    var latitude = results[0].geometry.location.lat();
		    var longitude = results[0].geometry.location.lng();
		    if (latitude) {
				latitude = latitude.toFixed(6);
				$("#vLatitude"+id).val(latitude);
		    }
		    if (longitude) {
					longitude = longitude.toFixed(6);
					$("#vLongitude"+id).val(longitude);
		    	}	
		  	} 
		});

	    }else{
			$("#vLatitude"+id).val('');
			$("#vLongitude"+id).val('');
	    }
	    //code
}


function getlatlangforreservation(id) {
	
	if($("#vGPS"+id).is(':checked')){
	
	var address = $("#vAddress1_res").val();
	var vCity = $("#vCity_res").val();
	var vState = $("#vState_res").val();
	var vZip = $("#vZip_res").val();
	var geocoder = new google.maps.Geocoder();
	var address = address+','+vCity+','+vState+','+vZip;
	//address = encodeURIComponent(address);
	//alert(address);
	geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
		    var latitude = results[0].geometry.location.lat();
		    var longitude = results[0].geometry.location.lng();
		    if (latitude) {
			latitude = latitude.toFixed(6);
			$("#vLatitude_res").val(latitude);
		    }
		    if (longitude) {
			longitude = longitude.toFixed(6);
			$("#vLongitude_res").val(longitude);
		    }
		} 
	});
	
    }else{
	$("#vLatitude_res"+id).val('');
	$("#vLongitude_res"+id).val('');
    }
    //code
}

function getlatlang(id) 
{
    if($("#vLookupAddress"+id).is(':checked'))
	{
		var address = $("#vAddress1"+id).val();
		var vCity = $("#vCity"+id).val();
		var vState = $("#vState"+id).val();
		var vZip = $("#vZip"+id).val();
		var geocoder = new google.maps.Geocoder();
		var address = address+','+vCity+','+vState+','+vZip;
		//address = encodeURIComponent(address);
		//alert(address);
		geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();
				if (latitude) {
				latitude = latitude.toFixed(6);
					$("#vLatitude"+id).val(latitude);
				}
				if (longitude) 
				{
					longitude = longitude.toFixed(6);
					$("#vLongitude"+id).val(longitude);
	  	    	}
	  		} 
		});
	}else{
		$("#vLatitude"+id).val('');
		$("#vLongitude"+id).val('');
    }
    //code
}
/*
function getlatlangaround(id) 
{
	if($("#rGps"+id).is(':checked')){
	var address = $("#rAddress1"+id).val();
	var vCity = $("#rCity"+id).val();
	var vState = $("#rState"+id).val();
	var vZip = $("#rZip"+id).val();
	var geocoder = new google.maps.Geocoder();
	var address = address+','+vCity+','+vState+','+vZip;
	
	// address = encodeURIComponent(address);
	// alert(address);
	
	geocoder.geocode( { 'address': address}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
	    var latitude = results[0].geometry.location.lat();
	    var longitude = results[0].geometry.location.lng();
	    if (latitude) {
		latitude = latitude.toFixed(6);
		
		$("#rLatitude"+id).val(latitude);
	    }
	    if (longitude) {
		
		longitude = longitude.toFixed(6);
		$("#rLongitude"+id).val(longitude);
	    }
	  } 
	});
	
    }else{
	$("#rLatitude"+id).val('');
	$("#rLongitude"+id).val('');
	
    }
    //code
}

*/
function getlatlangaround(id) 
{
	if($("#rGPS"+id).is(':checked')){
	var address = $("#rAddress1"+id).val();
	var vCity = $("#rCity"+id).val();
	var vState = $("#rState"+id).val();
	var vZip = $("#rZip"+id).val();
	var geocoder = new google.maps.Geocoder();
	var address = address+','+vCity+','+vState+','+vZip;
	
//	 address = encodeURIComponent(address);
//	 alert(address);
	
	geocoder.geocode( { 'address': address}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
	    var latitude = results[0].geometry.location.lat();
	    var longitude = results[0].geometry.location.lng();
	    if (latitude) {
		latitude = latitude.toFixed(6);

		$("#rLatitude"+id).val(latitude);
	    }
	    if (longitude) {
		
		longitude = longitude.toFixed(6);
		$("#rLongitude"+id).val(longitude);
	    }
	  } 
	});
	
    }else{
		$("#rLatitude"+id).val('');
		$("#rLongitude"+id).val('');
    }
    //code
}

function getlatlange(id) {
    if($("#vLookupAddress").is(':checked')){
	
	var address = $("#vAddress1e"+id).val();
	var vCity = $("#vCitye"+id).val();
	var vState = 'UK';
	var vZip = $("#vZipe"+id).val();
	//vZip = vZip.replace(" ",",");
	var geocoder = new google.maps.Geocoder();
	var address = address+','+vCity+','+vZip;
	//alert(address);
	//var address = address+','+vCity+','+vZip;
	//alert(address);
	//address = encodeURIComponent(address);
	geocoder.geocode( { 'address': address}, function(results, status) {
		//alert(results);
		  if (status == google.maps.GeocoderStatus.OK) {
		    var latitude = results[0].geometry.location.lat();
		    var longitude = results[0].geometry.location.lng();
		    if (latitude) {
				latitude = latitude.toFixed(6);
				$("#vLatitudee"+id).val(latitude);
		    }
		    if (longitude) {
				longitude = longitude.toFixed(6);
				$("#vLongitudee"+id).val(longitude);
		    }
		  } 
		});
	}else{
		//$("#vLatitudee"+id).val('');
		//$("#vLongitudee"+id).val('');
	}
    
    //code
}


//Gallery Validation
//Modified By:Chavda Hem  Modified Date:15-05-2014
function gallery_validation(iAppTabId){
    //alert("dfsxfddf");
 var type = $('input[name="data[eImageServiceType]"]:checked').val();
   // alert(type);
 var galleryimg = $("#vGalleryImagee"+iAppTabId).val();
 var language = $('#language').val();
 //var des= $("#tDescription"+iAppTabId).val();
 var vFlickerApie = $("#vFlickerApie"+iAppTabId).val();
 var vFlickerEmaile = $("#vFlickerEmaile"+iAppTabId).val();
 var vPicassaEmaile = $("#vPicassaEmaile"+iAppTabId).val();
 var vInstagramEmaile = $("#vInstagramEmaile"+iAppTabId).val();

 if(language == 'rEnglish'){
     if (galleryimg=='' && type == 'Custom') {


            $("#errormsg").html("<p>Please choose image</p>");
            $("#myalert").modal('show');
            return false; 
 
     }
     if(galleryimg!='' && type=='Custom'){
   var Extension = galleryimg.substring(galleryimg.lastIndexOf('.') + 1).toLowerCase();
         if (Extension == "png"  || Extension == "jpeg" || Extension == "jpg") { 
         }else{$("#errormsg").html("<p>Please choose image format</p>");
             $("#myalert").modal('show');
            return false;}$("#gallery_validation"+iAppTabId).hide();
  
     }
 
     if (vFlickerApie=='' && type == 'Flicker') {  
  $("#errormsg").html("<p>Please enter flicker api key</p>");
      $("#myalert").modal('show');
        return false;
     }
 
     if (vFlickerEmaile=='' && type == 'Flicker') { 
      $("#errormsg").html("<p>Please enter flicker email</p>");
      $("#myalert").modal('show');
        return false; 
  
     }

 if (vFlickerEmaile!='' && type == 'Flicker') {      
  var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var isvalid = emailRegexStr.test(vFlickerEmaile);  
  if (!isvalid) {
   $("#errormsg").html("<p>Please enter valid email</p>");
       $("#myalert").modal('show');
         return false;    
  }    
 }

     if (vPicassaEmaile=='' && type == 'Picasa') {  
  $("#errormsg").html("<p>Please enter Picasa email.</p>");
      $("#myalert").modal('show');
        return false;
 
     }

 if (vPicassaEmaile!='' && type == 'Picasa') {      
  var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var isvalid = emailRegexStr.test(vPicassaEmaile);  
  if (!isvalid) {
   $("#errormsg").html("<p>Please enter valid email.</p>");
       $("#myalert").modal('show');
         return false;
     }    
 }
 
     if (vInstagramEmaile=='' && type == 'Instagram') {  
  $("#errormsg").html("<p>Please enter instagram username.</p>");
      $("#myalert").modal('show');
        return false;
     }else{
  $("#gallery_validation"+iAppTabId).hide();
  
     }


/* if (vInstagramEmaile!='' && type == 'Instagram') {      
  var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var isvalid = emailRegexStr.test(vInstagramEmaile);  
  if (!isvalid) {    
   $("#gallery_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid Instagram email</div>');
   $("#gallery_validation"+iAppTabId).show();
   $("#vInstagramEmaile"+iAppTabId).focus();
   return false;
  }    
 }else{
  $("#gallery_validation"+iAppTabId).hide();
 }*/ 
}else if(language == 'rFrench'){
     if (galleryimg=='' && type == 'Custom') {
            $("#errormsg").html("<p>Veuillez choisir une image</p>");
            $("#myalert").modal('show');
            return false; 
     }
     if(galleryimg!='' && type=='Custom'){
   		 var Extension = galleryimg.substring(galleryimg.lastIndexOf('.') + 1).toLowerCase();
         if (Extension == "png"  || Extension == "jpeg" || Extension == "jpg") { 
         }else{$("#errormsg").html("<p>Please choose image format</p>");
            $("#myalert").modal('show');
            return false;}$("#gallery_validation"+iAppTabId).hide();
     }
     if (vFlickerApie=='' && type == 'Flicker') {  
	  $("#errormsg").html("<p>Please enter flicker api key</p>");
	      $("#myalert").modal('show');
	        return false;
	  }
     if (vFlickerEmaile=='' && type == 'Flicker') { 
      $("#errormsg").html("<p>Please enter flicker email</p>");
      $("#myalert").modal('show');
        	return false; 
     }

	 if (vFlickerEmaile!='' && type == 'Flicker') {      
	  var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	  var isvalid = emailRegexStr.test(vFlickerEmaile);  
	  if (!isvalid) {
	   $("#errormsg").html("<p>Please enter valid email</p>");
	       $("#myalert").modal('show');
	         return false;    
	  }    
 }

     if (vPicassaEmaile=='' && type == 'Picasa') {  
  $("#errormsg").html("<p>Please enter Picasa email.</p>");
      $("#myalert").modal('show');
        return false;
 
     }

 if (vPicassaEmaile!='' && type == 'Picasa') {      
  var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var isvalid = emailRegexStr.test(vPicassaEmaile);  
  if (!isvalid) {
   $("#errormsg").html("<p>Please enter valid email.</p>");
       $("#myalert").modal('show');
         return false;
     }    
 }
 
     if (vInstagramEmaile=='' && type == 'Instagram') {  
  $("#errormsg").html("<p>Please enter instagram username.</p>");
      $("#myalert").modal('show');
        return false;
     }else{
  $("#gallery_validation"+iAppTabId).hide();
  
     }
 }

     
 $("#frmgallery_"+iAppTabId).submit();
}

function show_hide_gallery(type,iAppTabId){
	switch(type){
		case 'Custom':
			$("#div-vGalleryImage-"+iAppTabId).show();
			$("#div-tDescription-"+iAppTabId).show();
			$("#div-vFlickerApi-"+iAppTabId).hide();
			$("#div-vFlickerEmail-"+iAppTabId).hide();
			$("#div-eFlickerGalleryType-"+iAppTabId).hide();
			$("#div-vPicassaEmail-"+iAppTabId).hide();
			$("#div-eDisplayStyle-"+iAppTabId).show();
			$(".gallerywrapper").show();
			$("#div-vInstagramEmail-"+iAppTabId).hide();
			$("#div-vInstagramAPI-"+iAppTabId).hide();
			$("#vInstagramEmaile"+iAppTabId).val('');
			$("#vFlickerApie"+iAppTabId).val('');
			$("#vFlickerEmaile"+iAppTabId).val('');
			$("#vPicassaEmaile"+iAppTabId).val('');
			break;
		case 'Flicker':
			$("#div-vGalleryImage-"+iAppTabId).hide();
			$("#div-tDescription-"+iAppTabId).hide();
			$("#div-vFlickerApi-"+iAppTabId).show();
			$("#div-vFlickerEmail-"+iAppTabId).show();
			$("#div-eFlickerGalleryType-"+iAppTabId).show();
			$("#div-vPicassaEmail-"+iAppTabId).hide();
			$("#div-eDisplayStyle-"+iAppTabId).show();
			$(".gallerywrapper").hide();
			$("#div-vInstagramEmail-"+iAppTabId).hide();
			$("#div-vInstagramAPI-"+iAppTabId).hide();
			$("#vInstagramEmaile"+iAppTabId).val('');
			$("#vGalleryImagee"+iAppTabId).val('');
			$("#tDescription"+iAppTabId).val('');
			break;
		case 'Picasa':
			$("#div-vGalleryImage-"+iAppTabId).hide();
			$("#div-tDescription-"+iAppTabId).hide();
			$("#div-vFlickerApi-"+iAppTabId).hide();
			$("#div-vFlickerEmail-"+iAppTabId).hide();
			$("#div-eFlickerGalleryType-"+iAppTabId).hide();
			$("#div-vPicassaEmail-"+iAppTabId).show();
			$("#div-eDisplayStyle-"+iAppTabId).hide();
			$(".gallerywrapper").hide();
			$("#div-vInstagramEmail-"+iAppTabId).hide();
			$("#div-vInstagramAPI-"+iAppTabId).hide(); 
			$("#vFlickerApie"+iAppTabId).val('');
			$("#vFlickerEmaile"+iAppTabId).val('');
			$("#vPicassaEmaile"+iAppTabId).val('');
			$("#vGalleryImagee"+iAppTabId).val('');
			$("#tDescription"+iAppTabId).val('');
			break;
		case 'Instagram':
			$("#div-vGalleryImage-"+iAppTabId).hide();
			$("#div-tDescription-"+iAppTabId).hide();
			$("#div-vFlickerApi-"+iAppTabId).hide();
			$("#div-vFlickerEmail-"+iAppTabId).hide();
			$("#div-eFlickerGalleryType-"+iAppTabId).hide();
			$("#div-vPicassaEmail-"+iAppTabId).hide();
			$("#div-eDisplayStyle-"+iAppTabId).hide();
			$(".gallerywrapper").hide();
			$("#div-vInstagramEmail-"+iAppTabId).show();
			$("#div-vInstagramAPI-"+iAppTabId).show();
			$("#vFlickerApie"+iAppTabId).val('');
			$("#vFlickerEmaile"+iAppTabId).val('');
			$("#vPicassaEmaile"+iAppTabId).val('');
			$("#vGalleryImagee"+iAppTabId).val('');
			$("#tDescription"+iAppTabId).val('');
			break;
		
	}
}
//Two Tire Strat
function save_tabwise_glbval(iAppTabId){
	show_loading();
	$('#frmtabgvalue'+iAppTabId).ajaxSubmit(function(data) {
		
		if(data){
			
			$('#loading').delay(100).trigger('reveal:close');  
			$("#frmtabgvalue_validation"+iAppTabId).show(); 
			$("#frmtabgvalue_validation"+iAppTabId).html('<div class="alert alert-success"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>'+data+'</div>');
		}
	});
}	
/* 
Modified By : Nizam Kadri.
Modified Date : 12/06/2014.
issue fixed of Image validation for two tire application Tab.
*/

function submittwotire(iAppTabId,iFeatureId){
//var tDescription = CKEDITOR.instances['tDescriptione'+iAppTabId].getData();
//alert(tDescription);
//$("#tDescriptione"+iAppTabId ).html(tDescription);
//alert(tDescription);return false;
	 //$('#twotire_tbl'+iAppTabId).html('aka');
	 var vHeaderImage = $("#vHeaderImage"+iAppTabId).val();
	 var af = vHeaderImage.substring(vHeaderImage.lastIndexOf('.') + 1).toLowerCase();

	var vSection = $("#vSection"+iAppTabId).val();
	//alert(vSection);return false;
	var vName = $("#vName"+iAppTabId).val();
	var vThumbnilImage = $("#vThumbnilImage"+iAppTabId).val();
	var at = vThumbnilImage.substring(vThumbnilImage.lastIndexOf('.') + 1).toLowerCase();
	//console.log(iFeatureId);return false;
    if (vSection =='') {		
		$("#twotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter section name.</div>');
		$("#twotire_validation"+iAppTabId).show();
		$("#vSection"+iAppTabId).focus();
		return false;
    }else{
		$("#twotire_validation"+iAppTabId).hide();
    }

    if (vName=='') {		
		$("#twotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
		$("#twotire_validation"+iAppTabId).show();
		$("#vName"+iAppTabId).focus();
		return false;
    }else{
		$("#twotire_validation"+iAppTabId).hide();
    }

    if(af == 'gif' || af == 'GIF' || af == 'jpg'  ||af == 'JPG' ||af == 'jpeg' ||af == 'JPEG'||af == 'png' ||af == 'PNG' || af == '' ){}else{
 		$("#twotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
		$("#twotire_validation"+iAppTabId).show();
		$("#vHeaderImage").val('');
		$("#vHeaderImage").focus();
		return false;
 	}
 	if(at == 'gif' || at == 'GIF' || at == 'jpg'  ||at == 'JPG' ||at == 'jpeg' ||at == 'JPEG'||at == 'png' ||at == 'PNG' || at == '' ){}else{
 		$("#twotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
		$("#twotire_validation"+iAppTabId).show();
		$("#vThumbnilImage").val('');
		$("#vThumbnilImage").focus();
		return false;
 	}

    if (vThumbnilImage=='') {		
		$("#twotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select thumbnil image.</div>');
		$("#twotire_validation"+iAppTabId).show();
		$("#vThumbnilImage"+iAppTabId).focus();
		return false;
    }else{
		$("#twotire_validation"+iAppTabId).hide();
    }    
//     $('#twotirebtn').click(function(){
//     	var test=$('#frmtwotire'+iAppTabId).serialize();
//     	console.log(test);
//     });
// }
// $('#frmtwotire'+iAppTabId).submit();
  $('#frmtwotire'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
            var extra = '';
            show_loading();
            if($('#iApplicationId')){
                 var iApplicationId = $('#iApplicationId').val();
                 extra += '?iApplicationId='+iApplicationId;
            }
            if(iAppTabId){
                 extra += '&iAppTabId='+iAppTabId;
            }
            if(iFeatureId){
                 extra += '&iFeatureId='+iFeatureId;
            }             
            var pars = extra;    
            //console.log(pars);
            var url = base_url+"app/getalltwotirpopupehtml";
            $.post(url+pars,
            function(data) {
             	//alert(data);
                $('#loading').delay(100).trigger('reveal:close');   
                $('#twotire_tbl'+iAppTabId).html(data);
                //load_ckeditor();
                //$.fancybox.open('#mailcat_listing'+iAppTabId);
                $('#frmtwotire'+iAppTabId)[0].reset();  
            });   
    }); 
}


function delete_twotire(iTwotireInfotabId,iAppTabId,iFeatureId){

    var extra = '';
    show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iTwotireInfotabId !=''){
        extra += '&iTwotireInfotabId='+iTwotireInfotabId;
        
    }
    if(iFeatureId){
         extra += '&iFeatureId='+iFeatureId;
    } 
    
    var pars = extra;    
    var url = base_url+"app/twotire_delete";
    $.post(url+pars,
    function(data) {
		hide_loading(); 
        $('#twotire_tbl'+iAppTabId).html(data);
        //load_ckeditor();
    });   
}
function edit_twotire(iTwotireInfotabId,iAppTabId,iFeatureId){
	var name = 'tDescriptionf'+iTwotireInfotabId;
    var extra = '';
    if(iTwotireInfotabId !=''){
        extra += '?iTwotireInfotabId='+iTwotireInfotabId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }    
    var pars = extra;    
    var url = base_url+"app/showtwotirepopup";
    console.log(url+pars);
    //alert(url+pars);
  	//   $.ajax({
		//   type: "POST",
		//   url: url,
		//   data: pars,
		//   dataType:'text',
		//   success: function(data){
		//   	 console.log(data);

		//   },
		//   completed: function(data){
		//   	$.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no',beforeShow: function(){ $(".gcp").colorpicker({});}});
	 //    	$('.gcp').colorpicker().on('changeColor', function(ev){
		// 	var cval = ev.color.toHex();
		//     $(this).val(ev.color.toHex());
		//     $(this).css('background',cval);
		//     //bodyStyle.backgroundColor = ev.color.toHex();
		// 	});
		//   	var editor = CKEDITOR.instances[name];
		//      if (typeof editor === "undefined"){
	 //    		if (editor) { editor.destroy(true); }
		//      }
		//      CKEDITOR.replace(name, {
				// 	/*
				// 	 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
				// 	 */
				// 	extraPlugins: 'htmlwriter',

				// 	/*
				// 	 * Style sheet for the contents
				// 	 */
				// 	contentsCss: 'body {color:#000; background-color#:FFF;}',

				// 	/*
				// 	 * Simple HTML5 doctype
				// 	 */
				// 	docType: '<!DOCTYPE HTML>',

				// 	/*
				// 	 * Core styles.
				// 	 */
				// 	coreStyles_bold: { element: 'b' },
				// 	coreStyles_italic: { element: 'i' },
				// 	coreStyles_underline: { element: 'u' },
				// 	coreStyles_strike: { element: 'strike' },

				// 	/*
				// 	 * Font face.
				// 	 */

				// 	// Define the way font elements will be applied to the document.
				// 	// The "font" element will be used.
				// 	font_style: {
				// 		element: 'font',
				// 		attributes: { 'face': '#(family)' }
				// 	},

				// 	/*
				// 	 * Font sizes.
				// 	 */
				// 	fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
				// 	fontSize_style: {
				// 		element: 'font',
				// 		attributes: { 'size': '#(size)' }
				// 	} ,

				// 	/*
				// 	 * Font colors.
				// 	 */
				// 	colorButton_enableMore: true,

				// 	colorButton_foreStyle: {
				// 		element: 'font',
				// 		attributes: { 'color': '#(color)' }
				// 	},

				// 	colorButton_backStyle: {
				// 		element: 'font',
				// 		styles: { 'background-color': '#(color)' }
				// 	},

				// 	/*
				// 	 * Styles combo.
				// 	 */
				// 	stylesSet: [
				// 		{ name: 'Computer Code', element: 'code' },
				// 		{ name: 'Keyboard Phrase', element: 'kbd' },
				// 		{ name: 'Sample Text', element: 'samp' },
				// 		{ name: 'Variable', element: 'var' },
				// 		{ name: 'Deleted Text', element: 'del' },
				// 		{ name: 'Inserted Text', element: 'ins' },
				// 		{ name: 'Cited Work', element: 'cite' },
				// 		{ name: 'Inline Quotation', element: 'q' }
				// 	],

					// on: { 'instanceReady': configureHtmlOutput },
				// 	allowedContent: 'img[!src,alt,align,width,height]; font[face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]'
				// });
		//   }
		// });
    $.post(url+pars,
    function(data) {

        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no',beforeShow: function(){ $(".gcp").colorpicker({});}});
	    });
        
    	
	   // CKEDITOR.config.allowedContent=true;
	    $('.gcp').colorpicker().on('changeColor', function(ev){
			var cval = ev.color.toHex();
		    $(this).val(ev.color.toHex());
		    $(this).css('background',cval);
		    //bodyStyle.backgroundColor = ev.color.toHex();
		});
		
  
    })
    .done(function(){
    	var editor = CKEDITOR.instances[name];
		if (typeof editor === "undefined"){
			if (editor) { editor.destroy(true); }
		}
    	CKEDITOR.replace(name,{
    				language: 'fr',
					/*
					 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
					 */
					// extraPlugins: 'htmlwriter',
					// extraPlugins: 'stylescombo',
					// extraPlugins: 'toolbar',
					// extraPlugins: 'image',

					/*
					 * Style sheet for the contents
					 */
					contentsCss: 'body {color:#000; background-color#:FFF;}',

					/*
					 * Simple HTML5 doctype
					 */
					docType: '<!DOCTYPE HTML>',

					/*
					 * Core styles.
					 */
					coreStyles_bold: { element: 'b' },
					coreStyles_italic: { element: 'i' },
					coreStyles_underline: { element: 'u' },
					coreStyles_strike: { element: 'strike' },

					/*
					 * Font face.
					 */

					// Define the way font elements will be applied to the document.
					// The "font" element will be used.
					font_style: {
						element: 'font',
						attributes: { 'face': '#(family)' }
					},

					/*
					 * Font sizes.
					 */
					fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
					fontSize_style: {
						element: 'font',
						attributes: { 'size': '#(size)' }
					} ,

					/*
					 * Font colors.
					 */
					colorButton_enableMore: true,
					colorButton_foreStyle: {
						element: 'font',
						attributes: { 'color': '#(color)' }
					},

					colorButton_backStyle: {
						element: 'font',
						styles: { 'background-color': '#(color)' }
					},
					image2_alignClasses: [ 'align-left', 'align-center', 'align-right' ],
					/*
					 * Styles combo.
					 */
					stylesSet: [
						{ name: 'Computer Code', element: 'code' },
						{ name: 'Keyboard Phrase', element: 'kbd' },
						{ name: 'Sample Text', element: 'samp' },
						{ name: 'Variable', element: 'var' },
						{ name: 'Deleted Text', element: 'del' },
						{ name: 'Inserted Text', element: 'ins' },
						{ name: 'Cited Work', element: 'cite' },
						{ name: 'Inline Quotation', element: 'q' }
					],

					on: { 'instanceReady': configureHtmlOutput },
					allowedContent: 'img[!src,alt,align,width,height]; font[face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
					allowedContent:true,
					toolbar:null
				});
    });   
}
/*
				 * Adjust the behavior of the dataProcessor to avoid styles
				 * and make it look like FCKeditor HTML output.
				 */
				function configureHtmlOutput( ev ) {
					var editor = ev.editor,
						dataProcessor = editor.dataProcessor,
						htmlFilter = dataProcessor && dataProcessor.htmlFilter;

					// Out self closing tags the HTML4 way, like <br>.
					dataProcessor.writer.selfClosingEnd = '>';

					// Make output formatting behave similar to FCKeditor
					var dtd = CKEDITOR.dtd;
					for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
						dataProcessor.writer.setRules( e, {
							indent: true,
							breakBeforeOpen: true,
							breakAfterOpen: false,
							breakBeforeClose: !dtd[ e ][ '#' ],
							breakAfterClose: true
						});
					}

					// Output properties as attributes, not styles.
					htmlFilter.addRules( {
						elements: {
							$: function( element ) {
								// Output dimensions of images as width and height
								if ( element.name == 'img' ) {
									var style = element.attributes.style;

									if ( style ) {
										// Get the width from the style.
										var match = ( /(?:^|\s)width\s*:\s*(\d+)px/i ).exec( style ),
											width = match && match[ 1 ];

										// Get the height from the style.
										match = ( /(?:^|\s)height\s*:\s*(\d+)px/i ).exec( style );
										var height = match && match[ 1 ];
										match1 = ( /(?:^|\s)float\s*:\s*(\w*);/i ).exec( style );
										console.log(style);
										console.log(match1);
										var floatr = match1 && match1[ 1 ];

										if ( floatr ) {
											if(floatr=='right')
											{
												// // element.className=element.className+' right';
												// // console.log(floatr+'hello');
												// // console.log(element.className);
												// element.attributes.style.replace( /(?:^|\s)float\s*:\s*(\w*);?/i , 'right' );
												element.attributes.align = "right";
											}
											else if ( floatr == 'left')
											{
												// element.className=element.className+' left';
												// element.attributes.style.replace( /(?:^|\s)float\s*:\s*(\w*);?/i , 'left' );
												element.attributes.align = "left";
											}
											// element.attributes.style = element.attributes.style.replace( /(?:^|\s)width\s*:\s*(\d+)px;?/i , '' );
											// element.attributes.width = width;
										}
										if ( width ) {
											element.attributes.style = element.attributes.style.replace( /(?:^|\s)width\s*:\s*(\d+)px;?/i , '' );
											element.attributes.width = width;
										}

										if ( height ) {
											element.attributes.style = element.attributes.style.replace( /(?:^|\s)height\s*:\s*(\d+)px;?/i , '' );
											element.attributes.height = height;
										}
									}
								}

								// Output alignment of paragraphs using align
								if ( element.name == 'p' ) {
									style = element.attributes.style;

									if ( style ) {
										// Get the align from the style.
										match = ( /(?:^|\s)text-align\s*:\s*(\w*);/i ).exec( style );
										var align = match && match[ 1 ];

										if ( align ) {
											element.attributes.style = element.attributes.style.replace( /(?:^|\s)text-align\s*:\s*(\w*);?/i , '' );
											element.attributes.align = align;
										}
									}
								}

								if ( !element.attributes.style )
									delete element.attributes.style;

								return element;
							}
						},

						attributes: {
							style: function( value, element ) {
								// Return #RGB for background and border colors
								return CKEDITOR.tools.convertRgbToHex( value );
							}
						}
					});
				}

function deletetwotirefile(iTwotireInfotabId,type,filename){
	var pars = '?iTwotireInfotabId='+iTwotireInfotabId+'&type='+type+'&filename='+filename;  
	var url = base_url+"app/deletetwotirefile";
     $.post(url+pars,
	  function(data) {
		if(data.trim()=='delete'){
			$("#detete"+type+"file").hide();
			$("#old"+filename).val('');
		}
	  }
	);
}


function updatetwotire(iAppTabId,iFeatureId)
{
	//var tDescription = CKEDITOR.instances['tDescriptione'+iAppTabId].getData();
	//alert(tDescription);
	//$("#tDescriptione"+iAppTabId ).html(tDescription);
	//alert(tDescription);return false;
	 //$('#twotire_tbl'+iAppTabId).html('aka');

	 var vHeaderImage = $("#vHeaderImagee"+iAppTabId).val();
	 var aj = vHeaderImage.substring(vHeaderImage.lastIndexOf('.') + 1).toLowerCase();

	var vSection = $("#vSectionedit"+iAppTabId).val();
	//alert(vSection);return false;
	var vName = $("#vNameedit"+iAppTabId).val();
	var oldvThumbnilImage = $("#oldvThumbnilImage"+iAppTabId).val();
	
	var vThumbnilImage = $("#vThumbnilImagee"+iAppTabId).val();
	var av = vThumbnilImage.substring(vThumbnilImage.lastIndexOf('.') + 1).toLowerCase();

	//console.log(iFeatureId);return false;
    if (vSection =='') {		
		$("#edittwotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter section name.</div>');
		$("#edittwotire_validation"+iAppTabId).show();
		$("#vSectionedit"+iAppTabId).focus();
		return false;
	
    }else{
		$("#edittwotire_validation"+iAppTabId).hide();
    }

    if (vName=='') {		
		$("#edittwotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
		$("#edittwotire_validation"+iAppTabId).show();
		$("#vNameedit"+iAppTabId).focus();
		return false;
	
    }else{
		$("#edittwotire_validation"+iAppTabId).hide();
    }

    if(av == 'gif' || av == 'GIF' || av == 'jpg'  ||av == 'JPG' ||av == 'jpeg' ||av == 'JPEG'||av == 'png' ||av == 'PNG' || av == '' ){}else{
 		$("#edittwotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
		$("#edittwotire_validation"+iAppTabId).show();
		$("#vThumbnilImagee").val('');
		$("#vThumbnilImagee").focus();
		return false;
 	}

 	if(aj == 'gif' || aj == 'GIF' || aj == 'jpg'  ||aj == 'JPG' ||aj == 'jpeg' ||aj == 'JPEG'||aj == 'png' ||aj == 'PNG' || aj == '' ){}else{
 		$("#edittwotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
		$("#edittwotire_validation"+iAppTabId).show();
		$("#vHeaderImagee").val('');
		$("#vHeaderImagee").focus();
		return false;
 	}

    if (vThumbnilImage=='' && oldvThumbnilImage == "") {		
		$("#edittwotire_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select thumbnil image.</div>');
		$("#edittwotire_validation"+iAppTabId).show();
		$("#vThumbnilImagee"+iAppTabId).focus();
		return false;
	
    }else{
		$("#edittwotire_validation"+iAppTabId).hide();
    }

    

	//$('#editfrmtwotire'+iAppTabId).submit();
  $('#editfrmtwotire'+iAppTabId).ajaxSubmit(function(data) {
	
    	   $.fancybox.close();
            var extra = '';
            show_loading();
            if($('#iApplicationId')){
                 var iApplicationId = $('#iApplicationId').val();
                 extra += '?iApplicationId='+iApplicationId;
            }
            if(iAppTabId){
                 extra += '&iAppTabId='+iAppTabId;
            }
            if(iFeatureId){
                 extra += '&iFeatureId='+iFeatureId;
            }             
             var pars = extra;    
             //console.log(pars);
             var url = base_url+"app/getalltwotirpopupehtml";
             $.post(url+pars,
             function(data) {
             	//alert(data);
                 $('#loading').delay(100).trigger('reveal:close');   
                 $('#twotire_tbl'+iAppTabId).html(data);
                 //load_ckeditor();
                // $.fancybox.open('#mailcat_listing'+iAppTabId);             
             });   
    }); 

}
// Configration  in price validation
function conf_save()
{
	
	var price = $(".input-larges").val();
	if(price=='' || !price.match('^[0-9.]+$')){
		$("#conf_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid Price.</div>');
		$("#conf_validation").show();
		$(".input-larges").focus();
		return false;

	}else{
		$("#conf_validation").hide();
    }
}

$('#showopeningtime,#mailchamppopup,#mailingcategory,#addmailingcategory').fancybox({
	'overlayShow'	: true,
//	'transitionIn'	: 'elastic',
//	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#addopeningtime,#mailchamppopup,#mailingcategory,#addmailingcategory').fancybox({
	'overlayShow'	: true,
//	'transitionIn'	: 'elastic',
//	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no',
	'width'  : 350,           // set the width
    'height' : 450,           // set the height
});
/*
 * Adjust the behavior of the dataProcessor to avoid styles
 * and make it look like FCKeditor HTML output.
 */

 // change by mayur gajjar
 function hometabopen_validation(iAppTabId,iFeatureId)

  { 
	 var vDay=document.getElementById("data[vDay]").value;
	 var vOpenfrom=document.getElementById("data[vOpenfrom]").value;
	 var vOpento=document.getElementById("data[vOpento]").value;
	 

	 // vDay validation
	 if (vDay==''){
		 $("#addopening_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Days.</div>');
		 $("#addopening_validation"+iAppTabId).show();
		 return false;
	 }else{
		 $("#addopening_validation"+iAppTabId).hide();
	 }
	 
	 if(vOpenfrom==''){
		  $("#addopening_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Opening from time.</div>');	
		 $("#addopening_validation"+iAppTabId).show();
		 return false;
	 }else{
		 $("#addopening_validation"+iAppTabId).hide();
	 }
	 
	 if(vOpento==''){
		 $("#addopening_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Opening to time.</div>');
		 $("#addopening_validation"+iAppTabId).show();
		  return false;
	 }else{
		 $("#addopening_validation"+iAppTabId).hide();
	 }
	 
     $('#frmhomeopen_'+iAppTabId).ajaxSubmit(function(data) {
     	/*$("input:text").val("");*/
 	    $.fancybox.close();

 		var extra = '';
 		show_loading();
 		if($('#iApplicationId')){
 			 var iApplicationId = $('#iApplicationId').val();
 			 extra += '?iApplicationId='+iApplicationId;
 		}
 		if(iAppTabId){
 			 extra += '&iAppTabId='+iAppTabId;
 		}
 		if(iFeatureId){
 			 
 			 extra += '&iFeatureId='+iFeatureId;
 		}
		 var pars = extra;    
 		 //console.log(pars);
 		 var url = base_url+"app/getallopeningtimehtml";
 		 $.post(url+pars,
 			 function(data) {
 				 $('#loading').delay(100).trigger('reveal:close');   
 				 $('#setopeningtime'+iAppTabId).html(data);
 				 $.fancybox.open('#setopeningtime'+iAppTabId);             
 			 });   
     }); 
 }

/**
	Developer : Mayur Gajjar
	Date : 3/9/2014
	Description : opening time
**/

function edit_openingtime(iOpeningId,iAppTabId,iFeatureId)
{
	show_loading();
    var extra = '';
    if(iOpeningId !=''){
        extra += '?iOpeningId='+iOpeningId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
	if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }
    
    var pars = extra;    
    var url = base_url+"app/geteditopeningtimehtml";
    // console.log(url+pars);
    $.post(url+pars,
    function(data) {
	  if($('#addopeningtimeedit'+iAppTabId)){
         hide_loading();   
		 $('#addopeningtimeedit'+iAppTabId).html(data); 
		 $.fancybox(data,{'overlayShow'	: true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'margin' : '0',
				'padding' : '0',
				'width' : 800,
				'height' : 450,
				'scrolling' : 'no'});            
		}
     });  
}


function hometabopen_editvalidation(iAppTabId,iFeatureId)
{
	var vDay = document.getElementById("vDay").value;
	var vOpenfrom = document.getElementById("vOpenfrom").value;
	var vOpento = document.getElementById("vOpento").value;
	var iOpeningId = document.getElementById("data[iOpeningId]").value;
	
	if (vDay==''){
		 $("#addopening_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Days.</div>');
		 $("#addopening_validation"+iAppTabId).show();
		 return false;
	 }else{
		 $("#addopening_validation"+iAppTabId).hide();
	 }
	 
	 if(vOpenfrom==''){
		  $("#addopening_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Opening from time.</div>');
		 $("#addopening_validation"+iAppTabId).show();
		 return false;
	 }else{
		 $("#addopening_validation"+iAppTabId).hide();
	 }
	 
	 if(vOpento==''){
		 $("#addopening_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Opening to time.</div>');
		 $("#addopening_validation"+iAppTabId).show();
		  return false;
	 }else{
		 $("#addopening_validation"+iAppTabId).hide();
	 }
	
	// vDay validation
	 $('#frmhomeopenedit_'+iAppTabId).ajaxSubmit(function(data) {
 	 		/*$("input:text").val("");*/
	 		$.fancybox.close();
 	
			var extra = '';
	 		show_loading();
	 		if($('#iApplicationId')){
	 			 var iApplicationId = $('#iApplicationId').val();
	 			 extra += '?iApplicationId='+iApplicationId;
	 		}
	 		if(iAppTabId){
	 			 extra += '&iAppTabId='+iAppTabId;
	 		}
	 		if(iFeatureId){
	 			 extra += '&iFeatureId='+iFeatureId;
	 		}  
			if(iOpeningId){
	 			 extra += '&iOpeningId='+iOpeningId;
	 		}  
			var pars = extra;    
			
			//console.log(pars);
			var url = base_url+"app/getallopeningtimehtml";
			$.post(url+pars,
			function(data) {
				 $('#loading').delay(100).trigger('reveal:close');   
				 $('#setopeningtime'+iAppTabId).html(data);
				 /*$.fancybox.open('#setopeningtime'+iAppTabId);           */  
			});   
     }); 
     
}

// Modify by :- Maksudkhan
// Date:-08-09-14
// description :- after delete data proper display
function delete_openingtime(iOpeningId,iAppTabId,iFeatureId)
{
     var extra = '';
     show_loading();
    
     if($('#iApplicationId')){
         var iApplicationId = $('#iApplicationId').val();
         extra += '?iApplicationId='+iApplicationId;
     }
    
     if(iOpeningId !=''){
         extra += '&iOpeningId='+iOpeningId;
        
     }

     if(iAppTabId){
          extra += '&iAppTabId='+iAppTabId;
     }

     if(iFeatureId){
          extra += '&iFeatureId='+iFeatureId;
     }             
  
     var pars = extra;    
     var url = base_url+"app/openingtime_delete";
     $.post(url+pars,
     function(data) {
     	 	hide_loading();
 				  
 				 $('#setopeningtime'+iAppTabId).html(data);
 				 $.fancybox.open('#setopeningtime'+iAppTabId);             
 	 });
     /*function(data) {
      if($('#backopening'+iAppTabId)){
         hide_loading();   
		 $('#backopening'+iAppTabId).html(data); 
		 $.fancybox(data,{'overlayShow'	: true,'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'margin' : '0',
				'padding' : '0',
				'width' : 800,
				'height' : 450,
				'scrolling' : 'no'});            
		}
     });  */
 }

 /* 
 	change by :Mayur Gajjar
	Date : 04/08/2014
	Change : Around us insert details
 */
 /* 
 	Modify By :Maksudkhan
	Date : 4-9-14 
	Description : Around us Validation
 */
 
 function aroundus_validation(iAppTabId)
 {
 	var rName = document.getElementById("rName"+iAppTabId).value;
	var rColor = document.getElementById("rCatId"+iAppTabId).value;
	var rWebsite = document.getElementById("rWebsite"+iAppTabId).value;
	var rEmail = document.getElementById("rEmail"+iAppTabId).value;
	var rTelephone = document.getElementById("rTelephone"+iAppTabId).value;
	var rAddress1 = document.getElementById("rAddress1"+iAppTabId).value;
	var rAddress2 = document.getElementById("rAddress2"+iAppTabId).value;
	var rCity = document.getElementById("rCity"+iAppTabId).value;
	var rState = document.getElementById("rState"+iAppTabId).value;
	var rZip = document.getElementById("rZip"+iAppTabId).value;
	var rLatitude  = document.getElementById("rLatitude"+iAppTabId).value;
	var rLongitude = document.getElementById("rLongitude"+iAppTabId).value;

	if (rName == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Name.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rName"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	if (rColor == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Color.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rColor"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	if (rWebsite == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Website.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rWebsite"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	if (rEmail == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Your Email.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rEmail"+iAppTabId).focus();
		return false;
	} else {
			$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	// valid email
	var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  	var isvalid = emailRegexStr.test(rEmail);  
	if (isvalid == false) {
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Valid Email.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rEmail"+iAppTabId).focus();
       	return false;  
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
	}
	
	if (rTelephone == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Your Telephone.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rTelephone"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	if (rAddress1 == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Address.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rAddress1"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	if (rCity == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter city.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rCity"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	if (rState== '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter state.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rState"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
	
	if (rZip == '') {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter zip.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rZip"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
    if (rZip !='' && rZip.length > 6 || rZip.length < 6) {		
		$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter six digit.</div>');
		$("#frmpoitab_validation"+iAppTabId).show();
		$("#rZip"+iAppTabId).focus();
		return false;
	
    }else{
		$("#frmpoitab_validation"+iAppTabId).hide();
    }
    if(rLatitude == '' || !isValidLongitude(rLatitude)){
			$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude.</div>');
			$("#frmpoitab_validation"+iAppTabId).show();
			$('#rLatitude'+iAppTabId).focus();
			return false;
		}else{
			$("#frmpoitab_validation"+iAppTabId).hide();
	}
	if(rLongitude == '' || !isValidLongitude(rLongitude)){
			$("#frmpoitab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
			$("#frmpoitab_validation"+iAppTabId).show();
			$('#rLongitude'+iAppTabId).focus();
			return false;
		}else{
			$('#frmpoitab_validation').hide();
	}
	
	$("#frmpoitab_"+iAppTabId).submit(); 
}
 /* 
 	Modify By :Maksudkhan
	Date : 4-9-14 
	Description : Around us Update Validation
 */
 function aroundus_update_validation(iAppTabId)
 {
 	var rName = document.getElementById("rNamee"+iAppTabId).value;
	var rColor = document.getElementById("rCatIde"+iAppTabId).value;
	var rWebsite = document.getElementById("rWebsitee"+iAppTabId).value;
	var rEmail = document.getElementById("rEmaile"+iAppTabId).value;
	var rTelephone = document.getElementById("rTelephonee"+iAppTabId).value;
	var rAddress1 = document.getElementById("rAddress1e"+iAppTabId).value;
	var rAddress2 = document.getElementById("rAddress2e"+iAppTabId).value;
	var rCity = document.getElementById("rCitye"+iAppTabId).value;
	var rState = document.getElementById("rStatee"+iAppTabId).value;
	var rZip = document.getElementById("rZipe"+iAppTabId).value;
	var rLatitude  = document.getElementById("rLatitudee"+iAppTabId).value;
	var rLongitude = document.getElementById("rLongitudee"+iAppTabId).value;
	
	// validation of home page
	if (rName == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Name.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rNamee"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	if (rColor == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Color.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rColor"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	if (rWebsite == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Website.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rWebsitee"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	if (rEmail == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Your Email.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rEmaile"+iAppTabId).focus();
		return false;
	} else {
			$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	// valid email
	var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  	var isvalid = emailRegexStr.test(rEmail);  
	if (isvalid == false) {
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Valid Email.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rEmaile"+iAppTabId).focus();
       	return false;  
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
	}
	
	if (rTelephone == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Your Telephone.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rTelephonee"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	if (rAddress1 == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Address.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rAddress1e"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	if (rCity == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter city.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rCitye"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	if (rState== '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter state.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rStatee"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
	
	if (rZip == '') {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter zip.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rZipe"+iAppTabId).focus();
		return false;
	}else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
    if (rZip !='' && rZip.length > 6 || rZip.length < 6) {		
		$("#frmpoiedittab_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter six digit.</div>');
		$("#frmpoiedittab_validation"+iAppTabId).show();
		$("#rZipe"+iAppTabId).focus();
		return false;
	
    }else{
		$("#frmpoiedittab_validation"+iAppTabId).hide();
    }
    if(rLatitude == '' || !isValidLongitude(rLatitude)){
			$('#frmpoiedittab_validation'+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude.</div>');
			$('#frmpoiedittab_validation'+iAppTabId).show();
			$('#rLatitudee'+iAppTabId).focus();
			return false;
		}else{
			$('#frmpoiedittab_validation'+iAppTabId).hide();
	}
	if(rLongitude == '' || !isValidLongitude(rLongitude)){
			$('#frmpoiedittab_validation'+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
			$('#frmpoiedittab_validation'+iAppTabId).show();
			$('#rLongitudee'+iAppTabId).focus();
			return false;
		}else{
			$('#frmpoiedittab_validation'+iAppTabId).hide();
	}

 	$("#frmpoiedittab_"+iAppTabId).submit(); 	
 }
 
 //aroundu listing delete
 function delete_aroundus(iGeninfoId,iAppTabId,iApplicationId,iFeatureId)
 {
	 var extra = '';
     show_loading();
    
    if($('#iApplicationId')){
        var iApplicationId = $('#iApplicationId').val();
        extra += '?iApplicationId='+iApplicationId;
    }
    
    if(iGeninfoId !=''){
        extra += '&iGeninfoId='+iGeninfoId;
    }
	
	if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
	
    var pars = extra;    
    var url = base_url+"app/aroundus_geninfo_delete";
    //console.log(url+pars);
    
    $.post(url+pars,
    function(data) {
		 if($('#aroundus_listing'+iAppTabId)){
			hide_loading();   
			$('#aroundus_listing'+iAppTabId).html(data);             
		 }
    });   
 }
 
 function edit_aroundus_detail(rGeninfoId,iAppTabId,iApplicationId,iFeatureId)
 {
	 	var extra = '';
     	show_loading();
    	
		if(iApplicationId != ''){
			extra += '?iApplicationId='+iApplicationId;
		}
		
		if(rGeninfoId !=''){
        	extra += '&rGeninfoId='+rGeninfoId;
		}
		
		if(iAppTabId !=''){
			extra += '&iAppTabId='+iAppTabId;
		}
		
		if(iFeatureId !=''){
			extra += '&iFeatureId='+iFeatureId;
		}
		
		var pars = extra;    
    	var url = base_url+"app/aroundus_edit_getaroundushtml";
		
		$.post(url+pars,
			function(data) {
				hide_loading();   
				$.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		}); 
 }

 function aroundus_category(iAppTabId)
{
	// validation of home page
	$("#frmaroundustab_"+iAppTabId).submit();
	
}

$('#arounduscategory,#mailchamppopup,#mailingcategory,#addmailingcategory').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
});
 
//function getip(json){
//  alert(json.ip); // alerts the ip address
//}
/*<script type="application/javascript" src="http://jsonip.appspot.com/?callback=getip">
</script>*/
 
/**
	Developer : Himanshu
	Date : 1/9/2014
	Description :Reservation
*/

function open_modal(mid)
{
	if(mid == 'basicModal4'){
		foo = document.getElementById("local_modal_id");
    	foo.setAttribute("onclick","return addlocation();");
	}
	$('#'+mid).modal('show');
	return false;
}
function open_modal2()
{
	$('#basicModal2').modal('show');
	return false;
}

/**
**/
function save_printer_details(iAppTabId,iApplicationId)
{
	var language = $('#language').val();
	var vPrinterTitle = $('#vPrinterTitle'+iAppTabId).val();
	var tPrinterEmail = $('#tPrinterEmail'+iAppTabId).val();
	var vLocation = $('#vLocation'+iAppTabId).val();

	if(language == 'rEnglish'){
		if (vPrinterTitle == '') {		
			$("#validationprinter"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black!important;" class="close" data-dismiss="alert">&times;</button>Please Enter Printer details.</div>');
			$("#validationprinter"+iAppTabId).show();
			$("#vPrinterTitle").focus();
			return false;
		}else{
			$("#validationprinter"+iAppTabId).hide();
	    }
	}else if(language == 'rFrench'){
		if (vPrinterTitle == '') {		
			$("#validationprinter"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black!important;" class="close" data-dismiss="alert">&times;</button>Entrer imprimeur Détails.</div>');
			$("#validationprinter"+iAppTabId).show();
			$("#vPrinterTitle").focus();
			return false;
		}else{
			$("#validationprinter"+iAppTabId).hide();
	    }
	}		
	// validation of printer page
	$("#frmprinter_"+iAppTabId).submit();
}

function edit_printer_details(iAppTabId,iApplicationId)
{
	
	// validation of printer page
	$("#frmprinteredit_"+iAppTabId).submit();
}

function delete_printerdetails(iPrintId,iApplicationId,iAppTabId,iFeatureId)
{
	var extra = '';
    if(iPrintId !=''){
        extra += '?iPrintId='+iPrintId;
    }
	if(iApplicationId !=''){
        extra += '?iApplicationId='+iApplicationId;
    }
	if(iAppTabId !=''){
        extra += '?iAppTabId='+iAppTabId;
    }
	if(iFeatureId !=''){
        extra += '?iFeatureId='+iFeatureId;
    }
	
	var pars = extra;    
    var url = base_url+"app/delete_printer_details";
	$.post(url+pars,
		function(data) {
			hide_loading();   
			$("#total_order").html(data);
	}); 
}


function edit_printerdetails(iPrintId,iAppTabId,iApplicationId)
{
	show_loading();
	
    var extra = '';
    if(iPrintId !=''){
        extra += '?iPrintId='+iPrintId;
    }
    if(iApplicationId !=''){
        extra += '&iApplicationId='+iApplicationId;
    }
	if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }
    
    var pars = extra;    
    var url = base_url+"app/geteditprinterhtml";
    // console.log(url+pars);
	
	$.post(url+pars,
    function(data) {
	  if($('#editprinterorder'+iAppTabId)){
         hide_loading();   
	//	 $('#editprinterorder'+iAppTabId).html(data); 
		 $.fancybox(data,{'overlayShow'	: true,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'margin' : '0',
				'padding' : '0',
				'width' : 800,
				'height' : 450,
				'scrolling' : 'no'});            
			}
     }); 
}

/*
	submit payment
*/
function submitpayment(iAppTabId,iFeatureId)
{
	var language = $('#language').val();
	var tAPIUserId = $('#tAPIUserId').val();
	var tAPIPassword = $('#tAPIPassword').val();
	var tAPISignature = $('#tAPISignature').val();
	var eStatus = $('#eStatus').val();
	if(language == 'rEnglish'){
		if (eStatus == '') {		
		$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Status.</div>');
		$("#addpayment_validation"+iAppTabId).show();
		$("#eStatus").focus();
		return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	    if (tAPIUserId == '') {		
			$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Name.</div>');
			$("#addpayment_validation"+iAppTabId).show();
			$("#tAPIUserId").focus();
			return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	    if (tAPIPassword == '') {		
			$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Password.</div>');
			$("#addpayment_validation"+iAppTabId).show();
			$("#tAPIPassword").focus();
			return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	    if (tAPISignature == '') {		
			$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Signature.</div>');
			$("#addpayment_validation"+iAppTabId).show();
			$("#tAPISignature").focus();
			return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	}else if(language == 'rFrench'){
		if (eStatus == '') {		
			$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Statut.</div>');
			$("#addpayment_validation"+iAppTabId).show();
			$("#eStatus").focus();
			return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	    if (tAPIUserId == '') {		
			$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
			$("#addpayment_validation"+iAppTabId).show();
			$("#tAPIUserId").focus();
			return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	    if (tAPIPassword == '') {		
			$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Mot de Passe.</div>');
			$("#addpayment_validation"+iAppTabId).show();
			$("#tAPIPassword").focus();
			return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	    if (tAPISignature == '') {		
			$("#addpayment_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Signature.</div>');
			$("#addpayment_validation"+iAppTabId).show();
			$("#tAPISignature").focus();
			return false;
		}else{
			$("#addpayment_validation"+iAppTabId).hide();
	    }
	}
	     
	$('#frmpayment_'+iAppTabId).ajaxSubmit(function(data) {									
    	   $.fancybox.close();
	 
    });
}



/** Menu Of The Day **/
function onmenuday(iItemId)
{
	/** menu of the day **/	
	var url = base_url+'app/menu_of_the_day_updated';
	var vDayMenu = document.getElementById('vDayMenu'+iItemId).checked;
	
	$.ajax({  
	  type: "POST",  
	  url: url,
	  data: "iItemId="+iItemId+"&vDayMenu="+vDayMenu,
	  success: function(resp){
		if(resp == 'successEnglish'){
		//	alert("Successfully Done !!!");
		}else if(resp == 'successFrench'){
		//	alert("Fait avec succès !!!");
		}
	  }  
	});
}

 /**
 	catalogue product
 **/
function add_size_catalogue_item(currency){
	var rowCount = $('#dyntable_size tr').length;
	$("#dyntable_size").last().append("<tr><td><input type='text' name='size[vSizeName"+rowCount+"]' id='vSizeName"+rowCount+"' /></td><td><input type='text' name='size[fPrice"+rowCount+"]' value='0.00' id='fPrice"+rowCount+"' /> "+currency+"</td><td colspan='2'><a class='button grey' onclick='delete_item_size_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}

function update_size_catalogue_item(currency){
	var rowCount = $('#dyntable_catalogue_size tr').length;
	$("#dyntable_catalogue_size").last().append("<tr><td><input type='text' name='size[vSizeName"+rowCount+"]' id='vSizeName"+rowCount+"' /></td><td><input type='text' name='size[fPrice"+rowCount+"]' value='0.00' id='fPrice"+rowCount+"' /> "+currency+"</td><td colspan='2'><a class='button grey' onclick='delete_item_size_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}

 /** Add Size menu Itemsf **/
 function add_size_menu_item(currency)
 {
	var rowCount = $('#dyntable_size tr').length;
	$("#dyntable_size").last().append("<tr><td><input type='text' name='size[vSizeName"+rowCount+"]' id='vSizeName"+rowCount+"' /></td><td><input type='text' name='size[fPrice"+rowCount+"]' value='0.00' id='fPrice"+rowCount+"' /> "+currency+"</td><td colspan='2'><a class='button grey' onclick='delete_item_size_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
 }

function edit_size_menu_item(currency){
	var rowCount = $('#dyntable_size tr').length;
	$("#dyntable_size").last().append("<tr><td><input type='text' name='size[vSizeName"+rowCount+"]' id='vSizeName"+rowCount+"' /></td><td><input type='text' name='size[fPrice"+rowCount+"]' value='0.00' id='fPrice"+rowCount+"' /> "+currency+"</td><td colspan='2'><a class='button grey' onclick='delete_item_size_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}

 function delete_row_size()
 {
	var current = window.event.srcElement;
	while ( (current = current.parentElement)  && current.tagName !="TR");
	current.parentElement.removeChild(current);
 } 

/**
	Add Option menu Items
**/
function add_option_menu_item(currency)
{
	var rowCount = $('#dyntable_option tr').length;
	$("#dyntable_option").last().append("<tr><td><input type='text' name='option[vOptName"+rowCount+"]' id='vOptName"+rowCount+"' /></td><td><input type='text' name='option[fCharge"+rowCount+"]' value='0.00' id='fCharge"+rowCount+"' /> "+currency+"</td><td><a class='button grey' onclick='delete_item_option_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}

function edit_option_menu_item(currency)
{
	var rowCount = $('#dyntable_option tr').length;
	$("#dyntable_option").last().append("<tr><td><input type='text' name='option[vOptName"+rowCount+"]' id='vOptName"+rowCount+"' /></td><td><input type='text' name='option[fCharge"+rowCount+"]' value='0.00' id='fCharge"+rowCount+"' /> "+currency+"</td><td><a class='button grey' onclick='delete_item_option_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}


function delete_row_size()
{
	var current = window.event.srcElement;
	//here we will delete the line
        while ( (current = current.parentElement)  && current.tagName !="TR");
	current.parentElement.removeChild(current);
} 

function delete_item_size_menu()
{
	var current = window.event.srcElement;
	//here we will delete the line
        while ( (current = current.parentElement)  && current.tagName !="TR");
	current.parentElement.removeChild(current);
} 

function delete_item_option_menu()
{
	var current = window.event.srcElement;
	//here we will delete the line
        while ( (current = current.parentElement)  && current.tagName !="TR");
	current.parentElement.removeChild(current);
} 


/**
	Date : 21-feb-2015
	Description : Catalogue Description
	Developer : Mayur Gajjar
**/
function edit_catalogue(iCatalogueId,iFeatureId,iAppTabId)
{
    show_loading();
    var name = 'tDescriptione'+iCatalogueId;
    var extra = '';

    if(iCatalogueId !=''){
        extra += '?iCatalogueId='+iCatalogueId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
 	if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditcataloguepopup";
    $.post(url+pars,
    function(data) {
	
	    	//Made Changes By Mayur
	    	if(data.length<=0)
	    	{
	    		$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
				var link = document.getElementById("alertHref");
				link.setAttribute('onclick', "location.reload()");			
		 		var link1 = document.getElementById("close");
				link1.setAttribute('onclick', "location.reload()");			
				hide_loading();
	    	}
    	   
		$(document).ready(function () 
		{	
			hide_loading();			
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		});

		var editor = CKEDITOR.instances[name];
		if (typeof editor === "undefined")
		{
			if (editor) { editor.destroy(true); }
		}
		 
             	/** ckeditor **/
	     	CKEDITOR.replace(name, {
	     		language: 'fr',	
				/*
				 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
				 */
				extraPlugins: 'htmlwriter',

				/*
				 * Style sheet for the contents
				 */
				contentsCss: 'body {color:#000; background-color#:FFF;}',

				/*
				 * Simple HTML5 doctype
				 */
				docType: '<!DOCTYPE HTML>',

				/*
				 * Core styles.
				 */
				coreStyles_bold: { element: 'b' },
				coreStyles_italic: { element: 'i' },
				coreStyles_underline: { element: 'u' },
				coreStyles_strike: { element: 'strike' },

				/*
				 * Font face.
				 */

				// Define the way font elements will be applied to the document.
				// The "font" element will be used.
				font_style: {
					element: 'font',
					attributes: { 'face': '#(family)' }
				},

				/*
				 * Font sizes.
				 */
				fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
				fontSize_style: {
					element: 'font',
					attributes: { 'size': '#(size)' }
				} ,

				/*
				 * Font colors.
				 */
				colorButton_enableMore: true,

				colorButton_foreStyle: {
					element: 'font',
					attributes: { 'color': '#(color)' }
				},

				colorButton_backStyle: {
					element: 'font',
					styles: { 'background-color': '#(color)' }
				},

				/*
				 * Styles combo.
				 */
				stylesSet: [
					{ name: 'Computer Code', element: 'code' },
					{ name: 'Keyboard Phrase', element: 'kbd' },
					{ name: 'Sample Text', element: 'samp' },
					{ name: 'Variable', element: 'var' },
					{ name: 'Deleted Text', element: 'del' },
					{ name: 'Inserted Text', element: 'ins' },
					{ name: 'Cited Work', element: 'cite' },
					{ name: 'Inline Quotation', element: 'q' }
				],

				on: { 'instanceReady': configureHtmlOutput },
				allowedContent: 'img[!src,alt,align,width,height]; font[face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
				allowedContent:true,
				toolbar:null
			});
	    	$('.wysihtmleditor5').wysihtml5();	  
    	});    
}


/** Arrival Details **/
function edit_arrival(iArrivalId,iFeatureId,iAppTabId,iApplicationId)
{
    show_loading();
    var name = 'tDescriptione'+iArrivalId;

    var extra = '';
    if(iArrivalId !=''){
        extra += '?iArrivalId='+iArrivalId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    if(iAppTabId !=''){
        extra += '&iAppTabId='+iAppTabId;
    }
    if(iApplicationId != ''){
        extra += '&iApplicationId='+iApplicationId;
    }

    var pars = extra;    
    var url = base_url+"app/showeditarrivalpopup";
    $.post(url+pars,
    function(data) {
	
	/** data length details **/
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
			exit();
    	}
    
	/** document details **/
        $(document).ready(function () {	
             hide_loading();			
		     $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	     });

	     var editor = CKEDITOR.instances[name];
	    /* if (typeof editor === "undefined"){
    		if (editor) { editor.destroy(true); }
	     }*/
	     CKEDITOR.replace(name, {
	     			language: 'fr',
					/*
					 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
					 */
					extraPlugins: 'htmlwriter',

					/*
					 * Style sheet for the contents
					 */
					contentsCss: 'body {color:#000; background-color#:FFF;}',

					/*
					 * Simple HTML5 doctype
					 */
					docType: '<!DOCTYPE HTML>',

					/*
					 * Core styles.
					 */
					coreStyles_bold: { element: 'b' },
					coreStyles_italic: { element: 'i' },
					coreStyles_underline: { element: 'u' },
					coreStyles_strike: { element: 'strike' },

					/*
					 * Font face.
					 */

					// Define the way font elements will be applied to the document.
					// The "font" element will be used.
					font_style: {
						element: 'font',
						attributes: { 'face': '#(family)' }
					},

					/*
					 * Font sizes.
					 */
					fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
					fontSize_style: {
						element: 'font',
						attributes: { 'size': '#(size)' }
					} ,

					/*
					 * Font colors.
					 */
					colorButton_enableMore: true,

					colorButton_foreStyle: {
						element: 'font',
						attributes: { 'color': '#(color)' }
					},

					colorButton_backStyle: {
						element: 'font',
						styles: { 'background-color': '#(color)' }
					},

					/*
					 * Styles combo.
					 */
					stylesSet: [
						{ name: 'Computer Code', element: 'code' },
						{ name: 'Keyboard Phrase', element: 'kbd' },
						{ name: 'Sample Text', element: 'samp' },
						{ name: 'Variable', element: 'var' },
						{ name: 'Deleted Text', element: 'del' },
						{ name: 'Inserted Text', element: 'ins' },
						{ name: 'Cited Work', element: 'cite' },
						{ name: 'Inline Quotation', element: 'q' }
					],

					on: { 'instanceReady': configureHtmlOutput },
					allowedContent: 'img[!src,alt,align,width,height]; font[face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
					allowedContent:true,
					toolbar:null
				});

	    	$('.gcp').colorpicker().on('changeColor', function(ev){
		    var cval = ev.color.toHex();
		    $(this).val(ev.color.toHex());
		    $(this).css('background',cval);
		    bodyStyle.backgroundColor = ev.color.toHex();
		})
       	});
}

/** delete catalogue details **/
function delete_catalogue_details(iCatelogueId,iAppTabId)
{
	    var extra = '';
	    show_loading();
	    
	    if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iCatelogueId !=''){
		extra += '&iCatelogueId='+iCatelogueId;
		
	    }
	    if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
		
	    }

	    var pars = extra;    
	    var url = base_url+"app/catalogue_delete";
	    $.post(url+pars,
	    function(data) {
	     if($('#catalogue_listing'+iAppTabId)){
		 hide_loading();   
		$('#catalogue_listing'+iAppTabId).html(data);
		     
	     }
    });   
}


/** delete arrival details **/
function delete_arrival_details(iArrivalId,iAppTabId)
{	
 	    var extra = '';
	    show_loading();
	    
	    if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iArrivalId !=''){
		extra += '&iArrivalId='+iArrivalId;
		
	    }
	    if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
		
	    }

	    var pars = extra;    
	    var url = base_url+"app/arrival_delete";
	    $.post(url+pars,
	    function(data) {
	     if($('#arrival_listing'+iAppTabId)){
		 hide_loading();   
		$('#arrival_listing'+iAppTabId).html(data);
		     
	     }
    });   
}


/**
	Submit promotion Details
	Date : 20-Feb-2015
	Description : Promotion Details
**/
function submitpromotiondetails(iAppTabId,iFeatureId)
{
	/** submit promotion details **/
	var vTitle = $("#vTitle"+iAppTabId).val();
	var language = $('#language').val();
	var tDescription = $("#tDescription"+iAppTabId).val();
	var vImage = $("#vImage"+iAppTabId).val();
	var tStartDate = $('#tStartDate'+iAppTabId).val();	
	var tEndDate = $('#tEndDate'+iAppTabId).val();	
	var tStartTime = $('#tStartTime'+iAppTabId).val();	
	var tEndTime = $('#tEndTime'+iAppTabId).val();	
	var a = vImage.substring(vImage.lastIndexOf('.') + 1).toLowerCase();

	if(language == 'rEnglish'){
		/** validation **/
		if (vTitle=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Title.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#vTitle"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tStartDate=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tStartDate"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tEndDate=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tEndDate"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tStartTime=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start time.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tStartTime"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tEndTime=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tEndTime"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (vImage=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select image.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#vImage"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}


		if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG' || a == '' )
		{}else{
			$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
			$("#addwebsite_validation"+iAppTabId).show();
			$("#vWebImage").val('');
			$("#vWebImage").focus();
			return false;
		}
	}else if(language == 'rFrench'){
		/** validation **/
		if (vTitle=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Titre.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#vTitle"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tStartDate=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tStartDate"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tEndDate=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end date.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tEndDate"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tStartTime=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start time.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tStartTime"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (tEndTime=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#tEndTime"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}

		if (vImage=='') {		
			$("#addpromotion_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select image.</div>');
			$("#addpromotion_validation"+iAppTabId).show();
			$("#vImage"+iAppTabId).focus();
			return false;
		}else{
			$("#addpromotion_validation"+iAppTabId).hide();
		}


		if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG'||a == 'png' ||a == 'PNG' || a == '' )
		{}else{
			$("#addwebsite_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please upload only Image (gif,jpg,jpeg) files.</div>');
			$("#addwebsite_validation"+iAppTabId).show();
			$("#vWebImage").val('');
			$("#vWebImage").focus();
			return false;
		}
	}

	/** Ajax submit **/
	$('#frmpromotion_'+iAppTabId).ajaxSubmit(function(data) {
	   $.fancybox.close();
	   var extra = '';
	   show_loading();
	   if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	
	   }
	   if(iAppTabId){
		extra += '&iAppTabId='+iAppTabId;
	   }
	   if(iFeatureId){
		extra += '&iFeatureId='+iFeatureId;
	   }             
	   
	    var pars = extra;    
	    var url = base_url+"app/appwisepromotionlisting";
	    console.log(data);
	    $.post(url+pars,
	    function(data) {
	     if($('#promotion_listing'+iAppTabId)){
		$('#loading').delay(100).trigger('reveal:close');   
		$('#promotion_listing'+iAppTabId).html(data);             
	     }
	    });   
	}); 
	/** End Submit **/
}


/** delete review details **/
function delete_review_details(iReviewId,$iAppTabId)
{
	var extra = '';
	show_loading();

	if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	}

	if(iReviewId !=''){
		extra += '&iReviewId='+iReviewId;
	}
	if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
	}

	var pars = extra;    
	var url = base_url+"app/review_delete";
	$.post(url+pars,
	function(data) {
		if($('#review_listing'+iAppTabId))
		{
			hide_loading();   
			$('#review_listing'+iAppTabId).html(data);
		}
	});   
}

/** delete promotion details **/
function delete_promotion_details(iPromotionsId,iAppTabId)
{
	    var extra = '';
	    show_loading();
		
	    if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iPromotionsId !=''){
		extra += '&iPromotionsId='+iPromotionsId;
		
	    }
	    if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
		
	    }

	    var pars = extra;    
	    var url = base_url+"app/promotion_delete";
	    $.post(url+pars,
	    function(data) {
	     	if($('#promotion_listing'+iAppTabId))
			{
				hide_loading();   
				$('#promotion_listing'+iAppTabId).html(data);
			}
    		});   
	}

	/** edit promotion **/
	function edit_promotion(iPromotionsId,iFeatureId,iAppTabId)
	{
	    show_loading();
	    var name = 'tDescriptione'	;
   	    var extra = '';

	    if(iPromotionsId !=''){
		extra += '?iPromotionsId='+iPromotionsId;
	    }
	    if(iFeatureId !=''){
		extra += '&iFeatureId='+iFeatureId;
	    }

	    var pars = extra;    
	    var url = base_url+"app/showeditpromotionpopup";
	    //console.log(url+pars);
	    //alert(url+pars);
	    $.post(url+pars,
	    function(data) 
	    {
	    	if(data.length<=0)
	    	{
	    		$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
		}
    	
        	$(document).ready(function () {	
        		hide_loading();			
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no',beforeShow: function(){$(".gcp").colorpicker({});}});
	    	});
	     
		var editor = CKEDITOR.instances[name];
	     	if (typeof editor === "undefined"){
    		if (editor) { editor.destroy(true); }
	     	}
	     		CKEDITOR.replace(name, {
	     			language: 'fr',	
					/*
					 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
					 */
					extraPlugins: 'htmlwriter',

					/*
					 * Style sheet for the contents
					 */
					contentsCss: 'body {color:#000; background-color#:FFF;}',

					/*
					 * Simple HTML5 doctype
					 */
					docType: '<!DOCTYPE HTML>',

					/*
					 * Core styles.
					 */
					coreStyles_bold: { element: 'b' },
					coreStyles_italic: { element: 'i' },
					coreStyles_underline: { element: 'u' },
					coreStyles_strike: { element: 'strike' },

					/*
					 * Font face.
					 */
					// The "font" element will be used.
					font_style: {
						element: 'font',
						attributes: { 'face': '#(family)' }
					},

					/*
					 * Font sizes.
					 */
					fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
					fontSize_style: {
						element: 'font',
						attributes: { 'size': '#(size)' }
					} ,

					/*
					 * Font colors.
					 */
					colorButton_enableMore: true,

					colorButton_foreStyle: {
						element: 'font',
						attributes: { 'color': '#(color)' }
					},

					colorButton_backStyle: {
						element: 'font',
						styles: { 'background-color': '#(color)' }
					},

					/*
					 * Styles combo.
					 */
					stylesSet: [
						{ name: 'Computer Code', element: 'code' },
						{ name: 'Keyboard Phrase', element: 'kbd' },
						{ name: 'Sample Text', element: 'samp' },
						{ name: 'Variable', element: 'var' },
						{ name: 'Deleted Text', element: 'del' },
						{ name: 'Inserted Text', element: 'ins' },
						{ name: 'Cited Work', element: 'cite' },
						{ name: 'Inline Quotation', element: 'q' }
					],

					on: { 'instanceReady': configureHtmlOutput },
					allowedContent: 'img[!src,alt,align,width,height]; font[face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
					allowedContent:true,
					toolbar:null
				});

		$('.eventd').datepicker({
        	             format: "yyyy-mm-dd",
              startDate: "0d",
              autoclose: true,
              orientation: "top left",
              todayHighlight: true,
              language: "fr"	

        	});
        $('.eventtime').timepicker({showMeridian: false});
        $('.wysihtmleditor5').wysihtml5();	  
    }); 
}


/** service timing slider **/


$("#slider-timerange-monday").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [600, 720],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }


	$('#time_range_monday_start').val(hours1 + ':' + minutes1);
        $('.slider-time-monday').html(hours1 + ':' + minutes1);

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

	$('#time_range_monday_end').val(hours2 + ':' + minutes2);
        $('.slider-time2-monday').html(hours2 + ':' + minutes2);
    }
});

function isPriceKey(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }

/** service add **/
function submitservicedetails(iAppTabId,iFeatureId)
{
	/** submit promotion details **/
	var vServiceName = $("#vServiceName"+iAppTabId).val();
	var tDescription = $("#tDescription"+iAppTabId).val();
	var vServicePrice = $('#vServicePrice'+iAppTabId).val();
	var vMaxService = $('#vMaxService'+iAppTabId).val();
	var vDuration = $('#vDuration'+iAppTabId).val();
	var tStartTime = $('#tStartTime'+iAppTabId).val();	
	var tEndTime = $('#tEndTime'+iAppTabId).val();	
	var vServiceTiming = $('#vServiceTiming'+iAppTabId).val();
	var vCurrency = $('#vCurrency'+iAppTabId).val();	
	var language =$("#language").val();

	if(language == 'rEnglish'){
		/** validation **/
		if (vServiceName=='') {		
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Service.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vServiceName"+iAppTabId).focus();
			return false;
		}else{
			$("#addservice_validation"+iAppTabId).hide();
		}

		if(vCurrency == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Currency.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vCurrency"+iAppTabId).focus();
			return false;
		}else{
			$("#addservice_validation"+iAppTabId).hide();
		}
		
		if (vServicePrice==''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Price.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vServicePrice"+iAppTabId).focus();
			return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(vDuration == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Duration.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vDuration"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}	

		if(vMaxService == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter MaxService.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vMaxService"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(vServiceTiming == 'null'){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Select Service Timing.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vServiceTiming"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(tStartTime == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Start Time.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#tStartTime"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(tEndTime == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter End Time.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#tEndTime"+iAppTabId).focus();return false;
		}else{
			$("#addservice_validation"+iAppTabId).focus();
		}	
	}else if(language == 'rFrench'){
		/** validation **/
		if (vServiceName=='') {		
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Service.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vServiceName"+iAppTabId).focus();
			return false;
		}else{
			$("#addservice_validation"+iAppTabId).hide();
		}

		if(vCurrency == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Choisir la devise.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vCurrency"+iAppTabId).focus();
			return false;
		}else{
			$("#addservice_validation"+iAppTabId).hide();
		}
		
		if (vServicePrice==''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Prix.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vServicePrice"+iAppTabId).focus();
			return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(vDuration == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Durée.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vDuration"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}	

		if(vMaxService == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît Entrez MaxService.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vMaxService"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(vServiceTiming == 'null'){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Se il vous plaît Sélectionnez Timing service.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#vServiceTiming"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(tStartTime == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez l`heure de début.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#tStartTime"+iAppTabId).focus();return false;
		}else{
			$('#addservice_validation'+iAppTabId).hide();
		}

		if(tEndTime == ''){
			$("#addservice_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>sélectionnez l`heure de fin.</div>');
			$("#addservice_validation"+iAppTabId).show();
			$("#tEndTime"+iAppTabId).focus();return false;
		}else{
			$("#addservice_validation"+iAppTabId).focus();
		}	
	}
	
	/** Ajax submit **/
	$('#frmservice_'+iAppTabId).ajaxSubmit(function(data) 
	{
		   $.fancybox.close();
		   var extra = '';
		   show_loading();
		   if($('#iApplicationId')){
			var iApplicationId = $('#iApplicationId').val();
			extra += '?iApplicationId='+iApplicationId;	
		   }
		   if(iAppTabId){
			extra += '&iAppTabId='+iAppTabId;
		   }
		   if(iFeatureId){
			extra += '&iFeatureId='+iFeatureId;
		   }             
		   
		   /*
		   		Loading Service
		   */
		   var pars = extra;    
		   var url = base_url+"app/appwiseservicelisting";
		   $.post(url+pars,
		   function(data) {
		   		if($('#service_listing'+iAppTabId)){
	                $('#loading').delay(100).trigger('reveal:close');   
	                $.fancybox.close();  
	                $('#service_listing'+iAppTabId).html(data); 
	                window.location.reload();
	            }
		    });   
		}); 
		/** End Submit **/
}

/** delete testomonial **/
function delete_testomonial_details(iTestomonialId,iAppTabId)
{
	    var extra = '';
	    show_loading();
		
	    if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iTestomonialId !=''){
		extra += '&iTestomonialId='+iTestomonialId;
		
	    }
	    if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
		
	    }

	    var pars = extra;    
	    var url = base_url+"app/testomonial_delete";
	    $.post(url+pars,
	    function(data) {
	     if($('#testonomialformid'+iAppTabId))
		{
			hide_loading();   
			$('#testonomialformid'+iAppTabId).html(data);
	        }
    });   
}

/** show testomonial **/
function show_testomonial(iTestonomialId,loop)
{
	/** menu of the day **/	
	var url = base_url+'app/testomonial_details';
	var str = document.getElementById("testomonial"+loop).checked;

	$.ajax({  
	  type: "POST",  
	  url: url,
	  data: "str="+str+"&iTestonomialId="+iTestonomialId,
	  success: function(resp){
		 if(resp == 'Success'){
			alert("Successfully Done !!!");
		 }
	  }  
	});
}


/** ticket information **/
function submitticketdetails(iAppTabId,iFeatureId)
{
	/** submit promotion details **/
	var iTicketType = $("#iTicketType"+iAppTabId).val();
	var iTotalTicket = $("#iTotalTicket"+iAppTabId).val();
	var vShowDate = $("#vShowDate"+iAppTabId).val();
	var vShowTiming = $('#vShowTiming'+iAppTabId).val();	
	var fTicketPrice = $('#fTicketPrice'+iAppTabId).val();	
	
	/** validation **/
	if (iTicketType=='') {		
		$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Ticket Type.</div>');
		$("#addticket_validation"+iAppTabId).show();
		$("#iTicketType"+iAppTabId).focus();
		return false;
	}else{
		$("#addticket_validation"+iAppTabId).hide();
	}

	if (iTotalTicket=='') {		
		$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
		$("#addticket_validation"+iAppTabId).show();
		$("#iTotalTicket"+iAppTabId).focus();
		return false;
	}else{
		$("#addticket_validation"+iAppTabId).hide();
	}

	if (vShowDate=='') {		
		$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Date.</div>');
		$("#addticket_validation"+iAppTabId).show();
		$("#vShowDate"+iAppTabId).focus();
		return false;
	}else{
		$("#addticket_validation"+iAppTabId).hide();
	}

	if (vShowTiming=='') {		
		$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Time.</div>');
		$("#addticket_validation"+iAppTabId).show();
		$("#vShowTiming"+iAppTabId).focus();
		return false;
	}else{
		$("#addticket_validation"+iAppTabId).hide();
	}

	if (fTicketPrice=='') {		
		$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time.</div>');
		$("#addticket_validation"+iAppTabId).show();
		$("#addticket"+iAppTabId).focus();
		return false;
	}else{
		$("#addticket_validation"+iAppTabId).hide();
	}

	/** Ajax submit **/
	$('#frmticket_'+iAppTabId).ajaxSubmit(function(data) {
	   $.fancybox.close();
	   var extra = '';
	   show_loading();
	   if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	
	   }
	   if(iAppTabId){
		extra += '&iAppTabId='+iAppTabId;
	   }
	   if(iFeatureId){
		extra += '&iFeatureId='+iFeatureId;
	   }             
	   
	    var pars = extra;    
	    var url = base_url+"app/appwiseticketlisting";
	    console.log(data);
	    $.post(url+pars,
	    function(data) {
	     if($('#ticket_listing'+iAppTabId)){
		$('#loading').delay(100).trigger('reveal:close');   
		$('#ticket_listing'+iAppTabId).html(data);             
	     }
	    });   
	}); 
	/** End Submit **/
}


function delete_ticket_details(iTicketId,iAppTabId)
{
	    var extra = '';
	    show_loading();
		
	    if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iTicketId !=''){
		extra += '&iTicketId='+iTicketId;
		
	    }
	    if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
		
	    }

	    var pars = extra;    
	    var url = base_url+"app/ticket_delete";
	    $.post(url+pars,
	    function(data) {
	     if($('#ticketformid'+iAppTabId))
		{
			hide_loading();   
			$('#ticketformid'+iAppTabId).html(data);
	    }
    });   
}

/** update catalogue **/
function updatecatalogue(iCatalogueId,iAppTabId,iCatalogueSubId)
{
		var vCatalogueTagname = $('#vCatalogueTagname').val();
		var tTotalProduct = $('#tTotalProduct').val();
		var iApplicationId = $('#iApplicationId').val();
		var vCurrency = $('#vCurrency').val();

		if(vCatalogueTagname == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
			$('#editmenuitem_validation').show();
			$('#vCatalogueTagname').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}
		/*if(tTotalProduct == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter variant.</div>');
			$('#editmenuitem_validation').show();
			$('#tTotalProduct').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}*/
		if(vCurrency == ''){
			$('#editmenuitem_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
			$('#editmenuitem_validation').show();
			$('#vCurrency').focus();
			return false;
		}else{
			$('#editmenuitem_validation').hide();
		}
		
		$("#updatefrmitem").ajaxSubmit(function(data) {
			/*alert(data);*/
			   $("input:text").val("");
			   $.fancybox.close();
	           var extra = '';
	           show_loading();
	           if(iApplicationId){
	                extra += '?iApplicationId='+iApplicationId;
	           }
	           if(iAppTabId){
	                extra += '&iAppTabId='+iAppTabId;
	           }
	           if(iCatalogueSubId){
	                extra += '&iCatalogueSubId='+iCatalogueSubId;
	           }             
	           
	            var pars = extra;    
	            var url = base_url+"app/showcatalogueproductlisting";
	           // console.log(data);
	            $.post(url+pars,
	            function(data) {
	            	hide_loading();
		             $(document).ready(function () {				
					    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
				    });
	            });   
	    });  
}

	/** update ticket info **/
	function updateticketdetails(iAppTabId,iFeatureId)
	{
		/** submit promotion details **/
		var iTicketType = $("#iTicketType"+iAppTabId).val();
		var iTotalTicket = $("#iTotalTicket"+iAppTabId).val();
		var vShowDate = $("#vShowDate"+iAppTabId).val();
		var vShowTiming = $('#vShowTiming'+iAppTabId).val();	
		var fTicketPrice = $('#fTicketPrice'+iAppTabId).val();	
	
		/** validation **/
		if (iTicketType=='') {		
			$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please Enter Ticket Type.</div>');
			$("#addticket_validation"+iAppTabId).show();
			$("#iTicketType"+iAppTabId).focus();
			return false;
		}else{
			$("#addticket_validation"+iAppTabId).hide();
		}

		if (iTotalTicket=='') {		
			$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select start date.</div>');
			$("#addticket_validation"+iAppTabId).show();
			$("#iTotalTicket"+iAppTabId).focus();
			return false;
		}else{
			$("#addticket_validation"+iAppTabId).hide();
		}

		if (vShowDate=='') {		
			$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Date.</div>');
			$("#addticket_validation"+iAppTabId).show();
			$("#vShowDate"+iAppTabId).focus();
			return false;
		}else{
			$("#addticket_validation"+iAppTabId).hide();
		}

		if (vShowTiming=='') {		
			$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select Time.</div>');
			$("#addticket_validation"+iAppTabId).show();
			$("#vShowTiming"+iAppTabId).focus();
			return false;
		}else{
			$("#addticket_validation"+iAppTabId).hide();
		}

		if (fTicketPrice=='') {		
			$("#addticket_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please select end time.</div>');
			$("#addticket_validation"+iAppTabId).show();
			$("#addticket"+iAppTabId).focus();
			return false;
		}else{
			$("#addticket_validation"+iAppTabId).hide();
		}

		/** Ajax submit **/
		$('#frmticket_'+iAppTabId).ajaxSubmit(function(data) {
		   $.fancybox.close();
		   var extra = '';
		   show_loading();

		   if($('#iApplicationId')){
			var iApplicationId = $('#iApplicationId').val();
			extra += '?iApplicationId='+iApplicationId;
	
		   }

		   if(iAppTabId){
			extra += '&iAppTabId='+iAppTabId;
		   }

		   if(iFeatureId){
			extra += '&iFeatureId='+iFeatureId;
		   }             
		   
		    var pars = extra;    
		    var url = base_url+"app/appwiseticketlisting";
		    console.log(data);
		    $.post(url+pars,
		    function(data) {
		     if($('#ticket_listing'+iAppTabId)){
			$('#loading').delay(100).trigger('reveal:close');   
			$('#ticket_listing'+iAppTabId).html(data);             
		     }
		    });   
		}); 
		/** End Submit **/
	}

function submitblog(iAppTabId,iFeatureId)
{
	    var vBlogTitle = $("#vBlogTitle"+iAppTabId).val();
	    var vBlogUrl = $("#vBlogUrl"+iAppTabId).val();
	
	    if (vBlogTitle=='') {		
		$("#addblog_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Blog Title.</div>');
		$("#addblog_validation"+iAppTabId).show();
		$("#vBlogTitle"+iAppTabId).focus();
		return false;
	
	    }else{
			$("#addwebsite_validation"+iAppTabId).hide();
	    }

	    if (vBlogUrl=='') {		
			$("#addblog_validation"+iAppTabId).html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Blog url.</div>');
			$("#addblog_validation"+iAppTabId).show();
			$("#vBlogUrl"+iAppTabId).focus();
			return false;
	
	    }else{
			$("#addwebsite_validation"+iAppTabId).hide();
	    }
    

    	$('#frmblog_'+iAppTabId).ajaxSubmit(function(data) {
	   $.fancybox.close();
           var extra = '';
           show_loading();
           if($('#iApplicationId')){
                var iApplicationId = $('#iApplicationId').val();
                extra += '?iApplicationId='+iApplicationId;
                
           }
           if(iAppTabId){
                extra += '&iAppTabId='+iAppTabId;
           }
           if(iFeatureId){
                extra += '&iFeatureId='+iFeatureId;
           }             
           
            var pars = extra;    
            var url = base_url+"app/appwisebloglisting";
           // console.log(data);
            $.post(url+pars,
            function(data) {

             if($('#blog_listing'+iAppTabId)){
                $('#loading').delay(100).trigger('reveal:close');   
                $('#blog_listing'+iAppTabId).html(data);             
             	}
            });   
    });   
  } 


/** blog edit details **/

function edit_blog(iBlogId,iFeatureId)
{
    var extra = '';
    if(iBlogId !=''){
        extra += '?iBlogId='+iBlogId;
    }
    if(iFeatureId !=''){
        extra += '&iFeatureId='+iFeatureId;
    }
    
    var pars = extra;    
    var url = base_url+"app/showeditblogpopup";
    //console.log(url+pars);
    //alert(url+pars);
    $.post(url+pars,
    function(data) {
        //Made Changes By Sagar On Date : 7-6-2014
    	if(data.length<=0)
    	{
    		$("#deletealert").modal('show');
    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
    	}
    	//End Sagar Code 
        $(document).ready(function () {				
		    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	    });
    });   
}

/** blog delete details **/
function delete_blog(iBlogId,iAppTabId)
{
	var extra = '';
	show_loading();
	    
	    if($('#iApplicationId')){
			var iApplicationId = $('#iApplicationId').val();
			extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iBlogId !=''){
		extra += '&iBlogId='+iBlogId;
	    }
	    var pars = extra;    
	    var url = base_url+"app/blog_delete";
	    $.post(url+pars,
	    function(data) {
	     if($('#blog_listing'+iAppTabId)){
		 hide_loading();   
		$('#blog_listing'+iAppTabId).html(data);
	     }
	}); 	
}


/** edit service details **/
function edit_service(iServiceId,iFeatureId,iAppTabId)
{
		show_loading();
	    var name = 'tDescriptione'+iServiceId	;
   	    var extra = '';

	    if(iServiceId !=''){
		extra += '?iServiceId='+iServiceId;
	    }
	    if(iFeatureId !=''){
		extra += '&iFeatureId='+iFeatureId;
	    }
		if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
	    }

	    var pars = extra;    
	    var url = base_url+"app/showeditservicepopup";
	    //console.log(url+pars);
	    //alert(url+pars);
	    $.post(url+pars,
	    function(data) 
	    {
	    	if(data.length<=0)
	    	{
	    		$("#deletealert").modal('show');
	    		$("#deleteMessage").html('The tab which you are trying to access has been already deleted.');
			var link = document.getElementById("alertHref");
			link.setAttribute('onclick', "location.reload()");			
	 		var link1 = document.getElementById("close");
			link1.setAttribute('onclick', "location.reload()");			
			hide_loading();
		}
    	
        	$(document).ready(function () {	
        		hide_loading();			
			    $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no',beforeShow: function(){$(".gcp").colorpicker({});}});
	    	});
	     
		var editor = CKEDITOR.instances[name];
	     	if (typeof editor === "undefined"){
    		if (editor) { editor.destroy(true); }
	     	}
	     		CKEDITOR.replace(name, {
	     			language: 'fr',
					/*
					 * Ensure that htmlwriter plugin, which is required for this sample, is loaded.
					 */
					extraPlugins: 'htmlwriter',

					/*
					 * Style sheet for the contents
					 */
					contentsCss: 'body {color:#000; background-color#:FFF;}',

					/*
					 * Simple HTML5 doctype
					 */
					docType: '<!DOCTYPE HTML>',

					/*
					 * Core styles.
					 */
					coreStyles_bold: { element: 'b' },
					coreStyles_italic: { element: 'i' },
					coreStyles_underline: { element: 'u' },
					coreStyles_strike: { element: 'strike' },

					/*
					 * Font face.
					 */
					// The "font" element will be used.
					font_style: {
						element: 'font',
						attributes: { 'face': '#(family)' }
					},

					/*
					 * Font sizes.
					 */
					fontSize_sizes: 'xx-small/1;x-small/2;small/3;medium/4;large/5;x-large/6;xx-large/7',
					fontSize_style: {
						element: 'font',
						attributes: { 'size': '#(size)' }
					} ,

					/*
					 * Font colors.
					 */
					colorButton_enableMore: true,

					colorButton_foreStyle: {
						element: 'font',
						attributes: { 'color': '#(color)' }
					},

					colorButton_backStyle: {
						element: 'font',
						styles: { 'background-color': '#(color)' }
					},

					/*
					 * Styles combo.
					 */
					stylesSet: [
						{ name: 'Computer Code', element: 'code' },
						{ name: 'Keyboard Phrase', element: 'kbd' },
						{ name: 'Sample Text', element: 'samp' },
						{ name: 'Variable', element: 'var' },
						{ name: 'Deleted Text', element: 'del' },
						{ name: 'Inserted Text', element: 'ins' },
						{ name: 'Cited Work', element: 'cite' },
						{ name: 'Inline Quotation', element: 'q' }
					],

					on: { 'instanceReady': configureHtmlOutput },
					allowedContent: 'img[!src,alt,align,width,height]; font[face]; font[!family]; font[!color]; font[!size]; font{!background-color}; a[!href]; a[!name]',
					allowedContent:true,
					toolbar:null
				});
		$('.eventtime').timepicker({showMeridian: false});
		$('.wysihtmleditor5').wysihtml5();	  
	    }); 
	}

/**
	service update
**/
/*function updateservice(iAppTabId,iFeatureId)
{*/
function updateservice_test(iAppTabId,iServiceId,iFeatureId)
{
	   $('#frmeditservice_'+iAppTabId).ajaxSubmit(function(data) {
		   $.fancybox.close();
		   var extra = '';
		   show_loading();
		   if($('#iApplicationId')){
			var iApplicationId = $('#iApplicationId').val();
			extra += '?iApplicationId='+iApplicationId;	
		   }
		   if(iAppTabId){
			extra += '&iAppTabId='+iAppTabId;
		   }
		   if(iFeatureId){
			extra += '&iFeatureId='+iFeatureId;
		   }              
		   
		    var pars = extra;    
		    var url = base_url+"app/appwiseservicelisting";
		    //console.log(data);
		    $.post(url+pars,
		    function(data) {
		    if($('#service_listing'+iAppTabId)){
				$('#loading').delay(100).trigger('reveal:close');   
				$('#service_listing'+iAppTabId).html(data);   
				window.location.reload();          
		    }
	    });   
	});    
}

/**
service details
**/
function delete_service_details(iServiceId,iAppTabId,iApplicationId)
{
	    var extra = '';
	    show_loading();
		
	   if($('#iApplicationId')){
		var iApplicationId = $('#iApplicationId').val();
		extra += '?iApplicationId='+iApplicationId;
	    }
	    
	    if(iServiceId !=''){
		extra += '&iServiceId='+iServiceId;
		
	    }
	    if(iAppTabId !=''){
		extra += '&iAppTabId='+iAppTabId;
		
	    }
	    var pars = extra;    
	    var url = base_url+"app/service_delete";
	    $.post(url+pars,
	    function(data) {
	     	if($('#service_listing'+iAppTabId))
			{
				hide_loading();   
				$('#service_listing'+iAppTabId).html(data);
				window.location.reload();
			}
    		});   
}

function check_service_days(){
//	alert("TEST");
	if($('#serv_select_all').is(':checked')){
		$("#service_working_days_check input[type='checkbox']").attr ( 'checked' , true );
	}
	else{
		$("#service_working_days_check input[type='checkbox']").attr ( 'checked' , false );
	}
}

//-- New Functions --- 
//function for adding/editing multiple sizes for e-commerce
function add_size_catalogue_item_new(currency, type){
	if(type === "edit"){
		var trId = 'dyntable_catalogue_size';
	}
	else{
		var trId = 'dyntable_size';
	}
	var rowCount = ($('#'+trId+' tr').length-1);
	$("#"+trId).last().append("<tr><td><input type='text' name='size[vSizeName"+rowCount+"]' id='vSizeName"+rowCount+"' /></td><td><input type='text' name='size[fSizePrice"+rowCount+"]' value='0.00' id='fSizePrice"+rowCount+"' onkeypress='return isPriceKey(event);' /> "+currency+"</td><td colspan='2'><a class='button grey' onclick='delete_item_size_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}

//function for add/edit multiple options for e-commerce
function edit_option_menu_item_new(currency){
	var rowCount = ($('#dyntable_option tr').length-1);
	$("#dyntable_option").last().append("<tr><td><input type='text' name='option[vOptionName"+rowCount+"]' id='vOptionName"+rowCount+"' /></td><td><input type='text' name='option[fOptionPrice"+rowCount+"]' value='0.00' id='fOptionPrice"+rowCount+"' onkeypress='return isPriceKey(event);' /> "+currency+"</td><td><a class='button grey' onclick='delete_item_option_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}

//function for add/edit multiple sizes for restaurant
function add_size_menu_item_new(currency, type)
 {
 	if(type === "edit"){
		var trId = 'dyntable_size';
	}
	else{
		var trId = 'dyntable_size';
	}
	var rowCount = ($('#'+trId+' tr').length-1);
	$("#"+trId).last().append("<tr><td><input type='text' name='size[vSizeName"+rowCount+"]' id='vSizeName"+rowCount+"' /></td><td><input type='text' name='size[fPrice"+rowCount+"]' value='0.00' id='fPrice"+rowCount+"' onkeypress='return isPriceKey(event);' /> "+currency+"</td><td colspan='2'><a class='button grey' onclick='delete_item_size_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
 }
 
 //function for add/edit options for restaurant
 function add_option_menu_item_new(currency)
{
	var rowCount = ($('#dyntable_option tr').length-1);
	$("#dyntable_option").last().append("<tr><td><input type='text' name='option[vOptName"+rowCount+"]' id='vOptName"+rowCount+"' /></td><td><input type='text' name='option[fCharge"+rowCount+"]' value='0.00' id='fCharge"+rowCount+"' onkeypress='return isPriceKey(event);' /> "+currency+"</td><td><a class='button grey' onclick='delete_item_option_menu();' style='cursor:pointer;'><i class='icon-trash itemdel helper-font-24' title='' aria-describedby='ui-tooltip-0'></i></a></td></tr>");
}

//function for delete image
function deleteImage(imgId, tblName, folderPath, appId, imageFld, imgIdField, tagId){
	var url = base_url+"app/deleteImage/"+imgId+"?tblname="+tblName+"&folderPath="+folderPath+"&appId="+appId+"&imgField="+imageFld+"&imgIdField="+imgIdField;
    $.post(url,
	  function(data) {
	  	try{
	  		var res = JSON.parse(data);
	  		if(res.success === true){
	  			$("#"+tagId)[0].src = '';
	  			if(tagId != "qrtabheadimg"){
	  				$("#"+tagId).parent().find('a').hide();
	  			}
	  			else{
	  				$('#qrtabheadimgbtn').hide();
	  			}
	  		}
	  	}
	  	catch(e){
	  		console.log(e);
	  	}
	  }
	);
	}
	
//function for close and reset form
function closeResetPopup(formId, imgId){
	$('#'+formId).resetForm();
	$('#'+imgId)[0].src = "";
	$('#'+imgId)[0].setAttribute('style', "");
	$.fancybox.close();
}

//function for opening popup
function open_popup(popup_div_id,infoId)
{
	if (document.getElementById)
	{
		obj = document.getElementById(popup_div_id);
		if (obj.style.display == "none")
		{
			obj.style.display = "block";
			if(infoId>0)
			{
				$("form[name=frminfotabEdit]")[0].reset();
				$("[name=editAppTabId]")[0].value=$.session.get("curTabId").split('_')[1];
				var url = base_url+"app/getEditFormForInfo?infoId="+infoId;
				$.post(url,
					function(data)
					{
						try
						{
							var res = JSON.parse(data);
							if(typeof res[0].iApplicationId != 'undefined' )
							{
								//-- put response data in popup
								$("[name=editInfotabId]")[0].value=res[0].iInfotabId;
								$("[name=editTitle]")[0].value=res[0].vTitle;
								CKEDITOR.instances.editDescription.setData(res[0].tDescription);
								$("[name=editStatus]")[0].value=res[0].eStatus;
								$("#editInfoPopupTitle")[0].innerHTML=res.title;
								$("#editInfoPopupUpdateBtn")[0].innerHTML="<i class='icon-ok'></i> "+res.infoBtn;
							}
						}
						catch(e)
						{
							console.log(e);
						}
					}
				);
			}
			else
			{	
				var url = base_url+"app/getAddFormForInfo";
				$.post(url,
					function(data)
					{
						try
						{
							var res = JSON.parse(data);
							$("#editInfoPopupTitle")[0].innerHTML=res.title;
							$("#editInfoPopupUpdateBtn")[0].innerHTML="<i class='icon-ok'></i> "+res.infoBtn;
						}
						catch(e)
						{
							console.log(e);
						}
					}
				);
				$("[name=editInfotabId]")[0].value="";
				$("[name=editTitle]")[0].value="";
				CKEDITOR.instances.editDescription.setData("");
				$("[name=editStatus]")[0].value="";
				$("[name=editAppTabId]")[0].value=$.session.get("curTabId").split('_')[1];
			}
		}
	}
}

function close_popup(popup_div_id){
	if (document.getElementById)
	{
		obj = document.getElementById(popup_div_id);
		if (obj.style.display == "block")
		{
			obj.style.display = "none";
		}
	}
}

function updateInfo(){
	$("form[name=frminfotabEdit]")[0].submit();
}

function openEditGalleryPopup(galleryImageId, popup_div_id)
{
	if (document.getElementById)
	{
		obj = document.getElementById(popup_div_id);
		if (obj.style.display == "none")
		{
			obj.style.display = "block";
			$("form[name=frmgalleryEdit]")[0].reset();
			$("#editGalleryPopupTitle")[0].innerHTML="Edit Gallery Image";
			$("#editGalleryPopupUpdateBtn")[0].innerHTML="<i class='icon-ok'></i> Update Image";
			$("[name=iAppTabIdEdit]")[0].value=$.session.get("curTabId").split('_')[1];
			var url = base_url+"app/getEditFormForGallery?imageId="+galleryImageId;
			$.post(url,
				function(data)
				{
					try
					{
						var res = JSON.parse(data);
						if(typeof res[0].iGalleryImageId != 'undefined' )
						{
							//-- put response data in popup
							$("[name=imageNameOldEdit]")[0].value=res[0].vGalleryImage;
							CKEDITOR.instances.tDescriptionEdit.setData(res[0].tDescription);
							$('#edit_gallery_img_preview')[0].src = base_url + '/uploads/gallery/' + galleryImageId + '/' + res[0].vGalleryImage;
							$('[name=imageIdEdit]')[0].value=res[0].iGalleryImageId;
						}
					}
					catch(e)
					{
						console.log(e);
					}
				}
			);
		}
	}
}

function updateGalleryImage(){
	$("form[name=frmgalleryEdit]")[0].submit();
}

//	--	function for delete information	--//
function delete_info(infoId,iApplicationId){
	$('#myModalDeleteInfo').modal('show');
	var link = document.getElementsByClassName("mylinkInfo")[0];
    link.setAttribute('href', base_url+'app/delete_info/'+infoId+'/'+iApplicationId);
}