<link rel="stylesheet" type="text/css" href="css/chitietsp.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="prd-block">
    <div class="prd-only">
        <?php
        include('cauhinh/ketnoi.php');
        $id_sp = $_GET['id_sp'];
        $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        ?>
        <div class="prd-img d-flex align-items-center" style="height: 50vh;"><img class='my-auto' width="80%" src="<?php echo $row['anh_sp'] ?>" /></div>
        <div class="prd-intro">
            <h3 class='mb-5'><?php echo $row['ten_sp'] ?></h3>
            <p>Giá sản phẩm: <span><?php echo $row['gia_sp'] ?> VNĐ</span></p>
            <p>Tình trạng: <span>Vẫn còn</span></p>
            <p>Đi kèm: <span>Hôp, sách ,sạc, cáp, tai nghe</span></p>
            <p>Bảo hành: <span> 12 tháng </span></p>
            <p>Mô tả: <span><?php echo $row['chi_tiet_sp'] ?></span></p>
            <p class="add-cart"><a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp'] ?>"><span>đặt mua</span></a></p>
            <button type="button" class="btn btn-primary">Đặt Hàng</button>
        </div>

        <div class="clear"></div>


    </div>

    <div class="prd-comment">

        <form method="post">
            <ul>
                <h3>Bình luận sản phẩm</h3>
                <li class="required">Tên <br /><input required type="text" name="ten" /></li>
                <li class="required">Số điện thoại <br /><input required type="text" required="" name="dien_thoai" /></li>
                <li class="required">Nội dung <br /><textarea required name="binh_luan"></textarea></li>
                <li><input type="submit" name="submit" required="" value="Bình luận" /></li>
            </ul>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $ten = $_POST['ten'];
        $dien_thoai = $_POST['dien_thoai'];
        $binh_luan = $_POST['binh_luan'];
        $ngay_gio = date('Y-m-d ');
        $sql = "INSERT INTO comment (id_sp,ten,sodienthoai,comment,date) VALUES ($id_sp,'$ten','$dien_thoai','$binh_luan','$ngay_gio')";
        $query = mysqli_query($conn, $sql);
    }
    
    ?>
    <div class="comment-list">
        <?php
        $sql = "SELECT * FROM comment WHERE id_sp = $id_sp";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <ul>
                <li class="com-title"><?php echo $row['ten'] ?><br />
                    <span>
                        <?php
                        $oriDate = $row['date'];
                        $newDate = date('d-m-Y ', strtotime($oriDate));
                        echo $newDate;
                        ?>
                    </span>
                </li>
                <li class="com-details"><?php
                                        echo $row['comment'];
                                        ?></li>
            </ul>
        <?php
        }
        ?>
    </div>

    <div class="com-pagination"><span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a></div>

</div>