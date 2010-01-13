<?php
include_once 'include/costant.php';

function insertReport($id_client,$path,$id_booking){

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO report 
				(id_client,path,id_booking) 
				VALUES 
				('$id_client','$path','$id_booking')";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}
	
function getReports() {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT
				r.id as id,
				c.surname as surname,
				r.path as path,
				r.date as date,
				r.send as send				 
				FROM 
				report AS r, booking AS b, client AS c 
				WHERE 
				r.id_client=c.id AND
				r.id_booking=b.id";
	//$query = "SELECT * FROM report ";
	
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$reports = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$reports[] = $row;
	}
	mysql_close($link);
	return $reports;
}

function getReport($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM report WHERE id=".$id.";";
	
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
		
	if ($row = mysql_fetch_assoc($result)) {
		$report = $row;
	}
	mysql_close($link);
	return $report;
}

function getReportIdBooking($id_booking) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM report WHERE id_booking=".$id_booking.";";
	
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
		
	if ($row = mysql_fetch_assoc($result)) {
		$report = $row;
	}
	mysql_close($link);
	return $report;
}


function deleteReport($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "DELETE FROM report WHERE id=".$id;
	
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}

?>