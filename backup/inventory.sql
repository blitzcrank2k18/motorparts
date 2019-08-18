-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 09:20 AM
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
(3, 'Mirrors');

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
(4, 1, 'added 3 of safdsf', '2019-05-26 12:36:31'),
(5, 1, 'added 3 of safdsf', '2019-05-26 12:36:56'),
(6, 1, 'added 3 of safdsf', '2019-05-26 12:37:25'),
(7, 1, 'added 3 of safdsf', '2019-05-26 12:37:36'),
(8, 1, 'added 2 of safdsf', '2019-05-26 12:37:46'),
(9, 1, 'added 10 of safdsf', '2019-05-26 12:40:26'),
(10, 1, 'added 10 of Side Mirror', '2019-05-26 12:45:06'),
(11, 1, 'has logged out the system at ', '2019-05-26 13:02:26'),
(12, 1, 'has logged in the system at ', '2019-05-26 13:02:32'),
(13, 1, 'has logged in the system at ', '2019-05-26 16:23:14'),
(14, 3, 'has logged in the system at ', '2019-05-26 16:29:25'),
(15, 1, 'has logged in the system at ', '2019-05-26 16:29:33'),
(16, 1, 'has logged out the system at ', '2019-05-26 16:29:36'),
(17, 3, 'has logged in the system at ', '2019-05-26 16:31:38'),
(18, 1, 'has logged in the system at ', '2019-06-17 22:30:57'),
(19, 1, 'has logged out the system at ', '2019-06-17 22:35:00'),
(20, 1, 'has logged in the system at ', '2019-06-17 22:37:09'),
(21, 1, 'has logged out the system at ', '2019-06-17 22:37:11'),
(22, 3, 'has logged in the system at ', '2019-06-17 22:37:39'),
(23, 1, 'has logged in the system at ', '2019-08-11 20:03:47'),
(24, 1, 'has logged out the system at ', '2019-08-11 20:04:49'),
(25, 3, 'has logged in the system at ', '2019-08-11 20:06:44'),
(26, 3, 'has logged out the system at ', '2019-08-11 20:18:48'),
(27, 3, 'has logged in the system at ', '2019-08-11 20:18:57'),
(28, 3, 'has logged out the system at ', '2019-08-11 20:37:26'),
(29, 3, 'has logged in the system at ', '2019-08-11 20:37:40'),
(30, 3, 'has logged out the system at ', '2019-08-11 21:17:39'),
(31, 1, 'has logged in the system at ', '2019-08-11 21:17:47'),
(32, 1, 'has logged in the system at ', '2019-08-11 23:19:47'),
(33, 1, 'added 10 of Side Mirror', '2019-08-11 23:57:31'),
(34, 1, 'has logged in the system at ', '2019-08-12 08:08:55'),
(35, 1, 'has logged in the system at ', '2019-08-12 20:43:05'),
(36, 1, 'has logged in the system at ', '2019-08-14 21:59:35');

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
(2, 'chu chu chu', 'bed.jpg', 'Side Mirror', 1, '100.00', '7', '', '', 1, 5),
(3, '', '10.png', 'jhjh', 1, '123.00', '', '', '', 1, 2),
(4, '', 'default.gif', 'test', 1, '210.00', '', '', '', 1, 2),
(5, '', '22308840_1957645534548520_1932451618035565762_n.jpg', 'kjhjh', 1, '110.00', '', '', '', 1, 1),
(6, '', '5.png', 'klk', 1, '10.00', '', '', '', 1, 2);

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
(11, '0.00', 3, '500.00', '0.00', '500.00', '2019-09-20 20:21:14', '', '0.00');

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
(6, 8, 2, '100.00', 1);

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
  `endtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `starttime`, `enddate`, `service_id`, `startdate`, `endtime`) VALUES
(8, '13:30', '2019-08-23', 1, '2019-08-22', '16:30');

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
(5, 2, 10, '2019-08-11 23:57:31');

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
(1, 'Proctor and Gamble', 'Bacolod City', '09086152757');

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

--
-- Dumping data for table `temp_trans`
--

INSERT INTO `temp_trans` (`temp_trans_id`, `prod_id`, `price`, `qty`) VALUES
(2, 2, '100.00', 1);

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
(5, 'kaye', 'a1Bz20ydqelm8m1wql71e4e5af2c51dabe73732781a9275b30', 'kaye', 'active', ''),
(6, 'kaye', 'a1Bz20ydqelm8m1wql71e4e5af2c51dabe73732781a9275b30', 'kaye', 'active', 'admin');

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `stockout_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
