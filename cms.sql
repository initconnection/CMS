-- MySQL dump 10.13  Distrib 5.5.24, for Win32 (x86)
--
-- Host: localhost    Database: cms
-- ------------------------------------------------------
-- Server version	5.5.24-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (9,'Main menu','main-menu');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_page`
--

DROP TABLE IF EXISTS `category_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_page` (
  `category` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`category`,`page`),
  KEY `page` (`page`),
  CONSTRAINT `category_page_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `category_page_ibfk_2` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_page`
--

LOCK TABLES `category_page` WRITE;
/*!40000 ALTER TABLE `category_page` DISABLE KEYS */;
INSERT INTO `category_page` VALUES (9,26,2);
INSERT INTO `category_page` VALUES (9,27,4);
INSERT INTO `category_page` VALUES (9,28,5);
/*!40000 ALTER TABLE `category_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home`
--

DROP TABLE IF EXISTS `home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home` (
  `button_title` varchar(100) NOT NULL,
  `button_url` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home`
--

LOCK TABLES `home` WRITE;
/*!40000 ALTER TABLE `home` DISABLE KEYS */;
INSERT INTO `home` VALUES ('Contact us','asas',1);
/*!40000 ALTER TABLE `home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'page','Simple page');
INSERT INTO `module` VALUES (5,'home','Home page');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `module` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lang` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (26,'gykdsghsdhsyk','gykdsghsdhsyk','\n		\n		\n		\n		\n		<p>gykgk</p>\n					','','fasfaf',1,'2013-06-03 16:17:08','lt');
INSERT INTO `page` VALUES (27,'New Page','new-page','\n		<p>saggggggaag</p>\n	','','s',1,'2013-06-03 16:17:08','lt');
INSERT INTO `page` VALUES (28,'Pavadinimasasss','pavadinimasasss','\n		\n		Contentbdfbd','','',1,'2013-06-03 16:17:08','lt');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_history`
--

DROP TABLE IF EXISTS `page_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `module` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`id`,`version`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_history`
--

LOCK TABLES `page_history` WRITE;
/*!40000 ALTER TABLE `page_history` DISABLE KEYS */;
INSERT INTO `page_history` VALUES (21,'Apie mus','apie-mus','','','',1,'2013-05-19 16:21:43',1);
INSERT INTO `page_history` VALUES (21,'<p>Apigsgsrggehd<br />\nhjhsdgsdg</p>\n','apie-mus','<p>Veikia!!!!f awfa wf</p>\n','','',1,'2013-06-01 14:13:18',2);
INSERT INTO `page_history` VALUES (21,'<p>Apigsgsrggehd<br>hjhsddeddgsdg</p>','<p>apigsgsrggehd<br>hjhsddeddgsdg</p>','\n		<p>Veikia!!!!f awfa wf</p>\n	','','',1,'2013-06-03 14:44:42',3);
INSERT INTO `page_history` VALUES (21,'<p>Apigsgsrggehd<br>hjhsddeddgsdg</p>','<p>apigsgsrggehd<br>hjhsddeddgsdg</p>','\n		\n		<p>Veikia!!!!f awfa wfgs egkso edgse[p kgspokg posekpog sepo gskepog kspoeg poskepog skepo gkspe kgpsek gposekpog ksepog kspeo kgposke pogksepo kgspoekpg oskepo gsepo gkspoe kgpse kopgsk pegk sopeg s[egsegeg</p>\n		','','',1,'2013-06-03 15:00:46',4);
INSERT INTO `page_history` VALUES (22,'Darbai','darbai','','','',1,'2013-05-19 16:21:56',1);
INSERT INTO `page_history` VALUES (22,'Darbai','darbai','','','',1,'2013-06-01 11:49:30',2);
INSERT INTO `page_history` VALUES (23,'\n		<p>Bandymukas</p>\n	','paslaugos','<p>sagasgasgsagsa hdfsagsagsagsagsasasaghkyfefeafkkygy ygfefkgyfasffasfkg wafawfkopakwf egegegeg</p>\n','','',1,'2013-06-01 14:32:55',1);
INSERT INTO `page_history` VALUES (24,'kontafsfs','kontaktai','\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>daliusffsagfsefsef</p>\n														','','',1,'2013-06-01 14:48:22',1);
INSERT INTO `page_history` VALUES (24,'kontafsfsfefef','kontafsfsfefef','\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>daliusffsagfsefsef</p>\n															','','',0,'2013-06-01 14:51:17',2);
INSERT INTO `page_history` VALUES (24,'kontafsfsfefef','kontafsfsfefef','\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>daliusffsagfsefsef</p>\n																','','',0,'2013-06-01 14:51:36',3);
INSERT INTO `page_history` VALUES (24,'kontafsfsfefef','kontafsfsfefef','\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>daliusffsagfsefsef</p>\n																	','','',0,'2013-06-01 14:53:15',4);
INSERT INTO `page_history` VALUES (24,'kontafsfsfefef','kontafsfsfefef','\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>daliusffsagfsefsef</p>\n																		','','',0,'2013-06-01 14:53:49',5);
INSERT INTO `page_history` VALUES (24,'kontafsfsfefef','kontafsfsfefef','\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>daliusffsagfsefsef</p>\n																		','','',0,'2013-06-01 14:53:49',6);
INSERT INTO `page_history` VALUES (25,'Home','home','','','',1,'2013-05-19 16:44:20',1);
INSERT INTO `page_history` VALUES (25,'Home','home','','','',1,'2013-05-19 16:44:20',2);
INSERT INTO `page_history` VALUES (25,'Home','home','<p>Sveiki!</p>\r\n','','',1,'2013-05-19 16:45:04',3);
INSERT INTO `page_history` VALUES (26,'gykyk','gykyk','<p>gykgk</p>\r\n','','',1,'2013-06-03 15:05:00',1);
INSERT INTO `page_history` VALUES (26,'gykyk','gykyk','\n		<p>gykgk</p>\n	','','',1,'2013-06-03 15:05:51',2);
INSERT INTO `page_history` VALUES (26,'gykyk','gykyk','\n		\n		<p>gykgk</p>\n		','','undefined',1,'2013-06-03 15:45:41',3);
INSERT INTO `page_history` VALUES (26,'gykyk','gykyk','\n		\n		\n		<p>gykgk</p>\n			','','undefined',1,'2013-06-03 15:56:26',4);
INSERT INTO `page_history` VALUES (26,'gykyk','gykyk','\n		\n		\n		\n		<p>gykgk</p>\n				','','fasfaf',1,'2013-06-03 15:56:49',5);
INSERT INTO `page_history` VALUES (27,'New Page','new-page','<p>sagaag</p>\r\n','','',1,'2013-06-03 15:58:27',1);
INSERT INTO `page_history` VALUES (28,'','','','','',0,'2013-06-03 16:06:35',1);
INSERT INTO `page_history` VALUES (28,'Pavadinimasasss','pavadinimasasss','\n		Content	','','',1,'2013-06-03 16:09:41',2);
INSERT INTO `page_history` VALUES (29,'','','','','',0,'2013-06-03 16:07:24',1);
INSERT INTO `page_history` VALUES (30,'','','','','',0,'2013-06-03 16:07:30',1);
INSERT INTO `page_history` VALUES (31,'','','','','',0,'2013-06-03 16:08:38',1);
INSERT INTO `page_history` VALUES (32,'','','','','',0,'2013-06-03 16:08:48',1);
/*!40000 ALTER TABLE `page_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site`
--

DROP TABLE IF EXISTS `site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (4,'homePage','23');
INSERT INTO `site` VALUES (6,'siteTitle','Mandola');
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subpage`
--

DROP TABLE IF EXISTS `subpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subpage` (
  `parent` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`parent`,`page`),
  KEY `page` (`page`),
  CONSTRAINT `subpage_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subpage_ibfk_2` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subpage`
--

LOCK TABLES `subpage` WRITE;
/*!40000 ALTER TABLE `subpage` DISABLE KEYS */;
/*!40000 ALTER TABLE `subpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'root','pass');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-03 19:19:51
