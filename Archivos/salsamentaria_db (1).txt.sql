-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2025 a las 23:51:40
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
-- Base de datos: `salsamentaria_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_diaria`
--

CREATE TABLE `caja_diaria` (
  `id_caja` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total_ventas` decimal(12,2) NOT NULL,
  `total_efectivo` decimal(12,2) NOT NULL,
  `total_digital` decimal(12,2) NOT NULL,
  `diferencia` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL,
  `id_tipo_factura` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(12,2) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `nombre_metodo` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id_metodo_pago`, `nombre_metodo`, `descripcion`) VALUES
(1, 'Efectivo', NULL),
(2, 'Nequi', NULL),
(3, 'Daviplata', NULL),
(4, 'Tarjeta Débito', NULL),
(5, 'Tarjeta Crédito', NULL),
(6, 'Transferencia Bancaria', NULL),
(7, 'QR Bancolombia', NULL),
(8, 'QR Nequi', NULL),
(9, 'Efecty', NULL),
(10, 'Datafono', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_stock`
--

CREATE TABLE `movimientos_stock` (
  `id_movimiento` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `tipo_movimiento` enum('Ingreso','Egreso') NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `motivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `codigo_barra` varchar(50) DEFAULT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `peso_unitario` decimal(10,2) DEFAULT NULL,
  `stock_actual` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT 0,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `codigo_barra`, `precio_unitario`, `peso_unitario`, `stock_actual`, `stock_minimo`, `fecha_registro`) VALUES
(1, 'Jamón Serrano ', '5501', 15000.00, 500.00, 15, 5, '2025-04-17 23:50:22'),
(2, 'Queso Pera', '7701', 15000.00, 500.00, 20, 5, '2025-04-19 03:37:29'),
(3, 'Queso doble crema', '7702', 8000.00, 500.00, 15, 5, '2025-04-19 04:01:01'),
(4, 'Jamón ahumado', '5502', 9000.00, 500.00, 10, 4, '2025-04-19 04:01:01'),
(5, 'Salchichón cervecero', '7601', 7500.00, 500.00, 20, 6, '2025-04-19 04:01:01'),
(6, 'Salami campestre', '7602', 7000.00, 500.00, 18, 5, '2025-04-19 04:01:01'),
(7, 'Chorizo santarrosano', '5503', 8500.00, 7603.00, 25, 15, '2025-04-19 04:01:01'),
(8, 'Mortadela especial', '1001', 6000.00, 500.00, 30, 8, '2025-04-19 04:01:01'),
(9, 'Butifarra costeña', '5504', 4000.00, 500.00, 12, 3, '2025-04-19 04:01:01'),
(10, 'Queso campesino', '7703', 7800.00, 500.00, 16, 5, '2025-04-19 04:01:01'),
(11, 'Jamón Pietran', '5505', 9500.00, 500.00, 22, 7, '2025-04-19 04:01:01'),
(12, 'Queso mozarella', '7704', 8200.00, 500.00, 14, 5, '2025-04-19 04:01:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nit` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`, `nit`, `telefono`, `direccion`, `correo`) VALUES
(1, 'Carnes Don Javier', '900123456-7', '3201234567', 'Calle 12 #34-56', 'donjavier@proveedores.com'),
(2, 'Carnes Don Javier', '900123456-7', '3201234567', 'Calle 12 #34-56', 'donjavier@proveedores.com'),
(3, 'Distribuciones La Montaña', '900123456-7', '3104567890', 'Calle 10 #15-20 Sur, Bogotá', 'montaña@proveedores.com'),
(4, 'Cárnicos El Rincón', '901234567-8', '3127894561', 'Carrera 8 #12-33, Bogotá', 'elrincon@carne.com'),
(5, 'Súper Embutidos SAS', '902345678-9', '3209876543', 'Av. Las Américas #45-50, Bogotá', 'contacto@superembutidos.com'),
(6, 'Quesos del Valle', '903456789-0', '3162341234', 'Calle 100 #25-12, Bogotá', 'ventas@quesosdelvalle.com'),
(7, 'Delicatessen Premium', '904567890-1', '3181234567', 'Transv. 23 #56-78, Bogotá', 'info@deliprem.com'),
(8, 'Distribuciones Piedecuesta', '905678901-2', '3004567890', 'Cra 9 #40-21, Bogotá', 'piedecuesta@prove.com'),
(9, 'Cárnicos de Colombia', '906789012-3', '3177412589', 'Calle 13 #37-77, Bogotá', 'info@carnicol.com'),
(10, 'Lácteos Andinos', '907890123-4', '3159988776', 'Diagonal 30 #50-60, Bogotá', 'ventas@andinos.com'),
(11, 'Distribuidora Nacional', '908901234-5', '3111122233', 'Av. Caracas #88-88, Bogotá', 'nacional@proveedores.com'),
(12, 'Quesos & Carnes Gourmet', '909012345-6', '3123141592', 'Calle 44 #33-21, Bogotá', 'contacto@gourmet.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_factura`
--

CREATE TABLE `tipo_factura` (
  `id_tipo_factura` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_factura`
--

INSERT INTO `tipo_factura` (`id_tipo_factura`, `nombre_tipo`) VALUES
(1, 'Factura Cliente'),
(2, 'Factura Proveedor'),
(3, 'Remisión Cliente'),
(4, 'Remisión Proveedor'),
(5, 'Nota Crédito'),
(6, 'Nota Débito'),
(7, 'Compra Inventario'),
(8, 'Venta Servicio'),
(9, 'Consumo Interno'),
(10, 'Ajuste Inventario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` enum('Administrador','Cajero','Desarrollador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contraseña`, `rol`) VALUES
(1, 'admin1', 'admin123', 'Administrador'),
(2, 'cajero1', 'cajero123', 'Cajero'),
(3, 'dev1', 'dev123', 'Desarrollador'),
(4, 'admin1', 'admin123', 'Administrador'),
(5, 'admin2', 'clave456', 'Administrador'),
(6, 'admin3', 'pass789', 'Administrador'),
(7, 'cajero1', 'cajero123', 'Cajero'),
(8, 'cajero2', 'venta456', 'Cajero'),
(9, 'cajero3', 'xyz789', 'Cajero'),
(10, 'dev1', 'dev123', 'Desarrollador'),
(11, 'dev2', 'programa456', 'Desarrollador'),
(12, 'dev3', 'rootdev', 'Desarrollador'),
(13, 'admin4', 'segura123', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja_diaria`
--
ALTER TABLE `caja_diaria`
  ADD PRIMARY KEY (`id_caja`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_metodo_pago` (`id_metodo_pago`),
  ADD KEY `id_tipo_factura` (`id_tipo_factura`),
  ADD KEY `fk_factura_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indices de la tabla `movimientos_stock`
--
ALTER TABLE `movimientos_stock`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `codigo_barra` (`codigo_barra`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tipo_factura`
--
ALTER TABLE `tipo_factura`
  ADD PRIMARY KEY (`id_tipo_factura`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja_diaria`
--
ALTER TABLE `caja_diaria`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `movimientos_stock`
--
ALTER TABLE `movimientos_stock`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo_factura`
--
ALTER TABLE `tipo_factura`
  MODIFY `id_tipo_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja_diaria`
--
ALTER TABLE `caja_diaria`
  ADD CONSTRAINT `caja_diaria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_pago` (`id_metodo_pago`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`id_tipo_factura`) REFERENCES `tipo_factura` (`id_tipo_factura`),
  ADD CONSTRAINT `fk_factura_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD CONSTRAINT `factura_detalle_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  ADD CONSTRAINT `factura_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `movimientos_stock`
--
ALTER TABLE `movimientos_stock`
  ADD CONSTRAINT `movimientos_stock_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
