<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class app_reservation extends MY_Controller
	{
		function __construct()
	    {
	        parent::__construct();        
	        $this->load->model('reservation_tab_model', '', TRUE);
	       
	    }
	    function index()
	    {
			
		}
		
		function new_service()
		{
			$data=$this->input->post();
			$service_id = $this->reservation_tab_model->add_service($data);
			echo $service_id; 
			exit;

		}
		
		function update_gen_info()
		{
			$data=$this->input->post();
			//echo '<pre>'; print_r($data);
			$this->reservation_tab_model->update_gen_info($data);
			
		}
		
		function add_new_location()
		{
			$data=$this->input->post();
			$newid = $this->reservation_tab_model->insert_new_location($data);
			echo json_encode($newid);
		}
		
		function get_location_details_by_id(){
			$data=$this->input->post();
			$loc_data = $this->reservation_tab_model->get_location_details_by_id($data['iLocationId']);
			echo json_encode($loc_data);
		}
		
		function update_location(){
			$data = $this->input->post();
			$id = $this->reservation_tab_model->update_location($data);
			echo $id;
		}
		
		function delete_location(){
			$data = $this->input->post();
			//echo '<pre>'; print_r($data); exit;
			$this->reservation_tab_model->delete_location($data);
		}
		function get_service_details_by_id(){
			$data=$this->input->post();
			/*echo '<pre>'; print_r($data); exit;*/
			$service_data = $this->reservation_tab_model->get_service_details_by_id($data['iServiceId']);
			echo json_encode($service_data);

		}
		function update_service(){
			$data = $this->input->post();
			//echo '<pre>'; print_r($data); exit;
			$id = $this->reservation_tab_model->update_service($data);
			echo $id;
		}
		function delete_service(){
			$data = $this->input->post();
			$service_delete = $this->reservation_tab_model->delete_service($data);
		}
		
	}
?>