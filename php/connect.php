<?php
	
/// CONNECT TO DATABASE //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$hostname = "blogaccounts.db";
	$username = "gingaranga";
	$password = "Ch33K02?";
	$dbname = "gigglesnshitmembers";

	//connect to mysql db
	$dbc = mysqli_connect($hostname, $username, $password, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());
	
	//set encoding
	mysqli_set_charset($dbc, "utf8");
	
?>