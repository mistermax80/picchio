<?php
include_once 'include/costant.php';

function getRooms() {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM client";
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



?>