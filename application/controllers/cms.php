<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends MY_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->model('app_model', '', TRUE);
        $this->load->model('admin_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
        $this->load->model('country_model', '', TRUE);
        $this->load->model('state_model', '', TRUE);
     //   $this->load->model('admin_model', '', TRUE);
        
        $this->load->model('cms_model', '', TRUE);

        /*
          Change By : Mayur Gajjar
          Date : 1/8/2014
          Change :Session write for language
          */
        $this->load->model('admin_model', '', TRUE);
        // language session
        $lang= $this->session->userdata('language');
        $lang1 = $this->admin_model->get_language_details($lang);
        $this->smarty->assign('lang',$lang1);
        // end language
    }    

    function index()
    {
    	// language session
			$lang= $this->session->userdata('language');
			$lang1 = $this->admin_model->get_language_details($lang);
			$this->smarty->assign('lang',$lang1);
		// end language
		
        //Made Changes by : Sagar 19-5-2014 Description : Check Authentication
        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        
        $this->data['tpl_name']= "view-cms.tpl";
    
       
        $this->data['message'] = $this->session->flashdata('message');        
        $this->data['warning'] = $this->session->flashdata('warning');        
        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
       if($iRoleId==1){
          $this->breadcrumb->add('View Administrator', '');
       }else{
          $this->breadcrumb->add('View Client', '');
       }
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    # for update administrator
    function update()
    {   
    	$pageName=$this->uri->segment(3);  
    	//Made Changes by : Sagar 19-5-2014 Description : Check Authentication
    
        /*$eStatuses = field_enums('r_administrator','eStatus');
        $iAdminId = $this->uri->segment(3);

        if($iAdminId != NULL)
        {    
            if($this->session->userdata['user_info']['iAdminId'] != $iAdminId && $this->session->userdata['user_info']['iRoleId'] != '1')
            {
                $this->session->set_flashdata('warning', '1');
                redirect($this->data['base_url'] . 'home');
                exit;   
            }
        }*/
       
        $this->data['page_details'] = $this->cms_model->get_page_details($pageName);
        //echo '<pre>';print_r($this->data['page_details']);exit;
	    /*
		# for get all roles
        $this->data['roles']=$this->role_model->get_all_role();
        # for get all countries
        $this->data['countries']=$this->country_model->get_all_Country();
        # for get all states
        $this->data['states']=$this->state_model->get_all_state();*/
        
        if($this->input->post())
        {
        	$updata=$this->input->post();
        	foreach($updata as $key=>$val){
				$this->cms_model->update_details($key,$val);
			}
			redirect($this->data['base_url'].'cms');
			exit;
        } 
		$this->data['cms_page_name']=$pageName;
        $this->data['mode'] = 'update';
        $this->data['tpl_name']= "edit_cms.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl');
    }

	// get cms listing
    function get_cms_listing()
    {
       
        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        
        $all_admin = $this->cms_model->get_all_pages();
        
        //echo "<pre>";print_r($all_admin);exit;
        if(count($all_admin)>0) {
            foreach ($all_admin as $key => $value)
            {
                
                $alldata[$key]['administratorname'] = $value['rPageName'];
               
                $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'cms/update/'.$value['rPageName'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
                
            }
                $aData['aaData'] = $alldata;
        }
        else {
            $aData['aaData'] = "";  
        }
        //print_r($aData);
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
        
    }
    
    function add_new_label(){
		$pageName=$this->uri->segment(2);
		
		if($this->input->post())
        {
        	$adddata=$this->input->post();
        	
        	$this->cms_model->add_tab($adddata);
        	redirect($this->data['base_url'].'cms/update/'.$adddata['cms_page_name']);
			exit;
        }
	}


}
/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */
?>