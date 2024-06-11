-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2024 at 08:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asmphp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'qưewqe');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_thumbnail` varchar(255) DEFAULT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `img_thumbnail`, `overview`, `content`, `created_at`, `updated_at`) VALUES
(16, 1, 'đô', NULL, NULL, NULL, '2024-06-11 06:50:44', '2024-06-11 06:50:44'),
(17, 1, 'abcdefgh', 'assets/uploads/1718088818Screenshot 2024-01-19 165647.png', 'ádfghgfrewqertytrewq', '123454321234rewertgyh', '2024-06-11 06:53:38', '2024-06-11 06:53:38'),
(18, 1, 'dkjfdajsJHDISA', NULL, 'kjhgrewertyuiuytrewertyuytrew', 'ưertyuytrewq34rtyuiuytre34567uioiuyt5r4ew', '2024-06-11 07:06:15', '2024-06-11 07:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','member') NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `password`, `type`, `created_at`, `updated_at`, `is_active`, `email`) VALUES
(108, 'dkjfdajsJHDISA', 'assets/uploads/1717924201Screenshot 2024-01-18 201952.png', '$2y$10$x/qukNKCwIuwe0ttz0w/t.3SqEl2KwFIv3ugZbARpXW1JVJYDlYZi', 'member', '2024-06-09 09:10:01', '2024-06-09 09:10:01', 1, ''),
(113, 'dkjfdajsJHDISAdf', 'assets/uploads/1717925171Screenshot 2024-01-18 201952.png', '$2y$10$VZAoxV33Ma7Bz0l.lAmRteQy/1DrFSZsgTBF7k7tnKNWmZAxEiV/W', 'member', '2024-06-09 09:26:11', '2024-06-09 09:26:11', 1, 'thanhdo112004@gmail.com'),
(114, 'abcdefgh', 'assets/uploads/1717925227326522945_1836407500062492_7513821650401515275_n.jpg', '$2y$10$5QZWL7uNZYzHEu744.CapeZY36ItsygBjL1wUxIORBWovXHmOfb5G', 'member', '2024-06-09 09:27:07', '2024-06-09 09:27:07', 1, 'quangdeptrai@gmail.com'),
(115, 'dkjfdajsJHDISA', 'assets/uploads/1718047057Screenshot 2024-05-21 220905.png', '$2y$10$a.YUufjS9zmi7RMkY.6GxOr7C4nfb0pejbGboH0iX.A9C.TkO8DrK', 'member', '2024-06-10 19:17:37', '2024-06-10 19:17:37', 1, 'thanhdo112004@gmail.com'),
(116, 'Nguyen The Thanh ', 'assets/uploads/1718049994Screenshot 2024-03-13 080939.png', '$2y$10$tB/lqCyaXdjOp125hw0JMuJ/gMeYq8SEVytF0bXVVJjjIxbLWXcsC', 'member', '2024-06-10 20:06:34', '2024-06-10 20:06:34', 1, 'quangdeptrai@gmail.com'),
(117, 'admin', NULL, 'admin@gmail.com', 'admin', '2024-06-11 06:41:01', '2024-06-11 06:41:01', 1, 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
