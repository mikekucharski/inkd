<?php
	class ErrorController extends BaseController{
		/*
		*	 Constructor
		*/
		function __construct(){
			parent::__construct();
		}

		/*
		*	Page: render 404 page
		*/
		public function index() {
			$title = "Error: 404";
			if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
				require("application/views/templates/login_header.php");
				require("application/views/page_not_found.php");
				require("application/views/templates/login_footer.php");

			}
			else {
				require("application/views/templates/header.php");
				require("application/views/page_not_found.php");
				require("application/views/templates/footer.php");
			}
		}
	}
?>