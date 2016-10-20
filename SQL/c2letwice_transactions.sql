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
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `Trans_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Player_id` int(11) NOT NULL,
  `TransType` int(11) NOT NULL,
  `PlayerFrom` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Balance` int(11) DEFAULT '0',
  PRIMARY KEY (`Trans_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (48,1,1,NULL,'2016-10-04',0,0),(49,4,1,NULL,'2016-10-06',0,0),(50,5,1,NULL,'2016-10-07',0,0),(51,6,1,NULL,'2016-10-08',0,0),(52,7,1,NULL,'2016-10-08',0,0),(53,8,1,NULL,'2016-10-08',0,0),(54,9,1,NULL,'2016-10-08',0,0),(55,10,1,NULL,'2016-10-08',0,0),(56,11,1,NULL,'2016-10-08',0,0),(57,12,1,NULL,'2016-10-09',0,0),(58,13,1,NULL,'2016-10-13',0,0),(59,10,3,NULL,'2016-10-13',100,100),(60,2,3,NULL,'2016-10-13',10000,10000),(61,2,2,NULL,'2016-10-13',-10000,0),(62,4,3,NULL,'2016-10-13',2000,2000),(63,4,3,NULL,'2016-10-13',1000,3000),(64,6,3,NULL,'2016-10-13',500,500),(65,6,3,NULL,'2016-10-13',200,700),(66,6,3,NULL,'2016-10-13',200,900),(67,2,3,NULL,'2016-10-13',500,500),(68,2,3,NULL,'2016-10-13',2000,2500),(69,2,3,NULL,'2016-10-13',200,2700),(70,2,3,NULL,'2016-10-13',100,2800),(71,1,3,NULL,'2016-10-13',500,500),(72,1,3,NULL,'2016-10-13',200,700),(73,1,3,NULL,'2016-10-13',200,900),(74,11,3,NULL,'2016-10-13',1000,1000),(75,11,3,NULL,'2016-10-13',500,1500),(76,11,3,NULL,'2016-10-13',200,1700),(77,11,3,NULL,'2016-10-13',100,1800),(78,11,2,NULL,'2016-10-13',-2000,-200),(79,7,3,NULL,'2016-10-13',500,500),(80,7,3,NULL,'2016-10-13',200,700),(81,7,3,NULL,'2016-10-13',1000,1700),(82,5,3,NULL,'2016-10-13',1000,1000),(83,5,3,NULL,'2016-10-13',500,1500),(84,5,3,NULL,'2016-10-13',200,1700),(85,5,3,NULL,'2016-10-13',100,1800),(86,5,2,NULL,'2016-10-13',-5000,-3200),(87,5,2,NULL,'2016-10-13',-500,-3700),(88,9,3,NULL,'2016-10-13',2000,2000),(89,9,3,NULL,'2016-10-13',1000,3000),(90,9,3,NULL,'2016-10-13',500,3500),(91,9,3,NULL,'2016-10-13',200,3700),(92,9,3,NULL,'2016-10-13',200,3900),(93,1,2,NULL,'2016-10-13',-5000,-4100),(94,8,3,NULL,'2016-10-14',500,500);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`c2letwice`@`196.22.242.138`*/ /*!50003 TRIGGER `default_date` BEFORE INSERT ON `transactions` FOR EACH ROW
if ( isnull(new.date) ) then
 set new.date=curdate();
end if */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20  7:13:29
