-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: villafratelli
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.2

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
-- Current Database: `villafratelli`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `villafratelli` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `villafratelli`;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `idImages` int(11) NOT NULL AUTO_INCREMENT,
  `dossier` varchar(200) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`idImages`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'images/big/nuit/','IMG_1425.jpg',NULL),(2,'images/big/nuit/','IMG_1422.jpg',NULL),(3,'images/big/nuit/','IMG_1417.jpg',NULL),(4,'images/big/nuit/','IMG_1418.jpg',NULL),(5,'images/big/nuit/','IMG_1423.jpg',NULL),(6,'images/big/nuit/','IMG_1424.jpg',NULL),(7,'images/big/nuit/','IMG_1349.jpg',NULL),(8,'images/big/nuit/','IMG_1415.jpg',NULL),(9,'images/big/nuit/','IMG_1420.jpg',NULL),(10,'images/big/nuit/','IMG_1348.jpg',NULL),(11,'images/big/nuit/','IMG_1421.jpg',NULL),(12,'images/big/nuit/','IMG_1426.jpg',NULL),(13,'images/big/nuit/','IMG_1413.jpg',NULL),(14,'images/big/piscine/','IMG_1065.jpg',NULL),(15,'images/big/piscine/','IMG_1347.jpg',NULL),(16,'images/big/piscine/','IMG_1346.jpg',NULL),(17,'images/big/piscine/','IMG_1175.jpg',NULL),(18,'images/big/piscine/','IMG_1357.jpg',NULL),(19,'images/big/piscine/','IMG_1078.jpg',NULL),(20,'images/big/piscine/','IMG_1167.jpg',NULL),(21,'images/big/piscine/','IMG_1168.jpg',NULL),(22,'images/big/piscine/','IMG_1145.jpg',NULL),(23,'images/big/spa/','IMG_1185.jpg',NULL),(24,'images/big/spa/','IMG_1193.jpg',NULL),(25,'images/big/spa/','IMG_1179.jpg',NULL),(26,'images/big/spa/','IMG_1184.jpg',NULL),(27,'images/big/spa/','IMG_1178.jpg',NULL),(28,'images/big/spa/','IMG_1192.jpg',NULL),(29,'images/big/spa/','IMG_1195.jpg',NULL),(30,'images/big/spa/','IMG_1198.jpg',NULL),(31,'images/big/spa/','IMG_1191.jpg',NULL),(32,'images/big/spa/','IMG_1187.jpg',NULL),(33,'images/big/spa/','IMG_1189.jpg',NULL),(34,'images/big/spa/','IMG_1201.jpg',NULL),(35,'images/big/spa/','IMG_1190.jpg',NULL),(36,'images/big/spa/','IMG_1188.jpg',NULL),(37,'images/big/rooms/','IMG_1493.jpg',NULL),(38,'images/big/rooms/','IMG_1494.jpg',NULL),(39,'images/big/rooms/','IMG_1513.jpg',NULL),(40,'images/big/rooms/','IMG_1172.jpg',NULL),(41,'images/big/rooms/','IMG_1514.jpg',NULL),(42,'images/big/rooms/','IMG_1479.jpg',NULL),(43,'images/big/rooms/','IMG_1521.jpg',NULL),(44,'images/big/rooms/','IMG_1470.jpg',NULL),(45,'images/big/rooms/','IMG_1461.jpg',NULL),(46,'images/big/rooms/','IMG_1468.jpg',NULL),(47,'images/big/rooms/','IMG_1505.jpg',NULL),(48,'images/big/rooms/','IMG_1485.jpg',NULL),(49,'images/big/rooms/','IMG_1454.jpg',NULL),(50,'images/big/rooms/','IMG_1482.jpg',NULL),(51,'images/big/rooms/','IMG_1453.jpg',NULL),(52,'images/big/rooms/','IMG_1476.jpg',NULL),(53,'images/big/rooms/','IMG_1478.jpg',NULL),(54,'images/big/rooms/','IMG_1520.jpg',NULL),(55,'images/big/rooms/','IMG_1512.jpg',NULL),(56,'images/big/rooms/','IMG_1495.jpg',NULL),(57,'images/big/rooms/','IMG_1492.jpg',NULL),(58,'images/big/rooms/','IMG_1452.jpg',NULL),(59,'images/big/rooms/','IMG_1484.jpg',NULL),(60,'images/big/rooms/','IMG_1455.jpg',NULL),(61,'images/big/rooms/','IMG_1504.jpg',NULL),(62,'images/big/rooms/','IMG_1469.jpg',NULL),(63,'images/big/rooms/','IMG_1460.jpg',NULL),(64,'images/big/rooms/','IMG_1467.jpg',NULL),(65,'images/big/rooms/','IMG_1487.jpg',NULL),(66,'images/big/rooms/','IMG_1456.jpg',NULL),(67,'images/big/rooms/','IMG_1451.jpg',NULL),(68,'images/big/rooms/','IMG_1507.jpg',NULL),(69,'images/big/rooms/','IMG_1464.jpg',NULL),(70,'images/big/rooms/','IMG_1472.jpg',NULL),(71,'images/big/rooms/','IMG_1498.jpg',NULL),(72,'images/big/rooms/','IMG_1511.jpg',NULL),(73,'images/big/rooms/','IMG_1518.jpg',NULL),(74,'images/big/rooms/','IMG_1462.jpg',NULL),(75,'images/big/rooms/','IMG_1501.jpg',NULL),(76,'images/big/rooms/','IMG_1488.jpg',NULL),(77,'images/big/rooms/','IMG_1169.jpg',NULL),(78,'images/big/rooms/','IMG_1508.jpg',NULL),(79,'images/big/rooms/','IMG_1486.jpg',NULL),(80,'images/big/rooms/','IMG_1457.jpg',NULL),(81,'images/big/rooms/','IMG_1497.jpg',NULL),(82,'images/big/rooms/','IMG_1490.jpg',NULL),(83,'images/big/rooms/','IMG_1499.jpg',NULL),(84,'images/big/rooms/','IMG_1171.jpg',NULL),(85,'images/big/rooms/','IMG_1510.jpg',NULL),(86,'images/big/rooms/','IMG_1474.jpg',NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-24  1:52:13
