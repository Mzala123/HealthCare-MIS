-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 12, 2021 at 12:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `health_records`
--

CREATE TABLE `health_records` (
  `id` int(6) UNSIGNED NOT NULL,
  `patient_id` int(6) NOT NULL,
  `weight` double NOT NULL,
  `height` double NOT NULL,
  `temp_reading` double NOT NULL,
  `code` varchar(15) NOT NULL,
  `code_desc` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_records`
--

INSERT INTO `health_records` (`id`, `patient_id`, `weight`, `height`, `temp_reading`, `code`, `code_desc`, `visit_date`, `username`) VALUES
(1, 1, 58, 164, 367, 'R00-R99', 'Symptoms, signs and abnormal clinical and laboratory findings, not elsewhere classified', '2021-02-11 22:41:51', 'mtende'),
(2, 7, 50, 164, 367, 'A00-B99', 'Certain infectious and parasitic diseases', '2021-02-11 22:51:32', 'mtende'),
(3, 4, 58, 164, 36, 'D50-D89', 'Diseases of the blood and blood-forming organs and certain disorders involving the immune mechanism', '2021-02-11 22:51:57', 'mtende'),
(4, 2, 58, 164, 37, 'N00-N99', 'Diseases of the genitourinary system', '2021-02-11 22:52:43', 'mtende');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `currentAddress` varchar(100) NOT NULL,
  `occupation` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Id`, `firstname`, `lastname`, `gender`, `birthdate`, `currentAddress`, `occupation`) VALUES
(1, 'Mtende', 'Mwanza', 'Male', '2021-02-11', 'Mzimba, Euthini', 'Marketer'),
(2, 'Chisomo', 'Chikuse', 'Female', '2020-09-01', 'Lilongwe, Nathenje', 'Accountants'),
(3, 'Chikondi', 'Likoswe', 'Female', '2021-02-03', 'Dowa, Matapa', 'Human resource manager'),
(4, 'Charity', 'Ndovie', 'Female', '2021-02-01', 'Karonga, kazingeni', 'Manager'),
(5, 'Jason', 'Mpapa', 'Male', '2021-02-08', 'Nchinji, Matapa', 'Doctor'),
(6, 'Precious', 'Chautsi', 'Male', '2021-02-03', 'Ntcheu, Njo', 'Mechanic'),
(7, 'Mahala', 'Mwanza', 'Male', '2021-02-02', 'Mzimba, chindi', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(6) UNSIGNED NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Passcode` varchar(50) NOT NULL,
  `Reg_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Passcode`, `Reg_Date`) VALUES
(1, 'mtende', 'justicemwanzamj@gmail.com', 'e4415fe6f50625bb8a46f8892b6e4cd41021fad9', '2021-02-11 22:05:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health_records`
--
ALTER TABLE `health_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `health_records`
--
ALTER TABLE `health_records`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
