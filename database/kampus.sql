-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2019 at 12:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  PRIMARY KEY (`nim`),
  UNIQUE KEY `nim` (`nim`),
  UNIQUE KEY `nim_2` (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `status`) VALUES
('54416878', 'Muhammad Guruh Ajinugroho', 'aktif'),
('51753868', 'Ayi Imani', 'aktif'),
('51213342', 'Dheo Prasetyo N', 'aktif'),
('52342134', 'Andri Maulana', 'aktif'),
('42765765', 'Yobel Kislew', 'aktif'),
('0001', 'Mas Syamsi', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

DROP TABLE IF EXISTS `matkul`;
CREATE TABLE IF NOT EXISTS `matkul` (
  `kd_matkul` char(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `sks` int(11) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  PRIMARY KEY (`kd_matkul`),
  UNIQUE KEY `kd_matkul` (`kd_matkul`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kd_matkul`, `nama`, `sks`, `status`) VALUES
('17456', 'Algo 1 A', 3, 'aktif'),
('52378', 'PKB', 3, 'aktif'),
('12142', 'Struktur Data', 3, 'aktif'),
('23426', 'Pemrograman Web', 2, 'aktif'),
('22384', 'Bhs Inggris Bisnis', 2, 'aktif'),
('34286', 'Pemrograman Bergerak', 3, 'aktif'),
('23878', 'Desain Grafis', 2, 'aktif'),
('12354', 'Interaksi Manusia Komputer', 3, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_matkul` char(5) NOT NULL,
  `nim` char(8) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `kd_matkul`, `nim`, `nilai`) VALUES
(2, '17456', '51213342', 80),
(3, '23426', '54416878', 60),
(4, '22384', '51753868', 100),
(5, '22384', '54416878', 85),
(6, '12142', '54416878', 75),
(7, '52378', '54416878', 60),
(8, '52378', '0001', 90),
(9, '22384', '52342134', 90),
(10, '12142', '52342134', 70),
(11, '23878', '0001', 80),
(12, '12354', '0001', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(8) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jabatan` enum('admin','mahasiswa') DEFAULT 'mahasiswa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `password`, `jabatan`) VALUES
(1, '11111111', 'admin', 'admin'),
(2, '54416878', '123', 'mahasiswa'),
(3, '51753868', '123', 'mahasiswa'),
(4, '51213342', '123', 'mahasiswa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
