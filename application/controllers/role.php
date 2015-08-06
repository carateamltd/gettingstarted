<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('role_model', '', TRUE);
    }    

    function index()
    {

        $this->data['tpl_name']= "view-role.tpl";
        $this->data['message'] = $this->session->flashdata('message');       
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Role', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    # for add role
    function create()
    {
        $eStatuses = field_enums('r_role', 'eStatus');
        if($this->input->post())
        { 
            $role = $this->input->post('Data');
            $data = $role;
            $id= $this->role_model->save($data);  
            $this->session->set_flashdata('message',"Role Added Successfully");   
            redirect($this->data['base_url'].'role');
            exit;
        }  
         
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Role', base_url()."role");
        $this->breadcrumb->add('Add Role', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->data['mode'] = 'create';
        $this->data['tpl_name']= "role.tpl";  
        $this->smarty->assign('operation','add');
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
    function get_role_listing()
    {
          
        $all_roles = $this->role_model->get_all_role();

        foreach ($all_roles as $key => $value)
        {
            $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iRoleId'].'">';
            $alldata[$key]['rolename'] = $value['vTitle'];
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
            $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'role/update/'.$value['iRoleId'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
            $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'role/delete/'.$value['iRoleId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
        }

        $aData['aaData'] = $alldata;
        #echo "<pre>";
        #print_r($aData);exit;
        $json_lang = json_encode($aData);
        #echo "<pre>";
        #print_r($json_lang);exit;

        echo $json_lang;exit;
    }   
    # for update role
    function update()
    {
        $eStatuses = field_enums('r_role', 'eStatus');
        $iRoleId = $this->uri->segment(3);
        $this->data['role'] = $this->role_model ->get_role_details($iRoleId);
        if($this->input->post())
        {
            $Role = $this->input->post('Data');
            $iRoleId = $this->input->post('iRoleId');
            $data = $Role;
            $iRoleId = $this->role_model->update($iRoleId,$data);
            $this->session->set_flashdata('message',"Role Updated Successfully");
            redirect($this->data['base_url'] . 'role');
            exit();            
        } 
        $this->data['mode'] = 'update';
        $this->data['tpl_name']= "role.tpl";  
        $this->smarty->assign('operation','edit');
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }

    function action_update()
    {
        $ids = $this->input->post('iId');
        switch($this->input->post('action'))
        {
            case "Inactive":
            case "Active":
                    $iId = $this->role_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Updated Successfully");
                    redirect($this->data['base_url'] . 'role');
                    exit;
                    break;
            case "Delete":
                    $iId = $this->role_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully");
                    redirect($this->data['base_url'] . 'role');
                    exit;
                    break;
        }
    }

    # for delete role
    function delete()
    {
        $ids= $this->uri->segment(3);
        $id = $this->role_model->delete_all($ids);
        $this->session->set_flashdata('message',"Role Deleted Successfully");
        redirect($this->data['base_url'].'role');
    }

    
}
/* End of file role.php */
/* Location: ./application/controllers/role.php */
?>