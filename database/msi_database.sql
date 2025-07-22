-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 04:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msi_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `fname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `name_of_depart` varchar(500) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pss` varchar(25) NOT NULL,
  `hint` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`fname`, `gender`, `name_of_depart`, `email`, `username`, `pss`, `hint`) VALUES
('nilesh shankar borchate', 'male', 'physics Department', 'sgb27122222@gmail.com', 'nilesh123', '12345', 'myself'),
('nilesh shankar borchate', 'male', 'physics Department', 'sgb27122222@gmail.com', 'nilesh123', '12345', 'myself'),
('nilesh', 'male', 'MCA', 'xyz@gmail.com', 'nilesh1234', '12345', 'nilesh'),
('achal', 'female', 'MCA', 'xyz@gmail.com', 'achal123', '1234', 'achal'),
('rahul', 'male', 'MCA', 'xyz@gmail.com', 'rahul123', '12345', 'rahul');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
