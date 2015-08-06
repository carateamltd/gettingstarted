$(document).ready(function(){
    
    $("#btn-save").click(function()
    {
        if($("#ePaymentType").val() =='')
        {
            $(".modal-body").html( "<p>Please Select Payment Type</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vBankName").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Bank Name</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vAccountNumber").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Account Number</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsNum($("#vAccountNumber").val())==false)
        {
            $(".modal-body").html( "<p>Account Number should be numeric</p>" );
            $("#myalert").modal('show');
            return false;
        }

        if($("#eTypeofBankAccount").val() =='')
        {
            $(".modal-body").html( "<p>Please Select Type Of Bank Account</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vBankRouting").val().length > 10)
        {
            $(".modal-body").html( "<p>Please Enter Bank Routing</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vBankSignature").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Bank Signature</p>" );
            $("#myalert").modal('show');
            return false;
        }

        /*var iPaymentId = $('#iPaymentId').val();
        var iClientId = $('#iClientId').val();        
        var iApplicationId = $('#iApplicationId').val();        
        var ePaymentType = $('#ePaymentType').val();
        var vBankName = $('#vBankName').val();
        var vAccountNumber = $('#vAccountNumber').val();
        var eTypeofBankAccount = $('#eTypeofBankAccount').val();
        var vBankRouting = $('#vBankRouting').val();
        var vBankSignature = $('#vBankSignature').val();
        var url = base_url+'publish_app/addpayment';
        $.ajax({
            type: "POST",
            url: url,
            data: 'iPaymentId='+iPaymentId+'&iClientId='+iClientId+'&iApplicationId='+iApplicationId+'&ePaymentType='+ePaymentType+'&vBankName='+vBankName+'&vAccountNumber='+vAccountNumber+'&eTypeofBankAccount='+eTypeofBankAccount+'&vBankRouting='+vBankRouting+'&vBankSignature='+vBankSignature,
            success: function(data){
                alert(data);return false;
            },
                error: function(data){
                    alert(data);
                    return false;
                    }                
        });*/
    });

    $("#btn-save-chq").click(function()
    {
        if($("#vChequeNumber").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Cheque Number</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if(IsNum($("#vChequeNumber").val())==false)
        {
            $(".modal-body").html( "<p>Cheque Number should be numeric</p>" );
            $("#myalert").modal('show');
            return false;
        }
        if($("#vBankName1").val() =='')
        {
            $(".modal-body").html( "<p>Please Enter Bank Name</p>" );
            $("#myalert").modal('show');
            return false;
        }
    });

    
});

function returnme()
{
	window.location.href = base_url+'publish_app';
}

function IsNum(amount) {
  var regex = /^[0-9]+$/;
  return regex.test(amount);
}