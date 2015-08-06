<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cms_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    #get Page details
    function get_page_details($pageName)
    { 
        $this->db->select('');
        $this->db->from('r_web_language_details');
        $this->db->where('rPageName', $pageName);      
        $query = $this->db->get();
        return $query->num_rows() == 0 ? 0 : $query->result_array();
    }
    
    //Update Content of the Page
    function update_details($id,$data1){
    	$data = array('rEnglish' => $data1['en'],
    					'rFrench' => $data1['fr']
    				);
		$this->db->where('rLangDetailId', $id);
        $query = $this->db->update("r_web_language_details", $data);
        return $query;  
	}

    function get_all_pages(){
        //$this->db->select('rLangId,rPageUrl');
        //$this->db->from('r_web_language');
        $this->db->select('rLangId,rPageName');
        $this->db->distinct('rPageName');
        $this->db->from('r_web_language_details');
        $query = $this->db->get();
        //echo $this->db->last_query();
        //exit;
        return $query->result_array();
    }
    
    function add_tab($adddata){
    	$data = array(
		   'rLangId' => '1' ,
		   'rPageName' => $adddata['cms_page_name'] ,
		   'rLabelName' => $adddata['label_name'],
		   'rEnglish' => $adddata['label_english'],
		   'rFrench' => $adddata['label_french']
		);

		$this->db->insert('r_web_language_details', $data);
	}
   
}
?>