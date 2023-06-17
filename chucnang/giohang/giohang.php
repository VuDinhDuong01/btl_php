 <link rel="stylesheet" type="text/css" href="css/giohang.css" />
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <div class="">
     <div style=" items-align:center;width:100% ;background:#000;color:#fff; padding:5px ; margin-bottom:10px">
         <h5>Giỏ hàng của bạn</h5>
     </div>
     <div class="">
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
                foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                    $arrId[] = $id_sp;
                }
                $strID = implode(',', $arrId);
                if (isset($sl)) {
                    $sql = "SELECT * FROM sanpham WHERE id_sp IN ($strID)";
                    $query = mysqli_query($conn, $sql);
                    $totalPriceAll = 0;
            ?>
                 <form method="post" id="giohang">
                     <table class="table" style="margin-left:15px">
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
                                     <td><img width="50" height="50" src="quantri/<?php echo $row['anh_sp'] ?>" /></td>
                                     <td style="font-size: 12px;"><?php echo number_format($row['gia_sp'], 0, ',', '.')   ?> VNĐ</td>
                                     <td><?php echo $_SESSION['giohang'][$row['id_sp']] ?></td>
                                     <td style="font-size: 12px;"><?php echo number_format($totalPrice, 0, ',', '.') ?> VNĐ</td>
                                     <td><a href="chucnang/giohang/xoahang.php?id_sp=<?= $row['id_sp'] ?>" onclick='return confirm("bạn có muốn sản phẩm này không")'><button type="button" class="btn btn-danger">Xóa</button></a></td>
                                 </tr>
                             </tbody>
                         <?php
                                $totalPriceAll += $totalPrice;
                            }
                            ?>
                     </table>
                 </form>
                 <div class="w-100  " style="width:100% ; margin-left:100px;margin-bottom:100px;margin-top:50px;">
                     <p style="color: red;font-size:20px">Tổng giá trị giỏ hàng là: <span><?php echo  number_format($totalPriceAll, 0, ',', '.')  ?> VNĐ</span></p>

                     <a href="khachhang.php"><button type="button" class="btn btn-success">Tiếp tục mua hàng</button></a>
                     <a href="khachhang.php?page_layout=muahang"><button type="button" class="btn btn-success">Thanh Toán</button></a>
                 </div>
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