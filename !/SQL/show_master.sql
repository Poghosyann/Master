-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2018 at 01:33 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `show_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `email`, `password`, `phone`, `name`, `address`, `permission`, `date`) VALUES
(1, 'admin', '555555', '', 'Անդրանիկ հովհաննիսյան', '', '1', '2018-01-25 21:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(150) NOT NULL,
  `title_ru` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(150) NOT NULL,
  `title_ru` varchar(150) NOT NULL,
  `video` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `title_ru` varchar(150) NOT NULL,
  `price` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `title_ru` varchar(150) NOT NULL,
  `descr_en` text NOT NULL,
  `descr_ru` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title_en`, `title_ru`, `descr_en`, `descr_ru`) VALUES
(1, 'about', '', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `photoID` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`photoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

DROP TABLE IF EXISTS `text`;
CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(150) NOT NULL,
  `title_ru` varchar(150) NOT NULL,
  `descr_en` text NOT NULL,
  `descr_ru` text NOT NULL,
  `icon` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
