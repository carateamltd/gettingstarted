$(document).ready(function(){

    $("#btn-save").click(function() {
        if($("#vFirstName").val() ==''){
            $(".modal-body").html( "<p>Please Enter First Name</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vLastName" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Last Name</p>" );
            $("#myalert").modal('show');
            return false;
        }
       if($("#vEmail").val() ==''){
            $(".modal-body").html( "<p>Please Enter Email Address</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsEmail($( "#vEmail" ).val()) ==false){
            $(".modal-body").html( "<p>Please Enter valid Email Address</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vPassword").val() ==''){
            $(".modal-body").html( "<p>Please Enter Password</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vPassword").val().length !=6){
            $(".modal-body").html( "<p>Password must be 6 Characters</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vPhone").val() ==''){
            $(".modal-body").html( "<p>Please Enter Contact Number</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsPhone($("#vPhone").val()) ==false){
            $(".modal-body").html( "<p>Please Enter Phone Number Format like (XXX) XXX-XXXX</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vAddress").val() ==''){
            $(".modal-body").html( "<p>Please Enter Address</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vZipCode").val() ==''){
            $(".modal-body").html( "<p>Please Enter ZipCode</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsZip($("#vZipCode").val()) ==false){
            $(".modal-body").html( "<p>ZipCode Should be 6 Digit and Alphanumeric(numbers+capital letters)</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#iRoleId").val() ==''){
            $(".modal-body").html( "<p>Please Select Role Type</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#iCountryId").val() ==''){
            $(".modal-body").html( "<p>Please Select Country</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#iStateId").val() ==''){
            $(".modal-body").html( "<p>Please Select State</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vCity").val() ==''){
            $(".modal-body").html( "<p>Please Enter City</p>" );
            $("#myalert").modal('show');
            return false;
        }
        /*else if($("#vCity").val().length > 20){
            $(".modal-body").html( "<p>City should not be more than 20 Characters</p>" );
            $("#myalert").modal('show');
            return false;
        }*/
         
    });
    $( "#iCountryId" ).change(function() {
        iCountryId = $('#iCountryId').val(); 
        url = base_url+"administrator/get_all_states/"+iCountryId;
          $.post(url,
                function(data) {
                    var lang_data = $.parseJSON(data);
                    $('#iStateId').html(lang_data);                    
                });
    });




});

$(function() {

    $("#btn-paypal_save").click(function() {
        if($("#vPusername").val() ==''){
            $(".modal-body").html( "<p>Please Enter paypal username</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vPpassword").val() ==''){
            $(".modal-body").html( "<p>Please Enter paypal password</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vPsignature").val() ==''){
            $(".modal-body").html( "<p>Please Enter paypal signature</p>" );
            $("#myalert").modal('show');
            return false;
        }
        $('#paypal_info_admin').submit();
        //$('#paypal_info_admin').ajaxSubmit(function(data) {

        //});
    });

})

function returnme()
{
	window.location.href = base_url+'administrator';
}

//for email and phone and zipcode validation 
    function IsEmail(Email)
    {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(Email);
    }
    function IsPhone(phone)
    {
        var regex = /^\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}$/;
        return regex.test(phone);
    }
    function IsZip(zip)
    {
        //var regex = /^\d{6}$/;
        var regex = /^[0-9A-Z]{6}$/;
        return regex.test(zip);
    }
       
    function showhidexmlurl(iRoleId){
        var role=parseInt(iRoleId);
        if (role==2) {
             $("#xmlUrlData").show();
        }else{
             $("#xmlUrlData").hide();
        }        
    }
        
