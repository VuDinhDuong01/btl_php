<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="prd-block">
    <h2><?php
        include('cauhinh/ketnoi.php');
        $ten_dm = $_GET['tendanhmuc'];
        echo $ten_dm;
        ?></h2>
    <div class="pr-list">
        <?php
        $id_dm = $_GET['id_dm'];
        
        $rowPerPage = 3;
        
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
      
        $perRow = $page * $rowPerPage - $rowPerPage;
        $sql = "SELECT * FROM sanpham WHERE id_dm = $id_dm LIMIT $perRow,$rowPerPage";
        $query = mysqli_query($conn, $sql);
        
        $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE id_dm = $id_dm"));
        
        $totalPage = Ceil($totalRow / $rowPerPage);
        $listPage = '';
        
        if ($page > 1) {
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=1"> First </a>';
            $prev = $page - 1;
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=' . $prev . '"> << </a>';
        }
      
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($i == $page) {
                $listPage .=  '<span> ' . $i . ' </span>';
            } else {
                $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&ten_dm=' . $ten_dm . '&page=' . $i . '"> ' . $i . ' </a>';
            }
        }
        
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
                <p><span>Giá: <?= number_format($row['gia_sp'], 0, ',', '.') ?> VNĐ</span></p>
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