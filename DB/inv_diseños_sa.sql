-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 07:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inv_diseños_sa`
--
CREATE DATABASE IF NOT EXISTS `inv_diseños_sa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `inv_diseños_sa`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bodegas`
--
-- Creation: May 17, 2023 at 02:46 PM
--

DROP TABLE IF EXISTS `tbl_bodegas`;
CREATE TABLE `tbl_bodegas` (
  `ID_BODEGA` int(11) NOT NULL,
  `DESC_BODEGA` varchar(255) DEFAULT NULL,
  `DIRECCION` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tbl_bodegas`
--

INSERT INTO `tbl_bodegas` (`ID_BODEGA`, `DESC_BODEGA`, `DIRECCION`, `EMAIL`, `TELEFONO`, `FECHA_CREACION`) VALUES
(1, 'Central 1', '4ta avenida 4-40 zona 1', 'bodegacentral1@gmail.com', 23345665, '2023-05-17 00:00:00'),
(2, 'Bodega Sur 1', '7ma Calle 3-10 Zona 2 Villa Nueva', 'bodegasur1@gmail.com', 56784365, '2023-05-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inv_equipos`
--
-- Creation: May 17, 2023 at 03:23 PM
--

DROP TABLE IF EXISTS `tbl_inv_equipos`;
CREATE TABLE `tbl_inv_equipos` (
  `ID_PROD` int(11) NOT NULL,
  `MARCA` varchar(255) DEFAULT NULL,
  `MODELO` varchar(255) DEFAULT NULL,
  `OR_COMPRA` varchar(255) DEFAULT NULL,
  `SERIE` varchar(255) DEFAULT NULL,
  `ESTADO` varchar(10) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_SALIDA` datetime DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_BODEGA` int(11) DEFAULT NULL,
  `ID_TIPO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipo_movimientos`
--
-- Creation: May 17, 2023 at 02:56 PM
--

DROP TABLE IF EXISTS `tbl_tipo_movimientos`;
CREATE TABLE `tbl_tipo_movimientos` (
  `ID_TIPO` int(11) NOT NULL,
  `DESC_TIPO` varchar(255) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tbl_tipo_movimientos`
--

INSERT INTO `tbl_tipo_movimientos` (`ID_TIPO`, `DESC_TIPO`, `FECHA_CREACION`) VALUES
(1, 'NUEVO (1)', '2023-05-18 02:09:26'),
(2, 'USADO (2)', '2023-05-18 02:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--
-- Creation: May 17, 2023 at 04:10 PM
-- Last update: May 26, 2023 at 05:37 PM
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE `tbl_usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO_NOMBRE` varchar(255) DEFAULT NULL,
  `USUARIO_APELLIDO` varchar(255) DEFAULT NULL,
  `ALIAS_USUARIO` varchar(255) DEFAULT NULL,
  `USUARIO_CLAVE` varchar(255) DEFAULT NULL,
  `USUARIO_ESTADO` varchar(10) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_BAJA` datetime DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `ID_BODEGA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`ID_USUARIO`, `USUARIO_NOMBRE`, `USUARIO_APELLIDO`, `ALIAS_USUARIO`, `USUARIO_CLAVE`, `USUARIO_ESTADO`, `FECHA_CREACION`, `FECHA_BAJA`, `EMAIL`, `ID_BODEGA`) VALUES
(1, 'Axel', 'Salvatierra', 'axel', '$2y$10$O7Onw3szUmBqiVDuOk/O0.vWvANpU7owA7WxHqWhXhaKIC7wFigKC', 'ACTIVO', '2023-05-18 05:01:46', NULL, 'axel.salvatierra@gmail.com', 1),
(2, 'Administrador', 'Principal', 'Administrador', '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcExp77DBQvgC', NULL, NULL, NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bodegas`
--
ALTER TABLE `tbl_bodegas`
  ADD PRIMARY KEY (`ID_BODEGA`);

--
-- Indexes for table `tbl_inv_equipos`
--
ALTER TABLE `tbl_inv_equipos`
  ADD PRIMARY KEY (`ID_PROD`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`),
  ADD KEY `ID_TIPO` (`ID_TIPO`);

--
-- Indexes for table `tbl_tipo_movimientos`
--
ALTER TABLE `tbl_tipo_movimientos`
  ADD PRIMARY KEY (`ID_TIPO`);

--
-- Indexes for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_BODEGA` (`ID_BODEGA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bodegas`
--
ALTER TABLE `tbl_bodegas`
  MODIFY `ID_BODEGA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_inv_equipos`
--
ALTER TABLE `tbl_inv_equipos`
  MODIFY `ID_PROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_tipo_movimientos`
--
ALTER TABLE `tbl_tipo_movimientos`
  MODIFY `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_inv_equipos`
--
ALTER TABLE `tbl_inv_equipos`
  ADD CONSTRAINT `tbl_inv_equipos_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `tbl_usuarios` (`ID_USUARIO`),
  ADD CONSTRAINT `tbl_inv_equipos_ibfk_2` FOREIGN KEY (`ID_BODEGA`) REFERENCES `tbl_bodegas` (`ID_BODEGA`),
  ADD CONSTRAINT `tbl_inv_equipos_ibfk_3` FOREIGN KEY (`ID_TIPO`) REFERENCES `tbl_tipo_movimientos` (`ID_TIPO`);

--
-- Constraints for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`ID_BODEGA`) REFERENCES `tbl_bodegas` (`ID_BODEGA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
