-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 09, 2021 at 10:48 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `srno` int(11) NOT NULL,
  `id` varchar(500) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `statuss` varchar(150) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `invoice_id` varchar(300) NOT NULL,
  `international` varchar(150) NOT NULL,
  `method` varchar(150) NOT NULL,
  `amount_refunded` varchar(100) NOT NULL,
  `refund_status` varchar(100) NOT NULL,
  `captured` varchar(100) NOT NULL,
  `description` varchar(350) NOT NULL,
  `card_id` varchar(150) NOT NULL,
  `bank` varchar(200) NOT NULL,
  `wallet` varchar(150) NOT NULL,
  `vpa` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `notes` varchar(500) NOT NULL,
  `address` varchar(300) NOT NULL,
  `fee` int(100) NOT NULL,
  `tax` int(100) NOT NULL,
  `error_code` varchar(200) NOT NULL,
  `error_description` varchar(200) NOT NULL,
  `error_source` varchar(200) NOT NULL,
  `error_step` varchar(200) NOT NULL,
  `error_reason` varchar(200) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `created_at` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`srno`, `id`, `entity`, `amount`, `currency`, `statuss`, `order_id`, `invoice_id`, `international`, `method`, `amount_refunded`, `refund_status`, `captured`, `description`, `card_id`, `bank`, `wallet`, `vpa`, `email`, `contact`, `notes`, `address`, `fee`, `tax`, `error_code`, `error_description`, `error_source`, `error_step`, `error_reason`, `transaction_id`, `created_at`) VALUES
(6, 'pay_IJTNxAItoxr6KV', 'payment', 100, 'INR', 'captured', 'order_IJTNo71N5n8ajK', '', '', 'wallet', '0', '', '1', 'Test Transaction', '', '', 'phonepe', '', 'gaurav.kumar@example.com', '+919999999999', '', 'Razorpay Corporate Office', 2, 0, '', '', '', '', '', '', '1636453907'),
(7, 'pay_IJTOvg7EiJDL10', 'payment', 100, 'INR', 'captured', 'order_IJTOa4BfsTDwbO', '', '', 'card', '0', '', '1', 'Test Transaction', 'card_IJTOviG53JI0Yl', '', '', '', 'gaurav.kumar@example.com', '+919999999999', '', 'Razorpay Corporate Office', 2, 0, '', '', '', '', '', '', '1636453963'),
(8, 'pay_IJTPVA6TTdnEqS', 'payment', 100, 'INR', 'captured', 'order_IJTPNN4qq2fBLc', '', '', 'netbanking', '0', '', '1', 'Test Transaction', '', 'SBIN', '', '', 'gaurav.kumar@example.com', '+919999999999', '', 'Razorpay Corporate Office', 2, 0, '', '', '', '', '', '', '1636453995');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
