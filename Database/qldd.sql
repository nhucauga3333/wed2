-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2020 lúc 07:02 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `FirstName` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `LastName` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Account` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`FirstName`, `LastName`, `Account`, `Password`) VALUES
('Hung', 'Chi', 'chihung123', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `ID` int(11) NOT NULL,
  `IDHoaDon` int(11) DEFAULT NULL,
  `TenSP` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` int(11) NOT NULL,
  `SoHD` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `NgLap` datetime DEFAULT NULL,
  `TenKH` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `SdtKH` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `DiaChiGiaoHang` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `TrangThai` varchar(2000) CHARACTER SET utf8 DEFAULT NULL,
  `TongTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `ID` int(11) NOT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `TenLoai` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ImgPath` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`ID`, `MaLoai`, `TenLoai`, `ImgPath`) VALUES
(1, 1, 'IPHONE', 'image/iPhone-(Apple)42-b_16.jpg'),
(2, 2, 'SAMSUNG', 'image/Samsung42-b_25.jpg'),
(3, 3, 'OPPO', 'image/OPPO42-b_57.jpg'),
(4, 4, 'XIAOMI', 'image/Xiaomi42-b_31.png'),
(5, 5, 'VIVO', 'image/Vivo42-b_50.jpg'),
(6, 6, 'HUAWEI', 'image/Huawei42-b_30.jpg'),
(7, 7, 'REALME', 'image/Realme42-b_37.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `MaSP` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `TenSP` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `ImgPath` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ManHinh` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `HDH` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CameraSau` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CameraTruoc` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CPU` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Ram` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `Rom` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `DungLuongPin` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `SanPhamBanChay` bit(1) DEFAULT NULL,
  `SanPhamMoiNhat` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID`, `MaSP`, `MaLoai`, `TenSP`, `Gia`, `ImgPath`, `ManHinh`, `HDH`, `CameraSau`, `CameraTruoc`, `CPU`, `Ram`, `Rom`, `DungLuongPin`, `SanPhamBanChay`, `SanPhamMoiNhat`) VALUES
(1, '001', 1, 'iPhone 11 Pro Max 512GB', 40490000, 'image/12062020181948iphone-11-pro-max-512g.jpg', '6.5\", Super Retina XDR', 'iOS 13', '12MP', '12MP', ' Apple A13 Bionic 6 nhân', '4GB', '512GB', '3969 mAh, có sạc nhanh', b'1', b'1'),
(2, '002', 2, 'Samsung Galaxy S20+', 16990000, 'image/12062020184307samsung-galaxy-s20-plus-400x460-fix-400x460.png', 'Dynamic AMOLED 2X, 6.7\", Quad HD+ (2K+)', 'Android 10', 'Chính 12 MP & Phụ 64 MP, 12 MP, TOF 3D', '10 MP', 'Exynos 990 8 nhân', '8 GB', '128 GB', '4500 mAh, có sạc nhanh', b'1', b'1'),
(3, '003', 3, 'Oppo A52', 5690000, 'image/12062020184725A52_White-482x580.png', 'TFT LCD, 6.5\", Full HD+', 'Android 10', 'Chính 12 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Snapdragon 665 8 nhân', '6 GB', '128 GB', '5000 mAh, có sạc nhanh', b'1', b'1'),
(4, '004', 4, 'Xiaomi Mi Note 10 Pro', 13990000, 'image/12062020184921xiaomi-mi-note-10-pro-black-400x460.png', 'AMOLED, 6.47\", Full HD+', 'Android 9.0 (Pie)', 'Chính 108 MP & Phụ 20 MP, 12 MP, 5 MP, 2 MP', '32 MP', 'Snapdragon 730G 8 nhân', '8 GB', '256 GB', '5260 mAh, có sạc nhanh', b'1', b'1'),
(5, '005', 5, 'Vivo V19', 8590000, 'image/12062020185120vivo-v19-xanh-400x460-400x460.png', 'Super AMOLED, 6.44\", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'Chính 32 MP & Phụ 8 MP', 'Snapdragon 712 8 nhân', '8 GB', '128 GB', '4500 mAh, có sạc nhanh', b'1', b'1'),
(6, '006', 7, 'Realme 6 Pro', 7990000, 'image/12062020185315realme-6-pro-do-400x460-3-400x460.png', 'IPS LCD, 6.6\", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', 'Chính 16 MP & Phụ 8 MP', 'Snapdragon 720G 8 nhân', '8 GB', '128 GB', '4300 mAh, có sạc nhanh', b'1', b'1'),
(7, '006', 6, 'Huawei P40 Pro (Không có Google)', 21990000, 'image/12062020185647huawei-p40-pro-400x460-3-400x460.png', 'OLED, 6.58\", Quad HD+ (2K+)', 'EMUI 10 (Android 10 không có Google)', 'Chính 50 MP & Phụ 40 MP,12 MP, TOF 3D', 'Chính 32 MP & Phụ IR TOF 3D', 'Kirin 990 8 nhân', '8 GB', '256 GB', '4200 mAh, có sạc nhanh', b'1', b'1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
