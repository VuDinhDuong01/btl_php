<?php
include('../../cauhinh/ketnoi.php');
session_start();
$error = NULL;
if (isset($_POST['submit'])) {
	if ($_POST['email'] == "") {
		$error = "Vui lòng nhập tài khoản và mật khẩu";
	} else {
		$email = $_POST['email'];
	}

	if ($_POST['password'] == "") {
		$error = "Vui lòng nhập tài khoản và mật khẩu";
	} else {
		$password = $_POST['password'];
	}

	if (isset($email) && isset($password) && $email !='duong@gmail.com') {
		$sql = "SELECT * FROM thanhvien WHERE email='$email' AND password= '$password'";
		$query = mysqli_query($conn, $sql);
        $result=mysqli_fetch_assoc($query);
		$rows = mysqli_num_rows($query);
		if ($rows <= 0) {
			$error = 'Tài khoản hoặc mật khẩu chưa đúng';
		} else {
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
            $_SESSION['quyentruycap']=$result['quyentruycap'];

             echo" <script>window.location.href = '../../hello.php';</script>";
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf8" />
	<title>Shop bán máy tính</title>
	<link rel="stylesheet" type="text/css" href="css/dangnhap.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	 <?php
	?>  
		<form method="post" class="col-3 mx-auto d-flex align-items-center " style="height: 100vh;">
			<ul>
			<h4>Tài Khoản Đăng Nhập</h4>
			<center><span style="color:red;"><?php echo $error; ?></span></center>
				<label for="basic-url">Tài Khoản</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name='email' />
				</div><label for="basic-url">Mật Khẩu</label>
				<div class="input-group mb-3">
					<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name='password' />
				</div>
				<button type="submit" name='submit' class="btn btn-primary">Đăng Nhập</button>
				<button type="reset" class="btn btn-primary">Làm Mới</button>
			</ul>

		</form>
	 <?php
	
	?> 
</body>

</html>