<?php

class AddBrainstorm extends CI_Controller {
	
	public function index() {
		$this->load->view('addBrainstorm_view');
	}
	
	public function add() {
		$data = array (
			'Brainstorm_title' => $this->input->post('add-brainstorm-title'),
			'Brainstorm_text' => $this->input->post('add-brainstorm-text')
		);
		$this->load->model('brainstorm_model');
		$this->brainstorm_model->addBrainstorm($data);
	}
}

?>
