-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Jan 2014 um 15:33
-- Server Version: 5.5.32
-- PHP-Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `umfrage_kaj_bossard`
--
CREATE DATABASE IF NOT EXISTS `umfrage_kaj_bossard` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `umfrage_kaj_bossard`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragen`
--

CREATE TABLE IF NOT EXISTS `fragen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_umfrage` int(11) NOT NULL,
  `frage` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `fragen`
--

INSERT INTO `fragen` (`id`, `fk_umfrage`, `frage`) VALUES
(1, 1, 'Prosciutto bresaola beef landjaeger kielbasa '),
(2, 1, 'Chicken hamburger pork chop pork loin rum?'),
(3, 1, ' Tri-tip tenderloin turducken jowl ground rou'),
(4, 1, 'Pig pastrami beef, shoulder meatball brisket?'),
(5, 2, 'Ut wisi enim ad minim veniam?'),
(6, 2, 'Duis autem vel eum iriure dolor in?'),
(7, 2, 'Nam liber tempor cum soluta nobis?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_umfrage` int(11) NOT NULL,
  `hash` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `links`
--

INSERT INTO `links` (`id`, `fk_umfrage`, `hash`) VALUES
(1, 1, 'd0e0b4f7840a8bda2183ce556df86fce708dcfa1'),
(2, 2, '73d290298b56d7ee59f111b8de8a18dc0246811d');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Daten für Tabelle `log`
--

INSERT INTO `log` (`id`, `fk_user`, `timestamp`, `log`) VALUES
(1, 1, '2014-01-09 14:14:26', 'login'),
(2, 1, '2014-01-09 14:21:22', 'logout'),
(3, 2, '2014-01-09 14:21:41', 'login'),
(4, 2, '2014-01-09 14:25:30', 'logout'),
(5, 3, '2014-01-09 14:25:54', 'login'),
(6, 1, '2014-01-09 14:30:20', 'login'),
(7, 1, '2014-01-09 14:30:49', 'logout'),
(8, 2, '2014-01-09 14:31:03', 'login'),
(9, 3, '2014-01-09 14:31:52', 'logout'),
(10, 2, '2014-01-09 14:32:16', 'login'),
(11, 2, '2014-01-09 14:32:21', 'logout'),
(12, 3, '2014-01-09 14:32:33', 'login'),
(13, 3, '2014-01-09 14:32:40', 'logout');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `resultate`
--

CREATE TABLE IF NOT EXISTS `resultate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_umfrage` int(11) NOT NULL,
  `fk_frage` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `antwort` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Daten für Tabelle `resultate`
--

INSERT INTO `resultate` (`id`, `fk_umfrage`, `fk_frage`, `fk_user`, `antwort`) VALUES
(1, 1, 1, 1, '25'),
(2, 1, 2, 1, '75'),
(3, 1, 3, 1, '75'),
(4, 1, 4, 1, '100'),
(5, 1, 1, 1, '0'),
(6, 1, 2, 1, '0'),
(7, 1, 3, 1, '25'),
(8, 1, 4, 1, '0'),
(9, 1, 1, 1, '25'),
(10, 1, 2, 1, '25'),
(11, 1, 3, 1, '25'),
(12, 1, 4, 1, '75'),
(13, 1, 1, 1, '75'),
(14, 1, 2, 1, '100'),
(15, 1, 3, 1, '75'),
(16, 1, 4, 1, '75'),
(17, 1, 1, 1, '100'),
(18, 1, 2, 1, '100'),
(19, 1, 3, 1, '0'),
(20, 1, 4, 1, '100'),
(21, 1, 1, 1, NULL),
(22, 1, 2, 1, NULL),
(23, 1, 3, 1, NULL),
(24, 1, 4, 1, NULL),
(25, 1, 1, 2, '75'),
(26, 1, 2, 2, '25'),
(27, 1, 3, 2, '25'),
(28, 1, 4, 2, '100'),
(29, 1, 1, 2, '25'),
(30, 1, 2, 2, '25'),
(31, 1, 3, 2, '25'),
(32, 1, 4, 2, '100'),
(33, 1, 1, 2, '75'),
(34, 1, 2, 2, '25'),
(35, 1, 3, 2, NULL),
(36, 1, 4, 2, NULL),
(37, 1, 1, 2, NULL),
(38, 1, 2, 2, NULL),
(39, 1, 3, 2, '100'),
(40, 1, 4, 2, '25'),
(41, 2, 5, 0, NULL),
(42, 2, 6, 0, NULL),
(43, 2, 7, 0, NULL),
(44, 2, 5, 0, '25'),
(45, 2, 6, 0, '0'),
(46, 2, 7, 0, '25'),
(47, 2, 5, 0, '0'),
(48, 2, 6, 0, '25'),
(49, 2, 7, 0, '0'),
(50, 2, 5, 0, '100'),
(51, 2, 6, 0, '75'),
(52, 2, 7, 0, '25'),
(53, 2, 5, 0, '25'),
(54, 2, 6, 0, '75'),
(55, 2, 7, 0, '100'),
(56, 2, 5, 0, '100'),
(57, 2, 6, 0, '75'),
(58, 2, 7, 0, '100'),
(59, 2, 5, 0, '75'),
(60, 2, 6, 0, '100'),
(61, 2, 7, 0, '75'),
(62, 2, 5, 1, '0'),
(63, 2, 6, 1, '25'),
(64, 2, 7, 1, '100'),
(65, 2, 5, 2, '0'),
(66, 2, 6, 2, '0'),
(67, 2, 7, 2, '0');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `umfragen`
--

CREATE TABLE IF NOT EXISTS `umfragen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `beschreibung` text NOT NULL,
  `erstell_datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `umfragen`
--

INSERT INTO `umfragen` (`id`, `fk_user`, `titel`, `beschreibung`, `erstell_datum`) VALUES
(1, 1, 'Bacon ipsum', 'Bacon ipsum dolor sit amet fatback sirloin tenderloin flank turducken jowl swine landjaeger. Shoulder chuck capicola rump, pork beef ground round. Swine landjaeger sirloin meatball ribeye, short loin bacon chuck tenderloin turducken flank venison. Landjaeger meatloaf ham hock spare ribs, ball tip tongue shank pork loin.', '2014-01-09 14:18:03'),
(2, 3, 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. ', '2014-01-09 14:28:13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `geschlecht` varchar(20) DEFAULT NULL,
  `geburtstag` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `geschlecht`, `geburtstag`) VALUES
(1, 'Person 1', 'pers1@domain.ch', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Weiblich', '10.8.1979'),
(2, 'Person 2', 'pers2@domain.ch', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 'MÃ¤nnlich', '14.6.1974'),
(3, 'Pseron 3', 'pers3@domain.ch', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'MÃ¤nnlich', '10.7.1975');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
