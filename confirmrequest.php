<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Submission Status</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!--for responsiveness-->
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
  <?php include 'logininclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
    <br><br>
    <h1>Submission Status</h1>
    <?php

    if(empty($_POST['userid'])||empty($_POST['traveldatetime'])||empty($_POST['station'])||empty($_POST['title'])||empty($_POST['train_dir'])) {
    		print"<br><br>It is mandatory to answer all fields except the last field -- msg.";
        print"<br><br><p><a href='createrequest.php'>Go Back -- Try Again</a></p>";
      }
    	else
    	{
    		$DBConnect = mysql_connect("itec315.frostburg.edu", "lao0123","3119869");

    		if($DBConnect === false)
    			print"Unable to connect to the database, error number:".mysql_errno();
    		else{
    			$DBName = "lao0123";
    			mysql_select_db($DBName,$DBConnect);

    			$TableName = "user_request";

        if(isset($_POST['userid'])) {
          $userid = stripslashes($_POST['userid']);
        } else {
          $userid = "";
        }

        if(isset($_POST['traveldatetime'])) {
          $traveldatetime = stripslashes($_POST['traveldatetime']);
        } else {
          $traveldatetime = "";
        }

        if(isset($_POST['station'])) {
          $station = stripslashes($_POST['station']);
        } else {
          $station = "";
        }

        if(isset($_POST['title'])) {
          $title = stripslashes($_POST['title']);
        } else {
          $title = "";
        }

        if(isset($_POST['train_dir'])) {
          $train_dir = stripslashes($_POST['train_dir']);
        } else {
          $train_dir = "";
        }

        if(isset($_POST['msg'])) {
          $msg = stripslashes($_POST['msg']);
        } else {
          $msg = "";
        }

    		$SQLstring ="insert into $TableName(userid, traveldatetime, station, title, train_dir, msg)
						 values('$userid', '$traveldatetime', '$station', '$title', '$train_dir', '$msg')";

    		$QueryResult = @mysql_query($SQLstring,$DBConnect);
    		if($QueryResult === false) {
    			print"<br><br>There was an error.<br>";
          print"<p><a href='index.php'>Go Back -- Try Adding Again</a></p>";
        }
    		else
    			print"<br><br>Information Submitted.<br>";
          print"<p><a href='acctmsglist.php'>View Your Requests</a></p>";
    		}

        mysql_close($DBConnect);
    	}

    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
