-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2024 a las 11:11:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `categoria` enum('medicina_general','laboratorio','tratamientos','medicina_preventiva','odontologia','ginecologia') NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` enum('masculino','femenino','otro') NOT NULL,
  `numero_telefonico` varchar(20) DEFAULT NULL,
  `correo_electronico` varchar(100) DEFAULT NULL,
  `lugar_residencia` varchar(100) DEFAULT NULL,
  `motivo` text NOT NULL,
  `historia` text NOT NULL,
  `enfermedades` text DEFAULT NULL,
  `cirugias` text DEFAULT NULL,
  `alergias` text DEFAULT NULL,
  `medicamentos` text DEFAULT NULL,
  `vacunaciones` text DEFAULT NULL,
  `antecedentes_familiares` text DEFAULT NULL,
  `menarca` varchar(20) DEFAULT NULL,
  `ciclo` text DEFAULT NULL,
  `embarazos` text DEFAULT NULL,
  `ultima_menstruacion` date DEFAULT NULL,
  `tabaquismo` text DEFAULT NULL,
  `consumo_alcohol` text DEFAULT NULL,
  `uso_drogas` text DEFAULT NULL,
  `actividad_fisica` text DEFAULT NULL,
  `dieta` text DEFAULT NULL,
  `sueno` text DEFAULT NULL,
  `antecedentes_psicosociales` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `categoria`, `nombre`, `edad`, `sexo`, `numero_telefonico`, `correo_electronico`, `lugar_residencia`, `motivo`, `historia`, `enfermedades`, `cirugias`, `alergias`, `medicamentos`, `vacunaciones`, `antecedentes_familiares`, `menarca`, `ciclo`, `embarazos`, `ultima_menstruacion`, `tabaquismo`, `consumo_alcohol`, `uso_drogas`, `actividad_fisica`, `dieta`, `sueno`, `antecedentes_psicosociales`) VALUES
(5, 'tratamientos', 'Omar Palma', 15, 'masculino', '123456', '234567', 'Toluca', 'Nomas', 'ninguno', 'no', '', 'Estudio', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', 'siempre', 'ninguno'),
(6, 'medicina_preventiva', 'Cesar Palma', 19, 'masculino', '2345678', 'cesarpalma@gmail.com', 'toluca', 'Preventiva', 'ninguna', 'ninguno', 'ninguna', 'chamba', 'ninguno', 'todas', 'ninguno', '', '', '', '0000-00-00', 'no', 'si', 'si', 'no', 'no', 'si', 'ninguno'),
(9, 'ginecologia', 'Maria', 25, 'femenino', '2345678', 'marimai@gmail.com', 'Otzolotepec', 'Consulta embarazo', 'ninguna', 'ninguna', 'ninguna', 'Paracetamol', 'ninguno', 'ninguna', 'ninguno', 'mayo 2019', 'regular', 'actual', '2024-05-05', 'no', 'no', 'no', 'si', 'balanceada', 'constante', 'normal'),
(10, 'odontologia', 'Miguel Orona', 88, 'masculino', '1224567897', 'miguel_or', 'Atarasquillo', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', '', 'regular', '', '0000-00-00', 'q', 'd', 'su', 'no', 'mucha', 'mucho', 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `correo`, `contraseña`) VALUES
(39, 'Cesar Palma Sanchez ', 'palmasanchezcesar@gmail.com', 'fsdopdv4742');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
