-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 09:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch366`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `age` int(2) NOT NULL,
  `location` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `files` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `password`, `age`, `location`, `gender`, `files`, `status`) VALUES
(20, 'Gultekin', 'alam', 'gul@aiub.edu', '12345', 45, 'Banani', 'Female', '3776a676fbb217128e9b7e1460b32aac.jpg', 'active'),
(22, 'Mirza ', 'Fokrur', 'mirza@coderstrust.com', '12345', 55, 'Mirpur', 'Male', 'fd943c3171b31d6d70db55a654ebd745.jpeg', 'active'),
(23, 'Sabiha', 'Saiem', 'sabiha@coderstrust.com', '111123232', 24, 'Bashundhara', 'Female', '020f687b2b526a7d7b99733f2e3f7973.jpg', 'active'),
(24, 'ahmed', 'tajbiul', 'tajbiulrawol@coderstrust.com', '123124132', 25, 'Bashundhara', 'Male', '9bd60ca366a608cd5ba5396eae9c2dab.jpg', 'active'),
(25, 'ila', 'Effendi', 'lokman@aiub.edu', '1351321321', 45, 'Mirpur', 'Female', '15621ea6bad134a54ff7933e848748d3.jpg', 'active'),
(27, 'Faiyaz', 'Farhad', 'fa@coderstrust.com', '1231242352', 55, 'Mirpur', 'Male', 'c33a9072ac4ef6d71ec80150d8386191.jpg', 'active'),
(28, 'Rawnak', 'Jabin', 'jabin@nsu.edu', '12345', 30, 'Farmgate', 'Female', 'd7c9754a845fc451d7a2cd34973f67fc.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
