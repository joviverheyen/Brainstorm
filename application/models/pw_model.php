<?php

class Pw_model extends CI_Model {
	
	public function validate() {
		// does user exist?
		$email = $this->input->post('email');
		$this->db->where('User_Email', $email);
		$query = $this->db->get('BS_Users');
		
		if($query->num_rows == 1) {	//als de select query 1 en slechts 1 resultaat terug stuurt		
			return true;			// return true naar de controller.
		}
	}	
	
	public function generatePassword($length=9, $strength=0) {
		$vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '23456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
	 
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
		return $password;
	}
	
	public function updatePassword($pw) {
		// NEW PW MOET NOG GEUPDATE WORDEN
	}
	
}
?>