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
         
        "ajaxUrl": base_url+"classmaster/get_classmaster_listing",

        "domTable": "#ClassmasterlistingId",
        "fields": [ {
               "label": "Classmaster ID:",
                "name": "id",
                "type": "checkbox"
            }
            , {
             "label": "Classname:",
              "name": "classname"
            }
            , {
                "label": "Edit:",
                "name": "editicon"
            }
            , {
                "label": "Delete:",
                "name": "deleteicon"
            }
        ]
    } );
 
    $('#ClassmasterlistingId').dataTable( {
        "sAjaxSource": base_url+"classmaster/get_classmaster_listing",
        "aoColumns": [
        { "mData": "id","bSortable": false},
        { "mData": "classname" },
        { "mData": "editicon","bSortable": false},
        { "mData": "deleteicon","bSortable": false},
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