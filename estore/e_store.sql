-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 03:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobile_desc`
--

CREATE TABLE `mobile_desc` (
  `pid` int(11) NOT NULL,
  `model_no` varchar(50) DEFAULT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `processor` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `screen_size` varchar(50) DEFAULT NULL,
  `storage` varchar(50) DEFAULT NULL,
  `front_cam` varchar(50) DEFAULT NULL,
  `back_cam` varchar(50) DEFAULT NULL,
  `battery_backup` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobile_desc`
--

INSERT INTO `mobile_desc` (`pid`, `model_no`, `c_name`, `processor`, `ram`, `screen_size`, `storage`, `front_cam`, `back_cam`, `battery_backup`) VALUES
(1001, 'MXTYXA/VB', 'Apple', '', '4GB', '', '64GB', '12MP', '12MP+12MP', '15hr'),
(1002, ' MN8X2HN/A', 'Apple', '2.34GHz quad-core', '2GB', ' 11.94 cm (4.7 inch)', '32GB', '7MP', '12MP', '14hr'),
(1003, 'MN8X2HN/A', 'Apple', '2.34GHz quad-core', '4GB', ' 11.94 cm (4.7 inch)', '64GB', '7MP', '12MP', '14hr'),
(1004, 'MX9R2HN/A', 'Apple', 'one-core', '2GB', ' 11.94 cm (4.7 inch)', '16GB', '1.2MP', '12MP', '14hr'),
(1005, 'MN0W2HN/A', 'Apple', 'Dual Core', '2GB', ' 11.94 cm (4.7 inch)', '32GB', '5MP', '12MP', '12hr');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `pid` int(11) NOT NULL,
  `pname` varchar(40) DEFAULT NULL,
  `ptype` varchar(40) DEFAULT NULL,
  `pprice` int(11) DEFAULT NULL,
  `pimage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`pid`, `pname`, `ptype`, `pprice`, `pimage`) VALUES
(1001, 'apple  11', 'mobile', 12100, 'm_image/iphone11.jpg'),
(1002, 'Iphone7', 'mobile', 23555, 'm_image/iphone7p.jpg'),
(1003, 'Iphone7g', 'mobile', 35999, 'm_image/iphone7g.jpg'),
(1004, 'Iphonse', 'mobile', 45000, 'm_image/iphonese.jpg'),
(1005, 'Iphone6s', 'mobile', 34000, 'm_image/iphon6s.jpg'),
(1006, 'Iphone 7 Plus', 'mobile', 45000, 'm_image/iphone7p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `name` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `query` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `email`, `password`, `gender`, `dob`, `phone`, `role`) VALUES
('abc', 'abc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', '2000-09-13', 789456, 'admin'),
('client', 'client@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', '1980-09-08', 1597532486, 'client'),
('emp', 'emp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'male', '2015-04-13', 789456123, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobile_desc`
--
ALTER TABLE `mobile_desc`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
