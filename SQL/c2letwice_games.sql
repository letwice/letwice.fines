CREATE DATABASE  IF NOT EXISTS `c2letwice` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `c2letwice`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 5.39.216.138    Database: c2letwice
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.20-MariaDB-wsrep

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
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `game_id` int(10) NOT NULL AUTO_INCREMENT,
  `home_team` varchar(32) NOT NULL,
  `away_team` varchar(32) NOT NULL,
  `game_state` int(11) NOT NULL DEFAULT '1',
  `home_score` int(11) DEFAULT NULL,
  `away_score` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`game_id`),
  UNIQUE KEY `game_id` (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'Mavs 1st','Mavs Masters',0,15,4,'2016-10-01'),(2,'Thistles','Maverics',0,20,24,'2016-10-16'),(3,'Milnerton','Battswood',1,0,0,'2016-10-22'),(4,'Pirates','Milnerton',1,0,0,'2016-10-29'),(5,'Milnerton','Van Der Stel',1,0,0,'2016-11-05'),(6,'Devonshire','Milnerton',1,0,0,'2016-11-12'),(7,'Milnerton','Thistles',1,0,0,'2016-11-19'),(8,'Battswood','Milnerton',1,0,0,'2016-11-26'),(9,'Milnerton','Pirates',1,0,0,'2016-12-03'),(10,'Van Der Stel','Milnerton',1,0,0,'2016-12-10'),(11,'Milnerton','Devonshire',1,0,0,'2016-12-17'),(12,'Thistles','Milnerton',1,0,0,'2017-01-07'),(13,'Milnerton','Battswood',1,0,0,'2017-01-14'),(14,'Pirates','Milnerton',1,0,0,'2017-01-21'),(15,'Milnerton','Van Der Stel',1,0,0,'2017-01-28'),(16,'Devonshire','Milnerton',1,0,0,'2017-02-04'),(17,'Milnerton','Thistles',1,0,0,'2017-02-11'),(18,'Battswood','Milnerton',1,0,0,'2017-02-18'),(19,'Milnerton','Pirates',1,0,0,'2017-02-25'),(20,'Van Der Stel','Milnerton',1,0,0,'2017-03-04');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20  7:13:45
