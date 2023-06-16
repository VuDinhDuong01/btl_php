 <?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['quyentruycap'] == 0){
		unset($_SESSION['email']);
		header('location:../../hello.php');
	}else{
		header('location:../../hello.php');
	}
?>