-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2012 at 12:45 PM
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
  UNIQUE KEY `administrador_id_UNIQUE` (`administrador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`administrador_id`, `login`, `senha`) VALUES
(0, '123', '202cb962ac59075b964b07152d234b70'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin', 'admin'),
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

--
-- Dumping data for table `arquivos`
--

INSERT INTO `arquivos` (`arquivos_id`, `arquivo`, `noticia_noticia_id`) VALUES
(3, '3a95b-camisa-cacomp.pdf', 1),
(4, '5d2e4-Proposta-SPEC.pdf', 1),
(5, 'a2036-camisa-cacomp.pdf', 1);

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
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  PRIMARY KEY (`dica_id`),
  UNIQUE KEY `dica_id_UNIQUE` (`dica_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dica`
--

INSERT INTO `dica` (`dica_id`, `titulo_dica`, `texto_dica`, `prefeitura_prefeitura_id`) VALUES
(1, 'oi', '<p>\r\n	oi</p>\r\n', 1),
(2, NULL, '<p>\r\n	asdfasdfasfd<span style="color:#a52a2a;">asdfasdfasdfasfddasf</span><span style="color:#ffffe0;">sadfasfd</span></p>\r\n', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 'dsfbdb', '<p>\n	fsbhdshfsdh</p>\n', 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `noticia_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(45) DEFAULT NULL,
  `texto_noticia` varchar(45) DEFAULT NULL,
  `id_uf` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`noticia_id`, `titulo_noticia`, `texto_noticia`, `id_uf`) VALUES
(1, 'asdasd', 'asdads', 1),
(2, 'fgdfg', 'dfgdfg', 1),
(3, 'oi', 'oi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prefeito`
--

CREATE TABLE IF NOT EXISTS `prefeito` (
  `prefeito_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prefeito` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `data_nascimento` varchar(45) DEFAULT NULL,
  `email_prefeito` varchar(45) DEFAULT NULL,
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  PRIMARY KEY (`prefeito_id`),
  UNIQUE KEY `prefeito_id_UNIQUE` (`prefeito_id`),
  KEY `fk_prefeito_prefeitura1` (`prefeitura_prefeitura_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prefeito`
--

INSERT INTO `prefeito` (`prefeito_id`, `nome_prefeito`, `celular`, `cpf`, `data_nascimento`, `email_prefeito`, `prefeitura_prefeitura_id`) VALUES
(1, '1', '1', '1', '1', '1', 17),
(2, 'p', 'p', 'p', 'p', 'p', 13);

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
  `id_uf` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`prefeitura_id`),
  UNIQUE KEY `prefeitura_id_UNIQUE` (`prefeitura_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `prefeitura`
--

INSERT INTO `prefeitura` (`prefeitura_id`, `prefeito_prefeito_id`, `municipio`, `endereco`, `cnpj`, `telefone`, `num_habitantes`, `fax`, `uf`, `email_prefeitura`, `login`, `senha`, `ativada`, `quantidade_secretario`, `id_uf`) VALUES
(1, 0, 'oioioi', 'j', 'jh', 'jh', 222, 'hj', '1', 'hj', 'hj', '202cb962ac59075b964b07152d234b70', 'Ativada', 2, 1),
(13, 9087, '809', '78097', '890', '789', 89, '7809', '78', NULL, NULL, '789', 'Ativada', NULL, 1),
(16, 0, 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', 'huio', 0, 'huio', 'hou', NULL, NULL, '', 'Ativada', NULL, 1),
(17, 0, 'Abc', 'av', '87878', '90909', 999, '9090', 'df', NULL, NULL, NULL, 'Ativada', NULL, 1),
(18, 0, '', '', '', '', 0, '', '', NULL, NULL, '', 'Ativada', NULL, 1),
(19, 0, 'iuhu', 'ihiu', 'ohu', 'ioh', 0, 'iouh', 'iuh', NULL, NULL, '', 'Não ativada', NULL, 1),
(20, 0, '', '', '', '', 0, '', '', NULL, NULL, '', 'Não ativada', NULL, 1),
(21, 0, '', '', '', '', 0, '', '', NULL, NULL, '', 'Não ativada', NULL, 1),
(22, 0, '', '', '', '', 0, '', '', NULL, NULL, '', 'Não ativada', NULL, 2),
(23, 123123123, '', '', '', '', 0, '', '', NULL, NULL, '', 'Não ativada', NULL, 2),
(24, 0, 'uioh', 'uioh', 'iuh', 'uioh', NULL, 'ioh', 'iuh', 'iuh', 'iuh', 'iuh', 'Ativada', NULL, 2),
(25, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oi', 'oi', 'Não ativada', NULL, 2),
(26, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'teste', '698dc19d489c4e4db73e28a713eab07b', 'Não ativada', NULL, 2),
(27, 1, '1', '1', '1', '1', 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Ativada', NULL, 2),
(28, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oi', 'a2e63ee01401aaeca78be023dfbb8c59', 'Não ativada', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prefeitura_x_dica`
--

CREATE TABLE IF NOT EXISTS `prefeitura_x_dica` (
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  `dica_titulo` int(11) NOT NULL,
  PRIMARY KEY (`prefeitura_prefeitura_id`,`dica_titulo`),
  KEY `fk_prefeitura_has_dica_dica1` (`dica_titulo`),
  KEY `fk_prefeitura_has_dica_prefeitura1` (`prefeitura_prefeitura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prefeitura_x_noticia`
--

CREATE TABLE IF NOT EXISTS `prefeitura_x_noticia` (
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  `noticia_noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`prefeitura_prefeitura_id`,`noticia_noticia_id`),
  KEY `fk_prefeitura_has_noticia_noticia1` (`noticia_noticia_id`),
  KEY `fk_prefeitura_has_noticia_prefeitura1` (`prefeitura_prefeitura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefeitura_x_noticia`
--

INSERT INTO `prefeitura_x_noticia` (`prefeitura_prefeitura_id`, `noticia_noticia_id`) VALUES
(1, 1),
(1, 2),
(1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(15, 'Ola', '', '', 19);

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
  ADD CONSTRAINT `fk_prefeitura_has_dica_dica1` FOREIGN KEY (`dica_titulo`) REFERENCES `dica` (`dica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prefeitura_has_dica_prefeitura1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
