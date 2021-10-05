<?php
require('db.php');
include("auth_session.php");
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Response to Post Status</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--for responsiveness-->
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
  <?php include 'logininclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
    <h1>Message Submission Status</h1>
    <?php

    if(empty($_POST['requestid'])||empty($_POST['title'])||empty($_POST['sametrain'])||empty($_POST['stop'])||empty($_POST['recipient'])
		||empty($_POST['recipientemail'])||empty($_POST['sendername'])||empty($_POST['sender'])||empty($_POST['senderemail'])||empty($_POST['message'])) {
    		print"It is mandatory to answer all fields.";
        print"<p><a href='viewposts.php'>Go Back To View All Posts</a></p>";
      }
    	else
    	{
    		$DBConnect = mysql_connect("itec315.frostburg.edu", "lao0123","3119869");

    		if($DBConnect === false)
    			print"Unable to connect to the database, error number:".mysql_errno();
    		else{
    			$DBName = "lao0123";
    			mysql_select_db($DBName,$DBConnect);

    			$TableName = "message";
				  //$TableName2 = "message_connect";

		if(isset($_POST['requestid'])) {
          $requestid = stripslashes($_POST['requestid']);
        } else {
          $requestid = "";
        }

        if(isset($_POST['title'])) {
          $title = stripslashes($_POST['title']);
        } else {
          $title = "";
        }

        if(isset($_POST['sametrain'])) {
          $sametrain = stripslashes($_POST['sametrain']);
        } else {
          $sametrain = "";
        }

        if(isset($_POST['stop'])) {
          $stop = stripslashes($_POST['stop']);
        } else {
          $stop = "";
        }

        if(isset($_POST['recipient'])) {
          $recipient = stripslashes($_POST['recipient']);
        } else {
          $recipient = "";
        }

		if(isset($_POST['recipientemail'])) {
          $recipientemail = stripslashes($_POST['recipientemail']);
        } else {
          $recipientemail = "";
        }

		if(isset($_POST['sendername'])) {
          $sendername = stripslashes($_POST['sendername']);
        } else {
          $sendername = "";
        }

        if(isset($_POST['sender'])) {
          $sender = stripslashes($_POST['sender']);
        } else {
          $sender = "";
        }

        if(isset($_POST['senderemail'])) {
          $senderemail = stripslashes($_POST['senderemail']);
        } else {
          $senderemail = "";
        }

        if(isset($_POST['message'])) {
          $msg = stripslashes($_POST['message']);
        } else {
          $msg = "";
        }


		if($_POST['message']) {
		mail("$recipientemail", "Form to email message", $_POST["message"], "From: $senderemail");
}

    		$SQLstring ="insert into $TableName(request_id, title, sametrain, stop, msg)
						 values('$requestid','$title', '$sametrain', '$stop', '$msg')";

    		$QueryResult = @mysql_query($SQLstring,$DBConnect);
    		if($QueryResult === false) {
    			print"<br><br>There was an error";
          print"<p><a href='viewposts.php'>Go Back -- Try Again</a></p>";

		  while(($Row = mysql_fetch_assoc($QueryResult)) !== false)
						{


			$msgid = $Row['message_id'];
			 $SQLstring2 ="insert into $TableName2(message_id, title, sametrain, stop, msg)
						 values('$msgid', $title', '$sametrain', '$stop', '$msg')";
    		$QueryResult2 = @mysql_query($SQLstring2,$DBConnect);
    		if($QueryResult2 === false) {
    			print"<br><br>There was an error";
          print"<p><a href='viewposts.php'>Go Back -- Try Again</a></p>";
			}
			}}
    		else
    			print"<br><br>Information Submitted.";
    		}

        mysql_close($DBConnect);
    	}

    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
