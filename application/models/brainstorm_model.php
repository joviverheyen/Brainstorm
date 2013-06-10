<?php

class Brainstorm_model extends CI_Model {
	
	public function getAllBrainstorms() {
		/*Alle brainstorms ophalen om uit te lijsten in brainstorm_view
		
		SELECT 	BS_Brainstorms.PK_Brainstorm_ID,
				BS_Brainstorms.Brainstorm_Title,
				BS_Brainstorms.Brainstorm_Timestamp,
				BS_Users.User_Username 
		
		FROM 	BS_Brainstorms

		JOIN 	BS_Users 
		ON 		BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID;
		*/
		
		$this->db->select('BS_Brainstorms.PK_Brainstorm_ID, BS_Brainstorms.Brainstorm_Title, BS_Brainstorms.Brainstorm_Timestamp, BS_Users.User_Username');
		$this->db->from('BS_Brainstorms');
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID');
		$this->db->order_by("Brainstorm_Timestamp", "desc");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function addBrainstorm($data) {
		//Data uit formulier invoegen in BS_Brainstorms tabel in db
		$this->db->insert('BS_Brainstorms', $data);
		$bs_id = $this->db->insert_id();
		return $bs_id;
	}
	
	public function getBrainstormDetails($brainstorm_ID) {
		/*Details van een brainstorm uit de db ophalen
		
		SELECT * 
		FROM BS_Brainstorms
		WHERE PK_Brainstorm_ID = ?
		
		*/
		
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID');
		$q = $this->db->get_where('BS_Brainstorms', array('PK_Brainstorm_ID' => $brainstorm_ID));
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function getBrainstormReactions($brainstorm_ID) {
		/*Reacties van een brainstorm uit de db ophalen
		
		SELECT * 
		FROM BS_Reactions
		WHERE PK_Brainstorm_ID = ?
		
		*/
		
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = BS_Reactions.FK_Reaction_User_ID');
		$q = $this->db->get_where('BS_Reactions', array('FK_Reaction_Brainstorm_ID' => $brainstorm_ID));
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}

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
	
	public function getCategories() {
		$this->db->select('*');
		$this->db->from('BS_Tags');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function reply($data) {
		/*Data uit formulier invoegen als reactie*/
		$this->db->insert('BS_Reactions', $data);
	}
}
?>