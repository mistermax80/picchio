-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 03 Dic, 2009 at 04:10 PM
-- Versione MySQL: 5.0.51
-- Versione PHP: 5.2.4-2ubuntu5.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `hotel`
--
-- CREATE DATABASE `hotel` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
-- USE `hotel`;

-- --------------------------------------------------------

--
-- Struttura della tabella `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(32) collate utf8_bin NOT NULL,
  `password` varchar(32) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `account`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL auto_increment,
  `client` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `date_in` timestamp NOT NULL default '0000-00-00 00:00:00',
  `date_out` timestamp NOT NULL default '0000-00-00 00:00:00',
  `note` text collate utf8_bin,
  `timeStamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `booking`
--

INSERT INTO `booking` (`id`, `client`, `room`, `date_in`, `date_out`, `note`, `timeStamp`) VALUES
(16, 16, 6, '0000-00-00 00:00:00', '2009-12-13 00:00:00', '', '2009-12-03 16:00:23'),
(15, 16, 4, '2009-12-05 00:00:00', '2009-12-02 00:00:00', '', '2009-12-03 13:13:40'),
(14, 1, 4, '2009-12-04 00:00:00', '2009-12-05 00:00:00', '', '2009-12-03 13:12:48'),
(13, 1, 4, '2009-12-03 00:00:00', '2009-12-04 00:00:00', '', '2009-12-03 12:56:20');

-- --------------------------------------------------------

--
-- Struttura della tabella `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) collate utf8_unicode_ci default NULL,
  `surname` varchar(32) collate utf8_unicode_ci default NULL,
  `type_document` varchar(32) character set utf8 collate utf8_bin default NULL,
  `number_document` varchar(32) character set utf8 collate utf8_bin default NULL,
  `date_birth` varchar(32) character set utf8 collate utf8_bin default NULL,
  `city_birth` varchar(32) character set utf8 collate utf8_bin default NULL,
  `address` varchar(32) character set utf8 collate utf8_bin default NULL,
  `city` varchar(32) character set utf8 collate utf8_bin default NULL,
  `telephone` varchar(32) character set utf8 collate utf8_bin default NULL,
  `email` varchar(32) character set utf8 collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `type_document`, `number_document`, `date_birth`, `city_birth`, `address`, `city`, `telephone`, `email`) VALUES
(1, 'Stefano', 'Montori', 'patente', 'mooifwikjfhwk', '23-4-1984', 'Bracciano', 'largo s stefano', 'Anguillara S.', '0999888', 'oiuhie@kqjwfd.it'),
(16, 'Massimo', 'Picchio', 'mm', 'okjunkl', 'j', 'nk', 'jn', 'kj', 'nk', 'jn');

-- --------------------------------------------------------

--
-- Struttura della tabella `optional`
--

CREATE TABLE IF NOT EXISTS `optional` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) collate utf8_bin NOT NULL,
  `description` varchar(32) collate utf8_bin default NULL,
  `price` varchar(32) collate utf8_bin default NULL,
  `booking` varchar(32) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `optional`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL auto_increment,
  `booking` int(11) NOT NULL,
  `path` varchar(256) collate utf8_bin NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `send` tinyint(4) default NULL,
  `date_send` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=149 ;

--
-- Dump dei dati per la tabella `report`
--

INSERT INTO `report` (`id`, `booking`, `path`, `date`, `send`, `date_send`) VALUES
(1, 0, 'report/Report_Sintetico-2009-08-25 13:13:47.csv', '2009-08-25 13:13:47', NULL, NULL),
(2, 0, 'report/Report_Gioraliero-2009-08-25 13:13:47.txt', '2009-08-25 13:13:47', NULL, NULL),
(3, 0, 'report/Report_Sintetico-2009-08-25 14:28:25.csv', '2009-08-25 14:28:26', NULL, NULL),
(4, 0, 'report/Report_Gioraliero-2009-08-25 14:28:26.txt', '2009-08-25 14:28:26', NULL, NULL),
(5, 0, 'report/Report_Sintetico-2009-08-25 14:33:42.csv', '2009-08-25 14:33:42', NULL, NULL),
(6, 0, 'report/Report_Gioraliero-2009-08-25 14:33:42.txt', '2009-08-25 14:33:42', NULL, NULL),
(7, 0, 'report/Report_Sintetico-2009-08-25 14:44:54.csv', '2009-08-25 14:44:54', NULL, NULL),
(8, 0, 'report/Report_Gioraliero-2009-08-25 14:44:54.txt', '2009-08-25 14:44:54', NULL, NULL),
(9, 0, 'report/Report_Sintetico-2009-08-25 16:32:09.csv', '2009-08-25 16:32:09', NULL, NULL),
(10, 0, 'report/Report_Gioraliero-2009-08-25 16:32:09.txt', '2009-08-25 16:32:09', NULL, NULL),
(11, 0, 'report/Report_Sintetico-2009-08-25 16:34:37.csv', '2009-08-25 16:34:37', NULL, NULL),
(12, 0, 'report/Report_Gioraliero-2009-08-25 16:34:37.txt', '2009-08-25 16:34:37', NULL, NULL),
(13, 0, 'report/Report_Sintetico-2009-08-25 18:13:52.csv', '2009-08-25 18:13:53', NULL, NULL),
(14, 0, 'report/Report_Gioraliero-2009-08-25 18:13:53.txt', '2009-08-25 18:13:53', NULL, NULL),
(15, 0, 'report/Report_Sintetico-2009-08-25 18:15:01.csv', '2009-08-25 18:15:01', NULL, NULL),
(16, 0, 'report/Report_Gioraliero-2009-08-25 18:15:01.txt', '2009-08-25 18:15:01', NULL, NULL),
(17, 0, 'report/Report_Sintetico-2009-08-25 18:23:48.csv', '2009-08-25 18:23:49', NULL, NULL),
(18, 0, 'report/Report_Gioraliero-2009-08-25 18:23:49.txt', '2009-08-25 18:23:49', NULL, NULL),
(19, 0, 'report/Report_Sintetico-2009-08-25 19:45:51.csv', '2009-08-25 19:45:51', NULL, NULL),
(20, 0, 'report/Report_Gioraliero-2009-08-25 19:45:51.txt', '2009-08-25 19:45:51', NULL, NULL),
(21, 0, 'report/Report_Sintetico-2009-08-26 10:13:49.csv', '2009-08-26 10:13:49', NULL, NULL),
(22, 0, 'report/Report_Gioraliero-2009-08-26 10:13:49.txt', '2009-08-26 10:13:49', NULL, NULL),
(23, 0, 'report/Report_Sintetico-2009-08-26 12:54:56.csv', '2009-08-26 12:54:56', NULL, NULL),
(24, 0, 'report/Report_Gioraliero-2009-08-26 12:54:56.txt', '2009-08-26 12:54:56', NULL, NULL),
(25, 0, 'report/Report_Sintetico-2009-08-26 13:00:48.csv', '2009-08-26 13:00:48', NULL, NULL),
(26, 0, 'report/Report_Gioraliero-2009-08-26 13:00:48.txt', '2009-08-26 13:00:48', NULL, NULL),
(27, 0, 'report/Report_Anagrafica-2009-08-26 13:46:24.csv', '2009-08-26 13:46:24', NULL, NULL),
(28, 0, 'report/Report_Sintetico-2009-08-26 16:17:55.csv', '2009-08-26 16:17:55', NULL, NULL),
(29, 0, 'report/Report_Gioraliero-2009-08-26 16:17:55.txt', '2009-08-26 16:17:55', NULL, NULL),
(30, 0, 'report/Report_Sintetico-2009-08-26 16:20:47.csv', '2009-08-26 16:20:47', NULL, NULL),
(31, 0, 'report/Report_Gioraliero-2009-08-26 16:20:47.txt', '2009-08-26 16:20:47', NULL, NULL),
(32, 0, 'report/Report_Sintetico-2009-08-26 16:55:25.csv', '2009-08-26 16:55:25', NULL, NULL),
(33, 0, 'report/Report_Gioraliero-2009-08-26 16:55:25.txt', '2009-08-26 16:55:25', NULL, NULL),
(34, 0, 'report/Report_Sintetico-2009-08-26 17:00:35.csv', '2009-08-26 17:00:35', NULL, NULL),
(35, 0, 'report/Report_Gioraliero-2009-08-26 17:00:35.txt', '2009-08-26 17:00:35', NULL, NULL),
(36, 0, 'report/Report_Sintetico-2009-08-26 18:31:02.csv', '2009-08-26 18:31:03', NULL, NULL),
(37, 0, 'report/Report_Gioraliero-2009-08-26 18:31:03.txt', '2009-08-26 18:31:03', NULL, NULL),
(38, 0, 'report/Report_Sintetico-2009-08-26 19:47:31.csv', '2009-08-26 19:47:31', NULL, NULL),
(39, 0, 'report/Report_Gioraliero-2009-08-26 19:47:31.txt', '2009-08-26 19:47:31', NULL, NULL),
(40, 0, 'report/Report_Sintetico-2009-08-27 08:10:24.csv', '2009-08-27 08:10:24', NULL, NULL),
(41, 0, 'report/Report_Gioraliero-2009-08-27 08:10:24.txt', '2009-08-27 08:10:24', NULL, NULL),
(42, 0, 'report/Report_Sintetico-2009-08-27 08:40:23.csv', '2009-08-27 08:40:23', NULL, NULL),
(43, 0, 'report/Report_Gioraliero-2009-08-27 08:40:23.txt', '2009-08-27 08:40:23', NULL, NULL),
(44, 0, 'report/Report_Sintetico-2009-08-27 09:13:00.csv', '2009-08-27 09:13:01', NULL, NULL),
(45, 0, 'report/Report_Gioraliero-2009-08-27 09:13:01.txt', '2009-08-27 09:13:01', NULL, NULL),
(46, 0, 'report/Report_Sintetico-2009-08-27 11:38:16.csv', '2009-08-27 11:38:16', NULL, NULL),
(47, 0, 'report/Report_Gioraliero-2009-08-27 11:38:16.txt', '2009-08-27 11:38:16', NULL, NULL),
(48, 0, 'report/Report_Sintetico-2009-08-27 13:37:37.csv', '2009-08-27 13:37:37', NULL, NULL),
(49, 0, 'report/Report_Gioraliero-2009-08-27 13:37:37.txt', '2009-08-27 13:37:37', NULL, NULL),
(50, 0, 'report/Report_Sintetico-2009-08-27 15:00:49.csv', '2009-08-27 15:00:50', NULL, NULL),
(51, 0, 'report/Report_Gioraliero-2009-08-27 15:00:50.txt', '2009-08-27 15:00:50', NULL, NULL),
(52, 0, 'report/Report_Sintetico-2009-08-27 19:48:23.csv', '2009-08-27 19:48:23', NULL, NULL),
(53, 0, 'report/Report_Gioraliero-2009-08-27 19:48:23.txt', '2009-08-27 19:48:23', NULL, NULL),
(54, 0, 'report/Report_Sintetico-2009-08-28 07:57:14.csv', '2009-08-28 07:57:14', NULL, NULL),
(55, 0, 'report/Report_Gioraliero-2009-08-28 07:57:14.txt', '2009-08-28 07:57:14', NULL, NULL),
(56, 0, 'report/Report_Sintetico-2009-08-28 11:04:22.csv', '2009-08-28 11:04:22', NULL, NULL),
(57, 0, 'report/Report_Gioraliero-2009-08-28 11:04:22.txt', '2009-08-28 11:04:22', NULL, NULL),
(58, 0, 'report/Report_Sintetico-2009-08-28 11:43:42.csv', '2009-08-28 11:43:43', NULL, NULL),
(59, 0, 'report/Report_Gioraliero-2009-08-28 11:43:43.txt', '2009-08-28 11:43:43', NULL, NULL),
(60, 0, 'report/Report_Sintetico-2009-08-28 12:50:11.csv', '2009-08-28 12:50:12', NULL, NULL),
(61, 0, 'report/Report_Gioraliero-2009-08-28 12:50:12.txt', '2009-08-28 12:50:12', NULL, NULL),
(62, 0, 'report/Report_Sintetico-2009-08-28 12:51:04.csv', '2009-08-28 12:51:04', NULL, NULL),
(63, 0, 'report/Report_Gioraliero-2009-08-28 12:51:04.txt', '2009-08-28 12:51:04', NULL, NULL),
(64, 0, 'report/Report_Sintetico-2009-08-28 13:24:14.csv', '2009-08-28 13:24:15', NULL, NULL),
(65, 0, 'report/Report_Gioraliero-2009-08-28 13:24:15.txt', '2009-08-28 13:24:15', NULL, NULL),
(66, 0, 'report/Report_Sintetico-2009-08-29 10:40:29.csv', '2009-08-29 10:40:29', NULL, NULL),
(67, 0, 'report/Report_Gioraliero-2009-08-29 10:40:29.txt', '2009-08-29 10:40:29', NULL, NULL),
(68, 0, 'report/Report_Sintetico-2009-08-29 10:41:01.csv', '2009-08-29 10:41:01', NULL, NULL),
(69, 0, 'report/Report_Gioraliero-2009-08-29 10:41:01.txt', '2009-08-29 10:41:01', NULL, NULL),
(70, 0, 'report/Report_Sintetico-2009-08-29 10:59:50.csv', '2009-08-29 10:59:50', NULL, NULL),
(71, 0, 'report/Report_Gioraliero-2009-08-29 10:59:50.txt', '2009-08-29 10:59:50', NULL, NULL),
(72, 0, 'report/Report_Anagrafica-2009-08-31 15:25:43.csv', '2009-08-31 15:25:43', NULL, NULL),
(73, 0, 'report/Report_Sintetico-2009-08-31 16:59:19.csv', '2009-08-31 16:59:20', NULL, NULL),
(74, 0, 'report/Report_Gioraliero-2009-08-31 16:59:20.txt', '2009-08-31 16:59:20', NULL, NULL),
(75, 0, 'report/Report_Sintetico-2009-08-31 19:37:42.csv', '2009-08-31 19:37:42', NULL, NULL),
(76, 0, 'report/Report_Gioraliero-2009-08-31 19:37:42.txt', '2009-08-31 19:37:42', NULL, NULL),
(77, 0, 'report/Report_Sintetico-2009-09-01 14:33:25.csv', '2009-09-01 14:33:26', NULL, NULL),
(78, 0, 'report/Report_Gioraliero-2009-09-01 14:33:26.txt', '2009-09-01 14:33:26', NULL, NULL),
(79, 0, 'report/Report_Anagrafica-2009-09-01 16:21:07.csv', '2009-09-01 16:21:07', NULL, NULL),
(80, 0, 'report/Report_Sintetico-2009-09-01 18:37:16.csv', '2009-09-01 18:37:17', NULL, NULL),
(81, 0, 'report/Report_Gioraliero-2009-09-01 18:37:17.txt', '2009-09-01 18:37:17', NULL, NULL),
(82, 0, 'report/Report_Sintetico-2009-09-01 19:24:55.csv', '2009-09-01 19:24:56', NULL, NULL),
(83, 0, 'report/Report_Gioraliero-2009-09-01 19:24:56.txt', '2009-09-01 19:24:56', NULL, NULL),
(84, 0, 'report/Report_Sintetico-2009-09-01 19:39:52.csv', '2009-09-01 19:39:52', NULL, NULL),
(85, 0, 'report/Report_Gioraliero-2009-09-01 19:39:52.txt', '2009-09-01 19:39:52', NULL, NULL),
(86, 0, 'report/Report_Anagrafica-2009-09-02 08:22:24.csv', '2009-09-02 08:22:24', NULL, NULL),
(87, 0, 'report/Report_Sintetico-2009-09-02 18:49:12.csv', '2009-09-02 18:49:14', NULL, NULL),
(88, 0, 'report/Report_Gioraliero-2009-09-02 18:49:14.txt', '2009-09-02 18:49:14', NULL, NULL),
(89, 0, 'report/Report_Sintetico-2009-09-02 18:49:14.csv', '2009-09-02 18:49:14', NULL, NULL),
(90, 0, 'report/Report_Gioraliero-2009-09-02 18:49:14.txt', '2009-09-02 18:49:14', NULL, NULL),
(91, 0, 'report/Report_Sintetico-2009-09-02 19:41:22.csv', '2009-09-02 19:41:23', NULL, NULL),
(92, 0, 'report/Report_Gioraliero-2009-09-02 19:41:23.txt', '2009-09-02 19:41:23', NULL, NULL),
(93, 0, 'report/Report_Anagrafica-2009-09-03 08:21:28.csv', '2009-09-03 08:21:28', NULL, NULL),
(94, 0, 'report/Report_Sintetico-2009-09-03 13:12:44.csv', '2009-09-03 13:12:46', NULL, NULL),
(95, 0, 'report/Report_Gioraliero-2009-09-03 13:12:46.txt', '2009-09-03 13:12:46', NULL, NULL),
(96, 0, 'report/Report_Sintetico-2009-09-03 13:12:50.csv', '2009-09-03 13:12:50', NULL, NULL),
(97, 0, 'report/Report_Gioraliero-2009-09-03 13:12:50.txt', '2009-09-03 13:12:50', NULL, NULL),
(98, 0, 'report/Report_Sintetico-2009-09-03 13:59:48.csv', '2009-09-03 13:59:49', NULL, NULL),
(99, 0, 'report/Report_Gioraliero-2009-09-03 13:59:49.txt', '2009-09-03 13:59:49', NULL, NULL),
(100, 0, 'report/Report_Sintetico-2009-09-03 15:12:41.csv', '2009-09-03 15:12:43', NULL, NULL),
(101, 0, 'report/Report_Gioraliero-2009-09-03 15:12:43.txt', '2009-09-03 15:12:43', NULL, NULL),
(102, 0, 'report/Report_Sintetico-2009-09-03 15:12:43.csv', '2009-09-03 15:12:43', NULL, NULL),
(103, 0, 'report/Report_Gioraliero-2009-09-03 15:12:43.txt', '2009-09-03 15:12:43', NULL, NULL),
(104, 0, 'report/Report_Sintetico-2009-09-03 19:43:55.csv', '2009-09-03 19:43:58', NULL, NULL),
(105, 0, 'report/Report_Gioraliero-2009-09-03 19:43:58.txt', '2009-09-03 19:43:58', NULL, NULL),
(106, 0, 'report/Report_Anagrafica-2009-09-04 08:23:57.csv', '2009-09-04 08:23:57', NULL, NULL),
(107, 0, 'report/Report_Anagrafica-2009-09-04 14:20:46.csv', '2009-09-04 14:20:46', NULL, NULL),
(108, 0, 'report/Report_Anagrafica-2009-09-04 15:36:29.csv', '2009-09-04 15:36:29', NULL, NULL),
(109, 0, 'report/Report_Sintetico-2009-09-04 19:44:39.csv', '2009-09-04 19:44:42', NULL, NULL),
(110, 0, 'report/Report_Gioraliero-2009-09-04 19:44:42.txt', '2009-09-04 19:44:42', NULL, NULL),
(111, 0, 'report/Report_Sintetico-2009-09-04 19:44:45.csv', '2009-09-04 19:44:45', NULL, NULL),
(112, 0, 'report/Report_Gioraliero-2009-09-04 19:44:45.txt', '2009-09-04 19:44:45', NULL, NULL),
(113, 0, 'report/Report_Sintetico-2009-09-05 19:22:56.csv', '2009-09-05 19:22:58', NULL, NULL),
(114, 0, 'report/Report_Gioraliero-2009-09-05 19:22:58.txt', '2009-09-05 19:22:58', NULL, NULL),
(115, 0, 'report/Report_Sintetico-2009-09-05 19:24:53.csv', '2009-09-05 19:24:53', NULL, NULL),
(116, 0, 'report/Report_Gioraliero-2009-09-05 19:24:53.txt', '2009-09-05 19:24:53', NULL, NULL),
(117, 0, 'report/Report_Anagrafica-2009-09-07 15:46:40.csv', '2009-09-07 15:46:40', NULL, NULL),
(118, 0, 'report/Report_Sintetico-2009-09-07 19:48:40.csv', '2009-09-07 19:48:43', NULL, NULL),
(119, 0, 'report/Report_Gioraliero-2009-09-07 19:48:43.txt', '2009-09-07 19:48:43', NULL, NULL),
(120, 0, 'report/Report_Sintetico-2009-09-08 19:58:19.csv', '2009-09-08 19:58:22', NULL, NULL),
(121, 0, 'report/Report_Gioraliero-2009-09-08 19:58:22.txt', '2009-09-08 19:58:22', NULL, NULL),
(122, 0, 'report/Report_Sintetico-2009-09-08 19:58:26.csv', '2009-09-08 19:58:26', NULL, NULL),
(123, 0, 'report/Report_Gioraliero-2009-09-08 19:58:26.txt', '2009-09-08 19:58:26', NULL, NULL),
(124, 0, 'report/Report_Anagrafica-2009-09-09 08:40:09.csv', '2009-09-09 08:40:09', NULL, NULL),
(125, 0, 'report/Report_Sintetico-2009-09-09 14:43:05.csv', '2009-09-09 14:43:07', NULL, NULL),
(126, 0, 'report/Report_Gioraliero-2009-09-09 14:43:07.txt', '2009-09-09 14:43:07', NULL, NULL),
(127, 0, 'report/Report_Sintetico-2009-09-09 14:43:10.csv', '2009-09-09 14:43:10', NULL, NULL),
(128, 0, 'report/Report_Gioraliero-2009-09-09 14:43:10.txt', '2009-09-09 14:43:10', NULL, NULL),
(129, 0, 'report/Report_Anagrafica-2009-09-09 15:05:04.csv', '2009-09-09 15:05:04', NULL, NULL),
(130, 0, 'report/Report_Sintetico-2009-09-09 19:54:33.csv', '2009-09-09 19:54:36', NULL, NULL),
(131, 0, 'report/Report_Gioraliero-2009-09-09 19:54:36.txt', '2009-09-09 19:54:36', NULL, NULL),
(132, 0, 'report/Report_Sintetico-2009-09-09 19:54:39.csv', '2009-09-09 19:54:40', NULL, NULL),
(133, 0, 'report/Report_Gioraliero-2009-09-09 19:54:40.txt', '2009-09-09 19:54:40', NULL, NULL),
(134, 0, 'report/Report_Anagrafica-2009-09-10 15:15:47.csv', '2009-09-10 15:15:47', NULL, NULL),
(135, 0, 'report/Report_Sintetico-2009-09-10 19:52:12.csv', '2009-09-10 19:52:14', NULL, NULL),
(136, 0, 'report/Report_Gioraliero-2009-09-10 19:52:14.txt', '2009-09-10 19:52:14', NULL, NULL),
(137, 0, 'report/Report_Sintetico-2009-09-10 19:52:16.csv', '2009-09-10 19:52:16', NULL, NULL),
(138, 0, 'report/Report_Gioraliero-2009-09-10 19:52:16.txt', '2009-09-10 19:52:16', NULL, NULL),
(139, 0, 'report/Report_Anagrafica-2009-09-11 15:14:42.csv', '2009-09-11 15:14:42', NULL, NULL),
(140, 0, 'report/Report_Anagrafica-2009-09-11 15:47:13.csv', '2009-09-11 15:47:13', NULL, NULL),
(141, 0, 'report/Report_Sintetico-2009-09-11 19:42:31.csv', '2009-09-11 19:42:33', NULL, NULL),
(142, 0, 'report/Report_Gioraliero-2009-09-11 19:42:33.txt', '2009-09-11 19:42:33', NULL, NULL),
(143, 0, 'report/Report_Sintetico-2009-09-11 19:42:35.csv', '2009-09-11 19:42:35', NULL, NULL),
(144, 0, 'report/Report_Gioraliero-2009-09-11 19:42:35.txt', '2009-09-11 19:42:35', NULL, NULL),
(145, 0, 'report/Report_Sintetico-2009-09-12 18:50:26.csv', '2009-09-12 18:50:28', NULL, NULL),
(146, 0, 'report/Report_Gioraliero-2009-09-12 18:50:28.txt', '2009-09-12 18:50:28', NULL, NULL),
(147, 0, 'report/Report_Sintetico-2009-09-12 18:50:30.csv', '2009-09-12 18:50:30', NULL, NULL),
(148, 0, 'report/Report_Gioraliero-2009-09-12 18:50:30.txt', '2009-09-12 18:50:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL auto_increment,
  `type` enum('singola','doppia','matrimoniale','tripla','quadrupla') collate utf8_bin NOT NULL,
  `description` varchar(32) collate utf8_bin NOT NULL,
  `price` varchar(32) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dump dei dati per la tabella `room`
--

INSERT INTO `room` (`id`, `type`, `description`, `price`) VALUES
(1, 'doppia', '', '65'),
(2, 'tripla', '', '80'),
(3, 'quadrupla', '', '90'),
(4, 'tripla', '', '80'),
(5, 'matrimoniale', '', '75'),
(6, 'matrimoniale', '', '75'),
(7, 'matrimoniale', '', '75'),
(8, 'matrimoniale', '', '75'),
(9, 'matrimoniale', '', '75');
