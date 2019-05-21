-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 08:37 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `username`, `email`, `password`, `token`, `active`) VALUES
(1, 'sunil', 'pawar.sunil888@gmail.com', '$2y$10$Mjk4MWQ1NGYxZmI0NDQ1ZeRX7arlZnLq9A0L85E7ocoD6eNMqkM6i', '941ad3dccbcd52843ad6a5d157aa0b522f3988161dfbbffb3971217dd3b8f606713fd128f387eb63', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
