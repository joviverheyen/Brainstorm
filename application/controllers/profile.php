<?php

class Profile extends CI_Controller {
	
	public function index() {
		$profile_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('Profile_model');
		$user_data['follow'] = $this->Profile_model->checkFollow($profile_id, $user_id);
		$user_data['rows'] = $this->Profile_model->getUser($profile_id);
		$user_data['brainstorms'] = $this->Profile_model->getUserIdeas($profile_id);
		
		$this->load->view('profile_view', $user_data); // gegevens user naar view sturen
	}
	
	public function following() {
		$profile_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('Profile_model');
		$user_data['follow'] = $this->Profile_model->checkFollow($profile_id, $user_id);
		$user_data['rows'] = $this->Profile_model->getUser($profile_id);
		$user_data['users'] = $this->Profile_model->getFollowing($profile_id);
		
		$this->load->view('profileFollowing_view', $user_data); // gegevens user naar view sturen
	}
	
	public function followers() {
		$profile_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('Profile_model');
		$user_data['follow'] = $this->Profile_model->checkFollow($profile_id, $user_id);
		$user_data['rows'] = $this->Profile_model->getUser($profile_id);
		$user_data['users'] = $this->Profile_model->getFollowers($profile_id);
		
		$this->load->view('profileFollowers_view', $user_data); // gegevens user naar view sturen
	}
	
	public function follow() {
		$profile_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('Profile_model');
		
		$data = array (
			'FK_UserUserLink_User_ID' => $user_id,
			'FK_UserUserLink_Following_ID' => $profile_id
		);
		
		$this->Profile_model->follow($data);
		redirect('http://ajweb.be/brainstorm/index.php/profile/index/' . $profile_id);
	}
	
	public function unfollow() {
		$profile_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$this->load->model('Profile_model');
		
		$data = array (
			'FK_UserUserLink_User_ID' => $user_id,
			'FK_UserUserLink_Following_ID' => $profile_id
		);
		
		$this->Profile_model->unfollow($data);
		redirect('http://ajweb.be/brainstorm/index.php/profile/index/' . $profile_id);
	}
	
}

?>
