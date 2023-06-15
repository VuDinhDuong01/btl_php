<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class='px-5'>
        <h2 class='pt-5'>THÊM MỚI DANH MỤC</h2>
        <div class="input-group mb-3 mt-5">

            <form action="" method='post' class='col-12'>
                <input type="text" class="form-control" name='name' placeholder="tên danh mục">
                <button type="submit" name="submit" class="btn btn-primary mt-3 mb-5">THÊM</button>
                <button  type="reset" class="btn btn-primary mt-3 mb-5">LÀM MỚI</button>
            </form>
        </div>


    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    include('ketnoi.php');
    $ten = $_POST['name'];
   
        $sql = "INSERT INTO dmsanpham(tendanhmuc) VALUES ('$ten')";
        $query = mysqli_query($conn, $sql);
        if($query){

           echo" <script>window.location.href = 'quantri.php?page_layout=danhsachdm';</script>";
        }
}
?>