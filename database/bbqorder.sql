-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2019 at 11:42 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbqorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderid` int(11) NOT NULL,
  `itemid1` varchar(10) NOT NULL,
  `qty1` int(11) NOT NULL,
  `itemid2` varchar(10) DEFAULT NULL,
  `qty2` int(11) DEFAULT NULL,
  `itemid3` varchar(10) DEFAULT NULL,
  `qty3` int(11) DEFAULT NULL,
  `itemid4` varchar(10) DEFAULT NULL,
  `qty4` int(11) DEFAULT NULL,
  `itemid5` varchar(10) DEFAULT NULL,
  `qty5` int(11) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderid`),
  KEY `bbqorderdetails_fk2` (`itemid1`),
  KEY `bbqorderdetails_fk3` (`itemid2`),
  KEY `bbqorderdetails_fk4` (`itemid3`),
  KEY `bbqorderdetails_fk5` (`itemid4`),
  KEY `bbqorderdetails_fk6` (`itemid5`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderid`, `itemid1`, `qty1`, `itemid2`, `qty2`, `itemid3`, `qty3`, `itemid4`, `qty4`, `itemid5`, `qty5`, `remarks`, `created_on`) VALUES
(1, 'bbq01', 2, 'bbq03', 1, 'bbq05', 2, 'bbq02', 3, 'bbq04', 5, '', '2019-03-17 10:45:35'),
(2, 'bbq01', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Contact 93208372 Carrot for collection', '2019-03-17 10:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(80) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `startpoint` varchar(80) NOT NULL,
  `endpoint` varchar(80) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` varchar(15) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `cname`, `phone`, `email`, `startpoint`, `endpoint`, `delivery_date`, `delivery_time`) VALUES
(1, 'Apple', 91234567, 'apple@hotmail.com', '80 Stamford Rd, Singapore 178902', 'Avant Parc, 9 Wak Hassan Place', '2019-10-10', '0800-1000'),
(2, 'Banana', 92224588, 'banana@gmail.com', '80 Stamford Rd, Singapore 178902', 'Avant Parc, 9 Wak Hassan Place', '2019-05-30', '1500-1700');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
