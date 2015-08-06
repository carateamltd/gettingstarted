<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>SLB</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="{$data.base_bootstrap}css/bootstrap.min.css" rel="stylesheet" />
   <link href="{$data.base_bootstrap}css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="{$data.base_bootstrap}css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="{$data.base_font_awsome}css/font-awesome.css" rel="stylesheet" />
   <link href="{$data.base_css}style-responsive.css" rel="stylesheet" />
   <link href="{$data.base_css}style-default.css" rel="stylesheet" id="style_color" />
   <link href="{$data.base_assets}fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link href="{$data.base_css}uniform.default.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="{$data.base_assets}bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link href="{$data.base_assets}fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="{$data.base_css}jquery-ui.css" rel="stylesheet" type="text/css" media="screen"/>
   <link href="{$data.base_css}style.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="{$data.base_assets}bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="{$data.base_assets}bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="{$data.base_assets}bootstrap-daterangepicker/daterangepicker.css" />
   
   <link href="{$data.base_assets}jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
  
   <link href="{$data.base_assets}bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" media="screen"/>
   
   

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <script src="{$data.base_js}jquery-1.8.3.min.js"></script>
    <script src="{$data.base_js}jquery.session.js"></script>
    <script src="{$data.base_js}jquery.nicescroll.js" type="text/javascript"></script>
          
            
    <!--<script type="text/javascript" src="{$data.base_assets}jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>-->
    <!--CkEditor-->
    <script type="text/javascript" src="{$data.base_assets}ckeditor/ckeditor.js"></script>
     <script type="text/javascript" src="{$data.base_assets}ckeditor/adapter_jquery.js"></script>
    <!-- Datatables js and css files -->
    <script type="text/javascript" src="{$data.basedatatable_js}jquery.dataTables.js"></script>
    <script type="text/javascript" src="{$data.basedatatable_js}TableTools.js"></script>
    <script type="text/javascript" src="{$data.basedatatable_js}dataTables.editor.js"></script>
    <!-- <link href="{$data.basedatatable_css}dataTables.bootstrap.css" rel="stylesheet" media="screen"> -->
    <link href="{$data.basedatatable_css}DT_bootstrap.css" rel="stylesheet" media="screen">
    
    <script type="text/javascript" src="{$data.base_assets}jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{$data.base_assets}fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <script src="{$data.base_assets}bootstrap/js/bootstrap.min.js"></script>
    
    <script src="{$data.base_assets}jquery-slimscroll/jquery-ui.js"></script>  
    <script type="text/javascript" src="{$data.basedatatable_js}dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="{$data.basedatatable_js}dataTables.editor.bootstrap.js"></script>
   <!-- End of js and css files --> 
   <!--color--picker-->
    <script src="{$data.base_assets}bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    

   <script type="text/javascript">
    var base_image = '{$data.base_image}';		
    var base_url = '{$data.base_url}';
    var base_host = '{$data.base_host}';
    var base_upload = '{$data.base_upload}';
    var user_iRoleId = '{$data['user_info']['iRoleId']}';
    
   </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
  <!--div class="loader"></div-->
<!-- BEGIN HEADER -->
<div id="header" class="navbar navbar-inverse navbar-fixed-top">
  {include file="header.tpl" }
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div id="container" class="row-fluid">
    {include file="left-sidebar.tpl" }
    {include file=$data.tpl_name } 
<!-- END PAGE -->  
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div id="footer">
    {include file="footer.tpl" }
</div>
<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS -->

<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="{$data.base_js}excanvas.js"></script>
<script src="{$data.base_js}respond.js"></script>
<![endif]-->

<script src="{$data.base_assets}jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="{$data.base_js}jquery.sparkline.js" type="text/javascript"></script>
<script src="{$data.base_assets}chart-master/Chart.js"></script>
<script src="{$data.base_js}jquery.scrollTo.min.js"></script>
<!--common script for all pages-->
<!--<script src="{$data.base_js}common-scripts.js"></script>-->
<!--script for this page only-->
<script src="{$data.base_js}easy-pie-chart.js"></script>
<script src="{$data.base_js}sparkline-chart.js"></script>
<script src="{$data.base_js}home-page-calender.js"></script>
<script type="text/javascript" src="{$data.base_assets}bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="{$data.base_assets}bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<!--<script src="{$data.base_js}home-chartjs.js"></script>-->
 <script src="{$data.base_assets}fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="{$data.base_assets}bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="{$data.base_assets}bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="{$data.base_assets}bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="{$data.base_assets}bootstrap-timepicker/js/bootstrap-timepicker.js"></script>



<script src="{$data.base_js}general.js"></script>
<script src="{$data.base_js}jquery.reveal.js"></script>
<!--<script type="text/javascript" src="{$data.base_js}jquery.leanModal.min.js"></script>--> 
<!--<script type="text/javascript">
    $(function() {
    	$('a[rel*=leanModal]').leanModal({ top : 2, closeButton: ".modal_close" });		
    });
</script>-->
<!-- END JAVASCRIPTS -->




<div id="myalert" class="modal show fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>Error</h3>
    </div>
    <div class="modal-body">
       
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" data-dismiss="modal">OK</a>
    </div>
</div>

<div id="loading" class="reveal-loading reveal-modal">
  <img src="{$data.base_image}ajax-loader.gif" alt="Loading..." />
</div>

   
</body>
<!-- END BODY -->
</html>
{literal}
<script type="text/javascript">
$(window).load(function() {
	$('#myalert').modal('hide');
})
</script>
{/literal}