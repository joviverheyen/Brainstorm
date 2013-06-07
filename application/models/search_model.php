<?php

class Search_model extends CI_Model {
	
	public function searchBrainstorms($term) {
		/*
		
		SELECT	BS_Brainstorms.PK_Brainstorm_ID,
				BS_Brainstorms.Brainstorm_Title,
				BS_Brainstorms.Brainstorm_Timestamp,
				BS_Users.User_Username 
		
		FROM  	BS_Brainstorms
						
		JOIN 	BS_Users 
		ON 		BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID;
		
		WHERE  	Brainstorm_Title LIKE  '%ranch%'

		*/
		
		$this->db->select('BS_Brainstorms.PK_Brainstorm_ID, BS_Brainstorms.Brainstorm_Title, BS_Brainstorms.Brainstorm_Timestamp, BS_Users.User_Username');
		$this->db->from('BS_Brainstorms');
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID');
		$this->db->like('BS_Brainstorms.Brainstorm_Title', $term);
		$this->db->order_by("Brainstorm_Timestamp", "desc");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function searchUsers($term) {
		/*
		
		SELECT	User_Username
				PK_User_ID
		
		FROM  	BS_Users
								
		WHERE  	Brainstorm_Title LIKE  '%ranch%'

		*/
		
		$this->db->select('PK_User_ID, User_Username, User_FirstName, User_LastName');
		$this->db->from('BS_Users');
		$this->db->like('User_Username', $term);
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}	
	
}
?>