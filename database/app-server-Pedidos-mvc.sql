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
  `estado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_estado` (`id_estado`,`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'ENVIADO'),(2,'AUTORIZACION DEL LABORATO'),(3,'AUTORIZACION DE DROGUERIA'),(4,'FACTURADO');
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
  CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observaciones`
--

LOCK TABLES `observaciones` WRITE;
/*!40000 ALTER TABLE `observaciones` DISABLE KEYS */;
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
  `producto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `bonificacion` int(11) NOT NULL,
  `desclab` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descguardado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `fenvio` datetime NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_usuario` (`id_usuario`,`id_obs`),
  KEY `id_obs` (`id_obs`),
  KEY `id_pedido` (`id_pedido`,`id_usuario`,`id_obs`,`cliente`,`producto`,`cantidad`,`bonificacion`,`desclab`,`descguardado`,`fenvio`),
  CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_obs`) REFERENCES `observaciones` (`id_obs`),
  CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
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
  `nombre_usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `laboratorio` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_usuario` (`id_usuario`,`nombre_usuario`,`correo`,`password`,`id_rol`,`laboratorio`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jaime Palacios','jaimepalacios998@gmail.com','12345',1,''),(2,'administrador','administrador@gmail.com','administrador',1,''),(3,'Carlos mendez','correofalso@gmail.com','12345',3,'no se'),(46,'correofalso@gmail.com','ahorasoysegundo@gmail.com','12345',1,'JAINA'),(47,'correofalso@gmail.com','ahorasoysegundo@gmail.com','12345',1,'JAINA'),(48,'prueba','prueba.asistente@gmail.com','$2y$04$N3pKVwRRubLPmJHH8kXo5OPFAE3SfP7NU34MOyBbpcD',1,'prueba'),(49,'prueba','prueba.asistente@gmail.com','$2y$04$WN6SF4JOejgT/UyQMp1Lu.szYdr4vNlPQYvSaQuoW3G',1,'prueba'),(50,'prueba2','prueba.asistente@gmail.com','$2y$04$N.FTFy86Iz2mU/IQhhHRaOqpFmveIfAij7XJhlVfoHe',1,'saasdas'),(51,'pruebaaaa','pruebaaaa@gmail.com','$2y$04$i0Q9a2L8zBm8pWSEScLZQ.s7PZcANGLcwV3UF6ASLiS',1,'pruebaaaa'),(52,'pruebaaaa2','pruebaaaa2@gmail.com','$2y$04$/ckQ3sc4hZkRi4U9tFSt2ed3.gELCF9RHHtBmnoG7JC',1,'pruebaaaa2'),(53,'pruebaaaa2','pruebaaaa2@gmail.com','$2y$04$ceqESzYFH5GwUMm9Y5mnze1Xr0s1H4LZJWbfv592qi8',1,'pruebaaaa2'),(54,'jaime jaina','jaimejaina@shushotaw.com','$2y$04$ya7gwtBpyHzD7kMZuTkXDeGbq4g8a9LqwueooKWUiX5',1,'lab de la jainita'),(55,'pruebaaaa3','pruebaaaa3@gmail.com','$2y$04$r7zxfB75KgvpL56sOfNYneTKnXrta/ayB4QdE.wL1iP',1,'pruebaaaa3'),(56,'pruebaaaa4','pruebaaaa4@gmail.com','$2y$04$msvxdbWnUS2kKki1sylMS.Doo4aah7E/XLbird12Gps',1,'pruebaaaa4'),(57,'sadsa','sadsa@gmail.com','$2y$04$6n.kqq4cMgw/xJVqcy7z8.IKr4FYO9wAgxbBeEitkGE',1,'asdsa'),(58,'pruebaaaa2','ahorasoysegundo@gmail.com','$2y$04$kOpi7FAMNre5dfeCFaxv3.7VCRxCask4dR6eDIyMc.N',1,'sadas'),(59,'jaime jaina','jaime@gmail.com','$2y$04$jy11cF4z1A4zheYFbiZolumoIgwZNvNeppQ/C2Mnhjz',1,'jaime jaina'),(60,'prueba','prueba.asistente@gmail.com','$2y$04$dIqqICXzPwIVGb1o6crSSO2j/bKwAw/.QzPprppJa2S',1,'sdfsdf'),(61,'prueba','ahorasoysegundo@gmail.com','$2y$04$LdwqX8DjBM5Whu7brjVBHOnWIfLzxHBOA/zyPODjDwW',1,'ASDASDGA'),(62,'prueba','ahorasoysegundo@gmail.com','$2y$04$P2f2.wVoWJHGhRu0T.EqU.E77yPV3XgHZfzV3k.7Y6b',1,'ASDASDGA'),(63,'prueba','ahorasoysegundo@gmail.com','$2y$04$3CimONLyiJAVpH1glJIa.uxz224D6KUSDzemeICfug1',1,'prueba'),(64,'asfsaf','asdasd@gmail.com','$2y$04$R8gvSdYY7RXTMBMQ8yYJJOZreGxjL1Q37YtANwMfOl1',1,'assad'),(65,'insert','insert@gmail.com','lkhkh',1,'khkj'),(66,'prueba insertar','pruebainsertar@gmail.com','insertarprueba',1,'pruebainsertar'),(67,'jaime jaina','jaimejainita@wuaf.com','perrito',1,'el perrito shao shao'),(68,'insert','ahorasoysegundo@gmail.com','asasd',1,'ASDASDGA'),(69,'insert','ahorasoysegundo@gmail.com','khkjhk',1,'jhkjhkjh'),(70,'insert','insert@gmail.com','lkhkjgf',1,'fjhfjhf'),(72,'pruebaaaa2','ahorasoysegundo@gmail.com',',bkj',2,'hjkhg'),(73,'prueba insert','ahorasoysegundo@gmail.com','jhogjhg',2,'gjhg'),(74,'insert','ahorasoysegundo@gmail.com','mbkgjg',2,'ghj'),(75,'insert','ahorasoysegundo@gmail.com','mbkgjg',2,'ghj'),(76,'prueba insert','ahorasoysegundo@gmail.com','mnvjv',2,'jkkj'),(77,'prueba insert','ahorasoysegundo@gmail.com','mnvjv',2,'jkkj'),(78,'prueba insertar','ahorasoysegundo@gmail.com','mbb',2,'jjgj'),(79,'prueba insertar','ahorasoysegundo@gmail.com','mbb',2,'jjgj'),(80,'pruebaaaa2','ahorasoysegundo@gmail.com','jhhjg',2,'hjgjh'),(81,'pruebaaaa2','ahorasoysegundo@gmail.com','jhhjg',2,'hjgjh'),(82,'1','jaimejaina@shushotaw.com','k',1,'nlh'),(83,'1','jaimejaina@shushotaw.com','k',1,'nlh'),(84,'prueba insertar','jaimejainita@wuaf.com','123456789',2,'ghjkui'),(85,'prueba insertar','jaimejainita@wuaf.com','123456789',2,'ghjkui'),(86,'pruebaaaa2','pruebaaaa2@gmail.com','kjkgkj',2,'gjkgjg'),(87,'pruebaaaa2','pruebaaaa2@gmail.com','kjkgkj',2,'gjkgjg'),(88,'pruebaaaa2','pruebaaaa2@gmail.com','kjkgkj',2,'gjkgjg'),(89,'pruebaaaa2','pruebaaaa2@gmail.com','kjkgkj',2,'gjkgjg'),(90,'juannnn','juannnn@gmail.com','jkhkjh',2,'kjhkjh'),(91,'juannnn','juannnn@gmail.com','jkhkjh',2,'kjhkjh'),(93,'insert','ahorasoysegundo@gmail.com','mjbkjhkjh',2,'kjhkjhk'),(94,'pruebaaaa2','ahorasoysegundo@gmail.com','hgjhgjhgj',1,'jhgjgjhgjhg'),(95,'jaime jaina','ahorasoysegundo@gmail.com',',mnkk',2,'kjhkhkj'),(96,'insert','ahorasoysegundo@gmail.com','kjgjhgjhg',2,'jhg'),(98,'prueba insert','ahorasoysegundo@gmail.com',',jgkjh',1,'kjhkjh'),(99,'prueba insert','ahorasoysegundo@gmail.com',',jgkjh',1,'kjhkjh');
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

-- Dump completed on 2020-10-01 16:59:03
