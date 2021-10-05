<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>View Post</title>
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
		<h1>View Post</h1>
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
					$FindPost = stripslashes($_POST['individualpost']);
					$TableName1 = "user_request";
					$TableName2 = "users";
					$SQLString = "select * from $TableName1 left outer join $TableName2 on $TableName1.userid = $TableName2.userid where $TableName1.request_id=$FindPost";
					$QueryResult = @mysql_query($SQLString, $DBConnect);
					if(mysql_num_rows($QueryResult) ==0) {
						print"Nonexistent post.";
						print"<p><a href='viewposts.php'>Go Back -- Try Searching Again</a></p>";
					}
					else
					{
						while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
						{
							print"<h2><p>Here is the post called '{$Row['title']}' by '{$Row['username']}'</p></h2>";
							print"<p>Post ID: {$Row['request_id']}</p>";
							print"<p>Timestamp: {$Row['ts']}</p>";
							print"<p>Username: {$Row['username']}</p>";
							print"<p>Travel Date/Time: {$Row['traveldatetime']}</p>";
							print"<p>Title: {$Row['title']}</p>";
							print"<p>Station: {$Row['station']}</p>";
							print"<p>Train & Direction: {$Row['train_dir']}</p>";
							print"<p>Message: {$Row['msg']}</p>";

							print"</div>";

							print"<div class='containerlarge'>";

							  print"<h2>Would You Like to Respond to this Post? Send a Message!</h2>";

							  print"<form method='post' action='postmsgconfirm.php'>";

							  print"<br><br><p><label for='requestid'>Request ID:</label></p>";
							  print"<input name='requestid' value={$Row['request_id']}>";

							  print"<br><br><p><label for='title'>Title:</label></p>";
							  print"<input name='title'>";

							  print"<br><br><p><label for='sametrain'>Same Train?</label></p>";
							  print"<input type='radio' id='male' name='sametrain' value='yes'>
											<label for='yes'>Yes</label><br>
											<input type='radio' id='female' name='sametrain' value='no'>
											<label for='no'>No</label><br>";

							  print"<br><br><p><label for='finalstop'>My Final Stop:</label></p>";
							  print"<select name='stop' id='stop'>
											<option value='unionsq'>Union Square</option>
											<option value='timessq'>Times Square</option>
											<option value='penn34'>34th St - Penn Station</option>
											<option value='fifthave'>Fifth Ave</option>
											<option value='jaymetro'>Jay St - MetroTech</option>
											<option value='atlanticbarc'>Atlantic Ave - Barclays Center</option>
											<option value='crownutica'>Crown Heights - Utica Ave</option>
											<option value='coneystill'>Coney Island - Stillwell Ave</option>
										</select>";

							  print"<br><br><p><label for='recipient'>Recipient Username:</label></p>";
							  print"<input name='recipient' value={$Row['username']}>";

							  print"<br><br><p><label for='recipientemail'>Recipient Email:</label></p>";
							  print"<input name='recipientemail' value={$Row['email']}>";

							  print"<br><br><p><label for='sendername'>Sender Name:</label></p>";
							  print"<input name='sendername'>";

							  print"<br><br><p><label for='senderid'>Sender ID:</label></p>";
							  print"<input name='sender'>";

							  print"<br><br><p><label for='senderemail'>Sender Email:</label></p>";
							  print"<input name='senderemail'>";

							  print"<br><br><p><label for='message'>Message:</label></p>";
							  print"<textarea rows='5' cols='25' name='message'></textarea>";

							  print"<br><br><p><label for='submit'><input type='submit' class='buttonlink' name='submit'></label></p>";
							  print"</form>";
							 print"</div>";
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
