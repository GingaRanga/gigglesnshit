   <?php
   
   		//connect to server db using hostname, username and password
   		if( $_POST ){
			
  			$con = mysql_connect("blogaccounts.db","gingaranga","Ch33K02?");

  			//if does not connect to db die fxn stops process and outputs error
			if (!$con){
    			die('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Could not connect: </div>' . mysql_error());
  			}

			//now we are choosing specific db to connect to
  			mysql_select_db("gigglesnshitmembers", $con);

			//get the data from the form which user inputs by id of each field
			$users_username = $_POST['username'];
			$users_name = $_POST['name'];
			$users_email = $_POST['email'];
			$users_password = $_POST['password'];
			$users_confirm_password = $_POST['cpassword'];
			
			//prevent anyone to login as any user, prevent attack by escape string
			$users_username = mysql_real_escape_string($users_username);
			$users_name = mysql_real_escape_string($users_name);
			$users_email = mysql_real_escape_string($users_email);
			$users_password = mysql_real_escape_string($users_password);
			$users_confirm_password = mysql_real_escape_string($users_confirm_password);

				//insert values of form into cells of the db
				$query = "INSERT INTO `gigglesnshitmembers`.`userdata` (`id`, `username`, `name`, `email`, `password`, `cpassword`, `timestamp`) VALUES (NULL, '$users_username', '$users_name', '$users_email', '$users_password', '$users_confirm_password', CURRENT_TIMESTAMP);";
	
				//execute the $query variable above in order to run command
				mysql_query($query);
	
				//success message to user
				echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Thank you for registering to Giggles N Shit Blog!</div>';

  			//comment added to db and now close connection to db
			mysql_close($con);
		}
   ?>