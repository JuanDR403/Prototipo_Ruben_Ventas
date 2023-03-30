-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2023 a las 21:11:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coffe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafe`
--

CREATE TABLE `cafe` (
  `Id` bigint(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` int(5) NOT NULL,
  `peso` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cafe`
--

INSERT INTO `cafe` (`Id`, `foto`, `nombre`, `precio`, `peso`) VALUES
(1, 'cafe1.png', 'HOME-Cafe Mulato Orgánico', 17500, '2kg'),
(2, 'cafe2.jpg', 'Finca Loma - Café Green Hills', 20500, '3kg'),
(7, 'cafe3.png', 'La Vereda - Santander', 22000, '1 kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `nombre` text NOT NULL,
  `correo` varchar(55) NOT NULL,
  `contraseña` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `contraseña`) VALUES
(1, 'Brayan David', 'brayangarzon474@gmail.com', 'Brayan123.'),
(2, 'Juan Rico', 'morricito.cerquera@gmail.com', 'Rico123.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id` bigint(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio_unit` int(11) NOT NULL,
  `total` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id`, `nombre`, `cantidad`, `precio_unit`, `total`) VALUES
(3, 'HOME-Cafe Mulato Organico', 5, 17500, 87500),
(4, 'HOME-Cafe Mulato Organico', 4, 17500, 70000),
(5, 'Finca Loma - Café Green Hills', 3, 15500, 46500),
(6, 'HOME-Cafe Mulato Organico', 10, 17500, 175000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cafe`
--
ALTER TABLE `cafe`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
