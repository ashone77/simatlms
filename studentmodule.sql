-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 07:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

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

CREATE TABLE `bonafide_cert` (
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Quota` varchar(255) NOT NULL,
  `AdmssnYear` varchar(20) NOT NULL,
  `CurrYear` varchar(20) NOT NULL,
  `LoanYear` varchar(20) NOT NULL,
  `AdmssnNo` varchar(20) NOT NULL,
  `BankName` varchar(20) NOT NULL,
  `BankBranch` varchar(255) NOT NULL,
  `DocumentNumber` varchar(255) DEFAULT NULL,
  `DateTime` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonafide_cert`
--

INSERT INTO `bonafide_cert` (`FirstName`, `LastName`, `Department`, `Quota`, `AdmssnYear`, `CurrYear`, `LoanYear`, `AdmssnNo`, `BankName`, `BankBranch`, `DocumentNumber`, `DateTime`, `id`) VALUES
('ds', 'sd', 'cse', 'MGT', '2021', '2021', '1', 'sd', 'sd', 'sd', '0', '0000-00-00 00:00:00', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonafide_cert`
--
ALTER TABLE `bonafide_cert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonafide_cert`
--
ALTER TABLE `bonafide_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
