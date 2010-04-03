-- phpMyAdmin SQL Dump
-- version 2.11.3deb1ubuntu1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 27 Mar, 2010 at 11:41 AM
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

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(32) NOT NULL,
  `descrizione` varchar(64) default NULL,
  `num_foto` int(11) default NULL COMMENT 'Numero indicativo delle foto che conterrà questa area',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(32) default NULL,
  `path_big` varchar(256) NOT NULL,
  `path_medium` varchar(256) NOT NULL,
  `path_little` varchar(256) NOT NULL,
  `id_area` int(11) NOT NULL,
  `posizione` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `path` (`path_big`),
  UNIQUE KEY `id_area` (`id_area`,`posizione`),
  UNIQUE KEY `path_medium` (`path_medium`),
  UNIQUE KEY `path_little` (`path_little`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;
