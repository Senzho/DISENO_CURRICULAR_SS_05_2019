-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: siu
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `numeroPersonal` varchar(20) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`numeroPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES ('zS15011641','Juan Manuel López García','jumaloga@uv.mx','Director del Área Académica','Xalapa'),('zS1782736','Diana Cano Rivera','dicari@uv.mx','Profesor de la FICQ','Xalpa'),('zS19473827','Miguel Zapata Mujía','mizamu@uv.mx','Jefe del Departamento de Desarrollo Curricular','Xalapa'),('zS27388293','Daniela Mejía Durán','damedu@uv.mx','Directora de la Facultad de Psicología','Xalapa');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programaeducativo`
--

DROP TABLE IF EXISTS `programaeducativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programaeducativo` (
  `nrc` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `areaAcademica` varchar(100) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  `sistema` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nrc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programaeducativo`
--

LOCK TABLES `programaeducativo` WRITE;
/*!40000 ALTER TABLE `programaeducativo` DISABLE KEYS */;
INSERT INTO `programaeducativo` VALUES (13245,'Administración','Económico - administrativa','Xalapa','Abierto'),(13246,'Administración fiscál','Económico - administrativa','Orizaba','Escolarizado');
/*!40000 ALTER TABLE `programaeducativo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-02 15:21:25
