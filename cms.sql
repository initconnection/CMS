-- MySQL dump 10.13  Distrib 5.6.10, for Win64 (x86_64)
--
-- Host: localhost    Database: cms
-- ------------------------------------------------------
-- Server version	5.6.10

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Top menu','top-menu');
INSERT INTO `category` VALUES (4,'Bottom menu','bottom-menu');
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
INSERT INTO `category_page` VALUES (1,32,1);
INSERT INTO `category_page` VALUES (1,33,3);
INSERT INTO `category_page` VALUES (1,34,2);
INSERT INTO `category_page` VALUES (4,35,3);
INSERT INTO `category_page` VALUES (4,37,1);
INSERT INTO `category_page` VALUES (4,38,4);
/*!40000 ALTER TABLE `category_page` ENABLE KEYS */;
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
  `content` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `module` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (32,'About','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tempus cursus enim eget semper. Integer nec lorem odio, nec aliquet arcu. Ut vitae est vel nisi faucibus placerat. Ut id justo in justo viverra molestie. Sed tempus convallis fringilla. Maecenas gravida erat sed velit condimentum faucibus. Maecenas dignissim suscipit justo at mollis. Aenean sed tortor nec nisl rutrum volutpat. Aenean sit amet ipsum urna. Proin gravida porttitor nisi ut viverra.</p>\r\n\r\n<p>Sed placerat porta ante, non vulputate libero ornare eu. Aliquam ut magna vitae ipsum lobortis aliquam. Suspendisse pulvinar pretium eros, vel elementum nibh feugiat in. Cras odio augue, condimentum vel viverra eu, tincidunt vel metus. Quisque nec massa vitae sem laoreet scelerisque a ut dolor. Aenean nec justo leo. Suspendisse in dignissim velit. Curabitur dapibus, erat eu sodales malesuada, felis turpis consectetur enim, ac suscipit tortor quam eget ipsum.</p>\r\n\r\n<p>Nulla convallis, urna id aliquam pellentesque, magna nulla gravida leo, id molestie diam elit vitae quam. Vestibulum rhoncus facilisis lacus, sit amet posuere ligula vulputate ut. Fusce pharetra, enim et elementum fermentum, nisi est feugiat nisl, sit amet vulputate est quam non purus. Etiam a risus a massa suscipit varius. Proin ac massa lorem. Ut vestibulum tellus ut nulla consectetur fermentum in sed ante. Mauris bibendum arcu non nisi malesuada feugiat. Etiam mollis volutpat ipsum nec ultricies. Fusce vehicula dictum suscipit. Vivamus et euismod massa. Sed consequat blandit purus in blandit. Ut eu dui metus, id placerat urna.</p>\r\n','','',1,'2013-03-21 00:33:50');
INSERT INTO `page` VALUES (33,'Contacts','<p>Sed leo risus, facilisis at varius eget, varius auctor ligula. Sed leo quam, tempus a lacinia a, tempor eget neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque sit amet nibh arcu. Suspendisse potenti. Maecenas malesuada semper neque, quis vulputate nisl porta sit amet. Integer eu mi at urna semper tristique at quis tortor. Aliquam arcu lacus, consectetur nec malesuada ut, tristique quis enim. Integer pretium feugiat dolor eu adipiscing. Morbi semper felis in augue varius a pharetra lacus pellentesque. In pretium consectetur risus in pharetra. Maecenas vulputate urna in enim lacinia eu porttitor tellus lobortis. Duis pellentesque, elit eu auctor condimentum, dui felis rutrum ligula, vitae molestie eros enim non velit.</p>\r\n\r\n<p>Mauris tempor ornare erat, in hendrerit ipsum faucibus in. Phasellus dignissim nisl iaculis odio dapibus viverra. Ut aliquam sem id dolor aliquet vestibulum. Nam mi erat, vulputate nec tristique et, aliquet ac augue. Donec malesuada sem id justo placerat volutpat. Fusce a fringilla nulla. In congue tincidunt velit, nec mattis tellus rhoncus at. Aliquam et massa velit, eu pretium neque. Fusce id posuere diam. In pharetra augue sed purus mollis feugiat. Nunc enim mi, viverra sit amet vestibulum non, mollis quis massa. Suspendisse vel mauris nunc, ac posuere diam. Integer vel enim ac dui luctus cursus in et lacus. Curabitur id interdum neque.</p>\r\n','','',1,'2013-03-21 00:34:38');
INSERT INTO `page` VALUES (34,'Gallery','<p><img alt=\"\" src=\"http://cdn.arstechnica.net/wp-content/uploads/2012/10/01_Place_Peters-640x450.jpg\" style=\"width: 640px; height: 450px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://cdn.arstechnica.net/wp-content/uploads/2012/10/02_Place_Piorkowski-640x426.jpg\" style=\"width: 640px; height: 426px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://cdn.arstechnica.net/wp-content/uploads/2012/10/09_Place_22047_3_Drange-640x567.jpg\" style=\"width: 640px; height: 567px;\" /></p>\r\n','','',1,'2013-03-21 00:36:19');
INSERT INTO `page` VALUES (35,'Contacts','<p>Curabitur et urna purus, convallis condimentum ante. Duis nec sagittis nibh. Mauris porta ullamcorper vulputate. Pellentesque luctus, sapien non rutrum dictum, erat lacus porta diam, a viverra felis enim quis dolor. Nulla semper, mi quis ullamcorper tincidunt, quam felis lobortis nisl, vel sodales arcu mauris quis risus. Sed fringilla sapien tortor. Cras aliquet, erat quis mattis adipiscing, metus dolor accumsan mi, euismod pulvinar orci tellus a sapien. Nullam et eros mi, ut luctus velit. Nulla vehicula nisi nec sapien viverra at adipiscing eros lacinia. Donec mollis consectetur magna, eget hendrerit augue interdum aliquet. Ut vitae lorem id metus suscipit aliquet. In ligula odio, dignissim non interdum id, sagittis quis sem. Morbi nec sem non purus tristique commodo eu eu lectus.</p>\r\n','','',1,'2013-03-21 00:37:50');
INSERT INTO `page` VALUES (37,'DUK','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lacus velit, aliquet non dignissim quis, interdum vitae ante. Sed ac diam in magna vulputate feugiat. Morbi ut mollis quam. Duis rhoncus volutpat euismod. Nullam id tempus sapien. Morbi magna mi, eleifend non volutpat vitae, posuere id turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elementum tellus in risus mollis vel ullamcorper diam bibendum. Sed ac arcu ut odio suscipit tempus vitae sed mi. Suspendisse potenti.</p>\r\n','','',1,'2013-03-21 00:37:44');
INSERT INTO `page` VALUES (38,'Support','<p>Sed massa quam, mollis eu auctor non, interdum nec est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin interdum justo et libero vulputate ultrices. Donec dui purus, sagittis ac fermentum sit amet, ornare ut eros. Donec sit amet cursus tortor. Donec quis turpis dui. Donec eget arcu nisi, quis hendrerit arcu. Etiam ipsum sem, consequat ac malesuada at, ullamcorper facilisis nisl.</p>\r\n','','',1,'2013-03-21 00:37:56');
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
  `content` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `module` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`id`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_history`
--

LOCK TABLES `page_history` WRITE;
/*!40000 ALTER TABLE `page_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
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

-- Dump completed on 2013-03-21  2:56:27
