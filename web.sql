-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2025 a las 15:56:15
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
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Alimentos'),
(2, 'Electrónica'),
(3, 'Ropa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `contenido` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `contenido`, `usuario_id`, `fecha`) VALUES
(1, 'Final Fantasy VII Remake', 'En este post te explico paso a paso cómo derrotar a Sephiroth con las mejores estrategias y equipos. ¡Prepárate para el desafío final!', 73, '2025-03-09 15:17:22'),
(2, 'Skyrim', 'Descubre los 10 mejores mods que mejoran gráficos, jugabilidad y contenido. ¡Transforma tu aventura nórdica en 2025!', 74, '2025-03-09 00:29:21'),
(3, 'Cyberpunk 2077', 'Exploramos las mejoras de la última actualización, bugs resueltos y nuevas misiones. ¿Vale la pena volver a Night City?', 75, '2025-03-09 00:29:21'),
(4, 'Call of Duty: Black Ops 6', 'Aprende los mejores movimientos, mapas y configuraciones para liderar las tablas de clasificación en el multijugador. ¡A por la victoria!', 76, '2025-03-09 00:29:21'),
(5, 'The Legend of Zelda: Tears of the Kingdom', 'Un repaso a la inspiración y desarrollo de este épico juego de Nintendo. ¡Descubre los secretos de Hyrule!', 77, '2025-03-09 00:29:21'),
(6, 'Minecraft', 'Desde la elección del terreno hasta defensas contra creepers, aquí tienes todo para crear tu refugio perfecto.', 78, '2025-03-09 00:29:21'),
(7, 'Starfield', 'Opiniones sobre la exploración, combate y narrativa de este ambicioso título de Bethesda. ¿Es un éxito o un fallo?', 79, '2025-03-09 00:29:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `codigo_barras` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `categoria_id`, `nombre`, `precio`, `codigo_barras`, `stock`) VALUES
(31, 1, 'Manzanas Fuji', 153.00, '1234456789012', 100),
(35, 3, 'Zapatillas Deportivas', 45000.00, '123456789016', 150),
(36, 1, 'Cerveza Artesanal', 220.00, '123456789017', 75),
(37, 2, 'Cargador Rápido USB', 850.00, '123456789018', 500),
(38, 2, 'Teclado Mecánico', 3200.00, '123456789019', 300),
(39, 1, 'Chocolate Amargo', 180.00, '123456789020', 120),
(40, 2, 'Monitor 24 Pulgadas', 12500.00, '123456789021', 30),
(41, 1, 'Agua Mineral', 80.00, '123456789022', 1000),
(42, 2, 'Alfombrilla de Ratón', 250.00, '123456789023', 400),
(43, 3, 'Camisa Casual', 750.00, '123456789024', 250),
(44, 3, 'Silla Gamer', 8900.00, '123456789025', 50),
(45, 1, 'Libro de Cocina', 600.00, '123456789026', 120),
(46, 3, 'Camiseta Deportiva', 400.00, '123456789027', 300),
(47, 1, 'Bebida Energética', 95.00, '123456789028', 500),
(48, 2, 'Batería Externa', 1500.00, '123456789029', 100),
(49, 2, 'Lente Fotográfico', 18500.00, '123456789030', 10),
(50, 3, 'Sandalias Verano', 350.00, '123456789031', 300),
(51, 1, 'Mermelada Natural', 200.00, '123456789032', 600),
(52, 2, 'Bicicleta Montaña', 25000.00, '123456789033', 30),
(53, 2, 'Auriculares de Diadema', 2800.00, '123456789034', 200),
(54, 3, 'Sudadera con Capucha', 1200.00, '123456789035', 150),
(55, 1, 'Vino Tinto Reserva', 1500.00, '123456789036', 120),
(56, 1, 'Papel Higiénico Pack', 300.00, '123456789037', 1000),
(57, 2, 'Linterna LED', 550.00, '123456789038', 250),
(58, 1, 'Cápsulas de Café', 900.00, '123456789039', 500),
(59, 3, 'Planta Decorativa', 450.00, '123456789040', 100),
(60, 2, 'Reloj Deportivo', 3800.00, '123456789041', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `nombre_completo`, `email`, `telefono`, `password`) VALUES
(73, 'ismael', 'Guerrero', 'iguemar@example.com', '123456789', 'password1'),
(74, 'maria', 'María García', 'maria.garcia@example.com', '5555678', 'password2'),
(75, 'carlos', 'Carlos Sánchez', 'carlos.sanchez@example.com', '5559012', 'password3'),
(76, 'ana', 'Ana Martínez', 'ana.martinez@example.com', '5553456', 'password4'),
(77, 'luis', 'Luis Fernández', 'luis.fernandez@example.com', '5557890', 'password5'),
(78, 'paula', 'Paula López', 'paula.lopez@example.com', '5551235', 'password6'),
(79, 'diego', 'Diego Gómez', 'diego.gomez@example.com', '5555679', 'password7'),
(80, 'sofia', 'Sofía Ruiz', 'sofia.ruiz@example.com', '5559013', 'password8'),
(81, 'adriana', 'Adriana Torres', 'adriana.torres@example.com', '5553457', 'password9'),
(82, 'fernando', 'Fernando Vargas', 'fernando.vargas@example.com', '5557891', 'password10'),
(83, 'alejandro', 'Alejandro Morales', 'alejandro.morales@example.com', '5551236', 'password11'),
(84, 'veronica', 'Verónica Rojas', 'veronica.rojas@example.com', '5555670', 'password12'),
(85, 'sergio', 'Sergio Castro', 'sergio.castro@example.com', '5559014', 'password13'),
(86, 'isabel', 'Isabel Mendoza', 'isabel.mendoza@example.com', '5553458', 'password14'),
(87, 'javier', 'Javier Herrera', 'javier.herrera@example.com', '5557892', 'password15'),
(88, 'valeria', 'Valeria Ortiz', 'valeria.ortiz@example.com', '5551237', 'password16'),
(89, 'roberto', 'Roberto Ramos', 'roberto.ramos@example.com', '5555671', 'password17'),
(90, 'carolina', 'Carolina Silva', 'carolina.silva@example.com', '5559015', 'password18'),
(91, 'miguel', 'Miguel Peña', 'miguel.pena@example.com', '555345', 'password19'),
(92, 'camila', 'Camila Chávez', 'camila.chavez@example.com', '5557893', 'password20'),
(93, 'victor', 'Víctor Castillo', 'victor.castillo@example.com', '5551238', 'password21'),
(94, 'monica', 'Mónica Navarro', 'monica.navarro@example.com', '5555672', 'password22'),
(95, 'ignacio', 'Ignacio Delgado', 'ignacio.delgado@example.com', '5559016', 'password23'),
(96, 'laura', 'Laura Aguilar', 'laura.aguilar@example.com', '5553460', 'password24'),
(97, 'andres', 'Andrés Serrano', 'andres.serrano@example.com', '5557894', 'password25'),
(98, 'patricia', 'Patricia Cortés', 'patricia.cortes@example.com', '5551239', 'password26'),
(99, 'esteban', 'Esteban Figueroa', 'esteban.figueroa@example.com', '5555673', 'password27'),
(100, 'natalia', 'Natalia Carrillo', 'natalia.carrillo@example.com', '5559017', 'password28'),
(101, 'ricardo', 'Ricardo Paredes', 'ricardo.paredes@example.com', '5553461', 'password29'),
(102, 'mariana', 'Mariana Valenzuela', 'mariana.valenzuela@example.com', '5557895', 'password30'),
(103, 'Andrea', 'Andrea López Pérez', 'andrea@example.com', '123456788', 'andrea');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
