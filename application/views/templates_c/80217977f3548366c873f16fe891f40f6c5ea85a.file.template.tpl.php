<?php /* Smarty version Smarty-3.1.11, created on 2015-08-11 20:52:37
         compiled from "application/views/templates/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20318264705582a05bee7567-43648757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80217977f3548366c873f16fe891f40f6c5ea85a' => 
    array (
      0 => 'application/views/templates/template.tpl',
      1 => 1439300516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20318264705582a05bee7567-43648757',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5582a05c103e90_78468326',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5582a05c103e90_78468326')) {function content_5582a05c103e90_78468326($_smarty_tpl) {?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>EasyApps</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_bootstrap'];?>
css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_bootstrap'];?>
css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_bootstrap'];?>
css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_font_awsome'];?>
css/font-awesome.min.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
style-responsive.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
style.navyblue.css" rel="stylesheet" id="style_color" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
themestyle.css" rel="stylesheet" id="style_color" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
style-default.css" rel="stylesheet" id="style_color" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
uniform.default.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
jquery-ui.css" rel="stylesheet" type="text/css" media="screen"/>
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_css'];?>
style.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-daterangepicker/daterangepicker.css" />

   
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
  
   <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" media="screen"/>
   
   

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery-1.8.3.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.session.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.nicescroll.js" type="text/javascript"></script>
          
            
    <!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>-->
    <!--CkEditor-->
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
ckeditor/ckeditor.js"></script>
     <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
ckeditor/adapter_jquery.js"></script>
    <!-- Datatables js and css files -->
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
TableTools.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
dataTables.editor.js"></script>
    <!-- <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_css'];?>
dataTables.bootstrap.css" rel="stylesheet" media="screen"> -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_css'];?>
DT_bootstrap.css" rel="stylesheet" media="screen">
    
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
js/jquery.slimscroll.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap/js/bootstrap.min.js"></script>
    
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
jquery-slimscroll/jquery-ui.js"></script>  
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
dataTables.editor.bootstrap.js"></script>
   <!-- End of js and css files --> 
   <!--color--picker-->
    <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <!-- Geolat lang-->
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
   <script type="text/javascript">
    var base_image = '<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
';		
    var base_url = '<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
';
    var base_host = '<?php echo $_smarty_tpl->tpl_vars['data']->value['base_host'];?>
';
    var base_upload = '<?php echo $_smarty_tpl->tpl_vars['data']->value['base_upload'];?>
';
    var user_iRoleId = '<?php echo $_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId'];?>
';
    
   </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!--<body class="fixed-top">-->
<body>
  <!--div class="loader"></div-->
<div id="mainwrapper" class="mainwrapper">
<!-- BEGIN HEADER -->
<!--<div id="header" class="navbar navbar-inverse navbar-fixed-top">-->
<div class="header">
  <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<!--<div id="container" class="row-fluid">-->
    <?php echo $_smarty_tpl->getSubTemplate ("left-sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['data']->value['tpl_name'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<!-- END PAGE -->  
<!--</div>-->
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div id="footer">
    <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<!-- END FOOTER -->
</div>
<!-- BEGIN JAVASCRIPTS -->

<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
excanvas.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
respond.js"></script>
<![endif]-->

<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
chart-master/Chart.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.scrollTo.min.js"></script>
<!--common script for all pages-->
<!--<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
common-scripts.js"></script>-->
<!--script for this page only-->
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
easy-pie-chart.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
sparkline-chart.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
home-page-calender.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<!--<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
home-chartjs.js"></script>-->
 <script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_assets'];?>
bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="http://gold.touslesrestos.fr/assets/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.fr.js"></script>




<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
general.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.reveal.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
qrcode.js"></script>
<!--<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_js'];?>
jquery.leanModal.min.js"></script>--> 
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
    <div class="modal-body" id="errormsg">
       
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="myalert" data-dismiss="modal">OK</a>
    </div>
</div>
<!--Made Changes by : Sagar 7-6-2014 -->
<div id="deletealert" class="modal show fade">
    <div class="modal-header">
        <button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3>Error</h3>
    </div>
    <div class="modal-body" id="deleteMessage">
       
    </div>
    <div class="modal-footer">
        <a href="" class="btn btn-primary" onClick="" id="alertHref" data-dismiss="modal">OK</a>
    </div>
</div>
<!-- End of code -->
<div id="loading" class="reveal-loading reveal-modal">
  <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_image'];?>
ajax-loader.gif" alt="Loading..."/>
</div>

   
</body>
<!-- END BODY -->
</html>

<script type="text/javascript">
$(window).load(function() {
	$('#myalert').modal('hide');
})
</script>
<?php }} ?>