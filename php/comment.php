   <?php
   
   		//connect to server db using hostname, username and password
   		if( $_POST ){
  			$con = mysql_connect("blogaccounts.db","gingaranga","Ch33K02?");

  			//if does not connect to db die fxn stops process and outputs error
			if (!$con){
    			die('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Could not connect: </div>' . mysql_error());
  			}

			//now we are choosing specific db to connect to
  			mysql_select_db("gigglesnshitcomments", $con);

			//get the data from the form which user inputs by id of each field
			$users_username = $_POST['username'];
			$users_email = $_POST['email'];
			$users_password = $_POST['password'];
			$users_comment = $_POST['comment'];
			
			//prevent anyone to login as any user, prevent attack by escape string
			$users_username = mysql_real_escape_string($users_username);
			$users_email = mysql_real_escape_string($users_email);
			$users_password = mysql_real_escape_string($users_password);
			$users_comment = mysql_real_escape_string($users_comment);

  			/*get the article id so we know which page the comment is from. Based on url gigglesnshit.com/pages/blog-1.php?id=1 for ex.*/
  			$articleid = $_GET['id'];
			
			//security to make sure url is numerical id to prevent malicious code added via url
  			if( ! is_numeric($articleid) )
    		die('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>invalid article id</div>');

  			//insert values of form into cells of the db
			$query = "INSERT INTO `gigglesnshitcomments`.`usercomments` (`id`, `username`, `email`, `password`, `comment`, `timestamp`, `articleid`) VALUES (NULL, '$users_username', '$users_email', '$users_password', '$users_comment', CURRENT_TIMESTAMP, '$articleid');";

  			//execute the $query variable above in order to run command
			mysql_query($query);

  			//success message to user
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Thank you for your Comment!</div>';

  			//comment added to db and now close connection to db
			mysql_close($con);
		}
   ?>