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

		/*
		*	Make post using ajax
		*/
		public function addPost() {
			if( !isset($_POST['ink-msg']) || empty($_POST['ink-msg']) ){
		 	 	header("location: " . BASE_URL . "404");
		 	 }
			$post_model = $this->loadModel('post');
			print json_encode($post_model->addPost($_POST['ink-msg']));
		}
	}
?>