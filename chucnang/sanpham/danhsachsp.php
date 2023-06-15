<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />

<div class="prd-block">
    <h2><?php
        include('cauhinh/ketnoi.php');
         $ten_dm = $_GET['tendanhmuc'];
         echo $ten_dm;
        ?></h2>
    <div class="pr-list">
        <?php
        $id_dm = $_GET['id_dm'];
        //Số bản ghi trên trang
        $rowPerPage = 3;
        //Số trang
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        //Vị trí
        $perRow = $page * $rowPerPage - $rowPerPage;
        $sql = "SELECT * FROM sanpham WHERE id_dm = $id_dm LIMIT $perRow,$rowPerPage";
        $query = mysqli_query($conn, $sql);
        //Tổng số bản ghi
        $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE id_dm = $id_dm"));
        //Tổng số trang
        $totalPage = Ceil($totalRow / $rowPerPage);
        $listPage = '';
        //Nút trang trước và trang đầu
        if ($page > 1) {
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=1"> First </a>';
            $prev = $page - 1;
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=' . $prev . '"> << </a>';
        }
        //Các phím số
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($i == $page) {
                $listPage .=  '<span> ' . $i . ' </span>';
            } else {
                $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=' . $i . '"> ' . $i . ' </a>';
            }
        }
        //Nút trang sau và trang cuối
        if ($page < $totalPage) {
            $next = $page + 1;
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=' . $next . '"> >> </a>';
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=' . $totalPage . '"> Last </a>';
        }
        $i = 0;
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="prd-item">
                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><img width="80" height="144" src="<?php echo $row['anh_sp'] ?>" /></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'] ?>"><?php echo $row['ten_sp'] ?></a></h3>
                
                <p class="price"><span>Giá: <?php echo $row['gia_sp'] ?> VNĐ</span></p>
            </div>
        <?php
            $i++;
            if ($i % 3 == 0) {
                echo '<div class="clear"></div>';
            }
        }
        ?>
        <div class="clear"></div>
    </div>
</div>

 <div id="pagination"><?php echo $listPage ?></div> 
