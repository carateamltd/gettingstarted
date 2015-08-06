$(document).ready(function(){
    $("#btn-save").click(function() {
        if($("#iCountryId").val() ==''){
            $(".modal-body").html( "<p>Please Select Country</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vState").val() ==''){
            $(".modal-body").html( "<p>Please Enter State</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vStateCode").val() ==''){
            $(".modal-body").html( "<p>Please Enter State Code</p>" );
            $("#myalert").modal('show');
            return false;
        }
         if(IsState($( "#vStateCode" ).val()) ==false){
            $(".modal-body").html( "<p>Please Enter State Code 2 or 3 Character Long in Uppercase</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'state';
}
function IsState(state) {
var regex = /^[A-Z]{2,3}$/;
return regex.test(state);
}
