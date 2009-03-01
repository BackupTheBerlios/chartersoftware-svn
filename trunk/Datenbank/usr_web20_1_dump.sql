# Sequel Pro dump
# Version 254
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.31)
# Database: usr_web20_1
# Generation Time: 2009-02-22 23:34:18 +0100
# ************************************************************

# Dump of table zeitzones
# ------------------------------------------------------------
DROP TABLE IF EXISTS `flugzeugs`;
DROP TABLE IF EXISTS `flugzeugtyps`;
DROP TABLE IF EXISTS `flugzeugherstellers`;
DROP TABLE IF EXISTS `flugplatzentfernungs`;
DROP TABLE IF EXISTS `flugplatzs`;
DROP TABLE IF EXISTS `zeitzones`;

CREATE TABLE `zeitzones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `differenzUtc` tinyint(4) NOT NULL,
  `sommerzeitRegel` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `zeitzones` (`id`,`name`,`differenzUtc`,`sommerzeitRegel`)
VALUES
	(1,'Europa/Berlin',2,''),
	(2,'Europa/Prag',1,NULL),
	(3,'Europa/Wien',1,NULL),
	(4,'Europa/Warschau',1,NULL);


	
# Dump of table flugplatzentfernungs
# ------------------------------------------------------------


CREATE TABLE `flugplatzentfernungs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flugplatzstart_id` int(11) NOT NULL,
  `flugplatzziel_id` int(11) NOT NULL,
  `entfernung` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flugplatzentfernungs_flugplatzziel_id` (`flugplatzziel_id`),
  KEY `flugplatzentfernungs_flugplatzstart_id` (`flugplatzstart_id`),
  CONSTRAINT `flugplatzentfernungs_flugplatzstart_id` FOREIGN KEY (`flugplatzstart_id`) REFERENCES `zeitzones` (`id`),
  CONSTRAINT `flugplatzentfernungs_flugplatzziel_id` FOREIGN KEY (`flugplatzziel_id`) REFERENCES `zeitzones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `flugplatzentfernungs` (`id`,`flugplatzstart_id`,`flugplatzziel_id`,`entfernung`)
VALUES
	(1,1,2,100),
	(2,2,1,100),
	(3,3,1,600),
	(6,1,3,170);



# Dump of table flugplatzs
# ------------------------------------------------------------


CREATE TABLE `flugplatzs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `internatKuerzel` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zeitzone_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `internatKuerzel` (`internatKuerzel`),
  KEY `name` (`name`),
  KEY `flugplatzs_zeitzone_id` (`zeitzone_id`),
  CONSTRAINT `flugplatzs_zeitzone_id` FOREIGN KEY (`zeitzone_id`) REFERENCES `zeitzones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `flugplatzs` (`id`,`name`,`internatKuerzel`,`zeitzone_id`)
VALUES
	(1,'Mülheim','MU-ES',1),
	(2,'Frankfurt/Germany','FFH',1),
	(3,'Dresden','DD',1),
	(5,'Berlin','BRL',1);



# Dump of table flugzeugherstellers
# ------------------------------------------------------------
CREATE TABLE `flugzeugherstellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) DEFAULT 'http://',
  `information` text ,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `flugzeugherstellers` (`id`,`name`,`link`,`information`)
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






# Dump of table flugzeugtyps
# ------------------------------------------------------------


CREATE TABLE `flugzeugtyps` (
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `flugzeugtyps_flugzeughersteller_id` (`flugzeughersteller_id`),
  CONSTRAINT `flugzeugtyps_flugzeughersteller_id` FOREIGN KEY (`flugzeughersteller_id`) REFERENCES `flugzeugherstellers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `flugzeugtyps` (`id`,`name`,`flugzeughersteller_id`,`bild`,`wikipedia`,`reichweite`,`vmax`,`jahreskosten`,`stundenkosten`,`crewPersonal`,`cabinPersonal`)
VALUES
	(1,'Citation CJ1',8,'cj1.jpg','http://de.wikipedia.org/wiki/Cessna_CitationJet',2408,720,21800000,72700,1,0),
	(2,'Citation Mustang',8,'mustang.jpg','http://de.wikipedia.org/wiki/Cessna_Citation_Mustang',2366,620,10700000,42000,1,0),
	(3,'Citation CXLR',8,'cxlr.jpg','html://nowhere.de',4009,795,24240000,68000,2,1),
	(4,'GIV SP',9,'givsp.jpg','http://www.aerokurier.de/de/gulfstream-giv-sp.5595.htm',7820,851,45330000,278000,2,1),
	(5,'Global Express',10,'globalexpress.jpg','html://nowhere.de',12038,935,51300000,310000,2,2),
	(6,'Malibu Mirage',11,'mirage.jpg','html://nowhere.de',2491,394,6000000,20000,1,0);




# Dump of table flugzeugs
# ------------------------------------------------------------


CREATE TABLE `flugzeugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kennzeichen` varchar(50) NOT NULL,
  `flugzeugtyp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kennzeichen` (`kennzeichen`),
  KEY `flugzeugs_flugzeugtyp_id` (`flugzeugtyp_id`),
  CONSTRAINT `flugzeugs_flugzeugtyp_id` FOREIGN KEY (`flugzeugtyp_id`) REFERENCES `flugzeugtyps` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO `flugzeugs` (`id`,`kennzeichen`,`flugzeugtyp_id`)
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


