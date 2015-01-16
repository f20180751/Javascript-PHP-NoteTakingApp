<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("note");
	}
	function index(){
		$entries["records"] = $this->note->get_all_notes();
		$this->load->view("notes_view", $entries);
	}
	function create(){
		if($this->note->add_note($this->input->post("title"))){
			echo json_encode($this->note->get_last_note());
		}	
	}
	function delete($id){
		echo json_encode($this->note->delete_by_id($id));
	}
	function update_title($id){
		echo json_encode($this->note->update_title($this->input->post("title"), $id));
	}
	function update_description($id){
		echo json_encode($this->note->update_description($this->input->post("description"), $id));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */