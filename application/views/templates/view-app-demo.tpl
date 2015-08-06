
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
                         <div class="btn-group">
                             <a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
                                 Add New <i class="icon-plus"></i>
                             </a>
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
                     
                     <div class="space15">
                     <div class="span6">
                        <div class="span6 ">
                            {if $data.role|count gt 0 }
                            <p class="text-paging">{$data.paging_message}</p>
                            {/if}
                        </div>
                    </div></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Edit</th>
                            <th style="text-align:center;">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                        </table>
				    <div class="mainpartcont">
				    		<div class="tabingbtn">
							<div class="tbtn">
								<a href="#">
									<span><img src="http://192.168.1.41/php/slb_new/assets/images/settings.png" alt="" /></span>
									<h2>1. Functionality</h2>
									<p>Customize App Tabs</p>
								</a>								
							</div>
							<div class="tbtn">
								<a href="#">
									<span><img src="http://192.168.1.41/php/slb_new/assets/images/content.png" alt="" /></span>
									<h2>2. Content</h2>
									<p>Customize App Content</p>
								</a>								
							</div>
							<div class="activetab">
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
						<div class="midmainwrap">
						<ul>
							<li><a href="#maintabs-appearance">Appearance</a></li>
							<li><a href="#maintabs-backimg">Background Image</a></li>
							<li><a href="#maintabs-applayout">App Layout</a></li>
						</ul>
						<div id="maintabs-appearance" class="noleftspace">	
							<div class="leftpartappearance">
								<ul class="tabbgchange">
									<li class="activetabbtn"><a href="#appr-layout">Layout</a></li>
									<li class="tbbg"><a href="#appr-buttons">Buttons</a></li>
									<li class="tbbg"><a href="#appr-header">Header</a></li>
									<li class="tbbg"><a href="#appr-colors">Colors</a></li>
								</ul>
								<div style="clear:both;"></div>
								<div id="appr-layout" class="appr-layout levelborder">
									<ul class="innertabbtn">
										<li class="innertabbtncklik"><a href="#appr-layout-rowcol">Rows &amp; Columns &amp; Layout</a></li>
										<li class="inactivebtntab"><a href="#appr-buttons-subtbs">Sub Tabs</a></li>
									</ul>
									<div id="appr-layout-rowcol">
										Rows & Columns & Layout
									</div>
										
									<div id="appr-buttons-subtbs">
										Sub Tabs
									</div>
										
								</div>
								<div id="appr-buttons" class="appr-buttons levelborder">

									<ul class="innertabbtn">
										<li class="innertabbtncklik"><a href="#appr-buttons-tabbackg">Tab Background</a></li>
										<li class="inactivebtntab"><a href="#appr-buttons-icolor">Icon Color</a></li>
										<li class="inactivebtntab"><a href="#appr-buttons-tabcol">Tab Color</a></li>
										<li class="inactivebtntab"><a href="#appr-buttons-tabtext">Tab Text</a></li>
									</ul>
									<div id="appr-buttons-tabbackg">
										Tab Background
									</div>
										
									<div id="appr-buttons-icolor">
										Icon Color
									</div>
									<div id="appr-buttons-tabcol">
										Tab Color
									</div>
										
									<div id="appr-buttons-tabtext">
										Tab Text
									</div>


								</div>
								<div id="appr-header" class="appr-header levelborder">


									<ul class="innertabbtn">
										<li class="innertabbtncklik"><a href="#appr-header-lh">Launch Header</a></li>
										<li class="inactivebtntab"><a href="#appr-header-lt">Launcher Tint</a></li>
										<li class="inactivebtntab"><a href="#appr-header-gh">Global Header</a></li>
										<li class="inactivebtntab"><a href="#appr-header-gt">Global Tint</a></li>
									</ul>
									<div id="appr-header-lh">
										Launch Header
									</div>
										
									<div id="appr-header-lt">
										Launcher Tint
									</div>
									<div id="appr-header-gh">
										Global Header
									</div>
										
									<div id="appr-header-gt">
										Global Tint
									</div>


								</div>
								<div id="appr-colors" class="appr-colors levelborder">

									<ul class="innertabbtn">
										<li class="innertabbtncklik"><a href="#appr-colors-gac">Global App Colors</a></li>
										<li class="inactivebtntab"><a href="#appr-colors-subtbs">Global Fonts</a></li>
									</ul>
									<div id="appr-colors-gac">
										Global App Colors
									</div>
										
									<div id="appr-colors-gf">
										Global Fonts
									</div>


								</div>
							
							</div>
							<div class="rightpartappearance">
								<div class="main_iphonebg">
                                <!--***************template 1**************-->
									<div class="innerdesign" style="display:none;">
                                    
                                    	<div class="iphonetopbar"><img src="{$data.base_image}state_bar.png" alt="" /></div>
                                        <div class="header_main">
                                        	<div class="hed_bg"><img src="{$data.base_image}header-bg1.png" alt="" /></div>
                                            <div style="width:100%; background:#C20000; height:44px; display:block; opacity: 0.295;">&nbsp;</div>
                                        </div>
                                        <div class="iphone_overlay"><img src="{$data.base_image}iphone_overlay.png" alt="" /></div>
                                        
                                       
                                        
                                        <div class="footer_tab">        
                                        
                                       	  <ul style="list-style:none; padding:0; margin:0; height:80px; overflow:hidden;">
                                            	<li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}footer_icon_time9.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:80px; width:71px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                     
                                                     <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}footer_icon_time9.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:80px; width:71px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}upload_009.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:80px; width:71px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}footer_icon_time9.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:80px; width:71px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                                                         
                                            </ul>
                                           
                                        </div>
                                    
                                  </div>
                                  
                                  <!--***************template 1 Enf**************-->
                                  
                                  
                                  <!--***************colors page**************-->
                                  
                                  <div class="colors_main">
                                  
                                  	<div class="iphonetopbar"><img src="{$data.base_image}state_bar.png" alt="" /></div>
                                        <div class="header_main">
                                        	<div class="hed_bg"><img src="{$data.base_image}header-bg1.png" alt="" /></div>
                                            <p style="text-align:center; color:#FFF; position:absolute; z-index:99; font-size:20px; font-weight:bold; width:100%; line-height:43px;">Menu</p>
                                            <div style="width:100%; background:#000; height:44px; display:block; opacity: 0.295;">&nbsp;</div>
                                        </div>
                                        <div class="iphone_overlay"><img src="{$data.base_image}iphone_overlay.png" alt="" /></div>
                                        
                                        <h1 id="page_title" style="background:#9C0000; color:#FFF;">Menu </h1>
                                        <ul class="color_info">
                                        	<li style="background:#CF9E0C; color:#000;">
                                            	<p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#C90404; color:#FFF;">
                                            	<p>Alternative Burgers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#CF9E0C; color:#000;">
                                            	<p>Burger Bar</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#C90404; color:#FFF;">
                                            	<p>Sauces</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#CF9E0C; color:#000;">
                                            	<p>Salads</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#C90404; color:#FFF;">
                                            	<p>Snacks</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#CF9E0C; color:#000;">
                                            	<p>Sides</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#C90404; color:#FFF;">
                                            	<p>Hand-Spun Shakes</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#CF9E0C; color:#000;">
                                            	<p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#C90404; color:#FFF;">
                                            	<p>Alternative Burgers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                            <li style="background:#CF9E0C; color:#000;">
                                            	<p>Stackers</p> <span><img src="{$data.base_image}cute_app_arrow.png" alt="" /></span>
                                            </li>
                                        </ul>
                                  
                                  
                                  </div>
                                  
                                  <!--***************colors End**************-->
                                  
                                   <!--***************3 tab html**************-->
                                  
                                  <div class="innerdesign" style="display:none;">
                                    
                                    	<div class="iphonetopbar"><img src="{$data.base_image}state_bar.png" alt="" /></div>
                                        <div class="header_main">
                                        	<div class="hed_bg"><img src="{$data.base_image}header-bg1.png" alt="" /></div>
                                            <div style="width:100%; background:#C20000; height:44px; display:block; opacity: 0.295;">&nbsp;</div>
                                        </div>
                                        <div class="iphone_overlay"><img src="{$data.base_image}iphone_overlay.png" alt="" /></div>
                                        
                                       
                                        
                                        <div class="three_footer_tab">        
                                        
                                       	  <ul style="list-style:none; padding:0; margin:0; height:94px; overflow:hidden;">
                                            	<li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}footer_icon_time9.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:94px; width:94px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                     
                                                     <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}footer_icon_time9.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:94px; width:94px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}upload_009.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:94px; width:94px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                
                                                                                         
                                            </ul>
                                           
                                        </div>
                                    
                                  </div>
                                  
                                  <!--***************3 tab html End**************-->
                                  
                                   <!--***************5 tab html**************-->
                                   
                                   <div class="innerdesign" style="display:none;">
                                    
                                    	<div class="iphonetopbar"><img src="{$data.base_image}state_bar.png" alt="" /></div>
                                        <div class="header_main">
                                        	<div class="hed_bg"><img src="{$data.base_image}header-bg1.png" alt="" /></div>
                                            <div style="width:100%; background:#C20000; height:44px; display:block; opacity: 0.295;">&nbsp;</div>
                                        </div>
                                        <div class="iphone_overlay"><img src="{$data.base_image}iphone_overlay.png" alt="" /></div>
                                        
                                       
                                        
                                        <div class="five_footer_tab">        
                                        
                                       	  <ul style="list-style:none; padding:0; margin:0; height:56px; overflow:hidden;">
                                            	<li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}footer_icon_time9.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:56px; width:56px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                     
                                                     <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}footer_icon_time9.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:56px; width:56px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}upload_009.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:56px; width:56px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}upload_009.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:56px; width:56px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                <li style="background:#520000;">
                                                	<a href="#">
                                                    	<span class="tab_bg"><img src="{$data.base_image}upload_009.png" alt="" /></span>
                                                        <span class="menumain">
                                                        	<span><img src="{$data.base_image}icon_back_area_main.png" alt="" /></span>
                                                            <span>Home</span>
                                                        </span>
                                                        <span style="height:56px; width:56px; position:absolute; z-index:99; background:#520000; left:0; top:0; opacity: 0.5;">&nbsp;</span>
                                                    </a>
                                                </li>
                                                
                                                                                         
                                            </ul>
                                           
                                        </div>
                                    
                                  </div>
                                   
                                   <!--***************5 tab html End**************-->
                                  
                                  
                                  
								</div>
							</div>
						</div>
						<div id="maintabs-backimg">
							Background Image
						</div>
						<div id="maintabs-applayout">
							App Layout
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
