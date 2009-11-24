-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 24 Nov, 2009 at 11:11 AM
-- Versione MySQL: 5.0.51
-- Versione PHP: 5.2.4-2ubuntu5.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `hotel`
--

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
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `booking`
--


-- --------------------------------------------------------

--
-- Struttura della tabella `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) collate utf8_bin default NULL,
  `surname` varchar(32) collate utf8_bin default NULL,
  `type_document` varchar(32) collate utf8_bin default NULL,
  `number_document` varchar(32) collate utf8_bin default NULL,
  `date_birth` varchar(32) collate utf8_bin default NULL,
  `city_birth` varchar(32) collate utf8_bin default NULL,
  `address` varchar(32) collate utf8_bin default NULL,
  `city` varchar(32) collate utf8_bin default NULL,
  `telephone` varchar(32) collate utf8_bin default NULL,
  `email` varchar(32) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dump dei dati per la tabella `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `type_document`, `number_document`, `date_birth`, `city_birth`, `address`, `city`, `telephone`, `email`) VALUES
(1, 'Stefano', 'Montori', 'patente', 'mooifwikjfhwk', '23-4-1984', 'Bracciano', 'largo s stefano', 'Anguillara S.', '0999888', 'oiuhie@kqjwfd.it'),
(2, 'Massimo', 'Gigli', 'cart', 'nh2244jnjnnn', '20-12-1980', 'Roma', 'varisco', 'Anguillara S.', '06888777', 'hgfhg@jhgu.it'),
(3, 'Max', 'Picchio', 'carta', 'kjhb', '989', 'roma', 'aiiaia', 'kkk', '0999', 'thbtjh');

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
