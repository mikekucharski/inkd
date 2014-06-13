<?php
	class AccountSettingsController extends BaseController{
		/*
		*	 Constructor
		*/
		function __construct(){
			parent::__construct();
		}

		/*
		*	Page: render account settings page and load account info
		*/
		public function index() {
			//Auth::verifyLoggedIn();
			$title = "Account Settings";
			$user_model = $this->loadModel("user");
			$as = $user_model->getAccountSettings();
			if($as != null)
			{
				require("application/views/templates/header.php");
	    		require("application/views/account_settings.php");
	    		require("application/views/templates/footer.php");
			}else
			{
				header('location' . BASE_URL . '404');
			}
			
		}

		/*
		*	 Change Password
		*/
		public function changePassword() {

			if (!isset($_POST['current_password']) && empty($_POST['current_password']) &&
			   (!isset($_POST['password1']) && empty($_POST['password1'])) &&
			   (!isset($_POST['password2']) && empty($_POST['password2'])))
			{
				header("location: " . BASE_URL . "404");
			}

			$user_model = $this->loadModel("user");
			$response = $user_model->changePassword($_POST['current_password'], $_POST['password1'], $_POST['password2']);
			print json_encode($response);
		}
	
		/*
		*	 Change Account Settings
		*/
		public function updateAccountInfo() {
			if (!isset($_GET["first_name"]) && empty($_GET["first_name"]) &&
				!isset($_GET["last_name"]) && empty($_GET["last_name"]) &&
				!isset($_GET["email"]) && empty($_GET["email"]) && filter_var($_GET["email"], FILTER_VALIDATE_EMAIL))
			{
				header("location: " . BASE_URL . "404");
			}

			$user_model = $this->loadModel('user');
			$response = $user_model->updateAccountInfo($_GET["first_name"], $_GET["last_name"], $_GET["email"]);
			print json_encode($response);
		}
	}

?>