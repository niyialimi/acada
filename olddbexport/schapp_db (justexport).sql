-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2018 at 06:04 PM
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
  `subject_taken` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_tab`
--

INSERT INTO `class_tab` (`class_id`, `clientapp_id`, `class_name`, `class_alias`, `class_category`, `staff_id`, `class_arm`, `class_num`, `subject_taken`, `status`, `date`) VALUES
(2, 1, 'Nursery 1', 'Nur 1', 'None', 2, 'A', 20, 'Mathematics,English Language,Physics,Chemistry,Commerce,Biology,Christian Religious Studies,', 1, '2017-12-11'),
(3, 1, 'Nursery 2', 'Nur 2', 'None', 2, 'A', 20, 'Mathematics,English Language,Physics,Chemistry,', 1, '2017-12-13'),
(4, 1, 'Nursery 3', 'Nur 3', 'None', 4, 'A', 15, 'Mathematics,Physics,Commerce,', 1, '2017-12-14'),
(5, 1, 'Nursery 1', 'Nur 1', 'None', 3, 'B', 18, 'Mathematics,English Language,', 1, '2017-12-14'),
(15, 1, 'Primary 1', 'Pry 1', 'None', 3, 'A', 23, '', 1, '2017-12-14'),
(16, 1, 'Primary 4', 'Pry 4', 'None', 3, 'A', 23, 'Quantitative & verbal Reasoning,', 1, '2017-12-15'),
(20, 1, 'Primary 2', 'Pry 2', 'None', 2, 'A', 34, '', 1, '2017-12-15'),
(21, 1, 'Primary 3', 'Pry 3', 'None', 2, 'A', 20, '', 1, '2017-12-15'),
(22, 1, 'Primary 5', 'Pry 5', 'None', 2, 'A', 30, '', 1, '2017-12-15'),
(23, 1, 'Primary 6', 'Pry 6', 'None', 4, 'A', 23, '', 1, '2017-12-15'),
(24, 1, 'Junior Secondary School 1', 'Jss 1', 'None', 2, 'A', 23, '', 1, '2017-12-15'),
(30, 1, 'Junior Secondary School 1', 'Jss 1', 'None', 2, 'B', 20, '', 1, '2017-12-15'),
(32, 1, 'Junior Secondary School 2', 'Jss 2', 'None', 2, 'C', 12, '', 1, '2017-12-15'),
(33, 1, 'Junior Secondary School 2', 'JSS 2', 'None', 2, 'A', 45, '', 1, '2018-01-22'),
(34, 1, 'Junior Secondary School 1', 'JSS 1', 'None', 4, 'D', 90, '', 1, '2018-01-22'),
(35, 1, 'Primary 5', 'Primary 5', 'None', 4, 'A', 232, '', 1, '2018-01-22'),
(36, 1, 'Senior Secondary School 3', 'SSS 3', 'Commercial', 25, 'Z', 40, '', 1, '2018-02-09'),
(37, 1, 'Senior Secondary School 2', 'SSS 2', 'Commercial', 14, 'D', 0, '', 1, '2018-02-28'),
(38, 1, 'Junior Secondary School 2', 'JSS 2', 'None', 2, 'F', 0, '', 1, '2018-03-01'),
(39, 1, 'Primary 4', 'Primary 4', 'None', 2, 'J', 0, '', 1, '2018-03-01'),
(40, 1, 'Senior Secondary School 1', 'SSS 1', 'None', 2, 'F', 0, 'Mathematics,English Language,Physics,', 1, '2018-03-01'),
(43, 1, 'Senior Secondary School 1', 'SSS 1', 'None', 2, 'None', 0, 'English Language,Chemistry,Commerce,Yoruba,Financial Account,Mental Mathematics,Religion & national Value,', 1, '2018-03-01');

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
  `msg_readstatus` tinyint(1) NOT NULL,
  `msg_date` date NOT NULL,
  `msg_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_tab`
--

INSERT INTO `message_tab` (`msg_id`, `clientapp_id`, `msg_subject`, `msg_to`, `msg_body`, `msg_sender`, `msg_senderid`, `msg_readstatus`, `msg_date`, `msg_time`) VALUES
(1, 1, 'Kcniobio', 'School Admin', 'Bbvbiuio', 'staff', 2, 0, '2018-01-31', '04:15:00'),
(2, 1, 'Testing mail', 'School Admin', 'This is another test mail for staff', 'staff', 2, 0, '2018-01-31', '04:17:00'),
(4, 1, 'Admin test', 'Staffs', 'Tdtydtydtudyugvigog', 'Admin', 1, 0, '2018-01-31', '09:37:00'),
(8, 1, 'Ksnxshlih', 'Staffs', 'Kshikhiohsd', 'Admin', 1, 0, '2018-02-01', '01:35:00'),
(9, 1, 'Lkdnlknnm;ponmjopjopj', 'Staffs', 'Kjdckuuguioghiuocdc', 'Admin', 1, 0, '2018-02-01', '01:36:00'),
(10, 1, 'MnmnmnmIDSHIOH', 'Staffs', 'IHDSIOHHGHO', 'Admin', 1, 0, '2018-02-01', '01:36:00'),
(13, 1, 'Tsxyfcuukgkglig', 'Parents', 'Nbxsjhjhhjxsxs', 'Admin', 1, 1, '2018-02-11', '11:52:00'),
(14, 1, 'Jst for fun', 'School Admin', 'Jst for fun', 'staff', 2, 1, '2018-02-14', '12:43:00');

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
  `ne_readstatus` tinyint(1) NOT NULL,
  `publish_date` varchar(10) NOT NULL,
  `publish_time` varchar(10) NOT NULL,
  `publish_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsevent_tab`
--

INSERT INTO `newsevent_tab` (`ne_id`, `clientapp_id`, `ne_title`, `ne_body`, `ne_type`, `ne_readstatus`, `publish_date`, `publish_time`, `publish_status`) VALUES
(1, 1, 'The first news', 'This is our first news', 'News', 1, '2018-02-01', '10:32 am', 1),
(2, 1, 'Kjcbkjbiokob', 'Iohoihiohip', 'News', 1, '2018-02-01', '11:01 am', 1),
(3, 1, 'Event first', 'This is our first ever event', 'Event', 1, '2018-02-01', '11:05 am', 1),
(4, 1, 'Kjddiob', 'Ibbiobiu', 'News', 1, '2018-02-01', '11:47 am', 1),
(5, 1, 'Just in case', 'Kfkjbuggoiugodd', 'News', 0, '2018-02-01', '12:02 pm', 1),
(6, 1, 'New event', 'Kdfninionindionsdids', 'Event', 0, '2018-02-01', '12:04 pm', 1),
(7, 1, 'Tetstgdgxgg', 'Gdgxbggbgddgdhgdhdhd', 'News', 1, '2018-02-01', '12:09 pm', 1),
(8, 1, 'Just in', 'Kjdfkjnvndoniodnbdid', 'Event', 0, '2018-02-01', '12:16 pm', 1),
(9, 1, 'Kjdciubciubicxbio', 'Kjbijbiuoiuobiuob', 'Event', 1, '2018-02-01', '12:18 pm', 1),
(10, 1, 'Jdshbhvhv', 'Biugigugvvgf', 'Event', 1, '2018-02-01', '12:26 pm', 1);

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
(10, 1, '08054329226', 'justine', '$2y$10$ZBLH/f9MKQcIadv17XJNZ.GBYD8qguLHiMnnapaWH6C6Xfx5w59Sa'),
(11, 1, '08056167132', 'tolulope', '$2y$10$pp5wQKQIXoQgwiMZ.XGSr.BUkl/7HU2iraFxKxNDxE1wJoVxCzJzO'),
(12, 1, '08055447259', 'hassan', '$2y$10$jwsYRGRj/ljcs0eRuu6U5e8jawvW0OYJvh.Ye9DopJapUMxKP3yL.');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tab`
--

CREATE TABLE `payment_tab` (
  `payment_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `student_class` varchar(50) NOT NULL,
  `payment_session` varchar(10) NOT NULL,
  `payment_term` varchar(10) NOT NULL,
  `payment_for` varchar(50) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_tab`
--

INSERT INTO `payment_tab` (`payment_id`, `clientapp_id`, `student_id`, `student_class`, `payment_session`, `payment_term`, `payment_for`, `payment_amount`, `payment_date`) VALUES
(5, 1, 2, 'KG', '2018/2019', 'First', 'School Fees', '10000.00', '2018-02-11'),
(14, 1, 16, 'Nursery 3', '2018/2019', 'First', 'School Fees', '300000.00', '2018-02-13'),
(15, 1, 21, 'Primary 1', '2018/2019', 'First', 'School Fees', '400000.00', '2018-02-13'),
(16, 1, 24, 'Primary 1', '2018/2019', 'First', 'School Fees', '400000.00', '2018-02-13'),
(17, 1, 13, 'Nursery 2', '2018/2019', 'First', 'School Fees', '300000.00', '2018-02-13'),
(18, 1, 11, 'Nursery 2', '2018/2019', 'First', 'School Fees', '300000.00', '2018-03-05');

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
(10, 10, 'obmsadmin', '$2y$10$MUGBGpx8D.HNbEY3VT8hD.uIExWkD/1.beW9S4pK163hTte8Dg7Em', 'Systemadmin'),
(11, 11, 'gloriousadmin', '$2y$10$0HkiF3elR7xiJgsTFgIcSe6JwiukJDHZEM0yYaDENbh.h4mOON4SW', 'Systemadmin'),
(12, 12, 'gloriousadmin', '$2y$10$jHljEUlAsXGW3zpj.ShOdesnnokJo5LZVEG/Iv2FJ/kdOrIFxzUBy', 'Systemadmin');

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
(41, 1, 53, 'Junior Secondary School 1', '2018/2019', 'First', 'FirstCA', 'Mathematics', 20, '2018-02-26', '2018-03-01'),
(42, 1, 55, 'Junior Secondary School 1', '2018/2019', 'First', 'FirstCA', 'Mathematics', 15, '2018-02-26', '2018-03-01'),
(43, 1, 53, 'Junior Secondary School 1', '2018/2019', 'First', 'SecondCA', 'Mathematics', 10, '2018-02-26', '2018-03-01'),
(44, 1, 55, 'Junior Secondary School 1', '2018/2019', 'First', 'SecondCA', 'Mathematics', 20, '2018-02-26', '2018-03-01'),
(45, 1, 53, 'Junior Secondary School 1', '2018/2019', 'First', 'termexam', 'Mathematics', 40, '2018-03-01', '2018-03-05'),
(46, 1, 55, 'Junior Secondary School 1', '2018/2019', 'First', 'termexam', 'Mathematics', 50, '2018-03-01', '2018-03-05'),
(47, 1, 53, 'Junior Secondary School 1', '2018/2019', 'First', 'termexam', 'English Language', 60, '2018-03-01', '2018-03-05'),
(48, 1, 55, 'Junior Secondary School 1', '2018/2019', 'First', 'termexam', 'English Language', 70, '2018-03-01', '2018-03-05'),
(49, 1, 53, 'Junior Secondary School 1', '2018/2019', 'Second', 'termexam', 'Mathematics', 56, '2018-03-01', '2018-03-06'),
(50, 1, 55, 'Junior Secondary School 1', '2018/2019', 'Second', 'termexam', 'Mathematics', 65, '2018-03-01', '2018-03-06'),
(51, 1, 53, 'Junior Secondary School 1', '2018/2019', 'Second', 'FirstCA', 'Mathematics', 8, '2018-03-01', '2018-03-06'),
(52, 1, 55, 'Junior Secondary School 1', '2018/2019', 'Second', 'FirstCA', 'Mathematics', 10, '2018-03-01', '2018-03-06');

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
(4, 1, 'Escortion', 'Junior Secondary School 2', '1000.000', 'kjddnionnf', '1', '2018-02-02'),
(5, 1, 'School Fees', 'KG', '10000.000', 'ksdiondioidsndd', '1', '2018-02-05'),
(6, 1, 'School Fees', 'Primary 1', '400000.000', 'primary school', '1', '2018-02-13');

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
  `clientapp_address` varchar(500) NOT NULL,
  `current_term` varchar(10) NOT NULL,
  `current_session` varchar(15) NOT NULL,
  `reg_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_tab`
--

INSERT INTO `setting_tab` (`clientapp_id`, `clientapp_name`, `clientapp_logo`, `clientapp_email`, `clientapp_mobile`, `clientapp_address`, `current_term`, `current_session`, `reg_date`) VALUES
(1, 'OASOS', 'schlogo/agrii.png', 'Nathanieladeniran@gmail.com', '08168905925', '#38, Precious Lodge, Apena, Oganla, Off Wire and Cable Apata Ibadan', 'First', '2019/2020', '2018-02-02'),
(10, 'OBMS', 'schlogo/agrii.png', 'nathanieladeniran@gmail.com', '07088683944', '#38, Precious Lodge, Apena, Oganla, Off Wire and Cable Apata Ibadan', 'First', '2018/2019', '2018-02-02'),
(11, 'Glorious', 'schlogo/agrii.png', 'glorious@gmail.com', '08054291827', '#38, Precious Lodge, Apena, Oganla, Off Wire and Cable Apata Ibadan', 'First', '2018/2019', '2018-02-11'),
(12, 'Ariyo International', 'schlogo/agrii.png', 'glorious@gmail.com', '08168905925', '#38, Precious Lodge, Apena, Oganla, Off Wire and Cable Apata Ibadan', 'First', '2018/2019', '2018-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `staffattend_tab`
--

CREATE TABLE `staffattend_tab` (
  `sat_id` bigint(20) NOT NULL,
  `clientapp_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `attendance_status` tinyint(1) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `csession` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffattend_tab`
--

INSERT INTO `staffattend_tab` (`sat_id`, `clientapp_id`, `staff_id`, `attendance_status`, `month`, `year`, `day`, `date`, `csession`) VALUES
(1, 1, 1, 1, '', '', '', '2017-12-01', ''),
(2, 1, 2, 0, '', '', '', '2017-12-01', ''),
(3, 1, 1, 1, '', '', '', '2017-12-04', ''),
(4, 1, 2, 1, '', '', '', '2017-12-04', ''),
(5, 1, 1, 0, '', '', '', '2017-12-05', ''),
(6, 1, 2, 0, '', '', '', '2017-12-05', ''),
(7, 1, 1, 0, '', '', '', '2017-12-05', ''),
(8, 1, 2, 0, '', '', '', '2017-12-05', ''),
(9, 1, 1, 1, '', '', '', '2017-12-05', ''),
(10, 1, 2, 0, '', '', '', '2017-12-05', ''),
(11, 1, 1, 1, '', '', '', '2017-12-05', ''),
(12, 1, 2, 1, '', '', '', '2017-12-05', ''),
(13, 1, 1, 1, '', '', '', '2018-01-22', ''),
(14, 1, 2, 1, '', '', '', '2018-01-22', ''),
(15, 1, 3, 1, '', '', '', '2018-01-22', ''),
(16, 1, 4, 0, '', '', '', '2018-01-22', ''),
(17, 1, 5, 1, '', '', '', '2018-01-22', ''),
(18, 1, 1, 0, '', '', '', '2018-02-02', ''),
(19, 1, 2, 1, '', '', '', '2018-02-02', ''),
(20, 1, 3, 0, '', '', '', '2018-02-02', ''),
(21, 1, 4, 1, '', '', '', '2018-02-02', ''),
(22, 1, 5, 0, '', '', '', '2018-02-02', ''),
(23, 1, 8, 1, 'February', '2018', 'Monday', '2018-02-12', '2018/2019'),
(24, 1, 11, 0, 'February', '2018', 'Monday', '2018-02-12', '2018/2019'),
(25, 1, 24, 1, 'February', '2018', 'Monday', '2018-02-12', '2018/2019'),
(26, 1, 29, 0, 'February', '2018', 'Monday', '2018-02-12', '2018/2019'),
(27, 1, 30, 1, 'February', '2018', 'Monday', '2018-02-12', '2018/2019'),
(28, 1, 32, 0, 'February', '2018', 'Monday', '2018-02-12', '2018/2019'),
(29, 1, 34, 1, 'February', '2018', 'Monday', '2018-02-12', '2018/2019'),
(30, 1, 35, 0, 'February', '2018', 'Monday', '2018-02-12', '2018/2019');

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
(4, 1, 1, 'falana', '$2y$10$X4.81jomoUIulZbOSbRXZul/X.bT.FBLYOw2MCokDAuBRAzoOyHWC'),
(6, 1, 11, 'damilola', '$2y$10$.EMHU9hmlqURe60Y67oCouyWPFvngxAHS4Qk0c0e4Ym0rVuRg/XpS');

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
  `staff_postaladdress` varchar(250) NOT NULL,
  `staff_type` varchar(20) NOT NULL,
  `staff_num` varchar(20) NOT NULL,
  `staff_mstatus` varchar(10) NOT NULL,
  `staff_religion` varchar(30) NOT NULL,
  `sdisability` varchar(3) NOT NULL,
  `staff_qualify` varchar(30) NOT NULL,
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

INSERT INTO `staff_tab` (`staff_id`, `clientapp_id`, `staff_lname`, `staff_fname`, `staff_oname`, `staff_title`, `staff_year`, `staff_nation`, `staff_state`, `staff_dob`, `staff_email`, `staff_phone`, `staff_gender`, `staff_address`, `staff_postaladdress`, `staff_type`, `staff_num`, `staff_mstatus`, `staff_religion`, `sdisability`, `staff_qualify`, `gfullname`, `gothername`, `gtitle`, `gmobile`, `gemail`, `gaddress`, `grelationship`, `gcity`, `goccupation`, `staff_pics`, `cstatus`) VALUES
(2, 1, 'Abiona', 'Boluwaji', 'Taichi', 'Dr.', '2009', 'Bahamas', 'Ragged Island', '2017-11-03', 'ab@yahoo.com', '4443555', 'Female', 'lkdsiosboi', '', 'Teaching', '000034', '', '', '', '', 'oioiboibbob', 'iobibibi', 'Dr.', '7237237878', 'n@m.com', 'linpooh', 'Father', 'linpoi', 'lnponh', 'staffimage/IMG-20150310-WA0001.jpg', 1),
(4, 1, 'ODEKU', 'ADEBOLA', 'OLAJUMOKE', 'Mrs', '2009', 'Nigeria', 'Oyo', '1983-02-09', 'odeku.adebola@yahoo.com', '09097482266', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0001', '', '', '', '', 'AKPAN JOEL', 'SUNDAY', 'Mr', '08069367888', 'akpan.joel@yahoo.com', 'No, Ibadan, Nigeria', 'Uncle', 'Ibadan', 'Trader', '', 1),
(5, 1, 'CHIMEZIE', 'IFEOMA', '', 'Mrs', '2009', 'Nigeria', 'Imo', '1982-05-10', 'chimezie.ifeoma@yahoo.com', '08024452440', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0002', '', '', '', '', 'AFUYE RAPHAEL', 'TOYIN', 'Mr', '08058583238', 'afuye.raphael@yahoo.com', 'No, Ibadan, Nigeria', 'Uncle', 'Lagos', 'Trader', '', 1),
(6, 1, 'OKUSI', 'OYINDAMOLA', 'M.', 'Mrs', '2010', 'Nigeria', 'Osun', '1982-05-11', 'okusi.oyindamola@yahoo.com', '08094000038', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0003', '', '', '', '', 'SOTIKARE OLUBUSOLA', 'ESTHER', 'Mrs', '07055709394', 'sotikare.olubusola@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Ibadan', 'Business', '', 1),
(7, 1, 'AGBOIBON', 'ENIOLA', 'O.', 'Mrs', '2010', 'Nigeria', 'Ekiti', '1983-05-12', 'agboibon.eniola@yahoo.com', '08038513998', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0004', '', '', '', '', 'DADA DAMOLA', 'EMMANUEL', 'Dr', '08079798836', 'dada.damola@yahoo.com', 'No, Ibadan, Nigeria', 'Cousin', 'Osogbo', 'Lecturer', '', 1),
(8, 1, 'OGUNTUNDE', 'ISMAIL', 'SOLA', 'Eng', '2010', 'Nigeria', 'ogun', '1988-04-13', 'oguntunde.ismail@yahoo.com', '08023606595', 'Male', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0005', 'Single', 'Christianity', 'No', '', 'ADEYEMO AYOMIDE', 'EMMANUEL', 'Mr', '08154059911', 'adeyemo.ayomide@yahoo.com', 'No, Ibadan, Nigeria', 'Brother', 'Lagos', 'Trader', 'staffimage/about-us1.png', 1),
(10, 1, 'LAWAL', 'ABIODUN', 'R.', 'Mr', '2012', 'Nigeria', 'oyo', '1986-05-12', 'lawal.abiodun@gmail.com', '08163324982', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0007', '', '', '', '', 'AREMU BABATUNDE', 'AHMED', 'Prof', '08034919330', 'aremu.babatunde@yahoo.com', 'No, Ibadan, Nigeria', 'Uncle', 'Benin', 'Lecturer', '', 1),
(11, 1, 'ABE', 'OLUWADAMILOLA', 'DEBORAH', 'Miss', '2012', 'Nigeria', 'Ekiti', '1992-02-09', 'abe.oluwadamilola@yahoo.com', '08053511619', 'Female', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0008', 'Single', 'Islam', 'No', '', 'ALAYANDE OMOWUMI', 'AYANBISI', 'Mrs', '08067566524', 'alayande.omowumi@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Osogbo', 'Trader', 'staffimage/IMG-20161121-WA0001.jpg', 1),
(12, 1, 'OMOLABI', 'ADEDAYO', 'OLUBUKOLA', 'Mrs', '2013', 'Nigeria', 'Osun', '1982-06-13', 'omolabi.adedayo@yahoo.com', '08069367888', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0009', '', '', '', '', 'AJAYI LUKMAN', 'OLUWASEUN', 'Mr', '08030689127', 'ajayi.lukman@yahoo.com', 'No, Ibadan, Nigeria', 'Brother', 'Ado-Ekiti', 'Trader', '', 1),
(13, 1, 'ADEYINKA', 'ADEKUNLE', 'ADEBIYI', 'Mr', '2013', 'Nigeria', 'Ekiti', '1988-04-13', 'adeyinka.adekunle@gmail.com', '08079798836', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0010', '', '', '', '', 'TOLADE ABIODUN', 'OLUFUNKE', 'Dr', '08055226552', 'tolade.abiodun@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Osogbo', 'Medical Doctor', '', 1),
(14, 1, 'OGIDI', 'TOPE', '', 'Mr', '2013', 'Nigeria', 'Ekiti', '1993-02-11', 'ogidi.tope@yahoo.com', '08067566524', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0011', '', '', '', '', 'BABALOLA AYOBAMI', '', 'Mr', '08094000038', 'babalola.ayobami@yahoo.com', 'No, Ibadan, Nigeria', 'Brother', 'Osogbo', 'Business', '', 1),
(15, 1, 'BAMIGBOYE', 'OLABODE', 'GODWIN', 'Mr', '2013', 'Nigeria', 'Oyo', '1994-02-07', 'bamigboye.olabode@yahoo.com', '08054329226', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0012', '', '', '', '', 'MAKANJUOLA MOYIN', '', 'Mrs', '08163324982', 'makanjuola.moyin@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Abeokuta', 'Trader', '', 1),
(16, 1, 'ADEMOLA', 'BILIKISU', 'ADENIKE', 'Miss', '2014', 'Nigeria', 'Oyo', '1993-02-11', 'ademola.bilikisu@yahoo.com', '08058583238', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0013', 'Single', 'Christianity', 'No', '', 'SALAMI KEHINDE', 'W.', 'Mr', '08055447259', 'salami.kehinde@yahoo.com', 'No, Ibadan, Nigeria', 'Brother', 'Lagos', 'Business', 'staffimage/images-2.jpeg', 1),
(17, 1, 'ADEKUNLE', 'PRAISE', 'OLUWASEUN', 'Mr', '2014', 'Nigeria', 'Osun', '1992-02-09', 'adekunle.praise@gmail.com', '07055709394', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0014', '', '', '', '', 'OLASUNKANMI OLUWATAYO', 'ISRAEL', 'Eng', '08052464385', 'olasunkanmi.oluwatayo@yahoo.com', 'No, Ibadan, Nigeria', 'Uncle', 'Ibadan', 'Mechanical Engineer', '', 1),
(19, 1, 'OLATOYE', 'BUKOLA', 'VICTORIA', 'Mrs', '2014', 'Nigeria', 'Oyo', '1988-04-13', 'olatoye.bukola@yahoo.com', '08076406563', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0016', '', '', '', '', 'OLUJEMISIN ADEKEMI', '', 'Mrs', '07037370353', 'olujemisin.adekemi@gmail.com', 'No, Ibadan, Nigeria', 'Sister', 'Benin', 'Business', '', 1),
(20, 1, 'OPARA', 'NEUMANN', 'M.', 'Mr', '2015', 'Nigeria', 'Rivers', '1988-04-13', 'opara.neumann@gmail.com', '08061674409', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0017', '', '', '', '', 'OJO TOLUWALOPE', 'O.', 'Mr', '08068852288', 'ojo.toluwalope@gmail.com', 'No, Ibadan, Nigeria', 'Uncle', 'Abeokuta', 'business', '', 1),
(21, 1, 'OLOHIGBE', 'AYO', '', 'Mr', '2015', 'Nigeria', 'Kogi', '1982-06-13', 'olohigbe.ayo@gmail.com', '08034756396', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0018', '', '', '', '', 'ADEBAYO TAOFEEK', 'ADEKUNLE', 'Mr', '08036842671', 'adebayo.taofeek@gmail.com', 'No, Ibadan, Nigeria', 'Uncle', 'Ibadan', 'business', '', 1),
(22, 1, 'SOLARU', 'OLUWASEUN', 'O.', 'Mr', '2015', 'Nigeria', 'Osun', '1994-02-07', 'solaru.oluwaseun@gmail.com', '08132902590', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0019', '', '', '', '', 'OLADELE OMOTOLA', 'OLADUNNI', 'Eng', '07030099985', 'oladele.omotola@gmail.com', 'No, Ibadan, Nigeria', 'Cousin', 'Lagos', 'Mechanical Engineer', '', 1),
(23, 1, 'OMOREGBEE', 'MARIAM', '', 'Miss', '2015', 'Nigeria', 'Kogi', '1992-02-07', 'omoregbee.mariam@gmail.com', '08034919330', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0020', '', '', '', '', 'OLAPADA OLUWAKEMI', '', 'Eng', '08057641404', 'olapada.oluwakemi@gmail.com', 'No, Ibadan, Nigeria', 'Cousin', 'Benin', 'Civil Engineer', '', 1),
(24, 1, 'DADA', 'IFEOLUWA', 'VERONICA', 'Miss', '2015', 'Nigeria', 'Oyo', '1993-06-05', 'dada.ifeoluwa@gmail.com', '08068852288', 'Female', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0021', '', '', '', '', 'RASAQ SHAKIRU', 'ADETAYO', 'Prof', '08023857258', 'rasaq.shakiru@gmail.com', 'No, Ibadan, Nigeria', 'Brother', 'Abeokuta', 'Lecturer', '', 1),
(25, 1, 'SAKA', 'BASIRAT', 'JUMOKE', 'Mrs', '2015', 'Nigeria', 'Osun', '1992-02-07', 'saka.basirat@gmail.com', '08056167132', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0022', '', '', '', '', 'ADEKUNLE EMMANUEL', '', 'Mr', '08061674409', 'adekunle.emmanuel@gmail.com', 'No, Ibadan, Nigeria', 'Brother', 'Ilorin', 'Trader', '', 1),
(26, 1, 'OYENIYI', 'TOLULOPE', 'OYEDOTUN', 'Mr', '2015', 'Nigeria', 'Oyo', '1993-06-05', 'oyeniyi.tolulope@gmail.com', '07030099985', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0023', '', '', '', '', 'AKINLABI LYDIA', '', 'Mrs', '08034756396', 'akinlabi.lydia@gmail.com', 'No, Ibadan, Nigeria', 'Sister', 'Ado-Ekiti', 'Business', '', 1),
(27, 1, 'BELLO  ', 'KUDIRAT', 'ADERONKE', 'Miss', '2016', 'Nigeria', 'Kwara', '1994-02-07', 'bello? .kudirat@yahoo.com', '07057566657', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0024', '', '', '', '', 'OGUNBIYI SUSAN', 'OLAJUMOKE', 'Mrs', '08076406563', 'ogunbiyi.susan@gmail.com', 'No, Ibadan, Nigeria', 'Sister', 'Benin', 'Business', '', 1),
(28, 1, 'ADEGOKE', 'DORIS', 'A.', 'Miss', '2016', 'Nigeria', 'Oyo', '1991-06-09', 'adegoke.doris@yahoo.com', '08139656150', 'Female', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0025', '', '', '', '', 'ADEWOYE FUNMILAYO', 'OYESOLA', 'Dr', '08054329226', 'adewoye.funmilayo@gmail.com', 'No, Ibadan, Nigeria', 'Teacher', 'Abeokuta', 'Medical Doctor', '', 1),
(29, 1, 'JOLAYEMI', 'DAYO', 'EMMANUEL', 'Eng', '2016', 'Nigeria', 'Oyo', '1991-06-09', 'jolayemi.dayo@gmail.com', '08036842671', 'Male', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0026', 'Single', 'Christianity', 'No', '', 'AJANI SULIAT', 'OMOLARA', 'Mrs', '08033776357', 'ajani.suliat@gmail.com', 'No, Ibadan, Nigeria', 'Sister', 'Ibadan', 'Trader', 'staffimage/images-4.jpeg', 1),
(30, 1, 'ADENIYI', 'OLUWAFEMI', 'OLALEKAN', 'Mr', '2016', 'Nigeria', 'Oyo', '1988-04-13', 'adeniyi.oluwafemi@gmail.com', '08054293622', 'Male', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0027', '', '', '', '', 'ILELADEWA ADEDOLAPO', 'ADERONKE', 'Mrs', '09097482266', 'ileladewa.adedolapo@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Lagos', 'Business', '', 1),
(31, 1, 'RAJI', 'AKEEM', 'OPEYEMI', 'Mr', '2017', 'Nigeria', 'Kwara', '1986-05-12', 'raji.akeem@gmail.com', '08065808214', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0028', '', '', '', '', 'OKOOSI SENAMI', 'KEHINDE', 'Mrs', '08054293622', 'okoosi.senami@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Lagos', 'Business', '', 1),
(32, 1, 'JOHNSON', 'DANIEL', 'BOLAJI', 'Mr', '2017', 'Nigeria', 'Oyo', '1988-04-13', 'johnson.daniel@gmail.com', '08066937747', 'Male', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0029', '', '', '', '', 'OLOHUNDE OLAMIDE', 'HELLEN', 'Mrs', '08034884184', 'olohunde.olamide@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Ibadan', 'Business', '', 1),
(33, 1, 'ADEYEMO', 'SAHEED', 'TUNDE', 'Mr', '2017', 'Nigeria', 'Oyo', '1988-04-13', 'adeyemo.saheed@yahoo.com', '08033132027', 'Male', 'No, Ibadan, Nigeria', '', 'Teaching', 'STAFF0030', '', '', '', '', 'RASHEED KOLAWOLE', 'S.', 'Mr', '08056167132', 'rasheed.kolawole@yahoo.com', 'No, Ibadan, Nigeria', 'Uncle', 'Ilorin', 'Trader', '', 1),
(34, 1, 'OBAOYE', 'OLADELE', 'SAMUEL', 'Mr', '2017', 'Nigeria', 'Osun', '1982-06-13', 'obaoye.oladele@yahoo.com', '08034884184', 'Male', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0031', '', '', '', '', 'OSSAI DONATUS', 'CHINEDU', 'Mr', '08024452440', 'ossai.donatus@yahoo.com', 'No, Ibadan, Nigeria', 'Uncle', 'Ibadan', 'Business', '', 1),
(35, 1, 'OYELAKIN', 'KEHINDE', 'GBADE', 'Mr', '2018', 'Nigeria', 'Oyo', '1993-06-05', 'oyelakin.kehinde@gmail.com', '08057641404', 'Male', 'No, Ibadan, Nigeria', '', 'Non Teaching', 'STAFF0032', '', '', '', '', 'OYEDIRAN OLUBUSAYO', '', 'Mrs', '08065808214', 'oyediran.olubusayo@yahoo.com', 'No, Ibadan, Nigeria', 'Sister', 'Lagos', 'Business', '', 1),
(36, 1, 'Omilani', 'Olaoluwa', 'Michael', 'Dr.', '1990', 'Nigeria', 'Oyo', '2018-02-15', 'olaolu.laolu@yahoo.com', '08087766', 'Female', 'bvhjvjuyu', 'wire and cable po box 36512', 'Teaching Staff', '0036', 'Married', 'Islam', 'No', 'Masters Degree', 'kjdcnionion OOOOO', 'onionionio', 'Dr.', '009989999', 'n@m.com', 'jdcbiucbiub', 'Father', 'ndsioniohcd', 'jbduibuibuiodboibd', 'staffimage/No title(3).jpg', 1),
(39, 1, 'Hgtyddtyd', 'Gfctgd', 'Fyufy', 'Dr.', '1990', 'Australia', 'New South Wales', '2018-01-29', 'n@o.com', '667575757', 'Male', 'hjfyuf', 'gfchg', 'Non-Teaching Staff', '0037', 'Single', 'Christianity', 'No', 'HND', 'hchyd', 'fdsr', 'Dr.', '09876543', 'n@u.com', 'jhfhyjf', 'Father', 'hfyufyu', 'gdthdty', 'staffimage/IMG-20170522-WA0001.jpg', 1);

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
  `attendance_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdattend_tab`
--

INSERT INTO `stdattend_tab` (`at_id`, `clientapp_id`, `student_id`, `student_class`, `month`, `year`, `day`, `date`, `csession`, `attendance_status`) VALUES
(1, 1, 2, 'KG', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '1'),
(2, 1, 3, 'KG', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '1'),
(3, 1, 4, 'KG', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '1'),
(4, 1, 5, 'KG', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '0'),
(5, 1, 6, 'Nursery 1', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '1'),
(6, 1, 8, 'Nursery 1', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '0'),
(7, 1, 9, 'Nursery 1', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '0'),
(8, 1, 10, 'Nursery 1', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '1'),
(9, 1, 11, 'Nursery 2', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '0'),
(10, 1, 12, 'Nursery 2', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '1'),
(11, 1, 13, 'Nursery 2', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '1'),
(12, 1, 14, 'Nursery 2', 'March', '2018', 'Saturday', '2018-03-03', '2018/2019', '0');

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
  `rollnum` varchar(12) NOT NULL,
  `age` int(3) NOT NULL,
  `current_session` varchar(12) NOT NULL,
  `current_term` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `state_origin` varchar(50) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `student_address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `disability` varchar(6) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
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

INSERT INTO `student_tab` (`student_id`, `clientapp_id`, `lname`, `fname`, `oname`, `semail`, `admission_year`, `grad_year`, `current_class`, `current_arm`, `rollnum`, `age`, `current_session`, `current_term`, `gender`, `nationality`, `state_origin`, `religion`, `student_address`, `city`, `dob`, `disability`, `payment_status`, `parent_name`, `parent_oname`, `parent_title`, `pemail`, `address`, `parent_phone`, `current_city`, `occupation`, `relationship`, `pics`, `regdate`, `std_username`, `std_password`, `status`, `std_hobby`) VALUES
(2, 1, 'JUSTINE', 'OSAMUDIAMEN', 'COURAGE', 'justine.osamudiamen@gmail.com', '2018', '2027', 'KG', 'None', 'STD00086', 2, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Imo', 'Islam', 'Wire and Cable', 'ibadan', '2016-02-05', 'No', 1, 'JUSTINE', 'OSAGHEDE', 'Mr', 'justine.osaghede@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08054329226', 'Ibadan', 'Trader', 'Father', 'stdimage/about-us1.png', '2018-02-09', '', '', '1', 'Reading'),
(3, 1, 'AGARA', 'TOLUWALOPEMI', 'MARY', 'agara.tolulope@gmail.com', '2018', '2027', 'KG', 'None', 'STD00087', 2, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', 'Christianity', 'Apata', 'Ibadan', '2016-09-06', 'No', 0, 'AGARA', 'OLUWADAISI', 'Mr', 'agara.oluwadaisi@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08056167132', 'Ibadan', 'Trader', 'Trader', '', '2018-02-09', '', '', '1', 'Dancing'),
(4, 1, 'KAREEM', 'MUTIAT', 'AJOKE', 'kareem.mutiat@gmail.com', '2018', '2027', 'KG', 'None', 'STD00088', 2, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2016-02-05', '', 0, 'KAREEM', 'ZUBAIR', 'Mr', 'kareem.zubair@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08030689127', 'Ibadan', 'Business', 'Father', '', '2018-02-09', '', '', '1', 'Reading'),
(5, 1, 'HASSAN', 'FIRDAUSI', '', 'hassan.firdausi@gmail.com', '2018', '2027', 'KG', 'None', 'STD00089', 2, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Kwara', '', '', '', '2016-02-05', '', 0, 'HASSAN', 'ABDULLAHI', 'Engr.', 'hassan.abdullahi@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08055447259', 'Ibadan', 'Civil Engineer', 'Father', '', '2018-02-09', '', '', '1', 'Dancing'),
(6, 1, 'OGUNGBEMI', 'VICTORIA', '', 'ogungbemi.victoria@gmail.com', '2017', '2026', 'Nursery 1', 'None', 'STD00076', 3, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2015-02-05', '', 0, 'OGUNGBEMI', 'ADEBISI', 'Dr.', 'ogungbemi.adebisi@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08052464385', 'Ibadan', 'Medical Doctor', 'Father', '', '2017-02-09', '', '', '1', 'Reading'),
(8, 1, 'NUNUMMA', 'LESI', 'DAUGHTER', 'nunumma.lesi@gmail.com', '2017', '2026', 'Nursery 1', 'None', 'STD00078', 4, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Edo', '', '', '', '2014-02-05', '', 0, 'NUNUMMA', 'ALOBARI', 'Mr', 'nunumma.alobari@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '07030099985', 'Ibadan', 'business', 'Father', '', '2017-02-09', '', '', '1', 'Reading'),
(9, 1, 'OLORUNSUYI', 'AINA', 'ESTHER', 'olorunsuyi.aina@gmail.com', '2017', '2026', 'Nursery 1', 'None', 'STD00079', 4, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Ekiti', '', '', '', '2014-02-05', '', 0, 'OLORUNSUYI', 'ODENUSI', 'Mr', 'olorunsuyi.odenusi@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08057641404', 'Ibadan', 'business', 'Father', '', '2017-02-09', '', '', '1', 'Dancing'),
(10, 1, 'IDAKABOR', 'OGHENENYERHOVWO', '', 'idakabor.oghenenyerhovwo@gmail.com', '2017', '2026', 'Nursery 1', 'None', 'STD00080', 4, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Imo', '', '', '', '2014-02-05', '', 0, 'IDAKABOR', 'ERHO', 'Engr.', 'idakabor.erho@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08023857258', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2017-02-09', '', '', '1', 'Reading'),
(11, 1, 'NWOLU', 'QUEEN', 'OLUKAMU', 'nwolu.queen@yahoo.com', '2016', '2025', 'Nursery 2', 'None', 'STD00073', 4, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Rivers', '', '', '', '2014-02-05', '', 1, 'NWOLU', 'OSARO', 'Dr.', 'nwolu.osaro@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08033776357', 'Ibadan', 'Medical Doctor', 'Father', '', '2016-03-07', '', '', '1', 'Dancing'),
(12, 1, 'OLADIMEJI', 'KEHINDE', '.A.', 'oladimeji.kehinde@yahoo.com', '2016', '2025', 'Nursery 2', 'None', 'STD00074', 5, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Oyo', '', '', '', '2013-02-05', '', 0, 'OLADIMEJI', 'IBRAHIM', 'Mr', 'oladimeji.ibrahim@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '09097482266', 'Ibadan', 'trader', 'Father', '', '2016-03-07', '', '', '1', 'Reading'),
(13, 1, 'OLAYIWOLA', 'ADENIKE', 'TEMITOPE', 'olayiwola.adenike@yahoo.com', '2016', '2025', 'Nursery 2', 'None', 'STD00074', 5, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Ekiti', '', '', '', '2013-02-05', '', 1, 'OLAYIWOLA', 'ADENOLA', 'Mr', 'olayiwola.adenola@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08024452440', 'Ibadan', 'trader', 'Father', '', '2016-03-07', '', '', '1', 'Dancing'),
(14, 1, 'AYINLA', 'KAFAYAT', '', 'ayinla.kafayat@yahoo.com', '2016', '2025', 'Nursery 2', 'None', 'STD00075', 5, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2013-02-05', '', 0, 'AYINLA', 'NASIRUDEEN', 'Mr', 'ayinla.nasirudeen@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08094000038', 'Ibadan', 'trader', 'Father', '', '2016-03-07', '', '', '1', 'Reading'),
(16, 1, 'ADEYEMI', 'SHAKIRAT', 'OMOLARA', 'adeyemi.shakirat@gmail.com', '2015', '2024', 'Nursery 3', 'None', 'STD00044', 5, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2013-02-05', '', 1, 'ADEYEMI', 'AKINBOLA', 'Dr.', 'adeyemi.akinbola@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '07037370353', 'Ibadan', 'Lecturer', 'Father', '', '2015-02-09', '', '', '1', 'Reading'),
(17, 1, 'OLORUNNISOMO', 'MOBOLAJI', 'JANET', 'olorunnisomo.mobolaji@gmail.com', '2015', '2024', 'Nursery 3', 'None', 'STD00045', 5, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2013-02-05', '', 0, 'OLORUNNISOMO', 'OLADEJO', 'Mr', 'olorunnisomo.oladejo@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08163324982', 'Ibadan', 'trader', 'Father', '', '2015-02-09', '', '', '1', 'Dancing'),
(18, 1, 'IDOWU', 'OLAWUNMI', 'ROSELINE', 'idowu.olawunmi@gmail.com', '2015', '2024', 'Nursery 3', 'None', 'STD00046', 6, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2012-02-05', '', 0, 'IDOWU', 'OJO', 'Mr', 'idowu.ojo@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08061674409', 'Ibadan', 'trader', 'Father', '', '2015-02-09', '', '', '1', 'Reading'),
(19, 1, 'OGUNGBEMI', 'OLUCHUKWU', 'JOY', 'ogungbemi.oluchukwu@gmail.com', '2015', '2024', 'Nursery 3', 'None', 'STD00047', 6, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Edo', '', '', '', '2012-02-05', '', 0, 'OGUNGBEMI', 'ODOGWU', 'Engr.', 'ogungbemi.odogwu@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08034756396', 'Ibadan', 'civil Engineer', 'Father', '', '2015-02-09', '', '', '1', 'Dancing'),
(20, 1, 'AWE', 'OMOWUNMI', 'FLORENCE', 'awe.omowunmi@gmail.com', '2015', '2024', 'Nursery 3', 'None', 'STD00048', 6, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2012-02-05', '', 0, 'AWE', 'AYINDE', 'Dr.', 'awe.ayinde@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08065808214', 'Ibadan', 'lecturer', 'Father', '', '2015-02-09', '', '', '1', 'Reading'),
(21, 1, 'OFOHA', 'SANDRA', 'NMERI', 'ofoha.sandra@gmail.com', '2014', '2023', 'Primary 1', 'A', 'STD00049', 6, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Imo', '', '', '', '2012-02-05', '', 1, 'OFOHA', 'AJURUCHI', 'Mr', 'ofoha.ajuruchi@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08066937747', 'Ibadan', 'trader', 'Father', '', '2014-02-09', '', '', '1', 'Dancing'),
(23, 1, 'OGHAINEH', 'YEMI', 'BIOLA', 'oghaineh.yemi@gmail.com', '2014', '2023', 'Primary 1', 'A', 'STD00051', 6, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Edo', '', '', '', '2012-02-05', '', 0, 'OGHAINEH', 'BABALOLA', 'Mr', 'oghaineh.babalola@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08023606595', 'Ibadan', 'trader', 'Father', '', '2014-02-09', '', '', '1', 'Dancing'),
(24, 1, 'AWOTAYO ', 'QUDRAT', 'JOKE', 'awotayo .qudrat@gmail.com', '2014', '2023', 'Primary 1', 'A', 'STD00052', 6, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Osun', '', '', '', '2012-02-05', '', 1, 'AWOTAYO ', 'AWOTAYO', 'Engr.', 'awotayo.awotayo@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '07057566657', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2014-02-09', '', '', '1', 'Reading'),
(25, 1, 'OKORO ', 'SHALON', 'ESEOHEN', 'okoro .shalon@gmail.com', '2013', '2022', 'Primary 2', 'A', 'STD00028', 7, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Rivers', '', '', '', '2011-02-05', '', 0, 'OKORO ', 'EKPENKHIO', 'Dr.', 'okoro.ekpenkhio@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08139656150', 'Ibadan', 'Lecturer', 'Father', '', '2013-02-09', '', '', '1', 'Dancing'),
(26, 1, 'FALODE', 'ADIJAT', '', 'falode.adijat@gmail.com', '2013', '2022', 'Primary 2', 'A', 'STD00027', 7, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Osun', '', '', '', '2011-02-05', '', 0, 'FALODE', 'BAKARE', 'Mr', 'falode.bakare@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08033132027', 'Ibadan', 'business', 'Father', '', '2013-02-09', '', '', '1', 'Reading'),
(29, 1, 'EJIOGU', 'PATIENCE', 'CHIBUZOR', 'ejiogu.patience@gmail.com', '2012', '2021', 'Primary 3', 'A', 'STD00024', 7, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Imo', '', '', '', '2011-02-05', '', 0, 'EJIOGU', 'UGOCHUKWU', 'Engr.', 'ejiogu.ugochukwu@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '07055709394', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2012-02-09', '', '', '1', 'Dancing'),
(30, 1, 'JOSEPH', 'NWAMAKA', 'EUCHARIA', 'joseph.nwamaka@gmail.com', '2012', '2021', 'Primary 3', 'A', 'STD00023', 7, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Rivers', '', '', '', '2011-02-05', '', 0, 'JOSEPH', 'ENEBELI', 'Dr.', 'joseph.enebeli@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08079798836', 'Ibadan', 'Medical Doctor', 'Father', '', '2012-02-09', '', '', '1', 'Reading'),
(33, 1, 'ADEJUMO', 'JOSEPHINE', 'OLUWASEYI', 'adejumo.josephine@gmail.com', '2012', '2021', 'Primary 3', 'A', 'STD00020', 8, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Ogun', 'Christianity', 'kdfvkldfln', 'nnbionoion', '2010-02-05', 'No', 0, 'ADEJUMO', 'ADENIRAN', 'Mr', 'adejumo.adeniran@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08068852288', 'Ibadan', 'trader', 'Father', 'stdimage/images-4.jpeg', '2012-02-09', '', '', '1', 'Dancing'),
(34, 1, 'FAKUNLE', 'IYABO', 'IFEOLUWA', 'fakunle.iyabo@gmail.com', '2012', '2021', 'Primary 3', 'A', 'STD00019', 7, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2011-02-05', '', 0, 'FAKUNLE', 'IYANDA', 'Engr.', 'fakunle.iyanda@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08036842671', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2012-02-09', '', '', '1', 'Reading'),
(36, 1, 'AMODU', 'ADERONKE', 'LATIFAT', 'amodu.aderonke@yahoo.com', '2011', '2020', 'Primary 4', 'A', 'STD00017', 8, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2010-02-05', '', 0, 'AMODU', 'OLADELE', 'Mr', 'amodu.oladele@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08034884184', 'Ibadan', 'Trader', 'Father', '', '2011-03-07', '', '', '1', 'Reading'),
(38, 1, 'MBACHU', 'CHIZOBA', '', 'mbachu.chizoba@yahoo.com', '2011', '2020', 'Primary 4', 'A', 'STD00015', 9, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Imo', '', '', '', '2009-02-05', '', 0, 'MBACHU', 'OBIOHA', 'Mr', 'mbachu.obioha@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08154059911', 'Ibadan', 'Business', 'Father', '', '2011-03-07', '', '', '1', 'Reading'),
(39, 1, 'ADEPOJU', 'TEMITOPE', 'TOIBAT', 'adepoju.temitope@yahoo.com', '2011', '2020', 'Primary 4', 'A', 'STD00014', 9, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Lagos', '', '', '', '2009-02-05', '', 0, 'ADEPOJU', 'AILERU', 'Engr.', 'adepoju.aileru@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08076406563', 'Ibadan', 'Civil Engineer', 'Father', '', '2011-03-07', '', '', '1', 'Dancing'),
(40, 1, 'FALADE', 'OLAMIDE', 'OMORONKE', 'falade.olamide@yahoo.com', '2011', '2020', 'Primary 4', 'A', 'STD00013', 9, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2009-02-05', '', 0, 'FALADE', 'FAYORIJU', 'Dr.', 'falade.fayoriju@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08054329426', 'Ibadan', 'Medical Doctor', 'Father', '', '2011-03-07', '', '', '1', 'Reading'),
(41, 1, 'IDOWU', 'ABISOLA', 'WALIAT', 'idowu.abisola@gmail.com', '2011', '2020', 'Primary 4', 'A', 'STD00012', 9, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2009-02-05', '', 0, 'IDOWU', 'OLABISI', 'Mr', 'idowu.olabisi@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08056167132', 'Ibadan', 'business', 'Father', '', '2011-02-09', '', '', '1', 'Dancing'),
(42, 1, 'ABDULLAH', 'FATIMAT', 'ENIOLA', 'abdullah.fatimat@gmail.com', '2010', '2019', 'Primary 5', 'A', 'STD00011', 9, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', 'Islam', 'icnin', 'nibno', '2009-02-05', 'No', 0, 'ABDULLAH', 'OMOGBON', 'Mr', 'abdullah.omogbon@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08030689127', 'Ibadan', 'business', 'business', 'stdimage/IMG-20150603-WA0001.jpg', '2010-02-09', '', '', '1', 'Reading'),
(43, 1, 'EZEUKA', 'NNEKA', 'JUDITH', 'ezeuka.nneka@gmail.com', '2010', '2019', 'Primary 5', 'A', 'STD00010', 10, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Rivers', '', '', '', '2008-02-05', '', 0, 'EZEUKA', 'UMEH', 'Mr', 'ezeuka.umeh@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08055447259', 'Ibadan', 'business', 'Father', '', '2010-02-09', '', '', '1', 'Dancing'),
(44, 1, 'MUIBAT', 'SHAKIRAT', 'ADEREMI', 'muibat.shakirat@gmail.com', '2010', '2019', 'Primary 5', 'A', 'STD00009', 10, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Kogi', '', '', '', '2008-02-05', '', 0, 'MUIBAT', 'BASHIRU', 'Engr.', 'muibat.bashiru@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08052464385', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2010-02-09', '', '', '1', 'Reading'),
(45, 1, 'OGUNDUYILE', 'RASHIDAT', 'FAITH', 'ogunduyile.rashidat@gmail.com', '2010', '2019', 'Primary 5', 'A', 'STD00008', 11, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'OSun', '', '', '', '2007-02-05', '', 0, 'OGUNDUYILE', 'JIMOH', 'Dr.', 'ogunduyile.jimoh@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08055226552', 'Ibadan', 'Medical Doctor', 'Father', '', '2010-02-09', '', '', '1', 'Dancing'),
(46, 1, 'ADEOYE', 'BISOLA', 'OMOLARA', 'adeoye.bisola@gmail.com', '2010', '2019', 'Primary 5', 'A', 'STD00007', 11, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Osun', 'Christianity', 'jhvhjvjhvuj', 'kjgkguig', '2007-02-05', 'No', 0, 'ADEOYE', 'AKINLOTAN', 'Mr', 'adeoye.akinlotan@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '07030099985', 'Ibadan', 'trader', 'Father', 'stdimage/boundaries_unltd.png', '2010-02-09', '', '', '1', 'Reading'),
(47, 1, 'OJO', 'FADEKE', 'EDITH', 'ojo.fadeke@gmail.com', '2010', '2019', 'Primary 5', 'B', 'STD00006', 10, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Kogi', '', '', '', '2008-02-05', '', 0, 'OJO', 'SOLOMON', 'Mr', 'ojo.solomon@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08057641404', 'Ibadan', 'trader', 'Father', '', '2010-02-09', '', '', '1', 'Dancing'),
(48, 1, 'OLAYEMI', 'OLAYEMI', 'KUDIRAT', 'olayemi.olayemi@gmail.com', '2010', '2019', 'Primary 5', 'A', 'STD00005', 11, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2007-02-05', '', 0, 'OLAYEMI', 'SOLADOYE', 'Engr.', 'olayemi.soladoye@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08023857258', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2010-02-09', '', '', '1', 'Reading'),
(49, 1, 'BALOGUN', 'RAFIAT', 'AJIBOLA', 'balogun.rafiat@gmail.com', '2009', '2018', 'Primary 6', 'B', 'STD00004', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Ogun', '', '', '', '2006-02-05', '', 0, 'BALOGUN', 'AZEEZ', 'Dr.', 'balogun.azeez@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08033776357', 'Ibadan', 'Lecturer', 'Father', '', '2009-02-09', '', '', '1', 'Dancing'),
(50, 1, 'AKINIRAN', 'OLATUBOKUN', '', 'akiniran.olatubokun@gmail.com', '2009', '2018', 'Primary 6', 'B', 'STD00003', 12, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Lagos', '', '', '', '2006-02-05', '', 0, 'AKINIRAN', 'IKUYINMINU', 'Mr', 'akiniran.ikuyinminu@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '09097482266', 'Ibadan', 'business', 'Father', '', '2009-02-09', '', '', '1', 'Reading'),
(51, 1, 'NWABUIKE', 'VICTORIA', 'OLUFUNMILOL', 'nwabuike.victoria@gmail.com', '2009', '2018', 'Primary 6', 'A', 'STD00002', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Delta', '', '', '', '2006-02-05', '', 0, 'NWABUIKE', 'OYELAKIN', 'Mr', 'nwabuike.oyelakin@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08024452440', 'Ibadan', 'business', 'Father', '', '2009-02-09', '', '', '1', 'Dancing'),
(53, 1, 'BABATUNDE', 'FOLASADE', 'MOTUNRAYO', 'babatunde.folasade@gmail.com', '2017', '2023', 'Junior Secondary School 1', 'A', 'STD00081', 11, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', 'Christianity', 'kfndihioh', 'ikniohoh', '2007-02-05', 'No', 0, 'BABATUNDE', 'AROSANYIN', 'Engr.', 'babatunde.arosanyin@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08038513998', 'Ibadan', 'Mechanical Engineer', 'Father', 'stdimage/IMG-20160709-WA0001.jpg', '2017-02-09', '', '', '1', 'Dancing'),
(55, 1, 'LEELEE', 'WAAKA', '', 'leelee.waaka@yahoo.com', '2017', '2023', 'Junior Secondary School 1', 'B', 'STD00083', 10, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Edo', '', '', '', '2008-02-05', '', 0, 'LEELEE', 'VICTOR', 'Mr', 'leelee.victor@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08163324982', 'Ibadan', 'trader', 'Father', '', '2017-02-09', '', '', '1', 'Dancing'),
(58, 1, 'ADEBAYO', 'AOLAT', '', 'adebayo.aolat@yahoo.com', '2016', '2022', 'Junior Secondary School 3', 'A', 'STD00063', 11, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', 'Christianity', 'lnvlnonon', 'lkdnondsovnds', '2007-02-05', 'No', 0, 'ADEBAYO', 'MOHAMMED', 'Engr.', 'adebayo.mohammed@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08065808214', 'Ibadan', 'Mechanical Engineer', 'Father', 'stdimage/best_cheap_laptops_thumb336.jpg', '2016-02-09', '', '', '1', 'Reading'),
(59, 1, 'ISAAC', 'ONAKOME', 'SOPHIA', 'isaac.onakome@yahoo.com', '2016', '2022', 'Junior Secondary School 2', 'A', 'STD00064', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Delta', '', '', '', '2006-02-05', '', 0, 'ISAAC', 'NWABENU', 'Dr.', 'isaac.nwabenu@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08066937747', 'Ibadan', 'Lecturer', 'Father', '', '2016-02-09', '', '', '1', 'Dancing'),
(61, 1, 'GBAJA', 'OPEYEMI', 'HELEN', 'gbaja.opeyemi@yahoo.com', '2016', '2022', 'Junior Secondary School 2', 'B', 'STD00066', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Kogi', '', '', '', '2006-02-05', '', 0, 'GBAJA', 'AKINOLA', 'Mr', 'gbaja.akinola@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08023606595', 'Ibadan', 'business', 'Father', '', '2016-02-09', '', '', '1', 'Dancing'),
(62, 1, 'OLALEYE', 'JANET', 'ABIOLA', 'olaleye.janet@yahoo.com', '2016', '2022', 'Junior Secondary School 2', 'B', 'STD00067', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Lagos', '', '', '', '2005-02-05', '', 0, 'OLALEYE', 'JOHN', 'Mr', 'olaleye.john@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '07057566657', 'Ibadan', 'business', 'Father', '', '2016-02-09', '', '', '1', 'Reading'),
(63, 1, 'OKOLIE', 'SANDRA', '', 'okolie.sandra@yahoo.com', '2016', '2022', 'Junior Secondary School 2', 'A', 'STD00068', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Imo', '', '', '', '2005-02-05', '', 0, 'OKOLIE', 'AGETUE', 'Engr.', 'okolie.agetue@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08139656150', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2016-02-09', '', '', '1', 'Dancing'),
(65, 1, 'ANAKWE-UMEH', 'ONYINYE', 'C.', 'anakwe-umeh.onyinye@yahoo.com', '2016', '2022', 'Junior Secondary School 2', 'C', 'STD00070', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Delta', '', '', '', '2006-02-05', '', 0, 'ANAKWE-UMEH', 'OKPALANYIM', 'Mr', 'anakwe-umeh.okpalanyim@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08069367888', 'Ibadan', 'trader', 'Father', '', '2016-02-09', '', '', '1', 'Dancing'),
(67, 1, 'ANI', 'UCHENNA', '', 'ani.uchenna@yahoo.com', '2016', '2022', 'Junior Secondary School 2', 'C', 'STD00072', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Rivers', '', '', '', '2006-02-05', '', 0, 'ANI', 'ASIEGBU', 'Mr', 'ani.asiegbu@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '07055709394', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2016-02-09', '', '', '1', 'Dancing'),
(68, 1, 'ADEBISI', 'ELIZABETH', 'OMOBOLANLE', 'adebisi.elizabeth@yahoo.com', '2015', '2021', 'Junior Secondary School 3', 'A', 'STD00053', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Ogun', 'Islam', 'kcnklcnkln', 'lknonh', '2006-02-05', 'No', 0, 'ADEBISI', 'MARTINS', 'Engr.', 'adebisi.martins@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08079798836', 'Ibadan', 'Lecturer', 'Father', 'stdimage/images.jpg', '2015-02-09', '', '', '1', 'Reading'),
(70, 1, 'IBRAHIM', 'FATIMA', '', 'ibrahim.fatima@yahoo.com', '2015', '2021', 'Junior Secondary School 3', 'B', 'STD00055', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Kwara', '', '', '', '2005-02-05', '', 0, 'IBRAHIM', 'SULEIMAN', 'Mr', 'ibrahim.suleiman@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08034919330', 'Ibadan', 'business', 'Father', '', '2015-02-09', '', '', '1', 'Reading'),
(71, 1, 'NWEKE', 'PERPETUA', 'ONYINYE', 'nweke.perpetua@yahoo.com', '2015', '2021', 'Junior Secondary School 3', 'B', 'STD00056', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Delta', '', '', '', '2005-02-05', '', 0, 'NWEKE', 'AGU', 'Mr', 'nweke.agu@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08068852288', 'Ibadan', 'business', 'Father', '', '2015-02-09', '', '', '1', 'Dancing'),
(72, 1, 'CHIZINDU', 'NMANWERE', '', 'chizindu.nmanwere@gmail.com', '2015', '2021', 'Junior Secondary School 3', 'B', 'STD00057', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Imo', '', '', '', '2005-02-05', '', 0, 'CHIZINDU', 'WOJI', 'Mr', 'chizindu.woji@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08036842671', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2015-02-09', '', '', '1', 'Reading'),
(73, 1, 'ESSIEN', 'OFONIME', 'MONDAY', 'essien.ofonime@gmail.com', '2015', '2021', 'Junior Secondary School 3', 'A', 'STD00058', 12, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Imo', '', '', '', '2006-02-05', '', 0, 'ESSIEN', 'JONAH', 'Engr.', 'essien.jonah@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08054293622', 'Ibadan', 'Medical Doctor', 'Father', '', '2015-02-09', '', '', '1', 'Dancing'),
(74, 1, 'OKEKE', 'CHINYAKA', '', 'okeke.chinyaka@gmail.com', '2015', '2021', 'Junior Secondary School 3', 'C', 'STD00059', 11, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Rivers', '', '', '', '2007-02-05', '', 0, 'OKEKE', 'OKEKE', 'Dr.', 'okeke.okeke@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08034884184', 'Ibadan', 'trader', 'Father', '', '2015-02-09', '', '', '1', 'Reading'),
(75, 1, 'OBIERO', 'OGECHUKWU', 'CHIKA', 'obiero.ogechukwu@gmail.com', '2015', '2021', 'Junior Secondary School 3', 'C', 'STD00060', 12, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Imo', '', '', '', '2006-02-05', '', 0, 'OBIERO', 'EJEAGBASI', 'Mr', 'obiero.ejeagbasi@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08067566524', 'Ibadan', 'trader', 'Father', '', '2015-02-09', '', '', '1', 'Dancing'),
(77, 1, 'OBIEKWE', 'YETUNDE', 'OYEYEMI', 'obiekwe.yetunde@gmail.com', '2015', '2021', 'Junior Secondary School 3', 'C', 'STD00062', 12, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Ekiti', '', '', '', '2006-02-05', '', 0, 'OBIEKWE', 'OYEWO', 'Engr.', 'obiekwe.oyewo@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08076406563', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2015-02-09', '', '', '1', 'Dancing'),
(78, 1, 'JASPER', 'NNENNA', 'O.', 'jasper.nnenna@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'A', 'STD00044', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Imo', '', '', '', '2005-02-05', '', 0, 'JASPER', 'ONWUKA', 'Dr.', 'jasper.onwuka@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08054329236', 'Ibadan', 'Lecturer', 'Father', '', '2014-02-09', '', '', '1', 'Reading'),
(79, 1, 'DISI', 'VIVIAN', 'A', 'disi.vivian@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'A', 'STD00043', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Rivers', '', '', '', '2005-02-05', '', 0, 'DISI', 'DURU', 'Mr', 'disi.duru@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08056167132', 'Ibadan', 'business', 'Father', '', '2014-02-09', '', '', '1', 'Dancing'),
(81, 1, 'OKECHUKWU', 'VINCENTIA', 'UCHECHI', 'okechukwu.vincentia@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'B', 'STD00041', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Imo', '', '', '', '2005-02-05', '', 0, 'OKECHUKWU', 'NWOKOCHA', 'Mr', 'okechukwu.nwokocha@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08055447259', 'Ibadan', 'business', 'Father', '', '2014-02-09', '', '', '1', 'Dancing'),
(82, 1, 'MOHAMMED', 'RAKIYA', '', 'mohammed.rakiya@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'B', 'STD00040', 13, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Kwara', '', '', '', '2005-02-05', '', 0, 'MOHAMMED', 'BALA', 'Engr.', 'mohammed.bala@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08052464385', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2014-02-09', '', '', '1', 'Reading'),
(83, 1, 'HARRISON', 'OMOERERE', 'TINA', 'harrison.omoerere@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'A', 'STD00039', 14, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Edo', '', '', '', '2004-02-05', '', 0, 'HARRISON', 'DJANERE', 'Dr.', 'harrison.djanere@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08055226552', 'Ibadan', 'Medical Doctor', 'Father', '', '2014-02-09', '', '', '1', 'Dancing'),
(84, 1, 'EDWARD-EJEKE', 'OGAREBA', 'ROBERT', 'edward-ejeke.ogareba@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'C', 'STD00038', 15, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Kogi', '', '', '', '2003-02-05', '', 0, 'EDWARD-EJEKE', 'ATIEGOBA', 'Mr', 'edward-ejeke.atiegoba@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '07030099985', 'Ibadan', 'trader', 'Father', '', '2014-02-09', '', '', '1', 'Reading'),
(85, 1, 'AYUBA', 'RUKAYAT', 'OMOBOLANLE', 'ayuba.rukayat@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'C', 'STD00037', 15, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Kwara', '', '', '', '2003-02-05', '', 0, 'AYUBA', 'OLALEKAN', 'Mr', 'ayuba.olalekan@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08057641404', 'Ibadan', 'trader', 'Father', '', '2014-02-09', '', '', '1', 'Dancing'),
(86, 1, 'OKWECHIMA', 'ROSEMARY', 'AMARACHI', 'okwechima.rosemary@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'C', 'STD00036', 14, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Rivers', '', '', '', '2004-02-05', '', 0, 'OKWECHIMA', 'NWOZUZU', 'Mr', 'okwechima.nwozuzu@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08023857258', 'Ibadan', 'business', 'Father', '', '2014-02-09', '', '', '1', 'Reading'),
(87, 1, 'NWANAH', 'NKEIRUKA', 'VIVIAN', 'nwanah.nkeiruka@gmail.com', '2014', '2020', 'Senior Secondary School 1', 'C', 'STD00035', 14, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Rivers', '', '', '', '2004-02-05', '', 0, 'NWANAH', 'ONWUGHARAM', 'Engr.', 'nwanah.onwugharam@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08033776357', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2014-02-09', '', '', '1', 'Dancing'),
(88, 1, 'OLABODE', 'MUSIRAFAT', 'BISI', 'olabode.musirafat@gmail.com', '2013', '2019', 'Senior Secondary School 2', 'A', 'STD00034', 14, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2004-02-05', '', 0, 'OLABODE', 'ADEYEMO', 'Dr.', 'olabode.adeyemo@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '09097482266', 'Ibadan', 'Lecturer', 'Father', '', '2013-02-09', '', '', '1', 'Reading'),
(89, 1, 'OKUNLOLA', 'ADEBIMPE', '', 'okunlola.adebimpe@gmail.com', '2013', '2019', 'Senior Secondary School 2', 'A', 'STD00033', 15, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2003-02-05', '', 0, 'OKUNLOLA', 'ADEWUYI', 'Mr', 'okunlola.adewuyi@yahoo.com', 'No, Ibadan, Oyo State, Ibadan', '08024452440', 'Ibadan', 'business', 'Father', '', '2013-02-09', '', '', '1', 'Dancing'),
(90, 1, 'OLADOJA', 'OLAJUMOKE', 'ANIFAT', 'oladoja.olajumoke@gmail.com', '2013', '2019', 'Senior Secondary School 2', 'B', 'STD00032', 15, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Oyo', '', '', '', '2003-02-05', '', 0, 'OLADOJA', 'RAJI', 'Mr', 'oladoja.raji@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08094000038', 'Ibadan', 'business', 'Father', '', '2013-02-09', '', '', '1', 'Reading'),
(91, 1, 'IFEANYCHUKWU', 'NNEAWAKA', 'GLORIA', 'ifeanychukwu.nneawaka@gmail.com', '2013', '2019', 'Senior Secondary School 2', 'B', 'STD00031', 16, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'RIvers', '', '', '', '2002-02-05', '', 0, 'IFEANYCHUKWU', 'NWEKE', 'Mr', 'ifeanychukwu.nweke@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08038513998', 'Ibadan', 'business', 'Father', '', '2013-02-09', '', '', '1', 'Dancing'),
(92, 1, 'GEORGE', 'REGINA', 'BARI-GARA', 'george.regina@gmail.com', '2013', '2019', 'Senior Secondary School 2', 'B', 'STD00030', 15, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Edo', '', '', '', '2003-02-05', '', 0, 'GEORGE', 'NAKU', 'Engr.', 'george.naku@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '07037370353', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2013-02-09', '', '', '1', 'Reading'),
(94, 1, 'OGENYI', 'VIRGINIA', 'OLUCHI', 'ogenyi.virginia@gmail.com', '2012', '2018', 'Senior Secondary School 3', 'A', 'STD00087', 15, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Imo', '', '', '', '2003-02-05', '', 0, 'OGENYI', 'OGENYI', 'Mr', 'ogenyi.ogenyi@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08061674409', 'Ibadan', 'trader', 'Father', '', '2012-02-09', '', '', '1', 'Reading'),
(96, 1, 'IWEJUO', 'ROSE', 'NNEOMA', 'iwejuo.rose@gmail.com', '2012', '2018', 'Senior Secondary School 3', 'B', 'STD00089', 17, '2017/2018', 'Second Term', 'Female', 'Nigerian', 'Kogi', '', '', '', '2001-02-05', '', 0, 'IWEJUO', 'NWANKWO', 'Mr', 'iwejuo.nwankwo@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08065808214', 'Ibadan', 'trader', 'Father', '', '2012-02-09', '', '', '1', 'Reading'),
(97, 1, 'OLUMBA', 'SYLVIA', 'KASARACHI', 'olumba.sylvia@gmail.com', '2012', '2018', 'Senior Secondary School 3', 'B', 'STD00090', 16, '2017/2018', 'Second Term', 'Male', 'Nigerian', 'Rivers', '', '', '', '2002-02-05', '', 0, 'OLUMBA', 'AGWUNOBI', 'Engr.', 'olumba.agwunobi@gmail.com', 'No, Ibadan, Oyo State, Ibadan', '08066937747', 'Ibadan', 'Mechanical Engineer', 'Father', '', '2012-02-09', '', '', '1', 'Dancing'),
(99, 1, 'Dfbjkdbbodfibobnoidoinb', 'Oidiodoidbiobn', 'Sdoidbiono', 'nicon247@yahoo.com', '2010', '2014', 'Primary 4', 'None', '93', 8, '2017/2018', 'Second Term', 'Male', 'Albania', 'Kucove', '', '', '', '2009-07-23', '', 0, 'sdscsdcds', 'sdcs', 'Dr.', 'n@n.com', 'dfniojipofdpd', '48488844', 'idniodcicd', 'dscdscdsdd', 'Father', 'stdimage/0a1803e2d40e588307e2da7e73aa1faab679b7de.jpg', '2018-02-13', '', '', '1', 'testing'),
(101, 1, 'Dklncklnkn', 'Nionion', 'Inionn', 'nathanieladeniran@gmail.com', '1990', '1990', 'Junior Secondary School 2', 'None', 'STD0099', 0, '2017/2018', 'Third Term', 'Male', 'Bahamas', 'Ragged Island', 'Select Religion', 'kjdsnsnionn', 'Aba', '2018-02-16', 'No', 0, 'klcnknknlcxklnlkn', 'odson cipon', 'Dr.', 'n@m.com', 'iefivninn9bn', '84898998938', 'Aba', 'kduidbdid', 'Father', 'stdimage/cotton1.jpg', '2018-02-16', '', '', '1', 'kjdfbjk'),
(102, 1, 'Dilodpo', 'Dckmmo', 'Fopjopjp', 'nicon247@yahoo.com', '1990', '1990', 'Senior Secondary School 2', 'None', 'STD00102', 0, '2017/2018', 'First Term', 'Male', 'Belarus', 'Homyel''skaya (Homyel'')', 'Christianity', 'dojdpojpoj', 'Jos', '2018-02-16', 'No', 0, 'uyfyufyuf', 'lfdhfdpoh', 'Dr.', 'n@m.com', 'jhbddcub', '23244444', 'Abakaliki', 'jfdibub', 'Father', 'stdimage/holy.jpg', '2018-02-16', '', '', '1', 'eeqee'),
(103, 1, 'Fdjjbiu', 'Idfuib', 'Iudfiudo', 'nicon247@yahoo.com', '1990', '1990', 'Nursery 2', 'A', 'STD00103', 0, '2017/2018', 'First Term', 'Male', 'Albania', 'Bulqize', 'Islam', 'dsbiu', 'Aba', '2018-02-16', 'No', 0, 'dkuhuio', 'cijbo', 'Dr.', 'n@u.com', 'oidfojnipoj-', '4304334-349', 'Dutse', 'kdfhiogoidf', 'Father', 'stdimage/fire.jpg', '2018-02-16', '', '', '1', 'idoji');

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
(2, 1, 'Mathematics', 'General', 'Maths', 70, 1, '2017-02-09'),
(3, 1, 'English Language', 'General', 'Eng', 70, 1, '2017-02-09'),
(4, 1, 'Physics', 'Science', 'Phy', 70, 1, '2017-02-09'),
(5, 1, 'Chemistry', 'Science', 'Chem', 70, 1, '2017-02-09'),
(6, 1, 'Commerce', 'Commercial', 'Comm', 70, 1, '2017-02-09'),
(7, 1, 'Biology', 'General', 'Bio', 60, 1, '2017-02-09'),
(8, 1, 'Geography', 'General', 'Geo', 70, 1, '2017-02-09'),
(9, 1, 'Economics', 'General', 'Eco', 70, 1, '2017-02-09'),
(10, 1, 'Yoruba', 'General', 'Yor', 70, 1, '2017-02-09'),
(11, 1, 'Further Mathematics', 'Science', 'F/M', 70, 1, '2017-02-09'),
(12, 1, 'Financial Account', 'Commercial', 'Acct', 70, 1, '2017-02-09'),
(13, 1, 'Literature in English', 'Arts', 'Eng Lit', 70, 1, '2017-02-09'),
(14, 1, 'Government', 'Arts', 'Govt', 70, 1, '2017-02-09'),
(15, 1, 'Fishery', 'Science', 'Fish', 70, 1, '2017-02-09'),
(16, 1, 'Marketting', 'Commercial', 'Mkt', 70, 1, '2017-02-09'),
(17, 1, 'Cultural and Creative Arts', 'General', 'CCA', 70, 1, '2017-02-09'),
(18, 1, 'Physical & Health Education', 'General', 'PHE', 70, 1, '2017-02-09'),
(19, 1, 'Home Economis', 'General', 'H/Econs', 70, 1, '2017-02-09'),
(20, 1, 'Islamic Studies', 'Arts', 'IRS', 70, 1, '2017-02-09'),
(21, 1, 'Christian Religious Studies', 'Arts', 'CRS', 70, 1, '2017-02-09'),
(22, 1, 'Computer Studies', 'General', 'Compt', 70, 1, '2017-02-09'),
(23, 1, 'Agricultural Science', 'General', 'Agric', 50, 1, '2017-02-09'),
(24, 1, 'Mental Mathematics', 'General', 'Mental', 70, 1, '2017-02-09'),
(25, 1, 'Quantitative & verbal Reasoning', 'General', 'V & Q', 70, 1, '2017-02-09'),
(26, 1, 'Religion & national Value', 'General', 'RNV', 70, 1, '2017-02-09'),
(27, 1, 'Pre-Vocational Studies', 'General', 'Pre-Voc', 70, 1, '2017-02-09'),
(28, 1, 'Social Studies', 'General', 'S/S', 70, 1, '2017-02-09'),
(29, 1, 'Business Studies', 'General', 'B/Std', 70, 1, '2017-02-09'),
(30, 1, 'Civic Education', 'General', 'Civic', 70, 1, '2017-02-09'),
(31, 1, 'Basic Science & Technology', 'General', 'Sci & Tech', 70, 1, '2017-02-09'),
(32, 1, 'Creative Composition', 'General', 'C/Composit', 70, 1, '2017-02-09'),
(33, 1, 'Vocational Studies', 'General', 'Voc', 70, 1, '2017-02-09'),
(34, 1, 'French Studies', 'General', 'French', 70, 1, '2017-02-09'),
(35, 1, 'Handwriting', 'General', 'H/Writing', 70, 1, '2017-02-09');

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
-- Indexes for table `payment_tab`
--
ALTER TABLE `payment_tab`
  ADD PRIMARY KEY (`payment_id`);

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
  MODIFY `class_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `client_table`
--
ALTER TABLE `client_table`
  MODIFY `clientapp_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_tab`
--
ALTER TABLE `message_tab`
  MODIFY `msg_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `newsevent_tab`
--
ALTER TABLE `newsevent_tab`
  MODIFY `ne_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `parent_login`
--
ALTER TABLE `parent_login`
  MODIFY `parent_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment_tab`
--
ALTER TABLE `payment_tab`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `schadmin_tab`
--
ALTER TABLE `schadmin_tab`
  MODIFY `adm_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `scoresheet_tab`
--
ALTER TABLE `scoresheet_tab`
  MODIFY `score_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `setpayment`
--
ALTER TABLE `setpayment`
  MODIFY `pay_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `setting_tab`
--
ALTER TABLE `setting_tab`
  MODIFY `clientapp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `staffattend_tab`
--
ALTER TABLE `staffattend_tab`
  MODIFY `sat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `staff_login`
--
ALTER TABLE `staff_login`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff_tab`
--
ALTER TABLE `staff_tab`
  MODIFY `staff_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `stdattend_tab`
--
ALTER TABLE `stdattend_tab`
  MODIFY `at_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `student_tab`
--
ALTER TABLE `student_tab`
  MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `subject_tab`
--
ALTER TABLE `subject_tab`
  MODIFY `subject_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
