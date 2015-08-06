<script type="text/javascript" src="{$data.base_js}publishapp.js"></script>
<div id="main-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<!-- BEGIN PAGE HEADER-->
		<div class="row-fluid">
			<div class="span12">
				<h3 class="page-title"> Publish Application</h3>
			</div>
			<!-- END PAGE HEADER-->
		</div>
		<!-- BEGIN PAGE CONTENT-->
		<div class="row-fluid">
			<div class="span12">
				<!-- BEGIN EXAMPLE TABLE widget-->
				<div class="widget purple">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Publish Application</h4>
						<span class="tools"> <a href="javascript:;" class=""></a> <a href="javascript:;" class=""></a> </span> </div>
						<div class="widget-body">
							<div class="clearfix">
								<div class="btn-group" style="display:none;">
									<button id="editable-sample_new" class="btn green"> Add New <i class="icon-plus"></i> </button>
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
							<div class="space15"></div>
							<form class="form-horizontal" action="{$data.base_url}publish_app/addpayment" method="post" id="publishapp" name="publishapp">
								<input type="hidden" name="Data[iApplicationId]" id="iApplicationId" value="{$data.appinfo.iApplicationId}">
								<input type="hidden" name="Data[iClientId]" id="iClientId" value="{$data.appinfo.iClientId}">
								<input type="hidden" name="Data[fPrice]" id="fPrice" value="{$data.price}">
								<input type="hidden" name="Data[iPaymentId]" id="iPaymentId" value="">
								<div class="control-group">
									<label class="control-label">Payment Type </label>
									<div class="controls" >
										<select class="input-large m-wrap" tabindex="1" name="Data[ePaymentType]" id="ePaymentType">
											<option value="0">--Select Payment Type--</option>
											<option value="Cash">Cash</option>
											<option value="Cheque">Cheque</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Total Ammount To Pay</label>
									<div class="controls" > <strong style="font-size:25px; line-height:30px;">GBP {$data.price}</strong> </div>
								</div>
								<div id="cashmethod" name="cashmethod">
									<div class="space15"></div>
									<h2 class="inner_hd">Payment Datails </h2>
									<hr>
									<input type="hidden" name="iAdminId" value="{$data.admin['iAdminId']}">
									<div class="control-group">
										<label class="control-label">Bank Name</label>
										<div class="controls">
											<input type="text" placeholder="" class="input-large" id="vBankName" name="cash[vBankName]" value="{$data.admin['vFirstName']}"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Account Number</label>
										<div class="controls">
											<input type="text" placeholder="" class="input-large" id="vAccountNumber" name="cash[vAccountNumber]" value="{$data.admin['vLastName']}"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Bank Account Type</label>
										<div class="controls" >
											<select class="input-large m-wrap" tabindex="1" name="cash[eTypeofBankAccount]" id="eTypeofBankAccount">
												<option value="">--Select Account Type--</option>
												<option value="Checking">Checking</option>
												<option value="Savings">Savings</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Bank Routing</label>
										<div class="controls">
											<input type="text" placeholder="" class="input-large" id="vBankRouting" name="cash[vBankRouting]" value="{$data.admin['vFirstName']}"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Bank Signature</label>
										<div class="controls">
											<input type="text" placeholder="" class="input-large" id="vBankSignature" name="cash[vBankSignature]" value="{$data.admin['vFirstName']}"/>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success" id="btn-save">Pay Now</button>
										<button type="button" class="btn" onclick="returnme()">Cancel</button>
									</div>
								</div>
								<div id="chequemethod" name="chequemethod">
									<div class="space15"></div>
									<h2 class="inner_hd">Payment Datails </h2>
									<hr>
									<input type="hidden" name="iAdminId" value="{$data.admin['iAdminId']}">
									<div class="control-group">
										<label class="control-label">Cheque Number</label>
										<div class="controls">
											<input type="text" placeholder="" class="input-large" id="vChequeNumber" name="cheque[vChequeNumber]" value="{$data.admin['vFirstName']}"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Bank Name</label>
										<div class="controls">
											<input type="text" placeholder="" class="input-large" id="vBankName1" name="cheque[vBankName]" value="{$data.admin['vFirstName']}"/>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-success" id="btn-save-chq">Pay Now</button>
										<button type="button" class="btn" onclick="returnme()">Cancel</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		{literal}
		<script type="text/javascript">
		$(document).ready(function(){
			$('#ePaymentType').val("0");
			$('#cashmethod').hide();
			$('#chequemethod').hide();
			$("#ePaymentType").change(function()
			{
				var txt = $(this).val();
				if(txt=="")
				{
					$('#cashmethod').hide();
					$('#chequemethod').hide();
				}
				if(txt=="Cash")
				{
					$('#cashmethod').show();
					$('#chequemethod').hide();
				}
				if(txt=="Cheque")
				{
					$('#cashmethod').hide();
					$('#chequemethod').show();
				}
			});
		});
		</script>
		{/literal}
