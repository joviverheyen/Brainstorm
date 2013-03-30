<?php

class Forgot_pw extends CI_Controller {
	
	public function index() {
		$this->load->view('pw_view');
	}
	
	public function new_pw() {
		$email = $this->input->post('email');
		$this->load->model('pw_model');
		$query = $this->pw_model->validate();
		
		if($query) {
			$new_pw = $this->pw_model->generatePassword();
			
			$to      = $email;
			$subject = 'Brainstorm - New Password';
			$message = 'Hello, you requested a new password, so here it is: ' . $new_pw;
			$headers = 'From: joyce.vanherck@hotmail.com' . "\r\n" .
			    'Reply-To: joyce.vanherck@hotmail.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			
			mail($to, $subject, $message, $headers);
			
		} else {
			echo '<script type="text/javascript"> window.alert("There is no user with that email address. Please try again!") </script>';
		}
	}
}

?>
