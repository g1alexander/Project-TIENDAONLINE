-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-05-2020 a las 02:23:18
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(6, 'Manga Larga'),
(7, 'Chaquetas y Chalecos'),
(8, 'Nike'),
(9, 'Adidas'),
(10, 'Kids');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_pedidos`
--

CREATE TABLE `lineas_pedidos` (
  `id` int(255) NOT NULL,
  `pedido_id` int(255) NOT NULL,
  `producto_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `lineas_pedidos`
--

INSERT INTO `lineas_pedidos` (`id`, `pedido_id`, `producto_id`, `unidades`) VALUES
(37, 26, 35, 1),
(38, 26, 28, 2),
(39, 26, 24, 2),
(40, 27, 37, 1),
(41, 27, 32, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL,
  `departamento` varchar(100) COLLATE utf8_bin NOT NULL,
  `municipio` varchar(100) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(255) COLLATE utf8_bin NOT NULL,
  `coste` float(200,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `departamento`, `municipio`, `direccion`, `coste`, `estado`, `fecha`, `hora`) VALUES
(26, 16, 'Putumayo', 'Mocoa', 'Manzana E #3 B/Villa Sofia', 737500.00, 'confirmado', '2020-05-18', '21:21:17'),
(27, 16, 'Putumayo', 'Mocoa', 'Manzana E #3 B/Villa Sofia', 193700.00, 'confirmado', '2020-05-18', '21:22:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(255) NOT NULL,
  `categoria_id` int(255) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin,
  `precio` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `oferta` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`) VALUES
(24, 6, 'US Polo Assn', 'Camisa Azul Us Polo Assn  \r\nGénero: Masculino  \r\nTipo de Producto: Camisa  \r\nColor: Azul  \r\nActividad: Casual  \r\nTipo de Cierre: Botones  \r\nMaterial: Algodón  \r\nCuidados Especiales: No usar blanqueador  \r\nFit: Custom Fit  \r\nTipo de Cuello: Cutaway  \r\nTipo de Manga: Larga  \r\nMedida Torso/Busto: 71cm  \r\nMedida Cintura: 100cm  \r\nMedida Bota: 98cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Estilo casual a un tono con bordado de la marca en azul oscuro  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: M', 64900.00, 25, NULL, '2020-05-18', 'polo.jpg'),
(25, 6, 'US Polo Assn', 'Camisa Rosa Us Polo Assn  \r\nGénero: Masculino  \r\nTipo de Producto: Camisa  \r\nColor: Rosa  \r\nActividad: Casual  \r\nTipo de Cierre: Botón Frontal  \r\nMaterial: Algodón  \r\nCuidados Especiales: Lavar con colores similares/no usar suavisantes/ retirar inmediatamente de la lavadora/ no doblar prenda mojada/ no planchar directamente sobre el diseño/ no lavar profesionalmente en húmedo.  \r\nFit: Custom Fit  \r\nTipo de Cuello: Solapa  \r\nTipo de Manga: Larga  \r\nMedida Largo Total: 72cm  \r\nMedida Torso/Busto: 110cm  \r\nMedida Cintura: 114cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Camisa casual a un color, elegante y sencilla, cuenta con bolsillo frontal y el clásico logo de jugador de polo bordado.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: M', 71900.00, 20, NULL, '2020-05-18', 'polorojo.jpg'),
(26, 6, 'US Polo Assn', 'Camisa Negro Us Polo Assn  \r\nGénero: Masculino  \r\nTipo de Producto: Camisa  \r\nColor: Negro  \r\nActividad: Casual  \r\nTipo de Cierre: Botones  \r\nMaterial: Algodón  \r\nCuidados Especiales: No usar blanqueador  \r\nFit: Custom Fit  \r\nTipo de Cuello: Cutaway  \r\nTipo de Manga: Larga  \r\nMedida Torso/Busto: 67cm  \r\nMedida Cintura: 110cm  \r\nMedida Bota: 108cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Estilo casual a un tono con bordado de la marca en negro.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: M', 66900.00, 30, NULL, '2020-05-18', 'polonegro.jpg'),
(27, 7, 'Tommy Hilfiger', 'Chaqueta Rojo-Azul Tommy Hilfiger  \r\nGénero: Masculino  \r\nTipo de Producto: Chaqueta  \r\nColor: Rojo-Azul  \r\nActividad: Informal  \r\nTipo de Cierre: Cremallera  \r\nMaterial: Poliéster  \r\nCuidados Especiales: No usar blanqueador  \r\nFit: Regular Fit  \r\nTipo de Cuello: Redondo  \r\nTipo de Manga: Larga  \r\nMedida Largo Total: 70cm  \r\nMedida Torso/Busto: 108cm  \r\nMedida Cintura: 100cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Estilo informal a un tono con logo de la marca en el pecho, bolsillos laterales con ajuste botón, terminaciones acaneladas.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: M', 434900.00, 15, NULL, '2020-05-18', 'tommy-hilfiger.jpg'),
(28, 7, 'Jack & Jones', 'Chaqueta Negro Jack & Jones  \r\nOcasión: Casual  \r\nMaterial Principal: Poliuretano  \r\nCuidados Especiales: Temperatura maxima 30ºc proceso moderado,lavar separadamente, lavar por el reves.  \r\nTipo de Corte: Semi Fit  \r\nTipo de Cuello: Redondo  \r\nTipo de Manga: Larga  \r\nTipo de Cierre: Cremallera  \r\nDetalle Especial: Diseño casual a un tono con bolsillos frontales con cierres en cremallera y finas costuras visibles.  \r\nTalla: M  \r\nMedida Largo Total: 70cm  \r\nMedida Torso/Busto: 104cm  \r\nMedida Cintura: 98cm  \r\nOrigen: Producto Importado  \r\nRecomendación: Recuerda que la talla en el empaque y en el producto puede diferir con la numeración colombiana, esto se debe a las medidas utilizadas por el país de origen de cada producto. Puedes probártelo antes de solicitar el cambio.', 188900.00, 25, NULL, '2020-05-18', 'jack-jones.jpg'),
(29, 7, 'Nautica', 'Chaqueta Azul-Amarillo Nautica  \r\nGénero: Masculino  \r\nTipo de Producto: Chaqueta  \r\nColor: Azul-Amarillo  \r\nActividad: Informal  \r\nTipo de Cierre: Cremallera  \r\nMaterial: Nylon  \r\nCuidados Especiales: No usar blanqueador/ No planchar.  \r\nFit: Regular Fit  \r\nTipo de Cuello: Redondo  \r\nTipo de Manga: Larga  \r\nMedida Largo Total: 66cm  \r\nMedida Torso/Busto: 100cm  \r\nMedida Cintura: 98cm  \r\nTecnología: Water Resistant: Resistente al agua.  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Estilo informal a dos tonos con bolsillos laterales con botón de ajuste, logo bordado y forro interno.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: M', 282900.00, 20, NULL, '2020-05-18', 'nautica.jpg'),
(30, 8, 'Nike', 'Morral azul navy Nike Classic Line, elaborado en poliéster, diseño casual de textura suave a un tono con estampado que contrasta, detalle alusivo a la marca y finas costuras visibles. Tiene compartimiento amplio, organizadores, cierre cremallera, asa de mano, bolsillos externos, tipo malla en lateral, correas de hombros graduables y bordes reforzados. Sus medidas son alto 43.5cm, ancho 28cm y fondo 15cm', 118900.00, 30, NULL, '2020-05-18', 'morral.jpg'),
(31, 8, 'Nike', 'Tenis Lifestyle Blanco-Plateado Nike Air Heights  \r\nGénero: Femenino  \r\nTipo de Producto: Tenis Lifestyle  \r\nReferencia: Air Heights  \r\nColor: Blanco-Plateado  \r\nActividad: Lifestyle  \r\nTipo de Cierre: Cordón  \r\nMaterial Externo: Cuero/Textil  \r\nMaterial Interno: Textil  \r\nMaterial Suela: Sintético  \r\nTipo de Punta: Redonda  \r\nTipo de Lengüeta: Corrida  \r\nTipo de Plantilla: Fija  \r\nTerminado: Vulcanizado  \r\nOrigen: Producto Importado  \r\nTallaje: Numeración Americana  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.', 244900.00, 50, NULL, '2020-05-18', 'zapatos.jpg'),
(32, 8, 'Nike', 'Gorra Nike RF Aerobill H86-Negro\r\nLa gorra de tenis Nike Court Aerobill Heritage 86 Roger Federer es una gorra de 6 paneles fabricada con tecnología AeroBill que absorbe el sudor para un confort ligero y transpirable. Esta gorra tiene un cierre ajustable en la parte posterior para un ajuste perfecto, y tiene ojales para mayor ventilación. Logotipo de RF en la parte delantera y Federer impreso en la parte posterior.\r\n\r\nGarantía de 1 mes por defectos de fábrica.', 85900.00, 60, NULL, '2020-05-18', 'gorra.jpg'),
(33, 9, 'adidas Originals', 'Leggins Azul-Blanco adidas Originals \r\nGénero: Femenino  \r\nTipo de Producto: Leggins  \r\nColor: Azul-Blanco  \r\nActividad: Deportivo  \r\nMaterial: Poliéster  \r\nCuidados Especiales: Temperatura máxima 30ºc proceso moderado, lavar separadamente, lavar por el revés.  \r\nFit: Skinny  \r\nTipo de Bota: Skinny  \r\nTipo de Tiro: Medio  \r\nMedida Largo Total: 69.5cm  \r\nMedida Cintura: 56cm  \r\nMedida Bota: 11cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Diseño deportivo a un tono con detalles en blanco, logo estampado en blanco y terminaciones finamente reforzadas.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: S', 116900.00, 50, NULL, '2020-05-18', 'leggis.jpg'),
(34, 9, 'adidas Performance', 'Chaqueta Naranja adidas Performance TraceRock Ho Fi  \r\nGénero: Masculino  \r\nTipo de Producto: Chaqueta  \r\nReferencia Producto: TraceRock Ho Fi  \r\nColor: Naranja  \r\nActividad: Deportivo  \r\nMaterial: Poliéster  \r\nCuidados Especiales: No usar blanqueador  \r\nFit: Slim Fit  \r\nTipo de Cuello: Redondo  \r\nTipo de Manga: Larga  \r\nMedida Largo Total: 67cm  \r\nMedida Torso/Busto: 94cm  \r\nMedida Cintura: 86cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: El corte ajustado, la capucha y el tejido de suave felpa ofrece flexibilidad incorporada para total libertad de movimiento.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: S', 134900.00, 30, NULL, '2020-05-18', 'chaquetanaranja.jpg'),
(35, 9, 'adidas Performance', 'Tenis Basketball Negro-Blanco adidas Performance Hoops 2.0 Mid  \r\nGénero: Masculino  \r\nTipo de Producto: Tenis Basketball  \r\nReferencia: Hoops 2.0 Mid  \r\nColor: Negro-Blanco  \r\nActividad: Lifestyle  \r\nTipo de Cierre: Cordón  \r\nMaterial Externo: Sintético/Textil  \r\nMaterial Interno: Textil  \r\nMaterial Suela: Sintético  \r\nMedida Caña: 8cm  \r\nMedida Collarín: 9cm  \r\nTipo de Punta: Redonda  \r\nTipo de Lengüeta: Corrida  \r\nTipo de Plantilla: Fija  \r\nTerminado: Vulcanizado  \r\nOrigen: Producto Importado  \r\nTallaje: Numeración Americana  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio', 229900.00, 70, NULL, '2020-05-18', 'adidas.jpg'),
(36, 10, 'Marketing Personal', 'Conjunto Infantil Femenino Verde Límon Marketing Personal.\r\nTipo de Producto: Conjunto.\r\nMaterial Principal: Elastano.\r\nDetalle Especial: Diseño Casual Con Color Verde Límon Que Genera Contraste.\r\nCuidados Especiales: Lave a mano, use jabón suave, no retuerza, no deje en remojo, seque a la sombra.\r\nOcasión: Casual.\r\nVive la nueva tendencia del mundo de la moda! Te presentamos una colección llena de textura y estampados perfecta para tu día a día y siéntete dando un primer paso al estilo.\r\nRecomendación: Recuerda que la talla en el empaque y en el producto puede diferir con la numeración colombiana, esto se debe a las medidas utilizadas por el país de origen de cada producto. Puedes probártelo antes de solicitar el cambio.\r\nTe recomendamos consultar la tabla de medidas para que escojas la talla correcta.\r\nOrigen: Producto Nacional.', 39999.00, 60, NULL, '2020-05-18', 'kids.jpg'),
(37, 10, 'Bocared', 'BLUSA,SILUETA AJUSTADA', 21900.00, 55, NULL, '2020-05-18', 'bocared.jpg'),
(38, 10, 'Bocared', 'CAMISETA CUELLO REDONDO', 14900.00, 65, NULL, '2020-05-18', 'bocared-.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `rol` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `rol`, `imagen`) VALUES
(1, 'brando', 'lopez', 'brando@gmail.com', 'prueba', 'admin', NULL),
(16, 'Jhon', 'Granados', 'alexlds26@gmail.com', '$2y$04$YQdLqQzijz7KggTIs89kmOsnPPH9/8Y9o2VnHdRQ5K5dm0NIhh29u', 'admin', NULL),
(17, 'Jeison', 'Calvache', 'jeison@jeison.com', '$2y$04$sSxZIP4bs60Bm6RoFNnU0O0TnHfyRGPANsa5a9RTGxFFOHw6iYi.W', 'admin', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_linea_pedido` (`pedido_id`),
  ADD KEY `fk_linea_producto` (`producto_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_usuario` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  ADD CONSTRAINT `fk_linea_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `fk_linea_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
