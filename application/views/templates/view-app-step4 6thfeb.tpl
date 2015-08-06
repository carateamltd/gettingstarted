<script src="{$data.base_js}jquery.form.js"></script>
<div id="main-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->   
    <div class="row-fluid">	
      <div class="span12">
	<!-- BEGIN THEME CUSTOMIZER-->
	<!--div id="theme-change" class="hidden-phone">
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
	</div-->
	<!-- END THEME CUSTOMIZER-->
	<!-- BEGIN PAGE TITLE & BREADCRUMB-->
	<h3 class="page-title">
	Application
	</h3>
	<!--ul class="breadcrumb">
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
      </ul-->
      <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
  </div>
  <!-- END PAGE HEADER-->
  <!-- BEGIN PAGE CONTENT-->

  <div class="row-fluid">

    <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
      <div class="widget purple brdrnone">
	 <!--div class="widget-title">
	    <h4><i class="icon-reorder"></i> Application</h4>
	    <span class="tools">
	       <a href="javascript:;" class="icon-chevron-down"></a>
	       <a href="javascript:;" class="icon-remove"></a>
	    </span>
	 </div-->
	 <div class="widget-body">

	       	<div class="clearfix">
	       		<div class="btn-group">
	       			<!--a href="#myModal" class="btn green" id="add_app" role="button" data-toggle="modal">
		  Add New <i class="icon-plus"></i>
		  </a-->
	       			</div>
		  		<div class="btn-group pull-right" style="display:none;">
		  			<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i></button>
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
			{/if}		     		</div>
		  		</div>
       		</div>
	 	<div class="mainpartcont">
	 		
	 		{include file="tab.tpl" }
	 		
	 		<div class="tbdata">
	 			<div class="progress" >
	 				<div class="bar" style="width: 60%;"></div>
		     		</div>
		     		<div class="midmainwrap">
		     			<ul>
		     				<li><a href="#maintabs-appearance">Appearance</a></li>
			   		<li><a href="#background_images">Background Image</a></li>
			   		<li><a href="#maintabs-applayout">App Layout</a></li>
					</ul>
			
			<!--************Tab 1 start**************-->		
			<div id="maintabs-appearance" class="main_step_3"> 
			
			<div class="tab_main_title">
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_new">
				 <tr>
				    <td width="350" align="left" style="padding-left: 20px;">
      				    <h2>Premium Design</h2>
				    </td>
				    <td width="300">
				    <a href="#"><span  class="qmark">&nbsp;</span></a>
				    </td>
				    <td align="right">
				    <input type="button" value="Save"  class="btn btn_upload_icon" onclick="saveappdesigndata();" />
				    <a href="{$data.base_url}app/newdesign_templates/{$data.iApplicationId}" class="btn btn_upload_icon" style="text-decoration:none;color:white;float: right;">Back To Browse Templates</a>
				    </td>
				 </tr>
			      </table>
			   </div>
			   
			   <div style="float:left; width:100%;">
			   	
					<div class="leftpartappearance">
			      <ul class="tabbgchange">
				 <li class="activetabbtn"><a href="#appr-layout" id="showLayoutAppearance">Layout</a></li>
				 <li class="tbbg"><a href="#appr-buttons" id="showButtonsAppearance">Buttons</a></li>
				 <li class="tbbg"><a href="#appr-header" id="showHeaderAppearance">Header</a></li>
				 <li class="tbbg"><a href="#appr-colors" id="showColorAppearance">Colors</a></li>
			      </ul>
			      <div style="clear:both;"></div>
			      <div id="appr-layout" class="appr-layout levelborder">
				 <ul class="innertabbtn">
				    <li class="innertabbtncklik"><a class="btn" href="#appr-layout-rowcol">Rows &amp; Columns &amp; Layout</a></li>
				    <!--<li class="inactivebtntab"><a class="btn" data-controls-modal="subTabs" data-backdrop="static" data-keyboard="false" href="#appr-buttons-subtbs" id="appearance_sub_tabs">Sub Tabs</a></li>-->
				 </ul>
			      <div id="appr-layout-rowcol" class="app_layout_main">
				 <div>
				    <div class="button_1" id="buttonsDiv">
				       <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
					  <tr>
					  <td><label class="spec_label">Buttons: <span class="qmark">&nbsp;</span></label></td>
					  <td><label>
					  <input type="checkbox"  class="onbtn"  name="eCallBtn" id="eCallBtn" {if $data.allappdesignInfo[0].eCallBtn eq "Yes"} checked="ckecked" {/if} />
					  Call Button </label>
					  </td>
					  <td><label>
					  <input type="checkbox"  class="onbtn"  name="eDirectionBtn" id="eDirectionBtn"  {if $data.allappdesignInfo[0].eDirectionBtn eq "Yes"} checked="ckecked" {/if} />
					  Direction Button </label>
					  </td>
					  <td><label>
					  <input type="checkbox"  class="onbtn"  name="eTellFriendBtn" id="eTellFriendBtn" {if $data.allappdesignInfo[0].eTellFriendBtn eq "Yes"} checked="ckecked" {/if} />
					  Tell Friend Button</label></td>
					  </tr>
				       </table>
				    </div>

				    <div class="button_1">
				       <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
					  <tr>
					  <td width="29%"><label class="spec_label">Show Status Bar? <span class="qmark">&nbsp;</span></label></td>
					  <td><label>
					  <input type="checkbox"  class="onbtn"  name="eShowStatusBar" id="eShowStatusBar" {if $data.allappdesignInfo[0].eShowStatusBar eq "Yes"} checked="ckecked" {/if} />&nbsp;</label>
					  </td>
					  </tr>
				       </table>
				    </div>
				    <div class="button_1">
				       <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
					  <tr>
					     <td>
						 <label>
						<img src="{$data.base_logo}app_layout_bottom.png" alt="SLB" />
                        
			                        {if $data.allappdesignInfo[0].eBtnLayout eq "Bottom"}
			                            {assign var="bottomcheck" value="checked"}
			                        {elseif $data.allappdesignInfo[0].eBtnLayout eq "Top"}
			                            {assign var="topcheck" value="checked"}
			                        {elseif $data.allappdesignInfo[0].eBtnLayout eq "Left"}
			                            {assign var="leftcheck" value="checked"}
			                        {elseif $data.allappdesignInfo[0].eBtnLayout eq "Right"}
			                            {assign var="rightcheck" value="checked"}
			                        {else $data.allappdesignInfo[0].eBtnLayout eq ""}
			                            {assign var="bottomcheck" value="checked"}
			                        {/if}
                         
						<label class="margin_5ptop">
						   <input type="radio" value="bottom" class="onbtn_radi"  name="radio_layout" id="layoutbot" {$bottomcheck} onClick="change_layout('icon_time_box');"/>Bottom
	        				</label></label>
					     </td>
					     <td>
						 <label>
						<img src="{$data.base_logo}app_layout_top.png" alt="SLB" /> 
					        <label class="margin_5ptop">
						<input type="radio" value="top" class="onbtn_radi" {$topcheck}  name="radio_layout" id="layouttop" onClick="change_layout('icon_top_boxs');"/>Top
						</label></label>
					     </td>
					     <td>
						 <label>
						<img src="{$data.base_logo}app_layout_left.png" alt="SLB" /> 
						<label class="margin_5ptop">
						   <input type="radio" value="left" class="onbtn_radi" {$leftcheck} name="radio_layout" id="layoutleft" onClick="change_layout('icon_left_boxs');"/>Left
		  				</label></label>
					     </td>
					     <td>
						 <label>
						<img src="{$data.base_logo}app_layout_right.png" alt="SLB" /> 
						<label class="margin_5ptop">
						<input type="radio" value="right" class="onbtn_radi" {$rightcheck} name="radio_layout" id="layoutright" onClick="change_layout('icon_right_boxs');"/>Right
						</label></label>
					     </td>
					  </tr>
				       </table>
				    </div>

				    <div class="button_1">
				       <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
					  <tr>
					  <td width="29%"><label class="spec_label">More Button Navigation? <span class="qmark">&nbsp;</span></label></td>
					  <td><label>
					  <input type="checkbox" value="1" class="onbtn"  name="checkbox7" />&nbsp;</label>
					  </td>
					  </tr>
				       </table>
				    </div>
				    
				    <div class="button_1">
				       <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
					  <tr>
					  <td width="29%"><label class="spec_label">Rows <span class="qmark">&nbsp;</span></label></td>
					  <td><select  name="mapping_row" id="mapping_row" onchange="return manageButtons(this.value);">
						<option value="Single Row" {if $data.allappdesignInfo[0].vMappingRow eq "Single Row"} selected="selected" {/if}>Single Row</option>
						<option value="2 Rows" {if $data.allappdesignInfo[0].vMappingRow eq "2 Rows"} selected="selected" {/if}>2 Rows</option>
						<option value="3 Rows" {if $data.allappdesignInfo[0].vMappingRow eq "3 Rows"} selected="selected" {/if}>3 Rows</option>
						<option value="4 Rows" {if $data.allappdesignInfo[0].vMappingRow eq "4 Rows"} selected="selected" {/if}>4 Rows</option>
					   </select>
					  </td>
					  </tr>
				       </table>
				    </div> 

				    <div class="button_1">
				       <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
					  <tr>
					  <td width="29%"><label class="spec_label">Columns <span class="qmark">&nbsp;</span></label></td>
					  <td><select  name="mapping_coll" id="mapping_coll">
						<option value="3 Columns" {if $data.allappdesignInfo[0].vMappingCol eq "3 Columns"} selected="selected" {/if}>3 Columns</option>
						<option value="4 Columns" {if $data.allappdesignInfo[0].vMappingCol eq "4 Columns"} selected="selected" {/if}>4 Columns</option>
						<option value="5 Columns" {if $data.allappdesignInfo[0].vMappingCol eq "5 Columns"} selected="selected" {/if}>5 Columns</option>
					   </select>
					  </td>
					  </tr>
				       </table>
				    </div>
				 </div>
			      </div>
			      <div id="appr-buttons-subtbs">				 
				  {include file="appearance_sub_tabs.tpl" }			 			 
   			      </div>
			   </div>
			   <div id="appr-buttons" class="appr-buttons levelborder">
			      <ul class="innertabbtn">
				 <li class="innertabbtncklik"><a class="btn" href="#appr-buttons-tabbackg">Tab Background</a></li>
				 <li class="inactivebtntab"><a class="btn" href="#appr-buttons-icolor">Icon Color</a></li>
				 <li class="inactivebtntab"><a class="btn" href="#appr-buttons-tabcol">Tab Color</a></li>
				 <li class="inactivebtntab"><a class="btn" href="#appr-buttons-tabtext">Tab Text</a></li>
			      </ul>
			      <div id="appr-buttons-tabbackg">
				 <div class="button_1">
				    <form name="buuton_upload" id="buuton_upload" method="post" action="{$data.base_url}app/upload_button_img" enctype="multipart/form-data">
					   <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl_right">
					   <tr>
						<td class="btnbrowse btnhelp"><label><a class="tooltip_text" href="#"><img src="{$data.base_image}quaton_icon.png" align="absmiddle"/> <span><img class="callout_text" src="{$data.base_image}callout.gif" /> Upload image action will also save your current settings.</span></a></label></td>
						<td class="btnbrowse"><input type="file" id="image_upload"  name="file_uploads_btn" onchange="CheckValidFile(this.value,'image_upload');" /></td>				    
						<td><input type="button" class="btn btn_upload_icon" name="upload_btn_icon"  value="Upload" onclick="return uploadButton();"/></td>
					   </tr>
					   </table>
				    </form>
				 </div>
				 <div class="buttons_group">
				    <div class="button_1">
				       <ul class="listing_select_icons" id="appearance_button_img">
					  {section name = i loop = $data.buttons_tab_background}
                         <li>
    						<label>
                            <div class="hover_active_back active_btn_mobile">
    						<img src="{$data.base_upload}tab_btn_background/{$data.buttons_tab_background[i].iBtntabbackgroundId}/{$data.buttons_tab_background[i].vImage}" height="75px" width="75px" alt="SLB" /> 
    						<label class="margin_5ptop">
    						<input type="radio" value="{$data.buttons_tab_background[i].iBtntabbackgroundId}" {if $data.buttons_tab_background[i].iBtntabbackgroundId eq  $data.allappdesignInfo[0].iBackgroundId} checked="checked" {/if}  class="onbtn_radi"  name="tabbackimage"  onClick="chng_back_icon({$data.buttons_tab_background[i].iBtntabbackgroundId});"/></label>
    						</label>
    						</div>
					     </li>
					  {/section}
				       </ul>
					   
					   
				    </div>
				 </div>
			      </div>
			      <div id="appr-buttons-icolor">
         			 <div class="button_1 height_fix_500">
				    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
				       <tr>
					  <td>
					  <div class="hover_active_color active_btn_mobile">
					  <label class="flt_lft_radio">
						  <input type="radio" value="" class="onbtn_radi"  name="iconcolor"/>
					  </label>
					  <img src="{$data.base_logo}no_icon_sign.png" alt="SLB" /> 
					  </div>
					  </td>
				       </tr>
				      {section name=i loop=$data.all_iconcolors}
				       <tr>
					  <td>
					  <div class="hover_active_color">
					  <label class="flt_lft_radio">
						  <input type="radio" value="{$data.all_iconcolors[i].iIconcolorId}" {if $data.all_iconcolors[i].iIconcolorId eq $data.allappdesignInfo[0].iIconcolorId} checked="ckecked" {/if} class="onbtn_radi"  name="iconcolor" onClick="change_icon_color({$data.all_iconcolors[i].iIconcolorId})"/>
					  </label>
					 
					  {section name=j loop=$data.all_icons max=5}
					    <img src="{$data.base_upload}tab_icon/{$data.all_iconcolors[i].iIconcolorId}/{$data.all_icons[j].vImage}" alt="SLB" /> 
					  {/section}
					  </div>
					  </td>
				       </tr>
				      {/section}
				    </table>
	 			 </div>
			      </div>
			      <div id="appr-buttons-tabcol">
				 Tab Color
				 <input type="text"  value="{$data.allappdesignInfo[0].vTabColor}" name="vTabColor" id="vTabColor"  data-color-format="rgb" class="cp2">
			      </div>
			      <div id="appr-buttons-tabtext">
				 <div class="button_1">
				    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
				    <tr>
				    <td><label>
				    <input type="checkbox" value="1" class="onbtn_radi"  name="checkbox7" />Show the Menu Text</label>
				    <input type="text"  value="{$data.allappdesignInfo[0].vTabTexColor}" data-color-format="rgb" class="cp2" name="vTabTexColor" id="vTabTexColor"/>
				    </td>
				    </tr>
				    </table>
				 </div>
			      </div>
			   </div>
			   <div id="appr-header" class="appr-header levelborder">
			      <ul class="innertabbtn">
				 <li class="innertabbtncklik"><a class="btn" href="#appr-header-lh" id="launch_header">Launch Header</a></li>
				 <li class="inactivebtntab"><a class="btn" href="#appr-header-lt" id="launcher_tint" >Launcher Tint</a></li>
				 <li class="inactivebtntab"><a class="btn" href="#appr-header-gh" id="global_header">Global Header</a></li>
				 <li class="inactivebtntab"><a class="btn" href="#appr-header-gt" id="global_tint">Global Tint</a></li>
			      </ul>
			      <div id="appr-header-lh">
				 <div class="button_1">
				  <form name="header_imgupload" id="header_imgupload" method="post" action="{$data.base_url}app/upload_header_img" enctype="multipart/form-data">
					 <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl_right">
					   <tr>
						<td class="btnbrowse btnhelp"><label><span class="qmark">&nbsp;</span></label></td>
						<td class="btnbrowse"><input type="file" id="header_img" name="header_img" onchange="CheckValidFile(this.value,'header_img');" /></td>
						<td><input type="button" class="btn btn_upload_icon" name="upload_btn_icon"  value="Upload" onclick="return uploadHeaderImg();"/></td>
					   </tr>
					 </table>
				  </form>
				 </div>
				 <div class="button_1 height_fix_500" id="header_img_list">
				    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
				    <tr>
				    <td>
				    <div class="hover_active_color active_btn_mobile">
				    <label class="flt_lft_radio">
					    <input type="radio" value="0" onclick="change_lun_header(this.value);" class="onbtn_radi"  name="iLunchheaderId" id="iLunchheaderId" {if $data.allappdesignInfo[0].iLunchheaderId eq '0'} checked="ckecked" {/if}/>
				    </label>
				    <img src="{$data.base_logo}no_header_sign.png" alt="SLB" /> 
				    </div>
				    </td>
				    </tr>
				    
				    {section name=i loop=$data.get_all_buttons_lunch_header}				    
					 <tr>
					 <td>
					 <div class="hover_active_color active_btn_mobile">
						 <label class="flt_lft_radio">
							 <input type="radio" value="{$data.get_all_buttons_lunch_header[i].iLunchheaderId}" {if $data.allappdesignInfo[0].iLunchheaderId eq $data.get_all_buttons_lunch_header[i].iLunchheaderId} checked="ckecked" {/if} class="onbtn_radi"  name="iLunchheaderId" id="iLunchheaderId" onClick="change_lun_header({$data.get_all_buttons_lunch_header[i].iLunchheaderId});"/>
						 </label>
						 <img src="{$data.base_upload}lunch_header/{$data.get_all_buttons_lunch_header[i].iLunchheaderId}/{$data.get_all_buttons_lunch_header[i].vImage}"  /> 
					 </div>
					  </td>
					 </tr>					 
				    {/section}				    
				    </table>
				 </div>
			      </div>

			      <div id="appr-header-lt">
				 Launcher Tint
				 <input type="text"  value="{$data.allappdesignInfo[0].vLuncherTintColor}" name="vLuncherTintColor" id="vLuncherTintColor" data-color-format="rgb" class="cp2">
			      </div>
			      <div id="appr-header-gh">
				 <div class="button_1">
				    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl_right">
				    <tr>
				    <td class="btnbrowse btnhelp"><label><span class="qmark">&nbsp;</span></label></td>
				    <td class="btnbrowse"><input type="file" name="file_uploads_btn" />
				    </td>
				    <td><input type="button" class="btn btn_upload_icon" name="upload_btn_icon"  value="Upload"/>
				    </td>
				    </tr>
				    </table>
				 </div>
				 <div class="button_1 height_fix_500">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table images_buttons">
				    <tr>
				       <td>
				       <div class="hover_active_color active_btn_mobile">
				       <label class="flt_lft_radio">
					       <input type="radio" value="0" class="onbtn_radi" onclick="chnage_global_header(this.value);" name="iGlobalHeaderId" id="iGlobalHeaderId" {if $data.allappdesignInfo[0].iGlobalHeaderId eq '0'} checked="ckecked" {/if}/>
				       </label>
				       <img src="{$data.base_logo}no_header_sign.png" /> 
				       </div>
				       </td>
				    </tr>
				    {section name=i loop=$data.get_all_buttons_lunch_header}
				    <tr>
				       <td>
				       <div class="hover_active_color active_btn_mobile">
				       <label class="flt_lft_radio">
					       <input type="radio" value="{$data.get_all_buttons_lunch_header[i].iLunchheaderId}"  {if $data.allappdesignInfo[0].iGlobalHeaderId eq $data.get_all_buttons_lunch_header[i].iLunchheaderId} checked="ckecked" {/if} class="onbtn_radi"  name="iGlobalHeaderId" id="iGlobalHeaderId" onclick="chnage_global_header({$data.get_all_buttons_lunch_header[i].iLunchheaderId});"/>
				       </label>
				       <img src="{$data.base_upload}lunch_header/{$data.get_all_buttons_lunch_header[i].iLunchheaderId}/{$data.get_all_buttons_lunch_header[i].vImage}" alt="SLB" /> 
				       </div>
				       </td>
				    </tr>
				 
				 {/section}                                              
				 </table>
			      </div>
			   </div>
			   <div id="appr-header-gt">
			      Global Tint
			      <input type="text"  value="{$data.allappdesignInfo[0].vGlobalTintColor}" name="vGlobalTintColor" id="vGlobalTintColor" data-color-format="rgb" class="cp2">
			   </div>
			</div>
			<div id="appr-colors" class="appr-colors levelborder">
			   <ul class="innertabbtn">
			      <li class="innertabbtncklik"><a class="btn" href="#appr-colors-gac">Global App Colors</a></li>
			      <li class="inactivebtntab"><a class="btn" href="#appr-colors-subtbs">Global Fonts</a></li>
			   </ul>
			   <div id="appr-colors-gac">
			      <div class="button_1">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
				 <tr>
				 <td width="32%" class="spec_color_label">Start with a Color Theme :</td>
				 <td><select  name="select">
				   <option value="">Select a color scheme</option>
				   <option value="0">Aquatic Blue</option>
				   <option value="1">Beach Blue</option>
				   <option value="2">Bear Brown</option>
				   <option value="3">Carrot Orange</option>
				   <option value="4">Dark Rose</option>
				   <option value="5">Dazzling Red</option>
				   <option value="6">Forest Green</option>
				   <option value="7">Generic Grey</option>
				 </select>
				 </td>
				 </tr>
				 </table>
			      </div>
			      <div class="button_1">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl_select_color">
				 <tr>
					 <td width="32%" class="spec_color_label">Navigation Bar :</td>
					 <td class="withsepaline">
					 <span class="lbl_color">Bar:</span>
					 <input type="text"  value="{$data.allappdesignInfo[0].vNavigationBar}" id="navigation_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important;background:{$data.allappdesignInfo[0].vNavigationBar};color:{$data.allappdesignInfo[0].vNavigationBar};" />
					 <span>Text:</span>  <input type="text"  value="{$data.allappdesignInfo[0].vNavigationText}" id="navigation_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important;background:{$data.allappdesignInfo[0].vNavigationText};color:{$data.allappdesignInfo[0].vNavigationText};">
					 <span>Shadow:</span> <input type="text"  value="{$data.allappdesignInfo[0].vNavigationShadow}" id="navigation_textshadow" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important;background:{$data.allappdesignInfo[0].vNavigationShadow};color:{$data.allappdesignInfo[0].vNavigationShadow};" />
					 </td>
				 </tr>
				 <tr>
					<td width="32%" class="spec_color_label">Section Bar :</td>
					 <td class="withsepaline">
					 <span>Bar:</span> <input type="text"  value="{$data.allappdesignInfo[0].vSectionBar}" id="section_bars" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vSectionBar};color:{$data.allappdesignInfo[0].vSectionBar};" />
					 <span>Text:</span><input type="text"  value="{$data.allappdesignInfo[0].vSectionText}" id="section_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vSectionText};color:{$data.allappdesignInfo[0].vSectionText};" /> 
					</td>
				 </tr>
				 <tr>
				 <td width="32%" class="spec_color_label">Odd Row :</td>
				 <td class="withsepaline">
				 <span>Bar:</span><input type="text"  value="{$data.allappdesignInfo[0].vOddRowBar}" id="oddRow_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vOddRowBar};color:{$data.allappdesignInfo[0].vOddRowBar};" />
				 <span>Text:</span><input type="text"  value="{$data.allappdesignInfo[0].vOddRowText}" id="oddRow_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:rgb(0,0,0);color:{$data.allappdesignInfo[0].vOddRowText};color:{$data.allappdesignInfo[0].vOddRowText};" /></td>
				 </tr>
				 <tr>
				 <td width="32%" class="spec_color_label">Even Row :</td>
				 <td class="withsepaline">
				 <span>Bar:</span> <input type="text"  value="{$data.allappdesignInfo[0].vEvenRowBar}" id="evenrow_bar" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vEvenRowBar};color:{$data.allappdesignInfo[0].vEvenRowBar};" />
				 <span>Text:</span> <input type="text"  value="{$data.allappdesignInfo[0].vEvenRowText}" id="evenrow_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vEvenRowText};color:{$data.allappdesignInfo[0].vEvenRowText};" />
				 </td>
				 </tr>
				 <tr>
				 <td width="32%" class="spec_color_label">Feature Colors :</td>
				 <td class="withsepaline">
				 <span>Button Text:</span> <input type="text"  value="{$data.allappdesignInfo[0].vButtonTextColor}" id="featurecolors_buttontext" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vButtonTextColor};color:{$data.allappdesignInfo[0].vButtonTextColor};" />
				 <span>Button &amp; Image Colors:</span> <input type="text"  value="{$data.allappdesignInfo[0].vButtonImageColors}" id="featurecolors_buttonimage" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vButtonImageColors};color:{$data.allappdesignInfo[0].vButtonImageColors};" />
				 </td>
				 </tr>
				 <tr>
				 <td>&nbsp;</td>
				 <td class="withsepaline">
				 <span>Feature Text:</span> <input type="text"  value="{$data.allappdesignInfo[0].vFeatureText}" id="feature_text" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vFeatureText};color:{$data.allappdesignInfo[0].vFeatureText};" />
				 </td>
				 </tr>
				 <tr>
				 <td width="32%" class="spec_color_label">Others :</td>
				 <td class="">
				 <span>Background Color:</span><input type="text"  value="{$data.allappdesignInfo[0].vOtherBackgroundColor}" id="other_background" data-color-format="rgb" class="cp2 color_text_hide" style="width:25px !important; background:{$data.allappdesignInfo[0].vOtherBackgroundColor};color:{$data.allappdesignInfo[0].vOtherBackgroundColor};" />
				 </td>
				 </tr>
				 </table>
			      </div>
			   </div>
			   <div id="appr-colors-subtbs">
			      <div class="button_1">
				 <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table buttons_tbl">
				 <tr>
				 <td width="25%"><label>Global Font</label></td>
				 <td><select  name="mapping_coll">
					 <option value="3">AmericanTypewriter</option>
					 <option value="4">AmericanTypewriter-Bold</option>
					 <option value="5">AmericanTypewriter-Condensed</option>
					 <option value="6">AmericanTypewriter-CondensedBold</option>
					 <option value="7">AmericanTypewriter-CondensedLight</option>
					 <option value="8">AppleSDGothicNeo-Bold</option>
				 </select>
				 </td>
				 </tr>
				 </table>
			      </div>
			   </div>
			</div>
		     </div>
			
			<div class="rightpartappearance">
			<!--Start Phone-->	
			<div class="iphonr_part">
			   <div class="iphone_inner">
			      <!--start--> 
				 <div class="single_row_box">
				   <div class="single_box">
				     <div class="single_text_box" >
				       <div class="single_img" id="tabImagesDiv">
					 <div class="single_bg">
                     
					   <div class="header_image_top">
                       <div style="height: 13px; z-index: 100;" class="new_top_bar">
                        <img  style="float:left;" src="{$data.base_image}state_bar.png">
                        </div>
					    <div class="appr_preview_header_overlay"><img src='{$data.base_image}header_phone.png'/></div>
					  </div>
					   <div class="icon_time_box" id="layout-div">
					    {section name=i loop=$data.selected_feature_details}
					     {if $data.selected_feature_details[i].eActive eq 'Yes'}	
					     <div class="footer_icon_time">
					       <div class="icon_box">
						 <img src='{$data.base_upload}/tab_btn_background/1/TB1.png' width="100%"/>
						 <span class="time_img">
						    <img width="25" height="25" src="{$data.base_upload}tab_icon/{$data.selected_feature_details[i].iIconcolorId}/{$data.selected_feature_details[i].vImage}" />
						  </span>
						 <p class="text_home">{if $data.selected_feature_details[i].vTitle == ""}{$data.selected_feature_details[i].default_vTitle}{else}{$data.selected_feature_details[i].vTitle}{/if}</p>
					       </div>
					     </div>
						{/if}
					     {/section}	
					     <!--div class="footer_icon_time">
					       <div class="icon_box">
						 <img src='{$data.base_upload}/tab_btn_background/1/TB1.png' width="100%"/>
						 <span class="time_img"><img src='{$data.base_image}home.png' width="70%"/></span>
						 <p class="text_home">Home</p>
					       </div>
					     </div>
					     <div class="footer_icon_time">
					       <div class="icon_box"><img src='{$data.base_upload}/tab_btn_background/1/TB1.png' width="100%"/>
						 <span class="time_img"><img src='{$data.base_image}calendar.png' width="70%"/></span>
						 <p class="text_home">Events</p>
					       </div>
					     </div>
					     <div class="footer_icon_time">
					       <div class="icon_box"><img src='{$data.base_upload}/tab_btn_background/1/TB1.png' width="100%"/>
						 <span class="time_img"><img src='{$data.base_image}mail.png' width="70%"/></span>
						 <p class="text_home">Messages</p>
					       </div>
					     </div-->
					   </div>
					   <p class="text_single">Single Row 1</p>
					 </div>
				       </div>
				   
				   <!-- another image (color image) codign start -->
					 <div class="single_bg" id="colorImageDiv" style="display: none;">
						<div class="global_header_image_top">
						    <div style="height: 13px; z-index: 100;" class="new_top_bar">
							   <img  style="float:left;" src="{$data.base_image}state_bar.png">
						   </div>
						    
						    <div class="appr_preview_header">
                    		 <div class="img_main_title" id="global_header_image"><img src='{$data.base_image}header_phone.png'/>
                    			<div id="global_preview_header_overlay" style="height: 29px;"></div>
                    			<p id="colorImage_menu">Menu</p>
                    		 </div>							 
                    	    </div>
						    <div class="app_preview_main"> <!--content start-->
								<div id="section_bar_menu" style="background-color: rgb(156, 0, 0); color: rgb(255, 255, 255);font-size: 13px; font-weight: bold;opacity: 0.9; padding: 8px 10px">
								  Menu
								</div>  
								<div class="oddrow"  style="background: rgb(207, 158, 12); color: rgb(0, 0, 0);">
									<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
									<p>Stackers</p>
								</div>
							   
								<div class="evenrow" style="background: rgb(201, 4, 4); color: rgb(255, 255, 255);">
									<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
									<p>Alternative Burgers</p>
								</div>
								
								<div class="oddrow"  style="background: rgb(207, 158, 12); color: rgb(0, 0, 0);">
									<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
									<p>Burger Bar</p>
								</div>
								
								<div class="evenrow" style="background: rgb(201, 4, 4); color: rgb(255, 255, 255);">
									<img width="10" height="14" class="row_arrow_icon" alt="" src="{$data.base_image}cute_app_arrow.png">
									<p>Sauces</p>
								</div>
								
								<div class="oddrow"  style="background: rgb(207, 158, 12); color: rgb(0, 0, 0);">
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
						    </div> <!--content end-->						  
						</div>
					   
					   
					   </div>
				   
				   <!-- another image coding end-->				   
				   </div>
				 <!--end--> 
			      </div>
			   </div>
			</div>


			<!--End-->
		     </div>
			</div>
				
			   </div>
			
			</div>
			<!--************Tab 1 End**************-->	
			
			<!--************Tab 2 start**************-->	
			<div id="background_images">	 		
			 {include file="appreance_background_images.tpl" }			 
			 </div>
			<!--************Tab 2 End**************-->	
			
			<!--************Tab 3 start**************-->	
			<div id="maintabs-applayout">
			
			 {include file="appreance_maintabs_applayout.tpl" }
			 
			 </div>
			<!--************Tab 3 End**************-->	
			
			
			</div>
		  </div>
       		</div>
	       	<div style="clear:both;"></div>
	    	<div class="pagination">
	    		{$data.create_links}
	    		</div>  
 	</div></div>
   </div>
<!-- END EXAMPLE TABLE widget-->
<div style="clear:both;"></div>
   </div>
</div>

<!-- END EDITABLE TABLE widget-->
<!-- END PAGE CONTENT-->         
</div>
<!-- END PAGE CONTAINER-->




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
{literal}
<script>

var icon_box = '{/literal}{$data.allappdesignInfo[0].eBtnLayout}{literal}';
var iBtntabbackgroundId = '{/literal}{$data.allappdesignInfo[0].iBackgroundId}{literal}';
var iIconcolorId = '{/literal}{$data.allappdesignInfo[0].iIconcolorId}{literal}';
var iLunchheaderId = '{/literal}{$data.allappdesignInfo[0].iLunchheaderId}{literal}';
var iGlobalHeaderId = '{/literal}{$data.allappdesignInfo[0].iGlobalHeaderId}{literal}';

var vTabColor = '{/literal}{$data.allappdesignInfo[0].vTabColor}{literal}';
if(vTabColor !=''){
    $(".time_img").attr('style','background:'+vTabColor);    
}

var vTabTexColor = '{/literal}{$data.allappdesignInfo[0].vTabTexColor}{literal}';
if(vTabTexColor !=''){
    $(".header_image_top").attr('style','color:'+vTabTexColor);    
}

var vLuncherTintColor = '{/literal}{$data.allappdesignInfo[0].vLuncherTintColor}{literal}';
if(vLuncherTintColor !=''){
    if(iLunchheaderId !=0){
        $(".header_image_top").attr('style','background:'+vLuncherTintColor);    
    }
}

var vGlobalTintColor= '{/literal}{$data.allappdesignInfo[0].vGlobalTintColor}{literal}';
if(vGlobalTintColor !=''){
    if(iGlobalHeaderId !=0){
        $("#global_preview_header_overlay").css('background',vGlobalTintColor);    
    }
}


var vNavigationBar = '{/literal}{$data.allappdesignInfo[0].vNavigationBar}{literal}';
if($('#global_preview_header_overlay')){
    if(iGlobalHeaderId !=0){
        $("#global_preview_header_overlay").css('background',vNavigationBar);
    } 
}

var vNavigationText = '{/literal}{$data.allappdesignInfo[0].vNavigationText}{literal}';
if($('#colorImage_menu')){
    $("#colorImage_menu").css('color',vNavigationText);   
}

var vNavigationShadow = '{/literal}{$data.allappdesignInfo[0].vNavigationShadow}{literal}';
if($('#colorImage_menu')){
    $("#colorImage_menu").css('text-shadow','1px 1px 0px '+vNavigationShadow);
}


var vSectionBar = '{/literal}{$data.allappdesignInfo[0].vSectionBar}{literal}';
if($('#section_bar_menu')){
    $("#section_bar_menu").css('background-color',vSectionBar);
}

var vSectionText = '{/literal}{$data.allappdesignInfo[0].vSectionText}{literal}';
if($('#section_bar_menu')){
    $("#section_bar_menu").css('color',vSectionText);
}

var vOddRowBar = '{/literal}{$data.allappdesignInfo[0].vOddRowBar}{literal}';
if($('.oddrow')){
    $(".oddrow").css('background',vOddRowBar);
} 

var vOddRowText = '{/literal}{$data.allappdesignInfo[0].vOddRowText}{literal}';
if($('.oddrow')){
    $(".oddrow").css('color',vOddRowText); 
}


var vEvenRowBar = '{/literal}{$data.allappdesignInfo[0].vEvenRowBar}{literal}';
if($('.evenrow')){
    $(".evenrow").css('background',vEvenRowBar); 
}
   
var vEvenRowText = '{/literal}{$data.allappdesignInfo[0].vEvenRowText}{literal}';
if($('.evenrow')){
    $(".evenrow").css('color',vEvenRowText); 
}


change_lun_header(iLunchheaderId);
change_icon_color(iIconcolorId);
chng_back_icon(iBtntabbackgroundId);
chnage_global_header(iGlobalHeaderId);


if(icon_box == 'Top'){
    change_layout('icon_top_boxs');
}else if(icon_box == 'Bottom'){
   change_layout('icon_time_box'); 
}else if(icon_box == 'Right'){
    change_layout('icon_right_boxs');
}else if(icon_box == 'Left'){
    change_layout('icon_left_boxs');
}else{
    change_layout('icon_time_box');
}

function show_loading() {
  $('#loading').reveal({
    animationSpeed: 10,
    closeOnBackgroundClick: true
  });
}

function hide_loading() {
  $('#loading').delay(100).trigger('reveal:close');
}

function change_layout(val){
  $("#layout-div").attr('class',val);
}

function change_lun_header(id){
  if(id != 0){
      var url = base_upload+'lunch_header/'+id+'/h'+id+'.jpg';
      $(".appr_preview_header_overlay").children('img').attr('src', url);  
  }else{
    var url = base_image+'no_heade.png';
    $(".appr_preview_header_overlay").children('img').attr('src', url);
  }
}

function chnage_global_header(id){
    if(id !=0){
        var url = base_upload+'lunch_header/'+id+'/h'+id+'.jpg';
        $("#global_header_image").children('img').attr('src', url);    
    }else{
        var url = base_image+'no_heade.png';
        $("#global_header_image").children('img').attr('src', url);
        $("#global_header_image").css('height','29px');
    }
}

function change_icon_color(iconid){
  
  //console.log(iconid);
  $('span.time_img img').each(function() {
     myArray =  $(this).attr('src').split('/');
     var imgname = myArray.pop();
     var nsrc =  base_upload+'tab_icon/'+iconid+'/'+imgname;
     $(this).attr('src',nsrc);
  });
}

function chng_back_icon(id){
  if(id == 2){
     var url = base_upload+'tab_btn_background/empty.png';
  }else{
    var url = base_upload+'tab_btn_background/'+id+'/TB'+id+'.png';
  }
 //console.log(base_upload);
 	$('div.icon_box').each(function() {
        $(this).children('img').attr('src', url);
	});
}
	
</script>
{/literal}

