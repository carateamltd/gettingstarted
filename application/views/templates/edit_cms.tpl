<script type="text/javascript" src="{$data.base_js}administrator.js"></script>

  <div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-wrench"></i></a> <span class="separator"></span></li>
            <li>CMS</li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="icon-wrench"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	CMS
               </h1>
            </div>
        </div>
 		
        <div class="maincontent">
        	<div class="maincontentinner">
            	<div class="row-fluid">
                	<div class="span12">
             	<!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget purple">
                    
                    <h4 class="widgettitle"><i class="icon-reorder"></i>
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
                     </h4>
					<span class="tools">
                        <a href="javascript:;" class=""></a>
                        <a href="javascript:;" class=""></a>
                    </span>
              
                <div class="widget-body">
                   		<div class="btn-group">
                             <a href="#addNewModal" class="btn btn-primary" id="add_app" role="button" data-toggle="modal">
                             Add New
                             </a>
                         </div>
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
                {if $data.message neq ''}
                    <div class="alert alert-info">
                        {$data.message}
                    </div>
                {/if}
                    <div class="space15"></div>
                    <!--BEGIN TABS-->
                    <div class="tabbable custom-tab">
                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1_1">
                                <form class="form-horizontal" action="{$data.base_url}cms/{$data['mode']}" method="post">
                                    <!--<input type="hidden" name="Data[iAdminId]" value="{$data.admin['iAdminId']}"> -->
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
				                        <thead>
				                        <tr>
				                            <th>Label Name</th>
				                            <th>English</th>
				                            <th style="text-align:center;">French</th>                            
				                        </tr>
				                        </thead>
				                        <tbody>
                                        {section name=page_details loop=$data.page_details step=1}
                                        <tr>
	                                        <td>
	                                        	<label class="control-label">{$data.page_details[page_details].rLabelName}</label>
	                                        </td>
	                                        <td>
	                                        	<input type="text" placeholder="" class="input-large" id="vFirstName" name="{$data.page_details[page_details].rLangDetailId}[en]" value="{$data.page_details[page_details].rEnglish}"/>
	                                        </td>
	                                        <td>
	                                        	<input type="text" placeholder="" class="input-large" id="vFirstName" name="{$data.page_details[page_details].rLangDetailId}[fr]" value="{$data.page_details[page_details].rFrench}"/>
	                                        </td>
                                       	</tr>
                                        {/section}  
                                        </tbody>
                                        </table>                      
                                     
                                        <div class="form-actions">
                                             <button type="submit" class="btn btn-success" id="btn-save">
                                              Save</button>
                                       {if $data['user_info']['iRoleId'] eq '1'}
                                             <button type="button" class="btn" onclick="returnme()">Cancel</button>
                                       {/if}
                                        </div>
                                </form>
                            </div>
                            {if $data['user_info']['iRoleId'] eq '2'}
                            <div class="tab-pane" id="tab_1_2">
                                <a href="#" id="AddMoreFileBox" class="btn btn-info">Add More Field <i class="icon-plus"></i></a>
                                <div class="space15"></div>
                                 <form class="form-horizontal" action="{$data.base_url}administrator/save_fee_onfo" method="post" id="fee_info_admin">
                                    <input type="hidden" name="iClientId" value="{$data.admin['iAdminId']}"> 
                                    <div class="control-group" id="InputsWrapper">
                                        {section name = i loop = $data.fee_info}
                                            {$indx = $smarty.section.i.index + 1}
                                            <div style=" margin: 0 0 5px;">
                                                <input type="text" name="data[{$indx}][vFeetype]" id="name_{$indx}" value="{$data.fee_info[i]['vFeetype']}" placeholder="Name">
                                                <input type="text" name="data[{$indx}][fPrice]" id="price_{$indx}" value="{$data.fee_info[i]['fPrice']}" placeholder="Price">
                                                <a href="#" class="removeclass"><i class="icon-remove"></i></a>
                                            </div>
                                        {/section}
                                        <div style=" margin: 0 0 5px;">
                                            {if sizeof($data.fee_info) == 0}
                                            <input type="text" name="data[0][vFeetype]" id="name_0" value="" placeholder="Name">
                                            <input type="text" name="data[0][fPrice]" id="price_0" value="" placeholder="Price">
                                            {/if}

                                            <!--a href="#" class="removeclass"><i class="icon-remove"></i></a-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" id="btn-save-fee">Save</button>
                                        {if $data['user_info']['iRoleId'] eq '1'}
                                            <button type="button" class="btn" onclick="returnme()">Cancel</button>
                                        {/if}
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_1_3">
                                 <form class="form-horizontal" action="{$data.base_url}administrator/save_paypal_onfo" method="post" id="paypal_info_admin">
                                    <input type="hidden" name="iPaypalinfoId" value="{$data.paypal_info['iPaypalinfoId']}">
                                    <input type="hidden" name="Data[iClientId]" value="{$data.admin['iAdminId']}">  
                                    <div class="control-group">
                                        <label class="control-label">Username</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Paypal Username" class="input-large" id="vPusername" name="Data[vUsername]" value="{$data.paypal_info['vUsername']}"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Paypal Password</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Paypal Password" class="input-large" id="vPpassword" name="Data[vPassword]" value="{$data.paypal_info['vPassword']}"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Paypal Signature</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Paypal Signature" class="input-large" id="vPsignature" name="Data[vSignature]" value="{$data.paypal_info['vSignature']}"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                         <button type="button" class="btn btn-success" id="btn-paypal_save" >
                                          Save</button>
                                        {if $data['user_info']['iRoleId'] eq '1'}
                                            <button type="button" class="btn" onclick="returnme()">Cancel</button>
                                        {/if}
                                    </div>

<!--                                     <div class="control-group">
                                        <label class="control-label">Payment Method</label>
                                            <div class="controls" >
                                                <select class="input-large m-wrap" tabindex="1" name="Data[eMethod]">
                                                    <option value="visa">Visa</option>
                                                    <option value="master">Master Card</option>
                                                    <option value="paypal">Paypal</option>
                                                </select>
                                            </div>
                                    </div> 
                                    <div class="control-group">
                                        <label class="control-label">Name of card</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Name of card" class="input-large" id="vCity" name="Data[vCardname]" value=""/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Card Number</label>
                                        <div class="controls">
                                            <input type="text" placeholder="" class="input-large" id="vCity" name="Data[vCardnumber]" value=""/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Expiry</label>
                                        <div class="controls" >
                                            <select class="input-large m-wrap" tabindex="1" name="Data[vMonth]">
                                                <option value="">Month</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                            </select>
                                            /
                                            <select class="input-large m-wrap" tabindex="1" name="Data[vYear]">
                                                <option value="">Year</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="control-group">
                                        <label class="control-label">Security Code</label>
                                        <div class="controls">
                                            <input type="text" placeholder="" class="input-large" id="vCode" name="Data[vCode]" value="" maxlength="4"/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                         <button type="button" class="btn btn-success" id="btn-save">
                                          Save</button>
                                        {if $data['user_info']['iRoleId'] eq '1'}
                                            <button type="button" class="btn" onclick="returnme()">Cancel</button>
                                        {/if}
                                    </div>
 -->                                 </form>
                            </div>
                            {/if}
                        </div>
                    </div>
                    <!--END TABS-->

                 </div>
            </div>
         <!-- END EXAMPLE TABLE widget-->
        </div>
       			</div>
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
        <div id="addNewModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 400px !important;" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="myModalLabel">Add New Tag</h3>
  </div>
  <br>
<div id="err"></div>
<form name="save_app_feature" id="save_app_feature" action="{$data.base_url}cms/add_new_label" method="POST">
  <div class="modal-body">
   <div class="toptab">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><strong>Label Name</strong></td>
				<td><input type="text" name="label_name" id="label_name" /></td>
			</tr>
			<tr>
				<td><strong>English</strong></td>
				<td><input type="text" name="label_english" id="label_english" /></td>
			</tr>
			<tr>
				<td><strong>French</strong></td>
				<td><input type="text" name="label_french" id="label_french" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="cms_page_name" value="{$data.cms_page_name}" /></td>
			</tr>
		</table>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary" name="submitnew"/>
  </div>
</form>
</div>
  </div>
<!--<div id="main-content">-->
    <!-- BEGIN PAGE CONTAINER-->
<!--    <div class="container-fluid">-->
        <!-- BEGIN PAGE HEADER-->   
       <!-- <div class="row-fluid">
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
              <!--  <h3 class="page-title">
			 		CMS
                </h3>-->
            <!-- END PAGE TITLE & BREADCRUMB-->
           <!-- </div>-->
         <!-- END PAGE HEADER-->   
        <!--</div>-->
        <!-- BEGIN PAGE CONTENT-->
       <!-- <div class="row-fluid">-->
              
    <!-- END PAGE CONTENT-->         
    <!--</div>-->
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
    $(document).ready(function() {

        var MaxInputs       = 8; //maximum input boxes allowed
        var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
        var AddButton       = $("#AddMoreFileBox"); //Add button ID

        var x = InputsWrapper.length; //initlal text box count
        var FieldCount='{/literal}{sizeof($data.fee_info)}{literal}'; //to keep track of text box added

        $(AddButton).click(function (e)  //on add input button click
        {
                if(x <= MaxInputs) //max input box allowed
                {
                    FieldCount++; //text box added increment
                    //add input box
                    $(InputsWrapper).append('<div style=" margin: 0 0 5px;"><input type="text" name="data['+FieldCount+'][vFeetype]" id="name_'+ FieldCount +'" value="" placeholder="Name"/> <input type="text" name="data['+FieldCount+'][fPrice]" id="price_'+ FieldCount +'" value="" placeholder="Price"/> <a href="#" class="removeclass"><i class="icon-remove"></i></a>');
                    x++; //text box increment
                }
        return false;
        });

        $("body").on("click",".removeclass", function(e){ //user click on remove text
            //console.log('in'+x);
              //  if( x > 1 ) {
                        $(this).parent('div').remove(); //remove text box
                       // x--; //decrement textbox
               // }
        return false;
        }) 

    });    
</script>
{/literal}
    
