<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reservation_tab_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
	
	function get_resfeaturefields($iFeatureId){
        //echo $iFeatureId;exit;
        $this->db->select('');
        $this->db->where('iFeatureId', $iFeatureId);
        $this->db->where('eStatus', 'active');
        $this->db->from('r_featurefields');
        $query = $this->db->get();
        //echo $this->db->last_query(); exit;
        return $query->result_array();
    }
	
	function get_appwise_reservation($iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_app_aroundus_category');
        $query = $this->db->get();
        return $query->result_array();
    }
	
    function get_all_pages(){
        //$this->db->select('rLangId,rPageUrl');
        //$this->db->from('r_web_language');
        $this->db->select('rLangId,rPageName');
        $this->db->distinct('rPageName');
        $this->db->from('r_web_language_details');
        $query = $this->db->get();
        //echo $this->db->last_query();
        //exit;
        return $query->result_array();
    }
    
    function add_tab($adddata){
    	$data = array(
		   'rLangId' => '1' ,
		   'rPageName' => $adddata['cms_page_name'] ,
		   'rLabelName' => $adddata['label_name'],
		   'rEnglish' => $adddata['label_english'],
		   'rFrench' => $adddata['label_french']
		);

		$this->db->insert('r_web_language_details', $data);
	}
	
	function add_service($data){
		
		$input = array(
			'iApplicationId' => $data['iApplicationId'],
			'iFeatureId' => $data['iFeatureId'],
			'iTabId' => $data['iTabId'],
			'vServiceName' => $data['vServiceName'],
			'vPrice' => $data['vPrice'],
			'vReservationFee' => $data['vReservationFee'],
			'vMaxService' => $data['vMaxService'],
			'iDuration' => $data['iDuration'],
			'vServiceTiming' => $data['vServiceTiming']
		);
		$this->db->insert('r_app_reservation_service', $input);
		return $this->db->insert_id();
	}
	
	function get_tabwise_service($iTabId){
		$this->db->select('');
		$this->db->where('iTabId',$iTabId);
		$this->db->from('r_app_reservation_service');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	function get_currency(){
		$this->db->select('');
		$this->db->from('r_currency');
		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	function update_gen_info($data){
		
     	$sql="INSERT INTO `r_app_reservation_general_info` (`iApplicationId`, `iFeatureId`, `iTabId`, `vServiceCenterName`, `tDescription`, `vAdminEmail`, `iCurrencyId`, `vServiceTiming`) values ('".$data['iApplicationId']."','".$data['iFeatureId']."','".$data['iTabId']."','".$data['vServiceCenterName']."','".$data['tDescription']."','".$data['vAdminEmail']."','".$data['iCurrencyId']."','".$data['vServiceTiming']."') ON DUPLICATE KEY UPDATE `iApplicationId`='".$data['iApplicationId']."',`iFeatureId`='".$data['iFeatureId']."',`vServiceCenterName`='".$data['vServiceCenterName']."',`tDescription`='".$data['tDescription']."',`vAdminEmail`='".$data['vAdminEmail']."',`iCurrencyId`='".$data['iCurrencyId']."',`vServiceTiming`='".$data['vServiceTiming']."'";
     	$query = $this->db->query($sql);
	}
	
	function insert_new_location($data){
		$input = array(
			'iApplicationId' => $data['iApplicationId'],
			'iAppTabId' => $data['iAppTabId'],
			'vLocationTitle' => $data['vLocationTitle'],
			'vAddress1' => $data['vAddress1'],
			'vAddress2' => $data['vAddress2'],
			'vCity' => $data['vCity'],
			'vState' => $data['vState'],
			'vZip' => $data['vZip'],
			'vWebsite' => $data['vWebsite'],
			'vEmail' => $data['vEmail'],
			'vTelephone' => $data['vTelephone'],
			'vLatitude' => $data['vLatitude'],
			'vLongitude' => $data['vLongitude'],
		);
		//$this->db->insert('r_app_reservation_location', $input);
		$this->db->insert('r_app_location_value',$input);
	//	echo $this->db->last_query(); exit();
		return $this->db->insert_id();
	}
	
	
	function get_general_info($iApplicationId){
		$this->db->select('');
		$this->db->where('iApplicationId',$iApplicationId);
		$this->db->from('r_app_reservation_general_info');
		
		$query = $this->db->get();
		if($query->num_rows() == '0'){
			return '0';
		}
		else{
			return $query->row_array();
		}
	}
	
	function get_locations($iApplicationId){
		$this->db->select('');
		$this->db->where('iApplicationId',$iApplicationId);
		$this->db->from('r_app_location_value');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_location_details_by_id($iLocationId){
		$this->db->select('');
		$this->db->where('iLocationId',$iLocationId);
		$this->db->from('r_app_location_value');
		$query = $this->db->get();
        return $query->row_array();
	}
	
	function update_location($data){
		$input = array(
			'iApplicationId' => $data['iApplicationId'],
			'iAppTabId' => $data['iAppTabId'],
			'vLocationTitle' => $data['vLocationTitle'],
			'vAddress1' => $data['vAddress1'],
			'vAddress2' => $data['vAddress2'],
			'vCity' => $data['vCity'],
			'vState' => $data['vState'],
			'vZip' => $data['vZip'],
			'vWebsite' => $data['vWebsite'],
			'vEmail' => $data['vEmail'],
			'vTelephone' => $data['vTelephone'],
			'vLatitude' => $data['vLatitude'],
			'vLongitude' => $data['vLongitude'],
		);
		$this->db->where('iLocationId',$data['iLocationId']);
		$this->db->update('r_app_location_value', $input);
		return $data['iLocationId'];
	}
	
	function delete_location($data){
		$this->db->where('iLocationId',$data['iLocationId']);
		$this->db->delete('r_app_location_value');
	}
	function get_service_details_by_id($iServiceId){
		$this->db->select('');
		$this->db->where('iServiceId',$iServiceId);
		$this->db->from('r_app_reservation_service');
		$query = $this->db->get();
        return $query->row_array();

	}
	//made by maksud for update service
	function update_service($data){
		
		$input = array(
			'iApplicationId' => $data['iApplicationId'],
			'iFeatureId' => $data['iFeatureId'],
			'iTabId' => $data['iTabId'],
			'vServiceName' => $data['vServiceName'],
			'vPrice' => $data['vPrice'],
			'vReservationFee' => $data['vReservationFee'],
			'vMaxService' => $data['vMaxService'],
			'iDuration' => $data['iDuration'],
			'vServiceTiming' => $data['vServiceTiming']
		);
		$this->db->where('iServiceId',$data['iServiceId']);
		$this->db->update('r_app_reservation_service', $input);
		return $data['iServiceId'];
	}
	function delete_service($data){
		$this->db->where('iServiceId',$data['iServiceId']);
		$this->db->delete('r_app_reservation_service');
	}
	
	function get_user_services($iUserId){
		$this->db->select('rarm.iReservationId, rarm.vDate, rarm.vTime, rarl.vAddress1, rars.vServiceName');
		
		$this->db->from('r_app_reservation_main as rarm');
		$this->db->join('r_app_reservation_service as rars','rarm.iServiceId=rars.iServiceId');
		$this->db->join('r_app_location_value as rarl','rarm.iLocationId=rarl.iLocationId');
		
		
		$this->db->where('rarm.iUserId',$iUserId);
		$query = $this->db->get();
		return $query->result_array();
	}
}

?>