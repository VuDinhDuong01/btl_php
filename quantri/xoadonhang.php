<?php
include('ketnoi.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM orders WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    echo " <script>window.location.href ='quantri.php?page_layout=quanlydonhang';</script>";
}