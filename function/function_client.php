<?php

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

function searchClients($text_search) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM client WHERE name LIKE '%".$text_search."%' OR surname LIKE '%".$text_search."%'";
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: '.$query . mysql_error());
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

function addClient($name,$surname,$type_document,$number_document,$release_document_date,$release_document_to,$nationality,$date_birth,$city_birth,$address,$city,$telephone,$email,$relative,$relationship){

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "INSERT INTO client 
				(name,surname,type_document,number_document,release_document_date,release_document_to,nationality,date_birth,city_birth,address,city,telephone,email,relative,relationship)
				VALUES
				('$name','$surname','$type_document','$number_document','$release_document_date','$release_document_to','$nationality','$date_birth','$city_birth','$address','$city','$telephone','$email','$relative','$relationship')";
	echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	$id_client = mysql_insert_id();;
	mysql_close($link);
	return $id_client;
}


function updateClient($id,$name,$surname,$type_document,$number_document,$release_document_date,$release_document_to,$nationality,$date_birth,$city_birth,$address,$city,$telephone,$email) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "UPDATE client SET
				id=".$id.",
				name='".$name."',
				surname='".$surname."',
				type_document='".$type_document."',
				number_document='".$number_document."',
				release_document_date='".$release_document_date."',
				release_document_to='".$release_document_to."',
				nationality='".$nationality."',
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

function deleteClient($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "DELETE FROM client WHERE id=".$id;
	
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($link);
	return true;
}
?>