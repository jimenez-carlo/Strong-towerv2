-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: strong_db
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `tbl_access`
--

DROP TABLE IF EXISTS `tbl_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_access`
--

LOCK TABLES `tbl_access` WRITE;
/*!40000 ALTER TABLE `tbl_access` DISABLE KEYS */;
INSERT INTO `tbl_access` VALUES (1,'Super Admin','2022-10-07 21:21:01','2022-10-07 21:21:01',0),(2,'Secretary','2022-10-07 21:21:01','2022-10-07 21:21:01',0),(3,'Trainer','2022-10-07 21:21:01','2022-10-07 21:21:01',0),(4,'Customer','2022-10-07 21:28:56','2022-10-07 21:28:56',0);
/*!40000 ALTER TABLE `tbl_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_activity`
--

DROP TABLE IF EXISTS `tbl_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `customer_id` int(11) DEFAULT NULL,
  `workout_id` varchar(45) DEFAULT NULL,
  `reps` int(11) DEFAULT NULL,
  `sets` int(11) DEFAULT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `km` varchar(45) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `workout_target_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_activity`
--

LOCK TABLES `tbl_activity` WRITE;
/*!40000 ALTER TABLE `tbl_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_branch`
--

DROP TABLE IF EXISTS `tbl_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `sub_title` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_branch`
--

LOCK TABLES `tbl_branch` WRITE;
/*!40000 ALTER TABLE `tbl_branch` DISABLE KEYS */;
INSERT INTO `tbl_branch` VALUES (1,'Branch 1 - Urdaneta city','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.z','2022-10-07 21:31:07','2022-10-07 21:31:07',0,'bagong filed'),(2,'Branch 2 - bayamabang','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-07 21:31:07','2022-10-07 21:31:07',0,NULL);
/*!40000 ALTER TABLE `tbl_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (1,'ARMS'),(2,'CHEST'),(3,'LEGS'),(4,'BACK');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_client_plan`
--

DROP TABLE IF EXISTS `tbl_client_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_client_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_client_plan`
--

LOCK TABLES `tbl_client_plan` WRITE;
/*!40000 ALTER TABLE `tbl_client_plan` DISABLE KEYS */;
INSERT INTO `tbl_client_plan` VALUES (1,4,1,3,'2024-01-01','2022-11-03 19:05:24','2022-11-03 19:05:24',0),(2,21,1,3,'2023-01-01','2022-12-02 15:05:10','2022-12-02 15:05:10',0),(3,4,1,3,'2024-01-01','2022-12-07 07:25:56','2022-12-07 07:25:56',0),(4,6,1,0,'2023-01-01','2023-01-12 12:51:27','2023-01-12 12:51:27',0),(5,5,1,3,'2023-01-01','2023-01-12 12:52:34','2023-01-12 12:52:34',0),(6,5,1,3,'2024-01-01','2023-01-12 12:54:43','2023-01-12 12:54:43',0),(7,9,1,3,'2024-02-01','2023-01-13 18:06:43','2023-01-13 18:06:43',0),(8,11,1,3,'2024-02-02','2023-01-13 18:25:46','2023-01-13 18:25:46',0),(9,6,1,0,'2023-01-01','2023-01-20 15:57:06','2023-01-20 15:57:06',0),(10,8,1,0,'2025-01-01','2023-01-26 00:53:49','2023-01-26 00:53:49',0);
/*!40000 ALTER TABLE `tbl_client_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_equipment`
--

DROP TABLE IF EXISTS `tbl_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `enabled` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_equipment`
--

LOCK TABLES `tbl_equipment` WRITE;
/*!40000 ALTER TABLE `tbl_equipment` DISABLE KEYS */;
INSERT INTO `tbl_equipment` VALUES (1,'image_20221201220424.jpeg','Treadmill',4,'test','2022-10-24 04:20:22','2022-10-24 04:20:22',0,1),(2,'default.png','Seated Dip Machine',1,'test','2022-10-24 04:20:22','2022-10-24 04:20:22',0,1),(3,'default.png','Chest Press Machine',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0,1),(4,'default.png','Bench Press',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0,1),(5,'default.png','Incline Bench Press',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0,1),(6,'default.png','Decline Bench Press',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0,1),(7,'default.png','Preacher Curl Bench',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0,1),(8,'default.png','test',NULL,'test','2022-12-02 05:17:04','2022-12-02 05:17:04',1,1);
/*!40000 ALTER TABLE `tbl_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gender`
--

DROP TABLE IF EXISTS `tbl_gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gender`
--

LOCK TABLES `tbl_gender` WRITE;
/*!40000 ALTER TABLE `tbl_gender` DISABLE KEYS */;
INSERT INTO `tbl_gender` VALUES (1,'Male','2022-10-07 21:37:54','2022-10-07 21:37:54',0),(2,'Female','2022-10-07 21:37:54','2022-10-07 21:37:54',0);
/*!40000 ALTER TABLE `tbl_gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_invoice`
--

DROP TABLE IF EXISTS `tbl_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(255) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_invoice`
--

LOCK TABLES `tbl_invoice` WRITE;
/*!40000 ALTER TABLE `tbl_invoice` DISABLE KEYS */;
INSERT INTO `tbl_invoice` VALUES (2,'250123043243',1,4,NULL,'2023-01-25 11:32:43'),(3,'260123041324',1,4,NULL,'2023-01-26 11:13:24');
/*!40000 ALTER TABLE `tbl_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_invoice_history`
--

DROP TABLE IF EXISTS `tbl_invoice_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_invoice_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_invoice_history`
--

LOCK TABLES `tbl_invoice_history` WRITE;
/*!40000 ALTER TABLE `tbl_invoice_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_invoice_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_plan`
--

DROP TABLE IF EXISTS `tbl_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `per_month` varchar(45) DEFAULT NULL,
  `per_session` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `backup` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_plan`
--

LOCK TABLES `tbl_plan` WRITE;
/*!40000 ALTER TABLE `tbl_plan` DISABLE KEYS */;
INSERT INTO `tbl_plan` VALUES (1,'Platinum','1500','150','All weights, bike, elleptical  and treadmills',0,'<li><i class=\"fa-solid fa-check\"></i> Use of weights and<br> body building machines</li>'),(2,'Gold','700','100','All weights, bikes and elelliptical',0,'<li><i class=\"fa-solid fa-check\"></i>use of weights <br>and body building machines</li>'),(3,'Silver','500','70','All weights and bikes',0,'<li><i class=\"fa-solid fa-check\"></i> Use of weights <br>and body building <br> only</li>');
/*!40000 ALTER TABLE `tbl_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_progress`
--

DROP TABLE IF EXISTS `tbl_progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `workout_id` int(11) DEFAULT NULL,
  `reps` varchar(45) DEFAULT NULL,
  `sets` varchar(45) DEFAULT NULL,
  `duration` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_progress`
--

LOCK TABLES `tbl_progress` WRITE;
/*!40000 ALTER TABLE `tbl_progress` DISABLE KEYS */;
INSERT INTO `tbl_progress` VALUES (1,4,3,4,'0','0',NULL,'2022-12-18'),(2,4,3,2,'0','0',NULL,'2022-12-18'),(3,4,3,1,'0','0',NULL,'2022-12-18'),(4,4,3,6,'0','0',NULL,'2022-12-18'),(192,4,3,6,'1','1',NULL,'2022-12-19'),(193,4,3,2,'1','2',NULL,'2022-12-19'),(217,4,3,4,'2','2',NULL,'2023-01-12'),(218,4,3,2,'1','1',NULL,'2023-01-12'),(219,4,3,1,'1','1',NULL,'2023-01-12'),(220,4,3,6,'0','0',NULL,'2023-01-12'),(221,4,1,3,'0','0',NULL,'2023-01-13'),(222,4,1,2,'0','0',NULL,'2023-01-13'),(223,4,1,6,'0','0',NULL,'2023-01-13'),(224,4,1,1,'0','0',NULL,'2023-01-13'),(225,4,1,3,'0','0',NULL,'2023-01-13'),(226,4,1,5,'0','0',NULL,'2023-01-13'),(227,4,1,4,'0','0',NULL,'2023-01-13'),(228,11,8,2,'0','0',NULL,'2023-01-13'),(229,11,8,3,'0','0',NULL,'2023-01-13'),(230,11,8,3,'0','0',NULL,'2023-01-13'),(231,4,1,3,'0','0',NULL,'2023-01-23'),(232,4,1,2,'0','0',NULL,'2023-01-23'),(233,4,1,6,'0','0',NULL,'2023-01-23'),(234,4,1,1,'0','0',NULL,'2023-01-23'),(235,4,1,3,'0','0',NULL,'2023-01-23'),(236,4,1,5,'0','0',NULL,'2023-01-23'),(237,4,1,4,'0','0',NULL,'2023-01-23'),(238,4,1,3,'0','0',NULL,'2023-01-25'),(239,4,1,2,'0','0',NULL,'2023-01-25'),(240,4,1,6,'0','0',NULL,'2023-01-25'),(241,4,1,1,'0','0',NULL,'2023-01-25'),(242,4,1,3,'0','0',NULL,'2023-01-25'),(243,4,1,5,'0','0',NULL,'2023-01-25'),(244,4,1,4,'0','0',NULL,'2023-01-25'),(250,11,8,3,'0','0',NULL,'2023-01-25');
/*!40000 ALTER TABLE `tbl_progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_services`
--

DROP TABLE IF EXISTS `tbl_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'default.png',
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_services`
--

LOCK TABLES `tbl_services` WRITE;
/*!40000 ALTER TABLE `tbl_services` DISABLE KEYS */;
INSERT INTO `tbl_services` VALUES (1,'Zumba','zumba.jpg','Zumba Is A Form Of Fitness Class In Which You Burn Off Calories By Dancing To Different Kinds Of Lively Tunes, Often Latin-American Inspired Such As Salsa, Merengue And Samba, But Also Other Types Of Modern Music Like Hip Hop And Bollywood (Music From The Indian Film Industry).a','2022-11-07 18:02:52','2022-11-07 18:02:52',0),(2,'Taekwondo','taekwondo.jpg','Taekwondo Comes From Three Korean Words, Tae, \"Kick,\" Kwon, \"Fist Or Punch,\" And Do, \"The Art Of.\" That\'s A Pretty Good Description Of This Dynamic Martial Art, Which Involves Acrobatic Kicks And Graceful Punches. Like All Martial Arts, Taekwondo Isn\'t Just Combat — It\'s Also An Art And A Discipline.','2022-11-07 18:02:52','2022-11-07 18:02:52',0),(3,'Muai Thai','muaythai.jpg','Muay Thai Is A Stand-Up Striking Sport, With Two Competitors In The Ring Throwing Punches, Elbows, Knees And Kicks At Each Other. Clinching, Sweeps And Throws Are Also Allowed.','2022-11-07 18:02:52','2022-11-07 18:02:52',0),(9,'test','image_20221123180630.jpeg','test','2022-11-24 01:06:30','2022-11-24 01:06:30',1),(10,'test','image_20221123180731.jpeg','test','2022-11-24 01:07:31','2022-11-24 01:07:31',1),(11,'aaaaaaa','image_20221123181704.jpeg','aaaa','2022-11-24 01:08:14','2022-11-24 01:08:14',1);
/*!40000 ALTER TABLE `tbl_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status`
--

LOCK TABLES `tbl_status` WRITE;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` VALUES (1,'DRAFT','2022-10-07 21:54:06','2022-10-07 21:54:06',0),(2,'PENDING','2023-01-25 10:31:59','2023-01-25 10:31:59',0),(3,'APPROVED','2023-01-25 10:31:59','2023-01-25 10:31:59',0);
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplement_inventory`
--

DROP TABLE IF EXISTS `tbl_supplement_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_supplement_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplement_id` int(11) DEFAULT NULL,
  `original_qty` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplement_inventory`
--

LOCK TABLES `tbl_supplement_inventory` WRITE;
/*!40000 ALTER TABLE `tbl_supplement_inventory` DISABLE KEYS */;
INSERT INTO `tbl_supplement_inventory` VALUES (1,3,50,55,2,'2023-01-26 01:23:45'),(2,3,55,60,2,'2023-01-26 01:37:24'),(3,2,50,5,2,'2023-01-26 01:38:02'),(4,10,50,2,2,'2023-01-26 01:38:04'),(5,3,60,5,2,'2023-01-26 11:16:01'),(6,2,55,4,2,'2023-01-26 11:16:25');
/*!40000 ALTER TABLE `tbl_supplement_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supplements`
--

DROP TABLE IF EXISTS `tbl_supplements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_supplements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(225) DEFAULT 'default.png',
  `name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplements`
--

LOCK TABLES `tbl_supplements` WRITE;
/*!40000 ALTER TABLE `tbl_supplements` DISABLE KEYS */;
INSERT INTO `tbl_supplements` VALUES (1,'img1.webp','Prothin Whey Ripped',50,500,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(2,'img2.webp','Weider Amino Max 8000',59,299,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(3,'img3.webp','Creatine Capsules',65,164,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(4,'img4.webp','MuscleTech Muscle Builder',50,1762,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(5,'default.png','test',50,23,'test','2022-11-01 01:24:09','2022-11-01 01:24:09',1),(6,'default.png','',50,0,'test','2022-11-07 18:45:12','2022-11-07 18:45:12',1),(7,'default.png','',50,0,'test','2022-11-07 18:45:16','2022-11-07 18:45:16',1),(8,'default.png','',50,0,'test','2022-11-07 18:45:21','2022-11-07 18:45:21',1),(9,'default.png','',50,0,'test','2022-11-07 18:45:24','2022-11-07 18:45:24',1),(10,'image_20221123183046.jpeg','test',52,323,'test','2022-11-24 01:22:23','2022-11-24 01:22:23',0);
/*!40000 ALTER TABLE `tbl_supplements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaction_items`
--

DROP TABLE IF EXISTS `tbl_transaction_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaction_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `supplement_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaction_items`
--

LOCK TABLES `tbl_transaction_items` WRITE;
/*!40000 ALTER TABLE `tbl_transaction_items` DISABLE KEYS */;
INSERT INTO `tbl_transaction_items` VALUES (2,4,2,2,1,299),(4,4,2,1,13,6500),(5,4,3,1,15,7500),(6,4,3,2,12,3588);
/*!40000 ALTER TABLE `tbl_transaction_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `access_id` int(11) DEFAULT NULL,
  `client_plan_id` int(11) DEFAULT 0,
  `plan_expiration_date` date DEFAULT NULL,
  `verified` tinyint(4) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `access` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','admin@gmail.com','123',1,1,NULL,NULL,1,'2022-10-07 21:25:06','2022-10-07 21:25:06',0,'admin'),(2,'manager','manager@gmail.com','123',1,2,NULL,NULL,1,'2022-10-07 21:25:06','2022-10-07 21:25:06',0,'admin'),(3,'trainer','trainer@gmail.com','123',1,3,NULL,NULL,1,'2022-10-07 21:25:06','2022-10-07 21:25:06',0,'admin'),(4,'customer','customer@gmail.com','123',1,4,3,'2024-01-01',1,'2022-10-07 21:29:59','2022-10-07 21:29:59',0,'customer'),(5,'asdasd','admin23@gmail.com23','23232',1,4,5,'2023-01-01',0,'2023-01-12 11:46:36','2023-01-12 11:46:36',0,NULL),(6,'asdasd2','admin23@gmail.com232','23232',1,4,9,'2023-01-01',0,'2023-01-12 11:46:53','2023-01-12 11:46:53',0,NULL),(7,'asdasd22','admin232@gmail.com232','23232',1,4,0,NULL,0,'2023-01-12 11:48:35','2023-01-12 11:48:35',0,NULL),(8,'test23','tests23@gmail.com','23',1,4,1,'2025-01-01',0,'2023-01-12 12:26:35','2023-01-12 12:26:35',0,NULL),(9,'jesslyn','jesslyn@gmail.com','123',1,4,1,'2024-02-01',0,'2023-01-13 17:44:56','2023-01-13 17:44:56',0,NULL),(11,'johnjohn','johnjohn@gmail.com','123',1,4,8,'2024-02-02',1,'2023-01-13 18:22:15','2023-01-13 18:22:15',0,NULL),(12,'adminaadssadas','user3@gmail.com2323','123123',0,4,0,NULL,0,'2023-01-20 15:57:35','2023-01-20 15:57:35',0,NULL);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_info`
--

DROP TABLE IF EXISTS `tbl_user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `picture` varchar(255) DEFAULT 'default.jpg',
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `address` varchar(45) DEFAULT NULL,
  `medical_certificate` varchar(225) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_info`
--

LOCK TABLES `tbl_user_info` WRITE;
/*!40000 ALTER TABLE `tbl_user_info` DISABLE KEYS */;
INSERT INTO `tbl_user_info` VALUES (1,'admin','admin','admin',1,'09000000000','default.png','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'admin','default.jpg'),(2,'manager','manager','manager',1,'09000000000','default.png','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'manager','default.jpg'),(3,'trainer','trainer','trainer',1,'09000000000','default.png','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'trainer','default.jpg'),(4,'customer','customer','customer',1,'09000000000','default.png','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'customer','default.jpg'),(5,'asdsad','aasd','aasd',1,'323232232232','default.jpg','2023-01-12 11:46:36','2023-01-12 11:46:36',0,'a','default.jpg'),(6,'asdsad','aasd','aasd',1,'323232232232','image_20230112044653jfif','2023-01-12 11:46:53','2023-01-12 11:46:53',0,'a','image_20230112044653jfif'),(7,'asdsad','aasd','aasd',1,'323232232232','image_20230112044835jfif','2023-01-12 11:48:35','2023-01-12 11:48:35',0,'a','image_20230112044835jfif'),(8,'asdas','asdas','asd',1,'09123456789','default.png','2023-01-12 12:26:35','2023-01-12 12:26:35',0,'asd','default.jpg'),(9,'jesslyn','m','delacruz',2,'09123456665','image_20230113104456.jpg','2023-01-13 17:44:56','2023-01-13 17:44:56',0,'basista pangasinan',''),(11,'johnjohn','r','teria',1,'09502830740','image_20230113112215.jpg','2023-01-13 18:22:15','2023-01-13 18:22:15',0,'bayambang','default.jpg'),(12,'customer 3','asdas','customer 3',1,'09000000000','default.png','2023-01-20 15:57:35','2023-01-20 15:57:35',0,'asd','default.jpg');
/*!40000 ALTER TABLE `tbl_user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workout`
--

DROP TABLE IF EXISTS `tbl_workout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `reps` int(11) DEFAULT NULL,
  `sets` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT 'None',
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workout`
--

LOCK TABLES `tbl_workout` WRITE;
/*!40000 ALTER TABLE `tbl_workout` DISABLE KEYS */;
INSERT INTO `tbl_workout` VALUES (1,2,'Barbel Bench Press',12,3,'None',NULL,'2022-10-24 04:46:09','2022-10-24 04:46:09',0),(2,2,'Barbel Inclined Bench Press',12,3,'None',NULL,'2022-10-24 04:46:09','2022-10-24 04:46:09',0),(3,2,'Dumbell Flyes',12,3,'None',NULL,'2022-10-24 04:46:09','2022-10-24 04:46:09',0),(4,2,'Chest Dips',12,4,'None',NULL,'2022-10-24 04:46:09','2022-10-24 04:46:09',0),(5,2,'Chest Dips',12,3,'None',NULL,'2022-10-24 04:46:48','2022-10-24 04:46:48',0),(6,3,'Cardio',2,1,'30mins','test','2022-10-24 04:49:42','2022-10-24 04:49:42',0),(7,1,'test',1,1,'1','test','2022-12-02 05:26:21','2022-12-02 05:26:21',1);
/*!40000 ALTER TABLE `tbl_workout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workout_day`
--

DROP TABLE IF EXISTS `tbl_workout_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workout_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workout_day`
--

LOCK TABLES `tbl_workout_day` WRITE;
/*!40000 ALTER TABLE `tbl_workout_day` DISABLE KEYS */;
INSERT INTO `tbl_workout_day` VALUES (1,'monday'),(2,'tuesday'),(3,'wednesday'),(4,'thursday'),(5,'friday'),(6,'saturday'),(7,'sunday');
/*!40000 ALTER TABLE `tbl_workout_day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workout_plan`
--

DROP TABLE IF EXISTS `tbl_workout_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workout_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_plan_id` int(11) DEFAULT NULL,
  `workout_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  `day_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workout_plan`
--

LOCK TABLES `tbl_workout_plan` WRITE;
/*!40000 ALTER TABLE `tbl_workout_plan` DISABLE KEYS */;
INSERT INTO `tbl_workout_plan` VALUES (91,2,1,'2022-12-07 15:04:36','2022-12-07 15:04:36',0,NULL),(92,2,1,'2022-12-07 15:04:36','2022-12-07 15:04:36',0,NULL),(93,2,1,'2022-12-07 15:04:36','2022-12-07 15:04:36',0,NULL),(94,2,1,'2022-12-07 15:04:36','2022-12-07 15:04:36',0,NULL),(99,3,4,'2022-12-18 19:44:54','2022-12-18 19:44:54',0,NULL),(100,3,2,'2022-12-18 19:44:54','2022-12-18 19:44:54',0,NULL),(101,3,1,'2022-12-18 19:44:54','2022-12-18 19:44:54',0,NULL),(102,3,6,'2022-12-18 19:44:54','2022-12-18 19:44:54',0,NULL),(124,1,3,'2023-01-12 12:51:12','2023-01-12 12:51:12',0,NULL),(125,1,2,'2023-01-12 12:51:12','2023-01-12 12:51:12',0,NULL),(126,1,6,'2023-01-12 12:51:12','2023-01-12 12:51:12',0,NULL),(127,1,1,'2023-01-12 12:51:12','2023-01-12 12:51:12',0,NULL),(128,1,3,'2023-01-12 12:51:12','2023-01-12 12:51:12',0,NULL),(129,1,5,'2023-01-12 12:51:12','2023-01-12 12:51:12',0,NULL),(130,1,4,'2023-01-12 12:51:12','2023-01-12 12:51:12',0,NULL),(134,4,1,'2023-01-12 12:51:31','2023-01-12 12:51:31',0,NULL),(135,4,3,'2023-01-12 12:51:31','2023-01-12 12:51:31',0,NULL),(136,4,3,'2023-01-12 12:51:31','2023-01-12 12:51:31',0,NULL),(140,6,1,'2023-01-12 12:54:47','2023-01-12 12:54:47',0,NULL),(141,7,2,'2023-01-13 18:06:43','2023-01-13 18:06:43',0,NULL),(142,7,4,'2023-01-13 18:06:43','2023-01-13 18:06:43',0,NULL),(143,7,5,'2023-01-13 18:06:43','2023-01-13 18:06:43',0,NULL),(150,9,1,'2023-01-20 15:57:06','2023-01-20 15:57:06',0,NULL),(151,5,1,'2023-01-25 11:48:54','2023-01-25 11:48:54',0,1),(158,8,2,'2023-01-25 11:51:43','2023-01-25 11:51:43',0,1),(159,8,6,'2023-01-25 11:51:43','2023-01-25 11:51:43',0,2),(160,8,3,'2023-01-25 11:51:43','2023-01-25 11:51:43',0,3);
/*!40000 ALTER TABLE `tbl_workout_plan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-26 11:26:17
