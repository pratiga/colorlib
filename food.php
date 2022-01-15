<?php
	require 'database.php';
	if(isset($_POST['add_item'])){
		$name = ($_POST['name']);
		$price = ($_POST['price']);
		

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$image_name = basename($_FILES["image"]["name"]);

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo 'success';
		} else{
			echo 'error';
		}

		$description = ($_POST['description']);

		$sql = "INSERT INTO food (name, price, image, description) values ('$name','$price','$image_name','
		$description') ";
		mysqli_query($conn, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Food</title>
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
	<form method="POST" action="" enctype="multipart/form-data">
	<h3>Food</h3>
	<br>
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				Name:
			</div>
			<div class="row">
				Price:
			</div>
			<div class="row">
				Image:
			</div>
			<div class="row">
				Description:
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">
				<input type="text" name="name" placeholder="enter name" class="form-control" value="<?php echo isset($name)?$name:'' ?>" required>
			</div>
			<div class="row">
				<input type="text" name="price" placeholder="enter price" class="form-control" value="<?php echo isset($price)?$price:'' ?>" required>
			</div>
			<div class="row">
				<input type="file" name="image" placeholder="upload image" class="form-control" required>
			</div>
			<div class="row">
				<input type="text" name="description" placeholder="enter description" class="form-control" value="<?php echo isset($description)?$description:'' ?>" required>
			</div>
			<div class="row">
				<button type="submit" name="add_item">Add</button>
				<button type="submit" name="redirect"><a href="additem.php">Add page</a></button>
			</div>
		</div>
	</div>
	</form>
</div>
</body>
</html>