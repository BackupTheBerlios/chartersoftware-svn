-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 02. Juli 2009 um 17:33
-- Server Version: 5.1.33
-- PHP-Version: 5.2.9

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

SET sql_mode = 'STRICT_ALL_TABLES';
DROP TABLE IF EXISTS `vorgaenge`;
DROP TABLE IF EXISTS `flugzeugs`;
DROP TABLE IF EXISTS `flugzeuge`;
DROP TABLE IF EXISTS `flugzeugtyps`;
DROP TABLE IF EXISTS `flugzeugtypen`;
DROP TABLE IF EXISTS `flugzeugherstellers`;
DROP TABLE IF EXISTS `flugzeughersteller`;
DROP TABLE IF EXISTS `flugplatzentfernungs`;
DROP TABLE IF EXISTS `flugplatzs`;
DROP TABLE IF EXISTS `flugplaetze`;
DROP TABLE IF EXISTS `zeitzones`;
DROP TABLE IF EXISTS `zeitzonen`;
DROP TABLE IF EXISTS `mehrwertsteuersaetze`;
DROP TABLE IF EXISTS `vorgangstypen`;
DROP TABLE IF EXISTS `leistungstypen`;
DROP TABLE IF EXISTS `zufriedenheitstypen`;
DROP TABLE IF EXISTS `adressen`;
DROP TABLE IF EXISTS `reports`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cake`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `adressen`
--

CREATE TABLE IF NOT EXISTS `adressen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firma` varchar(50) DEFAULT NULL,
  `abteilung` varchar(50) DEFAULT NULL,
  `ansprechpartner` varchar(50) NOT NULL,
  `strasse` varchar(50) NOT NULL,
  `plz` varchar(5) NOT NULL,
  `ort` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Daten für Tabelle `adressen`
--

INSERT INTO `adressen` (`id`, `firma`, `abteilung`, `ansprechpartner`, `strasse`, `plz`, `ort`) VALUES
(1, 'Turbo Soft Gmbh', 'Geschäftsleitung', 'Heinrich Müller', 'Feldweg 20', '12345', 'Berlin'),
(4, 'ThinkLogics', 'Projektleitung', 'F. Geist', 'Hauptstr. 13', '23423', 'Mochingen'),
(5, 'Baby Welt GmbH', 'Endkundenbetreuung', 'Martin Schmidt', 'Obere Straße', '23422', 'München'),
(6, 'Bayer AG', 'Management', 'Herr Müller', 'Werkstrasse 11', '51368', 'Leverkusen'),
(7, 'Nike', 'Entwicklung', 'Herr Pfrommer', 'Hessenring 13a', '64546', 'Mörfelden'),
(8, 'Softronic', 'Programmierung', 'Herr Lämmer', 'Hessenweg 7', '80331', 'München'),
(9, 'Leichtmetall Kassel GmbH', 'Controlling', 'Frau Gürlich', 'Max-Planck-Strasse 78', '34001', 'Kassel'),
(10, 'Bayrische Motoren Werke AG', 'Entwicklung', 'Frau Groß', 'Heidemannstrasse 164 ', '80788', 'München'),
(11, 'Volkswagen', 'Werbung', 'Frau Jessen', 'Berliner Ring 2', '38436', 'Wolfsburg'),
(12, 'Deutsche Bank ', 'Verwaltung', 'Herr Maier', 'Taunusanlage 12', '60325', 'Frankfurt am Main');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flugplaetze`
--

CREATE TABLE IF NOT EXISTS `flugplaetze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `iata` varchar(10) DEFAULT NULL,
  `geoPosition` varchar(35) NOT NULL,
  `zeitzone_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `geoPosition` (`geoPosition`),
  KEY `iata` (`iata`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `flugplaetze`
--

INSERT INTO `flugplaetze` (`id`, `name`, `iata`, `geoPosition`, `zeitzone_id`) VALUES
(1, 'Essen-Mülheim', 'ESS/EDLE', '51°24''08"N, 006°56''14"O', 400),
(3, 'Frankfurt-Engelsbach', 'QEF', '49°57''39"N, 8°38''29" O', 400),
(5, 'Dresden Airport', 'DRS/EDDC', '51°07''58"N, 013°46''02"O', 400),
(6, 'Erfurt Airport', 'ERF/EDDE', '50°58''47"N, 010°57''29"E', 400),
(7, 'Augsburg Airport', 'AGB/EDMA', '48°25''31"N, 010°55''54"E', 400),
(9, 'München', 'MUC', '48°21''14″ N, 11°47''10"O', 403),
(10,'New York','AGB/EDMA','40°41''33"N, 074°10''07"E',400);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flugzeuge`
--

CREATE TABLE IF NOT EXISTS `flugzeuge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kennzeichen` varchar(50) NOT NULL,
  `flugzeugtyp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kennzeichen` (`kennzeichen`),
  KEY `flugzeuge_flugzeugtyp_id` (`flugzeugtyp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Daten für Tabelle `flugzeuge`
--

INSERT INTO `flugzeuge` (`id`, `kennzeichen`, `flugzeugtyp_id`) VALUES
(1, 'NA-1', 1),
(2, 'NA-2', 1),
(3, 'NA-3', 1),
(4, 'NA-4', 1),
(5, 'NA-5', 1),
(6, 'NA-6', 1),
(7, 'M-1', 2),
(8, 'M-2', 2),
(9, 'M-3', 2),
(10, 'M-4', 2),
(11, 'M-5', 2),
(12, 'M-6', 2),
(13, 'CX-1', 3),
(14, 'CX-2', 3),
(15, 'GU-1', 4),
(16, 'GU-2', 4),
(17, 'BO-1', 5),
(18, 'PI-1', 6),
(19, 'PI-2', 6),
(20, 'PI-3', 6),
(21, 'PI-4', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flugzeughersteller`
--

CREATE TABLE IF NOT EXISTS `flugzeughersteller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) DEFAULT 'http://',
  `information` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `flugzeughersteller`
--

INSERT INTO `flugzeughersteller` (`id`, `name`, `link`, `information`) VALUES
(1, 'Boing', 'http://www.boeing.com/', '<p>Das US-amerikanische Unternehmen <b>Boeing</b> <i>(The Boeing Company)</i> ist der weltweit größte Hersteller von zivilen und militärischen <a href="/wiki/Flugzeug" title="Flugzeug">Flugzeugen</a> und <a href="/wiki/Hubschrauber" title="Hubschrauber">Hubschraubern</a> sowie von Militär- und Weltraumtechnik.</p>\r\n<p>Mit <a href="/wiki/Airbus" title="Airbus">Airbus</a> bildet Boeing das <a href="/wiki/Duopol_f%C3%BCr_Gro%C3%9Fraumflugzeuge" title="Duopol für Großraumflugzeuge">Duopol für Großraumflugzeuge</a>.</p>\r\n<table id="toc" class="toc" summary="Inhaltsverzeichnis">'),
(2, 'Airbus', NULL, NULL),
(3, 'Aerocar', NULL, NULL),
(4, 'Agusta', NULL, NULL),
(5, 'Aichi', NULL, NULL),
(6, 'Alvis', NULL, NULL),
(7, 'British Aircraft Corporation', NULL, NULL),
(8, 'Cessna Aircraft Company', NULL, NULL),
(9, 'Gulfstream', NULL, NULL),
(10, 'Bombardier', NULL, NULL),
(11, 'Piper', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flugzeugtypen`
--

CREATE TABLE IF NOT EXISTS `flugzeugtypen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flugzeughersteller_id` int(11) NOT NULL,
  `bild` varchar(255) DEFAULT NULL,
  `wikipedia` varchar(255) DEFAULT NULL,
  `reichweite` int(11) NOT NULL DEFAULT '0',
  `vmax` int(11) NOT NULL DEFAULT '0',
  `jahreskosten` double NOT NULL DEFAULT '0',
  `stundenkosten` double NOT NULL DEFAULT '0',
  `crewPersonal` tinyint(4) NOT NULL DEFAULT '1',
  `cabinPersonal` tinyint(4) NOT NULL DEFAULT '0',
  `seats` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `flugzeugtypen_flugzeughersteller_id` (`flugzeughersteller_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `flugzeugtypen`
--

INSERT INTO `flugzeugtypen` (`id`, `name`, `flugzeughersteller_id`, `bild`, `wikipedia`, `reichweite`, `vmax`, `jahreskosten`, `stundenkosten`, `crewPersonal`, `cabinPersonal`, `seats`) VALUES
(1, 'Citation CJ1', 8, 'cj1.jpg', 'http://de.wikipedia.org/wiki/Cessna_CitationJet', 2408, 720, 218000, 727, 1, 0, 6),
(2, 'Citation Mustang', 8, 'mustang.jpg', 'http://de.wikipedia.org/wiki/Cessna_Citation_Mustang', 2366, 620, 107000, 420, 1, 0, 4),
(3, 'Citation CXLR', 8, 'cxlr.jpg', 'html://nowhere.de', 4009, 795, 242400, 680, 2, 1, 4),
(4, 'GIV SP', 9, 'givsp.jpg', 'http://www.aerokurier.de/de/gulfstream-giv-sp.5595.htm', 7820, 851, 453300, 2780, 2, 1, 8),
(5, 'Global Express', 10, 'globalexpress.jpg', 'html://nowhere.de', 12038, 935, 513000, 3100, 2, 2, 8),
(6, 'Malibu Mirage', 11, 'mirage.jpg', 'html://nowhere.de', 2491, 394, 60000, 200, 1, 0, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `leistungstypen`
--

CREATE TABLE IF NOT EXISTS `leistungstypen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschreibung` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beschreibung` (`beschreibung`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `leistungstypen`
--

INSERT INTO `leistungstypen` (`id`, `beschreibung`) VALUES
(3, 'Individualleistung'),
(2, 'Zeitflug'),
(1, 'Zielflug');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mehrwertsteuersaetze`
--

CREATE TABLE IF NOT EXISTS `mehrwertsteuersaetze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschreibung` varchar(25) NOT NULL,
  `satz` int(4) NOT NULL,
  `scale` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beschreibung` (`beschreibung`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `mehrwertsteuersaetze`
--

INSERT INTO `mehrwertsteuersaetze` (`id`, `beschreibung`, `satz`, `scale`) VALUES
(1, 'Voller Satz', 1900, 100),
(2, 'Halber Satz', 700, 100),
(3, 'Steuerfrei', 0, 100);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `befehl` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `reports`
--

INSERT INTO `reports` (`id`, `name`, `befehl`) VALUES
(1, 'Liste aller Flugzeugtypen', ' select * from flugzeugtypen;'),
(2, 'Liste aller Kunden', ' select * from adressen; '),
(3, 'Offene Rechnungen', 'select * from vorgaenge where brutto_soll > brutto_ist AND vorgangstyp_id = 3;'),
(4, 'Faellige Rechnungen', 'select * from vorgaenge LEFT JOIN adressen ON vorgaenge.adresse_id = adressen.id where vorgaenge.brutto_soll > vorgaenge.brutto_ist AND vorgaenge.vorgangstyp_id = 3 AND DATE_ADD(vorgaenge.datum,INTERVAL 30 DAY) < Now();');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorgaenge`
--

CREATE TABLE IF NOT EXISTS `vorgaenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date DEFAULT NULL,
  `zeitcharter` int(1) NOT NULL,
  `vonDatum` date DEFAULT NULL,
  `bisDatum` date DEFAULT NULL,
  `vorgangstyp_id` int(11) NOT NULL,
  `adresse_id` int(11) NOT NULL,
  `AnzahlPersonen` int(11) NOT NULL,
  `AnzahlFlugbegleiter` int(11) NOT NULL DEFAULT '0',
  `flugzeugtyp_id` int(11) NOT NULL,
  `zufriedenheitstyp_id` int(11) DEFAULT NULL,
  `flugstrecke` varchar(200) NOT NULL,
  `sonderwunsch` varchar(250) DEFAULT '',
  `sonderwunsch_netto` double DEFAULT '0',
  `netto` double NOT NULL DEFAULT '0',
  `mwst` double NOT NULL DEFAULT '0',
  `brutto_stunde` double NOT NULL DEFAULT '0',
  `reisezeit` double NOT NULL DEFAULT '0',
  `brutto_soll` double NOT NULL DEFAULT '0',
  `brutto_ist` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `adresse_id` (`adresse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Daten für Tabelle `vorgaenge`
--

INSERT INTO `vorgaenge` (`id`, `datum`, `zeitcharter`, `vonDatum`, `bisDatum`, `vorgangstyp_id`, `adresse_id`, `AnzahlPersonen`, `AnzahlFlugbegleiter`, `flugzeugtyp_id`, `zufriedenheitstyp_id`, `flugstrecke`, `sonderwunsch`, `sonderwunsch_netto`, `netto`, `mwst`, `brutto_stunde`, `reisezeit`, `brutto_soll`, `brutto_ist`) VALUES
(19, '2009-05-03', 0, '2009-05-01', '2009-05-02', 1, 1, 2, 1, 4, 3, '8;5;1', '', NULL, 4766.96, 905.72, 0, 1.16176470588, 5672.68, 300.50),
(21, '2009-05-03', 0, '2009-05-01', '2009-05-02', 3, 1, 2, 1, 4, NULL, '8;5;1', '', NULL, 4766.96, 905.72, 0, 1.16176470588, 10000.68, 1000.50),
(23, '2009-05-03', 0, '2009-05-01', '2009-05-02', 3, 1, 2, 1, 4, 1, '8;5;1', '', NULL, 4766.96, 905.72, 0, 1.16176470588, 5672.68, 0),
(25, '2009-05-05', 0, '2009-05-04', '2009-05-05', 3, 5, 2, 0, 5, NULL, '5;3', '', NULL, 4766.96, 905.72, 0, 1.16176470588, 5672.68, 0),
(26, '2009-05-03', 0, '2009-07-06', '2009-07-10', 2, 6, 1, 1, 6, NULL, '3;5', '', NULL, 555.9, 105.62, 0, 1.72715736041, 661.52, 0),
(27, '2009-07-02', 0, '2009-07-08', '2009-07-16', 3, 10, 1, 0, 2, NULL, '5;1', '', NULL, 913.98, 173.66, 0, 1.51774193548, 1087.64, 0),
(28, '2009-07-02', 0, '2009-07-20', '2009-07-23', 3, 12, 2, 0, 1, NULL, '9;3', '', NULL, 1715.24, 325.9, 0, 1.65833333333, 2041.14, 0),
(29, '2009-07-02', 1, '2009-07-05', '2009-07-10', 3, 9, 2, 0, 5, NULL, '6;9', '', NULL, 4071.6, 773.6, 0, 1, 4845.2, 0),
(30, '2009-02-08', 0, '2009-02-10', '2009-04-07', 3, 7, 2, 0, 5, NULL, '6;3', '', NULL, 0, 0, 0, 0, 0, 0),
(31, '2009-07-02', 1, '2009-07-08', '2009-07-15', 3, 8, 1, 0, 5, 6, '7;9', '', NULL, 4071.6, 773.6, 0, 1, 4845.2, 4878.05),
(32, '2009-07-02', 0, '2009-07-06', '2009-07-30', 3, 12, 5, 0, 6, NULL, '7;1', '', NULL, 565.42, 107.43, 0, 1.8616751269, 672.85, 0),
(33, '2009-07-02', 0, '2009-07-03', '2009-07-04', 3, 7, 3, 0, 3, NULL, '7;5', '', NULL, 1248.89, 237.29, 0, 1.20786163522, 1486.18, 0),
(34, '2009-07-02', 0, '2009-07-26', '2009-07-31', 2, 5, 6, 0, 5, NULL, '6;3', '', NULL, 3921.9, 745.16, 0, 0.962834224599, 4667.06, 0),
(35, '2009-07-02', 1, '2009-11-27', '2009-11-28', 2, 8, 2, 0, 3, NULL, '7;5', '', NULL, 1005.24, 191, 0, 1, 1196.24, 0),
(36, '2009-07-02', 0, '2009-09-30', '2009-10-09', 2, 5, 2, 2, 3, NULL, '7;6', '', NULL, 1207.34, 229.39, 0, 1.1072327044, 1436.73, 0),
(37, '2009-07-02', 0, '2009-07-07', '2009-07-08', 2, 6, 4, 2, 1, NULL, '7;6', '', NULL, 1254.91, 238.43, 0, 1.14444444444, 1493.34, 0),
(38, '2009-07-02', 1, '2009-07-05', '2009-07-09', 2, 10, 2, 2, 2, NULL, '6;1', 'Lachs', 500, 1121.6, 213.1, 0, 1, 1334.7, 0),
(39, '2009-07-02', 0, '2009-07-14', '2009-07-24', 2, 12, 2, 0, 3, NULL, '5;6', '', NULL, 1003.12, 190.59, 0, 0.997798742138, 1193.71, 0),
(40, '2009-07-02', 0, '2009-09-10', '2009-09-25', 1, 7, 4, 4, 5, NULL, '7;9', '', NULL, 6695.25, 1272.1, 0, 1.61310160428, 7967.35, 0),
(41, '2009-07-02', 1, '2009-07-16', '2009-07-23', 2, 1, 1, 1, 1, NULL, '1;3', '', NULL, 1042.8, 198.13, 0, 1, 1240.93, 0),
(42, '2009-07-02', 0, '2009-08-12', '2009-08-19', 1, 12, 2, 1, 1, NULL, '7;1', '', NULL, 1441.88, 273.96, 0, 1.35833333333, 1715.84, 0),
(43, '2009-07-02', 1, '2009-08-06', '2009-08-28', 1, 10, 2, 2, 3, NULL, '7;3', '', NULL, 1032.84, 196.24, 0, 1, 1229.08, 0),
(44, '2009-07-02', 0, '2009-09-10', '2009-09-24', 1, 1, 6, 0, 5, NULL, '7;9', '', NULL, 6584.85, 1251.12, 0, 1.61310160428, 7835.97, 0),
(45, '2009-07-02', 0, '2009-09-29', '2009-10-09', 1, 9, 6, 0, 5, NULL, '1;9', 'Oktoberfestbier', 100, 5801.75, 1102.33, 0, 1.39385026738, 6904.08, 0),
(46, '2009-07-02', 0, '2009-09-16', '2009-09-24', 1, 8, 1, 0, 3, NULL, '7;1', '', NULL, 1338.38, 254.29, 0, 1.30094339623, 1592.67, 0),
(47, '2009-07-02', 0, '2009-09-25', '2009-10-07', 1, 11, 4, 0, 2, NULL, '7;5', '', NULL, 811.34, 154.15, 0, 1.33709677419, 965.49, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorgangstypen`
--

CREATE TABLE IF NOT EXISTS `vorgangstypen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschreibung` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beschreibung` (`beschreibung`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `vorgangstypen`
--

INSERT INTO `vorgangstypen` (`id`, `beschreibung`) VALUES
(1, 'Angebot'),
(3, 'Rechnung'),
(2, 'Vertrag');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zufriedenheitstypen`
--

CREATE TABLE IF NOT EXISTS `zufriedenheitstypen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschreibung` varchar(25) NOT NULL,
  `istAblehnungsgrund` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beschreibung` (`beschreibung`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `zufriedenheitstypen`
--

INSERT INTO `zufriedenheitstypen` (`id`, `beschreibung`, `istAblehnungsgrund`) VALUES
(1, 'Zufrieden', 0),
(2, 'Zu teuer', 1),
(3, 'Zeitlich nicht möglich', 1),
(4, 'Nicht Zufrieden', 0),
(5, 'Unbekannter Grund', 1),
(6, 'Sehr Zufrieden', 0),
(7, 'Unbekannt', 0);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `flugzeuge`
--
ALTER TABLE `flugzeuge`
  ADD CONSTRAINT `flugzeuge_flugzeugtyp_id` FOREIGN KEY (`flugzeugtyp_id`) REFERENCES `flugzeugtypen` (`id`);

--
-- Constraints der Tabelle `flugzeugtypen`
--
ALTER TABLE `flugzeugtypen`
  ADD CONSTRAINT `flugzeugtypen_flugzeughersteller_id` FOREIGN KEY (`flugzeughersteller_id`) REFERENCES `flugzeughersteller` (`id`);
