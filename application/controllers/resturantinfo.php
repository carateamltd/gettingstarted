<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class resturantinfo extends MY_Controller{
    
    function __construct(){
        
       parent::__construct();
        $this->load->model('app_model', '', TRUE);    
        $this->load->library('upload');    
        $this->load->library('image_lib');
        $this->load->model('admin_model', '', TRUE);
        // language session
        $lang= $this->session->userdata('language');
        $lang1 = $this->admin_model->get_language_details($lang);
        $this->smarty->assign('lang',$lang1);
        // end language
    } 

    function index(){
      if($this->session->userdata['user_info']['iRoleId'] != '2')
       {
        $this->session->set_flashdata('warning', '1');
        redirect($this->data['base_url'] . 'home');
              exit; 
       }  
        $this->data['message'] = $this->session->flashdata('message');
        $basic_info = $this->app_model->loadinfo($this->session->userdata['user_info']['iAdminId'])->result();
        /*echo "<pre>";
        print_r($basic_info);exit;       
        echo "</pre>";*/
        $this->smarty->assign("basicinfo",$basic_info);

        $this->data['tpl_name']= "edit-resturantinfo.tpl";
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('Basic Info', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->smarty->assign('data', $this->data);
        //echo "<pre>";print_r($this->data['user_info']['iAdminId']);exit;
        $this->smarty->view('template.tpl');
    }
    function update(){

        if($this->session->userdata['user_info']['iRoleId'] != '2')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        /*$data['iAdminId'] = $this->input->post('iAdminId');
        if($data['iAdminId'] == )*/
        $this->data['message'] = $this->session->flashdata('message');
        $data = $this->input->post('Data');
        $data['iAdminId']= $this->input->post('iAdminId');
        $iResturantInfoID= $this->input->post('iResturantInfoID');
        $save_record=$this->app_model->resturantinfo_update($data,$iResturantInfoID);
        if($save_record){
        $this->session->set_flashdata('message',"This REsturantInfo successfully store.");
        redirect($this->data['base_url'].'resturantinfo');
        }else{
        echo "error";
        }


    }
}


