<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Request</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--for responsiveness-->
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

  <body>
    <?php include 'logininclude.htm';?>
    <div class="topbackground" title="Top Background Photo Subway Sign">
    </div>

    <div class="container1">
	     <div class="containerlarge">
      	<h1>Create a Request:</h2>

  		<p>Don't Know Your UserID? <a href="searchmyid.php">Click here</a></p>
      <br>
          <form action="confirmrequest.php" method="POST">
  				<div class="row">
          <label for="userid" class="labeltext">
  				<p>Your User ID:</p>
  				<input type="text" class="requestinput" name="userid" placeholder="User ID"  /></label><br>
  				</div>

  				<div class="row">
          <label for="requesttitle" class="labeltext">
  				<p>Title: </p>
  				<input type="text" class="requestinput" name="title" placeholder="Title" /></label><br>
  				</div>

  				<div class="row w-25">
          <p><label for="requestdatetime" class="labeltext">Travel Date & Time:</label></p>
  				<input type="datetime-local" class="requestinput" name="traveldatetime" placeholder="Travel Date/Time"  /></label><br>
      			</div>

  				<div class="row w-25">
  				<p><label for="requeststation" class="labeltext">Your Station: </label></p>
  					<select name="station" id="station">
  						<option value="unionsq">Union Square</option>
  						<option value="timessq">Times Square</option>
  						<option value="penn34">34th St - Penn Station</option>
  						<option value="fifthave">Fifth Ave</option>
  						<option value="jaymetro">Jay St - MetroTech</option>
  						<option value="atlanticbarc">Atlantic Ave - Barclays Center</option>
  						<option value="crownutica">Crown Heights - Utica Ave</option>
  						<option value="coneystill">Coney Island - Stillwell Ave</option>
  					</select>
      			</div>

  				<div class="row w-25">
          <label for="requesttraindirection" class="labeltext">
  				<p>Your Train & Direction: </p>
  					<select name="train_dir" id="train_dir" size="4">
  						<option value="A">A</option>
  						<option value="B">B</option>
  						<option value="C">C</option>
  						<option value="D">D</option>
  						<option value="E">E</option>
  						<option value="F">F</option>
  						<option value="M">M</option>
  						<option value="N">N</option>
  						<option value="Q">Q</option>
  						<option value="4">4</option>
  						<option value="5">5</option>
  						<option value="6">6</option>
  					</select>
            </label><br>
      			</div>

  				<div class="row">
          <label for="requestmessage" class="labeltext">
  				<p>Message: </p><textarea rows='5' cols='30' class="requestinput" name="msg" placeholder="Message"></textarea>
          </label><br>
  				</div>

      		  <label for="submit"><input type="submit" name="submit" class="buttonlink" value="Submit"></label>
      		</form>

          </div>
  		</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
