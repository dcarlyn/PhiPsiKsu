<?php
	//change path for linux you will have to use / instead of \\
	require_once(__DIR__ . "/../include/database-connect.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST["username"];
		$pass = $_POST["password"];
		$username_err = $password_err = "";
		$is_err = false;

		if($username != "")
		{

			//Query
			$stmt = $conn->prepare("SELECT * FROM members WHERE username = ?");
			$stmt->bind_param("s", $username);
			$result = $conn->query($sql);
			$stmt->execute();
			$result = $stmt->get_result();

			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$hash = $row["password"];
			
				if(password_verify($pass, $hash))
				{
					//Set up Session variables
					
					//Go Home
					header('Location: ../');
				}
				else
				{
					$is_err = true;
					$password_err = "Incorrect Password";
				}

			} 
			else 
			{
				$is_err = true;
				$username_err = "Username does not exist";
			}

			//Close Statement
			$stmt->close();

		}
		else
		{
			$is_err = true;
			$username_err = "Enter a username";
		}
	}

	$conn->close();

?>

<html>
	<head>
		<title>Phi Kappa Psi Login</title>
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
		      		<h1>Login</h1>

		      		<div>
		      			<form action="login.php" method="post">
		      				<div class="col-sm-12 text-left">
		      					<label class = "col-sm-4">Username: </label>
		      					<input class = "col-sm-4" name = "username" type="text" value = "<?php echo $username; ?>" />
		      					<p class = "error"><?php echo $username_err; ?></p>
		      				</div>
		      				<div class="col-sm-12 text-left">
		      					<label class = "col-sm-4">Password: </label>
		      					<input class = "col-sm-4" name = "password" type="password" />
		      					<p class = "error"><?php echo $password_err; ?></p>
		      				</div>
		      				<div class = "col-sm-12 text-left">
		      					<button>Submit</button>
		      				</div>
		      			</form>
		      		</div>

		      		<div>
		      			<a href = "register.php">Register Here</a>
		      		</div>

		      		<div class = "error">
		      			<?php
		      				if($is_err)
		      				{
		      					echo "Login Failed";
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
		<?php require_once(__DIR__ . "/../footer//footer.php");?>
		<!-- ===================FOOTER========================== -->
	</body>

</html>
