-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 03:31 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `skill_master`
--

CREATE TABLE `skill_master` (
  `id` int(10) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill_master`
--

INSERT INTO `skill_master` (`id`, `skill_name`, `created_at`, `updated_at`) VALUES
(1, '  Ajax', '2022-01-10 13:15:51.000000', '2022-03-02 11:28:09.524052'),
(2, ' Laravel ', '2022-01-11 09:42:50.000000', '2022-01-12 01:31:15.936092'),
(3, 'PHP', '2022-01-11 14:33:13.000000', '2022-01-11 08:03:13.663472'),
(4, 'WordPress', '2022-01-11 14:33:25.000000', '2022-01-11 08:03:25.535290'),
(5, 'JavaScript', '2022-01-12 06:23:55.000000', '2022-01-11 23:53:55.228855'),
(6, 'NodeJS', '2022-01-12 06:24:06.000000', '2022-01-11 23:54:06.666412'),
(7, 'Reactive Native', '2022-01-12 06:24:16.000000', '2022-01-11 23:54:16.941717'),
(8, 'VueJS', '2022-01-12 06:24:57.000000', '2022-01-11 23:54:57.749576'),
(9, 'AngularJS', '2022-01-12 06:25:20.000000', '2022-01-11 23:55:20.940725'),
(10, 'jQuery', '2022-01-12 06:25:30.000000', '2022-01-11 23:55:30.558391'),
(11, 'NextJS', '2022-01-12 06:25:59.000000', '2022-01-11 23:55:59.591515'),
(12, 'Symphony', '2022-01-12 12:37:21.000000', '2022-01-12 06:07:21.762419'),
(13, 'Phalcon', '2022-01-12 12:37:34.000000', '2022-01-12 06:07:34.852397'),
(14, 'FuelPHP', '2022-01-12 12:37:45.000000', '2022-01-12 06:07:45.170485'),
(15, 'PHPPixie', '2022-01-12 12:38:16.000000', '2022-01-12 06:08:16.116087'),
(16, 'Laminas Project', '2022-01-12 12:38:52.000000', '2022-01-12 06:08:52.070709'),
(17, 'CodeIgniter ', '2022-01-12 12:39:19.000000', '2022-01-12 06:09:19.103975'),
(18, 'Slim', '2022-01-12 12:39:32.000000', '2022-01-12 06:09:32.996497'),
(19, 'CakePHP', '2022-01-12 12:39:49.000000', '2022-01-12 06:09:49.417414'),
(20, 'Yii', '2022-01-12 12:39:58.000000', '2022-01-12 06:09:58.359802'),
(21, '  Angular Native JS', '2022-01-12 06:24:25.000000', '2022-03-01 12:08:57.762648'),
(23, 'Laravel PHP Developer', '2022-01-26 06:03:50.000000', '2022-01-26 05:03:50.771926'),
(26, 'Mern Stack Developer', '2022-03-02 15:22:02.000000', '2022-03-02 14:22:02.675803');

-- --------------------------------------------------------

--
-- Table structure for table `userskill`
--

CREATE TABLE `userskill` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userskill`
--

INSERT INTO `userskill` (`id`, `uid`, `sid`, `created_at`, `updated_at`) VALUES
(11, 5, 0, '2022-02-05', '2022-02-05 05:55:09'),
(12, 5, 0, '2022-02-05', '2022-02-05 05:55:09'),
(13, 6, 0, '2022-02-07', '2022-02-07 05:00:37'),
(14, 6, 0, '2022-02-07', '2022-02-07 05:00:37'),
(15, 6, 0, '2022-02-07', '2022-02-07 05:00:37'),
(16, 6, 0, '2022-02-07', '2022-02-07 05:00:37'),
(17, 7, 0, '2022-03-02', '2022-03-02 05:38:01'),
(18, 7, 0, '2022-03-02', '2022-03-02 05:38:01'),
(19, 7, 0, '2022-03-02', '2022-03-02 05:38:01'),
(20, 7, 0, '2022-03-02', '2022-03-02 05:38:01'),
(21, 8, 0, '2022-03-02', '2022-03-02 10:08:19'),
(22, 8, 0, '2022-03-02', '2022-03-02 10:08:19'),
(23, 8, 0, '2022-03-02', '2022-03-02 10:08:19'),
(24, 8, 0, '2022-03-02', '2022-03-02 10:08:19'),
(25, 8, 0, '2022-03-02', '2022-03-02 10:08:19'),
(26, 9, 0, '2022-03-02', '2022-03-02 13:33:03'),
(27, 9, 0, '2022-03-02', '2022-03-02 13:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(10) NOT NULL,
  `roll_id` varchar(255) NOT NULL,
  `user_status` varchar(255) NOT NULL,
  `is_login` varchar(255) NOT NULL DEFAULT '0',
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_mobile_no` varchar(255) NOT NULL,
  `u_profile_image` text NOT NULL,
  `user_skill` varchar(255) NOT NULL,
  `u_address` text NOT NULL,
  `u_birthdate` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `roll_id`, `user_status`, `is_login`, `u_name`, `u_password`, `u_email`, `u_mobile_no`, `u_profile_image`, `user_skill`, `u_address`, `u_birthdate`, `created_at`, `updated_at`) VALUES
(5, '1', '1', '1', 'Nevil Makadia', 'b318924424f6a8431e637a151064b49e', 'nevilmakadia@gmail.com', '8140160083', '121IMG_20200126_105043.jpg', 'WordPress,', 'Bhayavadar', '2022-02-05', '2022-02-05 06:55:09', '2022-02-05 05:55:09.815976'),
(6, '1', '0', '0', 'Mohit Odakhiya', '1f1f4a37ea38693c4e0358bfa5cefeee', 'mohitodakhiya@gmail.com', '7487879229', 'avatar4.png', 'Symphony,', 'Rajkot', '2022-02-07', '2022-02-07 06:00:37', '2022-03-02 09:30:04.000000'),
(8, '2', '1', '0', 'Demo User', '91017d590a69dc49807671a51f10ab7f', 'demo@user.com', '9998887776', '621avatar5.png', 'Phalcon,', 'Rajkot', '2022-03-03', '2022-03-02 11:08:19', '2022-03-02 08:56:19.000000'),
(9, '2', '0', '0', 'abcdefgh', 'e2fc714c4727ee9395f324cd2e7f331f', 'abcdefgh@gmail.com', '8485868788', 'user1-128x128.jpg', 'VueJS,', 'Junagadh', '2022-03-04', '2022-03-02 14:33:03', '2022-03-02 09:56:09.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skill_master`
--
ALTER TABLE `skill_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userskill`
--
ALTER TABLE `userskill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skill_master`
--
ALTER TABLE `skill_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userskill`
--
ALTER TABLE `userskill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
