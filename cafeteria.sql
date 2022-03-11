-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 12:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `cafeteria`
--
-- --------------------------------------------------------
--
-- Table structure for table `orders`
--
CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `totalPrice` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `orders_products`
--
CREATE TABLE `orders_products` (
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `products`
--
CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `picture` varchar(100) DEFAULT 'noImage',
  `status` tinyint DEFAULT 1
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `category`
--
CREATE TABLE `category` (`category` varchar(100) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roomNum` int(100) NOT NULL,
  `ext` varchar(100) NOT NULL,
  `profile_Picture` varchar(100) DEFAULT NULL,
  `role` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Dumping data for table `users`
--
INSERT INTO `users` (
    `id`,
    `name`,
    `email`,
    `password`,
    `roomNum`,
    `ext`,
    `profile_Picture`,
    `role`
  )
VALUES (
    1,
    'admin',
    'admin@gmail.com',
    '12345678',
    1,
    '12',
    NULL,
    'admin'
  ),
  (
    2,
    'user1',
    'user1@gmail.com',
    '12345678',
    2,
    '15',
    NULL,
    'user'
  );
--
-- Dumping data for table `products`
--
INSERT INTO `products` (
    `id`,
    `name`,
    `price`,
    `category`,
    `picture`,
    `status`
  )
VALUES (1, 'pepsi', '5', 'Beverages', 'pepsi', '1'),
  (2, 'dew', '5', 'Beverages', 'dew', '1'),
  (3, 'tea', '5', 'Hot Drinks', 'tea', '1'),
  (4, 'coffee', '8', 'Hot Drinks', 'coffee', '1'),
  (5, 'red wine', '30', 'Alcohol', 'redWine', '1'),
  (
    6,
    'white wine',
    '30',
    'Alcohol',
    'whiteWine',
    '1'
  );
--
-- Dumping data for table `category`
--
INSERT INTO `category` (`category`)
VALUES ('Hot Drinks'),
  ('Cold Drinks'),
  ('Alchol');
--
-- Indexes for dumped tables
--
--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`user_id`);
--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
ADD PRIMARY KEY (`order_id`, `product_id`),
  ADD KEY `productId` (`product_id`);
--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
ADD CONSTRAINT `orderId` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `productId` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;