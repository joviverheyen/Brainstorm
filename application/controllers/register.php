<?php

class Register extends CI_Controller {
	
	public function index() {
		$this->load->view('register_view');
	}

	public function create_member() {
		$this->load->library('form_validation'); //structuur: field name, error message, validation rules
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_message('required', '%s is een verplicht veld!');
		$this->form_validation->set_rules('firstname', 'Voornaam', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('lastname', 'Achternaam', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('email', 'Email', 'callback_checkemail');
		
		if($this->form_validation->run() == FALSE) { //loopt alle gestelde regels af, als er 1 of meerdere niet voldoen wordt FALSE gereturned
			$this->load->view('register_view');
		}
		else { // als alle validatieregels gerespecteerd worden, mag verder gegaan worden met de registratie.
			$this->load->model('membership_model');
			if($query = $this->membership_model->create_member()) { // als TRUE (signup geslaagd) wordt gereturned vanuit membership_model create_member,
				$this->load->view('registered_view');				// wordt de gebruiker doorverwezen naar de pagina die zijn registratie bevestigd
			}
			else {
				$this->load->view('register_view');					// anders keert hij terug naar het registratie formulier.
			}
		}	
	}
	
	public function checkemail($string) {
		if (stristr($string,'@student.lessius.eu') !== false) return true;
    	if (stristr($string,'@lessius.eu') !== false) return true;
		$this->form_validation->set_message('checkemail', 'Je kan enkel registreren met een geldig Lessius emailadres.');
        return FALSE;
	}
}
?>