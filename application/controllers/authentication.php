<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends MY_Controller
{
	    function __construct()
	    {
		parent::__construct();
	
		$this->load->model('admin_model', '', TRUE);
		$this->load->model('loginlogs_model', '', TRUE);
		$this->load->model('country_model', '', TRUE);
		$this->load->library('Session');
	
		$this->load->model('admin_model', '', TRUE);
		$lang= $this->session->userdata('language');
		$lang1 = $this->admin_model->get_language_details($lang);
		$this->smarty->assign('lang',$lang1);
		$this->data['mylang']=$lang1;
	    }    

	function check_validity($auth_validity)
	{
		/** check validity **/
		if($auth_validity['vType'] == "Trial")
		{
			$date = date('Y-m-d h:i:s');
			$datetime1 = new DateTime($auth_validity['dDateTime']);
			$datetime2 = new DateTime($date);
			$interval = $datetime1->diff($datetime2);
			$day = $interval->format('%a');
			
			/** day check **/
			if($day <= 30){
				return $auth_validity;
			}else{
				return 0;
			}
			return $day;
		}else{
			/** return authenticate validity **/
		 	return $auth_validity;
		}
	}
	
	/** 
		check authentication
	**/
    function index()
    {
    	
    		$lang = $this->session->userdata('language');	
    		$this->smarty->assign('mylang',$lang);

			$this->data['message'] = $this->session->flashdata('message');
			if($this->input->post())
		 	{  
		    $vEmail = $this->input->post('vEmail');
		    $vPassword = $this->encrypt($this->input->post('vPassword'));
		  
		    $auth_exists = $this->admin_model->check_auth($vEmail,$vPassword);
		    //$auth_check = $this->check_validity($auth_exists);
			
		    if($auth_exists)
		    {
			$auth_exists['logged_in'] = TRUE;
			$datestring = "%Y-%m-%d  %h:%i:%s";
			$time = time();
			$dLoginDate = mdate($datestring, $time);
			$logindata['iId'] = $auth_exists['iAdminId'];
			$logindata['vFirstName'] = $auth_exists['vFirstName'];
			$logindata['vLastName'] = $auth_exists['vLastName'];
			$logindata['vEmail'] = $auth_exists['vEmail'];
			$logindata['vIP'] = $this->input->ip_address();
			$logindata['iRoleId'] = $auth_exists['iRoleId'];
			$logindata['dLoginDate'] = $dLoginDate;
			$iLoginLogId = $this->loginlogs_model->loginentry($logindata);
			$auth_exists['iLoginLogId'] = $iLoginLogId;
			$sessionid = $this->session->set_userdata('user_info', $auth_exists);
			if($logindata['iRoleId'] == 1){
				redirect($this->data['base_url'] . 'administrator');
			}
			else{
				redirect($this->data['base_url'] . 'home');
			}
			exit;
		    }else{

			if($lang == 'rEnglish'){
				$this->session->set_flashdata('message',"Sorry , Username or Password is wrong !");	
			}else if($lang == 'rFrench'){
				$this->session->set_flashdata('message',"Désolé , Nom d'utilisateur ou mot de passe est incorrect !!");	
			}
			redirect($this->data['base_url'] . 'authentication');
			exit;
	    }
    }

        /*
            Change :Session write for language
        */
        // language
        $language = $this->session->userdata('language');
        $this->smarty->assign('mylang',$language); 
        if($language == ''){
            $language = 'rEnglish';
            $language = $this->session->set_userdata('language', $language);
        }else{
            $lang = $this->admin_model->get_language_details($language);
            $this->smarty->assign('lang',$lang); // language details
        }
	
		$this->data['tpl_name']= "login.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('login.tpl'); 
    }

    function logout()
    {
        $datestring = "%Y-%m-%d  %h:%i:%s";
        $time = time();
        $dLogoutDate = mdate($datestring, $time);
        $logindata['iLoginLogId'] = $this->data['user_info']['iLoginLogId'];
        $logindata['dLogoutDate'] = $dLogoutDate;
        $iLoginLogId = $this->loginlogs_model->logoutentry($logindata);
        $this->session->unset_userdata("user_info");
        $this->session->unset_userdata("select_tab_iFeatureId");
        redirect($this->data['base_url'] . 'authentication');
        exit();
    }

	function forgetpassword()
	{
		$email=$this->input->get("email");
		$result=$this->admin_model->get_password_details($email);

	    if(count($result['vPassword']) != ''){
	    	$Password=$this->decrypt($result['vPassword']);
			$vEmail=$result['vEmail'];
	    	$username=$result['vFirstName'].' '.$result['vLastName'];
	    	$site_url =$this->config->item('base_url');
	   		$sent_mail = $this->sent_mail($vEmail, $username, $Password);
	    	echo "0";exit;
		}else{
		    echo "1";exit;
		}
	}

	/**
		Registration
	**/
	function register()
	{
		$lang= $this->session->userdata('language');
		$data = $this->input->post();
		$packages = $data['package'];
		$penny = $data['penny'];
		$package_name= $data['packagename'];

		/** packages **/
		$data['language'] = $this->data['mylang'];
		$data['lang'] = $lang;
		
		/** Country Details **/
		$country = $this->country_model->get_all_country();
		$this->smarty->assign('country', $country);
		
		/** State **/
		$this->smarty->assign('lang',$lang);
		$this->smarty->assign('packages',$packages);
		$this->smarty->assign('penny',$penny);
		$this->smarty->assign('packagename',$package_name);
		$this->smarty->view('register.tpl',$data);
	}


	/** already register **/
	function already_register()
	{
		/** language userdata **/
		$lang= $this->session->userdata('language');

		/** Already Register **/
		$data = $this->input->post();
		$packages = $data['vPackages'];
		$penny = $data['penny'];
		$package_name= $data['packagename'];
	//	$lang = $data['language'];

		/** packages **/
		$data['language'] = $this->data['mylang'];
		$data['lang'] = $lang;
		/** State **/
		$this->smarty->assign('lang',$lang);
		$this->smarty->assign('packages',$packages);
		$this->smarty->assign('penny',$penny);
		$this->smarty->assign('packagename',$package_name);
		$this->smarty->view('alreadyregister.tpl',$data);
	}

	function already_register_add()
	{
		/** Registration details **/
		$Data = $this->session->userdata('register_data');
		$iPackageId = $this->session->userdata('iPackageId');
		$Data['vEmail'] = $Data['vEmail'];
		
		/** get register admin details **/
		$dat = $this->admin_model->get_register_admin_details($Data['vEmail']);
		$iAdminId = $dat['iAdminId'];
		
		if(count($Data) >0){
			$this->admin_model->update_package_paypal_clientid($iAdminId,$Data['vPackages'],$iPackageId);				
			/** Login Direct **/
			$vEmail = $data['vEmail'];
			$vPassword = $this->decrypt($dat['vPassword']); 

			/** Authentication of username and password **/	
 			$auth_exists = $this->admin_model->check_auth($vEmail,$vPassword);
			// $auth_check = $this->check_validity($auth_exists);
			
			if($auth_exists)
			{
				$auth_exists['logged_in'] = TRUE;
				$datestring = "%Y-%m-%d  %h:%i:%s";
				$time = time();
				$dLoginDate = mdate($datestring, $time);
				$logindata['iId'] = $auth_exists['iAdminId'];
				$logindata['vFirstName'] = $auth_exists['vFirstName'];
				$logindata['vLastName'] = $auth_exists['vLastName'];
				$logindata['vEmail'] = $auth_exists['vEmail'];
				$logindata['vIP'] = $this->input->ip_address();
				$logindata['iRoleId'] = $auth_exists['iRoleId'];
				$logindata['dLoginDate'] = $dLoginDate;
				$iLoginLogId = $this->loginlogs_model->loginentry($logindata);
				$auth_exists['iLoginLogId'] = $iLoginLogId;
				$sessionid = $this->session->set_userdata('user_info', $auth_exists);
				
				unset($register_data); // unset session variable
				unset($iPackageId); // unset session variable
			}
			/** redirect baseurl **/
			redirect($this->data['base_url'] . 'home');
			exit;
			/** Mail Details **/
			//$email = $this->sent_email_registration_form($Data, $this->data['base_url']);
			//echo $this->session->set_flashdata('message', 'Thank you for signup please check your email.');
			//unset($register_data); // unset session variable
			//unset($iPackageId); // unset session variable
			/** redirect url **/
			//redirect($this->data['base_url'] . 'authentication');
		}
	}	

	/* error page */
	function error_page(){
		$this->smarty->view('error_already.tpl');
	}
	/* error french page */
	function error_french_page(){
		$this->smarty->view('error_french_page.tpl');
	}

	/* Registeration add */
	function registeration_add()
	{
		$lang = $this->session->userdata('language');

		/** Registration Details **/
		$Data = $this->session->userdata('register_data');//('register_data');
		$iPackageId = $this->session->userdata('iPackageId');		
		$Data['vEmail'] = $Data['vEmail'];
		$Data['vPassword'] = $this->encrypt($Data['vPassword']);
		
		/** check the condition of register add **/
		if($Data)
		{
			/** Insert Records **/
			$insert = $this->admin_model->insert_registration_details($Data);	
			
			if($insert)
			{
				/** update package **/
				$this->admin_model->update_package_paypal_clientid($insert,$Data['vPackages'],$iPackageId);				
				/** Mail Details **/
				if($lang == 'rFrench'){
					$email = $this->sent_email_registration_form_french($Data, $this->data['base_url']);		
				}else if($lang == 'rEnglish'){
					$email = $this->sent_email_registration_form($Data, $this->data['base_url']);	
				}
				
				echo $this->session->set_flashdata('message', 'Thank you for signup please check your email.');
				
				unset($register_data); // unset session variable
				unset($iPackageId); // unset session variable

				if($lang == 'rFrench'){
					/** redirect url **/
					redirect($this->data['base_url'] . 'authentication/french_thankyou');	
				}else if($lang == 'rEnglish'){
					/** redirect url **/
					redirect($this->data['base_url'] . 'authentication/thankyou');	
				}
				
			}else{
				if($lang == 'rEnglish'){
					echo $this->session->set_flashdata('message', 'Your Username & Password are not valid !!');	
				}else if($lang == 'rFrench'){
					echo $this->session->set_flashdata('message', "Votre nom d'utilisateur et mot de passe ne sont pas valides !!");	
				}
				
				/** redirect url **/
				redirect($this->data['base_url'] . 'authentication');
			}
		}else{
			if($lang == 'rEnglish'){
				echo $this->session->set_flashdata('message', 'Please Enter Valid Username & Password !!');
			}else if($lang == 'rFrench'){
				echo $this->session->set_flashdata('message', "Se il vous plaît Entrez valide Nom d'utilisateur et mot de passe !!");	
			}
			/** redirect url **/
			redirect($this->data['base_url'] . 'authentication');
		}	
	}
	
	/** check email registration **/
	function check_email_registration()
	{
		$vEmail = $this->input->get('vEmail');
		
		/** Check Email exist **/
		$Data = $this->admin_model->check_email_registration($vEmail);
			
		if(count($Data) > 0){
			echo json_encode(array('msg'=>'Test'));
			exit;
		}else{
			echo json_encode(array('msg'=>'Done'));
			exit;
		}
		
	}

	/** check email registration **/
	function check_email_registration_french()
	{
		$vEmail = $this->input->get('vEmail');
		
		/** Check Email exist **/
		$Data = $this->admin_model->check_email_registration($vEmail);
		
		if(count($Data) > 0){
			echo json_encode(array('msg'=>'Test'));
			exit;
		}else{
			echo json_encode(array('msg'=>'Done'));
			exit;
		}
		
	}

	/** check email registration **/
	function check_email_already_registration()
	{
		$vEmail = $this->input->get('vEmail');
		
		/** Check Email exist **/
		$Data = $this->admin_model->check_email_registration($vEmail);
		
		if(count($Data) > 0){
			echo json_encode(array('msg'=>'Done'));
		}else{
			echo json_encode(array('msg'=>'Email does not Exist'));
		}
		exit;
	}
	
	/** Thank you Page **/
	function thankyou()
	{
		$this->smarty->view('thankyou.tpl');
	}
	/** Thank you Page **/
	function french_thankyou()
	{
		$this->smarty->view('french_thankyou.tpl');
	}

	/** french mail **/
	function sent_email_registration_form_french($data,$base){
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
		
		$message="";
		$message.="<html>
				<head>
				<meta http-equiv='content-type content='text/html; charset=UTF-8'/>
					<title>Easy Apps</title>
				</head>
				<body>
					Bonjour, 
					<br />
					<br />
						Merci pour votre inscription sur  easyapps..
					<br />
					<br />
						Veuillez suivre le lien ci-dessous pour compléter le processus d'enregistrement :
					<br />
					<br />
						<div class='login_link'><a href=".$base.">".$base."authentication</a></div>
					<br />
					<br />
						Si vous avez des questions, n’hésitez pas à nous contacter sur mail@easyapps.fr. ou sur 0693420541.
					<br />
					<br />
						Merci encore une fois!
					<br />
						L'équipe EasyApps
				</body>
			</html>";
		//	Si vous avez des questions n’hésiter à nous contacter par mail sur mail@easyapps.fr ou appelez-nous au 0693420541		
		$ci->email->initialize($config);
		$ci->email->from('mail@easyapps.fr', 'easyapps');
		$ci->email->cc('carateamltd@gmail.com', 'easyapps');
		$ci->email->to($data['vEmail']);
		$this->email->reply_to('mail@easyapps.fr', 'Explendid Videos');
		$ci->email->subject('Easyapps');
		$ci->email->message($message);
		$ci->email->send();
		
		return true;
	}


	
	/** Mail **/
	function sent_email_registration_form($data,$base)
	{
			$ci = get_instance();
			$ci->load->library('email');
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "mail.easy-apps.co.uk";
			$config['smtp_port'] = "25";
			$config['smtp_user'] = "mail@easy-apps.co.uk"; 
			$config['smtp_pass'] = "F8VyakZDeasyapp";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
		
			$message="";
			$message.="<html>
					<head>
						<title>Easy App</title>
					</head>
					<body>
					Hello there,
               <br />
               <br />
					Thank you for signing up at easyapps! We appreciate your time for trying us out. 
					<br />
					<br />
					Please follow the link below to complete the registration process:
					<br />
					<br />
					<div class='login_link'><a href=".$base.">".$base."authentication</a></div>
					<br />
					<br />
					If you have any query or question, please drop us a line at mail@easy-apps.co.uk or call us at +44 7949 07020
					<br />
					<br />
					Thanks once again!
					<br/>
					Easyapps Team
					</body>
				</html>";
					
		$ci->email->initialize($config);
		$ci->email->from('mail@easy-apps.co.uk', 'easyapps');
		$ci->email->cc('carateamltd@gmail.com', 'easyapps');
		$ci->email->to($data['vEmail']);
		$this->email->reply_to('mail@easy-apps.co.uk', 'Explendid Videos');
		$ci->email->subject('Easyapps');
		$ci->email->message($message);
		$ci->email->send();
		
		return true;
	}
	
	function smail()
	{
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "mail.easyapps.fr";
		$config['smtp_port'] = "25";
		$config['smtp_user'] = "mail@easyapps.fr"; 
		$config['smtp_pass'] = "F8VyakZDeasyapp";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		
		$ci->email->initialize($config);
		
		$ci->email->from('mail@easyapps.fr', 'Blabla');
		$list = array('mayur.intelithub@gmail.com');
		$ci->email->to($list);
		$this->email->reply_to('mail@easyapps.fr', 'Explendid Videos');
		$ci->email->subject('This is an email test');
		$ci->email->message('It is working. Great!');
		$ci->email->send();
		
		echo $this->email->print_debugger();
	}
	
	
	function sent_mail( $vEmail , $username, $Password)
	{
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "mail.easy-apps.co.uk";
		$config['smtp_port'] = "25";
		$config['smtp_user'] = "mail@easy-apps.co.uk"; 
		$config['smtp_pass'] = "F8VyakZDeasyapp";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		
		$message="";
		$message.="<html>
				<head>
					<title>Easy App</title>
				</head>
				<body>
				<table border='1'>
					<th>NAME</th>
					<th>USERNAME</th>
					<th>PASSWORD</th>
					
					<tr>
					<td>".$username."</td>
					<td>".$vEmail."</td>
					<td>".$Password."</td>
					</tr>
				</table>
				</body>
				</html>";
					
		$ci->email->initialize($config);
		$ci->email->from('mail@easy-apps.co.uk', 'easyapps');
		$ci->email->to($vEmail);
		$this->email->reply_to('mail@easy-apps.co.uk', 'Explendid Videos');
		$ci->email->subject('Easyapps');
		$ci->email->message($message);
		$ci->email->send();
	}
}

/* End of file authentication.php */
/* Location: ./application/controllers/authentication.php */


