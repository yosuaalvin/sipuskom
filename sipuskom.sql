-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 11:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipuskom`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_sosial`
--

CREATE TABLE `akun_sosial` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `chat_id_telegram` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_sosial`
--

INSERT INTO `akun_sosial` (`id_akun`, `email`, `chat_id_telegram`) VALUES
(1, 'upt_puskom@undip.ac.id', '293078439'),
(3, 'yosuaalvin@gmail.com', '293078439');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(2) NOT NULL,
  `nama_kursus` varchar(50) DEFAULT NULL,
  `laboratorium` varchar(30) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `periode` date NOT NULL,
  `kuota` int(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `nama_kursus`, `laboratorium`, `harga`, `periode`, `kuota`, `status`) VALUES
(1, 'Make an Easy Web With Framework CodeIgniter', 'Pengembangan Internet', 'Rp 500.000', '2016-07-24', 15, 0),
(2, 'PHP and MySQL for Web Application Development', 'Pengembangan Internet', 'Rp 400.000', '2016-07-31', 18, 0),
(3, 'Microsoft Visual Basic .NET for Beginner', 'Aplikasi dan Pemrograman', 'Rp 400.000', '2016-08-14', 16, 0),
(17, 'Code Igniter ', 'Pengembangan Internet', 'Rp 400.000', '2016-06-15', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id_lab`, `nama_lab`) VALUES
(1, 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `isi_pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `isi_pertanyaan`) VALUES
(1, 'Siapakah nama depan Ibu Anda'),
(2, 'Siapakah nama depan peliharaan Anda'),
(3, 'Siapakah nama depan sahabat Anda'),
(4, 'Apakah makanan favorit Anda'),
(5, 'Apakah hobi favorit Anda');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nm_kursus` varchar(50) NOT NULL,
  `harga_pelatihan` varchar(10) NOT NULL,
  `periode` date NOT NULL,
  `kuota` int(2) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_kursus` int(2) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `chat_id` varchar(20) NOT NULL,
  `custom` varchar(2) NOT NULL,
  `id_pembayaran` varchar(50) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `npm`, `nama`, `nm_kursus`, `harga_pelatihan`, `periode`, `kuota`, `id_user`, `id_kursus`, `institusi`, `alamat`, `no_telp`, `tempat_lahir`, `tanggal_lahir`, `email`, `chat_id`, `custom`, `id_pembayaran`, `no_transaksi`, `status`) VALUES
(6, 'semarang', 'YOSUA ALVIN ADI SOETRISNO', 'Make an Easy Web With Framework CodeIgniter', 'Rp 500.000', '2017-08-30', 20, 5, 1, 'UNDIP', 'Jl. Anggrek VII/1', '085742380797', 'Semarang', '1990-10-13', 'yosuaalvin@yahoo.com', '293078439', '0', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `npm` varchar(8) NOT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban_pertanyaan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_user`, `username`, `password`, `nama`, `npm`, `level`, `status`, `id_pertanyaan`, `jawaban_pertanyaan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '12345678', 2, 1, 0, ''),
(5, 'yosuaalvin@yahoo.com', '01c4bf6ba816ef53c34e057af258f76f', 'Yosua Alvin Adi Soetrisno', 'semarang', 1, 1, 1, 'Esther');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_sosial`
--
ALTER TABLE `akun_sosial`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_sosial`
--
ALTER TABLE `akun_sosial`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
