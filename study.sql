-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2023 at 09:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `MaAD` int NOT NULL,
  `TenAD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`MaAD`, `TenAD`) VALUES
(0, 'Vĩnh Long'),
(1, 'Trà Vinh');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `MaL` int NOT NULL,
  `TenL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`MaL`, `TenL`) VALUES
(0, 'Khoa Học Máy Tinh'),
(1, 'Công Nghệ Thông Tin');

-- --------------------------------------------------------

--
-- Table structure for table `studens`
--

CREATE TABLE `studens` (
  `MSSV` int NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `DaysIn` date DEFAULT NULL,
  `MaL` int NOT NULL,
  `MaAD` int NOT NULL,
  `Full` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studens`
--

INSERT INTO `studens` (`MSSV`, `Name`, `DaysIn`, `MaL`, `MaAD`, `Full`) VALUES
(21022001, 'Châu Mai Tuấn Lâm', NULL, 0, 0, '21022001- Châu Mai Tuấn Lâm -Chưa Vào'),
(21022002, 'Âu Thị Anh Thư', '2021-03-26', 0, 0, '21022002- Âu Thị Anh Thư -2021-03-26'),
(21022003, 'Nguyễn Võ Nhật Tân', '2018-11-30', 0, 0, '21022003-Nguyễn Võ Nhật Tân-2018-11-30'),
(21022006, 'Tăng Huỳnh Thanh Phú', '2018-03-26', 0, 0, '21022006- Tăng Huỳnh Thanh Phú -2018-03-26'),
(21022007, 'Nguyễn Văn Huyên', '2018-10-20', 0, 0, '21022007- Nguyễn Văn Huyên -2018-10-20'),
(21022008, 'Nguyễn Hữu Thọ', '2018-03-26', 0, 0, '21022008- Nguyễn Hữu Thọ -2018-03-26'),
(21022009, 'Trương Phát Thành', NULL, 0, 0, '21022009- Trương Phát Thành -Chưa Vào'),
(21022010, 'Lê Nguyễn Quang Bình', '2022-04-15', 0, 0, '21022010- Lê Nguyễn Quang Bình -2022-04-15'),
(21022011, 'Nguyễn Văn Hoàng', '2018-10-20', 0, 0, '21022011- Nguyễn Văn Hoàng -2018-10-20'),
(21022012, 'Trần Khánh Duy', '2018-03-26', 0, 0, '21022012- Trần Khánh Duy -2018-03-26'),
(21022013, 'Phan An Hưng', '2022-04-15', 0, 0, '21022013- Phan An Hưng -2022-04-15'),
(21022015, 'Huỳnh Phước Đức', '2018-03-26', 0, 0, '21022015- Huỳnh Phước Đức -2018-03-26'),
(21022016, 'Lê Hoàng Tâm', '2020-05-19', 0, 0, '21022016- Lê Hoàng Tâm -2020-05-19'),
(21022017, 'Nguyễn Trọng Huy', '2022-04-15', 0, 0, '21022017- Nguyễn Trọng Huy -2022-04-15'),
(21022018, 'Trần Diễm Quỳnh', '2020-12-26', 0, 0, '21022018- Trần Diễm Quỳnh -2020-12-26'),
(21022019, 'Huỳnh Bảo Thắng', '2018-03-10', 0, 0, '21022019- Huỳnh Bảo Thắng -2018-03-10'),
(21022021, 'Nguyễn Thị Bích Ngọc', '2018-02-26', 0, 0, '21022021- Nguyễn Thị Bích Ngọc -2018-02-26'),
(21022022, 'Phan Hải Quân', '2021-03-26', 0, 0, '21022022- Phan Hải Quân -2021-03-26'),
(21022023, 'Lê Anh Khoa', '2018-04-10', 0, 0, '21022023- Lê Anh Khoa -2018-04-10'),
(21022024, 'Lê Võ Khánh Duy', '2020-05-19', 0, 0, '21022024- Lê Võ Khánh Duy -2020-05-19'),
(21022026, 'Trần Huy Hoàng', '2021-03-26', 0, 0, '21022026- Trần Huy Hoàng -2021-03-26'),
(21022027, 'Hồ Minh Trí', '2019-03-26', 0, 0, '21022027- Hồ Minh Trí -2019-03-26'),
(21022034, 'Nhà mình còn gì đâu', '2028-10-21', 1, 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(2, 'myadmin', 'f6fdffe48c908deb0f4c3bd36c032e72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`MaAD`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`MaL`);

--
-- Indexes for table `studens`
--
ALTER TABLE `studens`
  ADD PRIMARY KEY (`MSSV`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `MaAD` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `MaL` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studens`
--
ALTER TABLE `studens`
  MODIFY `MSSV` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21022035;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
