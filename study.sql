-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 04:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `study`
--

-- --------------------------------------------------------

--
-- Table structure for table `dulieu`
--

CREATE TABLE `dulieu` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dulieu`
--

INSERT INTO `dulieu` (`id`, `name`, `picture`) VALUES
('21022010', 'BÌNH', '27112023144221.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id` int(11) NOT NULL,
  `tenkhoa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id`, `tenkhoa`) VALUES
(1, 'CNTT'),
(2, 'KHMT');

-- --------------------------------------------------------

--
-- Table structure for table `studen`
--

CREATE TABLE `studen` (
  `mssv` varchar(10) NOT NULL,
  `hten` varchar(100) NOT NULL,
  `khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studen`
--

INSERT INTO `studen` (`mssv`, `hten`, `khoa`) VALUES
('21022010', 'BÌNH', 1),
('21022010', 'BÌNH', 1),
('21022010', 'BÌNH', 1),
('127635123', '123asd123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studen`
--
ALTER TABLE `studen`
  ADD KEY `FK_st_khoa` (`khoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studen`
--
ALTER TABLE `studen`
  ADD CONSTRAINT `FK_st_khoa` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
