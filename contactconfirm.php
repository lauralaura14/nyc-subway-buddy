<!DOCTYPE html>
<html>
<head>
  <title>Contact Submission Status</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!--for responsiveness-->
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
  <?php include 'logoutinclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>

	<div class="container1">
    <h1>Contact Message Submission Status</h1>
    <?php

    if(empty($_POST['firstname'])||empty($_POST['lastname'])||empty($_POST['email'])||empty($_POST['phone'])||empty($_POST['message'])) {
    		print"It is mandatory to answer all fields.";
        print"<p><a href='contact.php'>Go Back To Contact Form</a></p>";
      }
    	else
    	{

		if(isset($_POST['firstname'])) {
          $firstname = stripslashes($_POST['firstname']);
        } else {
          $firstname = "";
        }

        if(isset($_POST['lastname'])) {
          $lastname = stripslashes($_POST['lastname']);
        } else {
          $lastname = "";
        }

        if(isset($_POST['email'])) {
          $email = stripslashes($_POST['email']);
        } else {
          $email = "";
        }

        if(isset($_POST['phone'])) {
          $phone = stripslashes($_POST['phone']);
        } else {
          $phone = "";
        }

		if($_POST['message']) {
		mail("lao0@frostburg.edu", "Form to email message", $_POST["message"], "From: $email");
}

		}
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
