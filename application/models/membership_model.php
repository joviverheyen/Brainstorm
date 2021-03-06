<?php

class Membership_model extends CI_Model {
	
	public function validate() {
		// zie of user bestaat en email en password matchen
		$user = $this->input->post('usern');
		$pw = $this->input->post('password');
		$this->db->where('User_Username', strtolower($user));
		$this->db->where('User_Password', md5($pw));
		$query = $this->db->get('BS_Users');
		
		if($query->num_rows == 1) {	//als de select query 1 en slechts 1 resultaat terug stuurt		
			return true;			// return true naar de controller.
		}
	}
	
	public function update_last_login() {
		// update LastLogin veld
		$email = $this->input->post('email');
		$nu = date("Y-m-d H:i:s");
		$data = array ('LastLogin' => $nu);
		
		$this->db->where('Email', $email);
		$this->db->update('tblUsers', $data); 
	}
	
	public function create_member() {
		// Array opvullen met gegevens uit invulformulier
		$new_member_insert_data = array(
			'User_Username' => ucwords($this->input->post('usern')),
			'User_Email' => strtolower($this->input->post('email')),
			'User_Password' => md5($this->input->post('password'))
		);
		
		// Nieuwe gebruiker toevoegen aan databank
		$insert = $this->db->insert('BS_Users', $new_member_insert_data);
		$userid = $this->db->insert_id(); // id van nieuwe user
	}		
	
	function getUserId($usern) {
		// deze functie returned de userID op basis van het username van de user die opgeslagen is in de sessie.
		$this->db->select('PK_User_ID');
		$this->db->from('BS_Users');
		$this->db->where('User_Username', $usern);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
	  			$row = $query->row();
		}
		return $row->PK_User_ID;
	}
}
?>