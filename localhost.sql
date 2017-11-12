-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: id3460579_dtvax
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `idEmpresa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'1° Mayo'),(2,'8 de Noviembre'),(3,'ALM Evo'),(4,'ALM Roberto'),(5,'Colon'),(6,'CTTSA'),(7,'Cultural'),(8,'Intermetropolitano'),(9,'mALM'),(10,'Stut'),(11,'Temoayenses'),(12,'Vale de Toluca'),(13,'Xinantecatl');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reparaciones_datos`
--

DROP TABLE IF EXISTS `reparaciones_datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reparaciones_datos` (
  `idReparaciones` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `unidad` varchar(45) CHARACTER SET latin1 NOT NULL,
  `falla` varchar(100) CHARACTER SET latin1 NOT NULL,
  `detalles` varchar(200) CHARACTER SET latin1 NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idTecnico` int(11) NOT NULL,
  `idPrueba` int(11) NOT NULL,
  PRIMARY KEY (`idReparaciones`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparaciones_datos`
--

LOCK TABLES `reparaciones_datos` WRITE;
/*!40000 ALTER TABLE `reparaciones_datos` DISABLE KEYS */;
INSERT INTO `reparaciones_datos` VALUES (1,'2017-09-17','552','Contadores desconectados, cable negro de contadores cortado','Se reparo el cable',6,1,8),(2,'2017-09-17','212','Desconexiones','Se cambio el cableado delantero',13,1,8),(3,'2017-09-17','211','No reiniciaba','Reprogramación',3,7,8),(4,'2017-09-17','250','Módulo congelado (barras negras)','Se reinició el módulo y se cambio de las barras a caja ',3,1,8),(5,'2017-09-17','277','No prende la pantalla, módulo funcional','Cambio de pantalla',13,5,8),(6,'2017-09-17','522','Para desinstalación','Se queda el equipo para transferencia',6,4,1),(7,'2017-09-17','40','No da posición','Cambio de antena',7,4,8),(8,'2017-09-17','93','Modulo en corto','Cambio de módulo se instalo el TMP 211',1,5,8),(9,'2017-10-30','207','desconexiones de equipo','Se cambiaron las alimentaciones de posición, desconexiones intencionales',3,3,8),(10,'2017-10-30','218','desconexiones de equipo','Se cambiaron las alimentaciones de posición, conectaron un relevador a nuestra alimentación y el fusible ya no traía cinta estaba a la mano',3,2,8),(11,'2017-10-30','520','desconexiónes de equipo','La tierra venia floja,  se cambio de lugar y se añadió una segunda tierra',6,1,8),(12,'2017-10-30','54','contadores NG y desconexiónes de equipo','Se cambio cable de 4  y conector de 4',7,1,8),(13,'2017-10-30','837','Ninguna','Reporta el operador que contaba 4 de mas, se realizo prueba de conteo y se cambio la tierra de zapata a conexión chasis',13,2,8),(14,'2017-10-30','50','deconexiones ','Cable de la ignición floja',7,3,8),(15,'2017-10-30','544','contador trasero NG','Se cambio el contador trasero principal. \r\nSe reparo el cable de 4 y se cambio el fusible de expansión ',8,5,8),(16,'2017-10-30','546','contador trasero invertido','Se destapo el contador y se invirtió la polaridad',8,2,8),(17,'2017-10-30','203','Contadores NG','Se cambiaron las alimentaciones de lugar',3,3,8),(18,'2017-10-31','661','Alimentaciones y Sim','Cambio de alimentaciones\r\nCambio de Sim',10,3,8),(19,'2017-10-31','254','Puntos frios','Retoque de puntos frios en contador',3,4,8),(20,'2017-10-31','263','Revision general del equipo, no conecta el gsm','Revisión general del equipo, se cambio el modulo se le coloco el del 348 de 8 Noviembre,',13,3,8),(21,'2017-10-31','301','Pantalla apagada','Se cambió módulo',10,2,8),(22,'2017-10-31','10','MCP','Se cambio MCP\r\nSe limpiaron barras',7,1,8),(23,'2017-10-31','219','Resoldadura de cables','Se resoldaron los cables',3,2,8),(24,'2017-10-31','241','Reinicios, falso en la alimentación de tierra, venia con zapata','Se le puso una tierra adicional',3,1,8),(25,'2017-10-31','27','Bloqueos FR','Retoque en contador principal',5,1,8),(26,'2017-10-31','349','Falso en alimentaciones','Se corrigió las alimentaciones y fusible',4,3,8),(27,'2017-10-31','545','Contadores NG','Cable de 4 dañando, se reparó el cable, cambio de fusible expansión contador FR',8,4,8),(28,'2017-10-31','687','No reinicia los contadores','Se cambiaron de lugar las alimentaciones, se cargo puntos de salida de las 4 rutas (5 de Mayo, San Mateo, Chapultepec y Pilares)',10,1,8),(29,'2017-11-07','48','Revision General','Se realizo revision general',13,2,8),(30,'2017-11-07','642','Bloqueos delanteros','Se cambiaron contadores receptores delantero y traseros y el contador principal trasero',10,4,8),(31,'2017-11-07','613','No bloqueaba el contador delantero','Se cambio el contador principal delantero',10,1,8),(32,'2017-11-07','65','Reinicios','Se soldo la ignicion y se arreglaron barra chuecas\r\nSe cambio SIM',5,1,8),(33,'2017-11-07','147','Cortes y reinicios','Se revisaron alimentaciones, puntos frios en contador y se atornillo contador flojo',5,3,8),(34,'2017-11-07','41','Reinicios y cortes','Tierra floja, se cambio de lugar',5,1,8),(35,'2017-11-07','21','Reinicios y cortes','Se cambio la tierra de lugar y se ensinto  el fusible descubierto\r\nSe cambio sim.\r\nSe encontro cortador en la tierra',5,2,8),(36,'2017-11-07','08','Desconexiones y bloqueos','Cambio de sim, se encontro cortador en cable de tierra , haciendo el cambio con cable nuevo',5,3,8),(37,'2017-11-08','827','No reinicia','Reprogramacion del modulo',13,1,8),(38,'2017-11-08','45','Reinicios','Se removio la resistencia R10',5,3,8),(39,'2017-11-08','85','Reinicios en ruta','Se cambio la tierra de lugar y se arreglaron las alimentaciones.\r\nEl modulo venia mojado, se cambio la pantalla',5,1,8),(40,'2017-11-08','139','Bloqueos frontales','Se dio mantenimiento a barras y se arreglaron alimentaciones',5,2,8),(41,'2017-11-08','86','Bloqueos frontales','Se dio mantenimiento en barras',5,3,8),(42,'2017-11-08','144','Bloqueos','Se dio mantenimiento a las barras',5,2,8),(43,'2017-11-08','837','No reinicia','Se reprogramo, se cambiaron contadores, cable de 6 y de 4',13,1,8),(44,'2017-11-08','240','Reinicios','Se removio la resistencia R10',3,3,8),(45,'2017-10-26','68','Desconexión de alimentaciones','Cable de alimentación cortado. se arreglaron las alimentaciones',5,2,8),(46,'2017-10-26','41','Reinicios en ruta','Terminales de fusible flojas. se cambiaron las terminales y revisaron alimentaciones',5,1,8),(47,'2017-11-08','10','Contadores ng','Se cambio modulo',7,3,8),(48,'2017-10-26','562','Bloqueos en contador FR','Conector de 6 mal ponchado, se cambio el conector de 6 y se revisaron alimentaciones',6,1,8),(49,'2017-10-26','26','Revisión General','Unidad funcionando ok',7,3,8),(50,'2017-10-27','305','Reinicio de módulo','Se le cambio el módulo, se le coloco el del cttsa 521',10,2,8),(51,'2017-10-27','059','Bloqueos en contador RR','Arnes de 3 dañado, se le cambio el arnés y se revisaron alimentaciones',1,2,8),(52,'2017-10-27','109','Bloqueos en contador FR','Contador FR desplazado y arnés de 6 dañado, se coloco contador en su sitio y se cambio el arnés de 6, Esta unidad la repararon Jonas y Pepe',1,5,8),(53,'2017-10-27','203','Reinicios de módulo','Se cambio módulo y pantalla, repararon Octavio y pepe',3,5,8),(54,'2017-11-08','824','Bloqueos, contador y mica sin tornillos','Se fijaron los contadores y el acrilico',13,1,8),(55,'2017-10-27','10','Contadores NG','Mcp dañado,  se revisaron alimentaciones y se cambio MCP ',7,3,8),(56,'2017-10-27','646','Módulo apagado','Se cambio el módulo',10,2,8),(57,'2017-10-19','760','Módulo apagado','Se zafo el encrimpado de la alimentación, se corrigieron alimentaciones, atendió Octavio González y Eduardo Arriaga',10,5,8),(58,'2017-10-23','85','Calibracion','',13,4,8),(59,'2017-10-19','515','Bloqueos contador RR','Se arreglo contador',8,1,8),(60,'2017-10-23','827','Resistencia de ignición y fusible','',13,5,8),(61,'2017-10-19','322','Bloqueos contador RR','Se arreglo contador, atendió la reparación Aldo Hernández',10,5,8),(62,'2017-10-19','852','Módulo apagado','Cable de 4 cortado, se cambió el cable de 4',13,1,8),(63,'2017-10-19','47','Pantalla apagada','',5,6,8),(64,'2017-10-23','336','Cable de ignicion mal puesto','',10,1,8),(65,'2017-10-23','66','Contador RR dañado','',5,4,8),(66,'2017-10-23','209','Falla en el puerto GPRS y credito','',3,6,8),(67,'2017-10-23','148','Instalacion','',5,4,8),(68,'2017-10-19','521','Cambio de equipo','Se cambio equipo NRF por xEvo',6,1,8),(69,'2017-10-20','509','Bloqueos excesivos','Se cambiaron las barras de psosición',10,3,8),(70,'2017-10-20','542','Cambio de equipo','Se cambio equipo NRF por xEvo',6,1,8),(71,'2017-10-20','305','Módulo apagado','Fusible quemado, se revisaron alimentaciones y módulo, se cambio el fusible',10,2,8),(72,'2017-10-20','313','Contadores NG','Se retocaron los contadores y el MCP',10,6,8),(73,'2017-10-20','307','Reinicios de módulo','Cable de ignición flojo, se arreglo la conexión',10,1,8),(74,'2017-10-24','4','Revision General','',11,3,8),(75,'2017-10-24','33','Revision General','',11,1,8),(76,'2017-10-24','646','Modulo mojado y alimentaciones espada','',10,3,8),(77,'2017-10-24','506','Tierra desconectada','',6,2,8),(78,'2017-10-24','749','Instalacion','',10,1,8),(79,'2017-10-24','47','Modulo apagado','',5,1,8),(80,'2017-10-24','221','SIM 908 congelado y modulo congelado','',3,3,8),(81,'2017-10-24','183','Revision General','',9,2,8),(82,'2017-10-24','54','Modulo apagado','',7,1,8),(83,'2017-10-20','121','Contador FR bloqueado','Se cambio el contador',11,2,8),(84,'2017-10-23','69','No envía datos','Sim desactivado, se realizó cambio de SIM',5,1,8),(85,'2017-10-23','542','No reinicia','Se solicito asignación de puntos de salida',6,4,8),(86,'2017-10-25','100','Reinicios de módulo','Terminales de fusible flojas, se cambiaron las terminales',5,2,8),(87,'2017-11-08','08','No envía datos',' Cambio de  SIM y prueba de lectura RF',13,1,8),(88,'2017-11-09','98','Bloqueos','Se cambio sim, se retocaron puntos frios y se dio mantenimiento a las barras',5,2,8),(89,'2017-11-09','97','Desconexiones de pantalla','Se cambio la ignicion de lugar',5,1,8),(90,'2017-11-09','12','Datos','Se cambio sim',5,3,8),(91,'2017-11-09','155','Equipo sin alimentacion','Se cambio la tierra de lugar y se checarón alimentaciones',11,1,8),(92,'2017-11-09','275','Reinicios de equipo','Se dio mantenimiento en barras.\r\nSe cambio la tierra y se revisaron alimentacios,',3,2,8),(93,'2017-11-09','278 - (91)','Bloqueos','Se cambio el contador FR receptor',13,1,8),(94,'2017-11-09','242','Contador trasero bloqueado','Se dio mantenimiento en barras, se cambio el contador principal trasero y se checaron alimentaciones',3,3,8),(95,'2017-11-09','132','Bracket del modulo roto','Se revisaron alimentaciones, se cambio el bracket y se dio mantenimiento en las barras',3,3,8),(96,'2017-11-09','263','Revicion general','Se reconfiguro',13,1,8),(97,'2017-11-09','85','Pantalla apagada','Se cambio el fusible de expancion y se dio mantenimiento a las barras.\r\nSe cambio calcasa de pantalla',5,3,8),(98,'2017-11-09','127','Bloqueos traseros','Se cambio el contador principal RR y se checaron alimentaciones',5,3,8),(99,'2017-11-09','64','Desconexiones','Se arreglo la tierra del modulo',5,2,8),(100,'2017-11-10','242','Bloqueos y reinicios','Se cambio la tierra de lugar',13,2,8),(101,'2017-11-10','837','Bloqueos','Se cambio el cable de 6 delantero, arnes de 6,4,3 y se cambiaron contadores.\r\nSe dio mantenimiento a las barras',13,1,8),(102,'2017-11-10','833','Bloqueos','Se movio la tierra de lugar',13,2,8),(103,'2017-11-10','805','Bloqueos y posible cortador','Se cambio la resistencia de la ignicion del modulo y la tierra de pocision',13,5,8),(104,'2017-11-10','86','Reinicios','Se cambio la caja del modulo, se cambio la tierra de lugar y se checo las alimentaciones',13,2,8),(105,'2017-11-10','92','Bloqueos','Se retoco punto frio en contador RR',5,4,8),(106,'2017-11-10','97','Bloqueos y reinicios','Tuercas de la alimentacion e ignicion flojas, se apretaron y se checaron',13,2,8),(107,'2017-11-10','30','Reinicios','Se removio la resistencia y se cambio sim',5,4,8),(108,'2017-11-10','824','Bloqueos','Se dio mantenimiento a las barras',13,2,8),(109,'2017-11-10','271','Instalación','Se instalo el modulo temporal 263',3,1,8),(110,'2017-11-10','33','Bloqueos','Se cambio la caja del modulo y se dio mantenimiento a las barras',13,2,8),(111,'2017-11-10','257','Bloqueos y reinicios','Se cambio la caja del modulo, se checo alimentaciones y se cambio el arnes de 4 del contador',3,1,8),(112,'2017-11-10','121','Bloqueos','Se retocaron puntos frios y se dio mantenimiento a las barras',5,4,8),(113,'2017-11-10','841','Desconexion en contador trasero','Revicion general y se movio la tierra de lugar',13,2,8),(114,'2017-11-10','220 ','Revicion general','Se cambio la caja del modulo y se revisaron las alimentaciones',13,1,8),(115,'2017-11-10','852','Cortes','Se cambio la tierra de lugar y revicion completa',13,2,8),(116,'2017-11-10','121','Bloqueos FR','Retoque de puntos frios',5,4,8);
/*!40000 ALTER TABLE `reparaciones_datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reparaciones_pruebas`
--

DROP TABLE IF EXISTS `reparaciones_pruebas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reparaciones_pruebas` (
  `idPrueba` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `conteo` tinyint(4) NOT NULL,
  `datos` tinyint(4) NOT NULL,
  `gps` tinyint(4) NOT NULL,
  PRIMARY KEY (`idPrueba`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparaciones_pruebas`
--

LOCK TABLES `reparaciones_pruebas` WRITE;
/*!40000 ALTER TABLE `reparaciones_pruebas` DISABLE KEYS */;
INSERT INTO `reparaciones_pruebas` VALUES (1,0,0,0),(2,0,0,1),(3,0,1,0),(4,0,1,1),(5,1,0,0),(6,1,0,1),(7,1,1,0),(8,1,1,1);
/*!40000 ALTER TABLE `reparaciones_pruebas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision_color`
--

DROP TABLE IF EXISTS `revision_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision_color` (
  `idColor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idColor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_color`
--

LOCK TABLES `revision_color` WRITE;
/*!40000 ALTER TABLE `revision_color` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision_datos`
--

DROP TABLE IF EXISTS `revision_datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision_datos` (
  `idRevision` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombreOperador` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `placas` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `noBus` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `idMarca` int(10) unsigned NOT NULL,
  `idModelo` int(10) unsigned NOT NULL,
  `idColor` int(10) unsigned NOT NULL,
  `idEmpresa` int(10) unsigned NOT NULL,
  `idInstalador` int(10) unsigned NOT NULL,
  `idPuntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRevision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_datos`
--

LOCK TABLES `revision_datos` WRITE;
/*!40000 ALTER TABLE `revision_datos` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision_marca`
--

DROP TABLE IF EXISTS `revision_marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision_marca` (
  `idMarca` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_marca`
--

LOCK TABLES `revision_marca` WRITE;
/*!40000 ALTER TABLE `revision_marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision_modelo`
--

DROP TABLE IF EXISTS `revision_modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision_modelo` (
  `idModelo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idModelo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_modelo`
--

LOCK TABLES `revision_modelo` WRITE;
/*!40000 ALTER TABLE `revision_modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision_puntos`
--

DROP TABLE IF EXISTS `revision_puntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision_puntos` (
  `idPuntos` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `claxon` tinyint(3) unsigned NOT NULL,
  `lucesIntermitentes` tinyint(3) unsigned NOT NULL,
  `faros` tinyint(3) unsigned NOT NULL,
  `lucesTablero` tinyint(3) unsigned NOT NULL,
  `encendedor` tinyint(3) unsigned NOT NULL,
  `reloj` tinyint(3) unsigned NOT NULL,
  `ventilador` tinyint(3) unsigned NOT NULL,
  `limpiadores` tinyint(3) unsigned NOT NULL,
  `lucesPlacas` tinyint(3) unsigned NOT NULL,
  `timbre` tinyint(3) unsigned NOT NULL,
  `espejosLaterales` tinyint(3) unsigned NOT NULL,
  `fugasAire` tinyint(3) unsigned NOT NULL,
  `aperturaRR` tinyint(3) unsigned NOT NULL,
  `aperturaFR` tinyint(3) unsigned NOT NULL,
  `luzInterior` tinyint(3) unsigned NOT NULL,
  `luzFreno` tinyint(3) unsigned NOT NULL,
  `lucesTraceras` tinyint(3) unsigned NOT NULL,
  `luzReversa` tinyint(3) unsigned NOT NULL,
  `lucesNavegacion` tinyint(3) unsigned NOT NULL,
  `alarmaReversa` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`idPuntos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision_puntos`
--

LOCK TABLES `revision_puntos` WRITE;
/*!40000 ALTER TABLE `revision_puntos` DISABLE KEYS */;
/*!40000 ALTER TABLE `revision_puntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tecnico`
--

DROP TABLE IF EXISTS `tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tecnico` (
  `idTecnico` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombreTecnico` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellidosTecnico` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idTecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnico`
--

LOCK TABLES `tecnico` WRITE;
/*!40000 ALTER TABLE `tecnico` DISABLE KEYS */;
INSERT INTO `tecnico` VALUES (1,'',''),(2,'Omar','Reza'),(3,'Edgar','Soto'),(4,'David','Guadarrama'),(5,'José','Antonio Solórzano'),(6,'Marco','Aguilar'),(7,'Octavio','Gonzalez'),(8,'Sigfrido','Gonzalez');
/*!40000 ALTER TABLE `tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'chip','989215c8d6b6344a466953d3a1f1fc40');
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

-- Dump completed on 2017-11-11 23:36:25
