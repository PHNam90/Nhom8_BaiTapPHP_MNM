-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2021 lúc 09:51 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mmn_project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Nguyễn Văn A', 'nva@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Phạm Hoài Nam', 'phnam0306@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaSP` int(11) NOT NULL,
  `MaDH` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaSP`, `MaDH`, `DonGia`, `SoLuong`) VALUES
(11, 3, 568000, 2),
(13, 3, 1555000, 1),
(17, 3, 340000, 1),
(29, 2, 36000, 2),
(30, 2, 16530000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `DMCha` int(11) NOT NULL,
  `TenDM` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `DMCha`, `TenDM`) VALUES
(1, 0, 'Đồ nam'),
(2, 0, 'Đồ nữ'),
(3, 0, 'Phụ Kiện '),
(4, 3, 'Đồng hồ'),
(5, 3, 'Thắt lưng'),
(6, 1, 'Áo thể thao'),
(7, 1, 'Quần Jeans'),
(8, 2, 'Váy'),
(9, 1, 'Áo Nike');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `GhiChu` varchar(500) NOT NULL,
  `NgayTao` date NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaKH`, `GhiChu`, `NgayTao`, `TrangThai`) VALUES
(2, 1, 'Giao hàng giờ hành chính', '2021-08-01', 0),
(3, 2, 'Giao tận nhà', '2021-08-01', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `SDT` varchar(15) NOT NULL,
  `MatKhau` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Email`, `DiaChi`, `SDT`, `MatKhau`) VALUES
(1, 'Phạm Hoài Nam', 'phn@gmail.com', 'Duy Tiên - Hà Nam', '09846546232', '202cb962ac59075b964b07152d234b70'),
(2, 'Nguyễn Văn A', 'nva@gmail.com', 'Hà Nội', '03565462795', '202cb962ac59075b964b07152d234b70'),
(3, 'Nguyễn Văn B', 'nvb@gmail.com', 'Thanh Hóa', '09898465465', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(500) NOT NULL,
  `MoTa` varchar(5000) NOT NULL,
  `Anh` varchar(500) NOT NULL,
  `Gia` double NOT NULL,
  `GiamGia` int(11) NOT NULL,
  `MaDM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MoTa`, `Anh`, `Gia`, `GiamGia`, `MaDM`) VALUES
(3, 'ÁO THỂ THAO SỌC NGANG', '', '1627677177_1618594031_832968_497_thumb_300x300.png', 600000, 12, 6),
(4, 'ÁO THỂ THAO ĐEN', '', '1627677220_1618594200_876131_010_thumb_300x300.jpg', 550000, 13, 9),
(5, 'ĐỒNG HỒ DANIEL WELLINGTON', '', '1627677260_1612983924_d4_600x600.jpg', 1350000, 21, 4),
(6, 'ĐỒNG HỒ NỮ CLUSE DÂY DA', '', '1627677290_1612984039_d6_600x600.jpg', 120000, 5, 4),
(7, 'THẮT LƯNG CAO CẤP MẶT CHỮ D', '', '1627677323_1618587200_t1_600x600.jpg', 654000, 3, 5),
(8, 'THẮT LƯNG BÒ CAO CẤP', '', '1627677364_1618587364_t4_600x600.jpg', 153000, 23, 5),
(9, 'JEAN NAM MÀI XANH SÁNG', '', '1627677397_1612983715_2732017_174911_400x400.jpg', 365000, 6, 7),
(10, 'JEAN NAM XANH ĐEN', '', '1627677431_1612983831_Quan_Jeans_Nam_Lph_____Be14_430x430.jpg', 365000, 23, 7),
(11, 'JEAN NAM ĐEN THÊU CHỮ', '', '1627677470_1618594551_2732017_10288_400x400.jpg', 568000, 12, 7),
(12, 'VÁY LIỀN DÁNG SƠ MI', '', '1627677514_1618592691_2039_chan_vay_denim_co_day_rut_1_thumb_300x300.jpg', 1560000, 15, 8),
(13, 'VÁY XANH RÊU TRẺ TRUNG', '', '1627677539_1618592891_881807bed68_2_600x600.jpg', 1555000, 32, 8),
(14, 'VÁY NGẮN CHẤM BI NỮ TÍNH', '', '1627742270_1618592847_km3lqy_600x600.jpg', 500000, 12, 8),
(15, 'JEAN NAM RÁCH GỐI CÁ TÍNH', '', '1627758885_1612983715_2732017_174911_400x400.jpg', 352000, 5, 7),
(16, 'JEAN NAM ĐEN TRƠN', '', '1627758915_1612984382_Quan_Jeans_Nam_Lph_____Be14_430x430.jpg', 600000, 5, 7),
(17, 'JEAN NAM XANH THÊU', '', '1627758964_1612983399_2732017_17509_400x400.jpg', 340000, 12, 7),
(18, 'ÁO THỂ THAO XANH NGẮN TAY', '', '1627759033_1618594001_830850_411_thumb_300x300.jpg', 550000, 23, 6),
(19, 'ÁO NIKE THỂ THAO BA LỖ', '', '1627759071_1618594172_718835_451_thumb_300x300.png', 1350000, 10, 6),
(20, 'ÁO NIKE THỂ THAO ĐEN', '', '1627759119_1618594057_856881_497_thumb_300x300.png', 155000, 50, 9),
(21, 'ÁO NIKE THỂ THAO CÓ CỔ', '', '1627759148_1618594200_876131_010_thumb_300x300.jpg', 350000, 7, 9),
(22, 'ÁO KHOÁC NIKE THỂ THAO T09', '', '1627759243_1618594236_832968_497_thumb_300x300.png', 600000, 12, 9),
(23, 'VÁY XANH RÊU TRẺ TRUNG', '', '1627759318_1618592724_1dce2b12ffc1e31b5f979342b2568cf8_600x600.jpg', 550000, 32, 8),
(24, 'VÁY TUTU DÀI ( 3 MÀU)', '', '1627759351_1618593012_zsrc043_xr_thumb_600x600_600x600.jpg', 985000, 21, 8),
(25, 'CHÂN VÁY CARO DÀI', '', '1627759385_1618592920_1507809542163_600x600.jpg', 563000, 11, 8),
(26, 'THẮT LƯNG NÂU DA CAO CẤP', '', '1627759438_1618587487_t10_600x600.jpg', 375000, 14, 5),
(27, 'THẮT LƯNG DA BÒ CAO CẤP', '', '1627759463_1618587450_t5_600x600.jpg', 350000, 15, 5),
(28, 'THẮT LƯNG ĐEN CAO CẤP', '', '1627759495_1618587306_t8_600x600.jpg', 120000, 3, 5),
(29, 'THẮT LƯNG ĐEN DA CHỮ H', '', '1627759837_1618587569_t2_600x600.jpg', 36000, 17, 5),
(30, 'ĐỒNG HỒ THÔNG MINH SMARTWATCH', '', '1627759877_1612983966_d7_600x600.jpg', 16530000, 20, 4),
(31, 'ĐỒNG HỒ DANIEL WELLINGTON', '', '1627759909_1612984120_d9_600x600.jpg', 856000, 10, 4),
(32, 'ĐỒNG HỒ GỖ KIỂU KHÔNG SỐ', '', '1627759948_1612984250_d8_600x600.jpg', 1550000, 32, 4),
(33, 'ĐỒNG HỒ NỮ CLUSE DÂY DA', '', '1627759988_1612983891_d3_600x600.jpg', 1250000, 5, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaSP`,`MaDH`),
  ADD KEY `MaDHF` (`MaDH`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaDMF` (`MaDM`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `MaDHF` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `MaSPFF` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `MaDMF` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
