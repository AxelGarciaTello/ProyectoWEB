CREATE DATABASE WEB;

CREATE TABLE `alumno` (
  `CURP` varchar(18) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `ApellidoP` varchar(50) NOT NULL,
  `ApellidoM` varchar(50) NOT NULL,
  `Genero` varchar(6) NOT NULL,
  `FechaNacimiento` varchar(10) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Calle` varchar(50) NOT NULL,
  `NoInterior` smallint(6) DEFAULT NULL,
  `NoExterior` smallint(6) NOT NULL,
  `Colonia` varchar(50) NOT NULL,
  `Municipio` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  `TipoEsc` varchar(7) NOT NULL,
  `NombreEsc` varchar(50) NOT NULL,
  `LocalidadEsc` varchar(100) NOT NULL,
  `FormacionTec` varchar(50) DEFAULT NULL,
  `Promedio` float NOT NULL,
  `Carrera` varchar(35) NOT NULL,
  `Semestre` tinyint(4) NOT NULL,
  `Opcion` tinyint(4) NOT NULL,
  `IdHorario` tinyint(4) NOT NULL,
  `Calificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `horario` (
  `IdHorario` tinyint(4) NOT NULL,
  `Grupo` tinyint(4) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` tinyint(2) NOT NULL,
  `Minuto` tinyint(2) NOT NULL,
  `Disponibilidad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `horario` (`IdHorario`, `Grupo`, `Fecha`, `Hora`, `Minuto`, `Disponibilidad`) VALUES
(1, 1, '2021-01-15', 10, 0, 25);

ALTER TABLE `alumno`
  ADD PRIMARY KEY (`CURP`),
  ADD KEY `IdHorario` (`IdHorario`);

ALTER TABLE `horario`
  ADD PRIMARY KEY (`IdHorario`);

ALTER TABLE `horario`
  MODIFY `IdHorario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `alumno`
  ADD CONSTRAINT `Alumno_ibfk_1` FOREIGN KEY (`IdHorario`) REFERENCES `horario` (`IdHorario`);
COMMIT;

