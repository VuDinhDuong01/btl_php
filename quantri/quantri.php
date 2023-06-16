 <?php
    session_start();
    include('ketnoi.php');
    // if($_SESSION['email'] == 'duong@gmail.com' &&$_SESSION['password']=='1234567'){

    // }
    ?>



 <!-- <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="css/quantri.css" />

     <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet" href="cssquantri.css">

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <title>Admin</title>
 </head>

 <body>
     <section id="sidebar" style="background-color:#666">
         <a href="#" class="brand text-decoration-none" style="text-decoration:none ">
             <i class='bx bxs-smile'></i>
             <span class="text">Admin</span>
         </a>
         <ul class="side-menu top">
             <li class="active">
                 <a href="" style="text-decoration: none;">
                     <i class='bx bxs-dashboard'></i>
                     <span class="text">Dashboard</span>
                 </a>
             </li>

             <li>
                 <a href="quantri.php?page_layout=quantri" class="logout" style="text-decoration: none;color:#000;background:#F2F2F2;border-radius:none !important; ">
                     <i class='bx bxs-doughnut-chart'></i>
                     <span class="text">Trang chủ quản trị</span>
                 </a>

             </li>
             <li>
                 <a href="quantri.php?page_layout=thanhvien" class="logout" style="text-decoration: none;color:#000;background:#F2F2F2">
                     <i class='bx bxs-doughnut-chart'></i>
                     <span class="text">Quản Lý thành viên</span>
                 </a>
             </li>
             <li>
                 <a href="quantri.php?page_layout=danhsachdm" style="text-decoration: none;color:#000;background:#F2F2F2">
                     <i class='bx bxs-message-dots'></i>
                     <span class="text">Quản lý thư mục</span>
                 </a>
             </li>
             <li>
                 <a href="quantri.php?page_layout=danhsachsp" class="logout" style="text-decoration: none;color:#000;background:#F2F2F2">
                     <i class='bx bxs-doughnut-chart'></i>
                     <span class="text">Quản lý sản phẩm</span>
                 </a>
             </li> -->
 <!-- <li>
                 <a href="quantri.php?page_layout=commentsp" style="text-decoration: none;color:#000;background:#F2F2F2">
                     <i class='bx bxs-group'></i>
                     <span class="text">Quản lý bình luận</span>
                 </a>
             </li>
         </ul>
         <ul class="side-menu">
             <li>
                 <a href="dangxuat.php" class="logout" style="text-decoration: none;color:#000;background:#F2F2F2">
                     <i class='bx bxs-log-out-circle'></i>
                     <span>Đăng xuất</span>
                 </a>
             </li>
         </ul>
     </section>
     <section id="content">
         <nav>
             <form action="#" method="post">
                 <div class="form-input">
                     <input type="search" placeholder="Search..." name='search'>
                     <button type="submit" name="submitbtn" class="search-btn"><i class='bx bx-search'></i></button>
                 </div>
             </form>
             <?php
                if (isset($_POST['submitbtn'])) {
                    $search = $_POST['search'];
                }
                ?>
             <a href="#" class=" text-sm" style="text-decoration: none;">
                 Xin Chào,<?php echo $_SESSION['emailadmin'] ?>
             </a>
         </nav>
         <main>
           
            
             <div class="card text-center">
                 <div class="card-header">
                     Footer
                 </div>
                 <div class="card-body">
                     <h5 class="card-title">Special title treatment</h5>
                     <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                 </div>
                 <div class="card-footer text-muted">
                     2 days ago
                 </div>
             </div>
         </main>
     </section>
 </body>

 </html>  -->



 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

     <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
     <link rel="icon" type="image/png" href="./assets/img/favicon.png" />

     <title>Admin</title>

     <!--     Fonts and icons     -->
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

     <!-- Nucleo Icons -->
     <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
     <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

     <!-- Font Awesome Icons -->
     <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

     <!-- Material Icons -->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />

     <!-- CSS Files -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />


     <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
 </head>

 <body class="g-sidenav-show bg-gray-100">
     <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
         <div class="sidenav-header">
             <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
             <a class="navbar-brand m-0" href="  " target="_blank">
                 <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo" />
                 <span class="ms-1 font-weight-bold text-white"> Dashboard </span>
             </a>
         </div>

         <hr class="horizontal light mt-0 mb-2" />

         <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link text-white" href="quantri.php?page_layout=quantri">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">dashboard</i>
                         </div>

                         <span class="nav-link-text ms-1">Trang chủ</span>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link text-white" href="quantri.php?page_layout=thanhvien">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">table_view</i>
                         </div>

                         <span class="nav-link-text ms-1">Quản lý thành viên</span>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link text-white" href="quantri.php?page_layout=danhsachdm">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">receipt_long</i>
                         </div>

                         <span class="nav-link-text ms-1">Quản lý danh mục</span>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link text-white" href="quantri.php?page_layout=danhsachsp">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">view_in_ar</i>
                         </div>

                         <span class="nav-link-text ms-1">Quản lý sản phẩm</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link text-white" href="quantri.php?page_layout=commentsp">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">notifications</i>
                         </div>

                         <span class="nav-link-text ms-1">Quản lý bình luận</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link text-white" href="">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">notifications</i>
                         </div>

                         <span class="nav-link-text ms-1">Quản lý đơn hàng</span>
                     </a>
                 </li>

                 <li class="nav-item mt-3">
                     <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                         Account pages
                     </h6>
                 </li>



                 <li class="nav-item">
                     <a class="nav-link text-white" href="dangxuat.php">
                         <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                             <i class="material-icons opacity-10">logout</i>
                         </div>

                         <span class="nav-link-text ms-1">Đăng xuất</span>
                     </a>
                 </li>


             </ul>
         </div>

         <div class="sidenav-footer position-absolute w-100 bottom-0">
             <div class="mx-3">
                 <a class="btn btn-outline-primary mt-4 w-100" href="" type="button">Documentation</a>
                 <a class="btn bg-gradient-primary w-100" href="" type="button">Upgrade to pro</a>
             </div>
         </div>
     </aside>

     <main class="main-content border-radius-lg">
         <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
             <div class="container-fluid py-1 px-3">
                 <nav aria-label="breadcrumb">
                     DASHBOARD
                 </nav>
                 <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                     <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                         <div class="input-group input-group-outline">
                             <label class="form-label">Type here...</label>
                             <input type="text" class="form-control" />
                         </div>
                     </div>
                     <ul class="navbar-nav justify-content-end">
                         <li class="nav-item d-flex align-items-center">
                             <a href="./pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                                 <i class="fa fa-user me-sm-1"></i>

                                 <span class="d-sm-inline d-none"> Xin Chào,<?php echo $_SESSION['emailadmin'] ?></span>
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
         </nav>

         <?php
            if (isset($_GET['page_layout'])) {
                switch ($_GET['page_layout']) {
                    case 'themsp':
                        include('themsp.php');
                        break;
                    case 'suasp':
                        include('suasp.php');
                        break;
                    case 'danhsachsp':
                        include('danhsachsp.php');
                        break;
                    case 'danhsachdm':
                        include('danhsachdm.php');
                        break;
                    case 'themmoidm':
                        include('themmoidm.php');
                        break;
                    case 'suadm':
                        include('suadm.php');
                        break;
                    case 'xoadm':
                        include('xoadm.php');
                        break;
                    case 'xoasp':
                        include('xoasp.php');
                        break;
                    case 'thanhvien':
                        include('thanhvien.php');
                        break;
                    case 'xoathanhvien':
                        include('xoathanhvien.php');
                        break;
                    case 'commentsp':
                        include('danhsachcomment.php');
                        break;
                    case 'xoacommentsp':
                        include('xoacomment.php');
                        break;
                    case 'quantri':
                        echo "<script>window.location.href = 'quantri.php';</script>";
                        break;
                }
            } else {
                $sql = "SELECT*FROM thanhvien";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                $sql1 = "SELECT*FROM comment";
                $result1 = mysqli_query($conn, $sql1);
                $count1 = mysqli_num_rows($result1);
                $sql2 = "SELECT*FROM sanpham";
                $result2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($result2);
                $sql3 = "SELECT*FROM dmsanpham";
                $result3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($result3);
            ?>
             <div class="row">
                 <div class="col-lg-5 col-sm-5">
                     <div class="card mb-2">
                         <div class="card-header p-3 pt-2">
                             <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                 <i class="material-icons opacity-10">weekend</i>
                             </div>
                             <div class="text-end pt-1">
                                 <p class="text-sm mb-0 text-capitalize">Thành viên</p>
                                 <h4 class="mb-0"><?= $count ?></h4>
                             </div>
                         </div>

                         <hr class="dark horizontal my-0" />
                         <div class="card-footer p-3">
                             <p class="mb-0">
                                 <span class="text-success text-sm font-weight-bolder">+55% </span>than last week
                             </p>
                         </div>
                     </div>

                     <div class="card mb-2">
                         <div class="card-header p-3 pt-2">
                             <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                 <i class="material-icons opacity-10">leaderboard</i>
                             </div>
                             <div class="text-end pt-1">
                                 <p class="text-sm mb-0 text-capitalize">Sản phẩm</p>
                                 <h4 class="mb-0"><?= $count2 ?></h4>
                             </div>
                         </div>

                         <hr class="dark horizontal my-0" />
                         <div class="card-footer p-3">
                             <p class="mb-0">
                                 <span class="text-success text-sm font-weight-bolder">+3% </span>than last month
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
                     <div class="card mb-2">
                         <div class="card-header p-3 pt-2 bg-transparent">
                             <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                 <i class="material-icons opacity-10">store</i>
                             </div>
                             <div class="text-end pt-1">
                                 <p class="text-sm mb-0 text-capitalize">Danh mục</p>
                                 <h4 class="mb-0"><?= $count3 ?></h4>
                             </div>
                         </div>

                         <hr class="horizontal my-0 dark" />
                         <div class="card-footer p-3">
                             <p class="mb-0">
                                 <span class="text-success text-sm font-weight-bolder">+1% </span>than yesterday
                             </p>
                         </div>
                     </div>

                     <div class="card">
                         <div class="card-header p-3 pt-2 bg-transparent">
                             <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                 <i class="material-icons opacity-10">person_add</i>
                             </div>
                             <div class="text-end pt-1">
                                 <p class="text-sm mb-0 text-capitalize">Bình luận</p>
                                 <h4 class="mb-0"><?= $count1 ?></h4>
                             </div>
                         </div>


                         <hr class="horizontal my-0 dark" />
                         <div class="card-footer p-3">
                             <p class="mb-0">Just updated</p>
                         </div>
                     </div>
                 </div>
             </div>
         <?php
            }
            ?>
         <div class="card text-center">
             <div class="card-header">
                 Footer
             </div>
             <div class="card-body">
                 <h5 class="card-title">Special title treatment</h5>
                 <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                 <a href="#" class="btn btn-primary">Go somewhere</a>
             </div>
             <div class="card-footer text-muted">
                 2 days ago
             </div>
         </div>
     </main>

 </body>

 </html>