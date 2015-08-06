<?php /* Smarty version Smarty-3.1.11, created on 2015-06-27 21:26:47
         compiled from "application/views/templates/view-cms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1035312016558eb2a7f21628-42546917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77ba2d4f7aa7cce0d91c277a71bf37ab8dc65260' => 
    array (
      0 => 'application/views/templates/view-cms.tpl',
      1 => 1428473762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1035312016558eb2a7f21628-42546917',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'lang' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_558eb2a803e4b7_10493050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558eb2a803e4b7_10493050')) {function content_558eb2a803e4b7_10493050($_smarty_tpl) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
cms_listing.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['basedatatable_js'];?>
common.js"></script>

  <div class="rightpanel">
   		<div class="pageheader">
        	<div class="pageicon"><span class="icon-wrench"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	CMS
               </h1>
            </div>
        </div>
        <ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-wrench"></i></a> <span class="separator"></span></li>
            <li>CMS</li>
        </ul>
        
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
                	<form name="frmlist" id="frmlist" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
administrator/action_update" method="post">
  			<input type="hidden" name="action" id="action">
		    <div class="row-fluid">
		        <div class="span12">
		         <!-- BEGIN EXAMPLE TABLE widget-->
		        <div class="widget purple">
		           
		                <h4 class="widgettitle">
                        	<i class="icon-reorder"></i>
					    <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						   CMS
						  <?php }else{ ?>
							Client
						  <?php }?>	
					   
					 
					 </h4>
		                <span class="tools">
		                    <a href="javascript:;" class=""></a>
		                    <a href="javascript:;" class=""></a>
		                </span>
				
		        <div class="widget-body">
		        	<div class="clearfix">
			            <div class="btn-group">
			            </div>
			            <div class="btn-group pull-right" style="display:none;">
			                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
			                </button>
			                <ul class="dropdown-menu pull-right">
			                    <li><a href="#">Print</a></li>
			                    <li><a href="#">Save as PDF</a></li>
			                    <li><a href="#">Export to Excel</a></li>
			                </ul>
			            </div>
		        	</div>
				
		        <?php if ($_smarty_tpl->tpl_vars['data']->value['message']!=''){?>
		            <div class="alert alert-info offset4 span3">
		               <?php echo $_smarty_tpl->tpl_vars['data']->value['message'];?>

		            </div>
		        <?php }?>            
		       
		    <table class="table table-striped table-bordered" id="CmsId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="20%">
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  	<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Page Name'){?>
                  		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                  	 <?php }?>
                  		
                  <?php } ?></th>
                        <th width="8%" style="text-align:center;"><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  	<?php if ($_smarty_tpl->tpl_vars['val']->value['rLabelName']=='Edit'){?>
                  		<?php echo $_smarty_tpl->tpl_vars['val']->value['rField'];?>

                  	 <?php }?>
                  		
                  <?php } ?></th>
                    </tr>
                </thead>
            </table>         
		        <!-- END EXAMPLE TABLE widget-->
			</div>   
			<!-- END PAGE CONTENT-->         
</div>
		</div>
		</div>
	</form>
    
    				<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Confirm Delete</h3>
          </div>
          <div class="modal-body">
            Are you sure?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="" id="mylink"><button type="button" class="btn btn-primary">Delete</button></a>
          </div>
        </div>
      </div>
    </div>
    				
                    <br /><br />
                </div>
                <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                       <!-- <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
                    </div>
                </div>
            </div>
        </div>
  </div>
  
  <!-- Code Commented By Alpesh Prajapati --> 
  
<!--<div id="main-content">-->
	<!-- BEGIN PAGE CONTAINER-->
 	<!--<div class="container-fluid">-->
	    <!-- BEGIN PAGE HEADER-->   
	   <!-- <div class="row-fluid">
	        <div class="span12">-->
	            <!-- BEGIN THEME CUSTOMIZER-->
	           <!-- <div id="theme-change" class="hidden-phone">
	                <i class="icon-cogs"></i>
	                <span class="settings">
	                    <span class="text">Theme Color:</span>
	                    <span class="colors">
	                        <span class="color-default" data-style="default"></span>
	                        <span class="color-green" data-style="green"></span>
	                        <span class="color-gray" data-style="gray"></span>
	                        <span class="color-purple" data-style="purple"></span>
	                        <span class="color-red" data-style="red"></span>
	                    </span>
	                </span>
	            </div>-->
	        <!-- END THEME CUSTOMIZER-->
	        
	        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
		   <!--     <h3 class="page-title">
		            CMS
		        </h3>-->
			        <!--ul class="breadcrumb">
			            <li>
			                <li>
			                    <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['base_url'];?>
home">Dashboard</a>
			                    <span class="divider">/</span>
			                </li>
			            </li>
			            <li class="active">
			             
						  <?php if ($_smarty_tpl->tpl_vars['data']->value['user_info']['iRoleId']=='1'){?>
						   Administrator
						  <?php }else{ ?>
							Client
						  <?php }?>			  
			            </li>
			            <li class="pull-right search-wrap">
			                <form action="search_result.html" class="hidden-phone">
			                    <div class="input-append search-input-area">
			                        <input class="" id="appendedInputButton" type="text">
			                        <button class="btn" type="button"><i class="icon-search"></i> </button>
			                    </div>
			                </form>
			            </li>
			        </ul-->
	        <!-- END PAGE TITLE & BREADCRUMB-->
	       <!--	</div>-->
	    <!-- END PAGE HEADER-->  	
	   <!-- </div>-->
		 	<!-- BEGIN PAGE CONTENT-->
		 	

<!--
		</div>-->
	<!-- END PAGE CONTAINER-->

<!--</div>-->

<style type="text/css">
a.deleteicon{color: #4E4E4E; text-decoration: none;}
</style>


<script>
    $(window).load(function() {  
      var user_warning='<?php echo $_smarty_tpl->tpl_vars['data']->value['warning'];?>
';
       if(user_warning == '1')
       {
            $("#deleteMessage").html( "<p>You do not have sufficient privileges to access this page.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
       if(user_warning == 'delete')
       {
            $("#deleteMessage").html( "<p>The record which you are trying to access has been already deleted.</p>" );
            $("#deletealert").modal('show');
            exit();
       }
    });
</script>

<?php }} ?>