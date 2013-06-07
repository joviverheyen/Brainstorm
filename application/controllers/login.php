<?php

class Login extends CI_Controller {
	
	public function index() {
		$this->load->view('login_view');
	}
	
	public function validate_credentials() {
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		$user_id = $this->membership_model->getUserId($this->input->post('usern'));
		
		if($query) {//als true gereturnd wordt moet sessie gecreerd worden met de informatie uit de array $data
			$data = array(
				'usern' => $this->input->post('usern'),
				'userid' => $user_id,
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);	//set_userdata voegt gegevens toe aan een sessie
			redirect('brainstormList');
		}
		else {
			echo '<script type="text/javascript"> window.alert("Oops! That login is incorrect. Please try again!") </script>';
			redirect('http://www.ajweb.be/brainstorm/index.php');
		}
		
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}

?>
