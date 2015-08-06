<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preview_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #get application info.
    function getapplication_info($iApplicationId)
    {
        $this->db->select('ai.*');
        $this->db->from('slb_appinformation ai');
        $this->db->where('ai.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getactivetabs($iApplicationId)
    {
        $this->db->select('af.iAppTabId,af.iApplicationId,af.vTitle,af.vImage,af.iIconcolorId,st.iOrderId,aif.vTitle As vTabType');
        $this->db->from('slb_appfeature AS af');
        $this->db->join('slb_sorttab AS st', 'af.iApplicationId = st.iApplicationId AND af.iAppTabId = st.iAppTabId', left);
        $this->db->join('slb_appindustryfeature AS aif', 'af.iFeatureId = aif.iFeatureId', left);        
        $this->db->where('af.iApplicationId', $iApplicationId);
        $this->db->where('af.eActive','Yes');
        $this->db->order_by("st.iOrderId", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function geticonbackground($iApplicationId){
        $this->db->select('adi.iBackgroundId,tb.vImage');
        $this->db->from('slb_app_design_ifo AS adi');
        $this->db->join('slb_buttons_tab_background AS tb', 'adi.iBackgroundId = tb.iBtntabbackgroundId', left);
        $this->db->where('adi.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getTabTypeArr(){
        $this->db->select('iFeatureId, iIndustryId, iIconId, vTitle');
        $this->db->from('slb_appindustryfeature');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function geticoncolor($iApplicationId){
        $this->db->select('adi.iIconcolorId');
        $this->db->from('slb_app_design_ifo AS adi');
        $this->db->where('adi.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappotherinfo($iApplicationId){
        $this->db->select('adi.*,tb.vImage AS tabbackground,h.vImage AS lunch_header,gh.vImage AS global_header');
        $this->db->from('slb_app_design_ifo AS adi');
        $this->db->join('slb_buttons_tab_background AS tb', 'adi.iBackgroundId = tb.iBtntabbackgroundId', left);
        $this->db->join('slb_lunch_header AS h', 'adi.iLunchheaderId = h.iLunchheaderId', left);
        $this->db->join('slb_lunch_header AS gh', 'adi.iGlobalHeaderId = gh.iLunchheaderId', left);
        
        $this->db->where('adi.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function gettabwisemainbackgroundimage($iApplicationId,$iAppTabId){
        $this->db->select('mb.iBackgroundimgId,mb.eType,mb.iAppTabId,tbb.vImage');
        $this->db->from('slb_user_tabbackground AS mb');
        $this->db->join('slb_tabbackground AS tbb', 'mb.iBackgroundimgId = tbb.iBackgroundId', left);
        $this->db->where('mb.iApplicationId', $iApplicationId);
        $this->db->where('mb.iAppTabId', $iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getvideolisting($iApplicationId,$iAppTabId){
        $this->db->select('iYoutubeId,vChannelName,tDescription');
        $this->db->from(' slb_app_youtube_value');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId', $iAppTabId);
        $query = $this->db->get();
        $test = $query->row_array();
        return $query->row_array();
    }
    
    function getappwiseevents($iApplicationId,$iAppTabId){
        $this->db->select('iEventId,vImage,vTitle,tDescription,dStartDate,vStartTime,dEndDate,vEndTime');
        $this->db->from(' slb_app_event_values');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eStatus', 'Yes');
        $this->db->order_by("iEventId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwisenews($iApplicationId,$iAppTabId){
        $this->db->select('iNewsId,eGoogleNews,vGoogleNewsKeyWords,eTweets,vTweetsKeyWords');
        $this->db->from('slb_app_news_value');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwisemallingslist($iApplicationId){
        $this->db->select('iMailinglistId,tDescription,ePromptOption,eAutomatic');
        $this->db->from(' slb_app_mailinglist_value');
        $this->db->where('iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    function gerappwiseRssfeed($iApplicationId,$iAppTabId){
        $this->db->select('iRSSId, vRSSURL,vIcon');
        $this->db->from('slb_app_rss_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function appwiseinfodata($iApplicationId,$iAppTabId){
        $this->db->select('iInfotabId, vTitle,tDescription');
        $this->db->from('slb_app_infotab_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('eStatus', 'Active');
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function appwisepdfdata($iApplicationId,$iAppTabId){
       $this->db->select('iPdfId, vPdfTitle, vPdfFile, vPdfUrl');
        $this->db->from('slb_app_pdf_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by("iPdfId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwislocationlist($iApplicationId,$iAppTabId){
        $this->db->select('iLocationId,iApplicationId,iAppTabId, vWebsite, vEmail, vTelephone, vAddress1, vAddress2, vCity, vState, vZip, vLatitude, vLongitude, vLookupAddress');
        $this->db->from('slb_app_location_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwisewebsitelist($iApplicationId,$iAppTabId){
        $this->db->select('iWebsiteId,iApplicationId, iAppTabId, vWebTitle,vWebUrl,eDonation,vWebImage');
        $this->db->from('slb_app_website_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by("iWebsiteId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function gerappwisePodcast($iApplicationId,$iAppTabId){
        $this->db->select('iPodcastId, iApplicationId,iAppTabId, vPodcastRssUrl, vPodcastIcon');
        $this->db->from('slb_app_podcast_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    
    function gerappwisevoicerecording($iApplicationId,$iAppTabId){
        $this->db->select('iVoiceRecordingId, iApplicationId,iAppTabId, tVoiceDescription,vVoiceEmail, vVoiceSubject');
        $this->db->from('slb_app_voice_recording_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}

?>