<?php

class EditProfile extends CI_Controller {
	
	public function index() {
		$this->load->model('Profile_model');
		$user_id = $this->session->userdata('userid');
		$data['rows'] = $this->Profile_model->getUser($user_id);
		$data['fields'] = $this->Profile_model->getFields();
		
		$this->load->view('editProfile_view', $data); // gegevens user naar view sturen
	}
	
	public function update() {
		$this->load->model('Profile_model');
		$user_id = $this->session->userdata('userid');
		
		$data = array (
			'User_Username' => $this->input->post('update-username'),
			'User_FirstName' => $this->input->post('update-fn'),
			'User_LastName' => $this->input->post('update-ln'),
			'User_Email' => $this->input->post('update-email'),
			'User_Bio' => $this->input->post('update-bio'),
			'User_Website' => $this->input->post('update-website'),
			'User_Twitter' => $this->input->post('update-twitter'),
			'User_Facebook' => $this->input->post('update-fb'),
			'User_Dribbble' => $this->input->post('update-dribbble'),
			'User_Behance' => $this->input->post('update-behance'),
			'FK_User_Field1' => $this->input->post('update-field1'),
			'FK_User_Field2' => $this->input->post('update-field2'),
			'FK_User_Field3' => $this->input->post('update-field3')
		);
		
		$p_id = $this->Profile_model->updateUser($data, $user_id);
		
		redirect('http://www.ajweb.be/brainstorm/index.php/profile/index/' . $this->session->userdata('userid'));
	}
	
}

?>
