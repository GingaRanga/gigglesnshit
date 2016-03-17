<?php

/// CONNECT TO DATABASE //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$dbhostname = "blogaccounts.db";
	$dbusername = "gingaranga";
	$dbpassword = "Ch33K02?";
	$dbname = "gigglesnshitmembers";

	//connect to mysql db
	$dbc = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname) OR die("could not connect to database, ERROR: ".mysqli_connect_error());
	
	//set encoding
	mysqli_set_charset($dbc, "utf8");
	
/// VALIDATE FORM ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//if form submitted with post method validator
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		//processing form
		$username = $_POST['username'];
		$fullname = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm = $_POST['cpassword'];
		
		if(!empty($username) && !empty($fullname) && !empty($email) && !empty($password) && !empty($confirm)){
			include('blog-db.php');//this if statement checks to see all values of form filled out, and won't connect if not
			
			mysqli_query($dbc, "INSERT INTO userdata(username, fullname, email, password, cpassword) VALUES('$user', '$fullname', '$email', '$password', '$confirm')");/*connects to db and inserts values into table columns of table "userdata" from values stored in above variables*/
			
			//make sure everything inserts into db
			$registered = mysqli_affected_rows($dbc);
			echo "You have sucessfully created your account on Giggles N Shit Blog!";//will return a number of rows
			
		}else{
			echo "<p style='color:red;'>Please fill out each box in order to sign up.</p>";
		}
	}else{
		echo "<h2>Internal Error, user not submitted.</h2>";
	}

?>