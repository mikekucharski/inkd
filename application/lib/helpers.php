<?php
	/**
	* Formats Date and Time from datetime object
	*
	**/
	function format_date($datetime)
	{
		date_default_timezone_set('America/New_York');
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
		if(isset($_GET['controller'])) {
			if($page == $_GET['controller']){
				print 'class="active"';
			}
		}
		else if($page == "home") {
			print 'class="active"';
		}
	}
?>