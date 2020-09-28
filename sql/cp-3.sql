-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2020 at 11:47 PM
-- Server version: 10.3.24-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enetcode_pcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '22-09-2020 02:09:01 AM');

-- --------------------------------------------------------

--
-- Table structure for table `ascomplaints`
--

CREATE TABLE `ascomplaints` (
  `id` int(11) NOT NULL,
  `acomplaintNumber` int(11) NOT NULL,
  `assignDate` datetime NOT NULL DEFAULT current_timestamp(),
  `aremark` varchar(255) NOT NULL,
  `premark` mediumtext NOT NULL,
  `astaff` int(1) NOT NULL,
  `astatus` varchar(255) NOT NULL,
  `cstatus` varchar(255) NOT NULL,
  `lastUpdate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ascomplaints`
--

INSERT INTO `ascomplaints` (`id`, `acomplaintNumber`, `assignDate`, `aremark`, `premark`, `astaff`, `astatus`, `cstatus`, `lastUpdate`) VALUES
(1, 1, '2020-09-28 16:58:52', 'Investigation', 'Jjjj', 4, 'Assigned', 'in process', '2020-09-28 19:44:54'),
(2, 2, '2020-09-28 19:02:58', 'okddggdgd', '', 3, 'Assigned', '', '2020-09-28 19:02:58'),
(3, 3, '2020-09-28 19:06:17', 'yeyeyeyyeyeyy', 'great', 1, 'Assigned', 'in process', '2020-09-28 19:13:37'),
(4, 6, '2020-09-28 20:13:56', 'Has been assigned to January', 'closed case', 7, 'Assigned', 'closed', '2020-09-28 20:22:23'),
(5, 5, '2020-09-28 20:17:30', 'pastor take charge', '', 6, 'Assigned', '', '2020-09-28 20:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(7, 'Public Investigation', 'This is for Public Investigation.', '2020-09-26 18:06:03', '2020-09-28 12:10:02'),
(9, 'ICT', 'This is for ICT Department.', '2020-09-26 18:07:03', NULL),
(10, 'Private Investigation', 'This is for private investigation', '2020-09-28 12:10:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 4, 'in process', 'kdkdkd', '2020-09-28 08:49:01'),
(2, 4, 'closed', 'Solved', '2020-09-28 23:33:23'),
(3, 1, 'closed', 'ofkfkf', '2020-09-28 23:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `comreport`
--

CREATE TABLE `comreport` (
  `id` int(11) NOT NULL,
  `rcomplaintNumber` int(11) DEFAULT NULL,
  `rname` varchar(255) DEFAULT NULL,
  `rstatus` varchar(255) DEFAULT NULL,
  `rfile` varchar(255) DEFAULT NULL,
  `rremark` varchar(244) DEFAULT NULL,
  `rstaff` int(11) NOT NULL,
  `rdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comreport`
--

INSERT INTO `comreport` (`id`, `rcomplaintNumber`, `rname`, `rstatus`, `rfile`, `rremark`, `rstaff`, `rdate`) VALUES
(1, 3, 'Whati found our', 'Reported', '_fhdarchitecture232.jpg', 'ududududuuiuiuiewu', 1, '2020-09-28 20:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `mailid` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `maildate` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`mailid`, `subject`, `email`, `message`, `maildate`, `sender`, `receiver`) VALUES
(1, 'Unsubscribe me', 'mcdave92@gmail.com', 'slsls', '0000-0', 'Mcdavid Obioha', 'admin'),
(2, 'Hello', 'davidsimon4real@gmail.com', 'jsjsj', '22-09-2020 06:42:07 AM', 'David Simon', 'admin'),
(3, 'Hello', 'davidsimon4real@gmail.com', 'jsjsj', '22-09-2020 06:43:17 AM', 'David Simon', 'admin'),
(4, 'kdkdk', 'ppspsp@mail.od', 'ksks', '22-09-2020 06:46:10 AM', 'spssp', ''),
(5, 'kdkdk', 'ppspsp@mail.od', 'ksks', '22-09-2020 06:47:10 AM', 'spssp', ''),
(6, 'My site says account suspended, why?', 'liamcarlson74@gmail.com', ' mtdatemtdatemtdatemtdatemtdatemtdatemtdatemtdatemtdatemtdatemtdatemtdate', '22-09-2020 06:49:03 AM', 'Liam Carlson', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `priorityName` varchar(11) NOT NULL,
  `priorityCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `priorityName`, `priorityCode`) VALUES
(1, 'High', 1),
(2, 'Medium', 2),
(3, 'Low', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fullname`, `email`, `username`, `phone`, `password`, `department`) VALUES
(1, 'Mcdavid Obioha', 'mcdave92@gmail.com', 'mcdave92', '16788885438', 'c68f4d3615e580997b08cc6e8c4f38d7', 'market'),
(2, 'full ', 'cc@mail.com', 'jon', '83838', '81dc9bdb52d04dc20036dbd8313ed055', 'ICT'),
(3, 'David Simon', 'davidsimon4real@gmail.com', 'wave', '12053221861', '827ccb0eea8a706c4c34a16891f84e7b', 'ICT'),
(4, 'James Obi', 'jamesobi@gmail.com', 'james11', '09012345678', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Public Investigati'),
(5, 'ewewe@hshsh.com', 'liamcarlson74@gmail.com', 'david', '18622884843', '827ccb0eea8a706c4c34a16891f84e7b', 'Public Investigation'),
(6, 'Pastor Junior', 'pastor@gmail.com', 'pastor', '09012345678', 'd0227eb1849a4009d6b361aacc22c907', 'ICT'),
(7, 'January First', 'january@gmail.com', 'January', '09876543210', '467b6140fe3bb958f2332983914de787', 'Public Investigation'),
(8, 'february second', 'february@gmail.com', 'february', '12345678909', '8eb8e307a6d649bc7fb51443a06a216f', 'Private Investigation');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `stateDescription` tinytext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(3, 'Uttar Pradesh', '', '2016-10-18 11:35:02', '0000-00-00 00:00:00'),
(4, 'Punjab', 'pbPB', '2016-10-18 11:35:58', '0000-00-00 00:00:00'),
(5, 'Haryana', 'Haryana', '2017-03-28 07:20:36', '0000-00-00 00:00:00'),
(6, 'Delhi', 'Delhi', '2017-06-11 10:54:12', '2019-06-24 07:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Online Shopping', '2017-03-28 07:11:07', '0000-00-00 00:00:00'),
(2, 1, 'E-wllaet', '2017-03-28 07:11:20', '0000-00-00 00:00:00'),
(3, 2, 'other', '2019-06-24 07:06:44', '2019-06-24 07:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `noc` varchar(255) DEFAULT NULL,
  `nameorg` varchar(1000) NOT NULL,
  `addorg` varchar(1000) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `dateoc` date DEFAULT NULL,
  `complaintDetails` mediumtext DEFAULT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `astatus` varchar(255) NOT NULL,
  `astaff` int(11) NOT NULL,
  `rstatus` varchar(255) NOT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `subcategory`, `complaintType`, `state`, `noc`, `nameorg`, `addorg`, `priority`, `dateoc`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `astatus`, `astaff`, `rstatus`, `lastUpdationDate`) VALUES
(1, 2, 9, NULL, NULL, NULL, 'Pay me my salary', 'Glo', 'goo network, wise 11', 'Medium', '2020-09-18', 'Pay me my salary of 5months', 'CHAPTER THREE.docx', '2020-09-28 16:56:25', 'closed', 'Assigned', 4, '', '2020-09-28 23:34:27'),
(2, 2, 7, NULL, NULL, NULL, 'My car was seized', 'FRSC', 'wise zone 7', 'Medium', '2020-09-13', 'My car was siezed.', '', '2020-09-28 17:16:55', NULL, 'Assigned', 3, '', '2020-09-28 19:02:58'),
(3, 5, 7, NULL, NULL, NULL, 'I want to report Buhari', 'God', 'Heaven', 'High', '2020-09-28', 'Please change buhari.', 'mpdf2.pdf', '2020-09-28 17:26:48', 'Reported', 'Assigned', 1, '', '2020-09-28 19:16:12'),
(4, 3, 7, NULL, NULL, NULL, 'Need Refund for my Netflix Payment', 'n/a', 'No 17 Pasali ext layout kuje', 'Low', '2020-09-02', 'okdjdhdhdh', '_fhdarchitecture232.jpg', '2020-09-28 19:02:05', 'closed', '', 0, '', '2020-09-28 23:33:23'),
(5, 6, 9, NULL, NULL, NULL, 'MTN has refused to pay for the Land used to install their mast', 'MTN ', 'gwarimpa Abuja', 'High', '2020-09-02', 'MTN deducted my credit.', 'jinbw.jpg', '2020-09-28 20:09:32', NULL, 'Assigned', 6, '', '2020-09-28 20:17:30'),
(6, 6, 7, NULL, NULL, NULL, 'Police brutalized my friend and extorted his money', 'Police', 'Police HQ', 'Medium', '2020-09-18', 'Police has to refund his money and pay for his hospital bill.', 'images.jpg', '2020-09-28 20:12:01', 'closed', 'Assigned', 7, '', '2020-09-28 20:22:23'),
(7, 7, 7, NULL, NULL, NULL, 'My payment failed and refund has failed', 'GTbank', '25 Ademola street, Abuja', 'High', '2020-07-08', 'Please help me get my money back', '_uhdaircraft103.jpg', '2020-09-28 23:17:30', NULL, '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-28 17:04:36', '', 1),
(2, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-29 15:02:26', '', 1),
(3, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-30 14:58:00', '', 1),
(4, 0, 'dsad', 0x3a3a3100000000000000000000000000, '2017-03-31 17:39:07', '', 0),
(5, 0, 'dwerwer', 0x3a3a3100000000000000000000000000, '2017-03-31 17:41:22', '', 0),
(6, 0, 'ffert', 0x3a3a3100000000000000000000000000, '2017-03-31 17:41:29', '', 0),
(7, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:42:12', '', 0),
(8, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:47:51', '', 0),
(9, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:47:54', '', 0),
(10, 0, 'fsdfsdff', 0x3a3a3100000000000000000000000000, '2017-03-31 17:48:11', '', 0),
(11, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-31 17:49:25', '', 1),
(12, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 18:52:35', '02-04-2017 12:24:41 AM', 1),
(13, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 18:58:09', '02-04-2017 12:50:42 AM', 1),
(14, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 19:38:15', '02-04-2017 01:08:19 AM', 1),
(15, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-02 18:50:20', '', 0),
(16, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-02 18:50:28', '03-04-2017 12:26:50 AM', 1),
(17, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-05-02 18:01:26', '', 1),
(18, 0, 'test@gm.com', 0x3a3a3100000000000000000000000000, '2017-06-11 10:48:50', '', 0),
(19, 5, 'abc@abc.com', 0x3a3a3100000000000000000000000000, '2017-06-11 10:56:30', '11-06-2017 04:39:15 PM', 1),
(20, 6, 'xyz@xyz.com', 0x3a3a3100000000000000000000000000, '2017-06-11 11:13:28', '11-06-2017 04:45:46 PM', 1),
(21, 6, 'xyz@xyz.com', 0x3a3a3100000000000000000000000000, '2017-06-11 11:19:45', '11-06-2017 04:50:02 PM', 1),
(22, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-05-24 18:26:07', '', 1),
(23, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:05:22', '', 0),
(24, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:05:32', '', 0),
(25, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:07:12', '', 1),
(26, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2019-06-24 10:27:30', '24-06-2019 04:11:08 PM', 1),
(27, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-26 14:41:33', '26-09-2020 04:39:49 PM', 1),
(28, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-26 15:39:59', '26-09-2020 05:39:16 PM', 1),
(29, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-26 16:58:48', '26-09-2020 05:59:37 PM', 1),
(30, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-26 17:05:19', '', 1),
(31, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-27 01:28:19', '', 1),
(32, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-28 02:09:16', '', 1),
(33, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-28 06:38:07', '28-09-2020 07:38:59 AM', 1),
(34, 2, 'mike@mail.com', 0x3132372e302e302e3100000000000000, '2020-09-28 07:47:33', '', 1),
(35, 0, 'nwebojoseph@gmail.com', 0x3139372e3231302e35332e3335000000, '2020-09-28 11:42:41', '', 0),
(36, 0, 'nwebojoseph@gmail.com', 0x3139372e3231302e35332e3233300000, '2020-09-28 11:42:56', '', 0),
(37, 0, 'nwebojoseph@gmail.com', 0x3139372e3231302e35332e3233300000, '2020-09-28 11:43:09', '', 0),
(38, 3, 'nwebojoseph@gmail.com', 0x3139372e3231302e35332e3233300000, '2020-09-28 11:44:04', '', 1),
(39, 3, 'nwebojoseph@gmail.com', 0x3139372e3231302e35332e3233300000, '2020-09-28 12:14:34', '28-09-2020 01:22:29 PM', 1),
(40, 3, 'nwebojoseph@gmail.com', 0x3139372e3231302e35332e3335000000, '2020-09-28 12:34:50', '28-09-2020 01:36:58 PM', 1),
(41, 3, 'nwebojoseph@gmail.com', 0x3139372e3231302e37302e3133370000, '2020-09-28 14:05:51', '', 1),
(42, 3, 'nwebojoseph@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:07:51', '', 1),
(43, 4, 'Joejoe@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:13:03', '', 1),
(44, 3, 'nwebojoseph@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:35:28', '', 1),
(45, 2, 'mike@mail.com', 0x3139372e3231302e37312e3200000000, '2020-09-28 16:36:19', '28-09-2020 05:45:51 PM', 1),
(46, 0, 'Ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:44:28', '', 0),
(47, 0, 'Rita1@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:44:46', '', 0),
(48, 0, 'rita1@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:45:14', '', 0),
(49, 0, 'davidsimon4real@gmail.com', 0x3139372e3231302e37312e3200000000, '2020-09-28 16:46:17', '', 0),
(50, 0, 'ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:46:23', '', 0),
(51, 0, 'Ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:46:43', '', 0),
(52, 0, 'davidsimon4real@gmail.com', 0x3139372e3231302e37312e3200000000, '2020-09-28 16:50:21', '', 0),
(53, 1, 'davidsimon4real@gmail.com', 0x3139372e3231302e37312e3200000000, '2020-09-28 16:53:08', '', 1),
(54, 2, 'ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:54:31', '', 1),
(55, 2, 'ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 16:54:32', '', 1),
(56, 2, 'ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 17:15:26', '', 1),
(57, 2, 'ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 17:21:38', '', 1),
(58, 0, 'nwebojoseph@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 17:23:28', '', 0),
(59, 5, 'nwebojoseph@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 17:25:01', '', 1),
(60, 0, 'mcdave92', 0x3139372e3231302e37312e3200000000, '2020-09-28 18:59:00', '', 0),
(61, 0, 'mcdave92', 0x3139372e3231302e37312e3200000000, '2020-09-28 18:59:08', '', 0),
(62, 0, 'mike@mail.com', 0x3139372e3231302e37312e3200000000, '2020-09-28 19:01:24', '', 0),
(63, 3, 'davidsimon4real@gmail.com', 0x3139372e3231302e37312e3200000000, '2020-09-28 19:01:36', '28-09-2020 08:03:07 PM', 1),
(64, 5, 'nwebojoseph@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 19:36:29', '28-09-2020 08:37:08 PM', 1),
(65, 2, 'ritaone@gmail.com', 0x3139372e3231302e37302e3100000000, '2020-09-28 19:45:38', '28-09-2020 08:50:13 PM', 1),
(66, 6, 'petty@gmail.com', 0x3139372e3231302e35322e3136360000, '2020-09-28 20:07:38', '', 1),
(67, 0, 'january@gmail.com', 0x3139372e3231302e35322e3137300000, '2020-09-28 20:19:34', '', 0),
(68, 0, 'january', 0x3139372e3231302e35332e3130000000, '2020-09-28 20:20:11', '', 0),
(69, 0, 'january', 0x3139372e3231302e35322e3137310000, '2020-09-28 20:20:28', '', 0),
(70, 0, 'January', 0x3139372e3231302e35332e3130000000, '2020-09-28 20:20:44', '28-09-2020 09:23:23 PM', 0),
(71, 6, 'petty@gmail.com', 0x3139372e3231302e35332e3130000000, '2020-09-28 20:23:35', '', 1),
(72, 6, 'petty@gmail.com', 0x3139372e3231302e35322e3138310000, '2020-09-28 20:38:52', '', 1),
(73, 0, 'petty@gmail.com', 0x3139372e3231302e35332e3130000000, '2020-09-28 21:24:26', '', 0),
(74, 5, 'nwebojoseph@gmail.com', 0x3139372e3231302e37362e3132300000, '2020-09-28 21:24:38', '28-09-2020 10:48:34 PM', 1),
(75, 7, 'david@mail.com', 0x3139372e3231302e37312e3200000000, '2020-09-28 23:03:14', '29-09-2020 12:24:18 AM', 1),
(76, 2, 'ritaone@gmail.com', 0x3139372e3231302e37362e3231310000, '2020-09-28 23:20:43', '29-09-2020 12:21:26 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `regDate`, `updationDate`, `status`) VALUES
(2, 'Rita one', 'ritaone@gmail.com', 'ec4317002b171b08eef65e79e47893a4', 9876543211, 'Home alone 5', '2020-09-28 16:53:37', '0000-00-00 00:00:00', 1),
(3, 'Micheal Dean', 'davidsimon4real@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 12053221861, '1040 LONDON DR', '2020-09-28 16:59:46', '0000-00-00 00:00:00', 1),
(4, 'Richard Marquez', 'Richardmarquez1000@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2053221861, '1040 LONDON DR', '2020-09-28 17:03:13', '0000-00-00 00:00:00', 1),
(5, 'Jin', 'nwebojoseph@gmail.com', '62b58c4ea022597f19b7e14e966d2b4c', 9098765433, 'No.C12b Little Acorn Estate, Lokogoma', '2020-09-28 17:24:40', '0000-00-00 00:00:00', 1),
(6, 'Petty press', 'petty@gmail.com', '78deee5e883855dff57877fb0c8ff1ca', 8126344901, '52 jigo street, bwari, Abuja', '2020-09-28 20:06:11', '0000-00-00 00:00:00', 1),
(7, 'mcmc', 'david@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 533663637, 'hehdhdhhdhdhhdhdh', '2020-09-28 23:02:51', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ascomplaints`
--
ALTER TABLE `ascomplaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comreport`
--
ALTER TABLE `comreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ascomplaints`
--
ALTER TABLE `ascomplaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comreport`
--
ALTER TABLE `comreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `mailid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
