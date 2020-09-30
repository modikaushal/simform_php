<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "simform";

	// Create connection
	$mysqli = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$mysqli) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	// echo "Connected successfully";
	$root_domain = 'http://localhost/SimformBackend/';
	$base_domain = $_SERVER['DOCUMENT_ROOT'].'/SimformBackend/';
	
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header("Content-type: text/html; charset=utf-8");
	header("Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'");
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
?>