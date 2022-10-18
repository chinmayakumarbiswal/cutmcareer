-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 11:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cutmcareer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Chinmaya Kumar Biswal', 'situ@chinmayakumarbiswal.in', 'situ', 'chinmaya_white.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `educationdetails`
--

CREATE TABLE `educationdetails` (
  `id` int(11) NOT NULL,
  `registrationlogId` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `Institute` varchar(255) NOT NULL,
  `board` varchar(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationdetails`
--

INSERT INTO `educationdetails` (`id`, `registrationlogId`, `education`, `Institute`, `board`, `startDate`, `endDate`, `mark`, `cgpa`, `file`) VALUES
(1, '4', 'BSE', 'CUTM', 'CUTM', '2018-08-01', '2021-04-05', '600', '8.5', 'sem6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `registrationlog`
--

CREATE TABLE `registrationlog` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postApplied` varchar(255) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `Specialization` varchar(255) NOT NULL,
  `Experience` varchar(255) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `sign` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrationlog`
--

INSERT INTO `registrationlog` (`id`, `Title`, `firstName`, `lastName`, `age`, `dob`, `email`, `mobile`, `address`, `postApplied`, `Qualification`, `Specialization`, `Experience`, `Skills`, `Remarks`, `Time`, `sign`, `photo`) VALUES
(1, 'Mr', 'chinmaya kumar ', 'biswal', '22', '2000-09-17', 'chinmayakumarbiswal16045@gmail.com', '6370183009', 'Hatabaradihi,Gainada,Balugaon,752027', 'teacher', 'MCA', 'Cloud', '2', 'aws', 'na', '2022-10-18 19:40:55', 'sign.jpeg', 'chinmaya_white.jpg'),
(2, 'Mr', 'chinmaya kumar ', 'biswal', '22', '2000-09-17', 'chinmayakumarbiswal16045@gmail.com', '6370183009', 'Hatabaradihi,Gainada,Balugaon,752027', 'teacher', 'MCA', 'Cloud', '2', 'aws', '', '2022-10-18 19:43:15', 'sign.jpeg', 'chinmaya_white.jpg'),
(3, 'Mr', 'chinmaya kumar ', 'biswal', '22', '2000-09-17', 'chinmayakumarbiswal16045@gmail.com', '6370183009', 'Hatabaradihi,Gainada,Balugaon,752027', 'teacher', 'MCA', 'Cloud', '2', 'aws', '', '2022-10-18 19:45:06', 'sign.jpeg', 'chinmaya_white.jpg'),
(4, 'Mr', 'chinmaya kumar ', 'biswal', '22', '2000-09-17', 'chinmayakumarbiswal16045@gmail.com', '6370183009', 'Hatabaradihi,Gainada,Balugaon,752027', 'teacher', 'MCA', 'Cloud', '2', 'aws', '', '2022-10-18 19:45:38', 'sign.jpeg', 'chinmaya_white.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationdetails`
--
ALTER TABLE `educationdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrationlog`
--
ALTER TABLE `registrationlog`
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
-- AUTO_INCREMENT for table `educationdetails`
--
ALTER TABLE `educationdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrationlog`
--
ALTER TABLE `registrationlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
