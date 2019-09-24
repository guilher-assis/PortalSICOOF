SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `qa` ;
CREATE SCHEMA IF NOT EXISTS `qa` DEFAULT CHARACTER SET utf8 ;
USE `qa` ;

-- -----------------------------------------------------
-- Table `qa`.`auditoria_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`auditoria_status` ;

CREATE  TABLE IF NOT EXISTS `qa`.`auditoria_status` (
  `id_status` INT NOT NULL AUTO_INCREMENT ,
  `nome_status` VARCHAR(250) NOT NULL DEFAULT '' ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_status`) )
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`tecnologia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`tecnologia` ;

CREATE  TABLE IF NOT EXISTS `qa`.`tecnologia` (
  `id_tecnologia` INT NOT NULL ,
  `nome_tecnologia` VARCHAR(500) NULL DEFAULT NULL ,
  `ativo` INT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_tecnologia`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `qa`.`tipo_projeto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`tipo_projeto` ;

CREATE  TABLE IF NOT EXISTS `qa`.`tipo_projeto` (
  `id_tipo_projeto` INT NOT NULL AUTO_INCREMENT ,
  `nome_tipo` VARCHAR(250) NOT NULL DEFAULT '' ,
  `ativo` INT(11) NULL DEFAULT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_tipo_projeto`) )
ENGINE = MyISAM
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`ciclo_vida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`ciclo_vida` ;

CREATE  TABLE IF NOT EXISTS `qa`.`ciclo_vida` (
  `id_ciclo_vida` INT NOT NULL ,
  `nome_ciclo_vida` VARCHAR(250) NULL DEFAULT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_ciclo_vida`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `qa`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `qa`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT ,
  `nome_usuario` VARCHAR(250) NOT NULL DEFAULT '' ,
  `email_usuario` VARCHAR(250) NOT NULL DEFAULT '' ,
  `ativo` INT NOT NULL DEFAULT '0' ,
  `perfil_usuario` INT NULL ,
  `senha` VARCHAR(100) NULL ,
  `login` VARCHAR(150) NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = MyISAM
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`segmento_mercado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`segmento_mercado` ;

CREATE  TABLE IF NOT EXISTS `qa`.`segmento_mercado` (
  `id_segmento` INT NOT NULL ,
  `nome_segmento` VARCHAR(500) NULL ,
  `ativo` INT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_segmento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `qa`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`cliente` ;

CREATE  TABLE IF NOT EXISTS `qa`.`cliente` (
  `id_cliente` INT NOT NULL ,
  `nome_cliente` VARCHAR(500) NULL ,
  `ativo` INT NULL ,
  `segmento_mercado` VARCHAR(500) NULL ,
  `descricao` VARCHAR(500) NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  `id_segmento` INT NOT NULL ,
  PRIMARY KEY (`id_cliente`) ,
  INDEX `fk_cliente_segmento_mercado1` (`id_segmento` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `qa`.`projetos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`projetos` ;

CREATE  TABLE IF NOT EXISTS `qa`.`projetos` (
  `id_projeto` INT NOT NULL AUTO_INCREMENT ,
  `nome_projeto` VARCHAR(500) NOT NULL DEFAULT '' ,
  `ativo` INT NOT NULL DEFAULT '0' ,
  `data_inicio` DATE NULL DEFAULT NULL ,
  `data_fim` DATE NULL DEFAULT NULL ,
  `id_tecnologia` INT(11) NOT NULL ,
  `id_tipo_projeto` INT NOT NULL ,
  `id_ciclo_vida` INT NOT NULL ,
  `id_gerente` INT NOT NULL ,
  `id_cliente` INT NOT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_projeto`) ,
  INDEX `fk_projetos_tecnologia1` (`id_tecnologia` ASC) ,
  INDEX `fk_projetos_tipo_projeto1` (`id_tipo_projeto` ASC) ,
  INDEX `fk_projetos_ciclo_vida1` (`id_ciclo_vida` ASC) ,
  INDEX `fk_projetos_usuarios1` (`id_gerente` ASC) ,
  INDEX `fk_projetos_cliente1` (`id_cliente` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 200
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`tipo_auditorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`tipo_auditorias` ;

CREATE  TABLE IF NOT EXISTS `qa`.`tipo_auditorias` (
  `id_tipo_auditoria` INT NOT NULL AUTO_INCREMENT ,
  `nome_tipo` VARCHAR(20) NOT NULL DEFAULT '' ,
  `ativo` INT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_tipo_auditoria`) )
ENGINE = MyISAM
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`discliplinas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`discliplinas` ;

CREATE  TABLE IF NOT EXISTS `qa`.`discliplinas` (
  `id_disciplina` INT NOT NULL AUTO_INCREMENT ,
  `id_tipo_auditoria` INT NOT NULL ,
  `nome_disciplina` VARCHAR(100) NOT NULL DEFAULT '' ,
  `ativo` INT NULL ,
  PRIMARY KEY (`id_disciplina`) ,
  INDEX `fk_discliplinas_tipo_auditorias1` (`id_tipo_auditoria` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 114
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`produtos_trabalho`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`produtos_trabalho` ;

CREATE  TABLE IF NOT EXISTS `qa`.`produtos_trabalho` (
  `id_produto_trabalho` INT NOT NULL AUTO_INCREMENT ,
  `nome_produto` VARCHAR(100) NOT NULL DEFAULT '' ,
  `ativo` INT NULL DEFAULT '1' ,
  `id_disciplina` INT NOT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_produto_trabalho`) ,
  INDEX `fk_produtos_trabalho_discliplinas1` (`id_disciplina` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 47
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`pontos_positivos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`pontos_positivos` ;

CREATE  TABLE IF NOT EXISTS `qa`.`pontos_positivos` (
  `id_pontos_positivos` INT NOT NULL DEFAULT '0' ,
  `pontos_positivos` VARCHAR(1000) NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_pontos_positivos`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`auditoria_fase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`auditoria_fase` ;

CREATE  TABLE IF NOT EXISTS `qa`.`auditoria_fase` (
  `id_fase_auditoria` INT NOT NULL DEFAULT '0' ,
  `nome_fase` VARCHAR(50) NOT NULL DEFAULT '' ,
  `ativo` INT NULL DEFAULT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_fase_auditoria`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`planejamento_auditorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`planejamento_auditorias` ;

CREATE  TABLE IF NOT EXISTS `qa`.`planejamento_auditorias` (
  `id_auditoria` INT NOT NULL AUTO_INCREMENT ,
  `observacao_auditoria` VARCHAR(500) NOT NULL ,
  `id_fase_configuracao` INT(2) NULL DEFAULT NULL ,
  `data_planejada` DATETIME NULL DEFAULT NULL ,
  `data_realizada` DATE NULL DEFAULT NULL ,
  `id_projeto` INT NOT NULL ,
  `id_status_auditoria` INT NOT NULL ,
  `id_responsavel` INT NOT NULL ,
  `id_produto_trabalho` INT NOT NULL ,
  `id_tipo_auditoria` INT NOT NULL ,
  `id_pontos_positivos` INT NOT NULL ,
  `id_fase_auditoria` INT NOT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_auditoria`) ,
  INDEX `fk_planejamento_auditorias_projetos` (`id_projeto` ASC) ,
  INDEX `fk_planejamento_auditorias_auditoria_status1` (`id_status_auditoria` ASC) ,
  INDEX `fk_planejamento_auditorias_usuarios1` (`id_responsavel` ASC) ,
  INDEX `fk_planejamento_auditorias_produtos_trabalho1` (`id_produto_trabalho` ASC) ,
  INDEX `fk_planejamento_auditorias_tipo_auditorias1` (`id_tipo_auditoria` ASC) ,
  INDEX `fk_planejamento_auditorias_pontos_positivos1` (`id_pontos_positivos` ASC) ,
  INDEX `fk_planejamento_auditorias_auditoria_fase1` (`id_fase_auditoria` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 1082
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`criterios_produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`criterios_produtos` ;

CREATE  TABLE IF NOT EXISTS `qa`.`criterios_produtos` (
  `id_produto_trabalho` INT NOT NULL ,
  `id_criterio` INT NOT NULL AUTO_INCREMENT ,
  `criterio` VARCHAR(1000) NULL DEFAULT NULL ,
  `ativo` VARCHAR(45) NULL DEFAULT '1' ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_criterio`) ,
  INDEX `fk_criterios_produtos_produtos_trabalho1` (`id_produto_trabalho` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 221
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `qa`.`atividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`atividades` ;

CREATE  TABLE IF NOT EXISTS `qa`.`atividades` (
  `id_atividade` INT NOT NULL AUTO_INCREMENT ,
  `id_disciplina` INT NOT NULL ,
  `nome_atividade` VARCHAR(150) NOT NULL DEFAULT '' ,
  `ativo` INT NULL DEFAULT '1' ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_atividade`) ,
  INDEX `fk_atividades_discliplinas1` (`id_disciplina` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 254
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`questoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`questoes` ;

CREATE  TABLE IF NOT EXISTS `qa`.`questoes` (
  `id_questao` INT NOT NULL AUTO_INCREMENT ,
  `id_fase_auditoria` INT NOT NULL DEFAULT '0' ,
  `nome_pergunta` TEXT NOT NULL ,
  `ativo` INT NULL DEFAULT '0' ,
  `id_atividade` INT NOT NULL ,
  `ultima_alteracao` TIMESTAMP NULL ,
  PRIMARY KEY (`id_questao`) ,
  INDEX `fk_questoes_atividades1` (`id_atividade` ASC) )
ENGINE = MyISAM
AUTO_INCREMENT = 1454
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `qa`.`auditoria_resultado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `qa`.`auditoria_resultado` ;

CREATE  TABLE IF NOT EXISTS `qa`.`auditoria_resultado` (
  `id_resultado` INT NOT NULL AUTO_INCREMENT ,
  `id_auditoria` INT NOT NULL ,
  `tipo_auditoria` VARCHAR(500) NULL ,
  `disciplina` VARCHAR(500) NULL ,
  `atividade` VARCHAR(500) NULL ,
  `questao` VARCHAR(500) NULL ,
  `resposta` VARCHAR(45) NULL ,
  `observacao` VARCHAR(500) NULL ,
  PRIMARY KEY (`id_resultado`) ,
  INDEX `fk_auditoria_resultado_planejamento_auditorias1` (`id_auditoria` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2123
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
