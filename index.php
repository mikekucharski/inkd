<?php
		
	require('application/config/config.php');

	$controller = null;
	$action = null;

	$url = ltrim($_SERVER['REQUEST_URI'], '/');
	print $url;
	
	$parameter = explode('/', $url);
	print_r($parameter)

	if(isset($parameter[0]) && $parameter[0] != null))
	{
		$controller = $parameter[0];
	}
	if(isset($parameter[1]) && $parameter[1] != null)
	{
		$action = parameter[1];
	}

	if(file_exists(BASE_URL . 'application/controller/' . $controller .'.php'))
	{
		require('application/controller/' . $controller .'.php');
	}

	$ctrl = new $controller;

?>