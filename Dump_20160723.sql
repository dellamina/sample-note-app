CREATE DATABASE  IF NOT EXISTS `note_app` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `note_app`;
-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: note_app
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1.1

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
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `text` varchar(256) NOT NULL,
  `folder` varchar(64) NOT NULL DEFAULT 'Main',
  `createdat` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedat` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,1,'First note','SQLException for sure!?!?','application','2016-07-03 14:05:07','2016-07-22 21:03:25'),(2,1,'Second one','Let\'s talk about log? I still need to implement it!','application','2016-07-03 17:46:45','2016-07-22 21:04:27'),(3,1,'Logger','Create a logger:\r\nstatic method debug, info, warn, error\r\nfile rolling each day','TODO!!','2016-07-03 19:16:12','2016-07-22 22:00:13'),(4,1,'Users','Add the opportunity for new users to register and start using the application after have been authorized by the admin.','TODO!!','2016-07-03 19:20:48','2016-07-22 22:03:21'),(5,1,'MaterializeCSS','A modern responsive front-end framework based on Material Design.\r\nhttp://materializecss.com/','credits','2016-07-04 18:08:23','2016-07-22 22:04:44'),(6,1,'CodeIgniter','CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.\r\nhttps://www.codeigniter.com/','credits','2016-07-21 21:12:17','2016-07-22 22:05:29'),(7,1,'Static HomePage','Make a landingpage for the application.\r\nMterial Design (required)','TODO!!','2016-07-22 22:07:21','2016-07-22 22:08:33');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `cognome` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `createdat` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedat` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'dummy@user','dummy','user','$2y$10$ewg6RulT/xwNHPkgTRaHsePTmC4oSxqpC3ZVCiUDdfmaf9U1Ixuum','2016-07-02 16:43:14','2016-07-22 21:01:09');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-23 12:17:39
