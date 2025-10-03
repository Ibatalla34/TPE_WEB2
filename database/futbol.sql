-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2025 a las 21:46:35
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `fundacion` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `pais`, `ciudad`, `fundacion`) VALUES
(1, 'barcelona', 'españa', 'barcelona', '1999'),
(2, 'real madrid', 'españa', 'madrid', '1999'),
(3, 'inter de milan', 'italia', 'milan', '2000'),
(4, 'juventus', 'italia', 'turin', '2001'),
(5, 'bayern munich', 'alemania', 'munich', '2000'),
(6, 'borussia dortmund', 'alemania', 'dortmund', '2002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `id_equipos` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `pais` varchar(40) NOT NULL,
  `pierna_buena` varchar(3) NOT NULL,
  `posicion` varchar(2) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `altura` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `id_equipos`, `nombre`, `pais`, `pierna_buena`, `posicion`, `fecha_nacimiento`, `altura`) VALUES
(1, 1, 'lamine yamal', 'españa', 'izq', 'EI', '2007-07-13', 1.8),
(2, 1, 'lewandowski', 'polonia', 'der', 'DC', '1998-08-21', 1.85),
(3, 2, 'Mbappe', 'francia', 'der', 'DC', '1998-12-20', 1.8),
(4, 3, 'Lautaro Martinez', 'argentina', 'der', 'DC', '1997-08-21', 1.74),
(5, 2, 'mastantuono', 'argentina', 'izq', 'ED', '2007-08-14', 1.77),
(6, 3, 'sommer', 'suiza', 'der', 'PO', '1988-12-17', 1.83),
(7, 4, 'McKennie', 'Estados Unidos', 'der', 'MC', '1998-08-28', 1.85),
(8, 4, 'conceicao', 'portugal', 'izq', 'ED', '2002-12-14', 1.7),
(9, 5, 'Neuer', 'alemania', 'der', 'PO', '0000-00-00', 1.93),
(10, 5, 'Kane', 'inglaterra', 'der', 'DC', '1993-07-28', 1.88),
(11, 6, 'adeyemi', 'alemania', 'izq', 'ED', '2002-07-01', 1.8),
(12, 6, 'Sabitzer', 'Austria', 'der', 'MC', '2003-07-24', 1.78);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipos` (`id_equipos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_equipos`) REFERENCES `equipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
