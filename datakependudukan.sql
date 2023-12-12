-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 08:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datakependudukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `tbnama` varchar(255) NOT NULL,
  `tbnik` int(255) NOT NULL,
  `tblahir` date NOT NULL,
  `agama` text NOT NULL,
  `kartu_identitas` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`tbnama`, `tbnik`, `tblahir`, `agama`, `kartu_identitas`) VALUES
('Andi Cyilik', 11111, '2019-12-11', 'Islam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbanak`
--

CREATE TABLE `tbanak` (
  `tbnama` varchar(255) NOT NULL,
  `tbnik` int(255) NOT NULL,
  `tblahir` date NOT NULL,
  `agama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbanak`
--

INSERT INTO `tbanak` (`tbnama`, `tbnik`, `tblahir`, `agama`) VALUES
('tono', 1231231, '0000-00-00', 'islam'),
('yunita', 1231231, '0000-00-00', 'islam'),
('ajur', 1231231, '0000-00-00', ''),
('Suli', 1231231, '0000-00-00', ''),
('tono', 1231231, '0000-00-00', 'kristen'),
('kurenai', 1231231, '0000-00-00', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `tbnama` varchar(100) NOT NULL,
  `tbnik` int(50) NOT NULL,
  `tbalamat` text NOT NULL,
  `agama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`tbnama`, `tbnik`, `tbalamat`, `agama`) VALUES
('roni', 1231231, 'banyuwangi', ''),
('asdxcv', 92879832, 'banyuwangi', ''),
('tono', 123439786, 'kalimantan', ''),
('Moh. Alwi', 351002712, 'Banyuwangi, Srono, Kebaman, Blangkon Rt1/Rw4', 'Islam'),
('Suli', 537674234, 'Bojonegoro', ''),
('Putra Sinegar', 2000039838, 'Bali, Tabanan', 'Islam'),
('ajur', 2147483647, 'sembagus', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`tbnik`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`tbnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `tbnik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `tbnik` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
