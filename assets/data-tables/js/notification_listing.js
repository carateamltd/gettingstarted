var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    
    $("#check_all").click(function () {
        $('input:checkbox').prop('checked', this.checked);
    });

    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": base_url+"notification/get_notification_listing",
        "domTable": "#AdminlistId",
        "fields": [ {
            "label": "Admin ID:",
                "name": "id",
                "type": "checkbox"
            }
            ,
            {
                "label": "vMessage:",
                "name": "message"
            },
            
            {
                "label": "eType:",
                "name": "type"
            }      
            
            ,
            {
                "label": "dSendDate:",
                "name": "sendate"
            }
            ,
            {
                "label": "Edit:",
                "name": "editicon"
            }
            //{
            //    "label": "Delete:",
            //    "name": "deleteicon"
            //}
        ]
    } );
 
    $('#AdminlistId').dataTable( {
        "sAjaxSource": base_url+"notification/get_notification_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "message","bSortable": false},
            { "mData": "type" ,"bSortable": false},            
            { "mData": "sendate","bSortable": false},            
            { "mData": "editicon","bSortable": false},
            //{ "mData": "deleteicon","bSortable": false},
            
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

function check_uncheck()
{
    document.getElementById("check_all").checked = false;
}