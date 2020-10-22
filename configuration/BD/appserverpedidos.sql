-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: den1.mysql3.gear.host    Database: appserverpedidos
-- ------------------------------------------------------
-- Server version	5.7.26-log

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
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_estado` (`id_estado`,`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'ENVIADO'),(2,'AUTORIZACION DEL LABORATORIO'),(3,'AUTORIZACION DE DROGUERIA'),(4,'FACTURADO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observaciones`
--

DROP TABLE IF EXISTS `observaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `observaciones` (
  `id_obs` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_obs`),
  KEY `id_estado` (`id_estado`),
  KEY `id_obs` (`id_obs`,`observacion`,`id_estado`),
  CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observaciones`
--

LOCK TABLES `observaciones` WRITE;
/*!40000 ALTER TABLE `observaciones` DISABLE KEYS */;
INSERT INTO `observaciones` VALUES (1,'ENVIADO',1),(2,'AUTORIZACION DEL LABORATORIO',2),(3,'AUTORIZACION DE DROGUERIA',3),(4,'FACTURADO',4);
/*!40000 ALTER TABLE `observaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_obs` int(11) NOT NULL,
  `cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fenvio` datetime NOT NULL,
  `leido` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `visto_x` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario` (`id_usuario`,`id_obs`),
  KEY `id_obs` (`id_obs`),
  KEY `id_pedido` (`id_pedido`,`id_usuario`,`id_obs`,`cliente`,`fenvio`),
  CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_obs`) REFERENCES `observaciones` (`id_obs`),
  CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (86,154,4,'Farmacia uno','2020-10-14 08:04:38','1','facturacion'),(87,154,4,'Farmacia Dos','2020-10-14 08:05:22','1','facturacion'),(88,154,4,'Farmacia Tres','2020-10-14 08:08:21','1','facturacion'),(89,154,4,'Farmacia Dos2222222222222222','2020-10-14 01:31:48','1','facturacion'),(90,154,2,'prueba','2020-10-14 13:36:01','1','facturacion'),(91,154,2,'pruebaaa','2020-10-14 13:49:53','1','Jaime Palacios'),(92,154,2,'prueba33','2020-10-14 13:56:04','1','facturacion'),(93,154,4,'Farmaciaprueba ingreso','2020-10-15 07:52:35','1','facturacion'),(94,154,1,'prueba ingreso','2020-10-15 07:54:13','1','Jaime Palacios'),(95,154,4,'prueba ingreso','2020-10-15 07:54:13','1','Jaime Palacios'),(96,154,3,'Farmacia','2020-10-15 08:05:18','1','Jaime Palacios'),(97,154,3,'Farmacia Cuatro','2020-10-15 08:27:33','1','Jaime Palacios');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `bonificacion` int(11) NOT NULL,
  `desclab` varchar(10) NOT NULL,
  `descguardado` varchar(10) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_pedidos_producto_idx` (`id_pedido`),
  CONSTRAINT `fk_pedidos_producto` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (78,'Dologrip',100,50,'20%','10%',86),(79,'Intestocor',500,100,'0%','10%',87),(80,'Dologrip',100,20,'10%','10%',88),(81,'Alcohol 90',200,50,'5%','10%',88),(82,'Acetaminofen 500',800,90,'0%','30%',89),(83,'Dologrip',85,50,'0%','10%',90),(84,'Acetaminofen 500',600,300,'0%','10%',91),(85,'Dologrip',8888,100,'20%','10%',92),(86,'Dologrip',100,5,'20%','30%',93),(87,'Dologrip',44,4,'20%','30%',94),(88,'Dologrip',44,4,'20%','30%',95),(89,'Dologrip',100,100,'10%','5%',96),(90,'asrtdyfgj',4,4,'8','30%',97);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`),
  KEY `id_rol` (`id_rol`,`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ADMINISTRADOR'),(2,'FACTURACION'),(3,'VISITADOR');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `laboratorio` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_usuario` (`id_usuario`,`nombre_usuario`,`correo`,`password`,`id_rol`,`laboratorio`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (150,'administrador','administrador@gmail.com','aU1MV1YvZ1BsWkJrSXc1Y2tjbFRyUT09',1,'administrador'),(154,'visitador','visitador@gmail.com','K2daWDJ3T0xYdnNsbFV5OVFSK0ZqZz09',3,'visitador'),(155,'facturacion','facturacion@gmail.com','bFIweUdjanRiZHVGa2N4TkZwelRRZz09',2,'facturacion'),(156,'Jaime Palacios','facturacion2@gmail.com','RXFDUVYyaGdQYUVaZVlWVTRuOCtxdz09',2,'LAB'),(161,'PRUEBA','prueba@gmail.es','LzdyTmhVUUp3Wjg2RkNlRGMxYm04dz09',1,'PRUEBAÑ');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-22  7:57:02
