<?php
	require 'database.php';
	if(isset($_POST['submit'])){
		$title = ($_POST['title']);
		$description = ($_POST['description']);
		$price = ($_POST['price']);
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$image_name = basename($_FILES["image"]["name"]);

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			echo 'success';
		} else{
			echo 'error';
		}
		$sql = "INSERT INTO offer (title, description, price, image) values ('$title','$description','$price','$image_name') ";
		$sucess =mysqli_query($conn, $sql);
		if(!$sucess){
			echo ("error description:" . mysqli_error($conn));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Offer</title>
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
<h3>Offer</h3>
<form  enctype="multipart/form-data" method="POST">
<div class="row">
<div class="row">
	<div class="col-md-6">Title</div>
	<div class="col-md-6">
		<input type="text" name="title" placeholder="enter title" value="<?php echo isset($title) ? $title:'' ?>">
	</div>
</div>
<div class="row">
	<div class="col-md-6">Description</div>
	<div class="col-md-6">
		<input type="text" name="description" placeholder="enter description" value="<?php echo isset($description) ? $description:'' ?>" >
	</div>
</div>
<div class="row">
	<div class="col-md-6">Image</div>
	<div class="col-md-6">
		<input type="file" name="image" placeholder="upload image">
	</div>
</div>
<div class="row">
	<div class="col-md-6">Price</div>
	<div class="col-md-6">
		<input type="text" name="price" placeholder="enter price" value="<?php echo isset($price) ? $price:'' ?>">
	</div>
</div>
<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6">
		<button type="submit" name="submit">Submit</button>
	</div>
</div>
</div>
</form>
	
</div>
</body>
</html>