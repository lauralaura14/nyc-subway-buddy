<?php
require('db.php');
include("auth_session.php");
?>


<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="utf-8">
    <title>Account - My Post(s)</title>
    <link rel="stylesheet" href="css/stylesheet.css" />
</head>
<body>
    <?php include 'logininclude.htm';?>
    <div class="topbackground" title="Top Background Photo Subway Sign">
	  </div>

	<div class="container1">
        <br><p><strong>Welcome Back, <?php echo $_SESSION['username']; ?>!</strong></p>

	<div class="topbackground">
	</div>

	<div class="container1">
    <p><h1>My Request Posts</h1></p>
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
                        $TableName1.train_dir from $TableName1 left outer join users on $TableName1.userid = $TableName2.userid WHERE $TableName2.username = '".$_SESSION['username']."'";
    			$QueryResult = @mysql_query($SQLString, $DBConnect);
    			if(mysql_num_rows($QueryResult) ==0) {
    				print"No posts.<br><br>";
					print"<p><a href='createrequest.php'>Create a Request</a></p>";
          }
    			else
    			{
    				print"<p>List of my Requests</p>";

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
					print"<br><br><p><a href='createrequest.php'>Create a Request</a></p>";
    			}
    			mysql_free_result($QueryResult);
    		}
    		mysql_close($DBConnect);
    	}

    ?>

        <p><a href="logout.php">Logout</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
