/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.6.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: clinica
-- ------------------------------------------------------
-- Server version	11.6.2-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idcita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `feCreate` datetime DEFAULT current_timestamp(),
  `feUpdate` date DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `unico_dato` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES
(1,'JERSSON PELAYO','QUISPE APAZA',72535244,NULL,NULL,'937298473',NULL,NULL,'2024-10-27 17:04:05',NULL),
(2,'YOJAN VICTOR','QUISPE APAZA',72535242,NULL,NULL,'983729843',NULL,NULL,'2024-10-28 08:44:02',NULL),
(3,'ARNOLD BRIAN','VELA RENGIFO',76345743,'masculino','','992834324','','','2024-11-10 17:48:34','2024-11-10'),
(4,'JESICA LORENA','PANTOJA MARTINEZ',72535259,NULL,NULL,'893274832',NULL,NULL,'2024-11-11 10:17:23',NULL),
(5,'WILFREDO DIEGO','GOMEZ LUNA',74567543,NULL,NULL,'345353245',NULL,NULL,'2024-11-11 10:20:26',NULL),
(6,'MALU MICHELLE','HUAMAN GUEVARA',73262143,NULL,NULL,'879638768',NULL,NULL,'2024-11-11 10:22:34',NULL),
(7,'ANITA','SANTOS CALVAY',74635621,NULL,NULL,'983786438',NULL,NULL,'2024-11-11 10:37:21',NULL),
(8,'GRIMALDO','LOBATON GAMBOA',71876342,NULL,NULL,'893645873',NULL,NULL,'2024-11-11 10:37:50',NULL),
(9,'KEVIN AXEL','CARRASCO VARGAS',72535280,NULL,NULL,'893245678',NULL,NULL,'2024-11-11 10:39:24',NULL),
(10,'TOMAS MATHEUS','CHAVEZ ELGUERA',72673254,NULL,NULL,'983758436',NULL,NULL,'2024-11-13 12:10:07',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `idpersonal` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES
(1,1,'zeta','zeta','1'),
(2,7,'liliana','liliana','1'),
(3,8,'ssj','ssj','1'),
(4,9,'','','1'),
(5,10,'','','1'),
(6,11,'','','1'),
(7,12,'','','1'),
(8,13,'','','1'),
(9,1,'jersson','jersson','1');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_detalles`
--

DROP TABLE IF EXISTS `pago_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_detalles` (
  `idpagodetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idpago` int(11) NOT NULL,
  `monto` double NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`idpagodetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_detalles`
--

LOCK TABLES `pago_detalles` WRITE;
/*!40000 ALTER TABLE `pago_detalles` DISABLE KEYS */;
INSERT INTO `pago_detalles` VALUES
(1,1,100,'pago inicial','2024-10-27 17:04:05'),
(2,1,50,'pago numero 2','2024-10-27 17:04:37'),
(3,2,100,'pago inicial','2024-10-28 08:44:02'),
(4,3,50,'pago inicial','2024-11-10 17:48:34'),
(5,1,250,'pago nuevo 3','2024-11-10 20:43:37'),
(6,1,100,'test nuevo pago','2024-11-11 09:32:13'),
(7,1,50,'test nuevo pago numero 2 ','2024-11-11 09:32:50'),
(8,1,50,'test 3 nuebo pago','2024-11-11 09:33:14'),
(9,1,50,'test 4','2024-11-11 09:34:57'),
(10,1,50,'test 5','2024-11-11 09:35:25'),
(11,1,50,'test 6','2024-11-11 09:37:39'),
(12,1,50,'test 7 esta si es','2024-11-11 09:55:05'),
(13,1,50,'test 8 esta si es la real','2024-11-11 09:56:47'),
(14,1,50,'test 9 nuevo pago','2024-11-11 10:01:22'),
(15,2,100,'test pago 1','2024-11-11 10:02:17'),
(16,2,250,'ultimo test para ajax reactivo','2024-11-11 10:03:02'),
(17,2,50,'test 2','2024-11-11 10:03:33'),
(18,2,50,'ultimo test esta si es la final','2024-11-11 10:03:59'),
(19,3,50,'test de prueba xd','2024-11-11 10:05:08'),
(20,4,250,'pago inicial','2024-11-11 10:17:23'),
(21,5,100,'pago inicial','2024-11-11 10:20:26'),
(22,6,150,'pago inicial','2024-11-11 10:22:34'),
(23,7,80,'pago inicial','2024-11-11 10:37:21'),
(24,8,90,'pago inicial','2024-11-11 10:37:50'),
(25,9,170,'pago inicial','2024-11-11 10:39:24'),
(26,9,50,'rfcs','2024-11-13 11:43:03'),
(27,10,250,'pago inicial','2024-11-13 12:10:07'),
(28,9,100,'','2024-11-13 12:18:20'),
(29,9,50,'','2024-11-13 12:18:41'),
(30,9,150,'','2024-11-13 12:19:01'),
(31,9,150,'','2024-11-13 12:19:48');
/*!40000 ALTER TABLE `pago_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `idtratamiento` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `monto` double NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `saldo` double NOT NULL,
  `igv` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES
(1,1,1,900,'2024-10-27 17:04:05',0,1062,900),
(2,1,2,550,'2024-10-28 08:44:02',350,1062,900),
(3,1,3,100,'2024-11-10 17:48:34',0,118,100),
(4,1,4,250,'2024-11-11 10:17:23',950,1416,1200),
(5,1,5,100,'2024-11-11 10:20:26',400,590,500),
(6,1,6,150,'2024-11-11 10:22:34',450,708,600),
(7,1,7,80,'2024-11-11 10:37:21',670,885,750),
(8,1,8,90,'2024-11-11 10:37:50',700,932.2,790),
(9,1,9,670,'2024-11-11 10:39:24',200,1026.6,870),
(10,1,10,250,'2024-11-13 12:10:07',250,590,500);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(11) NOT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `feCreate` datetime DEFAULT current_timestamp(),
  `feUpdate` date DEFAULT NULL current_timestamp(),
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES
(1,'JERSSON PELAYO','QUISPE APAZA',72535244,NULL,'998777712',NULL,NULL,NULL,'2024-11-10 14:15:23',NULL);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tratamiento` (
  `idtratamiento` int(11) NOT NULL AUTO_INCREMENT,
  `tratamiento` varchar(100) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idtratamiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tratamiento`
--

LOCK TABLES `tratamiento` WRITE;
/*!40000 ALTER TABLE `tratamiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tratamiento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2024-11-25 14:31:37
