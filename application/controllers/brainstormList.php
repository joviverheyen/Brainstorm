<?php

class BrainstormList extends CI_Controller {
	
	public function index() {
		$this->load->model('brainstorm_model');
		$data['rows'] = $this->brainstorm_model->getAllBrainstorms();
		$this->load->view('brainstormList_view', $data);
	}
	
	public function newest() {
		$this->load->model('brainstorm_model');
		$data['rows'] = $this->brainstorm_model->getAllBrainstorms();
		$this->load->view('brainstormNewList_view', $data);
	}
	
	public function subscription() {
		$this->load->model('brainstorm_model');
		$user_id = $this->session->userdata('userid');
		$data['rows'] = $this->brainstorm_model->getAllSubscriptions($user_id);
		$this->load->view('brainstormSubList_view', $data);
	}
	
}

?>
