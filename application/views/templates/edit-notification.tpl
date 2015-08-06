<script type="text/javascript" src="{$data.base_js}notification.js"></script>
<script src="{$data.base_js}jquery.form.js"></script>


<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li>Push Notification </li>
    </ul>
    <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	Push Notification
               </h1>
            </div>
    </div>
    
    <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
            <div class="span12">
             	<!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget purple">
                    
                    <h4 class="widgettitle">
                    <i class="icon-reorder"></i>
                        {if $operation eq 'add'}				       						  
						     Notification						  
				    {else}				    
						 Notification
				    
				    {/if}
                     </h4>
					<span class="tools">
                        <a href="javascript:;" class=""></a>
                        <a href="javascript:;" class=""></a>
                    </span>
                
                <div class="widget-body">
                   
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
				    
				
				<!--<div class="alert alert-info">				
				</div>-->
				
				    
                    <div class="space15"></div>
				
				<!--action="{$data.base_url}notification/{$data['mode']}"-->
				<!--action="http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/notfiyfromXMl.php"-->
                    <form class="form-horizontal" id="form_notification"   method="post" action="http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/notfiyfromXMl.php">
                        <input type="hidden" name="iAdminId" value="{$data['user_info']['iAdminId']}">
				        <input type="hidden" name="XmlUrl" value="{$data['client_url']}">
					   
					    <div class="control-group">
                                    <label class="control-label">Read Xml</label>
                                    <div class="controls">
								<strong style="margin-top:4px;float:left;">{$data['client_url']}</strong>                                        
                                    </div>
                            </div>			   
					     
                            <div class="control-group">
                                    <label class="control-label">Message</label>
                                    <div class="controls">								
                                        <textarea class="input-xxlarge" id="vMessage" readonly="readonly" rows="3" name="message" >{$data['notification']->vMessage}</textarea>
                                    </div>
                            </div>
                            <div class="control-group">
                                    <label class="control-label">Type</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" disabled="disabled" value="Individual" id="Individual" {if $data['notification']->eType eq 'Individual'} checked {/if}>
                                            Individual
                                        </label>
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" disabled="disabled"  value="Group" id="Group" {if $data['notification']->eType eq 'Group'} checked {/if}>
                                            Group
                                        </label>
                                        <label class="radio">
                                            <input type="radio" style="margin-top:4px !important;" name="Data[eType]" disabled="disabled"  value="All" id="All" {if $data['notification']->eType eq 'All'} checked {/if}>
                                            All
                                        </label>
                                    </div>
					   </div>
					   {if $data['notification']->eType eq 'Group'}
					   <div class="control-group" style="display: block;" id="group_names" >
                                    <label class="control-label">Group Name</label>
                                    <div class="controls">
                                        <select name="group_name" id="group" disabled="disabled" >
								    <option value="{$data['all_group'][i]}">--Select Group Name--</option>
								    {section name=i loop=$data['all_group']}
								    <option value="{$data['all_group'][i]}"{if $data['all_group'][i] eq $data['notification']->vGroupName} selected {/if}>{$data['all_group'][i]}</option>
								    {/section}
								    
								</select>
                                    </div>
                            </div>
					   {/if}
					   
					   
					   
					     <div class="form-actions">
                                    
                                     <button type="button" class="btn btn-primary"  onclick="return returnme();">Cancel</button>
                            </div>
					   
                            
                    </form>
                 </div>
            </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>  
        <div class="clearfix"></div>
        <br /><br /><br /><br /><br /><br /> <br /> <br /><br /> <br /> <br /> <br />
                <div class="footer">
                	  <div class="footer-left">
                        <span>Copyright &copy; 2014 Easy Apps All rights reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>
                    </div>
                </div>
    <!-- END PAGE CONTENT-->         
    </div>
            </div>
    </div>
            
<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
<!--    <div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
      <!--  <div class="row-fluid">
            <div class="span12">-->
               <!-- BEGIN THEME CUSTOMIZER-->
                <!--<div id="theme-change" class="hidden-phone">
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
          <!--      <h3 class="page-title">
			 
			  Push Notification
			 
                </h3>-->
                <!--ul class="breadcrumb">
                    <li>
                        <a href="{$data.base_url}home">Dashbosssard</a>
                        <span class="divider">/</span>
                    </li>
				{if $data['user_info']['iRoleId'] eq '1'}
                    <li><a href="{$data.base_url}administrator">
						{if $data['user_info']['iRoleId'] eq '1'}
						   View  Administrator
						  {else}
							View Client
						  {/if}
				    </a>
				    <span class="divider">/</span>
				</li>
				{/if}
                    <li class="current">
				    {if $operation eq 'add'}				       
						  {if $data['user_info']['iRoleId'] eq '1'}
						   Add  Administrator
						  {else}
							Add Client
						  {/if}			  
				    {else}				    
						  {if $data['user_info']['iRoleId'] eq '1'}
						   Edit  Administrator
						  {else}
							Edit Client
						  {/if} 
				    
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
      <!--      </div>-->
         <!-- END PAGE HEADER-->   
      <!--  </div>-->
        <!-- BEGIN PAGE CONTENT-->
        
<!-- END PAGE CONTAINER-->
<!--</div>-->
    
{literal}
<script>
    $(window).load(function() {  
       var user_mode ='{/literal}{$data['mode']}{literal}';
	  var user_role='{/literal}{$data['admin']['iRoleId']}{literal}';	  
	   if (user_role=='2' && user_mode=='update') {
            $("#xmlUrlData").show();
        }else{
		  $("#xmlUrlData").hide();
	   }
	  
    });
    
</script>
{/literal}
    
