<?php

	class LoginModel extends BaseModel {

		/*
		*	Constructor
		*/
		public function __construct() {
			parent::__construct(); // creates db connection
		}

		public function login($email, $password) {

			//sanitize input
			$email = $this->db->real_escape_string(trim($email));
			$password = $this->db->real_escape_string(trim($password));
			
			$query ="SELECT u_id, first_name, hash FROM user WHERE email='$email'";
			$result = $this->db->query($query);
			
			if ($result !== false && $result->num_rows > 0) 
			{
				$row = $result->fetch_assoc();
				if(password_verify($password, $row['hash']))
				{
					Session::init();
					Session::set('logged_in', true);
					Session::set('u_id', $row['u_id']);
					Session::set('first_name', $row['first_name']);
					return true;
				}
				else 
				{
					return false;
				}
			}else{
				return false;
			}
		
		} // end login function

		public function createNewUser($first, $last, $email, $password, $password2) {
		
			if($password != $password2 || strlen($password) < 6 || !filter_var($email, FILTER_VALIDATE_EMAIL) ){
				return false;
			}else{

				/*
				* password_hash() php 5 function
				* returns a hash, includes an an automatically generated salt
				* this allows password_verify() to check the password without storage of salt
				*/
				$hash = password_hash($password, PASSWORD_DEFAULT);
				
				//sanitize input
				$first = $this->db->real_escape_string(trim($first));
				$last = $this->db->real_escape_string(trim($last));
				$email = $this->db->real_escape_string(trim($email));
				$hash = $this->db->real_escape_string($hash);
				
				$query = "INSERT INTO user(first_name, last_name, email, hash) VALUES('$first', '$last', '$email', '$hash')";
				$result= $this->db->query($query);
				$last_id= $this->db->insert_id;
				
				$query2 = "INSERT INTO user_info(u_id,hometown,location, school, workplace, birthday, description) VALUES('$last_id','','','','','','')";
				$result2 = $this->db->query($query2);

				// check if row inserted or not
				if (($result && $result2) !== false) 
				{
					// successfully inserted into database
					Session::init();
					Session::set('logged_in', true);
					Session::set('u_id', $last_id);
					Session::set('first_name', $first);

					return true;
				} else {
					return false;
				}
			}

		} // end createNewUser

		public function logout() {
			Session::destroy();
		}//end logout
	}// end login model
?>