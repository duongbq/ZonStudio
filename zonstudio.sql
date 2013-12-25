-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2013 at 04:45 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zonstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `last_sign_on` datetime DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_name`, `password`, `is_active`, `last_sign_on`, `first_name`, `last_name`) VALUES
(1, 'zudio', 'e10adc3949ba59abbe56e057f20f883e', 1, '2013-12-08 00:00:00', 'Lưu Danh ', 'Bất ');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `package_id` int(11) DEFAULT '0' COMMENT 'its value is zero if this file is a photo.. Otherwise, is photo of package',
  `is_slide` tinyint(1) DEFAULT '0',
  `uploaded_date` datetime DEFAULT NULL,
  `is_home_display` tinyint(1) DEFAULT '0',
  `home_display_index` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `file_name`, `package_id`, `is_slide`, `uploaded_date`, `is_home_display`, `home_display_index`) VALUES
(17, 'e4d33af0f5d21d2d0d7753fe8b78f26djpg', 0, 0, NULL, 0, 0),
(18, 'ec0c5c6d64221dd58fbc5877b1e3bed1.jpg', 0, 0, NULL, 0, 0),
(19, '8cb9034afd18d8279c6b5b58379d46d8.jpg', 0, 0, NULL, 0, 0),
(20, '019b5aa7b791c50931c48df5e90542a7.jpg', 0, 0, NULL, 0, 0),
(21, '1b23edc39ea081bd3d7db0afdc13c4c4.jpg', 0, 0, NULL, 0, 0),
(22, '3dc74c10229d3321ebd303bbfd35517d.jpg', 0, 0, NULL, 0, 0),
(23, 'adc2ffd3c9167cb3360edb613b9d0d0d.jpg', 0, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  `sex` tinyint(1) DEFAULT '0' COMMENT '0~Nu 1~Nam',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `summary` text,
  `description` text,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `photo_caption` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  `file_id` int(11) DEFAULT NULL,
  `is_slide` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo_tag`
--

CREATE TABLE IF NOT EXISTS `photo_tag` (
  `photo_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `summary`, `description`) VALUES
(1, 'Thời trang ', '', ''),
(2, 'Ảnh cưới ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
