<?php
	require_once 'dbconnect.php';
	if(isset($_POST['register_btn'])){
		session_start();
	 	$name = ($_POST['username']);
		$email = ($_POST['email']);
	 	$password = ($_POST['password']);
	 	$con_pass = ($_POST['con_pass']);
	 	if ($password != $con_pass)
	 	{
	 		$_SESSION['error'] = "The two password doesn't match";
	 	}
	 	else {
	 		$password = md5($password);
			$sql = "INSERT INTO users (name, email, password) values ('$name','$email','$password') ";
			if(mysqli_query($conn, $sql)){
				$_session['name'] = $name;
				$_SESSION['logged_in'] = true;
				header ("location:login.php");
			}
			
	 	}
	 }	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Using Session </title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<div class="content">
	<h1>Register using session</h1>
	<div>
		<?php if(isset($_SESSION['error'])) {
			echo $_SESSION['error'];
		} ?><br><br>
	</div>
		<form method="POST">	
				Username:<input type="text" name="username" placeholder="enter user name" value="<?php echo isset($name)?$name:''; ?>" required> <br><br>

				Email:<input type="email" name="email" placeholder="enter email" value="<?php echo isset($email)?$email:'' ?>" required> <br><br>

				Password:<input type="password" name="password" placeholder="enter password" required><br><br>

				Confirm_pass:<input type="password" name="con_pass" placeholder="enter confirm password"
				required><br><br>
				<button type="submit" name="register_btn">Register</button>
				<button type="submit" name="signin_btn"><a href="login.php">Signin</a></button>
		</form>
	</div>
</body>
</html>
