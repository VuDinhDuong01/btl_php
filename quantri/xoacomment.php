<?php
include('ketnoi.php');
if (isset($_GET['id_comment'])) {
    $id = $_GET['id_comment'];
    $sql = "DELETE FROM comment WHERE id_comment=$id";
    $query = mysqli_query($conn, $sql);
    echo " <script>window.location.href ='quantri.php?page_layout=commentsp';</script>";
}
