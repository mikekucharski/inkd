<?php
	class base_controller
	{
    	public function loadModel($model_name)
    	(
    		require('application/models/' . strtolower($model_name) . '.php');
    		return new $model_name();
    	)

	}
?>