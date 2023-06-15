<?php
include('ketnoi.php');
$id_sp = $_GET['id_sp'];
$sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
$query = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($query);

$ten=$row['ten_sp'];
$gia_sp=$row['gia_sp'];
$chi_tiet_sp=$row['chi_tiet_sp'];
$id=$row['id_dm'];
$image=$row['anh_sp'];

if (isset($_POST['submit'])) {
    // Tên Sản phẩm
    if ($_POST['ten_sp'] == '') {
        $error_ten_sp = '<span style="color:red;">(*)<span>';
    } else {
        $ten_sp = $_POST['ten_sp'];
    }
    // Giá Sản phẩm
    if ($_POST['gia_sp'] == '') {
        $error_gia_sp = '<span style="color:red;">(*)<span>';
    } else {
        $gia_sp = $_POST['gia_sp'];
    }

    if ($_POST['chi_tiet_sp'] == '') {
        $error_chi_tiet_sp = '<span style="color:red;">(*)<span>';
    } else {
        $chi_tiet_sp = $_POST['chi_tiet_sp'];
    }
    // Ảnh mô tả Sản phẩm
    if ($_FILES['anh_sp']['name'] == '') {
        $anh_sp = $_POST['anh_sp'];
    } else {
        $anh_sp = $_FILES['anh_sp']['name'];
        $tmp = $_FILES['anh_sp']['tmp_name'];
    }
    // Danh mục Sản phẩm
    // $id_dm = $_POST['id_dm'];
    
    // Xử lý Sửa Thông tin Sản phẩm
   
    if (isset($_POST['id_md'])) {
        $id = $_POST['id_md'];
    }
    $ten_sp = $_POST['ten_sp'];
    $gia_sp = $_POST['gia_sp'];
    $chi_tiet_sp = $_POST['chi_tiet_sp'];
    $target = 'anh/';
    if (!file_exists($target)) {
        mkdir($target, 0777, true);
    }
    $file = $target . basename($_FILES['anh_sp']['name']);
    move_uploaded_file($_FILES['anh_sp']['tmp_name'], $file);
    $sql = "UPDATE sanpham SET  id_dm='$id' ,ten_sp='$ten_sp',anh_sp='$file',gia_sp='$gia_sp',chi_tiet_sp='$chi_tiet_sp' where id_sp=$id_sp";
    $query = mysqli_query($conn, $sql);
    echo " <script>window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
      
    
}
?>

 <link rel="stylesheet" type="text/css" href="css/themsp.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class='mx-5 '>
    <h2>Sửa sản phẩm</h2>
    <form method="post" enctype="multipart/form-data" class="">
        <div class='mb-4'>
            <label for="basic-url">Nhập Tên Sản Phẩm</label>
            <div class="input-group mb-3">

                <input type="text" name='ten_sp' class="form-control" id="basic-url" aria-describedby="basic-addon3" value='<?= $ten ?>'>
            </div>
        </div>
        <div class='mb-4'>
            <label for="basic-url">Nhập Gía Sản Phẩm</label>
            <div class="input-group mb-3">

                <input type="text" name='gia_sp' class="form-control" id="basic-url" aria-describedby="basic-addon3" value='<?= $gia_sp ?>' >
            </div>
        </div>
        <div class='mb-4'>
            <label for="basic-url">Nhập file ảnh</label>
            <div class="input-group mb-3">
                <input type="file" name='anh_sp' />
                <img src="<?= $image ?>" alt="" width="150" height="150" />
            </div>
        </div>
        <div class='mb-4'>
            <label for="basic-url">Chi tiết sản phẩm</label>
            <textarea class="form-control" name='chi_tiet_sp' aria-label="With textarea" ><?= $chi_tiet_sp ?></textarea>
        </div>
        <div class='mb-4'>
            <label for="basic-url">Hãng sản xuất</label>
            <select name="id_md">
                <?php
                $sql = "SELECT * FROM dmsanpham";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id_dm'];
                    $ten = $row['tendanhmuc'];
                ?>
                    <option value="<?= $id ?>"><?= $ten ?></option>

                <?php
                }
                ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-4">Sửa</button>
        <button type="reset" class="btn btn-primary mb-4">Làm Mới</button>
    </form>
</div>

