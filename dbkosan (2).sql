-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 08:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkosan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbkomen`
--

CREATE TABLE `tbkomen` (
  `cid` int(20) NOT NULL,
  `userID` int(20) NOT NULL,
  `No_kosan` int(20) NOT NULL,
  `Isi_komen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbkosan`
--

CREATE TABLE `tbkosan` (
  `No_kosan` int(20) NOT NULL,
  `Nama_kost` varchar(50) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Kamar_tersedia` int(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Fasilitas` varchar(255) NOT NULL,
  `Harga3bln` int(50) NOT NULL,
  `Harga6bln` int(50) NOT NULL,
  `Harga_pertahun` int(50) NOT NULL,
  `Foto` blob NOT NULL,
  `userID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbpemilik_kost`
--

CREATE TABLE `tbpemilik_kost` (
  `userID` int(20) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `No_hp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `userID` int(20) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` int(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `no_ponsel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbkomen`
--
ALTER TABLE `tbkomen`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbkosan`
--
ALTER TABLE `tbkosan`
  ADD PRIMARY KEY (`No_kosan`);

--
-- Indexes for table `tbpemilik_kost`
--
ALTER TABLE `tbpemilik_kost`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbkomen`
--
ALTER TABLE `tbkomen`
  MODIFY `cid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbkosan`
--
ALTER TABLE `tbkosan`
  MODIFY `No_kosan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
