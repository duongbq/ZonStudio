-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2013 at 05:39 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fusion_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `fi_clients`
--

CREATE TABLE IF NOT EXISTS `fi_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_date_created` datetime NOT NULL,
  `client_date_modified` datetime NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_address_1` varchar(100) DEFAULT '',
  `client_address_2` varchar(100) DEFAULT '',
  `client_city` varchar(45) DEFAULT '',
  `client_state` varchar(35) DEFAULT '',
  `client_zip` varchar(15) DEFAULT '',
  `client_country` varchar(35) DEFAULT '',
  `client_phone` varchar(20) DEFAULT '',
  `client_fax` varchar(20) DEFAULT '',
  `client_mobile` varchar(20) DEFAULT '',
  `client_email` varchar(100) DEFAULT '',
  `client_web` varchar(100) DEFAULT '',
  `client_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`client_id`),
  KEY `client_active` (`client_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_client_custom`
--

CREATE TABLE IF NOT EXISTS `fi_client_custom` (
  `client_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`client_custom_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_client_notes`
--

CREATE TABLE IF NOT EXISTS `fi_client_notes` (
  `client_note_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `client_note_date` date NOT NULL,
  `client_note` longtext NOT NULL,
  PRIMARY KEY (`client_note_id`),
  KEY `client_id` (`client_id`,`client_note_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_custom_fields`
--

CREATE TABLE IF NOT EXISTS `fi_custom_fields` (
  `custom_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_field_table` varchar(35) NOT NULL,
  `custom_field_label` varchar(64) NOT NULL,
  `custom_field_column` varchar(64) NOT NULL,
  PRIMARY KEY (`custom_field_id`),
  KEY `custom_field_table` (`custom_field_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_email_templates`
--

CREATE TABLE IF NOT EXISTS `fi_email_templates` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_template_title` varchar(255) NOT NULL,
  `email_template_body` longtext NOT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_imports`
--

CREATE TABLE IF NOT EXISTS `fi_imports` (
  `import_id` int(11) NOT NULL AUTO_INCREMENT,
  `import_date` datetime NOT NULL,
  PRIMARY KEY (`import_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_import_details`
--

CREATE TABLE IF NOT EXISTS `fi_import_details` (
  `import_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `import_id` int(11) NOT NULL,
  `import_lang_key` varchar(35) NOT NULL,
  `import_table_name` varchar(35) NOT NULL,
  `import_record_id` int(11) NOT NULL,
  PRIMARY KEY (`import_detail_id`),
  KEY `import_id` (`import_id`,`import_record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoices`
--

CREATE TABLE IF NOT EXISTS `fi_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_group_id` int(11) NOT NULL,
  `invoice_status_id` tinyint(2) NOT NULL DEFAULT '1',
  `invoice_date_created` date NOT NULL,
  `invoice_date_modified` datetime NOT NULL,
  `invoice_date_due` date NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `invoice_terms` longtext NOT NULL,
  `invoice_url_key` char(32) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `invoice_url_key` (`invoice_url_key`),
  KEY `user_id` (`user_id`,`client_id`,`invoice_group_id`,`invoice_date_created`,`invoice_date_due`,`invoice_number`),
  KEY `invoice_status_id` (`invoice_status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoices_recurring`
--

CREATE TABLE IF NOT EXISTS `fi_invoices_recurring` (
  `invoice_recurring_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `recur_start_date` date NOT NULL,
  `recur_end_date` date NOT NULL,
  `recur_frequency` char(2) NOT NULL,
  `recur_next_date` date NOT NULL,
  PRIMARY KEY (`invoice_recurring_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoice_amounts`
--

CREATE TABLE IF NOT EXISTS `fi_invoice_amounts` (
  `invoice_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `invoice_item_subtotal` decimal(10,2) DEFAULT '0.00',
  `invoice_item_tax_total` decimal(10,2) DEFAULT '0.00',
  `invoice_tax_total` decimal(10,2) DEFAULT '0.00',
  `invoice_total` decimal(10,2) DEFAULT '0.00',
  `invoice_paid` decimal(10,2) DEFAULT '0.00',
  `invoice_balance` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`invoice_amount_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `invoice_paid` (`invoice_paid`,`invoice_balance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoice_custom`
--

CREATE TABLE IF NOT EXISTS `fi_invoice_custom` (
  `invoice_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_custom_id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoice_groups`
--

CREATE TABLE IF NOT EXISTS `fi_invoice_groups` (
  `invoice_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_group_name` varchar(50) NOT NULL DEFAULT '',
  `invoice_group_prefix` varchar(10) NOT NULL DEFAULT '',
  `invoice_group_next_id` int(11) NOT NULL,
  `invoice_group_left_pad` int(2) NOT NULL DEFAULT '0',
  `invoice_group_prefix_year` int(1) NOT NULL DEFAULT '0',
  `invoice_group_prefix_month` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`invoice_group_id`),
  KEY `invoice_group_next_id` (`invoice_group_next_id`),
  KEY `invoice_group_left_pad` (`invoice_group_left_pad`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fi_invoice_groups`
--

INSERT INTO `fi_invoice_groups` (`invoice_group_id`, `invoice_group_name`, `invoice_group_prefix`, `invoice_group_next_id`, `invoice_group_left_pad`, `invoice_group_prefix_year`, `invoice_group_prefix_month`) VALUES
(1, 'Invoice Default', '', 1, 0, 0, 0),
(2, 'Quote Default', 'QUO', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoice_items`
--

CREATE TABLE IF NOT EXISTS `fi_invoice_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_tax_rate_id` int(11) NOT NULL DEFAULT '0',
  `item_date_added` date NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` longtext NOT NULL,
  `item_quantity` decimal(10,2) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_order` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`),
  KEY `invoice_id` (`invoice_id`,`item_tax_rate_id`,`item_date_added`,`item_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoice_item_amounts`
--

CREATE TABLE IF NOT EXISTS `fi_invoice_item_amounts` (
  `item_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_subtotal` decimal(10,2) NOT NULL,
  `item_tax_total` decimal(10,2) NOT NULL,
  `item_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_amount_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_invoice_tax_rates`
--

CREATE TABLE IF NOT EXISTS `fi_invoice_tax_rates` (
  `invoice_tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `tax_rate_id` int(11) NOT NULL,
  `include_item_tax` int(1) NOT NULL DEFAULT '0',
  `invoice_tax_rate_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`invoice_tax_rate_id`),
  KEY `invoice_id` (`invoice_id`,`tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_item_lookups`
--

CREATE TABLE IF NOT EXISTS `fi_item_lookups` (
  `item_lookup_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL DEFAULT '',
  `item_description` longtext NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_lookup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_merchant_responses`
--

CREATE TABLE IF NOT EXISTS `fi_merchant_responses` (
  `merchant_response_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `merchant_response_date` date NOT NULL,
  `merchant_response_driver` varchar(35) NOT NULL,
  `merchant_response` varchar(255) NOT NULL,
  `merchant_response_reference` varchar(255) NOT NULL,
  PRIMARY KEY (`merchant_response_id`),
  KEY `merchant_response_date` (`merchant_response_date`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_payments`
--

CREATE TABLE IF NOT EXISTS `fi_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL DEFAULT '0',
  `payment_date` date NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_note` longtext NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `payment_method_id` (`payment_method_id`),
  KEY `payment_amount` (`payment_amount`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_payment_custom`
--

CREATE TABLE IF NOT EXISTS `fi_payment_custom` (
  `payment_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_custom_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_payment_methods`
--

CREATE TABLE IF NOT EXISTS `fi_payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(35) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_quotes`
--

CREATE TABLE IF NOT EXISTS `fi_quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_group_id` int(11) NOT NULL,
  `quote_status_id` tinyint(2) NOT NULL DEFAULT '1',
  `quote_date_created` date NOT NULL,
  `quote_date_modified` datetime NOT NULL,
  `quote_date_expires` date NOT NULL,
  `quote_number` varchar(20) NOT NULL,
  `quote_url_key` char(32) NOT NULL,
  PRIMARY KEY (`quote_id`),
  KEY `user_id` (`user_id`,`client_id`,`invoice_group_id`,`quote_date_created`,`quote_date_expires`,`quote_number`),
  KEY `invoice_id` (`invoice_id`),
  KEY `quote_status_id` (`quote_status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_quote_amounts`
--

CREATE TABLE IF NOT EXISTS `fi_quote_amounts` (
  `quote_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `quote_item_subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quote_item_tax_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quote_tax_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quote_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`quote_amount_id`),
  KEY `quote_id` (`quote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_quote_custom`
--

CREATE TABLE IF NOT EXISTS `fi_quote_custom` (
  `quote_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  PRIMARY KEY (`quote_custom_id`),
  KEY `quote_id` (`quote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_quote_items`
--

CREATE TABLE IF NOT EXISTS `fi_quote_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `item_tax_rate_id` int(11) NOT NULL,
  `item_date_added` date NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` longtext NOT NULL,
  `item_quantity` decimal(10,2) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_order` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`),
  KEY `quote_id` (`quote_id`,`item_date_added`,`item_order`),
  KEY `item_tax_rate_id` (`item_tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_quote_item_amounts`
--

CREATE TABLE IF NOT EXISTS `fi_quote_item_amounts` (
  `item_amount_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `item_tax_total` decimal(10,2) NOT NULL,
  `item_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_amount_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_quote_tax_rates`
--

CREATE TABLE IF NOT EXISTS `fi_quote_tax_rates` (
  `quote_tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `tax_rate_id` int(11) NOT NULL,
  `include_item_tax` int(1) NOT NULL DEFAULT '0',
  `quote_tax_rate_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`quote_tax_rate_id`),
  KEY `quote_id` (`quote_id`),
  KEY `tax_rate_id` (`tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_settings`
--

CREATE TABLE IF NOT EXISTS `fi_settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` longtext NOT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `setting_key` (`setting_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `fi_settings`
--

INSERT INTO `fi_settings` (`setting_id`, `setting_key`, `setting_value`) VALUES
(1, 'default_language', 'english'),
(2, 'date_format', 'm/d/Y'),
(3, 'currency_symbol', '$'),
(4, 'currency_symbol_placement', 'before'),
(5, 'invoices_due_after', '30'),
(6, 'quotes_expire_after', '15'),
(7, 'default_invoice_group', '1'),
(8, 'default_quote_group', '2'),
(9, 'thousands_separator', ','),
(10, 'decimal_point', '.'),
(11, 'cron_key', 'z6pA2XZupB2MNko9'),
(12, 'tax_rate_decimal_places', '2'),
(13, 'pdf_invoice_template', 'default'),
(14, 'pdf_invoice_template_paid', 'default'),
(15, 'pdf_invoice_template_overdue', 'default'),
(16, 'pdf_quote_template', 'default'),
(17, 'public_invoice_template', 'default'),
(18, 'public_quote_template', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `fi_tax_rates`
--

CREATE TABLE IF NOT EXISTS `fi_tax_rates` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_rate_name` varchar(25) NOT NULL,
  `tax_rate_percent` decimal(5,2) NOT NULL,
  PRIMARY KEY (`tax_rate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_users`
--

CREATE TABLE IF NOT EXISTS `fi_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(1) NOT NULL DEFAULT '0',
  `user_date_created` datetime NOT NULL,
  `user_date_modified` datetime NOT NULL,
  `user_name` varchar(100) DEFAULT '',
  `user_company` varchar(100) DEFAULT '',
  `user_address_1` varchar(100) DEFAULT '',
  `user_address_2` varchar(100) DEFAULT '',
  `user_city` varchar(45) DEFAULT '',
  `user_state` varchar(35) DEFAULT '',
  `user_zip` varchar(15) DEFAULT '',
  `user_country` varchar(35) DEFAULT '',
  `user_phone` varchar(20) DEFAULT '',
  `user_fax` varchar(20) DEFAULT '',
  `user_mobile` varchar(20) DEFAULT '',
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_web` varchar(100) DEFAULT '',
  `user_psalt` char(22) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fi_users`
--

INSERT INTO `fi_users` (`user_id`, `user_type`, `user_date_created`, `user_date_modified`, `user_name`, `user_company`, `user_address_1`, `user_address_2`, `user_city`, `user_state`, `user_zip`, `user_country`, `user_phone`, `user_fax`, `user_mobile`, `user_email`, `user_password`, `user_web`, `user_psalt`) VALUES
(1, 1, '2013-12-05 10:23:45', '2013-12-07 16:19:12', 'Bùi Quý Dương', '', 'Nguyễn Sơn', 'Nguyễn Sơn', 'Hà Nội', '', '', '', '', '', '', 'duongbq83@gmail.com', '$2a$10$b11834a909e36a4d32841u/qNC6Xau5sbEe3s.7rFe9/SZHllpJyy', '', 'b11834a909e36a4d328412'),
(2, 1, '2013-12-07 16:20:13', '2013-12-07 16:46:43', 'batluudanh', '', '', '', '', '', '', '', '', '', '', 'batluudanh@zonstudio.com', '$2a$10$95cef8dfedaa682f502f1u0yt33/y0tATXY6BYR34Gqb2inwRLZqm', '', '95cef8dfedaa682f502f11');

-- --------------------------------------------------------

--
-- Table structure for table `fi_user_clients`
--

CREATE TABLE IF NOT EXISTS `fi_user_clients` (
  `user_client_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`user_client_id`),
  KEY `user_id` (`user_id`,`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fi_user_custom`
--

CREATE TABLE IF NOT EXISTS `fi_user_custom` (
  `user_custom_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_custom_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fi_user_custom`
--

INSERT INTO `fi_user_custom` (`user_custom_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fi_versions`
--

CREATE TABLE IF NOT EXISTS `fi_versions` (
  `version_id` int(11) NOT NULL AUTO_INCREMENT,
  `version_date_applied` varchar(14) NOT NULL,
  `version_file` varchar(45) NOT NULL,
  `version_sql_errors` int(2) NOT NULL,
  PRIMARY KEY (`version_id`),
  KEY `version_date_applied` (`version_date_applied`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `fi_versions`
--

INSERT INTO `fi_versions` (`version_id`, `version_date_applied`, `version_file`, `version_sql_errors`) VALUES
(1, '1386213769', '000_1.0.sql', 0),
(2, '1386213770', '001_1.0.1.sql', 0),
(3, '1386213770', '002_1.0.2.sql', 0),
(4, '1386213771', '003_1.0.3.sql', 0),
(5, '1386213771', '004_1.0.4.sql', 0),
(6, '1386213771', '005_1.0.5.sql', 0),
(7, '1386213771', '006_1.0.6.sql', 0),
(8, '1386213771', '007_1.0.7.sql', 0),
(9, '1386213771', '008_1.0.8.sql', 0),
(10, '1386213771', '009_1.0.9.sql', 0),
(11, '1386213771', '010_1.1.0.sql', 0),
(12, '1386213771', '011_1.1.1.sql', 0),
(13, '1386213771', '012_1.1.2.sql', 0),
(14, '1386213771', '013_1.1.3.sql', 0),
(15, '1386213771', '014_1.1.4.sql', 0),
(16, '1386213771', '015_1.1.5.sql', 0),
(17, '1386213771', '016_1.1.6.sql', 0),
(18, '1386213771', '017_1.1.7.sql', 0),
(19, '1386213772', '018_1.1.8.sql', 0),
(20, '1386213772', '019_1.1.9.sql', 0),
(21, '1386213772', '020_1.2.0.sql', 0),
(22, '1386213772', '021_1.2.1.sql', 0),
(23, '1386213772', '022_1.2.2.sql', 0),
(24, '1386213773', '023_1.2.3.sql', 0),
(25, '1386213773', '024_1.2.4.sql', 0),
(26, '1386213773', '025_1.2.5.sql', 0),
(27, '1386213773', '026_1.2.6.sql', 0),
(28, '1386213773', '027_1.2.7.sql', 0),
(29, '1386213773', '028_1.2.8.sql', 0),
(30, '1386213773', '029_1.2.9.sql', 0),
(31, '1386213773', '030_1.3.0.sql', 0),
(32, '1386213773', '031_1.3.1.sql', 0),
(33, '1386213773', '032_1.3.2.sql', 0),
(34, '1386213773', '033_1.3.3.sql', 0),
(35, '1386213773', '034_1.3.4.sql', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
