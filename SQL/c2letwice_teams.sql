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
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `away_ID` int(11) NOT NULL AUTO_INCREMENT,
  `team` varchar(45) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`away_ID`),
  UNIQUE KEY `team_UNIQUE` (`team`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Mavs 1st',''),(2,'Thistles','https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3306.976623059999!2d18.505718!3d-34.018811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa0d7f9306b71100d!2sThistle+Baseball+Club!5e0!3m2!1sen!2sza!4v1476791303671'),(3,'Milnerton','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1656.7544423352228!2d18.51791553300154!3d-33.85077386657957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2669c8db6737846b!2sMilnerton+Baseball+Club+(Mavericks)!5e0!3m2!1sen!2sza!4v147'),(4,'Pirates','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2071.199446519036!2d18.87247357643606!3d-34.07996064626107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDA0JzQ1LjQiUyAxOMKwNTInMjEuOCJF!5e0!3m2!1sen!2sza!4v1476795017690'),(5,'Devonshire','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d983.4947711583011!2d18.497468032262358!3d-34.03669642344946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x59e11bacf8957436!2sFairmount+Secondary+School!5e0!3m2!1sen!2sus!4v147679583001'),(6,'Battswood','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1657.0476197406476!2d18.491526873996325!3d-33.99648095432856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5751d639c72b4c5f!2sSouthern+Suburbs+Football+League!5e0!3m2!1sen!2sus!4v14767'),(7,'Van Der Stel','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1042.1088804170927!2d18.85456855780725!3d-33.93457397349907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcdb2f547610d3d%3A0xb7a981732c8e4934!2svan+der+Stel+Rugby+Club!5e0!3m2!1sen!2sus!4v'),(8,'Devonshier','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d983.4947711583011!2d18.497468032262358!3d-34.03669642344946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x59e11bacf8957436!2sFairmount+Secondary+School!5e0!3m2!1sen!2sus!4v147679583001');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20  7:13:37
