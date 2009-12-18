-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 18 Dic, 2009 at 01:37 PM
-- Versione MySQL: 5.0.51
-- Versione PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `hotel`
-- 

-- --------------------------------------------------------

-- 
-- Struttura della tabella `account`
-- 

CREATE TABLE `account` (
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

CREATE TABLE `booking` (
  `id` int(11) NOT NULL auto_increment,
  `client` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `date_in` timestamp NOT NULL default '0000-00-00 00:00:00',
  `date_out` timestamp NOT NULL default '0000-00-00 00:00:00',
  `number_client` int(11) NOT NULL,
  `note` text collate utf8_bin,
  `timeStamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=32 ;

-- 
-- Dump dei dati per la tabella `booking`
-- 

INSERT INTO `booking` VALUES (24, 1, 1, '2009-12-16 00:00:00', '2009-12-18 00:00:00', 0, '', '2009-12-04 15:46:26');
INSERT INTO `booking` VALUES (31, 1, 4, '2009-12-01 00:00:00', '2009-12-02 00:00:00', 1, '', '2009-12-16 15:42:48');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `client`
-- 

CREATE TABLE `client` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- 
-- Dump dei dati per la tabella `client`
-- 

INSERT INTO `client` VALUES (1, 'Stefano', 'Montori', 0x706174656e7465, 0x6166667277666a7568, 0x31322d33342d353637, 0x627261636369616e6f, 0x73616e746f2073746566616e6f, 0x616e6775696c6c617261, 0x303938363635343632, 0x6466776566406c696265726f);
INSERT INTO `client` VALUES (16, 'Massimo', 'Picchio', 0x6d6d, 0x6f6b6a756e6b6c, 0x6a, 0x6e6b, 0x6a6e, 0x6b6a, 0x6e6b, 0x6a6e);
INSERT INTO `client` VALUES (17, 'visitatore', 'visitatore', '', '', '', '', 0x726f6d6120657572, '', '', '');
INSERT INTO `client` VALUES (18, 'visitatore2', 'visitatore2', '', '', '', '', '', 0x616e6775696c6c617261, '', '');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `optional`
-- 

CREATE TABLE `optional` (
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

CREATE TABLE `report` (
  `id` int(11) NOT NULL auto_increment,
  `booking` varchar(32) collate utf8_bin NOT NULL,
  `path` varchar(256) collate utf8_bin NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `send` tinyint(4) default NULL,
  `date_send` timestamp NULL default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=160 ;

-- 
-- Dump dei dati per la tabella `report`
-- 

INSERT INTO `report` VALUES (158, 0x5069636368696f, 0x2e2e2e2e646120696e7365726972652070696b6b696f2e2e2e, '2009-12-04 14:15:00', NULL, NULL);
INSERT INTO `report` VALUES (159, 0x5069636368696f, 0x2e2e2e2e646120696e7365726972652070696b6b696f2e2e2e, '2009-12-04 15:49:30', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `room`
-- 

CREATE TABLE `room` (
  `id` int(11) NOT NULL auto_increment,
  `type` enum('singola','doppia','matrimoniale','tripla','quadrupla') collate utf8_bin NOT NULL,
  `description` varchar(32) collate utf8_bin NOT NULL,
  `price` varchar(32) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

-- 
-- Dump dei dati per la tabella `room`
-- 

INSERT INTO `room` VALUES (1, 0x646f70706961, '', 0x3635);
INSERT INTO `room` VALUES (2, 0x747269706c61, '', 0x3830);
INSERT INTO `room` VALUES (3, 0x717561647275706c61, '', 0x3930);
INSERT INTO `room` VALUES (4, 0x747269706c61, '', 0x3830);
INSERT INTO `room` VALUES (5, 0x6d617472696d6f6e69616c65, '', 0x3735);
INSERT INTO `room` VALUES (6, 0x6d617472696d6f6e69616c65, '', 0x3735);
INSERT INTO `room` VALUES (7, 0x6d617472696d6f6e69616c65, '', 0x3735);
INSERT INTO `room` VALUES (8, 0x6d617472696d6f6e69616c65, '', 0x3735);
INSERT INTO `room` VALUES (9, 0x6d617472696d6f6e69616c65, '', 0x3735);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `visitor`
-- 

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL auto_increment,
  `id_booking` int(11) NOT NULL,
  `id_client` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

-- 
-- Dump dei dati per la tabella `visitor`
-- 

INSERT INTO `visitor` VALUES (8, 31, 17);
