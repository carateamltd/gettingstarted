<script type="text/javascript" src="{$data.basedatatable_js}classmaster_listing.js"></script>
<div id="main-content">
 <!-- BEGIN PAGE CONTAINER-->
 <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->	   
    <div class="row-fluid">
       	<div class="span12">
           	<!-- BEGIN THEME CUSTOMIZER-->
           	<div id="theme-change" class="hidden-phone">
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
           	</div>
          	<!-- END THEME CUSTOMIZER-->
          	<!-- BEGIN PAGE TITLE & BREADCRUMB-->
          	<h3 class="page-title">
            Class Master
           	</h3>
           	<ul class="breadcrumb">
              	<li>
                  	<a href="{$data.base_url}home">Dashboard</a>
                   	<span class="divider">/</span>
               	</li>
               	<li class="active">
                   	Class Master
               	</li>
               	<li class="pull-right search-wrap">
                   	<form action="search_result.html" class="hidden-phone">
                       	<div class="input-append search-input-area">
                           	<input class="" id="appendedInputButton" type="text">
                           	<button class="btn" type="button"><i class="icon-search"></i> </button>
                       	</div>
                   	</form>
               	</li>
           	</ul>
           	<!-- END PAGE TITLE & BREADCRUMB-->
       	</div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <form name="frmlist" id="frmlist" action="{$data.base_url}classmaster/action_update" method="post">
        <input type="hidden" name="action" id="action">
    <div class="row-fluid">
	<div class="span12">
         <!-- BEGIN EXAMPLE TABLE widget-->
        <div class="widget purple">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Class Master</h4>
                <span class="tools">
                    <a href="javascript:;" class=""></a>
                    <a href="javascript:;" class=""></a>
                </span>
			</div>
            <div class="widget-body">
        <div>
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
        <div class="alert alert-info">
            {$data.message}
        </div>
    {/if}
    <div class="space15">
      
        <div class="pull-right">
        <a href="{$admin_url}classmaster/create" class="btn green">Add New <i class="icon-plus"></i></a>
        <button type="submit" id="btn-delete" class="btn green">Delete</button>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="ClassmasterlistingId" border="0" cellpadding="0" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th width="5%"><input type="checkbox" id="check_all" name="check_all" value="1"></th>
                <th width="45%">Class Name</th>
                <th width="25%" style="text-align:center;">Edit</th>
                <th width="25%" style="text-align:center;">Delete</th>
            </tr>
            </thead>
    </table>
    <!-- <table class="table table-striped table-hover table-bordered" id="editable-sample">
        <thead>
            <tr>
                <th>Class Name</th>
                <th style="text-align:center">Edit</th>
                <th style="text-align:center">Delete</th>
            </tr>
        </thead>
        <tbody>
          {if $data.classmaster|count gt 0 }
            {section name = i loop = $data.classmaster}
            <tr class="">
                <td>{$data.classmaster[i].vClassName}</td>
                
                <td style="text-align:center !important;"><a href="{$data.base_url}classmaster/update/{$data.classmaster[i].iClassId}" data-toggle="modal"><i title="Edit" class="icon-pencil helper-font-24"></i></a></td>
                <td style="text-align:center !important;"><a href="{$data.base_url}classmaster/delete/{$data.classmaster[i].iClassId}"  
                data-toggle="modal">
                <i title="Delete" class="icon-trash helper-font-24"></i></a>
                </td>
           	</tr>
            {/section}
            {else}
            <tr>
                    <td colspan="4"><div class="text-center">{$data.paging_message}</div></td>
            </tr>
            {/if}
        </tbody>
    </table>
        <div class="pagination">
            {$data.create_links}
        </div>   -->
       </div>
      </div>
     </div>
    <!-- END EXAMPLE TABLE widget-->
    </div>
   </div>
</form>
	<!-- END EDITABLE TABLE widget-->
	<!-- END PAGE CONTENT-->         
 </div>
 <!-- END PAGE CONTAINER-->
</div>