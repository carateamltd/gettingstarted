<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('app_model', '', TRUE);
        $this->load->model('publishapp_model', '', TRUE);
        $this->load->library('upload'); 
        $this->load->library('image_lib');
	$this->common_for_all();
		
        $sessionid = $this->session->userdata["user_info"];
        
        if($sessionid['iAdminId']=='')
        {
        	 redirect($this->data['base_url'] . 'authentication');
        }
		
        /*
	      Change :Session write for language
	*/
        $this->load->model('admin_model', '', TRUE);
        // language session
        $lang= $this->session->userdata('language');
        $lang1 = $this->admin_model->get_language_details($lang);
	// $mylang =  $this->session->set_userdata('mylang',$lang1);
        $this->smarty->assign('lang',$lang1);
        $this->data['mylang']=$lang1;
        // end language
    }  

	  
	/**
		index function
	**/
    function index()
    {
	$this->data['warning'] = $this->session->flashdata('warning');
	$this->data['message'] = $this->session->flashdata('message');
	
	$this->data['tpl_name']= "view-app.tpl";
        $iClientId = $this->data['user_info']['iAdminId'];
	$iRoleId=$this->data['user_info']['iRoleId'];
	   
	// echo "<pre>";print_r($this->data['user_info']);exit;
        //$this->data['appindustry'] = $this->app_model->get_all_appindustry();
	$this->data['appindustry'] = $this->app_model->get_all_appindustry_clientId($iClientId,$iRoleId);
        $this->data['appinformation'] = $this->get_all_appinformation($iClientId,$iRoleId);
	
	    // echo "<pre>";print_r($this->data['appinformation']['']);exit;
	   	$allClientList=$this->app_model->allClientList();	   
	   	$this->data['allClientList']=$allClientList;
	    // echo "<pre>";print_r($this->data);exit;
	   
        // breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('Application Design', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
       // ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    
	/** demo **/
    function demo()
    {		
        $this->data['tpl_name']= "view-app-demo.tpl";   
        $this->data['appindustry'] = $this->app_model->get_all_appindustry();
		
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('Application Design', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
		
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    
    
	/** ajax app industry feature **/
    	function ajax_appindustryfeature()
	{
		$iIndustryId = $this->input->post('iIndustryId');
		$this->data['appindustryfeature'] = $this->app_model->get_all_appindustryfeature($iIndustryId);
		//echo "<pre>";print_r($this->data['default_icon']);exit;
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('ajax-appindustryfeature.tpl'); 
	}

	/*
		Description:- already aap check.	
	*/
        
	function app_already_check()
	{
		$app = $this->input->post('appname');
		$client =$this->input->post('app_client');
		$num=$this->app_model->check_app($app,$client);
		if($num>0)
		{
			echo 1;
		}
	}
	
	function save_app_feature()
	{
	        $this->data['message'] = $this->session->flashdata('message');
                //echo "<pre>";print_r($this->input->post());exit;
                $this->session->unset_userdata("select_tab_iFeatureId");
                $appinformation = $this->input->post('appinformation'); 

                $app=$appinformation['tAppName'];
                $client=$appinformation['iClientId'];
		  
		 //exit();
		 /* 
		  $num=$this->app_model->check_app($app,$client);
		  if($num>0)
		  {
		   $this->session->set_flashdata('message',"This application already exists.");
		   redirect($this->data['base_url'] . 'app');
		   exit();
		  }
		 */
		 
		   //Encrypt Name Of Application
		   $appinformation['vApplicationCode'] = $this->replaceAll($appinformation['tAppName']); 
		   //$appinformation['iClientId'] = $this->data[user_info][iAdminId];
		   if($appinformation['iApplicationId'] != ""){
		    $this->data['iApplicationId'] = $appinformation['iApplicationId'];
		    $lid = $this->app_model->update_appinformation($appinformation,$this->data['iApplicationId']);
		   }else{
		    $this->data['iApplicationId'] = $this->app_model->save('r_appinformation',$appinformation);

//Default Design Entry Save

	    	$templat_id =  1;
	    	$allappdesignInfo_default = $this->app_model->get_default_designInfo($templat_id);
	    	$allappdesignInfo_default['iApplicationId'] = $this->data['iApplicationId'];
			unset($allappdesignInfo_default['vImage']);
			unset($allappdesignInfo_default['eType']);
			unset($allappdesignInfo_default['eStatus']);
			$iAppDesignInfoId = $this->app_model->save('r_app_design_ifo',$allappdesignInfo_default);
		}
		
		$appfeature = $this->input->post('appfeature');
		$appfeatureicon = $this->input->post('appfeatureicon');
		foreach ($appfeature as $k => $v){
			$appindustryfeature_detail = $this->app_model->get_one_appindustryfeature($appfeatureicon[$k]);
			$appfeature_data['iApplicationId'] = $this->data['iApplicationId'];
			$appfeature_data['iFeatureId'] = $k;
			$appfeature_data['iIconId'] = $appfeatureicon[$k];
			$appfeature_data['vTitle'] = $appindustryfeature_detail['vTitle'];
			$appfeature_data['vImage'] = $appindustryfeature_detail['vImage'];
			$appfeature_data['iIconcolorId'] = $this->data['default_icon']['iIconcolorId'];
			$appfeature_data['eActive'] = 'Yes';
			
			$iApplicationId = $this->app_model->save('r_appfeature',$appfeature_data);
		}

		redirect($this->data['base_url'] . 'app/step2/'.$this->data['iApplicationId']);
	}
	
	
	function step2()
	{
		$this->data['already'] = $this->session->flashdata('already');
		$this->data['tpl_name']= "view-app-step2.tpl";
		$this->data['message'] = $this->session->flashdata('message'); 
		
		$id = $this->uri->segment(3);
		$step= $this->uri->segment(2);

		$this->data['step']=$step;
		$this->data['iApplicationId'] = $id;
		$iClientId = $this->data['user_info']['iAdminId'];
		$iRoleId=$this->data['user_info']['iRoleId'];
		
	    	// POUP
		$this->data['appindustry'] = $this->app_model->get_all_appindustry();
		$this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
	   	// featureids
		$this->data['featureids'] = $this->app_model->get_specific_app_featureid('r_appfeature',$id,'7');
		if(in_array('7', $this->data['featureids'][0]))
		{
			$this->data['flag']='7';
		} 
		
		if(!$this->data['appinformation'])
		{
		  $this->session->set_flashdata('warning',"delete");
		  $this->data['warning'] = $this->session->flashdata('warning');
		  $home = $this->uri->segment(1);
		  redirect($this->data['base_url'].$home);	
		  exit;	  
		}		
		$this->sort_tab_list($id);
	    	//$this->data['selected_feature_details'] = $this->selected_feature_details($id);		
	    	//echo '<pre>';print_r($this->data['selected_feature_details']);exit;
		$iIndustryId = $this->data['appinformation']['iIndustryId'];
		$this->data['all_appindustryfeature'] = $this->app_model->get_all_appindustryfeature_data($iIndustryId);

		// echo "<pre>";
        	// print_r($this->data);exit;
		// $this->data['all_tabcustomicon'] = $this->app_model->get_all_tabcustomicon();
		$this->smarty->assign('data', $this->data);		
		$this->smarty->view('template.tpl'); 
	}
	

	/** select feature details **/
	function selected_feature_details($id)
	{	
		$featureid_details =  $this->app_model->get_featureid_by_appid($id);		
		$selected_feature_details = array();
		foreach($featureid_details as $val)
		{			
			$feature_detail =  $this->app_model->get_all_appindustryfeature_by_featureid($val['iFeatureId']);
			$val['default_vTitle'] = $feature_detail[0]['vTitle'];
			$val['default_vImage'] = $feature_detail[0]['vImage'];
			//$feature_detail[0]['iAppTabId'] = $val['iAppTabId'];
			array_push($selected_feature_details,$val);
		}
		// $selected_feature_details =  $this->app_model->get_all_appindustryfeature_by_featureid($featureid);		
		return $selected_feature_details;
	}

	/** step3 **/
	function step3()
	{
		$this->data['tpl_name']= "view-app-step3.tpl";
		$id = $this->uri->segment(3);
		$this->data['iApplicationId'] = $id;
     		$iClientId = $this->data['user_info']['iAdminId'];
        	$iRoleId = $this->data['user_info']['iRoleId'];
        	$this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
         
        	if(!$this->data['appinformation']){
          		$this->session->set_flashdata('warning',"1");
          		$this->data['warning'] = $this->session->flashdata('warning');
          		$home = $this->uri->segment(1);
		  	redirect($this->data['base_url'].$home);	
		  	exit;       
        	}
        	// End Check Authentication
		// echo '<pre>';print_r($_SESSION);exit;	   
		// $this->data['selected_feature_details'] = $this->selected_feature_details($id);
		$this->sort_tab_list($id);
		
		$selected_appfeature = $this->app_model->get_appfeature($id);		
		if(!$this->data['selected_feature_details']){
		  redirect($this->data['base_url'].'app/step2/'.$id);	
		  exit;       
       		 }
		
		$selected_appfeature = $this->app_model->get_appfeature($id);		
		// $nselected_appfeaturevalue  = array();
		// foreach($selected_appfeature as $k => $v){
		// 	$selected_appfeaturevalue = $this->app_model->get_appfeaturevalue($id,$v['iAppTabId']);
		// 	$final_selected_appfeaturevalue= array();
		// 	 foreach($selected_appfeaturevalue as $k => $v){
		// 		 $final_selected_appfeaturevalue[$v['iFieldId']] = $v;
		// 	 }	

		//   $nselected_appfeaturevalue[$v['iAppTabId']] = $final_selected_appfeaturevalue;
		//    echo "<pre>";print_r($nselected_appfeaturevalue);exit;
		// }
		
		// $this->data['selected_appfeaturevalue'] = $nselected_appfeaturevalue;
		$selected_feature_details = $this->data['selected_feature_details'];
		//echo "<pre>";print_r($selected_feature_details);exit;
		
		// $getAllLocation=$this->app_model->getall_location();
		// $this->data['allLocation']=$getAllLocation;
		$html = array();
		$back_mob_img_details = array();
		$back_tab_img_details = array();
		
		//echo "<pre>";print_r($selected_feature_details);exit;
		foreach ($selected_feature_details as $key => $val) 
		{	
			$iFeatureId = $val['iFeatureId'];
			$iAppTabId = $val['iAppTabId'];
			//echo $iddtab
			$rhtml = $this->make_tabwise_dynamic_form($iFeatureId,$iAppTabId);
			
			$html[$iAppTabId] = $rhtml;
			
			//Background img
			$user_img_details = $this->app_model->get_one_user_tabbackground($val['iAppTabId'],'Mobile');
			if(sizeof($user_img_details) > 0){
				//echo '<pre>';print_r($user_img_details['iBackgroundimgId']);
				$user_img_icon_details = $this->app_model->get_one_tabbackground($user_img_details['iBackgroundimgId']);
				//echo '<pre>';print_r($user_img_icon_details);
				$user_img_details['vImage'] = $user_img_icon_details['vImage'];
				//echo "<pre>";print_r($user_img_details['vImage']);exit;
			}
			//exit;
			$back_mob_img_details[$iAppTabId] = $user_img_details;

			$user_img_tab_details = $this->app_model->get_one_user_tabbackground($val['iAppTabId'],'Tablet');
			if(sizeof($user_img_tab_details) > 0){
				$user_img_tab_icon_details = $this->app_model->get_one_tabbackground($user_img_tab_details['iBackgroundimgId']);
				$user_img_tab_details['vImage'] = $user_img_tab_icon_details['vImage'];
			}
			$back_tab_img_details[$iAppTabId] = $user_img_tab_details;
			//$back_tab_img_details[$iddtab] = $this->app_model->get_one_user_tabbackground($val['iAppTabId'],'Tablet');
		}
		
		$this->data['back_mob_img_details'] = $back_mob_img_details;
		$this->data['back_tab_img_details'] = $back_tab_img_details;
		
		//echo '<pre>';print_r($this->data['back_mob_img_details']);exit;
		$this->data['tabbackground'] = $this->get_all_tabbackground();
		$this->data['your_tabbackground'] = $this->get_all_tabbackground_admin();
		//echo '<pre>';print_r($this->data['your_tabbackground']);exit;
		
		$this->data['userdata'] = $this->session->userdata;
		$this->data['html'] = $html;
		
		//echo "<pre>";print_r($selected_feature_details);exit;
		
		/*sub tab icon listing coding start*/
		$custom_selected_feature_details = array();
		
		foreach($selected_feature_details as $val){
		  $custom_selected_feature_details[$val['iAppTabId']] = $val;
		}
		
		  $getAllTabData=$this->app_model->allSubTabData($this->data['iApplicationId']);	  
		  //echo "<pre>";print_r($custom_selected_feature_details);exit;
		  
		  for($i=0;$i<count($getAllTabData);$i++){
			 $iAppTabId=$getAllTabData[$i]['iAppTabId'];
			 if($custom_selected_feature_details[$iAppTabId]){				
				if($custom_selected_feature_details[$iAppTabId]['vTitle']!=''){
				    $getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['vTitle'];				
				}else{
				    $getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['default_vTitle'];
				}
			 }  
		  }
		  
		  $this->data['AllSubTabImages']=$getAllTabData;		  
		  
		  $buttonBckgroundData=$this->app_model->getAllButtonImg($this->data['getAdminImgData']);		
		  $this->data['buttons_tab_background'] = $buttonBckgroundData;
		  $this->data['get_all_buttons_lunch_header'] = $this->get_all_buttons_lunch_header($this->data['getAdminImgData']);
		//echo "<pre>";print_r($this->data['all_featurefields ']);exit;
		//echo '<pre>';print_r($this->data['html']);exit;
	   	$this->smarty->assign('data', $this->data);
        	$this->smarty->view('template.tpl'); 
	}
	
	function make_tabwise_dynamic_form($iFeatureId,$iAppTabId)
	{
		/*
			$lang= $this->session->userdata('language');
			$lang1 = $this->admin_model->get_language_details($lang);
			echo "<pre>";
			print_r($lang1);
			echo "</pre>";exit;
		*/

		if($this->data['iApplicationId']==''){			
		  $this->data['iApplicationId']=$iApplicationId;
		}

        	/** main html details **/
		$mainhtml = '';
        	if($iFeatureId == 1){
		    $homehtml = $this->gethometabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$homehtml;
		}else if($iFeatureId == 2){
		    $evnthtml = $this->geteventhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$evnthtml;
		}else if($iFeatureId == 3){
	       	     
		}else if($iFeatureId == 5){
		    $mailinglisthtml = $this->getmailinglisthtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$mailinglisthtml;
		}else if($iFeatureId == 26){
		    $newshtml = $this->getnotepadhtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $newshtml;
		}else if($iFeatureId == 8){
		    $pdfhtml = $this->getpdfhtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $pdfhtml;
		}else if($iFeatureId == 9){
		    $podcasthtml = $this->getpodcasthtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$podcasthtml;
		}else if($iFeatureId == 10){
		    $rsshtml = $this->getrsshtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$rsshtml;
		}else if($iFeatureId == 27){
		    $voicerecorhtml = $this->getvoicerecordhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$voicerecorhtml;
		}else if($iFeatureId == 12){
		    $websitehtml = $this->getwebsitehtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$websitehtml;
		}else if($iFeatureId == 13){
		    $youtubehtml = $this->getyoutubehtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$youtubehtml;
		}else if($iFeatureId == 14){
		    $locationhtml = $this->getlocationhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$locationhtml;
		}else if($iFeatureId == 15){
		    $feepaymenthtml = $this->getfeepaymenthtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$feepaymenthtml;
		}else if($iFeatureId == 16){
		    $getgalleryhtml = $this->getgalleryhtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $getgalleryhtml;
		}else if($iFeatureId == 17){
		    $gettwotireinfotabhtml = $this->getaroundushtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $gettwotireinfotabhtml;
		}else if($iFeatureId == 18){
		    $socialmediahtml = $this->getsocialmediahtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$socialmediahtml;
		}else if($iFeatureId == 19){
		    $getqrcouponhtml = $this->getqrcouponhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$getqrcouponhtml;
		}else if($iFeatureId == 21){
		    $getmenuhtml = $this->getmenuhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$getmenuhtml;
		}else if($iFeatureId == 22){
		    $getorderhtml = $this->getorderhtmldetail($iFeatureId,$iAppTabId);
		    $mainhtml .=$getorderhtml;	
		}else if($iFeatureId == 23){
		    $getesthtml = $this->getreservationhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$getesthtml;
		}else if($iFeatureId == 24){
		    $getloyaltyhtml = $this->getloyaltyhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$getloyaltyhtml;	
		}else if($iFeatureId == 25){
		    $infotabhtml = $this->getinfotabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$infotabhtml;
		}else if($iFeatureId == 29){
		    $infotabhtml = $this->getcataloguetabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$infotabhtml;
		}else if($iFeatureId == 30){
		    $infotabhtml = $this->getnewarrivaltabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$infotabhtml;
		}else if($iFeatureId == 31){
		    $infotabhtml = $this->getpromotiontabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$infotabhtml;	
		}else if($iFeatureId == 32){
		    $infotabhtml = $this->getdonationtabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $infotabhtml;	
		}else if($iFeatureId == 33){
		    $infotabhtml = $this->getticketinfotabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $infotabhtml;	
		}else if($iFeatureId == 34){
		    $infotabhtml = $this->getservicetabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $infotabhtml;	
		}else if($iFeatureId == 35){
		    $infotabhtml = $this->getbloghtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $infotabhtml;	
		}else if($iFeatureId == 36){
		    $infotabhtml = $this->gettestonomialtabhtml($iFeatureId,$iAppTabId);
		    $mainhtml .= $infotabhtml;			
		}else if($iFeatureId == 38){
			
		}else if($iFeatureId == 39){

		}else if($iFeatureId == 40){

		}else if($iFeatureId == 42){
		     $infotabhtml = $this->getappointmenttabhtml($iFeatureId,$iAppTabId);
		     $mainhtml .= $infotabhtml;
		}else if($iFeatureId == 43){
		     $infotabhtml = $this->getquotationtabhtml($iFeatureId,$iAppTabId);
		     $mainhtml .= $infotabhtml;
		}else if($iFeatureId == 44){
		     $infotabhtml = $this->getecommercetabhtml($iFeatureId,$iAppTabId);
		     $mainhtml .= $infotabhtml;	
		}else if($iFeatureId == 45){
		    $newshtml = $this->getnewshtml($iFeatureId,$iAppTabId);
		    $mainhtml .=$newshtml;
		}else if($iFeatureId == 46){
		}

		#echo "<pre>";
		#print_r($all_featurefields);exit;
		return $mainhtml;
	    }


	/** Quotation Details **/
	function getquotationtabhtml($iFeatureId,$iAppTabId)
	{
		/** ApplicationId **/ 
		$Data['iApplicationId'] = $this->data['iApplicationId'];
		$iApplicationId = $this->data['iApplicationId'];

		/** get Testomonial tab html **/
		$allappquotation = $this->app_model->get_quotation_details($iApplicationId);

		/** get Testomonial tab html **/
		$html = '';
		$html .='<div id="appointmentformid'.$iAppTabId.'" class="main_popup" style="display:none;">
			    <div class="popup_header">
			        <h3>Quotation Details</h3>
			    </div>';

		$html.='<div class="popup-body">';
	        $html.='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
		<tr class="nodrop">';
			$html.='<th>Name</th>';
			$html.='<th>Email</th>';
			$html.='<th>Number</th>';
			$html.='<th>Action</th>';	
		    	$html.='</tr>';	
			for($i=0;$i<count($allappquotation);$i++)
			{
			    	$html.='<tr class="row1a">
					     <td width="25%" align="center">'.$allappquotation[$i]['vQuotationName'].'</td>
					     <td width="25%" align="center">'.$allappquotation[$i]['vQuotationemail'].'</td>
					     <td width="25%" align="center">'.$allappquotation[$i]['vQuotationNumber'].'</td>
					     <td align="center" width="25%"><a class="button grey" onclick="delete_appointment_details('.$allappquotation[$i]["iQuotationId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
					</tr>';    
			}
		$html .='</table>';
		$html .='</div>';
		$html .='</div>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#appointmentformid'.$iAppTabId.'" id="addappointmentid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
		$html.='Quotation Details';
		$html.='</a></div>';

		return $html;		
	}

	/** Ecommerse Details **/
	function getecommercetabhtml($iFeatureId,$iAppTabId)
	{
		/** ApplicationId **/ 
		$Data['iApplicationId'] = $this->data['iApplicationId'];
		$iApplicationId = $this->data['iApplicationId'];

		/** get Testomonial tab html **/
		$allcataloguedetails = $this->app_model->get_ecommerce_purchase_details($iApplicationId);

		/** get details **/
		$lang= $this->session->userdata('language');
		$service_language = $this->admin_model->get_language_details($lang);

		/** get Testomonial tab html **/
		$html = '';
		$html .='<div id="ecommerceformid'.$iAppTabId.'" class="main_popup" style="display:none;">
			    <div class="popup_header">
			        <h3>';
				foreach($service_language as $val){
					if($val['rLabelName'] == 'Purchase Product Details'){
						$html.=$val['rField'];
					}
				}	
				$html.='</h3>
			    </div>';
		$html.='<div class="popup-body">';
	        $html.='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
			<tr class="nodrop">';
		$html.='<th>';
			foreach($service_language as $val){
				if($val['rLabelName'] == 'Product Name'){
					$html.=$val['rField'];
				}
			}
			$html.='</th>';
		$html.='<th>';
			foreach($service_language as $val){
				if($val['rLabelName'] == 'Date'){
					$html.=$val['rField'];
				}
			}
			$html.='</th>';
		$html.='<th>';
			foreach($service_language as $val){
				if($val['rLabelName'] == 'Total Price'){
					$html.=$val['rField'];
				}
			}	
			$html.='</th>';
		$html.='<th>';
			foreach($service_language as $val){
				if($val['rLabelName'] == 'Action'){
					$html.=$val['rField'];
				}
			}
			$html.='</th>';	
	    	$html.='</tr>';	
	            
		for($i=0;$i<count($allcataloguedetails);$i++)
		{
		    	$html.='<tr class="row1a">
			     <td width="30%" align="center">'.$allcataloguedetails[$i]['iTestonomialName'].'</td>
			     <td width="30%" align="center">'.$allcataloguedetails[$i]['vDateTime'].'</td>
			     <td width="30%" align="center">'.$allcataloguedetails[$i]['fTotalPrice'].'</td>
			     <td align="center" width="10%"><a class="button grey" onclick="delete_appointment_details('.$allcataloguedetails[$i]["iTestonomialId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
			</tr>';    
		}
		$html .='</table>';
		$html .='</div>';
		$html .='</div>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#ecommerceformid'.$iAppTabId.'" id="addecommerceid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
		foreach($service_language as $val){
			if($val['rLabelName'] == 'Ecommerce Details'){
				$html.=$val['rField'];
			}
		}	
		$html.='</a></div>';

		return $html;
	}

	/** ticket information **/	
	function appwiseticketlisting($iFeatureId,$iAppTabId)
	{
		/** appwise ticket listing **/
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
		
		/** all app ticket **/
		$allapppromotion = $this->app_model->get_ticket_information($iApplicationId);
		$html .= $this->get_all_ticket_data($iApplicationId,$iAppTabId,$iFeatureId); 
		echo $html;exit; 
	}

	/** get ticket info **/
	function getticketinfotabhtml($iFeatureId,$iAppTabId)
	{
		/** get promotions tab html **/
		$html .='<div id="ticketinfoformid'.$iAppTabId.'" class="main_popup" style="display:none;">
		            <div class="popup_header">
		                <h3>Add Ticket</h3>
		            </div>
                    		<div class="popup-body">';        
		                
				$html .='<div id="addticket_validation'.$iAppTabId.'" style="display:none;"></div>';
		                $html .='<div class="widget-body form">';
		                    
				$html .='<form class="form-horizontal" name="frmticket" id="frmticket_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_ticket" enctype="multipart/form-data">';
		                $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
		                $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
		                   
				$html .='<div class="control-group">
	                                	<label class="control-label">Ticket Type</label>
			                        <div class="controls">
			                            <input type="text"  value="" class="default" id="iTicketType'.$iAppTabId.'" name="data[iTicketType]" />
			                        </div>
		                            </div>';  

			 	    	$html .='<div class="control-group">
		                                <label class="control-label">Available Ticket</label>
		                                <div class="controls">
		                                    <input type="text"  value="" class="default" id="iTotalTicket'.$iAppTabId.'" name="data[iTotalTicket]" />
		                                </div>
		                            </div>';                                    		

					$html .='<div class="control-group">
		                                <label class="control-label">Ticket Price</label>
		                                <div class="controls">
		                                    <input type="text"  value="" class="default" id="fTicketPrice'.$iAppTabId.'" name="data[fTicketPrice]" />
		                                </div>
		                            </div>';                                    		
				
					$html .='<div class="control-group">';
		                               $html .= '<label class="control-label" style="cursor:default;">Start Date</label>
		                                <div class="controls">
						    <input value="" class="input-xlarge eventd" id="vShowDate"'.$iAppTabId.'" name="data[vShowDate]" type="text" />
		                                <div style="color:red;position: absolute; margin-top:10px;"></div>
		                                </div>
		                            </div>';
				
	 				$html .='<div class="control-group">';
		                           $html .= '<label class="control-label" style="cursor:default;">Start Time</label>
		                                	<div class="controls">
								<div class="input-append bootstrap-timepicker">
		                                	           <input type="text" value="" class="input-mini eventtime" id="vShowTiming'.$iAppTabId.'" name="data[vShowTiming]"><span class="add-on"><i class="icon-time"></i></span>
		                                        </div>	
		                                	<div style="color:red;position: absolute; margin-top:10px;"></div>
		                                </div>
		                            </div>';

					$html .='<div class="control-group">';
		                           $html .= '<label class="control-label" style="cursor:default;">Status </label>
		                                <div class="controls">
						<input type="checkbox" value="Active" id="eStatus'.$iAppTabId.'" name="data[eStatus]" />
		                                </div>
		                            </div>';

					$html .='<br />';
		            		$html .='<div class="control-group">
					         <div class="controls">
							<button type="button" class="btn btn-primary"  id="promotionbtn" name="promotionbtn" onclick="return submitticketdetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
			                 	</div>
				            </div>';

		                $html .='</form>';
		               $html .='</div>';
		    	$html .='</div>';

			$html .= '<div class="popup-footer">
				<button aria-hidden="true" onclick="closeleanmodal('."'frmpromotion_$iAppTabId'".');" class="btn">Close</button>
				</div>
			</div>';

			/** Ticket info add button **/		
			$html.='<style>#dyntable input{width:auto !important;}</style>';
				$html.='<div class="add_btn"><a class="btn btn-primary"  href="#ticketinfoformid'.$iAppTabId.'" id="addticketinfoid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
			     	$html.='Ticket Info';
			$html.='</a></div>';
			/** End Ticket **/
        
		/** all promotions data **/
        	$html .= $this->get_all_ticket_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId); 
          
		/** return html **/
        	return $html;
	}


	/** save ticket information **/
	function save_ticket()
	{
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');

		/** check data **/
		if($this->input->post()){
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }
		    	/** service details **/
		    	$iTicketId = $this->app_model->save_ticket($data);
		}
        	echo $iTicketId;exit;
	}

	/** update ticket information **/
	function update_ticket()
	{
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');

		/** check data **/
		if($this->input->post()){
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }
		    	/** service details **/
		    $iTicketId = $this->app_model->update_ticket($data);
		}
        	echo $iTicketId;exit;
	}	

	/** get ticket data ***/
	function get_all_ticket_data($iApplicationId,$iAppTabId)
	{
		/** get ticket information **/
		$allticketinfo = $this->app_model->get_ticket_information($iApplicationId);
		
		/** get all ticket data **/
		$html .='<div id="ticket_listing'.$iAppTabId.'">
            	<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
            		<tr class="nodrop">';
		    	$html.='<th>Type</th>';
			$html.='<th>Fees</th>';
			$html.='<th>Available</th>';
			$html.='<th>Timing</th>';
			$html.='<th colspan="2">Action</th>';	
		    	$html.='</tr>';	
	            	
			/** all app services **/
			for($i=0;$i<count($allticketinfo);$i++)
			{
			    $html .='<tr class="row1a">
				     <td width="10%" align="center">'.$allticketinfo[$i]['iTicketType'].'</td>
				     <td width="10%" align="center">'.$allticketinfo[$i]['fTicketPrice'].'</td>
				     <td width="20%" align="center">'.$allticketinfo[$i]['iTotalTicket'].'</td>	
				     <td width="22%" align="center">'.$allticketinfo[$i]['vShowTiming'].'</td>
				     <td align="center" width="10%"><a class="button grey" onclick="edit_ticket('.$allticketinfo[$i]["iTicketId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-edit helper-font-24" title="Edit"></i></a></td>	
				     <td align="center" width="10%"><a class="button grey" onclick="delete_ticket_details('.$allticketinfo[$i]["iTicketId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
			 	</tr>';    
			}

                $html .='</table>';
		$html .='</div>';
		return $html; 
	}

	/** showedit ticket popup **/
	function showeditticketpopup()
	{
		$iTicketId = $this->input->get('iTicketId');
        	$iFeatureId = $this->input->get('iFeatureId');
        
		/** get Catalogue info **/
		$Ticketinfo = $this->app_model->getticketinfo($iTicketId);
		$iApplicationId = $catalogueinfo['iApplicationId'];  
		
		if(count($Ticketinfo) == 0){exit;}
		
		$html='';
		$html .='<div id="ticketformid'.$iAppTabId.'" class="main_popup">
		            <div class="popup_header">
		                <h3>Edit Ticket</h3>
		            </div>

		    	<div class="popup-body">';        
                        $html .='<div id="addticket_validation'.$iAppTabId.'" style="display:none;"></div>';
                        $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmticket" id="frmticket_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_ticket" enctype="multipart/form-data">';
				    $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
		                    $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
		                   
				    $html .='<div class="control-group">
		                                <label class="control-label">Ticket Type</label>
		                                <div class="controls">
		                                    <input type="text" value="'.$Ticketinfo['iTicketType'].'" class="default" id="iTicketType'.$iAppTabId.'" name="data[iTicketType]">
		                                </div>
		                            </div>';  

					$html .='<div class="control-group">
		                                <label class="control-label">Available Ticket</label>
		                                <div class="controls">
		                                    <input type="text"  value="'.$Ticketinfo['iTotalTicket'].'" class="default" id="iTotalTicket'.$iAppTabId.'" name="data[iTotalTicket]">
		                                </div>
		                            </div>';                                    		

					$html .='<div class="control-group">
		                                <label class="control-label">Ticket Price</label>
		                                <div class="controls">
		                                    <input type="text"  value="'.$Ticketinfo['fTicketPrice'].'" class="default" id="fTicketPrice'.$iAppTabId.'" name="data[fTicketPrice]">
		                                </div>
		                            </div>';                                    		
				
			
					$html .='<div class="control-group">';
		                               $html .= '<label class="control-label" style="cursor:default;">Start Date</label>
		                                <div class="controls">
							    <input value="'.$Ticketinfo['vShowDate'].'" class="input-xlarge eventd" id="vShowDate"'.$iAppTabId.'" name="data[vShowDate]" type="text" />
		                                <div style="color:red;position: absolute; margin-top:10px;"></div>
		                                </div>
		                            </div>';
				
	 				$html .='<div class="control-group">';
		                           $html .= '<label class="control-label" style="cursor:default;">Start Time</label>
		                                <div class="controls">
							<div class="input-append bootstrap-timepicker">
		                                           <input type="text" value="'.$Ticketinfo['vShowTiming'].'" class="input-mini eventtime" id="vShowTiming'.$iAppTabId.'" name="data[vShowTiming]"><span class="add-on"><i class="icon-time"></i></span>
		                                        </div>	
		                                <div style="color:red;position: absolute; margin-top:10px;"></div>
		                                </div>
		                            </div>';

					$html .='<div class="control-group">';
		                           $html .= '<label class="control-label" style="cursor:default;">Status</label>
		                                <div class="controls">
						<input type="checkbox" value="Active" id="eStatus'.$iAppTabId.'" name="data[eStatus]"';
					$html.=$Ticketinfo['eStatus']=='Active'?'Checked':'';
					$html.=' />
		                                </div>
		                            </div>';

					$html .='<br />';
		            		$html .='<div class="control-group">
					         <div class="controls">
							<button type="button" class="btn btn-primary"  id="ticketbtn" name="ticketbtn" onclick="return updateticketdetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
			                 	</div>
				            </div>';
		                    $html .='</form>';
			$html .='</div>';
			$html .='</div>';
			$html .='<div class="popup-footer">
				<button aria-hidden="true" onclick="closeleanmodal('."'frmticket_$iAppTabId'".');" class="btn">Close</button></div>
				</div>';
		
		$html.='<style>#dyntable input{width:auto !important;}</style>';
        	echo $html;exit;	
	}

	/** Appointment **/
	function getappointmenttabhtml($iFeatureId,$iAppTabId)
	{
		/** ApplicationId **/ 
		$Data['iApplicationId'] = $this->data['iApplicationId'];
		$iApplicationId = $this->data['iApplicationId'];

		/** get Testomonial tab html **/
		$allappappointment = $this->app_model->get_appointment_details($iApplicationId);

		/** get Testomonial tab html **/
		$html = '';
		$html .='<div id="appointmentformid'.$iAppTabId.'" class="main_popup" style="display:none;">
			    <div class="popup_header">
			        <h3>Appointment Details</h3>
			    </div>';
		$html.='<div class="popup-body">';

	        $html.='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
		<tr class="nodrop">';
		$html.='<th>Name</th>';
		$html.='<th>Description</th>';
		$html.='<th colspan="2">Action</th>';	
	    	$html.='</tr>';	
	            
		for($i=0;$i<count($allappappointment);$i++)
		{
		    	$html.='<tr class="row1a">
				     <td width="33%" align="center">'.$allappappointment[$i]['iTestonomialName'].'</td>
				     <td width="33%" align="center">'.$allappappointment[$i]['tDescription'].'</td>
				     <td align="center" width="33%"><input type="checkbox" name="appointment" id="appointment'.$i.'" onClick="show_testomonial('.$allappappointment[$i]['iTestonomialId'].','.$i.');" /></td>
				     <td align="center" width="33%"><a class="button grey" onclick="delete_appointment_details('.$allappappointment[$i]["iTestonomialId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
				</tr>';    
		}
		$html .='</table>';
		$html .='</div>';
		$html .='</div>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#appointmentformid'.$iAppTabId.'" id="addappointmentid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
		$html.='Appointment Details';
		$html.='</a></div>';

		return $html;
	}
	
	/** ticket delete **/	
	function ticket_delete()
	{
		$iTicketId = $this->input->get('iTicketId');
		$ticketsinfo = $this->app_model->getticketinfo($iTicketId);

		/** promotion info **/
		$iAppTabId = $ticketsinfo['iAppTabId'];
		$iFeatureId = $ticketsinfo['iFeatureId'];

		/** delete ticket details **/
		$id = $this->app_model->delete_ticket($iPromotionsId);
	      	$iApplicationId = $this->input->get('iApplicationId');

		/** appwise ticket **/
		$html .= $this->get_appwise_ticket($iApplicationId,$iAppTabId);         
		echo $html;exit;
	}

	/** blogger tab details **/	
	function getblogtabhtml($iFeatureId,$iAppTabId)
	{
		/** blog details **/
		$iApplicationId = $this->data['iApplicationId'];

		/** get the blog details **/		
		$blog_details = $this->app_model->get_blog_tabhtml($iApplicationId);

		
	}

	/** Testonomial tab details **/
	function gettestonomialtabhtml($iFeatureId,$iAppTabId)
	{
		$iApplicationId = $this->data['iApplicationId'];
		/** get Testomonial tab html **/
		$allapptestonomial = $this->app_model->get_testonomial_details($iApplicationId);

		/** get Testomonial tab html **/
		$html = '';
		$html .='<div id="testonomialformid'.$iAppTabId.'" class="main_popup" style="display:none;">
			    <div class="popup_header">
			    <h3>Testimonials</h3>
			 </div>';

		$html.='<div class="popup-body">';        
	        $html.='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
		<tr class="nodrop">';
		$html.='<th>Name</th>';
		$html.='<th>Description</th>';
		$html.='<th colspan="2">Action</th>';	
	    	$html.='</tr>';	
	            
		for($i=0;$i<count($allapptestonomial);$i++)
		{
		    	$html.='<tr class="row1a">
				     <td width="33%" align="center">'.$allapptestonomial[$i]['iTestonomialName'].'</td>
				     <td width="33%" align="center">'.$allapptestonomial[$i]['tDescription'].'</td>
				     <td align="center" width="33%"><input type="checkbox" name="testomonial" id="testomonial'.$i.'" onClick="show_testomonial('.$allapptestonomial[$i]['iTestonomialId'].','.$i.');" /></td>
				     <td align="center" width="33%"><a class="button grey" onclick="delete_testomonial_details('.$allapptestonomial[$i]["iTestonomialId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
			</tr>';    
		}

		$html .='</table>';
		$html .='</div>';
		$html .='</div>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#testonomialformid'.$iAppTabId.'" id="addtestonomialid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
		$html.='Testomonial Details';
		$html.='</a></div>';

		return $html;
	}

	/** delete testomonial details **/
	function testomonial_delete()
	{
		/** Query **/		
		$iTestomonialId = $this->input->get('iTestomonialId');
		$this->app_model->delete_testomonial($iTestomonialId);

		/** testomonial info **/
		$iAppTabId = $this->input->get('iAppTabId');
	    	$iApplicationId = $this->input->get('iApplicationId');
	
		$html='';
		$html .= $this->app_model->get_testonomial_details($iApplicationId);
		echo $html;exit;
	}

	/** testomonial details **/
	function testomonial_details()
	{
		/** testomonial details **/
		$str = $this->input->post('str');
		$iTestonomialId = $this->input->post('iTestonomialId');

		/** testomonial details **/
		if($str == 'true'){
			/** show **/
			$this->app_model->update_status_testomonial_active($iTestonomialId);	
		}else{		
			/** hide **/
			$this->app_model->update_status_testomonial_inactive($iTestonomialId);	
		}
		echo "Success";
		exit;
	}


	/** get review tab details **/	
	function getreviewtabhtml($iFeatureId,$iAppTabId)
	{
		$iApplicationId = $this->data['iApplicationId'];
		/** get donation tab html **/
		$allappreviews = $this->app_model->get_review_details($iApplicationId);

		/** get donation tab html **/
		$html = '';
		$html .='<div id="reviewformid'.$iAppTabId.'" class="main_popup" style="display:none;">
			    <div class="popup_header">
			        <h3>Customer Reviews</h3>
			    </div>';
		
		$html.='<div class="popup-body">';        
	        $html.='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
			<tr class="nodrop">';
			$html.='<th>Name</th>';
			$html.='<th>Description</th>';
			$html.='<th>Action</th>';	
		    	$html.='</tr>';	
	            
			for($i=0;$i<count($allappreviews);$i++)
			{
			    	$html.='<tr class="row1a">
				     <td width="33%" align="center">'.$allappreviews[$i]['iReviewName'].'</td>
				     <td width="33%" align="center">'.$allappreviews[$i]['tDescription'].'</td>
				     <td align="center" width="33%"><a class="button grey" onclick="delete_review_details('.$allappreviews[$i]["iReviewId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
				</tr>';    
			}
			$html .='</table>';
		$html .='</div>';
		$html .='</div>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#reviewformid'.$iAppTabId.'" id="addreviewid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
		$html.='Review Details';
		$html.='</a></div>';

		return $html;
	}

	/** review delete **/
	function review_delete()
	{
		/** review details **/
		$iReviewId = $this->input->get('iReviewId');
		$reviewsinfo = $this->app_model->delete_review_details($iReviewId);

		/** review info **/
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $reviewsinfo['iFeatureId'];
	      	$iApplicationId = $this->input->get('iApplicationId');
		$html .= $this->get_review_details($iApplicationId);         
		echo $html;exit;
	}	

	/** get service tab details **/
	function getservicetabhtml($iFeatureId,$iAppTabId)
	{
		/** Currency code **/
		$vCurrency = $this->app_model->get_currency_code();

		/** **/
		$lang= $this->session->userdata('language');
		$service_location = $this->admin_model->get_language_details($lang);

		/** service tab html **/
		$html .='<div id="serviceformid'.$iAppTabId.'" class="main_popup" style="display:none;">
		            <div class="popup_header">
		                <h3>';
				foreach($service_location as $val){
					if($val['rLabelName'] == 'Add New Service'){
						$html.=$val['rField'];
					}
				}	
				$html.='</h3>
		            </div>
	
                    	    <div class="popup-body">';        
                        	$html .='<div id="addservice_validation'.$iAppTabId.'" style="display:none;"></div>';
                        	$html .='<div class="widget-body form">';
                            	$html .='<form class="form-horizontal" name="frmservice" id="frmservice_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_service" enctype="multipart/form-data">';
                            	$html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            	$html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';

				$html .='<div class="control-group">
		                                <label class="control-label">';
						foreach($service_location as $val){
							if($val['rLabelName'] == 'Service name'){
								$html.=$val['rField'];
							}
						}	
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;</span></a></label>
		                                <div class="controls">
		                                    <input type="text"  value="" class="default" id="vServiceName'.$iAppTabId.'" name="data[vServiceName]">
		                                </div>
                                    	</div>';    

				
				$html .='<div class="control-group">
			                        <label class="control-label">';
						foreach($service_location as $val){
							if($val['rLabelName'] == 'Service Price'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;';
						$html.=' </span></a></label>
			                        <div class="controls">
			                            <input type="text" class="default" name="data[fServiceFee]" id="fServiceFee'.$iAppTabId.'" value="'.number_format($number, 2, '.', '').'" onkeypress="return isPriceKey(event);" /> '.$this->data['user_info']['vCurrency'].'
			                        </div>
                                    	</div>';

				$html .='<div class="control-group">
				                <label class="control-label">';
						foreach($service_location as $val){
							if($val['rLabelName'] == 'Service Description'){
								$html.=$val['rField'];
							}
						}
						$html.=' <a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Service Description </span></a></label>
				                <div class="controls">
				                    <textarea class="input-xlarge" value="" rows="3" name="data[tDescription]" id="tDescription'.$iAppTabId.'"></textarea>
				                </div>
		                    	</div>';

                            	$html .='<div class="control-group">
			                        <label class="control-label">';
						foreach($service_location as $val){
							if($val['rLabelName'] == 'Max Service'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Max Service </span></a></label>
			                        <div class="controls">
			                            <input type="text" value="" class="default" name="data[vMaxService]" id="vMaxService'.$iAppTabId.'" onkeypress="return isPriceKey(event);" />
			                        </div>
                                    	</div>';

				$html .='<div class="control-group">';
                                       $html .= '<label class="control-label" style="cursor:default;">';
						foreach($service_location as $val){
							if($val['rLabelName'] == 'Duration'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Duration </span></a></label>
				                        <div class="controls">
							<input type="text" value="" class="default" name="data[vDuration]" id="vDuration'.$iAppTabId.'" />
				                        <div style="color:red;position: absolute; margin-top:10px;"></div>
				                        </div>
		                            	</div>';

				$html .='<div class="control-group">';
                                        $html .= '<label class="control-label" style="cursor:default;">';
					foreach($service_location as $val){
						if($val['rLabelName'] == 'Service Timing'){
							$html.=$val['rField'];
						}
					}
					$html .='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Service Days </span></a></label>
		                               	  <div class="controls">
							<select name="mydata[service_timing][]" id="vServiceTiming'.$iAppTabId.'" multiple>
								<option value="0">--select day--</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
							</select>	
                                        	</div>
                                    	</div>';

				$html .='<div class="control-group">';
                                        $html .= '<label class="control-label" style="cursor:default;">';
						foreach($service_location as $val){
							if($val['rLabelName'] == 'Start Time'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Start time </span></a></label>
		                               	<div class="controls">
							<div class="input-append bootstrap-timepicker">
                                                   	<input type="text" value="" class="input-mini eventtime" id="tStartTime'.$iAppTabId.'" name="mydata[tStartTime]" value="tStartTime'.$iAppTabId.'" /><span class="add-on"><i class="icon-time"></i></span>
                                                	</div>	
                                        		<div style="color:red;position: absolute; margin-top:10px;"></div>
                                        	</div>
                                    	</div>';

				$html .='<div class="control-group">';
                                        $html .= '<label class="control-label" style="cursor:default;">';
					foreach($service_location as $val){
						if($val['rLabelName'] == 'End Time'){
							$html.=$val['rField'];
						}
					}
					$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;';
						$html.='</span></a></label>
		                               	<div class="controls">
							<div class="input-append bootstrap-timepicker">
                                                	<input type="text" value="" class="input-mini eventtime" id="tEndTime'.$iAppTabId.'" name="mydata[tEndTime]" value="tEndTime'.$iAppTabId.'"><span class="add-on"><i class="icon-time"></i></span>
                                               		</div>	
                                        	<div style="color:red;position: absolute; margin-top:10px;"></div>
                                        	</div>
                                    	</div>';
				$html .='<br />';
                    		$html .='<div class="control-group">
			                 <div class="controls">
						<button type="button" class="btn btn-primary"  id="servicebtn" name="servicebtn" onclick="return submitservicedetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i>';
				foreach($service_location as $val){
					if($val['rLabelName'] == 'Save'){
						$html.=$val['rField'];
					}
				}
				$html.=' </button>
	                         	</div>
		                    </div>';
                            $html .='</form>';
                       $html .='</div>';
	    	$html .='</div>';

		$html .= '<div class="popup-footer">
			<button aria-hidden="true" onclick="closeleanmodal('."'frmservice_$iAppTabId'".');" class="btn">';
				foreach($service_location as $val){
					if($val['rLabelName'] == 'Close'){
						$html.=$val['rField'];
					}
				}	
				$html.='</button>
				</div>
			</div>';

		/** Promotion add Button **/		
		$html.='<style>#dyntable input{width:auto !important;}</style>';
			$html.='<div class="add_btn"><a class="btn btn-primary"  href="#serviceformid'.$iAppTabId.'" id="addserviceid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
			foreach($service_location as $val){
				if($val['rLabelName'] == 'Add Service'){
					$html.=$val['rField'];
				}
			}
		     	$html.='';
		$html.='</a></div>';
		/** End promotion **/

        	/** All promotions data **/
        	$html .= $this->get_total_service_details($this->data['iApplicationId'],$iAppTabId,$iFeatureId); 

        	/** Return html **/
        	return $html;
	}

	
	function showeditservicepopup()
	{
		$iServiceId = $this->input->get('iServiceId');
        	$iFeatureId = $this->input->get('iFeatureId');
		$iAppTabId = $this->input->get('iAppTabId');
        
		/** get Catalogue info **/
		$serviceinfo = $this->app_model->getserviceinfo($iServiceId);

		/** get details **/
		$lang= $this->session->userdata('language');
		$service_language = $this->admin_model->get_language_details($lang);

		/** Currency code **/
		$vCurrency = $this->app_model->get_currency_code();

		/** get service timing details **/
		$servicetiming = $this->app_model->getservicetiminginfo($iServiceId);
		$iApplicationId = $serviceinfo['iApplicationId'];  

		/** service info **/		
		if(count($serviceinfo) == 0){exit;}
		/** service tab html **/
		$html .='<div id="serviceformid'.$iAppTabId.'" class="main_popup">
		            <div class="popup_header">
		                <h3>';
				foreach($service_language as $val){
					if($val['rLabelName'] == 'Edit Service'){
						$html.=$val['rField'];
					}
				}
				$html.='</h3>
		            </div>
		       	    <div class="popup-body">';        
                        	$html .='<div id="editpromotion_validation'.$iAppTabId.'" style="display:none;"></div>';
                        	$html .='<div class="widget-body form">';
                            	$html .='<form class="form-horizontal" name="frmeditservice" id="frmeditservice_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_service" enctype="multipart/form-data">';
                            	$html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            	$html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
				$html .= '<input class="span6" type="hidden" name="iServiceId" value="'.$iServiceId.'">';

				$html .='<div class="control-group">
		                                <label class="control-label">';
						foreach($service_language as $val){
							if($val['rLabelName'] == 'Service name'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Service Name </span></a></label>
		                                <div class="controls">
		                                    <input type="text"  value="'.$serviceinfo['vServiceName'].'" class="default" id="vServiceName'.$iAppTabId.'" name="data[vServiceName]">
		                                </div>
                                    	</div>';                                    		
			
				$html .='<div class="control-group">
			                        <label class="control-label">';
						foreach($service_language as $val){
							if($val['rLabelName'] == 'Service Price'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Service Price </span></a></label>
			                        <div class="controls">
			                            <input type="text" value="'.$serviceinfo['fServiceFee'].'" class="default" name="data[fServiceFee]" id="fServiceFee'.$iAppTabId.'" onkeypress="return isPriceKey(event);" />
			                        </div>
                                    	</div>';

				$html .='<div class="control-group">
				                <label class="control-label">';
						foreach($service_language as $val){
							if($val['rLabelName'] == 'Service Description'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Service Description </span></a></label>
				                <div class="controls">
				                    <textarea class="input-xlarge" rows="3" name="data[tDescription]" id="tDescriptione'.$iServiceId.'">'.$serviceinfo['tDescription'].'</textarea>
				                </div>
		                    	</div>';

                            	$html .='<div class="control-group">
			                        <label class="control-label">';
						foreach($service_language as $val){
							if($val['rLabelName'] == 'Max Service'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Maximum number of service per day </span></a></label>
			                        <div class="controls">
			                            <input type="text" value="'.$serviceinfo['vMaxService'].'" class="default" name="data[vMaxService]" id="vMaxService'.$iAppTabId.'" onkeypress="return isPriceKey(event);" />
			                        </div>
                                    	</div>';

				$html .='<div class="control-group">';
                                       $html .= '<label class="control-label" style="cursor:default;">';
						foreach($service_language as $val){
							if($val['rLabelName'] == 'Duration'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Duration </span></a></label>
				                        <div class="controls">
							<input type="text" value="'.$serviceinfo['vDuration'].'" class="default" name="data[vDuration]" id="vDuration'.$iAppTabId.'" />
				                        <div style="color:red;position: absolute; margin-top:10px;"></div>
				                        </div>
		                            	</div>';

				$html .='<div class="control-group">';
                                        $html .= '<label class="control-label" style="cursor:default;">';
						foreach($service_language as $val){
							if($val['rLabelName'] == 'Service Timing'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Service Days </span></a></label>
		                               	  <div class="controls">
							<select name="mydata[service_timing][]" id="vServiceTiming'.$iAppTabId.'" multiple>
								<option value="0">--select day--</option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
								<option value="Sunday">Sunday</option>
							</select>		
                                        	</div>
                                    	</div>';

				$html .='<div class="control-group">';
                                        $html .= '<label class="control-label" style="cursor:default;">';
					foreach($service_language as $val){
						if($val['rLabelName'] == 'Start Time'){
							$html.=$val['rField'];
						}
					}
					$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Start Time </span></a></label>
		                               	<div class="controls">
							<div class="input-append bootstrap-timepicker">
                                                   	<input type="text" class="input-mini eventtime" id="tStartTime'.$iAppTabId.'" name="mydata[tStartTime]" value="'.$servicetiming[0]['tServiceStartTime'].'" /><span class="add-on"><i class="icon-time"></i></span>
                                                	</div>	
                                        		<div style="color:red;position: absolute; margin-top:10px;"></div>
                                        	</div>
                                    	</div>';

				$html .='<div class="control-group">';
                                        $html .= '<label class="control-label" style="cursor:default;">';
						foreach($service_language as $val){
							if($val['rLabelName'] == 'End Time'){
								$html.=$val['rField'];
							}
						}
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;End Time </span></a></label>
		                               	<div class="controls">
							<div class="input-append bootstrap-timepicker">
                                                	<input type="text" class="input-mini eventtime" id="tEndTime'.$iAppTabId.'" name="mydata[tEndTime]"  value="'.$servicetiming[0]['tServiceEndTime'].'" /><span class="add-on"><i class="icon-time"></i></span>
                                               		</div>	
                                        	<div style="color:red;position: absolute; margin-top:10px;"></div>
                                        	</div>
                                    	</div>';
				$html .='<br />';
                    		$html .='<div class="control-group">
			                 <div class="controls">
						<button type="button" class="btn btn-primary"  id="servicebtn" name="servicebtn" onclick="return updateservice('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i>';
					foreach($service_language as $val){
						if($val['rLabelName'] == 'Save'){
							$html.=$val['rField'];
						}
					}
					$html.='</button>
	                         	</div>
		                    </div>';
                            $html .='</form>';
                       $html .='</div>';
	    	$html .='</div>';

		$html .= '<div class="popup-footer">
			<button aria-hidden="true" onclick="closeleanmodal('."'frmservice_$iAppTabId'".');" class="btn">';
				foreach($service_language as $val){
					if($val['rLabelName'] == 'Close'){
						$html.=$val['rField'];
					}
				}
				$html.='</button>
				</div>
			</div>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';

		echo $html;exit;
	}

	/** edit promotion details **/
	/** update service **/
	function update_service()
	{
		/** ApplicationID **/
		$iApplicationId = $this->input->post('iApplicationId');
		$mydata = $this->input->post('mydata');
		$data = $this->input->post('data');
		$iServiceId = $this->input->post('iServiceId');

		/** delete service timing **/
		$this->app_model->delete_service_timing_details_edit($iServiceId);

		/** Update **/
		$update = $this->app_model->update_service_timing_details($data,$iServiceId);

		/** check data **/
		if($this->input->post()){
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }
	    		/** service details **/
	    		//$iServiceId = $this->app_model->update_service($data);
			/** save day and timing **/
			$this->app_model->save_service_timing($mydata,$iServiceId,$iApplicationId);	
        	}
        	echo $iServiceId;exit;
	}

	/** delete service **/
	function service_delete()
	{
		$iServiceId = $this->input->get('iServiceId');
		$serviceinfo = $this->app_model->getserviceinfo($iServiceId);

		/** promotion info **/
		$iAppTabId = $serviceinfo['iAppTabId'];
		$iFeatureId = $serviceinfo['iFeatureId'];
		
		$id = $this->app_model->delete_service($iServiceId);
		/** Application Details **/
	      	$iApplicationId = $this->input->get('iApplicationId');
		$html .= $this->get_total_service_details($iApplicationId,$iAppTabId);         
		echo $html;exit;
	}

	/** save service details **/
	function save_service()
	{	
		/** ApplicationID **/
		$iApplicationId = $this->input->post('iApplicationId');
		$mydata = $this->input->post('mydata');
		$data = $this->input->post('data');

		/** check data **/
		if($this->input->post()){
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }

	    	/** service details **/
	    	$iServiceId = $this->app_model->save_service($data);

		/** save day and timing **/
		$this->app_model->save_service_timing($mydata,$iServiceId,$iApplicationId);	
        	}
        	echo $iServiceId;exit;
	}

	/** service details **/
	function appwiseservicelisting()
	{
		/** appwise service listing **/
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
		
		/** all app service **/
		$allappservice = $this->app_model->get_appwise_service($iApplicationId,$iAppTabId);
		$html .= $this->get_total_service_details($iApplicationId,$iAppTabId,$iFeatureId); 
		echo $html;exit; 
	}

	/** get total service details **/
	function get_total_service_details($iApplicationId,$iAppTabId,$iFeatureId)
	{
		/** get appwise promotion **/
		$allappservices = $this->app_model->get_appwise_service($iApplicationId,$iAppTabId);

		/** get details **/
		$lang= $this->session->userdata('language');
		$service_language = $this->admin_model->get_language_details($lang);
	
		$html .='<div id="service_listing'.$iAppTabId.'">
            		<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
            		<tr class="nodrop">';
		    	$html.='<th>';
				foreach($service_language as $val){
					if($val['rLabelName'] == 'Service name'){
						$html.=$val['rField'];
					}
				}	
				$html.='</th>';
			$html.='<th>';
				foreach($service_language as $val){
					if($val['rLabelName'] == 'Service Fees'){
						$html.=$val['rField'];
					}
				}
				$html.='</th>';
			$html.='<th>';
				foreach($service_language as $val){
					if($val['rLabelName'] == 'Duration'){
						$html.=$val['rField'];
					}
				}
				$html.='</th>';
			$html.='<th colspan="2">';
				foreach($service_language as $val){
					if($val['rLabelName'] == 'Action'){
						$html.=$val['rField'];
					}
				}	
				$html.='</th>';	
	            	$html.='</tr>';	
	            	
			/** all app services **/
			for($i=0;$i<count($allappservices);$i++)
			{
			    	$html .='<tr class="row1a">
				     <td width="20%" align="center">'.$allappservices[$i]['vServiceName'].'</td>
				     <td width="20%" align="center">'.$allappservices[$i]['fServiceFee'].'</td>
				     <td width="20%" align="center">'.$allappservices[$i]['tDescription'].'</td>
				     <td align="center" width="10%"><a class="apptab_edit"  onclick="return edit_service('.$allappservices[$i]["iServiceId"].','.$iFeatureId.','.$iAppTabId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
				     <td align="center" width="10%"><a class="button grey" onclick="delete_service_details('.$allappservices[$i]["iServiceId"].','.$iAppTabId.','.$iApplicationId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
				</tr>';    
			}

                $html .='</table>';
		$html .='</div>';
		return $html; 
	}

	/** get donation details **/
	function getdonationtabhtml($iFeatureId,$iAppTabId)
	{
		$iApplicationId = $this->data['iApplicationId'];
		/** get donation tab html **/
		$allappdonations = $this->app_model->get_donation_details($iApplicationId);

		/** get donation tab html **/
		$html = '';
		$html .='<div id="promotionformid'.$iAppTabId.'" class="main_popup" style="display:none;">
		            <div class="popup_header">
		                <h3>Donation Details</h3>
		            </div>';
		$html.='<div class="popup-body">';        
	        $html.='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
		<tr class="nodrop">';
		$html.='<th>Name</th>';
		$html.='<th>Donation Price</th>';
		$html.='<th>Action</th>';	
	    	$html.='</tr>';	
	            
		for($i=0;$i<count($allappdonations);$i++)
		{
		    	$html.='<tr class="row1a">
			     <td width="33%" align="center">'.$allappdonations[$i]['vName'].'</td>
			     <td width="33%" align="center">'.$allappdonations[$i]['fAmount'].'</td>
			     <td align="center" width="33%"><a class="button grey" onclick="delete_promotion_details('.$allappdonations[$i]["iPromotionsId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
			</tr>';    
		}
		$html .='</table>';
		$html .='</div>';
		$html .='</div>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#promotionformid'.$iAppTabId.'" id="addpromotionid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
		$html.='Donation Details';
		$html.='</a></div>';
		return $html;
	}

	/** Promotions Details Tab **/
	function getpromotiontabhtml($iFeatureId,$iAppTabId)
	{
		/** get promotions tab html **/
		$html .='<div id="promotionformid'.$iAppTabId.'" class="main_popup" style="display:none;">
		            <div class="popup_header">
		                <h3>Add New Promotion</h3>
		            </div>
                    	<div class="popup-body">';        
                        $html .='<div id="addpromotion_validation'.$iAppTabId.'" style="display:none;"></div>';
                        $html .='<div class="widget-body form">';

                            $html .='<form class="form-horizontal" name="frmpromotion" id="frmpromotion_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_promotion" enctype="multipart/form-data">';

                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'" />';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'" />';
                           
				$html .='<div class="control-group">
			                        <label class="control-label">Promotion Title<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Promotion Title </span></a></label>
			                        <div class="controls">
			                            <input type="text"  value="" class="default" id="vTitle'.$iAppTabId.'" name="data[vTitle]" />
			                        </div>
		                        </div>';                                    		
			
				$html .='<div class="control-group">
                                        <label class="control-label">Image<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;(200px * 200px) </span></a></label>
                                        <div class="controls">
                                            <input type="file" value="vImage" class="input-xlarge" id="vImage'.$iAppTabId.'" name="vImage" onchange="readURL(this);" />';
					   $html.='<img id="vImage" src="'.$this->data['base_url'].'uploads/Item/noimg.png" width="200" height="200"/>
                                        </div>
                                    </div>';

                            	$html .='<div class="control-group">
                                        <label class="control-label">Promotion Description<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Promotion Description </span></a></label>
                                        <div class="controls">
                                            <textarea class="input-xlarge" value="" rows="3" name="data[tDescription]" id="tDescription'.$iAppTabId.'"></textarea>
                                        </div>
                                    </div>';

				$html .='<div class="control-group">';
                                       $html .= '<label class="control-label" style="cursor:default;">Start Date<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Start Date </span></a></label>
                                        <div class="controls">
						<div class="input-append bootstrap-datepicker">
                                                    <input value="" class="input-xlarge eventd" id="tStartDate'.$iAppTabId.'" name="data[tStartDate]" type="text" />
                                                </div>	
                                        	<div style="color:red;position: absolute; margin-top:10px;"></div>
                                        </div>
                                    </div>';

				 $html .='<div class="control-group">';
                                       $html .= '<label class="control-label" style="cursor:default;">Start Time<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Start Time </span></a></label>
                                        <div class="controls">
						<div class="input-append bootstrap-timepicker">
                                                   <input type="text" value="" class="input-mini eventtime" id="tStartTime'.$iAppTabId.'" name="data[tStartTime]"><span class="add-on"><i class="icon-time"></i></span>
                                                </div>	
                                        	<div style="color:red;position: absolute; margin-top:10px;"></div>
                                        </div>
                                    </div>';

				$html .='<div class="control-group">';
                                       $html .= '<label class="control-label" style="cursor:default;">End Date<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;End Date </span></a></label>
                                        <div class="controls">
						<div class="input-append bootstrap-datepicker">
                                                <input value="" class="input-xlarge eventd" id="tEndDate"'.$iAppTabId.'" name="data[tEndDate]" type="text" />
                                                </div>	
                                        <div style="color:red;position: absolute; margin-top:10px;"></div>
                                        </div>
                                    </div>';

 				$html .='<div class="control-group">';
                                   $html .= '<label class="control-label" style="cursor:default;">End Time<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;End Time </span></a></label>
                                        <div class="controls">
						<div class="input-append bootstrap-timepicker">
                                                   <input type="text" value="" class="input-mini eventtime" id="tEndTime'.$iAppTabId.'" name="data[tEndTime]"><span class="add-on"><i class="icon-time"></i></span>
                                                </div>	
                                        <div style="color:red;position: absolute; margin-top:10px;"></div>
                                        </div>
                                    </div>';

				$html .='<br />';

                    		$html .='<div class="control-group">
			                 <div class="controls">
						<button type="button" class="btn btn-primary"  id="promotionbtn" name="promotionbtn" onclick="return submitpromotiondetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
	                         	</div>
		                    </div>';

                            $html .='</form>';
                       $html .='</div>';

	    	$html .='</div>';

		$html .= '<script>';
		$html .= 'function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("#vImage")
						.attr("src", e.target.result)
						.width(200)
						.height(200);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}';
		$html .= '</script>';

		$html .= '<div class="popup-footer">
			<button aria-hidden="true" onclick="closeleanmodal('."'frmpromotion_$iAppTabId'".');" class="btn">Close</button>
				</div>
			</div>';	

		/** promotion add button **/		
		$html.='<style>#dyntable input{width:auto !important;}</style>';
			$html.='<div class="add_btn"><a class="btn btn-primary"  href="#promotionformid'.$iAppTabId.'" id="addpromotionid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
		     	$html.='Add Promotion';
		$html.='</a></div>';
		/** End promotion **/
        
		/** all promotions data **/
        	$html .= $this->get_all_promotion_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId); 
          
		/** return html **/
        	return $html;
	}


	/** list of all promotion details **/
	function get_all_promotion_data($iApplicationId,$iAppTabId,$iFeatureId)
	{
		/** get appwise promotion **/
		$allapppromotions = $this->app_model->get_appwise_promotion($iApplicationId,$iAppTabId);
	
		$html .='<div id="promotion_listing'.$iAppTabId.'">
            		<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
            			<tr class="nodrop">';
			    	$html.='<th>Name</th>';
				$html.='<th>Description</th>';
				$html.='<th colspan="2">Action</th>';	
	            	$html.='</tr>';	
	            
			for($i=0;$i<count($allapppromotions);$i++)
			{
			    	$html .='<tr class="row1a">
				     <td width="32%" align="center">'.$allapppromotions[$i]['vTitle'].'</td>
				     <td width="32%" align="center">'.$allapppromotions[$i]['tDescription'].'</td>
				     <td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_promotion('.$allapppromotions[$i]["iPromotionsId"].','.$iFeatureId.','.$iAppTabId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
				     <td align="center" width="7%"><a class="button grey" onclick="delete_promotion_details('.$allapppromotions[$i]["iPromotionsId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
				 </tr>';    
			}

                $html .='</table>';
		$html .='</div>';
		return $html; 
	}


	/** promotion delete **/
	function promotion_delete()
	{
		$iPromotionsId = $this->input->get('iPromotionsId');
		$promotionsinfo = $this->app_model->getpromotioninfo($iPromotionsId);

		/** promotion info **/
		$iAppTabId = $promotioninfo['iAppTabId'];
		$iFeatureId = $promotioninfo['iFeatureId'];

		if($iPromotionsId !='')
		{
		    if(is_dir('uploads/promotion/'.$iPromotionsId)){
		       $this->rm_folder_recursively('uploads/promotion/'.$iPromotionsId);
		    }       

		    $id = $this->app_model->delete_promotion($iPromotionsId);
		}

	      	$iApplicationId = $this->input->get('iApplicationId');
		$html .= $this->get_appwise_promotion($iApplicationId,$iAppTabId);         
		echo $html;exit;
	}


	/** edit promotion details **/
	function showeditpromotionpopup()
	{
		$iPromotionsId = $this->input->get('iPromotionsId');
        	$iFeatureId = $this->input->get('iFeatureId');
        
		/** get Catalogue info **/
		$promotioninfo = $this->app_model->getpromotioninfo($iPromotionsId);
		$iApplicationId = $catalogueinfo['iApplicationId'];  
		
		if(count($promotioninfo) == 0){exit;}
		$html .='<div id="promotionformid'.$iAppTabId.'" class="main_popup">
		            <div class="popup_header">
		                <h3>Edit Promotion</h3>
		            </div>

		    <div class="popup-body">';        
                        $html .='<div id="addpromotion_validation'.$iAppTabId.'" style="display:none;"></div>';
                        $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmpromotion" id="frmpromotion_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_promotion" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
				$html .= '<input class="span6" type="hidden" name="data[iPromotionsId]" value="'.$iPromotionsId.'">';

                           	 	$html .='<div class="control-group">';
						$html .= '<label class="control-label" style="cursor:default;">Promotions Title<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Promotion Title </span></a></label>
			                            	<div class="controls">
								<input type="text" id="" name="" value="'.$promotioninfo['vTitle'].'"/>
						        <div style="color:red;position: absolute; margin-top:10px;"></div>
		                                        </div>
                                            	</div>';
					$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">
                                                <label class="control-label">Image<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;(200px * 200px) </span></a></label>
                                                <div class="controls">
                                                <input type="file" value="'.$promotioninfo['vImage'].'" class="input-xlarge" id="vImage'.$iAppTabId.'" name="vImage" onchange="readURL(this);" />';
					$html.='<img id="vCatalogueImage" src="'.$this->data['base_url'].'uploads/promotion/'.$iPromotionsId.'/'.$promotioninfo['vImage'].'" width="200" height="200"/>
                                                </div>
                                            </div>';
					$html .='<div class="control-group">
                                                <label class="control-label">Promotions Description<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Promotion Description </span></a></label>
                                                <div class="controls">
                                                  	<textarea class="input-xlarge" value="" rows="3" name="data[tDescription]" id="tDescriptione">'.$promotioninfo['tDescription'].'</textarea>  
                                                </div>
                                            </div>';
					$html .='<div class="control-group">
                                                <label class="control-label">Start Date<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Start Date </span></a></label>
                                                <div class="controls">
						<div class="input-append bootstrap-datepicker">
                                                    <input value="'.$promotioninfo['tStartDate'].'" class="input-xlarge eventd" id="tStartDate'.$iAppTabId.'" name="data[tStartDate]" type="text" />
                                                </div>	
                                        	<div style="color:red;position: absolute; margin-top:10px;"></div>
                                       	 	</div>
                                            </div>';
					$html .='<div class="control-group">
                                                <label class="control-label">Start Time<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Start Time </span></a></label>
                                                <div class="controls">
                                                   <div class="input-append bootstrap-timepicker">
                                                   <input type="text" class="input-mini eventtime" id="tStartTime'.$iAppTabId.'" name="data[tStartTime]" value="'.$promotioninfo['tStartTime'].'" ><span class="add-on"><i class="icon-time"></i></span>
                                                </div>	
                                                </div>
                                            </div>';

					$html .='<div class="control-group">
                                                <label class="control-label">End Date<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;End Date </span></a></label>
                                                <div class="controls">
						<div class="input-append bootstrap-datepicker">
                                                    <input value="'.$promotioninfo['tEndDate'].'" class="input-xlarge eventd" id="tEndDate'.$iAppTabId.'" name="data[tEndDate]" type="text" />
                                                </div>	
                                        	<div style="color:red;position: absolute; margin-top:10px;"></div>
                                       	 	</div>
                                            </div>';

					$html .='<div class="control-group">
                                                <label class="control-label">End Time<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;End Time </span></a></label>
                                                <div class="controls">
                                                   <div class="input-append bootstrap-timepicker">
                                                   <input type="text" value="'.$promotioninfo['tEndTime'].'" class="input-mini eventtime" id="tEndTime'.$iAppTabId.'" name="data[tEndTime]"><span class="add-on"><i class="icon-time"></i></span>
                                                </div>	
                                                </div>
                                            </div>';

					$html .='<br />';   
                     
				    	$html .='<div class="control-group">
					         <div class="controls">
							<button type="button" class="btn btn-primary"  id="promotionbtn" name="promotionbtn" onclick="return submitpromotionsdetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
					         	</div>
						    </div>';
				            $html .='</form>';
				            $html .='</div>';
				    	$html .='</div>';

								
					$html .= '<script>';
					$html .= 'function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) {
							$("#vImage")
								.attr("src", e.target.result)
								.width(200)
								.height(200);
						};
						reader.readAsDataURL(input.files[0]);
					}
				}';
		$html .= '</script>';
	
				$html .= '<div class="popup-footer">
					<button aria-hidden="true" onclick="closeleanmodal('."'frmpromotion_$iAppTabId'".');" class="btn">Close</button>
			    	</div>
		</div>';
		
		$html.='<style>#dyntable input{width:auto !important;}</style>';
        	echo $html;exit;
	}

	
	/** update promotion **/
	function update_promotion()
	{
		$iPromotionsId = $this->input->post('iPromotionsId');
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');

		if($this->input->post()){
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }
		    
		    $size=array();
		    $size['width']=50;
		    $size['height']=50;	 
		    if($_FILES['vImage']['name'] !=''){
		        $promotionimgfile = $_FILES['vImage']['name'];
		        $fileName = $this->do_upload_img($iPromotionsId,'promotion','vImage',$size);
				
		        if($fileName){
		            $data['vImage'] = $fileName;    
		        }else{
		            $data['vImage'] = $promotionimgfile;
		        }
		        $iPromotionsId = $this->app_model->update_promotion($data,$iPromotionsId);
		    }            
		    $iPromotionsId = $this->app_model->update_promotion($data,$iPromotionsId);
		}
		echo $iWebsiteId;exit;
	}

	/** get promotion add **/
	function save_promotion()
	{
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');

		if($this->input->post()){
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }

		    /** promotion details **/
		    $iPromotionsId = $this->app_model->save_promotion($data);
		
		    /** image upload  **/
		    $size=array();
		    $size['width']=200;
		    $size['height']=200;	 
			
		    if($_FILES['vImage']['name'] !=''){
		        $promotionimgfile = $_FILES['vImage']['name'];
		        $fileName = $this->do_upload_img($iPromotionsId,'promotion','vImage',$size);
		        if($fileName){
		            $data['vImage'] = $fileName;    
		        }else{
		            $data['vImage'] = $promotionimgfile;
		        }
                	$iPromotionsId = $this->app_model->update_promotion($data,$iPromotionsId);
            		}
        	}
        	echo $iPromotionsId;exit;
	}

	/** details of Promotions **/	
	function appwisepromotionlisting()
	{
		/** appwise promotion listing **/
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
		
		/** all app promotions **/
		$allapppromotion = $this->app_model->get_appwise_promotion($iApplicationId,$iAppTabId);
		$html .= $this->get_all_promotion_data($iApplicationId,$iAppTabId,$iFeatureId); 
		echo $html;exit; 
	}

	/** New Arrival Tab **/
	function getnewarrivaltabhtml($iFeatureId,$iAppTabId)
	{
		/** get new arrival tab html **/
	    $iClientId = $this->data['user_info']['iAdminId'];
	    $iRoleId=$this->data['user_info']['iRoleId'];
	    $iApplicationId = $this->data['iApplicationId'];

	    $appindustry = $this->app_model->get_all_appindustry_applicationId($iApplicationId);

            $html .='<div id="arrivalformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                     <div class="popup_header">
                        <h3>Add New Arrival</h3>
                     </div>
                     <div class="popup-body">';        
                        $html .='<div id="addarrival_validation'.$iAppTabId.'" style="display:none;"></div>';
                        $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmarrival" id="frmarrival_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_arrival" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                       $html .= '<label class="control-label" style="cursor:default;">Arrival Types<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Type </span></a></label>
		<div class="controls">
		<select name="data[vArrivalType]" id="vArrivalType'.$iAppTabId.'">						';								
		$html.='<option value="'.$appindustry['iIndustryId'].'">'.$appindustry['vTitle'].'</option>';
		$html.='</select>	
		                                <div style="color:red;position: absolute; margin-top:10px;"></div>
		                                </div>
                                    	</div>';

				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                         <label class="control-label">Arrival Name<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Name </span></a></label>
                                         <div class="controls">
                                            <input type="text" value="" class="default" id="vArrivalName'.$iAppTabId.'" name="data[vArrivalName]" />
                                        </div>
                                    </div>';   

				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                         <label class="control-label">Arrival Offer<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Offer </span></a></label>
                                         <div class="controls">
                                            <input type="text" value="" class="default" id="vArrivalOffer'.$iAppTabId.'" name="data[vArrivalOffer]" />
                                        </div>
                                    </div>';       
                             		
				$html .='<div class="control-group">
                                         <label class="control-label">Arrival Description<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Description </span></a></label>
                                         <div class="controls">
                                             <textarea class="input-xlarge" name="data[tDescription]" id="tDescriptione'.$iAppTabId.'" cols="" rows=""></textarea>
                                         </div>
                                    </div>';
				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                        <label class="control-label">Arrival Image<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> 200px * 200px </span></a></label>
                                        <div class="controls">
                                            <input type="file" value="vImage" class="input-xlarge" id="vArrivalImage'.$iAppTabId.'" name="vArrivalImage" onchange="readURL(this);" />';
					$html.='<img id="vArrivalImage" src="'.$this->data['base_url'].'uploads/Item/noimg.png" width="200" height="200"/>
                                        </div>
                                    </div>';
				$html .='<br />';                        
				$html .='<div class="control-group">
			                <div class="controls">
						<button type="button" class="btn btn-primary"  id="cataloguebtn" name="cataloguebtn" onclick="return submitarrivaldetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
		                 		</div>
			            	</div>';
		                    $html .='</form>';
		                    $html .='</div>';
			    	$html .='</div>';
				$html .= '<div class="popup-footer">
				<button aria-hidden="true" onclick="closeleanmodal('."'frmwebsite_$iAppTabId'".');" class="btn">Close</button>
			    </div>
		</div>';
		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html .= '<div class="add_btn"><a class="btn btn-primary"  href="#arrivalformid'.$iAppTabId.'" id="addarrivalid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
	     	$html.='Add New Arrival';
		$html.='</a></div>';

		$html .= '<script>';
		$html .= 'function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("#vArrivalImage")
						.attr("src", e.target.result)
						.width(200)
						.height(200);
				};
				reader.readAsDataURL(input.files[0]);
				}
			}';
		$html .= '</script>';
        
		/** all arrival details **/
        	$html .= $this->get_all_arrival_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId); 
          
        	return $html; 
	}

	
	/**
		show edit arrival
	**/
	function showeditarrivalpopup()
	{
		/** ArrivalId And FeatureId **/
		$iArrivalId = $this->input->get('iArrivalId');
        	$iFeatureId = $this->input->get('iFeatureId');
		$iApplicationId = $this->input->get('iApplicationId');
		
		$iClientId = $this->data['user_info']['iAdminId'];
		$iRoleId=$this->data['user_info']['iRoleId'];
		
        	/** get Catalogue info **/
		$arrivalinfo = $this->app_model->getarrivalinfo($iArrivalId);
		//$iApplicationId = $catalogueinfo['iApplicationId'];
		$iAppTabId = $this->input->get('iAppTabId');

		/** app industry **/
		$appindustry = $this->app_model->get_all_appindustry_applicationId($iApplicationId);
 
		if(count($arrivalinfo) == 0){exit;}
			$html .='<div id="arrivalformid'.$iAppTabId.'" class="main_popup">
                    <div class="popup_header">
                        <h3>Edit Arrival</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editarrival_validation'.$iAppTabId.'" style="display:none;"></div>';
                        $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmeditarrival" id="frmeditarrival_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_arrival" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
			    $html .= '<input class="span6" type="hidden" name="iArrivalId" value="'.$iArrivalId.'" />';
                            $html .= '<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                       $html .= '<label class="control-label" style="cursor:default;">Arrival Types<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Type </span></a></label>
		                        <div class="controls">
					<select name="data[vArrivalType]" id="vArrivalType'.$iAppTabId.'">';
					$html.='<option value="'.$appindustry['iIndustryId'].'">'.$appindustry['vTitle'].'</option>';
					$html.='</select><div style="color:red;position: absolute; margin-top:10px;"></div>
		                                </div>
                                    	</div>';

					$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
		                                 <label class="control-label">Arrival Name<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Name </span></a></label>
		                                 <div class="controls">
		                                    <input type="text" class="default" id="vArrivalName_edit'.$iAppTabId.'" name="data[vArrivalName]" value="'.$arrivalinfo['vArrivalName'].'" />
		                                </div>
		                            </div>';   

					$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
		                                 <label class="control-label">Arrival Offer<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Offer </span></a></label>
		                                 <div class="controls">
		                                    <input type="text" class="default" id="vArrivalOffer_edit'.$iAppTabId.'" name="data[vArrivalOffer]"  value="'.$arrivalinfo['vArrivalOffer'].'" />
		                                </div>
		                            </div>';       
                             		
					$html .='<div class="control-group">
		                                 <label class="control-label">Arrival Description<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Arrival Description </span></a></label>
		                                 <div class="controls">
		                                    <textarea value="" class="input-xlarge" name="data[tDescription]" id="tDescriptione'.$iArrivalId.'" cols="" rows="">'.$arrivalinfo['tDescription'].'</textarea>
		                                 </div>
		                            </div>';

					$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
		                                <label class="control-label">Arrival Image<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> 200px * 200px </span></a></label>
		                                <div class="controls">
		                                <input type="file" value="vImage" class="input-xlarge" id="vArrivalImage_edit'.$iAppTabId.'" name="vArrivalImage" onchange="readURL(this);" />';
					$html.='<img id="vArrivalImage" src="'.$this->data['base_url'].'uploads/arrival/'.$iArrivalId.'/'.$arrivalinfo['vArrivalImage'].'" width="200" height="200"/>
		                                </div>
                                    	</div>';
					$html .='<br />';
					$html .='<div class="control-group">
			                <div class="controls">
						<button type="button" class="btn btn-primary"  id="arrivalbtn" name="arrivalbtn" onclick="return updatearrivaldetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Update</button>
		                 		</div>
			            	</div>';

		                    	$html .='</form>';
				    $html .='</div>';
				    $html .='</div>';
	
				$html .= '<div class="popup-footer">
				<button aria-hidden="true" onclick="closeleanmodal('."'frmarrival_$iAppTabId'".');" class="btn">Close</button>
			    	</div>
			</div>';

		$html .= '<script>';
		$html .= 'function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("#vArrivalImage")
						.attr("src", e.target.result)
						.width(200)
						.height(200);
				};
				reader.readAsDataURL(input.files[0]);
				}
			}';
		$html .= '</script>';

		$html.='<style>#dyntable input{width:auto !important;}</style>';
        	echo $html;exit;
	}

	function appwisearrivallisting()
	{
		/** appwise arrival listing **/
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
		
		/** all app events **/
		$allapparrival = $this->app_model->get_appwise_arrival($iApplicationId,$iAppTabId);
		/** all app arrival  **/
		$html ='';
		$html .= $this->get_all_arrival_data($iApplicationId,$iAppTabId,$iFeatureId);
		/** arrival **/
		echo $html;exit;
	}

	function update_arrival()
	{
		$iArrivalId = $this->input->post('iArrivalId');
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');

		if($this->input->post()){
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }  
			
		    /** update **/
		    $this->app_model->update_arrival($data,$iArrivalId);

		    /** image uploads **/	
		    $size=array();
		    $size['width']=50;
		    $size['height']=50;	 
		    if($_FILES['vArrivalImage']['name'] !=''){
		        $arrivalimgfile = $_FILES['vCatalogueImage']['name'];
		        $fileName = $this->do_upload_img($iArrivalId,'arrival','vArrivalImage',$size);
		        if($fileName)
			{
		            $data['vArrivalImage'] = $fileName;    
		        }else{
		            $data['vArrivalImage'] = $arrivalimgfile;
		        }
			$iArrivalId = $this->app_model->update_arrival($data,$iArrivalId);
		    }       
		}
		echo $iArrivalId;exit;
    	}


	/** save arrival **/	
	function save_arrival()
	{
		/** ApplicationId **/
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');
		

		/** post method **/
		if(count($data) >0)
		{
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }

		    /** save catalogue id **/	
		    $iArrivalId = $this->app_model->save_arrival($data);

		    /** image uploads **/	
		    $size=array();
		    $size['width']=50;
		    $size['height']=50;	 
		    /** vArrival Image name **/	
		    if($_FILES['vArrivalImage']['name'] !=''){
		        $arrivalimgfile = $_FILES['vCatalogueImage']['name'];
		        $fileName = $this->do_upload_img($iArrivalId,'arrival','vArrivalImage',$size);
		        if($fileName)
			{
		            $data['vArrivalImage'] = $fileName;    
		        }else{
		            $data['vArrivalImage'] = $arrivalimgfile;
		        }
			$iArrivalId = $this->app_model->update_arrival($data,$iArrivalId);
		    }            
		    /** end Image arrival **/	
		}
		echo $iArrivalId;exit;
	}


	/** get all arrival data **/
	function get_all_arrival_data($iApplicationId,$iAppTabId,$iFeatureId)
	{
		/** get appwise catalogues **/
		$allapparrivals = $this->app_model->get_appwise_arrival($iApplicationId);
        	
		$html .='<div id="arrival_listing'.$iAppTabId.'">
            		<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
            		<tr class="nodrop">';
		    	$html.='<th>Type</th>';
			$html.='<th>Name</th>';
			$html.='<th>Description</th>';
			$html.='<th colspan="2">Action</th>';	
	            	$html.='</tr>';	
	            
			for($i=0;$i<count($allapparrivals);$i++)
			{
			    	$html .='<tr class="row1a">
				     <td width="25%"><p class="sp_title">'.$allapparrivals[$i]['vTitle'].'</p></td>
				     <td width="32%" align="center">'.$allapparrivals[$i]['vArrivalName'].'</td>
				     <td width="32%" align="center">'.$allapparrivals[$i]['tDescription'].'</td>
				     <td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_arrival('.$allapparrivals[$i]["iArrivalId"].','.$iFeatureId.','.$iAppTabId.','.$iApplicationId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
				     <td align="center" width="7%"><a class="button grey" onclick="delete_arrival_details('.$allapparrivals[$i]["iArrivalId"].','.$iAppTabId.');" style="cursor:pointer;" /><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
				 </tr>';    
			}
                $html .='</table>';
		$html .='</div>';

		return $html; 
	}

	function arrival_delete()
	{
		$iArrivalId = $this->input->get('iArrivalId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iApplicationId = $this->input->get('iApplicationId');

		$iArrivalId  = $this->app_model->delete_arrival($iArrivalId);
		/** Arrival Details **/
		if($iArrivalId !='')
		{
		    if(is_dir('uploads/arrival/'.$iArrivalId)){
		       $this->rm_folder_recursively('uploads/arrival/'.$iArrivalId);
		    }       
		}
	
		/** get appwise arrival **/
		$html .= $this->get_all_arrival_data($iApplicationId,$iAppTabId);         
		echo $html;exit;
	}

	/** save frm data **/
	function save_frm_data()
	{
		$Data = $this->input->post('data');		
		$aid = $this->input->post('iApplicationId');		
		$this->data['iApplicationId'] = $aid;
		$iFeatureId = $this->input->post('iFeatureId');		
		$iAppTabId = $this->input->post('iAppTabId');
		
		//$slected_tab=
		$selected_appfeature = $this->app_model->get_appfeature($aid);
		foreach($selected_appfeature as $k => $v){
			if($v['iAppTabId'] == $iAppTabId){				
				$this->session->set_userdata('select_tab_iFeatureId',$k);
			}
		}
		//echo '<pre>';print_r($this->session->userdata);exit;
		//$this->session->set_userdata('select_tab_iFeatureId',$iAppTabId);
		
		  foreach ($Data as $k => $v)
		  {
			$data['iApplicationId'] = $aid;
			$data['iFieldId'] = $k;
			$data['tValue'] = $v;
			$data['iAppTabId'] = $iAppTabId;
			//$id = $this->app_model->save('r_appfeaturevalue',$data);
			$exist_record = $this->app_model->get_exist_appfeaturevalue($data['iApplicationId'],$data['iFieldId'],$data['iAppTabId']);			
			if($exist_record)
			{			 
				$id = $this->app_model->update_appfeaturevalue($data,$exist_record[0]['iAppId']);
			}else{
				/** Details **/
			}
	  	}
	  	$html=$this->make_dynamic_form($iAppTabId,$iFeatureId);
	  	echo $html;exit;		  
	 	//redirect($this->data['base_url'] . 'app/step3/'.$this->data['iApplicationId']);
	}

	/** edit catalogue details **/
	function update_catalogue()
	{
		/** ApplicationId **/
		$iCatalogueId = $this->input->post('iCatalogueId');
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');
		$mydata = $this->input->post('mydata');
		
		/** post method **/
		if($this->input->post())
		{
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }
		
		    /** delete catalogue **/
		    $this->app_model->delete_catalogue_size_details($iCatalogueId);

		    /** save catalogue id **/	
		    $iCatalogueId = $this->app_model->update_catalogue($data,$iCatalogueId);

		    /** save size and colors with catalogueid **/	
		    $this->app_model->save_size_catalogue($iCatalogueId,$mydata);
		
		    /** image uploads **/	
		    $size=array();
		    $size['width']=50;
		    $size['height']=50;	 
		    if($_FILES['vCatalogueImage']['name'] !=''){
		        $catalogueimgfile = $_FILES['vCatalogueImage']['name'];
		        $fileName = $this->do_upload_img($iCatalogueId,'catalogue','vCatalogueImage',$size);
		        if($fileName)
			{
		            $data['vCatalogueImage'] = $fileName;    
		        }else{
		            $data['vCatalogueImage'] = $catalogueimgfile;
		        }
			$iCatalogueId = $this->app_model->update_catalogue($data,$iCatalogueId);
		    }            
		}
		echo $iCatalogueId;exit;
	}

	function showeditcataloguepopup()
	{
		$r_currency = $this->app_model->get_currency_code();
 	        $iCatalogueId = $this->input->get('iCatalogueId');
	       	$iFeatureId = $this->input->get('iFeatureId');
		$iAppTabId = $this->input->get('iAppTabId');

		/** showedit catalgoue popup **/
		$iClientId = $this->data['user_info']['iAdminId'];
		$iRoleId=$this->data['user_info']['iRoleId'];
		//$appindustry = $this->app_model->get_all_appindustry_clientId($iClientId,$iRoleId);
	
		/** get Catalogue info **/
		$catalogueinfo = $this->app_model->getcatalogueinfo($iCatalogueId);

		/** catalogue size table **/
		$cataloguesizedetails = $this->app_model->getcatalogueinfosize($iCatalogueId);

		/** ApplicationId **/
		$iApplicationId = $catalogueinfo['iApplicationId'];  

		/** get all industry details **/
		$appindustry = $this->app_model->get_all_appindustry_applicationId($iApplicationId);

		if(count($catalogueinfo) == 0){exit;}
		$html .='<div id="catalogueformid'.$iAppTabId.'" class="main_popup">
		            <div class="popup_header">
		                <h3>Edit Catalogue</h3>
		            </div>
		            <div class="popup-body">';        
                    $html .='<div id="editcatalogue_validation'.$iAppTabId.'" style="display:none;"></div>';
			
		    /** catalogue details **/
                    $html .='<div class="widget-body form">';
                        $html .='<form class="form-horizontal" name="frmeditcatalogue" id="frmeditcatalogue_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_catalogue" enctype="multipart/form-data">';
                        $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
			$html .= '<input class="span6" type="hidden" name="iCatalogueId" value="'.$iCatalogueId.'">';
                        $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
		            $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
		                       $html .= '<label class="control-label" style="cursor:default;">Catalogue Types<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Select Catalogue Types</span></a></label>
		                        <div class="controls">
					<select name="data[iCatalogueType]" id="iCatalogueType'.$iAppTabId.'">';
					$html.='<option value="'.$appindustry['iIndustryId'].'">'.$appindustry['vTitle'].'</option>';
					$html.='</select>';	
		                       $html.='<div style="color:red;position: absolute; margin-top:10px;"></div>
		                        </div>
		                    </div>';

				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                        <label class="control-label">Catalogue TagName<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Catalogue Name </span></a></label>
                                        <div class="controls">
                                            	<input type="text" value="'.$catalogueinfo['vCatalogueTagname'].'" class="default" id="vCatalogueTagnames'.$iAppTabId.'" name="data[vCatalogueTagname]" />
                                        </div>
                                    </div>';                                    		
			
				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                        <label class="control-label">Catalogue Image<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> (200px * 200px) </span></a></label>
                                        <div class="controls">
                                        <input type="file" value="vImage" class="input-xlarge" value="'.$catalogueinfo['vCatalogueImage'].'"  id="vCatalogueImage'.$iAppTabId.'" name="vCatalogueImage" onchange="readURL(this);" />';
					$html.='<img id="myimage" src="'.$this->data['base_url'].'uploads/catalogue/'.$iCatalogueId.'/'.$catalogueinfo['vCatalogueImage'].'" width="200" height="200"/>	
                                        </div>
                                    </div>';

                            	$html .='<div class="control-group">
                                        <label class="control-label">Catalogue Description<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Catalogue Description </span></a></label>
                                        <div class="controls">
                                            <textarea class="input-xlarge" value="'.$catalogueinfo['tDescription'].'" name="data[tDescription]" id="tDescriptione'.$iCatalogueId.'" cols="" rows="">'.$catalogueinfo['tDescription'].'</textarea>
                                        </div>
                                    </div>';

				$html .='<div class="control-group">
                                        <label class="control-label">Total Product<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Total Number of Available Product </span></a></label>
                                        <div class="controls">
                                            <input type="text" value="'.$catalogueinfo['tTotalProduct'].'" class="default" id="iTotalProduct'.$iAppTabId.'" name="data[iTotalProduct]"  onkeypress="return isPriceKey(event);" />
                                        </div>
                                    </div>';

				$html .='<div class="control-group">
                                        <label class="control-label">Currency Code<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Currency Code </span></a></label>
                                        <div class="controls">
                                        <select name="data[vCurrency]" id="vCurrency'.$iAppTabId.'">
					<option value="">--Select Currency--</option>';
					foreach($r_currency as $val){
						$html.='<option value="'.$val['currency_code'].'"';
						$html.=$val['currency_code'] == $catalogueinfo['vCurrency']?'Selected':'';
						$html.='>'.$val['currency_name'].'</option>';
					}
					$html.='</select> 
                                        </div>
                                    </div>';
	
				$html .='<div class="control-group">
				<label class="control-label">Catalogue Size<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Different size of Catalogue </span></a></label>
			</div>';
	
			/** Size Defined **/
			$html .='<table id="dyntable_edit" class="table table-bordered responsive">';
			$html.='<th class="head0 nosort">Name</th>';
			$html.='<th class="head0">Color</th>';
			$html.='<th class="head0">Price</th>';
			$html.='<th class="head0">Delete</th>';
			$html.='<th class="head0"><a class="button grey" onclick="edit_catalogue_size_table();" style="cursor:pointer;"><i class="icon-plus white helper-font-24" title="" aria-describedby=""></i></a></th>';

			/** dyntable Structure **/	
			for($i=0;$i<count($cataloguesizedetails);$i++)
			{
			$html.='<tr>
			<td><input type="text" name="mydata[vSizeName'.$i.']" id="vSizeName'.$i.'" value="'.$cataloguesizedetails[$i]['vSizeName'].'" /></td>
			<td><input type="text" name="mydata[vSizeColor'.$i.']" id="vSizeColor'.$i.'" value="'.$cataloguesizedetails[$i]['vSizeColor'].'" /></td>
			<td><input type="text" name="mydata[fSizePrice'.$i.']" id="fSizePrice'.$i.'" value="'.$cataloguesizedetails[$i]['fSizePrice'].'" onkeypress="return isPriceKey(event);" /></td>
			<td colspan="2"><a class="button grey" onclick="delete_row_size();" style="cursor:pointer;"><i class="icon-trash itemdel helper-font-24" title="" aria-describedby="ui-tooltip-0"></i></a></td>
			</tr>';	
			}
			$html .='</table>'; 

			/** End Size **/
			$html .='<br />';                        
                    	$html .='<div class="control-group">
	                         <div class="controls">
					<button type="button" class="btn btn-primary"  id="cataloguebtn" name="cataloguebtn" onclick="return updatecatalogue(\''.$iAppTabId.'\',\''.$iFeatureId.'\');"><i class="icon-ok"></i>Update</button>
	                         	</div>
		                    </div>';
                            $html .='</form>';
                            $html .='</div>';
		    	$html .='</div>';
			$html .= '<div class="popup-footer">
			<button aria-hidden="true" onclick="closeleanmodal('."'frmcatalogue_$iAppTabId'".');" class="btn">Close</button>
		    	</div>
		</div>';

		$html .= '<script>';
		$html .= 'function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) {
							$("#vCatalogueImage")
								.attr("src", e.target.result)
								.width(200)
								.height(200);
						};
						reader.readAsDataURL(input.files[0]);
					}
				}';
		$html .= '</script>';

		/** save arrival html details **/
		$html.='<style>#dyntable input{width:auto !important;}</style>';
        	echo $html;exit;
    }
	
        /*** 
		Description : catalogue html 
	***/  
        function getcataloguetabhtml($iFeatureId,$iAppTabId)
	{
		/** get currency code **/
		$r_currency = $this->app_model->get_currency_code();

		$iClientId = $this->data['user_info']['iAdminId'];
		$iRoleId=$this->data['user_info']['iRoleId'];

//		$appindustry = $this->app_model->get_all_appindustry_clientId($iClientId,$iRoleId);
		$appindustry = $this->app_model->get_all_appindustry_applicationId($this->data['iApplicationId']);

		$html .='<div id="catalogueformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add New Catalogue</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addcatalogue_validation'.$iAppTabId.'" style="display:none;"></div>';
                        $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmcatalogue" id="frmcatalogue_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_catalogue" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                       $html .= '<label class="control-label" style="cursor:default;">Catalogue Types<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Select Catalogue </span></a></label>
                                        <div class="controls">
					<select name="data[iCatalogueType]" id="iCatalogueType'.$iAppTabId.'">';
					$html.='<option value="'.$appindustry['iIndustryId'].'">'.$appindustry['vTitle'].'</option>';
					$html.='</select>	
                                        <div style="color:red;position: absolute; margin-top:10px;"></div>
                                        </div>
                                    </div>';

				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                        <label class="control-label">Catalogue TagName<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Catalogue TagName </span></a></label>
                                        <div class="controls">
                                            <input type="text"  value="" class="default" id="vCatalogueTagname'.$iAppTabId.'" name="data[vCatalogueTagname]">
                                        </div>
                                    </div>';                                    		
			
				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                        <label class="control-label">Catalogue Image<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> (200px * 200px) </span></a></label>
                                        <div class="controls">
                                        <input type="file" value="vImage" class="input-xlarge" id="vCatalogueImage'.$iAppTabId.'" name="vCatalogueImage" onchange="readURL(this);" />';
					$html.='<img id="vCatalogueImage" src="'.$this->data['base_url'].'uploads/Item/noimg.png" width="200" height="200"/>	
                                        </div>
                                    </div>';

                            	$html .='<div class="control-group">
                                        <label class="control-label">Catalogue Description<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Catalogue Description </span></a></label>
                                      	<div class="controls cedit">
                                             <textarea class="input-xlarge" value="" rows="3" name="data[tDescription]" id="tDescription'.$iAppTabId.'" ></textarea>
                                        </div>
                                    </div>';

				$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                        <label class="control-label">Total Product<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Total Number Of Product </span></a></label>
                                        <div class="controls">
                                            <input type="text"  value="" class="default" id="tTotalProduct'.$iAppTabId.'" name="data[tTotalProduct]" onkeypress="return isPriceKey(event)" />
                                        </div>
                                    </div>';

				$html .='<div class="control-group">
                                        <label class="control-label">Currency Code<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Currency Code </span></a></label>
                                        <div class="controls">
                                            <select name="data[vCurrency]" id="vCurrency'.$iAppTabId.'">
						<option value="">--Select Currency--</option>';
					foreach($r_currency as $val){
						$html.='<option value="'.$val['currency_code'].'">'.$val['currency_name'].'</option>';
					}
				$html.='</select>
                                    </div>
                                </div>';
	
			$html .='<div class="control-group">
					<label class="control-label">Catalogue Size<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Different size of Catalogue </span></a></label>
				 </div>';
	
			/** Size Defined **/
			$html .='<table id="dyntable" class="table table-bordered responsive">';
			$html.='<th class="head0 nosort">Name</th>';
			$html.='<th class="head0">Color</th>';
			$html.='<th class="head0">Price</th>';
			$html.='<th class="head0">Delete</th>';
			$html.='<th class="head0"><a class="button grey" onclick="add_catalogue_size_table();" style="cursor:pointer;"><i class="icon-plus white helper-font-24" title="" aria-describedby="ui-tooltip-0"></i></a></th>';

			for($i=0;$i<1;$i++){
				$html.='<tr>
					<td><input type="text" name="mydata[vSizeName'.$i.']" id="vSizeName'.$i.'" /></td>
					<td><input type="text" name="mydata[vSizeColor'.$i.']" id="vSizeColor'.$i.'" /></td>
					<td><input type="text" name="mydata[fSizePrice'.$i.']" value="'.number_format($number, 2, '.', '').'" id="fSizePrice'.$i.'"  onkeypress="return isPriceKey(event);" /></td>
					<td colspan="2"><a class="button grey" onclick="delete_row_size();" style="cursor:pointer;"><i class="icon-trash itemdel helper-font-24" title="" aria-describedby="ui-tooltip-0"></i></a></td>
		 			</tr>';	
			}
			$html .='</table>'; 
			/** End Size **/

			$html .='<br />';                        
                    	$html .='<div class="control-group">
	                         <div class="controls">
					<button type="button" class="btn btn-primary"  id="cataloguebtn" name="cataloguebtn" onclick="return submitcataloguedetails('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
	                         	</div>
		                    </div>';
                            $html .='</form>';
                            $html .='</div>';
		    	$html .='</div>';
	
			$html .= '<div class="popup-footer">
				<button aria-hidden="true" onclick="closeleanmodal('."'frmwebsite_$iAppTabId'".');" class="btn">Close</button>
			    </div>
		</div>';

		$html .= '<script>';
		$html .= 'function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$("#vCatalogueImage")
							.attr("src", e.target.result)
							.width(200)
							.height(200);
					};
					reader.readAsDataURL(input.files[0]);
				}
			}';
		$html .= '</script>';
	
		$html.='<style>#dyntable input{width:auto !important;}</style>';
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#catalogueformid'.$iAppTabId.'" id="addcatalogueid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
	     	$html.='Add Catalogue';
		$html.='</a></div>';
        
        	$html .= $this->get_all_catalogue_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);           
		
		/** return html **/        	
		return $html;  
   	}
	
	/** get all catalogue data **/    
	function get_all_catalogue_data($iApplicationId,$iAppTabId,$iFeatureId)
	{
		/** get appwise catalogues **/
		$allappcatalogues = $this->app_model->get_appwise_catalogues($iApplicationId);
        			
		/** Edit catalogue details **/
		$html .='<div id="catalogue_listing'.$iAppTabId.'">
            		<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
            		<tr class="nodrop">';
		    	$html.='<th>Type</th>';
			$html.='<th>Name</th>';
			$html.='<th>Description</th>';
			$html.='<th colspan="2">Action</th>';	
	            	$html.='</tr>';	
	            
			for($i=0;$i<count($allappcatalogues);$i++)
			{
			    	$html .='<tr class="row1a">
				     <td width="25%"><p class="sp_title">'.$allappcatalogues[$i]['vTitle'].'</p></td>
				     <td width="32%" align="center">'.$allappcatalogues[$i]['vCatalogueTagname'].'</td>
				     <td width="32%" align="center">'.$allappcatalogues[$i]['tDescription'].'</td>
				     <td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_catalogue('.$allappcatalogues[$i]["iCatelogueId"].','.$iFeatureId.','.$iAppTabId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
				     <td align="center" width="7%"><a class="button grey" onclick="delete_catalogue_details('.$allappcatalogues[$i]["iCatelogueId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
				 </tr>';    
			}
                $html .='</table>';
		$html .='</div>';
		return $html;    
	}

	/** appwise catalogue listing **/
	function appwisecataloguelisting()
	{
		/** appwise catalogue listing **/
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');

		/** all app promotions **/
		$allapppromotion = $this->app_model->get_appwise_catalogues($iApplicationId,$iAppTabId);
		$html .= $this->get_all_catalogue_data($iApplicationId,$iAppTabId,$iFeatureId); 
		echo $html;exit; 
	}

	/** save catalogue **/
	function save_catalogue()
	{
		/** ApplicationId **/
		$iApplicationId = $this->input->post('iApplicationId');
		$data = $this->input->post('data');
		$mydata = $this->input->post('mydata');

		/** post method **/
		if($this->input->post())
		{
		    if($iApplicationId !=''){
		        $data['iApplicationId'] = $iApplicationId;
		    }

		    /** save catalogue id **/	
		    $iCatalogueId = $this->app_model->save_catalogue($data);

		    /** save size and colors with catalogueid **/	
		    $this->app_model->save_size_catalogue($iCatalogueId,$mydata);
		
		    /** image uploads **/	
		    $size=array();
		    $size['width']=50;
		    $size['height']=50;	 
		    if($_FILES['vCatalogueImage']['name'] !=''){
		        $catalogueimgfile = $_FILES['vCatalogueImage']['name'];
		        $fileName = $this->do_upload_img($iCatalogueId,'catalogue','vCatalogueImage',$size);
		        if($fileName)
			{
		            $data['vCatalogueImage'] = $fileName;    
		        }else{
		            $data['vCatalogueImage'] = $catalogueimgfile;
		        }
			$iCatalogueId = $this->app_model->update_catalogue($data,$iCatalogueId);
		    }            
		}
		echo $iCatalogueId;exit;
	}

	/** catalogue delete **/
	function catalogue_delete()
	{        
		$iCatalogueId = $this->input->get('iCatelogueId');
		$iAppTabId = $this->input->get('iAppTabId');

		$catalogueinfo = $this->app_model->getcatalogueinfo($iCatalogueId);
		$iFeatureId = $catalogueinfo['iFeatureId'];

		/** catalogue info **/
		if($iCatalogueId !='')
		{
		    if(is_dir('uploads/catalogue/'.$iCatalogueId)){
		       $this->rm_folder_recursively('uploads/catalogue/'.$iCatalogueId);
		    }       
		    $id = $this->app_model->delete_catalogue($iCatalogueId);
		}

	      	$iApplicationId = $this->input->get('iApplicationId');
		$html .= $this->get_all_catalogue_data($iApplicationId,$iAppTabId);       
  
		echo $html;exit;
	}
	/** end catalogue details **/


	    function delete() 
	    {
		$id= $this->uri->segment(3);
	       	$iClientId = $this->data['user_info']['iAdminId'];
		$iRoleId = $this->data['user_info']['iRoleId'];
		
		$this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
		 
		if(!$this->data['appinformation']){
		  //$this->session->set_flashdata('warning',"1");
		  //$this->data['warning'] = $this->session->flashdata('warning');
		  redirect($this->data['base_url']."app");
		  exit;       
		}                       
		//End of Check Authentication
		
		$this->data['message'] = $this->session->flashdata('message'); 

		$afvid = $this->app_model->delete_all($id,'r_appfeaturevalue');
		$afid = $this->app_model->delete_all($id,'r_appfeature');
		$aiid = $this->app_model->delete_all($id,'r_appinformation');
		$isAppTabId = $this->app_model->delete_sorttab_related_data($iApplicationId);
		
		$this->session->set_flashdata('message','Record Deleted Successfully.');

		redirect($this->data['base_url'] . 'app');
	    }
    
    function delete_tab(){
		
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		//echo $iApplicationId.'dsadas'.$iAppTabId;exit;
		$iAppId = $this->app_model->delete_tab_related_data($iApplicationId,$iAppTabId,'r_appfeaturevalue');
		$iAppTabId = $this->app_model->delete_tab_related_data($iApplicationId,$iAppTabId,'r_appfeature');
		$isAppTabId = $this->app_model->delete_sorttab_related_data($iApplicationId);
		
		$this->session->set_flashdata('message','Tab Deleted Successfully.');	
		redirect($this->data['base_url'] . 'app/step2/'.$iApplicationId);
	}	
	
    function add_new_tab(){
		
				$Data = $this->input->post('data');
				$Data['eCustom'] = 'Yes';
				$Data['iIconcolorId'] = $this->data['default_icon']['iIconcolorId'];

				if($Data['iIconId']){
                    $icon_deatil =  $this->app_model->get_one_iconmaster($Data['iIconId']);
					$Data['vImage'] = $icon_deatil['vImage'];
				}		          

				if($_FILES['vImage']['name'] !=''){
						$all_colors = $this->data['all_iconcolors'];
						$icon_deatils = array();
						$icon_deatils['iAdminId'] = $this->data[user_info][iAdminId];
						$iconid =  $this->app_model->save('r_iconmaster',$icon_deatils);
						foreach($all_colors as $val){
							
								$img_uploaded_partner = $this->do_upload_image($val['iIconcolorId'],"uploads/tab_icon/");
								$img_uploaded_partner_application = $this->do_upload_image($val['iIconcolorId'],"downloads/alltemplate/www/images/tab_icon/");
								$icon_deatils['vImage'] = $img_uploaded_partner;
						}
                        
                		$tcid = $this->app_model->update_iconmaster($icon_deatils,$iconid);
						$Data['iIconId'] = $iconid;
						$Data['vImage'] = $icon_deatils['vImage'];
				}
			
		$this->session->set_flashdata('message','New Tab Added Successfully.');		
		$iApplicationId = $this->app_model->save('r_appfeature',$Data);
		redirect($this->data['base_url'] . 'app/step2/'.$Data['iApplicationId']);
	}	

    function ajax_edit_custom_tab()
	{
	   $iAppTabId = $this->input->post('iAppTabId');
	   $step= $this->input->post('step');		
	   $this->data['step']=$this->input->post('step');		
	   
	   $id = $this->input->post('app');
	   $this->data['all_appindustryfeature'] = $this->app_model->get_all_appindustryfeature_data();
	   #$this->data['all_tabcustomicon'] = $this->app_model->get_all_tabcustomicon();
		
	   $exist_record = $this->app_model->get_exist_appfeature_data($iAppTabId);
	   $this->data['exist_record'] = $exist_record[0];
	   foreach ($exist_record as $value) {
	   	$id = $value[iApplicationId];
	   }
	   $this->data['featureids'] = $this->app_model->get_specific_app_featureid('r_appfeature',$id,'7');
	   
	    if(in_array('7', $this->data['featureids'][0]))
	    {
	    	$this->data['flag']='7';
	    }

	   if(!$this->data['exist_record'])
	   {
	   		exit;
	   		//$this->session->set_flashdata('message', 'This tab is already deleted.'); //Made Changes by : Sagar 19-5-2014    
		    //redirect($this->data['base_url'] . 'app/'.$step.'/');  		
	   }
	   else
	   {
	   		$this->smarty->assign('data', $this->data);
	   		$this->smarty->view('ajax_edit_custom_tab.tpl'); 
		}
	}

    function update_custom_tab()
	{	   
		$iAppTabId = $this->input->post('iAppTabId');
		$Data = $this->input->post('data');
		$Data['eCustom'] = 'Yes';
		$step=$this->input->post('step');
		$this->data['step']=$step;
		
		$Data['iIconcolorId'] = $this->data['default_icon']['iIconcolorId'];
	
				if($Data['iIconId']){
                    $icon_deatil =  $this->app_model->get_one_iconmaster($Data['iIconId']);
                   
					$Data['vImage'] = $icon_deatil['vImage'];
				}
				if($_FILES['vImage']['name']!=''){
						$all_colors = $this->data['all_iconcolors'];
						$icon_deatils = array();
						$icon_deatils['iAdminId'] = $this->data[user_info][iAdminId];;
						$iconid =  $this->app_model->save('r_iconmaster',$icon_deatils);
						foreach($all_colors as $val){
							
								$img_uploaded_partner = $this->do_upload_image($val['iIconcolorId'],"uploads/tab_icon/");
								
								$icon_deatils['vImage'] = $img_uploaded_partner;
						}
						$tcid = $this->app_model->update_iconmaster($icon_deatils,$iconid);
						$Data['iIconId'] = $iconid;
						$Data['vImage'] = $icon_deatils['vImage'];
				}
	   			$iApplicationId = $this->app_model->update_appfeature($Data,$iAppTabId);
	   
			   if($step=='step4'){		  
				  $selected_feature_details = $this->selected_feature_details($Data['iApplicationId']);
				  $this->data['selected_feature_details'] = $selected_feature_details;
				  $this->smarty->assign("data",$this->data);
				  $this->smarty->view("ajax_layout_tablisting.tpl");	  	  
			   }else{
		
				$this->session->set_flashdata('message', 'Tab Updated Sucessfully.');    
				redirect($this->data['base_url'] . 'app/'.$step.'/'.$Data['iApplicationId']);  
			   }
	}	

    function action_update()
    {        
        $ids = $this->input->post('iId');
        switch($this->input->post('action'))
        {
            case "Inactive":
            case "Active":
                    $iId = $this->role_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total  (".count($ids).")s  Record updated successfully");
                    redirect($this->data['base_url'] . 'role');
                    exit;
                    break;
            case "Delete":
                    $iId = $this->role_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total  (".count($ids).")s  Record Deleted successfully");
                    redirect($this->data['base_url'] . 'role');
                    exit;
                    break;        
        }
    }
    
    
    function do_upload_image($iImageId,$folder)
    {
		//echo '<pre>';print_r($val);exit;
        if(!is_dir($folder)){
            @mkdir($folder, 0777);
        }
        if(!is_dir($folder.$iImageId)){
            @mkdir($folder.$iImageId, 0777);
        }   
        $config = array(
          'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg||PNG|png",
          'upload_path' => $folder.$iImageId,
          'file_name' => str_replace(' ','',$_FILES['vImage']['name']),
          'max_size'=>5380334
        );  
        
        
        $this->upload->initialize($config);
       // echo '<pre>';print_r($config);exit;  
        $this->upload->do_upload('vImage'); //do upload      
        $image_data = $this->upload->data(); //get image data
          $config1 = array(
          'source_image' => $image_data['full_path'], //get original image
          'new_image' => $folder.$iImageId.'/'.$image_data['file_name'], //save as new image //need to create thumbs first
          'maintain_ratio' => false,
          'width' => 60,
          'height' => 60
        );  
        $this->image_lib->initialize($config1);
        $test1 = $this->image_lib->resize();
                
        $img_uploaded = $image_data['file_name'];
        //echo '<pre>';print_r($image_data);exit;
        return $img_uploaded;
    }
    function do_upload_background_image($iImageId,$folder)
    {
		
					//echo '<pre>';print_r($val);exit;
        if(!is_dir($folder)){
            @mkdir($folder, 0777);
        }
        if(!is_dir($folder.$iImageId)){
            @mkdir($folder.$iImageId, 0777);
        }   
        $config = array(
          'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg||PNG|png",
          'upload_path' => $folder.$iImageId,
          'file_name' => str_replace(' ','',$_FILES['vImage']['name']),
          'max_size'=>5380334
        );  
        
        
          
        $this->upload->initialize($config);
       // echo '<pre>';print_r($config);exit;  
        $this->upload->do_upload('vImage'); //do upload      
        $image_data = $this->upload->data(); //get image data
          $config = array(
          'source_image' => $image_data['full_path'], //get original image
          'new_image' => $folder.$iImageId.'/org_'.$image_data['file_name'], //save as new image //need to create thumbs first
          'maintain_ratio' => false,
          'width' => 320,
          'height' => 568
        );  
        $this->image_lib->initialize($config);
        $test = $this->image_lib->resize();
        $config1 = array(
          'source_image' => $image_data['full_path'], //get original image
          'new_image' => $folder.$iImageId.'/'.$image_data['file_name'], //save as new image //need to create thumbs first
          'maintain_ratio' => false,
          'width' => 60,
          'height' => 60
        );  
        $this->image_lib->initialize($config1);
        $test1 = $this->image_lib->resize();
                
        $img_uploaded = $image_data['file_name'];
        //echo '<pre>';print_r($image_data);exit;
        return $img_uploaded;
    }    
    
    function sort_tab(){
		
		$data = array();
		$iApplicationId = $this->input->post('iApplicationId');
		$data['iApplicationId'] = $iApplicationId;
		$updateRecordsArray     = $this->input->post('recordsArray');
		$listingCounter = 1;
		foreach($updateRecordsArray as $val){
			$data['iAppTabId'] = $val;
			$data['iOrderId'] = $listingCounter;
			
			$exist_data = $this->app_model->get_one_sorttab($data['iApplicationId'],$data['iAppTabId']);
			if($exist_data){
				$id =  $this->app_model->update_sorttab($data,$exist_data['iSorttabId']);
			}else{
				$id =  $this->app_model->save('r_sorttab',$data);
			}

			$listingCounter = $listingCounter + 1;
		}
		
		echo 'Table Order saved';
	}
	
	function sort_tab_list($id){
		
		$sort_order = $this->app_model->get_sorttab_order($id);
		if (sizeof($sort_order) > 0 ){
			$new_ord_arr = array();
			$final_ord_arr = array();
			$selected_feature_details = $this->selected_feature_details($id);
			foreach($selected_feature_details as $val){
				$new_ord_arr[$val['iAppTabId']] = $val;
			}
			
			foreach($sort_order as $v){
			//	echo '<pre>';print_r($v);exit;
				$farr = $new_ord_arr[$v['iAppTabId']];
				array_push($final_ord_arr,$farr);
			}
			$marray = array();
			$uniqueArray = array_map("unserialize", array_unique(array_map("serialize", array_merge($final_ord_arr,$new_ord_arr))));
			foreach($uniqueArray as $val){
				array_push($marray,$val);
			}
			//echo '<pre>';print_r($uniqueArray);exit;
			$this->data['selected_feature_details'] = $marray;
			
		}else{
			$this->data['selected_feature_details'] = $this->selected_feature_details($id);
		}
		

		
	}
    
    function step4(){	
    	
		$sessionid = $this->session->userdata["user_info"];
        
		if($sessionid['iAdminId']=='')
        {
        	  /*echo "Hi".''.$sessionid['iAdminId'];exit;*/
        	 redirect($this->data['base_url'] . 'authentication');
        }
		$this->data['tpl_name']= "view-app-step4.tpl";

		$id = $this->uri->segment(3);		
		$this->data['step']=$this->uri->segment(2);
		$iClientId = $this->data['user_info']['iAdminId'];
        $iRoleId = $this->data['user_info']['iRoleId'];
        
        $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
         
        if(!$this->data['appinformation']){
          $this->session->set_flashdata('warning',"1");
          $this->data['warning'] = $this->session->flashdata('warning');
          $home = $this->uri->segment(1);
		  redirect($this->data['base_url'].$home);	
		  exit;       
        }
      
		$selected_feature_details = $this->selected_feature_details($id);
		$this->data['selected_feature_details'] = $selected_feature_details;
        if(!$this->data['selected_feature_details']){
		  redirect($this->data['base_url'].'app/step2/'.$id);	
		  exit;       
        }
		// $exist_assign_tmpl_info =  $this->app_model->get_one_assign_template($id);
		// if($exist_assign_tmpl_info){
		// 	$templat_id = $exist_assign_tmpl_info['iTemplateId'];//Default
		// }else{
		// 	$templat_id = 1;//Default
		// }
		
		// $this->data['templat_id'] = $templat_id;

		// $defaultappdesignInfo = $this->app_model->get_default_designInfo($templat_id);

        if($id !=''){
            $allappdesignInfo = $this->app_model->getallappdesignInfo($id);
            if($allappdesignInfo){
            	$templat_id =  $allappdesignInfo[0]['iTemplateId'];
            }else{
	        	$templat_id =  1;
	        	$allappdesignInfo_default = $this->app_model->get_default_designInfo($templat_id);
	        	$allappdesignInfo_default['iApplicationId'] = $id;
				unset($allappdesignInfo_default['vImage']);
				unset($allappdesignInfo_default['eType']);
				unset($allappdesignInfo_default['eStatus']);
				$iAppDesignInfoId = $this->app_model->save('r_app_design_ifo',$allappdesignInfo_default);
				$allappdesignInfo = $this->app_model->getallappdesignInfo($id);
            }
        }
        $this->data['templat_id'] = $templat_id;
        $this->data['tab_pattern'] = $allappdesignInfo[0]['vPattern'];
        // echo '<pre>';print_r($this->data);exit;

        // if($allappdesignInfo[0]['iBackgroundId'] ==''){
        //     //$allappdesignInfo[0]['iBackgroundId'] = 1;
        //     $allappdesignInfo[0]['iBackgroundId'] = $defaultappdesignInfo['iBackgroundId'];
        // }
        
        // if($allappdesignInfo[0]['iIconcolorId'] ==''){
        //     //$allappdesignInfo[0]['iIconcolorId'] = 12;
        //     $allappdesignInfo[0]['iIconcolorId'] = $defaultappdesignInfo['iIconcolorId'];
        // }
        
        // if($allappdesignInfo[0]['vTabColor'] ==''){
        //     //$allappdesignInfo[0]['vTabColor'] = "rgb(82,0,0)";
        //     $allappdesignInfo[0]['vTabColor'] = $defaultappdesignInfo['vTabColor'];
        // }
        
        // if($allappdesignInfo[0]['vTabTexColor'] ==''){
        //     //$allappdesignInfo[0]['vTabTexColor'] = "rgb(255,255,255)";
        //     $allappdesignInfo[0]['vTabColor'] = $defaultappdesignInfo['vTabColor'];
        // }
        
        // if($allappdesignInfo[0]['vLuncherTintColor'] ==''){
        //     //$allappdesignInfo[0]['vLuncherTintColor'] = "rgb(194,0,0)";
        //     $allappdesignInfo[0]['vTabColor'] = $defaultappdesignInfo['vTabColor'];
        // }
        
        // if($allappdesignInfo[0]['vNavigationBar'] ==''){
        //     //$allappdesignInfo[0]['vNavigationBar'] = "rgb(0,194,255)";
        //     $allappdesignInfo[0]['vNavigationBar'] = $defaultappdesignInfo['vNavigationBar'];
        // }
        
        // if($allappdesignInfo[0]['vNavigationText'] ==''){
        //     //$allappdesignInfo[0]['vNavigationText'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vNavigationText'] = $defaultappdesignInfo['vNavigationText'];
        // }
        
        // if($allappdesignInfo[0]['vNavigationShadow'] ==''){
        //     //$allappdesignInfo[0]['vNavigationShadow'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vNavigationShadow'] = $defaultappdesignInfo['vNavigationShadow'];
        // }
        
        // if($allappdesignInfo[0]['vSectionBar'] ==''){
        //     //$allappdesignInfo[0]['vSectionBar'] = "rgb(12,2,2,1)";
        //     $allappdesignInfo[0]['vSectionBar'] = $defaultappdesignInfo['vSectionBar'];
        // }
        
        // if($allappdesignInfo[0]['vSectionText'] ==''){
        //     //$allappdesignInfo[0]['vSectionText'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vSectionText'] = $defaultappdesignInfo['vSectionText'];
        // }
        
        // if($allappdesignInfo[0]['vOddRowBar'] ==''){
        //     //$allappdesignInfo[0]['vOddRowBar'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vOddRowBar'] = $defaultappdesignInfo['vOddRowBar'];
        // }
        
        // if($allappdesignInfo[0]['vOddRowText'] ==''){
        //     //$allappdesignInfo[0]['vOddRowText'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vOddRowText'] = $defaultappdesignInfo['vOddRowText'];
        // }
        
        // if($allappdesignInfo[0]['vEvenRowBar'] ==''){
        //     //$allappdesignInfo[0]['vEvenRowBar'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vEvenRowBar'] = $defaultappdesignInfo['vEvenRowBar'];
        // }
        
        // if($allappdesignInfo[0]['vEvenRowText'] ==''){
        //     //$allappdesignInfo[0]['vEvenRowText'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vEvenRowText'] = $defaultappdesignInfo['vEvenRowText'];
        // }
        
        // if($allappdesignInfo[0]['vButtonTextColor'] ==''){
        //     //$allappdesignInfo[0]['vButtonTextColor'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vButtonTextColor'] = $defaultappdesignInfo['vButtonTextColor'];
        // }
        
        // if($allappdesignInfo[0]['vButtonImageColors'] ==''){
        //     //$allappdesignInfo[0]['vButtonImageColors'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vButtonImageColors'] = $defaultappdesignInfo['vButtonImageColors'];
        // }
        
        // if($allappdesignInfo[0]['vFeatureText'] ==''){
        //     //$allappdesignInfo[0]['vFeatureText'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vFeatureText'] = $defaultappdesignInfo['vFeatureText'];
        // }
        
        // if($allappdesignInfo[0]['vFeatureText'] ==''){
        //     //$allappdesignInfo[0]['vFeatureText'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vFeatureText'] = $defaultappdesignInfo['vFeatureText'];
        // }
        
        // if($allappdesignInfo[0]['vGlobalTintColor'] ==''){
        //     //$allappdesignInfo[0]['vGlobalTintColor'] = "rgb(0,194,255,0.78)";
        //     $allappdesignInfo[0]['vGlobalTintColor'] = $defaultappdesignInfo['vGlobalTintColor'];
        // }
        
        // if($allappdesignInfo[0]['iLunchheaderId'] == 0){
        //     $allappdesignInfo[0]['iLunchheaderId'] = $defaultappdesignInfo['iLunchheaderId'];
        // }
        
        
        
        $this->data['allappdesignInfo'] = $allappdesignInfo;
        
        #echo "<pre>";
        #print_r($this->data['allappdesignInfo']);exit;
        
        	$this->data['iApplicationId'] = $id;
		$getBackgroundImageData=$this->app_model->getBackGroundId($id);
		
		$this->data['iBackgroundimgId']=$getBackgroundImageData['iBackgroundimgId'];		
		$this->data['BackgroundImageData']= $getBackgroundImageData;		
		
		/*coding for mobile background setting start*/
		
		$eTypes='Mobile';
		$getAllSelectedTabIds=$this->app_model->getSelectedTabs($id,$eTypes);		
		$this->data['allSelectedTabIds']=$getAllSelectedTabIds;
		
		$getSelectedImages=$this->app_model->selectedBgImgId($id,$eTypes);
		//echo "<pre>";print_r($getSelectedImages);exit;
		
		$selectedMobileImgIds=array();
		foreach($getSelectedImages as $value){
		  $selectedImgIds[]=$value['iBackgroundId'];		  
		}
		
		$this->data['selectedMobileImgIds']=$selectedImgIds;		
		$finalSelected_tab_array=array();
		foreach ($getAllSelectedTabIds as $val=>$k){
		  $finalSelected_tab_array[$val]=$k['iAppTabId'];		  
		}
		$this->data['finalSelected_tab_array']=$finalSelected_tab_array;	
		
		$this->sort_tab_list($id);
		$selected_feature_details = $this->selected_feature_details($id);
		$this->data['selected_feature_details'] = $selected_feature_details;
		
		
		$custom_selected_feature_details = array();
		foreach($selected_feature_details as $val){
		  $custom_selected_feature_details[$val['iAppTabId']] = $val;
		}	

		//$backgroundImageData=$this->get_all_tabbackground();
	     $iAdminId=$this->data['user_info']['iAdminId'];
		$AdminId_array[0]=0;
		$AdminId_array[1]=$iAdminId;
		
		$allBackgroundImage=$this->app_model->all_tabbackground($AdminId_array);
		
		
		
		$backgroundImageData=$this->app_model->getAppImages($this->data['iApplicationId'],$eTypes);
		
		
		$final_backgroundImageData = array();
		foreach($backgroundImageData as $val){		  
		  $selectedTabIds=$this->app_model->appTabByImageId($val['iBackgroundId'],$eTypes);		  
		  if($selectedTabIds){
		    foreach($selectedTabIds as $k => $v){			 
			 if($custom_selected_feature_details[$v['iAppTabId']]){
				$val['apptab_deatils'][] = $custom_selected_feature_details[$v['iAppTabId']];				
			 }
		    }		    
		  }
		  array_push($final_backgroundImageData,$val);		  
		}
		
		$this->data['app_image']=$allBackgroundImage;
		$this->data['all_app_image']=$allBackgroundImage;		
		$this->data['your_tabbackground']=$final_backgroundImageData;	
		
		//echo '<pre>';print_r($this->data['your_tabbackground']);exit;
		
		
		/*iPad setting coding start*/
		$iPad='Tablet';
		$selectedTabForiPad=$this->app_model->getSelectedTabs($id,$iPad);		
		$this->data['selectedTabForiPad']=$selectedTabForiPad;
		
		$selected_tab_array=array();
		foreach ($selectedTabForiPad as $val=>$k){
		  $selected_tab_array[$val]=$k['iAppTabId'];		  
		}
		$this->data['selected_iPad_tab']=$selected_tab_array;		
		$this->sort_tab_list($id);		
		
		$iPad_backgroundImageData=$this->app_model->getAppImages($this->data['iApplicationId'],$iPad);
		
		$iPad_BackgroundImg= array();
		foreach($iPad_backgroundImageData as $value){
		  
	      $tabIds=$this->app_model->appTabByImageId($value['iBackgroundId'],$iPad);		  
		  if($tabIds){
		    foreach($tabIds as $k => $v){			 
			 if($custom_selected_feature_details[$v['iAppTabId']]){
				$value['iPad_tab'][] = $custom_selected_feature_details[$v['iAppTabId']];				
			 }
		    }
		    
		  }
		  array_push($iPad_BackgroundImg,$value);		  
		}		
		
		$this->data['iPad_tabbackground']=$iPad_BackgroundImg;
		//echo "<pre>";print_r($this->data['iPad_tabbackground']);exit;
		/* iPad setting coding end */
		
		
		
		/*sub tab icon listing coding start*/
		  $getAllTabData=$this->app_model->allSubTabData($this->data['iApplicationId']);	  
		  
		  for($i=0;$i<count($getAllTabData);$i++){
			 $iAppTabId=$getAllTabData[$i]['iAppTabId'];
			 if($custom_selected_feature_details[$iAppTabId]){
				if($custom_selected_feature_details[$val['iAppTabId']]['vTitle']!=''){
				    $getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['vTitle'];				
				}else{
				    $getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['default_vTitle'];
				}
			 }  
		  }

		  //Get All BackGround Image By App

		$this->data['allBackImgByApp'] = $this->app_model->getAppImages($id,'');
		//echo '<pre>';print_r($this->data['allBackImgByApp']);exit;

		//Get All BackGround Image By Background Id
		$all_backimg_by_backgroundid = array();
		foreach ($this->data['allBackImgByApp'] as $key => $value) {
			$all_backimg_by_backgroundid[$value['iBackgroundId']] = $value;
		}
		$this->data['all_backimg_by_backgroundid'] = $all_backimg_by_backgroundid;
		//echo '<pre>';print_r($all_backimg_by_backgroundid);exit;
		//	Get Slider Image
		$this->data['exist_slider_img'] = $this->app_model->get_one_app_slideimg($this->data['iApplicationId']);
		//echo '<pre>';print_r($this->data['exist_slider_img']);exit;


		  
		  $this->data['AllSubTabImages']=$getAllTabData;		  
		  
		  $buttonBckgroundData=$this->app_model->getAllButtonImg($this->data['getAdminImgData']);		

		  $this->data['buttons_tab_background'] = $buttonBckgroundData;
		  $this->data['get_all_buttons_lunch_header'] = $this->get_all_buttons_lunch_header($this->data['getAdminImgData']);	
		//echo '<pre>'; print_r($this->data); exit;
		  $this->smarty->assign('data', $this->data);
		  
		  $this->smarty->view('template.tpl');
		  
    }
    /*
     Purpose: to save mobile and ipad background images.
    */
    function saveAppImage(){
	   
	   $iApplicationId=$this->input->post('iApplicationId');
	   $iBackgroundimgId=$this->input->post('iBackgroundimgId');
	   $app_type=$this->input->post('app_type');
	   
	   //$deleteAppImage=$this->app_model->deleteAppImages($iApplicationId);  	   
	   //echo "<pre>";print_r($_POST);exit;
	   if($iBackgroundimgId){
		  for($i=0;$i<count($iBackgroundimgId);$i++){
			 $Data['iApplicationId']=$iApplicationId;
			 $Data['eType']=$app_type;
			 $Data['iBackgroundId']=$iBackgroundimgId[$i];
			 if($Data['iBackgroundId']!=''){
				$saveData=$this->app_model->save('r_app_background_img',$Data);
			 }
		  }
	   }
	   redirect($this->data['base_url'] . 'app/step4/'.$iApplicationId);		  
    }
    
    function deleteBackgroundImg(){
	   
	   $iApplicationId=$this->input->get('iApplicationId');
	   $iBackgroundId=$this->input->get('iBackgroundId');
	   $operation=$this->input->get('Operation');	   
	   $App_type=$this->input->get('App_type');
	   
	   $Data['eType']=$App_type;  
	   
	   $deleteImage=$this->app_model->deleteAppBgImage($iApplicationId,$iBackgroundId,$App_type);
	   $deleteImgRelatedTabs=$this->app_model->deleteSubTabData($iApplicationId,$iBackgroundId,$App_type);
	   
	   
	   /*start coding for displaying background image and tab listing*/
		$id=$iApplicationId;		
		$eTypes=$App_type;
		
		
		$getSelectedImages=$this->app_model->selectedBgImgId($id,$eTypes);	   
	     $selectedMobileImgIds=array();
	     foreach($getSelectedImages as $value){
		   $selectedImgIds[]=$value['iBackgroundId'];		  
	     }		
	    $this->data['selectedMobileImgIds']=$selectedImgIds;
		
		$getAllSelectedTabIds=$this->app_model->getSelectedTabs($id,$eTypes);		
		$this->data['allSelectedTabIds']=$getAllSelectedTabIds;
		
		$finalSelected_tab_array=array();
		foreach ($getAllSelectedTabIds as $val=>$k){
		  $finalSelected_tab_array[$val]=$k['iAppTabId'];		  
		}
		
		$this->data['finalSelected_tab_array']=$finalSelected_tab_array;			
		$this->sort_tab_list($id);
		$selected_feature_details = $this->selected_feature_details($id);
		$this->data['selected_feature_details'] = $selected_feature_details;
		
		$custom_selected_feature_details = array();
		foreach($selected_feature_details as $val){
		  $custom_selected_feature_details[$val['iAppTabId']] = $val;
		}
		
	     $iAdminId=$this->data['user_info']['iAdminId'];
		$AdminId_array[0]=0;
		$AdminId_array[1]=$iAdminId;
		
		//$backgroundImageData=$this->get_all_tabbackground();
		//$allBackgroundImage=$this->get_all_tabbackground();
	     $allBackgroundImage=$this->app_model->all_tabbackground($AdminId_array);
		$this->data['iApplicationId']=$id;
		
		$backgroundImageData=$this->app_model->getAppImages($this->data['iApplicationId'],$eTypes);
		//echo "<pre>";print_r($backgroundImageData);exit;
		
		$final_backgroundImageData = array();
		foreach($backgroundImageData as $val){		  
			 $selectedTabIds=$this->app_model->appTabByImageId($val['iBackgroundId'],$eTypes);		  
			 if($selectedTabIds){
			   foreach($selectedTabIds as $k => $v){			 
				if($custom_selected_feature_details[$v['iAppTabId']]){
				    $val['apptab_deatils'][] = $custom_selected_feature_details[$v['iAppTabId']];				
				}
			   }		    
			 }
			 array_push($final_backgroundImageData,$val);
		  }
		
		$this->data['all_app_image']=$allBackgroundImage;		
		$this->data['your_tabbackground']=$final_backgroundImageData;
		$this->data['iPad_tabbackground']=$final_backgroundImageData;		
	     $this->smarty->assign('data',$this->data);
		$this->data['exist_slider_img'] = $this->app_model->get_one_app_slideimg($iApplicationId);
        
	     if($Data['eType']=='Tablet'){		  
			 $this->smarty->view('ajax_iPad_appearance.tpl');
	     }else{	  
			 $this->smarty->view('ajax_appreance.tpl');	 	       
	     }       
	}
    
    /*
     Purpose: to save mobile and ipad background datas.
     */
	
    function saveBackgroundSetting(){
       
	   $operation=$this->input->get('Operation');
	   $app_type=$this->input->get('App_type');	   
	   if($app_type==''){
		$Data['eType']='Mobile';	 
	   }else if($app_type=='iPad'){
		  $Data['eType']='Tablet';	 		 
	   }else{
		  $Data['eType']='Mobile';	 
	   }	
	   if($operation=='Delete'){
		  $iApplicationId=$this->input->get('iApplicationId');
		  $Data['iApplicationId']=$iApplicationId;
		  $iAppTabId=$this->input->get('iAppTabId');
		  $deleteapp_table=$this->app_model->deleteTabImages($iApplicationId,$iAppTabId,$Data['eType']);		  
		  $deleteTabData=$this->app_model->deleteTabData($iApplicationId,$iAppTabId,$Data['eType']);		  
	   }else{
		  
		  $Data['iApplicationId']=$this->input->get('iApplicationId');		  
		  $Data['iBackgroundimgId']=$this->input->get('iBackgroundimgId');
		  $iAppTabId=$this->input->get('iAppTabId');
		  
		  if(count($iAppTabId)>0 && $Data['iBackgroundimgId'] !=''){		  
			 for($i=0;$i<count($iAppTabId);$i++){
				$Data['iAppTabId']=$iAppTabId[$i];
				$appData=$Data;
				unset($appData['iBackgroundimgId']);		
				//$app_table=$this->app_model->save('r_app_background_img',$appData);	
                if($Data['iAppTabId'] !=''){
                    $SaveData=$this->app_model->saveBackgroundSetting($Data);    
                }			
			 }
		  }
	   }  
	   
	   $eTypes=$Data['eType'];
	   
	   $getSelectedImages=$this->app_model->selectedBgImgId($id,$eTypes);
	   
	   $selectedMobileImgIds=array();
	   foreach($getSelectedImages as $value){
		$selectedImgIds[]=$value['iBackgroundId'];		  
	   }		
	   $this->data['selectedMobileImgIds']=$selectedImgIds;  
	   
	   $this->data['iApplicationId'] =  $Data['iApplicationId'];	   
	   $getBackgroundImageData=$this->app_model->getBackGroundId($Data['iApplicationId']);
	   
	   $this->data['iBackgroundimgId']=$getBackgroundImageData['iBackgroundimgId'];	   
	   $this->data['BackgroundImageData']= $getBackgroundImageData;	   
	   
	   $getAllSelectedTabIds=$this->app_model->getSelectedTabs($Data['iApplicationId'],$eTypes);	   
	   $this->data['allSelectedTabIds']=$getAllSelectedTabIds;
	   
	   $finalSelected_tab_array=array();
	   foreach ($getAllSelectedTabIds as $val=>$k){
		$finalSelected_tab_array[$val]=$k['iAppTabId'];		  
	   }
	   $this->data['finalSelected_tab_array']=$finalSelected_tab_array;
	   $this->sort_tab_list($Data['iApplicationId']);
	   $selected_feature_details = $this->selected_feature_details($Data['iApplicationId']);
	   
	   $custom_selected_feature_details = array();
		foreach($selected_feature_details as $val){
		  $custom_selected_feature_details[$val['iAppTabId']] = $val;
	   }
	   $this->data['buttons_tab_background'] = $this->get_all_buttons_tab_background();
	   $this->data['get_all_buttons_lunch_header'] = $this->get_all_buttons_lunch_header($this->data['getAdminImgData']);
	   
	   //$backgroundImageData=$this->get_all_tabbackground();
	   $backgroundImageData=$this->app_model->getAppImages($this->data['iApplicationId'],$eTypes);
	   
	   $final_backgroundImageData = array();
	   foreach($backgroundImageData as $val){
		$selectedTabIds=$this->app_model->appTabByImageId($val['iBackgroundId'],$eTypes);
		if($selectedTabIds){
		  foreach($selectedTabIds as $k => $v){
		    if($custom_selected_feature_details[$v['iAppTabId']]){
				$val['apptab_deatils'][] = $custom_selected_feature_details[$v['iAppTabId']];			 
			 }
		  }
	   }
		array_push($final_backgroundImageData,$val);
	   }

	   //Set Slider Image
       
       
        
		$sliderdata = $this->input->get('slidedata');
        $slidermode = $this->input->get('slidermode');
        if($slidermode !=''){
                $sliderdata['vSliderMode'] = $slidermode;    
        } 
		
		if($sliderdata){
			$iApplicationId = $this->input->get('iApplicationId');
            
			$exist_info =  $this->app_model->get_one_app_slideimg($iApplicationId);
			
			if($exist_info){
				$this->app_model->update_slide_img($sliderdata,$exist_info['iAppSliderImgId']);
				//echo 'update';exit;
			}else{
				$sliderdata['iApplicationId'] = $iApplicationId;
				$this->app_model->save('r_app_slider_img_value',$sliderdata);
				//echo 'save';exit;
			}
		}
        $iApplicationId=$this->input->get('iApplicationId');
        $this->data['exist_slider_img'] = $this->app_model->get_one_app_slideimg($iApplicationId);

	   $this->data['your_tabbackground']=$final_backgroundImageData;
	   $this->data['iPad_tabbackground']=$final_backgroundImageData;
	   $this->smarty->assign('data',$this->data);   
	   
	   if($Data['eType']=='Tablet'){		  
		$this->smarty->view('ajax_iPad_appearance.tpl');
	   }else{		  
		$this->smarty->view('ajax_appreance.tpl');	 	       
	   } 	   
	}
	
	
	
	/*
     Purpose: update status of tab.
     */
	
    function udpate_status(){	   
	   
	   $iAppTabId=$this->input->get('id');
	   $Data['eActive']=$this->input->get('eStatus');	   
	   $udpateStatus=$this->app_model->update_slb_appfeature($iAppTabId,$Data);
	   if($udpateStatus){
		  echo "sucess";exit;
	   }else{
		  echo "error";exit;
	   }
    }
    
    
    function set_background_image(){
		//echo '<pre>';print_r($_FILES['vImage']);exit;
		//echo '<pre>';print_r($this->input->post('data'));exit;
		//sleep(5);
		

		$apid =  $this->input->post('iApplicationId');
		$data = $this->input->post('data');
		$data['iApplicationId'] = $apid;
			if($_FILES['vImage']['name']!=''){
				//echo 'in';
				$tabbackground = array();
				$tabbackground['vImage'] = 'demo.png';
				$tabbackground['eStatus'] = 'Active';
				$tabbackground['iAdminId'] = $this->data[user_info][iAdminId];
				$iBackgroundId =  $this->app_model->save('r_tabbackground',$tabbackground);
				$data['iBackgroundimgId'] = $iBackgroundId;
				
				//echo $iTabcustomiconId;exit;
				$Data['iBackgroundId'] = $iBackgroundId;
                $img_uploaded_partner = $this->do_upload_background_image($iBackgroundId,'uploads/background_image/');
                $tabbackground['vImage'] = $img_uploaded_partner;
                
                $tcid = $this->app_model->update_tabbackground($tabbackground,$iBackgroundId);
            }		
		     
			$app_background=array('iApplicationId'=>$data['iApplicationId'],
							  'eType'=>$data['eType'],
							  'iBackgroundId'=>$data['iBackgroundimgId'],
							  'iAppTabId'=>$data['iAppTabId'],
							  );
			//$saveDatas= $this->app_model->save('r_app_background_img',$app_background);
			
			
			$iAppBackgroundId=$this->app_model->get_one_user_appbackground($app_background['iAppTabId'],$data['eType']);
			
			if((sizeof($iAppBackgroundId) > 0)){
				$update_apptable=  $this->app_model->update_appbackground($app_background,$iAppBackgroundId['iAppBackgroundId']);
			}else{
			 $saveData =  $this->app_model->save('r_app_background_img',$app_background);
			}
			
			$exist_data = $this->app_model->get_one_user_tabbackground($data['iAppTabId'],$data['eType']);	
			if(sizeof($exist_data) > 0){			
				$id =  $this->app_model->update_user_tabbackground($data,$exist_data['iUserTabBackImgId']);				
			 }else{
				$id =  $this->app_model->save('r_user_tabbackground',$data);				
			}
			redirect($this->data['base_url'] . 'app/step3/'.$apid);		
	} 
	
	function new_design(){
		

		$this->data['tpl_name']= "new_design.tpl";
		$id = $this->uri->segment(3);
		$iClientId = $this->data['user_info']['iAdminId'];
        $iRoleId = $this->data['user_info']['iRoleId'];
        
        $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
         
        if(!$this->data['appinformation']){
          $this->session->set_flashdata('warning',"1");
          $this->data['warning'] = $this->session->flashdata('warning');
          redirect($this->data['base_url']);
          exit;       
        }
        // End Check Authentication

		$this->data['iApplicationId'] = $id;		
		$this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 		
	}
	
	function newdesign_templates(){
		

		$this->data['tpl_name']= "newdesign_templates.tpl";
		$id = $this->uri->segment(3);
		$iClientId = $this->data['user_info']['iAdminId'];
        $iRoleId = $this->data['user_info']['iRoleId'];
        
        $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
         
        if(!$this->data['appinformation'])
		{
          $this->session->set_flashdata('warning',"1");
          $this->data['warning'] = $this->session->flashdata('warning');
          redirect($this->data['base_url']);
          exit;       
        }
        // End Check Authentication

		$this->data['single_newdesign_templates'] = $this->get_all_template('Single');
		$this->data['multi_newdesign_templates'] = $this->get_all_template('Multiple');
//echo '<pre>';print_r($this->data['newdesign_templates']);exit;
		$this->data['param'] = 0;
		if($this->input->get('param') == 1){
			$this->data['param'] = 1;
			$this->data['multi_newdesign_templates'] = array();
		}
		if($this->input->get('param') == 2){
			$this->data['param'] = 2;
			$this->data['single_newdesign_templates'] = array();
		}
		$this->data['iApplicationId'] = $id;		
		$this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 		
	}
	
	function newdesign_templates_ajax()
	{
		//$this->data['tpl_name']= "newdesign_templates.tpl";
		$id = $this->uri->segment(3);
		$iClientId = $this->data['user_info']['iAdminId'];
        $iRoleId = $this->data['user_info']['iRoleId'];
        
        $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
         
        if(!$this->data['appinformation']){
          $this->session->set_flashdata('warning',"1");
          $this->data['warning'] = $this->session->flashdata('warning');
          redirect($this->data['base_url']);
          exit;       
        }
		
        // End Check Authentication
		$this->data['single_newdesign_templates'] = $this->get_all_template('Single');
		$this->data['multi_newdesign_templates'] = $this->get_all_template('Multiple');
		//echo '<pre>';print_r($this->data['newdesign_templates']);exit;
		$this->data['param'] = 0;
		if($this->input->post('param') == 1){
			$this->data['param'] = 1;
			$this->data['multi_newdesign_templates'] = array();
		}
		if($this->input->post('param') == 2){
			$this->data['param'] = 2;
			$this->data['single_newdesign_templates'] = array();
		}
		$this->data['iApplicationId'] = $id;		
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('ajax_sort_template.tpl'); 		
	}	
	
	function delete_user_background_image()
	{
		//echo '<pre>';print_r($this->input->get('bId'));exit;
		$apid = $this->uri->segment(3);
		$id = $this->input->get('bId');
		if($id) {
			$rid =  $this->app_model->user_background_image($id);
		}
		redirect($this->data['base_url'] . 'app/step3/'.$apid);	
	}
	
	
	function step6()
	{
		$this->data['tpl_name']= "view-app-step6.tpl";
		$id = $this->uri->segment(3);
		$this->data['iApplicationId'] = $id;		
		$iClientId = $this->data['user_info']['iAdminId'];
        $iRoleId = $this->data['user_info']['iRoleId'];
        
        $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
        $this->data['projectinforamtion'] = $this->app_model->get_all_projectinformation_details($this->data['iApplicationId']);
		
	    if(!$this->data['appinformation']){
          $this->session->set_flashdata('warning',"1");
          $this->data['warning'] = $this->session->flashdata('warning');
          $home = $this->uri->segment(1);
		  redirect($this->data['base_url'].$home);	
		  exit;       
        }
        
        $selected_feature_details = $this->selected_feature_details($id);
		$this->data['selected_feature_details'] = $selected_feature_details;
        if(!$this->data['selected_feature_details']){
		  redirect($this->data['base_url'].'app/step2/'.$id);	
		  exit;       
        }
		$appinformation=$this->app_model->appinformation_by_id($id);
		$this->data['appinformation']=$appinformation;

		//get payment details
		$this->data['paymentinfo'] = $this->publishapp_model->get_payment_details($id);
		$this->data['mobiledefbgImg'] = $this->app_model->getDefaultBackgroundId($id,'Mobile');
		$this->data['tabletdefbgImg'] = $this->app_model->getDefaultBackgroundId($id,'Tablet');
	    //echo "<pre>";print_r($this->data['tabletdefbgImg']);exit;
		
		/*$selected_feature_details = $this->data['selected_feature_details'];
		$html = array();
		$back_mob_img_details = array();
		$back_tab_img_details = array();
		foreach ($selected_feature_details as $key => $val)
		{
			$iFeatureId = $val['iFeatureId'];
			$iAppTabId = $val['iAppTabId'];
			$rhtml = $this->make_tabwise_dynamic_form($iFeatureId,$iAppTabId);
			$html[$iAppTabId] = $rhtml;
			$user_img_details = $this->app_model->get_one_user_tabbackground($val['iAppTabId'],'Mobile');
			if(sizeof($user_img_details) > 0)
			{
				$user_img_icon_details = $this->app_model->get_one_tabbackground($user_img_details['iBackgroundimgId']);
				$user_img_details['vImage'] = $user_img_icon_details['vImage'];
			}
			$back_mob_img_details[$iAppTabId] = $user_img_details;
			$user_img_tab_details = $this->app_model->get_one_user_tabbackground($val['iAppTabId'],'Tablet');
			if(sizeof($user_img_tab_details) > 0)
			{
				$user_img_tab_icon_details = $this->app_model->get_one_tabbackground($user_img_tab_details['iBackgroundimgId']);
				$user_img_tab_details['vImage'] = $user_img_tab_icon_details['vImage'];
			}
			$back_tab_img_details[$iAppTabId] = $user_img_tab_details;
		}
		$this->data['back_mob_img_details'] = $back_mob_img_details;
		$this->data['back_tab_img_details'] = $back_tab_img_details;*/

		$this->data['tabbackground'] = $this->get_all_tabbackground();
		$this->data['your_tabbackground'] = $this->get_all_tabbackground_admin();

		$this->data['paymentmessage'] = $this->session->flashdata('paymentmessage');
	
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('template.tpl'); 
		
	}
	
	function step5(){

		$this->data['tpl_name']= "view-app-step5.tpl";
		$id = $this->uri->segment(3);
		$iClientId = $this->data['user_info']['iAdminId'];
        $iRoleId = $this->data['user_info']['iRoleId'];
        
        $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
       	
        if(!$this->data['appinformation']){
       	  $this->session->set_flashdata('warning',"1");
          $this->data['warning'] = $this->session->flashdata('warning');
          $home = $this->uri->segment(1);
		  redirect($this->data['base_url'].$home);	
		  exit;       
        }
        // End Check Authentication
		 
		//$appinformation = $this->app_model->appinformation_by_id($id);
		$this->data['iApplicationId'] = $id;
		
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('template.tpl'); 
	}	
	
	function common_for_all()
	{
	  $appid = $this->uri->segment(3);	
	  $tab_cnt = $this->get_appfeature_count($appid);
	  $all_icons = $this->get_all_iconmaster();
	  $final_all_icons = array();
	  foreach($all_icons as $val){
	    $final_all_icons[$val['iIconId']] = $val;
	  }
	   
	  $all_iconcolors = $this->get_all_iconcolormaster();
	  $final_all_iconcolors = array();
	  foreach($all_iconcolors as $val){
	    $final_all_iconcolors[$val['iIconcolorId']] = $val;
	  }

	  $default_icon = $this->get_deafult_iconcolormaster();
	  
	  $final_default_icon = array();
	  foreach($default_icon as $val){
	    $final_default_icon[$val['iIconcolorId']] = $val;
	  }
	  // echo $appid;exit;
	  $this->data['application_info'] = $this->app_model->appinformation_by_id($appid);
	  $this->data['preset_tabbackground'] = $this->get_all_tabbackground();
	  $this->data['custom_all_icons'] = $final_all_icons;
	  $this->data['custom_all_iconcolors'] = $final_all_iconcolors;
	  $this->data['custom_default_icon'] =  $final_default_icon;
	  $this->data['all_icons'] = $all_icons;
	  $this->data['all_iconcolors'] = $all_iconcolors;
	  $this->data['default_icon'] =  $default_icon;
	  $this->data['tab_cnt'] =  $tab_cnt;
	  //echo "<pre>";print_r( $this->data['all_icons']);exit;
	}
	
	/*
     Purpose: Make status In active  of tab.
    */
	function makeInActive()
	{
	   if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }

       	   $iAppTabId=$this->input->get('id');
	   $iApplicationId=$this->input->get('iApplicationId');	   
	   $Data['eActive']=$this->input->get('eStatus');	   
	   $udpateStatus=$this->app_model->update_gappfeature($iAppTabId,$Data);	   
	   $id = $this->uri->segment(3);
	   $iClientId = $this->data['user_info']['iAdminId'];
       $iRoleId = $this->data['user_info']['iRoleId'];
        
       $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
         
       if(!$this->data['appinformation']){
          $this->session->set_flashdata('warning',"1");
          $this->data['warning'] = $this->session->flashdata('warning');
          //redirect($this->data['base_url']);
          //exit;       
        }
        // End Check Authentication
	    
	   $this->sort_tab_list($iApplicationId);
	   $selected_feature_details = $this->selected_feature_details($iApplicationId);
	   $custom_selected_feature_details = array();
	   foreach($selected_feature_details as $val){
		$custom_selected_feature_details[$val['iAppTabId']] = $val;
	   }		   
	   $this->data['selected_feature_details'] = $custom_selected_feature_details[$iAppTabId];
	   $this->smarty->assign('data',$this->data);	   
	   $this->smarty->view('tab_inactive.tpl'); 	   
    }
	
	/*
     Purpose: to upload an image of button.
     */
	
    function upload_button_img()
	{
	    $sessionid = $this->session->userdata["user_info"];

		if($sessionid['iAdminId']=='')
		{
	 		return 0;
	 		exit;
	  	
		}
		
	   $iAdminId=$this->data['user_info']['iAdminId'];
	   $Data['iAdminId']=$iAdminId;
	   $Data['eStatus']='Active';
	   
	   $size=array();
	   $size['width']=150;
	   $size['height']=150;	   
	   
	   $saveImg=$this->app_model->saveButtonImg($Data,'r_buttons_tab_background');
	   
	   $folder='tab_btn_background';
	   $img_uploaded = $this->do_upload_img($saveImg,$folder,'file_uploads_btn',$size);
	   
	   if($img_uploaded){
		 $data['vImage'] =$img_uploaded;		 
		 $updateImgName=$this->app_model->updateimgData($data,$saveImg,'iBtntabbackgroundId','r_buttons_tab_background');		 
	   }
	   $buttonBckgroundData=$this->app_model->getAllButtonImg($this->data['getAdminImgData']);
	   $this->data['buttons_tab_background'] = $buttonBckgroundData;
	   
	   $this->smarty->assign('data',$this->data);
	   $this->smarty->view('ajax_button_img.tpl'); 	   
    }
    
    /*
     Purpose: to upload an image of header.
     */
	
    function upload_header_img(){
	   
	   $iAdminId=$this->data['user_info']['iAdminId'];
	   $Data['iAdminId']=$iAdminId;
	   $Data['eStatus']='Active';
	   
	   $size=array();
	   $size['width']=324;
	   $size['height']=44;	   
	   
	   $saveImg=$this->app_model->saveButtonImg($Data,'r_lunch_header');	   
	   $img_uploaded = $this->do_upload_img($saveImg,'lunch_header','header_img',$size);	   
	   
	   if($img_uploaded){
		 $data['vImage'] =$img_uploaded;
		 $updateImgName=$this->app_model->updateimgData($data,$saveImg,'iLunchheaderId','r_lunch_header');		 
	   }	   
	   
	   $headerImg=$this->get_all_buttons_lunch_header($this->data['getAdminImgData']);	   
	   $this->data['get_all_buttons_lunch_header'] = $headerImg;  
	   
	   $this->smarty->assign('data',$this->data);
	   $this->smarty->view('ajax_header_img.tpl'); 
	}
    
    /*
     Purpose: to upload an application background images.
     */    
    function uploadBackgroundIamge(){	   	   
	   
	   $this->data['iApplicationId']=$this->input->post('iAppId');
	   $iAdminId=$this->data['user_info']['iAdminId'];
	   $Data['iAdminId']=$iAdminId;
	   $Data['eStatus']='Active';
	   
	   $size=array();
	   $size['width']=100;
	   $size['height']=143;
	   
	   $saveImg=$this->app_model->save('r_tabbackground',$Data);	   
	   $img_uploaded = $this->do_upload_back_img($saveImg,'background_image','file_uploads_btn',$size);
	   
	   if($img_uploaded){
		 $data['vImage'] =$img_uploaded;
		 $updateImgName=$this->app_model->updateimgData($data,$saveImg,'iBackgroundId','r_tabbackground');		 
	   }	   	   
	   echo $this->data['base_url'] . 'app/step4/'.$this->data['iApplicationId'];
	   exit;
    }
    
    /*
     Purpose: to upload an image in to specific folder.
     */
    
    function do_upload_back_img($folderId,$folder,$image,$size)
	{
  	   if(!is_dir('uploads/'.$folder.'/')){
		   @mkdir('uploads/'.$folder.'/', 0777);
	   }
	   if(!is_dir('uploads/'.$folder.'/'.$folderId)){
		   @mkdir('uploads/'.$folder.'/'.$folderId, 0777);
	   }   
	   if($folder=='lunch_header'){
		$fileName='h'.$folderId.'.jpg';
	   }elseif($folder=='tab_btn_background'){
		  $fileName='TB'.$folderId.'.png';
	   }elseif($folder=='background_image'){
		  $userfile_extn = explode(".", strtolower($_FILES[$image]['name']));	  
		  $fileName='bg'.$folderId.'.'.$userfile_extn[1];
	   }elseif($folder=='app_icon'){
		  $fileName=str_replace(' ','',$_FILES[$image]['name']);	  
	   }else{
	       $fileName=str_replace(' ','',$_FILES[$image]['name']);
	   }
       
	   $config1 = array(	  
		  'source_image' => $_FILES[$image]['tmp_name'], //get original image
		  'new_image' => 'uploads/'.$folder.'/'.$folderId.'/org_'.$fileName, 
		  'maintain_ratio' => false,
		  'width' =>  320,
		  'height' => 568,
		  'master_dim' => 'width'
	   );
	   
	   $this->load->library('image_lib', $config1);
	   $this->image_lib->initialize($config1);
	   $resize_img1 = $this->image_lib->resize();

	   $config2 = array(	  
		  'source_image' => $_FILES[$image]['tmp_name'], //get original image
		  'new_image' => 'uploads/'.$folder.'/'.$folderId.'/'.$fileName, 
		  'maintain_ratio' => false,
		  'width' =>  100,
		  'height' => 143,
		  'master_dim' => 'width'
	   );
	   
	   $this->load->library('image_lib', $config2);
	   $this->image_lib->initialize($config2);
	   $resize_img2 = $this->image_lib->resize(); //do whatever specified in config	   

	   return $fileName;    
    }



    function do_upload_img($folderId,$folder,$image,$size){
	   
	   if(!is_dir('uploads/'.$folder.'/')){
		   @mkdir('uploads/'.$folder.'/', 0777);
	   }
	   if(!is_dir('uploads/'.$folder.'/'.$folderId)){
		   @mkdir('uploads/'.$folder.'/'.$folderId, 0777);
	   }   
	   
       if($folder=='lunch_header'){
		$fileName='h'.$folderId.'.jpg';
	   }elseif($folder=='tab_btn_background'){
		  $fileName='TB'.$folderId.'.png';
	   }elseif($folder=='background_image'){
		  $userfile_extn = explode(".", strtolower($_FILES[$image]['name']));	  
		  $fileName='bg'.$folderId.'.'.$userfile_extn[1];
	   }elseif($folder=='app_icon'){
		  $fileName=str_replace(' ','',$_FILES[$image]['name']);	  
	   }else{
	       $fileName=str_replace(' ','',$_FILES[$image]['name']);
	   }
       
       // echo $folder;exit;
	   $config1 = array(	  
		  'source_image' => $_FILES[$image]['tmp_name'], //get original image
		  'new_image' => 'uploads/'.$folder.'/'.$folderId.'/'.$fileName,
		  'maintain_ratio' => false,
		  'width' =>  $size['width'],
		  'height' => $size['height'],
		  'master_dim' => 'width'
	   );
	   
	   $this->load->library('image_lib', $config1);
	   $this->image_lib->initialize($config1);
	   $resize_img = $this->image_lib->resize(); //do whatever specified in config	   
	   return $fileName;    
    }
    
    function addNewSubTab()
	{	   
	   $Data=$this->input->post('data');
	   if($Data['eActive']==''){
		  $Data['eActive']='No';
	   }
	   $Data['iIconcolorId'] = $this->data['default_icon']['iIconcolorId'];
	   $iSubTabId=$this->input->post('iSubTabId');
	   if($iSubTabId!=''){
		  $saveData=$this->app_model->update_appsubTab($iSubTabId,$Data);
	   }else{	   
		  $saveData=$this->app_model->save('r_sutabs',$Data);
	   }
	   
	   $selected_feature_details = $this->selected_feature_details($Data['iApplicationId']);
	   $this->data['selected_feature_details'] = $selected_feature_details;	   	   	   
	   $custom_selected_feature_details = array();
	   foreach($selected_feature_details as $val){
		$custom_selected_feature_details[$val['iAppTabId']] = $val;
	   }
	   
	   $getAllTabData=$this->app_model->allSubTabData($Data['iApplicationId']);   
	   for($i=0;$i<count($getAllTabData);$i++){
		  $iAppTabId=$getAllTabData[$i]['iAppTabId'];
		  if($custom_selected_feature_details[$iAppTabId]){
			 if($custom_selected_feature_details[$iAppTabId]['vTitle']!=''){
				$getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['vTitle'];				
			 }else{
				$getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['default_vTitle'];
			 }
		  }  
	   }
	   $this->data['AllSubTabImages']=$getAllTabData;	   
	   $this->smarty->assign('data',$this->data);	   
	   $this->smarty->view('ajax_subtab_listing.tpl');	   
    }
    function editSubTab(){
	   

	   $iSubTabId=$this->input->get('iSubTabId');
	   $iApplicationId=$this->input->get('iApplicationId');
	   
	   $getSubTabDetail=$this->app_model->subDataById($iSubTabId);
	   $this->data['AllSubTabImages']=$getSubTabDetail;	   
	   $this->data['iSubTabId']=$iSubTabId;	   	   
	   //echo "<pre>";print_r($this->data['AllSubTabImages']);exit;
	   
	   $selected_feature_details = $this->selected_feature_details($iApplicationId);
	   $this->data['selected_feature_details'] = $selected_feature_details;
	   //echo "<pre>";print_r($selected_feature_details);exit;   
	   $this->smarty->assign('data',$this->data);
	   $this->smarty->view('add_new_sub_tabs.tpl');  
    }
    function deleteSubTab(){
	    $iSubTabId=$this->input->get('iSubTabId');
	   $iApplicationId=$this->input->get('iApplicationId');
	   $deleteSubTab=$this->app_model->deleteSubTab($iSubTabId);
	   $selected_feature_details = $this->selected_feature_details($iApplicationId);
	   $this->data['selected_feature_details'] = $selected_feature_details;	   	   
	   
	   $custom_selected_feature_details = array();
	   foreach($selected_feature_details as $val){
		$custom_selected_feature_details[$val['iAppTabId']] = $val;
	   }
	   
	   $getAllTabData=$this->app_model->allSubTabData($iApplicationId);   
	   for($i=0;$i<count($getAllTabData);$i++){
		  $iAppTabId=$getAllTabData[$i]['iAppTabId'];
		  if($custom_selected_feature_details[$iAppTabId]){
			 if($custom_selected_feature_details[$val['iAppTabId']]['vTitle']!=''){
				$getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['vTitle'];				
			 }else{
				$getAllTabData[$i]['TabName']= $custom_selected_feature_details[$iAppTabId]['default_vTitle'];
			 }
		  }  
	   }
	   $this->data['AllSubTabImages']=$getAllTabData;	   
	   $this->smarty->assign('data',$this->data);	   
	   $this->smarty->view('ajax_subtab_listing.tpl');  
	   
    }
    
    function updateAppData(){
    	
	   $Data=$this->input->post('data');

	   $Data['dModifiedDate']=date('Y-m-d H:i:s');	   
	   $this->data['iApplicationId'] = $this->input->post('iApplicationId');
		//Encrypt Name Of Application
		$Data['vApplicationCode'] = $this->replaceAll($Data['tAppName']);	

	   $updatedata=$this->app_model->update_appinformation($Data,$this->data['iApplicationId']);	   
	   $this->session->set_flashdata('message',"Application updated sucessfully");   	   
	   redirect($this->data['base_url'] . 'app/step6/'.$this->data['iApplicationId']);	   
    }

    function uploadAppicon(){
    	

	   $this->data['iApplicationId'] = $this->input->post('ApplicationId');	   
	   $iApplicationId=$this->data['iApplicationId'];
	   $size=array();
	   $size['width']=150;
	   $size['height']=150;	   
	   $currentImage=$this->input->post('app_image');
	   
	   $var = unlink($this->data['base_path'].'uploads/app_icon/'.$iApplicationId.'/'.$currentImage);	   
	   $imageName=$this->do_upload_img($iApplicationId,'app_icon','icon',$size);	   
	   $data['vImage']=$imageName;	   
	   $updatedata=$this->app_model->update_appinformation($data,$this->data['iApplicationId']);
	   redirect($this->data['base_url'] . 'app/step6/'.$this->data['iApplicationId']);
	   
    }
    
    
    function saveappdesigninfo(){
    	
        
        #echo "<pre>";
        #print_r($_GET);exit;
        $data = array();
        
        $iApplicationId=$this->input->get('iApplicationId');
        $eCallBtn=$this->input->get('eCallBtn');
        $eDirectionBtn=$this->input->get('eDirectionBtn');
        $eTellFriendBtn=$this->input->get('eTellFriendBtn');
        $eShowStatusBar=$this->input->get('eShowStatusBar');
        $eBtnLayout=$this->input->get('eBtnLayout');
        $vMappingRow=$this->input->get('vMappingRow');
        $vMappingCol=$this->input->get('vMappingCol');
        $iBackgroundId = $this->input->get('iBackgroundId');
        $iIconcolorId = $this->input->get('iIconcolorId');
        $vTabColor = $this->input->get('vTabColor');
        $vTabTexColor = $this->input->get('vTabTexColor');
        $iLunchheaderId = $this->input->get('iLunchheaderId');
        $vLuncherTintColor = $this->input->get('vLuncherTintColor');
        $vNavigationBar = $this->input->get('vNavigationBar');
        $vNavigationText = $this->input->get('vNavigationText');
        $vNavigationShadow = $this->input->get('vNavigationShadow');
        $vSectionBar = $this->input->get('vSectionBar');
        $vSectionText = $this->input->get('vSectionText');
        $vOddRowBar = $this->input->get('vOddRowBar');
        $vOddRowText = $this->input->get('vOddRowText');
        $vEvenRowBar = $this->input->get('vEvenRowBar');
        $vEvenRowText = $this->input->get('vEvenRowText');
        $vButtonTextColor = $this->input->get('vButtonTextColor');
        $vButtonImageColors = $this->input->get('vButtonImageColors');
        $vFeatureText = $this->input->get('vFeatureText');
        $vOtherBackgroundColor = $this->input->get('vOtherBackgroundColor');
        $iGlobalHeaderId = $this->input->get('iGlobalHeaderId');
        $vGlobalTintColor = $this->input->get('vGlobalTintColor');
        
        $data['iApplicationId'] = $this->input->get('iApplicationId');
        $data['eCallBtn'] = $this->input->get('eCallBtn');
        $data['eDirectionBtn'] = $this->input->get('eDirectionBtn');
        $data['eTellFriendBtn'] = $this->input->get('eTellFriendBtn');
        $data['eShowStatusBar'] = $this->input->get('eShowStatusBar');
        $data['eBtnLayout'] = $this->input->get('eBtnLayout');
        $data['vMappingRow'] = $this->input->get('vMappingRow');
        $data['vMappingCol'] = $this->input->get('vMappingCol');
        $data['iBackgroundId'] = $this->input->get('iBackgroundId');
        $data['iIconcolorId'] = $this->input->get('iIconcolorId');
        $data['vTabColor'] = $this->input->get('vTabColor');
        $data['vTabTexColor'] = $this->input->get('vTabTexColor');
        $data['iLunchheaderId'] = $this->input->get('iLunchheaderId');
        $data['vLuncherTintColor'] = $this->input->get('vLuncherTintColor');
        $data['vNavigationBar'] = $this->input->get('vNavigationBar');
        $data['vNavigationText'] = $this->input->get('vNavigationText');
        $data['vNavigationShadow'] = $this->input->get('vNavigationShadow');
        $data['vSectionBar'] = $this->input->get('vSectionBar');
        $data['vSectionText'] = $this->input->get('vSectionText');
        $data['vOddRowBar'] = $this->input->get('vOddRowBar');
        $data['vOddRowText'] = $this->input->get('vOddRowText');
        $data['vEvenRowBar'] = $this->input->get('vEvenRowBar');
        $data['vEvenRowText'] = $this->input->get('vEvenRowText');
        $data['vButtonTextColor'] = $this->input->get('vButtonTextColor');
        $data['vButtonImageColors'] = $this->input->get('vButtonImageColors');
        $data['vFeatureText'] = $this->input->get('vFeatureText');
        $data['vOtherBackgroundColor'] = $this->input->get('vOtherBackgroundColor');
        $data['iGlobalHeaderId'] = $this->input->get('iGlobalHeaderId');
        $data['vGlobalTintColor'] = $this->input->get('vGlobalTintColor');
/*      echo "<pre>";
        print_r($data);exit; */
        
        $checkRec = $this->app_model->checkappdesign_info($iApplicationId);
        #echo "<pre>";
        #print_r($checkRec);exit;
        
        #echo $checkRec['iAppDesignInfoId'];exit; 
        if($checkRec['iAppDesignInfoId'] !=''){
            $id = $this->app_model->updateappdesign_info($iApplicationId,$data);
        }else{
            $id = $this->app_model->insertappdesign_info($data);
        }
        echo $id;exit;
    }
    
    function getTabWiseImages(){
    	
	   $uploadPath=$this->data['base_upload'];
	   //echo $uploadPath;exit;
	   //echo "<pre>";print_r($this->data['base_upload']);exit;
	   
	   $iApplicationId=$this->input->get('iApplicationId');
	   $this->data['iApplicationId']=$iApplicationId;	   
	   $eTypes=$this->input->get('selectedTab');
	   $this->data['eType']=$eTypes;
	   
	   $iAdminId=$this->data['user_info']['iAdminId'];
	   $AdminId_array[0]=0;
	   $AdminId_array[1]=$iAdminId;
	   //$allBackgroundImage=$this->get_all_tabbackground();
	   $allBackgroundImage=$this->app_model->all_tabbackground($AdminId_array);   
	   
	   $this->data['all_app_image']=$allBackgroundImage;	   
	   $getSelectedImages=$this->app_model->selectedBgImgId($iApplicationId,$eTypes); 	   
	   $selectedMobileImgIds=array();
	   
	   foreach($getSelectedImages as $value){
		$selectedImgIds[]=$value['iBackgroundId'];		  
	   }	   
	   $this->data['selectedMobileImgIds']=$selectedImgIds;
	   $this->smarty->assign('data',$this->data);
	   $this->smarty->assign('uploadPath',$uploadPath);
	   $this->smarty->view('ajax_img_library.tpl');	   
    }
   
    function geteventhtml($iFeatureId,$iAppTabId)
    {
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);

	/** get Language Details **/
	$lang= $this->session->userdata('language');
        
        $html .='<div id="eventformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">';

                    	//$mylang= $this->session->userdata('mylang');	
                    	foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Add Event'){
                    			 $html.='<h3>'.$val['rField'].'</h3>';
                 			}
                    	}
			
                    $html.='</div>
                    <div class="popup-body">';        
                        $html .='<div id="addevent_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmevent" id="frmevent_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_event" enctype="multipart/form-data">';
			    $html .= '<input type="hidden" name="language" id="language" value="'.$lang.'" />';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
				/*      case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;*/

                                    	case 'Textxbox':
                                        	   $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                   $html .= '<label class="control-label">';
													foreach($this->data['mylang'] as $vals){
													if($vals['rLabelName'] == $val['vLabelName']){
													$html.=$vals['rField'].'</label>';}}
                                               
                                                  	$html .='<div class="controls">';
                                                    	if($val['vDataBaseFieldName'] == "vBackgroundColor" || $val['vDataBaseFieldName'] == "vTextColor"){
                                                    		$vVal = ($val['vDataBaseFieldName'] == "vBackgroundColor") ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)';
	                                                        $html .='<input type="text" maxlength="55"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" data-color-format="rgb" class="gcp color_text_hide" value="'.$vVal.'" style="width:35px !important;background:'.$vVal.';">';
                                                    	}else{
                                                        	$html .='<input type="text" value="" maxlength="55" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >';
                                                        }
                                                    $html .='</div>
                                                </div>';
                                            break;      
											                                       
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                <label class="control-label">';
                                                foreach($this->data['mylang'] as $vals){
							if($vals['rLabelName'] == $val['vLabelName']){
								$html.=$vals['rField'].'</label>';
							}
						}
                                                $html.='<div class="controls">
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="on"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
											 
                                        case 'Radio':
                                            $html .='<div class="control-group">
													<label class="control-label">'.$val['vLabelName'].'</label>
													<div class="controls">
														<label class="radio">
															<input type="radio" value="" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
														</label>
													</div>
												</div>';
                                             break;	
											 		
                                        case 'File':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].' <a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;(200px * 200px) </span></a></label>
															<div class="controls">
																<input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" >
															</div>
                                                    </div>';					
                                                break;
												
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" cols="" rows=""></textarea>
                                                        </div>
                                                    </div>';					
                                                break;
												
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">';
                                                foreach($this->data['mylang'] as $vals){
													if($vals['rLabelName'] == $val['vLabelName']){
													$html.=$vals['rField'].'<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Select Date </span></a></label>';}}
                                               		$html.='<div class="controls">
                                                    <input value="" class="input-xlarge eventd" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
											
                                         case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                <label class="control-label">';
												foreach($this->data['mylang'] as $vals){
												if($vals['rLabelName'] == $val['vLabelName']){
													$html.=$vals['rField'].'<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Select Time </span></a></label>';}}
                                                            $html.='<div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="" class="input-mini eventtime" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break; 
											
                                           case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls cedit">
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" ></textarea>
                                                        </div>
                                                    </div>';					
                                             break; 
                                        }
                                    }
                                 
			      $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitevent('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i>';
										foreach($this->data['mylang'] as $val){
										if($val['rLabelName'] == 'Save'){
										$html.=''.$val['rField'].'';}}
                        			$html.='</button></div>'; 
						    $html .='</form>';
                        $html .='</div>';
                       
            $html .='</div>
            <div class="popup-footer">';
			$html.='<button aria-hidden="true" onclick="closeleanmodal();" class="btn">';foreach($this->data['mylang'] as $val){
										if($val['rLabelName'] == 'Close'){
										$html.=''.$val['rField'].'';}}
									$html.='</button>';
           $html.='</div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#eventformid'.$iAppTabId.'" id="addevenitid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">';
     	foreach($this->data['mylang'] as $val){
				if($val['rLabelName'] == 'Add New Event'){
					 $html.=''.$val['rField'].'';
				}
			}
     	$html.='</a></div>';
     	
        $html .= $this->all_event_data_html($this->data['iApplicationId'],$iAppTabId,$iFeatureId); 
                    
        return $html;  
        #echo "<pre>";
        #print_r($all_featurefields);exit;
    }
    	
    function all_event_data_html($iApplicationId,$iAppTabId,$iFeatureId){    	

        $allappevents = $this->app_model->get_appwise_events($iApplicationId,$iAppTabId);
        
        $html .='<div id="event_listing'.$iAppTabId.'">
                    <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">';
                    foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Title'){
                    			 $html.='<th>'.$val['rField'].'</th>';
                 			}
                    	}
                    foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Start Date'){
                    			 $html.='<th>'.$val['rField'].'</th>';
                 			}
                    	}
                    foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'End Date'){
                    			 $html.='<th>'.$val['rField'].'</th>';
                 			}
                    	}
                    foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Action'){
                    			 $html.='<th colspan="2"><center>'.$val['rField'].'</center></th>';
                 			}
                    	}
                    $html.='</tr>';
                    
                    if(count($allappevents) > 0){
                        for($i=0;$i<count($allappevents);$i++){
                            		$k = $i+1; 
					$html .='<tr class="row1a">
                                     <td width="25%"><p class="sp_title">'.$allappevents[$i]["vTitle"].'</p></td>
                                     <td width="32%" align="center">'.date("jS F Y", strtotime($allappevents[$i]["dStartDate"])).'&nbsp;'.$allappevents[$i]["vStartTime"].'</td>
                                     <td width="32%" align="center">'.date("jS F Y", strtotime($allappevents[$i]["dEndDate"])).'&nbsp;'.$allappevents[$i]["vEndTime"].'</td>
                                     <td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_event('.$allappevents[$i]["iEventId"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="7%"><a class="button grey" onclick="delete_event('.$allappevents[$i]["iEventId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                             </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No events founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
        return $html;
    }
    
    function save_event(){
        #echo "<pre>";
        #print_r($_FILES);exit;
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($data['eStatus'] == 'on'){
                $data['eStatus'] = 'Yes';
            }else{
                $data['eStatus'] = 'No';
            }
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            $iEventId = $this->app_model->save_event($data);
            
            $size=array();
            $size['width']=200;
            $size['height']=200;	 
            
            if($_FILES['vImage']['name'] !=''){
                $eventfile = $_FILES['vImage']['name'];
                $fileName = $this->do_upload_img($iEventId,'events','vImage',$size);
                if($fileName){
                    $data['vImage'] = $fileName;    
                }
                //$iEventId = $this->app_model->update_event($data,$iEventId);
            }
			//Header Image
            if($_FILES['vHeaderImage']['name'] !=''){
                $eventfile = $_FILES['vHeaderImage']['name'];
                $fileName = $this->do_upload_eventheaderimage($iEventId,'events/headerimg','vHeaderImage',$size);
                if($fileName){
                    $data['vHeaderImage'] = $fileName;    
                }
               
            }
         	$iEventId = $this->app_model->update_event($data,$iEventId);

        }

        echo $iEventId;exit;
    }
    
    function appwiseeventlisting(){
    	

        $iApplicationId = $this->input->get('iApplicationId');
        $iAppTabId = $this->input->get('iAppTabId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $allappevents = $this->app_model->get_appwise_events($iApplicationId,$iAppTabId);
        
		$html .= $this->all_event_data_html($iApplicationId,$iAppTabId,$iFeatureId); 
        echo $html;exit; 
        
    }
    
    function event_delete(){

        $iEventId = $this->input->get('iEventId');

        $eventinfo = $this->app_model->geteventinfo($iEventId);
        $iFeatureId = $eventinfo['iFeatureId'];
        //$iFeatureId = $eventinfo['iFeatureId'];
        
        $iAppTabId = $eventinfo['iAppTabId'];

        if($iEventId !=''){
            if(is_dir('uploads/events/'.$iEventId)){
               $this->rm_folder_recursively('uploads/events/'.$iEventId);
            }       
	        $id = $this->app_model->delete_events($iEventId);
        }
        
        $iApplicationId = $this->input->get('iApplicationId');

        
		$html .= $this->all_event_data_html($iApplicationId,$iAppTabId,$iFeatureId);  
		
		echo $html;exit; 
    }
    
    function showediteventpopup(){
    	
	$lang = $this->session->userdata('language');

        $iEventId = $this->input->get('iEventId');
        $iFeatureId = $this->input->get('iFeatureId');

        $eventinfo = $this->app_model->geteventinfo($iEventId);
        $iApplicationId = $eventinfo['iApplicationId'];
        $iAppTabId = $eventinfo['iAppTabId'];
        
	$lang= $this->session->userdata('language');
	$event_lang = $this->admin_model->get_language_details($lang);
		
	#echo "<pre>";
        #print_r($eventinfo);exit;

        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
       	if(count($eventinfo) == 0)
        {
        	exit;
        }
                  $html .='<div class="main_popup">
                    <div class="popup_header Edit">
                        <h3>';
			foreach($event_lang as $val){
				if($val['rLabelName'] == 'Edit Event'){
					$html.=$val['rField'];
				}
			}
			$html.='</h3>
                    </div>
                    <div class="popup-body">';          
                     $html .='<div id="editevent_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmeditevent" id="frmeditevent_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_event" enctype="multipart/form-data">';
                            $html .= '<input  type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
			    $html .= '<input type="hidden" name="language" id="language" value="'.$lang.'" />';
                            $html .= '<input  type="hidden" name="iEventId" value="'.$iEventId.'">';
                            $html .= '<input  type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
/*                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$eventinfo[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;*/
                                    		case 'Textxbox':
                                        		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                   $html .= '<label class="control-label">';
						foreach($event_lang as $val1){
							if($val1['rLabelName'] == $val['vLabelName']){
								$html.=$val1['rField'];
							}		
						}
		 				$html.='</label>
							
                                                    <div class="controls">';
                                                    	if($val['vDataBaseFieldName'] == "vBackgroundColor" || $val['vDataBaseFieldName'] == "vTextColor"){
                                                    		$vVal = $eventinfo[$val['vDataBaseFieldName']];
                                                    		//$vVal = ($val['vDataBaseFieldName'] == "vBackgroundColor") ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)';
	                                                        $html .='<input type="text" maxlength="55"  id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" data-color-format="rgb" class="gcp color_text_hide" value="'.$vVal.'" style="width:35px !important;background:'.$vVal.';">';
                                                    	}else{
                                                        	$html .='<input type="text" maxlength="55" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" value="'.$eventinfo[$val['vDataBaseFieldName']].'">';
                                                        }
                                                    $html .='</div>
                                                </div>';
                                            	break;                                                
                                        case 'Checkbox':
                                            if($eventinfo[$val['vDataBaseFieldName']] == 'Yes'){
                                                $checked = "checked";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">';
						foreach($event_lang as $val1){
							if($val1['rLabelName'] == $val['vLabelName']){
								$html.=$val1['rField'];
							}
						}	
						$html.='</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($event_lang as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}	
							$html.='</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio"  id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        case 'File':
                                               $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($event_lang as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
							$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;(200px *200px) </span></a>';}}
							$html.='</label>
                                                        <div class="controls">
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" style="float: left;" onchange="return setimagevalue(this.value);">';
                                                            
                                                            if($eventinfo[$val['vDataBaseFieldName']] != '' && $val['vDataBaseFieldName'] != 'vHeaderImage'){
                                                                $fileurl = $this->data['base_upload']."events/".$eventinfo['iEventId']."/".$eventinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="deletebtndivid"><div style="float: left;"><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deleteeventimage('.$eventinfo['iEventId'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                                            if($eventinfo[$val['vDataBaseFieldName']] != '' && $val['vDataBaseFieldName'] == 'vHeaderImage'){
                                                                $fileurl = $this->data['base_upload']."events/headerimg/".$eventinfo['iEventId']."/thumb_".$eventinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="hdeletebtndivid"><div style="float: left;"><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deleteeventhimage('.$eventinfo['iEventId'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }                                                            
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                               $html .= '<input  type="hidden" name="vOldImage" id="vOldImage" value="'.$eventinfo['vImage'].'">';     					
                                                break;
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($event_lang as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge"  value="'.$eventinfo[$val['vDataBaseFieldName']].'" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" cols="" rows="">'.$eventinfo[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">';
						foreach($event_lang as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
						$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Select Date </span></a>';}}
					$html.='</label>
                                                <div class="controls">
                                                    <input type="text" class="input-xlarge eventd" value="'.$eventinfo[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']"  >
                                                </div>
                                            </div>';
                                            break;
                                         case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">';
								foreach($event_lang as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Select Time </span></a>';}}$html.='</label>
                                                            <div class="controls">
                                                           		<div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="'.$eventinfo[$val['vDataBaseFieldName']].'" class="input-mini eventtime" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break;   
                                          case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
						foreach($event_lang as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
							$html.='<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Event Description </span></a>';}}
						$html.='</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="'.$eventinfo[$val['vDataBaseFieldName']].'" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'f'.$iEventId.'" >'.$eventinfo[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;   
                                        }
                                    }
                          
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="updateevent('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                        		</div>';
  			$html .='</form>';
			
			$html .= '<script type="text/javascript" language="javascript">
					$(document).ready(function() {
					    var language = "French";
					    $.ajax({
						url: "http://www.admin.easyapps.fr/assets/xml/event.xml",
						success: function(xml) {
						    $(xml).find("translation").each(function(){
							var id = $(this).attr("id");
							var text = $(this).find(language).text();
							$("." + id).html(text);
						    });
						}
					    });
					});
					</script>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>';
        
        echo $html;exit;
    }
    
	/**
		Update Event
	**/
    function update_event()
    {
        $iEventId = $this->input->post('iEventId');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($data['eStatus'] == 'on'){
                $data['eStatus'] = 'Yes';
            }else{
                $data['eStatus'] = 'No';
            }
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
		  
		  $size=array();
            $size['width']=50;
            $size['height']=50;
		  
		  if($_FILES['vImage']['name'] !=''){
                $eventfile = $_FILES['vImage']['name'];
                $fileName = $this->do_upload_img($iEventId,'events','vImage',$size);
                if($fileName){
                    $data['vImage'] = $fileName;
			 }
            }	         
			
			//Header Image
            if($_FILES['vHeaderImage']['name'] !=''){
                $eventfile = $_FILES['vHeaderImage']['name'];
                $fileName = $this->do_upload_eventheaderimage($iEventId,'events/headerimg','vHeaderImage',$size);
                if($fileName){
                    $data['vHeaderImage'] = $fileName;    
                }
               // $iEventId = $this->app_model->update_event($data,$iEventId);
            }		  
            $iEventId = $this->app_model->update_event($data,$iEventId);
            
            $size=array();
            $size['width']=50;
            $size['height']=50;	 
            
            if($_FILES['vImage']['name'] !=''){
                $eventfile = $_FILES['vImage']['name'];
                $fileName = $this->do_upload_img($iEventId,'events','vImage',$size);
                if($fileName){
                    $data['vImage'] = $fileName;    
                }
                $iEventId = $this->app_model->update_event($data,$iEventId);
            }
        }
        echo $iEventId;exit;
    }
    
    /** get news html **/
    function getnewshtml($iFeatureId, $iAppTabId)
    {
	/** get news html **/
	$lang= $this->session->userdata('language');
	$news_language = $this->admin_model->get_language_details($lang);


        $appwise_news = $this->app_model->get_appwise_news($this->data['iApplicationId'], $iAppTabId );
        $this->data['appwise_news'] = $appwise_news;
        
        if($appwise_news["eGoogleNews"] == 'Yes')
        {
            $readonly1 = "";
        }else{
            $readonly1 = "readonly";
        }

        if($appwise_news["eTweets"] == 'Yes')
        {
            $readonly2 = "";
        }else{
            $readonly2 = "readonly";
        }
        
	/** all feature fields details **/	
         $all_featurefields = $this->app_model->get_featurefields($iFeatureId);

	/** add news validation **/
        $html .='<div id="addnews_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frmlocation" id="frmlocation_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_news" enctype="multipart/form-data" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iNewsId]" value="'.$appwise_news['iNewsId'].'">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    
                        <div class="lean-body">
                            <div class="widget-body form" >';
                                
                                foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($news_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}					
							$html.='</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_news[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Checkbox':
                                            if($appwise_news[$val['vDataBaseFieldName']] == 'Yes')
                                            {
                                                $checked = "checked";
                                            }else{
                                            	$checked = "";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($news_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html='</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" value="on">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($news_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        }
                                    }
                                
                                
                                $html .='<div class="row_form">
                                    <label class="checklabel">&nbsp;</label>
                                    <button type="button" class="btn btn-primary" id="locationbtn" name="locationbtn" onclick="news_validation('.$iAppTabId.');"><i class="icon-ok"></i>';
					foreach($news_language as $val1){
						if($val1['rLabelName'] == 'Save'){
							$html.=$val1['rField'];
						}
					}
				$html.='</button>
                                </div>';
                                
                            $html .='</div>
                        </div>
                </form>';
                return $html;
    }

    /** save news **/	
    function save_news()
    {
        if($this->input->post()){
            $news = $this->input->post('data');
            if($news['eGoogleNews'] == 'on'){
                $news['eGoogleNews'] = 'Yes';
            }else{
                $news['eGoogleNews'] = 'No';
            }
            if($news['eTweets'] == 'on'){
                $news['eTweets'] = 'Yes';
            }else{
                $news['eTweets'] = 'No';
            }
            if($news['iNewsId']){
                $iNewsId1 = $this->app_model->update_news($news,$news['iNewsId']);
                if($iNewsId1){
                    redirect($this->data['base_url'] . 'app/step3/'.$news['iApplicationId']);
                }
            }else{
                $iNewsId1 = $this->app_model->save('r_app_news_value',$news);
                if($iNewsId1){
                    redirect($this->data['base_url'] . 'app/step3/'.$news['iApplicationId']);
                }    
            }
            
        }       
    }
    
    function getmailinglisthtml($iFeatureId,$iAppTabId){
    	
        
        $appwise_mailinglist = $this->app_model->get_appwise_mailinglist($this->data['iApplicationId'],$iAppTabId);
        $this->data['appwise_mailinglist'] = $appwise_mailinglist;

	/** get details **/
	$lang= $this->session->userdata('language');
	$mailing_language = $this->admin_model->get_language_details($lang);
        
         if($appwise_mailinglist["ePromptOption"] == 'Yes')
        {
            $checked = "checked";
        }
        
        if($appwise_mailinglist["eAutomatic"] == 'Yes')
        {
            $checked = "checked";
        }
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $html .='<div class="span9">';
		$html .='<div class="add_btn" style="width:50%;"><a class="btn btn-primary"  href="#mailcat_listing'.$iAppTabId.'" id="mailingcategory"  style="float:left;">';
			foreach($mailing_language as $val){
				if($val['rLabelName'] == 'Edit Category'){
					$html.=$val['rField'];
				}
			}
			$html.='</a></div>';


        $html .='<div id="addmailing_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frmmailinglist" id="frmmailinglist_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_mailinglist" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    <input class="span6" type="hidden" name="data[iMailinglistId]" value="'.$appwise_mailinglist['iMailinglistId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';
                          /*
						      Description : Change Mailing Textarea to ckEditor cause it was changing when we come back from twotire tab or event tab.
						  */
                            
                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_mailinglist[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Checkbox':
                                            if($appwise_mailinglist[$val['vDataBaseFieldName']] == 'Yes')
                                            {
                                                $checked = "checked";
                                            }else{
                                            	 $checked = "";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($mailing_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" value="on">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                         case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($mailing_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor"  name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" cols="" rows="">'.$appwise_mailinglist[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                          break;		
                                        }
                                    }
                            
                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label><br>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="mailinglist_validation('.$iAppTabId.');"><i class="icon-ok"></i>';
					foreach($mailing_language as $val1){
						if($val1['rLabelName'] == 'Save'){
							$html.=$val1['rField'];
						}
					}
					$html=' </button>
                            </div>';
                            
                        $html .='</div>
                    </div>    
                </form></div><div class="span3"><div class="row_mail"><a href="#mailchampformid'.$iAppTabId.'" id="mailchamppopup"><img src="'.$this->data["base_url"].'assets/images/mc.png" width="150px" style="cursor:pointer;" ></a></div></div>
                ';

                $html .= $this->getmailchamphtml($iAppTabId,$appwise_mailinglist);
                //Mailing Category Listing
                $html .= $this->getmailingcategoryhtml($this->data['iApplicationId'],$iAppTabId,$iFeatureId);

                //Add Mailing Category Listing
                $html .= $this->getaddmailingcategoryhtml($iAppTabId,$iFeatureId);
                


        return $html;
    }
    function getmailchamphtml($iAppTabId,$appwise_mailinglist){
    	

       // $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        #echo '<pre>';print_r($appwise_mailinglist);exit;
        
            
            $html .='<div id="mailchampformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>MailChimp Api Information</h3>
                    </div>
                    <div class="popup-body">';        
                    $html .='<div class="addmailchamp_validation" id="addmailchamp_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmmailchamp" id="frmmailchamp'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_mailinglist" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iMailinglistId]" value="'.$appwise_mailinglist['iMailinglistId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .='<div class="control-group">
                                <label class="control-label">API Key</label>
                                <div class="controls">
                                    <input type="text" value="'.$appwise_mailinglist['vApikey'].'" class="input-xlarge" id="vApikey'.$iAppTabId.'" name="data[vApikey]" >
                                </div>
                            </div>';                                
                            $html .='<div class="control-group">
                                <label class="control-label">List Id</label>
                                <div class="controls">
                                    <input type="text" value="'.$appwise_mailinglist['vListid'].'" class="input-xlarge" id="vListid'.$iAppTabId.'" name="data[vListid]" >
                                </div>
                            </div>';                                
                        $html .='</form>';
                        $html .='</div></br></br>';
                        $html .='<br><div class="row_form"><br><br>
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitmailchampinfo('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">	
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        return $html;
    }
       
    function save_mailinglist(){
    	
        
        if($this->input->post()){
            $mailinglist = $this->input->post('data');
            if($mailinglist['ePromptOption'] == 'on'){
                $mailinglist['ePromptOption'] = 'Yes';
            }else{
                $mailinglist['ePromptOption'] = 'No';
            }
            if($mailinglist['eAutomatic'] == 'on'){
                $mailinglist['eAutomatic'] = 'Yes';
            }else{
                $mailinglist['eAutomatic'] = 'No';
            }
            if($mailinglist['iMailinglistId']){
                $iMailinglistId1 = $this->app_model->update_mailinglist($mailinglist,$mailinglist['iMailinglistId']);
                if($iMailinglistId1){
                    redirect($this->data['base_url'] . 'app/step3/'.$mailinglist['iApplicationId']);
                }
            }else{
                $iMailinglistId = $this->app_model->save('r_app_mailinglist_value',$mailinglist);
                if($iMailinglistId){
                    redirect($this->data['base_url'] . 'app/step3/'.$mailinglist['iApplicationId']);
                }    
            }
            
        }
    }

    function getmailingcategoryhtml($iApplicationId,$iAppTabId,$iFeatureId)
	{
    	
		//echo $iApplicationId;exit;
  		$allmailingcategories = $this->app_model->get_appwise_mailingcategory($iApplicationId,$iAppTabId);
  		//echo '<pre>';print_r($allmailingcategories);exit;
  		$html .='<div class="main_popup" style="display:none;" id="mailcat_listing'.$iAppTabId.'"><div class="popup_header">
  			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeleanmodal();">×</button>
  		<h3>Edit Category</h3></div>';	
		$html .='<br><div class="add_btn_cat" ><a class="btn btn-primary"  href="#addmailcat_listing'.$iAppTabId.'" id="addmailingcategory" style="float:right;">Add New Category</a></div>';
        
        $html .='<br><div class="category_tbl">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Name</th>
                        <th>Subscribers</th>
                        <th colspan="2">Action</th>
                    </tr>';
                    
                    if(count($allmailingcategories) > 0){
                        for($i=0;$i<count($allmailingcategories);$i++){
                            $k = $i+1; 
                        	$html .='<tr class="row1a">
                                     <td width="25%"><p class="sp_title">'.$allmailingcategories[$i]["vName"].'</p></td>
                                     <td width="25%" align="center">'.$allmailingcategories[$i]["iSubscribers"].'</td>
                                     <td align="center" width="12%"><a class="apptab_edit"  onclick="edit_mailingcat('.$allmailingcategories[$i]["iMailcategoryId"].','.$iAppTabId.','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_mailingcat('.$allmailingcategories[$i]["iMailcategoryId"].','.$iAppTabId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No category founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
</div>';

        return $html;



    }
    function getallmailingcategoryhtml($iApplicationId,$iAppTabId){
    	

//echo $iApplicationId;exit;
    	$iApplicationId = $this->input->get('iApplicationId');
    	$iAppTabId = $this->input->get('iAppTabId');
    	$iFeatureId = $this->input->get('iFeatureId');
  		$allmailingcategories = $this->app_model->get_appwise_mailingcategory($iApplicationId,$iAppTabId);
  		//echo '<pre>';print_r($allmailingcategories);exit;
  		$html .='<div class="popup_header"><h3>Edit Category</h3></div>';
		$html .='<br><div class="add_btn_cat" ><a class="btn btn-primary"  href="#addmailcat_listing'.$iAppTabId.'" id="addmailingcategory"  style="float:right;">Add New Category</a></div>';
        
        $html .='<br><div class="category_tbl">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Name</th>
                        <th>Subscribers</th>
                        <th colspan="2">Action</th>
                    </tr>';
                    
                    if(count($allmailingcategories) > 0){
                        for($i=0;$i<count($allmailingcategories);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="25%"><p class="sp_title">'.$allmailingcategories[$i]["vName"].'</p></td>
                                     <td width="25%" align="center">'.$allmailingcategories[$i]["iSubscribers"].'</td>
                                     <td align="center" width="12%"><a class="apptab_edit"  onclick="edit_mailingcat('.$allmailingcategories[$i]["iMailcategoryId"].','.$iAppTabId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_mailingcat('.$allmailingcategories[$i]["iMailcategoryId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No category founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
        
        echo  $html;exit;



    }    

    function save_mailinglistcategory(){
        

        if($this->input->post()){
            $mailingcategory = $this->input->post('data');
          //  echo '<pre>';print_r($mailingcategory);exit;
            if($mailingcategory['iMailcategoryId']){
            	//echo 'essssif';exit;
                $iMailinglistId1 = $this->app_model->update_mailingcategory($mailingcategory,$mailingcategory['iMailcategoryId']);
                if($iMailinglistId1){
                    redirect($this->data['base_url'] . 'app/step3/'.$mailinglist['iApplicationId']);
                }
            }else{
            	//echo 'eif';exit;
                $iMailinglistId = $this->app_model->save('r_app_mailing_category',$mailingcategory);
               if($iMailinglistId){
                    redirect($this->data['base_url'] . 'app/step3/'.$mailinglist['iApplicationId']);
                }    
            }
            
        }
    }



    function getaddmailingcategoryhtml($iAppTabId,$iFeatureId){
    	
  		$html .='<div class="main_popup" style="display:none;" id="addmailcat_listing'.$iAppTabId.'"><div class="popup_header"><h3>Add New Category</h3></div>';
        $html .='<div id="addmailingcat_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="addfrmmailingcategory" id="addfrmmailingcategory_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_mailinglistcategory" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                     <input class="span6" type="hidden" name="iFeatureId" value="'.$iFeatureId.'" id="iFeatureId">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
		$html .= '<div class="lean-body">
                        <div class="widget-body form" >
                        	<div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="" id="vName'.$iAppTabId.'" name="data[vName]" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>'   ;                 
		$html .='</form> 
				<div class="popup-footer">
	                <button type="button" class="btn btn-primary"  id="mailcategoryinfo" name="mailcategoryinfo" onclick="return submitmailcategoryinfo('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
	                <button type="button" aria-hidden="true" onclick="closeleanmodal('."'addfrmmailingcategory_$iAppTabId'".');" class="btn">Close</button>
				</div>
				</div>';

		return $html;
    }

    function showeditmailcatpopup(){
    	

    	$iMailcategoryId = $this->input->get('iMailcategoryId');
    	$iFeatureId = $this->input->get('iFeatureId');
    	$exist_info = $this->app_model->get_one_app_mailingcategory($iMailcategoryId);
    	$iAppTabId = $exist_info['iAppTabId'];
    	$iApplicationId = $exist_info['iApplicationId'];
    	
       	if(count($exist_info) == 0)
        {
        	exit;
        }
        
  		$html .='<div class="main_popup" style="display:block;" id="addmailcat_listing'.$iAppTabId.'"><div class="popup_header"><h3>Edit Category</h3></div>';
        $html .='<div id="editmailingcat_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="editfrmmailingcategory" id="editfrmmailingcategory_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_mailinglistcategory" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'">
                    <input class="span6" type="hidden" name="iFeatureId" value="'.$iFeatureId.'" id="iFeatureId">
                    <input class="span6" type="hidden" name="data[iMailcategoryId]" value="'.$iMailcategoryId.'" id="iMailcategoryId">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';

		$html .= '<div class="lean-body">
                        <div class="widget-body form" >
                        	<div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" value="'.$exist_info['vName'].'" id="vNamee'.$iAppTabId.'" name="data[vName]" maxlength="50">

                                </div>
                            </div>
                            <button type="button" class="btn btn-primary"  id="mailcategoryinfo" name="mailcategoryinfo" onclick="return updatemailcategoryinfo('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
                        </div>
                    </div>'   ;                 
		$html .='</form></div>';

		echo $html;exit;
    }
    function mailingcategory_delete(){
    	

    	$iMailcategoryId = $this->input->get('iMailcategoryId');
    	$iApplicationId = $this->input->get('iApplicationId');
    	$iAppTabId = $this->input->get('iAppTabId');
    	$iFeatureId = $this->input->get('iFeatureId');

    	$deleteId = $this->app_model->delete_mailing_category($iMailcategoryId);
    	if ($deleteId){

    		$html .= $this->getallmailingcategoryhtml($iApplicationId,$iAppTabId);
    	}
    	echo $html;exit;

    }



    function getrsshtml($iFeatureId,$iAppTabId){
    	
        
        $appwise_rss = $this->app_model->get_appwise_rss($this->data['iApplicationId'],$iAppTabId);
        
        $this->data['appwise_rss'] = $appwise_rss;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $html .='<div id="addrss_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frmrss" id="frmrss_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_rss" class="form-horizontal" enctype="multipart/form-data">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                     <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    <input class="span6" type="hidden" name="data[iRSSId]" value="'.$appwise_rss['iRSSId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';
                            
                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_rss[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'File':
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e" name="'.$val['vDataBaseFieldName'].'" style="float: left;">';
                                                            
                                                            if($appwise_rss[$val['vDataBaseFieldName']] != ''){
                                                                $fileurl = $this->data['base_upload']."rss/".$appwise_rss['iRSSId']."/".$appwise_rss[$val['vDataBaseFieldName']];
												    $html .='<div id="rssimagediv">';
                                                                $html .='<div style="float: left;" ><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="return deletrssimage('.$appwise_rss['iRSSId'].');"  class="btn btn-primary" type="button">Delete</button></div>';
												    $html .='</div>';
                                                            }
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                                    					
                                                break;                                            
                                        }
                                        
                                    }
                            
                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="return rss_validation('.$iAppTabId.');"><i class="icon-ok"></i>Save</button>
                            </div>';
                            
                            
                        $html .='</div>
                    </div>    
                </form>';
                
        return $html;
    }

    function save_rss(){
    	
        if($this->input->post()){
            $rss = $this->input->post('data');
           	
            if($rss['iRSSId']){
                $iRSSId = $this->app_model->update_rss($rss,$rss['iRSSId']);
                $iRSSId = $rss['iRSSId'];
            }else{
                $iRSSId = $this->app_model->save('r_app_rss_value',$rss);
                
            }

            $size=array();
            $size['width']=50;
            $size['height']=50;	 
            
            if($_FILES['vIcon']['name'] !=''){
                $rssfile = $_FILES['vIcon']['name'];
                $fileName = $this->do_upload_img($iRSSId,'rss','vIcon',$size);
                if($fileName){
                    $data['vIcon'] = $fileName;    
                }
                $iRSSId = $this->app_model->update_rss($data,$iRSSId);
            }
            if($iRSSId != '' || $iRSSId != ''){
                redirect($this->data['base_url'] . 'app/step3/'.$rss['iApplicationId']);
            }
            
        }
    }

    function deleteIcon(){
    	

    	$iRSSId = $this->input->get('iRssId');

    	$data = $this->app_model->get_youtube_by_id($iRSSId);
		$var = unlink($this->data['base_upload'].'rss/'.$iRSSId.'/'.$data['vIcon']);
		
		$data1['vIcon'] = "";
		$iRSSId = $this->app_model->update_rss($data1,$iRSSId);
		if($iRSSId != '' || $iRSSId != ''){
                redirect($this->data['base_url'] . 'app/step3/'.$data['iApplicationId']);
            }
    }

    function getyoutubehtml($iFeatureId,$iAppTabId){

	/** language read **/    	
        $lang= $this->session->userdata('language');
	$youtube_lang = $this->admin_model->get_language_details($lang);

        $appwise_youtube = $this->app_model->get_appwise_youtube($this->data['iApplicationId'],$iAppTabId);
        $this->data['appwise_youtube'] = $appwise_youtube;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $html .='<div id="addyoutube_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frmyoutube" id="frmyoutube_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_youtube" class="form-horizontal">
		    <input type="hidden" name="language" id="language" value="'.$lang.'"/>
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    <input class="span6" type="hidden" name="data[iYoutubeId]" value="'.$appwise_youtube['iYoutubeId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';

                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($youtube_lang as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_youtube[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>';
                                                    	/*if($val['vLabelName'] == 'Description'){
	                                                        $html .='<div class="controls">
	                                                        	<span style="color:red;">(Note: Please put embed code url <br>Ex :http: //www.youtube.com/embed/oZ3r-m7RH_8)</span>
	                                                        </div>';
                                                    	}*/

                                                    $html .='</div>';
                                                break;
/*                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge " rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" >'.$appwise_youtube[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;
*/                                        }
                                    }

                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="frmyoutube_validation('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
                            </div>';
                            
                        $html .='</div>
                    </div>    
                </form>';
                
        return $html;
    }

    function save_youtube(){
    	
        
        if($this->input->post()){
            $youtube = $this->input->post('data');
          
            if($youtube['iYoutubeId']){
                $iYoutubeId = $this->app_model->update_youtube($youtube,$youtube['iYoutubeId']);
                if($iYoutubeId){
                    redirect($this->data['base_url'] . 'app/step3/'.$youtube['iApplicationId']);
                }
            }else{
                $iYoutubeId = $this->app_model->save('r_app_youtube_value',$youtube);
                if($iYoutubeId){
                    redirect($this->data['base_url'] . 'app/step3/'.$youtube['iApplicationId']);
                }    
            }
            
        }
    }
    
    function deleteeventimage(){
    	

	   $iEventId=$this->input->get('iEventId');
	   $getEventImage=$this->app_model->getEventImageName($iEventId);   
	   $var=unlink($this->data['base_path'].'uploads/events/'.$iEventId.'/'.$getEventImage['vImage']);
	   $deleteImage=$this->app_model->deleteImageName($iEventId);
	   if($deleteImage){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    }

    function deleteeventhimage(){
    	

	   $iEventId=$this->input->get('iEventId');
	   $getEventImage=$this->app_model->getEventImageName($iEventId);
	   unlink($this->data['base_path'].'uploads/events/headerimg/'.$iEventId.'/'.$getEventImage['vHeaderImage']);
       unlink($this->data['base_path'].'uploads/events/headerimg/'.$iEventId.'/thumb_'.$getEventImage['vHeaderImage']);
	   $deleteImage=$this->app_model->deleteHeaderImageName($iEventId);
	   if($deleteImage){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    }  
    function deleteqrcouponimage(){
    	

	   $iQrID=$this->input->get('iQrID');
	   $getqrcouponImage=$this->app_model->getQRImageName($iQrID);
	   unlink($this->data['base_path'].'uploads/QRCode/TabletHeaderImage/'.$iQrID.'/'.$getqrcouponImage['vTabletHeaderImage']);
	   unlink($this->data['base_path'].'uploads/QRCode/MobileHeaderImage/'.$iQrID.'/'.$getqrcouponImage['vMobileHeaderImage']);
       unlink($this->data['base_path'].'uploads/QRCode/MobileHeaderImage/'.$iQrID.'/thumb_'.$getqrcouponImage['vMobileHeaderImage']);
	   $deleteImage=$this->app_model->deleteHeaderImageNames($iQrID);
	   if($deleteImage){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    }    
    
    function deletrssimage(){
    	

	   $iRSSId=$this->input->get('iRSSId');
	   $getRSSImage=$this->app_model->getRssImageName($iRSSId);   
	   $var=unlink($this->data['base_path'].'uploads/rss/'.$iRSSId.'/'.$getRSSImage['vIcon']);
	   $deleteImage=$this->app_model->deleteRssImageName($iRSSId);
	   if($deleteImage){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    }
    
    
    function getinfotabhtml($iFeatureId,$iAppTabId){
    	

        $appwise_infotabdata = $this->app_model->get_appwise_infotabdata($this->data['iApplicationId'],$iAppTabId);
        
        #echo "<pre>";
        #print_r($appwise_infotabdata);exit;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $html .='<div id="addabout_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frminfotab" id="frminfotab_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_infotabdata" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    <input class="span6" type="hidden" name="data[iInfotabId]" value="'.$appwise_infotabdata['iInfotabId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';

                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_infotabdata[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'in'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" >'.$appwise_infotabdata[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                          case 'Status':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" value="'.$appwise_infotabdata[$val['vDataBaseFieldName']].'">
                                                                <option value="Active" >Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>';					
                                                break;
                                        }
                                    }

                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="infotab_validation('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
                            </div>';
                            
                        $html .='</div>
                    </div>    
                </form>';
                
        return $html;
    }
    
    function save_infotabdata(){
    	

        $data = $this->input->post('data');
        $iApplicationId = $data['iApplicationId'];
        if($this->input->post()){
            if($data['iInfotabId']){
				$iInfotabId = $data['iInfotabId'];
				$iInfotabId = $this->app_model->update_info($data,$iInfotabId);

            }else{
				$iInfotabId = $this->app_model->save_info($data);

            }
        }
         redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId);
    }
    
    
    
    function getpdfhtml($iFeatureId,$iAppTabId){
    	

        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
            $html .='<div id="pdfformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add New Pdf</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addpdf_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmpdf" id="frmpdf_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_pdf" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                        		if($val['vDataBaseFieldName'] == "vPdfUrl"){
                                                    $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" style="display:none;">';
                                               $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value=""  class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        	<div style="color:red;position: absolute; margin-top:10px;">Ex: http://www.youtube.com</div>
                                                        </div>';
                                             }else{
                                              $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                                                                    $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                        <!--    <input type="text" value=""  maxlength="50" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" > -->
                                                            <input type="text" value="" title="Max 50 characters allowed"  maxlength="50" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>';
                                                    }
                                                    $html.='</div>';
                                                break;
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value=""  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio" value="" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        case 'File':
                                               $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" style="display:none;">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" onchange="CheckValidPdfFile(this.value,this.name,'.$iAppTabId.')">
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
                                         case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">'.$val['vLabelName'].'</label>
                                                            <div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="" class="input-mini" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break; 
                                           case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                         case 'Status':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" onchange="return showhide_file(this.value,'.$iAppTabId.');">
                                                            	<option value="" selected="selected">Select File Type</option>
                                                                <option value="Pdf File" >Pdf File</option>
                                                                <option value="Pdf Url">Pdf Url</option>
                                                            </select>
                                                        </div>
                                                    </div>';					
                                                break;
                                            
                                        }
                                        
                                    }
                                    
                                
                                $html .='</form>';
                        $html .='</div>';
                        
            $html .='</div>
            <div class="popup-footer">
              <button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitpdf('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                <button aria-hidden="true" onclick="closeleanmodal(\'frmpdf_'.$iAppTabId.'\');" class="btn">Close</button>
            </div>
        </div>';
        
      $html .='<div class="add_btn"><a class="btn btn-primary"  href="#pdfformid'.$iAppTabId.'" id="addpdfid"  style="float:right;">Add New Pdf</a></div>';
        
        $html .= $this->get_all_pdf_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);
                    
        return $html;
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }

    function get_all_pdf_data($iApplicationId,$iAppTabId,$iFeatureId){
    	

//echo $iApplicationId,$iAppTabId,$iFeatureId;exit;
        $allapppdfs = $this->app_model->get_appwise_pdfs($iApplicationId,$iAppTabId);
        
        $html .='<div id="pdf_listing'.$iAppTabId.'">
		<div id="AvlPdf"></div>
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing" style="table-layout:auto; word-break:break-all; word-wrap:break-word;">
                    <tr class="nodrop">
                        <th>Title</th>
                        <th>Pdf File/Pdf Url</th>
                        <th colspan="3"><center>Action</center></th>
                    </tr>';
                    
                    if(count($allapppdfs) > 0){
                        for($i=0;$i<count($allapppdfs);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapppdfs[$i]["vPdfTitle"].'</p></td>';
                                     if($allapppdfs[$i]["vPdfFile"] !='' ){
                                        $vPdfFile = $this->data['base_upload']."pdfs/".$allapppdfs[$i]["iPdfId"]."/".$allapppdfs[$i]['vPdfFile'];
                                        $html .='<td width="45%" align="center"><a href="'.$vPdfFile.'" target="_blank">'.$allapppdfs[$i]["vPdfFile"].'</a></td>';            
                                     }elseif($allapppdfs[$i]["vPdfFile"] =='' && $allapppdfs[$i]["vPdfUrl"] !=''){
                                        $html .='<td width="45%" align="center"><a href="'.$allapppdfs[$i]["vPdfUrl"].'" target="_blank">'.$allapppdfs[$i]["vPdfUrl"].'</a></td>';
                                     }else{
                                        $html .='<td width="45%" align="center">---</td>';
                                     }
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_pdf('.$allapppdfs[$i]["iPdfId"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_pdf('.$allapppdfs[$i]["iPdfId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No pdf founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';

        return $html;
                    

    }
	/*
	Problem Fixed Related to Pdf Validations and Performation.
    */
   function save_pdf(){
        #echo "<pre>";
        #print_r($_FILES);exit;
         $iApplicationId = $this->input->post('iApplicationId');
         $data = $this->input->post('data');
         $this->data['message'] = $this->session->flashdata('message');
       //foreach ($data as $key ) {
        //echo $key['vPdfTitle'];
        //echo $key['vPdfFile'];
        //echo $key['vPdfUrl'];
        # code...
       //}
       //exit();
        if($this->input->post()){
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            //echo "<pre>";
            //print_r($_FILES);exit;
        $fileName = str_replace(' ','',$_FILES['vPdfFile']['name']);
		$file=$this->app_model->checkpdf($fileName,$iApplicationId);
	   
		if(($_FILES['vPdfFile']['name']!='') && ($file>0))
		{
		 	//echo 'allready extist';
		 //	$this->session->set_flashdata('message',"Pdf file already exists.");       
			$this->session->set_flashdata('message',"Pdf file already exists.");      
			redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId); 
		  exit();
		}

		$iPdfId = $this->app_model->save_pdf($data);
			 //exit();
			 $size=array();
			 if($_FILES['vPdfFile']['name'] !=''){
			 $pdffile = $_FILES['vPdfFile']['name'];

				$fileName = $this->do_upload_pdf($iPdfId,'pdfs','vPdfFile');
				if($fileName){
				 	$data['vPdfFile'] = $fileName;    
				 	$iPdfId = $this->app_model->update_pdf($data,$iPdfId);
			 	}
			 	//$this->session->set_flashdata('message',"Application updated sucessfully");       
			redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId); 
		 	exit(); 
      }
      redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId); 
      exit();
   }

  //redirect($this->data['base_url']);
    }
	
    function PdfCheck()
    {
		 $iApplicationId = $this->input->post('iAppTabId');
		 $fil= $this->input->post('file');
		 $f= str_replace(' ','',$fil);
		 $PdfTitle = $this->input->post('vPdfTitle');
			 //echo $iApplicationId = $this->input->get('iAppTabId');
	   // echo $fileName.$iApplicationId;
		$file= $this->app_model->checkpdf($f,$PdfTitle,$iApplicationId);
		if($file>0)
		{ echo 1;
		 //echo "exists";
		}
	}

	function ChkAvlPdf()
	{
	     $iApplicationId = $this->input->post('iAppTabId');
	     $fil= $this->input->post('vPdfTitle');
	     $PdfTitle= str_replace(' ','',$fil);
	     $vOldFile = $this->input->post('vPdfFileExist');
	         //echo $iApplicationId = $this->input->get('iAppTabId');
	   // echo $fileName.$iApplicationId;
	    $file= $this->app_model->checkAVLpdf($PdfTitle,$vOldFile,$iApplicationId);
	    if($file>0)
	    { 
	    	echo 1;
	    }
	}
    
    function appwisepdflisting()
	{
        $iApplicationId = $this->input->get('iApplicationId');
        $iAppTabId = $this->input->get('iAppTabId');
        $iFeatureId = $this->input->get('iFeatureId');
        $html .= $this->get_all_pdf_data($iApplicationId,$iAppTabId,$iFeatureId);
        echo $html;exit; 
    }
    
    
    function do_upload_pdf($folderId,$folder,$image)
	{
	   if(!is_dir('uploads/'.$folder.'/')){
		   @mkdir('uploads/'.$folder.'/', 0777);
	   }
	   if(!is_dir('uploads/'.$folder.'/'.$folderId)){
		   @mkdir('uploads/'.$folder.'/'.$folderId, 0777);
	   }
        
        $fileName = str_replace(' ','',$_FILES[$image]['name']);
        //application/pdf
        $config = array(
        'allowed_types' => "pdf",
        'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
        'file_name' => str_replace(' ','',$_FILES[$image]['name']),
        'max_size'=>5380334
        );  
        
	   
        
        $this->upload->initialize($config); 
        $this->upload->do_upload($image); //do upload  
        $image_data = $this->upload->data(); //get image data
        #print_r($image_data);exit;
        $img_uploaded = $image_data['file_name'];
        return $img_uploaded;
    }
    
    function pdf_delete()
	{
    	$iPdfId = $this->input->get('iPdfId');
        $pdfinfo = $this->app_model->getpdfinfo($iPdfId);
        
        if($iPdfId !=''){
            if(is_dir('uploads/pdfs/'.$iPdfId)){
               $this->rm_folder_recursively('uploads/pdfs/'.$iPdfId);
            }       
            $id = $this->app_model->delete_pdf($iPdfId);
        }
        $iApplicationId = $this->input->get('iApplicationId');
        
        $iAppTabId = $pdfinfo['iAppTabId'];
        $iFeatureId = $pdfinfo['iFeatureId'];
        $html .= $this->get_all_pdf_data($iApplicationId,$iAppTabId,$iFeatureId);
                
        echo $html;exit; 
    }
    
    
    function showeditpdfpopup(){
    	
        $iPdfId = $this->input->get('iPdfId');
        
        $pdfinfo = $this->app_model->getpdfinfo($iPdfId);
        $iAppTabId = $pdfinfo['iAppTabId'];
        $iApplicationId = $pdfinfo['iApplicationId'];
  		
        $iFeatureId = $pdfinfo['iFeatureId'];
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
       	if(count($pdfinfo) == 0)
        {
        	exit;
        }
       
            $html .='<div id="pdfformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Pdf</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editpdf_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmpdf" id="updatefrmpdf_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_pdf" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .= '<input  type="hidden" name="iPdfId" value="'.$iPdfId.'">';
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) 
										{
                                        	case 'Textxbox':
                                      			if($val['vDataBaseFieldName'] == "vPdfTitle" || ($val['vDataBaseFieldName'] == "vPdfUrl" && $pdfinfo['eFileType'] == 'Pdf Url')){
                                      				$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                      			}else{
                                      				$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'" style="display:none;">';

                                      			}
                                                   
												if($val['vDataBaseFieldName'] == "vPdfUrl")
                                                 {
                                                    $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                     <div class="controls">
                                                            <input type="text" value="'.$pdfinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        	<div style="color:red;position: absolute; margin-top:10px;">Ex: http://www.youtube.com</div>
                                                        </div>
                                                    </div>';
                                                	}
                                                	else
                                                	{
                                                		     $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" title="Max 50 characters allowed" maxlength="50" onblur="CheckAvlPdf(this.value,this.name,'.$iAppTabId.');" value="'.$pdfinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                	}

                                                break;
												
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value=""  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
											 
                                        case 'Radio':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio" value="" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;	
											 		
                                        case 'File':
                                        		
												if($pdfinfo['eFileType'] == 'Pdf File'){
                                        			$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                        		}else{
													$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'" style="display:none;">';
                                        		}
                                                
                                                     $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" style="float: left;"  onchange="CheckValidPdfFilee(this.value,this.name,'.$iAppTabId.')">';
                                                            
                                                         $html .='</div>';
                                                            
                                               $html.='<div class="controls" id="deletepdffile_'.$pdfinfo['iPdfId'].'">';
                                               if($pdfinfo[$val['vDataBaseFieldName']] != ''){
                                                                $fileurl = $this->data['base_upload']."pdfs/".$pdfinfo['iPdfId']."/".$pdfinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="detetepdffile"><div style="float: left;"><a target="_blank" href="'.$fileurl.'">'.$pdfinfo[$val['vDataBaseFieldName']].'<a></div><div style="float: left; margin: 8px 0px 10px 20px;">
                                                                <button onclick="deletepdffile('.$pdfinfo['iPdfId'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                               $html .= '<input  type="hidden" name="vOldFile" id="vOldFile" value="'.$pdfinfo[$val['vDataBaseFieldName']].'">'; 
                                               $html.='</div></div>';  
                                                break;
                                               #$html .='<div class="control-group">
                                                     #   <label class="control-label">'.$val['vLabelName'].'</label>
                                                     #   <div class="controls">
                                                      #      <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'e" >
                                                     #   </div>

                                                   # </div>';					
                                               # break;
											   
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                                        </div>
                                                    </div>';					
                                                break;
												
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
											
                                         case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">'.$val['vLabelName'].'</label>
                                                            <div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="" class="input-mini" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break; 
											
                                        case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
												
                                        case 'Status':
											$html .='<div class="control-group" >
													<label class="control-label">'.$val['vLabelName'].'</label>
													<div class="controls">
														<select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" onchange="return showhide_fileedit(this.value,'.$iAppTabId.');">';
														 if($pdfinfo['eFileType'] == 'Pdf Url'){
															$html .= '<option value="Pdf Url" selected="selected">Pdf Url</option> <option value="Pdf File" >Pdf File</option>';
														 }else{
															$html .= '<option value="Pdf Url" >Pdf Url</option> <option value="Pdf File" selected="selected">Pdf File</option>';
													 }
													 $html .='</select>
													</div>
												</div>';					
                                             break;
									    }
                                    }
                            $html .='</form>';
                        $html .='</div>';
                        
            $html .='</div>
            <div class="popup-footer">
            <button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return updatepdf('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                <button aria-hidden="true" onclick="closeleanmodal(\'frmpdf_'.$iAppTabId.'\');" class="btn">Close</button>
            </div>
        </div>';
        
        echo $html;exit;
    }


   function update_pdf()
   {
        $iPdfId = $this->input->post('iPdfId');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){

            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }

            $size=array();
            if($_FILES['vPdfFile']['name'] !='' && $data['eFileType'] == "Pdf File"){
                $pdffile = $_FILES['vPdfFile']['name'];
                $fileName = $this->do_upload_pdf($iPdfId,'pdfs','vPdfFile');
                if($fileName){
                    $data['vPdfFile'] = $fileName;    
                }
               // $iPdfId = $this->app_model->update_pdf($data,$iPdfId);
            }		  
         
		    if ($data['eFileType'] == "Pdf File"){
		    	$data['vPdfUrl'] = "";
		    }
		    if ($data['eFileType'] == "Pdf Url"){
		    	$pdfinfo=$this->app_model->getpdfinfo($iPdfId);  
		    	$var=unlink($this->data['base_path'].'uploads/pdfs/'.$iPdfId.'/'.$pdfinfo['vPdfFile']);
		    	$data['vPdfFile'] = "";
		    }
			
		  //echo '<pre>';print_r($data);exit;
          $iPdfId = $this->app_model->update_pdf($data,$iPdfId);
        }
        echo $iPdfId;exit;
    }

    function deletepdffile(){
    	

	   $iPdfId=$this->input->get('iPdfId');
	   $pdfinfo=$this->app_model->getpdfinfo($iPdfId);  
	   //print_r(array_filter($pdfinfo, 'iFeatureId'));
	   //print_r( $pdfinfo);
	   //exit; 
	   $var=unlink($this->data['base_path'].'uploads/pdfs/'.$iPdfId.'/'.$pdfinfo['vPdfFile']);
	   $pdfinfo['vPdfFile'] = "";
	   $deleteFile=$this->app_model->update_pdf($pdfinfo,$iPdfId);
	   if($deleteFile){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    }


    function getlocationhtml($iFeatureId,$iAppTabId){
    	

        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);

	/** get details **/
	$lang= $this->session->userdata('language');
	$location_language = $this->admin_model->get_language_details($lang);
	

	/** language **/
	$lang= $this->session->userdata('language');
            
            $html .='<div id="locationformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">';
                    foreach($location_language as $val){
			if($val['rLabelName'] == 'Add New Location')
			{
				$html.='<h3>'.$val['rField'].'</h3>';
        		}
		   }
                   $html .='</div><div class="popup-body">';        
                        $html .='<div id="addloc_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmloc" id="frmloc_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_loc" enctype="multipart/form-data">';
			    $html .= '<input type="hidden" id="language" name="language" value="'.$lang.'" />';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                        		if($val['vDataBaseFieldName'] == "vPdfUrl"){
                                                    $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" style="display:none;">';
                                            	}else{
                                            		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                            	}
                                                       $html .= '<label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>';
                                                       
                                                       $html.='<div class="controls">';
						if($val['vDataBaseFieldName'] == 'vCity' || $val['vDataBaseFieldName'] == 'vState' || $val['vDataBaseFieldName'] == 'vLocationTitle' || $val['vDataBaseFieldName'] == 'vEmail' || $val['vDataBaseFieldName'] == 'vTelephone'){

                                                            	$html .='<input type="text" value="'.$locinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" maxlength="30">';
															
															}else{
                                                            	$html .='<input type="text" value="'.$locinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" maxlength="50">';

															}
                                                        $html .= '</div>';
                                                    	if($val['vDataBaseFieldName'] == 'vWebsite'){
	                                                        $html .='<div class="controls" style="margin-top:10px; position: relative;">
	                                                        	<div style="color:red;position: absolute; top: -7px;margin-left:17px;font-size:14px;">Example :http: //www.youtube.com</div>

	                                                        </div>';
                                                    	}


                                                    $html .='</div>';
                                                break;
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value=""  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" onclick="getlatlang('.$iAppTabId.');">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}	
							$html.='</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio" value="" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        case 'File':

                                               $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" style="display:none;">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'" onchange="CheckValidPdfFile(this.value,this.name)">
                                                        </div>
                                                    </div>';					
                                                break;

                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                                        </div>
                                                    </div>';					
                                                break;

                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">';
						foreach($location_language as $val1){
							if($val1['rLabelName'] == $val['vLabelName']){
								$html.=$val1['rField'];
							}
						}
						$html.='</label>
                                                <div class="controls">

                                                    <input value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;

                                        case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">';
							    foreach($location_language as $val1){
							if($val1['rLabelName'] == $val['vLabelName']){
								$html.=$val1['rField'];
							}
						}
							$html.='</label>
                                                            <div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="" class="input-mini" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break; 

                                           case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 

                                         case 'Status':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" onchange="return showhide_file(this.value);">
                                                            	<option value="" selected="selected">Select File Type</option>
                                                                <option value="Pdf File" >Pdf File</option>
                                                                <option value="Pdf Url">Pdf Url</option>
                                                            </select>
                                                        </div>
                                                    </div>';					
                                                break;
                                            
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        		<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitlocation('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i>';
					foreach($location_language as $val1){
						if($val1['rLabelName'] == 'Save'){
							$html.=$val1['rField'];
						}
					}	
					$html.=' </button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">';
				foreach($location_language as $val1){
					if($val1['rLabelName'] == 'Close'){
						$html.=$val1['rField'];
					}
				}
				$html.='</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#locationformid'.$iAppTabId.'" id="addpdfid"  style="float:right;">';
     	foreach($this->data['mylang'] as $val){
					if($val['rLabelName'] == 'Add New Location'){
						$html.=''.$val['rField'].'';}}
     	$html.='</a></div>';
        
         $html .= $this->get_all_location_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);          
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }

    function get_all_location_data($iApplicationId,$iAppTabId,$iFeatureId){
    	
        $allapplocations = $this->app_model->get_appwise_locations($iApplicationId,$iAppTabId);
       //  echo '<pre>';print_r($allapplocations);exit;
        $html .='<div id="loc_listing'.$iAppTabId.'">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Website</th>
                        <th>Email</th>
                        <th colspan="2">Action</th>
                    </tr>';
                    
                    if(count($allapplocations) > 0){
                        for($i=0;$i<count($allapplocations);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapplocations[$i]["vWebsite"].'</p></td>';
                                     $html .=  '<td width="30%"><p class="sp_title">'.$allapplocations[$i]["vEmail"].'</p></td>';
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_loc('.$allapplocations[$i]["iLocationId"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_loc('.$allapplocations[$i]["iLocationId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Location found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
        return $html;

    }

    function save_loc(){
    	

        #echo "<pre>";
        #print_r($_FILES);exit;
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            if($data['vLookupAddress']){
            	$data['vLookupAddress'] = 'Yes';
            }else{
            	$data['vLookupAddress'] = 'No';
            }
            #echo "<pre>";
            #print_r($_FILES);exit;
            $iLocationId = $this->app_model->save_loc($data);

        }
        echo $iLocationId;exit;
    }    

    function appwiseloclisting(){
    	

        $iApplicationId = $this->input->get('iApplicationId');
        $iAppTabId = $this->input->get('iAppTabId');
        $iFeatureId = $this->input->get('iFeatureId');

        $html .= $this->get_all_location_data($iApplicationId,$iAppTabId,$iFeatureId);          
                
        echo $html;exit; 
    }

    function loc_delete(){
    	

        $iLocationId = $this->input->get('iLocationId');

        $locinfo = $this->app_model->getlocinfo($iLocationId);
        $iAppTabId = $locinfo['iAppTabId'];
        $iFeatureId =  $locinfo['iFeatureId'];

        if($iLocationId !=''){
            $id = $this->app_model->delete_location($iLocationId);
     
        }
        $iApplicationId = $this->input->get('iApplicationId');
        
		$html .= $this->get_all_location_data($iApplicationId,$iAppTabId,$iFeatureId);                
        echo $html;exit; 
    }



    function showeditlocpopup(){
    	

        $iLocationId = $this->input->get('iLocationId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $locinfo = $this->app_model->getlocinfo($iLocationId);
        $iAppTabId = $locinfo['iAppTabId'];
        $iApplicationId =  $locinfo['iApplicationId'];
        #echo "<pre>";
       
       # print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
         

	/** get details **/
	$lang= $this->session->userdata('language');
	$location_language = $this->admin_model->get_language_details($lang);
        
       	if(count($locinfo) == 0)
        {
        	exit;
        }
        $html .='<div id="locformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>';
			foreach($location_language as $val1){
				if($val1['rLabelName'] == 'Edit Location'){
					$html.=$val1['rField'];
				}
			}				
			$html.='</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editloc_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmloc" id="updatefrmloc_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_loc" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .= '<input  type="hidden" name="iLocationId" value="'.$iLocationId.'">';
                           
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                      				$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'" >';
                                                         $html .='<label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLableName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">';
															if($val['vDataBaseFieldName'] == 'vCity' || $val['vDataBaseFieldName'] == 'vState'){

                                                            	$html .='<input type="text" value="'.$locinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" maxlength="30">';
															}else{
	                                                            $html .='<input type="text" value="'.$locinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >';

															}
                                                        $html .= '</div>';
                                                    	if($val['vDataBaseFieldName'] == 'vWebsite'){
	                                                        $html .='<div class="controls" style="margin-top:10px; position: relative;">
	                                                        	<div style="color:red;position: absolute; top: 5px;margin-left:17px;font-size:14px;">Example :http: //www.youtube.com</div>

	                                                        </div>';
                                                    	}

                                                    $html .='</div>';
                                                break;
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <label class="checkbox">';
                                                            if($locinfo[$val['vDataBaseFieldName']] == 'Yes'){
							$html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" checked="checked" onclick="getlatlange('.$iAppTabId.');">';
                                                            }else{
																$html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" onclick="getlatlange('.$iAppTabId.');">';
                                                            }
                                                                
                                                            $html .= '</label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio" value="" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        case 'File':

                                               $html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'e" >
                                                        </div>

                                                    </div>';					
                                                break;
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">';
						foreach($location_language as $val1){
							if($val1['rLabelName'] == $val['vLabelName']){
								$html.=$val1['rField'];
							}
						}
						$html.='</label>
                                                <div class="controls">
                                                    <input value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
                                         case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                            <div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="" class="input-mini" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break; 
                                           case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                         case 'Status':
                                        	$html .='<div class="control-group" >
                                                        <label class="control-label">';
							foreach($location_language as $val1){
								if($val1['rLabelName'] == $val['vLabelName']){
									$html.=$val1['rField'];
								}
							}
							$html.='</label>
                                                        <div class="controls">
                                                            <select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" onchange="return showhide_fileedit(this.value);">';
                                                             if($pdfinfo['eFileType'] == 'Pdf Url'){
																$html .= '<option value="Pdf Url" selected="selected">Pdf Url</option> <option value="Pdf File" >Pdf File</option>';
                                                             }else{
                                                             	$html .= '<option value="Pdf Url" >Pdf Url</option> <option value="Pdf File" selected="selected">Pdf File</option>';

                                                             }
                                                               
                                                                
                                                            $html .='</select>
                                                        </div>
                                                    </div>';					
                                                break;
                                            
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="locbtn" name="locbtn" onclick="return updateloc('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i>';
					foreach($service_language as $val1){
						if($val1['rLabelName'] == 'Save'){
							$html.=$val1['rField'];
						}
					}
					$html.='</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">';
					foreach($service_language as $val1){
						if($val1['rLabelName'] == 'Close'){
							$html.=$val1['rField'];
						}
					}
					$html.='</button>
            </div>
        </div>';
        
        
        echo $html;exit;
    }

   function update_loc(){
        
        $iLocationId = $this->input->post('iLocationId');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
       
        if($this->input->post()){

            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            if($data['vLookupAddress']){
            	$data['vLookupAddress'] = 'Yes';
            }else{
            	$data['vLookupAddress'] = 'No';
            } 
                       

            $iLocationId = $this->app_model->update_location($data,$iLocationId);
            

        }
        echo $iLocationId;exit;
    }
	# Menu Start
	// menu tab 
	// Description :- Menu tab
    function getmenuhtml($iFeatureId,$iAppTabId){
    	

        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
            $html .='<div id="menuformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                   <div class="popup_header">';
                    	foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Add New Category'){
                    			 $html.='<h3>'.$val['rField'].'</h3>';
                 			}
                    	}
						$html.='</div>
                    <div class="popup-body">';        
                        $html .='<div id="addmenu_validation'.$iAppTabId.'" style="display:none;"></div>';
					
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmloc" id="frmmenu_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_menu" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                           if($val['vDataBaseFieldName'] == 'vName')
                                           {
                                            $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">';
														foreach($this->data['mylang'] as $vals){
														if($vals['rLabelName'] == $val['vLabelName']){
														$html.=''.$vals['rField'].'</label>';
														}
												}
                                                        $html.='<div class="controls">
                                                            <input type="text" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                          
                                                        </div>
                                                    </div>';
                                           }else{
                                              $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" title="Max 55 characters allowed" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" />
                                                        </div>
                                                    </div>';
                                            }
                                           break;
										   
 										 case 'File':
                                        	$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
										    $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'&nbsp;&nbsp;(600 * 600 pixel)</label>
												<div class="controls">
													<input type="file" value="vImage" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="vImage" onchange="readURL(this);" />';
											$html.='<img id="myimage" src="'.$this->data['base_url'].'uploads/Item/noimg.png" width="200" height="200"/>';
										$html.='</div>
												
											</div>';
											break;
											
                                         case 'Checkbox':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">';
														foreach($this->data['mylang'] as $vals){
														if($vals['rLabelName'] == $val['vLabelName']){
														$html.=''.$vals['rField'].'</label>';
														}}
                                                        $html.='<div class="controls">
                                                            <label class="checkbox">';
                                                            $html .='<input type="checkbox" value="Active" Checked="Checked" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">';
                                                            $html .= '</label>
                                                        </div>
                                                    </div>';
                                             break;
                                        }
                                    }
                                
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitmenu('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i>';
								foreach($this->data['mylang'] as $vals){
									if($vals['rLabelName'] == 'Save'){
											$html.=''.$vals['rField'].'';
										}
									}

                        			$html.='</button>
                        		</div>';
								
					$html .='</form>';
                        $html .='</div>';			
			$html .= '<script>';
			$html .= 'function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
				
							reader.onload = function (e) {
								$("#myimage")
									.attr("src", e.target.result)
									.width(200)
									.height(200);
							};
				
							reader.readAsDataURL(input.files[0]);
						}
					}';
			$html .= '</script>';
						
            $html .='</div>
			
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">';
                foreach($this->data['mylang'] as $vals){
											if($vals['rLabelName'] == 'Close'){
													$html.=''.$vals['rField'].'';
											}}$html.='</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#menuformid'.$iAppTabId.'" id="addpdfid"  style="float:right;">';
			foreach($this->data['mylang'] as $val)
			{
				if($val['rLabelName'] == 'Add New Category'){
					$html.=''.$val['rField'].'';
				}
			}
			$html.='</a></div>';
        
         $html .= $this->get_all_menu_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);          
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }
	// menu tab 
	// Description :- Menu Save
    function save_menu(){

        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
		
		if($this->input->post()){
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            if($data['vStatus'] == 'Active'){
            	$data['vStatus'] = 'Active';
            }else{
            	$data['vStatus'] = 'Inactive';
            }
			/** MenuId **/
			$imenuId = $this->app_model->save_menu($data);
			
			$size =array();
            $size['width']=600;
            $size['height']=600;
            if($_FILES['vImage']['name'] !=''){
            	$itemfile = $_FILES['vImage']['name'];
            	$filename = $this->do_upload_img($imenuId,'Menu','vImage',$size);
			
				if($filename){
            		$data['vImage'] = $filename;
            	}
				$imenuId = $this->app_model->update_menu($data,$imenuId);
            }
            #echo "<pre>";
            #print_r($_FILES);exit;
        }
        echo $imenuId;exit;
    }
	// menu tab 
	// Description :- Menu Listing
    function get_all_menu_data($iApplicationId,$iAppTabId,$iFeatureId){
    	
        $allappmenu = $this->app_model->get_appwise_menu($iApplicationId,$iAppTabId);
       //  echo '<pre>';print_r($allapplocations);exit;
        $html .='<div id="menu_listing'.$iAppTabId.'">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">';
                    foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Name'){
                    			 $html.='<th>'.$val['rField'].'</th>';
                 			}
                    	}

                    foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Add Item'){
                    			 $html.='<th>'.$val['rField'].'</th>';
                 			}
                    	}

                    foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Action'){
                    			 $html.='<th colspan="2"><center>'.$val['rField'].'</center></th>';
                 			}
                    	}
                    $html.='</tr>';
                    
                    if(count($allappmenu) > 0){
                        for($i=0;$i<count($allappmenu);$i++){
                            $k = $i+1; 

                        $html .='<tr class="row1a">
                                     <td width="60%"><p class="sp_title">'.$allappmenu[$i]["vName"].'</p></td>';
                                     
                                     $html .='<td class="add_btn"><a class="btn btn-primary"  onclick="add_item('.$allappmenu[$i]["iMenuID"].','.$iAppTabId.','.$iApplicationId.');">';
                                     foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Item'){
                    			 $html.=''.$val['rField'].'';
                 			}
                    	}
                                     $html.='</a></td>';
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_menu('.$allappmenu[$i]["iMenuID"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_menu('.$allappmenu[$i]["iMenuID"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Menu found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
        return $html;

    }
	// menu tab 
	// Description :- Menu Listing
    function appwisemenulisting(){

        $iApplicationId = $this->input->get('iApplicationId');
        $iAppTabId = $this->input->get('iAppTabId');
        $iFeatureId = $this->input->get('iFeatureId');
 		$html .= $this->get_all_menu_data($iApplicationId,$iAppTabId,$iFeatureId);                        
                    
        echo $html;exit;  
        
    }
	
	// Description :- Menu Delete
    function menu_delete(){
    	

        $iMenuID = $this->input->get('iMenuID');
        /*echo "Menu Id=".$iMenuID;*/
        $menuinfo = $this->app_model->getmenuinfo($iMenuID);
        $iAppTabId = $menuinfo['iAppTabId'];
        $iFeatureId = $menuinfo['iFeatureId'];
        /*print_r($menuinfo);exit;;*/
        if($iMenuID !=''){
        	$id = $this->app_model->delete_menu($iMenuID);
        }
        
        
        $iApplicationId = $this->input->get('iApplicationId');
        $html .= $this->get_all_menu_data($iApplicationId,$iAppTabId,$iFeatureId);         
        echo $html;exit;
    }

	// Description :- Menu edit
    function showeditmenupopup(){
    	
    	$iMenuID = $this->input->get('iMenuID');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $menuinfo = $this->app_model->getmenuinfo($iMenuID);
        #echo "<pre>";
       
        #print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $iAppTabId = $menuinfo['iAppTabId'];
        $iApplicationId = $menuinfo['iApplicationId'];        
         
       	
	  	if(count($menuinfo) == 0)
        {
        	exit;
        }
        $html .='<div id="menuformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit menu</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editmenu_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmmenu" id="updatefrmmenu_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_menu" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .= '<input  type="hidden" id="iMenuID" name="iMenuID" value="'.$iMenuID.'">';
                            
                                    foreach ($all_featurefields as $val){		  		 
                                          switch ($val['eType']) {
                                        case 'Textxbox':
                                        	if($val['vDataBaseFieldName'] == 'vName')
                                           {
                                           		$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">

                                                            <input type="text" maxlength="55" value="'.$menuinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                         </div>
                                                    </div>';
                                           }else{
                                              $html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="'.$menuinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                         </div>
                                                    </div>';
                                            }
                                           break;
                                        
										case 'File':
                                        	$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
										    $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'&nbsp;&nbsp;(600 * 600 pixel)</label>
												<div class="controls">
													<input type="file" value="vImage" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="vImage" onchange="readURL(this);"/>';
											if($val['vDataBaseFieldName'] != '')
											{
											$html.='<img id="editimage" src="'.$this->data['base_url'].'uploads/Menu/'.$iMenuID.'/'.$menuinfo[$val['vDataBaseFieldName']].'" width="200" height="200"/>';
											}else{
											$html.='<img id="myimage" src="'.$this->data['base_url'].'uploads/Menu/noimg.png" width="200" height="200"/>';									
											}
											$html.='</div>
											</div>';
											break;
											
                                          case 'Checkbox':
                                            if($menuinfo[$val['vDataBaseFieldName']] == 'Active'){
                                                $checked = "checked";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" value="'.$menuinfo[$val['vDataBaseFieldName']].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                            
                                        }
                                        
                                    }
                             $html .='</form>';
                        $html .='</div>';
						
						$html .= '<script>';
						$html .= 'function readURL(input) {
									if (input.files && input.files[0]) {
										var reader = new FileReader();
							
										reader.onload = function (e) {
											$("#editimage")
												.attr("src", e.target.result)
												.width(200)
												.height(200);
										};
										
										reader.readAsDataURL(input.files[0]);
									}
								}';
						$html .= '</script>';
       
            $html .='</div>
            <div class="popup-footer">
              <button type="button" class="btn btn-primary"  id="menubtn" name="menubtn" onclick="return updatemenu('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
        echo $html;exit;
    }
	
	/**
		Update Menu
	**/
    function update_menu(){
		
	 	$iMenuID = $this->input->post('iMenuID');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
		
		
		if($this->input->post()){

            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            if($data['vStatus'] == 'Active'){
            	$data['vStatus'] = 'Active';
            }else{
            	$data['vStatus'] = 'Inactive';
            }

            $menu = $this->app_model->update_menu($data,$iMenuID);
			
			$size =array();
            $size['width']=600;
            $size['height']=600;
            if($_FILES['vImage']['name'] !=''){
            	$itemfile = $_FILES['vImage']['name'];
            	$filename = $this->do_upload_img($iMenuID,'Menu','vImage',$size);
			
				if($filename){
            		$data['vImage'] = $filename;
            	}
				$imenuId = $this->app_model->update_menu($data,$iMenuID);
            }
        }
        echo $imenuId;exit;
  
    }
    function showitemlisting(){

		$iMenuID = $this->input->get('iMenuID');
		$iAppTabId = $this->input->get('iAppTabId');
		$iApplicationId = $this->input->get('iApplicationId');
	    	$allappmenulist = $this->app_model->get_appwise_listmenu($iMenuID,$iApplicationId,$iAppTabId);
      
		$html .='<div id="menulistlisting'.$iAppTabId.'" class="main_popup" style="display:block;">
                    <div class="popup_header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeleanmodal();">×</button>';
					foreach($this->data['mylang'] as $val){
						if($val['rLabelName'] == 'Item List'){
							$html.='<h3><center>'.$val['rField'].'</center></h3>';
						}
					}
                     
                    $html.='</div>
                    <div class="popup-body">';  
                    $html .='<div class="add_btn"><a class="btn btn-primary" onclick="add_new_item('.$iMenuID.','.$iApplicationId.','.$iAppTabId.');" style="float:right;">';
                    
                     foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Add New Item'){
                    			 $html.=''.$val['rField'].'';
                 			}
                    }
                    $html.='</a></div>';
                    $html .='<table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">';
                       foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Name'){
                    			 $html.='<th>'.$val['rField'].'</th>';
                 			}
                    	}
						$html.='<th>Image</th>';
                    	
						foreach($this->data['mylang'] as $val){
                    		if($val['rLabelName'] == 'Action'){
                    			 $html.='<th colspan="2"><center>'.$val['rField'].'</center></th>';
                 			}
                    	}
						$html.='<th>Day</th>';
				    $html.='</tr>';
                    if(count($allappmenulist) > 0){
                        for($i=0;$i<count($allappmenulist);$i++){
                            $k = $i+1; 
                       $html .='<tr class="">
                                     <td width="100%"><p class="sp_title">'.$allappmenulist[$i]["vItemName"].'</p></td>';
                       $html.='<td><img src="'.$this->data['base_url'].'uploads/Item/'.$allappmenulist[$i]["iItemId"].'/'.$allappmenulist[$i]["vImage"].'" width="80" height="80" /></td>'; 
                                     $html .='<td align="center" width="15%"><a class=""  onclick="edit_list_item('.$allappmenulist[$i]["iItemId"].','.$iAppTabId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="15%"><a class="button grey" onclick="delete_list_item('.$allappmenulist[$i]["iItemId"].','.$iAppTabId.','.$iMenuID.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
									 <td align="center" width="15%"><input type="checkbox" name="vDayMenu'.$allappmenulist[$i]["iItemId"].'" id="vDayMenu'.$allappmenulist[$i]["iItemId"].'"';
									 $html.= $allappmenulist[$i]["vDayMenu"] == date('Y-m-d')?"Checked":"";
									 $html.=' onclick="onmenuday('.$allappmenulist[$i]["iItemId"].')" /></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No List found.</td></tr>';
                    }
                    $html .='</table>';
                    
       $html .='</div>';
       echo $html;exit;
    }
	
    function getitemform(){

    		$iMenuID = $this->input->get('iMenuID');
        	$iAppTabId = $this->input->get('iAppTabId');
        	$iApplicationId = $this->input->get('iApplicationId');

		$html .='<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />';

    	$html .='<div id="additemformid" class="main_popup" style="display:block;">
	                 <div class="popup_header">';
					foreach($this->data['mylang'] as $val){
						if($val['rLabelName'] == 'Add New Item'){
						 $html.='<h3>'.$val['rField'].'</h3>';
						}
					}
                     $html.='</div>
                    <div class="popup-body">'; 
                    	 $html .='<div id="addmenuitem_validation"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmloc" id="frmitem_item" method="post" action="'.$this->data['base_url'].'app/save_item" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'" id="iApplicationId">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'" id="iAppTabId">';
                            $html .= '<input class="span6" type="hidden" name="data[iMenuID]" value="'.$iMenuID.'" id="iMenuID">';
                           	 $html .='<div class="control-group" id="maindiv">';
                             	$html .= '<label class="control-label" style="cursor:default;">';
									foreach($this->data['mylang'] as $val){
									if($val['rLabelName'] == 'Name'){
									$html.=''.$val['rField'].'';}}
                             	$html.='</label>
                                    <div class="controls">
                                             <input type="text" maxlength="55" value="" class="input-xlarge" id="vItemName" name="data[vItemName]">
                                              </div>
                                     </div>';
                               /*$html .='<div class="control-group" id="maindiv">';
                             		$html .= '<label class="control-label" style="cursor:default;">';
									foreach($this->data['mylang'] as $val){
									if($val['rLabelName'] == 'Varient'){
									$html.=''.$val['rField'].'';}}
                             	$html.='</label>
                                    <div class="controls">
                                             <input type="text" value="" class="input-xlarge" id="vVarient" name="data[vVarient]">
                                              </div>
                                     </div>';*/
                           	$html .='<div class="control-group" id="maindiv">';
                             	$html .= '<label class="control-label" style="cursor:default;">Status</label>
                                    <div class="controls">
                                             <input type="checkbox" class="input-xlarge" id="eStatus" name="data[eStatus]" value="Active" >
                                              </div>
                                     </div>';
                            $html .='<div class="control-group">Description</label>
                                    <div class="controls cedit">
                                        <textarea class="input-xlarge" value="" rows="3" name="data[tDescription]" id="tDescription" ></textarea>
                                    </div>
                                </div>';
                            $html .='<div class="control-group">Image (600*600 Pixel)</label>
                                    <div class="controls">';
                            $html .= '<img id="vImageshow" src="'.$this->data['base_url'].'uploads/Item/noimg.png" width="200" height="200" />';
                            $html .= '<br /><br />';
		
                            $html .= '<input type="file" name="vImage" id="vImage" onchange="readURL(this);">';
							$html.='</div>
                                </div>';
                             
							$html .='<div class="control-group" id="maindiv">';
                             	$html .= '<label class="control-label" style="cursor:default;">';
								foreach($this->data['mylang'] as $val){
									if($val['rLabelName'] == 'Price'){
									$html.=''.$val['rField'].'';}}
                             	$html.='</label>
                                    <div class="controls">
                                             <input type="text" maxlength="55" value="'.number_format($number, 2, '.', '').'" class="input-xlarge" id="fPrice" name="data[fPrice]"  onkeypress="return isPriceKey(event);" >'.$this->data['user_info']['vCurrency'].'
                                        </div>
                                 </div>';
							
				/** Size Defined **/
				$html .='<table id="dyntable_size" class="table table-bordered responsive" >';
					$html.='<th class="head0 nosort">Size Name</th>';
					$html.='<th class="head0">Price</th>';
					//$html.='<th class="head0">Delete</th>';
					$html.='<th class="head0"><a class="button grey" style="cursor:pointer;" onClick="add_size_menu_item(\''.$this->data['user_info']['vCurrency'].'\');"><i class="icon-plus white helper-font-24" title="" aria-describedby=""></i></a></th>';
				for($i=0;$i<1;$i++){	
				$html.='<tr>
					<td><input type="text" name="size[vSizeName'.$i.']" id="vSizeName" /></td>
					<td><input type="text" value="'.number_format($number, 2, '.', '').'" name="size[fPrice'.$i.']" id="fPrice" onkeypress="return isPriceKey(event);" />'.$this->data['user_info']['vCurrency'].'</td>
					<td><a class="button grey" onclick="delete_item_size_menu();" style="cursor:pointer;"><i class="icon-trash itemdel helper-font-24" title="" aria-describedby="" onclick="delete_item_size_menu();"></i></a></td>
					  </tr>';
				}
				$html .='</table>';  
				$html .= '<br />';							
				$html .='<table id="dyntable_option" class="table table-bordered responsive item_size_details" >';
				
				/** Options Defined **/
				//$html.='<th width="20%">Option Group</th>';
				$html.='<th class="head0">Option Name</th>';
				$html.='<th class="head0">Charges</th>';
				$html.='<th class="head0"><a class="button grey" onclick="add_option_menu_item(\''.$this->data['user_info']['vCurrency'].'\');" style="cursor:pointer;"><i class="icon-plus white helper-font-24" title="" aria-describedby=""></i></a></th>';
				//<td><input type="text" name="option[vOptionGroup'.$k.']" id="vOptionGroup" /></td>
				for($k=0;$k<1;$k++){
					$html.='<tr>
					<td><input type="text" name="option[vOptName'.$k.']" id="vOptName" /></td>
					<td><input type="text" name="option[fCharge'.$k.']" id="fCharge" onkeypress="return isPriceKey(event);" value="'.number_format($number, 2, '.', '').'" />'.$this->data['user_info']['vCurrency'].'</td>
					<td colspan="2"><a class="button grey" onclick="delete_item_size_menu();" style="cursor:pointer;"><i class="icon-trash itemdel helper-font-24" title="" aria-describedby="ui-tooltip-0"></i></a></td>
					</tr>';
				}
				$html .='</table>';             			
             			$html .= '</form>';

                   $html.='<br />';
                   $html .='</div>';
                   $html .='<div class="row_form" style="padding:10px 16px;">
		        <button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submititem('.$iMenuID.','.$iAppTabId.','.$iApplicationId.');"><i class="icon-ok">';
			foreach($this->data['mylang'] as $val){
			if($val['rLabelName'] == 'Save'){
			$html.=''.$val['rField'].'';}}
		             	$html.='</i></button>
		        		</div>';
				 $html .='</div>';
		        
	   		 $html .='</div>
            	 <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">';
		foreach($this->data['mylang'] as $val){
		if($val['rLabelName'] == 'Close'){
		$html.=''.$val['rField'].'';}}
                $html.='</button>
            </div>
        </div>';
        
     	$html.='<script>
		function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$("#vImageshow")
					.attr("src", e.target.result)
					.width(200)
					.height(200);
			};

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>';
	$html.='<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery("#dyntable").dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,"asc"]],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery("#dyntable2").dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
        
    });
</script>';         
        echo $html;exit;  
        #echo "<pre>";
        #print_r($all_featurefields);exit;
    }

    # Item Management Start
	// Item Management media 
	// Description :- Item Management tab
    function save_item()
    {
        /** save item details **/
    	$data = $this->input->post('data');
	$size = $this->input->post('size');
	$option = $this->input->post('option');
    	
	/*print_r($data);exit;*/
        if($this->input->post()){
            /*if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }*/
            if($data['eStatus']){
            	$data['eStatus'] = 'Active';
            }else{
            	$data['eStatus'] = 'Inactive';
            }

	    /** save item details **/	
            $iItemId = $this->app_model->save_item($data);

	    /** save size details **/
	    $this->app_model->save_size_details($size,$iItemId);	

	    /** option value details **/	
	    $this->app_model->save_option_details($option,$iItemId);

            $size =array();
            $size['width']=200;
            $size['height']=200;
            if($_FILES['vImage']['name'] !=''){
            	$itemfile = $_FILES['vImage']['name'];
            	$filename = $this->do_upload_img($iItemId,'Item','vImage',$size);
            	if($filename){
            		$data['vImage'] = $filename;
            	}
            }
            $iItemId = $this->app_model->update_item($data,$iItemId);
        }
        echo $iItemId;exit;
       
    }

	// Item TAB
	// Description :- Item Dalete
    function item_delete(){
    	$iItemId = $this->input->get('iItemId');
    	
    	$iteminfo = $this->app_model->getiteminfo($iItemId);
    	$iAppTabId = $iteminfo['iAppTabId'];
    	$iApplicationId = $iteminfo['iApplicationId'];
    	$iMenuID = $iteminfo['iMenuID'];
    	
       if($iItemId !=''){
            if(is_dir('uploads/Item/'.$iItemId)){
               $this->rm_folder_recursively('uploads/Item/'.$iItemId);
            }       
	        $id = $this->app_model->delete_item($iItemId);
        }
        $html .= $this->showitemlisting();         
        echo $html;exit;

    }
	
	// Item TAB
	// Description :- Edit Item

    function showedititempopup(){

    	$iItemId = $this->input->get('iItemId');

    	$getiteminfo = $this->app_model->getiteminfo($iItemId);


	/** get size item details **/
	$getsizeiteminfo = $this->app_model->getitemsizeinfo($iItemId);

	/** get option item details **/
	$getoptioniteminfo = $this->app_model->getitemoptioninfo($iItemId);


        if(count($getiteminfo) == 0)
        {
        	exit;
        }
		
	$html .='
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>';

        /* print_r($getiteminfo);exit;*/
        $html .='<div id="additemformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Item</h3>
                    </div>
                    <div class="popup-body">'; 
                    	 $html .='<div id="editmenuitem_validation"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmloc" id="updatefrmitem" method="post" action="'.$this->data['base_url'].'app/update_item" enctype="multipart/form-data">';
                             $html .= '<input class="span6" type="hidden" name="iItemId" value="'.$getiteminfo['iItemId'].'" id="iItemId">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$getiteminfo['iApplicationId'].'" id="iApplicationId">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$getiteminfo['iAppTabId'].'" id="iAppTabId">';
                            $html .= '<input class="span6" type="hidden" name="data[iMenuID]" value="'.$getiteminfo['iMenuId'].'" id="iMenuID">';
                           	 $html .='<div class="control-group" id="maindiv">';
                             	$html .= '<label class="control-label" style="cursor:default;">Name</label>
                                    <div class="controls">
                                             <input type="text" maxlength="55" value="'.$getiteminfo['vItemName'].'" class="input-xlarge" id="vItemName" name="data[vItemName]">
                                              </div>
                                     </div>';
                              /* $html .='<div class="control-group" id="maindiv">';
                             	$html .= '<label class="control-label" style="cursor:default;">Varient</label>
                                    <div class="controls">
                                             <input type="text" value="'.$getiteminfo['vVarient'].'" class="input-xlarge" id="vVarient" name="data[vVarient]">
                                              </div>
                                     </div>';*/
                           	$html .='<div class="control-group" id="maindiv">';
                             	$html .= '<label class="control-label" style="cursor:default;">Status</label>
                                    <div class="controls">
                                             <input type="checkbox" checked="checked" class="input-xlarge" id="eStatus" name="data[eStatus]" value="Active" >
                                              </div>
                                     </div>';
                            $html .='<div class="control-group">Description</label>
                                    <div class="controls cedit">
                                        <textarea class="input-xlarge" rows="3" name="data[tDescription]" id="tDescription" >'.$getiteminfo['tDescription'].'</textarea>
                                    </div>
                                </div>';
                            $html .='<div class="control-group">Image (600*600 pixel)</label>
                                    <div class="controls">
                                        <input type="file" name="vImage" value="vImage" title="'.$getiteminfo['vImage'].'" onchange="readURL(this);">
										<img id="Imageshow" src="'.$this->data['base_url'].'uploads/Item/'.$getiteminfo['iItemId'].'/'.$getiteminfo['vImage'].'" />
                                    </div>
                                </div>';
                             $html .='<div class="control-group" id="maindiv">';
                             	$html .= '<label class="control-label" style="cursor:default;">Price </label>
                                    <div class="controls">
                                             <input type="text" maxlength="55" value="'.$getiteminfo['fPrice'].'" class="input-xlarge" id="fPrice" name="data[fPrice]" >'.$this->data['user_info']['vCurrency'].'
                                              </div>
                                     </div><br><br><br>';
				/** Size Defined **/
				$html .='<table id="dyntable_size" class="table table-bordered responsive" >';
					$html.='<th class="head0 nosort">Size Name</th>';
					$html.='<th class="head0">Price</th>';
					//$html.='<th class="head0">Delete</th>';
					$html.='<th class="head0"><a class="button grey" onclick="edit_size_menu_item(\''.$this->data['user_info']['vCurrency'].'\');" style="cursor:pointer;"><i class="icon-plus white helper-font-24" title="" aria-describedby=""></i></a></th>';
				for($i=0;$i<count($getsizeiteminfo);$i++){
					$html.='<tr>
						<td><input type="text" name="size[vSizeName'.$i.']" value="'.$getsizeiteminfo[$i]['vSizeName'].'" id="vSizeName" /></td>
						<td><input type="text" name="size[fPrice'.$i.']" id="fPrice" value="'.$getsizeiteminfo[$i]['fPrice'].'" onkeypress="return isPriceKey(event);" /> '.$this->data['user_info']['vCurrency'].'</td>
						<td><a class="button grey" onclick="delete_item_size_menu();" style="cursor:pointer;"><i class="icon-trash itemdel helper-font-24" title="" aria-describedby=""></i></a></td>
					  </tr>';
				}				
				$html.='<tr>';
				$html .='</table>';  
							
				$html .= '<br />';							
				$html .='<table id="dyntable_option" class="table table-bordered responsive item_size_details" >';
				/** Options Defined **/
				//$html.='<th width="20%">Option Group</th>';
				$html.='<th class="head0">Option Name</th>';
				$html.='<th class="head0">Charges</th>';
				$html.='<th class="head0"><a class="button grey" onclick="edit_option_menu_item(\''.$this->data['user_info']['vCurrency'].'\');" style="cursor:pointer;"><i class="icon-plus white helper-font-24" title="" aria-describedby=""></i></a></th>';
				//<td><input type="text" name="option[vOptionGroup'.$i.']" value="'.$getoptioniteminfo[$k]['vOptionGroup'].'" id="vOptionGroup" /></td>
				for($k=0;$k1<count($getoptioniteminfo);$k++){
				$html.='<tr>
					<td><input type="text" name="option[vOptName'.$i.']" value="'.$getoptioniteminfo[$k]['vOptName'].'" id="vOptName" /></td>
					<td><input type="text" name="option[fCharge'.$i.']" value="'.$getoptioniteminfo[$k]['fCharge'].'" id="fCharge" /> '.$this->data['user_info']['vCurrency'].'</td>
					<td><a class="button grey" onclick="delete_item_size_menu();" style="cursor:pointer;"><i class="icon-trash itemdel helper-font-24" title="" aria-describedby="ui-tooltip-0"></i></a></td>
					</tr>';
				}				
			$html .='</table>';   
                        $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return updateitem('.$getiteminfo['iMenuId'].','.$getiteminfo['iAppTabId'].','.$getiteminfo['iApplicationId'].');"><i class="icon-ok"></i> Save</button>
        		</div>';
            $html .='</div>';
                        
           		 $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
		
		$html.='<script>';
		$html.='function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$("#Imageshow")
							.attr("src", e.target.result)
							.width(100)
							.height(100);
					};
		
						reader.readAsDataURL(input.files[0]);
					}
				}';	
		$html.='</script>';
        
     	    
                    
        echo $html;exit; 
    }
    // Item TAB
	// Description :- Update Item
    function update_item()
    {
    	$iItemId = $this->input->post('iItemId');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
	$size = $this->input->post('size');
	$option = $this->input->post('option');
	
	/** option details **/
        if($this->input->post()){

            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }

	    /** save details **/
	    $this->app_model->delete_size_option_details($iItemId);

	    /** option details **/
	    $this->app_model->delete_option_option_details($iItemId);	

            /** save size details **/
	    $this->app_model->save_size_details($size,$iItemId);

            /** option value details **/	
	    $this->app_model->save_option_details($option,$iItemId);

	    $size=array();
            $size['width']=200;
            $size['height']=200;
		  
	    if($_FILES['vImage']['name'] !=''){
                $itemfile = $_FILES['vImage']['name'];
                $fileName = $this->do_upload_img($iItemId,'Item','vImage',$size);
                if($fileName){
                    $data['vImage'] = $fileName;
		}
            }	

           $iItemId = $this->app_model->update_item($data,$iItemId);
        }
        echo $iItemId;exit;

    }
	
    // Loyalty Tab
	// Description :- Loyalty  form
	function getloyaltyhtml($iFeatureId,$iAppTabId)
	{
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
            
        $html .='<div id="loyaltyformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                   <div class="popup_header">
                    			<h3>Add New Loyalty</h3></div>
                    <div class="popup-body">';        
                        $html .='<div id="addloyalty_validation'.$iAppTabId.'" style="display:none;"></div>';
              
                            $html .='<form class="form-horizontal" name="frmloc" id="frmloyalty_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_loyalty" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
								     foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                        	
                                              $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" title="Max 55 characters allowed" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                           break;
										 case 'File':
											if($val['vDataBaseFieldName'] == 'vThumbnail')
                                           	{
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" >
                                                        </div>
                                                    </div>';
                                              }					
                                          break;
										
										case 'Checkbox':
										$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="checkbox" value="YES" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
										break;
										
										case 'SelectBox':
                                           $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                           $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                	 <div class="controls">
                                                    	<select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'">';
												$html .= '<option value="0">select</option>';		
												for($i=1;$i<=20;$i++){			
                                      				$html .= '<option value="'.$i.'">'.$i.'</option>';
												}
                                         		$html .='</select></div>
                                                </div>';
                                        	break;   
										   
                                       
										  
                                        }
                                    }
                            $html .='</form>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitloyalty('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i>Save</button>
                        		</div>';


            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#loyaltyformid'.$iAppTabId.'" id="addpdfid"  style="float:right;">
		Add New Loyalty
			</a></div>';
        
         $html .= $this->get_all_loyalty_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);          
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }
    function save_loyalty(){

        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
          
            $iloyaltyId = $this->app_model->save_loyalty($data);
            $size = array();
            $size['width'] = 100;
            $size['height'] = 100;
            if($_FILES['vThumbnail']['name'] !=''){
            	$iLoyaltyfile = $_FILES['vThumbnail']['name'];
            	$fileName = $this->do_upload_img($iloyaltyId,'Loyalty','vThumbnail',$size);
            	if($fileName != ''){
            		$data['vThumbnail'] = $fileName;
            	}
            }
            $iLoyaltyID = $this->app_model->update_loyalty($data,$iloyaltyId);
            
        }
        echo $iloyaltyId;exit;
   
    }
    function get_all_loyalty_data($iApplicationId,$iAppTabId,$iFeatureId){

    	$allapployalty = $this->app_model->get_appwise_loyalty($iApplicationId,$iAppTabId);
     	# echo '<pre>';print_r($allappwebsites);exit;
        $html .='<div id="loyalty_listing'.$iAppTabId.'" class="listing">
                    <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                    	<th>Thumbnail</th>
                        <th>RewardText</th>
                        <th><center>Secret Code</center></th>
                        <th colspan="2"><center>Action</center></th>
                    </tr>';
                    
                    if(count($allapployalty) > 0){
                        for($i=0;$i<count($allapployalty);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">';
			                        if($allapployalty[$i]['vThumbnail'] == ''){
			                          	$fileurl = $this->data['base_image']."noimg.png";
			                          	$html .='<td width="9%"><div style="float: left;"><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';

			                          }else{
			                          	$fileurl = $this->data['base_upload']."Loyalty/".$allapployalty[$i]['iLoyaltyID']."/".$allapployalty[$i]['vThumbnail'];
			                          	$html .= '<td width="9%"><div style="float: left;" ><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';
			                          }
                                      $html .=  '<td width="25%"><p class="sp_title">'.$allapployalty[$i]["vRewardText"].'</p></td>';
                                     $html .=  '<td width="25%"><p class="sp_title">'.$allapployalty[$i]["vSecretCode"].'</p></td>';
                                     $html .='<td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_loyalty('.$allapployalty[$i]["iLoyaltyID"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="7%"><a class="button grey" onclick="return delete_loyalty('.$allapployalty[$i]["iLoyaltyID"].','.$iAppTabId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Loyalty found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';

        return $html;
    }
    function appwiseloyaltylisting(){
    	$iApplicationId = $this->input->get('iApplicationId');
    	$iAppTabId = $this->input->get('iAppTabId');
    	$iFeatureId = $this->input->get('iFeatureId');
    	$html .= $this->get_all_loyalty_data($iApplicationId,$iAppTabId,$iFeatureId);          
                    
        echo $html;exit;
    }
    function loyalty_delete(){

    	$iLoyaltyID = $this->input->get('iLoyaltyID');
    	$iloyaltyinfo = $this->app_model->getloyaltyinfo($iLoyaltyID);
    	$iAppTabId = $iloyaltyinfo['iAppTabId'];
    	$iFeatureId = $iloyaltyinfo['iFeatureId'];
    	if($iLoyaltyID !=''){
            if(is_dir('uploads/Loyalty/'.$iLoyaltyID)){
               $this->rm_folder_recursively('uploads/Loyalty/'.$iLoyaltyID);
            }
            $Id = $this->app_model->delete_loyalty($iLoyaltyID);       
        }
    	
    	$iApplicationId = $this->input->get('iApplicationId');
    	$html .= $this->get_all_loyalty_data($iApplicationId,$iAppTabId,$iFeatureId);          
        echo $html;exit;
    }
    function showeditloyaltypopup(){

    	$iLoyaltyID = $this->input->get('iLoyaltyID');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $loyaltyinfo = $this->app_model->getloyaltyinfo($iLoyaltyID);
        #echo "<pre>";
       
       # print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $iAppTabId = $loyaltyinfo['iAppTabId'];
        $iApplicationId = $loyaltyinfo['iApplicationId'];        
         
       
       	if(count($loyaltyinfo) == 0)
        {
        	exit;
        }
        $html .='<div id="loyaltyformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Loaylty</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editloyalty_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmloyalty" id="updatefrmloyalty_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_loyalty" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .= '<input  type="hidden" name="iLoyaltyID" value="'.$iLoyaltyID.'">';
                           
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        	case 'Textxbox':
                                        	
                                              $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" title="Max 55 characters allowed" maxlength="55" value="'.$loyaltyinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                           break;
										   
										case 'SelectBox':
                                           $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                           $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                	 <div class="controls">
                                                    	<select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'">';
												$html .= '<option value="0">select</option>';		
												for($i=1;$i<=20;$i++){			
                                      				$html .= '<option value="'.$i.'">'.$i.'</option>';
												}
                                         		$html .='</select></div>
                                                </div>';
                                        	break; 
										
										case 'Checkbox':
										$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="checkbox" value="YES" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']"';
								
										$html.=$loyaltyinfo[$val['vDataBaseFieldName']]=='YES'?"Checked":"";
															$html.=' />
                                                        </div>
                                                    </div>';
										break;
											   
                                        case 'File':
                                       		if($val['vDataBaseFieldName'] == 'vThumbnail')
                                           	{
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file"  value="'.$loyaltyinfo[$val['vDataBaseFieldName']].'" class="default" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" >
                                                        </div>
                                                    </div>';
                                            }					
                                                break;
                                        }
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="loyaltybtn" name="loyaltybtn" onclick="return updateloyalty('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                        		</div>';
       
            $html .='<div class="popup-footer">
              
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
        
        echo $html;exit;
    
    }
    function update_loyalty(){
    	 $iLoyaltyID = $this->input->post('iLoyaltyID');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){

            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            $size = array();
			$size['width'] = 100;
			$size['height'] = 100;
			if($_FILES['vThumbnail']['name'] !=''){
			$iLoyaltyfile = $_FILES['vThumbnail']['name'];
			$fileName = $this->do_upload_img($iLoyaltyID,'Loyalty','vThumbnail',$size);
			if($fileName != ''){
			$data['vThumbnail'] = $fileName;
			}
			}

            $iLoyaltyID = $this->app_model->update_loyalty($data,$iLoyaltyID);
        }
        echo $iLoyaltyID;exit;
    }

    # Social Media Start
	// Social media 
	// Description :- socialmedia tab

     function getsocialmediahtml($iFeatureId,$iAppTabId){
    	
    	
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId,$iAppTabId);
          #  echo '<pre>';print_r($all_featurefields);exit;
           
            $html .='<div id="socialmediaform'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add SocialMedia</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addsocial_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmsocial" id="frmsocial_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_social" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                             $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                            if($val['vDataBaseFieldName'] == 'vName')
                                           {
                                            	$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                          
                                                        </div>
                                                    </div>';
                                           }
                                           else if($val['vDataBaseFieldName'] == 'vUrl'){
                                           	 $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                              <div style="color:red;position: absolute; margin-top:10px;">Ex: http://www.facebook.com</div>
                                                           
                                                        </div>
                                                    </div>';
                                           }

                                           else
                                           {
                                              $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" title="Max 55 characters allowed" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                            }
                                                break;
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';

            $html .='</div><br><br>
            <div class="popup-footer">
                <button type="button" class="btn btn-primary"  id="socialbtn" name="socialbtn"  onclick="return submitsocialmedia('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                <button aria-hidden="true" onclick="closeleanmodal('."'frmsocial_$iAppTabId'".');" class="btn">Close</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#socialmediaform'.$iAppTabId.'" id="addpdfid"  style="float:right;">Add New socialmedia</a></div>';
        

        $html .= $this->get_all_social_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);           
                    
        return $html;  
        
        /*echo "<pre>";
        print_r($all_featurefields);exit;*/
        
    }
	
	/*Social media 
	Description :- socialmedia listing*/
    function get_all_social_data($iApplicationId,$iAppTabId,$iFeatureId){
    	

        $allappsocial = $this->app_model->get_appwise_social($iApplicationId,$iAppTabId);
     	# echo '<pre>';print_r($allappwebsites);exit;
        $html .='<div id="social_listing'.$iAppTabId.'" class="listing">
                    <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Name</th>
                        <th><center>Url</center></th>
                        <th colspan="2"><center>Action</center></th>

                    </tr>';
                    
                    if(count($allappsocial) > 0){
                        for($i=0;$i<count($allappsocial);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">';
			                          
                                      $html .=  '<td width="30%"><p class="sp_title">'.$allappsocial[$i]["vName"].'</p></td>';
                                     $html .=  '<td width="30%"><p class="sp_title">'.$allappsocial[$i]["vUrl"].'</p></td>';
                                     $html .='<td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_social('.$allappsocial[$i]["iSocialMediaID"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="7%"><a class="button grey" onclick="return delete_social('.$allappsocial[$i]["iSocialMediaID"].','.$iAppTabId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No sociamedia found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';

        return $html;

    }
	
    /*Social media 
	Description :- socialmedia list*/
    function appwisesociallisting(){
    	

    	//echo 'aka';exit;
        $iApplicationId = $this->input->get('iApplicationId');
        $iAppTabId = $this->input->get('iAppTabId');
        $iFeatureId = $this->input->get('iFeatureId');
 		$html .= $this->get_all_social_data($iApplicationId,$iAppTabId,$iFeatureId);                        
                    
        echo $html;exit;  
        
    }
	
    /*Social media 
	Description :- socialmedia save*/
   function save_social(){
    	

        #echo "<pre>";
        #print_r($_FILES);exit;
        $iApplicationId = $this->input->post('iApplicationId');

        $data = $this->input->post('data');
        if($this->input->post()){
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
  
            $iSocialMediaID = $this->app_model->save_social($data);
            
            #echo "<pre>";
            #print_r($_FILES);exit;

        }
        echo $iSocialMediaID;exit;
    }
	
    /*Social media 
	Description :- socialmedia Delete*/ 
    function social_delete(){
    	

        $iSocialMediaID = $this->input->get('iSocialMediaID');
        $socialinfo = $this->app_model->getsocialinfo($iSocialMediaID);
        $iAppTabId = $socialinfo['iAppTabId'];
        $iFeatureId = $socialinfo['iFeatureId'];
        $id = $this->app_model->delete_social($iSocialMediaID);
        $iApplicationId = $this->input->get('iApplicationId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $html .= $this->get_all_social_data($iApplicationId,$iAppTabId,$iFeatureId);         
                    
        echo $html;exit;
    }
	
    /*Social media 
	Description :- socialmedia editpopup*/
    function showeditsocialpopup(){
    	

        $iSocialMediaID = $this->input->get('iSocialMediaID');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $socialinfo = $this->app_model->getsocialinfo($iSocialMediaID);
        #echo "<pre>";
       
       # print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $iAppTabId = $socialinfo['iAppTabId'];
        $iApplicationId = $socialinfo['iApplicationId'];        
         
       
       	if(count($socialinfo) == 0)
        {
        	exit;
        }
        $html .='<div id="socialformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Social</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editsocial_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmsocial" id="updatefrmsocial_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_social" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .= '<input  type="hidden" name="iSocialMediaID" value="'.$iSocialMediaID.'">';
                           
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                      	if($val['vDataBaseFieldName'] == 'vName')
                                           {
                                            $html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="'.$socialinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                         </div>
                                                    </div>';
                                           }
                                           else if($val['vDataBaseFieldName'] == 'vUrl')
                                           {
                                            $html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="'.$socialinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                         <div style="color:red;position: absolute; margin-top:10px;">Ex: http://www.facebook.com</div>
                                                        </div>
                                                    </div><br>';
                                           }
                                           else
                                           {
                                            $html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" title="max 55 characters allowed." value="'.$socialinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                           }
                                          
                                                break;
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
       
            $html .='</div>
            <div class="popup-footer">
              <button type="button" class="btn btn-primary"  id="socailbtn" name="socailbtn" onclick="return updatesocial('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
        
        echo $html;exit;
    }
	
    /*Social media 
	Description :- socialmedia update*/
    function update_social(){   		
        
        $iSocialMediaID = $this->input->post('iSocialMediaID');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($iApplicationId !='')
	    {
                $data['iApplicationId'] = $iApplicationId;
            }
	      $iSocialMediaID = $this->app_model->update_social($data,$iSocialMediaID);
        }
        echo $iSocialMediaID;exit;
    }

    // QRCode Start
    /*
	QR Code
	Description :- QRCode Form
    */
    function getqrcouponhtml($iFeatureId,$iAppTabId){
    	

        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        
            
            $html .='<div id="qrcouponformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>New QR Coupon</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addqrcoupon_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmqrcoupon" id="frmqrcoupon_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_qrcoupon" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                    	case 'Textxbox':
                                        		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                   $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">';
													    if($val['vDataBaseFieldName'] == 'vTargetAmount'){
														    $html .='<input type="text" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" /> '.$this->data['user_info']['vCurrency'];
															$html .='<br />';
                                                    	}else if($val['vDataBaseFieldName'] == "vBackgroundColor" || $val['vDataBaseFieldName'] == "vTextColor"){
                                                    		$vVal = ($val['vDataBaseFieldName'] == "vBackgroundColor") ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)';
	                                                        $html .='<input type="text" maxlength="55"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" data-color-format="rgb" class="gcp color_text_hide" value="'.$vVal.'" style="width:35px !important;background:'.$vVal.';">';
                                                    	}
                                                    	else if($val['vDataBaseFieldName'] == "tQrCode"){
                                                    		
	                                                       $html .='<input type="text" value="" maxlength="100" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']"  onblur="return makeCode(this.value);">';
	                                                       $html .='<div id="qrcode"></div>';
			                                                $html .='<script type="text/javascript">

																	var qrcode = new QRCode(document.getElementById("qrcode"), {
																		width : 100,
																		height : 100
																	});

																	function makeCode () {		
																		var elText = document.getElementById("tQrCode"+'.$iAppTabId.');
																		qrcode.makeCode(elText.value);
																	}$("tQrCode"+'.$iAppTabId.').
																		on("blur", function () {
																			makeCode();
																		}).
																		on("keydown", function (e) {
																			if (e.keyCode == 13) {
																				makeCode();
																			}
																		});
																	</script>';
                                                    	}
                                                    	else{
                                                        	$html .='<input type="text" value="" maxlength="55" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >';
                                                        }
                                                    $html .='</div>
                                                </div>';
                                            break;                                             
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="Inactive"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                       		
                                        case 'File':
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" >
                                                        </div>
                                                    </div>';					
                                                break;
                                        

                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input value="" class="input-xlarge eventd" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
                                        
                                           case 'Editor':

                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls cedit">
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                            
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="qrcouponbtn" name="qrcouponbtn" onclick="return submitqrcoupon('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
       
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#qrcouponformid'.$iAppTabId.'" id="addevenitid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">Add New QR Coupon</a></div>';
        
     
     	$html .= $this->all_qrcoupon_data_html($this->data['iApplicationId'],$iAppTabId,$iFeatureId);
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }

    function save_qrcoupon(){
    	

        #echo "<pre>";
        #print_r($_FILES);exit;
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($data['eStatus'] == 'Inactive'){
                $data['eStatus'] = 'Active';
            }else{
                $data['eStatus'] = 'Inactive';
            }
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            $iQrID = $this->app_model->save_qrcoupon($data);
            
            $size=array();
            $size['width']=50;
            $size['height']=50;	 
            
            //Header MobileHeaderImage
            if($_FILES['vMobileHeaderImage']['name'] !=''){
                $eventfile = $_FILES['vMobileHeaderImage']['name'];
                $fileName = $this->do_upload_img($iQrID,'QRCode/MobileHeaderImage','vMobileHeaderImage',$size);
                if($fileName){
                    $data['vMobileHeaderImage'] = $fileName;    
                }
            }
			//Header Image
            if($_FILES['vTabletHeaderImage']['name'] !=''){
                $eventfile = $_FILES['vTabletHeaderImage']['name'];
                $fileName = $this->do_upload_qrcouponheaderimage($iQrID,'QRCode/TabletHeaderImage','vTabletHeaderImage',$size);
                if($fileName){
                    $data['vTabletHeaderImage'] = $fileName;    
                }
               
            }

 			$iQrID = $this->app_model->update_qrcoupon($data,$iQrID);

        }
        echo $iQrID;exit;
    }
    function appwiseqrcouponlisting(){
    	

        $iApplicationId = $this->input->get('iApplicationId');
        $iAppTabId = $this->input->get('iAppTabId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $allappqurcoupon = $this->app_model->get_appwise_qrcoupon($iApplicationId,$iAppTabId);
        
		$html .= $this->all_qrcoupon_data_html($iApplicationId,$iAppTabId,$iFeatureId); 
        echo $html;exit; 
        
    }
    function all_qrcoupon_data_html($iApplicationId,$iAppTabId,$iFeatureId){

    	$allappqrcouupon = $this->app_model->get_appwise_qrcoupon($iApplicationId,$iAppTabId);
        
        $html .='<div id="qrcoupon_listing'.$iAppTabId.'">
                    <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>COupon Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th colspan="2"><center>Action</center></th>
                    </tr>';
                    
                    if(count($allappqrcouupon) > 0){
                        for($i=0;$i<count($allappqrcouupon);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="25%"><p class="sp_title">'.$allappqrcouupon[$i]["vName"].'</p></td>
                                     <td width="32%" align="center">'.date("jS F Y", strtotime($allappqrcouupon[$i]["dStartDate"])).'</td>
                                     <td width="32%" align="center">'.date("jS F Y", strtotime($allappqrcouupon[$i]["dEndDate"])).'</td>
                                     <td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_qrcoupon('.$allappqrcouupon[$i]["iQrID"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="7%"><a class="button grey" onclick="delete_qrcoupon('.$allappqrcouupon[$i]["iQrID"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No QR Coupon founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
        
        return $html;
    }
    function delete_qrcoupon(){

        $iQrID = $this->input->get('iQrID');

        $qrcouponinfo = $this->app_model->getqrcouponinfo($iQrID);
        $iFeatureId = $qrcouponinfo['iFeatureId'];
        //$iFeatureId = $eventinfo['iFeatureId'];
        
        $iAppTabId = $qrcouponinfo['iAppTabId'];

        if($iQrID !=''){
            if(is_dir('uploads/QRCode/MobileHeaderImage/'.$iQrID)){
               $this->rm_folder_recursively('uploads/QRCode/MobileHeaderImage/'.$iQrID);
            }       
        }
        if($iQrID !=''){
            if(is_dir('uploads/QRCode/TabletHeaderImage/'.$iQrID)){
               $this->rm_folder_recursively('uploads/QRCode/TabletHeaderImage/'.$iQrID);
            }       
	        $id = $this->app_model->delete_qrcoupon($iQrID);
        }
        
        $iApplicationId = $this->input->get('iApplicationId');

        
		$html .= $this->all_qrcoupon_data_html($iApplicationId,$iAppTabId,$iFeatureId);  
		
		echo $html;exit; 
    }
     function showeditqrcouponpopup(){

     	$iQrID = $this->input->get('iQrID');
        $iFeatureId = $this->input->get('iFeatureId');

        $qrcouponinfo = $this->app_model->getqrcouponinfo($iQrID);
        $iApplicationId = $qrcouponinfo['iApplicationId'];
        $iAppTabId = $qrcouponinfo['iAppTabId'];
        #echo "<pre>";
        #print_r($eventinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
       	if(count($qrcouponinfo) == 0)
        {
        	exit;
        }
       	$html .='<div class="main_popup">
                    <div class="popup_header">
                        <h3>Edit QR Coupon</h3>
                    </div>
                    <div class="popup-body">';          
                     $html .='<div id="editqrcoupon_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmeditqrcoupon" id="frmeditqrcoupon_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_qrcoupon" enctype="multipart/form-data">';
                            $html .= '<input  type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input  type="hidden" name="iQrID" value="'.$iQrID.'">';
                            $html .= '<input  type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
/*                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$eventinfo[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;*/
                                    		case 'Textxbox':
                                        		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                   $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">';
                                                    	if($val['vDataBaseFieldName'] == "vBackgroundColor" || $val['vDataBaseFieldName'] == "vTextColor"){
                                                    		$vVal = $qrcouponinfo[$val['vDataBaseFieldName']];
                                                    		//$vVal = ($val['vDataBaseFieldName'] == "vBackgroundColor") ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)';
	                                                        $html .='<input type="text" maxlength="55"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" data-color-format="rgb" class="gcp color_text_hide" value="'.$vVal.'" style="width:35px !important;background:'.$vVal.';">';
                                                    	}else if($val['vDataBaseFieldName'] == "tQrCode"){
                                                    		
	                                                       $html .='<input type="text" value="'.$qrcouponinfo[$val['vDataBaseFieldName']].'"  maxlength="100" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">';
	                                                       $html .='<div id="qrcodee"></div>';
			                                                $html .='<script type="text/javascript">

																	var qrcode = new QRCode(document.getElementById("qrcodee"), {
																		width : 100,
																		height : 100
																	});

																	function makeCode () {		
																		var eText = document.getElementById("tQrCodee"+'.$iAppTabId.');
																		qrcode.makeCode(eText.value);
																	}$("#tQrCodee"+'.$iAppTabId.').
																		on("blur", function () {
																			makeCode();
																		}).
																		on("keydown", function (e) {
																			if (e.keyCode == 13) {
																				makeCode();
																			}
																		});
																	</script>';
                                                    	}else{
                                                        	$html .='<input type="text" maxlength="55" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" value="'.$qrcouponinfo[$val['vDataBaseFieldName']].'">';
                                                        }
                                                    $html .='</div>
                                                </div>';
                                            	break;                                                
                                        case 'Checkbox':
                                            if($qrcouponinfo[$val['vDataBaseFieldName']] == 'Active'){
                                                $checked = "checked";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                       case 'File':
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file" class="default" value="'.$qrcouponinfo[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" style="float: left;" onchange="return setimagevalue(this.value);">';
                                                            
                                                            /*if($qrcouponinfo[$val['vDataBaseFieldName']] != '' && $val['vDataBaseFieldName'] != 'vMobileHeaderImage'){
                                                                $fileurl = $this->data['base_upload']."QRCode/MobileHeaderImage/".$qrcouponinfo['iQrID']."/".$qrcouponinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="deletebtndivid"><div style="float: left;"><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deleteeventimage('.$qrcouponinfo['iQrID'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }*/
                                                            
                                                            if($qrcouponinfo[$val['vDataBaseFieldName']] != '' && $val['vDataBaseFieldName'] == 'vMobileHeaderImage'){
                                                                $fileurl = $this->data['base_upload']."QRCode/MobileHeaderImage/".$qrcouponinfo['iQrID']."/".$qrcouponinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="hdeletebtndivid"><div style="float: left;"><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deleteqrcouponimage('.$qrcouponinfo['iQrID'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                                            if($qrcouponinfo[$val['vDataBaseFieldName']] != '' && $val['vDataBaseFieldName'] == 'vTabletHeaderImage'){
                                                                $fileurl = $this->data['base_upload']."QRCode/TabletHeaderImage/".$qrcouponinfo['iQrID']."/".$qrcouponinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="hdeletebtndivid"><div style="float: left;"><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deleteeventhimage('.$qrcouponinfo['iQrID'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }                                                           
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                              /* $html .= '<input  type="hidden" name="vOldImage" id="vOldImage" value="'.$qrcouponinfo['vMobileHeaderImage'].'">'; */    					
                                                break;
                                      
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input type="text" class="input-xlarge eventd" value="'.$qrcouponinfo[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']"  >
                                                </div>
                                            </div>';
                                            break;
                                       
                                        case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="'.$qrcouponinfo[$val['vDataBaseFieldName']].'" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'f'.$iQrID.'" >'.$qrcouponinfo[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                            break;   
                                        }
                                    }
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="updateqrcoupon('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>';
        
        
        echo $html;exit;
        
    }

     function update_qrcoupon()
     {
        $iQrID = $this->input->post('iQrID');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($data['eStatus'] == 'Active'){
                $data['eStatus'] = 'Inactive';
            }else{
                $data['eStatus'] = 'Inactive';
            }
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
		  
		 	$size=array();
            $size['width']=50;
            $size['height']=50;
		  
		  if($_FILES['vMobileHeaderImage']['name'] !=''){
                $eventfile = $_FILES['vMobileHeaderImage']['name'];
                $fileName = $this->do_upload_img($iQrID,'QRCode/MobileHeaderImage','vMobileHeaderImage',$size);
                if($fileName){
                    $data['vMobileHeaderImage'] = $fileName;    
                }
            }	
         
			//Header Image
          if($_FILES['vTabletHeaderImage']['name'] !=''){
                $eventfile = $_FILES['vTabletHeaderImage']['name'];
                $fileName1 = $this->do_upload_qrcouponheaderimage($iQrID,'QRCode/TabletHeaderImage','vTabletHeaderImage',$size);
                if($fileName1){
                    $data['vTabletHeaderImage'] = $fileName1;    
                }
            }		  
           $iQrID = $this->app_model->update_qrcoupon($data,$iQrID);
        }
        echo $iQrID;exit;
    }

		/** save blog details **/
		function save_blog()
		{
			/** ApplicationId **/
			$iApplicationId = $this->input->post('iApplicationId');
			$data = $this->input->post('data');
		
			if($this->input->post()){
			    if($iApplicationId !=''){
				$data['iApplicationId'] = $iApplicationId;
			    }
			    
			    $iBlogId = $this->app_model->save_blog($data);
			}
			echo $iBlogId;exit;	
		}

	 /** blog delete **/
	 function blog_delete()
	 {
		/** blog details **/
		$iBlogId = $this->input->get('iBlogId');
		$bloginfo = $this->app_model->getbloginfo($iBlogId);
				
		/** Blog details **/
		$iAppTabId = $bloginfo['iAppTabId'];
		$iFeatureId = $bloginfo['iFeatureId'];

	        $id = $this->app_model->delete_blog($iBlogId);
		$iApplicationId = $this->input->get('iApplicationId');
	        /* $iFeatureId = $this->input->get('iFeatureId');*/
		
		$html .= $this->get_all_blog_data($iApplicationId,$iAppTabId,$iFeatureId);         
		echo $html;exit;
	 }

	/** 	
		show edit blog details
 
		Description : showeditblogpopup
	**/
 	function showeditblogpopup()
	{
		/** Blog Details **/
		$iBlogId = $this->input->get('iBlogId');
		$iFeatureId = $this->input->get('iFeatureId');

		/** blog info details **/
		$bloginfo = $this->app_model->getbloginfo($iBlogId);
		#echo "<pre>";
       
	       	# print_r($pdfinfo);exit;
		$all_featurefields = $this->app_model->get_featurefields($iFeatureId);
		$iAppTabId = $bloginfo['iAppTabId'];
		$iApplicationId = $bloginfo['iApplicationId'];        
 
	 	$html .='<div id="blogformid'.$iAppTabId.'" class="main_popup" style="display:none;">
		    <div class="popup_header">
		        <h3>Edit Blog</h3>
		    </div>
		    <div class="popup-body">';        
                
		     $html .='<div id="editblog_validation'.$iAppTabId.'" style="display:none;"></div>';
            	     $html .='<div class="widget-body form">';
                     $html .='<form class="form-horizontal" name="frmblog" id="frmblog_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_blog" enctype="multipart/form-data">';
                     $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                     $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';

		    /** all_featurefields **/	
                    foreach ($all_featurefields as $val){		  		 
                        switch ($val['eType']) {
		                case 'Textxbox':
		                    $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
		                               $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
		                                <div class="controls">
		                                    <input type="text" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
		                                </div>
		                            </div>';
		                    break;
                        }
                    }
                    $html .='</form>';
                $html .='</div>';

		    $html .='</div>
		    <div class="popup-footer">
			<button type="button" class="btn btn-primary"  id="websitebtn" name="websitebtn" onclick="return submitblog('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
			<button aria-hidden="true" onclick="closeleanmodal('."'frmblog_$iAppTabId'".');" class="btn">Close</button>
		    </div>
		</div>';

		return $html;
    	}
   
   
	/** blog details **/
	function getbloghtml($iFeatureId,$iAppTabId)
	{
		/** get blog details **/
		$all_featurefields = $this->app_model->get_featurefields($iFeatureId,$iAppTabId);
		
		 $html .='<div id="blogformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add New Blog</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addblog_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmblog" id="frmblog_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_blog" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                             $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                            $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                            break;
                                        }
                                    }
                            $html .='</form>';
                        $html .='</div>';

		    $html .='</div>
		    <div class="popup-footer">
		        <button type="button" class="btn btn-primary"  id="websitebtn" name="websitebtn" onclick="return submitblog('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
		        <button aria-hidden="true" onclick="closeleanmodal('."'frmblog_$iAppTabId'".');" class="btn">Close</button>
		    </div>
		</div>';
		
	     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#blogformid'.$iAppTabId.'" id="addblogid"  style="float:right;">Add New Blog</a></div>';

		/** blog details **/
		$html .= $this->get_all_blog_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);           

		// return html
		return $html;
    	}

	/** app blog details **/
	function appwisebloglisting()
	{
		//echo 'aka';exit;
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
	 	$html .= $this->get_all_blog_data($iApplicationId,$iAppTabId,$iFeatureId);                        
		echo $html;exit;  
	}	

	// blog start
	function get_all_blog_data($iApplicationId,$iAppTabId,$iFeatureId)
	{
	 /** app wise websites **/
	 $allappblogs = $this->app_model->get_appwise_blogs($iApplicationId,$iAppTabId);
	
	  # echo '<pre>';print_r($allappwebsites);exit;
          $html .='<div id="blog_listing'.$iAppTabId.'" class="listing">
                    <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Blog Name</th>
                        <th>Blog Url</th>
                        <th colspan="2"><center>Action</center></th>
                    </tr>';
                    
                    if(count($allappblogs) > 0){
                        for($i=0;$i<count($allappblogs);$i++){
                            $k = $i+1; 
                       	    $html .='<tr class="row1a">';
			    $html .='<td width="30%">'.$allappblogs[$i]['vBlogTitle'].'</td>';
   			    $html .='<td width="30%">'.$allappblogs[$i]['vBlogUrl'].'</td>';
			    $html .='<td align="center" width="20%"><a class="apptab_edit"  onclick="return edit_blog('.$allappblogs[$i]["iBlogId"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                            <td align="center" width="20%"><a class="button grey" onclick="return delete_blog('.$allappblogs[$i]["iBlogId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                        </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Blog found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';

        return $html;
    }

    //Webiste Start
    function getwebsitehtml($iFeatureId,$iAppTabId){
    	
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId,$iAppTabId);
          #  echo '<pre>';print_r($all_featurefields);exit;
            $html .='<div id="websiteformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add New Website</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addwebsite_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmwebsite" id="frmwebsite_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_website" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                             $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                            		if($val['vDataBaseFieldName'] == 'vWebUrl')
                                           {
                                            $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                            <div style="color:red;position: absolute; margin-top:10px;">Ex: http://www.youtube.com</div>
                                                        </div>
                                                    </div>';
                                           }
                                           else
                                           {
                                              $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label" style="cursor:default;">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" title="Max 55 characters allowed" maxlength="55" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                 }
                                                break;
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio" value="" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        case 'File':
                                               $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'">
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
                                         case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">'.$val['vLabelName'].'</label>
                                                            <div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="" class="input-mini" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break; 
                                           case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                         case 'Status':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" onchange="return showhide_file(this.value);">
                                                            	<option value="" selected="selected">Select File Type</option>
                                                                <option value="Pdf File" >Pdf File</option>
                                                                <option value="Pdf Url">Pdf Url</option>
                                                            </select>
                                                        </div>
                                                    </div>';					
                                                break;
                                            
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';

            $html .='</div>
            <div class="popup-footer">
                <button type="button" class="btn btn-primary"  id="websitebtn" name="websitebtn" onclick="return submitwebsite('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                <button aria-hidden="true" onclick="closeleanmodal('."'frmwebsite_$iAppTabId'".');" class="btn">Close</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#websiteformid'.$iAppTabId.'" id="addpdfid"  style="float:right;">Add New Website</a></div>';
        

        $html .= $this->get_all_website_data($this->data['iApplicationId'],$iAppTabId,$iFeatureId);           
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }

    /*
     Purpose : To get title of website in proper manner(without disturb any other data) */

	 function get_all_website_data($iApplicationId,$iAppTabId,$iFeatureId)
	 {
	 
        $allappwebsites = $this->app_model->get_appwise_websites($iApplicationId,$iAppTabId);
		
      	# echo '<pre>';print_r($allappwebsites);exit;
        $html .='<div id="website_listing'.$iAppTabId.'" class="listing">
                    <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Thumbnail</th>
                        <th><center>Name</center></th>
                        <th colspan="2"><center>Action</center></th>

                    </tr>';
                    
                    if(count($allappwebsites) > 0){
                        for($i=0;$i<count($allappwebsites);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">';
			                          if($allappwebsites[$i]['vWebImage'] == ''){
			                          	$fileurl = $this->data['base_image']."noimg.png";
			                          	$html .='<td width="9%"><div style="float: left;"><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';

			                          }else{
			                          	$fileurl = $this->data['base_upload']."website/".$allappwebsites[$i]['iWebsiteId']."/".$allappwebsites[$i]['vWebImage'];
			                          	$html .='<td width="9%"><div style="float: left;" ><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';
			                          }
                                     
                                     $html .=  '<td width="30%"><p class="sp_title">'.$allappwebsites[$i]["vWebTitle"].'</p></td>';
                                     $html .='<td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_website('.$allappwebsites[$i]["iWebsiteId"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="7%"><a class="button grey" onclick="return delete_website('.$allappwebsites[$i]["iWebsiteId"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Website found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';

        return $html;

    }

    function appwisewebsitelisting(){
    	

    	//echo 'aka';exit;
        $iApplicationId = $this->input->get('iApplicationId');
        $iAppTabId = $this->input->get('iAppTabId');
        $iFeatureId = $this->input->get('iFeatureId');
       // echo  $iApplicationId ;exit;
 		$html .= $this->get_all_website_data($iApplicationId,$iAppTabId,$iFeatureId);                        
                    
        echo $html;exit;  
    }
   
    function save_website(){
        #echo "<pre>";
        #print_r($_FILES);exit;
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            if($data['eDonation']){
            	$data['eDonation'] = 'Yes';
            }else{
            	$data['eDonation'] = 'No';
            }
            $iWebsiteId = $this->app_model->save_website($data);
            $size=array();
            $size['width']=50;
            $size['height']=50;	 
            if($_FILES['vWebImage']['name'] !=''){
                $webimgfile = $_FILES['vWebImage']['name'];
                $fileName = $this->do_upload_img($iWebsiteId,'website','vWebImage',$size);
                if($fileName){
                    $data['vWebImage'] = $fileName;    
                }else{
                	$data['vWebImage'] = $webimgfile;
                }
                $iWebsiteId = $this->app_model->update_website($data,$iWebsiteId);
            }            
            #echo "<pre>";
            #print_r($_FILES);exit;

        }
        echo $iWebsiteId;exit;
    } 
   	/*modify by maskdukhan
   	Description :- website delete and listing tab wise.*/
    function website_delete(){
        $iWebsiteId = $this->input->get('iWebsiteId');
        $websiteinfo = $this->app_model->getwebsiteinfo($iWebsiteId);
        $iAppTabId = $websiteinfo['iAppTabId'];
        $iFeatureId = $websiteinfo['iFeatureId'];

        if($iWebsiteId !=''){
            if(is_dir('uploads/website/'.$iWebsiteId)){
               $this->rm_folder_recursively('uploads/website/'.$iWebsiteId);
            }       
            $id = $this->app_model->delete_website($iWebsiteId);
        }
      	$iApplicationId = $this->input->get('iApplicationId');
       /* $iFeatureId = $this->input->get('iFeatureId');*/
        
        $html .= $this->get_all_website_data($iApplicationId,$iAppTabId,$iFeatureId);         
                    
        echo $html;exit;
    }

	

    function showeditwebsitepopup(){
    	

        $iWebsiteId = $this->input->get('iWebsiteId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $websiteinfo = $this->app_model->getwebsiteinfo($iWebsiteId);
        #echo "<pre>";
       
       # print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $iAppTabId = $websiteinfo['iAppTabId'];
        $iApplicationId = $websiteinfo['iApplicationId'];        
         
        if(count($websiteinfo) == 0)
        {
        	exit;
        }
		
        	#print_r($all_featurefields[1]['vDataBaseFieldName']);exit;
            $html .='<div id="websiteformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Website</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editwebsite_validation'.$iAppTabId.'" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmwebsite" id="updatefrmwebsite_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_website" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
                            $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                            $html .= '<input  type="hidden" name="iWebsiteId" value="'.$iWebsiteId.'">';
                           
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                      				if($val['vDataBaseFieldName'] == 'vWebUrl')
                                           {
                                            $html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" value="'.$websiteinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                         <div style="color:red;position: absolute; margin-top:10px;">Ex: http://www.youtube.com</div>
                                                        </div>
                                                    </div>';
                                           }
                                           else
                                           {
                                            $html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" maxlength="55" title="max 55 characters allowed." value="'.$websiteinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                           }
                                          
                                                break;
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">';
                                                            if($websiteinfo[$val['vDataBaseFieldName']] == 'Yes'){
																$html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" checked="checked">';
                                                            }else{
																$html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" >';
                                                            }
                                                            $html .='</label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio" value="" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        case 'File':
                                        			$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                        $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file" value="'.$websiteinfo[$val['vDataBaseFieldName']].'" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" style="float: left;">';
                                                            
                                                            if($websiteinfo[$val['vDataBaseFieldName']] != ''){
                                                                $fileurl = $this->data['base_upload']."website/".$websiteinfo['iWebsiteId']."/".$websiteinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="detetewebsitefile"><div style="float: left;"><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deletewebsitefile('.$websiteinfo['iWebsiteId'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                               $html .= '<input  type="hidden" name="vOldFile" id="vOldFileweb" value="'.$websiteinfo[$val['vDataBaseFieldName']].'">';   
                                                break;
                                               #$html .='<div class="control-group">
                                                     #   <label class="control-label">'.$val['vLabelName'].'</label>
                                                     #   <div class="controls">
                                                      #      <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'e" >
                                                     #   </div>

                                                   # </div>';					
                                               # break;
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
                                        case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">'.$val['vLabelName'].'</label>
                                                            <div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="" class="input-mini" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break; 
                                         case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                            
                                        }
                                        
                                    }
                                
                            $html .='</form>';
                        $html .='</div>';
       
            $html .='</div>
            <div class="popup-footer">
                       <button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return updatewebsite('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
        
        echo $html;exit;
    }


   function update_website(){   		
        
        $iWebsiteId = $this->input->post('iWebsiteId');
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){

            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            if($data['eDonation']){
            	$data['eDonation'] = 'Yes';
            }else{
            	$data['eDonation'] = 'No';
            }

            $size=array();
            $size['width']=50;
            $size['height']=50;	 
            if($_FILES['vWebImage']['name'] !=''){
                $webimgfile = $_FILES['vWebImage']['name'];
                $fileName = $this->do_upload_img($iWebsiteId,'website','vWebImage',$size);
				
                if($fileName){
                    $data['vWebImage'] = $fileName;    
                }else{
                	$data['vWebImage'] = $webimgfile;
                }
                $iWebsiteId = $this->app_model->update_website($data,$iWebsiteId);
            }            

		  //  echo '<pre>';print_r($data);exit;
            $iWebsiteId = $this->app_model->update_website($data,$iWebsiteId);
        }
        echo $iWebsiteId;exit;
    }

    function deletewebsitefile(){
    	

	   $iWebsiteId=$this->input->get('iWebsiteId');
	   $websiteinfo=$this->app_model->getwebsiteinfo($iWebsiteId);   
	   $var=unlink($this->data['base_path'].'uploads/website/'.$iWebsiteId.'/'.$websiteinfo['vWebImage']);
	   $websiteinfo['vWebImage'] = "";
	   $deleteFile=$this->app_model->update_website($websiteinfo,$iWebsiteId);
	   if($deleteFile){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    }

//Voice Recording

    function getvoicerecordhtml($iFeatureId,$iAppTabId){
    	
        $appwise_voicerecordtabdata = $this->app_model->get_appwise_voicerecordtabdata($this->data['iApplicationId'],$iAppTabId);
        
        #echo "<pre>";
        #print_r($appwise_infotabdata);exit;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $html .='<div id="voicerecord_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frmvoicerecordtab" id="frmvoicerecordtab_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_voicerecordtabdata" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    <input class="span6" type="hidden" name="data[iVoiceRecordingId]" value="'.$appwise_voicerecordtabdata['iVoiceRecordingId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';

                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_voicerecordtabdata[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'in'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" >'.$appwise_voicerecordtabdata[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                          case 'Status':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'">
                                                                <option value="Active" >Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>';					
                                                break;
                                           case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" >'.$appwise_voicerecordtabdata[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                                                                            
                                        }
                                    }

                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="voicerecordbtn" name="voicerecordbtn" onclick="voicerecordtab_validation('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
                            </div>';
                            
                        $html .='</div>
                    </div>    
                </form>';
                
        return $html;
    }

    function save_voicerecordtabdata(){
    	

        $data = $this->input->post('data');
        $iApplicationId = $data['iApplicationId'];
        if($this->input->post()){
            if($data['iVoiceRecordingId']){
				$iVoiceRecordingId = $data['iVoiceRecordingId'];
				$iVoiceRecordingId = $this->app_model->update_voicerecord($data,$iVoiceRecordingId);

            }else{
				$iVoiceRecordingId = $this->app_model->save_voicerecord($data);

            }
        }
         redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId);
    }

//Podcast Tab

    function getpodcasthtml($iFeatureId,$iAppTabId){
        

        $appwise_podcast = $this->app_model->get_appwise_podcasttabdata($this->data['iApplicationId'],$iAppTabId);
        
        $this->data['appwise_podcast'] = $appwise_podcast;

        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId,$iAppTabId);
        $html .='<div id="podcast_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frmpodcast" id="frmpodcast_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_podcast" class="form-horizontal" enctype="multipart/form-data">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    <input class="span6" type="hidden" name="data[iPodcastId]" value="'.$appwise_podcast['iPodcastId'].'">
                    <div class="lean-body">
                        <div class="widget-body form">';
                            
                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_podcast[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'File':
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e" name="'.$val['vDataBaseFieldName'].'" style="float: left;" onchange="CheckValidWebsiteImg(this.value,this.name)">';
                                                            
                                                            if($appwise_podcast[$val['vDataBaseFieldName']] != ''){
                                                                $fileurl = $this->data['base_upload']."podcast/".$appwise_podcast['iPodcastId']."/".$appwise_podcast[$val['vDataBaseFieldName']];
												    $html .='<div id="podcastimagediv">';
                                                                $html .='<div style="float: left;" ><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="return deletpodcastimage('.$appwise_podcast['iPodcastId'].');"  class="btn btn-primary" type="button">Delete</button></div>';
												    $html .='</div>';
                                                            }
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                                    					
                                                break;                                            
                                        }
                                        
                                    }
                            
                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="podcastbtn" name="podcastbtn" onclick="podcast_validation('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
                            </div>';
                            
                        $html .='</div>
                    </div>    
                </form>';
                
        return $html;
    }

    function save_podcast(){
    	

        if($this->input->post()){
            $podcast = $this->input->post('data');
          # echo '<pre>';print_r($podcast);exit;
            if($podcast['iPodcastId']){
                $iPodcastId = $this->app_model->update_podcast($podcast,$podcast['iPodcastId']);
                $iPodcastId = $podcast['iPodcastId'];
            }else{
                $iPodcastId = $this->app_model->save('r_app_podcast_values',$podcast);
                
            }

            $size=array();
            $size['width']=50;
            $size['height']=50;	 
            
            if($_FILES['vPodcastIcon']['name'] !=''){
                $rssfile = $_FILES['vPodcastIcon']['name'];
                $fileName = $this->do_upload_img($iPodcastId,'podcast','vPodcastIcon',$size);
                if($fileName){
                    $data['vPodcastIcon'] = $fileName;    
                }
                $iPodcastId = $this->app_model->update_podcast($data,$iPodcastId);
            }
            if($iPodcastId != '' || $iPodcastId != ''){
                redirect($this->data['base_url'] . 'app/step3/'.$podcast['iApplicationId']);
            }
            
        }
    }

    function deletepodcastIcon(){
    	

    	$iPodcastId = $this->input->get('iPodcastId');

    	$data = $this->app_model->get_podcast_by_id($iPodcastId);
		$var = unlink($this->data['base_upload'].'podcast/'.$iPodcastId.'/'.$data['vPodcastIcon']);
		
		$data1['vPodcastIcon'] = "";
		$deleteFile = $this->app_model->update_podcast($data1,$iPodcastId);
	   if($deleteFile){
		  echo "delete";
	   }else{
		  echo "No";
	   }

    }
///Save Slider Image By Applictaion

function save_slider_img_by_app(){
		

	$data = $this->input->get('data');

	$exist_info =  $this->app_model->get_one_app_slideimg($data['iApplicationId']);
	if($exist_info){
		$this->app_model->update_slide_img($data,$exist_info['iAppSliderImgId']);
		echo 'update';exit;
	}else{
		$this->app_model->save('r_app_slider_img_value',$data);
		echo 'save';exit;
	}
	 
}

//Assign Template to Application
function assign_temp(){
	

	$templat_id = $this->input->get('tmpl');
	$iApplicationId = $this->uri->segment(3);
	$this->data['iApplicationId'] = $iApplicationId;
	$defaultappdesignInfo = $this->app_model->get_default_designInfo($templat_id);
	$defaultappdesignInfo['iApplicationId'] = $iApplicationId;
	unset($defaultappdesignInfo['vImage']);
	unset($defaultappdesignInfo['eType']);
	unset($defaultappdesignInfo['eStatus']);
	
	 $checkappdesign_info = $this->app_model->checkappdesign_info($iApplicationId);


	 if($checkappdesign_info){
	 	$iAppDesignInfoId = $this->app_model->updateappdesign_info($iApplicationId,$defaultappdesignInfo);
	}else{
		$iAppDesignInfoId = $this->app_model->save('r_app_design_ifo',$defaultappdesignInfo);
	}

	redirect($this->data['base_url'] . 'app/step4/'.$this->data['iApplicationId']);

}


function getnotepadhtml($iFeatureId,$iAppTabId)
{
	$html .= '<link rel="stylesheet" href="'.$this->data["base_assets"].'notepad/notpad_app.css" type="text/css" />
				<script src="'.$this->data["base_assets"].'/notepad/notpad_app.plugin.js"></script>
				<script src="'.$this->data["base_assets"].'/notepad/notpad_app.data.js"></script>  
				<script src="'.$this->data["base_assets"].'/notepad/notpad_underscore-min.js"></script>
				<script src="'.$this->data["base_assets"].'/notepad/notpad_backbone-min.js"></script>
				<script src="'.$this->data["base_assets"].'/notepad/notpad_backbone.localStorage-min.js"></script>  
				<script src="'.$this->data["base_assets"].'/notepad/notpad_moment.min.js"></script>
				<script src="'.$this->data["base_assets"].'/notepad/notpad_notes.js"></script>';
				
    $html .= '<section class="hbox stretch">
    	<section id="content">
        <section class="hbox stretch" id="noteapp">
        <aside>
          <section class="vbox">
            <header class="header bg-light lter bg-gradient b-b">
              <button class="btn btn-success pull-right btn-sm" id="new-note"><i class="icon-plus"></i> NEW</button>
              <p>Notes</p>
            </header>
            <section class="bg-light lter">
              <section class="hbox stretch">
                <aside>
                  <section class="vbox b-b">
                    <section class="paper" id="note-detail">
                
                      <script type="text/template" id="note-template">
                        <textarea type="text" class="form-control scrollable" placeholder="Type your note here"><%- description %></textarea>
                      </script>
                
                    </section>
                  </section>
                </aside>
                
              </section>
            </section>
          </section>
        </aside>
        <aside class="aside-lg bg-light lter b-l" id="note-list">
          <section class="vbox">
            <header class="header bg-light lter bg-gradient clearfix b-b">
              <div class="input-group m-t-sm">
                <span class="input-group-addon input-sm" style="float: right;margin: 8px 0 0;"><i class="icon-search"></i></span>
                <input type="text" class="form-control input-sm" id="search-note" placeholder="search" style="width:180px;">
              </div>
            </header>
            <section class="scrollable">
              <div class="wrapper">
                <ul id="note-items" class="list-group"></ul>
                  <script type="text/template" id="item-template">
                    <div class="view" id="note-<%- id %>">
                      <button class="destroy close hover-action">&times;</button>
                      <div class="note-name">
                        <strong>
                        <%- (name && name.length) ? name : "New note" %>
                        </strong>
                      </div>
                      <div class="note-desc">
                        <%- description.replace(name,"").length ? description.replace(name,"") : "empty note" %>
                      </div>
                      <span class="text-xs text-muted"><%- moment(parseInt(date)).format("MMM Do, h:mm a") %></span>
                    </div>
                  </script>
              </div>
            </section>
          </section>          
        </aside>
      </section>
    </section>
  </section>';
  
  return $html;
}

function replaceAll($text) { 
	

    $text = strtolower(htmlentities($text)); 
    $text = str_replace(get_html_translation_table(), "-", $text);
    $text = str_replace(" ", "-", $text);
    $text = preg_replace("/[-]+/i", "-", $text);
    return $text;
}


function getfeepaymenthtml($iFeatureId,$iAppTabId){
	

	//echo '<pre>';print_r($this->data);exit;
	$application_info = $this->app_model->appinformation_by_id($this->data['iApplicationId']);
	$iClientId =  $application_info['iClientId'];
	$exist_feetype_info = $this->app_model->get_all_feetype_value_by_app($this->data['iApplicationId'],$iAppTabId);
	$exist_feetype =  array();
	foreach ($exist_feetype_info as $key => $value) {
		array_push($exist_feetype, $value['vFeetype']);
	}
	//echo $iClientId;exit;
	$all_fee_type = $this->app_model->get_fee_details($iClientId);
	$all_featurefields = $this->app_model->get_featurefields($iFeatureId);
	$html .='<div id="addfeepayment_validation'.$iAppTabId.'" style="display:none;"></div>';
	$html .='<form name="frmfeepayment" id="frmfeepayment_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_feepayment" enctype="multipart/form-data" class="form-horizontal">
	            <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
	            <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
	            <input class="span6" type="hidden" name="data[iClientId]" value="'.$iClientId.'" id="">
	                <div class="lean-body">
	                    <div class="widget-body form" >';
	                    	$html .='<h4>Fee Types</h4><hr><div class="control-group">
	                                    <div class="controls" style="margin-left: 0px;" id="feetype">';
                            			if($all_fee_type) {
	                                    $html .= '<table class="table table-striped table-hover table-bordered">
	                                    	<tr class="nodrop">
		                                    	<th></th>
		                                    	<th>Fee Type</th>
		                                    	<th>Price</th>
	                                    	</tr>';

	                                    	foreach ($all_fee_type as $key => $value) {
	                                    		if(in_array($value['vFeetype'], $exist_feetype, TRUE)){
		                                    	$html .= '<tr>
		                                    		<td><input type="checkbox" class="fee_type" name="feedetails['.$value['iFeetypeId'].']" value="'.$value['fPrice'].'" checked></td>
			                                    	<td>'.$value['vFeetype'].'</td>
			                                    	<td>GBP '.$value['fPrice'].'</td>
		                                    	</tr>';

		                                    }else{

		                                    	$html .= '<tr>
		                                    		<td><input type="checkbox" class="fee_type" name="feedetails['.$value['iFeetypeId'].']" value="'.$value['fPrice'].'" ></td>
			                                    	<td>'.$value['vFeetype'].'</td>
			                                    	<td>GBP '.$value['fPrice'].'</td>
		                                    	</tr>';

		                                    }
                                    		}
                            			}else{
                            				$html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No FeeType found.</td></tr>';
                            			}

	                                    $html .= '</table>';



	                                    /*foreach ($all_fee_type as $key => $value) {
	                                        $html .= '<label class="checkbox">
	                                            <input type="checkbox" value="on"  id="'.$value['vName'].$iAppTabId.'" name="selected_fee[fee]['.$value['iFeetypeId'].']">'.$value['vName'].' ('.$value['fPrice'].'GBP)
	                                        </label>';
	                                    }*/




	                                $html .= '</div>
	                                </div>';
/*	                              $html .=  '<div id="total_amount"></div>';					
*//*                            foreach ($all_featurefields as $val){		  		 
                    			if($val['vLabelName'] == 'First Name'){
                    				 $html .= '<h4>Contact Information</h4><hr>';
                    			}
                    			if($val['vLabelName'] == 'Credit Card Type'){
                    				 $html .= '<h4>Payment Information</h4><hr>';
                    			}
                                switch ($val['eType']) {
                                case 'Textxbox':
                                            $html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input type="text" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                </div>
                                            </div>';
                                        break;
                                case 'Checkbox':
                                    $html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <label class="checkbox">
                                                        <input type="checkbox" value="on"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
                                                    </label>
                                                </div>
                                            </div>';
                                     break;
                                case 'Radio':
                                     $html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <label class="radio">
                                                        <input type="radio" value="" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']">
                                                    </label>
                                                </div>
                                            </div>';
                                     break;			
                                case 'File':
                                       $html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" >
                                                </div>
                                            </div>';					
                                        break;
                                case 'Textarea':
                                	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <textarea value="" class="input-xlarge" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" cols="" rows=""></textarea>
                                                </div>
                                            </div>';					
                                        break;
                                case 'Date':
                                	$html .='<div class="control-group">
                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                        <div class="controls">
                                            <input value="" class="input-xlarge eventd" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                        </div>
                                    </div>';
                                    break;
                                 case 'Time Textbox':
                                        $html .='<div class="control-group">
                                                    <label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">
                                                        <div class="input-append bootstrap-timepicker">
                                                            <input type="text" value="" class="input-mini eventtime" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                        </div>
                                                    </div>	
                                                </div>';
                                    break; 
                                   case 'Editor':
                                	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" ></textarea>
                                                </div>
                                            </div>';					
                                        break;
                                    case 'SelectBox':
                                	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].$iAppTabId.'">
                                                    	<option value="">Select '.$val['vLabelName'].'</option>';
                                                		if ($val['vLabelName'] == 'Year'){
                                                			$html .= $this->yearDropdown(1900,2050);
                                                		}
                                                		if ($val['vLabelName'] == 'Month'){
                                                			$html .= $this->monthDropdown();
                                                		}
                                                		if ($val['vLabelName'] == 'Credit Card Type'){
                                                			$html .= '<option value="visa">Visa</option><option value="master">Master Card</option><option value="credit">Credit Card</option>';
                                                		}
                                           $html .='</select>
                                                </div>
                                            </div>';					
                                        break;
                                }
                                
                            }
*/	                        
	                        if($all_fee_type) {
	                        $html .='<div class="row_form" style="margin-left: 0px;">
	                            <label class="checklabel">&nbsp;</label>
	                            <button type="button" class="btn btn-primary"   id="feepaymentbtn" name="feepaymentbtn" onclick="feepayment_validation('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
	                        </div>';
	                    	}
	                        
	                        
	                    $html .='</div>
	                </div>
	        </form>';
	        return $html;


}

function save_feepayment(){
	

	$payment  = $this->input->post('data');
	//echo '<pre>';print_r($payment);exit;

	$selected_feedstails  = $this->input->post('feedetails');
	if($payment){
		$iDeleteId = $this->app_model->delete_app_feetype_value($payment['iApplicationId']);
		//$iAppFeeTypeId = $this->app_model->save('r_app_feetype_value',$payment);
		//if($iAppFeeTypeId){
			foreach ($selected_feedstails as $key => $value) {
				$feesetails = $this->app_model->get_one_fee_details($key);
				//echo '<pre>';print_r($feesetails);exit;
				$slb_app_fee_payment_detail = array();
				//$slb_app_fee_payment_detail['iAppFeeTypeId'] = $iAppFeeTypeId;
				$slb_app_fee_payment_detail['iClientId'] = $payment['iClientId'];
				$slb_app_fee_payment_detail['iApplicationId'] = $payment['iApplicationId'];
				$slb_app_fee_payment_detail['iAppTabId'] = $payment['iAppTabId'];
				$slb_app_fee_payment_detail['vFeetype'] = $feesetails['vFeetype'];
				$slb_app_fee_payment_detail['fPrice'] = $feesetails['fPrice'];
				//echo '<pre>';print_r($slb_app_fee_payment_detail);exit;
				$iAppFeeTypeId 	 = $this->app_model->save('r_app_feetype_value',$slb_app_fee_payment_detail);
			}
		//}
	}
	redirect($this->data['base_url'] . 'app/step3/'.$payment['iApplicationId']);
	//echo '<pre>';print_r($data);exit;
}

// get all opening time

	function getallopeningtimehtml()
	{
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
		
		$appwise_hometabdata = $this->app_model->get_appwise_hometabdata($iApplicationId,$iAppTabId);
		$openingtimedetails = $this->app_model->get_appwise_openingtimedetails($iApplicationId,$iAppTabId);
		
		$html.='<div id="backopening'.$iAppTabId.'" class="main_popup" style="display:none;"></div>';
		$html.='<div class="popup-body">';
		$html.='<div id="addevent_validation'.$iAppTabId.'" style="display:none;"></div>';
		$html.='<div class="popup_header"><h3>Set Opening Times</h3></div>';
		$html.='<br><div class="add_btn"><a class="btn btn-primary"  href="#addopeningtime'.$iAppTabId.'" id="addopeningtime"  style="float:right;margin:0px 14px 0px 5px;">Add Opening Time</a></div>';
		
		$html.='<br><div class="category_tbl">
					<table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
					<tr class="nodrop">
						<th>Day</th>
						<th>Open From</th>
						<th>Open To</th>
						<th colspan="2">Action</th>
					</tr>';
		
			// List of Opening Time Details
			foreach($openingtimedetails as $val){
				$html.='<tr class="nodrop">';
				$html.='<td>'.$val['vDay'].'</td>';
				$html.='<td>'.$val['vOpenfrom'].'</td>';
				$html.='<td>'.$val['vOpento'].'</td>';
				$html.='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_openingtime('.$val['iOpeningId'].','.$iAppTabId.','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
					<td align="center" width="13%"><a class="button grey" onclick="delete_openingtime('.$val['iOpeningId'].','.$iAppTabId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
				$html.='</tr>';
			}
			
		$html.='</table>';
		$html.='</div>';
		
		$html.='<div id="addopeningtime'.$iAppTabId.'" class="main_popup" style="display:none;">
				<div class="popup_header">
					<h3>Add Opening Times</h3>
				</div>
				<div class="popup-body">';
				$html .='<div id="addevent_validation'.$iAppTabId.'" style="display:none;"></div>';
				/** Form for add opening time **/
				$html.='<form name="frmhomeopen" id="frmhomeopen_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_addopeningtime" class="form-horizontal">';
				$html.='<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'">
				<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
				<input class="span6" type="hidden" name="iFeatureId" id="iFeatureId" value="'.$iFeatureId.'">
				<input class="span6" type="hidden" name="data[iHometabId]" value="'.$appwise_hometabdata['iHometabId'].'">';
				$html.='<center>
							<div class="control-group">
								<label class="control-label">Day :</label>
								<div class="controls">
									<select name="data[vDay]" id="data[vDay]">
										<option value="">--select Day--</option>
										<option value="Sunday">Sunday</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
									</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Open From :</label>
								<div class="controls">
									<div class="input-append bootstrap-timepicker">
									<input type="text" value="" class="input-mini eventtime" id="data[vOpenfrom]" name="data[vOpenfrom]" style="width:188px;"><span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Open To :</label>
								<div class="controls">
								<div class="input-append bootstrap-timepicker">
									<input type="text" value="" class="input-mini eventtime" id="data[vOpento]" name="data[vOpento]" style="width:188px;"><span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
							</div>
							
							<div class="row_form">
								<label class="checklabel">&nbsp;</label>
								<button type="button" class="btn btn-primary" id="homeopenbtn" name="homeopenbtn" onclick="hometabopen_validation('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok">Save</i></button>
							</div>
						</form>
						</center>
					</div>
					<div class="popup-footer">
						<button aria-hidden="true" onclick="closeleanmodal1();" class="btn">Close</button>
					</div>
				</div>
				</div>
				<div class="popup-footer">
					<button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
				</div>
				</div>';
		$html.='</div><script>$(".eventtime").timepicker();</script>';		
				
		echo  $html;
	}
	
	/** openingtime **/
	function geteditopeningtimehtml()
	{
		$iFeatureId = $this->input->get('iFeatureId');
		$iOpeningId = $this->input->get('iOpeningId');
		$iAppTabId = $this->input->get('iAppTabId');
		
		$edit_data = $this->app_model->get_edit_opening_values($iOpeningId);
		
		$html.='<div id="addopeningtimeedit'.$iAppTabId.'" class="main_popup">';
		$html.='<div class="popup_header">
					<h3>Edit Opening Times</h3>
				</div>';
		$html.='<div class="popup-body">';
		$html.='<div id="addevent_validation'.$iAppTabId.'" style="display:none;"></div>';
		
		/** Form for add opening time **/
		$html.='<center>
				<form name="frmhomeopenedit" id="frmhomeopenedit_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_addopeningtime" class="form-horizontal">';
		$html.='<input class="span6" type="hidden" name="data[iOpeningId]" id="data[iOpeningId]" value="'.$iOpeningId.'">';
		
		$html.='<div class="control-group">
							<label class="control-label">Day :</label>
							
							<div class="controls">
								<select name="data[vDay]" id="vDay">
									<option value="">--select Day--</option>
									<option value="Sunday"';
									$html.=$edit_data['vDay']=='Sunday'?"Selected":"";
									$html.='>Sunday</option>
									<option value="Monday"';
									$html.=$edit_data['vDay']=='Monday'?"Selected":"";
									$html.='>Monday</option>
									<option value="Tuesday"';
									$html.=$edit_data['vDay']=='Tuesday'?"Selected":"";
									$html.='>Tuesday</option>
									<option value="Wednesday"';
									$html.=$edit_data['vDay']=='Wednesday'?"Selected":"";
									$html.='>Wednesday</option>
									<option value="Thursday"';
									$html.=$edit_data['vDay']=='Thursday'?"Selected":"";
									$html.='>Thursday</option>
									<option value="Friday"';
									$html.=$edit_data['vDay']=='Friday'?"Selected":"";
									$html.='>Friday</option>
									<option value="Saturday"';
									$html.=$edit_data['vDay']=='Saturday'?"Selected":"";
									$html.='>Saturday</option>
								</select>
							</div>
						</div>


						
						<div class="control-group">
							<label class="control-label">Open From :</label>
							<div class="controls">
							<div class="input-append bootstrap-timepicker">
							<input type="text" class="input-mini eventtime" id="vOpenfrom" name="data[vOpenfrom]" style="width:188px;" value="'.$edit_data['vOpenfrom'].'"><span class="add-on"><i class="icon-time"></i></span>
							</div></div>
						</div>

						<div class="control-group">
							<label class="control-label">Open To :</label>
							<div class="controls">
							<div class="input-append bootstrap-timepicker">
							<input type="text" class="input-mini eventtime" id="vOpento" name="data[vOpento]" style="width:188px;" value="'.$edit_data['vOpento'].'"><span class="add-on"><i class="icon-time"></i></span>
							</div></div>
						</div>

					
						<div class="row_form">
							<label class="checklabel">&nbsp;</label>
							<button type="button" class="btn btn-primary" id="homeopenbtnedit" name="homeopenbtn" onclick="hometabopen_editvalidation('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok">Edit</i></button>
						</div>

				</div>		
				</form></center>';
				
		$html.='</div></div>';	
		$html.='<script>$(".eventtime").timepicker();</script>';
		
		echo $html;
	}

// delete opening time details
	
	function openingtime_delete()
	{
		// openingtime delete 
		$iOpeningId = $this->input->get('iOpeningId');
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
		
		$deleteId = $this->app_model->delete_opening_time($iOpeningId);
		$html .= $this->getallopeningtimehtml($iAppTabId,$iApplicationId);
		echo $html;exit;
	}


	function gethometabhtml($iFeatureId,$iAppTabId)
	{
		$iFeatureId = $iFeatureId;
		$appwise_hometabdata = $this->app_model->get_appwise_hometabdata($this->data['iApplicationId'],$iAppTabId);
		#echo "<pre>";
		#print_r($appwise_infotabdata);exit;
		$all_featurefields = $this->app_model->get_featurefields($iFeatureId);

		/** session language **/
		$lang= $this->session->userdata('language');
		$home_language = $this->admin_model->get_language_details($lang);
	
		$html='';
		// popup button
		/*$html .='<div class="add_btn"><a class="btn btn-primary"  href="#setopeningtime'.$iAppTabId.'" id="showopeningtime"  style="float:left;" onclick="open_ckeditor('.$iAppTabId.');">Set Opening Times</a></div>';*/

		// popup body of set opening times
		$openingtimedetails = $this->app_model->get_appwise_openingtimedetails($this->data['iApplicationId'],$iAppTabId);
		$html.='<div id="setopeningtime'.$iAppTabId.'" class="main_popup" style="display:none;">';
		$html.='<div class="popup_header">
					<h3>Set Opening Times</h3>
				</div>';
					
		$html .='<div class="popup-body">';
		$html .='<div id="addhome_validation'.$iAppTabId.'" style="display:none;"></div>';
		$html .='<br><div class="add_btn"><a class="btn btn-primary"  href="#addopeningtime'.$iAppTabId.'" id="addopeningtime"  style="float:right;margin:0px 14px 0px 5px;">Add Opening Time</a></div>';
	
		$html .='<br><div class="category_tbl">
				<table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
				<tr class="nodrop">
					<th>Day</th>
					<th>Open From</th>
					<th>Open To</th>
					<th colspan="2"><center>Action</center></th>
				</tr>';
				
		// List of Opening Time Details
		foreach($openingtimedetails as $val)
		{
			$html.='<tr class="nodrop">';
			$html.='<td>'.$val['vDay'].'</td>';
			$html.='<td>'.$val['vOpenfrom'].'</td>';
			$html.='<td>'.$val['vOpento'].'</td>';
			$html.='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_openingtime('.$val['iOpeningId'].','.$iAppTabId.','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
					<td align="center" width="13%"><a class="button grey" onclick="delete_openingtime('.$val['iOpeningId'].','.$iAppTabId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
			$html.='</tr>';

		}
				
		$html.='</table></div>';

				$html.='<div id="addopeningtime'.$iAppTabId.'" class="main_popup" style="display:none;">
						<div class="popup_header">
							<h3>Add Opening Times</h3>
						</div>
						<div class="popup-body">';
						// validation div
						$html .='<div id="addopening_validation'.$iAppTabId.'" style="display:none;"></div>';
						/** Form for add opening time **/
						$html.='<form name="frmhomeopen" id="frmhomeopen_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_addopeningtime" class="form-horizontal">';
						$html.='<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
						<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
						<input class="span6" type="hidden" name="iFeatureId" id="iFeatureId" value="'.$iFeatureId.'">
						<input class="span6" type="hidden" name="data[iHometabId]" value="'.$appwise_hometabdata['iHometabId'].'">';
						$html.='<center>
									<div class="control-group">
										<label class="control-label">Day :</label>
										<div class="controls">
											<select name="data[vDay]" id="data[vDay]">
												<option value="">--select Day--</option>
												<option value="Sunday">Sunday</option>
												<option value="Monday">Monday</option>
												<option value="Tuesday">Tuesday</option>
												<option value="Wednesday">Wednesday</option>
												<option value="Thursday">Thursday</option>
												<option value="Friday">Friday</option>
												<option value="Saturday">Saturday</option>

											</select>
										</div>

									</div>
									
									<div class="control-group">
										<label class="control-label">Open From :</label>
										<div class="controls">
										<div class="input-append bootstrap-timepicker">
											<input type="text" value="" class="input-mini eventtime" id="data[vOpenfrom]" name="data[vOpenfrom]" style="width:188px;"><span class="add-on"><i class="icon-time"></i></span>

										</div>
										</div>

									</div>
									
									<div class="control-group">
										<label class="control-label">Open To :</label>

										<div class="controls">
										<div class="input-append bootstrap-timepicker">
											<input type="text" value="" class="input-mini eventtime" id="data[vOpento]" name="data[vOpento]" style="width:188px;"><span class="add-on"><i class="icon-time"></i></span>
										</div></div>



									</div>
									
									<div class="row_form">
										<label class="checklabel">&nbsp;</label>
										<button type="button" class="btn btn-primary" id="homeopenbtn" name="homeopenbtn" onclick="hometabopen_validation('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok">Save</i></button>
									</div>
								</form>
								</center>
							</div>
							<div class="popup-footer">
								<button aria-hidden="true" onclick="closeleanmodal1();" class="btn">Close</button>

							</div>
						</div>
					</div>
			<div class="popup-footer">
				<button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
			</div>
		</div>';
		// end popup body

		
		// get home page details
		$home_page_details = $this->app_model->get_homepage_details($this->data['iApplicationId'],$iAppTabId,$appwise_hometabdata['iHometabId']);
		
		// r country details
		$r_country = $this->app_model->get_country_details();
		
		$html.='<div style="padding: 5px; border: 1px solid rgb(0, 0, 0);">';
		$html.='<form name="frmhometab" id="frmhometab_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_hometabdata" class="form-horizontal" enctype="multipart/form-data">';

		$html.='<div id="hometab_validation'.$iAppTabId.'" style="display:none;"></div>';

		$html.='<input type="hidden" id="language" name="language" value="'.$lang.'" />';
		$html.='<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
			<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
			<input class="span6" type="hidden" name="data[iHometabId]" value="'.$appwise_hometabdata['iHometabId'].'">';
			$html.='<div class="lean-body">
					<div class="widget-body form">';
					
					foreach($all_featurefields as $val){
							switch ($val['eType']){
								case 'Editor':
								$html.='<div class="control-group">
								<label class="control-label title">'.$val['vLabelName'].' :<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Description about your businees </span></a></label>
								<div class="controls">';
								$html.='<textarea class="input-xlarge ckeditor" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" >'.$home_page_details[0][$val['vDataBaseFieldName']].'</textarea>';	
								$html.='</div>
								</div>';	
								break;
								
								case 'Textxbox':
									$html.='<div class="control-group">
										<label class="control-label '.$val['vLabelName'].'">'.$val['vLabelName'].' :</label>';
										if($val['vDataBaseFieldName'] == 'vTelephone'){
											$html.='<div class="controls">
													<input type="text" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" value="'.$home_page_details[0][$val['vDataBaseFieldName']].'" class="input-xlarge"/>
											</div>';
										}else{
											$html.='<div class="controls">
													  <input type="text" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" value="'.$home_page_details[0][$val['vDataBaseFieldName']].'" class="input-xlarge" maxlength="50"/>
												</div>';
										}
										$html.='</div>';
									break;
								
								case 'File':
									$html.='<div class="control-group">
										<label class="control-label '.$val['vLabelName'].'">'.$val['vLabelName'].' :<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;(200px * 200px) </span></a></label>
										<div class="controls">
												<input type="file" name="'.$val['vDataBaseFieldName'].'" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" onchange="readURL(this);" title="'.$home_page_details[0]['vImage'].'" />';
									if($home_page_details[0][$val['vDataBaseFieldName']] != ''){										
										$html.='<img id="blah" src="'.$this->data['base_url'].'uploads/homes/'.$home_page_details[0]['iHometabId'].'/'.$home_page_details[0]['vImage'].'" width="150" height="150" style="margin-left:50px;"/>';
										$html.='<div style="float: left; margin: 8px 0px 0px 20px;">
           <button onclick="deletehomefile('.$home_page_details[0]['iHometabId'].');" class="btn btn-primary delete" type="button">Delete</button></div>';
									}else{
										$html.='<img id="blah" src="'.$this->data['base_url'].'uploads/homes/noimg.png" width="150" height="150" style="margin-left:50px;"/>
										';
									}
									$html.='</div>
										</div>';
									break;
									
								case 'Checkbox':
									$html.='<div class="control-group">
												<div class="controls GPS">
													<input type="checkbox" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" value="1"';
									$html.=$home_page_details[0]['vGPS']==1?"Checked":"";					
									$html.=' onclick="getlatlangforhome('.$iAppTabId.');"> &nbsp; GPS location look up<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Lattitude & Longitude </span></a>
												</div>
											</div>';
									break;
									
								case 'SelectBox':
									$html.='<div class="control-group">
												<label class="control-label distance">'.$val['vLabelName'].' :<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;Distance Types </span></a></label>';
									if($val['vLabelName'] == 'Country'){
										$html.='<div class="controls">
													<select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'">';
										$html.='<option value="">select country</option>';
										foreach($r_country as $country){
											$html.='<option value="'.$country['vCountryId'].'"';
											$html.=$home_page_details[0][$val['vDataBaseFieldName']]==$country['vCountryId']?"Selected":"";
											$html.='>'.$country['vCountry'].'</option>';
										}
										$html.='</select>
												</div>';
									}elseif($val['vLabelName'] == 'Distance Type'){
										$html.='<div class="controls">
												<select name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'">
												<option value="">select</option>
												<option value="km"';
										$html.=$home_page_details[0][$val['vDataBaseFieldName']]=='km'?"Selected":"";
										$html.='>kilometer</option>
												<option value="mile"';
										$html.=$home_page_details[0][$val['vDataBaseFieldName']]=='mile'?"Selected":"";			
										$html.='>mile</option>
												</select>
											</div>';
									}			
									$html.='</div>';
								break;
						  }	
					}
					
					$html .='<div class="row_form">
								<label class="checklabel">&nbsp;</label>
								<button type="button" class="btn btn-primary save"  id="homebtn" name="homebtn" onclick="hometab_validation('.$iAppTabId.');"><i class="icon-ok">Save</i></button></div>';																					
				$html.='</div>';
					
			$html.='</div>';
			$html.='</form>';
			$html.='</div>';

			$html .='<script type="text/javascript" language="javascript">
					$(document).ready(function() {
					    var language = "French";
					    $.ajax({
						url: "http://www.admin.easyapps.fr/assets/xml/home.xml",
						success: function(xml) {
						    $(xml).find("translation").each(function(){
							var id = $(this).attr("id");
							var text = $(this).find(language).text();
							$("." + id).html(text);
						    });
						}
					    });
					});
					</script>';
			
			$html .= '<script>';
			$html .= 'function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
				
							reader.onload = function (e) {
								$("#blah")
									.attr("src", e.target.result)
									.width(200)
									.height(200);
							};
				
							reader.readAsDataURL(input.files[0]);
						}
					}';
			$html .= '</script>';
				
			return $html;

	}
	
	 function deletehomefile(){
    	
	   $iHomeId=$this->input->get('iHomeId');
	   $iHomeIdinfo=$this->app_model->getwebsiteinfo($iHomeId);   
	   $var=unlink($this->data['base_path'].'uploads/homes/'.$iHomeId.'/'.$iHomeIdinfo['vWebImage']);
	   $iHomeIdinfo['vImage'] = "";
	   $deleteFile=$this->app_model->update_home_img($iHomeIdinfo,$iHomeId);
	   if($deleteFile){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    } 
	

	// add opening time 
	function save_addopeningtime()
	{
		$data = $this->input->post('data');
		
		$iApplicationId = $data['iApplicationId'];
		$iAppTabId = $data['iAppTabId'];
		$iFeatureId = $data['iAppTabId'];
		$iOpeningId= $data['iOpeningId'];
		
		if($this->input->post()){
			if($iOpeningId == ''){
				$iHometabId = $this->app_model->save_home_openingtime($data);
			}else if($iOpeningId != ''){
				$iHometabId = $this->app_model->update_home_openingtime($data,$iOpeningId);
			}
		}
		redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId);
	}

function save_hometabdata()
{
//echo '<pre>';
//print_r($this->input->post('data')); exit;
		$data = $this->input->post('data');
		$iApplicationId = $data['iApplicationId'];
		
		if($this->input->post())
		{
			if($data['iHometabId'] != ''){
				$iHometabId = $data['iHometabId'];
				$this->app_model->update_home($data,$iHometabId);
				
				$size=array();
				$size['width']=600;
				$size['height']=600;	 
				 
				if($_FILES['vImage']['name'] !=''){
				 	$eventfile = $_FILES['vImage']['name'];
				 	$fileName = $this->do_upload_img($iHometabId,'homes','vImage',$size);
				 	if($fileName){
				 		$data['vImage'] = $fileName;    
				 	}
				 	 $iEventId = $this->app_model->update_home($data,$iHometabId);
				}
				redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId);
				exit;
			}else{
				 $iHometabId = $this->app_model->save_home($data);
				 $data['iHometabId'] = $iHometabId;

				 $size=array();
				 $size['width']=600;
				 $size['height']=600;	 
				  
				 if($_FILES['vImage']['name'] !=''){
				 	$eventfile = $_FILES['vImage']['name'];
				 	$fileName = $this->do_upload_img($iHometabId,'homes','vImage',$size);
				 	if($fileName){
				 		$data['vImage'] = $fileName;    
				 	}
					$test = $this->app_model->update_home($data,$iHometabId);
				 }
				redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId);
				exit;
			}
			redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId);
			exit;
		}
}

	function detailBackgroundImg()
	{
		$data = $this->input->get();
		$this->data['image_detail'] = $data;
		$this->data['assigned_tab'] = $this->app_model->get_assign_tab_by_backgroundid($data['iBackgroundId']);
		
		$assign_slider = array();

		$exist_slider_details = $this->app_model->get_one_app_slideimg($data['iApplicationId']);
		if($exist_slider_details){
			switch ($data['iBackgroundId']) {
				case ($data['iBackgroundId'] == $exist_slider_details['iSliderImg1Id']) :
					array_push($assign_slider, 'Slider 1');
					break;	
				case ($data['iBackgroundId'] == $exist_slider_details['iSliderImg2Id']) :
					array_push($assign_slider, 'Slider 2');
					break;	
				case ($data['iBackgroundId'] == $exist_slider_details['iSliderImg3Id']) :
					array_push($assign_slider, 'Slider 3');
					break;	
				case ($data['iBackgroundId'] == $exist_slider_details['iSliderImg4Id']) :
					array_push($assign_slider, 'Slider 4');
					break;	
				case ($data['iBackgroundId'] == $exist_slider_details['iSliderImg5Id']) :
					array_push($assign_slider, 'Slider 5');
					break;	
			}
		}
		$this->data['assigned_slider'] = $assign_slider;
	
		//echo '<pre>';print_r($this->data['assigned_tab']);exit;
		//echo "<pre>";print_r($this->data);
		//exit;	
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('back_img_detail_popup.tpl'); 
		
	}

	/*
		Change : Around us 
	*/	
	function getaroundushtml($iFeatureId,$iAppTabId)
	{



		$iApplicationId = $this->data['iApplicationId'];  // Application id
		$appwise_aroundus = $this->app_model->get_appwise_aroundus($this->data['iApplicationId'],$iAppTabId);
		
		// get featurefields details
		$all_featurefields = $this->app_model->get_featurefields($iFeatureId);
		
		// get color category details
		$color = $this->app_model->get_color_category_details($this->data['iApplicationId'],$iAppTabId);
		
		// get country details
		$country = $this->app_model->get_country_details();
		
		// get around us general infor
		$aroundus_geninfo = $this->app_model->get_aroundus_gen_info($this->data['iApplicationId'],$iAppTabId);
		
		$html='';
		$html.='<form name="frmaroundustab" id="frmaroundustab_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_aroundus_category" class="form-horizontal">';
		$html.='<div id="frmaroundustab'.$iAppTabId.'" style="display:none;"></div>';
		$html.='<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'">
                <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
		$html.='<div class="lean-body">
                	<div class="widget-body form">';
		$html.='<label class="control-label"><b>Categories :</b></label>';


		
		$html.='<div class="control-group">
					<div class="controls">
					<input type="hidden" name="rCatId1" id="rCatId" value="'.$color[0]['rCatId'].'" />

					<input type="text" class="span2" name="rCatName1" value="'.$color[0]['rCatName'].'" style="width:50%;">';
				
					if($color[0]['rCatColor'] != ''){
					$html.='<div class="input-append color" id="picker1" data-color="'.$color[0]['rCatColor'].'" data-color-format="rgb">
							<span class="add-on"><i style="background-color: '.$color[0]['rCatColor'].'"></i></span>
						</div>';
					$html.='<input type="hidden" name="rCatColor1" id="red_color" value="'.$color[0]['rCatColor'].'" />';
					}else{
					$html.='<div class="input-append color" id="picker1" data-color="#ff0000" data-color-format="rgb">
							<span class="add-on"><i style="background-color: #ff0000"></i></span>
						</div>';
					$html.='<input type="hidden" name="rCatColor1" id="red_color" value="#ff0000" />';	
					}
					$html.='</div>
				</div>';

		$html.='<div class="control-group">
					<div class="controls">
					<input type="hidden" name="rCatId2" id="rCatId" value="'.$color[1]['rCatId'].'" />
					<input type="text" class="span2" name="rCatName2" value="'.$color[1]['rCatName'].'" style="width:50%;" />';
					if($color[1]['rCatColor'] != ''){
						$html.='<div class="input-append color" id="picker2" data-color="'.$color[1]['rCatColor'].'" data-color-format="rgb">
							<span class="add-on"><i style="background-color: '.$color[1]['rCatColor'].'"></i></span>
							</div>
							<input type="hidden" name="rCatColor2" id="green_color" value="'.$color[1]['rCatColor'].'" />';
					}else{
						$html.='<div class="input-append color" id="picker2" data-color="#00ff00" data-color-format="rgb">
								<span class="add-on"><i style="background-color: #00ff00"></i></span>
							</div>
							<input type="hidden" name="rCatColor2" id="green_color" value="#00ff00" />';	
					}
					$html.='</div>
				</div>';
				
		$html.='<div class="control-group">
					<div class="controls">
					<input type="hidden" name="rCatId3" id="rCatId" value="'.$color[2]['rCatId'].'" />
					<input type="text" class="span2" name="rCatName3" value="'.$color[2]['rCatName'].'" style="width:50%;" />';
					if($color[2]['rCatColor'] != '')
					{
						$html.='<div class="input-append color" id="picker3" data-color="'.$color[2]['rCatColor'].'" data-color-format="rgb">
							<span class="add-on"><i style="background-color: '.$color[2]['rCatColor'].'"></i></span>
						</div>
						<input type="hidden" name="rCatColor3" id="purple_color" value="'.$color[2]['rCatColor'].'" />';
					}else{
						$html.='<div class="input-append color" id="picker3" data-color="#0000ff" data-color-format="rgb">
							<span class="add-on"><i style="background-color: #0000ff"></i></span>
						</div>
						<input type="hidden" name="rCatColor3" id="purple_color" value="#0000ff" />';	
					}



				$html.='</div>
				</div>';		


				
		$html.='<div class="control-group">
					<div class="controls">
						<button type="button" class="btn btn-primary"  id="Update" name="Update" onclick="aroundus_category('.$iAppTabId.');"><i class="icon-ok">Update Settings</i></button>
					</div>
				</div>';
		$html.='</div></div></form>';
		
		$html.='<div class="add_btn"><a class="btn btn-primary"  href="#arounduscategory'.$iAppTabId.'" id="arounduscategory" onclick="open_ckeditor('.$iAppTabId.');">Add POI</a></div>';
		
		$html.='<div id="arounduscategory'.$iAppTabId.'" class="main_popup" style="display:none;">
					<div class="popup_header">

						<h3>New POI</h3>
					</div>
					<div class="popup-body">';
			$html.='<form name="frmpoitab" id="frmpoitab_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_aroundusdetails" class="form-horizontal" enctype="multipart/form-data">';
			$html.='<div id="frmpoitab_validation'.$iAppTabId.'" style="display:none;"></div>';
			$html.='<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
					<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
					<input class="span6" type="hidden" name="data[rGeninfoId]" value="'.$appwise_hometabdata['rGeninfoId'].'">';
			$html.='<div class="lean-body">
					<div class="widget-body form">';
						



					foreach($all_featurefields as $val)
					{
						switch ($val['eType']){
							
							case 'Textxbox':
									$html.='<div class="control-group">
									<label class="control-label">'.$val['vLabelName'].' :</label>';
									if($val['vDataBaseFieldName'] == 'rTelephone'){
											$html.='<div class="controls">
													<input type="text" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" value="'.$home_page_details[0][$val['vDataBaseFieldName']].'" class="input-xlarge" maxlength="30"/>
										</div>';
									}else{
										$html.='<div class="controls">
												<input type="text" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" value="'.$home_page_details[0][$val['vDataBaseFieldName']].'" class="input-xlarge" maxlength="50"/>
										</div>';

									}
									$html.='</div>';
								break;
									
								case 'File':
									$html.='<div class="control-group">
												<label class="control-label">'.$val['vLabelName'].' :</label>
												<div class="controls">
													<input type="file" name="'.$val['vDataBaseFieldName'].'" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" />
												</div>
											</div>';
									break; 
									
								case 'Checkbox':
									$html.='<div class="control-group">
												<div class="controls">	
													<input type="checkbox" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'" value="Yes" onclick="getlatlangaround('.$iAppTabId.');"> &nbsp; '.$val['vLabelName'].'
												</div>
											</div>';
									break;
									
								case 'Editor':
									$html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'">';	
									$html .='<label class="control-label">'.$val['vLabelName'].'</label>
											<div class="controls">
												<textarea class="input-xlarge ckeditor" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'"></textarea>
											</div>
										</div>';					
									 break;	
											
								case 'SelectBox':
									$html.='<div class="control-group">';
										if($val['vLabelName'] == 'Distance Type'){		
											$html.='<label class="control-label">'.$val['vLabelName'].' :</label>
												<div class="controls">
													<select name="data['.$val['vDataBaseFieldName'].']" class="form-control" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'">
														<option value="">--Select--</option>
														<option value="km"';
														if($val['vDistanceType'] == 'km'){
															$html.='Selected';

														}
														$html.='>KiloMeter</option>
														<option value="mile"';
														if($val['vDistanceType'] == 'mile'){
															$html.='Selected';

														}
														$html.='>Mile</option>
													</select>

												</div>';
										}else if($val['vLabelName'] == 'Country'){
											$html.='<label class="control-label">'.$val['vLabelName'].' :</label>
													<div class="controls">
														<select name="data['.$val['vDataBaseFieldName'].']" class="form-control" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'">';
											$html.='<option value="">--select country--</option>';
														foreach($country as $country_val){
															$html.='<option value="'.$country_val['iCountryId'].'">'.$country_val['vCountry'].'</option>';
														}
											$html.='</select>
													</div>';
										}else if($val['vLabelName'] == 'Color'){
											$html.='<label class="control-label">'.$val['vLabelName'].' :</label>
													<div class="controls">
														<select name="data['.$val['vDataBaseFieldName'].']" class="form-control" id="'.$val['vDataBaseFieldName'].''.$iAppTabId.'">';
												$html.='<option value="">--select color--</option>';
														foreach($color as $color_val){
															if($color_val['rCatName'] != ''){
												$html.='<option value="'.$color_val['rCatId'].'">'.$color_val['rCatName'].'';
												$html.='</option>';
												}
											}
											$html.='</select>
											</div>';
										}
										$html.='</div>';
									break;
						   		}	
						}
						
						$html .='<div class="row_form">
									<label class="checklabel">&nbsp;</label>
									<button type="button" class="btn btn-primary"  id="aroundusbtn" name="aroundusbtn" onclick="aroundus_validation('.$iAppTabId.');"><i class="icon-ok">Save</i></button>
								</div>';																					
						$html.='</div>';
						
				$html.='</div>';
				$html.='</form>';					
				$html.='</div>';
				
				$html.='<div class="popup-footer">
						<button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
					</div>
				</div>';
				
			// all aroundus data
			$html .= $this->all_aroundus_data_html($this->data['iApplicationId'],$iAppTabId,$iFeatureId); 
				
		return $html;
	}
	
	function aroundus_edit_getaroundushtml()
	{
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		$rGeninfoId = $this->input->get('rGeninfoId');
		$iFeatureId = $this->input->get('iFeatureId');
		
		// get app wise aroundus 
		$appwise_aroundus = $this->app_model->get_appwise_aroundus($iApplicationId,$iAppTabId);
		// get featurefields details
		$all_featurefields = $this->app_model->get_featurefields($iFeatureId);
		// get color category details
		$color = $this->app_model->get_color_category_details($iApplicationId,$iAppTabId);
		// get country details
		$country = $this->app_model->get_country_details();
		// get general info
		$home_page_details = $this->app_model->get_generalinfor_edit($rGeninfoId);
		
		$html='';
		$html.='<div id="arounduscategory'.$iAppTabId.'" class="main_popup">
				<div class="popup_header">
					<h3>Edit POI</h3>
				</div>
				<div class="popup-body">';
		$html.='<form name="frmpoiedittab" id="frmpoiedittab_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_aroundusdetails" class="form-horizontal" enctype="multipart/form-data">';
		$html.='<div id="frmpoiedittab_validation'.$iAppTabId.'" style="display:none;"></div>';
		$html.='<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'">
				<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
				<input class="span6" type="hidden" name="data[rGeninfoId]" value="'.$rGeninfoId.'">';
		$html.='<div class="lean-body">
				<div class="widget-body form">';
					
				foreach($all_featurefields as $val){
						switch ($val['eType']){
							case 'Textxbox':
								$html.='<div class="control-group">
									<label class="control-label">'.$val['vLabelName'].' :</label>';
									if($val['vDataBaseFieldName'] == 'rTelephone'){
									$html.='<div class="controls">
											<input type="text" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.''.$iAppTabId.'" value="'.$home_page_details[$val['vDataBaseFieldName']].'" class="input-xlarge" maxlength="30"/>
										</div>';
									}else{
									$html.='<div class="controls">
										  <input type="text" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.''.$iAppTabId.'" value="'.$home_page_details[$val['vDataBaseFieldName']].'" class="input-xlarge" maxlength="50"/>
										</div>';
									}
									$html.='</div>';
								break;
								
							case 'File':
								$html.='<div class="control-group">
										<label class="control-label">'.$val['vLabelName'].' :</label>
										<div class="controls">
											<input type="file" name="'.$val['vDataBaseFieldName'].'" id="'.$val['vDataBaseFieldName'].'e'.''.$iAppTabId.'" />
										</div>
										</div>';
								break; 
								
							case 'Checkbox':
								$html.='<div class="control-group">
										<div class="controls">
											<input type="checkbox" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.''.$iAppTabId.'" value="Yes"';
								if($home_page_details[$val['vDataBaseFieldName']]=='Yes')
								{
									$html.="checked='checked'"; 
								}
								$html.='> &nbsp; '.$val['vLabelName'].'
										</div>
									</div>';
								break;

							case 'Editor':
									$html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'">';	
									$html .='<label class="control-label">'.$val['vLabelName'].'</label>
											<div class="controls">
												<textarea class="input-xlarge aka" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'">'.$home_page_details[$val['vDataBaseFieldName']].'</textarea>
											</div>
										</div>';					
									 break;	
							
						case 'SelectBox':
								$html.='<div class="control-group">';
									if($val['vLabelName'] == 'Distance Type'){		
										$html.='<label class="control-label">'.$val['vLabelName'].' :</label>
												<div class="controls">
													<select name="data['.$val['vDataBaseFieldName'].']" class="form-control" id="'.$val['vDataBaseFieldName'].'e'.''.$iAppTabId.'">
														<option value="">--Select--</option>
														<option value="km"';
														$html.=$home_page_details[$val['vDataBaseFieldName']]=='km'?"Selected":"";
														$html.='>KiloMeter</option>
														<option value="mile"';
														$html.=$home_page_details[$val['vDataBaseFieldName']]=='mile'?"Selected":"";
														$html.='>Mile</option>
													</select>
												</div>';
									}else if($val['vLabelName'] == 'Country'){
										$html.='<label class="control-label">'.$val['vLabelName'].' :</label>
												<div class="controls">
													<select name="data['.$val['vDataBaseFieldName'].']" class="form-control" id="'.$val['vDataBaseFieldName'].'e'.''.$iAppTabId.'">';
										$html.='<option value="">--select country--</option>';
												foreach($country as $country_val){
													$html.='<option value="'.$country_val['iCountryId'].'"';
													$html.=$home_page_details[$val['vDataBaseFieldName']]==$country_val['iCountryId']?"Selected":"";
													$html.='>'.$country_val['vCountry'].'</option>';
												}
										$html.='</select>
										</div>';
									}else if($val['vLabelName'] == 'Color'){
										$html.='<label class="control-label">'.$val['vLabelName'].' :</label>
												<div class="controls">
													<select name="data['.$val['vDataBaseFieldName'].']" class="form-control" id="'.$val['vDataBaseFieldName'].'e'.''.$iAppTabId.'">';
											$html.='<option value="">--select color--</option>';
													foreach($color as $color_val){
														if($color_val['rCatName'] != ''){
											$html.='<option value="'.$color_val['rCatId'].'"';
											$html.=$home_page_details[$val['vDataBaseFieldName']]==$color_val['rCatId']?"Selected":"";
											$html.='>'.$color_val['rCatName'].'</option>';
														}
													}
										$html.='</select>
										</div>';
									}
									$html.='</div>';
								break;
							}	
						}-

						
						$html .='<div class="row_form">
									<label class="checklabel">&nbsp;</label>
									<button type="button" class="btn btn-primary"  id="aroundusbtn" name="aroundusbtn" onclick="aroundus_update_validation('.$iAppTabId.');"><i class="icon-ok">Update</i></button>
								</div>';																					
						$html.='</div>';
					$html.='</div>';
				$html.='</form>';
				$html.='</div>
						<div class="popup-footer">
							<button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
						</div></div>';
		
			echo $html;
	}
	
	function all_aroundus_data_html($iApplicationId,$iAppTabId,$iFeatureId)
	{
			// get around us general infor
			$aroundus_geninfo = $this->app_model->get_aroundus_gen_info($iApplicationId,$iAppTabId);
			$html .='<div id="aroundus_listing'.$iAppTabId.'">';
				$html.='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
							<tr class="nodrop">
								<th>Name</th>
								<th colspan="2"><center>Action</center></th>
							</tr>';
			if(count($aroundus_geninfo) >0){
				
					foreach($aroundus_geninfo as $val)
					{
						$html.='<tr>';
						$html.='<td>'.$val['rName'].'</td>';
						$html.='<td align="center" width="7%"><a class="apptab_edit"  onclick="return edit_aroundus_detail('.$val["rGeninfoId"].','.$iAppTabId.','.$iApplicationId.','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
								<td align="center" width="7%"><a class="button grey" onclick="delete_aroundus('.$val["rGeninfoId"].','.$iAppTabId.','.$iApplicationId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td></tr>';
					}
					
				}else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No aroundus founds.</td></tr>';
                    }
               $html.='</table></div>';

				
			return $html;
	}
	
	// delete around us details
	function aroundus_geninfo_delete()
	{
		$iApplicationId = $this->input->get('iApplicationId');
		$iGeninfoId = $this->input->get('iGeninfoId');
		$iAppTabId = $this->input->get('iAppTabId');
		$iFeatureId = $this->input->get('iFeatureId');
	    if($iGeninfoId !=''){
             if(is_dir('uploads/aroundus/'.$iGeninfoId)){
               $this->rm_folder_recursively('uploads/aroundus/'.$iGeninfoId);
           }
		  $id = $this->app_model->delete_aroundus($iGeninfoId);
        }
        
    	$html .= $this->all_aroundus_data_html($iApplicationId,$iAppTabId,$iFeatureId);  
		
		echo $html;exit; 
	}
	
	// save aroundus category details
	function save_aroundus_category()
	{
		$data = $this->input->post();
		
		// get color category details
		$color = $this->app_model->get_color_category_details($data['data']['iApplicationId'],$data['data']['iAppTabId']);
		
		if(count($color) >0){
			$this->app_model->update_aroundus_category($this->input->post());
		}else{
			$this->app_model->insert_aroundus_category($this->input->post());
		}
		echo $this -> session -> set_flashdata('message', 'Your information was successfully updated.');
		redirect($this->data['base_url'] . 'app/step3/'.$data['data']['iApplicationId']);
	}
	
	// save POI of around us tab
	function save_aroundusdetails()
	{
		$data = $this->input->post('data');
		// around us details 
		if($data['rGeninfoId'] != ''){
			
			
			$size=array();
			$size['width']=50;
			$size['height']=50;
			
			$aroundusfile =$_FILES['rImage']['name'];
			
				$fileName = $this->do_upload_img($data['rGeninfoId'],'aroundus','rImage',$size);
				if($fileName){
				$data['rImage'] = $fileName;  
			}
			$this->app_model->update_aroundus_POI_details($data);
		
			

			
		}else{
			$rGeninfoId = $this->app_model->insert_aroundus_POI_details($data);
			
			/** around us image upload **/
			$size=array();
			$size['width']=50;
			$size['height']=50;	 
			
			if($_FILES['rImage']['name'] !=''){
				$eventfile = $_FILES['rImage']['name'];
				
				$fileName = $this->do_upload_img($rGeninfoId,'aroundus','rImage',$size);
				if($fileName){
					$data['rImage'] = $fileName;
					$data['rGeninfoId'] = $rGeninfoId;   
				}
				$rGeninfoId = $this->app_model->update_aroundus_POI_details($data);
			}
			//Header Image
		}
		redirect($this->data['base_url'] . 'app/step3/'.$data['iApplicationId']);
	}

//Gallery Tab

    function getgalleryhtml($iFeatureId,$iAppTabId){
    	
        
        $appwise_gallery = $this->app_model->get_appwise_gallery($this->data['iApplicationId'],$iAppTabId);
        $appwise_gallery_value = $this->app_model->get_one_gallery_details($iAppTabId);
        if($appwise_gallery_value){
        	$eImageServiceType = $appwise_gallery_value['eImageServiceType'];
        }else{
        	$eImageServiceType = 'Custom';
        }
		
        //echo '<pre>';print_r($appwise_gallery_value);exit;
        //$this->data['appwise_rss'] = $appwise_rss;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $html .='<div id="gallery_validation'.$iAppTabId.'" style="display:none;"></div>';
        $html .='<form name="frmgallery" id="frmgallery_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_gallery" class="form-horizontal" enctype="multipart/form-data">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                     <input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
                    
                    <div class="lean-body">
                        <div class="widget-body form" >';
                            
                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                        				if($eImageServiceType == 'Custom' || ($eImageServiceType == 'Flicker' && ($val['vDataBaseFieldName'] =="vInstagramEmail" || $val['vDataBaseFieldName'] =="vInstagramAPI") || ($eImageServiceType == 'Picasa' && ($val['vDataBaseFieldName'] =="vFlickerEmail" || $val['vDataBaseFieldName'] == "vFlickerApi") || ($eImageServiceType == 'Picasa' && ($val['vDataBaseFieldName'] == "vInstagramEmail" || $val['vDataBaseFieldName'] == "vInstagramAPI" ) || ($eImageServiceType == 'Flicker' && $val['vDataBaseFieldName'] == "vPicassaEmail")||($eImageServiceType=='Instagram' && $val['vDataBaseFieldName']=='vFlickerApi') ||($eImageServiceType=='Instagram' && $val['vDataBaseFieldName']=='vPicassaEmail')||($eImageServiceType=='Instagram' && $val['vDataBaseFieldName']=='vFlickerApi')||($eImageServiceType=='Instagram' && $val['vDataBaseFieldName']=='vFlickerEmail'))))){
                                        					$html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'" style="display:none;">';
                                        				}else{
                                        					$html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'">';
                                        				}
                                                    
                                                       $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'File':
                                        		if($eImageServiceType == 'Custom' ){
                                        			$html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'">';	
                                        		}else{
                                        			 $html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'" style="display:none;">';
                                        		}
                                              
                                                        $html .='<label class="control-label">'.$val['vLabelName'].'<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> &nbsp;(200px *200px) </span></a></label>
                                                        <div class="controls">
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" style="float: left;" value="">';

                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                                    					
                                                break; 
                                        case 'Radio':
                                               $html .='
                                                        
                                                        ';
                                                        if($eImageServiceType){
                                                        	if($eImageServiceType == $val['vLabelName']){
    	                                                    	$html .= '<div class="'.$val['vLabelName'].'"><input type="radio" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" style="float: left;" value="'.$val['vLabelName'].'" checked="checked" onClick="show_hide_gallery('."'".$val['vLabelName']."'".','.$iAppTabId.')" ></div>';
                                                        	}else{
	                                                        	$html .= '<div class="'.$val['vLabelName'].'"><input type="radio" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" style="float: left;" value="'.$val['vLabelName'].'"  onClick="show_hide_gallery('."'".$val['vLabelName']."'".','.$iAppTabId.')"></div>';
                                                        	}
                                                        }else{
                                                        	$html .= '<div class="'.$val['vLabelName'].'"><input type="radio" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" style="float: left;" value="'.$val['vLabelName'].'" checked="checked" onClick="show_hide_gallery('."'".$val['vLabelName']."'".','.$iAppTabId.')"></div>';
                                                        }
                                                    $html .='';
                                               $html .='';
                                               break;
                                        case 'Editor':
                                        		if($eImageServiceType == 'Custom' ){
                                        			$html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'">';	
                                        		}else{
                                        			 $html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'" style="display:none;">';
                                        		}
                                                        $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge ckeditor" rows="3" name="'.$val['vDataBaseFieldName'].'" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" >'.$appwise_gallery_value[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Checkbox':
					$html .='<div class="control-group" id="div-'.$val['vDataBaseFieldName'].'-'.$iAppTabId.'">';
					$html .='<label class="control-label">'.$val['vLabelName'].'</label>';
					$html.='<input type="checkbox" name="'.$val['vDataBaseFieldName'].'" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" value="YES"';
					$html.=$appwise_gallery_value[$val['vDataBaseFieldName']]=='YES'?"Checked":"";
					$html.=' /></div>';																														 						break;
					}
                                    }
                            if($eImageServiceType != 'Instagram' ){
	                            if($appwise_gallery_value['eDisplayStyle'] == "Coverflow" ){
		                            $html .='<div class="control-group" id="div-eDisplayStyle-'.$iAppTabId.'"> <label class="control-label">Display Style</label><div class="controls greed"><input type="radio" name="data[eDisplayStyle]"  value="Grid" ><span>Grid</span> </div><div class="controls coverflow"> <input type="radio" name="data[eDisplayStyle]"  value="Coverflow" checked="checked"><span>Coverflow</span></div></div>';
	                            }else{
		                            $html .='<div class="control-group" id="div-eDisplayStyle-'.$iAppTabId.'"> <label class="control-label">Display Style</label><div class="controls greed"><input type="radio" name="data[eDisplayStyle]"  value="Grid" checked="checked"><span>Grid</span> </div><div class="controls coverflow"> <input type="radio" name="data[eDisplayStyle]"  value="Coverflow" ><span>Coverflow</span></div></div>';
	                            }
                        	}else{

	                            if($appwise_gallery_value['eDisplayStyle'] == "Coverflow" ){
		                            $html .='<div class="control-group" id="div-eDisplayStyle-'.$iAppTabId.'" style="display:none"> <label class="control-label">Display Style</label><div class="controls greed"><input type="radio" name="data[eDisplayStyle]"  value="Grid" > <span>Grid</span> </div><div class="controls coverflow"> <input type="radio" name="data[eDisplayStyle]"  value="Coverflow" checked="checked"><span>Coverflow</span></div></div>';
	                            }else{
		                            $html .='<div class="control-group" id="div-eDisplayStyle-'.$iAppTabId.'" style="display:none"> <label class="control-label">Display Style</label><div class="controls greed"><input type="radio" name="data[eDisplayStyle]"  value="Grid" checked="checked"><span>Grid</span> </div><div class="controls coverflow"> <input type="radio" name="data[eDisplayStyle]"  value="Coverflow" ><span>Coverflow</span></div></div>';
	                            }
                        	}
                            if($eImageServiceType == 'Flicker' ){
                            	if($appwise_gallery_value['eFlickerGalleryType'] == "Phtostream" ){
                            	$html .='<div class="control-group" id="div-eFlickerGalleryType-'.$iAppTabId.'" > <label class="control-label">Gallery Type</label><div class="controls photoset"><input type="radio" name="data[eFlickerGalleryType]"  value="Photsets" ><span>Photosets </span></div><div class="controls photoset"> <input type="radio" name="data[eFlickerGalleryType]"  value="Phtostream" checked="checked"><span>Photostream</span></div></div>';
                            	}else{
                            	$html .='<div class="control-group" id="div-eFlickerGalleryType-'.$iAppTabId.'"> <label class="control-label">Gallery Type</label><div class="controls photoset"><input type="radio" name="data[eFlickerGalleryType]"  value="Photsets" checked="checked"><span>Photosets </span> </div><div class="controls photoset"> <input type="radio" name="data[eFlickerGalleryType]"  value="Phtostream" ><span>Photostream</span></div></div>';
                            	}
                        	}else{
                            	if($appwise_gallery_value['eFlickerGalleryType'] == "Phtostream" ){
                            		$html .='<div class="control-group" id="div-eFlickerGalleryType-'.$iAppTabId.'" style="display:none"> <label class="control-label">Gallery Type</label><div class="controls photoset"><input type="radio" name="data[eFlickerGalleryType]"  value="Photsets" ><span>Photosets </span> </div><div class="controls photoset"> <input type="radio" name="data[eFlickerGalleryType]"  value="Phtostream" checked="checked"><span>Photostream</span></div></div>';
                            	}else{
                            		$html .='<div class="control-group" id="div-eFlickerGalleryType-'.$iAppTabId.'" style="display:none"> <label class="control-label">Gallery Type</label><div class="controls photoset"><input type="radio" name="data[eFlickerGalleryType]"  value="Photsets" checked="checked"><span>Photosets  </span> </div><div class="controls photoset"> <input type="radio" name="data[eFlickerGalleryType]"  value="Phtostream" ><span>Photostream</span></div></div>';
                            	}
                        	}
                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="gallery_validation('.$iAppTabId.');"><i class="icon-ok"></i> Save</button>
                            </div>';
					        
                        $html .='</div>
                    </div>    
                </form>';
            if($eImageServiceType == 'Custom' ){
            	$html .= '<ul class="gallerywrapper">';
            }else{
            	$html .= '<ul class="gallerywrapper" style="display:none;">';
            }
				
	            foreach($appwise_gallery as $val) {
					$url = $this->data['base_upload'].'gallery/'.$val['iGalleryImageId'].'/'.$val['vGalleryImage'];
					$html .= '<li><a href="#" class="galleryimg"><img src="'.$url.'" width="100px" height="100px"></a><a href="'.$this->data['base_url'].'app/delete_gallery_img/'.$val['iApplicationId'].'?iGalleryImageId='.$val['iGalleryImageId'].'" class="icon-remove" ></a><span class="gallery-desc">'.$val['tDescription'].'</span></li>';
		    	}
		    	$html .= '</ul>';
			
        return $html;
    }

    function save_gallery(){

	   if($this->input->post()){
            $gallery = $this->input->post('data');
            //print_r($gallery);exit;
            $exist_gallery_info =  $this->app_model->get_one_gallery_details($gallery['iAppTabId']);
            if( $exist_gallery_info){
             $iGalleryId = $exist_gallery_info['iGalleryId'];
             $this->app_model->update_gallery($gallery,$iGalleryId);
            }else{
             $iGalleryId = $this->app_model->save('r_app_gallery_value',$gallery);
            }
            
            $size=array();
            $size['width']=128;
            $size['height']=164;  
           //print_r($_FILES);exit;
            if($_FILES['vGalleryImage']['name'] !=''){

                $galleryfile = $_FILES['vGalleryImage']['name'];
                $filesize=$_FILES['vGalleryImage']['size'];
                $extention = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");

                $allowext=end(explode('.',$galleryfile));
                if(in_array($allowext, $extention) )
                {
                 $data['iGalleryId'] = $iGalleryId;
              $data['tDescription'] = $this->input->post('tDescription');
           
                 $iGalleryImageId = $this->app_model->save('r_app_gallery_images',$data);
                 $fileName = $this->do_upload_galleryimg($iGalleryImageId,'gallery','vGalleryImage',$size);
                 if($fileName){
                    $data['vGalleryImage'] = $fileName;    
                 }
                 $iGalleryImageId = $this->app_model->update_gallery_image($data,$iGalleryImageId);
             }
            }
            
            
            
             if($iGalleryId != '' || $iGalleryId != ''){
                redirect($this->data['base_url'] . 'app/step3/'.$gallery['iApplicationId']);
            }
            
        }
    }

//Delete Gallery Image

	function delete_gallery_img(){
		

		$iApplicationId = $this->uri->segment(3);
		$iGalleryImageId = $this->input->get('iGalleryImageId');
		$path = 'uploads/gallery/'.$iGalleryImageId;
		$delete_img = $this->app_model->delete_gallery_image($iGalleryImageId);
		if($delete_img){
			$this->rm_folder_recursively($path);
		}
		
		redirect($this->data['base_url'] . 'app/step3/'.$iApplicationId);	
	}

    function do_upload_galleryimg($folderId,$folder,$image,$size){
    	

	  // echo $image;exit;
	   if(!is_dir('uploads/'.$folder.'/')){
		   @mkdir('uploads/'.$folder.'/', 0777);
	   }
	   if(!is_dir('uploads/'.$folder.'/'.$folderId)){
		   @mkdir('uploads/'.$folder.'/'.$folderId, 0777);
	   }   

       $fileName=str_replace(' ','',$_FILES[$image]['name']);
	   
		$config = array(
		  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
		  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
		  'max_size'=>5380334
		);
		$this->upload->initialize($config);
		$this->upload->do_upload($image); //do upload

	   list($imgwidth, $imgheight) = getimagesize($_FILES[$image]['tmp_name']);
	   if($imgwidth > $size['width'] && $imgheight > $size['height']){
		   $config1 = array(	  
			  'source_image' => $_FILES[$image]['tmp_name'], //get original image
			  'new_image' => 'uploads/'.$folder.'/'.$folderId.'/thumb_'.$fileName, 
			  'maintain_ratio' => false,
			  'width' =>  $size['width'],
			  'height' => $size['height'],
			  'master_dim' => 'width'
		   );
		   $this->load->library('image_lib', $config1);
		   $this->image_lib->initialize($config1);
		   $resize_img = $this->image_lib->resize(); //do whatever specified in config
		   unset($config1);
		}else{
			$config = array(
			  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
			  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
			  'file_name' => 'thumb_'.$fileName,
			  'max_size'=>5380334
			);
			$this->upload->initialize($config);
			$this->upload->do_upload($image); //do upload
		}
	   

	   
	   return $fileName;    
    }
    

    function do_upload_eventheaderimage($folderId,$folder,$image,$size){
    	


	  // echo $image;exit;
	   if(!is_dir('uploads/'.$folder.'/')){
		   @mkdir('uploads/'.$folder.'/', 0777);
	   }

	   if(!is_dir('uploads/'.$folder.'/'.$folderId)){
		   @mkdir('uploads/'.$folder.'/'.$folderId, 0777);
	   }   



       $fileName=str_replace(' ','',$_FILES[$image]['name']);
	   
		$config = array(
		  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
		  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
		  'max_size'=>5380334
		);
		$this->upload->initialize($config);
		$this->upload->do_upload($image); //do upload
        unset($config);    
	   list($imgwidth, $imgheight) = getimagesize($_FILES[$image]['tmp_name']);
	   if($imgwidth > $size['width'] && $imgheight > $size['height']){
		   $config1 = array(	  
			  'source_image' => $_FILES[$image]['tmp_name'], //get original image
			  'new_image' => 'uploads/'.$folder.'/'.$folderId.'/thumb_'.$fileName, 
			  'maintain_ratio' => false,
			  'width' =>  $size['width'],
			  'height' => $size['height'],
			  'master_dim' => 'width'
		   );
		   $this->load->library('image_lib', $config1);
		   $this->image_lib->initialize($config1);
		   $resize_img = $this->image_lib->resize(); //do whatever specified in config
		   unset($config1);
		}else{
			$config = array(
			  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
			  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
			  'file_name' => 'thumb_'.$fileName,
			  'max_size'=>5380334
			);
			$this->upload->initialize($config);
			$this->upload->do_upload($image); //do upload
            unset($config);
		}
	   
   return $fileName;    
    }
	
	function do_upload_homeheaderimage($folderId,$folder,$image,$size)


	{
	    // echo $image;exit;
	    if(!is_dir('uploads/'.$folder.'/')){
		   @mkdir('uploads/'.$folder.'/', 0777);

	    }
	    if(!is_dir('uploads/'.$folder.'/'.$folderId)){
		   @mkdir('uploads/'.$folder.'/'.$folderId, 0777);


	    }   
		
        $fileName=str_replace(' ','',$_FILES[$image]['name']);
	   
		$config = array(
		  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
		  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
		  'max_size'=>5380334
		);
		$this->upload->initialize($config);
		$this->upload->do_upload($image); //do upload
        unset($config);    
	    list($imgwidth, $imgheight) = getimagesize($_FILES[$image]['tmp_name']);
	    if($imgwidth > $size['width'] && $imgheight > $size['height']){
		   $config1 = array(	  
			  'source_image' => $_FILES[$image]['tmp_name'], //get original image
			  'new_image' => 'uploads/'.$folder.'/'.$folderId.'/thumb_'.$fileName, 
			  'maintain_ratio' => false,
			  'width' =>  $size['width'],
			  'height' => $size['height'],
			  'master_dim' => 'width'
		   );
		   $this->load->library('image_lib', $config1);
		   $this->image_lib->initialize($config1);
		   $resize_img = $this->image_lib->resize(); //do whatever specified in config
		   unset($config1);
		}else{
			$config = array(
			  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
			  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
			  'file_name' => 'thumb_'.$fileName,
			  'max_size'=> 5380334
			);
			$this->upload->initialize($config);
			$this->upload->do_upload($image); //do upload
            unset($config);
		}


	   	return $fileName;    
    }
    function do_upload_qrcouponheaderimage($folderId,$folder,$image,$size){
    	


	  // echo $image;exit;
	   if(!is_dir('uploads/'.$folder.'/')){
		   @mkdir('uploads/'.$folder.'/', 0777);
	   }
	   if(!is_dir('uploads/'.$folder.'/'.$folderId)){
		   @mkdir('uploads/'.$folder.'/'.$folderId, 0777);
	   }   



       $fileName=str_replace(' ','',$_FILES[$image]['name']);
	   
		$config = array(

		  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
		  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
		  'max_size'=>5380334
		);

		$this->upload->initialize($config);
		$this->upload->do_upload($image); //do upload
        unset($config);    

	   list($imgwidth, $imgheight) = getimagesize($_FILES[$image]['tmp_name']);
	   if($imgwidth > $size['width'] && $imgheight > $size['height']){

		   $config1 = array(	  
			  'source_image' => $_FILES[$image]['tmp_name'], //get original image
			  'new_image' => 'uploads/'.$folder.'/'.$folderId.'/thumb_'.$fileName, 
			  'maintain_ratio' => false,
			  'width' =>  $size['width'],
			  'height' => $size['height'],
			  'master_dim' => 'width'
		   );

		   $this->load->library('image_lib', $config1);
		   $this->image_lib->initialize($config1);
		   $resize_img = $this->image_lib->resize(); //do whatever specified in config
		   unset($config1);
		}else{
			$config = array(
			  'allowed_types' => "gif|GIF|JPG|jpg|JPEG|jpeg|PNG|png",
			  'upload_path' => 'uploads/'.$folder.'/'.$folderId, 
			  'file_name' => 'thumb_'.$fileName,
			  'max_size'=>5380334
			);
			$this->upload->initialize($config);
			$this->upload->do_upload($image); //do upload
            unset($config);
		}
	   

	   
	   return $fileName;    
    }
    
    
//Two Tire Info Tab

function gettwotireinfotabhtml($iFeatureId,$iAppTabId){
	



	$html = "";
	$iApplicationId = $this->data['iApplicationId'];
	$html .= $this->get_global_value_tab_html($iApplicationId,$iAppTabId);
	$html .= $this->getpopuptwotireinfotabhtml($iApplicationId,$iFeatureId,$iAppTabId);
	return $html;
}


function getpopuptwotireinfotabhtml($iApplicationId,$iFeatureId,$iAppTabId){
	


    $all_featurefields = $this->app_model->get_featurefields($iFeatureId,$iAppTabId);
      #  echo '<pre>';print_r($all_featurefields);exit;
        $html .='<div id="twotireformid'.$iAppTabId.'" class="main_popup" style="display:none;">
                <div class="popup_header">
                    <h3>Add New Item</h3>
                </div>

                <div class="popup-body">';        
                    $html .='<div id="twotire_validation'.$iAppTabId.'" style="display:none;"></div>';
                $html .='<div class="widget-body form">';
                        $html .='<form class="form-horizontal" name="frmtwotire" id="frmtwotire'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_twotire" enctype="multipart/form-data">';
                        $html .= '<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'">';
                         $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                                foreach ($all_featurefields as $val){		  		 

                                    switch ($val['eType']) {
                                    case 'Textxbox':


                                        		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                   $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">';

                                                    	if($val['vDataBaseFieldName'] == "vBackgroundColor" || $val['vDataBaseFieldName'] == "vTextColor"){
                                                    		$vVal = ($val['vDataBaseFieldName'] == "vBackgroundColor") ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)';
	                                                        $html .='<input type="text"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" data-color-format="rgb" class="gcp color_text_hide" value="'.$vVal.'" style="width:35px !important;background:'.$vVal.';">';
                                                    	}else{

                                                        	$html .='<input type="text" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" >';
                                                        }
                                                    $html .='</div>
                                                </div>';
                                            break;





                                    case 'Checkbox':
                                        $html .='<div class="control-group">
                                                    <label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">
                                                        <label class="checkbox">


                                                            <input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                        </label>
                                                    </div>
                                                </div>';



                                         break;
	
                                    case 'File':
                                           $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" >
                                                    <label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">
                                                        <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" onchange="CheckValidWebsiteImg(this.value,this.name)">
                                                    </div>
                                                </div>';					
                                            break;


                                       case 'Editor':

                                    	$html .='<div class="control-group">
                                                    <label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls cedit">
                                                        <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" ></textarea>
                                                    </div>
                                                </div>';					
                                            break; 

                                        

                                    }
                                    
                                }
                                
                            
                        $html .='</form>';
                    $html .='</div>';
                    $html .='<div class="row_form">
                    			<button type="button" class="btn btn-primary"  id="twotirebtn" name="twotirebtn" onclick="return submittwotire('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                    		</div>';
        $html .='</div>
        <div class="popup-footer">
            <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
        </div>
    </div>';
    
 	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#twotireformid'.$iAppTabId.'" id="addtwotireid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">Add New Item</a></div>';
    
 	$html .= '<div id="twotire_tbl'.$iAppTabId.'">';
    $html .= $this->getalltwotirehtml($this->data['iApplicationId'],$iAppTabId,$iFeatureId); 
    $html .= '</div>';          
                
    return $html;  
    
    #echo "<pre>";
    #print_r($all_featurefields);exit;
    
}

/* 
 Purpose : User should remain to same place after clicking on help icon.
*/

function get_global_value_tab_html($iApplicationId,$iAppTabId){
	

	$global_value_tab_info  =  $this->app_model->get_one_tabwise_glbval($iAppTabId);
	$vGlobalBackgroundColor = ($global_value_tab_info) ? $global_value_tab_info['vGlobalBackgroundColor'] : 'rgb(255, 255, 255)';
	$vGlobalTextColor = ($global_value_tab_info) ? $global_value_tab_info['vGlobalTextColor'] : 'rgb(0, 0, 0)';
	$html .='<div id="frmtabgvalue_validation'.$iAppTabId.'" style="display:none;"></div>';
	$html .='<form name="frmtabgvalue" id="frmtabgvalue'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_tab_global_value" class="form-horizontal" enctype="multipart/form-data">
				<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'">
            	<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">
            	<div class="control-group">
            	 <label class="control-label">Global Color</label>
            	 <div class="controls">
            	 	Background&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class=""><img align="absmiddle" src="'.$this->data['base_image'].'quaton_icon.png"> <span>  The default background color to use if not specifically defined further. </span></a>&nbsp;&nbsp;&nbsp;&nbsp;<input  type="text" name="data[vGlobalBackgroundColor]"  style="width:35px !important;background:'.$vGlobalBackgroundColor.';" id="vGlobalBackgroundColor'.$iAppTabId.'" data-color-format="rgb" class="gcp color_text_hide" value="'.$vGlobalBackgroundColor.'">
            	 	Text &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class=""><img align="absmiddle" src="'.$this->data['base_image'].'quaton_icon.png"> <span>  The default background color to use if not specifically defined further. </span></a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="data[vGlobalTextColor]"  style="width:45px !important;background:'.$vGlobalTextColor.';" id="vGlobalTextColor'.$iAppTabId.'" data-color-format="rgb" class="gcp color_text_hide" value="'.$vGlobalTextColor.'">
            	 	&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="updatecolor" value="Update Colors" class="btn btn-primary" id="updategcolor" onclick="save_tabwise_glbval('.$iAppTabId.');">
            	 </div><br>
            	 <div class="controls"> 
            	 </div><br>
            	 <div class="controls"></div>
            	 </div></form>';
    return $html;

}

	function save_tab_global_value()
	{
		$gval = $this->input->post('data');
		$exist_info  =  $this->app_model->get_one_tabwise_glbval($gval['iAppTabId']);
		if($exist_info){
			$iTabGlobalValue = $exist_info['iTabGlobalValue'];
			$update_data = $this->app_model->update_tabwise_glbval($gval,$iTabGlobalValue);
		}else{
			$iTabGlobalValue = $this->app_model->save('r_app_tabwise_global_value',$gval);
		}
		if($iTabGlobalValue){
			echo 'Color Update successfully.';exit;
		}else{
			echo 'Error in process';exit;
		}
	}

	function save_twotire()
	{
		$twotire = $this->input->post('data');
		// echo "<pre>";print_r($twotire);exit;
		$iTwotireInfotabId = $this->app_model->save('r_app_twotire_infotab_values',$twotire);
		if($iTwotireInfotabId){
 

	    if($_FILES['vHeaderImage']['name'] !='')
		{
		    $size=array();
		    $size['width']=160;
		    $size['height']=160;	
	    	$data['iTwotireInfotabId'] = $iTwotireInfotabId;
	        $vHeaderImagefile = $_FILES['vHeaderImage']['name'];
	        $fileName = $this->do_upload_galleryimg($iTwotireInfotabId,'twotire/headerimg','vHeaderImage',$size);
	        if($fileName){
	            $data['vHeaderImage'] = $fileName;    
	        }
	        $update_val = $this->app_model->update_twotire_value($data,$iTwotireInfotabId);
	    }

	    if($_FILES['vThumbnilImage']['name'] !=''){
		    $size=array();
		    $size['width']=80;
		    $size['height']=80;	
	    	$data['iTwotireInfotabId'] = $iTwotireInfotabId;
	        $vHeaderImagefile = $_FILES['vThumbnilImage']['name'];
	        $fileName = $this->do_upload_galleryimg($iTwotireInfotabId,'twotire/thumbimg','vThumbnilImage',$size);
	        if($fileName){
	            $data['vThumbnilImage'] = $fileName;    
	        }
	        $update_val = $this->app_model->update_twotire_value($data,$iTwotireInfotabId);
	    }



	}

}


function getalltwotirehtml($iApplicationId,$iAppTabId,$iFeatureId){
	

	//echo $iApplicationId;exit;
	/*	$iApplicationId = $this->input->get('iApplicationId');
	$iAppTabId = $this->input->get('iAppTabId');
	$iFeatureId = $this->input->get('iFeatureId');*/
	$alltwotiretabdata = $this->app_model->get_appwise_twotiretabdata($iApplicationId,$iAppTabId);
		//echo '<pre>';print_r($alltwotiretabdata);exit;
	//	$html .='<div class="popup_header"><h3>Edit Category</h3></div>';
	//$html .='<br><div class="add_btn_cat" ><a class="btn btn-primary"  href="#addmailcat_listing'.$iAppTabId.'" id="addmailingcategory"  style="float:right;">Add New Category</a></div>';
    
    $html .='
                <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                <tr class="nodrop">
                    <th>Thumb</th>
                    <th>Section</th>
                    <th>Active</th>
                    <th colspan="2" >Action</th>
                </tr>';
                
                if(count($alltwotiretabdata) > 0){
                    for($i=0;$i<count($alltwotiretabdata);$i++){
                        $k = $i+1; 
                    $html .='<tr class="row1a">
                                 <td width="15%"><img class="img_wrapper dark_shadow" src="'. $this->data['base_upload'].'twotire/thumbimg/'.$alltwotiretabdata[$i]["iTwotireInfotabId"].'/thumb_'.$alltwotiretabdata[$i]["vThumbnilImage"].'" width="53px" height="37px"></td>
                                 <td width="25%" align="center"><div class="sp_title_twotire">'.$alltwotiretabdata[$i]["vSection"].'</div><span class="sp_name_twotire">'.$alltwotiretabdata[$i]["vName"].'</span></td>
                                  <td width="25%" align="center">'.$alltwotiretabdata[$i]["eActive"].'</td>
                                 <td align="center" width="12%" ><a class="apptab_edit"  onclick="edit_twotire('.$alltwotiretabdata[$i]["iTwotireInfotabId"].','.$iAppTabId.','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                 <td align="center" width="13%" ><a class="button grey" onclick="delete_twotire('.$alltwotiretabdata[$i]["iTwotireInfotabId"].','.$iAppTabId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                            </tr>';    
                    }    
                }else{
                    $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Item founds.</td></tr>';
                }
            $html .='</table>';
    $html .='';
    
    return  $html;



}  

function getalltwotirpopupehtml($iApplicationId,$iAppTabId,$iFeatureId)
{
	//echo $iApplicationId;exit;
	$iApplicationId = $this->input->get('iApplicationId');
	$iAppTabId = $this->input->get('iAppTabId');
	$iFeatureId = $this->input->get('iFeatureId');
	$html = $this->getalltwotirehtml($iApplicationId,$iAppTabId,$iFeatureId);
    
    echo  $html;exit;
}


function twotire_delete()
{
    $iTwotireInfotabId = $this->input->get('iTwotireInfotabId');
    $iFeatureId = $this->input->get('iFeatureId');
	//echo $iTwotireInfotabId;exit;
    $twotireinfo = $this->app_model->get_one_twotiretabdata($iTwotireInfotabId);
    $iAppTabId = $twotireinfo['iAppTabId'];
    if($iTwotireInfotabId !=''){
        $id = $this->app_model->delete_twotiretabdata($iTwotireInfotabId);
        $thumbpath = 'uploads/twotire/thumbimg/'.$iTwotireInfotabId;
        $hdbpath = 'uploads/twotire/headerimg/'.$iTwotireInfotabId;
        if(is_dir($thumbpath)){
        	$this->rm_folder_recursively($thumbpath);
        }
        if(is_dir($hdbpath)){
        	$this->rm_folder_recursively($hdbpath);
        }
 		
    }
    $iApplicationId = $this->input->get('iApplicationId');
    
	$html .= $this->getalltwotirehtml($iApplicationId,$iAppTabId,$iFeatureId);                
    echo $html;exit; 
}

function showtwotirepopup()
{
	$iTwotireInfotabId = $this->input->get('iTwotireInfotabId');
	$iAppTabId = $this->input->get('iAppTabId');
	$iFeatureId = $this->input->get('iFeatureId');
	$twotireinfo = $this->app_model->get_one_twotiretabdata($iTwotireInfotabId);
	$iApplicationId = $twotireinfo['iApplicationId'];


    $all_featurefields = $this->app_model->get_featurefields($iFeatureId,$iAppTabId);
      //  echo '<pre>';print_r($all_featurefields);exit;
        $html .='<div id="twotireformid'.$iAppTabId.'" class="main_popup" >
                <div class="popup_header">
                    <h3>Edit Item</h3>
                </div>
                <div class="popup-body">';        
                    $html .='<div id="edittwotire_validation'.$iAppTabId.'" style="display:none;"></div>';
                $html .='<div class="widget-body form">';
                        $html .='<form class="form-horizontal" name="frmtwotire" id="editfrmtwotire'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/update_twotire" enctype="multipart/form-data">';
                        $html .= '<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$iApplicationId.'">';
                         $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
                          $html .= '<input class="span6" type="hidden" name="iTwotireInfotabId" value="'.$iTwotireInfotabId.'">';
                                foreach ($all_featurefields as $val){		  		 
                                    switch ($val['eType']) {
                                    case 'Textxbox':
                                        		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                   $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">';
                                                    	if($val['vDataBaseFieldName'] == "vBackgroundColor" || $val['vDataBaseFieldName'] == "vTextColor"){
                                                    		//$vVal = ($val['vDataBaseFieldName'] == "vBackgroundColor") ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)';
                                                    		$vVal = $twotireinfo[$val['vDataBaseFieldName']];
	                                                        $html .='<input type="text"  id="'.$val['vDataBaseFieldName'].$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" data-color-format="rgb" class="gcp color_text_hide" value="'.$vVal.'" style="width:35px !important;background:'.$vVal.';">';
                                                    	}else{
                                                        	$html .='<input type="text" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'edit'.$iAppTabId.'" name="data['.$val['vDataBaseFieldName'].']" value="'.$twotireinfo[$val['vDataBaseFieldName']].'">';
                                                        }
                                                    $html .='</div>
                                                </div>';
                                            break;
                                    case 'Checkbox':
                                        $html .='<div class="control-group">
                                                    <label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls">
                                                        <label class="checkbox">';
                                                        	if($twotireinfo[$val['vDataBaseFieldName']] == "Yes"){
	                                                            $html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" checked="checked">';
                                                        	}else{
	                                                            $html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" >';
                                                       		}
                                                        $html .='</label>
                                                    </div>
                                                </div>';
                                         break;
	
                                        case 'File':
                                        			$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                        $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e'.$iAppTabId.'" name="'.$val['vDataBaseFieldName'].'" style="float: left;"  onchange="CheckValidWebsiteImg(this.value,this.name)">';
                                                            
                                                            if($twotireinfo[$val['vDataBaseFieldName']] != '' && $val['vDataBaseFieldName'] == "vThumbnilImage"){
                                                                $fileurl = $this->data['base_upload']."twotire/thumbimg/".$twotireinfo['iTwotireInfotabId']."/".$twotireinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="detetethumbimgfile"><div style="float: left;"><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deletetwotirefile('.$twotireinfo['iTwotireInfotabId'].','."'thumbimg'".','."'vThumbnilImage'".');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                                            if($twotireinfo[$val['vDataBaseFieldName']] != '' && $val['vDataBaseFieldName'] == "vHeaderImage"){
                                                                $fileurl = $this->data['base_upload']."twotire/headerimg/".$twotireinfo['iTwotireInfotabId']."/".$twotireinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="deteteheaderimgfile"><div style="float: left;"><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deletetwotirefile('.$twotireinfo['iTwotireInfotabId'].','."'headerimg'".','."'vHeaderImage'".');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                               $html .= '<input  type="hidden" name="vOldFile" id="old'.$val['vDataBaseFieldName'].$iAppTabId.'" value="'.$twotireinfo[$val['vDataBaseFieldName']].'">';   
                                        	break;

                                       case 'Editor':
                                    	$html .='<div class="control-group">
                                                    <label class="control-label">'.$val['vLabelName'].'</label>
                                                    <div class="controls cedit">
                                                        <textarea class="input-xlarge ckeditor" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'f'.$iTwotireInfotabId.'" value="">'.$twotireinfo[$val['vDataBaseFieldName']].'</textarea>
                                                    </div>
                                                </div>';					
                                            break; 
							          }
                                    
                                }
                        $html .='</form>';
                    $html .='</div>';
                    $html .='<div class="row_form">
                    			<button type="button" class="btn btn-primary"  id="twotirebtn" name="twotirebtn" onclick="return updatetwotire('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                    		</div>';
        $html .='</div>
        <div class="popup-footer">
            <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
        </div>
    </div>';

    echo $html;exit;
 	//$html .='<div class="add_btn"><a class="btn btn-primary"  href="#twotireformid'.$iAppTabId.'" id="addtwotireid"  style="float:right;" onclick="open_ckeditor('.$iAppTabId.');">Add New Item</a></div>';



} 


function deletetwotirefile(){
	

	$iTwotireInfotabId = $this->input->get('iTwotireInfotabId');
	$type = $this->input->get('type');
	$filename = $this->input->get('filename');
	$path = "uploads/twotire/".$type."/".$iTwotireInfotabId;
	 if(is_dir($path)){
	 //	$this->rm_folder_recursively($path);
	 }
	$data[$filename] = "";
	//print_r($data) ;exit;
	$deleteFile = $this->app_model->update_twotire_value($data,$iTwotireInfotabId);
    if($deleteFile){
	  echo "delete";
    }else{
	  echo "No";
    }	
}

function update_twotire(){
	

   // echo '<pre>';print_r($this->input->post());exit;
	// $post=array();
 //   foreach ( $this->input->post('data') as $sForm => $value )
	// {
	// 	if ( get_magic_quotes_gpc() )
	// 		$postedValue = htmlspecialchars( stripslashes( $value ) ) ;
	// 	else
	// 		$postedValue = htmlspecialchars( $value ) ;

	// $post[$sForm] .=$value;
		
	// }
	// print_r($post);
	// exit;

    $iTwotireInfotabId = $this->input->post('iTwotireInfotabId');
    $iApplicationId = $this->input->post('iApplicationId');
    $data = $this->input->post('data');
   	$updatedetails = $this->app_model->update_twotire_value($data,$iTwotireInfotabId);


    if($_FILES['vHeaderImage']['name'] !=''){
	    $size=array();
	    $size['width']=160;
	    $size['height']=160;	
    	$data['iTwotireInfotabId'] = $iTwotireInfotabId;
        $vHeaderImagefile = $_FILES['vHeaderImage']['name'];
        $fileName = $this->do_upload_galleryimg($iTwotireInfotabId,'twotire/headerimg','vHeaderImage',$size);
        if($fileName){
            $data['vHeaderImage'] = $fileName;    
        }
        $update_val = $this->app_model->update_twotire_value($data,$iTwotireInfotabId);
    }

    if($_FILES['vThumbnilImage']['name'] !=''){
	    $size=array();
	    $size['width']=80;
	    $size['height']=80;	
    	$data['iTwotireInfotabId'] = $iTwotireInfotabId;
        $vHeaderImagefile = $_FILES['vThumbnilImage']['name'];
        $fileName = $this->do_upload_galleryimg($iTwotireInfotabId,'twotire/thumbimg','vThumbnilImage',$size);
        if($fileName){
            $data['vThumbnilImage'] = $fileName;    
        }
        $update_val = $this->app_model->update_twotire_value($data,$iTwotireInfotabId);
    }

   	

    echo $iTwotireInfotabId;exit;
}

//created by minakshi on 28th Mar 2014
function set_default_background_image()
{
	$apid =  $this->input->post('iApplicationId');
	$data = $this->input->post('data');	
	$data['iApplicationId'] = $apid;
	if($_FILES['vImage']['name']!='')
	{
		$tabbackground = array();
		$tabbackground['vImage'] = 'demo.png';
		$tabbackground['eStatus'] = 'Active';
		$tabbackground['iAdminId'] = $this->data[user_info][iAdminId];
		$iBackgroundId =  $this->app_model->save('r_tabbackground',$tabbackground);
		$data['iBackgroundimgId'] = $iBackgroundId;
		$Data['iBackgroundId'] = $iBackgroundId;
		$img_uploaded_partner = $this->do_upload_background_image($iBackgroundId,'uploads/background_image/');
		$tabbackground['vImage'] = $img_uploaded_partner;
		$tcid = $this->app_model->update_tabbackground($tabbackground,$iBackgroundId);
	}
	$app_background=array('iApplicationId'=>$data['iApplicationId'],
		'eType'=>$data['eType'],
		'iBackgroundId'=>$data['iBackgroundimgId'],
		'iApplicationId'=>$data['iApplicationId']
		);
	
	$iAppDefBackgroundId=$this->app_model->get_one_user_defappbackground($app_background['iApplicationId'],$data['eType']);	
	//echo "<pre>";print_r($iAppDefBackgroundId);exit;
	if((sizeof($iAppDefBackgroundId) > 0))
	{
		$update_defapptable=  $this->app_model->update_default_appbackground($app_background,$iAppDefBackgroundId['iAppDefBackgroundId']);
	}
	else
	{
		$saveData =  $this->app_model->save('r_app_default_background_img',$app_background);
	}
	/*echo "dkdrtgdhfk";exit;
	$exist_data = $this->app_model->get_one_user_deftabbackground($data['iApplicationId'],$data['eType']);	
	//echo "<pre>";print_r($exist_data);exit;
	if(sizeof($exist_data) > 0)
	{
		$id =  $this->app_model->update_user_deftabbackground($data,$exist_data['iAppDefBackgroundId']);
	}
	else
	{
		$id =  $this->app_model->save('r_app_default_background_img',$data);
	}*/
	redirect($this->data['base_url'] . 'app/step6/'.$apid);
}

function delete_user_defbackground_image()
{
	$apid = $this->uri->segment(3);
	$id = $this->input->get('defbgId');
	if($id)
	{
		$rid =  $this->app_model->user_defbackground_image($id);
	}
	redirect($this->data['base_url'] . 'app/step6/'.$apid);
}
	function getorderhtmldetail($iFeatureId,$iAppTabId)
	{
		$html='';
		
        $iApplicationId=$this->data['iApplicationId'];
		$all_featurefields = $this->app_model->get_featurefields($iFeatureId);
		$all_printerdetails = $this->app_model->get_printer_details($iApplicationId);
		$all_orders = $this->app_model->get_orderlist($iApplicationId);
		
		$all_get_totalorder = $this->app_model->total_order($iApplicationId);
		$get_payment_status = $this->app_model->get_payment_appplicationid($iApplicationId);
		$allappmenu = $this->app_model->get_appwise_menu($iApplicationId,$iAppTabId);
		if(count($allappmenu) >0){
			$allappitem= $this->app_model->get_appwise_item($iApplicationId,$allappmenu[0]['iAppTabId']);
		}
		
        $html .='<div class="add_btn"><strong>Items Manage : </strong><a class="btn btn-primary"  href="#orderformid'.$iAppTabId.'" id="addpdfid"  style="float:right;">Manage Items</a></div>';
	    $html .='<div id="manage_item_listing">
					  <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    	<tr class="nodrop">
							<th>Categories</th>
							<th>Items</th>
						 </tr>	
						 <tr>
							<td>'.count($allappmenu).'</td>
							<td>'.count($allappitem).'</td>
						 </tr>
					 </table>
				</div><br><br>';
		
		$html .='<div class="add_btn"><strong>Order Manage : </strong><a class="btn btn-primary"   href="#menuorderformid'.$iAppTabId.'" id="addpdfid"  style="float:right;">Manage Orders</a></div>';
	    $html .='<div id="manage_order_listing">
					  <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    	<tr class="nodrop">
							<th>Total Orders</th>
							<th>Unserved</th>
						 </tr>	
						 <tr>
							<td>'.count($all_get_totalorder).'</td>
							<td>'.count($all_orders).'</td>
						 </tr>
					 </table>
				</div><br><br>';
		
		
		$html .='<div class="add_btn"><strong>Printer : </strong><a class="btn btn-primary"  href="#printerorder'.$iAppTabId.'" id="addpdfid"  style="float:right;">Add Printer</a></div>';
		$html .='<div id="total_order">';
			$html .='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">';
			
			$html .='<tr>';
			$html .='<th>Printer Name</th>';
			$html .='<th colspan="2">Action</th>';
			$html .='</tr>';
			
			foreach($all_printerdetails as $val){
				$html .='<tr>';
				$html .='<td>'.$val['vPrinterTitle'].'</td>';
				$html.='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_printerdetails('.$val['iPrintId'].','.$iAppTabId.','.$iApplicationId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
					<td align="center" width="13%"><a class="button grey" onclick="delete_printerdetails('.$val['iPrintId'].','.$iApplicationId.','.$iAppTabId.','.$iFeatureId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
				$html .= '</tr>';
			}
			
			$html .='</table>';
		$html .='</div><br><br>';

			// Description    :- Get Payment data
		$html .='<div class="add_btn"><strong>Payment Detail : </strong><a class="btn btn-primary"   href="#paymentformid" id="addpdfid"  style="float:right;">Edit</a></div>';
	    $html .='<div id="paypal_details">
					  <table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="">
                    	<tr class="nodrop">
							<th>PayPal</th>
							<th><input type="text" value="'.$get_payment_status['eStatus'].'"></th>
						 </tr>	
					 </table>
				</div>';
			
		$html .= $this->gethtmlofmanageitems($iFeatureId,$iAppTabId,$iApplicationId);	
		$html .= $this->gethtmlofmanageorders($iFeatureId,$iAppTabId,$iApplicationId);		    	
		$html .= $this->gethtmlofprinterorder($iFeatureId,$iAppTabId,$iApplicationId);		    	
		$html .= $this->getpaymentdetails($iFeatureId,$iAppTabId,$iApplicationId);
	   return $html;
	}

	function getpaymentdetails($iFeatureId,$iAppTabId,$iApplicationId)
	{
		/*echo $iAppTabId.'-'.$iFeatureId.'-'.$iApplicationId;exit;*/
            $html .='<div id="paymentformid" class="main_popup" style="display:none;">
	                   	 <div class="popup_header">
	                        <h3><center>Payment Details<center></h3>
	                   	 </div>';

			    	$html .='<div class="popup-body">';
			    			$html .='<div id="addpayment_validation'.$iAppTabId.'" style="display:none;"></div>';
		                   				
		                            		$html .='<form class="form-horizontal" name="frmpayment" id="frmpayment_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_paymentdetails" enctype="multipart/form-data">';
					                           	 	 $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$iApplicationId.'">';
					                           	 	 $html .= '<input class="span6" type="hidden" name="data[iAppTabId]" value="'.$iAppTabId.'">';
					                           	 	  $html .='<div class="control-group">
							                                        <label class="control-label">Status</label>
								                                        <div class="controls">
								                                            <select name="data[eStatus]" id="eStatus">
								                                            	<option value="" selected="selected">Select Status</option>
								                                                <option value="Enabled" >Enabled</option>
								                                                <option value="Disabled">Disabled</option>
								                                            </select>
								                                        </div>
						                                    		</div>';
						                               $html .='<div class="control-group">
							                            			<label class="control-label">API UserID</label>
							                                      		<div class="controls">
							                                      			<input type="text" value=""  class="input-xlarge" id="tAPIUserId" name="data[tAPIUserId]" >
							                                     		</div>
							                                     </div>';
							                            $html .='<div class="control-group">
						                            				<label class="control-label">Password</label>
						                                      		<div class="controls">
						                                      			<input type="text" value=""  class="input-xlarge" id="tAPIPassword" name="data[tAPIPassword]" >
						                                     		</div>
						                                     	</div>';
						                                $html .='<div class="control-group">
						                            				<label class="control-label">Signature</label>
						                                      		<div class="controls">
						                                      			<input type="text" value=""  class="input-xlarge" id="tAPISignature" name="data[tAPISignature]" >
						                                     		</div>
						                                     	</div>';
		                                    $html .='</form>';
		          

		                   $html .='<br><div class="row_form">
                    					<button type="button" class="btn btn-primary"  id="twotirebtn" name="twotirebtn" onclick="return submitpayment('.$iAppTabId.','.$iFeatureId.');"><i class="icon-ok"></i> Save</button>
                    				</div>';
		                        
		            $html .='</div>';

		            	$html .='<div class="popup-footer">
						            <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
						       </div>';
			$html.='</div>';        
		                     	  
        	
        

     	return $html;
    }
    function save_paymentdetails(){
    	$data = $this->input->post('data');
		$iApplicationId = $this->input->post('iApplicationId');
    	$get_payment_appplicationId = $this->app_model->get_payment_appplicationid($iApplicationId);

    	if($get_payment_appplicationId['iApplicationId']==$iApplicationId){
    			$data['iApplicationId'] = $get_payment_appplicationId['iApplicationId'];
    			$iPaymentId = $this->app_model->update_payment_details($data);
    	}
    	else{
    		$data['iApplicationId'] = $iApplicationId;
    		$iPaymentId = $this->app_model->insert_payment_details($data);
    	}
    	redirect($this->data['base_url'] . 'app/step3/'.$data['iApplicationId']);
		exit;
    	    	
    }
	
	function geteditprinterhtml()
	{
		// printer html details
		
		$iPrintId = $this->input->get('iPrintId');
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		
		// get printer id and list out the content of printer
		$printerDetails = $this->app_model->get_printer_edit_details($iPrintId);
		
		$html ='';
		$html .= '<div id="validationprinter'.$iAppTabId.'"></div>';
		$html .= '<div id="editprinterorder'.$iAppTabId.'" class="main_popup">';
		$html .= '<div class="popup_header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeleanmodal();">×</button>
                    <h3>Edit Printer</h3>
                 </div>';
		$html .= '<div class="popup-body">';        
		
		$html .= '<div id="printer_listing'.$iAppTabId.'">
				 <form name="frmprinteredit" id="frmprinteredit_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_printer" class="form-horizontal" enctype="multipart/form-data">';
			
			$html .='<input type="hidden" name="iApplicationId" id="iApplicationId" value="'.$iApplicationId.'"/>';
			$html .='<input type="hidden" name="iAppTabId" id="iAppTabId" value="'.$iAppTabId.'"/>';
			$html .='<input type="hidden" name="iPrintId" id="iPrintId" value="'.$printerDetails[0]['iPrintId'].'"/>';
			
			$html .='<div class="control-group">
						<div class="controls cedit">
							<input type="checkbox" name="iEnablePrinter" id="iEnablePrinter" value="1" "';
							$html.= $printerDetails[0]['iEnablePrinter']=='1'?"checked":"";
							$html.= '" /> &nbsp; Enable e-print Printers
						</div>
					</div>';
					
			$html .='<div class="control-group">
						<label class="control-label">Printer Title</label>
						<div class="controls cedit">
							<input type="text" name="vPrinterTitle" id="vPrinterTitle" value="'.$printerDetails[0]['vPrinterTitle'].'"/>
						</div>
					</div>';
					
			$html .='<div class="control-group">
						<label class="control-label">Printer Email</label>
						<div class="controls cedit">
							<input type="text" name="tPrinterEmail" id="tPrinterEmail" value="'.$printerDetails[0]['tPrinterEmail'].'"/>
						</div>
					</div>';
					
			$html .='<div class="control-group">
						<label class="control-label">Location</label>
						<div class="controls cedit">
							<input type="text" name="vLocation" id="vLocation" value="'.$printerDetails[0]['vLocation'].'"/>
						</div>
					</div>';							
														
		 $html .='<div class="row_form">
                  <button type="button" class="btn btn-primary"  id="printerbtn" name="printerbtn" onclick="return edit_printer_details('.$iAppTabId.','.$iApplicationId.');"><i class="icon-ok"></i> Edit</button>
                  </div>';
				  
		$html .='</form>';
		$html .='</div></div>';
		
		$html .='</div>';
		
		echo $html;
	}
	
	function gethtmlofprinterorder($iFeatureId,$iAppTabId,$iApplicationId)
	{
		$html='';
		$html .='<div id="printerorder'.$iAppTabId.'" class="main_popup" style="display:none;">';
		$html .='<div class="popup_header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeleanmodal();">×</button>
                    <h3>Add Printer</h3>

                 </div>';
		$html .='<div class="popup-body">';        
		
		$html .='<div id="printer_listing'.$iAppTabId.'">
				 <form name="frmprinter" id="frmprinter_'.$iAppTabId.'" method="post" action="'.$this->data['base_url'].'app/save_printer" class="form-horizontal" enctype="multipart/form-data">';
			
			$html .='<input type="hidden" name="iApplicationId" id="iApplicationId" value="'.$iApplicationId.'"/>';
			$html .='<input type="hidden" name="iAppTabId" id="iAppTabId" value="'.$iAppTabId.'"/>';
			
			$html .='<div class="control-group">
						<div class="controls cedit">
							<input type="checkbox" name="iEnablePrinter" id="iEnablePrinter'.$iAppTabId.'" value="1"/> &nbsp; Enable e-print Printers
						</div>
					</div>';
					
			$html .='<div class="control-group">
						<label class="control-label">Printer Title</label>
						<div class="controls cedit">
							<input type="text" name="vPrinterTitle" id="vPrinterTitle'.$iAppTabId.'" />
						</div>
					 </div>';
					
			$html .='<div class="control-group">
						<label class="control-label">Printer Email</label>
						<div class="controls cedit">
							<input type="text" name="tPrinterEmail" id="tPrinterEmail'.$iAppTabId.'" />
						</div>
					</div>';
					
			$html .='<div class="control-group">
						<label class="control-label">Location</label>
						<div class="controls cedit">
							<input type="text" name="vLocation" id="vLocation'.$iAppTabId.'" />
						</div>
					</div>';							
														
		 $html .='<div class="row_form">
                  <button type="button" class="btn btn-primary"  id="printerbtn" name="printerbtn" onclick="return save_printer_details('.$iAppTabId.','.$iApplicationId.');"><i class="icon-ok"></i> Save</button>
                  </div>';
		
				  
		$html .='</form>';
		$html .='</div></div>';
		
		$html .='</div>';
		
		return $html;
	}
	
	// delete printer details
	function delete_printer_details()
	{
		$data['iPrintId'] = $this->input->get('iPrintId');
		$data['iApplicationId'] = $this->input->get('iApplicationId');
		$data['iFeatureId'] = $this->input->get('iFeatureId');
		$data['iAppTabId'] = $this->input->get('iAppTabId');
		
		$iPrinterId = $this->app_model->delete_printer_details($data);
		
		$all_printerdetails = $this->app_model->get_printer_details($data['iApplicationId']);
		
		$html .='';
		$html .='<table width="100%" style="table-layout:auto; word-break:break-all; word-wrap:break-word;" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">';
			
			$html .='<tr>';
			$html .='<th>Printer Name</th>';
			$html .='<th colspan="2">Action</th>';
			$html .='</tr>';
			
			foreach($all_printerdetails as $val)
			{
				$html .='<tr>';
				$html .='<td>'.$val['vPrinterTitle'].'</td>';
				$html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_printerdetails('.$val['iPrintId'].','.$data['iAppTabId'].','.$data['iApplicationId'].');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td><td align="center" width="13%"><a class="button grey" onclick="delete_printerdetails('.$val['iPrintId'].','.$data['iApplicationId'].','.$data['iAppTabId'].','.$data['iFeatureId'].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>';
				$html .='</tr>';
			}
			$html .='</table>';
			
		echo $html;
		exit;
	}
	
	// printer save funtion
	function save_printer()
	{
		$data['iApplicationId'] = $this->input->post('iApplicationId');
		$data['iAppTabId'] = $this->input->post('iAppTabId');
		$data['iEnablePrinter'] = $this->input->post('iEnablePrinter');
		$data['vPrinterTitle'] = $this->input->post('vPrinterTitle');
		$data['tPrinterEmail'] = $this->input->post('tPrinterEmail');
		$data['vLocation'] = $this->input->post('vLocation');
		
		if($this->input->post())
		{
			if(!$this->input->post('iPrintId'))
			{
				$iPrinterId = $this->app_model->insert_printer_details($data);
			}else{
				$iPrinterId = $this->app_model->update_printer_details($data,$this->input->post('iPrintId'));
			}
		}			
		redirect($this->data['base_url'] . 'app/step3/'.$data['iApplicationId']);
		exit;
	}
	
	function gethtmlofmanageorders($iFeatureId,$iAppTabId,$iApplicationId)
	{
		// echo $iApplicationId;exit;
		$all_orders = $this->app_model->get_orderlist_details($iApplicationId);
		
		/*echo "<pre>";
			print_r($all_orders);
		exit;*/
		$html='';
		$html .='<div id="menuorderformid'.$iAppTabId.'" class="main_popup" style="display:none;">';
		$html .='<div class="popup_header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeleanmodal();">×</button>
                    <h3>Order List</h3>
                 </div>';
		$html .='<div class="popup-body">'; 
		
		$html .='<div id="menu_listing'.$iAppTabId.'">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
					<tr class="nodrop">
                        <th>Order ID</th>
                        <th>Item Details</th>
                        <th>OrderDate</th>
                        <th>Type / State</th>
                        <th>Paid</th>
                        <th>Customer Name</th>
                        <th>Delivery Address</th>
                    </tr>';
               
			foreach ($all_orders as $key => $value) 
			{
				$iUserId = $value['iUserId'];
				$all_item_get = $this->app_model->get_item_get($iUserId);
				
				$test = Array();
				for($i=0;$i<count($all_item_get);$i++){
					$test[] = $all_item_get[$i]['vItemName'];
				}
				$myitem = implode(",",$test);
				
				$html .='<tr class="row1a">
							<td width="">'.$value['iOrderId'].'</td>
							<td width="">'.$myitem.'</td>
							<td width="">'.$value['dPaymentDate'].'</td>
							<td width="">'.$value['eStatus'].'</td>
							<td width="">Paid</td>
							<td width="">'.$value['vName'].'</td>
							<td width="">'.$value['tAddress'].'</td>
						 </tr>'; 					
			}

         $html .='</table>';	
		 $html .='</div></div>';
		 $html .='</div>';
		
		 return $html;
	}
	
	/**
		Description : Update the project content details
	**/
	function updateDataContent()
	{
		$Data=$this->input->post('data');
		$Data['iApplicationId'] = $this->input->post('iApplicationId');
		$Data['projectPrimaryId'] = $this->input->post('projectPrimaryId');
		
		if(!($Data['projectPrimaryId'])){
			$projectid = $this->app_model->insert_app_project_details($Data);
		//	$create_zip = $this->createmyzip($Data['iApplicationId'],$projectid);	
		}else{
			$Data['projectStatus'] = 'New';
			$this->app_model->update_app_project_details($Data);			
		//	$create_zip = $this->create_zip_of_application_folder($Data['iApplicationId'],$Data['iProjectId']);	
		}
		
		// create zip file details
		redirect($this->data['base_url'] . 'app/projectdownload/'.$Data['iApplicationId']);	    
	}

function projectdownload()
	{
  			$this->data['tpl_name']= "view-app-download.tpl";
  			$id = $this->uri->segment(3);
  			$this->data['iApplicationId'] = $id;  
  			$iClientId = $this->data['user_info']['iAdminId'];
        		$iRoleId = $this->data['user_info']['iRoleId'];
        
         		$this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
         		$this->data['projectinforamtion'] = $this->app_model->get_all_projectinformation_details($this->data['iApplicationId']);
  			
  			/** get details about application **/
  			$get_details_about_application = $this->app_model->get_details_about_app($id);	
  			
		     	  if(!$this->data['appinformation']){
			  $this->session->set_flashdata('warning',"1");
			  $this->data['warning'] = $this->session->flashdata('warning');
			  $home = $this->uri->segment(1);
	    		 redirect($this->data['base_url'].$home); 
	    		 exit;       
         }
        
         $selected_feature_details = $this->selected_feature_details($id);
  		   $this->data['selected_feature_details'] = $selected_feature_details;
         if(!$this->data['selected_feature_details']){
    			redirect($this->data['base_url'].'app/step2/'.$id); 
    			exit;       
         }
  			$appinformation=$this->app_model->appinformation_by_id($id);
  			$this->data['appinformation']=$appinformation;

  			//get payment details
  			$this->data['final_details'] = $get_details_about_application;
  			$this->data['paymentinfo'] = $this->publishapp_model->get_payment_details($id);
  			$this->data['mobiledefbgImg'] = $this->app_model->getDefaultBackgroundId($id,'Mobile');
  			$this->data['tabletdefbgImg'] = $this->app_model->getDefaultBackgroundId($id,'Tablet');
     		//echo "<pre>";print_r($this->data['tabletdefbgImg']);exit;
  
  			$this->data['tabbackground'] = $this->get_all_tabbackground();
  			$this->data['your_tabbackground'] = $this->get_all_tabbackground_admin();

  			$this->data['paymentmessage'] = $this->session->flashdata('paymentmessage');
 
  			$this->smarty->assign('data', $this->data);
  			
  			$this->smarty->view('template.tpl'); 
 		}

	/** apkdownload **/
	function apkdownload()
	{
		$iApplicationId = $this->uri->segment(3);
		$name = $this->app_model->get_project_info_name($iApplicationId);
		$file = '/var/www/html/easy_apps_co_uk_ci/phonegap/iihphonegap/projectinfo/project1/ProjectBuild/www-'.$iApplicationId.'/'.$name['projectDomainName'].$name['projectName'].'-debug.apk';

		if (file_exists($file)) {
    		header('Content-Description: File Transfer');
    		header('Content-Type: application/octet-stream');
    		header('Content-Disposition: attachment; filename='.basename($file));
    		header('Expires: 0');
    		header('Cache-Control: must-revalidate');
    		header('Pragma: public');
    		header('Content-Length: ' . filesize($file));
    		readfile($file);
    		exit;
		}	else{
			redirect($this->data['base_url'] . 'app/projectdownload/'.$iApplicationId);	   	
		}
	}
	
	/**
		Create Zip file of application folder
	**/
	function create_zip_of_application_folder($iApplicationId,$iProjectId)
	{
		$url = $this->data['base_url'].'download/www-'.$iApplicationId;
		$path = getcwd();
		$path.'\projectinfo\project'.$iProjectId.'\DataProvided';
		
		/** directory create**/
		mkdir($path.'\projectinfo\project'.$iProjectId.'\DataGenerated', 0777, true);
		mkdir($path.'\projectinfo\project'.$iProjectId.'\DataProvided', 0777, true);
		
		chmod($path.'\projectinfo', 0777);
		chmod($path.'\projectinfo\project'.$iProjectId.'', 0777);
		chmod($path.'\projectinfo\project'.$iProjectId.'\DataProvided', 0777);
		chmod($path.'\projectinfo\project'.$iProjectId.'\DataGenerated', 0777);
		
		$output = $path.'\projectinfo\project'.$iProjectId.'\DataProvided\www-'.$iApplicationId.'.zip'; 
		$input = $path.'\downloads\www-'.$iApplicationId;
		$createzip = $this->zipFile($input,$output, true); //Call to function
		
		// transfer zip file into another server
		$server = $this->transferzip_another_server($iApplicationId,$iProjectId);
		
		// extract zip file
		$extractzip = $this->extractzip($iApplicationId,$iProjectId);
		
		return true;
	}
	
	/**
		Transfer Zip file Into Another Server
	**/
	function transferzip_another_server($iApplicationId,$iProjectId)
	{
		$path = getcwd();
		
		/** Transfer file from one server to another **/
		$file = $path.'\projectinfo\project'.$iProjectId.'\DataProvided\www-'.$iApplicationId.'.zip';
		$remote_file = 'www-'.$iApplicationId.'.zip';
		
		$ftp_server = '54.68.150.28';
		// set up basic connection
		$conn_id = ftp_connect($ftp_server);
		// login with username and password
		$login_result = ftp_login($conn_id, 'phonegap_a', 'phonegap_a');
		
		// upload a file
		if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)){
			// close the connection
			ftp_close($conn_id);
		 	return true;
		} else {
			// close the connection
			ftp_close($conn_id);
			return false;
		}	
	}
	
	function extractzip($iApplicationId,$iProjectId)
	{
		$path = getcwd();
		
		// Extract Files
		$file = $path.'\projectinfo\project'.$iProjectId.'\DataProvided\www-'.$iApplicationId.'.zip';
		$zip = new ZipArchive;
		
		if($zip->open($file) === true) 
		{
			for($i = 0; $i < $zip->numFiles; $i++) 
			{
				$zip->extractTo($path.'\projectinfo\project'.$iProjectId.'\DataProvided\www-'.$iApplicationId, array($zip->getNameIndex($i)));
			}
			return $zip->close();
		}
	}
	
	function zipFile($source, $destination, $flag = '')
	{
		if (!extension_loaded('zip') || !file_exists($source)) 
		{
		   return false;
		}
		$zip = new ZipArchive();
		
		if (!$zip->open($destination, ZIPARCHIVE::CREATE)) 
		{
		   return false;
		}
		$source = str_replace('\\', '/', realpath($source));
		
		if($flag)
		{
			$flag = basename($source) . '/';
		}
		if (is_dir($source) === true)
		{
			$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
			foreach ($files as $file)
			{
				$file = str_replace('\\', '/', realpath($file));
				if (strpos($flag.$file,$source) !== false) { // this will add only the folder we want to add in zip
					if (is_dir($file) === true)
					{
						$zip->addEmptyDir(str_replace($source . '/', '', $flag.$file . '/'));
					}
					else if (is_file($file) === true)
					{
						$zip->addFromString(str_replace($source . '/', '', $flag.$file), file_get_contents($file));
					}
				}
			}
		}
		else if (is_file($source) === true)
		{
			$zip->addFromString($flag.basename($source), file_get_contents($source));
		}
		return $zip->close();
	}
	
	
	// Item manage details html
	function gethtmlofmanageitems($iFeatureId,$iAppTabId,$iApplicationId)
	{
		//$all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $allappmenu = $this->app_model->get_appwise_menu($iApplicationId,$iAppTabId);
		
		//echo "<pre>";print_r($allappmenu);
		//exit;
		$html  ='';
		$html .='<div id="orderformid'.$iAppTabId.'" class="main_popup" style="display:none;">';
		$html .='<div class="popup_header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="closeleanmodal();">×</button>
                 <h3>Item Manage</h3>
                 </div>';
				 
		$html .= '<div class="popup-body">';  
		
    		$html .='<div id="menu_listing'.$iAppTabId.'">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
		<tr class="nodrop">
                        <th>Name</th>
                        <th>Add Item</th>
                        <th colspan="2"><center>Action</center></th>
                    </tr>';	
           	
		if(count($allappmenu) > 0){
			for($i=0;$i<count($allappmenu);$i++)
			{
					$k = $i+1; 
					$html .='<tr class="row1a">
							 <td width="60%"><p class="sp_title">'.$allappmenu[$i]["vName"].'</p></td>';
					$html .='<td class="add_btn"><a class="btn btn-primary"  onclick="add_item('.$allappmenu[$i]["iMenuID"].','.$allappmenu[$i]['iAppTabId'].','.$iApplicationId.');">Add Item</a></td>';
					$html .='<td align="center" width="12%"><a class="apptab_edit" onclick="edit_menu('.$allappmenu[$i]["iMenuID"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
							 <td align="center" width="13%"><a class="button grey" onclick="delete_menu('.$allappmenu[$i]["iMenuID"].','.$iAppTabId.');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
					</tr>'; 
				}    
			}else{
				$html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Menu found.</td></tr>';
			}
		$html .='</table>';
				
	    $html .='</div>';
		$html .='</div></div>';
		
        return $html;
	}
	
	/*
		Functionality : Reservation
	*/
	
	function hoursToMinutes($hours)
		{
			if (strstr($hours, ':'))
			{
				# Split hours and minutes.
				$separatedData = split(':', $hours);

				$minutesInHours    = $separatedData[0] * 60;
				$minutesInDecimals = $separatedData[1];

				$totalMinutes = $minutesInHours + $minutesInDecimals;
			}
			else
			{
				$totalMinutes = $hours * 60;
			}

			return $totalMinutes;
		}
	
	function minutesToHours($minutes)
	{
	    $hours          = floor($minutes / 60);
	    $decimalMinutes = $minutes - floor($minutes/60) * 60;
	 
	    # Put it together.
	    $hoursMinutes = sprintf("%d:%02.0f", $hours, $decimalMinutes);
	    return $hoursMinutes;
	}
	
	function getreservationhtml($iFeatureId,$iAppTabId){
		
		$this->load->model('reservation_tab_model', '', TRUE);
		//$all_featurefields = $this->reservation_tab_model->get_resfeaturefields($iFeatureId);
		//echo '<pre>'; print_r($all_featurefields); exit;
		$all_services= $this->reservation_tab_model->get_tabwise_service($iAppTabId);
		//echo '<pre>'; print_r($all_services); exit;
		
		$all_currency= $this->reservation_tab_model->get_currency();
		//echo '<pre>'; print_r($all_currency); exit;
		
		$curr_general_info = $this->reservation_tab_model->get_general_info($this->data['iApplicationId']);
		//echo '<pre>'; print_r($curr_general_info); exit;
		if($curr_general_info=="0"){
			for($i=0;$i<7;$i++){
				$newtime[]='540';
				$newtime[]='1080';	
			}
			
		}
		else{
			$all_time = explode(',',$curr_general_info['vServiceTiming']);
			//print_r($all_time); exit;
			foreach($all_time as $key=>$val){
				$time[]=explode('-',$val);
			}

			foreach($time as $key=>$val){
				foreach($val as $key1=>$val1){
					$newtime[]=$this->hoursToMinutes($val1);
				}
			}
		}
		
		//echo '<pre>'; print_r($newtime); exit;
		
		$all_location_details= $this->reservation_tab_model->get_locations($this->data['iApplicationId']);
		//echo '<pre>'; print_r($all_location_details); exit;
		
		$curr = '';
		foreach($all_currency as $key=>$val){
		$curr .='<option value="'.$val['currency_id'].'">'.$val['currency_name'].'('.$val['currency_code'].')</option>';	
		}
		
		$curr_loc ='';
		
		foreach($all_location_details as $key=>$val){
			$curr_loc .='<tr id="all_location_details'.$val['iLocationId'].'">';
			$curr_loc .='<td>'.$val['vAddress1'].' '.$val['vCity'].' '.$val['vState'].' '.$val['vZip'].'</td>

							<td><a class="apptab_edit" style="" onclick="edit_location_one('.$val['iLocationId'].')"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
							<td><a class="button grey" style="" onclick="delete_location('.$val['iLocationId'].');"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
						</tr>';
		}	
		
		$html .='<script src="http://admin.easy-apps.co.uk/assets/js/app_reservation.js" type="text/javascript"></script>';
		$html .='<style>
							.range-checkbox { clear:left; float:left; margin:13px 10px 10px; }
							.range-label { float:left; display:block; width:80px; margin:10px; cursor: pointer; }
							.range-slider { float:left; margin:10px; }
							.range-slider2 { float:left; margin:10px; }
							.range-time { width:100px; float:left; margin:10px; }
							.range-day-disabled { opacity:.5; }
							.range-day .ui-slider-range { background: #00A000; }
							.range-day .ui-slider-handle { cursor:w-resize !important; }
							.range-day-disabled .ui-slider-range { background: #fff; }
							.range-day-disabled .ui-slider-handle { cursor:default !important; background:none !important; border:none !important; }
							.range-values { position:relative; display:block; height:20px; overflow:hidden; margin:10px 0 10px; }
							.range-values span { position: absolute; border-left: 1px solid grey; padding-left:5px }
							.range-values span.r-0 { left:0 }
							.range-values span.r-3 { left:12.5% }
							.range-values span.r-6 { left:25% }
							.range-values span.r-9 { left:37.5% }
							.range-values span.r-12 { left:50% }
							.range-values span.r-15 { left:62.5% }
							.range-values span.r-18 { left:75% }
							.range-values span.r-21 { left:87.5% }
							.range-values span.r-24 { left:100%;margin-left:-1px; }

							/* RESULT DATA STYLES */
							#schedule { width: 500px; background:#eee; margin-top:20px; }
							#schedule th { text-align: left;border-bottom:1px solid grey; }
							#schedule th,#schedule td { padding:5px; }

							/************ PARAMS ************/

							.range-slider,.range-values,.range-slider2 {
							  width: 400px;
							}
							.range-values,#schedule,h1 {
							  margin-left: 143px;
							}
							</style>';
		//Manage Service Modal
		/*$html .= '<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display:none;">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&amp;times;</button>
				            <h4 style="color:#FFFFFF;">Service</h4>
				            </div>
				            <div class="modal-body">
				                <a class="btn btn-primary"  style="" onclick="open_modal2();">Add New Services</a>
				                <table class="table table-striped table-bordered dataTable" id="all_service_id">
				                	<thead>
										<tr>
											<td>Name</td>
											<td>Price</td>
											<td>Reservation Fee</td>
											<td>Duration</td>
											<td>Status</td>
										</tr>
									</thead>';
									foreach($all_services as $key=>$val){
										$html .='<tr>
													<td>'.$val['vServiceName'].'</td>
													<td>'.$val['vPrice'].'</td>
													<td>'.$val['vReservationFee'].'</td>
													<td>'.$val['iDuration'].'</td>
													<td>'.$val['eStatus'].'</td>
												 </tr>';
									}
									$html .='</table>
				          	</div>
				            <div class="modal-footer">
				            	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                <button type="button" class="btn btn-primary">Save changes</button>
				        	</div>
				    </div>
				  </div>
				</div>';*/
	   // End Manage Service Modal
		
       // New Service Modal
       	$html .= '<div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display:none;">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					            <h4 style="color:#FFFFFF;">New Service</h4>
				            </div>
				            <div class="modal-body">
				            	<div id="Reservationservice_validation" style="display:none;"></div>
				            	
				                <strong>Item Details:</strong>
				                <table>
									<tr>
										<td style="width:20%">Service Name<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Service Name </span></a></td>
										<td style="width:20%">Price<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Price  </span></a></td></td>
										<td style="width:20%">Reservation Fee<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Reservation Fees </span></a></td></td>
										<td style="width:20%">Max Service<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Max Number of Service </span></a></td></td>
										<td style="width:20%">Duration<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Duration of time </span></a></td></td>
									</tr>
									<tr>
										<td><input type="text" name="vServiceName" id="vServiceName" value="" /></td>
										<td><input type="text" name="vPrice" id="vPrice" value="'.number_format($number, 2, '.', '').'" style="width:50px;" onkeypress="return isPriceKey(event)" /> '.$this->data['user_info']['vCurrency'].'</td>
										<td><input type="text" name="vReservationFee" id="vReservationFee" value="'.number_format($number, 2, '.', '').'" style="width:50px;" onkeypress="return isPriceKey(event)" /> '.$this->data['user_info']['vCurrency'].'</td>
										<td><input type="text" name="vMaxService" id="vMaxService" value="" style="width:50px;" onkeypress="return isPriceKey(event)" /></td>
										<td><input type="text" name="iDuration" id="iDuration" value="" style="width:50px;" onkeypress="return isPriceKey(event)" /> Mins</td>
									</tr>
								</table>
								<strong>Availability:</strong>
								<select name="">
									<option>None</option>
									<option>Any Open Time</option>
									<option>Specific Time</option>
								</select>
								<br />
							  
							  <div class="range-day" id="range-day-1" data-day="1">
							    <input type="checkbox" name="day-1" id="day-1" value="1" class="range-checkbox" checked>
							    <label for="day-1" class="range-label">Monday:</label>
							    <div id="range-slider-11" class="range-slider2"></div>
							    <span id="range-time-service" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-2" data-day="2">
							    <input type="checkbox" name="day-2" id="day-2" value="1" class="range-checkbox" checked>
							    <label for="day-2" class="range-label">Tuesday:</label>
							    <div id="range-slider-12" class="range-slider2"></div>
							    <span id="range-time-2" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-3" data-day="3">
							    <input type="checkbox" name="day-3" id="day-3" value="1" class="range-checkbox" checked>
							    <label for="day-3" class="range-label">Wednesday:</label>  
							    <div id="range-slider-13" class="range-slider2"></div>
							    <span id="range-time-3" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-4" data-day="4">
							    <input type="checkbox" name="day-4" id="day-4" value="1" class="range-checkbox" checked>
							    <label for="day-4" class="range-label">Thursday‎:</label>  
							    <div id="range-slider-14" class="range-slider2"></div>
							    <span id="range-time-4" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-5" data-day="5">
							    <input type="checkbox" name="day-5" id="day-5" value="1" class="range-checkbox" checked>
							    <label for="day-5" class="range-label">Friday:</label>  
							    <div id="range-slider-15" class="range-slider2"></div>
							    <span id="range-time-5" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-6" data-day="6">
							    <input type="checkbox" name="day-6" id="day-6" value="1" class="range-checkbox" checked>
							    <label for="day-6" class="range-label">Saturday:</label>  
							    <div id="range-slider-16" class="range-slider2"></div>
							    <span id="range-time-6" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-7" data-day="7">
							    <input type="checkbox" name="day-7" id="day-7" value="1" class="range-checkbox">
							    <label for="day-7" class="range-label">Sunday:</label>  
							    <div id="range-slider-17" class="range-slider2"></div>
							    <span id="range-time-7" class="range-time"></span>
							  </div>

							  <br style="clear:both">
				            </div>
				            <div class="modal-footer" id="modal-footers">
				            	<input type="hidden" name="s1day1" id="s1day1" value="9:00" > 
							    <input type="hidden" name="s1day2" id="s1day2" value="9:00" >
							  	<input type="hidden" name="s1day3" id="s1day3" value="9:00" >
							  	<input type="hidden" name="s1day4" id="s1day4" value="9:00" >
							  	<input type="hidden" name="s1day5" id="s1day5" value="9:00" >
							  	<input type="hidden" name="s1day6" id="s1day6" value="9:00" >
							  	<input type="hidden" name="s1day7" id="s1day7" value="9:00" >
							                      
							  	<input type="hidden" name="e1day1" id="e1day1" value="18:00" > 
							  	<input type="hidden" name="e1day2" id="e1day2" value="18:00" >
							  	<input type="hidden" name="e1day3" id="e1day3" value="18:00" >
							  	<input type="hidden" name="e1day4" id="e1day4" value="18:00" >
							  	<input type="hidden" name="e1day5" id="e1day5" value="18:00" >
							  	<input type="hidden" name="e1day6" id="e1day6" value="18:00" >
							  	<input type="hidden" name="e1day7" id="e1day7" value="18:00" >
				            	
				            	<input type="hidden" name="iApplicationId" id="iApplicationId" value="104" >
				            	<input type="hidden" name="iFeatureId" id="iFeatureId" value="'.$iFeatureId.'" >
				            	<input type="hidden" name="iTabId" id="iTabId" value="'.$iAppTabId.'" >
				                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                <button type="button" id="service_modal_ids" onclick="return addservice();" class="btn btn-primary">Save changes</button>
				        </div>
				    </div>
				  </div>
				</div>';
       	
       // End New Service Modal
       


       // Serevice Center Information Modal
       $html .='<div class="modal fade" id="basicModal3" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display:none;">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					            <h4 style="color:#FFFFFF;">Service Center Details</h4>
				            </div>
				            <div class="modal-body">
				            <div id="Reservationservicedetail_validation" style="display:none;"></div>
				            <strong>General :</strong>
				            <table>
								<tr>
									<td style="width:300px;">
										Name :<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Mobile&nbsp;Service center Name </span></a> <br/>
										<input type="text" name="vServiceCenterName" id="vServiceCenterName" value="'.$curr_general_info['vServiceCenterName'].'" />
									</td>
									<td rowspan="3">
										Description : <a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Mobile&nbsp;Description </span></a><br />
										<textarea name="tDescription" id="tDescription" style="height:146px; width:400px;">'.$curr_general_info['tDescription'].'</textarea>
									</td>
								</tr>
								<tr>
									<td>
										Admin Email :<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Mobile&nbsp;Admin Email </span></a> <br />
										<input type="text" name="vAdminEmail" id="vAdminEmail" value="'.$curr_general_info['vAdminEmail'].'" />
									</td>
								</tr>
								<!--<tr>
									<td>
										Currency : <a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Mobile&nbsp;Currency Code</span></a><br />
										<select name="iCurrencyId" id="iCurrencyId">
											'.$curr.'
										</select>
									</td>
								</tr>-->
							</table> 
							
							<script>
								
								$(document).ready(function() {
								  $(function() {
								    $("#range-slider-1").slider({
										range: true,
									   	values: ['.$newtime[0].','.$newtime[1].']
									});
								  });
								  $(function() {
								    $("#range-slider-2").slider({
										range: true,
									   	values: ['.$newtime[2].','.$newtime[3].']
									});
								  });
								  $(function() {
								    $("#range-slider-3").slider({
										range: true,
									   	values: ['.$newtime[4].','.$newtime[5].']
									});
								  });
								  $(function() {
								    $("#range-slider-4").slider({
										range: true,
									   	values: ['.$newtime[6].','.$newtime[7].']
									});
								  });
								  $(function() {
								    $("#range-slider-5").slider({
										range: true,
									   	values: ['.$newtime[8].','.$newtime[9].']
									});
								  });
								  $(function() {
								    $("#range-slider-6").slider({
										range: true,
									   	values: ['.$newtime[10].','.$newtime[11].']
									});
								  });
								  $(function() {
								    $("#range-slider-7").slider({
										range: true,
									   	values: ['.$newtime[12].','.$newtime[13].']
									});
								  });
								});
							</script>
							<!--<strong>Service Hours :<a class="tooltip_text" href="javascript:void(0);"><img src="http://www.admin.easy-apps.co.uk/assets/images/quaton_icon.png" align="absmiddle"> <span> <img class="callout_text" src="http://www.admin.easy-apps.co.uk/assets/images/callout.gif"> Mobile&nbsp;Service days and hours </span></a></strong> 
								
							  <div class="range-day" id="range-day-1" data-day="1">
							    <input type="checkbox" name="day-1" id="day-1" value="1" class="range-checkbox" checked>
							    <label for="day-1" class="range-label">Monday:</label>
							    <div id="range-slider-1" class="range-slider"></div>
							    <span id="range-time-1" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-2" data-day="2">
							    <input type="checkbox" name="day-2" id="day-2" value="1" class="range-checkbox" checked>
							    <label for="day-2" class="range-label">Tuesday:</label>
							    <div id="range-slider-2" class="range-slider"></div>
							    <span id="range-time-2" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-3" data-day="3">
							    <input type="checkbox" name="day-3" id="day-3" value="1" class="range-checkbox" checked>
							    <label for="day-3" class="range-label">Wednesday:</label>  
							    <div id="range-slider-3" class="range-slider"></div>
							    <span id="range-time-3" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-4" data-day="4">
							    <input type="checkbox" name="day-4" id="day-4" value="1" class="range-checkbox" checked>
							    <label for="day-4" class="range-label">Thursday‎:</label>  
							    <div id="range-slider-4" class="range-slider"></div>
							    <span id="range-time-4" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-5" data-day="5">
							    <input type="checkbox" name="day-5" id="day-5" value="1" class="range-checkbox" checked>
							    <label for="day-5" class="range-label">Friday:</label>  
							    <div id="range-slider-5" class="range-slider"></div>
							    <span id="range-time-5" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-6" data-day="6">
							    <input type="checkbox" name="day-6" id="day-6" value="1" class="range-checkbox" checked>
							    <label for="day-6" class="range-label">Saturday:</label>  
							    <div id="range-slider-6" class="range-slider"></div>
							    <span id="range-time-6" class="range-time"></span>
							  </div>

							  <div class="range-day" id="range-day-7" data-day="7">
							    <input type="checkbox" name="day-7" id="day-7" value="1" class="range-checkbox" checked>
							    <label for="day-7" class="range-label">Sunday:</label>  
							    <div id="range-slider-7" class="range-slider"></div>
							    <span id="range-time-7" class="range-time"></span>
							  </div>

							  <br style="clear:both">-->
							
				            </div>
				            <div class="modal-footer">
				            	<input type="hidden" name="sday1" id="sday1" value="" >	
				            	<input type="hidden" name="sday2" id="sday2" value="" >
				            	<input type="hidden" name="sday3" id="sday3" value="" >
				            	<input type="hidden" name="sday4" id="sday4" value="" >
				            	<input type="hidden" name="sday5" id="sday5" value="" >
				            	<input type="hidden" name="sday6" id="sday6" value="" >
				            	<input type="hidden" name="sday7" id="sday7" value="" >
				            	
				            	<input type="hidden" name="eday1" id="eday1" value="" >	
				            	<input type="hidden" name="eday2" id="eday2" value="" >
				            	<input type="hidden" name="eday3" id="eday3" value="" >
				            	<input type="hidden" name="eday4" id="eday4" value="" >
				            	<input type="hidden" name="eday5" id="eday5" value="" >
				            	<input type="hidden" name="eday6" id="eday6" value="" >
				            	<input type="hidden" name="eday7" id="eday7" value="" >
				            
				            	<input type="hidden" name="iApplicationId" id="iApplicationId" value="104" >
				            	<input type="hidden" name="iFeatureId" id="iFeatureId" value="'.$iFeatureId.'" >
				            	<input type="hidden" name="iTabId" id="iTabId" value="'.$iAppTabId.'" >
				                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                <button type="button" onclick="return update_gen_info();" class="btn btn-primary">Save changes</button>
				        </div>
				    </div>
				  </div>
				</div>';
       
       // End Serevice Center Information Modal
       
       // Location Modal
       $html .= '<div class="modal fade" id="basicModal4" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="display:none;">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					            <h4 style="color:#FFFFFF;">Location Details</h4>
				            </div>
				            <div class="modal-body">
				            	<div id="Reservationlocation_validation" style="display:none;"></div>
				            	
				            	<center>
				                <table style="width:70%; padding:10px;">
									<tr>
										<td>
											Address 1<br />
											<input type="text" name="vAddress1_res" id="vAddress1_res" value="" />
										</td>
										<td>
											Address 2<br />
											<input type="text" name="vAddress2_res" id="vAddress2_res" value="" />
										</td>
									</tr>
									<tr>
										<td>
											City<br />
											<input type="text" name="vCity_res" id="vCity_res" value="" />
										</td>
										<td>
											State<br />
											<input type="text" name="vState_res" id="vState_res" value="" />
										</td>
									</tr>
									<tr>
										<td>
											Zip<br />
											<input type="text" name="vZip_res" id="vZip_res" value="" />
										</td>
										<td>
											
										</td>
									</tr>
								</table>
								<table style="width:70%; padding:10px;">
									<tr>
										<td>
											Website<br />
											<input type="text" name="vWebsite_res" id="vWebsite_res" value="" />
										</td>
										<td>
											
										</td>
									</tr>
									<tr>
										<td>
											Email<br />
											<input type="text" name="vEmail_res" id="vEmail_res" value="" />
										</td>
										<td>
											Telephone<br />
											<input type="text" name="vTelephone_res" id="vTelephone_res" value="" />
										</td>
									</tr>
								</table>
								<table style="width:70%; padding:10px;">
									<tr>
										<td>
											Latitude<br />
											<input type="text" name="vLatitude_res" id="vLatitude_res" value="" />
										</td>
										<td>
											Longitude<br />
											<input type="text" name="vLongitude_res" id="vLongitude_res" value="" />
										</td>
									</tr>
									<tr>
										<td>
											<input type="checkbox" name="vGPS" id="vGPS'.$iAppTabId.'" value="1" 
onclick="getlatlangforreservation('.$iAppTabId.');" /> GPS Location Look Up
										</td>
										<td></td>
									</tr>
								</table>
								</center>
				            </div>
				            <div class="modal-footer" id="modal-footer">
				            	<input type="hidden" name="iApplicationId" id="iApplicationId" value="'.$this->data['iApplicationId'].'" >
				            	<input type="hidden" name="iFeatureId" id="iFeatureId" value="'.$iFeatureId.'" >
				            	<input type="hidden" name="iTabId" id="iTabId" value="'.$iAppTabId.'" >
				                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                <button type="button" id="local_modal_id" onclick="return addlocation();" class="btn btn-primary">Save changes</button>
				        </div>
				    </div>
				  </div>
				</div>';
       // End Location Modal
       
       
     	//$html .='<div class="add_btn"><a class="btn btn-primary" style="" onclick="open_modal(\'basicModal\');">Manage Services</a></div>';
     	$html .='<div class="add_btn"><strong>Services(s) : </strong><a class="btn btn-primary"  style="float:right;" onclick="open_modal2();">Add New Services</a></div>
        <table class="table table-striped table-bordered dataTable" id="all_service_id">
        	<thead>
		<tr>
			<td>Name</td>
			<td>Price</td>
			<td>Reservation Fee</td>
			<td>Duration</td>
			<td>Status</td>
			<td colspan="2"><center>Action</center></td>
		</tr>
	</thead>';
	foreach($all_services as $key=>$val){
		$html .='<tr id="servicedata'.$val['iServiceId'].'">
					<td>'.$val['vServiceName'].'</td>
					<td>'.$val['vPrice'].' '.$this->data['user_info']['vCurrency'].'</td>
					<td>'.$val['vReservationFee'].' '.$this->data['user_info']['vCurrency'].'</td>
					<td>'.$val['iDuration'].'</td>
					<td>'.$val['eStatus'].'</td>
					<td><a class="apptab_edit" style="" onclick="edit_service_one('.$val['iServiceId'].')"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
					<td><a class="button grey" style="" onclick="delete_service_one('.$val['iServiceId'].')"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
				 </tr>';
	}
	$html .='</table>';
     	$html .='<br/ ><br/ >';
     	$html .='<div><strong>Service Center Information : </strong><a class="btn btn-primary" style="float:right; top: -12px;
position: relative;" onclick="open_modal(\'basicModal3\');">Edit</a></div>';
     	$html .='<div style="padding:5px; border:1px solid #000000;"><strong>GENERAL</strong>';
     	$html .='<table>';
     	$html .='<tr>';
     	$html .='<td>Service Center Name:</td>';
     	$html .='<td><input type="text" name="vServiceCenterName" value="'.$curr_general_info['vServiceCenterName'].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Description:</td>';
     	$html .='<td><input type="text" name="vDescription" value="'.$curr_general_info['tDescription'].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Admin Email:</td>';
     	$html .='<td><input type="text" name="vAdminEmail" value="'.$curr_general_info['vAdminEmail'].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	//$html .='<td>Currency:</td>';
     	//$html .='<td><input type="text" name="vCurrency" value="'.$curr_general_info['iCurrencyId'].'" disabled></td>';
     	//$html .='</tr>';
     	$html .='</table>';
     	/*$html .='<strong>DAY & TIME</strong>';
     	$html .='<table>';
     	$html .='<tr>';
     	$html .='<td style="width:164px;">Monday:</td>';
     	$html .='<td><input type="text" name="vMonday" value="'.$all_time[0].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Tuesday:</td>';
     	$html .='<td><input type="text" name="vTuesday" value="'.$all_time[1].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Wednesday:</td>';
     	$html .='<td><input type="text" name="vWednesday" value="'.$all_time[2].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Thursday:</td>';
     	$html .='<td><input type="text" name="vThursday" value="'.$all_time[3].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Friday:</td>';
     	$html .='<td><input type="text" name="vFriday" value="'.$all_time[4].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Saturday:</td>';
     	$html .='<td><input type="text" name="vSaturday" value="'.$all_time[5].'" disabled></td>';
     	$html .='</tr>';
     	$html .='<tr>';
     	$html .='<td>Sunday:</td>';
     	$html .='<td><input type="text" name="vSunday" value="'.$all_time[6].'" disabled></td>';
     	$html .='</tr>';
     	$html .='</table>';*/
     	$html .='</div>';
     	$html .='<div style="padding-top:10px;"><strong>Location(s) : </strong><a class="btn btn-primary" style="float:right; top: -5px;
position: relative;" onclick="open_modal(\'basicModal4\');">Add New Location</a></div>';
     	$html .='<table class="table table-striped table-bordered dataTable" id="location_tab_id">
					<thead>
						<tr>
							<td>Location</td>
							<td colspan="2"><center>Action</center></td>
							
						</tr>
					</thead>
					'.$curr_loc.'
				</table>';
				
		return $html;
	}
	
	
	/** Menu of the Day **/
	function menu_of_the_day_updated()
	{
		$Data = $this->input->post();
		
		if($Data['vDayMenu'] == 'true'){
			/** update menu item **/
			$menu_item = $this->app_model->update_menu_item_details($Data);
		}
		/** vDayMenu **/
		if($Data['vDayMenu'] == 'false'){
			/** update menu item **/
			$menu_item = $this->app_model->update_menu_item_deselect_details($Data);
		}
		
		/** menu item details **/
		if($menu_item){
			echo "success";
		}else{
			echo "fail";
		}
		exit;
	}
}
/* End of file app.php */
/* Location: ./application/controllers/app.php */
?>
