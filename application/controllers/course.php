<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('course_model', '', TRUE);
    }    

    function index()
    {
        $this->data['tpl_name']= "view-course.tpl";
      
     
        $this->data['message'] = $this->session->flashdata('message');       
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Course', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('template.tpl'); 
    }

    # for add course
    function create()
    {
        $eStatuses = field_enums('r_coursemaster', 'eStatus');
        if($this->input->post())
        { 
            $course = $this->input->post('Data');
            $data = $course;
            $id= $this->course_model->save($data);  
            $this->session->set_flashdata('message',"Course Added Successfully");
            redirect($this->data['base_url'].'course');
            exit;
        }       
        //breadcrumb 
        $this->breadcrumb->add('Dashboard', base_url());
        $this->breadcrumb->add('View Course', base_url()."course");
        $this->breadcrumb->add('Add course', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        //ends
        $this->data['mode'] = 'create';
        $this->data['tpl_name']= "course.tpl";  
        $this->smarty->assign('operation','add');
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('template.tpl'); 
    }

    # for update course
    function update()
    {
       
        $iCourseId = $this->uri->segment(3);
        $this->data['course'] = $this->course_model ->get_course_details($iCourseId);
        if($this->input->post())
        {
            $Course = $this->input->post('Data');
            $iCourseId = $this->input->post('iCourseId');
            $data = $Course;
            $iCourseId = $this->course_model->update($iCourseId,$data);
            $this->session->set_flashdata('message',"Course Updated Successfully");
            redirect($this->data['base_url'] . 'course');
            exit();            
        } 
        $this->data['mode'] = 'update';
        $this->data['tpl_name']= "course.tpl";  
        $this->smarty->assign('operation','edit');
        $this->smarty->assign('data', $this->data);
       
        $this->smarty->view('template.tpl'); 
    }

    # for delete course
    function delete()
    {
        $ids= $this->uri->segment(3);
        $id = $this->course_model->delete_all($ids);
        $this->session->set_flashdata('message',"Course Deleted Successfully");
        redirect($this->data['base_url']. 'course');
    }

    function action_update()
    {
        $ids = $this->input->post('iId');
        switch($this->input->post('action'))
        {
            case "Delete":
                    $iId = $this->course_model->delete_all($ids);
                    $this->session->set_flashdata('message',"Total ".count($ids)." Record(s) Deleted Successfully");
                    redirect($this->data['base_url'] . 'course');
                    exit;
                    break;
        }
    }

    function get_course_listing()
    {
      
        $all_course = $this->course_model->get_all_course();
  //  echo "<pre>";
   // print_r($all_devices);exit;
   
        foreach ($all_course as $key => $value)
        {
            $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="'.$value['iCourseId'].'">';
            $alldata[$key]['coursename'] = $value['vCourseName'];
            $alldata[$key]['editicon'] = '<center><a href="'.$this->data['base_url'] . 'course/update/'.$value['iCourseId'].'"><i title="Edit" class="icon-pencil helper-font-24"></i></a></center>';
            $alldata[$key]['deleteicon'] = '<center><a href="'.$this->data['base_url'] . 'course/delete/'.$value['iCourseId'].'"><i title="Delete" class="icon-trash helper-font-24"></i></a></center>';
            
        }
        
        $aData['aaData'] =  $alldata;
        #echo "<pre>";
        #print_r($aData);exit;
        $json_lang = json_encode($aData);
        #echo "<pre>";
        #print_r($json_lang);exit;
        
        echo $json_lang;exit;
    }
}
/* End of file course.php */
/* Location: ./application/controllers/course.php */
?>