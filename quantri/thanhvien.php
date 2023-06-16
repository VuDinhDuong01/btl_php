<?php
include_once('ketnoi.php');
?>
<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class='px-4 py-2'>
    <h2 class='py-3'>Quản lý thành viên</h2>
    <p id="add-prd"><a href="quantri.php?page_layout=themthanhvien"><button type="button" class="btn btn-primary">Thêm mới Thành Viên</button></a></p>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Họ Tên</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Password</th>
                <th scope="col" class="text-center">Quyền</th>
                
                <th scope="col" class="text-center">Xóa</th>
            </tr>
        </thead>
        <?php
 $rowPage = 5;
 if (!isset($_GET['page'])) {
     $page = 1;
     $perRow = $page * $rowPage - $rowPage;
     $sql = "SELECT * FROM thanhvien LIMIT $perRow,$rowPage ";
     $query = mysqli_query($conn, $sql);
 } else {
     $page = $_GET['page'];

     $perRow = $page * $rowPage - $rowPage;
     $sql = "SELECT * FROM thanhvien LIMIT $perRow,$rowPage ";
     $query = mysqli_query($conn, $sql);
 }
 $sql1 = "SELECT * FROM thanhvien  ";
 $query1 = mysqli_query($conn, $sql1);
 $totalRow = mysqli_num_rows($query1);
 $totalPage = ceil($totalRow / $rowPage);

 $listPage = "";
 for ($i = 1; $i <= $totalPage; $i++) {
     if ($page == $i) {

         $listPage .= '<li class="page-item active" ><a class="page-link"  href="quantri.php?page_layout=thanhvien&page=' . $i . '">' . $i . '</a></li>';
     } else {
         $listPage .= '<li class="page-item " ><a  class="page-link" href="quantri.php?page_layout=thanhvien&page=' . $i . '">' . $i . '</a></li>';
     }
 }
        while ($row = mysqli_fetch_array($query)) {
            if($row['quyentruycap'] ==0){
                ?>
                <tbody>
                    <tr>
                        <td class="text-center align-middle"><span><?php echo $row['id_thanhvien']; ?></span></td>
                        <td class="text-center align-middle"><a href="#" style="text-decoration: none;color:#000"><?php echo $row['name']; ?></a></td>
                        <td class="text-center align-middle"><span class="price"><?php echo $row['email'] ?></span></td>
                        <td class="text-center align-middle"><span class="thumb"><?php echo $row['passWord']; ?></span></td>
                         <?php
                         if($row['quyentruycap']==1){
                            ?>
                            <td class="text-center align-middle"><span class="thumb">Admin</span></td>
                             <?php
                         }else{
                            ?>
                            <td class="text-center align-middle"><span class="thumb">Khách hàng</span></td>
                             <?php
                         }
                          ?>
                       
                        <td class="text-center align-middle"><a href="quantri.php?page_layout=xoathanhvien&thanhvien=<?php echo  $row['id_thanhvien']; ?>" onclick='return confirm("Bạn có muốn xóa khách hàng này không!")'><span><button type="button" class="btn btn-danger">Xóa</button></span></a></td>
                    </tr>
                </tbody>
            <?php
            }
       
        }
        ?>
    </table>

 
 
  <nav aria-label="Page navigation example">
  <ul class="pagination">
  <?php echo  $listPage;?>
  </ul>
</nav>

</div>

 