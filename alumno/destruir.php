<?php 
	session_start();
	session_destroy();
	echo "has cerrado session";
	header("location: ../acceso.php");
?>