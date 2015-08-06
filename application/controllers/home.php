<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', '', TRUE);
        $this->load->model('role_model', '', TRUE);
       // $this->load->model('classmaster_model', '', TRUE);
       // $this->load->model('course_model', '', TRUE);
       // $this->load->model('clientmaster_model', '', TRUE);
        $this->load->model('country_model', '', TRUE);
        $this->load->model('state_model', '', TRUE);
        $this->load->model('app_model', '', TRUE);

      /*
      Change :Session write for language
      */
      // language session
        $lang= $this->session->userdata('language');
        $lang1 = $this->admin_model->get_language_details($lang);
        $iAdminId = $this->data['user_info']['iAdminId'];
        $this->admin_model->update_r_administrator($iAdminId,$lang);
        $this->smarty->assign('lang',$lang1);
      // end language
    }    

    function index()
    {
		$this->data['warning'] = $this->session->flashdata('warning');    
        $this->data['admin']=$this->admin_model->count_admin();
        $this->data['role']=$this->role_model->count_role();
        //$this->data['class']=$this->classmaster_model->count_classmaster();
        //$this->data['course']=$this->course_model->count_course();
        //$this->data['client']=$this->clientmaster_model->count_clientmaster();
        $this->data['country']=$this->country_model->count_country();
        $this->data['state']=$this->state_model->count_state();
        
        $iClientId = $this->data[user_info][iAdminId];
        //echo $iClientId ;exit;
	    $iRoleId=$this->data[user_info][iRoleId];
        
        $this->data['app_information'] = $this->get_all_appinformation($iClientId,$iRoleId);        
        //echo "<pre>";print_r($this->data['app_information']);exit;
        
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', "");
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $locationhtml = $this->getlocationhtml(14);
        
        $this->smarty->assign('locationhtml', $locationhtml);
        $this->data['tpl_name']= "home.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    //Location html
    function getlocationhtml($iFeatureId)
	{
        $all_featurefields = $this->app_model->get_featurefields($iFeatureId);
        $this->data['iApplicationId'] = 3;
                $html .='<form name="frmlocation" id="frmlocation" method="post" action="'.$this->data['base_url'].'home/save_location" enctype="multipart/form-data">';
                $html .='<input class="span6" type="hidden" name="data[iApplicationId]" value="'.$this->data['iApplicationId'].'">';
                $html .='<div id="locationformid">
                        <div class="lean-header">
                            <h3>Add Location</h3>
                        </div>
                        <div class="lean-body">';
                $html .='<div class="midpartmainleft" >';
                foreach ($all_featurefields as $val){		  		 
                    switch ($val['eType']) {
                    case 'Textxbox':
                            $html .='<div class="row_form"> 
                                        <label>'.$val['vLabelName'].' :</label>
                                        <input class="my_inputhere" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="text" />
                                    </div>';					
                                break;
                    case 'Checkbox':
                        $html .='<div class="row_form"> 
                                        <label class="checklabel">'.$val['vLabelName'].' :</label>
                                        <input class="my_inputhere" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="checkbox" value="Yes"/>
                                    </div>';					
                                break;
                    case 'Radio':
                        $html .='<div class="row_form"> 
                                        <label class="checklabel">'.$val['vLabelName'].' :</label>
                                        <input class="my_inputhere" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="radio" />
                                    </div>';					
                                break;				
                    case 'File':
                            $html .='<div class="row_form"> 
                                    <label>'.$val['vLabelName'].' :</label>
                                    <input class="my_inputhere" id="'.$val['vDataBaseFieldName'].'" name="data['.$val['vDataBaseFieldName'].']" type="file" />
                                </div>';					
                            break;
                    case 'Textarea':
                    	$html .='<div class="row_form"> 
                                    <label>'.$val['vLabelName'].' :</label>
                                    <textarea class="my_inputhere" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                </div>';					
                            break;
                    case 'Date':
                    	$html .='<div class="row_form"> 
                                    <label>'.$val['vLabelName'].' :</label>
                                    <textarea class="my_inputhere" name="data['.$val['vDataBaseFieldName'].']" id="'.$val['vDataBaseFieldName'].'" cols="" rows=""></textarea>
                                </div>';					
                        break;
                    }
                }
                $html .='<div class="row_form">
                    <label class="checklabel">&nbsp;</label>
                    <button type="button" class="btn btn-primary"  id="locationbtn" name="locationbtn" onclick="location_validation();"><i class="icon-ok"></i> Save</button>
                    </div>';
                $html .='</div>';
                $html .='</div>
                <div class="lean-footer">
                    <a href="javascript:void(0);" onclick="closeleanmodal();">Close</a>
                </div>
            </div>
            </from>';
            
            //echo $html;exit;
            
         	$html .='<div class="add_btn"><a class="btn btn-primary"  href="#locationformid" rel="leanModal" id="go" style="float:right;">Add New Sub Tab</a></div>';
            
            $allapplocation = $this->app_model->get_appwise_locations(3);
            // echo "<pre>";
            // print_r($allapplocation);exit;
            
              $html .='<div id="table_listing">
                          <table width="100%" cellspacing="0" cellpadding="0" class="table table-striped table-hover table-bordered" id="sub_tab_listing">
                          <tr class="nodrop">
                              <th>Website</th>
                              <th>Email</th>
                              <th>Latitude</th>
                              <th>Longitude</th>
                              <th colspan="2"></th>
                          </tr>';
                    
                          if(count($allapplocation) > 0){
                              for($i=0;$i<count($allapplocation);$i++){
                              $html .='<tr class="row1a">
                                           <td width="25%"><p class="sp_title">'.$allapplocation[$i]["vWebsite"].'</p></td>
                                           <td width="25%" align="center">'.$allapplocation[$i]["vEmail"].'</td>
                                           <td width="25%" align="center">'.$allapplocation[$i]["vLatitude"].'</td>
                                           <td width="25%" align="center">'.$allapplocation[$i]["vLongitude"].'</td>
                                           <td align="center" width="12%"><a class="apptab_edit button white"  href="javascript:void(0);"><i class="icon-pencil helper-font-24" title="Edit"></i></a></td>
                                           <td align="center" width="13%"><a class="button grey"><i class="icon-trash helper-font-24" title="Delete"></i></a></td>
                                      </tr>';    
                              }    
                          }else{
                              $html .='<tr class="row1a" colspan="5">No events founds.</tr>';
                          }
                           

                      $html .='</table>';
              $html .='</div>';
        return $html;  
    }

    function save_location(){
        if($this->input->post()){
            $location = $this->input->post('data');
            
            $iLocationId = $this->app_model->save('r_app_location_value',$location);
            if($iLocationId){
                redirect($this->data['base_url'] . 'home');
            }
        }
    }
	
    function checkdata()
    {
          $this->data['message'] = $this->session->flashdata('message');
          $id = $this->uri->segment(3);
          $step= $this->uri->segment(2);
          echo $this->data['step']=$step;
          echo $this->data['iApplicationId'] = $id;
          echo $iClientId = $this->data[user_info][iAdminId];
          echo $iRoleId=$this->data[user_info][iRoleId];
          //POUP
          //$this->data['appindustry'] = $this->app_model->get_all_appindustry();
          $this->data['appinformation'] = $this->app_model->get_all_appinformation_id($id,$iClientId,$iRoleId);
       
          if(!$this->data['appinformation']){
            //$this->data['tpl_name']= "404.tpl";     
            $this->session->set_flashdata('message',"The records which you are trying to view/delete has been already deleted by another user. Please refresh your browser and perform the action again");
            redirect($this->data['base_url']);
          }else{
            redirect($this->data['base_url'].'app/step2/'. $id);
          	exit();
       }
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */


