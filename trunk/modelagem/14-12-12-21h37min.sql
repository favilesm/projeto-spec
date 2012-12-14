-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2012 at 09:36 PM
-- Server version: 5.5.28
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`administrador_id`, `login`, `senha`) VALUES
(0, '123', '202cb962ac59075b964b07152d234b70'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'teste', 'teste'),
(5, 'sadmin', 'sadmin'),
(6, 'foda', 'foda');

-- --------------------------------------------------------

--
-- Table structure for table `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `arquivos_id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(100) NOT NULL,
  `noticia_noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`arquivos_id`),
  UNIQUE KEY `arquivos_id` (`arquivos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_blog` varchar(45) DEFAULT NULL,
  `texto_blog` text,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `titulo_blog`, `texto_blog`) VALUES
(1, 'Teste', 'uisafhiuaosdhuiosfhuioasfhdiouahsiouhsafuihsa');

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
(1, 'oi', '<p>\r\n	oi</p>\r\n'),
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
  `administrador_administrador_id` int(11) NOT NULL,
  PRIMARY KEY (`mensagem_id`),
  KEY `fk_mensagem_prefeitura1` (`prefeitura_prefeitura_id`),
  KEY `fk_mensagem_administrador1` (`administrador_administrador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9, 'dfhfgjh', '<p>\n	fghfghfg</p>\n', 70, 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `noticia_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(45) DEFAULT NULL,
  `texto_noticia` text,
  PRIMARY KEY (`noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`noticia_id`, `titulo_noticia`, `texto_noticia`) VALUES
(41, 'teste', 'teste'),
(42, 'hjg', 'jhg'),
(43, 'ajndg', 'jkdg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `prefeito`
--

INSERT INTO `prefeito` (`prefeito_id`, `nome_prefeito`, `celular`, `cpf`, `data_nascimento`, `email_prefeito`, `prefeitura_prefeitura_id`) VALUES
(1, '1', '1', '1', '0000-00-00', '1', 17),
(2, 'p', 'p', 'p', '0000-00-00', 'p', 13),
(3, '1', '1', '1', '0000-00-00', '1', 56);

-- --------------------------------------------------------

--
-- Table structure for table `prefeitura`
--

CREATE TABLE IF NOT EXISTS `prefeitura` (
  `prefeitura_id` int(11) NOT NULL AUTO_INCREMENT,
  `prefeito_prefeito_id` int(11) NOT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `num_habitantes` int(11) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `email_prefeitura` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `ativada` varchar(20) DEFAULT 'Não ativada',
  `quantidade_secretario` int(11) DEFAULT NULL,
  `ufmunicipio` varchar(300) NOT NULL,
  PRIMARY KEY (`prefeitura_id`),
  UNIQUE KEY `prefeitura_id_UNIQUE` (`prefeitura_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `prefeitura`
--

INSERT INTO `prefeitura` (`prefeitura_id`, `prefeito_prefeito_id`, `municipio`, `endereco`, `cnpj`, `telefone`, `num_habitantes`, `fax`, `uf`, `email_prefeitura`, `login`, `senha`, `ativada`, `quantidade_secretario`, `ufmunicipio`) VALUES
(13, 9087, NULL, '78097', '890', '789', 89, '7809', '78!!!', NULL, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'Ativada', NULL, '78!!!asdasdaf'),
(16, 0, 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', 'huio', 0, 'huio', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Ativada', NULL, ''),
(17, 0, 'Abc', 'av', '87878', '90909', 999, '9090', 'df', NULL, NULL, NULL, 'Não ativada', NULL, ''),
(19, 0, 'iuhu', 'ihiu', 'ohu', 'ioh', 0, 'iouh', 'iuh', NULL, NULL, '', 'Não ativada', NULL, ''),
(21, 0, '2', NULL, NULL, NULL, 0, NULL, 'UFFFF', NULL, NULL, 'd41d8cd98f00b204e9800998ecf8427e', 'Não ativada', 0, ''),
(22, 0, '3', NULL, NULL, NULL, 0, NULL, 'iu!!!', NULL, NULL, '74be16979710d4c4e7c6647856088456', 'Ativada', NULL, 'iu!!!3'),
(24, 0, 'uioh', 'uioh', 'iuh', 'uioh', NULL, 'ioh', 'iuh', 'iuh', 'iuh', 'iuh', 'Ativada', NULL, ''),
(25, 0, '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oi', 'oi', 'Não ativada', NULL, ''),
(26, 0, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'teste', '698dc19d489c4e4db73e28a713eab07b', 'Não ativada', NULL, ''),
(56, 10, NULL, '1', '1', '1', 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 3, '1'),
(57, 0, 'p', 'p', 'p', 'p', NULL, 'p', 'p', 'p', 'p', 'e9e1525247f8b817cc781f02a015eecc', 'Não ativada', NULL, ''),
(58, 0, 'o', 'o', 'o', 'o', NULL, 'o', 'o', 'o', 'o', 'd95679752134a2d9eb61dbd7b91c4bcc', 'Não ativada', NULL, ''),
(60, 0, 'o', 'o', 'o', NULL, 1, 'o', '2', 'o', 'o', 'd95679752134a2d9eb61dbd7b91c4bcc', 'Não ativada', NULL, ''),
(61, 0, 'q', 'q', 'q', NULL, 1, 'q', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Não ativada', NULL, ''),
(62, 0, 'q', 'q', 'q', NULL, 1, 'q', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', NULL, 'DFq'),
(63, 0, 'q', 'q', 'q', NULL, 1, 'q', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Não ativada', NULL, 'DFq'),
(64, 0, 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', NULL, 0, 'huio', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', NULL, 'DFouhoi'),
(65, 0, 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', NULL, 0, 'huio', '1', '1', '1', '28c8edde3d61a0411511d3b1866f0636', 'Não ativada', NULL, 'DF-ouhoi'),
(66, 0, '1', '1', '1', NULL, 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', NULL, ''),
(67, 0, '1', '1', '1', NULL, 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', NULL, 'DF-1'),
(69, 0, '1', '1', '1', NULL, 1, '1', '2', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Não ativada', NULL, 'SP-1'),
(70, 0, 'pindamo', 'aeae', 'aeae', NULL, 1, 'sflkjhgfjh', '1', 'sjkdhg', 'kjsfdhg', 'bc826d88f77b11012a3eda78c599dbb3', 'Não ativada', NULL, ''),
(71, 0, 'pindamo', 'aeae', 'aeae', NULL, 1, 'sflkjhgfjh', '1', 'sjkdhg', 'kjsfdhg', 'bc826d88f77b11012a3eda78c599dbb3', 'Não ativada', NULL, 'DF-pindamo'),
(72, 0, 'kilimanjaro', 'lksdhg', 'ljsfhg', NULL, 2, 'dlkfhgblkjh', '1', 'sdkjfh', 'ksjhd', 'e363aba26c370f3231ef5ac83567e57d', 'Não ativada', NULL, ''),
(73, 0, 'AEAEAEAEAEAE', 'sljdhg', 'slkjdhg', NULL, 13, 'sslfkjgh', '2', ',dhf', 'lkjshdg', 'd698d3a2be2e0f88aa59fe4a1888ced0', 'Não ativada', NULL, ''),
(74, 0, 'brasolia', 'sjkfdhg', 'skjfhg', NULL, 4234, 'sjdhg', '2', 'lskdhg', 'dslfkh', 'bc4ea4279239c4e699043b1823e0ff28', 'Não ativada', NULL, ''),
(75, 0, 'brasulia', 'ljskfg', 'ml,sndg', NULL, 457, 'dljg', '1', 'slkdh', 'lkdjsh', 'sfkdlh', 'Não ativada', NULL, '');

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
(62, 42),
(64, 42),
(65, 42);

-- --------------------------------------------------------

--
-- Table structure for table `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `programa_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_programa` varchar(45) DEFAULT NULL,
  `texto_programa` text,
  PRIMARY KEY (`programa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `programa`
--

INSERT INTO `programa` (`programa_id`, `titulo_programa`, `texto_programa`) VALUES
(1, 'Programa um', '<p>\n	AEAEAEAEAEAEAEAE</p>\n');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `secretario`
--

INSERT INTO `secretario` (`secretario_id`, `nome_secretario`, `email_secretario`, `funcao`, `prefeitura_prefeitura_id`) VALUES
(1, '809', NULL, '89', 1),
(2, '890', '79789', '0', 13),
(3, 'hui', 'hui', 'uip', 13),
(4, 'uioh', 'uih', 'uihui', 13),
(5, 'uihi', 'u', 'iuo', 13),
(6, 'hui', 'hiu', 'hoiu', 13),
(7, 'houi', 'huio', 'houi', 13),
(8, '8', '0-8-9', '908', 13),
(9, '7', '87', '87', 13),
(10, 'ou', 'oui', 'oo', 13),
(11, '0980', '80', '89', 13),
(12, '87', '87', '87', 13),
(13, '90-', '898', '90-', 13),
(14, 'uioh', 'iuh', 'ouih', 13),
(15, 'Ola', '', '', 19),
(17, 'p', 'p', 'p', 56),
(18, 'q', 'q', 'q', 56);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `telefone`
--

INSERT INTO `telefone` (`tel_id`, `telefone`, `prefeitura_prefeitura_id`) VALUES
(1, '123123', 1),
(2, '321321', 1);

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
  ADD CONSTRAINT `prefeitura_x_dica_ibfk_2` FOREIGN KEY (`dica_dica_id`) REFERENCES `dica` (`dica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prefeitura_x_dica_ibfk_1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
