<?php

	//connect to server db using hostname, username and password
	$con = mysql_connect("blogaccounts.db","gingaranga","Ch33K02?");
	
	//if does not connect to db die fxn stops process and outputs error
	if (!$con){
    	die('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>Could not connect: </div>' . mysql_error());
  	}
	
	//now we are choosing specific db to connect to
  	mysql_select_db("gigglesnshitcomments", $con);
	
	/*get the article id so we know which page the comment is from. Based on url gigglesnshit.com/pages/blog-1.php?id=1 for ex.*/
  	$article_id = $_GET['id'];
			
	//security to make sure url is numerical id to prevent malicious code added via url
  	if( ! is_numeric($article_id) )
    	die('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>invalid article id</div>');
	
	//update query with article id and store in $query variable
	$query = mysql_query("SELECT * FROM `usercomments` WHERE `articleid` =$article_id",$con);
	
	//comments being posted message to user
	echo '<section class="bg-primary"><div class="container"><div class="row"><div class="col-lg-12 text-center"><h3>User Comments</h3><hr class="light"></div></div></div></section>';
	
	//loop through all of the comments and each comment is stored in variable $row
	while($row = mysql_fetch_array($query)){
		
		//loop through and pull data from each row of the db table
		$db_username = $row['username'];
		$db_timestamp = $row['timestamp'];
  		$db_comment = $row['comment'];
		
		//to stop hacker from typing in redirect link under one of the above rows and redirecting users to malware
		$db_username = htmlspecialchars($row['username'],ENT_QUOTES);
  		$db_comment = htmlspecialchars($row['comment'],ENT_QUOTES);
		
		//print comments to screen with css formatting
		echo 
			'<div class="jumbotron">
				<div class="container">
					<h4 class="section-heading">'
						.$db_username.'<br />
						<small>'
							.$db_timestamp.
						'</small>
					</h4>
					<div class="well well-lg">'
						.$db_comment.'<br />
					</div>
				</div>
    		</div>';
	}
	
	//close db connection
	mysql_close($con);
	
?>