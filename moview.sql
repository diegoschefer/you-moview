-- --------------------------------------------------------
-- Servidor:                     104.236.86.250
-- Versão do servidor:           5.5.38-0ubuntu0.14.04.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.1.0.4916
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para moview
CREATE DATABASE IF NOT EXISTS `moview` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `moview`;


-- Copiando estrutura para tabela moview.avaliacoes
CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `idavaliacoes` int(11) NOT NULL AUTO_INCREMENT,
  `nota` int(1) NOT NULL,
  `comentarios` text,
  `local` varchar(45) DEFAULT NULL,
  `companhia` varchar(45) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_idfilmes` int(11) DEFAULT NULL,
  PRIMARY KEY (`idavaliacoes`),
  KEY `fk_avaliacoes_filmes1_idx` (`fk_idfilmes`),
  CONSTRAINT `fk_avaliacoes_filmes1` FOREIGN KEY (`fk_idfilmes`) REFERENCES `filmes` (`idfilmes`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando estrutura para tabela moview.filmes
CREATE TABLE IF NOT EXISTS `filmes` (
  `idfilmes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `ano` int(4) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idfilmes`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela moview.filmes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` (`idfilmes`, `nome`, `ano`, `pais`, `imagem`, `status`) VALUES
	(37, 'Matrix', 1999, 'Brasil', '82b7a365766e7a8478e51748ec0139f0.jpg', 1),
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;


-- Copiando estrutura para tabela moview.filmes_generos
CREATE TABLE IF NOT EXISTS `filmes_generos` (
  `fk_idgereros` int(11) DEFAULT NULL,
  `fk_idfilmes` int(11) DEFAULT NULL,
  KEY `fk_table1_gereros_idx` (`fk_idgereros`),
  KEY `fk_table1_filmes1_idx` (`fk_idfilmes`),
  CONSTRAINT `FK_filmes_generos_filmes` FOREIGN KEY (`fk_idfilmes`) REFERENCES `filmes` (`idfilmes`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_filmes_generos_generos` FOREIGN KEY (`fk_idgereros`) REFERENCES `generos` (`idgeneros`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela moview.filmes_generos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `filmes_generos` DISABLE KEYS */;
INSERT INTO `filmes_generos` (`fk_idgereros`, `fk_idfilmes`) VALUES
	(1, NULL),
	(1, 37),
	(1, 38),
	(2, 38);
/*!40000 ALTER TABLE `filmes_generos` ENABLE KEYS */;


-- Copiando estrutura para tabela moview.generos
CREATE TABLE IF NOT EXISTS `generos` (
  `idgeneros` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idgeneros`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela moview.generos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` (`idgeneros`, `nome`) VALUES
	(1, 'Ação'),
	(2, 'Aventura');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
