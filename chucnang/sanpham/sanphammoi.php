<div class="prd-block">
    <h2>sản phẩm mới về</h2>
    <div class="pr-list">
        <?php
        include('cauhinh/ketnoi.php');
        $sql = "SELECT * FROM sanpham ORDER BY id_sp DESC ";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            
        ?>
            <div class="prd-item">
                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="80" height="144" src="<?= $row['anh_sp'] ?>" /></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>

                <p class="price"><span>Giá: <?php echo $row['gia_sp'] ?> VNĐ</span></p>
            </div>
        <?php
        }
        ?>
        <div class="clear"></div>
    </div>
</div>