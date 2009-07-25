--DROP TABLE IF EXISTS vorgaenge;
--DROP TABLE IF EXISTS `flugzeugs`;
--DROP TABLE IF EXISTS `flugzeuge`;
--DROP TABLE IF EXISTS `flugzeugtyps`;
--DROP TABLE IF EXISTS `flugzeugtypen`;
--DROP TABLE IF EXISTS `flugzeugherstellers`;
--DROP TABLE IF EXISTS `flugzeughersteller`;
--DROP TABLE IF EXISTS `flugplatzentfernungs`;
--DROP TABLE IF EXISTS `flugplatzs`;
--DROP TABLE IF EXISTS `flugplaetze`;
--DROP TABLE IF EXISTS `zeitzones`;
--DROP TABLE IF EXISTS `zeitzonen`;
--DROP TABLE IF EXISTS `mehrwertsteuersaetze`;
--DROP TABLE IF EXISTS `vorgangstypen`;
--DROP TABLE IF EXISTS `leistungstypen`;
--DROP TABLE IF EXISTS `zufriedenheitstypen`;
--DROP TABLE IF EXISTS `adressen`;
--DROP TABLE IF EXISTS `reports`;

--CREATE TABLE IF NOT EXISTS `adressen` (
--  `id` int(11) NOT NULL AUTO_INCREMENT,
--  `firma` varchar(50) DEFAULT NULL,
--  `abteilung` varchar(50) DEFAULT NULL,
--  `ansprechpartner` varchar(50) NOT NULL,
--  `strasse` varchar(50) NOT NULL,
--  `plz` varchar(5) NOT NULL,
--  `ort` varchar(50) NOT NULL,
--  PRIMARY KEY (`id`)
--) ;

--Schema einrichten
--DROP SCHEMA IF EXISTS verkauf;
--CREATE SCHEMA verkauf;

--Verkauf Tabelle einrichten
DROP TABLE IF EXISTS verkauf;
CREATE TABLE verkauf (
  vnr integer NOT NULL,
  anr integer NOT NULL,
  vname varchar(15) NOT NULL,
  region varchar(15) NOT NULL,
  ort varchar(15) NOT NULL
);

--Daten einlesen
INSERT INTO verkauf VALUES (127, 1423, 'Huber', 'Bayern', 'Muenchen');
INSERT INTO verkauf VALUES (127, 1342, 'Huber', 'Bayern', 'Muenchen');
INSERT INTO verkauf VALUES (354, 1820, 'Moser', 'Bayern', 'Nuernberg');
INSERT INTO verkauf VALUES (129, 1342, 'Wenzel', 'Sachsen', 'Leipzig');
INSERT INTO verkauf VALUES (222, 3421, 'Maier', 'Hessen', 'Kassel');
INSERT INTO verkauf VALUES (222, 2221, 'Maier', 'Hessen', 'Frankfurt');
INSERT INTO verkauf VALUES (239, 2314, 'Keller', 'Rheinland', 'Duesseldorf');
INSERT INTO verkauf VALUES (239, 2321, 'Keller', 'Sachsen', 'Dresden');

