-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2025 a las 02:46:49
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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `pass` varbinary(16) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `nombre_us` varchar(45) DEFAULT NULL,
  `altura` int(11) DEFAULT NULL,
  `genero_us` varchar(45) DEFAULT NULL,
  `actividad_fs` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `edad`, `pass`, `correo`, `nombre_us`, `altura`, `genero_us`, `actividad_fs`) VALUES
(1, 25, 0xeb52fc9a4b3a81a2000a9e774d5aa515, 'usuario1@example.com', 'JuanPerez', 175, 'Masculino', 'Sedentario'),
(2, 30, 0x661ed3080af35be7eb7bb725bf43818c, 'usuario2@example.com', 'MariaLopez', 160, 'Femenino', 'Activo'),
(3, 22, 0xdb827aa649df7b5774f91420ad5e2d16, 'usuario3@example.com', 'CarlosGomez', 180, 'Masculino', 'Moderado'),
(4, 28, 0x422a5f507f2baada5e7d8d05ca665778, 'usuario4@example.com', 'AnaMartinez', 165, 'Femenino', 'Deportista'),
(5, 35, 0xdf3a98fa83e2980ee1f2f233f8bfb8d2, 'usuario5@example.com', 'PedroRamirez', 172, 'Masculino', 'Sedentario'),
(6, 12, NULL, 'usuario6@example.com', 'qwe', 12, 'Masculino', 'Sedentario'),
(7, 12, NULL, 'usuario7@example.com', 'qwe', 12, 'Masculino', 'Sedentario'),
(8, 21, 0x36787910, 'usuario1@example2.com', 'qwe', 21, 'Masculino', 'Sedentario'),
(10, 24, NULL, 'karensofiam01@gmail.com', 'sofia', 160, 'Femenino', 'Sedentario'),
(12, 27, 0x0000, 'mateo@hotmail.com', 'mateo', 170, 'Masculino', 'Sedentario'),
(13, 23, NULL, 'tumadre@gmail.com', 'tumadre', 20, 'Masculino', 'Moderado'),
(14, 18, 0x0123, 'juancho@gmail.com', 'juancho', 175, 'Masculino', 'Sedentario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
