-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-05-2020 a las 21:45:18
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
(10, 'Kids'),
(11, 'Vestidos'),
(12, 'Faldas'),
(16, 'Billeteras'),
(17, 'Relojes'),
(18, 'Maletas y Morrales'),
(19, 'Cinturones'),
(20, 'Gafas');

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
(41, 27, 32, 2),
(42, 28, 28, 1);

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
(27, 16, 'Putumayo', 'Mocoa', 'Manzana E #3 B/Villa Sofia', 193700.00, 'confirmado', '2020-05-18', '21:22:31'),
(28, 16, 'Putumayo', 'Mocoa', 'Manzana E #3 B/Villa Sofia', 188900.00, 'confirmado', '2020-05-19', '14:57:31');

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
(38, 10, 'Bocared', 'CAMISETA CUELLO REDONDO', 14900.00, 65, NULL, '2020-05-18', 'bocared-.jpg'),
(39, 11, 'Desigual', 'Vestido Blanco-Multicolor Desigual  \r\nGénero: Femenino  \r\nTipo de Producto: Vestido  \r\nColor: Blanco-Multicolor  \r\nActividad: Casual  \r\nMaterial: Viscosa  \r\nCuidados Especiales: Temperatura máxima 30ºc proceso moderado, lavar separadamente, lavar por el revés.  \r\nFit: Regular Fit  \r\nTipo de Cuello: Redondo  \r\nTipo de Manga: Corta  \r\nMedida Largo Total: 92cm  \r\nMedida Torso/Busto: 90cm  \r\nMedida Cintura: 86cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Diseño casual a un tono con estampado floral multicolor y terminaciones finamente reforzadas.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: S', 187900.00, 65, NULL, '2020-05-19', 'vestido.jpg'),
(40, 11, 'Active', 'Vestido negro Active, confeccionado en algodón y spandex, diseño casual de textura suave a un tono, corte semi y tiro largo. Tiene cuello redondo, manga sisa y dobladillos en sus terminaciones. \r\n \r\nLa talla S mide: Largo total 109 / Busto 70 / Cintura 66cm.\r\n \r\nProducto importado. \r\n \r\nRecuerda que la talla en el empaque y en el producto puede diferir con la numeración colombiana, esto se debe a las medidas utilizadas por el país de origen de cada producto. Puedes probártelo antes de solicitar el cambio.', 40900.00, 45, NULL, '2020-05-19', 'active.jpg'),
(41, 11, 'MNG', 'Vestido Azul-Rosa-Verde MNG  \r\nOcasión: Casual  \r\nMaterial Principal: Poliéster  \r\nCuidados Especiales: Temperatura maxima 30ºc proceso moderado,lavar separadamente, lavar por el reves.  \r\nTipo de Corte: Semi Fit  \r\nTipo de Cuello: Solapa  \r\nTipo de Manga: Corta  \r\nTipo de Cierre: Botones  \r\nDetalle Especial: Diseño casual a un tono con estampado floral en rosa, verde y blanco.  \r\nTipo Tiro: Medio  \r\nTalla: S  \r\nMedida Largo Total: 92cm  \r\nMedida Torso/Busto: 96cm  \r\nMedida Cintura: 92cm  \r\nOrigen: Producto Importado  \r\nRecomendación: Recuerda que la talla en el empaque y en el producto puede diferir con la numeración colombiana, esto se debe a las medidas utilizadas por el país de origen de cada producto. Puedes probártelo antes de solicitar el cambio.', 58900.00, 50, NULL, '2020-05-19', 'mango.jpg'),
(42, 12, 'Glamorous', 'Falda Verde-Multicolor Glamorous  \r\nGénero: Femenino  \r\nTipo de Producto: Falda  \r\nColor: Verde-Multicolor  \r\nActividad: Casual  \r\nTipo de Cierre: Cremallera Lateral  \r\nMaterial: Poliéster  \r\nCuidados Especiales: Lavar a máquina lavadora con agua fría 30ºC, ciclo delicado con colores similares, lavar con jabón suave, no exprimir.  \r\nFit: Semi Fit  \r\nTipo de Tiro: Medio  \r\nMedida Largo Total: 43cm  \r\nMedida Cintura: 62cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Diseño casual con estampado floral multicolor y terminaciones finamente reforzadas.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: XS', 53900.00, 60, NULL, '2020-05-19', 'glamorous.jpg'),
(43, 12, 'Karibik', 'Falda ajustada talle alto. La modelo mide 1,70 y usa talla 8 MATERIAL: ALGODON 100%', 79900.00, 45, NULL, '2020-05-19', 'karibik.jpg'),
(44, 12, 'Active', 'Falda Azul Navy Active  \r\nGénero: Femenino  \r\nTipo de Producto: Falda  \r\nColor: Azul Navy  \r\nActividad: Casual  \r\nMaterial: Rayón  \r\nCuidados Especiales: Temperatura máxima 30ºc proceso moderado, lavar separadamente, lavar por el revés.  \r\nFit: Slim Fit  \r\nTipo de Tiro: Alto  \r\nMedida Largo Total: 66cm  \r\nMedida Cintura: 68cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Diseño casual a un tono con finas costuras reforzadas y sutil abertura en la parte posterior que genera contraste.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.  \r\nTalla: S', 57900.00, 45, NULL, '2020-05-19', 'active-5.jpg'),
(45, 16, 'Guess', 'Billetera Negra GUESS  \r\nGénero: Femenino  \r\nTipo de Producto: Billetera  \r\nColor: Negra  \r\nActividad: Casual  \r\nMaterial: Cloruro de polivinilo  \r\nMaterial Interno: Poliéster  \r\nTipo de Cierre: Cremallera  \r\nCompartimentos: Sencillo  \r\nMedida Largo: 12cm  \r\nMedida Ancho : 22cm  \r\nMedida Fondo: 3cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Estilo casual a un tono con placa metálica en la parte frontal en plateado,bolsillo externo de textura semi corrugada.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.', 156900.00, 90, NULL, '2020-05-19', 'guess-.jpg'),
(46, 16, 'Kenneth Cole', 'Billetera Rojo KENNETH COLE  \r\nGénero: Femenino  \r\nTipo de Producto: Billetera  \r\nColor: Rojo  \r\nActividad: Rojo  \r\nMaterial: Poliuretano  \r\nMaterial Interno: Poliéster  \r\nTipo de Cierre: Broche  \r\nCompartimentos: Compartimento principal-bolsillo estilo monedero-tarjeteros.  \r\nMedida Largo: 10.5cm  \r\nMedida Ancho : 22cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Diseño casual de textura semi corrugada, detalle metalizado en dorado referente a la marca, finas costuras visibles y terminaciones reforzadas.  \r\nRecomendación: Puedes probarlo antes de solicitar el cambio.', 90900.00, 70, NULL, '2020-05-19', 'kenneth-cole-.jpg'),
(47, 16, 'Desigual', 'Billetera Beige-Café Desigual  \r\nGénero: Femenino  \r\nTipo de Producto: Billetera  \r\nColor: Beige-Café  \r\nActividad: Casual  \r\nMaterial: Poliuretano  \r\nMaterial Interno: Algodón  \r\nTipo de Cierre: Cremallera-solapa con broche  \r\nCompartimentos: Compartimento principal-bolsillo estilo monedero-tarjeteros.  \r\nMedida Largo: 10cm  \r\nMedida Ancho : 19.5cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Diseño casual a dos tonos con figuras troqueladas, textura efecto reptil, detalle repujado referente a la marca, finas costuras visibles y terminaciones reforzadas.  \r\nRecomendación: Puedes probarlo antes de solicitar el cambio.', 166900.00, 70, NULL, '2020-05-19', 'desigual.jpg'),
(48, 17, 'Technomarine', 'Colección: Uf6.\r\nGénero: Masculino.\r\nTono de la banda: Gris oscuro.\r\nTono de la caja: Negro.\r\nColor del tablero: Negro.\r\nMaterial de la banda: Silicona.\r\nMaterial de la caja: Acero.\r\nAncho de la banda (mm): 26.\r\nLargo de la Banda (mm): 210.\r\nAncho de la caja (mm): 48.\r\nResistencia al agua (m): 200.\r\nTipo de movimiento: Quarzo.\r\nGarantía de 2 años por Defectos de Fabricación. No aplica para Pulsos o Cristales.\r\nProducto sujeto a inspección aduanal, lo cual puede variar el tiempo de entrega.', 992900.00, 10, NULL, '2020-05-19', 'technomarine-.jpg'),
(49, 17, 'Invicta', 'Colección: Bolt\r\nGenero: Hombres\r\nTono de la banda: Oro\r\nTono de la caja: Oro\r\nColor del tablero: Azul\r\nMaterial del cristal: Flame Fusion\r\nMaterial de la banda: Acero inoxidable\r\nMaterial de la caja: Acero inoxidable\r\nTamaño Caja: 52\r\nAncho de la banda (mm): 26\r\nLargo de la banda (mm): 185\r\nResistencia al agua (m): 100M\r\nTipo de movimiento: Cuarzo\r\nGarantía de 2 años por Defectos de Fabricación. No aplica para Pulsos o Cristales.\r\nProducto sujeto a inspeccion aduanal, lo cual puede variar el tiempo de entrega.', 1246900.00, 10, NULL, '2020-05-19', 'invicta-.jpg'),
(50, 17, 'Vintage Accessories', 'Reloj Winner Relojes para hombre, inspirado en el mejor estilo actual, está diseñado para el hombre deportivo y multifuncional, desarrollo tecnológico para hacer de este modelo, más que un reloj.\r\n\r\nEspecificaciones Generales: Marca Winner, estilo casual y deportivo, movimiento automatico, banda en acero inoxidable , resistente al agua, diámetro caja 4.8 cm, longitud total 20.8 cm', 99900.00, 30, NULL, '2020-05-19', 'vintage.jpg'),
(51, 18, 'Velez', 'Morral Azul Vélez  \r\nGénero: Masculino  \r\nTipo de Producto: Morral  \r\nColor: Azul  \r\nActividad: Casual  \r\nMaterial: Poliéster/Cuero  \r\nMaterial Interno: Poliéster  \r\nTipo de Cierre: Cremallera  \r\nTipo de Correa: Manos Libres  \r\nCompartimentos: Bolsillo frontal  \r\nTipo Soporte: Metálico  \r\nMedida Largo: 43cm  \r\nMedida Ancho : 32cm  \r\nMedida Fondo: 13cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Morral unicolor con multicompartimentos, este accesorio cuenta con costuras de alta precisión, iniciales de la marca tejidas en las correas y una placa metálica con el nombre en la cara frontal. El compartimiento principal es amplio y forrado en poliéster. Cuenta con un sistema de carga para tu movil visible en un costado del morral.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.', 215900.00, 100, NULL, '2020-05-19', 'velez-.jpg'),
(52, 18, 'Royal County Of Berkshire', 'Morral Verde Royal County of Berkshire Polo Club  \r\nGénero: Masculino  \r\nTipo de Producto: Morral  \r\nColor: Verde  \r\nActividad: Informal  \r\nMaterial: Poliéster  \r\nTipo de Cierre: Cremallera  \r\nTipo de Correa: Correas de Hombros  \r\nCompartimentos: Sencillo-bolsillo externo  \r\nMedida Largo: 45cm  \r\nMedida Ancho : 37cm  \r\nMedida Fondo: 14cm  \r\nMedida Correa: 60cm  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Estilo casual a un tono con bolsillo externos, laterales, espacio para laptop y forro en su interior.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.', 79900.00, 90, NULL, '2020-05-19', 'royal-county-of-berkshire.jpg'),
(53, 18, 'Guess', 'Morral Azul GUESS. Elaborado en  poliéster y poliuretano, diseño con parche sintético alusivo a la marca. El compartimiento principal cuenta con forro poliéster con  cierre cremallera, compartimiento para laptop, correa  de hombros graduables, asa de manos tejida con broche de ajuste. Sus medidas son alto 45cm, ancho 28cm y fondo 13cm.', 112900.00, 100, NULL, '2020-05-19', 'guess-5.jpg'),
(54, 19, 'Nautica', 'Cinturón Doble Faz Negro-Miel Nautica  \r\nGénero: Masculino  \r\nTipo de Producto: Cinturón Doble Faz  \r\nColor: Negro-Miel  \r\nActividad: Casual  \r\nMaterial: Cuero  \r\nMedida Largo: 106.5cm  \r\nMedida Ancho : 3cm  \r\nTipo de Hebilla: Giratória  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Diseño casual a un tono de textura lisa, detalle grabado referente a la marca, hebilla en plateado y terminaciones finamente reforzadas. Talla:34  \r\nRecomendación: Puedes probarlo antes de solicitar el cambio.', 146900.00, 50, NULL, '2020-05-19', 'nautica-36.jpg'),
(55, 19, 'Tannino', 'Cinturón Café Tannino  \r\nGénero: Masculino  \r\nTipo de Producto: Cinturón  \r\nColor: Café  \r\nActividad: Café  \r\nMaterial: Sintético/Cuero  \r\nMedida Largo: 108cm  \r\nMedida Ancho : 3.2cm  \r\nTipo de Hebilla: Para ojales  \r\nOrigen: Producto nacional  \r\nDetalle Especial: Diseño casual a un tono de textura lisa, detalle grabado referente a la marca, finas costuras visibles y terminaciones reforzadas. Talla 32  \r\nRecomendación: Puedes probarlo antes de solicitar el cambio.', 41900.00, 150, NULL, '2020-05-19', 'tannino-1.jpg'),
(56, 19, 'Velez', 'Cinturón Café Vélez  \r\nGénero: Masculino  \r\nTipo de Producto: Cinturón  \r\nColor: Café  \r\nActividad: Casual  \r\nMaterial: Cuero  \r\nTipo de Cierre: Hebilla  \r\nMedida Largo: 107cm  \r\nMedida Ancho : 3.5cm  \r\nTipo de Hebilla: Para ojales  \r\nOrigen: Producto nacional  \r\nDetalle Especial: Estilo casual a un tono, semi corrugado , hebilla en plateado, ojales graduables y trabilla.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.', 57900.00, 150, NULL, '2020-05-19', 'velez-37.jpg'),
(57, 20, 'TIMBERLAND', 'Gafas Tortuga TIMBERLAND  \r\nGénero: Masculino  \r\nTipo de Producto: Gafas  \r\nColor: Tortuga  \r\nActividad: Casual  \r\nMaterial de Montura: Acetato  \r\nMedida Lente: 54mm  \r\nMedida Puente: 21mm  \r\nLongitud Patillas: 145mm  \r\nMedida Largo: 40mm  \r\nMedida Ancho : 140mm  \r\nTipo de Lente: Polarizado  \r\nForma de Marco: Cuadrada  \r\nColor del Lente: Azules  \r\nTipo de Puente: Sencillo  \r\nTipo de Filtro: 3P: Filtro vertical que bloquea la luz del sol que llega a los ojos de forma horizontal.  \r\nProtector Nasal: Fija  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Modelo puente sencillo, lentes azules polarizados con efecto espejo, el nombre de la marca grabado en las patillas.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.', 248900.00, 200, NULL, '2020-05-19', 'timberland-9.jpg'),
(58, 20, 'Ray Ban', 'Gafas doradas Ray Ban, elaboradas en acetato, diseño casual con montura ovalada, efecto carey que genera contraste, bisagras resistentes, brazos delgados y final curvo. Tiene lentes en policarbonato con efecto espejo, precisión óptica, resistencia a impactos, protección UV, categoría de filtro 3N- alta protección contra la luz intensa del sol-, y puente moldeado para mayor comodidad. Sus medidas son alto 5.5cm y ancho 14.5cm. Incluye estuche.', 334900.00, 200, NULL, '2020-05-19', 'ray-ban-.jpg'),
(59, 20, 'Oakley', 'Gafas Gris-Verde Oakley OO9420  \r\nGénero: Masculino  \r\nTipo de Producto: Gafas  \r\nReferencia Producto: OO9420  \r\nColor: Gris-Verde  \r\nActividad: Deportivo  \r\nMaterial de Montura: Acetato  \r\nMedida Lente: 40mm  \r\nMedida Puente: 14mm  \r\nLongitud Patillas: 145mm  \r\nMedida Largo: 150mm  \r\nForma de Marco: Cuadrada  \r\nColor del Lente: Verdes  \r\nTipo de Puente: Sencillo  \r\nTipo de Filtro: 3N: Gracias al tinte de sus lentes, su uso es óptimo cuando existan condiciones de luminosidad bastante altas (primavera, verano, playa, montaña y zonas al aire libre) ya que son capaces de bloquear entre un 82% y un 92% de luz. No son aptas para la conducción nocturna.  \r\nProtector Nasal: Fija  \r\nTecnología: Prizm Polarizadas: El contraste y la visibilidad insuperables de las Prizm con las características antirresplandor de las Oakley HDPolarized.  \r\nOrigen: Producto Importado  \r\nDetalle Especial: Con características de rendimiento envueltas en un diseño Lifestyle, los Anorak de Oakley® pueden pasar fácilmente de la vida cotidiana a las aventuras activas.  \r\nRecomendación: Puedes probártelo antes de solicitar el cambio.', 342900.00, 200, NULL, '2020-05-19', 'oakley-.jpg');

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
(18, 'Jeison', 'Calvache', 'jeison@jeison.com', '$2y$04$vmGst2MlMxDS11VLbtoi.eQlGB18lAxxybptOFeQUkTCb2v8PhKla', 'admin', NULL);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `lineas_pedidos`
--
ALTER TABLE `lineas_pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
