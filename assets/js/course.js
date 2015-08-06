$(document).ready(function(){
    $("#btn-save").click(function()
    	{
            if($( "#vCourseName" ).val() =='')
            {
	            $(".modal-body").html( "<p>Please Enter Course Name</p>" );
	            $("#myalert").modal('show');
	            return false;
        	}
        });
});
function returnme()
{
	window.location.href = base_url+'course';
}