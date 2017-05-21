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
-- Temporary table structure for view `Worker`
--

DROP TABLE IF EXISTS `Worker`;
/*!50001 DROP VIEW IF EXISTS `Worker`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `Worker` AS SELECT 
 1 AS `FirstName`,
 1 AS `FamilyName`,
 1 AS `Age`,
 1 AS `Sex`,
 1 AS `PictureName`,
 1 AS `Password`,
 1 AS `SecurityAnswer`,
 1 AS `Email`,
 1 AS `SecondEmail`,
 1 AS `SecretQuestion_ID`,
 1 AS `User_ID`,
 1 AS `ID`,
 1 AS `Profession`,
 1 AS `PaymentPerHour`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `Worker`
--

/*!50001 DROP VIEW IF EXISTS `Worker`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `Worker` AS select `User`.`FirstName` AS `FirstName`,`User`.`FamilyName` AS `FamilyName`,`User`.`Age` AS `Age`,`User`.`Sex` AS `Sex`,`User`.`PictureName` AS `PictureName`,`User`.`Password` AS `Password`,`User`.`SecurityAnswer` AS `SecurityAnswer`,`User`.`Email` AS `Email`,`User`.`SecondEmail` AS `SecondEmail`,`User`.`SecretQuestion_ID` AS `SecretQuestion_ID`,`User`.`ID` AS `User_ID`,`WorkMan`.`ID` AS `ID`,`WorkMan`.`Profession` AS `Profession`,`WorkMan`.`PaymentPerHour` AS `PaymentPerHour` from (`User` join `WorkMan` on((`User`.`ID` = `WorkMan`.`User_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-21 11:36:30
