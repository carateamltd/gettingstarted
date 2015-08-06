<script type="text/javascript" src="{$data.base_js}classmaster.js"></script>
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
          	<h3 class="page-title">Class Master</h3>
          	<ul class="breadcrumb">
              	<li>
                   <a href="{$data.base_url}home">Dashboard</a>
                   <span class="divider">/</span>
              	</li>
              	<li><a href="{$data.base_url}classmaster">View Class Master</a><span class="divider">/</span></li>
              	<li class="current">{if $operation eq 'add'}Add Class Master{else}Edit Classmaster{/if}</li>
               
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
    

    <div class="row-fluid">
     <div class="span12">
         <!-- BEGIN EXAMPLE TABLE widget-->
        <div class="widget purple">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> 
                 	{if $operation eq 'add'}Add Class Master{else}Edit Class Master{/if}
                </h4>
                <span class="tools">
                    <a href="javascript:;" class=""></a>
                    <a href="javascript:;" class=""></a>
                </span>
            </div>
            <div class="widget-body">
                <div>
                    <div class="clearfix">
                        <div class="btn-group" style="display:none;">
                            <button id="editable-sample_new" class="btn green">
                                Add New <i class="icon-plus"></i>
                            </button>
                        </div>
                        <div class="btn-group pull-right" style="display:none;">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i></button>
                            <ul class="dropdown-menu pull-right" style="display:none;">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <form class="form-horizontal" action="{$data.base_url}classmaster/{$data['mode']}" method="post">
                     	<input type="hidden" id="iClassId" name="iClassId" value="{$data.classmaster['iClassId']}"> 
                            <div class="control-group">
                                <label class="control-label">Class</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vClassName" name="Data[vClassName]" value="{$data.classmaster['vClassName']}"/>
                                    </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success" id="btn-save">
                                Save</button>
                                <button type="button" class="btn" onclick="returnme()">Cancel</button>
                            </div>
                    </form>
                 </div>
             </div>
         </div>
         <!-- END EXAMPLE TABLE widget-->
     </div>
    </div>    
    <!-- END EDITABLE TABLE widget-->
    <!-- END PAGE CONTENT-->         
 </div>
 <!-- END PAGE CONTAINER-->
</div>