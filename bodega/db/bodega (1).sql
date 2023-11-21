-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 22:34:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bodega`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_producto` int(30) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `cantidad` int(200) NOT NULL,
  `fecha_entrega` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_producto`, `nombre`, `cantidad`, `fecha_entrega`) VALUES
(1, 'Arroz Roa\r\n', 20, '2023-11-18 14:25:21'),
(2, 'Botella de agua Brisa\r\n', 15, '2023-10-31 08:14:30'),
(3, 'Leche Alkeria\r\n', 30, '2023-11-19 09:36:27'),
(4, 'Salchichas Ranchera\r\n', 18, '2023-11-04 03:37:26'),
(5, 'Pastas La Muñeca\r\n', 10, '2023-11-16 20:30:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(20) NOT NULL,
  `codigo_producto` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(35) NOT NULL,
  `precio` float NOT NULL,
  `fecha_entrada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `codigo_producto`, `nombre`, `cantidad`, `precio`, `fecha_entrada`) VALUES
(0, 1, 'Blue lebel', 50, 15000, '2024-11-15 10:52:23'),
(0, 7, 'Doritos', 50, 2000, '2023-11-21 16:08:23'),
(0, 7, 'Doritos', 20, 2000, '2023-11-21 16:08:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo_producto` int(100) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_producto`, `nombre`, `precio`, `cantidad`) VALUES
(1, 'Arroz Roa', 1500, 20),
(2, 'Botella de agua Brisa\r\n', 1000, 15),
(3, 'Leche Alkeria\r\n', 3200, 30),
(4, 'Salchichas Ranchera\r\n', 5500, 18),
(5, 'Pastas La Muñeca', 2000, 10),
(0, 'Doritos', 2000, -26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id_salida` int(20) NOT NULL,
  `codigo_producto` int(20) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(35) NOT NULL,
  `precio` int(50) NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
