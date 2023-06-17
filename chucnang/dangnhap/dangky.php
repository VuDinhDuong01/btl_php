 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
     <div class="mask d-flex align-items-center h-100 gradient-custom-3">
         <div class="container h-100">
             <div class="row d-flex justify-content-center align-items-center h-100">
                 <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                     <div class="card" style="border-radius: 15px;">
                         <div class="card-body p-5">
                             <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                             <form method="post">
                                 <div class="form-outline mb-4">
                                     <label class="form-label" for="form3Example1cg">Your Name</label>
                                     <input type="text" name="name" required id="form3Example1cg" class="form-control form-control-lg" />
                                 </div>
                                 <div class="form-outline mb-4">
                                     <label class="form-label" for="form3Example3cg">Your Email</label>
                                     <input type="email" name="email" required id="form3Example3cg" class="form-control form-control-lg" />
                                 </div>

                                 <div class="form-outline mb-4">
                                     <label class="form-label" for="form3Example4cg">Password</label>
                                     <input type="password" name="password" required id="form3Example4cg" class="form-control form-control-lg" />

                                 </div>
                                 <div class="d-flex justify-content-center">
                                     <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                 </div>

                                 <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="../dangnhap/dangnhap.php" class="fw-bold text-body"><u>Login here</u></a></p>
                             </form>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

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
            $sql = "INSERT INTO thanhvien(email, passWord, quyentruycap, name) VALUES ('$email', '$password','$quyentruycap', '$name')";
            $query = mysqli_query($conn, $sql);
            echo " <script>window.location.href = '../dangnhap/dangnhap.php';</script>";
            echo $email;
        } else {
            $error = "Tài khoản không chính xác";
        }
    }
    ?>