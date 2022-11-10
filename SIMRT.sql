-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 02:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtpintar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(255) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `no_hp_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `akunrt`
--

CREATE TABLE `akunrt` (
  `id_rt` int(255) NOT NULL,
  `id_desa_akunrt` int(255) NOT NULL,
  `nama_rt` varchar(255) NOT NULL,
  `nik_rt` varchar(255) NOT NULL,
  `no_kk_rt` varchar(255) NOT NULL,
  `no_hp_rt` varchar(255) NOT NULL,
  `username_rt` varchar(255) NOT NULL,
  `password_rt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `akunwarga`
--

CREATE TABLE `akunwarga` (
  `id_akun_warga` int(255) NOT NULL,
  `id_desa_akunwarga` int(255) NOT NULL,
  `nik_akun_warga` varchar(255) NOT NULL,
  `no_kk_akun_warga` varchar(255) NOT NULL,
  `no_hp_warga` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username_warga` varchar(255) NOT NULL,
  `password_warga` varchar(255) NOT NULL,
  `nama_warga` varchar(255) NOT NULL,
  `role_warga` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(255) NOT NULL,
  `nama_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `id_desa_kategori` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_uang` bigint(255) NOT NULL,
  `nominal` bigint(255) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_desa_uang` int(255) NOT NULL,
  `id_kategori_uang` int(255) NOT NULL,
  `id_warga_uang` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_pengumuman_komentar` int(11) NOT NULL,
  `nama_komentator` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isi_komentar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(255) NOT NULL,
  `pengumuman` longtext NOT NULL,
  `tanggal` date NOT NULL,
  `id_desa_pengumuman` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(255) NOT NULL,
  `nama_warga` varchar(255) NOT NULL,
  `nik_warga` varchar(255) NOT NULL,
  `no_kk_warga` varchar(255) NOT NULL,
  `gambar_ktp_warga` varchar(255) DEFAULT NULL,
  `gambar_kk_warga` varchar(255) NOT NULL,
  `id_desa_warga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akunrt`
--
ALTER TABLE `akunrt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_desa` (`id_desa_akunrt`);

--
-- Indexes for table `akunwarga`
--
ALTER TABLE `akunwarga`
  ADD PRIMARY KEY (`id_akun_warga`),
  ADD KEY `id_desa_akunwarga` (`id_desa_akunwarga`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_desa_kategori` (`id_desa_kategori`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_uang`),
  ADD KEY `id_desa_uang` (`id_desa_uang`),
  ADD KEY `id_kategori_uang` (`id_kategori_uang`),
  ADD KEY `id_warga_uang` (`id_warga_uang`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pengumuman_komentar` (`id_pengumuman_komentar`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_desa_pengumuman` (`id_desa_pengumuman`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD KEY `id_desa_warga` (`id_desa_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akunrt`
--
ALTER TABLE `akunrt`
  MODIFY `id_rt` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akunwarga`
--
ALTER TABLE `akunwarga`
  MODIFY `id_akun_warga` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_uang` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akunrt`
--
ALTER TABLE `akunrt`
  ADD CONSTRAINT `akunrt_ibfk_1` FOREIGN KEY (`id_desa_akunrt`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akunwarga`
--
ALTER TABLE `akunwarga`
  ADD CONSTRAINT `akunwarga_ibfk_1` FOREIGN KEY (`id_desa_akunwarga`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE;

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_desa_kategori`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`id_desa_uang`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keuangan_ibfk_2` FOREIGN KEY (`id_kategori_uang`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keuangan_ibfk_3` FOREIGN KEY (`id_warga_uang`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_pengumuman_komentar`) REFERENCES `pengumuman` (`id_pengumuman`) ON DELETE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_desa_pengumuman`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE;

--
-- Constraints for table `warga`
--
ALTER TABLE `warga`
  ADD CONSTRAINT `warga_ibfk_1` FOREIGN KEY (`id_desa_warga`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
