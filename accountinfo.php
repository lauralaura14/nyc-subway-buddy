<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>My Account Information</title>
  <meta http-equiv="content-type" content="text/html; charset-iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--for responsiveness-->
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
  <?php include 'logininclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
    <div class="containerlarge">
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
    			$TableName = "users";
    			$SQLString = "select * from $TableName WHERE username = '".$_SESSION['username']."'";
    			$QueryResult = @mysql_query($SQLString, $DBConnect);
					if(mysql_num_rows($QueryResult) ==0) {
						print"Nonexistent.";
					}
					else
					{
						while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
						{
							print"<h2><p>My Account Information:</p></h2>";
							print"<p>Username: {$Row['username']}</p>";
							print"<p>User ID: {$Row['UserID']}</p>";
							print"<p>Creation Date: {$Row['ts']}</p>";
							print"<p>First Name: {$Row['fname']}</p>";
							print"<p>Last Name: {$Row['fname']}</p>";
							print"<p>Address: {$Row['address']}</p>";
							print"<p>City: {$Row['city']}</p>";
							print"<p>State: {$Row['state']}</p>";
							print"<p>Zip: {$Row['zip']}</p>";
							print"<p>Gender: {$Row['gender']}</p>";
							print"<p>Birthdate: {$Row['bdate']}</p>";
							print"<p>Age Range: {$Row['age_range']}</p>";
							print"<p>Usual Train & Direction: {$Row['usualtrain_dir']}</p>";
							print"<p>Usual Station: {$Row['usual_stn']}</p>";
							print"<p>Email: {$Row['email']}</p>";
						}

					}
    			mysql_free_result($QueryResult);
    		}
    		mysql_close($DBConnect);
    	}

    ?>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
