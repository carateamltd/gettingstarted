<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Classmaster extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('classmaster_model', '', TRUE);
    }    

    function index()
    {
        $this->data['tpl_name']= "view-classmaster.tpl";
        $this->data['message'] = $this->session->flashdata('message');  
        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Classmaster', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

  
    function create(){

        $eStatus = field_enums('r_classmaster', 'eStatus');
        if($_POST){

            $Data = $_POST['Data'];   

            $id= $this->classmaster_model->save($Data);  
            $this->session->set_flashdata('message',"Class Master Added Successfully");
            redirect($this->data['base_url'].'classmaster');
            exit;
        }

         //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Classmaster', base_url()."classmaster");
        $this->breadcrumb->add('Add Classmaster', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->data['mode'] = 'create';

        $this->data['tpl_name']= "classmaster.tpl";  
        $this->smarty->assign('operation','add');
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function delete() {
        $ids= $this->uri->segment(3);

        $id = $this->classmaster_model->delete_all($ids);

        $this->session->set_flashdata('message',"Class Master Deleted Successfully");

        redirect($this->data['base_url'].'classmaster');
    }

    function action_update()
    {
        $ids = $this->input->post('iId');
        switch($this->input->post('action'))
        {
            case "Delete":
                    $iId = $this->classmaster_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully");
                    redirect($this->data['base_url'] . 'classmaster');
                    exit;
                    break;
        }
    }

    function update()
    {
        $iClassId = $this->uri->segment(3);

        $eStatus = field_enums('r_classmaster', 'eStatus');
        
        $this->data['classmaster'] = $this->classmaster_model ->get_classmaster_details($iClassId);

        if($this->input->post())
        { 
            $classmaster = $this->input->post('Data');
            $iClassId = $this->input->post('iClassId');
            
            $iClassId = $this->classmaster_model->edit_classmaster($classmaster,$iClassId);
            $this->session->set_flashdata('message',"Class Master Updated Successfully");
            redirect($this->data['base_url'] . 'classmaster');
        }
       
        $this->data['mode'] = 'update';
        $this->data['tpl_name']= "classmaster.tpl"; 
        $this->smarty->assign('operation','edit');
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl');
    }

    function get_classmaster_listing()
    {
        //echo "Inside get role listing";exit;    
        $all_classmaster = $this->classmaster_model->get_all_classmaster();

        foreach ($all_classmaster as $key => $value)
        {
            $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iClassId'].'">';
            $alldata[$key]['classname'] = $value['vClassName'];
            $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'classmaster/update/'.$value['iClassId'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
            $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'classmaster/delete/'.$value['iClassId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
        }

        $aData['aaData'] = $alldata;
        #echo "<pre>";
        #print_r($aData);exit;
        $json_lang = json_encode($aData);
        #echo "<pre>";
        #print_r($json_lang);exit;

        echo $json_lang;exit;
    } 
}
/* End of file Classmaster.php */
/* Location: ./application/controllers/Classmaster.php */
?>