<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

function __autoload($name) {

	$dir = "model";
	if (strpos($name,"Controller") !== FALSE)
		$dir = "controller";
	if(file_exists($dir."/".$name.".php"))
		include_once $dir."/".$name.".php";
}
