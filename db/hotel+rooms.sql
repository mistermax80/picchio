-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 18 Nov, 2009 at 11:56 AM
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
  `date_in` varchar(32) collate utf8_bin NOT NULL,
  `date_out` varchar(32) collate utf8_bin NOT NULL,
  `note` text collate utf8_bin,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

-- 
-- Dump dei dati per la tabella `booking`
-- 

INSERT INTO `booking` VALUES (2, 2, 3, 0x32332d342d3039, 0x32332d352d3039, 0xc3a82066726f63696f);
INSERT INTO `booking` VALUES (4, 5, 4, 0x32352d31312d32303039, 0x32342d35352d373839, '');
INSERT INTO `booking` VALUES (5, 6, 1, 0x312d31312d32303039, 0x31312d322d333435, '');
INSERT INTO `booking` VALUES (6, 7, 1, 0x322d31312d32303039, 0x32332d352d32313032, 0x6369616f);
INSERT INTO `booking` VALUES (7, 5, 12, 0x332d31312d32303039, 0x32332d352d32313032, 0x6369616f2062656c6c6f);
INSERT INTO `booking` VALUES (8, 3, 1, 0x31372d31312d32303039, 0x31382d31312d32303039, 0x6d6572636f6c6564c3ac);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `client`
-- 

CREATE TABLE `client` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

-- 
-- Dump dei dati per la tabella `client`
-- 

INSERT INTO `client` VALUES (1, 0x53746566616e6f, 0x4d6f6e746f7269, 0x706174656e7465, 0x6d6f6f696677696b6a6668776b, 0x32332d342d31393834, 0x427261636369616e6f, 0x6c6172676f20732073746566616e6f, 0x416e6775696c6c61726120532e, 0x30393939383838, 0x6f6975686965406b716a7766642e6974);
INSERT INTO `client` VALUES (2, 0x4d617373696d6f, 0x4769676c69, 0x63617274, 0x6e68323234346a6e6a6e6e6e, 0x32302d31322d31393830, 0x526f6d61, 0x7661726973636f, 0x416e6775696c6c61726120532e, 0x3036383838373737, 0x6867666867406a6867752e6974);
INSERT INTO `client` VALUES (3, 0x616c6578, 0x6c6f6d62726f6e69, 0x6e646a6e, 0x6a6e6a6e6b6a, 0x6a6e6c6e6b6a, 0x6a6e6a6e6a, 0x20, 0x20, 0x20, 0x6e);
INSERT INTO `client` VALUES (4, 0x61, 0x61, 0x61, 0x61, 0x61, '', 0x61, 0x61, 0x61, 0x61);
INSERT INTO `client` VALUES (5, 0x62, 0x62, 0x6262, 0x62, 0x62, 0x62, 0x62, 0x62, 0x626262, 0x6262);
INSERT INTO `client` VALUES (6, 0x63, 0x6363, 0x63, 0x63, 0x63, 0x63, '', '', 0x636363, 0x63);
INSERT INTO `client` VALUES (7, 0x73, 0x73, 0x73, 0x73, 0x73, 0x73, 0x73, '', '', '');

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
-- Struttura della tabella `room`
-- 

CREATE TABLE `room` (
  `id` int(11) NOT NULL auto_increment,
  `type` enum('singola','doppia','matrimoniale','tripla','quadrupla') collate utf8_bin NOT NULL,
  `description` varchar(32) collate utf8_bin NOT NULL,
  `price` varchar(32) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

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
