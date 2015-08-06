<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Clientmaster extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('clientmaster_model', '', TRUE);
         $this->load->model('country_model', '', TRUE);
        $this->load->model('state_model', '', TRUE);
    }    

    function index()
    {
        $this->data['tpl_name']= "view-clientmaster.tpl";
        $this->data['message'] = $this->session->flashdata('message');  
        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View clientmaster', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create(){

        $eStatus = field_enums('r_clientmaster', 'eStatus');
        if($_POST){
            $Data = $_POST['Data'];
            $encPass= $this->encrypt($Data['vPassword']);
            $Data['vPassword'] = $encPass;   
            $id= $this->clientmaster_model->save($Data);  
            $this->session->set_flashdata('message',"Client Master Added Successfully");
            redirect($this->data['base_url'].'clientmaster');
            exit;
        }

         //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View clientmaster', base_url()."clientmaster");
        $this->breadcrumb->add('Add clientmaster', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

         $this->data['countries']=$this->country_model->get_all_Country();
        # for get all states
        $this->data['states']=$this->state_model->get_all_state();
        $this->data['mode'] = 'create';

        $this->data['tpl_name']= "clientmaster.tpl";  
        $this->smarty->assign('operation','add');
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function get_clientmaster_listing()
    {
       
        $all_clientmaster = $this->clientmaster_model->get_all_clientmaster();

        foreach ($all_clientmaster as $key => $value)
        {
            $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iClientId'].'">';
            $alldata[$key]['clientname'] = $value['vClientName'];
            $alldata[$key]['email'] = $value['vEmail'];
            $alldata[$key]['phone'] = $value['iPhoneNumber'];
            $alldata[$key]['address'] = $value['vAddress'];
            $alldata[$key]['city'] = $value['vCity'];
            $alldata[$key]['postcode'] = $value['iPostCode'];
            $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'clientmaster/update/'.$value['iClientId'].'" ><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
            $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'clientmaster/delete/'.$value['iClientId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
        }

        $aData['aaData'] = $alldata;
        #echo "<pre>";
        #print_r($aData);exit;
        $json_lang = json_encode($aData);
        #echo "<pre>";
        #print_r($json_lang);exit;

        echo $json_lang;exit;
    } 

    function delete() {
        $ids= $this->uri->segment(3);

        $id = $this->clientmaster_model->delete_all($ids);

        $this->session->set_flashdata('message',"Client Master Deleted Successfully");

        redirect($this->data['base_url'].'clientmaster');
    }

    function update()
    {
        $iClientId = $this->uri->segment(3);

        $eStatus = field_enums('r_clientmaster', 'eStatus');
        
        $this->data['clientmaster'] = $this->clientmaster_model ->get_clientmaster_details($iClientId);

        $decPass = $this->decrypt($this->data['clientmaster']['vPassword']);
        $this->data['clientmaster']['vPassword']= $decPass;

        if($this->input->post())
        { 
            $clientmaster = $this->input->post('Data');
            $encPass= $this->encrypt($clientmaster['vPassword']);
            $clientmaster['vPassword'] = $encPass;
            $iClientId = $this->input->post('iClientId');
            
            $iClientId = $this->clientmaster_model->edit_clientmaster($clientmaster,$iClientId);

            $this->session->set_flashdata('message',"Client Master Updated Successfully");
            redirect($this->data['base_url'] . 'clientmaster');
        }
       
        $this->data['countries']=$this->country_model->get_all_Country();
        # for get all states
        $this->data['states']=$this->state_model->get_all_state();

        $this->data['mode'] = 'update';
        $this->data['tpl_name']= "clientmaster.tpl"; 
        $this->smarty->assign('operation','edit');
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl');
    }

     # get all states by country
    function get_all_states()
    {
        $iCountryId = $this->uri->segment(3);
        $states = $this->state_model->get_states($iCountryId);
        $options = '';
        if(count($states) > 0)
        {
            for($i=0;$i<count($states);$i++)
            {
                $options .= '<option value="'.$states[$i]['iStateId'].'">'.$states[$i]['vState'].'</option>';
            }    
        }
        else
        {
            $options .= '<option value="">-- Select State--</option>';
        }
        
        $json_lang = json_encode($options);   
        print $json_lang;
        exit;
     }   
    function action_update()
    {
        $ids = $this->input->post('iId');
        switch($this->input->post('action'))
        {
            case "Delete":
                    $iId = $this->clientmaster_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully");
                    redirect($this->data['base_url'] . 'clientmaster');
                    exit;
                    break;
        }
    } 
}
/* End of file clientmaster.php */
/* Location: ./application/controllers/clientmaster.php */
?>