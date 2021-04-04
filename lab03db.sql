-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 05:36 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab03db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aId` int(11) NOT NULL,
  `aName` varchar(50) DEFAULT NULL,
  `aEmail` varchar(50) DEFAULT NULL,
  `aPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aId`, `aName`, `aEmail`, `aPassword`) VALUES
(1, 'Trần Quốc Huy', 'kenbi.njr@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `cMa` int(11) NOT NULL,
  `cTen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`cMa`, `cTen`) VALUES
(1, 'Mới Nhất'),
(2, 'Giá từ thấp đến cao'),
(3, 'Giá từ cao xuống thấp'),
(4, 'Nam'),
(5, 'Nữ'),
(6, 'Dây Da Bò Cao Cấp'),
(7, 'Dây Inox (Thép không gỉ)'),
(8, 'Dây Vải'),
(9, 'Dây Cao Su (Nhựa)'),
(10, 'Dây Da'),
(11, 'Dây lưới'),
(12, 'Cơ Tự Động (Automatic)'),
(13, 'Eco-drive (Năng lượng ánh sáng)'),
(14, 'Kinetic (Tự động - Pin)'),
(15, 'Pin (Quartz)'),
(16, 'Solor (Năng lượng ánh sáng mặt trời)'),
(17, 'Bán Chạy');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `maDh` int(11) NOT NULL,
  `maSp` int(11) NOT NULL,
  `soLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maDh`, `maSp`, `soLuong`) VALUES
(51, 1, 1),
(52, 1, 1),
(53, 1, 1),
(54, 1, 1),
(55, 2, 1),
(56, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `maDh` int(11) NOT NULL,
  `hoTen` varchar(50) DEFAULT NULL,
  `soDienThoai` int(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `diaChi` varchar(300) DEFAULT NULL,
  `ngayDat` date DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`maDh`, `hoTen`, `soDienThoai`, `email`, `diaChi`, `ngayDat`, `status`) VALUES
(51, 'Quốc Huy Trần', 333964846, 'kenbi.njr@gmail.cm', 'Vietnam', '2020-08-05', 'Đã giao hàng'),
(52, 'Nguyễn Thị Yến Nhi', 353684810, 'nguyennhi18022001@gmail.com', '18', '2020-08-05', 'Chưa giao hàng'),
(53, 'Quốc Huy Trần', 333964846, 'kenbi.njr@gmail.cm', 'Vietnam', '2020-09-08', 'Chưa giao hàng'),
(54, 'Quốc Huy Trần', 333964846, 'kenbi.njr@gmail.cm', 'Vietnam', '2020-09-15', 'Chưa giao hàng'),
(55, 'Tài', 243344, 'asdsad@gmial.com', '3455', '2020-09-15', 'Chưa giao hàng'),
(56, 'Nguyễn Thị Yến Nhi', 353684810, 'nguyennhi18022001@gmail.com', '47 đường 19-20 khu phố Gia Huỳnh', '2020-09-18', 'Chưa giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pMa` int(11) NOT NULL,
  `pAnh` varchar(50) NOT NULL,
  `pTen` varchar(50) NOT NULL,
  `pGia` int(11) NOT NULL,
  `pGiamGia` float DEFAULT NULL,
  `pGiaTietKiem` int(11) DEFAULT NULL,
  `pSao` float DEFAULT NULL,
  `pBaoHanh` int(11) DEFAULT NULL,
  `pChongNuoc` varchar(50) DEFAULT NULL,
  `pMat` varchar(15) DEFAULT NULL,
  `pGioiTinh` varchar(15) DEFAULT NULL,
  `pHang` varchar(50) DEFAULT NULL,
  `pLoaiDay` varchar(15) DEFAULT NULL,
  `pLoaiKinh` varchar(50) DEFAULT NULL,
  `pLoaiMay` varchar(50) DEFAULT NULL,
  `pSize` int(11) DEFAULT NULL,
  `pThuongHieu` varchar(50) DEFAULT NULL,
  `pNoiSanXuat` varchar(50) DEFAULT NULL,
  `catalog_id` int(11) NOT NULL,
  `pNgay` date DEFAULT NULL,
  `pLuotMua` int(11) DEFAULT NULL,
  `pViews` int(11) DEFAULT NULL,
  `pMoTa` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pMa`, `pAnh`, `pTen`, `pGia`, `pGiamGia`, `pGiaTietKiem`, `pSao`, `pBaoHanh`, `pChongNuoc`, `pMat`, `pGioiTinh`, `pHang`, `pLoaiDay`, `pLoaiKinh`, `pLoaiMay`, `pSize`, `pThuongHieu`, `pNoiSanXuat`, `catalog_id`, `pNgay`, `pLuotMua`, `pViews`, `pMoTa`) VALUES
(1, 'anh2.jpg', 'Casio AE-1200WHD-1AVDF Nam Quartz', 1246000, 20, 0, 0, 2, '10 ATM (100m)', 'Vuông', 'Nam', 'Casio', 'Dây Inox (Thép ', 'Mineral Crystal (Kính Cứng)', 'Pin (Quartz)', 45, 'Nhật Bản', 'Nhật Bản', 0, '2020-07-24', 4, 0, 'Đồng hồ nam Casio AE1200WHD có mặt đồng hồ vuông to với phong cách thể thao, mặt số điện tử với những tính năng hiện đại tiện dụng, kết hợp với dây đeo bằng kim loại đem lại vẻ mạnh mẽ cá tính dành cho phái nam.\r\n\r\n'),
(2, 'anh6.jpg', 'MVMT D-MR01-BSL Nam Quartz', 4000000, 20, 0, 0, 2, '5 ATM (50m)', 'Tròn', 'Nam', 'MVMT', 'Dây Da', 'Mineral Crystal (Kính Cứng)', 'Pin (Quartz)', 41, 'Mỹ', 'Mỹ', 0, '0000-00-00', 1, NULL, 'Đồng hồ Doxa nam D157SWH kiểu dáng đơn giản 2 kim vàng hồng thời trang sang trọng với thiết kế đính 8 viên kim cương trên mặt số trắng size 39mm.\r\n\r\n'),
(3, 'anh7.jpg', 'Casio B640WC-5ADF Nữ Quartz', 1739000, 20, 0, 0, 1, '5 ATM (50m)', 'Vuông', 'Nữ', 'Casio', 'Dây Inox (Thép ', 'Resin Glass (Kính Nhựa)', 'Pin (Quartz)', 38, 'Nhật Bản', 'Nhật Bản', 0, NULL, 1, 0, 'Casio B640WC-5ADF là phiên bản dùng được cho cả nam lẫn nữ nhờ đặc trưng riêng dòng đồng hồ điện tử. Với ưu điểm máy quartz, nhiều tiện ích, phối màu vàng hồng trẻ trung đúng xu hướng đã giúp thiết kế chinh phục hàng triệu bạn trẻ đam mê thời trang – phong cách.\r\n\r\n'),
(4, 'anh8.jpg', 'Citizen EZ7016-50D Nữ Quartz', 4490000, 20, 0, 0, 1, '3 ATM (30m)', 'Tròn', 'Nữ', 'Citizen', 'Dây Inox (Thép ', 'Mineral Crystal (Kính Cứng)', 'Cơ tự động (Automatic)', 24, 'Nhật Bản', 'Nhật Bản', 0, '2020-07-23', 0, 0, 'Mẫu Citizen EZ7003-51X phiên bản dây lưới tone màu vàng nhạt thời trang, mặt số đơn giản kiểu dáng 2 kim trẻ trung đi kèm với vỏ máy pin mỏng chỉ 7mm.\r\n\r\n'),
(5, 'anh9.jpg', 'Tissot T109.210.22.033.00 Nữ Quartz', 7310000, 20, 0, 0, 2, '3 ATM (30m)', 'Tròn', 'Nữ', 'Tissot', 'Dây Inox (Thép ', 'Sapphire (Kính Chống Trầy)', 'Kinetic (Tự động - Pin)', 30, 'Thụy Sĩ', 'Thụy Sĩ', 0, NULL, 0, 0, ''),
(6, 'anh3.jpg', 'Casio G-Shock', 2500000, 20, NULL, NULL, 1, '3 ATM (30m)', 'Vuông', 'Nam', 'Casio', 'Dây Da', 'mineral-crystal', 'Quartz', 45, 'Nhật Bản', 'Nhật Bản', 0, NULL, 0, 0, ''),
(7, 'anh4.jpg', 'Citiezen WZ11910', 1200000, 20, NULL, NULL, 2, '5 ATM (50m)', 'Tròn', 'Nam', 'Daniel Wellington', 'mineral-crystal', 'mineral-crystal', 'Quartz', 35, 'Nhật Bản', 'Nhật Bản', 0, NULL, 0, 0, ''),
(10, 'anh10.jpg', 'Olympia Star OPA58012-05LSK-T Nữ Quartz', 4032000, 20, 0, 0, 2, '3 ATM (30m)', 'Tròn', 'Nữ', 'Olympia Star', 'Dây Inox (Thép ', 'Sapphire (Kính Chống Trầy)', 'Pin (Quartz)', 26, 'Thụy Sĩ', 'Thụy Sĩ', 0, NULL, 0, 0, ''),
(11, 'anh11.jpg', 'Daniel Wellington DW00100239 Nữ Quartz', 3500000, 20, 0, 0, 2, '3 ATM (30m)', 'Tròn', 'Nữ', 'Daniel Wellington', 'Dây Da', 'Mineral Crystal (Kính Cứng)', 'Solor (Năng lượng ánh sáng mặt trời)', 28, 'Thụy Điển', 'Thụy Điển', 0, NULL, 0, 0, ''),
(12, 'anh12.jpg', 'Fossil ES4432 Nữ Quartz', 3300000, 20, 0, 0, 2, '5 ATM (50m)', 'Tròn', 'Nữ', 'Fossil', 'Dây Inox (Thép ', 'Mineral Crystal (Kính Cứng)', 'Eco-drive (Năng lượng ánh sáng)', 28, 'Mỹ', 'Mỹ', 0, NULL, 0, 0, ''),
(88, 'anh14', 'asdasdasd', 22222, 0, NULL, NULL, 0, '', '', '', '', '', '', '', 0, 'Nhật Bản', 'Nhật Bản', 0, NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aId`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`cMa`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`maDh`,`maSp`),
  ADD KEY `FK_products_chitietdonhang` (`maSp`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDh`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pMa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_donhang_chitietdonhang` FOREIGN KEY (`maDh`) REFERENCES `donhang` (`maDh`),
  ADD CONSTRAINT `FK_products_chitietdonhang` FOREIGN KEY (`maSp`) REFERENCES `products` (`pMa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
