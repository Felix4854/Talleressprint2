-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2024 a las 04:40:15
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_talleres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Idalumno` int(11) NOT NULL,
  `Iddetalle` int(11) DEFAULT NULL,
  `Non_alumno` varchar(50) DEFAULT NULL,
  `Ape_alumno` varchar(50) DEFAULT NULL,
  `Fec_na` date DEFAULT NULL,
  `Dni` varchar(10) DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `Tel_alum` varchar(15) DEFAULT NULL,
  `Dir_alum` varchar(100) DEFAULT NULL,
  `horario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`Idalumno`, `Iddetalle`, `Non_alumno`, `Ape_alumno`, `Fec_na`, `Dni`, `Sexo`, `Tel_alum`, `Dir_alum`, `horario`) VALUES
(1, 1, 'Carlos', 'Parker', '2002-01-01', '05884523', 'M', '123456789', 'Dirección 1', '08:00:00'),
(2, 2, 'Marcos', 'Alvarez', '2002-01-02', '08456213', 'F', '987654321', 'Dirección 2', '09:00:00'),
(3, 3, 'Juaquin ', 'Capetilla', '2002-01-02', '05845623', 'F', '987654321', 'Dirección 4', '09:00:00'),
(4, 4, 'Max', 'Montero', '2002-01-02', '71845623', 'F', '987654321', 'Dirección 5', '09:00:00'),
(5, 5, 'Emiliano', 'Salinas', '2002-01-02', '78456200', 'F', '987654321', 'Dirección 7', '09:00:00'),
(6, 6, 'Matias', 'Ross', '2002-01-02', '17845623', 'F', '987654321', 'Dirección 8', '09:00:00'),
(7, 0, 'ffff', 'dddd', '1985-10-01', '32424244', 'M', ' 55566666', ' hhhhh', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `Iddetalle` int(11) NOT NULL,
  `Idtaller` int(11) DEFAULT NULL,
  `Idprofe` int(11) DEFAULT NULL,
  `Horario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`Iddetalle`, `Idtaller`, `Idprofe`, `Horario`) VALUES
(0, 2, 7, '00:00:00'),
(1, 1, 1, '08:00:00'),
(2, 2, 2, '09:00:00'),
(3, 3, 3, '10:00:00'),
(4, 3, 7, '11:00:00'),
(5, 5, 5, '12:00:00'),
(6, 6, 6, '13:00:00'),
(7, 1, 7, '14:00:00'),
(8, 7, 8, '10:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `Idprofe` int(11) NOT NULL,
  `Nom_profe` varchar(50) DEFAULT NULL,
  `Ape_profe` varchar(50) DEFAULT NULL,
  `Dni` varchar(10) DEFAULT NULL,
  `Fec_nac` date DEFAULT NULL,
  `Sexo` char(1) DEFAULT NULL,
  `Tel_profe` varchar(15) DEFAULT NULL,
  `Dir_profe` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`Idprofe`, `Nom_profe`, `Ape_profe`, `Dni`, `Fec_nac`, `Sexo`, `Tel_profe`, `Dir_profe`) VALUES
(1, 'Ricardo', 'salas', '48454444', '2000-01-01', 'M', '999456789', 'Dirección 10'),
(2, 'Dennis ', 'Mendoza', '73028502', '2000-02-11', 'F', '987655521', 'Dirección 2'),
(3, 'Gonzalo ', 'Malaga', '63028111', '2000-03-08', 'F', '981154321', 'Dirección 3'),
(4, 'Alonso ', 'Martinez', '83022700', '2000-06-05', 'F', '900654321', 'Dirección 4'),
(5, 'David ', 'Parker', '030285000', '2000-11-12', 'F', '987652221', 'Dirección 5'),
(6, 'Renato', 'Rosales', '13020902', '2000-12-22', 'F', '987654366', 'Dirección 6'),
(7, 'Matias ', 'Ross', '53028345', '2000-04-17', 'M', '999456700', 'Dirección 7'),
(8, 'Juan ', 'Ramirez', '59028905', '1990-04-17', 'M', '990435799', 'Dirección 8'),
(9, 'Jorge Armando', 'Ortega Lara', '40899869', '1980-09-11', '2', '933322822', 'Jr. Huancavelica 3893 smp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) DEFAULT NULL,
  `rol` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Tecnico'),
(3, 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `Idtaller` int(11) NOT NULL,
  `Non_taller` varchar(50) DEFAULT NULL,
  `Cat_taller` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`Idtaller`, `Non_taller`, `Cat_taller`) VALUES
(0, 'dddd', 'BAILE'),
(1, 'futbol', 'DEPORTES'),
(2, 'Basquet', 'DEPORTE'),
(3, 'Tennis', 'DEPORTE'),
(4, 'Danza', 'BAILE'),
(5, 'Pintura', 'ARTE'),
(6, 'Voley 2', 'DEPORTES'),
(7, 'Surf', 'DEPORTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `password`, `fecha`, `rol`) VALUES
(12, 'Tecnico', 'usuario@gmail.com', '12345', '2024-02-06 03:21:41', 2),
(2, 'Administrador', 'admin@talleres.com', '123456', '2024-02-06 03:22:09', 1),
(14, 'Profesor', 'medico@xxx.com', '12345', '2024-02-02 23:36:57', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`Idalumno`),
  ADD KEY `Iddetalle` (`Iddetalle`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`Iddetalle`),
  ADD KEY `Idtaller` (`Idtaller`),
  ADD KEY `Idprofe` (`Idprofe`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Idprofe`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`Idtaller`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `Idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `Idprofe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`Iddetalle`) REFERENCES `detalles` (`Iddetalle`);

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`Idtaller`) REFERENCES `taller` (`Idtaller`),
  ADD CONSTRAINT `detalles_ibfk_2` FOREIGN KEY (`Idprofe`) REFERENCES `profesores` (`Idprofe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
