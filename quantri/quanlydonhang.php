<?php
include('ketnoi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h2 class='pt-3 px-3'>Quản lý đơn hàng</h2>
    <div class='px-3'> <a href="quantri.php?page_layout=themmoidm"><button type="button" class="btn btn-primary mt-5 mb-2">Thêm mới thư mục</button></a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Tên Mua</th>
                    <th scope="col" class="text-center">Địa chỉ</th>
                    <th scope="col" class="text-center">Số điện thoại</th>
                    <th scope="col" class="text-center">Tổng tiền</th>
                    <th scope="col" class="text-center">Ngày mua</th>
                    <th scope="col" class="text-center">Xóa</th>

                </tr>
            </thead>
            <?php
            $rowPage = 5;
            if (!isset($_GET['page'])) {
                $page = 1;
                $perRow = $page * $rowPage - $rowPage;
                $sql = "SELECT * FROM orders LIMIT $perRow,$rowPage";
                $query = mysqli_query($conn, $sql);
            } else {
                $page = $_GET['page'];

                $perRow = $page * $rowPage - $rowPage;
                $sql = "SELECT * FROM orders LIMIT $perRow,$rowPage ";
                $query = mysqli_query($conn, $sql);
            }
            $sql1 = "SELECT * FROM orders  ";
            $query1 = mysqli_query($conn, $sql1);
            $totalRow = mysqli_num_rows($query1);
            $totalPage = ceil($totalRow / $rowPage);
            $listPage = "";
            for ($i = 1; $i <= $totalPage; $i++) {
                if ($page == $i) {

                    $listPage .= '<li class="page-item active" ><a class="page-link"  href="quantri.php?page_layout=quanlydonhang&page=' . $i . '">' . $i . '</a></li>';
                } else {
                    $listPage .= '<li class="page-item " ><a  class="page-link" href="quantri.php?page_layout=quanlydonhang&page=' . $i . '">' . $i . '</a></li>';
                }
            }
            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'];
                $ten = $row['name'];
                $address = $row['address'];
                $telephone = $row['telephone'];
                $total = $row['total'];
                $date = $row['date'];
                
            ?>
                <tbody>
                    <tr>
                        <td class="text-center align-middle"><?= $id ?></td>
                        <td class="text-center align-middle"><?= $ten ?></td>
                        <td class="text-center align-middle"><?= $address ?></td>
                        <td class="text-center align-middle"><?= $telephone ?></td>
                        <td class="text-center align-middle"><? echo number_format($total, 0, ',', '.') ?></td>
                        <td class="text-center align-middle"><?= $date ?></td>
                        
                        <td class="text-center align-middle"> <a href="quantri.php?page_layout=xoadonhang&id=<?= $id ?>" onclick='return confirm("bạn có muốn xóa đơn hàng này không!")'><button type="button" class="btn btn-danger">Xóa</button></a></td>
                    </tr>

                </tbody>
                <tr>

                </tr>
            <?php
            }
            ?>

        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php echo  $listPage;
                ?>
            </ul>
        </nav>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>