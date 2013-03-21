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
INSERT INTO `category_page` VALUES (1,34,2);
INSERT INTO `category_page` VALUES (1,39,3);
INSERT INTO `category_page` VALUES (1,40,4);
INSERT INTO `category_page` VALUES (1,41,5);
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (34,'Gallery','<p><img alt=\"\" src=\"http://cdn.arstechnica.net/wp-content/uploads/2012/10/01_Place_Peters-640x450.jpg\" style=\"width: 640px; height: 450px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://cdn.arstechnica.net/wp-content/uploads/2012/10/02_Place_Piorkowski-640x426.jpg\" style=\"width: 640px; height: 426px;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://cdn.arstechnica.net/wp-content/uploads/2012/10/09_Place_22047_3_Drange-640x567.jpg\" style=\"width: 640px; height: 567px;\" /></p>\r\n','','',1,'2013-03-21 00:36:19');
INSERT INTO `page` VALUES (35,'Contacts','<p>Curabitur et urna purus, convallis condimentum ante. Duis nec sagittis nibh. Mauris porta ullamcorper vulputate. Pellentesque luctus, sapien non rutrum dictum, erat lacus porta diam, a viverra felis enim quis dolor. Nulla semper, mi quis ullamcorper tincidunt, quam felis lobortis nisl, vel sodales arcu mauris quis risus. Sed fringilla sapien tortor. Cras aliquet, erat quis mattis adipiscing, metus dolor accumsan mi, euismod pulvinar orci tellus a sapien. Nullam et eros mi, ut luctus velit. Nulla vehicula nisi nec sapien viverra at adipiscing eros lacinia. Donec mollis consectetur magna, eget hendrerit augue interdum aliquet. Ut vitae lorem id metus suscipit aliquet. In ligula odio, dignissim non interdum id, sagittis quis sem. Morbi nec sem non purus tristique commodo eu eu lectus.</p>\r\n','','',1,'2013-03-21 00:37:50');
INSERT INTO `page` VALUES (37,'DUK','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lacus velit, aliquet non dignissim quis, interdum vitae ante. Sed ac diam in magna vulputate feugiat. Morbi ut mollis quam. Duis rhoncus volutpat euismod. Nullam id tempus sapien. Morbi magna mi, eleifend non volutpat vitae, posuere id turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elementum tellus in risus mollis vel ullamcorper diam bibendum. Sed ac arcu ut odio suscipit tempus vitae sed mi. Suspendisse potenti.</p>\r\n','','',1,'2013-03-21 00:37:44');
INSERT INTO `page` VALUES (38,'Support','<p>Sed massa quam, mollis eu auctor non, interdum nec est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin interdum justo et libero vulputate ultrices. Donec dui purus, sagittis ac fermentum sit amet, ornare ut eros. Donec sit amet cursus tortor. Donec quis turpis dui. Donec eget arcu nisi, quis hendrerit arcu. Etiam ipsum sem, consequat ac malesuada at, ullamcorper facilisis nisl.</p>\r\n','','',1,'2013-03-21 00:37:56');
INSERT INTO `page` VALUES (39,'About','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in augue libero. Proin posuere elit eleifend erat tristique hendrerit. Phasellus facilisis congue nisl vitae luctus. Vestibulum congue dignissim dictum. Integer interdum suscipit neque vel tristique. Pellentesque faucibus neque volutpat elit molestie adipiscing. Donec enim orci, consequat eget dapibus sit amet, accumsan nec turpis. Curabitur tincidunt ipsum eu dui scelerisque eget tempus neque interdum. Duis lobortis, nibh at dictum interdum, est lorem consectetur augue, id sollicitudin urna massa quis velit. Nam odio ligula, varius vitae egestas sit amet, ultrices id diam. Mauris fringilla adipiscing eros eu posuere. In in ligula viverra turpis rhoncus semper. Integer egestas pellentesque quam at dapibus. Praesent non libero neque. Cras et luctus augue. Phasellus vehicula aliquet quam sit amet molestie.</p>\r\n','','',1,'2013-03-21 02:13:00');
INSERT INTO `page` VALUES (40,'News','<p>Cras mattis turpis porttitor mauris pretium non commodo lacus bibendum. Duis sollicitudin pellentesque nunc ac eleifend. Sed et orci sed nibh scelerisque imperdiet vitae at arcu. Vivamus varius tortor eget felis lobortis laoreet. Integer sollicitudin massa sed ante faucibus venenatis. Ut placerat erat sed enim sagittis a ultrices nibh adipiscing. Nulla ornare, augue non malesuada sagittis, dolor arcu hendrerit arcu, ut fringilla nulla lorem vel orci. Vestibulum gravida nulla ac sapien euismod sed fermentum libero imperdiet. Nunc et laoreet lacus. Integer sodales libero nisi, nec pharetra tortor. Suspendisse ut turpis lectus, eget facilisis arcu. Ut sed gravida augue. Fusce ullamcorper hendrerit eleifend. Nulla eu magna suscipit mauris facilisis scelerisque a congue justo. Vestibulum orci metus, egestas vel condimentum quis, consequat eu urna.</p>\r\n\r\n<p>Curabitur vitae justo dui. Mauris lorem dui, rutrum eget varius in, bibendum in leo. Vestibulum venenatis risus consectetur eros tristique consequat condimentum leo eleifend. Maecenas gravida cursus lorem, eget cursus ante gravida non. Proin fermentum aliquam lorem, vel lobortis enim mattis a. Morbi eget nulla augue, ut consectetur nisl. Vivamus consectetur nisl ut tellus consectetur luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus bibendum congue risus ut tempus. Quisque fringilla, justo ac varius viverra, quam odio facilisis ipsum, sed dapibus dolor sapien non est. Maecenas vitae nibh massa, ac interdum libero. Aliquam lobortis tincidunt ipsum non mattis. Aenean vulputate, nisl quis consequat molestie, urna sem bibendum quam, in elementum nibh nisl quis arcu. Donec ac ligula turpis, in malesuada nulla.</p>\r\n','','',1,'2013-03-21 02:13:11');
INSERT INTO `page` VALUES (41,'Contacts','<p>Curabitur volutpat augue id metus scelerisque pulvinar. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec libero justo, porta ut varius tristique, sagittis eu felis. Curabitur fringilla blandit scelerisque. Aenean aliquam euismod placerat. Aliquam consequat eros lobortis urna mollis porta. Praesent gravida adipiscing ultrices. In hac habitasse platea dictumst.</p>\r\n\r\n<p>Quisque eget sapien orci, ac viverra neque. In et elit erat, non euismod tortor. Nulla ut lacus risus. Vestibulum consectetur orci tellus, eget blandit elit. Mauris odio mi, porttitor eget lacinia non, mollis nec diam. Mauris adipiscing dolor vel ligula volutpat hendrerit. Vivamus sed convallis tortor. Integer in nulla diam, venenatis venenatis ante. Mauris molestie, orci sit amet iaculis varius, ante risus dictum diam, sed bibendum leo velit nec mauris.</p>\r\n','','',1,'2013-03-21 02:13:24');
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

-- Dump completed on 2013-03-21  4:20:40
