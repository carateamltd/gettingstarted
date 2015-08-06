<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #check authentication
    function check_auth($vEmail,$vPassword)
    {
        $this->db->select('a.iAdminId,a.vFirstName,a.vLastName,a.vEmail,a.iRoleId,a.eStatus,a.vPassword,a.vCurrency');
        $this->db->from('r_administrator as a');
        $this->db->where('a.eStatus','Active');
        $this->db->where('a.vEmail', $vEmail);
        $this->db->where('a.vPassword', $vPassword);
        $query = $this->db->get();
        return $query->row_array();
    }
	
	/** Insert Registration details **/
	function insert_registration_details($data)
	{
		$this->db->insert('r_administrator',$data);
        	return $this->db->insert_id();
	}

	function update_package_paypal_clientid($iAdminId,$vPackages,$iPackageId)
	{
		$data = array(
				'iAdminId' => $iAdminId,
				'vPackage' => $vPackages
			);
		$this->db->where('iPackageId', $iPackageId);
    		$this->db->update('r_packages_value_paypal', $data);
    		return true;	
	}

    #count all users
    function count_admin()
    {
        $this->db->select('a.iAdminId,a.vFirstName,a.vLastName,a.vEmail,a.vPhone,a.eStatus,a.iRoleId,r.vTitle');
        $this->db->from('r_administrator as a');
        $this->db->join('r_role as r','a.iRoleId =r.iRoleId');
        $this->db->order_by('a.iAdminId desc');
        return $this->db->count_all_results();
    }

    #get listing of users
    function get_admin()
    {
        $this->db->select('a.iAdminId,a.vFirstName,a.vLastName,a.vEmail,a.vPhone,a.eStatus,a.iRoleId,r.vTitle');
        $this->db->from('r_administrator as a');
        $this->db->join('r_role as r','a.iRoleId =r.iRoleId');
        $this->db->order_by('iAdminId desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    #get state details
    function get_admin_details($iAdminId)
    { 
        $this->db->select('');
        $this->db->from('r_administrator');
        $this->db->where('iAdminId', $iAdminId);      
        $query = $this->db->get();    
        return $query->num_rows() == 0 ? 0 : $query->row_array();    
    }
    function check_admin($ids)
    {

        $this->db->select('iClientId');
        $this->db->from('r_appinformation');
        $this->db->where('iClientId',$ids);
        $query=$this->db->get();
        return $query->num_rows();
    }
    /**
        Change By : Mayur Gajjar
        Date : 1/8/14
        Change : Multilanguage
    **/
    # get general language details
    function get_language_details($lang)
    {
        $this->db->select("$lang rField,rLabelName");
        $this->db->from('r_web_language_details as a');
        $query = $this->db->get();
        return $query->result_array();
	}


    //admin_model.php
    /*create by Maksud khan
    Date: 22-5-2014
    Description:- inactive for app delete
    */
    function make_inactive($ids)
    {   
        $data = array('eStatus' =>'Inactive');
        $this->db->where_in('iAdminId', $ids);
        $this->db->update('r_administrator',$data);
    }
    function already_admins($ids)
    {
        $this->db->select('');
        $this->db->from('r_administrator');
        $this->db->where('iAdminId',$ids);     
        $query = $this->db->get();
        return $query->row_array();
    }

    #add user
    function save($data)
    {
        $this->db->insert('r_administrator',$data);
        return $this->db->insert_id();
    }

    #delete user
    function delete_all($ids) 
    {
        $this->db->where_in('iAdminId',$ids);
        $this->db->delete('r_administrator');
    }
    
    #update user
    function edit_admin($iAdminId,$data)
    {
        $this->db->where('iAdminId', $iAdminId);
        $query = $this->db->update("r_administrator", $data);
        return $query;  
    }

    // admin model
    function update_r_administrator($iAdminId,$lang)
    {
        $data=array('eLanguage'=>$lang);
        $this->db->where('iAdminId', $iAdminId);
        $query = $this->db->update('r_administrator',$data);
        return $query;
    }

    function get_all_administrator()
    {
        $this->db->select('a.iAdminId,a.vFirstName,a.vLastName,a.vEmail,a.vPhone,a.iRoleId,a.eStatus,r.iRoleId,r.vTitle');
        $this->db->from('r_administrator a');
        $this->db->join('r_role AS r','r.iRoleId=a.iRoleId','LEFT');
        $this->db->order_by('iAdminId desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    #update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iAdminId', $ids);
        $this->db->update('r_administrator', $data); 
        return $this->db->affected_rows();   
    }

    #get paypal details
    function get_paypal_details($iClientId)
    { 
        $this->db->select('');
        $this->db->from('r_client_paypal_info');
        $this->db->where('iClientId', $iClientId);      
        $query = $this->db->get();
        return $query->row_array();
    }

    #update paypal info
    function edit_paypal_details($iPaypalinfoId,$data)
    {
        $this->db->where('iPaypalinfoId', $iPaypalinfoId);
        $query = $this->db->update("r_client_paypal_info", $data);
        return $query;  
    }

    #add user paypal info
    function save_paypal_info($data)
    {
	    $this->db->insert('r_client_paypal_info',$data);
        return $this->db->insert_id();
    }    
    #add user fee info
    function save_fee_info($data)
    {
        $this->db->insert('r_client_fee_type',$data);
        return $this->db->insert_id();
    } 

    #delete all user fee info clientwise
    function delete_all_fee($iClientId) 
    {
        $this->db->where('iClientId',$iClientId);
        $this->db->delete('r_client_fee_type');
    }    

    #get fee details
    function get_fee_details($iClientId)
    { 
        $this->db->select('');
        $this->db->from('r_client_fee_type');
        $this->db->where('iClientId', $iClientId);      
        $query = $this->db->get();
        return $query->result_array();
    }
       
    //check existing email
    function duplicate_checking($vEmail,$iAdminId)
    {
        $this->db->select('count(iAdminId) AS tot');
        $this->db->from('r_administrator');
        $this->db->where('vEmail', $vEmail);
        
        if($iAdminId!='')
        {
            $this->db->where('iAdminId !=', $iAdminId);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function getuserlist($email){
        $Data['vEmail']=$email;
        $query = $this->db->get_where('r_administrator',$Data);
        return $query;
    }
	
    /** End **/
	
	function check_email_registration($vEmail)
	{
		$this->db->select('*');
		$this->db->from('r_administrator');
		$this->db->where('vEmail', $vEmail);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	
	function get_password_details($vEmail)
	{
		$this->db->select('*');
		$this->db->from('r_administrator');
		$this->db->where('vEmail', $vEmail);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_register_admin_details($vEmail)
	{
		$this->db->select('*');
		$this->db->from('r_administrator');
		$this->db->where('vEmail', $vEmail);
		$query = $this->db->get();
		return $query->row_array();
	}

    function get_all_currency(){
        $this->db->select('');
        $this->db->from('r_currency');
        $this->db->order_by('currency_id','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
   
}
?>
