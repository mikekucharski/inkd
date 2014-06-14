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
			Auth::verifyLoggedIn();

			$title = "Home";
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
		 		print json_encode(array('success' => false));
		 		return;
		 	}

			$post_model = $this->loadModel('post');
			$response = $post_model->addPost($_POST['ink-msg']);
			print json_encode($response);
		}
	}
?>
