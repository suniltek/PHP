-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 04:19 AM
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
-- Database: `form-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL DEFAULT 'Male',
  `email` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `fullname`, `birthdate`, `gender`, `email`, `mobile`, `phone`, `state`, `city`, `street`, `landmark`, `address`) VALUES
(1, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(2, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(3, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(4, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(5, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(6, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(7, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(8, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(9, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(10, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(11, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(12, 'sunil pawar', '2019-10-26', 'Male', 'dhokare.ss@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(13, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(14, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(15, 'sunil pawaras', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(16, 'sunil pawaras', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(17, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(18, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(19, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(20, 'sunil pawar', '2019-10-26', 'Female', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(21, 'sunil pawar', '2019-10-26', 'Female', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park'),
(22, 'sunil pawar', '2019-10-26', 'Male', 'pawar.sunil888@gmail.com', 1234561236, 1234561236, 'Maharashtra', 'pune', 'thergaon', 'Royal Court', 'Anand Park');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
