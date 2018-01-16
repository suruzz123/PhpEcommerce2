-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 06:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lict_h35`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_details`) VALUES
(1, 'Television', ''),
(2, 'Mobile', ''),
(4, 'Laptop', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_details` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_details`, `product_price`, `product_image`, `product_category`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'Mac book pro', 'Mac book pro 2.7 GHz', '2300000.00', 'uploads/Good-Evening-Cute-Girl-In-River-Sun-Set-HD-Wallpaper-03156.jpg', 4, 1, '2017-12-03 12:42:52', '2017-12-03 12:42:52'),
(2, 'Samsung Galaxy s8', 'Samsung Galaxy s8 Samsung Galaxy s8 Samsung Galaxy s8 Samsung Galaxy s8  ', '74000.00', 'uploads/images.jpg', 2, 1, '2017-12-03 12:40:01', '0000-00-00 00:00:00'),
(3, 'Samsung Galaxy S7', 'Samsung Galaxy S7', '65000.00', 'uploads/best-photography-in-world-images-hd.jpg', 2, 1, '2017-12-03 12:42:33', '2017-12-03 12:42:33'),
(4, 'Sony bravia', 'Sony bravia', '150000.00', 'uploads/Capture.PNG', 1, 1, '2017-12-03 12:44:58', '0000-00-00 00:00:00'),
(5, 'LG', 'LG plasma television', '60000.00', 'uploads/1792-cow-and-dolphin-jumping-where-is-more-further-free-ipad-hd-wallpaper_1024x1024.jpg', 1, 1, '2017-12-03 12:46:17', '0000-00-00 00:00:00'),
(6, 'Dell', 'Dell inspiron', '45000.00', 'uploads/logo.JPG', 4, 1, '2017-12-03 12:47:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_details`) VALUES
(1, 'admin', 'Admin can access all things.'),
(2, 'general', 'General can access only report');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `profile_picture` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `profile_picture`, `active`, `role_id`, `create_at`, `update_at`) VALUES
(1, 'Jahangir', 'Passw0rd', 'jahangir@gmail.com', '', '', '', 0, 1, '2017-09-21 12:43:30', '0000-00-00 00:00:00'),
(5, 'Shikha', '6543210', 'shikha@gmail.com', '', '', '', 0, 1, '2017-09-21 12:50:51', '0000-00-00 00:00:00'),
(6, 'john', 'passw0rd', 'john@gmail.com', 'john', 'carry', 'uploads/lib3.jpg', 0, 1, '2017-09-26 12:51:02', '0000-00-00 00:00:00'),
(7, 'Toy', 'Passw0rd', 'toy@gmail.com', 'Toy', 'City', 'uploads/lib2.jpg', 1, 1, '2017-09-26 13:11:53', '0000-00-00 00:00:00'),
(8, '', '', '', '', '', 'uploads/', 0, 1, '2017-11-21 13:44:41', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
