<?php
	include('ketnoi.php');
		if (isset($_GET['id_sp'])) {
			$id = $_GET['id_sp'];
			$sql = "DELETE FROM sanpham WHERE id_sp=$id";
			$query = mysqli_query($conn, $sql);
			echo " <script>window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
		}
