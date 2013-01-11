-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2013 at 02:28 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_asruta`
--

-- --------------------------------------------------------

--
-- Table structure for table `asisten`
--

CREATE TABLE IF NOT EXISTS `asisten` (
  `KD_ASISTEN` int(11) NOT NULL AUTO_INCREMENT,
  `KD_MEMBER` int(11) NOT NULL,
  `NM_ASISTEN` varchar(50) NOT NULL,
  `HAPEASISTEN` varchar(20) NOT NULL,
  `ALAMAT_ASISTEN` varchar(50) NOT NULL,
  `TGL_LAHIRASISTEN` date NOT NULL,
  `TMPT_LAHIRASISTEN` varchar(50) NOT NULL,
  `KOTA_ASISTEN` varchar(50) NOT NULL,
  `NO_IDASISTEN` varchar(20) NOT NULL,
  `COPY_ASISTEN` varchar(40) NOT NULL,
  PRIMARY KEY (`KD_ASISTEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `asisten`
--

INSERT INTO `asisten` (`KD_ASISTEN`, `KD_MEMBER`, `NM_ASISTEN`, `HAPEASISTEN`, `ALAMAT_ASISTEN`, `TGL_LAHIRASISTEN`, `TMPT_LAHIRASISTEN`, `KOTA_ASISTEN`, `NO_IDASISTEN`, `COPY_ASISTEN`) VALUES
(14, 2, 'Suparmi', '0857546655', 'Keputih', '1991-04-06', 'Surabaya', 'Surabaya', '2123132123', ''),
(15, 2, 'rasmi', '025555', 'gebang', '1988-07-20', 'Magetan', 'Surabaya', '123123123', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_lowongan`
--

CREATE TABLE IF NOT EXISTS `detail_lowongan` (
  `KD_LOWONGAN` int(11) DEFAULT NULL,
  `KD_MEMBER` int(11) DEFAULT NULL,
  `KD_ASISTEN` int(11) DEFAULT NULL,
  `KD_STATUSLAMAR` int(11) DEFAULT NULL,
  KEY `FK_LOWONGAN` (`KD_LOWONGAN`),
  KEY `FK_MELAMAR` (`KD_MEMBER`),
  KEY `FK_RELATIONSHIP_11` (`KD_ASISTEN`),
  KEY `FK_STATUS` (`KD_STATUSLAMAR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_lowongan`
--

INSERT INTO `detail_lowongan` (`KD_LOWONGAN`, `KD_MEMBER`, `KD_ASISTEN`, `KD_STATUSLAMAR`) VALUES
(3, 2, 12, NULL),
(3, 2, 14, NULL),
(3, 2, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE IF NOT EXISTS `jenis_kelamin` (
  `KD_KELAMIN` int(11) NOT NULL,
  `JENIS_KELAMIN` varchar(20) NOT NULL,
  PRIMARY KEY (`KD_KELAMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`KD_KELAMIN`, `JENIS_KELAMIN`) VALUES
(1, 'Laki - laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lowongan`
--

CREATE TABLE IF NOT EXISTS `jenis_lowongan` (
  `KD_JENISLO` int(11) NOT NULL,
  `JENIS_LOWONGAN` varchar(30) NOT NULL,
  PRIMARY KEY (`KD_JENISLO`),
  KEY `KD_JENISLO` (`KD_JENISLO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_lowongan`
--

INSERT INTO `jenis_lowongan` (`KD_JENISLO`, `JENIS_LOWONGAN`) VALUES
(1, 'Cari Asisten'),
(2, 'Cari Kerja');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE IF NOT EXISTS `keahlian` (
  `KD_KEAHLIAN` varchar(30) NOT NULL,
  `JNS_KEAHLIAN` varchar(30) NOT NULL,
  PRIMARY KEY (`KD_KEAHLIAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`KD_KEAHLIAN`, `JNS_KEAHLIAN`) VALUES
('1', 'Baby Sitter'),
('2', 'Memasak, Mencuci');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `kd_lokasi` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `KD_LOWONGAN` int(11) NOT NULL AUTO_INCREMENT,
  `PEMBUAT_LAMAR` int(11) DEFAULT NULL,
  `KD_ASISTEN` int(11) DEFAULT NULL,
  `KD_JENISLO` int(11) DEFAULT NULL,
  `KD_KEAHLIAN` varchar(30) DEFAULT NULL,
  `GAJI` varchar(20) NOT NULL,
  `LOKASI` varchar(40) NOT NULL,
  `JAM_KERJA` varchar(20) NOT NULL,
  `MENGINAP` varchar(10) NOT NULL,
  `HARI_KERJA` varchar(20) NOT NULL,
  `KD_STATUS` int(11) NOT NULL,
  PRIMARY KEY (`KD_LOWONGAN`),
  KEY `FK_PEMBUAT_LOWONGAN` (`PEMBUAT_LAMAR`),
  KEY `FK_RELATIONSHIP_12` (`KD_ASISTEN`),
  KEY `FK_RELATIONSHIP_4` (`KD_KEAHLIAN`),
  KEY `FK_RELATIONSHIP_7` (`KD_JENISLO`),
  KEY `KD_STATUS` (`KD_STATUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`KD_LOWONGAN`, `PEMBUAT_LAMAR`, `KD_ASISTEN`, `KD_JENISLO`, `KD_KEAHLIAN`, `GAJI`, `LOKASI`, `JAM_KERJA`, `MENGINAP`, `HARI_KERJA`, `KD_STATUS`) VALUES
(3, 2, NULL, 1, '1', '900000', 'Semampir', '09.00 - 20.00', 'YA', 'Sabtu - Minggu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `KD_MEMBER` int(11) NOT NULL,
  `KD_KELAMIN` int(11) DEFAULT NULL,
  `KD_USER` int(11) NOT NULL,
  `NM_MEMBER` varchar(255) NOT NULL,
  `ALAMAT` varchar(255) NOT NULL,
  `HAPE` varchar(20) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PEKERJAAN` varchar(255) NOT NULL,
  `NO_IDENTITAS` varchar(30) NOT NULL,
  `COPY_IDENTITAS` varchar(15) NOT NULL,
  `NAMA_BIRO` varchar(50) DEFAULT NULL,
  `TMPT_LAHIR` varchar(60) NOT NULL,
  `TGL_LAHIR` date NOT NULL,
  PRIMARY KEY (`KD_MEMBER`),
  KEY `FK_RELATIONSHIP_13` (`KD_KELAMIN`),
  KEY `FK_RELATIONSHIP_2` (`KD_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`KD_MEMBER`, `KD_KELAMIN`, `KD_USER`, `NM_MEMBER`, `ALAMAT`, `HAPE`, `EMAIL`, `PEKERJAAN`, `NO_IDENTITAS`, `COPY_IDENTITAS`, `NAMA_BIRO`, `TMPT_LAHIR`, `TGL_LAHIR`) VALUES
(1, 1, 1, 'Rachmat Gerhantara', 'Semampir', '085280208377', 'mamat@gmail.com', 'PNS', '9900', '888888888888', 'Biro Jasa Sinar Perlangi', 'Wonogiri', '2013-01-01'),
(2, 1, 2, 'Arif Setiyanto', 'Jl. Arif Rahman Hakim, Keputih 1A No.20', '085768531003', 'djepits5005@gmail.com', 'PNS', '1231923i120931293', '', 'asdasd', 'gunung kidul', '2012-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `KD_ROLES` int(11) NOT NULL,
  `ROLES` varchar(30) NOT NULL,
  PRIMARY KEY (`KD_ROLES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`KD_ROLES`, `ROLES`) VALUES
(1, 'Admin'),
(2, 'Biro Jasa'),
(3, 'Majikan');

-- --------------------------------------------------------

--
-- Table structure for table `status_asisten`
--

CREATE TABLE IF NOT EXISTS `status_asisten` (
  `kd_status` int(11) NOT NULL,
  `status_ast` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_status`),
  KEY `kd_status` (`kd_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_asisten`
--

INSERT INTO `status_asisten` (`kd_status`, `status_ast`) VALUES
(1, 'Tersedia'),
(2, 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `status_lamaran`
--

CREATE TABLE IF NOT EXISTS `status_lamaran` (
  `kd_statuslamar` int(11) NOT NULL,
  `status_lamaran` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_statuslamar`),
  KEY `kd_statuslamar` (`kd_statuslamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_lamaran`
--

INSERT INTO `status_lamaran` (`kd_statuslamar`, `status_lamaran`) VALUES
(0, 'baru'),
(1, 'diterima'),
(2, 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `status_lowongan`
--

CREATE TABLE IF NOT EXISTS `status_lowongan` (
  `KD_STATUS` int(11) NOT NULL,
  `KET_STATUS` varchar(20) NOT NULL,
  PRIMARY KEY (`KD_STATUS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_lowongan`
--

INSERT INTO `status_lowongan` (`KD_STATUS`, `KET_STATUS`) VALUES
(1, 'Terbuka'),
(2, 'Terisi');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `KD_TESTI` int(11) NOT NULL AUTO_INCREMENT,
  `KD_MEMBER` int(11) DEFAULT NULL,
  `ISI_TESTI` varchar(255) NOT NULL,
  PRIMARY KEY (`KD_TESTI`),
  KEY `FK_PEMBUAT_TESTI` (`KD_MEMBER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`KD_TESTI`, `KD_MEMBER`, `ISI_TESTI`) VALUES
(2, 2, 'Saya suka makan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `KD_USER` int(11) NOT NULL AUTO_INCREMENT,
  `KD_ROLES` int(11) DEFAULT NULL,
  `USERNAME` varchar(15) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  PRIMARY KEY (`KD_USER`),
  UNIQUE KEY `USERNAME` (`USERNAME`),
  KEY `FK_RELATIONSHIP_5` (`KD_ROLES`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`KD_USER`, `KD_ROLES`, `USERNAME`, `PASSWORD`) VALUES
(1, 3, 'aa', 'aa'),
(2, 2, 'bb', 'bb');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_lowongan`
--
ALTER TABLE `detail_lowongan`
  ADD CONSTRAINT `detail_lowongan_ibfk_1` FOREIGN KEY (`KD_STATUSLAMAR`) REFERENCES `status_lamaran` (`kd_statuslamar`);

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `FK_PEMBUAT_LOWONGAN` FOREIGN KEY (`PEMBUAT_LAMAR`) REFERENCES `members` (`KD_MEMBER`),
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`KD_ASISTEN`) REFERENCES `asisten` (`KD_ASISTEN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`KD_KEAHLIAN`) REFERENCES `keahlian` (`KD_KEAHLIAN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`KD_JENISLO`) REFERENCES `jenis_lowongan` (`KD_JENISLO`),
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`KD_STATUS`) REFERENCES `status_lowongan` (`KD_STATUS`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`KD_KELAMIN`) REFERENCES `jenis_kelamin` (`KD_KELAMIN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`KD_USER`) REFERENCES `users` (`KD_USER`);

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `FK_PEMBUAT_TESTI` FOREIGN KEY (`KD_MEMBER`) REFERENCES `members` (`KD_MEMBER`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`KD_ROLES`) REFERENCES `roles` (`KD_ROLES`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
