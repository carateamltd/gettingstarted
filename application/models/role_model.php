<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #count all roles
    function count_role()
    {
		return $this->db->count_all("r_role");
    }

    #get listing of roles
    /*function get_role($limit,$start)
    {
        $this->db->select('');
        $this->db->from('r_role');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_all_role()
    {
        $this->db->select('');
        $this->db->from('r_role');
        $query = $this->db->get();
        return $query->result_array();
    }

    /*function get_device()
{
$this->db->select('d.iAppId,d.iDeviceId,d.vDeviceId,a.vAppName,a.iAppId');
$this->db->from('device AS d');
$this->db->join('app AS a','a.iAppId=d.iAppId','LEFT');
$this->db->where('a.iClientId', $this->data['client_info']['iClientId']);
$this->db->order_by('iDeviceId desc');

$query = $this->db->get();
return $query->result_array();
}*/

    #get role details
    function get_role_details($iRoleId)
    {
        $this->db->select('');
        $this->db->from('r_role');
        $this->db->where('iRoleId', $iRoleId);      
        $query = $this->db->get();
        return $query->row_array();
    }
    function update($iRoleId, $data){
        $this->db->where('iRoleId', $iRoleId);
        $query = $this->db->update("r_role", $data);
        return $query; 
    }
    function save($Data)
    {
        $this->db->insert('r_role',$Data);
        return $this->db->insert_id();
    }
    function delete_all($ids) {
        $this->db->where_in('iRoleId',$ids);
        $this->db->delete('r_role');
    }

    function get_update_all($ids,$action)
    {
        $data = array('eStatus' =>$action);
        $this->db->where_in('iRoleId', $ids);
        $this->db->update('r_role', $data); 
        return $this->db->affected_rows();   
    }

    #get all  roles
    /*function get_all_role()
    {
        $this->db->select('iRoleId,vTitle');
        $this->db->from('r_role');
        $query = $this->db->get();
        return $query->result_array();
    }*/
}
?>