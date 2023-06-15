<!--  <?php
        session_start();
        include('ketnoi.php');
        // if($_SESSION['email'] == 'duong@gmail.com' &&$_SESSION['password']=='1234567'){

        // }
        ?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang chủ quản trị</title>
    <link rel="stylesheet" type="text/css" href="css/quantri.css" />
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div id="navbar">
                <ul>
                    <li id="admin-home"><a href="quantri.php">trang chủ quản trị</a></li>
                    <li><a href="quantri.php?page_layout=thanhvien">thành viên</a></li>
                    <li><a href="quantri.php?page_layout=danhmucsp">danh mục sản phẩm</a></li>
                    <li><a href="quantri.php?page_layout=danhsachsp">sản phẩm</a></li>
                 
                </ul>
                <div id="user-info">
                    <p>Xin chào <span></span> đã đăng nhập vào hệ thống</p>
                    <p><a href="dangxuat.php">Đăng xuất</a></p>
                </div>
            </div>
            <div id="banner">
                <div id="logo"><a href="#"><img src="anh/logo.png" /></a></div>
            </div>
        </div>
        <div id="body">
           

        </div>
        
    </div>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/quantri.css" />
  
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cssquantri.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body>

    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Admin</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>

                <a href="quantri.php?page_layout=quantri" class="logout">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Trang chủ quản trị</span>
                </a>

            </li>
            <li>

                <a href="" class="logout">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Quản Lý thành viên</span>
                </a>

            </li>
            <li>
                <a href="quantri.php?page_layout=danhsachdm">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Quản lý thư mục</span>
                </a>
            </li>
            <li>

                <a href="quantri.php?page_layout=danhsachsp" class="logout">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Quản lý sản phẩm</span>
                </a>


            </li>

            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Quản lý bình luận</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">

            <li>
                <a href="dangxuat.php" class="logout">
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
            <a href="#" class="profile">
                Xin Chào,<?php echo $_SESSION['email'] ?>
            </a>
        </nav>
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>
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

                    case 'quantri':
                        echo "<script>window.location.href = 'quantri.php';</script>";
                        break;
                }
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

    </section>




</body>

</html>