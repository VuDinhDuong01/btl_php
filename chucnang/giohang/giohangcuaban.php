<link rel="stylesheet" type="text/css" href="css/giohangcuatoi.css" />
<div id="id">
	<p>Bạn đang có <span>
			<?php
			if (isset($_SESSION['giohang'])) {
				echo count($_SESSION['giohang']);
			} else {
				echo 0;
			}
			?>
		</span> sản phẩm</p> 
	<p><a href="index.php?page_layout=giohang"><button type="button" class="btn btn-primary">Chi tiết giỏ hàng</button></a></p>
</div>