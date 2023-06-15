<?php
include_once('ketnoi.php');
?>
<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class='px-4'>
    <h2>quản lý sản phẩm</h2>
    <p id="add-prd"><a href="quantri.php?page_layout=themsp"><button type="button" class="btn btn-primary">Thêm mới Sản phẩm</button></a></p>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Tên Sản Phẩm</th>
                <th scope="col" class="text-center">Gía</th>
                <th scope="col" class="text-center">Ảnh Mô Tả</th>
                <th scope="col" class="text-center">Sửa</th>
                <th scope="col" class="text-center">Xóa</th>
            </tr>
        </thead>
        <?php
 $rowPage = 5;
 if (!isset($_GET['page'])) {
     $page = 1;
     $perRow = $page * $rowPage - $rowPage;
     $sql = "SELECT * FROM sanpham LIMIT $perRow,$rowPage ";
     $query = mysqli_query($conn, $sql);
 } else {
     $page = $_GET['page'];

     $perRow = $page * $rowPage - $rowPage;
     $sql = "SELECT * FROM sanpham LIMIT $perRow,$rowPage ";
     $query = mysqli_query($conn, $sql);
 }
 $sql1 = "SELECT * FROM sanpham  ";
 $query1 = mysqli_query($conn, $sql1);
 $totalRow = mysqli_num_rows($query1);
 $totalPage = ceil($totalRow / $rowPage);

 $listPage = "";
 for ($i = 1; $i <= $totalPage; $i++) {
     if ($page == $i) {

         $listPage .= '<li class="page-item active" ><a class="page-link"  href="quantri.php?page_layout=danhsachsp&page=' . $i . '">' . $i . '</a></li>';
     } else {
         $listPage .= '<li class="page-item " ><a  class="page-link" href="quantri.php?page_layout=danhsachsp&page=' . $i . '">' . $i . '</a></li>';
     }
 }
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tbody>
                <tr>
                    <td class="text-center align-middle"><span><?php echo $row['id_sp']; ?></span></td>
                    <td class="text-center align-middle"><a href="#"><?php echo $row['ten_sp']; ?></a></td>
                    <td class="text-center align-middle"><span class="price"><?php echo $row['gia_sp']; ?></span></td>
                    <td class="text-center align-middle"><span class="thumb"><img width="60" src="<?php echo $row['anh_sp']; ?>" /></span></td>
                    <td class="text-center align-middle"><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><span>Sửa</span></a></td>
                    <td class="text-center align-middle"><a href="quantri.php?page_layout=xoasp&id_sp=<?php echo  $row['id_sp']; ?>" onclick='return confirm("bạn có muốn xóa sản phẩm này không!")'><span>Xóa</span></a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>

 
 
  <nav aria-label="Page navigation example">
  <ul class="pagination">
  <?php echo  $listPage;?>
  </ul>
</nav>

</div>

 