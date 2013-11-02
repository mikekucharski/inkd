<?php
	function connect(){
		require_once __DIR__ . '/db_config.php';
		// Connecting to mysql database
		$con = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
		if ($con->connect_error) {
			trigger_error('Database connection failed: '  . $con->connect_error, E_USER_ERROR);
		}
		return $con;
	}
?>