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
	
    function index()
    {
        $this->data['message'] = $this->session->flashdata('message');
        if($this->input->post())
         {  
            
            $vEmail = $this->input->post('vEmail');
            $vPassword = $this->encrypt($this->input->post('vPassword'));
          
		    $auth_exists = $this->admin_model->check_auth($vEmail,$vPassword);
		//	$auth_check = $this->check_validity($auth_exists);
			
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

                redirect($this->data['base_url'] . 'home');
                exit;
            }
            else{
               echo "<script>alert('wotn');</script>";
                $this->session->set_flashdata('message',"Sorry , Username or Password is wrong !");
                redirect($this->data['base_url'] . 'authentication');
                exit;
            }
        }

        /*
            Change :Session write for language
        */
        // language
        $language = $this->session->userdata('language');
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

    function forgetpassword(){
        $email=$this->input->get("email");
        $result=$this->admin_model->getuserlist($email)->result_array();
        //echo $vEmail=$result[0]['vEmail'];exit;
        if(count($result) == 1){
            $Password=$this->decrypt($result[0]['vPassword']);
            $vEmail=$result[0]['vEmail'];
            $username=$result[0]['vFirstName'].' '.$result[0]['vLastName'];
            $site_url =$this->config->item('base_url');
            $bodyArr_user = array("#NAME#","#USERNAME#","#PASSWORD#","#SITEURL#");
            $postArr_user = array($username,$vEmail,$Password,$site_url);
            $id=$this->Send('USER_FORGET_PASSWORD','site_url',$vEmail,$bodyArr_user,$postArr_user);
            echo "0";exit;
        }
        else{
            echo "1";exit;
        }
    }
	
	function register()
	{
		$data['language'] = $this->data['mylang'];
		$data['base_url']=$this->data['base_url'];
	
		/** Country Details **/
		$country = $this->country_model->get_all_country();
		$this->smarty->assign('country', $country);
		
		/** State **/
		$this->smarty->view('register.tpl',$data);
	}
	
	
	function registeration_add()
	{
		/** Registration Details **/
		$Data = $this->input->post();
		$Data['vPassword'] = $this->encrypt($this->input->post('vPassword'));
		
		if($Data){
			/** Insert Records **/
			$insert = $this->admin_model->insert_registration_details($Data);	
			
			if($insert){
				/** Mail Details **/
				$email = $this->sent_email_registration_form($Data, $this->data['base_url']);
				echo $this->session->set_flashdata('message', 'Thank you for signup please check your email.');
				
				/** redirect url **/
				redirect($this->data['base_url'] . 'authentication/thankyou');
			}else{
				echo $this->session->set_flashdata('message', 'Your Username & Password are not valid !!');
				/** redirect url **/
				redirect($this->data['base_url'] . 'authentication');
			}
		}else{
			echo $this->session->set_flashdata('message', 'Please Enter Valid Username & Password !!');
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
			echo json_encode(array('msg'=>'Email Already Exist'));
		}else{
			echo json_encode(array('msg'=>'Done'));
		}
		exit;
	}
	
	/** **/
	function thankyou()
	{
		$this->smarty->view('thankyou.tpl');
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
						<p>Easy App</p>
					Hello ,
						Thank you for signing up at Bizness Apps! We appreciate you taking time to try us out.
					<div class='login_link'>To complete your registration, please click the following link:<a href=".$base.">".$base."</a></div>
					
					</body>
				</html>";
					
		
		$ci->email->initialize($config);
		$ci->email->from('mail@easyapps.fr', 'easyapps');
		$ci->email->to($data['vEmail']);
		$this->email->reply_to('mail@easyapps.fr', 'Explendid Videos');
		$ci->email->subject('This is an email test');
		$ci->email->message($message);
		$ci->email->send();
		
		return true;
	}
}

/* End of file authentication.php */
/* Location: ./application/controllers/authentication.php */


