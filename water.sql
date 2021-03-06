-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 07, 2017 at 11:31 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `admin_firstname` varchar(100) DEFAULT NULL,
  `admin_lastname` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(250) DEFAULT NULL,
  `admin_gender` tinyint(3) DEFAULT NULL COMMENT '1-male 2-female',
  `admin_birthdate` date DEFAULT NULL,
  `admin_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_password`, `admin_gender`, `admin_birthdate`, `admin_image`) VALUES
(1, 'john robert', 'jerodiaz', 'johnrobertjerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '2015-10-14', 'avatar1.jpg'),
(4, 'Grazelle', 'Villaso', 'grazellevillaso@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 2, '2017-01-26', ''),
(5, 'John Ro', 'Jerodiaz', 'johnrojerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '2017-01-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `admin_role` tinyint(7) DEFAULT NULL,
  `admin_status` tinyint(3) DEFAULT '0',
  `admin_token` varchar(250) NOT NULL,
  `admin_last_login` datetime DEFAULT NULL,
  `admin_last_logout` datetime DEFAULT NULL,
  `admin_date_created` datetime DEFAULT NULL,
  `admin_date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_id`, `admin_role`, `admin_status`, `admin_token`, `admin_last_login`, `admin_last_logout`, `admin_date_created`, `admin_date_modified`) VALUES
(1, 1, 1, 1, 'Jsp91N5fqpmSoJ2d6uLafNihoHsaGS7qkwzmkFBK4YDtIGGPas', '2017-03-07 10:25:02', NULL, '2015-10-17 01:33:07', '2017-01-25 04:32:02'),
(4, 4, 1, 1, '', NULL, NULL, '2017-01-23 10:03:29', '2017-01-23 10:03:29'),
(5, 5, 1, 1, '', NULL, NULL, '2017-01-26 03:03:14', '2017-01-26 03:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `balance_amount` double DEFAULT NULL,
  `balance_responsibility` tinyint(3) DEFAULT NULL COMMENT '1-company 2-customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `customer_id`, `balance_amount`, `balance_responsibility`) VALUES
(1, 1, 0, NULL),
(2, 2, 0, NULL),
(3, 3, 0, NULL),
(4, 4, 0, NULL),
(5, 5, -122, NULL),
(6, 8, 0, NULL),
(7, 8, 0, NULL),
(8, 9, 0, NULL),
(9, 10, 0, NULL),
(10, 11, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `customer_firstname` varchar(100) DEFAULT NULL,
  `customer_middlename` varchar(200) NOT NULL,
  `customer_lastname` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_meter_no` varchar(200) NOT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_firstname`, `customer_middlename`, `customer_lastname`, `customer_email`, `customer_meter_no`, `customer_address`, `customer_contact`, `customer_birthdate`) VALUES
(2, 'Belucorass', 'Palautog', 'Belucora', NULL, '098-233-4345', 'Taga IT, unahan JP Morgans', '09334416469', '2016-09-07'),
(4, 'Jerodiaz4', 'Meguizo', 'Jerodiaz', NULL, '3445-3434-23', 'Candabong Dumanjug Cebu', '0923485485757', '2016-10-24'),
(5, 'johnroberts', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '12345', 'Taga tapon', '09358439593439', '2016-12-15'),
(6, 'johnrobert', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '938JJJKJKJKJ', 'Taga tapon', '09358439593439', '2016-12-15'),
(7, 'johnrobert', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '938JJJKJKJKJs', 'Taga tapons', '09358439593439', '2016-12-15'),
(8, 'Landossssssssssssssssssssss', 'Nga', 'Landa', NULL, '1234567', 'Taga amoang bukid', '09567495348', '2017-01-11'),
(9, 'Gika', 'Duha', 'Ug Insert', NULL, '12345678', 'dre ras office', '890234234', '2017-01-10'),
(10, 'Walay', 'Cache', 'Dre Dapit', NULL, '23456789', 'Taga dre ra dapita', '923849539', '2017-01-04'),
(11, 'jkjkj', 'kjkjkljklj', 'jkljkljkljkj', NULL, 'kjkljkljkljkl', 'jkljkljkljk', 'kjkljkljkljj', '2017-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `customer_logs`
--

CREATE TABLE `customer_logs` (
  `id` bigint(20) NOT NULL,
  `customer_id` int(3) DEFAULT NULL,
  `customer_last_login` datetime DEFAULT NULL,
  `customer_last_logout` datetime DEFAULT NULL,
  `customer_status` tinyint(3) DEFAULT NULL COMMENT '0-active 1-inactive',
  `customer_date_created` datetime DEFAULT NULL,
  `customer_date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_logs`
--

INSERT INTO `customer_logs` (`id`, `customer_id`, `customer_last_login`, `customer_last_logout`, `customer_status`, `customer_date_created`, `customer_date_modified`) VALUES
(1, 1, NULL, NULL, 1, '2016-09-28 10:26:21', NULL),
(2, 2, NULL, NULL, 1, '2016-09-28 10:27:54', NULL),
(3, 3, NULL, NULL, 1, '2016-10-13 07:12:24', NULL),
(4, 4, NULL, NULL, 1, '2016-10-13 07:21:27', NULL),
(5, 5, NULL, NULL, 1, '2016-10-22 11:41:14', NULL),
(6, 6, NULL, NULL, 0, NULL, NULL),
(7, 7, NULL, NULL, 1, NULL, NULL),
(8, 8, NULL, NULL, 1, '2016-12-19 02:46:53', NULL),
(10, 9, NULL, NULL, 1, '2017-01-26 11:57:41', NULL),
(11, 10, NULL, NULL, 0, '2017-01-26 12:00:34', NULL),
(12, 11, NULL, NULL, 0, '2017-01-26 05:05:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_readings`
--

CREATE TABLE `customer_readings` (
  `id` bigint(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_reading_amount` double(65,2) NOT NULL,
  `customer_reading_cubic` double(65,2) NOT NULL,
  `customer_reading_per_cubic` double(65,2) NOT NULL,
  `customer_reading_minimum` double(65,2) NOT NULL,
  `customer_reading_date` datetime NOT NULL,
  `customer_reading_month_cover` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_billing_amount` double(65,2) NOT NULL,
  `customer_billing_flag` tinyint(2) NOT NULL DEFAULT '0',
  `customer_billing_date` datetime NOT NULL,
  `customer_readed_by` int(11) NOT NULL,
  `customer_updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_readings`
--

INSERT INTO `customer_readings` (`id`, `customer_id`, `customer_reading_amount`, `customer_reading_cubic`, `customer_reading_per_cubic`, `customer_reading_minimum`, `customer_reading_date`, `customer_reading_month_cover`, `customer_billing_amount`, `customer_billing_flag`, `customer_billing_date`, `customer_readed_by`, `customer_updated_by`) VALUES
(77, 5, 223423.00, 0.00, 0.00, 0.00, '2017-01-31 04:27:49', '01-2017', 223423.00, 1, '2017-01-31 04:47:21', 1, 0),
(78, 6, 2323.00, 0.00, 0.00, 0.00, '2017-01-31 04:27:51', '01-2017', 2323.00, 1, '2017-02-03 06:04:18', 1, 0),
(79, 7, 34.00, 0.00, 0.00, 0.00, '2017-01-31 04:33:04', '01-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(80, 2, 8989.00, 0.00, 0.00, 0.00, '2017-01-31 04:33:08', '01-2017', 0.00, 0, '2017-02-03 03:51:53', 1, 0),
(81, 9, 0.00, 0.00, 0.00, 0.00, '2017-01-31 04:34:04', '01-2017', 0.00, 1, '2017-01-31 04:47:34', 1, 0),
(82, 4, 23232.00, 0.00, 0.00, 0.00, '2017-01-31 04:39:10', '01-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(83, 11, 23.34, 0.00, 0.00, 0.00, '2017-01-31 04:39:58', '01-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(84, 8, 344.00, 0.00, 0.00, 0.00, '2017-01-31 04:41:24', '01-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(85, 10, 5555.00, 0.00, 0.00, 0.00, '2017-01-31 04:41:46', '01-2017', 5555.00, 1, '2017-01-31 04:48:21', 1, 0),
(86, 2, 45.00, 0.00, 0.00, 0.00, '2017-01-31 05:37:10', '12-2016', 0.00, 0, '2017-02-03 03:51:46', 1, 0),
(87, 2, 677.00, 0.00, 0.00, 0.00, '2017-01-31 05:37:20', '11-2016', 0.00, 0, '2017-01-31 05:38:35', 1, 0),
(88, 2, 344.00, 0.00, 0.00, 0.00, '2017-01-31 05:37:30', '10-2016', 0.00, 0, '2017-01-31 05:38:22', 1, 0),
(89, 2, 665.98, 0.00, 0.00, 0.00, '2017-01-31 05:37:44', '09-2016', 0.00, 0, '2017-01-31 05:38:13', 1, 0),
(90, 2, 12.00, 0.00, 0.00, 0.00, '2017-02-03 04:04:41', '01-2016', 12.00, 1, '2017-02-03 04:07:42', 1, 0),
(91, 2, 23.00, 0.00, 0.00, 0.00, '2017-02-03 04:04:55', '02-2016', 23.00, 1, '2017-02-03 04:08:10', 1, 0),
(92, 2, 56.00, 0.00, 0.00, 0.00, '2017-02-03 04:05:07', '03-2016', 56.00, 1, '2017-02-03 04:08:24', 1, 0),
(93, 2, 67.00, 0.00, 0.00, 0.00, '2017-02-03 04:05:41', '04-2016', 67.00, 1, '2017-02-06 10:48:39', 1, 0),
(94, 2, 45.00, 0.00, 0.00, 0.00, '2017-02-03 04:05:55', '05-2016', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(95, 2, 899.00, 0.00, 0.00, 0.00, '2017-02-03 04:06:07', '06-2016', 899.00, 1, '2017-02-03 04:09:35', 1, 0),
(96, 2, 23.00, 0.00, 0.00, 0.00, '2017-02-03 04:06:15', '07-2016', 23.00, 1, '2017-02-03 04:09:20', 1, 0),
(97, 2, 677.00, 0.00, 0.00, 0.00, '2017-02-03 04:06:24', '08-2016', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(98, 2, 4.00, 0.00, 0.00, 0.00, '2017-02-16 05:15:29', '02-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(99, 2, 300.00, 3.00, 25.00, 300.00, '2017-03-07 03:51:29', '03-2017', 300.00, 1, '2017-03-07 04:29:03', 1, 0),
(100, 9, 300.00, 6.00, 25.00, 300.00, '2017-03-07 03:51:37', '03-2017', 300.00, 1, '2017-03-07 04:29:15', 1, 0),
(101, 4, 300.00, 7.00, 25.00, 300.00, '2017-03-07 03:51:42', '03-2017', 300.00, 1, '2017-03-07 04:29:27', 1, 0),
(102, 7, 300.00, 9.00, 25.00, 300.00, '2017-03-07 03:51:46', '03-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(103, 5, 850.00, 34.00, 25.00, 300.00, '2017-03-07 03:51:51', '03-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(104, 8, 325.00, 13.00, 25.00, 300.00, '2017-03-07 03:52:12', '03-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(105, 2, 300.00, 2.00, 25.00, 300.00, '2017-03-07 04:06:39', '04-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(106, 9, 300.00, 6.00, 25.00, 300.00, '2017-03-07 04:07:41', '04-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(107, 4, 900.00, 36.00, 25.00, 300.00, '2017-03-07 04:08:47', '04-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(108, 7, 300.00, 5.00, 25.00, 300.00, '2017-03-07 04:10:32', '04-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(109, 5, 300.00, 6.00, 25.00, 300.00, '2017-03-07 04:10:44', '04-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(110, 8, 1675.00, 67.00, 25.00, 300.00, '2017-03-07 04:10:47', '04-2017', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(111, 2, 850.00, 34.00, 25.00, 300.00, '2017-03-07 04:23:20', '04-2015', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(112, 9, 850.00, 34.00, 25.00, 300.00, '2017-03-07 04:24:27', '04-2015', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(113, 4, 1100.00, 44.00, 25.00, 300.00, '2017-03-07 04:24:56', '04-2015', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(114, 7, 105850.00, 4234.00, 25.00, 300.00, '2017-03-07 04:25:49', '04-2015', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(115, 5, 1375.00, 55.00, 25.00, 300.00, '2017-03-07 04:26:21', '04-2015', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(116, 8, 16650.00, 666.00, 25.00, 300.00, '2017-03-07 04:27:25', '04-2015', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(117, 2, 901.00, 9.01, 100.00, 300.00, '2017-03-07 04:31:55', '04-2014', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(118, 9, 1650.00, 66.00, 25.00, 300.00, '2017-03-07 04:31:58', '04-2014', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(119, 4, 300.00, 3.00, 25.00, 300.00, '2017-03-07 04:32:01', '04-2014', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(120, 7, 1350.00, 45.00, 30.00, 300.00, '2017-03-07 04:32:24', '04-2014', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(121, 5, 1320.00, 44.00, 30.00, 300.00, '2017-03-07 04:44:22', '04-2014', 0.00, 0, '0000-00-00 00:00:00', 1, 0),
(122, 8, 300.00, 2.00, 30.00, 300.00, '2017-03-07 04:45:02', '04-2014', 0.00, 0, '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_requests`
--

CREATE TABLE `customer_requests` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `request` longtext,
  `date_send` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `note` longtext CHARACTER SET latin1,
  `created_by` int(50) NOT NULL,
  `modified_by` int(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `note`, `created_by`, `modified_by`, `date_created`, `date_modified`, `status`) VALUES
(3, 'sdfsdfsd', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 'sdfs1111111111111111111111111111', 1, 1, '0000-00-00 00:00:00', '2017-02-16 04:08:58', 1),
(15, 'john rnsdfsd121212121', 1, 1, '0000-00-00 00:00:00', '2017-02-15 10:41:11', 1),
(16, 'sdfsdfs', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(19, 'sdfsdfsdf', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(20, 'sdfsdfsdfsdf', 1, 0, '2017-02-15 10:40:30', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `value` double(65,2) NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `type`, `value`, `date_modified`, `status`) VALUES
(1, 1, 30.00, '0000-00-00 00:00:00', 1),
(2, 2, 300.00, '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_logs`
--
ALTER TABLE `customer_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_readings`
--
ALTER TABLE `customer_readings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_requests`
--
ALTER TABLE `customer_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer_logs`
--
ALTER TABLE `customer_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer_readings`
--
ALTER TABLE `customer_readings`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `customer_requests`
--
ALTER TABLE `customer_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
