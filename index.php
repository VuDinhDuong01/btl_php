<?php
    session_start();
    include('cauhinh/ketnoi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Bán Hàng</title>
<link rel="stylesheet" type="text/css" href="css/trangchu.css" />
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<link rel="stylesheet" type="text/css" href="css/slideshow.css" />

<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

<script type="text/javascript">



function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the anh in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the anh in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 2000 );
});

</script>

</head>
<body>

<!-- Wrapper -->
<div id="wrapper">
	<!-- Header -->
    <div id="header">
    	<div id="search-bar">
        	<!--Tìm kiếm-->
            <?php
                 include_once('chucnang/timkiem/timkiem.php');
            ?>
            <!--Giỏ hàng-->
            <?php
                 include_once('chucnang/giohang/giohangcuaban.php');
            ?>
        </div>
        <div id="main-bar">
        	<div id="logo"><a   href="index.php"><img width"100" height="100" src="anh/logo.jpg" /></a></div>
            <div id="banner"></div>
        </div>
        <div id="navbar">
        	<ul>
            	<li id="menu-home"><a href="index.php">trang chủ</a></li>
                <li><a href="index.php?page_layout=gioithieu">giới thiệu</a></li>
                <li><a href="index.php?page_layout=dichvu">dịch vụ</a></li>
                <li><a href="index.php?page_layout=lienhe">liên hệ</a></li>
            </ul>
        </div>
    </div>
    <!-- End Header -->
    <!-- Body -->
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
                if(isset($_GET['page_layout'])){
                    switch($_GET['page_layout']){
                        case 'gioithieu':include_once('chucnang/menungang/gioithieu.php');break;
                        case 'dichvu':include_once('chucnang/menungang/dichvu.php');break;
                        case 'lienhe':include_once('chucnang/menungang/lienhe.php');break;
                        case 'chitietsp':include_once('chucnang/sanpham/chitietsp.php');break;
                        case 'danhsachsp':include_once('chucnang/sanpham/danhsachsp.php');break;
                        case 'danhsachtimkiem':include_once('chucnang/timkiem/danhsachtimkiem.php');break;
                        case 'giohang':include_once('chucnang/giohang/giohang.php');break;
                        case 'muahang':include_once('chucnang/giohang/muahang.php');break;
                        default:
                            include_once('chucnang/sanpham/sanphamdacbiet.php');
                            include_once('chucnang/sanpham/sanphammoi.php');
                    }
                }else{
                   
                    include_once('chucnang/sanpham/sanphammoi.php');
                }
                ?>
            </div>
           
        </div>
        <!-- End Right Column -->
    	    
        <div id="brand"></div>
    </div>
    <!-- End Body -->
    <!-- Footer -->

    <!-- End Footer -->
</div>
<!-- End Wrapper -->

</body>
</html>
