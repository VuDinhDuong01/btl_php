<?php
session_start();
include('cauhinh/ketnoi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Website Bán Hàng</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <link rel="stylesheet" type="text/css" href="css/trangchu.css" />
    <link rel="stylesheet" type="text/css" href="css/slideshow.css" />

    <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

    <script type="text/javascript">
        function slideSwitch() {
            var $active = $('#slideshow IMG.active');
            if ($active.length == 0) $active = $('#slideshow IMG:last');
            var $next = $active.next().length ? $active.next() :
                $('#slideshow IMG:first');
            $active.addClass('last-active');
            $next.css({
                    opacity: 0.0
                })
                .addClass('active')
                .animate({
                    opacity: 1.0
                }, 1000, function() {
                    $active.removeClass('active last-active');
                });
        }

        $(function() {
            setInterval("slideSwitch()", 2000);
        });
    </script>

</head>

<body>
    <div id="wrapper">

        <div id="header">
            <div id="search-bar">
                <?php
                include_once('chucnang/timkiem/timkiem.php');
                ?>
                <?php
                 if(isset($_SESSION['email'] ) && $_SESSION['email'] !='duong@gmail.com'){
                    ?>
                    <a href='' style=" margin-left: 400px ">Xin Chào , <?=$_SESSION['email']?></a>
                    <a href="chucnang/dangnhap/dangxuat.php"  style=" margin-left: 10px ">Đăng Xuất</a>
                    <?php
                 }else{
                    ?>
                    <a href="chucnang/dangnhap/dangnhap.php" style=" margin-left: 500px ">Đăng Nhập</a>
                    <?php
                 }
    
                 ?>
                
            </div>
            <div id="main-bar">

                <div id="logo"><a href="khachhang.php"><img width"100" height="100" src="anh/logo.jpg" /></a></div>
                <div id="banner"></div>
                <?php
                include_once('chucnang/giohang/giohangcuaban.php');
                ?>
            </div>
            <div id="navbar">
                <ul>
                    <li id="menu-home"><a href="khachhang.php">trang chủ</a></li>
                    <li><a href="khachhang.php?page_layout=gioithieu">giới thiệu</a></li>
                    <li><a href="khachhang.php?page_layout=dichvu">dịch vụ</a></li>
                    <li><a href="khachhang.php?page_layout=lienhe">liên hệ</a></li>
                </ul>
            </div>

        </div>
        <div id="body">

            <div id="l-col">
                <?php
                include_once('chucnang/sanpham/danhmucsp.php');
                ?>

                <?php
                include_once('chucnang/quangcao/quangcao.php');
                ?>

                <?php
                include_once('chucnang/thongke/thongke.php');
                ?>

            </div>

            <div id="r-col">

                <?php
                include_once('chucnang/slideshow/slideshow.php');
                ?>
                <div id="main">
                    <?php
                    if (isset($_GET['page_layout'])) {
                        switch ($_GET['page_layout']) {
                            case 'gioithieu':
                                include_once('chucnang/menungang/gioithieu.php');
                                break;
                            case 'dichvu':
                                include_once('chucnang/menungang/dichvu.php');
                                break;
                            case 'lienhe':
                                include_once('chucnang/menungang/lienhe.php');
                                break;
                            case 'chitietsp':
                                include_once('chucnang/sanpham/chitietsp.php');
                                break;
                            case 'danhsachsp':
                                include_once('chucnang/sanpham/danhsachsp.php');
                                break;
                            case 'danhsachtimkiem':
                                include_once('chucnang/timkiem/danhsachtimkiem.php');
                                break;
                            case 'giohang':
                                include_once('chucnang/giohang/giohang.php');
                                break;
                            case 'muahang':
                                include_once('chucnang/giohang/muahang.php');
                                break;
                            default:
                               
                                include_once('chucnang/sanpham/sanphammoi.php');
                        }
                    } else {

                        include_once('chucnang/sanpham/sanphammoi.php');
                    }
                    ?>
                </div>

            </div>


            <div id="brand"></div>
        </div>

    </div>


</body>

</html>