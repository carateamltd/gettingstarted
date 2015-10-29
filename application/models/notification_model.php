<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notification_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }
    
    function getXmlUrl($iClientId){
	   $this->db->select('vXmlUrl');
	   $this->db->from('r_administrator');
	   $this->db->where('iAdminId',$iClientId);
	   $data=$this->db->get()->row();
	   return $data; 
    }
    
    function save($table,$data){
	   $this->db->insert($table,$data);
	   return $this->db->insert_id();
    }
    
    function get_all_notification($iAdminId){
	   $this->db->select('sn.*,sa.vFirstName,sa.vLastName');
	   $this->db->from('r_notification sn');
	   $this->db->join('r_administrator sa','sn.iAdminId=sa.iAdminId');
	   $this->db->where('sn.iAdminId',$iAdminId);	   
	   $data=$this->db->get()->result_array();
	   return $data; 	   
    }
    
    function get_notification($notificationId){
	   $this->db->select('');
	   $this->db->from('r_notification ');
	   $this->db->where('iNotificationId',$notificationId);	   
	   $data=$this->db->get()->row();
	   return $data; 	   
	   
    }
	
	function getuserapps($iClientId)
    {
    	$this->db->select('iApplicationId,tAppName');
    	$this->db->from('r_appinformation');
    	$this->db->where('iClientId',$iClientId);
    	$data=$this->db->get();
    	//echo '<pre>'; print_r($data->result_array()); exit;
    	return $data->result_array();
    }
    function get_individual_users()
    {
    	//$this->db_forum = $this->load->database('forum');
	    //$this->db = $this->load->database('forum', TRUE);
		$this->db->select('iUserId,vDevicename');
		$this->db->from('r_application_user');
	    //$this->db->where('iApplicationId',$iApplicationId);
		
		$query = $this->db->get();
		//echo '<pre>'; print_r( $query->result_array()); exit;
		return $query->result_array();
	}
    
	
	function get_tabname_details()
	{
		$this->db->select('vTitle,iFeatureId');
		$this->db->from('r_appindustryfeature');
	 	$query = $this->db->get();
		return $query->result_array();
	}
	
	/** get Device Details **/
	function get_device_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_application_user');
		$this->db->where('iApplicationId',$data['data']['iApplicationId']);
	 	$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_device_group_details($data){
		$this->db->select('*');
		$this->db->from('r_application_user');
		$this->db->where('iApplicationId',$data['data']['iApplicationId']);
		$this->db->where('vType',$data['group_name']);
	 	$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_device_individual_details($data){
		$this->db->select('*');
		$this->db->from('r_application_user');
		$this->db->where('iApplicationId',$data['data']['iApplicationId']);
		$this->db->where('iUserId',$data['individual_name']);
	 	$query = $this->db->get();
		return $query->result_array();
	}
	
	
	function get_feature_menu_index($iTabId,$iApplicationId)
	{
		$this->db->select('rs.iOrderId');
		$this->db->from('r_appfeature ra');
		$this->db->join('r_sorttab rs','ra.iAppTabId = rs.iAppTabId','inner');
		$this->db->where('ra.iApplicationId',$iApplicationId);
		$this->db->where('ra.iFeatureId',$iTabId);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function check_notification_details($iAdminId,$iIndustryId){
		$this->db->select('*');
		$this->db->from('r_packages_value_paypal');
		$this->db->where('iAdminId',$iAdminId);
		$this->db->where('vCategoryId',$iIndustryId);
		$this->db->order_by('iPackageId','DESC');
		$this->db->limit('1');
		$query = $this->db->get();
		return $query->row_array();
	}

	function check_add_notification($iAdminId,$today){
		$this->db->select('*');
		$this->db->from('r_notification');
		$this->db->where('iAdminId',$iAdminId);
		$this->db->where('dSendDate !=',$today);
		$this->db->order_by('iNotificationId','DESC');
		$this->db->limit('1');
		$query = $this->db->get();
		return $query->row_array();
	}

	function check_add_notification_gold($iAdminId,$today){
		$this->db->select('*');
		$this->db->from('r_notification');
		$this->db->where('iAdminId',$iAdminId);
		$this->db->where('dSendDate',$today);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_industryId($iApplicationId){
		$this->db->select('*');
		$this->db->from('r_appinformation');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	function get_regIds($iApplicationId,$group_name)
	{
		$this->db->select('*');
		$this->db->from('r_application_user');
		if($group_name!='All')
		{
			$this->db->where('vType',$group_name);
		}
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_application_details($iApplicationId)
	{
		$this->db->select('*');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->from('r_appinformation');
        $query = $this->db->get();
        return $query->result_array();
	}
}
?>
