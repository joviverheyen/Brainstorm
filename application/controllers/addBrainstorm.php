<?php

class AddBrainstorm extends CI_Controller {
	
	public function index() {
		$this->load->model('Brainstorm_model');
		$data['row'] = $this->Brainstorm_model->getCategories();
		$this->load->view('addBrainstorm_view', $data);
	}
	
	public function add() {
		$this->load->model('Brainstorm_model');
		$usern = $this->session->userdata('usern');
		$userID = $this->Brainstorm_model->getUserId($usern);
		$tags = $this->input->post('category');
		
		if($tags) {
			while(count($tags)<3) {
				array_push($tags, "NULL");
			}
		}
		
		$data = array (
			'Brainstorm_title' => $this->input->post('add-brainstorm-title'),
			'Brainstorm_text' => $this->input->post('add-brainstorm-text'),
			'FK_Brainstorm_User_ID' => $userID,
			'FK_Brainstorm_Tag1' => $tags[0],
			'FK_Brainstorm_Tag2' => $tags[1],
			'FK_Brainstorm_Tag3' => $tags[2],
			'Brainstorm_Privacy' => $this->input->post('privacy')
		);

		$bs_id = $this->Brainstorm_model->addBrainstorm($data);
		
		redirect('http://www.ajweb.be/brainstorm/index.php/brainstormDetail/show/' . $bs_id);
	}
}

?>
