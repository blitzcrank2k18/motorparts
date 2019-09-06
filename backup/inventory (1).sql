-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2019 at 09:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Brakes'),
(2, 'Wheel'),
(3, 'Mirrors'),
(4, 'test111111'),
(5, 'dasds'),
(6, 'gfhgh'),
(7, 'fdfdh'),
(8, 'test111');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_contact` varchar(30) NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `source` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(78, 1, 'added new supplier fgf', '2019-09-04 20:08:01'),
(79, 1, 'updated supplier leee', '2019-09-04 20:08:16'),
(80, 1, 'added new user ada', '2019-09-04 20:09:58'),
(81, 1, 'updated user kaye', '2019-09-04 20:10:10'),
(82, 1, 'has logged out the system at ', '2019-09-04 20:25:23'),
(83, 1, 'has logged in the system at ', '2019-09-05 07:20:13'),
(84, 1, 'has logged out the system at ', '2019-09-05 12:51:32'),
(85, 3, 'has logged in the system at ', '2019-09-05 12:51:37'),
(86, 3, 'has logged out the system at ', '2019-09-05 12:52:35'),
(87, 1, 'has logged in the system at ', '2019-09-05 12:52:42'),
(88, 1, 'has logged in the system at ', '2019-09-06 18:46:41'),
(89, 1, 'added new schedule for 2019-09-10', '2019-09-06 19:25:30'),
(90, 1, 'updated schedule to 2019-08-22', '2019-09-06 19:31:06'),
(91, 5, 'added new product jk', '2019-09-07 03:39:48'),
(92, 5, 'added new product l;l', '2019-09-07 03:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_desc` varchar(1000) NOT NULL,
  `prod_pic` varchar(100) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_qty` varchar(10) NOT NULL,
  `prod_unit` varchar(50) NOT NULL,
  `grams` varchar(10) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `reorder` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_desc`, `prod_pic`, `prod_name`, `supplier_id`, `prod_price`, `prod_qty`, `prod_unit`, `grams`, `cat_id`, `reorder`) VALUES
(2, 'chu chu chu', 'bed.jpg', 'Side Mirror', 1, '100.00', '10', '', '', 1, 5),
(3, '', '10.png', 'jhjh', 1, '123.00', '-8', '', '', 1, 2),
(4, '', 'default.gif', 'test', 1, '210.00', '', '', '', 1, 2),
(5, '', '22308840_1957645534548520_1932451618035565762_n.jpg', 'kjhjh', 1, '110.00', '-1', '', '', 1, 1),
(6, '', '5.png', 'klk', 1, '10.00', '', '', '', 1, 2),
(7, 'tete', 'logo.png', 'tgete', 1, '44.00', '', '', '', 1, 4),
(8, 'dada', 'logo.png', 'dada', 1, '12.00', '', '', '', 1, 2),
(9, 'kj', 'bed.jpg', 'jk', 2, '45.00', '', '', '', 1, 4),
(10, 'jkjk', 'bed.jpg', 'l;l', 2, '12.00', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `cash_tendered` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `date_added` datetime NOT NULL,
  `modeofpayment` varchar(15) NOT NULL,
  `cash_change` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cash_tendered`, `user_id`, `total`, `discount`, `amount_due`, `date_added`, `modeofpayment`, `cash_change`) VALUES
(1, '550.00', 3, '500.00', '0.00', '500.00', '2019-05-26 12:48:16', 'cash', '50.00'),
(2, '550.00', 3, '500.00', '0.00', '500.00', '2019-05-26 12:48:32', 'cash', '50.00'),
(3, '550.00', 3, '500.00', '0.00', '500.00', '2019-05-26 12:50:18', 'cash', '50.00'),
(4, '500.00', 3, '400.00', '0.00', '400.00', '2019-05-26 17:30:29', '', '100.00'),
(5, '500.00', 3, '400.00', '0.00', '400.00', '2019-05-26 17:31:14', '', '100.00'),
(6, '500.00', 3, '400.00', '0.00', '400.00', '2019-05-26 17:31:28', '', '100.00'),
(7, '2220.00', 3, '1600.00', '0.00', '1600.00', '2019-06-17 22:38:12', '', '620.00'),
(8, '100.00', 3, '100.00', '0.00', '100.00', '2019-08-11 20:07:11', '', '0.00'),
(9, '0.00', 3, '0.00', '0.00', '0.00', '2019-08-11 20:19:23', '', '0.00'),
(10, '0.00', 3, '0.00', '0.00', '0.00', '2019-08-11 20:21:14', '', '0.00'),
(11, '0.00', 3, '500.00', '0.00', '500.00', '2019-09-20 20:21:14', '', '0.00'),
(12, '0.00', 3, '-377.00', '300.00', '-77.00', '2019-09-03 12:08:40', '', '77.00'),
(13, '0.00', 3, '-367.00', '300.00', '-67.00', '2019-09-03 12:09:09', '', '67.00'),
(14, '200.00', 3, '123.00', '0.00', '123.00', '2019-09-03 12:09:26', '', '77.00'),
(15, '300.00', 3, '223.00', '0.00', '223.00', '2019-09-03 12:09:42', '', '77.00'),
(16, '4000.00', 3, '3075.00', '0.00', '3075.00', '2019-09-04 19:54:42', '', '925.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_details_id`, `sales_id`, `prod_id`, `price`, `qty`) VALUES
(1, 1, 2, '100.00', 1),
(2, 2, 2, '100.00', 5),
(3, 0, 2, '300.00', 1),
(4, 0, 2, '200.00', 2),
(5, 7, 2, '400.00', 4),
(6, 8, 2, '100.00', 1),
(7, 12, 2, '100.00', 1),
(8, 12, 3, '123.00', 1),
(9, 13, 3, '123.00', 1),
(10, 13, 5, '110.00', 1),
(11, 14, 3, '123.00', 1),
(12, 15, 3, '123.00', 1),
(13, 15, 2, '100.00', 1),
(14, 69, 3, '615.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `starttime` varchar(30) NOT NULL,
  `enddate` date NOT NULL,
  `service_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `endtime` varchar(30) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `starttime`, `enddate`, `service_id`, `startdate`, `endtime`, `customer`, `contact`, `description`) VALUES
(8, '13:30', '2019-08-23', 1, '2019-08-22', '16:30', 'test', '090909', 'test xrm'),
(9, '01:00', '2019-08-28', 2, '2019-09-25', '01:00', '', '', ''),
(10, '01:00', '2019-09-23', 1, '2019-08-27', '01:00', '', '', ''),
(11, '01:00', '2019-09-07', 1, '2019-09-10', '01:00', 'ken', 'aboy', 'xrm 125 red');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`) VALUES
(1, 'Customization'),
(2, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockin_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stockin_qty` int(6) NOT NULL,
  `stockin_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `prod_id`, `stockin_qty`, `stockin_date`) VALUES
(4, 2, 10, '2019-05-26 12:45:06'),
(5, 2, 10, '2019-08-11 23:57:31'),
(6, 3, 1, '2019-09-04 19:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `stockout_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(1, 'Proctor and Gamble', 'Bacolod City', '09086152757'),
(2, 'leee', 'addre', '4545411');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `status`, `user_type`) VALUES
(1, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Lee Pipez', 'active', 'admin'),
(3, 'lee', 'a1Bz20ydqelm8m1wqlb0f8b49f22c718e9924f5b1165111a67', 'Lee Pipez Magbanua', 'active', 'cashier'),
(4, 'serdz', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 'Sergio Nicolas Sobrepena', 'active', ''),
(5, 'kaye', 'a1Bz20ydqelm8m1wql71e4e5af2c51dabe73732781a9275b30', 'kaye', 'active', 'cashier'),
(6, 'kaye', 'a1Bz20ydqelm8m1wql71e4e5af2c51dabe73732781a9275b30', 'kaye', 'active', 'admin'),
(7, 'da', 'a1Bz20ydqelm8m1wql5ca2aa845c8cd5ace6b016841f100d82', 'ada', 'active', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockin_id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`stockout_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `stockout_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
