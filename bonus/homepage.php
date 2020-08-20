
<?php 
 session_start();

if((!isset($_SESSION["name"])) || (!isset($_COOKIE["member_login"])))
  {
    header("location:index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>home</title>
	<form action = "homepage.php" method = "post">
		<input name="logout" type="submit" id="logout_btn" value="logout"/><br>
	</form>

</head>
<body>
	<div>
		<?php 
			$user =  "";
			if(isset($_SESSION["name"]))
			{
				$user = $_SESSION["name"];
			}
			else if(isset($_COOKIE["member_login"]))
			{
				$user = $_COOKIE["member_login"];
			}

			echo "<a>hello $user</a>";

			if(isset($_POST["logout"])){
					session_destroy();
					setcookie("member_login", "", time() - 3600);
					header('location:index.php');

			}

		?>

	</div>
</body>
</html>
