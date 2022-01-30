-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 01:49 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schapp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_tab`
--

CREATE TABLE `class_tab` (
  `class_id` int(6) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_alias` varchar(20) NOT NULL,
  `class_category` varchar(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `class_arm` varchar(4) NOT NULL,
  `class_num` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_tab`
--

INSERT INTO `class_tab` (`class_id`, `clientapp_id`, `class_name`, `class_alias`, `class_category`, `staff_id`, `class_arm`, `class_num`, `status`, `date`) VALUES
(1, 1, 'KG', 'Kg', 'None', 0, 'None', 10, 1, '2017-12-11'),
(2, 1, 'Nursery 1', 'Nur 1', 'None', 1, 'A', 20, 1, '2017-12-11'),
(3, 1, 'Nursery 2', 'Nur 2', 'None', 2, 'A', 20, 1, '2017-12-13'),
(4, 1, 'Nursery 3', 'Nur 3', 'None', 1, 'A', 15, 1, '2017-12-14'),
(5, 1, 'Nursery 1', 'Nur 1', 'None', 3, 'B', 18, 1, '2017-12-14'),
(15, 1, 'Primary 1', 'Pry 1', 'None', 3, 'A', 23, 1, '2017-12-14'),
(16, 1, 'Primary 4', 'Pry 4', 'None', 3, 'A', 23, 1, '2017-12-15'),
(20, 1, 'Primary 2', 'Pry 2', 'None', 2, 'A', 34, 1, '2017-12-15'),
(21, 1, 'Primary 3', 'Pry 3', 'None', 2, 'A', 20, 1, '2017-12-15'),
(22, 1, 'Primary 5', 'Pry 5', 'None', 2, 'A', 30, 1, '2017-12-15'),
(23, 1, 'Primary 6', 'Pry 6', 'None', 1, 'A', 23, 1, '2017-12-15'),
(24, 1, 'Junior Secondary School 1', 'Jss 1', 'None', 2, 'A', 23, 1, '2017-12-15'),
(30, 1, 'Junior Secondary School 1', 'Jss 1', 'None', 2, 'B', 20, 1, '2017-12-15'),
(32, 1, 'Junior Secondary School 2', 'Jss 2', 'None', 2, 'C', 12, 1, '2017-12-15'),
(33, 1, 'Junior Secondary School 2', 'JSS 2', 'None', 2, 'A', 45, 1, '2018-01-22'),
(34, 1, 'Junior Secondary School 1', 'JSS 1', 'None', 1, 'D', 90, 1, '2018-01-22'),
(35, 1, 'Primary 5', 'Primary 5', 'None', 1, 'A', 232, 1, '2018-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `client_table`
--

CREATE TABLE `client_table` (
  `clientapp_id` bigint(20) NOT NULL,
  `clientapp_name` varchar(100) NOT NULL,
  `clientapp_package` varchar(20) NOT NULL,
  `clientapp_number` varchar(20) NOT NULL,
  `clientapp_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_tab`
--

CREATE TABLE `message_tab` (
  `msg_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `msg_subject` varchar(100) NOT NULL,
  `msg_to` varchar(20) NOT NULL,
  `msg_body` varchar(1000) NOT NULL,
  `msg_sender` varchar(20) NOT NULL,
  `msg_senderid` int(12) NOT NULL,
  `msg_date` date NOT NULL,
  `msg_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_tab`
--

INSERT INTO `message_tab` (`msg_id`, `clientapp_id`, `msg_subject`, `msg_to`, `msg_body`, `msg_sender`, `msg_senderid`, `msg_date`, `msg_time`) VALUES
(1, 1, 'Kcniobio', 'Admin', 'Bbvbiuio', 'staff', 2, '2018-01-31', '04:15:00'),
(2, 1, 'Testing mail', 'Admin', 'This is another test mail for staff', 'staff', 2, '2018-01-31', '04:17:00'),
(4, 1, 'Admin test', 'Staffs', 'Tdtydtydtudyugvigog', 'Admin', 1, '2018-01-31', '09:37:00'),
(5, 1, 'Another test', 'School Admin', 'Jkihihiohpohophophh', 'staff', 2, '2018-01-31', '09:38:00'),
(6, 1, 'Tettetet', 'School Admin', 'Jcdjkdbihihiohibh', 'staff', 2, '2018-02-01', '12:33:00'),
(7, 1, 'Jjjjjjjj', 'School Admin', 'Lkdcnklnnlkniond', 'staff', 2, '2018-02-01', '12:36:00'),
(8, 1, 'Ksnxshlih', 'Staffs', 'Kshikhiohsd', 'Admin', 1, '2018-02-01', '01:35:00'),
(9, 1, 'Lkdnlknnm;ponmjopjopj', 'Staffs', 'Kjdckuuguioghiuocdc', 'Admin', 1, '2018-02-01', '01:36:00'),
(10, 1, 'MnmnmnmIDSHIOH', 'Staffs', 'IHDSIOHHGHO', 'Admin', 1, '2018-02-01', '01:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `newsevent_tab`
--

CREATE TABLE `newsevent_tab` (
  `ne_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `ne_title` varchar(200) NOT NULL,
  `ne_body` varchar(1000) NOT NULL,
  `ne_type` varchar(10) NOT NULL,
  `publish_date` varchar(10) NOT NULL,
  `publish_time` varchar(10) NOT NULL,
  `publish_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsevent_tab`
--

INSERT INTO `newsevent_tab` (`ne_id`, `clientapp_id`, `ne_title`, `ne_body`, `ne_type`, `publish_date`, `publish_time`, `publish_status`) VALUES
(1, 1, 'The first news', 'This is our first news', 'News', '2018-02-01', '10:32 am', 1),
(2, 1, 'Kjcbkjbiokob', 'Iohoihiohip', 'News', '2018-02-01', '11:01 am', 1),
(3, 1, 'Event first', 'This is our first ever event', 'Event', '2018-02-01', '11:05 am', 1),
(4, 1, 'Kjddiob', 'Ibbiobiu', 'News', '2018-02-01', '11:47 am', 1),
(5, 1, 'Just in case', 'Kfkjbuggoiugodd', 'News', '2018-02-01', '12:02 pm', 1),
(6, 1, 'New event', 'Kdfninionindionsdids', 'Event', '2018-02-01', '12:04 pm', 1),
(7, 1, 'Tetstgdgxgg', 'Gdgxbggbgddgdhgdhdhd', 'News', '2018-02-01', '12:09 pm', 1),
(8, 1, 'Just in', 'Kjdfkjnvndoniodnbdid', 'Event', '2018-02-01', '12:16 pm', 1),
(9, 1, 'Kjdciubciubicxbio', 'Kjbijbiuoiuobiuob', 'Event', '2018-02-01', '12:18 pm', 1),
(10, 1, 'Jdshbhvhv', 'Biugigugvvgf', 'Event', '2018-02-01', '12:26 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_login`
--

CREATE TABLE `parent_login` (
  `parent_id` int(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `parent_phone` varchar(20) NOT NULL,
  `parent_username` varchar(50) NOT NULL,
  `parent_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_login`
--

INSERT INTO `parent_login` (`parent_id`, `clientapp_id`, `parent_phone`, `parent_username`, `parent_password`) VALUES
(1, 1, '08083303108', 'Akapaalero', '$2y$10$a2hbxZKaTH7Z7eO1emOGw.Qy6GmakKMcWchUvOWEMxKTHM345L8nC'),
(7, 1, '84834380', 'kjjkbjdb', '$2y$10$p9Rl4eJmqopumSs4Xi1ekuaQNWZBXn2U3xq0sltmFOscv95lW.D5m'),
(8, 1, '383939879', 'test', '$2y$10$vww3rH6bV/OyOr8kdhRjKOYRkv9Zjc6Sct4R3.57QDT1ft7MLCCsy'),
(9, 1, '', '', '$2y$10$cLsBb6A3XRnOJthJgRigyexOoLYbemAg7LeuzkfJ07OFiai3WmuE.');

-- --------------------------------------------------------

--
-- Table structure for table `schadmin_tab`
--

CREATE TABLE `schadmin_tab` (
  `adm_id` int(3) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schadmin_tab`
--

INSERT INTO `schadmin_tab` (`adm_id`, `clientapp_id`, `username`, `password`, `role`) VALUES
(1, 1, 'schooladmin', '$2y$10$UfKITH7M3jNtcgirfuEOvuJZu4pW.AtYKwBHFqh46d9RW91SRa6/e', 'Systemadmin'),
(10, 10, 'obmsadmin', '$2y$10$MUGBGpx8D.HNbEY3VT8hD.uIExWkD/1.beW9S4pK163hTte8Dg7Em', 'Systemadmin');

-- --------------------------------------------------------

--
-- Table structure for table `scoresheet_tab`
--

CREATE TABLE `scoresheet_tab` (
  `score_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `student_class` varchar(50) NOT NULL,
  `exam_session` varchar(15) NOT NULL,
  `exam_term` varchar(10) NOT NULL,
  `exam_type` varchar(10) NOT NULL,
  `exam_subject` varchar(100) NOT NULL,
  `mark` float NOT NULL,
  `exam_date` varchar(10) NOT NULL,
  `reg_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoresheet_tab`
--

INSERT INTO `scoresheet_tab` (`score_id`, `clientapp_id`, `student_id`, `student_class`, `exam_session`, `exam_term`, `exam_type`, `exam_subject`, `mark`, `exam_date`, `reg_date`) VALUES
(1, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', '', 50, '2018-01-23', '2018-01-29'),
(2, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', '', 50, '2018-01-23', '2018-01-29'),
(3, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', '', 70, '2018-01-24', '2018-01-29'),
(4, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', '', 50, '2018-01-24', '2018-01-29'),
(5, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', 'Econimics', 73.432, '2018-01-17', '2018-01-30'),
(6, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', 'Econimics', 40.44, '2018-01-17', '2018-01-30'),
(7, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'FirstCA', 'Fine Art', 0, '2018-01-25', '2018-01-30'),
(8, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'FirstCA', 'Fine Art', 0, '2018-01-25', '2018-01-30'),
(9, 1, 18, 'Junior Secondary School 1', '2018/2019', '', 'termexam', 'Economics', 67, '2018-02-16', '2018-02-02'),
(10, 1, 19, 'Junior Secondary School 1', '2018/2019', '', 'termexam', 'Economics', 72, '2018-02-16', '2018-02-02'),
(11, 1, 18, 'Junior Secondary School 1', '2018/2019', '', 'termexam', 'Economics', 45, '2018-02-01', '2018-02-02'),
(12, 1, 19, 'Junior Secondary School 1', '2018/2019', '', 'termexam', 'Economics', 87, '2018-02-01', '2018-02-02'),
(13, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Fine Art', 33, '2018-02-01', '2018-02-02'),
(14, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Fine Art', 33, '2018-02-01', '2018-02-02'),
(15, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'FirstCA', 'Economics', 4, '2018-02-01', '2018-02-02'),
(16, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'FirstCA', 'Economics', 5, '2018-02-01', '2018-02-02'),
(17, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 40, '2018-02-01', '2018-02-03'),
(18, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 30, '2018-02-01', '2018-02-03'),
(19, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 40, '2018-02-01', '2018-02-03'),
(20, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 30, '2018-02-01', '2018-02-03'),
(21, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'FirstCA', 'Fine Art', 6, '2018-02-01', '2018-02-03'),
(22, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'FirstCA', 'Fine Art', 7, '2018-02-01', '2018-02-03'),
(23, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 48, '2018-02-01', '2018-02-03'),
(24, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 38, '2018-02-01', '2018-02-03'),
(25, 1, 18, 'Junior Secondary School 1', '2018/2019', '', 'termexam', 'Economics', 64, '2018-02-01', '2018-02-03'),
(26, 1, 19, 'Junior Secondary School 1', '2018/2019', '', 'termexam', 'Economics', 35, '2018-02-01', '2018-02-03'),
(27, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Fine Art', 10, '2018-02-01', '2018-02-03'),
(28, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Fine Art', 20, '2018-02-01', '2018-02-03'),
(29, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Fine Art', 10, '2018-02-01', '2018-02-03'),
(30, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Fine Art', 20, '2018-02-01', '2018-02-03'),
(31, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 10, '2018-02-01', '2018-02-03'),
(32, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 20, '2018-02-01', '2018-02-03'),
(33, 1, 11, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 10, '2018-02-01', '2018-02-03'),
(34, 1, 17, 'Junior Secondary School 2', '2018/2019', '', 'termexam', 'Econimics', 20, '2018-02-01', '2018-02-03'),
(35, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', 'Fine Art', 10, '2018-02-01', '2018-02-03'),
(36, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'termexam', 'Fine Art', 30, '2018-02-01', '2018-02-03'),
(37, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'FirstCA', 'Fine Art', 5, '2018-02-01', '2018-02-03'),
(38, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'FirstCA', 'Fine Art', 4, '2018-02-01', '2018-02-03'),
(39, 1, 11, 'Junior Secondary School 2', '2018/2019', 'First', 'ThirdCA', 'Fine Art', 10, '2018-02-02', '2018-02-03'),
(40, 1, 17, 'Junior Secondary School 2', '2018/2019', 'First', 'ThirdCA', 'Fine Art', 10, '2018-02-02', '2018-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `setpayment`
--

CREATE TABLE `setpayment` (
  `pay_id` int(6) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `pay_name` varchar(100) NOT NULL,
  `pay_class` varchar(100) NOT NULL,
  `pay_amount` decimal(12,3) NOT NULL,
  `pay_desc` varchar(200) NOT NULL,
  `status` tinytext NOT NULL,
  `payadd_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setpayment`
--

INSERT INTO `setpayment` (`pay_id`, `clientapp_id`, `pay_name`, `pay_class`, `pay_amount`, `pay_desc`, `status`, `payadd_date`) VALUES
(1, 1, 'School Fees', 'Nursery 1', '200000.000', 'kjskjbbolsz', '1', '2018-02-02'),
(2, 1, 'School Fees', 'Nursery 3', '300000.000', 'kjdnoniuouon', '1', '2018-02-02'),
(3, 1, 'School Fees', 'Nursery 2', '300000.000', 'dniohiodhhhddff', '1', '2018-02-02'),
(4, 1, 'Escortion', 'Junior Secondary School 2', '1000.000', 'kjddnionnf', '1', '2018-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `setting_tab`
--

CREATE TABLE `setting_tab` (
  `clientapp_id` bigint(20) NOT NULL,
  `clientapp_name` varchar(200) NOT NULL,
  `clientapp_logo` varchar(300) NOT NULL,
  `clientapp_email` varchar(300) NOT NULL,
  `clientapp_mobile` varchar(20) NOT NULL,
  `reg_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_tab`
--

INSERT INTO `setting_tab` (`clientapp_id`, `clientapp_name`, `clientapp_logo`, `clientapp_email`, `clientapp_mobile`, `reg_date`) VALUES
(1, 'OASOS', 'schlogo/agrii.png', 'nathanieladeniran@gmail.com', '08168905925', '2018-02-02'),
(10, 'OBMS', 'schlogo/agrii.png', 'nathanieladeniran@gmail.com', '08168905925', '2018-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `staffattend_tab`
--

CREATE TABLE `staffattend_tab` (
  `sat_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `attendance_status` tinyint(1) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffattend_tab`
--

INSERT INTO `staffattend_tab` (`sat_id`, `clientapp_id`, `staff_id`, `attendance_status`, `date`) VALUES
(1, 1, 1, 1, '2017-12-01'),
(2, 1, 2, 0, '2017-12-01'),
(3, 1, 1, 1, '2017-12-04'),
(4, 1, 2, 1, '2017-12-04'),
(5, 1, 1, 0, '2017-12-05'),
(6, 1, 2, 0, '2017-12-05'),
(7, 1, 1, 0, '2017-12-05'),
(8, 1, 2, 0, '2017-12-05'),
(9, 1, 1, 1, '2017-12-05'),
(10, 1, 2, 0, '2017-12-05'),
(11, 1, 1, 1, '2017-12-05'),
(12, 1, 2, 1, '2017-12-05'),
(13, 1, 1, 1, '2018-01-22'),
(14, 1, 2, 1, '2018-01-22'),
(15, 1, 3, 1, '2018-01-22'),
(16, 1, 4, 0, '2018-01-22'),
(17, 1, 5, 1, '2018-01-22'),
(18, 1, 1, 0, '2018-02-02'),
(19, 1, 2, 1, '2018-02-02'),
(20, 1, 3, 0, '2018-02-02'),
(21, 1, 4, 1, '2018-02-02'),
(22, 1, 5, 0, '2018-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `id` int(12) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `staff_username` varchar(100) NOT NULL,
  `staff_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`id`, `clientapp_id`, `staff_id`, `staff_username`, `staff_password`) VALUES
(3, 1, 2, 'boluwaji', '$2y$10$rKLK6GJ5OjBicd2tt9sKeuPWMLUEcvdi0/iQsYwfe6w26MZTcv3a2'),
(4, 1, 1, 'falana', '$2y$10$X4.81jomoUIulZbOSbRXZul/X.bT.FBLYOw2MCokDAuBRAzoOyHWC');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tab`
--

CREATE TABLE `staff_tab` (
  `staff_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `staff_lname` varchar(100) NOT NULL,
  `staff_fname` varchar(100) NOT NULL,
  `staff_oname` varchar(100) NOT NULL,
  `staff_title` varchar(4) NOT NULL,
  `staff_year` varchar(6) NOT NULL,
  `staff_nation` varchar(100) NOT NULL,
  `staff_state` varchar(50) NOT NULL,
  `staff_dob` varchar(10) NOT NULL,
  `staff_email` varchar(250) NOT NULL,
  `staff_phone` varchar(20) NOT NULL,
  `staff_gender` varchar(6) NOT NULL,
  `staff_address` varchar(250) NOT NULL,
  `staff_type` varchar(20) NOT NULL,
  `staff_num` varchar(20) NOT NULL,
  `gfullname` varchar(150) NOT NULL,
  `gothername` varchar(50) NOT NULL,
  `gtitle` varchar(5) NOT NULL,
  `gmobile` varchar(20) NOT NULL,
  `gemail` varchar(250) NOT NULL,
  `gaddress` varchar(250) NOT NULL,
  `grelationship` varchar(30) NOT NULL,
  `gcity` varchar(50) NOT NULL,
  `goccupation` varchar(50) NOT NULL,
  `staff_pics` varchar(250) NOT NULL,
  `cstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tab`
--

INSERT INTO `staff_tab` (`staff_id`, `clientapp_id`, `staff_lname`, `staff_fname`, `staff_oname`, `staff_title`, `staff_year`, `staff_nation`, `staff_state`, `staff_dob`, `staff_email`, `staff_phone`, `staff_gender`, `staff_address`, `staff_type`, `staff_num`, `gfullname`, `gothername`, `gtitle`, `gmobile`, `gemail`, `gaddress`, `grelationship`, `gcity`, `goccupation`, `staff_pics`, `cstatus`) VALUES
(1, 1, 'Falana', 'Samson', 'Olalekan', 'Mr.', '2009', 'Bangladesh', 'Rangamati', '2017-11-08', 'olumideadeniran@gmail.com', '0898882882888', 'Male', 'fvv fvvfvf', 'Teaching Staff', '223', 'Falana Falz', 'fgbfg', 'Dr.', '56676677667', 'n@m.com', 'nfhmmnnnh', 'Father', 'djhnhnhhnhn', 'bgbnbnbnbnbn', 'staffimage/logo.png', 1),
(2, 1, 'Abiona', 'Boluwaji', 'Taichi', 'Dr.', '2009', 'Bahamas', 'Ragged Island', '2017-11-03', 'ab@yahoo.com', '4443555', 'Female', 'lkdsiosboi', 'Non-Teaching Staff', '000034', 'oioiboibbob', 'iobibibi', 'Dr.', '7237237878', 'n@m.com', 'linpooh', 'Father', 'linpoi', 'lnponh', 'staffimage/IMG-20150310-WA0001.jpg', 1),
(3, 1, 'Ashaleye', 'Samuel', 'Adeoti', 'Mr.', '1990', 'Nigeria', 'Oyo', '2017-08-16', 'basten@yahoo.com', '08168905925', 'Male', 'jdjninindi', 'Teaching Staff', '063', 'fdkjbcibiob', 'isdbidbsiub', 'Dr.', '08948088458', 'n@m.com', 'kldfnon', 'Father', 'oinoipn', 'odcjohop', 'staffimage/kl2.jpg', 1),
(4, 1, 'Knkln;dndofn;', 'Lihn;oh', 'Inhpohn', 'Dr.', '1990', 'Azerbaijan', 'Beylaqan Rayonu', '2017-12-01', 'n@m.com', '74777', 'Male', 'dhzdfdff', 'Teaching Staff', '222', 'sddxbdxxf', 'zbdxb', 'Dr.', '7378367', 'n@m.com', 'kjbsdb', 'Father', 'jdfbkbl', 'x,nlkdf', 'staffimage/IMG-20150414-WA0001.jpg', 1),
(5, 1, 'Kvnklcvnln', 'Lnionoipn', 'Lkcnkcn', 'Mr.', '1990', 'Austria', 'Tirol', '2018-01-18', 'n@j.copm', '898944994499', 'Male', 'dcnkhdidfd', 'Teaching Staff', '9955', 'dhcd', 'kdcn', 'Dr.', '009989999', 'n@m.com', 'iudcgiugo', 'Father', 'ug8g', 'lhdlhdf', 'staffimage/IMG-20150604-WA0001.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stdattend_tab`
--

CREATE TABLE `stdattend_tab` (
  `at_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `student_class` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `csession` varchar(15) NOT NULL,
  `attendance_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdattend_tab`
--

INSERT INTO `stdattend_tab` (`at_id`, `clientapp_id`, `student_id`, `student_class`, `month`, `year`, `day`, `date`, `csession`, `attendance_status`) VALUES
(1, 1, 10, '', '', '', '', '2017-12-05', '', 0),
(2, 1, 4, 'SSS 2', '', '', '', '2017-12-05', '', 0),
(3, 1, 11, 'SSS 2', '', '', '', '2017-12-05', '', 0),
(4, 1, 14, 'SSS 2', '', '', '', '2017-12-05', '', 0),
(5, 1, 17, 'SSS 2', '', '', '', '2017-12-05', '', 0),
(6, 1, 8, 'SSS 1', '', '', '', '2017-12-05', '', 0),
(7, 1, 27, 'SSS 1', '', '', '', '2017-12-05', '', 0),
(8, 1, 8, 'SSS 1', '', '', '', '2017-12-05', '', 0),
(9, 1, 27, 'SSS 1', '', '', '', '2017-12-05', '', 0),
(10, 1, 8, 'SSS 1', '', '', '', '2017-12-05', '', 1),
(11, 1, 27, 'SSS 1', '', '', '', '2017-12-05', '', 0),
(12, 1, 30, 'KG', '', '', '', '2018-01-22', '', 1),
(14, 1, 4, 'Junior Secondary School 2', '', '', '', '2018-01-25', '', 1),
(15, 1, 11, 'Junior Secondary School 2', '', '', '', '2018-01-25', '', 0),
(16, 1, 17, 'Junior Secondary School 2', '', '', '', '2018-01-25', '', 1),
(17, 1, 11, 'Junior Secondary School 2', '', '', '', '2018-01-26', '', 0),
(18, 1, 17, 'Junior Secondary School 2', '', '', '', '2018-01-26', '', 1),
(19, 1, 11, 'Junior Secondary School 2', 'January', '2018', 'Wednesday', '2018-01-31', '2018/2019', 1),
(20, 1, 17, 'Junior Secondary School 2', 'January', '2018', 'Wednesday', '2018-01-31', '2018/2019', 0),
(21, 1, 4, 'Junior Secondary School 2', 'January', '2018', 'Wednesday', '2018-01-31', '2018/2019', 1),
(22, 1, 18, 'Junior Secondary School 1', 'January', '2018', 'Wednesday', '2018-01-31', '2018/2019', 1),
(23, 1, 19, 'Junior Secondary School 1', 'January', '2018', 'Wednesday', '2018-01-31', '2018/2019', 0),
(24, 1, 14, 'SSS 2', '', '', '', '2018-02-02', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_tab`
--

CREATE TABLE `student_tab` (
  `student_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `oname` varchar(100) NOT NULL,
  `semail` varchar(250) NOT NULL,
  `admission_year` varchar(6) NOT NULL,
  `grad_year` varchar(6) NOT NULL,
  `current_class` varchar(50) NOT NULL,
  `current_arm` varchar(4) NOT NULL,
  `rollnum` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `current_session` varchar(12) NOT NULL,
  `current_term` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `state_origin` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `payment_status` varchar(12) NOT NULL,
  `parent_name` varchar(150) NOT NULL,
  `parent_oname` varchar(70) NOT NULL,
  `parent_title` varchar(6) NOT NULL,
  `pemail` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `parent_phone` varchar(20) NOT NULL,
  `current_city` varchar(25) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `pics` varchar(250) NOT NULL,
  `regdate` date NOT NULL,
  `std_username` varchar(50) NOT NULL,
  `std_password` varchar(250) NOT NULL,
  `status` varchar(15) NOT NULL,
  `std_hobby` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_tab`
--

INSERT INTO `student_tab` (`student_id`, `clientapp_id`, `lname`, `fname`, `oname`, `semail`, `admission_year`, `grad_year`, `current_class`, `current_arm`, `rollnum`, `age`, `current_session`, `current_term`, `gender`, `nationality`, `state_origin`, `dob`, `payment_status`, `parent_name`, `parent_oname`, `parent_title`, `pemail`, `address`, `parent_phone`, `current_city`, `occupation`, `relationship`, `pics`, `regdate`, `std_username`, `std_password`, `status`, `std_hobby`) VALUES
(4, 1, 'ADENIRAN', 'Babajide', 'John', 'olumideadeniran@gmail.com', '2012', '2018', 'Junior Secondary School 2', 'A', '4', 15, '2017/2018', 'First Term', 'Male', 'South Africa', 'KwaZulu-Natal', '2017-11-11', 'Paid', 'ADENIRAN Mathew', 'Adebimpe', 'Mr.', 'adebimpe.mathew@gmail.com', 'kndiohiohs', '08083303108', 'Ibadan', 'retired', 'Father', 'stdimage/images-5.jpeg', '2017-11-13', '0', '', '0', ''),
(8, 1, 'ADENIRAN', 'Olumide', 'Ezekiel', 'olumideadeniran@gmail.com', '2012', '2018', 'SSS 1', '', '1', 13, '2017/2018', 'First Term', 'Male', 'South Africa', 'Eastern Cape', '2017-11-08', 'Not Paid', 'ADENIRAN Mathew', 'Adebimpe', 'Mr.', 'adebimpe.mathew@gmail.com', 'apena', '08083303108', 'Ibadan', 'Retired', 'Father', 'stdimage/562563_426803460672505_554200673_n.jpg', '2017-11-13', '0', '', '0', ''),
(9, 1, 'Akapa', 'Alero', 'Eze', 'akapa@yahoo.com', '2013', '2019', 'SSS 3', '', '10', 16, '2017/2018', 'First Term', 'Female', 'Nigeria', 'Delta', '2017-11-09', 'Not Paid', 'Akapa', 'Ade', 'Mr.', 'n@n.com', 'akure', '08083303108', 'akure', 'Teacher', 'Father', 'stdimage/mumariyo2.jpg', '2017-11-13', '0', '', '0', ''),
(10, 1, 'Ajose', 'Fdnlnoi', 'Oinvnoi', 'nathanieladeniran@gmail.com', '2015', '2021', 'JSS 3', '', '15', 12, '2017/2018', '1', 'Male', 'Namibia', 'Caprivi', '2017-11-13', 'Not Paid', 'bnko bnonq', 'bfnoin', 'Dr.', 'n@m.com', 'knbfion', '84834380', 'oibnoin', 'oinon', 'Father', 'stdimage/images-7.jpeg', '2017-11-13', '0', '', '0', ''),
(11, 1, 'Nnxnvnoi', 'Bioboib', 'Boibiob', 'nicon247@yahoo.com', '1990', '1990', 'Junior Secondary School 2', 'C', '12', 0, '2017/2018', '1', 'Male', 'Niue', 'Niue', '2017-11-13', 'Not Paid', 'kncxlkn', 'nin', 'Dr.', 'n@n.com', 'kjnion', '094340', 'oniobni', 'inin', 'Father', 'stdimage/images-10.jpeg', '2017-11-13', '0', '', '0', ''),
(13, 1, 'Lbfnlkni', 'Ionionoino', 'Oibiob', 'nicon247@yahoo.com', '1990', '1990', '0', '', '', 0, '2017/2018', '1', 'Male', 'Namibia', 'Caprivi', '2017-11-13', 'Not Paid', 'jfibdib', 'noibiob', 'Dr.', 'n@n.com', 'lkdfnvnp', '4939399', 'oldnovin', 'noisnvion', 'Father', 'stdimage/agrii.png', '2017-11-13', '0', '', '0', ''),
(14, 1, 'Kb kvlb boi', 'Boisoib', 'Nbsioboi', 'nathanieladeniran@gmail.com', '2015', '2021', 'SSS 2', '', '11', 0, '2017/2018', '1', 'Female', 'United Arab Emirates', 'Al Fujayrah', '2017-11-01', 'Not Paid', 'nfdnion', 'nfdhjdvjh', 'Dr.', 'n@n.com', 'kjfnvoinoi', '889393939', 'lkdnvno', 'oinoinoinb', 'Father', 'stdimage/what-we-do_right.png', '2017-11-13', '0', '', '0', ''),
(15, 1, 'Kgnknblkbnln', 'Knk nknk', 'N k  k k k', 'nathanieladeniran@gmail.com', '1990', '1990', '0', '', '', 0, '2017/2018', '1', 'Male', 'Albania', 'Berat', '2017-11-06', 'Not Paid', 'lkn dklvndin', '', 'Dr.', 'n@n.com', 'lknpn', '442949449', 'nionoin', 'ionoinoin', 'Father', 'stdimage/mumariyo.jpg', '2017-11-13', '0', '', '0', ''),
(16, 1, 'Pllkdfmjfmn', 'Mdfmcm', 'Mvmvmvm', 'nicon247@yahoo.com', '1990', '1990', '0', '', '', 0, '2017/2018', '1', 'Male', 'Algeria', 'Ain Defla', '2017-10-02', 'Not Paid', 'jbvckjiuob', 'nbsoib', 'Dr.', 'n@n.com', 'kdvcbnoi', '90340348930', 'kjnd iobdiob', 'db ioboib', 'Father', 'stdimage/cog3.png', '2017-11-13', '0', '', '0', ''),
(17, 1, 'Nfjnbjkjdj ', 'B u u u', 'B ububbub', 'nicon@localhost.sms', '1990', '1990', 'Junior Secondary School 2', 'C', '10', 0, '2017/2018', '1', 'Male', 'Angola', 'Bengo', '2017-10-16', 'Not Paid', 'dfbdfdf', 'bebfed', 'Dr.', 'n@m.com', 'kdnfildn', '48488489', 'kjnionoi', 'f, nlknio', 'Father', 'stdimage/0a1803e2d40e588307e2da7e73aa1faab679b7de.jpg', '2017-11-13', '0', '', '0', ''),
(18, 1, 'Lknbfvnin', 'Ininini', 'Nininin', 'nathanieladeniran@gmail.com', '1990', '1990', 'Junior Secondary School 1', 'A', '', 0, '2017/2018', '1', 'Male', 'Austria', 'Tirol', '2017-11-02', 'Not Paid', 'lkninin', 'inii', 'Dr.', 'n@n.com', 'dsaasdc', '54645654', 'wdc', 'waQWCCCDWDS', 'Father', 'stdimage/images-4.jpeg', '2017-11-13', '0', '', '0', ''),
(19, 1, 'Kjnvfnjn', 'Jbiobiob', 'Iubiub', 'nathanieladeniran@gmail.com', '1990', '1990', 'Junior Secondary School 1', 'A', '', 0, '2017/2018', '1', 'Male', 'Angola', 'Bie', '2017-10-30', 'Not Paid', 'kljio', ';n;ln', 'Dr.', 'n@n.com', 'dcs', '778787', 'cas', 'asd', 'Father', 'stdimage/nn.jpg', '2017-11-13', '0', '', '0', ''),
(20, 1, 'Kjvcnn', 'J j  ', 'Ju u u u', 'nathanieladeniran@gmail.com', '1990', '1990', '0', '', '', 0, '2017/2018', '1', 'Male', 'Angola', 'Bengo', '2017-10-30', 'Not Paid', 'kjbjbhj', 'b ijbibi', 'Dr.', 'n@n.com', 'kjnnn', '383939879', 'nnion', 'inoib', 'Father', 'stdimage/IMG-20160715-WA0003.jpg', '2017-11-13', '0', '', '0', ''),
(21, 1, 'Lknkvl nbvkln kn', 'Kj o o  ', 'Lkfglgnio', 'nicon247@yahoo.com', '1990', '1990', 'Junior Secondary School 3', 'B', '', 0, '2017/2018', '1', 'Male', 'Azerbaijan', 'Davaci Rayonu', '2017-11-04', 'Not Paid', 'lknfdklnn ', 'ioniobobioboi', 'Dr.', 'n@n.com', 'nonboino', '88383833', 'oibobi', 'gsdsdgsd', 'Father', 'stdimage/altAk8X_sWvHzKQSRgwhr4fhFe1Fe9wJ0KwezesOd6R10H2.jpg', '2017-11-13', '0', '', '0', ''),
(22, 1, 'Lknlknnpionpn', 'Nononono', 'Nonn', 'nicon247@yahoo.com', '1990', '1990', 'Junior Secondary School 3', 'A', '', 0, '2017/2018', '1', 'Male', 'American Samoa', 'Manu''a', '2017-10-08', 'Not Paid', 'knkjbkjbk', 'jnijniuou', 'Dr.', 'n@n.com', 'jhjvjv', '77888998', 'yvyuvyuv', 'yuvuyuviu', 'Father', 'stdimage/altApRn6eUuqwKHqeBSc7yt85ox_4rzP2fxC2xFBQZLB4TH.jpg', '2017-11-13', '0', '', '0', ''),
(26, 1, 'Ajibola', 'Samuel', 'Eze', 'nathanieladeniran@gmail.com', '2014', '2020', 'SSS 3', '', '10', 16, '2017/2018', 'First Term', 'Male', 'Morocco', 'Guelmim', '2017-05-01', 'Not Paid', 'Ajibola Ono', 'oriade', 'Rev.', 'n@m.com', 'Apena Ibadan', '08083303108', 'kjnionoi', 'mdpndpodn', 'Father', 'stdimage/866b7d158fcf1108ddddea7a3cbaf60757d14840.jpg', '2017-11-15', '0', '', '0', ''),
(27, 1, 'Adesola', 'Ibiyosi', 'Odjoihoin', 'nicon247@yahoo.com', '2008', '2024', 'SSS 1', '', '4', 14, '2017/2018', 'First Term', 'Female', 'Nigeria', 'Ogun', '2017-10-25', 'Not Paid', 'dfnoidnoin', 'nnfni', 'Dr.', 'n@n.com', 'kndckcjbnki', '08083303108', 'jbibiu', 'lknolin', 'Father', 'stdimage/45944b12e01284935edf328f7dfa108a62c7dc76.jpg', '2017-11-15', '0', '', '0', ''),
(28, 1, 'Dfkjbkjbkbckjb', 'Bbib', 'Ubi', 'nicon247@yahoo.com', '1990', '1990', 'Primary 2', 'A', '2', 5, '2017/2018', 'First Term', 'Male', 'Namibia', 'Caprivi', '2017-11-02', 'Not Paid', 'KCXNLKNXLN', 'KLNCLON', 'Dr.', 'n@m.com', 'lnfpo', '9043439', 'oinpoi', 'oinhpio', 'Father', 'stdimage/e1f76e192d9514f49f0421543e2806a0588a0b85.jpg', '2017-11-21', '', '', '0', ''),
(29, 1, 'Falade', 'Adeola', 'Seun', 'fal@yahoo.com', '2015', '2021', 'Primary 6', 'A', '1', 10, '2017/2018', 'First Term', 'Male', 'Nicaragua', 'Matagalpa', '2017-11-23', 'Not Paid', 'Falade Olo', 'cdilnlin', 'Mr.', 'n@m.com', 'iosdhio', '08083303108', 'ibadan', 'lkfdhihoi', 'Father', 'stdimage/1ec4917af1891ab4fc119659c889613eb7171289.jpg', '2017-11-29', '', '', '1', ''),
(30, 1, 'V kjcjbk', 'Jbkjbkjb', 'Kjdbskbkib', 'nicon@localhost.sms', '1990', '1990', 'KG', '', '23', 6, '2017/2018', 'First Term', 'Male', 'Afghanistan', 'Kondoz', '2017-12-08', 'Not Paid', 'kfnkjnknon', 'nfdinion', 'Dr.', 'n@m.com', 'lkfpojpojpjpoj', '488484', 'noeifnhjpf', 'kiboibibfvfdfkj', 'Father', 'stdimage/IMG-20150603-WA0001.jpg', '2017-12-15', '', '', '1', ''),
(31, 1, 'Bvlkkn', 'Adeniran', 'Lkdfnl', 'nathanieladeniran@gmail.com', '1990', '1990', 'Junior Secondary Sch 2', 'A', '9', 20, '2017/2018', 'First Term', 'Male', 'Bahrain', 'Juzur Hawar', '2017-12-07', 'Not Paid', 'kfdn;ln', 'lknln', 'Dr.', 'n@n.com', 'gsds', '3344', 'sdfsdd', 'vdsVds', 'Father', 'stdimage/IMG-20160328-WA0002.jpg', '2017-12-15', '', '', '1', 'swimming');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tab`
--

CREATE TABLE `subject_tab` (
  `subject_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_category` varchar(30) NOT NULL,
  `subject_alias` varchar(10) NOT NULL,
  `subject_mark` int(5) NOT NULL,
  `subject_status` tinyint(1) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_tab`
--

INSERT INTO `subject_tab` (`subject_id`, `clientapp_id`, `subject_name`, `subject_category`, `subject_alias`, `subject_mark`, `subject_status`, `date`) VALUES
(3, 1, 'Agric', 'General', 'Agr', 50, 0, '2017-12-15'),
(4, 1, 'Economics', 'General', 'ECM', 50, 1, '2017-12-15'),
(5, 1, 'Fine Art', 'Art', 'FAA', 50, 1, '2017-12-18'),
(6, 1, 'Econimics', 'Science', 'ECN', 50, 1, '2018-01-22'),
(7, 1, 'Geography', 'Art', 'GRP', 50, 1, '2018-01-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_tab`
--
ALTER TABLE `class_tab`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `client_table`
--
ALTER TABLE `client_table`
  ADD PRIMARY KEY (`clientapp_id`);

--
-- Indexes for table `message_tab`
--
ALTER TABLE `message_tab`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `newsevent_tab`
--
ALTER TABLE `newsevent_tab`
  ADD PRIMARY KEY (`ne_id`);

--
-- Indexes for table `parent_login`
--
ALTER TABLE `parent_login`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `schadmin_tab`
--
ALTER TABLE `schadmin_tab`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `scoresheet_tab`
--
ALTER TABLE `scoresheet_tab`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `setpayment`
--
ALTER TABLE `setpayment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `setting_tab`
--
ALTER TABLE `setting_tab`
  ADD PRIMARY KEY (`clientapp_id`);

--
-- Indexes for table `staffattend_tab`
--
ALTER TABLE `staffattend_tab`
  ADD PRIMARY KEY (`sat_id`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_tab`
--
ALTER TABLE `staff_tab`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stdattend_tab`
--
ALTER TABLE `stdattend_tab`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `student_tab`
--
ALTER TABLE `student_tab`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_tab`
--
ALTER TABLE `subject_tab`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_tab`
--
ALTER TABLE `class_tab`
  MODIFY `class_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `client_table`
--
ALTER TABLE `client_table`
  MODIFY `clientapp_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_tab`
--
ALTER TABLE `message_tab`
  MODIFY `msg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `newsevent_tab`
--
ALTER TABLE `newsevent_tab`
  MODIFY `ne_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `parent_login`
--
ALTER TABLE `parent_login`
  MODIFY `parent_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schadmin_tab`
--
ALTER TABLE `schadmin_tab`
  MODIFY `adm_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `scoresheet_tab`
--
ALTER TABLE `scoresheet_tab`
  MODIFY `score_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `setpayment`
--
ALTER TABLE `setpayment`
  MODIFY `pay_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setting_tab`
--
ALTER TABLE `setting_tab`
  MODIFY `clientapp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `staffattend_tab`
--
ALTER TABLE `staffattend_tab`
  MODIFY `sat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `staff_login`
--
ALTER TABLE `staff_login`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `staff_tab`
--
ALTER TABLE `staff_tab`
  MODIFY `staff_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stdattend_tab`
--
ALTER TABLE `stdattend_tab`
  MODIFY `at_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `student_tab`
--
ALTER TABLE `student_tab`
  MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `subject_tab`
--
ALTER TABLE `subject_tab`
  MODIFY `subject_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
