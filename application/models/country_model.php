<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    #count all countries
    function count_country()
    {
        return $this->db->count_all("r_country");
    }

    #get listing of countries
    function get_country($limit,$start)
    {
        $this->db->select('');
        $this->db->from('r_country');
        $this->db->order_by('iCountryId DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    #get details of all country
    function get_country_details($id)
    {
        $this->db->select('');
        $this->db->from('r_country');
        $this->db->where('iCountryId',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    #update all
    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iCountryId', $ids);
        $this->db->update('r_country', $data); 
        return $this->db->affected_rows();   
    }
    #add country
    function save($Data){
        $this->db->insert('r_country',$Data);
        return $this->db->insert_id();
    }
    #delete all country
    function delete_all($ids) {
        $this->db->where_in('iCountryId',$ids);
        $this->db->delete('r_country');
    }
    #edit country
    function edit_country($data,$iCountryId)
    {
        $this->db->where('iCountryId', $iCountryId);
        $query = $this->db->update("r_country", $data);
        return $query;
    }
    #get all country 
    function get_all_country()
    {
        $this->db->select('iCountryId,vCountry,vCountryCode,vISDcode,eStatus');
        $this->db->from('r_country');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>