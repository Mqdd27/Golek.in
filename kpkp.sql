-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 05:19 PM
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
-- Database: `kpkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(255) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori_barang`) VALUES
(1, 'Benda Tajam'),
(2, 'Material Korosif'),
(3, 'Bahan Peledak'),
(4, 'Gas Bertekanan'),
(5, 'Cairan Mudah Terbakar'),
(6, 'Benda Padat Mudah Terbakar'),
(7, 'Material yang Teroksidasi'),
(8, 'Zat Radioaktif'),
(9, 'Zat Beracun'),
(10, 'Agen Etiologis'),
(11, 'Gas Padat'),
(12, 'Senjata Tajam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penumpang`
--

CREATE TABLE `tb_penumpang` (
  `id_penumpang` int(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penumpang`
--

INSERT INTO `tb_penumpang` (`id_penumpang`, `nomor`, `nama_penumpang`, `tanggal_ditambahkan`) VALUES
(18, 'JT-5020', 'Bambang', '2023-05-10 08:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Tidak Aktif'),
(2, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suspek`
--

CREATE TABLE `tb_suspek` (
  `id_suspek` int(11) NOT NULL,
  `nomor_penerbangan` varchar(100) NOT NULL,
  `nama_penumpang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori_barang` varchar(100) NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `tanggal_simpan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_suspek`
--

INSERT INTO `tb_suspek` (`id_suspek`, `nomor_penerbangan`, `nama_penumpang`, `nama_barang`, `kategori_barang`, `jumlah`, `satuan`, `tanggal_simpan`, `tanggal`, `status`) VALUES
(3, 'IW 1804', 'Dapit Santonio Putro', 'Gunting', 'Benda Tajam', '3', 'Unit', '2023-05-05 02:58:58', '2023-05-13', 'Aktif'),
(24, 'QZ 641', 'Arsila Tania Viranka', 'Baygon', 'Zat Beracun', '1', 'Pcs', '2023-05-10 02:58:32', '2023-05-13', 'Aktif'),
(32, 'IW 1804', 'Ahmad Jarjit', 'Sianida', 'Zat Beracun', '1', 'Unit', '2023-05-08 13:20:25', '2023-05-13', 'Aktif'),
(37, 'JT-5020', 'Bambang', 'Babi', 'Zat Beracun', '1', 'Unit', '2023-05-19 01:28:29', '2023-05-13', 'Aktif'),
(50, 'JT-123', 'bayu', 'kurang tahu', 'Gas Padat', '9', 'Pcs', '2023-05-19 01:26:54', '2023-05-13', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_suspek`
--
ALTER TABLE `tb_suspek`
  ADD PRIMARY KEY (`id_suspek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  MODIFY `id_penumpang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_suspek`
--
ALTER TABLE `tb_suspek`
  MODIFY `id_suspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
