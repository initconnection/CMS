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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (7,'Main menu','main-menu');
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
INSERT INTO `category_page` VALUES (7,11,1);
INSERT INTO `category_page` VALUES (7,12,2);
INSERT INTO `category_page` VALUES (7,13,3);
/*!40000 ALTER TABLE `category_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `upload_id` (`upload_id`),
  CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`upload_id`) REFERENCES `upload` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (34,51);
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'page','Simple page');
INSERT INTO `module` VALUES (2,'news','News');
INSERT INTO `module` VALUES (3,'gallery','Gallery');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (22,'New','<p>Page</p>\r\n','2013-04-02 19:02:29');
INSERT INTO `news` VALUES (23,'Kazkas','','2013-04-02 19:59:16');
INSERT INTO `news` VALUES (24,'Veikia','<p>feafef</p>\r\n','2013-04-02 20:07:44');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (11,'Naujienos','naujienos','<p>Akropolis</p>\r\n','','',2,'2013-03-30 23:31:18');
INSERT INTO `page` VALUES (12,'Naujas pag','naujas-pag','<p>turinys</p>\r\n','','',2,'2013-04-02 18:06:42');
INSERT INTO `page` VALUES (13,'Galerija','galerija','','','',3,'2013-04-02 20:23:20');
INSERT INTO `page` VALUES (14,'fasfa','fasfa','<p>sfasf</p>\r\n','','',1,'2013-04-04 20:03:28');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_gallery`
--

DROP TABLE IF EXISTS `page_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_gallery` (
  `page` int(11) NOT NULL,
  `gallery` int(11) NOT NULL,
  PRIMARY KEY (`page`,`gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_gallery`
--

LOCK TABLES `page_gallery` WRITE;
/*!40000 ALTER TABLE `page_gallery` DISABLE KEYS */;
INSERT INTO `page_gallery` VALUES (13,34);
/*!40000 ALTER TABLE `page_gallery` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_history`
--

LOCK TABLES `page_history` WRITE;
/*!40000 ALTER TABLE `page_history` DISABLE KEYS */;
INSERT INTO `page_history` VALUES (11,'Naujienos','naujienos','','','',1,'2013-03-30 23:04:58',1);
INSERT INTO `page_history` VALUES (11,'Naujienos','naujienos','<p>Tai yra nauja naujiena</p>\r\n','','',1,'2013-03-30 23:06:58',2);
INSERT INTO `page_history` VALUES (11,'Naujienos','naujienos','<p>Tai yra nauja naujiena</p>\r\n','','',1,'2013-03-30 23:06:58',3);
INSERT INTO `page_history` VALUES (11,'Naujienos','naujienos','','','',1,'2013-03-30 23:21:51',4);
INSERT INTO `page_history` VALUES (11,'Naujienos','naujienos','','','',1,'2013-03-30 23:21:51',5);
INSERT INTO `page_history` VALUES (11,'Naujienos','naujienos','<p>Akropolis</p>\r\n','','',1,'2013-03-30 23:25:59',6);
INSERT INTO `page_history` VALUES (11,'Naujienos','naujienos','<p>Akropolis</p>\r\n','','',1,'2013-03-30 23:25:59',7);
INSERT INTO `page_history` VALUES (12,'Naujas pag','naujas-pag','<p>turinys</p>\r\n','','',1,'2013-03-30 23:43:37',1);
INSERT INTO `page_history` VALUES (12,'Naujas pag','naujas-pag','<p>turinys</p>\r\n','','',1,'2013-03-30 23:43:37',2);
INSERT INTO `page_history` VALUES (46,'Main page','','','','',1,'2013-03-26 21:51:47',1);
INSERT INTO `page_history` VALUES (47,'Second oage','','','','',1,'2013-03-26 21:52:02',1);
INSERT INTO `page_history` VALUES (47,'Second oage','','<p>gasgasgagasg</p>\r\n','','',1,'2013-03-26 22:51:27',2);
INSERT INTO `page_history` VALUES (57,'fasf','fasf','<p>asfasf</p>\r\n','','',1,'2013-03-28 01:57:33',1);
/*!40000 ALTER TABLE `page_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_news`
--

DROP TABLE IF EXISTS `page_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_news` (
  `page` int(11) NOT NULL,
  `news` int(11) NOT NULL,
  PRIMARY KEY (`page`,`news`),
  KEY `news` (`news`),
  CONSTRAINT `page_news_ibfk_1` FOREIGN KEY (`page`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `page_news_ibfk_2` FOREIGN KEY (`news`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_news`
--

LOCK TABLES `page_news` WRITE;
/*!40000 ALTER TABLE `page_news` DISABLE KEYS */;
INSERT INTO `page_news` VALUES (11,22);
INSERT INTO `page_news` VALUES (12,22);
INSERT INTO `page_news` VALUES (11,23);
INSERT INTO `page_news` VALUES (11,24);
INSERT INTO `page_news` VALUES (12,24);
/*!40000 ALTER TABLE `page_news` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (4,'homePage','11');
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
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` VALUES (51,'ads.jpg','');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'root','pass');
INSERT INTO `user` VALUES (3,'mrkeksas','slaptazodis');
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

-- Dump completed on 2013-04-08 21:38:12
