-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 08:43 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `user`, `pass`) VALUES
(1, 'yash', 'yash'),
(3, 'jeet', 'jeet');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `avatar_path` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `height` float(5,2) NOT NULL,
  `weight` float(5,2) NOT NULL,
  `BMI` float(3,1) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(50) NOT NULL,
  `membership_type` char(1) NOT NULL,
  `p_statrt_date` date DEFAULT NULL,
  `p_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `username`, `password`, `avatar_path`, `email`, `mobile_no`, `height`, `weight`, `BMI`, `gender`, `address`, `membership_type`, `p_statrt_date`, `p_end_date`) VALUES
(10, 'jeet', 'niak', 'jeetnaik12', 'ead24627a4082fc99e03f04e8f456fb3 ', 'adhar.jpg', 'jeetnaik12@gmail.com', '9978968838', -170.00, -60.00, -20.8, 'M', 'patel street amalsad', 'p', '2020-09-19', '2020-10-19'),
(11, 'yash', 'kothari', 'kothari12', 'ba6562f29d5e6f42cfbf557aa08eb687 ', '', 'yash@gmail.com', '1232123212', 0.00, 0.00, NULL, 'M', 'somewhere', 'b', NULL, NULL),
(12, 'jayraj', 'raj', 'jayraj12', 'ddd3de8bdca4dbf03b8451f512bdf104', '', 'jayraj@gmail.com', '1232123212', 0.00, 0.00, NULL, 'M', 'rasta par', 'b', NULL, NULL),
(17, 'steave', 'rogers', 'Captian_America', '065ffeb86862623131079abff6bb3f85', '', 'steave@gmail.com', '7898789878', 165.00, 49.00, 18.0, 'M', 'americaa', 'b', NULL, NULL),
(18, 'Bruce', 'Banner', 'hulk_smash', 'ff58ac7e8a159bfb312ee301d4880266', '', 'hulk@gmail.com', '9878987898', 0.00, 0.00, NULL, 'M', 'somewhere in galaxy', 'b', NULL, NULL),
(19, 'Natasha', 'romanof', 'Black_widow', '32a030ae6159b1145051ce0a9b7569c1', '', 'Natasha@gmail.com', '4565456545', 160.00, 65.00, 25.4, 'F', 'Vormier', 'b', NULL, NULL),
(20, 'tony', 'stark', 'jarvis', 'cc20f43c8c24dbc0b2539489b113277a', '', 'mca4thteam13@gmail.com', '9978968838', 0.00, 0.00, NULL, 'M', 'avengers tower,new york', 'b', NULL, NULL),
(21, 'nilen', 'patel', 'Nilen123', 'e631c21bacc56a190b7d534926e47ccc', '', 'nilen@gmail.com', '9878987898', 0.00, 0.00, NULL, 'M', 'kachholi, Navsari', 'b', NULL, NULL),
(22, 'yash', 'shah', 'yash12', 'ba6562f29d5e6f42cfbf557aa08eb687', '', 'yash123@gmail.com', '2345678198', 170.00, 60.00, 20.8, 'M', 'surat', 'p', '2020-09-19', '2020-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `customer_gym_transaction`
--

CREATE TABLE `customer_gym_transaction` (
  `Transaction_id` varchar(100) NOT NULL,
  `Order_id` varchar(50) NOT NULL,
  `Currency` varchar(50) NOT NULL,
  `Transaction_date` date NOT NULL,
  `Bank_name` varchar(70) NOT NULL,
  `Transaction_amount` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_gym_transaction`
--

INSERT INTO `customer_gym_transaction` (`Transaction_id`, `Order_id`, `Currency`, `Transaction_date`, `Bank_name`, `Transaction_amount`, `gym_id`, `customer_id`) VALUES
('20200427111212800110168182701508080', 'OD60735', 'INR', '2020-04-27', 'WALLET', 2610, 18, 17),
('20200427111212800110168257101482532', 'OD477006', 'INR', '2020-04-27', 'WALLET', 2160, 18, 17),
('20200427111212800110168321901499280', 'OD423477', 'INR', '2020-04-27', 'WALLET', 5950, 18, 17),
('20200427111212800110168681701483181', 'OD298543', 'INR', '2020-04-27', 'WALLET', 2160, 18, 17),
('20200428111212800110168216801469094', 'OD204048', 'INR', '2020-04-28', 'WALLET', 2160, 18, 10),
('20200428111212800110168831901484654', 'OD22633', 'INR', '2020-04-28', 'WALLET', 2610, 18, 20),
('20200526111212800110168796501581000', 'OD493860', 'INR', '2020-05-26', 'WALLET', 6660, 18, 10),
('20200816111212800110168439001805752', 'OD273329', 'INR', '2020-08-16', 'WALLET', 2160, 18, 10),
('20200918111212800110168170301903627', 'OD67838', 'INR', '2020-09-18', 'WALLET', 2160, 18, 10),
('20200918111212800110168409601914430', 'OD120835', 'INR', '2020-09-18', 'WALLET', 2610, 18, 20),
('20200918111212800110168674301899689', 'OD202396', 'INR', '2020-09-18', 'WALLET', 5950, 18, 10),
('20200919111212800110168179401904936', 'OD435785', 'INR', '2020-09-19', 'WALLET', 6660, 18, 10),
('20200919111212800110168306202020442', 'OD77130', 'INR', '2020-09-19', 'WALLET', 2160, 18, 22),
('20200919111212800110168754801925471', 'OD111487', 'INR', '2020-09-19', 'WALLET', 900, 45, 22);

-- --------------------------------------------------------

--
-- Table structure for table `customer_membership`
--

CREATE TABLE `customer_membership` (
  `membership_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `membership_start_date` date NOT NULL,
  `membership_end_date` date NOT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_membership`
--

INSERT INTO `customer_membership` (`membership_id`, `customer_id`, `gym_id`, `membership_start_date`, `membership_end_date`, `plan_id`) VALUES
(50, 20, 18, '2020-09-18', '2020-10-18', 4),
(51, 22, 18, '2020-09-19', '2020-10-19', 4),
(52, 22, 45, '2020-09-19', '2020-10-19', 11);

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction`
--

CREATE TABLE `customer_transaction` (
  `Trans_id` varchar(100) NOT NULL,
  `Order_id` varchar(50) NOT NULL,
  `Currency` varchar(50) NOT NULL,
  `Trans_date` date NOT NULL,
  `Bank_name` varchar(70) NOT NULL,
  `Transaction_amount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_transaction`
--

INSERT INTO `customer_transaction` (`Trans_id`, `Order_id`, `Currency`, `Trans_date`, `Bank_name`, `Transaction_amount`, `customer_id`) VALUES
('20200427111212800110168410301479178', 'OD247744', 'INR', '2020-04-27', 'WALLET', 3000, 17),
('20200427111212800110168429601459651', 'OD481428', 'INR', '2020-04-27', 'WALLET', 5000, 17),
('20200427111212800110168472701480667', 'OD454531', 'INR', '2020-04-27', 'WALLET', 3000, 17),
('20200428111212800110168766601489399', 'OD119859', 'INR', '2020-04-28', 'WALLET', 5000, 10),
('20200428111212800110168496901490404', 'OD482349', 'INR', '2020-04-28', 'WALLET', 3000, 20),
('20200816111212800110168607901798303', 'OD305902', 'INR', '2020-08-16', 'WALLET', 5000, 10),
('20200816111212800110168308601909192', 'OD294788', 'INR', '2020-08-16', 'WALLET', 5000, 10),
('20200816111212800110168871701807583', 'OD54922', 'INR', '2020-08-16', 'WALLET', 3000, 10),
('20200816111212800110168073901814824', 'OD43500', 'INR', '2020-08-16', 'WALLET', 3000, 10),
('20200816111212800110168781101839167', 'OD57937', 'INR', '2020-08-16', 'WALLET', 5000, 10),
('20200816111212800110168571501825735', 'OD176765', 'INR', '2020-08-16', 'WALLET', 3000, 10),
('20200816111212800110168947401808669', 'OD154537', 'INR', '2020-08-16', 'WALLET', 5000, 10),
('20200816111212800110168742901823863', 'OD57166', 'INR', '2020-08-16', 'WALLET', 3000, 10),
('20200816111212800110168934001812836', 'OD174059', 'INR', '2020-08-16', 'WALLET', 3000, 10),
('20200816111212800110168492301813152', 'OD282152', 'INR', '2020-08-16', 'WALLET', 3000, 10),
('20200816111212800110168699601808550', 'OD307587', 'INR', '2020-08-16', 'WALLET', 5000, 10),
('20200918111212800110168090701907680', 'OD267690', 'INR', '2020-09-18', 'WALLET', 5000, 10),
('20200918111212800110168637101911698', 'OD387567', 'INR', '2020-09-18', 'WALLET', 3000, 10),
('20200918111212800110168375001926351', 'OD405076', 'INR', '2020-09-18', 'WALLET', 3000, 10),
('20200918111212800110168507701908098', 'OD60148', 'INR', '2020-09-18', 'WALLET', 3000, 10),
('20200919111212800110168767801924036', 'OD147894', 'INR', '2020-09-19', 'WALLET', 5000, 10),
('20200919111212800110168131801924257', 'OD182294', 'INR', '2020-09-19', 'WALLET', 5000, 10),
('20200919111212800110168309402020440', 'OD172426', 'INR', '2020-09-19', 'WALLET', 5000, 10),
('20200919111212800110168333201911822', 'OD351430', 'INR', '2020-09-19', 'WALLET', 3000, 10),
('20200919111212800110168441901901075', 'OD162844', 'INR', '2020-09-19', 'WALLET', 5000, 22);

-- --------------------------------------------------------

--
-- Table structure for table `dietchart`
--

CREATE TABLE `dietchart` (
  `dietchart_id` int(11) NOT NULL,
  `dietchart_name` varchar(90) NOT NULL,
  `dietchart_type` varchar(80) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dietchart`
--

INSERT INTO `dietchart` (`dietchart_id`, `dietchart_name`, `dietchart_type`, `size`, `downloads`) VALUES
(14, 'Child Chart.pdf', 'weight loss', 133775, 8),
(17, 'Daily Diet Chart Sample.pdf', 'weight loss', 1148392, 9),
(24, 'Weekly Diet Chart Template.pdf', 'Weight gain', 34664, 4),
(27, 'Diet Chart for Weight Loss.pdf', 'Weight gain', 44316, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `gym_id` int(11) NOT NULL,
  `gym_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gym_owner_id` int(11) NOT NULL,
  `gym_desc` varchar(200) NOT NULL,
  `gym_logo` varchar(100) NOT NULL,
  `Rating` float(5,2) NOT NULL,
  `trainer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`gym_id`, `gym_name`, `address`, `gym_owner_id`, `gym_desc`, `gym_logo`, `Rating`, `trainer_id`) VALUES
(18, 'AVENGERS GYM', 'near petrol pump, Bilimora', 20, 'we are working since 1999.jai hind. ', 'img_5.jpg', 0.00, NULL),
(19, 'Bally Total Fitness', '', 21, '', '', 0.00, NULL),
(34, 'Qwerty GYM', '', 40, '', '', 0.00, NULL),
(35, 'Gold GYM', '', 41, '', '', 0.00, NULL),
(38, 'Jarvis gym', '', 44, '', '', 0.00, NULL),
(39, 'Batla house', '', 45, '', '', 0.00, NULL),
(42, 'Qwetgym', 'suart', 48, '', '', 0.00, NULL),
(45, 'Savangym', 'surta', 51, 'NICE GYM', '13.jpg', 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gym_exercise`
--

CREATE TABLE `gym_exercise` (
  `gym_exercise_id` int(11) NOT NULL,
  `gym_exercise_type` varchar(30) NOT NULL,
  `gym_exercise_name` varchar(30) NOT NULL,
  `gym_exercise_desc` varchar(50) NOT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gym_image`
--

CREATE TABLE `gym_image` (
  `image_id` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `gym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym_image`
--

INSERT INTO `gym_image` (`image_id`, `image_path`, `gym_id`) VALUES
(22, '1583942563-3.jpg', 18),
(23, '1583942731-8.jpg', 18),
(24, '1583942769-12(1).jpg', 18),
(25, '1583942769-15.jpg', 18),
(26, '1583942769-7.jpg', 18),
(42, '1587636539-img_4.jpg', 18),
(45, '1587909306-img2.png', 35),
(46, '1588059321-maxresdefault.jpg', 39),
(50, '1588071457-screenshot-(51).png', 18),
(54, '1588071457-screenshot-(33).png', 18),
(56, '1600489876-1.jpg', 45),
(57, '1600489876-6.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `gym_offers`
--

CREATE TABLE `gym_offers` (
  `offer_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `offer_percentage` int(11) NOT NULL,
  `offer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym_offers`
--

INSERT INTO `gym_offers` (`offer_id`, `plan_id`, `gym_id`, `offer_percentage`, `offer_name`) VALUES
(8, 8, 18, 11, 'New year offer'),
(9, 4, 18, 13, 'New year offer'),
(10, 11, 45, 10, 'DIWALI');

-- --------------------------------------------------------

--
-- Table structure for table `gym_owner`
--

CREATE TABLE `gym_owner` (
  `gym_owner_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `Merchant_key` varbinary(70) DEFAULT NULL,
  `Merchant_ID` varbinary(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_owner`
--

INSERT INTO `gym_owner` (`gym_owner_id`, `fname`, `lname`, `username`, `password`, `email`, `contactno`, `Merchant_key`, `Merchant_ID`) VALUES
(20, 'jeet', 'naik', 'jeetnaik12', 'ead24627a4082fc99e03f04e8f456fb3', 'jeetnaik12@gmail.com', '9978968848', 0xa337823cb6462db1bad318a4e31233af562cdd88174501d0e8f3b4b9b1e3baa4, 0x8adee6f0ccd4b41918a07177516576f362cc31dc11fe577661e8dc6a13fcb94b),
(21, 'jayraj', 'raj', 'jayraj12', 'ddd3de8bdca4dbf03b8451f512bdf104', 'jayraj@gmail.com', '1232123212', '', ''),
(40, 'Bruce', 'Banner', 'hulk_smash', 'ff58ac7e8a159bfb312ee301d4880266', 'hulk@gmail.com', '9878987898', NULL, ''),
(41, 'steave', 'rogers', 'Captian', '065ffeb86862623131079abff6bb3f85', 'Natasha@gmail.com', '4565456545', NULL, ''),
(44, 'tony', 'stark', 'Jarvis12', 'cc20f43c8c24dbc0b2539489b113277a', 'mca4thteam13@gmail.com', '7898789878', NULL, ''),
(45, 'shabnam', 'shiddque', 'YIoojp', '0f01ac22b4976fffbd53fb9478c74652', 'darsh@gmail.com', '9878987897', NULL, ''),
(48, 'yash', 'shah', 'yash12', 'fcd2306673d5bc51ca68cb6745dd091a', 'rahulnayee2@gmail.com', '1234123789', NULL, ''),
(51, 'savan', 'kothari', 'savan12', '7cb8fee24c16e4aa4758accefc990c7a', 'savan12@gmail.com', '9876543278', 0xc0d583e78a801ed2ac6fee3799a17b3c562cdd88174501d0e8f3b4b9b1e3baa4, 0x5e5f12bd6a9f0cff5e73229ff33b06f5aa4087769725e290d7f68950585ecf94);

-- --------------------------------------------------------

--
-- Table structure for table `item_rating`
--

CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `gym_id`, `customer_id`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(13, 18, 11, 5, 'Greate', 'No Amount Of Money Ever Bought A Second Of Time', '2020-03-28 10:09:59', '2020-03-28 10:09:59', 1),
(54, 39, 17, 2, 'good', 'nice', '2020-04-28 09:43:03', '2020-04-28 09:43:03', 1),
(58, 18, 10, 4, 'Very nice experience', 'Definetly recommended', '2020-04-28 16:02:02', '2020-04-28 16:02:02', 1),
(60, 18, 10, 4, 'good', 'nice', '2020-05-27 16:33:59', '2020-05-27 16:33:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
  `plan_type` varchar(40) NOT NULL,
  `plan_price` int(11) NOT NULL,
  `gym_id` int(11) NOT NULL,
  `plan_duration` char(2) NOT NULL,
  `Suggested_for_BMI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `plan_type`, `plan_price`, `gym_id`, `plan_duration`, `Suggested_for_BMI`) VALUES
(4, 'Weight loss', 3000, 18, '1', 'OVERWEIGHT'),
(5, 'Weight gain', 7000, 18, '3', 'UNDERWEIGHT'),
(8, 'Cardio', 9000, 18, '6', 'NORMAL WEIGHT'),
(9, 'Weight loss', 3000, 35, '3', 'OVERWEIGHT'),
(10, 'Heart of iron', 3000, 38, '3', 'NORMAL WEIGHT'),
(11, 'WEIGHT GAIN', 1200, 45, '1', 'NORMAL WEIGHT'),
(12, 'Weight Gain', 1200, 42, '1', 'UNDERWEIGHT');

-- --------------------------------------------------------

--
-- Table structure for table `plan_names`
--

CREATE TABLE `plan_names` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `Suggested_for_BMI` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan_names`
--

INSERT INTO `plan_names` (`plan_id`, `plan_name`, `Suggested_for_BMI`) VALUES
(9, 'Cardio', 'NORMAL WEIGHT');

-- --------------------------------------------------------

--
-- Table structure for table `prime_plans`
--

CREATE TABLE `prime_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_duration` char(2) NOT NULL,
  `plan_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prime_plans`
--

INSERT INTO `prime_plans` (`plan_id`, `plan_duration`, `plan_price`) VALUES
(1, '1', 3000),
(2, '3', 5000),
(3, '6', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `prime_videos`
--

CREATE TABLE `prime_videos` (
  `prime_video_id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `video_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prime_videos`
--

INSERT INTO `prime_videos` (`prime_video_id`, `video_name`, `location`, `image`, `video_type`) VALUES
(12, 'video4.mp4', '../Gym_portal1/videos/video_and_img/video4.mp4', '20.jpg', 'exercise'),
(19, 'Chappie Sample.mkv', '../Gym_portal1/videos/video_and_img/Chappie Sample.mkv', 'img_5.jpg', 'Yoga_And_Meditation');

-- --------------------------------------------------------

--
-- Table structure for table `temp_gym`
--

CREATE TABLE `temp_gym` (
  `tmp_gym_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `gym_name` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainer_gym`
--

CREATE TABLE `trainer_gym` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(30) NOT NULL,
  `trainer_age` int(11) NOT NULL,
  `trainer_experience` int(11) NOT NULL,
  `trainer_description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gym_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_gym`
--

INSERT INTO `trainer_gym` (`trainer_id`, `trainer_name`, `trainer_age`, `trainer_experience`, `trainer_description`, `image`, `gym_id`) VALUES
(2, 'yash', 21, 2, 'yyyy', 'gallery-2.jpg', NULL),
(4, 'umesh', 21, 11, 'umesh', 'gallery-1.jpg', NULL),
(5, 'yash', 11, 1, 'yash', 'data:image/jpg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QBMRXhpZgAATU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6', NULL),
(8, 'savan', 22, 1, 'avav', 'data:image/jpg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QBMRXhpZgAATU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6', NULL),
(10, 'yash', 11, 1, 'yy', 'data:image/jpg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QBMRXhpZgAATU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6', NULL),
(15, 'yash kothari', 21, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quas iste corporis asperiores pl', 'person_4.jpg', 18),
(16, 'jeet naik', 21, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quas iste corporis asperiores pl', 'person_3.jpg', 18),
(17, 'raj jayraj', 21, 1, '-overlay', 'person_1.jpg', 18),
(18, 'savan kothari', 19, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quas iste corporis asperiores pl', 'person_2.jpg', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_gym_transaction`
--
ALTER TABLE `customer_gym_transaction`
  ADD PRIMARY KEY (`Transaction_id`),
  ADD KEY `C_fk` (`customer_id`),
  ADD KEY `g_fk` (`gym_id`);

--
-- Indexes for table `customer_membership`
--
ALTER TABLE `customer_membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `gym_fk` (`gym_id`),
  ADD KEY `customer_fk` (`customer_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD KEY `Cust_fk` (`customer_id`);

--
-- Indexes for table `dietchart`
--
ALTER TABLE `dietchart`
  ADD PRIMARY KEY (`dietchart_id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`gym_id`),
  ADD KEY `gym_owner_id` (`gym_owner_id`),
  ADD KEY `test1` (`trainer_id`);

--
-- Indexes for table `gym_exercise`
--
ALTER TABLE `gym_exercise`
  ADD PRIMARY KEY (`gym_exercise_id`),
  ADD KEY `test3` (`gym_id`);

--
-- Indexes for table `gym_image`
--
ALTER TABLE `gym_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `gym_image_fk` (`gym_id`);

--
-- Indexes for table `gym_offers`
--
ALTER TABLE `gym_offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `gym_offer_fk` (`gym_id`),
  ADD KEY `plan_offer_fk` (`plan_id`);

--
-- Indexes for table `gym_owner`
--
ALTER TABLE `gym_owner`
  ADD PRIMARY KEY (`gym_owner_id`);

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`),
  ADD KEY `gym_id` (`gym_id`,`customer_id`),
  ADD KEY `rating_customer_fk` (`customer_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `gym_id` (`gym_id`);

--
-- Indexes for table `plan_names`
--
ALTER TABLE `plan_names`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `prime_plans`
--
ALTER TABLE `prime_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `prime_videos`
--
ALTER TABLE `prime_videos`
  ADD PRIMARY KEY (`prime_video_id`);

--
-- Indexes for table `temp_gym`
--
ALTER TABLE `temp_gym`
  ADD PRIMARY KEY (`tmp_gym_id`);

--
-- Indexes for table `trainer_gym`
--
ALTER TABLE `trainer_gym`
  ADD PRIMARY KEY (`trainer_id`),
  ADD KEY `test` (`gym_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer_membership`
--
ALTER TABLE `customer_membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `dietchart`
--
ALTER TABLE `dietchart`
  MODIFY `dietchart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `gym_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gym_exercise`
--
ALTER TABLE `gym_exercise`
  MODIFY `gym_exercise_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym_image`
--
ALTER TABLE `gym_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `gym_offers`
--
ALTER TABLE `gym_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gym_owner`
--
ALTER TABLE `gym_owner`
  MODIFY `gym_owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plan_names`
--
ALTER TABLE `plan_names`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prime_plans`
--
ALTER TABLE `prime_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prime_videos`
--
ALTER TABLE `prime_videos`
  MODIFY `prime_video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `temp_gym`
--
ALTER TABLE `temp_gym`
  MODIFY `tmp_gym_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trainer_gym`
--
ALTER TABLE `trainer_gym`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_gym_transaction`
--
ALTER TABLE `customer_gym_transaction`
  ADD CONSTRAINT `C_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `g_fk` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_membership`
--
ALTER TABLE `customer_membership`
  ADD CONSTRAINT `customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `gym_fk` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`),
  ADD CONSTRAINT `plan_foreignKey` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
  ADD CONSTRAINT `Cust_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gyms`
--
ALTER TABLE `gyms`
  ADD CONSTRAINT `gym_owner_fk` FOREIGN KEY (`gym_owner_id`) REFERENCES `gym_owner` (`gym_owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test1` FOREIGN KEY (`trainer_id`) REFERENCES `trainer_gym` (`trainer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gym_exercise`
--
ALTER TABLE `gym_exercise`
  ADD CONSTRAINT `test3` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gym_image`
--
ALTER TABLE `gym_image`
  ADD CONSTRAINT `gym_image_fk` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gym_offers`
--
ALTER TABLE `gym_offers`
  ADD CONSTRAINT `gym_offer_fk` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_offer_fk` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`plan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD CONSTRAINT `rating_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_gym_fk` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_fk` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainer_gym`
--
ALTER TABLE `trainer_gym`
  ADD CONSTRAINT `test` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`gym_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Expire` ON SCHEDULE EVERY 1 SECOND STARTS '2020-04-17 22:02:19' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Delete records when expire' DO DELETE FROM `adminpanel`.`customer_membership` WHERE `membership_end_date` < CURDATE()$$

CREATE DEFINER=`root`@`localhost` EVENT `Prime_expire` ON SCHEDULE EVERY 1 SECOND STARTS '2020-04-27 10:31:03' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Update customer table when membership expires' DO update  `adminpanel`.`customer` set membership_type='b',p_statrt_date=null,p_end_date=null WHERE `p_end_date` < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
