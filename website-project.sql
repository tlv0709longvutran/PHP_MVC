-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 20, 2022 lúc 04:54 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website-project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(9, 'Vũ Thùy Linh', 'linhxuka@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Trần Long Vũ', 'longvu@gmail.com', 'b6a262ca904b6d3b991882edac826b90');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categori`
--

CREATE TABLE `categori` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descript` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categori`
--

INSERT INTO `categori` (`id`, `name`, `descript`, `image_name`, `active`) VALUES
(10, 'Pizza', 'Thơm Ngậy Mùi Phô Mai', 'menu-pizza.jpg', 'Yes'),
(11, 'SandWich', 'Hương Mật Ong', 'menu-pizza.jpg', 'Yes'),
(12, 'Mo Mo', 'Cay Cay', 'momo.jpg', 'Yes'),
(14, 'Hamburger', 'Mới Ra Lo ', 'burger.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descript` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `image_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `active` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cateId` int(11) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `name`, `descript`, `price`, `image_name`, `active`, `cateId`, `sale`) VALUES
(11, 'Pizza', 'Ngon từ Thịt', 500, 'menu-momo.jpg', '1', 12, 52),
(15, 'Kim Chi ', 'Ngot Canh Xuong Ong', 600, 'menu-pizza.jpg', 'Yes', 14, 20),
(16, 'Sanwich CoBe', 'Thơm Ngậy Mùi Bơ', 600, 'menu-pizza.jpg', '0', 14, 20),
(17, 'Pizza Ý ', 'Vị Mật Ong Rừng', 400, 'menu-burger.jpg', 'Yes', 10, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telephone` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `auth` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ordered`
--

INSERT INTO `ordered` (`id`, `userId`, `address`, `telephone`, `date`, `price`, `auth`) VALUES
(1, 4, 'Cấp Tiến - Tiên Lãng', 982179102, '2022-06-06 21:03:35', 500, 1),
(3, 4, 'Tiên Lãng - Hải Phòng', 982179102, '2022-06-14 23:48:15', 5000, 0),
(4, 4, 'Tiên Lãng - Hải Phòng', 982179102, '2022-06-14 23:49:06', 1000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordereddetail`
--

CREATE TABLE `ordereddetail` (
  `id` int(11) NOT NULL,
  `orderedId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ordereddetail`
--

INSERT INTO `ordereddetail` (`id`, `orderedId`, `foodId`, `price`, `piece`) VALUES
(2, 1, 11, 500, 5),
(3, 1, 11, 300, 5),
(4, 3, 15, 500, 5),
(5, 3, 11, 500, 5),
(6, 4, 15, 500, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `telephone`) VALUES
(4, 'Trần Long Vũ', 'longvu@gmail.com', '123456', 'Tiên Lãng - Hải Phòng', 982179102);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categori` (`cateId`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`userId`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`orderId`),
  ADD KEY `fk_food` (`foodId`);

--
-- Chỉ mục cho bảng `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`userId`);

--
-- Chỉ mục cho bảng `ordereddetail`
--
ALTER TABLE `ordereddetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_food` (`foodId`),
  ADD KEY `fk_ordered` (`orderedId`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `categori`
--
ALTER TABLE `categori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ordereddetail`
--
ALTER TABLE `ordereddetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categori` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`foodId`) REFERENCES `food` (`id`);

--
-- Các ràng buộc cho bảng `ordered`
--
ALTER TABLE `ordered`
  ADD CONSTRAINT `ordered_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `ordereddetail`
--
ALTER TABLE `ordereddetail`
  ADD CONSTRAINT `ordereddetail_ibfk_1` FOREIGN KEY (`orderedId`) REFERENCES `ordered` (`id`),
  ADD CONSTRAINT `ordereddetail_ibfk_2` FOREIGN KEY (`foodId`) REFERENCES `food` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
