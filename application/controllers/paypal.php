<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller
{
	function __construct() 
	{
		parent::__construct();

		/** paypal recurring payments **/
		$this->load->library('PaypalRecurringPayments');
		$this->load->model('app_model');

		$this->load->library('session');

		/** gateway details **/
		// $gateway->apiUsername = ... ;
		// $gateway->apiPassword = ... ;
		// $gateway->apiSignature = ... ;
		$gateway->testMode = true;
		$gateway->returnUrl = "http://admin.easy-apps.co.uk/paypal/paypal_success";
		$gateway->cancelUrl = "http://admin.easy-apps.co.uk/paypal/paypal_cancel";
	
		/** gateway details **/	
		$this->data['gateway'] = $gateway;
   	}

	
	/**
		Paypal redirect 
	**/
	//public function paypal_redirect()
	public function index()
	{
exit;
		/** paypal recurring payments **/
		$recurring = new PaypalRecurringPayments($this->data['gateway']);
		$easyapps_data = $this->input->post();

		$Data['vPassword'] = $this->input->post('vPassword');
		$Data['vFirstName'] = $this->input->post('vEmail');

		/** easyapps data **/
		$this->session->set_userdata('easyapps_data',$easyapps_data);

		/** resultData **/
	 	$resultData = array();
		$isOk = $recurring->obtainBillingAgreement("EasyApps", "carateamltd@gmail.com", 'USD', $resultData);

		/** paypa success **/
		if (!$isOk)
		{
		    print_r($resultData);
		}
	}	

	/**
		Paypal Success
	**/
	public function paypal_success()
	{
		/** recurring payment **/
		$recurring = new PaypalRecurringPayments($this->data['gateway']);
		$resultData = array();

		/** get Billing Details **/
		$details = $recurring->getBillingDetails($resultData);
		
		/** When Something Wrong Redirect to Login **/
		if (!$details) {
		    echo "Something went wrong\n";
		    print_r($resultData);
		    return;
		}

		/** Read Userdata **/
		$myresult = $this->session->userdata('easyapps_data');

		/** Do Initial Payment Details **/
		$billingAgreementId = $recurring->doInitialPayment($details['token'], $details['payerId'], $myresult['penny'], $resultData);


		/** billing agreementId **/
		if (!$billingAgreementId) {
		    echo "Something went wrong\n";
		    print_r($resultData);
		    return;
		}
		
		/** get industry details **/
		$my = $this->app_model->get_industry_details($myresult['packagename']);
		$iIndustryId = $my['iIndustryId'];

		/** data for insertion **/
		$mydata['BillingAgrimentId'] = $resultData['BILLINGAGREEMENTID'];
		$mydata['vTrasactionId'] = $resultData['TRANSACTIONID'];
		$mydata['fAmt'] = $resultData['AMT'];
		$mydata['vPackageName'] = $myresult['packagename'];
		$mydata['eStatus'] = $resultData['PAYMENTSTATUS'];
		$mydata['vType'] = $myresult['vType'];
		$mydata['iIndustryId'] = $iIndustryId;
		$mydata['iAdminId'] = $this->data['user_info']['iAdminId'];
		$mydata['dDateTime'] = date('Y-m-d',strtotime($resultData['TIMESTAMP']));

		echo "<pre>";
			print_r($mydata);
		exit;
		/** Recurring payment Add **/
		$iPackageId = $this->app_model->insert_paypal_recurring_details($mydata);

		/** set userdata **/				
		$this->session->set_userdata('iPackageId',$iPackageId);

		if($myresult['vPassword'] != ''){
			redirect($this->data['base_url'].'authentication/registeration_add');
		}else if($myresult['vPassword'] == ''){
			redirect($this->data['base_url'].'authentication');
		}
		return true;
	}

	/** Paypal confirm **/
	function paypal_confirm()
	{
		/** Paypal Recurring Payment **/
		$recurring = new PaypalRecurringPayments($this->data['gateway']);
		$resultData = array();

		/** current date **/
		$current_date = date('Y-m-d');
		$transactiondetails = $this->app_model->get_all_agrimentId_details($current_date);	
	
		/** Transaction Details **/
		foreach($transactiondetails as $val){
			/** paypal confirm **/
	     		$isOk = $recurring->doSubscriptionPayment($val['BillingAgrimentId'], $val['fAmt'], $resultData);
		}
		
		/** resultData **/
		if ($isOk){
			$this->send_mail_transaction_details();
		}

		return true;
	}

	/**
		Paypal cancel
	**/
	function paypal_cancel()
	{
		redirect($this->data['base_url'].'authentication');
	}
}
?>
