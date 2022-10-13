-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2022 at 12:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap_if`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `Nip` varchar(45) NOT NULL,
  `Nama` varchar(45) DEFAULT NULL,
  `Kode_Wali` varchar(45) DEFAULT NULL,
  `Kode_Pemb_P` varchar(45) NOT NULL,
  `Kode_Pemb_S` varchar(45) NOT NULL,
  `Email_SSO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`Nip`, `Nama`, `Kode_Wali`, `Kode_Pemb_P`, `Kode_Pemb_S`, `Email_SSO`) VALUES
('0000000000000001', 'Abyan Puji Widodo', '0001', '0001', '0001', 'abyanpujiwidodo@lecturer.undip.ac.id'),
('0000000000000002', 'Eng. Andhika Wibowo', '0002', '0002', '0002', 'andhiwibowo@lecturer.undip.ac.id'),
('0000000000000003', 'Farhan Adi Sarwoko', '0003', '0003', '0003', 'fadis@lecturer.undip.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `tb_irs`
--

CREATE TABLE `tb_irs` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) NOT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Jml_SKS` varchar(45) DEFAULT NULL,
  `File_IRS` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_irs`
--

INSERT INTO `tb_irs` (`Nim`, `Semester`, `Status`, `Jml_SKS`, `File_IRS`) VALUES
('24060118150120', '9', 'Cuti', '144', NULL),
('24060119150131', '7', 'Aktif', '136', NULL),
('24060120150116', '5', 'Aktif', '90', NULL),
('24060120150120', '5', 'Cuti', '90', NULL),
('24060120150169', '5', 'Aktif', '90', NULL),
('24060121150144', '3', 'Aktif', '48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `Kode_Kabupaten` varchar(45) NOT NULL,
  `Kode_Provinsi` varchar(45) DEFAULT NULL,
  `Nama_Kabupaten` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`Kode_Kabupaten`, `Kode_Provinsi`, `Nama_Kabupaten`) VALUES
('17', '33', 'Pati'),
('21', '33', 'Cepu'),
('22', '33', 'Semarang'),
('69', '32', 'Bogor'),
('76', '32', 'Blora');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khs`
--

CREATE TABLE `tb_khs` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) NOT NULL,
  `Ip` varchar(45) DEFAULT NULL,
  `Ip_Kumulatif` varchar(45) DEFAULT NULL,
  `File_KHS` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Jml_SKS_Kumulatif` varchar(45) DEFAULT NULL,
  `Jml_SKS_Semester` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_khs`
--

INSERT INTO `tb_khs` (`Nim`, `Semester`, `Ip`, `Ip_Kumulatif`, `File_KHS`, `Status`, `Jml_SKS_Kumulatif`, `Jml_SKS_Semester`) VALUES
('24060118150120', '9', '3.8', '3.75', NULL, 'Cuti', '144', '0'),
('24060119150131', '7', '3.71', '3.57', NULL, 'Aktif', '118', '18'),
('24060120150116', '5', '3.57', '3.71', NULL, 'Aktif', '90', '21'),
('24060120150120', '5', '3.57', '3.71', NULL, 'Cuti', '90', '18'),
('24060120150169', '5', '3.57', '3.87', NULL, 'Aktif', '90', '18'),
('24060121150144', '3', '3.87', '3.71', NULL, 'Aktif', '48', '18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `Nim` varchar(45) NOT NULL,
  `Nama` varchar(45) DEFAULT NULL,
  `Status` varchar(255) DEFAULT '1',
  `Angkatan` varchar(45) DEFAULT NULL,
  `Semester` varchar(255) NOT NULL,
  `tempatLahir` varchar(45) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `NIK` varchar(45) DEFAULT NULL,
  `No_HP` varchar(45) DEFAULT NULL,
  `Email_SSO` varchar(45) DEFAULT NULL,
  `Email_Pribadi` varchar(45) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Kode_Kabupaten` varchar(45) DEFAULT NULL,
  `Kode_Wali` varchar(45) DEFAULT NULL,
  `Kode_Pemb_P` varchar(45) DEFAULT NULL,
  `Kode_Pemb_S` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`Nim`, `Nama`, `Status`, `Angkatan`, `Semester`, `tempatLahir`, `tglLahir`, `NIK`, `No_HP`, `Email_SSO`, `Email_Pribadi`, `Alamat`, `Kode_Kabupaten`, `Kode_Wali`, `Kode_Pemb_P`, `Kode_Pemb_S`) VALUES
('24060118150120', 'Farrel Haris R', 'Cuti', '2018', '9', 'New York', '2002-06-02', '32712345678911213', '082234567892', 'paller@students.undip.ac.id', 'paller@gmail.com', 'Jalan Singa Utara 1', '32.76', '0001', '0001', '0001'),
('24060119150131', 'Rizal Khoirul Farid', 'Aktif', '2019', '7', 'Demak', '2001-10-10', '3271234567896666', '082289745632', 'rizalkhf@students.undip.ac.id', 'rizalkhf@gmail.com', 'Jalan Teratai 3', '33.21', '0002', '0001', '0002'),
('24060120150116', 'MK Arif', 'Aktif', '2020', '5', 'Rembang', '2002-10-29', '33170796560020002', '082264524881', 'mkma002@students.undip.ac.id', 'mkma002@gmail.com', 'Jalan Melati 4', '33.17', '0003', '', ''),
('24060120150120', 'Lerraf ARP', 'Cuti', '2020', '5', 'Depox', '2002-06-02', '32712345678911213', '082289749595', 'lerraff@students.undip.ac.id', 'lerraff@gmail.com', 'Jalan Lobak 21', '32.76', '0002', '', ''),
('24060120150169', 'Bayan Ardiyatama', 'Aktif', '2020', '5', 'Semarang', '2001-12-27', '32712345678996352', '082289746563', 'bayana@students.undip.ac.id', 'bayana@gmail.com', 'Jalan Panda Selatan 45', '33.22', '0003', '', ''),
('24060121150144', 'Iday Haris R', 'Aktif', '2021', '3', 'Jepang', '2002-04-20', '331707965600232613', '082289747415', 'idayhr@students.undip.ac.id', 'idayhr@gmail.com', 'Jalan Badak 45', '32.69', '0003', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkl`
--

CREATE TABLE `tb_pkl` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  `Tempat` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Fiile_PKL` varchar(45) DEFAULT NULL,
  `Kode_Pemb_P` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pkl`
--

INSERT INTO `tb_pkl` (`Nim`, `Semester`, `Tempat`, `Status`, `Fiile_PKL`, `Kode_Pemb_P`) VALUES
('24060118150120', '9', 'Indihome', '0', NULL, '0001'),
('24060119150131', '7', 'Bukalapak', '1', NULL, '0001'),
('24060120150116', '5', 'Tokopedia', '1', NULL, '0001'),
('24060120150120', '5', 'AkuLaku', '0', NULL, '0001'),
('24060120150169', '5', 'Gojek', '1', NULL, '0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `Kode_Provinsi` varchar(45) NOT NULL,
  `Nama_Provinsi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`Kode_Provinsi`, `Nama_Provinsi`) VALUES
('32', 'Jawa Barat'),
('33', 'Jawa Tengah'),
('34', 'DI Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skripsi`
--

CREATE TABLE `tb_skripsi` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Kode_Pemb_S` varchar(45) DEFAULT NULL,
  `Tgl_Lulus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_skripsi`
--

INSERT INTO `tb_skripsi` (`Nim`, `Semester`, `Status`, `Kode_Pemb_S`, `Tgl_Lulus`) VALUES
('24060118150120', '9', 'Cuti', '0001', NULL),
('24060119150131', '7', 'Aktif', '0002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `Nim_Nip` varchar(45) NOT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`Nim_Nip`, `Username`, `Password`, `Status`, `Role`) VALUES
('0000000000000001', 'doswal', 'doswal', 'Aktif', '2'),
('0000000000000003', 'dept', 'dept', 'Aktif', '4'),
('0000000000000069', 'op', 'op', 'Aktif', '3'),
('24060118150120', 'mhs1', 'mhs1', 'Cuti', '1'),
('24060119150131', 'mhs', 'mhs', 'Aktif', '1'),
('24060120150116', 'mhs2', 'mhs2', 'Aktif', '1'),
('24060120150120', 'mhs3', 'mhs3', 'Cuti', '1'),
('24060120150169', 'mhs4', 'mhs4', 'Aktif', '1'),
('24060121150144', 'mhs5', 'mhs5', 'Aktif', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`Nip`);

--
-- Indexes for table `tb_irs`
--
ALTER TABLE `tb_irs`
  ADD PRIMARY KEY (`Nim`,`Semester`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`Kode_Kabupaten`),
  ADD KEY `fk_kab_prov` (`Kode_Provinsi`);

--
-- Indexes for table `tb_khs`
--
ALTER TABLE `tb_khs`
  ADD PRIMARY KEY (`Nim`,`Semester`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `tb_pkl`
--
ALTER TABLE `tb_pkl`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`Kode_Provinsi`);

--
-- Indexes for table `tb_skripsi`
--
ALTER TABLE `tb_skripsi`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Nim_Nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_irs`
--
ALTER TABLE `tb_irs`
  ADD CONSTRAINT `FK_NIM_IRS` FOREIGN KEY (`Nim`) REFERENCES `tb_mhs` (`Nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD CONSTRAINT `fk_kab_prov` FOREIGN KEY (`Kode_Provinsi`) REFERENCES `tb_provinsi` (`Kode_Provinsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
