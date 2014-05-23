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
	}

?>
