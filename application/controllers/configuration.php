<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class configuration extends MY_Controller{
    
    function __construct(){
        parent::__construct();      
        $this->load->model('configuration_model', '', TRUE);   
        $this->data['user_info']=$this->session->userdata['user_info'];        
        $this->smarty->assign("data",$this->data);
       // $this->load->model('admin_model', '', TRUE);

         /*
	      Change :Session write for language
	      */
         $this->load->model('admin_model', '', TRUE);
        // language session
        $lang= $this->session->userdata('language');
        $lang1 = $this->admin_model->get_language_details($lang);
        $this->smarty->assign('lang',$lang1);
        // end language
    }   

    //load configuration data
    function index(){

    	//Made Changes by : Sagar 19-5-2014 Description : Check Authentication

    	if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
	   $db_config = $this->configuration_model->loadcofig()->result();
	   $this->smarty->assign("db_config",$db_config);
	   //$this->breadcrumb->add('Dashboard', $this->data['admin_url'].'home');
	   //$this->breadcrumb->add('Edit Configuration', '');
	   $this->data['breadcrumb'] = $this->breadcrumb->output();	   
	   $this->data['message'] = $this->session->flashdata('message');
	   $this->data['tpl_name']= "edit-configuration.tpl";  
	   $this->smarty->assign('data', $this->data);
	   $this->smarty->view('template.tpl');
    }
    
    //update configuration data.
    function update(){
    	//Made Changes by : Sagar 19-5-2014 Description : Check Authentication

    	if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }	   
	   if($_POST){
		  $Data = $_POST['Data'];
		//  echo '<pre>';print_r($Data);exit;
		  foreach($Data as $key=>$val) {
			 $Value = array(
					   'vValue'=>$val
					   );
			 $where = ' vName  = "'.$key.'"';
			 
			 $result = $this->configuration_model->update($Value, $key);
		  }
		  $this->session->set_flashdata('message',"Configuration updated successfully");            
		  redirect($this->data['base_url'].'configuration');
		  exit;
	   }
	   //$this->breadcrumb->add('Dashboard', $this->data['admin_url'].'home');
	  // $this->breadcrumb->add('Edit Configuration', '');
	  // $this->data['breadcrumb'] = $this->breadcrumb->output();
	   $this->data['tpl_name']= "edit-configuration.tpl";  
	   $this->smarty->assign('data', $this->data);
	   $this->smarty->view('template.tpl'); 
    }

}
/* End of file configuration.php */
/* Location: ./application/controllers/configuration.php */