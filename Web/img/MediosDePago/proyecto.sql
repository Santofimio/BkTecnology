-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2021 a las 05:42:13
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ciudad`
--

CREATE TABLE `t_ciudad` (
  `ciu_id` int(11) NOT NULL,
  `ciu_nombre` varchar(33) COLLATE utf8_spanish_ci NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_ciudad`
--

INSERT INTO `t_ciudad` (`ciu_id`, `ciu_nombre`, `dep_id`) VALUES
(1, 'Cali', 2),
(2, 'Pasto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_competencias`
--

CREATE TABLE `t_competencias` (
  `com_id` int(11) NOT NULL,
  `com_descripcion` varchar(333) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_competencias`
--

INSERT INTO `t_competencias` (`com_id`, `com_descripcion`) VALUES
(1, 'Iluminar campos visuales de acuerdo con los requerimientos de la producción.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_competencias_programa`
--

CREATE TABLE `t_competencias_programa` (
  `com_pro_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_configuracion`
--

CREATE TABLE `t_configuracion` (
  `conf_id` int(11) NOT NULL,
  `usu_id` int(111) DEFAULT NULL,
  `conf_descripcion` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `conf_correo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `conf_direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `conf_telefono` int(60) DEFAULT NULL,
  `conf_vision` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `conf_mision` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `conf_latitud` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `conf_longitud` longtext COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_depto`
--

CREATE TABLE `t_depto` (
  `dep_id` int(11) NOT NULL,
  `dep_nombre` varchar(33) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_depto`
--

INSERT INTO `t_depto` (`dep_id`, `dep_nombre`) VALUES
(1, 'Nariño'),
(2, 'Valle del Cauca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_estado`
--

CREATE TABLE `t_estado` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_estado`
--

INSERT INTO `t_estado` (`est_id`, `est_nombre`) VALUES
(1, 'Activo'),
(2, 'InActivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_foro`
--

CREATE TABLE `t_foro` (
  `foro_id` int(111) NOT NULL,
  `foro_titulo` varchar(333) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foro_descripcion` varchar(999) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foro_fecha_ini` date DEFAULT NULL,
  `foro_fecha_fin` date DEFAULT NULL,
  `foro_imagen` varchar(666) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foro_tema_id` int(11) DEFAULT NULL,
  `usu_id` int(111) DEFAULT NULL,
  `est_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_foro_comentario`
--

CREATE TABLE `t_foro_comentario` (
  `foro_com_id` int(111) NOT NULL,
  `foro_com_desc` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `foro_com_fecha` date DEFAULT NULL,
  `foro_com_com_id` int(111) DEFAULT NULL,
  `foro_rea_id` int(11) DEFAULT NULL,
  `foro_id` int(111) DEFAULT NULL,
  `usu_id` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_foro_reaccion`
--

CREATE TABLE `t_foro_reaccion` (
  `foro_rea_id` int(11) NOT NULL,
  `foro_rea_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foro_rea_img` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_foro_tema`
--

CREATE TABLE `t_foro_tema` (
  `foro_tema_id` int(11) NOT NULL,
  `foro_tema_descripcion` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_linea_tecnologica`
--

CREATE TABLE `t_linea_tecnologica` (
  `lin_tec_id` int(11) NOT NULL,
  `lin_tec_nombre` varchar(66) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_linea_tecnologica`
--

INSERT INTO `t_linea_tecnologica` (`lin_tec_id`, `lin_tec_nombre`) VALUES
(1, 'Comunicación Digital'),
(2, 'Diseño y Mantenimiento Mecatrónico'),
(3, 'Vestuario Inteligente'),
(4, 'Programas de Transversalidad Tecnológica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_material`
--

CREATE TABLE `t_material` (
  `mat_id` int(111) NOT NULL,
  `mat_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mat_descripcion` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mat_url` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `mat_fecha` date DEFAULT NULL,
  `mat_tip_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_material_tipo`
--

CREATE TABLE `t_material_tipo` (
  `	mat_tip_id` int(11) NOT NULL,
  `	mat_tip_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_noticia`
--

CREATE TABLE `t_noticia` (
  `not_id` int(111) NOT NULL,
  `not_descripcion` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `not_titulo` varchar(333) COLLATE utf8_spanish_ci DEFAULT NULL,
  `not_fecha` date DEFAULT NULL,
  `not_imagen` varchar(333) COLLATE utf8_spanish_ci DEFAULT NULL,
  `not_tip_id` int(11) DEFAULT NULL,
  `usu_id` int(111) DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_noticia_tipo`
--

CREATE TABLE `t_noticia_tipo` (
  `not_tip_id` int(11) NOT NULL,
  `not_tip_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_oferta`
--

CREATE TABLE `t_oferta` (
  `ofe_id` int(111) NOT NULL,
  `ofe_descripcion` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `ofe_fecha_ini` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ofe_fecha_fin` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ofe_imagen` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_id` int(111) DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_oferta`
--

INSERT INTO `t_oferta` (`ofe_id`, `ofe_descripcion`, `ofe_fecha_ini`, `ofe_fecha_fin`, `ofe_imagen`, `usu_id`, `est_id`) VALUES
(1, 'sdfdfdsfds', '08/24/2021 8:25 PM', '08/24/2021 8:25 PM', 'img/oferta/oferta-1.jpg', 1, 1),
(2, 'vxcvvxcxvxcv887', '08/08/2021 10:42 PM', '08/08/2021 10:42 PM', 'img/oferta/oferta-2.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_oferta_detalle`
--

CREATE TABLE `t_oferta_detalle` (
  `ofe_det_id` int(111) NOT NULL,
  `ofe_det_cupos` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `ofe_id` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_oferta_detalle`
--

INSERT INTO `t_oferta_detalle` (`ofe_det_id`, `ofe_det_cupos`, `pro_id`, `ofe_id`) VALUES
(1, 5665, 1, 1),
(2, 6666, 1, 1),
(3, 5665, 1, 2),
(4, 8888, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pqrsf`
--

CREATE TABLE `t_pqrsf` (
  `pqr_id` int(111) NOT NULL,
  `pqr_descripcion` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `pqr_fecha` datetime DEFAULT NULL,
  `pqr_email` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pqr_observacion` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `pqr_nombres` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pqr_apellidos` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pqr_tel_contacto` int(10) DEFAULT NULL,
  `pqr_tip_id` int(11) DEFAULT NULL,
  `usu_id` int(111) DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pqrsf_respuesta`
--

CREATE TABLE `t_pqrsf_respuesta` (
  `pqr_res_id` int(111) NOT NULL,
  `pqr_res_descripcion` varchar(333) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pqr_res_fecha` datetime DEFAULT NULL,
  `pqr_id` int(111) DEFAULT NULL,
  `usu_id` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pqrsf_tipo`
--

CREATE TABLE `t_pqrsf_tipo` (
  `pqr_tip_id` int(11) NOT NULL,
  `pqr_tip_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_pqrsf_tipo`
--

INSERT INTO `t_pqrsf_tipo` (`pqr_tip_id`, `pqr_tip_nombre`) VALUES
(1, 'petición'),
(2, 'Queja'),
(3, 'Reclamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_programa`
--

CREATE TABLE `t_programa` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_sigla` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_observacion` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_titulo` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_duracion` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_codigo` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_imagen` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pro_area_id` int(11) DEFAULT NULL,
  `pro_niv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_programa`
--

INSERT INTO `t_programa` (`pro_id`, `pro_nombre`, `pro_sigla`, `pro_observacion`, `pro_titulo`, `pro_duracion`, `pro_codigo`, `pro_imagen`, `pro_area_id`, `pro_niv_id`) VALUES
(1, 'Técnico en Análisis de Muestras Químicas ', 'TAMQ', '88El programa Técnico Análisis de Muestras Químicas se creó para brindar al sector productivo farmacéutico, cosmético, alimentos y bebidas, productos de aseo, agroquímicos, industria química, textil, caucho, plásticos y sintéticos; pinturas, lacas y barnices; metalúrgico, autopartes, minero,vidrio y artículos de vidrio; petroquímico, carboquímico, análisis y tratamiento de aguas, industriadel papel, cementos, tintas, pigmentos y colorantes, y servicios, entre otros, la posibilidad de incorporar personal con altas calidades laborales y profesionales que contribuyan al desarrollo económico, social y tecnológico de su entorno y del país, así mismo ofrecer a los aprendices formación en las tecnologías de análisis físico, químico y fisicoquímico; manejo de instrumentos y equipos de análisis y ensayos; manejo de las Tecnologías de la Informática y la Comunicación (TIC).', 'Técnico en Análisis de Muestras Químicas88', 'Etapa Lectiva: 3 Trimestres  Etapa Productiva: 2 Trimestres88', '123488', 'img/programa/programa-1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_programa_area`
--

CREATE TABLE `t_programa_area` (
  `pro_area_id` int(11) NOT NULL,
  `lin_tec_id` int(11) DEFAULT NULL,
  `pro_area_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_programa_area`
--

INSERT INTO `t_programa_area` (`pro_area_id`, `lin_tec_id`, `pro_area_nombre`) VALUES
(1, 1, 'Sistemas'),
(2, 3, 'MARROQUINERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_programa_nivel`
--

CREATE TABLE `t_programa_nivel` (
  `pro_niv_id` int(11) NOT NULL,
  `pro_niv_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_programa_nivel`
--

INSERT INTO `t_programa_nivel` (`pro_niv_id`, `pro_niv_nombre`) VALUES
(1, 'Técnico'),
(2, 'Tecnología'),
(3, 'Especialización');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_resultados_aprendizaje`
--

CREATE TABLE `t_resultados_aprendizaje` (
  `res_apr_id` int(11) NOT NULL,
  `res_apr_descripcion` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `com_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_resultados_aprendizaje`
--

INSERT INTO `t_resultados_aprendizaje` (`res_apr_id`, `res_apr_descripcion`, `com_id`) VALUES
(1, 'Resultado Aprendizaje4', 1),
(2, 'Resultado Aprendizaje1', 1),
(3, 'Nariño', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_resultados_aprendizaje_mat`
--

CREATE TABLE `t_resultados_aprendizaje_mat` (
  `res_apr_mat_id` int(11) NOT NULL,
  `res_apr_id` int(11) DEFAULT NULL,
  `mat_id` int(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_rol`
--

CREATE TABLE `t_rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_rol`
--

INSERT INTO `t_rol` (`rol_id`, `rol_nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipo_documento`
--

CREATE TABLE `t_tipo_documento` (
  `tip_doc_id` int(11) NOT NULL,
  `tip_doc_nombre` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tip_doc_sigla` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_tipo_documento`
--

INSERT INTO `t_tipo_documento` (`tip_doc_id`, `tip_doc_nombre`, `tip_doc_sigla`) VALUES
(1, 'Cedula de Ciudadanía', 'C.C.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `usu_id` int(111) NOT NULL,
  `usu_nombres` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_apellidos` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_pass` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_num_doc` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tip_doc_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`usu_id`, `usu_nombres`, `usu_apellidos`, `usu_correo`, `usu_pass`, `usu_num_doc`, `tip_doc_id`, `rol_id`, `est_id`) VALUES
(1, 'felipe', 'santo', 'lfsantofimio4@misena.edu.co', 'e10adc3949ba59abbe56e057f20f883e', '1144444444', 1, 1, 1),
(2, 'felipe', 'santofimio', 'lfsantofimio4@misena.edu.co', 'e671b4dae999c7974d3286162ea11bf0', '1144666333', 1, 1, 1),
(3, 'isabel', 'polania', 'polania@misena.edu.co', 'e671b4dae999c7974d3286162ea11bf0', '1144999999', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_ciudad`
--
ALTER TABLE `t_ciudad`
  ADD PRIMARY KEY (`ciu_id`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indices de la tabla `t_competencias`
--
ALTER TABLE `t_competencias`
  ADD PRIMARY KEY (`com_id`);

--
-- Indices de la tabla `t_competencias_programa`
--
ALTER TABLE `t_competencias_programa`
  ADD PRIMARY KEY (`com_pro_id`),
  ADD KEY `com_id` (`com_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `t_configuracion`
--
ALTER TABLE `t_configuracion`
  ADD PRIMARY KEY (`conf_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `t_depto`
--
ALTER TABLE `t_depto`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indices de la tabla `t_estado`
--
ALTER TABLE `t_estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `t_foro`
--
ALTER TABLE `t_foro`
  ADD PRIMARY KEY (`foro_id`),
  ADD KEY `foro_tema_id` (`foro_tema_id`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `est_id` (`est_id`);

--
-- Indices de la tabla `t_foro_comentario`
--
ALTER TABLE `t_foro_comentario`
  ADD PRIMARY KEY (`foro_com_id`),
  ADD KEY `foro_id` (`foro_id`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `foro_rea_id` (`foro_rea_id`);

--
-- Indices de la tabla `t_foro_reaccion`
--
ALTER TABLE `t_foro_reaccion`
  ADD PRIMARY KEY (`foro_rea_id`);

--
-- Indices de la tabla `t_foro_tema`
--
ALTER TABLE `t_foro_tema`
  ADD PRIMARY KEY (`foro_tema_id`);

--
-- Indices de la tabla `t_linea_tecnologica`
--
ALTER TABLE `t_linea_tecnologica`
  ADD PRIMARY KEY (`lin_tec_id`);

--
-- Indices de la tabla `t_material`
--
ALTER TABLE `t_material`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `mat_tip_id` (`mat_tip_id`);

--
-- Indices de la tabla `t_material_tipo`
--
ALTER TABLE `t_material_tipo`
  ADD PRIMARY KEY (`	mat_tip_id`);

--
-- Indices de la tabla `t_noticia`
--
ALTER TABLE `t_noticia`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `not_tip_id` (`not_tip_id`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `est_id` (`est_id`);

--
-- Indices de la tabla `t_noticia_tipo`
--
ALTER TABLE `t_noticia_tipo`
  ADD PRIMARY KEY (`not_tip_id`);

--
-- Indices de la tabla `t_oferta`
--
ALTER TABLE `t_oferta`
  ADD PRIMARY KEY (`ofe_id`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `est_id` (`est_id`);

--
-- Indices de la tabla `t_oferta_detalle`
--
ALTER TABLE `t_oferta_detalle`
  ADD PRIMARY KEY (`ofe_det_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `ofe_id` (`ofe_id`);

--
-- Indices de la tabla `t_pqrsf`
--
ALTER TABLE `t_pqrsf`
  ADD PRIMARY KEY (`pqr_id`),
  ADD KEY `pqr_tip_id` (`pqr_tip_id`),
  ADD KEY `usu_id` (`usu_id`),
  ADD KEY `est_id` (`est_id`);

--
-- Indices de la tabla `t_pqrsf_respuesta`
--
ALTER TABLE `t_pqrsf_respuesta`
  ADD PRIMARY KEY (`pqr_res_id`),
  ADD KEY `pqr_id` (`pqr_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `t_pqrsf_tipo`
--
ALTER TABLE `t_pqrsf_tipo`
  ADD PRIMARY KEY (`pqr_tip_id`);

--
-- Indices de la tabla `t_programa`
--
ALTER TABLE `t_programa`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_area_id` (`pro_area_id`),
  ADD KEY `pro_niv_id` (`pro_niv_id`);

--
-- Indices de la tabla `t_programa_area`
--
ALTER TABLE `t_programa_area`
  ADD PRIMARY KEY (`pro_area_id`),
  ADD KEY `lin_tec_id` (`lin_tec_id`);

--
-- Indices de la tabla `t_programa_nivel`
--
ALTER TABLE `t_programa_nivel`
  ADD PRIMARY KEY (`pro_niv_id`);

--
-- Indices de la tabla `t_resultados_aprendizaje`
--
ALTER TABLE `t_resultados_aprendizaje`
  ADD PRIMARY KEY (`res_apr_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indices de la tabla `t_resultados_aprendizaje_mat`
--
ALTER TABLE `t_resultados_aprendizaje_mat`
  ADD PRIMARY KEY (`res_apr_mat_id`),
  ADD KEY `res_apr_id` (`res_apr_id`),
  ADD KEY `mat_id` (`mat_id`);

--
-- Indices de la tabla `t_rol`
--
ALTER TABLE `t_rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `t_tipo_documento`
--
ALTER TABLE `t_tipo_documento`
  ADD PRIMARY KEY (`tip_doc_id`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `tip_doc_id` (`tip_doc_id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `est_id` (`est_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_ciudad`
--
ALTER TABLE `t_ciudad`
  ADD CONSTRAINT `t_ciudad_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `t_depto` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_competencias_programa`
--
ALTER TABLE `t_competencias_programa`
  ADD CONSTRAINT `t_competencias_programa_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `t_competencias` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_competencias_programa_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `t_programa` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_configuracion`
--
ALTER TABLE `t_configuracion`
  ADD CONSTRAINT `t_configuracion_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_foro`
--
ALTER TABLE `t_foro`
  ADD CONSTRAINT `t_foro_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `t_estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_foro_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_foro_ibfk_3` FOREIGN KEY (`foro_tema_id`) REFERENCES `t_foro_tema` (`foro_tema_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_foro_comentario`
--
ALTER TABLE `t_foro_comentario`
  ADD CONSTRAINT `t_foro_comentario_ibfk_1` FOREIGN KEY (`foro_id`) REFERENCES `t_foro` (`foro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_foro_comentario_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_foro_comentario_ibfk_3` FOREIGN KEY (`foro_rea_id`) REFERENCES `t_foro_reaccion` (`foro_rea_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_material_tipo`
--
ALTER TABLE `t_material_tipo`
  ADD CONSTRAINT `t_material_tipo_ibfk_1` FOREIGN KEY (`	mat_tip_id`) REFERENCES `t_material` (`mat_tip_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_noticia`
--
ALTER TABLE `t_noticia`
  ADD CONSTRAINT `t_noticia_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `t_estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_noticia_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_noticia_ibfk_3` FOREIGN KEY (`not_tip_id`) REFERENCES `t_noticia_tipo` (`not_tip_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_oferta`
--
ALTER TABLE `t_oferta`
  ADD CONSTRAINT `t_oferta_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `t_estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_oferta_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_oferta_detalle`
--
ALTER TABLE `t_oferta_detalle`
  ADD CONSTRAINT `t_oferta_detalle_ibfk_1` FOREIGN KEY (`ofe_id`) REFERENCES `t_oferta` (`ofe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_oferta_detalle_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `t_programa` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_pqrsf`
--
ALTER TABLE `t_pqrsf`
  ADD CONSTRAINT `t_pqrsf_ibfk_1` FOREIGN KEY (`pqr_tip_id`) REFERENCES `t_pqrsf_tipo` (`pqr_tip_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_pqrsf_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_pqrsf_ibfk_3` FOREIGN KEY (`est_id`) REFERENCES `t_estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_pqrsf_respuesta`
--
ALTER TABLE `t_pqrsf_respuesta`
  ADD CONSTRAINT `t_pqrsf_respuesta_ibfk_1` FOREIGN KEY (`pqr_id`) REFERENCES `t_pqrsf` (`pqr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_pqrsf_respuesta_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_programa`
--
ALTER TABLE `t_programa`
  ADD CONSTRAINT `t_programa_ibfk_1` FOREIGN KEY (`pro_area_id`) REFERENCES `t_programa_area` (`pro_area_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_programa_ibfk_2` FOREIGN KEY (`pro_niv_id`) REFERENCES `t_programa_nivel` (`pro_niv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_programa_area`
--
ALTER TABLE `t_programa_area`
  ADD CONSTRAINT `t_programa_area_ibfk_1` FOREIGN KEY (`lin_tec_id`) REFERENCES `t_linea_tecnologica` (`lin_tec_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_resultados_aprendizaje`
--
ALTER TABLE `t_resultados_aprendizaje`
  ADD CONSTRAINT `t_resultados_aprendizaje_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `t_competencias` (`com_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_resultados_aprendizaje_mat`
--
ALTER TABLE `t_resultados_aprendizaje_mat`
  ADD CONSTRAINT `t_resultados_aprendizaje_mat_ibfk_1` FOREIGN KEY (`mat_id`) REFERENCES `t_material` (`mat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_resultados_aprendizaje_mat_ibfk_2` FOREIGN KEY (`res_apr_id`) REFERENCES `t_resultados_aprendizaje` (`res_apr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD CONSTRAINT `t_usuario_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `t_estado` (`est_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_usuario_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `t_rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_usuario_ibfk_3` FOREIGN KEY (`tip_doc_id`) REFERENCES `t_tipo_documento` (`tip_doc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
