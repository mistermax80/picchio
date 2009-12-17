<?php
include_once 'include/costant.php';

function getVisitors() {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM visitor";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$visitors = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$visitors[] = $row;
	}
	mysql_close($link);
	return $visitors;
}

function searchVisitors($text_search) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM visitor WHERE name LIKE '%".$text_search."%' OR surname LIKE '%".$text_search."%'";
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: '.$query . mysql_error());
	}
	
	$visitors = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$visitors[] = $row;
	}
	mysql_close($link);
	return $visitors;
}

function getVisitor($id_booking) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM visitor WHERE id_booking=".$id_booking;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	$visitors = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$visitors[] = $row;
	}
	mysql_close($link);
	return $visitors;
}

function addVisitor($id_booking,$name,$surname,$type_document,$number_document,$date_birth,$city_birth,$address,$city,$telephone,$email) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO visitor 
				(id_booking,name,surname,type_document,number_document,date_birth,city_birth,address,city,telephone,email)
				VALUES
				($id_booking,'$name','$surname','$type_document','$number_document','$date_birth','$city_birth','$address','$city','$telephone','$email')";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	$id_client = mysql_insert_id();;
	mysql_close($link);
	return $id_visitor;
}


function updateVisitor($id,$name,$surname,$type_document,$number_document,$date_birth,$city_birth,$address,$city,$telephone,$email) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "UPDATE visitor SET
				id=".$id.",
				name='".$name."',
				surname='".$surname."',
				type_document='".$type_document."',
				number_document='".$number_document."',
				date_birth='".$date_birth."',
				city_birth='".$city_birth."',
				address='".$address."',
				city='".$city."',
				telephone='".$telephone."',
				email='".$email."'
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

function deleteVisitor($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "DELETE FROM visitor WHERE id=".$id;
	
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}
?>