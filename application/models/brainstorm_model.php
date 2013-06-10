<?php

class Brainstorm_model extends CI_Model {
	
	public function getAllBrainstorms() {
		/* Alle brainstorms ophalen om uit te lijsten in brainstorm_view */
		
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
	
	public function getAllFollowing($user_id) {
		/* SELECT *
		FROM BS_Brainstorms
		
		INNER JOIN BS_Users ON BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID
		INNER JOIN BS_UserUserLinks ON BS_UserUserLinks.FK_UserUserLink_Following_ID = BS_Users.PK_User_ID
		
		WHERE BS_UserUserLinks.FK_UserUserLink_User_ID = 1
		ORDER BY Brainstorm_Timestamp DESC */
		
		
		$this->db->select('BS_Brainstorms.PK_Brainstorm_ID, BS_Brainstorms.Brainstorm_Title, BS_Brainstorms.Brainstorm_Timestamp, BS_Users.User_Username');
		$this->db->from('BS_Brainstorms');
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID');
		$this->db->join('BS_UserUserLinks', 'BS_UserUserLinks.FK_UserUserLink_Following_ID = BS_Users.PK_User_ID');
		$this->db->where('BS_UserUserLinks.FK_UserUserLink_User_ID', $user_id);
		$this->db->order_by("Brainstorm_Timestamp", "desc");
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function getAllSubscriptions($user_id) {
		/* Alle subscriptions ophalen om uit te lijsten in brainstorm_view */
		/* SELECT BS_Brainstorms.PK_Brainstorm_ID, BS_Brainstorms.Brainstorm_Title,
		 BS_Brainstorms.Brainstorm_Timestamp, BS_Users.User_Username
		FROM BS_Brainstorms
		JOIN BS_Users ON BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID
		JOIN BS_BrainstormUserLinks ON BS_BrainstormUserLinks.FK_BrainstormUserLink_Brainstorm_ID = BS_Brainstorms.PK_Brainstorm_ID
		ORDER BY Brainstorm_Timestamp DESC */
		
		$this->db->select('BS_Brainstorms.PK_Brainstorm_ID, BS_Brainstorms.Brainstorm_Title, BS_Brainstorms.Brainstorm_Timestamp, BS_Users.User_Username');
		$this->db->from('BS_Brainstorms');
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID');
		$this->db->join('BS_BrainstormUserLinks', 'BS_BrainstormUserLinks.FK_BrainstormUserLink_Brainstorm_ID = BS_Brainstorms.PK_Brainstorm_ID');
		$this->db->where('FK_BrainstormUserLink_User_ID', $user_id);
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
		
		$this->db->select('*, Tag1.Tag_Label AS Tag_Label1, Tag2.Tag_Label AS Tag_Label2, Tag3.Tag_Label AS Tag_Label3');
		$this->db->from('BS_Brainstorms');
		
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = BS_Brainstorms.FK_Brainstorm_User_ID');
		
		$this->db->join('BS_Tags AS Tag1', 'Tag1.PK_Tag_ID = BS_Brainstorms.FK_Brainstorm_Tag1', 'left');
		$this->db->join('BS_Tags AS Tag2', 'Tag2.PK_Tag_ID = BS_Brainstorms.FK_Brainstorm_Tag2', 'left');
		$this->db->join('BS_Tags AS Tag3', 'Tag3.PK_Tag_ID = BS_Brainstorms.FK_Brainstorm_Tag3', 'left');
		$this->db->where('PK_Brainstorm_ID', $brainstorm_ID);
		$q = $this->db->get();
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
	
	public function subscribe($data) {
		$this->db->insert('BS_BrainstormUserLinks', $data);
	}
	
	public function unsubscribe($data) {
		$this->db->delete('BS_BrainstormUserLinks', $data);
	}
	
	public function checkSubscription($brainstorm_id, $user_id) {
		$this->db->select('*');
		$this->db->from('BS_BrainstormUserLinks');
		$this->db->where('FK_BrainstormUserLink_User_ID', $user_id);
		$this->db->where('FK_BrainstormUserLink_Brainstorm_ID', $brainstorm_id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return "true";
		} else {
			return "false";
		}
	}
	
	public function editBrainstorm($data, $brainstorm_ID) {
		$this->db->where('PK_Brainstorm_ID', $brainstorm_ID);
		$this->db->update('BS_Brainstorms', $data);
	}
}
?>