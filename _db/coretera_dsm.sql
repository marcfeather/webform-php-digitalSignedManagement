-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 12:20 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coretera_dsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `content_id` int(11) NOT NULL,
  `content_name` varchar(500) COLLATE utf8_thai_520_w2 NOT NULL,
  `content_extension` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL,
  `content_url` varchar(500) COLLATE utf8_thai_520_w2 NOT NULL,
  `content_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `device_name` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `device_imei` varchar(15) COLLATE utf8_thai_520_w2 NOT NULL,
  `device_status_id` int(1) NOT NULL,
  `device_datetime` datetime NOT NULL,
  `device_group_id` int(2) NOT NULL,
  `device_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

-- --------------------------------------------------------

--
-- Table structure for table `device_group`
--

CREATE TABLE `device_group` (
  `device_group_id` int(2) NOT NULL,
  `device_group_name` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `device_group_content_id` int(1) NOT NULL,
  `device_group_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

-- --------------------------------------------------------

--
-- Table structure for table `ms_device_status`
--

CREATE TABLE `ms_device_status` (
  `device_status_id` int(11) NOT NULL,
  `device_status_name` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `ms_device_status`
--

INSERT INTO `ms_device_status` (`device_status_id`, `device_status_name`) VALUES
(0, 'pending'),
(1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) COLLATE utf8_thai_520_w2 NOT NULL,
  `package_permission_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `package_permission_id`) VALUES
(1, 'Trial', 1),
(2, 'Package A', 2),
(3, 'Package B', 3),
(4, 'Package C', 4);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `add_client` int(11) NOT NULL,
  `add_group` int(11) NOT NULL,
  `add_html` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `add_client`, `add_group`, `add_html`) VALUES
(1, 1, 1, 1),
(2, 10, 5, 5),
(3, 50, 50, 50),
(4, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_phoneNumber` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL,
  `user_email` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `user_name` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `user_pass` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `user_status_id` int(1) NOT NULL,
  `user_dateTime` datetime NOT NULL,
  `user_package_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_phoneNumber`, `user_email`, `user_name`, `user_pass`, `user_status_id`, `user_dateTime`, `user_package_id`) VALUES
(4, '0501234567', 'test@test.com', 'admin', 'inmad', 1, '2019-09-09 15:20:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `device_group`
--
ALTER TABLE `device_group`
  ADD PRIMARY KEY (`device_group_id`);

--
-- Indexes for table `ms_device_status`
--
ALTER TABLE `ms_device_status`
  ADD PRIMARY KEY (`device_status_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `device_group`
--
ALTER TABLE `device_group`
  MODIFY `device_group_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
