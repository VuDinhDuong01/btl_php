-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2023 lúc 04:46 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quanlity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_product`, `quanlity`) VALUES
(32, 7, 26, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sodienthoai` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_sp`, `comment`, `ten`, `sodienthoai`, `date`, `email`, `id_user_comment`) VALUES
(18, 23, 'êre', 'vũ đình dương', '4343434', '2023-06-17', 'lananh@gmail.com', 21),
(21, 23, 'hello', 'ngọc dương', '0270393874893', '2023-06-17', 'lananh@gmail.com', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(11) NOT NULL,
  `tendanhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `tendanhmuc`) VALUES
(44, 'Apple2'),
(45, 'Asus'),
(47, 'Samsung'),
(48, 'Toshiba'),
(52, 'Apple'),
(53, 'Sony 01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_user_orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `telephone`, `total`, `date`, `id_user_orders`) VALUES
(40, 'vũ đình dương', 'nam định', '64645', 12000000, '2023-06-17', 9),
(41, 'vũ đình dương', 'NAM ĐỊNH-Việt Nam', '64645', 24000000, '2023-06-17', 9),
(43, 'vũ đình dương', 'NAM ĐỊNH-Việt Nam', '0378554917', 12000000, '2023-06-17', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quanlity` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `price`, `quanlity`, `date`) VALUES
(34, 40, 22, 12000000, 1, '2023-06-17 20:53:11'),
(35, 41, 25, 12000000, 1, '2023-06-17 21:01:35'),
(36, 41, 29, 12000000, 1, '2023-06-17 21:01:35'),
(38, 43, 23, 12000000, 1, '2023-06-17 21:33:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `gia_sp` int(11) NOT NULL,
  `chi_tiet_sp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `chi_tiet_sp`) VALUES
(8, 47, 'Asus Vivobook X415EA ', 'anh/anh3.jpg', 9799000, 'Nếu bạn đang tìm kiếm một chiếc laptop học tập - văn phòng sở hữu cấu hình tốt và có thiết kế đơn giản nhưng sang trọng, laptop Asus Vivobook X415EA i3 (EK2034W) chính là sự '),
(22, 44, 'Dell Inspiron', 'anh/anh1.jpg', 12000000, 'ảnh đẹp thế'),
(23, 44, 'Dell Inspiron', 'anh/anh10.jpg', 12000000, 'êrerere'),
(24, 44, 'Dell Inspiron', 'anh/anh13.jpg', 12000000, 'rêrer'),
(25, 45, 'Dell Inspiron', 'anh/anh11.jpg', 12000000, '3drererer'),
(26, 47, 'Dell Inspiron', 'anh/anh12.jpg', 12000000, 'êrere'),
(27, 45, 'Dell Inspiron', 'anh/anh8.jpg', 12000000, 'rêre'),
(32, 45, 'dfdf', 'anh/anh11.jpg', 12000000, 'sản phẩm chất lượng'),
(33, 47, 'HP 15s fq5147TU i7 1255U', 'anh/anh15.jpg', 18390, 'Laptop HP 15s fq5147TU i7 1255U (7C133PA) được trang bị bộ vi xử lý Intel Core i7 thế hệ 12 cùng những tính năng hấp dẫn khác, giúp người dùng có thể thực hiện các công việc hàng ngày một cách dễ dàng, hiệu quả'),
(34, 44, 'Acer Aspire 3 A315 59', 'anh/anh16.jpg', 9990, 'Laptop Lenovo Ideapad 3 15ITL6 i5 (82H803CVVN) là lựa chọn hoàn hảo cho những bạn cần một chiếc laptop học tập - văn phòng đáp ứng nhiều nhu cầu khác nhau từ công việc cho đến giải trí'),
(35, 45, 'Acer Aspire 3 A315 58 589K i5 1135G7', 'anh/anh17.jpg', 11490, 'Acer Aspire 3 A315 58 589K i5 1135G7 cực đẹp'),
(36, 48, 'Asus Vivobook 15 OLED A1505VA i5 13500', 'anh/anh18.jpg', 17490, 'Asus Vivobook 15 OLED A1505VA i5 13500 cực đẹp'),
(37, 53, 'MSI Modern 14 C11M i3 1115G4 ', 'anh/anh21.jpg', 10990, 'MSI Modern 14 C11M i3 1115G4  cực đẹp'),
(38, 52, 'Asus Vivobook 14 X1402ZA i5 1240P (EK083W', 'anh/anh23.jpg', 14990, 'Asus Vivobook 14 X1402ZA i5 1240P (EK083W) cực đẹp'),
(39, 48, 'Acer Nitro 5 Gaming AN515 57 553E i5 11400H', 'anh/anh22.jpg', 19990, 'Acer Nitro 5 Gaming AN515 57 553E i5 11400H cực phẩm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `quyentruycap` int(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `email`, `passWord`, `quyentruycap`, `name`) VALUES
(6, 'longmatuy@gmail.com', '$2y$10$5mQxBMAuOiBYeeb/u77YB.GjxQcPhqEzAxLHikkXfgRZjIa2RUCLe', 0, 'long ma túy'),
(7, 'ha@gmail.com', '$2y$10$Gem1JWsATBTWzVSs46pIzuL8xJH5CH5To3UkkPl7EeG3wVzwLqI5q', 0, 'hà phạm'),
(8, 'nga9999@gmail.com', '$2y$10$Y3yPGdZ97yvhHyKD2I9gwOuXpUiHGbtQN.UK.a5u.6nxDDppEmUCO', 0, 'chung nguyen'),
(9, 'thu@gmail.com', '$2y$10$1Yl8.xjgYZroSVxICf1flOpfDT2RWiho0eFRaJ0R7KsCtNPZAZUdG', 0, 'hello'),
(10, 'tammao@gmail.com', '$2y$10$Uh6Om.RFfpsClI7/NqPfOeGSGQumFIXiLBoYnUZgP76iZjE71RUoO', 0, 'tammao'),
(20, 'duong@gmail.com', '1234567', 1, 'ngọc dương'),
(21, 'lananh@gmail.com', '$2y$10$HPauv1r8YVGMaWP70Auv1.EGxJo7u7OaqV1G3Vrx6XI1hvHynv5Ji', 0, 'Lan anh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user_comment` (`id_user_comment`);

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_orders` (`id_user_orders`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `sanpham_ibfk_1` (`id_dm`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_thanhvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanhvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `thanhvien` (`id_thanhvien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user_comment`) REFERENCES `thanhvien` (`id_thanhvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user_orders`) REFERENCES `thanhvien` (`id_thanhvien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `dmsanpham` (`id_dm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
