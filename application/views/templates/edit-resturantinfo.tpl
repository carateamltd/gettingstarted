<div class="rightpanel">
	<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li>Edit Basic Info </li>
    </ul>
    <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	 {foreach from=$lang item=val}
                         {if $val.rLabelName == 'Edit Basic Info'}
                            {$val.rField}
                         {/if}
                    {/foreach}
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
                           <!-- Change by Mayur Gajjar Date: 30/7/'14 (multilanguage) -->
                           {foreach from=$lang item=val}
                             {if $val.rLabelName == 'Edit Basic Info'}
                                {$val.rField}
                             {/if}
                           {/foreach}
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
                   
                    <div id="conf_validation" style="display:none;"></div>
                    
                        {section name=i loop=$basicinfo}
                           
                                <form class="form-horizontal" action="{$data.base_url}resturantinfo/update" method="post">
                            <input type="hidden" name="iResturantInfoID" value="{$basicinfo[i]->iResturantInfoID}">  
                            <input type="hidden" name="iAdminId" value="{$data['user_info']['iAdminId']}">  
                              
                                <div class="control-group">
                                    <label class="control-label" style="cursor:default;">Restaurant Name</label>
                                     <input type="text" placeholder="" class="input-large" id="vName" name="Data[vResturantName]" value="{$basicinfo[i]->vResturantName}" title=""/>
                                    
                                </div>
                                  <div class="control-group">
                                    <label class="control-label" style="cursor:default;">Resturant Address</label>
                                     <textarea placeholder="" class="input-large" id="vName" name="Data[tResturantAddress]" value="" title=""/>{$basicinfo[i]->tResturantAddress}</textarea>
                                    
                                </div>
                                  <div class="control-group">
                                    <label class="control-label" style="cursor:default;">City</label>
                                     <input type="text" placeholder="" class="input-large" id="vName" name="Data[vCity]" value="{$basicinfo[i]->vCity}" title=""/>
                                    
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" style="cursor:default;">Pin / Zip Code</label>
                                     <input type="text" placeholder="" class="input-large" id="vName" name="Data[vZipCode]" value="{$basicinfo[i]->vZipCode}" title=""/>
                                    
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" style="cursor:default;">Email</label>
                                     <input type="text" placeholder="" class="input-large" id="vName" name="Data[vEmail]" value="{$basicinfo[i]->vEmail}" title=""/>
                                    
                                </div>
                                 <div class="control-group">
                                    <label class="control-label" style="cursor:default;">Contact Number</label>
                                     <input type="text" placeholder="" class="input-large" id="vName" name="Data[vContactNo]" value="{$basicinfo[i]->vContactNo}" title=""/>
                                    
                                </div>
                               
                                <div class="form-actions">
                                     <button type="submit" class="btn btn-success" id="btn-save">Submit</button>
                                </div>
                           
                        {/section} 
                        </form>
                        
                     </div>
                </div>
             <!-- END EXAMPLE TABLE widget-->
            </div>
                </div>
                
				<br /><br /><br /><br /><br /><br /> <br /> 
                <div class="footer">
                	  <div class="footer-left">
                        <span>Copyright &copy; 2014 Easy Apps All rights reserved.</span>
                    </div>
                    <div class="footer-right">
                        <span>Designed &amp; Developed by: <a href="http://www.intelithub.com/" target="_blank">Intel It Hub</a></span>
                    </div>
                </div>
            </div>
      </div>


<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
    <!--<div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
        <!--<div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">-->
                	<!-- Change by Mayur Gajjar Date: 30/7/'14 (multilanguage) -->
			       
                <!--</h3>
            </div>-->
         <!-- END PAGE HEADER-->   
       <!-- </div>-->
        <!-- BEGIN PAGE CONTENT-->
       <!-- <div class="row-fluid">-->
              
    <!-- END PAGE CONTENT-->         
    <!--</div>-->
<!--</div>-->
<!-- END PAGE CONTAINER-->
<!--</div>  -->