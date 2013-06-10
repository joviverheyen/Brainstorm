<?php

class BrainstormDetail extends CI_Controller {
	
	public function show() {
		$brainstorm_ID = $this->uri->segment(3);
		$this->load->model('brainstorm_model');
		$data['brainstorm'] = $this->brainstorm_model->getBrainstormDetails($brainstorm_ID);
		$data['reactions'] = $this->brainstorm_model->getBrainstormReactions($brainstorm_ID);
		$this->load->view('brainstormDetail_view', $data);
	}
	
	public function reply() {
		$data = array(
			'Reaction_Text' => $this->input->post('add-reaction-text'),
			'FK_Reaction_Brainstorm_ID' => $this->input->post('brainstorm-id'),
			'FK_Reaction_User_ID' => $this->session->userData('userid')
		);
		
		$this->load->model('brainstorm_model');
		$this->brainstorm_model->reply($data);
		
	}
	
	
	
}

?>
