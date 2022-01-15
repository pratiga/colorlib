<?php
	require 'database.php';
	if(isset($_POST['submit'])){
		$title = ($_POST['title']);
		$description = ($_POST['description']);

		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["image"]["name"]);
		$image_name = basename($_FILES["image"]["name"]);
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
			echo 'sucess';
		}else{
			echo 'error';
		}
	$sql = "INSERT INTO news (image,title, description) values ('$image_name','$title','$description')";
		mysqli_query($conn,$sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>news</title>
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
<h3>news</h3><br>
<form method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-4">
			image:
		</div>
		<div class="col-md-8">
			<input type="file" name="image" class="form-control">
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-4">
			title:
		</div>
		<div class="col-md-8">
			<input type="text" name="title" class="form-control" required value="<?php echo isset($title)?$title:'' ?>">
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-4">
			description:
		</div>
		<div class="col-md-8">
		<div class="row">
			<input type="text" name="description" class="form-control" required value="<?php echo isset($description)?$description:'' ?>">
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