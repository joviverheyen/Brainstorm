<?php

class Profile extends CI_Controller {
	
	public function index() {
		$user_id = $this->uri->segment(3);
		$this->load->model('Profile_model');
		$user_data['rows'] = $this->Profile_model->getUser($user_id);
		$user_data['brainstorms'] = $this->Profile_model->getUserIdeas($user_id);
		
		$this->load->view('profile_view', $user_data); // gegevens user naar view sturen
	}
	
}

?>
