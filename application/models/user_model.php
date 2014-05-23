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
	}