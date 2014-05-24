<?php
	class UserModel extends BaseModel {
		/*
		* 	Constructor
		*/
		public function __construct() {
			parent::__construct(); //Creates db connection
		}

		public function getProfileInfo($u_id) {
			$s_id = Session::get("u_id");
		
			$query = "SELECT u.first_name, u.last_name, ui.hometown, ui.location, ui.school, ui.workplace, ui.birthday, ui.description 
						FROM user u, user_info ui
						WHERE u.u_id = ui.u_id AND u.u_id='$u_id'";
			$result = $this->db->query($query);
			
			if($result !== false && $result->num_rows > 0)
			{
				$data = $result->fetch_assoc();
			}else{
				return null;
			}

			$data['isYou'] = ($s_id == $u_id ? true : false);
			return $data;
		}

		public function getProfileSettings() {
			$u_id = Session::get("u_id");
		
			$query = "SELECT hometown, location, school, workplace, birthday, description 
						FROM user_info
						WHERE u_id='$u_id'";
			$result = $this->db->query($query);
			
			if($result !== false && $result->num_rows > 0)
			{
				$data = $result->fetch_assoc();
				return $data;
			}else{
				return null;
			}
		}

		public function updateProfile($hometown, $location, $school, $workplace, $birthday, $description) {
			$hometown = $this->db->real_escape_string(trim($hometown));
			$location = $this->db->real_escape_string(trim($location));
			$school = $this->db->real_escape_string(trim($school));
			$workplace = $this->db->real_escape_string(trim($workplace));
			$birthday = $this->db->real_escape_string(trim($birthday));
			$description = $this->db->real_escape_string(trim($description));
			
			$query= "UPDATE user_info SET hometown='$hometown',location='$location', school='$school', workplace='$workplace', birthday='$birthday', description='$description' WHERE u_id='$u_id'";
			$result=$mysqli->query($query);
			
			$response['success'] = $result;
	    }
	}