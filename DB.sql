CREATE DATABASE  IF NOT EXISTS `s07352026_final` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `s07352026_final`;
-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: localhost    Database: s07352026_final
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `BANK`
--

DROP TABLE IF EXISTS `BANK`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `BANK` (
  `B_name` varchar(30) NOT NULL,
  `B_code` varchar(10) NOT NULL,
  `B_manager` varchar(30) NOT NULL,
  `B_man_date` datetime NOT NULL,
  `B_address` varchar(30) NOT NULL,
  PRIMARY KEY (`B_name`),
  UNIQUE KEY `B_name_UNIQUE` (`B_name`),
  UNIQUE KEY `B_code_UNIQUE` (`B_code`),
  UNIQUE KEY `B_address_UNIQUE` (`B_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BANK`
--

LOCK TABLES `BANK` WRITE;
/*!40000 ALTER TABLE `BANK` DISABLE KEYS */;
INSERT INTO `BANK` VALUES ('東海分行','0110110011','王大鵬','2014-11-01 00:00:00','台中市西屯區台灣大道四段87號'),('永康分行','0110110012','林美華','2016-03-25 00:00:00','台南市永康區中華路87號'),('虎尾寮分行','0110110013','楊柏逸','2003-11-28 00:00:00','台南市東區裕信路87號');
/*!40000 ALTER TABLE `BANK` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CLIENT`
--

DROP TABLE IF EXISTS `CLIENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CLIENT` (
  `C_name` varchar(30) NOT NULL,
  `C_ID` varchar(10) NOT NULL,
  `C_incharge` varchar(30) NOT NULL,
  `C_phone_num` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`C_name`),
  UNIQUE KEY `C_name_UNIQUE` (`C_name`),
  UNIQUE KEY `C_ID_UNIQUE` (`C_ID`),
  UNIQUE KEY `C_phone_num_UNIQUE` (`C_phone_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CLIENT`
--

LOCK TABLES `CLIENT` WRITE;
/*!40000 ALTER TABLE `CLIENT` DISABLE KEYS */;
INSERT INTO `CLIENT` VALUES ('楊博皓','R124878787','楊博皓','098787187'),('楊志生','R187087187','楊志生','0987587087'),('楊柏逸','R125878787','楊柏逸','0987087587');
/*!40000 ALTER TABLE `CLIENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOAN_CLIENT`
--

DROP TABLE IF EXISTS `LOAN_CLIENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `LOAN_CLIENT` (
  `LP_P_name` varchar(30) NOT NULL,
  `LP_total` decimal(10,2) NOT NULL,
  `LP_repay_per_year` decimal(10,2) NOT NULL,
  `LP_C_name` varchar(30) NOT NULL,
  `LP_B_name` varchar(45) NOT NULL,
  `LP_C_code` varchar(30) NOT NULL,
  PRIMARY KEY (`LP_C_code`),
  KEY `LP_C_name_idx` (`LP_C_name`),
  KEY `LP_B_name_idx` (`LP_B_name`),
  KEY `LP_P_name_idx` (`LP_P_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOAN_CLIENT`
--

LOCK TABLES `LOAN_CLIENT` WRITE;
/*!40000 ALTER TABLE `LOAN_CLIENT` DISABLE KEYS */;
INSERT INTO `LOAN_CLIENT` VALUES ('東海A專案',400000.00,100000.00,'楊博皓','東海分行','000011'),('永康A專案',600000.00,120000.00,'楊博皓','永康分行','000021'),('永康A專案',500000.00,100000.00,'楊志生','永康分行','000022'),('虎尾寮B專案',100000.00,20000.00,'楊志生','虎尾寮分行','000031');
/*!40000 ALTER TABLE `LOAN_CLIENT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `LOAN_PROJECT`
--

DROP TABLE IF EXISTS `LOAN_PROJECT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `LOAN_PROJECT` (
  `LP_name` varchar(30) NOT NULL,
  `LP_code` varchar(10) NOT NULL,
  `LP_B_code` varchar(10) NOT NULL,
  `LP_contact` varchar(9) NOT NULL,
  `LP_Bank` varchar(30) NOT NULL,
  PRIMARY KEY (`LP_name`),
  UNIQUE KEY `LP_name_UNIQUE` (`LP_name`),
  UNIQUE KEY `LP_code_UNIQUE` (`LP_code`),
  KEY `B_code_idx` (`LP_B_code`),
  KEY `LP_B_Code_idx` (`LP_B_code`),
  KEY `LP_Bank_idx` (`LP_Bank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LOAN_PROJECT`
--

LOCK TABLES `LOAN_PROJECT` WRITE;
/*!40000 ALTER TABLE `LOAN_PROJECT` DISABLE KEYS */;
INSERT INTO `LOAN_PROJECT` VALUES ('東海A專案','022022021','0110110011','040870087','東海分行'),('東海B專案','022022024','0110110011','040870087','東海分行'),('永康A專案','022022022','0110110012','061871187','永康分行'),('永康B專案','022022025','0110110012','061871187','永康分行'),('虎尾寮A專案','022022023','0110110013','065875987','虎尾寮分行'),('虎尾寮B專案','022022026','0110110013','065875987','虎尾寮分行');
/*!40000 ALTER TABLE `LOAN_PROJECT` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-10 19:26:58
