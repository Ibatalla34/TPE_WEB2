-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 03:57:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

CREATE TABLE `clubes` (
  `Id_Clubes` int(11) NOT NULL,
  `Equipo` varchar(100) NOT NULL,
  `Liga` varchar(100) NOT NULL,
  `Ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`Id_Clubes`, `Equipo`, `Liga`, `Ciudad`) VALUES
(1, 'Inter Miami', 'Major League Soccer', 'Miami'),
(2, 'Paris Saint-Germain  ', 'Ligue 1', 'Paris'),
(3, 'Manchester City ', 'Premier League', 'Manchester'),
(4, 'Real Madrid  ', 'Liga Española', 'Madrid'),
(5, 'Atlético de Madrid ', 'Liga Española', 'Madrid'),
(6, 'Barcelona ', 'Liga Española', 'Barcelona'),
(7, 'Liverpool ', 'Premier League', 'Liverpool');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `futbolistas`
--

CREATE TABLE `futbolistas` (
  `Id_Futbolistas` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Edad` int(100) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  `Id_Clubes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `futbolistas`
--

INSERT INTO `futbolistas` (`Id_Futbolistas`, `Nombre`, `Apellido`, `Edad`, `Pais`, `Id_Clubes`) VALUES
(1, 'Lionel ', 'Messi', 36, 'Argentina', 1),
(2, 'Kylian', 'Mbappé', 24, 'Francia', 2),
(3, 'Erling ', 'Haaland', 23, 'Noruega', 3),
(4, 'Julián  ', 'Alvarez', 23, 'Argentina', 3),
(5, 'Luka ', 'Modric', 38, 'Croacia', 4),
(6, 'Thibaut', 'Courtois', 31, 'Belgica', 4),
(7, 'Robert', 'Lewandowski', 35, 'Polonia', 6),
(8, 'Antoine', 'Griezmann', 32, 'Francia', 5),
(9, 'Kevin', 'De Bruyne', 32, 'Belgica', 3),
(10, 'Jude', 'Bellingham', 20, 'Inglaterra', 4),
(11, 'Mohamed', 'Salah', 31, 'Egipto', 7);

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_Usuarios` int(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO 'usuarios' ('Id_Usuarios', 'Nombre', 'Contraseña') VALUES
(1, 'webadmin', 'admin');

--
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`Id_Clubes`);

--
-- Indices de la tabla `futbolistas`
--
ALTER TABLE `futbolistas`
  ADD PRIMARY KEY (`Id_Futbolistas`),
  ADD KEY `Id_Clubes` (`Id_Clubes`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `futbolistas`
--
ALTER TABLE `futbolistas`
  ADD CONSTRAINT `futbolistas_ibfk_1` FOREIGN KEY (`Id_Clubes`) REFERENCES `clubes` (`Id_Clubes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
