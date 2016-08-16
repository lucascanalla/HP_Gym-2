-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2016 a las 16:51:08
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio15`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `descripcion` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado_med`
--

CREATE TABLE `certificado_med` (
  `fecha_caducidad` date NOT NULL,
  `id_socio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE `descuento` (
  `cantiad_cuotas` int(2) NOT NULL,
  `descripcion` char(20) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(5) NOT NULL,
  `desc_especialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `desc_especialidad`) VALUES
(1, 'Crossfit'),
(2, 'Pilates'),
(3, 'Spining'),
(4, 'Zumba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_familiar`
--

CREATE TABLE `grupo_familiar` (
  `id_grupo` int(11) NOT NULL,
  `descripcion` char(100) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gym`
--

CREATE TABLE `gym` (
  `direccion` char(20) NOT NULL,
  `telefono` int(20) NOT NULL,
  `cuit` int(11) NOT NULL,
  `mail` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `id_profesional` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_disp_pro`
--

CREATE TABLE `horarios_disp_pro` (
  `id_horariopro` int(11) NOT NULL,
  `dia_mes` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

--
-- Volcado de datos para la tabla `horarios_disp_pro`
--

INSERT INTO `horarios_disp_pro` (`id_horariopro`, `dia_mes`, `hora`) VALUES
(1, 'Lunes', '09:00'),
(2, 'Lunes', '10:00'),
(3, 'Lunes', '11:00'),
(4, 'Lunes', '12:00'),
(5, 'Lunes', '13:00'),
(6, 'Lunes', '14:00'),
(7, 'Lunes', '15:00'),
(8, 'Lunes', '16:00'),
(9, 'Lunes', '17:00'),
(10, 'Lunes', '18:00'),
(11, 'Lunes', '19:00'),
(12, 'Martes', '09:00'),
(13, 'Martes', '10:00'),
(14, 'Martes', '11:00'),
(15, 'Martes', '12:00'),
(16, 'Martes', '13:00'),
(17, 'Martes', '14:00'),
(18, 'Martes', '15:00'),
(19, 'Martes', '16:00'),
(20, 'Martes', '17:00'),
(21, 'Martes', '18:00'),
(22, 'Martes', '19:00'),
(23, 'Miercoles', '09:00'),
(24, 'Miercoles', '10:00'),
(25, 'Miercoles', '11:00'),
(26, 'Miercoles', '12:00'),
(27, 'Miercoles', '13:00'),
(28, 'Miercoles', '14:00'),
(29, 'Miercoles', '15:00'),
(30, 'Miercoles', '16:00'),
(31, 'Miercoles', '17:00'),
(32, 'Miercoles', '18:00'),
(33, 'Miercoles', '19:00'),
(34, 'Jueves', '09:00'),
(35, 'Jueves', '10:00'),
(36, 'Jueves', '11:00'),
(37, 'Jueves', '12:00'),
(38, 'Jueves', '13:00'),
(39, 'Jueves', '14:00'),
(40, 'Jueves', '15:00'),
(41, 'Jueves', '16:00'),
(42, 'Jueves', '17:00'),
(43, 'Jueves', '18:00'),
(44, 'Jueves', '19:00'),
(45, 'Viernes', '09:00'),
(46, 'Viernes', '10:00'),
(47, 'Viernes', '11:00'),
(48, 'Viernes', '12:00'),
(49, 'Viernes', '13:00'),
(50, 'Viernes', '14:00'),
(51, 'Viernes', '15:00'),
(52, 'Viernes', '16:00'),
(53, 'Viernes', '17:00'),
(54, 'Viernes', '18:00'),
(55, 'Viernes', '19:00'),
(56, 'Sabado', '09:00'),
(57, 'Sabado', '10:00'),
(58, 'Sabado', '11:00'),
(59, 'Sabado', '12:00'),
(60, 'Sabado', '13:00'),
(61, 'Sabado', '14:00'),
(62, 'Sabado', '15:00'),
(63, 'Sabado', '16:00'),
(64, 'Sabado', '17:00'),
(65, 'Sabado', '18:00'),
(66, 'Sabado', '19:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_profesionales`
--

CREATE TABLE `horarios_profesionales` (
  `id_profesional` int(10) NOT NULL,
  `id_horariopro` int(11) NOT NULL,
  `id_horarios_profesionales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios_profesionales`
--

INSERT INTO `horarios_profesionales` (`id_profesional`, `id_horariopro`, `id_horarios_profesionales`) VALUES
(29, 1, NULL),
(29, 2, NULL),
(31, 1, NULL),
(31, 2, NULL),
(31, 18, NULL),
(31, 19, NULL),
(31, 20, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_socio`
--

CREATE TABLE `horarios_socio` (
  `id_socio` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `cant_cuotas` int(2) NOT NULL,
  `recepcionista` enum('admin') NOT NULL,
  `forma_pago` enum('Efectivo','Tarjeta') NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_tarifa` int(11) NOT NULL,
  `id_socio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`cant_cuotas`, `recepcionista`, `forma_pago`, `fecha_pago`, `monto`, `id_pago`, `id_tarifa`, `id_socio`) VALUES
(0, 'admin', 'Tarjeta', '2016-07-26', '0', 56, 2, 6),
(0, 'admin', 'Tarjeta', '2016-07-26', '0', 57, 2, 6),
(0, 'admin', 'Tarjeta', '2016-07-27', '0', 58, 2, 6),
(0, 'admin', 'Tarjeta', '2016-07-27', '0', 59, 2, 6),
(0, 'admin', 'Tarjeta', '2016-08-05', '0', 60, 2, 6),
(0, 'admin', 'Tarjeta', '2016-08-08', '45', 61, 2, 6),
(0, 'admin', 'Tarjeta', '2016-08-08', '0', 62, 2, 6),
(0, 'admin', 'Tarjeta', '2016-08-08', '45', 64, 2, 6),
(0, 'admin', 'Tarjeta', '2016-08-08', '0', 65, 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_x_periodo`
--

CREATE TABLE `pagos_x_periodo` (
  `id_pagos_x_periodo` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos_x_periodo`
--

INSERT INTO `pagos_x_periodo` (`id_pagos_x_periodo`, `id_periodo`, `id_pago`) VALUES
(39, 3, 56),
(40, 4, 56),
(41, 5, 57),
(42, 6, 57),
(43, 5, 58),
(44, 6, 58),
(45, 7, 59),
(46, 8, 60),
(47, 9, 60),
(49, 10, 62),
(51, 11, 64),
(52, 12, 64),
(53, 7, 65),
(54, 8, 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id_periodo`, `descripcion`) VALUES
(1, 'Enero/2016'),
(2, 'Febrero/2016'),
(3, 'Marzo/2016'),
(4, 'Abril/2016'),
(5, 'Mayo/2016'),
(6, 'Junio/2016'),
(7, 'Julio/2016'),
(8, 'Agosto/2016'),
(9, 'Septiembre/2016'),
(10, 'Octubre/2016'),
(11, 'Noviembre/2016'),
(12, 'Diciembre/2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `id_profesional` int(10) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` char(50) NOT NULL,
  `apellido` char(50) NOT NULL,
  `direccion` char(50) NOT NULL,
  `telefono` int(20) NOT NULL,
  `mail` char(60) NOT NULL,
  `fecha_nac` date NOT NULL,
  `cuil` int(11) DEFAULT NULL,
  `especialidad` int(5) NOT NULL,
  `tipo_dni` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id_profesional`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `mail`, `fecha_nac`, `cuil`, `especialidad`, `tipo_dni`) VALUES
(29, 3256522, 'lucas', 'ferrrr', '', 0, 'asd@hotm.com', '1989-04-11', 323, 3, 2),
(31, 45689, 'lucas', 'Ferrarini', 'pedro liuno 1533', 4561596, 'lucas@hotmail.com', '1989-04-11', 2147483647, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id_socio` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` char(50) NOT NULL,
  `apellido` char(50) NOT NULL,
  `direccion` char(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `mail` char(50) DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `tipo_dni` enum('DNI','LE','LC','') NOT NULL,
  `imagen` blob NOT NULL,
  `fecha_registracion` date NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id_socio`, `dni`, `nombre`, `apellido`, `direccion`, `telefono`, `mail`, `fecha_nac`, `habilitado`, `id_grupo`, `tipo_dni`, `imagen`, `fecha_registracion`) VALUES
(6, 123, 'juan', 'gomez', 'asaras 123', 303456, 'juan@gomez.com', '1916-01-01', 1, NULL, 'LE', 0xffd8ffe000104a46494600010100000100010000ffe100584578696600004d4d002a000000080002011200030000000100010000876900040000000100000026000000000003a00100030000000100010000a00200040000000100000040a0030004000000010000004000000000ffdb00430006040506050406060506070706080a100a0a09090a140e0f0c1017141818171416161a1d251f1a1b231c1616202c20232627292a29191f2d302d283025282928ffdb0043010707070a080a130a0a13281a161a2828282828282828282828282828282828282828282828282828282828282828282828282828282828282828282828282828ffc00011080040004003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f2bf1b6957773ab5f6a535ec3239cb0cf1b97d071d7f9d710239a50bb1739c03818af42d75644f0fdb24cca9792b13863f77938fc8559f859e1f5baf1a6971deaef64cdcb03c86001209fc706b8235796177d0ecc45152ad18c7a9b1e1ff008616fa66870ea7e218dae269403e46e2aa9ec40ea6b6fc4d2685a6d84474ed06d9efa25555da83a0efedfcebb3d62e1b52f11a69301c4104667b8efb173803ea4ff235e73e20b9b78b599e06994a242f2924f70462b85549d49de47b31a34a942d1563cb3c4b7971a86a8127b71115e56255e0679aedfe10f866cafaff00509f5d6274eb6b7dd347bf6a0c9fe223e84fe15c8e9f1ff69f8a2ce1dc4b5c5ca0da3fba4f3fa57b17c52d3ed3c29e05974fd3e016eda95c2864dc59881cf27e80577ce76b53eacf1e9439a72a8f5b1e79ae04f15788ee534357681322dd77b6c5551c9018f1d2b983a5cd6e972cf08da422a3f500ee19e715eb4d6367a0f86ac22b1b758b50bf68e12f8f98b3100f27f1ae62681f63c1223aac6db247908c13c703db8359baf6db627174bd9da4f7662f8c6fcb6b56ea83e48cee008ea3fc9aea3e0a6a067f1da0794922d5c27b1e0f4fa0ae0479baaeb96f0248b24d24c2346cf0dbb8e0fa0e2ba7f847a75c45f122048e4fde5a893cc0064b63e52a3eb9ad274bf77c9d6c57b6bd6553a5cf57f86ed2cf278a6f6ea659afdef7ecef918db1a8cafe7935e71f15678926961823552ee23254753ef5d7d9c3ad68be30f13c3a6692da859c852e5fc9942ca8b8e4807af5af35f144f3ea8979a84505c259db386779b0a771206d03b9ce335851a137514eda58edad8982a7285f52d78ef481e0ff00136912d842c93c7670cf2609244b8e4fe75e9fa8786759f1aeabe1bd6755684e94d024b3a23604440c9503a9cf1cfd6b89f1c6aadae786fc29af490486e2e636b39576fde9148008fad7bb7c35f0be913f81f4db8b1b9d52da49a3fdeee98b26f0486f95b23afa56b1a739c7996eb4393dac295477d9d99e6de299e1ff0084874c4db986da7f37f0571c8fa734df1fe9b6b6babca9628de4ce5661819dd952339fa8ad9f1b785edf40d4ef2fbed53dd48b1feee33160727e6f5e9c73c57257f7cf79e19b6bf924901b1b9303b2801821008c75e99c66b8ea539d36a0fb0abd7559c92feac7955aa3e8773a66a12bc6d28915f2c09f2ca91ce3bf4e95e81e0ad56c6efe33adce84fba09b79e148058839383dba579a788ae12586258542c5b99d179c804f7f738cd769fb37d9bdcf8ffed38ca5ac0ccc7d377ca3f9d7b2a0a52e638dc9a5ca7b4ebd36a7a378fb4c956d1e32736d7055095914e3073d31fe15c5fc6bb216fa4ea3a847333c37b346c23c61519b190bf5db9af63f8cba98d3e3b3816411b4ef182ddd01246efd0e7ea2bc8ff6919cd8f84b42b54411f9d3799b7b850bf20fc1719f735508f24145798ea4fda4f999c568be23b2b8d3fc1fa2223cc61d4a3925565f953f787807a9cee1f957d39e0898db785a181576c49772471647de4f30e0fe55f1d7c32b0bed47c69a18b38667db7d0ee911490837024923a700d7d89e32bc4b2d6ac6da30563721828e0617249fd454538f2fba82a4b9dddf4333e20431df5beaac1fe58aca58c6e3c64b704ffdf2dfa57cec2f64b7b3b8d3a32b899b7176272a7b2fe95ea3f13352ba4f0cdd883ef1557938e3696f957f1c9fcabc7ad55e76bebd63b268d7209fe1c46d8e3eb91f85618a8dda220deb632edbc35a9f8b6f2f25d3d208e38a4c3096658c28e80027af43d2bd5fe0df84ef3c2d06af757b340a7cb0dba0943e70320123b03cfbfe15e7fe31b8bab1f10dec3a739b6b546188e33b403806baef00ead70df0e3c572dc4cf2ba3aa8249e015c11cd4d5af7a57868f43ae951b623965aad7f0377c75e28bff1adde95796ba3c8e60848754932186e1f3f19201cf43cd647c5d4b8f1eea36aef369fa5c3699431995a4727819e831c0a3e064d78f79ac4575124719b457520e4f0dffd7af3ad6ad354975abfbc8c8559642c0f1d327156b14dcdc5a564633a71545548eed9ee3f0db58f0e78461b3b0b39e2628fc824069a43c649fad5af1f7c40b393c4da7db3d84ed72aef18d8c0ab6e5000c9c77c57ced6b15e43a95bdc3b3ee4951fea4107fa5779f116d656f8856bb772fcd14a83fdec1a2a621b926b4d054e115095f5d51d07c4ff001918b4a97494d3d05c5c4885a56973b5542f1803dbd6b8af0cce935a6a82ee24dd229db8e3f81b773f402acfc46b46b7d6f75ea2901032313d73e9eb580be2348eca5b34b68da37528cd920e3dbd2b1bba8936aec2ab8d3aad2d91ffd9, '0000-00-00'),
(7, 123456, 'arnaldo', 'mancinelli', 'cucha cucha 123', 456456, 'lio@canalla.com', '0000-00-00', 1, NULL, '', '', '2016-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id_tarifa` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='InnoDB free: 10240 kB';

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id_tarifa`, `fecha_desde`, `fecha_hasta`, `precio`, `estado`) VALUES
(1, '1919-01-01', '1929-06-10', 15, 0),
(2, '2016-07-05', '2016-11-17', 45, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL,
  `nombre_usuario` varchar(15) NOT NULL,
  `contrasena` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasena`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `certificado_med`
--
ALTER TABLE `certificado_med`
  ADD KEY `id_socio` (`id_socio`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  ADD PRIMARY KEY (`id_grupo`) USING BTREE;

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD UNIQUE KEY `id_profesional` (`id_profesional`),
  ADD UNIQUE KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `horarios_disp_pro`
--
ALTER TABLE `horarios_disp_pro`
  ADD PRIMARY KEY (`id_horariopro`),
  ADD KEY `id_horariopro` (`id_horariopro`);

--
-- Indices de la tabla `horarios_profesionales`
--
ALTER TABLE `horarios_profesionales`
  ADD KEY `id_horariopro` (`id_horariopro`),
  ADD KEY `id_profesional` (`id_profesional`);

--
-- Indices de la tabla `horarios_socio`
--
ALTER TABLE `horarios_socio`
  ADD UNIQUE KEY `id_socio` (`id_socio`),
  ADD UNIQUE KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_tarifa` (`id_tarifa`),
  ADD KEY `id_socio` (`id_socio`);

--
-- Indices de la tabla `pagos_x_periodo`
--
ALTER TABLE `pagos_x_periodo`
  ADD PRIMARY KEY (`id_pagos_x_periodo`),
  ADD KEY `id_periodo` (`id_periodo`),
  ADD KEY `id_pago` (`id_pago`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id_profesional`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id_socio`),
  ADD UNIQUE KEY `dni` (`dni`) USING BTREE,
  ADD UNIQUE KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_socio` (`id_socio`),
  ADD KEY `id_socio_2` (`id_socio`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id_tarifa`),
  ADD KEY `id_tarifa` (`id_tarifa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `grupo_familiar`
--
ALTER TABLE `grupo_familiar`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horarios_disp_pro`
--
ALTER TABLE `horarios_disp_pro`
  MODIFY `id_horariopro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `pagos_x_periodo`
--
ALTER TABLE `pagos_x_periodo`
  MODIFY `id_pagos_x_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id_profesional` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id_tarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificado_med`
--
ALTER TABLE `certificado_med`
  ADD CONSTRAINT `certificado_med_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socios` (`id_socio`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`),
  ADD CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`);

--
-- Filtros para la tabla `horarios_profesionales`
--
ALTER TABLE `horarios_profesionales`
  ADD CONSTRAINT `FK_HDP_HP` FOREIGN KEY (`id_horariopro`) REFERENCES `horarios_disp_pro` (`id_horariopro`),
  ADD CONSTRAINT `FK_P_HP` FOREIGN KEY (`id_profesional`) REFERENCES `profesionales` (`id_profesional`);

--
-- Filtros para la tabla `horarios_socio`
--
ALTER TABLE `horarios_socio`
  ADD CONSTRAINT `horarios_socio_ibfk_1` FOREIGN KEY (`id_socio`) REFERENCES `socios` (`id_socio`),
  ADD CONSTRAINT `horarios_socio_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `s_fk_p` FOREIGN KEY (`id_socio`) REFERENCES `socios` (`id_socio`),
  ADD CONSTRAINT `t_fk_p` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifas` (`id_tarifa`);

--
-- Filtros para la tabla `pagos_x_periodo`
--
ALTER TABLE `pagos_x_periodo`
  ADD CONSTRAINT `pagos_x_periodo_ibfk_1` FOREIGN KEY (`id_periodo`) REFERENCES `periodos` (`id_periodo`),
  ADD CONSTRAINT `pagos_x_periodo_ibfk_2` FOREIGN KEY (`id_pago`) REFERENCES `pagos` (`id_pago`);

--
-- Filtros para la tabla `socios`
--
ALTER TABLE `socios`
  ADD CONSTRAINT `socios_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo_familiar` (`id_grupo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
