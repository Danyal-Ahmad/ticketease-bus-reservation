-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 01:14 AM
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
-- Database: `online_bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cont_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`name`, `email`, `password`, `cont_num`) VALUES
('Admin User', 'admin_login', 'admin@', '03394292905');

-- --------------------------------------------------------

--
-- Table structure for table `bus_details`
--

CREATE TABLE `bus_details` (
  `id_bus` int(11) NOT NULL,
  `bus_name` varchar(100) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `bus_class` varchar(20) NOT NULL,
  `fare` int(11) NOT NULL,
  `travel_duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`id_bus`, `bus_name`, `source`, `destination`, `seats_available`, `bus_class`, `fare`, `travel_duration`) VALUES
(1, 'FM - LHW777', 'Islamabad', 'Peshawar', 20, 'business', 2200, '2H 45M'),
(2, 'FM -  LH2324', 'Islamabad', 'Lahore', 30, 'VVIP', 3000, '2H 10M'),
(3, 'FM - PKI661', 'Peshawar', 'Islamabad', 20, 'VVIP', 2500, '2H 0M'),
(4, 'FM - KPK001', 'Karachi', 'Peshawar', 20, 'executive', 4000, '16H 0M');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_records`
--

CREATE TABLE `passenger_records` (
  `id` int(11) NOT NULL,
  `ticket_number` int(20) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `seat_number` varchar(50) NOT NULL,
  `bus_fare` int(11) NOT NULL,
  `bus_route` text NOT NULL,
  `bus_class` text NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `passenger_gender` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `passenger_email` text NOT NULL,
  `passenger_address` text NOT NULL,
  `age` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `booking_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger_records`
--

INSERT INTO `passenger_records` (`id`, `ticket_number`, `bus_name`, `seat_number`, `bus_fare`, `bus_route`, `bus_class`, `passenger_name`, `passenger_gender`, `contact_number`, `passenger_email`, `passenger_address`, `age`, `card_number`, `booking_date`) VALUES
(2, 0, 'CityHopper', 'B7', 36, 'Route B', 'Business', 'Jane Smith', 'Female', '987-654-3210', 'jane.smith@example.com', '456 Elm St, Townsville', 28, '9876 5432 1098 7', '2024-06-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user__details`
--

CREATE TABLE `user__details` (
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cont_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user__details`
--

INSERT INTO `user__details` (`name`, `email`, `password`, `cont_num`) VALUES
('Danyal Ahmad', 'danyal_ahmad', '#Danyal78002', '3104292906');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `passenger_records`
--
ALTER TABLE `passenger_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user__details`
--
ALTER TABLE `user__details`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger_records`
--
ALTER TABLE `passenger_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
