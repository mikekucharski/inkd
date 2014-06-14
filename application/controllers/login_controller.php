<?php
	class LoginController extends BaseController {

		/*
		*	Constructor
		*/
		function __construct() {
	    	parent::__construct();
	    }

	    /*
	    *	Page: renders the login page
	    */
	    public function index() {
	    	Auth::verifyNotLoggedIn();

	    	$title = "Log In";
	    	require("application/views/templates/login_header.php");
    		require("application/views/login.php");
    		require("application/views/templates/login_footer.php");
	    }

	    /*
	    *	Page: renders the register page
	    */
	    public function register() {
	    	Auth::verifyNotLoggedIn();
	    	
	    	$title = "Register";
	    	require("application/views/templates/login_header.php");
    		require("application/views/register.php");
    		require("application/views/templates/login_footer.php");
	    }

	    /*
	    *	Action: login with ajax
	    */
	    public function login() {
	    	if(!isset($_POST['email']) || empty($_POST['email']) 
		 	   || !isset($_POST['pass']) || empty($_POST['pass'])){
		 	 	header("location: " . BASE_URL . "404");
		 	}

	    	$login_model = $this->loadModel("login");
	    	$login_success = $login_model->login($_POST['email'], $_POST['pass']);

	    	$response = array('success' =>$login_success);
	    	if($login_success){
	    		$response['redirectLoc'] = BASE_URL . "home";
	    	}
	    	print json_encode($response);
	    }

	    /*
	    *	Action: register with ajax
	    */
	    public function registerNewUser() {
	    	if (!isset($_POST["first"]) || empty($_POST["first"]) 
				|| !isset($_POST["last"]) || empty($_POST["last"])
				|| !isset($_POST["email"]) || empty($_POST["email"])
				|| !isset($_POST["password"]) || empty($_POST["password"]) 
				|| !isset($_POST["password2"]) || empty($_POST["password2"])){
		 	 	header("location: " . BASE_URL . "404");
		 	}

	    	$login_model = $this->loadModel("login");
	    	$register_success = $login_model->createNewUser($_POST["first"], $_POST["last"], $_POST["email"], $_POST["password"], $_POST["password2"]);
	    	
	    	$response = array('success' =>$register_success);
	    	if($register_success){
	    		$response['redirectLoc'] = BASE_URL . "home";
	    	}
	   
	    	print json_encode($response);
   		}

   		public function logout() {
   			$login_model = $this->loadModel('login');
   			$login_model->logout();
   			header('location:' . BASE_URL . 'login');
   		}
	}
?>