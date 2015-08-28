<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	Header Added
	-> Carateamltd
**/
     header('Access-Control-Allow-Origin: *');
     header("Access-Control-Allow-Credentials: true"); 
     header('Access-Control-Allow-Headers: *');
     header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT'); // http://stackoverflow.com/a/7605119/578667
     header('Access-Control-Max-Age: 86400');
     //header('content-type: application/json; charset=utf-8');
		 
class webservice extends MY_Controller 
{
    function __construct()
	{
		parent::__construct();          
		$this -> load -> model('webservice_model', '', TRUE);          
		$this -> load -> helper('url');
	
	    $config = array(
		    'Sandbox' => ($GLOBALS['Configration_value']['TRANSACTION_MODE'] == 'No' ? TRUE : false), //$this->config->item('Sandbox'),
		    // Sandbox / testing mode option.
		    'APIUsername' => $GLOBALS['Configration_value']['PAYPAL_API_USERNAME'],    // PayPal API username of the API caller
		    'APIPassword' => $GLOBALS['Configration_value']['PAYPAL_API_PASSWORD'],    // PayPal API password of the API caller
		    'APISignature' => $GLOBALS['Configration_value']['PAYPAL_API_SIGNATURE'],  // PayPal API signature of the API caller
		    'APISubject' => '',                                     // PayPal API subject (email address of 3rd party user that has granted API permission for your app)
		    'APIVersion' => '98.0'       // API version you'd like to use for your call.  You can set a default version in the class and leave this blank if you want.
        	);
		
	//print_r($config);exit;
        if($config['Sandbox'])
        {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        }
        $this->load->library('paypal/Paypal_pro', $config, $paypal);
        $this->load->library('GoogleCloudPrint');
	/* Remove http:// from base_url */ 		     
        $this->data['base_url'] = str_replace("http://","",$this->data['base_url']);
    }

    /*     
	Created Date: 09-Jan-2014
    */
    function index()
    {
    	/** Function names **/
		switch ($_REQUEST['action']) 
		{
			case 'easyapps_donation_details':
				$this->easyapps_donation_details();
				break;
			case 'easyapps_arrival_details':
				$this->easyapps_arrival_details();
				break;
			case 'easyapps_catalogue_details':
				$this->easyapps_catalogue_details();
				break;
			case 'easyapps_order_history_get':
				$this->easyapps_order_history_get();
				break;
			case 'easyapps_pushnotification_save':
				$this->easyapps_pushnotification_save();
				break;
			case 'easyapps_menuofthe_day':
				$this->easyapps_menuofthe_day();
				break;
			case 'easyapps_loyalty_get_details':
				$this->easyapps_loyalty_get_details();
				break;
			case 'easyapps_total_show_tabs_details':
				$this->easyapps_total_show_tabs_details();
				break;
			case 'easyapps_mailchimp_subscription':
				$this->easyapps_mailchimp_subscription();
				break;
			case 'easyapps_tab_background_image_details':
				$this->easyapps_tab_background_image_details();
				break;
			case 'easyapps_total_show_tabs':
				$this->easyapps_total_show_tabs();
				break;
			case 'easyapps_location_get':
				$this->easyapps_location_get();
				break;
			case 'easyapps_aroundus_get':
				$this->easyapps_aroundus_get();
				break;
			case 'easyapps_reservation_paypal':
				$this->easyapps_reservation_paypal();
				break;
			case 'easyapps_reservation_past_lists':
				$this->easyapps_reservation_past_lists();
				break;
			case 'easyapps_reservation_future_lists':
				$this->easyapps_reservation_future_lists();
				break;
			case 'easyapps_final_reservation':
				$this->easyapps_final_reservation();
				break;
			case 'easyapps_reservation_service_location':
				$this->easyapps_reservation_service_location();
				break;
			case 'easyapps_reservation_location':
				$this->easyapps_reservation_location();
				break;
			case 'easyapps_appereance_details':
				$this->easyapps_appereance_details();
				break;
			case 'easyapps_voicerecording_details':
				$this->easyapps_voicerecording_details();
				break;
			case 'easyapps_paypal_details':
				$this->easyapps_paypal_details();
				break;
			case 'easyapp_news_details':
				$this->easyapp_news_details();
				break;
			case 'easyapps_item_get':
				$this->easyapps_item_get();
				break;
			case 'easyapp_menu_category':
				$this->easyapp_menu_category();
				break;
			case 'easyapps_loyalty_bgimg':
				$this->easyapps_loyalty_bgimg();
				break;
			case 'easyapps_gallery_get':
				$this->easyapps_gallery_get();
				break;
			case 'easyapps_youtube_get':
				$this->easyapps_youtube_get();
				break;
			case 'easyapps_home_get':
				$this->easyapps_home_get();
				break;
			case 'easyapps_Qrcode_get':
				$this->easyapps_Qrcode_get();
				break;
			case 'easyapps_RSS_get':
				$this->easyapps_RSS_get();
				break;
			case 'easyapps_RSS_get':
				$this->easyapps_RSS_get();
				break;
			case 'easyapps_event_get':
				$this->easyapps_event_get();
				break;
			case 'easyapps_custom_get':
				$this->easyapps_custom_get();
				break;
			case 'easyapps_pdf_get':
				$this->easyapps_pdf_get();
				break;
			case 'easyapps_socialmedia_get':
				$this->easyapps_socialmedia_get();
				break;
			case 'easyapps_website_get':
				$this->easyapps_website_get();
				break;
			case 'get_loyalty_user_detail':
				$this->get_loyalty_user_detail();
				break;
			case 'book_service_confirm':
				$this->book_service_confirm();
				break;
		/**/	case 'send_order_receipt':
				$this->send_order_receipt_details();
				break;
		/**/	case 'google_cloud_printer':
				$this->google_cloud_printer_upload();
				break;
			case 'get_count_loyalty':
				$this->get_count_loyalty();
				break;
			case 'save_credit_card':
				$this->save_credit_card_details();
				break;
			case 'getqrcodeDetail':
				$this->getqrcodeDetail();
				break;
			case 'get_current_day_time':
				$this->get_current_day_time();
				break;
			case 'get_reservation_services':
				$this->get_reservation_services();
				break;
			case 'delete_coupons':
				$this->delete_coupons_code();
				break;
			case 'save_coupons':
				$this->save_coupons_code();
				break;
			case 'delete_order':
				$this->delete_order_detail();
				break;
			case 'get_order_detail':
				$this->get_order_detail();
				break;
			case 'save_quantity_session':
				$this->save_quantity_session();
				break;
			case 'save_order':
				//$this->save_order();
				$this->save_order_Detail();
				break;
			case 'getitemDetail':
				$this->getitemDetail();
				break;
			case 'save_contactus':
				$this->save_contactus_Detail();
				break;
			case 'sendAttechEmail':
				$this->sendAttechEmail();
				break;
			case 'getEventDetail':
				$this->getEventDetail();
				break;
			case 'save_share':
				$this->save_share();
				break;
			case 'paypalintigration':
				$this->paypalintigration();
				break;
			case 'save_payment_detail':
				$this->save_payment_detail();
				break;
			case 'save_payment':
				$this->save_payment();
				break;
			case 'getlogindetail':
				$this->getlogindetail();
				break;
			case 'save_mail':
				$this->save_mail();
				break;
			case 'easyapps_quotation_details':
				$this->easyapps_quotation_details();
				break;
			case 'easyapps_appoitment_details':
				$this->easyapps_appoitment_details();
				break;
			case 'easyapps_testonomial_details':
				$this->easyapps_testonomial_details();
				break;
			case 'easyapps_review_add':
				$this->easyapps_review_add();
				break;
			case 'easyapps_testomonial_add':
				$this->easyapps_testomonial_add();
				break;
			case 'easyapps_appointment_details':
				$this->easyapps_appointment_details();
				break;
			case 'easyapps_ticket_details':
				$this->easyapps_ticket_details();
				break;
			case 'easyapps_ecommerce_search':
				$this->easyapps_ecommerce_search();
				break;
			case 'easyapps_ecommerse_paypal_payment':
				$this->easyapps_ecommerse_paypal_payment();
				break;
			case 'easyapps_item_sizeopt_details':
				$this->easyapps_item_sizeopt_details();
				break;
			case 'easyapps_service_details':
				$this->easyapps_service_details();
				break;
			case 'easyapps_blog_details':
				$this->easyapps_blog_details();
				break;
			case 'tousles_easyapps_bridge':
	            $this->tousles_easyapps_bridge();
	            break;
	        case 'easyapps_catalogue_order_details':
	        	$this->easyapps_catalogue_order_details(); 
	        	break;   
	        case 'easyapps_save_catalogue_order_details':
	        	$this->easyapps_save_catalogue_order_details();
	        	break;
	        case 'easyapps_catalogue_category':
	        	$this->easyapps_catalogue_category();
	        	break;
	        case 'easyapps_catalogue_product':
	        	$this->easyapps_catalogue_product();
	        	break;	
	        case 'easyapps_catalogue_customer_details':
	        	$this->easyapps_catalogue_customer_details();
	        	break;	
	        case 'easyapps_catalogue_paypal_details':
	        	$this->easyapps_catalogue_paypal_details();
	        	break;	
	        case 'easyapps_order_customer_details':
	        	$this->easyapps_order_customer_details();
	        	break;
	        case 'easyapps_new_order_details':
	        	$this->easyapps_new_order_details();
	        	break;	
	        case 'easyapps_order_paypal_details':
	        	$this->easyapps_order_paypal_details();
	        	break;
	        case 'easyapps_get_clients_paypal_info':
	        	$this->easyapps_get_clients_paypal_info();
	        	break;
	        case 'easyapps_get_clients_currency':
	        	$this->easyapps_get_clients_currency();
	        	break;
	        case 'get_app_tab_id':
	        	$this->get_app_tab_id();
	        	break;
	        case 'easyapps_get_contact_bg':
	        	$this->easyapps_get_contact_bg();
	        	break;
		    default:
				break;
		}
    }


	function sendAttechEmail()
	{   
		echo "<pre>";
		print_r($_REQUEST);exit;
		//($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {

		$file = $path.$filename;
		$file_size = filesize($file);
		$handle = fopen($file, "r");
		$content = fread($handle, $file_size);
		fclose($handle);
		$content = chunk_split(base64_encode($content));
		$uid = md5(uniqid(time()));
		$name = basename($file);
		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		$header .= "Reply-To: ".$replyto."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		$header .= "This is a multi-part message in MIME format.\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$header .= $message."\r\n\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 	// use different content types here
		$header .= "Content-Transfer-Encoding: base64\r\n";
		$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
		$header .= $content."\r\n\r\n";
		$header .= "--".$uid."--";
		if (mail($mailto, $subject, "", $header)) {
		    echo "mail send ... OK"; // or use booleans here
		} else {
		    echo "mail send ... ERROR!";
		}
	    }
    
	function save_contactus_Detail()
	{
		$lang= 'rFrench';	// Language temporary to french
		
		$Data['vName'] = $this->input->get('vName');
		$Data['vEmail'] = $this->input->get('vEmail');
		$Data['vContactNumber'] = $this->input->get('vContactNumber');
		$Data['tMessage'] = $this->input->get('tMessage');
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
      
		$iContactUsId = $this->webservice_model->save_contactus($Data);
		
		//-- Email Data
			$appDetails = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);
			$appOwnerEmail = $appDetails['vEmail'];
				
			$applicationName 			= $appDetails['tAppName'];
				
			$html = '';
			if($lang=='rFrench')
			{
				$html .= '<p><strong>Nom de l\'application: </strong>'.$applicationName.'</p>';
				$html .= '<p><strong>Détail de l\'utilisateur: </strong><br />';
				$html .= '<table>';
				$html .= '<tr><td>Nom: </td><td>'.$Data['vName'].'</td></tr>';
				$html .= '<tr><td>Email: </td><td>'.$Data['vEmail'].'</td></tr>';
				$html .= '<tr><td>Numéro de tel: </td><td>'.$Data['vContactNumber'].'</td></tr>';
				$html .= '</table>';
				$html .= '<p><strong>Message: </strong>'.$Data['tMessage'].'</p>';
    			$html .= '<p><strong>Merci</strong></p>';
			}
			else
			{
				$html .= '<p><strong>Application Name: </strong>'.$applicationName.'</p>';
				$html .= '<p><strong>User Details: </strong><br />';
				$html .= '<table>';
				$html .= '<tr><td>Name: </td><td>'.$Data['vName'].'</td></tr>';
				$html .= '<tr><td>Email: </td><td>'.$Data['vEmail'].'</td></tr>';
				$html .= '<tr><td>Phone Number: </td><td>'.$Data['vContactNumber'].'</td></tr>';
				$html .= '</table>';
				$html .= '<p><strong>Message: </strong>'.$Data['tMessage'].'</p>';
    			$html .= '<p><strong>Thank You</strong></p>';
    		}
		   
		if($iContactUsId){
		  //$sendcontactus = $this->send_contactus_details($Data['vName'],$Data['vEmail'],$Data['vContactNumber'],$Data['tMessage'],$Data['iApplicationId']);	
		  $sendToCustomer = $this->send_contactus_details("Customer",$appOwnerEmail,$Data['vEmail'],$html,$applicationName,$lang);
		  $sendToAppOwner = $this->send_contactus_details("AppOwner",$Data['vEmail'],$appOwnerEmail,$html,$applicationName,$lang);
		  $msg['status'] = "Success";
		  $msg['mailToCustomer'] = $sendToCustomer;
		  $msg['mailToAppOwner'] = $sendToAppOwner;
		}else{
		  $msg['status'] = "Fail";
		}
	   
	    /** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		$callback = '';
		if (isset($_REQUEST['callback']))
		{
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		
		$main = json_encode($msg);
		echo $callback . $main;
		exit;	
        }

        function send_contactus_details($type,$fromEmail,$toEmail,$message,$applicationName,$lang)
        {
	        $this->load->model('admin_model', '', TRUE);
			$ci = get_instance();
			$ci->load->library('email');
			//$config['protocol'] = "smtp";
			//$config['smtp_host'] = "ssl://smtp.gmail.com";
			//$config['smtp_port'] = "465";//"25";
			//$config['smtp_user'] = "rohit.sharma@aplitetech.com";
			//$config['smtp_pass'] = "easyapps1@French";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";

			

			//-- Send Email to Customer/AppOwner
				$ci->email->initialize($config);
				$ci->email->from($fromEmail, "Contact Us Form - ".$applicationName." - EasyApps");
				$ci->email->to($toEmail);
				$this->email->reply_to($fromEmail, $applicationName);
				$ci->email->subject('Contact Us Form');
				if($type=="Customer")
				{
					if($lang=='rFrench')
					{
						$html = "<p>Bonjour</p><p>Merci pour votre message. Nos services reprendrons contact avec vous dans le plus bref délai.</p>".$message;
					}
					else
					{
						$html = "<p>Hello</p><p>Thank you for contacting us, we will get back to you soon. Your details are:</p>".$message;
					}
				}
				else
				{
					if($lang=='rFrench')
					{
						$html = "<p>Bonjour</p><p>Un client a essayé de vous contacter via votre application. Les détails du client sont:</p>".$message;
					}
					else
					{
						$html = "<p>Hello</p><p>A customer tried to contact you via your application. Customer details are:</p>".$message;
					}
				}
				$ci->email->message($html);
				$result = $ci->email->send();
			
			return $result;
        }
    
    function save_mail()
    {
        /*echo "<script>alert('savemail');</script>";exit;*/
        /*echo json_encode($h);exit;*/
        
		$Data['vMailName'] = $this->input->get('vMailName');
        $Data['vEmail'] = $this->input->get('vEmail');
        $Data['iApplicationId'] = $this->input->get('iApplicationId');
        $Data['iCategoryId'] = $this->input->get('iCategoryId');

        if($this->input->get('iApplicationId')){
            $data = $this->webservice_model->checkNewsLetter($Data['vEmail'], $Data['iApplicationId']);
            if($data){
                $result = 'Exist';
            }else{
                //$iNewsLetterId = $this->webservice_model->save_newsletter($Data);
                $iAppTabId = $this->input->get('iAppTabId');
                $iApplicationId = $this->input->get('iApplicationId');
                $vEmail = $this->input->get('vEmail');
                $status = $this->add_list_mailchimp($iApplicationId, $iAppTabId, $vEmail);
                if($iNewsLetterId)
                    $result = 'Success';
                else{
                    $result = 'Error';
                }
            }
        }else{
            $result = 'Error';
        }
    }
    
    function add_list_mailchimp($iApplicationId, $iAppTabId, $email) {
        $mailchimp_info = $this->webservice_model->get_apikey_mailchimp($iApplicationId, $iAppTabId);
        $apikey = $mailchimp_info['vApikey'];
        $listid = $mailchimp_info['vListid'];
       /* echo "<pre>".$iAppTabId."=".$iApplicationId."=".$apikey."=".$email."=".$listid;exit;*/
        $this->send_list_mailchimp($apikey,$email,$listid);
    }

    function send_list_mailchimp($apikey,$email,$listid)
    {
        $config = array(
            'apikey' => $apikey, // Insert your api key
            'secure' => FALSE // Optional (defaults to FALSE)
        );
        
        ini_set('display_errors',1);
        include('Mailchimp.php');
        $MailChimp = new MailChimp($apikey);
        $result = $MailChimp->call('lists/subscribe', array(
                        'id'                => $listid,
                        'email'             => array( 'email' => $email ),
                        'merge_vars'        => array( 'FNAME' => 'MailingList', 'LNAME' => 'Test', 'COMPANY' => 'Carateamltd Hub', 'STATE' => 'Gujarat'),
                        'double_optin'      => false,
                        'update_existing'   => true,
                        'replace_interests' => false,
                        'send_welcome'      => true
                    ));
        return "Success";
    }
    
    /*
	add_list_mailchimp()
    	Purpose: to get login details
    */    
    function getlogindetail()
    {
        if(isset($_REQUEST['email']) && $_REQUEST['email'] != ' ')
        $vEmail = $_REQUEST['email'];   
        
        if(isset($_REQUEST['password']) && $_REQUEST['password'] != ' ')
        $vPassword = $this->encrypt($_REQUEST['password']);     
        $data = $this->webservice_model->checkUserlogin($vEmail,$vPassword);
        
        if($data){
            $data[0]['msg'] = "success";
        }else $data[0]['msg'] = "Error";
        header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($data);
        echo $callback . '('.$main.');';
        exit;
    }

    function pageNotFound(){
        echo "Page Not Found";exit;    
    }
     
    function previewapp()
    {
        $folderurl = $this->config->item('base_download_url');
        $appcode  = $_REQUEST['appcode'];
        $appData = $this->webservice_model->getApplicationData($appcode);
        $iApplicationId = $appData['iApplicationId'];
        header("Location:".$folderurl."www-".$iApplicationId."");
        exit;
    }
    
    function encrypt($data){
        for($i = 0, $key = 27, $c = 48; $i <= 255; $i++){
            $c = 255 & ($key ^ ($c << 1));
            $table[$key] = $c;
            $key = 255 & ($key + 1);
        }
        $len = strlen($data);
        for($i = 0; $i < $len; $i++){
            $data[$i] = chr($table[ord($data[$i])]);
        }
        return base64_encode($data);
    }
       
    function decrypt($data){
        $data = base64_decode($data);
        for($i = 0, $key = 27, $c = 48; $i <= 255; $i++){
            $c = 255 & ($key ^ ($c << 1));
            $table[$c] = $key;
            $key = 255 & ($key + 1);
        }
        $len = strlen($data);
        for($i = 0; $i < $len; $i++){
            $data[$i] = chr($table[ord($data[$i])]);
        }       
        return $data;
    }

    function save_payment()
    {        
        if($this->input->get())
        {
            $data['vFirstName'] = $this->input->get('vFirstName');
            $data['vLastName'] = $this->input->get('vLastName');
            $data['vEmail'] = $this->input->get('vEmail');
            $data['vCardholdername'] = $this->input->get('vHolderName');
            $data['vCreditCardType'] = $this->input->get('vCreditCardType');
            $data['vCreditCardNumber'] = $this->input->get('vCreditCardNumber');
            $data['vCreditCardType'] = $this->input->get('vCreditCardType');
            $data['vMonth'] = $this->input->get('vMonth');
            $data['vYear'] = $this->input->get('vYear');
            $data['vCvv'] = $this->input->get('vCvv');
            $data['iClientId'] = $this->input->get('iClientId');
            $data['iApplicationId'] = $this->input->get('iApplicationId');
            $data['iAppTabId'] = $this->input->get('iAppTabId');
            $data['fTotalPrice'] = $this->input->get('fTotalPrice');
            $data['dPaymentDate'] = date("Y-m-d h:i:s");

            $iFeePaymentId = $this->webservice_model->save_fee_payment_value($data);  
            $iClientId = $this->input->get('iClientId');
            $data['ePaymentType'] = 'Paypal';
            $client_details = $this->webservice_model->get_client_details($iClientId);
            $result = $this->Do_direct_payment_demo($data,$client_details);
            // echo "<pre>";
            // print_r($result);exit;
            if($iFeePaymentId)
            {
                if($result['PayPalResult']['ACK'] == 'Success')
                    $DataUpdate['eStatus'] = 'Completed';
                else if($result['PayPalResult']['ACK'] == 'Failure')
                    $DataUpdate['eStatus'] = 'Failed';
                else 
                    $DataUpdate['eStatus'] = 'In progress';
                
                $updateid = $this->webservice_model->update_fee_payment_value($DataUpdate, $iFeePaymentId);  

                $Data[0]['msg'] = "Success";
                $Data[0]['iFeePaymentId'] = $iFeePaymentId;
            }else $Data[0]['msg'] = "Error";
        }else{
            $Data[0]['msg'] = "Error";
        }
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($Data);
        echo $callback . '('.$main.');';
        exit;
    }

    function Do_direct_payment_demo($payment_details, $client_details) {
        
        $DPFields = array(
            'paymentaction' => 'Sale',                                          // How you want to obtain payment.  Authorization indidicates the payment is a basic auth subject to settlement with Auth & Capture.  Sale indicates that this is a final sale for which you are requesting payment.  Default is Sale.
            'ipaddress' => $_SERVER['REMOTE_ADDR'],                             // Required.  IP address of the payer's browser.
            'returnfmfdetails' => '1'                                           // Flag to determine whether you want the results returned by FMF.  1 or 0.  Default is 0.
        );

        $CCDetails = array(
            'creditcardtype' => $payment_details['vCreditCardType'],                    // Required. Type of credit card.  Visa, MasterCard, Discover, Amex, Maestro, Solo.  If Maestro or Solo, the currency code must be GBP.  In addition, either start date or issue number must be specified.
            'acct' => $payment_details['vCreditCardNumber'],                                  // Required.  Credit card number.  No spaces or punctuation.  
            'expdate' => $payment_details['vMonth'].$payment_details['vYear'],          // Required.  Credit card expiration date.  Format is MMYYYY
            'cvv2' => $payment_details['vCvv'],                                         // Requirements determined by your PayPal account settings.  Security digits for credit card.
            'startdate' => '',                                                          // Month and year that Maestro or Solo card was issued.  MMYYYY
            'issuenumber' => ''                                                         // Issue number of Maestro or Solo card.  Two numeric digits max.
        );
        
        
        $PayerInfo = array(
            'email' => $client_details['vEmail'],                                   // Email address of payer.
            'payerid' => '',                                                        // Unique PayPal customer ID for payer.
            'payerstatus' => '',                                                    // status of payer.  Values are verified or unverified
            'business' => ''                                                        // Payer's business name.
        );
                    
        $PayerName = array(
            'salutation' => 'Mr.',                                                  // Payer's salutation.  20 char max.
            'firstname' => $client_details['vFirstName'],                           // Payer's first name.  25 char max.
            'middlename' => '',                                                     // Payer's middle name.  25 char max.
            'lastname' => $client_details['vLastName'],                             // Payer's last name.  25 char max.
            'suffix' => '',                                                         // Payer's suffix.  12 char max.
        );

        $PaymentDetails = array(
            'amt' => $payment_details['fTotalPrice'],                             // Required.  Total amount of order, including shipping, handling, and tax.  
            'currencycode' => 'GBP',                                              // Required.  Three-letter currency code.  Default is USD.
            'itemamt' => $payment_details['fTotalPrice'],                         // Required if you include itemized cart details. (L_AMTn, etc.)  Subtotal of items not including S&H, or tax.
                                                                                  // URL for receiving Instant Payment Notifications.  This overrides what your profile is set to use.
        );    
            
        $OrderItems = array();
        $Item     = array(
                'l_name' => 'Publish Application',                          // Item Name.  127 char max.
                'l_desc' => 'Application published',                        // Item description.  127 char max.
                'l_amt' => $payment_details['fTotalPrice'],                      // Cost of individual item.
                'l_number' => '123',                                        // Item Number.  127 char max.
                'l_qty' => '1',                                             // Item quantity.  Must be any positive integer.  
                'l_taxamt' => '',                                           // Item's sales tax amount.
                'l_ebayitemnumber' => '',                                   // eBay auction number of item.
                'l_ebayitemauctiontxnid' => '',                             // eBay transaction ID of purchased item.
                'l_ebayitemorderid' => '',                                  // eBay order ID for the item.
        );
        array_push($OrderItems, $Item);
    
        $Secure3D = array(
            'authstatus3d' => '', 
            'mpivendor3ds' => '', 
            'cavv' => '', 
            'eci3ds' => '', 
            'xid' => ''
        );
                      
        $PayPalRequestData = array(
            'DPFields' => $DPFields, 
            'CCDetails' => $CCDetails, 
            'PayerInfo' => $PayerInfo, 
            'PayerName' => $PayerName, 
            //'BillingAddress' => $BillingAddress, 
            //'ShippingAddress' => $ShippingAddress, 
            'PaymentDetails' => $PaymentDetails, 
            'OrderItems' => $OrderItems, 
            'Secure3D' => $Secure3D
        );
        //echo '<pre>';print_r($PayPalRequestData);exit;             
        $PayPalResult = $this->paypal_pro->DoDirectPayment($PayPalRequestData);
        //echo '<pre>';print_r($PayPalResult);exit;
        if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK']))
        {
            //$result = array('Errors'=>$PayPalResult['ERRORS']);
            $result = array('PayPalResult'=>$PayPalResult);
        }
        else
        {
            // Successful call.  Load view or whatever you need to do here.
            $result = array('PayPalResult'=>$PayPalResult);
            //$this->load->view('do_direct_payment_demo',$data);
        }
        return $result;
    }

    function save_payment_detail(){
        if($this->input->get()){
            $data['iFeePaymentId'] = $this->input->get('iFeePaymentId');
            $data['vFeetype'] = $this->input->get('vFeetype');
            $data['fPrice'] = $this->input->get('fPrice');
            $iPaymentDetailsId = $this->webservice_model->save_fee_payment_detail($data);            
            if($iPaymentDetailsId){
                $Data[0]['msg'] = "Success";
                $Data[0]['iPaymentDetailsId'] = $iPaymentDetailsId;
            }else $Data[0]['msg'] = "Error";
        }else{
            $Data[0]['msg'] = "Error";
        }
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($Data);
        echo $callback . '('.$main.');';
        exit;
    }

    function save_share(){
        if($this->input->get()){
            $data['vPostText'] = $this->input->get('vPostText');
            $data['eCoomingFrom'] = $this->input->get('eCoomingFrom');

            $iShareIdiShareId = $this->webservice_model->save_post_detail($data);            
            if($iShareId){
                $Data[0]['msg'] = "Success";
                $Data[0]['iShareId'] = $iShareId;
            }else $Data[0]['msg'] = "Error";
        }else{
            $Data[0]['msg'] = "Error";
        }
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($Data);
        echo $callback . '('.$main.');';
        exit;
    }
    
    function getEventDetail()
    {
        if($this->input->get('iEventId')){
            $Data = $this->webservice_model->getEvent_detail($this->input->get('iEventId'));
            if(!$Data['vImage']){
                $Data['vImage'] = $this->data['base_image']."noimg.png";
            }else{
                $Data['vImage'] = $this->data['base_upload']."events/".$eventsval['iEventId']."/".$eventsval['vImage'];
            }
            
            if($Data['vHeaderImage'] !=''){
                $file = $this->data['base_upload']."events/headerimg/".$Data['iEventId']."/".$Data['vHeaderImage'];
                
                $file_headers = @get_headers($file);
                
                if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    $exists = "false";
                } else {
                    $exists = "true";
                }
                
                if($exists == 'true'){
                    $Data['vHeaderImage'] = $this->data['base_upload']."events/headerimg/".$Data['iEventId']."/".$Data['vHeaderImage'];    
                }else{
                    $Data['vHeaderImage'] = '';
                }
            }
        }else{
            $Data[0]['msg'] = "Error";
        }
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($Data);
        echo $callback . '('.$main.');';
        exit;
    }
    
     function getitemDetail()
     {
	 	  if($this->input->get('iMenuID')){
            $item_detail = $this->webservice_model->getitem_detail($this->input->get('iMenuID'));
            if(count($item_detail) > 0)
            {
                $Data['item_detail'] = $item_detail;
                $Data['Message'] = 'Successful';
                $Data['status'] = 'success';
            }
            else
            {
                $Data['Message'] = 'No Record Found.';
                $Data['status'] = 'Fail';
            }

        }
        else
        {
            $Data['Message'] = 'No Record Found.';
            $Data['status'] = 'Fail';
        }
        
	    header('Content-type: application/json');
	    header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
    }
    
    function save_quantity_session()
    {
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
        $Data['iAppTabId'] = $this->input->get('iAppTabId');
        $Data['iMenuId'] = $this->input->get('iMenuID');
        $Data['iItemId'] = $this->input->get('iItemId');    
        $Data['vQuantity'] = $this->input->get('vQuantity');
        $Data['fPrice'] = $this->input->get('fPrice');
		$Data['vInstruction'] = $this->input->get('vInstruction');
        $Data['fTotalPrice'] = $Data['fPrice'] * $Data['vQuantity'];
        $Data['iUserId'] = $this->input->get('iUserId');

        /**Check order Details**/
        $OrdercartID = $this->webservice_model->check_order_details($Data);
      
        if(count($OrdercartID) == 0)
        {
            $Ordercartdetails = $this->webservice_model->save_cart_order_details($Data); 
        }
        else
        {
            $Ordercartdetails = $this->webservice_model->update_ordercart_details($Data);
        }
		
        /** save quantity session **/
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
		if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
		
		/** ordercart **/
        if($Ordercartdetails){
			$Data1['Message'] = 'Successful Insert Record.';
            $Data1['status'] = 'success';
		    $main = json_encode($Data1);
        	echo $callback . $main;
        }
    }
    
    /**
        Descript : Order details form record
    **/
    function save_order_Detail()
    {
        /** save order details **/
        $Data['iUserId'] = $this->input->get('iUserId');
        $Data['iApplicationId'] = $this->input->get('iApplicationId');
        $Data['iAppTabId'] = $this->input->get('iAppTabId');
        $Data['vName'] = $this->input->get('vName');
        $Data['tAddress'] = $this->input->get('tAddress');
        $Data['vPhone'] = $this->input->get('vPhone');
        $Data['tEmail'] = $this->input->get('tEmail');
        $Data['vArea'] = $this->input->get('vArea');
        $Data['vPincode'] = $this->input->get('vPincode');
        
		/** save order **/
        	$Orderdetails = $this->webservice_model->save_order_details($Data);
        
		/** Order details **/
		if($Orderdetails){
			/** CustomerId **/
			$this->webservice_model->update_order_details_customerid($Orderdetails,$Data['iUserId']);
			
			/** order details **/
			//	$myorder = $this->webservice_model->get_order_history_payment_details($Data['iUserId'])

			/** order **/
			$this->send_order_mail_details($Data['tEmail'],$Orderdetails);
			
			/** order admin **/
			$this->send_order_mail_admin_details($Data['tEmail'],$Orderdetails);
		}
	
		/** orderdetails **/
        if($Orderdetails){
            $Data1['Orderdetails'] = $Orderdetails;
            $Data1['iAppTabId'] = $this->input->get('iAppTabId');
            $Data1['iApplicationId'] = $this->input->get('iApplicationId');
            $Data1['iUserId'] = $this->input->get('iUserId');
            $myData['data'] = $Data1;
            $myData['Message'] = 'Successful Insert Record.';
            $myData['status'] = 'Success';
        }else{
            $myData['Message'] = 'Record Not Found.';
            $myData['status'] = 'Fail';
        }
        
        /** Header details **/
          header('Content-type: application/json');
          header('Access-Control-Allow-Origin: *');
		  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		  
		  /** callback **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($myData);
        echo $callback . $main;
    }  
	
	function send_order_mail_admin_details($tEmail,$iOrderId)
	{
	 	$this->load->library('email');
		$this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_user' => 'carateamltd@gmail.com',
		  'smtp_pass' => 'nopass',
		  'smtp_port' => 465,
		  'mailtype'  => 'html', 
		  'charset'   => 'iso-8859-1',
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		
        $this->email->from('', 'Carateamltd');
        $this->email->to('carateamltd@gmail.com.com'); 
        $this->email->subject('eRestaurant Order Details');
        $this->email->message('Order has been placed'); 
        $this->email->send();
        $email = $this->email->print_debugger();    
        
		/** email **/
        if(isset($email))
		{
            return true;
        }else{
            return false;
        }	
	}  
    
    
    /* send order mail details */
    function send_order_mail_details($tEmail,$iOrderId)
    {
        $this->load->library('email');
		$this->email->initialize(array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_user' => 'carateamltd@gmail.com',
		  'smtp_pass' => 'nopass',
		  'smtp_port' => 465,
		  'mailtype'  => 'html', 
		  'charset'   => 'iso-8859-1',
		  'crlf' => "\r\n",
		  'newline' => "\r\n"
		));
		
        $this->email->from('carateamltd@gmail.com', 'Carateamltd');
        $this->email->to($tEmail); 
        $this->email->subject('eRestaurant Order Details');
        $this->email->message('Your Order will be fetched withing 30 minutes'); 
        $this->email->send();
        $email = $this->email->print_debugger();    
        
		/** email **/
        if(isset($email))
		{
            return true;
        }else{
            return false;
        }
    }
	
	
    /**
        get order details
    **/
    function get_order_detail()
    {
		$data['iUserId'] = $this->input->get('iUserId'); 
		$data['iApplicationId'] = $this->input->get('iApplicationId');
		if($data['iUserId'])
		{
			/** order details */
             $order_detail = $this->webservice_model->getorder_detail($data['iUserId'],$data['iApplicationId']);
             $vCurrency = $this->webservice_model->get_currency_for_order_details($data['iApplicationId']);
			 
             if($vCurrency['vCurrency'] == 'EUR'){
             	$vCur = '&euro;';
             }else if($vCurrency['vCurrency'] == 'USD'){
             	$vCur = '$';
             }else{
             	$vCur = $vCurrency['vCurrency'];
             }

             $order_details_view = array();
			 foreach($order_detail as $val){
			 	$order_details_view[] = array(
			 			'iOrderId' => $val['iOrderId'],
			 			'iUserId' => $val['iUserId'],
			 			'iApplicationId' => $val['iApplicationId'],
			 			'iAppTabId' => $val['iAppTabId'],
			 			'iMenuId' => $val['iMenuId'],
			 			'iCustOrderId' => $val['iCustOrderId'],
			 			'iItemId' => $val['iItemId'],
			 			'vQuantity' => $val['vQuantity'],
			 			'fPrice' => number_format($val['fPrice'],2,'.',''),
			 			'vInstruction' => $val['vInstruction'],
			 			'fTotalPrice' => $val['fTotalPrice'],
			 			'vName' => $val['vName'],
			 			'vImage' => $val['vImage'],
			 			'vStatus' => $val['vStatus'],
			 			'vItemName' => $val['vItemName'],
			 			'tDescription' => $val['tDescription'],
			 			'eStatus' => $val['eStatus'],
			 			'vDayMenu' => $val['vDayMenu'],
			 			'Total' => number_format($val['Total'],2,'.',''),
			 			'vCurrency' =>$vCur
			 		);
			 }

		  	 if(count($order_detail) > 0)
             {
                $Data['order_detail'] = $order_details_view;
                $Data['Message'] = 'Successful';
                $Data['status'] = 'success';
             }
             else
             {
                $Data['order_detail'] = '';
                $Data['Message'] = 'No Record Found.';
                $Data['status'] = 'Fail';
             }
        }
        else
        {
            $Data['order_detail'] = '';
            $Data['Message'] = 'No Record Found.';
            $Data['status'] = 'Fail';
        }
        
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
    }
    
    /** delete order details **/
    function delete_order_detail()
    {
        $Data['iOrderId'] = $this->input->get('iOrderId');
        
        /** Delete order **/
        $deleteorder = $this->webservice_model->delete_order_details($Data);
		
        /** get details of order list **/
        if($this->input->get('iUserId')){
            $order_detail = $this->webservice_model->getorder_detail($this->input->get('iUserId'),$this->input->get('iApplicationId'),$this->input->get('iAppTabId'));
             if(count($order_detail) > 0)
             {
                $Data['order_detail'] = $order_detail;
                $Data['Message'] = 'Successful';
                $Data['status'] = 'success';
             }
             else
             {
                $Data['order_detail'] = '';
                $Data['Message'] = 'No Record Found.';
                $Data['status'] = 'Fail';
             }
        }
        else
        {
            $Data['order_detail'] = '';
            $Data['Message'] = 'No Record Found.';
            $Data['status'] = 'Fail';
        }
        
		/** application json **/
        header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
    }
    
    // Description :- Get Loyalty Count
    // save coupons code
    function save_coupons_code()
    {
        $Data['iLoyaltyId'] = $this->input->get('iLoyaltyId');
        $Data['vSecretCode'] = $this->input->get('iSecretCode');
    	
        /** Loyalty details **/
        if($this->input->get('iLoyaltyId')){
            $loyalty_details = $this->webservice_model->getloyalty_detail($Data);
            
        }else{
            $data[0]['msg'] = "Error";
        }
        if($loyalty_details[0]['vSecretCode'] != $Data['vSecretCode']){
            $MyData['Message'] = 'No Record Found.';
            $MyData['status'] = 'Fail';
        }else{
                /** Loaylty User details add **/
                $Mydata['iLoyaltyId'] = $this->input->get('iLoyaltyId');
                $Mydata['iApplicationId'] = $this->input->get('applicationid');
                $Mydata['iAppTabId'] = $this->input->get('tabid');
                $Mydata['iUserId'] = '1';

                $loyalty_count = $this->webservice_model->get_count_loyalty($Data['iLoyaltyId'],$Mydata['iUserId']);
              
                $totalCount =$loyalty_details[0]['vSquareCount'] - $loyalty_count;
                if($totalCount > 0)
                {
                    /** Loyalty Details Page **/
                    if(count($loyalty_details) >0){
                        $insert = $this->webservice_model->insert_loyalty_details($Mydata);
                    }else{
                        $MyData['Message'] = 'No Record Found.';
                        $MyData['status'] = 'Fail';
                    }
                    $iLoyaltyId = $this->input->get('iLoyaltyId');
                    if($Mydata){
                        $count = $this->webservice_model->get_count_loyalty($Mydata['iLoyaltyId'],$Mydata['iUserId']);
                        $totalCount =$loyalty_details[0]['vSquareCount'] - $count;
                        // print_r($totalCount);exit;
                        $Mydata['vRewardText'] = $loyalty_details[0]['vRewardText'];
                        $Mydata['LoyaltyUse'] = $count;
                        $Mydata['remain_loyalty'] = $totalCount;
                        $Mydata['vSquareCount'] = $loyalty_details[0]['vSquareCount'];
                        $MyData['Message'] = 'Successful';
                        $MyData['status'] = 'success';
                    }
                }
                else
                {   $MyData['data'] = '';
                    $MyData['Message'] = 'No more use this loyalty.';
                    $MyData['status'] = 'Fail';
                }
                
                
        }
		
        $MyData['data'] = $Mydata;

        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($MyData);
        echo $callback . $main;
        exit;
    }
    
    function delete_coupons_code()
    {
        $Data['iLoyaltyId'] = $this->input->get('iLoyaltyId');
        
        /** Delete order **/
        $deleteloyalty = $this->webservice_model->delete_loyalty_details($Data);
        /** get details of order list **/
        if($this->input->get('iLoyaltyId')){
            $Data = $this->webservice_model->getloyalty_detail($this->input->get('iLoyaltyId'));
        }else{
            $Data[0]['msg'] = "Error";
        }
        
        header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($Data);
        echo $callback . '('.$main.');';
        exit;
    }
    /**
        End
    **/
    
    /*
        Description : Reservation
    */
    function get_reservation_location()
    {
        $data = $this->input->get();
        $appid = $_REQUEST['iApplicationId'];
        //echo $appid; exit;
        //echo $data['iApplicationId']; exit;
        $new_data = $this->webservice_model->get_reservation_location($data['iApplicationId']);
		
	    //$new_data = $this->webservice_model->get_reservation_location($appid);
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        foreach($new_data as $key => $val){
            $new_data2[$key]['iLocationId']=$val['iLocationId'];
            $new_data2[$key]['iApplicationId']=$val['iApplicationId'];
            $new_data2[$key]['iTabId']=$val['iTabId'];
            $new_data2[$key]['vAddress1']=$val['vAddress1'];
            $new_data2[$key]['vAddress2']=$val['vAddress2'];
            $new_data2[$key]['vCity']=$val['vCity'];
            $new_data2[$key]['vEmail']=$val['vEmail'];
            $new_data2[$key]['vLatitude']=$val['vLatitude'];
            $new_data2[$key]['vLongitude']=$val['vLongitude'];
            $new_data2[$key]['vState']=$val['vState'];
            $new_data2[$key]['vTelephone']=$val['vTelephone'];
            $new_data2[$key]['vWebsite']=$val['vWebsite'];
            $new_data2[$key]['vZip']=$val['vZip'];
        }
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($new_data2);
        echo $callback . '('.$main.');';
        exit;
    }
    
    function get_reservation_services()
    {
        $data = $this->input->get();
        $appid = $_REQUEST['iApplicationId'];
        
		//echo $appid; exit;
        //echo $data['iApplicationId']; exit;
        //$new_data = $this->webservice_model->get_reservation_location($data['iApplicationId']);
        
		$new_data = $this->webservice_model->get_reservation_services($data['iApplicationId']);
        $location_data = $this->webservice_model->get_location_by_id($data['iLocationId']);
	    $count=0;
        foreach($new_data as $key => $val){
            $new_data2[$key]['iServiceId']=$val['iServiceId'];
            $new_data2[$key]['iApplicationId']=$val['iApplicationId'];
            $new_data2[$key]['iTabId']=$val['iTabId'];
            $new_data2[$key]['vServiceName']=$val['vServiceName'];
            $new_data2[$key]['vPrice']=$val['vPrice'];
            $new_data2[$key]['vReservationFee']=$val['vReservationFee'];
            $new_data2[$key]['vMaxService']=$val['vMaxService'];
            $new_data2[$key]['iDuration']=$val['iDuration'];
            $count++;
        }
		
        $new_data2[$count]['vAddress1']=$location_data['vAddress1'];
        $new_data2[$count]['vCity']=$location_data['vCity'];
        $new_data2[$count]['vState']=$location_data['vState'];
        $new_data2[$count]['vZip']=$location_data['vZip'];
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        echo $main = json_encode($new_data2);
      //  echo $callback . '('.$main.');';
        exit;
    }
    
    function get_current_day_time()
    {
        $data = $this->input->get();
        $day = $data['iDay']-1;
	    $new_data = $this->webservice_model->get_current_day_time($data['iServiceId']);
        $service_data = $this->webservice_model->get_service_by_id($data['iServiceId']);
        
        //echo print_r($new_data); exit;
        $timings = explode(',',$new_data[0]['vServiceTiming']);
        $ftime = explode('-',$timings[$day]);
        //echo $ftime[0]; exit;
        $msftime = $this->hoursToMinutes($ftime[0]);
        //echo $msftime; exit;
        $meftime = $this->hoursToMinutes($ftime[1]);
        //echo $msftime; exit;
        for($i=$msftime;$i<=$meftime;$i=$i+15){
            $list[] = array("time" => $this->minutesToHours($i));
        }
        $count = count($list);
        
		$Da['Daytime']=$list;
		$Da['vServiceName'] = $service_data['vServiceName'];
		$Da['vPrice'] = $service_data['vPrice'];
		$Da['vReservationFee'] = $service_data['vReservationFee'];
        
		$callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
		
	    echo $main = json_encode($Da);
       // echo $callback . '('.$main.');';
        exit;
    }
    
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
        $hours = floor($minutes / 60);
        $decimalMinutes = $minutes - floor($minutes/60) * 60;
     
        # Put it together.
        $hoursMinutes = sprintf("%d:%02.0f", $hours, $decimalMinutes);
        return $hoursMinutes;
    }
    
    function book_service_confirm()
	{
        $data = $this->input->get();
        //$appid = $_REQUEST['iApplicationId'];
        //echo $appid; exit;
        //echo $data['iApplicationId']; exit;
        //$new_data = $this->webservice_model->get_reservation_location($data['iApplicationId']);
        $this->webservice_model->book_service_confirm($data);
        
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($new_data2);
        echo $callback . '('.$main.');';
        exit;
    }
    
	/** Qrcode detail **/
    function getqrcodeDetail()
    {
		if($this->input->get('iQrID')){
			$Data = $this->webservice_model->getqrcodeDetail($this->input->get('iQrID'));
		}else{
			$Data[0]['msg'] = "Error";
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		$callback = '';
		if (isset($_REQUEST['callback']))
		{
			$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		
		$main = json_encode($Data);
		echo $callback . '('.$main.');';
		exit;
    }
    
    /**
        Description : Save Credit card details
    **/
    function save_credit_card_details()
	{
		if($this->input->get())
		{
        	$data['vFirstName'] = $this->input->get('vFirstName');
            $data['vLastName'] = $this->input->get('vLastName');
            $data['vCardholdername'] = $this->input->get('vHolderName');
            $data['vCreditCardType'] = $this->input->get('vCreditType');
            $data['vCreditCardNumber'] = $this->input->get('vCreditCardNo');
			$data['vCreditExp'] = $this->input->get('vCreditExp');
            $data['vCvv'] = $this->input->get('iCreditCVV');
          	$data['iApplicationId'] = $this->input->get('iApplicationId');
          	$data['iAppTabId'] = $this->input->get('iAppTabId');
			$data['iCustOrderId'] = $this->input->get('iCustOrderId');
            $data['dPaymentDate'] = date("Y-m-d h:i:s");
			$data['iUserId'] = $this->input->get('iUserId');
			
			// get total price from order details
			$fTotalPrice = $this->webservice_model->get_total_price_order_details($data);
			$data['fTotalPrice'] = $fTotalPrice[0]['fTotalPrice'];
			
			$iPaymentId = $this->webservice_model->save_app_order_transaction_details($data);  
          	$data['ePaymentType'] = 'Paypal';
         
		 	// $user_details = $this->webservice_model->getorder_detail($mydata);
		 	$result = $this->Do_direct_payment_order_details($data,$user_details);
			
			if($iPaymentId)
			{
                if($result['PayPalResult']['ACK'] == 'Success')
                    $DataUpdate['eStatus'] = 'Completed';
                else if($result['PayPalResult']['ACK'] == 'Failure')
                    $DataUpdate['eStatus'] = 'Failed';
                else 
                    $DataUpdate['eStatus'] = 'In progress';
            	
				// update app order transaction
			    $updateid = $this->webservice_model->update_app_order_transaction_details($DataUpdate, $iPaymentId);
			    $Data['Message'] = "Successful update record.";
                $Data['iPaymentId'] = $iPaymentId;
                $Data['status'] = 'success';
				}$Datd['Message'] = "No Record Found.";
                $Data['status'] = 'Fail';
			}
			
			// payment details
			if($result['PayPalResult']['ACK'] == 'Success'){
				// get receipt details
				$receipt_data = $this->webservice_model->get_receipt_order_details($iPaymentId);
				// get receipt with html
				$receipt = $this->webservice_model->get_html_receipt_order_details($receipt_data);
				// update app cust order
				$_cust_order = $this->webservice_model->update_app_cust_order_details($data);
				// update app order
				$_cust = $this->webservice_model->update_app_order_details($data);
			}else{
				$receipt = $this->webservice_model->get_html_of_error_msg();
			}
			
			header('Content-type: application/json');
			header('Access-Control-Allow-Origin: *');
			header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
			$callback = '';
			if (isset($_REQUEST['callback']))
			{
				$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
			}
			
			$main = json_encode(array('Data'=>$Data,'receipt'=>$receipt));
			
			echo $callback . '('.$main.');';
			exit;
	}
    
    /**
        Description : Google cloud printer
    **/
    function google_cloud_printer_upload()
    {
        $gcp = new GoogleCloudPrint();
        //Login to Googel, email address and password is required
        if($gcp->loginToGoogle(/*Add email address ,/*Add password of the email */)) {
            // Login is successfull so now fetch printers
            $printers = $gcp->getPrinters();
            
            /** google cloud printer **/
			echo "<pre>";
                print_r($gcp);
                print_r($printers);
            exit;
            
            $printerid = "";
            if(count($printers)==0) {
                echo "Could not get printers";
                exit;
            }else {
                $printerid = $printers[0]['id']; // Pass id of any printer to be used for print
            }
            // Send document to the printer
            $resarray = $gcp->sendPrintToPrinter($printerid, "Printing Doc using Google Cloud Printing", "examplepdf.pdf", "application/pdf");
            if($resarray['status']==true) {
                echo "Document has been sent to printer and should print shortly.";
            }else {
                echo "An error occured while printing the doc. Error code:".$resarray['errorcode']." Message:".$resarray['errormessage'];
            }
        }else {
            echo "Login failed please check login info.";
            exit;
        }
    }
    
    
    function Do_direct_payment_order_details($payment_details, $client_details) 
    {
		// api details
	    $DPFields = array(
            'paymentaction' => 'Sale',                                          // How you want to obtain payment.  Authorization indidicates the payment is a basic auth subject to settlement with Auth & Capture.  Sale indicates that this is a final sale for which you are requesting payment.  Default is Sale.
            'ipaddress' => $_SERVER['REMOTE_ADDR'],                             // Required.  IP address of the payer's browser.
            'returnfmfdetails' => '1'                                           // Flag to determine whether you want the results returned by FMF.  1 or 0.  Default is 0.
        );

        $CCDetails = array(
            'creditcardtype' => $payment_details['vCreditCardType'],                    // Required. Type of credit card.  Visa, MasterCard, Discover, Amex, Maestro, Solo.  If Maestro or Solo, the currency code must be GBP.  In addition, either start date or issue number must be specified.
            'acct' => $payment_details['vCreditCardNumber'],                                  // Required.  Credit card number.  No spaces or punctuation.  
            'expdate' => $payment_details['vCreditExp'],          // Required.  Credit card expiration date.  Format is MMYYYY
            'cvv2' => $payment_details['vCvv'],                                         // Requirements determined by your PayPal account settings.  Security digits for credit card.
            'startdate' => '',                                                          // Month and year that Maestro or Solo card was issued.  MMYYYY
            'issuenumber' => ''                                                         // Issue number of Maestro or Solo card.  Two numeric digits max.
        );
        
        
        $PayerInfo = array(
            'email' => 'test@gmail.com',                                   // Email address of payer.
            'payerid' => '',                                                        // Unique PayPal customer ID for payer.
            'payerstatus' => '',                                                    // status of payer.  Values are verified or unverified
            'business' => ''                                                        // Payer's business name.
        );
                    
        $PayerName = array(
            'salutation' => 'Mr.',                                                  // Payer's salutation.  20 char max.
            'firstname' => $client_details['vFirstName'],                           // Payer's first name.  25 char max.
            'middlename' => '',                                                     // Payer's middle name.  25 char max.
            'lastname' => $client_details['vLastName'],                             // Payer's last name.  25 char max.
            'suffix' => '',                                                         // Payer's suffix.  12 char max.
        );

        $PaymentDetails = array(
            'amt' => $payment_details['fTotalPrice'],                             // Required.  Total amount of order, including shipping, handling, and tax.  
            'currencycode' => 'GBP',                                              // Required.  Three-letter currency code.  Default is USD.
            'itemamt' => $payment_details['fTotalPrice'],                         // Required if you include itemized cart details. (L_AMTn, etc.)  Subtotal of items not including S&H, or tax.
                                                                                  // URL for receiving Instant Payment Notifications.  This overrides what your profile is set to use.
        );    
            
        $OrderItems = array();
        $Item     = array(
                'l_name' => 'Publish Application',                          // Item Name.  127 char max.
                'l_desc' => 'Application published',                        // Item description.  127 char max.
                'l_amt' => $payment_details['fTotalPrice'],                      // Cost of individual item.
                'l_number' => '123',                                        // Item Number.  127 char max.
                'l_qty' => '1',                                             // Item quantity.  Must be any positive integer.  
                'l_taxamt' => '',                                           // Item's sales tax amount.
                'l_ebayitemnumber' => '',                                   // eBay auction number of item.
                'l_ebayitemauctiontxnid' => '',                             // eBay transaction ID of purchased item.
                'l_ebayitemorderid' => '',                                  // eBay order ID for the item.
        );
        array_push($OrderItems, $Item);
    
        $Secure3D = array(
            'authstatus3d' => '', 
            'mpivendor3ds' => '', 
            'cavv' => '', 
            'eci3ds' => '', 
            'xid' => ''
        );
                      
        $PayPalRequestData = array(
            'DPFields' => $DPFields, 
            'CCDetails' => $CCDetails, 
            'PayerInfo' => $PayerInfo, 
            'PayerName' => $PayerName, 
            //'BillingAddress' => $BillingAddress, 
            //'ShippingAddress' => $ShippingAddress, 
            'PaymentDetails' => $PaymentDetails, 
            'OrderItems' => $OrderItems, 
            'Secure3D' => $Secure3D
        );
        //echo '<pre>';print_r($PayPalRequestData);exit;             
        $PayPalResult = $this->paypal_pro->DoDirectPayment($PayPalRequestData);
        //echo '<pre>';print_r($PayPalResult);exit;
        if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK']))
        {
            //$result = array('Errors'=>$PayPalResult['ERRORS']);
            $result = array('PayPalResult'=>$PayPalResult);
        }
        else
        {
            // Successful call.  Load view or whatever you need to do here.
            $result = array('PayPalResult'=>$PayPalResult);
            //$this->load->view('do_direct_payment_demo',$data);
        }
        return $result;
    }
    
    
    /** send order receipt details **/
    
    function send_order_receipt_details()
    {
        //$this->load->library('WriteHTML');
        
        // get receipt details
        $pdf=new PDF_HTML();

        $pdf->AliasNbPages();
        $pdf->SetAutoPageBreak(true, 15);
        
        $pdf->AddPage();
        //$pdf->Image('logo.png',18,13,33);
        $pdf->SetFont('Arial','B',14);
        $pdf->WriteHTML('<para></para>');
        
        $pdf->SetFont('Arial','B',7); 
    //  $htmlTable=$this->webservice_model->get_receipt_details();
        $pdf->WriteHTML2("<br><br><br>$htmlTable");
        $pdf->SetFont('Arial','B',6);
        
        $pdf->Output('D:/xampp/htdocs/paypal_ec/pdf/test.pdf', 'F');
    }

    /**
    Name:- Chavda Hem
    Des:- Get loyalty user details
    **/
    function get_loyalty_user_detail()
    {
        $loyaltyDetails =  array();
        if($this->input->get())
        {
            $iUserId = $this->input->get('iUserId');
            $applicationid = $this->input->get('iApplicationId');
            $loyalty_details = $this->webservice_model->get_loyalty_user_alldetail($iUserId,$applicationid);
            $loyalty_details1 = $this->webservice_model->get_loyalty_user_countdetail($iUserId,$applicationid);
            
			echo "<pre>";
				print_r($loyalty_details);
			exit;
		    foreach ($loyalty_details as $key => $value) {
                    
                    foreach ($loyalty_details1 as $key1 => $value1) {
                        if($value1['iLoyaltyID'] == $value['iLoyaltyID'])
                        {
                            $loyaltyDetails[$key]['iLoyaltyID'] = $value['iLoyaltyID'];
                            $loyaltyDetails[$key]['iApplicationId'] = $value['iApplicationId'];
                            $loyaltyDetails[$key]['iAppTabId'] = $value['iAppTabId'];
                            $loyaltyDetails[$key]['vRewardText'] = $value['vRewardText'];
                            $loyaltyDetails[$key]['vSecretCode'] = $value['vSecretCode'];
                            $loyaltyDetails[$key]['vThumbnail'] = $value['vThumbnail'];
                            $loyaltyDetails[$key]['vSquareCount'] =$value['vSquareCount'];
                            $loyaltyDetails[$key]['LoyaltyUse'] =$value1['LoyaltyUse'];
                            $loyaltyDetails[$key]['remain_loyalty'] =$value1['iLoyaltyID'];
                        }
                        else
                        {
                            $loyaltyDetails[$key]['iLoyaltyID'] = $value['iLoyaltyID'];
                            $loyaltyDetails[$key]['iApplicationId'] = $value['iApplicationId'];
                            $loyaltyDetails[$key]['iAppTabId'] = $value['iAppTabId'];
                            $loyaltyDetails[$key]['vRewardText'] = $value['vRewardText'];
                            $loyaltyDetails[$key]['vSecretCode'] = $value['vSecretCode'];
                            $loyaltyDetails[$key]['vThumbnail'] = $value['vThumbnail'];
                            $loyaltyDetails[$key]['vSquareCount'] =$value['vSquareCount'];
                            $loyaltyDetails[$key]['LoyaltyUse'] =0;
                            $loyaltyDetails[$key]['remain_loyalty'] =$value['vSquareCount'];
                        }
                    }
                }
               

            if(count($loyaltyDetails) >0)
            {
                $Data['loyalty_details'] = $loyaltyDetails;
                $Data['Message'] = 'Successful';
                $Data['status'] = 'success';
            }
            else
            {
                $Data['Message'] = 'No Record Found';
                $Data['status'] = 'Fail';
            }
            
        }
        else
        {
            $Data['Message'] = 'No Record Found';
            $Data['status'] = 'Fail';
        }

        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
    }
	
	
	/** loyalty easyapps **/
	function easyapps_loyalty_get_details()
	{
		/** Loyalty get details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		$iUserId = $this->input->get('iUserId');
        $iApplicationId = $this->input->get('iApplicationId');
		
		/** Loyalty Get Details **/
        $loyalty_details = $this->webservice_model->get_loyalty_user_alldetail($iUserId,$iApplicationId);
		
       /** Loyalty Get Details **/
		if(count($loyalty_details) >0)
		{
			foreach($loyalty_details as $val)
			{
				$loy_details = $this->webservice_model->get_userwise_loyalty_details($val['iLoyaltyID'],$val['vSquareCount']);
				$myloyalty[] = array(
					'iLoyaltyID' => $val['iLoyaltyID'],
					'iApplicationId' => $val['iApplicationId'],
					'iAppTabId' => $val['iAppTabId'],
					'vRewardText' => $val['vRewardText'],
					'vSecretCode' => $val['vSecretCode'],
					'vThumbnail' => $this->data['base_url'].'uploads/Loyalty/'.$val['iLoyaltyID'].'/'.$val['vThumbnail'],
					'vMobileHeaderImage' => $val['vMobileHeaderImage'],
					'vTabletHeaderImage' => $val['vTabletHeaderImage'],
					'vSquareCount' => $val['vSquareCount'],
					'UserUsed' => $loy_details,
					'vSocialShare'=>$val['vSocialShare'],
				);
			}
			/** loyalty **/
			$Data['loyalty'] = $myloyalty;
			$Data['status'] = "Success";
		}else{
			$Data['status'] = "Fail";
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
		//$pdf = $this->webservice_model->get_pdf_detail();
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** get website webservices **/
	function easyapps_website_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		/** check **/
		if($Data['iApplicationId'] != ''){
			/** easyapps website **/
			$web = $this->webservice_model->get_website_details($Data);
			/** web **/
			if(count($web) >0){
				/** website details **/
				$Data['website_details'] = $web;	
			
				$background_image = $this->webservice_model->get_website_background_image($Data);
				/** background image **/	
				if(count($background_image) >0){
					$background = array(
						'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage'],
					);
					
					/** background image **/
					$Data['background'] = $background;
				}else{
					$background = array('vImage'=>'');
					
					/** background image **/
					$Data['background'] = $background;
				}
				
				
				/** background image **/
				$Data['status'] = 'Success';			
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'No Record Found';
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
		//$pdf = $this->webservice_model->get_pdf_detail();
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** get website webservices **/
	function easyapps_socialmedia_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		/** check **/
		if($Data['iApplicationId'] != ''){
			/** easyapps website **/
			$social = $this->webservice_model->get_socialmedia_details($Data);
			if(count($social) >0){
				$Data['socialmedia_details'] = $social;
				
				/** background image **/
				$background_socialmedia = $this->webservice_model->get_socialmedia_background_image($Data);
				
				/** background pdf **/	
				if(count($background_socialmedia) >0){
					$Data['background'] = array('vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_socialmedia['iBackgroundId'].'/org_'.$background_socialmedia['vImage']); 
				}else{
					$Data['background'] = array('vImage' => '');
				}
				
				/** status **/
				$Data['status'] = 'Success';			
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'No Record Found';
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
		/** json encode **/
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** PDF details **/
	function easyapps_pdf_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$host_name = $_SERVER['HTTP_HOST'];
		
		/** check **/
		if($Data['iApplicationId'] != ''){
			/** PDF Details **/
			$pdf = $this->webservice_model->get_pdf_details($Data);		
			
			if(count($pdf)> 0){
				$pdfs = array('iPdfId'=>$pdf[0]['iPdfId'],
					'iApplicationId'=>$pdf[0]['iApplicationId'],
					'iAppTabId'=>$pdf[0]['iAppTabId'],
					'vPdfTitle'=>$pdf[0]['vPdfTitle'],
					'vPdfFile'=>$this->data['base_url'].'uploads/pdfs/'.$pdf[0]['iPdfId'].'/'.$pdf[0]['vPdfFile'],
					'vPdfUrl'=>$pdf[0]['vPdfUrl']
				);
				$Data['pdfs'] = $pdfs;
				
				/** background image **/
				$background_pdf = $this->webservice_model->get_pdf_background_image($Data);
				if(count($background_pdf) >0){
					$Data['background'] = array('vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_pdf['iBackgroundId'].'/org_'.$background_pdf['vImage']); 
				}else{
					$Data['background'] = array('vImage' => '');
				}
				
				/** PDFs **/
				$Data['status'] = 'Success';	
			}else{
			
				/** PDFs **/
				$Data['status'] = 'Fail';	
			}
		}else{
			$Data['status'] = 'Fail';						
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** get custom webservices **/
	function easyapps_custom_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** check **/
		if($Data['iApplicationId'] != ''){
			/** easyapps website **/
			$custom = $this->webservice_model->get_custom_details($Data);
			
			if(count($custom) >0){
				$Data['custom'] = array(
					'iInfotabId'=>$custom['iInfotabId'],
					'iApplicationId'=>$custom['iApplicationId'],
					'iAppTabId'=>$custom['iAppTabId'],
					'vTitle'=>$custom['vTitle'],
					'tDescription'=>$custom['tDescription'],
				);
				
				/** background image **/
				$background_custom = $this->webservice_model->get_custom_background_image($Data);
				
				if(count($background_custom) >0){
					/** background image **/	
					$Data['background'] = array('vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_custom['iBackgroundId'].'/org_'.$background_custom['vImage']);
				}else{
					/** background image **/
					$Data['background'] = array('vImage'=>'');
				}
				
				/** status **/
				$Data['status'] = 'Success';			
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'No Record Found';
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** Event Webservices **/
	function easyapps_event_get()
	{
		/** Data Application **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** check **/
		if($Data['iApplicationId'] != ''){
			/** easyapps website **/
			$today = date('Y-m-d');
			$event = $this->webservice_model->get_event_details($Data,$today);
			
			if(count($event) > 0){
				foreach($event as $val){
					$eve[] = array(
						'iEventId' => $val['iEventId'],
						'iApplicationId' => $val['iApplicationId'],
						'iAppTabId' => $val['iAppTabId'],
						'vImage' => $val['vImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/events/'.$val['iEventId'].'/'.$val['vImage'],
						'vTitle' => $val['vTitle'],	
						'tDescription' => $val['tDescription'],	
						'dStartDate' => $val['dStartDate'],	
						'vStartTime' => $val['vStartTime'],	
						'dEndDate' => $val['dEndDate'],	
						'vEndTime' => $val['vEndTime'],	
						'eStatus' => $val['eStatus'],	
						'vBackgroundColor' => $val['vBackgroundColor'],	
						'vTextColor' => $val['vTextColor'],	
						'vHeaderImage' => $val['vHeaderImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/events/headerimg/'.$val['iEventId'].'/'.$val['vHeaderImage'],	
					);
				}
				
				/** event **/
				$Data['event'] = $eve;
				
				/** background image **/
				$background_image = $this->webservice_model->get_background_image_event($Data);

				if(count($background_image) >0){
				$back_event_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
					
				/** event **/
				$Data['backgroundimage'] = $back_event_image;
				}else{
					$back_event_image = array('vImage'=>'');
				
					/** event **/
					$Data['backgroundimage'] = $back_event_image;
				}
				
				/** Event **/
				$Data['status'] = 'Success';			
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'No Record Found';
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
           $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** RSS Webservices **/
	function easyapps_RSS_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
	
		/** check **/
		if($Data['iApplicationId'] != ''){
			/** easyapps website **/
			$RSS = $this->webservice_model->get_RSS_details($Data);
			
			if(count($RSS) > 0)
			{
				foreach($RSS as $val)
				{
					$rss[] = array(
						'iRSSId'=>$val['iRSSId'],
						'iApplicationId'=>$val['iApplicationId'],
						'iAppTabId'=>$val['iAppTabId'],
						'vRSSURL'=>$val['vRSSURL'],
						'vIcon'=>$this->data['base_url'].'uploads/rss/'.$val['iRSSId'].'/'.$val['vIcon'],	
					);
				}
				
				/** RSS **/
				$Data['RSS'] = $rss;
				
				/** background image **/
				$background_image = $this->webservice_model->get_rss_background_image($Data);
				if(count($background_image) >0){
					$back_rss_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
					
					/** event **/
					$Data['backgroundimage'] = $back_rss_image;
				}else{
					/** back rss image **/
					$back_rss_image = array('vImage'=>'');
					
					/** event **/
					$Data['backgroundimage'] = $back_rss_image;
				}
				
				$Data['status'] = 'Success';			
			}else{
				/** status **/
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'No Record Found';
		}
		
		/** header content-type **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** Qrcode Webservices **/
	function easyapps_Qrcode_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** check **/
		if($Data['iApplicationId'] != '')
		{
			/** easyapps website **/
			$Qrcode = $this->webservice_model->get_Qrcode_details($Data);
			
			/** Qrcode **/
			if(count($Qrcode) > 0)
			{
				/** Qrcode **/
				foreach($Qrcode as $val)
				{
					$Qrcodes[] = array(
						'iQrID'=>$val['iQrID'],
						'iApplicationId'=>$val['iApplicationId'],
						'iAppTabId'=>$val['iAppTabId'],
						'vName'=>$val['vName'],
						'tQrCode'=>$val['tQrCode'],
						'dStartDate'=>$val['dStartDate'],
						'dEndDate'=>$val['dEndDate'],
						'tDescription'=>$val['tDescription'],
						'vMobileHeaderImage'=>$val['vMobileHeaderImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/QRCode/MobileHeaderImage/'.$val['iQrID'].'/'.$val['vMobileHeaderImage'],
						'vTabletHeaderImage'=>$val['vTabletHeaderImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/QRCode/vTabletHeaderImage/'.$val['iQrID'].'/'.$val['vTabletHeaderImage'],
						'vTargetAmount'=>$val['iQrID'],
						'vBeforeHoursCheck-In' => $val['vBeforeHoursCheck-In'],
						'eStatus'=>$val['eStatus'],
					);
				}
				
				$Data['Qrcode'] = $Qrcodes;
				
				/** background image **/
				$background_image = $this->webservice_model->get_qrcode_background_image($Data);
				if(count($background_image) >0){
					$back_qrcode_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
					
					/** qrcode **/
					$Data['backgroundimage'] = $back_qrcode_image;
				}else{
					/** back rss image **/
					$back_qrcode_image = array('vImage'=>'');
				
					/** qrcode **/
					$Data['backgroundimage'] = $back_qrcode_image;
				}
				
				$Data['status'] = 'Success';			
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'No Record Found';
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** Home Details **/
	function easyapps_home_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** check **/
		if($Data['iApplicationId'] != '')
		{
			/** easyapps website **/
			$home = $this->webservice_model->get_home_details($Data);
			
			if(count($home) > 0)
			{
				/** Qrcode **/
				$openingtime_detail = $this->webservice_model->get_openingtime_details($home['iHometabId'],$Data);
				
				$home_detail = array(
					'iHometabId' => $home['iHometabId'],
					'iApplicationId' => $home['iApplicationId'],
					'vWebsite' => $home['vWebsite'],
					'vEmail' => $home['vEmail'],
					'vTelephone' => $home['vTelephone'],
					'vAddress1' => $home['vAddress1'],
					'vAddress2' => $home['vAddress2'],
					'vCity' => $home['vCity'],
					'vState' => $home['vState'],
					'vCountry' => $home['vCountry'],
					'vZip' => $home['vZip'],
					'vLatitude' => $home['vLatitude'],
					'vLongitude' => $home['vLongitude'],
					'vDistanceType' => $home['vDistanceType'],
					'vDescription' => $home['tDescription'],
					'vImage' => $home['vImage']=="" ? $this->config->item('empty_image_app') :$this->data['base_url'].'uploads/homes/'.$home['iHometabId'].'/'.$home['vImage'],
				);
				
				$Data['home'] = $home_detail;
				
				/** opening time **/
				if(count($openingtime_detail) >0)
				{
					$openingtime = array(
						'iOpeningId'=>$openingtime_detail['iOpeningId'],
						'vDay'=>$openingtime_detail['vDay'],
						'vOpenfrom'=>$openingtime_detail['vOpenfrom'],
						'vOpento'=>$openingtime_detail['vOpento'],
					);
					$Data['openingtime'] = $openingtime_detail;
				}else{
					/** openingtime **/
					$openingtime = array();
					$Data['openingtime'] = $openingtime;
				}
				
				/** background image **/
				$background_image = $this->webservice_model->get_background_home_image($Data);

				/** background image **/
				if(count($background_image) >0)
				{
					$background = array(
						'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/'.'org_'.$background_image['vImage'],
					);
					
					$Data['background'] = $background;
				}else{
					/** openingtime **/
					$background = array('vImage'=>'');
					$Data['background'] = $background;
				}
				
				$Data['status'] = 'Success';
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'No Record Found';
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		$callback = '';
		if (isset($_REQUEST['callback']))
		{
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		
		$main = json_encode($Data);
		echo $callback . $main;
		exit;
	}
	
	/** Youtube Channel **/
	function easyapps_youtube_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** check **/
		if($Data['iApplicationId'] != '')
		{
			/** Youtube channel **/
			$youtube = $this->webservice_model->get_youtube_channel_detail($Data);
			
			if(count($youtube) >0){
				$Data['youtube'] = array(
					'iYoutubeId'=>$youtube['iYoutubeId'],
					'iApplicationId'=>$youtube['iApplicationId'],
					'iAppTabId'=>$youtube['iAppTabId'],
					'vChannelName'=>$youtube['vChannelName'],
					'tDescription'=>$youtube['tDescription'],
				);
				
				/** Background image  **/
				/** background image **/
				$background_image = $this->webservice_model->get_background_youtube_image($Data);

				/** background image **/
				if(count($background_image) >0)
				{
					$background = array(
						'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/'.'org_'.$background_image['vImage'],
					);
					
					$Data['background'] = $background;
				}else{
					/** openingtime **/
					$background = array('vImage'=>'');
					$Data['background'] = $background;
				}
					
			}else{
				$Data['status'] = 'Fail';
			}
		}
		
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		$callback = '';
		if (isset($_REQUEST['callback']))
		{
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		
		$main = json_encode($Data);
		echo $callback . $main;
		exit;
	}
	
	/** Gallery **/
	function easyapps_gallery_get()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** check **/
		if($Data['iApplicationId'] != '')
		{
			/** gallery images **/
			$gallery = $this->webservice_model->get_gallery_detail($Data);
			
			$Data['gallery'] = array(
				'iGalleryId' => $gallery['iGalleryId'], 
				'iApplicationId' => $gallery['iApplicationId'], 
				'iAppTabId' => $gallery['iAppTabId'], 
				'eImageServiceType' => $gallery['eImageServiceType'], 
				'eImageServiceType' => $gallery['eImageServiceType'], 
				'eDisplayStyle' => $gallery['eDisplayStyle'], 
				'eDisplayDescription' => $gallery['eDisplayDescription'], 
				'vFlickerApi' => $gallery['vFlickerApi'], 
				'vFlickerEmail' => $gallery['vFlickerEmail'], 
				'vFlickerEmail' => $gallery['vFlickerEmail'], 
				'eFlickerGalleryType' => $gallery['eFlickerGalleryType'], 
				'vPicassaEmail' => $gallery['vPicassaEmail'], 
				'vInstagramEmail' => $gallery['vInstagramEmail'], 
				'vInstagramAPI' => $gallery['vInstagramAPI'], 
				'vSocialShare' => $gallery['vSocialShare'], 
			);
			
			if(count($gallery) >0){
				$custom_image = $this->webservice_model->get_custom_images_gallery($gallery['iGalleryId']);
				
				/** custom image **/
				if(count($custom_image) >0){
					foreach($custom_image as $var){
						$vGalleryImage = $this->webservice_model->get_base64_encode($var['vGalleryImage'],'gallery',$var['iGalleryImageId']);
						$custom_images[] = array(
							'iGalleryImageId'=>$var['iGalleryImageId'],
							'iGalleryId'=>$var['iGalleryId'],
						//	'vGalleryImage'=>$_SERVER['HTTP_HOST'].'/uploads/gallery/'.$var['iGalleryImageId'].'/'.$var['vGalleryImage'],
							'vGalleryImage'=>'data:image/jpeg;base64'.','.$vGalleryImage,
							'tDescription'=>$var['tDescription']
						);
						
						/** custom image **/
						$Data['custom_image'] = $custom_images;	
					}
					
					$background_image = $this->webservice_model->get_gallery_background_image($Data);
					if(count($background_image) >0){
						$back_gallery_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
						/** event **/
						$Data['backgroundimage'] = $back_gallery_image;
					}else{
						/** back rss image **/
						$back_gallery_image = array('vImage'=>'');
						/** event **/
						$Data['backgroundimage'] = $back_gallery_image;
					}
					
					/** status **/
					$Data['status'] = 'Success'; 	
				}else{
					/** custom image **/
					$custom_images = array();
					$Data['custom_image'] = $custom_images;
					
					/** status **/
					$Data['status'] = 'Fail'; 	
				}
			}
		}else{
			/** status **/
			$Data['status'] = 'Record Not Found'; 		
		}	

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/** get loyalty background image **/
	function easyapps_loyalty_bgimg()
	{
		/** ApplicationId **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		if($Data['iApplicationId'] != ''){
			/** iApplicationId **/
			$background_image = $this->webservice_model->get_loyalty_bg_image($Data);
			
			if(count($background_image) > 0){
				/** background image **/
				$loyalty_bg = array(
					'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/'.'org_'.$background_image['vImage'],
				);
				
				
				/** loyalty bg image **/
				$Data['background'] = $loyalty_bg;
				$Data['status'] = 'Success';
			}else{
				$loyalty_bg = array('vImage'=>'');
				
				/** loyalty bg image **/
				$Data['background'] = $loyalty_bg;
				$Data['status'] = 'Fail';
			}
		}else{
			/** Application **/
			$Data['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	
	
	/** get order category list **/
	function easyapp_news_details()
	{
		/** iApplication Id **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		if($Data['iApplicationId'] != ''){
			/** iApplicationId **/
			$get_news_details = $this->webservice_model->get_news_details($Data);
			if(count($get_news_details) >0){
			
				/** menu **/
				$news = array(
					'iNewsId' => $get_news_details['iNewsId'],
					'iApplicationId' => $get_news_details['iApplicationId'],
					'iAppTabId' => $get_news_details['iAppTabId'],
					'eGoogleNews' => $get_news_details['eGoogleNews'],
					'vGoogleNewsKeyWords' => $get_news_details['vGoogleNewsKeyWords'],
					'eTweets' => $get_news_details['eTweets'],
					'vTweetsKeyWords' => $get_news_details['vTweetsKeyWords'],
				);
				
				/** category **/
				$Data['News'] = $news;
				/** background image **/
				$background_image = $this->webservice_model->get_background_news_image($Data);
				/** background image **/
				if(count($background_image) >0)
				{
					$background = array(
						'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/'.'org_'.$background_image['vImage'],
					);
					
					$Data['background'] = $background;
				}else{
					/** openingtime **/
					$background = array('vImage'=>'');
					$Data['background'] = $background;
				}
				
				/** status **/
				$Data['status'] = "Success";	
			}else{
				$Data['status'] = "Fail";
			}
		}else{
			$Data['status'] = "Fail";
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/** Paypal Transaction Details **/
	function easyapps_paypal_details()
	{
		/** iApplicationId **/
		$data['iCustOrderId'] = $this->input->get('iOrderId');
		$data['iApplicationId'] = $this->input->get('iApplicationId');
		$data['iTransactionId'] = $this->input->get('iTransactionId');
		$data['tTransactinTime'] = $this->input->get('tTransactinTime');
		$data['fAmount'] = $this->input->get('fAmount');
		$data['vPaymentstatus'] = $this->input->get('vPaymentstatus');

		/** check **/
		if($data['iApplicationId'] != ''){
			/** ApplicationId **/
			$paypal_add = $this->webservice_model->insert_paypal_details($data);
			
			if($paypal_add){
				/** mail details **/
				$mail_details = $this->webservice_model->get_receipt_order_details($paypal_add);

				if(count($mail_details) >0){
					/** customer mail **/
					$this->get_html_receipt_order_details($mail_details);

					/** Admin mail **/	
					$this->send_order_mail_admin_details($mail_details);
				}	
			}


			if($paypal_add){
				/** status update in order **/
				$iCustOrderId = $this->webservice_model->update_status_order_details_list($data);
				/** status update in customer order **/
				$iCustOrderId1=$this->webservice_model->update_status_order_details_list1($data['iCustomerId']);
				
				/** paypal add **/
				$Data['Transaction'] = array('msg'=>'Transaction Successfully done !!');
				$Data['status'] = 'Success';
			}else{
				/** paypal **/
				$Data['status'] = 'Fail';
			}
		}else{
			/** paypal **/
			$Data['status'] = 'Fail';
		}	
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		$callback = '';
		if (isset($_REQUEST['callback']))
		{
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		
		$main = json_encode($Data);
		echo $callback . $main;
		exit;	
	}
	
	/** Paypal Transaction Details **/
	function easyapps_voicerecording_details()
	{
		/** iApplication Id **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		if($Data['iApplicationId'] != ''){
			/** iApplicationId **/
			$get_news_details = $this->webservice_model->get_voicerecording_details($Data);
			if(count($get_news_details) >0){
				/** menu **/
				$news = array(
					'iVoiceRecordingId' => $get_news_details['iVoiceRecordingId'],
					'iApplicationId' => $get_news_details['iApplicationId'],
					'iAppTabId' => $get_news_details['iAppTabId'],
					'tVoiceDescription' => $get_news_details['tVoiceDescription'],
					'vVoiceEmail' => $get_news_details['vVoiceEmail'],
					'vVoiceSubject' => $get_news_details['vVoiceSubject'],
				);
				
				/** category **/
				$Data['News'] = $news;
				/** background image **/
				$background_image = $this->webservice_model->get_background_voicerecording_image($Data);
				
				/** background image **/
				if(count($background_image) >0)
				{
					$background = array(
						'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/'.'org_'.$background_image['vImage'],
					);
					
					$Data['background'] = $background;
				}else{
					/** openingtime **/
					$background = array('vImage'=>'');
					$Data['background'] = $background;
				}
				
				/** status **/
				$Data['status'] = "Success";	
			}else{
				$Data['status'] = "Fail";
			}
		}else{
			$Data['status'] = "Fail";
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/** Appereance Details **/
	function easyapps_appereance_details()
	{
		/** ApplicationID **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		/** Data details **/
		if($Data['iApplicationId'] != '')
		{
			/** get details **/		
			$appereance = $this->webservice_model->get_appereance_details($Data);
			
			/** Appereance **/
			if(count($appereance) >0){
				$appereance_details = array(
					'iAppDesignInfoId'=>$appereance['iAppDesignInfoId'],
					'iApplicationId'=>$appereance['iApplicationId'],
					'eCallBtn'=>$appereance['eCallBtn'],
					'eDirectionBtn'=>$appereance['eDirectionBtn'],
					'eTellFriendBtn'=>$appereance['eTellFriendBtn'],
					'eShowStatusBar'=>$appereance['eShowStatusBar'],
					'eBtnLayout'=>$appereance['eBtnLayout'],
					'vMappingRow'=>$appereance['vMappingRow'],
					'vMappingCol'=>$appereance['vMappingCol'],
					'tab_btn_background'=>$this->data['base_url'].'uploads/tab_btn_background/'.$appereance['iBackgroundId'].'/'.$appereance['vImage'],
					'iIconcolorId'=>$appereance['iIconcolorId'],
					'vTabColor'=>$appereance['vTabColor'],
					'vTabTexColor'=>$appereance['vTabTexColor'],
					'lunch_header'=>$this->data['base_url'].'uploads/lunch_header/'.$appereance['iLunchheaderId'].'/'.$appereance['Headerimage'],
					'iGlobalHeaderId'=>$appereance['iGlobalHeaderId'],	
					'vGlobalTintColor'=>$appereance['vGlobalTintColor'],
					'vNavigationBar'=>$appereance['vNavigationBar'],
					'vNavigationText'=>$appereance['vNavigationText'],
					'vNavigationShadow'=>$appereance['vNavigationShadow'],
					'vSectionBar'=>$appereance['vSectionBar'],
					'vSectionText'=>$appereance['vSectionText'],
					'vOddRowBar'=>$appereance['vOddRowBar'],
					'vButtonTextColor'=>$appereance['vButtonTextColor'],
					'vOddRowText'=>$appereance['vOddRowText'],
					'vEvenRowBar'=>$appereance['vEvenRowBar'],
					'vEvenRowText'=>$appereance['vEvenRowText'],
					'vButtonImageColors'=>$appereance['vButtonImageColors'],
					'vFeatureText'=>$appereance['vFeatureText'],
					'vOtherBackgroundColor'=>$appereance['vOtherBackgroundColor'],
					'iTemplateId'=>$appereance['iTemplateId'],
					'vPattern'=>$appereance['vPattern'],
				);
			
				/** appereance **/	
				$Data['appereance_details'] = $appereance_details;
				$Data['status'] = 'Success';
			}else{
				/** appereance details **/
				$Data['status'] = 'Fail';
			}
		}else{
			/** appereance details **/
			$Data['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/** reservation location get details (schedule reservation) **/
	function easyapps_reservation_location()
	{
		/** iApplicationID **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		if($Data['iApplicationId'] != '')
		{
			/** ApplicationId **/
			$location_details = $this->webservice_model->get_location_reservation_details($Data);
			
			if(count($location_details) >0){
				/** location details **/
				foreach($location_details as $val){
					$res_loc[] = array(
						'iLocationId' => $val['iLocationId'],
						'iApplicationId' => $val['iApplicationId'],
						'iTabId' => $val['iTabId'],
						'vWebsite' => $val['vWebsite'],
						'vEmail' => $val['vEmail'],
						'vTelephone' => $val['vTelephone'],
						'vAddress1' => $val['vAddress1'],
						'vAddress2' => $val['vAddress2'],
						'vCity' => $val['vCity'],
						'vState' => $val['vState'],
						'vZip' => $val['vZip'],
						'vLatitude' => $val['vLatitude'],
						'vLongitude' => $val['vLongitude'],
						'vLookupAddress' => $val['vLookupAddress'],
					);
				}
				
				/** reservation_location **/
				$Data['reservation_location'] = $res_loc;
				$Data['status'] = 'Success';
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			$Data['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/** Service webservice after location details (Schedule Reservation) **/
	function easyapps_reservation_service_location()
	{
		/** iApplicationID **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');	

		/** currency **/
		$vCurrency = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);
		
		/** Assign Currency sign **/
		if($vCurrency['vCurrency'] == 'EUR'){
			$vcur = '&euro;';
		}else if($vCurrency['vCurrency'] == 'USD'){
			$vcur = '$';
		}else{
			$vcur = $vCurrency['vCurrency'];
		}
		/** End **/

		/** check application **/
		if($Data['iApplicationId'] != '')
		{
			/** ApplicationId **/
			$service_details = $this->webservice_model->get_location_reservation_service($Data);
			
			/** service details **/
			if(count($service_details) >0)
			{
				$service = array(
					'iServiceId'=>$service_details['iServiceId'],
					'iApplicationId'=>$service_details['iApplicationId'],
					'iFeatureId'=>$service_details['iFeatureId'],
					'iTabId'=>$service_details['iTabId'],
					'vServiceName'=>$service_details['vServiceName'],
					'vPrice'=>number_format($service_details['vPrice'],2,'.',''),
					'vReservationFee'=>$service_details['vReservationFee'],
					'vMaxService'=>$service_details['vMaxService'],
					'iDuration'=>$service_details['iDuration'],
					'eStatus'=>$service_details['eStatus'],
					'vServiceTiming'=>$service_details['vServiceTiming'],
					'vCurrency' => $vcur
				);
				
				$Data['reservation_service'] = $service;
				$Data['status'] = "Success";
			}else{
				$Data['status'] = "Fail";
			}
		}else{
			$Data['status'] = "Fail";
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/** Finally reservation **/
	function easyapps_final_reservation()
	{
		/** iApplicationID **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');	
		$Data['iUserId'] = $this->input->get('iUserId');	
		$Data['iLocationId'] = $this->input->get('iLocationId');	
		$Data['iServiceId'] = $this->input->get('iServiceId');	
		$Data['vServicePrice'] = $this->input->get('vServicePrice');	
		$Data['vServiceFees'] = $this->input->get('vServiceFees');	
		$Data['vDate'] = date('Y-m-d',strtotime($this->input->get('vDate')));	
		$Data['vTime'] = $this->input->get('vTime');	
		
		if($Data['iApplicationId'] != '')
		{
			/** ApplicationId **/
			$inesrt_reservation = $this->webservice_model->insert_final_reservation($Data);

			/** insert reservation **/
			if($inesrt_reservation){
				/** status **/
				$msg['reservation_id'] = $inesrt_reservation;
				$msg['status'] = 'Success';
			}else{
				$msg['status'] = 'Fail';
			}
		}else{
			$msg['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode(array("Message"=>$msg));
        echo $callback . $main;
        exit;	
	}
	
	/*** Reservation ***/
	function easyapps_reservation_future_lists()
	{
		/** Application Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		$Data['iUserId'] = $this->input->get('iUserId');
		
		/** iApplication Details **/
		if($Data['iApplicationId'] != ''){
			/** Reservation  LIST **/
			$details = $this->webservice_model->get_reservation_list($Data);
			
			/** Reservation Lists **/
			if(count($details) >0){
				/** details **/
				foreach($details as $val){
					$reservation[] = array(
						'iReservationId' => $val['iReservationId'],
						'iApplicationId' => $val['iApplicationId'],
						'iUserId' => $val['iUserId'],
						'iLocationId' => $val['iLocationId'],
						'iServiceId' => $val['iServiceId'],
						'vServicePrice' => $val['vServicePrice'],
						'vDate' => $val['vDate'],
						'vTime' => $val['vTime'],
						'vPrice' => $val['vPrice'],
						'vServiceName' => $val['vServiceName'],
						'vReservationFee' => $val['vReservationFee'],
						'vAddress1' => $val['vAddress1'],
						'vAddress2' => $val['vAddress2'],
           			);
				}
				
				$background_image = $this->webservice_model->get_reservation_background_image($Data);
				if(count($background_image) >0){
					$back_reservation_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
					/** event **/
					$Data['backgroundimage'] = $back_reservation_image;
				}else{
					/** back rss image **/
					$back_reservation_image = array('vImage'=>'');
					/** event **/
					$Data['backgroundimage'] = $back_reservation_image;
				}
				
				/** reservation list **/
				$Data['reservation_list'] = $reservation;
				$Data['status'] = 'Success';
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			/** Reservation FAIL **/
			$Data['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	function easyapps_get_contact_bg()
	{
		/** Application Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		$background_image = $this->webservice_model->get_contact_background_image($Data);
		//print_r($background_image);die;
		if(count($background_image) >0){
			$back_contact_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
			/** event **/
			$Data['backgroundimage'] = $back_contact_image;
			$Data['status'] = 'Success';
		}else{
			/** back rss image **/
			$back_contact_image = array('vImage'=>'');
			/** event **/
			$Data['backgroundimage'] = $back_contact_image;
			$Data['status'] = 'Fail';
		}
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/*** Reservation ***/
	function easyapps_reservation_past_lists()
	{
		/** Application Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iUserId'] = $this->input->get('iUserId');
		
		/** iApplication Details **/
		if($Data['iApplicationId'] != '')
		{
			/** Reservation  LIST **/
			$details = $this->webservice_model->get_reservation_past_list($Data);
			
			/** Reservation Lists **/
			if(count($details) >0){
				/** details **/
				foreach($details as $val){
					$reservation[] = array(
						'iReservationId' => $val['iReservationId'],
						'iApplicationId' => $val['iApplicationId'],
						'iUserId' => $val['iUserId'],
						'iLocationId' => $val['iLocationId'],
						'iServiceId' => $val['iServiceId'],
						'vServicePrice' => $val['vServicePrice'],
						'vDate' => $val['vDate'],
						'vTime' => $val['vTime'],
						'vPrice' => $val['vPrice'],
						'vServiceName' => $val['vServiceName'],
						'vReservationFee' => $val['vReservationFee'],
						'vAddress1' => $val['vAddress1'],
						'vAddress2' => $val['vAddress2'],
           			);
				}
				
				/** reservation list **/
				$Data['reservation_list'] = $reservation;
				$Data['status'] = 'Success';
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			/** Reservation FAIL **/
			$Data['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}

	function sent_mail_admin_reservation($data)
	{
		$service_details = $this->webservice_model->get_service_te_details($data['iReservationId']);	
		$service_center = $this->webservice_model->get_service_center_details($data['iApplicationId']);
		$AppName = $this->webservice_model->get_application_name_details($data['iApplicationId']);
	
		/* client reservation */
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "mail.easyapps.fr";
		$config['smtp_port'] = "25";
		$config['smtp_user'] = "mail@easyapps.fr"; 
		$config['smtp_pass'] = "easyapps1@French";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		
		$html = '';
		$html .= '<p>Bonjour,</p>';
		$html .= '<p>Vous avez reçu une réservation de:</p>';
		$html .= '<p>Détail Client</p>';
		$html .= '<p>Nom : '.$data['vFirstname'].' '.$data['vLastName'].'</p>';
		$html .= '<p>Email : '.$data['vEmail'].'</p>';
		$html .= '<p>Téléphone : '.$data['iPhone'].'</p>';
		$html .= '<br /><br />';
		$html .= '<p>Détail Réservation: :</p>';

		$html .= '<p>Nom Service: '.$service_details['vServiceName'].'</p>';
		$html .= '<p>Prix: '.$service_details['vPrice'].'</p>';
		$html .= '<p>Date : '.$service_details['vDate'].'</p>';
		$html .= '<p>Heure : '.$service_details['vTime'].'</p>';
		$html .= '<p>Nombre de Personnes: 2</p>';
		$html .= '<p>Description: Welcome</p>';
		$html .= '<p>Remarque: My Review</p>';
		
		$html .= '<br /><br />';
		$html .= '<p>'.$AppName['tAppName'].'</p>';
	
		$ci->email->initialize($config);
		$ci->email->from('mail@easyapps.fr', 'easyapps');
		$ci->email->to($service_center['vAdminEmail']);
		$this->email->reply_to('mail@easyapps.fr', 'Explendid Videos');
		$ci->email->subject('Reservation');
		$ci->email->message($html);
		$ci->email->send();
		
		return true;
	}

	function sent_mail_client_reservation($data)
	{
		/* Sent mail */
		$service_details = $this->webservice_model->get_service_te_details($data['iReservationId']);	
		$service_center = $this->webservice_model->get_service_center_details($data['iApplicationId']);
		$AppName = $this->webservice_model->get_application_name_details($data['iApplicationId']);
	
		/* client reservation */
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "mail.easyapps.fr";
		$config['smtp_port'] = "25";
		$config['smtp_user'] = "mail@easyapps.fr"; 
		$config['smtp_pass'] = "easyapps1@French";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		
		$html = '';
		$html .= '<p>Bonjour,</p>';
		$html .= '<p>Votre Réservation a été envoyée au centre de service suivant:</p>';
		$html .= '<p>Détail Centre de Service</p>';
		$html .= '<p>Nom : '.$service_center['vServiceCenterName'].'</p>';
		$html .= '<p>Email : '.$service_center['vAdminEmail'].'</p>';
		$html .= '<p>Récapitulatif de la Réservation: '.$service_center['tDescription'].'</p>';
		$html .= '<br /><br />';
		$html .= '<p>Détail Réservation</p>';

		$html .= '<p>Nom Service: '.$service_details['vServiceName'].'</p>';
		$html .= '<p>Prix: '.$service_details['vPrice'].'</p>';
		$html .= '<p>Date : '.$service_details['vDate'].'</p>';
		$html .= '<p>Heure : '.$service_details['vTime'].'</p>';
		$html .= '<p>Nombre de Personnes: 2</p>';
		$html .= '<p>Description: Welcome</p>';
		$html .= '<p>Remarque: Review</p>';
		
		$html .= '<br /><br />';
		$html .= '<p>'.$AppName['tAppName'].'</p>';

		$ci->email->initialize($config);
		$ci->email->from('mail@easyapps.fr', 'easyapps');
		$ci->email->to($data['vEmail']);
		$this->email->reply_to('mail@easyapps.fr', 'Explendid Videos');
		$ci->email->subject('Reservation');
		$ci->email->message($html);
		$ci->email->send();
		
		return true;
	}
	
	/** Reservation Payment **/
	function easyapps_reservation_paypal()
	{	
		/** iApplicationId **/
		$data['iUserId'] = $this->input->get('iUserId');
		$data['iReservationId'] = $this->input->get('iReservationId');
		$data['iApplicationId'] = $this->input->get('iApplicationId');
		$data['tTransactionId'] = $this->input->get('iTransactionId');
		$data['tTransactinTime'] = $this->input->get('tTransactinTime');
		$data['fAmount'] = $this->input->get('fAmount');
		$data['vPaymentstatus'] = $this->input->get('vPaymentstatus');
		$data['vEmail'] = $this->input->get('vEmail');
		$data['vFirstname'] = $this->input->get('vFirstname');
		$data['vLastname'] = $this->input->get('vLastname');
		$data['iPhone'] = $this->input->get('iPhone');
		$data['vPaymenttype'] = $this->input->get('vPaymenttype');
		
		/** check **/
		if($data['iApplicationId'] != '')
		{
			/** ApplicationId **/
			$paypal_add = $this->webservice_model->insert_paypal_reservation_details($data);
			if($paypal_add){
				/** Transaction **/
				$reservation_mail = $this->sent_mail_admin_reservation($data);	
				/* client */
				$reservation_email = $this->sent_mail_client_reservation($data);
				/** paypal add **/
				$Data['Transaction'] = array('msg'=>'Transaction Successfully done !!');
				$Data['status'] = 'Success';
			}else{
				/** paypal **/
				$Data['status'] = 'Fail';
			}
		}else{
			/** paypal **/
			$Data['status'] = 'Fail';
		}	
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}
	
	/** Around us details **/
	function easyapps_aroundus_get()
	{
		/** Application Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		/** iApplication Details **/
		if($Data['iApplicationId'] != '')
		{
			/** Reservation  LIST **/
			$aroundus = $this->webservice_model->get_aroundus_list($Data);
			
			/** Around us details **/
			$around_us_details = $this->webservice_model->get_around_us_details($Data);
			
			/** Reservation Lists **/
			if(count($aroundus) >0){
				/** details **/
				foreach($aroundus as $val)
				{
					/** Find Distance **/
					$distance = $this->get_distance_value($val['iApplicationId'], $val['rLatitude'], $val['rLongitude'], $val['rDistanceType']);
				
					$aroundus_details[] = array(
						'rCatId'=>$val['rCatId'],
						'iApplicationId'=>$val['iApplicationId'],
						'iAppTabId'=>$val['iAppTabId'],
						'rCatName'=>$val['rCatName'],
						'rCatColor'=>$val['rCatColor'],
					);
				}
				
				/** Around us details **/
				if(count($around_us_details) >0){
					foreach($around_us_details as $val){
						$around_us[] = array(
							'rGeninfoId'=>$val['rGeninfoId'],
							'rCatId' => $val['rCatId'],
							'rName'=>$val['rName'],
							'rInformation'=>$val['rInformation'],
							'rWebsite'=>$val['rWebsite'],
							'rAddress1'=>$val['rAddress1'],
							'rAddress2'=>$val['rAddress2'],
							'rCity'=>$val['rCity'],
							'rState'=>$val['rState'],
							'rCountry'=>$val['rCountry'],
							'rZip'=> $val['rZip'],
							'rEmail'=> $val['rEmail'],
							'rTelephone'=> $val['rTelephone'],
							'rImage'=> $this->data['base_url'].'uploads/aroundus/'.$val['rGeninfoId'].'/'.$val['rImage'],
							'rLatitude'=> $val['rLatitude'],
							'rLongitude'=> $val['rLongitude'],
							'rDistanceType' => $val['rDistanceType'],
							'distance' => number_format($distance,2)
						);
					}
					$Data['Aroundus'] = $around_us;
				}
				
				/** reservation list **/
				$Data['Category'] = $aroundus_details;
				$Data['status'] = 'Success';
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			/** Reservation FAIL **/
			$Data['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	/** Distance **/
	function get_distance_value($iApplicationId, $rLat, $rLong, $rDistanceType)
	{
		/** get home lat long **/
		$home_latlong = $this->webservice_model->get_lat_long_home($iApplicationId);
		
		/** get distance **/
		return $get_distance = $this->distance($home_latlong['vLatitude'],$home_latlong['vLongitude'],$rLat,$rLong, $rDistanceType);
	}
	
	/** Find distance **/
	function distance($lat1, $lon1, $lat2, $lon2, $unit) 
	{
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);
	 
	  if ($unit == "km") {
	    return ($miles * 1.609344);
	  } else if ($unit == "mile") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}
	
	/** easyapps location get **/
	function easyapps_location_get()
	{
		/** Application Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** iApplication Details **/
		if($Data['iApplicationId'] != '')
		{
			/** Reservation  LIST **/
			$location = $this->webservice_model->get_location_list($Data);
			
			/** Reservation Lists **/
			if(count($location) >0){
				/** details **/
				foreach($location as $val)
				{
					/** Find Distance **/
					$aroundus_details[] = array(
						'iLocationId'=>$val['iLocationId'],
						'iApplicationId'=>$val['iApplicationId'],
						'iAppTabId'=>$val['iAppTabId'],
						'vWebsite'=>$val['vWebsite'],
						'vLocationTitle'=>$val['vLocationTitle'],
						'vEmail'=>$val['vEmail'],
						'vTelephone'=>$val['vTelephone'],
						'vAddress1'=>$val['vAddress1'],
						'vAddress2'=>$val['vAddress2'],
						'vCity'=>$val['vCity'],
						'vState'=>$val['vState'],
						'vZip'=>$val['vZip'],
						'vLatitude'=>$val['vLatitude'],
						'vLongitude'=>$val['vLongitude'],
					);
				}
				
				$background_image = $this->webservice_model->get_location_background_image($Data);
				if(count($background_image) >0){
					$back_location_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
					/** event **/
					$Data['backgroundimage'] = $back_location_image;
				}else{
					/** back rss image **/
					$back_location_image = array('vImage'=>'');
					/** event **/
					$Data['backgroundimage'] = $back_location_image;
				}
				
				/** reservation list **/
				$Data['Aroundus_category'] = $aroundus_details;
				$Data['status'] = 'Success';
			}else{
				$Data['status'] = 'Fail';
			}
		}else{
			/** Reservation FAIL **/
			$Data['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	function get_format_of_show_tabs($features)
	{	
		$all_tabs='';
		$all_tabs.='{"Demo":';
		$all_tabs.='[';
		foreach($features as $val)
		{
			/** Tabname **/
			if($val['Tabname'] == 'Home')
			{
				$all_tabs .= '{"xtype": "homeview","title": "'.$val['vTitle'].'","layout": "fit","tabCls": "icnhomeTab","iconCls": "homeCls","iconMask": true},';
			}else if($val['Tabname'] == 'Event'){
				$all_tabs .= '{"xtype": "eventnavi","title": "'.$val['vTitle'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
			}else if($val['Tabname'] == 'Mailinglist'){
				$all_tabs .= '{"xtype": "mailinglistview","title": "'.$val['vTitle'].'","tabCls":"mailinglistTab","iconCls": "mailinglistCls","iconMask": true},';
			}else if($val['Tabname'] == 'PDF'){
				$all_tabs .= '{"xtype": "pdfnavi","title": "'.$val['vTitle'].'","tabCls": "pdfTab","iconCls": "pdfCls","iconMask": true},';
			}else if($val['Tabname'] == 'RSS Feeds'){
				$all_tabs .= '{"xtype": "rssnavi","title":"'.$val['vTitle'].'","tabCls":"rssTab","iconCls":"rssCls","iconMask":true},';
			}else if($val['Tabname'] == 'Website'){
				$all_tabs .= '{"xtype": "websitenavi","title": "'.$val['vTitle'].'","tabCls": "websiteTab","iconCls": "websiteCls","iconMask": true},';
			}else if($val['Tabname'] == 'YouTube'){
				$all_tabs .= '{"xtype": "youtubenavi","title": "'.$val['vTitle'].'","tabCls": "youtubeTab","iconCls": "youtubeCls","iconMask": true},';
			}else if($val['Tabname'] == 'Location'){
				$all_tabs .= '{"xtype": "locationnavi","title": "'.$val['vTitle'].'","tabCls": "locationTab","iconCls": "locationCls","iconMask": true},';
			}else if($val['Tabname'] == 'Gallery'){
				$all_tabs .= '{"xtype": "gallarynaviview","title": "'.$val['vTitle'].'","tabCls": "gallaryTab","iconCls": "gallaryCls","iconMask": true},';
			}else if($val['Tabname'] == 'Around Us'){
				$all_tabs .= '{"xtype": "arroundnavi","title": "'.$val['vTitle'].'","tabCls": "arroundusTab","iconCls": "arroundusCls","iconMask": true},';
			}else if($val['Tabname'] == 'SocialMedia'){
				$all_tabs .= '{"xtype": "socialmediaview","title": "'.$val['vTitle'].'","layout": "fit","tabCls": "socialsiteTab","iconCls": "socialsiteCls","iconMask": true},';
			}else if($val['Tabname'] == 'QrCode'){
				$all_tabs .= '{"xtype": "qrnavi","title": "'.$val['vTitle'].'","tabCls": "qrTab","iconCls": "qrCls","iconMask": true},';
			}else if($val['Tabname'] == 'Custom'){
				$all_tabs .= '{"xtype": "customview","title": "'.$val['vTitle'].'","layout": "fit","tabCls": "customTab","iconCls": "customCls","iconMask": true},';
			}else if($val['Tabname'] == 'Menu'){
				$all_tabs .= '{"xtype": "menunavi","title": "'.$val['vTitle'].'","tabCls": "menuTab","iconCls": "menuCls","iconMask": true},';
			}else if($val['Tabname'] == 'Order'){
				$all_tabs .= '{"xtype": "ordernavi","title": "'.$val['vTitle'].'","tabCls": "orderTab","iconCls": "orderCls","iconMask": true},';
			}else if($val['Tabname'] == 'Reservation'){
				$all_tabs .= '{"xtype": "reservationnavi","title": "'.$val['vTitle'].'","tabCls": "reservationTab","iconCls": "reservationCls","iconMask": true},';
			}else if($val['Tabname'] == 'Loyalty'){
				$all_tabs .= '{"xtype": "loyalitinavi","title": "'.$val['vTitle'].'","tabCls": "loyalityTab","iconCls": "LoyalityCls","iconMask": true},';
			}else if($val['Tabname'] == 'Notepad'){
				$all_tabs .= '{"xtype": "notepadnavi","title": "'.$val['vTitle'].'","tabCls": "eventTab","iconCls": "eventCls","iconMask": true},';
			}else if($val['Tabname'] == 'Voice Recording'){
				$all_tabs .= '{"xtype": "voicerecording","title": "'.$val['vTitle'].'","tabCls": "voicerecordingTab","iconCls": "voicerecordingCls","iconMask": true},';
			}else if($val['Tabname'] == 'News'){
				$all_tabs .= '{"xtype": "newsnavi","title": "'.$val['vTitle'].'","tabCls": "menuTab","iconCls": "menuCls","iconMask": true},';
			}else if($val['Tabname'] == 'ContactUs'){
				$all_tabs .= '{"xtype": "contactview","title": "'.$val['vTitle'].'","tabCls": "contactTab","iconCls": "contactCls","iconMask": true},';
			}else if($val['Tabname'] == 'Message'){
				$all_tabs .= '{"xtype": "messageview","title": "'.$val['vTitle'].'","tabCls": "messageTab","iconCls": "messageCls","iconMask": true},';
			}
		}
		
		/** remove comma from string **/
		$tabs .= rtrim($all_tabs,",");
		$result .= $tabs.'],"status":"Success"}';
		
		return $result;
	}
	
	/** Function showing number of tabs **/
	function easyapps_total_show_tabs($iApplicationId='')
	{
		/** ApplicationId Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		/** check **/
		if($Data['iApplicationId'] != '')
		{
			/** get features of application **/
			$features = $this->webservice_model->get_features_order_application($Data);
			
			/** Features **/
			if(count($features) > 0){
				/** home details **/
				$home_details = $this->get_format_of_show_tabs($features);
			}else{
				/** Details **/
				$home_details = '{"iApplicationId":"'.$Data['iApplicationId'].'","status":"Fail"}';
			} 
		}else{
			/** Details **/
			$Data['status'] = "Fail";
		}
		
		echo $home_details;
		exit;
	}
	
	/** Total show tabs **/
	function easyapps_total_show_tabs_details()
	{
		/** ApplicationId Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		/** check **/
		if($Data['iApplicationId'] != '')
		{
			/** get features of application **/
			$features = $this->webservice_model->get_features_application($Data);

			
			/** Features **/
			if(count($features) > 0)
			{
				/** total show tabs **/
				foreach($features as $val){
					$features_details[] = array(
						'iAppTabId'=>$val['iAppTabId'],
						'iApplicationId'=>$val['iApplicationId'],
						'iFeatureId'=>$val['iFeatureId'],
						'iIconId'=>$val['iIconId'],
						'iIconcolorId'=>$val['iIconcolorId'],
						'eCustom'=>$val['eCustom'],
						'vTitle'=>$val['vTitle'],
						'vImage'=>$val['vImage'],
						'eActive'=>$val['eActive'],
						'dCreatedDate'=>$val['dCreatedDate'],
						'dModifiedDate'=>$val['dModifiedDate'],
						'Tabname'=>$val['Tabname'],
						'iTabIconImage' => $this->data['base_url'].'uploads/tab_icon/1/'.$val['vImage']
					);
				}
			
				/** Details **/
				$Data['features_details'] = $features_details;
				$Data['status'] = "Success";
			}else{
				/** Details **/
				$Data['status'] = "Fail";
			} 
		}else{
			/** Details **/
			$Data['status'] = "Fail";
		}
			
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}
	
	
	/** Mail chimp **/
	function easyapps_mailchimp_subscription()
	{
		/** mailchimp subcription **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		if($this->input->get('iApplicationId') && $this->input->get('email') && $this->input->get('name')){
            $data = $this->webservice_model->checkNewsLetter($Data['vEmail'], $Data['iApplicationId']);
            if($data){
                $result = 'Exist';
            }else{
                $iApplicationId = $this->input->get('iApplicationId');
                $vEmail = $this->input->get('email');
				$name = $this->input->get('name');
                $status = $this->add_subscribe_list_mailchimp($iApplicationId, $vEmail, $name);
          		if($status)
                    $Data['status'] = 'Success';
                else{
                    $Data['status'] = 'Fail';
                }
            }
        }else{
             $Data['status'] = 'Fail';
        }
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	 }
	
	
	 /** Add subscribe list mailchimp **/	
     function add_subscribe_list_mailchimp($iApplicationId, $email, $name) 
	 {
        $mailchimp_info = $this->webservice_model->get_mailchimp_details($iApplicationId);
        
		if(count($mailchimp_info) >0){
			$apikey = $mailchimp_info['vApikey'];
			$listid = $mailchimp_info['vListid'];
	    	return $status = $this->send_mailch_list_mailchimp($apikey,$email,$listid, $name);
		}else{
			return 0;
		}
     }

	 /** sebd mailchimp list **/
     function send_mailch_list_mailchimp($apikey,$email,$listid, $name)
	 {
		/** config apikey in mailchimp **/
        $config = array(
            'apikey' => $apikey, // Insert your api key
            'secure' => FALSE // Optional (defaults to FALSE)
        );
        
        ini_set('display_errors',1);
        include('Mailchimp.php');
        $MailChimp = new MailChimp($apikey);
        $result = $MailChimp->call('lists/subscribe', array(
                        'id'                => $listid,
                        'email'             => array( 'email' => $email ),
                        'merge_vars'        => array( 'FNAME' => $name ),
                        'double_optin'      => false,
                        'update_existing'   => true,
                        'replace_interests' => false,
                        'send_welcome'      => true
                    ));
					
        return "Success";
    }
	
	/** Menu of the Day **/
	function easyapps_menuofthe_day()
	{
		/** mailchimp subcription **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		if($Data['iApplicationId'] != '')
		{
            $menu_day = $this->webservice_model->menuoftheday($Data);
			
      		/*	currency  */
			$vCurrency = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);
			if($vCurrency['vCurrency'] == 'EUR'){$vCurrency='&euro;';}else if($vCurrency['vCurrency'] == 'USD'){$vCurrency='$';}else{$vCurrency='&euro;';}
           
            if($menu_day){
                /** total show tabs **/
				foreach($menu_day as $val){
					/* item size details */
					$temp_size = $this->webservice_model->get_item_size_option($val);
	                
				    /* item option details */
	                $temp_options = $this->webservice_model->get_item_option_option($val);	

	                /* menu title */
					$menuTitle = $this->webservice_model->get_menutitle_name($val['iMenuId']);

					$size_cat = array();
					foreach($temp_size as $sval){
						$size_cat[] = array(
							'iSizeId'=>$sval['iSizeId'],
							'iItemId'=>$sval['iItemId'],
							'vSizeName'=>$sval['vSizeName'],
							'fPrice'=>number_format($sval['fPrice'],2,'.',''),	
						);	
					}

					$option_cat = array();
					foreach($temp_options as $oval){
						$option_cat[] = array(
							'iOptionId'=>$oval['iOptionId'],
							'iItemId'=>$oval['iItemId'],
							'fCharge'=>number_format($oval['fCharge'],2,'.',''),
							'vOptName'=>$oval['vOptName'],	
						);	
					}

					$Menu_day_details[] = array(
						'iItemId'=>$val['iItemId'],
						'iAppTabId'=>$val['iAppTabId'],
						'iApplicationId'=>$val['iApplicationId'],
						'iMenuId'=>$val['iMenuId'],
						'vItemName'=>$val['vItemName'],
						'vVarient'=>$val['vVarient'],
						'tDescription'=>$val['tDescription'],
						'fPrice'=>number_format($val['fPrice'],2,'.',''),
						'vImage'=>$this->data['base_url'].'uploads/Item/'.$val['iItemId'].'/'.$val['vImage'],
						'vCurrency' => '&euro;',
						'eStatus'=>$val['eStatus'],
						'sizes'=>$size_cat,
                        'options'=>$option_cat,
					);
				}
			
				/* category details */	
				if(count($Menu_day_details) > 0)
				{
					$result['text'] = "Categories";
					$result['items'] = $Menu_day_details;
					$result['status'] = 'Success';
				}else{
					$result['text'] = "Categories";
					$result['status'] = 'Fail';
				} 
            }else{
                $result['status'] = 'Fail';
            }
        }else{
             $result['status'] = 'Fail';
        }
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($result);
        echo $callback . $main;
        exit;
	}
	
	/** Push notification details **/
	function easyapps_pushnotification_save()
	{
		/** ApplicationId **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['vDeviceid'] = $this->input->get('vDeviceid');
		$Data['vDevicename'] = $this->input->get('vDevicename');
		$Data['vVerifiedNumber'] = $this->input->get('vVerifiedNumber');
		$Data['vToken'] = $this->input->get('vToken');
		$Data['vType'] = $this->input->get('vType');
		$Data['ePushNotification'] = $this->input->get('ePushNotification');
		$Data['eStatus'] = $this->input->get('eStatus');
		
		/** Data Details **/
		if(count($Data) >0){
			/** check device token **/
			$Device = $this->webservice_model->check_device_token($Data);
			
			if(count($Device) == 0){
				/** Save Records **/
				$push = $this->webservice_model->save_pushnotification($Data);
				
				if($push){
					$msg['iUserId'] = $push;
					$msg['status'] = 'Success';
				}else{
					$msg['status'] = 'Fail';
				}
			}else{
				$msg['iUserId'] = $Device['iUserId'];
				$msg['status'] = 'Success';
			}
		}else{
			$msg['status'] = 'Fail';
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/* callback */
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        
        $main = json_encode($msg);
        echo $callback . $main;
        exit;
	}


	/**
		Arrival webservice
	**/
	function easyapps_arrival_details()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** get the arrival details **/
		if($Data['iApplicationId'] != '')
		{
			/** get the order history **/
			$arrival_history = $this->webservice_model->get_arrival_history_details($Data);
			
			foreach($arrival_history as $val)
			{
				$arrival[] = array(
					'iArrivalId' => $val['iArrivalId'],
					'iApplicationId' => $val['iApplicationId'],
					'vArrivalName' => $val['vArrivalName'],
					'vArrivalImage' => $this->data['base_url'].'uploads/arrival/'.$val['iArrivalId'].'/'.$val['vArrivalImage'],
					'tDescription' => $val['tDescription']
				);
			}
			
			/** background image **/
			$background_image = $this->webservice_model->get_arrival_background_image($Data);
			if(count($background_image) >0){
				$back_arrival_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
				/** event **/
				$Data['backgroundimage'] = $back_arrival_image;
			}else{
				/** back rss image **/
				$back_arrival_image = array('vImage'=>'');
				/** event **/
				$Data['backgroundimage'] = $back_arrival_image;
			}

			if(count($arrival_history) >0){
				/** Success **/
				$Data['arrival'] = $arrival;
				$Data['Status'] = "Success";			
			}else{
				/** Fail **/
				$Data['Status'] = "Fail";
			}	
		}else{
				$Data['Status'] = "Fail";			
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($Data);
        echo $callback . $main;
        exit;	
	}

	/**
		Catalogue webservice
	**/
	function easyapps_catalogue_details()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		if($Data['iApplicationId'] != '')
		{
			/** get the order history **/
			$catalogue_history = $this->webservice_model->get_catalogue_history_details($Data);

			/* get currency	*/
			$vCurrency = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);

			if($vCurrency['vCurrency'] == 'EUR'){
				$vCurrency = '&euro;';
			}else if($vCurrency['vCurrency'] == 'USD'){
				$vCurrency = '$';
			}else{
				$vCurrency = $vCurrency['vCurrency'];
			}

			/** catalogue history **/			
			foreach($catalogue_history as $val)
			{
				$size_details = $this->webservice_model->get_catalogue_size_details($val['iCatelogueId']);	

				$size = array();
				foreach($size_details as $key=>$vals){
					$size[] = "Portion :" .$vals['vSizeName'].', <br /> Prix: '.number_format($vals['fSizePrice'],2,'.','').' '.$vCurrency;
					$size_details[$key]['fSizePrice'] = number_format($size_details[$key]['fSizePrice'],2,'.','');
				}	

				$catalogue_details[] = array(
					'iCatelogueId' => $val['iCatelogueId'],
					'vCatalogueTagname' => $val['vCatalogueTagname'],
					'tDescription' => $val['tDescription'],
					'vCurrency' => $vCurrency,
					'tTotalProduct' => $val['tTotalProduct'],
					'vCatalogueImage' => $this->data['base_url'].'uploads/catalogue/'.$val['iCatelogueId'].'/'.$val['vCatalogueImage'],
					'size' => $size_details,
					'vSize' => implode(',',$size)
				);	
			}

			/** background image **/
			$background_image = $this->webservice_model->get_catalogue_background_image($Data);
			if(count($background_image) >0){
				$back_catalogue_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
				/** event **/
				$Data['backgroundimage'] = $back_catalogue_image;
			}else{
				/** back rss image **/
				$back_catalogue_image = array('vImage'=>'');
				/** event **/
				$Data['backgroundimage'] = $back_catalogue_image;
			}

			/** count catalogue history **/
			if(count($catalogue_history) >0)
			{
				/** catalogue details **/
				$Data['catalogue_details'] = $catalogue_details;
				$Data['status'] = "success";
			}else{
				/** Status **/
				$Data['status'] = "fail";
			}
		}else{
			/** Status **/
			$Data['status'] = "fail";
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}

	/**
		testonomial webservice
	**/
	function easyapps_testonomial_details()
	{
		/** testonomial **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');

		if($Data['iApplicationId'] != ''){
		
		/** get the order history **/
		$testonomial_history = $this->webservice_model->get_testonomial_history_details($Data);
		
		/** catalogue history **/			
		foreach($testonomial_history as $val)
		{
			$testonomial_details[] = array(
				'iTestonomialId' => $val['iTestonomialId'],
				'iTestonomialName' => $val['iTestonomialName'],
				'tDescription' => $val['tDescription'],
			);	
		}
		
		/** count catalogue history **/
		if(count($testonomial_history) >0){
			/** catalogue details **/
			$Data['testomonial_details'] = $testonomial_details;
			$Data['Status'] = "Success";
		}else{
			/** Status **/
			$Data['Status'] = "Fail";
		}
		}else{
			/** Status **/
			$Data['Status'] = "Fail";
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
	        $callback = '';
	        if (isset($_REQUEST['callback']))
	        {
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
	        }
		
	        $main = json_encode($Data);
	        echo $callback . $main;
	        exit;
	}

	/**
		Order History
	**/
	function easyapps_order_history_get()
	{
		/** Get Application ID **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iUserId'] = $this->input->get('iUserId');
		
		/** get the order history **/
		$order_history = $this->webservice_model->get_order_history_details($Data);
		
		/** order history **/
		if(count($order_history) > 0)
		{
			/** total show tabs **/
			foreach($order_history as $val){
				$order_history_details[] = array(
					'iApplicationId'=>$val['iApplicationId'],
					'iOrderId' =>$val['iOrderId'],
					'vItemName' =>$val['vItemName'],
					'vVarient' =>$val['vVarient'],
					'vQuantity' =>$val['vQuantity'],
					'tDescription' =>$val['tDescription'],
					'vInstruction' =>$val['vInstruction'],
					'fPrice' =>$val['fPrice'],
					'vImage' =>$this->data['base_url'].'uploads/Item/'.$val['iItemId'].'/'.$val['vImage'],
				);
			}
			
			/** Details **/
			$Data['order_history_details'] = $order_history_details;
			$Data['status'] = "Success";
		}else{
			/** Details **/
			$Data['status'] = "Fail";
		} 
	
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
	        $callback = '';
	        if (isset($_REQUEST['callback']))
	        {
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
	        }
	
	        $main = json_encode($Data);
	        echo $callback . $main;
	        exit;
	}

	/**
		Easyapps Donations Details
		Description : Describe easyapps details	
	**/ 
	function easyapps_donation_details()
	{
		/** easyapps donation details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['vTransactionId'] = $this->input->get('vTransactionId');
		$Data['vName'] = $this->input->get('vName');
		$Data['vCurrencyCode'] = $this->input->get('vCurrencyCode');
		$Data['fAmount'] = $this->input->get('fAmount');
		$Data['tDateTime'] = $this->input->get('tDateTime');
		$Data['vPaymentstatus'] = $this->input->get('vPaymentstatus');

		/** Application **/
		if($Data['iApplicationId'] != ''){
			/** save donation details **/
			$insert_donation = $this->webservice_model->insert_donation_details($Data);	

			if($insert_donation){
				/** status **/
				$msg['donation'] = $insert_donation;
				$msg['Status'] = 'Success';
			}else{
				/** status **/
				$msg['Status'] = 'Fail';
			}
		}else{
			/** status **/
			$Data['Status'] = 'Fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($msg);
        echo $callback . $main;
        exit;
	}

	/** Quotation Details **/
	function easyapps_quotation_details()
	{
		/** easyapps donation details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['vQuotationName'] = $this->input->get('vQuotationName');
		$Data['vQuotationemail'] = $this->input->get('vQuotationemail');
		$Data['vQuotationNumber'] = $this->input->get('vQuotationNumber');
		$Data['vQuotationComment'] = $this->input->get('vQuotationComment');

		/** Application **/
		if($Data['iApplicationId'] != ''){
			/** save donation details **/
			$insert_quotation = $this->webservice_model->insert_quotation_details($Data);	

			if($insert_quotation){
				/** status **/
				$msg['quotation'] = $insert_quotation;
				$msg['Status'] = 'Success';
			}else{
				/** status **/
				$msg['Status'] = 'Fail';
			}
		}else{
			/** status **/
			$Data['Status'] = 'Fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
	        $callback = '';
	        if (isset($_REQUEST['callback']))
	        {
		    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
	        }
		
	        $main = json_encode($msg);
	        echo $callback . $main;
	        exit;
	}

	/** Appointment details get **/	
	function easyapps_appointment_details()
	{
		/** Application Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');

		/** check details **/
		if($Data['iApplicationId'] != '')
		{
			/** get application details **/
			$appointment_details = $this->webservice_model->get_appointment_details($Data);

			/** appointment details **/			
			if(count($appointment_details) >0)
			{
				$appoints = array(
					'iAppoitmentId'=>$appointment_details['iAppoitmentId'],
					'eStatus'=>$appointment_details['eStatus'],
				);
		
				/** appointment **/
				$Data['appointment'] = $appoints;	
				$Data['status'] = 'success';	
			}else{
				/** status **/
				$Data['status'] = 'fail';
			}
		}else{
			/** status **/
			$Data['status'] = 'fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
	        $callback = '';
	        if (isset($_REQUEST['callback']))
	        {
		    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
	        }
		
	        $main = json_encode($Data);
	        echo $callback . $main;
	        exit;
	}

	/** testonomial add **/
	function easyapps_testomonial_add()
	{
		/*** iApplicationId ***/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iTestonomialName'] = $this->input->get('iTestonomialName');
		$Data['tDescription'] = $this->input->get('tDescription');
		
		/** check details **/
		if($Data['iApplicationId'] != ''){
			/** review add **/
			$iTestonomailId = $this->webservice_model->insert_testomonial_details($Data);

			/** Review Details **/
			if($iTestonomailId){
				/** get review details **/
				$msg['TestonomailId'] = $iTestonomailId;
				$msg['status'] = "success";	
			}else{
				/** fail **/
				$msg['status'] = "fail";	
			}
		}else{
			/** review fail **/
			$msg['status'] = "fail";	
		}	

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($msg);
        echo $callback . $main;
        exit;
	}

	/** review add **/
	function easyapps_review_add()
	{
		/*** iApplicationId ***/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iReviewName'] = $this->input->get('iReviewName');
		$Data['tDescription'] = $this->input->get('tDescription');
		
		/** check details **/
		if($Data['iApplicationId'] != ''){
			/** review add **/
			$iReviewId = $this->webservice_model->insert_review_details($Data);

			/** Review Details **/
			if($iReviewId){
				/** get review details **/
				$msg['Review'] = $iReviewId;
				$msg['status'] = "success";	
			}else{
				/** fail **/
				$msg['status'] = "fail";	
			}
		}else{
			/** review fail **/
			$msg['status'] = "fail";	
		}	

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($msg);
        echo $callback . $main;
        exit;
	}

	/** Appoitment **/
	function easyapps_appoitment_details()
	{
		/** easyapps donation details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppoitmentDate'] = $this->input->get('iAppoitmentDate');
		$Data['vAppoitmentTime'] = $this->input->get('vAppoitmentTime');
		$Data['vAppoitmentName'] = $this->input->get('vAppoitmentName');
		$Data['vEmail'] = $this->input->get('vEmail');
		$Data['vPhone'] = $this->input->get('vPhone');
		$Data['vRemark'] = $this->input->get('vRemark');
		
		/** Application **/
		if($Data['iApplicationId'] != ''){
			/** save appointment details **/
			$insert_appointment = $this->webservice_model->insert_appoitment_details($Data);	
			
			/** insert appointment **/
			if($insert_appointment){
				/** status **/
				$msg['appointment'] = $insert_appointment;
				$msg['Status'] = 'Success';
			}else{
				/** status **/
				$msg['Status'] = 'Fail';
			}
		}else{
			/** status **/
			$Data['Status'] = 'Fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($msg);
        echo $callback . $main;
        exit;
	}

	/** ticket information **/
	function easyapps_ticket_details()
	{
		/** Application Details **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');

		/** check details **/
		if($Data['iApplicationId'] != '')
		{
			/** get application details **/
			$ticket_details = $this->webservice_model->get_ticket_details($Data);
			
			/** appointment details **/			
			if(count($ticket_details) >0)
			{
				/** ticket detalis **/
				foreach($ticket_details as $val)
				{
					$tickets[] = array(
						'iTicketId'=>$val['iTicketId'],
						'iTicketType'=>$val['iTicketType'],
						'iTotalTicket'=>$val['iTotalTicket'],
						'vShowDate'=>$val['vShowDate'],
						'vShowTiming'=>$val['vShowTiming'],
						'fTicketPrice'=>$val['fTicketPrice']
					);
				}

				/** background image **/
				$background_image = $this->webservice_model->get_ticket_background_image($Data);
				if(count($background_image) >0){
					$back_ticket_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
				
					/** event **/
					$Data['backgroundimage'] = $back_ticket_image;
				}else{
					/** back rss image **/
					$back_ticket_image = array('vImage'=>'');
				
					/** event **/
					$Data['backgroundimage'] = $back_ticket_image;
				}
					

				/** appointment **/
				$Data['ticket'] = $tickets;	
				$Data['status'] = 'success';	
			}else{
				/** status **/
				$Data['status'] = 'fail';
			}
		}else{
			/** status **/
			$Data['status'] = 'fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
	        $callback = '';
	        if (isset($_REQUEST['callback']))
	        {
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
	        }
		
	        $main = json_encode($Data);
	        echo $callback . $main;
	        exit;
	}

	/** ecommerse search **/
	function easyapps_ecommerce_search()
	{
		/*** Application Details ***/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['key'] = $this->input->get('key');

		/** check details **/
		if($Data['iApplicationId'] != '')
		{
			/** get application details **/
			$ecommerse_details = $this->webservice_model->get_ecommerse_search_details($Data);

			/** vCurrency Details **/
			$vCurrency = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);
			
			/*
				Currency
			*/
			if($vCurrency['vCurrency'] == 'EUR'){
				$vCurrency = '&euro;';
			}else if($vCurrency['vCurrency'] == 'USD'){
				$vCurrency = '$';
			}else{
				$vCurrency = $vCurrency['vCurrency'];
			}

			/** appointment details **/			
			if(count($ecommerse_details) >0)
			{
				/** ticket detalis **/
				foreach($ecommerse_details as $val)
				{
					/** size and all details **/
					$catalogue_size_details = $this->webservice_model->get_ecommerse_size_details($val['iCatelogueId']);	

					/* size details */	
					$size = array();
					$count = 0;
					foreach($catalogue_size_details as $vals){
						//$size[] = "Portion :" .$vals['vSizeName'].', <br/> Prix: '.number_format($vals['fSizePrice'],2,'.','').' '.$vCurrency;
						$size[] = $vals['vSizeName'];
						$count++;
					}	

					/*	Ecommerse details */
					$ecommerse[] = array(
						'iCatelogueId'=>$val['iCatelogueId'],
						'vCatalogueTagname'=>$val['vCatalogueTagname'],
						'iCatalogueType'=>$val['iCatalogueType'],
						'vCatalogueImage'=>$this->data['base_url'].'uploads/catalogue/'.$val['iCatelogueId'].'/'.$val['vCatalogueImage'],
						'tDescription'=>$val['tDescription'],
						'tTotalProduct'=>$val['tTotalProduct'],
						'vCurrency'=>$vCurrency,
						'size_details'=>$catalogue_size_details,
						'vSize'=>implode(',',$size),
						'vCount'=>$count
					);
				}
					
				/** appointment **/
				$Data['search_result'] = $ecommerse;	
				$Data['status'] = 'success';	
			}else{
				/** status **/
				$Data['status'] = 'fail';
			}
		}else{
			/** status **/
			$Data['status'] = 'fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
	        $callback = '';
	        if (isset($_REQUEST['callback']))
	        {
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
	        }
		
	        $main = json_encode($Data);
	        echo $callback . $main;
	        exit;
	}

	/** Add the details of ecommerse paypal **/
	function easyapps_ecommerse_paypal_payment()
	{
		/** easyapps ecommerse paypal payment **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');		
		$Data['vTransactionId'] = $this->input->get('vTransactionId');
		$Data['iUserId'] = $this->input->get('iUserId');
		$Data['iCatalogueId'] = $this->input->get('iCatalogueId');
		$Data['vDateTime'] = $this->input->get('vDateTime');
		$Data['iTotalProduct'] = $this->input->get('iTotalProduct');
		$Data['fTotalPrice'] = $this->input->get('fTotalPrice');
		$Data['vPaymentStatus'] = $this->input->get('vPaymentStatus');
	
		/** ApplicationId **/
		if($Data['iApplicationId'] != '')
		{
			/** Application details **/	
			$insert_payment = $this->webservice_model->insert_ecommerce_payment($Data);	
			
			/** check status **/
			if($insert_payment){
				/** insert payment **/
				$msg['ecommerce_payment'] = $insert_payment;
				$msg['status'] = 'success';
			}else{
				/** fail status **/
				$Data['status'] = 'fail';
			}
		}else{
			$Data['status'] = 'fail';	
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($msg);
        echo $callback . $main;
        exit;	
	}
	
	/** easyapps item sizeopt details **/
	function easyapps_item_sizeopt_details()
	{
		/** ApplicationId **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iItemId'] = $this->input->get('iItemId');

		/** check details **/
		if($Data['iApplicationId'] != '')
		{
			/** get item size details **/
			$item_size_details = $this->webservice_model->get_item_size_option($Data);
			
			/** get item option details **/
			$item_option_details = $this->webservice_model->get_item_option_option($Data);

			$vCurrency = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);
			
			if($vCurrency['vCurrency'] == 'EUR'){
				$vCur = '&euro;';
			}else if($vCurrency['vCurrency'] == 'USD'){
				$vCur = '$';
			}else{
				$vCur = $vCurrency;
			}
			
			/** appointment details **/			
			if(count($item_size_details) >0)
			{
				/** ticket detalis **/
				foreach($item_size_details as $val)
				{
					$size[] = array(
						'iSizeId'=>$val['iSizeId'],
						'iItemId'=>$val['iItemId'],
						'vSizeName'=>$val['vSizeName'],
						'fPrice'=>number_format($val['fPrice'],2,'.',''),	
						'vCurrency' => $vCur
					);
				}

				/** ticket detalis **/
				foreach($item_option_details as $val1)
				{
					$option[] = array(
						'vOptName'=>$val1['vOptName'],
						'fCharge'=>number_format($val1['fCharge'],2,'.',''),
						'vCurrency' => $vCur
					);
				}
					
				/** appointment **/
				$Data['item_size'] = $size;	
				$Data['item_option'] = $option;	
				$Data['status'] = 'success';	
			}else{
				/** status **/
				$Data['status'] = 'fail';
			}
		}else{
			/** status **/
			$Data['status'] = 'fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}	


	/** easyapps service details **/
	function easyapps_service_details()
	{
		/** ApplicationId **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/** check details **/
		if($Data['iApplicationId'] != '')
		{
			/** get application details **/
			$service_details = $this->webservice_model->get_service_details($Data);

			/** order details **/
			$vCurrency = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);

			/** vCurrency **/
			if($vCurrency['vCurrency'] == 'EUR'){
				$vCurr = '&euro;';
			}else if($vCurrency['vCurrency'] == 'USD'){
				$vCurr = '&euro;';
			}else{
				$vCurr = $vCurrency['vCurrency'];
			}

			/** appointment details **/			
			if(count($service_details) >0)
			{
				/** ticket detalis **/
				foreach($service_details as $val)
				{
					/** service timing details **/
					$service_timing = $this->webservice_model->get_service_timing($val['iServiceId']);

					$service[] = array(
						'iServiceId'=>$val['iServiceId'],
						'vServiceName'=>$val['vServiceName'],
						'fServiceFee'=>$val['fServiceFee'],
						'tDescription'=>$val['tDescription'],
						'vMaxService'=>$val['vMaxService'],
						'vDuration'=>$val['vDuration'],
						'vServiceFees' => number_format($val['fServiceFee'],2,'.',''),
						'vCurrency' => $vCurr,
						'vImage'=> $val['vImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/service/'.$val['iServiceId'].'/'.$val['vImage'],
						'service_timing'=>$get_service_timing
					);
				}

				/** background image **/
				$background_image = $this->webservice_model->get_service_background_image($Data);
				if(count($background_image) >0){
					$back_service_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
					/** event **/
					$Data['backgroundimage'] = $back_service_image;
				}else{
					/** back rss image **/
					$back_service_image = array('vImage'=>'');
					/** event **/
					$Data['backgroundimage'] = $back_service_image;
				}
					
				/** appointment **/
				$Data['service'] = $service;	
				$Data['status'] = 'success';	
			}else{
				/** status **/
				$Data['status'] = 'fail';
			}
		}else{
			/** status **/
			$Data['status'] = 'fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}

	/** blog details **/
	function easyapps_blog_details()
	{
		/** ApplicationId **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');

		/** check details **/
		if($Data['iApplicationId'] != '')
		{
			/** get application details **/
			$blog_details = $this->webservice_model->get_blog_details($Data);

			/** appointment details **/			
			if(count($blog_details) >0)
			{
				/** ticket detalis **/
				foreach($blog_details as $val)
				{
					$blog[] = array(
						'iBlogId'=>$val['iBlogId'],
						'iApplicationId'=>$val['iApplicationId'],
						'iAppTabId'=>$val['iAppTabId'],
						'vBlogTitle'=>$val['vBlogTitle'],
						'vBlogUrl'=>$val['vBlogUrl'],
						'eStatus'=>$val['eStatus'],
					);
				}

				/** background image **/
				$background_image = $this->webservice_model->get_blog_background_image($Data);
				if(count($background_image) >0){
					$back_blog_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
				
					/** event **/
					$Data['backgroundimage'] = $back_blog_image;
				}else{
					/** back rss image **/
					$back_blog_image = array('vImage'=>'');
					/** event **/
					$Data['backgroundimage'] = $back_blog_image;
				}
					
				/** appointment **/
				$Data['blog'] = $blog;	
				$Data['status'] = 'success';	
			}else{
				/** status **/
				$Data['status'] = 'fail';
			}
		}else{
			/** status **/
			$Data['status'] = 'fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($Data);
        echo $callback . $main;
        exit;
	}


	/*	Easyapps New order save  details   */
	function easyapps_new_order_details()
	{
		/*	iApplicationId 	*/
		$Data['iApplicationId'] = $this->input->post('iApplicationId');
		$Data['iUserId'] = $this->input->post('iUserId');
		$cart = $this->input->post('cart');	

		/* convert Json into array */
		$catalogue_cart = $this->convert_json_array($cart);

		if(count($catalogue_cart) >0){
			foreach($catalogue_cart as $val){
				$cat =  (array) $val;
				$insert = $this->webservice_model->easyapps_new_order_details($cat,$Data);
			}
			if($insert){
				$result['status'] = "success";
			}else{
				$result['status'] = "fail";
			}
		}else{
			$result['status'] = "fail";
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($result);
        echo $callback . $main;
        exit;
	}
	/* End of function */

	/* convert json to array */
	function convert_json_array($cart)
	{
			$test = preg_replace('/.+?({.+}).+/','$1',$cart); 
			$new = '['.$test.']';
			return $result = json_decode($new,TRUE);
	}
	
	/*	Easyapps catalogue order details   */
	function easyapps_catalogue_order_details()
	{
		/*	iApplicationId 	*/
		$Data['iApplicationId'] = $this->input->post('iApplicationId');
		$Data['iUserId'] = $this->input->post('iUserId');
		$cart = $this->input->post('cart');	

		/* convert Json into array */
		$catalogue_cart = $this->convert_json_array($cart);

		if(count($catalogue_cart) >0){
			foreach($catalogue_cart as $val){
				$cat =  (array) $val;
				$insert = $this->webservice_model->easyapps_catalogue_order_details($cat,$Data);
			}
			if($insert){
				$result['status'] = "success";
			}else{
				$result['status'] = "fail";
			}
		}else{
			$result['status'] = "fail";
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($result);
        echo $callback . $main;
        exit;
	}

	/* Toulese easyapps bridge */
	function tousles_easyapps_bridge()
	{
        header('Content-type: application/json');
        $data = file_get_contents('php://input');
        $data = json_decode($data);
        $pass = uniqid();
        $e_pass = md5($pass);

        $total_pay = $data->total_pay;
        $admin['vFirstName'] = $data->vFirstName;
        $admin['vLastName'] = $data->vLastName;
        $admin['vEmail'] = $data->vEmail;
        $admin['vPassword'] = $e_pass;
        $admin['eStatus'] = 'Active';
        $admin['iRoleId'] = '2';

        if($total_pay == "390"){
            $admin['vPackages'] = 'bronze';
        }else{
            $admin['vPackages'] = 'silver';
        }

        $admin['packagename'] = 'Restaurant';
        $admin['penny'] = '8.9';

        $iAdminId = $this->webservice_model->tous_administrator($admin);

        $package['vTransactoinId'] = $data->vTransactoinId;
        $package['iAdminId'] = $iAdminId;
        if($total_pay == "390") {
            $package['vPackage'] = 'bronze';
        }else{
            $package['vPackage'] = 'silver';
        } 
        $package['vFirstName'] = $data->vFirstName;
        $package['vLastName'] = $data->vLastName;
        $package['fAmt'] = '8.9';
        $package['vCategoryId'] = '1';
        $package['eStatus'] = 'Success';

        $this->webservice_model->tous_packages_value_paypal($package);

        $this->load->library('email');
        $this->email->initialize(array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'carateamltd@gmail.com',
            'smtp_pass' => 'nopass',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        ));

        $body = 'Bonjour,<br /><br />Veuillez trouver vos coordonnées de connexion à la plateforme de création des applications mobiles <a href="http://www.easyapps.fr">www.easyapps.fr</a> <br /><br /><b>Nom d’utilisateur : </b>'.$data->vEmail.'<br /><b>Mot de passe : </b>'.$pass.'<br /><br /><br /> Merci, <br />L’équipe touslesrestos.fr';
        $this->email->from('info@touslesrestos.fr', 'Touslesrestos.fr');
        $this->email->to($data->vEmail);
        $this->email->subject('Coordonnées Easyapps.fr Application Mobile');
        $this->email->message($body);
        $this->email->send();
        $email = $this->email->print_debugger();

        $response['iClientId'] = $iAdminId;
        $response['message'] = 'Success';
        /** email **/

        echo json_encode($response);
        if(isset($email))
        {
            return true;
        }else{
            return false;
        }
    }

    /* Edit Catalogue product details */
	function easyapps_catalogue_product()
	{
		/* Sub category id */
		$Data['iCatalogueSubId'] = $this->input->get('cat_id');

		/*	get all product catalogue category	*/
		$productcategory = $this->webservice_model->get_all_catalogue_product_details($Data);
		
		/** product details **/
		$product = array();
		foreach($productcategory as $val)
		{
			/*	Sizes Details */
			$productsize = $this->webservice_model->get_size_catalogue_details($val['iCatelogueId']);
			/* Option Details */
			$productoption = $this->webservice_model->get_option_catalogue_details($val['iCatelogueId']);

			/* sizes */
			$sizedetails = array();
			foreach($productsize as $sizeval)
			{
				$sizedetails[] = array(
					'iSizeId'=> $sizeval['iSizeId'],
					'text'=> $sizeval['vSizeName'],
					'vSizeColor'=> $sizeval['vSizeColor'],
					'fSizePrice'=> number_format($sizeval['fSizePrice'],2,'.',''),
					'eSizeStatus'=> $sizeval['eSizeStatus']	
				);	
			}

			/* options */
			$optiondetails = array();
			foreach($productoption as $sizeval)
			{
				$optiondetails[] = array(
					'iOptionId'=> $sizeval['iOptionId'],
					'text'=> $sizeval['vOptionName'],
					'fOptionPrice'=> number_format($sizeval['fOptionPrice'],2,'.',''),
					'eOptionStatus'=> $sizeval['eOptionStatus']
				);	
			}

			/** product **/
			$product[] = array(
				'iCatelogueId' => $val['iCatelogueId'],
				'text' => $val['vCatalogueTagname'],
				'vImage' => $val['vCatalogueImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/catalogueitem/'.$val['iCatelogueId'].'/'.$val['vCatalogueImage'],
				'tDescription' => $val['tDescription'],
				'tTotalProduct' => $val['tTotalProduct'],
				'vCurrency' =>  number_format($vCurrency,2,'.',''),
				'vCurrencyCode'=>'&euro;',
				'eStatus' => $val['eStatus'],
				'sizes' => $sizedetails,
				'option' => $optiondetails
			);
		}

		/*	Get all categories	*/
		if(count($productcategory) >0)
		{
			$result['text'] = "Catagories";
			$result['items'] = $product;
			$result['status'] = 'Success';
		}else{
			$result['text'] = "Catagories";
			$result['status'] = 'fail';
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($result);
	    echo $callback . $main;
        exit;	
	}

	/* Edit Catalogue Details */
	function easyapps_catalogue_category()
	{
		/* ApplicationId */
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iAppTabId'] = $this->input->get('iAppTabId');
		/*	Get all Category and it's sub category	*/
		$maincategory = $this->webservice_model->get_all_catalogue_main_category($Data);	

		/*	Maincategory details */
		$category = array();
		foreach($maincategory as $val)
		{
			/*	get all subcategory	*/
			$subcategory = $this->webservice_model->get_all_subcategory_catalogue($val['iCatalogueMainId']);	
			
			/** subcategory **/
			$subcat = array();
			foreach($subcategory as $subval){
				$subcat[] = array(
					'cat_id' => $subval['iCatalogueSubId'],
					'text' => $subval['vCatalogueSubName'],
					'vImage' => $subval['vImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/cataloguesub/'.$subval['iCatalogueSubId'].'/'.$subval['vImage'],
					'leaf' => true,
				);
			}

			/* category */
			$category[] = array(
				'iCatalogueMainId' => $val['iCatalogueMainId'],
				'vImage' => $val['vImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/cataloguemain/'.$val['iCatalogueMainId'].'/'.$val['vImage'],
				'text' => $val['vCatalogueName'],
				'items' => $subcat
			);
		}
		
		$background_image = $this->webservice_model->get_catalogue_background_image($Data);
		if(count($background_image) >0){
			$back_catalogue_image = array('backgroundimage' => $this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/org_'.$background_image['vImage']);
			/** event **/
			$result['backgroundimage'] = $back_catalogue_image;
		}else{
			/** back rss image **/
			$back_catalogue_image = array('vImage'=>'');
			/** event **/
			$result['backgroundimage'] = $back_catalogue_image;
		}

		/*	Get all categories	*/
		if(count($maincategory) > 0)
		{
			$result['text'] = "Catagories";
			$result['items'] = $category;
			$result['status'] = 'Success';
		}else{
			$result['text'] = "Catagories";
			$result['status'] = 'Fail';
		} 

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($result);
	    echo $callback . $main;
        exit;
	}

	function easyapps_item_get()
	{
		/** iApplication Id **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iMenuId'] = $this->input->get('iMenuId');
		
		if($Data['iApplicationId'] != ''){
			/** iApplicationId **/
			$get_item_category = $this->webservice_model->get_item_category($Data);
			
			/** get item category **/
			if(count($get_item_category) >0)
			{
				foreach($get_item_category as $val)
				{
					/* item size details */
					$temp_size = $this->webservice_model->get_item_size_option($val);
	                
				    /* item option details */
	                $temp_options = $this->webservice_model->get_item_option_option($val);	

	                /* menu title */
					$menuTitle = $this->webservice_model->get_menutitle_name($val['iMenuId']);
					
					if($val['vCurrency'] == 'EUR'){
						$currency = '&euro;';
					}else if($val['vCurrency'] == 'USD'){
						$currency = '$';
					}else{
						$currency = '&euro;';
					}

					$size_cat = array();
					foreach($temp_size as $sval){
						$size_cat[] = array(
							'iSizeId'=>$sval['iSizeId'],
							'iItemId'=>$sval['iItemId'],
							'vSizeName'=>$sval['vSizeName'],
							'fPrice'=>number_format($sval['fPrice'],2,'.',''),	
						);	
					}

					$option_cat = array();
					foreach($temp_options as $oval){
						$option_cat[] = array(
							'iOptionId'=>$oval['iOptionId'],
							'iItemId'=>$oval['iItemId'],
							'fCharge'=>number_format($oval['fCharge'],2,'.',''),
							'vOptName'=>$oval['vOptName'],	
						);	
					}

					/** menu **/
					$category[] = array(
						'iItemId'=>$val['iItemId'],
						'iAppTabId'=>$val['iAppTabId'],
						'iApplicationId'=>$val['iApplicationId'],
						'iMenuId'=>$val['iMenuId'],
						'vImage'=> $val['vImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/Item/'.$val['iItemId'].'/'.$val['vImage'],
						'vVarient'=>$val['vVarient'],
						'text'=>$val['vItemName'],
						'tDescription'=>$val['tDescription'],
						'fPrice'=>number_format((float)$val['fPrice'], 2, '.', ''),
						'eStatus'=>$val['eStatus'],
						'vCurrency' => $currency,
						'sizes'=>$size_cat,
                        'options'=>$option_cat,
                	);
				} 

				/* category details */	
				if(count($category) > 0)
				{
					$result['text'] = "Categories";
					$result['items'] = $category;
					$result['status'] = 'Success';
				}else{
					$result['text'] = "Categories";
					$result['status'] = 'Fail';
				} 
			
				/** background image **/
				$background_image = $this->webservice_model->get_category_bg_image($Data);
				if(count($background_image) > 0){
					/** background image **/
					$category_bg = array(
						'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/'.'org_'.$background_image['vImage'],
					);
					
					/** loyalty bg image **/
					$Data['background'] = $category_bg;
					$Data['status'] = 'Success';
				}else{
					$category_bg = array('vImage'=>'');
					
					/** loyalty bg image **/
					$Data['background'] = $category_bg;
					$Data['status'] = 'fail';
				}
			
				/** status **/
				$result['status'] = "Success";	
			}else{
				$result['status'] = "fail";
			}
		}else{
			$result['status'] = "fail";
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        
        $callback = '';
		if (isset($_REQUEST['callback']))
		{
		    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		
		$main = json_encode($result);
		echo $callback . $main;
		exit;	
	}


	/** get order category list **/
	function easyapp_menu_category()
	{
		/** iApplication Id **/
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		
		if($Data['iApplicationId'] != '')
		{
			/** iApplicationId **/
			$get_menu_categories = $this->webservice_model->get_menu_category($Data);
			
			if(count($get_menu_categories) >0)
			{
				foreach($get_menu_categories as $val){
					/** menu **/
					$category[] = array(
						'iMenuID'=>$val['iMenuID'],
						'iApplicationId'=>$val['iApplicationId'],
						'iAppTabId'=>$val['iAppTabId'],
						'text'=>$val['vName'],
						'vImage'=> $val['vImage'] == "" ? $this->config->item('empty_image_app') : $this->data['base_url'].'uploads/Menu/'.$val['iMenuID'].'/'.$val['vImage'],
						'vStatus'=>$val['vStatus']
					);
				}
				
				/** category **/
				if(count($category) > 0)
				{
					$result['text'] = 'Categories';
					$result['items'] = $category;
					$result['status'] = 'Success';
				}else{
					$result['text'] = "Categories";
					$result['status'] = 'Fail';
				} 
				
				/** background image **/
				$background_image = $this->webservice_model->get_category_bg_image($Data);
				
				/* background image */
				if(count($background_image) > 0){
					/** background image **/
					$category_bg = array(
						'vImage'=>$this->data['base_url'].'uploads/background_image/'.$background_image['iBackgroundId'].'/'.'org_'.$background_image['vImage'],
					);
					
					/** loyalty bg image **/
					$Data['background'] = $category_bg;
					$Data['status'] = 'Success';
				}else{
					$category_bg = array('vImage'=>'');
					
					/** loyalty bg image **/
					$Data['background'] = $category_bg;
					$Data['status'] = 'fail';
				}
				$Data['status'] = "Success";	
			}else{
				$result['status'] = "fail";
			}
		}else{
			$result['status'] = "fail";
		}
		
		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($result);
        echo $callback . $main;
        exit;	
	}

	/* 
		insert customer details for order 
	*/
//	function easyapps_order_customer_details()
//	{
//		$Data['iApplicationId'] = $this->input->get('iApplicationId');
//		$Data['iUserId'] = $this->input->get('iUserId');
//		$Data['vName'] = $this->input->get('vName');
//		$Data['tEmail'] = $this->input->get('tEmail');
//		$Data['vCity'] = $this->input->get('vCity');
//		$Data['vPhone'] = $this->input->get('vPhone');
//		$Data['vPincode'] = $this->input->get('vPincode');
//		$Data['tAddress'] = $this->input->get('vAddress');
//
//		/* save customer details */
//		if(count($Data) >0){
//			/* save */
//			$insert = $this->webservice_model->save_customer_order_details($Data);	

//			if($insert){
//				$this->send_order_client_mail($Data['vEmailId']);
// 				$this->send_order_admin_mail($Data['vEmailId']);
//
//				/* update into order table */ 
//				$this->webservice_model->update_new_order_table($insert,$Data);
//
//				$result['customer_id'] = $insert;
//				$result['status'] = "success";
//			}else{
//				$result['status'] = "fail";
//			}
//		}else{
//			$result['status'] = "fail";	
//		}
//
//		/** easyapp gallery details **/
//		header('Content-type: application/json');
//		header('Access-Control-Allow-Origin: *');
//		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
//		
//		/** Callback Request **/
//        $callback = '';
//        if (isset($_REQUEST['callback']))
//       {
//	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
//        }
//	
//        $main = json_encode($result);
//	    echo $callback . $main;
//        exit;
// 	}	

	//-- New function 
	function easyapps_order_customer_details()
	{
		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iUserId'] = $this->input->get('iUserId');
		$Data['vName'] = $this->input->get('vName');
		$Data['tEmail'] = $this->input->get('vEmailId');
		$Data['vCity'] = $this->input->get('vCity');
		$Data['vPhone'] = $this->input->get('vPhone');
		$Data['vPincode'] = $this->input->get('vPincode');
		$Data['tAddress'] = $this->input->get('vAddress');
		
		$orderSummary = json_decode($this->input->get('orderSummary'));
		$cartItems = json_decode($this->input->get('cartItems'));
		$orderSummary =  (array) $orderSummary;
		$cartItems =  (array) $cartItems;

		/* save customer details */
		if(count($Data) >0){
			/* save */
			$insert = $this->webservice_model->save_customer_order_details($Data);	
			
			if($insert){
				//getting Application details
				$appDetails = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);
				$appOwnerEmail = $appDetails['vEmail'];
				
				$emailData['applicationName'] = $appDetails['tAppName'];
				$emailData['clientName'] = $Data['vName'];
				$emailData['clientEmail'] = $Data['tEmail'];
				$emailData['orderType'] = $orderSummary['orderType'];
				$emailData['clientAddress'] = $Data['tAddress'];
				$emailData['clientCity'] = $Data['vCity'];
				$emailData['clientPinCode'] = $Data['vPincode'];
				$emailData['deliverydate'] = $orderSummary['deliverydate'];
				$emailData['tel'] = $orderSummary['tel'];
				$emailData['apartmentNo'] = $orderSummary['apartmentNo'];
				$emailData['strNo'] = $orderSummary['strNo'];
				$emailData['remarks'] = $orderSummary['remarks'];
				$emailData['deliverytime'] = $orderSummary['deliverytime'];
				$emailData['cartItems'] = $cartItems;
				
				//send order email to client and cutomer
				$result['emailClient'] = $this->send_order_detail_email($Data['tEmail'],$appOwnerEmail,$emailData);//$this->send_order_client_mail($Data['tEmail']);
 				$result['emailAdmin'] = $this->send_order_detail_email($appOwnerEmail,$Data['tEmail'],$emailData);//$this->send_order_admin_mail($Data['tEmail']);

				/* update into order table */ 
				$this->webservice_model->update_new_order_table($insert,$Data);

				$result['customer_id'] = $insert;
				$result['status'] = "success";
			}else{
				$result['status'] = "fail";
			}
		}else{
			$result['status'] = "fail";	
		}

		// easyapp gallery details 
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		// Callback Request 
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($result);
	    echo $callback . $main;
        exit;
 	}

	/* insert customer details for catalogue order */
	function easyapps_catalogue_customer_details()
	{
		// $Data['iApplicationId'] = $this->input->get('iApplicationId');
// 		$Data['iUserId'] = $this->input->get('iUserId');
// 		$Data['vName'] = $this->input->get('vName');
// 		$Data['vEmailId'] = $this->input->get('vEmailId');
// 		$Data['vCity'] = $this->input->get('vCity');
// 		$Data['vState'] = $this->input->get('vState');
// 		$Data['vPincode'] = $this->input->get('vPincode');
// 		$Data['vAddress'] = $this->input->get('vAddress');
// 
// 		if(count($Data) >0){
// 			/* save */
// 			$insert = $this->webservice_model->save_customer_catalogue_details($Data);	
// 
// 			if($insert){
// 				$this->send_order_client_mail($Data['vEmailId']);
//  				$this->send_order_admin_mail($Data['vEmailId']);
// 
// 				/* update into order table */ 
// 				$this->webservice_model->update_customer_order_table($insert,$Data);
// 
// 				/* customer order */
// 				$result['customer_id'] = $insert;
// 				$result['status'] = "success";
// 			}else{
// 				$result['status'] = "fail";
// 			}
// 		}else{
// 			$result['status'] = "fail";	
// 		}
// 
// 		/** easyapp gallery details **/
// 		header('Content-type: application/json');
// 		header('Access-Control-Allow-Origin: *');
// 		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// 		
// 		/** Callback Request **/
//         $callback = '';
//         if (isset($_REQUEST['callback']))
//         {
// 	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
//         }
// 	
//         $main = json_encode($result);
// 	    echo $callback . $main;
//         exit;

		$Data['iApplicationId'] = $this->input->get('iApplicationId');
		$Data['iUserId'] = $this->input->get('iUserId');
		$Data['vName'] = $this->input->get('vName');
		$Data['vEmailId'] = $this->input->get('vEmailId');
		$Data['vCity'] = $this->input->get('vCity');
		$Data['vState'] = '';
		//$Data['vPhone'] = $this->input->get('vPhone');
		$Data['vPincode'] = $this->input->get('vPincode');
		$Data['vAddress'] = $this->input->get('vAddress');
		
		$orderSummary = json_decode($this->input->get('orderSummary'));
		$cartItems = json_decode($this->input->get('cartItems'));
		$orderSummary =  (array) $orderSummary;
		$cartItems =  (array) $cartItems;

		if(count($Data) >0){
			/* save */
			$insert = $this->webservice_model->save_customer_catalogue_details($Data);	

			if($insert){
				//getting Application details
				$appDetails = $this->webservice_model->get_currency_for_order_details($Data['iApplicationId']);
				$appOwnerEmail = $appDetails['vEmail'];
				
				$emailData['applicationName'] = $appDetails['tAppName'];
				$emailData['clientName'] = $Data['vName'];
				$emailData['clientEmail'] = $Data['vEmailId'];
				$emailData['orderType'] = $orderSummary['orderType'];
				$emailData['clientAddress'] = $Data['tAddress'];
				$emailData['clientCity'] = $Data['vCity'];
				$emailData['clientPinCode'] = $Data['vPincode'];
				$emailData['deliverydate'] = $orderSummary['deliverydate'];
				$emailData['tel'] = $orderSummary['tel'];
				$emailData['apartmentNo'] = $orderSummary['apartmentNo'];
				$emailData['strNo'] = $orderSummary['strNo'];
				$emailData['remarks'] = $orderSummary['remarks'];
				$emailData['deliverytime'] = $orderSummary['deliverytime'];
				$emailData['cartItems'] = $cartItems;
				
				//send order email to client and cutomer
				$result['emailClient'] = $this->send_order_detail_email($Data['vEmailId'],$appOwnerEmail,$emailData);//$this->send_order_client_mail($Data['tEmail']);
 				$result['emailAdmin'] = $this->send_order_detail_email($appOwnerEmail,$Data['vEmailId'],$emailData);//$this->send_order_admin_mail($Data['tEmail']);

				/* update into order table */ 
				$this->webservice_model->update_customer_order_table($insert,$Data);

				/* customer order */
				$result['customer_id'] = $insert;
				$result['status'] = "success";
			}else{
				$result['status'] = "fail";
			}
		}else{
			$result['status'] = "fail";	
		}

		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($result);
	    echo $callback . $main;
        exit;

 	}

 	//-- Function for sending order email
 	public function send_order_detail_email($toEmail,$fromEmail,$emailData)
 	{
 		$this->load->model('admin_model', '', TRUE);
		$lang= 'rFrench';//$this->session->userdata('language'); // to set default language as french (temporary)
		$email_text = $this->admin_model->get_language_details($lang);
		
		$ci = get_instance();
		$ci->load->library('email');
		// $config['protocol'] = "smtp";
// 		$config['smtp_host'] = "ssl://smtp.gmail.com";
// 		$config['smtp_port'] = "465";//"25";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		//-- Email Data
			$applicationName 			= $emailData['applicationName'];
			$clientName 				= $emailData['clientName'];
			$clientEmail 				= $emailData['clientEmail'];
			$clientAddress 				= $emailData['clientAddress'];
			$clientCity 				= $emailData['clientCity'];
			$clientPinCode 				= $emailData['clientPinCode'];
			$orderType 					= $emailData['orderType'];
			$deliverydate 				= $emailData['deliverydate'];
			$tel 						= $emailData['tel'];
			$apartmentNo 				= $emailData['apartmentNo'];
			$strNo						= $emailData['strNo'];
			$remarks					= $emailData['remarks'];
			$deliverytime 				= $emailData['deliverytime'];
			$cartItems					= $emailData['cartItems'];
//print_r($emailData['cartItems']);
			 //'Home delivery/take-away'
			$totalAmount		= 0;
		
		$html = '';
		$html .= '<p><strong>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'App Name'){
				$html.=$val['rField'];
			}
		}
		$html .= ': </strong>'.$applicationName.'</p>';
		$html .= '<p>';
		$html .= '<strong>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Client Information'){
				$html.=$val['rField'];
			}
		}
		$html .='<strong><br />';
		$html .= '<table>';
		$html .= '<tr><td>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Name'){
				$html.=$val['rField'];
			}
		}
		$html .=': </td><td>'.$clientName.'</td></tr>';
		$html .= '<tr><td>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Email'){
				$html.=$val['rField'];
			}
		}
		$html .=': </td><td>'.$clientEmail.'</td></tr>';
		$html .= '<tr><td>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Phone'){
				$html.=$val['rField'];
			}
		}
		$html .=': </td><td>'.$tel.'</td></tr>';
		$html .= '</table>';
		$html .= '<p><strong>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Order Type'){
				$html.=$val['rField'];
			}
		}
		$html .=': </strong>'.$orderType;
		if($orderType=="Home Delivery")
		{
			$html .= '<br /><table>';
			$html .= '<tr><td>';
			foreach($email_text as $val){
				if($val['rLabelName'] == 'Address'){
					$html.=$val['rField'];
				}
			}
			$html .= ': </td><td>'.$apartmentNo.", ".$strNo.", ".$clientAddress.'</td></tr>';
			$html .= '<tr><td>';
			foreach($email_text as $val){
				if($val['rLabelName'] == 'City'){
					$html.=$val['rField'];
				}
			}
			$html .=': </td><td>'.$clientCity.'</td></tr>';
			$html .= '<tr><td>';
			foreach($email_text as $val){
				if($val['rLabelName'] == 'Zipcode'){
					$html.=$val['rField'];
				}
			}
			$html .= ': </td><td>'.$clientPinCode.'</td></tr>';
			$html .= '<tr><td>';
			foreach($email_text as $val){
				if($val['rLabelName'] == 'Delivery Date'){
					$html.=$val['rField'];
				}
			}
			$html .= ': </td><td>'.$deliverydate." ".$deliverytime.'</td></tr>';
			$html .= '<tr><td>';
			foreach($email_text as $val){
				if($val['rLabelName'] == 'Remarks'){
					$html.=$val['rField'];
				}
			}
			$html .= ': </td><td>'.$remarks.'</td></tr>';
			$html .= '</table>';
		}
		else
		{
			$html .= '<br /><table>';
			$html .= '<tr><td>';
			foreach($email_text as $val){
				if($val['rLabelName'] == 'Delivery Date'){
					$html.=$val['rField'];
				}
			}
			$html .= ': </td><td>'.$deliverydate." ".$deliverytime.'</td></tr>';
			$html .= '<tr><td>';
			foreach($email_text as $val){
				if($val['rLabelName'] == 'Remarks'){
					$html.=$val['rField'];
				}
			}
			$html .= ': </td><td>'.$remarks.'</td></tr>';
			$html .= '</table>';
		}
		$html .= '</p>';
		
		$html .= '<p><strong>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Order Details'){
				$html.=$val['rField'];
			}
		}
		$html .= ': </strong></p>';
		$html .= '<table style="width:100%;background: #FFF;color: #000;">';
  		$html .= '<tr>';
      	$html .= '<th style="text-align:center;border:1px solid #000;padding: 4px;">';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Article Name'){
				$html.=$val['rField'];
			}
		}
		$html .= '</th>';
      	$html .= '<th style="text-align:center;border:1px solid #000;padding: 4px;">';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Quantity'){
				$html.=$val['rField'];
			}
		}
		$html .= '</th>';
      	$html .= '<th style="text-align:center;border:1px solid #000;padding: 4px;">';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Unit Price'){
				$html.=$val['rField'];
			}
		}
		$html .= '</th>';
      	$html .= '<th style="text-align:center;border:1px solid #000;padding: 4px;">';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Subtotal'){
				$html.=$val['rField'];
			}
		}
		$html .= '</th>';
    	$html .= '</tr>';
    	
    	//--- Loop Starts Here
    	for($i=0; $i<count($cartItems);$i++)
    	{
    		$currentCartItem = (array) $cartItems[$i];
    		$itemArray = (array) $currentCartItem['sizes'][0];
    		//print_r($itemArray);
    		$itemName = $itemArray['text'];
    		$itemPrice = $itemArray['fSizePrice'];
    		$itemQuantity = $currentCartItem['selectedQty'];
    		$itemCurrencyName = $currentCartItem['vCurrencyCode'];
    		$itemSubTotal = ($itemPrice*$itemQuantity);
    		$totalAmount = $totalAmount+$itemSubTotal;
    		$html .= '<tr>';
	      	$html .= '<td style="text-align:center;border:1px solid #000;padding: 4px;">';
	      	$html .= '<span style="width: 96%;background: #fff;display: block;padding: 2%;border: 1px solid #DED4D4;">'.$itemName.'</span>';
	      	if($currentCartItem['selectedOption']!='')
	      	{
	      		$optionArray = (array) $currentCartItem['option'][0];
	      		$optionName = $optionArray['text'];
	      		$optionQuantity = $itemQuantity;
	      		$optionPrice = $optionArray['fOptionPrice'];
	      		$optionSubTotal = ($optionPrice*$optionQuantity);
	      		$totalAmount = $totalAmount+$optionSubTotal;
	      		$html .= '<span style="width: 96%;background: #fff;display: block;padding: 2%;border: 1px solid #DED4D4;">'.$optionName.'</span>';
	      	}
	      	$html .= '</td>';
	      	$html .= '<td style="text-align:center;border:1px solid #000;padding: 4px;">'.$itemQuantity;
	      	if($currentCartItem['selectedOption']!='')
	      	{
	      		$html .= '<br />'.$optionQuantity;
	      	}
	      	$html .= '</td>';
	      	$html .= '<td style="text-align:center;border:1px solid #000;padding: 4px;">'.$itemCurrencyName." ".number_format($itemPrice, 2, '.', '');
	      	if($currentCartItem['selectedOption']!='')
	      	{
	      		$html .= '<br />'.$itemCurrencyName." ".number_format($optionPrice, 2, '.', '');
	      	}
	      	$html .= '</td>';
	      	$html .= '<td style="text-align:center;border:1px solid #000;padding: 4px;">'.$itemCurrencyName." ".number_format($itemSubTotal, 2, '.', '');
	      	if($currentCartItem['selectedOption']!='')
	      	{
	      		$html .= '<br />'.$itemCurrencyName." ".number_format($optionSubTotal, 2, '.', '');
	      	}
	      	$html .= '</td>';
	    	$html .= '</tr>';
    	}
    	//-- Loop Ends Here

    	$html .= '<tr>';
      	$html .= '<td colspan="3"></td>';
      	$html .= '<td style="color: #F00;"><strong>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Total Amount'){
				$html.=$val['rField'];
			}
		}
		$html .= ': </strong>'.$itemCurrencyName." ".number_format($totalAmount, 2, '.', '').'</td>';
    	$html .= '</tr>';
		$html .= '</table>';
		foreach($email_text as $val){
			if($val['rLabelName'] == 'Thank You'){
				$html.=$val['rField'];
			}
		}

		$ci->email->initialize($config);
		$ci->email->from($fromEmail, $applicationName."-EasyApps");
		$ci->email->to($toEmail);
		$this->email->reply_to($fromEmail, $applicationName);
		$ci->email->subject('Reservation');
		$ci->email->message($html);
		$result = $ci->email->send();
		return $result;
		//return true;
 	}

 	public function send_order_client_mail($vEmail)
 	{
		/*		client reservation		*/
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "mail.easyapps.fr";
		$config['smtp_port'] = "25";
		$config['smtp_user'] = "mail@easyapps.fr"; 
		$config['smtp_pass'] = "easyapps1@French";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		
		$html = '';
		$html .= '<p>Bonjour,</p>';
		$html .= '<p>Client mail</p>';
	//	$html .= '<p>Votre Réservation a été envoyée au centre de service suivant:</p>';
	
		$ci->email->initialize($config);
		$ci->email->from('mail@easyapps.fr', 'easyapps');
		$ci->email->to($vEmail);
		$this->email->reply_to('mail@easyapps.fr', 'Explendid Videos');
		$ci->email->subject('Reservation');
		$ci->email->message($html);
		$ci->email->send();
		
		return true;
 	}

 	public function send_order_admin_mail($vEmail){
 		/*	Admin 	*/
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "mail.easyapps.fr";
		$config['smtp_port'] = "25";
		$config['smtp_user'] = "mail@easyapps.fr"; 
		$config['smtp_pass'] = "easyapps1@French";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		
		$html = '';
		$html .= '<p>Bonjour,</p>';
		$html .= '<p>Admin Mail</p>';
	//	$html .= '<p>Votre Réservation a été envoyée au centre de service suivant:</p>';
	
		$ci->email->initialize($config);
		$ci->email->from('mail@easyapps.fr', 'easyapps');
		$ci->email->to($vEmail);
		$this->email->reply_to('mail@easyapps.fr', 'Explendid Videos');
		$ci->email->subject('Reservation');
		$ci->email->message($html);
		$ci->email->send();
		
		return true;
 	}

 	/* Easyapps order paypal details */
 	public function easyapps_order_paypal_details()
 	{
 		/* catalogue paypal transaction	*/
 		$Data['iTransactionId'] = $this->input->get('iTransactionId');
 		$Data['iUserId'] = $this->input->get('iUserId');
 		$Data['iApplicationId'] = $this->input->get('iApplicationId');
 		$Data['vFirstName'] = $this->input->get('vFirstName');
 		$Data['vLastName'] = $this->input->get('vLastName');
 	
 		if(count($Data) >0)
 		{
 			/* save easyaspps catalogue	*/	
 			$insert = $this->webservice_model->insert_order_paypal($Data);

 			/* insert Data */
 			if($insert){
 				$results['Status'] = 'success';
 			}else{
 				/* Fail */
				$result['Status'] = 'fail';
 			}
 		}else{
 			/* Fail */
 			$result['Status'] = 'fail';	
 		}

 		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        $callback = '';
        if (isset($_REQUEST['callback']))
        {
	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
	
        $main = json_encode($results);
	    echo $callback . $main;
        exit;
 	}	

 	/*
 		Easyapps catalogue paypal details
 	*/
 	public function easyapps_catalogue_paypal_details()
 	{
 		/* catalogue paypal transaction	*/
 		$Data['iTransactionId'] = $this->input->post('iTransactionId');
 		$Data['iUserId'] = $this->input->post('iUserId');
 		$Data['iApplicationId'] = $this->input->post('iApplicationId');
 		$Data['vFirstName'] = $this->input->post('vFirstName');
 		$Data['vLastName'] = $this->input->post('vLastName');
 		$Data['eStatus'] = $this->input->post('eStatus');
 		$Data['tDateTime'] = date();
 	
 		if(count($Data) >0)
 		{
 			/* save easyaspps catalogue	*/	
 			$insert = $this->webservice_model->insert_catalogue_paypal($Data);
			/* insert Data */
 			if($insert){
 				$result['Status'] = "success";
 			}else{
 				/* Fail */
				$result['Status'] = 'fail';
 			}
 		}else{
 			/* Fail */
 			$result['Status'] = 'fail';	
 		}

 		/** easyapp gallery details **/
		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		
		/** Callback Request **/
        // $callback = '';
//         if (isset($_REQUEST['callback']))
//         {
// 	    	$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
//         }
	
        echo json_encode($result);
	    //echo $callback . $main;
        exit;
 	}

 	public function easyapps_get_clients_paypal_info()
 	{
 		$appId = $this->input->post('appId'); //-- Application ID

 		//-- Getting App Details from Application ID
 		$appDetails = $this->webservice_model->get_currency_for_order_details($appId);

 		//-- Getting Client ID from Database
		$iClientID = $appDetails['iClientId'];

 		if($iClientID)
 		{
 			//-- Getting Paypal Client ID from iClientID
 			$getData = $this->webservice_model->get_clients_paypal_info($iClientID);
			if($getData){
 				$result['Status'] = "success";
 				$result['clientID'] = $getData;
 			}else{
 				/* Fail */
				$result['Status'] = 'fail';
				$result['clientID'] = '';
 			}
 		}
 		else
 		{
 			$result['Status'] = 'fail';
 			$result['clientID'] = '';	
 		}

 		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		echo json_encode($result);
        exit;
 	}
 	
 	public function easyapps_get_clients_currency()
 	{
 		$appId = $this->input->post('appId'); //-- Application ID
 		if($appId)
 		{
 			$appDetails = $this->webservice_model->get_currency_for_order_details($appId);
 			if($appDetails){
 				$result['Status'] = "success";
 				$result['currencyCode'] = $appDetails['vCurrency'];
 			}else{
 				/* Fail */
				$result['Status'] = 'fail';
				$result['currencyCode'] = '';
 			}
 		}
 		else
 		{
 			$result['Status'] = 'fail';
 			$result['currencyCode'] = '';
 		}
 		
 		header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		echo json_encode($result);
        exit;
 	}
 	
 	//--- get Application Tab Order
    function get_app_tab_id()
    {
    	$appId = $this->input->get('appId'); //-- Application ID
    	if($appId)
    	{
    		$tabOrder = $this->webservice_model->get_app_tab_id($appId);
    		if($tabOrder)
    		{
    			$result['Status'] = 'success';
 				$result['tabOrder'] = $tabOrder;
    		}
    		else
    		{
    			$result['Status'] = 'fail';
 				$result['tabOrder'] = '';
    		}
    	}
    	else
    	{
    		$result['Status'] = 'fail';
 			$result['tabOrder'] = '';
    	}
    	
    	header('Content-type: application/json');
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		echo json_encode($result);
        exit;
    }
}
?>