-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2011 at 08:24 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jwb_poll`
--

CREATE TABLE IF NOT EXISTS `tbl_jwb_poll` (
  `id_jwb` int(2) NOT NULL AUTO_INCREMENT,
  `id_soal` int(2) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `vote` int(5) NOT NULL,
  PRIMARY KEY (`id_jwb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_jwb_poll`
--

INSERT INTO `tbl_jwb_poll` (`id_jwb`, `id_soal`, `jawaban`, `vote`) VALUES
(1, 1, 'Iya, Ganteng Sekali', 33),
(2, 1, 'Lumayan Ganteng', 11),
(3, 1, 'Imut Banget', 22),
(4, 1, 'Chubby', 27),
(5, 1, 'Unyu-Unyu', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poll`
--

CREATE TABLE IF NOT EXISTS `tbl_poll` (
  `id_soal` int(2) NOT NULL AUTO_INCREMENT,
  `soal` text NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_poll`
--

INSERT INTO `tbl_poll` (`id_soal`, `soal`, `status`) VALUES
(1, 'Apakah menurut anda saya mempunyai wajah yang ganteng dan good looking?', 'Y');
