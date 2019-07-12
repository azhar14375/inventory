-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 12:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `date`) VALUES
(1, 'admin', 'admin', 'admin123', '2019-01-10 09:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `a_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`a_id`, `name`, `mobile`, `date`) VALUES
(2, 'Bharti', '96701523546', '2019-01-15 07:21:45'),
(4, 'Pinky', '9876543210', '2019-01-16 05:22:26'),
(5, 'Meenakshi', '96701523546', '2019-01-16 05:22:37'),
(6, 'Barkha', '963852741', '2019-01-18 08:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `p_type` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_code`, `p_type`, `p_name`, `p_quantity`, `date`) VALUES
(19, 'KKC111', 'NO4', 'KK cards', 100, '2019-01-14 12:24:13'),
(20, 'KKC140', 'No4', 'Cards', 112, '2019-01-14 12:25:08'),
(22, 'KKC876', 'NO.5', 'kkk', 158, '2019-01-23 07:24:12'),
(24, 'KKC166', 'NO.5', 'lenses', 1000, '2019-01-15 06:50:42'),
(25, '110008', 'No.3', 'cvk scanner', 1000, '2019-01-18 05:40:00'),
(26, 'KKC11000', 'No.4', 'scanner', 100, '2019-01-24 05:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `id` int(11) NOT NULL,
  `p_unit` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`id`, `p_unit`, `date`) VALUES
(10, 'No.4', '2019-01-18 05:57:26'),
(11, 'No.5', '2019-01-18 05:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `p_receive`
--

CREATE TABLE `p_receive` (
  `id` int(11) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_receive`
--

INSERT INTO `p_receive` (`id`, `agent_name`, `product_name`, `date`) VALUES
(1, 'Meenakshi', 'KK cards,Cards,kkk,lenses,cvk scanner,scanner', '2019-1-24 16:56'),
(2, 'Pinky', 'Cards,kkk,cvk scanner', '2019-1-25 16:46'),
(3, 'Pinky', 'kkk,cvk scanner', '2019-1-25 16:48'),
(4, 'Bharti', 'kkk,lenses,cvk scanner', '2019-1-30 12:29');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `p_received` varchar(255) NOT NULL,
  `receive_time` datetime NOT NULL,
  `p_returned` varchar(255) NOT NULL,
  `p_sold` varchar(255) NOT NULL,
  `sold_quantity` varchar(255) NOT NULL,
  `sold_time` datetime NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `agent_name`, `p_received`, `receive_time`, `p_returned`, `p_sold`, `sold_quantity`, `sold_time`, `date`) VALUES
(1, 'Ajay', 'Ace, Deluxe,Lens', '2010-12-18 14:48:00', 'Deluxe', 'Ace,Lens', '2', '2011-12-18 15:25:21', '2019-1-29 13:02'),
(2, 'Ajay', 'Ace, Deluxe,Lens', '2010-12-18 14:48:00', 'Deluxe', 'Ace,Lens', '2', '2011-12-18 15:25:21', '2019-1-29 14:06'),
(3, 'Ajay', 'Ace, Deluxe,Lens', '2010-12-18 14:48:00', 'Deluxe', 'Ace,Lens', '2', '2011-12-18 15:25:21', '2019-1-29 14:09'),
(4, 'Hasan', 'Ace, Deluxe,Lens', '2010-12-18 14:48:00', 'Deluxe', 'Ace,Lens', '2', '2011-12-18 15:25:21', '2019-1-29 14:09'),
(5, 'Hasan', 'Ace, Deluxe,Lens', '2010-12-18 14:48:00', 'Deluxe', 'Ace,Lens', '2,3', '2011-12-18 15:25:21', '2019-1-29 14:12'),
(6, 'Hasan', 'Ace, Deluxe,Lens', '2010-12-18 14:48:00', 'Deluxe', 'No sale', 'No data', '2011-12-18 15:25:21', '2019-1-29 17:59'),
(7, 'Hasan', 'Ace, Deluxe,Lens', '2010-12-18 14:48:00', 'Deluxe', 'No sale', 'No data', '2011-12-18 15:25:21', '2019-1-29 18:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_receive`
--
ALTER TABLE `p_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `p_receive`
--
ALTER TABLE `p_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
