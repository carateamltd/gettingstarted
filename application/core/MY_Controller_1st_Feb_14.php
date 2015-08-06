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
			$this->data['base_css'] 		= $this->config->item('base_css');
			$this->data['basedatatable_css'] 		= $this->config->item('basedatatable_css');
			$this->data['base_font_awsome'] 		= $this->config->item('base_font_awsome');
			$this->data['base_bootstrap'] = $this->config->item('base_bootstrap');
			$this->data['base_upload']		= $this->config->item('base_upload');
			$this->data['base_path']    = $this->config->item('base_path');
			$this->data['url_name'] = $this->uri->segment(1, 0);
			$this->data['user_info']     = $this->session->userdata('user_info');
            
            $this->data['base_path'] 		= $this->config->item('base_path');
            $this->data['base_download_path']		= $this->config->item('base_download_path');
            $this->data['base_download_url']		= $this->config->item('base_download_url');

			if($this->data['user_info']   == "")
			{
				if($this->router->class !="authentication"){
					redirect($this->data['base_url'] . 'authentication');	
					exit;
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
			##ends here
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
			$this->db->from('slb_tabbackground');
			$query = $this->db->get();
			return $query->result_array();
		}    	

		function get_all_tabbackground_admin()
		{
			$this->db->select('');
			$this->db->where('eStatus', 'Active');
			$this->db->where('iAdminId', $this->data[user_info][iAdminId]);
			$this->db->from('slb_tabbackground');
			$query = $this->db->get();
			return $query->result_array();
		} 
		
		function get_all_template($eType)
		{
			$this->db->select('');
			$this->db->where('eStatus', 'Active');
			$this->db->where('eType', $eType);
			$this->db->from('slb_newdesign_template');
			$query = $this->db->get();
			return $query->result_array();
		}    	
		function get_all_buttons_tab_background(){
			$this->db->select('');
			$this->db->where('eStatus', 'Active');
			$this->db->from('slb_buttons_tab_background');
			$query = $this->db->get();
			return $query->result_array();
		}    	
		function get_all_buttons_lunch_header($admin_data)
		{
			$this->db->select('');			
			$this->db->from('slb_lunch_header');
			$this->db->where('eStatus', 'Active');
			$this->db->where_in('iAdminId',$admin_data);
			 $this->db->order_by('iLunchheaderId', 'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}    	
		function get_all_iconcolormaster()
		{
			$this->db->select('');
			$this->db->from('slb_iconcolormaster');
			$query = $this->db->get();
			return $query->result_array();
		}    	

		function get_deafult_iconcolormaster()
		{
			$this->db->select('');
			$this->db->where('eDefault', 'Y');
			$this->db->from('slb_iconcolormaster');
			$query = $this->db->get();
			return $query->row_array();
		}  
		function get_all_iconmaster()
		{
			$this->db->select('');
			$this->db->from('slb_iconmaster');
			$query = $this->db->get();
			return $query->result_array();
		}
		
		function get_all_appinformation($iClientId,$iRoleId){			
			$this->db->select('sp.*,si.vTitle as Industry_Title,client.vFirstName,client.vLastName');
			if($iRoleId==2){				
			  $this->db->where('iClientId', $iClientId);
		     }
			$this->db->from('slb_appinformation as sp');
			$this->db->join('slb_appindustry as si','sp.iIndustryId=si.iIndustryId','left');
			$this->db->join('slb_administrator as client','client.iAdminId=sp.iClientId','left');
			$query = $this->db->get();
			return $query->result_array();
		}

}
?>
