
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2012 at 10:56 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a3099910_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `level` int(2) NOT NULL AUTO_INCREMENT,
  `answer` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` VALUES(1, '1');
INSERT INTO `answers` VALUES(2, '2');
INSERT INTO `answers` VALUES(3, '3');
INSERT INTO `answers` VALUES(4, '4');
INSERT INTO `answers` VALUES(5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `online` int(20) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `rtime` int(20) NOT NULL DEFAULT '0',
  `college` varchar(20) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(5, 'abc', '900150983cd24fb0d6963f7d28e17f72', 1347156725, 'abc@abc.com', 1, 1347108942, '', 6);
INSERT INTO `users` VALUES(6, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 1347158735, 'qwe@qwe.com', 1, 1347117828, 'qwe', 2);
INSERT INTO `users` VALUES(7, 'zxc', '5fa72358f0b4fb4f2c5d7de8c9a41846', 0, 'zxc@zxc.com', 0, 1347118144, 'zxc', 1);
