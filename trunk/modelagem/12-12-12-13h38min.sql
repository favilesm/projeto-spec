-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 12/12/2012 às 13h37min
-- Versão do Servidor: 5.5.28
-- Versão do PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `spec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `administrador_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`administrador_id`),
  UNIQUE KEY `administrador_id_UNIQUE` (`administrador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `administrador`
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
-- Estrutura da tabela `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `arquivos_id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(100) NOT NULL,
  `noticia_noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`arquivos_id`),
  UNIQUE KEY `arquivos_id` (`arquivos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`arquivos_id`, `arquivo`, `noticia_noticia_id`) VALUES
(3, '3a95b-camisa-cacomp.pdf', 1),
(4, '5d2e4-Proposta-SPEC.pdf', 1),
(5, 'a2036-camisa-cacomp.pdf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(11) NOT NULL,
  `titulo_blog` varchar(45) DEFAULT NULL,
  `texto_blog` text,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`blog_id`, `titulo_blog`, `texto_blog`) VALUES
(0, 'Teste', 'uisafhiuaosdhuiosfhuioasfhdiouahsiouhsafuihsa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dica`
--

CREATE TABLE IF NOT EXISTS `dica` (
  `dica_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_dica` varchar(200) DEFAULT NULL,
  `texto_dica` text,
  PRIMARY KEY (`dica_id`),
  UNIQUE KEY `dica_id_UNIQUE` (`dica_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `dica`
--

INSERT INTO `dica` (`dica_id`, `titulo_dica`, `texto_dica`) VALUES
(1, 'oi', '<p>\r\n	oi</p>\r\n'),
(2, NULL, '<p>\r\n	asdfasdfasfd<span style="color:#a52a2a;">asdfasdfasdfasfddasf</span><span style="color:#ffffe0;">sadfasfd</span></p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
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
-- Extraindo dados da tabela `mensagem`
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
-- Estrutura da tabela `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `noticia_id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_noticia` varchar(45) DEFAULT NULL,
  `texto_noticia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`noticia_id`, `titulo_noticia`, `texto_noticia`) VALUES
(1, 'asdasd', 'asdads'),
(2, 'fgdfg', 'dfgdfg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prefeito`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `prefeito`
--

INSERT INTO `prefeito` (`prefeito_id`, `nome_prefeito`, `celular`, `cpf`, `data_nascimento`, `email_prefeito`, `prefeitura_prefeitura_id`) VALUES
(1, '1', '1', '1', '1', '1', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prefeitura`
--

CREATE TABLE IF NOT EXISTS `prefeitura` (
  `prefeitura_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prefeitura` varchar(45) NOT NULL,
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
  PRIMARY KEY (`prefeitura_id`),
  UNIQUE KEY `prefeitura_id_UNIQUE` (`prefeitura_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `prefeitura`
--

INSERT INTO `prefeitura` (`prefeitura_id`, `nome_prefeitura`, `municipio`, `endereco`, `cnpj`, `telefone`, `num_habitantes`, `fax`, `uf`, `email_prefeitura`, `login`, `senha`, `ativada`, `quantidade_secretario`) VALUES
(1, 'oi', 'oioioi', 'j', 'jh', 'jh', 222, 'hj', 'hj', 'hj', 'hj', '202cb962ac59075b964b07152d234b70', '1', 2),
(13, '9087', '809', '78097', '890', '789', 89, '7809', '78', NULL, NULL, '789', '0', NULL),
(16, 'Teste 123', 'ouhoi', 'huiohouihduiofhusiofdhoui', 'huio', 'huio', 0, 'huio', 'hou', NULL, NULL, '', '0', NULL),
(17, 'Testando 123', 'Abc', 'av', '87878', '90909', 999, '9090', 'df', NULL, NULL, NULL, '1', NULL),
(18, 'Teste 2', '', '', '', '', 0, '', '', NULL, NULL, '', '0', NULL),
(19, 'Teste 3', 'iuhu', 'ihiu', 'ohu', 'ioh', 0, 'iouh', 'iuh', NULL, NULL, '', '0', NULL),
(20, 'Um doi tres', '', '', '', '', 0, '', '', NULL, NULL, '', '0', NULL),
(21, 'Atchim', '', '', '', '', 0, '', '', NULL, NULL, '', '0', NULL),
(22, 'uhuhuh', '', '', '', '', 0, '', '', NULL, NULL, '', '0', NULL),
(23, '123123123', '', '', '', '', 0, '', '', NULL, NULL, '', '0', NULL),
(24, 'iuohuiohuihuih', 'uioh', 'uioh', 'iuh', 'uioh', NULL, 'ioh', 'iuh', 'iuh', 'iuh', 'iuh', NULL, NULL),
(25, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oi', 'oi', NULL, NULL),
(26, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'teste', '698dc19d489c4e4db73e28a713eab07b', NULL, NULL),
(27, '1', '1', '1', '1', '1', 1, '1', '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Ativada', NULL),
(28, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oi', 'a2e63ee01401aaeca78be023dfbb8c59', 'Não ativada', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prefeitura_x_dica`
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
-- Estrutura da tabela `prefeitura_x_noticia`
--

CREATE TABLE IF NOT EXISTS `prefeitura_x_noticia` (
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  `noticia_noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`prefeitura_prefeitura_id`,`noticia_noticia_id`),
  KEY `fk_prefeitura_has_noticia_noticia1` (`noticia_noticia_id`),
  KEY `fk_prefeitura_has_noticia_prefeitura1` (`prefeitura_prefeitura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prefeitura_x_noticia`
--

INSERT INTO `prefeitura_x_noticia` (`prefeitura_prefeitura_id`, `noticia_noticia_id`) VALUES
(13, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `programa_id` int(11) NOT NULL,
  `titulo_programa` varchar(45) DEFAULT NULL,
  `texto_programa` text,
  PRIMARY KEY (`programa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretario`
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
-- Extraindo dados da tabela `secretario`
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
-- Estrutura da tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
  `tel_id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(12) NOT NULL,
  `prefeitura_prefeitura_id` int(11) NOT NULL,
  PRIMARY KEY (`tel_id`),
  UNIQUE KEY `tel_id` (`tel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`tel_id`, `telefone`, `prefeitura_prefeitura_id`) VALUES
(1, '123123', 1),
(2, '321321', 1);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fk_mensagem_administrador1` FOREIGN KEY (`administrador_administrador_id`) REFERENCES `administrador` (`administrador_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mensagem_prefeitura1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `prefeito`
--
ALTER TABLE `prefeito`
  ADD CONSTRAINT `fk_prefeito_prefeitura1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `prefeitura_x_dica`
--
ALTER TABLE `prefeitura_x_dica`
  ADD CONSTRAINT `fk_prefeitura_has_dica_dica1` FOREIGN KEY (`dica_titulo`) REFERENCES `dica` (`dica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prefeitura_has_dica_prefeitura1` FOREIGN KEY (`prefeitura_prefeitura_id`) REFERENCES `prefeitura` (`prefeitura_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
