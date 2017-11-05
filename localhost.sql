-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2017 at 06:01 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `infoinstalador`
--

CREATE TABLE IF NOT EXISTS `infoinstalador` (
  `idInfoInstalador` int(11) NOT NULL AUTO_INCREMENT,
  `nombreOperadorPropietario` varchar(60) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `vehiculoMarca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `placas` varchar(45) NOT NULL DEFAULT 'N/A',
  `empresa` varchar(45) NOT NULL,
  `noBus` varchar(45) NOT NULL,
  `instalador` varchar(60) NOT NULL,
  `lugar` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `claxon` tinyint(4) DEFAULT NULL,
  `lucesIntermitentes` tinyint(4) DEFAULT NULL,
  `faros` tinyint(4) DEFAULT NULL,
  `lucesTablero` tinyint(4) DEFAULT NULL,
  `encendedor` tinyint(4) DEFAULT NULL,
  `reloj` tinyint(4) DEFAULT NULL,
  `ventiladorCalefaccionAA` tinyint(4) DEFAULT NULL,
  `limpiadores` tinyint(4) DEFAULT NULL,
  `lucesPlacas` tinyint(4) DEFAULT NULL,
  `timbre` tinyint(4) DEFAULT NULL,
  `espejosLaterales` tinyint(4) DEFAULT NULL,
  `fugasAire` tinyint(4) DEFAULT NULL,
  `aperturaPuertaRR` tinyint(4) DEFAULT NULL,
  `aperturaPuertaFR` tinyint(4) DEFAULT NULL,
  `luzInterior` tinyint(4) DEFAULT NULL,
  `luzFreno` tinyint(4) DEFAULT NULL,
  `luzTraseras` tinyint(4) DEFAULT NULL,
  `luzReversa` tinyint(4) DEFAULT NULL,
  `luzNavegacion` tinyint(4) DEFAULT NULL,
  `alarmaReversa` tinyint(4) DEFAULT NULL,
  `comentarios` varchar(200) DEFAULT 'Sin Comentarios',
  PRIMARY KEY (`idInfoInstalador`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infoinstalador`
--

INSERT INTO `infoinstalador` (`idInfoInstalador`, `nombreOperadorPropietario`, `telefono`, `vehiculoMarca`, `modelo`, `color`, `placas`, `empresa`, `noBus`, `instalador`, `lugar`, `fecha`, `horaEntrada`, `claxon`, `lucesIntermitentes`, `faros`, `lucesTablero`, `encendedor`, `reloj`, `ventiladorCalefaccionAA`, `limpiadores`, `lucesPlacas`, `timbre`, `espejosLaterales`, `fugasAire`, `aperturaPuertaRR`, `aperturaPuertaFR`, `luzInterior`, `luzFreno`, `luzTraseras`, `luzReversa`, `luzNavegacion`, `alarmaReversa`, `comentarios`) VALUES
(1, 'simon iturbide', '7221085100', 'safiro', '2018', 'blanco', '150486k', 'stut', '749', 'omar reza', 'zinacantepec', '2017-10-27', '09:30:00', 1, 2, 2, 1, 0, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'Sin Comentarios'),
(2, 'isidro uribe gomora', '7281727282', 'mercedes', '2018', 'rojo', '150-843-k', 'xinantecatl', '253', 'omar reza', 'zinacantepec', '2017-10-27', '23:59:00', 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `pruebas`
--

CREATE TABLE IF NOT EXISTS `pruebas` (
  `idPruebas` int(11) NOT NULL AUTO_INCREMENT,
  `conteo` tinyint(4) DEFAULT NULL,
  `datos` tinyint(4) DEFAULT NULL,
  `gps` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idPruebas`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pruebas`
--

INSERT INTO `pruebas` (`idPruebas`, `conteo`, `datos`, `gps`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 1),
(3, 0, 1, 0),
(4, 0, 1, 1),
(5, 1, 0, 0),
(6, 1, 0, 1),
(7, 1, 1, 0),
(8, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reparaciones`
--

CREATE TABLE IF NOT EXISTS `reparaciones` (
  `idReparaciones` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `unidad` varchar(45) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `falla` varchar(100) DEFAULT NULL,
  `tecnico` varchar(45) DEFAULT NULL,
  `detalles` varchar(200) DEFAULT NULL,
  `idPruebas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReparaciones`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reparaciones`
--

INSERT INTO `reparaciones` (`idReparaciones`, `fecha`, `unidad`, `empresa`, `falla`, `tecnico`, `detalles`, `idPruebas`) VALUES
(1, '2017-09-17', '552', 'CTTSA', 'Contadores desconectados, cable negro de contadores cortado', 'Omar', 'Se reparo el cable', 8),
(2, '2017-09-17', '212', 'Xinantecatl', 'Desconexiones', 'Omar', 'Se cambio el cableado delantero', 8),
(3, '2017-09-17', '211', 'ALM Evo', 'No reiniciaba', 'Sigfrido', 'Reprogramación', 8),
(4, '2017-09-17', '250', 'ALM Evo', 'Módulo congelado (barras negras)', 'Omar ', 'Se reinició el módulo y se cambio de las barras a caja ', 8),
(5, '2017-09-17', '277', 'Xinantecatl', 'No prende la pantalla, módulo funcional', 'Marco Aguilar', 'Cambio de pantalla', 8),
(6, '2017-09-17', '522', 'CTTSA', 'Para desinstalación', 'José Antonio Solórzano', 'Se queda el equipo para transferencia', 1),
(7, '2017-09-17', '40', 'Cultural', 'No da posición', 'José Antonio Solórzano', 'Cambio de antena', 8),
(8, '2017-09-17', '93', '1° Mayo', 'Modulo en corto', 'Marco A.', 'Cambio de módulo se instalo el TMP 211', 8),
(9, '2017-10-30', '207', 'ALM Evo', 'desconexiones de equipo', 'david', 'Se cambiaron las alimentaciones de posición, desconexiones intencionales', 8),
(10, '2017-10-30', '218', 'ALM Evo', 'desconexiones de equipo', 'edgar', 'Se cambiaron las alimentaciones de posición, conectaron un relevador a nuestra alimentación y el fusible ya no traía cinta estaba a la mano', 8),
(11, '2017-10-30', '520', 'CTTSA', 'desconexiónes de equipo', 'omar', 'La tierra venia floja,  se cambio de lugar y se añadió una segunda tierra', 8),
(12, '2017-10-30', '54', 'Cultural', 'contadores NG y desconexiónes de equipo', 'omar', 'Se cambio cable de 4  y conector de 4', 8),
(13, '2017-10-30', '837', 'Xinantecatl', 'Ninguna', 'Edgar', 'Reporta el operador que contaba 4 de mas, se realizo prueba de conteo y se cambio la tierra de zapata a conexión chasis', 8),
(14, '2017-10-30', '50', 'Cultural', 'deconexiones ', 'david y omar', 'Cable de la ignición floja', 8),
(15, '2017-10-30', '544', 'Intermetropolitano', 'contador trasero NG', 'marco', 'Se cambio el contador trasero principal. \r\nSe reparo el cable de 4 y se cambio el fusible de expansión ', 8),
(16, '2017-10-30', '546', 'Intermetropolitano', 'contador trasero invertido', 'edgar', 'Se destapo el contador y se invirtió la polaridad', 8),
(17, '2017-10-30', '203', 'ALM Evo', 'Contadores NG', 'David y Edgar', 'Se cambiaron las alimentaciones de lugar', 8),
(18, '2017-10-31', '661', 'Stut', 'Alimentaciones y Sim', 'David', 'Cambio de alimentaciones\r\nCambio de Sim', 8),
(19, '2017-10-31', '254', 'ALM Evo', 'Puntos frios', 'Pepe', 'Retoque de puntos frios en contador', 8),
(21, '2017-10-31', '263', 'Xinantecatl', 'Revision general del equipo, no conecta el gsm', 'David', 'Revisión general del equipo, se cambio el modulo se le coloco el del 348 de 8 Noviembre,', 8),
(22, '2017-10-31', '301', 'Stut', 'Pantalla apagada', 'Edgar y jonas', 'Se cambió módulo', 8),
(23, '2017-10-31', '10', 'Cultural', 'MCP', 'Omar, Marco y Adelfo', 'Se cambio MCP\r\nSe limpiaron barras', 8),
(24, '2017-10-31', '219', 'ALM Evo', 'Resoldadura de cables', 'Edgar y Adelfo', 'Se resoldaron los cables', 8),
(25, '2017-10-31', '241', 'ALM Evo', 'Reinicios, falso en la alimentación de tierra, venia con zapata', 'Omar', 'Se le puso una tierra adicional', 8),
(26, '2017-10-31', '27', 'Colon', 'Bloqueos FR', 'Omar', 'Retoque en contador principal', 8),
(27, '2017-10-31', '349', 'ALM Roberto', 'Falso en alimentaciones', 'David', 'Se corrigió las alimentaciones y fusible', 8),
(28, '2017-10-31', '545', 'Intermetropolitano', 'Contadores NG', 'Pepe, Edgar y Jonas', 'Cable de 4 dañando, se reparó el cable, cambio de fusible expansión contador FR', 8),
(29, '2017-10-31', '687', 'Stut', 'No reinicia los contadores', 'Omar Reza', 'Se cambiaron de lugar las alimentaciones, se cargo puntos de salida de las 4 rutas (5 de Mayo, San Mateo, Chapultepec y Pilares)', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
