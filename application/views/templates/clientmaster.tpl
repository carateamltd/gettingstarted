<script type="text/javascript" src="{$data.base_js}clientmaster.js"></script>
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
          	<h3 class="page-title">Client Master</h3>
          	<ul class="breadcrumb">
              	<li>
                   <a href="{$data.base_url}home">Dashboard</a>
                   <span class="divider">/</span>
              	</li>
              	<li><a href="{$data.base_url}clientmaster">View Client Master</a><span class="divider">/</span></li>
              	<li class="current">{if $operation eq 'add'}Add Client Master{else}Edit Client Master{/if}</li>
               
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
                 	{if $operation eq 'add'}Add Client Master{else}Edit Client Master{/if}
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
                    <form class="form-horizontal" action="{$data.base_url}clientmaster/{$data['mode']}" method="post">
                     	<input type="hidden" id="iClientId" name="iClientId" value="{$data.clientmaster['iClientId']}"> 
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vClientName" name="Data[vClientName]" value="{$data.clientmaster['vClientName']}"/>
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Description</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vClientDescription" 
                                        name="Data[vClientDescription]" value="{$data.clientmaster['vClientDescription']}"/>
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Username</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vUserName" name="Data[vUserName]" value="{$data.clientmaster['vUserName']}"/>
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vPassword" name="Data[vPassword]" value="{$data.clientmaster['vPassword']}"/>
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vEmail" name="Data[vEmail]" value="{$data.clientmaster['vEmail']}"/>
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Contact Number</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="iPhoneNumber" name="Data[iPhoneNumber]" value="{$data.clientmaster['iPhoneNumber']}"/>
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Address</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vAddress" name="Data[vAddress]" value="{$data.clientmaster['vAddress']}"/>
                                    </div>
                            </div>

                             <div class="control-group">
                                <label class="control-label">Country</label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" tabindex="1" id="iCountryId" name="Data[iCountryId]" >
                                            <option value="">---- Select Country ----</option>
                                            {section name = i loop = $data.countries}
                                                <option value="{$data.countries[i].iCountryId}" {if $data.countries[i].iCountryId eq $data.clientmaster.iCountryId} selected="selected" {/if} >{$data.countries[i].vCountry}</option>
                                            {/section}
                                    </select>
                                  </div>
                            </div>       
                            <div class="control-group">
                                <label class="control-label">State</label>
                                    <div class="controls">
                                        <select class="input-large m-wrap" tabindex="1" id="iStateId" name="Data[iStateId]">
                                            <option value="">---- Select State ----</option>
                                            {section name = i loop = $data.states}
                                            <option value="{$data.states[i].iStateId}" {if $data.states[i].iStateId eq $data.clientmaster.iStateId} selected="selected" {/if} >{$data.states[i].vState}</option>
                                            {/section}
                                        </select>
                                    </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">City</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="vCity" name="Data[vCity]" value="{$data.clientmaster['vCity']}"/>
                                    </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Post Code</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" class="input-large" id="iPostCode" name="Data[iPostCode]" value="{$data.clientmaster['iPostCode']}"/>
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