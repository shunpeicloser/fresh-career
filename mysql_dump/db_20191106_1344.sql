-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: freshcareer
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `mhs`
--

DROP TABLE IF EXISTS `mhs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mhs` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `foto` mediumblob,
  `deskripsi` varchar(45) DEFAULT NULL,
  `saldo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_mhs_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mhs`
--

LOCK TABLES `mhs` WRITE;
/*!40000 ALTER TABLE `mhs` DISABLE KEYS */;
INSERT INTO `mhs` VALUES (1,'Firda Afifa','Keputih gang 3A No. 5','Tulungagung, 4 Juni 1997',NULL,'Seorang mahasiswi.',0),(3,'Nemesio Raitubu','Keputih Gang Makam','Fiji, 29 Februari 1988',NULL,'Hello, I\'m a college student from Fiji.',0);
/*!40000 ALTER TABLE `mhs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `budget` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `project_name` varchar(64) NOT NULL,
  `project_status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`project_id`),
  UNIQUE KEY `project_name_UNIQUE` (`project_name`),
  KEY `fk_project_1_idx` (`user_id`),
  CONSTRAINT `fk_project_1` FOREIGN KEY (`user_id`) REFERENCES `ptk` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,2,3000000,'membuat website dengan spesifikasi berikut:\r\n- bagus\r\n- cepet','Membuat Website Perusahaan',0);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_bidder`
--

DROP TABLE IF EXISTS `project_bidder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_bidder` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `bid_value` int(11) NOT NULL DEFAULT '0',
  `bid_status` tinyint(4) NOT NULL DEFAULT '0',
  `comment` text,
  KEY `fk_project_bidder_1_idx` (`user_id`),
  KEY `fk_project_bidder_2_idx` (`project_id`),
  CONSTRAINT `fk_project_bidder_1` FOREIGN KEY (`user_id`) REFERENCES `mhs` (`user_id`),
  CONSTRAINT `fk_project_bidder_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_bidder`
--

LOCK TABLES `project_bidder` WRITE;
/*!40000 ALTER TABLE `project_bidder` DISABLE KEYS */;
INSERT INTO `project_bidder` VALUES (1,1,3400000,0,'Bisa2'),(3,1,3100000,0,'I think I could do this in 2 days');
/*!40000 ALTER TABLE `project_bidder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ptk`
--

DROP TABLE IF EXISTS `ptk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ptk` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` mediumblob,
  `deskripsi` varchar(45) DEFAULT NULL,
  `saldo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_ptk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ptk`
--

LOCK TABLES `ptk` WRITE;
/*!40000 ALTER TABLE `ptk` DISABLE KEYS */;
INSERT INTO `ptk` VALUES (2,'PT. Rejotangan','Jln. Merbabu, Kauman, Kediri',NULL,'Sebuah perusahaan.',2000);
/*!40000 ALTER TABLE `ptk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` char(32) NOT NULL,
  `role` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'41f8d0e22176e7a831ac4ddfc6a2b7c3','mhs','05111640000000'),(2,'41f8d0e22176e7a831ac4ddfc6a2b7c3','ptk','perusahaan'),(3,'41f8d0e22176e7a831ac4ddfc6a2b7c3','mhs','05111640000001');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-06 13:44:58
