<?php

$mesi = array();
$mesi[1] = 'Gennaio';
$mesi[2] = 'Febbraio';
$mesi[3] = 'Marzo';
$mesi[4] = 'Aprile';
$mesi[5] = 'Maggio';
$mesi[6] = 'Giugno';
$mesi[7] = 'Luglio';
$mesi[8] = 'Agosto';
$mesi[9] = 'Settembre';
$mesi[10] = 'Ottobre';
$mesi[11] = 'Novembre';
$mesi[12] = 'Dicembre';

// formato da passare: yyyy-mm-dd
/**
 * 
 * @param $date nel formato anno-mese-giorno
 * @return timestamp della data nel formato unix 
 */
function date2dateStamp($date) {
	
	$day= substr($date,8,2);
	$mon= substr($date,5,2);
	$year= substr($date,0,4);
	$dateStamp = mktime(0,0,0,$mon,$day,$year);
	return $dateStamp;
}

/**
 * 
 * @param $date nel formato giorno-mese-anno
 * @return data nel formato anno-mese-giorno
 */
function dateIT2EN($date) {
	
	$date_arr = split('[-]', $date);
	
	return date('Y-m-j',mktime(0,0,0,$date_arr[1],$date_arr[0],$date_arr[2]));
}

function dateEN2IT($date) {
	
	$date_arr = split('[-]', $date);
	
	return date('j-m-Y',mktime(0,0,0,$date_arr[1],$date_arr[2],$date_arr[0]));
}
?>