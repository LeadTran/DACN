-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2023 at 05:22 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int(11) NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`) VALUES
(1, 54, '8443', 0),
(2, 55, '1378', 0),
(3, 55, '6060', 0),
(4, 55, '5390', 0),
(12, 58, '8299', 1),
(9, 57, '3595', 0),
(10, 51, '4331', 0),
(11, 58, '163', 0),
(13, 58, '6287', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_details`
--

DROP TABLE IF EXISTS `tbl_cart_details`;
CREATE TABLE IF NOT EXISTS `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL AUTO_INCREMENT,
  `code_cart` varchar(10) NOT NULL,
  `petid` int(11) NOT NULL,
  `numericalbought` int(11) NOT NULL,
  PRIMARY KEY (`id_cart_details`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `petid`, `numericalbought`) VALUES
(1, '8443', 37, 1),
(2, '1378', 38, 1),
(3, '1378', 26, 1),
(4, '6060', 38, 1),
(5, '6060', 26, 1),
(6, '5390', 26, 1),
(7, '4165', 27, 1),
(8, '1569', 29, 1),
(9, '6037', 29, 1),
(10, '9678', 27, 1),
(11, '9678', 38, 1),
(12, '9678', 37, 1),
(13, '3595', 38, 1),
(14, '4331', 26, 1),
(15, '163', 29, 1),
(16, '8299', 38, 2),
(17, '8299', 24, 4),
(18, '6287', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

DROP TABLE IF EXISTS `tbl_dangky`;
CREATE TABLE IF NOT EXISTS `tbl_dangky` (
  `id_dangky` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `role_account` int(11) NOT NULL,
  PRIMARY KEY (`id_dangky`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `username`, `email`, `diachi`, `pword`, `dienthoai`, `role_account`) VALUES
(47, 'quang', 'quang@mail.com', '180 Cao Lá»—', '202cb962ac59075b964b07152d234b70', '0919402052', 0),
(48, 'test', 'test01@gmail.com', 'test', '202cb962ac59075b964b07152d234b70', '123456', 1),
(49, 'test02', 'test02@gmail.com', 'test02', '202cb962ac59075b964b07152d234b70', '91239219', 0),
(50, 'test03', 'test03@gmail.com', '123', '202cb962ac59075b964b07152d234b70', '123456', 0),
(51, 'test04', 'test04@gmail.com', '123', '202cb962ac59075b964b07152d234b70', '123123', 0),
(52, 'test05', 'test05@gmail.com', '123', 'c4ca4238a0b923820dcc509a6f75849b', '0138128', 0),
(54, 'test06', '123@gmail.com', '123', '202cb962ac59075b964b07152d234b70', '12312412', 0),
(55, 'huy', 'huy', 'huy', '11967d5e9addc5416ea9224eee0e91fc', 'huy', 0),
(56, 'khanh', 'khanh.tranquoc0802@gmail.com', 'khanh', '46c9a651ec34e9118b64e72ae13b067f', 'khanh', 0),
(57, 'abc', 'abc', 'abc', '900150983cd24fb0d6963f7d28e17f72', 'abc', 0),
(58, 'dat', 'dat', 'dat', 'e34d514f7db5c8aac72a7c8191a09617', 'dat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pet`
--

DROP TABLE IF EXISTS `tbl_pet`;
CREATE TABLE IF NOT EXISTS `tbl_pet` (
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  `petid` varchar(100) NOT NULL,
  `petname` varchar(250) NOT NULL,
  `price` varchar(50) NOT NULL,
  `numerical` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `petstatus` int(11) NOT NULL,
  `id_petlist` int(11) NOT NULL,
  PRIMARY KEY (`stt`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pet`
--

INSERT INTO `tbl_pet` (`stt`, `petid`, `petname`, `price`, `numerical`, `img`, `petstatus`, `id_petlist`) VALUES
(27, 'C_02', 'British Shorthair', '200', 5, 'BS.jpg', 1, 35),
(26, 'C_01', 'Tabby', '200', 10, 'tabby.jpg', 2, 35),
(24, 'D_01', 'Husky', '700', 1, 'husky.jpg', 2, 36),
(28, 'C_03', 'Sphynx', '1000', 1, 'sphynx.jpg', 1, 35),
(37, 'C_04', 'Grumpy', '200', 10, 'grumpy.jpg', 1, 35),
(38, 'C_05', 'Bee Sama', '9999', 0, 'beesama.jpg', 2, 35),
(50, 'D_01', 'Husky', '123', 123, 'Untitled design (6).png', 1, 35),
(49, '123', '123', '1', 1, 'Untitled design (6).png', 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petlist`
--

DROP TABLE IF EXISTS `tbl_petlist`;
CREATE TABLE IF NOT EXISTS `tbl_petlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namepetlist` varchar(100) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_petlist`
--

INSERT INTO `tbl_petlist` (`id`, `namepetlist`, `note`) VALUES
(36, 'Dog', ''),
(35, 'Cat', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supply`
--

DROP TABLE IF EXISTS `tbl_supply`;
CREATE TABLE IF NOT EXISTS `tbl_supply` (
  `id_supply` int(11) NOT NULL AUTO_INCREMENT,
  `name_supply` varchar(100) NOT NULL,
  `petid` int(11) NOT NULL,
  PRIMARY KEY (`id_supply`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
