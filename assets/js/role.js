$(document).ready(function(){
    $("#btn-save").click(function() {
            if($( "#vTitle" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Role</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'role';
}