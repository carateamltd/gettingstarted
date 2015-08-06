    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class classmaster_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    #count all classmaster
    function count_classmaster()
    {
        return $this->db->count_all("r_classmaster");
    }
    #get listing of classmaster
    function get_classmaster($limit,$start)
    {
        $this->db->select('');
        $this->db->from('r_classmaster');
        $this->db->order_by('iClassId DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    #get details of all classmaster
    function get_classmaster_details($id)
    {
        $this->db->select('');
        $this->db->from('r_classmaster');
        $this->db->where('iClassId',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    #update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iClassId', $ids);
        $this->db->update('r_classmaster', $data); 
        return $this->db->affected_rows();   
    }
    #add classmaster
    function save($Data){
        $this->db->insert('r_classmaster',$Data);
        return $this->db->insert_id();
    }
    #delete all classmaster
    function delete_all($ids) {
        $this->db->where_in('iClassId',$ids);
        $this->db->delete('r_classmaster');
    }
    #edit classmaster
    function edit_classmaster($data,$iClassId)
    {
        $this->db->where('iClassId', $iClassId);
        $query = $this->db->update("r_classmaster", $data);
        return $query;
    }
    #get all classmaster
    function get_all_classmaster()
    {
        $this->db->select('');
        $this->db->from('r_classmaster');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>