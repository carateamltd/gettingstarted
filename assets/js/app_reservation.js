function addservice() {

	var iApplicationId=$("#iApplicationId").val()
	var iFeatureId=$("#iFeatureId").val()
	var language = $('#language').val();
	var iTabId=$("#iTabId").val()
	var vServiceName=$("#vServiceName").val()
	var vPrice=$("#vPrice").val()
	var vReservationFee=$("#vReservationFee").val()
	var vMaxService=$("#vMaxService").val()
	var iDuration=$("#iDuration").val()
	var vServiceTiming=$("#s1day1").val()+'-'+$("#e1day1").val()+','+$("#s1day2").val()+'-'+$("#e1day2").val()+','+$("#s1day3").val()+'-'+$("#e1day3").val()+','+$("#s1day4").val()+'-'+$("#e1day4").val()+','+$("#s1day5").val()+'-'+$("#e1day5").val()+','+$("#s1day6").val()+'-'+$("#e1day6").val()+','+$("#s1day7").val()+'-'+$("#e1day7").val()
	if(language == 'rEnglish')
	{	
		if(vServiceName == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
				$('#Reservationservice_validation').show();
				$('#vServiceName').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		/*if(vPrice == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter price.</div>');
				$('#Reservationservice_validation').show();
				$('#vPrice').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		if(vReservationFee == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Fee.</div>');
				$('#Reservationservice_validation').show();
				$('#vReservationFee').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		if(vMaxService == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter maxservice.</div>');
				$('#Reservationservice_validation').show();
				$('#vMaxService').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		if(iDuration == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter duration.</div>');
				$('#Reservationservice_validation').show();
				$('#iDuration').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}*/
	}
	else if(language == 'rFrench')
	{
		if(vServiceName == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom</div>');
				$('#Reservationservice_validation').show();
				$('#vServiceName').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		/*if(vPrice == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Prix.</div>');
				$('#Reservationservice_validation').show();
				$('#vPrice').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		if(vReservationFee == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer frais.</div>');
				$('#Reservationservice_validation').show();
				$('#vReservationFee').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		if(vMaxService == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer maxservice.</div>');
				$('#Reservationservice_validation').show();
				$('#vMaxService').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}
		if(iDuration == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Durée.</div>');
				$('#Reservationservice_validation').show();
				$('#iDuration').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
		}*/
	}
	
	$.ajax({
		url: base_url+"app_reservation/new_service",
		type: "POST",
		data: {iApplicationId:''+iApplicationId+'',iFeatureId:''+iFeatureId+'',iTabId:''+iTabId+'',vServiceName:''+vServiceName+'',vPrice:''+vPrice+'',vReservationFee:''+vReservationFee+'',vMaxService:''+vMaxService+'',iDuration:''+iDuration+'',vServiceTiming:''+vServiceTiming+''},
		dataType:'json',
		success: function(response){

	/*		var table = document.getElementById("all_service_id");
			var row = table.insertRow(-1);
			var vServiceName1 = row.insertCell(0);
			var vPrice1 = row.insertCell(1);
			var vReservationFee1 = row.insertCell(2);
			var iDuration1 = row.insertCell(3);
			var eStatus1 = row.insertCell(4);
			var vAction = row.insertCell(5);
			var vAction1 = row.insertCell(6);
			
			vServiceName1.innerHTML = vServiceName;
			vPrice1.innerHTML = vPrice;
			vReservationFee1.innerHTML = vReservationFee;
			iDuration1.innerHTML = iDuration;
			eStatus1.innerHTML = 'Active';
			vAction.innerHTML = '<td><a class="apptab_edit" style="" onclick="edit_service_one('+response+')"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>';
			vAction1.innerHTML = '<td><a class="button grey" style="" onclick="delete_service_one('+response+')"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
			$('#vServiceName').val(null);
			$('#vPrice').val(null);
			$('#vReservationFee').val(null);
			$('#vMaxService').val(null);
			$('#iDuration').val(null);
			$(".range-slider2").slider('option',{values: [540, 1080]});
			$("#range-time-service").innerHTML = '9:00 - 19:00';
		*/	
			$('#basicModal2').modal('hide');
			window.location.reload();

			
		},
		error: function(error){
			alert('Registration Error Occured');
			console.log(error);
		}
	});
}

function update_gen_info(){
	var iApplicationId=$("#iApplicationId").val()	
	var language=$("#language").val()
	var iFeatureId=$("#iFeatureId").val()
	var iTabId=$("#iTabId").val()
	var vServiceCenterName=$("#vServiceCenterName").val()
	var tDescription=$("#tDescription").val()
	var vAdminEmail=$("#vAdminEmail").val()
	var iCurrencyId=$("#iCurrencyId").val()
	var vServiceTiming=$("#sday1").val()+'-'+$("#eday1").val()+','+$("#sday2").val()+'-'+$("#eday2").val()+','+$("#sday3").val()+'-'+$("#eday3").val()+','+$("#sday4").val()+'-'+$("#eday4").val()+','+$("#sday5").val()+'-'+$("#eday5").val()+','+$("#sday6").val()+'-'+$("#eday6").val()+','+$("#sday7").val()+'-'+$("#eday7").val()
	if(language == 'rEnglish'){		
		if(vServiceCenterName == ''){
				$('#Reservationservicedetail_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
				$('#Reservationservicedetail_validation').show();
				$('#vServiceCenterName').focus();
				return false;
			}else{
				$('#Reservationservicedetail_validation').hide();
		}
		if (vAdminEmail=='') {		
			$("#Reservationservicedetail_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email.</div>');
			$("#Reservationservicedetail_validation").show();
			$("#vAdminEmail").focus();
			return false;
		
	    }else{
			$("#Reservationservicedetail_validation").hide();
	    }
		if (vAdminEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vAdminEmail);		
			if (!isvalid) {				
				$("#Reservationservicedetail_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address.</div>');
				$("#Reservationservicedetail_validation").show();
				$("#vAdminEmail").focus();
				return false;
			}				
		}else{
			$("#Reservationservicedetail_validation").hide();
		}
		if(tDescription == ''){
				$('#Reservationservicedetail_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter description.</div>');
				$('#Reservationservicedetail_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#Reservationservicedetail_validation').hide();
		}
	} else if(language == 'rFrench'){
		if(vServiceCenterName == ''){
				$('#Reservationservicedetail_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
				$('#Reservationservicedetail_validation').show();
				$('#vServiceCenterName').focus();
				return false;
			}else{
				$('#Reservationservicedetail_validation').hide();
		}
		if (vAdminEmail=='') {		
			$("#Reservationservicedetail_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer E-mail.</div>');
			$("#Reservationservicedetail_validation").show();
			$("#vAdminEmail").focus();
			return false;
		
	    }else{
			$("#Reservationservicedetail_validation").hide();
	    }
		if (vAdminEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vAdminEmail);		
			if (!isvalid) {				
				$("#Reservationservicedetail_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Entrez e-mail valide.</div>');
				$("#Reservationservicedetail_validation").show();
				$("#vAdminEmail").focus();
				return false;
			}				
		}else{
			$("#Reservationservicedetail_validation").hide();
		}
		if(tDescription == ''){
				$('#Reservationservicedetail_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Description.</div>');
				$('#Reservationservicedetail_validation').show();
				$('#tDescription').focus();
				return false;
			}else{
				$('#Reservationservicedetail_validation').hide();
		}
	}

	$.ajax({
		url: base_url+"app_reservation/update_gen_info",
		type: "POST",
		data: {iApplicationId:''+iApplicationId+'',iFeatureId:''+iFeatureId+'',iTabId:''+iTabId+'',vServiceCenterName:''+vServiceCenterName+'',tDescription:''+tDescription+'',vAdminEmail:''+vAdminEmail+'',iCurrencyId:''+iCurrencyId+'',vServiceTiming:''+vServiceTiming+''},
		dataType:'json',
		success: function(response){
			window.location.reload();
		},
		error: function(error){
			alert('General Info Update Error');
			console.log(error);
		}
	});
	
	return false;
}

function addlocation(){
	
	var iApplicationId=$("#iApplicationId").val();
	var iTabId=$("#iTabId").val();
	var vTitle=$("#vTitle").val();
	var vAddress1=$("#vAddress1_res").val();
	//var vAddress1=document.getElementById("vAddress1").value;
	var language =$("#language").val();
	var vAddress2=$("#vAddress2_res").val();
	var vCity=$("#vCity_res").val();
	var vState=$("#vState_res").val();
	var vZip=$("#vZip_res").val();
	var vWebsite=$("#vWebsite_res").val();
	var vEmail=$("#vEmail_res").val();
	var vTelephone=$("#vTelephone_res").val();
	var vLatitude=$("#vLatitude_res").val();
	var vLongitude=$("#vLongitude_res").val();

	if(language == 'rEnglish')
	{
		if(vTitle == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Title.</div>');
			$('#Reservationlocation_validation').show();
			$('#vTitle').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}

		if(vAddress1 == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter address.</div>');
			$('#Reservationlocation_validation').show();
			$('#vAddress1_res').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}

		if (vCity == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter city name.</div>');
			$('#Reservationlocation_validation').show();
			$('#vCity_res').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}

		if (vState=='' || !vState.match('^[a-zA-Z]+$')) {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter state.</div>');
			$("#Reservationlocation_validation").show();
			$("#vState_res").focus();
			return false;
		}else{
			$("#Reservationlocation_validation").hide();
	    }
		
		if (vWebsite=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website url.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
		}else{
			$("#Reservationlocation_validation").hide();
	    }

	    if (vWebsite !='' && !is_valid_url(vWebsite)) {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
		}else{
			$("#Reservationlocation_validation").hide();
	    }

	    if (vWebsite !='') {
	    	var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
			if(!pattern.test(vWebsite)) {
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
				$("#Reservationlocation_validation").show();
				$("#vWebsite_res").focus();
				return false;
	  		}else{
				$("#Reservationlocation_validation").hide();
			}
	    }

	    if (vEmail=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email.</div>');
			$("#Reservationlocation_validation").show();
			$("#vEmail_res").focus();
			return false;
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

		if (vEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vEmail);		
			if (!isvalid) {				
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address.</div>');
				$("#Reservationlocation_validation").show();
				$("#vEmail_res").focus();
				return false;
			}				
		}else{
			$("#Reservationlocation_validation").hide();
		}  
	    
		if(vLatitude == '' || !isValidLongitude(vLatitude)){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude.</div>');
				$('#Reservationlocation_validation').show();
				$('#vLatitude_res').focus();
				return false;
		}else{
				$('#Reservationlocation_validation').hide();
		}

		if(vLongitude == '' || !isValidLongitude(vLongitude)){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
			$('#Reservationlocation_validation').show();
			$('#vLongitude_res').focus();
			return false;
		}else{
				$('#Reservationlocation_validation').hide();
		}

	}else if(language == 'rFrench'){
		if(vTitle == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>S`il vous plaît entrer le titre.</div>');
			$('#Reservationlocation_validation').show();
			$('#vTitle').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}

		if(vAddress1 == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Saisissez l`adresse.</div>');
			$('#Reservationlocation_validation').show();
			$('#vAddress1_res').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}

		if (vCity==''){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez la ville.</div>');
				$('#Reservationlocation_validation').show();
				$('#vCity_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}

		if (vState=='' || !vState.match('^[a-zA-Z]+$')) {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Etat.</div>');
			$("#Reservationlocation_validation").show();
			$("#vState_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

		if (vWebsite=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>URL Site Web.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

	    if (vWebsite !='' && !is_valid_url(vWebsite)) {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

	    if (vWebsite != '') {
	    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
			if(!pattern.test(vWebsite)) {
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide.</div>');
				$("#Reservationlocation_validation").show();
				$("#vWebsite_res").focus();
				return false;
	  		}else{
				$("#Reservationlocation_validation").hide();
			}
	    }

	    if (vEmail=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Votre Email.</div>');
			$("#Reservationlocation_validation").show();
			$("#vEmail_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

		if (vEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vEmail);		
			if (!isvalid) {				
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Entrez e-mail valide.</div>');
				$("#Reservationlocation_validation").show();
				$("#vEmail_res").focus();
				return false;
			}				
		}else{
			$("#Reservationlocation_validation").hide();
		}  
	    
		if(vLatitude == '' || !isValidLongitude(vLatitude)){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude.</div>');
				$('#Reservationlocation_validation').show();
				$('#vLatitude_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}

		if(vLongitude == '' || !isValidLongitude(vLongitude)){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
				$('#Reservationlocation_validation').show();
				$('#vLongitude_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}
	}	
	$.ajax({
		url: base_url+"app_reservation/add_new_location",
		type: "POST",
		data: {iApplicationId:''+iApplicationId+'',vLocationTitle:''+vTitle+'',iAppTabId:''+iTabId+'',vAddress1:''+vAddress1+'',vAddress2:''+vAddress2+'',vCity:''+vCity+'',vState:''+vState+'',vZip:''+vZip+'',vWebsite:''+vWebsite+'',vEmail:''+vEmail+'',vTelephone:''+vTelephone+'',vLatitude:''+vLatitude+'',vLongitude:''+vLongitude+''},
		dataType:'json',
		success: function(response)
		{
		//	var vTitle = vLocationTitle;
			var newaddress = vAddress1+' '+vCity+' '+vState+''+vZip;
			var table = document.getElementById("location_tab_id");
			var row = table.insertRow(-1);
			var vTitle = row.insertCell(0);
			var vAddress_tab = row.insertCell(1);
			var vAction = row.insertCell(2);
			var vAction1 = row.insertCell(3);
		//	vTitle_tab.innerHTML = vLocationTitle;
		//	vAddress_tab.innerHTML = newaddress;
			var newA =''; 
			newA = '<td><a class="apptab_edit" style="" onclick="edit_location_one('+response+')"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>';
			newA1 = '<td><a class="button grey" style="" onclick="delete_location('+response+');"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
			vAction.innerHTML = newA;
			vAction1.innerHTML = newA1;
			$("#vTitle").val(null);
			$("#vAddress1_res").val(null);
			$("#vAddress2_res").val(null);
			$("#vCity_res").val(null);
			$("#vState_res").val(null);
			$("#vZip_res").val(null);
			$("#vWebsite_res").val(null);
			$("#vEmail_res").val(null);
			$("#vTelephone_res").val(null);
			$("#vLatitude_res").val(null);
			$("#vLongitude_res").val(null);
			window.location.reload();
			//$('#basicModal4').modal('hide');
		},
		error: function(error){
			alert('New Location Insert Error');
			console.log(error);
		}
	});
	
	return false;
}

function edit_location_one(iLocationId){
	
	$.ajax({
		url: base_url+"app_reservation/get_location_details_by_id",
		type: "POST",
		data: {iLocationId:''+iLocationId+''},
		dataType:'json',
		success: function(data){
			$('#vTitle').val(data.vLocationTitle);
			$('#vAddress1_res').val(data.vAddress1);
			$('#vAddress2_res').val(data.vAddress2);
			$('#vCity_res').val(data.vCity);
			$('#vState_res').val(data.vState);
			$('#vZip_res').val(data.vZip);
			$('#vWebsite_res').val(data.vWebsite);
			$('#vEmail_res').val(data.vEmail);
			$('#vTelephone_res').val(data.vTelephone);
			$('#vLatitude_res').val(data.vLatitude);
			$('#vLongitude_res').val(data.vLongitude);
			foo = document.getElementById("local_modal_id");
    		foo.setAttribute("onclick","return updatelocation("+data.iLocationId+");");
    		
    		var mi = document.createElement("input");
			mi.setAttribute('type', 'hidden');
			mi.setAttribute('value', data.iLocationId);
			mi.setAttribute('id','update_location_id');
			
			var ni = document.getElementById('modal-footer');
			ni.appendChild(mi);

			$('#basicModal4').modal('show');
			
		},
		error: function(error){
			alert('Data Fetch Error');
			console.log(error);
		}
	});
}

function updatelocation(iLocationId){
	var location = $("#language").val();
	var vTitle = $("#vTitle").val();
	var iApplicationId=$("#iApplicationId").val();
	var iTabId=$("#iTabId").val();
	var vAddress1=$("#vAddress1_res").val();
	var vAddress2=$("#vAddress2_res").val();
	var vCity=$("#vCity_res").val();
	var vState=$("#vState_res").val();
	var vZip=$("#vZip_res").val();
	var vWebsite=$("#vWebsite_res").val();
	var vEmail=$("#vEmail_res").val();
	var vTelephone=$("#vTelephone_res").val();
	var vLatitude=$("#vLatitude_res").val();
	var vLongitude=$("#vLongitude_res").val();
	if(language == 'rEnglish'){
		if(vTitle == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Title.</div>');
			$('#Reservationlocation_validation').show();
			$('#vTitle').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}
		if(vAddress1 == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter address.</div>');
			$('#Reservationlocation_validation').show();
			$('#vAddress1_res').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}
		if (vCity=='' || !vCity.match('^[a-zA-Z]+$')){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter city name.</div>');
				$('#Reservationlocation_validation').show();
				$('#vCity_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}
		if (vState=='' || !vState.match('^[a-zA-Z]+$')) {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter state.</div>');
			$("#Reservationlocation_validation").show();
			$("#vState_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }
		if (vWebsite=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter website url.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

	    if (vWebsite !='' && !is_valid_url(vWebsite)) {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }
	    if (vWebsite !='') {
	    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
			if(!pattern.test(vWebsite)) {
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter valid website url.</div>');
				$("#Reservationlocation_validation").show();
				$("#vWebsite_res").focus();
				return false;
	  		}else{
				$("#Reservationlocation_validation").hide();
			}
	    }
	    if (vEmail=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter email.</div>');
			$("#Reservationlocation_validation").show();
			$("#vEmail_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }
		if (vEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vEmail);		
			if (!isvalid) {				
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter valid email address.</div>');
				$("#Reservationlocation_validation").show();
				$("#vEmail_res").focus();
				return false;
			}				
		}else{
			$("#Reservationlocation_validation").hide();
		}  
	    if(vLatitude == '' || !isValidLongitude(vLatitude)){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter latitude.</div>');
				$('#Reservationlocation_validation').show();
				$('#vLatitude_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}
		if(vLongitude == '' || !isValidLongitude(vLongitude)){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
				$('#Reservationlocation_validation').show();
				$('#vLongitude_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}	
	}else if(language == 'rFrench'){
		if(vTitle == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>S`il vous plaît entrer le titre.</div>');
			$('#Reservationlocation_validation').show();
			$('#vTitle').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}
		if(vAddress1 == ''){
			$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Saisissez l`adresse.</div>');
			$('#Reservationlocation_validation').show();
			$('#vAddress1_res').focus();
			return false;
		}else{
			$('#Reservationlocation_validation').hide();
		}
		if (vCity=='' || !vCity.match('^[a-zA-Z]+$')){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez la ville.</div>');
				$('#Reservationlocation_validation').show();
				$('#vCity_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}
		if (vState=='' || !vState.match('^[a-zA-Z]+$')) {		
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Etat.</div>');
				$("#Reservationlocation_validation").show();
				$("#vState_res").focus();
			return false;
			}else{
				$("#Reservationlocation_validation").hide();
	    }
		if (vWebsite=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>URL Site Web.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

	    if (vWebsite !='' && !is_valid_url(vWebsite)) {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide.</div>');
			$("#Reservationlocation_validation").show();
			$("#vWebsite_res").focus();
			return false;
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

	    if (vWebsite !='') {
	    	 var pattern = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}$/;
			if(!pattern.test(vWebsite)) {
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez url valide.</div>');
				$("#Reservationlocation_validation").show();
				$("#vWebsite_res").focus();
				return false;
	  		}else{
				$("#Reservationlocation_validation").hide();
			}
	    }

	    if (vEmail=='') {		
			$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrez Votre Email.</div>');
			$("#Reservationlocation_validation").show();
			$("#vEmail_res").focus();
			return false;
		
	    }else{
			$("#Reservationlocation_validation").hide();
	    }

		if (vEmail!='' ) {						
			var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
			var isvalid = emailRegexStr.test(vEmail);		
			if (!isvalid) {				
				$("#Reservationlocation_validation").html('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Entrez e-mail valide.</div>');
				$("#Reservationlocation_validation").show();
				$("#vEmail_res").focus();
				return false;
			}				
		}else{
			$("#Reservationlocation_validation").hide();
		}  

	    
		if(vLatitude == '' || !isValidLongitude(vLatitude)){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter lattitude.</div>');
				$('#Reservationlocation_validation').show();
				$('#vLatitude_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}

		if(vLongitude == '' || !isValidLongitude(vLongitude)){
				$('#Reservationlocation_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter longitude.</div>');
				$('#Reservationlocation_validation').show();
				$('#vLongitude_res').focus();
				return false;
			}else{
				$('#Reservationlocation_validation').hide();
		}	
	}	

	$.ajax({
		url: base_url+"app_reservation/update_location",
		type: "POST",
		data: {iLocationId:''+iLocationId+'',vLocationTitle:''+vTitle+'',iApplicationId:''+iApplicationId+'',iAppTabId:''+iTabId+'',vAddress1:''+vAddress1+'',vAddress2:''+vAddress2+'',vCity:''+vCity+'',vState:''+vState+'',vZip:''+vZip+'',vWebsite:''+vWebsite+'',vEmail:''+vEmail+'',vTelephone:''+vTelephone+'',vLatitude:''+vLatitude+'',vLongitude:''+vLongitude+''},
		dataType:'json',
		success: function(response){
			var vLocationTitle = vLocationTitle;
			var newaddress = vAddress1+' '+vCity+' '+vState+''+vZip;
			var table = document.getElementById("all_location_details"+response);
			var newA ='';
			newA = '<td>'+vLocationTitle+'</td>'; 
			newA += '<td>'+newaddress+'</td>'; 
			newA += '<td><a class="apptab_edit" style="" onclick="edit_location_one('+response+')"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td> ';
			newA += '<td><a class="button grey" style="" onclick="delete_location('+response+');"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
			table.innerHTML = newA;
			$("#vTitle").val(null);
			$("#vAddress1_res").val(null);
			$("#vAddress2_res").val(null);
			$("#vCity_res").val(null);
			$("#vState_res").val(null);
			$("#vZip_res").val(null);
			$("#vWebsite_res").val(null);
			$("#vEmail_res").val(null);
			$("#vTelephone_res").val(null);
			$("#vLatitude_res").val(null);
			$("#vLongitude_res").val(null);
			$('#basicModal4').modal('hide');
			window.location.reload();
		},
		error: function(error){
			alert('Location Update Error');
			console.log(error);
		}
	});
	
	return false;
}

function delete_location(iLocationId){
	$.ajax({
		url: base_url+"app_reservation/delete_location",
		type: "POST",
		data: {iLocationId:''+iLocationId+''},
		dataType:'json',
		success: function(response){

			document.getElementById("all_location_details"+iLocationId).style.display = "none";
			

		},
		error: function(error){
			alert('Location Delete Error');
			console.log(error);
		}
	});
	
	return false;
}
// made by maksud khan for edit Service popup 
function edit_service_one(iServiceId){	
	$.ajax({
		url: base_url+"app_reservation/get_service_details_by_id",
		type: "POST",
		data: {iServiceId:''+iServiceId+''},
		dataType:'json',
		/*	type: "POST",
			url: base_url+"app_reservation/get_service_details_by_id?iServiceId="+iServiceId,*/
		success: function(data){
				$("#vServiceName").val(data.vServiceName);
				$("#vPrice").val(data.vPrice);
				$("#vReservationFee").val(data.vReservationFee);
				$("#vMaxService").val(data.vMaxService);
				$("#iDuration").val(data.iDuration);
				$("#s1day1").val()+'-'+$("#e1day1").val()+','+$("#s1day2").val()+'-'+$("#e1day2").val()+','+$("#s1day3").val()+'-'+$("#e1day3").val()+','+$("#s1day4").val()+'-'+$("#e1day4").val()+','+$("#s1day5").val()+'-'+$("#e1day5").val()+','+$("#s1day6").val()+'-'+$("#e1day6").val()+','+$("#s1day7").val()+'-'+$("#e1day7").val()
				foo = document.getElementById("service_modal_ids");
	    		foo.setAttribute("onclick","return updateservice("+data.iServiceId+");");
	    		
	    		var mi = document.createElement("input");
				mi.setAttribute('type', 'hidden');
				mi.setAttribute('value', data.iServiceId);
				mi.setAttribute('id','update_service_id');
				
				var ni = document.getElementById('modal-footers');
				ni.appendChild(mi);

				$('#basicModal2').modal('show');
		},
		error: function(error){
			alert('Data Fetch Error');
			console.log(error);
		}
	});
}
// made by maksud khan for update Service
function updateservice(iServiceId){
	var language = $("#language").val();
	var iApplicationId=$("#iApplicationId").val()
	var iFeatureId=$("#iFeatureId").val()
	var iTabId=$("#iTabId").val()
	var vServiceName=$("#vServiceName").val()
	var vPrice=$("#vPrice").val()
	var vReservationFee=$("#vReservationFee").val()
	var vMaxService=$("#vMaxService").val()
	var iDuration=$("#iDuration").val()
	var vServiceTiming=$("#s1day1").val()+'-'+$("#e1day1").val()+','+$("#s1day2").val()+'-'+$("#e1day2").val()+','+$("#s1day3").val()+'-'+$("#e1day3").val()+','+$("#s1day4").val()+'-'+$("#e1day4").val()+','+$("#s1day5").val()+'-'+$("#e1day5").val()+','+$("#s1day6").val()+'-'+$("#e1day6").val()+','+$("#s1day7").val()+'-'+$("#e1day7").val()
	if(language == 'rEnglish'){
			if(vServiceName == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter name.</div>');
				$('#Reservationservice_validation').show();
				$('#vServiceName').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
			}
			if(vPrice == ''){
					$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter price.</div>');
					$('#Reservationservice_validation').show();
					$('#vPrice').focus();
					return false;
				}else{
					$('#Reservationservice_validation').hide();
			}
			if(vReservationFee == ''){
					$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Please enter Fee.</div>');
					$('#Reservationservice_validation').show();
					$('#vReservationFee').focus();
					return false;
				}else{
					$('#Reservationservice_validation').hide();
			}
	}
	else if(language == 'rFrench'){
			if(vServiceName == ''){
				$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Nom.</div>');
				$('#Reservationservice_validation').show();
				$('#vServiceName').focus();
				return false;
			}else{
				$('#Reservationservice_validation').hide();
			}
			if(vPrice == ''){
					$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer Prix.</div>');
					$('#Reservationservice_validation').show();
					$('#vPrice').focus();
					return false;
				}else{
					$('#Reservationservice_validation').hide();
			}
			if(vReservationFee == ''){
					$('#Reservationservice_validation').html('<div class="alert alert-error"><button type="button" style="color: black !important;" class="close" data-dismiss="alert">&times;</button>Entrer frais.</div>');
					$('#Reservationservice_validation').show();
					$('#vReservationFee').focus();
					return false;
				}else{
					$('#Reservationservice_validation').hide();
			}
	}
	
    $.ajax({
	url: base_url+"app_reservation/update_service",
	type: "POST",
	data: {iServiceId:''+iServiceId+'',iApplicationId:''+iApplicationId+'',iFeatureId:''+iFeatureId+'',iTabId:''+iTabId+'',vServiceName:''+vServiceName+'',vPrice:''+vPrice+'',vReservationFee:''+vReservationFee+'',vMaxService:''+vMaxService+'',iDuration:''+iDuration+'',vServiceTiming:''+vServiceTiming+''},
	dataType:'json',
	success: function(response){
		var table = document.getElementById("servicedata"+response);
		var news ='';
		news= '<td>'+vServiceName+'</td>';
		news += '<td>'+vPrice+' EUR</td>';  
		news += '<td>'+vReservationFee+'</td>'; 
		//news += '<td>'+iDuration+'</td>'; 
		news += '<td>Active</td>';
		news += '<td><a class="apptab_edit" style="" onclick="edit_service_one('+response+')"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>';
		news += '<td><a class="button grey" style="" onclick="delete_service_one('+response+')"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
		
		table.innerHTML = news;

		$('#vServiceName').val(null);
		$('#vPrice').val(null);
		$('#vReservationFee').val(null);
		$('#vMaxService').val(null);
		$('#iDuration').val(null);
		$('#basicModal2').modal('hide');
	},
	error: function(error){
		alert('Service Update Error');
		console.log(error);
	}
});	
	return false;
}
// made by maksud khan for delete Service
function delete_service_one(iServiceId){
	$.ajax({
		url:base_url+"app_reservation/delete_service",
		type:"POST",
		data:{iServiceId:''+iServiceId+''},
		dataType:'json',
		success:function(response){
			document.getElementById("servicedata"+iServiceId).style.display = "none";
		},
		error: function(error){
			alert('Service Delete Error');
			console.log(error);
		}
	});
	return false;
}
