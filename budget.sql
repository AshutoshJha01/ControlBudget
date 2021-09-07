-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 06:47 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense_user`
--

CREATE TABLE `expense_user` (
  `Ex_s_no` int(11) NOT NULL,
  `user_s_no` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_user`
--

INSERT INTO `expense_user` (`Ex_s_no`, `user_s_no`, `title`, `date`, `amount`, `name`, `bill`) VALUES
(1, 1, 'expense 1', '2021-07-22', 500, 'amanram', 'DSC00944.JPG'),
(2, 1, 'expense 1', '2021-07-30', 400, 'amanram', 'DSC00952.JPG'),
(3, 4, 'expense 3', '2021-07-29', 200, 'bhagwan', 'DSC00951.JPG'),
(4, 4, 'Expanse 2', '2021-07-28', 700, 'ramvushesh', 'DSC00948.JPG'),
(5, 4, 'power', '2021-07-27', 400, 'pawan', 'DSC00951.JPG'),
(6, 4, 'expense 1', '2021-07-20', 100, 'bhagwan', ''),
(7, 4, 'expense 1', '2021-07-27', 153, 'ramvushesh', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `s_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Plan_title` varchar(250) NOT NULL,
  `initial_budget` varchar(50) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `Person_Name` varchar(255) NOT NULL,
  `rem_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`s_no`, `user_id`, `Plan_title`, `initial_budget`, `from_date`, `to_date`, `no_of_people`, `Person_Name`, `rem_amount`) VALUES
(1, 1, 'goa to delhi', '2000', '2021-07-21', '2021-07-22', 2, 'amanram', 1100),
(4, 2, 'mumbai to goa', '2000', '2021-07-23', '2021-07-30', 3, 'bhagwan,ramvushesh,pawan', 447);

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'ashish kumar', 'xsamratboy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 9876543),
(2, 'Mohan', 'Mohan123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 98765432);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense_user`
--
ALTER TABLE `expense_user`
  ADD PRIMARY KEY (`Ex_s_no`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense_user`
--
ALTER TABLE `expense_user`
  MODIFY `Ex_s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
