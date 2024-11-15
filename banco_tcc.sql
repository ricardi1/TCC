-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.35 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para tcc
CREATE DATABASE IF NOT EXISTS `tcc` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tcc`;

-- Copiando estrutura para tabela tcc.ccustos
CREATE TABLE IF NOT EXISTS `ccustos` (
  `idCCustos` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCCustos`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.ccustos: ~5 rows (aproximadamente)
INSERT INTO `ccustos` (`idCCustos`, `codigo`, `descricao`) VALUES
	(1, '01.01', 'Unirios'),
	(3, '01', 'GSS'),
	(4, '01.01.01', 'Secretaria'),
	(5, '01.01.02', 'Marketing'),
	(6, '01.01.03', 'RH'),
	(7, '01.01.04', 'Tecnologia');

-- Copiando estrutura para tabela tcc.dadosbancarios
CREATE TABLE IF NOT EXISTS `dadosbancarios` (
  `idDadosBancarios` int NOT NULL AUTO_INCREMENT,
  `tipoConta` int DEFAULT NULL,
  `banco` varchar(10) DEFAULT NULL,
  `agencia` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `Fornecedor_idFornecedor` int NOT NULL,
  PRIMARY KEY (`idDadosBancarios`,`Fornecedor_idFornecedor`),
  KEY `fk_DadosBancarios_Fornecedor1_idx` (`Fornecedor_idFornecedor`),
  CONSTRAINT `fk_DadosBancarios_Fornecedor1` FOREIGN KEY (`Fornecedor_idFornecedor`) REFERENCES `fornecedor` (`idFornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.dadosbancarios: ~0 rows (aproximadamente)
INSERT INTO `dadosbancarios` (`idDadosBancarios`, `tipoConta`, `banco`, `agencia`, `numero`, `Fornecedor_idFornecedor`) VALUES
	(1, 0, '002', '0001', '0101-1', 1);

-- Copiando estrutura para tabela tcc.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idFornecedor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(254) NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idFornecedor`),
  UNIQUE KEY `CNPJ_UNIQUE` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.fornecedor: ~0 rows (aproximadamente)
INSERT INTO `fornecedor` (`idFornecedor`, `nome`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `cnpj`, `email`, `telefone`) VALUES
	(1, 'Narelle Informatica LTDA', 'Rua 31 de Março', '10', 'Centro', 'Paulo Afonso', 'AC', '02.004.640/0001-03', 'narelle@gmail.com', '(75) 3281-6466');

-- Copiando estrutura para tabela tcc.meiopagamento
CREATE TABLE IF NOT EXISTS `meiopagamento` (
  `idMeioPagamento` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMeioPagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.meiopagamento: ~5 rows (aproximadamente)
INSERT INTO `meiopagamento` (`idMeioPagamento`, `descricao`) VALUES
	(1, 'Dinheiro'),
	(2, 'Cartão de Crédito'),
	(3, 'Cartão de Débito'),
	(4, 'PIX'),
	(5, 'Cheque'),
	(6, 'Boleto');

-- Copiando estrutura para tabela tcc.orcamento
CREATE TABLE IF NOT EXISTS `orcamento` (
  `idOrcamento` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idOrcamento`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.orcamento: ~5 rows (aproximadamente)
INSERT INTO `orcamento` (`idOrcamento`, `codigo`, `descricao`) VALUES
	(1, '01', 'A pagar'),
	(2, '02', 'A receber'),
	(3, '01.01', 'Licença de uso de software'),
	(4, '01.02', 'Computadores e Acessórios'),
	(5, '01.03', 'Material de Escritório');

-- Copiando estrutura para tabela tcc.perfilusuario
CREATE TABLE IF NOT EXISTS `perfilusuario` (
  `idPerfilUsuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPerfilUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.perfilusuario: ~4 rows (aproximadamente)
INSERT INTO `perfilusuario` (`idPerfilUsuario`, `nome`) VALUES
	(1, 'Administradores'),
	(2, 'Usuário'),
	(3, 'Gestor Departamento'),
	(4, 'Gerente Financeiro');

-- Copiando estrutura para tabela tcc.requisicaopagamento
CREATE TABLE IF NOT EXISTS `requisicaopagamento` (
  `idRequisicaoPagamento` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(254) NOT NULL,
  `valor` float NOT NULL,
  `dataEmissao` date DEFAULT NULL,
  `dataVencimento` date DEFAULT NULL,
  `numeroNF` varchar(45) DEFAULT NULL,
  `dataRequisicao` date DEFAULT NULL,
  `status` int DEFAULT NULL,
  `MeioPagamento_idMeioPagamento` int NOT NULL,
  `Fornecedor_idFornecedor` int NOT NULL,
  `Orcamento_idOrcamento` int NOT NULL,
  `Usuario_idUsuario` int NOT NULL,
  `CCustos_idCCustos` int NOT NULL,
  PRIMARY KEY (`idRequisicaoPagamento`,`MeioPagamento_idMeioPagamento`,`Fornecedor_idFornecedor`,`Orcamento_idOrcamento`,`Usuario_idUsuario`,`CCustos_idCCustos`),
  KEY `fk_RequisicaoPagamento_MeioPagamento1_idx` (`MeioPagamento_idMeioPagamento`),
  KEY `fk_RequisicaoPagamento_Fornecedor1_idx` (`Fornecedor_idFornecedor`),
  KEY `fk_RequisicaoPagamento_Orcamento1_idx` (`Orcamento_idOrcamento`),
  KEY `fk_RequisicaoPagamento_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_RequisicaoPagamento_CCustos1_idx` (`CCustos_idCCustos`),
  CONSTRAINT `fk_RequisicaoPagamento_CCustos1` FOREIGN KEY (`CCustos_idCCustos`) REFERENCES `ccustos` (`idCCustos`),
  CONSTRAINT `fk_RequisicaoPagamento_Fornecedor1` FOREIGN KEY (`Fornecedor_idFornecedor`) REFERENCES `fornecedor` (`idFornecedor`),
  CONSTRAINT `fk_RequisicaoPagamento_MeioPagamento1` FOREIGN KEY (`MeioPagamento_idMeioPagamento`) REFERENCES `meiopagamento` (`idMeioPagamento`),
  CONSTRAINT `fk_RequisicaoPagamento_Orcamento1` FOREIGN KEY (`Orcamento_idOrcamento`) REFERENCES `orcamento` (`idOrcamento`),
  CONSTRAINT `fk_RequisicaoPagamento_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.requisicaopagamento: ~0 rows (aproximadamente)
INSERT INTO `requisicaopagamento` (`idRequisicaoPagamento`, `descricao`, `valor`, `dataEmissao`, `dataVencimento`, `numeroNF`, `dataRequisicao`, `status`, `MeioPagamento_idMeioPagamento`, `Fornecedor_idFornecedor`, `Orcamento_idOrcamento`, `Usuario_idUsuario`, `CCustos_idCCustos`) VALUES
	(1, 'Aquisição de 10 computadores Dell', 52000, '2024-10-10', '2024-10-30', '10/2024', '2024-10-31', 0, 2, 1, 1, 1, 3);

-- Copiando estrutura para tabela tcc.secao
CREATE TABLE IF NOT EXISTS `secao` (
  `idSecao` int NOT NULL AUTO_INCREMENT,
  `codSecao` varchar(45) NOT NULL,
  `nomeSecao` varchar(100) DEFAULT NULL,
  `Usuario_idUsuarioChefe` int NOT NULL,
  PRIMARY KEY (`idSecao`,`Usuario_idUsuarioChefe`),
  KEY `fk_secao_Usuario1_idx` (`Usuario_idUsuarioChefe`),
  CONSTRAINT `fk_secao_Usuario1` FOREIGN KEY (`Usuario_idUsuarioChefe`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.secao: ~2 rows (aproximadamente)
INSERT INTO `secao` (`idSecao`, `codSecao`, `nomeSecao`, `Usuario_idUsuarioChefe`) VALUES
	(2, '01', 'GSS', 2),
	(3, '01.01', 'Gerencia de Tecnologia', 2);

-- Copiando estrutura para tabela tcc.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `dataCriacao` date NOT NULL,
  `status` bit(1) DEFAULT NULL,
  `PerfilUsuario_idPerfilUsuario` int NOT NULL,
  `Secao_idSecao` int NOT NULL,
  PRIMARY KEY (`idUsuario`,`PerfilUsuario_idPerfilUsuario`,`Secao_idSecao`) USING BTREE,
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_Usuario_PerfilUsuario1_idx` (`PerfilUsuario_idPerfilUsuario`),
  KEY `fk_Usuario_secao1_idx` (`Secao_idSecao`) USING BTREE,
  CONSTRAINT `fk_Usuario_PerfilUsuario1` FOREIGN KEY (`PerfilUsuario_idPerfilUsuario`) REFERENCES `perfilusuario` (`idPerfilUsuario`),
  CONSTRAINT `fk_Usuario_secao1` FOREIGN KEY (`Secao_idSecao`) REFERENCES `secao` (`idSecao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela tcc.usuario: ~3 rows (aproximadamente)
INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `senha`, `dataCriacao`, `status`, `PerfilUsuario_idPerfilUsuario`, `Secao_idSecao`) VALUES
	(1, 'Ricardo da Silva Moreira', 'r.silvamoreira@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2024-06-03', b'1', 1, 2),
	(2, 'Gestor Tecnologia', 'gestortec@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2024-11-07', b'1', 3, 2),
	(3, 'Gerente Financeiro', 'financeiro@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2024-11-07', b'1', 4, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
