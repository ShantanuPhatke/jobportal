-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 02:03 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `cname` varchar(20) NOT NULL,
  `cemail` varchar(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `jtype` varchar(20) DEFAULT NULL,
  `jsector` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `pincode` int(10) DEFAULT NULL,
  `exp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cname`, `cemail`, `gender`, `dob`, `jtype`, `jsector`, `city`, `pincode`, `exp`) VALUES
('preet', 'preet@gmail.com', 'male', '1999-12-15', 'contract', 'sales', 'Mumbai', 400103, '8'),
('savil', 'savildsouza@gmail.co', 'male', '1999-12-14', 'contract', 'sales', 'Mumbai', 400103, '8'),
('shan', 'shan@gmail.com', 'male', '1998-06-08', 'temporary', 'it', 'Mumbai', 400103, '5'),
('shan', 'shantanup@gmai.con', 'male', '1999-12-09', 'contract', 'sales', 'Mumbai', 400103, '8'),
('shan', 'sphatkes@gmail.com', 'male', '1998-06-08', 'permanent', 'it', 'AURANGABAD', 431001, '5');

-- --------------------------------------------------------

--
-- Table structure for table `jobsopen`
--

CREATE TABLE `jobsopen` (
  `jid` int(11) NOT NULL,
  `jtype` varchar(20) NOT NULL,
  `jsector` varchar(20) NOT NULL,
  `jdescription` varchar(200) NOT NULL DEFAULT 'Not available',
  `rname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobsopen`
--

INSERT INTO `jobsopen` (`jid`, `jtype`, `jsector`, `jdescription`, `rname`) VALUES
(1, 'Permanent', 'IT', 'Develops new apps by analyzing account potential; initiating, developing, and closing sales; recommending new applications and development strategies.', 'L&T'),
(2, 'Temporary', 'IT', 'Supports engineering projects by adapting and applying engineering techniques; conducting tests and inspections; preparing reports and calculations.', 'L&T'),
(3, 'Contract', 'Sales', 'Work with marketing team and strive hard to achieve goals on regular basis and manage online sales through CMS.', 'L&T'),
(4, 'Contract', 'Sales', 'Not available', 'Frank & co.'),
(5, 'Contract', 'Sales', 'Joining required ASAP. Sound knowledge of marketing fundamentals and on ground experience.', 'Taroul Corp. Ltd.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('preet', 'preet@gmail.com', '123123123'),
('savil', 'savildsouza@gmail.co', '123123123'),
('shan', 'shan@gmail.com', 'admin'),
('shan', 'shantanu@hmail.com', '123123123'),
('shan', 'shantanup@gmai.con', '123123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cemail`),
  ADD UNIQUE KEY `c-email` (`cemail`);

--
-- Indexes for table `jobsopen`
--
ALTER TABLE `jobsopen`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `UniqueEmail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobsopen`
--
ALTER TABLE `jobsopen`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
