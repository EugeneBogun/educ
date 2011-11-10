-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2011 at 05:23 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `main`
--

-- --------------------------------------------------------

--
-- Table structure for table `Buildings`
--

CREATE TABLE IF NOT EXISTS `Buildings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'РќРѕРјРµСЂ/РЅР°Р·РІР°РЅРёРµ РєРѕСЂРїСѓСЃР°',
  `Universities_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° СѓРЅРёРІРµСЂСЃРёС‚РµС‚',
  PRIMARY KEY (`id`),
  KEY `fk_Buildings_Universities1` (`Universities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р—РґР°РЅРёСЏ' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Buildings`
--

INSERT INTO `Buildings` (`id`, `name`, `Universities_id`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Cities`
--

CREATE TABLE IF NOT EXISTS `Cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'РќР°Р·РІР°РЅРёРµ',
  `Countries_id` int(11) NOT NULL COMMENT 'РЎС‚СЂР°РЅР°',
  PRIMARY KEY (`id`),
  KEY `fk_Cities_Countries1` (`Countries_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р“РѕСЂРѕРґР°' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Cities`
--

INSERT INTO `Cities` (`id`, `name`, `Countries_id`) VALUES
(1, 'РљСЂРёРІРѕР№ Р РѕРі', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Classrooms`
--

CREATE TABLE IF NOT EXISTS `Classrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'РќРѕРјРµСЂ/РёРјСЏ РєРѕРјРЅР°С‚С‹',
  `ClassRoomsTypes_id` int(11) DEFAULT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° С‚РёРї РєР°Р±РёРЅРµС‚Р°',
  `Buildings_id` int(11) DEFAULT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РќРѕРјРµСЂ РєРѕСЂРїСѓСЃР°',
  PRIMARY KEY (`id`),
  KEY `fk_Classrooms_ClassRoomsTypes1` (`ClassRoomsTypes_id`),
  KEY `fk_Classrooms_Buildings1` (`Buildings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Classrooms`
--

INSERT INTO `Classrooms` (`id`, `name`, `ClassRoomsTypes_id`, `Buildings_id`) VALUES
(1, '303', 1, 2),
(2, '304', 1, 2),
(3, '403', 1, 2),
(4, '404', 1, 2),
(5, '110', 1, 3),
(6, '401', 2, 2),
(7, '301', 2, 2),
(8, '319', 2, 2),
(9, 'РЎРїРѕСЂС‚Р·Р°Р» в„–1', 3, 4),
(10, 'РЎРїРѕСЂС‚Р·Р°Р» в„–2', 3, 4),
(11, '104', 2, 2),
(12, '106', 2, 1),
(13, '309', 2, 1),
(14, '113', 2, 3),
(15, '320', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Countries`
--

CREATE TABLE IF NOT EXISTS `Countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р СћР В°Р В±Р В»Р С‘РЎвЂ Р В° РЎРѓРЎвЂљРЎР‚Р В°Р Р…' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Countries`
--

INSERT INTO `Countries` (`id`, `name`) VALUES
(1, 'РЈРєСЂР°РёРЅР°');

-- --------------------------------------------------------

--
-- Table structure for table `Curricula`
--

CREATE TABLE IF NOT EXISTS `Curricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'РРјСЏ СѓС‡РµР±РЅРѕРіРѕ РїР»Р°РЅР°',
  `year_start` varchar(4) NOT NULL COMMENT 'Р“РѕРґ РЅР°С‡Р°Р»Р°',
  `year_end` varchar(4) DEFAULT NULL COMMENT 'Р“РѕРґ РєРѕРЅС†Р°',
  `Dep_Spec_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РѕС‚РґРµР»РµРЅРёРµ/СЃРїРµС†РёР°Р»СЊРЅРѕСЃС‚СЊ',
  PRIMARY KEY (`id`),
  KEY `fk_Curricula_Dep_Spec1` (`Dep_Spec_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РЈС‡РµР±РЅС‹Р№ РїР»Р°РЅ' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Curricula`
--

INSERT INTO `Curricula` (`id`, `name`, `year_start`, `year_end`, `Dep_Spec_id`) VALUES
(1, 'РЈС‡РµР±РЅС‹Р№ РїР»Р°РЅ РїСЂРѕРіСЂР°РјРјРёСЃС‚РѕРІ', '2007', '2010', 1),
(2, 'РЈС‡РµР±РЅС‹Р№ РїР»Р°РЅ РїСЂРѕРіСЂР°РјРјРёСЃС‚РѕРІ', '2010', '2014', 1),
(3, 'РЈС‡РµР±РЅС‹Р№ РїР»Р°РЅ СЃРµС‚РµРІРёРєРѕРІ', '2007', '2009', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Departments`
--

CREATE TABLE IF NOT EXISTS `Departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `Universities_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Departments_Universities1` (`Universities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Departments`
--

INSERT INTO `Departments` (`id`, `full_name`, `name`, `tel1`, `tel2`, `Universities_id`) VALUES
(1, 'РљРѕРјРїСЊСЋС‚РµСЂРЅРѕС— С‚Р° РїСЂРѕРіСЂР°РјРЅРѕС— С–РЅР¶РµРЅРµСЂС–С—', 'РљРџР†', NULL, NULL, 1),
(2, 'РђРІС–РѕРЅС–РєР°', 'РђРІС–РѕРЅС–РєР°', NULL, NULL, 1),
(3, 'РћСЂРіР°РЅС–Р·Р°С†С–СЏ Р°РІС–Р°С†С–Р№РЅРёС… РїРµСЂРµРІРµР·РµРЅСЊ', 'РџРµСЂРµРІРѕР·РєРё', NULL, NULL, 1),
(4, 'Р Р°РґС–Рѕ', 'Р Р°РґС–Рѕ', NULL, NULL, 1),
(5, 'РњРµС…Р°РЅС–РєРё', 'РњРµС…Р°РЅС–РєРё', NULL, NULL, 1),
(6, 'Р—Р°РіР°Р»СЊРЅРѕРѕСЃРІС–С‚РЅРёС… РґРёСЃС†РёРїР»С–РЅ', 'Р—Р”', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Dep_Spec`
--

CREATE TABLE IF NOT EXISTS `Dep_Spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Specialty_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° СЃРїРµС†РёР°Р»СЊРЅРѕСЃС‚СЊ',
  `Departments_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РѕС‚РґРµР»РµРЅРёРµ',
  PRIMARY KEY (`id`),
  KEY `fk_SubDep_Spec_Specialty1` (`Specialty_id`),
  KEY `fk_Dep_Spec_Departments1` (`Departments_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РћС‚РґРµР»РµРЅРёРµ-СЃРїРµС†РёР»СЊР°РЅРѕСЃС‚СЊ' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Dep_Spec`
--

INSERT INTO `Dep_Spec` (`id`, `Specialty_id`, `Departments_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE IF NOT EXISTS `Groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL COMMENT 'РќР°Р·РІР°РЅРёРµ РіСЂСѓРїРїС‹',
  `YearCreate` int(11) NOT NULL COMMENT 'Р“РѕРґ СЃРѕР·РґР°РЅРёСЏ',
  `description` varchar(100) DEFAULT NULL COMMENT 'РћРїРёСЃР°РЅРёРµ',
  `Curricula_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° СѓС‡РµР±РЅС‹Р№ РїР»Р°РЅ',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0 - 9 РєР»Р°СЃСЃ,1 - 11 РєР»Р°СЃСЃ',
  PRIMARY KEY (`id`),
  KEY `fk_Groups_Curricula1` (`Curricula_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р“СЂСѓРїРїС‹' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`id`, `name`, `YearCreate`, `description`, `Curricula_id`, `type`) VALUES
(1, '397', 2009, NULL, 1, 1),
(2, '307', 2010, NULL, 2, 1),
(3, '3-092', 2009, NULL, 2, 0),
(4, '393', 2009, NULL, 3, 1),
(5, '394', 2009, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Invites`
--

CREATE TABLE IF NOT EXISTS `Invites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invite` varchar(10) NOT NULL,
  `date_reg` datetime DEFAULT NULL,
  `option` varchar(200) NOT NULL,
  `Users_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Invaites_Users1` (`Users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РџСЂРёРіР»Р°С€РµРЅРёСЏ' AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Invites`
--

INSERT INTO `Invites` (`id`, `invite`, `date_reg`, `option`, `Users_id`) VALUES
(4, 'fdd3', '2011-10-25 21:38:07', 'G:1:1;', 16),
(3, '1', '2011-09-07 17:58:43', 'G:1:1;', 7),
(5, 'dsaf2', '2011-10-26 17:45:44', 'S:1:3;', 10),
(6, 'sfdsd', '2011-10-26 17:45:44', 'S:1:7;', 9),
(7, 'dfsd', '2011-10-26 17:47:36', 'S:2:2;', 13),
(8, 'dfs3sd', '2011-10-26 17:50:31', 'S:2:3;', 11),
(9, 'dsasad', '2011-10-26 17:52:03', 'G:3:1;', 14),
(10, 'dssd3d', '2011-10-26 17:59:18', 'S:4:7;', 15),
(11, 'df12', '2011-10-31 11:31:41', 'S:1:2;', 17),
(12, 'fdfd', '2011-10-31 11:32:06', 'S:1:2;', 20),
(13, 'fdsddf', '2011-10-31 11:32:24', 'S:1:2;', 21),
(14, '12ddf', '2011-10-31 11:33:26', 'S:4:2:', 18),
(15, 'dfsa2', '2011-10-31 11:34:35', 'S:4:2:', 19),
(16, 'dfdsf2', '2011-10-31 11:34:52', 'S:1:2:', 21),
(17, 'fddf', '2011-10-31 11:38:35', 'S:4:2;', 12);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Users_id_from` int(11) NOT NULL COMMENT 'РћС‚ РєРѕРіРѕ',
  `text` text NOT NULL COMMENT 'РўРµРєСЃС‚',
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Р”Р°С‚Р° Рё РІСЂРµРјСЏ',
  `status` tinyint(1) DEFAULT '1' COMMENT 'РЎС‚Р°С‚СѓСЃ СЃРѕРѕР±С‰РµРЅРёСЏ',
  `Users_id_to` int(11) NOT NULL COMMENT 'РљРѕРјСѓ',
  PRIMARY KEY (`id`),
  KEY `fk_Messages_Users1` (`Users_id_from`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р›РёС‡РЅС‹Рµ СЃРѕРѕР±С‰РµРЅРёСЏ' AUTO_INCREMENT=33 ;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`id`, `Users_id_from`, `text`, `datetime`, `status`, `Users_id_to`) VALUES
(3, 0, 'sfd', '2011-10-26 10:09:42', 1, 0),
(4, 0, 'k jln', '2011-10-26 10:10:10', 1, 0),
(5, 0, '', '2011-10-26 18:03:49', 1, 8),
(6, 0, '', '2011-10-26 18:04:18', 1, 8),
(7, 0, '', '2011-10-26 18:06:15', 1, 8),
(8, 0, '', '2011-10-26 18:06:32', 1, 8),
(9, 0, '0', '2011-10-26 18:07:56', 1, 0),
(10, 0, '', '2011-10-26 18:08:58', 1, 3),
(11, 0, '', '2011-10-26 18:09:21', 1, 3),
(12, 0, 'fdf', '2011-10-26 18:10:52', 1, 3),
(13, 0, 'fdf', '2011-10-26 18:11:14', 1, 3),
(14, 0, '', '2011-10-26 18:11:20', 1, 3),
(15, 0, '', '2011-10-26 18:11:26', 1, 3),
(16, 0, '', '2011-10-26 18:11:42', 1, 3),
(17, 0, '', '2011-10-26 18:13:26', 1, 3),
(18, 0, '', '2011-10-26 18:13:48', 1, 0),
(19, 0, '', '2011-10-26 18:16:47', 1, 0),
(20, 0, '', '2011-10-26 18:16:59', 1, 0),
(21, 0, '0', '2011-10-26 18:18:40', 1, 0),
(22, 0, '', '2011-11-05 08:59:03', 1, 8),
(23, 7, '', '2011-11-10 17:09:04', 1, 0),
(24, 7, 'РІС–С–', '2011-11-10 17:12:20', 1, 7),
(25, 7, '', '2011-11-10 17:15:03', 1, 10),
(26, 7, '', '2011-11-10 17:15:22', 1, 10),
(27, 7, 'biiiii', '2011-11-10 17:15:37', 1, 10),
(28, 7, 'dssd', '2011-11-10 17:18:29', 1, 7),
(29, 7, 'dssd', '2011-11-10 17:18:46', 1, 7),
(30, 7, 'fddf', '2011-11-10 17:18:54', 1, 7),
(31, 7, 'dssdds', '2011-11-10 17:19:18', 1, 7),
(32, 7, '-', '2011-11-10 17:22:46', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Organizations`
--

CREATE TABLE IF NOT EXISTS `Organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Р В°РЎС“РЎвЂљР С•Р С‘Р Р…Р С”РЎР‚Р ВµР СР ВµР Р…РЎвЂљ',
  `name` varchar(45) NOT NULL COMMENT 'Р Р…Р В°Р В·Р Р†Р В°Р Р…Р С‘Р Вµ Р С•РЎР‚Р С–Р В°Р Р…Р С‘Р В·Р В°РЎвЂ Р С‘Р С‘',
  `Universities_id` int(11) NOT NULL COMMENT 'Р С”Р С•Р Т‘ РЎС“Р Р…Р С‘Р Р†Р ВµРЎР‚РЎРѓР С‘РЎвЂљР ВµРЎвЂљР В° Р С”РЎР‚РЎС“Р В¶Р С”Р В°',
  PRIMARY KEY (`id`),
  KEY `fk_Organization_Universities1` (`Universities_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Organizations`
--


-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'РќР°Р·РІР°РЅРёРµ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р РѕР»Рё' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`id`, `name`) VALUES
(1, 'РљСѓСЂСЃР°РЅС‚'),
(2, 'РџСЂРµРїРѕРґР°РІР°С‚РµР»СЊ'),
(3, 'Р›Р°Р±РѕСЂР°РЅС‚'),
(4, 'РљСѓСЂР°С‚РѕСЂ'),
(5, 'РЎС‚Р°СЂС€РёРЅР°'),
(6, 'Р—Р°РјСЃС‚Р°СЂС€РёРЅР°'),
(7, 'Р“Р»Р°РІР° Р¦Рљ');

-- --------------------------------------------------------

--
-- Table structure for table `Settings`
--

CREATE TABLE IF NOT EXISTS `Settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `settings1` varchar(255) NOT NULL,
  `settings2` varchar(255) NOT NULL,
  `settings3` varchar(255) NOT NULL,
  `settings4` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Settings`
--

INSERT INTO `Settings` (`id`, `settings1`, `settings2`, `settings3`, `settings4`) VALUES
(1, 'week', '07.11.2011', '13.11.2011', '1'),
(2, 'week', '14.11.2011', '20.11.2011', '0');

-- --------------------------------------------------------

--
-- Table structure for table `Specialties`
--

CREATE TABLE IF NOT EXISTS `Specialties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL COMMENT 'РљРѕРґ СЃРїРµС†РёР°Р»СЊРЅРѕСЃС‚Рё',
  `fullname` varchar(75) DEFAULT NULL COMMENT 'РџРѕР»РЅРѕРµ РЅР°Р·РІР°РЅРёРµ',
  `name` varchar(25) DEFAULT NULL COMMENT 'РђР±СЂРµРІРёР°С‚СѓСЂР°',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РЎРїРµС†РёР°Р»СЊРЅРѕСЃС‚Рё' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Specialties`
--

INSERT INTO `Specialties` (`id`, `code`, `fullname`, `name`) VALUES
(1, '5.05010301', 'Р Р°Р·СЂР°Р±РѕС‚РєР° РїСЂРѕРіСЂР°РјРЅРѕРіРѕ РѕР±РµСЃРїРµС‡РµРЅРёСЏ', 'Р РџРћ'),
(2, '5.05010201', 'РћР±СЃР»СѓРіРѕРІСѓРІР°РЅРЅСЏ РєРѕРјРї''С‚РµСЂРЅРёС… СЃРёСЃС‚РµРј С– РјРµСЂРµР¶', 'РћРљРЎРњ');

-- --------------------------------------------------------

--
-- Table structure for table `SubDepartments`
--

CREATE TABLE IF NOT EXISTS `SubDepartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Departments_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РѕС‚РґРµР»РµРЅРёРµ',
  `name` varchar(25) DEFAULT NULL COMMENT 'РђР±СЂРµРІРёР°С‚СѓСЂР°',
  `fullname` varchar(50) NOT NULL COMMENT 'РџРѕР»РЅРѕРµ РЅР°Р·РІР°РЅРёРµ',
  PRIMARY KEY (`id`),
  KEY `fk_SubDepartments_Departments1` (`Departments_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р¦Рљ' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `SubDepartments`
--

INSERT INTO `SubDepartments` (`id`, `Departments_id`, `name`, `fullname`) VALUES
(1, 1, 'РџР— Р•РћРњ', 'РџСЂР°РєС‚РёС‡РЅРѕРіРѕ Р·Р°СЃС‚РѕСЃСѓРІР°РЅРЅСЏ Р•РћРњ'),
(2, 1, 'РџРћР”', 'РџСЂРѕС„РµСЃС–Р№РЅРѕ-РѕСЂС–РµРЅС‚РѕРІР°РЅРёС… РґРёСЃС†РёРїР»С–РЅ'),
(3, 6, 'РџРќ', 'РџСЂРёСЂРѕРґРЅРёС‡РёС… РЅР°СѓРє'),
(4, 6, 'Р“Рќ', 'Р“СѓРјР°СЂРЅС–С‚Р°СЂРЅРёС… РЅР°СѓРє');

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE IF NOT EXISTS `Subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL COMMENT 'РџРѕР»РЅРѕРµ РёРјСЏ',
  `name` varchar(45) NOT NULL COMMENT 'РђР±СЂРµРІРёР°С‚СѓСЂР°',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РџСЂРµРґРјРµС‚С‹' AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`id`, `full_name`, `name`) VALUES
(1, 'РћСЃРЅРѕРІРё Р±Р°Р· РґР°РЅРЅС‹С… С‚Р° Р·РЅР°РЅСЊ', 'РћР‘Р”Р—'),
(2, 'Р РѕР·СЂРѕР±РєР° РєР»РёРµРЅС‚-СЃРµСЂРІРµСЂРЅРѕР№ Р°СЂС…РёС‚РµРєС‚СѓСЂС‹', 'Р Р—РРљРЎРђ'),
(3, 'Р РѕР·СЂРѕР±РєР° Р·Р°СЃРѕР±С–РІ РІС–Р·СѓР°Р»СЊРЅРѕРіРѕ РїСЂРѕРіСЂР°РјСѓРІР°РЅРЅСЏ', 'РР—Р’Рџ'),
(4, 'Р•РєРѕРЅРѕРјС–РєР° РїС–РґРїСЂРёС”РјСЃС‚РІР°', 'Р•Рџ'),
(5, 'Р¤С–Р·РёС‡РЅР° РєСѓР»СЊС‚СѓСЂР°', 'С„С–Р·-СЂР°'),
(7, 'Р†РЅС‚РµСЂРЅРµС‚ С‚РµС…РЅРѕР»РѕРіС–С—', 'Р†Рў'),
(6, 'РЎРѕС†С–РѕР»РѕРіС–СЏ', 'РЎРѕС†.'),
(13, 'РђРЅРіР»С–Р№СЃРєР° РјРѕРІР°', 'РђРЅРіР».'),
(9, 'РџРѕР»С–С‚РѕР»РѕРіС–СЏ', 'РџРѕР»С–С‚.'),
(10, 'РљРѕРјРї''СЋС‚РµСЂРЅС– РјРµСЂРµР¶С–', 'РљРњ'),
(11, 'РњРµРЅРµРґР¶РјРµРЅС‚/РњР°СЂРєРµС‚РёРЅРі', 'РњРµРЅ./РњР°СЂРє.'),
(12, 'Р’РµР±-РґРёР·Р°Р№РЅ', 'Р’РµР±-РґРёР·.'),
(14, 'РћСЃРЅРѕРІРё Р·Р°С…РёСЃС‚Сѓ С–РЅС„РѕСЂРјР°С†С–С—', 'РћР—Р†');

-- --------------------------------------------------------

--
-- Table structure for table `Subjects_Curricula`
--

CREATE TABLE IF NOT EXISTS `Subjects_Curricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curricula_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° СѓС‡РµР±РЅСѓСЋ РїСЂРѕРіСЂР°РјРјСѓ',
  `Subjects_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РїСЂРµРґРјРµС‚',
  `term` int(1) NOT NULL COMMENT 'РЎРµРјРµСЃС‚СЂ',
  PRIMARY KEY (`id`),
  KEY `fk_Subjects_Curricula_Curricula1` (`curricula_id`),
  KEY `fk_Subjects_Curricula_Subjects1` (`Subjects_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РџСЂРµРґРјРµС‚-РїСЂРѕРіСЂР°РјРјР°' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Subjects_Curricula`
--

INSERT INTO `Subjects_Curricula` (`id`, `curricula_id`, `Subjects_id`, `term`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 5),
(3, 1, 3, 5),
(4, 1, 4, 5),
(5, 1, 5, 5),
(6, 1, 6, 5),
(7, 1, 7, 5),
(14, 1, 13, 5),
(9, 1, 9, 5),
(10, 1, 10, 5),
(11, 1, 11, 5),
(12, 1, 12, 5),
(15, 1, 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

CREATE TABLE IF NOT EXISTS `Timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `week` int(11) NOT NULL COMMENT 'РРјСЏ РЅРµРґРµР»Рё',
  `day` int(11) DEFAULT NULL COMMENT 'РРјСЏ РґРЅСЏ',
  `numder` int(11) DEFAULT NULL COMMENT 'РќРѕРјРµСЂ РїР°СЂС‹',
  `Groups_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РіСЂСѓРїРїСѓ',
  `Classrooms_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РєР°Р±РёРЅРµС‚',
  `UsersSubjectsCurricula_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РїСЂРµРґРјРµ-СЃРїРµС†РёР°Р»СЊРЅРѕСЃС‚СЊ',
  PRIMARY KEY (`id`),
  KEY `fk_Timetable_Groups1` (`Groups_id`),
  KEY `fk_Timetable_Classrooms1` (`Classrooms_id`),
  KEY `fk_Timetable_UsersSubjectsCurricula1` (`UsersSubjectsCurricula_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Р Р°СЃРїРёСЃР°РЅРёРµ' AUTO_INCREMENT=38 ;

--
-- Dumping data for table `Timetable`
--

INSERT INTO `Timetable` (`id`, `week`, `day`, `numder`, `Groups_id`, `Classrooms_id`, `UsersSubjectsCurricula_id`) VALUES
(1, 1, 3, 1, 1, 1, 1),
(2, 2, 3, 1, 1, 1, 1),
(3, 1, 3, 2, 1, 1, 2),
(4, 2, 3, 2, 1, 1, 2),
(8, 2, 3, 3, 1, 6, 8),
(7, 1, 3, 3, 1, 6, 8),
(9, 1, 1, 1, 1, 8, 9),
(10, 2, 1, 1, 1, 8, 9),
(14, 1, 1, 2, 1, 5, 8),
(15, 2, 1, 2, 1, 5, 8),
(16, 2, 1, 3, 1, 9, 10),
(17, 1, 1, 3, 1, 9, 10),
(18, 1, 1, 3, 1, 3, 11),
(19, 2, 1, 3, 1, 3, 11),
(20, 1, 2, 1, 1, 3, 11),
(21, 1, 2, 2, 1, 1, 2),
(22, 2, 2, 2, 1, 1, 2),
(23, 2, 2, 1, 1, 3, 11),
(24, 1, 2, 3, 1, 11, 12),
(25, 2, 2, 3, 1, 11, 12),
(26, 1, 4, 1, 1, 12, 13),
(27, 2, 4, 1, 1, 12, 13),
(28, 1, 4, 2, 1, 13, 17),
(29, 2, 4, 2, 1, 13, 17),
(30, 1, 4, 3, 1, 3, 18),
(31, 2, 4, 3, 1, 3, 18),
(32, 2, 5, 1, 1, 3, 16),
(33, 1, 5, 1, 1, 3, 16),
(34, 1, 5, 2, 1, 14, 14),
(35, 2, 5, 2, 1, 14, 14),
(36, 1, 5, 3, 1, 15, 15),
(37, 2, 5, 3, 1, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Universities`
--

CREATE TABLE IF NOT EXISTS `Universities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'РќР°Р·РІР°РЅРёРµ',
  `fullname` varchar(100) DEFAULT NULL COMMENT 'РџРѕР»РЅРѕРµ РЅР°Р·РІР°РЅРёРµ',
  `adress` varchar(45) DEFAULT NULL COMMENT 'РђРґСЂРµСЃСЃ',
  `Cities_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РіРѕСЂРѕРґ',
  PRIMARY KEY (`id`),
  KEY `fk_Universities_Cities1` (`Cities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Universities`
--

INSERT INTO `Universities` (`id`, `name`, `fullname`, `adress`, `Cities_id`) VALUES
(1, 'РљРљ РќРђРЈ', 'РљСЂРёРІРѕСЂРѕР¶СЃРєРёР№ РєРѕР»РµРґР¶ РЅР°С†РёРѕРЅР°Р»СЊРЅРѕРіРѕ Р°РІРёР°С†РёРѕРЅРЅРѕРіРѕ СѓРЅРёРІРµСЂСЃРёС‚РµС‚Р°', 'СѓР». РўСѓРїРѕР»РµРІР° 1', 1),
(2, 'РљРќРЈ', 'РљСЂРёРІРѕСЂРѕР¶СЃРєРёР№ РќР°С†РёРѕРЅР°Р»СЊРЅС‹Р№ РЈРЅРёРІРµСЂСЃРёС‚РµС‚', '22 РџР°СЂС‚СЃСЊРµР·РґР° 8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `UniversitiesRoles`
--

CREATE TABLE IF NOT EXISTS `UniversitiesRoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Roles_id` int(11) NOT NULL,
  `Universities_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='"РўР°Р±Р»РёС†Р° РЅРµРѕР±С…РѕРґРёРјР° РґР»СЏ СЃРІСЏР·С‹РІР°РЅРёСЏ СЂРѕР»РµР№ СЃ СѓРЅРёРІРµСЂСЃРёС‚РµС‚Р°РјРё"' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `UniversitiesRoles`
--

INSERT INTO `UniversitiesRoles` (`id`, `Roles_id`, `Universities_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL COMMENT 'РџРѕС‡С‚Р°',
  `password` varchar(16) NOT NULL COMMENT 'РџР°СЂРѕР»СЊ',
  `surname` varchar(45) NOT NULL COMMENT 'Р¤Р°РјРёР»РёСЏ',
  `name` varchar(45) NOT NULL COMMENT 'РРјСЏ',
  `datebithday` datetime DEFAULT NULL COMMENT 'Р”Р°С‚Р° СЂРѕР¶РґРµРЅРёСЏ',
  `last_ip` varchar(15) DEFAULT NULL COMMENT 'РџРѕСЃР»РµРґРЅРёР№ IP',
  `last_login` datetime DEFAULT NULL COMMENT 'РџРѕСЃР»РµРґРЅРёР№ РІС…РѕРґ',
  `nick` varchar(64) DEFAULT NULL COMMENT 'РќРёРє',
  `avatar` varchar(200) DEFAULT NULL COMMENT 'РђРІР°С‚Р°СЂ',
  `patronymic` varchar(30) DEFAULT NULL COMMENT 'РћС‚С‡РµСЃС‚РІРѕ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `surname`, `name`, `datebithday`, `last_ip`, `last_login`, `nick`, `avatar`, `patronymic`) VALUES
(7, 'max@a.ru', '123', 'Р‘СѓРіР°Р№', 'РњР°РєСЃРёРј', '0000-00-00 00:00:00', '127.0.0.1', '2011-09-07 17:58:43', '', '', NULL),
(8, 'vova@a.ru', '123', 'РљСѓСЂРѕРїСЏС‚РЅРёРє', 'Р’РѕРІР°', '2011-10-11 09:10:55', NULL, NULL, NULL, NULL, NULL),
(9, 'b@a.ru', '123', 'Р‘СѓСЂР°Рє', 'Р’РёРєС‚РѕСЂ', NULL, NULL, NULL, NULL, NULL, 'Р”РјРёС‚СЂРёРµРІРёС‡'),
(10, 'СЃ@a.ru', '123', 'РЎР°РІРµРЅРєРѕ ', 'Р РѕРјР°РЅ', NULL, NULL, NULL, NULL, NULL, 'РЎРµСЂРіРµРµРІРёС‡'),
(11, 'd@a.ru', '123', 'РџРѕРїРёРєР°', 'РђР»РµРєСЃР°РЅРґСЂ', NULL, NULL, NULL, NULL, NULL, 'Р’Р°СЃРёР»СЊРµРІРёС‡'),
(12, 'f@a.ru', '123', 'РЎРјРёСЂРЅРѕРІР°', 'РќР°РґРµР¶РґР°', NULL, NULL, NULL, NULL, NULL, 'Р’РёРєС‚РѕСЂРѕРІРЅР°'),
(13, 'g@a.ru', '123', 'РљРѕР¶Р°РµРІ', 'РђРЅРґСЂРµР№', NULL, NULL, NULL, NULL, NULL, 'Р’Р»Р°РґРёРјРёСЂРѕРІРёС‡'),
(14, 'h@a.ru', '123', 'Р‘РѕРіСѓРЅ', 'Р•РІРіРµРЅРёР№', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'j@a.ru', '123', 'РђР±СЂР°РјРѕРІ', 'РђР»РµРєСЃРµР№', NULL, NULL, NULL, NULL, NULL, 'Р’Р»Р°РґРёРјРёСЂРѕРІРёС‡'),
(16, 'dd@dd.ru', '123', 'Р“Р°СЃР°РЅРµРЅРєРѕ', 'Р”РµРЅРёСЃ', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'ds@a.ru', '123', 'Р›РёСЃРµРЅРєРѕ', 'РўР°С‚СЊСЏРЅР°', NULL, NULL, NULL, NULL, NULL, 'РќРёРєРѕР»Р°РµРІРЅР°'),
(18, 'dfsa@a.ru', '123', 'Р”РІРѕСЂРµС†РєРёР№', 'Р”РјРёС‚СЂРёР№', NULL, NULL, NULL, NULL, NULL, 'РќРёРєРѕР»Р°РµРІРёС‡'),
(19, 'sads@a.ru', '123', 'Р“СЂРёРїР°СЃ', 'Р›Р°СЂРёСЃР°', NULL, NULL, NULL, NULL, NULL, 'РќРёРєРѕР»Р°РµРІРЅР°'),
(20, 'sdds@a.ru', '123', 'РљРѕР¶Р°РµРІ', 'РђРЅРґСЂРµР№', NULL, NULL, NULL, NULL, NULL, 'Р’Р»Р°РґРёРјРёСЂРѕРІРёС‡'),
(21, 'sdР°ds@a.ru', '123', 'РЎР°РјРѕС…РІР°Р»РѕРІ', 'Р®СЂРёР№', NULL, NULL, NULL, NULL, NULL, 'Р’Р»Р°РґРёРјРёСЂРѕРІРёС‡'),
(22, 'g@g.ru', '123', 'РљСѓСЂРёР»РµРЅРєРѕ', 'Р’РёРєС‚РѕСЂРёСЏ', NULL, NULL, NULL, NULL, NULL, 'РЎРµСЂРіРµРµРІРЅР°');

-- --------------------------------------------------------

--
-- Table structure for table `UsersDepartments`
--

CREATE TABLE IF NOT EXISTS `UsersDepartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Departments_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РѕС‚РґРµР»РµРЅРёРµ',
  `Users_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ',
  `Roles_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° СЂРѕР»СЊ',
  PRIMARY KEY (`id`),
  KEY `fk_UsersDepartments_Departments1` (`Departments_id`),
  KEY `fk_UsersDepartments_Users1` (`Users_id`),
  KEY `fk_UsersDepartments_Roles1` (`Roles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РџРѕР»СЊР·РѕРІР°С‚РµР»Рё - РѕС‚РґРµР»РµРЅРёСЏ' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `UsersDepartments`
--


-- --------------------------------------------------------

--
-- Table structure for table `UsersGroups`
--

CREATE TABLE IF NOT EXISTS `UsersGroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(32) DEFAULT NULL COMMENT 'РћРїРёСЃР°РЅРёРµ',
  `Groups_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РіСЂСѓРїРїСѓ',
  `Users_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ',
  `Roles_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° СЂРѕР»СЊ',
  PRIMARY KEY (`id`),
  KEY `fk_GroupsUsers_Groups1` (`Groups_id`),
  KEY `fk_UsersGroups_Users1` (`Users_id`),
  KEY `fk_UsersGroups_Roles1` (`Roles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РџРѕР»СЊР·РѕРІР°С‚РµР»Рё - РіСЂСѓРїРїС‹' AUTO_INCREMENT=33 ;

--
-- Dumping data for table `UsersGroups`
--

INSERT INTO `UsersGroups` (`id`, `description`, `Groups_id`, `Users_id`, `Roles_id`) VALUES
(1, NULL, 1, 7, 1),
(9, NULL, 3, 14, 1),
(16, 'РІСЂСѓС‡РЅСѓСЋ', 1, 8, 1),
(32, NULL, 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `UsersOrganizations`
--

CREATE TABLE IF NOT EXISTS `UsersOrganizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Р С”Р С•Р Т‘ РЎРѓР Р†РЎРЏР В·Р С‘ Р С—Р С•Р В»РЎРЉР В·Р С•Р Р†Р В°РЎвЂљР ВµР В»РЎРЏ РЎРѓ Р С—РЎР‚Р В°Р Р†Р В°Р СР С‘ Р В° РЎС“Р С—РЎР‚Р В°Р Р†Р В»Р ВµР Р…Р С‘РЎРЏ Р С•РЎР‚Р С–Р В°Р Р…Р С‘Р В·Р В°РЎвЂ Р С‘Р ВµР в„–',
  `Organizations_id` int(11) NOT NULL COMMENT 'Р С”Р С•Р Т‘ Р С•РЎР‚Р С–Р В°Р Р…Р С‘Р В·Р В°РЎвЂ Р С‘Р С‘ РЎС“РЎвЂЎР ВµР В±Р Р…Р С•Р С–Р С• Р В·Р В°Р Р†Р ВµР Т‘Р ВµР Р…Р С‘РЎРЏ',
  `Users_id` int(11) NOT NULL COMMENT 'Р С”Р С•Р Т‘ Р С—Р С•Р В»РЎРЉР В·Р С•Р Р†Р В°РЎвЂљР ВµР В»РЎРЏ',
  `Roles_id` int(11) NOT NULL COMMENT 'Р С”Р С•Р Т‘ РЎР‚Р С•Р В»Р С‘',
  PRIMARY KEY (`id`),
  KEY `fk_UsersOrganizations_Organizations1` (`Organizations_id`),
  KEY `fk_UsersOrganizations_Users1` (`Users_id`),
  KEY `fk_UsersOrganizations_Roles1` (`Roles_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `UsersOrganizations`
--


-- --------------------------------------------------------

--
-- Table structure for table `UsersSubDepartments`
--

CREATE TABLE IF NOT EXISTS `UsersSubDepartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubDepartments_id` int(11) NOT NULL,
  `Users_id` int(11) NOT NULL,
  `Roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_UsersSubDepartments_SubDepartments1` (`SubDepartments_id`),
  KEY `fk_UsersSubDepartments_Users1` (`Users_id`),
  KEY `fk_UsersSubDepartments_Roles1` (`Roles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `UsersSubDepartments`
--

INSERT INTO `UsersSubDepartments` (`id`, `SubDepartments_id`, `Users_id`, `Roles_id`) VALUES
(1, 1, 10, 3),
(2, 1, 9, 7),
(3, 2, 13, 2),
(4, 2, 11, 3),
(5, 4, 15, 7),
(6, 1, 17, 2),
(7, 1, 20, 2),
(8, 1, 21, 2),
(9, 4, 19, 2),
(10, 4, 18, 2),
(11, 1, 21, 2),
(12, 4, 14, 2),
(13, 4, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `UsersSubjectsCurricula`
--

CREATE TABLE IF NOT EXISTS `UsersSubjectsCurricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Subjects_Curricula_id` int(11) NOT NULL COMMENT 'СЃСЃС‹Р»РєР° РЅР° РїСЂРµРґРјРµС‚-СѓС‡РµР±РЅС‹Р№ РїР»Р°РЅ',
  `Users_id` int(11) DEFAULT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ',
  `Roles_id` int(11) DEFAULT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° СЂРѕР»СЊ',
  PRIMARY KEY (`id`),
  KEY `fk_UsersSubjectsCurricula_Subjects_Curricula1` (`Subjects_Curricula_id`),
  KEY `fk_UsersSubjectsCurricula_Users1` (`Users_id`),
  KEY `fk_UsersSubjectsCurricula_Roles1` (`Roles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РџСЂРµРїРѕРґР°РІР°С‚РµР»СЊ-РїСЂРµРґРјРµС‚-СѓС‡РµР±РЅС‹Р№ РїР»Р°РЅ' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `UsersSubjectsCurricula`
--

INSERT INTO `UsersSubjectsCurricula` (`id`, `Subjects_Curricula_id`, `Users_id`, `Roles_id`) VALUES
(1, 1, 9, 2),
(2, 2, 10, 2),
(8, 3, 11, 2),
(9, 4, 12, 2),
(10, 5, 15, 2),
(11, 7, 17, 2),
(12, 6, 18, 2),
(13, 9, 19, 2),
(14, 10, 21, 2),
(15, 11, 12, 2),
(16, 12, 20, 2),
(17, 14, 22, 2),
(18, 15, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `UsersUniversities`
--

CREATE TABLE IF NOT EXISTS `UsersUniversities` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Р С”Р С•Р Т‘ РЎРѓР Р†РЎРЏР В·Р С‘ Р С—Р С•Р В»РЎРЉР В·Р С•Р Р†Р В°РЎвЂљР ВµР В»РЎРЏ РЎРѓ РЎвЂћРЎС“Р Р…Р С”РЎвЂ Р С‘РЎРЏР СР С‘ РЎС“Р С—РЎР‚Р В°Р Р†Р В»Р ВµР Р…Р С‘РЎРЏ Р Р…Р В° РЎС“РЎвЂЎР ВµР В±Р Р…Р С•Р Вµ Р В·Р В°Р Р†Р ВµР Т‘Р ВµР Р…Р С‘Р Вµ',
  `Universities_id` int(11) NOT NULL COMMENT 'Р С”Р С•Р Т‘ РЎС“РЎвЂЎР ВµР В±Р Р…Р С•Р С–Р С• Р В·Р В°Р Р†Р ВµР Т‘Р ВµР Р…Р С‘РЎРЏ',
  `Users_id` int(11) NOT NULL COMMENT 'Р С”Р С•Р Т‘ Р С—Р С•Р В»РЎРЉР В·Р С•Р Р†Р В°РЎвЂљР ВµР В»РЎРЏ',
  `Roles_id` int(11) NOT NULL COMMENT 'Р С”Р С•Р Т‘ РЎР‚Р С•Р В»Р С‘',
  PRIMARY KEY (`id`),
  KEY `fk_UsersUniversities_Universities1` (`Universities_id`),
  KEY `fk_UsersUniversities_Users1` (`Users_id`),
  KEY `fk_UsersUniversities_Roles1` (`Roles_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `UsersUniversities`
--


-- --------------------------------------------------------

--
-- Table structure for table `Values`
--

CREATE TABLE IF NOT EXISTS `Values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UsersSubjectsCurricula_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РїСЂРµРґРјРµС‚/РїСЂРµРїРѕРґР°РІР°С‚РµР»СЏ/СѓС‡.РїР»Р°РЅ',
  `Users_id` int(11) NOT NULL COMMENT 'РЎСЃС‹Р»РєР° РЅР° РєСѓСЂСЃР°РЅС‚Р°',
  `Data` date NOT NULL COMMENT 'Р”Р°С‚Р°',
  `Value` varchar(2) NOT NULL COMMENT 'РћС†РµРЅРєР°',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РћС†РµРЅРєРё' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Values`
--

INSERT INTO `Values` (`id`, `UsersSubjectsCurricula_id`, `Users_id`, `Data`, `Value`) VALUES
(1, 8, 7, '2011-11-09', '5'),
(2, 8, 7, '2011-11-10', 'РЅРї');
