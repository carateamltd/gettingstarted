<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

		//initialize all required variables
		function __construct()
		{			
			parent::__construct();			
			$this->load->helper('cookie');
			$this->load->library('session');
			$this->load->helper('date');
			$this->load->helper('url');
            		$this->load->helper('global_variable');
			$this->load->helper('common_func');
			$this->load->library('Breadcrumb');
			$this->load->library('pagination');
			$this->load->database();
			$this->load->library('curl');
			$this->load->library('email');
			$this->load->helper('file');
            
			$this->data['base_url'] 		= $this->config->item('base_url');
			$this->data['base_assets'] 		= $this->config->item('base_assets');
			$this->data['base_js'] 	= $this->config->item('base_js');
			$this->data['basedatatable_js']	= $this->config->item('basedatatable_js');
			$this->data['base_image'] 	= $this->config->item('base_image');
			$this->data['base_logo'] 			= $this->config->item('base_logo');
			$this->data['logo_name_en'] 			= $this->config->item('logo_name_en');
			$this->data['logo_name_fr'] 			= $this->config->item('logo_name_fr');
			$this->data['base_css'] 		= $this->config->item('base_css');
			$this->data['basedatatable_css'] 		= $this->config->item('basedatatable_css');
			$this->data['base_font_awsome'] 		= $this->config->item('base_font_awsome');
			$this->data['base_bootstrap'] = $this->config->item('base_bootstrap');
			    $this->data['base_upload']		= $this->config->item('base_upload');
			    
			    $this->data['base_path'] 		= $this->config->item('base_path');
			    $this->data['base_download_path']		= $this->config->item('base_download_path');
			    $this->data['base_download_url']		= $this->config->item('base_download_url');
			
			    $this->data['url_name'] = $this->uri->segment(1, 0);
			$this->data['user_info']     = $this->session->userdata('user_info');

			/*if($this->data['user_info']   == "")
			{	
				if($this->router->class !="authentication" && $this->router->class != "webservice"){
					redirect($this->data['base_url'] . 'authentication');	
					exit;
				}
			}*/
			if($this->data['user_info']   == "")
			   { 
			    if($this->router->class !="authentication" && $this->router->class != "webservice"){
			     if($this->router->fetch_method()=='upload_button_img')
			     {
			      echo 1;
			      exit;
			     }
			     else
			     {
			      redirect($this->data['base_url'] . 'authentication'); 
			      exit;
			     }
			     
			    }
			   }
			$ImgData[]=$this->data[user_info][iAdminId];
			$ImgData[]=0;
			$this->data['getAdminImgData']=$ImgData;		

			##paging configurations
			$this->data['pagination']['per_page'] = 10; 
			$this->data['pagination']['full_tag_open'] = '<ul>';
			$this->data['pagination']['full_tag_close'] = '</ul>';
			$this->data['pagination']['uri_segment'] = 2;
			$this->data['pagination']['first_link'] = 'First';
			$this->data['pagination']['first_tag_open'] = '<li>';
			$this->data['pagination']['first_tag_close'] = '</li>';
			$this->data['pagination']['use_page_numbers'] = false;
			$this->data['pagination']['cur_tag_open'] = '<li class="active"><span>';
			$this->data['pagination']['cur_tag_close'] = '</span></li>';
			$this->data['pagination']['next_tag_open'] = '<li>';
			$this->data['pagination']['next_link'] = 'Next';
			$this->data['pagination']['next_tag_close'] = '</li>';
			$this->data['pagination']['prev_link'] = 'Prev';
			$this->data['pagination']['prev_tag_open'] = '<li>';
			$this->data['pagination']['prev_tag_close'] = '</li>';
			$this->data['pagination']['num_tag_open'] = '<li>';
			$this->data['pagination']['num_tag_close'] = '</li>';
			$this->data['pagination']['last_tag_open'] = '<li>';
			$this->data['pagination']['last_tag_close'] = '</li>';
			$this->data['pagination']['last_tag_close'] = '</li>';
            
			getGeneralVar();
			    
			/** Set userdata session language **/
			$country_name = $this->input->get('cname');

			/** session language **/
			$language = $this->session->userdata('language');

			/** easyapps french **/
			if($_SERVER['HTTP_HOST'] == 'admin.easyapps.fr' || $_SERVER['HTTP_HOST'] == 'www.admin.easyapps.fr' || $country_name == 'France' || $_SERVER["HTTP_HOST"] == 'admin.metappli.fr' || $_SERVER["HTTP_HOST"] == 'www.admin.metappli.fr'){
					$language = 'rFrench';
					$data = $this->session->set_userdata('language', $language);
			}else{
					$language = 'rFrench';//$language = 'rEnglish';
					$data = $this->session->set_userdata('language', $language);	
			}
	}


	// get ip address
	function get_country_name_ipaddress()
	{
		// ip address 
		$ip = $this->get_client_ip();
		$location = file_get_contents('http://freegeoip.net/json/'.$ip);
		$res1=json_decode($location,true);
		$country_name = $res1['country_name'];
		
		return $country_name;
	}
	
	/** get client ip **/
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

// USE FOR DELETE IMAGE
    function list_sysemaildata($EmailCode){  
        $this->db->select('');  
        $this->db->from('r_emailtemplate');
        $this->db->where('vEmailCode',$EmailCode);
        return $this->db->get();
    }   

    function Send($EmailCode,$SendType,$ToEmail,$bodyArr,$postArr){ 
       	
		$email_info = $this->list_sysemaildata($EmailCode)->result();		
		$MAIL_FOOTER = $this->data['MAIL_FOOTER'];
		$COMPANY_NAME =$this->data['COMPANY_NAME'];
		$Subject = strtr($email_info[0]->vEmailSubject, "\r\n" , "  " );
	    	//$headers = "MIME-Version: 1.0\r\n";
		//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		//$headers .= 'From: '.$COMPANY_NAME.' <'.$MAIL_FOOTER.'>' . "\r\n".
		//'Reply-To: '.$COMPANY_NAME.' <'.$MAIL_FOOTER.'>'. "\r\n".
		//'Return-Path: '.$COMPANY_NAME.' <'.$MAIL_FOOTER.'>' . "\r\n".
		//'X-Mailer: PHP/' . phpversion();
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= 'From:schoollifebroadcasting.com<schoollifebroadcasting.com>' . "\r\n".
			'Reply-To:schoollifebroadcasting.com<schoollifebroadcasting.com>'. "\r\n".
			'Return-Path: schoollifebroadcasting.com<schoollifebroadcasting.com>' . "\r\n".
			'X-Mailer: PHP/' . phpversion();	
		$Subject = strtr($email_info[0]->vEmailSubject, "\r\n" , "  " );          
		$this->body =stripslashes($email_info[0]->tEmailMessage);
		$vFromName = $email_info[0]->vFromName;		
		$vFromEmail = $email_info[0]->vFromEmail;           
		$this->body = str_replace($bodyArr,$postArr, $this->body);          
		$To = stripcslashes($ToEmail);
		$image=$this->data['base_logo'].'logo.png';
		$htmlMail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		     <html xmlns="http://www.w3.org/1999/xhtml">
		     <head>
		     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		     <title>'.$COMPANY_NAME.'</title>
		     </head>
		     <body style="padding:0; margin:0; border:0;">
			  <div class="mainwrap" style="float:left; width:650px; background:#e5e9ec; padding:5px;">
			       <div class="imconpart" style="float:left; width:98%; background:#f2f5f7; border-radius:5px; border-right:1px solid #d3d9dd; border-bottom:1px solid #d3d9dd; padding:1%;">
				    <div style="background:#F8F8F8; padding: 10px 10px 10px 10px;"><img src="'.$image.'"/></div>
					 '.$this->body.'
				    </div>
			       </div>
			  </div>
		     </body>
		</html>';
		#echo $htmlMail;exit;
		if($_SERVER['SERVER_ADDR'] == '192.168.1.41'){ // for localhost server			  
			require_once "Mail.php";
			require_once "Mail/mime.php";
			$from = "demo3.testing3@gmail.com";			   
			$to =$To;
			$subject = strtr($email_info[0]->vEmailSubject, "\r\n" , "  " );
			$crlf = "\n";
			$html = "<h1> This is HTML </h1>";
			$headers = array('From' => $from,'To' => $to,'Subject' => $subject);
			$host = "smtp.gmail.com";
			$username = "demo2.testing2@gmail.com";
			$password = "demo1234";
			$mime =  new Mail_mime(array('eol' => $crlf));
			$mime->setHTMLBody($htmlMail);			
			$body = $mime->getMessageBody();			
			$headers = $mime->headers($headers);			 
			$smtp = Mail::factory("smtp",array("host" => $host,"auth" => true,"username" => $username,"password" => $password));			 
			$res = $smtp->send($to, $headers, $body);			 
		}
		else{
			$res = mail($To,$Subject,$htmlMail,$headers);
		}
		return $res; 		
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
    	
		function get_all_tabbackground()
		{
			$this->db->select('');
			$this->db->where('eStatus', 'Active');
			$this->db->where('iAdminId', 0);
			$this->db->from('r_tabbackground');
			$query = $this->db->get();
			return $query->result_array();
		}    	

		function get_all_tabbackground_admin()
		{
			$this->db->select('');
			$this->db->where('eStatus', 'Active');
			$this->db->where('iAdminId', $this->data[user_info][iAdminId]);
			$this->db->from('r_tabbackground');
			$query = $this->db->get();
			return $query->result_array();
		} 
		
		function get_all_template($eType)
		{
			$this->db->select('');
			$this->db->where('eStatus', 'Active');
			$this->db->where('eType', $eType);
			$this->db->from('r_default_template');
			$query = $this->db->get();
			return $query->result_array();
		}    	
		function get_all_buttons_tab_background(){
			$this->db->select('');
			$this->db->where('eStatus', 'Active');
			$this->db->from('r_buttons_tab_background');
			$query = $this->db->get();
			return $query->result_array();
		}    	
		function get_all_buttons_lunch_header($admin_data)
		{
			$this->db->select('');			
			$this->db->from('r_lunch_header');
			$this->db->where('eStatus', 'Active');
			$this->db->where_in('iAdminId',$admin_data);
			 $this->db->order_by('iLunchheaderId', 'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}    	
		function get_all_iconcolormaster()
		{
			$this->db->select('');
			$this->db->from('r_iconcolormaster');
			$query = $this->db->get();
			return $query->result_array();
		}    	

		function get_deafult_iconcolormaster()
		{
			$this->db->select('');
			$this->db->where('eDefault', 'Y');
			$this->db->from('r_iconcolormaster');
			$query = $this->db->get();
			return $query->row_array();
		}  
		function get_all_iconmaster()
		{
			$this->db->select('');
			$this->db->from('r_iconmaster');
			$query = $this->db->get();
			return $query->result_array();
		}
		
		function get_all_appinformation($iClientId,$iRoleId){			
			$this->db->select('sp.*,si.vTitle as Industry_Title,client.vFirstName,client.vLastName');
			if($iRoleId==2){				
			  $this->db->where('iClientId', $iClientId);
		     }
			$this->db->from('r_appinformation as sp');
			$this->db->join('r_appindustry as si','sp.iIndustryId=si.iIndustryId','left');
			$this->db->join('r_administrator as client','client.iAdminId=sp.iClientId','left');
			$query = $this->db->get();
			return $query->result_array();
		}

	function rm_folder_recursively($dir) 
	{
		foreach(scandir($dir) as $file) {
		if ('.' === $file || '..' === $file) continue;
		if (is_dir("$dir/$file")) rm_folder_recursively("$dir/$file");
		else unlink("$dir/$file");
		}
		rmdir($dir);
		return true;
	}

	function get_appfeature_count($iApplicationId){
		$this->db->select('');
		$this->db->where('iApplicationId', $iApplicationId);
		$this->db->from('r_appfeature');
		$query = $this->db->get();
		return $query->num_rows();
	}

	function yearDropdown($startYear, $endYear,$id="month"){ 
 	   //echo "<select id=".$id." name=".$id.">n"; 
        $opt = "";  
        for ($i=$startYear;$i<=$endYear;$i++){ 
        	$opt .= "<option value=".$i.">".$i."</option>n";     
        } 
      return $opt;
    	//echo "</select>"; 
	}		
	function monthDropdown(){ 
		$opt = ""; 
	   for( $i = 1; $i <= 12; $i++ ) {
	        //$month_num = str_pad( $i, 2, 0, STR_PAD_LEFT );
	   		$month_num = date( 'm', mktime( 0, 0, 0, $i + 1, 0, 0, 0 ) );
	        $month_name = date( 'F', mktime( 0, 0, 0, $i + 1, 0, 0, 0 ) );
	        $month_options .= '<option value="' .$month_num. '">' . $month_name . '</option>';
	    }
		return $month_options; 
	}		
}
?>
