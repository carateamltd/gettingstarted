<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class State extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('state_model', '', TRUE);
        $this->load->model('country_model', '', TRUE);
    }    

    function index()
    {
        $this->data['tpl_name']= "view-state.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View State', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    
    //create user
    function create()
    {
        $eStatus = field_enums('r_state', 'eStatus');
        if($this->input->post())
        { 
            $State = $this->input->post('Data');
            $data = $State; 
            $id= $this->state_model->save($data);  
            $this->session->set_flashdata('message',"State Added Successfully");
            redirect($this->data['base_url'].'state');
            exit;
        }   
       
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View States', base_url()."state");
        $this->breadcrumb->add('Add State', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        # for get all countries
        $this->data['countries']=$this->country_model->get_all_Country();

        $this->data['mode'] = 'create';
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('operation','add');
        $this->data['tpl_name']= "state.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
  
    function action_update()
    {
        
        $ids = $this->input->post('iId');
        switch($this->input->post('action'))
        {
            case "Inactive":
            case "Active":
                    $iId = $this->state_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Updated Successfully");
                    redirect($this->data['base_url'] . 'state');
                    exit;
                    break;
            case "Delete":
                    $iId = $this->state_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully");
                    redirect($this->data['base_url'] . 'state');
                    exit;
                    break;         
        }
    }

    function update()
    {
        $eStatus = field_enums('r_state', 'eStatus');
        $iStateId = $this->uri->segment(3);
        $this->data['state'] = $this->state_model ->get_state_details($iStateId);
        if($this->input->post())
        {
            $State = $this->input->post('Data');
            $iStateId = $this->input->post('iStateId');
            $data = $State;
            $iStateId = $this->state_model->update($iStateId,$data);
            $this->session->set_flashdata('message',"State Updated Successfully");
            redirect($this->data['base_url'] . 'state');
            exit();    
        } 

         # for get all countries
        $this->data['countries']=$this->country_model->get_all_Country();

        $this->data['mode'] = 'update';
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('operation','edit');
        $this->data['tpl_name']= "state.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }
    function delete()
    {
        $iStateId = $this->uri->segment(3);
        $id= $this->state_model->delete_all($iStateId); 
        $this->session->set_flashdata('message',"State Deleted Successfully");
        redirect($this->data['base_url'] . 'state');
        exit;
    }

    function get_state_listing()
    {
        
        $all_state = $this->state_model->get_all_states();
         
        foreach ($all_state as $key => $value)
        {
            $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iStateId'].'">';   
            $alldata[$key]['statename'] = $value['vState'];
            $alldata[$key]['statecode'] = $value['vStateCode'];
            $alldata[$key]['status'] = '<center>'.$value['eStatus'].'</center>';
            /*$status = $value['eStatus'];
            if($status=='Active')
            {
                $alldata[$key]['status'] = '<center><a href="#" data-toggle="modal"><i title="Active" class="icon-ok-sign"></i></a></center>';
            }
            else 
            {
                $alldata[$key]['status'] = '<center><a href="#" data-toggle="modal"><i title="Inactive" class="icon-minus-sign"></i></a></center>';   
            }*/
            $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'state/update/'.$value['iStateId'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
            $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'state/delete/'.$value['iStateId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
            
        }
        $aData['aaData'] =  $alldata;
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
}
/* End of file State.php */
/* Location: ./application/controllers/State.php */
?>