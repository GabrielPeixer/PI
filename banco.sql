-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema validahoras
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema validahoras
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `validahoras` DEFAULT CHARACTER SET utf8 ;
USE `validahoras` ;

-- -----------------------------------------------------
-- Table `validahoras`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `validahoras`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(100) NULL DEFAULT NULL,
  `senha` VARCHAR(100) NULL DEFAULT NULL,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `turma` VARCHAR(45) NULL DEFAULT NULL,
  `nivel` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `validahoras`.`horasalunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `validahoras`.`horasalunos` (
  `id_horas` INT(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` INT(11) NOT NULL,
  `modalidade` VARCHAR(15) NULL DEFAULT 'ensino',
  `titulo` VARCHAR(200) NULL DEFAULT NULL,
  `arquivo` LONGBLOB NULL DEFAULT NULL,
  `descricao` LONGTEXT NULL DEFAULT NULL,
  `status` VARCHAR(20) NULL DEFAULT 'aguardando',
  `dataCadastro` DATETIME NULL DEFAULT NULL,
  `horas` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_horas`),
  INDEX `id_usuario` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `id_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `validahoras`.`usuarios` (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 511
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `validahoras`.`reconsidera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `validahoras`.`reconsidera` (
  `id_reconcideracao` INT(11) NOT NULL AUTO_INCREMENT,
  `motivo` LONGTEXT NULL DEFAULT NULL,
  `id_horas` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_reconcideracao`),
  INDEX `id_horas` (`id_horas` ASC) VISIBLE,
  CONSTRAINT `id_horas`
    FOREIGN KEY (`id_horas`)
    REFERENCES `validahoras`.`horasalunos` (`id_horas`))
ENGINE = InnoDB
AUTO_INCREMENT = 153
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
