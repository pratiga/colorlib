<?php
	require 'database.php';
	if(isset($_POST['submit'])){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$image_name = basename($_FILES["image"]["name"]);
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo 'success';
		} else{
			echo 'error';
		}
		$sql = "INSERT INTO gallery (image) values ('$image_name') ";
		mysqli_query($conn, $sql);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
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
	<h3>Gallery</h3><br>
	<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">
	<div class="col-md-4">
		Image:
	</div>
	<div class="col-md-8">
		<div class="row">
			<input type="file" name="image">
		</div>
		<div class="row">
			<button type="submit" name="submit">submit</button>
		</div>
	</div>
	</form>
	</div>
</div>
</body>
</html>