-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.24-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para kronotime
DROP DATABASE IF EXISTS `kronotime`;
CREATE DATABASE IF NOT EXISTS `kronotime` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kronotime`;


-- Volcando estructura para tabla kronotime.tbl_carrera
DROP TABLE IF EXISTS `tbl_carrera`;
CREATE TABLE IF NOT EXISTS `tbl_carrera` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_nombre` varchar(250) NOT NULL DEFAULT '0',
  `car_fecha` date NOT NULL,
  `car_imagen` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kronotime.tbl_carrera: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_carrera` DISABLE KEYS */;
INSERT INTO `tbl_carrera` (`car_id`, `car_nombre`, `car_fecha`, `car_imagen`) VALUES
	(22, 'last', '2012-01-20', 'experimento-nucle-atomo-alfa-pan-de-oro.jpg'),
	(23, 'el pepes', '2012-01-20', 'Penguins.jpg'),
	(24, 'Ultima carrera', '2012-01-20', 'Oro.jpg'),
	(25, 'Ultima carrera', '2012-01-20', 'Oro.jpg');
/*!40000 ALTER TABLE `tbl_carrera` ENABLE KEYS */;


-- Volcando estructura para tabla kronotime.tbl_categoria
DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE IF NOT EXISTS `tbl_categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(250) NOT NULL,
  `rel_car_id` int(10) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kronotime.tbl_categoria: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
INSERT INTO `tbl_categoria` (`cat_id`, `cat_nombre`, `rel_car_id`) VALUES
	(37, 'Femenino, Abierta 18 - 39 años', 22),
	(38, 'Masculino, Abierta 18 - 39 años', 22),
	(39, 'Femenino, Abierta 18 - 39 años', 23),
	(40, 'Masculino, Abierta 18 - 39 años', 23),
	(41, 'Femenino, Abierta 18 - 39 años', 24),
	(42, 'Masculino, Abierta 18 - 39 años', 24),
	(43, 'Femenino, Abierta 18 - 39 años', 25),
	(44, 'Masculino, Abierta 18 - 39 años', 25);
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;


-- Volcando estructura para tabla kronotime.tbl_competidor
DROP TABLE IF EXISTS `tbl_competidor`;
CREATE TABLE IF NOT EXISTS `tbl_competidor` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_nombre` varchar(250) NOT NULL DEFAULT '0',
  `com_posicion` int(11) NOT NULL DEFAULT '0',
  `com_edad` int(11) NOT NULL DEFAULT '0',
  `com_no` int(11) NOT NULL DEFAULT '0',
  `com_tiempo_oficial` varchar(100) NOT NULL DEFAULT '0',
  `com_paso` varchar(100) NOT NULL DEFAULT '0',
  `rel_cat_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla kronotime.tbl_competidor: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `tbl_competidor` DISABLE KEYS */;
INSERT INTO `tbl_competidor` (`com_id`, `com_nombre`, `com_posicion`, `com_edad`, `com_no`, `com_tiempo_oficial`, `com_paso`, `rel_cat_id`) VALUES
	(46, 'Estefania Urieles Moreno', 1, 0, 11, '44:26.5', '4:27/K', 37),
	(47, 'Ana Maria Tinoco Posada', 2, 0, 20, '48:04.8', '4:48/K', 37),
	(48, 'Johanna Carolin Rodriguez Casallas', 3, 0, 47, '48:16.1', '4:50/K', 37),
	(49, 'Alexandra Paola Barcelo Mendoza', 4, 0, 1, '49:04.8', '4:54/K', 37),
	(50, 'Yacelis Gomez Vasquez', 5, 0, 481, '49:20.2', '4:56/K', 37),
	(51, 'Urielkis', 1, 28, 512, '35:08.3', '3:31/K', 38),
	(52, 'Joel', 2, 30, 306, '35:42.7', '3:34/K', 38),
	(53, 'Jovany Martinez', 3, 34, 823, '38:21.1', '3:50/K', 38),
	(54, 'Ivan Dario', 4, 28, 127, '39:35.9', '3:58/K', 38),
	(55, 'Hugo Eliecer', 5, 19, 157, '39:58.0', '4:00/K', 38),
	(56, 'Estefania Urieles Moreno', 1, 0, 11, '44:26.5', '4:27/K', 39),
	(57, 'Ana Maria Tinoco Posada', 2, 0, 20, '48:04.8', '4:48/K', 39),
	(58, 'Johanna Carolin Rodriguez Casallas', 3, 0, 47, '48:16.1', '4:50/K', 39),
	(59, 'Alexandra Paola Barcelo Mendoza', 4, 0, 1, '49:04.8', '4:54/K', 39),
	(60, 'Yacelis Gomez Vasquez', 5, 0, 481, '49:20.2', '4:56/K', 39),
	(61, 'Urielkis', 1, 28, 512, '35:08.3', '3:31/K', 40),
	(62, 'Joel', 2, 30, 306, '35:42.7', '3:34/K', 40),
	(63, 'Jovany Martinez', 3, 34, 823, '38:21.1', '3:50/K', 40),
	(64, 'Ivan Dario', 4, 28, 127, '39:35.9', '3:58/K', 40),
	(65, 'Hugo Eliecer', 5, 19, 157, '39:58.0', '4:00/K', 40),
	(66, 'Estefania Urieles Moreno', 1, 0, 11, '44:26.5', '4:27/K', 41),
	(67, 'Ana Maria Tinoco Posada', 2, 0, 20, '48:04.8', '4:48/K', 41),
	(68, 'Johanna Carolin Rodriguez Casallas', 3, 0, 47, '48:16.1', '4:50/K', 41),
	(69, 'Alexandra Paola Barcelo Mendoza', 4, 0, 1, '49:04.8', '4:54/K', 41),
	(70, 'Yacelis Gomez Vasquez', 5, 0, 481, '49:20.2', '4:56/K', 41),
	(71, 'Urielkis', 1, 28, 512, '35:08.3', '3:31/K', 42),
	(72, 'Joel', 2, 30, 306, '35:42.7', '3:34/K', 42),
	(73, 'Jovany Martinez', 3, 34, 823, '38:21.1', '3:50/K', 42),
	(74, 'Ivan Dario', 4, 28, 127, '39:35.9', '3:58/K', 42),
	(75, 'Hugo Eliecer', 5, 19, 157, '39:58.0', '4:00/K', 42),
	(76, 'Estefania Urieles Moreno', 1, 0, 11, '44:26.5', '4:27/K', 43),
	(77, 'Ana Maria Tinoco Posada', 2, 0, 20, '48:04.8', '4:48/K', 43),
	(78, 'Johanna Carolin Rodriguez Casallas', 3, 0, 47, '48:16.1', '4:50/K', 43),
	(79, 'Alexandra Paola Barcelo Mendoza', 4, 0, 1, '49:04.8', '4:54/K', 43),
	(80, 'Yacelis Gomez Vasquez', 5, 0, 481, '49:20.2', '4:56/K', 43),
	(81, 'Urielkis', 1, 28, 512, '35:08.3', '3:31/K', 44),
	(82, 'Joel', 2, 30, 306, '35:42.7', '3:34/K', 44),
	(83, 'Jovany Martinez', 3, 34, 823, '38:21.1', '3:50/K', 44),
	(84, 'Ivan Dario', 4, 28, 127, '39:35.9', '3:58/K', 44),
	(85, 'Hugo Eliecer', 5, 19, 157, '39:58.0', '4:00/K', 44);
/*!40000 ALTER TABLE `tbl_competidor` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
