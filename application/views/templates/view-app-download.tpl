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
			{if $data.paymentmessage neq ''}
  			<div class="alert alert-info">
  				{$data.paymentmessage}
  			</div>
			{/if}
		<!--	<pre>
			{$data.base_url}assets/images/app_icon/{$data['final_details']['iApplicationId']}/{$data['final_details']['vImage']}
			</pre> -->
				<div class="top_bord">
					<!--<img src="{$data.base_url}assets/images/app_icon.png" width="16" height="16"/>--><h1>Application Download</h1>
				</div>
                <div class="midd_box_inner">
                	<div class="widgetcontent nopadding">
                    	<div class="span6" style="position:relative; height:196px; overflow:hidden;">
	                    	<ul class="commentlist">
                           <li>
                           {if $data['final_details']['vImage'] != ''}
										<img src="{$data.base_url}uploads/app_icon/{$data['final_details']['iApplicationId']}/{$data['final_details']['vImage']}" class="pull-left" alt="" />
									{else}									
										<img src="{$data.base_url}uploads/app_icon/noimg.png" class="pull-left" alt="" />
									{/if}
                                    <div class="comment-info">
                                        <h4><a href="#">{$data['final_details']['tAppName']}</a></h4>
                                        <p>{$data['final_details']['tDescription']}</p>
                                    </div>
                            </li>
                            </ul>
                           <!--<div class="packages">
                                <a href="{$data.base_url}app/apkdownload/{$data.iApplicationId}" class="pkg ios error">.ipa</a>
                                <a href="{$data.base_url}app/apkdownload/{$data.iApplicationId}" class="pkg android complete">.apk</a>
                            </div>-->
                        </div>
                        
                        <div class="span4 border_grey nospac">
                        	<div class="span4 fivepx_spacing">	
                            	<h4><b>App ID</b></h4>
                                {$data['final_details']['iApplicationId']} 
                            </div>
                            <div class="span4 fivepx_spacing">	
                            <h4><b>Version</b></h4>
                                1.0.0
                            </div>
                            <div class="span4 fivepx_spacing">	
                            <h4><b>PhoneGap</b></h4>
                                3.5.0
                            </div>
                            <div class="clearfix"></div>
                            <div class="span12 top_spacing">
                            <h5><b>Owned by</b></h5>
                            {$data['final_details']['projectEmail']} 
                            </div>
                            <div class="span12 top_spacing">
                            <h5><b>Source</b></h5>
                            .zip package  
                            </div>
                            <div class="span12 top_spacing">
                            <h5><b>Last built</b></h5>
                            0 days. 
                            </div>
                        </div>
                        <div class="span2 nospac">
                        <!--<div class="packages">
                        	<a href="{$data.base_url}app/apkdownload/{$data.iApplicationId}" class="pkg ios error">.ipa</a>
                        	<a href="{$data.base_url}app/apkdownload/{$data.iApplicationId}" class="pkg android complete">.apk</a>
                        </div>-->
                        	<div class="iconimage">
                        	<a href="{$data.base_url}app/apkdownload/{$data.iApplicationId}">
	                            <img src="../../assets/images/google_play.png" alt="" />
	                           </a>
                              <a href="{$data.base_url}app/apkdownload/{$data.iApplicationId}">
	                            <img src="../../assets/images/iphone_app.png" alt="" />
                              </a>
                        	</div> 
                        </div>
                    </div>
                </div>
                
			</div>
			
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
                        <span>Copyright &copy; 2014 Easy Apps All rights reserved.</span>
                    </div>
                    <div class="footer-right">
                        <!--<span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span> -->
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
