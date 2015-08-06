<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class loginlogs_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }

    #make login entry
    function loginentry($data)
    {
        $this->db->insert('r_loginlogs', $data);
        return $this->db->insert_id();
    }

    #make login entry
    function logoutentry($data)
    {
        $this->db->update("r_loginlogs", $data, array('iLoginLogId' => $data['iLoginLogId']));
        return $this->db->affected_rows();   
    }

     #count all users
    function count_loginlogs()
    {
        $this->db->select('l.iLoginLogId,l.iId,l.vFirstName,l.vLastName,r.vTitle,l.vEmail,
                r.vTitle,l.dLoginDate,l.dLogoutDate,l.vIP');
        $this->db->from('r_loginlogs as l');
        $this->db->join('r_administrator as a','l.iId =a.iAdminId');
        $this->db->join('r_role as r',"a.iRoleId = r.iRoleId");
        $this->db->order_by('l.iLoginLogId desc');
        $query = $this->db->get();
        return count($query->result_array());

    }

    #get listing of users
    function get_loginlogs($limit,$start)
    {
      $this->db->select('l.iLoginLogId,l.iId,l.vFirstName,l.vLastName,l.vEmail,
                l.vIP,r.vTitle  ,l.dLoginDate,l.dLogoutDate');
        $this->db->from('r_loginlogs as l');
        $this->db->join('r_administrator as a','l.iId =a.iAdminId');
        $this->db->join('r_role as r',"a.iRoleId = r.iRoleId");
        $this->db->order_by('l.iLoginLogId desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    #delete multiple record
    function delete_all($ids)
    {
        $this->db->where_in('iLoginLogId', $ids);
        $this->db->delete('r_loginlogs'); 
    }
}
?>


