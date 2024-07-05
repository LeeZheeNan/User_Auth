-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 05:54 PM
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
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `pizza` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `topping` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`pizza`, `size`, `topping`, `total`) VALUES
('Vegie Lover', 'small', 'pepperoni', 17),
('Basic Pizza', 'small', 'pepperoni', 12),
('Basic Pizza', 'small', 'pepperoni', 12),
('Basic Pizza', 'small', 'pepperoni', 12),
('Vegie Lover, Cheese Sensation', 'small', 'pepperoni', 22),
('Basic Pizza', 'small', 'pepperoni', 12),
('Basic Pizza', 'small', 'pepperoni', 12),
('Basic Pizza', 'small', 'pepperoni', 12),
('Basic Pizza', 'small', 'pepperoni', 12),
('Basic Pizza', 'small', 'pepperoni', 12);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `UserType` enum('Admin','Customer','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`username`, `password`, `email`, `address`, `UserType`) VALUES
('Lokeesh', '$2y$10$zy4MLLYEN9cce9EEEvf/g.Eb/RnfubW3soDXiFNeBYfsRdk3BEL9S', 'lokeesh.dinesh@gmail.com', 'lorong fairuz1 taman mutira', 'Admin'),
('vinasri', '$2y$10$.wh42AXJyraHTZT2g4rC0uBYd4U6ZqW1GFa2rFfUgE6BQgr98lR/W', 'singamdavid16@gmail.com', 'lorong fairuz1 taman arked', 'Admin'),
('Raj', '$2y$10$9.t7bqg1tHK4mEPJvPO73eLCVGJRtVUR6IWZIcbUqH4VDr9eQrpo6', 'raj@gmail.com', 'lorong fairuz1 taman limau', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pizza` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `topping` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`name`, `address`, `pizza`, `size`, `topping`, `total`) VALUES
('Lokeesh', 'Lorong Fairuz 3, Taman Arked', 'Basic Pizza', 'small', '1', 12),
('Lokeesh', 'Lorong Fairuz 3, Taman Arked', 'Vegie Lover', 'small', '1', 17),
('Lokeesh', 'Lorong Fairuz 3, Taman Arked', 'Basic Pizza', 'small', '1', 12),
('Lokeesh', 'Lorong Fairuz 3, Taman Arked', 'Basic Pizza', 'small', '1', 12),
('Lokeesh', 'Lorong Fairuz 3, Taman Arked', 'Basic Pizza', 'small', '1', 12),
('Lokeesh', 'Lorong Fairuz 3, Taman Arked', 'Vegie Lover', 'small', '1', 22),
('Lokeesh', 'Lorong Fairuz 3, Taman Arked', 'Cheese Sensation', 'small', '1', 22),
('Lokeesh', 'lorong fairuz1 taman mutira', 'Basic Pizza', 'small', '1', 12),
('vinasri', 'lorong fairuz1 taman arked', 'Basic Pizza', 'small', '1', 12),
('Raj', 'lorong fairuz1 taman limau', 'Basic Pizza', 'small', '1', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
