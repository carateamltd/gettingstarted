
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
             Application
           </h3>
           <ul class="breadcrumb">
               <li>
                   <a href="{$data.base_url}home">Dashboard</a>
                   <span class="divider">/</span>
               </li>
               <li class="active">
                   Application
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
    
    <div class="row-fluid">

        <div class="span12">
         <!-- BEGIN EXAMPLE TABLE widget-->
         <div class="widget purple">
             <div class="widget-title">
                 <h4><i class="icon-reorder"></i> Application</h4>
                <span class="tools">
                    <a href="javascript:;" class=""></a>
                    <a href="javascript:;" class=""></a>
                </span>

             </div>
             <div class="widget-body">
                 <div>
                     <div class="clearfix">
                         <!--div class="btn-group">
                             <a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
                                 Add New <i class="icon-plus"></i>
                             </a>
                         </div-->
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
                     
                     <div class="space15">
                     <div class="span6">
                        <div class="span6 ">
                            {if $data.role|count gt 0 }
                            <p class="text-paging">{$data.paging_message}</p>
                            {/if}
                        </div>
                    </div></div>
                        <!--table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Edit</th>
                            <th style="text-align:center;">Delete</th>
                        </tr>
                        </thead>
                        <tbody-->
                  <!--
                        {section name = i loop = $data.role}
                        <tr class="">
                            <td>{$data.role[i].vTitle}</td>
                            <td style="text-align:center">{$data.role[i].eStatus}</td>
                            <td style="text-align:center !important;"><a href="#" data-toggle="modal">
                                <i title="Edit" class="icon-pencil helper-font-24"></i></a>
                            </td>
                            <td style="text-align:center !important;"><a href="#"  data-toggle="modal" >
                                <i title="Delete"  class="icon-trash helper-font-24"></i></a>
                            </td>
                        </tr>
                        {/section}
                        -->
                        <!--/tbody>
                        </table-->
				    <div class="mainpartcont">
				    		<div class="tabingbtn">
							<div class="tbtn">
								<a href="{$data.base_url}app/step2/{$data.iApplicationId}">
									<span><img src="http://192.168.1.41/php/slb_new/assets/images/settings.png" alt="" /></span>
									<h2>1. Functionality</h2>
									<p>Customize App Tabs</p>
								</a>								
							</div>
							<div class="activetab">
								<a href="#">
									<span><img src="http://192.168.1.41/php/slb_new/assets/images/content.png" alt="" /></span>
									<h2>2. Content</h2>
									<p>Customize App Content</p>
								</a>								
							</div>
							<div class="tbtn">
								<a href="#">
									<span><img src="http://192.168.1.41/php/slb_new/assets/images/appearance.png" alt="" /></span>
									<h2>3. Appearance</h2>
									<p>Customize App Appearance</p>
								</a>								
							</div>
							<div class="tbtn">
								<a href="#">
									<span><img src="http://192.168.1.41/php/slb_new/assets/images/preview.png" alt="" /></span>
									<h2>4. Preview</h2>
									<p>Preview Your Applications</p>
								</a>								
							</div>
							<div class="tbtn">
								<a href="#">
									<span><img src="http://192.168.1.41/php/slb_new/assets/images/Publish.png" alt="" /></span>
									<h2>5. Publish</h2>
									<p>Publish To App Stores</p>
								</a>								
							</div>
						</div>
						
						<div class="tbdata">
					  
					    <div class="div_inner">

							<div id="tabs">
							  <ul>
							  {section name = i loop = $data.selected_feature_details}
								<li><a href="#tabs-{$data.selected_feature_details[i].iFeatureId}">{if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}</a></li>
							  {/section}
							  </ul>
							  {section name = i loop = $data.selected_feature_details}
								<div id="tabs-{$data.selected_feature_details[i].iFeatureId}">
									{$data.html.{$data.selected_feature_details[i].iFeatureId}}
								</div>
							  {/section}
							</div>
							
                          </div>
					      <div class="new-dlg-container">
                            <form name="buildwiz" method="post">

                            </form>
				          </div>
				        </div>
					  </div>
				    </div>
				    <div style="clear:both;"></div>
                        <div class="pagination">
                    {$data.create_links}
                </div>  
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


 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="myModalLabel">Pick Your App Features</h3>
  </div>
  <div class="modal-body">
    
    
    
    <div class="toptab">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<th align="left"><strong>Industry</strong> <span class="qmark">&nbsp;</span></th>
		<th align="left"><strong>App Name</strong> <span class="qmark">&nbsp;</span></th>
		<th align="left"><strong>App Icon Name</strong> <span class="qmark">&nbsp;</span></th>
	</tr>
	<tr>
		<td>
			<select class="indst" id="industry" name="appindustry">
				<option value="">Select App Industry</option>
				 {section name = i loop = $data.appindustry}
					<option value="{$data.appindustry[i].iIndustryId}">{$data.appindustry[i].vTitle}</option>
				{/section}
			</select>
		</td>
		<td><input class="indst" type="text" value="" size="30" id="app_name" name="app_name"></td>
		<td><input class="indst" type="text" maxlength="12" value="" size="30" id="app_icon" name="app_icon"></td>
	</tr>
	
</table>

    </div>
    
    <div class="midparttp">
    <div id="err"></div>
    		<div class="midleft">
			<fieldset>
			  <legend>Recommended:</legend>
			  <div class="innerlft">
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  </div>
			 </fieldset>
		</div>
		<div class="midright">
			<fieldset>
			  <legend>Optional:</legend>
			  <div class="innercont">
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  Right part<br/>
			  </div>
			 </fieldset>
		</div>
    </div>
    
    
    
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>
  </div>
</div>


  <script>
  $(function() {
	  var neworder = new Array();
    var tabs = $( "#tabs" ).tabs();
    var sel = "{$data.userdata.select_tab_iFeatureId}";
    console.log(neworder+'>>>>ddd');
    if(sel){
		var tabs =$( "#tabs" ).tabs( "option", "active", sel );
    }else{
		var tabs = $( "#tabs" ).tabs();
    }
    tabs.find( ".ui-tabs-nav" ).sortable({
      axis: "x",
       update : function () {  
		      

                $('#tabs li').each(function() {    
                    var id  = $(this).attr("aria-controls");

                    neworder.push(id);

                });
                console.log(neworder);
       },
      stop: function() {
        tabs.tabs( "refresh" );
      }
    });
  });
  </script>

