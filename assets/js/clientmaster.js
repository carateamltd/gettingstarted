
$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#vClientName" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Name</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vClientDescription" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Description</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vUserName" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Username</p>" );
            $("#myalert").modal('show');
            return false;
        }
         if($( "#vPassword" ).val() == ''){
            $(".modal-body").html( "<p>Please Enter  Password</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vPassword" ).val().length > 10){
            $(".modal-body").html( "<p>Password should be 10 character</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vEmail" ).val() == ''){
            $(".modal-body").html( "<p>Please Enter  Email Address</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsEmail($( "#vEmail" ).val()) ==false){
            $(".modal-body").html( "<p>Please Enter Valid Email Address</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iPhoneNumber" ).val() == ''){
            $(".modal-body").html( "<p>Please Enter  Contact Number</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsPhone($( "#iPhoneNumber" ).val()) ==false){
            $(".modal-body").html( "<p>Please Enter Proper Phone Number Format like (XXX) XXX-XXXX</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vAddress" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Address</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iCountryId" ).val() ==''){
            $(".modal-body").html( "<p>Please Select Country</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iStateId" ).val() ==''){
            $(".modal-body").html( "<p>Please Select State</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vCity" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter City</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#iPostCode" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Post Code</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsPost($( "#iPostCode" ).val()) ==false){
            $(".modal-body").html( "<p>Post Code should be 6 Digit</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
     $( "#iCountryId" ).change(function() {
        iCountryId = $('#iCountryId').val(); 
        url = base_url+"clientmaster/get_all_states/"+iCountryId;
          $.post(url,
                function(data) {
                    var lang_data = $.parseJSON(data);
                    $('#iStateId').html(lang_data);                    
                });
    }); 
});
function returnme()
{
	window.location.href = base_url+'clientmaster';
}
function IsEmail(vEmail) {
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
return regex.test(vEmail);
}
function IsPhone(phone) {
var regex = /^\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}$/;
return regex.test(phone);
}
function IsPost(post) {
var regex = /^\d{6}$/;
return regex.test(post);
}
