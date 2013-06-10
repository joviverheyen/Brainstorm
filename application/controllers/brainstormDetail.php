<?php

class BrainstormDetail extends CI_Controller {
	
	public function show() {
		$brainstorm_ID = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('brainstorm_model');
		$data['subscription'] = $this->brainstorm_model->checkSubscription($brainstorm_ID, $user_id);
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
	
	public function subscribe() {
		$brainstorm_ID = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('Brainstorm_model');
		
		$data = array (
			'FK_BrainstormUserLink_User_ID' => $user_id,
			'FK_BrainstormUserLink_Brainstorm_ID' => $brainstorm_ID
		);
		
		$this->Brainstorm_model->subscribe($data);
		redirect('http://ajweb.be/brainstorm/index.php/brainstormDetail/show/' . $brainstorm_ID);
	}
	
	public function unsubscribe() {
		$brainstorm_ID = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('Brainstorm_model');
		
		$data = array (
			'FK_BrainstormUserLink_User_ID' => $user_id,
			'FK_BrainstormUserLink_Brainstorm_ID' => $brainstorm_ID
		);
		
		$this->Brainstorm_model->unsubscribe($data);
		redirect('http://ajweb.be/brainstorm/index.php/brainstormDetail/show/' . $brainstorm_ID);
	}
	
	
}

?>
