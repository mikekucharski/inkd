<?php
	class LoginController extends BaseController {

		/*
		*	Constructor
		*/
		function __construct() {
	    	$this->model =$this->loadModel("login");
	    }

	    /*
	    *	renders the login page
	    */
	    public function index() {
	    	$title = "Log In";
	    	require("application/views/templates/login_header.php");
    		require("application/views/login.php");
    		require("application/views/templates/login_footer.php");
	    }

	    /*
	    *	renders the register page
	    */
	    public function register() {
	    	$title = "Register";
	    	require("application/views/templates/login_header.php");
    		require("application/views/register.php");
    		require("application/views/templates/login_footer.php");
	    }
	}
?>