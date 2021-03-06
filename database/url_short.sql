
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2015 at 08:20 AM
-- Server version: 10.0.11-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `url_short`
--
CREATE DATABASE url_short;
USE url_short;
-- --------------------------------------------------------

--
-- Table structure for table `o_url`
--

DROP TABLE IF EXISTS `o_url`;
CREATE TABLE IF NOT EXISTS `o_url` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GenURL` varchar(7) DEFAULT NULL,
  `PlainURL` varchar(500) DEFAULT NULL,
  `AddedDate` datetime DEFAULT NULL,
  `AddedIP` varchar(20) DEFAULT NULL,
  `URLOwner` varchar(32) DEFAULT NULL,
  `DeleteFlag` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

-- --------------------------------------------------------

--
-- Table structure for table `o_url_access`
--

DROP TABLE IF EXISTS `o_url_access`;
CREATE TABLE IF NOT EXISTS `o_url_access` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDURL` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `AccessDate` datetime DEFAULT NULL,
  `AccessIP` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2374 ;

-- --------------------------------------------------------

--
-- Table structure for table `o_user`
--

DROP TABLE IF EXISTS `o_user`;
CREATE TABLE IF NOT EXISTS `o_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `DeleteFlag` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
