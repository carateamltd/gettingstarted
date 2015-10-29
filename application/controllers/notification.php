<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends MY_Controller
{
    
    function __construct(){
	   
        parent::__construct();
        $this->load->model('notification_model', '', TRUE);	   
        $this->load->library('upload');	   
        $this->load->library('image_lib');
        $this->load->model('admin_model', '', TRUE);

        // language 
		$lang= $this->session->userdata('language');
		$lang1 = $this->admin_model->get_language_details($lang);
		$this->smarty->assign('lang',$lang1);	   	   	   
    }    

     function index(){

		/*if($this->session->userdata['user_info']['iRoleId'] != '2')
		{
			$this->session->set_flashdata('warning', '1');
			redirect($this->data['base_url'] . 'home');
            exit;	
		} */ 
	   $this->data['message'] = $this->session->flashdata('message');
        //$this->data['tpl_name']= "notification.tpl";
	   $this->data['tpl_name']= "view-notification.tpl";	   
	   //$xml=simplexml_load_file($this->data['base_url'].'student.xml');
	   /*		$xml=simplexml_load_file('http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/student.xml');
	   $json = json_encode($xml);		  
	   $array = json_decode($json,TRUE);
	  
	   $all_group=array();	   
	   for($i=0;$i<count($array['item']);$i++){
		  if(!in_array($array['item'][$i]['group'],$all_group)){
			 $all_group[]=$array['item'][$i]['group'];
		  }
	   }*/
	   $all_group = array("IOS","Android");
	   
	   $this->data['all_group']=$all_group;   
	   $this->data['message'] =$this->input->get('msg');	   
	   $this->data['mode']='create';
       $iClientId = $this->data[user_info][iAdminId];
	   $this->data['iAdminId']=$iClientId;	   
	   $iRoleId=$this->data[user_info][iRoleId];	   
	   $getXmlUrl=$this->notification_model->getXmlUrl($iClientId);
	   $this->data['client_url']=$getXmlUrl->vXmlUrl;	   
	   
       //breadcrumb 
       $this->breadcrumb->add('Dashboard', base_url());
       $this->breadcrumb->add('Push Notification', '');
       $this->data['breadcrumb'] = $this->breadcrumb->output();
       //ends
       $this->smarty->assign('data', $this->data);
	   //echo "<pre>";print_r($this->data['user_info']['iAdminId']);exit;
       $this->smarty->view('template.tpl'); 

    }
    function create(){
       /* 
		   if($this->session->userdata['user_info']['iRoleId'] != '2')
		   {
				$this->session->set_flashdata('warning', '1');
				redirect($this->data['base_url'] . 'home');
				exit;
		   }
	   */  
	    
	   $this->data['tpl_name']= "notification.tpl";	   
	   //$xml=simplexml_load_file($this->data['base_url'].'student.xml');
	   /*$xml=simplexml_load_file('http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/student.xml');
	   $json = json_encode($xml);		  
	   $array = json_decode($json,TRUE);
	   for($i=0;$i<count($array['item']);$i++){
		  if(!in_array($array['item'][$i]['group'],$all_group)){
			 $all_group[]=$array['item'][$i]['group'];
		  }
	   }*/
	   
	   $all_group = array("IOS","Android");
	   
	   $this->data['all_individuals']=$this->notification_model->get_individual_users();
	   if($this->session->userdata['user_info']['iRoleId'] != '2')
    	{
	   		$iClientId = '52';//$this->data[user_info][iAdminId];
		}else{
			$iClientId = $this->data[user_info][iAdminId];
		}
	   $this->data['user_applications']=$this->notification_model->getuserapps($iClientId);
	   
	   /** get tabname details **/
	   $tabname = $this->notification_model->get_tabname_details();
	   
	   $this->data['tabname'] = $tabname;
	   $this->data['all_group']= $all_group;   
	   $this->data['message'] = $message;	   
	   $this->data['mode']='create';
       $iClientId = $this->data[user_info][iAdminId];
	   $this->data['iAdminId']=$iClientId;	   
	   $iRoleId=$this->data[user_info][iRoleId];	   
	   $getXmlUrl=$this->notification_model->getXmlUrl($iClientId);
	   $this->data['client_url']=$getXmlUrl->vXmlUrl;	   
	   
		//breadcrumb 
		$this->breadcrumb->add('Dashboard', base_url());
		$this->breadcrumb->add('Push Notification', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		//ends
		$this->smarty->assign('data', $this->data);
		//echo "<pre>";print_r($this->data['user_info']['iAdminId']);exit;
		$this->smarty->view('template.tpl');

    }
	
	function get_individual_users()
	{
		$data = $this->input->post();
		$iApplicationId = $data['iApplicationId'];
		$all_users = $this->notification_model->get_individual_users($iApplicationId);
		//$all_users = $this->notification_model->get_individual_users('66');
		echo json_encode($all_users);
	}
    
    
    function view()
	{
	    /*if($this->session->userdata['user_info']['iRoleId'] != '2')
	    {
	    	$this->session->set_flashdata('warning', '1');
			redirect($this->data['base_url'] . 'home');
            exit;
	    }*/
       $notificationId=$this->uri->segment(3);
	   
	   $this->data['tpl_name']= "edit-notification.tpl";	   
	   //$xml=simplexml_load_file($this->data['base_url'].'student.xml');
	   $xml=simplexml_load_file('http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/student.xml');
	   $json = json_encode($xml);		  
	   $array = json_decode($json,TRUE);
	   $all_group=array();	   
	   for($i=0;$i<count($array['item']);$i++){
		  if(!in_array($array['item'][$i]['group'],$all_group)){
			 $all_group[]=$array['item'][$i]['group'];
		  }
	   }
	   $get_all_details=$this->notification_model->get_notification($notificationId);	   
	   $this->data['notification']=$get_all_details;
	   
	   $this->data['all_group']=$all_group;   
	   $this->data['message'] =$message;	   
	   $this->data['mode']='create';
       $iClientId = $this->data[user_info][iAdminId];
	   $this->data['iAdminId']=$iClientId;	   
	   $iRoleId=$this->data[user_info][iRoleId];	   
	   $getXmlUrl=$this->notification_model->getXmlUrl($iClientId);
	   $this->data['client_url']=$getXmlUrl->vXmlUrl;
	   
		//breadcrumb 
		$this->breadcrumb->add('Dashboard', base_url());
		$this->breadcrumb->add('Push Notification', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		//ends
		$this->smarty->assign('data', $this->data);
		//echo "<pre>";print_r($this->data['user_info']['iAdminId']);exit;
		$this->smarty->view('template.tpl'); 

    }
	
    function send($push,$appid)
	{
		/*if($this->session->userdata['user_info']['iRoleId'] != '2')
	    {
	    	$this->session->set_flashdata('warning', '1');
			redirect($this->data['base_url'] . 'home');
            exit;
	    }*/
	   // print_r($push);exit;
        $Url = "http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/webservice.php?action=sendNotification&vDeviceid=".$push['deviceid']."&msg=".$push['message']."";
	   
	    if (!function_exists('curl_init')){
            die('Sorry cURL is not installed!');
        }
	   
        // OK cool - then let's create a new cURL resource handle
        $ch = curl_init();
	   
        // Now set some options (most are optional)
     
        // Set URL to download
        curl_setopt($ch, CURLOPT_URL, $Url);  
     
        // Set a referer
        curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
     
        // User agent
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
     
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);
     
        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
     
        // Download the given URL, and return output
        $output = curl_exec($ch);	   
        // Close the cURL resource, and free system resources
	   curl_close($ch);	   
	   return $output;  
	    
    }
	
	//function test(){
	///	$data['message'] = $_REQUEST['message'];
	//	$data['vToken'] = $_REQUEST['vToken'];	  
	//	$data['iOrderId'] = $_REQUEST['iOrderId'];
			
	//		print_r($data);	  
		 //  ?message=%27test%27&vToken=APA91bEuBQhPQsJ3g3DagUIvtm2AOeHoXqe9POnBX5Hou_3aKaxPMbTzK0h-n52WWlanfru5c8w7WPsmLwMxtw_QKNdFHDX27B3I-WVLkgD34qvHhVoRxRnuZzPan4Mj1q11TOiDzZZP&iOrderId=3
	//	  $DeviceToken = $this->sendAndroidPush($data['message'], $data['vToken'],$data['iOrderId']); 
		  
	//	  exit;
		  		//$data['message'] = "Menu of the day";
		//		$push_details = $this->notification_model->get_device_details($data);
				
			/*		foreach($push_details as $val)
					{
						if($val['vType'] == 'Android')
						{
							$DeviceToken = $this->sendAndroidPush($data['message'], $val['vToken'],$index['iOrderId']);
						}
						if($data['vType'] == 'IOS')
						{
							$DeviceToken = $this->sendIOSPush($val['message'], $val['vToken']);
						}
					}
					exit;*/
	//}
	
    
	/**
		Mayur Gajjar
		Save Notification AND Send
	**/
    function save_notification()
	{
		   /*if($this->session->userdata['user_info']['iRoleId'] != '2')
		   {
				$this->session->set_flashdata('warning', '1');
				redirect($this->data['base_url'] . 'home');
				exit;  
		   }*/
		   $this->data['message'] = $this->session->flashdata('message');
	       $data=$this->input->get();
	       
		   $save_data['iAdminId']=$data['iAdminId'];
		   $save_data['iApplicationId']=$data['data']['iApplicationId'];
		   $save_data['vMessage']=$data['message'];
		   $save_data['vTabName']=$data['data']['tabname'];
		   $save_data['eType']=$data['Data']['eType'];
		   $save_data['dSendDate']=date('Y-m-d');
		   if($data['group_name']!='')
		   {
				$save_data['vGroupName']=$data['group_name'];  
		   }	
		   
		  
		   /** Save notification to database **/
		   $save_record=$this->notification_model->save('r_notification',$save_data);
		   
		   /** check record **/
		   if($save_record)
		   {
			  $this->session->set_flashdata('message',"This Notification successfully store.");
			  /** data eType **/
			  if($data['Data']['eType'] == 'All')
			  {
			  	/** get device details **/	
			  	$push_details = $this->notification_model->get_device_details($data);
				
				/** Feature Menu Index **/
				$index = $this->notification_model->get_feature_menu_index($data['data']['tabname'], $data['data']['iApplicationId']);
				
				/** push details **/
				foreach($push_details as $val)
				{
					/** Android Details **/
					if($val['vType'] == 'Android')
					{
						/** Send Android **/
						$DeviceToken = $this->sendAndroidPush($data['message'], $val['vToken'], $index['iOrderId']);
					}
					/** IOS **/
					if($val['vType'] == 'IOS')
					{
						/** Send IOS **/
						$DeviceToken = $this->sendIOSPush($data['message'], $val['vToken'],$index['iOrderId']);
					}
				}
				/** End push **/
				
			  }else if($data['Data']['eType'] == 'Group'){
			  		
					/** get device details **/	
			  		$push_details = $this->notification_model->get_device_group_details($data);
					/** Feature Menu Index **/
					$index = $this->notification_model->get_feature_menu_index($data['data']['tabname'], $data['data']['iApplicationId']);
					
					/** push details **/
					foreach($push_details as $val)
					{
						/** Android Details **/
						if($val['vType'] == 'Android'){
							/** Send Android **/
							$DeviceToken = $this->sendAndroidPush($data['message'],$val['vToken'], $index['iOrderId']);
						}
						/** IOS details **/
						if($data['group_name'] == 'IOS'){
							/** Send IOS **/
							$DeviceToken = $this->sendIOSPush($data['message'], $val['vToken'],$index['iOrderId']);
						}
					}
			  }
			  /** Individual eType **/
			  else if($data['Data']['eType'] == 'Individual')
			  {
			  		/** get device details **/	
			  		$push_details = $this->notification_model->get_device_individual_details($data);
					
					/** Feature Menu Index **/
					$index = $this->notification_model->get_feature_menu_index($data['data']['tabname'], $data['data']['iApplicationId']);
					
					/** Push Notification **/
					if($val['vType'] == 'Android'){
						/** Send Android **/
						$DeviceToken = $this->sendAndroidPush($data['message'],$val['vToken'], $index['iOrderId']);
					}
					
					/** IOS details **/
					if($data['group_name'] == 'IOS'){
						/** Send IOS **/
						$DeviceToken = $this->sendIOSPush($data['message'], $val['vToken'],$index['iOrderId']);
					}
				}
			  
			  /** success **/
			  echo "success";
		   }else{
		   	  /** error **/
			  echo "error";
		   }
    }
    
    function get_notification_listing()    
	{
		/*if($this->session->userdata['user_info']['iRoleId'] != '2')
			{
				$this->session->set_flashdata('warning', '1');
				redirect($this->data['base_url'] . 'home');
				exit;
		}*/
	    $all_admin = $this->notification_model->get_all_notification($this->data['user_info']['iAdminId']);
		    
	    //echo "<pre>";print_r($all_admin);exit;
        if(count($all_admin)>0) {
            foreach ($all_admin as $key => $value)
            {
				 $date = $value['dSendDate'];
				 $current_date=date('F d,   Y',strtotime($date));
				 $value['dSendDate']=$current_date;		 
					$alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" onclick="check_uncheck()" value="'.$value['iNotificationId'].'">';
					// $alldata[$key]['client'] = $value['vFirstName'].' '.$value['vLastName'];
					// secondary
					$alldata[$key]['message'] = '<div style="table-layout:auto; word-break:break-all; word-wrap:break-word;">'.$value['vMessage'].'</div>';
					$alldata[$key]['type'] = $value['eType'];                
					$alldata[$key]['sendate'] = $value['dSendDate'];
					// $alldata[$key]['status'] = '<center>'.$value['eStatus'].'</center>';
					$alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'notification/view/'.$value['iNotificationId'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
				    // $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'notification/delete/'.$value['iNotificationId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
				}
				$aData['aaData'] = $alldata;
        	}
			else {
            	$aData['aaData'] = "";  
        	}
		/*
		  echo "<pre>";
			print_r($aData['aaData']);
			exit; */
	    //echo "<pre>";print_r($aData);exit;
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
	
	/***
		send Android Push Notification
	***/
	function sendAndroidPush($message,$vDeviceToken,$iOrderId)
	{
		/** Define Key **/
		define("GOOGLE_API_KEY", "AIzaSyAjT0M1qoqix2y3pZxNkroTgSt15tq7UGY");
		$url = 'https://android.googleapis.com/gcm/send';
	    

		/** headers **/
		$headers = array(
			'Authorization: key=' . GOOGLE_API_KEY,
			'Content-Type: application/json'
		);
		$ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 		curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $vDeviceToken = $vDeviceToken;
		/*$hotSpot_id ='Hotspot ID';
		$reminder_id='Reminder ID';
		$category_id='Category ID';
		$eFileType='File Type';
		$vReminderText='Reminder Text';
		$vFilePath='File Path';
		$vReminderTitle='Reminder Title';
		$dCreatedDate='Created Date';
		$eReminderType='Reminder Type';
		$vHotspotTitle='Hotspot Title';
		$vCategoryName='Category Name';*/
  
		$registatoin_ids = array($vDeviceToken); // GCM Registration ID got from device
		
		echo "<pre>";
		print_r($registatoin_ids);
		$full_message = array(
		   "message" => $message,
		//   "tabname" => $iOrderId,
		);	// MESSAGE
		
		$fields = array(
			'registration_ids' => $registatoin_ids,
			'data' => $full_message,
		);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}else{
			echo "success";
		}
		
		curl_close($ch);
	}
 
 	/*** 
		Send IOS in push notification
	***/
 	function sendIOSPush($message,$vDeviceToken,$tabname)
	{
		$deviceToken = $vDeviceToken; //$_GET['vDeviceToken'];
		$passphrase = '';
		$message = $message; //$_GET['message'];
		
		if($_SERVER["HTTP_HOST"]=="122.170.107.160")
		{
		   $pem_path=$_SERVER['DOCUMENT_ROOT'].'/erestaurant/assets/pem/apns-dev.pem';
		}else{
		   $pem_path=$_SERVER['DOCUMENT_ROOT'].'/erestaurant/assets/pem/apns-dev.pem';
		}
		  
		$pem=str_replace("/","\\",$pem_path);
			 
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', $pem);
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
	    $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx); //FOR TESTING
		
		if (!$fp)
		exit("Failed to connect: $err $errstr" . PHP_EOL);
		
		$body['aps'] = array(
			'alert' => array(
				  'body' => $message,
				  'tabname' => $tabname,
				//  'body' => $tabname,
			'action-loc-key' => 'Bango App',
			  ),
			  'badge' => 2,
			'sound' => 'oven.caf',
		);
		
		// Encode the payload as JSON
		$payload = json_encode($body);
		
		// Build the binary notification
		$msg = chr(o) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		
		if (!$result){
			//echo 'Message not delivered' . PHP_EOL;
		}else{
			echo 'Message successfully delivered' . PHP_EOL;
		}
		
		// Close the connection to the server
		fclose($fp);
 	}
 	
 	function sendPushMessage()
 	{
 		$postedData = $this->input->post();
 		$iAdminId = $postedData['iAdminId'];
 		$iApplicationId = $postedData['data']['iApplicationId'];
 		$message = $postedData['message'];
 		$tabname = $postedData['data']['tabname'];
 		$eType = $postedData['Data']['eType'];
 		$group_name = $postedData['group_name'];
 		$individual_name = $postedData['data']['individual_name'];

		$applicationDetails = $this->notification_model->get_application_details($iApplicationId);
 		if($eType=='All')
 		{
 			 $registatoin_details = $this->notification_model->get_regIds($iApplicationId,'All');
 		}
 		else
 		{
 			$registatoin_details = $this->notification_model->get_regIds($iApplicationId,$group_name);
 		}
 		$iosDevices = Array();
 		$androidDevices = Array();
 		$ai=0;
 		$ii=0;
 		foreach($registatoin_details as $registerArray)
 		{
 			if($registerArray['vType']=='Android')
 			{
 				$androidDevices[$ai]=$registerArray['vToken'];
 				$ai=$ai+1;
 			}
 			else
 			{
 				$iosDevices[$ii]=$registerArray['vToken'];
 				$ii=$ii+1;
 			}
 		}
 		if(count($androidDevices)>0)
 		{
 			//-- Android notification code here
 			//require_once 'pushnotification/pushnotify_Android/GCM.php';
 			
 			//$gcm = new GCM();
 			
 			//$message = array("message" => $message,"msgcnt"=>1);
 
			//$result = $gcm->send_notification($androidDevices, $message);
 
			//echo $result;
			
			define( 'API_ACCESS_KEY', 'AIzaSyDz9Nu2s7V_UDwRt7wz42gYvA0hsauLE-k' );
			//$registrationIds = array( 'APA91bGqHGotUukLZDuw5SdQwQsNGI2kbMlPgPJy585lIMPt-njOnU50EA9vs9wOWXmoVyGm_OKxsNAoO5J5aD_nGpzq6zhjCvLd4Hto2A1o01sstwdpV1wkvcVX6EELZJYvnNzEq9EK' );
			$registrationIds = $androidDevices;
			$msg = array
			(
				'message' 	=> $message,
				'title'		=> 'Fashion Theory',
				'subtitle'	=> '',
				'tickerText'	=> '',
				'vibrate'	=> 1,
				'sound'		=> 1,
				'tabname' => $tabname/*,
				'largeIcon'	=> 'large_icon',
				'smallIcon'	=> 'small_icon'*/
			);
			
			$fields = array
			(
				'registration_ids' 	=> $registrationIds,
				'data'			=> $msg
			);
 
			$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
 
			$ch = curl_init();
			curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
			curl_setopt( $ch,CURLOPT_POST, true );
			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
			$result = curl_exec($ch );
			curl_close( $ch );
			echo $result;		
			
 		}

 		if(count($iosDevices)>0)
 		{
			$message = $applicationDetails[0]['tAppName']." - " . $message;
			foreach($iosDevices as $token_id){
				$deviceToken = $token_id;

				// Put your private key's passphrase here:
				$passphrase = 'fashiontheory';

				// Put your alert message here:
				//$message = $message;

				////////////////////////////////////////////////////////////////////////////////

				$ctx = stream_context_create();
				stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns_prod_cert.pem');
				stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

				// Open a connection to the APNS server
				$fp = stream_socket_client(
					'ssl://gateway.push.apple.com:2195', $err,
					$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);

				if (!$fp){
				echo "fp".$fp;
					exit("Failed to connect: $err $errstr" . PHP_EOL);
				}else{
				echo 'Connected to APNS' . PHP_EOL.'<br/><br/>';
				}

				// Create the payload body
				$body['aps'] = array(
					'alert' => $message,
					'sound' => 'default',
					'badge' => 1,
					'tabname' => $tabname
				);

				// Encode the payload as JSON
				$payload = json_encode($body);

				// Build the binary notification
				$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

				// Send it to the server
				$result = fwrite($fp, $msg, strlen($msg));

				if (!$result)
					echo 'Message not delivered' . PHP_EOL;
				else
					echo 'Message successfully delivered' . PHP_EOL;

				// Close the connection to the server
				fclose($fp);
			}
 			/*//-- iOs notification code here
 			$regId = $iosDevices;

 			// Provide the Host Information.
			$tHost = 'gateway.sandbox.push.apple.com';
			$tPort = 2195;

			// Provide the Certificate and Key Data.
			$tCert = $this->data['base_url'].'/pushnotification/fashiontheorydev.pem';

			// Provide the Private Key Passphrase (alternatively you can keep this secrete
			// and enter the key manually on the terminal -> remove relevant line from code).
			$tPassphrase = '';

			// The message that is to appear on the dialog.
			$empresa = "Fashion Theory";
			$tAlert = $empresa . ' - ' . $message;

			// The Badge Number for the Application Icon (integer >=0).
			$tBadge = 1;

			// Audible Notification Option.
			$tSound = 'default';

			// The content that is returned by the LiveCode "pushNotificationReceived" message.
			$tPayload = '{"endereco":"lauro oscar diefenthaeler","tel":"51 3561-8797","numero":"243","complemento":"0","id":"9","nome":"petiskeira","msg":"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum."}';

			// Create the message content that is to be sent to the device.
			$tBody['aps'] = array (
				'alert' => $tAlert,
				'badge' => $tBadge,
				'sound' => $tSound,
				'tabname' => $tabname
			);
			$tBody ['payload'] = $tPayload;

			// Encode the body to JSON.
			$tBody = json_encode ($tBody);

			// Create the Socket Stream.
			$tContext = stream_context_create ();

			stream_context_set_option ($tContext, 'ssl', 'local_cert', $tCert);

			// Remove this line if you would like to enter the Private Key Passphrase manually.
			stream_context_set_option ($tContext, 'ssl', 'passphrase', $tPassphrase);

			// Open the Connection to the APNS Server.
			$tSocket = stream_socket_client ('ssl://'.$tHost.':'.$tPort, $error, $errstr, 30, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $tContext);

			// Check if we were able to open a socket.
			if (!$tSocket)
				exit ("APNS Connection Failed: $error $errstr" . PHP_EOL);
			
			foreach($regId as $token_id)
			{
				// Provide the Device Identifier (Ensure that the Identifier does not have spaces in it).
				// Replace this token with the token of the iOS device that is to receive the notification.
				$tToken = $token_id;
				// Build the Binary Notification.
				$tMsg = chr (0) . chr (0) . chr (32) . pack ('H*', $tToken) . pack ('n', strlen ($tBody)) . $tBody;

				// Send the Notification to the Server.
				$tResult = fwrite ($tSocket, $tMsg, strlen ($tMsg));

				if ($tResult){
					echo 'Delivered Message to APNS' . PHP_EOL;
				}
				else{
					echo 'Could not Deliver Message to APNS' . PHP_EOL;
				}
			}
			// Close the Connection to the Server.
			fclose ($tSocket);*/
 		}
 		redirect($this->data['base_url'] . 'notification');
 	}
}
/* End of file notification.php */
/* Location: ./application/controllers/notification.php */
?>
