<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->model('app_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
        $this->load->model('country_model', '', TRUE);
        $this->load->model('state_model', '', TRUE);
     
       

          /*
          Change :Session write for language
          */
         $this->load->model('admin_model', '', TRUE);
        // language session
        $lang= $this->session->userdata('language');
        $lang1 = $this->admin_model->get_language_details($lang);
        $this->smarty->assign('lang',$lang1);
		$this->data['mylang']=$lang1;
		
		
        // end language
    }    

    function index()
    {
        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        
        $this->data['tpl_name']= "view-administrator.tpl";
    
       
        $this->data['message'] = $this->session->flashdata('message');        
        $this->data['warning'] = $this->session->flashdata('warning');        
        $user_list = $this->admin_model->get_all_userslist();
        $this->data['user_list'] = $user_list;
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
       if($iRoleId==1){
          $this->breadcrumb->add('View Administrator', '');
       }else{
          $this->breadcrumb->add('View Client', '');
       }
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
//print_r(json_encode($this->data));die;
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function create(){
         if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        $eStatuses = field_enums('r_administrator', 'eStatus');
        
        $this->data['message'] = $this->session->flashdata('message');

        if($this->input->post())
        { 
            $Administrator = $this->input->post('Data');
			$packages = $Administrator['vPackages'];
			unset($Administrator['vPackages']);
            //check existing email id
            $vEmail = $Administrator['vEmail'];
            $check_existing_email = $this->admin_model->duplicate_checking($vEmail,'');
            #echo "<pre>";
            #print_r($check_existing_email);exit;
            
            
            if($check_existing_email[tot] > 0)
            {
                $this->session->set_flashdata('message',"Sorry, Email already exist. Please enter another one!");
                redirect($this->data['base_url'].'administrator/create');
                exit;
            }
            else
            {
                $encPass= $this->encrypt($Administrator['vPassword']);
                $Administrator['vPassword'] = $encPass;  
                $data = $Administrator;
            /*    echo "<pre>";
                print_r($data);exit;*/
                $id= $this->admin_model->save($data);
                if($Administrator['iRoleId'] = 2){
                    $datas['iAdminId'] = $id;
                   /*print_r($datas);exit;*/
                   $save_record=$this->app_model->resturantinfo_save('r_resturant_info',$datas);
                 } 
                 
                 //-- Save packages in database
                 	$pkgData['vTransactoinId'] = '';
                 	$pkgData['iAdminId'] = $id;
                 	$pkgData['vPackage'] = 'gold';
                 	$pkgData['vFirstName'] = $Administrator['vFirstName'];
                 	$pkgData['vLastName'] = $Administrator['vLastName'];
                 	$pkgData['fAmt'] = 0;
                 	$pkgData['dDateTime'] = '0000-00-00 00:00:00';
                 	$pkgData['eStatus'] = 'Success';
                 	$this->admin_model->save_packages($packages,$pkgData);
                  
                $this->session->set_flashdata('message',"User Added Successfully."); 

                redirect($this->data['base_url'].'administrator');
                exit;
            }
        }   
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Administrator', base_url()."administrator");
        $this->breadcrumb->add('Add Administrator', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
		$industries = $this->admin_model->get_all_app_industries();
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
        $this->smarty->assign('industries', $industries);
        $this->smarty->view('template.tpl'); 
    }
   
    # for delete administrator   
    function delete()
    {

        //Made Changes by : Sagar 19-5-2014 Description : Check Authentication
        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        /*create by Maksud khan
        Date: 22-5-2014
        Description:- inactive for app delete
        */
        $ids= $this->uri->segment(3);
        $already = $this->admin_model->already_admins($ids);
        if($already['eStatus']=='Inactive')
        {
            
            $this->session->set_flashdata('message',"User Already Inactive Successfully.");
           redirect($this->data['base_url'].'administrator');
        }
        else
        {
            $num=$this->admin_model->check_admin($ids);
            if($num>0)
            {
                $id=$this->admin_model->make_inactive($ids);
                $this->session->set_flashdata('message',"User Inactive Successfully.");
                //exit;
            }
            else{
               $id = $this->admin_model->delete_all($ids);
               $this->session->set_flashdata('message',"User Deleted Successfully.");
            }
            redirect($this->data['base_url'].'administrator');
        }
    }

    # for update administrator
    function update()
    {    
		// Description : Check Authentication
    


        $eStatuses = field_enums('r_administrator','eStatus');
        $iAdminId = $this->uri->segment(3);

        if($iAdminId != NULL)
        {    
            if($this->session->userdata['user_info']['iAdminId'] != $iAdminId && $this->session->userdata['user_info']['iRoleId'] != '1')
            {
                $this->session->set_flashdata('warning', '1');
                redirect($this->data['base_url'] . 'home');
                exit;   
            }
        }
        $this->data['message'] = $this->session->flashdata('message');
        //Description : login user show password.
        $this->data['admin'] = $this->admin_model->get_admin_details($iAdminId);       
    
        
        $decPass = $this->decrypt($this->data['admin']['vPassword']);
        $this->data['admin']['vPassword']= $decPass;

        //Get Paypal Info
        $this->data['paypal_info'] = $this->admin_model->get_paypal_details($iAdminId);

        //Get Fee Info
        $this->data['fee_info'] = $this->admin_model->get_fee_details($iAdminId);

        if($this->input->post())
        {
            $Admin = $this->input->post('Data');
            $iAdminId = $Admin['iAdminId'];
            $vEmail = $Admin['vEmail'];          
            $encPass= $this->encrypt($Admin['vPassword']);
            $Admin['vPassword'] = $encPass;
            $eLanguage = $Admin['eLanguage'];
            $elang = $this->session->set_userdata('language', $eLanguage);

            $data = $Admin;
            $check_existing_email = $this->admin_model->duplicate_checking($vEmail,$iAdminId);

            if($check_existing_email[tot] > 0)
            {
                $this->session->set_flashdata('message',"Sorry, Email already exist. Please enter another one!");
                redirect($this->data['base_url'].'administrator/update/'.$iAdminId);
                exit;
            }
            else
            {
                $iAdminId = $this->admin_model->edit_admin($iAdminId,$data);  
				$this->session->userdata['user_info']['vCurrency'] = $data['vCurrency'];
				if($this->data['user_info']['iRoleId']==2)
                {
					foreach($this->data['mylang'] as $val){
						if($val['rLabelName'] == 'User Updated Successfully.'){
                    		$this->session->set_flashdata('message',$val['rField']); 
						}
					}
                	
                    redirect($this->data['base_url'].'administrator/update/'.$Admin['iAdminId']);
                }           
                else
                {
                    //$this->session->set_flashdata('message',"User Updated Successfully."); 
					foreach($this->data['mylang'] as $val){
						if($val['rLabelName'] == 'User Updated Successfully.'){
                    		$this->session->set_flashdata('message',$val['rField']); 
						}
					}
                    redirect($this->data['base_url'].'administrator');
                }
                exit;
            }           
        } 
        else
        {
            if($this->data['admin'] == 0)
            {
                $this->session->set_flashdata('warning', 'delete');
                redirect($this->data['base_url'] . 'administrator');
                exit;	
            }
        }    

        #Get all Currencies
        $this->data['currencies'] = $this->admin_model->get_all_currency();
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
        //Description : Check Authentication

        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
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
        //Description : Check Authentication

        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        $ids = $this->input->post('iId');
        //echo "ID";
        
        switch($this->input->post('action'))
        {
            case "Inactive":
            case "Active":
                    $iId = $this->admin_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Updated Successfully.");
                    redirect($this->data['base_url'] . 'administrator');
                    exit;
                    break;
            case "Delete":
                    $iId = $this->admin_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully.");
                    redirect($this->data['base_url'] . 'administrator');
                    exit;
                    break;
        }
    }

    function get_administrator_listing()
    {
        //Description : Check Authentication

        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        
        $all_admin = $this->admin_model->get_all_administrator();
        
        //echo "<pre>";print_r($all_admin);exit;
        if(count($all_admin)>0) {
            foreach ($all_admin as $key => $value)
            {
                if($this->data['user_info']['iAdminId'] == $value['iAdminId'] && $this->data['user_info']['iRoleId'] == 1)
                {
                    $alldata[$key]['id'] = '<input disabled type="checkbox" name="iId[]" id="iId" value="'.$value['iAdminId'].'">';

                }
                else
                {
                    $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId"  onclick="check_uncheck();"  value="'.$value['iAdminId'].'">';
                }
                $alldata[$key]['administratorname'] = $value['vFirstName'].' '.$value['vLastName'];
                $alldata[$key]['email'] = $value['vEmail'];
                $alldata[$key]['phone'] = $value['vPhone'];
                $alldata[$key]['role'] = $value['vTitle'];
                $alldata[$key]['status'] = '<center>'.$value['eStatus'].'</center>';
                $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'administrator/update/'.$value['iAdminId'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
                //$alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'administrator/delete/'.$value['iAdminId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
                if($this->data['user_info']['iAdminId'] == $value['iAdminId'] && $this->data['user_info']['iRoleId'] == 1)
                {
                    $alldata[$key]['deleteicon'] = '<center><a class="deleteicon"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
                }
                else
                {
                    $alldata[$key]['deleteicon'] = '<center><a href="" data-toggle="modal" onclick="delete_admin('."'administrator/delete/$value[iAdminId]'".');"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
                }                                  //'<script type="text/javascript">alert("' . $msg . '"); </script>';
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
//Save Paypal Details
    function save_paypal_onfo(){
        //Description : Check Authentication

        if($this->session->userdata['user_info']['iRoleId'] != '2')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }

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

        //Description : Check Authentication

        if($this->session->userdata['user_info']['iRoleId'] != '1')
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }

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

	//edit user
	function edituser(){
		$adminId = $this->uri->segment(3);
		$currentUserId = $this->session->userdata('user_info');
        if($this->session->userdata['user_info']['iRoleId'] != '1' || ($adminId ==  $currentUserId))
        {
            $this->session->set_flashdata('warning', '1');
            redirect($this->data['base_url'] . 'home');
            exit;
        }
        $eStatuses = field_enums('r_administrator', 'eStatus');
        
        $this->data['message'] = $this->session->flashdata('message');
        
		if($this->input->post())
        { 
            $Administrator = $this->input->post('Data');
			$packages = $Administrator['vPackages'];
			unset($Administrator['vPackages']);
            //check existing email id
            //$vEmail = $Administrator['vEmail'];
            //$check_existing_email = $this->admin_model->duplicate_checking($vEmail,'');
            #echo "<pre>";
            #print_r($check_existing_email);exit;
            
            
            
                //$encPass= $this->encrypt($Administrator['vPassword']);
                //$Administrator['vPassword'] = $encPass;  
                $data = $Administrator;
            /*    echo "<pre>";
                print_r($data);exit;*/
                $this->admin_model->edit_admin($adminId,$data);
                 
                 //-- Save packages in database
                 	$pkgData['vTransactoinId'] = '';
                 	$pkgData['iAdminId'] = $adminId;
                 	$pkgData['vPackage'] = 'gold';
                 	$pkgData['vFirstName'] = $Administrator['vFirstName'];
                 	$pkgData['vLastName'] = $Administrator['vLastName'];
                 	$pkgData['fAmt'] = 0;
                 	$pkgData['dDateTime'] = '0000-00-00 00:00:00';
                 	$pkgData['eStatus'] = 'Success';
                 	$this->admin_model->delete_packages($adminId);
                 	$this->admin_model->save_packages($packages,$pkgData);
                  
                $this->session->set_flashdata('message',"User Updated Successfully."); 

                redirect($this->data['base_url'].'administrator');
                exit;
            
        } 
        
        $admin_details = $this->admin_model->get_admin_details($adminId);
        $industries = $this->admin_model->get_all_app_industries($adminId);
        $selectedindustries = $this->admin_model->get_selected_industries($adminId);
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
       	$this->data['admin'] = $admin_details;
        $this->data['mode'] = 'edituser/'.$adminId;
        $this->data['tpl_name']= "administrator.tpl"; 
        $this->smarty->assign('operation','edit'); 
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('industries', $industries);
        $this->smarty->assign('selectedindustries', $selectedindustries);
        $this->smarty->view('template.tpl'); 
    }
    

}
/* End of file administrator.php */
/* Location: ./application/controllers/administrator.php */
?>
