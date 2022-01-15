  <?php
	
		$dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "colorlib";
        $conn = new mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
        if(!$conn) {
            die('Could not connect ');
       	}
?>

