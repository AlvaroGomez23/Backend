-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 18:53:28
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
-- Base de datos: `pt04_alvaro_gomez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--
CREATE DATABASE IF NOT EXISTS pt04_alvaro_gomez;
USE pt04_alvaro_gomez;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `descripcio` varchar(1000) NOT NULL,
  `id_usuari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `nom`, `descripcio`, `id_usuari`) VALUES
(1, 'Lleó', 'El lleó és conegut com el rei de la selva. És un depredador ferotge que viu a les sabanes africanes.', 1),
(2, 'Tigre', 'El tigre és el felí més gran del món, famós per les seves ratlles i la seva força.', 2),
(3, 'Elefant', 'L\'elefant és l\'animal terrestre més gran del planeta, conegut per la seva trompa i grans orelles.', 3),
(4, 'Àguila', 'L\'àguila és un ocell rapinyaire, famosa per la seva visió aguda i la seva capacitat per volar llargues distàncies.', 4),
(5, 'Dofí', 'El dofí és un mamífer aquàtic molt intel·ligent, conegut pel seu comportament amigable i la seva capacitat per comunicar-se.', 5),
(6, 'Cocodril', 'El cocodril és un rèptil aquàtic temut per la seva poderosa mossegada i la seva habilitat per esperar les preses.', 1),
(7, 'Girafa', 'La girafa és l\'animal més alt del món, coneguda pel seu llarg coll i la seva capacitat per menjar fulles dels arbres més alts.', 2),
(8, 'Pingüí', 'El pingüí és un ocell que no vola, però és un excel·lent nedador. Viu en regions fredes com l\'Antàrtida.', 3),
(9, 'Rinoceront', 'El rinoceront és un animal robust, conegut pel seu gran tamany i el seu banya al nas.', 4),
(10, 'Cangur', 'El cangur és un marsupial originari d\'Austràlia, famós per la seva gran habilitat per saltar.', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contrasenya` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `dni`, `nom`, `email`, `contrasenya`) VALUES
(1, '30952276A', 'Pedro', 'pedro@sapalomera.cat', '$2y$10$0GNNB4srFuQzTXEAzPGDR.qgOqVU31LESN9XBz3mhZPF.edWTJhP.'),
(2, '14162895R', 'Antonio', 'antonio@sapalomera.cat', '$2y$10$.IsNFUOWoFep.Lj6aMabq.IkrOxkRJddC/MiR900G095/iWoW.9oy'),
(3, '44957158R', 'Jose', 'jose@sapalomera.cat', '$2y$10$Dk2QLW/ejCG8JYddzmSwS.kelqPsJFZfL8uateZU6O6XuxQUO.Zuy'),
(4, '83160158R', 'Marta', 'marta@saplomera.cat', '$2y$10$H4aLCdxdR4Krk52zHGKPlOV7uhzUc7oEYg.LEEjBzon8.4nsh7meq'),
(5, '99552383B', 'Xavi', 'xavi@sapalomera.cat', '$2y$10$IEpImQ5X37WMud2G5z1lqe9Gw2ahTQpjgt6FF6bZXWsLmwPToqSh6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`,`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
