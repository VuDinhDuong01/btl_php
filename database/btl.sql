-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2023 lúc 08:33 AM
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
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `sodienthoai` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_sp`, `comment`, `ten`, `sodienthoai`, `date`, `email`) VALUES
(5, 18, 'sản phẩm quá chất lượng', 'vũ đình dương', '4343434', '2023-06-16', 'long@gmail.com'),
(6, 23, 'sản phẩm đep', 'vũ đình dương', '4343434', '2023-06-16', 'long@gmail.com'),
(10, 25, 'sản phẩm đẹp', 'vũ đình dương', '4343434', '2023-06-16', 'long@gmail.com'),
(11, 25, 'sản phẩm đẹp', 'vũ đình dương', '4343434', '2023-06-16', 'long@gmail.com'),
(12, 25, 'sản phẩm đẹp', 'vũ đình dương', '4343434', '2023-06-16', 'long@gmail.com'),
(13, 8, 'dfdf', 'vũ đình dương', '4343434', '2023-06-16', 'long@gmail.com');

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
(44, 'Apple'),
(45, 'Asus'),
(46, 'Acer'),
(47, 'Samsung'),
(48, 'Toshiba'),
(49, 'Sony');

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
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `telephone`, `total`, `date`) VALUES
(31, 'dfdf', 'bắc giang', '64645', 21799000, '2023-06-16');

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
(22, 31, 8, 9799000, 1, '2023-06-16 13:32:47'),
(23, 31, 25, 12000000, 1, '2023-06-16 13:32:47');

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
(8, 45, 'Asus Vivobook X415EA i3 1115G4 (EK2034W)', 'anh/anh5.jpg', 9799000, 'Nếu bạn đang tìm kiếm một chiếc laptop học tập - văn phòng sở hữu cấu hình tốt và có thiết kế đơn giản nhưng sang trọng, laptop Asus Vivobook X415EA i3 (EK2034W) chính là sự lựa chọn hoàn hảo dành cho bạn'),
(18, 44, 'dell', 'anh/Screenshot (411).png', 1000, 'dfdfdf'),
(22, 44, 'Dell Inspiron', 'anh/anh1.jpg', 12000000, 'ảnh đẹp thế'),
(23, 44, 'Dell Inspiron', 'anh/anh10.jpg', 12000000, 'êrerere'),
(24, 44, 'Dell Inspiron', 'anh/anh13.jpg', 12000000, 'rêrer'),
(25, 45, 'Dell Inspiron', 'anh/anh11.jpg', 12000000, '3drererer'),
(26, 47, 'Dell Inspiron', 'anh/anh12.jpg', 12000000, 'êrere'),
(27, 45, 'Dell Inspiron', 'anh/anh8.jpg', 12000000, 'rêre');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `quyentruycap` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `email`, `passWord`, `quyentruycap`) VALUES
(1, 'duong@gmail.com', '1234567', 1),
(2, 'long@gmail.com', '1234567', 0),
(3, 'lan@gmail.com', '1234567', 0),
(4, 'vuong@gmail.com', '1234567', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanhvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id_sp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `dmsanpham` (`id_dm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
