<?php
class PaypalRecurringPayments
{
 	public $token;
	public $email;
	public $payerId;
	public $billingAgreementAccepted;
	protected $CI;

	public function __construct()
	{
		/** paypalrecurring payments **/
		$this->CI =& get_instance();
		$this->CI->load->library('PaypalBase');
		$this->CI->load->library('PaypalGateway');
	}
	
        /** obtain function **/
	public function obtainBillingAgreement($description = '', $predefinedEmail = '', $currency = 'USD', &$resultData = array()) 
	{
		$data = array('METHOD' => 'SetExpressCheckout',
			      'LOCALECODE' => 'UK',
			      'EMAIL' => $predefinedEmail,
			      'AMT' => 0, // For recurring payments must be 0
			      'CURRENCYCODE' => $currency,
			      'L_BILLINGTYPE0' => 'MerchantInitiatedBilling',
			      'L_BILLINGAGREEMENTDESCRIPTION0' => $description,
			      'NOSHIPPING' => 1);

		if (!$resultData = $this->CI->paypalbase->runQueryWithParams($data)) return false;
		if ($resultData['ACK'] == 'FAILURE' && $resultData['L_ERRORCODE0'] == 11452)
		    throw new Exception("You need to have 'reference transactions' enabled on your account. See https://www.x.com/thread/38753");
		if ($resultData['ACK'] == 'FAILURE') return false;
		if ($resultData['ACK'] == 'SUCCESS') {
		    header('Location: '.$this->CI->paypalgateway->getGate().'cmd=_express-checkout&token='.$resultData['TOKEN']);
		//  header('Location: '.$this->CI->gateway->getGate().'cmd=_express-checkout&token='.$resultData['TOKEN']);
		    exit();
		}
		return true;
	}
    
    public function getBillingDetails(&$resultData = array()) 
    {
	$token = $_GET['token'];
	$data = array('METHOD' => 'GetExpressCheckoutDetails',
	              'TOKEN' => $token);
	if (!$resultData = $this->CI->paypalbase->runQueryWithParams($data)) return false;
	if ($resultData['ACK'] == 'FAILURE') return false;

	// $details = new PaypalBillingDetails(); (not havieng paypabillingdetails)

	/** details of transactions **/
	$details['email'] = $resultData['EMAIL'];
	$details['payerId'] = $resultData['PAYERID'];
	$details['token'] = $resultData['TOKEN'];
	$details['billingAgreementAccepted'] = intval($resultData['BILLINGAGREEMENTACCEPTEDSTATUS']);
	return $details;
    }
    
    public function doInitialPayment($token, $payerId, $amount, &$resultData = array()) 
    {
		$data = array('METHOD' => 'DoExpressCheckoutPayment',
		              'PAYERID' => $payerId,
		              'TOKEN' => $token,
		              'AMT' => floatval($amount),
		              'PAYMENTACTION' => 'Sale');
		if (!$resultData = $this->CI->paypalbase->runQueryWithParams($data)) return false;
		if ($resultData['ACK'] == 'FAILURE') return false;
		$bId = $resultData['BILLINGAGREEMENTID'];
		return $bId ? $bId : false;
    }
    
    public function doSubscriptionPayment($billingAgreementId, $amount, &$resultData = array()) 
    {
		$data = array('METHOD' => 'DoReferenceTransaction',
		              'REFERENCEID' => $billingAgreementId,
		              'AMT' => floatval($amount),
		              'PAYMENTACTION' => 'Sale');
		
		if (!$resultData = $this->CI->paypalbase->runQueryWithParams($data)) return false;
		if ($resultData['ACK'] == 'SUCCESS') return true;
        	return false;
    }
}
?>
