<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/_base.inc.php';

include_once FUNCTION_PATH.'function_booking.php';
include_once FUNCTION_PATH.'function_date.php';

$booking = getBooking($_REQUEST['date_stamp_in'],$_REQUEST['id_room']);

if(isset($booking['id'])  && $booking['id']!=""){
	
	$_SESSION['id_room'] = $booking['room'];
	$_SESSION['date_stamp_in'] = $booking['date_stamp_in'];
	$_SESSION['date_out'] = substr($booking['date_out'],0,10);
	
	$_SESSION['number_client'] = $booking['number_client'];
	$_SESSION['note'] = $booking['note'];
	
	include 'form.php';
}else{
	$_SESSION['new_booking']= true;
	$_SESSION['id_room'] = $_REQUEST['id_room'];
	$_SESSION['date_stamp_in'] = $_REQUEST['date_stamp_in'];
	header("location: ".CLIENT_LOCATION);
}

