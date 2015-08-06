$(document).ready(function(){
    
    $("#send_notification").click(function() {
       if($("#vMessage").val() ==''){
            $(".modal-body").html( "<p>Message can't be blank</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vMessage").val().length > 255){
            $(".modal-body").html( "<p>Maximum 255 characters are allowed in message.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        var formValid = false;
        var radios = document.getElementsByName("Data[eType]");                
        for (i=0;i< radios.length;i++) {            
           if (radios[i].checked) formValid = true;        
        }
        if (!formValid){
            $(".modal-body").html( "<p>Please select message type</p>" );
            $("#myalert").modal('show');
            return false;         
        }
        var group=document.getElementById("Group").checked;
        if (group==true && $("#group").val()=='') {
            $(".modal-body").html( "<p>Please select group name</p>" );
            $("#myalert").modal('show');
            return false;         
        }


        var formdata=$("#form_notification").serialize();
        var url=base_url+'notification/save_notification?';
        $.post(url+formdata,function (data){
            $("#form_notification").submit();         
        }); 
    }); 
    $("#Group").click(function() {
        var checked=document.getElementById("Group").checked;
        $("#group_names").show();
    });
    
    $("#Individual").click(function() {
        var checked=document.getElementById("Individual").checked;
        $("#individual_names").show();
    });
     $("#All").click(function() {
        var checked=document.getElementById("All").checked;
        $("#individual_names").hide();
    });
    
    $("#Individual,#All").click(function() {        
        $("#group_names").hide();
    });

});

/*function returnme(){
	window.location.href = base_url+'notification';
}*/


function get_users(){
		var iApplicationId=$('#iApplicationId').val();
		var xml_link = 'http://122.170.107.160/erestaurant/pushnotification/app_xml/'+iApplicationId+'.xml';
		$("#application_xml").html(xml_link);
		$.ajax({
			url: base_url+"notification/get_individual_users",
			type: "POST",
			data: {iApplicationId:''+iApplicationId+''},
			dataType:'json',
			success: function(response){
				var html = '<option value="">--Select Individual Name--</option>';
				for(var i=0; i<response.length; i++){
					html +='<option value="'+response[i].iUserId+'">'+response[i].vDevicename+'</option>';
				}
				$("#individual").html(html);
			},
			error: function(error){
				alert('Error in fetching individual users');
				console.log(error);
			}
		});
}
