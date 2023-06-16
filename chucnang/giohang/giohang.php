<link rel="stylesheet" type="text/css" href="css/giohang.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="prd-block">
    <h2>giỏ hàng của bạn</h2>
    <div class="cart">
        <?php
        include('cauhinh/ketnoi.php');
        if (isset($_SESSION['giohang'])) {
            
            if (isset($_POST['sl'])) {
                foreach ($_POST['sl'] as $id_sp => $sl) {
                    if ($sl == 0) {
                        unset($_SESSION['giohang'][$id_sp]);
                    } else {
                        $_SESSION['giohang'][$id_sp] = $sl;
                    }
                }
            }

            $arrId = array();
            //Lấy ra id sản phẩm từ mảng session
            foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                $arrId[] = $id_sp;
            }
            //Tách mảng arrId thành 1 chuỗi và ngăn cách bởi dấu ,
            $strID = implode(',', $arrId);
            if (isset($sl)) {
                $sql = "SELECT * FROM sanpham WHERE id_sp IN ($strID)";
                $query = mysqli_query($conn, $sql);
                $totalPriceAll = 0;

        ?>
                <form method="post" id="giohang">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản Phẩm</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Tổng Tiền</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_assoc($query)) {
                            $totalPrice = $_SESSION['giohang'][$row['id_sp']] * $row['gia_sp'];
                        ?>
                            <tbody>
                                <tr>
                                    <td style="font-size: 12px;"><?php echo $row['ten_sp'] ?></td>
                                    <td><img width="50" height="50" src="<?php echo $row['anh_sp'] ?>" /></td>
                                    <td style="font-size: 12px;"><?php echo number_format($row['gia_sp'], 0, ',', '.')   ?> VNĐ</td>
                                    <td><?php echo $_SESSION['giohang'][$row['id_sp']] ?></td>
                                    <td style="font-size: 12px;"><?php echo number_format($totalPrice, 0, ',', '.') ?> VNĐ</td>
                                    <td><a href="chucnang/giohang/xoahang.php?id_sp=<?= $row['id_sp'] ?>" onclick='return confirm("bạn có muốn sản phẩm này không")'>Xóa</a></td>
                                </tr>
                            </tbody>
                        <?php
                            $totalPriceAll += $totalPrice;
                        }
                        ?>
                    </table>
                </form>
                <p>Tổng giá trị giỏ hàng là: <span><?php echo  number_format($totalPriceAll, 0, ',', '.')  ?> VNĐ</span></p>

                <a href="khachhang.php"><button type="button" class="btn btn-success">Tiếp tục mua hàng</button></a>
                <a href="khachhang.php?page_layout=muahang"><button type="button" class="btn btn-success">Thanh Toán</button></a>
        <?php
            } else {
                echo 'Giỏ hàng rỗng';
            }
        } else {
            echo 'Giỏ hàng rỗng';
        }
        ?>
    </div>

</div>