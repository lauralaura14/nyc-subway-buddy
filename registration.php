<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8"/>
    <title>Registration</title>
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
		// When form submitted, insert values into the database.

			$TableName = "users";

		if (isset($_REQUEST['username'])) {
					$fname = stripslashes($_REQUEST['fname']);
					$fname = mysqli_real_escape_string($con, $fname);

					$lname = stripslashes($_REQUEST['lname']);
					$lname = mysqli_real_escape_string($con, $lname);

					$address = stripslashes($_REQUEST['address']);
					$address = mysqli_real_escape_string($con, $address);

					$city = stripslashes($_REQUEST['city']);
					$city = mysqli_real_escape_string($con, $city);

					$state = stripslashes($_REQUEST['state']);
					$state = mysqli_real_escape_string($con, $state);

					$zip = stripslashes($_REQUEST['zip']);
					$zip = mysqli_real_escape_string($con, $zip);

					$gender = stripslashes($_REQUEST['gender']);
					$gender = mysqli_real_escape_string($con, $gender);

					$bdate = stripslashes($_REQUEST['bdate']);
					$bdate = mysqli_real_escape_string($con, $bdate);

					$username = stripslashes($_REQUEST['username']);
					$username = mysqli_real_escape_string($con, $username);

					$password = stripslashes($_REQUEST['password']);
					$password = mysqli_real_escape_string($con, $password);

					$email = stripslashes($_REQUEST['email']);
					$email = mysqli_real_escape_string($con, $email);

					$age_range = stripslashes($_REQUEST['age_range']);
					$age_range = mysqli_real_escape_string($con, $age_range);

					$usualtrain_dir = stripslashes($_REQUEST['usualtrain_dir']);
					$usualtrain_dir = mysqli_real_escape_string($con, $usualtrain_dir);

					$usual_stn = stripslashes($_REQUEST['usual_stn']);
					$usual_stn = mysqli_real_escape_string($con, $usual_stn);

			$query = "insert into $TableName(fname,lname,address,city,state,zip,gender,bdate,username,password,email,age_range,usualtrain_dir,usual_stn)
					  values('$fname','$lname','$address','$city','$state','$zip','$gender','$bdate','$username','$password','$email','$age_range','$usualtrain_dir','$usual_stn')";

			$result = mysqli_query($con, $query);
			if ($result) {
				print "<div class='form'>
					  <h3>You are registered.</h3><br/>
					  <p class='link'>Click here to <a href='login.php'>Login</a></p>
					  </div>";
			} else {
				print "<div class='form'>
					  <h3>You must fill in all fields.</h3><br/>
					  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
					  </div>";
			}
				} else {
				?>
					<form class="form" action="" method="post">
					<div class="containerlarge">
						<p><h1>Registration</h1></p>
						<p>All fields are required</p>
            <br>
								<div class="row">
								<label for="fname" class="labeltext">First Name:<br>
								<input type="text" id="fname" name="fname" required></label><br>
								</div>

								<div class="row">
								<label for="lname" class="labeltext">Last Name:<br>
								<input type="text" id="lname" name="lname" required></label><br>
								</div>

								<div class="row">
								<label for="address" class="labeltext">Address:<br>
								<input type="text" id="address"  name="address" required></label><br>
								</div>

								<div class="row">
								<label for="city" class="labeltext">City:<br>
								<input type="text" id="city"  name="city" required></label><br>
								</div>

								<div class="row">
								<label for="state" class="labeltext">State:<br>
								<input type="text" id="state"  name="state" required></label><br>
								</div>

								<div class="row">
								<label for="zip" class="labeltext">Zip:<br>
								<input type="text" id="zip"  name="zip" required></label><br>
								</div>

								<div class="row w-25">
								<p><label for="gender">What is your gender?</label></p>
									<input type="radio" id="male" name="gender" value="male">
									<label for="male">Male</label><br>
									<input type="radio" id="female" name="gender" value="female">
									<label for="female">Female</label><br>
									<input type="radio" id="other" name="gender" value="other">
									<label for="other">Other</label><br>
								</div>

								<div class="row w-25">
									<p><label for="bdate">Birthdate:</label></p>
									<input type="date" id="bdate" name="bdate" required><br>
								</div>

								<div class="row">
								<label for="username" class="labeltext">Username:<br>
								<input type="text" id="username"  name="username" required></label><br>
								</div>

								<div class="row">
								<label for="password" class="labeltext">Password:<br>
								<input type="password" id="password"  name="password" required></label><br>
								</div>

								<div class="row">
								<label for="email" class="labeltext">Email:<br>
								<input type="text" id="email"  name="email" required></label><br>
								</div>

								<div class="row w-25">
									<label for="age_range">
                    <p>What is your age range:</label></p>
										<select name="age_range" id="age">
											<option value="twenties">21-29</option>
											<option value="thirties">30-39</option>
											<option value="forties">40-49</option>
											<option value="fifties">50-59</option>
											<option value="sixties">60-69</option>
											<option value="seventies">70-79</option>
											<option value="eightiesup">80+</option>
										</select>
                  </label>
								</div>

								<div class="row w-25">
									  <label for="usualtrain_dir">
                    <p>Which train do you regularly take?</p>
										<select name="usualtrain_dir" id="usualtrain_dir" size="4">
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
                  </label>
								</div>

								<div class="row w-25">
									<p><label for="usual_stn">Your Usual Station:</label></p>
										<select name="usual_stn" id="usual_stn">
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
                <br>
						<p><label for="submit"><input type="submit" name="submit" value="Register" class="buttonlink"></label></p>
								<p>Already have an account? <class="link"><a href="login.php">Login!</a></p>
					</form>
				<?php
					}
				?>
			</div>
			</div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

			</body>
			</html>
