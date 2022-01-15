<?php
	require 'database.php';
	$sql = 'SELECT * FROM food';
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
	    echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th></tr>";
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]." ".$row["price"]."<img src=uploads/".$row["image"]."></td></tr>";
	    }
	    echo "</table>";
	} else {
    echo "0 results";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>view for colorlib</title>
</head>
<body>
	<h3>view for colorlib</h3>

</body>
</html>