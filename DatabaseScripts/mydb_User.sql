-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `FamilyName` varchar(45) NOT NULL,
  `Age` tinyint(4) NOT NULL,
  `Sex` varchar(20) NOT NULL,
  `PictureName` varchar(45) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `SecurityAnswer` varchar(40) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `SecondEmail` varchar(45) NOT NULL,
  `SecretQuestion_ID` int(11) NOT NULL,
  `IsAdministrator` int(1) NOT NULL,
  PRIMARY KEY (`ID`,`SecretQuestion_ID`),
  KEY `fk_User_SecretQuestion1_idx` (`SecretQuestion_ID`),
  CONSTRAINT `fk_User_SecretQuestion1` FOREIGN KEY (`SecretQuestion_ID`) REFERENCES `SecretQuestion` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (5,'Martin','Mirchev',15,'Male','0mwKuIC.jpg','8cb2237d0679ca88db6464eac60da96345513964','9b146ca5eb476fd790936726fbfdafccb307d89b','marti_2203@abv.bg','martin_2203@abv.bg',1,1),(15,'Shano','Mano',19,'Male','2Z21082.jpg','8cb2237d0679ca88db6464eac60da96345513964','9b146ca5eb476fd790936726fbfdafccb307d89b','shano@abv.bg','mano@abv.bg',1,0),(26,'Martin','Ivanov',16,'Male','2Z21082.jpg','8cb2237d0679ca88db6464eac60da96345513964','dc81691d3f747a7e7d4cbe0a008c6345a5438415','martin_2203@abv.bg','ivanov@abv.bg',1,0),(27,'Kiro','Tanev',19,'Male','2Z21082.jpg','8cb2237d0679ca88db6464eac60da96345513964','dc81691d3f747a7e7d4cbe0a008c6345a5438415','kiro@abv.bg','tanev@abv.bg',1,0),(28,'Ivan','Georgiev',32,'Male','5KnrP8R.jpg','8cb2237d0679ca88db6464eac60da96345513964','dc81691d3f747a7e7d4cbe0a008c6345a5438415','ivan@abv.bg','georgiev@abv.bg',1,0);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-21 11:36:29
