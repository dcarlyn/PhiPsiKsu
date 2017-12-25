<?php
	//change path for linux you will have to use / instead of \\
	require_once(__DIR__ . "/../include/database-connect.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST["username"];
		$pass = $_POST["password"];
		$confirm_pass = $_POST["confirm_password"];
		$code = $_POST["code"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$birthday = $_POST["birthday"];
		$email = $_POST["email"];

		$error = $username_err = $password_err = $confirm_password_err = $code_err = $birthday_err = $name_err = $email_err = "";
		$is_err = false;

		$stmt = $conn->prepare("SELECT * FROM members WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows > 0)
		{
			$is_err = true;
			$username_err = "Username already exists";
		} 
		else 
		{
			//Checking for Errors

			//Needs a name
			if($first_name == "" || $last_name == "")
			{
				$is_err = true;
				$name_err = "Enter your name";
			}

			if($email == "")
			{
				$is_err = true;
				$email_err = "Enter an email";
			}

			if($username == "")
			{
				$is_err = true;
				$username_err = "Enter a username";
			}

			$d = DateTime::createFromFormat("m/d/Y", $birthday);
			if($d && $d->format('m/d/Y') !== $birthday)
			{
				$is_err = true;
				$birthday_err = "Invalid format (MM/DD/YYYY)";
			}

			if($pass == "")
			{
				$is_err = true;
				$password_err = "Enter a password";
			}
			else
			{
				if($pass != $confirm_pass)
				{
					$is_err = true;
					$confirm_password_err = "Passwords do not match";
				}
			}

			if($code != "amici")
			{
				$is_err = true;
				$code_err = "Incorrect code";
			}


			if(!$is_err)
			{
				//Password Hash
				$options = [
					'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
					'cost' => 11
				];

				$hash_password = password_hash($pass, PASSWORD_BCRYPT, $options);
				echo $hash_password;
				$stmt = $conn->prepare("INSERT INTO members (first_name, last_name, email, birthday, username, password) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("ssssss", $first_name, $last_name, $email, $birthday, $username, $hash_password);
				$stmt->execute();
				echo $conn->error;

				//Set up Session Variables

				//Go Home
				header('Location: ../');
			}
			else
			{
				$error = "Registration Failed";
			}
		}

		$stmt->close();
	}

	$conn->close();

?>

<html>
	<head>
		<title>Phi Kappa Psi Register</title>
	</head>

	<style>
		/* Set gray background color and 100% height */
		.sidenav {
  			padding-top: 20px;
  			background-color: #f1f1f1;
  			height: 100%;
		}

		.error{
			color: red;
		}

		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
		  .sidenav {
		    height: auto;
		    padding: 15px;
		  }
		}
	</style>

	<body>

		<!-- Change \\ to / in linux -->
		<!-- ================== HEADER ======================== -->
		<?php require_once(__DIR__ . "/../header/header.php"); ?>
		<!-- ================================================== -->
  
		<div class="container-fluid text-center">    
		  	<div class="row content">
		
		    	<div class="col-sm-2 sidenav">
		    		<!--
		      		<p><a href="#">Link</a></p>
		      		<p><a href="#">Link</a></p>
		      		<p><a href="#">Link</a></p>
		    		-->
		    	</div>
		
		    	<div class="col-sm-8 text-left"> 
		      		<h1>Register</h1>

		      		<div>
		      			<form action="register.php" method="post">
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">First Name: </label>
		      					<input class="col-sm-4" name = "first_name" type="text" value = "<?php echo $first_name; ?>"/>
		      					<p class="error"><?php echo $name_err; ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">Last Name: </label>
		      					<input class="col-sm-4" name = "last_name" type="text" value = "<?php echo $last_name; ?>" />
		      					<p class="error"><?php ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">Birthday (MM/DD/YYYY): </label>
		      					<input class="col-sm-4" name = "birthday" type="text" value = "<?php echo $birthday; ?>" />
		      					<p class="error"><?php ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">Email: </label>
		      					<input class="col-sm-4" name = "email" type="text" value = "<?php echo $email; ?>" />
		      					<p class="error"><?php echo $email_err; ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">Username: </label>
		      					<input class="col-sm-4" name = "username" type="text" value = "<?php echo $username; ?>" />
		      					<p class="error"><?php echo $username_err; ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">Password: </label>
		      					<input class="col-sm-4" name = "password" type="password" />
		      					<p class="error"><?php echo $password_err; ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">Confirm Password: </label>
		      					<input class="col-sm-4" name = "confirm_password" type="password" />
		      					<p class="error"><?php echo $confirm_password_err; ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class="col-sm-4">Registration Code: </label>
		      					<input class="col-sm-4" name = "code" type="password" />
		      					<p class="error"><?php echo $code_err; ?></p>
		      				</div>
		      				<div class = "col-sm-12 text-center">
		      					<button class = "col-sm-2">Submit</button>
		      				</div>
		      			</form>
		      		</div>

		      		<div>
		      			<a href = "login.php">Login Here</a>
		      		</div>

		      		<div class = "error">
		      			<?php
		      				if($is_err)
		      				{
		      					echo $error . "<br>";
		      				}
		      			?>
		      		</div>
    			</div>

    			<div class="col-sm-2 sidenav">
    			
    			<!--
      				<div class="well">
      				</div>
      				<div class="well">
      				</div>
    			-->

    			</div>
    
  			</div>
		</div>


		<!-- Change \\ to / in linux -->
		<!-- ===================FOOTER========================== -->
		<?php require_once(__DIR__ . "/../footer/footer.php");?>
		<!-- ===================FOOTER========================== -->
	</body>

</html>
