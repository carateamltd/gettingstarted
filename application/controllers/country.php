<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Country extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('country_model', '', TRUE);
    }    

    function index()
    {
        $this->data['tpl_name']= "view-country.tpl";
        $this->data['message'] = $this->session->flashdata('message');  
        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Country', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

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
                    $iId = $this->country_model->get_update_all($ids,$this->input->post('action'));
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Updated Successfully");
                    redirect($this->data['base_url'] . 'country');
                    exit;
                    break;
            case "Delete":
                    $iId = $this->country_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully");
                    redirect($this->data['base_url'] . 'country');
                    exit;
                    break;        
        }
    }


    function create(){

        $eStatus = field_enums('r_country', 'eStatus');
        if($_POST){
            $Data = $_POST['Data'];   
            $id= $this->country_model->save($Data); 
            $this->session->set_flashdata('message',"Country Added Successfully"); 
            redirect($this->data['base_url'].'country');
            exit;
        }

         //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Countries', base_url()."country");
        $this->breadcrumb->add('Add Country', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends

        $this->data['mode'] = 'create';

        $this->data['tpl_name']= "country.tpl";  
        $this->smarty->assign('operation','add');
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    function delete() {
        $ids= $this->uri->segment(3);

        $id = $this->country_model->delete_all($ids);

        $this->session->set_flashdata('message',"Country Deleted Successfully");

        redirect($this->data['base_url'].'country');
    }

    function update()
    {
        $eStatus = field_enums('r_country', 'eStatus');
        $iCountryId = $this->uri->segment(3);
       
        $this->data['country'] = $this->country_model ->get_country_details($iCountryId);

        if($this->input->post())
        { 
            $country = $this->input->post('Data');
            $iCountryId = $this->input->post('iCountryId');
            
            $iCountryId = $this->country_model->edit_country($country,$iCountryId);
            $this->session->set_flashdata('message',"Country Updated Successfully");
            redirect($this->data['base_url'] . 'country');
        }
       
        $this->data['mode'] = 'update';
        $this->data['tpl_name']= "country.tpl"; 
        $this->smarty->assign('operation','edit');
        $this->smarty->assign('eStatus', $eStatus);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl');
    }
    
    function get_country_listing()
    {
      
        $all_country = $this->country_model->get_all_country();
         
        foreach ($all_country as $key => $value)
        {
            $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iCountryId'].'">';
            $alldata[$key]['countryname'] = $value['vCountry'];
            $alldata[$key]['countrycode'] = $value['vCountryCode'];
            $alldata[$key]['countryIsdcode'] = $value['vISDcode'];
            $alldata[$key]['status'] = '<center>'.$value['eStatus'].'</center>';
            //$status = $value['eStatus'];
            /*if($status=='Active')
            {
                $alldata[$key]['status'] = '<center><a href="#" data-toggle="modal"><i title="Active" class="icon-ok-sign"></i></a></center>';
            }
            else 
            {
                $alldata[$key]['status'] = '<center><a href="#" data-toggle="modal"><i title="Inactive" class="icon-minus-sign"></i></a></center>';   
            }*/
            $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'country/update/'.$value['iCountryId'].'"> <i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
            $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'country/delete/'.$value['iCountryId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
            
        }
        $aData['aaData'] =  $alldata;
        $json_lang = json_encode($aData);
        echo $json_lang;exit;
    }
}
/* End of file Country.php */
/* Location: ./application/controllers/Country.php */
?>