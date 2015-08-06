<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #count all course
    function count_course()
    {
		return $this->db->count_all("r_coursemaster");
    }

    #get listing of course
    function get_course($limit,$start)
    {
        $this->db->select('');
        $this->db->from('r_coursemaster');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    #get course details
    function get_course_details($iCourseId)
    {
        $this->db->select('');
        $this->db->from('r_coursemaster');
        $this->db->where('iCourseId', $iCourseId);      
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iCourseId', $ids);
        $this->db->update('r_coursemaster', $data); 
        return $this->db->affected_rows();   
    }

    # for add course
    function save($Data)
    {
        $this->db->insert('r_coursemaster',$Data);
        return $this->db->insert_id();
    }

    #for delete course
    function delete_all($ids) {
        $this->db->where_in('iCourseId',$ids);
        $this->db->delete('r_coursemaster');
    }

    # for update course
    function update($iCourseId, $data){
        $this->db->where('iCourseId', $iCourseId);
        $query = $this->db->update("r_coursemaster", $data);
        return $query; 
    }

    #get all  course
    function get_all_course()
    {
        $this->db->select('iCourseId,vCourseName');
        $this->db->from('r_coursemaster');
         $this->db->order_by('iCourseId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>