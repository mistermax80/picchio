<?php

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

function getNumeberClientVisitor($id_booking) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}
	
	$query = "SELECT count(*) FROM visitor  WHERE id_booking=".$id_booking;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$visitors = 0;
		
	if ($row = mysql_fetch_assoc($result)) {
		$visitors = $row['count(*)'];
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

function addVisitor($id_booking,$id_client) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO visitor 
				(id_booking,id_client)
				VALUES
				($id_booking,$id_client)";
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

	$query = "DELETE FROM visitor WHERE id_client=".$id;
	
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}


function getVisitorById($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM visitor WHERE id = ".$id.";";
	
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
		
	if ($row = mysql_fetch_assoc($result)) {
		$visitor = $row;
	}
	mysql_close($link);
	return $visitor;
}
?>