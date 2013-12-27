-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2013 at 11:18 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_name`, `password`, `is_active`, `first_name`, `last_name`) VALUES
(1, 'duongbq', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Lưu Danh ', 'Bất ');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(45) NOT NULL,
  `uploaded_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_home_display` tinyint(1) DEFAULT '0',
  `home_display_index` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `uploaded_date`, `is_home_display`, `home_display_index`) VALUES
(7, '70bb94cd94138011b624f665de465796.jpg', '2013-12-27 02:31:34', 1, 2),
(8, '73ba2506a96d58539325385fd102aca0.jpg', '2013-12-27 02:31:39', 1, 0),
(9, 'cfce116cc798d8908536829ca4b84a16.jpg', '2013-12-27 02:31:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(45) NOT NULL,
  `nick_name` varchar(45) DEFAULT NULL,
  `description` text,
  `sex` tinyint(1) DEFAULT '0' COMMENT '0~Nu 1~Nam',
  `height` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `body_measure` varchar(45) DEFAULT NULL COMMENT 'Số đo 3 vòng ',
  `trousers_size` varchar(45) DEFAULT NULL COMMENT 'size quần ',
  `shirt_size` varchar(45) DEFAULT NULL COMMENT 'size áo ',
  `shoes_size` varchar(45) DEFAULT NULL,
  `photo_shoot_fee` varchar(45) DEFAULT NULL COMMENT 'Phí chụp hình. Ex: 300K/ca ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `models_files`
--

CREATE TABLE IF NOT EXISTS `models_files` (
  `model_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `is_slide` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`model_id`,`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `package_name` varchar(45) DEFAULT NULL,
  `summary` text,
  `description` text,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages_files`
--

CREATE TABLE IF NOT EXISTS `packages_files` (
  `package_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `is_slide` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`package_id`,`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `summary`, `description`) VALUES
(1, 'Thời trang ', '', ''),
(2, 'Ảnh cưới ', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
