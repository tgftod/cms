-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 06:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` smallint(4) UNSIGNED NOT NULL,
  `company` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `company`, `contact`, `email`, `phone`) VALUES
(1, 'test', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `customer_id` smallint(5) UNSIGNED NOT NULL,
  `ponum` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `cav` smallint(5) UNSIGNED NOT NULL,
  `core` smallint(5) UNSIGNED NOT NULL,
  `subins` smallint(5) UNSIGNED NOT NULL,
  `pin` smallint(5) UNSIGNED NOT NULL,
  `sleeve` smallint(5) UNSIGNED NOT NULL,
  `rblock` smallint(5) UNSIGNED NOT NULL,
  `sblock` smallint(5) UNSIGNED NOT NULL,
  `rndblock` smallint(5) UNSIGNED NOT NULL,
  `sbody` smallint(5) UNSIGNED NOT NULL,
  `sface` smallint(5) UNSIGNED NOT NULL,
  `die` smallint(5) UNSIGNED NOT NULL,
  `man` smallint(5) UNSIGNED NOT NULL,
  `post` smallint(5) UNSIGNED NOT NULL,
  `fixt` smallint(5) UNSIGNED NOT NULL,
  `samp` smallint(5) UNSIGNED NOT NULL,
  `descr` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `hprog` tinyint(2) NOT NULL,
  `wprog` tinyint(2) NOT NULL,
  `other` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `shipdate` date NOT NULL,
  `qtyshipped` smallint(5) UNSIGNED NOT NULL,
  `invnum` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `date`, `customer_id`, `ponum`, `cav`, `core`, `subins`, `pin`, `sleeve`, `rblock`, `sblock`, `rndblock`, `sbody`, `sface`, `die`, `man`, `post`, `fixt`, `samp`, `descr`, `hprog`, `wprog`, `other`, `price`, `shipdate`, `qtyshipped`, `invnum`, `paid`) VALUES
(20002, '2020-01-07', 0, '2b', 1, 2, 23, 4, 5, 6, 7, 8, 9, 1, 2, 3, 4, 5, 6, 'holes', 1, 2, 'blast', '15', '0000-00-00', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `company` (`company`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20003;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
