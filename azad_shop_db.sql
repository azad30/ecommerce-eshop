-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2017 at 02:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azad_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `session_id`, `color`, `quantity`, `price`, `total`) VALUES
(9, 1, 'mafuk8imv6l7cqq6jamhmv4ad3', 'Violet', 3, 12345, 37035),
(10, 43, '88ekfbtrisndr0ps5scikh7la6', 'Violet', 1, 2000, 2000),
(11, 1, '88ekfbtrisndr0ps5scikh7la6', 'Violet', 2, 12345, 24690);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Mobile'),
(2, 'Fashion'),
(7, 'Electronics1123'),
(24, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `user_id`, `product_id`, `color`, `quantity`, `price`, `payment`, `total`) VALUES
(1, 23, 1, 'Violet', 2, 12345.00, 'Bkash', 24690.00),
(2, 23, 2, 'Violet', 1, 4555.00, 'Bkash', 4555.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Approve` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `user_name`, `user_email`, `user_review`, `product_id`, `Approve`) VALUES
(2, 'fdf', 'dfdfd@email.com', 'fdfdf', 1, 'active'),
(3, 'test', 'test@email.com', 'hlw at your first review', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `product_name`, `cat_id`, `image`, `price`, `discount`, `brand`, `qty`, `description`) VALUES
(1, 'Nokia', 2, '1066.jpg', 12345.00, 33.00, '3rrer3', 333, 'ffdf'),
(43, 'Nokia', 1, 'azad_bg.jpg', 2000.00, 5.00, 'newBrand', 7, 'nokia is available nokia is available ');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `youtube` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_mobile` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_country` varchar(70) NOT NULL,
  `zip_code` int(50) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_pass`, `user_mobile`, `user_address`, `user_country`, `zip_code`, `status`) VALUES
(23, 'Admin', 'admin@email.com', '123456', 324234234, 'gdfgdfgdfg', 'fdgdfgfd', 2342342, '1'),
(24, 'azad', 'azad@gmail.com', '123456', 234234234, 'dfgdfgfdg', 'dfgfdgfdg', 123123, '1'),
(26, 'akaima', 'akaima@email.com', '123456', 123, 'Uttara, Dhaka', 'Country', 123, '1'),
(27, 'fsdfsdf', 'n@email.com', '123456', 53423534, 'gtretert', 'tertert', 213123, '0'),
(28, 'azad', 'azad@email.com', '123456', 123456, 'azad', 'Bangladesh', 123456, '1'),
(29, 'active', 'active@email.com', '123456', 123456, 'Uttara, Dhaka', 'Bangladesh', 123456, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_review_ibfk_1` (`product_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tbl_ibfk_1` (`cat_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
