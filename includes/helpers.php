<?php

	/**
	* Renders Templates
	*
	**/
	function render($template, $data = array())
	{
		$path = 'views/' . $template . '.php';
		if(file_exists($path))
		{
			extract($data);
			require($path);
		}
	}

	/**
	* Formats Date and Time from datetime object
	*
	**/
	function format_date($datetime)
	{
		$datetime = strtotime($datetime);
		$day = date("d", $datetime);
		$month = date("m", $datetime);
		$year = date("y", $datetime);
		$hours = date("g", $datetime);
		$minutes = date("i", $datetime);
		$time_of_day = date("A", $datetime);
		
		$time = $month . '/' . $day . '/' . $year . ' | ' . 
				$hours . ':' . $minutes . ' ' . $time_of_day;
		return $time;
	}

	function active_tab($page)
	{
		if($page==$_GET['page'])
			print 'class="active"';
	}
?>