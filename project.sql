-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 07:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessdenied`
--

CREATE TABLE `accessdenied` (
  `sn` int(30) NOT NULL,
  `log` varchar(30) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(30) NOT NULL,
  `catname` varchar(30) DEFAULT NULL,
  `budget` varchar(30) DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL,
  `addid` int(30) DEFAULT NULL,
  `catid` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `catname`, `budget`, `amount`, `addid`, `catid`) VALUES
(1, 'rice', '123', '123', NULL, 100),
(2, 'rice', '123', '123', 2, 101),
(3, 'wheat', '1200', '100', 2, 101),
(4, 'wheat', '1200', '100', 2, 100),
(5, 'water', '1200', '100', 2, 101);

-- --------------------------------------------------------

--
-- Table structure for table `categoryname`
--

CREATE TABLE `categoryname` (
  `id` int(30) NOT NULL,
  `catname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoryname`
--

INSERT INTO `categoryname` (`id`, `catname`) VALUES
(100, 'Grain'),
(101, 'Fluid'),
(102, 'Snacks'),
(104, 'Water purification'),
(105, 'medicine'),
(110, 'cloth');

-- --------------------------------------------------------

--
-- Table structure for table `census`
--

CREATE TABLE `census` (
  `number` int(30) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `divname` varchar(30) DEFAULT NULL,
  `Density` int(30) DEFAULT NULL,
  `datafirst` int(30) DEFAULT NULL,
  `datasecond` int(30) DEFAULT NULL,
  `dathathird` int(30) DEFAULT NULL,
  `projection` int(30) DEFAULT NULL,
  `projectionMale` int(30) DEFAULT NULL,
  `projectionFemale` int(30) DEFAULT NULL,
  `projectionChild` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `census`
--

INSERT INTO `census` (`number`, `Name`, `divname`, `Density`, `datafirst`, `datasecond`, `dathathird`, `projection`, `projectionMale`, `projectionFemale`, `projectionChild`) VALUES
(1, 'Barisal', 'Barisal', 13297, 7462643, 8173718, 8325666, 9713000, 4047083, 4856500, 809416),
(2, 'Barguna', 'Barisal', 1831, 775693, 848554, 892781, 1013000, 422083, 506500, 84416),
(3, 'Barisal', 'Barisal', 2785, 2207426, 2355967, 2324310, 2776000, 1156666, 1388000, 231333),
(4, 'Bhola', 'Barisal', 3403, 1476328, 1703117, 1776795, 2057000, 857083, 1028500, 171416),
(5, 'Jhalakati', 'Barisal', 749, 666139, 694231, 682669, 778000, 324166, 389000, 64833),
(6, 'Patuakhali', 'Barisal', 3221, 1273872, 1460781, 1535854, 1823000, 759583, 911500, 151916),
(7, 'Pirojpur', 'Barisal', 1308, 1063185, 1111068, 1113257, 1266000, 527500, 633000, 105500),
(8, 'Chittagong', 'Chittagong', 33771, 20522908, 24290384, 28423019, 34747000, 14477916, 17373500, 2895583),
(9, 'Bandarban', 'Chittagong', 4479, 230569, 298120, 388335, 469000, 195416, 234500, 39083),
(10, 'Brahmanbaria', 'Chittagong', 1927, 2141745, 2398254, 2840498, 3617000, 1507083, 1808500, 301416),
(11, 'Chandpur', 'Chittagong', 1704, 2032449, 2271229, 2416018, 2929000, 1220416, 1464500, 244083),
(12, 'Chittagong', 'Chittagong', 5283, 5296127, 6612140, 7616352, 8990000, 3745833, 4495000, 749166),
(13, 'Comilla', 'Chittagong', 3085, 4032666, 4595557, 5387288, 6559000, 2732916, 3279500, 546583),
(14, 'Cox\'s Bazar', 'Chittagong', 2492, 1419260, 1773709, 2289990, 2979000, 1241250, 1489500, 248250),
(15, 'Feni', 'Chittagong', 928, 1096745, 1240384, 1437371, 1754000, 730833, 877000, 146166),
(16, 'Khagrachhari', 'Chittagong', 2700, 342488, 525664, 613917, 738000, 307500, 369000, 61500),
(17, 'Lakshmipur', 'Chittagong', 1456, 1312337, 1489901, 1729188, 2223000, 926250, 1111500, 185250),
(18, 'Noakhali', 'Chittagong', 3601, 2217134, 2577244, 3108083, 3799000, 1582916, 1899500, 316583),
(19, 'Rangamati', 'Chittagong', 6116, 401388, 508182, 595979, 690000, 287500, 345000, 57500),
(20, 'Dhaka', 'Dhaka', 20551, 23964789, 29180051, 36433505, 42607000, 17752916, 21303500, 3550583),
(21, 'Dhaka', 'Dhaka', 1464, 5839642, 8511228, 12043977, 13798000, 5749166, 6899000, 1149833),
(22, 'Faridpur', 'Dhaka', 2073, 1505686, 1756470, 1912969, 2201000, 917083, 1100500, 183416),
(23, 'Gazipur', 'Dhaka', 1800, 1621562, 2031891, 3403912, 4046000, 1685833, 2023000, 337166),
(24, 'Gopalganj', 'Dhaka', 1490, 1060791, 1165273, 1172415, 1346000, 560833, 673000, 112166),
(25, 'Kishoreganj', 'Dhaka', 2689, 2306087, 2594954, 2911907, 3648000, 1520000, 1824000, 304000),
(26, 'Madaripur', 'Dhaka', 1145, 1069176, 1146349, 1165952, 1393000, 580416, 696500, 116083),
(27, 'Manikganj', 'Dhaka', 1379, 1175909, 1285080, 1392867, 1640000, 683333, 820000, 136666),
(28, 'Munshiganj', 'Dhaka', 955, 1188387, 1293972, 1445660, 1669000, 695416, 834500, 139083),
(29, 'Narayanganj', 'Dhaka', 700, 1754804, 2173948, 2948217, 3490000, 1454166, 1745000, 290833),
(30, 'Narsingdi', 'Dhaka', 1141, 1652123, 1895984, 2224944, 2685000, 1118750, 1342500, 223750),
(31, 'Rajbari', 'Dhaka', 1119, 835173, 951906, 1049778, 1201000, 500416, 600500, 100083),
(32, 'Shariatpur', 'Dhaka', 1182, 953021, 1082300, 1155824, 1385000, 577083, 692500, 115416),
(33, 'Tangail', 'Dhaka', 3414, 3002428, 3290696, 3605083, 4105000, 1710416, 2052500, 342083),
(34, 'Mymensingh', 'Mymensingh', 10569, 8701186, 9864665, 10990913, 13457000, 5607083, 6728500, 1121416),
(35, 'Jamalpur', 'Mymensingh', 2032, 1874440, 2107209, 2292674, 2713000, 1130416, 1356500, 226083),
(36, 'Mymensingh', 'Mymensingh', 4363, 3957182, 4489726, 5110272, 6378000, 2657500, 3189000, 531500),
(37, 'Netrakona', 'Mymensingh', 2810, 1730935, 1988188, 2229642, 2759000, 1149583, 1379500, 229916),
(38, 'Sherpur', 'Mymensingh', 1364, 1138629, 1279542, 1358325, 1607000, 669583, 803500, 133916),
(39, 'Khulna', 'Khulna', 22272, 12688383, 14705229, 15687759, 18217000, 7590416, 9108500, 1518083),
(40, 'Bagerhat', 'Khulna', 3959, 1431332, 1549031, 1476090, 1675000, 697916, 837500, 139583),
(41, 'Chuadanga', 'Khulna', 1177, 807164, 1007130, 1129015, 1299000, 541250, 649500, 108250),
(42, 'Jessore', 'Khulna', 2567, 2106996, 2471554, 2764547, 3182000, 1325833, 1591000, 265166),
(43, 'Jhenaidah', 'Khulna', 1961, 1361280, 1579490, 1771304, 2111000, 879583, 1055500, 175916),
(44, 'Khulna', 'Khulna', 4394, 2010643, 2378971, 2318527, 2650000, 1104166, 1325000, 220833),
(45, 'Kushtia', 'Khulna', 1601, 1502126, 1740155, 1946838, 2318000, 965833, 1159000, 193166),
(46, 'Magura', 'Khulna', 1049, 724027, 824311, 918419, 1091000, 454583, 545500, 90916),
(47, 'Meherpur', 'Khulna', 716, 491917, 591430, 655392, 750000, 312500, 375000, 62500),
(48, 'Narail', 'Khulna', 990, 655720, 698447, 721668, 856000, 356666, 428000, 71333),
(49, 'Satkhira', 'Khulna', 3858, 1597178, 1864704, 1985959, 2285000, 952083, 1142500, 190416),
(50, 'Rajshahi', 'Rajshahi', 18197, 14212065, 16354723, 18484858, 21607000, 9002916, 10803500, 1800583),
(51, 'Bogra', 'Rajshahi', 2920, 2669287, 3013056, 3400874, 3903000, 1626250, 1951500, 325250),
(52, 'Chapai Nawabganj', 'Rajshahi', 1703, 1171469, 1425322, 1647521, 2003000, 834583, 1001500, 166916),
(53, 'Jaipurhat', 'Rajshahi', 965, 765011, 846696, 913768, 1042000, 434166, 521000, 86833),
(54, 'Naogaon', 'Rajshahi', 3436, 2148053, 2391355, 2600157, 2977000, 1240416, 1488500, 248083),
(55, 'Natore', 'Rajshahi', 1896, 1387761, 1521336, 1706673, 1956000, 815000, 978000, 163000),
(56, 'Pabna', 'Rajshahi', 2372, 1919896, 2176270, 2523179, 3019000, 1257916, 1509500, 251583),
(57, 'Rajshahi', 'Rajshahi', 2407, 1887015, 2286874, 2595197, 3000000, 1250000, 1500000, 250000),
(58, 'Sirajganj', 'Rajshahi', 2498, 2263573, 2693814, 3097489, 3707000, 1544583, 1853500, 308916),
(59, 'Rangpur', 'Rangpur', 16317, 11997979, 13847150, 15787758, 18868000, 7861666, 9434000, 1572333),
(60, 'Dinajpur', 'Rangpur', 3438, 2260131, 2642850, 2990128, 3430000, 1429166, 1715000, 285833),
(61, 'Gaibandha', 'Rangpur', 2179, 1949274, 2138181, 2379255, 2975000, 1239583, 1487500, 247916),
(62, 'Kurigram', 'Rangpur', 2296, 1603034, 1792073, 2069273, 2464000, 1026666, 1232000, 205333),
(63, 'Lalmonirhat', 'Rangpur', 1241, 953460, 1109343, 1256099, 1500000, 625000, 750000, 125000),
(64, 'Nilphamari', 'Rangpur', 1580, 1348762, 1571690, 1834231, 2204000, 918333, 1102000, 183666),
(65, 'Panchagarh', 'Rangpur', 1405, 712024, 836196, 987644, 1188000, 495000, 594000, 99000),
(66, 'Rangpur', 'Rangpur', 2368, 2160346, 2542441, 2881086, 3439000, 1432916, 1719500, 286583),
(67, 'Thakurgaon', 'Rangpur', 1810, 1010948, 1214376, 1390042, 1668000, 695000, 834000, 139000),
(68, 'Sylhet', 'Sylhet', 12596, 6765039, 7939343, 9910219, 12463000, 5192916, 6231500, 1038583),
(69, 'Habiganj', 'Sylhet', 2637, 1526609, 1757665, 2089001, 2640000, 1100000, 1320000, 220000),
(70, 'Maulvi Bazar', 'Sylhet', 2799, 1376566, 1612374, 1919062, 2324000, 968333, 1162000, 193666),
(71, 'Sunamganj', 'Sylhet', 3670, 1708563, 2013738, 2467968, 3091000, 1287916, 1545500, 257583),
(72, 'Sylhet', 'Sylhet', 3490, 2153301, 2555566, 3434188, 4408000, 1836666, 2204000, 367333),
(73, 'total', '', 147570, 106314992, 124355263, 144043697, 171679000, 71532916, 85839500, 14306583);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `emergency_contact_no` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` int(30) DEFAULT NULL,
  `imgdata` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `status` varchar(30) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `mobile`, `address`, `emergency_contact_no`, `email`, `role`, `imgdata`, `doj`, `status`) VALUES
(1, 'dataentry', '546464654654', '4646544564654', '12321312', 'dataentry@nai', 1, '../img/aniks.jpg', '2020-12-31', 'active'),
(2, 'Anik', '018421211546546', 'portCity', '65454656465464', 'aniksen@anikhere.com', 4, 'img/aniks.jpg', NULL, 'active'),
(3, 'DataValidator', '+8801842184018', 'South khulsi road no 2', '132213', 'Datavalidator@gmail.com', 3, '../img/IMG_20201107_170253.jpg', '2021-02-05', 'active'),
(4, 'Anik Sen', '+8801842184018', 'South khulsi road no 2', '1233', 'Aniksen5895@gmail.com', 1, 'img/photo_2020-11-14_17-46-29.jpg', '2021-01-19', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(30) NOT NULL,
  `catid` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `remarks` varchar(30) NOT NULL,
  `addid` int(30) DEFAULT NULL,
  `cost` int(30) DEFAULT NULL,
  `sellerid` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `catid`, `name`, `remarks`, `addid`, `cost`, `sellerid`) VALUES
(1, 101, 'wheat', 'nai', 2, 1500, 300),
(3, 100, 'Anik Sen', ' 100', 2, 1500, 300),
(4, 101, 'Anik Sen', ' 121', 2, 1500, 300),
(5, 100, 'warerar', ' 152', 2, 1500, 300);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(30) DEFAULT NULL,
  `pass` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `pass`) VALUES
(2, '7e9506671c24dbe5ecd8af38a97626ce'),
(1, 'ba71f8e7f3b18d6bcd642a90e641b85a'),
(3, '180534c90bd11bd94b314b20181f274e'),
(4, '4c45741034c235d8e39012e7225e8a99');

-- --------------------------------------------------------

--
-- Table structure for table `online1`
--

CREATE TABLE `online1` (
  `number` int(30) NOT NULL,
  `id` int(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online1`
--

INSERT INTO `online1` (`number`, `id`, `status`) VALUES
(5, 2, 'active'),
(6, 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `peopledata`
--

CREATE TABLE `peopledata` (
  `srn` int(30) NOT NULL,
  `division` varchar(30) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `upazilla` varchar(30) DEFAULT NULL,
  `male` int(30) DEFAULT NULL,
  `female` int(30) DEFAULT NULL,
  `children` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peopledata`
--

INSERT INTO `peopledata` (`srn`, `division`, `district`, `upazilla`, `male`, `female`, `children`) VALUES
(1, 'Chattogram', 'à¦¬à§à¦°à¦¾à¦¹à§à¦®à¦£à¦¬à¦¾', '', 100, 150, 100),
(2, 'Chattogram', 'à¦šà¦¾à¦à¦¦à¦ªà§à¦°', 'à¦®à¦¤à¦²à¦¬ à¦‰à¦¤à§à¦¤à¦°', 100, 100, 200),
(3, 'Chattogram', 'à¦¬à§à¦°à¦¾à¦¹à§à¦®à¦£à¦¬à¦¾', 'à¦¸à¦°à¦¾à¦‡à¦²', 100, 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role` int(30) NOT NULL,
  `rolename` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role`, `rolename`) VALUES
(1, 'Data-Entry'),
(2, 'IT-Administrator'),
(3, 'Data-Validator'),
(4, 'System-Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(30) NOT NULL,
  `sellername` varchar(30) DEFAULT NULL,
  `products` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `sellername`, `products`, `address`, `mobile`) VALUES
(300, 'AnikFOOD', 'WHEAT', 'portCity', '018421211546546');

-- --------------------------------------------------------

--
-- Table structure for table `syslog`
--

CREATE TABLE `syslog` (
  `number` int(30) DEFAULT NULL,
  `Action` varchar(50) DEFAULT NULL,
  `time` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) ON UPDATE CURRENT_TIMESTAMP(5),
  `id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessdenied`
--
ALTER TABLE `accessdenied`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `addid` (`addid`),
  ADD KEY `catid` (`catid`);

--
-- Indexes for table `categoryname`
--
ALTER TABLE `categoryname`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `census`
--
ALTER TABLE `census`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `catid` (`catid`),
  ADD KEY `sellerid` (`sellerid`),
  ADD KEY `addid` (`addid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `id` (`id`);

--
-- Indexes for table `online1`
--
ALTER TABLE `online1`
  ADD PRIMARY KEY (`number`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `peopledata`
--
ALTER TABLE `peopledata`
  ADD PRIMARY KEY (`srn`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role`) USING BTREE;

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `syslog`
--
ALTER TABLE `syslog`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessdenied`
--
ALTER TABLE `accessdenied`
  MODIFY `sn` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categoryname`
--
ALTER TABLE `categoryname`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `census`
--
ALTER TABLE `census`
  MODIFY `number` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `online1`
--
ALTER TABLE `online1`
  MODIFY `number` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peopledata`
--
ALTER TABLE `peopledata`
  MODIFY `srn` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget`
--
ALTER TABLE `budget`
  ADD CONSTRAINT `budget_ibfk_1` FOREIGN KEY (`addid`) REFERENCES `employee` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `budget_ibfk_2` FOREIGN KEY (`catid`) REFERENCES `categoryname` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role`) ON DELETE SET NULL;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `categoryname` (`id`),
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`sellerid`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `expense_ibfk_3` FOREIGN KEY (`addid`) REFERENCES `employee` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `online1`
--
ALTER TABLE `online1`
  ADD CONSTRAINT `online1_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `syslog`
--
ALTER TABLE `syslog`
  ADD CONSTRAINT `syslog_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
