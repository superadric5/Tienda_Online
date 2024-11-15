-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 13:43:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `nickname`, `password`, `telefono`, `domicilio`) VALUES
(1, 'Carlos', 'González', 'carlosg', 'pass123', '123456789', 'Calle 123'),
(2, 'Ana', 'Pérez', 'anap', 'pass456', '987654321', 'Avenida 456'),
(3, 'Luis', 'Martínez', 'luism', 'pass789', '555555555', 'Boulevard 789'),
(7, 'Marcos', 'Pedroche', 'marcospp', 'Holamarcos9', '699711099', 'Madrid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `cliente_id`, `url`) VALUES
(12, 'HP EliteBook 850 G6 i5-8265U 256GB', 'Portatil HP EliteBook 850 G6 i5-8265U 256GB', 361.29, NULL, '../Recursos/img/Subidas/hp.jpg'),
(13, 'Monitor PC 60,4 cm (23,8\') LG 24MR400-B', 'Monitor PC 60,4 cm (23,8\') LG 24MR400-B', 89.99, NULL, '../Recursos/img/Subidas/monitor1.webp'),
(14, 'Final Fantasy VIII PlayStation 1', 'Final Fantasy VIII PlayStation 1', 20.00, NULL, '../Recursos/img/Subidas/ff8.avif'),
(15, 'Ordenador Portatil 15.6\' FHD', 'Ordenador Portatil 15.6\' FHD', 519.00, NULL, '../Recursos/img/Subidas/lenovo.jpg'),
(16, 'Trust Verto Raton Vertical, Raton Ergonomico', 'Trust Verto Raton Vertical, Raton Ergonomico', 88.99, NULL, '../Recursos/img/Subidas/ratonErgonomico.jpg'),
(17, 'Metronic 477129 - Radio CD portátil con Bluetooth', 'Metronic 477129 - Radio CD portátil con Bluetooth', 39.99, NULL, '../Recursos/img/Subidas/radiocasette.jpg'),
(18, 'Pack: PS3 Slim 160GB + Dual Shock 3', 'Pack: PS3 Slim 160GB + Dual Shock 3', 90.10, NULL, '../Recursos/img/Subidas/ps3.webp'),
(19, 'Work Intel Core I7-12700 1TB SSD', 'Ordenador sobremesa Work Intel Core I7-12700 1TB SSD', 829.00, NULL, '../Recursos/img/Subidas/torre1.webp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
