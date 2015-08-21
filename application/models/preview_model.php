<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preview_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    function get_client_info($iApplicationId){
        $this->db->select('a.iClientId, ad.vFirstName, ad.vLastName, ad.vEmail, ad.vPhone, ad.vAddress, ad.vCity, ad.iCountryId, ad.iStateId, ad.vZipCode, s.vState, c.vCountry');
        $this->db->from('r_appinformation AS a');
        $this->db->join('r_administrator AS ad', 'ad.iAdminId = a.iClientId AND ad.iRoleId=2');
        $this->db->join('r_state AS s', 'ad.iStateId = s.iStateId');
        $this->db->join('r_country AS c', 'ad.iCountryId = c.iCountryId');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }

    #get application info.
    function getapplication_info($iApplicationId)
    {
        $this->db->select('ai.*');
        $this->db->from('r_appinformation ai');
        $this->db->where('ai.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getactivetabs($iApplicationId)
    {
        $this->db->select('af.iAppTabId,af.iApplicationId,af.vTitle,af.vImage,af.iIconcolorId,st.iOrderId,aif.vTitle As vTabType');
        $this->db->from('r_appfeature AS af');
        $this->db->join('r_sorttab AS st', 'af.iApplicationId = st.iApplicationId AND af.iAppTabId = st.iAppTabId', left);
        $this->db->join('r_appindustryfeature AS aif', 'af.iFeatureId = aif.iFeatureId', left);        
        $this->db->where('af.iApplicationId', $iApplicationId);
        $this->db->where('af.eActive','Yes');
        $this->db->order_by("st.iOrderId", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function geticonbackground($iApplicationId)
	{
        $this->db->select('adi.iBackgroundId,tb.vImage');
        $this->db->from('r_app_design_ifo AS adi');
        $this->db->join('r_buttons_tab_background AS tb', 'adi.iBackgroundId = tb.iBtntabbackgroundId', left);
        $this->db->where('adi.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getTabTypeArr(){
        $this->db->select('iFeatureId, iIndustryId, iIconId, vTitle');
        $this->db->from('r_appindustryfeature');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function geticoncolor($iApplicationId){
        $this->db->select('adi.iIconcolorId');
        $this->db->from('r_app_design_ifo AS adi');
        $this->db->where('adi.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappotherinfo($iApplicationId){
        $this->db->select('adi.*,tb.vImage AS tabbackground,h.vImage AS lunch_header,gh.vImage AS global_header');
        $this->db->from('r_app_design_ifo AS adi');
        $this->db->join('r_buttons_tab_background AS tb', 'adi.iBackgroundId = tb.iBtntabbackgroundId', left);
        $this->db->join('r_lunch_header AS h', 'adi.iLunchheaderId = h.iLunchheaderId', left);
        $this->db->join('r_lunch_header AS gh', 'adi.iGlobalHeaderId = gh.iLunchheaderId', left);
        
        $this->db->where('adi.iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function gettabwisemainbackgroundimage($iApplicationId,$iAppTabId){
        $this->db->select('mb.iBackgroundimgId,mb.eType,mb.iAppTabId,tbb.vImage');
        $this->db->from('r_user_tabbackground AS mb');
        $this->db->join('r_tabbackground AS tbb', 'mb.iBackgroundimgId = tbb.iBackgroundId', left);
        $this->db->where('mb.iApplicationId', $iApplicationId);
        $this->db->where('mb.iAppTabId', $iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getvideolisting($iApplicationId,$iAppTabId){
        $this->db->select('iYoutubeId,vChannelName,tDescription');
        $this->db->from(' r_app_youtube_value');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId', $iAppTabId);
        $query = $this->db->get();
        $test = $query->row_array();
        return $query->row_array();
    }
    
    function getappwiseevents($iApplicationId,$iAppTabId){
        $this->db->select('iEventId,vImage,vTitle,tDescription,dStartDate,vStartTime,dEndDate,vEndTime');
        $this->db->from(' r_app_event_values');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eStatus', 'Yes');
        $this->db->order_by("iEventId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwisenews($iApplicationId,$iAppTabId){
        $this->db->select('iNewsId,eGoogleNews,vGoogleNewsKeyWords,eTweets,vTweetsKeyWords');
        $this->db->from('r_app_news_value');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwisemallingslist($iApplicationId){
        $this->db->select('iMailinglistId,tDescription,ePromptOption,eAutomatic');
        $this->db->from(' r_app_mailinglist_value');
        $this->db->where('iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    function gerappwiseRssfeed($iApplicationId,$iAppTabId){
        $this->db->select('iRSSId, vRSSURL,vIcon, iAppTabId');
        $this->db->from('r_app_rss_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function appwiseinfodata($iApplicationId,$iAppTabId){
        $this->db->select('iInfotabId, vTitle,tDescription');
        $this->db->from('r_app_infotab_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('eStatus', 'Active');
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function appwisepdfdata($iApplicationId,$iAppTabId){
       $this->db->select('iPdfId, vPdfTitle, vPdfFile, vPdfUrl');
        $this->db->from('r_app_pdf_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by("iPdfId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwislocationlist($iApplicationId,$iAppTabId){
        $this->db->select('iLocationId,iApplicationId,iAppTabId, vWebsite, vEmail, vTelephone, vAddress1, vAddress2, vCity, vState, vZip, vLatitude, vLongitude, vLookupAddress,vLocationTitle');
        $this->db->from('r_app_location_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }

    // mayur gajjar
    function getappwisarounduslist($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_aroundus_gen_info');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	// with join
	function getappwisarounduslistjoin($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_aroundus_gen_info as ra');
		$this->db->join('r_app_aroundus_category AS rg', 'ra.rCatId = rg.rCatId', left);
        $this->db->where('ra.iApplicationId',$iApplicationId);
        $this->db->where('ra.iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function getappwisewebsitelist($iApplicationId,$iAppTabId){
        $this->db->select('iWebsiteId,iApplicationId, iAppTabId, vWebTitle,vWebUrl,eDonation,vWebImage');
        $this->db->from('r_app_website_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by("iWebsiteId", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    function getappwisesociallist($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_socialmedia_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->order_by("iSocialMediaID", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function gerappwisePodcast($iApplicationId,$iAppTabId){
        $this->db->select('iPodcastId, iApplicationId,iAppTabId, vPodcastRssUrl, vPodcastIcon');
        $this->db->from('r_app_podcast_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    
    function gerappwisevoicerecording($iApplicationId,$iAppTabId){
        $this->db->select('iVoiceRecordingId, iApplicationId,iAppTabId, tVoiceDescription,vVoiceEmail, vVoiceSubject');
        $this->db->from('r_app_voice_recording_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }

    function gettabwisecategory($iApplicationId,$iAppTabId){
        $this->db->select('iMailcategoryId, iApplicationId,iAppTabId,vName');
        $this->db->from('r_app_mailing_category');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function gettabwisepayment($iClientId, $iApplicationId, $iAppTabId){
        $this->db->select('iAppFeeTypeId, iClientId, iAppTabId, vFeetype, fPrice');
        $this->db->from('r_app_feetype_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iClientId',$iClientId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function gettabwisehome($iApplicationId, $iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_home_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();   
    }
    
    function getgallerydetail($iApplicationId, $iAppTabId){
        $this->db->select('*');
        $this->db->from('r_app_gallery_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getgalleryimages($iGalleryId){
        $this->db->select('*');
        $this->db->from('r_app_gallery_images');
        $this->db->where('iGalleryId',$iGalleryId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get2tirepageslist($vSection,$iApplicationId, $iAppTabId){
        $this->db->select('*');
        $this->db->from('r_app_twotire_infotab_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('vSection',$vSection);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get2tiresectionlist($iApplicationId, $iAppTabId){
        $this->db->select('DISTINCT(vSection)');
        $this->db->from('r_app_twotire_infotab_values');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getdeafaultbackground($iApplicationId){
        $this->db->select('iBackgroundId,iApplicationId,eType');
        $this->db->from('r_app_default_background_img');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getbackgroundimage($iBackgroundId){
        $this->db->select('iBackgroundId,vImage');
        $this->db->from('r_tabbackground');
        $this->db->where('iBackgroundId',$iBackgroundId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getapplicationwisebackgroundslider($iApplicationId){
        
        $this->db->select('iApplicationId,iSliderImg1Id,iSliderImg2Id,iSliderImg3Id,iSliderImg4Id,iSliderImg5Id,vSliderMode');
        $this->db->from('r_app_slider_img_value');
        $this->db->where('iApplicationId', $iApplicationId);
        $query = $this->db->get();
        return $query->row_array();
    }
    /*Made By :- MaksudKhan
    Description :- getItem
    Date:- 13-8-14

    */ 
    function getappwisemenu($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_menu_catagory');
        $this->db->where('iApplicationId', $iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('vStatus', 'Active');
        $this->db->order_by("iMenuID", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
	
	 function getappwiseorder($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from(' r_menu_catagory');
        $this->db->where('iApplicationId', $iApplicationId);
      //  $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('vStatus', 'Active');
        $this->db->order_by("iMenuID", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    /** 
        Name :Mayur Gajjar
        Change : Around us data get function
        Date : 8/8/2014
    **/
    
    function getappwisarounduslistcategory($iApplicationId,$iAppTabId)
    {
        $this->db->select('');
        $this->db->from('r_app_aroundus_category');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	function get_userid_app($iApplicationId)
	{
		$this->db->select('');
		$this->db->from('r_application_user');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
	}
	
	// loyalty details
	function getappwiseloyaltylist($iApplicationId,$iAppTabId){
		$this->db->select('');
		$this->db->from('r_app_loyalty_values');
        $this->db->where('iApplicationId',$iApplicationId);
		$this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
	}
	
	/*function getappwisarounduslistcategory($iApplicationId,$iAppTabId){
		$this->db->select('');
		$this->db->from('r_app_aroundus_category');
        $this->db->where('iApplicationId',$iApplicationId);
		$this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
	}*/
	
	function get_count_loyalty($iLoyaltyId){
		$this->db->select('count(*) As count');
		$this->db->from('r_app_loyalty_user_detail');
        $this->db->where('iLoyaltyID',$iLoyaltyId);
	    $query = $this->db->get();
        return $query->result_array();
	}
	
	
	/**
		Developer : Himanshu
		Date : 1/9/2014
		Description : Reservation
	**/
	
	// Himanshu Rathod Reservation functions start
    function getappwiseresserv($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_reservation_service');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwiseresgeninfo($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_reservation_general_info');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getappwiseresloc($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_reservation_location');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $query = $this->db->get();
        return $query->result_array();
    }    
	
	function get_home_lat_long($iApplicationId){
		$this->db->select('');
        $this->db->from('r_app_home_value');
        $this->db->where('iApplicationId',$iApplicationId);
        $query = $this->db->get();
        return $query->result_array();
	}
    
    // Himanshu Rathod Reservation functions end
	
	function get_home_tab_details($iHometabId){
		$this->db->select('');
        $this->db->from('r_app_home_addopeningtime');
        $this->db->where('iHometabId',$iHometabId);
        $query = $this->db->get();
        return $query->result_array();
	}

    // Made by maksud for qr code data fetch

     function getappwiseqrcode($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->from('r_app_qrcode_values');
        $this->db->where('iApplicationId', $iApplicationId);
      //  $this->db->where('iAppTabId',$iAppTabId);
        $this->db->where('eStatus', 'Active');
        $this->db->order_by("iQrID", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    /**
    	packages details
    **/
    function get_packages_details($iClinetId)
    {
    	$this->db->select('*');
        $this->db->from('r_packages_value_paypal');
        $this->db->where('iAdminId', $iClinetId);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_packages_details_model($iAdminId,$iIndustryId)
    {
        $this->db->select('*');
        $this->db->from('r_packages_value_paypal');
        $this->db->where('iAdminId', $iAdminId);
        $this->db->where('vCategoryId', $iIndustryId);
        $this->db->order_by('iPackageId','DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->row_array();
    }
	
	/** total show tabs**/
	function get_total_show_tabs($iApplicationId,$lang,$iAdminId)
	{
		/** check **/
		if($iApplicationId != '')
		{
			/** get features of application **/
			$features = $this->get_features_order_application($iApplicationId);
			
            /** Features **/
			if(count($features) > 0){
                /** features by packages **/
                $iIndustryId = $features[0]['iIndustryId'];
			    $packages = $this->get_packages_details_model($iAdminId,$iIndustryId);		


                if(count($packages) >0){
				    /** packages **/
					if($packages['vPackage'] == 'bronze'){
                    	/** home details **/
						$home_details = $this->get_format_of_show_tabs_bronze($features,$lang);	
					}else if($packages['vPackage'] == 'silver'){
						/** home details **/
						$home_details = $this->get_format_of_show_tabs_silver($features,$lang);
					}else if($packages['vPackage'] == 'gold'){
                    	/** home details **/
						$home_details = $this->get_format_of_show_tabs_gold($features,$lang);
					}
				}else{
					$home_details = $this->get_format_of_show_tabs_gold($features,$lang);						
				}
				/* Exit */
				
			}else{
				/** Details **/
				$home_details = '{"iApplicationId":"'.$Data['iApplicationId'].'","status":"Fail"}';
			} 
		}else{
			/** Details **/
			$Data['status'] = "Fail";
		}

        return $home_details;
		exit;
	}
	
	/** get feature order application **/
	function get_features_order_application($iApplicationId)
	{
		/** home details **/
		$this->db->select('ra.vTitle Tabname,rl.*,ri.iIndustryId,rs.iOrderId');
		$this->db->from('r_appfeature as rl');
        $this->db->join('r_appindustryfeature as ra','rl.iFeatureId=ra.iFeatureId','inner');
        $this->db->join('r_appinformation as ri','ri.iApplicationId=rl.iApplicationId','inner');
        $this->db->join('r_sorttab as rs','rs.iAppTabId=rl.iAppTabId','inner');
        $this->db->where('rl.iApplicationId',$iApplicationId);
        $this->db->order_by('rs.iOrderId', 'asc');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	
	/** show tabs in silver **/
	function get_format_of_show_tabs_silver($features,$lang)
	{	
		$all_tabs='';
		$all_tabs.='Ext.define("MyApp.view.MainView", {
		extend: "Ext.tab.Panel",
		xtype: "mainview",
		requires: [
			"MyApp.view.home.HomeView",
			"MyApp.view.youtube.YouTube",
			"MyApp.view.service.ServiceView",
			"MyApp.view.message.MessageView",
			"MyApp.view.youtube.YouTubeNavi",
			"MyApp.view.Loyality.LoyalitiNavi",
			"MyApp.view.OrderView.OrderNavi",
			"MyApp.view.gallary.GallaryNaviView",
			"MyApp.view.website.WebsiteNavi",
			"MyApp.view.socialmedia.SocialMediaView",
			"MyApp.view.custom.CustomView",
			"MyApp.view.pdf.PdfNavi",
			"MyApp.view.qrcode.QRNavi",
			"MyApp.view.rss.rssNavi",
			"MyApp.view.event.EventNavi",
			"MyApp.view.notepad.NotepadNavi",
			"MyApp.view.fanwall.FanwallNavi",
			"MyApp.view.menu.MenuNavi",
			"MyApp.view.news.NewsNavi",
			"MyApp.view.voicerecording.VoiceRecording",
			"MyApp.view.reservation.ReservationNavi",
			"MyApp.view.arround.ArroundNavi",
			"MyApp.view.location.LocationNavi",
			"MyApp.view.contactus.ContactView",
			"MyApp.view.mailinglist.MailingList", 
			"MyApp.view.Downloads.DownloadList",
			"MyApp.view.partner.PartnerView",
			"MyApp.view.calculator.MortgageCalculator",
			"MyApp.view.ScientificCalculator.ScientificCalculatorView",
			"MyApp.view.scanner.ScannerView",
			"MyApp.view.appointment.AppointmentView",
			"MyApp.view.quote.QuoteView",
			"MyApp.view.review.Review",
			"MyApp.view.testimonial.TestimonialView",
			"MyApp.view.coupen.CoupenView",
			"MyApp.view.survay.SurvayView",
			"MyApp.view.catelog.CatelogNavi",
			"MyApp.view.newarrival.NewArrivalNavi",
			"MyApp.view.donation.DonationNavi",
			"MyApp.view.service.ServiceNavi",
			"MyApp.view.ticketinfo.TicketInfoView",
			"MyApp.view.ecommarce.EcommarceNavi",
			"MyApp.view.blog.BlogNavi",
			"MyApp.view.menuoftheday.MenudayNavi"
		],
		config: {
			fullscreen: true,
			tabBar: {
				docked: "bottom",
				scrollable: {
					direction: "horizontal",
					indicators: false
				},
			},
			layout: {
				type: "card",
				animation: {
					type: "slide",
					duration: 500,
				}
			},
			defaults: {
				styleHtmlContent: true
			},'."\n";
		
		$all_tabs.='items: ['."\n";
        foreach($features as $val)
        {
            /** Tabname **/
            if($val['Tabname'] == 'Home')
            {
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "homeview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "icnhomeTab","iconCls": "homeCls","iconMask": true},'; 
                    }
                }
            }else if($val['Tabname'] == 'Event'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "eventnavi","title": "'.$ver['rField'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Mailinglist'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "mailinglistview","title": "'.$ver['rField'].'","tabCls":"mailinglistTab","iconCls": "mailinglistCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'PDF'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "pdfnavi","title": "'.$ver['rField'].'","tabCls": "pdfTab","iconCls": "pdfCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'RSS Feeds'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "rssnavi","title":"'.$ver['rField'].'","tabCls":"rssTab","iconCls":"rssCls","iconMask":true},';
                    }
                }
            }else if($val['Tabname'] == 'Website'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "websitenavi","title": "'.$ver['rField'].'","tabCls": "websiteTab","iconCls": "websiteCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'YouTube'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "youtubenavi","title": "'.$ver['rField'].'","tabCls": "youtubeTab","iconCls": "youtubeCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Location'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "locationnavi","title": "'.$ver['rField'].'","tabCls": "locationTab","iconCls": "locationCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Gallery'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "gallarynaviview","title": "'.$ver['rField'].'","tabCls": "gallaryTab","iconCls": "gallaryCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Around Us'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "arroundnavi","title": "'.$ver['rField'].'","tabCls": "arroundusTab","iconCls": "arroundusCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'SocialMedia'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "socialmediaview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "socialsiteTab","iconCls": "socialsiteCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Coupon'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "qrnavi","title": "'.$ver['rField'].'","tabCls": "qrTab","iconCls": "qrCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Informations'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "customview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "customTab","iconCls": "customCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Menu'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "menunavi","title": "'.$ver['rField'].'","tabCls": "menuTab","iconCls": "menuCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Reservation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "reservationnavi","title": "'.$ver['rField'].'","tabCls": "reservationTab","iconCls": "reservationCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Notepad'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "notepadnavi","title": "'.$ver['rField'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Voice Recording'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "voicerecording","title": "'.$ver['rField'].'","tabCls": "voicerecordingTab","iconCls": "voicerecordingCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'News'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "newsnavi","title": "'.$ver['rField'].'","tabCls": "newsTab","iconCls": "newsCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'ContactUs'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "contactview","title": "'.$ver['rField'].'","tabCls": "contactTab","iconCls": "contactCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Message'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "messageview","title": "'.$ver['rField'].'","tabCls": "messageTab","iconCls": "messageCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Loan Calculator'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "mortgagecalculator","title": "'.$ver['rField'].'","tabCls": "MortgageCalcTab","iconCls": "MortgageCalcCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Calculator'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "scientificcalculatorview","title": "'.$ver['rField'].'","tabCls": "ScientificCalTab","iconCls": "ScientificCalCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Scanner'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "scannerview","title": "'.$ver['rField'].'","tabCls": "scannerTab","iconCls": "scannerCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Appointment'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "appointmentview","title": "'.$ver['rField'].'","tabCls": "appointmentTab","iconCls": "appointmentCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Quotation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "quoteview","title": "'.$ver['rField'].'","tabCls": "quoteTab","iconCls": "quoteCls","iconMask": true},';
                    }
                }    
            }else if($val['Tabname'] == 'Review'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "review","title": "'.$ver['rField'].'","tabCls": "reviewTab","iconCls": "reviewCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Testimonial'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "testimonialview","title": "'.$ver['rField'].'","tabCls": "testimonialTab","iconCls": "testimonialCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Catalogue'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "catelognavi","title": "'.$ver['rField'].'","tabCls": "catelogTab","iconCls": "catelogCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'New Arrival'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "newarrivalnavi","title": "'.$ver['rField'].'","tabCls": "newarrivalTab","iconCls": "newarrivalCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Donation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "donationnavi","title": "'.$ver['rField'].'","tabCls": "donationTab","iconCls": "donationCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Service'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "servicenavi","title": "'.$ver['rField'].'","tabCls": "serviceTab","iconCls": "serviceCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Ticket Info'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "ticketinfoview","title": "'.$ver['rField'].'","tabCls": "ticketTab","iconCls": "ticketCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Blog'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "blognavi","title": "'.$ver['rField'].'","tabCls": "blogTab","iconCls": "blogCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Menu of the day'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "menudaynavi","title": "'.$ver['rField'].'","tabCls": "menudayTab","iconCls":  "menudayCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Fidelity'){
                 foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "loyalitinavi","title": "'.$ver['rField'].'","tabCls": "loyalityTab","iconCls":  "LoyalityCls","iconMask": true},';
                    }
                }
            }
        }
        
        /** remove comma from string **/
        $tabs .= rtrim($all_tabs,",");
        $tabs .= '],
                },
            });';
		
		return $tabs;
	}
	
	/** show tabs in bronze **/
	function get_format_of_show_tabs_bronze($features,$lang)
	{	
		$all_tabs='';
		$all_tabs.='Ext.define("MyApp.view.MainView", {
		extend: "Ext.tab.Panel",
		xtype: "mainview",
		requires: [
			"MyApp.view.home.HomeView",
			"MyApp.view.youtube.YouTube",
			"MyApp.view.service.ServiceView",
			"MyApp.view.message.MessageView",
			"MyApp.view.youtube.YouTubeNavi",
			"MyApp.view.Loyality.LoyalitiNavi",
			"MyApp.view.OrderView.OrderNavi",
			"MyApp.view.gallary.GallaryNaviView",
			"MyApp.view.website.WebsiteNavi",
			"MyApp.view.socialmedia.SocialMediaView",
			"MyApp.view.custom.CustomView",
			"MyApp.view.pdf.PdfNavi",
			"MyApp.view.qrcode.QRNavi",
			"MyApp.view.rss.rssNavi",
			"MyApp.view.event.EventNavi",
			"MyApp.view.notepad.NotepadNavi",
			"MyApp.view.fanwall.FanwallNavi",
			"MyApp.view.menu.MenuNavi",
			"MyApp.view.news.NewsNavi",
			"MyApp.view.voicerecording.VoiceRecording",
			"MyApp.view.reservation.ReservationNavi",
			"MyApp.view.arround.ArroundNavi",
			"MyApp.view.location.LocationNavi",
			"MyApp.view.contactus.ContactView",
			"MyApp.view.mailinglist.MailingList", 
			"MyApp.view.Downloads.DownloadList",
			"MyApp.view.partner.PartnerView",
			"MyApp.view.calculator.MortgageCalculator",
			"MyApp.view.ScientificCalculator.ScientificCalculatorView",
			"MyApp.view.scanner.ScannerView",
			"MyApp.view.appointment.AppointmentView",
			"MyApp.view.quote.QuoteView",
			"MyApp.view.review.Review",
			"MyApp.view.testimonial.TestimonialView",
			"MyApp.view.coupen.CoupenView",
			"MyApp.view.survay.SurvayView",
			"MyApp.view.catelog.CatelogNavi",
			"MyApp.view.newarrival.NewArrivalNavi",
			"MyApp.view.donation.DonationNavi",
			"MyApp.view.service.ServiceNavi",
			"MyApp.view.ticketinfo.TicketInfoView",
			"MyApp.view.ecommarce.EcommarceNavi",
			"MyApp.view.blog.BlogNavi",
			"MyApp.view.menuoftheday.MenudayNavi"
		],
		config: {
			fullscreen: true,
			tabBar: {
				docked: "bottom",
				scrollable: {
					direction: "horizontal",
					indicators: false
				},
			},
			layout: {
				type: "card",
				animation: {
					type: "slide",
					duration: 500,
				}
			},
			defaults: {
				styleHtmlContent: true
			},'."\n";
		
		$all_tabs.='items: ['."\n";
        foreach($features as $val)
        {
            /** Tabname **/
            if($val['Tabname'] == 'Home')
            {
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "homeview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "icnhomeTab","iconCls": "homeCls","iconMask": true},'; 
                    }
                }
            }else if($val['Tabname'] == 'Event'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "eventnavi","title": "'.$ver['rField'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Mailinglist'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "mailinglistview","title": "'.$ver['rField'].'","tabCls":"mailinglistTab","iconCls": "mailinglistCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'PDF'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "pdfnavi","title": "'.$ver['rField'].'","tabCls": "pdfTab","iconCls": "pdfCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'RSS Feeds'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "rssnavi","title":"'.$ver['rField'].'","tabCls":"rssTab","iconCls":"rssCls","iconMask":true},';
                    }
                }
            }else if($val['Tabname'] == 'Website'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "websitenavi","title": "'.$ver['rField'].'","tabCls": "websiteTab","iconCls": "websiteCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'YouTube'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "youtubenavi","title": "'.$ver['rField'].'","tabCls": "youtubeTab","iconCls": "youtubeCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Location'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "locationnavi","title": "'.$ver['rField'].'","tabCls": "locationTab","iconCls": "locationCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Gallery'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "gallarynaviview","title": "'.$ver['rField'].'","tabCls": "gallaryTab","iconCls": "gallaryCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Around Us'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "arroundnavi","title": "'.$ver['rField'].'","tabCls": "arroundusTab","iconCls": "arroundusCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'SocialMedia'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "socialmediaview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "socialsiteTab","iconCls": "socialsiteCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Coupon'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "qrnavi","title": "'.$ver['rField'].'","tabCls": "qrTab","iconCls": "qrCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Informations'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "customview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "customTab","iconCls": "customCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Menu'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "menunavi","title": "'.$ver['rField'].'","tabCls": "menuTab","iconCls": "menuCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Reservation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "reservationnavi","title": "'.$ver['rField'].'","tabCls": "reservationTab","iconCls": "reservationCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Notepad'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "notepadnavi","title": "'.$ver['rField'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Voice Recording'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "voicerecording","title": "'.$ver['rField'].'","tabCls": "voicerecordingTab","iconCls": "voicerecordingCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'ContactUs'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "contactview","title": "'.$ver['rField'].'","tabCls": "contactTab","iconCls": "contactCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Message'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "messageview","title": "'.$ver['rField'].'","tabCls": "messageTab","iconCls": "messageCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'News'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "newsnavi","title": "'.$ver['rField'].'","tabCls": "newsTab","iconCls": "newsCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Loan Calculator'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "mortgagecalculator","title": "'.$ver['rField'].'","tabCls": "MortgageCalcTab","iconCls": "MortgageCalcCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Calculator'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "scientificcalculatorview","title": "'.$ver['rField'].'","tabCls": "ScientificCalTab","iconCls": "ScientificCalCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Scanner'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "scannerview","title": "'.$ver['rField'].'","tabCls": "scannerTab","iconCls": "scannerCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Appointment'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "appointmentview","title": "'.$ver['rField'].'","tabCls": "appointmentTab","iconCls": "appointmentCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Quotation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "quoteview","title": "'.$ver['rField'].'","tabCls": "quoteTab","iconCls": "quoteCls","iconMask": true},';
                    }
                }    
            }else if($val['Tabname'] == 'Review'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "review","title": "'.$ver['rField'].'","tabCls": "reviewTab","iconCls": "reviewCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Testimonial'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "testimonialview","title": "'.$ver['rField'].'","tabCls": "testimonialTab","iconCls": "testimonialCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Catalogue'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "catelognavi","title": "'.$ver['rField'].'","tabCls": "catelogTab","iconCls": "catelogCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'New Arrival'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "newarrivalnavi","title": "'.$ver['rField'].'","tabCls": "newarrivalTab","iconCls": "newarrivalCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Donation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "donationnavi","title": "'.$ver['rField'].'","tabCls": "donationTab","iconCls": "donationCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Service'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "servicenavi","title": "'.$ver['rField'].'","tabCls": "serviceTab","iconCls": "serviceCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Ticket Info'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "ticketinfoview","title": "'.$ver['rField'].'","tabCls": "ticketTab","iconCls": "ticketCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Blog'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "blognavi","title": "'.$ver['rField'].'","tabCls": "blogTab","iconCls": "blogCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Menu of the day'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "menudaynavi","title": "'.$ver['rField'].'","tabCls": "menudayTab","iconCls":  "menudayCls","iconMask": true},';
                    }
                }
            }else if($val['Tabname'] == 'Fidelity'){
                 foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "loyalitinavi","title": "'.$ver['rField'].'","tabCls": "loyalityTab","iconCls":  "LoyalityCls","iconMask": true},';
                    }
                }
            }
        }
        
        /** remove comma from string **/
        $tabs .= rtrim($all_tabs,",");
        $tabs .= '],
                },
            });';
		
		return $tabs;
	}
	
	/** MainView.js file Gold **/
	function get_format_of_show_tabs_gold($features,$lang)
	{	
        $all_tabs='';
		$all_tabs.='Ext.define("MyApp.view.MainView", {
		extend: "Ext.tab.Panel",
		xtype: "mainview",
		requires: [
			"MyApp.view.home.HomeView",
            "MyApp.view.Loyality.LoyalitiNavi",
			"MyApp.view.youtube.YouTube",
			"MyApp.view.service.ServiceView",
			"MyApp.view.message.MessageView",
			"MyApp.view.youtube.YouTubeNavi",
			"MyApp.view.Loyality.LoyalitiNavi",
			"MyApp.view.OrderView.OrderNavi",
			"MyApp.view.gallary.GallaryNaviView",
			"MyApp.view.website.WebsiteNavi",
			"MyApp.view.socialmedia.SocialMediaView",
			"MyApp.view.custom.CustomView",
			"MyApp.view.pdf.PdfNavi",
			"MyApp.view.qrcode.QRNavi",
			"MyApp.view.rss.rssNavi",
			"MyApp.view.event.EventNavi",
			"MyApp.view.notepad.NotepadNavi",
			"MyApp.view.fanwall.FanwallNavi",
			"MyApp.view.menu.MenuNavi",
			"MyApp.view.news.NewsNavi",
			"MyApp.view.voicerecording.VoiceRecording",
			"MyApp.view.reservation.ReservationNavi",
			"MyApp.view.arround.ArroundNavi",
			"MyApp.view.location.LocationNavi",
			"MyApp.view.contactus.ContactView",
			"MyApp.view.mailinglist.MailingList", 
			"MyApp.view.Downloads.DownloadList",
			"MyApp.view.partner.PartnerView",
			"MyApp.view.calculator.MortgageCalculator",
			"MyApp.view.ScientificCalculator.ScientificCalculatorView",
			"MyApp.view.scanner.ScannerView",
			"MyApp.view.appointment.AppointmentView",
			"MyApp.view.quote.QuoteView",
			"MyApp.view.review.Review",
			"MyApp.view.testimonial.TestimonialView",
			"MyApp.view.coupen.CoupenView",
			"MyApp.view.survay.SurvayView",
			"MyApp.view.catelog.CatelogNavi",
			"MyApp.view.newarrival.NewArrivalNavi",
			"MyApp.view.donation.DonationNavi",
			"MyApp.view.service.ServiceNavi",
			"MyApp.view.ticketinfo.TicketInfoView",
			"MyApp.view.ecommarce.EcommarceNavi",
			"MyApp.view.blog.BlogNavi",
			"MyApp.view.menuoftheday.MenudayNavi"
		],
		config: {
			fullscreen: true,
			tabBar: {
				docked: "bottom",
				scrollable: {
					direction: "horizontal",
					indicators: false
				},
			},
			layout: {
				type: "card",
				animation: {
					type: "slide",
					duration: 500,
				}
			},
			defaults: {
				styleHtmlContent: true
			},'."\n";
		
		$all_tabs.='items: ['."\n";
		foreach($features as $val)
		{
			/** Tabname **/
			if($val['Tabname'] == 'Home')
			{
				foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "homeview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "icnhomeTab","iconCls": "homeCls","iconMask": true},'; 
                    }
                }
			}else if($val['Tabname'] == 'Event'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "eventnavi","title": "'.$ver['rField'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Mailinglist'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "mailinglistview","title": "'.$ver['rField'].'","tabCls":"mailinglistTab","iconCls": "mailinglistCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'PDF'){
			    foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "pdfnavi","title": "'.$ver['rField'].'","tabCls": "pdfTab","iconCls": "pdfCls","iconMask": true},';
                    }
                }
          	}else if($val['Tabname'] == 'RSS Feeds'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "rssnavi","title":"'.$ver['rField'].'","tabCls":"rssTab","iconCls":"rssCls","iconMask":true},';
                    }
                }
			}else if($val['Tabname'] == 'Website'){
				foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "websitenavi","title": "'.$ver['rField'].'","tabCls": "websiteTab","iconCls": "websiteCls","iconMask": true},';
                    }
                }
          	}else if($val['Tabname'] == 'YouTube'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "youtubenavi","title": "'.$ver['rField'].'","tabCls": "youtubeTab","iconCls": "youtubeCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Location'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "locationnavi","title": "'.$ver['rField'].'","tabCls": "locationTab","iconCls": "locationCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Gallery'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "gallarynaviview","title": "'.$ver['rField'].'","tabCls": "gallaryTab","iconCls": "gallaryCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Around Us'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "arroundnavi","title": "'.$ver['rField'].'","tabCls": "arroundusTab","iconCls": "arroundusCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'SocialMedia'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "socialmediaview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "socialsiteTab","iconCls": "socialsiteCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Coupon'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                           $all_tabs .= '{"xtype": "qrnavi","title": "'.$ver['rField'].'","tabCls": "qrTab","iconCls": "qrCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Informations'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "customview","title": "'.$ver['rField'].'","layout": "fit","tabCls": "customTab","iconCls": "customCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Menu'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "menunavi","title": "'.$ver['rField'].'","tabCls": "menuTab","iconCls": "menuCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Reservation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "reservationnavi","title": "'.$ver['rField'].'","tabCls": "reservationTab","iconCls": "reservationCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Notepad'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "notepadnavi","title": "'.$ver['rField'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Voice Recording'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "voicerecording","title": "'.$ver['rField'].'","tabCls": "voicerecordingTab","iconCls": "voicerecordingCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'ContactUs'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "contactview","title": "'.$ver['rField'].'","tabCls": "contactTab","iconCls": "contactCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Message'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "messageview","title": "'.$ver['rField'].'","tabCls": "messageTab","iconCls": "messageCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'News'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "newsnavi","title": "'.$ver['rField'].'","tabCls": "newsTab","iconCls": "newsCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Loan Calculator'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "mortgagecalculator","title": "'.$ver['rField'].'","tabCls": "MortgageCalcTab","iconCls": "MortgageCalcCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Calculator'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "scientificcalculatorview","title": "'.$ver['rField'].'","tabCls": "ScientificCalTab","iconCls": "ScientificCalCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Scanner'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "scannerview","title": "'.$ver['rField'].'","tabCls": "scannerTab","iconCls": "scannerCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Appointment'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "appointmentview","title": "'.$ver['rField'].'","tabCls": "appointmentTab","iconCls": "appointmentCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Quotation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "quoteview","title": "'.$ver['rField'].'","tabCls": "quoteTab","iconCls": "quoteCls","iconMask": true},';
                    }
                }    
			}else if($val['Tabname'] == 'Review'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "review","title": "'.$ver['rField'].'","tabCls": "reviewTab","iconCls": "reviewCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Testimonial'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "testimonialview","title": "'.$ver['rField'].'","tabCls": "testimonialTab","iconCls": "testimonialCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Catalogue'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "catelognavi","title": "'.$ver['rField'].'","tabCls": "catelogTab","iconCls": "catelogCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'New Arrival'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "newarrivalnavi","title": "'.$ver['rField'].'","tabCls": "newarrivalTab","iconCls": "newarrivalCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Donation'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "donationnavi","title": "'.$ver['rField'].'","tabCls": "donationTab","iconCls": "donationCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Service'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "servicenavi","title": "'.$ver['rField'].'","tabCls": "serviceTab","iconCls": "serviceCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Ticket Info'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                            $all_tabs .= '{"xtype": "ticketinfoview","title": "'.$ver['rField'].'","tabCls": "ticketTab","iconCls": "ticketCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Blog'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "blognavi","title": "'.$ver['rField'].'","tabCls": "blogTab","iconCls": "blogCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Menu of the day'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "menudaynavi","title": "'.$ver['rField'].'","tabCls": "menudayTab","iconCls":  "menudayCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Order'){
                foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "ordernavi","title": "'.$ver['rField'].'","tabCls": "orderTab","iconCls":  "orderCls","iconMask": true},';
                    }
                }
			}else if($val['Tabname'] == 'Fidelity'){
                 foreach($lang as $ver){
                    if($ver['rLabelName'] == $val['vTitle']){
                        $all_tabs .= '{"xtype": "loyalitinavi","title": "'.$ver['rField'].'","tabCls": "loyalityTab","iconCls":  "LoyalityCls","iconMask": true},';
                    }
                }
            }
		}
		
		/** remove comma from string **/
		$tabs .= rtrim($all_tabs,",");
		$tabs .= '],
				},
			});';
		
		return $tabs;
	}


    /** style sheet for sencha **/
    public function get_stylesheet_sencha_touch($iFeatureId,$base_upload){

        $style = '';
        $style.= '';
        foreach($iFeatureId as $val){
            if($val['vTitle'] == 'Home'){
                 $style .= '.homeCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }';        
            }else if($val['vTitle'] == 'YouTube'){
                $style .= '.youtubeCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Informations'){
                $style .= '.customCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'ContactUs'){
                $style .= '.contactCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Order'){
                $style .= '.orderCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Fidelity'){
                $style .= '.LoyalityCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Gallery'){
                $style .= '.gallaryCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Website'){
                $style .= '.websiteCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'SocialMedia'){
                $style .= '.socialsiteCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'PDF'){
                $style .= '.pdfCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Coupon'){
                $style .= '.qrCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'RSS Feeds'){
                $style .= '.rssCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Menu'){
                $style .= '.menuCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Event'){
                $style .= '.eventCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Reservation'){
                $style .= '.reservationCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'AroundUs'){
                $style .= '.arroundusCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Voice Recording'){
                $style .= '.voicerecordingCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Location'){
                $style .= '.locationCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Mailinglist'){
                $style .= '.mailinglistCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Message'){
                $style .= '.messageCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Loan Calculator'){
                $style .= '.MortgageCalcCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Calculator'){
               $style .= '.ScientificCalCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Menu of the day'){
               $style .= '.menudayCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Blog'){
               $style .= '.blogCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Ecommerce'){
               $style .= '.ecommerceCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Ticket Info'){
               $style .= '.ticketCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Service'){
               $style .= '.serviceCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Donation'){
               $style .= '.donationCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'New Arrival'){
               $style .= '.newarrivalCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Catalogue'){
               $style .= '.catelogCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Coupon'){
               $style .= '.coupenCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }else if($val['vTitle'] == 'Event'){
               $style .= '.eventCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }
            else if($val['vTitle'] == 'News'){
               $style .= '.newsCls{
                        background-image: url("'.$base_upload.'tab_icon/1/'.$val['vImage'].'");
                        background-repeat: no-repeat;
                        background-size:100% 100%;
                 }'; 
            }
        }
        $style.='.x-list .x-list-item .x-list-item-body, .x-list .x-list-item.x-list-item-tpl .x-innerhtml {
                         padding:0px; 
                         border-bottom:0px solid black;
                    }
                    .x-tabbar-dark {
                        border-top-color: transparent;
                        border-bottom-color:transparent;
                        background-image: none;
                        background-color: #24352D;
                        background-image:-webkit-linear-gradient(top, #24352D,#24352D 3%,#24352D);
                    }
                    .x-tabbar-dark .x-tab {
                        color: white;
                        border-bottom: 1px solid transparent;
                    }
                    .x-tabbar-dark.x-docked-bottom .x-tab-active {
                        background: rgba(35,91,66,1);
                        background: -moz-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(35,91,66,1)), color-stop(50%, rgba(31,153,98,0.84)), color-stop(77%, rgba(28,212,129,0.75)), color-stop(78%, rgba(28,212,129,0.75)), color-stop(79%, rgba(27,211,128,0.75)));
                        background: -webkit-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: -o-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: -ms-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: linear-gradient(to bottom, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#235b42", endColorstr="#1bd380", GradientType=0 );
                        box-shadow: #014108 0 0 0.25em inset;
                    }';

        $style .= '.x-tabbar-dark.x-docked-top .x-tab-active {
                        background: rgba(35,91,66,1);
                        background: -moz-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(35,91,66,1)), color-stop(50%, rgba(31,153,98,0.84)), color-stop(77%, rgba(28,212,129,0.75)), color-stop(78%, rgba(28,212,129,0.75)), color-stop(79%, rgba(27,211,128,0.75)));
                        background: -webkit-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: -o-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: -ms-linear-gradient(top, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        background: linear-gradient(to bottom, rgba(35,91,66,1) 0%, rgba(31,153,98,0.84) 50%, rgba(28,212,129,0.75) 77%, rgba(28,212,129,0.75) 78%, rgba(27,211,128,0.75) 79%);
                        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#235b42", endColorstr="#1bd380", GradientType=0 );
                        box-shadow: #014108 0 0 0.25em inset;
                    }
                    .x-list .x-list-item.x-item-selected .x-dock-horizontal, .x-list .x-list-item.x-item-selected.x-list-item-tpl {
                        background-image: none;
                        background-color: rgba(0, 0, 0, 0);
                        background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0),rgba(0, 0, 0, 0) 3%,rgba(8, 93, 153, 0));
                        background-image: -moz-linear-gradient(top, #0398ff,#007ad0 3%,#005c9d);
                        background-image: -o-linear-gradient(top, #0398ff,#007ad0 3%,#005c9d);
                        background-image: -ms-linear-gradient(top, #0398ff,#007ad0 3%,#005c9d);
                        color: #fff;
                    }
                    .x-tabbar.x-docked-bottom {
                        height: 4em;
                        padding: 0;
                    }
                    .x-tabbar.x-docked-bottom .x-tab .x-button-icon {
                        width: 2.65em;
                        height: 2.65em;
                        margin: 0 auto;
                    }
                    .x-tab {
                        position: relative;
                        min-width: 4.3em;
                    }
                    .x-list-normal .x-list-item.x-list-item-tpl{
                        border-top: 0px solid #dedede;
                    }
                    .x-list .x-list-item.x-item-selected.x-list-item-tpl{
                        color:black;
                    }
                    .x-list-normal .x-list-item.x-list-item-tpl.x-list-footer-wrap{
                        border-bottom: 0px solid #dedede;
                        border-top:0px solid black;
                    }';

        $style .= '.textFieldCls{
                        margin-left: 10%;
                        width:70%;
                        margin-bottom: 2%;
                        padding: 5px;
                        border-radius: 10px;
                        border: 1px solid grey;
                    }
                    .addorderBtnCls{
                        margin-bottom: 2%;
                        width: 40px;
                        padding: 5px;
                        color:#5ad1aa;
                        background-color:transparent;
                        border-radius: 5px;
                    }
                    .deleteorderBtnCls{
                        margin-left: 20%;
                        margin-bottom: 2%;
                        width: 80%;
                        padding: 5px;
                        color:red;
                        background-color:transparent;
                        border-radius: 10px;
                        border: 1px solid red;
                    }
                    .BottomBtnCls{
                        margin-left: 10%;
                        margin-bottom: 2%;
                        margin-top:2%;
                        width: 45%;
                        padding: 5px;
                        color:#5ad1aa;
                        background-color:white;
                        border-radius: 5px;
                        border: 1px solid gray;
                    }
                    .x-toolbar-dark.x-docked-top {
                        border-bottom-color: #fff;
                    }
                    .submitbuttonCls {
                        background-color:#5ad1aa;
                        padding:8px;
                        border-radius:10px;
                        color:white;
                    }
                    .x-toolbar-dark .x-button, .x-toolbar-dark .x-button.x-button-back:after, .x-toolbar-dark .x-button.x-button-forward:after, .x-toolbar .x-toolbar-dark .x-button, .x-toolbar .x-toolbar-dark .x-button.x-button-back:after, .x-toolbar .x-toolbar-dark .x-button.x-button-forward:after, .x-toolbar-dark .x-field-select .x-component-outer, .x-toolbar-dark .x-field-select .x-component-outer.x-button-back:after, .x-toolbar-dark .x-field-select .x-component-outer.x-button-forward:after, .x-toolbar .x-toolbar-dark .x-field-select .x-component-outer, .x-toolbar .x-toolbar-dark .x-field-select .x-component-outer.x-button-back:after, .x-toolbar .x-toolbar-dark .x-field-select .x-component-outer.x-button-forward:after{
                        background-color: #1be88c;
                        background-image: -webkit-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                        background-image: -moz-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                        background-image: -o-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                        background-image: -ms-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                    }
                    .x-toolbar-dark .x-button:hover, .x-toolbar-dark .x-button.x-button-back:after, .x-toolbar-dark .x-button.x-button-forward:after, .x-toolbar .x-toolbar-dark .x-button, .x-toolbar .x-toolbar-dark .x-button.x-button-back:after, .x-toolbar .x-toolbar-dark .x-button.x-button-forward:after, .x-toolbar-dark .x-field-select .x-component-outer, .x-toolbar-dark .x-field-select .x-component-outer.x-button-back:after, .x-toolbar-dark .x-field-select .x-component-outer.x-button-forward:after, .x-toolbar .x-toolbar-dark .x-field-select .x-component-outer, .x-toolbar .x-toolbar-dark .x-field-select .x-component-outer.x-button-back:after:hover, .x-toolbar .x-toolbar-dark .x-field-select .x-component-outer.x-button-forward:after:hover{
                        background-color: #1be88c;
                        background-image: -webkit-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                        background-image: -moz-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                        background-image: -o-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                        background-image: -ms-linear-gradient(top, #067f49,#1be88c 3%,#067f49);
                    }';

        $style .= '#wrapper {
                        width: 189%;
                        margin:  6px 5px -2px 5px;
                    }
                    .pin {
                        display: inline-block;
                        background: #FEFEFE;
                        box-shadow: 2px 1px 2px 1px rgba(34, 25, 25, 0.4);
                        margin: 0 2px 0px;
                        -webkit-column-break-inside: avoid;
                        -moz-column-break-inside: avoid;
                        column-break-inside: avoid;
                        padding: 10px;
                        padding-bottom: 5px;
                        background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
                        opacity: 1;
                        -webkit-transition: all .2s ease;
                        -moz-transition: all .2s ease;
                        -o-transition: all .2s ease;
                        transition: all .2s ease;
                    }
                    .photoCls .x-list-item {
                        color: #000;
                        font-weight: 400;
                        border-top: 1px solid transparent;
                        float: left;
                        width: 95px;
                        margin-left: 10px;
                    }
                    .x-title {
                        line-height: 36px;
                        font-size: 33px;
                        margin: 0 0.3em;
                        padding: 7px 0.3em 0px;
                        font-family: KleymisskyRegular !important;
                        }
                    .title{
                        line-height: 32px;
                        font-size: 38px;
                        margin: 0 0.3em;
                        padding: 7px 0.3em 0px;
                        font-family: KleymisskyRegular !important;
                    }

                    .x-webkit .x-button-forward:before, .x-webkit .x-button-forward:after, .x-webkit .x-button-back:before, .x-webkit .x-button-back:after{
                        content: "";
                        position: absolute;
                        width: 15px;
                        height: auto;
                        top: -2px;
                        left: auto;
                        bottom: 34px;
                        z-index: 2;
                        -webkit-mask: 4px 0 url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAABGCAYAAADb7SQ4AAAAGXRF…M2C2yXb7y3U6ZpRS5P/4jpUjihRTbCJ3q1eL3GMMfAQYAJmB6SBO619IAAAAASUVORK5CYII=") no-repeat;
                        -webkit-mask-size: 15px 100%;
                        overflow: hidden;
                    }
                    .descCls img{
                        width:100%;
                    }
                    .sharebtncls{
                        border:rgb(42, 165, 110);
                        padding: 10px;
                        border-radius: 10px;
                        color: white;
                        background-color: rgb(42, 165, 110);
                    }'; 
        $style .= '.commarcbuy{
                        background:green;
                        border-radius:10px;
                        color: white;
                        text-align: center;
                        padding: 5px;
                    }
                    .chooseSizeCls {
                        margin: 10px;
                        margin-left: 23px;
                        width: 88%;
                        height: 50px;
                        padding-top: 10px;
                        background-color: silver;
                        padding-left: 5px;
                        border-radius: 3px;
                    }
                    .orderviewBtnCls{
                        border: 2px solid white;
                    }
                    .x-toolbar .x-field-search .x-field-input:before {
                        top: 0.02em;
                    }'; 
        $style .= '#sciout{padding:0px;background: #4C3C3C;font-family:arial,helvetica,sans-serif;}#sciOutPut{font-size:18px;padding:3px;margin:2px;cursor:text;text-align:right;background-color:#000000;border:0px solid #87996b;border-radius: 3px;color:gold;padding: 10px;  margin: 5px;}.scifunc{display: inline-block;display: table-cell;vertical-align: middle;text-align:center;width:55px;height:40px;margin:1px;border:5px solid #4C3C3C;border-radius: 3px;font-family:arial,helvetica,sans-serif;font-size:16px;font-weight:bold;color:#185290;background-color: rgb(16, 16, 16);}.scifunc:active {background-color:#013f7d;color:#ffffff;}.scinm{display: inline-block;display: table-cell;vertical-align: middle;padding: 5px 0px;text-align:center;width:62px;height:30px;margin:1px;border:5px solid #4C3C3C;border-radius: 0px;font-family:arial,helvetica,sans-serif;font-size:16px;font-weight:bold;color:#FFF;background-color:#262626;}.scinm:active {background-color:#aaaaaa;color:#000000;}.sciop{display: inline-block;display: table-cell;vertical-align: middle;padding: 5px 0px;text-align:center;width:62px;height:30px;margin:1px;border:10px solid #4C3C3C;border-radius: 3px;font-family:arial,helvetica,sans-serif;font-size:16px;font-weight:bold;color:#262626;background-color:#ccc;}.sciop:active {background-color:#000000;color:#ffffff;}.scird{display: inline-block;display: table-cell;vertical-align: middle;text-align:center;height:30px;padding: 10px;margin:1px;border-radius: 3px;font-family:arial,helvetica,sans-serif;font-size:13px;color:#FFFFFF;}.scieq{display: inline-block;display: table-cell;vertical-align: middle;padding: 5px 0px;text-align:center;width:50px;height:30px;margin:1px;border:10px  solid #4C3C3C;border-radius: 3px;font-family:arial,helvetica,sans-serif;font-size:16px;font-weight:bold;color:#F00;background-color:#DCADB0;}.scieq:active {background-color:#ff0000;color:#ffffff;}#calfootnote {font-family:arial,helvetica,sans-serif;font-size:12px;text-align:right;color:red;opacity: 0;}';
   
        return $style;                 
    }


    /** style **/
    public function get_style_sheet_sencha($iApplicationId,$base_upload)
    {
        /** Application **/
        $iFeatureId = $this->get_style_tab_icon_details($iApplicationId);

        /** get style sheet for sencha **/
        if(count($iFeatureId) > 0){
            $stylesheet = $this->get_stylesheet_sencha_touch($iFeatureId,$base_upload);
        }

        return $stylesheet;
    }

    /** tab icon **/
    public function get_style_tab_icon_details($iApplicationId)
    {
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->from('r_appfeature');
        $query = $this->db->get();
        return $query->result_array();
    }

    /** get app features **/
    public function get_tab_appindustry_feature($iFeatureId)
    {
        $this->db->select('');
        $this->db->where_in('iFeatureId', $iFeatureId);
        $this->db->from('r_appindustryfeature');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
