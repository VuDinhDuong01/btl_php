<?php

if (isset($_POST['submit'])) {
    include('../../cauhinh/ketnoi.php');
    $quyentruycap = 0;
    $error = NULL;
    if ($_POST['name'] == "") {
        $error = "Vui lòng nhập tên";
    } else {
        $name = $_POST['name'];
    }
    if ($_POST['email'] == "") {
        $error = "Vui lòng nhập  email";
    } else {
        $email = $_POST['email'];
    }

    if ($_POST['password'] == "") {
        $error = "Vui lòng nhập tmật khẩu";
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if (isset($email) && isset($password) && isset($name)) {
        $sql = "SELECT COUNT(*) as total FROM thanhvien WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $totalCount = $result['total'];
        if ($totalCount  > 0) {
            $error = "Tài khoản đã tồn tại";
        } else {
            $sql = "INSERT INTO thanhvien(email, passWord, quyentruycap, name) VALUES ('$email', '$password','$quyentruycap', '$name')";
            $query = mysqli_query($conn, $sql);
            echo " <script>window.location.href = '../dangnhap/dangnhap.php';</script>";
        }
    } else {
        $error = "Tài khoản không chính xác";
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Tạo Tài Khoản</h2>
                            <form method="post">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Họ và tên</label>
                                    <input type="text" required name="name" id="form3Example1cg" placeholder="Nhập Họ tên" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Email</label>
                                    <input type="email" required name="email" id="form3Example3cg" placeholder="Nhập Email" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Mật khẩu</label>
                                    <input type="password" required name="password" placeholder="Nhập mật khẩu" id="form3Example4cg" class="form-control form-control-lg" />
                                    <?php
                                    if (isset($error)) {
                                    ?> <span style="color:red"><?php echo  $error ?></span><?php
                                                                                            }
                                                                                                ?>


                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng ký</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">bạn đã có tài khoản chưa? <a href="../dangnhap/dangnhap.php" class="fw-bold text-body"><u>Đăng nhập tại đây</u></a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>