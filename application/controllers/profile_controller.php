<?php
	class ProfileController extends BaseController {
		/*
		*	Constructor
		*/
		function __construct() {
			parent::__construct();
		}

		/*
		*	Page: renders the home page and loads all posts
		*/
		public function index() {
			if( !isset($_GET["u_id"]) || empty($_GET["u_id"]) ){
				header("location: " . BASE_URL . "404");
			}

			$title = "Profile";

			$post_model = $this->loadModel("post");
			$profile_posts = $post_model->getProfilePosts($_GET["u_id"]);

			$user_model = $this->loadModel("user");
			$p_info = $user_model->getProfileInfo($_GET["u_id"]);

			if(!$p_info["isYou"]) {
				$friend_model = $this->loadModel("friend");
				$isFriend = $friend_model->checkIfFriend($_GET["u_id"]);

				if($isFriend) {
					$f_button="none";
					$uf_button="block";
				}
				else
				{
					$f_button="block";
					$uf_button="none";
				}
			} else {
				$f_button="none";
				$uf_button="none";
			}
			

			require("application/views/templates/header.php");
			require("application/views/profile.php");
			require("application/views/templates/footer.php");
		}
	}
?>