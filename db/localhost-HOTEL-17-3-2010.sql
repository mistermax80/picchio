-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 17 Mar, 2010 at 12:10 PM
-- Versione MySQL: 5.0.51
-- Versione PHP: 5.2.4-2ubuntu5.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `hotel`
--
DROP DATABASE `hotel`;
CREATE DATABASE `hotel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel`;

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
  `number_client` int(11) NOT NULL default '1',
  `note` text collate utf8_bin,
  `timeStamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `booking`
--

INSERT INTO `booking` (`id`, `client`, `room`, `date_in`, `date_out`, `number_client`, `note`, `timeStamp`) VALUES
(1, 2, 2, '2010-02-15 00:00:00', '2010-02-20 00:00:00', 1, '', '2010-02-14 19:47:33');

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
  `release_document_date` varchar(32) collate utf8_unicode_ci default NULL,
  `release_document_to` varchar(32) collate utf8_unicode_ci default NULL,
  `nationality` varchar(32) collate utf8_unicode_ci default NULL,
  `date_birth` varchar(32) character set utf8 collate utf8_bin default NULL,
  `city_birth` varchar(32) character set utf8 collate utf8_bin default NULL,
  `address` varchar(32) character set utf8 collate utf8_bin default NULL,
  `city` varchar(32) character set utf8 collate utf8_bin default NULL,
  `telephone` varchar(32) character set utf8 collate utf8_bin default NULL,
  `email` varchar(32) character set utf8 collate utf8_bin default NULL,
  `relative` int(11) NOT NULL default '0' COMMENT 'id parente sempre client',
  `relationship` varchar(32) collate utf8_unicode_ci default NULL COMMENT 'grado di parentela',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dump dei dati per la tabella `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `type_document`, `number_document`, `release_document_date`, `release_document_to`, `nationality`, `date_birth`, `city_birth`, `address`, `city`, `telephone`, `email`, `relative`, `relationship`) VALUES
(1, 'Massimo', 'Gigli', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
(2, 'Alessandro', 'Gigli', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
(3, 'massimio', 'gigli', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
(4, 'kgjyhfjy', 'gigli', 'hjgf', 'jhg', 'fj', 'hgf', 'jhg', 'fj', 'hgf', 'jh', 'gf', 'jhg', 'fjhgf', 0, ''),
(5, 'rgeg', 'ergw', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
(6, 'dhfhf', 'gjgfjgfjf', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
(7, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, ''),
(8, 'Massimo', 'Gigli', 'cartaIdentita', 'RM988976897', '20-12-2008', 'comune di Roma', 'Italiana', '20-12-1980', 'Roma', 'via Colonnello Varisco', 'Anguillara', '069995882', 'giglimassimo@gmail.com', 0, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `optional`
--

CREATE TABLE IF NOT EXISTS `optional` (
  `id` int(11) NOT NULL auto_increment,
  `id_booking` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `optional`
--

INSERT INTO `optional` (`id`, `id_booking`, `id_product`, `quantity`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) collate utf8_bin NOT NULL,
  `description` varchar(32) collate utf8_bin default NULL,
  `price` varchar(32) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=33 ;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`) VALUES
(1, 'te giallo', '', '3,00'),
(2, 'Caffè', '', '2,00'),
(3, 'Amaro', '', '3,00'),
(4, 'Acqua', '', '2,00'),
(5, 'Anipasto', '', '7,00'),
(6, 'Anipasto', '', '9,00'),
(7, 'Anipasto', '', '10,00'),
(8, 'Primo', '', '7,00'),
(9, 'Primo', '', '8,00'),
(10, 'Primo', '', '9,00'),
(11, 'Secondo', '', '10,00'),
(12, 'Secondo', '', '12,00'),
(13, 'Secondo', '', '14,00'),
(14, 'Contorno', '', '3,00'),
(15, 'Frutta', '', '3,00'),
(16, 'Dolce', '', '3,00'),
(17, 'Vino', '', '7,00'),
(18, 'Vino', '', '10,00'),
(19, 'Vino', '', '13,00'),
(20, 'Birra piccola', '', '2,00'),
(21, 'Birra grande', '', '4,00'),
(22, 'Coca cola grande', '', '3,00'),
(23, 'Coca cola piccola', '', '2,00'),
(30, 'virgola', '', '7,50'),
(29, 'te rosso', '', '3,00'),
(31, 'doppia virgola', '', '0.36'),
(32, 'camomilla', '', '2,00');

-- --------------------------------------------------------

--
-- Struttura della tabella `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL auto_increment,
  `id_client` int(11) NOT NULL,
  `path` varchar(256) collate utf8_bin NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `send` tinyint(4) default NULL,
  `date_send` timestamp NULL default NULL,
  `id_booking` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `report`
--

INSERT INTO `report` (`id`, `id_client`, `path`, `date`, `send`, `date_send`, `id_booking`) VALUES
(1, 2, 'report/notifica-20100214070201.pdf', '2010-02-14 19:48:01', NULL, NULL, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

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

-- --------------------------------------------------------

--
-- Struttura della tabella `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL auto_increment,
  `id_booking` int(11) NOT NULL,
  `id_client` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `visitor`
--

INSERT INTO `visitor` (`id`, `id_booking`, `id_client`) VALUES
(1, 5, 2),
(2, 1, 4);
