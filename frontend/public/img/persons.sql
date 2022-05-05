-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2022 a las 18:18:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `amoba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--

CREATE TABLE `persons` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ima_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_person` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persons`
--

INSERT INTO `persons` (`id`, `first_name`, `last_name`, `document`, `ima_profile`, `type_person`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-05 17:52:54', '2022-05-05 17:52:54'),
(4, 'Alfredo', 'Geraldo', '123456789', 'default.png', '0', '2022-05-04 22:11:31', '2022-05-04 22:14:24', '2022-05-04 22:14:24'),
(5, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL),
(6, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL),
(7, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL),
(8, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL),
(9, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL),
(10, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL),
(11, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL),
(12, 'Iván Fabricio ', 'Cordero Pauta', '123456788', 'default.png', '0', '2022-05-04 21:46:09', '2022-05-04 21:46:09', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
