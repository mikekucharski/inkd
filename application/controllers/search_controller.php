<?php
	class SearchController extends BaseController{
		/*
		*	 Constructor
		*/
		function __construct(){
			parent::__construct();
		}

		public function index() {
			Auth::verifyLoggedIN();
			if(!isset($_GET['search']) || empty($_GET['search']))
			{
				header("location: " . BASE_URL . "404");
				return;
			}
			$title = "Search Results";
			$friend_model = $this->loadModel("friend");
			$all_results = $friend_model->search($_GET['search']);

			require("application/views/templates/header.php");
			require("application/views/search_results.php");
			require("application/views/templates/footer.php");
			
		}
	}


?>