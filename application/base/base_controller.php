<?php
	abstract class BaseController {

		// Constructor
		public function __construct() {
			Session::init();
		}

		public function loadModel($name) {
			$path = "application/models/" . strtolower($name) . '_model.php';

	        if(file_exists($path)) {
	            require $path;
	            $modelName = $name . 'Model';
	            return new $modelName();
	        }
		}
	}
?>