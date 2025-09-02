-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-09-2025 a las 05:59:19
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
-- Base de datos: `desarrollo_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquilinos`
--

CREATE TABLE `inquilinos` (
  `id` int(11) NOT NULL,
  `dpi` varchar(20) NOT NULL,
  `numero_casa` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inquilinos`
--

INSERT INTO `inquilinos` (`id`, `dpi`, `numero_casa`, `primer_nombre`, `primer_apellido`, `fecha_nacimiento`) VALUES
(1, '3015106870101', 4, 'Christopher', 'Cabrera', '2001-06-14'),
(2, '39898990773', 8, 'Gabriel', 'Valles', '2003-05-03'),
(3, '4834837847347', 10, 'Francisco', 'Mota', '1999-07-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_publicacion` datetime DEFAULT current_timestamp(),
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `contenido`, `fecha_publicacion`, `imagen`) VALUES
(1, '¡Q163 mil millones! Presupuesto para 2026 ya está en el Congreso para su discusión', 'El Congreso de Guatemala iniciará con el análisis del Presupuesto Nacional 2026. Descubre el detalle de los Q163 mil millones, la distribución de algunos ministerios y las instituciones que recibirán más recursos. Tal y como lo anunció el Gobierno, este lunes 1 de septiembre llegó al Congreso la iniciativa de ley que contiene el Presupuesto General de la Nación para el ejercicio fiscal 2026 y con ello, se inicia el proceso para determinar con cuánto dinero contará el Estado para su funcionamiento.', '2025-09-01 15:31:35', 'https://www.soy502.com/sites/default/files/styles/full_node/public/2025/Sep/01/congreso_presupuesto_2026_gobierno_2.png'),
(2, 'Insivumeh prevé tormentas para este lunes por la tarde y noche', 'Guatemala enfrentará un clima cálido y húmedo durante los primeros días de septiembre, con presencia de niebla o neblina en la mañana y lluvias por la tarde y noche, según informó el Instituto Nacional de Sismología, Vulcanología, Meteorología e Hidrología (Insivumeh). La entidad detalló que una zona de inestabilidad en Chiapas, México, y en el Pacífico centroamericano, junto con un sistema de baja presión, provocará lluvias con actividad eléctrica por la tarde, especialmente en el sur y centro del país.', '2025-09-01 15:31:35', 'https://www.soy502.com/sites/default/files/styles/full_node/public/2025/Sep/01/formato_imagen_susana_manai_36.png'),
(3, 'Corte de EE. UU. bloquea repatriación de cientos de niños guatemaltecos', 'Una jueza del Tribunal de Distrito de Estados Unidos para el Distrito de Columbia ordenó suspender por 14 días la deportación de más de 600 menores guatemaltecos que se encuentran bajo custodia de las autoridades migratorias. La medida incluye el traslado, repatriación, reubicación y transporte de los adolescentes. La decisión responde a una demanda presentada por el National Immigration Law Center (NILC), que representa a los menores en un proceso colectivo contra la Secretaría de Seguridad Nacional.', '2025-09-01 15:31:35', 'https://www.soy502.com/sites/default/files/styles/full_node/public/2025/Sep/01/formato_imagen_susana_manai_30.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagodecuotas`
--

CREATE TABLE `pagodecuotas` (
  `id` int(11) NOT NULL,
  `numero_casa` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `año` int(11) NOT NULL,
  `fecha_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedores`
--

CREATE TABLE `Proveedores` (
  `id` int(11) NOT NULL,
  `NIT` varchar(20) NOT NULL,
  `NombreCompleto` varchar(100) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FechaRegistro` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inquilinos`
--
ALTER TABLE `inquilinos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_casa` (`numero_casa`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagodecuotas`
--
ALTER TABLE `pagodecuotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numero_casa` (`numero_casa`);

--
-- Indices de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inquilinos`
--
ALTER TABLE `inquilinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagodecuotas`
--
ALTER TABLE `pagodecuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagodecuotas`
--
ALTER TABLE `pagodecuotas`
  ADD CONSTRAINT `pagodecuotas_ibfk_1` FOREIGN KEY (`numero_casa`) REFERENCES `inquilinos` (`numero_casa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
