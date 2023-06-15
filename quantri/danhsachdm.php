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
    <a href="quantri.php?page_layout=themmoidm"><button type="button" class="btn btn-primary mt-5 mb-2">Thêm mới thư mục</button></a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Tên Danh Mục</th>
                <th scope="col" class="text-center">Sửa</th>
                <th scope="col" class="text-center">Xóa</th>

            </tr>
        </thead>
        <?php
        $rowPage = 5;
        if (!isset($_GET['page'])) {
            $page = 1;
            $perRow = $page * $rowPage - $rowPage;
            $sql = "SELECT * FROM dmsanpham LIMIT $perRow,$rowPage";
            $query = mysqli_query($conn, $sql);
        } else {
            $page = $_GET['page'];

            $perRow = $page * $rowPage - $rowPage;
            $sql = "SELECT * FROM dmsanpham LIMIT $perRow,$rowPage ";
            $query = mysqli_query($conn, $sql);
        }
        $sql1 = "SELECT * FROM dmsanpham  ";
        $query1 = mysqli_query($conn, $sql1);
        $totalRow = mysqli_num_rows($query1);
        $totalPage = ceil($totalRow / $rowPage);

        $listPage = "";
        for ($i = 1; $i <= $totalPage; $i++) {
            if ($page == $i) {

                $listPage .= '<li class="page-item active" ><a class="page-link"  href="quantri.php?page_layout=danhsachdm&page=' . $i . '">' . $i . '</a></li>';
            } else {
                $listPage .= '<li class="page-item " ><a  class="page-link" href="quantri.php?page_layout=danhsachdm&page=' . $i . '">' . $i . '</a></li>';
            }
        }
        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id_dm'];
            $ten = $row['tendanhmuc'];
        ?>
            <tbody>
                <tr>
                    <td class="text-center align-middle"><?= $id ?></td>
                    <td class="text-center align-middle"><?= $ten ?></td>
                    <td class="text-center align-middle"><a href='quantri.php?page_layout=suadm&id_dm=<?= $id ?>'>Sửa</a></td>
                    <td class="text-center align-middle"> <a href="quantri.php?page_layout=xoadm&id=<?= $id ?>" onclick='return confirm("bạn có muốn xóa thư mục này không!")'>Xóa</a></td>
                </tr>

            </tbody>
            <tr>

            </tr>
        <?php
        }
        ?>

    </table>

    <nav aria-label="Page navigation example" class='mt-3'>
        <ul class="pagination">
            <?php echo  $listPage;
            ?>
        </ul>
    </nav>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>