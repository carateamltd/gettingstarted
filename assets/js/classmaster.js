$(document).ready(function(){
    $("#btn-save").click(function() {
        if($( "#vClassName" ).val() ==''){
            $(".modal-body").html( "<p>Please Enter Class Name</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });
});
function returnme()
{
	window.location.href = base_url+'classmaster';
}