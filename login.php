<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylesheet.css"/>
</head>
<body>
  <?php include 'logoutinclude.htm';?>
	<div class="topbackground" title="Top Background Photo Subway Sign">
	</div>
	<div class="container1">
<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $TableName = "users";
        $query = "select * from $TableName where username = '$username' and password = '$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user account message list
            header("Location: acctmsglist.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
	<div class="containerlarge">
		<form class="form" method="post" name="login">
			<h1 class="login-title">Login</h1>
      <br><br>
			<p><label for="username"></label><input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/></p>
			<p><label for="password"></label><input type="password" class="login-input" name="password" placeholder="Password"/></p>
			<input type="submit" value="Login" name="submit" class="buttonlink"/>
			<br><br>
      <p>No account? <class="link"><a href="registration.php">Register!</a></p>
	  </form>
	</div>
<?php
    }
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
