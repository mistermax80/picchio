<?php
include_once 'include/costant.php';

function getClients() {

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
	
	$clients = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$clients[] = $row;
	}
	mysql_close($link);
	return $clients;
}

function getClient($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM client WHERE id=".$id;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
		
	if ($row = mysql_fetch_assoc($result)) {
		$client = $row;
	}
	mysql_close($link);
	return $client;
}

function addClient($name,$surname,$type_document,$number_document,$date_birth,$city_birth,$address,$city,$telephone,$email) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO client 
				(name,surname,type_document,number_document,date_birth,city_birth,address,city,telephone,email)
				VALUES
				('$name','$surname','$type_document','$number_document','$date_birth','$city_birth','$address','$city','$telephone','$email')";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	$id_client = mysql_insert_id();;
	mysql_close($link);
	return $id_client;
}
?>