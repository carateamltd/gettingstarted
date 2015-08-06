<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loginlogs extends MY_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
        $this->load->model('loginlogs_model', '', TRUE);
    }    

    //view user listing
    function index()
    {
        $this->data['tpl_name']= "view-loginlogs.tpl";
        $total_rows = $this->loginlogs_model->count_loginlogs();
        $this->data['pagination']['base_url'] = $this->data['base_url'].'user';
        $this->data['pagination']['total_rows'] = $total_rows;
        $this->pagination->initialize($this->data['pagination']);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $this->data['loginlogs']  =  $this->loginlogs_model->get_loginlogs($this->data['pagination']["per_page"],$page);    

        $this->data['create_links'] =  $this->pagination->create_links();

        if($total_rows > 0)
        {
            if($page !=0){
                $end = (($page+$this->data['pagination']['per_page'])/$this->data['pagination']['per_page'])*$this->data['pagination']['per_page'];
                $start = $end - ( $this->data['pagination']['per_page'] -1 );
                if($end > $total_rows)
                    $end = $total_rows;            
            }
            else{
                $end = $this->data['pagination']['per_page'];
                if($end > $total_rows)
                    $end = $total_rows;
                $start = 1;
            }
            $this->data['paging_message']  = 'Showing Records '. $start.' to '. $end.' out of '.$total_rows;
        }
        else
        {
            $this->data['paging_message']  = 'No Records Found';
        }
        $this->data['message'] = $this->session->flashdata('message');

        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add("Loginlogs", "");
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
 
    //listing actions 
    function action_update()
    {
        $ids = $this->input->post('iId');
    
        switch($this->input->post('action'))
        {
            case "Delete":
                    $iId = $this->loginlogs_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total  (".count($ids).")s  Record Deleted successfully");
                    redirect($this->data['base_url'] . 'loginlogs');
                    exit;
                    break;
        }
    }
   
}

/* End of file loginlogs.php */
/* Location: ./application/controllers/loginlogs.php */


