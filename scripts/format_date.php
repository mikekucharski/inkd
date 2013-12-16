<?php

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

?>