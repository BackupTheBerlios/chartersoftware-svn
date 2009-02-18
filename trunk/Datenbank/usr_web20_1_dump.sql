# Sequel Pro dump
# Version 254
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.1.31)
# Database: usr_web20_1
# Generation Time: 2009-02-18 00:36:33 +0100
# ************************************************************

# Dump of table entfernungs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `entfernungs`;

CREATE TABLE `entfernungs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table flugplatzs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `flugplatzs`;

CREATE TABLE `flugplatzs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `int_abk` varchar(5) DEFAULT NULL,
  `zeitzone` varchar(8) DEFAULT NULL,
  `diff_utc` smallint(3) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `flugplatzs` (`id`,`name`,`int_abk`,`zeitzone`,`diff_utc`,`position`)
VALUES
	(1,'Mülheim','MU-ES','GMT+1',2,23424),
	(2,'Frankfurt/Germany','FFH','GMT+2',1,342);



# Dump of table hersteller
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hersteller`;

CREATE TABLE `hersteller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;





# Dump of table zeitzones
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zeitzones`;

CREATE TABLE `zeitzones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `differenzUtc` tinyint(4) NOT NULL,
  `sommerzeitRegel` varchar(30),
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO `zeitzones` (`id`,`name`,`differenzUtc`)
VALUES
	(1,'Europa/Berlin',1),
	(2,'Europa/Prag',1),
	(3,'Europa/Wien',1),
	(4,'Europa/Warschau',1);



