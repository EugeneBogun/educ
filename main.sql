-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2011 at 05:31 PM
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
  `name` varchar(45) NOT NULL COMMENT 'Номер/название корпуса',
  `Universities_id` int(11) NOT NULL COMMENT 'Ссылка на университет',
  PRIMARY KEY (`id`),
  KEY `fk_Buildings_Universities1` (`Universities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Здания' AUTO_INCREMENT=5 ;

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
  `name` varchar(45) NOT NULL COMMENT 'Название',
  `Countries_id` int(11) NOT NULL COMMENT 'Страна',
  PRIMARY KEY (`id`),
  KEY `fk_Cities_Countries1` (`Countries_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Города' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Cities`
--

INSERT INTO `Cities` (`id`, `name`, `Countries_id`) VALUES
(1, 'Кривой Рог', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Classrooms`
--

CREATE TABLE IF NOT EXISTS `Classrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Номер/имя комнаты',
  `ClassRoomsTypes_id` int(11) DEFAULT NULL COMMENT 'Ссылка на тип кабинета',
  `Buildings_id` int(11) DEFAULT NULL COMMENT 'Ссылка на Номер корпуса',
  PRIMARY KEY (`id`),
  KEY `fk_Classrooms_ClassRoomsTypes1` (`ClassRoomsTypes_id`),
  KEY `fk_Classrooms_Buildings1` (`Buildings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
(9, 'Спортзал №1', 3, 4),
(10, 'Спортзал №2', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Countries`
--

CREATE TABLE IF NOT EXISTS `Countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='РўР°Р±Р»РёС†Р° СЃС‚СЂР°РЅ' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Countries`
--

INSERT INTO `Countries` (`id`, `name`) VALUES
(1, 'Украина');

-- --------------------------------------------------------

--
-- Table structure for table `Curricula`
--

CREATE TABLE IF NOT EXISTS `Curricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Имя учебного плана',
  `year_start` varchar(4) NOT NULL COMMENT 'Год начала',
  `year_end` varchar(4) DEFAULT NULL COMMENT 'Год конца',
  `Dep_Spec_id` int(11) NOT NULL COMMENT 'Ссылка на отделение/специальность',
  PRIMARY KEY (`id`),
  KEY `fk_Curricula_Dep_Spec1` (`Dep_Spec_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Учебный план' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Curricula`
--

INSERT INTO `Curricula` (`id`, `name`, `year_start`, `year_end`, `Dep_Spec_id`) VALUES
(1, 'Учебный план программистов', '2007', '2010', 1),
(2, 'Учебный план программистов', '2010', '2014', 1),
(3, 'Учебный план сетевиков', '2007', '2009', 2);

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
(1, 'Компьютерної та програмної інженерії', 'КПІ', NULL, NULL, 1),
(2, 'Авіоніка', 'Авіоніка', NULL, NULL, 1),
(3, 'Організація авіаційних перевезень', 'Перевозки', NULL, NULL, 1),
(4, 'Радіо', 'Радіо', NULL, NULL, 1),
(5, 'Механіки', 'Механіки', NULL, NULL, 1),
(6, 'Загальноосвітних дисциплін', 'ЗД', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Dep_Spec`
--

CREATE TABLE IF NOT EXISTS `Dep_Spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Specialty_id` int(11) NOT NULL COMMENT 'Ссылка на специальность',
  `Departments_id` int(11) NOT NULL COMMENT 'Ссылка на отделение',
  PRIMARY KEY (`id`),
  KEY `fk_SubDep_Spec_Specialty1` (`Specialty_id`),
  KEY `fk_Dep_Spec_Departments1` (`Departments_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Отделение-специльаность' AUTO_INCREMENT=3 ;

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
  `name` varchar(16) NOT NULL COMMENT 'Название группы',
  `YearCreate` int(11) NOT NULL COMMENT 'Год создания',
  `description` varchar(100) DEFAULT NULL COMMENT 'Описание',
  `Curricula_id` int(11) NOT NULL COMMENT 'Ссылка на учебный план',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0 - 9 класс,1 - 11 класс',
  PRIMARY KEY (`id`),
  KEY `fk_Groups_Curricula1` (`Curricula_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Группы' AUTO_INCREMENT=6 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Приглашения' AUTO_INCREMENT=18 ;

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
  `Users_id_from` int(11) NOT NULL COMMENT 'От кого',
  `text` text NOT NULL COMMENT 'Текст',
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата и время',
  `status` tinyint(1) DEFAULT '1' COMMENT 'Статус сообщения',
  `Users_id_to` int(11) NOT NULL COMMENT 'Кому',
  PRIMARY KEY (`id`),
  KEY `fk_Messages_Users1` (`Users_id_from`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Личные сообщения' AUTO_INCREMENT=22 ;

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
(21, 0, '0', '2011-10-26 18:18:40', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Organizations`
--

CREATE TABLE IF NOT EXISTS `Organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Р°СѓС‚РѕРёРЅРєСЂРµРјРµРЅС‚',
  `name` varchar(45) NOT NULL COMMENT 'РЅР°Р·РІР°РЅРёРµ РѕСЂРіР°РЅРёР·Р°С†РёРё',
  `Universities_id` int(11) NOT NULL COMMENT 'РєРѕРґ СѓРЅРёРІРµСЂСЃРёС‚РµС‚Р° РєСЂСѓР¶РєР°',
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
  `name` varchar(45) NOT NULL COMMENT 'Название',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Роли' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`id`, `name`) VALUES
(1, 'Курсант'),
(2, 'Преподаватель'),
(3, 'Лаборант'),
(4, 'Куратор'),
(5, 'Старшина'),
(6, 'Замстаршина'),
(7, 'Глава ЦК');

-- --------------------------------------------------------

--
-- Table structure for table `Specialties`
--

CREATE TABLE IF NOT EXISTS `Specialties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL COMMENT 'Код специальности',
  `fullname` varchar(75) DEFAULT NULL COMMENT 'Полное название',
  `name` varchar(25) DEFAULT NULL COMMENT 'Абревиатура',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Специальности' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Specialties`
--

INSERT INTO `Specialties` (`id`, `code`, `fullname`, `name`) VALUES
(1, '5.05010301', 'Разработка програмного обеспечения', 'РПО'),
(2, '5.05010201', 'Обслуговування комп''терних систем і мереж', 'ОКСМ');

-- --------------------------------------------------------

--
-- Table structure for table `SubDepartments`
--

CREATE TABLE IF NOT EXISTS `SubDepartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Departments_id` int(11) NOT NULL COMMENT 'Ссылка на отделение',
  `name` varchar(25) DEFAULT NULL COMMENT 'Абревиатура',
  `fullname` varchar(50) NOT NULL COMMENT 'Полное название',
  PRIMARY KEY (`id`),
  KEY `fk_SubDepartments_Departments1` (`Departments_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='ЦК' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `SubDepartments`
--

INSERT INTO `SubDepartments` (`id`, `Departments_id`, `name`, `fullname`) VALUES
(1, 1, 'ПЗ ЕОМ', 'Практичного застосування ЕОМ'),
(2, 1, 'ПОД', 'Професійно-оріентованих дисциплін'),
(3, 6, 'ПН', 'Природничих наук'),
(4, 6, 'ГН', 'Гумарнітарних наук');

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE IF NOT EXISTS `Subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(75) NOT NULL COMMENT 'Полное имя',
  `name` varchar(45) NOT NULL COMMENT 'Абревиатура',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Предметы' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`id`, `full_name`, `name`) VALUES
(1, 'Основи баз данных та знань', 'ОБДЗ'),
(2, 'Розробка клиент-серверной архитектуры', 'РЗИКСА'),
(3, 'Розробка засобів візуального програмування', 'ИЗВП'),
(4, 'Економіка підприємства', 'ЕП'),
(5, 'Фізична культура', 'фіз-ра'),
(7, 'Інтернет технології', 'ІТ'),
(6, 'Соціологія', 'Соціологія'),
(9, 'Політологія', 'Політологія'),
(10, 'Комп''ютерні мережі', 'КМ'),
(11, 'Менеджмент/Маркетинг', 'Мен./Марк.'),
(12, 'Веб-дизайн', 'Веб-дизайн');

-- --------------------------------------------------------

--
-- Table structure for table `Subjects_Curricula`
--

CREATE TABLE IF NOT EXISTS `Subjects_Curricula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curricula_id` int(11) NOT NULL COMMENT 'Ссылка на учебную программу',
  `Subjects_id` int(11) NOT NULL COMMENT 'Ссылка на предмет',
  `term` int(1) NOT NULL COMMENT 'Семестр',
  PRIMARY KEY (`id`),
  KEY `fk_Subjects_Curricula_Curricula1` (`curricula_id`),
  KEY `fk_Subjects_Curricula_Subjects1` (`Subjects_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Предмет-программа' AUTO_INCREMENT=14 ;

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
(9, 1, 9, 5),
(10, 1, 10, 5),
(11, 1, 11, 5),
(12, 1, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Timetable`
--

CREATE TABLE IF NOT EXISTS `Timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `week` int(11) NOT NULL COMMENT 'Имя недели',
  `day` int(11) DEFAULT NULL COMMENT 'Имя дня',
  `numder` int(11) DEFAULT NULL COMMENT 'Номер пары',
  `Groups_id` int(11) NOT NULL COMMENT 'Ссылка на группу',
  `Classrooms_id` int(11) NOT NULL COMMENT 'Ссылка на кабинет',
  `UsersSubjectsCurricula_id` int(11) NOT NULL COMMENT 'Ссылка на предме-специальность',
  PRIMARY KEY (`id`),
  KEY `fk_Timetable_Groups1` (`Groups_id`),
  KEY `fk_Timetable_Classrooms1` (`Classrooms_id`),
  KEY `fk_Timetable_UsersSubjectsCurricula1` (`UsersSubjectsCurricula_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Расписание' AUTO_INCREMENT=20 ;

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
(19, 2, 1, 3, 1, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Universities`
--

CREATE TABLE IF NOT EXISTS `Universities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT 'Название',
  `fullname` varchar(100) DEFAULT NULL COMMENT 'Полное название',
  `adress` varchar(45) DEFAULT NULL COMMENT 'Адресс',
  `Cities_id` int(11) NOT NULL COMMENT 'Ссылка на город',
  PRIMARY KEY (`id`),
  KEY `fk_Universities_Cities1` (`Cities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Universities`
--

INSERT INTO `Universities` (`id`, `name`, `fullname`, `adress`, `Cities_id`) VALUES
(1, 'КК НАУ', 'Криворожский коледж национального авиационного университета', 'ул. Туполева 1', 1),
(2, 'КНУ', 'Криворожский Национальный Университет', '22 Партсьезда 8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL COMMENT 'Почта',
  `password` varchar(16) NOT NULL COMMENT 'Пароль',
  `surname` varchar(45) NOT NULL COMMENT 'Фамилия',
  `name` varchar(45) NOT NULL COMMENT 'Имя',
  `datebithday` datetime DEFAULT NULL COMMENT 'Дата рождения',
  `last_ip` varchar(15) DEFAULT NULL COMMENT 'Последний IP',
  `last_login` datetime DEFAULT NULL COMMENT 'Последний вход',
  `nick` varchar(64) DEFAULT NULL COMMENT 'Ник',
  `avatar` varchar(200) DEFAULT NULL COMMENT 'Аватар',
  `patronymic` varchar(30) DEFAULT NULL COMMENT 'Отчество',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `surname`, `name`, `datebithday`, `last_ip`, `last_login`, `nick`, `avatar`, `patronymic`) VALUES
(7, 'max@a.ru', '123', 'Бугай', 'Максим', '0000-00-00 00:00:00', '127.0.0.1', '2011-09-07 17:58:43', '', '', NULL),
(8, 'vova@a.ru', '123', 'Куропятник', 'Вова', '2011-10-11 09:10:55', NULL, NULL, NULL, NULL, NULL),
(9, 'b@a.ru', '123', 'Бурак', 'Виктор', NULL, NULL, NULL, NULL, NULL, 'Дмитриевич'),
(10, 'с@a.ru', '123', 'Савенко ', 'Роман', NULL, NULL, NULL, NULL, NULL, 'Сергеевич'),
(11, 'd@a.ru', '123', 'Попика', 'Александр', NULL, NULL, NULL, NULL, NULL, 'Васильевич'),
(12, 'f@a.ru', '123', 'Смирнова', 'Надежда', NULL, NULL, NULL, NULL, NULL, 'Викторовна'),
(13, 'g@a.ru', '123', 'Кожаев', 'Андрей', NULL, NULL, NULL, NULL, NULL, 'Владимирович'),
(14, 'h@a.ru', '123', 'Богун', 'Евгений', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'j@a.ru', '123', 'Абрамов', 'Алексей', NULL, NULL, NULL, NULL, NULL, 'Владимирович'),
(16, 'dd@dd.ru', '123', 'Гасаненко', 'Денис', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'ds@a.ru', '123', 'Лисенко', 'Татьяна', NULL, NULL, NULL, NULL, NULL, 'Николаевна'),
(18, 'dfsa@a.ru', '123', 'Дворецкий', 'Дмитрий', NULL, NULL, NULL, NULL, NULL, 'Николаевич'),
(19, 'sads@a.ru', '123', 'Грипас', 'Лариса', NULL, NULL, NULL, NULL, NULL, 'Николаевна'),
(20, 'sdds@a.ru', '123', 'Кожаев', 'Андрей', NULL, NULL, NULL, NULL, NULL, 'Владимирович'),
(21, 'sdаds@a.ru', '123', 'Самохвалов', 'Юрий', NULL, NULL, NULL, NULL, NULL, 'Владимирович');

-- --------------------------------------------------------

--
-- Table structure for table `UsersDepartments`
--

CREATE TABLE IF NOT EXISTS `UsersDepartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Departments_id` int(11) NOT NULL COMMENT 'Ссылка на отделение',
  `Users_id` int(11) NOT NULL COMMENT 'Ссылка на пользователя',
  `Roles_id` int(11) NOT NULL COMMENT 'Ссылка на роль',
  PRIMARY KEY (`id`),
  KEY `fk_UsersDepartments_Departments1` (`Departments_id`),
  KEY `fk_UsersDepartments_Users1` (`Users_id`),
  KEY `fk_UsersDepartments_Roles1` (`Roles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Пользователи - отделения' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `UsersDepartments`
--


-- --------------------------------------------------------

--
-- Table structure for table `UsersGroups`
--

CREATE TABLE IF NOT EXISTS `UsersGroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(32) DEFAULT NULL COMMENT 'Описание',
  `Groups_id` int(11) NOT NULL COMMENT 'Ссылка на группу',
  `Users_id` int(11) NOT NULL COMMENT 'Ссылка на пользователя',
  `Roles_id` int(11) NOT NULL COMMENT 'Ссылка на роль',
  PRIMARY KEY (`id`),
  KEY `fk_GroupsUsers_Groups1` (`Groups_id`),
  KEY `fk_UsersGroups_Users1` (`Users_id`),
  KEY `fk_UsersGroups_Roles1` (`Roles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Пользователи - группы' AUTO_INCREMENT=22 ;

--
-- Dumping data for table `UsersGroups`
--

INSERT INTO `UsersGroups` (`id`, `description`, `Groups_id`, `Users_id`, `Roles_id`) VALUES
(1, NULL, 1, 7, 1),
(9, NULL, 3, 14, 1),
(16, 'вручную', 1, 8, 1),
(19, NULL, 1, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `UsersOrganizations`
--

CREATE TABLE IF NOT EXISTS `UsersOrganizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'РєРѕРґ СЃРІСЏР·Рё РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ СЃ РїСЂР°РІР°РјРё Р° СѓРїСЂР°РІР»РµРЅРёСЏ РѕСЂРіР°РЅРёР·Р°С†РёРµР№',
  `Organizations_id` int(11) NOT NULL COMMENT 'РєРѕРґ РѕСЂРіР°РЅРёР·Р°С†РёРё СѓС‡РµР±РЅРѕРіРѕ Р·Р°РІРµРґРµРЅРёСЏ',
  `Users_id` int(11) NOT NULL COMMENT 'РєРѕРґ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ',
  `Roles_id` int(11) NOT NULL COMMENT 'РєРѕРґ СЂРѕР»Рё',
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
  `Subjects_Curricula_id` int(11) NOT NULL COMMENT 'ссылка на предмет-учебный план',
  `Users_id` int(11) DEFAULT NULL COMMENT 'Ссылка на пользователя',
  `Roles_id` int(11) DEFAULT NULL COMMENT 'Ссылка на роль',
  PRIMARY KEY (`id`),
  KEY `fk_UsersSubjectsCurricula_Subjects_Curricula1` (`Subjects_Curricula_id`),
  KEY `fk_UsersSubjectsCurricula_Users1` (`Users_id`),
  KEY `fk_UsersSubjectsCurricula_Roles1` (`Roles_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Преподаватель-предмет-учебный план' AUTO_INCREMENT=17 ;

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
(16, 12, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `UsersUniversities`
--

CREATE TABLE IF NOT EXISTS `UsersUniversities` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'РєРѕРґ СЃРІСЏР·Рё РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ СЃ С„СѓРЅРєС†РёСЏРјРё СѓРїСЂР°РІР»РµРЅРёСЏ РЅР° СѓС‡РµР±РЅРѕРµ Р·Р°РІРµРґРµРЅРёРµ',
  `Universities_id` int(11) NOT NULL COMMENT 'РєРѕРґ СѓС‡РµР±РЅРѕРіРѕ Р·Р°РІРµРґРµРЅРёСЏ',
  `Users_id` int(11) NOT NULL COMMENT 'РєРѕРґ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ',
  `Roles_id` int(11) NOT NULL COMMENT 'РєРѕРґ СЂРѕР»Рё',
  PRIMARY KEY (`id`),
  KEY `fk_UsersUniversities_Universities1` (`Universities_id`),
  KEY `fk_UsersUniversities_Users1` (`Users_id`),
  KEY `fk_UsersUniversities_Roles1` (`Roles_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `UsersUniversities`
--

