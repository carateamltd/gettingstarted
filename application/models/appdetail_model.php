<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class appdetail_model extends CI_Model 
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
    function save($table,$Data){
        $this->db->insert($table,$Data);
        return $this->db->insert_id();
    }
    function get_all_appinformation_id($iApplicationId,$iClientId,$iRoleId){
       
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        if($iRoleId>1){        
          $this->db->where('iClientId', $iClientId);
        }  
        $this->db->from('r_appinformation');
        $query = $this->db->get();     
        return $query->row_array();
    }
    function update_payment($data,$iPaymentId){
        $this->db->where('iPaymentId', $iPaymentId);
        $query = $this->db->update("r_app_payment", $data);
        return $query;
    }      

    function get_one_payment_info($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->from('r_app_payment');
        $query = $this->db->get();
        return $query->row_array();
    }

    #get Client details
    function get_client_details($iAdminId)
    { 
        $this->db->select('');
        $this->db->from('r_administrator');
        $this->db->where('iAdminId', $iAdminId);      
        $query = $this->db->get();
        return $query->row_array();
    }
 


}
?>