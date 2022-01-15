<?php
	require 'database.php';
	
	if(isset($_POST['add_item'])){
		$title = ($_POST['title']);
		$subtitle = ($_POST['subtitle']);
		$description = ($_POST['description']);
		

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$image_name = basename($_FILES["image"]["name"]);

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo 'success';
		} else{
			echo 'error';
		}


		$sql = "INSERT INTO about(title, subtitle, description, image) values ('$title','$subtitle',
		'$description','$image_name') ";
		mysqli_query($conn, $sql);
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>about</title>
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
	<h3>About</h3>
	<div class="row">
	<form method="POST" action="" enctype="multipart/form-data">




	title:<input type="text" name="title" required value="<?php echo isset($title)?$title:'' ?>"><br><br>
	subtitle:<input type="text" name="subtitle" required value="<?php echo isset($subtitle)?$subtitle:'' ?>"><br><br>
	description:<input type="text" name="description" required value="<?php echo isset($description)?$description:'' ?>"><br><br>
	image:<input type="file" name="image"><br><br>
	<button type="submit" name="add_item">Add</button>
	</form>
	</div>
</div>
</body>
</html>
