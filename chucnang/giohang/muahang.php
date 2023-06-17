 <link rel="stylesheet" type="text/css" href="css/muahang.css" />
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <div class="">
     <div style=" items-align:center;width:100% ;background:#000;color:#fff; padding:5px ; margin-bottom:10px">
         <h5>Giỏ hàng của bạn</h5>
     </div>
     <div class="">
         <table class="table" style="margin-left:15px">
             <thead>
                 <tr>
                     <th scope="col">id</th>
                     <th scope="col">Tên Sản phẩm</th>
                     <th scope="col">Giá</th>
                     <th scope="col">Số lượng</th>
                     <th scope="col">Thành tiền</th>
                 </tr>
             </thead>
             
             <?php
                include("cauhinh/ketnoi.php");
                $arrId = array();

                foreach ($_SESSION['giohang'] as $id_sp => $sl) {
                    $arrId[] = $id_sp;
                }




                $strID = implode(',', $arrId);
                $sql = "SELECT * FROM sanpham WHERE id_sp IN ($strID)";
                $query = mysqli_query($conn, $sql);
                $totalPriceAll = 0;
                while ($row = mysqli_fetch_array($query)) {
                    $totalPrice = $_SESSION['giohang'][$row['id_sp']] * $row['gia_sp'];
                ?>
                <tbody>
                 
                 
                <tr>
                <td class="prd-name"><?php echo $row['id_sp'] ?></td>
                     <td class="prd-name"><?php echo $row['ten_sp'] ?></td>
                     <td class="prd-price"><?php echo number_format($row['gia_sp'], 0, ',', '.') ?> VNĐ</td>
                     <td class="prd-number"><?php echo $_SESSION['giohang'][$row['id_sp']] ?></td>
                     <td class="prd-total"><?php echo number_format($totalPrice, 0, ',', '.') ?> VNĐ</td>
                 </tr>
             </tbody>
                 

             <?php

                    $totalPriceAll += $totalPrice;
                }
                ?>
             <tr>
                 <td class="prd-name">Tổng giá trị hóa đơn là:</td>
                 <td colspan="2"></td>
                 <td class="prd-total"><span><?php echo number_format($totalPriceAll, 0, ',', '.') ?> VNĐ</span></td>
             </tr>
         </table>
         <!-- <table border="0px" cellpadding="0px" cellspacing="0px" width="100%">
             <tr id="invoice-bar">
                 <td width="45%">Tên Sản phẩm</td>
                 <td width="20%">Giá</td>
                 <td width="15%">Số lượng</td>
                 <td width="20%">Thành tiền</td>
             </tr> -->
            
         <!-- </table> -->
     </div>
     <div class="form-payment" style="margin-left:100px;margin-top:50px;margin-bottom:50px">
         <form method="post">
             <ul>
                 <li class="info-cus"><label>Tên khách hàng</label><br /><input required type="text" name="ten" /></li>
                 <li class="info-cus"><label>Số điện thoại</label><br /><input required type="text" name="telephone" /></li>
                 <li class="info-cus"><label>Địa chỉ nhận hàng</label><br /><input required type="text" name="address" /></li>
                 <!-- <li><input type="submit" name="submitthanhtoan" value="Xác nhận mua hàng" /> -->
                 <button type="submit" name="submitthanhtoan" class="btn btn-primary">Xác nhận mua hàng</button>
                 <button type="reset" name="reset" class="btn btn-primary">Làm lại</button>
                  <!-- <input type="reset" name="reset" value="Làm lại" /></li> -->
             </ul>
         </form>
     </div>
 </div>
 <?php
    if (isset($_POST['submitthanhtoan'])) {
        include('cauhinh/ketnoi.php');
        $name = $_POST['ten'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO orders(name,telephone,address,total,date) VALUES('$name','$telephone','$address','$totalPriceAll','$date')";
        $query1 = mysqli_query($conn, $sql);
        $id_order = $conn->insert_id;
        $keys = array_keys($_SESSION['giohang']);
        $keyString = implode(',', $keys);
        $sql = "SELECT * FROM sanpham WHERE id_sp IN ($keyString)";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        if ($result > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id_sp'];
                $price = $row['gia_sp'];
                $quanlity = $_SESSION['giohang'][$row['id_sp']];
                $result = "INSERT INTO order_detail (order_id, product_id,price,quanlity,date) VALUES ('$id_order','$id','$price','$quanlity','$date')";
                mysqli_query($conn, $result);

                // header('Location:hoanthanh.php');
                // echo "<script>window.location.reload();</script>";
            }
        }
        // unset($_SESSION['giohang']);
        //     if (isset($_SESSION['giohang'])) {
        //         $arrId = array();
        //         foreach ($_SESSION['giohang'] as $id_sp => $sl) {
        //             $arrId[] = $id_sp;
        //         }
        //         $strId = implode(', ', $arrId);
        //         $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp
        //     DESC";
        //         $query = mysqli_query($conn, $sql);
        //     }
        //     $strBody = '';
        //     // Thông tin Khách hàng
        //     $strBody = '<p>
        //     <b>Khách hàng:</b> ' . $ten . '<br />
        //     <b>Email:</b> ' . $mail . '<br />
        //     <b>Điện thoại:</b> ' . $dt . '<br />
        //     <b>Địa chỉ:</b> ' . $dc . '
        //     </p>';
        //     // Danh sách Sản phẩm đã mua
        //     $strBody .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
        //     width="100%">
        //     <tr>
        //     <td align="center" bgcolor="#3F3F3F" colspan="4"><font
        //     color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
        //     </tr>
        //     <tr id="invoice-bar">
        //     <td width="45%"><b>Tên Sản phẩm</b></td>
        //     <td width="20%"><b>Giá</b></td>
        //     <td width="15%"><b>Số lượng</b></td>
        //     <td width="20%"><b>Thành tiền</b></td>
        //     </tr>';
        //     $totalPriceAll = 0;
        //     while ($row = mysqli_fetch_array($query)) {
        //         $totalPrice = $row['gia_sp'] * $_SESSION['giohang'][$row['id_sp']];
        //         $strBody .= '<tr>
        //     <td class="prd-name">' . $row['ten_sp'] . '</td>
        //     <td class="prd-price"><font color="#C40000">' . $row['gia_sp'] . '
        //     VNĐ</font></td>
        //     <td class="prd-number">' . $_SESSION['giohang'][$row['id_sp']] . '</td>
        //     <td class="prd-total"><font color="#C40000">' . $totalPrice . '
        //     VNĐ</font></td>
        //     </tr>';
        //         $totalPriceAll += $totalPrice;
        //     }
        //     $strBody .= '<tr>
        //     <td class="prd-name">Tổng giá trị hóa đơn là:</td>
        //     <td colspan="2"></td>
        //     <td class="prd-total"><b><font color="#C40000">' . $totalPriceAll . '
        //     VNĐ</font></b></td>
        //     </tr>
        //     </table>';
        //     $strBody .= '<p align="justify">
        //     <b>Quý khách đã đặt hàng thành công!</b><br />
        //     • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
        //     Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
        //     />
        //     • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
        //     khi giao hàng 24 tiếng.<br />
        //     <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng
        //     Tôi!</b>
        //     </p>';
    }
    ?>