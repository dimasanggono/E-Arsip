-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 06:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_arsip` varchar(25) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `file_arsip` varchar(255) DEFAULT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `id_kategori`, `no_arsip`, `nama_file`, `deskripsi`, `tgl_upload`, `tgl_update`, `file_arsip`, `ukuran_file`, `id_dep`, `id_user`) VALUES
(32, 23, '20220206001', 'Surat kontrak tiktok', 'Surat perjanjian kontrak tiktok 2022', '2022-02-06', '2023-02-06', '1675653849_e111971cdefbbd8e4d4b.pdf', 14546, 9, 18),
(33, 20, '202302060002', 'Laporan marketing plan untuk brand A', 'Laporan marketing plan untuk brand A tahun 2023', '2023-02-06', '2023-02-06', '1675654091_26ab6e28abad2886e5fa.pdf', 14546, 9, 18),
(34, 20, '202102060003', 'laporan daftar pembelian  komputer', 'laporan daftar pembelian barang komputer tahun 2021', '2021-02-06', '2021-02-06', '1675654356_534209331bdc4877ea73.pdf', 14546, 3, 19),
(35, 23, '202302060004', 'invoice pembelian 2023 ', 'invoice pembelian barang komputer 2023 ', '2023-02-06', '2023-02-06', '1675654493_458bade76d0220d3d185.pdf', 14546, 3, 19),
(37, 20, '202204060006', 'laporan penjualan merchandise tahun 2022', 'laporan penjualan merchandise tahun 2022', '2022-04-06', '2022-04-06', '1675654670_5c0408736f2a1a9e682e.pdf', 14546, 2, 15),
(38, 20, '202302060007', 'desain iklan promo merchandise', 'desain iklan promo  merchandise bulan januari 2023', '2023-02-06', '2023-02-08', '1675828736_5844f6899818fe91319c.pdf', 14546, 1, 10),
(39, 20, '202302060008', 'laporan desaign plan tahun 2023', 'laporan desaign plan tahun 2023', '2023-02-06', '2023-02-06', '1675654983_767ba4f622edc6a48e0b.pdf', 14546, 7, 16),
(40, 20, '202302060009', 'laporan pengajian bulan januri 2023', 'laporan pengajian bulan januri 2023', '2023-02-06', '2023-02-06', '1675655104_bdd67dfc4872889d2c3a.pdf', 14546, 1, 20),
(41, 20, '202202060010', 'laporan keuangan tahun 2022', 'laporan keuangan tahun 2022', '2022-02-06', '2022-02-06', '1675655248_b9614a7b2962bae1a7a0.pdf', 14546, 1, 20),
(42, 22, '20230208001', 'surat jalan merchandise untuk Rocknation', 'Surat jalan barang merchandise untuk Rocknation', '2023-02-08', '2023-02-08', '1675827269_0e0bc4911a0678fcf316.pdf', 14546, 2, 15),
(43, 22, '202302080002', 'surat jalan merchandise untuk omnium', 'surat jalan barang merchandise untuk omnium', '2023-02-08', '2023-02-08', '1675827544_1b29b98980bac405962d.pdf', 14546, 2, 15),
(45, 20, '202302080004', 'Surat Laporan pembelian ATK', 'Surat Laporan pembelian ATK Bulan Febuari 2023', '2023-02-08', '2023-02-08', '1675827854_bb69796398ea634c1c95.pdf', 14546, 1, 20),
(46, 20, '202302080005', 'Laporan kehadiran karyawan', 'Laporan kehadiran karyawan Bulan Januari 2023', '2023-02-08', '2023-02-08', '1675828329_7e44dc8a1a0fd394e5be.pdf', 14546, 10, 21),
(47, 23, '202302080006', 'Surat Perizinan Cuti', 'Surat untuk pengajuan Perizinan Cuti', '2023-02-08', '2023-02-08', '1675828514_7ca89237378dddb93c06.pdf', 14546, 10, 21),
(48, 23, '20230211001', 'Surat Rekomendasi Vendor', 'Surat Permintaan Rekomendasi Vendor', '2023-02-11', '2023-02-11', '1676110084_65e78a2ac0e2097bd218.pdf', 14546, 3, 19),
(49, 20, '202202110002', 'Arsip Permintaan Pergantian Perangkat Keras', 'Arsip Permintaan Pergantian Perangkat Keras 2022', '2022-02-11', '2022-02-11', '1676110191_c628375254907c806aa1.pdf', 14546, 3, 19),
(51, 23, '202302110004', 'Arsip Pemberitahuan Rencana Perubahan Infrastruktur Jaringan', 'Arsip Pemberitahuan Rencana Perubahan Infrastruktur Jaringan', '2023-02-11', '2023-02-11', '1676111289_5fec850883d9b49f7029.pdf', 14546, 3, 19),
(52, 23, '202302110005', 'Arsip Permohonan Pelatihan Karyawan', 'Arsip Permohonan Pelatihan Karyawan', '2023-02-11', '2023-02-11', '1676111394_6fcccbc89ff92663e823.pdf', 14546, 10, 21),
(54, 20, '202302110007', 'Arsip Permintaan Penambahan Anggota Tim', 'Arsip Permintaan Penambahan Anggota Tim', '2023-02-11', '2023-02-11', '1676111537_a4fbdb95ee2f7c45898c.pdf', 14546, 10, 21),
(55, 20, '202302110008', 'Arsip Permohonan Pemasangan Iklan Produk.', 'Arsip Permohonan Pemasangan Iklan Produk.', '2023-02-11', '2023-02-11', '1676111638_b402c60716989c9af94c.pdf', 14546, 2, 15),
(56, 20, '202302110009', 'Arsip Pemberitahuan Pengumuman Acara Pemasaran', 'Arsip Pemberitahuan Pengumuman Acara Pemasaran', '2023-02-11', '2023-02-11', '1676111687_d949f40551eb55328e2a.pdf', 14546, 2, 15),
(58, 20, '202102110008', 'Arsip Permohonan Pemasangan Iklan Produk.', 'Arsip Permohonan Pemasangan Iklan Produk 2021.', '2021-02-11', '2021-02-11', '1676111638_b402c60716989c9af94c.pdf', 14546, 2, 15),
(61, 20, '20230214001', 'Laporan marketing plan untuk brand B', 'Laporan marketing plan untuk brand B 2023', '2023-02-14', '2023-02-14', '1676389408_449c42ce658a086b92b5.pdf', 14546, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dep`
--

CREATE TABLE `tbl_dep` (
  `id_dep` int(11) NOT NULL,
  `nama_dep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dep`
--

INSERT INTO `tbl_dep` (`id_dep`, `nama_dep`) VALUES
(1, 'Finance'),
(2, 'Marketing'),
(3, 'IT '),
(7, 'Graphic Design'),
(8, 'A&R (ARTIST & REPERTOIRE)'),
(9, 'Digital Marketing Social Media'),
(10, 'HRD'),
(11, 'Business Strategy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(20, 'Laporan'),
(22, 'Surat Keluar'),
(23, 'Surat Masuk'),
(25, 'Surat Kontrak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `email`, `password`, `level`, `foto`, `id_dep`) VALUES
(10, 'admin', 'admin@gmail.com', 'admin1234', 1, '1676111766_068ee2c73b4f567f007e.jpg', 1),
(24, 'user', 'user@gmail.com', 'qwerty', 2, '1676422482_351138560105c5c969c8.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tbl_dep`
--
ALTER TABLE `tbl_dep`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_dep`
--
ALTER TABLE `tbl_dep`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
