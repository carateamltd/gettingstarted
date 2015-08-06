<?php
/**
	PaypalBase class files
**/
class PaypalBase {
    
    public $gateway;
    public $endpoint = '/nvp';
    
    public function __construct(PaypalGateway $gateway) 
    {	
	/** gateway **/
        $this->gateway = $gateway;

	/** paypal class files **/
	$this->CI =& get_instance();
	$this->CI->load->library('PaypalGateway');
	$this->CI->load->library('HTTPRequest');
    }
    
    public function response($data){
        $request = new HTTPRequest($this->CI->paypalgateway->getHost(), $this->endpoint, 'POST', true);
        $result = $request->connect($data);
        if ($result < 400) return $request;
        return false;
    }
    
    public function responseParse($resp) {
        $a = explode("&", $resp);
        $out = array();
        foreach ($a as $v) {
            $k = strpos($v, '=');
            if ($k) {
                $key = trim(substr($v, 0, $k));
                $value = trim(substr($v, $k+1));
                if (!$key) continue;
                $out[$key] = urldecode($value);
            } else {
                $out[] = $v;
            }
        }
        return $out;
    }
    
    public function buildQuery($data = array()) 
    {
        $data['USER'] = "mayur.intelithub-facilitator-1_api1.gmail.com"; //$this->CI->paypalgateway->apiUsername;
        $data['PWD'] = "ESA6QXH3KJ4DH95M"; //$this->CI->paypalgateway->apiPassword;
        $data['SIGNATURE'] = "AFcWxV21C7fd0v3bYYYRCpSSRl31ArExYDECbZ5G3u-4ebpvRW1zBCky"; //$this->CI->paypalgateway->apiSignature;
        $data['VERSION'] = '65.0';
        $data['RETURNURL'] = "http://admin.easy-apps.co.uk/test/paypal_success"; //$this->CI->paypalgateway->returnUrl;
        $data['CANCELURL']  = "http://admin.easy-apps.co.uk/test/paypal_cancel"; //$this->CI->paypalgateway->cancelUrl;
        $query = http_build_query($data);
	return $query;
    }
    
    
    public function runQueryWithParams($data) {
        $query = $this->buildQuery($data);
        $result = $this->response($query);
        if (!$result) return false;
        $response = $result->getContent();
        $return = $this->responseParse($response);
        $return['ACK'] = strtoupper($return['ACK']);
        return $return;
    }
}


?>
