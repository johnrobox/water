-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 11:12 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) NOT NULL,
  `admin_firstname` varchar(100) DEFAULT NULL,
  `admin_lastname` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(250) DEFAULT NULL,
  `admin_gender` tinyint(3) DEFAULT NULL COMMENT '1-male 2-female',
  `admin_birthdate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_password`, `admin_gender`, `admin_birthdate`) VALUES
(1, 'john robert', 'jerodiaz', 'johnrobertjerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '2015-10-14'),
(4, 'Grazelle', 'Villaso', 'grazellevillaso@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 2, '2017-01-26'),
(5, 'John Ro', 'Jerodiaz', 'johnrojerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '2017-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE IF NOT EXISTS `admin_logs` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `admin_role` tinyint(7) DEFAULT NULL,
  `admin_status` tinyint(3) DEFAULT NULL,
  `admin_token` varchar(250) NOT NULL,
  `admin_last_login` datetime DEFAULT NULL,
  `admin_last_logout` datetime DEFAULT NULL,
  `admin_date_created` datetime DEFAULT NULL,
  `admin_date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_id`, `admin_role`, `admin_status`, `admin_token`, `admin_last_login`, `admin_last_logout`, `admin_date_created`, `admin_date_modified`) VALUES
(1, 1, 1, 1, 'yF28CHou9U8vQEIiVK6q7yMZDUHBcakk1aENPf75QfIMLwUYPV', '2017-01-30 02:47:23', NULL, '2015-10-17 01:33:07', '2017-01-25 04:32:02'),
(4, 4, 1, 1, '', NULL, NULL, '2017-01-23 10:03:29', '2017-01-23 10:03:29'),
(5, 5, 1, 1, '', NULL, NULL, '2017-01-26 03:03:14', '2017-01-26 03:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `balance_amount` double DEFAULT NULL,
  `balance_responsibility` tinyint(3) DEFAULT NULL COMMENT '1-company 2-customer'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) NOT NULL,
  `customer_firstname` varchar(100) DEFAULT NULL,
  `customer_middlename` varchar(200) NOT NULL,
  `customer_lastname` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_meter_no` varchar(200) NOT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_birthdate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_firstname`, `customer_middlename`, `customer_lastname`, `customer_email`, `customer_meter_no`, `customer_address`, `customer_contact`, `customer_birthdate`) VALUES
(2, 'Belucorass', 'Palautog', 'Belucora', NULL, '098-233-4345', 'Taga IT, unahan JP Morgans', '09334416469', '2016-09-07'),
(4, 'Jerodiaz4', 'Meguizo', 'Jerodiaz', NULL, '3445-3434-23', 'Candabong Dumanjug Cebu', '0923485485757', '2016-10-24'),
(5, '33johnroberts', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '12345', 'Taga tapon', '09358439593439', '2016-12-15'),
(6, '4johnrobert', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '938JJJKJKJKJ', 'Taga tapon', '09358439593439', '2016-12-15'),
(7, '5johnrobert', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '938JJJKJKJKJs', 'Taga tapons', '09358439593439', '2016-12-15'),
(8, 'Lando', 'Nga', 'Landa', NULL, '1234567', 'Taga amoang bukid', '09567495348', '2017-01-11'),
(9, 'Gika', 'Duha', 'Ug Insert', NULL, '12345678', 'dre ras office', '890234234', '2017-01-10'),
(10, 'Walay', 'Cache', 'Dre Dapit', NULL, '23456789', 'Taga dre ra dapita', '923849539', '2017-01-04'),
(11, 'jkjkj', 'kjkjkljklj', 'jkljkljkljkj', NULL, 'kjkljkljkljkl', 'jkljkljkljk', 'kjkljkljkljj', '2017-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `customer_billing`
--

CREATE TABLE IF NOT EXISTS `customer_billing` (
  `id` bigint(20) NOT NULL,
  `customer_reading_id` int(11) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_billing`
--

INSERT INTO `customer_billing` (`id`, `customer_reading_id`, `paid_amount`, `paid_date`) VALUES
(1, 5, 455, '2016-12-28 05:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `customer_logs`
--

CREATE TABLE IF NOT EXISTS `customer_logs` (
  `id` bigint(20) NOT NULL,
  `customer_id` int(3) DEFAULT NULL,
  `customer_last_login` datetime DEFAULT NULL,
  `customer_last_logout` datetime DEFAULT NULL,
  `customer_status` tinyint(3) DEFAULT NULL COMMENT '0-active 1-inactive',
  `customer_date_created` datetime DEFAULT NULL,
  `customer_date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_logs`
--

INSERT INTO `customer_logs` (`id`, `customer_id`, `customer_last_login`, `customer_last_logout`, `customer_status`, `customer_date_created`, `customer_date_modified`) VALUES
(1, 1, NULL, NULL, 1, '2016-09-28 10:26:21', NULL),
(2, 2, NULL, NULL, 0, '2016-09-28 10:27:54', NULL),
(3, 3, NULL, NULL, 1, '2016-10-13 07:12:24', NULL),
(4, 4, NULL, NULL, 1, '2016-10-13 07:21:27', NULL),
(5, 5, NULL, NULL, 0, '2016-10-22 11:41:14', NULL),
(6, 6, NULL, NULL, 0, NULL, NULL),
(7, 7, NULL, NULL, 1, NULL, NULL),
(8, 8, NULL, NULL, 1, '2016-12-19 02:46:53', NULL),
(10, 9, NULL, NULL, 1, '2017-01-26 11:57:41', NULL),
(11, 10, NULL, NULL, 0, '2017-01-26 12:00:34', NULL),
(12, 11, NULL, NULL, 1, '2017-01-26 05:05:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_reading`
--

CREATE TABLE IF NOT EXISTS `customer_reading` (
  `id` bigint(20) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_reading_amount` double DEFAULT NULL,
  `customer_reading_date` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_reading`
--

INSERT INTO `customer_reading` (`id`, `customer_id`, `customer_reading_amount`, `customer_reading_date`) VALUES
(1, 2, 12, '9-2016'),
(2, 5, 444, '9-2016'),
(3, 5, 111, '10-2016'),
(4, 5, 222, '11-2016'),
(5, 5, 333, '12-2016'),
(6, 5, 0, '01-2017'),
(7, 5, 43, '01-2017'),
(8, 5, 34, '01-2017'),
(9, 5, 45, '01-2017');

-- --------------------------------------------------------

--
-- Table structure for table `customer_readings`
--

CREATE TABLE IF NOT EXISTS `customer_readings` (
  `id` bigint(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_reading_amount` double NOT NULL,
  `customer_reading_date` datetime NOT NULL,
  `customer_reading_month_cover` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_billing_amount` double(10,0) NOT NULL,
  `customer_billing_flag` tinyint(2) NOT NULL DEFAULT '0',
  `customer_payment_date` datetime NOT NULL,
  `customer_readed_by` int(11) NOT NULL,
  `customer_updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_readings`
--

INSERT INTO `customer_readings` (`id`, `customer_id`, `customer_reading_amount`, `customer_reading_date`, `customer_reading_month_cover`, `customer_billing_amount`, `customer_billing_flag`, `customer_payment_date`, `customer_readed_by`, `customer_updated_by`) VALUES
(43, 5, 34, '2017-01-30 05:31:27', '01-2017', 0, 0, '0000-00-00 00:00:00', 1, 1),
(44, 6, 22.33, '2017-01-30 05:41:59', '01-2017', 0, 0, '0000-00-00 00:00:00', 1, 0),
(45, 7, 55, '2017-01-30 05:42:38', '01-2017', 0, 0, '0000-00-00 00:00:00', 1, 1),
(46, 2, 88, '2017-01-30 05:43:45', '01-2017', 0, 0, '0000-00-00 00:00:00', 1, 0),
(47, 9, 45, '2017-01-30 06:08:06', '01-2017', 0, 0, '0000-00-00 00:00:00', 1, 0),
(48, 4, 34, '2017-01-30 06:08:20', '01-2017', 0, 0, '0000-00-00 00:00:00', 1, 0),
(49, 11, 77.99, '2017-01-30 06:08:42', '01-2017', 0, 0, '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_request`
--

CREATE TABLE IF NOT EXISTS `customer_request` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `request` longtext,
  `date_send` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_request`
--

INSERT INTO `customer_request` (`id`, `customer_id`, `request`, `date_send`) VALUES
(1, 1, 'Naputol akong tubo dapit sa among CR.. .kinang lan jud ni ayohon sa madali nga panahon kay hinay kaayo ang supply dre sa akong lababo..', '2015-12-09 06:23:52'),
(2, 2, 'Pyd ko texan ninyo ug pila nalang akong balance sa tubig ?', '2015-12-09 06:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL,
  `note` longtext
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `note`) VALUES
(1, 'Adona kitay dakong meeting karon umaabot nga dominggo alas 7 pasado sa buntag. Gihangyo ang tanan nga mo atend ni aning meeting , alang kini sa kauswagan sa atong mga gripo. Nahubas na akong sinag.ub');

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
-- Indexes for table `customer_billing`
--
ALTER TABLE `customer_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_logs`
--
ALTER TABLE `customer_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reading`
--
ALTER TABLE `customer_reading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_readings`
--
ALTER TABLE `customer_readings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_request`
--
ALTER TABLE `customer_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customer_billing`
--
ALTER TABLE `customer_billing`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer_logs`
--
ALTER TABLE `customer_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer_reading`
--
ALTER TABLE `customer_reading`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer_readings`
--
ALTER TABLE `customer_readings`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `customer_request`
--
ALTER TABLE `customer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
