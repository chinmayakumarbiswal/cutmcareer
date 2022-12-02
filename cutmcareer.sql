-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 12:47 PM
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
(1, 'Chinmaya Kumar Biswal', 'situ@chinmayakumarbiswal.in', 'b0cdf1a710c2fbedb32adcc57aaf2b46', 'chinmaya_white.jpg');

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
(2, '5', '10th', 'BNDBP, Jankia', 'BSE', '2015-04-08', '2016-03-08', '388', '64', 'chinmaya_10.jpg'),
(3, '5', '12', 'UNIITECH,Nayagarh', 'HSE', '2016-06-05', '2018-04-04', '299', '49', '+2 mark.jpg');

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
  `photo` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrationlog`
--

INSERT INTO `registrationlog` (`id`, `Title`, `firstName`, `lastName`, `age`, `dob`, `email`, `mobile`, `address`, `postApplied`, `Qualification`, `Specialization`, `Experience`, `Skills`, `Remarks`, `Time`, `sign`, `photo`, `cv`, `status`) VALUES
(5, 'Mr', 'Chinmaya Kumar', 'Biswal', '22', '2000-09-17', '210720100009@cutm.ac.in', '6370183009', 'Chilika', 'Teaching', 'PG', 'Cloud', '0', 'AWS', 'na', '2022-12-02 07:44:19', '6370183009sign.jpeg', 'IMG-20220504-WA0017.jpg', '6370183009Chinmaya kumar biswal CV AWS.pdf', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Chinmaya Kumar Biswal', '210720100009@cutm.ac.in', 'b0cdf1a710c2fbedb32adcc57aaf2b46', 'IMG-20220504-WA0017.jpg'),
(2, 'Chinmaya Kumar Biswal', 'admin@situchinmaya.in', 'b0cdf1a710c2fbedb32adcc57aaf2b46', 'DSC_1536.JPG');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrationlog`
--
ALTER TABLE `registrationlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
