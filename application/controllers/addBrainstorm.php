<?php

class AddBrainstorm extends CI_Controller {
	
	public function index() {
		$this->load->view('addBrainstorm_view');
	}
	
	public function add() {
		$this->load->model('Brainstorm_model');
		$usern = $this->session->userdata('usern');
		$userID = $this->Brainstorm_model->getUserId($usern);
		
		$data = array (
			'Brainstorm_title' => $this->input->post('add-brainstorm-title'),
			'Brainstorm_text' => $this->input->post('add-brainstorm-text'),
			'FK_Brainstorm_User_ID' => $userID
		);
		$this->load->model('brainstorm_model');
		$bs_id = $this->brainstorm_model->addBrainstorm($data);
		
		redirect('http://www.ajweb.be/brainstorm/index.php/brainstormDetail/show/' . $bs_id);
	}
}

?>
