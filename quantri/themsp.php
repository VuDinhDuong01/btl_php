<link rel="stylesheet" type="text/css" href="css/themsp.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class='mx-5 '>
    <h2>thêm mới sản phẩm</h2>
    <form method="post" enctype="multipart/form-data" class="">
        <div class='mb-4'>
            <label for="basic-url">Nhập Tên Sản Phẩm</label>
            <div class="input-group mb-3">

                <input type="text" required name='ten_sp' class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class='mb-4'>
            <label for="basic-url">Nhập Gía Sản Phẩm</label>
            <div class="input-group mb-3">

                <input type="text" required name='gia_sp' class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class='mb-4'>
            <label for="basic-url">Nhập file ảnh</label>
            <div class="input-group mb-3">
                <input type="file" required  name='anh_sp' class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class='mb-4'>
            <label for="basic-url">Chi tiết sản phẩm</label>
            <textarea class="form-control" required name='chi_tiet_sp' aria-label="With textarea"></textarea>
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
        <button type="submit" name="submit" class="btn btn-primary mb-4">Thêm</button>
        <button type="reset" class="btn btn-primary mb-4">Làm Mới</button>
    </form>
</div>

<?php
include_once('ketnoi.php');
$error = NULL;
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

    // Chi tiết Sản phẩm
    if ($_POST['chi_tiet_sp'] == '') {
        $error_chi_tiet_sp = '<span style="color:red;">(*)<span>';
    } else {
        $chi_tiet_sp = $_POST['chi_tiet_sp'];
    }
    // Ảnh mô tả Sản phẩm
    if ($_FILES['anh_sp']['name'] == '') {
        $error_anh_sp = '<span style="color:red;">(*)<span>';
    } else {
        $anh_sp = $_FILES['anh_sp']['name'];
        $tmp = $_FILES['anh_sp']['tmp_name'];
    }
    if (isset($_POST['id_md'])) {
        $id = $_POST['id_md'];
    }
    $ten_sp = $_POST['ten_sp'];
    $gia_sp = $_POST['gia_sp'];
    $chi_tiet_sp = $_POST['chi_tiet_sp'];
    // $image=$_POST['anh_sp'];
    $target = 'anh/';
    if (!file_exists($target)) {
        mkdir($target, 0777, true);
    }
    $file = $target . basename($_FILES['anh_sp']['name']);
    move_uploaded_file($_FILES['anh_sp']['tmp_name'], $file);
    $sql = "INSERT INTO sanpham (id_dm,ten_sp,anh_sp,gia_sp,chi_tiet_sp) VALUES ('$id','$ten_sp','$file','$gia_sp','$chi_tiet_sp')";
    $query = mysqli_query($conn, $sql);
    echo " <script>window.location.href = 'quantri.php?page_layout=danhsachsp';</script>";
}
?>