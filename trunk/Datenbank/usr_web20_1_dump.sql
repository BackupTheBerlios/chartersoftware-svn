# Sequel Pro dump
# Version 254
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.31)
# Database: usr_web20_1
# Generation Time: 2009-02-19 22:20:10 +0100
# ************************************************************

# Dump of table flugplatzentfernungs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flugplatzentfernungs`;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `flugplatzentfernungs` (`id`,`flugplatzstart_id`,`flugplatzziel_id`,`entfernung`)
VALUES
	(1,1,2,100),
	(2,2,1,100),
	(3,3,1,600);



# Dump of table flugplatzs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flugplatzs`;

CREATE TABLE `flugplatzs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `internatKuerzel` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `zeitzone_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `internatKuerzel` (`internatKuerzel`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `flugplatzs` (`id`,`name`,`internatKuerzel`,`zeitzone_id`)
VALUES
	(1,'Mülheim','MU-ES',1),
	(2,'Frankfurt/Germany','FFH',1),
	(3,'Dresden','DD',1);



# Dump of table flugzeugherstellers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flugzeugherstellers`;

CREATE TABLE `flugzeugherstellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `flugzeugherstellers` (`id`,`name`)
VALUES
	(3,'Aerocar'),
	(4,'Agusta'),
	(5,'Aichi'),
	(2,'Airbus'),
	(6,'Alvis'),
	(1,'Boing'),
	(10,'Bombardier'),
	(7,'British Aircraft Corporation'),
	(8,'Cessna Aircraft Company'),
	(9,'Gulfstream'),
	(11,'Piper');



# Dump of table flugzeugs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flugzeugs`;

CREATE TABLE `flugzeugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kennzeichen` varchar(50) NOT NULL,
  `flugzeugtyp_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kennzeichen` (`kennzeichen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table flugzeugtyps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flugzeugtyps`;

CREATE TABLE `flugzeugtyps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `flugzeughersteller_id` int(11) NOT NULL,
  `bild` blob,
  `reichweite` int(11) NOT NULL,
  `vmax` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `flugzeugtyps` (`id`,`name`,`flugzeughersteller_id`,`bild`,`reichweite`,`vmax`)
VALUES
	(1,'Citation CJ1',8,NULL,2408,720),
	(2,'Citation Mustang',8,NULL,2366,620),
	(3,'Citation CXLR',8,NULL,4009,795),
	(4,'GIV SP',9,NULL,7820,851),
	(5,'Global Express',10,NULL,12038,935),
	(6,'Malibu Mirage',11,NULL,2491,394);



# Dump of table zeitzones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zeitzones`;

CREATE TABLE `zeitzones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `differenzUtc` tinyint(4) NOT NULL,
  `sommerzeitRegel` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `zeitzones` (`id`,`name`,`differenzUtc`,`sommerzeitRegel`)
VALUES
	(1,'Europa/Berlin',1,NULL),
	(2,'Europa/Prag',1,NULL),
	(3,'Europa/Wien',1,NULL),
	(4,'Europa/Warschau',1,NULL);



