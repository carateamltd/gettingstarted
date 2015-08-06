<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/** Paypal Class **/
class Newpackage extends CI_Controller 
{
	/** Paypal **/
	private $currency = 'USD'; 
	private $ec_action = 'Sale'; 
	
	/** constructor **/
	function __construct() 
	{
		parent::__construct();
		$paypal_details = array(
			'API_username' => 'mayur.intelithub-facilitator_api1.gmail.com', 
			'API_signature' => 'A1vVA0zu-oe.JtWtQFjUS6uuSvnbAjSyDFi931UdXnnco.5ok-WjUzJ8', 
			'API_password' => 'A5PCBGGHXVQSVBXH',
		);
		
		/*** Paypal ec library ***/
		$this->load->library('paypal_ec', $paypal_details);
		$this->load->helper('url');
		
		/** Load Model **/
		$this->load->model('app_model');
		
		$this->load->library('session');
		
		/** Base Url **/
		$this->data['base_url'] = $this->config->base_url();
	}
	
	/** buy **/
	function buy() 
	{
		/** buy **/
		$Data = $this->input->post();
		$Data['vFirstName'] = $this->input->post('vEmail');
		/** set userdata **/
		$this->session->set_userdata('register_data',$Data);
		$packages = $Data['vPackages'];
        $price = $Data['penny'];
        $category_name = $Data['packagename'];
		
		/** Assign product details **/
		$this->currency = 'GBP';
		$ec_action = 'Sale';
		
		/** to buy **/
		$to_buy = array(
			'desc' => 'Purchase from Easyapps', 
			'currency' => $this->currency, 
			'type' => $this->ec_action, 
			'return_URL' => site_url('newpackage/back/'.$packages), 
			'cancel_URL' => site_url('newpackage'), // this goes to this controllers index()
			'shipping_amount' => 0, 
			'get_shipping' => true);
		
		/** Temp Product **/
		$temp_product = array(
			'name' => $category_name, 
			'desc' => 'easyapps', 
			'quantity' => 1, 
			'clientemail' => $Data['vFirstName'],
			'amount' => $price,
		);
			
		/** list of products array **/
		$to_buy['products'][] = $temp_product;
		
		/** enquire Paypal API for token **/
		$set_ec_return = $this->paypal_ec->set_ec($to_buy);
		
		if (isset($set_ec_return['ec_status']) && ($set_ec_return['ec_status'] === true)) 
		{
			// redirect to Paypal
			$this->paypal_ec->redirect_to_paypal($set_ec_return['TOKEN']);
		} else {
			$this->_error($set_ec_return);
		}
	}
	
	/** back **/
	function back() 
	{
		/** Get ApplicationId **/
		$packages = $this->input->get('vPackage');
		$token = $_GET['token'];
		$payer_id = $_GET['PayerID'];
		$get_ec_return = $this->paypal_ec->get_ec($token);
		
		if (isset($get_ec_return['ec_status']) && ($get_ec_return['ec_status'] === true)) 
		{
			// in $get_ec_return array
			$ec_details = array(
				'token' => $token, 
				'payer_id' => $payer_id, 
				'currency' => 'GBP', 
				'amount' => $get_ec_return['PAYMENTREQUEST_0_AMT'], 
				'IPN_URL' => site_url('package/ipn'), 
				// in case you want to log the IPN, and you
				// may have to in case of Pending transaction
				'type' => $this->ec_action);
			
			// DoExpressCheckoutPayment
			$do_ec_return = $this->paypal_ec->do_ec($ec_details);
			
			if (isset($do_ec_return['ec_status']) && ($do_ec_return['ec_status'] === true)) 
			{
				$package['vFirstName'] = $get_ec_return['FIRSTNAME'];
				$package['vLastName'] = $get_ec_return['LASTNAME'];
				$package['fAmt'] = $do_ec_return['PAYMENTINFO_0_AMT'];
				$package['vTransactoinId'] = $do_ec_return['PAYMENTINFO_0_TRANSACTIONID'];
				$package['eStatus'] = $do_ec_return['PAYMENTINFO_0_ACK'];
				$vCategoryName = $get_ec_return['L_PAYMENTREQUEST_0_NAME0'];
				
				/** search industryid **/
				$pkgs = $this->app_model->get_industry_details($vCategoryName);

				$package['vCategoryId'] = $pkgs['iIndustryId'];
				/** PackageId **/
				$iPackageId = $this->app_model->insert_paypal_packages_details($package);
				
				/** set userdata **/				
				$this->session->set_userdata('iPackageId',$iPackageId);
				
				redirect($this->data['base_url'].'authentication/already_register_add');
			} else {
				$this->_error($do_ec_return);
			}
		} else {
			$this->_error($get_ec_return);
		}
	}
	
	/** ipn **/
	function ipn() 
	{
		$logfile = 'ipnlog/' . uniqid() . '.html';
		$logdata = "<pre>\r\n" . print_r($_POST, true) . '</pre>';
		file_put_contents($logfile, $logdata);
	}
	
	/** Error **/
	function _error($ecd) 
	{
		echo "<br>error at Express Checkout<br>";
		echo "<pre>" . print_r($ecd, true) . "</pre>";
		echo "<br>CURL error message<br>";
		echo 'Message:' . $this->session->userdata('curl_error_msg') . '<br>';
		echo 'Number:' . $this->session->userdata('curl_error_no') . '<br>';
	}
}
