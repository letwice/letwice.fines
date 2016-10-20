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
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `Player_Id` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `NickName` varchar(255) DEFAULT NULL,
  `EmailAdd` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `nextOfKin` varchar(255) NOT NULL,
  `NextOfKinPhone` int(10) NOT NULL,
  `RBI` int(11) DEFAULT '0',
  `StrikeOuts` int(11) DEFAULT '0',
  `HomeRuns` int(11) DEFAULT '0',
  PRIMARY KEY (`Player_Id`),
  UNIQUE KEY `Player_Id` (`Player_Id`),
  UNIQUE KEY `Player_Id_2` (`Player_Id`),
  UNIQUE KEY `Player_Id_3` (`Player_Id`),
  UNIQUE KEY `CK_Last_First_Name` (`LastName`,`FirstName`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'Dlamini','Lethu','letwice','letwice101@gmail.com',736670421,'Mandy',734292017,0,0,0),(2,'Barnes','Clinton','Barnes','cbarnes@bosmansdam.co.za',738018835,'Robyn',725962173,0,0,0),(3,'charlie','siya','best player on the team','charlisiya@gmail.com',749481316,'beauty charlie',719535161,0,0,0),(4,'Lawson','Ashley','Ginger','ashleyspslawson@gmail.com',767725711,'Colin',820769529,0,0,0),(5,'Gray','Clinton','Baltjies','cgray31@gmail.com',764285530,'Toni Hendricks',825071923,0,0,0),(6,'Muir','Devin','Bakkies/Wors/Bongi','devinmuir@live.co.uk',836807688,'Jenni Muir',726596388,0,0,0),(7,'ndlovu','thabo','spanky mampara','thabondlovu428@gmail.com',629617224,'My mother',762892533,0,0,0),(8,'Barnes','Jonathan','Baines','barnesjon86@gmail.com',833489981,'Mom',769335113,0,0,0),(9,'steyn','che','da vinci','che.steyn9@gmail.com',815742072,'bianca',729683262,0,0,0),(10,'Caddie','Patrick','Paddie','patrick@digidoor.co.za',824857088,'Natalie',782600552,0,0,0),(11,'Fullex','Jody','Joyce','jodyfullex_6@hotmail.com',834923153,'Kayla',817292085,0,0,0),(12,'Swami','Archit','Archibald','swamarchit@gmail.com',637944291,'Titu (Raghuvansh Swami)',836111212,0,0,0),(13,'Collins','Tyrone','Tie','tyronej14collins@gmail.com',605057188,'No one',0,0,0,0);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-20  7:13:41
