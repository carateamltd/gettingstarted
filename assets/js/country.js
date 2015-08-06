$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#vCountry" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Country</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vCountryCode" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Country Code</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsCountry($( "#vCountryCode" ).val()) ==false){
            $(".modal-body").html( "<p>Please Enter 2 Character Country Code in Uppercase</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($( "#vISDcode" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Country ISD Code</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsCountryISD($( "#vISDcode" ).val()) ==false){
            $(".modal-body").html( "<p>Please Enter 3 Character ISD Code in Uppercase</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'country';
}
function IsCountry(country) {
var regex = /^[A-Z]{2}$/;
return regex.test(country);
}
function IsCountryISD(ISD) {
var regex = /^[A-Z]{3}$/;
return regex.test(ISD);
}