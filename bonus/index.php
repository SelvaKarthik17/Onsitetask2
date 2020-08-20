<?php 
 session_start();
 require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

</head>
<body>
	<div>

		<form action = "index.php" method = "post">
			<label><b>Username:</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type Username Here"/> <br>
			<label><b>Password:</b></label><br>
			<input name="password" type="Password" class="inputvalues" placeholder="Type Password Here"/> <br>
			<input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
			<label for="remember-me">Remember me</label> 
			<input name="login" type="submit" id="login_btn" value="login"/><br>
		</form>	
		<form action = "forgot.php" method = "post">
			<input name="forgot" type="submit" id="forgot_btn" value="forgot password"/><br>
		</form>


		<?php 

			$rem = 0;
			if(isset($_POST["remember"]))
			{
				$rem=1;


			}

			if(isset($_POST['login']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];

		 	$query="select * from userinfo WHERE username='$username' AND password='$password'";

		 	$query_run = mysqli_query($con,$query);

		 	if(mysqli_num_rows($query_run)>0)

		 	{	
		 	   if($rem == 1)
		 		  {
		 		  	setcookie("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));
		 		  	setcookie("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));

		 		  }

		 		//valid , user exists
		 	    $_SESSION["name"]= $username;
		 		header('location:homepage.php');

		 	}
		 	else
		 	{
		 		echo '<script type="text/javascript">alert("Invalid Credentials !")</script>';
		 	}

				//$cookie_name = "user";
				//$cookie_value = "John Doe";

			}





		?>
	</div>	
</body>
</html>