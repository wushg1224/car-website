-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2024 at 03:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `description` varchar(100) NOT NULL,
  `seats` tinyint(4) NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `mileage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='cars';

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `type`, `brand`, `model`, `price`, `image`, `quantity`, `description`, `seats`, `fuel_type`, `mileage`) VALUES
(1, 'SUV', 'Audi', 'Q3', 130, 'audi-q3.jpeg', 1, 'Compact luxury crossover SUV', 5, 'Petrol', 50000),
(2, 'SUV', 'Audi', 'Q7', 150, 'audi-q7.jpeg', 0, 'Full-size luxury SUV', 7, 'Diesel', 60000),
(3, 'Sedan', 'BMW', 'M3', 140, 'bmw-m3.jpeg', 0, 'High-performance sports sedan', 5, 'Petrol', 30000),
(4, 'SUV', 'BMW', 'X3', 100, 'bmw-x3.jpeg', 1, 'Compact luxury SUV', 5, 'Petrol', 35000),
(5, 'SUV', 'BMW', 'X5', 120, 'bmw-x5.jpeg', 2, 'Mid-size luxury SUV', 5, 'Diesel', 40000),
(6, 'Sedan', 'Mercedes', 'A-Class', 85, 'mercedes-aclass.jpeg', 3, 'Subcompact executive car', 5, 'Petrol', 20000),
(7, 'Sedan', 'Mercedes', 'S-Class', 150, 'mercedes-sclass.jpeg', 1, 'Full-size luxury sedan', 5, 'Petrol', 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
