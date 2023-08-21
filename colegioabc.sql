-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 09:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colegioabc`
--

-- --------------------------------------------------------

--
-- Table structure for table `acudientes`
--

CREATE TABLE `acudientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acudientes`
--

INSERT INTO `acudientes` (`id`, `nombre`, `apellido`, `edad`, `direccion`, `correo`, `telefono`, `estudiante_id`, `contrasena`) VALUES
(71624576, 'Carlos', 'Montoya', 60, 'carrera43', 'catanomiguelangel1084@gmail.com', '3128180239', 1018223990, '71624576');

-- --------------------------------------------------------

--
-- Table structure for table `aspirantes`
--

CREATE TABLE `aspirantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspirantes`
--

INSERT INTO `aspirantes` (`id`, `nombre`, `edad`, `direccion`, `correo`, `telefono`, `fecha_nacimiento`) VALUES
(1, 'Pedro Lopez', 0, 'carrera 46 #44-63', 'miancaza18004@gmail.com', '3145018334', '2023-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `estudiante_id`, `materia`, `calificacion`, `id_profesor`) VALUES
(1, 1018223990, 'filosofia', 5, 1),
(2, 1018223990, 'filosofia', 12, 1),
(3, 1018223990, 'filosofia', 12, 1),
(4, 1018223990, 'filosofia', 67, 1),
(5, 1018223990, 'filosofia', 67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `directivos`
--

CREATE TABLE `directivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `directivos`
--

INSERT INTO `directivos` (`id`, `nombre`, `apellido`, `edad`, `correo`, `telefono`, `cargo`, `contrasena`) VALUES
(1, 'Norvey', 'Valencia', 50, 'CEIABC@hotmail.com ', '317 4218331', 'coordinador', 'ABC123456789');

-- --------------------------------------------------------

--
-- Table structure for table `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `apellido`, `edad`, `direccion`, `correo`, `telefono`) VALUES
(9999999, 'eee', 'neira', 12, 'carrera 46 #44-63', 'miancaza18004@gmail.com', '(314) 501-8334'),
(798794874, 'Pedro ', 'Lopez', 78, 'carrera 46 #44-63', 'miancaza18004@gmail.com', '(314) 501-8334'),
(1018223990, 'miguel', 'perez', 14, 'calle23', 'miancaza18004@gmail.com', '123456789'),
(1018223991, 'enrique', 'guarapana', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellido`, `edad`, `correo`, `telefono`, `materia`, `contrasena`) VALUES
(1, 'Enrique', 'Guarapana', 42, 'guarapanaenrique1234@gmail.com', '123456789', 'filosofia', 'luis123456789'),
(2, 'Natalia', 'Agudelo', 31, 'agudelonatalia@gmail.com', '3128853356', 'ciencias_sociales', 'natalia123456789'),
(12345, 'prueba', 'Lopez', 234, 'miancaza18004@gmail.com', '(314) 501-8334', 'etica', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acudientes`
--
ALTER TABLE `acudientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indexes for table `aspirantes`
--
ALTER TABLE `aspirantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indexes for table `directivos`
--
ALTER TABLE `directivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acudientes`
--
ALTER TABLE `acudientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71624577;

--
-- AUTO_INCREMENT for table `aspirantes`
--
ALTER TABLE `aspirantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `directivos`
--
ALTER TABLE `directivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1018223992;

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acudientes`
--
ALTER TABLE `acudientes`
  ADD CONSTRAINT `acudientes_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`);

--
-- Constraints for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
