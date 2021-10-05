<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Find My User ID</title>
	<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--for responsiveness-->
	<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
	<?php include 'logininclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
		  <br><br>
			<h1>Find My User ID</h1>
			<br>
			<h5>Please type in your username:</h5>
			<br>
			<form method='POST' action = 'searchidresult.php'>
	        <p><label for="username"></label><input type = 'text' name = 'searchname'><label for="username"></p>
	        <p><label for="submit"><input type='submit' class="buttonlink" value='Submit'></label></p>
			</form>
			<br><p><a href='createrequest.php'>Click Here to Go Back</a></p>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
