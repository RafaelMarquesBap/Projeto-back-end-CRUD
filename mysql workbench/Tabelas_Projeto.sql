-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- Schema db_Usuario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_Usuario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_Usuario` DEFAULT CHARACTER SET utf8mb3 ;
USE `db_Usuario` ;
-- -----------------------------------------------------
-- Table `db_Usuario`.`Log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_Usuario`.`tb_Log` (
  `id_Log` INT NOT NULL,
  `DataLogin` DATETIME NOT NULL,
  `Tipo2FA` VARCHAR(45) NULL,
  `idUsuario` INT NOT NULL,
  `Status` VARCHAR(45) NULL,
  `Resposta` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Log`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_Usuario`.`Usuarios_has_Log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_Usuario`.`Usuarios_has_Log` (
  `idUsuario` INT NOT NULL,
  `d_Log` INT NOT NULL,
  `DataAcesso` DATETIME NULL,
  PRIMARY KEY (`idUsuario`, `d_Log`),
  INDEX `fk_Usuarios_has_Log_Log1_idx` (`d_Log` ASC) VISIBLE,
  INDEX `fk_Usuarios_has_Log_Usuarios_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Usuarios_has_Log_Usuarios`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `Projeto`.`Usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Log_Log1`
    FOREIGN KEY (`d_Log`)
    REFERENCES `Projeto`.`Log` (`id_Log`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = armscii8;



-- -----------------------------------------------------
-- Table `db_Usuario`.`tb_Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_Usuario`.`tb_Usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
	`Tipo_usuario` VARCHAR(10) NOT NULL DEFAULT 'C',
  `NomeCompleto` VARCHAR(80) NOT NULL,
  `DataNasc` DATE NOT NULL,
  `Sexo` VARCHAR(20) NOT NULL,
  `NomeMaterno` VARCHAR(100) NOT NULL,
  `CPF` VARCHAR(25) NOT NULL,
  `Telefone_Celular` VARCHAR(25) NOT NULL,
  `Telefone_Fixo` VARCHAR(25) NOT NULL,
  `CEP` INT NOT NULL,
  `Endereco` VARCHAR(255) NULL DEFAULT NULL,
  `Complemento` VARCHAR(100) NULL DEFAULT NULL,
  `Bairro` VARCHAR(50) NULL DEFAULT NULL,
  `Cidade` VARCHAR(50) NULL DEFAULT NULL,
  `UF` VARCHAR(50) NULL DEFAULT NULL,
  `Login` VARCHAR(6) NOT NULL,
  `Senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 99
DEFAULT CHARACTER SET = utf8mb3;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
