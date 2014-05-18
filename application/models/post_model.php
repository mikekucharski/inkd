<?php
	class Postmodel extends BaseModel {
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
	}

?>
