<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Publish_app extends MY_Controller
{
    function __construct()
    {
        parent::__construct();        
	    $this->load->model('publishapp_model', '', TRUE);
	}    

    function index()
    {
    	//load template file
     	$this->data['tpl_name']= "publish_app.tpl";       
     	//echo "<pre>";
        //print_r($GLOBALS['Configration_value']['APP_PRICE']);exit;
        $this->data['price'] = $GLOBALS['Configration_value']['APP_PRICE'];
        //echo $this->data['price'];exit;
     	$iApplicationId = $this->uri->segment(2);
        $this->data['appinfo'] = $this->publishapp_model->appinformation_by_id($iApplicationId);

        //$this->data['message'] = $this->session->flashdata('message');

        //smarty assign variables
        $this->smarty->assign('data', $this->data);

        $this->smarty->view('template.tpl'); 
    }

    function addpayment()
    {

    	//if form is posted
        if($this->input->post())
        {
        	$payment = $this->input->post();
        	//print_r($GLOBALS['Configration_value']['APP_PRICE']);
        	//echo "<pre>";print_r($payment);exit;
        	if($payment['Data']['ePaymentType'] == 'Cash')
        	{
        		$paymentcash['iApplicationId'] = $payment['Data']['iApplicationId'];
        		$paymentcash['iClientId'] = $payment['Data']['iClientId'];
        		$paymentcash['ePaymentType'] = $payment['Data']['ePaymentType'];
        		$paymentcash['vBankName'] = $payment['cash']['vBankName'];
        		$paymentcash['vAccountNumber'] = $payment['cash']['vAccountNumber'];
        		$paymentcash['eTypeofBankAccount'] = $payment['cash']['eTypeofBankAccount'];
        		$paymentcash['vBankRouting'] = $payment['cash']['vBankRouting'];
        		$paymentcash['vBankSignature'] = $payment['cash']['vBankSignature'];
        		$paymentcash['eStatus'] = 'Completed';
        		$paymentcash['fPrice'] = $payment['Data']['fPrice'];
        		$paymentcash['dPaymentDate'] = date('Y-m-d H:i:s');
        		//echo "<pre>";print_r($paymentcash);exit;
        		$iPaymentId = $this->publishapp_model->add_payment($paymentcash);
        		$this->session->set_flashdata('paymentmessage',"Payment made successfully");
        		redirect($this->data['base_url'] . 'app/step6/'.$paymentcash['iApplicationId']);
	            exit;
        	}
        	else
        	{
        		$paymentcheque['iApplicationId'] = $payment['Data']['iApplicationId'];
        		$paymentcheque['iClientId'] = $payment['Data']['iClientId'];
        		$paymentcheque['ePaymentType'] = $payment['Data']['ePaymentType'];
        		$paymentcheque['vBankName'] = $payment['cheque']['vBankName'];
        		$paymentcheque['vChequeNumber'] = $payment['cheque']['vChequeNumber'];
        		$paymentcheque['eTypeofBankAccount'] = '';
        		$paymentcheque['eStatus'] = 'Completed';
        		$paymentcheque['fPrice'] = $payment['Data']['fPrice'];
        		$paymentcheque['dPaymentDate'] = date('Y-m-d H:i:s');
        		//echo "<pre>";print_r($paymentcheque);exit;
        		$iPaymentId = $this->publishapp_model->add_payment($paymentcheque);
        		$this->session->set_flashdata('paymentmessage',"Payment made successfully");
	            redirect($this->data['base_url'] . 'app/step6/'.$paymentcheque['iApplicationId']);
	            exit;
        	} 	
        }
    }
}
/* End of file publish_app.php */
/* Location: ./application/controllers/publish_app.php */
?>