<?php
include_once 'include/costant.php';

function getOptional($id_booking) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM optional WHERE id_booking=".$id_booking;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$optionals = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$optionals[] = $row;
	}
	mysql_close($link);
	return $optionals;
}

function addOptional($id_booking,$id_product) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO optional 
				(id_booking,id_product)
				VALUES
				($id_booking,$id_product)";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return $id_optional;
}

function deleteOptional($id_optional){

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "DELETE FROM optional WHERE id=".$id_optional;
	
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}