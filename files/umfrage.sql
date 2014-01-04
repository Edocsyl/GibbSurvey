-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Jan 2014 um 15:35
-- Server Version: 5.5.32
-- PHP-Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `umfrage`
--
CREATE DATABASE IF NOT EXISTS `umfrage` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `umfrage`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragen`
--

CREATE TABLE IF NOT EXISTS `fragen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_umfrage` int(11) NOT NULL,
  `frage` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Daten für Tabelle `fragen`
--

INSERT INTO `fragen` (`id`, `fk_umfrage`, `frage`) VALUES
(18, 1, 'Wie ist das Wetter heute?'),
(19, 1, 'Wie wird das Wetter Morgen?'),
(20, 1, 'Ist es in drei Tagen noch schÃ¶nes Wetter?'),
(21, 1, 'Wie gefÃ¤llt Ihnen das Wetter?'),
(22, 2, 'Woppediwoop 1'),
(23, 2, 'Wop 2'),
(24, 2, 'Wooooo 33'),
(25, 2, 'Wooop 4'),
(26, 2, 'Wopediwaaap 5'),
(27, 3, 'Hallo was?'),
(28, 3, 'Test?'),
(29, 3, 'Frage 3?'),
(30, 3, '444?'),
(31, 3, '5 frage?'),
(32, 3, '6te frage?'),
(33, 3, '7te Frage?'),
(34, 4, 'Frage nr. 1'),
(35, 4, 'Frage 2'),
(36, 4, 'Frage 3'),
(37, 5, 'Wie finden sie designtechnisch die Webseite?'),
(38, 5, 'Wie finden sie sie zum bedienen?'),
(39, 5, 'Wie war das wetter in der letzten Zeit?'),
(40, 5, 'Wie gefÃ¤llt Ihnen das Wetter?'),
(41, 5, 'Ist es heute schÃ¶n?'),
(42, 6, 'aiosdasipodjaipodjpasiodj'),
(43, 6, 'poijmpiojmipojmipojmpoim'),
(44, 6, 'ompompompompompo'),
(45, 7, 'Wie finden Sie leed?'),
(46, 7, 'Was bedeutet ihnen leed?'),
(47, 7, 'Und nosch weiter scheisse?'),
(48, 7, 'Tja bitches=?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_umfrage` int(11) NOT NULL,
  `hash` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `links`
--

INSERT INTO `links` (`id`, `fk_umfrage`, `hash`) VALUES
(1, 1, '595a1443ae9968db01db6e155e83f18207ce1107'),
(2, 2, 'd627dd3e234eadd5c4193a590395ab8da5805489'),
(3, 3, '5fa710ac256afd3b78937cd28cfdb2767aede796'),
(4, 4, '248ea2789e91424a2e19a95bc56c97d6a10967f7'),
(5, 5, 'f80d1dfb9bcc54321850646f050b2e295fc647df'),
(6, 6, '2405819ac436bcd80cc466a744da6f3da19ecd06'),
(7, 0, 'ab5d868ae42c9814fef600ca9cbe49cf3360a184'),
(8, 7, 'e7240813030b6c4e2e2dffaba23040535c2fb7aa');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Daten für Tabelle `log`
--

INSERT INTO `log` (`id`, `fk_user`, `timestamp`, `log`) VALUES
(1, 1, '2014-01-03 15:30:05', 'logout'),
(2, 7, '2014-01-03 15:37:22', 'login'),
(3, 7, '2014-01-03 15:46:29', 'logout'),
(4, 1, '2014-01-03 15:47:15', 'login'),
(5, 1, '2014-01-03 19:17:40', 'logout'),
(6, 1, '2014-01-03 19:17:56', 'login'),
(7, 1, '2014-01-03 19:22:40', 'logout'),
(8, 1, '2014-01-03 19:24:06', 'login'),
(9, 1, '2014-01-03 19:27:36', 'logout'),
(10, 1, '2014-01-03 19:27:42', 'login'),
(11, 1, '2014-01-03 19:34:54', 'logout'),
(12, 1, '2014-01-03 19:36:40', 'login'),
(13, 1, '2014-01-04 11:25:44', 'logout'),
(14, 1, '2014-01-04 11:25:53', 'login');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `umfragen`
--

INSERT INTO `umfragen` (`id`, `fk_user`, `titel`, `beschreibung`, `erstell_datum`) VALUES
(1, 1, 'Wie ist das wetter heute', 'Eine Umfrage um das Wetter', '0000-00-00 00:00:00'),
(2, 4, 'Woop', 'Die umfrage Woooop', '2014-01-02 00:29:04'),
(3, 1, 'Umfrage Nr 2 und so', 'Test woop beschreibung', '2014-01-02 10:40:06'),
(4, 1, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2014-01-02 17:37:45'),
(5, 1, 'Umfrage der zum Umfrage Tool GibbSurvey', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '2014-01-03 14:56:43'),
(6, 7, 'Eine Umfrage um den shit', 'Hallo wie war es heute oder auch nicht vbli blasd adasd\r\nsfasdfasdf\r\nsdfsdf\r\nasdf', '2014-01-03 15:40:54'),
(7, 1, 'Umrage 1337', 'Leed umfrage', '2014-01-04 14:02:28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `geschlecht`, `geburtstag`) VALUES
(1, 'Kaj', 'kaj@edocsyl.ch', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'MÃ¤nnlich', '1.1.1967'),
(2, 'Max Muster', 'max.muster@shizzle.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'MÃ¤nnlich', '13.9.2005'),
(3, 'Test Bla', 'test.blah@blibla.ch', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Weiblich', '12.8.1977'),
(4, 'Wuop', 'thouali@asdasda.de', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Geschlecht', 'Tag.Monat.Jahr'),
(5, 'kaj', 'kaj@asdasd.de', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Geschlecht', 'Tag.Monat.Jahr'),
(7, 'Test Person', 'person.tes@wopa.de', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'MÃ¤nnlich', '3.3.1973');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
