-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: disenoCurricular
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
-- Table structure for table `asesoria`
--

DROP TABLE IF EXISTS `asesoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesoria` (
  `asesoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `asesoria_estado` int(11) DEFAULT NULL,
  `asesoria_fecha_solicitud` date DEFAULT NULL,
  `asesoria_fecha_inicio` date DEFAULT NULL,
  `asesoria_fecha_fin` date DEFAULT NULL,
  `asesoria_usuario_id` int(11) DEFAULT NULL,
  `asesoria_programa_id` int(11) DEFAULT NULL,
  `asesoria_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`asesoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesoria`
--

LOCK TABLES `asesoria` WRITE;
/*!40000 ALTER TABLE `asesoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `asesoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaborador` (
  `colaborador_id` int(11) NOT NULL AUTO_INCREMENT,
  `colaborador_puesto` int(11) DEFAULT NULL,
  `colaborador_programa_id` int(11) DEFAULT NULL,
  `colaborador_usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`colaborador_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaborador`
--

LOCK TABLES `colaborador` WRITE;
/*!40000 ALTER TABLE `colaborador` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaborador_region`
--

DROP TABLE IF EXISTS `colaborador_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaborador_region` (
  `col_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_reg_colaborador_id` int(11) DEFAULT NULL,
  `col_reg_region` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`col_reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaborador_region`
--

LOCK TABLES `colaborador_region` WRITE;
/*!40000 ALTER TABLE `colaborador_region` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaborador_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_nick` varchar(20) DEFAULT NULL,
  `usuario_contraseña` varchar(100) DEFAULT NULL,
  `usuario_clase` int(11) DEFAULT NULL,
  `usuario_siu_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'jumaloga@uv.mx','123456',5,'zS15011641'),(2,'damedu@uv.mx','123456',6,'zS27388293'),(3,'mizamu@uv.mx','123456',4,'zS19473827'),(4,'dicari@uv.mx','123456',1,'zS1782736');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-02 15:35:40
