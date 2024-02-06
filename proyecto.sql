-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-01-2021 a las 06:35:22
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL,
  `admin` varchar(45) DEFAULT NULL,
  `pw` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idadmin`, `admin`, `pw`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

DROP TABLE IF EXISTS `boletin`;
CREATE TABLE IF NOT EXISTS `boletin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

DROP TABLE IF EXISTS `cita`;
CREATE TABLE IF NOT EXISTS `cita` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `for_inmobiliaria` int(11) NOT NULL,
  `for_empleados` int(11) NOT NULL,
  `for_clientes` int(11) NOT NULL,
  PRIMARY KEY (`idcita`),
  KEY `for_inmobiliaria` (`for_inmobiliaria`),
  KEY `for_empleados` (`for_empleados`),
  KEY `for_clientes` (`for_clientes`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idcita`, `for_inmobiliaria`, `for_empleados`, `for_clientes`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `email` varchar(25) NOT NULL,
  `tel` int(10) NOT NULL,
  PRIMARY KEY (`idcita`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idclientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `edad` varchar(45) DEFAULT NULL,
  `usuario` varchar(60) NOT NULL,
  `pw` varchar(15) NOT NULL,
  `idpaquetes` int(11) DEFAULT NULL,
  PRIMARY KEY (`idclientes`),
  KEY `idpaquetes` (`idpaquetes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idclientes`, `nombre`, `apellidos`, `correo`, `direccion`, `telefono`, `edad`, `usuario`, `pw`, `idpaquetes`) VALUES
(1, 'Null', 'Null', 'Null', 'Null', 'Null', 'Null', '', '', 0),
(2, 'Carlos Alberto', 'Conchas MontaÃ±ez', 'correo@gmail.com', 'San Benito 33', '332425552', '20', 'Ca', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

DROP TABLE IF EXISTS `detalles`;
CREATE TABLE IF NOT EXISTS `detalles` (
  `iddetalles` int(11) NOT NULL AUTO_INCREMENT,
  `terrenom2` varchar(45) NOT NULL,
  `habitantes` varchar(45) NOT NULL,
  `banos` varchar(45) NOT NULL,
  `estacionamiento` varchar(45) NOT NULL,
  `cuarto_servicio` varchar(45) NOT NULL,
  `orientacion` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `conservacion` varchar(45) NOT NULL,
  `edadpropiedad` varchar(45) NOT NULL,
  `mantenimiento` varchar(45) NOT NULL,
  PRIMARY KEY (`iddetalles`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`iddetalles`, `terrenom2`, `habitantes`, `banos`, `estacionamiento`, `cuarto_servicio`, `orientacion`, `niveles`, `conservacion`, `edadpropiedad`, `mantenimiento`) VALUES
(2, '2x2', '3', '3', 'Si', 'No', 'No', '2', 'Si', '1', 'Si'),
(3, '22', '3', '3', 'Si', 'Si', 'Si', '2', 'Si', '1', 'Si'),
(4, '8x18', '7', '4', 'Si', 'Si', 'Si', '2', 'Si', '1', 'Si'),
(5, '8x14', '5', '2', 'Si', 'No', 'No', '2', 'Si', '2', 'No'),
(6, '15x20', '8', '5', 'Si', 'Si', 'Si', '2', 'Si', '1', 'Si'),
(7, '6x6', '2', '1', 'No', 'No', 'No', '1', 'Si', '1', 'Si'),
(8, '16x16', '100', '10', 'Si', 'Si', 'Si', '4', 'Si', '1', 'Si'),
(9, '15x15', '150', '150', 'Si', 'Si', 'Si', '4', 'Si', '2', 'Si'),
(10, '16x16', '8', '5', 'Si', 'Si', 'Si', '2', 'Si', '0', 'Si'),
(11, '7x14', '4', '2', 'Si', 'No', 'No', '2', 'Si', '0', 'Si'),
(12, '10x10', '7', '4', 'Si', 'No', 'Si', '1', 'Si', '2', 'Si'),
(13, '6x10', '4', '2', 'No', 'No', 'No', '2', 'No', '4', 'No'),
(14, '5x5', '2', '1', 'Si', 'Si', 'No', '1', 'Si', '3', 'Si'),
(15, '6x8', '4', '2', 'Si', 'Si', 'Si', '1', 'No', '1', 'Si'),
(16, '6x9', '4', '2', 'Si', 'Si', 'No', '1', 'No', '2', 'No'),
(17, '6x7', '3', '1', 'No', 'No', 'No', '1', 'Si', '1', 'Si'),
(19, '7x16', '5', '3', 'No', 'Si', 'Si', '2', 'Si', '5', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `idempleados` int(11) NOT NULL AUTO_INCREMENT,
  `nombreE` varchar(45) NOT NULL,
  `apellidoE` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `usuario` varchar(60) NOT NULL,
  `pw` varchar(15) NOT NULL,
  PRIMARY KEY (`idempleados`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idempleados`, `nombreE`, `apellidoE`, `correo`, `telefono`, `puesto`, `img`, `usuario`, `pw`) VALUES
(1, 'Carlos Alberto', 'Conchas Montañez', 'empleado1@hotmail.com', '33452467', 'Empleado', NULL, 'Carl', '1234'),
(2, 'Mariana Lizeth', 'Rodriguez', 'empleado2@hotmail.com', '33455213', 'oficinista', NULL, 'Mar', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmobilaria`
--

DROP TABLE IF EXISTS `inmobilaria`;
CREATE TABLE IF NOT EXISTS `inmobilaria` (
  `idinmobiliaria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreIn` varchar(45) NOT NULL,
  `descripcionIn` varchar(200) NOT NULL,
  `precioIn` varchar(45) NOT NULL,
  `direccionIn` varchar(45) NOT NULL,
  `etiqueta1` varchar(45) NOT NULL,
  `etiqueta2` varchar(45) NOT NULL,
  `etiqueta3` varchar(45) NOT NULL,
  `etiqueta4` varchar(45) NOT NULL,
  `etiqueta5` varchar(45) NOT NULL,
  `imgIn` varchar(45) NOT NULL,
  `destino` varchar(200) NOT NULL,
  `detalles_iddetalles` int(11) NOT NULL,
  `empleados_idempleados` int(11) NOT NULL,
  `clientes_idclientes` int(11) NOT NULL,
  `status` enum('ACEPTADO','DENEGADO','REVISION') NOT NULL,
  `comentarios` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idinmobiliaria`),
  KEY `detalles_iddetalles` (`detalles_iddetalles`),
  KEY `empleados_idempleados` (`empleados_idempleados`),
  KEY `clientes_idclientes` (`clientes_idclientes`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inmobilaria`
--

INSERT INTO `inmobilaria` (`idinmobiliaria`, `nombreIn`, `descripcionIn`, `precioIn`, `direccionIn`, `etiqueta1`, `etiqueta2`, `etiqueta3`, `etiqueta4`, `etiqueta5`, `imgIn`, `destino`, `detalles_iddetalles`, `empleados_idempleados`, `clientes_idclientes`, `status`, `comentarios`) VALUES
(1, 'Casa Minimalista', 'Bonita casa.', '$10000000', 'Ruben 1137', 'Casa', 'Compra', 'Sin amueblar', 'Vista-Urbana', 'Nuevo', 'casa.jpg', 'img/casa.jpg', 2, 1, 1, 'ACEPTADO', '...'),
(2, 'Casa Moderna', 'Bonita casa minimalista con ventanal en el frente.', '$5000000', 'Avenido SiempreViva 1212', 'Casa', 'Compra', 'Con piscina', 'Vista-Urbana', 'Nuevo', 'casa2.jpg', 'img/casa2.jpg', 3, 1, 1, 'ACEPTADO', '...'),
(3, 'Casa Amplia Moderna', 'Casa con doble cochera y con acabados modernos.', '$4000000', 'Santa Lucia 3456', 'De lujo', 'Compra', 'Amueblado', 'Vista-Urbana', 'Nuevo', 'casa3.jpg', 'img/casa3.jpg', 4, 1, 1, 'ACEPTADO', '...'),
(4, 'Casa Comun', 'Bonita casa de doble piso, ideal para una familia.', '$300000', 'Sebastian Marquez 1123', 'Casa', 'Compra', 'Sin amueblar', 'Vista-Rural', 'Usado', 'casa4.jpg', 'img/casa4.jpg', 5, 1, 1, 'ACEPTADO', '...'),
(5, 'Casa Gigante', 'Casa de extension grande ideal para una familia con lujos', '$4000000', 'Fraccionamiento San Martin 14', 'De lujo', 'Compra', 'Sin amueblar', 'Vista-Urbana', 'Usado', 'casa5.jpg', 'img/casa5.jpg', 6, 2, 1, 'ACEPTADO', '...'),
(6, 'Departamento Casual', 'Departamento pequeÃ±o, ideal para parejas.', '$2000', 'Avenido SiempreViva 1342', 'Departamento', 'Renta', 'Sin amueblar', 'Vista-Limitada', 'Usado', 'depa.jpg', 'img/depa.jpg', 7, 2, 1, 'ACEPTADO', '...'),
(7, 'Edificio Ejecutivo', 'Edificio con multiples oficinas, ideal para empresas start-up', '$3000000', 'Sebastian Marquez 4000', 'Edificio', 'Compra', 'Full', 'Vista-Urbana', 'Usado', 'edificio.jpg', 'img/edificio.jpg', 8, 2, 1, 'ACEPTADO', '...'),
(8, 'Edificio Departamental', 'Ideal para comenzar un negocio en bienes raices', '$5000000', 'Malecon 34', 'Edificio', 'Compra', 'Full', 'Vista-Urbana', 'Usado', 'edificio2.jpg', 'img/edificio2.jpg', 9, 2, 1, 'ACEPTADO', '...'),
(9, 'Casa Maravilla', 'Casa de lujo con piscina.', '$6000000', 'Puerta de Hierro 4567', 'De lujo', 'Compra', 'Sin amueblar', 'Vista-Urbana', 'Usado', 'casa.jpg', 'img/casa.jpg', 10, 1, 1, 'ACEPTADO', '...'),
(10, 'Mini Casa Blanca', 'Casa minimalista, ideal para cualquier presupuesto', '$1500000', 'Ruben Gomez Esqueda 4567', 'Casa', 'Compra', 'Amueblado', 'Vista-Limitada', 'Nuevo', 'casa2.jpg', 'img/casa2.jpg', 11, 2, 1, 'ACEPTADO', '...'),
(11, 'Casa MontaÃ±osa', 'Casa situada en la montaÃ±a, totalmente al aire libre', '$3000000', 'Sebastian Marquez 2000', 'De lujo', 'Compra', 'Amueblado', 'Vista-Rural', 'Usado', 'casa3.jpg', 'img/casa3.jpg', 12, 1, 1, 'ACEPTADO', '...'),
(12, 'Casa Sencilla', 'Casa sencilla ubicada en los suburbios', '$800000', 'Avenido SiempreViva 3333', 'Casa', 'Compra', 'Sin amueblar', 'Vista-Limitada', 'Usado', 'casa4.jpg', 'img/casa4.jpg', 13, 1, 1, 'ACEPTADO', '...'),
(13, 'Departamento Iguales', 'Apartamento ubicados cerca del centro, ideal para personas urbanas', '$3000', 'Santa Lucia 3590', 'Departamento', 'Renta', 'Sin amueblar', 'Vista-Urbana', 'Usado', 'dep.jpg', 'img/dep.jpg', 14, 1, 1, 'ACEPTADO', '...'),
(14, 'Departamento Lujoso', 'Gran departamento de lujo con ventanales de cristal y acabado rusticos.', '$10000', 'Fraccionamiento San Martin 13', 'Departamento', 'Renta', 'Sin amueblar', 'Vista-Limitada', 'Nuevo', 'dep2.jpg', 'img/dep2.jpg', 15, 1, 1, 'ACEPTADO', '...'),
(15, 'Departamento Simple', 'Departamento ideal una familia que busca un hogar', '$8000', 'Santa Lucia 1200', 'Departamento', 'Renta', 'Amueblado', 'Vista-Rural', 'Usado', 'dep3.jpg', 'img/dep3.jpg', 16, 2, 1, 'ACEPTADO', '...'),
(16, 'Departamento Tropical', 'Departamento ubicados en una zona tropical con mucho turismo', '$10000', 'Ruben Gomez 4567', 'Departamento', 'Renta', 'Sin amueblar', 'Vista-Rural', 'Usado', 'dep4.jpg', 'img/dep4.jpg', 17, 2, 1, 'ACEPTADO', '...'),
(19, 'Casa Rural', 'Bonita casa en el campo, mucha tranquilidad', '$1500000', 'Las Alamedas #13', 'Rurales', 'Renta', 'Sin amueblar', 'Vista-Rural', 'Nuevo', 'ru.jpg', 'img/ru.jpg', 19, 1, 1, 'ACEPTADO', '...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `idpagos` int(11) NOT NULL AUTO_INCREMENT,
  `idpaquetes` int(11) NOT NULL,
  `idclientes` int(11) NOT NULL,
  `FechaCompraP` date NOT NULL,
  `FechaVenP` date NOT NULL,
  PRIMARY KEY (`idpagos`),
  KEY `idclientes` (`idclientes`),
  KEY `idpaquetes` (`idpaquetes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
CREATE TABLE IF NOT EXISTS `paquetes` (
  `idpaquetes` int(11) NOT NULL AUTO_INCREMENT,
  `nombreP` varchar(40) DEFAULT NULL,
  `meses` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `casasP` int(11) NOT NULL,
  PRIMARY KEY (`idpaquetes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`idpaquetes`, `nombreP`, `meses`, `precio`, `casasP`) VALUES
(0, 'NingÃºn Paquete', 0, 0, 0),
(1, 'Basico', 1, 3000, 2),
(2, 'Bienes raices', 2, 6000, 8),
(3, 'Premiun', 3, 10000, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscriptor`
--

DROP TABLE IF EXISTS `subscriptor`;
CREATE TABLE IF NOT EXISTS `subscriptor` (
  `idsubscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `FechaCompra` date DEFAULT NULL,
  `FechaVencimiento` date DEFAULT NULL,
  `RFC` varchar(60) NOT NULL,
  `idclientes` int(11) NOT NULL,
  PRIMARY KEY (`idsubscripcion`),
  KEY `idclientes` (`idclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`idpaquetes`) REFERENCES `paquetes` (`idpaquetes`);

--
-- Filtros para la tabla `inmobilaria`
--
ALTER TABLE `inmobilaria`
  ADD CONSTRAINT `inmobilaria_ibfk_1` FOREIGN KEY (`detalles_iddetalles`) REFERENCES `detalles` (`iddetalles`),
  ADD CONSTRAINT `inmobilaria_ibfk_2` FOREIGN KEY (`empleados_idempleados`) REFERENCES `empleados` (`idempleados`),
  ADD CONSTRAINT `inmobilaria_ibfk_3` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idclientes`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idclientes`) REFERENCES `clientes` (`idclientes`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idpaquetes`) REFERENCES `paquetes` (`idpaquetes`);

DELIMITER $$
--
-- Eventos
--
DROP EVENT `fecha`$$
CREATE DEFINER=`root`@`localhost` EVENT `fecha` ON SCHEDULE EVERY 1 DAY STARTS '2020-12-02 21:02:31' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM subscriptor WHERE DATE(FechaVencimiento)>CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
