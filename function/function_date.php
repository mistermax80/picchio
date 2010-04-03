<?php

// formato da passare: yyyy-mm-dd
function date2dateStamp($date) {
	
	$day= substr($date,8,2);
	$mon= substr($date,5,2);
	$year= substr($date,0,4);
	$dateStamp = mktime(0,0,0,$mon,$day,$year);
	return $dateStamp;
}

function dateIT2dateEN($date) {
	
	$date_arr = split('[-]', $date);
	
	return $date_arr[2]."-".$date_arr[1]."-".$date_arr[0];
}
?>