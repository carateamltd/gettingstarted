<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
 	
    // change by mayurgajjar
    function get_homepage_details($iApplicationId,$iAppTabId,$iHometabId)
    { 
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('iHometabId',$iHometabId);
        $this->db->from('r_app_home_value');
        $query = $this->db->get();
        return $query->result_array(); 
    }

    function get_test($data){
        $mydata = $this->get_admin_id($data['vEmail']); // iAdminId
        $iAdminId = $mydata['iAdminId'];
        $tdata = $this->get_industry_id($data['packagename']);
        $iCategoryId = $tdata['iIndustryId'];

        /* get */
        $this->db->select('');
        $this->db->from('r_packages_value_paypal');
        $this->db->where('iAdminId',$iAdminId);
        $this->db->where('vCategoryId',$iCategoryId);
        $query = $this->db->get();
        return $query->result_array(); 
    }

    function get_admin_id($vEmail){
        $this->db->select('iAdminId');
        $this->db->where('vEmail', $vEmail);
        $this->db->from('r_administrator');
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_industry_id($packagename){
        $this->db->select('iIndustryId');
        $this->db->where('vTitle', $packagename);
        $this->db->from('r_appindustry');
        $query = $this->db->get();
        return $query->row_array();
    }
	
    function get_all_appinformation($iClientId,$iRoleId)
    {
        $this->db->select('');
        $this->db->where('iClientId', $iClientId);
        $this->db->from('r_appinformation');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_appinformation_id($iApplicationId,$iClientId,$iRoleId)
	{
	    $this->db->select('');
        $this->db->from('r_appinformation');
        $this->db->where('iApplicationId', $iApplicationId);
	    if($iRoleId>1){		  
		  $this->db->where('iClientId', $iClientId);
        }  
        $query = $this->db->get();
        return $query->row_array();
    }
	
    function update_appinformation($data,$iApplicationId){
        $this->db->where('iApplicationId', $iApplicationId);
        $query = $this->db->update("r_appinformation", $data);
        return $query;
    }
    
    function get_all_appindustry()
    {
        $this->db->select('');
        $this->db->where('eStatus', 'Active');
        $this->db->from('r_appindustry');
        $query = $this->db->get();
        return $query->result_array();
        // throw new Exception("Error Processing Request");
    }
	
	function update_home_openingtime($data,$iOpeningId){
		$this->db->where('iOpeningId', $iOpeningId);
		$query = $this->db->update("r_app_home_addopeningtime", $data);
		return $query;
	}

    function get_application_industry_features($iIndustryId,$iAdminId)
    {
        $this->db->select('vPackage');
        $this->db->where('vCategoryId', $iIndustryId);
        $this->db->where('iAdminId', $iAdminId);
        $this->db->from('r_packages_value_paypal');
        $this->db->order_by('iPackageId','DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function get_all_appindustryfeature($iIndustryId,$vPackage)
    {
        $this->db->select('');
        $this->db->where('ri.iIndustryId', $iIndustryId);
        $this->db->where('ri.'.$vPackage, 1);
        $this->db->from('r_appindustryfeature as ra');
	    $this->db->join('r_app_manage_industry as ri','ra.iFeatureId = ri.iFeatureId','left');
        $this->db->order_by('ra.iFeatureId');
        $query = $this->db->get();
        return $query->result_array();
    }
	
    /** save table details **/	
    function save($table,$Data)
    {    
        if($Data['iFeatureId']==7)
        {   
	    $iAppid = $Data['iApplicationId'];
            $this->db->select('iFeatureId');
            $this->db->where('iApplicationId',$iAppid);
            $this->db->where('iFeatureId',$Data['iFeatureId']);
            $this->db->from($table);
            $query = $this->db->get();
 
            if($query->num_rows() > 0)
            {
                return "Already Exsist";
            }
            else
            {
                $this->db->insert($table,$Data);
                return $this->db->insert_id();
            }
        }
        else
        {            
            $this->db->insert($table,$Data);
            return $this->db->insert_id();
        }
    }
	
    function get_specific_app_featureid($table,$id,$field)
    {
	    $this->db->select('');
        $this->db->where('iApplicationId',$id);
        $this->db->where('iFeatureId',$field);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    function get_featureid_by_appid($iApplicationId)
    {
       
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->from('r_appfeature');
        $query = $this->db->get();
        return $query->result_array();
    }
	
    function update_gappfeature($iAppTabId,$Data){
         $this->db->where('iAppTabId', $iAppTabId);
        $query = $this->db->update("r_appfeature", $Data);
        return $query;
    }
	
    /*}
     function get_featureid_by_appid_status($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('eActive','Yes');
        $this->db->from('r_appfeature');
        $query = $this->db->get();
        return $query->result_array();
    }*/
    
    function get_all_appindustryfeature_by_featureid($iFeatureId)
    {
        $this->db->select('');
        $this->db->where_in('iFeatureId', $iFeatureId);
        $this->db->from('r_appindustryfeature');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // mayur gajjar
    function get_featurefields($iFeatureId)
	{
        //echo $iFeatureId;exit;
        $this->db->select('');
        $this->db->where('iFeatureId', $iFeatureId);
        $this->db->where('eStatus', 'active');
	    $this->db->from('r_featurefields');
        $query = $this->db->get();
        return $query->result_array();
    }

	function get_appfeature($iApplicationId)
	{
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->from('r_appfeature');
        $query = $this->db->get();
        return $query->result_array();
	}

    function update_appfeaturevalue($data,$iAppId)
	{
        $this->db->where('iAppId', $iAppId);
        $query = $this->db->update("r_appfeaturevalue", $data);
        return $query;
    }	
	
    function update_slb_appfeature($iAppTabId,$Data){	   
	    $this->db->where('iAppTabId', $iAppTabId);
        $query = $this->db->update("r_appfeature", $Data);
        return $query;
    }
	
    function delete_all($id,$table) {
		//echo $id;exit;
        $this->db->where('iApplicationId',$id);
        $this->db->delete($table);
    }    

    function delete_tab_related_data($iApplicationId,$iAppTabId,$table) {
		
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->delete($table);
    }
	    
    function delete_sorttab_related_data($iApplicationId) 
	{
	    $this->db->where('iApplicationId',$iApplicationId);
        $this->db->delete('r_sorttab');
    } 

   function get_all_appindustryfeature_data($iIndustryId)
    {
        $this->db->select('*');
        if($iIndustryId != ""){
            $this->db->where('iIndustryId',$iIndustryId);
        }
        $this->db->from('r_appindustryfeature');
        $this->db->order_by('vTitle asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    /*function get_all_appindustryfeature_data($iIndustryId)
    {
        $this->db->select('*');
        $this->db->from('r_app_manage_industry rm');
	    $this->db->join('r_appindustryfeature as ra','rm.iFeatureId=ra.iFeatureId','inner');
        if($iIndustryId != ""){
            $this->db->where('rm.iIndustryId',$iIndustryId);
        }
        $this->db->order_by('vTitle asc');
        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_exist_appfeature_data($iAppTabId)
    {
	/*  
		$this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_appfeature');
        $query = $this->db->get();
        return $query->result_array();
	*/

        $this->db->select('saf.iAppTabId,saf.iApplicationId,saf.iFeatureId,saf.iIconId,saf.eCustom,saf.vTitle,saif.vTitle as ovTitle,saf.eActive');
        $this->db->where('saf.iAppTabId',$iAppTabId);
        $this->db->from('r_appfeature` AS saf');
        $this->db->join('r_appindustryfeature AS saif','saf.iFeatureId =saif.iFeatureId','LEFT');        
        $query = $this->db->get();
        return $query->result_array();
    }

 	/* function get_one_appfeature_data($iAppTabId)

		$this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_appfeature');
        $query = $this->db->get();
        return $query->result_array();
	}*/

    function update_appfeature($data,$iAppTabId)
    {
	    $this->db->where('iAppTabId', $iAppTabId);
        $query = $this->db->update("r_appfeature", $data);
        return $query;
    }	

    function get_all_tabcustomicon()
    {
        $this->db->select('');
        $this->db->from('r_tabcustomicon');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_one_tabcustomicon($iTabcustomiconId)
    {
        $this->db->select('');
        $this->db->where('iTabcustomiconId',$iTabcustomiconId);
        $this->db->from('r_tabcustomicon');
        $query = $this->db->get();
        return $query->row_array();
    } 
    
    function update_iconmaster($data,$iIconId)
    {
        $this->db->where('iIconId', $iIconId);
        $query = $this->db->update("r_iconmaster", $data);
        // return $this->db->affected_rows(); 
        return $query;
    }
	
    function get_one_appindustryfeature($iIconId)
    {
	$this->db->select('');
    	$this->db->where('iIconId', $iIconId);
	$this->db->from('r_appindustryfeature');
	$query = $this->db->get();
    	return $query->row_array();
    }    

    function get_one_iconmaster($iIconId)
    {
		$this->db->select('');
        $this->db->where('iIconId', $iIconId);
		$this->db->from('r_iconmaster');
		$query = $this->db->get();
        return $query->row_array();
    }

    function get_one_sorttab($iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_sorttab');
        $query = $this->db->get();
        return $query->row_array();
    } 
 
    function update_sorttab($data,$iSorttabId)
    {
        $this->db->where('iSorttabId', $iSorttabId);
        $query = $this->db->update("r_sorttab", $data);
        // return $this->db->affected_rows(); 
        return $query;
    }
    
    function get_sorttab_order($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->order_by('iOrderId asc');
        $this->db->from('r_sorttab');
        $query = $this->db->get();
        return $query->result_array();
    }
    
	function get_one_user_tabbackground($iAppTabId,$eType)
    {
        $this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eType',$eType);
        $this->db->from('r_user_tabbackground');
        $query = $this->db->get();
        return $query->row_array();
    }    
	
    function get_one_tabbackground($iBackgroundId)
    {
        $this->db->select('');
        $this->db->where('iBackgroundId',$iBackgroundId);
        $this->db->from('r_tabbackground');
        $query = $this->db->get();
        return $query->row_array();
    } 

    function update_user_tabbackground($data,$iUserTabBackImgId)
    {
        $this->db->where('iUserTabBackImgId', $iUserTabBackImgId);
        $query = $this->db->update('r_user_tabbackground', $data);
        return $query;
    }

    function update_tabbackground($data,$iBackgroundId)
    {

        $this->db->where('iBackgroundId', $iBackgroundId);
        $query = $this->db->update("r_tabbackground", $data);
        return $query;
    }
    
    function user_background_image($iUserTabBackImgId) {
		
        $this->db->where('iUserTabBackImgId',$iUserTabBackImgId);
        $this->db->delete('r_user_tabbackground');
    }
    
    function saveBackgroundSetting($Data) {
       $this->db->insert('r_user_tabbackground',$Data);
       return $this->db->insert_id();

    }
	
    function deleteData($Data,$table) {	   
	   $this->db->where('eType',$Data['eType']);
	   $this->db->where('iBackgroundimgId',$Data['iBackgroundimgId']);
        $this->db->where('iApplicationId',$Data['iApplicationId']);
        $this->db->delete($table);
    }    

    
    function getBackGroundId($id,$eTypes){	   
	   $this->db->select('');
	   $this->db->from('r_user_tabbackground');
	   $this->db->where('iApplicationId',$id);
	   $data=$this->db->get()->row_array();	   
	   return $data;
    }
	
    function getSelectedTabs($id,$eTypes){	   
	   $this->db->select('iAppTabId');
	   $this->db->from('r_user_tabbackground');
	   $this->db->where('iApplicationId',$id);
	   $this->db->where('eType',$eTypes);
	   $data=$this->db->get()->result_array();	   
	   return $data;   
    }
    
    function appTabByImageId($iBackgroundId,$eTypes){
	   
	   $this->db->select('iAppTabId');
	   $this->db->from('r_user_tabbackground');
	   $this->db->where('iBackgroundimgId',$iBackgroundId);
	   $this->db->where('eType',$eTypes);
	   $data=$this->db->get()->result_array();	   
	   return $data;   
    }
    
    function getAppImages($iApplicationId,$eTypes){
	   $this->db->select('si.*,st.*');
	   $this->db->where('si.iApplicationId',$iApplicationId);
       if($eTypes != ""){
	       $this->db->where('si.eType',$eTypes);
        }
	   
	   $this->db->from('r_app_background_img as si');
	   $this->db->join('r_tabbackground as st','st.iBackgroundId=si.iBackgroundId');	   
	   $data=$this->db->get()->result_array();	   
	   return $data; 
	   
    }
    function deleteAppImages($iApplicationId) {	   	   
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->delete('r_app_background_img');
    }
    
    function getTabName($iAppTabId){	   
	   $this->db->select('vTitle');
	   $this->db->from('r_appfeature');
	   $this->db->where('iAppTabId',$iAppTabId);
	   $data=$this->db->get()->row();	   
	   return $data;   
	   
    }
    
    function deleteTabData($iApplicationId,$iAppTabId,$eType){	   
	   $this->db->where('eType',$eType);
	   $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->delete('r_user_tabbackground');
    }
    
    function saveButtonImg($Data,$table){
	   $this->db->insert($table,$Data);
	   return $this->db->insert_id();	   
    }
    
     function updateimgData($data,$iBtntabbackgroundId,$fieldName,$table){
        $this->db->where($fieldName, $iBtntabbackgroundId);
        $query = $this->db->update($table, $data);
        return $query;
    }
    function getAllButtonImg($admin_data){
	   $this->db->select('');	   
	   $this->db->from('r_buttons_tab_background');	   
	   $this->db->where('eStatus', 'Active');
	   $this->db->where_in('iAdminId',$admin_data);
	   $this->db->order_by('iBtntabbackgroundId', 'DESC');
	   $query = $this->db->get();
	   return $query->result_array();
    }
    
    function getAllHeaderImg($iAdminId){
	   $this->db->select('');	   
	   $this->db->from('r_lunch_header');
	   $this->db->where('iAdminId',$iAdminId);
	   $this->db->where('eStatus', 'Active');
	   $this->db->order_by('iLunchheaderId', 'DESC');
	   $query = $this->db->get();
	   return $query->result_array();	   
    }
    
    function allSubTabData($iApplicationId){
	   $this->db->select('st.*,si.vImage');	   
	   $this->db->from('r_sutabs as st');
	   $this->db->join('r_iconmaster as si','si.iIconId=st.iIconId','LEFT');
	   $this->db->where('st.iApplicationId',$iApplicationId);	   
	   $this->db->order_by('st.iSubTabId', 'DESC');
	   $query = $this->db->get();
	   return $query->result_array();	   	   
    }
    
/* 
Modified by : Nizam Kadri
Modified date : 26/05/2014
Purpose : to get Sort Client Name (Updated Function : allClientList())
*/

    function allClientList(){
	   $this->db->select('');	   
	   $this->db->from('r_administrator');
       $this->db->order_by('vFirstName','asc');
	   $this->db->where('iRoleId',2);
       $this->db->where('eStatus','Active');
	   $query = $this->db->get();
	   return $query->result_array();	  
	   
    }
    function subDataById($iSubTabId){
	   $this->db->select('');	   
	   $this->db->from('r_sutabs');	   
	   $this->db->where('iSubTabId',$iSubTabId);
	   $query = $this->db->get();
	   return $query->row_array();	   	   
    }
    
    function update_appsubTab($iSubTabId,$Data){
	   $this->db->where('iSubTabId', $iSubTabId);
        $query = $this->db->update("r_sutabs",$Data);
        return $query;   
    }
    function deleteSubTab($iSubTabId) {		
        $this->db->where('iSubTabId',$iSubTabId);
        $this->db->delete('r_sutabs');
    }
    
    function delete($iApplicationId,$iAppTabId){
	   $this->db->where('iAppTabId',$iAppTabId);
	   $this->db->where('iApplicationId',$iApplicationId);
	   $this->db->delete('r_appfeaturevalue');
    }    

    function appinformation_by_id($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->from('r_appinformation');
        $query = $this->db->get();
        return $query->row_array();
    }
    
	/*    
	function getall_location(){
	   $this->db->select('iAppId,iApplicationId,iAppTabId');        
        $this->db->from('r_appfeaturevalue');
        $query = $this->db->get();
        return $query->result_array();
    }*/

    //Description: Check application is already exists
    function check_app($app,$client)
    {
        $this->db->select('');
        $this->db->from('r_appinformation');
        $this->db->where('tAppName',$app);
        $this->db->where('iClientId',$client);
        $query=$this->db->get();
        return $query->num_rows();

    }
    function checkappdesign_info($iApplicationId){
        $this->db->select('iAppDesignInfoId');        
        $this->db->from('r_app_design_ifo');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function updateappdesign_info($iApplicationId,$data){
        $this->db->where('iApplicationId', $iApplicationId);
        $query = $this->db->update("r_app_design_ifo", $data);
        return $query;        
    }
    function insertappdesign_info($data){
        $this->db->insert("r_app_design_ifo",$data);
        return $this->db->insert_id();        
    }
    
    function getallappdesignInfo($iApplicationId){
        $this->db->select('*');	   
        $this->db->from('r_app_design_ifo');
        $this->db->where('iApplicationId', $iApplicationId);  
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function deleteAppBgImage($iApplicationId,$iBackgroundId,$App_type) {
	   $this->db->where('iApplicationId',$iApplicationId);
       $this->db->where('iBackgroundId',$iBackgroundId);
	   $this->db->where('eType',$App_type);
       $this->db->delete('r_app_background_img');
    }
    
    function deleteSubTabData($iApplicationId,$iBackgroundId,$App_type){	   
	   $this->db->where('eType',$App_type);
	   $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iBackgroundimgId',$iBackgroundId);
        $this->db->delete('r_user_tabbackground');
    }
    
    function selectedBgImgId($id,$eTypes){
	    $this->db->select('iBackgroundId');	   
        $this->db->from('r_app_background_img');
        $this->db->where('iApplicationId', $id);
	    $this->db->where('eType',$eTypes);  
        $query = $this->db->get();
        return $query->result_array();	   
    }
    
    function get_appwise_events($iApplicationId,$iAppTabId){
        $this->db->select('iEventId,iApplicationId,iAppTabId,vTitle,dStartDate,vStartTime,dEndDate,vEndTime');
        $this->db->from('r_app_event_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by('iEventId', 'DESC');
        $query = $this->db->get();
        return $query->result_array();	   
    }
    function all_tabbackground($AdminId_array){
	   $this->db->select('');
	   $this->db->where('eStatus', 'Active');	   
	   $this->db->where_in('iAdminId', $AdminId_array);
	   $this->db->order_by('iBackgroundId','DESC');
	   $this->db->from('r_tabbackground');   
	   $query = $this->db->get();
	   return $query->result_array();
    }    

    function get_appwise_locations($iApplicationId,$iAppTabId){
        $this->db->select('iLocationId,iApplicationId,iAppTabId, vWebsite, vEmail, vTelephone, vAddress1, vAddress2, vCity, vState, vZip, vLatitude, vLongitude, vLookupAddress');
        $this->db->from('r_app_location_value');
        $this->db->where('iApplicationId',$iApplicationId);
    //  $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_one_user_appbackground($iAppTabId,$eType){
        $this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eType',$eType);
        $this->db->from('r_app_background_img');
        $query = $this->db->get();
        return $query->row_array();
    }   

    function update_appbackground($data,$iAppBackgroundId){
        $this->db->where('iAppBackgroundId',$iAppBackgroundId);
        $query = $this->db->update('r_app_background_img', $data);
        return $query;
    }

    function deleteTabImages($iApplicationId,$iAppTabId,$App_type) {
	   $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iBackgroundId);
	   $this->db->where('eType',$App_type);
        $this->db->delete('r_app_background_img');
    }

    function save_event($Data){
		$this->db->insert("r_app_event_values", $Data);
		return $this->db->insert_id();
	}
    
    function update_event($Data,$iEventId){
		$this->db->where('iEventId', $iEventId);
        $query = $this->db->update("r_app_event_values", $Data);
        return $query;
	}

    function get_appwise_news($iApplicationId,$iAppTabId){
        $this->db->select('iNewsId, iApplicationId,iAppTabId, eGoogleNews, vGoogleNewsKeyWords, eTweets, vTweetsKeyWords');
        $this->db->from('r_app_news_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_news($data,$iNewsId){
        $this->db->where('iNewsId', $iNewsId);
        $query = $this->db->update("r_app_news_value", $data);
        return $query;
    }

    function update_mailinglist($data,$iMailinglistId){
        $this->db->where('iMailinglistId', $iMailinglistId);
        $query = $this->db->update("r_app_mailinglist_value", $data);
        return $query;
    }

    function delete_events($iEventId){
        $this->db->where('iEventId',$iEventId);
        $query = $this->db->delete('r_app_event_values', $where);
		return $query;
    }
    
    function geteventinfo($iEventId){
        $this->db->select('ev.*,sa.iFeatureId');
        $this->db->from('r_app_event_values AS ev');
        $this->db->join('r_appfeature AS sa','ev.iAppTabId = sa.iAppTabId');
         $this->db->where('iEventId',$iEventId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_appwise_mailinglist($iApplicationId,$iAppTabId){
        $this->db->select('iMailinglistId, iApplicationId,iAppTabId, tDescription, ePromptOption, eAutomatic,vApikey,vListid');
        $this->db->from('r_app_mailinglist_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_appwise_rss($iApplicationId,$iAppTabId){
        $this->db->select('iRSSId, iApplicationId,iAppTabId, vRSSURL, vIcon');
        $this->db->from('r_app_rss_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_rss($data,$iRSSId){
        $this->db->where('iRSSId', $iRSSId);
        $query = $this->db->update("r_app_rss_value", $data);
        return $query;
    }

    function get_appwise_youtube($iApplicationId,$iAppTabId){
        $this->db->select('iYoutubeId, iApplicationId,iAppTabId, vChannelName, tDescription');
        $this->db->from('r_app_youtube_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_youtube($data,$iYoutubeId){
        $this->db->where('iYoutubeId', $iYoutubeId);
        $query = $this->db->update("r_app_youtube_value", $data);
        return $query;
    }

    function get_youtube_by_id($iRSSId){
        $this->db->select('iRSSId, iApplicationId, vRSSURL, vIcon');
        $this->db->from('r_app_rss_value');
        $this->db->where('iRSSId',$iRSSId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getEventImageName($iEventId){
	   $this->db->select('vImage,vHeaderImage');
        $this->db->from('r_app_event_values');
        $this->db->where('iEventId',$iEventId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getRssImageName($iRSSId){
	   $this->db->select('vIcon');
        $this->db->from('r_app_rss_value');
        $this->db->where('iRSSId',$iRSSId);
        $query = $this->db->get();
        return $query->row_array();
	   
    }    
    
    function deleteImageName($iEventId){   
	   $data['vImage'] = '';
	   $this->db->where('iEventId', $iEventId);
	   return $this->db->update('r_app_event_values', $data);
	   
    }

    function deleteHeaderImageName($iEventId){   
       $data['vHeaderImage'] = '';
       $this->db->where('iEventId', $iEventId);
       return $this->db->update('r_app_event_values', $data);
       
    }
    
    function deleteRssImageName($iRSSId){   
	   $data['vIcon'] = '';
	   $this->db->where('iRSSId', $iRSSId);
	   return $this->db->update('r_app_rss_value', $data);
	   
    }
    
    function get_appwise_infotabdata($iApplicationId,$iAppTabId){
         $this->db->select('iInfotabId, iApplicationId,iAppTabId, vTitle,tDescription, eStatus');
        $this->db->from('r_app_infotab_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function save_info($Data){
        $this->db->insert("r_app_infotab_values", $Data);
        return $this->db->insert_id();
    }
    
    function update_info($Data,$iInfotabId ){
        $this->db->where('iInfotabId ', $iInfotabId );
        $query = $this->db->update("r_app_infotab_values", $Data);
        return $query;
    }
  /* Create new function*/
    function checkpdf($file,$PdfTitle,$iApplicationId)
    {
        $this->db->select('iPdfId');
        $this->db->from('r_app_pdf_values');
        $this->db->where('vPdfFile',$file);
        $this->db->where('iAppTabId',$iApplicationId);
        $this->db->where('vPdfTitle',$PdfTitle);
        $query=$this->db->get();
        return $query->num_rows();
    }
   
    function checkAVLpdf($PdfTitle,$vOldFile,$iApplicationId)
    {
        $this->db->select('');
        $this->db->from('r_app_pdf_values');
        $this->db->where('vPdfTitle',$PdfTitle);
        $this->db->where('vPdfFile',$vOldFile);
        $this->db->where('iAppTabId',$iApplicationId);
        $query=$this->db->get();
        return $query->num_rows();
    }

    function get_appwise_pdfs($iApplicationId,$iAppTabId)
    {
        $this->db->select('iPdfId,iApplicationId,iAppTabId,vPdfTitle, vPdfFile, vPdfUrl,eFileType');
        $this->db->from(' r_app_pdf_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by("iPdfId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function save_pdf($Data)
    {
        $this->db->insert("r_app_pdf_values", $Data);
		return $this->db->insert_id();
    }
    
    function update_pdf($Data,$iPdfId)
    {
		$this->db->where('iPdfId', $iPdfId);
        $query = $this->db->update("r_app_pdf_values", $Data);
        return $query;
	}
    
    function delete_pdf($iPdfId)
    {
        $this->db->where('iPdfId',$iPdfId);
        $query = $this->db->delete('r_app_pdf_values', $where);
		return $query;
    }

    function getpdfinfo($iPdfId)
    {
        $this->db->select('sapv.iPdfId, sapv.iApplicationId, sapv.iAppTabId, sapv.vPdfTitle, sapv.vPdfFile, sapv.vPdfUrl,sapv.eFileType, sa.iFeatureId');
        $this->db->from('r_app_pdf_values AS sapv');
        $this->db->join('r_appfeature AS sa','sapv.iAppTabId = sa.iAppTabId');
        $this->db->where('sapv.iPdfId',$iPdfId);
        $query = $this->db->get();    
        return $query->row_array();
    }

     function save_loc($Data){
        $this->db->insert("r_app_location_value", $Data);
        return $this->db->insert_id();
    }  
    function delete_location($iLocationId){
        $this->db->where('iLocationId',$iLocationId);
        $query = $this->db->delete('r_app_location_value', $where);
        return $query;
    }    
    function getlocinfo($iLocationId){
       $this->db->select('lo.iLocationId,lo.iApplicationId,lo.iAppTabId,lo.vWebsite, lo.vEmail, lo.vTelephone, lo.vAddress1, lo.vAddress2, lo.vCity, lo.vState, lo.vZip, lo.vLatitude, lo.vLongitude, lo.vLookupAddress,lo.vLocationTitle,sa.iFeatureId');
        $this->db->from('r_app_location_value AS lo');
        $this->db->join('r_appfeature AS sa','lo.iAppTabId = sa.iAppTabId');
        $this->db->where('lo.iLocationId',$iLocationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    function update_location($Data,$iLocationId){
        $this->db->where('iLocationId', $iLocationId);
        $query = $this->db->update("r_app_location_value", $Data);
        return $query;
    }
    function get_appwise_websites($iApplicationId,$iAppTabId){
        $this->db->select('iWebsiteId,iApplicationId, iAppTabId, vWebTitle,vWebUrl,eDonation,vWebImage');
        $this->db->from('r_app_website_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by("iWebsiteId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    function save_website($Data){
        $this->db->insert("r_app_website_values", $Data);
        return $this->db->insert_id();
    }
    function update_website($Data,$iWebsiteId){
        $this->db->where('iWebsiteId', $iWebsiteId);
        $query = $this->db->update("r_app_website_values", $Data);
        return $query;
    } 
	
	function update_home_img($Data,$iHomeId){
		$this->db->where('iHometabId', $iHomeId);
        $query = $this->db->update("r_app_home_value", $Data);
        return $query;
	}
	
    function delete_website($iWebsiteId){
        $this->db->where('iWebsiteId',$iWebsiteId);
        $query = $this->db->delete('r_app_website_values', $where);
        return $query;
    }    
    function getwebsiteinfo($iWebsiteId){
       $this->db->select('w.iWebsiteId, w.iApplicationId, w.iAppTabId, w.vWebTitle,w.vWebUrl,w.eDonation,w.vWebImage,sa.iFeatureId');
        $this->db->from('r_app_website_values AS w');
        $this->db->join('r_appfeature AS sa','w.iAppTabId = sa.iAppTabId');
        $this->db->where('w.iWebsiteId',$iWebsiteId);
        $query = $this->db->get();
        return $query->row_array();
    }
	
	
	function gethomeinfo($iHomeId){
       $this->db->select('w.*,sa.iFeatureId');
        $this->db->from('r_app_home_value AS w');
        $this->db->join('r_appfeature AS sa','w.iAppTabId = sa.iAppTabId');
        $this->db->where('w.iHometabId',$iWebsiteId);
        $query = $this->db->get();
        return $query->row_array();
    }
	
    // Create menu tab for maksud
    function save_menu($Data){
        $this->db->insert("r_menu_catagory", $Data);
        return $this->db->insert_id();
    }
    function get_appwise_menu($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_menu_catagory');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->order_by("iMenuID", "desc");
        $this->db->where('vStatus','Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getmenuinfo($iMenuID){
        $this->db->select('menu.iMenuID, menu.vName, menu.iApplicationId, menu.iAppTabId,menu.vStatus,sa.iFeatureId,menu.vImage');
        $this->db->from('r_menu_catagory AS menu');
        $this->db->join('r_appfeature AS sa','menu.iAppTabId = sa.iAppTabId');
        $this->db->where('menu.iMenuID',$iMenuID);
        $query = $this->db->get();
        return $query->row_array();
    }

    function getcataloguemaininfo($iCatalogueMainId){
        $this->db->select('');
        $this->db->from('r_app_catalogue_main AS catmain');
        $this->db->join('r_appfeature AS sa','catmain.iAppTabId = sa.iAppTabId');
        $this->db->where('catmain.iCatalogueMainId',$iCatalogueMainId);
        $query = $this->db->get();
        return $query->row_array();

    }

    function delete_menu($iMenuID){
        $this->db->where('iMenuID',$iMenuID);
        $query = $this->db->delete('r_menu_catagory', $where);
        return $query;
    }

    function delete_catalogue_main($iCatalogueMainId){
        $this->db->where('iCatalogueMainId',$iCatalogueMainId);
        $query = $this->db->delete('r_app_catalogue_main', $where);
        return $query;
    }

    function get_subcatalogue_list($iCatalogueSubId)
    {
        $this->db->select('');
        $this->db->from('r_app_catalogue_sub_catagory');
        $this->db->where('iCatalogueSubId',$iCatalogueSubId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_menu($Data,$iMenuID){
        $this->db->where('iMenuID', $iMenuID);
        $query = $this->db->update("r_menu_catagory", $Data);
        return $query;
    }

   
   // create social tab from maksud
    function get_appwise_social($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_socialmedia_value');
        $this->db->where('iApplicationId',$iApplicationId);
        
        $this->db->order_by("iSocialMediaID", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    function save_social($Data){
        $this->db->insert("r_app_socialmedia_value", $Data);
        return $this->db->insert_id();
    }
    function delete_social($iSocialMediaID){
        $this->db->where('iSocialMediaID',$iSocialMediaID);
        $query = $this->db->delete('r_app_socialmedia_value', $where);
        return $query;
    }
    function update_social($Data,$iSocialMediaID){
        $this->db->where('iSocialMediaID', $iSocialMediaID);
        $query = $this->db->update("r_app_socialmedia_value", $Data);
        return $query;
    }  
    function getsocialinfo($iSocialMediaID){
       $this->db->select('s.iSocialMediaID, s.vName, s.iApplicationId, s.iAppTabId,s.vUrl,sa.iFeatureId');
        $this->db->from('r_app_socialmedia_value AS s');
        $this->db->join('r_appfeature AS sa','s.iAppTabId = sa.iAppTabId');
        $this->db->where('s.iSocialMediaID',$iSocialMediaID);
        $query = $this->db->get();
        return $query->row_array();
    }
     // create new Qr code from maksud
    function save_qrcoupon($Data){
        $this->db->insert("r_app_qrcode_values", $Data);
        return $this->db->insert_id();
    }
    function update_qrcoupon($Data,$iQrID){
        $this->db->where('iQrID', $iQrID);
        $query = $this->db->update("r_app_qrcode_values", $Data);
        return $query;
    }
    function get_appwise_qrcoupon($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_qrcode_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by('iQrID','desc');
        $query = $this->db->get();
        return $query->result_array();

    }
    function getqrcouponinfo($iQrID){
        $this->db->select('q.*,sa.iFeatureId');
        $this->db->from('r_app_qrcode_values AS q');
        $this->db->join('r_appfeature AS sa','q.iAppTabId = sa.iAppTabId');
         $this->db->where('iQrID',$iQrID);
        $query = $this->db->get();
        return $query->row_array();
    }
	
    function delete_qrcoupon($iQrID){
        $this->db->where('iQrID',$iQrID);
        $query = $this->db->delete('r_app_qrcode_values',$where);
        return $query;
    }
	
    function getQRImageName($iQrID){
       $this->db->select('vMobileHeaderImage,vTabletHeaderImage');
        $this->db->from('r_app_qrcode_values');
        $this->db->where('iQrID',$iQrID);
        $query = $this->db->get();
        return $query->row_array();
    }
	
    function deleteHeaderImageNames($iQrID){   
       $data['vMobileHeaderImage'] = '';
       $this->db->where('iQrID', $iQrID);
       return $this->db->update('r_app_qrcode_values', $data);
       
    }
                   
    function get_appwise_voicerecordtabdata($iApplicationId,$iAppTabId){
         $this->db->select('iVoiceRecordingId, iApplicationId,iAppTabId, tVoiceDescription,vVoiceEmail, vVoiceSubject');
        $this->db->from('r_app_voice_recording_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    function save_voicerecord($Data){
        $this->db->insert("r_app_voice_recording_values", $Data);
        return $this->db->insert_id();
    }
    
    function update_voicerecord($Data,$iVoiceRecordingId ){
        $this->db->where('iVoiceRecordingId ', $iVoiceRecordingId );
        $query = $this->db->update("r_app_voice_recording_values", $Data);
        return $query;
    }
    function get_podcast_by_id($iPodcastId){
        $this->db->select('iPodcastId, iApplicationId,iAppTabId, vPodcastRssUrl, vPodcastIcon');
        $this->db->from('r_app_podcast_values');
        $this->db->where('iPodcastId',$iPodcastId);
        $query = $this->db->get();
        return $query->row_array();
    } 
	
    function update_podcast($data,$iPodcastId){
        $this->db->where('iPodcastId', $iPodcastId);
        $query = $this->db->update("r_app_podcast_values", $data);
        return $query;
    }
	
    function get_appwise_podcasttabdata($iApplicationId,$iAppTabId){
         $this->db->select('iPodcastId, iApplicationId,iAppTabId, vPodcastRssUrl, vPodcastIcon');
        $this->db->from('r_app_podcast_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_one_app_slideimg($iApplicationId){
        $this->db->select('*');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->from('r_app_slider_img_value');
        $query = $this->db->get();
        return $query->row_array();
    }  

    function update_slide_img($data,$iAppSliderImgId){
        $this->db->where('iAppSliderImgId', $iAppSliderImgId);
        $query = $this->db->update("r_app_slider_img_value", $data);
        return $query;
    }
	
    function get_default_designInfo($iTemplateId)
	{
        $this->db->select('*');
        $this->db->where('iTemplateId',$iTemplateId);
        $this->db->from('r_default_template');
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_appwise_mailingcategory($iApplicationId,$iAppTabId)
	{
        $this->db->select('smc.iMailcategoryId, smc.iApplicationId,smc.iAppTabId, smc.vName,count(sn.iCategoryId) AS iSubscribers');
        $this->db->from('r_app_mailing_category AS smc');
        $this->db->join('r_app_newletter AS sn','smc.iMailcategoryId =sn.iCategoryId','LEFT');      
        $this->db->where('smc.iApplicationId',$iApplicationId);
        $this->db->where('smc.iAppTabId',$iAppTabId);
        $this->db->group_by('smc.vName');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_one_app_mailingcategory($iMailcategoryId)
	{
        $this->db->select('smc.iMailcategoryId, smc.iApplicationId,smc.iAppTabId, smc.vName,count(sn.iCategoryId) AS iSubscribers');
        $this->db->from('r_app_mailing_category AS smc');
        $this->db->join('r_app_newletter AS sn','smc.iMailcategoryId =sn.iCategoryId','LEFT');      
        $this->db->where('iMailcategoryId',$iMailcategoryId);
        $this->db->group_by('smc.vName');
        $query = $this->db->get();
        return $query->row_array();        
    }

    function update_mailingcategory($data,$iMailcategoryId){
        $this->db->where('iMailcategoryId', $iMailcategoryId);
        $query = $this->db->update("r_app_mailing_category", $data);
        return $query;
    }

    function delete_mailing_category($iMailcategoryId)
	{
        $this->db->where('iMailcategoryId',$iMailcategoryId);
        $query = $this->db->delete('r_app_mailing_category', $where);
        return $query;
    }

    #get fee details
    function get_fee_details($iClientId){ 
        $this->db->select('');
        $this->db->from('r_client_fee_type');
        $this->db->where('iClientId', $iClientId);      
        $query = $this->db->get();
        return $query->result_array();
    }

    #get one fee details details
    function get_one_fee_details($iFeetypeId)
    { 
        $this->db->select('');
        $this->db->from('r_client_fee_type');
        $this->db->where('iFeetypeId', $iFeetypeId);      
        $query = $this->db->get();
        return $query->row_array();
    }    
	
	#Delete all feetype info useing Application Id
    function delete_app_feetype_value($iApplicationId){
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->delete('r_app_feetype_value', $where);
        return $query;
    }

    function get_all_feetype_value_by_app($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_feetype_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    // function get_appwise_hometabdata($iApplicationId,$iAppTabId)
	//	{
    //      $this->db->select('iHometabId, iApplicationId,iAppTabId, tDescription');
    //     $this->db->from('r_app_home_value');
    //     $this->db->where('iApplicationId',$iApplicationId);
    //     $this->db->where('iAppTabId',$iAppTabId);
    //     $query = $this->db->get();
    //     return $query->row_array();
    // }
	
	// mayur gajjar
    function get_appwise_hometabdata($iApplicationId,$iAppTabId){
         $this->db->select('');
        $this->db->from('r_app_home_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function save_home_openingtime($Data)
	{
        $this->db->insert("r_app_home_addopeningtime",$Data);
        return $this->db->insert_id();
    }

    function get_appwise_openingtimedetails($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_home_addopeningtime AS smc');
        $this->db->where('smc.iApplicationId',$iApplicationId);
        $this->db->where('smc.iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    function delete_opening_time($iOpeningId){
        $this->db->where('iOpeningId',$iOpeningId);
        $query = $this->db->delete('r_app_home_addopeningtime', $where);
        return $query;
    }

    function save_home($Data){
	$this->db->insert("r_app_home_value", $Data);
        return $this->db->insert_id();
    }
    
   function update_home($Data,$iHometabId)
   {
	$this->db->where('iHometabId', $iHometabId);
        $query = $this->db->update("r_app_home_value", $Data);
        return $query;
   }

    //updated by minakshi on 21th Apr 2014
    function get_assign_tab_by_backgroundid($iBackgroundimgId)
    {
        $this->db->select('sa.vTitle');
        $this->db->from('r_user_tabbackground AS sut');
        $this->db->join('r_appfeature AS sa','sut.iAppTabId =sa.iAppTabId','LEFT');      
        $this->db->where('sut.iBackgroundimgId',$iBackgroundimgId);
        $query = $this->db->get();
        return $query->result_array();        
    }

//Gallery
    function update_gallery($data,$iGalleryId)
	{
        $this->db->where('iGalleryId', $iGalleryId);
        $query = $this->db->update("r_app_gallery_value", $data);
        return $query;
    }
	
    function get_appwise_gallery($iApplicationId,$iAppTabId)
	{
        $this->db->select('gi.iGalleryImageId, gi.tDescription,gi.vGalleryImage,g.iApplicationId');
        $this->db->from('r_app_gallery_images AS gi');
        $this->db->join('r_app_gallery_value AS g','g.iGalleryId =gi.iGalleryId','LEFT');  
        $this->db->where('g.iApplicationId',$iApplicationId);
        $this->db->where('g.iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_one_gallery_details($iAppTabId){ 
        $this->db->select('');
        $this->db->from('r_app_gallery_value');
        $this->db->where('iAppTabId', $iAppTabId);      
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function update_gallery_image($data,$iGalleryImageId){
        $this->db->where('iGalleryImageId', $iGalleryImageId);
        $query = $this->db->update("r_app_gallery_images", $data);
        return $query;
    }
    function delete_gallery_image($iGalleryImageId){
        $this->db->where('iGalleryImageId',$iGalleryImageId);
        $query = $this->db->delete('r_app_gallery_images', $where);
        return $query;
    }        

    function get_one_tabwise_glbval($iAppTabId){ 
        $this->db->select('');
        $this->db->from('r_app_tabwise_global_value');
        $this->db->where('iAppTabId', $iAppTabId);      
        $query = $this->db->get();
        return $query->row_array();
    }
    function update_tabwise_glbval($Data,$iTabGlobalValue ){
        $this->db->where('iTabGlobalValue ', $iTabGlobalValue );
        $query = $this->db->update("r_app_tabwise_global_value", $Data);
        return $query;
    }
    function update_twotire_value($Data,$iTwotireInfotabId ){
        $this->db->where('iTwotireInfotabId ', $iTwotireInfotabId );
        $query = $this->db->update("r_app_twotire_infotab_values", $Data);
        return $query;
    }
    function get_appwise_twotiretabdata($iApplicationId,$iAppTabId){
         $this->db->select('');
        $this->db->from('r_app_twotire_infotab_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_one_twotiretabdata($iTwotireInfotabId){ 
        $this->db->select('');
        $this->db->from('r_app_twotire_infotab_values');
        $this->db->where('iTwotireInfotabId', $iTwotireInfotabId);      
        $query = $this->db->get();
        return $query->row_array();
    }
    function delete_twotiretabdata($iTwotireInfotabId){
        $this->db->where('iTwotireInfotabId',$iTwotireInfotabId);
        $query = $this->db->delete('r_app_twotire_infotab_values', $where);
        return $query;
    }          
    function get_all_twotiretabdata(){ 
        $this->db->select('');
        $this->db->from('r_app_twotire_infotab_values');
        $this->db->where('eActive', 'Yes');      
        $query = $this->db->get();
        return $query->result_array();
    }

    function getDefaultBackgroundId($iApplicationId,$eType)
    {
        $this->db->select('');
        $this->db->from('r_tabbackground AS st');
        $this->db->join('r_app_default_background_img AS sd','sd.iBackgroundId=st.iBackgroundId','LEFT');
        $this->db->where('iApplicationId', $iApplicationId); 
        $this->db->where('eType', $eType);      
        $query = $this->db->get();
        //echo "<pre>";print_r($query->row_array());exit;
        return $query->row_array();
    }

    function get_one_user_defappbackground($iApplicationId,$eType){
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('eType',$eType);
        $this->db->from('r_app_default_background_img');
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_default_appbackground($data,$iAppDefBackgroundId){
        $this->db->where('iAppDefBackgroundId',$iAppDefBackgroundId);
        $query = $this->db->update('r_app_default_background_img', $data);
        return $query;
    }

    function user_defbackground_image($iAppDefBackgroundId)
    {        
        $this->db->where('iAppDefBackgroundId',$iAppDefBackgroundId);
        $this->db->delete('r_app_default_background_img');
    }

    function get_one_user_deftabbackground($iApplicationId,$eType)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('eType',$eType);
        $this->db->from('r_app_default_background_img');
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_user_deftabbackground($data,$iAppDefBackgroundId)
    {    
        $this->db->where('iAppDefBackgroundId', $iAppDefBackgroundId);
        $query = $this->db->update('r_app_default_background_img', $data);
        return $query;
    }
    function write_log($msg,$userId)
    {
        $this->db->set('vErrorDescription',$msg);
        $this->db->set('iUserId', $userId);
        $this->db->set('dCreatedDate', time());
        return $this->db->insert('r_error_log');
    }

    /**
        Change By : Mayur Gajjar
        Date : 31/7/2014
        Change : get around us details
    **/
    // get around us
    function get_appwise_aroundus($iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_app_aroundus_category');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_color_category_details($iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_app_aroundus_category');
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    // get country details
    function get_country_details(){
        $this->db->select('');
        $this->db->from('r_country');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // around us poi details insert
    function insert_aroundus_POI_details($data)
    {
        $result = $this->db->insert('r_app_aroundus_gen_info',$data);
        return $this->db->insert_id();
    }
    
    // around us poi update details
    function update_aroundus_POI_details($data)
    {
         $this->db->where('rGeninfoId', $data['rGeninfoId']);
         return $this->db->update('r_app_aroundus_gen_info', $data);
    }
    
    // get around us information
    function get_aroundus_gen_info($iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_app_aroundus_gen_info');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    // delete around us details
    function delete_aroundus($rGeninfoId)
    {
        $this->db->where('rGeninfoId',$rGeninfoId);
        $this->db->delete('r_app_aroundus_gen_info');
        return true;
    }
    
    // get general info for around us
    function get_generalinfor_edit($rGeninfoId)
    {
        $this->db->select('');
        $this->db->where('rGeninfoId',$rGeninfoId);
        $this->db->from('r_app_aroundus_gen_info');
        $query = $this->db->get();
        return $query->row_array();
    }

    // change by mayur gajjar
    function insert_aroundus_category($data)
    {
        for ($i = 1; $i <= 3; $i++) {
            $items[] = array(
                'iApplicationId' => $data['data']['iApplicationId'], 
                'iAppTabId' => $data['data']['iAppTabId'],
                'rCatName' => $data['rCatName'.$i],
                'rCatColor' => $data['rCatColor'.$i],
            );
        }
        
        return $result = $this->db->insert_batch('r_app_aroundus_category', $items);
    }
    function update_aroundus_category($data){
        
        for ($i = 1; $i <= 3; $i++) {
            $items[] = array(
                'rCatId' => $data['rCatId'.$i],
                'iApplicationId' => $data['data']['iApplicationId'], 
                'iAppTabId' => $data['data']['iAppTabId'],
                'rCatName' => $data['rCatName'.$i],
                'rCatColor' => $data['rCatColor'.$i],
            );
        }
        
        return $result = $this->db->update_batch('r_app_aroundus_category', $items, 'rCatId');
    }
    
	// made by maksud for loyalty
    function save_loyalty($Data){
        $this->db->insert('r_app_loyalty_values',$Data);
        return $this->db->insert_id();
    }
    function get_appwise_loyalty($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_loyalty_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    function delete_loyalty($iLoyaltyID){

        $this->db->where('iLoyaltyID',$iLoyaltyID);
        $this->db->delete('r_app_loyalty_values');
        return true;
    }
    function getloyaltyinfo($iLoyaltyID){
        $this->db->select('l.*,sa.iFeatureId');
        $this->db->from('r_app_loyalty_values AS l');
        $this->db->join('r_appfeature AS sa','l.iAppTabId = sa.iAppTabId');
         $this->db->where('iLoyaltyID',$iLoyaltyID);
        $query = $this->db->get();
        return $query->row_array();
    }
    function update_loyalty($data,$iLoyaltyID){
        $this->db->where('iLoyaltyID',$iLoyaltyID);
        $this->db->update('r_app_loyalty_values',$data);
        return true;
    }
    //made by maksud
    function resturantinfo_save($table,$data){
       $this->db->insert($table,$data);
       return $this->db->insert_id();
    }
    function loadinfo($id){
        $this->db->where('iAdminId',$id);
        $this->db->order_by('iResturantInfoID','desc');
        return $this->db->get('r_resturant_info');
    }
    function resturantinfo_update($data,$iResturantInfoID){
        $this->db->where('iResturantInfoID',$iResturantInfoID);
         return $this->db->update('r_resturant_info', $data);
    }
    // Made by :- maksud
    // Description :- Item Get 
    // Date :- 12-08-2014
    function save_item($Data)
    {
        $this->db->insert("r_menu_item", $Data);
        return $this->db->insert_id();
    }
	
    function get_appwise_listmenu($iMenuID,$iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->from('r_menu_item');
        $this->db->where('iMenuID',$iMenuID);
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eStatus','Active');
        $this->db->order_by('iMenuID', 'DESC');
        $query = $this->db->get();
        //print($this->db->last_query());die;
        return $query->result_array();     
    }

    function get_appwise_listcatalogue_sub($iCatalogueMainId,$iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->from('r_app_catalogue_sub_catagory');
        $this->db->where('iCatalogueMainId',$iCatalogueMainId);
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eStatus','Active');
        $this->db->order_by('iCatalogueMainId', 'DESC');
        $query = $this->db->get();
        return $query->result_array();     
    }

    /*
        get appwise list catalogue
    */
    function get_appwise_listcatalogue($iCatalogueMainId,$iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_catalogue_details');
        $this->db->where('iCatalogueMainId',$iCatalogueMainId);
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eStatus','Active');
        $this->db->order_by('iCatalogueMainId', 'DESC');
        $query = $this->db->get();
        return $query->result_array();     
    }

    /*
        Get all product listing of catalogue category
    */
    function get_all_catalogue_productlisting($iCatalogueSubId){
        $this->db->select('');
        $this->db->from('r_app_catalogue_details');
        $this->db->where('iCatalogueSubId',$iCatalogueSubId);
        $query = $this->db->get();
        return $query->result_array();   

    }

    /*
        save product details
    */
    function save_product_details($data){
        $this->db->insert('r_app_catalogue_details',$data);
        return $this->db->insert_id();
    }

    /*
        update product details
    */
    function update_product_details($data,$iCatalogueId)
    {
        $this->db->where('iCatelogueId',$iCatalogueId);
        $query = $this->db->update('r_app_catalogue_details',$data);
        return $query;
    }
	
    function delete_item($iItemId){
        $this->db->where('iItemId',$iItemId);
        $this->db->delete('r_menu_item');
        return true;
    }

    function getiteminfo($iItemId){
        $this->db->select('');
        $this->db->from('r_menu_item');
        $this->db->where('iItemId',$iItemId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_item($data,$iItemId){
        $this->db->where('iItemId',$iItemId);
        $query = $this->db->update('r_menu_item', $data);
        return $query;
    }
	
	function get_edit_opening_values($iOpeningId){
		$this->db->select('');
        $this->db->from('r_app_home_addopeningtime');
        $this->db->where('iOpeningId',$iOpeningId);
        $query = $this->db->get();
        return $query->row_array();
	}
	
	/**
		Developer : Mayur Gajjar
		Description : Details of edit opening 
		Date : 10/9/2014
	**/
	function insert_printer_details($data){
		$this->db->insert("r_app_printer_table", $data);
        return $this->db->insert_id();
	}
	
	function update_printer_details($data,$iPrintId){
		$this->db->where('iPrintId',$iPrintId);
        $query = $this->db->update('r_app_printer_table', $data);
        return $query;
	}
	
	function get_printer_details($iApplicationId)
	{
		$this->db->select('');
        $this->db->from(' r_app_printer_table');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
	}
	
	function get_printer_edit_details($iPrinterId)
	{
		$this->db->select('');
        $this->db->from('r_app_printer_table');
        $this->db->where('iPrintId',$iPrinterId);
        $query = $this->db->get();
        return $query->result_array();
	}
	
	function delete_printer_details($data){
		$this->db->where('iPrintId',$data['iPrintId']);
        $this->db->delete('r_app_printer_table');
	    return true;
	}
	
    // Create By     :- maksudkhan
    // Date          :- 9-9-14
    // Description    :- Get Order
    function get_orderlist($iApplicationId)
	{
        $this->db->select('r_det.*,r_ord.*,r_men.vItemName');
        $this->db->from('r_app_paypal_paymentdetail as r_det');
        $this->db->join('r_order_customer_details as r_ord','r_det.iApplicationId = r_ord.iApplicationId','INNER');
        $this->db->join('r_order_detail as r_ord_det','r_det.iApplicationId = r_ord_det.iApplicationId','INNER');
        $this->db->join('r_menu_item as r_men','r_men.iItemId = r_ord_det.iItemId','INNER');
        $array = array('r_det.iApplicationId =' => $iApplicationId);

      //  $this->db->where('r_det.iApplicationId =' => $iApplicationId);
        $this->db->where('r_det.iApplicationId',$iApplicationId);
        $this->db->distinct();
        $this->db->group_by('r_det.iPayId');
        $query = $this->db->get();
        return $query->result_array();
        /*select DISTINCT r_det.*,r_men.*,r_ord.* from r_app_order_transaction_details as r_det inner join r_order_customer_details as r_ord on r_det.iApplicationId = r_ord.iApplicationId inner join r_order_detail as r_ord_det on r_det.iApplicationId = r_ord_det.iApplicationId inner join r_menu_item as r_men on r_men.iItemId = r_ord_det.iItemId where r_det.iApplicationId=129*/
    }
	
	/** 
		Name : Mayur Gajjar	
		Date : 19-12-2014
		Description  : get order history
	**/
	
	function get_orderlist_details($iApplicationId)
	{
		$this->db->select('*');
        $this->db->from('r_order_customer_details as rc');
		$this->db->from('r_order_detail as rd','rc.iCustOrderId = rd.iCustOrderId','inner');
        $this->db->where('rc.iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
	}
	
    // Create By     :- maksudkhan
    // Date          :- 10-9-14
    // Description    :- Get item by userid
    function get_item_get($iUserId)
	{
        $this->db->select('o.*,i.vItemName');
        $this->db->from('r_order_detail as o');
        $this->db->join('r_menu_item as i','o.iItemId = i.iItemId');
        $this->db->where('o.iUserId',$iUserId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
    function total_order($iApplicationId)
	{
        $this->db->select('iOrderTransId');
        $this->db->from('r_app_order_transaction_details');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	// Create By     :- maksudkhan
	// Date          :- 9-9-14
	// Description    :- Get Loyalty Count
    function insert_payment_details($data){
        $this->db->insert('r_app_payment_key_details',$data);
        return $this->db->insert_id();
    }
	
    function get_payment_appplicationid($iApplicationId){
        $this->db->select('');
        $this->db->from('r_app_payment_key_details');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }
	
    function update_payment_details($data){
        $this->db->where('iApplicationId',$data['iApplicationId']);
        $this->db->update('r_app_payment_key_details',$data);
    }
	
    function get_appwise_item($iApplicationId,$iAppTabId){
        $this->db->select('iItemId');
        $this->db->from('r_menu_item');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
	//	echo $this->db->last_query(); exit;
        return $query->result_array();
    }
	
	/**
		Description : Add details of project from publish page in application
		Developer : Mayur Gajjar
		Date : 25/9/2014
	**/
	function insert_app_project_details($data){
		$this->db->insert('r_app_phonegap_details',$data);
        return $this->db->insert_id();
	}
	
	/*function insert_app_project_details_server($data){
		$this->db->insert('r_app_phonegap_details',$data);
        return $this->db->insert_id();	
	}*/
	
	function update_app_project_details($data){
	 	$this->db->where('projectPrimaryId',$data['iProjectId']);
        	return $this->db->update('r_app_phonegap_details',$data);
	}	
	
	function get_project_info_name($iApplicationId){
		$this->db->select('*');
	 	$this->db->from('r_app_phonegap_details');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->row_array();
	}	

	function get_all_projectinformation_details($iApplicationId)
	{
		$this->db->select('');
        $this->db->from('r_app_phonegap_details');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
	}

	/**
		Developer : Mayur Gajjar
	    Date : 5/1/2015
	**/
	function get_details_about_app($iApplicationId)
	{
		/** Query for Get details **/
		$this->db->select('*');
		$this->db->from('r_appinformation ra');
		$this->db->join('r_app_phonegap_details rd','ra.iApplicationId = rd.iApplicationId','inner');
		$this->db->where('ra.iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	/**
		Insert Into Server
	**/
	function insert_app_server_project($data)
	{
		$con=mysqli_connect("54.68.150.28","phonegap_a","phonegap_a","phonegap_db");
		// Check connection
		if (mysqli_connect_errno()) {
			// echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return false;
		}
		/** Insert **/
		$insert = $con->query("INSERT INTO phonegap_details (`projectName`, `projectDomainName`, `projectDomain`, `projectEmail`, `projectStatus`)
		VALUES ('".$data['projectName']."','".$data['projectDomainName']."','".$data['projectDomain']."','".$data['projectEmail']."','".$data['projectStatus']."')");
		
		// mysqli_query($con,$insert);
		mysqli_close($con);
		
		return true;
	}
	
	/**
		get the details
	**/
	function get_application_price_details($iApplicationId)
	{
		$this->db->select('*');
		$this->db->from('r_appinformation');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
	}
	
	
	/** Get purachse app details **/
	function get_purchase_details($iApplicationId)
	{
		$this->db->select('*');
		$this->db->from('r_appinformation');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
	}
	
	
	/** Payment Details **/
	function insert_paypal_payment_details($data)
	{
		/** Insert paypal payment **/	
		$this->db->insert("r_app_paypal_paymentdetail", $data);
        return $this->db->insert_id();
	}
	
	/** Menu Item Details **/
	function update_menu_item_details($data)
	{
		$mydata = array(
			'vDayMenu' => date('Y-m-d')
		);
		
		$this->db->where('iItemId', $data['iItemId']);
        	$query = $this->db->update("r_menu_item", $mydata);
       		return $query;
	}
	
	/** update menu item deselect details **/
	function update_menu_item_deselect_details($data)
	{
		$mydata = array(
			'vDayMenu' => '0000-00-00'
		);
		$this->db->where('iItemId', $data['iItemId']);
        	$query = $this->db->update("r_menu_item", $mydata);
       		return $query;
	}

	/** get appwise catalogue **/
	function get_appwise_catalogues($iApplicationId,$iAppTabId)
	{
		$this->db->select('rac.*,ra.vTitle');
		$this->db->from('r_app_catalogue_main as rac');
		$this->db->join('r_appindustry as ra','ra.iIndustryId=rac.iCatalogueType','left');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();	
	}

	/** Save catalogue details **/
	function save_catalogue($data)
	{
		$this->db->insert('r_app_catalogue_details',$data);
		return $this->db->insert_id();
	}

    /* save catalogue main details */
    function save_catalogue_main($data){
        $this->db->insert('r_app_catalogue_main',$data);
        return $this->db->insert_id();
    }

	/** Save size and colors **/
	function save_size_catalogue($iCatalogueId,$mydata)
	{
		/** Delete before add **/
		$this->delete_catalogue_size($iCatalogueId,$mydata);
		
		/** save catalogue sizes **/
		for($i=0;$i<3;$i++){
			/** check data is available **/
			if($mydata['vSizeName'.$i] != '' && $mydata['vSizeColor'.$i] != '' && $mydata['fSizePrice'.$i] != '')
			{
				/** app size catalogue **/
				$insert = "insert into r_app_size_catalogue set vSizeName = '".$mydata['vSizeName'.$i]."',
					vSizeColor = '".$mydata['vSizeColor'.$i]."',
					fSizePrice = '".$mydata['fSizePrice'.$i]."',
					iCatelogueId = '".$iCatalogueId."'";
				/** query **/
				$query = $this->db->query($insert);
			}
		}
		return $query;
	}

	/** delete catalogue **/
	function delete_catalogue_size($iCatalogueId)
	{
		$this->db->where('iCatelogueId', $iCatalogueId);
		$this->db->delete('r_app_size_catalogue'); 
	}

	function delete_catalogue($iCatalogueId)
	{
		$this->db->where('iCatelogueId', $iCatalogueId);
		$this->db->delete('r_app_catalogue_details'); 
	}

	function delete_catalogue_size_details($iCatalogueId){
		$this->db->where('iCatelogueId', $iCatalogueId);
		$this->db->delete('r_app_size_catalogue'); 
	}
	
	/** update catalogue **/
	function update_catalogue($data,$iCatalogueId)
	{
		$this->db->where('iCatelogueId', $iCatalogueId);
		$query = $this->db->update("r_app_catalogue_details", $data);
       	return $query;
	}

    /** udpate main catalogue **/
    function update_catalogue_main($data,$iCatalogueMainId){
        $this->db->where('iCatalogueMainId', $iCatalogueMainId);
        $query = $this->db->update("r_app_catalogue_main", $data);
        return $query;
    }

    /** update service **/
    function update_service($data,$iServiceId)
    {
        $this->db->where('iServiceId', $iServiceId);
        $query = $this->db->update("r_app_service_details", $data);
        return $query;
    }


	/** get info of catalogue **/
	function getcatalogueinfo($iCatalogueId)
	{
		$this->db->select('*');
		$this->db->from('r_app_catalogue_details as rc');
	//	$this->db->join('r_app_size_catalogue rs','rc.iCatelogueId=rs.iCatelogueId','left');
		$this->db->where('rc.iCatelogueId',$iCatalogueId);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function delete_service_timing_details_edit($iServiceId){
		$this->db->where('iServiceId', $iServiceId);
		$this->db->delete('r_app_service_timing');
	}

	/** catalogue info size **/
	function getcatalogueinfosize($iCatalogueId){
		$this->db->select('*');
		$this->db->from('r_app_size_catalogue as rc');
		$this->db->where('rc.iCatelogueId',$iCatalogueId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** get appwise arrival **/
	function get_appwise_arrival($iApplicationId)
	{
		$this->db->select('ra.*,ri.vTitle');
		$this->db->from('r_app_arrival_details as ra');
		$this->db->join('r_appindustry as ri','ra.vArrivalType = ri.iIndustryId','inner');
		$this->db->where('ra.iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();	   
    	}

	/** update ticket info **/
	function update_ticket($data)
	{
		$this->db->where('iTicketId',$data['iTicketId']);
		$this->db->update('r_app_ticket_info',$data);
	}

	/** save arrival **/
	function save_arrival($data)
	{
		$this->db->insert('r_app_arrival_details',$data);
		return $this->db->insert_id();
	}

	/** update arrival **/
	function update_arrival($data,$iArrivalId){
		$this->db->where('iArrivalId', $iArrivalId);
		$query = $this->db->update("r_app_arrival_details", $data);
       		return $query;
	}

	/** save size details **/
	function save_size_details($size,$iItemId)
	{
		$count = count($size)/2;
		if($size['vSizeName0'] != '' && $size['fPrice0'] != '')
        {
			$queryInsert = 'INSERT INTO `r_menu_item_size` (`iItemId`, `vSizeName`, `fPrice`) VALUES ';
		}
		else
		{
			return false;
		}
        for($i=0;$i<$count;$i++){
            if($size['vSizeName'.$i] != '' && $size['fPrice'.$i] != '')
            {
            	$vSizeNameCurrent = mysql_real_escape_string($size['vSizeName'.$i]);
            	
            	$queryInsert .= "('$iItemId','".$vSizeNameCurrent."','".mysql_real_escape_string($size['fPrice'.$i])."'), ";
            }
        }
        $queryInsert = rtrim($queryInsert,', ');
        $query = $this->db->query($queryInsert);
		/*for($i=0;$i<$count;$i++){
			if($size['vSizeName'.$i] != '' && $size['fPrice'.$i] != ''){
				$insert="insert into r_menu_item_size set iItemId = '".$iItemId."',
					vSizeName = '".$size['vSizeName'.$i]."',
					fPrice = '".$size['fPrice'.$i]."'";
				$query = $this->db->query($insert);
			}
		}*/
		return $query;
	}

	/** save option details **/
	function save_option_details($option,$iItemId)
	{
		$count = count($option)/2;
		/* save catalogue size */
		if($option['vOptName0'] != '' && $option['fCharge0'] != '')
        {
        	$queryInsert = 'INSERT INTO `r_menu_item_option` (`iItemId`, `vOptName`, `fCharge`) VALUES ';
        }
        else
        {
        	return true;
        }
        for($i=0;$i<$count;$i++){
            if($option['vOptName'.$i] != '' && $option['fCharge'.$i] != '')
            {
            	$vOptNameCurrent = mysql_real_escape_string($option['vOptName'.$i]);
            	
            	$queryInsert .= "('$iItemId','".$vOptNameCurrent."','".mysql_real_escape_string($option['fCharge'.$i])."'), ";
            }
        }
        $queryInsert = rtrim($queryInsert,', ');
        $query = $this->db->query($queryInsert);
		/*for($i=0;$i<$count;$i++){
			if($option['vOptName'.$i] != '' && $option['fCharge'.$i]){
				$insert="insert into r_menu_item_option set iItemId = '".$iItemId."',
					vOptName = '".$option['vOptName'.$i]."',
					fCharge = '".$option['fCharge'.$i]."'";
				$query = $this->db->query($insert);
			}
		}*/
		return $query;
	}

	/** get info of catalogue **/
	function getarrivalinfo($iArrivalId)
	{
		$this->db->select('*');
		$this->db->from('r_app_arrival_details');
		$this->db->where('iArrivalId',$iArrivalId);
		$query = $this->db->get();
		return $query->row_array();
	}

	/** promotion details **/
	function get_appwise_promotion($iApplicationId,$iAppTabId)
	{
		$this->db->select('*');
		$this->db->from('r_app_promotions_details');
		$this->db->where('iApplicationId',$iApplicationId);
		$this->db->where('iAppTabId',$iAppTabId);
		$query = $this->db->get();
		return $query->result_array();		
	}

	/** save promotion **/
	function save_promotion($data)
	{
		$this->db->insert('r_app_promotions_details',$data);
		return $this->db->insert_id();
	}

	/** update promotion **/
	function update_promotion($data,$iPromotionsId)
	{
		$this->db->where('iPromotionsId', $iPromotionsId);
		$query = $this->db->update("r_app_promotions_details", $data);
       		return $query;
	}

	/** get promotion info **/
	function getpromotioninfo($iPromotionsId)
	{
		$this->db->select('*');
		$this->db->from('r_app_promotions_details');
		$this->db->where('iPromotionsId',$iPromotionsId);
		$query = $this->db->get();
		return $query->row_array();
	}

	/** delete promotion **/
	function delete_promotion($iPromotionsId)
	{
		$this->db->where('iPromotionsId', $iPromotionsId);
		$this->db->delete('r_app_promotions_details'); 
	}

	/** delete review details **/
	function delete_review_details($iReviewId)
	{
		$this->db->where('iReviewId', $iReviewId);
		$this->db->delete('r_app_review_details'); 
	}

	/** get donation details **/
	function get_donation_details($iApplicationId)
	{
		$this->db->select('*');
		$this->db->from('r_app_donations_details');		
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** service details **/
	function get_appwise_service($iApplicationId,$iAppTabId)
	{
		/** get all service details **/
		$this->db->select('*');
		$this->db->from('r_app_service_details');		
		$this->db->where('iApplicationId',$iApplicationId);
		$this->db->where('iAppTabId',$iAppTabId);
		$query = $this->db->get();
		return $query->result_array();
	}

function getservicetiminginfo($iServiceId)
	{
		$this->db->select('*');
		$this->db->from('r_app_service_timing');
		$this->db->where('iServiceId',$iServiceId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** save service **/
	function save_service($data)
	{
		$this->db->insert('r_app_service_details',$data);
		return $this->db->insert_id();
	}

	function getserviceinfo($iServiceId)
	{
		$this->db->select('*');
		$this->db->from('r_app_service_details');
		$this->db->where('iServiceId',$iServiceId);
		$query = $this->db->get();
		return $query->row_array();
	}

	/** get review details **/
	function get_review_details($iApplicationId,$iAppTabId)
	{
		$this->db->select('*');
		$this->db->from('r_app_review_details');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** get testonomial details **/
	function get_testonomial_details($iApplicationId)
	{
		$this->db->select('*');
		$this->db->from('r_app_testonomial_details');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** update status **/
	function update_status_testomonial_active($iTestomonialId)
	{
		$data = array(
				'eStatus' => 'Active'
			     );

		$this->db->where('iTestonomialId', $iTestomonialId);
		$query = $this->db->update("r_app_testonomial_details", $data);
       		return $query;
	}	

	function update_status_testomonial_inactive($iTestomonialId)
	{
		$data = array(
				'eStatus' => 'Inactive'
			     );

		$this->db->where('iTestonomialId', $iTestomonialId);
		$query = $this->db->update("r_app_testonomial_details", $data);
       		return $query;
	}	

	/** delete testomonial **/
	function delete_testomonial($iTestomonialId)
	{
		$this->db->where('iTestonomialId', $iTestomonialId);
		$this->db->delete('r_app_testonomial_details'); 
	}

	/** delete arrival details **/
	function delete_arrival($iArrivalId)
	{
		$this->db->where('iArrivalId', $iArrivalId);
		$this->db->delete('r_app_arrival_details'); 
	}

	/** Appointment details **/
	function get_appointment_details($iApplicationId)
	{
		$this->db->select('*');	
		$this->db->from('r_app_appointment_details');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** get ticket information **/
	function get_ticket_information($iApplicationId)
	{
		$this->db->select('*');	
		$this->db->from('r_app_ticket_info');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** save ticket **/
	function save_ticket($data)
	{
		$this->db->insert('r_app_ticket_info',$data);
		return $this->db->insert_id();
	}

	/** ticket info **/
	function getticketinfo($iTicketId)
	{
		$this->db->select('*');	
		$this->db->from('r_app_ticket_info');
		$this->db->where('iTicketId',$iTicketId);
		$query = $this->db->get();
		return $query->row_array();
	}

	/** delete ticket information **/
	function delete_ticket($iTicketId)
	{
		/** delete tickets **/
		$this->db->where('iTicketId', $iTicketId);
		$this->db->delete('r_app_ticket_info'); 
	}

	/** currency code **/
	function get_currency_code()
	{
		$this->db->select('*');
		$this->db->from('r_currency');
		$query  = $this->db->get();
		return $query->result_array();
	}

	/**  ecommerce details **/
	function get_ecommerce_purchase_details($iApplicationId)
	{
		$this->db->select('*');	
		$this->db->from('r_app_ecommerce_payment_details rpd');
		$this->db->join('r_app_catalogue_details rcd','rpd.iCatalogueId=rcd.iCatelogueId','left');
		$this->db->where('rpd.iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** save timing details **/
	function save_service_timing($mydata,$iServiceId,$iApplicationId)
	{
		/** service timing details **/
        $service_data = array();
		foreach($mydata['service_timing'] as $val)
		{
            $insert = $this->db->query("insert into r_app_service_timing set vServiceDay = '".$val."',tServiceStartTime='".$mydata['tStartTime']."',tServiceEndTime='".$mydata['tEndTime']."',iApplicationId='".$iApplicationId."',iServiceId='".$iServiceId."'");    
        }
        return 1;
    }

	/** delete service timing **/
	function delete_service_timing_details($iServiceId)
	{
		$this->db->flush_cache();
		/** service timing **/
		$this->db->where('iServiceId',$iServiceId);
		$this->db->delete('r_app_service_timing');
		/** service main table **/
		$this->db->where('iServiceId',$iServiceId);
		$this->db->delete('r_app_service_details');
	}

	function delete_service($iServiceId){
		$this->db->where('iServiceId',$iServiceId);
		$this->db->delete('r_app_service_details');
	}

	/** blog details **/
	function get_blog_tabhtml($iApplicationId){
		/** get blog tab html **/
	}

	/** get quotation details **/
	function get_quotation_details($iApplicationId)
	{
		$this->db->select('*');	
		$this->db->from('r_app_quotation_details');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** get all blog details **/
	function get_appwise_blogs($iApplicationId,$iAppTabId)
	{
		$this->db->select('*');
		$this->db->from('r_app_blog_values');
		$this->db->where('iApplicationId',$iApplicationId);
		$this->db->where('iAppTabId',$iAppTabId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** save all blogs **/
	function save_blog($data)
	{
		$this->db->insert('r_app_blog_values',$data);
		return $this->db->insert_id();
	}

	function getbloginfo($iBlogId)
	{
		/** blog details **/
		$this->db->select('*');
		$this->db->from('r_app_blog_values');
		$this->db->where('iBlogId',$iBlogId);
		$query = $this->db->get();
		return $query->result_array();		
	}	
	
	function delete_blog($iBlogId){
		/** delete tickets **/
		$this->db->where('iBlogId', $iBlogId);
		$this->db->delete('r_app_blog_values'); 
	}	

	function insert_paypal_packages_details($package)
	{
		$this->db->insert('r_packages_value_paypal',$package);
		return $this->db->insert_id();
        }

	function get_industry_details($vCategoryName){
		/** blog details **/
		$this->db->select('iIndustryId');
		$this->db->from('r_appindustry');
		$this->db->where('vTitle',$vCategoryName);
		$query = $this->db->get();
		return $query->row_array();
	}

	/**
		get all appindustry clientId and roleid
	**/
	function get_all_appindustry_clientId($iAdminId,$iRoleId)
	{
		if($iRoleId == 1){
			$this->db->select('');
			$this->db->from('r_appindustry');
			$this->db->where('eStatus', 'Active');
			$query = $this->db->get();
			return $query->result_array();
		}else if($iRoleId == 2){
			$this->db->select('');
			$this->db->from('r_appindustry as ra');
			$this->db->join('r_packages_value_paypal as rp','ra.iIndustryId=rp.vCategoryId','Left');
			$this->db->where('rp.iAdminId',$iAdminId);
			$this->db->where('ra.eStatus', 'Active');
			$this->db->group_by('ra.vTitle');
			$query = $this->db->get();
            return $query->result_array();
		}	
	}
	
	/**
		get all appindustry applicationId
	**/
	function get_all_appindustry_applicationId($iApplicationId)
	{
		$this->db->select('rp.*');
		$this->db->from('r_appinformation as ra');
		$this->db->join('r_appindustry as rp','ra.iIndustryId=rp.iIndustryId','inner');
		$this->db->where('ra.iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->row_array();
	}

	/**		
		Insert paypal recurring details
	**/
	function insert_paypal_recurring_details($data){
		$this->db->insert('r_app_package_paypal_details',$data);
		return $this->db->insert_id();
	}	

	/**
		Get all AgrimentId
	**/
	function get_all_agrimentId_details($current_date){
		$this->db->select('');
		$this->db->from('r_app_package_paypal_details');
		$this->db->where('dDateTime', $current_date);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_service_timing_details($data,$iServiceId)
	{
		$this->db->where('iServiceId', $iServiceId);
		$query = $this->db->update("r_app_service_details", $data);
       	return $query;
	}

	/** get item info **/
	public function getitemsizeinfo($iItemId){
		$this->db->select('');
		$this->db->from('r_menu_item_size');
		$this->db->where('iItemId',$iItemId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** get option info **/
	public function getitemoptioninfo($iItemId){
		$this->db->select('*');
		$this->db->from('r_menu_item_option');
		$this->db->where('iItemId',$iItemId);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_size_option_details($iItemId){
		/** delete tickets **/
		$this->db->where('iItemId', $iItemId);
		$this->db->delete('r_menu_item_size'); 
	}

	public function delete_option_option_details($iItemId){
		/** delete tickets **/
		$this->db->where('iItemId', $iItemId);
		$this->db->delete('r_menu_item_option'); 
	}

    public function save_catalogue_sub($data){
        $this->db->insert('r_app_catalogue_sub_catagory',$data);
        return $this->db->insert_id();
    }

    /*
        update main catalogue details
    */
    public function getcataloguemaindetails($iCatalogueMainId){
        $this->db->select('');
        $this->db->from('r_app_catalogue_main');
        $this->db->where('iCatalogueMainId',$iCatalogueMainId);
        $query = $this->db->get();
        return $query->row_array();

    }

    /*
       catalogue product size
    */
    public function save_catalogue_size_details($size,$iCatalogueId)
    {
        /* save catalogue size */
        $count = count($size)/2;
        if($size['vSizeName0'] != '' && $size['fSizePrice0'] != '')
        {
        	$queryInsert = 'INSERT INTO `r_app_size_catalogue` (`iCatelogueId`, `vSizeName`, `vSizeColor`, `fSizePrice`) VALUES ';
        }
        else
        {
        	return false;
        }
        for($i=0;$i<$count;$i++){
            if($size['vSizeName'.$i] != '' && $size['fSizePrice'.$i] != '')
            {
            	//$vSizeNameCurrent = REPLACE(REPLACE($size['vSizeName'.$i], '"', '\"'), "'", "\'");
            	$vSizeNameCurrent = mysql_real_escape_string($size['vSizeName'.$i]);
            	
            	$queryInsert .= "('$iCatalogueId','".$vSizeNameCurrent."','".mysql_real_escape_string($size['vSizeColor'.$i])."','".$size['fSizePrice'.$i]."'), ";
                //$query = $this->db->query("insert into r_app_size_catalogue set iCatelogueId = '".$iCatalogueId."',vSizeName = '".$size['vSizeName'.$i]."',
                //    vSizeColor = '".$size['vSizeColor'.$i]."',
                //    fSizePrice = '".$size['fSizePrice'.$i]."'");
            }
        }
        $queryInsert = rtrim($queryInsert,', ');
        $query = $this->db->query($queryInsert);
        return true;
    }

    /*
        catalogue sub details
    */
    public function getsubcatalogueinfo($iCatalogueSubId)
    {
        $this->db->select('');
        $this->db->from('r_app_catalogue_sub_catagory');
        $this->db->where('iCatalogueSubId',$iCatalogueSubId);
        $query = $this->db->get();
        return $query->row_array();
    }

    /*
        delete product option size 
    */
    public function delete_catalogue_option_details($iCatalogueId){
        $this->db->where('iCatelogueId',$iCatalogueId);
        $this->db->delete('r_app_option_catalogue');
    }    

    /*
        catalogue product option
    */
    //public function save_catalogue_option_details($option,$iCatalogueId)
    //{
    //    /* save catalogue size */
    //    for($i=0;$i<10;$i++)
    //    {
    //        if($option['vOptionName'.$i] != '' && $option['fOptionPrice'.$i] != ''){
    //        $query = $this->db->query("insert into r_app_option_catalogue set 
    //            iCatelogueId = '".$iCatalogueId."',
    //            vOptionName = '".$option['vOptionName'.$i]."',
    //            fOptionPrice = '".$option['fOptionPrice'.$i]."'");     
    //       }
    //    }
    //    return true;
    //} 
    
    public function save_catalogue_option_details($option,$iCatalogueId)
    {
        /* save catalogue option */
        $count = count($option)/2;
        if($option['vOptionName0'] != '' && $option['fOptionPrice0'] != '')
        {
        	$queryInsert = 'INSERT INTO `r_app_option_catalogue` (`iCatelogueId`, `vOptionName`, `fOptionPrice`) VALUES ';
        }
        else
        {
        	return true;
        }
        for($i=0;$i<$count;$i++){
            if($option['vOptionName'.$i] != '' && $option['fOptionPrice'.$i] != '')
            {
            	$vOptionNameCurrent = mysql_real_escape_string($option['vOptionName'.$i]);
            	$queryInsert .= "('$iCatalogueId','".$vOptionNameCurrent."','".$option['fOptionPrice'.$i]."'), ";
            }
        }
        $queryInsert = rtrim($queryInsert,', ');
        $query = $this->db->query($queryInsert);
        return true;
    } 

    /*
        update catalogue 
    */  
    public function update_catalogue_sub($data,$iCatalogueSubId)
    {
        $this->db->where('iCatalogueSubId',$iCatalogueSubId);
        $this->db->update('r_app_catalogue_sub_catagory',$data);
        return true;
    }

    /*
        delete sub catalogue
    */
    public function delete_sub_catalogue($iCatalogueSubId)
    {
        $this->db->where('iCatalogueSubId',$iCatalogueSubId);
        $this->db->delete('r_app_catalogue_sub_catagory');
        return true;
    }

    /*
        Show product list
    */
    public function getproductcataloguedetails($iCatalogueId)
    {
        $this->db->select('');
        $this->db->from('r_app_catalogue_details');
        $this->db->where('iCatelogueId',$iCatalogueId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // delete image
    function delete_image($tableName,$imgId,$imgField,$imgIdField)
    {
    	$this->db->where($imgIdField,$imgId);
    	$data = ("$imgField");
        $this->db->update($tableName,$data);
        return true;
    }

    /*
        catalogue sizes of product list
    */
    public function getcataloguesizeinfo($iCatalogueId)
    {
        $this->db->select('');
        $this->db->from('r_app_size_catalogue');
        $this->db->where('iCatelogueId',$iCatalogueId);
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
        catalogue option of product list
    */
    public function getcatalogueoptioninfo($iCatalogueId)
    {
        $this->db->select('');
        $this->db->from('r_app_option_catalogue');
        $this->db->where('iCatelogueId',$iCatalogueId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /*
    	function to get new tab order id
    */
    public function getNewTabOrderId($appId)
    {
    	$this->db->select_max('iOrderId');
        $this->db->from('r_sorttab');
        $this->db->where('iApplicationId',$appId);
        $query = $this->db->get();
        $arr = $query->result_array();
        return ($arr[0]['iOrderId'] + 1);
    }
}
?>
