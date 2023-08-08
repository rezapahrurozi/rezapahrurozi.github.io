-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 06:02 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_handphone` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `nama`, `alamat`, `no_handphone`, `status`) VALUES
(2, 'Anggota 1', 'Samarinda', '082214323842', 'aktif'),
(3, 'Anggota 2', 'Samarinda', '081148113811', 'aktif'),
(4, 'Anggota 3', 'Samarinda', '083314333833', 'aktif'),
(5, 'Anggota 4', 'Samarinda', '084413443844', 'aktif'),
(6, 'Anggota 5', 'Samarinda', '084413443844', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `kategori`, `gambar`) VALUES
(11, 'Buku Bahasa Indonesia', 'Pengarang 1', 'Penerbit 1', 'umum', 'buku2.jpg'),
(13, 'Buku Bahasa Inggris', 'Pengarang 2', 'Pengarang 2', 'umum', 'buku.jpg'),
(14, 'Buku Matematika', 'Pengarang 1', 'Penerbit 1', 'umum', 'buku.jpg'),
(15, 'Buku Seni Budaya', 'Pengarang 2', 'Penerbit 2', 'umum', 'buku3.jpg'),
(16, 'Akuntansi Pengantar 1', 'Supardi', 'Gava Media', 'akuntansi', 'buku.jpg'),
(18, 'Aplikasi Klinis Induk Ovulasi & Stimulasi Ovariu', 'Samsulhadi', 'Sagung Seto', 'kesehatan', 'buku3.jpg'),
(19, 'Aplikasi Praktis Asuhan Keperawatan Keluarga', 'Komang Ayu Heni', 'Sagung Seto', 'kesehatan', 'buku.jpg'),
(20, 'A-Z Psikologi : Berbagai kumpulan topik Psikologi', 'Zainul Anwar', 'Andi Offset', 'psikologi', 'buku.jpg'),
(21, 'Bangsa gagal ; Mencari identitas kebangsaan', 'Nasruddin Anshoriy', 'LKiS', 'umum', 'buku1.jpg'),
(22, 'Biografi Gus Dur ; The Authorized Biography of KH.', 'Greg Barton', 'LKiS', 'umum', 'buku2.jpg'),
(23, 'Buku Ajar Tumbuh Kembang Remaja & Permasalahanya', 'Soetjiningsih', 'Sagung Seto', 'psikologi', 'buku2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id`, `tanggal`, `judul_buku`, `nama_peminjam`, `status`) VALUES
(1, '2023-08-07', 'Akuntansi Pengantar 1', 'Anggota 1', 'Di Pinjam'),
(2, '2023-08-07', 'Aplikasi Klinis Induk Ovulasi & Stimulasi Ovariu', 'Anggota 2', 'Di Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
