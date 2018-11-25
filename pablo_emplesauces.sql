-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2018 a las 18:26:58
-- Versión del servidor: 5.7.23-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pablo_emplesauces`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Curriculums`
--

CREATE TABLE `Curriculums` (
  `CodCurriculum` int(11) NOT NULL,
  `Path` varchar(30) NOT NULL,
  `CodUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Curriculums`
--

INSERT INTO `Curriculums` (`CodCurriculum`, `Path`, `CodUsuario`) VALUES
(4, 'admin/Curriculum.pdf', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inscripciones`
--

CREATE TABLE `Inscripciones` (
  `CodUsuario` varchar(10) NOT NULL,
  `CodOferta` int(11) NOT NULL,
  `CodCurriculum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Inscripciones`
--

INSERT INTO `Inscripciones` (`CodUsuario`, `CodOferta`, `CodCurriculum`) VALUES
('admin', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ofertas`
--

CREATE TABLE `Ofertas` (
  `CodOferta` int(11) NOT NULL,
  `Titulo` varchar(20) NOT NULL,
  `Empresa` varchar(20) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Requisitos` varchar(200) NOT NULL,
  `Experiencia` int(11) NOT NULL,
  `Vacantes` int(11) NOT NULL,
  `Categoria` varchar(100) NOT NULL,
  `Provincia` varchar(20) NOT NULL,
  `CodEmpresa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Ofertas`
--

INSERT INTO `Ofertas` (`CodOferta`, `Titulo`, `Empresa`, `Descripcion`, `Requisitos`, `Experiencia`, `Vacantes`, `Categoria`, `Provincia`, `CodEmpresa`) VALUES
(1, 'Programadores', 'Empresa Cidï¿½n S.L.', 'Programadores para ser explotados cobrando un sueldo de mierda.\r\nEditando desde el admin.', 'Saber y conocer los diferentes lenguajes de programacion.', 3, 5, 'Informatica y telecomunicaciones', 'Zamora', 'cidonRRHH'),
(3, 'Administradores', 'Usuario admin', 'Esta es una oferta publicada desde el usuario administrador.', 'Requisitos propios de un usuario administrador para la gestiÃ³n de todo el sitio.', 0, 1, 'Otros', 'Palencia', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `CodUsuario` varchar(10) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Perfil` enum('Usuario','Empresa','Administrador') DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Web` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`CodUsuario`, `Nombre`, `Apellidos`, `Password`, `Perfil`, `Email`, `Web`) VALUES
('admin', 'Usuario ', 'Administrador', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'Administrador', '', ''),
('cidonRRHH', 'Empresa de pablo', 'Empresa Cidon SL', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'Empresa', 'empresa.cidon@outlook.com', 'https://www.empresacidon.com'),
('documentor', 'Usuario', 'Usuario documentador', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'Usuario', '', ''),
('empresa', 'Empresa admin', '', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'Empresa', 'empresa1@gmail.com', 'https://www.empresa1.com'),
('pablo', 'Pablito', 'Cidon Barrio', '4dd09b8f659e27847f94782920fb7e41b2c5afbd7f419a4a3ed8ab7aa5b7f944', 'Usuario', 'pablo.cidbar@outlook.com', 'https://pablocidon.wordpress.com/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Curriculums`
--
ALTER TABLE `Curriculums`
  ADD PRIMARY KEY (`CodCurriculum`),
  ADD KEY `fk_foreign_key_curriculum` (`CodUsuario`);

--
-- Indices de la tabla `Inscripciones`
--
ALTER TABLE `Inscripciones`
  ADD KEY `fk_foreign_key_curriculums` (`CodCurriculum`),
  ADD KEY `fk_foreign_key_oferta` (`CodOferta`),
  ADD KEY `fk_foreign_key_usuario` (`CodUsuario`);

--
-- Indices de la tabla `Ofertas`
--
ALTER TABLE `Ofertas`
  ADD PRIMARY KEY (`CodOferta`),
  ADD KEY `fk_foreign_key_name` (`CodEmpresa`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`CodUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Curriculums`
--
ALTER TABLE `Curriculums`
  MODIFY `CodCurriculum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Ofertas`
--
ALTER TABLE `Ofertas`
  MODIFY `CodOferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Curriculums`
--
ALTER TABLE `Curriculums`
  ADD CONSTRAINT `fk_foreign_key_curriculum` FOREIGN KEY (`CodUsuario`) REFERENCES `Usuarios` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Inscripciones`
--
ALTER TABLE `Inscripciones`
  ADD CONSTRAINT `fk_foreign_key_curriculums` FOREIGN KEY (`CodCurriculum`) REFERENCES `Curriculums` (`CodCurriculum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_foreign_key_oferta` FOREIGN KEY (`CodOferta`) REFERENCES `Ofertas` (`CodOferta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_foreign_key_usuario` FOREIGN KEY (`CodUsuario`) REFERENCES `Usuarios` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Ofertas`
--
ALTER TABLE `Ofertas`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`CodEmpresa`) REFERENCES `Usuarios` (`CodUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
