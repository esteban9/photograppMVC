--
-- Base de datos: `photograppmysql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `contrasenna` varchar(30) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `fk_id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `contrasenna`, `correo`, `fk_id_tipo_usuario`) VALUES
(3, 'Ingidsss', 'Ibg080414', 'in@hotmail.coz', NULL),
(4, 'esteban', 'holoholo', 'esteban@gmail.com', NULL),
(5, 'Admin', '$2y$12$VGhpcyBpcyB0aGUgQURTSOe', 'ji.verde@hotmail.com', 1),
(6, 'Jhon', 'hola', 'esteban', NULL),
(7, 'Jhones', '$2y$12$VGhpcyBpcyB0aGUgQURTSOP', 'estebanmrap10@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulos` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `FK_id_administrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulos`, `nombre`, `descripcion`, `FK_id_administrador`) VALUES
(1, 'hhhs', 'sapo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `foto`) VALUES
(5, 'Prueba', 'hol', '10394559_799028760182001_6481043447298592661_n.jpg'),
(10, 'Jojo', 'jh', 'Uploads/Categoria/Categoria_foto_11039601_957035861003155_1195059140_o.jpg'),
(11, 'Inigrid', 'Hplo', 'Uploads/Categoria/Categoria_foto_10399442_10152962536259807_1705358622717284500_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE `concurso` (
  `id_concurso` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `foto` varchar(500) NOT NULL,
  `peso_limite_foto` float DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime NOT NULL,
  `FK_id_administrador` int(11) DEFAULT NULL,
  `FK_id_categoria` int(11) DEFAULT NULL,
  `FK_id_nivelUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`id_concurso`, `nombre`, `estado`, `descripcion`, `foto`, `peso_limite_foto`, `fecha_registro`, `fecha_inicio`, `fecha_fin`, `FK_id_administrador`, `FK_id_categoria`, `FK_id_nivelUsuario`) VALUES
(1, 'Si', 'activo', 'prueba', 'Uploads/Concurso/Concurso_foto_10003456_10153186227576142_5165228024532696788_n.jpg', 0, '2016-06-24 11:06:00', '2016-06-25 00:00:00', '2016-06-25 00:00:00', 3, 5, NULL),
(2, 'Pollo', 'Activo', 'Holi', 'Uploads/Concurso/Concurso_foto_10003456_10153186227576142_5165228024532696788_n.jpg', 0, '2016-07-15 18:32:01', '2016-07-16 00:00:00', '2016-07-17 00:00:00', 3, 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso_nivelusuario`
--

CREATE TABLE `concurso_nivelusuario` (
  `id_concurso` int(11) NOT NULL DEFAULT '0',
  `id_nivelUsuario` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotocategoria`
--

CREATE TABLE `fotocategoria` (
  `id_foto` int(11) NOT NULL DEFAULT '0',
  `id_categoria` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `foto` varchar(500) NOT NULL,
  `FK_id_concurso` int(11) DEFAULT NULL,
  `FK_id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_foto`, `nombre`, `estado`, `foto`, `FK_id_concurso`, `FK_id_categoria`) VALUES
(3, 'Holo', 'Activo', 'Uploads/Foto/Foto_foto_11068562_492119444274706_2089069562_o.jpg', 1, NULL),
(4, 'Lauraaa', 'Activo', 'Uploads/Foto/Foto_foto_10394559_799028760182001_6481043447298592661_n.jpg', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelusuario`
--

CREATE TABLE `nivelusuario` (
  `id_nivelUsuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivelusuario`
--

INSERT INTO `nivelusuario` (`id_nivelUsuario`, `nombre`, `descripcion`, `foto`) VALUES
(5, 'Jass', 'adsad', ''),
(6, 'pro', 'jhon', 'Uploads/nivelUsuario/NivelUsuario_foto_591158.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id_publicidad` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `ruta_foto` varchar(600) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `FK_id_usuario` int(11) DEFAULT NULL,
  `FK_id_administrador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `contrasenna` varchar(30) DEFAULT NULL,
  `FK_id_nivelUsuario` int(11) DEFAULT NULL,
  `FK_id_categoria` int(11) NOT NULL,
  `fk_id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `fecha_nacimiento`, `genero`, `correo`, `telefono`, `contrasenna`, `FK_id_nivelUsuario`, `FK_id_categoria`, `fk_id_tipo_usuario`) VALUES
(5, 'Prueba', 'Holo', '2016-07-27', 'Femenino', 'esteban@gmail.com', '12313', 'holoholo', 5, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariocategoria`
--

CREATE TABLE `usuariocategoria` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `id_categoria` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariofotos`
--

CREATE TABLE `usuariofotos` (
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `id_fotos` int(11) NOT NULL DEFAULT '0',
  `calificacion_concurso` float DEFAULT NULL,
  `tipo_calificacion` varchar(30) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `comentario` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `id_tipo_usuario` (`fk_id_tipo_usuario`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulos`),
  ADD KEY `FK_id_administrador` (`FK_id_administrador`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`id_concurso`),
  ADD KEY `FK_id_administrador` (`FK_id_administrador`),
  ADD KEY `FK_id_categoria` (`FK_id_categoria`),
  ADD KEY `id_nivelUsuario` (`FK_id_nivelUsuario`);

--
-- Indices de la tabla `concurso_nivelusuario`
--
ALTER TABLE `concurso_nivelusuario`
  ADD PRIMARY KEY (`id_concurso`,`id_nivelUsuario`);

--
-- Indices de la tabla `fotocategoria`
--
ALTER TABLE `fotocategoria`
  ADD PRIMARY KEY (`id_foto`,`id_categoria`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `FK_id_concurso` (`FK_id_concurso`),
  ADD KEY `id_categoria` (`FK_id_categoria`);

--
-- Indices de la tabla `nivelusuario`
--
ALTER TABLE `nivelusuario`
  ADD PRIMARY KEY (`id_nivelUsuario`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id_publicidad`),
  ADD KEY `FK_id_usuario` (`FK_id_usuario`),
  ADD KEY `FK_id_administrador` (`FK_id_administrador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK_id_nivelUsuario` (`FK_id_nivelUsuario`),
  ADD KEY `id_categoria` (`FK_id_categoria`),
  ADD KEY `id_tipo_usuario` (`fk_id_tipo_usuario`);

--
-- Indices de la tabla `usuariocategoria`
--
ALTER TABLE `usuariocategoria`
  ADD PRIMARY KEY (`id_usuario`,`id_categoria`);

--
-- Indices de la tabla `usuariofotos`
--
ALTER TABLE `usuariofotos`
  ADD PRIMARY KEY (`id_usuario`,`id_fotos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `id_concurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `nivelusuario`
--
ALTER TABLE `nivelusuario`
  MODIFY `id_nivelUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id_publicidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`fk_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`FK_id_administrador`) REFERENCES `administrador` (`id_administrador`);

--
-- Filtros para la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD CONSTRAINT `concurso_ibfk_1` FOREIGN KEY (`FK_id_administrador`) REFERENCES `administrador` (`id_administrador`),
  ADD CONSTRAINT `concurso_ibfk_2` FOREIGN KEY (`FK_id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `concurso_ibfk_3` FOREIGN KEY (`FK_id_nivelUsuario`) REFERENCES `nivelusuario` (`id_nivelUsuario`);

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`FK_id_concurso`) REFERENCES `concurso` (`id_concurso`),
  ADD CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`FK_id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `publicidad_ibfk_1` FOREIGN KEY (`FK_id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `publicidad_ibfk_2` FOREIGN KEY (`FK_id_administrador`) REFERENCES `administrador` (`id_administrador`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`FK_id_nivelUsuario`) REFERENCES `nivelusuario` (`id_nivelUsuario`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`FK_id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`fk_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
