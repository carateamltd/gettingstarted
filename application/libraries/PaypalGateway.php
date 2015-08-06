<?php
class PaypalGateway {
    
    public $apiUsername;
    public $apiPassword;
    public $apiSignature;
    public $testMode;
    public $returnUrl;
    public $cancelUrl;
    
    public function __construct($apiUsername = "", $apiPassword = "", $apiSignature = "", $testMode = false) 
    {
        $this->apiUsername = "mayur.intelithub-facilitator-1_api1.gmail.com";
        $this->apiPassword = "ESA6QXH3KJ4DH95M";
        $this->apiSignature = "AFcWxV21C7fd0v3bYYYRCpSSRl31ArExYDECbZ5G3u-4ebpvRW1zBCky";
        $this->testMode = true;
    }
    
    public function getHost() {
        return $this->testMode ? "api-3t.sandbox.paypal.com" : "api-3t.paypal.com";
    }
    
    public function getGate() {
        return $this->testMode ? "https://www.sandbox.paypal.com/cgi-bin/webscr?" : "https://www.paypal.com/cgi-bin/webscr?";
    }
    
}

?>
