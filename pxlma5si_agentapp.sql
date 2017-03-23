-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2016 at 07:58 AM
-- Server version: 5.6.31-77.0-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pxlma5si_agentapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `lc_agent`
--

CREATE TABLE IF NOT EXISTS `lc_agent` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `agnt_name` varchar(300) NOT NULL,
  `agnt_address` varchar(500) NOT NULL,
  `agnt_city` varchar(200) NOT NULL,
  `agnt_country` varchar(200) NOT NULL,
  `agnt_phone` varchar(15) NOT NULL,
  `agnt_email` varchar(100) NOT NULL,
  `agnt_username` varchar(50) NOT NULL,
  `agntu_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(300) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lc_agent`
--

INSERT INTO `lc_agent` (`Id`, `agnt_name`, `agnt_address`, `agnt_city`, `agnt_country`, `agnt_phone`, `agnt_email`, `agnt_username`, `agntu_id`, `created_at`, `updated_at`, `image`, `status`) VALUES
(2, 'test ', 'kaikhali, kolkata-700052 fghfg', 'kolkata', 'india', '8575675656', 'testagent@gmail.com', 'testagent', 22, '2016-11-10 13:49:01', '2016-11-10 13:49:01', '70323.png', '1'),
(3, 'AMAR PAUL', '59/1 NIRMAL CHANDRA STREET', 'KOLKATA', 'India', '9748085425', 'amarpaul@gmail.com', 'amarpaul12', 23, '2016-11-08 07:23:42', '2016-11-08 07:23:42', '', '1'),
(4, 'Shyamal ghosh', '309 B B Ganguly Street', 'kolkata', 'India', '9331281472', 'shyamal@gmail.com', 'shyamal123', 24, '2016-11-10 11:54:32', '2016-11-10 11:54:32', '', '1'),
(5, 'agent', 'aaaa', 'kolkata', 'india', '5555555555', 'ggg@gmail.com', 'admin', 27, '2016-11-09 06:49:11', '2016-11-09 06:49:11', '', '1'),
(6, 'Jayanta Chatterjee', 'hjsaj ajsah sja sjas ajsajasajshajs', 'kolkata', 'India', '9830229506', 'jayanta.spider@gmail.com', 'jayanta', 28, '2016-11-10 07:38:10', '2016-11-10 07:38:10', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lc_agentfund`
--

CREATE TABLE IF NOT EXISTS `lc_agentfund` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `agnt_id` int(11) NOT NULL,
  `agnt_fund` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `lc_agentfund`
--

INSERT INTO `lc_agentfund` (`Id`, `agnt_id`, `agnt_fund`, `created_at`, `updated_at`) VALUES
(21, 24, 1000, '2016-11-08 08:58:43', '2016-11-08 08:58:43'),
(22, 24, 5000, '2016-11-08 08:59:02', '2016-11-08 08:59:02'),
(23, 23, 10000, '2016-11-08 08:59:13', '2016-11-08 08:59:13'),
(24, 22, 10000, '2016-11-08 08:59:29', '2016-11-08 08:59:29'),
(25, 23, 15000, '2016-11-08 08:59:55', '2016-11-08 08:59:55'),
(26, 24, 12000, '2016-11-08 09:00:06', '2016-11-08 09:00:06'),
(27, 22, 666, '2016-11-09 06:47:06', '2016-11-09 06:47:06'),
(28, 27, 999, '2016-11-09 06:49:11', '2016-11-09 06:49:11'),
(29, 22, 5000, '2016-11-09 07:24:44', '2016-11-09 07:24:44'),
(30, 28, 10000, '2016-11-10 07:38:10', '2016-11-10 07:38:10'),
(31, 28, 100, '2016-11-10 07:38:36', '2016-11-10 07:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `lc_agent_order`
--

CREATE TABLE IF NOT EXISTS `lc_agent_order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `pnr_booking_no` varchar(50) NOT NULL,
  `payment_mode` enum('1','2') NOT NULL,
  `cost_price` float NOT NULL,
  `cc_charges` float NOT NULL,
  `total_amount` float NOT NULL,
  `credit_cardno` varchar(18) NOT NULL,
  `expiry_date` date NOT NULL,
  `card_holdername` varchar(200) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `agntid` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `lc_agent_order`
--

INSERT INTO `lc_agent_order` (`Id`, `pnr_booking_no`, `payment_mode`, `cost_price`, `cc_charges`, `total_amount`, `credit_cardno`, `expiry_date`, `card_holdername`, `status`, `agntid`, `created_at`, `updated_at`) VALUES
(4, '67867856', '1', 6765, 0, 5676, '', '0000-00-00', '', '1', 22, '2016-11-09', '2016-11-09 07:25:31'),
(5, '546456', '2', 456, 43, 345345, '645645654654656', '2018-02-11', 'rgdfsg ertret', '1', 22, '2016-11-05', '2016-11-08 06:53:34'),
(8, '76876876', '1', 6745, 0, 5654, '', '0000-00-00', '', '3', 24, '2016-11-08', '2016-11-09 11:34:37'),
(9, '111111111', '1', 222, 0, 222, '', '0000-00-00', '', '2', 27, '2016-11-07', '2016-11-09 11:51:37'),
(12, '8796786786', '2', 18000, 1234, 19000, '9678768678678678', '2022-03-12', 'ghjghj trtytrytr', '3', 24, '2016-11-09', '2016-11-09 14:37:47'),
(13, '789978978987', '1', 2000, 0, 2000, '', '0000-00-00', '', '1', 24, '2016-11-08', '2016-11-10 06:37:22'),
(14, '8796786867', '1', 786, 0, 786, '', '0000-00-00', '', '1', 24, '2016-11-09', '2016-11-10 06:04:22'),
(15, '76876885675', '2', 4533, 123, 4666, '8976785787686', '2033-11-24', 'fghfg hhfghfgh', '1', 24, '2016-11-09', '2016-11-09 14:44:49'),
(16, '152356320', '1', 1500, 0, 1500, '', '0000-00-00', '', '1', 28, '2016-11-10', '2016-11-10 07:43:49'),
(17, '12536589', '2', 2000, 50, 20050, '1235645645698745', '2016-11-10', 'Jayanta Chatterjee', '3', 28, '2016-11-10', '2016-11-10 10:40:41'),
(18, '45645645645', '1', 123, 0, 123, '', '0000-00-00', '', '1', 22, '2016-11-11', '2016-11-11 07:37:44'),
(19, '76867', '2', 544, 23, 567, '567657657', '2026-11-11', 'trfhtr htrhrthrt', '1', 22, '2016-11-11', '2016-11-11 07:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `lc_migrations`
--

CREATE TABLE IF NOT EXISTS `lc_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lc_migrations`
--

INSERT INTO `lc_migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_200000_create_roles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lc_page`
--

CREATE TABLE IF NOT EXISTS `lc_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagetitle` varchar(800) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(800) NOT NULL,
  `image` varchar(800) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_keyword` varchar(800) NOT NULL,
  `meta_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lc_password_resets`
--

CREATE TABLE IF NOT EXISTS `lc_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lc_role`
--

CREATE TABLE IF NOT EXISTS `lc_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lc_role`
--

INSERT INTO `lc_role` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Root', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2016-07-03 00:39:53', '2016-07-03 00:39:53'),
(2, 'Administrator', 'Full access to create, edit, and update and delete.', '2016-07-03 00:39:53', '2016-07-03 00:39:53'),
(3, 'Editor', 'Ability to create new ones, or edit and update any existing ones.', '2016-07-03 00:39:53', '2016-07-03 00:39:53'),
(4, 'Author', 'somebody who can publish and manage their own posts.', '2016-07-03 00:39:53', '2016-07-03 00:39:53'),
(5, 'User', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-07-03 00:39:53', '2016-07-03 00:39:53'),
(6, 'Agent', 'Create Order', '2016-11-07 18:30:00', '2016-11-07 22:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `lc_users`
--

CREATE TABLE IF NOT EXISTS `lc_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profileimg` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `lc_users`
--

INSERT INTO `lc_users` (`id`, `role_id`, `username`, `name`, `email`, `password`, `profileimg`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 1, 'testadmin', 'test admin', 'testadmin@gmail.com', '$2y$10$QaqKQVk7Sz1gz4xH0RfOKuIIKv9kdW.6p2RGVTPbRI/163Hw.y3RW', '', 'JZ4yvhv7gbrAfzgotGRtZiaTcnzoBPq0S1lOFuGm9MgRTIo0CNuuP9Vzolh7', '2016-10-26 22:41:09', '2016-11-10 13:48:23'),
(22, 6, 'testagent', 'test ', 'testagent@gmail.com', '$2y$10$aq3jkAdA21CvRFas0SXRbOmyVGO.G/QLo7S.MZREjSwmvniQM1Bj2', '', 'OBOK4iug0L5DYLPYNhrx1hEtpPf44iOucYB2MJpnypNA6zXfDQG6ubNIRNR7', '2016-11-08 01:01:07', '2016-11-11 07:46:32'),
(23, 6, 'amarpaul12', 'AMAR PAUL', 'amarpaul@gmail.com', '$2y$10$zD/OZlQjbksv7zGF5cuZPe5sYyYvmjNulcxxxaSlBoTmrnnahK1nS', '', NULL, '2016-11-08 07:23:42', '2016-11-08 07:23:42'),
(24, 6, 'shyamal123', 'Shyamal ghosh', 'shyamal@gmail.com', '$2y$10$wdOVMGTZq2MJ3QAZt71l6.l8bABzcXj2emV.Kv8JatSr3SQYpwvaa', '', 'rPwvM7Y2eE0YCsL6MaLGlUZwKQCGKJJ9IgSGL7aZZTznzAIc0CKYs28cDMJp', '2016-11-08 07:25:17', '2016-11-10 11:59:54'),
(25, 4, 'admin', 'test name', 'example@gmail.com', '$2y$10$NLxEAyb0MJhw4dY8ioKAb.id4bUSJYr1Gnr1Ouee1kfbEOObBzuh2', '', NULL, '2016-11-08 07:29:00', '2016-11-08 07:29:00'),
(26, 2, 'sonju', 'sonju', 'admin@gmail.com', '$2y$10$XqhmOLDCxiTwWkvR.uYkjON4wMWNB9WY5Hrwhe05DShnZv60yR.ey', '', NULL, '2016-11-09 06:28:32', '2016-11-09 06:31:53'),
(27, 6, 'admin', 'agent', 'ggg@gmail.com', '$2y$10$U7FMmaDFSDRSXImH6mlr9.JgFx6nT5yYjI.t.iOdFoqFFplOjfHaG', '', NULL, '2016-11-09 06:49:11', '2016-11-09 06:49:11'),
(28, 6, 'jayanta', 'Jayanta Chatterjee', 'jayanta.spider@gmail.com', '$2y$10$WWvk4wfKtiqIa7gV8I8Zz.XU5U27BJ/EU87F0/dhIvKnzYH5E8D.O', '', 'qJwBGVlkHnV9bgxw8VJi4DNFYLWQoSRFWTxa4IcuFI13KiCBn11jdUzh8WGq', '2016-11-10 07:38:10', '2016-11-10 10:35:47');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
