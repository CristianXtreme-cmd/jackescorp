-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2025 a las 04:53:59
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
-- Base de datos: `jackescorp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `talla` varchar(10) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `talla`, `color`, `material`, `imagen_url`, `activo`) VALUES
(1, 'Chaqueta de Cuero Clásica', 'Elegante chaqueta de cuero genuino italiano con acabados premium. Perfecta para ocasiones especiales y uso diario.', 129.99, 25, 'M', 'Negro', 'Cuero genuino', 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(2, 'Chaqueta Denim Moderna', 'Chaqueta de mezclilla con detalles modernos y acabado premium. Estilo urbano y versátil para cualquier ocasión.', 89.99, 40, 'L', 'Azul', 'Denim 100% algodón', 'https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(3, 'Chaqueta Impermeable', 'Protección total contra lluvia y viento sin sacrificar el estilo. Tecnología avanzada resistente al agua.', 109.99, 30, 'XL', 'Gris', 'Poliéster técnico', 'https://images.unsplash.com/photo-1539533018447-63fcce2678e0?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(4, 'Chaqueta de Invierno Premium', 'Calidez y estilo para los días más fríos. Relleno térmico de alta calidad y diseño elegante.', 149.99, 15, 'L', 'Café', 'Poliéster con relleno térmico', 'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(5, 'Chaqueta Bomber', 'Estilo clásico bomber con un toque moderno. Perfecta para un look casual y juvenil.', 79.99, 35, 'S', 'Verde oliva', 'Nylon', 'https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(6, 'Chaqueta Deportiva', 'Diseño deportivo con materiales transpirables. Ideal para actividades al aire libre y ejercicio.', 69.99, 50, 'M', 'Azul marino', 'Poliéster técnico', 'https://images.unsplash.com/photo-1506629905053-de3b4d4b4670?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(7, 'Chaqueta de Lana', 'Elegancia tradicional en lana de alta calidad. Perfecta para ocasiones formales.', 199.99, 8, 'XL', 'Gris oscuro', 'Lana merino', 'https://images.unsplash.com/photo-1520975954732-35dd22299614?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(8, 'Chaqueta Casual', 'Versatilidad y comodidad en un diseño casual. Ideal para el día a día.', 59.99, 60, 'L', 'blanco', 'Algodón', 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 1),
(9, 'Chaqueta roja lol', 'Cualquier cosa y otra cosa', 50000.00, 3, 'S', 'rojo carmesi', 'algodon', 'https://unsplash.com/es/fotos/mujer-con-abrigo-rojo-de-pie-en-el-pasillo-68xhB2HFB2Q', 0),
(10, 'Beisbolera', 'beisbolera', 10000.00, 3, 'M', 'azul', 'algodon', 'https://images.unsplash.com/photo-1611417833045-4ff81b78eabb?q=80&w=387&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'administrador', 'Acceso completo al sistema'),
(2, 'cliente', 'Usuario que realiza compras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `email`, `password_hash`, `activo`) VALUES
(1, 2, 'hola123@gmail.com', '$2y$10$mFVTdb4YA.GyIqcir1ItbuS8GNvcEdmACYQW9H0LTvlAEiJzlU1ru', 1),
(2, 2, 'cliente@jacketscorp.com', '$2y$10$4aAmd.mkQrA1UNjSPTGj9.lB43WqKgMmKxS/QKPl6KjMcDlIGV.32', 1),
(5, 1, 'admin@stylejackets.com', '$2y$10$P6HqDaslFwC4ESkhC/wbf.vnaMRxMbciU2iw.qaVr7a3HRaQdgtwO', 1),
(6, 2, 'cliente2@gmail.com', '$2y$10$/AR8QR2lqxdQ94By22SSnOa7RSdAIkccPVbuDOuAyI1VnRieeYQ6S', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
