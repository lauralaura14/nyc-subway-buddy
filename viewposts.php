<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>View Users' Posts</title>
  <meta http-equiv="content-type" content="text/html; charset-iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--for responsiveness-->
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
  <?php include 'logininclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
    <br><br>
    <h1>View All Users' Posts</h1>
    <?php
    	$DBConnect = mysql_connect("itec315.frostburg.edu", "lao0123","3119869");

    	if($DBConnect === false)
    		print"Unable to connect to the database, error number:".mysql_errno();
    	else{
    		$DBName = "lao0123";
    		if(!@mysql_select_db($DBName,$DBConnect))
    			print"No database exists.";
    		else
    		{
    			$TableName1 = "user_request";
				$TableName2 = "users";
    			$SQLString = "select $TableName1.request_id, $TableName1.ts, $TableName2.username, $TableName1.traveldatetime, $TableName1.title, $TableName1.station,
                        $TableName1.train_dir from $TableName1 left outer join users on $TableName1.userid = $TableName2.userid order by $TableName1.ts desc;";
    			$QueryResult = @mysql_query($SQLString, $DBConnect);
    			if(mysql_num_rows($QueryResult) ==0) {
    				print"No posts.";
          }
    			else
    			{
    				print"<br>List of All Users' Posts<br>";

    				print"<table width = '100%' border ='1'>";
    				print"<tr><th>Post ID#</th><th>Timestamp</th><th>Username</th><th>Travel Date/Time</th><th>Title</th><th>Station</th><th>Train & Direction</th></tr>";

    				while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
    				{
    					print"<tr><td>{$Row['request_id']}</td>";
					    print"<td>{$Row['ts']}</td>";
					    print"<td>{$Row['username']}</td>";
    					print"<td>{$Row['traveldatetime']}</td>";
					    print"<td>{$Row['title']}</td>";
                        print"<td>{$Row['station']}</td>";
    					print"<td>{$Row['train_dir']}</td></tr>";
    				}
    				print"</table>";

                print"<br><br><p>Please type in Post ID of the post you wish to view:</p>";
                print"<form method='POST' action = 'post.php'>";
                    print"<p>Type in the Post ID: <label for='postid'><input type = 'text' name = 'individualpost'></label></p>";
                    print"<p><label for='submit'><input type='submit' class='buttonlink' value='Submit'></label></p>";
                print"</form>";
    			}
    			mysql_free_result($QueryResult);
    		}
    		mysql_close($DBConnect);
    	}

    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
