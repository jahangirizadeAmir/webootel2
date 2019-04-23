-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2019 at 12:51 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `adminName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adminUsername` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adminPassword` varchar(512) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkService`
--

CREATE TABLE `checkService` (
  `serviceId` int(11) NOT NULL,
  `serviceName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `serviceMobile` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `serviceTell` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `serviceAddress` longtext COLLATE utf8_persian_ci NOT NULL,
  `servicePostalCode` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `serviceModel` varchar(1) COLLATE utf8_persian_ci NOT NULL,
  `serviceLat` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `serviceLng` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `serviceDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `serviceTime` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `serviceDesc` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `serviceOk` varchar(1) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sellerName` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sellerTell` varchar(15) COLLATE utf8_persian_ci NOT NULL,
  `sellerMobile` varchar(12) COLLATE utf8_persian_ci NOT NULL,
  `sellerBDate` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sellerCity` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `sellerEmail` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `sellerDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `sellerTime` varchar(8) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sliderId` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sliderText` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderLink` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderBtn` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderImg` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderDate` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `sliderTime` varchar(8) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sliderId`, `sliderText`, `sliderLink`, `sliderBtn`, `sliderImg`, `sliderDate`, `sliderTime`) VALUES
('1', 'خرید بسته یک ماه', '#', 'تست', 'SlideShow1', '', ''),
('2', 'خرید بسته د ماه', '#', '2تست', 'SlideShow1', '', ''),
('3', 'خرید بسته سه ماه', '#', '2تست', 'SlideShow1', '', ''),
('4', 'خرید بسته چهار ماه', '#', '2تست', 'SlideShow1', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `checkService`
--
ALTER TABLE `checkService`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerId`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkService`
--
ALTER TABLE `checkService`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
