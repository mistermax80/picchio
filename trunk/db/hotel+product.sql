-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 14 Gen, 2010 at 11:03 AM
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
  `number_client` int(11) default '1',
  `note` text collate utf8_bin,
  `timeStamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=82 ;

-- 
-- Dump dei dati per la tabella `booking`
-- 

INSERT INTO `booking` VALUES (75, 24, 3, '2010-01-04 00:00:00', '2010-01-06 00:00:00', 0, '', '2010-01-12 10:32:50');
INSERT INTO `booking` VALUES (81, 95, 8, '2010-01-04 00:00:00', '2010-01-07 00:00:00', 0, '', '2010-01-13 10:43:40');

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
  `release_document_date` varchar(32) collate utf8_unicode_ci default NULL,
  `release_document_to` varchar(32) collate utf8_unicode_ci default NULL,
  `nationality` varchar(32) collate utf8_unicode_ci default NULL,
  `date_birth` varchar(32) character set utf8 collate utf8_bin default NULL,
  `city_birth` varchar(32) character set utf8 collate utf8_bin default NULL,
  `address` varchar(32) character set utf8 collate utf8_bin default NULL,
  `city` varchar(32) character set utf8 collate utf8_bin default NULL,
  `telephone` varchar(32) character set utf8 collate utf8_bin default NULL,
  `email` varchar(32) character set utf8 collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=98 ;

-- 
-- Dump dei dati per la tabella `client`
-- 

INSERT INTO `client` VALUES (24, 'stefano', 'montori', 0x706174656e7465, 0x6d66776668776f6569, '324324', '', 'romeno', 0x3233343233, 0x627261636369616e6f, 0x73616e746f2073746566616e6f, 0x616e6775696c6c7261, 0x333475333438373839, 0x6a65776b6e66406c696265726f2e6974);
INSERT INTO `client` VALUES (16, 'Massimo', 'Picchio', 0x6d6d, 0x6f6b6a756e6b6c, 'mdkdidfsf', 'rooamd', NULL, 0x6a, 0x6e6b, 0x6a6e, 0x6b6a, 0x6e6b, 0x63616d6269617461);
INSERT INTO `client` VALUES (30, 'michela', 'forti', '', '', '', '', NULL, '', 0x6e657720796f726b, '', '', '', '');
INSERT INTO `client` VALUES (21, 'visitatore', 'visitatore101', '', '', NULL, NULL, NULL, '', 0x6368696361676f, '', 0x726f6d61206f76657374, '', '');
INSERT INTO `client` VALUES (31, 'marco', 'perugini', '', '', NULL, NULL, NULL, '', '', '', '', '', '');
INSERT INTO `client` VALUES (32, 'lida', 'flamini', '', '', NULL, NULL, NULL, '', '', '', '', '', '');
INSERT INTO `client` VALUES (83, 'drako', 'gigli', '', '', NULL, NULL, NULL, 0x3233353533, '', '', '', '', '');
INSERT INTO `client` VALUES (94, '22', 'luigino', '', '', '', '', NULL, '', '', '', '', '', '');
INSERT INTO `client` VALUES (95, 'guiloi', 'd''acquisto', 0x6369, 0x3134323532353533, '32545', 'comune', NULL, 0x323433323535, 0x726f6d61, 0x666e666c77726e67666e77, 0x6a65666e656a776e66656b, '', '');
INSERT INTO `client` VALUES (96, 'pallino', 'pinco', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `client` VALUES (97, '', 'parola', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Struttura della tabella `optional`
-- 

CREATE TABLE `optional` (
  `id` int(11) NOT NULL auto_increment,
  `id_booking` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=53 ;

-- 
-- Dump dei dati per la tabella `optional`
-- 

INSERT INTO `optional` VALUES (44, 70, 1, 1);
INSERT INTO `optional` VALUES (50, 77, 1, 2);
INSERT INTO `optional` VALUES (49, 78, 1, 2);
INSERT INTO `optional` VALUES (48, 78, 1, 4);
INSERT INTO `optional` VALUES (51, 77, 6, 1);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `product`
-- 

CREATE TABLE `product` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) collate utf8_bin NOT NULL,
  `description` varchar(32) collate utf8_bin default NULL,
  `price` varchar(32) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=29 ;

-- 
-- Dump dei dati per la tabella `product`
-- 

INSERT INTO `product` VALUES (1, 0x7465206769616c6c6f, '', 0x332c3030);
INSERT INTO `product` VALUES (2, 0x43616666c3a8, '', 0x322c3030);
INSERT INTO `product` VALUES (3, 0x416d61726f, '', 0x332c3030);
INSERT INTO `product` VALUES (4, 0x4163717561, '', 0x322c3030);
INSERT INTO `product` VALUES (5, 0x416e69706173746f, '', 0x372c3030);
INSERT INTO `product` VALUES (6, 0x416e69706173746f, '', 0x382c3030);
INSERT INTO `product` VALUES (7, 0x416e69706173746f, '', 0x31302c3030);
INSERT INTO `product` VALUES (8, 0x5072696d6f, '', 0x372c3030);
INSERT INTO `product` VALUES (9, 0x5072696d6f, '', 0x382c3030);
INSERT INTO `product` VALUES (10, 0x5072696d6f, '', 0x392c3030);
INSERT INTO `product` VALUES (11, 0x5365636f6e646f, '', 0x31302c3030);
INSERT INTO `product` VALUES (12, 0x5365636f6e646f, '', 0x31322c3030);
INSERT INTO `product` VALUES (13, 0x5365636f6e646f, '', 0x31342c3030);
INSERT INTO `product` VALUES (14, 0x436f6e746f726e6f, '', 0x332c3030);
INSERT INTO `product` VALUES (15, 0x467275747461, '', 0x332c3030);
INSERT INTO `product` VALUES (16, 0x446f6c6365, '', 0x332c3030);
INSERT INTO `product` VALUES (17, 0x56696e6f, '', 0x372c3030);
INSERT INTO `product` VALUES (18, 0x56696e6f, '', 0x31302c3030);
INSERT INTO `product` VALUES (19, 0x56696e6f, '', 0x31332c3030);
INSERT INTO `product` VALUES (20, 0x426972726120706963636f6c61, '', 0x322c3030);
INSERT INTO `product` VALUES (21, 0x4269727261206772616e6465, '', 0x342c3030);
INSERT INTO `product` VALUES (22, 0x436f636120636f6c61206772616e6465, '', 0x332c3030);
INSERT INTO `product` VALUES (23, 0x436f636120636f6c6120706963636f6c61, '', 0x322c3030);

-- --------------------------------------------------------

-- 
-- Struttura della tabella `report`
-- 

CREATE TABLE `report` (
  `id` int(11) NOT NULL auto_increment,
  `id_client` int(11) NOT NULL,
  `path` varchar(256) collate utf8_bin NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `send` tinyint(4) default NULL,
  `date_send` timestamp NULL default NULL,
  `id_booking` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=28 ;

-- 
-- Dump dei dati per la tabella `report`
-- 

INSERT INTO `report` VALUES (24, 24, 0x7265706f72746d6f6e746f72692d37352e706466, '2010-01-13 10:24:36', NULL, NULL, 75);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=68 ;

-- 
-- Dump dei dati per la tabella `visitor`
-- 

INSERT INTO `visitor` VALUES (34, 32, 21);
INSERT INTO `visitor` VALUES (49, 70, 24);
INSERT INTO `visitor` VALUES (48, 64, 21);
INSERT INTO `visitor` VALUES (45, 36, 32);
INSERT INTO `visitor` VALUES (57, 77, 82);
INSERT INTO `visitor` VALUES (63, 75, 30);
INSERT INTO `visitor` VALUES (61, 79, 83);
