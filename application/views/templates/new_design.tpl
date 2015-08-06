
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
                            <th>App Name</th>
                            <th>App IconName</th>
                            <th style="text-align:center;">Status</th>
                            <th style="text-align:center;">Edit</th>
                            <th style="text-align:center;">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        {section name = i loop = $data.appinformation}
                        <tr class="">
                            <td>{$data.appinformation[i].tAppName}</td>
                             <td>{$data.appinformation[i].tAppIconName}</td>
                            <td style="text-align:center">{$data.appinformation[i].eStatus}</td>
                            <td style="text-align:center !important;"><a href="{$data.base_url}app/step2/{$data.appinformation[i].iApplicationId}" data-toggle="modal">
                                <i title="Edit" class="icon-pencil helper-font-24"></i></a>
                            </td>
                            <td style="text-align:center !important;"><a href="{$data.base_url}app/delete/{$data.appinformation[i].iApplicationId}"  data-toggle="modal" >
                                <i title="Delete"  class="icon-trash helper-font-24"></i></a>
                            </td>
                        </tr>
                        {/section}
                        </tbody>
                        </table>
                        <div class="pagination">
                    {$data.create_links}
                </div>
			 
			 <div class="appinwrap">
			 	<div class="choosemenu">
					<h2>Choose a menu style</h2>
					<div class="filtdrop">
						<label>Filter menu styles:</label>
						<select name="filter">
							<option>All</option>
							<option>Single Row</option>
							<option>Multi Row</option>
						</select>
					</div>
					<div class="toprowrgbtn"><a class="button_grey" style="" href="#"> Go To Detail Settings</a></div>
				</div>
				
				<div class="single_row_box">
				 <div class="single_box">
				 
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg">
					<div class="header_image_top">
					<div class="appr_preview_header_overlay"><img src='{$data.base_image}header_phone.png'/></div>
					</div>
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box">
					  <img src='{$data.base_upload}/tab_btn_background/4/TB4.png' width="100%"/>
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box">
					  <img src='{$data.base_image}footer_icon_time.png' width="100%"/>
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box"><img src='{$data.base_image}footer_icon_time.png' width="100%"/>
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box"><img src='{$data.base_image}footer_icon_time.png' width="100%"/>
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					  
					  <div class="footer_icon_time">
					  <div class="icon_box"><img src='{$data.base_image}footer_icon_time.png' width="100%"/>
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					  
					  
					 				 
					</div>
					
					<p class="text_single">Single Row 1</p>
				     </div>
					
				    </div>
				   
				  </div>
				  
				  
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg">
					<div class="header_image_top">
					<div style="height: 14px; z-index: 100;" class="new_top_bar">
						<img  style="float:left;" src="{$data.base_image}state_bar.png">
					</div>
					<div class="appr_preview_header">
					<div class="img_main_title"><img src='{$data.base_image}header_phone.png'/>
					<div id="global_preview_header_overlay" style="display: block; opacity: 0.25; height: 30px; background: rgb(82, 0, 0);"></div>
					<p style="color: rgb(255, 255, 255); text-shadow: 1px 1px 0px rgb(168, 0, 0);">Menu</p>
					</div></div>
					
						<div class="app_preview_main">
						<div id="section_bar" style="background-color: rgb(156, 0, 0); color: rgb(255, 255, 255);">
							Menu
						</div>
						<div class="oddrow" style="background: rgb(207, 158, 12); color: rgb(0, 0, 0);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Stackers</p>
						</div>
						<div class="evenrow" style="background: rgb(201, 4, 4); color: rgb(255, 255, 255);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Alternative Burgers</p>
						</div>
						<div class="oddrow" style="background: rgb(207, 158, 12); color: rgb(0, 0, 0);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Burger Bar</p>
						</div>
						<div class="evenrow" style="background: rgb(201, 4, 4); color: rgb(255, 255, 255);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Sauces</p>
						</div>
						<div class="oddrow" style="background: rgb(207, 158, 12); color: rgb(0, 0, 0);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Salads</p>
						</div>
						<div class="evenrow" style="background: rgb(201, 4, 4); color: rgb(255, 255, 255);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Snacks</p>
						</div>
						<div class="oddrow" style="background: rgb(207, 158, 12); color: rgb(0, 0, 0);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Sides</p>
						</div>
						<div class="evenrow" style="background: rgb(201, 4, 4); color: rgb(255, 255, 255);">
							<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
							<p>Hand-Spun Shakes</p>
						</div>
						
						</div>
					</div>
				     </div>
				    </div>
				  </div>
				  
				  
				  <!--<div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg1">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box1">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box1">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box1">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box1">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 2</p>
				     </div>
				    </div>
				   
				  </div>
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg2">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box2">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box2">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box2">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box2">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 3</p>
				     </div>
				    </div>
				   
				  </div>
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg3">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box3">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box3">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box3">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box3">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 4</p>
				     </div>
				    </div>
				   
				  </div>
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg4">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box4">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box4">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box4">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box4">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 5</p>
				     </div>
				    </div>
				   
				  </div>
				  
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg5">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box5">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box5">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box5">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box5">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 6</p>
				     </div>
				    </div>
				   
				  </div>
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg6">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box6">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box6">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box6">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box6">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 7</p>
				     </div>
				    </div>
				   
				  </div>
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg7">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box7">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box7">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box7">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box7">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 8</p>
				     </div>
				    </div>
				   
				  </div>
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg8">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box8">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box8">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box8">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box8">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 9</p>
				     </div>
				    </div>
				   
				  </div>
				  <div class="single_text_box">
				   <div class="single_img">
				    <div class="single_bg9">
				     <div class="icon_time_box">
					 <div class="footer_icon_time">
					  <div class="icon_box9">
					  <span class="time_img"><img src='{$data.base_image}time.png' width="70%"/></span>
					  <p class="text_home">Around us</p>
					  </div>
 				      </div>
					 
					 <div class="footer_icon_time">
					  <div class="icon_box9">
					  <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
					  <p class="text_home">Home</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box9">
					  <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
					  <p class="text_home">Events</p>
					  </div>
 				      </div>
					 <div class="footer_icon_time">
					  <div class="icon_box9">
					  <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
					  <p class="text_home">Messages</p>
					  </div>
 				      </div>
					 </div>
					
					<p class="text_single">Single Row 10</p>
				     </div>
				    </div>
				   
				  </div>-->
				  
	               </div>
				
				</div>
				
			 </div>
			 
			 
			 
			 <div style="clear:both;"></div>
			   
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
  <br>
<div id="err"></div>
<form name="save_app_feature" id="save_app_feature" action="{$data.base_url}app/save_app_feature" method="POST">
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
			<select class="indst" id="industry" name="appinformation[iIndustryId]">
				<option value="">Select App Industry</option>
				 {section name = i loop = $data.appindustry}
					<option value="{$data.appindustry[i].iIndustryId}">{$data.appindustry[i].vTitle}</option>
				{/section}
			</select>
		</td>
		<td><input class="indst" type="text" value="" size="30" id="app_name" name="appinformation[tAppName]"></td>
		<td><input class="indst" type="text" maxlength="12" value="" size="30" id="app_icon" name="appinformation[tAppIconName]"></td>
	</tr>
	
</table>

    </div>
    
    <div class="midparttp">
    		<div class="midleft">
			<fieldset>
			  <legend>Recommended:</legend>
			  <div class="innerlft" id="inlft">
			  </div>
			 </fieldset>
		</div>
		<div class="midright">
			<fieldset>
			  <legend>Optional:</legend>
			  <div class="innercont">

			  </div>
			 </fieldset>
		</div>
    </div>
    
  </div>
</form>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button type="button" class="btn btn-primary" id="save_feature">Save Feature & Continue</button>
  </div>
</div>
