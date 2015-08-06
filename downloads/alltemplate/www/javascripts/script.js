var allaroundusdata_encode = [{"rGeninfoId":"43","rCatId":"67","iApplicationId":"153","iAppTabId":"2223","rName":"Navarangpura","rInformation":"<p>Navrangpura street near our restaurant<\/p>\r\n","rWebsite":"http:\/\/www.restaurant.com","rAddress1":"navarangpura","rAddress2":"","rCity":"Ahmedabad","rState":"Gujarat","rCountry":"99","rZip":"380008","rEmail":"info@zomato.com","rTelephone":"7925454585","rImage":"1.png","rLatitude":"23.0365","rLongitude":"72.5611","rGps":"Yes","rDistanceType":"km","rCatName":"Street","rCatColor":"#998aee"},{"rGeninfoId":"44","rCatId":"68","iApplicationId":"153","iAppTabId":"2223","rName":"Swaminarayan Temple","rInformation":"<p>Near our Restaurants<\/p>\r\n","rWebsite":"http:\/\/www.swaminarayan.com","rAddress1":"new ranip","rAddress2":"","rCity":"Ahmedabad","rState":"Gujarat","rCountry":"99","rZip":"380008","rEmail":"info@zomato.com","rTelephone":"07925454585","rImage":"swaminarayan.jpg","rLatitude":"23.093","rLongitude":"72.5592","rGps":"Yes","rDistanceType":"km","rCatName":"Temple","rCatColor":"#00ff00"}];
var allaroundusdatacategory_encode = [{"rCatId":"67","iApplicationId":"153","iAppTabId":"2223","rCatName":"Street","rCatColor":"#998aee"},{"rCatId":"68","iApplicationId":"153","iAppTabId":"2223","rCatName":"Temple","rCatColor":"#00ff00"},{"rCatId":"69","iApplicationId":"153","iAppTabId":"2223","rCatName":"Highway","rCatColor":"#0000ff"}];
var home_details = [{"iHometabId":"36","iApplicationId":"153","iAppTabId":"2214","vWebsite":"http:\/\/www.honest.com","vEmail":"info@honest.com","vTelephone":"2147483647","vAddress1":"New Ranip","vAddress2":"","vCity":"Ahmedabad","vState":"Gujarat","vCountry":null,"vZip":"382470","vLatitude":"23.093","vLongitude":"72.5592","vGPS":"1","vDistanceType":"km","vLeftimage":null,"vRightimage":null,"tDescription":"<p><span >Menu (including prices) for Rajdhani Thali Restaurant may have changed since the last time the website was updated. Zomato.com does not guarantee prices or the availability of menu items at Rajdhani Thali Restaurant. Rajdhani Thali Restaurant menu in image format shown on this website has been digitised by Zomato.com. Customers are free to download and save these images, but not use these digital files (watermarked by the Zomato logo) for any commercial purpose, without prior written permission of Zomato<\/span><\/p>\r\n","vDay":null,"vOpenfrom":null,"vOpento":null,"vImage":"20.png"}];
var allaroundusdata_encode = [];
var allaroundusdatacategory_encode = [];
var home_details = [{"iHometabId":"37","iApplicationId":"154","iAppTabId":"2233","vWebsite":"www.zomato.com","vEmail":"mayur@hiveinfotech.com","vTelephone":"2147483647","vAddress1":"new ranip","vAddress2":"","vCity":"Ahmedabad","vState":"Gujarat","vCountry":null,"vZip":"380008","vLatitude":"23.093","vLongitude":"72.5592","vGPS":"1","vDistanceType":"mile","vLeftimage":null,"vRightimage":null,"tDescription":"<p>test<\/p>\r\n","vDay":null,"vOpenfrom":null,"vOpento":null,"vImage":"1.png"}];
var service_url = 'http://admin.easy-apps.co.uk/webservice';
var web_url = "http://admin.easy-apps.co.uk/webservice?action=";
var cust_unique_id = document.getElementById("cust_unique_id").value; // get customer unique id

var footerheight = 0;

$(document).ready(function() {
$(".box").bgswitcher({
images: ["http://admin.easy-apps.co.uk/uploads/background_image/123/bg123.jpg","http://admin.easy-apps.co.uk/uploads/background_image/123/bg123.jpg","http://admin.easy-apps.co.uk/uploads/background_image/123/bg123.jpg","http://admin.easy-apps.co.uk/uploads/background_image/123/bg123.jpg","http://admin.easy-apps.co.uk/uploads/background_image/123/bg123.jpg"],
effect: "slide"
});
$(".box").prev("div").css("min-height","100% !imporant");
$(".box").prev("div").css("z-index","1 !imporant");
});


$(document).ready(function() {
 var menutype = $('#menutype').val();
 var menu_column = $('#menu_column').val();
 var middlevalue = $('#middlevalue').val();
 var maxScroll  = 0;
 
 if(menutype == 'Bottom'){
	$(".myowl").owlCarousel({
		items : menu_column,
		afterMove: function(e){
			//console.log("I am moved");
			var tranforms = $(e).find('.owl-wrapper').css("-webkit-transform");
            var values = tranforms.match(/-?[0-9\.]+/g);
			console.log(values);
			var lefttrnsform  = values[4];
			console.log("Max scroll==>"+(-maxScroll)+"");
			if(lefttrnsform < (-(maxScroll))){
            console.log("I am here");
            setTimeout(function(){
				$(e).find('.owl-wrapper').css('-webkit-transform', 'translate3d('+(-maxScroll)+'px,0px,0px)');
				$(e).find('.owl-wrapper').css('-ms-transform', 'translate3d('+(-maxScroll)+'px,0px,0px)');
				$(e).find('.owl-wrapper').css('transform', 'translate3d('+(-maxScroll)+'px,0px,0px)');

			},300);
			  //$(e).stop();
			  //$(e).goTo(8);
            }
		},
		
		afterUpdate:function(){
			var itemwidth  = $('.owl-item').width();
			var totalwidth = (middlevalue-1)*itemwidth;
			maxScroll = ((middlevalue-1)-menu_column)*itemwidth;
			totalwidth = totalwidth+20;
			//console.log(itemwidth+"==>"+totalwidth+"==>"+middlevalue+"==>"+menu_column);
			$('.owl-wrapper').css('width',totalwidth+"px");
			//footerheight = $('.footerpartmain').height();
		},
		
		afterInit:function(){
			var itemwidth  = $('.owl-item').width();
			var totalwidth = (middlevalue-1)*itemwidth;
			maxScroll = ((middlevalue-1)-menu_column)*itemwidth;
			totalwidth = totalwidth+20;
			//console.log(itemwidth+"==>"+totalwidth+"==>"+middlevalue+"==>"+menu_column);
			
			$('.owl-wrapper').css('width',totalwidth+"px");
			//console.log($('.footerpartmain').height());
			footerheight = $('.footerpartmain').height();
			$('.default_menu').children('.ui-content').after('<div style="clear:both;height: '+footerheight+'px;"></div>');
		}
	});	
  }
});

$(document ).on( "pageshow", function( event ) {
    $('.extraspace').remove();
	$('.ui-content').after('<div class="extraspace" style="clear:both;height: '+footerheight+'px;"></div>');
    $('#default_menu .extraspace').remove();
}); 

function getTransform(el) {
    var transform = window.getComputedStyle(el, null).getPropertyValue('-webkit-transform');
    var results = transform.match(/matrix(?:(3d)\(-{0,1}\d+(?:, -{0,1}\d+)*(?:, (-{0,1}\d+))(?:, (-{0,1}\d+))(?:, (-{0,1}\d+)), -{0,1}\d+\)|\(-{0,1}\d+(?:, -{0,1}\d+)*(?:, (-{0,1}\d+))(?:, (-{0,1}\d+))\))/);

    if(!results) return [0, 0, 0];
    if(results[1] == '3d') return results.slice(2,5);

    results.push(0);
    return results.slice(5, 8); // returns the [X,Y,Z,1] values
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

function videoDetailPage(videoid,title) {
    var html = "";
    
    if(videoid !=''){
        var videourl = 'http://www.youtube.com/embed/'+videoid;
        html += '<iframe class="youtube-player" type="text/html" width="100%" height="476.5" src="'+videourl+'?html5=1" frameborder="0"> </iframe>';    
    }else{
        html += '<div class="no_data">No video founds.</div>';
    }
    
    /*$("#titleId").html(title);*/
    $("#video_detail_main").html(html);
    $.mobile.changePage("#video_detail", "pop", true);    
}


//==============================================
function captureSuccess(mediaFiles) {
    var i, len;
    for (i = 0, len = mediaFiles.length; i < len; i += 1) {
        uploadFile(mediaFiles[i]);
    }
}


// Called if something bad happens.
//
function captureError(error) {
    var msg = 'An error occurred during capture: ' + error.code;
    navigator.notification.alert(msg, null, 'Uh oh!');
}

// A button will call this function
//
function captureAudio() {
    // Launch device audio recording application,
    // allowing user to capture up to 2 audio clips
    navigator.device.capture.captureAudio(captureSuccess, captureError, {limit: 2});
}

window.localStorage.setItem("voiceRecordPath","");
window.localStorage.setItem("voiceRecordName","");
// Upload files to server
function uploadFile(mediaFile) {
    var ft = new FileTransfer(),
        path = mediaFile.fullPath,
        name = mediaFile.name;
        console.log("name=="+name)
        console.log("path=="+path)
        window.localStorage.setItem("voiceRecordPath",path);
        window.localStorage.setItem("voiceRecordName",name);

    /*  ft.upload(path,
        "http://my.domain.com/upload.php",
        function(result) {
            console.log('Upload success: ' + result.responseCode);
            console.log(result.bytesSent + ' bytes sent');
        },
        function(error) {
            console.log('Error uploading file ' + path + ': ' + error.code);
        },
        { fileName: name });*/
}

var my_media = null;
var mediaTimer = null;

// Play audio
//
function playAudio() {
    var src = window.localStorage.getItem("voiceRecordPath");
    var vName = window.localStorage.getItem("voiceRecordName");
    console.log("Pname=="+vName)
    console.log("Ppath=="+src)
    // Create Media object from src
    my_media = new Media(src, onSuccess, onError);

    // Play audio
    my_media.play();

    // Update my_media position every second
    if (mediaTimer == null) {
        mediaTimer = setInterval(function() {
            // get my_media position
            my_media.getCurrentPosition(
                // success callback
                function(position) {
                    if (position > -1) {
                        setAudioPosition((position) + " sec");
                    }
                },
                // error callback
                function(e) {
                    console.log("Error getting pos=" + e);
                    setAudioPosition("Error: " + e);
                }
            );
        }, 1000);
    }
}

// Pause audio
//
function pauseAudio() {
    if (my_media) {
        my_media.pause();
    }
}

// Stop audio
//
function stopAudio() {
    if (my_media) {
        my_media.stop();
    }
    clearInterval(mediaTimer);
    mediaTimer = null;
}

// onSuccess Callback
//
function onSuccess() {
    console.log("playAudio():Audio Success");
}

// onError Callback
//
function onError(error) {
    alert('code: '    + error.code    + '\n' +
          'message: ' + error.message + '\n');
}

// Set audio position
//
function setAudioPosition(position) {
    document.getElementById('audio_position').innerHTML = position;
}

function sendEmail () {
    var path = window.localStorage.getItem("voiceRecordPath");
    //alert(path)
    var vName = window.localStorage.getItem("voiceRecordName");
    var toRecipients = document.getElementById('idEmail').innerHTML;
    var subject = document.getElementById('idSubject').innerHTML;
    var body = document.getElementById('idDescription').innerHTML;
    var isHtml = true;
    var ccRecipients = "";
    var bccRecipients = "";
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1;
    var isiPhone = ua.indexOf("iphone") > -1;
    if(isAndroid) {
        
        var src = path.split("file://"); 
        var attachments = src[1];
        console.log("attachments"+attachments)
        //alert(attachments)
        window.plugins.emailComposer.showEmailComposer(""+subject+"",""+body+"",[""+toRecipients+""],"","","No",[""+attachments+""]);
    }
    if(isiPhone){
        var attachments = path;
        console.log("attachments"+attachments)
        //alert(attachments)
        
        window.plugins.emailComposer.showEmailComposer(""+subject+"",""+body+"",[""+toRecipients+""],"","","No",[""+attachments+""])
    }
}
/*
if(bottom = "Bottom"){
    var p = 1;
    $( document ).on( "pageshow", ".allPage", function( event ) {
        $('.owl-item').each(function (index) {
            if(var p == max){
                $(".owl-item").css("clear","both")
            }else{

            }
            p++
        });
    }); 
}*/

	//==============================================

	function eventDetailPage(id,type) 

	{
		var url = web_url+type;
		$.ajax({
				url: url,
				type: "GET",
				dataType: "jsonp",
				data: "iEventId=" + id,
				crossDomain: true,
				success: function (result) {

					
				var html = "";
				console.log(result);
				var shordisc = '<div class="dtlcols">Start Date : '+result["dStartDate"]+' '+ result["dStartDate"]+' End Date : '+result["dEndDate"]+' '+result["vEndTime"]+'</div>';
				/*html += '<div class="detail_part"><div class="infomain">'+shordisc+' </br>'+result["tDescription"]+'</div></div>';*/
				if(result["vHeaderImage"] !=''){
					html += '<div class="headimagemain headtopspace"><img src="'+result["vHeaderImage"]+'"></div>';    
				}
				html += '<div>';
				html += '<ul data-role="listview" data-inset="true" class="listradius">';
					html += '<li data-role="list-divider" role="heading" class="sectionheader">Description</li>';
				html += '</ul>';

				html += '</div>';
				
				var style="";
				if(result["vBackgroundColor"]){
					style+='background:'+result["vBackgroundColor"]+' !important;';
				}


				if(result["vTextColor"]){
					style+='color:'+result["vTextColor"]+' !important;';
				}
	   
				html += '<div class="detail_part" style="'+style+'"><div class="infomain">'+shordisc+' </br>'+result["tDescription"]+'</div></div>';
			
				$("#titleId").html(result["vTitle"]);
				$("#event_detail_main").html(html);
				if(result["vTextColor"]){
						$('.detail_part').children('.infomain').children('p').css('color',''+result["vTextColor"]+' !important;');
					}
					//  $('.detail_part').children('.infomain').children('div').css('min-height','337px;');
					$.mobile.changePage("#event_detail", "pop", true);
					}
				});
	}
	
	/* 
		create By : Maksudkhan
		Date : 5/9/2014
		Description : Qrcodemake 
	*/


	function qrcodemakedetails(id,type)
	{
		// url for webservices
		var url = web_url+type;
		/*alert(url);*/
		$.ajax({
            url: url,
            type: "GET",
            dataType: "jsonp",
            data: "iQrID=" + id,
            crossDomain: true,
            success: function (result) 
			{
				var html ='';
				/*alert(result[0]['tQrCode'])
				console.log(result);*/
				html +='<ul data-role="listview" data-inset="true" class="listradius">';
				
                	for(j=0;j<result.length;j++)
					{
						html += '<li class="list-odd-bg" style="background:#FFEBCD;" id="qr">';
						   html += '<a class="" href="">';
						   html += '<h3 class="hd_whitecolor">coupon'+result[j]['tQrCode']+'</h3>';
						   html += '</a>';
						   html += '<div id="qrcode"></div>';
						html +='</li>';
					}
			   	html +='</ul>';
				
				var title="Qr Code";
				$("#qrcodetitle").html(title);
				
				$("#qrdetail_detail").html(html);
                $.mobile.changePage("#qrcode_detail_main", "pop", true);
			}
		});
	}
	
	/* 
		Changed By : Mayur Gajjar
		Date : 21/8/2014
		Description : displaying menu in details 
	*/
	
	function menuwiseitemlistdetail(id,type,header)
	{
		var url = web_url+type;
		$.ajax({
            url: url,
            type: "GET",
            dataType: "jsonp",
            data: "iMenuID=" + id,
            crossDomain: true,
            success: function (result) 
			{
				var html ='';
				console.log(result);
				
				html +='<ul data-role="listview" data-inset="true" class="listradius">';
				html +='<li class="list-even-bg"><h3 class="hd_whitecolor">'+header+'</h3></li>';
				
					for(j=0;j<result.length;j++)
					{
						html += '<li class="list-odd-bg">';
						   html += '<a class="" href="">';
						   html += '<h3 class="hd_whitecolor"><b>Item Name</b> :: '+result[j]['vItemName']+'</h3>';
						   html += '<h3 class="hd_whitecolor"><b>Varient</b> :: '+result[j]['vVarient']+'</h3>';
						   html += '<h3 class="hd_whitecolor"><b>Price</b> :: '+'$ '+result[j]['fPrice']+'</h3>';
						   html += '<input type="hidden" name="fPrice" id="fPrice'+j+'" value="'+result[j]['fPrice']+'" />';
						   html += '</a>';
						html +='</li>';
                	}
			   		html +='</ul>';
				
				/** Title Details **/
				var title="Menu";
				$("#itemdetailtitle").html(title);
				$("#item_detail").html(html);
                $.mobile.changePage("#item_detail_main", "pop", true);
			}
		});
	}
	
	/* 
		Changed By : Mayur Gajjar
		Date : 21/8/2014
		Description : displaying order details 
	*/
	
	function menuwiseitemlist(id,type,pageID,oddbar,header)
	{
		var url = web_url+type;
		$.ajax({
            url: url,
            type: "GET",
            dataType: "jsonp",
            data: "iMenuID=" + id,
            crossDomain: true,
            success: function (result) 
			{
				var html ='';

				if(result.length != 0)
				{
					html += '<div id="quantity_validation"></div>';
					html +='<ul data-role="listview" data-inset="true" class="listradius" id="'+pageID+'_list">';
					html +='<li class="list-even-bg"><h3 class="hd_whitecolor">'+header+'</h3></li>';
					
					for(j=0;j<result.length;j++)
					{
						html += '<li class="list-odd-bg">';
						
						   html += '<a class="" href="">';
						   html += '<h3 class="hd_whitecolor"><b>Item Name</b> :: '+result[j]['vItemName']+'</h3>';
						   html += '<h3 class="hd_whitecolor"><b>Varient</b> :: '+result[j]['vVarient']+'</h3>';
						   html += '<h3 class="hd_whitecolor"><b>Price</b> :: '+'$ '+result[j]['fPrice']+'</h3>';
						   html += '<input type="hidden" name="fPrice" id="fPrice'+j+'" value="'+result[j]['fPrice']+'" />';
						   html += '</a>';
						   
						   html += '<form name="frm">';
						   html += '<div data-role="fieldcontain" class="ui-hide-label">';
								html += '<input type="text" name="vQuantity" id="vQuantity'+j+'" placeholder="Enter Quantity"/>';
						   html += '</div>';
							
						   html += '<a class="join_quantity_btn" href="javascript:save_quantity('+result[j]['iItemId']+','+result[j]['iApplicationId']+','+result[j]['iAppTabId']+','+id+','+j+');" data-role="button" data-inline="true">Add</a>';
						   
						   html += '</form>';
						html +='</li>';
                	}
					html += '<a class="join_btn" href="javascript:show_order_detail('+cust_unique_id+','+result[0]['iApplicationId']+','+result[0]['iAppTabId']+');" data-role="button" data-inline="true">Show Order</a>';
                html +='</ul>';

				}else{
					html+='<center><h3 class="hd_whitecolor">No Data</h3></center>';
				}
				
				var title="Order";
				$("#orderdetailtitle").html(title);
				$("#item_detail").html(html);
                $.mobile.changePage("#item_detail_main", "pop", true);
			}
		});
	}
	
	/**

		Developer : Mayur Gajjar
		Date : 4/9/2014
		Description : Listing Order Details
	**/
	function show_order_detail(cust_unique_id,iApplicationId,iAppTabId)
	{	
		var type = 'get_order_detail';
		var url = web_url+type;
		
		$.ajax({
            url: url,
            type: "GET",
            dataType: "jsonp",
            data: "iUserId="+cust_unique_id+"&iApplicationId="+iApplicationId+"&iAppTabId="+iAppTabId,
            crossDomain: true,
            success: function (result) 
			{
				var html ='';
				if(result.length != 0){
					html +='<ul data-role="listview" data-inset="true" class="listradius">';
				
                	for(j=0;j<result.length;j++)
					{
						html += '<li class="list-odd-bg">';
						   html += '<a class="" href="">';
						   html += '<h3 class="hd_whitecolor"><b>Item</b>	:: '+result[j]['vItemName']+'</h3>';
						   html += '<h3 class="hd_whitecolor"><b>Quantity</b> :: '+result[j]['vQuantity']+'</h3>';
						   html += '<h3 class="hd_whitecolor"><b>Total Amt</b> :: '+'$ '+result[j]['Total']+'</h3>';

						   html += '</a>';
						html +='</li>';

						
						html += '<a class="join_btn" href="javascript:deleteorderdetail('+result[j]['iOrderId']+','+result[0]['iUserId']+');" data-role="button" data-inline="true">Delete</a>';
			      	}
					
					html += '<a class="join_btn" href="javascript:selectorderdetails('+result[0]['iUserId']+','+result[0]['iApplicationId']+','+result[0]['iAppTabId']+');" data-role="button" data-inline="true">Place Order</a>';
					html +='</ul>';
				}else{
					html +='<h3 class="hd_whitecolor">No Order Cofirmed</h3>';
				}
				
				var title="Order";
				$("#orderdetailtitle").html(title);
				$("#ordershow_detail").html(html);
                $.mobile.changePage("#ordershow_detail_main", "pop", true);
			}
		});
	}

	
	/**
		Developer : Mayur Gajjar
		Date : 4/9/2014
		Description : Delete Order Details
	**/
	function deleteorderdetail(iOrderId,cust_unique_id)
	{
		var type = 'delete_order';
		var url = web_url+type;
		
		$.ajax({
				url: url,
				type: "GET",
				dataType: "jsonp",
				data: "iOrderId=" + iOrderId + "&iUserId=" +cust_unique_id,
				crossDomain: true,
				success: function (result) 
				{
					if(result.length != 0){
						var html ='';
						html +='<ul data-role="listview" data-inset="true" class="listradius">';
							for(j=0;j<result.length;j++){
								html += '<li class="list-odd-bg">';
								   html += '<a class="" href="">';
								   html += '<h3 class="hd_whitecolor"><b>Item Name</b> :: '+result[j]['vItemName']+'</h3>';
								   html += '<h3 class="hd_whitecolor"><b>Quantity</b> :: '+result[j]['vQuantity']+'</h3>';
								   html += '<h3 class="hd_whitecolor"><b>Total Price</b> :: '+'$ '+result[j]['Total']+'</h3>';
								   html += '<a class="join_btn" href="javascript:deleteorderdetail('+result[j]['iOrderId']+','+result[j]['iUserId']+');" data-role="button" data-inline="true">Delete</a>';
								   html += '</a>';
								html +='</li>';
							}
							html += '<a class="join_btn" href="javascript:selectorderdetails('+result[0]['iUserId']+','+result[0]['iApplicationId']+','+result[0]['iAppTabId']+');" data-role="button" data-inline="true">Place Order</a>';
						html +='</ul>';

						
					}else{
						html +='<h3 class="hd_whitecolor">No order found</h3>';
					}
					
					// item detail html
					var title="Order";
					$("#orderdetailtitle").html(title);
					$("#item_detail").html(html);
					$.mobile.changePage("#item_detail_main", "pop", true);
				}
		});
	}
	

	/**

		Developer : Mayur Gajjar
		Date : 4/9/2014
		Description : Add Quantity Details 
	**/
	function save_quantity(iItemId,iApplicationId,iAppTabId,id,loop)
	{
		var type = 'save_quantity_session';
		var url = web_url+type;
		var vQuantity = $('#vQuantity'+loop).val();
		var fPrice = $('#fPrice'+loop).val();
		
		if(vQuantity == ''){
			$("#quantity_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center; font-size: large; font-weight: bolder;">Please Enter Quantity</div>');
      		$("#quantity_validation").show().delay(4000).fadeOut();
			return false;
		}
		
		$.ajax({
				url: url,
				type: "GET",

				data: "iMenuID=" + id + "&iItemId=" +iItemId+ "&iApplicationId=" +iApplicationId+ "&iAppTabId=" +iAppTabId+ "&vQuantity="+vQuantity+ "&fPrice="+fPrice,
				success: function (result) 
				{
					$("#quantity_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center; font-size: large; font-weight: bolder;">submit successfully</div>');
      				$("#quantity_validation").show().delay(4000).fadeOut();
	  			}
		});
	}

	/**
		Developer : Mayur Gajjar
		Description : Customer order details
		Date : 21/8/2014
	**/

	function selectorderdetails(iUserId,iApplicationId,iAppTabId)
	{
		var html ='';
		
		html += '<center>';
		html += '<div data-role="fieldcontain" class="wrapmain">';
		
		html += '<h3>';
			html += 'Order Details';
		html += '</h3>';
		
		html += '<form name="order_frm" id="order_frm">';
		
		html += '<input type="hidden" name="iUserId" id="iUserId" value="'+iUserId+'" />';
		html += '<input type="hidden" name="iApplicationId" id="iApplicationId" value="'+iApplicationId+'" />';
		html += '<input type="hidden" name="iAppTabId" id="iAppTabId" value="'+iAppTabId+'" />';
		
		html += '<div id="contact_validation" style="display:none;"></div>';
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vNamed">Your Name :</label>';
			html += '<input type="text" name="vName" id="vNamed" placeholder="Enter Your Full Name"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="tAddress">Your Address:</label>';
			html += '<input type="text" name="tAddress" id="tAddress" placeholder="Enter Your Address"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vPhone">Your Phone:</label>';
			html += '<input type="text" name="vPhone" id="vPhone" placeholder="Enter Your Mobile No"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vPhone">Your Email:</label>';
			html += '<input type="text" name="tEmail" id="tEmail" placeholder="Enter Your Email"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vArea">Your Area :</label>';
			html += '<input type="text" name="vArea" id="vArea" placeholder="Enter Your Area Name"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vPincode">Your Pincode :</label>';
			html += '<input type="text" name="vPincode" id="vPincode" placeholder="Enter Your Area Pincode"/>';
		html += '</div>';
		
		html += '<a class="join_btn" href="javascript:saveorderdetails();" data-role="button" data-inline="true">submit order</a>';
		html += '</form>';
		html += '</div></center>';
		
		/** Order title **/
		var title="Order";
		$("#orderdetailtitle").html(title);
		$("#order_detail").html(html);
		$.mobile.changePage("#order_detail_main", "pop", true);
	}
	
	/**
		Developer : Mayur Gajjar
		Description : Save customer order details show payment page
		Date : 21/8/2014
	**/
	function saveorderdetails()
	{
		var type = 'save_order';
		var url = web_url+type;
		
		var iUserId = $("#iUserId").val();
		var iApplicationId = $("#iApplicationId").val();
		var iAppTabId = $("#iAppTabId").val();
		var iItemId = $("#iItemId").val();
		var iMenuId = $("#iMenuID").val();
		var vName = $("#vNamed").val();
		var tAddress = $("#tAddress").val();
		var vPhone = $("#vPhone").val();
		var tEmail = $("#tEmail").val();
		var vArea = $("#vArea").val();
		var vPincode = $("#vPincode").val();
		var vQuantity = $("#vQuantity").val();
				
		if(vName=="")
		{
             $("#contact_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Name.</div>');
			 $("#contact_validation").show();
			 $("#vName").focus();
			 return false;
        }
				
		if(tAddress=="")
		{
			 $("#contact_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Address.</div>');
             $("#contact_validation").show();
             $("#tAddress").focus();
             return false;
		}
		if(vPhone=="")
		{
			 $("#contact_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Number.</div>');
             $("#contact_validation").show();
             $("#vPhone").focus();
             return false;
		}
		/*if(vPhone !='' && vPhone != /^[\d\s\(\)\-]+$/){
			$("#contact_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Number.</div>');
            $("#contact_validation").show();
            $("#vPhone").focus();
             return false;
		}else{
			$("#contact_validation").hide();
		}*/
		if(vPhone !='' && vPhone.length > 10 || vPhone.length < 10){
			$("#contact_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Valid Number.</div>');
            $("#contact_validation").show();
            $("#vPhone").focus();
             return false;
         }else{
         	$("#contact_validation").hide();
         }
         if(tEmail==""){
			$("#contact_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Email.</div>');
            $("#contact_validation").show();
            $("#tEmail").focus();
            return false;
		}else{
			$("#contact_validation").hide();
		}
		var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  		var isvalid = emailRegexStr.test(tEmail); 
		if(isvalid==false){
			$("#contact_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please enter valid email.</div>');
            $("#contact_validation").show();
            $("#tEmail").focus();
            return false;
		}        	
		$.ajax({
				url: url,
				type: "GET",
				dataType: "jsonp",
				data:'vName='+vName+'&tAddress='+tAddress+'&vPhone='+vPhone+'&tEmail='+tEmail+'&vArea='+vArea+'&vPincode='+vPincode+'&iUserId='+iUserId+"&iApplicationId="+iApplicationId+"&iAppTabId="+iAppTabId,
				crossDomain: true,
				success: function (result) 
				{
					var html = '';
					html += '<center>';
						
						html += '<div data-role="fieldcontain" class="wrapmain">';
						html += '<h3>';
							html += 'Payment';
						html += '</h3>';
						html += '<a class="join_btn" href="javascript:credit_card_payment('+result['Orderdetails']+','+result['iApplicationId']+','+result['iAppTabId']+','+result['iUserId']+');" data-role="button" data-inline="true">Credit card</a>';
						html += '</div>';
						
					html += '</center>';
					
					$("#payment_detail").html(html);
					$.mobile.changePage("#payment_detail_main", "pop", true);
				}
		});
	}
	
	/**
		Developer : Mayur Gajjar
		Description : customer Credit card details
		Date : 21/8/2014
	**/
	function credit_card_payment(Orderdetails,iApplicationId,iAppTabId,iUserId)
	{
		
		var html ='';
		html += '<center>';
		html += '<div data-role="fieldcontain" class="wrapmain">';
		
		html += '<h3>';
			html += 'Credit Card Detail';
		html += '</h3>';
		
		html += '<form name="credit_frm" id="credit_frm">';
		
		html += '<div id="contact_validation" style="display:none;"></div>';
		
		html += '<input type="hidden" name="iCustOrderId" id="iCustOrderId" value="'+Orderdetails+'" />';
		html += '<input type="hidden" name="iApplicationId" id="iApplicationId" value="'+iApplicationId+'" />';
		html += '<input type="hidden" name="iAppTabId" id="iAppTabId" value="'+iAppTabId+'" />';
		html += '<input type="hidden" name="iUserId" id="iUserId" value="'+iUserId+'" />';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vFirstName">Firstname:</label>';
			html += '<input type="text" name="vFirstName" id="vFirstName" placeholder="Enter First Name"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vLastName">LastName:</label>';
			html += '<input type="text" name="vLastName" id="vLastName" placeholder="Enter Last Name"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vHolderName">Holder Name:</label>';
			html += '<input type="text" name="vHolderName" id="vHolderName" placeholder="Enter Holder Name"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vCreditCardNo">CC Number:</label>';
			html += '<input type="text" name="vCreditCardNo" id="vCreditCardNo" placeholder="Enter Credit Card Number"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="iCreditCVV">CVV:</label>';
			html += '<input type="text" name="iCreditCVV" id="iCreditCVV" placeholder="Enter Cvv number"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vCreditExp">Expiry Date:</label>';
			html += '<input type="text" name="vCreditExp" id="vCreditExp" placeholder="Enter Expiry Date"/>';
		html += '</div>';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="vCreditType">Card Type:</label>';
			html += '<select name="vCreditType" id="vCreditType">';
				html += '<option value="Visa">VISA</option>';
				html += '<option value="MasterCard">MASTER CARD</option>';
				html += '<option value="Discover">DISCOVER</option>';
				html += '<option value="AmericanExpress">AMERICAN EXPRESS</option>';
			html += '</select>';
		html += '</div>';
		
		html += '<a class="join_btn" href="javascript:submit_payment_creditcard();" data-role="button" data-inline="true">Pay Now</a>';
		
		html += '</form>';
		html += '</div>';
		html += '</center>';
		
		$("#credit_detail").html(html);
		$.mobile.changePage("#credit_detail_main", "pop", true);
	}
	
	/**
		Developer : Mayur Gajjar
		Description : Order detail receipt
		Date : 11/9/2014
	**/
	
	function submit_payment_creditcard()
	{	
		var type = 'save_credit_card';
		var url = web_url+type;
		
		var iApplicationId = $("#iApplicationId").val();
		var iUserId = $("#iUserId").val();
		var iAppTabId = $("#iAppTabId").val();
		var vFirstName = $("#vFirstName").val();
		var iCustOrderId = $("#iCustOrderId").val();
		var vLastName = $("#vLastName").val();
		var vHolderName = $("#vHolderName").val();
		var vCreditCardNo = $("#vCreditCardNo").val();
		var iCreditCVV = $("#iCreditCVV").val();
		var vCreditExp = $("#vCreditExp").val();
		var vCreditType = $("#vCreditType").val();

		if(vFirstName=="")
		{
             $("#creditcard_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Firstname.</div>');
			 $("#creditcard_validation").show();
			 $("#vFirstName").focus();
			 return false;
        }else{
        	$("#creditcard_validation").hide();
        }
        if(vLastName=="")
		{
             $("#creditcard_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Lastname.</div>');
			 $("#creditcard_validation").show();
			 $("#vLastName").focus();
			 return false;
        }else{
        	$("#creditcard_validation").hide();
        }
        if(vHolderName=="")
		{
             $("#creditcard_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter Holdername.</div>');
			 $("#creditcard_validation").show();
			 $("#vHolderName").focus();
			 return false;
        }else{
        	$("#creditcard_validation").hide();
        }
        if(vCreditCardNo==""){
             $("#creditcard_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter CreditCardNo.</div>');
			 $("#creditcard_validation").show();
			 $("#vCreditCardNo").focus();
			 return false;
        }else{
        	$("#creditcard_validation").hide();
        }
        if(iCreditCVV==""){
             $("#creditcard_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter CreditCVV.</div>');
			 $("#creditcard_validation").show();
			 $("#iCreditCVV").focus();
			 return false;
        }else{
        	$("#creditcard_validation").hide();
        }
        if(vCreditExp==""){
             $("#creditcard_validation").html('<div style="color: #b94a48;background-color: #f2dede;border-color: #eed3d7; text-align:center;">Please Enter CreditExp.</div>');
			 $("#creditcard_validation").show();
			 $("#vCreditExp").focus();
			 return false;
        }else{
        	$("#creditcard_validation").hide();
        }
		
		$.ajax({
				url: url,
				type: "GET",
				dataType: "jsonp",
				data:'vCreditCardNo='+vCreditCardNo+'&iCreditCVV='+iCreditCVV+'&vCreditExp='+vCreditExp+'&vCreditType='+vCreditType+'&vFirstName='+vFirstName+'&vLastName='+vLastName+'&vHolderName='+vHolderName+"&iCustOrderId="+iCustOrderId+"&iApplicationId="+iApplicationId+"&iAppTabId="+iAppTabId+"&iUserId="+iUserId,
				crossDomain: true,
				success: function (result) 
				{
					$("#receipt_detail").html(result.receipt);
					$.mobile.changePage("#receipt_detail_main", "pop", true);
				}
			});
	}
	
	/**
		Developer : Mayur Gajjar
		Description : send Order detail receipt
		Date : 11/9/2014
	**/
	function submit_payment_receipt()
	{
		var type = 'send_order_receipt';
		var url = web_url+type;	
		var data = $("#frm").serialize();
		
		$.ajax({
				url: url,
				type: "GET",
				dataType: "jsonp",
				data:'iCustOrderId='+iCustOrderId,
				crossDomain: true,
				success: function (result) 
				{
					$("#loyalty_detail").html(receipt.receipt);
					$.mobile.changePage("#loyalty_detail_main", "pop", true);
				}
			});
	}
	
	/**
		Developer : Mayur Gajjar
		Description : Loyalty Details
		Date : 27/8/2014
	**/
	function loyaltysettingsdetail(iLoyaltyId,vSquareCount,iApplicationId,iAppTabId)
	{

		var html ='';
		var my_url = 'http://admin.easy-apps.co.uk/';
	
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html +='<center><h3>Loyalty</h3></center>';
		html += '</div>';
		
		html += '<ul data-role="listview" data-inset="true" class="listradius">';
			html += '<li class="list-odd-bg" style="background:#FFEBCD;">';
				html += '<div data-role="fieldcontain" class="ui-hide-label">';
					for(i=0;i<vSquareCount;i++){
						html += '<img src="'+my_url+'assets/images/loyalty.png">';
					}
					// vSquareCount
					if(vSquareCount == 0){
						html += '<a class="join_quantity_btn" href="javascript:renew_loyalty();" data-role="button" data-inline="true">Renew</a>';
					}
				html += '</div>';
			html += '</li>';
		html += '</ul>';
		
		html += '<div data-role="fieldcontain" class="wrapmain">';
		
		html += '<center>';
		html += '<h3>';
			html += 'Stamp Card';
		html += '</h3>';
		html += '<p>Please Hand your device to the cashier to stamp your device</p>';
		html += '</center>';
		
		html += '<form name="order_frm" id="order_frm">';
		html +=	'<div id="contact_validation" style="display:none;"></div>';
		
		html += '<input type="hidden" id="iLoyaltyId" name="iLoyaltyId" value="'+iLoyaltyId+'">';
		html += '<input type="hidden" id="iApplicationId" name="iApplicationId" value="'+iApplicationId+'">';
		html += '<input type="hidden" id="iAppTabId" name="iAppTabId" value="'+iAppTabId+'">';
		
		html += '<div data-role="fieldcontain" class="ui-hide-label">';
			html += '<label for="iSecretCode">Secret code :</label>';
			html += '<input type="password" name="iSecretCode" id="iSecretCode" />';
		html += '</div>';
		html += '<a class="join_btn" href="javascript:saveloyaltydetails();" data-role="button" data-inline="true">submit code</a>';
		html += '</form>';
		html += '</div>';
		
		$("#loyalty_detail").html(html);
		$.mobile.changePage("#loyalty_detail_main", "pop", true);
	}
	
	// renew loyalty coupons
	function renew_loyalty()
	{
		var type = 'delete_coupons';
		var url = web_url + type;
		
		var iLoyaltyId = document.getElementById("iLoyaltyId").value;
		$.ajax({
				url: url,
				type: "GET",
				dataType: "jsonp",
				data: "iLoyaltyId="+iLoyaltyId,
				crossDomain: true,
				success: function (result) 
				{
					$("#alertMsg").html("Successfully Submitted");
					$.mobile.changePage("#Dialog", "pop", true, true);
				}
		});
	}
	
	// save loyalty details
	function saveloyaltydetails(iLoyaltyId)
	{
		var type = 'save_coupons';
		
		var iSecretCode = document.getElementById("iSecretCode").value;
		var iLoyaltyId = document.getElementById("iLoyaltyId").value;
		var iApplicationId = document.getElementById("iApplicationId").value;
		var iAppTabId = document.getElementById("iAppTabId").value;
		var url = web_url + type;
		
		$.ajax({
				url: url,
				type: "GET",
				dataType: "jsonp",
				data: "iLoyaltyId="+iLoyaltyId+"&iSecretCode="+iSecretCode+"&iApplicationId="+iApplicationId+"&iAppTabId="+iAppTabId,
				crossDomain: true,
				success: function (result) 
				{
					
					if(result=='Plz enter right SecretCode'){
						$("#alertMsg").html(result);
						$.mobile.changePage("#Dialog", "pop", true, true);
					}else{
						$("#alertMsg").html("Successfully Submitted");
						$.mobile.changePage("#Dialog", "pop", true, true);
					}
					
					

					var html ='';
					var my_url = 'http://admin.easy-apps.co.uk/';
				
					html += '<div data-role="fieldcontain" class="ui-hide-label">';
						html +='<center><h3>Loyalty</h3></center>';
					html += '</div>';
					
					html += '<ul data-role="listview" data-inset="true" class="listradius">';
						html += '<li class="list-odd-bg" style="background:#FFEBCD;">';
							html += '<div data-role="fieldcontain" class="ui-hide-label">';
								for(i=0;i<result;i++){
								for(i=0;i<result;i++){
									html += '<img src="'+my_url+'assets/images/loyalty.png">';
								}
								// vSquareCount
								if(result == 0){
									html += '<a class="join_quantity_btn" href="javascript:renew_loyalty();" data-role="button" data-inline="true">Renew</a>';
								}
							html += '</div>';
						html += '</li>';
					html += '</ul>';
					
					html += '<div data-role="fieldcontain" class="wrapmain">';
					
					html += '<center>';
					html += '<h3>';
						html += 'Stamp Card';
					html += '</h3>';
					html += '<p>Please Hand your device to the cashier to stamp your device</p>';
					html += '</center>';
					
					html += '<form name="order_frm" id="order_frm">';
					html +=	'<div id="contact_validation" style="display:none;"></div>';
					
					html += '<input type="hidden" id="iLoyaltyId" name="iLoyaltyId" value="'+iLoyaltyId+'">';
					html += '<input type="hidden" id="iApplicationId" name="iApplicationId" value="'+iApplicationId+'">';
					html += '<input type="hidden" id="iAppTabId" name="iAppTabId" value="'+iAppTabId+'">';
					
					html += '<div data-role="fieldcontain" class="ui-hide-label">';
						html += '<label for="iSecretCode">Secret code :</label>';
						html += '<input type="password" name="iSecretCode" id="iSecretCode" />';
					html += '</div>';
					html += '<a class="join_btn" href="javascript:saveloyaltydetails();" data-role="button" data-inline="true">submit code</a>';
					html += '</form>';
					html += '</div>';
					
					$("#loyalty_detail").html(html);
					$.mobile.changePage("#loyalty_detail_main", "pop", true);

				}
			}
		});
	}
	
	/**
		End
	**/

function pdfDetailPage(url){
	console.log("url====>"+url)
    if(url != ''){
        navigator.app.loadUrl(url, {openExternal : true});
       /* var ref = window.open(url, '_blank', 'location=yes');
        ref.addEventListener('loadstart', function() { alert(event.url); });*/
    }else{
        $("#alertMsg").html("Please enter pdf");
        $.mobile.changePage("#Dialog", "pop", true);
        return false;
    }
}

function gobackListofPhotoset(){
	$('.galleryshow').find('.backbutton_default_menu').attr('href','#default_menu');
	$('.photosetgallery').hide();
	$('.photosetsUL').show();
}

function showGalleryPhots(pid,ptype){
	$('.photosetsUL').hide();
	$('.galleryshow').find('.backbutton_default_menu').attr('href','javascript:gobackListofPhotoset();');
	if(ptype == 'Grid'){
		$('.photosetgallery').hide();
		$('#photosets_'+pid).show();
		
	}else{
		$('.photosetgallery').hide();
		$('#photosets_'+pid).show();
		$('#photosets_coverflow_'+pid).flipster();	
	}
}

$( document ).on( "pageshow", ".galleryshow", function( event ) {
    console.log("Coverflow >> "+$('.coverflow').children('ul').html()+"<<");
    if(typeof($('.coverflow').children('ul').html()) != 'undefined'){
       if($('.coverflow').children('ul').html() != ''){
              $(".coverflow").flipster();
          }   
    }
});

/*
 * IMPORTANT!!!
 * REMEMBER TO ADD  rel="external"  to your anchor tags. 
 * If you don't this will mess with how jQuery Mobile works
 */

(function(window, $, PhotoSwipe){
    
    $(document).ready(function(){
        
        $('div.gallery-page')
            .bind('pageshow', function(e){
                
                var 
                    currentPage = $(e.target),
                    options = {},
                    photoSwipeInstance = $("ul.gallery a", e.target).photoSwipe(options,  currentPage.attr('id'));
                    
                return true;
                
            })
            
            .bind('pagehide', function(e){
                
                var 
                    currentPage = $(e.target),
                    photoSwipeInstance = PhotoSwipe.getInstance(currentPage.attr('id'));

                if (typeof photoSwipeInstance != "undefined" && photoSwipeInstance != null) {
                    PhotoSwipe.detatch(photoSwipeInstance);
                }
                
                return true;
                
            });
        
    });

}(window, window.jQuery, window.Code.PhotoSwipe));


$(document).ready(function () {
    $(".news_list").click(function(){
        var html = '';
        var img = $( this ).find( "img" ).html();
        var title = $( this ).find( "h2" ).html();
        var discription = $( this ).find( "p" ).html();
        //console.log(img);
        $("#newsTitleId").html(title);
        html += '<div class="detail_part"><div class="infomain">'+discription+'</div></div>';
        $("#news_detail_main").html(html);
        $.mobile.changePage("#news_detail", "pop", true);
    });

     $(".rss_feeds_list").click(function(){
        var html = '';
        var img = $( this ).find( "img" ).html();
        var title = $( this ).find( "h2" ).html();
        var discription1 = $( this ).find( "p" ).html();
        var discription2 = $( this ).find( "div" ).text();
        $("#rssTitleId").html(title);
        html += '<div class="wrappoprop"><p class="datebgtop">'+discription1+'</p><div id="title"><h3 class="globe_hd">'+title+'</h3><div style="clear:both"></div><div id="summary">'+discription2+'</div></div></div>';
        $("#rss_detail_main").html(html);
        $.mobile.changePage("#rss_detail", "pop", true);
    });

     $(".podcast_list").click(function(){
        var html = '';
        var img = $( this ).find( "img" ).html();
        var title = $( this ).find( "h2" ).html();
        var discription1 = $( this ).find( "p" ).html();
        var discription2 = $( this ).find( "div" ).text();
        $("#podcastTitleId").html(title);
        html += '<div class="wrappoprop"><p class="datebgtop">'+discription1+'</p><div id="title"><h3 class="globe_hd">'+title+'</h3><div style="clear:both"></div><div id="summary">'+discription2+'</div></div></div>';
        $("#podcast_detail_main").html(html);
        $.mobile.changePage("#podcast_detail", "pop", true);
    });
    
    $(".2tire_list").click(function(){
        var html = '';
       var img = $( this ).find( "span.vheaderimageid" ).html();
        //   var img=$(".vheaderimageid").text();		


        var title = $( this ).find( "h2" ).html();
        var discription = $( this ).find( "h5" ).html();

        //console.log(img);
        $("#2tireTitleId").html(title);
        if(img !=''){
            html += '<div class="headimagemain headtopspace"><img src="'+img+'"></div>';    
        }
        
        html += '<div>';
        html += '<ul data-role="listview" data-inset="true" class="listradius">';
            html += '<li data-role="list-divider" role="heading" class="sectionheader">Description</li>';
        html += '</ul>';
        
        html += '</div>';
         
        html += '<div class="detail_part"><div class="infomain">'+discription+'</div></div>';
        //alert(discription);
        $("#2tire_detail_main").html(html);
        $(".infomain > a:first").remove();
        $.mobile.changePage("#2tire_detail", "pop", true);
    });

    $(".mapshow").click(function(){
        $.mobile.changePage("#map_container")
        var lat = $(this).attr('latid');
        var lon = $(this).attr('longid');

        var vWebsite = $( this ).find( "h2" ).html();
        var vEmail = $( this ).find( "p" ).html();
        var vCallUs = $( this ).find( "h3" ).html();

        console.log(vWebsite)
        console.log(vEmail)
        console.log(vCallUs)

        if(vWebsite != ''){
            $(".websitebtn").attr("href", vWebsite);
        }else{
            $(".websitebtn").attr("href", '#');
        }
        if(vEmail != ''){
            $(".sendemlbtn").attr("href", 'mailto:'+vEmail+'?subject=Map Direction Email&body=Your message within Main Body');
        }else{
            $(".sendemlbtn").attr("href", '#');
        }
        if(vCallUs != ''){
            $(".callusnew").attr("href", 'tel:+'+vCallUs);
        }else{
            $(".callusnew").attr("href", '#');
        }
        
        var myLatlng = new google.maps.LatLng(lat, lon);
        var mapOptions = {
            zoom: 8,
            center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
        });
        setTimeout(function () {
            google.maps.event.trigger(map, "resize")
            map.setCenter(myLatlng);
        }, 4000);
    });
    

    /**
        Mayur Gajjar
        Date : 9/8/2014
    **/
   
	
    $(".maparoundus").click(function(){
        $.mobile.changePage("#map_container1")
	    var myLatlng = new google.maps.LatLng(home_details[0]['vLatitude'],home_details[0]['vLongitude']);
        var mapOptions = {
            zoom: 4,
            center: myLatlng,
        }
		var map = new google.maps.Map(document.getElementById("map_canvas_2"), mapOptions);
		var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
			title: home_details[0]['vCity'],
        });
		
		// defines aroundus markers with different color
        var res = new Array();
        for(var i=0;i<allaroundusdata_encode.length;i++)
        {
		    var pinColor = allaroundusdata_encode[i]['rCatColor'];
            res[i] = pinColor.slice(1,7);
        }
        var pinImage = new Array();
	    var pinShadow = new Array();
        
        // markers coloring
        for(k=0;k<res.length;k++)
        {
			pinImage[k] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + res[k],
                new google.maps.Size(21, 34),
                new google.maps.Point(0,0),
                new google.maps.Point(10, 34));
                
            pinShadow[k] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
                new google.maps.Size(40, 37),
                new google.maps.Point(0, 0),
                new google.maps.Point(12, 35));
        }
            
        var locations = [];
        for(var i=0;i<allaroundusdata_encode.length;i++)
        {

		    var city = allaroundusdata_encode[i]['rCity'];
            var rLatitude = allaroundusdata_encode[i]['rLatitude'];
            var rLongitude = allaroundusdata_encode[i]['rLongitude'];
            locations.push ({name:city, latlng: new google.maps.LatLng(rLatitude, rLongitude)});


		}
         
        for(var i=0;i < locations.length;i++) 
        {
            var marker = new google.maps.Marker({position: locations[i].latlng,map:map, title:locations[i].name,icon: pinImage[i],shadow: pinShadow[i]});
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  infowindow.setContent(locations[i].name);
                  infowindow.open(map, marker);
                }
            })(marker, i));
        }
            
        setTimeout(function () {
            google.maps.event.trigger(map, "resize")
            map.setCenter(myLatlng);
        }, 4000);
    });
});

$(window).load(function(){
var pageHeight=$("div[data-role=page]").outerHeight();
    var windowHeight=$(window).height();
    // var pageNumber=$("div[data-role=page]").length;
    // pageNumber.
    $.each($("div[data-role=page]"), function (){
        // if ($(this).attr("id")+" > div[data-role=content]" != 'undefined')
        if($(this).attr("id")=="default_menu")
        {

        }
        else
        {
        var headerHeight=$("#"+$(this).attr("id")+" > div[data-role=header]").height();
        var contentHeight=$("#"+$(this).attr("id")+" > div[data-role=content]").height();
        var footerHeight=$("#"+$(this).attr("id")+" > div[data-role=footer]").height();
        
        $(this).css('min-height','338px !important');        
        $("#"+$(this).attr("id")+" > div[data-role=content]").css('height', windowHeight-(headerHeight+footerheight));
        $("#"+$(this).attr("id")+" .bgFullLength").css('min-height','338px');
        $("#"+$(this).attr("id")+" .infomain > div").css('height',windowHeight-(headerHeight+footerheight));
        
        }
    });
   
});


/**
	Developer : Himanshu
	Date : 1/9/2014
	Description : Reservation
**/
function schedule_reservation(iApplication){
	// url for webservices
		var url = web_url+'get_reservation_location';
		$.ajax({
            url: url,
            type: "GET",
            dataType: "jsonp",
            data: "iApplicationId=" + iApplication,
            crossDomain: true,
            success: function (data) 
			{
				//alert("Got Location Details");
				//alert(data[0].iLocationId);
				var html ='';
				console.log(data);
				html +='<ul data-role="listview" data-inset="true" class="listradius">';
				for(var i=0; i<data.length; i++){
					//alert(data[i].iLocationId);
					html += '<li class="list-odd-bg" style="background:#FFEBCD;">';
					html += '<a class="" href="javascript:get_reservation_services('+data[i].iApplicationId+','+data[i].iLocationId+')">';
					html += data[i].vAddress1+'\n'+data[i].vCity+', '+data[i].vState+' '+data[i].vZip;
					html += '</a>';
					html +='</li>';				
				}
				
				html +='</ul>';
					
				$("#res_location_list").html(html);
				$.mobile.changePage("#item_detail_reservation", "pop", true);
			},
			error: function(error){
				alert('Error in Location : '+error);
			}
		});
}

function schedule_reservation1(iApplicationId){
	//service_url
	var url = web_url+'get_reservation_location';
	alert("old 2: "+url);
	$.ajax({
		url: url,
		type: "GET",
		dataType:'jsonp',
		data: "iApplicationId=" + iApplicationId,
		crossDomain: true,
		success: function(data){
			//alert("Got Location Details");
			//alert(data[0].iLocationId);
			var html ='';
			console.log(data);
			html +='<ul data-role="listview" data-inset="true" class="listradius">';
			for(var i=0; i<data.length; i++){
				//alert(data[i].iLocationId);
				html += '<li class="list-odd-bg" style="background:#FFEBCD;">';
				html += '<a class="" href="javascript:get_reservation_services('+data[i].iApplicationId+','+data[i].iLocationId+')">';
				html += data[i].vAddress1+'\n'+data[i].vCity+', '+data[i].vState+' '+data[i].vZip;
				html += '</a>';
				html +='</li>';				
			}
			
            html +='</ul>';
				
			$("#res_location_list").html(html);
            $.mobile.changePage("#item_detail_reservation", "pop", true);
		},
		error: function(error){
			alert('Error in Location');
		}
	});
	
	return false;
}

function get_reservation_services(iApplicationId,iLocationId)
{
	// url for webservices
	var url = web_url+'get_reservation_services';
	$.ajax({
		url: url,
		type: "GET",
		dataType: "jsonp",
		data: "iApplicationId=" + iApplicationId + "&iLocationId=" + iLocationId,

		crossDomain: true,
		success: function (data) 

		{
			//alert("Got Service Details");
			//alert(data[0].iLocationId);

			var html ='';
			console.log(data);
			html +='<ul data-role="listview" data-inset="true" class="listradius">';
			for(var i=0; i<data.length-1; i++){
				html += '<li class="list-odd-bg" style="background:#FFEBCD;">';
				html += '<a class="" href="javascript:book_service('+data[i].iApplicationId+','+iLocationId+','+data[i].iServiceId+')">';
				html += data[i].vServiceName+'\n';
				html += '$'+data[i].vPrice+'&nbsp&nbsp'+data[i].iDuration+'\n';
				//html += '<a href="javascript:book_service('+data[i].iApplicationId+','+iLocationId+','+data[i].iServiceId+')">Book It</a>';
				html += '</a>';
				html +='</li>';		
		}
			
			html +='</ul>';
			$("#vAddress1_curr").val(data[data.length-1].vAddress1);
			$("#vAddress_city_curr").val(data[data.length-1].vCity);
			$("#vAddress_state_curr").val(data[data.length-1].vState);
			$("#vAddress_zip_curr").val(data[data.length-1].vZip);
			/*$("#res_service_list").html(html);
			$.mobile.changePage("#item_detail_main", "pop", true); */
		   $("#res_service_list").html(html);
		   $.mobile.changePage("#res_service_page", "pop", true);
		},
		error: function(error){
			alert('Error in Service : '+error);
		}
	});
}

function get_reservation_services1(iApplicationId,iLocationId){
	$.ajax({
		url: service_url,
		type: "POST",
		data: {action:'get_reservation_services',iApplicationId:''+iApplicationId+'',iLocationId:''+iLocationId+''},
		dataType:'json',
		success: function(data){
			//alert("Got Service Details");
			//alert(data[0].iLocationId);
			var html ='';
			console.log(data);
			html +='<ul data-role="listview" data-inset="true" class="listradius">';
			for(var i=0; i<data.length-1; i++){
				html += '<li class="list-odd-bg" style="background:#FFEBCD;">';
				html += '<a class="" href="javascript:book_service('+data[i].iApplicationId+','+iLocationId+','+data[i].iServiceId+')">';
				html += data[i].vServiceName+'\n';
				html += '$'+data[i].vPrice+'&nbsp&nbsp'+data[i].iDuration+'\n';
				//html += '<a href="javascript:book_service('+data[i].iApplicationId+','+iLocationId+','+data[i].iServiceId+')">Book It</a>';
				html += '</a>';
				html +='</li>';		
			}
			
            html +='</ul>';
            $("#vAddress1_curr").val(data[data.length-1].vAddress1);
			$("#vAddress_city_curr").val(data[data.length-1].vCity);
			$("#vAddress_state_curr").val(data[data.length-1].vState);
			$("#vAddress_zip_curr").val(data[data.length-1].vZip);
			/*$("#res_service_list").html(html);
            $.mobile.changePage("#item_detail_main", "pop", true); */
           $("#res_service_list").html(html);
           $.mobile.changePage("#res_service_page", "pop", true);
		},
		error: function(error){
			alert('Error in Service');
		}
	});
	
	return false;
}

function book_service(iApplicationId,iLocationId,iServiceId){
	// url for webservices
		var url = web_url+'get_current_day_time';
		var d = new Date();
    	var n = d.getDay();
		
		$.ajax({
            url: url,
            type: "GET",
            dataType: "jsonp",
            data: "iServiceId=" + iServiceId + "&iDay=" + n,
            crossDomain: true,
            success: function (data) 
			{
				//alert('Service Fetch Successful');
				//alert(data.length);
				//alert(data[0]);
				html = '';
				//alert(parseInt(data[0].length));
				for(var i = 0; i < data[0].length ; i++){
					//html += '<input type="radio" name="service_time" id="service_time'+i+'" value="'+data[i]+'" ><label for="service_time'+i+'">'+data[i]+'</label>';
					//html += '<input type="radio" name="service_time" id="service_time'+i+'" value="'+data[0][i]+'" ><label for="service_time'+i+'">'+data[0][i]+'</label>';
					html += '<option value="'+data[0][i]+'" >'+data[0][i]+'</option>';
				}
				$("#iApplicationId_book").val(iApplicationId);
				$("#iLocationId_book").val(iLocationId);
				$("#iServiceId_book").val(iServiceId);
				$("#vServiceName_curr").val(data[1][0]);
				$("#vServicePrice_curr").val(data[1][1]);
				$("#vServiceReservationFees_curr").val(data[1][2]);
				

				//$("#controlgroup").html(html);
				$("#event_day_time").html(html);
				$.mobile.changePage("#res_datepicker_page", "pop", true);
			},
			error: function(error){
				alert('Error in Service Fetch: '+error);
			}
		});
}

function book_service1(iApplicationId,iLocationId,iServiceId){
	//alert("In Book Service");
	var d = new Date();
    var n = d.getDay();
    
    $.ajax({
		url: service_url,
		type: "POST",
		data: {action:'get_current_day_time',iServiceId:''+iServiceId+'',iDay:''+n+''},
		dataType:'json',
		success: function(data){
			//alert('Service Fetch Successful');
			//alert(data.length);
			//alert(data[0]);
			html = '';
			//alert(parseInt(data[0].length));
			for(var i = 0; i < data[0].length ; i++){
				//html += '<input type="radio" name="service_time" id="service_time'+i+'" value="'+data[i]+'" ><label for="service_time'+i+'">'+data[i]+'</label>';
				html += '<input type="radio" name="service_time" id="service_time'+i+'" value="'+data[0][i]+'" ><label for="service_time'+i+'">'+data[0][i]+'</label>';
			}
			$("#iLocationId_book").val(iLocationId);
			$("#iServiceId_book").val(iServiceId);
			$("#vServiceName_curr").val(data[1][0]);
			$("#vServicePrice_curr").val(data[1][1]);
			$("#vServiceReservationFees_curr").val(data[1][2]);
			
			$("#controlgroup").html(html);
		    $.mobile.changePage("#res_datepicker_page", "pop", true);
		   
		},
		error: function(error){
			alert('Error in Service Fetch');
		}
	});
    return false;
}
$(document).ready(function () {
	$("#date").datepicker({
		dateFormat: 'dd-mm-yy',
		onSelect: function () {
			var url = web_url+'get_current_day_time';
			
			var date = $("#date").val();
			var from = $("#date").val().split("-");
			var f = new Date(from[2], from[1] - 1, from[0]);
			weekday_value = f.getDay();
			var iServiceId_book=$("#iServiceId_book").val();
			//alert(iServiceId_book);
			//alert(weekday_value);
			$.ajax({
				url: url,
				type: "GET",
				data: "iServiceId="+iServiceId_book+"&iDay="+weekday_value,
				dataType:'jsonp',
				crossDomain: true,
				success: function(data){
					//alert('Service Fetch Successful');
					alert(data[0].length);
					//alert(data[0]);
					//$("#timing_slider").html('');
					//$("#timing_slider").empty();
					$( "#controlgroup" ).empty();

					var html = '';
					var $el1;
					for(var i = 0; i < data[0].length ; i++){
						//$el1 = $('<input name="radiobtn" type="radio" id="service_time'+i+'" value="'+data[0][i]+'">');
					    //$("#controlgroup").controlgroup("container")["append"]($el1);
					    //$el1.button();
					    html += '<option value="'+data[0][i]+'" >'+data[0][i]+'</option>';
					    
					}
					//$("#controlgroup").controlgroup("refresh");


					$("#event_day_time").html(html);
					$.mobile.changePage("#res_datepicker_page", "pop", true);
					
					//$("#controlgroup").html(html1)
					//$('#res_datepicker_page').live( 'pageshow', initPage );
					//var title = document.getElementById('timing_slider');
   					//title.innerHTML = html;
   					//$("#timing_slider").html(html1);
					//$("#timing_slider").replaceWith(html1);
					//$.mobile.changePage("#res_datepicker_page1", "pop", true);
					//$.mobile.loadPage( "#res_datepicker_page", "pop", true );
				},
				error: function(error){
					alert('Error in Service Fetch');
				}
			});
		    return false;
			
		}
	});
})(jQuery);

function book_details(){
	var vServiceName=$("#vServiceName_curr").val();
	var vAddress1=$("#vAddress1_curr").val();
	var vCity=$("#vAddress_city_curr").val();
	var vState=$("#vAddress_state_curr").val();
	var vZip=$("#vAddress_zip_curr").val();
	var vPrice=$("#vServicePrice_curr").val();
	var vReservationFees=$("#vServiceReservationFees_curr").val();
	var date=$("#date").val();
	//var service_time=$('input[name="service_time"]:checked').val();
	var service_time=$('#event_day_time').val();

	
	/*console.log(vServiceName);
	console.log(vAddress1);
	console.log(vCity);
	console.log(vState);
	console.log(vZip);
	console.log(vPrice);
	console.log(vReservationFees);
	console.log(date);
	console.log(service_time);*/
	
	$("#res_preview_serv_name").html(vServiceName);
	$("#res_preview_serv_address").html(vAddress1);
	$("#res_preview_serv_city").html(vCity);
	$("#res_preview_serv_state").html(vState);
	$("#res_preview_serv_zip").html(vZip);
	$("#res_preview_serv_date").html(date);
	$("#res_preview_serv_time").html(service_time);
	$("#res_preview_serv_price").html(vPrice);
	$("#res_preview_serv_fees").html(vReservationFees);
	
	
	//$("#res_service_preview_data").html(html);
	$.mobile.changePage("#res_service_preview", "pop", true);
}

function book_details_login(){
	$.mobile.changePage("#res_service_login", "pop", true);
}

function res_sign_up(){
	$.mobile.changePage("#res_service_signup", "pop", true);
}

function res_fp(){
	$.mobile.changePage("#res_service_forgotpass", "pop", true);
}

function book_service_confirm(){
	var url = web_url+'book_service_confirm';
	var iApplicationId = $("#iApplicationId_book").val();
	//var iUserId = $("#").val();
	var iUserId = 1;
	var iLocationId = $("#iLocationId_book").val();
	var iServiceId = $("#iServiceId_book").val();
	var vServicePrice = $("#vServicePrice_curr").val();
	var vServiceFees = $("#vServiceReservationFees_curr").val();
	var vDate = $("#date").val();;
	var vTime = $('#event_day_time').val();
	
		
	$.ajax({
        url: url,
        type: "GET",
        dataType: "jsonp",
        data: "iApplicationId=" + iApplicationId + "&iUserId=" + iUserId + "&iLocationId="+iLocationId+"&iServiceId="+iServiceId+"&vServicePrice="+vServicePrice+"&vServiceFees="+vServiceFees+"&vDate="+vDate+"&vTime="+vTime,
        crossDomain: true,
        success: function (data) 
		{
			$.mobile.changePage("#reservation_0", "pop", true);
		},
		error: function(error){
			alert('Error in Service Fetch: '+error);
		}
	});	
}

function show_res_tabs(id1,id2){
	$("#"+id1).show();
	$("#"+id2).hide();
}
var save_sharedata = "http://admin.easy-apps.co.uk/webservice?action=save_share";
$(document).ready(function() {
$(".owl-carousel").owlCarousel({
navigation : true
});
});
function join_mailing(){
var vMailName = $("#vMailName").val();
var vEmail = $("#vMail").val();
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
var isvalid = emailReg.test(vEmail);
if(vMailName==""){
$("#msg").html("Please enter name");
$("#mailing_validation").show();
$("#vMailName").focus();
return false;
}
else{
$("#mailing_validation").hide();
}
if(vEmail==""){
$("#msg").html("Please enter email");
$("#mailing_validation").show();
$("#vMail").focus();
return false;
}
else{
$("#mailing_validation").hide();
}
if(isvalid== false){
$("#msg").html("Please Enter Valid Email");
$("#mailing_validation").show();
$("#vMail").focus();
return false;
}
else{
$("#mailing_validation").hide();
}
var vMailName = $("#vMailName").val();
var vEmail = $("#vMail").val();
var iCategoryId = $("#iCategoryId").val();
var iAppTabId = $("#iAppTabId_Mail").val();
var iApplicationId = 154;
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_mail",
type: "GET",
data:"vMailName="+vMailName+"&vEmail="+vEmail+"&iApplicationId="+iApplicationId+"&iCategoryId="+iCategoryId+"&iAppTabId="+iAppTabId,
success: function(result)
{
$("#vMailName").val("");
$("#vMail").val(" ");
if(result == "Exist"){
$("#alertMsg").html("News letter send successfully");
$.mobile.changePage("#Dialog", "pop", true, true);
}else if(result = "Success"){
$("#alertMsg").html("News letter send successfully");
$.mobile.changePage("#Dialog", "pop", true, true);
}else{
$("#alertMsg").html("Error in send news letter");
$.mobile.changePage("#Dialog", "pop", true, true);
}}
});
}
function save_contactus(){
var vName = $("#vName").val();
var vEmail = $("#vEmail").val();
var vContactNumber = $("#vContactNumber").val();
var tMessage = $("#tMessage").val();
var iAppTabId = $("#iAppTabId_eMail").val();
var iApplicationId = 154;
var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
var isvalid = emailReg.test(vEmail);
var regex = /^[\d\s\(\)\-]+$/g;
var isvalidnumber = regex.test(vContactNumber);
if(vName==""){
$("#msgcontact").html("Please enter Name.");
$("#contactus_validation").show();
$("#vName").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(vEmail==""){
$("#msgcontact").html("Please enter email.");
$("#contactus_validation").show();
$("#vEmail").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(isvalid== false){
$("#msgcontact").html("Please Enter Valid Email.");
$("#contactus_validation").show();
$("#vEmail").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(vContactNumber == ""){
$("#msgcontact").html("Please Enter Number.");
$("#contactus_validation").show();
$("#vContactNumber").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(isvalidnumber== false){
$("#msgcontact").html("Please Enter Valid Number.");
$("#contactus_validation").show();
$("#vContactNumber").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(tMessage ==""){
$("#msgcontact").html("Please Enter message.");
$("#contactus_validation").show();
$("#tMessage").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_contactus",
type: "GET",
data:"vName="+vName+"&vEmail="+vEmail+"&iApplicationId="+iApplicationId+"&vContactNumber="+vContactNumber+"&tMessage="+tMessage+"&iAppTabId="+iAppTabId,
success: function(result)
{
$("#Name").val(" ");
$("#vEmail").val(" ");
$("#vContactNumber").val(" ");
$("#tMessage").val(" ");
if(result == 1){
$("#alertMsg").html("Error in ContactUs");
$.mobile.changePage("#Dialog", "pop", true, true);
}else{
$("#alertMsg").html("submit successfully");
$.mobile.changePage("#Dialog", "pop", true, true);
}}
});
}
function book_service_confirm(){
var iApplicationId = $("#iApplicationId_book").val();
var iUserId = 1;
var iLocationId = $("#iLocationId_book").val();
var iServiceId = $("#iServiceId_book").val();
var iServiceId_book = $("#iServiceId_book").val();
var vServicePrice = $("#vServicePrice_curr").val();
var vServiceFees = $("#vServiceReservationFees_curr").val();
var vDate = $("#date").val();
var vTime = $("#event_day_time").val();
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=book_service_confirm",
type: "GET",
dataType: "jsonp",
data: "iApplicationId=" + iApplicationId + "&iUserId=" + iUserId + "&iLocationId="+iLocationId+"&iServiceId="+iServiceId+"&vServicePrice="+vServicePrice+"&vServiceFees="+vServiceFees+"&vDate="+vDate+"&vTime="+vTime,
success: function (result)
{
$.mobile.changePage("#reservation_thanks");
}
});
}
function getLocation(){
if (navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition);
}else{
x.innerHTML="Geolocation is not supported by this browser.";
}
}
function showPosition(position){
$.mobile.changePage( "#map_direction")
var cur_lat = position.coords.latitude;
var cur_lang = position.coords.longitude;
console.log(cur_lat);
console.log(cur_lang);
var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var start = new google.maps.LatLng(cur_lat,cur_lang);
var end ="   ";
console.log(end);
var request = {
origin:start,
destination:end,
travelMode: google.maps.TravelMode.DRIVING
};
directionsService.route(request, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
directionsDisplay.setDirections(response);
}
});
directionsDisplay = new google.maps.DirectionsRenderer();
var mapOptions = {
center: start,
zoom: 10
}
map = new google.maps.Map(document.getElementById("map-canvas1"), mapOptions);
directionsDisplay.setMap(map);
directionsDisplay.setPanel(document.getElementById("panel"));
setTimeout(function() {google.maps.event.trigger(map, "resize")
map.setCenter(start);
}, 500);}
function getLocation(){
if (navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition);
}else{
x.innerHTML="Geolocation is not supported by this browser.";
}
}
function showPosition(position){
$.mobile.changePage( "#map_direction")
var cur_lat = position.coords.latitude;
var cur_lang = position.coords.longitude;
console.log(cur_lat);
console.log(cur_lang);
var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var start = new google.maps.LatLng(cur_lat,cur_lang);
var end ="   ";
console.log(end);
var request = {
origin:start,
destination:end,
travelMode: google.maps.TravelMode.DRIVING
};
directionsService.route(request, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
directionsDisplay.setDirections(response);
}
});
directionsDisplay = new google.maps.DirectionsRenderer();
var mapOptions = {
center: start,
zoom: 10
}
map = new google.maps.Map(document.getElementById("map-canvas2"), mapOptions);
directionsDisplay.setMap(map);
directionsDisplay.setPanel(document.getElementById("panel"));
setTimeout(function() {google.maps.event.trigger(map, "resize")
map.setCenter(start);
}, 500);}
function shareFacebook(){
var title = "Easyapps Webapp";
var mylink = "http://admin.easy-apps.co.uk/";
var message = "I have been using this WebApp. Please check it out at";
var redir_url = "http://admin.easy-apps.co.uk/";
var ContestImage = "http://admin.easy-apps.co.uk/assets/images/logo.png";
var name = "SLB";
//var fburl = "https://www.facebook.com/dialog/feed?%20app_id=559662177417368&link="+encodeURIComponent(mylink)+"&caption="+encodeURIComponent(title)+"&description="+encodeURIComponent(message)+"&redirect_uri="+encodeURIComponent(redir_url);
var fburl = "https://www.facebook.com/dialog/feed?%20app_id=600784816630414&link="+encodeURIComponent(mylink)+"&picture="+encodeURIComponent(ContestImage)+"&name="+encodeURIComponent(name)+"&caption="+encodeURIComponent(title)+"&description="+encodeURIComponent(message)+"&redirect_uri="+encodeURIComponent(redir_url);
window.plugins.childBrowser.showWebPage(fburl);
window.plugins.childBrowser.onLocationChange = function(loc){
if(loc.indexOf("post_id")!=-1){
window.plugins.childBrowser.close();
}
}
}
function shareTwitter(){
var shareurl = "http://admin.easy-apps.co.uk/";
var text = "I have been using this WebApp. Please check it out at";
var id = null;
window.plugins.childBrowser.showWebPage("https://twitter.com/intent/tweet?url="+encodeURIComponent(shareurl)+"&text="+encodeURIComponent(text), {showLocationBar: true });
window.plugins.childBrowser.onLocationChange = function(loc){
var url2 = loc.split("?");
var url3 = url2.split("&");
id = url3.split("=");
if(id !== " " || id !== null){
//window.plugins.childBrowser.close();
}
}
if(id !== " " && id !== null){
window.plugins.childBrowser.close();
}
}
var totAmt = parseInt(0);
var amount_arr = new Array();
var itemname_arr = new Array();
$(document).ready(function() {
$(".itemfee").bind("click", function(){
var amt = $(this).attr("amount");
var item = $(this).attr("itemname");
if (this.checked) {
totAmt += parseInt(amt);
itemname_arr.push(item);
amount_arr.push(amt);
}else{
totAmt -= parseInt(amt);
var item_index = itemname_arr.indexOf(item);
var amount_index = amount_arr.indexOf(amt);
itemname_arr.splice(item_index, 1);
amount_arr.splice(amount_index, 1);
}
if (totAmt > 0) {
$("#mainPayFrm").show();
}else{
$("#mainPayFrm").hide();
}
console.log("total=="+totAmt);
console.log("item=="+JSON.stringify(itemname_arr));
console.log("amt=="+JSON.stringify(amount_arr));
$("#replaceAmt").html(totAmt+" GBP");
});
});
function paynow() {
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
if (!$("#vFirstName").val()) {
$("#alertMsg").html("Please enter first name");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vLastName").val()){
$("#alertMsg").html("Please enter last name");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vEmail").val()){
$("#alertMsg").html("Please enter email");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if (!emailReg.test($("#vEmail").val())) {
$("#alertMsg").html("Please enter valid email address");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vHolderName").val()){
$("#alertMsg").html("Please enter holder name");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vCreditCardType").val()){
$("#alertMsg").html("Please choose card type");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vCreditCardNumber").val()){
$("#alertMsg").html("Please enter card number");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if (!checkCreditCard ($("#vCreditCardNumber").val(),$("#vCreditCardType").val())) {
$("#alertMsg").html("Please enter valid type and number");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vMonth").val()){
$("#alertMsg").html("Please choose expire month");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vYear").val()){
$("#alertMsg").html("Please choose expire year");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(CheckDate(($("#vMonth").val()),($("#vYear").val())) == "invalid"){
$("#alertMsg").html("Please enter valid month and year");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vCvv").val()){
$("#alertMsg").html("Please enter cvv number");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else{
var vFirstName = $("#vFirstName").val();
var vLastName = $("#vLastName").val();
var vEmail = $("#vEmail").val();
var vHolderName = $("#vHolderName").val();
var vCreditCardType = $("#vCreditCardType").val();
var vCreditCardNumber = $("#vCreditCardNumber").val();
var vMonth = $("#vMonth").val();
var vYear = $("#vYear").val();
var vCvv = $("#vCvv").val();
var iClientId = $("#iClientId").val();
var iApplicationId = $("#iApplicationId").val();
var iAppTabId = $("#iAppTabId").val();
$.mobile.loading( "show" );
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_payment",
type: "GET",
dataType: "jsonp",
data:"vFirstName=" + vFirstName + "&vLastName=" + vLastName + "&vEmail=" + vEmail + "&vHolderName=" + vHolderName + "&vCreditCardType=" + vCreditCardType+ "&vCreditCardNumber=" + vCreditCardNumber+ "&vMonth=" + vMonth + "&vYear=" + vYear + "&vCvv=" + vCvv + "&fTotalPrice=" + totAmt + "&iClientId=" + iClientId + "&iApplicationId=" + iApplicationId+ "&iAppTabId=" + iAppTabId,
crossDomain:true,
success: function(result)
{
$("#vFirstName").val(" ");
$("#vLastName").val(" ");
$("#vEmail").val(" ");
$("#vHolderName").val(" ");
$("#vCreditCardType").val(" ");
$("#vCreditCardNumber").val(" ");
$("#vMonth").val(" ");
$("#vYear").val(" ");
$("#vCvv").val(" ");
$.mobile.loading( "hide" );
if (result[0].msg == "Success") {
save_detail(result[0].iFeePaymentId);
$.mobile.changePage("#payment_thanks");
} else {
$("#alertMsg").html("Error in save information");
$.mobile.changePage("#Dialog", "pop", true);

}
}
});
}
}
function save_detail(iFeePaymentId) {
for(var i=0;i<amount_arr.length;i++){
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_payment_detail",
type: "GET",
dataType: "jsonp",
data: "iFeePaymentId=" + iFeePaymentId + "&vFeetype=" + itemname_arr[i] + "&fPrice=" + amount_arr[i],
crossDomain: true,
success: function (result) {
if (result[0].msg == "Success") {
} else {
}
}
});
}
}
function twitterLogin(){
$("#fbShareMain").hide();
if (localStorage.getItem(twitterKey) !== null) {
Twitter.tweet();
} else {
Twitter.init();
}
}
function twitterTweet(){
Twitter.tweet();
}
function facebookLogin(){
$("#tweetPost").hide();
app.init();
}
function qrcodemakedetail(id) {
$("#qrdetail_detail").html(null);
var qrcode = new QRCode(document.getElementById("qrdetail_detail"), {
width : 280,
height : 200
});
function makeCode () {
qrcode.makeCode(id);
}$("qrdetail_detail").
show(makeCode());
title="Qr Code"
$("#qrcodetitle").html(title);
$("#qrdetail_detail").html(makeCode());
$.mobile.changePage("#qrcode_detail_main", "pop", true);
}

var save_sharedata = "http://admin.easy-apps.co.uk/webservice?action=save_share";
$(document).ready(function() {
$(".owl-carousel").owlCarousel({
navigation : true
});
});
$(document).on("pageshow", "#home_0",function (data) {
                    $("#home_0").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#home_0").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#event_1",function (data) {
                    $("#event_1").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#event_1").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#menu_2",function (data) {
                    $("#menu_2").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#menu_2").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#mailinglist_3",function (data) {
                    $("#mailinglist_3").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#mailinglist_3").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#pdf_4",function (data) {
                    $("#pdf_4").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#pdf_4").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#rss_feeds_5",function (data) {
                    $("#rss_feeds_5").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#rss_feeds_5").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#website_6",function (data) {
                    $("#website_6").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#website_6").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#youtube_7",function (data) {
                    $("#youtube_7").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#youtube_7").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#location_8",function (data) {
                    $("#location_8").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#location_8").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#gallery_9",function (data) {
                    $("#gallery_9").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#gallery_9").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#around_us_10",function (data) {
                    $("#around_us_10").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#around_us_10").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#socialmedia_11",function (data) {
                    $("#socialmedia_11").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#socialmedia_11").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#qrcode_12",function (data) {
                    $("#qrcode_12").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#qrcode_12").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#order_14",function (data) {
                    $("#order_14").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#order_14").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#reservation_15",function (data) {
                    $("#reservation_15").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#reservation_15").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#loyalty_16",function (data) {
                    $("#loyalty_16").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#loyalty_16").css("background-size", "100% 100%");
                });
$(document).on("pageshow", "#message_18",function (data) {
                    $("#message_18").css("background", "url(http://admin.easy-apps.co.uk/uploads/background_image/123/org_bg188.png)");
					$("#message_18").css("background-size", "100% 100%");
                });
function join_mailing(){
var vMailName = $("#vMailName").val();
var vEmail = $("#vMail").val();
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
var isvalid = emailReg.test(vEmail);
if(vMailName==""){
$("#msg").html("Please enter name");
$("#mailing_validation").show();
$("#vMailName").focus();
return false;
}
else{
$("#mailing_validation").hide();
}
if(vEmail==""){
$("#msg").html("Please enter email");
$("#mailing_validation").show();
$("#vMail").focus();
return false;
}
else{
$("#mailing_validation").hide();
}
if(isvalid== false){
$("#msg").html("Please Enter Valid Email");
$("#mailing_validation").show();
$("#vMail").focus();
return false;
}
else{
$("#mailing_validation").hide();
}
var vMailName = $("#vMailName").val();
var vEmail = $("#vMail").val();
var iCategoryId = $("#iCategoryId").val();
var iAppTabId = $("#iAppTabId_Mail").val();
var iApplicationId = 153;
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_mail",
type: "GET",
data:"vMailName="+vMailName+"&vEmail="+vEmail+"&iApplicationId="+iApplicationId+"&iCategoryId="+iCategoryId+"&iAppTabId="+iAppTabId,
success: function(result)
{
$("#vMailName").val("");
$("#vMail").val(" ");
if(result == "Exist"){
$("#alertMsg").html("News letter send successfully");
$.mobile.changePage("#Dialog", "pop", true, true);
}else if(result = "Success"){
$("#alertMsg").html("News letter send successfully");
$.mobile.changePage("#Dialog", "pop", true, true);
}else{
$("#alertMsg").html("Error in send news letter");
$.mobile.changePage("#Dialog", "pop", true, true);
}}
});
}
function save_contactus(){
var vName = $("#vName").val();
var vEmail = $("#vEmail").val();
var vContactNumber = $("#vContactNumber").val();
var tMessage = $("#tMessage").val();
var iAppTabId = $("#iAppTabId_eMail").val();
var iApplicationId = 153;
var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
var isvalid = emailReg.test(vEmail);
var regex = /^[\d\s\(\)\-]+$/g;
var isvalidnumber = regex.test(vContactNumber);
if(vName==""){
$("#msgcontact").html("Please enter Name.");
$("#contactus_validation").show();
$("#vName").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(vEmail==""){
$("#msgcontact").html("Please enter email.");
$("#contactus_validation").show();
$("#vEmail").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(isvalid== false){
$("#msgcontact").html("Please Enter Valid Email.");
$("#contactus_validation").show();
$("#vEmail").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(vContactNumber == ""){
$("#msgcontact").html("Please Enter Number.");
$("#contactus_validation").show();
$("#vContactNumber").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(isvalidnumber== false){
$("#msgcontact").html("Please Enter Valid Number.");
$("#contactus_validation").show();
$("#vContactNumber").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
if(tMessage ==""){
$("#msgcontact").html("Please Enter message.");
$("#contactus_validation").show();
$("#tMessage").focus();
return false;
}
else{
$("#contactus_validation").hide();
}
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_contactus",
type: "GET",
data:"vName="+vName+"&vEmail="+vEmail+"&iApplicationId="+iApplicationId+"&vContactNumber="+vContactNumber+"&tMessage="+tMessage+"&iAppTabId="+iAppTabId,
success: function(result)
{
$("#Name").val(" ");
$("#vEmail").val(" ");
$("#vContactNumber").val(" ");
$("#tMessage").val(" ");
if(result == 1){
$("#alertMsg").html("Error in ContactUs");
$.mobile.changePage("#Dialog", "pop", true, true);
}else{
$("#alertMsg").html("submit successfully");
$.mobile.changePage("#Dialog", "pop", true, true);
}}
});
}
function book_service_confirm(){
var iApplicationId = $("#iApplicationId_book").val();
var iUserId = 1;
var iLocationId = $("#iLocationId_book").val();
var iServiceId = $("#iServiceId_book").val();
var iServiceId_book = $("#iServiceId_book").val();
var vServicePrice = $("#vServicePrice_curr").val();
var vServiceFees = $("#vServiceReservationFees_curr").val();
var vDate = $("#date").val();
var vTime = $("#event_day_time").val();
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=book_service_confirm",
type: "GET",
dataType: "jsonp",
data: "iApplicationId=" + iApplicationId + "&iUserId=" + iUserId + "&iLocationId="+iLocationId+"&iServiceId="+iServiceId+"&vServicePrice="+vServicePrice+"&vServiceFees="+vServiceFees+"&vDate="+vDate+"&vTime="+vTime,
success: function (result)
{
$.mobile.changePage("#reservation_thanks");
}
});
}
function getLocation(){
if (navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition);
}else{
x.innerHTML="Geolocation is not supported by this browser.";
}
}
function showPosition(position){
$.mobile.changePage( "#map_direction")
var cur_lat = position.coords.latitude;
var cur_lang = position.coords.longitude;
console.log(cur_lat);
console.log(cur_lang);
var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var start = new google.maps.LatLng(cur_lat,cur_lang);
var end ="   ";
console.log(end);
var request = {
origin:start,
destination:end,
travelMode: google.maps.TravelMode.DRIVING
};
directionsService.route(request, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
directionsDisplay.setDirections(response);
}
});
directionsDisplay = new google.maps.DirectionsRenderer();
var mapOptions = {
center: start,
zoom: 10
}
map = new google.maps.Map(document.getElementById("map-canvas1"), mapOptions);
directionsDisplay.setMap(map);
directionsDisplay.setPanel(document.getElementById("panel"));
setTimeout(function() {google.maps.event.trigger(map, "resize")
map.setCenter(start);
}, 500);}
function getLocation(){
if (navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition);
}else{
x.innerHTML="Geolocation is not supported by this browser.";
}
}
function showPosition(position){
$.mobile.changePage( "#map_direction")
var cur_lat = position.coords.latitude;
var cur_lang = position.coords.longitude;
console.log(cur_lat);
console.log(cur_lang);
var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var start = new google.maps.LatLng(cur_lat,cur_lang);
var end ="   ";
console.log(end);
var request = {
origin:start,
destination:end,
travelMode: google.maps.TravelMode.DRIVING
};
directionsService.route(request, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
directionsDisplay.setDirections(response);
}
});
directionsDisplay = new google.maps.DirectionsRenderer();
var mapOptions = {
center: start,
zoom: 10
}
map = new google.maps.Map(document.getElementById("map-canvas2"), mapOptions);
directionsDisplay.setMap(map);
directionsDisplay.setPanel(document.getElementById("panel"));
setTimeout(function() {google.maps.event.trigger(map, "resize")
map.setCenter(start);
}, 500);}
function shareFacebook(){
var title = "Easyapps Webapp";
var mylink = "http://admin.easy-apps.co.uk/";
var message = "I have been using this WebApp. Please check it out at";
var redir_url = "http://admin.easy-apps.co.uk/";
var ContestImage = "http://admin.easy-apps.co.uk/assets/images/logo.png";
var name = "SLB";
//var fburl = "https://www.facebook.com/dialog/feed?%20app_id=559662177417368&link="+encodeURIComponent(mylink)+"&caption="+encodeURIComponent(title)+"&description="+encodeURIComponent(message)+"&redirect_uri="+encodeURIComponent(redir_url);
var fburl = "https://www.facebook.com/dialog/feed?%20app_id=600784816630414&link="+encodeURIComponent(mylink)+"&picture="+encodeURIComponent(ContestImage)+"&name="+encodeURIComponent(name)+"&caption="+encodeURIComponent(title)+"&description="+encodeURIComponent(message)+"&redirect_uri="+encodeURIComponent(redir_url);
window.plugins.childBrowser.showWebPage(fburl);
window.plugins.childBrowser.onLocationChange = function(loc){
if(loc.indexOf("post_id")!=-1){
window.plugins.childBrowser.close();
}
}
}
function shareTwitter(){
var shareurl = "http://admin.easy-apps.co.uk/";
var text = "I have been using this WebApp. Please check it out at";
var id = null;
window.plugins.childBrowser.showWebPage("https://twitter.com/intent/tweet?url="+encodeURIComponent(shareurl)+"&text="+encodeURIComponent(text), {showLocationBar: true });
window.plugins.childBrowser.onLocationChange = function(loc){
var url2 = loc.split("?");
var url3 = url2.split("&");
id = url3.split("=");
if(id !== " " || id !== null){
//window.plugins.childBrowser.close();
}
}
if(id !== " " && id !== null){
window.plugins.childBrowser.close();
}
}
var totAmt = parseInt(0);
var amount_arr = new Array();
var itemname_arr = new Array();
$(document).ready(function() {
$(".itemfee").bind("click", function(){
var amt = $(this).attr("amount");
var item = $(this).attr("itemname");
if (this.checked) {
totAmt += parseInt(amt);
itemname_arr.push(item);
amount_arr.push(amt);
}else{
totAmt -= parseInt(amt);
var item_index = itemname_arr.indexOf(item);
var amount_index = amount_arr.indexOf(amt);
itemname_arr.splice(item_index, 1);
amount_arr.splice(amount_index, 1);
}
if (totAmt > 0) {
$("#mainPayFrm").show();
}else{
$("#mainPayFrm").hide();
}
console.log("total=="+totAmt);
console.log("item=="+JSON.stringify(itemname_arr));
console.log("amt=="+JSON.stringify(amount_arr));
$("#replaceAmt").html(totAmt+" GBP");
});
});
function paynow() {
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
if (!$("#vFirstName").val()) {
$("#alertMsg").html("Please enter first name");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vLastName").val()){
$("#alertMsg").html("Please enter last name");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vEmail").val()){
$("#alertMsg").html("Please enter email");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if (!emailReg.test($("#vEmail").val())) {
$("#alertMsg").html("Please enter valid email address");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vHolderName").val()){
$("#alertMsg").html("Please enter holder name");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vCreditCardType").val()){
$("#alertMsg").html("Please choose card type");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vCreditCardNumber").val()){
$("#alertMsg").html("Please enter card number");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if (!checkCreditCard ($("#vCreditCardNumber").val(),$("#vCreditCardType").val())) {
$("#alertMsg").html("Please enter valid type and number");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vMonth").val()){
$("#alertMsg").html("Please choose expire month");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vYear").val()){
$("#alertMsg").html("Please choose expire year");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(CheckDate(($("#vMonth").val()),($("#vYear").val())) == "invalid"){
$("#alertMsg").html("Please enter valid month and year");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else if(!$("#vCvv").val()){
$("#alertMsg").html("Please enter cvv number");
$.mobile.changePage("#Dialog", "pop", true);
return false;
}else{
var vFirstName = $("#vFirstName").val();
var vLastName = $("#vLastName").val();
var vEmail = $("#vEmail").val();
var vHolderName = $("#vHolderName").val();
var vCreditCardType = $("#vCreditCardType").val();
var vCreditCardNumber = $("#vCreditCardNumber").val();
var vMonth = $("#vMonth").val();
var vYear = $("#vYear").val();
var vCvv = $("#vCvv").val();
var iClientId = $("#iClientId").val();
var iApplicationId = $("#iApplicationId").val();
var iAppTabId = $("#iAppTabId").val();
$.mobile.loading( "show" );
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_payment",
type: "GET",
dataType: "jsonp",
data:"vFirstName=" + vFirstName + "&vLastName=" + vLastName + "&vEmail=" + vEmail + "&vHolderName=" + vHolderName + "&vCreditCardType=" + vCreditCardType+ "&vCreditCardNumber=" + vCreditCardNumber+ "&vMonth=" + vMonth + "&vYear=" + vYear + "&vCvv=" + vCvv + "&fTotalPrice=" + totAmt + "&iClientId=" + iClientId + "&iApplicationId=" + iApplicationId+ "&iAppTabId=" + iAppTabId,
crossDomain:true,
success: function(result)
{
$("#vFirstName").val(" ");
$("#vLastName").val(" ");
$("#vEmail").val(" ");
$("#vHolderName").val(" ");
$("#vCreditCardType").val(" ");
$("#vCreditCardNumber").val(" ");
$("#vMonth").val(" ");
$("#vYear").val(" ");
$("#vCvv").val(" ");
$.mobile.loading( "hide" );
if (result[0].msg == "Success") {
save_detail(result[0].iFeePaymentId);
$.mobile.changePage("#payment_thanks");
} else {
$("#alertMsg").html("Error in save information");
$.mobile.changePage("#Dialog", "pop", true);

}
}
});
}
}
function save_detail(iFeePaymentId) {
for(var i=0;i<amount_arr.length;i++){
$.ajax({
url: "http://admin.easy-apps.co.uk/webservice?action=save_payment_detail",
type: "GET",
dataType: "jsonp",
data: "iFeePaymentId=" + iFeePaymentId + "&vFeetype=" + itemname_arr[i] + "&fPrice=" + amount_arr[i],
crossDomain: true,
success: function (result) {
if (result[0].msg == "Success") {
} else {
}
}
});
}
}
function twitterLogin(){
$("#fbShareMain").hide();
if (localStorage.getItem(twitterKey) !== null) {
Twitter.tweet();
} else {
Twitter.init();
}
}
function twitterTweet(){
Twitter.tweet();
}
function facebookLogin(){
$("#tweetPost").hide();
app.init();
}
function qrcodemakedetail(id) {
$("#qrdetail_detail").html(null);
var qrcode = new QRCode(document.getElementById("qrdetail_detail"), {
width : 280,
height : 200
});
function makeCode () {
qrcode.makeCode(id);
}$("qrdetail_detail").
show(makeCode());
title="Qr Code"
$("#qrcodetitle").html(title);
$("#qrdetail_detail").html(makeCode());
$.mobile.changePage("#qrcode_detail_main", "pop", true);
}
