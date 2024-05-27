-- MySQL Workbench Forward Engineering

DROP DATABASE db_Usuario;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema db_Usuario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_Usuario` DEFAULT CHARACTER SET utf8mb3 ;
USE `db_Usuario` ;

-- -----------------------------------------------------
-- Table `db_Usuario`.`tb_Log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_Usuario`.`tb_Log` (
  `idLog` INT NOT NULL AUTO_INCREMENT,
  `DataLogin` DATETIME NULL DEFAULT NULL,
  `Tipo2FA` VARCHAR(45) NULL DEFAULT NULL,
  `idUsuario` INT NULL DEFAULT NULL,
  `Status` VARCHAR(45) NULL DEFAULT NULL,
  `Resposta2FA` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`idLog`))
ENGINE = InnoDB
AUTO_INCREMENT = 80
DEFAULT CHARACTER SET = utf8mb3;

-- -----------------------------------------------------
-- Table `db_Usuario`.`tb_Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_Usuario`.`tb_Usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Tipo_usuario` VARCHAR(2) NOT NULL DEFAULT 'C',
  `NomeCompleto` VARCHAR(80) NULL DEFAULT NULL,
  `DataNasc` DATE NULL DEFAULT NULL,
  `Sexo` VARCHAR(20) NULL DEFAULT NULL,
  `NomeMaterno` VARCHAR(100) NULL DEFAULT NULL,
  `CPF` VARCHAR(25) NULL DEFAULT NULL,
  `Telefone_Celular` VARCHAR(25) NULL DEFAULT NULL,
  `Telefone_Fixo` VARCHAR(25) NULL DEFAULT NULL,
  `CEP` INT NULL DEFAULT NULL,
  `Endereco` VARCHAR(255) NULL DEFAULT NULL,
  `Numero` INT NULL DEFAULT NULL,
  `Complemento` VARCHAR(100) NULL DEFAULT NULL,
  `Bairro` VARCHAR(50) NULL DEFAULT NULL,
  `Cidade` VARCHAR(50) NULL DEFAULT NULL,
  `UF` VARCHAR(50) NULL DEFAULT NULL,
  `Login` VARCHAR(6) NOT NULL,
  `Senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

TRUNCATE TABLE tb_Usuarios;
TRUNCATE TABLE tb_Log;

INSERT INTO `db_Usuario`.`tb_Usuarios` (
  `idUsuario`, 
  `Tipo_usuario`, 
  `NomeCompleto`, 
  `DataNasc`, 
  `Sexo`, 
  `NomeMaterno`, 
  `CPF`, 
  `Telefone_Celular`, 
  `Telefone_Fixo`, 
  `CEP`, 
  `Endereco`, 
  `Numero`, 
  `Complemento`, 
  `Bairro`, 
  `Cidade`, 
  `UF`, 
  `Login`, 
  `Senha`
) 
VALUES (
  1, 
  'M', 
  'Master', 
  '2024-04-24', 
  NULL, 
  'Astrogilda', 
  NULL, 
  NULL, 
  NULL, 
  12345678, 
  NULL, 
  NULL, 
  NULL, 
  NULL, 
  NULL, 
  NULL, 
  'admin1', 
  'admin123'
);
