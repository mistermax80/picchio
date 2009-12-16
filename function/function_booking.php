<?php
include_once 'include/costant.php';

function insertBooking($id_client,$id_room,$date_in,$date_out,$number_client,$note) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO booking 
				(client,room,date_in,date_out,number_client,note) 
				VALUES 
				($id_client,$id_room,'$date_in','$date_out',$number_client,'$note')";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}

function updateBooking($id,$id_client,$id_room,$date_in,$date_out,$number_client,$note) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "UPDATE booking SET
				id=".$id.",
				client=".$id_client.",
				room=".$id_room.",
				date_in='".$date_in."',
				date_out='".$date_out."',
				number_client='".$number_client."',
				note='".$note."'
				WHERE
				id = ".$id.";";
	echo $query;
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
				date_out>'".$date."' AND 
				room=".$room ;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: '.$query." ".mysql_error());
	}
	$booking = array();
	if ($row = mysql_fetch_assoc($result)) {
		$booking = $row;
	}
	//var_dump($booking);
	mysql_close($link);
	return $booking;
}

function checkFreeBooking($date_in,$date_out,$id_room) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	
	$query = "SELECT count(*) as booking
				FROM booking 
				WHERE room=".$id_room." AND
				(
				'".$date_in."'<=date_in AND '".$date_out."'>=date_in
				OR
				'".$date_in."'<date_out AND '".$date_out."'>=date_out
				OR
				date_in <= '".$date_in."' AND date_out>'".$date_in."'
				OR
				date_in <= '".$date_out."' AND date_out>='".$date_out."'
				)";
	
	//echo "<br>".$query."<br>";
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	$booking = array();
	if ($row = mysql_fetch_assoc($result)) {
		$booking = $row;
	}
	mysql_close($link);
	return $booking['booking']==0;
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

	$query = "SELECT * FROM booking WHERE id = ".$id.";";
	
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


function getBookings() {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM booking";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$bookings = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$bookings[] = $row;
	}
	mysql_close($link);
	return $bookings;
}

function deleteBooking($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "DELETE FROM booking WHERE id=".$id;
	
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}

?>