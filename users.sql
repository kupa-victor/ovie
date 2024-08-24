-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 09:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myowndb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'client',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `password`, `role`, `created_at`) VALUES
(1, 'ikupa', 'ogheneovie', 'kupavictor300@gmial.com', '08121079231', '5 adeolu street, olodi apapa, lagos state', '$2y$10$06k4.8PsB9uArlIkZLLqUufFiN04myWAH8CcOtrExEhRinjpMPXY2', 'client', '2024-07-08 18:38:00'),
(2, 'ikupa', 'ogheneovie', 'kupavictor300@gmail.com', '08121079231', '5 adeolu street, olodi apapa, lagos state', '$2y$10$9PdZQoJ1BTE1i48./HD0HOjeXU2grCtczYodJzIKPSHulFYMXka/6', 'client', '2024-07-08 18:47:31'),
(3, 'godspower', 'audu', 'godspoweraudu@gmail.com', '08141966650', 'mokoyo street, olodi apapa, lagos state', '$2y$10$Yxf1cMqQ2Bctvx0toD86a.SszviTjpERy66CTnfPXqzfKTGem1U2C', 'client', '2024-07-09 17:11:59'),
(4, 'matthew', 'femi', 'mathfem@yahoo.com', '099879878768', 'idan opposite adeolu mosque, olodi apapa, lagos state', '$2y$10$Dn6jcqGZX1ENdxMGj4DDh.n8Bxdu1mnQAYmye3Hw9RK1fvW1RxXAq', 'client', '2024-07-09 17:29:55'),
(5, 'Kabeer', 'Musa', 'musakabeer65@gmail.com', '08121874091', '25, Abikoye street safejo Lagos', '$2y$10$5.znwAxwGLEWipIrgkSHfu5iN4twAASps8c0gnTYA7bSQW84n/P2W', 'client', '2024-07-10 15:49:31'),
(6, 'OCHEDI', 'AMEH', 'ochedi@yahoo.com', '08132859351', '21 tolu rd', '$2y$10$HqB8VYDHChISbsQFT44tcut6D1uFbudATSIFWM2UivjkgVCAAkQUy', 'client', '2024-08-09 19:15:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
