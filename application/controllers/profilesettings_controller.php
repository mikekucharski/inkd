<?php
	class ProfileSettingsController extends BaseController {
		/*
		*	Constructor
		*/
		function __construct() {
			parent::__construct();
		}

		/*
		*	Page: renders the profile settings page and loads all posts
		*/
		public function index() {
			$title = "Profile Settings";
			$user_model = $this->loadModel("user");
			$ps = $user_model->getProfileSettings();

			require("application/views/templates/header.php");
			require("application/views/profile_settings.php");
			require("application/views/templates/footer.php");
		}

		/*
		*	Action: Called by ajax, updates users profile settings
		*/
		public function updateProfileSettings(){
			if(!isset($_GET['hometown']) || !isset($GET['location']) || !isset($_GET['school']) ||
				!isset($_GET['workplace']) || !isset($GET['birthday']) || !isset($_GET['description']) ){
		 	 	print json_encode(array('success' => false));
		 	}

	    	$$user_model = $this->loadModel("user");
	    	$success = $user_model->updateProfile($_GET['hometown'], $_GET['location'], $_GET['school'], 
	    											$_GET['workplace'], $_GET['birthday'], $_GET['description']);

	    	$response = array('success' =>$success);
	    	print json_encode($response);
		}
	}
?>