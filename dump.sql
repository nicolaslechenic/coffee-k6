-- MySQL dump 10.13  Distrib 8.0.27, for macos12.0 (x86_64)
--
-- Host: localhost    Database: abclight
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `Edible`
--

DROP TABLE IF EXISTS `Edible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Edible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Edible`
--

LOCK TABLES `Edible` WRITE;
/*!40000 ALTER TABLE `Edible` DISABLE KEYS */;
INSERT INTO `Edible` VALUES (1,'Macchiato',3.2),(2,'Expresso',1.3),(3,'Longo',1.3);
/*!40000 ALTER TABLE `Edible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS `Order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `idWaiter` int(11) NOT NULL,
  `idRestaurantTable` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Order_fk0` (`idWaiter`),
  KEY `Order_fk1` (`idRestaurantTable`),
  CONSTRAINT `Order_fk0` FOREIGN KEY (`idWaiter`) REFERENCES `Waiter` (`id`),
  CONSTRAINT `Order_fk1` FOREIGN KEY (`idRestaurantTable`) REFERENCES `RestaurantTable` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order`
--

LOCK TABLES `Order` WRITE;
/*!40000 ALTER TABLE `Order` DISABLE KEYS */;
/*!40000 ALTER TABLE `Order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrderEdible`
--

DROP TABLE IF EXISTS `OrderEdible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `OrderEdible` (
  `idOrder` int(11) NOT NULL,
  `idEdible` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  KEY `OrderEdible_fk0` (`idOrder`),
  KEY `OrderEdible_fk1` (`idEdible`),
  CONSTRAINT `OrderEdible_fk0` FOREIGN KEY (`idOrder`) REFERENCES `Order` (`id`),
  CONSTRAINT `OrderEdible_fk1` FOREIGN KEY (`idEdible`) REFERENCES `Edible` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderEdible`
--

LOCK TABLES `OrderEdible` WRITE;
/*!40000 ALTER TABLE `OrderEdible` DISABLE KEYS */;
/*!40000 ALTER TABLE `OrderEdible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RestaurantTable`
--

DROP TABLE IF EXISTS `RestaurantTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `RestaurantTable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RestaurantTable`
--

LOCK TABLES `RestaurantTable` WRITE;
/*!40000 ALTER TABLE `RestaurantTable` DISABLE KEYS */;
INSERT INTO `RestaurantTable` VALUES (1),(2),(3),(4);
/*!40000 ALTER TABLE `RestaurantTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Waiter`
--

DROP TABLE IF EXISTS `Waiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Waiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Waiter`
--

LOCK TABLES `Waiter` WRITE;
/*!40000 ALTER TABLE `Waiter` DISABLE KEYS */;
INSERT INTO `Waiter` VALUES (1,'Jeanne'),(2,'Alban'),(3,'Mael');
/*!40000 ALTER TABLE `Waiter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-17  9:12:07
