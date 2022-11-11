-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2022 a las 13:25:45
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
-- Base de datos: `eagle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrator`
--

INSERT INTO `administrator` (`id_admin`, `email`, `password`) VALUES
(2, 'matias.fleitas@gmail.com', '$2a$12$icl51ZmZpXBn6sKWBix6nOGtlEXOszLZsY9EIGsSqfYg.QGftJmiG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_category` int(11) NOT NULL,
  `type_paraglider` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_category`, `type_paraglider`) VALUES
(1, 'Acro'),
(2, 'Tandem'),
(3, 'Cross Country'),
(4, 'Speed Flying'),
(5, 'Speed Riding');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_products`
--

CREATE TABLE `comments_products` (
  `id_comment` int(11) NOT NULL,
  `name_user` varchar(45) NOT NULL,
  `comments` varchar(355) NOT NULL,
  `id_parapente_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments_products`
--

INSERT INTO `comments_products` (`id_comment`, `name_user`, `comments`, `id_parapente_fk`) VALUES
(4, 'Juan', 'Me parecion un buen producto', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parapentes`
--

CREATE TABLE `parapentes` (
  `id_parapente` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(355) NOT NULL,
  `difficulty` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `id_category_fk` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parapentes`
--

INSERT INTO `parapentes` (`id_parapente`, `name`, `description`, `difficulty`, `price`, `id_category_fk`, `image`) VALUES
(2, 'Zeta', 'Una mayor amortiguación y estabilidad mantienen la vela firme durante las diferentes fases de vuelo, incluso en las turbulencias.\n', 'Medio', 2500, 2, 'images/634c908d3d2b3.jpg.jpeg.png'),
(3, 'Icaro', 'Movimientos suaves, controlados y estables. Vela muy dócil y cómoda. Muy buen comportamiento en térmicas y giros. Amplio rango de frenado. Gran estabilidad en todas las fases del vuelo. Inflado progresivo y sencillo. Céntrate solo en aprender y divertirte.\n\n', 'Facil', 2950, 1, 'images/634c910e41a90.jpg.jpeg.png'),
(4, 'Acronimator', 'Atrévete con tus primeras largas distancias y hazlo bajo la seguridad y el control de una vela EN-B de alto rendimiento. Completa tu fase de aprendizaje con una vela que te da la opción de perfeccionar tus habilidades y ganar confianza vuelo tras vuelo.', 'Facil', 3200, 3, 'images/634c98e622c36.jpg.jpeg.png'),
(5, 'Shey', 'La combinación de un alto rango de velocidades y de un planeo eficientemente impecable te permitirán ir un paso por delante de los demás en todas las competiciones.', 'Dificil', 3200, 5, 'images/634c92b3a8504.jpg.jpeg.png'),
(6, 'Buzzard', 'Su versatilidad te permitirá acceder a todo tipo de aventuras: Vuela en térmicas y en condiciones de viento sin comprometer tu seguridad y confort. Además, su ligereza y capacidad para despegar en todo tipo de terrenos darán un plus a tus aventuras de Hike & Fly.', 'Dificil', 2800, 4, 'images/634c979f75b68.jpg.jpeg.png'),
(7, 'Artik', 'Pilotaje fácil e intuitivo. Vela muy dócil y cómoda. Gran estabilidad en todas las fases del vuelo. Maniobrabilidad simple sin precedentes. Ergonomía y confort sin igual. Nuevo diseño modernizado. Tecnología Eagle aplicada. Seguridad pasiva total. Factibilidad al 100%.', 'Facil', 3200, 3, 'images/634c9462b2d2c.jpg.jpeg.png'),
(8, 'Walis', 'La nueva y revolucionaria estructura reforzada permite reducir enormemente el número de líneas. El uso de materiales semi light la convierten en una vela ligera pero a la vez muy duradera. Mucho más eficaz en condiciones de aire turbulento, afrontando viento en contra y recorriendo kilómetros. A diferencia de otras velas monocapa.', 'Medio', 2680, 2, 'images/634c96c719563.jpg.jpeg.png'),
(9, 'Intox', 'Altas prestaciones que van de la mano con el concepto súper-ligero para crear la vela perfecta para la competición. Superará todas las expectativas de aquellos pilotos que tengan unas ganas de aventuras insaciables. Los mandos tienen respuesta inmediata, directa y precisa. Máximo control y eficiencia en todas las fases del vuelo, incluso realizando desp', 'Facil', 2700, 1, 'images/634c95d1d27c4.jpg.jpeg.png'),
(10, 'Roller', 'Es una máquina de alto rendimiento, perfecta para despegues y aterrizajes complicados. El ala es sólida y eficiente incluso en turbulencias.  Recorre largas distancias con una vela evolucionada en términos de planeo y rendimiento en térmicas.', 'Medio', 2500, 4, 'images/634c986696776.jpg.jpeg.png'),
(11, 'Up-pop', 'Vela de dificl pilotaje pero con mayor porcentaje de buenas maniobras acrobaticas, perfecta para el tipo de vela Speed Riding.', 'Dificil', 2500, 5, 'images/634cbfc21ca45.jpg.jpeg.png'),
(19, 'Hook', 'Pilotaje fácil e intuitivo. Buena vela para principiantes ', 'Facil', 2700, 2, NULL),
(22, 'Olpo', 'Olpo es una vela de alto rendimiento y comepeticion', 'Dificil', 3100, 2, NULL),
(28, 'Prince', 'Pilotaje avanzado y alto rendimiento', 'Dificil', 2900, 4, 'sssd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `comments_products`
--
ALTER TABLE `comments_products`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_parapente_fk` (`id_parapente_fk`);

--
-- Indices de la tabla `parapentes`
--
ALTER TABLE `parapentes`
  ADD PRIMARY KEY (`id_parapente`),
  ADD KEY `id_category_fk` (`id_category_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comments_products`
--
ALTER TABLE `comments_products`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `parapentes`
--
ALTER TABLE `parapentes`
  MODIFY `id_parapente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments_products`
--
ALTER TABLE `comments_products`
  ADD CONSTRAINT `comments_products_ibfk_1` FOREIGN KEY (`id_parapente_fk`) REFERENCES `parapentes` (`id_parapente`);

--
-- Filtros para la tabla `parapentes`
--
ALTER TABLE `parapentes`
  ADD CONSTRAINT `parapentes_ibfk_1` FOREIGN KEY (`id_category_fk`) REFERENCES `categoria` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
