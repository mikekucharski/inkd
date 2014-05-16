<?php
		
	require('application/config/config.php');
	require('application/lib/Session.php');
	require('application/lib/Authentication.php');
	require('application/lib/helpers.php');
	require('application/base/base_controller.php');
	require('application/base/base_model.php');

	if(isset($_GET["controller"]) & !empty($_GET["controller"]))
	{
		$controller = $_GET["controller"];
	} else {
		$controller = 'home';
	}

	if(isset($_GET["action"]) & !empty($_GET["action"]))
	{
		$action = $_GET["action"];
	} else {
		$action = 'index';
	}

	if(file_exists('application/controllers/' . strtolower($controller) .'_controller.php'))
	{
		require('application/controllers/' . strtolower($controller) .'_controller.php');
	} else {
		require('application/controllers/error_controller.php');
	}

	$ctrlName = $controller."Controller";
	$ctrl = new $ctrlName;

	if(method_exists($ctrl, $action)){
		$ctrl->{$action}();
	}else{
		$ctrl->index();
	}
?>