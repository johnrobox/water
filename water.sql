-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2016 at 12:54 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_firstname` varchar(100) DEFAULT NULL,
  `admin_lastname` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(250) DEFAULT NULL,
  `admin_gender` tinyint(3) DEFAULT NULL COMMENT '1-male 2-female',
  `admin_birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_password`, `admin_gender`, `admin_birthdate`) VALUES
(1, 'john robert', 'jerodiaz', 'johnrobertjerodiaz@gmail.com', '9df7a7314e3884b26222e2ccd834aa24', 1, '2015-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE IF NOT EXISTS `admin_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) NOT NULL,
  `admin_role` tinyint(7) DEFAULT NULL,
  `admin_status` tinyint(3) DEFAULT NULL,
  `admin_token` varchar(250) NOT NULL,
  `admin_last_login` datetime DEFAULT NULL,
  `admin_last_logout` datetime DEFAULT NULL,
  `admin_date_created` datetime DEFAULT NULL,
  `admin_date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `admin_id`, `admin_role`, `admin_status`, `admin_token`, `admin_last_login`, `admin_last_logout`, `admin_date_created`, `admin_date_modified`) VALUES
(1, 1, 1, 1, 'LAl3zepCv01ijeGabLkORWsmxB0mX6tWkiNGmutGiyswPPdjb9', '2016-12-11 10:51:37', NULL, '2015-10-17 01:33:07', '2015-10-17 01:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `balance_amount` double DEFAULT NULL,
  `balance_responsibility` tinyint(3) DEFAULT NULL COMMENT '1-company 2-customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `customer_id`, `balance_amount`, `balance_responsibility`) VALUES
(1, 1, 0, NULL),
(2, 2, 0, NULL),
(3, 3, 0, NULL),
(4, 4, 0, NULL),
(5, 5, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_firstname` varchar(100) DEFAULT NULL,
  `customer_middlename` varchar(200) NOT NULL,
  `customer_lastname` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_meter_no` varchar(200) NOT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_firstname`, `customer_middlename`, `customer_lastname`, `customer_email`, `customer_meter_no`, `customer_address`, `customer_contact`, `customer_birthdate`) VALUES
(2, 'Belucorass', 'Palautog', 'Belucora', NULL, '098-233-4345', 'Taga IT, unahan JP Morgans', '09334416469', '2016-09-07'),
(4, 'Jerodiaz4', 'Meguizo', 'Jerodiaz', NULL, '3445-3434-23', 'Candabong Dumanjug Cebu', '0923485485757', '2016-10-24'),
(5, '3johnrobert', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '938JJJKJKJKJkk', 'Taga tapon', '09358439593439', '2016-12-15'),
(6, '4johnrobert', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '938JJJKJKJKJ', 'Taga tapon', '09358439593439', '2016-12-15'),
(7, '5johnrobert', 'pahayahay', 'jeroidiaz', 'johnrobert@gmail.com', '938JJJKJKJKJs', 'Taga tapons', '09358439593439', '2016-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_billing`
--

CREATE TABLE IF NOT EXISTS `customer_billing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_reading_id` int(11) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_logs`
--

CREATE TABLE IF NOT EXISTS `customer_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(3) DEFAULT NULL,
  `customer_last_login` datetime DEFAULT NULL,
  `customer_last_logout` datetime DEFAULT NULL,
  `customer_status` tinyint(3) DEFAULT NULL COMMENT '0-active 1-inactive',
  `customer_date_created` datetime DEFAULT NULL,
  `customer_date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer_logs`
--

INSERT INTO `customer_logs` (`id`, `customer_id`, `customer_last_login`, `customer_last_logout`, `customer_status`, `customer_date_created`, `customer_date_modified`) VALUES
(1, 1, NULL, NULL, 1, '2016-09-28 10:26:21', NULL),
(2, 2, NULL, NULL, 0, '2016-09-28 10:27:54', NULL),
(3, 3, NULL, NULL, 1, '2016-10-13 07:12:24', NULL),
(4, 4, NULL, NULL, 0, '2016-10-13 07:21:27', NULL),
(5, 5, NULL, NULL, 1, '2016-10-22 11:41:14', NULL),
(6, 6, NULL, NULL, 0, NULL, NULL),
(7, 7, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_reading`
--

CREATE TABLE IF NOT EXISTS `customer_reading` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `customer_reading_amount` double DEFAULT NULL,
  `customer_reading_date` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_request`
--

CREATE TABLE IF NOT EXISTS `customer_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `request` longtext,
  `date_send` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `note`) VALUES
(1, 'Adona kitay dakong meeting karon umaabot nga dominggo alas 7 pasado sa buntag. Gihangyo ang tanan nga mo atend ni aning meeting , alang kini sa kauswagan sa atong mga gripo. Nahubas na akong sinag.ub');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
