<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publishapp_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    function appinformation_by_id($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->from('r_appinformation');
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_app_price(){
        $this->db->select('');
        $this->db->where('vName', 'APP_PRICE');
        $this->db->from('r_configurations');
        $query = $this->db->get();
        return $query->row_array();
    }

    //add payment
    function add_payment($Data)
    {
        $this->db->insert('r_app_payment', $Data);
        return $this->db->insert_id();
    }

    //get payment details
    function get_payment_details($iApplicationId)
    {
        $this->db->select('');
        //$this->db->select('iPaymentId,iClientId,iApplicationId,fPrice,ePaymentType,vBankName,vAccountNumber,eTypeofBankAccount,vChequeNumber,vBankRouting,vBankSignature,eStatus');
        $this->db->from('r_app_payment');
        $this->db->where('iApplicationId', $iApplicationId);   
        $query = $this->db->get();
        return $query->row_array();
    }

    //update payment
    function update_payment($Data)
    {
        $this->db->update("r_app_payment", $Data, array('iApplicationId' => $Data['iApplicationId']));
        return $this->db->affected_rows();
    }
}
?>