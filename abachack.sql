-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abachack`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `compid` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `roomno` int(11) NOT NULL,
  `hostelname` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `response` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`compid`, `complaint`, `roomno`, `hostelname`, `status`, `response`) VALUES
(1, 'asdf', 1, 'marutham', 1, 'aas'),
(2, 'asdfas', 1, 'marutham', 0, ''),
(3, 'This stuff is not working, blah blah', 1, 'marutham', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `marutham`
--

CREATE TABLE `marutham` (
  `name` text DEFAULT NULL,
  `rollno` int(11) NOT NULL,
  `roomno` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `fan` tinyint(4) DEFAULT 0,
  `light` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marutham`
--

INSERT INTO `marutham` (`name`, `rollno`, `roomno`, `status`, `fan`, `light`) VALUES
('Pranava Raman', 3555, 1, 0, 0, 0),
('Vijay', 3585, 2, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`compid`);

--
-- Indexes for table `marutham`
--
ALTER TABLE `marutham`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `roomno` (`roomno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `compid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
