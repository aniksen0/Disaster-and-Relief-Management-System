-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 11:16 AM
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
(103, ''),
(104, 'Water purification'),
(105, 'medicine');

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
(2, 'Anik', '018421211546546', 'portCity', '65454656465464', 'aniksen@anikhere.com', 4, '../img/aniks.jpg', NULL, 'active'),
(3, 'DataValidator', '+8801842184018', 'South khulsi road no 2', '132213', 'Datavalidator@gmail.com', 3, '../img/IMG_20201107_170253.jpg', '2021-02-05', 'active'),
(4, 'Anik Sen', '+8801842184018', 'South khulsi road no 2', '1233', 'Aniksen5895@gmail.com', 1, '../img/photo_2020-11-14_17-46-29.jpg', '2021-01-19', 'active');

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
(4, 'ba71f8e7f3b18d6bcd642a90e641b85a');

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
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categoryname`
--
ALTER TABLE `categoryname`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

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
-- Constraints for table `syslog`
--
ALTER TABLE `syslog`
  ADD CONSTRAINT `syslog_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
