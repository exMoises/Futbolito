-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: futbol
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `equipos_jugador`
--

DROP TABLE IF EXISTS `equipos_jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos_jugador` (
  `id_equipo_jugador` int NOT NULL AUTO_INCREMENT,
  `id_equipo` int DEFAULT NULL,
  `id_jugador` int DEFAULT NULL,
  PRIMARY KEY (`id_equipo_jugador`),
  KEY `id_equipo_idx` (`id_equipo`),
  KEY `id_jugador_idx` (`id_jugador`),
  CONSTRAINT `id_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`),
  CONSTRAINT `id_jugador` FOREIGN KEY (`id_jugador`) REFERENCES `jugador` (`id_jugador`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos_jugador`
--

LOCK TABLES `equipos_jugador` WRITE;
/*!40000 ALTER TABLE `equipos_jugador` DISABLE KEYS */;
INSERT INTO `equipos_jugador` VALUES (2,1,2),(3,2,7),(5,1,9),(6,1,10),(7,1,11),(8,2,12),(9,1,13),(20,1,24),(21,1,25),(22,1,26),(23,1,27),(24,2,28),(25,2,29),(26,1,30),(27,1,31),(28,1,32),(29,1,33),(30,1,34),(31,1,35),(32,1,36),(33,1,37),(34,1,38),(35,2,39),(36,2,40),(37,2,41),(38,1,42),(39,1,43),(40,2,44),(41,2,45),(42,1,46),(43,1,47);
/*!40000 ALTER TABLE `equipos_jugador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-12 14:29:39
