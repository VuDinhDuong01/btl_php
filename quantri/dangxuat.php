<?php
	session_start();
	if(isset($_SESSION['emailadmin'])){
		unset($_SESSION['emailadmin']);
		header('location:index.php');
	}else{
		header('location:index.php');
	}
?>