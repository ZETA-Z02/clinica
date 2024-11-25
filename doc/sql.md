CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(11) NOT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `feCreate` datetime DEFAULT current_timestamp(),
  `feUpdate` date DEFAULT NULL current_timestamp(),
  PRIMARY KEY (`idpersonal`)
);
CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `idpersonal` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `estado` TINYINT DEFAULT 1,
  PRIMARY KEY (`idlogin`)
);
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `feCreate` datetime DEFAULT current_timestamp(),
  `feUpdate` date DEFAULT current_timestamp(),
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `unico_dato` (`dni`)
);
CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idcita`),
  FOREING KEY(`idcliente`) REFERENCES clientes('idcliente')
);
CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `idtratamiento` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `monto` double NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `saldo` double NOT NULL,
  `igv` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`idpago`)
);
CREATE TABLE `pago_detalles` (
  `idpagodetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idpago` int(11) NOT NULL,
  `monto` double NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`idpagodetalle`)
);
CREATE TABLE `tratamiento` (
  `idtratamiento` int(11) NOT NULL AUTO_INCREMENT,
  `tratamiento` varchar(100) DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idtratamiento`)
);