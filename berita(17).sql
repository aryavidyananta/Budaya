-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 06:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` bigint(10) NOT NULL,
  `Nama` varchar(200) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Nama`, `Username`, `Password`, `email`) VALUES
(5, 'arya', 'aryaaa', '1234', 'arya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID` int(5) NOT NULL,
  `Kategori` varchar(100) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `Terbit` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID`, `Kategori`, `alias`, `Terbit`) VALUES
(2, 'Galeri', 'galeri', '1'),
(3, 'Event', 'event', '1'),
(7, 'Berita', 'berita', '1');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `ID` int(5) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Task` varchar(100) NOT NULL,
  `Isi` text NOT NULL,
  `Link` varchar(100) NOT NULL,
  `Tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`ID`, `Nama`, `Task`, `Isi`, `Link`, `Tipe`) VALUES
(1, 'Judul situs', 'situs_tittle', 'Portal Berita', 'http://localhost/WebsiteBudaya/', 'konfigurasi');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `ID` int(10) NOT NULL,
  `Judul` varchar(300) NOT NULL,
  `Isi` text NOT NULL,
  `Kategori` varchar(20) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Teks` varchar(255) NOT NULL,
  `Tanggal` varchar(20) NOT NULL,
  `View` bigint(10) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Post_type` varchar(20) NOT NULL,
  `Terbit` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`ID`, `Judul`, `Isi`, `Kategori`, `Gambar`, `Teks`, `Tanggal`, `View`, `Author`, `Post_type`, `Terbit`) VALUES
(8, '', '', 'berita', 'photo/bully.jpg', '', '2023-12-10 04:49:42', 0, 'aryaaa', 'berita', ''),
(9, 'kasuus', '<p>sdasddd</p>', 'berita', 'photo/kasuus.jpg', 'owdios', '2023-12-10 04:52:39', 0, 'aryaaa', 'berita', '1'),
(10, 'pembunuhan', '<p>aisdhisahdk</p>', 'event', 'photo/pembunuhan.jpg', 'sdsdsds', '2023-12-10 05:55:52', 0, 'aryaaa', 'berita', '1'),
(11, 'pembunuhan', '<p>aisdhisahdk\\</p>', 'event', '', 'sdsdsds', '2023-12-11 05:42:37', 0, 'aryaaa', 'berita', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
