-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2016 at 08:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecell`
--

-- --------------------------------------------------------

--
-- Table structure for table `celt`
--

CREATE TABLE IF NOT EXISTS `celt` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `university` varchar(300) NOT NULL,
  `country` varchar(100) NOT NULL,
  `social_profile` varchar(500) NOT NULL,
  `resume_target` varchar(500) NOT NULL,
  `fpanel` varchar(20) NOT NULL,
  `spanel` varchar(20) NOT NULL,
  `benefit` varchar(1000) NOT NULL,
  `why_select` varchar(1000) NOT NULL,
  `challenges` varchar(1000) NOT NULL,
  `where_years` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `celt`
--

INSERT INTO `celt` (`id`, `fname`, `lname`, `gender`, `email`, `contact_no`, `qualification`, `university`, `country`, `social_profile`, `resume_target`, `fpanel`, `spanel`, `benefit`, `why_select`, `challenges`, `where_years`) VALUES
(1, 'ssssss', 'sssssss', 'Male', 's@s.com', '33333333333', 'ssssss', 'sssssssss', 'ssssssssss', 'sssss', '', 'Panel 1', 'Panel 1', 'aaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaa'),
(2, 'ssssss', 'sssssss', 'Male', 's@s.com', '33333333333', 'ssssss', 'sssssssss', 'ssssssssss', 'sssss', '', 'Panel 1', 'Panel 1', 'aaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaaaa'),
(3, 'ssssss', 'sdasd', 'Male', 's@s.com', '33', 'asdsd', 'qwe', 'fg', 'erer', '', 'Panel 1', 'Panel 1', 'ujyh', 'thhtth', 'htyhtyh', 'hthhtyh'),
(4, 'ssssss', 'ewrewr', 'Male', 's@s.com', 'das9304', '3290', 'dsfjnd', 'lfnlkf', 'slfknfs', '', 'Panel 1', 'Panel 1', 'asdasda', 'asdasd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `investor`
--

CREATE TABLE IF NOT EXISTS `investor` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type_business` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `revenue` varchar(50) NOT NULL,
  `area_incorporation` varchar(50) NOT NULL,
  `venture_type` varchar(50) NOT NULL,
  `team_size` int(50) NOT NULL,
  `founder_name` varchar(100) NOT NULL,
  `linkedin_url` varchar(500) NOT NULL,
  `current_funding_req` varchar(500) NOT NULL,
  `premoney_eval` varchar(50) NOT NULL,
  `explanation` varchar(1000) NOT NULL,
  `past_investment` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investor`
--

INSERT INTO `investor` (`id`, `name`, `company_name`, `contact_no`, `email`, `type_business`, `area`, `year`, `revenue`, `area_incorporation`, `venture_type`, `team_size`, `founder_name`, `linkedin_url`, `current_funding_req`, `premoney_eval`, `explanation`, `past_investment`) VALUES
(1, 'shikhar', 'the new topic', '2147483647', 'shikhar.447@rediffmail.com', '0', 'it', 'Less than a year', 'Yes', 'ty', 'Proprietorship', 5, '', '', '200', '200', 'dfdgdg', '300');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(5, 'ss', 'ss@ss.com', '$2y$10$KUI8KRuRiKwWB7mnhUnZneLy.AlsulsxAa5GtdyqX/GoDQkqXxmYS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_pass` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'shikhar.447', 'sh@sh.com', '$2y$10$SOOC9dhAVuK0UnZRm1bmueHm9AHbaex4rhBI34iNrp/b0z/KNSoU.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `celt`
--
ALTER TABLE `celt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investor`
--
ALTER TABLE `investor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `celt`
--
ALTER TABLE `celt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `investor`
--
ALTER TABLE `investor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
