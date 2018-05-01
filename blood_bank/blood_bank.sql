-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 11:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_info`
--

CREATE TABLE `blood_info` (
  `blood_type` varchar(200) NOT NULL,
  `units` int(11) NOT NULL,
  `date` date NOT NULL,
  `details` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_info`
--

INSERT INTO `blood_info` (`blood_type`, `units`, `date`, `details`, `id`) VALUES
('O+', 20, '2018-03-02', 'Vampire is coming.', 1),
('A+', 5, '2018-03-02', 'nnnn', 2),
('B-', 53, '2018-03-02', 'fdgd', 3),
('A-', 0, '2018-03-02', 'sad', 4);

-- --------------------------------------------------------

--
-- Table structure for table `requested_blood`
--

CREATE TABLE `requested_blood` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `mobno` int(11) NOT NULL,
  `blood_type` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receivers`
--

CREATE TABLE `tbl_receivers` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userBlood` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_receivers`
--

INSERT INTO `tbl_receivers` (`userID`, `userName`, `userEmail`, `userPass`, `userBlood`, `userStatus`, `tokenCode`) VALUES
(3, 'receiver', '1305030@kiit.ac.in', '32bbef901c5c3449b884e8245a82d44e', 'O+', 'Y', '03b38f9b0f93c33f74ebe82cab921375');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`) VALUES
(2, 'shikhar', 'shikhar.447@rediffmail.com', '32bbef901c5c3449b884e8245a82d44e', 'Y', '18df8ea273e0a76b8dc66d721aa66113'),
(4, 'shikku', 'shikharsaran.sss@gmail.com', '32bbef901c5c3449b884e8245a82d44e', 'Y', '5b2f9f85b3d982e59f6b348ecd81ebe5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_info`
--
ALTER TABLE `blood_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requested_blood`
--
ALTER TABLE `requested_blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_receivers`
--
ALTER TABLE `tbl_receivers`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_info`
--
ALTER TABLE `blood_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_receivers`
--
ALTER TABLE `tbl_receivers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `requested_blood`
--
ALTER TABLE `requested_blood`
  ADD CONSTRAINT `requested_blood_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_receivers` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
