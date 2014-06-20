<?php
	class FriendModel extends BaseModel {
		/*
		* 	Constructor
		*/
		public function __construct() {
			parent::__construct(); //Creates db connection
		}

		public function checkIfFriend($u_id) {
			$s_id = Session::get('u_id');

			$query ="SELECT f_id FROM friend WHERE u_id={$s_id} AND u_idf={$u_id}";
			$result = $this->db->query($query);

			return ($result !== false && $result->num_rows>0) ? true : false;
		}

		public function getFriends() {
			$u_id = Session::get('u_id');

			$query="SELECT u_id, first_name, last_name, email FROM user WHERE u_id IN
					(SELECT u_idf FROM friend WHERE u_id=$u_id)";
			$result = $this->db->query($query);
			if($result !== false && $result->num_rows>=0) { 
				$data = array();
				while($row=$result->fetch_assoc()) {$data[] = $row;}
				return array('data' => $data, 'count' => strval($result->num_rows));
			} else {
				return null;
			}
		}

		public function unfriend($u_idf) {
			$u_id = Session::get('u_id');

			// if the users are already not friends, just return true
			if(!$this->checkIfFriend($u_idf)) {return $response['success'] = true;}

			$query ="DELETE FROM friend WHERE u_id=$u_id AND u_idf=$u_idf";
			$result = $this->db->query($query);
			return $result;
		}

		public function addfriend($u_idf) {
			$u_id = Session::get('u_id');

			// if the users are already friends, just return true
			if($this->checkIfFriend($u_idf)) {return $response['success'] = true;}

			$query ="INSERT INTO friend(u_id, u_idf) VALUES('$u_id','$u_idf')";
			$result = $this->db->query($query);
			return $result;
		}

		/*
		* 	Search
		*/
		public function search($search){
			$u_id= Session::get('u_id');
			
			//sanitize input
			$search = $this->db->real_escape_string(trim($search));
			$query="SELECT u_id, first_name, last_name, email FROM user 
					WHERE (CONCAT(first_name, ' ', last_name) LIKE '%$search%') 
					OR (email='$search')";
			$result = $this->db->query($query);
			if($result !== false && $result->num_rows > 0)
			{
				
				while($row=$result->fetch_assoc())
				{	
					$row['friends'] = $this->checkIfFriend($row['u_id']);
					$data[] = $row;

				}
				return $data;
			}
			else 
			{
				return $search;
			}
		}
	}

?>
