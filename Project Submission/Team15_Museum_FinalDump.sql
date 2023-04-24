-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: museum
-- ------------------------------------------------------
-- Server version	8.0.26-google

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `museum`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `museum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `museum`;

--
-- Table structure for table `ALERTS`
--

DROP TABLE IF EXISTS `ALERTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ALERTS` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ALERTS`
--

LOCK TABLES `ALERTS` WRITE;
/*!40000 ALTER TABLE `ALERTS` DISABLE KEYS */;
INSERT INTO `ALERTS` VALUES (5,5,'Your subscription has ended.','2023-04-12 23:39:54'),(8,9,'Your subscription has ended.','2023-04-24 00:07:26');
/*!40000 ALTER TABLE `ALERTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ARTWORKS`
--

DROP TABLE IF EXISTS `ARTWORKS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ARTWORKS` (
  `Artwork_ID` int NOT NULL,
  `Exhibit_ID` int DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Creation_Date` date NOT NULL,
  `Date_of_display` date NOT NULL,
  `Creator_Name` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  PRIMARY KEY (`Artwork_ID`),
  UNIQUE KEY `Description` (`Description`),
  KEY `Exhibit_ID` (`Exhibit_ID`),
  CONSTRAINT `ARTWORKS_ibfk_1` FOREIGN KEY (`Exhibit_ID`) REFERENCES `EXHIBITS` (`Exhibit_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ARTWORKS`
--

LOCK TABLES `ARTWORKS` WRITE;
/*!40000 ALTER TABLE `ARTWORKS` DISABLE KEYS */;
INSERT INTO `ARTWORKS` VALUES (100012,1,'Hanging scroll, ink on paper. With mount and roller','1685-01-01','2023-02-19','Hakuin Ekaku','Mount Fuji, Eggplants, and Hawk Feathers','/artworks/AW100012.png'),(100068,1,'Kanzan and Jittoku, legendary seventh-century Chinese figures','1730-01-01','2023-02-19','Soga Shohaku','Kanzan and Jittoku','/artworks/AW100068.png'),(100071,1,'Hanging scroll, ink on paper','1836-01-01','2023-02-19','Yamaoka Tesshu','Talismanic Dragon','/artworks/AW100071.png'),(100074,1,'Hanging scroll, ink on paper. 12 5/8 × 19 15/16 in.','1716-01-01','2023-02-19','Suio Genro','The Staff of the 6th Patriarch','/artworks/AW100074.png'),(200068,2,'artdemo','1970-01-01','2023-03-04','me thank you','demoart','/artworks/demoart.png');
/*!40000 ALTER TABLE `ARTWORKS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CALENDAR`
--

DROP TABLE IF EXISTS `CALENDAR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `CALENDAR` (
  `Event_Name` varchar(100) NOT NULL,
  `Time_Stamp` time NOT NULL,
  `Date_of_Event` date DEFAULT NULL,
  `Location_of_Event` varchar(100) NOT NULL,
  PRIMARY KEY (`Event_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CALENDAR`
--

LOCK TABLES `CALENDAR` WRITE;
/*!40000 ALTER TABLE `CALENDAR` DISABLE KEYS */;
INSERT INTO `CALENDAR` VALUES ('Drop-in Tour','15:30:00','2023-03-29','Nancy and Rich Kinder Building'),('Gallery Concert','18:30:00','2023-03-31','Audrey Jones Beck Building'),('Gallery Concert | “The Sound of One Hand Clapping: Traditional Japanese Instruments”','18:30:00','2023-04-13','Audrey Jones Beck Building'),('Speech','17:30:00','2023-04-02','The Caroline Wiess Building - Brown Pavillion');
/*!40000 ALTER TABLE `CALENDAR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DONATIONS`
--

DROP TABLE IF EXISTS `DONATIONS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `DONATIONS` (
  `donationindex` int NOT NULL AUTO_INCREMENT,
  `Group_Name` varchar(100) NOT NULL,
  `Day` date NOT NULL,
  `Amount` int NOT NULL,
  `Income_from_donations` int NOT NULL,
  PRIMARY KEY (`donationindex`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DONATIONS`
--

LOCK TABLES `DONATIONS` WRITE;
/*!40000 ALTER TABLE `DONATIONS` DISABLE KEYS */;
INSERT INTO `DONATIONS` VALUES (3,'Yahya Ghazanfar','2023-04-08',5,5),(4,'Taylor Rogers','2023-04-11',40,40),(5,'Taylor Rogers','2023-04-12',20,20),(6,'Taylor Rogers','2023-04-13',30,30);
/*!40000 ALTER TABLE `DONATIONS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EMAILSTOSEND`
--

DROP TABLE IF EXISTS `EMAILSTOSEND`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EMAILSTOSEND` (
  `id` int NOT NULL AUTO_INCREMENT,
  `recipient_email` varchar(200) NOT NULL,
  `subjectline` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `generated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EMAILSTOSEND`
--

LOCK TABLES `EMAILSTOSEND` WRITE;
/*!40000 ALTER TABLE `EMAILSTOSEND` DISABLE KEYS */;
INSERT INTO `EMAILSTOSEND` VALUES (6,'email4@email.com','Exhibit trigger test will close soon.','Dear brad,\n\nThis email is here to remind you that the exhibit trigger test \n            will be closing in 3 days.','2023-04-23 23:34:24'),(7,'email4@email.com','Exhibit trigger test will close soon.','Dear brad,\n\nThis email is here to remind you that the exhibit trigger test \n            will be closing in 3 days.','2023-04-24 01:02:26'),(8,'email8@email.com','Exhibit trigger test will close soon.','Dear Jiiiimmy,\n\nThis email is here to remind you that the exhibit trigger test \n            will be closing in 3 days.','2023-04-24 01:02:26'),(9,'email8@email.com','Exhibit trigger test will close soon.','Dear Johan,\n\nThis email is here to remind you that the exhibit trigger test \n            will be closing in 3 days.','2023-04-24 01:02:26');
/*!40000 ALTER TABLE `EMAILSTOSEND` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EXHIBITS`
--

DROP TABLE IF EXISTS `EXHIBITS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EXHIBITS` (
  `Exhibit_ID` int NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Number_of_artworks` int NOT NULL,
  `Number_of_visits` int NOT NULL,
  PRIMARY KEY (`Exhibit_ID`),
  UNIQUE KEY `Description` (`Description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EXHIBITS`
--

LOCK TABLES `EXHIBITS` WRITE;
/*!40000 ALTER TABLE `EXHIBITS` DISABLE KEYS */;
INSERT INTO `EXHIBITS` VALUES (1,'None Whatsoever features works of Zen Buddhist Japanese paintings from the Gitter-Yelen Collection','2023-02-19','2023-05-14','Audrey Jones Beck Building','None Whatsoever: Zen Paintings from the Gitter-Yelen Collection',107,105995),(2,'Drawings, prints, and books brought by collectors Carroll S. Masterson and Harris Masterson III','2023-03-04','2023-10-01','Rienzi','Fine Lines: Works on Paper from the Masterson Collection',11,6624),(3,'art','2023-05-01','2023-10-01','Rienzi','arttest',150,10000),(4,'artdemo','2023-06-06','2023-10-10','main','the art of the demo',50,10000),(5,'demoexhibit','2023-06-12','2023-10-10','Rienzi','demo exhibit',100,10000),(6,'trigger test','2023-04-14','2023-04-25','trigger test','trigger test',12,100);
/*!40000 ALTER TABLE `EXHIBITS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `EXIBIT_MANAGER`
--

DROP TABLE IF EXISTS `EXIBIT_MANAGER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `EXIBIT_MANAGER` (
  `Manager_ID` int NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Manager_ID`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Password` (`Password`),
  UNIQUE KEY `Manager_ID` (`Manager_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `EXIBIT_MANAGER`
--

LOCK TABLES `EXIBIT_MANAGER` WRITE;
/*!40000 ALTER TABLE `EXIBIT_MANAGER` DISABLE KEYS */;
/*!40000 ALTER TABLE `EXIBIT_MANAGER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GIFTSHOPPURCHASES`
--

DROP TABLE IF EXISTS `GIFTSHOPPURCHASES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `GIFTSHOPPURCHASES` (
  `PurchaseID` int NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(80) DEFAULT NULL,
  `ItemIncome` int DEFAULT NULL,
  `Purchasedate` date DEFAULT NULL,
  PRIMARY KEY (`PurchaseID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GIFTSHOPPURCHASES`
--

LOCK TABLES `GIFTSHOPPURCHASES` WRITE;
/*!40000 ALTER TABLE `GIFTSHOPPURCHASES` DISABLE KEYS */;
INSERT INTO `GIFTSHOPPURCHASES` VALUES (1,'T-Shirt',30,'2023-04-23'),(2,'T-Shirt',30,'2023-04-23'),(3,'Keychain',5,'2023-04-01'),(4,'Keychain',5,'2023-04-02'),(5,'Keychain',5,'2023-04-02'),(6,'Keychain',5,'2023-04-03'),(7,'Keychain',5,'2023-04-04'),(8,'Keychain',5,'2023-04-05'),(9,'Keychain',5,'2023-04-06'),(10,'Keychain',5,'2023-04-07'),(11,'Keychain',5,'2023-04-08'),(12,'Keychain',5,'2023-04-09'),(13,'Keychain',5,'2023-04-09'),(14,'Keychain',5,'2023-04-10'),(15,'Keychain',5,'2023-04-11'),(16,'Philip Guston Print',22,'2023-04-15'),(17,'Philip Guston Print',22,'2023-04-20');
/*!40000 ALTER TABLE `GIFTSHOPPURCHASES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GIFT_SHOP`
--

DROP TABLE IF EXISTS `GIFT_SHOP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `GIFT_SHOP` (
  `Item_ID` int NOT NULL AUTO_INCREMENT,
  `Product_amt` int NOT NULL,
  `Product_name` varchar(80) NOT NULL,
  `Income_from_gift_shop` int NOT NULL DEFAULT '0',
  `Item_Cost` int NOT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GIFT_SHOP`
--

LOCK TABLES `GIFT_SHOP` WRITE;
/*!40000 ALTER TABLE `GIFT_SHOP` DISABLE KEYS */;
INSERT INTO `GIFT_SHOP` VALUES (1,17,'Keychain',65,5),(2,18,'T-Shirt',60,30),(3,15,'The Story Of Art',0,23),(4,15,'Giacometti Tote Bag',0,12),(5,10,'Van Gogh Cypresses',0,50),(6,8,'Philip Guston Print',44,22),(8,50,'Henri Matisse Woman in a Purple Coat Print',0,30),(9,30,'demoart',0,20);
/*!40000 ALTER TABLE `GIFT_SHOP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MANAGER`
--

DROP TABLE IF EXISTS `MANAGER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MANAGER` (
  `Email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MANAGER`
--

LOCK TABLES `MANAGER` WRITE;
/*!40000 ALTER TABLE `MANAGER` DISABLE KEYS */;
INSERT INTO `MANAGER` VALUES ('manager@mfah.org','qsxcgy$45');
/*!40000 ALTER TABLE `MANAGER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOVIES`
--

DROP TABLE IF EXISTS `MOVIES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MOVIES` (
  `MovName` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Language` varchar(75) DEFAULT NULL,
  `Director` varchar(40) DEFAULT NULL,
  `Year` decimal(4,0) NOT NULL,
  `Runtime` decimal(3,0) NOT NULL,
  `Poster` varchar(100) NOT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`MovName`,`Year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOVIES`
--

LOCK TABLES `MOVIES` WRITE;
/*!40000 ALTER TABLE `MOVIES` DISABLE KEYS */;
INSERT INTO `MOVIES` VALUES ('North by Northwest','Featuring a memorable encounter with a crop duster in the middle of nowhere, and the thrilling climax at Mount Rushmore, this riveting movie laid the groundwork for countless action thrillers.','English','Alfred Hitchcock',1959,136,'north-by-northwest.jpg',9.00);
/*!40000 ALTER TABLE `MOVIES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MOVIE_TIMES`
--

DROP TABLE IF EXISTS `MOVIE_TIMES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MOVIE_TIMES` (
  `MovName` varchar(100) NOT NULL,
  `Day` date NOT NULL,
  `Time` time NOT NULL,
  PRIMARY KEY (`MovName`,`Day`),
  CONSTRAINT `MOVIE_TIMES_ibfk_1` FOREIGN KEY (`MovName`) REFERENCES `MOVIES` (`MovName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MOVIE_TIMES`
--

LOCK TABLES `MOVIE_TIMES` WRITE;
/*!40000 ALTER TABLE `MOVIE_TIMES` DISABLE KEYS */;
INSERT INTO `MOVIE_TIMES` VALUES ('North by Northwest','2023-04-21','19:00:00'),('North by Northwest','2023-04-22','19:00:00'),('North by Northwest','2023-04-23','17:00:00');
/*!40000 ALTER TABLE `MOVIE_TIMES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PARKING`
--

DROP TABLE IF EXISTS `PARKING`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PARKING` (
  `Zone` char(10) NOT NULL,
  `PHours` time NOT NULL,
  `Price` int NOT NULL,
  `Passes_given_per_day` int NOT NULL,
  `Income_from_parking_per_week` int NOT NULL,
  `capacity` int NOT NULL,
  PRIMARY KEY (`Zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PARKING`
--

LOCK TABLES `PARKING` WRITE;
/*!40000 ALTER TABLE `PARKING` DISABLE KEYS */;
INSERT INTO `PARKING` VALUES ('A','01:12:00',15,60,900,200),('B','02:00:00',20,65,1000,199);
/*!40000 ALTER TABLE `PARKING` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PARKING_PASS`
--

DROP TABLE IF EXISTS `PARKING_PASS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PARKING_PASS` (
  `PPid` int NOT NULL AUTO_INCREMENT,
  `License_Plate` varchar(10) NOT NULL,
  `PPDate` date NOT NULL,
  `PDuration` time NOT NULL,
  `Visitor_Email` varchar(50) NOT NULL,
  PRIMARY KEY (`PPid`),
  KEY `Visitor_Email` (`Visitor_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PARKING_PASS`
--

LOCK TABLES `PARKING_PASS` WRITE;
/*!40000 ALTER TABLE `PARKING_PASS` DISABLE KEYS */;
INSERT INTO `PARKING_PASS` VALUES (1,'TZS7312','2022-08-07','03:00:00','phobias17@gmail.com'),(2,'SOL9145','2023-01-04','04:00:00','phobias17@gmail.com'),(3,'KLM8383','2023-02-23','02:00:00','phobias17@gmail.com'),(4,'PBL4488','2023-04-12','03:00:00','phobias17@gmail.com');
/*!40000 ALTER TABLE `PARKING_PASS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RESTAURANT`
--

DROP TABLE IF EXISTS `RESTAURANT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `RESTAURANT` (
  `Restaurant_name` varchar(60) NOT NULL,
  `Hours_of_service` time DEFAULT NULL,
  `Income_from_restaurant` int DEFAULT NULL,
  `People_dining_per_day` int DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Restaurant_name`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RESTAURANT`
--

LOCK TABLES `RESTAURANT` WRITE;
/*!40000 ALTER TABLE `RESTAURANT` DISABLE KEYS */;
INSERT INTO `RESTAURANT` VALUES ('Cafe Leonelli','09:30:00',2000,272,'2023-04-01'),('Cafe Leonelli','09:30:00',2500,231,'2023-04-02'),('Cafe Leonelli','09:30:00',2200,189,'2023-04-05'),('Cafe Leonelli','09:30:00',2600,220,'2023-04-06'),('Cafe Leonelli','09:30:00',2340,225,'2023-04-07'),('Cafe Leonelli','09:30:00',2750,280,'2023-04-08'),('Cafe Leonelli','09:30:00',3000,291,'2023-04-09'),('Cafe Leonelli','09:30:00',2600,199,'2023-04-12'),('Cafe Leonelli','09:30:00',2650,210,'2023-04-13'),('Cafe Leonelli','09:30:00',2840,225,'2023-04-14'),('Cafe Leonelli','09:30:00',2350,180,'2023-04-15'),('Cafe Leonelli','09:30:00',2530,201,'2023-04-16'),('Cafe Leonelli','09:30:00',2390,204,'2023-04-19'),('Cafe Leonelli','09:30:00',2660,215,'2023-04-20'),('Cafe Leonelli','09:30:00',2740,235,'2023-04-21'),('Cafe Leonelli','09:30:00',2450,190,'2023-04-22'),('Cafe Leonelli','09:30:00',3030,250,'2023-04-23');
/*!40000 ALTER TABLE `RESTAURANT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `SORT_TIME`
--

DROP TABLE IF EXISTS `SORT_TIME`;
/*!50001 DROP VIEW IF EXISTS `SORT_TIME`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `SORT_TIME` AS SELECT 
 1 AS `MovName`,
 1 AS `Day`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `SUBSCRIPTIONS`
--

DROP TABLE IF EXISTS `SUBSCRIPTIONS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SUBSCRIPTIONS` (
  `member_id` int NOT NULL AUTO_INCREMENT,
  `expiration_date` date NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `subscription_status` varchar(50) NOT NULL DEFAULT 'Active',
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUBSCRIPTIONS`
--

LOCK TABLES `SUBSCRIPTIONS` WRITE;
/*!40000 ALTER TABLE `SUBSCRIPTIONS` DISABLE KEYS */;
INSERT INTO `SUBSCRIPTIONS` VALUES (1,'2023-01-01','joe','Expired','email@email.com'),(2,'2023-02-02','billy','Expired','email2@email.com'),(3,'2023-02-03','gerald','Expired','email3@email.com'),(4,'2023-05-04','brad','Active','email4@email.com'),(5,'2023-06-08','Jimmy','Expired','email5@email.com'),(6,'2023-02-04','Johnny','Expired','email6@email.com'),(7,'2023-06-08','Jiiiimmy','Active','email8@email.com'),(8,'2023-06-08','Johan','Active','email8@email.com'),(9,'2023-04-22','Steven','Expired','email9@email.com');
/*!40000 ALTER TABLE `SUBSCRIPTIONS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TICKETS`
--

DROP TABLE IF EXISTS `TICKETS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TICKETS` (
  `DateGiven` datetime NOT NULL,
  `type` char(1) NOT NULL,
  `price` int NOT NULL,
  `Discount` char(0) DEFAULT NULL,
  `IncludeAudio` tinyint(1) DEFAULT NULL,
  `IncomeTicket` int NOT NULL DEFAULT '0',
  `VEmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DateGiven`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TICKETS`
--

LOCK TABLES `TICKETS` WRITE;
/*!40000 ALTER TABLE `TICKETS` DISABLE KEYS */;
INSERT INTO `TICKETS` VALUES ('2023-03-31 03:00:00','G',118,NULL,0,118,'Javad@hotmail.com'),('2023-04-09 01:00:00','G',75,NULL,0,75,'Javad@hotmail.com'),('2023-04-12 02:00:00','T',70,NULL,1,70,'Kylen@gmail.com'),('2023-04-12 12:00:00','G',57,NULL,0,57,'nathen@gmail.com'),('2023-04-23 08:26:21','G',0,NULL,0,0,'sara@gmail.com'),('2023-04-23 08:28:24','G',0,NULL,0,0,'sara@gmail.com'),('2023-04-23 08:28:26','G',0,NULL,0,0,'sofia@gmail.com'),('2023-04-23 08:33:05','G',0,NULL,0,0,'sofia@gmail.com'),('2023-04-23 08:55:42','G',0,NULL,0,0,'Kylen@gmail.com'),('2023-04-23 08:58:34','G',0,NULL,0,0,'phobias17@gmail.com');
/*!40000 ALTER TABLE `TICKETS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TOURS`
--

DROP TABLE IF EXISTS `TOURS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TOURS` (
  `Tour_Name` varchar(100) NOT NULL,
  `Book_Times` time NOT NULL,
  `Book_Dates` date DEFAULT NULL,
  `Location` varchar(100) NOT NULL,
  `isPrivate` tinyint(1) NOT NULL,
  PRIMARY KEY (`Tour_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TOURS`
--

LOCK TABLES `TOURS` WRITE;
/*!40000 ALTER TABLE `TOURS` DISABLE KEYS */;
INSERT INTO `TOURS` VALUES ('Pipilotti Rist: Pixel Forest and Worry Will Vanish ','02:00:00','2023-04-12',' Caroline Wiess Law Building',0);
/*!40000 ALTER TABLE `TOURS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VISITORS`
--

DROP TABLE IF EXISTS `VISITORS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `VISITORS` (
  `Email` char(50) NOT NULL,
  `Age` int NOT NULL,
  `Hours_spent_in_museum` int NOT NULL,
  `Is_member` tinyint(1) NOT NULL,
  `Zip_Code` int NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Payment_Status` tinyint NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VISITORS`
--

LOCK TABLES `VISITORS` WRITE;
/*!40000 ALTER TABLE `VISITORS` DISABLE KEYS */;
INSERT INTO `VISITORS` VALUES ('albert@gmail.com',16,6,0,78391,'12345',0),('havard@outlook.com',21,1,0,77127,'12345',0),('Javad@hotmail.com',17,2,0,77579,'12345',0),('Kylen@gmail.com',45,8,0,77377,'12345',0),('nathan@gmail.com',32,12,0,77027,'12345',0),('phobias17@gmail.com',20,3,0,77479,'test@123',1),('sara@gmail.com',23,7,0,77479,'12345',0),('sofia@gmail.com',22,3,0,77927,'12345',0);
/*!40000 ALTER TABLE `VISITORS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `museum`
--

USE `museum`;

--
-- Final view structure for view `SORT_TIME`
--

/*!50001 DROP VIEW IF EXISTS `SORT_TIME`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `SORT_TIME` AS select `MOVIE_TIMES`.`MovName` AS `MovName`,`MOVIE_TIMES`.`Day` AS `Day` from `MOVIE_TIMES` order by `MOVIE_TIMES`.`Day` */;
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

-- Dump completed on 2023-04-24  2:17:24
