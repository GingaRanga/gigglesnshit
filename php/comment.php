    <?php
	
/// COMMENT FORM ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//if form submitted with post method validator
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		//processing form
		$user = $_POST['username'];
		$user_email = $_POST['email'];
		$user_password = $_POST['password'];
		
		if(!empty($user) && !empty($user_email) && !empty($user_password)){
			include('comment-connect.php');//this if statement checks to see all values of form filled out, and won't connect if not
			
			mysqli_query($dbc, "INSERT INTO usercomments(username, email, password) VALUES('$user', '$user_email', '$user_password')");/*connects to db and inserts values into table columns of table "userdata" from values stored in above variables*/
			
			//make sure everything inserts into db
			$registered = mysqli_affected_rows($dbc);
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Thank you for posting your comment on Giggles N Shit Blog!</div>';//will return a number of rows
			
		}else{
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Please fill out each box in order to comment.</div>';
		}
	}else{
		echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Internal Error, comment not submitted.</div>';
	}
?>
