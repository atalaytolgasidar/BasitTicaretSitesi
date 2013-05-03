-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2013 at 11:00 PM
-- Server version: 5.5.25a-log
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alisveris_vt`
--

-- --------------------------------------------------------

--
-- Table structure for table `sepettb`
--

CREATE TABLE IF NOT EXISTS `sepettb` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KAd` varchar(123) NOT NULL,
  `UrunAd` varchar(123) NOT NULL,
  `Fiyat` varchar(123) NOT NULL,
  `Durum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sepettb`
--

INSERT INTO `sepettb` (`ID`, `KAd`, `UrunAd`, `Fiyat`, `Durum`) VALUES
(1, 'Önay', 'Sprey boya', '12', 1),
(2, 'Önay', 'Sprey boya', '12', 1),
(3, 'Önay', 'Sprey boya', '12', 1),
(4, 'Önay', 'Sprey boya', '12', 1),
(5, 'Önay', 'naneli sakız', '2', 1),
(6, 'Önay', 'naneli sakız', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uruntb`
--

CREATE TABLE IF NOT EXISTS `uruntb` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UrunAd` varchar(123) NOT NULL,
  `Fiyat` varchar(123) NOT NULL,
  `Stok` int(123) NOT NULL,
  `Foto` varchar(123) NOT NULL,
  `Hakkinda` varchar(123) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uruntb`
--

INSERT INTO `uruntb` (`ID`, `UrunAd`, `Fiyat`, `Stok`, `Foto`, `Hakkinda`) VALUES
(1, 'Sprey boya', '12', 443, 'resimler/spray.jpg', 'Sprey boya duvarları boyamak için kullanılır.'),
(3, 'naneli sakız', '2', 565, 'resimler/falim-sakizi_141749.jpg', 'Sakız dişler için yararlıdır.');

-- --------------------------------------------------------

--
-- Table structure for table `uyetb`
--

CREATE TABLE IF NOT EXISTS `uyetb` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ad` varchar(123) NOT NULL,
  `Soyad` varchar(123) NOT NULL,
  `Mail` varchar(123) NOT NULL,
  `Parola` varchar(123) NOT NULL,
  `Tel` varchar(123) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `uyetb`
--

INSERT INTO `uyetb` (`ID`, `Ad`, `Soyad`, `Mail`, `Parola`, `Tel`) VALUES
(1, 'Önay', 'Kıvılcım', 'writer_treak@hotmail.com', '123', '05392580501');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
