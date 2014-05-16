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
	    	$title = "Log In";
	    	require("application/views/templates/login_header.php");
    		require("application/views/login.php");
    		require("application/views/templates/login_footer.php");
	    }

	    /*
	    *	Page: renders the register page
	    */
	    public function register() {
	    	$title = "Register";
	    	require("application/views/templates/login_header.php");
    		require("application/views/register.php");
    		require("application/views/templates/login_footer.php");
	    }

	    /*
	    *	Action: login with ajax
	    */
	    public function login() {
	    	$login_model = $this->loadModel("login");
	    	$login_success = $login_model->login();

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
	    	$login_model = $this->loadModel("login");
	    	$register_success = $login_model->createNewUser();
	    	
	    	$response = array('success' =>$register_success);
	    	if($register_success){
	    		$response['redirectLoc'] = BASE_URL . "home";
	    	}
	   
	    	print json_encode($response);
   		}
	}
?>