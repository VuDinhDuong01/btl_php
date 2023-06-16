<div class="l-sidebar">
	<h2>hãng Laptop</h2>
	<ul id="main-menu">
    <?php
    include('cauhinh/ketnoi.php');
        $sql = "SELECT * FROM dmsanpham";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)){
    ?>
    	<li><a href="khachhang.php?page_layout=danhsachsp&id_dm=<?= $row['id_dm'] ?>&tendanhmuc=<?= $row['tendanhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
    <?php
        }
    ?>
    </ul>
</div>