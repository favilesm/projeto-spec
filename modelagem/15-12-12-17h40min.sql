-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2012 at 05:40 PM
-- Server version: 5.5.28-0ubuntu0.12.04.3
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spec`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `administrador_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`administrador_id`),
  UNIQUE KEY `administrador_id_UNIQUE` (`administrador_id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`administrador_id`, `login`, `senha`) VALUES
(0, '123', '202cb962ac59075b964b07152d234b70'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'teste', 'teste'),
(5, 'sadmin', 'sadmin'),
(6, 'foda', 'foda'),
(15, 'dfgdf', '8d509c28896865f8640f328f30f15721'),
(16, 'sdfçgj', 'fea359f8f475de8454e24c777c6df8e8'),
(17, 'qwert', '075d8b8684d41cf08b156d6a0b17217d');

-- --------------------------------------------------------

--
-- Table structure for table `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `arquivos_id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(200) NOT NULL,
  `noticia_noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`arquivos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_blog` varchar(45) DEFAULT NULL,
  `texto_blog` text,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `titulo_blog`, `texto_blog`) VALUES
(1, 'Teste', '<p>\n	uisafhiuaosdhuiosfhuioasfhdiouahsiouhsafuihsa</p>\n'),
(2, 'sdfgdfg', '<p>\n	dfgdfg</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `dica`
--

CREATE TABLE IF NOT EXISTS `dica` (
  `dica_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_dica` varchar(200) DEFAULT NULL,
  `texto_dica` text,
  PRIMARY KEY (`dica_id`),
  UNIQUE KEY `dica_id_UNIQUE` (`dica_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dica`
--

INSERT INTO `dica` (`dica_id`, `titulo_dica`, `texto_dica`) VALUES
(1, 'oi', '<p>\n	oi</p>\n'),
(3, 'dfgdfg', '<p>\n	sdfgsg</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `mensagem`
--

CREATE TABLE IF NOT EXISTS `mensagem` (
  `mensagem_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_mensagem` varchar(45) NOT NULL,
  `texto_mensagem` text NOT NULL,
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  `administrador_administrador_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mensagem_id`),
  KEY `fk_mensagem_prefeitura1` (`prefeitura_prefeitura_id`),
  KEY `fk_mensagem_administrador1` (`administrador_administrador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `mensagem`
--

INSERT INTO `mensagem` (`mensagem_id`, `titulo_mensagem`, `texto_mensagem`, `prefeitura_prefeitura_id`, `administrador_administrador_id`) VALUES
(1, 'teste', 'teste', 21, 0),
(2, 'teste', '<p>\n	testelkfjhklfgjgjghk</p>\n', 21, 1),
(3, 'teeeeeeste', '<p>\n	aeaeae</p>\n', 21, 0),
(4, 'sdgsdfg', '<p>\n	sfgdfgdfg</p>\n', 19, 0),
(5, 'asfsdg', '<p>\n	sfdgdfgdfg</p>\n', 24, 1),
(6, 'wegfh', '<p>\n	dhfghfg</p>\n', 24, 1),
(7, 'dsfbdb', '<p>\n	fsbhdshfsdh</p>\n', 17, 0),
(9, 'dfhfgjh', '<p>\n	fghfghfg</p>\n', 70, 0),
(13, 'novamensage', '<p>\n	sfhfsdhh</p>\n', 13, 0),
(14, 'PRIMARY', '<p>\n	PRIMARY</p>\n', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `noticia_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(45) DEFAULT NULL,
  `texto_noticia` text,
  PRIMARY KEY (`noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`noticia_id`, `titulo_noticia`, `texto_noticia`) VALUES
(41, 'teste', '<p>\n	teste</p>\n'),
(44, 'sfghdf', '<p>\n	dfhdfh</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `prefeito`
--

CREATE TABLE IF NOT EXISTS `prefeito` (
  `prefeito_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prefeito` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email_prefeito` varchar(45) DEFAULT NULL,
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  PRIMARY KEY (`prefeito_id`),
  UNIQUE KEY `prefeito_id_UNIQUE` (`prefeito_id`),
  KEY `fk_prefeito_prefeitura1` (`prefeitura_prefeitura_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prefeito`
--

INSERT INTO `prefeito` (`prefeito_id`, `nome_prefeito`, `celular`, `cpf`, `data_nascimento`, `email_prefeito`, `prefeitura_prefeitura_id`) VALUES
(1, '1', '1', '1', '2012-12-18', '1', 17),
(2, 'p', 'p', 'p', '2012-12-03', 'p', 13),
(3, '1', '1', '1', '0000-00-00', '1', 56),
(4, 'dfhdf', 'gnfgn', 'fgnjfg', '1978-12-14', 'dghnfg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `prefeitura`
--

CREATE TABLE IF NOT EXISTS `prefeitura` (
  `prefeitura_id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(45) DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `num_habitantes` int(11) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `email_prefeitura` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `ativada` varchar(20) DEFAULT 'Não ativada',
  `quantidade_secretario` tinyint(4) NOT NULL DEFAULT '0',
  `ufmunicipio` varchar(300) NOT NULL,
  PRIMARY KEY (`prefeitura_id`),
  UNIQUE KEY `prefeitura_id_UNIQUE` (`prefeitura_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `prefeitura`
--

INSERT INTO `prefeitura` (`prefeitura_id`, `municipio`, `endereco`, `cnpj`, `num_habitantes`, `fax`, `uf`, `email_prefeitura`, `login`, `senha`, `ativada`, `quantidade_secretario`, `ufmunicipio`) VALUES
(13, 'testemunicipio', '78097', '890', 89, '7809', '2', 'sdgsdgh', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'Ativada', 0, 'SP-testemunicipio'),
(16, 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', 0, 'huio', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Ativada', 0, ''),
(17, 'Abc', 'av', '87878', 999, '9090', 'df', NULL, NULL, NULL, 'Não ativada', 0, ''),
(19, 'iuhu', 'ihiu', 'ohu', 0, 'iouh', 'iuh', NULL, NULL, '', 'Não ativada', 0, ''),
(21, '2', NULL, NULL, 0, NULL, 'UFFFF', NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'Não ativada', 0, ''),
(22, '3', NULL, NULL, 0, NULL, 'iu!!!', NULL, NULL, '74be16979710d4c4e7c6647856088456', 'Ativada', 0, 'iu!!!3'),
(24, 'uioh', 'uioh', 'iuh', NULL, 'ioh', 'iuh', 'iuh', 'iuh', 'iuh', 'Ativada', 0, ''),
(25, '45', NULL, NULL, NULL, NULL, NULL, NULL, 'oi', 'oi', 'Não ativada', 0, ''),
(26, '5', NULL, NULL, NULL, NULL, NULL, NULL, 'teste', '698dc19d489c4e4db73e28a713eab07b', 'Não ativada', 0, ''),
(56, NULL, '1', '1', 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 0, '1'),
(58, 'o', 'o', 'o', NULL, 'o', 'o', 'o', 'o', 'd95679752134a2d9eb61dbd7b91c4bcc', 'Não ativada', 0, ''),
(60, 'o', 'o', 'o', 1, 'o', '2', 'o', 'o', 'd95679752134a2d9eb61dbd7b91c4bcc', 'Não ativada', 0, ''),
(61, 'q', 'q', 'q', 1, 'q', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Não ativada', 0, ''),
(62, 'q', 'q', 'q', 1, 'q', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', 0, 'DFq'),
(63, 'q', 'q', 'q', 1, 'q', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Não ativada', 0, 'DFq'),
(64, 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', 0, 'huio', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', 0, 'DFouhoi'),
(65, 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', 0, 'huio', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Não ativada', 0, 'DF-ouhoi'),
(66, '1', '1', '1', 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', 0, ''),
(67, '1', '1', '1', 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', 0, 'DF-1'),
(69, '1', '1', '1', 1, '1', '2', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', 0, 'SP-1'),
(70, 'pindamo', 'aeae', 'aeae', 1, 'sflkjhgfjh', '1', 'sjkdhg', 'kjsfdhg', 'bc826d88f77b11012a3eda78c599dbb3', 'Não ativada', 0, ''),
(71, 'pindamo', 'aeae', 'aeae', 1, 'sflkjhgfjh', '1', 'sjkdhg', 'kjsfdhg', 'bc826d88f77b11012a3eda78c599dbb3', 'Não ativada', 0, 'DF-pindamo'),
(72, 'kilimanjaro', 'lksdhg', 'ljsfhg', 2, 'dlkfhgblkjh', '1', 'sdkjfh', 'ksjhd', 'e363aba26c370f3231ef5ac83567e57d', 'Não ativada', 0, ''),
(73, 'AEAEAEAEAEAE', 'sljdhg', 'slkjdhg', 13, 'sslfkjgh', '2', ',dhf', 'lkjshdg', 'd698d3a2be2e0f88aa59fe4a1888ced0', 'Não ativada', 0, ''),
(85, 'noisQVOA', 'sdflkh', 'dflk', 97, 'kljsfh', '1', 'lkfshg', 'lksfhg', '19f58218ed5c5c87703d3f36152685cc', 'Não ativada', 0, 'DF-noisQVOA');

-- --------------------------------------------------------

--
-- Table structure for table `prefeitura_x_dica`
--

CREATE TABLE IF NOT EXISTS `prefeitura_x_dica` (
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  `dica_dica_id` int(11) NOT NULL,
  PRIMARY KEY (`prefeitura_prefeitura_id`,`dica_dica_id`),
  KEY `dica_dica_id` (`dica_dica_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefeitura_x_dica`
--

INSERT INTO `prefeitura_x_dica` (`prefeitura_prefeitura_id`, `dica_dica_id`) VALUES
(13, 1),
(56, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prefeitura_x_noticia`
--

CREATE TABLE IF NOT EXISTS `prefeitura_x_noticia` (
  `prefeitura_prefeitura_id` int(11) NOT NULL DEFAULT '0',
  `noticia_noticia_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prefeitura_prefeitura_id`,`noticia_noticia_id`),
  KEY `fk_prefeitura_has_noticia_noticia1` (`noticia_noticia_id`),
  KEY `fk_prefeitura_has_noticia_prefeitura1` (`prefeitura_prefeitura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefeitura_x_noticia`
--

INSERT INTO `prefeitura_x_noticia` (`prefeitura_prefeitura_id`, `noticia_noticia_id`) VALUES
(13, 41),
(67, 44);

-- --------------------------------------------------------

--
-- Table structure for table `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `programa_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_programa` varchar(45) DEFAULT NULL,
  `texto_programa` text,
  PRIMARY KEY (`programa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `programa`
--

INSERT INTO `programa` (`programa_id`, `titulo_programa`, `texto_programa`) VALUES
(1, 'Programa um', '<p>\n	AEAEAEAEAEAEAEAE</p>\n'),
(2, 'sdfgdfg', '<p>\n	dfdghf</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `secretario`
--

CREATE TABLE IF NOT EXISTS `secretario` (
  `secretario_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_secretario` varchar(45) DEFAULT NULL,
  `email_secretario` varchar(45) DEFAULT NULL,
  `funcao` varchar(45) DEFAULT NULL,
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  PRIMARY KEY (`secretario_id`),
  KEY `fk_secretario_prefeitura1` (`prefeitura_prefeitura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
  `tel_id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(12) NOT NULL,
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  PRIMARY KEY (`tel_id`),
  UNIQUE KEY `tel_id` (`tel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `telefone`
--

INSERT INTO `telefone` (`tel_id`, `telefone`, `prefeitura_prefeitura_id`) VALUES
(1, '123123', 1),
(2, '321321', 1),
(3, 'sdgsdfghdf', 16);

-- --------------------------------------------------------

--
-- Table structure for table `uf`
--

CREATE TABLE IF NOT EXISTS `uf` (
  `id_uf` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(3) NOT NULL,
  PRIMARY KEY (`id_uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uf`
--

INSERT INTO `uf` (`id_uf`, `nome`) VALUES
(1, 'DF'),
(2, 'SP');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_mensagem_administrador1` FOREIGN KEY (`administrador_administrador_id`) REFERENCES `administrador` (`administrador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensagem_prefeitura1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prefeito`
--
ALTER TABLE `prefeito`
  ADD CONSTRAINT `fk_prefeito_prefeitura1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prefeitura_x_dica`
--
ALTER TABLE `prefeitura_x_dica`
  ADD CONSTRAINT `prefeitura_x_dica_ibfk_1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prefeitura_x_dica_ibfk_2` FOREIGN KEY (`dica_dica_id`) REFERENCES `dica` (`dica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
