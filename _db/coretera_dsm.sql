-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2019 at 12:16 PM
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
  `content_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `content_name`, `content_extension`, `content_url`, `content_datetime`) VALUES
(1, 'html_simple', 'zip', 'contents/html/', '2019-09-05 10:43:20');

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
  `device_group_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`device_id`, `device_name`, `device_imei`, `device_status_id`, `device_datetime`, `device_group_id`) VALUES
(1, 'test', '123', 0, '2019-09-05 10:43:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `device_group`
--

CREATE TABLE `device_group` (
  `device_group_id` int(2) NOT NULL,
  `device_group_name` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `device_group_content_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `device_group`
--

INSERT INTO `device_group` (`device_group_id`, `device_group_name`, `device_group_content_id`) VALUES
(1, 'A', 1);

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
  `users_id` int(11) NOT NULL,
  `users_phoneNumber` varchar(10) COLLATE utf8_thai_520_w2 NOT NULL,
  `users_email` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `users_name` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `users_pass` varchar(20) COLLATE utf8_thai_520_w2 NOT NULL,
  `users_status_id` int(1) NOT NULL,
  `users_dateTime` datetime NOT NULL,
  `users_package_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_phoneNumber`, `users_email`, `users_name`, `users_pass`, `users_status_id`, `users_dateTime`, `users_package_id`) VALUES
(2, '0501234567', 'test@test.com', 'admin', 'inmad', 0, '2019-09-06 13:41:57', 1);

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
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `device_group`
--
ALTER TABLE `device_group`
  MODIFY `device_group_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
