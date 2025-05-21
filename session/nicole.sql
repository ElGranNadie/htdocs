-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2025 a las 02:56:51
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
-- Base de datos: `nicole`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acido_grasos`
--

CREATE TABLE `acido_grasos` (
  `idAcido_grasos` int(11) NOT NULL,
  `Saturados_g` int(11) DEFAULT NULL,
  `Polinsaturados_g` int(11) DEFAULT NULL,
  `Monoinsaturados_g` int(11) DEFAULT NULL,
  `colesterol_mg` int(11) DEFAULT NULL,
  `trans_g` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acido_grasos`
--

INSERT INTO `acido_grasos` (`idAcido_grasos`, `Saturados_g`, `Polinsaturados_g`, `Monoinsaturados_g`, `colesterol_mg`, `trans_g`) VALUES
(1, 2, 6, 3, 8, 0),
(2, 0, 0, 0, 332, 0),
(3, 2, 1, 2, 201, 0),
(4, 2, 5, 4, 20, 0),
(5, 3, 2, 2, 94, 0),
(6, 3, 1, 2, 83, 0),
(7, 2, 5, 5, 39, 0),
(8, 1, 2, 1, 26, 0),
(9, 1, 2, 1, 8, 0),
(10, 1, 2, 1, 0, 0),
(11, 0, 3, 1, 1, 0),
(12, 3, 6, 4, 7, 0),
(13, 1, 0, 0, 21, 0),
(14, 2, 4, 3, 70, 0),
(15, 0, 1, 1, 12, 0),
(16, 1, 1, 1, 22, 0),
(17, 1, 1, 1, 31, 0),
(18, 1, 3, 2, 0, 0),
(19, 2, 6, 3, 8, 0),
(20, 0, 0, 0, 332, 0),
(21, 2, 1, 2, 201, 0),
(22, 2, 5, 4, 20, 0),
(23, 3, 2, 2, 94, 0),
(24, 3, 1, 2, 83, 0),
(25, 2, 5, 5, 39, 0),
(26, 1, 2, 1, 26, 0),
(27, 1, 2, 1, 8, 0),
(28, 1, 2, 1, 0, 0),
(29, 0, 3, 1, 1, 0),
(30, 3, 6, 4, 7, 0),
(31, 1, 0, 0, 21, 0),
(32, 2, 4, 3, 70, 0),
(33, 0, 1, 1, 12, 0),
(34, 1, 1, 1, 22, 0),
(35, 1, 1, 1, 31, 0),
(36, 1, 3, 2, 0, 0),
(37, 2, 6, 3, 8, 0),
(38, 0, 0, 0, 332, 0),
(39, 2, 1, 2, 201, 0),
(40, 2, 5, 4, 20, 0),
(41, 3, 2, 2, 94, 0),
(42, 3, 1, 2, 83, 0),
(43, 2, 5, 5, 39, 0),
(44, 1, 2, 1, 26, 0),
(45, 1, 2, 1, 8, 0),
(46, 1, 2, 1, 0, 0),
(47, 0, 3, 1, 1, 0),
(48, 3, 6, 4, 7, 0),
(49, 1, 0, 0, 21, 0),
(50, 2, 4, 3, 70, 0),
(51, 0, 1, 1, 12, 0),
(52, 1, 1, 1, 22, 0),
(53, 1, 1, 1, 31, 0),
(54, 1, 3, 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `idAnalisis` int(11) NOT NULL,
  `fibra_dietetica_g` int(11) DEFAULT NULL,
  `cenizas_g` int(11) DEFAULT NULL,
  `lipidos_g` int(11) DEFAULT NULL,
  `carbohidratos_total_g` int(11) DEFAULT NULL,
  `hum_edad_g` int(11) DEFAULT NULL,
  `carbohidratos_dis_g` int(11) DEFAULT NULL,
  `energia_kcal` int(11) DEFAULT NULL,
  `proteina_g` int(11) DEFAULT NULL,
  `energia_kj` int(11) DEFAULT NULL,
  `IngredientesID` int(11) DEFAULT NULL,
  `MineralesID` int(11) DEFAULT NULL,
  `VitaminasID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compone`
--

CREATE TABLE `compone` (
  `RecetaID` int(11) NOT NULL,
  `ProcesoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compone`
--

INSERT INTO `compone` (`RecetaID`, `ProcesoID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `ServidoID` int(11) NOT NULL,
  `RecetaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`ServidoID`, `RecetaID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `idHerramientas` int(11) NOT NULL,
  `nombre_he` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `idIngredientes` int(11) NOT NULL,
  `grupo` varchar(45) DEFAULT NULL,
  `nombre_generico` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `nombre_in` varchar(45) DEFAULT NULL,
  `genero_in` varchar(45) DEFAULT NULL,
  `especies` varchar(45) DEFAULT NULL,
  `otros_nombres` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`idIngredientes`, `grupo`, `nombre_generico`, `tipo`, `nombre_in`, `genero_in`, `especies`, `otros_nombres`) VALUES
(1, 'Pescado', 'Pirarucú', 'Carnes', 'Pirarucú', 'Arapaima', 'Arapaima gigas', 'Paiche'),
(2, 'Vegetal', 'Papa', 'Tubérculo', 'Papa', 'Solanum', 'Solanum tuberosum', NULL),
(3, 'Cereal', 'Maíz', 'Grano', 'Maíz', 'Zea', 'Zea mays', NULL),
(4, 'Carnes', 'Cerdo', 'Carne', 'Cerdo', 'Sus', 'Sus scrofa domesticus', NULL),
(5, 'Carne', 'Cuy', 'Carne', 'Cuy', 'Cavia', 'Cavia porcellus', NULL),
(6, 'Carnes', 'Callo', 'Víscera', 'Callo', 'Rumen', NULL, 'Mondongo'),
(7, 'Pescado', 'Bocachico', 'Pescado', 'Bocachico', 'Prochilodus', 'Prochilodus magdalenae', NULL),
(8, 'Cereal', 'Arroz', 'Grano', 'Arroz', 'Oryza', 'Oryza sativa', NULL),
(9, 'Carne', 'Gallina', 'Carne', 'Gallina', 'Gallus', 'Gallus gallus domesticus', NULL),
(10, 'Carne', 'Chivo', 'Carne', 'Chivo', 'Capra', 'Capra aegagrus hircus', NULL),
(11, 'Cereal', 'Ñame', 'Tubérculo', 'Ñame', 'Dioscorea', 'Dioscorea spp.', NULL),
(12, 'Pescado', 'Pescado seco', 'Pescado', 'Pescado seco', NULL, NULL, NULL),
(13, 'Carne', 'Chigüiro', 'Carne', 'Chigüiro', 'Hydrochoerus', 'Hydrochoerus hydrochaeris', NULL),
(14, 'Pescado', 'Bagre', 'Pescado', 'Bagre', 'Siluriformes', NULL, NULL),
(15, 'Mariscos', 'Piangüa', 'Molusco', 'Piangüa', NULL, NULL, NULL),
(16, 'Pescado', 'Pirarucú', 'Carnes', 'Pirarucú', 'Arapaima', 'Arapaima gigas', 'Paiche'),
(17, 'Vegetal', 'Papa', 'Tubérculo', 'Papa', 'Solanum', 'Solanum tuberosum', NULL),
(18, 'Cereal', 'Maíz', 'Grano', 'Maíz', 'Zea', 'Zea mays', NULL),
(19, 'Carnes', 'Cerdo', 'Carne', 'Cerdo', 'Sus', 'Sus scrofa domesticus', NULL),
(20, 'Carne', 'Cuy', 'Carne', 'Cuy', 'Cavia', 'Cavia porcellus', NULL),
(21, 'Carnes', 'Callo', 'Víscera', 'Callo', 'Rumen', NULL, 'Mondongo'),
(22, 'Pescado', 'Bocachico', 'Pescado', 'Bocachico', 'Prochilodus', 'Prochilodus magdalenae', NULL),
(23, 'Cereal', 'Arroz', 'Grano', 'Arroz', 'Oryza', 'Oryza sativa', NULL),
(24, 'Carne', 'Gallina', 'Carne', 'Gallina', 'Gallus', 'Gallus gallus domesticus', NULL),
(25, 'Carne', 'Chivo', 'Carne', 'Chivo', 'Capra', 'Capra aegagrus hircus', NULL),
(26, 'Cereal', 'Ñame', 'Tubérculo', 'Ñame', 'Dioscorea', 'Dioscorea spp.', NULL),
(27, 'Pescado', 'Pescado seco', 'Pescado', 'Pescado seco', NULL, NULL, NULL),
(28, 'Carne', 'Chigüiro', 'Carne', 'Chigüiro', 'Hydrochoerus', 'Hydrochoerus hydrochaeris', NULL),
(29, 'Pescado', 'Bagre', 'Pescado', 'Bagre', 'Siluriformes', NULL, NULL),
(30, 'Mariscos', 'Piangüa', 'Molusco', 'Piangüa', NULL, NULL, NULL),
(31, 'Pescado', 'Pirarucú', 'Carnes', 'Pirarucú', 'Arapaima', 'Arapaima gigas', 'Paiche'),
(32, 'Vegetal', 'Papa', 'Tubérculo', 'Papa', 'Solanum', 'Solanum tuberosum', NULL),
(33, 'Cereal', 'Maíz', 'Grano', 'Maíz', 'Zea', 'Zea mays', NULL),
(34, 'Carnes', 'Cerdo', 'Carne', 'Cerdo', 'Sus', 'Sus scrofa domesticus', NULL),
(35, 'Carne', 'Cuy', 'Carne', 'Cuy', 'Cavia', 'Cavia porcellus', NULL),
(36, 'Carnes', 'Callo', 'Víscera', 'Callo', 'Rumen', NULL, 'Mondongo'),
(37, 'Pescado', 'Bocachico', 'Pescado', 'Bocachico', 'Prochilodus', 'Prochilodus magdalenae', NULL),
(38, 'Cereal', 'Arroz', 'Grano', 'Arroz', 'Oryza', 'Oryza sativa', NULL),
(39, 'Carne', 'Gallina', 'Carne', 'Gallina', 'Gallus', 'Gallus gallus domesticus', NULL),
(40, 'Carne', 'Chivo', 'Carne', 'Chivo', 'Capra', 'Capra aegagrus hircus', NULL),
(41, 'Cereal', 'Ñame', 'Tubérculo', 'Ñame', 'Dioscorea', 'Dioscorea spp.', NULL),
(42, 'Pescado', 'Pescado seco', 'Pescado', 'Pescado seco', NULL, NULL, NULL),
(43, 'Carne', 'Chigüiro', 'Carne', 'Chigüiro', 'Hydrochoerus', 'Hydrochoerus hydrochaeris', NULL),
(44, 'Pescado', 'Bagre', 'Pescado', 'Bagre', 'Siluriformes', NULL, NULL),
(45, 'Mariscos', 'Piangüa', 'Molusco', 'Piangüa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_envio` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minerales`
--

CREATE TABLE `minerales` (
  `idMinerales` int(11) NOT NULL,
  `calcio_mg` int(11) DEFAULT NULL,
  `potacio_mg` int(11) DEFAULT NULL,
  `magnesio_mg` int(11) DEFAULT NULL,
  `hierro_mg` int(11) DEFAULT NULL,
  `zinc_mg` int(11) DEFAULT NULL,
  `sodio_mg` int(11) DEFAULT NULL,
  `yodo_mg` int(11) DEFAULT NULL,
  `fosforo_mg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `necesita`
--

CREATE TABLE `necesita` (
  `HerramientaID` int(11) NOT NULL,
  `ProcesoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `idProceso` int(11) NOT NULL,
  `nombre_pro` varchar(45) DEFAULT NULL,
  `descripcion_pro` varchar(255) DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`idProceso`, `nombre_pro`, `descripcion_pro`, `tiempo`) VALUES
(1, 'Chicharrón de Pirarucú', 'Freír el pirarucú hasta obtener un chicharrón dorado y crujiente.', 30),
(2, 'Ajiaco Santafereño', 'Preparar la sopa tradicional con pollo, mazorca y guascas.', 1),
(3, 'Mazamorra Chiquita', 'Cocinar los ingredientes de la mazamorra con especias.', 2),
(4, 'Bandeja Paisa', 'Preparar todos los componentes de la bandeja típica.', 1),
(5, 'Cuy Asado', 'Asar el cuy con aliños tradicionales.', 2),
(6, 'Mute Santandereano', 'Cocinar los ingredientes hasta obtener un mute espeso.', 3),
(7, 'Lechona Tolimense', 'Hornear la lechona rellena de arroz y carne.', 5),
(8, 'Tamal Tolimense', 'Envolver y cocinar tamales con masa y relleno.', 3),
(9, 'Viudo de Bocachico', 'Preparar el bocachico en caldo con yuca y plátano.', 1),
(10, 'Arroz Atollado', 'Cocinar el arroz con carne y vegetales hasta obtener una mezcla uniforme.', 45),
(11, 'Sancocho Valluno de Gallina', 'Preparar el sancocho con gallina y plátano.', 2),
(12, 'Friche de Chivo', 'Cocinar el chivo en su propia grasa con especias.', 1),
(13, 'Mote de Queso', 'Preparar el mote con queso costeño y ñame.', 1),
(14, 'Rondón', 'Cocinar pescado y mariscos en leche de coco.', 2),
(15, 'Pisillo de Chigüiro', 'Desmechar el chigüiro y cocinar con aliños.', 1),
(16, 'Arroz Clavado', 'Cocinar el arroz con carne y especias hasta que esté listo.', 1),
(17, 'Sancocho de Bagre', 'Preparar el sancocho con bagre y vegetales.', 1),
(18, 'Sudado de Piangüa', 'Cocinar la piangüa en su jugo con especias y vegetales.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `idreceta` int(11) NOT NULL,
  `nombre_re` varchar(45) DEFAULT NULL,
  `descripcion_re` varchar(255) DEFAULT NULL,
  `AcidosGrasID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`idreceta`, `nombre_re`, `descripcion_re`, `AcidosGrasID`) VALUES
(1, 'Chicharrón de Pirarucú', 'Pirarucú frito en cubos, acompañado de patacones y ensalada.', 1),
(2, 'Ajiaco Santafereño', 'Sopa tradicional de papa y pollo, servida con arroz y aguacate.', 2),
(3, 'Mazamorra Chiquita', 'Sopa espesa de maíz, frijol y carne, típica de la región andina.', 3),
(4, 'Bandeja Paisa', 'Plato tradicional antioqueño con fríjoles, arroz, carne y chicharrón.', 4),
(5, 'Cuy Asado', 'Cuy asado al carbón, acompañado de papas saladas y maíz pira.', 5),
(6, 'Mute Santandereano', 'Sopa de callos con maíz, carne y vegetales, típica de Santander.', 6),
(7, 'Lechona Tolimense', 'Cerdo relleno de arroz y arvejas, horneado por varias horas.', 7),
(8, 'Tamal Tolimense', 'Tamal hecho de maíz, relleno de carne, vegetales y huevo.', 8),
(9, 'Viudo de Bocachico', 'Plato de bocachico cocido con plátano, yuca y papa.', 9),
(10, 'Arroz Atollado', 'Arroz cocido con pollo, carne y longaniza, acompañado de plátano.', 10),
(11, 'Sancocho Valluno de Gallina', 'Sopa de gallina con yuca, plátano y papa, típica del Valle del Cauca.', 11),
(12, 'Friche de Chivo', 'Chivo cocido en su jugo, servido con arepa y yuca.', 12),
(13, 'Mote de Queso', 'Sopa de ñame con queso costeño, típica de la región Caribe.', 13),
(14, 'Rondón', 'Plato típico de San Andrés con pescado, carne, coco y dumplings.', 14),
(15, 'Pisillo de Chigüiro', 'Carne de chigüiro guisada, acompañada de casabe y yuca.', 15),
(16, 'Arroz Clavado', 'Arroz cocido con pollo, longaniza y vegetales, típico del Pacífico.', 16),
(17, 'Sancocho de Bagre', 'Sopa de bagre con yuca, papa y plátano, típica del Pacífico.', 17),
(18, 'Sudado de Piangüa', 'Piangüa cocida con especias, servida con arroz y patacones.', 18),
(19, 'Chicharrón de Pirarucú', 'Pirarucú frito en cubos, acompañado de patacones y ensalada.', 1),
(20, 'Ajiaco Santafereño', 'Sopa tradicional de papa y pollo, servida con arroz y aguacate.', 2),
(21, 'Mazamorra Chiquita', 'Sopa espesa de maíz, frijol y carne, típica de la región andina.', 3),
(22, 'Bandeja Paisa', 'Plato tradicional antioqueño con fríjoles, arroz, carne y chicharrón.', 4),
(23, 'Cuy Asado', 'Cuy asado al carbón, acompañado de papas saladas y maíz pira.', 5),
(24, 'Mute Santandereano', 'Sopa de callos con maíz, carne y vegetales, típica de Santander.', 6),
(25, 'Lechona Tolimense', 'Cerdo relleno de arroz y arvejas, horneado por varias horas.', 7),
(26, 'Tamal Tolimense', 'Tamal hecho de maíz, relleno de carne, vegetales y huevo.', 8),
(27, 'Viudo de Bocachico', 'Plato de bocachico cocido con plátano, yuca y papa.', 9),
(28, 'Arroz Atollado', 'Arroz cocido con pollo, carne y longaniza, acompañado de plátano.', 10),
(29, 'Sancocho Valluno de Gallina', 'Sopa de gallina con yuca, plátano y papa, típica del Valle del Cauca.', 11),
(30, 'Friche de Chivo', 'Chivo cocido en su jugo, servido con arepa y yuca.', 12),
(31, 'Mote de Queso', 'Sopa de ñame con queso costeño, típica de la región Caribe.', 13),
(32, 'Rondón', 'Plato típico de San Andrés con pescado, carne, coco y dumplings.', 14),
(33, 'Pisillo de Chigüiro', 'Carne de chigüiro guisada, acompañada de casabe y yuca.', 15),
(34, 'Arroz Clavado', 'Arroz cocido con pollo, longaniza y vegetales, típico del Pacífico.', 16),
(35, 'Sancocho de Bagre', 'Sopa de bagre con yuca, papa y plátano, típica del Pacífico.', 17),
(36, 'Sudado de Piangüa', 'Piangüa cocida con especias, servida con arroz y patacones.', 18),
(37, 'Chicharrón de Pirarucú', 'Pirarucú frito en cubos, acompañado de patacones y ensalada.', 1),
(38, 'Ajiaco Santafereño', 'Sopa tradicional de papa y pollo, servida con arroz y aguacate.', 2),
(39, 'Mazamorra Chiquita', 'Sopa espesa de maíz, frijol y carne, típica de la región andina.', 3),
(40, 'Bandeja Paisa', 'Plato tradicional antioqueño con fríjoles, arroz, carne y chicharrón.', 4),
(41, 'Cuy Asado', 'Cuy asado al carbón, acompañado de papas saladas y maíz pira.', 5),
(42, 'Mute Santandereano', 'Sopa de callos con maíz, carne y vegetales, típica de Santander.', 6),
(43, 'Lechona Tolimense', 'Cerdo relleno de arroz y arvejas, horneado por varias horas.', 7),
(44, 'Tamal Tolimense', 'Tamal hecho de maíz, relleno de carne, vegetales y huevo.', 8),
(45, 'Viudo de Bocachico', 'Plato de bocachico cocido con plátano, yuca y papa.', 9),
(46, 'Arroz Atollado', 'Arroz cocido con pollo, carne y longaniza, acompañado de plátano.', 10),
(47, 'Sancocho Valluno de Gallina', 'Sopa de gallina con yuca, plátano y papa, típica del Valle del Cauca.', 11),
(48, 'Friche de Chivo', 'Chivo cocido en su jugo, servido con arepa y yuca.', 12),
(49, 'Mote de Queso', 'Sopa de ñame con queso costeño, típica de la región Caribe.', 13),
(50, 'Rondón', 'Plato típico de San Andrés con pescado, carne, coco y dumplings.', 14),
(51, 'Pisillo de Chigüiro', 'Carne de chigüiro guisada, acompañada de casabe y yuca.', 15),
(52, 'Arroz Clavado', 'Arroz cocido con pollo, longaniza y vegetales, típico del Pacífico.', 16),
(53, 'Sancocho de Bagre', 'Sopa de bagre con yuca, papa y plátano, típica del Pacífico.', 17),
(54, 'Sudado de Piangüa', 'Piangüa cocida con especias, servida con arroz y patacones.', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requiere`
--

CREATE TABLE `requiere` (
  `IngredienteID` int(11) NOT NULL,
  `RecetaID` int(11) NOT NULL,
  `Cantidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `requiere`
--

INSERT INTO `requiere` (`IngredienteID`, `RecetaID`, `Cantidad`) VALUES
(1, 1, '400g'),
(2, 2, '200g'),
(3, 3, '25g'),
(3, 8, '12.5g'),
(4, 4, '212g'),
(5, 5, '1000g'),
(6, 6, '100g'),
(7, 7, '75g'),
(8, 9, '549g'),
(9, 10, '65g'),
(9, 16, '65g'),
(10, 11, '450g'),
(11, 12, '500g'),
(12, 13, '500g'),
(13, 14, '500g'),
(14, 15, '500g'),
(15, 17, '500g'),
(16, 18, '500g');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servido`
--

CREATE TABLE `servido` (
  `idservido` int(11) NOT NULL,
  `porciones` int(11) DEFAULT NULL,
  `nombre_se` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servido`
--

INSERT INTO `servido` (`idservido`, `porciones`, `nombre_se`) VALUES
(1, 1, 'Chicharrón de Pirarucú'),
(2, 1, 'Ajiaco Santafereño'),
(3, 1, 'Mazamorra Chiquita'),
(4, 1, 'Bandeja Paisa'),
(5, 2, 'Cuy Asado'),
(6, 1, 'Mute Santandereano'),
(7, 1, 'Lechona Tolimense'),
(8, 1, 'Tamal Tolimense'),
(9, 1, 'Viudo de Bocachico'),
(10, 1, 'Arroz Atollado'),
(11, 1, 'Sancocho Valluno de Gallina'),
(12, 1, 'Friche de Chivo'),
(13, 1, 'Mote de Queso'),
(14, 1, 'Rondón'),
(15, 1, 'Pisillo de Chigüiro'),
(16, 1, 'Arroz Clavado'),
(17, 1, 'Sancocho de Bagre'),
(18, 1, 'Sudado de Piangüa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicita`
--

CREATE TABLE `solicita` (
  `UsuarioID` int(11) NOT NULL,
  `RecetaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_us VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    edad int(4) not null,
    usuario VARCHAR(50) NOT NULL UNIQUE
);

-- Tabla de preferencias culinarias
CREATE TABLE preferencias_culinarias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    sabores_preferidos VARCHAR(255), -- Almacena sabores preferidos (salado,dulce,acido,picante)
    alergias TEXT,
    peso DECIMAL(5,2), -- Peso en kilogramos
    altura DECIMAL(5,2), -- Altura en metros
    fecha_actualizacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT chk_peso CHECK (peso > 0 AND peso < 300),
    CONSTRAINT chk_altura CHECK (altura > 0 AND altura < 3),
    CONSTRAINT chk_sabores CHECK (sabores_preferidos REGEXP '^(salado|dulce|acido|picante)(,(salado|dulce|acido|picante))*$')
);

-- Índices para optimización
CREATE INDEX idx_correo ON usuarios(correo);
CREATE INDEX idx_usuario_preferencias ON preferencias_culinarias(usuario_id);

-- Triggers para validación
DELIMITER //

-- Trigger para validar contraseña
CREATE TRIGGER validar_password_before_insert
BEFORE INSERT ON usuarios
FOR EACH ROW
BEGIN
    IF LENGTH(NEW.pass) < 8 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La contraseña debe tener al menos 8 caracteres';
    END IF;
    IF NEW.pass NOT REGEXP '[A-Z]' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La contraseña debe contener al menos una letra mayúscula';
    END IF;
    IF NEW.pass NOT REGEXP '[0-9]' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La contraseña debe contener al menos un número';
    END IF;
END//

-- Trigger para validar correo electrónico
CREATE TRIGGER validar_correo_before_insert
BEFORE INSERT ON usuarios
FOR EACH ROW
BEGIN
    IF NEW.correo NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El formato del correo electrónico no es válido';
    END IF;
END//
DELIMITER ;

--
-- Volcado de datos para la tabla `usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vitaminas`
--

CREATE TABLE `vitaminas` (
  `idvitaminas` int(11) NOT NULL,
  `niacina_mg` int(11) DEFAULT NULL,
  `tiamina_mg` int(11) DEFAULT NULL,
  `riboflavina_mg` int(11) DEFAULT NULL,
  `acido_ascorbico_mg` int(11) DEFAULT NULL,
  `acido_folico_mg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acido_grasos`
--
ALTER TABLE `acido_grasos`
  ADD PRIMARY KEY (`idAcido_grasos`);

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`idAnalisis`),
  ADD KEY `IngredientesID` (`IngredientesID`),
  ADD KEY `MineralesID` (`MineralesID`),
  ADD KEY `VitaminasID` (`VitaminasID`);

--
-- Indices de la tabla `compone`
--
ALTER TABLE `compone`
  ADD PRIMARY KEY (`RecetaID`,`ProcesoID`),
  ADD KEY `ProcesoID` (`ProcesoID`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`ServidoID`,`RecetaID`),
  ADD KEY `RecetaID` (`RecetaID`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`idHerramientas`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`idIngredientes`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `minerales`
--
ALTER TABLE `minerales`
  ADD PRIMARY KEY (`idMinerales`);

--
-- Indices de la tabla `necesita`
--
ALTER TABLE `necesita`
  ADD PRIMARY KEY (`HerramientaID`,`ProcesoID`),
  ADD KEY `ProcesoID` (`ProcesoID`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idProceso`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`idreceta`),
  ADD KEY `AcidosGrasID` (`AcidosGrasID`);

--
-- Indices de la tabla `requiere`
--
ALTER TABLE `requiere`
  ADD PRIMARY KEY (`IngredienteID`,`RecetaID`),
  ADD KEY `RecetaID` (`RecetaID`);

--
-- Indices de la tabla `servido`
--
ALTER TABLE `servido`
  ADD PRIMARY KEY (`idservido`);

--
-- Indices de la tabla `solicita`
--
ALTER TABLE `solicita`
  ADD PRIMARY KEY (`UsuarioID`,`RecetaID`),
  ADD KEY `RecetaID` (`RecetaID`);

--
--
-- Indices de la tabla `vitaminas`
--
ALTER TABLE `vitaminas`
  ADD PRIMARY KEY (`idvitaminas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acido_grasos`
--
ALTER TABLE `acido_grasos`
  MODIFY `idAcido_grasos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `idAnalisis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `idHerramientas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `idIngredientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `minerales`
--
ALTER TABLE `minerales`
  MODIFY `idMinerales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `idProceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `idreceta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `servido`
--
ALTER TABLE `servido`
  MODIFY `idservido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;


--
-- AUTO_INCREMENT de la tabla `vitaminas`
--
ALTER TABLE `vitaminas`
  MODIFY `idvitaminas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`IngredientesID`) REFERENCES `ingredientes` (`idIngredientes`),
  ADD CONSTRAINT `analisis_ibfk_2` FOREIGN KEY (`MineralesID`) REFERENCES `minerales` (`idMinerales`),
  ADD CONSTRAINT `analisis_ibfk_3` FOREIGN KEY (`VitaminasID`) REFERENCES `vitaminas` (`idvitaminas`);

--
-- Filtros para la tabla `compone`
--
ALTER TABLE `compone`
  ADD CONSTRAINT `compone_ibfk_1` FOREIGN KEY (`RecetaID`) REFERENCES `receta` (`idreceta`),
  ADD CONSTRAINT `compone_ibfk_2` FOREIGN KEY (`ProcesoID`) REFERENCES `proceso` (`idProceso`);

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`ServidoID`) REFERENCES `servido` (`idservido`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`RecetaID`) REFERENCES `receta` (`idreceta`);

--
-- Filtros para la tabla `mensajes`
--


--
-- Filtros para la tabla `necesita`
--
ALTER TABLE `necesita`
  ADD CONSTRAINT `necesita_ibfk_1` FOREIGN KEY (`HerramientaID`) REFERENCES `herramientas` (`idHerramientas`),
  ADD CONSTRAINT `necesita_ibfk_2` FOREIGN KEY (`ProcesoID`) REFERENCES `proceso` (`idProceso`);

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`AcidosGrasID`) REFERENCES `acido_grasos` (`idAcido_grasos`);

--
-- Filtros para la tabla `requiere`
--
ALTER TABLE `requiere`
  ADD CONSTRAINT `requiere_ibfk_1` FOREIGN KEY (`IngredienteID`) REFERENCES `ingredientes` (`idIngredientes`),
  ADD CONSTRAINT `requiere_ibfk_2` FOREIGN KEY (`RecetaID`) REFERENCES `receta` (`idreceta`);

--
-- Filtros para la tabla `solicita`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
