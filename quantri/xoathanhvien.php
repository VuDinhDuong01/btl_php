<?php
include('ketnoi.php');
    if (isset($_GET['thanhvien'])) {
        $id = $_GET['thanhvien'];
        $sql = "DELETE FROM thanhvien WHERE id_thanhvien=$id";
         mysqli_query($conn, $sql);
        echo "<script>window.location.href ='quantri.php?page_layout=thanhvien';</script>";
    }