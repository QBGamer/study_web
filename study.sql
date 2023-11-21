-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 09:49 AM
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
-- Table structure for table `studens`
--

CREATE TABLE `studens` (
  `MSSV` int(8) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DaysIn` date DEFAULT NULL,
  `Full` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studens`
--

INSERT INTO `studens` (`MSSV`, `Name`, `DaysIn`, `Full`) VALUES
(21022001, 'Châu Mai Tuấn Lâm', NULL, '21022001- Châu Mai Tuấn Lâm -Chưa Vào'),
(21022002, 'Âu Thị Anh Thư', '2021-03-26', '21022002- Âu Thị Anh Thư -2021-03-26'),
(21022003, 'Nguyễn Võ Nhật Tân', '2018-11-30', '21022003-Nguyễn Võ Nhật Tân-2018-11-30'),
(21022006, 'Tăng Huỳnh Thanh Phú', '2018-03-26', '21022006- Tăng Huỳnh Thanh Phú -2018-03-26'),
(21022007, 'Nguyễn Văn Huyên', '2018-10-20', '21022007- Nguyễn Văn Huyên -2018-10-20'),
(21022008, 'Nguyễn Hữu Thọ', '2018-03-26', '21022008- Nguyễn Hữu Thọ -2018-03-26'),
(21022009, 'Trương Phát Thành', NULL, '21022009- Trương Phát Thành -Chưa Vào'),
(21022010, 'Lê Nguyễn Quang Bình', '2022-04-15', '21022010- Lê Nguyễn Quang Bình -2022-04-15'),
(21022011, 'Nguyễn Văn Hoàng', '2018-10-20', '21022011- Nguyễn Văn Hoàng -2018-10-20'),
(21022012, 'Trần Khánh Duy', '2018-03-26', '21022012- Trần Khánh Duy -2018-03-26'),
(21022013, 'Phan An Hưng', '2022-04-15', '21022013- Phan An Hưng -2022-04-15'),
(21022015, 'Huỳnh Phước Đức', '2018-03-26', '21022015- Huỳnh Phước Đức -2018-03-26'),
(21022016, 'Lê Hoàng Tâm', '2020-05-19', '21022016- Lê Hoàng Tâm -2020-05-19'),
(21022017, 'Nguyễn Trọng Huy', '2022-04-15', '21022017- Nguyễn Trọng Huy -2022-04-15'),
(21022018, 'Trần Diễm Quỳnh', '2020-12-26', '21022018- Trần Diễm Quỳnh -2020-12-26'),
(21022019, 'Huỳnh Bảo Thắng', '2018-03-10', '21022019- Huỳnh Bảo Thắng -2018-03-10'),
(21022021, 'Nguyễn Thị Bích Ngọc', '2018-02-26', '21022021- Nguyễn Thị Bích Ngọc -2018-02-26'),
(21022022, 'Phan Hải Quân', '2021-03-26', '21022022- Phan Hải Quân -2021-03-26'),
(21022023, 'Lê Anh Khoa', '2018-04-10', '21022023- Lê Anh Khoa -2018-04-10'),
(21022024, 'Lê Võ Khánh Duy', '2020-05-19', '21022024- Lê Võ Khánh Duy -2020-05-19'),
(21022026, 'Trần Huy Hoàng', '2021-03-26', '21022026- Trần Huy Hoàng -2021-03-26'),
(21022027, 'Hồ Minh Trí', '2019-03-26', '21022027- Hồ Minh Trí -2019-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
