<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>User ID Search Result</title>
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
		<br><br>
		<h1>My User ID</h1>
		<br>
		<?php
			$DBConnect = mysql_connect("itec315.frostburg.edu", "lao0123","3119869");

			if($DBConnect === false)
				print"Unable to connect to the database, error number:".mysql_errno();
			else{
				$DBName = "lao0123";
				if(!@mysql_select_db($DBName,$DBConnect)) {
					print"<p>No database exists.</p>";
					print"<p><a href='createrequest.php'>Go Back to Create Request</a></p>";
				} else {
					$FindByUserName = stripslashes($_POST['searchname']);
					$TableName = "users";
					$SQLString = "select * from $TableName where username='$FindByUserName'";
					$QueryResult = @mysql_query($SQLString, $DBConnect);
					if(mysql_num_rows($QueryResult) ==0) {
						print"<p>Nonexistent User.</p>";
						print"<p><a href='searchmyid.php'>Go Back -- Try Again</a></p>";
					}
					else
					{
						while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
						{
							print"<p>Your UserID: {$Row['UserID']}</p>";
							print"<p><a href='createrequest.php'>Go Back to Create Request</a></p>";
						}

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
