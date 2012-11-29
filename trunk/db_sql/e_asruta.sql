-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2012 at 12:20 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

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
-- Table structure for table `detail_users`
--

CREATE TABLE IF NOT EXISTS `detail_users` (
  `kd_users` int(11) NOT NULL,
  `kd_member` int(11) NOT NULL,
  `nm_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `penghasilan_bulanan` decimal(10,0) DEFAULT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `copy_identitas` longblob,
  PRIMARY KEY (`kd_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `id_cariasisten` int(11) NOT NULL AUTO_INCREMENT,
  `kd_users` int(11) NOT NULL,
  `keterampilan` varchar(255) NOT NULL,
  `gaji` decimal(10,0) NOT NULL,
  `hari_kerja` int(11) NOT NULL,
  `jam_kerja` text,
  `luas_rumah` int(11) NOT NULL,
  `anggota_kel` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cariasisten`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_cariasisten`, `kd_users`, `keterampilan`, `gaji`, `hari_kerja`, `jam_kerja`, `luas_rumah`, `anggota_kel`, `lokasi`) VALUES
(1, 0, 'Memasak, Mencuci', '750000', 6, '08:00-18:00', 75, 5, 'Surabaya Barat'),
(2, 0, 'Memasak, Mencuci, Merawat Anak', '1000000', 6, '07:00-17:00', 100, 4, 'Surabaya Timur'),
(3, 0, 'Sopir', '700000', 6, '7', 100, 5, 'Surabaya Barat'),
(4, 0, 'Sopir', '700000', 6, '7', 100, 5, 'Surabaya Barat');

-- --------------------------------------------------------

--
-- Table structure for table `reff_keterampilan`
--

CREATE TABLE IF NOT EXISTS `reff_keterampilan` (
  `kd_keteramp` int(11) NOT NULL,
  `ket_keteramp` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_keteramp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_keterampilan`
--

INSERT INTO `reff_keterampilan` (`kd_keteramp`, `ket_keteramp`) VALUES
(1, 'Memasak, Mencuci, Merawat Rumah'),
(2, 'Merawat Anak'),
(3, 'Sopir'),
(4, 'Tukang Kebun'),
(5, 'Merawat Lansia');

-- --------------------------------------------------------

--
-- Table structure for table `reff_role`
--

CREATE TABLE IF NOT EXISTS `reff_role` (
  `kd_role` int(11) NOT NULL,
  `ket_role` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reff_role`
--

INSERT INTO `reff_role` (`kd_role`, `ket_role`) VALUES
(1, 'Administrator'),
(2, 'Biro Jasa'),
(3, 'Calon Majikan');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `kd_testimoni` int(11) NOT NULL AUTO_INCREMENT,
  `kd_users` int(11) DEFAULT NULL,
  `isi_testimoni` varchar(0) NOT NULL,
  PRIMARY KEY (`kd_testimoni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `kd_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `kd_role` int(11) NOT NULL,
  PRIMARY KEY (`kd_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
