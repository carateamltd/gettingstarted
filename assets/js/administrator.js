$(document).ready(function(){

    $("#btn-save").click(function() {
        /*if($("#vFirstName").val() ==''){
            $(".modal-body").html( "<p>Please Enter First Name</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vFirstName").val().length > 50){
            $(".modal-body").html( "<p>First Name should not be more than 50 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vFirstName").val().length <= 1){
            $(".modal-body").html( "<p>First Name should not be less than 2 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vLastName" ).val() ==''){
            $(".modal-body").html( "<p>Please enter last name.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if(($( "#vLastName" ).val().length) > 50){
            $(".modal-body").html( "<p>Last Name should not be more than 50 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }        
        else if($("#vLastName").val().length <= 1){
            $(".modal-body").html( "<p>Last Name should not be less than 2 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }*/
        if($("#vEmail").val() ==''){
            $(".modal-body").html( "<p>Please enter email address.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vEmail").val().length > 50){
            $(".modal-body").html( "<p>Email should not be more than 50 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsEmail($( "#vEmail" ).val()) ==false){
            $(".modal-body").html( "<p>Please enter valid email address.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        /*if($("#vPassword").val() ==''){
            $(".modal-body").html( "<p>Please enter password.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vPassword").val().length > 50){
            $(".modal-body").html( "<p>Password should not be more than 50 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vPassword").val().length < 6){
            $(".modal-body").html( "<p>Password should not be less than 6 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vPhone").val() ==''){
            $(".modal-body").html( "<p>Please enter phone number.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsPhone($("#vPhone").val()) ==false){
            //$(".modal-body").html( "<p>Please Enter Phone Number Format like (XXX) XXX-XXXX</p>" );
            $(".modal-body").html( "<p>Enter numbers only in phone number.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vAddress").val() ==''){
            $(".modal-body").html( "<p>Please Enter Address</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vAddress").val().length > 150){
            $(".modal-body").html( "<p>Address should not be more than 150 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vAddress").val().length <= 1){
            $(".modal-body").html( "<p>Address should not be less than 2 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vZipCode").val() ==''){
            $(".modal-body").html( "<p>Please Enter ZipCode</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vZipCode").val().length > 8){
            $(".modal-body").html( "<p>ZipCode should not be more than 8 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsZipValid($("#vZipCode").val()) ==false){
            $(".modal-body").html( "<p>Enter only number and uppercase letters in ZipCode.</p>" );
            $("#myalert").modal('show');
            return false;
        }*/
        if($("#iRoleId").val() ==''){
            $(".modal-body").html( "<p>Please select role type.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#iCountryId").val() ==''){
            $(".modal-body").html( "<p>Please select country.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#iStateId").val() ==''){
            $(".modal-body").html( "<p>Please select state.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vCity").val() ==''){
            $(".modal-body").html( "<p>Please enter city.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vCity").val().length > 50){
            $(".modal-body").html( "<p>City should not be more than 50 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        else if($("#vCity").val().length <= 1){
            $(".modal-body").html( "<p>City should not be less than 2 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        /*else if($("#vCity").val().length > 20){
            $(".modal-body").html( "<p>City should not be more than 20 characters.</p>" );
            $("#myalert").modal('show');
            return false;
        }*/
         
    });
    
    /* 
    Created Date:15-5-2014
    Created By : Sagar
    Purpose : For Tooltip in TextBox
    */

    $('#vFirstName[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
	
    $('#vLastName[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
	
    $('#vPassword[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
	
    $('#vAddress[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
	
    $('#vPhone[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
	
    $('#vZipCode[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
    });
    $('#vCity[data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'right',    
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
            $(".modal-body").html( "<p>Please Enter paypal username.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vPpassword").val() ==''){
            $(".modal-body").html( "<p>Please Enter paypal password.</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vPsignature").val() ==''){
            $(".modal-body").html( "<p>Please Enter paypal signature.</p>" );
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
        //var regex = /^\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}$/; //7th Mar 2014 bkp
        var regex = /^(?=.*[0-9])([0-9\\(\\)\s-]+)$/;
        return regex.test(phone);
    }
    function IsZipValid(zip)
    {
        var regex = /^([A-Z0-9 ]+)$/;
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
    
        
