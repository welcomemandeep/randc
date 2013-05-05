-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2012 at 10:07 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `consultancy`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultancy_distribution`
--

CREATE TABLE IF NOT EXISTS `consultancy_distribution` (
  `project_no` varchar(20) NOT NULL,
  `total_fee` decimal(15,2) NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `project_money` decimal(15,2) NOT NULL,
  `institute_overhead` decimal(15,2) NOT NULL,
  `max_expenditure` decimal(15,2) NOT NULL,
  `distribution` decimal(15,2) NOT NULL,
  `hon_director` decimal(15,2) NOT NULL,
  `hon_dean` decimal(15,2) NOT NULL,
  `hon_hod` decimal(15,2) NOT NULL,
  `remun_sa_dir` decimal(15,2) NOT NULL,
  `remun_sa_dean` decimal(15,2) NOT NULL,
  `remun_sa_depart` decimal(15,2) NOT NULL,
  `remun_pi` decimal(15,2) NOT NULL,
  PRIMARY KEY (`project_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy_distribution`
--


-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

CREATE TABLE IF NOT EXISTS `logintable` (
  `emp_code` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `flag` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_code`),
  UNIQUE KEY `uid` (`emp_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`emp_code`, `password`, `flag`, `time`) VALUES
('1234', '12345', 2, '2011-06-16 15:35:39'),
('2008', 'rish', 7, '2011-06-13 10:36:23'),
('577', 'idiot', 6, '2011-06-16 17:12:17'),
('9898', 'ankan', 1, '2011-06-13 09:49:59'),
('222', 'rohit', 5, '2011-06-13 09:51:01'),
('2222', '123123', 2, '2011-06-13 09:51:19'),
('94132', 'manish', 2, '2011-06-14 23:52:32'),
('1212', 'heya', 5, '2011-06-14 23:52:43'),
('555', 'mnnit', 3, '2011-06-14 23:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `project_no` varchar(20) NOT NULL,
  `message` varchar(150) NOT NULL,
  `emp_code` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`project_no`,`message`,`emp_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`project_no`, `message`, `emp_code`, `time`, `flag`) VALUES
('', 'Welcome to Research and consultancy , thanks for registering', 94132, '2011-06-14 23:38:09', 1),
('', 'Welcome to Research and consultancy , thanks for registering', 1212, '2011-06-14 23:47:16', 1),
('', 'Welcome to Research and consultancy , thanks for registering', 555, '2011-06-14 23:48:08', 1),
('2011/06/4', 'You have been marked for the project numbered 2011/06/4', 987, '2011-06-15 00:08:32', 0),
('2011/06/5', 'You have been marked for the project numbered 2011/06/5', 555, '2011-06-15 00:22:03', 1),
('2011/06/5', 'You have been marked for the project numbered 2011/06/5', 1212, '2011-06-15 00:22:32', 1),
('2011/06/6', 'You have been marked for the project numbered 2011/06/6', 555, '2011-06-15 00:29:07', 1),
('2011/06/6', 'You have been marked for the project numbered 2011/06/6', 1212, '2011-06-15 00:29:58', 1),
('2011/06/5', 'Bill has been sent for your approval for the project 2011/06/5', 555, '2011-06-15 00:32:18', 1),
('2011/06/5', 'Your Bill for project 2011/06/5 has been approved by the HOD', 1212, '2011-06-15 00:33:07', 1),
('2011/06/6', 'Bill has been sent for your approval for the project 2011/06/6', 555, '2011-06-15 00:35:32', 1),
('2011/06/6', 'Your Bill for project 2011/06/6 has been approved by the HOD', 1212, '2011-06-15 00:36:10', 1),
('2011/06/6', 'Team has been sent for your approval,for the project 2011/06/6', 555, '2011-06-15 00:37:46', 1),
('2011/06/6', 'Your team for project 2011/06/6 has been approved by the HOD', 1212, '2011-06-15 00:38:30', 1),
('2011/06/6', 'Cheque/Cash details are entered  for ', 555, '2011-06-15 00:58:06', 1),
('2011/06/5', 'Team has been sent for your approval,for the project 2011/06/5', 555, '2011-06-15 01:14:16', 1),
('2011/06/5', 'Your team for project 2011/06/5 has been approved by the HOD', 1212, '2011-06-15 01:15:03', 1),
('2011/06/5', 'Cheque/Cash details are entered  for ', 555, '2011-06-15 01:19:54', 1),
('2011/06/3', 'Receipt has been genereted for the project ', 222, '2011-06-15 01:24:30', 1),
('2011/06/6', 'Your advance for project 2011/06/6 has been approved by the HOD', 1212, '2011-06-15 01:41:08', 1),
('2011/06/5', 'Receipt has been genereted for the project ', 1212, '2011-06-15 01:42:44', 1),
('', 'Receipt has been genereted for the project ', 0, '2011-06-15 23:30:02', 0),
('2011/06/7', 'You have been marked for the project numbered 2011/06/7', 555, '2011-06-16 00:07:50', 1),
('2011/06/7', 'You have been marked for the project numbered 2011/06/7', 1212, '2011-06-16 00:11:36', 1),
('2011/06/7', 'Bill has been sent for your approval for the project 2011/06/7', 555, '2011-06-16 00:12:33', 1),
('2011/06/7', 'Your Bill for project 2011/06/7 has been approved by the HOD', 1212, '2011-06-16 00:16:09', 1),
('2011/06/7', 'Team has been sent for your approval,for the project 2011/06/7', 555, '2011-06-16 00:33:28', 1),
('2011/06/7', 'Your team for project 2011/06/7 has been approved by the HOD', 1212, '2011-06-16 00:34:27', 1),
('2011/06/7', 'Cheque/Cash details are entered  for ', 555, '2011-06-16 00:36:18', 1),
('2011/06/8', 'You have been marked for the project numbered 2011/06/8', 555, '2011-06-16 15:43:45', 1),
('2011/06/8', 'You have been marked for the project numbered 2011/06/8', 1212, '2011-06-16 15:46:59', 1),
('2011/06/9', 'You have been marked for the project numbered 2011/06/9', 555, '2011-06-16 15:52:00', 1),
('2011/06/8', 'Bill has been sent for your approval for the project 2011/06/8', 555, '2011-06-16 15:54:32', 1),
('2011/06/9', 'You have been marked for the project numbered 2011/06/9', 222, '2011-06-16 16:02:09', 1),
('2011/06/8', 'Your Bill for project 2011/06/8 has been approved by the HOD', 1212, '2011-06-16 16:02:24', 1),
('2011/06/9', 'Bill has been sent for your approval for the project 2011/06/9', 555, '2011-06-16 16:04:38', 1),
('2011/06/8', 'Team has been sent for your approval,for the project 2011/06/8', 555, '2011-06-16 16:07:28', 1),
('2011/06/8', 'Your team for project 2011/06/8 has been approved by the HOD', 1212, '2011-06-16 16:08:00', 1),
('2011/06/9', 'Your Bill for project 2011/06/9 has been approved by the HOD', 222, '2011-06-16 16:08:09', 1),
('2011/06/9', 'Team has been sent for your approval,for the project 2011/06/9', 555, '2011-06-16 16:10:17', 1),
('2011/06/9', 'Your team for project 2011/06/9 has been approved by the HOD', 222, '2011-06-16 16:10:32', 1),
('2011/06/10', 'You have been marked for the project numbered 2011/06/10', 555, '2011-06-16 16:14:16', 1),
('2011/06/10', 'You have been marked for the project numbered 2011/06/10', 1212, '2011-06-16 16:14:39', 1),
('2011/06/10', 'Bill has been sent for your approval for the project 2011/06/10', 555, '2011-06-16 16:15:49', 1),
('2011/06/8', 'Cheque/Cash details are entered  for ', 555, '2011-06-16 16:44:58', 1),
('2011/06/9', 'Cheque/Cash details are entered  for ', 555, '2011-06-16 16:52:50', 1),
('2011/06/10', 'Your Bill for project 2011/06/10 has been approved by the HOD', 1212, '2011-06-16 16:53:06', 1),
('2011/06/10', 'Team has been sent for your approval,for the project 2011/06/10', 555, '2011-06-16 17:03:20', 1),
('2011/06/10', 'Your team for project 2011/06/10 has been approved by the HOD', 1212, '2011-06-16 17:03:42', 1),
('2011/06/10', 'Cheque/Cash details are entered  for ', 555, '2011-06-16 17:06:55', 1),
('', 'Welcome to Research and consultancy , thanks for registering', 577, '2011-06-16 17:12:17', 1),
('2011/06/11', 'You have been marked for the project numbered 2011/06/11', 555, '2011-06-19 00:50:36', 1),
('2011/06/5', 'Your advance for project 2011/06/5 has been approved by the HOD', 1212, '2011-06-21 16:39:46', 1),
('2011/06/12', 'You have been marked for the project numbered 2011/06/12', 555, '2011-06-21 16:44:05', 1),
('2011/06/12', 'You have been marked for the project numbered 2011/06/12', 0, '2011-06-21 16:44:38', 0),
('2011/06/11', 'You have been marked for the project numbered 2011/06/11', 222, '2011-06-21 16:44:51', 1),
('2011/06/11', 'Bill has been sent for your approval for the project 2011/06/11', 555, '2011-06-21 16:49:11', 1),
('2011/06/11', 'Your Bill for project 2011/06/11 has been approved by the HOD', 222, '2011-06-21 16:51:58', 1),
('2012/06/13', 'You have been marked for the project numbered 2012/06/13', 555, '2012-06-25 11:42:47', 0),
('2012/06/13', 'You have been marked for the project numbered 2012/06/13', 1212, '2012-06-25 11:44:18', 0),
('2012/06/13', 'Bill has been sent for your approval for the project 2012/06/13', 555, '2012-06-25 11:45:44', 0),
('2012/06/13', 'Your Bill for project 2012/06/13 has been approved by the HOD', 1212, '2012-06-25 11:47:48', 0),
('a2012/06/13', 'Bill has been sent for your approval for the project a2012/06/13', 0, '2012-06-25 11:48:32', 0),
('2011/06/9', 'Your advance for project 2011/06/9 has been approved by the HOD', 222, '2012-06-25 11:50:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE IF NOT EXISTS `personalinfo` (
  `name` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `department` varchar(40) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`emp_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`name`, `gender`, `department`, `emp_code`, `designation`, `email`, `time`) VALUES
('hii', 'male', 'Applied Mechanics Department', '577', 'Assistant Professor', 'eeee@gmail.com', '2011-06-16 17:12:17'),
('Ankan  Seth', 'male', 'Computer Science and Engineering', '9898', 'Professor', 'ankanstumped@gmail.com', '2011-06-13 09:49:48'),
('Rohit Bjaj', 'male', 'Computer Science and Engineering', '222', 'Professor', 'rohitbjaj@gmail.com', '2011-06-13 09:46:10'),
('Mandeep Gandhi', 'male', 'Computer Science and Engineering', '2222', 'Director', 'wel@gndfsdw.vsavk', '2011-06-13 09:45:19'),
('Rishabh Tyagi', 'male', 'Electronics and Communication Engineerin', '2008', 'Lecturer', 'rtj@gmail.com', '2011-06-13 10:04:34'),
('jkjkj', 'male', 'Applied Mechanics Department', '1234', 'Director', 'nmn@gmail.com', '2011-06-13 10:12:46'),
('manish patel', 'male', 'Computer Science and Engineering', '94132', 'Director', 'manispatel005@gmail.com', '2011-06-15 00:26:06'),
('manna', 'male', 'Computer Science and Engineering', '1212', 'Professor', 'welcomemandeep@gmail.com', '2011-06-14 23:47:16'),
('Dhanendra Jain', 'male', 'Computer Science and Engineering', '555', 'Head of Department', 'djains007@gmail.com', '2011-06-14 23:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `project_advance_amount`
--

CREATE TABLE IF NOT EXISTS `project_advance_amount` (
  `project_no` varchar(20) NOT NULL,
  `advance_no` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(10) NOT NULL,
  `hod_approval` int(11) NOT NULL DEFAULT '0',
  `hod_time` datetime NOT NULL,
  `director_approval` int(11) NOT NULL DEFAULT '0',
  `director_time` datetime NOT NULL,
  PRIMARY KEY (`project_no`,`advance_no`),
  UNIQUE KEY `project_no` (`project_no`,`advance_no`),
  UNIQUE KEY `project_no_2` (`project_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_advance_amount`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_advance_detail`
--

CREATE TABLE IF NOT EXISTS `project_advance_detail` (
  `project_no` varchar(11) NOT NULL,
  `advance_detail` varchar(100) NOT NULL,
  `no_unit` int(11) NOT NULL,
  `cost_per_unit` int(11) NOT NULL,
  `amount` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_no`,`advance_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_advance_detail`
--

INSERT INTO `project_advance_detail` (`project_no`, `advance_detail`, `no_unit`, `cost_per_unit`, `amount`, `time`) VALUES
('2011/06/3', 'Test the whole efficiency', 1, 1000, 1000, '2011-06-13 11:00:10'),
('2011/06/6', 'sdfdjh,.', 0, 0, 111111, '2011-06-15 01:36:28'),
('2011/06/5', '434', 0, 0, 343, '2011-06-19 22:51:06'),
('2011/06/8', 'car testing', 0, 0, 54323, '2011-06-16 16:59:59'),
('2011/06/9', 'spped', 0, 0, 10000, '2011-06-16 17:02:55'),
('2011/06/5', 'car testing', 0, 0, 23, '2011-06-19 22:03:01'),
('2011/06/5', 'zcx', 0, 0, 53434, '2011-06-19 22:03:37'),
('2011/06/10', 'fdgdfg', 0, 0, 10000, '2011-06-21 16:34:16'),
('2011/06/5', '', 0, 0, 0, '2011-06-21 16:38:45'),
('2011/06/9', '1212', 0, 0, 233, '2011-06-21 16:40:24'),
('2011/06/9', '', 0, 0, 0, '2011-06-21 16:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `project_advance_extra`
--

CREATE TABLE IF NOT EXISTS `project_advance_extra` (
  `project_no` varchar(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `director_approval` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`project_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_advance_extra`
--

INSERT INTO `project_advance_extra` (`project_no`, `reason`, `time`, `director_approval`) VALUES
('2011/06/8', 'i want it', '2011-06-16 17:00:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_bill_amount`
--

CREATE TABLE IF NOT EXISTS `project_bill_amount` (
  `project_no` varchar(11) NOT NULL,
  `bill_no` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `service_tax` int(11) NOT NULL,
  `hod_approval` tinyint(1) NOT NULL DEFAULT '0',
  `hod_time` datetime NOT NULL,
  `director_approval` int(11) NOT NULL DEFAULT '0',
  `director_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bill_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mode` text NOT NULL,
  PRIMARY KEY (`project_no`,`bill_no`),
  UNIQUE KEY `project_no` (`project_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `project_bill_amount`
--

INSERT INTO `project_bill_amount` (`project_no`, `bill_no`, `amount`, `service_tax`, `hod_approval`, `hod_time`, `director_approval`, `director_time`, `bill_time`, `mode`) VALUES
('2011/06/2', 1, 600000, 61500, 1, '2011-06-13 10:16:59', 0, '0000-00-00 00:00:00', '2011-06-13 10:16:35', ''),
('2011/06/1', 1, 10000, 1025, 1, '2011-06-13 10:06:37', 0, '0000-00-00 00:00:00', '2011-06-13 10:06:13', ''),
('2011/06/3', 1, 20000, 2050, 1, '2011-06-13 10:28:39', 0, '0000-00-00 00:00:00', '2011-06-13 12:31:15', 'cheque'),
('2011/06/5', 1, 2342404, 240096, 1, '2011-06-15 01:20:18', 1, '2011-06-15 01:11:38', '2011-06-15 01:19:54', 'cash'),
('2011/06/6', 1, 500000, 51250, 1, '2011-06-15 12:58:30', 0, '0000-00-00 00:00:00', '2011-06-15 00:58:06', 'cheque'),
('2011/06/7', 1, 500000, 51250, 1, '2011-06-16 12:36:42', 0, '0000-00-00 00:00:00', '2011-06-16 00:36:18', 'cheque'),
('2011/06/8', 1, 123456, 12654, 1, '2011-06-16 04:45:22', 0, '0000-00-00 00:00:00', '2011-06-16 16:44:58', 'cheque'),
('2011/06/9', 1, 499999, 51250, 1, '2011-06-16 04:53:14', 0, '0000-00-00 00:00:00', '2011-06-16 16:52:50', 'cash'),
('2011/06/10', 1, 600000, 61500, 1, '2011-06-16 05:07:19', 1, '2011-06-16 04:55:44', '2011-06-16 17:06:55', 'cash'),
('2011/06/11', 1, 500000, 51250, 1, '2011-06-21 04:52:22', 0, '0000-00-00 00:00:00', '2011-06-21 16:51:58', ''),
('2012/06/13', 1, 190130, 19488, 1, '2012-06-25 11:48:12', 0, '0000-00-00 00:00:00', '2012-06-25 11:47:48', ''),
('a2012/06/13', 1, 200, 21, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2012-06-25 11:48:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `project_bill_detail`
--

CREATE TABLE IF NOT EXISTS `project_bill_detail` (
  `project_no` varchar(11) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost_per_unit` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_no`,`detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_bill_detail`
--

INSERT INTO `project_bill_detail` (`project_no`, `detail`, `quantity`, `cost_per_unit`, `amount`, `time`) VALUES
('2011/06/2', 'verification ', 30, 20000, 600000, '2011-06-13 10:13:34'),
('2011/06/1', 'to test if the complexity also', 10, 1000, 10000, '2011-06-13 10:04:32'),
('2011/06/2', 'verification2', 30, 30000, 900000, '2011-06-13 10:18:29'),
('2011/06/3', 'verification3', 20, 1000, 20000, '2011-06-13 10:27:19'),
('2011/06/5', 'frnwejfl', 0, 0, 2342404, '2011-06-15 00:32:13'),
('2011/06/6', 'sdflsf', 0, 0, 500000, '2011-06-15 00:35:30'),
('2011/06/7', 'machine', 0, 0, 500000, '2011-06-16 00:12:31'),
('2011/06/8', 'speed test', 0, 0, 123456, '2011-06-16 15:54:29'),
('2011/06/9', 'speed pressure test', 0, 0, 499999, '2011-06-16 16:04:34'),
('2011/06/10', 'site speed test', 0, 0, 600000, '2011-06-16 16:15:45'),
('2011/06/11', 'fgfg', 0, 0, 500000, '2011-06-21 16:48:59'),
('2012/06/13', 'ijik', 13, 10, 130, '2012-06-25 11:45:07'),
('2012/06/13', 'pop;', 19, 10000, 190000, '2012-06-25 11:45:34'),
('a2012/06/13', 'ijik', 18, 10, 180, '2012-06-25 11:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `project_cash_detail`
--

CREATE TABLE IF NOT EXISTS `project_cash_detail` (
  `project_no` varchar(20) NOT NULL,
  `submit_date` date NOT NULL,
  `cash_amount` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_1000` int(8) NOT NULL DEFAULT '0',
  `no_500` int(8) NOT NULL DEFAULT '0',
  `no_100` int(8) NOT NULL DEFAULT '0',
  `no_50` int(8) NOT NULL DEFAULT '0',
  `no_20` int(8) NOT NULL DEFAULT '0',
  `no_10` int(8) NOT NULL DEFAULT '0',
  `no_5` int(8) NOT NULL DEFAULT '0',
  `no_2` int(8) NOT NULL DEFAULT '0',
  `no_1` int(8) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_cash_detail`
--

INSERT INTO `project_cash_detail` (`project_no`, `submit_date`, `cash_amount`, `date`, `no_1000`, `no_500`, `no_100`, `no_50`, `no_20`, `no_10`, `no_5`, `no_2`, `no_1`) VALUES
('123', '0000-00-00', 0, '2011-06-12 15:01:13', 233, 0, 333, 333, 0, 0, 0, 0, 0),
('2011/06/5', '0000-00-00', 0, '2011-06-15 01:19:54', 2582, 1, 0, 0, 0, 0, 0, 0, 0),
('2011/06/9', '2011-06-04', 551249, '2011-06-16 16:52:50', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('2011/06/10', '2011-06-10', 661500, '2011-06-16 17:06:55', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_cheque_detail`
--

CREATE TABLE IF NOT EXISTS `project_cheque_detail` (
  `project_no` varchar(11) NOT NULL,
  `cheque_no` int(7) NOT NULL,
  `drawee_bank` varchar(40) NOT NULL,
  `payble_at` text NOT NULL,
  `payble_to` varchar(40) NOT NULL,
  `payee_account_no` int(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `submit_date` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dean_rc_approval` tinyint(1) NOT NULL DEFAULT '0',
  `dated` datetime NOT NULL,
  PRIMARY KEY (`project_no`,`cheque_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_cheque_detail`
--

INSERT INTO `project_cheque_detail` (`project_no`, `cheque_no`, `drawee_bank`, `payble_at`, `payble_to`, `payee_account_no`, `amount`, `submit_date`, `time`, `dean_rc_approval`, `dated`) VALUES
('2011/06/3', 1234567, 'pnb', 'mnnit', 'anuj jain', 12345, 22050, '0000-00-00', '2011-06-13 12:31:15', 0, '2011-06-21 00:00:00'),
('123', 345, 'pnb', 'mnnit', 'anuj', 23456, 234567, '0000-00-00', '2011-06-15 00:55:03', 0, '0000-00-00 00:00:00'),
('2011/06/6', 3438, 'alld bank', 'alld', 'DJ', 212121, 551250, '0000-00-00', '2011-06-15 00:58:06', 0, '2011-06-09 00:00:00'),
('2011/06/7', 431224, 'ald bank', 'inderprastha', 'r&c', 3455, 551250, '0000-00-00', '2011-06-16 00:36:18', 0, '2011-06-07 00:00:00'),
('2011/06/8', 12345, 'punjab bank', 'mnnit', 'anuj jain', 2147483647, 136110, '2011-06-03', '2011-06-16 16:44:58', 0, '2011-06-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_contact_detail`
--

CREATE TABLE IF NOT EXISTS `project_contact_detail` (
  `project_no` varchar(20) NOT NULL,
  `s_title` varchar(7) DEFAULT NULL,
  `s_first_name` varchar(20) NOT NULL,
  `s_middle_name` varchar(20) DEFAULT NULL,
  `s_last_name` varchar(20) NOT NULL,
  `s_designation` varchar(30) NOT NULL,
  `s_department` varchar(30) NOT NULL,
  `s_email_id` varchar(50) DEFAULT NULL,
  `s_contact_no` int(12) NOT NULL,
  `c_title` varchar(7) DEFAULT NULL,
  `c_first_name` varchar(20) NOT NULL,
  `c_middle_name` varchar(20) DEFAULT NULL,
  `c_last_name` varchar(20) NOT NULL,
  `c_designation` varchar(30) NOT NULL,
  `c_department` varchar(30) NOT NULL,
  `c_email_id` varchar(50) DEFAULT NULL,
  `c_contact_no` int(12) NOT NULL,
  PRIMARY KEY (`project_no`),
  UNIQUE KEY `project_no` (`project_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_contact_detail`
--

INSERT INTO `project_contact_detail` (`project_no`, `s_title`, `s_first_name`, `s_middle_name`, `s_last_name`, `s_designation`, `s_department`, `s_email_id`, `s_contact_no`, `c_title`, `c_first_name`, `c_middle_name`, `c_last_name`, `c_designation`, `c_department`, `c_email_id`, `c_contact_no`) VALUES
('2011/06/1', 'Mr', 'hello', 'to', 'you', 'sec', 'msc', 'abc@abc.in', 9349499, 'Mr', 'xyz', 'aaa', 'zoaaa', 'msc', 'MSE', 'derwsd@fs.in', 399999),
('2011/06/10', 'Mr', 'gvfcg', 'njbh', 'njnbhu', 'bhvb', 'jhb', 'afgf@gmail.com', 2147483647, 'Mr', 'fdgdf', 'jhg', 'kjhg', 'kjihug', 'kjhu', 'sonia@gmail.com', 2147483647),
('2011/06/11', 'Mr', 'heddd', 'wert', 'afawf', 'asfdadf', 'accounts', 'wel@gmail.com', 941054666, 'Mr', 'abc', 'gdf', 'singh', 'sec', 'MSE', 'qw@gmail.com', 2147483647),
('2011/06/12', 'Mr', 'heddd', 'offf', 'afawf', 'director', 'MSE', 'wel@gmail.com', 941054666, 'Mr', 'abc', 'gdf', 'asaasa', 'sec', 'MSE', 'wwwwewe@gejg.in', 2147483647),
('2011/06/2', 'Mr', 'red', 'room', 'green', 'director', 'stat', 'afgf@gmail.com', 941054666, 'Mr', 'dark', 'man', 'fast', 'asie', 'stat', 'afaf@gmail.com', 2147483647),
('2011/06/3', 'Mr', 'yuy', 'yooo', 'yahoo', 'director', 'accounts', 'wel@gmail.com', 941054666, 'Mr', 'peer', 'douche', 'dallas', 'accounts', 'msn', 'wwwwewe@gejg.in', 2147483647),
('2011/06/4', 'Mr', 'rishab', '', 'singh', 'Station Engineer', 'Engineering', 'rishab_singh@gmail.com', 2147483647, 'Mr', 'aakash', '', 'patel', 'personal assistant', 'pa', 'aakash.patel@gmail.com', 941234567),
('2011/06/5', 'Mr', 'dfadf', 'afadwsf', 'afawf', 'lfelfj', 'accounts', 'afgf@gmail.com', 941054666, 'Mr', 'abc', 'gdf', 'asaasa', 'accounts', 'MSE', 'qw@gmail.com', 2147483647),
('2011/06/6', 'Mr', 'wtrgwek', 'hfkelfghq', 'ksfhqi', 'dnkqwehf', 'kefhqk', 'dfghw@fdhwf.fcs', 3214710, 'Mr', 'elfhwl', 'dcwjhd', 'flsfhql', 'fljf', 'dfjwldj', 'dfwlrd@shd.dws', 4812304),
('2011/06/7', 'Mr', 'raman', 'room', 'singh', 'director', 'accounts', 'abc@abc.in', 941054666, 'Mr', 'raman', 'kerf', 'singh', 'accounts', 'MSE', 'acaa@aa.in', 2147483647),
('2011/06/8', 'Mr', 'djain', '', 'jain', 'prof', 'csed', 'abc@gmail.com', 123234, 'Mr', 'raman', 'kk', 'jain', 'prof', 'eced', 'afaf@gmail.com', 965432),
('2011/06/9', 'Mr', 'ankan', 'kk', 'seth', 'prof', 'csed', 'afgf@gmail.com', 9876543, 'Mrs', 'sonia', '', 'gandhi', 'corrupt leader', 'corruption', 'sonia@gmail.com', 2147483647),
('2012/06/13', 'Mr', 'gg', 'g', 'g', 'gg', 'gg', 'gg@gmail.com', 0, 'Mr', 'gg', 'gg', 'gg', 'gg', 'gg', 'gg@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_letter_detail`
--

CREATE TABLE IF NOT EXISTS `project_letter_detail` (
  `project_no` varchar(20) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `letter_no` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(70) NOT NULL,
  `testing` varchar(70) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_letter_detail`
--

INSERT INTO `project_letter_detail` (`project_no`, `organization`, `street`, `city`, `state`, `pin_code`, `email_id`, `letter_no`, `date`, `subject`, `testing`, `time`) VALUES
('2011/06/1', 'L&T', '25 john street \r\npearson', 'Allahabad', 'Uttar Pradesh', 21004, 'wel@wel.com', '21334', '2011-06-06', 'new project', 'testing', '2011-06-13 09:57:53'),
('2011/06/10', 'google', '12345', 'Allahabad', 'Uttar Pradesh', 234234, 'djains007@gmail.com', '7643', '2011-06-03', 'site check', 'site speed test', '2011-06-16 16:13:11'),
('2011/06/11', 'frfr', 'erewr', 'Allahabad', 'Uttar Pradesh', 333, 'welcomemandeep@gmail.com', '23455', '2011-06-19', 'SPEED', 'ad', '2011-06-19 00:47:50'),
('2011/06/12', 'tgetg', 'sfgsg', 'Allahasbad', 'Uttar Pradesh', 211004, 'wel@gmail.com', '4343', '2011-06-21', 'teetw', 'asddsdsd', '2011-06-21 16:42:49'),
('2011/06/2', 'tease', '24 gobindpur\r\ntelyerganj', 'Allahabad', 'Uttar Pradesh', 211004, 'erer@dwe.com', 'sdqe234243', '2011-06-07', 'new project', 'testing', '2011-06-13 10:03:02'),
('2011/06/3', 'test again', '24 raii', 'Allahabad', 'Uttar Pradesh', 211004, 'wel@gmail.com', '23434', '2011-06-06', 'test again', 'testing', '2011-06-13 10:21:13'),
('2011/06/4', 'BSNL', 'civil lines', 'Allahabad', 'Uttar Pradesh', 211001, 'bsnl_gm@gmail.com', '1001', '2011-06-04', 'cellphone tower', 'testing of tower', '2011-06-15 00:05:35'),
('2011/06/5', 'gfdg', 'dghsgh', 'Allahabad', 'Uttar Pradesh', 211004, 'wewe@gmao.in', '213324', '2011-06-13', 'ghdgrdg', 'gfhgdghdr', '2011-06-15 00:19:36'),
('2011/06/6', 'sdkhsa', 'eklfh', 'le', 'Uttar Pradesh', 7223, 'wew@bdjw.cdc', '23123971', '2011-06-07', 'tesar', 'skrhwekf', '2011-06-15 00:27:39'),
('2011/06/7', 'test gandhi', 'testing of proj', 'Allahabad', 'Uttar Pradesh', 211004, 'welcomemandeep@gmail.com', '211868', '2011-06-09', 'testing of bucket', 'testing', '2011-06-16 00:01:36'),
('2011/06/8', 'tata motors', '23432', 'Allahabad', 'Uttar Pradesh', 251001, 'djains007@gmail.com', '23455', '2011-06-02', 'car testing', 'speed test', '2011-06-16 15:41:52'),
('2011/06/9', 'ferrari cars', '76543', 'Allahabad', 'Uttar Pradesh', 244463, 'djains007@gmail.com', '4331', '2011-06-03', 'car testing', 'speed pressure', '2011-06-16 15:48:41'),
('2012/06/13', 'gla', 'ncx fnc', 'mathura', 'Uttar Pradesh', 282005, 'gvda', '145ccbc5', '2011-06-06', 'zgbzdv', 'vngcncgnc', '2012-06-25 11:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `project_mark_to`
--

CREATE TABLE IF NOT EXISTS `project_mark_to` (
  `project_no` varchar(20) NOT NULL,
  `hod_emp_code` varchar(10) NOT NULL,
  `oc_emp_code` varchar(10) NOT NULL,
  `pi_emp_code` varchar(10) NOT NULL,
  PRIMARY KEY (`project_no`),
  UNIQUE KEY `project_no` (`project_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_mark_to`
--

INSERT INTO `project_mark_to` (`project_no`, `hod_emp_code`, `oc_emp_code`, `pi_emp_code`) VALUES
('2011/06/2', '987', '', '222'),
('2011/06/1', '987', '', '222'),
('2011/06/3', '987', '', ''),
('2011/06/4', '987', '', ''),
('2011/06/5', '555', '', '1212'),
('2011/06/6', '555', '', '1212'),
('2011/06/7', '555', '', '1212'),
('2011/06/8', '555', '', '1212'),
('2011/06/9', '555', '', '222'),
('2011/06/10', '555', '', '1212'),
('2011/06/11', '555', '', '222'),
('2011/06/12', '555', 'none', ''),
('2012/06/13', '555', '', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `project_official_detail`
--

CREATE TABLE IF NOT EXISTS `project_official_detail` (
  `project_no` varchar(20) NOT NULL,
  `receive_date` date NOT NULL,
  `diary_no` varchar(20) NOT NULL,
  `copy_to` varchar(40) NOT NULL,
  `mark_to` int(40) NOT NULL,
  `address_of_scan_image` varchar(80) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_no`),
  UNIQUE KEY `project_no` (`project_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_official_detail`
--

INSERT INTO `project_official_detail` (`project_no`, `receive_date`, `diary_no`, `copy_to`, `mark_to`, `address_of_scan_image`, `time`) VALUES
('2011/06/1', '2011-06-06', '5465', 'dgsf', 987, 'upload/1307939389.jpg', '2011-06-13 09:59:25'),
('2011/06/10', '2011-06-03', '90876', 'hgfrdxse', 555, 'upload/1308266080.jpg', '2011-06-16 16:14:16'),
('2011/06/11', '2011-06-20', 'dfdf', 'dfd', 555, 'upload/1308469860.jpg', '2011-06-19 00:50:36'),
('2011/06/12', '2011-06-16', '345435', 'we', 555, 'upload/1308699869.jpg', '2011-06-21 16:44:05'),
('2011/06/2', '2011-06-06', '3656', 'gfs', 987, 'upload/1307939715.jpg', '2011-06-13 10:04:52'),
('2011/06/3', '2011-06-10', '345435', 'fdgsg', 987, 'upload/1307940777.jpg', '2011-06-13 10:22:33'),
('2011/06/4', '2011-06-13', '012', 'asim mukherjee', 987, 'upload/1308121736.', '2011-06-15 00:08:32'),
('2011/06/5', '2011-06-08', '345435', 'rpt', 555, 'upload/1308122547.jpg', '2011-06-15 00:22:03'),
('2011/06/6', '2011-06-08', '47204', 'fgwfl', 555, 'upload/1308122970.jpg', '2011-06-15 00:29:06'),
('2011/06/7', '2011-06-07', '2345', '4545', 555, 'upload/1308208093.jpg', '2011-06-16 00:07:50'),
('2011/06/8', '2011-06-03', '0987654', 'xyz jain', 555, 'upload/1308264249.jpg', '2011-06-16 15:43:45'),
('2011/06/9', '2011-06-02', '87654', 'rahul ghandhi', 555, 'upload/1308264744.jpg', '2011-06-16 15:52:00'),
('2012/06/13', '2011-06-13', 'gcgcg', 'gchcg', 555, 'upload/1340649790.', '2012-06-25 11:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `project_receipt_detail`
--

CREATE TABLE IF NOT EXISTS `project_receipt_detail` (
  `project_no` varchar(11) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bill_no` int(11) NOT NULL,
  `signed_by` varchar(10) NOT NULL,
  PRIMARY KEY (`receipt_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_receipt_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `project_stages`
--

CREATE TABLE IF NOT EXISTS `project_stages` (
  `project_no` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_no`),
  FULLTEXT KEY `project_no` (`project_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_stages`
--

INSERT INTO `project_stages` (`project_no`, `flag`, `time`) VALUES
('2011/06/3', 12, '2011-06-15 23:58:25'),
('2011/06/2', 5, '2011-06-13 10:18:33'),
('2011/06/1', 5, '2011-06-13 10:08:59'),
('2011/06/4', 1, '2011-06-15 00:08:32'),
('2011/06/5', 14, '2011-06-21 16:39:46'),
('2011/06/6', 14, '2011-06-15 01:41:08'),
('2011/06/7', 12, '2011-06-16 16:56:10'),
('2011/06/8', 12, '2011-06-16 16:56:33'),
('2011/06/9', 14, '2012-06-25 11:50:26'),
('2011/06/10', 12, '2011-06-16 17:07:19'),
('2011/06/11', 6, '2011-06-21 16:51:58'),
('2011/06/12', 2, '2011-06-21 16:44:38'),
('2012/06/13', 6, '2012-06-25 11:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `project_team_detail`
--

CREATE TABLE IF NOT EXISTS `project_team_detail` (
  `project_no` varchar(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `hod_approval` int(1) NOT NULL DEFAULT '0',
  `director_approval` int(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_no`,`emp_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_team_detail`
--

INSERT INTO `project_team_detail` (`project_no`, `emp_code`, `hod_approval`, `director_approval`, `time`) VALUES
('2011/06/1', '987', 0, 0, '2011-06-13 10:08:28'),
('2011/06/1', '9898', 0, 0, '2011-06-13 10:08:22'),
('2011/06/1', '222', 0, 0, '2011-06-13 10:07:34'),
('2011/06/1', '2222', 0, 0, '2011-06-13 10:08:35'),
('2011/06/2', '222', 0, 0, '2011-06-13 10:16:51'),
('2011/06/3', '222', 1, 0, '2011-06-13 10:28:50'),
('2011/06/3', '987', 1, 0, '2011-06-13 10:28:52'),
('2011/06/3', '9898', 1, 0, '2011-06-13 10:28:57'),
('2011/06/5', '1212', 1, 0, '2011-06-15 00:36:43'),
('2011/06/6', '1212', 1, 0, '2011-06-15 00:37:17'),
('2011/06/6', '2222', 1, 0, '2011-06-15 00:37:25'),
('2011/06/6', '94132', 1, 0, '2011-06-15 00:37:29'),
('', '1212', 0, 0, '2011-06-15 00:37:54'),
('2011/06/5', '9898', 1, 0, '2011-06-15 01:14:08'),
('2011/06/5', '222', 1, 0, '2011-06-15 01:14:11'),
('2011/06/5', '2222', 1, 0, '2011-06-15 01:14:15'),
('2011/06/7', '1212', 1, 0, '2011-06-16 00:27:24'),
('2011/06/7', '9898', 1, 0, '2011-06-16 00:33:26'),
('2011/06/8', '555', 1, 0, '2011-06-16 16:07:20'),
('2011/06/8', '1212', 1, 0, '2011-06-16 16:07:16'),
('2011/06/9', '222', 1, 0, '2011-06-16 16:09:47'),
('2011/06/9', '2222', 1, 0, '2011-06-16 16:10:04'),
('2011/06/9', '555', 1, 0, '2011-06-16 16:10:15'),
('2011/06/10', '1212', 1, 0, '2011-06-16 17:03:09'),
('2011/06/10', '222', 1, 0, '2011-06-16 17:03:14'),
('2011/06/10', '555', 1, 0, '2011-06-16 17:03:18'),
('a2012/06/13', '1212', 0, 0, '2012-06-25 11:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `project_track_record`
--

CREATE TABLE IF NOT EXISTS `project_track_record` (
  `project_no` varchar(20) NOT NULL,
  `1` int(1) NOT NULL DEFAULT '0',
  `1_time` datetime NOT NULL,
  `2` int(1) NOT NULL DEFAULT '0',
  `2_time` datetime NOT NULL,
  `3` int(1) NOT NULL DEFAULT '0',
  `3_time` datetime NOT NULL,
  `4` int(1) NOT NULL DEFAULT '0',
  `4_time` datetime NOT NULL,
  `5` int(1) NOT NULL DEFAULT '0',
  `5_time` datetime NOT NULL,
  `6` int(1) NOT NULL DEFAULT '0',
  `6_time` datetime NOT NULL,
  `7` int(1) NOT NULL DEFAULT '0',
  `7_time` datetime NOT NULL,
  `8` int(1) NOT NULL DEFAULT '0',
  `8_time` datetime NOT NULL,
  `9` int(1) NOT NULL DEFAULT '0',
  `9_time` datetime NOT NULL,
  `10` int(1) NOT NULL DEFAULT '0',
  `10_time` datetime NOT NULL,
  `11` int(1) NOT NULL DEFAULT '0',
  `11_time` datetime NOT NULL,
  `12` int(1) NOT NULL,
  `12_time` datetime NOT NULL,
  `13` int(11) NOT NULL DEFAULT '0',
  `13_time` datetime NOT NULL,
  `14` int(11) NOT NULL DEFAULT '0',
  `14_time` datetime NOT NULL,
  `15` int(11) NOT NULL DEFAULT '0',
  `15_time` datetime NOT NULL,
  `16` int(11) NOT NULL DEFAULT '0',
  `16_time` datetime NOT NULL,
  `17` int(11) NOT NULL DEFAULT '0',
  `17_time` datetime NOT NULL,
  `18` int(11) NOT NULL DEFAULT '0',
  `18_time` datetime NOT NULL,
  `19` int(11) NOT NULL DEFAULT '0',
  `19_time` datetime NOT NULL,
  `20` int(11) NOT NULL DEFAULT '0',
  `20_time` datetime NOT NULL,
  `21` int(11) NOT NULL,
  `21_time` datetime NOT NULL,
  PRIMARY KEY (`project_no`),
  UNIQUE KEY `project_no` (`project_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_track_record`
--

INSERT INTO `project_track_record` (`project_no`, `1`, `1_time`, `2`, `2_time`, `3`, `3_time`, `4`, `4_time`, `5`, `5_time`, `6`, `6_time`, `7`, `7_time`, `8`, `8_time`, `9`, `9_time`, `10`, `10_time`, `11`, `11_time`, `12`, `12_time`, `13`, `13_time`, `14`, `14_time`, `15`, `15_time`, `16`, `16_time`, `17`, `17_time`, `18`, `18_time`, `19`, `19_time`, `20`, `20_time`, `21`, `21_time`) VALUES
('2011/06/1', 1, '2011-06-13 09:59:49', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:01:38', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:09:23', 1, '2011-06-13 10:06:37', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:09:13', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/2', 1, '2011-06-13 10:05:16', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:06:03', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:18:57', 1, '2011-06-13 10:16:59', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/3', 1, '2011-06-13 10:22:57', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:24:42', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:27:47', 1, '2011-06-13 10:28:39', 0, '0000-00-00 00:00:00', 1, '2011-06-13 10:29:27', 1, '2011-06-13 10:30:31', 0, '0000-00-00 00:00:00', 1, '2011-06-13 11:43:04', 1, '2011-06-15 11:58:49', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/4', 1, '2011-06-15 12:08:56', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/5', 1, '2011-06-15 12:22:27', 0, '0000-00-00 00:00:00', 1, '2011-06-15 12:22:56', 0, '0000-00-00 00:00:00', 1, '2011-06-15 12:32:42', 1, '2011-06-15 12:33:31', 1, '2011-06-15 01:11:38', 1, '2011-06-15 01:14:40', 1, '2011-06-15 01:15:27', 0, '0000-00-00 00:00:00', 1, '2011-06-15 01:20:18', 1, '2011-06-15 01:43:08', 1, '2011-06-21 04:39:09', 1, '2011-06-21 04:40:10', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/6', 1, '2011-06-15 12:29:31', 0, '0000-00-00 00:00:00', 1, '2011-06-15 12:30:22', 0, '0000-00-00 00:00:00', 1, '2011-06-15 12:35:56', 1, '2011-06-15 12:36:34', 0, '0000-00-00 00:00:00', 1, '2011-06-15 12:38:10', 1, '2011-06-15 12:38:54', 0, '0000-00-00 00:00:00', 1, '2011-06-15 12:58:30', 1, '2011-06-15 00:00:00', 1, '2011-06-15 00:00:00', 1, '2011-06-15 01:41:32', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/7', 1, '2011-06-16 12:08:14', 0, '0000-00-00 00:00:00', 1, '2011-06-16 12:12:00', 0, '0000-00-00 00:00:00', 1, '2011-06-16 12:12:57', 1, '2011-06-16 12:16:33', 0, '0000-00-00 00:00:00', 1, '2011-06-16 12:33:52', 1, '2011-06-16 12:34:51', 0, '0000-00-00 00:00:00', 1, '2011-06-16 12:36:42', 1, '2011-06-16 04:56:34', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/8', 1, '2011-06-16 03:44:09', 0, '0000-00-00 00:00:00', 1, '2011-06-16 03:47:23', 0, '0000-00-00 00:00:00', 1, '2011-06-16 03:54:56', 1, '2011-06-16 04:02:48', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:07:52', 1, '2011-06-16 04:08:24', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:45:22', 1, '2011-06-16 04:56:57', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/9', 1, '2011-06-16 03:52:24', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:02:33', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:05:02', 1, '2011-06-16 04:08:33', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:10:41', 1, '2011-06-16 04:10:56', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:53:14', 1, '2011-06-16 04:57:10', 1, '2011-06-21 04:40:55', 1, '2012-06-25 11:50:50', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/10', 1, '2011-06-16 04:14:40', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:15:03', 0, '0000-00-00 00:00:00', 1, '2011-06-16 04:16:13', 1, '2011-06-16 04:53:30', 1, '2011-06-16 04:55:44', 1, '2011-06-16 05:03:44', 1, '2011-06-16 05:04:06', 0, '0000-00-00 00:00:00', 1, '2011-06-16 05:07:19', 1, '2011-06-16 05:07:43', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/11', 1, '2011-06-19 12:51:00', 0, '0000-00-00 00:00:00', 1, '2011-06-21 04:45:15', 0, '0000-00-00 00:00:00', 1, '2011-06-21 04:49:35', 1, '2011-06-21 04:52:22', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2011/06/12', 1, '2011-06-21 04:44:29', 1, '2011-06-21 04:45:02', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
('2012/06/13', 1, '2012-06-25 11:43:10', 0, '0000-00-00 00:00:00', 1, '2012-06-25 11:44:42', 0, '0000-00-00 00:00:00', 1, '2012-06-25 11:46:08', 1, '2012-06-25 11:48:12', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `res_userlog`
--

CREATE TABLE IF NOT EXISTS `res_userlog` (
  `emp_id` varchar(255) NOT NULL,
  `local_ip` varchar(255) NOT NULL,
  `global_ip` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `success` char(1) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_userlog`
--

INSERT INTO `res_userlog` (`emp_id`, `local_ip`, `global_ip`, `date`, `success`, `browser`, `url`) VALUES
('', '::1', '::1', '2011-06-18 22:14:30', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'register.php'),
('', '::1', '::1', '2011-06-19 00:15:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-19 00:15:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-19 00:15:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-19 00:15:29', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 00:15:30', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 00:15:32', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 00:16:48', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 00:18:12', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 00:18:13', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-19 00:19:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-19 00:19:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 00:19:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:19:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:19:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:11', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:11', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:11', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:17', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:17', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:18', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:18', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:19:18', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:24:45', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance_print.php'),
('1212', '::1', '::1', '2011-06-19 00:24:54', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:25:52', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:25:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:25:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:02', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:02', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:02', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:04', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-19 00:26:08', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-19 00:26:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:12', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:12', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:16', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:16', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:29', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:29', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:32', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:33', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:26:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:26:47', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-16%2017:28:44'),
('1212', '::1', '::1', '2011-06-19 00:26:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-16%2017:28:44'),
('1212', '::1', '::1', '2011-06-19 00:26:57', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-16%2017:28:44'),
('1212', '::1', '::1', '2011-06-19 00:27:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-16%2017:28:44'),
('1212', '::1', '::1', '2011-06-19 00:27:04', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-16%2017:28:44'),
('1212', '::1', '::1', '2011-06-19 00:27:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:08', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:27:17', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 00:27:17', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:27:25', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 00:47:07', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-19 00:47:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-19 00:47:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-19 00:47:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 00:47:17', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('94132', '::1', '::1', '2011-06-19 00:47:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('94132', '::1', '::1', '2011-06-19 00:47:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('94132', '::1', '::1', '2011-06-19 00:47:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-06-19 00:47:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-06-19 00:47:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-06-19 00:47:50', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-06-19 00:48:49', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'consultant_detail.php'),
('94132', '::1', '::1', '2011-06-19 00:49:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'consultant_detail.php'),
('94132', '::1', '::1', '2011-06-19 00:50:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'consultant_detail.php'),
('94132', '::1', '::1', '2011-06-19 00:50:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('94132', '::1', '::1', '2011-06-19 00:50:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-06-19 00:50:40', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-19 00:53:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-19 00:53:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-19 00:53:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 01:02:50', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('94132', '::1', '::1', '2011-06-19 01:02:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('94132', '::1', '::1', '2011-06-19 01:02:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('94132', '::1', '::1', '2011-06-19 01:02:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-06-19 01:03:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('94132', '::1', '::1', '2011-06-19 01:03:11', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-19 01:03:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-19 01:03:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-19 01:03:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 01:03:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('555', '::1', '::1', '2011-06-19 01:04:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('555', '::1', '::1', '2011-06-19 01:04:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('555', '::1', '::1', '2011-06-19 22:01:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('555', '::1', '::1', '2011-06-19 22:01:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-19 22:01:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 22:01:33', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 22:01:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance_print.php'),
('555', '::1', '::1', '2011-06-19 22:01:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-19 22:01:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-19 22:01:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-19 22:01:54', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-19 22:01:54', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:01:54', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:01:57', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:01:57', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:03:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:03:16', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:03:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:03:37', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:03:45', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-19%2022:03:24'),
('1212', '::1', '::1', '2011-06-19 22:03:50', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-19%2022:03:24'),
('1212', '::1', '::1', '2011-06-19 22:03:52', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-19%2022:03:24'),
('1212', '::1', '::1', '2011-06-19 22:04:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php?ddel=2011-06-19%2022:03:24'),
('1212', '::1', '::1', '2011-06-19 22:04:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:16', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', '11'),
('1212', '::1', '::1', '2011-06-19 22:04:16', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'project_status.php'),
('1212', '::1', '::1', '2011-06-19 22:04:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:25', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:25', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'project_status.php'),
('1212', '::1', '::1', '2011-06-19 22:04:32', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:04:32', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'project_status.php'),
('1212', '::1', '::1', '2011-06-19 22:05:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'status.php'),
('1212', '::1', '::1', '2011-06-19 22:05:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:05:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:05:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-19 22:05:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-19 22:08:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-19 22:10:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-19 22:37:30', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'status.php'),
('1212', '::1', '::1', '2011-06-19 22:37:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:37:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:38:15', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:38:17', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:38:18', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:38:35', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:38:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:38:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:38:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:21', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:27', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:39', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:39', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:39', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:40', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:40', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:39:40', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:50:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-19 22:50:56', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-19 22:50:56', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 22:50:56', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:50:58', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 22:50:58', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:51:06', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:54:13', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:54:21', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:54:22', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:54:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 22:54:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-19 23:05:27', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 23:05:27', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 23:05:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('2222', '::1', '::1', '2011-06-19 23:05:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('2222', '::1', '::1', '2011-06-19 23:05:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('2222', '::1', '::1', '2011-06-19 23:05:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('2222', '::1', '::1', '2011-06-19 23:05:38', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('2222', '::1', '::1', '2011-06-19 23:06:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'test_detail.php'),
('2222', '::1', '::1', '2011-06-19 23:09:06', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'test_detail.php'),
('2222', '::1', '::1', '2011-06-19 23:18:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('2222', '::1', '::1', '2011-06-19 23:18:35', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-19 23:18:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-19 23:18:42', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-19 23:18:42', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-19 23:18:43', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-19 23:22:40', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-19 23:22:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-19 23:22:49', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-21 16:33:06', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:33:06', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:33:58', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:33:58', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:34:04', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:34:16', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:35:58', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:36:02', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:38:06', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'status.php'),
('1212', '::1', '::1', '2011-06-21 16:38:08', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:38:08', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:38:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-21 16:38:13', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'status.php'),
('1212', '::1', '::1', '2011-06-21 16:38:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:38:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:38:15', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:38:15', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:38:43', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:38:45', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:38:45', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance_print.php'),
('1212', '::1', '::1', '2011-06-21 16:39:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('1212', '::1', '::1', '2011-06-21 16:39:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:39:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:39:06', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-21 16:39:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-21 16:39:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:39:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:39:16', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-21 16:39:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-21 16:39:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-21 16:39:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:39:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:39:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance_approve.php'),
('555', '::1', '::1', '2011-06-21 16:39:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance_approve.php'),
('555', '::1', '::1', '2011-06-21 16:39:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-21 16:39:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:39:49', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-21 16:40:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-21 16:40:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-21 16:40:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:40:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('222', '::1', '::1', '2011-06-21 16:40:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('222', '::1', '::1', '2011-06-21 16:40:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('222', '::1', '::1', '2011-06-21 16:40:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:40:15', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:40:15', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('222', '::1', '::1', '2011-06-21 16:40:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('222', '::1', '::1', '2011-06-21 16:40:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('222', '::1', '::1', '2011-06-21 16:40:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance_print.php'),
('222', '::1', '::1', '2011-06-21 16:40:35', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'advance.php'),
('222', '::1', '::1', '2011-06-21 16:40:35', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('222', '::1', '::1', '2011-06-21 16:40:35', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:40:37', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-21 16:40:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-21 16:40:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:40:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:40:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('1212', '::1', '::1', '2011-06-21 16:41:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-21 16:41:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-21 16:41:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:41:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:41:54', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('94132', '::1', '::1', '2011-06-21 16:41:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('94132', '::1', '::1', '2011-06-21 16:41:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('94132', '::1', '::1', '2011-06-21 16:41:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-06-21 16:42:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-06-21 16:42:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-06-21 16:42:49', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-06-21 16:42:49', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'consultant_detail.php'),
('94132', '::1', '::1', '2011-06-21 16:44:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'consultant_detail.php'),
('94132', '::1', '::1', '2011-06-21 16:44:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('94132', '::1', '::1', '2011-06-21 16:44:05', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-06-21 16:44:11', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-21 16:44:22', '0', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-21 16:44:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-21 16:44:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-21 16:44:28', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:44:33', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:44:33', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_mark.php'),
('555', '::1', '::1', '2011-06-21 16:44:38', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_mark.php'),
('555', '::1', '::1', '2011-06-21 16:44:38', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:44:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:44:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_mark.php'),
('555', '::1', '::1', '2011-06-21 16:44:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_mark.php'),
('555', '::1', '::1', '2011-06-21 16:44:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:44:57', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-21 16:45:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-21 16:45:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:45:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:45:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-21 16:45:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-21 16:45:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-21 16:45:31', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:45:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'wall.php'),
('555', '::1', '::1', '2011-06-21 16:45:50', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'status.php'),
('555', '::1', '::1', '2011-06-21 16:45:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-21 16:45:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:45:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:45:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:46:00', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:46:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:46:01', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:46:02', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:46:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:46:03', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:47:24', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-21 16:47:32', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-21 16:47:32', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:47:32', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:47:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:47:42', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:47:42', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:47:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:47:44', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:47:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('222', '::1', '::1', '2011-06-21 16:48:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('222', '::1', '::1', '2011-06-21 16:48:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('222', '::1', '::1', '2011-06-21 16:48:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:48:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:48:46', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'bill.php'),
('222', '::1', '::1', '2011-06-21 16:48:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'bill.php'),
('222', '::1', '::1', '2011-06-21 16:49:11', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'bill.php'),
('222', '::1', '::1', '2011-06-21 16:49:13', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'bill_print.php'),
('222', '::1', '::1', '2011-06-21 16:49:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('222', '::1', '::1', '2011-06-21 16:49:23', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:49:40', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:49:41', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:49:42', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:49:43', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-21 16:49:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-21 16:49:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:49:59', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:50:02', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:50:07', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('555', '::1', '::1', '2011-06-21 16:51:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('555', '::1', '::1', '2011-06-21 16:51:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('555', '::1', '::1', '2011-06-21 16:51:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:51:56', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:51:56', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'bill_approve.php'),
('555', '::1', '::1', '2011-06-21 16:51:58', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'bill_approve.php'),
('555', '::1', '::1', '2011-06-21 16:51:58', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'hod_home.php'),
('555', '::1', '::1', '2011-06-21 16:52:02', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('1212', '::1', '::1', '2011-06-21 16:52:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('1212', '::1', '::1', '2011-06-21 16:52:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('1212', '::1', '::1', '2011-06-21 16:52:09', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('1212', '::1', '::1', '2011-06-21 16:52:15', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'logout.php'),
('222', '::1', '::1', '2011-06-21 16:52:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'login.php'),
('222', '::1', '::1', '2011-06-21 16:52:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'home.php'),
('222', '::1', '::1', '2011-06-21 16:52:26', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:54:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:55:20', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 16:58:29', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 17:00:08', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-21 17:05:34', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:47', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:50', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:51', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:52', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:52', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:52', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('222', '::1', '::1', '2011-06-22 00:20:53', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1', 'oc_pi_home.php'),
('94132', '::1', '::1', '2011-11-26 22:19:27', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'login.php');
INSERT INTO `res_userlog` (`emp_id`, `local_ip`, `global_ip`, `date`, `success`, `browser`, `url`) VALUES
('94132', '::1', '::1', '2011-11-26 22:19:27', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'home.php'),
('94132', '::1', '::1', '2011-11-26 22:19:27', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-11-26 22:19:33', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'wall.php'),
('94132', '::1', '::1', '2011-11-26 22:19:34', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'home.php'),
('94132', '::1', '::1', '2011-11-26 22:19:34', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-11-26 22:19:36', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-11-26 22:19:38', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'director_home.php'),
('94132', '::1', '::1', '2011-11-26 22:19:38', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-11-26 22:19:42', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-11-26 22:20:14', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-11-26 22:20:17', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-11-26 22:21:43', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'test_detail.php'),
('94132', '::1', '::1', '2011-11-26 22:21:49', '1', 'Mozilla/5.0 (Windows NT 6.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1', 'test_detail.php'),
('1234', '::1', '::1', '2012-06-25 11:31:22', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('1234', '::1', '::1', '2012-06-25 11:31:22', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1234', '::1', '::1', '2012-06-25 11:31:22', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:31:31', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:31:33', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:31:34', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:31:37', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'status.php'),
('1234', '::1', '::1', '2012-06-25 11:31:39', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', '12'),
('1234', '::1', '::1', '2012-06-25 11:31:39', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'project_status.php'),
('1234', '::1', '::1', '2012-06-25 11:31:48', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1234', '::1', '::1', '2012-06-25 11:31:48', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:31:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', '11'),
('1234', '::1', '::1', '2012-06-25 11:31:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'project_status.php'),
('1234', '::1', '::1', '2012-06-25 11:32:00', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1234', '::1', '::1', '2012-06-25 11:32:00', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:32:01', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'status.php'),
('1234', '::1', '::1', '2012-06-25 11:32:19', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('9898', '::1', '::1', '2012-06-25 11:32:33', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('9898', '::1', '::1', '2012-06-25 11:32:33', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('9898', '::1', '::1', '2012-06-25 11:32:33', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'admin_home.php'),
('9898', '::1', '::1', '2012-06-25 11:32:55', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'admin_edit_user.php'),
('9898', '::1', '::1', '2012-06-25 11:33:09', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'admin_home.php'),
('9898', '::1', '::1', '2012-06-25 11:33:16', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'admin_edit_states.php'),
('9898', '::1', '::1', '2012-06-25 11:33:20', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'admin_home.php'),
('9898', '::1', '::1', '2012-06-25 11:33:27', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('1212', '::1', '::1', '2012-06-25 11:36:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('1212', '::1', '::1', '2012-06-25 11:36:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1212', '::1', '::1', '2012-06-25 11:36:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:37:02', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:37:04', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:37:08', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('555', '::1', '::1', '2012-06-25 11:37:30', '0', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('555', '::1', '::1', '2012-06-25 11:37:36', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('555', '::1', '::1', '2012-06-25 11:37:36', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('555', '::1', '::1', '2012-06-25 11:37:36', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:37:42', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:37:42', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'advance_approve.php'),
('555', '::1', '::1', '2012-06-25 11:37:46', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:37:51', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'wall.php'),
('555', '::1', '::1', '2012-06-25 11:37:55', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('222', '::1', '::1', '2012-06-25 11:38:21', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('222', '::1', '::1', '2012-06-25 11:38:22', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('222', '::1', '::1', '2012-06-25 11:38:22', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('222', '::1', '::1', '2012-06-25 11:38:25', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('222', '::1', '::1', '2012-06-25 11:38:28', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'status.php'),
('222', '::1', '::1', '2012-06-25 11:38:29', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('222', '::1', '::1', '2012-06-25 11:38:29', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('222', '::1', '::1', '2012-06-25 11:38:36', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'wall.php'),
('222', '::1', '::1', '2012-06-25 11:38:42', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('94132', '::1', '::1', '2012-06-25 11:39:09', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('94132', '::1', '::1', '2012-06-25 11:39:09', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('94132', '::1', '::1', '2012-06-25 11:39:09', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('94132', '::1', '::1', '2012-06-25 11:39:11', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('94132', '::1', '::1', '2012-06-25 11:39:11', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'test_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:40:03', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'test_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:40:16', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'test_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:40:26', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'test_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:40:43', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'test_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:40:44', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'consultant_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:40:56', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'consultant_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:42:10', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'consultant_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:42:30', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'consultant_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:42:45', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'consultant_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:42:46', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'consultant_detail.php'),
('94132', '::1', '::1', '2012-06-25 11:42:47', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('94132', '::1', '::1', '2012-06-25 11:42:47', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('94132', '::1', '::1', '2012-06-25 11:42:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('9898', '::1', '::1', '2012-06-25 11:43:03', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('9898', '::1', '::1', '2012-06-25 11:43:03', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('9898', '::1', '::1', '2012-06-25 11:43:03', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'admin_home.php'),
('9898', '::1', '::1', '2012-06-25 11:43:07', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('1234', '::1', '::1', '2012-06-25 11:43:29', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('1234', '::1', '::1', '2012-06-25 11:43:29', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1234', '::1', '::1', '2012-06-25 11:43:29', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:43:34', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('1234', '::1', '::1', '2012-06-25 11:43:34', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'test_detail.php'),
('1234', '::1', '::1', '2012-06-25 11:43:55', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('555', '::1', '::1', '2012-06-25 11:44:05', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('555', '::1', '::1', '2012-06-25 11:44:05', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('555', '::1', '::1', '2012-06-25 11:44:05', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:44:07', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:44:07', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_mark.php'),
('555', '::1', '::1', '2012-06-25 11:44:18', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_mark.php'),
('555', '::1', '::1', '2012-06-25 11:44:18', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:44:38', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('1212', '::1', '::1', '2012-06-25 11:44:50', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('1212', '::1', '::1', '2012-06-25 11:44:50', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1212', '::1', '::1', '2012-06-25 11:44:50', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:44:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:44:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:45:07', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:45:34', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:45:44', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:45:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill_print.php'),
('1212', '::1', '::1', '2012-06-25 11:46:14', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1212', '::1', '::1', '2012-06-25 11:46:14', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:47:13', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:47:13', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'advance.php'),
('1212', '::1', '::1', '2012-06-25 11:47:19', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:47:21', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:47:25', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('555', '::1', '::1', '2012-06-25 11:47:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('555', '::1', '::1', '2012-06-25 11:47:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('555', '::1', '::1', '2012-06-25 11:47:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:47:45', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:47:45', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill_approve.php'),
('555', '::1', '::1', '2012-06-25 11:47:48', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill_approve.php'),
('555', '::1', '::1', '2012-06-25 11:47:49', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:47:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('1212', '::1', '::1', '2012-06-25 11:48:02', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('1212', '::1', '::1', '2012-06-25 11:48:02', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:02', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:07', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:07', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'team.php'),
('1212', '::1', '::1', '2012-06-25 11:48:11', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:48:14', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:48:30', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:48:32', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:48:34', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill_print.php'),
('1212', '::1', '::1', '2012-06-25 11:48:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:45', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:45', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'advance.php'),
('1212', '::1', '::1', '2012-06-25 11:48:51', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:48:57', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:49:02', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:49:07', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('2222', '::1', '::1', '2012-06-25 11:49:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('2222', '::1', '::1', '2012-06-25 11:49:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('2222', '::1', '::1', '2012-06-25 11:49:42', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('2222', '::1', '::1', '2012-06-25 11:49:43', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'director_home.php'),
('2222', '::1', '::1', '2012-06-25 11:49:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('555', '::1', '::1', '2012-06-25 11:50:17', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('555', '::1', '::1', '2012-06-25 11:50:17', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('555', '::1', '::1', '2012-06-25 11:50:17', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:50:21', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:50:21', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'advance_approve.php'),
('555', '::1', '::1', '2012-06-25 11:50:26', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'advance_approve.php'),
('555', '::1', '::1', '2012-06-25 11:50:26', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('555', '::1', '::1', '2012-06-25 11:50:26', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'hod_home.php'),
('555', '::1', '::1', '2012-06-25 11:50:30', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'logout.php'),
('1212', '::1', '::1', '2012-06-25 11:50:48', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'login.php'),
('1212', '::1', '::1', '2012-06-25 11:50:48', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1212', '::1', '::1', '2012-06-25 11:50:48', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:50:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:50:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'team.php'),
('1212', '::1', '::1', '2012-06-25 11:50:53', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:03', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:06', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:09', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:10', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:10', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:11', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:11', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:12', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:13', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:13', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:13', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:13', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php'),
('1212', '::1', '::1', '2012-06-25 11:51:14', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php?ddel=2012-06-25%2011:48:30'),
('1212', '::1', '::1', '2012-06-25 11:51:29', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php?ddel=2012-06-25%2011:48:30'),
('1212', '::1', '::1', '2012-06-25 11:51:41', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php?ddel=2012-06-25%2011:48:30'),
('1212', '::1', '::1', '2012-06-25 11:51:44', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php?ddel=2012-06-25%2011:48:30'),
('1212', '::1', '::1', '2012-06-25 11:51:46', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill_print.php'),
('1212', '::1', '::1', '2012-06-25 11:51:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'home.php'),
('1212', '::1', '::1', '2012-06-25 11:51:52', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:51:54', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'oc_pi_home.php'),
('1212', '::1', '::1', '2012-06-25 11:51:54', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'team.php'),
('1212', '::1', '::1', '2012-06-25 11:51:56', '1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5', 'bill.php');

-- --------------------------------------------------------

--
-- Table structure for table `stage_description`
--

CREATE TABLE IF NOT EXISTS `stage_description` (
  `description` text NOT NULL,
  `flag` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stage_description`
--

INSERT INTO `stage_description` (`description`, `flag`) VALUES
('Project is marked by Director to the HOD', 1),
('Project is marked  By HOD to the OC.\r\n', 2),
('Project is marked by the HOD to the PI.\r\n', 3),
('Project is marked by the OC to the PI', 4),
('Bill has been prepared and sent to the HOD for approval', 5),
('Team formation completed , sent to HOD for signature', 8),
('Submission of money by the organization', 11),
('Issue of receipt by DEAN R&C', 12),
('Application of advance filed and sent to HOD for approval', 13),
('Conformation of advance by the director', 15),
('Adjustment of advance submitted by the PI.', 17),
('Submission of Report', 18),
('Bill has been sent to the director for approval.', 7),
('List of team members approved by HOD', 9),
('List of team members approved by the  Director', 10),
('Bill has been approved by the HOD', 6),
('Distribution decided by PI and sent to DEAN R&C', 19),
('Distribution approved by DEAN R&C and payment done\r\n', 20),
('Application of advance approved by the HOD', 14),
('Requested amount for advance paid to PI', 16),
('Project Complete', 21);

-- --------------------------------------------------------

--
-- Table structure for table `standard_rates`
--

CREATE TABLE IF NOT EXISTS `standard_rates` (
  `department` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rate` decimal(11,2) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`department`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='For service tax and TDS the flag should be 1 and for the res';

--
-- Dumping data for table `standard_rates`
--

INSERT INTO `standard_rates` (`department`, `name`, `rate`, `flag`, `time`) VALUES
('rule', 'service_tax', '10.25', 1, '2011-06-03 08:52:47'),
('rule', 'advance_allowed', '25.00', 0, '2011-06-03 08:52:47'),
('rule', 'bill_limit_director', '500000.00', 1, '2011-06-11 20:12:33'),
('rule', 'team_limit_director', '500000.00', 1, '2011-06-11 20:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`name`) VALUES
('Andhra Pradesh'),
('Arunanchal Pradesh'),
('Assam'),
('Bihar'),
('Chhattisgarh'),
('Goa'),
('Gujrat'),
('Haryana'),
('Himachal Pradesh'),
('Jammu and Kashmir'),
('Jharkhand'),
('Karnataka'),
('Kerala'),
('Madhya Pradesh'),
('Maharashtra'),
('Manipur'),
('Meghalaya'),
('Mizoram'),
('Nagaland'),
('Orissa'),
('Punjab'),
('Rajasthan'),
('Sikkim'),
('Tamil Nadu'),
('Tripura'),
('Uttar Pradesh'),
('Uttarakhand'),
('West Bengal'),
('Andaman and Nicobar Islands'),
('Chandigarh'),
('Dadar and Nagar Haveli'),
('Daman and Diu'),
('Lakhshadweep'),
('Delhi'),
('Pondicherry');

-- --------------------------------------------------------

--
-- Table structure for table `state_department`
--

CREATE TABLE IF NOT EXISTS `state_department` (
  `name` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='1: Department  2: State';

--
-- Dumping data for table `state_department`
--

INSERT INTO `state_department` (`name`, `flag`) VALUES
('Applied Mechanics Department', 1),
('Chemistry  Department', 1),
('Civil Engineering', 1),
('Computer Science and Engineering', 1),
('Mechanical Engineering', 1),
('Electrical Engineering', 1),
('Electronics and Communication Engineering', 1),
('Mathematics Department', 1),
('Humanities and Social Science Department', 1),
('Management Studies Department', 1),
('GIS cell', 1),
('Physics Department', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_report`
--

CREATE TABLE IF NOT EXISTS `sub_report` (
  `project_no` varchar(20) NOT NULL,
  `address_of_upload_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_report`
--

INSERT INTO `sub_report` (`project_no`, `address_of_upload_file`) VALUES
('2011/06/1', 'upload/1308385920.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
  `voucher_no` int(10) NOT NULL AUTO_INCREMENT,
  `cheque_no` int(11) NOT NULL,
  `project_no` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `income` int(1) NOT NULL,
  `service` int(1) NOT NULL,
  `distribution` int(1) NOT NULL,
  `pay_to` varchar(1000) NOT NULL,
  `on_account_of` varchar(1000) NOT NULL,
  `account_no` bigint(20) NOT NULL,
  `dated` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`voucher_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32532173 ;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_no`, `cheque_no`, `project_no`, `date`, `income`, `service`, `distribution`, `pay_to`, `on_account_of`, `account_no`, `dated`, `amount`) VALUES
(32532172, 4252, '100', '2011-06-14 10:19:55', 0, 1, 0, 'allahabad bank service', 'service tax', 214216786854342, '2011-06-03', '100.00'),
(32532171, 84305, '100', '2011-06-14 10:15:19', 1, 0, 0, 'allahabad bank service', 'service tax', 8756438275453, '2011-06-09', '113220.00'),
(32532170, 54524, '', '2011-06-13 16:12:31', 1, 0, 0, 'ghfg', 'ghfgfh', 4334, '2011-06-02', '5454.00'),
(32532169, 766332, '', '2011-06-13 15:48:47', 1, 0, 0, 'hjhfj', 'gjg', 54445, '2011-06-03', '66.00'),
(32532168, 3234, '', '2011-06-13 15:47:31', 1, 0, 0, 'ghh', 'jhtj', 31, '2011-06-02', '4345.00'),
(32532167, 3234, '', '2011-06-13 15:46:04', 1, 0, 0, 'ghh', 'jhtj', 31, '2011-06-02', '4345.00'),
(32532166, 3234, '', '2011-06-13 15:45:49', 1, 0, 0, 'ghh', 'jhtj', 31, '2011-06-02', '4345.00'),
(32532165, 3234, '', '2011-06-13 15:44:28', 1, 0, 0, 'ghh', 'jhtj', 31, '2011-06-02', '4345.00'),
(32532164, 67, '', '2011-06-13 15:40:01', 1, 0, 0, 'manish', 'aakash', 123, '2011-06-02', '123.00'),
(32532163, 5, '', '2011-06-13 15:34:34', 1, 0, 0, 'hgfg', 'gfhgh', 432, '2011-06-02', '535.00'),
(32532162, 223, '', '2011-06-13 15:31:32', 1, 0, 0, 'jgjh', 'jhhj', 66, '2011-06-02', '56564546.00'),
(32532161, 2, '', '2011-06-13 15:31:01', 0, 1, 0, 'gjfhj', 'hbbk', 645, '2011-06-03', '65465.00'),
(32532160, 1, '', '2011-06-13 15:30:10', 1, 0, 0, 'ghfggd', 'gfhhgh', 12, '2011-06-01', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_detail`
--

CREATE TABLE IF NOT EXISTS `voucher_detail` (
  `voucher_no` int(10) NOT NULL,
  `reference_of_bill` varchar(100) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `head_of_account` varchar(100) DEFAULT NULL,
  `budget` decimal(10,0) DEFAULT NULL,
  `expenditure_including_present_bill` varchar(10) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_detail`
--

INSERT INTO `voucher_detail` (`voucher_no`, `reference_of_bill`, `amount`, `head_of_account`, `budget`, `expenditure_including_present_bill`, `time`) VALUES
(32532169, 'service tax', '109908', '', '0', '\r\n		', '2011-06-13 16:59:07'),
(32532171, 'service tax', '109908', 'r&c', '0', '\r\n		', '2011-06-14 10:15:43'),
(32532171, 'education cess', '2198', 'r&c', '0', '\r\n		', '2011-06-14 10:16:10'),
(32532171, 'HS ed cess', '1099', 'r&c', '0', '\r\n		', '2011-06-14 10:16:35'),
(32532171, 'interest', '15', 'r&c', '0', '\r\n		', '2011-06-14 10:16:58'),
(32532172, 'ineterst', '10', 'r&c', '0', '\r\n		', '2011-06-14 10:46:26'),
(32532172, 'education cess', '50', 'r&c', '0', '\r\n		', '2011-06-14 10:46:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
