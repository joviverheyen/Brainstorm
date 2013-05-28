<?php

class BrainstormList extends CI_Controller {
	
	public function index() {
		$this->load->model('brainstorm_model');
		$data['rows'] = $this->brainstorm_model->getAllBrainstorms();
		$this->load->view('brainstorm_view', $data);
	}
	
}

?>
