<?php

class Membership_model extends CI_Model {
	
	public function validate() {
		// zie of user bestaad en email en password matchen
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
		// maak nieuwe user aan
		$new_member_insert_data = array(
			'FirstName' => ucwords($this->input->post('firstname')),
			'LastName' => ucwords($this->input->post('lastname')),
			'Email' => strtolower($this->input->post('email')),
			'Password' => md5($this->input->post('password')),
			'Class' => $this->input->post('class'),
			'Website' => $this->input->post('website'),
			'Avatar' => 'none.jpg'
		);
		
		// MEMBER AANMAKEN
		$insert = $this->db->insert('tblUsers', $new_member_insert_data);
		$userid = $this->db->insert_id(); // id van nieuwe user
		
		// TOEVOEGEN AAN GROEP
		$class = $this->input->post('class'); // selected class
		$this->db->select("GroupID"); // selecteer ID van deze klas
		$this->db->from("tblGroups");
		$this->db->where("GroupName", $class);
		$query = $this->db->get();
		if($query->num_rows() > 0){
    		$row = $query->row();
		}
		$groupid = $row->GroupID;
		$data = array(
				'FK_UserID' => $userid,
				'FK_GroupID' => $groupid
			);
		$this->db->insert('tblGroupMembers', $data);
		$data = array(
				'FK_UserID' => $userid,
				'FK_GroupID' => 1
			);
		$this->db->insert('tblGroupMembers', $data);
		
		return $insert;
	}		
	
}
?>