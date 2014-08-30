-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: camnet
-- ------------------------------------------------------
-- Server version	5.1.41-community

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
-- Table structure for table `acceso_webcam`
--

DROP TABLE IF EXISTS `acceso_webcam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acceso_webcam` (
  `id` int(11) NOT NULL,
  `idamigo` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idamigo`),
  KEY `fk_amigo` (`idamigo`),
  CONSTRAINT `fk_amigo` FOREIGN KEY (`idamigo`) REFERENCES `usuario` (`id`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso_webcam`
--

LOCK TABLES `acceso_webcam` WRITE;
/*!40000 ALTER TABLE `acceso_webcam` DISABLE KEYS */;
INSERT INTO `acceso_webcam` VALUES (13,11),(13,12),(11,13);
/*!40000 ALTER TABLE `acceso_webcam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `amigos`
--

DROP TABLE IF EXISTS `amigos`;
/*!50001 DROP VIEW IF EXISTS `amigos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `amigos` (
  `id` int(11),
  `nombre` varchar(20),
  `apellidos` varchar(50),
  `ciudad` varchar(20),
  `email` varchar(50),
  `tipo` varchar(20),
  `contrasena` varchar(10),
  `IP` varchar(16),
  `activo` int(11)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `ip` varchar(20) NOT NULL,
  `estado` varchar(2) NOT NULL,
  PRIMARY KEY (`idlog`),
  KEY `fk_usu_logs` (`idusuario`),
  CONSTRAINT `fk_usu_logs` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,NULL,'elavi_20@hot.es','2011-03-03 21:11:42','192.168.20.176','ko'),(2,NULL,'elavi_20@hot.es','2011-03-03 21:11:35','192.168.20.176','ko'),(3,NULL,'elavi_20@hot.es','2011-03-03 21:11:01','192.168.20.176','ko'),(4,NULL,'elavi_20@hot.es','2011-03-03 21:11:09','192.168.20.176','ko'),(5,NULL,'elavi_20@hotmail.es','2011-03-03 22:11:40','192.168.20.176','ko'),(6,NULL,'','2011-03-03 22:11:43','192.168.20.176','ko'),(7,11,'elavi_20@hotmail.es','2011-03-03 22:11:51','192.168.20.176','ok'),(12,1,'admin','2011-03-03 22:11:55','192.168.20.176','ok'),(19,1,'admin','2011-03-04 12:11:32','127.0.0.1','ok'),(25,12,'gracia33@terra.es','2011-03-04 18:11:09','192.168.20.216','ok'),(26,1,'admin','2011-03-06 13:11:46','127.0.0.1','ok'),(27,1,'admin','2011-03-06 14:11:56','127.0.0.1','ok'),(28,1,'admin','2011-03-07 12:11:51','127.0.0.1','ok'),(29,13,'pulgyy@gmail.com','2011-03-07 19:11:19','127.0.0.1','ok'),(30,13,'pulgyy@gmail.com','2011-03-07 19:11:17','127.0.0.1','ok'),(31,13,'pulgyy@gmail.com','2011-03-07 19:11:24','127.0.0.1','ok'),(32,13,'pulgyy@gmail.com','2011-03-07 19:11:42','127.0.0.1','ok'),(33,13,'pulgyy@gmail.com','2011-03-07 19:11:51','127.0.0.1','ok'),(34,13,'pulgyy@gmail.com','2011-03-07 19:11:32','127.0.0.1','ok'),(35,13,'pulgyy@gmail.com','2011-03-07 19:11:17','127.0.0.1','ok'),(36,13,'pulgyy@gmail.com','2011-03-07 19:11:10','127.0.0.1','ok'),(37,13,'pulgyy@gmail.com','2011-03-07 19:11:58','127.0.0.1','ok'),(38,13,'pulgyy@gmail.com','2011-03-07 20:11:22','127.0.0.1','ok'),(39,13,'pulgyy@gmail.com','2011-03-07 20:11:54','127.0.0.1','ok'),(40,13,'pulgyy@gmail.com','2011-03-07 20:11:33','127.0.0.1','ok'),(41,1,'admin','2011-03-08 09:11:40','127.0.0.1','ok'),(42,13,'pulgyy@gmail.com','2011-03-08 09:11:54','127.0.0.1','ok'),(43,13,'pulgyy@gmail.com','2011-03-08 11:11:58','127.0.0.1','ok'),(44,13,'pulgyy@gmail.com','2011-03-08 15:11:01','127.0.0.1','ok'),(45,13,'pulgyy@gmail.com','2011-03-09 10:11:03','127.0.0.1','ok'),(46,1,'admin','2011-03-10 18:11:22','127.0.0.1','ok'),(47,1,'admin','2011-03-10 19:11:57','127.0.0.1','ok'),(48,1,'admin','2011-03-10 19:11:13','127.0.0.1','ok'),(49,1,'admin','2011-03-10 20:11:18','127.0.0.1','ok'),(50,1,'admin','2011-03-10 20:11:19','127.0.0.1','ok'),(51,1,'admin','2011-03-10 20:11:09','127.0.0.1','ok'),(52,1,'admin','2011-03-10 21:11:46','127.0.0.1','ok'),(53,13,'pulgyy@gmail.com','2011-03-11 12:11:58','127.0.0.1','ok'),(54,13,'pulgyy@gmail.com','2011-03-11 17:11:53','127.0.0.1','ok'),(55,13,'pulgyy@gmail.com','2011-03-11 17:11:08','127.0.0.1','ok'),(56,13,'pulgyy@gmail.com','2011-03-11 17:11:11','127.0.0.1','ok'),(57,13,'pulgyy@gmail.com','2011-03-11 17:11:37','127.0.0.1','ok'),(58,1,'admin','2011-03-11 20:11:31','127.0.0.1','ok'),(59,1,'admin','2011-03-12 14:11:45','127.0.0.1','ok'),(60,1,'admin','2011-03-12 15:11:10','127.0.0.1','ok'),(61,13,'pulgyy@gmail.com','2011-03-12 16:11:59','127.0.0.1','ok'),(62,13,'pulgyy@gmail.com','2011-03-12 18:11:51','127.0.0.1','ok'),(63,13,'pulgyy@gmail.com','2011-03-13 09:11:03','127.0.0.1','ok'),(64,13,'pulgyy@gmail.com','2011-03-13 09:11:49','127.0.0.1','ok'),(65,13,'pulgyy@gmail.com','2011-03-13 09:11:05','127.0.0.1','ok'),(66,13,'pulgyy@gmail.com','2011-03-13 09:11:05','127.0.0.1','ok'),(67,13,'pulgyy@gmail.com','2011-03-13 10:11:55','127.0.0.1','ok'),(68,1,'admin','2011-03-13 13:11:27','127.0.0.1','ok'),(69,1,'admin','2011-03-13 14:11:49','127.0.0.1','ok'),(70,13,'pulgyy@gmail.com','2011-03-13 14:11:10','127.0.0.1','ok'),(71,13,'pulgyy@gmail.com','2011-03-13 14:11:54','127.0.0.1','ok'),(72,13,'pulgyy@gmail.com','2011-03-13 14:11:32','127.0.0.1','ok'),(73,13,'pulgyy@gmail.com','2011-03-13 15:11:51','127.0.0.1','ok'),(74,1,'admin','2011-03-13 15:11:07','127.0.0.1','ok'),(75,13,'pulgyy@gmail.com','2011-03-13 15:11:13','127.0.0.1','ok'),(76,1,'admin','2011-03-13 15:11:26','127.0.0.1','ok'),(77,1,'admin','2011-03-13 15:11:32','127.0.0.1','ok'),(78,13,'pulgyy@gmail.com','2011-03-13 15:11:11','127.0.0.1','ok'),(79,13,'pulgyy@gmail.com','2011-03-13 15:11:47','127.0.0.1','ok'),(80,13,'pulgyy@gmail.com','2011-03-13 16:11:07','127.0.0.1','ok'),(81,1,'admin','2011-03-14 19:11:25','127.0.0.1','ok'),(82,13,'pulgyy@gmail.com','2011-03-14 19:11:29','127.0.0.1','ok'),(83,13,'pulgyy@gmail.com','2011-03-14 19:11:51','127.0.0.1','ok'),(84,13,'pulgyy@gmail.com','2011-03-14 19:11:15','127.0.0.1','ok'),(85,11,'elavi_20@hotmail.es','2011-03-14 19:11:04','192.168.20.176','ok'),(86,13,'pulgyy@gmail.com','2011-03-14 19:11:01','127.0.0.1','ok'),(87,11,'elavi_20@hotmail.es','2011-03-14 19:11:29','192.168.20.176','ok'),(88,13,'pulgyy@gmail.com','2011-03-14 20:11:17','127.0.0.1','ok'),(89,11,'elavi_20@hotmail.es','2011-03-14 20:11:21','192.168.20.176','ok'),(90,13,'pulgyy@gmail.com','2011-03-14 20:11:17','127.0.0.1','ok'),(91,13,'pulgyy@gmail.com','2011-03-14 20:11:03','127.0.0.1','ok'),(92,13,'pulgyy@gmail.com','2011-03-14 20:11:26','127.0.0.1','ok'),(93,1,'admin','2011-03-14 21:11:53','127.0.0.1','ok'),(94,13,'pulgyy@gmail.com','2011-03-14 21:11:11','127.0.0.1','ok'),(95,13,'pulgyy@gmail.com','2011-03-14 21:11:27','127.0.0.1','ok'),(96,13,'pulgyy@gmail.com','2011-03-14 21:11:45','127.0.0.1','ok'),(97,13,'pulgyy@gmail.com','2011-03-15 18:11:46','127.0.0.1','ok'),(98,13,'pulgyy@gmail.com','2011-03-15 18:11:19','127.0.0.1','ok'),(99,13,'pepe@gmail.com','2011-03-15 19:11:52','127.0.0.1','ok'),(100,13,'pulgyy@gmail.com','2011-03-15 19:11:50','127.0.0.1','ok'),(101,13,'pulgyy@gmail.com','2011-03-15 19:11:25','127.0.0.1','ok');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objeto`
--

DROP TABLE IF EXISTS `objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objeto` (
  `idob` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(1) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `ruta` varchar(256) NOT NULL,
  `propietario` int(11) NOT NULL,
  `descripcion` mediumtext,
  `tamanio` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `activo` int(11) NOT NULL,
  PRIMARY KEY (`idob`),
  KEY `fk_propietario` (`propietario`),
  CONSTRAINT `fk_propietario` FOREIGN KEY (`propietario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` VALUES (1,'I','2008[1].jpg','../temporal/13/b33b1b_2008[1].jpg',13,'imagen',6333,'2011-03-14',1),(2,'I','ayto_caceres.jpg','../temporal/13/6bad0c_ayto_caceres.jpg',13,'imagen',6329,'2011-03-14',1),(3,'I','ayto_caceres.jpg','../temporal/13/87e7b8_ayto_caceres.jpg',13,'imagen',6329,'2011-03-14',1),(4,'I','ayto_caceres.jpg','../temporal/13/549957_ayto_caceres.jpg',13,'imagen',6329,'2011-03-14',1),(5,'V','Funcionaria.wmv','../temporal/13/0fff2b_Funcionaria.wmv',13,'video',1988461,'2011-03-14',1),(6,'V','Funcionaria.wmv','../temporal/13/218859_Funcionaria.wmv',13,'video',1988461,'2011-03-14',1),(7,'I','fotos-interna.jpg','../temporal/13/521818_fotos-interna.jpg',13,'imagen',25235,'2011-03-15',1);
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `IP` varchar(16) NOT NULL,
  `activo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Admin',' ',' ','admin','administrador','admin','192.168.1.1',1),(11,'david','herrera','caceres','elavi_20@hotmail.es','usuario','david','192.168.20.176',1),(12,'Miguel Angel','Gracia Cambero','Caceres','gracia33@terra.es','usuario','xxxxx','192.168.20.216',1),(13,'tamara','rufo','CÃ¡ceres','pulgyy@gmail.com','usuario','123','127.0.0.1',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `amigos`
--

/*!50001 DROP TABLE IF EXISTS `amigos`*/;
/*!50001 DROP VIEW IF EXISTS `amigos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `amigos` AS (select `usuario`.`id` AS `id`,`usuario`.`nombre` AS `nombre`,`usuario`.`apellidos` AS `apellidos`,`usuario`.`ciudad` AS `ciudad`,`usuario`.`email` AS `email`,`usuario`.`tipo` AS `tipo`,`usuario`.`contrasena` AS `contrasena`,`usuario`.`IP` AS `IP`,`usuario`.`activo` AS `activo` from `usuario` where ((`usuario`.`id` <> 13) and (`usuario`.`tipo` <> 'administrador'))) */;
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

-- Dump completed on 2011-03-15 20:25:22
