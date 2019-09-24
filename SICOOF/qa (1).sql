-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `qa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE IF NOT EXISTS `atividades` (
  `id_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `id_disciplina` int(11) NOT NULL,
  `nome_atividade` varchar(150) NOT NULL DEFAULT '',
  `ativo` int(11) DEFAULT '1',
  `ultima_alteracao` int(11) DEFAULT NULL,
  `id_tipo_auditoria` int(11) NOT NULL,
  PRIMARY KEY (`id_atividade`),
  KEY `fk_atividades_discliplinas1` (`id_disciplina`),
  KEY `id_tipo_auditoria` (`id_tipo_auditoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=259 ;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id_atividade`, `id_disciplina`, `nome_atividade`, `ativo`, `ultima_alteracao`, `id_tipo_auditoria`) VALUES
(1, 1, 'Planejar Projeto90as', 1, 0, 1),
(254, 1, 'Elaborar Ambiente', 1, 1368119721, 3),
(255, 1, 'Preparar Ambiente', 1, 0, 1),
(256, 1, 'Ministrar Treinamento', 0, 0, 2),
(257, 2, 'Executar auditoria', 1, 0, 1),
(258, 2, 'Nome de Teste22', 1, 1367602308, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria_fase`
--

CREATE TABLE IF NOT EXISTS `auditoria_fase` (
  `id_fase_auditoria` int(11) NOT NULL DEFAULT '0',
  `nome_fase` varchar(50) NOT NULL DEFAULT '',
  `ativo` int(11) DEFAULT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fase_auditoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `auditoria_fase`
--

INSERT INTO `auditoria_fase` (`id_fase_auditoria`, `nome_fase`, `ativo`, `ultima_alteracao`) VALUES
(1, 'Concepção', 1, '2013-04-30 12:58:09'),
(2, 'Elaboração', 1, '2013-04-30 13:22:16'),
(0, 'Loucura', 1, '2013-05-08 17:49:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria_resultado`
--

CREATE TABLE IF NOT EXISTS `auditoria_resultado` (
  `id_resultado` int(11) NOT NULL AUTO_INCREMENT,
  `id_auditoria` int(11) NOT NULL,
  `tipo_auditoria` varchar(500) DEFAULT NULL,
  `disciplina` varchar(500) DEFAULT NULL,
  `atividade` varchar(500) DEFAULT NULL,
  `questao` varchar(500) DEFAULT NULL,
  `resposta` varchar(45) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_resultado`),
  KEY `fk_auditoria_resultado_planejamento_auditorias1` (`id_auditoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria_status`
--

CREATE TABLE IF NOT EXISTS `auditoria_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nome_status` varchar(250) NOT NULL DEFAULT '',
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ciclo_vida`
--

CREATE TABLE IF NOT EXISTS `ciclo_vida` (
  `id_ciclo_vida` int(11) NOT NULL,
  `nome_ciclo_vida` varchar(250) DEFAULT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ciclo_vida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(500) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `ultima_alteracao` int(11) DEFAULT NULL,
  `id_segmento` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_cliente_segmento_mercado1` (`id_segmento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `ativo`, `descricao`, `ultima_alteracao`, `id_segmento`) VALUES
(13, 'teste', 0, 'sdsds', 1365002288, 1),
(14, 'luquete', 1, 'descricao', 1365714388, 3),
(15, 'DSDSD', 1, 'SDSDSD', 1365003501, 1),
(16, 'QWQWQW', 1, 'QWQWQW', 1365003508, 2),
(17, 'teste novo', 1, 'tese novo', 1365265027, 2),
(18, 'fdgfdg', 0, 'fgfsdg', 1365270424, 2),
(19, 'dfdfdsfsdf', 1, 'dsfsdafdsf', 1365265673, 2),
(20, 'a_0001 ', 1, 'descr', 1366059463, 5),
(21, 'www', 0, 'sdsadsad', 1365270394, 1),
(22, 'Petrobras', 1, 'petrolifera', 1365270957, 3),
(23, 'sdsdsd', 1, 'sdsd', 1365271111, 3),
(24, 'teset cristian', 0, 'teste', 1365273288, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `criterios_produtos`
--

CREATE TABLE IF NOT EXISTS `criterios_produtos` (
  `id_produto_trabalho` int(11) NOT NULL,
  `id_criterio` int(11) NOT NULL AUTO_INCREMENT,
  `criterio` varchar(1000) DEFAULT NULL,
  `ativo` varchar(45) DEFAULT '1',
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_criterio`),
  KEY `fk_criterios_produtos_produtos_trabalho1` (`id_produto_trabalho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_auditoria` int(11) NOT NULL,
  `nome_disciplina` varchar(100) NOT NULL DEFAULT '',
  `ativo` int(11) DEFAULT NULL,
  `ultima_alteracao` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`),
  KEY `fk_discliplinas_tipo_auditorias1` (`id_tipo_auditoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `id_tipo_auditoria`, `nome_disciplina`, `ativo`, `ultima_alteracao`) VALUES
(1, 1, 'Ambiente', 1, 0),
(2, 1, 'Validação e Verificação', 1, 1367325139);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fase_questao`
--

CREATE TABLE IF NOT EXISTS `fase_questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fase` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `fase_questao`
--

INSERT INTO `fase_questao` (`id`, `id_fase`, `id_questao`) VALUES
(1, 1, 1461),
(2, 2, 1461),
(3, 2, 1462),
(4, 1, 1463),
(5, 2, 1463),
(6, 0, 1463),
(7, 1, 1464),
(8, 2, 1464),
(15, 1, 1465);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planejamento_auditorias`
--

CREATE TABLE IF NOT EXISTS `planejamento_auditorias` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `observacao_auditoria` varchar(500) NOT NULL,
  `id_fase_configuracao` int(2) DEFAULT NULL,
  `data_planejada` datetime DEFAULT NULL,
  `data_realizada` date DEFAULT NULL,
  `id_projeto` int(11) NOT NULL,
  `id_status_auditoria` int(11) NOT NULL,
  `id_responsavel` int(11) NOT NULL,
  `id_produto_trabalho` int(11) NOT NULL,
  `id_tipo_auditoria` int(11) NOT NULL,
  `id_pontos_positivos` int(11) NOT NULL,
  `id_fase_auditoria` int(11) NOT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_auditoria`),
  KEY `fk_planejamento_auditorias_projetos` (`id_projeto`),
  KEY `fk_planejamento_auditorias_auditoria_status1` (`id_status_auditoria`),
  KEY `fk_planejamento_auditorias_usuarios1` (`id_responsavel`),
  KEY `fk_planejamento_auditorias_produtos_trabalho1` (`id_produto_trabalho`),
  KEY `fk_planejamento_auditorias_tipo_auditorias1` (`id_tipo_auditoria`),
  KEY `fk_planejamento_auditorias_pontos_positivos1` (`id_pontos_positivos`),
  KEY `fk_planejamento_auditorias_auditoria_fase1` (`id_fase_auditoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1082 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos_positivos`
--

CREATE TABLE IF NOT EXISTS `pontos_positivos` (
  `id_pontos_positivos` int(11) NOT NULL DEFAULT '0',
  `pontos_positivos` varchar(1000) DEFAULT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pontos_positivos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_trabalho`
--

CREATE TABLE IF NOT EXISTS `produtos_trabalho` (
  `id_produto_trabalho` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL DEFAULT '',
  `ativo` int(11) DEFAULT '1',
  `id_disciplina` int(11) NOT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_produto_trabalho`),
  KEY `fk_produtos_trabalho_discliplinas1` (`id_disciplina`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE IF NOT EXISTS `projetos` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_projeto` varchar(500) NOT NULL DEFAULT '',
  `ativo` int(11) NOT NULL DEFAULT '0',
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `id_tecnologia` int(11) NOT NULL,
  `id_tipo_projeto` int(11) NOT NULL,
  `id_ciclo_vida` int(11) NOT NULL,
  `id_gerente` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `fk_projetos_tecnologia1` (`id_tecnologia`),
  KEY `fk_projetos_tipo_projeto1` (`id_tipo_projeto`),
  KEY `fk_projetos_ciclo_vida1` (`id_ciclo_vida`),
  KEY `fk_projetos_usuarios1` (`id_gerente`),
  KEY `fk_projetos_cliente1` (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
  `id_questao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pergunta` text NOT NULL,
  `ativo` int(11) DEFAULT '0',
  `id_atividade` int(11) NOT NULL,
  `ultima_alteracao` int(11) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`id_questao`),
  KEY `fk_questoes_atividades1` (`id_atividade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1466 ;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id_questao`, `nome_pergunta`, `ativo`, `id_atividade`, `ultima_alteracao`, `id_tipo`, `id_disciplina`) VALUES
(1454, 'teste', 1, 1, 1367867498, 1, 1),
(1455, 'teste', 1, 1, 1367867689, 1, 1),
(1456, 'QUem é o mestre?', 1, 255, 1367868404, 1, 1),
(1457, 'Oi eu sou o Goku!!!', 1, 1, 1367868525, 1, 1),
(1458, 'teste dois', 1, 255, 1367868996, 1, 1),
(1459, 'sasasas', 1, 1, 1367870472, 1, 1),
(1460, 'sssssssss', 1, 255, 1367870624, 1, 1),
(1461, 'NOVO TESTE FASE', 1, 257, 1367870769, 1, 2),
(1462, 'hhhhhhhhhh', 1, 255, 1368035022, 1, 1),
(1463, 'opaaa', 1, 258, 1368035404, 2, 2),
(1464, 'kkkkkkkkkkkkkkkkkkkkkkk', 1, 1, 1368037140, 1, 1),
(1465, 'bgbgbgbgb', 1, 1, 1368125320, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `segmento_mercado`
--

CREATE TABLE IF NOT EXISTS `segmento_mercado` (
  `id_segmento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_segmento` varchar(500) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  `ultima_alteracao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_segmento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `segmento_mercado`
--

INSERT INTO `segmento_mercado` (`id_segmento`, `nome_segmento`, `ativo`, `ultima_alteracao`) VALUES
(1, 'Teste 1', 1, 2013),
(2, 'Teste segmento', 1, 2013),
(3, 'Empresa estatual ', 0, 1366076600),
(4, 'sdaasd ', 0, 1366076608),
(5, 'Agricultura er ', 0, 1366076583),
(6, 'Telefonia ', 0, 1365451940),
(7, 'jÃ£o', 1, 1366138735);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnologia`
--

CREATE TABLE IF NOT EXISTS `tecnologia` (
  `id_tecnologia` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tecnologia` varchar(500) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  `ultima_alteracao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tecnologia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tecnologia`
--

INSERT INTO `tecnologia` (`id_tecnologia`, `nome_tecnologia`, `ativo`, `ultima_alteracao`) VALUES
(1, 'JAVA', 1, 1365699413),
(2, 'Dot Net  ', 1, 1365715232);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_auditorias`
--

CREATE TABLE IF NOT EXISTS `tipo_auditorias` (
  `id_tipo_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(200) NOT NULL DEFAULT '',
  `ativo` int(11) DEFAULT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_auditoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tipo_auditorias`
--

INSERT INTO `tipo_auditorias` (`id_tipo_auditoria`, `nome_tipo`, `ativo`, `ultima_alteracao`) VALUES
(1, 'Auditoria de final de fase', 1, '0000-00-00 00:00:00'),
(2, 'Auditoria de produto!', 1, '0000-00-00 00:00:00'),
(3, 'adsdasda', 1, '0000-00-00 00:00:00'),
(4, 'sdadsad', 1, '0000-00-00 00:00:00'),
(5, 'dasdada', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_projeto`
--

CREATE TABLE IF NOT EXISTS `tipo_projeto` (
  `id_tipo_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(250) NOT NULL DEFAULT '',
  `ativo` int(11) DEFAULT NULL,
  `ultima_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_projeto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tipo_projeto`
--

INSERT INTO `tipo_projeto` (`id_tipo_projeto`, `nome_tipo`, `ativo`, `ultima_alteracao`) VALUES
(7, 'desc', 1, '0000-00-00 00:00:00'),
(8, 'tipo 2', 1, '0000-00-00 00:00:00'),
(9, 'tipo 3', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(250) NOT NULL DEFAULT '',
  `email_usuario` varchar(250) NOT NULL DEFAULT '',
  `ativo` int(11) NOT NULL DEFAULT '0',
  `perfil_usuario` int(11) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `login` varchar(150) DEFAULT NULL,
  `ultima_alteracao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `ativo`, `perfil_usuario`, `senha`, `login`, `ultima_alteracao`) VALUES
(12, 'Tito Paulo', 'titogrego@gmail.com', 1, 1, 'cf9ee5bcb36b4936dd7064ee9b2f139e', 'titogrego', 2013),
(13, 'teste ', 'teste@teste.com', 1, 1, 'cf9ee5bcb36b4936dd7064ee9b2f139e', 'teste', 1365538112),
(15, 'teste', 'tes@oi.com', 1, 2, 'sss', ' tes', 1365538100),
(16, 'dsd', 'tito@ooo.com', 0, 1, 'ss', ' dsd', 1365538150);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
