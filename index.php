<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>NYC Subway Buddy - Main</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--for responsiveness-->
	<link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
	<?php include 'logoutinclude.htm';?>
	<div id="mainbackground" title="Main Background Photo Girl Waiting for Subway">
	</div>

		<div class="maincontainer1">
		<div class="center-block">
		<h1>NYC Subway Buddy</h1>
		<h4>You Don't Have to Travel Alone</h4>
		<br>
		<form action="login.php">
			<label for="login"><input type="submit" class="mainbuttonlink" value="LOGIN" /></label>
		</form>
		<br>
		<p>Don't have an account? <a style="color:white" href="registration.php">Sign up!</a></p>
		</div>
	</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
