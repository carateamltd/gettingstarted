<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }


    function get_all_appinformation($iClientId,$iRoleId)
    {
        $this->db->select('');
        $this->db->where('iClientId', $iClientId);
        $this->db->from('slb_appinformation');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_appinformation_id($iApplicationId,$iClientId,$iRoleId){
	   
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
	   if($iRoleId>1){		  
		  $this->db->where('iClientId', $iClientId);
	   }  
        $this->db->from('slb_appinformation');
        $query = $this->db->get();	   
        return $query->row_array();
    }

    function update_appinformation($data,$iApplicationId){
        $this->db->where('iApplicationId', $iApplicationId);
        $query = $this->db->update("slb_appinformation", $data);
        return $query;
    }
    
    function get_all_appindustry()
    {
        $this->db->select('');
        $this->db->where('eStatus', 'Active');
        $this->db->from('slb_appindustry');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_all_appindustryfeature($iIndustryId)
    {
        $this->db->select('');
        $this->db->where('iIndustryId', $iIndustryId);
        $this->db->from('slb_appindustryfeature');
        $query = $this->db->get();
        return $query->result_array();
    }

    function save($table,$Data){
        $this->db->insert($table,$Data);
        return $this->db->insert_id();
    }

    function get_featureid_by_appid($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->from('slb_appfeature');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    

    function get_all_appindustryfeature_by_featureid($iFeatureId)
    {
        $this->db->select('');
        $this->db->where_in('iFeatureId', $iFeatureId);
        $this->db->from('slb_appindustryfeature');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_featurefields($iFeatureId){
		//echo $iFeatureId;exit;
        $this->db->select('');
        $this->db->where('iFeatureId', $iFeatureId);
        $this->db->from('slb_featurefields');
        $query = $this->db->get();
        return $query->result_array();
		
	}
	
	function get_appfeaturevalue($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId', $iAppTabId);
        $this->db->from('slb_appfeaturevalue');
        $query = $this->db->get();
        return $query->result_array();
		
	}

	function get_appfeature($iApplicationId){
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->from('slb_appfeature');
        $query = $this->db->get();
        return $query->result_array();
		
	}

	function get_exist_appfeaturevalue($iApplicationId,$iFieldId,$iAppTabId){
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iFieldId', $iFieldId);
        $this->db->where('iAppTabId', $iAppTabId);
        $this->db->from('slb_appfeaturevalue');
        $query = $this->db->get();
        return $query->result_array();
		
	}
	
    function update_appfeaturevalue($data,$iAppId){

        $this->db->where('iAppId', $iAppId);
        $query = $this->db->update("slb_appfeaturevalue", $data);
        return $query;
    }	
    function update_slb_appfeature($iAppTabId,$Data){	   
	   $this->db->where('iAppTabId', $iAppTabId);
        $query = $this->db->update("slb_appfeature", $Data);
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
    function delete_sorttab_related_data($iApplicationId) {
		
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->delete('slb_sorttab');
    } 

    function get_all_appindustryfeature_data($iIndustryId)
    {
        $this->db->select('*');
        if($iIndustryId != ""){
            $this->db->where('iIndustryId',$iIndustryId);
        }
        $this->db->from('slb_appindustryfeature');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_exist_appfeature_data($iAppTabId)
    {
/*        $this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('slb_appfeature');
        $query = $this->db->get();
        return $query->result_array();*/

        $this->db->select('saf.iAppTabId,saf.iApplicationId,saf.iFeatureId,saf.iIconId,saf.eCustom,saf.vTitle,saif.vTitle as ovTitle,saf.eActive');
        $this->db->where('saf.iAppTabId',$iAppTabId);
        $this->db->from('slb_appfeature` AS saf');
        $this->db->join('slb_appindustryfeature AS saif','saf.iFeatureId =saif.iFeatureId','LEFT');        
        $query = $this->db->get();
        return $query->result_array();


        
    }

 /*   function get_one_appfeature_data($iAppTabId)

		$this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('slb_appfeature');
        $query = $this->db->get();
        return $query->result_array();
	}*/

    function update_appfeature($data,$iAppTabId)
    {

        $this->db->where('iAppTabId', $iAppTabId);
        $query = $this->db->update("slb_appfeature", $data);
        return $query;
    }	


    function get_all_tabcustomicon()
    {
        $this->db->select('');
        $this->db->from('slb_tabcustomicon');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_one_tabcustomicon($iTabcustomiconId)
    {
        $this->db->select('');
        $this->db->where('iTabcustomiconId',$iTabcustomiconId);
        $this->db->from('slb_tabcustomicon');
        $query = $this->db->get();
        return $query->row_array();
    } 
    
    function update_iconmaster($data,$iIconId)
    {
        $this->db->where('iIconId', $iIconId);
        $query = $this->db->update("slb_iconmaster", $data);
        // return $this->db->affected_rows(); 
        return $query;
    }
    function get_one_appindustryfeature($iIconId)
    {
	$this->db->select('');
        $this->db->where('iIconId', $iIconId);
	$this->db->from('slb_appindustryfeature');
	$query = $this->db->get();
        return $query->row_array();
    }    

    function get_one_iconmaster($iIconId)
    {
	$this->db->select('');
        $this->db->where('iIconId', $iIconId);
	$this->db->from('slb_iconmaster');
	$query = $this->db->get();
        return $query->row_array();
    }

    function get_one_sorttab($iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('slb_sorttab');
        $query = $this->db->get();
        return $query->row_array();
    } 
 
    function update_sorttab($data,$iSorttabId)
    {
        $this->db->where('iSorttabId', $iSorttabId);
        $query = $this->db->update("slb_sorttab", $data);
        // return $this->db->affected_rows(); 
        return $query;
    }
    
      function get_sorttab_order($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->order_by('iOrderId asc');
        $this->db->from('slb_sorttab');
        $query = $this->db->get();
        return $query->result_array();
    }
     function get_one_user_tabbackground($iAppTabId,$eType)
    {
        $this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eType',$eType);
        $this->db->from('slb_user_tabbackground');
        $query = $this->db->get();
        return $query->row_array();
    }    

     function get_one_tabbackground($iBackgroundId)
    {
        $this->db->select('');
        $this->db->where('iBackgroundId',$iBackgroundId);

        $this->db->from('slb_tabbackground');
        $query = $this->db->get();
        return $query->row_array();
    } 

    function update_user_tabbackground($data,$iUserTabBackImgId)
    {
	
        $this->db->where('iUserTabBackImgId', $iUserTabBackImgId);
        $query = $this->db->update('slb_user_tabbackground', $data);
        return $query;
    }

    function update_tabbackground($data,$iBackgroundId)
    {

        $this->db->where('iBackgroundId', $iBackgroundId);
        $query = $this->db->update("slb_tabbackground", $data);
        return $query;
    }
    
    function user_background_image($iUserTabBackImgId) {
		
        $this->db->where('iUserTabBackImgId',$iUserTabBackImgId);
        $this->db->delete('slb_user_tabbackground');
    }
    
    function saveBackgroundSetting($Data){
	   $this->db->insert('slb_user_tabbackground',$Data);
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
	   $this->db->from('slb_user_tabbackground');
	   $this->db->where('iApplicationId',$id);
	   $data=$this->db->get()->row_array();	   
	   return $data;
    }
    function getSelectedTabs($id,$eTypes){	   
	   $this->db->select('iAppTabId');
	   $this->db->from('slb_user_tabbackground');
	   $this->db->where('iApplicationId',$id);
	   $this->db->where('eType',$eTypes);
	   $data=$this->db->get()->result_array();	   
	   return $data;   
    }
    
    function appTabByImageId($iBackgroundId,$eTypes){
	   
	   $this->db->select('iAppTabId');
	   $this->db->from('slb_user_tabbackground');
	   $this->db->where('iBackgroundimgId',$iBackgroundId);
	   $this->db->where('eType',$eTypes);
	   $data=$this->db->get()->result_array();	   
	   return $data;   
    }
    
    function getAppImages($iApplicationId,$eTypes){
	   $this->db->select('si.*,st.*');
	   $this->db->where('si.iApplicationId',$iApplicationId);
	   $this->db->where('si.eType',$eTypes);
	   
	   $this->db->from('slb_app_background_img as si');
	   $this->db->join('slb_tabbackground as st','st.iBackgroundId=si.iBackgroundId');	   
	   $data=$this->db->get()->result_array();	   
	   return $data; 
	   
    }
    function deleteAppImages($iApplicationId) {	   	   
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->delete('slb_app_background_img');
    }
    
    function getTabName($iAppTabId){	   
	   $this->db->select('vTitle');
	   $this->db->from('slb_appfeature');
	   $this->db->where('iAppTabId',$iAppTabId);
	   $data=$this->db->get()->row();	   
	   return $data;   
	   
    }
    
    function deleteTabData($iApplicationId,$iAppTabId,$eType){	   
	   $this->db->where('eType',$eType);
	   $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->delete('slb_user_tabbackground');
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
	   $this->db->from('slb_buttons_tab_background');	   
	   $this->db->where('eStatus', 'Active');
	   $this->db->where_in('iAdminId',$admin_data);
	   $this->db->order_by('iBtntabbackgroundId', 'DESC');
	   $query = $this->db->get();
	   return $query->result_array();
    }
    
    function getAllHeaderImg($iAdminId){
	   $this->db->select('');	   
	   $this->db->from('slb_lunch_header');
	   $this->db->where('iAdminId',$iAdminId);
	   $this->db->where('eStatus', 'Active');
	   $this->db->order_by('iLunchheaderId', 'DESC');
	   $query = $this->db->get();
	   return $query->result_array();	   
    }
    
    function allSubTabData($iApplicationId){
	   $this->db->select('st.*,si.vImage');	   
	   $this->db->from('slb_sutabs as st');
	   $this->db->join('slb_iconmaster as si','si.iIconId=st.iIconId','LEFT');
	   $this->db->where('st.iApplicationId',$iApplicationId);	   
	   $this->db->order_by('st.iSubTabId', 'DESC');
	   $query = $this->db->get();
	   return $query->result_array();	   	   
    }
    
    function allClientList(){
	   $this->db->select('');	   
	   $this->db->from('slb_administrator');
	   $this->db->where('iRoleId',2);	   	   
	   $query = $this->db->get();
	   return $query->result_array();	  
	   
    }
    function subDataById($iSubTabId){
	   $this->db->select('');	   
	   $this->db->from('slb_sutabs');	   
	   $this->db->where('iSubTabId',$iSubTabId);
	   $query = $this->db->get();
	   return $query->row_array();	   	   
    }
    
    function update_appsubTab($iSubTabId,$Data){
	   $this->db->where('iSubTabId', $iSubTabId);
        $query = $this->db->update("slb_sutabs",$Data);
        return $query;   
    }
    function deleteSubTab($iSubTabId) {		
        $this->db->where('iSubTabId',$iSubTabId);
        $this->db->delete('slb_sutabs');
    }
    
    function delete($iApplicationId,$iAppTabId){
	   $this->db->where('iAppTabId',$iAppTabId);
	   $this->db->where('iApplicationId',$iApplicationId);
	   $this->db->delete('slb_appfeaturevalue');
    }    

    function appinformation_by_id($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->from('slb_appinformation');
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getall_location(){
	   $this->db->select('iAppId,iApplicationId,iAppTabId');        
        $this->db->from('slb_appfeaturevalue');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function checkappdesign_info($iApplicationId){
        $this->db->select('iAppDesignInfoId');        
        $this->db->from('slb_app_design_ifo');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function updateappdesign_info($iApplicationId,$data){
        $this->db->where('iApplicationId', $iApplicationId);
        $query = $this->db->update("slb_app_design_ifo", $data);
        return $query;        
    }
    function insertappdesign_info($data){
        $this->db->insert("slb_app_design_ifo",$data);
        return $this->db->insert_id();        
    }
    
    function getallappdesignInfo($iApplicationId){
        $this->db->select('*');	   
        $this->db->from('slb_app_design_ifo');
        $this->db->where('iApplicationId', $iApplicationId);  
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function deleteAppBgImage($iApplicationId,$iBackgroundId,$App_type) {
	   $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iBackgroundId',$iBackgroundId);
	   $this->db->where('eType',$App_type);
        $this->db->delete('slb_app_background_img');
    }
    
    function deleteSubTabData($iApplicationId,$iBackgroundId,$App_type){	   
	   $this->db->where('eType',$App_type);
	   $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iBackgroundimgId',$iBackgroundId);
        $this->db->delete('slb_user_tabbackground');
    }
    
    function selectedBgImgId($id,$eTypes){
	   $this->db->select('iBackgroundId');	   
        $this->db->from('slb_app_background_img');
        $this->db->where('iApplicationId', $id);
	   $this->db->where('eType',$eTypes);  
        $query = $this->db->get();
        return $query->result_array();	   
    }
    
    function get_appwise_events($iApplicationId){
        $this->db->select('iEventId,vTitle,dStartDate,vStartTime,dEndDate,vEndTime');
        $this->db->from('slb_app_event_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->order_by('iEventId', 'DESC');
        $query = $this->db->get();
        return $query->result_array();	   
    }
    function all_tabbackground($AdminId_array){
	   $this->db->select('');
	   $this->db->where('eStatus', 'Active');	   
	   $this->db->where_in('iAdminId', $AdminId_array);
	   $this->db->order_by('iBackgroundId','DESC');
	   $this->db->from('slb_tabbackground');   
	   $query = $this->db->get();
	   return $query->result_array();
    }    

    function get_appwise_locations($iApplicationId){
        $this->db->select('iLocationId, vWebsite, vEmail, vTelephone, vAddress1, vAddress2, vCity, vState, vZip, vLatitude, vLongitude, vLookupAddress');
        $this->db->from('slb_app_location_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_one_user_appbackground($iAppTabId,$eType){
        $this->db->select('');
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eType',$eType);
        $this->db->from('slb_app_background_img');
        $query = $this->db->get();
        return $query->row_array();
    }    
    function update_appbackground($data,$iAppBackgroundId){
        $this->db->where('iAppBackgroundId',$iAppBackgroundId);
        $query = $this->db->update('slb_app_background_img', $data);
        return $query;
    }
    function deleteTabImages($iApplicationId,$iAppTabId,$App_type) {
	   $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iBackgroundId);
	   $this->db->where('eType',$App_type);
        $this->db->delete('slb_app_background_img');
    }
    
    function save_event($Data){
		$this->db->insert("slb_app_event_values", $Data);
		return $this->db->insert_id();
	}
    
    function update_event($Data,$iEventId){
		$this->db->where('iEventId', $iEventId);
        $query = $this->db->update("slb_app_event_values", $Data);
        return $query;
	}
    function get_appwise_news($iApplicationId){
        $this->db->select('iNewsId, iApplicationId, eGoogleNews, vGoogleNewsKeyWords, eTweets, vTweetsKeyWords');
        $this->db->from('slb_app_news_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_news($data,$iNewsId){
        $this->db->where('iNewsId', $iNewsId);
        $query = $this->db->update("slb_app_news_value", $data);
        return $query;
    }
    function update_mailinglist($data,$iMailinglistId){
        $this->db->where('iMailinglistId', $iMailinglistId);
        $query = $this->db->update("slb_app_mailinglist_value", $data);
        return $query;
    }
    function delete_events($iEventId){
        $this->db->where('iEventId',$iEventId);
        $query = $this->db->delete('slb_app_event_values', $where);
		return $query;
    }
    
    function geteventinfo($iEventId){
        $this->db->select('*');
        $this->db->from('slb_app_event_values');
        $this->db->where('iEventId',$iEventId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_appwise_mailinglist($iApplicationId){
        $this->db->select('iMailinglistId, iApplicationId, tDescription, ePromptOption, eAutomatic');
        $this->db->from('slb_app_mailinglist_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_appwise_rss($iApplicationId){
        $this->db->select('iRSSId, iApplicationId, vRSSURL, vIcon');
        $this->db->from('slb_app_rss_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_rss($data,$iRSSId){
        $this->db->where('iRSSId', $iRSSId);
        $query = $this->db->update("slb_app_rss_value", $data);
        return $query;
    }

    function get_appwise_youtube($iApplicationId){
        $this->db->select('iYoutubeId, iApplicationId, vChannelName, tDescription');
        $this->db->from('slb_app_youtube_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    function update_youtube($data,$iYoutubeId){
        $this->db->where('iYoutubeId', $iYoutubeId);
        $query = $this->db->update("slb_app_youtube_value", $data);
        return $query;
    }

    function get_youtube_by_id($iRSSId){
        $this->db->select('iRSSId, iApplicationId, vRSSURL, vIcon');
        $this->db->from('slb_app_rss_value');
        $this->db->where('iRSSId',$iRSSId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getEventImageName($iEventId){
	   $this->db->select('vImage');
        $this->db->from('slb_app_event_values');
        $this->db->where('iEventId',$iEventId);
        $query = $this->db->get();
        return $query->row_array();
    }
    function getRssImageName($iRSSId){
	   $this->db->select('vIcon');
        $this->db->from('slb_app_rss_value');
        $this->db->where('iRSSId',$iRSSId);
        $query = $this->db->get();
        return $query->row_array();
	   
    }    
    
    function deleteImageName($iEventId){   
	   $data['vImage'] = '';
	   $this->db->where('iEventId', $iEventId);
	   return $this->db->update('slb_app_event_values', $data);
	   
    }
    
    function deleteRssImageName($iRSSId){   
	   $data['vIcon'] = '';
	   $this->db->where('iRSSId', $iRSSId);
	   return $this->db->update('slb_app_rss_value', $data);
	   
    }
    
    function get_appwise_infotabdata($iApplicationId){
         $this->db->select('iInfotabId, iApplicationId, vTitle,tDescription, eStatus');
        $this->db->from('slb_app_infotab_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function save_info($Data){
        $this->db->insert("slb_app_infotab_values", $Data);
        return $this->db->insert_id();
    }
    
    function update_info($Data,$iInfotabId ){
        $this->db->where('iInfotabId ', $iInfotabId );
        $query = $this->db->update("slb_app_infotab_values", $Data);
        return $query;
    }
    
    function get_appwise_pdfs($iApplicationId){
        $this->db->select('iPdfId, vPdfTitle, vPdfFile, vPdfUrl,eFileType');
        $this->db->from(' slb_app_pdf_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->order_by("iPdfId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function save_pdf($Data){
        $this->db->insert("slb_app_pdf_values", $Data);
		return $this->db->insert_id();
    }
    
    function update_pdf($Data,$iPdfId){
		$this->db->where('iPdfId', $iPdfId);
        $query = $this->db->update("slb_app_pdf_values", $Data);
        return $query;
	}
    
    function delete_pdf($iPdfId){
        $this->db->where('iPdfId',$iPdfId);
        $query = $this->db->delete('slb_app_pdf_values', $where);
		return $query;
    }
    function getpdfinfo($iPdfId){
       $this->db->select('iPdfId, vPdfTitle, vPdfFile, vPdfUrl,eFileType');
        $this->db->from('slb_app_pdf_values');
        $this->db->where('iPdfId',$iPdfId);
        $query = $this->db->get();
        return $query->row_array();
    }

     function save_loc($Data){
        $this->db->insert("slb_app_location_value", $Data);
        return $this->db->insert_id();
    }  
    function delete_location($iLocationId){
        $this->db->where('iLocationId',$iLocationId);
        $query = $this->db->delete('slb_app_location_value', $where);
        return $query;
    }    
    function getlocinfo($iLocationId){
       $this->db->select('iLocationId, vWebsite, vEmail, vTelephone, vAddress1, vAddress2, vCity, vState, vZip, vLatitude, vLongitude, vLookupAddress');
        $this->db->from('slb_app_location_value');
        $this->db->where('iLocationId',$iLocationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    function update_location($Data,$iLocationId){
        $this->db->where('iLocationId', $iLocationId);
        $query = $this->db->update("slb_app_location_value", $Data);
        return $query;
    }
    function get_appwise_websites($iApplicationId){
        $this->db->select('iWebsiteId, iAppTabId, vWebTitle,vWebUrl,eDonation,vWebImage');
        $this->db->from('slb_app_website_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->order_by("iWebsiteId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    function save_website($Data){
        $this->db->insert("slb_app_website_values", $Data);
        return $this->db->insert_id();
    }
    function update_website($Data,$iWebsiteId){
        $this->db->where('iWebsiteId', $iWebsiteId);
        $query = $this->db->update("slb_app_website_values", $Data);
        return $query;
    } 
    
    function delete_website($iWebsiteId){
        $this->db->where('iWebsiteId',$iWebsiteId);
        $query = $this->db->delete('slb_app_website_values', $where);
        return $query;
    }    
    function getwebsiteinfo($iWebsiteId){
       $this->db->select('iWebsiteId, iApplicationId, iAppTabId, vWebTitle,vWebUrl,eDonation,vWebImage');
        $this->db->from('slb_app_website_values');
        $this->db->where('iWebsiteId',$iWebsiteId);
        $query = $this->db->get();
        return $query->row_array();
    }
                   

}
?>
