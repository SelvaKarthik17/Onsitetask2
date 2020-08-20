<?php 
  require 'dbconfig/config.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

</head>
<body>
	<div>
		    <form action = "forgot.php" method = "post">
			  <label><b>Username:</b></label><br>
			  <input name="username" type="text" class="inputvalues" placeholder="Type Username Here"/> <br>
			  <input name="send" type="submit" id="forgot_btn" value="Send email"/><br>
			</form>

			<?php

				if(isset($_POST['send']))
				{	$username = $_POST["username"];
			        $mail = " ";
			        $password = " ";
		           $query="select mail,password from userinfo WHERE username='$username'";
		 	       $query_run = mysqli_query($con,$query);

		 	       if(mysqli_num_rows($query_run) > 0)
		 	       {
		 	       	  while ($row = $query_run->fetch_assoc())
			        {
   				       $mail = $row["mail"];
   				       $password = $row["password"];
				    }

				        $to = "$mail";
              			$subject = "Password:";
						$txt = "Your password is $password";
						$headers = "From: onsitetasks@delta.com";


  						if(mail($to,$subject,$txt,$headers))
  						{
  							echo '<script type="text/javascript"> alert("Mail sent successfully") </script>';
  							header('location:index.php');
  						}



		 	       }

				}

				?>
	</div>
	</body>
	</html>

