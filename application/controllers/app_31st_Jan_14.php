<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('app_model', '', TRUE);
        $this->load->library('upload'); 
        $this->load->library('image_lib');
	   $this->common_for_all();
    }    

    function index()
    {
     // echo '<pre>';print_r($this->data);exit;
        $this->data['tpl_name']= "view-app.tpl";
        $iClientId = $this->data[user_info][iAdminId];
	   	$iRoleId=$this->data[user_info][iRoleId];
	   
	   //echo "<pre>";print_r($this->data['user_info']);exit;

        $this->data['appindustry'] = $this->app_model->get_all_appindustry();
        $this->data['appinformation'] = $this->get_all_appinformation($iClientId,$iRoleId);
	   //echo "<pre>";print_r($this->data['appinformation']['']);exit;
	   
	   	$allClientList=$this->app_model->allClientList();	   
	   	$this->data['allClientList']=$allClientList;
	   //echo "<pre>";print_r($this->data['allClientList']);exit;
	   
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('Application Design', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    


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
    
    
    function ajax_appindustryfeature(){
		
		$iIndustryId = $this->input->post('iIndustryId');
		$this->data['appindustryfeature'] = $this->app_model->get_all_appindustryfeature($iIndustryId);
		 
		// echo "<pre>";print_r( $this->data['default_icon']);exit;
		 
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('ajax-appindustryfeature.tpl'); 
	}
	
	function save_app_feature(){
	   //echo "<pre>";print_r($this->input->post());exit;
		$this->session->unset_userdata("select_tab_iFeatureId");
		$appinformation = $this->input->post('appinformation');		
		//$appinformation['iClientId'] = $this->data[user_info][iAdminId];
		if($appinformation['iApplicationId'] != ""){
			$this->data['iApplicationId'] = $appinformation['iApplicationId'];
			$lid = $this->app_model->update_appinformation($appinformation,$this->data['iApplicationId']);
		}else{
			$this->data['iApplicationId'] = $this->app_model->save('slb_appinformation',$appinformation);
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
			
			$iApplicationId = $this->app_model->save('slb_appfeature',$appfeature_data);
		}
        
		 redirect($this->data['base_url'] . 'app/step2/'.$this->data['iApplicationId']);
		
	}
	
	
	function step2(){
		
		$this->data['tpl_name']= "view-app-step2.tpl";
		$id = $this->uri->segment(3);
		$step= $this->uri->segment(2);
		$this->data['step']=$step;
		$this->data['iApplicationId'] = $id;
		$iClientId = $this->data[user_info][iAdminId];
		$iRoleId=$this->data[user_info][iRoleId];
	     //POUP
		$this->data['appindustry'] = $this->app_model->get_all_appindustry();
		$this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
	     
		if(!$this->data['appinformation']){
		  $this->data['tpl_name']= "404.tpl";		  
		}		
		$this->sort_tab_list($id);
		
	     //$this->data['selected_feature_details'] = $this->selected_feature_details($id);		
	     //echo '<pre>';print_r($this->data['selected_feature_details']);exit;
		$iIndustryId = $this->data['appinformation']['iIndustryId'];
		$this->data['all_appindustryfeature'] = $this->app_model->get_all_appindustryfeature_data($iIndustryId);
        #echo "<pre>";
        #print_r($this->data['appinformation']);exit;
		#$this->data['all_tabcustomicon'] = $this->app_model->get_all_tabcustomicon();
		
		
		$this->smarty->assign('data', $this->data);		
		$this->smarty->view('template.tpl'); 
	}
	
	function selected_feature_details($id){
	   
		$featureid_details =  $this->app_model->get_featureid_by_appid($id);		
		$selected_feature_details = array();
		foreach($featureid_details as $val){			
			$feature_detail =  $this->app_model->get_all_appindustryfeature_by_featureid($val['iFeatureId']);
			
			$val['default_vTitle'] = $feature_detail[0]['vTitle'];
			$val['default_vImage'] = $feature_detail[0]['vImage'];
			//$feature_detail[0]['iAppTabId'] = $val['iAppTabId'];
			array_push($selected_feature_details,$val);
		}
		//$selected_feature_details =  $this->app_model->get_all_appindustryfeature_by_featureid($featureid);		
		return $selected_feature_details;
		
	}
	
	function step3(){
		$this->data['tpl_name']= "view-app-step3.tpl";
		$id = $this->uri->segment(3);
		$this->data['iApplicationId'] = $id;		
	   

		//$this->data['selected_feature_details'] = $this->selected_feature_details($id);
		$this->sort_tab_list($id);
		
		$selected_appfeature = $this->app_model->get_appfeature($id);		
		$nselected_appfeaturevalue  = array();
		foreach($selected_appfeature as $k => $v){
			$selected_appfeaturevalue = $this->app_model->get_appfeaturevalue($id,$v['iAppTabId']);
			$final_selected_appfeaturevalue= array();
			 foreach($selected_appfeaturevalue as $k => $v){
				 $final_selected_appfeaturevalue[$v['iFieldId']] = $v;
			 }			
		  $nselected_appfeaturevalue[$v['iAppTabId']] = $final_selected_appfeaturevalue;
		}
		
		$this->data['selected_appfeaturevalue'] = $nselected_appfeaturevalue;
		$selected_feature_details = $this->data['selected_feature_details'];
		
		$getAllLocation=$this->app_model->getall_location();
		$this->data['allLocation']=$getAllLocation;
		
		
		$html = array();
		$back_mob_img_details = array();
		$back_tab_img_details = array();
		
		#echo "<pre>";print_r($selected_feature_details);exit;
		foreach ($selected_feature_details as $key => $val) {	
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
			//	echo '<pre>';print_r($user_img_icon_details);
				$user_img_details['vImage'] = $user_img_icon_details['vImage'];
			}
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
	//	echo '<pre>';print_r($this->data['your_tabbackground']);exit;
		
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
	
	function make_tabwise_dynamic_form($iFeatureId,$iAppTabId){
		if($this->data['iApplicationId']==''){			
		  $this->data['iApplicationId']=$iApplicationId;
		}

        //$all_featurefields = $this->app_model->get_featurefields($iFeatureId);
		$mainhtml = '';
        
        if($iFeatureId == 1){
        }else if($iFeatureId == 2){
            $evnthtml = $this->geteventhtml($iFeatureId);
            $mainhtml .=$evnthtml;
        }else if($iFeatureId == 3){
            
        }else if($iFeatureId == 4){
            $infotabhtml = $this->getinfotabhtml($iFeatureId);
            $mainhtml .=$infotabhtml;
        }else if($iFeatureId == 5){
            $mailinglisthtml = $this->getmailinglisthtml($iFeatureId);
            $mainhtml .=$mailinglisthtml;
        }else if($iFeatureId == 6){
            $newshtml = $this->getnewshtml($iFeatureId);
            $mainhtml .=$newshtml;
        }else if($iFeatureId == 7){
            
        }else if($iFeatureId == 8){
            $pdfhtml = $this->getpdfhtml($iFeatureId);
            $mainhtml .=$pdfhtml;
        }else if($iFeatureId == 9){
            
        }else if($iFeatureId == 10){
            $rsshtml = $this->getrsshtml($iFeatureId);
            $mainhtml .=$rsshtml;
        }else if($iFeatureId == 11){
            
        }else if($iFeatureId == 12){
            $websitehtml = $this->getwebsitehtml($iFeatureId);
            $mainhtml .=$websitehtml;
        }else if($iFeatureId == 13){
            $youtubehtml = $this->getyoutubehtml($iFeatureId);
            $mainhtml .=$youtubehtml;
        }else if($iFeatureId == 14){
            $locationhtml = $this->getlocationhtml($iFeatureId);
            $mainhtml .=$locationhtml;
            
        }
        
        
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
        
		return $mainhtml;
        
        
	}
	
	function save_frm_data(){
		
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
		
		  foreach ($Data as $k => $v){
			
			$data['iApplicationId'] = $aid;
			$data['iFieldId'] = $k;
			$data['tValue'] = $v;
			$data['iAppTabId'] = $iAppTabId;
			
			//$id = $this->app_model->save('slb_appfeaturevalue',$data);
			 
			$exist_record = $this->app_model->get_exist_appfeaturevalue($data['iApplicationId'],$data['iFieldId'],$data['iAppTabId']);			
			if($exist_record){			 
				$id = $this->app_model->update_appfeaturevalue($data,$exist_record[0]['iAppId']);
			}else{
			
			}
			
		  }
		  $html=$this->make_dynamic_form($iAppTabId,$iFeatureId);
		  echo $html;exit;		  
		 //redirect($this->data['base_url'] . 'app/step3/'.$this->data['iApplicationId']);
	}
	
	
	
    function delete() {
        $id= $this->uri->segment(3);
		
        $afvid = $this->app_model->delete_all($id,'slb_appfeaturevalue');
        $afid = $this->app_model->delete_all($id,'slb_appfeature');
        $aiid = $this->app_model->delete_all($id,'slb_appinformation');
        $isAppTabId = $this->app_model->delete_sorttab_related_data($iApplicationId);
        
	   $this->session->set_flashdata('message',"Record deleted successfully");
        redirect($this->data['base_url'] . 'app');
    }
    
    function delete_tab(){
		
		$iApplicationId = $this->input->get('iApplicationId');
		$iAppTabId = $this->input->get('iAppTabId');
		//echo $iApplicationId.'dsadas'.$iAppTabId;exit;
		$iAppId = $this->app_model->delete_tab_related_data($iApplicationId,$iAppTabId,'slb_appfeaturevalue');
		$iAppTabId = $this->app_model->delete_tab_related_data($iApplicationId,$iAppTabId,'slb_appfeature');
		$isAppTabId = $this->app_model->delete_sorttab_related_data($iApplicationId);
		
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
						$iconid =  $this->app_model->save('slb_iconmaster',$icon_deatils);
						foreach($all_colors as $val){
							
								$img_uploaded_partner = $this->do_upload_image($val['iIconcolorId'],"uploads/tab_icon/");
								
								$icon_deatils['vImage'] = $img_uploaded_partner;
						}
                        
                        
						$tcid = $this->app_model->update_iconmaster($icon_deatils,$iconid);
						$Data['iIconId'] = $iconid;
						$Data['vImage'] = $icon_deatils['vImage'];
				}
		
		          


				
				
				$iApplicationId = $this->app_model->save('slb_appfeature',$Data);
				redirect($this->data['base_url'] . 'app/step2/'.$Data['iApplicationId']);
		
	}	

    function ajax_edit_custom_tab(){
	   $iAppTabId = $this->input->post('iAppTabId');
	   $step= $this->input->post('step');		
	   $this->data['step']=$this->input->post('step');		
	   
	   $this->data['all_appindustryfeature'] = $this->app_model->get_all_appindustryfeature_data();
	   #$this->data['all_tabcustomicon'] = $this->app_model->get_all_tabcustomicon();

	   $exist_record = $this->app_model->get_exist_appfeature_data($iAppTabId);
	   $this->data['exist_record'] = $exist_record[0];		 
	   $this->smarty->assign('data', $this->data);
	   $this->smarty->view('ajax_edit_custom_tab.tpl'); 
		
	}

    function update_custom_tab(){	   
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
						$iconid =  $this->app_model->save('slb_iconmaster',$icon_deatils);
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
				$id =  $this->app_model->save('slb_sorttab',$data);
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
    /*
     Created By:
     Created Date:
     Modified By:Nikhil Detroja
     Modified Date:06-01-2014
     */
    
    function step4(){		
		$this->data['tpl_name']= "view-app-step4.tpl";
		$id = $this->uri->segment(3);		
		$this->data['step']=$this->uri->segment(2);
		
        if($id !=''){
            $allappdesignInfo = $this->app_model->getallappdesignInfo($id);
        }
        if($allappdesignInfo[0]['iBackgroundId'] ==''){
            $allappdesignInfo[0]['iBackgroundId'] = 1;
        }
        
        if($allappdesignInfo[0]['iIconcolorId'] ==''){
            $allappdesignInfo[0]['iIconcolorId'] = 1;
        }
        
        if($allappdesignInfo[0]['vTabColor'] ==''){
            $allappdesignInfo[0]['vTabColor'] = "rgb(82,0,0)";
        }
        
        if($allappdesignInfo[0]['vTabTexColor'] ==''){
            $allappdesignInfo[0]['vTabTexColor'] = "rgb(255,255,255)";
        }
        
        if($allappdesignInfo[0]['vLuncherTintColor'] ==''){
            $allappdesignInfo[0]['vLuncherTintColor'] = "rgb(194,0,0)";
        }
        
        if($allappdesignInfo[0]['vNavigationBar'] ==''){
            $allappdesignInfo[0]['vNavigationBar'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vNavigationText'] ==''){
            $allappdesignInfo[0]['vNavigationText'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vNavigationShadow'] ==''){
            $allappdesignInfo[0]['vNavigationShadow'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vSectionBar'] ==''){
            $allappdesignInfo[0]['vSectionBar'] = "rgb(12,2,2,1)";
        }
        
        if($allappdesignInfo[0]['vSectionText'] ==''){
            $allappdesignInfo[0]['vSectionText'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vOddRowBar'] ==''){
            $allappdesignInfo[0]['vOddRowBar'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vOddRowText'] ==''){
            $allappdesignInfo[0]['vOddRowText'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vEvenRowBar'] ==''){
            $allappdesignInfo[0]['vEvenRowBar'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vEvenRowText'] ==''){
            $allappdesignInfo[0]['vEvenRowText'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vButtonTextColor'] ==''){
            $allappdesignInfo[0]['vButtonTextColor'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vButtonImageColors'] ==''){
            $allappdesignInfo[0]['vButtonImageColors'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vFeatureText'] ==''){
            $allappdesignInfo[0]['vFeatureText'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vFeatureText'] ==''){
            $allappdesignInfo[0]['vFeatureText'] = "rgb(0,194,255,0.78)";
        }
        
        if($allappdesignInfo[0]['vGlobalTintColor'] ==''){
            $allappdesignInfo[0]['vGlobalTintColor'] = "rgb(0,194,255,0.78)";
        }
        
        
        
        
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
		  
		  $this->data['AllSubTabImages']=$getAllTabData;		  
		  
		  $buttonBckgroundData=$this->app_model->getAllButtonImg($this->data['getAdminImgData']);		
		  $this->data['buttons_tab_background'] = $buttonBckgroundData;
		  $this->data['get_all_buttons_lunch_header'] = $this->get_all_buttons_lunch_header($this->data['getAdminImgData']);	
		
		  $this->smarty->assign('data', $this->data);
		  
		  $this->smarty->view('template.tpl');
		  
    }
    /*
     Created By:Nikhil Detroja
     Created Date:20-01-2014
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
				$saveData=$this->app_model->save('slb_app_background_img',$Data);
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
		
	     if($Data['eType']=='Tablet'){		  
			 $this->smarty->view('ajax_iPad_appearance.tpl');
	     }else{	  
			 $this->smarty->view('ajax_appreance.tpl');	 	       
	     }       
	}
    
    /*
     Created By:Nikhil Detroja
     Created Date:06-01-2014
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
				$app_table=$this->app_model->save('slb_app_background_img',$appData);				
				$SaveData=$this->app_model->saveBackgroundSetting($Data);
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
     Created By:Nikhil Detroja
     Created Date:07-01-2014
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
		//echo '<pre>';print_r($_FILES['vImage']);
		//echo '<pre>';print_r($this->input->post('data'));
		//exit;
		
		$apid =  $this->input->post('iApplicationId');
		$data = $this->input->post('data');
		$data['iApplicationId'] = $apid;
			if($_FILES['vImage']['name']!=''){
				//echo 'in';
				$tabbackground = array();
				$tabbackground['vImage'] = 'demo.png';
				$tabbackground['eStatus'] = 'Active';
				$tabbackground['iAdminId'] = $this->data[user_info][iAdminId];
				$iBackgroundId =  $this->app_model->save('slb_tabbackground',$tabbackground);
				$data['iBackgroundimgId'] = $iBackgroundId;
				
				//echo $iTabcustomiconId;exit;
				$Data['iBackgroundId'] = $iBackgroundId;
                $img_uploaded_partner = $this->do_upload_image($iBackgroundId,'uploads/background_image/');
                $tabbackground['vImage'] = $img_uploaded_partner;
                
                $tcid = $this->app_model->update_tabbackground($tabbackground,$iBackgroundId);
            }		
		     
			$app_background=array('iApplicationId'=>$data['iApplicationId'],
							  'eType'=>$data['eType'],
							  'iBackgroundId'=>$data['iBackgroundimgId'],
							  'iAppTabId'=>$data['iAppTabId'],
							  );
			//$saveDatas= $this->app_model->save('slb_app_background_img',$app_background);
			
			
			$iAppBackgroundId=$this->app_model->get_one_user_appbackground($app_background['iAppTabId'],$data['eType']);
			
			if((sizeof($iAppBackgroundId) > 0)){
				$update_apptable=  $this->app_model->update_appbackground($app_background,$iAppBackgroundId['iAppBackgroundId']);
			}else{
			 $saveData =  $this->app_model->save('slb_app_background_img',$app_background);
			}
			
			
			
			$exist_data = $this->app_model->get_one_user_tabbackground($data['iAppTabId'],$data['eType']);	
			if(sizeof($exist_data) > 0){			
				$id =  $this->app_model->update_user_tabbackground($data,$exist_data['iUserTabBackImgId']);				
			 }else{
				$id =  $this->app_model->save('slb_user_tabbackground',$data);				
			}
			redirect($this->data['base_url'] . 'app/step3/'.$apid);		
	} 
	
	function new_design(){
		$this->data['tpl_name']= "new_design.tpl";
		$id = $this->uri->segment(3);
		$this->data['iApplicationId'] = $id;		
		$this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 		
	}
	
	function newdesign_templates(){

		$this->data['tpl_name']= "newdesign_templates.tpl";
		$id = $this->uri->segment(3);
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
	
	
	function newdesign_templates_ajax(){

		//$this->data['tpl_name']= "newdesign_templates.tpl";
		$id = $this->uri->segment(3);
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
	
	
	function delete_user_background_image(){
	//	echo '<pre>';print_r($this->input->get('bId'));exit;
		$apid = $this->uri->segment(3);
		$id = $this->input->get('bId');
		if($id) {
			$rid =  $this->app_model->user_background_image($id);
		}
			redirect($this->data['base_url'] . 'app/step3/'.$apid);	

	}
	
	
	function step6(){
		$this->data['tpl_name']= "view-app-step6.tpl";
		$id = $this->uri->segment(3);		 
		$this->data['iApplicationId'] = $id;		
		
		
		$appinformation=$this->app_model->appinformation_by_id($id);
		$this->data['appinformation']=$appinformation;
		
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('template.tpl'); 
		
	}
	
	function step5(){
		$this->data['tpl_name']= "view-app-step5.tpl";
		$id = $this->uri->segment(3);		 
		$this->data['iApplicationId'] = $id;
		
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('template.tpl'); 
		
	}	
	
	function common_for_all(){
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
	  
	  $this->data['preset_tabbackground'] = $this->get_all_tabbackground();

	  $this->data['custom_all_icons'] = $final_all_icons;
	  $this->data['custom_all_iconcolors'] = $final_all_iconcolors;
	  $this->data['custom_default_icon'] =  $final_default_icon;
	  $this->data['all_icons'] = $all_icons;
	  $this->data['all_iconcolors'] = $all_iconcolors;
	  $this->data['default_icon'] =  $default_icon;
	  
	   //echo "<pre>";print_r( $this->data['all_icons']);exit;
	  
	}
	
	/*
     Created By:Nikhil Detroja
     Created Date:07-01-2014
     Purpose: Make status In active  of tab.
     */
	
	
	function makeInActive(){
	   $iAppTabId=$this->input->get('id');
	   $iApplicationId=$this->input->get('iApplicationId');	   
	   $Data['eActive']=$this->input->get('eStatus');	   
	   $udpateStatus=$this->app_model->update_slb_appfeature($iAppTabId,$Data);	   
	   $id = $this->uri->segment(3);	    
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
     Created By:Nikhil Detroja
     Created Date:08-01-2014
     Purpose: to upload an image of button.
     */
	
    function upload_button_img(){
	   $iAdminId=$this->data['user_info']['iAdminId'];
	   $Data['iAdminId']=$iAdminId;
	   $Data['eStatus']='Active';
	   
	   $size=array();
	   $size['width']=150;
	   $size['height']=150;	   
	   
	   $saveImg=$this->app_model->saveButtonImg($Data,'slb_buttons_tab_background');
	   
	   $folder='tab_btn_background';
	   $img_uploaded = $this->do_upload_img($saveImg,$folder,'file_uploads_btn',$size);
	   
	   if($img_uploaded){
		 $data['vImage'] =$img_uploaded;		 
		 $updateImgName=$this->app_model->updateimgData($data,$saveImg,'iBtntabbackgroundId','slb_buttons_tab_background');		 
	   }
	   $buttonBckgroundData=$this->app_model->getAllButtonImg($this->data['getAdminImgData']);
	   $this->data['buttons_tab_background'] = $buttonBckgroundData;
	   
	   $this->smarty->assign('data',$this->data);
	   $this->smarty->view('ajax_button_img.tpl'); 	   
	   
    }
    
    /*
     Created By:Nikhil Detroja
     Created Date:08-01-2014
     Purpose: to upload an image of header.
     */
	
    function upload_header_img(){
	   $iAdminId=$this->data['user_info']['iAdminId'];
	   $Data['iAdminId']=$iAdminId;
	   $Data['eStatus']='Active';
	   
	   $size=array();
	   $size['width']=324;
	   $size['height']=44;	   
	   
	   $saveImg=$this->app_model->saveButtonImg($Data,'slb_lunch_header');	   
	   $img_uploaded = $this->do_upload_img($saveImg,'lunch_header','header_img',$size);	   
	   
	   if($img_uploaded){
		 $data['vImage'] =$img_uploaded;
		 $updateImgName=$this->app_model->updateimgData($data,$saveImg,'iLunchheaderId','slb_lunch_header');		 
	   }	   
	   
	   $headerImg=$this->get_all_buttons_lunch_header($this->data['getAdminImgData']);	   
	   $this->data['get_all_buttons_lunch_header'] = $headerImg;  
	   
	   $this->smarty->assign('data',$this->data);
	   $this->smarty->view('ajax_header_img.tpl'); 
	   
    }
    
    /*
     Created By:Nikhil Detroja
     Created Date:21-01-2014
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
	   
	   $saveImg=$this->app_model->save('slb_tabbackground',$Data);	   
	   $img_uploaded = $this->do_upload_img($saveImg,'background_image','file_uploads_btn',$size);
	   
	   if($img_uploaded){
		 $data['vImage'] =$img_uploaded;
		 $updateImgName=$this->app_model->updateimgData($data,$saveImg,'iBackgroundId','slb_tabbackground');		 
	   }	   	   
	   echo $this->data['base_url'] . 'app/step4/'.$this->data['iApplicationId'];
	   exit;
    }
    
    /*
     Created By:Nikhil Detroja
     Created Date:08-01-2014
     Purpose: to upload an image in to specific folder.
     */
    
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
    
    function addNewSubTab(){	   
	   $Data=$this->input->post('data');
	   if($Data['eActive']==''){
		  $Data['eActive']='No';
	   }
	   $Data['iIconcolorId'] = $this->data['default_icon']['iIconcolorId'];
	   $iSubTabId=$this->input->post('iSubTabId');
	   if($iSubTabId!=''){
		  $saveData=$this->app_model->update_appsubTab($iSubTabId,$Data);
	   }else{	   
		  $saveData=$this->app_model->save('slb_sutabs',$Data);
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
        #echo "<pre>";
        #print_r($data);exit; 
        
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
	   
	   //echo "<pre>";print_r($this->data['all_app_image']);exit;
	   
	   foreach($getSelectedImages as $value){
		$selectedImgIds[]=$value['iBackgroundId'];		  
	   }	   
	   $this->data['selectedMobileImgIds']=$selectedImgIds;
	   $this->smarty->assign('data',$this->data);
	   $this->smarty->assign('uploadPath',$uploadPath);
	   $this->smarty->view('ajax_img_library.tpl');	   
    }
    
    function geteventhtml($iFeatureId){
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        
            
            $html .='<div id="eventformid" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add Event</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addevent_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmevent" id="frmevent" method="post" action="'.$this->data['base_url'].'app/save_event" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
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
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'" >
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
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                            
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitevent();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
       
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#eventformid" id="addevenitid"  style="float:right;">Add New Event</a></div>';
        
        $allappevents = $this->app_model->get_appwise_events($this->data['iApplicationId']);
        
        $html .='<div id="event_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allappevents) > 0){
                        for($i=0;$i<count($allappevents);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="25%"><p class="sp_title">'.$allappevents[$i]["vTitle"].'</p></td>
                                     <td width="25%" align="center">'.date("jS F Y", time($allappevents[$i]["dStartDate"])).'&nbsp;'.$allappevents[$i]["vStartTime"].'</td>
                                     <td width="25%" align="center">'.date("jS F Y", time($allappevents[$i]["dEndDate"])).'&nbsp;'.$allappevents[$i]["vEndTime"].'</td>
                                     <td align="center" width="12%"><a class="apptab_edit"  onclick="edit_event('.$allappevents[$i]["iEventId"].','.$iFeatureId.');"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_event('.$allappevents[$i]["iEventId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No events founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                    
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
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
    
    function appwiseeventlisting(){
        $iApplicationId = $this->input->get('iApplicationId');
        
        $allappevents = $this->app_model->get_appwise_events($iApplicationId);
        
            $html.='<div id="event_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allappevents) > 0){
                        for($i=0;$i<count($allappevents);$i++){
                        $html.='<tr class="row1a">
                                     <td width="25%"><p class="sp_title">'.$allappevents[$i]["vTitle"].'</p></td>
                                     <td width="25%" align="center">'.date("jS F Y", time($allappevents[$i]["dStartDate"])).'&nbsp;'.$allappevents[$i]["vStartTime"].'</td>
                                     <td width="25%" align="center">'.date("jS F Y", time($allappevents[$i]["dEndDate"])).'&nbsp;'.$allappevents[$i]["vEndTime"].'</td>
                                     <td align="center" width="12%"><a class="apptab_edit button white"  href="javascript:void(0);" onclick="edit_event('.$allappevents[$i]["iEventId"].',2);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_event('.$allappevents[$i]["iEventId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No events founds.</td></tr>';
                    }
                $html .='</table>';
        $html.='</div>';
        echo $html;exit; 
        
    }
    
    function event_delete(){
        
        $iEventId = $this->input->get('iEventId');
        $id = $this->app_model->delete_events($iEventId);
        
        
        $iApplicationId = $this->input->get('iApplicationId');
        
        $allappevents = $this->app_model->get_appwise_events($iApplicationId);
        
            $html.='<div id="event_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allappevents) > 0){
                        for($i=0;$i<count($allappevents);$i++){
                        $html.='<tr class="row1a">
                                     <td width="25%"><p class="sp_title">'.$allappevents[$i]["vTitle"].'</p></td>
                                     <td width="25%" align="center">'.date("jS F Y", time($allappevents[$i]["dStartDate"])).'&nbsp;'.$allappevents[$i]["vStartTime"].'</td>
                                     <td width="25%" align="center">'.date("jS F Y", time($allappevents[$i]["dEndDate"])).'&nbsp;'.$allappevents[$i]["vEndTime"].'</td>
                                     <td align="center" width="12%"><a class="apptab_edit button white"  href="javascript:void(0);" onclick="edit_event('.$allappevents[$i]["iEventId"].',2);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_event('.$allappevents[$i]["iEventId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No events founds.</td></tr>';
                    }
                $html .='</table>';
        $html.='</div>';
        echo $html;exit; 
    }
    
    function showediteventpopup(){
        $iEventId = $this->input->get('iEventId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $eventinfo = $this->app_model->geteventinfo($iEventId);
        #echo "<pre>";
        #print_r($eventinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        #echo "<pre>";
        #print_r($this->data['base_upload']);exit;
            
            
                  $html .='<div class="main_popup">
                    <div class="popup_header">
                        <h3>Edit Event</h3>
                    </div>
                    <div class="popup-body">';          
                     $html .='<div id="editevent_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmeditevent" id="frmeditevent" method="post" action="'.$this->data['base_url'].'app/update_event" enctype="multipart/form-data">';
                            $html .= '<input  type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                            $html .= '<input  type="hidden" name="iEventId" value="'.$iEventId.'">';
                            
                            
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$eventinfo[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Checkbox':
                                            if($eventinfo[$val['vDataBaseFieldName']] == 'Yes'){
                                                $checked = "checked";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="radio">
                                                                <input type="radio"  id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;			
                                        case 'File':
                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e" name="'.$val['vDataBaseFieldName'].'" style="float: left;" onchange="return setimagevalue(this.value);">';
                                                            
                                                            if($eventinfo[$val['vDataBaseFieldName']] != ''){
                                                                $fileurl = $this->data['base_upload']."events/".$eventinfo['iEventId']."/".$eventinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="deletebtndivid"><div style="float: left;"><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deleteeventimage('.$eventinfo['iEventId'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                               $html .= '<input  type="hidden" name="vOldImage" id="vOldImage" value="'.$eventinfo[$val['vDataBaseFieldName']].'">';     					
                                                break;
                                        case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge"  value="'.$eventinfo[$val['vDataBaseFieldName']].'" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" cols="" rows="">'.$eventinfo[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        case 'Date':
                                        	$html .='<div class="control-group">
                                                <label class="control-label">'.$val['vLabelName'].'</label>
                                                <div class="controls">
                                                    <input class="input-xlarge" value="'.$eventinfo[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" type="text" >
                                                </div>
                                            </div>';
                                            break;
                                         case 'Time Textbox':
                                                $html .='<div class="control-group">
                                                            <label class="control-label">'.$val['vLabelName'].'</label>
                                                            <div class="controls">
                                                                <div class="input-append bootstrap-timepicker">
                                                                    <input type="text" value="'.$eventinfo[$val['vDataBaseFieldName']].'" class="input-mini" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']"><span class="add-on"><i class="icon-time"></i></span>
                                                                </div>
                                                            </div>	
                                                        </div>';
                                            break;   
                                          case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge" value="'.$eventinfo[$val['vDataBaseFieldName']].'" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'f" >'.$eventinfo[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;   
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="updateevent();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>';
        
        
        echo $html;exit;
        
    }
    
    function update_event(){
        
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
    
    function getnewshtml($iFeatureId){
        $appwise_news = $this->app_model->get_appwise_news($this->data['iApplicationId']);
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
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        $html .='<form name="frmlocation" id="frmlocation" method="post" action="'.$this->data['base_url'].'app/save_news" enctype="multipart/form-data" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iNewsId]" value="'.$appwise_news['iNewsId'].'">
                    
                        <div class="lean-body">
                            <div class="widget-body form" >';
                                
                                
                                foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_news[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Checkbox':
                                            if($appwise_news[$val['vDataBaseFieldName']] == 'Yes')
                                            {
                                                $checked = "checked";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                        case 'Radio':
                                             $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
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
                                    <button type="button" class="btn btn-primary"   id="locationbtn" name="locationbtn" onclick="news_validation();"><i class="icon-ok"></i> Save</button>
                                </div>';
                                
                                
                            $html .='</div>
                        </div>
                </form>';
                return $html;
    }

    function save_news(){
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
                $iNewsId1 = $this->app_model->save('slb_app_news_value',$news);
                if($iNewsId1){
                    redirect($this->data['base_url'] . 'app/step3/'.$news['iApplicationId']);
                }    
            }
            
        }       
    }
    
    function getmailinglisthtml($iFeatureId){
        
        $appwise_mailinglist = $this->app_model->get_appwise_mailinglist($this->data['iApplicationId']);
        $this->data['appwise_mailinglist'] = $appwise_mailinglist;
        
         if($appwise_mailinglist["ePromptOption"] == 'Yes')
        {
            $checked = "checked";
        }
        
        if($appwise_mailinglist["eAutomatic"] == 'Yes')
        {
            $checked = "checked";
        }
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        $html .='<form name="frmmailinglist" id="frmmailinglist" method="post" action="'.$this->data['base_url'].'app/save_mailinglist" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iMailinglistId]" value="'.$appwise_mailinglist['iMailinglistId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';
                        
                            
                            
                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_mailinglist[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Checkbox':
                                            if($appwise_news[$val['vDataBaseFieldName']] == 'Yes')
                                            {
                                                $checked = "checked";
                                            }
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="checkbox" '.$checked.'  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']">
                                                            </label>
                                                        </div>
                                                    </div>';
                                             break;
                                         case 'Textarea':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge"  name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" cols="" rows="">'.$appwise_mailinglist[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;		
                                        
                                            
                                        }
                                        
                                    }
                            
                            
                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="mailinglist_validation();"><i class="icon-ok"></i> Save</button>
                            </div>';
                            
                        $html .='</div>
                    </div>    
                </form>';
                
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
                $iMailinglistId = $this->app_model->save('slb_app_mailinglist_value',$mailinglist);
                if($iMailinglistId){
                    redirect($this->data['base_url'] . 'app/step3/'.$mailinglist['iApplicationId']);
                }    
            }
            
        }
    }

    function getrsshtml($iFeatureId){
        
        $appwise_rss = $this->app_model->get_appwise_rss($this->data['iApplicationId']);
        
        $this->data['appwise_rss'] = $appwise_rss;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        $html .='<form name="frmrss" id="frmrss" method="post" action="'.$this->data['base_url'].'app/save_rss" class="form-horizontal" enctype="multipart/form-data">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iRSSId]" value="'.$appwise_rss['iRSSId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';
                            
                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_rss[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
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
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="rss_validation();"><i class="icon-ok"></i> Save</button>
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
                $iRSSId = $this->app_model->save('slb_app_rss_value',$rss);
                
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

    function getyoutubehtml($iFeatureId){
        
        $appwise_youtube = $this->app_model->get_appwise_youtube($this->data['iApplicationId']);
        $this->data['appwise_youtube'] = $appwise_youtube;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        $html .='<form name="frmyoutube" id="frmyoutube" method="post" action="'.$this->data['base_url'].'app/save_youtube" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iYoutubeId]" value="'.$appwise_youtube['iYoutubeId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';

                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_youtube[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" >'.$appwise_youtube[$val['vDataBaseFieldName']].'</textarea>
                                                        </div>
                                                    </div>';					
                                                break;
                                        }
                                    }

                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="frmyoutube_validation();"><i class="icon-ok"></i> Save</button>
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
                $iYoutubeId = $this->app_model->save('slb_app_youtube_value',$youtube);
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
    
    
    function getinfotabhtml($iFeatureId){
        $appwise_infotabdata = $this->app_model->get_appwise_infotabdata($this->data['iApplicationId']);
        
        #echo "<pre>";
        #print_r($appwise_infotabdata);exit;
        
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        
        $html .='<form name="frminfotab" id="frminfotab" method="post" action="'.$this->data['base_url'].'app/save_infotabdata" class="form-horizontal">
                    <input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">
                    <input class="span6" type="hidden" name="data[iInfotabId]" value="'.$appwise_infotabdata['iInfotabId'].'">
                    <div class="lean-body">
                        <div class="widget-body form" >';

                            foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                                    $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" value="'.$appwise_infotabdata[$val['vDataBaseFieldName']].'" id="'.$val['vDataBaseFieldName'].'in" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Editor':
                                        	$html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <textarea class="input-xlarge" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" >'.$appwise_infotabdata[$val['vDataBaseFieldName']].'</textarea>
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
                                        }
                                    }

                            $html .='<div class="row_form">
                                <label class="checklabel">&nbsp;</label>
                                <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="infotab_validation();"><i class="icon-ok"></i> Save</button>
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
    
    
    
    function getpdfhtml($iFeatureId){
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
            
            $html .='<div id="pdfformid" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add New Pdf</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addpdf_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmpdf" id="frmpdf" method="post" action="'.$this->data['base_url'].'app/save_pdf" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                        		if($val['vDataBaseFieldName'] == "vPdfUrl"){
                                                    $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" style="display:none;">';
                                            	}else{
                                            		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                            	}
                                                       $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
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
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'" onchange="CheckValidPdfFile(this.value,this.name)">
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
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
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
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitpdf();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#pdfformid" id="addpdfid"  style="float:right;">Add New Pdf</a></div>';
        
        $allapppdfs = $this->app_model->get_appwise_pdfs($this->data['iApplicationId']);
        
        $html .='<div id="pdf_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Title</th>
                        <th>Pdf File</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allapppdfs) > 0){
                        for($i=0;$i<count($allapppdfs);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapppdfs[$i]["vPdfTitle"].'</p></td>';
                                     if($allapppdfs[$i]["vPdfFile"] !='' && $allapppdfs[$i]["vPdfUrl"] ==''){
                                        $vPdfFile = $this->data['base_upload']."pdfs/".$allapppdfs[$i]["iPdfId"]."/".$allapppdfs[$i]['vPdfFile'];
                                        $html .='<td width="45%" align="center"><a href="'.$vPdfFile.'" target="_blank">'.$allapppdfs[$i]["vPdfFile"].'</a></td>';            
                                     }elseif($allapppdfs[$i]["vPdfFile"] =='' && $allapppdfs[$i]["vPdfUrl"] !=''){
                                        $html .='<td width="45%" align="center"><a href="'.$allapppdfs[$i]["vPdfUrl"].'" target="_blank">'.$allapppdfs[$i]["vPdfUrl"].'</a></td>';
                                     }else{
                                        $html .='<td width="45%" align="center">---</td>';
                                     }
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_pdf('.$allapppdfs[$i]["iPdfId"].',8);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_pdf('.$allapppdfs[$i]["iPdfId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No pdf founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                    
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }
    
    function save_pdf(){
        #echo "<pre>";
        #print_r($_FILES);exit;
        $iApplicationId = $this->input->post('iApplicationId');
        $data = $this->input->post('data');
        if($this->input->post()){
            if($iApplicationId !=''){
                $data['iApplicationId'] = $iApplicationId;
            }
            #echo "<pre>";
            #print_r($_FILES);exit;
            $iPdfId = $this->app_model->save_pdf($data);
            
            $size=array();
            if($_FILES['vPdfFile']['name'] !=''){
                $pdffile = $_FILES['vPdfFile']['name'];
                $fileName = $this->do_upload_pdf($iPdfId,'pdfs','vPdfFile');
                if($fileName){
                    $data['vPdfFile'] = $fileName;    
                }
                
                $iPdfId = $this->app_model->update_pdf($data,$iPdfId);
            }
        }
        echo $iPdfId;exit;
    }
    
    function appwisepdflisting(){
        $iApplicationId = $this->input->get('iApplicationId');
        $allapppdfs = $this->app_model->get_appwise_pdfs($iApplicationId);
        
                
         
             $html .='<div id="pdf_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Title</th>
                        <th>Pdf File</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allapppdfs) > 0){
                        for($i=0;$i<count($allapppdfs);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapppdfs[$i]["vPdfTitle"].'</p></td>';
                                     if($allapppdfs[$i]["vPdfFile"] !='' && $allapppdfs[$i]["vPdfUrl"] ==''){
                                        $vPdfFile = $this->data['base_upload']."pdfs/".$allapppdfs[$i]["iPdfId"]."/".$allapppdfs[$i]['vPdfFile'];
                                        $html .='<td width="45%" align="center"><a href="'.$vPdfFile.'" target="_blank">'.$allapppdfs[$i]["vPdfFile"].'</a></td>';            
                                     }elseif($allapppdfs[$i]["vPdfFile"] =='' && $allapppdfs[$i]["vPdfUrl"] !=''){
                                        $html .='<td width="45%" align="center"><a href="'.$allapppdfs[$i]["vPdfUrl"].'" target="_blank">'.$allapppdfs[$i]["vPdfUrl"].'</a></td>';
                                     }else{
                                        $html .='<td width="45%" align="center">---</td>';
                                     }
                                    $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_pdf('.$allapppdfs[$i]["iPdfId"].',8);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_pdf('.$allapppdfs[$i]["iPdfId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No pdf founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                
        echo $html;exit; 
    }
    
    
    function do_upload_pdf($folderId,$folder,$image){
	   
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
    
    function pdf_delete(){
        $iPdfId = $this->input->get('iPdfId');
        
        if($iPdfId !=''){
            $id = $this->app_model->delete_pdf($iPdfId);
            
            if(!is_dir('uploads/pdfs/'.$iPdfId)){
               rmdir('uploads/pdfs/'.$iPdfId, 0777);
            }       
        }
        $iApplicationId = $this->input->get('iApplicationId');
        
        $allapppdfs = $this->app_model->get_appwise_pdfs($iApplicationId);
        
                
         
             $html .='<div id="pdf_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Title</th>
                        <th>Pdf File</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allapppdfs) > 0){
                        for($i=0;$i<count($allapppdfs);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapppdfs[$i]["vPdfTitle"].'</p></td>';
                                     if($allapppdfs[$i]["vPdfFile"] !='' && $allapppdfs[$i]["vPdfUrl"] ==''){
                                        $vPdfFile = $this->data['base_upload']."pdfs/".$allapppdfs[$i]["iPdfId"]."/".$allapppdfs[$i]['vPdfFile'];
                                        $html .='<td width="45%" align="center"><a href="'.$vPdfFile.'" target="_blank">'.$allapppdfs[$i]["vPdfFile"].'</a></td>';            
                                     }elseif($allapppdfs[$i]["vPdfFile"] =='' && $allapppdfs[$i]["vPdfUrl"] !=''){
                                        $html .='<td width="45%" align="center"><a href="'.$allapppdfs[$i]["vPdfUrl"].'" target="_blank">'.$allapppdfs[$i]["vPdfUrl"].'</a></td>';
                                     }else{
                                        $html .='<td width="45%" align="center">---</td>';
                                     }
                                    $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_pdf('.$allapppdfs[$i]["iPdfId"].',8);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_pdf('.$allapppdfs[$i]["iPdfId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No pdf founds.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                
        echo $html;exit; 
    }
    
    
    function showeditpdfpopup(){
        $iPdfId = $this->input->get('iPdfId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $pdfinfo = $this->app_model->getpdfinfo($iPdfId);
        #echo "<pre>";
       
       # print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
         
           #  print_r($all_featurefields[1]['vDataBaseFieldName']);exit;
            $html .='<div id="pdfformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Pdf</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editpdf_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmpdf" id="updatefrmpdf" method="post" action="'.$this->data['base_url'].'app/update_pdf" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                             $html .= '<input  type="hidden" name="iPdfId" value="'.$iPdfId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                      			if($val['vDataBaseFieldName'] == "vPdfTitle" || ($val['vDataBaseFieldName'] == "vPdfUrl" && $pdfinfo['eFileType'] == 'Pdf Url')){
                                      				$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                      			}else{
                                      				$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'" style="display:none;">';

                                      			}
                                                   
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="'.$pdfinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
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
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e" name="'.$val['vDataBaseFieldName'].'" style="float: left;"  onchange="CheckValidPdfFile(this.value,this.name)">';
                                                            
                                                            if($pdfinfo[$val['vDataBaseFieldName']] != ''){
                                                                $fileurl = $this->data['base_upload']."pdfs/".$pdfinfo['iPdfId']."/".$pdfinfo[$val['vDataBaseFieldName']];
                                                            
                                                                $html .='<div id="detetepdffile"><div style="float: left;"><a target="_blank" href="'.$fileurl.'">'.$pdfinfo[$val['vDataBaseFieldName']].'<a></div><div style="float: left; margin: 8px 0px 0px 20px;">
                                                                <button onclick="deletepdffile('.$pdfinfo['iPdfId'].');" class="btn btn-primary" type="button">Delete</button></div></div>';
                                                            }
                                                            
                                                         $html .='</div>';
                                                            
                                               $html .='</div>';
                                               $html .= '<input  type="hidden" name="vOldFile" id="vOldFile" value="'.$pdfinfo[$val['vDataBaseFieldName']].'">';   
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
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                         case 'Status':
                                        	$html .='<div class="control-group" >
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
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
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return updatepdf();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
        
        echo $html;exit;
    }


   function update_pdf(){
        
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
		  //  echo '<pre>';print_r($data);exit;
            $iPdfId = $this->app_model->update_pdf($data,$iPdfId);
            

        }
        echo $iPdfId;exit;
    }

    function deletepdffile(){
	   $iPdfId=$this->input->get('iPdfId');
	   $pdfinfo=$this->app_model->getpdfinfo($iPdfId);   
	   $var=unlink($this->data['base_path'].'uploads/pdfs/'.$iPdfId.'/'.$pdfinfo['vPdfFile']);
	   $pdfinfo['vPdfFile'] = "";
	   $deleteFile=$this->app_model->update_pdf($pdfinfo,$iPdfId);
	   if($deleteFile){
		  echo "delete";
	   }else{
		  echo "No";
	   }
	   
    }


    function getlocationhtml($iFeatureId){
    	
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
            
            $html .='<div id="locationformid" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add New Location</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addloc_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmloc" id="frmloc" method="post" action="'.$this->data['base_url'].'app/save_loc" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                        		if($val['vDataBaseFieldName'] == "vPdfUrl"){
                                                    $html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'" style="display:none;">';
                                            	}else{
                                            		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                            	}
                                                       $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
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
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'" onchange="CheckValidPdfFile(this.value,this.name)">
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
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
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
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return submitlocation();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#locationformid" id="addpdfid"  style="float:right;">Add New Location</a></div>';
        
        $allapplocations = $this->app_model->get_appwise_locations($this->data['iApplicationId']);
       //  echo '<pre>';print_r($allapplocations);exit;
        $html .='<div id="loc_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Website</th>
                        <th>Email</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allapplocations) > 0){
                        for($i=0;$i<count($allapplocations);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapplocations[$i]["vWebsite"].'</p></td>';
                                     $html .=  '<td width="30%"><p class="sp_title">'.$allapplocations[$i]["vEmail"].'</p></td>';
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_loc('.$allapplocations[$i]["iLocationId"].',14);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_loc('.$allapplocations[$i]["iLocationId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Location found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                    
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
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
        $allapplocations = $this->app_model->get_appwise_locations($iApplicationId);
       
                
         
             $html .='<div id="loc_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Website</th>
                        <th>Email</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allapplocations) > 0){
                        for($i=0;$i<count($allapplocations);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapplocations[$i]["vWebsite"].'</p></td>';
									$html .='<td width="30%"><p class="sp_title">'.$allapplocations[$i]["vEmail"].'</p></td>';
                                    $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_loc('.$allapplocations[$i]["iLocationId"].',14);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_loc('.$allapplocations[$i]["iLocationId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Location found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                
        echo $html;exit; 
    }

    function loc_delete(){
        $iLocationId = $this->input->get('iLocationId');
        
        if($iLocationId !=''){
            $id = $this->app_model->delete_location($iLocationId);
     
        }
        $iApplicationId = $this->input->get('iApplicationId');
        
        $allapplocations = $this->app_model->get_appwise_locations($iApplicationId);
        
                
         
             $html .='<div id="loc_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Website</th>
                        <th>Email</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allapplocations) > 0){
                        for($i=0;$i<count($allapplocations);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">
                                     <td width="30%"><p class="sp_title">'.$allapplocations[$i]["vWebsite"].'</p></td>';
									$html .='<td width="30%"><p class="sp_title">'.$allapplocations[$i]["vEmail"].'</p></td>';
                                    $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_loc('.$allapplocations[$i]["iLocationId"].',14);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_loc('.$allapplocations[$i]["iLocationId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Location found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                
        echo $html;exit; 
    }



    function showeditlocpopup(){
        $iLocationId = $this->input->get('iLocationId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $locinfo = $this->app_model->getlocinfo($iLocationId);
        #echo "<pre>";
       
       # print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
         
           #  print_r($all_featurefields[1]['vDataBaseFieldName']);exit;
            $html .='<div id="locformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Location</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editloc_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmloc" id="updatefrmloc" method="post" action="'.$this->data['base_url'].'app/update_loc" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                             $html .= '<input  type="hidden" name="iLocationId" value="'.$iLocationId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                      				$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'" >';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="'.$locinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
                                                break;
                                        case 'Checkbox':
                                            $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <label class="checkbox">';
                                                            if($locinfo[$val['vDataBaseFieldName']] == 'Yes'){
																$html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" checked="checked">';
                                                            }else{
																$html .='<input type="checkbox" value="Yes"  id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" >';
                                                            }
                                                                
                                                            $html .= '</label>
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

                                               $html .='<div class="control-group">
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'e" >
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
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                         case 'Status':
                                        	$html .='<div class="control-group" >
                                                        <label class="control-label">'.$val['vLabelName'].'</label>
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
                        			<button type="button" class="btn btn-primary"  id="locbtn" name="locbtn" onclick="return updateloc();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
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

//Webiste Start

    function getwebsitehtml($iFeatureId){
    	
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
          #  echo '<pre>';print_r($all_featurefields);exit;
            $html .='<div id="websiteformid" class="main_popup" style="display:none;">
                    <div class="popup_header">
                        <h3>Add New Website</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="addwebsite_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="frmwebsite" id="frmwebsite" method="post" action="'.$this->data['base_url'].'app/save_website" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                            		$html .='<div class="control-group" id="maindiv'.$val['vDataBaseFieldName'].'">';
                                                       $html .= '<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
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
                                                            <input type="file"  value="" class="default" id="'.$val['vDataBaseFieldName'].'" name="'.$val['vDataBaseFieldName'].'" onchange="CheckValidWebsiteImg(this.value,this.name)">
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
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
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
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="websitebtn" name="websitebtn" onclick="return submitwebsite();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
                <button aria-hidden="true" onclick="closeleanmodal();" class="btn">Close</button>
            </div>
        </div>';
        
     	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#websiteformid" id="addpdfid"  style="float:right;">Add New Website</a></div>';
        
        $allappwebsites = $this->app_model->get_appwise_websites($this->data['iApplicationId']);
      #   echo '<pre>';print_r($allappwebsites);exit;
        $html .='<div id="website_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Thumbnil</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allappwebsites) > 0){
                        for($i=0;$i<count($allappwebsites);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">';
			                          if($allappwebsites[$i]['vWebImage'] == ''){
			                          	$fileurl = $this->data['base_image']."noimg.png";
			                          	$html .='<td width="30%"><div style="float: left;" ><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';
			                          }else{
			                          	$fileurl = $this->data['base_upload']."website/".$allappwebsites[$i]['iWebsiteId']."/".$allappwebsites[$i]['vWebImage'];
			                          	$html .='<td width="30%"><div style="float: left;" ><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';

			                          }
                                     
                                     $html .=  '<td width="30%"><p class="sp_title">'.$allappwebsites[$i]["vWebTitle"].'</p></td>';
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_website('.$allappwebsites[$i]["iWebsiteId"].',12);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_website('.$allappwebsites[$i]["iWebsiteId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Website found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                    
                    
        return $html;  
        
        #echo "<pre>";
        #print_r($all_featurefields);exit;
        
    }

    function appwisewebsitelisting(){
    	//echo 'aka';exit;
        $iApplicationId = $this->input->get('iApplicationId');
       // echo  $iApplicationId ;exit;
        $allappwebsites = $this->app_model->get_appwise_websites($iApplicationId);
       //  echo '<pre>';print_r($allappwebsites);exit;
        $html .='<div id="website_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Thumbnil</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allappwebsites) > 0){
                        for($i=0;$i<count($allappwebsites);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">';
			                          if($allappwebsites[$i]['vWebImage'] == ''){
			                          	$fileurl = $this->data['base_image']."noimg.png";
			                          	$html .='<td width="30%"><div style="float: left;" ><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';
			                          }else{
			                          	$fileurl = $this->data['base_upload']."website/".$allappwebsites[$i]['iWebsiteId']."/".$allappwebsites[$i]['vWebImage'];
			                          	$html .='<td width="30%"><div style="float: left;" ><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';

			                          }
                                     
                                     $html .=  '<td width="30%"><p class="sp_title">'.$allappwebsites[$i]["vWebTitle"].'</p></td>';
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_website('.$allappwebsites[$i]["iWebsiteId"].',12);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_website('.$allappwebsites[$i]["iWebsiteId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Website found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                    
                    
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

    function website_delete(){
        $iWebsiteId = $this->input->get('iWebsiteId');
        
        if($iWebsiteId !=''){
            $id = $this->app_model->delete_website($iWebsiteId);
            
            if(!is_dir('uploads/website/'.$iWebsiteId)){
               rmdir('uploads/website/'.$iWebsiteId, 0777);
            }       
        }
        $iApplicationId = $this->input->get('iApplicationId');
        
        $allappwebsites = $this->app_model->get_appwise_websites($iApplicationId);
        
                
         
        $html .='<div id="website_listing">
                    <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                    <tr class="nodrop">
                        <th>Thumbnil</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>';
                    
                    if(count($allappwebsites) > 0){
                        for($i=0;$i<count($allappwebsites);$i++){
                            $k = $i+1; 
                        $html .='<tr class="row1a">';
			                          if($allappwebsites[$i]['vWebImage'] == ''){
			                          	$fileurl = $this->data['base_image']."noimg.png";
			                          	$html .='<td width="30%"><div style="float: left;" ><img src="'.$fileurl.'" height="50px" width="50px"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';
			                          }else{
			                          	$fileurl = $this->data['base_upload']."website/".$allappwebsites[$i]['iWebsiteId']."/".$allappwebsites[$i]['vWebImage'];
			                          	$html .='<td width="30%"><div style="float: left;" ><img src="'.$fileurl.'"></div><div style="float: left; margin: 8px 0px 0px 20px;"></td>';

			                          }
                                     
                                     $html .=  '<td width="30%"><p class="sp_title">'.$allappwebsites[$i]["vWebTitle"].'</p></td>';
                                     $html .='<td align="center" width="12%"><a class="apptab_edit"  onclick="edit_website('.$allappwebsites[$i]["iWebsiteId"].',12);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                     <td align="center" width="13%"><a class="button grey" onclick="delete_website('.$allappwebsites[$i]["iWebsiteId"].');" style="cursor:pointer;"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                </tr>';    
                        }    
                    }else{
                        $html.='<tr class="row1a"><td colspan="5" style="text-align:center;">No Website found.</td></tr>';
                    }
                $html .='</table>';
        $html .='</div>';
                    
                    
        echo $html;exit;
    }

    function showeditwebsitepopup(){
        $iWebsiteId = $this->input->get('iWebsiteId');
        $iFeatureId = $this->input->get('iFeatureId');
        
        $websiteinfo = $this->app_model->getwebsiteinfo($iWebsiteId);
        #echo "<pre>";
       
       # print_r($pdfinfo);exit;
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
         
           #  print_r($all_featurefields[1]['vDataBaseFieldName']);exit;
            $html .='<div id="websiteformid" class="main_popup" style="display:block;">
                    <div class="popup_header">
                        <h3>Edit Website</h3>
                    </div>
                    <div class="popup-body">';        
                        $html .='<div id="editwebsite_validation" style="display:none;"></div>';
                    $html .='<div class="widget-body form">';
                            $html .='<form class="form-horizontal" name="updatefrmwebsite" id="updatefrmwebsite" method="post" action="'.$this->data['base_url'].'app/update_website" enctype="multipart/form-data">';
                            $html .= '<input class="span6" type="hidden" name="iApplicationId" value="'.$this->data['iApplicationId'].'">';
                             $html .= '<input  type="hidden" name="iWebsiteId" value="'.$iWebsiteId.'">';
                                    foreach ($all_featurefields as $val){		  		 
                                        switch ($val['eType']) {
                                        case 'Textxbox':
                                      				$html .='<div class="control-group" id="emaindiv'.$val['vDataBaseFieldName'].'">';
                                                         $html .='<label class="control-label">'.$val['vLabelName'].'</label>
                                                        <div class="controls">
                                                            <input type="text" value="'.$websiteinfo[$val['vDataBaseFieldName']].'" class="input-xlarge" id="'.$val['vDataBaseFieldName'].'e" name="data['.$val['vDataBaseFieldName'].']" >
                                                        </div>
                                                    </div>';
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
                                                            <input type="file" class="default" id="'.$val['vDataBaseFieldName'].'e" name="'.$val['vDataBaseFieldName'].'" style="float: left;"  onchange="CheckValidWebsiteImg(this.value,this.name)">';
                                                            
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
                                                            <textarea class="input-xlarge" value="" rows="3" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'e" ></textarea>
                                                        </div>
                                                    </div>';					
                                                break; 
                                            
                                        }
                                        
                                    }
                                    
                                
                            $html .='</form>';
                        $html .='</div>';
                        $html .='<div class="row_form">
                        			<button type="button" class="btn btn-primary"  id="eventbtn" name="eventbtn" onclick="return updatewebsite();"><i class="icon-ok"></i> Save</button>
                        		</div>';
            $html .='</div>
            <div class="popup-footer">
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





    
}
/* End of file app.php */
/* Location: ./application/controllers/app.php */
?>
