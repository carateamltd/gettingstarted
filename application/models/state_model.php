<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #count all states
    function count_state()
    {
         return $this->db->count_all("r_state");
    }

    #get listing of states
    function get_state($limit,$start)
    {
        $this->db->select('');
        $this->db->from('r_state');
        $this->db->order_by('iStateId DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    #update all state
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iStateId', $ids);
        $this->db->update('r_state', $data); 
        return $this->db->affected_rows();   
    }
    #add state
    function save($Data){
        $this->db->insert('r_state',$Data);
        return $this->db->insert_id();
    }
    # delete state
    function delete_all($ids)
    {
        $this->db->where_in('iStateId', $ids);
        $this->db->delete('r_state'); 
    }
     #get state details
    function get_state_details($iStateId)
    { 

        $this->db->select('');
        $this->db->from('r_state');
        $this->db->where('iStateId', $iStateId);      
        $query = $this->db->get();
        return $query->row_array();
    }
    #update state
    function update($iStateId, $data){
		$this->db->where('iStateId', $iStateId);
		$query = $this->db->update("r_state", $data);
		return $query; 
	}


    /*Modified By : Nizam Kadri
     Modified Date : 15-05-2014 
     Purpose : To get Sorting States at Edit time & Get States Related to UK */

     #get listing of states
    function get_all_state()
    {
        $this->db->select('iStateId,iCountryId,vState');
        $this->db->from('r_state');
        $this->db->where('iCountryId',222);
        $this->db->order_by('vState','asc');
        $query = $this->db->get();
        return $query->result_array();
    }
      #get states
    function get_states($iCountryId)
    {
        $this->db->select('iStateId,iCountryId,vState');
        $this->db->from('r_state');
        $this->db->where('iCountryId',$iCountryId);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_states()
    {
        $this->db->select('iStateId,vState,vStateCode,eStatus');
        $this->db->from('r_state');
        $query = $this->db->get();
        return $query->result_array();
    }

     #get listing of states
    function get_all_selectedstate()
    {
        $this->db->select('iStateId,iCountryId,vState');
        $this->db->from('r_state');
        $this->db->where('iCountryId',222);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>