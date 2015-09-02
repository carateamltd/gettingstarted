<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Appdetail extends MY_Controller
{
    function __construct()
    {
        parent::__construct();        
	    $this->load->model('appdetail_model', '', TRUE);
		
        $config = array(
            'Sandbox' => ($GLOBALS['Configration_value']['TRANSACTION_MODE'] == 'No' ? TRUE : false),//$this->config->item('Sandbox'),            // Sandbox / testing mode option.
            'APIUsername' => $GLOBALS['Configration_value']['PAYPAL_API_USERNAME'],     // PayPal API username of the API caller
            'APIPassword' => $GLOBALS['Configration_value']['PAYPAL_API_PASSWORD'],     // PayPal API password of the API caller
            'APISignature' => $GLOBALS['Configration_value']['PAYPAL_API_SIGNATURE'],   // PayPal API signature of the API caller
            'APISubject' => '',                                                         // PayPal API subject (email address of 3rd party user that has granted API permission for your app)
            'APIVersion' => '98.0'  // API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
        );
       //print_r($config);exit;
        if($config['Sandbox'])
        {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        }

        $this->load->library('paypal/Paypal_pro', $config, $paypal);

	}    

    function index()
    {
    	$this->data['tpl_name']= "appdetail.tpl";
/*
            $bodyArr = array("#NAME#","#APPNAME#","#PAYMENTSTATUS#","#PRICE#","#TRANSACTIONID#","#PASSWORD#","#LINK#","#SITEURL#");
            $postArr = array('aka','aka','aka','aka','aka','aka','aka','aka');  
            $sendUser=$this->Send("PAYPAL_PAYMENT","Member",$Email,$bodyArr,$postArr); */    
	
	    $this->data['message'] = $this->session->flashdata('message');        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
	    $this->breadcrumb->add('Application Detail', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
		
        //$iApplicationId = 1;
        $iApplicationId = $this->input->get('appid');
        $iClientId = $this->data['user_info']['iAdminId'];
        $iRoleId = $this->data['user_info']['iRoleId'];
        $this->data['appinformation'] = $this->appdetail_model->get_all_appinformation_id($iApplicationId,$iClientId,$iRoleId);
         
        if(!$this->data['appinformation']){
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;       
        }

        $this->data['app_info'] = $this->appdetail_model->appinformation_by_id($iApplicationId);
        // echo '<pre>';print_r( $this->data['app_info']);exit;

        //Client Info
        $this->data['client_info'] = $this->appdetail_model->get_client_details( $this->data['app_info']['iClientId']);
        // echo '<pre>';print_r( $this->data['client_info']);exit;
        //Year DRD
        $this->data['yeardrd']=$this->yearDropdown(2013,2050);
        //Month DRD
        $this->data['mondrd'] = $this->monthDropdown();
        //Retrive Basic Price
        $this->data['app_price'] = $GLOBALS['Configration_value']['APP_PRICE'];

        //App Payment Info
        $this->data['app_payment_info'] = $this->appdetail_model->get_one_payment_info($iApplicationId);

        //echo '<pre>';print_r( $this->data['app_payment_info']);exit;
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

function Do_direct_payment_demo($payment_details,$client_details)
{

    $DPFields = array(
                        'paymentaction' => 'Sale',                         // How you want to obtain payment.  Authorization indidicates the payment is a basic auth subject to settlement with Auth & Capture.  Sale indicates that this is a final sale for which you are requesting payment.  Default is Sale.
                        'ipaddress' => $_SERVER['REMOTE_ADDR'],                             // Required.  IP address of the payer's browser.
                        'returnfmfdetails' => '1'                     // Flag to determine whether you want the results returned by FMF.  1 or 0.  Default is 0.
                    );
                    
    $CCDetails = array(
                        'creditcardtype' => $payment_details['vCreditCardType'],                     // Required. Type of credit card.  Visa, MasterCard, Discover, Amex, Maestro, Solo.  If Maestro or Solo, the currency code must be GBP.  In addition, either start date or issue number must be specified.
                        'acct' => $payment_details['vCardnumber'],                                 // Required.  Credit card number.  No spaces or punctuation.  
                        'expdate' => $payment_details['vMonth'].$payment_details['vYear'],                             // Required.  Credit card expiration date.  Format is MMYYYY
                        'cvv2' => $payment_details['vCvv'],                                 // Requirements determined by your PayPal account settings.  Security digits for credit card.
                        'startdate' => '',                             // Month and year that Maestro or Solo card was issued.  MMYYYY
                        'issuenumber' => ''                            // Issue number of Maestro or Solo card.  Two numeric digits max.
                    );
                    
                    
    $PayerInfo = array(
                        'email' => $client_details['vEmail'],                                 // Email address of payer.
                        'payerid' => '',                             // Unique PayPal customer ID for payer.
                        'payerstatus' => '',                         // Status of payer.  Values are verified or unverified
                        'business' => ''                             // Payer's business name.
                    );
                    
    $PayerName = array(
                        'salutation' => 'Mr.',                         // Payer's salutation.  20 char max.
                        'firstname' => $client_details['vFirstName'],                             // Payer's first name.  25 char max.
                        'middlename' => '',                         // Payer's middle name.  25 char max.
                        'lastname' => $client_details['vLastName'],                             // Payer's last name.  25 char max.
                        'suffix' => ''                                // Payer's suffix.  12 char max.
                    );
                    
/*    $BillingAddress = array(
                            'street' => '123 Test Ave.',                         // Required.  First street address.
                            'street2' => '',                         // Second street address.
                            'city' => 'Kansas City',                             // Required.  Name of City.
                            'state' => 'MO',                             // Required. Name of State or Province.
                            'countrycode' => 'US',                     // Required.  Country code.
                            'zip' => '64111',                             // Required.  Postal code of payer.
                            'phonenum' => '555-555-5555'                         // Phone Number of payer.  20 char max.
                        );
                        
    $ShippingAddress = array(
                            'shiptoname' => 'Tester Testerson',                     // Required if shipping is included.  Person's name associated with this address.  32 char max.
                            'shiptostreet' => '123 Test Ave.',                     // Required if shipping is included.  First street address.  100 char max.
                            'shiptostreet2' => '',                     // Second street address.  100 char max.
                            'shiptocity' => 'Kansas City',                     // Required if shipping is included.  Name of city.  40 char max.
                            'shiptostate' => 'MO',                     // Required if shipping is included.  Name of state or province.  40 char max.
                            'shiptozip' => '64111',                         // Required if shipping is included.  Postal code of shipping address.  20 char max.
                            'shiptocountry' => 'US',                     // Required if shipping is included.  Country code of shipping address.  2 char max.
                            'shiptophonenum' => '555-555-5555'                    // Phone number for shipping address.  20 char max.
                            );
*/                        
    $PaymentDetails = array(
                            'amt' => $payment_details['fPrice'],                             // Required.  Total amount of order, including shipping, handling, and tax.  
                            'currencycode' => 'GBP',                     // Required.  Three-letter currency code.  Default is USD.
                            'itemamt' => $payment_details['fPrice'],                         // Required if you include itemized cart details. (L_AMTn, etc.)  Subtotal of items not including S&H, or tax.
                       // URL for receiving Instant Payment Notifications.  This overrides what your profile is set to use.
                        );    
            
    $OrderItems = array();
    $Item     = array(
                        'l_name' => 'Publish Application',                         // Item Name.  127 char max.
                        'l_desc' => 'Application published',                         // Item description.  127 char max.
                        'l_amt' => $payment_details['fPrice'],                             // Cost of individual item.
                        'l_number' => '123',                         // Item Number.  127 char max.
                        'l_qty' => '1',                             // Item quantity.  Must be any positive integer.  
                        'l_taxamt' => '',                         // Item's sales tax amount.
                        'l_ebayitemnumber' => '',                 // eBay auction number of item.
                        'l_ebayitemauctiontxnid' => '',         // eBay transaction ID of purchased item.
                        'l_ebayitemorderid' => ''                 // eBay order ID for the item.
                );
    array_push($OrderItems, $Item);
    
    $Secure3D = array(
                      'authstatus3d' => '', 
                      'mpivendor3ds' => '', 
                      'cavv' => '', 
                      'eci3ds' => '', 
                      'xid' => ''
                      );
                      
    $PayPalRequestData = array(
                            'DPFields' => $DPFields, 
                            'CCDetails' => $CCDetails, 
                            'PayerInfo' => $PayerInfo, 
                            'PayerName' => $PayerName, 
                            //'BillingAddress' => $BillingAddress, 
                            //'ShippingAddress' => $ShippingAddress, 
                            'PaymentDetails' => $PaymentDetails, 
                            'OrderItems' => $OrderItems, 
                            'Secure3D' => $Secure3D
                        );
        //echo '<pre>';print_r($PayPalRequestData);exit;             
    $PayPalResult = $this->paypal_pro->DoDirectPayment($PayPalRequestData);
    //echo '<pre>';print_r($PayPalResult);exit;
    if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK']))
    {
        $result = array('Errors'=>$PayPalResult['ERRORS']);
       // $this->load->view('paypal_error',$errors);
    }
    else
    {
        // Successful call.  Load view or whatever you need to do here.
        $result = array('PayPalResult'=>$PayPalResult);
        //$this->load->view('do_direct_payment_demo',$data);
    }
    return $result;
}


function Get_balance()
{        
    $GBFields = array('returnallcurrencies' => '1');
    $PayPalRequestData = array('GBFields'=>$GBFields);
    $PayPalResult = $this->paypal_pro->GetBalance($PayPalRequestData);
    
    if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK']))
    {
        $errors = array('Errors'=>$PayPalResult['ERRORS']);
        $this->load->view('paypal_error',$errors);
    }
    else
    {
        // Successful call.  Load view or whatever you need to do here.
        $data = array('PayPalResult'=>$PayPalResult);
        $this->load->view('get_balance',$data);
    }
}

function app_payment(){
    $data = $this->input->get('pData');
    $data['ePaymentType'] = 'Paypal';
    $data['ePaymentType'] = mdate("%Y-%m-%d  %h:%i:%s", time());
    $iClientId = $data['iClientId'];
    $client_details = $this->appdetail_model->get_client_details($iClientId);

    //echo "<pre>";print_r($data);exit;
    if($data){
        $exist_info = $this->appdetail_model->get_one_payment_info($data['iApplicationId']);
        if($exist_info){
            $iPaymentId = $exist_info['iPaymentId'];
            $data1['ePaymentType'] = mdate("%Y-%m-%d  %h:%i:%s", time());
            $update_info = $this->appdetail_model->update_payment($data,$data['iPaymentId']);
        }else{
            $iPaymentId = $this->appdetail_model->save('r_app_payment',$data);
        }
        $result=$this->Do_direct_payment_demo($data,$client_details);
    }
    if($result['Errors']){
        $data1['eStatus'] = 'Failure';
        $update_info = $this->appdetail_model->update_payment($data1,$iPaymentId);
        echo $result['Errors'][0]['L_LONGMESSAGE'];exit;
    }else{
        if($result['PayPalResult']['ACK'] == 'Success' || $result['PayPalResult']['ACK'] == 'SuccessWithWarning'){
            $data1['iTransactionId'] = $result['PayPalResult']['CORRELATIONID'];
            $data1['eStatus'] ='Completed';
            $update_info = $this->appdetail_model->update_payment($data1,$iPaymentId);
            $update_payment_info = $this->appdetail_model->get_one_payment_info($data['iApplicationId']);
            $app_info = $this->appdetail_model->appinformation_by_id($data['iApplicationId']);
            //print_r($update_info);exit;

//PAYMENT EMAIL
            #$Email = 'akankshita009@gmail.com';
            $Email =$client_details['vEmail'];
            $Name = $client_details['vFirstName'] . $client_details['vLastName'];
            $appname= $app_info['tAppName'];
            $payment_status = $update_payment_info['eStatus'];
            $price = $update_payment_info['fPrice'];
            $transaction = $update_payment_info['iTransactionId'];
            $site_url=$this->data['base_url']; 
            $cardnum=$update_payment_info['vCardnumber'];;   

            $bodyArr = array("#NAME#","#APPNAME#","#PAYMENTSTATUS#","#PRICE#","#TRANSACTIONID#","#SITEURL#","#CARDNUM#");
            $postArr = array($Name,$appname,$payment_status,$price,$transaction,$site_url,$cardnum);  
            $sendUser=$this->Send("PAYPAL_PAYMENT","Member",$Email,$bodyArr,$postArr);     

            if($update_info){
                echo 'success';exit;
            }
            
        }else{
            $data1['eStatus'] = $result['PayPalResult']['ACK'];
            $update_info = $this->appdetail_model->update_payment($data1,$iPaymentId);
              echo $result['PayPalResult']['ERRORS'][0]['L_LONGMESSAGE'];exit;  
        }
    }
    exit;

}

}
/* End of file appdeatail.php */
/* Location: ./application/controllers/appdeatail.php */
?>