-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2014 às 00:36
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `docoficial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `cod_documento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `assunto` varchar(200) NOT NULL,
  `redacao` varchar(45) NOT NULL,
  `data_documento` date NOT NULL,
  `tipo_documento_cod_tipo_documento` int(11) NOT NULL,
  `usuario_cod_usuario` int(11) NOT NULL,
  `secretaria_cod_secretaria` int(11) NOT NULL,
  PRIMARY KEY (`cod_documento`),
  KEY `fk_documento_tipo_documento_idx` (`tipo_documento_cod_tipo_documento`),
  KEY `fk_documento_usuario1_idx` (`usuario_cod_usuario`),
  KEY `fk_documento_secretaria1_idx` (`secretaria_cod_secretaria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='tabela que conterá registro de todos os documentos.' AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `documento`
--

INSERT INTO `documento` (`cod_documento`, `titulo`, `assunto`, `redacao`, `data_documento`, `tipo_documento_cod_tipo_documento`, `usuario_cod_usuario`, `secretaria_cod_secretaria`) VALUES
(1, 'Teste Documento 0001', 'HADTHSDHFARH', '<p>FDHDSHSFGNADFHSFTJF</p>\r\n', '2014-12-02', 3, 24, 1),
(4, 'Teste Documento 0001', 'Decreto exonera Cabloco', '<p>&Agrave; SMAR</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>S', '2014-12-10', 1, 24, 1),
(6, 'Documento Alterado', 'IUsgauahsoidvsp ', '<p>oISOIGAOFISVOIAHOVUHUXC IUHASUIFWU EHEF iu', '2014-12-18', 7, 24, 5),
(10, 'dshstjsrynw', ' athwhweagrsg', '<p>Solicito a autoriza&ccedil;&atilde;o de in', '2014-12-02', 5, 24, 7),
(11, 'dshstjsrynw', ' athwhweagrsg', '\r\nSolicito a autorização de inscrição na capa', '2014-12-02', 5, 24, 7),
(15, 'ouhdouashouhodhu', ' iaysgdiyasgdyiagsdy', '<p>ddddddddddd</p>\r\n', '2014-12-09', 7, 24, 8),
(16, 'InstruÃ§Ã£o Normativa', 'InstruÃ§Ã£o Normativa de TI ', '<p>ffffffffffffffddddddssssss</p>\r\n', '2014-12-17', 5, 24, 6),
(20, '005', ' pijpxjipjfpbdjpib', '<p>njkvbsahvbxkjcv kjsafnvljnacjlvbjkasbvjlb', '2014-12-19', 5, 24, 4),
(21, 'Teste Teste', 'Aumento SalÃ¡rial ', '<p>~lJZCVkjsvdjnjczn,m cjsn lXCLNXFLLJNLJFNLJ', '2014-12-18', 3, 2, 5),
(22, 'DOC - TESTE Meio Ambiente', ' LJDKVBLSNLIJDONSNF  ', '<p>OUADHIVNZLDNCLSDIONdnioHIONl vdijSDNPInsdi', '2014-12-08', 3, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `cod_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pessoa` varchar(200) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`cod_pessoa`, `nome_pessoa`, `cpf`, `matricula`) VALUES
(1, 'Fabio Leandro', '11440423700', '123456'),
(7, 'Daniel SantosLoL', '11440423700', '123456'),
(11, 'x2', '1140423725', '12345'),
(12, 'Cebola', '1140423725', '12345'),
(13, 'Cebola', '1140423725', '12345'),
(15, 'x2', '1140423725', '12345'),
(17, 'Ronie', '1140423725', '12345'),
(19, 'Ronie', '1140423725', '12345'),
(20, 'Lavanda', '1140423725', '12345'),
(21, 'Leila', '1140423725', '12345'),
(22, 'Leidiane', '124587428', '333658'),
(23, 'milton', '8877455', '225452552'),
(24, 'Carlos Frederico', '1140423725', '12345'),
(25, 'Driele ', '1140423725', '5558744');

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretaria`
--

CREATE TABLE IF NOT EXISTS `secretaria` (
  `cod_secretaria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_secretaria` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_secretaria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `secretaria`
--

INSERT INTO `secretaria` (`cod_secretaria`, `nome_secretaria`) VALUES
(1, 'AdministraÃ§Ã£o'),
(3, 'Meio Ambiente'),
(4, 'Fazenda'),
(5, 'SaÃºde'),
(6, 'Auditoria'),
(7, 'Esportes'),
(8, 'AÃ§Ã£o Social ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_documento`
--

CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `cod_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_tipo_documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela para definir tipo de documentos oficiais' AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tipo_documento`
--

INSERT INTO `tipo_documento` (`cod_tipo_documento`, `nome_tipo`) VALUES
(1, 'OfÃ­cio'),
(3, 'Decreto'),
(5, 'Portaria'),
(7, 'Lei');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `cod_tipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_tipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`cod_tipoUsuario`, `tipoUsuario`) VALUES
(1, 'Administrador'),
(2, 'Gestor'),
(3, 'Redator');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(60) NOT NULL,
  `senha_usuario` varchar(45) NOT NULL,
  `pessoa_cod_pessoa` int(11) NOT NULL,
  `secretaria_cod_secretaria` int(11) NOT NULL,
  `tipo_usuario_cod_tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_usuario`),
  KEY `fk_usuario_pessoa1_idx` (`pessoa_cod_pessoa`),
  KEY `fk_usuario_secretaria1_idx` (`secretaria_cod_secretaria`),
  KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usuario_cod_tipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `pessoa_cod_pessoa`, `secretaria_cod_secretaria`, `tipo_usuario_cod_tipoUsuario`) VALUES
(2, 'frede', 'frede@tetse.com', 'MTUyODAx', 1, 3, 2),
(23, 'frede', 'teste@tetse.com', 'bGVyb2xlcm8=', 1, 6, 2),
(24, 'danielsc', 'teste@teste.com', 'MTIzNDU2', 1, 1, 1),
(26, 'Ronie', 'teste@tetse.com', 'MTIzNDU2', 12, 3, 3);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `fk_documento_secretaria1` FOREIGN KEY (`secretaria_cod_secretaria`) REFERENCES `secretaria` (`cod_secretaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documento_tipo_documento` FOREIGN KEY (`tipo_documento_cod_tipo_documento`) REFERENCES `tipo_documento` (`cod_tipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_documento_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_pessoa1` FOREIGN KEY (`pessoa_cod_pessoa`) REFERENCES `pessoa` (`cod_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_secretaria1` FOREIGN KEY (`secretaria_cod_secretaria`) REFERENCES `secretaria` (`cod_secretaria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usuario_cod_tipoUsuario`) REFERENCES `tipo_usuario` (`cod_tipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
