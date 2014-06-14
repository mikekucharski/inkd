<?php
	class FriendsController extends BaseController {

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
	    	Auth::verifyLoggedIn();

	    	$title = "Friends";
	    	$friends_model = $this->loadModel("friend");
			$friends_data = $friends_model->getFriends();
			$friends = $friends_data["data"];
			$friends_count = $friends_data["count"];

	    	require("application/views/templates/header.php");
    		require("application/views/friends.php");
    		require("application/views/templates/footer.php");
	    }


	    /*
	    *	Ajax: method for unfriending
	    */
	    public function unfriend() {
	    	Auth::verifyLoggedIn();

	    	if(!isset($_GET['u_idf']) || empty($_GET['u_idf']) ){
		 	 	print json_encode(array('success' => false));
		 	 	return;
		 	}

	    	$friends_model = $this->loadModel("friend");
			$success = $friends_model->unfriend($_GET['u_idf']);
			
	    	print json_encode(array('success' => $success));
	    }

	    /*
	    *	Ajax: method for friending
	    */
	    public function addfriend() {
	    	Auth::verifyLoggedIn();

	    	if(!isset($_GET['u_idf']) || empty($_GET['u_idf']) ){
		 	 	print json_encode(array('success' => false));
		 	 	return;
		 	}

	    	$friends_model = $this->loadModel("friend");
			$success = $friends_model->addfriend($_GET['u_idf']);
			
	    	print json_encode(array('success' => $success));
	    }
	}
?>