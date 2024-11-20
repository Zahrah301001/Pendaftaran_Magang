-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 01:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln_magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`) VALUES
(1, 'SMKN 3 Spanyol'),
(2, 'SMKN 1 BELGIA'),
(4, 'Universitas Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `kesan`
--

CREATE TABLE `kesan` (
  `id_kesan` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `kesan` mediumtext NOT NULL,
  `pesan` mediumtext NOT NULL,
  `tgl_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kesan`
--

INSERT INTO `kesan` (`id_kesan`, `nim`, `kesan`, `pesan`, `tgl_dibuat`) VALUES
(1, '12345', 'bagus banget', 'mantap banget', '2023-02-25 15:14:12'),
(2, '12345', 'gg', 'wah', '2023-02-25 15:14:12'),
(3, '12345', 'senang banget!', 'TOP', '2023-02-25 15:14:12'),
(6, '123', 'Mantap Kak', 'Mantap Banget', '2023-02-25 15:14:12'),
(7, '678877', 'seru banget, menarik, banyak pengalaman', 'berkembang lebih baik lagi', '2023-03-02 13:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `makalah`
--

CREATE TABLE `makalah` (
  `id_makalah` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makalah`
--

INSERT INTO `makalah` (`id_makalah`, `nim`, `berkas`) VALUES
(2, 12345, '63f980cc354e9.pdf'),
(3, 123, '63f9ba06c1d41.pdf'),
(4, 678877, '64003f261dc16.pdf'),
(5, 491804, '640046062f47f.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `disiplin` int(5) NOT NULL,
  `tanggungjawab` int(5) NOT NULL,
  `loyalitas` int(5) NOT NULL,
  `kerjasama` int(5) NOT NULL,
  `pemimpin` int(5) NOT NULL,
  `peduli` int(5) NOT NULL,
  `integritas` int(5) NOT NULL,
  `etika` int(5) NOT NULL,
  `rapi` int(5) NOT NULL,
  `makalah` int(5) NOT NULL,
  `nilai_rata` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `nama`, `disiplin`, `tanggungjawab`, `loyalitas`, `kerjasama`, `pemimpin`, `peduli`, `integritas`, `etika`, `rapi`, `makalah`, `nilai_rata`) VALUES
(4, '12345', 'Dimas', 84, 92, 47, 29, 40, 48, 28, 38, 59, 38, 50),
(5, '123', 'Rehan', 89, 74, 24, 89, 57, 89, 84, 90, 38, 94, 73),
(6, '491804', 'asta', 80, 78, 80, 86, 49, 29, 89, 57, 88, 84, 72),
(8, '678877', 'ega', 84, 84, 92, 19, 57, 85, 38, 94, 28, 58, 64);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `identity` varchar(50) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `identity`, `jenis`, `tgl_input`) VALUES
(1, '678877', 'kesan', '2023-03-02 13:14:14'),
(2, '678877', 'makalah', '2023-03-02 13:16:06'),
(4, 'Universitas Indonesia', 'daftar', '2023-03-02 13:29:08'),
(5, '491804', 'makalah', '2023-03-02 13:45:26'),
(6, 'SMKN 1 BELGIA', 'daftar', '2023-03-02 13:45:55'),
(7, 'Universitas Indonesia', 'daftar', '2023-03-02 13:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftaran` int(11) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `berkas` varchar(50) NOT NULL,
  `tgl_surat_masuk` datetime NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL,
  `surat_konfirmasi` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftaran`, `instansi`, `telpon`, `berkas`, `tgl_surat_masuk`, `tgl_konfirmasi`, `surat_konfirmasi`, `status`) VALUES
(7, 'SMKN 1 BELGIA', '474848', '63f9e2f1d6c80.pdf', '2023-02-25 17:29:05', '2023-02-27 08:34:06', '', 'aktif'),
(8, 'SMKN 3 Spanyol', '08765563', '63fc0308b6e12.pdf', '2023-02-27 08:10:32', '0000-00-00 00:00:00', '', 'pending'),
(9, 'SMKN 3 Spanyol', '08429184', '63fc28e88bf77.pdf', '2023-02-27 10:52:08', '2023-02-27 10:58:06', '', 'aktif'),
(11, 'Universitas Indonesia', '084488194', '64004234cdff8.pdf', '2023-03-02 13:29:08', '0000-00-00 00:00:00', '', 'pending'),
(12, 'SMKN 1 BELGIA', '084717401', '64004623839f0.pdf', '2023-03-02 13:45:55', '0000-00-00 00:00:00', '', 'pending'),
(13, 'Universitas Indonesia', '094179102', '640046352b203.pdf', '2023-03-02 13:46:13', '0000-00-00 00:00:00', '', 'pending'),
(14, 'SMKN 3 Spanyol', '087414829', '64007a4515798.pdf', '2023-03-02 17:28:21', '0000-00-00 00:00:00', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nim`, `nama`, `instansi`, `jurusan`, `tgl_mulai`, `tgl_selesai`, `gender`, `agama`, `email`, `no_wa`, `status`) VALUES
(3, '12345', 'Dimas', 'SMKN 3 Spanyol', 'rekayasa perangkat lunak', '2023-02-01', '2023-02-23', 'L', 'islam', 'dimas@gmail.com', '0888', 'aktif'),
(4, '123', 'Rehan', 'SMKN 3 Spanyol', 'rekayasa perangkat lunak', '2023-02-01', '2023-02-23', 'L', 'Islam', 'rehan@gmail.com', '099999', 'alumni'),
(7, '491804', 'asta', 'SMKN 3 Spanyol', 'teknik informatika', '2023-02-08', '2023-03-04', 'L', 'islam', 'a@gmail.com', '5215125212', 'alumni'),
(9, '678877', 'ega', 'SMKN 1 BELGIA', 'teknik informatika', '2023-02-04', '2023-03-04', 'L', 'islam', 'ega@gmail.com', '081928492', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `surat_balasan`
--

CREATE TABLE `surat_balasan` (
  `id_surat_balasan` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `no_surat_balasan` varchar(50) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `tgl_surat_pengirim` datetime NOT NULL,
  `no_surat_pengirim` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `nama_diterima` mediumtext NOT NULL,
  `nama_pihak_pln` varchar(50) NOT NULL,
  `no_pihak_pln` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_balasan`
--

INSERT INTO `surat_balasan` (`id_surat_balasan`, `id_pendaftar`, `no_surat_balasan`, `nama_penerima`, `instansi`, `tgl_surat_pengirim`, `no_surat_pengirim`, `tgl_masuk`, `tgl_keluar`, `nama_diterima`, `nama_pihak_pln`, `no_pihak_pln`) VALUES
(6, 1, '221', 'Rektor', 'SMKN 3 Spanyol', '2023-02-01 00:00:00', 'PS 12830', '2023-02-04', '2023-02-17', 'Umar / 4237', 'Iskan', '08282112'),
(7, 7, '002', 'Rektor', 'SMKN 1 BELGIA', '2023-02-25 00:00:00', 'P 301', '2023-02-13', '2023-02-26', 'Hilo/912083902, Yani/840918442', 'Iskan', '08282112'),
(8, 9, '4124', 'Rektor', 'SMKN 3 Spanyol', '2023-02-27 10:52:08', 'YD 8390/4 12', '2023-03-02', '2023-03-12', 'Rifki/27310, Tris/1028', 'Iskan', '08282112'),
(9, 0, '', '', 'SMKN 1 BELGIA', '0000-00-00 00:00:00', '', '0000-00-00', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ttd`
--

CREATE TABLE `ttd` (
  `id_ttd` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ttd`
--

INSERT INTO `ttd` (`id_ttd`, `nama`, `jabatan`) VALUES
(1, 'Haris Rendra', 'Asisten Direktur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Sandy', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `kesan`
--
ALTER TABLE `kesan`
  ADD PRIMARY KEY (`id_kesan`);

--
-- Indexes for table `makalah`
--
ALTER TABLE `makalah`
  ADD PRIMARY KEY (`id_makalah`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `surat_balasan`
--
ALTER TABLE `surat_balasan`
  ADD PRIMARY KEY (`id_surat_balasan`);

--
-- Indexes for table `ttd`
--
ALTER TABLE `ttd`
  ADD PRIMARY KEY (`id_ttd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kesan`
--
ALTER TABLE `kesan`
  MODIFY `id_kesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `makalah`
--
ALTER TABLE `makalah`
  MODIFY `id_makalah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surat_balasan`
--
ALTER TABLE `surat_balasan`
  MODIFY `id_surat_balasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ttd`
--
ALTER TABLE `ttd`
  MODIFY `id_ttd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
