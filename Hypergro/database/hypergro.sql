-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 04:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hypergro`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `adress1` varchar(100) NOT NULL,
  `adress2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `username1` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `adress1`, `adress2`, `city`, `state`, `country`, `pincode`, `username1`, `password`) VALUES
(1, '', '', '', '', '', '', '', '', '', 'vis', '$2y$10$u7ZzZxDZYTmwfFUgNNdwo.mHKZUXcIswpZRHt9G3O91irtmv3DmI.'),
(2, '', '', '', '', '', '', '', '', '', 'sum', '$2y$10$nFAChjlvMQOD6lfSyr4QL.6o3W.BhFb2acpS0xMBokD7JioyxKQ1i'),
(3, '', '', '', '', '', '', '', '', '', 'suk', '$2y$10$Pz7UufXCIocR/7m.uocXY.vCc9Ic0I09IJNk4atCwW6WD3SvJ0cNG'),
(4, '', '', '', '', '', '', '', '', '', '', '$2y$10$5eoqQUxJ8M/Ky7V6XGw.5uvLG2LGVMD2Rl9RL/rxiqwrHGIcQCS0K'),
(5, '', '', '', '', '', '', '', '', '', 'sup', '$2y$10$6PStzNmDGNtz66v2DXSe6uZzMsWXzs/DRPSDAIprqusn0fw1S213O'),
(6, '', '', '', '', '', '', '', '', '', 'sup', '$2y$10$b1v9/31jsPTotrzo7JRlUu9Y.1d/Hn5Z568JBlMquS.mTAMNenTXG'),
(7, '', '', '', '', '', '', '', '', '', 'shr', '$2y$10$U3OBgQu1H8ypDeGStlt5Qe1ZOWlDs7hvCyT/pYe6hYgrLz2EdZJnK'),
(8, '', '', '', '', '', '', '', '', '', 'jack', '$2y$10$rib6Odae3WHkJNhiK4Ze6OgDeMOkX3J9U5xhh9UvxWcwV5Sm3Rpli');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `name`, `price`) VALUES
(4, 2, 'rice(1kg)', 50.00),
(5, 2, 'wheat(1kg)', 40.00),
(6, 9, 'kurkure(1nos)', 10.00),
(7, 9, 'rice(1kg)', 50.00),
(8, 9, 'wheat(1kg)', 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `adress1` varchar(100) NOT NULL,
  `adress2` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `vendorname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `email`, `phone`, `adress1`, `adress2`, `city`, `state`, `country`, `pincode`, `vendorname`, `password`) VALUES
(1, '', '', '', '', '', '', '', '', '', 'jack', '$2y$10$XRDLh3mwpqm2gWh5f8PBvuUeh/Vs60i9SuR79VggUtIhlfkhPk2Q2'),
(2, '', '', '', '', '', '', '', '', '', 'Infothon', '$2y$10$yJhbCrunooUbsXHF7IP8iO/ocUXAlqxAZrmoa2bIOD8hQlJOwipeq'),
(8, '', '', '', '', '', '', '', '', '', 'jack', '$2y$10$ETonDVYRuroya/ivzneYI.fq4aZlnclhvhUwq0y780N6zFG5/n1dy'),
(9, '', '', '', '', '', '', '', '', '', 'info', '$2y$10$iDhxV6EkBMi4nuFW.9k2gergfrw.nnmFBn6ar.7IOlqUUPnh/hrDq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
