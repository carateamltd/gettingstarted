<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration_model extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function loadcofig(){
	    $this->db->order_by('iSettingId','desc');
	    return $this->db->get('r_configurations');
    }
    
    function update($data, $key){
	    $this->db->where('vName', $key);
	    $query = $this->db->update('r_configurations', $data);
	    return $query; 
    }
}
?>