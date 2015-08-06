<script src="{$data.base_js}jquery.form.js"></script>
{include file="set_default_background_image_popup.tpl"}

<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li>Application</li>
    </ul>
    <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	Application
               </h1>
            </div>
    </div>
      <div class="maincontent">
        	<div class="maincontentinner">
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
                 <div>
                    
<div class="mainpartcont">
	{include file="tab.tpl"}
	<div class="tbdata">
		<div class="progress progress-striped active" >
			<div class="bar" style="width:100%;"></div>
		</div>
		<div style="margin-left: 23px; width: 96%;display: none;" id="msg"><div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button></div></div>
		<div class="div_inner">
			{*if $data.paymentinfo.eStatus neq 'Completed'*}
			<!-- <a href="{$data.base_url}publish_app/{$data.iApplicationId}"> -->
				<!-- <button style="margin:0 2% 20px 0; float:right;width:150px; padding:10px 0;"  class="btn btn-primary" type="button" >Publish Your App</button> -->
			<!-- </a> -->
			{*/if*}
			{if $data.paymentmessage neq ''}
			<div class="alert alert-info">
				{$data.paymentmessage}
			</div>
			{/if}
			
				{if $data.message neq ''}
				<div class="alert alert-info">
					{$data.message}
				</div>
				{/if}
        		
				<div class="top_bord">
					<!--<img src="{$data.base_url}assets/images/app_icon.png" width="16" height="16"/>--><h1>Application Download</h1>
				</div>
				{if $data.message neq ''}
				<div class="alert alert-info">
					{$data.message}
				</div>
				{/if}
				
					<div id="msg"></div>
					<div class="midd_box_inner">
					<form name="app_data" id="upate_appdata" method="post"  enctype="multipart/form-data" action="{$data.base_url}app/apkdownload">
						<input type="hidden" name="iApplicationId" id="iApplicationId" value="{$data['final_details']['iApplicationId']}" />						
						<table width="100%" class="table table-striped table-bordered dataTable">
							<thead>
							<tr>
						   <th colspan="2">
									Label 
							</th>
						   <th colspan="2">
						   		Details
						   </th>
						   </tr>
						   </thead>
						   
						   <tr>
						   	<td colspan="2">AppName</td>
						   	<td colspan="2">{$data['final_details']['tAppName']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">AppIconName</td>
							   <td colspan="2">{$data['final_details']['tAppIconName']}</td>
						   </tr>
		
						   <tr>
							   <td colspan="2">ContactEmail</td>
							   <td colspan="2">{$data['final_details']['vContactEmail']}</td>
						   </tr>
						   
						    <tr>
							   <td colspan="2">ContactEmail</td>
							   <td colspan="2">{$data['final_details']['vContactEmail']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">Description</td>
							   <td colspan="2">{$data['final_details']['tDescription']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">Website</td>
							   <td colspan="2">{$data['final_details']['vWebsite']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">project Name</td>
							   <td colspan="2">{$data['final_details']['projectName']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">project Domain Name</td>
							   <td colspan="2">{$data['final_details']['projectDomainName']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">project Domain</td>
							   <td colspan="2">{$data['final_details']['projectDomain']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">project Email</td>
							   <td colspan="2">{$data['final_details']['projectEmail']}</td>
						   </tr>
						   
						   <tr>
							   <td colspan="2">project Status</td>
							   <td colspan="2">{$data['final_details']['projectStatus']}</td>
						   </tr>
					
						   <tr>
						   	<td colspan="2">Download</td>
						   	<td><button type="submit" class="btn btn-primary btn-rounded"> Android Apk</button></td>
						   	<td><button type="button" class="btn btn-primary btn-rounded">  IOS </button></td>
						   </tr>
						</table>						
						</form>
												
					</div>
				
         
				    </div>
				    <div style="clear:both;"></div>
                        <div class="pagination">
                    {$data.create_links}
                </div>  
                 </div>
             </div>
		   <div style="clear:both;"></div>
           
         </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
    </div>

            <!-- END EDITABLE TABLE widget-->
    <!-- END PAGE CONTENT-->   
    <div class="footer">
                	  <div class="footer-left">
                        <span>&copy; Carateam Ltd 2014</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>
                    </div>
                </div>      
 </div>
 
 </div>
 </div>
</div>    
    
    

<!--<div id="main-content">-->
 <!-- BEGIN PAGE CONTAINER-->
<!-- <div class="container-fluid">-->
    <!-- BEGIN PAGE HEADER-->
    
   <!-- <div class="row-fluid">
       <div class="span12">-->
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
      <!--     <h3 class="page-title">
             Application
           </h3>-->
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
    <!--   </div>
    </div>-->
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    
    
 <!-- END PAGE CONTAINER-->
<!--</div>-->

<!--{literal}
<script type="text/javascript">
function check_validdata()
{
  if($("#vContactEmail").val()=='')
  {
    alert("Please enter Contact Email Address");
    return false;
  }
  if($("#vContactEmail").val() !=''){
  var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;            
          if(!expr.test($("#vContactEmail").val())){
               alert("Please enter Valid Contact Email Address");
                return false;
          }        
        }  
  
  if($("#vWebsite").val()=='')
  {
    alert("Please enter Website URL");
    return false;
  }        
  if($("#vWebsite").val() !=''){
  var expr =  /^(ftp|http|https):\/\/[^ "]+$/;
      if(!expr.test($("#vWebsite").val())){
               alert("Please enter Valid Website URL");
                return false;
      }        
  } 
  if($("#fPrice").val()=='')
  {
    alert("Please enter App Price");
    return false;
  }     
   
}
</script>
{/literal}-->
