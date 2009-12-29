<?php
include_once 'include/costant.php';

function date2dateStamp($date) {
	
	$day= substr($date,8,2);
	$mon= substr($date,5,2);
	$year= substr($date,0,4);
	$dateStamp = mktime(0,0,0,$mon,$day,$year);
	return $dateStamp;
}
?>