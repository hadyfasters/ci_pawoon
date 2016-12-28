-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 05:28 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pawoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uuid` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uuid`, `nama`, `alamat`) VALUES
('002e78a5776075b644fb846aa15f33b33ffdabf5', 'Randi', 'Bandung'),
('200ee8ea3ff05f1c538134112b2d83d3690180be', 'Budi', 'Manggarai'),
('39e11ad96816afb8aa627b479e53b6f02d7e4cc8', 'Sandi', 'Padang'),
('460b3238ddeafc410de17cfb4b578121eb2fd17c', 'Asti', 'Add'),
('88e933f5bfe49a9c0d405664788f1d90e17b97c8', 'Otoy', 'Cibitung'),
('8a343d09d4f782f5ea4096e908eac03005db7786', 'Effendy', 'Bandung'),
('8ec4a45be7b4ba1b826dc1164751e1ccd01985c5', 'Hadi', 'Ciputat'),
('b9f85dc94c9b0317ec552f48a20267bde9b1b1b9', 'Rahmad', 'Palembang'),
('c1f4430d5a542d51fb100ad29e2e02e0f6d9d2ba', 'adin', 'Ade'),
('c34f404dc7abba98bb59a77798feb8ad24af1824', 'Adi', 'Jakrta'),
('c351b4cb13314c264d989504cdc1680b3d1adacf', 'Efendi', 'bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `uuid` (`uuid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
