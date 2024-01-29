-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 01:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_appmhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `penerbit_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penerbit`, `pengarang`, `tahun`, `kategori_id`, `harga`, `penerbit_id`) VALUES
(1, 'Pengantar Basis Data', 'Gramedia', 'Muhammad Edya Rosadi', '2020', 1, 75000, 0),
(2, 'One Piece Volume 220', 'Gramedia', 'Eichiro Oda', '2015', 2, 45000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `FakultasID` int(11) NOT NULL,
  `NamaFakultas` varchar(100) NOT NULL,
  `Deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`FakultasID`, `NamaFakultas`, `Deskripsi`) VALUES
(1, 'Fakultas Teknik', 'Fakultas Teknik dan Ilmu Komputer'),
(2, 'Fakultas Ilmu Sosial', 'Fakultas Ilmu Sosial dan Humaniora'),
(3, 'Fakultas Ekonomi', 'Fakultas Ekonomi dan Bisnis'),
(4, 'Fakultas Kedokteran', 'Fakultas Kedokteran dan Ilmu Kesehatan'),
(5, 'Fakultas Hukum', 'Fakultas Hukum dan Ilmu Politik');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Komputer'),
(2, 'Komik'),
(3, 'Ilmu Pengetahuan Alam'),
(4, 'Ilmu Pengetahuan Sosial'),
(5, 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama_mahasiswa`) VALUES
(1, 'Ahmad Saufi'),
(2, 'Seta Sektyananda'),
(3, 'Rizki'),
(4, 'Anita Amelia'),
(6, 'Ruswansdi');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(4) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `buku_id` int(4) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama_peminjam`, `buku_id`, `tgl`) VALUES
(2, 'Nurul Azmi', 1, '2024-01-29 11:53:05'),
(3, 'Ahmad Darmawi', 2, '2024-01-29 11:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(4) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat_penerbit` text NOT NULL,
  `nomor_telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama_penerbit`, `alamat_penerbit`, `nomor_telp`) VALUES
(2, 'Penerbit Erlangga', 'Jl. A. Yani, Bandung', '098675677676'),
(4, 'CV Andi Offset', 'Jakarta', '0987564564687'),
(6, 'Rineka Cipta', 'Surabaya', '08756456467');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `UserID` int(11) NOT NULL,
  `NamaPengguna` varchar(50) NOT NULL,
  `KataSandi` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Peran` varchar(20) NOT NULL,
  `MahasiswaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`UserID`, `NamaPengguna`, `KataSandi`, `Email`, `Peran`, `MahasiswaID`) VALUES
(8, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@email.com', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programstudi`
--

CREATE TABLE `programstudi` (
  `ProgramStudiID` int(11) NOT NULL,
  `NamaProgram` varchar(100) NOT NULL,
  `FakultasID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programstudi`
--

INSERT INTO `programstudi` (`ProgramStudiID`, `NamaProgram`, `FakultasID`) VALUES
(1, 'Teknik Informatika', 1),
(2, 'Ilmu Komunikasi', 2),
(3, 'Manajemen Bisnis', 3),
(4, 'Kedokteran Umum', 4),
(5, 'Hukum', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` int(4) NOT NULL,
  `nama_rak` varchar(100) NOT NULL,
  `lantai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `nama_rak`, `lantai`) VALUES
(3, 'Rak Besi', 'Lantai 2'),
(4, 'Rak Kayu', 'Lantai 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`FakultasID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `MahasiswaID` (`MahasiswaID`);

--
-- Indexes for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD PRIMARY KEY (`ProgramStudiID`),
  ADD KEY `FakultasID` (`FakultasID`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `FakultasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `programstudi`
--
ALTER TABLE `programstudi`
  MODIFY `ProgramStudiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`MahasiswaID`) REFERENCES `mahasiswa` (`id`);

--
-- Constraints for table `programstudi`
--
ALTER TABLE `programstudi`
  ADD CONSTRAINT `programstudi_ibfk_1` FOREIGN KEY (`FakultasID`) REFERENCES `fakultas` (`FakultasID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
