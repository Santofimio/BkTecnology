-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2021 a las 06:37:48
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bk_tecnology`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`) VALUES
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cart_det_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cart_detail`
--

INSERT INTO `cart_detail` (`cart_det_id`, `cart_id`, `pro_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 2, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Computadores'),
(2, 'Celulares'),
(3, 'Audio'),
(4, 'Video'),
(5, 'Hogar tecnológico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_sub`
--

CREATE TABLE `category_sub` (
  `cat_sub_id` int(11) NOT NULL,
  `cat_sub_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `cat_sub_img` varchar(111) COLLATE utf8_spanish_ci NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `category_sub`
--

INSERT INTO `category_sub` (`cat_sub_id`, `cat_sub_name`, `cat_sub_img`, `cat_id`) VALUES
(1, 'Celular', 'img/categorySub/1-Celular.png', 2),
(2, 'Accesorios Celulares', '', 2),
(3, 'Smartwatch', 'img/categorySub/3-Smartwatch.png', 2),
(4, 'Computadores Portátiles', 'img/categorySub/4-Computadores Portátiles.png', 1),
(5, 'Computadores de Escritorio', 'img/categorySub/5-Computadores de Escritorio.png', 1),
(6, 'Partes de Computador', 'img/categorySub/6-Partes de Computador.png', 1),
(7, 'Audio-Hogar', 'img/categorySub/7-Audio-Hogar.png', 3),
(8, 'Audio-Portable', 'img/categorySub/8-Audio-Portable.png', 3),
(9, 'Audio-Accesorios', 'img/categorySub/9-Audio-Accesorios.png', 3),
(10, 'Proyectores', 'img/categorySub/10-Proyectores.png', 4),
(11, 'Cámaras de video', 'img/categorySub/11-Cámaras de video.png', 4),
(12, 'Accesorios-Video', 'img/categorySub/12-Accesorios-Video.png', 4),
(13, 'Red', 'img/categorySub/13-Red.png', 5),
(14, 'Iluminacion', 'img/categorySub/14-Iluminacion.png', 5),
(15, 'Seguridad', 'img/categorySub/15-Seguridad.png', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `cit_id` int(11) NOT NULL,
  `cit_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`cit_id`, `cit_name`, `dep_id`) VALUES
(1, 'Jamundi', 1),
(3, 'Cali', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_tel` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `cus_address_sh` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `cus_address_sh_two` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `cus_district` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `cit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'Valle del Cauca'),
(2, 'Cauca'),
(3, 'Nariño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `inv_id` int(11) NOT NULL,
  `inv_date` datetime NOT NULL,
  `inv_total` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `inv_det_id` int(11) NOT NULL,
  `inv_id` int(11) NOT NULL,
  `inv_quantity` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(11) NOT NULL,
  `mark_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `mark_log` varchar(111) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mark`
--

INSERT INTO `mark` (`mark_id`, `mark_name`, `mark_log`) VALUES
(1, 'Acer', 'img/mark/1-Acer.svg'),
(2, 'Asus', 'img/mark/2-Asus.svg'),
(3, 'HP', 'img/mark/3-HP.svg'),
(4, 'LG', 'img/mark/4-LG.svg'),
(5, 'Samsung', 'img/mark/5-Samsung.svg'),
(6, 'Motorola', 'img/mark/6-Motorola.png'),
(7, 'Apple', 'img/mark/7-iPhone.png'),
(8, 'BOSE', 'img/mark/8-BOSE.svg'),
(9, 'VTA', 'img/mark/9-VTA.png'),
(10, 'Canon', 'img/mark/10-Canon.png'),
(11, 'TP-LINK', 'img/mark/11-TP-LINK.svg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(11) NOT NULL,
  `pay_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pay`
--

INSERT INTO `pay` (`pay_id`, `pay_name`) VALUES
(1, 'Tarjeta de Crédito'),
(2, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `pro_summary` longtext COLLATE utf8_spanish_ci NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_stock` int(11) NOT NULL,
  `cat_sub_id` int(11) NOT NULL,
  `prov_id` int(11) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_summary`, `pro_price`, `pro_stock`, `cat_sub_id`, `prov_id`, `mark_id`, `sta_id`) VALUES
(1, 'Portátil ACER    ', 'Diseñado para fomentar la actividad, la concentración y el movimiento, conoce el ACER A314-22-R1C8.| Aspire 3 es el portátil que se adapta a tu estilo de vida, gracias a su procesador AMD Ryzen puedes desarrollar tus mas grandes proyectos con el mejor rendimiento. Su diseño elegante y ligero te brindan una experiencia de otro nivel, que acompañado a su novedosa tecnología te otorgan el máximo rendimiento para trabajar en tus tareas diarias desde cualquier lugar. Aprovecha y ¡lleva el tuyo ahora!', 1815000, 33, 4, 3, 1, 4),
(2, 'Portatil HP   ', 'Diseñado para tu productividad y entretenimiento desde cualquier lugar, este incrible portátil combina la decima generación de procesadores Intel y batería de larga duración en un diseño delgado y portable con pantalla de borde delgado. Haz más y más rápido, con el sistema de almacenamiento SSD que te permite iniciar tu portatil y aplicaciones en pocos segundos. Disfruta de toda una experiencia de audio realmente poderosa y autentica gracias a los dos altavoces HP. Calidad de imagen, tu mundo digital de un modo totalmente nuevo garcias a la excelente definición que te brinda su pantalla HD. Este portatil es es tu compañero perfecto.', 1699000, 33, 4, 4, 3, 4),
(3, 'Portátil ASUS VivoBook ', 'Con colores sobresalientes y una tecla Enter diferencial , ASUS VivoBook 14 agrega estilo y dinamismo a la informática diaria. Con su procesador Intel® Core ™ i5 y SSD PCIe ® de gran capacidad para un almacenamiento súper rápido., VivoBook 14 proporciona la potencia que necesita para hacer las cosas. El tema de los colores expresivos continúa debajo de la tapa, donde una tecla Enter de bloqueo de color ocupa un lugar central además la pantalla Nano Edge de bisel delgado proporciona una experiencia de visualización expansiva e inmersiva al permitir una pantalla más grande en un marco más pequeño y con un peso total de solo 1,4 kg para que pueda llevarlo sin esfuerzo.', 2499000, 33, 4, 5, 2, 4),
(4, 'Moto G-100   ', 'El moto g¹⁰⁰ tiene toda la potencia que quieres. Con Ready For, amplifica todas las funciones del teléfono. Reproduce los juegos del teléfono en una pantalla grande para sentir una experiencia a pura adrenalina. Realiza videollamadas como si estuvieras en el lugar. Y usa las aplicaciones en el monitor de una computadora así tienes más espacio para trabajar y jugar.', 2249000, 33, 1, 6, 6, 4),
(5, 'GALAXY S21 ULTRA ', 'Conoce los Galaxy S21 5G y S21+ 5G. Están diseñados para revolucionar el video y la fotografía, con una resolución cinematográfica de 8K para que puedas tomar fotos épicas mientras haces un video. Ambos modelos tienen todas las características que necesitas: 64 MP, el conjunto de chips más rápido y una batería increíble que dura todo el día.1 Tu mundo será realmente épico.', 6149999, 33, 1, 7, 5, 4),
(6, 'iPhone 12  ', 'El chip A14 Bionic, el más rápido en un smartphone. Una pantalla OLED de borde a borde. Un nuevo frente de Ceramic Shield, cuatro veces más resistente a las caídas. Además, ahora el modo Noche viene en todas las cámaras. El iPhone 12 lo tiene todo. Y está disponible en dos tamaños perfectos.', 4499900, 33, 1, 8, 7, 4),
(7, 'Barra de Sonido SAMSUNG ', 'La barra HW-A550 de SAMUNG llevará el nivel de sonido de tú TV a un nuevo nivel con sus 410W de potencia, no solamente con tus programas favoritos si no con tú consola de Juegos, escoge este modo de sonido para que te sientas inmerso en los juegos de tú consola, con la cual puedes mejorar tu desempeño en tus juegos, llena tus espacios con el sonido de nuestra potente barra que se adaptará al espacio en donde se encuentre, brindándote una experiencia inmersiva. ¡¡llévala ahora!!, tú experiencia de TV y juego sin duda mejorará.', 799900, 33, 7, 7, 5, 4),
(8, 'Parlante BOSE ', 'Experiencia sonido 360º en el parlante inteligente más versátil de BOSE.| El parlante portátil BOSE Home es un parlante inalámbrico doméstico. Gracias a su tamaño, puedes llevarlo contigo a donde quieras. Donde haya conexión Wi-Fi, puedes controlarlo con tu voz y reproducir música directamente desde la nube y cuando no haya conexión Wi-Fi, puedes controlarlo como cualquier otro parlante portátil desde un dispositivo móvil y escuchar todo lo que quieras. ¡Lleva el tuyo ahora!', 1199000, 33, 8, 9, 8, 4),
(9, 'Minicomponente LG ', 'LG XBOOM RN5 el mejor anfitrión para tus reuniones, aumenta la emoción con Super Bass Boost y otras divertidas características que proporcionan potentes ritmos. Ilumina la pista de baile con las luces multicolor, agrega más brillo a tu fiesta, conecta hasta 3 dispositivos móviles y mantenlos en alto mientras la luz de la linterna se mueve al ritmo de la música. Controlalo desde la pista de baile con la nueva aplicación LG XBOOM, canta fuerte y claro con las funciones del Karaoke Star, además amplifica el sonido de tu guitarra. Multi Bluetooth, comparte el control de la playlist para que la música nunca pare. Conecta el RN5 a tu TV LG a través de Bluetooth® para experimentar un sonido más potente.', 699000, 33, 7, 1, 4, 4),
(10, 'Sistema de Video seguridad DVR   ', 'Es común tener por la seguridad del hogar, elimina esta preocupación con tu sistema VTA! Buscamos alternativas que ofrecen vigilancia permanente, adicional sirve para ubicar elementos perdidos a simple vista.', 989900, 33, 15, 10, 9, 4),
(11, 'Cámara de video CANON    ', 'Esta videocámara compacta, divertida y fácil de usar dispone de un Zoom avanzado 57x, de sencillos controles de pantalla táctil y de potentes tecnologías que automáticamente garantizan que tus vídeos familiares tengan un sonido e imagen increíbles. Graba cómodamente durante más tiempo con la batería de larga duración.', 1399000, 33, 11, 11, 10, 4),
(12, 'Video Proyector LG    ', 'El CineBeam LG PH510 es ideal para que el entretenimiento en casa sea una experiencia de gran formato, de la mejor calidad y para cualquier espacio o para facilitar tus presentaciones en caso que lo requieres para tu trabajo o estudio gracias a su portabilidad. Incomparable experiencia visual. Es un Producto compacto, versátil, sin instalación, se puede llevar en un morral o bolso a cuqluier lugar, para ver cualquier tipo de contenidos: películas, archivos, fotos. Gracias a su gran capacidad de contraste y su alta definicios permite visualizar colores mas vivos y con mas detalle.', 1999000, 33, 10, 1, 4, 4),
(13, 'Router TP-LINK   ', 'Necesitas cobertura Y quieres un router de alta potencia para tus zonas sin Wifi', 259900, 33, 13, 12, 11, 4),
(14, 'Combo VTA Plug Inteligente + Rose', 'Completa cualquier habitación con el combo VTA Casa Inteligente. Diseñada para adaptarse a tu estilo de vida móvil al mismo tiempo que crea un entorno más seguro tanto dentro como fuera del hogar, la marca unifica una extensa gama de productos plenamente integrados a través de una aplicación única, muy fácil de usar , puedes ejercer control, programar y hacer funcionar los dispositivos en el horario que más te acomode aun cuando estés fuera de casa.', 89900, 33, 14, 10, 9, 4),
(15, 'Alarma Detector VTA Humo  ', 'Detector de humo, ideal para identificar de manera inmediata, incidentes con fuego en nuestro hogar evitando situaciones peligrosas para nuestra familia.', 140999, 33, 15, 10, 9, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_img`
--

CREATE TABLE `product_img` (
  `pro_img_id` int(11) NOT NULL,
  `pro_img_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `pro_img_url` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product_img`
--

INSERT INTO `product_img` (`pro_img_id`, `pro_img_name`, `pro_img_url`, `pro_id`) VALUES
(2, 'product-2-2', 'img/product/product-2-2.png', 2),
(3, 'product-3-3', 'img/product/product-3-3.png', 3),
(5, 'product-5-5', 'img/product/product-5-5.png', 5),
(7, 'product-7-7', 'img/product/product-7-7.png', 7),
(8, 'product-8-8', 'img/product/product-8-8.png', 8),
(9, 'product-9-9', 'img/product/product-9-9.png', 9),
(10, 'product-1-10', 'img/product/product-1-10.png', 1),
(13, 'product-12-13', 'img/product/product-12-13.png', 12),
(14, 'product-10-14', 'img/product/product-10-14.png', 10),
(15, 'product-11-15', 'img/product/product-11-15.png', 11),
(16, 'product-13-16', 'img/product/product-13-16.png', 13),
(17, 'product-14-17', 'img/product/product-14-17.png', 14),
(18, 'product-15-18', 'img/product/product-15-18.png', 15),
(19, 'product-6-19', 'img/product/product-6-19.png', 6),
(20, 'product-4-20', 'img/product/product-4-20.png', 4),
(21, 'product-4-21', 'img/product/product-4-21.jfif', 4),
(22, 'product-1-22', 'img/product/product-1-22.jfif', 1),
(23, 'product-1-23', 'img/product/product-1-23.jfif', 1),
(24, 'product-1-24', 'img/product/product-1-24.jfif', 1),
(25, 'product-1-25', 'img/product/product-1-25.jfif', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_specification`
--

CREATE TABLE `product_specification` (
  `pro_spe_id` int(11) NOT NULL,
  `pro_spe_description` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `pro_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product_specification`
--

INSERT INTO `product_specification` (`pro_spe_id`, `pro_spe_description`, `pro_id`, `spe_id`) VALUES
(1, 'Windows', 1, 9),
(2, 'Windows 10', 1, 10),
(4, 'Negro Jet ', 2, 14),
(5, 'Batería Recargable Interna', 2, 15),
(6, 'SSD', 3, 4),
(7, '512GB', 3, 5),
(8, 'Pantalla 14', 1, 17),
(10, 'Pantalla 15', 2, 17),
(11, 'Pantalla 14', 3, 17),
(12, 'vb-563-286', 3, 13),
(13, 'cf2060la', 2, 13),
(14, 'G-100', 4, 13),
(15, '128 GB', 4, 5),
(16, 'Android™ 11', 4, 9),
(17, '8 GB', 4, 3),
(18, '6.2\"', 5, 17),
(19, 'Android-11', 5, 9),
(20, '8 GB', 5, 3),
(21, '128 GB', 5, 5),
(22, 'iPhone-12', 6, 13),
(23, '2 GB', 6, 3),
(24, 'iOS 14', 6, 9),
(25, '256 GB', 6, 5),
(26, 'HW-A550/ZL', 7, 13),
(27, 'Alámbrica', 7, 18),
(28, 'Bluetooth', 7, 19),
(29, 'WiFi', 7, 19),
(30, 'Bluetooth', 8, 19),
(31, 'WiFi', 8, 19),
(32, 'Home Speaker', 8, 13),
(33, 'Bluetooth', 9, 19),
(34, 'XBOOM RN5', 9, 13),
(35, 'USB', 9, 19),
(36, 'VTA-83152', 10, 13),
(37, 'Full HD', 10, 16),
(38, 'VIXIA HF R800', 11, 13),
(39, 'Full HD', 11, 16),
(40, 'PH510', 12, 13),
(41, 'HD', 12, 16),
(42, 'TL-WR941HP', 13, 13),
(44, 'VTA-84632', 14, 13),
(45, 'WiFi', 14, 19),
(46, 'VTA-84657', 15, 13),
(47, 'Bluetooth', 15, 19),
(48, 'Velocidad 450 Mbps', 13, 20),
(49, 'A514-53-570S', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider`
--

CREATE TABLE `provider` (
  `prov_id` int(11) NOT NULL,
  `prov_nit` int(11) NOT NULL,
  `prov_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `prov_address` varchar(111) COLLATE utf8_spanish_ci NOT NULL,
  `prov_tel` varchar(33) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `provider`
--

INSERT INTO `provider` (`prov_id`, `prov_nit`, `prov_name`, `prov_address`, `prov_tel`) VALUES
(1, 111, 'LG Colombia', 'calle 80d 2', '455555'),
(2, 123456789, 'Xiaomi Colombia ', 'calle108 #6 -25', '4555555'),
(3, 236563, 'Acer Colombia', 'calle 80d 2', '455555'),
(4, 33663636, 'HP Colombia', 'calle 80d 2', '6666663'),
(5, 333333, 'Asus Colombia', 'calle 80d 26d 58666', '666666'),
(6, 1111111111, 'Motorola Colombia', 'calle 111 # 11 - 11', '1111111'),
(7, 2147483647, 'Samsung Colombia', 'calle 222 # 22 - 22', '2222222'),
(8, 2147483647, 'iPhone Colombia', 'calle 333 # 33 - 33', '3333333'),
(9, 2147483647, 'BOSE Colombia', 'calle 444 # 44 - 44', '4444444'),
(10, 2147483647, 'VTM Colombia', 'calle 555 # 55 - 55', '5555555'),
(11, 666666666, 'Canon Colombia', 'calle 666 # 66 - 66', '6666666'),
(12, 2147483647, 'TP-LINK Colombia', 'calle 777 # 77 - 77', '7777777');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `rol_id` int(11) NOT NULL,
  `rol_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`rol_id`, `rol_name`) VALUES
(1, 'Super Administrador'),
(2, 'Administrador'),
(3, 'Cliente'),
(4, 'Practica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specification`
--

CREATE TABLE `specification` (
  `spe_id` int(11) NOT NULL,
  `spe_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `spe_tip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `specification`
--

INSERT INTO `specification` (`spe_id`, `spe_name`, `spe_tip_id`) VALUES
(1, 'Unidad CD/DVD Integrada', 7),
(2, 'Peso del Computador', 7),
(3, 'Memoria RAM', 8),
(4, 'Tipo de Disco Duro', 2),
(5, 'Capacidad Disco Duro', 2),
(6, 'Marca Procesador', 8),
(7, 'Tipo Procesador', 8),
(8, 'Modelo del Procesador', 8),
(9, 'Sistema Operativo', 9),
(10, 'Versión Sistema Operativo', 9),
(11, 'No. de Núcleos del Procesador', 8),
(12, 'Velocidad del Procesador', 8),
(13, 'Lineal/Modelo/Referencia', 1),
(14, 'Color', 1),
(15, 'Fuente alimentación de energía', 1),
(16, 'Resolución Pantalla', 6),
(17, 'Tamaño Pantalla', 6),
(18, 'Conexión', 7),
(19, 'Opciones de Conectividad', 3),
(20, 'Velocidad de Transferencia', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specification_type`
--

CREATE TABLE `specification_type` (
  `spe_tip_id` int(11) NOT NULL,
  `spe_tip_name` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `specification_type`
--

INSERT INTO `specification_type` (`spe_tip_id`, `spe_tip_name`) VALUES
(1, 'Información Básica'),
(2, 'Almacenamiento'),
(3, 'Características Técnicas'),
(4, 'Detalles del Producto'),
(5, 'Conectividad'),
(6, 'Imagen y Pantalla'),
(7, 'Características Físicas '),
(8, 'Procesamiento'),
(9, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `sta_id` int(11) NOT NULL,
  `sta_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`sta_id`, `sta_name`) VALUES
(1, 'Activo'),
(2, 'InActivo'),
(3, 'En proceso'),
(4, 'Disponible'),
(5, 'No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `user_last_name` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `user_email` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `user_pass` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol_id` int(11) NOT NULL,
  `sta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_last_name`, `user_email`, `user_pass`, `created_at`, `updated_at`, `rol_id`, `sta_id`) VALUES
(1, 'Luis Felipe', 'Santofimio Ramirez', 'lfsantofimio4@misena.edu.co', 'e10adc3949ba59abbe56e057f20f883e', '2021-07-15 04:08:34', '2021-08-03 19:52:45', 1, 1),
(2, 'Jamund', 'Pere', 'lfsa@misena.edu.co', '300272b11a115cf2daba3cdb5d967971', '2021-07-15 04:34:35', '2021-08-03 19:50:42', 2, 2),
(3, 'jose', 'santo', 'jose@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-08-24 22:14:16', '2021-08-24 22:14:16', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_det_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `category_sub`
--
ALTER TABLE `category_sub`
  ADD PRIMARY KEY (`cat_sub_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cit_id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `cit_id` (`cit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `pay_id` (`pay_id`);

--
-- Indices de la tabla `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`inv_det_id`),
  ADD KEY `inv_id` (`inv_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indices de la tabla `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_sub_id` (`cat_sub_id`),
  ADD KEY `prov_id` (`prov_id`),
  ADD KEY `mark_id` (`mark_id`),
  ADD KEY `sta_id` (`sta_id`);

--
-- Indices de la tabla `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`pro_img_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`pro_spe_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `spe_id` (`spe_id`);

--
-- Indices de la tabla `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`spe_id`),
  ADD KEY `spe_tip_id` (`spe_tip_id`);

--
-- Indices de la tabla `specification_type`
--
ALTER TABLE `specification_type`
  ADD PRIMARY KEY (`spe_tip_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `sta_id` (`sta_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `category_sub`
--
ALTER TABLE `category_sub`
  ADD CONSTRAINT `category_sub_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cit_id`) REFERENCES `city` (`cit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`pay_id`) REFERENCES `pay` (`pay_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`inv_id`) REFERENCES `invoice` (`inv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`prov_id`) REFERENCES `provider` (`prov_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`cat_sub_id`) REFERENCES `category_sub` (`cat_sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`mark_id`) REFERENCES `mark` (`mark_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`sta_id`) REFERENCES `status` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_img`
--
ALTER TABLE `product_img`
  ADD CONSTRAINT `product_img_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product_specification`
--
ALTER TABLE `product_specification`
  ADD CONSTRAINT `product_specification_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_specification_ibfk_2` FOREIGN KEY (`spe_id`) REFERENCES `specification` (`spe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `specification`
--
ALTER TABLE `specification`
  ADD CONSTRAINT `specification_ibfk_1` FOREIGN KEY (`spe_tip_id`) REFERENCES `specification_type` (`spe_tip_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`sta_id`) REFERENCES `status` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `role` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
