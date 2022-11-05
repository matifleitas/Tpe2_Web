-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2022 a las 17:35:16
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
-- Base de datos: `db_paragliders`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `category`) VALUES
(1, 'Tandem'),
(2, 'Tandem'),
(3, 'Acro'),
(4, 'Acro'),
(5, 'Cross Counrty'),
(6, 'Cross Counrty');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paraglider`
--

CREATE TABLE `paraglider` (
  `id_parapente` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(355) NOT NULL,
  `difficulty` varchar(45) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paraglider`
--

INSERT INTO `paraglider` (`id_parapente`, `name`, `description`, `difficulty`, `price`) VALUES
(1, 'Up-pop', 'Una mayor amortiguación y estabilidad mantienen la vela firme durante las diferentes fases de vuelo, incluso en las turbulencias.', 'Dificil', 2600),
(2, 'Icaro', 'Movimientos suaves, controlados y estables. Vela muy dócil y cómoda. Muy buen comportamiento en térmicas y giros. Amplio rango de frenado. Gran estabilidad en todas las fases del vuelo. Inflado progresivo y sencillo. Céntrate solo en aprender y divertirte.', 'Facil', 2750);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `paraglider`
--
ALTER TABLE `paraglider`
  ADD PRIMARY KEY (`id_parapente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `paraglider`
--
ALTER TABLE `paraglider`
  MODIFY `id_parapente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
