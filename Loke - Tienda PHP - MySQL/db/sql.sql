-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- Versión:             	     10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para loke
CREATE DATABASE IF NOT EXISTS `loke` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `loke`;

-- Volcando estructura para tabla loke.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `detalle` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `imagen_alt` varchar(250) NOT NULL,
  `precio` int(11) NOT NULL,
  `usuarios_idusuarios` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idproductos`),
  KEY `fk_productos_usuarios_idx` (`usuarios_idusuarios`),
  CONSTRAINT `fk_productos_usuarios` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla loke.productos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
REPLACE INTO `productos` (`idproductos`, `nombre`, `detalle`, `descripcion`, `imagen`, `imagen_alt`, `precio`, `usuarios_idusuarios`) VALUES
	(1, 'Apple Watch Series 3', 'En oferta! Alto: 38,6 mmAncho: 33,3 mmGrosor: 11,4 mmPeso de la caja (GPS): 26,7 g', 'Guarda tus canciones favoritas. O escucha más de 70 millones con Apple Music. Obtén datos de tus entrenamientos con lujo de detalles.', 'apple_wath_serie_se.jpg', 'Apple Watch Series 3', 1300, 1),
	(2, 'Apple Watch Series 6', 'En oferta! Apple Watch Series 6 GPS 40mm.', 'El Apple Watch Series 6 se adelanta a su tiempo con una app y un sensor revolucio\\u00adnarios capaces de medir tu ox\\u00edgeno en sangre. Hazte un electro en cualquier momento y ten a mano tus datos de actividad gracias a la pantalla Retina siempre activa. Este reloj te ayudar\\u00e1 a llevar una vida sana, activa y conectada con todo lo que te importa.\\n\\n.', 'apple_watch.jpg', 'Apple Watch Series 6', 2440, 1),
	(3, 'Apple Watch Nike', 'En oferta!  Te ayuda hacer más.Por menos de lo que crees.', 'Es un smartwatch WatchOS con procesador mediano de 1Ghz Dual-Core que realiza bien las funciones del Apple Watch 3 Nike+ (42mm). Gran conectividad de este terminal que incluye Bluetooth 4.2 + A2DP, WiFi 802.11 b/g/n (2.4Ghz) y NFC para realizar pagos y permite la conexión a otros terminales.', 'apple_watch_nike.jpg', 'Apple Watch Nike', 3200, 1),
	(4, 'Apple Watch SE', 'Una buena oferta! Quedu00f3 a una victoria y media de clasificar a los playoff.', 'Una amplia pantalla Retina para ver más en un vistazo, sensores avanzados para registrar todos tus movimientos e increíbles funcionalidades de salud y seguridad. Apple Watch SE. Es mucho más que un reloj y está más a tu alcance.', 'apple_watch_se.jpg', 'Apple Watch SE', 990, 1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla loke.productos_has_tags
CREATE TABLE IF NOT EXISTS `productos_has_tags` (
  `productos_idproductos` int(10) unsigned NOT NULL,
  `tags_idtags` int(10) unsigned NOT NULL,
  PRIMARY KEY (`productos_idproductos`,`tags_idtags`),
  KEY `fk_productos_has_tags_tags1_idx` (`tags_idtags`),
  KEY `fk_productos_has_tags_productos1_idx` (`productos_idproductos`),
  CONSTRAINT `fk_productos_has_tags_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_productos_has_tags_tags1` FOREIGN KEY (`tags_idtags`) REFERENCES `tags` (`idtags`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla loke.productos_has_tags: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `productos_has_tags` DISABLE KEYS */;
REPLACE INTO `productos_has_tags` (`productos_idproductos`, `tags_idtags`) VALUES
	(1, 1),
	(2, 1),
	(4, 1),
	(2, 2),
	(3, 2),
	(2, 3),
	(1, 4),
	(3, 4),
	(4, 4),
	(1, 5);
/*!40000 ALTER TABLE `productos_has_tags` ENABLE KEYS */;

-- Volcando estructura para tabla loke.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `idtags` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idtags`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla loke.tags: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
REPLACE INTO `tags` (`idtags`, `nombre`) VALUES
	(1, 'En Oferta'),
	(2, 'Nuevo'),
	(3, 'Sumergible'),
	(4, 'Última generación'),
	(5, 'Wifi');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Volcando estructura para tabla loke.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla loke.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`idusuarios`, `email`, `password`) VALUES
	(1, 'usuario1@gmail.com', '$2y$10$jtPHMLCYb.2IDvCL3ZuhOer5KNH9xwJzr4hcWxu0irdQY.eliwgPq');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
