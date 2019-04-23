-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2019 at 01:34 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin`
(
  `adminId`       varchar(20) COLLATE utf8_persian_ci  NOT NULL,
  `adminName`     varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adminUsername` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adminPassword` varchar(512) COLLATE utf8_persian_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adsl`
--

CREATE TABLE `adsl`
(
  `adslId`          int(11)                              NOT NULL,
  `adslName`        varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adslIn`          varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adslOut`         varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adslPrice`       varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `adslPackModelId` int(11)                              NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_persian_ci;

--
-- Dumping data for table `adsl`
--

INSERT INTO `adsl` (`adslId`, `adslName`, `adslIn`, `adslOut`, `adslPrice`, `adslPackModelId`)
VALUES (1, '' ۳۰ مگ '', '' ۲۰۰ '', '' ۵۰۰ '', '' ۱۰۰۰ '', 1),
       (2, '' ۳۰ مگ '', '' ۲۰۰ '', '' ۵۰۰ '', '' ۱۰۰۰ '', 1),
       (3, '' ۳۰ مگ '', '' ۲۰۰ '', '' ۵۰۰ '', '' ۱۰۰۰ '', 1),
       (4, '' ۳۰ مگ '', '' ۲۰۰ '', '' ۵۰۰ '', '' ۱۰۰۰ '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkService`
--

CREATE TABLE `checkService`
(
  `serviceId`         int(11)                              NOT NULL,
  `serviceName`       varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `serviceMobile`     varchar(12) COLLATE utf8_persian_ci  NOT NULL,
  `serviceTell`       varchar(12) COLLATE utf8_persian_ci  NOT NULL,
  `serviceAddress`    longtext COLLATE utf8_persian_ci     NOT NULL,
  `servicePostalCode` varchar(10) COLLATE utf8_persian_ci  NOT NULL,
  `serviceModel`      varchar(1) COLLATE utf8_persian_ci   NOT NULL,
  `serviceLat`        varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `serviceLng`        varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `serviceDate`       varchar(10) COLLATE utf8_persian_ci  NOT NULL,
  `serviceTime`       varchar(8) COLLATE utf8_persian_ci   NOT NULL,
  `serviceDesc`       varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `serviceOk`         varchar(1) COLLATE utf8_persian_ci   NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month`
(
  `monthId`   int(11)                              NOT NULL,
  `monthName` varchar(120) COLLATE utf8_persian_ci NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_persian_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`monthId`, `monthName`)
VALUES (1, '' یک ماه ''),
       (2, '' سه ماه ''),
       (3, '' ۶ ماه ''),
       (4, '' یک سال '');

-- --------------------------------------------------------

--
-- Table structure for table `packModel`
--

CREATE TABLE `packModel`
(
  `packModelId`    int(11)                              NOT NULL,
  `packModelMonth` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `modelService`   varchar(1) COLLATE utf8_persian_ci   NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_persian_ci;

--
-- Dumping data for table `packModel`
--

INSERT INTO `packModel` (`packModelId`, `packModelMonth`, `modelService`)
VALUES (1, '' 1 '', '' 1 ''),
       (2, '' 2 '', '' 1 ''),
       (3, '' 3 '', '' 1 ''),
       (4, '' 4 '', '' 1 ''),
       (5, '' 1 '', '' 2 ''),
       (6, '' 2 '', '' 2 ''),
       (7, '' 3 '', '' 2 ''),
       (8, '' 4 '', '' 2 ''),
       (9, '' 1 '', '' 3 ''),
       (10, '' 2 '', '' 3 ''),
       (11, '' 3 '', '' 3 ''),
       (12, '' 4 '', '' 3 '');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller`
(
  `sellerId`     varchar(20) COLLATE utf8_persian_ci  NOT NULL,
  `sellerName`   varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sellerTell`   varchar(15) COLLATE utf8_persian_ci  NOT NULL,
  `sellerMobile` varchar(12) COLLATE utf8_persian_ci  NOT NULL,
  `sellerBDate`  varchar(20) COLLATE utf8_persian_ci  NOT NULL,
  `sellerCity`   varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `sellerEmail`  varchar(50) COLLATE utf8_persian_ci  NOT NULL,
  `sellerDate`   varchar(10) COLLATE utf8_persian_ci  NOT NULL,
  `sellerTime`   varchar(8) COLLATE utf8_persian_ci   NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider`
(
  `sliderId`   varchar(20) COLLATE utf8_persian_ci  NOT NULL,
  `sliderText` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderLink` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderBtn`  varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderImg`  varchar(120) COLLATE utf8_persian_ci NOT NULL,
  `sliderDate` varchar(10) COLLATE utf8_persian_ci  NOT NULL,
  `sliderTime` varchar(8) COLLATE utf8_persian_ci   NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_persian_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sliderId`, `sliderText`, `sliderLink`, `sliderBtn`, `sliderImg`, `sliderDate`, `sliderTime`)
VALUES ('' 1 '', '' خرید بسته یک ماه '', ''#'', ''تست'', ''SlideShow1'', '''', ''''),
  ('' 2 '', '' خرید بسته د ماه '', ''#'', ''2تست'', ''SlideShow1'', '''', ''''),
  ('' 3 '', '' خرید بسته سه ماه '', ''#'', ''2تست'', ''SlideShow1'', '''', ''''),
  ('' 4 '', '' خرید بسته چهار ماه '', ''#'', ''2تست'', ''SlideShow1'', '''', '''');

  -- --------------------------------------------------------

  --
  -- Table structure for table `tdlte`
  --

  CREATE TABLE `tdlte` (
  `tdlteId` int (11) NOT NULL,
  `tdlteTraffic` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `tdltePrice` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `tdltePackModelId` int (11) NOT NULL
  ) ENGINE =InnoDB DEFAULT CHARSET =utf8 COLLATE =utf8_persian_ci;

  --
  -- Dumping data for table `tdlte`
  --

  INSERT INTO `tdlte` (`tdlteId`, `tdlteTraffic`, `tdltePrice`, `tdltePackModelId`) VALUES
  (1, '' 123 '', '' 5555 '', 10),
  (2, '' 123 '', '' 5555 '', 10),
  (3, '' 123 '', '' 5555 '', 10);

  -- --------------------------------------------------------

  --
  -- Table structure for table `userCustomer`
  --

  CREATE TABLE `userCustomer` (
  `userId` varchar (20) COLLATE utf8_persian_ci NOT NULL,
  `userName` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `userGender` varchar (1) COLLATE utf8_persian_ci NOT NULL,
  `userNationalCode` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `userFathername` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `userCityBorn` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `userBDate` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `userTell` varchar (12) COLLATE utf8_persian_ci NOT NULL,
  `userEmail` varchar (190) COLLATE utf8_persian_ci NOT NULL,
  `userAddress` varchar (190) COLLATE utf8_persian_ci NOT NULL,
  `userShSh` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `userAgentName` varchar (120) COLLATE utf8_persian_ci NOT NULL,
  `userPostalCode` varchar (11) COLLATE utf8_persian_ci NOT NULL,
  `userDate` varchar (10) COLLATE utf8_persian_ci NOT NULL,
  `userTime` varchar (8) COLLATE utf8_persian_ci NOT NULL
  ) ENGINE =InnoDB DEFAULT CHARSET =utf8 COLLATE =utf8_persian_ci;

  --
  -- Dumping data for table `userCustomer`
  --

  INSERT INTO `userCustomer` (`userId`, `userName`, `userGender`, `userNationalCode`, `userFathername`, `userCityBorn`, `userBDate`, `userTell`, `userEmail`, `userAddress`, `userShSh`, `userAgentName`, `userPostalCode`, `userDate`, `userTime`) VALUES
  ('' 20190412201009960779 '', '' asd '', '' 1 '', '' asd '', '' asd '', '' asd '', '' asd '', '' ad '', '' ad '', '' asd '', '' asd '', '' aaa '', '' aaaa '', '' 2019/04/12 '', '' 20:10:09 ''),
  ('' 20190412201110361627 '', '' asd '', '' 1 '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' 2019/04/12 '', '' 20:11:10 ''),
  ('' 20190412201829570174 '', '' asd '', '' 1 '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' 2019/04/12 '', '' 20:18:29 ''),
  ('' 20190412201847732848 '', '' asd '', '' 1 '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' 2019/04/12 '', '' 20:18:47 ''),
  ('' 20190412202655875704 '', '' lkjljk '', '' 1 '', '' ljkjkl '', '' jlk '', '' ljk '', '' lkj '', '' ljk '', '' ljk '', '' ljk '', '' lkj '', '' ljk '', '' ljk '', '' 2019/04/12 '', '' 20:26:55 ''),
  ('' 20190412202736398444 '', '' lkjljk '', '' 1 '', '' ljkjkl '', '' jlk '', '' ljk '', '' lkj '', '' ljk '', '' ljk '', '' ljk '', '' lkj '', '' ljk '', '' ljk '', '' 2019/04/12 '', '' 20:27:36 ''),
  ('' 20190412202813066220 '', '' asd '', '' 1 '', '' asd '', '' asd '', '' asd '', '' sd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' asd '', '' 2019/04/12 '', '' 20:28:13 ''),
  ('' 20190412213336771538 '', '' asd '', '' 1 '', '' ad '', '' sd '', '' ad '', '' das '', '' d '', '' adasd '', '' dqd `'', ''c'', ''d'', ''d'', ''2019/04/12'', ''21:33:36''),
(''20190412222601918664'', ''asd'', ''1'', ''asd'', ''asd'', ''asd'', ''asd'', ''asd'', ''asd'', ''asd'', ''asd'', ''asd'', ''asd'', ''2019/04/12'', ''22:26:01'');

-- --------------------------------------------------------

--
-- Table structure for table ` wireless `
--

CREATE TABLE ` wireless ` (
  ` wirelessId ` int(11) NOT NULL,
  ` wirelessTrafic ` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  ` wirelessPrice ` varchar(120) COLLATE utf8_persian_ci NOT NULL,
  ` wirelessPackModelId ` int(11) NOT NULL,
  ` wirelessDayNight ` varchar(1) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table ` wireless `
--

INSERT INTO ` wireless ` (` wirelessId `, ` wirelessTrafic `, ` wirelessPrice `, ` wirelessPackModelId `, ` wirelessDayNight `) VALUES
(1, ''12'', ''1233'', 6, ''0''),
(2, ''12'', ''1233'', 5, ''1''),
(3, ''12'', ''1233'', 6, ''0'');

--
-- Indexes for dumped tables
--

--
-- Indexes for table ` admin `
--
ALTER TABLE ` admin `
  ADD PRIMARY KEY (` adminId `);

--
-- Indexes for table ` adsl `
--
ALTER TABLE ` adsl `
  ADD PRIMARY KEY (` adslId `);

--
-- Indexes for table ` checkService `
--
ALTER TABLE ` checkService `
  ADD PRIMARY KEY (` serviceId `);

--
-- Indexes for table ` month `
--
ALTER TABLE ` month `
  ADD PRIMARY KEY (` monthId `);

--
-- Indexes for table ` packModel `
--
ALTER TABLE ` packModel `
  ADD PRIMARY KEY (` packModelId `);

--
-- Indexes for table ` seller `
--
ALTER TABLE ` seller `
  ADD PRIMARY KEY (` sellerId `);

--
-- Indexes for table ` slider `
--
ALTER TABLE ` slider `
  ADD PRIMARY KEY (` sliderId `);

--
-- Indexes for table ` tdlte `
--
ALTER TABLE ` tdlte `
  ADD PRIMARY KEY (` tdlteId `);

--
-- Indexes for table ` userCustomer `
--
ALTER TABLE ` userCustomer `
  ADD PRIMARY KEY (` userId `);

--
-- Indexes for table ` wireless `
--
ALTER TABLE ` wireless `
  ADD PRIMARY KEY (` wirelessId `);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table ` adsl `
--
ALTER TABLE ` adsl `
  MODIFY ` adslId ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table ` checkService `
--
ALTER TABLE ` checkService `
  MODIFY ` serviceId ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table ` month `
--
ALTER TABLE ` month `
  MODIFY ` monthId ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table ` packModel `
--
ALTER TABLE ` packModel `
  MODIFY ` packModelId ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table ` tdlte `
--
ALTER TABLE ` tdlte `
  MODIFY ` tdlteId ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table ` wireless `
--
ALTER TABLE ` wireless `
  MODIFY ` wirelessId ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
