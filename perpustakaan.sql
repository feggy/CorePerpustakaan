-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 04:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_on_kartu` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_off_kartu` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `no_hp`, `alamat`, `tgl_masuk`, `tgl_on_kartu`, `tgl_off_kartu`, `foto`) VALUES
('001', 'Rio Angga', '08091000200', 'Jl. kenangan', '2019-03-26 03:32:31', '2019-03-22 17:00:00', '2020-03-22 17:00:00', '201903260432311336451869'),
('002', 'Coba123', '123', 'Jl.asd', '2019-03-24 09:25:59', '2018-04-19 17:00:00', '2020-03-19 17:00:00', '201903241025591694862503'),
('003', 'Rizky Yananda', '08091000100', 'Jl. Terserah', '2019-04-07 12:08:33', '2019-04-06 17:00:00', '2019-04-13 17:00:00', '20190407140833337591422'),
('005', 'Joko', '123', 'Jl. Sudirman', '2019-03-24 06:22:25', '2018-08-23 17:00:00', '2019-09-13 17:00:00', '201903240716121058684802'),
('006', 'Apple', '0788464578', 'jl. ajajsh', '2019-04-07 12:11:20', '2019-04-06 17:00:00', '2019-08-06 17:00:00', '201904071411201768059066');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(15) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(35) NOT NULL,
  `penerbit` varchar(35) NOT NULL,
  `tahun_buku` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `jenis_buku` varchar(15) NOT NULL,
  `lokasi_rak_buku` varchar(15) NOT NULL,
  `qrcode` varchar(250) NOT NULL,
  `tgl_masuk_buku` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_buku`, `jumlah_buku`, `jenis_buku`, `lokasi_rak_buku`, `qrcode`, `tgl_masuk_buku`) VALUES
('B101001', 'Buku Pintar: Seri Senior', 'Iwan Gayo', 'Pustaka Warga Negara', 2008, 20, 'Ilmu Pengetahua', 'A21', 'B101001', '2019-04-06 10:24:26'),
('B101002', 'Algoritma dan Pemrograman dalam Bahasa Pascal dan C (Edisi revisi)', 'Rinaldi Munir', 'Informatika Bandung', 2001, 10, 'Teknologi', 'T01', 'B101002', '2019-04-06 10:26:45'),
('B101003', 'Basis Data', 'Fathansyah', 'Informatika Bandung', 1999, 13, 'Teknologi', 'T03', 'B101003', '2019-04-06 10:27:46'),
('B101004', 'Analisis & Perancangan Sistem Informasi: Untuk Keunggulan Bersaing Perusahaan dan Organisasi Modern', 'Hanif Al Fatta', 'Andi Yogyakarta', 2008, 42, 'Teknologi Infor', 'T33', 'B101004', '2019-04-06 10:29:17'),
('B101005', 'Coba mencari cinta', 'anonym', 'anonym', 1990, 2, 'Romantis', 'C01', 'B101005', '2019-04-07 11:57:39'),
('B101006', 'Bagaimana menjadi milioner', 'Feggy', 'Information One', 2001, 12, 'Ilmu Pengetahua', 'B22', 'B101006', '2019-04-07 12:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_pinjam` int(11) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `kode_buku` varchar(15) NOT NULL,
  `tgl_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_kembali` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_perpanjang` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Sedang dipinjam','Sudah dikembalikan','','') NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kode_pinjam`, `id_anggota`, `kode_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_perpanjang`, `status`, `denda`) VALUES
(1, '001', 'B101003', '2019-04-06 10:30:38', '2019-05-03 17:00:00', '0000-00-00 00:00:00', 'Sudah dikembalikan', 0),
(2, '005', 'B101002', '2019-04-06 10:31:10', '2019-04-12 17:00:00', '0000-00-00 00:00:00', 'Sedang dipinjam', 0),
(3, '001', 'B101001', '2019-03-30 10:49:43', '2019-04-04 17:00:00', '0000-00-00 00:00:00', 'Sedang dipinjam', 0),
(4, '3', 'B101001', '2019-04-07 11:58:12', '2019-04-13 17:00:00', '0000-00-00 00:00:00', 'Sedang dipinjam', 0),
(5, '001', 'B101001', '2019-04-07 12:00:53', '2019-04-20 17:00:00', '0000-00-00 00:00:00', 'Sudah dikembalikan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_kembali` varchar(15) NOT NULL,
  `kode_pinjam` varchar(15) NOT NULL,
  `tgl_kembali` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_anggota` varchar(15) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `nama`, `level`, `no_hp`, `alamat`, `foto`, `created_at`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'administrator', '08091000100', 'Jl. nin aja dulu', '201903260434301952233021', '2019-03-23 14:19:37'),
('angga', '8479c86c7afcb56631104f5ce5d6de62', 'Angga', 'petugas', '0787878', 'jl. bangkinang', '2019032604555256737873', '2019-03-24 09:25:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kode_kembali`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `kode_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
