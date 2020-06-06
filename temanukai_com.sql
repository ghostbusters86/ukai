-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 12:08 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temanukai.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambil_soal`
--

CREATE TABLE `ambil_soal` (
  `id_ambil_soal` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `kode_soal` varchar(50) NOT NULL,
  `mulai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `berakhir` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambil_soal`
--

INSERT INTO `ambil_soal` (`id_ambil_soal`, `id_user`, `kode_soal`, `mulai`, `berakhir`) VALUES
(1, 1, 'Logik_1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bab_booster`
--

CREATE TABLE `bab_booster` (
  `id_bab_booster` int(5) NOT NULL,
  `nama_bab_booster` varchar(50) NOT NULL,
  `desk_bab_booster` text NOT NULL,
  `time_bab_booster` int(20) NOT NULL,
  `status_bab_booster` int(3) NOT NULL,
  `kode_soal` varchar(50) NOT NULL,
  `id_booster` int(5) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bab_booster`
--

INSERT INTO `bab_booster` (`id_bab_booster`, `nama_bab_booster`, `desk_bab_booster`, `time_bab_booster`, `status_bab_booster`, `kode_soal`, `id_booster`, `created`, `slug`) VALUES
(5, 'BS_PPKN', '<p>select_published&nbsp;select published&nbsp;select published&nbsp;select published&nbsp;select published</p>\r\n', 60, 1, 'bs_PKN', 7, '2020-05-25 12:36:34', 'bs_pkn'),
(6, 'Bs_Aagamassss', '<p>select published select published select published select published</p>\r\n', 60, 1, 'Bs_Aagama', 6, '2020-05-25 12:53:02', 'bs_aagama'),
(7, 'bs kenegaraan', '<p><span style=\"color:#000000\">Pkn</span></p>\r\n', 60, 1, ' kewarga negara', 7, '2020-06-05 08:37:35', 'kewarga-negara'),
(8, 'Pembelajaran Agama Islam', '<p>sss</p>\r\n', 60, 1, 'sss', 0, '2020-06-05 09:01:41', 'sss'),
(9, 'Pkn', '<p>Pkn</p>\r\n', 60, 1, 'Pkn', 7, '2020-06-05 09:08:13', 'pkn');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(5) NOT NULL,
  `id_soal` int(5) NOT NULL,
  `id_ambil_soal` int(5) NOT NULL,
  `status_answer` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_soal`, `id_ambil_soal`, `status_answer`, `created`, `modified`) VALUES
(1, 1, 1, 'A', '2020-05-20 13:13:13', '2020-05-20 13:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `paket_booster`
--

CREATE TABLE `paket_booster` (
  `id_booster` int(5) NOT NULL,
  `nama_booster` varchar(50) NOT NULL,
  `desk_booster` text NOT NULL,
  `harga_booster` int(20) NOT NULL,
  `status_booster` int(3) NOT NULL,
  `kode_paket` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_booster`
--

INSERT INTO `paket_booster` (`id_booster`, `nama_booster`, `desk_booster`, `harga_booster`, `status_booster`, `kode_paket`, `created`, `slug`) VALUES
(6, 'Agama', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n', 60000, 1, 'agama', '2020-06-04 14:13:24', 'agama'),
(7, 'Ppkn', '<p>sss</p>\r\n', 60000, 1, 'Pkn', '2020-06-05 06:44:19', 'pkn');

-- --------------------------------------------------------

--
-- Table structure for table `paket_reguler`
--

CREATE TABLE `paket_reguler` (
  `id_reguler` int(5) NOT NULL,
  `nama_reguler` varchar(50) NOT NULL,
  `desk_reguler` text NOT NULL,
  `harga_reguler` int(20) NOT NULL,
  `time_reguler` int(20) NOT NULL,
  `status_reguler` int(3) NOT NULL,
  `kode_paket` varchar(50) NOT NULL,
  `kode_soal` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_reguler`
--

INSERT INTO `paket_reguler` (`id_reguler`, `nama_reguler`, `desk_reguler`, `harga_reguler`, `time_reguler`, `status_reguler`, `kode_paket`, `kode_soal`, `created`, `slug`) VALUES
(8, 'Pr_ipa', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n', 50000, 60, 1, 'Pr_IPA', 'Pr_IPA', '2020-06-02 11:00:12', 'pr_ipa'),
(9, 'PR_mtk', '<p>pr_MTK</p>\r\n', 70000, 60, 1, 'pr_MTK', 'pr_MTK', '2020-06-02 09:48:07', 'pr_mtk'),
(10, 'pr_agama', '<p>pr_agama</p>\r\n', 19000, 80, 1, 'pr_agama', 'pr_agama', '2020-06-02 11:00:04', 'pr_agama');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(20) NOT NULL,
  `kode_soal` varchar(50) NOT NULL,
  `pertanyaan` varchar(300) NOT NULL,
  `jawaban_a` varchar(300) NOT NULL,
  `jawaban_b` varchar(300) NOT NULL,
  `jawaban_c` varchar(300) NOT NULL,
  `jawaban_d` varchar(300) NOT NULL,
  `jawaban_e` varchar(150) NOT NULL,
  `kunci_soal` varchar(300) NOT NULL,
  `pembahasan_soal` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `kode_soal`, `pertanyaan`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_e`, `kunci_soal`, `pembahasan_soal`, `created`) VALUES
(10, 'bs_PKN', 'select ', 'PPKN', 'PPKN', 'pkn ilmu', 'pkn ilmu', 'PPKN', 'bs_PKN-ppkn', '<p>select published select published select published select published</p>\r\n', '2020-05-25 12:51:30'),
(18, 'Bs_Aagama', 'Mtk_dasar', 'Mtk_dasar', 'Mtk_dasar', 'Mtk_dasar', 'Mtk_dasar', '', 'Mtk_dasar', '<p>Mtk_dasar</p>\r\n', '2020-05-27 13:35:10'),
(26, 'Bs_Aagama', 'pr_MTK', 'pr_MTK', 'pr_MTK', 'pr_MTK', 'pr_MTK', '', 'pr_MTK', '<p>pr_MTK</p>\r\n', '2020-05-27 15:05:18'),
(27, 'Bs_Aagama', 'pr_matematika', 'pr_MTK', 'pr_MTK', ' pr_MTK', 'pr_MTK', 'pr_MTK', 'pr_matematika', '<p>pr_MTK</p>\r\n', '2020-05-27 16:59:53'),
(28, 'pr_MTK', 'pr_mtk', 'pr_mtk', 'pr_mtk', 'pr_mtk', 'pr_mtk', 'pr_mtk', 'pr_mtk', '<p>pr_mtk</p>\r\n', '2020-06-04 11:33:47'),
(30, 'pr_MTK', 'hal yang ', 'hal yang sma Mtematika', 'hal yang sma Mtematika', ' hal yang sma Mtematika', 'hal yang sma Mtematika', 'hal yang sma Mtematika', 'hal yang sma Mtematika', '<p>hal yang sma Mtematika</p>\r\n', '2020-06-04 14:00:44'),
(31, 'bs_PKN', 'berapa soal pertanyaan', 'berapa soal pertanyaan', 'berapa soal pertanyaan', 'berapa soal pertanyaan', 'berapa soal pertanyaan', 'berapa soal pertanyaan', 'berapa soal pertanyaan', '<p>berapa soal pertanyaan</p>\r\n', '2020-06-05 07:21:43'),
(32, 'bs_PKN', 's', 's', 's', 's', 's', 's', 's', '<p>s</p>\r\n', '2020-06-05 07:23:24'),
(33, 'bs_PKN', 'sss', 'ss', 'ss', 'sss', 'ss', 'ss', 'sss', '<p>sss</p>\r\n', '2020-06-05 07:25:37'),
(34, 'bs_PKN', 'sss', 'ss', 'ss', 'sss', 'ss', 'ss', 'sss', '<p>sss</p>\r\n', '2020-06-05 07:27:41'),
(35, 'bs_PKN', 'sss', 'ss', 'ss', 'sss', 'ss', 'ss', 'sss', '<p>sss</p>\r\n', '2020-06-05 07:28:04'),
(36, 'bs_PKN', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '<p>sss</p>\r\n', '2020-06-05 07:29:37'),
(38, 'bs_PKN', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '<p>sss</p>\r\n', '2020-06-05 07:31:15'),
(39, 'bs_PKN', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '<p>sss</p>\r\n', '2020-06-05 07:31:57'),
(40, 'bs_PKN', 'aaa', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', '<p>aaa</p>\r\n', '2020-06-05 07:32:48'),
(41, 'bs_PKN', 'aaa', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', '<p>aaa</p>\r\n', '2020-06-05 07:33:29'),
(42, 'bs_PKN', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '<p>ss</p>\r\n', '2020-06-05 07:33:45'),
(43, 'bs_PKN', 'aa', 'aa', 'aa', 'aa', 'aa', 'aaa', 'aa', '<p>aa</p>\r\n', '2020-06-05 07:36:21'),
(44, 'bs_PKN', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '<p>ss</p>\r\n', '2020-06-05 07:37:01'),
(45, 'bs_PKN', 'ss', 'ss', 'sss', 'ss', 'ss', 'ss', 'ss', '<p>ss</p>\r\n', '2020-06-05 07:38:32'),
(46, 'bs_PKN', 'ss', 'ss', 'ss', 's', 's', 's', 'ss', '<p>s</p>\r\n', '2020-06-05 07:39:34'),
(47, 'bs_PKN', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '<p>ss</p>\r\n', '2020-06-05 07:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `kode_bank` varchar(50) NOT NULL,
  `an_rekening` varchar(50) NOT NULL,
  `nominal_transfer` int(20) NOT NULL,
  `id_user` int(5) NOT NULL,
  `kode_paket` varchar(50) NOT NULL,
  `status_transaksi` varchar(50) NOT NULL,
  `bukti_transfer` varchar(250) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `kode_bank`, `an_rekening`, `nominal_transfer`, `id_user`, `kode_paket`, `status_transaksi`, `bukti_transfer`, `tanggal`, `created`) VALUES
(5, '@TU20001', 'BRI', 'Yuda', 60000, 2, 'pr_agama', '1', '', '2020-06-21', '2020-06-06 08:56:34'),
(6, '@TU20002', 'BRI', 'Yuda', 60000, 2, 'pr_agama', '1', 'aedaf3308f10d861169a709aeb652d08.png', '2020-06-19', '2020-06-06 08:58:00'),
(7, '@TU20003', 'BRI', 'Yuda', 60000, 2, 'pr_agama', '1', 'acfb15b93283b58dc8e0dc40bb14ef92.png', '2020-06-28', '2020-06-06 08:59:12'),
(8, '@TU20004', 'BRI', 'Yuda', 60000, 2, 'pr_agama', '1', 'bb92a69635caf22a58f1de414a3ea351.png', '2020-06-27', '2020-06-06 09:02:08'),
(9, '@TU20005', 'BRI', 'Yuda', 60000, 2, 'Pkn', '1', '72fcad661a9ee6ad92f2992176388f5c.png', '0065-05-23', '2020-06-06 09:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jk_user` varchar(20) NOT NULL,
  `nohp_user` varchar(50) NOT NULL,
  `universitas_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `jk_user`, `nohp_user`, `universitas_user`, `email`, `password`, `foto`, `akses_level`, `created`) VALUES
(1, 'Yuda Nur Fadillah', 'Laki-laki', '089674555439', 'Amikom', 'admin@gmail.com', '7488e331b8b64e5794da3fa4eb10ad5d', '', 'admin', '2020-05-25 13:24:48'),
(2, 'Yuda Nur Fadillassh', 'Laki-laki', '089674555123', 'Amikom Yk', 'yuda@gmail.com', '425717f0914fda333a7d7579d6327a02', 'b92af8d1ba3f78476daa221f1e27f5fd.png', 'user', '2020-05-25 14:10:13'),
(5, 'fadilah', 'Laki-laki', '089674555439', 'amikom yogya', 'fadilah@gmail.com', 'ba2bee8d4143c15a5fcfd9922ee71e7f', '', 'user', '2020-05-30 11:31:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambil_soal`
--
ALTER TABLE `ambil_soal`
  ADD PRIMARY KEY (`id_ambil_soal`);

--
-- Indexes for table `bab_booster`
--
ALTER TABLE `bab_booster`
  ADD PRIMARY KEY (`id_bab_booster`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `paket_booster`
--
ALTER TABLE `paket_booster`
  ADD PRIMARY KEY (`id_booster`);

--
-- Indexes for table `paket_reguler`
--
ALTER TABLE `paket_reguler`
  ADD PRIMARY KEY (`id_reguler`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambil_soal`
--
ALTER TABLE `ambil_soal`
  MODIFY `id_ambil_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bab_booster`
--
ALTER TABLE `bab_booster`
  MODIFY `id_bab_booster` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket_booster`
--
ALTER TABLE `paket_booster`
  MODIFY `id_booster` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paket_reguler`
--
ALTER TABLE `paket_reguler`
  MODIFY `id_reguler` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
