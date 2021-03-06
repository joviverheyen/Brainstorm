<?php

class Profile_model extends CI_Model {
	
	function getUser($user_id) {

		$this->db->select('*, Field1.Field_Label AS Field_Label1, Field2.Field_Label AS Field_Label2, Field3.Field_Label AS Field_Label3');
		$this->db->from('BS_Users');
		$this->db->join('BS_Fields AS Field1', 'Field1.PK_Field_ID = BS_Users.FK_User_Field1', 'left');
		$this->db->join('BS_Fields AS Field2', 'Field2.PK_Field_ID = BS_Users.FK_User_Field2', 'left');
		$this->db->join('BS_Fields AS Field3', 'Field3.PK_Field_ID = BS_Users.FK_User_Field3', 'left');
		$this->db->where('PK_User_ID', $user_id);
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function getUserIdeas($user_id) {
		$this->db->select('*');
		$this->db->from('BS_Brainstorms');
		$this->db->join('BS_Users', 'BS_Users.PK_User_ID = FK_Brainstorm_User_ID');
		$this->db->where('FK_Brainstorm_User_ID = "' . $user_id . '"');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function getUserImage($user_id) {
		$this->db->select('User_Image');
		$this->db->from('BS_Users');
		$this->db->where('PK_User_ID', $user_id);
		$q = $this->db->get();
		
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data = $row->User_Image;
			}
			return $data;
		}
	}
	
	function updateUser($data, $user_id) {
		$this->db->where('PK_User_ID', $user_id);
		$this->db->update('BS_Users', $data); 
	}
	
	function getFields() {
		$this->db->select('*');
		$this->db->from('BS_Fields');
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}

	}
	
	public function getFollowing($user_id) {
		/* SELECT * FROM BS_Users
		INNER JOIN BS_UserUserLinks ON BS_UserUserLinks.FK_UserUserLink_Following_ID = BS_Users.PK_User_ID
		WHERE BS_UserUserLinks.FK_UserUserLink_User_ID = 1 */
		
		$this->db->select('*');
		$this->db->from('BS_Users');
		$this->db->join('BS_UserUserLinks', 'BS_UserUserLinks.FK_UserUserLink_Following_ID = BS_Users.PK_User_ID');
		$this->db->where('BS_UserUserLinks.FK_UserUserLink_User_ID', $user_id);
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function getFollowers($user_id) {
		/* SELECT * FROM BS_Users
		INNER JOIN BS_UserUserLinks ON BS_UserUserLinks.FK_UserUserLink_User_ID = BS_Users.PK_User_ID
		WHERE BS_UserUserLinks.FK_UserUserLink_Following_ID = 1 */
		
		$this->db->select('*');
		$this->db->from('BS_Users');
		$this->db->join('BS_UserUserLinks', 'BS_UserUserLinks.FK_UserUserLink_User_ID = BS_Users.PK_User_ID');
		$this->db->where('BS_UserUserLinks.FK_UserUserLink_Following_ID', $user_id);
		$q = $this->db->get();
		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function follow($data) {
		$this->db->insert('BS_UserUserLinks', $data);
	}
	
	public function unfollow($data) {
		$this->db->delete('BS_UserUserLinks', $data);
	}
	
	public function checkFollow($profile_id, $user_id) {
		$this->db->select('*');
		$this->db->from('BS_UserUserLinks');
		$this->db->where('FK_UserUserLink_User_ID', $user_id);
		$this->db->where('FK_UserUserLink_Following_ID', $profile_id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return "true";
		} else {
			return "false";
		}
	}
}

?>