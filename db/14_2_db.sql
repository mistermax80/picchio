-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generato il: 14 Feb, 2010 at 05:15 PM
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
  `number_client` int(11) NOT NULL default '1',
  `note` text collate utf8_bin,
  `timeStamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=90 ;

-- 
-- Dump dei dati per la tabella `booking`
-- 

INSERT INTO `booking` VALUES (85, 109, 1, '2010-01-04 00:00:00', '2010-01-06 00:00:00', 2, '', '2010-01-15 13:00:21');
INSERT INTO `booking` VALUES (86, 109, 9, '2010-01-04 00:00:00', '2010-01-08 00:00:00', 0, '', '2010-01-15 16:48:30');
INSERT INTO `booking` VALUES (87, 110, 4, '2010-01-04 00:00:00', '2010-01-06 00:00:00', 1, '', '2010-01-15 17:04:31');
INSERT INTO `booking` VALUES (88, 112, 9, '2010-01-24 00:00:00', '2010-01-26 00:00:00', 2, '', '2010-01-24 19:34:40');
INSERT INTO `booking` VALUES (89, 112, 6, '2010-02-02 00:00:00', '2010-02-19 00:00:00', 1, '', '2010-02-13 13:22:53');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=120 ;

-- 
-- Dump dei dati per la tabella `client`
-- 

INSERT INTO `client` VALUES (118, '', 'ccc', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `client` VALUES (119, '', 'qqqq', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `client` VALUES (116, '', 'feqwfewf', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `client` VALUES (117, '', 'aaa', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `client` VALUES (115, '', 'fgrgr', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `client` VALUES (114, '', 'ggg', '', 0x6e6a6e6f6a6b6c, 'njnj', 'knjk', '', '', 0x6a6e6b6a, 0x6e6a, '', 0x6a6b6e, 0x6a);
INSERT INTO `client` VALUES (113, 'angela', 'pestrin', '', 0x687975746a75696a3736, '', '', '', '', '', '', '', '', '');
INSERT INTO `client` VALUES (112, 'gigi', 'Pestrin', 0x626a6b6a676b6a, 0x686b676b6a67686b6a6c68, 'hjgkjgjklhkjl', 'kgjklhkjlhl', 'hkjhbjlkhkj', 0x6666676666, 0x6220766d622c6a, 0x6763686a766a6b686b6a6c, 0x766a68766b6867626b6a, 0x7668766b68626b6a6d, 0x76686d76686d);
INSERT INTO `client` VALUES (111, 'massimo', 'gigli', 0x7061737361706f72746f, 0x38363735343633363433, '324324', 'questura', 'romeno', '', 0x63616e696761747469, 0x6261726261626965746f6c61, '', '', '');
INSERT INTO `client` VALUES (110, 'moira', 'bianchini', 0x6369, 0x3837363534, '12345', 'comune', '', 0x3136303531393838, 0x726f6d61, 0x6375736d616e6f, 0x726f6d61, 0x343536373839, 0x76686a667668666466726467);
INSERT INTO `client` VALUES (109, 'stefano', 'montori', 0x706174656e7465, 0x383639383738646f63, '756568doc', 'rmtc', '', 0x3533343637383534, 0x726f6d61, 0x73616e746f2063656c736f, 0x726f6d61, 0x302739383839363739, 0x6a687967647565);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=77 ;

-- 
-- Dump dei dati per la tabella `optional`
-- 

INSERT INTO `optional` VALUES (76, 87, 10, 1);
INSERT INTO `optional` VALUES (72, 85, 7, 2);
INSERT INTO `optional` VALUES (73, 85, 9, 1);
INSERT INTO `optional` VALUES (74, 88, 3, 2);
INSERT INTO `optional` VALUES (75, 87, 5, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=33 ;

-- 
-- Dump dei dati per la tabella `product`
-- 

INSERT INTO `product` VALUES (1, 0x7465206769616c6c6f, '', 0x332c3030);
INSERT INTO `product` VALUES (2, 0x43616666c3a8, '', 0x322c3030);
INSERT INTO `product` VALUES (3, 0x416d61726f, '', 0x332c3030);
INSERT INTO `product` VALUES (4, 0x4163717561, '', 0x322c3030);
INSERT INTO `product` VALUES (5, 0x416e69706173746f, '', 0x372c3030);
INSERT INTO `product` VALUES (6, 0x416e69706173746f, '', 0x392c3030);
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
INSERT INTO `product` VALUES (30, 0x766972676f6c61, '', 0x372c3530);
INSERT INTO `product` VALUES (29, 0x746520726f73736f, '', 0x332c3030);
INSERT INTO `product` VALUES (31, 0x646f7070696120766972676f6c61, '', 0x302e3336);
INSERT INTO `product` VALUES (32, 0x63616d6f6d696c6c61, '', 0x322c3030);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=59 ;

-- 
-- Dump dei dati per la tabella `report`
-- 

INSERT INTO `report` VALUES (58, 112, 0x7265706f72742f6e6f7469666963612d32303130303132343037303131342e706466, '2010-01-24 19:35:14', NULL, NULL, 88);
INSERT INTO `report` VALUES (57, 111, 0x7265706f72742f6e6f7469666963612d32303130303132313035303132302e706466, '2010-01-21 17:40:20', NULL, NULL, 85);
INSERT INTO `report` VALUES (56, 109, 0x7265706f72742f6e6f7469666963612d32303130303131353132303134372e706466, '2010-01-15 12:24:47', NULL, NULL, 85);
INSERT INTO `report` VALUES (55, 110, 0x7265706f72742f6e6f7469666963612d32303130303131353132303131372e706466, '2010-01-15 12:22:17', NULL, NULL, 85);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=79 ;

-- 
-- Dump dei dati per la tabella `visitor`
-- 

INSERT INTO `visitor` VALUES (77, 88, 113);
INSERT INTO `visitor` VALUES (76, 85, 111);
INSERT INTO `visitor` VALUES (75, 86, 111);
INSERT INTO `visitor` VALUES (78, 87, 110);
INSERT INTO `visitor` VALUES (72, 85, 110);
