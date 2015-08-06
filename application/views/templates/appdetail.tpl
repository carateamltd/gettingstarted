<script src="{$data.base_js}creditcard.js"></script>

<div class="rightpanel">
   		<ul class="breadcrumbs">	
        	<li><a href="#"><i class="icon-book"></i></a> <span class="separator"></span></li>
            <li> Application Payment Details </li>
        </ul>
        <div class="pageheader">
        	<div class="pageicon"><span class="icon-book"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>
                	Application Payment Details
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
          <i class="icon-reorder"></i> Application Payment Details 
        <!--  <span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> <a href="javascript:;" class="icon-remove"></a> </span> --></h4>
        <div class="widget-body">
          <div class="clearfix">
            <!--div class="btn-group" style="display:none;">
              <button id="editable-sample_new" class="btn green"> Add New <i class="icon-plus"></i> </button>
            </div-->
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
          <form class="form-horizontal" action="" method="post">
             <h2 class="inner_hd">Application Information</h2><hr>
            <div class="control-group">
                <label class="control-label">Application Name</label>
                <div class="controls">
                    <label class="control-label">{$data.app_info.tAppName}</label>
                 </div>
            </div>
            {if $data.app_info.tDescription}
            <div class="control-group">
                <label class="control-label">Application Description</label>
                <div class="controls">
                    <label class="control-label">{$data.app_info.tDescription}
                 </div>
            </div>
            {/if}
            <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                    <label class="control-label">{$data.client_info.vEmail}</label>
                 </div>
            </div>
            <div class="control-group">
                <label class="control-label">Basic Price</label>
                <div class="controls">
                   <label class="control-label">GBP {$data.app_price}</label>
                 </div>
            </div>
            {if $data.app_info.fPrice > 0 }
            <div class="control-group">
                <label class="control-label">Extra Price</label>
                <div class="controls">
                    <label class="control-label">{$data.app_info.fPrice}</label>
                 </div>
            </div>
            {/if}
            {if $data.app_info.vImage}
            <div class="control-group">
                <label class="control-label">App Icon</label>
                <div class="controls">
                    <img src="{$data.base_upload}app_icon/{$data.app_info.iApplicationId}/{$data.app_info.vImage}" width="75" height="75" />                            
                </div>
            </div>
            {/if}
            
            <div class="control-group">
                <label class="control-label">App Status</label>
                <div class="controls" id="app_status">
                   <label class="control-label">
                  {if $data.app_payment_info.eStatus}{$data.app_payment_info.eStatus}{else}Pending{/if}
                  </label>
                </div>
            </div>
            
          </form>
          {if $data.app_payment_info.eStatus neq 'Completed'}
          
          <form class="form-horizontal" id="app_payment" name="app_payment" action="{$data.base_url}appdetail/app_payment" method="post" >
          <div id="paypalmethod" name="paypalmethod" style="">
          <div class="space15"></div>
           <input type="hidden" name="pData[iClientId]" value="{$data.user_info.iAdminId}"> 
            <input type="hidden" name="pData[fPrice]" value="{$data.app_price}">
            <input type="hidden" name="pData[iApplicationId]" value="{$data.app_info.iApplicationId}">   
                <h2 class="inner_hd">Payment Information</h2><hr>
                <div id="payment_info_err"></div>
                {if $data.message neq ''}
                    <div class="alert alert-info">{$data.message}</div>
                {/if}                
                <div class="control-group">
                    <label class="control-label"><b>Total Gross Price</b></label>
                    <div class="controls">
                        <h3><b>GBP  {$data.app_price}</b></h3>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Card Type</label>
                    <div class="controls">
                        <select name="pData[vCreditCardType]" id="vCreditCardType">
                            <option value="">Select Payment Type</option>
                            <option value="Amex">Amercican Express</option>
                            <option value="Visa">Visa Card</option>
                            <option value="MasterCard">Master Card</option>
                            <option value="credit card">Credit Card</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Card Holder Name</label>
                    <div class="controls">
                        <input type="text" placeholder="" class="input-large" id="vCardholdername" name="pData[vCardholdername]" value=""/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Card Number</label>
                    <div class="controls">
                        <input type="text" placeholder="" class="input-large" id="vCardnumber" name="pData[vCardnumber]" value="" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Expire Date</label>
                    <div class="controls">
                        <select name="pData[vMonth]" id="vMonth">
                            <option value="">Select Month</option>
                             {$data.mondrd};
                        </select> /
                        <select name="pData[vYear]" id="vYear">
                            <option value="">Select Year</option>
                             {$data.yeardrd};
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cvv</label>
                    <div class="controls">
                        <input type="text" placeholder="" class="input-large" id="vCvv" name="pData[vCvv]" value="" onkeypress="return isNumberKey(event,this);" maxlength="3"/>
                    <a href="#" class="tooltip_text"><img align="absmiddle" src="{$data.base_image}quaton_icon.png"> <span> <img src="{$data.base_image}cvv.jpg" class=""> </span></a>
                    </div>
                </div>

              <div class="form-actions">
                <button type="button" class="btn btn-success" id="btn-payment" onclick="publish_payment()" >Pay Now</button>
                <button type="button" class="btn" onclick="window.location.href = '{$data.base_url}home';">Cancel</button>
              </div>
            </div>
          </form>
          {/if}
        </div>
      </div>
      <!-- END EXAMPLE TABLE widget--> 
    </div>
    <!-- END PAGE CONTENT--> 
  </div>
            </div>
        </div>
</div>


