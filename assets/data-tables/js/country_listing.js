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
        "ajaxUrl": base_url+"country/get_country_listing",
        "domTable": "#CountrylistId",
        "fields": [ {
            "label": "Country ID:",
                "name": "id",
                "type": "checkbox"
            }
            ,
            { 
                "label": "Country Name:",
                "name": "countryname"
            }
            , 
            {
                "label": "Country Code:",
                "name": "countrycode"
            }
            ,
            {
                "label": "Country ISD Code:",
                "name": "countryIsdcode"
            },
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
 
    $('#CountrylistId').dataTable( {
        "sAjaxSource": base_url+"country/get_country_listing",
        "aoColumns": [
            { "mData": "id","bSortable": false},
            { "mData": "countryname" },
            { "mData": "countrycode" },
            { "mData": "countryIsdcode" },
            { "mData": "status","bSortable": false},
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