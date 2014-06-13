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


		public function getAccountSettings() {
			$u_id = Session::get('u_id');

			$query = "SELECT first_name, last_name, email FROM user WHERE u_id='$u_id'";
			$result=$this->db->query($query);

			if($result !== false && $result->num_rows > 0) 
			{
				$row = $result->fetch_assoc();
				return $row;
			}else {	
				return null;
			}
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

		public function changePassword($current_password, $password1, $password2) {
				
			if(($password1 != $password2) || (strlen($password1) < 6))
			{
				return array('success' => false);
			}

			$u_id=Session::get('u_id');
			
			$current_password = $this->db->real_escape_string(trim($current_password));
			$password1 = $this->db->real_escape_string(trim($password1));
			$password2 = $this->db->real_escape_string(trim($password2));
			
			$query ="SELECT password, salt FROM user WHERE u_id='$u_id'";
			$result=$this->db->query($query);
			
			if ($result !== false && $result->num_rows > 0) 
			{
				$row = $result->fetch_assoc();
				if(hash('sha256', $row['salt'].$current_password)==$row['password'])
				{
					$new_password = hash('sha256', $row['salt'].$password1);
					$query2= "UPDATE user SET password='$new_password' WHERE u_id = '$u_id'";
					$result2=$this->db->query($query2);
					
					return array('success' => true);
				}
				else 
				{
					return array('success' => false);
				}
			}else
			{
				return array('success' => false);
			}

		}

		public function updateAccountInfo($first, $last, $email) {
			
			$u_id = Session::get('u_id');

			$first = $this->db->real_escape_string(trim($first));
			$last = $this->db->real_escape_string(trim($last));
			$email = $this->db->real_escape_string(trim($email));
			
			$query = "UPDATE user SET first_name='$first', last_name='$last', email='$email'  WHERE u_id='$u_id'";
			$result=$this->db->query($query);
			
			return array('success' => $result);
		}

		public function updateProfile($hometown, $location, $school, $workplace, $birthday, $description) {

			$u_id = Session::get('u_id');

			$hometown = $this->db->real_escape_string(trim($hometown));
			$location = $this->db->real_escape_string(trim($location));
			$school = $this->db->real_escape_string(trim($school));
			$workplace = $this->db->real_escape_string(trim($workplace));
			$birthday = $this->db->real_escape_string(trim($birthday));
			$description = $this->db->real_escape_string(trim($description));
			
			$query= "UPDATE user_info 
				SET hometown='$hometown',location='$location', school='$school', workplace='$workplace', 
					birthday='$birthday', description='$description' 
				WHERE u_id='$u_id'";
			$result=$this->db->query($query);
			
			$response['success'] = $result;
			return array('success' => $result);
	    }
	}

?>