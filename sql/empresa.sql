-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2015 a las 21:20:06
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empresa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` tinyint(7) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombres`, `ciudad`, `sexo`, `telefono`, `fecha_nacimiento`) VALUES
(25, 'sssssss', '3', 'M', '123123', '2015-04-12 00:00:00'),
(26, 'fer', 'fer', 'M', '23', '2015-04-12 00:00:00'),
(27, 'toshiba', 'scz', 'F', '44444', '2015-04-12 00:00:00'),
(7, 'fer', 'fer', 'M', '123', '2015-04-12 00:00:00'),
(9, 'adfasf', 'asdfa', 'M', '123123', '2015-04-12 00:00:00'),
(41, '', '', 'u', '', '2015-04-12 00:00:00'),
(42, 'dddddd', 'ddddd', 'M', '333333', '2015-04-12 00:00:00'),
(43, 'qqqq', 'qqqq', 'F', '4444', '2015-04-12 00:00:00'),
(44, 'ttttt', 'ttttt', 'F', '6262', '2015-04-13 00:00:00'),
(36, 'qw', 'qw', 'F', '2', '2015-04-12 00:00:00'),
(37, 'juan carlos sanchez', 'argentina', 'F', '234234', '2015-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serdocente`
--

CREATE TABLE IF NOT EXISTS `serdocente` (
  `docodigo` int(11) NOT NULL,
  `donombre` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `doexperiencia` int(11) NOT NULL,
  `docodpai` int(11) NOT NULL,
  `docodest` char(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`docodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `serdocente`
--

INSERT INTO `serdocente` (`docodigo`, `donombre`, `doexperiencia`, `docodpai`, `docodest`) VALUES
(53, 'Toshiba CI', 50, 5, '10003'),
(54, 'magdalena', 3, 3, '10002'),
(55, 'daneli', 3, 2, '10003'),
(56, 'juan carlos', 3, 2, '10002'),
(58, 'Fernando Arispe Cadiz', 3, 1, '10003'),
(59, 'daniel pesce', 10, 5, '10001'),
(63, 'teresa', 33, 1, '10001'),
(64, 'fasdfas', 3, 1, '10001'),
(65, 'asda', 2, 1, '10001'),
(66, 'ffff', 2, 1, '10001'),
(67, 'dfsdf', 3, 1, '10001'),
(68, 'sdfsd', 3, 1, '10001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serestado`
--

CREATE TABLE IF NOT EXISTS `serestado` (
  `escodigo` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `esdescri` char(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`escodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `serestado`
--

INSERT INTO `serestado` (`escodigo`, `esdescri`) VALUES
('10001', 'VIGENTE'),
('10002', 'NO VIGENTE'),
('10003', 'ANULADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serpais`
--

CREATE TABLE IF NOT EXISTS `serpais` (
  `pacodigo` int(11) NOT NULL,
  `panombrepais` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL,
  `panombrenacionalidad` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`pacodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `serpais`
--

INSERT INTO `serpais` (`pacodigo`, `panombrepais`, `panombrenacionalidad`) VALUES
(1, 'ARGENTINA', 'ARGENTINA'),
(2, 'BOLIVIA', 'BOLIVIANA'),
(3, 'BRASIL', 'BRASILEÑA'),
(4, 'CHILE', 'CHILENA'),
(5, 'ECUADOR', 'ECUATORIANA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE IF NOT EXISTS `tblusuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) NOT NULL,
  `strUsuario` varchar(30) NOT NULL,
  `strPassword` varchar(30) NOT NULL,
  `intEstado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`id_usuario`, `strNombre`, `strUsuario`, `strPassword`, `intEstado`) VALUES
(1, 'Jose Alfredo', 'Alfredo', 'alfredo', 1),
(2, 'Jose', 'jose', 'jose', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(180) DEFAULT NULL,
  `password` varchar(180) DEFAULT NULL,
  `email` varchar(180) DEFAULT NULL,
  `id_extreme` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `username`, `password`, `email`, `id_extreme`) VALUES
(1, 'root', 'toor5', 'nn', NULL),
(2, 'fer', '542adaa43a216e3f950d5025ebe8bc4d', 'ferchinho18@hotmail.com', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
