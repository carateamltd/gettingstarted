$(document).ready(function(){
	//$("#check_all").change(function(){
	//	$('input:checkbox').prop('checked', this.checked);

	$("#check_all").click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
 
		/*alert();
		var boxes = $('input[name=iTechnologyId[]]:checked');
		alert(boxes);
		$(boxes).each(function(){
			$('input[name=iTechnologyId]').prop('checked', this.checked);   
		});*/

	// });
	
	$("#btn-active").click(function() {
		$("#action").val("Active");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});
	$("#btn-inactive").click(function() {
		$("#action").val("Inactive");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});
	$("#btn-delete").click(function() {
		$("#action").val("Delete");
		var atLeastOneIsChecked = $('input[name="iId[]"]:checked').length > 0;
		if(atLeastOneIsChecked == false){
	        $(".modal-body").html( "<p>Please select atleast one record </p>" );
    	    $("#myalert").modal('show');
        	return false;
        }
	});
	
	 $('#tSMStext').keypress(function( event ) {
		$('.smstext').html(event.target.value);
	})
	
	/*$("#fancyhref").fancybox({
		padding: 0,

		openEffect : 'elastic',
		openSpeed  : 250,

		closeEffect : 'elastic',
		closeSpeed  : 250,

		closeClick : true,

		helpers : {
			overlay : null
		}
	});*/

});

/*function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}


function addme(url)
{
	window.location.href=url;
}

    */
