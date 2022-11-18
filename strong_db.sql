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
INSERT INTO `tbl_access` VALUES (1,'Super Admin','2022-10-07 21:21:01','2022-10-07 21:21:01',0),(2,'Branch Manager','2022-10-07 21:21:01','2022-10-07 21:21:01',0),(3,'Trainer','2022-10-07 21:21:01','2022-10-07 21:21:01',0),(4,'Staff','2022-10-07 21:21:01','2022-10-07 21:21:01',0),(5,'Customer','2022-10-07 21:28:56','2022-10-07 21:28:56',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_branch`
--

LOCK TABLES `tbl_branch` WRITE;
/*!40000 ALTER TABLE `tbl_branch` DISABLE KEYS */;
INSERT INTO `tbl_branch` VALUES (1,'Branch 1','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-07 21:31:07','2022-10-07 21:31:07',0,'bagong filed'),(2,'branch 2','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-07 21:31:07','2022-10-07 21:31:07',0,NULL),(3,'branch 3','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-07 21:31:07','2022-10-07 21:31:07',1,NULL),(4,'branch 4','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-31 21:57:43','2022-10-31 21:57:43',1,NULL),(5,'branch 5','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-31 22:23:57','2022-10-31 22:23:57',1,NULL);
/*!40000 ALTER TABLE `tbl_branch` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_client_plan`
--

LOCK TABLES `tbl_client_plan` WRITE;
/*!40000 ALTER TABLE `tbl_client_plan` DISABLE KEYS */;
INSERT INTO `tbl_client_plan` VALUES (1,5,1,3,'2022-01-01','2022-11-03 19:05:24','2022-11-03 19:05:24',0);
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
  `name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_equipment`
--

LOCK TABLES `tbl_equipment` WRITE;
/*!40000 ALTER TABLE `tbl_equipment` DISABLE KEYS */;
INSERT INTO `tbl_equipment` VALUES (1,'Treadmill',4,'tests','2022-10-24 04:20:22','2022-10-24 04:20:22',0),(2,'Seated Dip Machine',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0),(3,'Chest Press Machine',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0),(4,'Bench Press',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0),(5,'Incline Bench Press',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0),(6,'Decline Bench Press',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0),(7,'Preacher Curl Bench',1,NULL,'2022-10-24 04:20:22','2022-10-24 04:20:22',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_plan`
--

LOCK TABLES `tbl_plan` WRITE;
/*!40000 ALTER TABLE `tbl_plan` DISABLE KEYS */;
INSERT INTO `tbl_plan` VALUES (1,'Platinum','1500','150','Use of weights and body building machines',0,'<li><i class=\"fa-solid fa-check\"></i> Use of weights and<br> body building machines</li>'),(2,'Gold','700','100','Use of weights and body building machines ',0,'<li><i class=\"fa-solid fa-check\"></i>use of weights <br>and body building machines</li>'),(3,'Silver','500','70','Use of weights and body building onlysss',0,'<li><i class=\"fa-solid fa-check\"></i> Use of weights <br>and body building <br> only</li>');
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
  `date` varchar(45) DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_progress`
--

LOCK TABLES `tbl_progress` WRITE;
/*!40000 ALTER TABLE `tbl_progress` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_services`
--

LOCK TABLES `tbl_services` WRITE;
/*!40000 ALTER TABLE `tbl_services` DISABLE KEYS */;
INSERT INTO `tbl_services` VALUES (1,'Zumba','zumba.jpg','Zumba Is A Form Of Fitness Class In Which You Burn Off Calories By Dancing To Different Kinds Of Lively Tunes, Often Latin-American Inspired Such As Salsa, Merengue And Samba, But Also Other Types Of Modern Music Like Hip Hop And Bollywood (Music From The Indian Film Industry).a','2022-11-07 18:02:52','2022-11-07 18:02:52',0),(2,'Taekwondo','taekwondo.jpg','Taekwondo Comes From Three Korean Words, Tae, \"Kick,\" Kwon, \"Fist Or Punch,\" And Do, \"The Art Of.\" That\'s A Pretty Good Description Of This Dynamic Martial Art, Which Involves Acrobatic Kicks And Graceful Punches. Like All Martial Arts, Taekwondo Isn\'t Just Combat — It\'s Also An Art And A Discipline.','2022-11-07 18:02:52','2022-11-07 18:02:52',0),(3,'Muai Thai','muaythai.jpg','Muay Thai Is A Stand-Up Striking Sport, With Two Competitors In The Ring Throwing Punches, Elbows, Knees And Kicks At Each Other. Clinching, Sweeps And Throws Are Also Allowed.','2022-11-07 18:02:52','2022-11-07 18:02:52',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_status`
--

LOCK TABLES `tbl_status` WRITE;
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` VALUES (1,'FAT','2022-10-07 21:54:06','2022-10-07 21:54:06',0);
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;
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
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supplements`
--

LOCK TABLES `tbl_supplements` WRITE;
/*!40000 ALTER TABLE `tbl_supplements` DISABLE KEYS */;
INSERT INTO `tbl_supplements` VALUES (1,'img1.webp','Prothin Whey Ripped',1,500,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(2,'img2.webp','Weider Amino Max 8000',NULL,299,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(3,'img3.webp','Creatine Capsules',NULL,164,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(4,'img4.webp','MuscleTech Muscle Builder',NULL,1762,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, distinctio sint ratione ipsam cumque provident obcaecati praesentium similique.','2022-10-24 04:33:53','2022-10-24 04:33:53',0),(5,'default.png','test',123,23,'test','2022-11-01 01:24:09','2022-11-01 01:24:09',1),(6,'default.png','',0,0,'test','2022-11-07 18:45:12','2022-11-07 18:45:12',1),(7,'default.png','',0,0,'test','2022-11-07 18:45:16','2022-11-07 18:45:16',1),(8,'default.png','',0,0,'test','2022-11-07 18:45:21','2022-11-07 18:45:21',1),(9,'default.png','',0,0,'test','2022-11-07 18:45:24','2022-11-07 18:45:24',1);
/*!40000 ALTER TABLE `tbl_supplements` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','admin@gmail.com','123',1,1,NULL,NULL,1,'2022-10-07 21:25:06','2022-10-07 21:25:06',0,'admin'),(2,'manager','manager@gmail.com','123',1,2,NULL,NULL,1,'2022-10-07 21:25:06','2022-10-07 21:25:06',0,'admin'),(3,'trainer','trainer@gmail.com','123',1,3,NULL,NULL,1,'2022-10-07 21:25:06','2022-10-07 21:25:06',0,'admin'),(4,'staff','staff@gmail.com','123',1,4,NULL,NULL,0,'2022-10-07 21:25:06','2022-10-07 21:25:06',0,'customer'),(5,'customer','customer@gmail.com','123',1,5,1,'2022-01-01',1,'2022-10-07 21:29:59','2022-10-07 21:29:59',0,'customer'),(8,'test','test@gmail.com','test',2,3,NULL,NULL,0,'2022-11-01 02:53:59','2022-11-01 02:53:59',0,'customer'),(9,'test123','test123@gmail.com','123',1,2,NULL,NULL,0,'2022-11-01 03:04:25','2022-11-01 03:04:25',0,NULL),(10,'jimenez31396','test23@gmail.com','123',1,2,NULL,NULL,0,'2022-11-01 03:08:01','2022-11-01 03:08:01',0,'customer'),(11,'customer2','c@gmail.com','123123',2,5,0,NULL,1,'2022-11-03 16:57:10','2022-11-03 16:57:10',0,NULL),(12,'test','test@gmail.com','test',1,5,0,NULL,0,'2022-11-18 13:35:06','2022-11-18 13:35:06',0,NULL),(13,'test','test@gmail.com','test',1,5,0,NULL,0,'2022-11-18 13:35:06','2022-11-18 13:35:06',0,NULL),(14,'resident','test@gmail.com','123',1,5,0,NULL,0,'2022-11-18 13:38:29','2022-11-18 13:38:29',0,NULL),(15,'resident','test@gmail.com','123',1,5,0,NULL,0,'2022-11-18 13:38:29','2022-11-18 13:38:29',0,NULL),(16,'resident','test@gmail.com','123',1,5,0,NULL,0,'2022-11-18 13:39:06','2022-11-18 13:39:06',0,NULL),(17,'resident','test@gmail.com','123',1,5,0,NULL,0,'2022-11-18 13:39:06','2022-11-18 13:39:06',0,NULL),(18,'resident','test@gmail.com','123',1,5,0,NULL,0,'2022-11-18 13:39:27','2022-11-18 13:39:27',0,NULL),(19,'resident','test@gmail.com','123',1,5,0,NULL,0,'2022-11-18 13:39:27','2022-11-18 13:39:27',0,NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_info`
--

LOCK TABLES `tbl_user_info` WRITE;
/*!40000 ALTER TABLE `tbl_user_info` DISABLE KEYS */;
INSERT INTO `tbl_user_info` VALUES (1,'admin','admin','admin',1,'09000000000','default.jpg','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'admin'),(2,'manager','manager','manager',1,'09000000000','default.jpg','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'manager'),(3,'trainer','trainer','trainer',1,'09000000000','default.jpg','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'trainer'),(4,'staff','staff','staff',1,'09000000000','default.jpg','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'staff'),(5,'customer','customer','customer',1,'09000000000','default.jpg','2022-10-07 21:39:28','2022-10-07 21:39:28',0,'customer'),(8,'test','test','test',1,'09999999999','default.jpg','2022-11-01 02:53:59','2022-11-01 02:53:59',0,'test'),(9,'test','test','test',2,'09999999999','default.jpg','2022-11-01 03:04:25','2022-11-01 03:04:25',0,'test'),(10,'test','test','test',1,'09217635295','default.jpg','2022-11-01 03:08:01','2022-11-01 03:08:01',0,'test'),(11,'c','c','c',1,'09999999999','default.jpg','2022-11-03 16:57:10','2022-11-03 16:57:10',0,'c'),(12,'test','test','test',1,'09217635295','default.jpg','2022-11-18 13:35:06','2022-11-18 13:35:06',0,'test'),(13,'test','test','test',1,'09217635295','default.jpg','2022-11-18 13:35:06','2022-11-18 13:35:06',0,'test'),(14,'test','test','test',1,'09000000000','default.jpg','2022-11-18 13:38:29','2022-11-18 13:38:29',0,'test'),(15,'test','test','test',1,'09000000000','default.jpg','2022-11-18 13:38:29','2022-11-18 13:38:29',0,'test'),(16,'test','test','test',1,'09000000000','default.jpg','2022-11-18 13:39:06','2022-11-18 13:39:06',0,'test'),(17,'test','test','test',1,'09000000000','default.jpg','2022-11-18 13:39:06','2022-11-18 13:39:06',0,'test'),(18,'test','test','test',1,'09000000000','default.jpg','2022-11-18 13:39:27','2022-11-18 13:39:27',0,'test'),(19,'test','test','test',1,'09000000000','default.jpg','2022-11-18 13:39:27','2022-11-18 13:39:27',0,'test');
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
  `name` varchar(255) NOT NULL,
  `reps` int(11) DEFAULT NULL,
  `sets` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT 'None',
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workout`
--

LOCK TABLES `tbl_workout` WRITE;
/*!40000 ALTER TABLE `tbl_workout` DISABLE KEYS */;
INSERT INTO `tbl_workout` VALUES (1,'Barbel Bench Press',12,3,'None','2022-10-24 04:46:09','2022-10-24 04:46:09',0),(2,'Barbel Inclined Bench Press',12,3,'None','2022-10-24 04:46:09','2022-10-24 04:46:09',0),(3,'Dumbell Flyes',12,3,'None','2022-10-24 04:46:09','2022-10-24 04:46:09',0),(4,'Chest Dips',12,4,'None','2022-10-24 04:46:09','2022-10-24 04:46:09',0),(5,'Chest Dips',12,3,'None','2022-10-24 04:46:48','2022-10-24 04:46:48',0),(6,'Cardio',2,1,'30mins','2022-10-24 04:49:42','2022-10-24 04:49:42',0);
/*!40000 ALTER TABLE `tbl_workout` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workout_plan`
--

LOCK TABLES `tbl_workout_plan` WRITE;
/*!40000 ALTER TABLE `tbl_workout_plan` DISABLE KEYS */;
INSERT INTO `tbl_workout_plan` VALUES (59,1,3,'2022-11-14 23:57:48','2022-11-14 23:57:48',0),(60,1,2,'2022-11-14 23:57:48','2022-11-14 23:57:48',0),(61,1,6,'2022-11-14 23:57:48','2022-11-14 23:57:48',0);
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

-- Dump completed on 2022-11-18 15:18:35
