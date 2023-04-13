-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 11:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` text NOT NULL,
  `user_name` text NOT NULL,
  `birthdate` date NOT NULL,
  `phone` int(20) NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL,
  `user_image` text DEFAULT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `user_name`, `birthdate`, `phone`, `address`, `password`, `user_image`, `email`) VALUES
('marline shenouda', 'maro', '2001-04-26', 1123444777, 'zazatt', 'mitfr$22', 'brown-wooden-table-on-coffee-shop-or-restaurant-background-free-photo.jpg', 'bla@gmail.com'),
('mirette shenouda maher', 'fostka', '2001-04-04', 1223344111, 'blablawerr', 'mfdmffdnk###3', 'brown-wooden-table-on-coffee-shop-or-restaurant-background-free-photo.jpg', 'btatatata@gmail.com'),
('ali', 'lol', '2001-03-26', 1234567895, 'bgtrr', 'lvkmklv44##', '255425764_2149983765143118_3265527405783788865_n.jpg', 'bntt@gmail.com'),
('youssef', 'joe', '2000-04-02', 1223344111, 'blablawerr', 'dflmj2211##', 'testing.jpg', 'btatatata@gmail.com'),
('diaa ali ashraf', 'diaa', '1998-04-10', 1234567895, '45 st. hadayek', 'mnbbtrr444%%', '336650409_1386982725390163_1135195839235109251_n.jpg', 'bntt@gmail.com'),
('ibrahim saif', 'ibrahim', '1956-11-01', 1234567895, '80 st. el haram', 'jkdfjjf44%%', '337870178_610667747172306_6109619443625034029_n.jpg', 'ibrahim_234@gmail.com'),
('sandy medhat', 'sandy', '2006-04-11', 1234537895, '37 b sherif youssef street', 'mnbbtrr44%%', '674322f48292b33169697fa6b2525eb7.jpg', 'sandymed@gmail.com'),
('sandrine ashraf', 'sandrine1122', '1998-04-03', 1223344111, '55 st. mostafa el nahas', 'mnbttr55$$', '2023-01-12 (1).png', 'sandrine22@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
