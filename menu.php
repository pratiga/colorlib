<?php
	require 'database.php';
	if(isset($_POST['submit'])){
		$title = ($_POST['title']);
		$description = ($_POST['description']);
		$price = ($_POST['price']);
		$category_id = ($_POST['category_id']);
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$image_name = basename($_FILES["image"]["name"]);

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo 'success';
		} else{
			echo 'error';
		}
		$sql = "INSERT INTO menu (category_id, title, description, price, image) values ('$category_id', '$title','$description','$price','$image_name') ";
		$sucess =mysqli_query($conn, $sql);
		if(!$sucess){
			echo ("error description:" . mysqli_error($conn));
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>menu</title>
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
<h3>menu</h3>
<form method="POST" enctype="multipart/form-data">
<div class="row">
	<div class="col-md-4">
		<div class="row">
			title:
		</div>
		<div class="row">
			description:
		</div>
		<div class="row">
			price:
		</div>
		<div class="row">
			image:
		</div>
		<div class="row">
			category_id:
		</div>
	</div>
	<div class="col-md-8">
		<div class="row">
			<input type="text" name="title" placeholder="enter title" value=""<?php echo isset($title) ? $title:'' ?>"" required>
		</div>
		<div class="row">
			<input type="text" name="description" placeholder="enter description" value=""<?php echo isset($description) ? $description:'' ?>"" required>
		</div>
		<div class="row">
			<input type="text" name="price" placeholder="enter title" value=""<?php echo isset($price) ? $price:'' ?>"" required>
		</div>
		<div class="row">
			<input type="file" name="image" placeholder="upload image">
		</div>
		<div class="row">
			<input type="number" name="category_id" placeholder="enter category_id">
		</div>
		<div class="row">
			<button type="submit" name="submit">submit</button>
		</div>
	</div>
</div>
	
</form>
</div>
</body>
</html>