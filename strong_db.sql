-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 04:53 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strong_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access`
--

CREATE TABLE `tbl_access` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_access`
--

INSERT INTO `tbl_access` (`id`, `name`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 'Super Admin', '2022-10-07 21:21:01', '2022-10-07 21:21:01', 0),
(2, 'Branch Manager', '2022-10-07 21:21:01', '2022-10-07 21:21:01', 0),
(3, 'Trainer', '2022-10-07 21:21:01', '2022-10-07 21:21:01', 0),
(5, 'Customer', '2022-10-07 21:28:56', '2022-10-07 21:28:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `id` int(11) NOT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `customer_id` int(11) DEFAULT NULL,
  `workout_id` varchar(45) DEFAULT NULL,
  `reps` int(11) DEFAULT NULL,
  `sets` int(11) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `km` varchar(45) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `workout_target_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `sub_title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `name`, `description`, `created_date`, `updated_date`, `deleted_flag`, `sub_title`) VALUES
(1, 'Branch 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.z', '2022-10-07 21:31:07', '2022-10-07 21:31:07', 0, 'bagong filed'),
(2, 'Branch 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-07 21:31:07', '2022-10-07 21:31:07', 0, NULL),
(3, 'branch 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-07 21:31:07', '2022-10-07 21:31:07', 1, NULL),
(4, 'branch 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-31 21:57:43', '2022-10-31 21:57:43', 1, NULL),
(5, 'branch 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-31 22:23:57', '2022-10-31 22:23:57', 1, NULL),
(6, 'test', 'test', '2022-12-02 04:46:59', '2022-12-02 04:46:59', 1, NULL),
(7, 'test2113', 'test', '2022-12-02 04:48:06', '2022-12-02 04:48:06', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_plan`
--

CREATE TABLE `tbl_client_plan` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client_plan`
--

INSERT INTO `tbl_client_plan` (`id`, `client_id`, `plan_id`, `trainer_id`, `expiration_date`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 4, 1, 3, '2022-01-01', '2022-11-03 19:05:24', '2022-11-03 19:05:24', 1),
(2, 21, 1, 3, '2023-01-01', '2022-12-02 15:05:10', '2022-12-02 15:05:10', 1),
(3, 4, 1, 22, '2022-01-01', '2022-12-07 07:25:56', '2022-12-07 07:25:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`id`, `image`, `name`, `qty`, `description`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 'image_20221201220424.jpeg', 'Treadmill', 4, 'test', '2022-10-24 04:20:22', '2022-10-24 04:20:22', 0),
(2, 'default.png', 'Seated Dip Machine', 1, 'test', '2022-10-24 04:20:22', '2022-10-24 04:20:22', 0),
(3, 'default.png', 'Chest Press Machine', 1, NULL, '2022-10-24 04:20:22', '2022-10-24 04:20:22', 0),
(4, 'default.png', 'Bench Press', 1, NULL, '2022-10-24 04:20:22', '2022-10-24 04:20:22', 0),
(5, 'default.png', 'Incline Bench Press', 1, NULL, '2022-10-24 04:20:22', '2022-10-24 04:20:22', 0),
(6, 'default.png', 'Decline Bench Press', 1, NULL, '2022-10-24 04:20:22', '2022-10-24 04:20:22', 0),
(7, 'default.png', 'Preacher Curl Bench', 1, NULL, '2022-10-24 04:20:22', '2022-10-24 04:20:22', 0),
(8, 'default.png', 'test', NULL, 'test', '2022-12-02 05:17:04', '2022-12-02 05:17:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`id`, `name`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 'Male', '2022-10-07 21:37:54', '2022-10-07 21:37:54', 0),
(2, 'Female', '2022-10-07 21:37:54', '2022-10-07 21:37:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plan`
--

CREATE TABLE `tbl_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `per_month` varchar(45) DEFAULT NULL,
  `per_session` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `backup` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_plan`
--

INSERT INTO `tbl_plan` (`id`, `name`, `per_month`, `per_session`, `description`, `deleted_flag`, `backup`) VALUES
(1, 'Platinum', '1500', '150', 'Use of weights and body building machines', 0, '<li><i class=\"fa-solid fa-check\"></i> Use of weights and<br> body building machines</li>'),
(2, 'Gold', '700', '100', 'Use of weights and body building machines ', 0, '<li><i class=\"fa-solid fa-check\"></i>use of weights <br>and body building machines</li>'),
(3, 'Silver', '500', '70', 'Use of weights and body building onlysss', 0, '<li><i class=\"fa-solid fa-check\"></i> Use of weights <br>and body building <br> only</li>'),
(4, 'test', '1123', '123', 'test', 1, NULL),
(5, 'test', '123', '213', '213', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_progress`
--

CREATE TABLE `tbl_progress` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `workout_id` int(11) DEFAULT NULL,
  `reps` varchar(45) DEFAULT NULL,
  `sets` varchar(45) DEFAULT NULL,
  `duration` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_progress`
--

INSERT INTO `tbl_progress` (`id`, `customer_id`, `plan_id`, `workout_id`, `reps`, `sets`, `duration`, `date`) VALUES
(1, 4, 3, 4, '0', '0', NULL, '2022-12-18'),
(2, 4, 3, 2, '0', '0', NULL, '2022-12-18'),
(3, 4, 3, 1, '0', '0', NULL, '2022-12-18'),
(4, 4, 3, 6, '0', '0', NULL, '2022-12-18'),
(192, 4, 3, 6, '1', '1', NULL, '2022-12-19'),
(193, 4, 3, 2, '1', '2', NULL, '2022-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'default.png',
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `name`, `image`, `description`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 'Zumba', 'zumba.jpg', 'Zumba Is A Form Of Fitness Class In Which You Burn Off Calories By Dancing To Different Kinds Of Lively Tunes, Often Latin-American Inspired Such As Salsa, Merengue And Samba, But Also Other Types Of Modern Music Like Hip Hop And Bollywood (Music From The Indian Film Industry).a', '2022-11-07 18:02:52', '2022-11-07 18:02:52', 0),
(2, 'Taekwondo', 'taekwondo.jpg', 'Taekwondo Comes From Three Korean Words, Tae, \"Kick,\" Kwon, \"Fist Or Punch,\" And Do, \"The Art Of.\" That\'s A Pretty Good Description Of This Dynamic Martial Art, Which Involves Acrobatic Kicks And Graceful Punches. Like All Martial Arts, Taekwondo Isn\'t Just Combat — It\'s Also An Art And A Discipline.', '2022-11-07 18:02:52', '2022-11-07 18:02:52', 0),
(3, 'Muai Thai', 'muaythai.jpg', 'Muay Thai Is A Stand-Up Striking Sport, With Two Competitors In The Ring Throwing Punches, Elbows, Knees And Kicks At Each Other. Clinching, Sweeps And Throws Are Also Allowed.', '2022-11-07 18:02:52', '2022-11-07 18:02:52', 0),
(9, 'test', 'image_20221123180630.jpeg', 'test', '2022-11-24 01:06:30', '2022-11-24 01:06:30', 1),
(10, 'test', 'image_20221123180731.jpeg', 'test', '2022-11-24 01:07:31', '2022-11-24 01:07:31', 1),
(11, 'aaaaaaa', 'image_20221123181704.jpeg', 'aaaa', '2022-11-24 01:08:14', '2022-11-24 01:08:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `name`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 'FAT', '2022-10-07 21:54:06', '2022-10-07 21:54:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplements`
--

CREATE TABLE `tbl_supplements` (
  `id` int(11) NOT NULL,
  `image` varchar(225) DEFAULT 'default.png',
  `name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplements`
--

INSERT INTO `tbl_supplements` (`id`, `image`, `name`, `qty`, `price`, `description`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 'img1.webp', 'Prothin Whey Ripped', 1, 500, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-24 04:33:53', '2022-10-24 04:33:53', 0),
(2, 'img2.webp', 'Weider Amino Max 8000', NULL, 299, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-24 04:33:53', '2022-10-24 04:33:53', 0),
(3, 'img3.webp', 'Creatine Capsules', NULL, 164, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-24 04:33:53', '2022-10-24 04:33:53', 0),
(4, 'img4.webp', 'MuscleTech Muscle Builder', NULL, 1762, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.', '2022-10-24 04:33:53', '2022-10-24 04:33:53', 0),
(5, 'default.png', 'test', 123, 23, 'test', '2022-11-01 01:24:09', '2022-11-01 01:24:09', 1),
(6, 'default.png', '', 0, 0, 'test', '2022-11-07 18:45:12', '2022-11-07 18:45:12', 1),
(7, 'default.png', '', 0, 0, 'test', '2022-11-07 18:45:16', '2022-11-07 18:45:16', 1),
(8, 'default.png', '', 0, 0, 'test', '2022-11-07 18:45:21', '2022-11-07 18:45:21', 1),
(9, 'default.png', '', 0, 0, 'test', '2022-11-07 18:45:24', '2022-11-07 18:45:24', 1),
(10, 'image_20221123183046.jpeg', 'test', 230, 323, 'test', '2022-11-24 01:22:23', '2022-11-24 01:22:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `access_id` int(11) DEFAULT NULL,
  `client_plan_id` int(11) DEFAULT 0,
  `plan_expiration_date` date DEFAULT NULL,
  `verified` tinyint(4) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `access` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `branch_id`, `access_id`, `client_plan_id`, `plan_expiration_date`, `verified`, `created_date`, `updated_date`, `deleted_flag`, `access`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 1, 1, NULL, NULL, 1, '2022-10-07 21:25:06', '2022-10-07 21:25:06', 0, 'admin'),
(2, 'manager', 'manager@gmail.com', '123', 1, 2, NULL, NULL, 1, '2022-10-07 21:25:06', '2022-10-07 21:25:06', 0, 'admin'),
(3, 'trainer', 'trainer@gmail.com', '123', 1, 3, NULL, NULL, 1, '2022-10-07 21:25:06', '2022-10-07 21:25:06', 0, 'admin'),
(4, 'customer', 'customer@gmail.com', '123', 1, 5, 3, '2023-01-01', 1, '2022-10-07 21:29:59', '2022-10-07 21:29:59', 0, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE `tbl_user_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `picture` varchar(255) DEFAULT 'default.jpg',
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`id`, `first_name`, `middle_name`, `last_name`, `gender_id`, `contact_no`, `picture`, `created_date`, `updated_date`, `deleted_flag`, `address`) VALUES
(1, 'admin', 'admin', 'admin', 1, '09000000000', 'default.png', '2022-10-07 21:39:28', '2022-10-07 21:39:28', 0, 'admin'),
(2, 'manager', 'manager', 'manager', 1, '09000000000', 'default.png', '2022-10-07 21:39:28', '2022-10-07 21:39:28', 0, 'manager'),
(3, 'trainer', 'trainer', 'trainer', 1, '09000000000', 'default.png', '2022-10-07 21:39:28', '2022-10-07 21:39:28', 0, 'trainer'),
(4, 'customer', 'customer', 'customer', 1, '09000000000', 'default.png', '2022-10-07 21:39:28', '2022-10-07 21:39:28', 0, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workout`
--

CREATE TABLE `tbl_workout` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reps` int(11) DEFAULT NULL,
  `sets` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT 'None',
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_workout`
--

INSERT INTO `tbl_workout` (`id`, `name`, `reps`, `sets`, `duration`, `description`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(1, 'Barbel Bench Press', 12, 3, 'None', NULL, '2022-10-24 04:46:09', '2022-10-24 04:46:09', 0),
(2, 'Barbel Inclined Bench Press', 12, 3, 'None', NULL, '2022-10-24 04:46:09', '2022-10-24 04:46:09', 0),
(3, 'Dumbell Flyes', 12, 3, 'None', NULL, '2022-10-24 04:46:09', '2022-10-24 04:46:09', 0),
(4, 'Chest Dips', 12, 4, 'None', NULL, '2022-10-24 04:46:09', '2022-10-24 04:46:09', 0),
(5, 'Chest Dips', 12, 3, 'None', NULL, '2022-10-24 04:46:48', '2022-10-24 04:46:48', 0),
(6, 'Cardio', 2, 1, '30mins', 'test', '2022-10-24 04:49:42', '2022-10-24 04:49:42', 0),
(7, 'test', 1, 1, '1', 'test', '2022-12-02 05:26:21', '2022-12-02 05:26:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workout_plan`
--

CREATE TABLE `tbl_workout_plan` (
  `id` int(11) NOT NULL,
  `client_plan_id` int(11) DEFAULT NULL,
  `workout_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_workout_plan`
--

INSERT INTO `tbl_workout_plan` (`id`, `client_plan_id`, `workout_id`, `created_date`, `updated_date`, `deleted_flag`) VALUES
(59, 1, 3, '2022-11-14 23:57:48', '2022-11-14 23:57:48', 0),
(60, 1, 2, '2022-11-14 23:57:48', '2022-11-14 23:57:48', 0),
(61, 1, 6, '2022-11-14 23:57:48', '2022-11-14 23:57:48', 0),
(62, 1, 1, '2022-12-02 15:05:10', '2022-12-02 15:05:10', 0),
(63, 1, 3, '2022-12-02 15:05:10', '2022-12-02 15:05:10', 0),
(64, 1, 5, '2022-12-02 15:05:10', '2022-12-02 15:05:10', 0),
(65, 1, 4, '2022-12-02 15:05:10', '2022-12-02 15:05:10', 0),
(91, 2, 1, '2022-12-07 15:04:36', '2022-12-07 15:04:36', 0),
(92, 2, 1, '2022-12-07 15:04:36', '2022-12-07 15:04:36', 0),
(93, 2, 1, '2022-12-07 15:04:36', '2022-12-07 15:04:36', 0),
(94, 2, 1, '2022-12-07 15:04:36', '2022-12-07 15:04:36', 0),
(99, 3, 4, '2022-12-18 19:44:54', '2022-12-18 19:44:54', 0),
(100, 3, 2, '2022-12-18 19:44:54', '2022-12-18 19:44:54', 0),
(101, 3, 1, '2022-12-18 19:44:54', '2022-12-18 19:44:54', 0),
(102, 3, 6, '2022-12-18 19:44:54', '2022-12-18 19:44:54', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_access`
--
ALTER TABLE `tbl_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client_plan`
--
ALTER TABLE `tbl_client_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_supplements`
--
ALTER TABLE `tbl_supplements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_workout`
--
ALTER TABLE `tbl_workout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_workout_plan`
--
ALTER TABLE `tbl_workout_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access`
--
ALTER TABLE `tbl_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_client_plan`
--
ALTER TABLE `tbl_client_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_supplements`
--
ALTER TABLE `tbl_supplements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_workout`
--
ALTER TABLE `tbl_workout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_workout_plan`
--
ALTER TABLE `tbl_workout_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
