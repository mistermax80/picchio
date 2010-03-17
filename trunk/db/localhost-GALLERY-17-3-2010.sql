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
-- Database: `gallery`
--
DROP DATABASE `gallery`;
CREATE DATABASE `gallery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gallery`;

-- --------------------------------------------------------

--
-- Struttura della tabella `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(32) NOT NULL,
  `descrizione` varchar(64) default NULL,
  `num_foto` int(11) default NULL COMMENT 'Numero indicativo delle foto che conterrà questa area',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `area`
--

INSERT INTO `area` (`id`, `nome`, `descrizione`, `num_foto`) VALUES
(1, 'Evento', NULL, 38),
(2, 'Home Page', NULL, 10),
(3, 'Matrimoni', NULL, 10),
(4, 'Battesimi', NULL, 10),
(5, 'Altri Eventi', NULL, 10),
(6, 'Montaggi', NULL, 10),
(7, 'Gadget', NULL, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(32) default NULL,
  `path` varchar(256) NOT NULL,
  `id_area` int(11) NOT NULL,
  `posizione` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `path` (`path`),
  UNIQUE KEY `id_area` (`id_area`,`posizione`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `image`
--

INSERT INTO `image` (`id`, `nome`, `path`, `id_area`, `posizione`) VALUES
(1, '', 'dest/3.jpg', 1, 0);
