#************************************************************
#
# ------------------------------------------------------------
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
#
#
#
#-----------------------------------
#-----------------------------------
#-----------------------------------
CREATE TABLE `mehrwertsteuersaetze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschreibung` varchar(25) NOT NULL,
  `satz` int(4) NOT NULL,
  `scale` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beschreibung` (`beschreibung`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
#
INSERT INTO `mehrwertsteuersaetze` (`id`,`beschreibung`,`satz`,`scale`)
VALUES
	(1,'Voller Satz',1900,100),
	(2,'Halber Satz',700,100),
	(3,'Steuerfrei',0,100);
#-----------------------------------
#-----------------------------------
#-----------------------------------
CREATE TABLE `leistungstypen` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `beschreibung` varchar(25) NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `beschreibung` (`beschreibung`)
	) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
#
INSERT INTO `leistungstypen` (`id`,`beschreibung`)
	VALUES
		(1,'Zielflug'),
		(2,'Zeitflug'),
		(3,'Individualleistung');
#
#-----------------------------------
#-----------------------------------
#-----------------------------------
CREATE TABLE `zufriedenheitstypen` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `beschreibung` varchar(25) NOT NULL,
 	`istAblehnungsgrund` tinyint(1) NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `beschreibung` (`beschreibung`)
	) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
#
INSERT INTO `zufriedenheitstypen` (`id`,`beschreibung`,`istAblehnungsgrund`)
	VALUES
		(1,'Zufrieden',0),
		(2,'Zu teuer',1),
		(3,'Zeitlich nicht möglich',1),
		(4,'Nicht Zufrieden',0);
#
#-----------------------------------
#-----------------------------------
#-----------------------------------
CREATE TABLE `reports` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(50) NOT NULL,
	  `befehl` TEXT NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `name` (`name`)
	) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
	#
INSERT INTO `reports` (`id`,`name`,`befehl`)
VALUES
	(1,'Liste aller Flugzeugtypen',' select * from flugzeugtypen;'),
	(2,'Liste aller Kunden',' select * from adressen; ');

#
#	
#-----------------------------------
#-----------------------------------
#-----------------------------------
CREATE TABLE `vorgangstypen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beschreibung` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beschreibung` (`beschreibung`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
#
INSERT INTO `vorgangstypen` (`id`,`beschreibung`)
VALUES
	(1,'Angebot'),
	(2,'Vertrag'),
	(3,'Rechnung');
#
#
#
# Dump of table flugplatzs
# ------------------------------------------------------------
#
#
CREATE TABLE `flugplaetze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `iata` varchar(10) NULL,
  `geoPosition` varchar(35) NOT NULL,
  `zeitzone_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE  KEY `name` (`name`),
  KEY `geoPosition` (`geoPosition`),
  KEY `iata` (`iata`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
#
#--Take airports from http://www.azworldairports.com/azworld/p1600.cfm
INSERT INTO `flugplaetze` (`id`,`name`,`iata`,`geoPosition`,`zeitzone_id`)
VALUES
	(1,'Essen-Mülheim','ESS/EDLE','51°24''08"N, 006°56''14"O',400),
	(2,'Mülheim','ESS/EDLE','51°24''08"N, 006°56''14"O',400),
	(3,'Frankfurt-Engelsbach','QEF','49°57''39"N, 8°38''29" O',400),
	(4,'Engelsbach bei Frankfurt','QEF','49°57''39"N, 8°38''29" O',400),
	(5,'Dresden Airport','DRS/EDDC','51°07''58"N, 013°46''02"O',400),
	(6,'Erfurt Airport','ERF/EDDE','50°58''47"N, 010°57''29"E',400),
	(7,'Augsburg Airport','AGB/EDMA','48°25''31"N, 010°55''54"E',400),
	(8,'New York','AGB/EDMA','40°41''33"N, 074°10''07"E',400);
#
#
#
## Dump of table flugzeugherstellers
# ------------------------------------------------------------
CREATE TABLE `flugzeughersteller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) DEFAULT 'http://',
  `information` text ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
#
INSERT INTO `flugzeughersteller` (`id`,`name`,`link`,`information`)
VALUES
	(1,'Boing','http://www.boeing.com/','<p>Das US-amerikanische Unternehmen <b>Boeing</b> <i>(The Boeing Company)</i> ist der weltweit größte Hersteller von zivilen und militärischen <a href=\"/wiki/Flugzeug\" title=\"Flugzeug\">Flugzeugen</a> und <a href=\"/wiki/Hubschrauber\" title=\"Hubschrauber\">Hubschraubern</a> sowie von Militär- und Weltraumtechnik.</p>\r\n<p>Mit <a href=\"/wiki/Airbus\" title=\"Airbus\">Airbus</a> bildet Boeing das <a href=\"/wiki/Duopol_f%C3%BCr_Gro%C3%9Fraumflugzeuge\" title=\"Duopol für Großraumflugzeuge\">Duopol für Großraumflugzeuge</a>.</p>\r\n<table id=\"toc\" class=\"toc\" summary=\"Inhaltsverzeichnis\">'),
	(2,'Airbus',NULL,NULL),
	(3,'Aerocar',NULL,NULL),
	(4,'Agusta',NULL,NULL),
	(5,'Aichi',NULL,NULL),
	(6,'Alvis',NULL,NULL),
	(7,'British Aircraft Corporation',NULL,NULL),
	(8,'Cessna Aircraft Company',NULL,NULL),
	(9,'Gulfstream',NULL,NULL),
	(10,'Bombardier',NULL,NULL),
	(11,'Piper',NULL,NULL);
#
#
#
#
#
#
# Dump of table flugzeugtypen
# ------------------------------------------------------------
#
#
CREATE TABLE `flugzeugtypen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flugzeughersteller_id` int(11) NOT NULL,
  `bild` varchar(255) DEFAULT NULL,
  `wikipedia` varchar(255) DEFAULT NULL,
  `reichweite` int(11) NOT NULL DEFAULT '0',
  `vmax` int(11) NOT NULL DEFAULT '0',
  `jahreskosten` bigint(20) NOT NULL DEFAULT '0',
  `stundenkosten` bigint(20) NOT NULL DEFAULT '0',
  `crewPersonal` tinyint(4) NOT NULL DEFAULT '1',
  `cabinPersonal` tinyint(4) NOT NULL DEFAULT '0',
  `seats` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `flugzeugtypen_flugzeughersteller_id` (`flugzeughersteller_id`),
  CONSTRAINT `flugzeugtypen_flugzeughersteller_id` FOREIGN KEY (`flugzeughersteller_id`) REFERENCES `flugzeughersteller` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
#
INSERT INTO `flugzeugtypen` (`id`,`name`,`flugzeughersteller_id`,`bild`,`wikipedia`,`reichweite`,`vmax`,`jahreskosten`,`stundenkosten`,`crewPersonal`,`cabinPersonal`,`seats`)
VALUES
	(1,'Citation CJ1',8,'cj1.jpg','http://de.wikipedia.org/wiki/Cessna_CitationJet',2408,720,21800000,72700,1,0,3),
	(2,'Citation Mustang',8,'mustang.jpg','http://de.wikipedia.org/wiki/Cessna_Citation_Mustang',2366,620,10700000,42000,1,0,4),
	(3,'Citation CXLR',8,'cxlr.jpg','html://nowhere.de',4009,795,24240000,68000,2,1,5),
	(4,'GIV SP',9,'givsp.jpg','http://www.aerokurier.de/de/gulfstream-giv-sp.5595.htm',7820,851,45330000,278000,2,1,6),
	(5,'Global Express',10,'globalexpress.jpg','html://nowhere.de',12038,935,51300000,310000,2,2,7),
	(6,'Malibu Mirage',11,'mirage.jpg','html://nowhere.de',2491,394,6000000,20000,1,0,8);
#
#
#
#
## Dump of table flugzeuge
# #------------------------------------------------------------
#
#
CREATE TABLE `flugzeuge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kennzeichen` varchar(50) NOT NULL,
  `flugzeugtyp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kennzeichen` (`kennzeichen`),
  KEY `flugzeuge_flugzeugtyp_id` (`flugzeugtyp_id`),
  CONSTRAINT `flugzeuge_flugzeugtyp_id` FOREIGN KEY (`flugzeugtyp_id`) REFERENCES `flugzeugtypen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
#
INSERT INTO `flugzeuge` (`id`,`kennzeichen`,`flugzeugtyp_id`)
VALUES
	(1,'NA-1',1),
	(2,'NA-2',1),
	(3,'NA-3',1),
	(4,'NA-4',1),
	(5,'NA-5',1),
	(6,'NA-6',1),
	(7,'M-1',2),
	(8,'M-2',2),
	(9,'M-3',2),
	(10,'M-4',2),
	(11,'M-5',2),
	(12,'M-6',2),
	(13,'CX-1',3),
	(14,'CX-2',3),
	(15,'GU-1',4),
	(16,'GU-2',4),
	(17,'BO-1',5),
	(18,'PI-1',6),
	(19,'PI-2',6),
	(20,'PI-3',6),
	(21,'PI-4',6);
#
#
#
CREATE TABLE `adressen` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`firma` varchar(50) ,
	`abteilung` varchar(50) ,
	`ansprechpartner` varchar(50) NOT NULL,
	`strasse` varchar(50)  NOT NULL,
	`plz` varchar(5)  NOT NULL,
	`ort` varchar(50) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
INSERT INTO `adressen` (`id`,`firma`,`abteilung`,`ansprechpartner`,`strasse`,`plz`,`ort`)
VALUES
	(1,'Turbo Soft Gmbh','Geschäftsleitung','Heinrich Müller','Feldweg 20','12345','Berlin'),
    (2,'Stone Rich AG','Marketing','Peter Lustig','Karrierestraße 129','30422','Entenhausen'),
	(3,'ThinkLogics','Architekturleitung','A. Behrens','Hauptstr. 1','23423','Mochingen'),
	(4,'ThinkLogics','Projektleitung','F. Geist','Hauptstr. 13','23423','Mochingen'),
	(5,'Baby Welt GmbH','Endkundenbetreuung','Martin Schmidt','Obere Straße','23422','München');
#
#
#----------------------------------------------
CREATE TABLE `vorgaenge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` DATE,
  `zeitcharter` int(1) NOT NULL,
  `vonDatum` DATE NOT NULL,
  `bisDatum` DATE NOT NULL,
  `vorgangstyp_id` int(11) NOT NULL,
  `adresse_id` int(11) NOT NULL,
  `AnzahlPersonen` int(11) NOT NULL,
  `AnzahlFlugbegleiter` int(11) NOT NULL DEFAULT 0,
  `flugzeugtyp_id` int(11) NOT NULL,
  `zufriedenheitstyp_id` int(11) DEFAULT NULL,
  `flugstrecke` varchar(200) NOT NULL,
  `sonderwunsch` varchar(250) DEFAULT '',
  `sonderwunsch_netto` DOUBLE DEFAULT 0,
  `netto` DOUBLE NOT NULL DEFAULT 0,
  `mwst` DOUBLE NOT NULL DEFAULT 0,
  `brutto_soll` DOUBLE NOT NULL DEFAULT 0,
  `brutto_ist` DOUBLE NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `adresse_id` (`adresse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
#
INSERT INTO `vorgaenge` (`datum`,`zeitcharter`,`vonDatum`,`bisDatum`,`vorgangstyp_id`,`adresse_id`,`AnzahlPersonen`,`AnzahlFlugbegleiter`,`flugzeugtyp_id`,`zufriedenheitstyp_id`,`flugstrecke`,`brutto_ist`)
VALUES
('2009-06-03',1,'2009-06-01','2009-06-03',1,2,2,1,3,NULL,'7;4',0),
('2009-06-03',0,'2009-06-05','2009-06-02',1,1,2,1,4,NULL,'8;5;1',0),
('2009-06-03',1,'2009-06-01','2009-06-03',2,2,2,1,3,NULL,'7;4',0),
('2009-06-03',0,'2009-06-05','2009-06-02',2,1,2,1,4,NULL,'8;5;1',0),
('2009-06-03',1,'2009-06-01','2009-06-03',3,2,2,1,3,NULL,'7;4',0),
('2009-06-03',0,'2009-06-05','2009-06-02',3,1,2,1,4,NULL,'8;5;1',0);
