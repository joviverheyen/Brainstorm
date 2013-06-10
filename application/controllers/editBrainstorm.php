<?php

class EditBrainstorm extends CI_Controller {
	
	public function index() {
		$brainstorm_ID = $this->uri->segment(3);
		$this->load->model('Brainstorm_model');
		$data['brainstorm'] = $this->Brainstorm_model->getBrainstormDetails($brainstorm_ID);
		$data['category'] = $this->Brainstorm_model->getCategories();
		$this->load->view('editBrainstorm_view', $data);
	}
	
	public function edit() {
		$this->load->model('Brainstorm_model');
		$usern = $this->session->userdata('usern');
		$userID = $this->Brainstorm_model->getUserId($usern);
		$tags = $this->input->post('category');
		$brainstorm_ID = $this->input->post('edit-brainstorm-id');
		
		if($tags) {
			while(count($tags)<3) {
				array_push($tags, "NULL");
			}
		}
		
		$data = array (
			'Brainstorm_title' => $this->input->post('edit-brainstorm-title'),
			'Brainstorm_text' => $this->input->post('edit-brainstorm-text'),
			'FK_Brainstorm_User_ID' => $userID,
			'FK_Brainstorm_Tag1' => $tags[0],
			'FK_Brainstorm_Tag2' => $tags[1],
			'FK_Brainstorm_Tag3' => $tags[2],
			'Brainstorm_Privacy' => $this->input->post('privacy'),
			'Brainstorm_Status' => $this->input->post('status')
		);
		$this->load->model('brainstorm_model');
		$this->brainstorm_model->editBrainstorm($data, $brainstorm_ID);
		
		redirect('http://www.ajweb.be/brainstorm/index.php/brainstormDetail/show/' . $brainstorm_ID);
	}
}