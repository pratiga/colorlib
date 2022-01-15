<?php
	require_once 'dbconnect.php';
	session_start();
	if(isset($_POST['logged_btn'])){
		$user = $_POST['name1'];
		$psw = $_POST['password2'];
		$encpwd =md5($psw);
		$query = "SELECT * FROM users where name = '$user' AND password = '$encpwd'";
		$data = mysqli_query($conn,$query);
	 	$total = mysqli_num_rows($data);
	 	if($total>0){
	 		header ("location:home.php");
	 	}
	 	else{
	 		$error = "username or password donot matches";
	 		//echo "username or password donot matches";
	 	}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
<div class="content">
<h1>
	Login using session
</h1>
<div>
		<?php if(isset($error)) {
					echo $_SESSION['error'];
				} ?><br><br>
</div>
<form method="POST">
	username:<input type="text" name="name1" value="<?php echo isset($user)?$user:'' ?>" required><br><br>
	password:<input type="password" name="password2" required><br><br>
	<button type="submit" name="logged_btn">login</button>
</form>
</div>
</body>
</html>