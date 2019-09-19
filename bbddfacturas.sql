-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2019 a las 02:04:11
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbddfacturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresasenvios`
--

CREATE TABLE `empresasenvios` (
  `CodigoEmpresa` varchar(50) NOT NULL,
  `NombreEmpresa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresasenvios`
--

INSERT INTO `empresasenvios` (`CodigoEmpresa`, `NombreEmpresa`) VALUES
('123DHL123', 'DHL'),
('456FEDEX456', 'FEDEX'),
('789EnviosRolon789', 'EnviosRolon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `FolioFactura` int(11) NOT NULL,
  `CodigoProducto` int(11) NOT NULL,
  `NumProveedor` int(11) NOT NULL,
  `TiendaFacturada` int(11) NOT NULL,
  `FechaCompra` datetime DEFAULT CURRENT_TIMESTAMP,
  `CantidadProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`FolioFactura`, `CodigoProducto`, `NumProveedor`, `TiendaFacturada`, `FechaCompra`, `CantidadProducto`) VALUES
(3, 1, 1, 1, '2019-03-29 20:23:07', 5),
(4, 1, 1, 1, '2019-03-29 20:27:52', 15),
(5, 16, 1, 3, '2019-03-29 20:59:12', 5),
(6, 6, 1, 3, '2019-03-29 21:00:04', 10),
(7, 9, 1, 1, '2019-03-29 21:22:15', 0),
(8, 10, 1, 1, '2019-03-29 21:52:23', 5),
(9, 3, 1, 1, '2019-03-30 22:59:56', 9),
(10, 14, 3, 1, '2019-03-30 23:00:21', 7),
(11, 14, 1, 3, '2019-05-07 16:54:15', 50),
(12, 1, 1, 3, '2019-05-07 17:08:00', 100),
(13, 1, 2, 3, '2019-05-07 18:36:07', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `CodigoProducto` int(11) NOT NULL,
  `TiendaDueña` int(11) NOT NULL,
  `NombreProducto` varchar(45) DEFAULT 'Nombre no asignado',
  `Precio` int(11) DEFAULT '0',
  `Existencias` int(11) DEFAULT '0',
  `ImagenProducto` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`CodigoProducto`, `TiendaDueña`, `NombreProducto`, `Precio`, `Existencias`, `ImagenProducto`) VALUES
(1, 1, 'Choco KitKat', 30, 200, 'kitkat2.png'),
(2, 2, 'Obleas', 30, 500, 'oblea3.jpg'),
(6, 3, 'ChocoLoco', 500, 10, 'chocolate1.jpg'),
(7, 3, 'Bombones Valentin', 30, 50, 'bombones1.jpg'),
(8, 3, 'Bombones Convencionales', 2, 2000, 'bombones2.jpg'),
(9, 3, 'Oblea de cajeta', 5, 800, 'oblea2.jpg'),
(10, 3, 'Galletas Finas', 30, 400, 'galletas3.jpg'),
(11, 3, 'Cacahuates Chinos', 30, 255, 'cacahuate3.jpg'),
(12, 3, 'Cacahuates Naturales', 20, 600, 'cacahuate2.jpg'),
(13, 3, 'Galletas Navide&ntilde;as', 100, 20, 'galletas1.jpg'),
(14, 3, 'Bombones Naturales', 10, 300, 'remedio-con-bombones-para-dolor-de-garganta.jpg'),
(15, 3, 'ChocoGalletas', 15, 300, 'galletas2.png'),
(16, 3, 'Obleas de colores', 2, 500, 'Mexican-Candy-Obleas-Medianas__43488.1467651587.1280.1280.jpg'),
(17, 1, 'Helados Malvavisco', 5, 100, 'HeladosMalvavisco.jpeg'),
(18, 3, 'Pizza Dulce', 30, 200, 'PizzaDulce.jpg'),
(19, 1, 'Ositos de goma', 15, 500, 'OsitosGoma.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `NumProveedor` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `EmpresaPerteneciente` varchar(50) NOT NULL,
  `PrimerApellido` varchar(30) DEFAULT NULL,
  `SegundoApellido` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`NumProveedor`, `Nombre`, `EmpresaPerteneciente`, `PrimerApellido`, `SegundoApellido`) VALUES
(1, 'LaNayanci', '789EnviosRolon789', 'Garcia', 'Rodriguez'),
(2, 'Leo', '789EnviosRolon789', 'Rodriguez', 'Rolon'),
(3, 'Chuchito', '123DHL123', 'De la Cruz', 'De Dios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `idTienda` int(11) NOT NULL,
  `NombreTienda` varchar(30) NOT NULL,
  `Pais` varchar(20) DEFAULT 'Desconocida',
  `Estado` varchar(20) DEFAULT 'Desconocida',
  `Colonia` varchar(20) DEFAULT 'Desconocida',
  `Contrasegna` varchar(200) DEFAULT NULL,
  `Encargado` varchar(45) DEFAULT 'Desconocida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`idTienda`, `NombreTienda`, `Pais`, `Estado`, `Colonia`, `Contrasegna`, `Encargado`) VALUES
(1, 'Hamburguesas Leos', 'Mexico', 'Tabasco', 'Indeco', '$2y$12$vNjghxx/.NQ12wo5e1n1f.7WC3hBYrOqx2xl3rZzBFCgavGp74Hhu', 'Chuchin'),
(2, 'Quesadillas Garcia', 'Mexico', 'Tabasco', 'Gaviotas', '$2y$12$w/ruikdGIJQScm0e3Vm1HeQMgPnJf9hGJj1yL7RJ27Eeh/H2ZKVcm', 'Dio'),
(3, 'Dulceria LOL', 'Colombia', 'colombiano', 'Huachicol', '$2y$12$dK/295QWj4DAmLZt8/t58OVUBOlFK/SWfPr.YXFId39FtGI/WYPtq', 'Chuchin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresasenvios`
--
ALTER TABLE `empresasenvios`
  ADD PRIMARY KEY (`CodigoEmpresa`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`FolioFactura`),
  ADD KEY `Proveedor` (`NumProveedor`),
  ADD KEY `TiendaCompra` (`TiendaFacturada`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CodigoProducto`),
  ADD KEY `TiendaDueña` (`TiendaDueña`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`NumProveedor`),
  ADD KEY `EmpresasProveedores_idx` (`EmpresaPerteneciente`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`idTienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `FolioFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `CodigoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `NumProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `idTienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `Producto` FOREIGN KEY (`CodigoProducto`) REFERENCES `productos` (`CodigoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Proveedor` FOREIGN KEY (`NumProveedor`) REFERENCES `proveedores` (`NumProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TiendaCompra` FOREIGN KEY (`TiendaFacturada`) REFERENCES `tienda` (`idTienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `TiendaCreadora` FOREIGN KEY (`TiendaDueña`) REFERENCES `tienda` (`idTienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `EmpresasProveedores` FOREIGN KEY (`EmpresaPerteneciente`) REFERENCES `empresasenvios` (`CodigoEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
