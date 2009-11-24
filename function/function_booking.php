<?php
include_once 'include/costant.php';

function insertBooking($id_client,$id_room,$date_in,$date_out,$note) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO booking 
				(client,room,date_in,date_out,note) 
				VALUES 
				($id_client,$id_room,'$date_in','$date_out','$note')";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}

function getBooking($date_stamp,$room) {

	$date = date("Y-m-d",$date_stamp);
	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	
	$query = "SELECT 
					b.*,
					c.surname as surname,
					c.id as id_client
				FROM booking AS b JOIN client AS c 
				ON  b.client=c.id 
				WHERE 
				date_in<='".$date."' AND 
				date_out>='".$date."' AND 
				room=".$room ;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	$booking = array();
	if ($row = mysql_fetch_assoc($result)) {
		$booking = $row;
	}
	//var_dump($booking);
	mysql_close($link);
	return $booking;
}


function getBookingById($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM booking WHERE id=".$id;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
		
	if ($row = mysql_fetch_assoc($result)) {
		$booking = $row;
	}
	mysql_close($link);
	return $booking;
}






?>