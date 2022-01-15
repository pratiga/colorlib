<?php
	require 'database.php';
	if(isset($_POST['submit'])){
		$name = ($_POST['name']);
		$sql = "INSERT INTO category (name) values ('$name')";
		mysqli_query($conn,$sql);
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>category</title>
	<link href="additem.css" rel="stylesheet">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://www.embedgooglemap.net/">
    <link href="additem.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts/css/font-awesome.css">
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css">
</head>
<body>
<div class="container">
<h3>category</h3>
<form method="POST">
	<div class="row">
		<div class="col-md-4">
		<div class="row">
			category name:
			</div>
		</div>
		<div class="col-md-8">
			<div class="row"><input type="text" name="name" required placeholder="enter category name" value="<?php echo isset($name)?$name:'' ?>"></div>

			<div class="row"><button type="submit" name="submit">submit</button></div>
		</div>
	</div>
</form>	
</div>
</body>
</html>