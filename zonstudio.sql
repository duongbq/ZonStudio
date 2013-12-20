/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : zonstudio

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2013-12-08 17:49:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for album
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_caption` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------

-- ----------------------------
-- Table structure for file
-- ----------------------------
DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `package_id` int(11) DEFAULT '0' COMMENT 'its value is zero if this file is a photo.. Otherwise, is photo of package',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for package
-- ----------------------------
DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of package
-- ----------------------------

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `photo_caption` varchar(255) DEFAULT NULL,
  `photo_summary` varchar(255) DEFAULT NULL,
  `description` text,
  `file_id` int(11) DEFAULT NULL,
  `is_slide` tinyint(1) DEFAULT NULL,
  `is_product` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo
-- ----------------------------

-- ----------------------------
-- Table structure for photo_tag
-- ----------------------------
DROP TABLE IF EXISTS `photo_tag`;
CREATE TABLE `photo_tag` (
  `photo_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo_tag
-- ----------------------------

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` longtext NOT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `setting_key` (`setting_key`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'default_language', 'english');
INSERT INTO `settings` VALUES ('2', 'date_format', 'm/d/Y');
INSERT INTO `settings` VALUES ('3', 'currency_symbol', '$');
INSERT INTO `settings` VALUES ('4', 'currency_symbol_placement', 'before');
INSERT INTO `settings` VALUES ('5', 'invoices_due_after', '30');
INSERT INTO `settings` VALUES ('6', 'quotes_expire_after', '15');
INSERT INTO `settings` VALUES ('7', 'default_invoice_group', '1');
INSERT INTO `settings` VALUES ('8', 'default_quote_group', '2');
INSERT INTO `settings` VALUES ('9', 'thousands_separator', ',');
INSERT INTO `settings` VALUES ('10', 'decimal_point', '.');
INSERT INTO `settings` VALUES ('11', 'cron_key', 'z6pA2XZupB2MNko9');
INSERT INTO `settings` VALUES ('12', 'tax_rate_decimal_places', '2');
INSERT INTO `settings` VALUES ('13', 'pdf_invoice_template', 'default');
INSERT INTO `settings` VALUES ('14', 'pdf_invoice_template_paid', 'default');
INSERT INTO `settings` VALUES ('15', 'pdf_invoice_template_overdue', 'default');
INSERT INTO `settings` VALUES ('16', 'pdf_quote_template', 'default');
INSERT INTO `settings` VALUES ('17', 'public_invoice_template', 'default');
INSERT INTO `settings` VALUES ('18', 'public_quote_template', 'default');

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tag
-- ----------------------------
