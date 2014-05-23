<?php
	class HomeController extends BaseController {
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
			$title = "Profile";
			$post_model = $this->loadModel("post");
			$all_posts = $post_model->getAllPosts();
			require("application/views/templates/header.php");
			require("application/views/home.php");
			require("application/views/templates/footer.php");
		}
	}
?>