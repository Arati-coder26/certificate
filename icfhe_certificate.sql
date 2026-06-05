-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 05:20 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icfhe_certificate`
--

-- --------------------------------------------------------

--
-- Table structure for table `individual_member`
--

CREATE TABLE `individual_member` (
  `id` int(11) NOT NULL,
  `u_id` varchar(30) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `designation` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `satus` varchar(100) NOT NULL COMMENT '	Approve=Approve | Pending=Pending    '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `individual_member`
--

INSERT INTO `individual_member` (`id`, `u_id`, `member_name`, `email`, `dob`, `designation`, `organisation`, `phone`, `country`, `state`, `city`, `street`, `pincode`, `join_date`, `expiry_date`, `payment_mode`, `reference`, `issue_date`, `satus`) VALUES
(49, 'SSZBDX56KS4V', 'Divya sharma', 'divayasharma@gmail.com', '1988-11-11', 'Doctor', 'Aiims', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2018-06-13', '2020-06-16', 'online', 'Internet', '2020-04-06', 'Approve'),
(50, 'KKZZTT', 'Ayush kumar', 'ayush@gmail.com', '2003-05-26', 'Doctor', 'Aiims', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2018-07-11', '2020-07-09', 'online', 'Internet', '2020-04-07', 'Approve'),
(56, '', 'Sindhu', 'sindhumahato@gmail.com', '1990-04-22', 'Doctor', 'Ferrytech', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2018-10-17', '2020-10-08', 'online', 'Internet', '2020-04-07', 'Approve'),
(57, '', 'Divya sharma', 'divayasharma@gmail.com', '1992-10-21', 'Doctor', 'Aiims', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2018-06-13', '2020-06-11', 'online', 'Internet', '2020-04-16', 'Approve'),
(58, '', 'Dimple', 'dimples@gmail.com', '1992-12-12', 'Surgeon', 'Fortis', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2017-08-30', '2020-08-28', 'online', 'Internet', '2020-04-02', 'Approve'),
(64, '', 'Richa chadda', 'richachadda@gmail.com', '1970-01-22', 'Surgeon', 'Aiims', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2017-08-16', '2020-01-14', 'online', 'Internet', '2020-04-07', 'Approve'),
(65, '', 'Richa Singh', 'divayasharma@gmail.com', '0000-00-00', 'Doctor', 'Aiims', '9898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '0000-00-00', '0000-00-00', 'online', 'Internet', '0000-00-00', 'Approve'),
(69, '', 'clarion', 'divayasharma@gmail.com', '1994-07-20', 'CTO', 'Aiims', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2018-07-18', '2020-07-16', 'offline', 'Friend', '2020-04-04', 'Pending'),
(71, '5FU94T738R', 'Neha p', 'neha@mixorg', '1995-07-12', 'Graphic Designer', 'Mixorg', '09898776653', 'India', 'Delhi', 'New Delhi', 'street', '110063', '2017-08-17', '2020-01-17', 'online', 'Internet', '2020-04-01', 'Approve'),
(72, '7828731022', 'Swati sharma', 'shwatisharma@gmail.com', '1992-07-09', 'Doctor', 'Nice', '09898776653', 'Delhi', 'Delhi', 'New Delhi', 'street', '110063', '2019-07-17', '2020-01-16', 'online', 'Internet', '2020-04-23', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `institutional_member`
--

CREATE TABLE `institutional_member` (
  `id` int(11) NOT NULL,
  `u_id` varchar(30) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `organisation_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `upload` varchar(255) NOT NULL,
  `satus` varchar(100) NOT NULL COMMENT 'Approve=Approve | Pending=Pending    '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institutional_member`
--

INSERT INTO `institutional_member` (`id`, `u_id`, `member_name`, `organisation_name`, `email`, `phone`, `country`, `state`, `city`, `street`, `pincode`, `join_date`, `expiry_date`, `payment_mode`, `reference`, `issue_date`, `upload`, `satus`) VALUES
(18, '', 'Neha p', 'Mixorg', 'neha@mixorg', '09898776653', 'India', 'Delhi', 'New Delhi', 'delhi', '110063', '2018-07-11', '2020-07-09', 'online', 'Internet', '2020-04-06', '', 'Approve'),
(19, '', 'clarion', 'Mixorg', 'clarion@mixorg.com', '09898776653', 'India', 'Delhi', 'New Delhi', 'delhi', '110063', '2019-05-10', '2021-05-08', 'online', 'Internet', '2020-04-07', '', 'Approve'),
(20, '', 'clarion', 'Mixorg', 'clarion@mixorg.com', '09898776653', 'India', 'Delhi', 'New Delhi', 'delhi', '110063', '2018-06-15', '2020-06-17', 'offline', 'Internet', '2020-04-06', '', 'Pending'),
(21, '78VSL5Y1K1', 'Richa chadda', 'Aiims', 'richachadda@gmail.com', '09898776653', 'India', 'Delhi', 'New Delhi', 'delhi', '110063', '2017-08-01', '2020-01-09', 'online', 'Internet', '2020-04-23', '', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'Admin=Admin | Editor=Editor	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`) VALUES
(5, 'ashish', 'ashsihk@gmail.com', '3a3a3baa0cf0fdc6bebf5f1f127e3f56', 'Admin'),
(6, 'Sindhu Mahato', 'sindhumahato@gmail.com', '2ace8bcfbdd81f60ee5f53e778c0f70e', 'Editor'),
(8, 'dimple', 'dimples@gmail.com', '72dc1531683f719f08722589d44adc17', ''),
(10, 'kritikasharma', 'kritikasharma@gmail.com', 'd98ce759d86ce4570314367a10820568', 'Editor'),
(11, 'clarion', 'clarion@mixorg.com', 'add472bc0b20fd8df458fa1e67eeda68', 'Editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `individual_member`
--
ALTER TABLE `individual_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutional_member`
--
ALTER TABLE `institutional_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `individual_member`
--
ALTER TABLE `individual_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `institutional_member`
--
ALTER TABLE `institutional_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
