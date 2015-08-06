<script type="text/javascript" src="{$data.basedatatable_js}cms_listing.js"></script>
<script type="text/javascript" src="{$data.basedatatable_js}common.js"></script>

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
                	<form name="frmlist" id="frmlist" action="{$data.base_url}administrator/action_update" method="post">
  			<input type="hidden" name="action" id="action">
		    <div class="row-fluid">
		        <div class="span12">
		         <!-- BEGIN EXAMPLE TABLE widget-->
		        <div class="widget purple">
		           
		                <h4 class="widgettitle">
                        	<i class="icon-reorder"></i>
					    {if $data['user_info']['iRoleId'] eq '1'}
						   CMS
						  {else}
							Client
						  {/if}	
					   
					 
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
				
		        {if $data.message neq ''}
		            <div class="alert alert-info offset4 span3">
		               {$data.message}
		            </div>
		        {/if}            
		       
		    <table class="table table-striped table-bordered" id="CmsId" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="20%">
                  {foreach from=$lang item=val}
                  	{if $val.rLabelName == 'Page Name'}
                  		{$val.rField}
                  	 {/if}
                  		
                  {/foreach}</th>
                        <th width="8%" style="text-align:center;">{foreach from=$lang item=val}
                  	{if $val.rLabelName == 'Edit'}
                  		{$val.rField}
                  	 {/if}
                  		
                  {/foreach}</th>
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
			                    <a href="{$data.base_url}home">Dashboard</a>
			                    <span class="divider">/</span>
			                </li>
			            </li>
			            <li class="active">
			             
						  {if $data['user_info']['iRoleId'] eq '1'}
						   Administrator
						  {else}
							Client
						  {/if}			  
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
{literal}
<style type="text/css">
a.deleteicon{color: #4E4E4E; text-decoration: none;}
</style>
{/literal}
{literal}
<script>
    $(window).load(function() {  
      var user_warning='{/literal}{$data['warning']}{literal}';
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
{/literal}
