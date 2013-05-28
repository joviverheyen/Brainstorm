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
		return;
	}
}
?>