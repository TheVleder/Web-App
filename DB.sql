-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Servidor: mysql.webcindario.com
-- Tiempo de generación: 28-05-2023 a las 21:54:37
-- Versión del servidor: 5.7.30
-- Versión de PHP: 5.6.40-63+0~20220929.69+debian11~1.gbp639d4c

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carrete`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE IF NOT EXISTS `carta` (
  `nref` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `activo` varchar(3) NOT NULL,
  `alcohol` tinyint(1) NOT NULL,
  PRIMARY KEY (`nref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`nref`, `nombre`, `precio`, `stock`, `categoria`, `imagen`, `activo`, `alcohol`) VALUES
('001', 'Agua con gas', 1.99, 78, 'bebida', 'https://bebo-online.es/wp-content/uploads/2022/06/LANJARON-CON-GAS-VALIDO.png', 'si', 0),
('002', 'Agua sin gas', 2, 32, 'bebida', 'https://cdn.wikifarmer.com/market/es/images/thumbnails/1200/630/detailed/71/agua-mineral-con-gas-montepinos-botella-vidrio-azu_al2q-xj.jpg.jpg?t=1652302118', 'si', 0),
('003', 'Refresco de cola', 2.1, 86, 'bebida', 'https://www.carnescofetacasa.com/wp-content/uploads/2022/04/Min_CocaColaZero.png', 'si', 0),
('004', 'Refresco de limon', 1.5, 118, 'bebida', 'https://sushiup.es/120-thickbox_default/fanta-lim%C3%B3n.jpg', 'si', 0),
('005', 'Refresco de naranja', 2.5, 39, 'bebida', 'https://www.cocacola.es/content/dam/one/es/es2/fanta/productos/ft-bof-producto-460x280-limon.jpg', 'si', 0),
('006', 'Zumo de naranja', 2.2, 128, 'bebida', 'https://www.naranjatradicionaldegandia.com/sites/default/files/productos/glass_with_juice_3.jpg', 'si', 0),
('007', 'Zumo de piÃ±a', 2.6, 50, 'bebida', 'https://www.enjoysabadell.com/wp-content/uploads/beneficios-del-zumo-de-pin%CC%83a.jpg', 'si', 0),
('008', 'Zumo de manzana', 2.45, 59, 'bebida', 'https://a0.soysuper.com/d0d9178c4cd61f04bedc5c895754a34e.1500.0.0.0.wmark.7a007e36.jpg', 'si', 0),
('009', 'Limonada', 1.7, 0, 'bebida', 'https://fotografias.antena3.com/clipping/cmsimages01/2022/08/12/53988CCA-9E3F-4093-8413-8E14EA202209/como-hacer-limonada-casera-perfecta-saludable_98.jpg?crop=6720,3781,x0,y355&width=1900&height=1069&optimize=low&format=webply', 'si', 0),
('010', 'Nestea', 2.5, 112, 'bebida', 'https://i0.wp.com/www.eltalar.es/wp-content/uploads/2022/05/nestealimon.jpg?fit=1024%2C768&ssl=1', 'si', 0),
('011', 'Schweppes', 1.5, 63, 'bebida', 'https://5sentidos.es/wp-content/uploads/2020/10/SCHWEPPES-BOTELLA-DE-20-CL-5sentidos.png', 'si', 0),
('012', 'Aquarius', 1.95, 71, 'bebida', 'https://i0.wp.com/aporlacompra.com/wp-content/uploads/2020/11/aquarius.png?fit=512%2C512&ssl=1', 'no', 0),
('013', 'Cerveza rubia', 2.2, 49, 'bebida', 'https://www.mantequeriaandres.com/tienda/68-large_default/cerveza-rubia-la-cibeles.jpg', 'si', 1),
('014', 'Cerveza negra', 2.2, 44, 'bebida', 'https://static2.soloartesanas.es/2810-large_default/177.jpg', 'si', 1),
('015', 'Sangria', 2.2, 63, 'bebida', 'https://www.comedera.com/wp-content/uploads/2020/12/cocktail-5590755_1280.jpg', 'si', 1),
('016', 'Tinto de verano', 2.5, 43, 'bebida', 'https://www.enriquetomas.com/es/blog/wp-content/uploads/2018/06/Como-preparar-un-tinto-de-verano-2-1024x576.jpg', 'si', 1),
('017', 'Margarita', 4.2, 15, 'bebida', 'https://bakeitwithlove.com/wp-content/uploads/2021/09/Vodka-Margarita-sq.jpg', 'si', 1),
('018', 'PiÃ±a coladaÃ±', 6.95, 64, 'bebida', 'https://tamalesmexicanos.net/wp-content/uploads/2020/10/pina-colada-cocktail-1280.jpg', 'si', 1),
('019', 'Mojito', 6.95, 65, 'bebida', 'https://thefoodtech.com/wp-content/uploads/2022/07/mojito.jpg', 'si', 1),
('020', 'Ron', 6.95, 13, 'bebida', 'https://media.istockphoto.com/id/607759542/es/foto/vaso-de-ron-y-hielo.jpg?s=1024x1024&w=is&k=20&c=gsJjNWDbrIKSDehI4xwEYBkmwcIXhPJBWtqdNd9Rpkw=', 'si', 1),
('022', 'Aquarius Naranja', 1.99, 71, 'bebida', 'https://elvendedorambulante.es/69-large_default/aquarius-sabor-naranja-lata-33-cl.jpg', 'si', 0),
('024', 'Mojito de chili', 6.5, 20, 'bebida', 'https://media-cdn.tripadvisor.com/media/photo-s/1a/39/ff/8c/bebidas-exoticas.jpg', 'si', 1),
('025', 'Mosto', 16, 16, 'bebida', 'https://www.lavanguardia.com/files/og_thumbnail/uploads/2019/02/17/5e997e260feb2.jpeg', 'si', 0),
('026', 'Mojito manzana', 6.5, 52, 'bebida', 'https://media.glamour.mx/photos/63fbac8762e9478a3fe578a3/16:9/pass/Decoraci%C3%B3n%20de%20bebidas.jpg', 'si', 1),
('101', 'Tortilla de patatas', 5.9, 38, 'entrante', 'https://static2.abc.es/media/bienestar/2020/05/22/tortilla-patatas-k9tF--1200x630@abc.jpeg', 'si', 0),
('102', 'Croquetas de jamon', 6, 50, 'entrante', 'https://recetasdecocina.elmundo.es/wp-content/uploads/2018/11/receta-croquetas-jamon.jpg', 'si', 0),
('103', 'Pulpo a la gallega', 9.5, 36, 'entrante', 'https://cdn.elcocinerocasero.com/imagen/receta/1000/2022-07-06-12-02-26/pulpo-a-la-gallega.jpeg', 'si', 0),
('104', 'Gambas al ajillo', 9.85, 61, 'entrante', 'https://images.hola.com/imagenes/cocina/recetas/20211124200226/gambas-al-ajillo-receta-de-navidad/1-23-865/gambas-ajillo-t.jpg', 'si', 0),
('105', 'Calamares romana', 7.25, 41, 'entrante', 'https://cdn.elcocinerocasero.com/imagen/receta/1000/2022-05-25-21-02-06/calamares-a-la-romana.jpeg', 'si', 0),
('106', 'Ensaladilla rusa', 5.65, 64, 'entrante', 'https://www.hogarmania.com/archivos/201906/ensaladilla-rusa-xl-1280x720x80xX.jpg', 'si', 0),
('107', 'Berenjenas fritas', 6.95, 25, 'entrante', 'https://1.bp.blogspot.com/-zTUVmmycoRQ/XqypHZCf7FI/AAAAAAAAXE4/i-uKBW8vGgIzlYkZAuhx3iSYtRK-SaOtACNcBGAsYHQ/s1600/berenjenas%2Bfritas%2Bcon%2Bmiel.jpg', 'si', 0),
('108', 'Pan con jamon', 7.95, 35, 'entrante', 'https://storage.googleapis.com/avena-recipes/2019/10/1571783459093.jpeg', 'si', 0),
('109', 'Mejillones marinera', 5.95, 45, 'entrante', 'https://recetasdecocina.elmundo.es/wp-content/uploads/2018/11/receta-mejillones-marinera.jpg', 'si', 0),
('110', 'Tabla embutidos', 19.95, 30, 'entrante', 'https://www.ibericoscovap.com/blog/wp-content/uploads/2020/11/Tapa_iberica.jpg', 'si', 0),
('115', 'Ensalada', 9.95, 24, 'entrante', 'https://cdn0.recetasgratis.net/es/posts/3/7/1/ensalada_verde_14173_orig.jpg', 'si', 0),
('116', 'Ensalada Cesar', 12.95, 34, 'entrante', 'https://www.gourmet.cl/wp-content/uploads/2016/09/Ensalada_C%C3%A9sar-web-553x458.jpg', 'si', 0),
('117', 'Mojito manzanero', 6.5, 52, 'entrante', 'https://media.glamour.mx/photos/63fbac8762e9478a3fe578a3/16:9/pass/Decoraci%C3%B3n%20de%20bebidas.jpg', 'no', 1),
('201', 'Paella valenciana', 11.65, 33, 'primerplato', 'https://okdiario.com/img/2018/09/20/paella-valenciana.jpg', 'si', 0),
('202', 'Arroz con bogavante', 16.95, 6, 'primerplato', 'https://imag.bonviveur.com/arroz-con-bogavante.jpg', 'si', 0),
('203', 'Arroz negro', 11.95, 36, 'primerplato', 'https://www.elreydelpulpo.com/wp-content/uploads/2020/09/arroz-negro.jpg', 'si', 0),
('204', 'Arroz caldoso', 10.95, 49, 'primerplato', 'https://2.bp.blogspot.com/-_0-_KSwkpPk/XLxLQ3Q8w8I/AAAAAAAAR8I/EFU16mkFP_0oPHp8J1PsGhtaxi4C6BWHQCLcBGAs/s1600/arroz%2Bcaldoso%2Bcon%2Bmarisco%2B%25281%2529.jpg', 'si', 0),
('205', 'Arroz con verduras', 10.95, 53, 'primerplato', 'https://www.cocinacaserayfacil.net/wp-content/uploads/2018/03/Arroz-con-verduras.jpg', 'si', 0),
('206', 'Arroz con conejo', 9.95, 24, 'primerplato', 'https://img-global.cpcdn.com/recipes/152d87bfdfda7dfb/1200x630cq70/photo.jpg', 'si', 0),
('208', 'Risotto de hongos', 19.95, 64, 'primerplato', 'https://www.recetasnestle.com.ar/sites/default/files/srh_recipes/d3ace5fc0177d7d16e22b5b4de5777b3.jpg', 'si', 0),
('209', 'Fideua Marisco', 12, 21, 'primerplato', 'https://www.recetasderechupete.com/wp-content/uploads/2020/05/Fideu%C3%A1-de-mariscos.jpg', 'si', 0),
('301', 'Chuleton de ternera', 19.95, 14, 'segundoplato', 'https://tienda.hostalrioara.com/wp-content/uploads/2020/06/chuleton-de-ternera.jpg', 'si', 1),
('302', 'Solomillo roquefort', 12.95, 27, 'segundoplato', 'https://estoyhechouncocinillas.com/wp-content/uploads/2021/02/solomillo-de-cerdo-con-salsa-de-roquefort.jpg', 'si', 1),
('303', 'Entrecot a la parrilla', 18, 44, 'segundoplato', 'https://comidaschilenas.com/wp-content/uploads/2021/01/Receta-de-entrecot-a-la-parrilla.jpg', 'si', 1),
('304', 'Cordero al horno', 16.95, 23, 'segundoplato', 'https://recetasdecocina.elmundo.es/wp-content/uploads/2022/10/paletilla-de-cordero-al-horno-receta.jpg', 'si', 1),
('305', 'Pollo al ajillo', 9.95, 37, 'segundoplato', 'https://lacocinademasito.com/wp-content/uploads/pollo-al-ajillo-15.jpg', 'si', 1),
('306', 'Lubina a la espalda', 9.95, 33, 'segundoplato', 'https://www.cocinacaserayfacil.net/wp-content/uploads/2019/05/Lubina-a-la-espalda.jpg', 'si', 0),
('307', 'Dorada al horno', 16.5, 34, 'segundoplato', 'https://cocina-casera.com/wp-content/uploads/2015/12/dorada-horno-patatas.jpg', 'si', 0),
('308', 'Salmon a la plancha', 16.95, 41, 'segundoplato', 'https://cocinasalmon.cl/wp-content/uploads/2021/02/9.jpg', 'si', 0),
('309', 'Merluza en salsa verde', 15.95, 27, 'segundoplato', 'https://imag.bonviveur.com/merluza-en-salsa-verde-receta-tradicional.jpg', 'si', 0),
('401', 'Tarta de queso', 5.95, 38, 'postre', 'https://gastronomiaycia.republica.com/wp-content/uploads/2020/04/tartaquesoazulaizian-680x465.jpg', 'si', 0),
('402', 'Tarta de manzana', 4.95, 29, 'postre', 'https://www.lemonblossoms.com/wp-content/uploads/2021/11/French-Apple-Cake-S1.jpg', 'si', 0),
('403', 'Flan casero', 4.9, 39, 'postre', 'https://vinomanos.com/wp-content/uploads/2020/04/Flan-casero-argentino.jpg', 'si', 0),
('404', 'Crema catalana', 4.6, 17, 'postre', 'https://canalcocina.es/medias/images/0001080380QuiqueAlCuboS01E008CremaCatalanaR0101.jpg', 'si', 0),
('405', 'Helado de vainilla', 4.2, 23, 'postre', 'https://www.comedera.com/wp-content/uploads/2022/05/Helado-de-vainilla-sin-azucar.jpg', 'si', 0),
('406', 'Helado de chocolate', 6.95, 27, 'postre', 'https://www.lavanguardia.com/files/og_thumbnail/uploads/2020/07/08/5f05a10688644.jpeg', 'si', 0),
('407', 'Cafe bombon', 2.3, 80, 'postre', 'https://cdn.elcocinerocasero.com/imagen/receta/1000/2022-07-03-14-12-38/cafe-bombon.jpeg', 'si', 0),
('408', 'Cafe solo', 1.95, 16, 'postre', 'https://www.nespresso.com/coffee-blog/sites/default/files/2022-01/01_img_1_1142x644_cabecera_9.jpg', 'si', 0),
('410', 'Cafe con leche', 1.55, 38, 'postre', 'https://bittercoffees.com/wp-content/uploads/2022/01/cafe%CC%81-con-leche.jpeg', 'si', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` bigint(20) NOT NULL,
  `codigo` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_carta_nref` (`codigo`),
  KEY `fk_id_pedido_id` (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=627448 ;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `id_pedido`, `codigo`, `nombre`, `categoria`, `precio`, `cantidad`, `estado`, `subtotal`) VALUES
(166, 93223545231, '004', 'Agua 1L', 'bebida', 1.2, 2, 'finalizado', 2.4),
(167, 93223545231, '005', 'Aquaruis', 'bebida', 2.5, 2, 'finalizado', 5),
(168, 93223545231, '108', 'Boquerones vinagre', 'entrante', 7.95, 1, 'finalizado', 7.95),
(169, 93223545231, '109', 'Calamares romana', 'entrante', 4.95, 1, 'finalizado', 4.95),
(170, 93223545231, '103', 'Croquetas jamón', 'entrante', 6.5, 1, 'finalizado', 6.5),
(171, 93223545231, '102', 'Ensaladilla rusa', 'entrante', 6, 1, 'finalizado', 6),
(172, 93223511332, '109', 'Calamares romana', 'entrante', 4.95, 1, 'finalizado', 4.95),
(173, 93223511332, '106', 'Patatas bravas', 'entrante', 5.65, 1, 'finalizado', 5.65),
(174, 93223511332, '202', 'Fideuá marisco(p/p)', 'primerplato', 11.95, 1, 'finalizado', 11.95),
(175, 93223511332, '408', 'Café bombón', 'postre', 1.95, 1, 'finalizado', 1.95),
(176, 93223511332, '402', 'Tarta de queso', 'postre', 4.95, 1, 'finalizado', 4.95),
(177, 9322351432, '004', 'Agua 1L', 'bebida', 1.2, 1, 'finalizado', 1.2),
(178, 9322351432, '009', 'Agua con gas', 'bebida', 1.5, 1, 'finalizado', 1.5),
(179, 9322351432, '207', 'Bacalao', 'primerplato', 15.95, 1, 'finalizado', 15.95),
(180, 9322351432, '208', 'Costillas brasa', 'primerplato', 14.95, 1, 'finalizado', 14.95),
(181, 9322351432, '210', 'Ensalada ', 'primerplato', 9.95, 1, 'finalizado', 9.95),
(182, 93223517934, '004', 'Agua 1L', 'bebida', 1.2, 2, 'finalizado', 2.4),
(183, 932235173632, '004', 'Agua 1L', 'bebida', 1.2, 1, 'finalizado', 1.2),
(184, 932235233933, '207', 'Bacalao', 'primerplato', 15.95, 2, 'finalizado', 31.9),
(185, 932235392832, '108', 'Boquerones vinagre', 'entrante', 7.95, 1, 'finalizado', 7.95),
(186, 932235392832, '109', 'Calamares romana', 'entrante', 4.95, 1, 'finalizado', 4.95),
(187, 932235392832, '103', 'Croquetas jamón', 'entrante', 6.5, 1, 'finalizado', 6.5),
(188, 932235392832, '102', 'Ensaladilla rusa', 'entrante', 6, 3, 'finalizado', 18);

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `camarero` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mesa` int(11) NOT NULL,
  `total` float NOT NULL,
  `pagado` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `preciodescuento` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `fecha`, `hora`, `camarero`, `mesa`, `total`, `pagado`, `preciodescuento`) VALUES
(223424139, '2023-04-24', '13:00:09', '1', 1, 4.5, 'si', NULL),
(223425173, '2023-04-25', '17:00:03', '3', 7, 11.25, 'si', NULL),
(223511411, '2023-05-10', '14:00:11', '3', 1, 4.4, 'si, efectivo (-0&#8364; | %)', 4.4),
(223511429, '2023-05-10', '14:00:29', '3', 3, 4.4, 'si, efectivo (-0&#8364; | %)', 4.4),
(223511452, '2023-05-10', '14:05:20', '3', 3, 4.4, 'si, efectivo (-0.09&#8364; | 2%)', 4.31),
(223511456, '2023-05-01', '14:50:06', '3', 1, 32.5, 'si', NULL),
(223511512, '2023-05-01', '15:01:20', '3', 2, 23.9, 'si', NULL),
(223511651, '2023-05-01', '16:51:00', '3', 1, 43.4, 'si', NULL),
(223552229, '2023-05-05', '22:02:09', '1', 1, 8.8, 'si, efectivo - 25%', 6.6),
(223581551, '2023-05-08', '10:55:01', '4', 1, 7.8, 'si, efectivo', 7.72),
(2232236113, '2023-03-22', '19:00:10', '1', 3, 39, 'si', NULL),
(2234191417, '2023-04-19', '14:10:07', '4', 2, 13.2, 'si', NULL),
(2234241325, '2023-04-24', '13:00:25', '1', 1, 4.5, 'si', NULL),
(2234241723, '2023-04-24', '17:02:30', '1', 1, 8.8, 'si', NULL),
(2234241747, '2023-04-24', '17:00:47', '3', 4, 27.5, 'si', NULL),
(2234292545, '2023-04-29', '20:54:05', '1', 10, 57.8, 'si', NULL),
(2235112181, '2023-05-01', '12:18:10', '3', 1, 13.2, 'si', NULL),
(2235112658, '2023-05-01', '12:06:58', '3', 1, 37.85, 'si', NULL),
(2235114126, '2023-05-10', '14:01:26', '3', 6, 4.4, 'si, efectivo (-0&#8364; | %)', 4.4),
(2235114248, '2023-05-10', '14:02:48', '3', 2, 4.4, 'si, efectivo (-0&#8364; | %)', 4.4),
(2235114455, '2023-05-10', '14:04:55', '3', 3, 3.9, 'si, efectivo (&#8364; | %)', 3.9),
(2235114557, '2023-05-10', '14:05:57', '3', 2, 4.4, 'si, efectivo (-0&#8364; | k%)', 4.4),
(2235114836, '2023-05-01', '14:08:36', '3', 1, 41.3, 'si', NULL),
(2235114846, '2023-05-10', '14:08:46', '3', 1, 9.75, 'si, efectivo (&#8364; | %)', 9.75),
(2235115148, '2023-05-01', '15:14:08', '3', 1, 19.5, 'si', NULL),
(2235151219, '2023-05-15', '12:01:09', '', 2, 14.5, 'si, efectivo (&#8364; | %)', 14.5),
(2235161378, '2023-05-16', '10:37:08', '3', 1, 120.45, 'si, tarjeta (-6.02&#8364; | 5%)', 114.43),
(2235169565, '2023-05-16', '09:56:05', '3', 3, 5.85, 'si, tarjeta (+1.17&#8364; | 20%)', 7.02),
(2235216923, '2023-05-02', '16:09:23', '4', 4, 0, 'si, efectivo', 0),
(2235217231, '2023-05-02', '17:02:31', '3', 6, 33.9, 'si, efectivo', 30.51),
(2235217842, '2023-05-02', '17:08:42', '4', 7, 41.3, 'si, efectivo', 37.17),
(2235219358, '2023-05-02', '19:35:08', '3', 8, 53.2, 'si, tarjeta - 10', 47.88),
(2235272253, '2023-05-27', '20:25:03', '', 7, 64.75, 'si, efectivo (&#8364; | %)', 64.75),
(2235272261, '2023-05-27', '20:26:10', '', 6, 224, 'si, efectivo (&#8364; | %)', 224),
(2235423144, '2023-05-04', '23:10:44', '3', 9, 88.8, 'si', NULL),
(2235521341, '2023-05-05', '21:34:01', '1', 2, 8.3, 'si, tarjeta - 10%', 7.47),
(2235522416, '2023-05-05', '22:40:16', '1', 3, 6.6, 'si, efectivo -10', 5.94),
(2235522445, '2023-05-05', '22:44:50', '1', 3, 112.1, 'si, tarjeta -50%', 56.05),
(2235522458, '2023-05-05', '22:40:58', '1', 6, 4.4, 'si, tarjeta +-10%', 4.84),
(2235522558, '2023-05-05', '22:05:58', '1', 6, 6.6, 'si, tarjeta - -10%', 7.26),
(2235523381, '2023-05-05', '23:38:01', '3', 5, 55.8, 'Tarjeta -3%', 54.126),
(2235523388, '2023-05-05', '23:38:08', '3', 9, 8.45, 'si, efectivo (+0.845 // 8.45%)', 9.3),
(2235523394, '2023-05-05', '23:39:04', '3', 10, 36.25, 'Tarjeta -7%', 33.7125),
(2235619627, '2023-05-06', '19:06:27', '1', 4, 74.5, 'si, efectivo (+7.45;)', 81.95),
(2235621953, '2023-05-06', '02:19:53', '1', 2, 7.95, 'si, efectivo', 7.155),
(2235815237, '2023-05-08', '10:52:37', '4', 1, 7.8, 'Efectivo -1%', 7.722),
(9322351432, '2023-03-09', '05:14:00', '3', 2, 43.55, 'si', NULL),
(17322313935, '2023-03-17', '01:00:39', '3', 5, 9.95, 'si', NULL),
(17322363831, '2023-03-17', '06:30:08', '3', 1, 42.15, 'si', NULL),
(18322373432, '2023-03-18', '07:00:34', '3', 2, 3, 'si', NULL),
(22322324212, '2023-03-22', '15:04:20', '1', 2, 81.95, 'si', NULL),
(22322324511, '2023-03-22', '15:04:05', '1', 1, 2.25, 'si', NULL),
(22341811826, '2023-04-18', '01:18:26', '4', 5, 6.6, 'si', NULL),
(22341914116, '2023-04-19', '14:10:16', '4', 3, 38.4, 'si', NULL),
(22341914931, '2023-04-19', '14:09:31', '4', 11, 39.6, 'si', NULL),
(22342414558, '2023-04-24', '14:55:08', '1', 2, 4.5, 'si', NULL),
(22342417237, '2023-04-24', '17:02:37', '1', 2, 33.9, 'si', NULL),
(22342419275, '2023-04-24', '19:27:50', '3', 2, 16.95, 'si', NULL),
(22342419297, '2023-04-24', '19:29:07', '1', 5, 4.4, 'si', NULL),
(22342419335, '2023-04-24', '19:30:35', '3', 6, 6.6, 'si', NULL),
(22342712328, '2023-04-27', '12:32:08', '3', 4, 6.6, 'si', NULL),
(22342713194, '2023-04-27', '13:19:40', '3', 4, 172.2, 'si', NULL),
(22351115839, '2023-05-01', '11:58:39', '3', 2, 8.8, 'si', NULL),
(22351135436, '2023-05-10', '13:54:36', '3', 1, 35.05, 'si, tarjeta (+3.51&#8364; | 10%)', 38.56),
(22351143859, '2023-05-01', '14:38:59', '3', 1, 26, 'si', NULL),
(22351145817, '2023-05-01', '14:58:17', '3', 1, 13, 'si', NULL),
(22351151538, '2023-05-01', '15:15:38', '3', 1, 26, 'si', NULL),
(22351164953, '2023-05-01', '16:49:53', '3', 1, 13, 'si', NULL),
(22351193828, '2023-05-11', '09:38:28', '3', 2, 4, 'si, efectivo (+0.48&#8364; | 12%)', 4.48),
(22351511445, '2023-05-15', '11:44:50', '1', 3, 22.93, 'si, efectivo (+2.29&#8364; | 10%)', 25.22),
(22351614552, '2023-05-16', '10:45:52', '3', 2, 1.95, 'si, efectivo (&#8364; | %)', 1.95),
(22351695659, '2023-05-16', '09:56:59', '3', 5, 490.2, 'si, efectivo (+73.53&#8364; | 15%)', 563.73),
(22352121322, '2023-05-02', '12:13:22', '3', 2, 6.6, 'si', NULL),
(22352121328, '2023-05-02', '12:13:28', '1', 1, 4.4, 'si', NULL),
(22352135326, '2023-05-02', '13:53:26', '4', 3, 90.75, 'si, efectivo', 90.75),
(22352165224, '2023-05-02', '16:52:24', '4', 5, 33.9, 'si, efectivo', 33.9),
(22352315363, '2023-05-23', '15:36:03', '1', 4, 15.96, 'si, efectivo (&#8364; | %)', 15.96),
(22352422232, '2023-05-24', '20:22:32', '3', 14, 124.48, 'si, tarjeta (+31.12&#8364; | 25%)', 155.6),
(22352613517, '2023-05-26', '13:05:17', '3', 1, 47.78, 'si, tarjeta (&#8364; | %)', 47.78),
(22352722356, '2023-05-27', '20:23:56', '', 2, 9.7, 'si, efectivo (&#8364; | %)', 9.7),
(22352722734, '2023-05-27', '20:27:34', 'camarero', 5, 17, 'si, efectivo (&#8364; | %)', 17),
(22352722958, '2023-05-27', '20:29:58', 'camarero', 3, 49.95, 'si, efectivo (&#8364; | %)', 49.95),
(22352723118, '2023-05-27', '20:31:18', 'camarero', 9, 8.79, 'si, efectivo (&#8364; | %)', 8.79),
(22352725724, '2023-05-27', '20:57:24', '3', 12, 5.97, 'si, efectivo (&#8364; | %)', 5.97),
(22352812269, '2023-05-28', '12:26:09', '3', 1, 63.78, 'si, efectivo (&#8364; | %)', 63.78),
(22355165647, '2023-05-05', '16:56:47', '4', 1, 8.3, 'Efectivo ', 8.3),
(22355224218, '2023-05-05', '22:42:18', '1', 1, 4.4, 'si, efectivo -40%', 6.16),
(22355224225, '2023-05-05', '22:42:25', '1', 2, 4.4, 'si, tarjeta %', 4.4),
(22355224231, '2023-05-05', '22:42:31', '1', 3, 4.4, 'si, tarjeta -5%', 4.62),
(22355224515, '2023-05-05', '22:45:15', '1', 6, 58.25, 'si, efectivo -30%', 75.725),
(22355231338, '2023-05-05', '23:13:38', '1', 3, 4.4, 'Efectivo ', 4.4),
(22355231518, '2023-05-05', '23:15:18', '3', 7, 43.25, 'si, efectivo -5%', 41.0875),
(22355231815, '2023-05-05', '23:18:15', '3', 5, 74.4, 'Tarjeta -7%', 69.192),
(22355232259, '2023-05-05', '23:22:59', '3', 5, 2.2, 'Efectivo -10%', 1.98),
(22355232442, '2023-05-05', '23:24:42', '1', 2, 12.2, 'si, efectivo', 9.76),
(22355232628, '2023-05-05', '23:26:28', '1', 1, 99.75, 'si, efectivo', 79.8),
(22355232932, '2023-05-05', '23:29:32', '1', 4, 3.9, 'si, efectivo - 20%', 3.12),

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(3) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('administrador','camarero','cocinero') COLLATE utf8_unicode_ci NOT NULL,
  `alias` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `user`, `password`, `tipo`, `alias`) VALUES
(4, 'Julio', 'Lopez', 'julio@lopez.com', 'cocina', '$2y$10$ABs4Gj5z3mQrXbOnhlqhN.fXoI5ePFg5XsTZ1nCeQ6JUiSZuqe0Yy', 'cocinero', NULL),
(5, 'Julio', 'Gomez', 'fdfd@gdg.com', 'user', '$2y$10$JYsHuVVhLPhsOPQNwz6cNeNJLQCKEeDaViwI4X2rnSP7KvxHPPbU.', 'camarero', 3),
(6, 'Gerard', 'Pique', 'jerque@gmail.cat', 'camarero2', '$2y$10$XjbXR6yKbfc/YzW/pnVtkOjS4/iexj1FG2loudUHHTBwSukmsfiaS', 'camarero', 4),
(7, 'Vlad', 'Arbiev', 'corre@correo.com', 'vladadmin', '$2y$10$XdauE8FIObYGGzVU2gshfO1q/HQAb9pGMthPmYxrdsO7ZPdMhRphC', 'administrador', NULL),
(8, 'Daniel', 'Silvestru', 'corre@correo.com', 'dani', '$2y$10$y/BG/XrgRSdRvKT/Ecf23.kV31QMf/k7TUXTGin/BrVI4FtPsdo6.', 'camarero', 5),
(9, 'Rosina', 'Tela.... ', 'Rositela@gmail.com', 'rosi', '$2y$10$V0f.CuIBmWLDscFTF1IOJeeTrwD1KS8dI1YtTdI9hsaVWbgL0bkPm', 'camarero', 6),
(10, 'Marcos', 'Octavio', 'Rositela@gmail.com', 'marcos', '$2y$10$Uh6ajrLCZHtd6miOCW42Ae0JsFHfyXI9iGQmL97989SzdhYGV05Lu', 'camarero', 7),
(11, 'Sandra', 'Yolanda', 'Rositela@gmail.com', 'sandra', '$2y$10$x55s5ZczkHkO2zgq.1pHo.oCb/Tk/cPGKQSiAWutt4x7.auffwOKy', 'camarero', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
