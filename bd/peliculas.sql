-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2019 a las 23:04:21
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `clavedirector` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`clavedirector`, `nombre`) VALUES
(14, 'moha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirigido_por`
--

CREATE TABLE `dirigido_por` (
  `clavepelicula` int(11) NOT NULL,
  `clavedirector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dirigido_por`
--

INSERT INTO `dirigido_por` (`clavepelicula`, `clavedirector`) VALUES
(2, 14),
(3, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `clavegenero` smallint(6) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`clavegenero`, `nombre`) VALUES
(8, 'amor'),
(9, 'sxfczc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `clavepelicula` int(11) NOT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `idioma` varchar(15) DEFAULT NULL,
  `formato` varchar(15) DEFAULT NULL,
  `categoria` char(1) DEFAULT NULL,
  `claveproductora` smallint(6) DEFAULT NULL,
  `portada` varchar(60) DEFAULT NULL,
  `sinopsis` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`clavepelicula`, `titulo`, `idioma`, `formato`, `categoria`, `claveproductora`, `portada`, `sinopsis`) VALUES
(2, 'vengadoress', 'Spanish', 'imax', NULL, 10, 'descarga (1).png', 'la hust'),
(3, 'vengadors3', 'Spanish', 'fdgfdg', NULL, 10, '', 'qsdsds'),
(5, 'pelione', 'Spanish', 'blueray', NULL, NULL, 'fae.jpg', 'one');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productora`
--

CREATE TABLE `productora` (
  `claveproductora` smallint(6) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `pais` varchar(60) DEFAULT NULL,
  `cif` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productora`
--

INSERT INTO `productora` (`claveproductora`, `nombre`, `pais`, `cif`) VALUES
(10, 'productoraone', 's', '621545987');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trata`
--

CREATE TABLE `trata` (
  `clavepelicula` int(11) NOT NULL,
  `clavegenero` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trata`
--

INSERT INTO `trata` (`clavepelicula`, `clavegenero`) VALUES
(2, 8),
(3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `claveusuarios` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `apellido1` varchar(15) DEFAULT NULL,
  `apellido2` varchar(15) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `nick` varchar(20) DEFAULT NULL,
  `ciudad` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `estado` char(10) DEFAULT NULL,
  `rol` char(15) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`claveusuarios`, `nombre`, `apellido1`, `apellido2`, `pass`, `nick`, `ciudad`, `telefono`, `estado`, `rol`, `foto`) VALUES
(44, 'mohamed', 'mohand', 'mohand', 'admin1', 'admin1', NULL, '952680738', 'Activo', 'admin', NULL),
(45, 'user', 'apellido', 'apellidodos', 'user1', 'user1', NULL, '952680738', 'Activo', 'usuario', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`clavedirector`);

--
-- Indices de la tabla `dirigido_por`
--
ALTER TABLE `dirigido_por`
  ADD KEY `clavepelicula` (`clavepelicula`),
  ADD KEY `clavedirector` (`clavedirector`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`clavegenero`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`clavepelicula`),
  ADD KEY `claveproductora` (`claveproductora`);

--
-- Indices de la tabla `productora`
--
ALTER TABLE `productora`
  ADD PRIMARY KEY (`claveproductora`);

--
-- Indices de la tabla `trata`
--
ALTER TABLE `trata`
  ADD KEY `clavepelicula` (`clavepelicula`),
  ADD KEY `clavegenero` (`clavegenero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`claveusuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `claveusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dirigido_por`
--
ALTER TABLE `dirigido_por`
  ADD CONSTRAINT `dirigido_por_ibfk_1` FOREIGN KEY (`clavepelicula`) REFERENCES `pelicula` (`clavepelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dirigido_por_ibfk_2` FOREIGN KEY (`clavedirector`) REFERENCES `director` (`clavedirector`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`claveproductora`) REFERENCES `productora` (`claveproductora`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `trata`
--
ALTER TABLE `trata`
  ADD CONSTRAINT `trata_ibfk_1` FOREIGN KEY (`clavepelicula`) REFERENCES `pelicula` (`clavepelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trata_ibfk_2` FOREIGN KEY (`clavegenero`) REFERENCES `genero` (`clavegenero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
