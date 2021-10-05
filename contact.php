<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Contact Us</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta http-equiv="content-type" content="text/html; charset-iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!--for responsiveness-->
	<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
	<?php include 'logoutinclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
	<div class="containerlarge">
		<br><br>
		<h2>Contact Us!</h2>
		<h5>Questions/comments/concerns?<br>
		We would love to hear from you!<br><br>
		Or reach out to us via <a href = "mailto: lao0@frostburg.edu">email</a>.</h5>


		<form method='post' action='contactconfirm.php'>
		<br><br>

		<p><label for="firstname">First Name:</label></p>
		<input name='firstname'>
		<br><br>
		<p><label for="lastname">Last Name:</label></p>
		<input name='lastname'>
		<br><br>
		<p><label for="email">Email:</label></p>
		<input name='email'>
		<br><br>
		<p><label for="phone">Phone:</label></p>
		<input name='phone'>
		<br><br>
		<p><label for="message">Message:</label></p>
		<textarea rows='5' cols='30' name='message'></textarea>
		<br><br>
		<p><label for="submit"><input type='submit' class='buttonlink' name='submit'></label></p>
		</form>
		</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
