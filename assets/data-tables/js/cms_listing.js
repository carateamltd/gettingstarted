var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    $("#check_all").change(function(){
        $('input:checkbox').prop('checked', this.checked);         
        /*alert();
        var boxes = $('input[name=iTechnologyId[]]:checked');
        alert(boxes);
        $(boxes).each(function(){
            $('input[name=iTechnologyId]').prop('checked', this.checked);   
        });*/

    });
    
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

    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"administrator/get_administrator_listing",
        "domTable": "#AdminlistId",
        "fields": [ {
            "label": "Admin ID:",
                "name": "id",
                "type": "checkbox"
            }
            ,
            {
                "label": " Name:",
                "name": "administratorname"
            }
            , 
            {
                "label": "Email:",
                "name": "email"
            }
             , 
            {
                "label": "Phone:",
                "name": "phone"
            }
             , 
            {
                "label": "Role:",
                "name": "role"
            }
            ,
            {
                "label": "Status:",
                "name": "status"
            },{
                "label": "Edit:",
                "name": "editicon"
            },
            {
                "label": "Delete:",
                "name": "deleteicon"
            }
        ]
    } );
 
    $('#CmsId').dataTable( {
        "sAjaxSource": base_url+"cms/get_cms_listing",
        "aoColumns": [
            { "mData": "administratorname" },
            { "mData": "editicon","bSortable": false},
        ],
        "oTableTools": {
            "sRowSelect": "multi",
            "aButtons": [
                { "sExtends": "editor_create", "editor": editor },
                { "sExtends": "editor_edit",   "editor": editor },
                { "sExtends": "editor_remove", "editor": editor }
            ]
        }
    } );
} );
// Made Changes By : Sagar 15-5-2014
function check_uncheck()
{
    document.getElementById("check_all").checked = false;
}