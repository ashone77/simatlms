-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2021 at 07:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmodule`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonafide_cert`
--

DROP TABLE IF EXISTS `bonafide_cert`;
CREATE TABLE IF NOT EXISTS `bonafide_cert` (
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Quota` varchar(255) NOT NULL,
  `AdmssnYear` int(20) NOT NULL,
  `CurrYear` int(20) NOT NULL,
  `LoanYear` varchar(20) NOT NULL,
  `AdmssnNo` varchar(20) NOT NULL,
  `BankName` varchar(20) NOT NULL,
  `BankBranch` varchar(255) NOT NULL,
  `DocumentNumber` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`DocumentNumber`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonafide_cert`
--

INSERT INTO `bonafide_cert` (`FirstName`, `LastName`, `Department`, `Quota`, `AdmssnYear`, `CurrYear`, `LoanYear`, `AdmssnNo`, `BankName`, `BankBranch`, `DocumentNumber`) VALUES
('Karthik', 'V', 'cse', 'MGT', 2021, 2021, '1', 'RCS0000', 'Punjab national bank', 'Aluva', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
