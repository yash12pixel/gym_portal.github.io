-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 07:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `e` int(11) NOT NULL,
  `n` int(11) NOT NULL,
  `d` varbinary(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `e`, `n`, `d`) VALUES
(1, 'jeet', 'jeet123', 7, 10403, 0xf87aa9f1e6956de79fd90d7a9de9e1d7),
(2, 'priyanka', 'priyanka123', 5, 9617, 0xf81c6e0c31051f8e89102dfd33390b1d),
(3, 'bharati', 'bharati123', 3, 4843, 0xd9cc7ccc06f989ae13f8c312535d8604);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 1, '2020-04-05 07:16:39', 'no'),
(2, 1, '2020-04-05 07:27:13', 'no'),
(3, 3, '2020-04-05 07:27:37', 'no'),
(4, 3, '2020-04-05 07:28:07', 'no'),
(5, 1, '2020-04-05 07:29:52', 'no'),
(6, 1, '2020-04-05 07:28:16', 'no'),
(7, 2, '2020-04-05 07:31:27', 'no'),
(8, 3, '2020-04-05 07:46:04', 'no'),
(9, 1, '2020-04-05 07:40:46', 'no'),
(10, 2, '2020-04-05 07:58:32', 'no'),
(11, 3, '2020-04-05 07:49:15', 'no'),
(12, 2, '2020-04-05 08:10:16', 'no'),
(13, 1, '2020-04-06 14:11:07', 'no'),
(14, 1, '2020-04-10 16:07:29', 'no'),
(15, 2, '2020-04-10 15:54:33', 'no'),
(16, 3, '2020-04-10 16:07:27', 'no'),
(17, 1, '2020-04-13 08:29:41', 'no'),
(18, 2, '2020-04-13 08:32:16', 'no'),
(19, 1, '2020-04-13 08:32:31', 'no'),
(20, 1, '2020-04-13 08:42:56', 'no'),
(21, 2, '2020-04-13 08:36:25', 'no'),
(22, 3, '2020-04-13 08:47:09', 'no'),
(23, 2, '2020-04-13 08:43:37', 'no'),
(24, 1, '2020-04-13 09:03:51', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
