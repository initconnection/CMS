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
INSERT INTO `category_page` VALUES (7,15,1);
INSERT INTO `category_page` VALUES (7,16,2);
INSERT INTO `category_page` VALUES (7,17,3);
INSERT INTO `category_page` VALUES (7,18,4);
INSERT INTO `category_page` VALUES (7,19,5);
INSERT INTO `category_page` VALUES (7,20,6);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,'page','Simple page');
INSERT INTO `module` VALUES (2,'news','News');
INSERT INTO `module` VALUES (3,'gallery','Gallery');
INSERT INTO `module` VALUES (4,'home','Home');
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
  `name` varchar(255) NOT NULL,
  `heading` text NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (25,'sed-ut-perspiciatis-unde','Sed ut perspiciatis unde','<p>Domnis iste natus error sit voluptam accusa doloremque</p>\r\n','2013-04-12 17:46:51');
INSERT INTO `news` VALUES (26,'totam-rem-aperiam','Totam rem aperiam','<p>Eaqueipsa quae abillo inventoretis et quasi architecto beatae</p>\r\n','2013-04-12 17:45:35');
INSERT INTO `news` VALUES (27,'headingas','Headingas','<p>Naujeinasgasgasgsagsa</p>\r\n','2013-05-08 16:52:38');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen&nbsp;resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','kakaka','fasf',4,'2013-05-08 18:17:36');
INSERT INTO `page` VALUES (16,'About','about','','','',1,'2013-04-08 19:13:13');
INSERT INTO `page` VALUES (17,'Privacy','privacy','<p>gasgasg</p>\r\n','','',1,'2013-04-08 19:27:32');
INSERT INTO `page` VALUES (18,'Gallery','gallery','','','',1,'2013-04-08 19:13:24');
INSERT INTO `page` VALUES (19,'Contact','contact','','','',1,'2013-04-08 19:13:29');
INSERT INTO `page` VALUES (20,'Sitemap','sitemap','','','',1,'2013-04-08 19:13:35');
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
INSERT INTO `page_history` VALUES (15,'Home','home','','','',1,'2013-04-08 19:13:08',1);
INSERT INTO `page_history` VALUES (15,'Home','home','<ol>\r\n	<li>hdfh</li>\r\n	<li>fjfgj</li>\r\n	<li>jdfj</li>\r\n	<li>fjkfg</li>\r\n	<li>kioi</li>\r\n</ol>\r\n','','',1,'2013-04-08 19:28:48',2);
INSERT INTO `page_history` VALUES (15,'Home','home','<ol>\r\n	<li>hdfh</li>\r\n	<li>fjfgj</li>\r\n	<li>jdfj</li>\r\n	<li>fjkfg</li>\r\n	<li>kioi</li>\r\n</ol>\r\n','','',2,'2013-04-12 16:53:46',3);
INSERT INTO `page_history` VALUES (15,'Welcome to Our Design Company!','welcome-to-our-design-company!','<p>&lt;p&gt;Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp;amp; CSS3 valid.&lt;/p&gt;<br />\r\n&lt;figure&gt;&lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;images/banner1.jpg&quot; alt=&quot;&quot;&gt;&lt;/a&gt;&lt;/figure&gt;<br />\r\n&lt;p&gt;This website template has several pages: &lt;a href=&quot;index.html&quot;&gt;Home&lt;/a&gt;, &lt;a href=&quot;about.html&quot;&gt;About us&lt;/a&gt;, &lt;a href=&quot;privacy.html&quot;&gt;Privacy Policy&lt;/a&gt;, &lt;a href=&quot;gallery.html&quot;&gt;Gallery&lt;/a&gt;, &lt;a href=&quot;contacts.html&quot;&gt;Contact us&lt;/a&gt; (note that contact us form &ndash; doesn&rsquo;t work), &lt;a href=&quot;sitemap&quot;&gt;Site Map&lt;/a&gt;.&lt;/p&gt;<br />\r\nThis website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.&nbsp;</p>\r\n','','',1,'2013-04-12 17:21:18',4);
INSERT INTO `page_history` VALUES (15,'Home','home','<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n              <figure><a href=\"#\"><img src=\"images/banner1.jpg\" alt=\"\"></a></figure>\r\n              <p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form â€“ doesnâ€™t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n              This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.\r\n','','',1,'2013-04-12 17:21:42',5);
INSERT INTO `page_history` VALUES (15,'Home','home','<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<figure><a href=\"#\"><img alt=\"\" src=\"images/banner1.jpg\" /></a></figure>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-12 17:22:12',6);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<figure><a href=\"#\"><img alt=\"\" src=\"images/banner1.jpg\" /></a></figure>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',1,'2013-04-12 17:26:52',7);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<figure><a href=\"#\"><img alt=\"\" src=\"images/banner1.jpg\" /></a></figure>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-12 17:27:10',8);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-12 17:38:11',9);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by Te<img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"line-height: 1.6em; opacity: 0.9; width: 566px; height: 117px;\" /><span style=\"line-height: 1.6em;\">mplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-12 18:37:00',10);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by Te<span style=\"line-height: 1.6em;\">mplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-12 18:37:34',11);
INSERT INTO `page_history` VALUES (15,'Home','home','<div class=\"main-box\">\r\n<div class=\"container\">\r\n<div class=\"inside\">\r\n<div class=\"wrapper\">\r\n<section id=\"content\">\r\n<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by Te<span style=\"line-height: 1.6em;\">mplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n</section>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n','','',2,'2013-04-14 20:14:37',12);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by Te<span style=\"line-height: 1.6em;\">mplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-17 22:07:48',13);
INSERT INTO `page_history` VALUES (15,'Home','home','<div class=\"container\">\r\n<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by Te<span style=\"line-height: 1.6em;\">mplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n</div>','','',2,'2013-04-17 22:12:53',14);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by Te<span style=\"line-height: 1.6em;\">mplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-17 22:13:04',15);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by Te<span style=\"line-height: 1.6em;\">mplateMonster.com team. This website template is optimized for 1024X768 screen resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-04-17 22:13:04',16);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>De<span style=\"background-color:Lime;\">sign Company is a free web template created by Te</span><span style=\"line-height: 1.6em;\"><span style=\"background-color:Lime;\">mplateMonster.com team. This website template is optimized for 1024X768 screen</span> resolution. It is also HTML5 &amp; CSS3 valid.</span></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-05-08 16:31:52',17);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen&nbsp;resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-05-08 16:32:27',18);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen&nbsp;resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','','',2,'2013-05-08 16:32:27',19);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen&nbsp;resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','kakaka','fasf',2,'2013-05-08 17:24:34',20);
INSERT INTO `page_history` VALUES (15,'Home','home','<h2>Welcome to <span>Our Design Company!</span></h2>\r\n\r\n<p>Design Company is a free web template created by TemplateMonster.com team. This website template is optimized for 1024X768 screen&nbsp;resolution. It is also HTML5 &amp; CSS3 valid.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/CMS/upload/banner1.jpg\" style=\"opacity: 0.9; line-height: 1.6em; width: 566px; height: 117px;\" /></p>\r\n\r\n<p>This website template has several pages: <a href=\"index.html\">Home</a>, <a href=\"about.html\">About us</a>, <a href=\"privacy.html\">Privacy Policy</a>, <a href=\"gallery.html\">Gallery</a>, <a href=\"contacts.html\">Contact us</a> (note that contact us form &ndash; doesn&rsquo;t work), <a href=\"sitemap\">Site Map</a>.</p>\r\n\r\n<p>This website template can be delivered in two packages - with PSD source files included and without them. If you need PSD source files, please go to the template download page at TemplateMonster to leave the e-mail address that you want the template ZIP package to be delivered to.</p>\r\n','kakaka','fasf',4,'2013-05-08 18:17:36',21);
INSERT INTO `page_history` VALUES (17,'Privacy','privacy','','','',1,'2013-04-08 19:13:18',1);
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
INSERT INTO `page_news` VALUES (15,25);
INSERT INTO `page_news` VALUES (15,26);
INSERT INTO `page_news` VALUES (15,27);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site`
--

LOCK TABLES `site` WRITE;
/*!40000 ALTER TABLE `site` DISABLE KEYS */;
INSERT INTO `site` VALUES (4,'homePage','15');
INSERT INTO `site` VALUES (6,'siteTitle','Coursera');
/*!40000 ALTER TABLE `site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (6,58,'http://google.com','Slide 1');
INSERT INTO `slides` VALUES (7,59,'http://facebook.com','Slide 2');
INSERT INTO `slides` VALUES (8,60,'http://demo.puslapiai.eu/tg/Tarifai','Slide 3');
INSERT INTO `slides` VALUES (9,61,'http://donatas.com','Slide 4');
INSERT INTO `slides` VALUES (10,62,'http://nea.c','Slide 5');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload`
--

LOCK TABLES `upload` WRITE;
/*!40000 ALTER TABLE `upload` DISABLE KEYS */;
INSERT INTO `upload` VALUES (58,'slide1.jpg');
INSERT INTO `upload` VALUES (59,'slide2.jpg');
INSERT INTO `upload` VALUES (60,'slide3.jpg');
INSERT INTO `upload` VALUES (61,'slide4.jpg');
INSERT INTO `upload` VALUES (62,'slide5.jpg');
INSERT INTO `upload` VALUES (63,'guitar.jpg');
INSERT INTO `upload` VALUES (64,'guitar_1.jpg');
INSERT INTO `upload` VALUES (65,'guitar_2.jpg');
INSERT INTO `upload` VALUES (67,'banner1.jpg');
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

-- Dump completed on 2013-05-08 22:14:45
