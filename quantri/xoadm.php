<?php
include('ketnoi.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM dmsanpham WHERE id_dm=$id";
        $query = mysqli_query($conn, $sql);
        echo " <script>window.location.href = 'quantri.php?page_layout=danhsachdm';</script>";
    }
