<?php
	session_start();
	if(isset($_SESSION['register_btn'])){
		echo $_SESSION['name'];
	} else{
		session_unset();
		session_destroy();
		header ("location:login.php");
	}
?>
