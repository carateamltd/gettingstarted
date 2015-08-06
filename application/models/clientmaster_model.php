<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clientmaster_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }
    #count all clientmaster
    function count_clientmaster()
    {
        return $this->db->count_all("r_clientmaster");
    }
    #get listing of clientmaster
    function get_clientmaster($limit,$start)
    {
        $this->db->select('');
        $this->db->from('r_clientmaster');
        $this->db->order_by('iClientId DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    #get details of all clientmaster
    function get_clientmaster_details($id)
    {
        $this->db->select('');
        $this->db->from('r_clientmaster');
        $this->db->where('iClientId',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    #update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iClientId', $ids);
        $this->db->update('r_clientmaster', $data); 
        return $this->db->affected_rows();   
    }
    #add clientmaster
    function save($Data)
    {
        $this->db->insert('r_clientmaster',$Data);
        return $this->db->insert_id();
    }
    #delete all clientmaster
    function delete_all($ids) 
    {
        $this->db->where_in('iClientId',$ids);
        $this->db->delete('r_clientmaster');
    }
    #edit clientmaster
    function edit_clientmaster($data,$iClientId)
    {
        /*echo "ID :".$iClientId;
        echo "<pre>";
        print_r($data);exit;*/
        $this->db->where('iClientId', $iClientId);
        $query = $this->db->update("r_clientmaster", $data);
        return $query;
    }
    #get all clientmaster
    function get_all_clientmaster()
    {
        $this->db->select('');
        $this->db->from('r_clientmaster');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>