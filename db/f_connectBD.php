<?php

function fconnectBD(){
	
	$DB_NAME = "bd_madmmoth";
	$DB_HOST = "localhost";
	$DB_USER = "admin";
	$DB_PASS = "madmmoth";
	
	$PDO = new PDO("mysql:host=$DB_HOST; dbname=$DB_NAME; charset=utf8", $DB_USER, $DB_PASS);
	
	return $PDO;
}

$db = fconnectBD();

function db(){	
	global $db;
	return $db;
}

?>
