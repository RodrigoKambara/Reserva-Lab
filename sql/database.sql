-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.11 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela reservalab.blocos
CREATE TABLE IF NOT EXISTS `blocos` (
  `blocoId` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`blocoId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservalab.blocos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `blocos` DISABLE KEYS */;
INSERT INTO `blocos` (`blocoId`, `nome`) VALUES
	(1, 'Bloco 1'),
	(2, 'Bloco 2'),
	(3, 'Bloco 3'),
	(4, 'BLoco 4');
/*!40000 ALTER TABLE `blocos` ENABLE KEYS */;

-- Copiando estrutura para tabela reservalab.disciplinas
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `disciplinaId` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`disciplinaId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservalab.disciplinas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `disciplinas` DISABLE KEYS */;
INSERT INTO `disciplinas` (`disciplinaId`, `nome`) VALUES
	(1, 'Teoria da Computação'),
	(2, 'Inteligencia Artificial'),
	(3, 'Gerencia de configuração'),
	(4, 'Paradigma de linguagem de programação'),
	(5, 'IHC'),
	(6, 'Métrica de software'),
	(7, 'Programação para dispositivos móveis'),
	(8, 'Lógica de programação'),
	(9, 'Redes de computadores');
/*!40000 ALTER TABLE `disciplinas` ENABLE KEYS */;

-- Copiando estrutura para tabela reservalab.laboratorios
CREATE TABLE IF NOT EXISTS `laboratorios` (
  `laboratorioId` int(11) NOT NULL AUTO_INCREMENT,
  `blocoId` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`laboratorioId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservalab.laboratorios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `laboratorios` DISABLE KEYS */;
INSERT INTO `laboratorios` (`laboratorioId`, `blocoId`, `nome`) VALUES
	(1, 1, 'Lab 01'),
	(2, 1, 'Lab 02'),
	(3, 1, 'Lab 03'),
	(4, 1, 'Lab 04'),
	(5, 1, 'Lab 05');
/*!40000 ALTER TABLE `laboratorios` ENABLE KEYS */;

-- Copiando estrutura para tabela reservalab.professores
CREATE TABLE IF NOT EXISTS `professores` (
  `professorId` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`professorId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservalab.professores: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` (`professorId`, `nome`) VALUES
	(1, 'Cidão'),
	(2, 'Moreno'),
	(3, 'Iara'),
	(4, 'Nelson'),
	(5, 'Arthur'),
	(6, 'Maurílio');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;

-- Copiando estrutura para tabela reservalab.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `reservaId` int(11) NOT NULL AUTO_INCREMENT,
  `laboratorioId` int(11) NOT NULL DEFAULT '0',
  `professorId` int(11) NOT NULL DEFAULT '0',
  `turmaId` int(11) NOT NULL DEFAULT '0',
  `disciplinaId` int(11) NOT NULL DEFAULT '0',
  `blocoId` int(11) NOT NULL DEFAULT '0',
  `diaRecorrente` int(11) NOT NULL DEFAULT '0',
  `inicio` datetime DEFAULT NULL,
  `fim` datetime DEFAULT NULL,
  PRIMARY KEY (`reservaId`),
  KEY `laboratorio` (`laboratorioId`),
  KEY `professor` (`professorId`),
  KEY `turma` (`turmaId`),
  KEY `disciplina` (`disciplinaId`),
  KEY `bloco` (`blocoId`),
  CONSTRAINT `bloco` FOREIGN KEY (`blocoId`) REFERENCES `blocos` (`blocoId`),
  CONSTRAINT `disciplina` FOREIGN KEY (`disciplinaId`) REFERENCES `disciplinas` (`disciplinaId`),
  CONSTRAINT `laboratorio` FOREIGN KEY (`laboratorioId`) REFERENCES `laboratorios` (`laboratorioId`),
  CONSTRAINT `professor` FOREIGN KEY (`professorId`) REFERENCES `professores` (`professorId`),
  CONSTRAINT `turma` FOREIGN KEY (`turmaId`) REFERENCES `turmas` (`turmaId`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservalab.reservas: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`reservaId`, `laboratorioId`, `professorId`, `turmaId`, `disciplinaId`, `blocoId`, `diaRecorrente`, `inicio`, `fim`) VALUES
	(10, 2, 1, 2, 2, 1, 0, '2020-11-12 21:00:00', '2020-11-12 22:40:00'),
	(15, 2, 1, 2, 1, 2, 2, '2020-11-15 21:00:00', '2020-11-15 22:40:00'),
	(19, 2, 1, 1, 2, 3, 0, '2020-11-20 21:00:00', '2020-11-20 22:40:00'),
	(20, 3, 1, 2, 1, 2, 0, '2020-11-20 21:00:00', '2020-11-20 22:40:00'),
	(21, 2, 1, 1, 2, 2, 3, '2020-11-20 10:05:25', '2020-11-20 04:12:00'),
	(22, 2, 1, 2, 3, 2, 0, '2020-11-02 21:00:00', '2020-11-02 22:40:00'),
	(23, 2, 1, 1, 2, 2, 0, '2020-11-27 19:00:00', '2020-11-27 20:40:00'),
	(24, 4, 1, 1, 1, 3, 0, '2020-11-02 21:00:00', '2020-11-02 22:40:00'),
	(25, 3, 5, 1, 3, 2, 1, '2020-11-20 21:00:00', '2020-11-20 22:40:00'),
	(26, 3, 2, 3, 9, 2, 0, '2020-11-20 19:00:00', '2020-11-20 20:40:00');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Copiando estrutura para tabela reservalab.turmas
CREATE TABLE IF NOT EXISTS `turmas` (
  `turmaId` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`turmaId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservalab.turmas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` (`turmaId`, `nome`) VALUES
	(1, 'ESOFT6S'),
	(2, 'ADS6S'),
	(3, 'ESOFT2S');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;

-- Copiando estrutura para tabela reservalab.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `professorId` int(11) DEFAULT '0',
  `usuario` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usuarioId`),
  KEY `FK_professor` (`professorId`),
  CONSTRAINT `FK_professor` FOREIGN KEY (`professorId`) REFERENCES `professores` (`professorId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela reservalab.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`usuarioId`, `professorId`, `usuario`, `email`, `senha`, `foto`) VALUES
	(1, 1, 'Cidao', 'cidao@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'cido.jpg'),
	(4, 2, 'Moreno', 'moreno@gmail.com', '0aa3ebe38678cbd6c5c7ca9e9ecf49e0', 'mogueno.jpg'),
	(5, 5, 'Arthur', 'arthurzavadski@gmail.com', '509d4a63e250a7af74e0ea220b0a3365', 'arthur.jpg'),
	(6, 4, 'Nelson', 'nelson@gmail.com', 'a4e360681676c770121e891f8c407572', 'nelson.jpg'),
	(7, 3, 'Iara', 'iara@gmail.com', '1bdc6a5694ca722534fb32a5130e640e', 'iara.jpg'),
	(8, 6, 'Maurilio', 'maurilio@gmail.com', 'e74bd9e41c1e58da6dc3675f801115b7', 'maurilio.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
