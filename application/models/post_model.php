<?php
	class PostModel extends BaseModel {
		/*
		* 	Constructor
		*/
		public function __construct() {
			parent::__construct(); //Creates db connection
		}

		public function getAllPosts() {
			$u_id = Session::get('u_id');
			$query = "SELECT u.first_name, u.last_name, p.repost_id, p.message, p.post_time  
						FROM user u, post p 
						WHERE p.u_id = u.u_id AND (u.u_id = '$u_id' OR p.u_id  IN 
						(SELECT u_idf FROM friend WHERE u_id='$u_id'))
						ORDER BY post_time DESC";
			$result=$this->db->query($query);

			if ($result !== false && $result->num_rows > 0) 
			{
				$data = array();
				while($row = $result->fetch_assoc())
				{
					$data[] = $row; 
				}
				return $data;
			}else
			{
				return null;
			}
		}

		public function getProfilePosts($u_id) {
			$query = "SELECT u.first_name, u.last_name, p.repost_id, p.message, p.post_time  
						FROM user u, post p 
						WHERE p.u_id = u.u_id AND u.u_id = '$u_id'
						ORDER BY post_time DESC";
			$result=$this->db->query($query);

			if ($result !== false && $result->num_rows > 0) 
			{
				$data = array();
				while($row = $result->fetch_assoc())
				{
					$data[] = $row; 
				}
				return $data;
			} else 
			{
				return null;
			}
		}

		public function addPost($post_msg) {
		
			$u_id = Session::get('u_id');
			date_default_timezone_set('America/New_York');
			$post_time= date('Y-m-d H:i:s');
			$repost_id=-1;

			//sanitize input
			$post_msg = $this->db->real_escape_string(trim($post_msg));
			
			$query ="INSERT INTO post(u_id, repost_id, message, post_time) VALUES('$u_id', '$repost_id', '$post_msg', '$post_time')";
			$result=$this->db->query($query);
			
			if($result !== false)
			{
				$query2 = "SELECT * FROM user WHERE u_id=$u_id";
				$result2=$this->db->query($query2);
				if($result2 !== false && $result2->num_rows > 0)
				{
					$row = $result2->fetch_assoc();
					$first = $row['first_name'];
					$last = $row['last_name']; 
				}else
				{
					return array('success' => false);
				}
			}else
			{
				return array('success' => false);
			}
			
			$response = array('success' => $result, 'u_id' => $u_id, 'first_name' => $first, 'last_name' => $last,
							  'post_time' => format_date($post_time), 'post_msg' => htmlentities($post_msg));
			return $response;
		}

	}


?>
