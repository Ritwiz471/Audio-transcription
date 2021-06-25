-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2021 at 01:45 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Audio`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` bigint(100) NOT NULL,
  `Name` text NOT NULL,
  `Role` text NOT NULL,
  `Batch` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `Name`, `Role`, `Batch`, `Password`) VALUES
(1000000001, '', 'teacher', 'Q', 'rjvnrjv'),
(1000000002, '', 'teacher', 'Q', 'jnyjnb'),
(1000000004, '', 'teacher', 'P', 'rgjbnrjk'),
(1000000011, '', 'teacher', 'R', 'efvjnewkv'),
(1000000016, '', 'student', 'P', 'jvnewjvn'),
(1000000019, '', 'student', 'R', 'ecnejql'),
(1000000024, 'rwjnv', 'teacher', 'R', 'ewjvnewjvn'),
(2222222222, '', 'teacher', 'R', 'fn jv'),
(3333333333, 'rjvnrhvjnrv', 'teacher', 'P', 'wrvjni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
