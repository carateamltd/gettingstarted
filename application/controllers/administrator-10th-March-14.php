<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class administrator extends MY_Controller
{
    function __construct()
    {
        parent::__construct();        
	    $this->load->model('app_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
        $this->load->model('country_model', '', TRUE);
        $this->load->model('state_model', '', TRUE);
        $this->load->model('admin_model', '', TRUE);
	}    

    function index()
    {
    	$this->data['tpl_name']= "view-administrator.tpl";
	
	   
        $this->data['message'] = $this->session->flashdata('message');        
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

    function create(){
		$eStatuses = field_enums('slb_administrator', 'eStatus');
        if($this->input->post())
        { 
            $Administrator = $this->input->post('Data');
            $encPass= $this->encrypt($Administrator['vPassword']);
            $Administrator['vPassword'] = $encPass;  
			$data = $Administrator; 
            $id= $this->admin_model->save($data);  
            $this->session->set_flashdata('message',"Administrator Added Successfully"); 
            redirect($this->data['base_url'].'administrator');
            exit;
        }   
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Administrator', base_url()."administrator");
        $this->breadcrumb->add('Add Administrator', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        # for get all roles
        $this->data['roles']=$this->role_model->get_all_role();
        # for get all countries
        $this->data['countries']=$this->country_model->get_all_Country();
        # for get all states
        $this->data['states']=$this->state_model->get_all_selectedstate();
       
        $this->data['mode'] = 'create';
        $this->data['tpl_name']= "administrator.tpl"; 
        $this->smarty->assign('operation','add'); 
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }
   
    # for delete administrator   
    function delete()
    {
        $ids= $this->uri->segment(3);
        $id = $this->admin_model->delete_all($ids);
        $this->session->set_flashdata('message',"Administrator Deleted Successfully");
        redirect($this->data['base_url'].'administrator');
    }

    # for update administrator
    function update()
    {
        $eStatuses = field_enums('slb_administrator','eStatus');
        $iAdminId = $this->uri->segment(3);
        $this->data['admin'] = $this->admin_model ->get_admin_details($iAdminId);
	   //echo "<pre>";print_r( $this->data['admin']['iRoleId']);exit;
		
        $decPass = $this->decrypt($this->data['admin']['vPassword']);
        $this->data['admin']['vPassword']= $decPass;

//Get Paypal Info
        $this->data['paypal_info'] = $this->admin_model ->get_paypal_details($iAdminId);
//Get Fee Info
        $this->data['fee_info'] = $this->admin_model ->get_fee_details($iAdminId);

        if($this->input->post())
        {
            $Admin = $this->input->post('Data');
            $encPass= $this->encrypt($Admin['vPassword']);
            $Admin['vPassword'] = $encPass;
            $iAdminId = $this->input->post('iAdminId');
		  
            $data = $Admin;
            $iAdminId = $this->admin_model->edit_admin($iAdminId,$data);
            $this->session->set_flashdata('message',"Administrator Updated Successfully");
		  //echo "<pre>";print_r($this->data);exit;
		  if($this->data['user_info']['iRoleId']==2){
		    redirect($this->data['base_url'] . 'administrator/update/'.$this->input->post('iAdminId'));	 
		  }else{
		  redirect($this->data['base_url'] . 'administrator');	 
		  }            
            exit();     
        } 

        # for get all roles
        $this->data['roles']=$this->role_model->get_all_role();
        # for get all countries
        $this->data['countries']=$this->country_model->get_all_Country();
        # for get all states
        $this->data['states']=$this->state_model->get_all_state();

        $this->data['mode'] = 'update';
        $this->data['tpl_name']= "edit_administrator.tpl";  
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
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
        //echo "ID";
        
        switch($this->input->post('action'))
        {
            case "Inactive":
            case "Active":
                    $iId = $this->admin_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Updated Successfully");
                    redirect($this->data['base_url'] . 'administrator');
                    exit;
                    break;
            case "Delete":
                    $iId = $this->admin_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully");
                    redirect($this->data['base_url'] . 'administrator');
                    exit;
                    break;
        }
    }

    function get_administrator_listing()
    {
        
        $all_admin = $this->admin_model->get_all_administrator();
        
        #echo "<pre>";
        #print_r($all_admin);exit;
        if(count($all_admin)>0) {
            foreach ($all_admin as $key => $value)
            {
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iAdminId'].'">';
                $alldata[$key]['administratorname'] = $value['vFirstName'].' '.$value['vLastName'];
                $alldata[$key]['email'] = $value['vEmail'];
                $alldata[$key]['phone'] = $value['vPhone'];
                $alldata[$key]['role'] = $value['vTitle'];
                $alldata[$key]['status'] = '<center>'.$value['eStatus'].'</center>';
                $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'administrator/update/'.$value['iAdminId'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
                $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'administrator/delete/'.$value['iAdminId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
            }
                $aData['aaData'] = $alldata;
        }
        else {
            $aData['aaData'] = "";  
        }
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
        
    }
//Save Paypal Details
    function save_paypal_onfo(){
        $iPaypalinfoId = $this->input->post('iPaypalinfoId');
        $data = $this->input->post('Data');
        $exist_info =  $this->admin_model->get_paypal_details($data['iClientId']);
        if($exist_info){
            $iPaypalinfoId = $this->admin_model->edit_paypal_details($iPaypalinfoId,$data);
        }else{
            $iPaypalinfoId = $this->admin_model->save_paypal_info($data); 
        }
        redirect($this->data['base_url'] . 'administrator/update/'.$data['iClientId']);

    }
//Save Fee Details
    function save_fee_onfo(){
        $data = $this->input->post('data');
        $iClientId = $this->input->post('iClientId');
        $deleteId =  $this->admin_model->delete_all_fee($iClientId);
       // echo '<pre>';print_r($iClientId);exit;
        foreach ($data as $key => $value) {
            if($value['vFeetype'] != "" && $value['fPrice'] != ""){
                $value['iClientId'] = $iClientId;
                $iFeetypeId =  $this->admin_model->save_fee_info($value);
            }
        }
        redirect($this->data['base_url'] . 'administrator/update/'.$iClientId);
    }



}
/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */
?>