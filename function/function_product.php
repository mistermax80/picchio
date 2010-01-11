<?php
include_once 'include/costant.php';

function getProducts() {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM product";
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$products = array();
		
	while ($row = mysql_fetch_assoc($result)) {
		$products[] = $row;
	}
	mysql_close($link);
	return $products;
}

function getProduct($id) {

	$link = mysql_connect(DB_ADDRESS,USER,PASS);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$db_selected = mysql_select_db(DB_NAME, $link);
	if (!$db_selected) {
		die ('Can\'t use foo : ' . mysql_error());
	}

	$query = "SELECT * FROM product WHERE id=".$id;
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
		
	if ($row = mysql_fetch_assoc($result)) {
		$product = $row;
	}
	mysql_close($link);
	return $product;
}