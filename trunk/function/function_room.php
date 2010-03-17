<?php
include_once 'include/site_config.php';

function getRooms() {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM room";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$rooms = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$rooms[] = $row;
	}
	mysql_close($link);
	return $rooms;
}


function getRoom($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM room WHERE id=".$id;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
		
	if ($row = mysql_fetch_assoc($result)) {
		$room = $row;
	}
	mysql_close($link);
	return $room;
}

function updateRoom($id,$type,$description,$price){

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "UPDATE room SET
				id=".$id.",
				type='".$type."',
				description='".$description."',
				price='".$price."'
				WHERE
				id = ".$id.";";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}


function deleteRoom($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "DELETE FROM room WHERE id=".$id;
	
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}

function addroom($id,$type,$description,$price){

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO room 
				(id,type,description,price)
				VALUES
				('$id','$type','$description','$price')";
	echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	$id_client = mysql_insert_id();;
	mysql_close($link);
	return $id_room;
}



?>