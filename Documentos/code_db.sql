--------------------------Data base code--------------------------

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


CREATE SCHEMA IF NOT EXISTS `4whelss` DEFAULT CHARACTER SET utf8mb3 ;
USE `4whelss` ;


CREATE TABLE IF NOT EXISTS `4whelss`.`marcas` (
  `id_marca` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id_marca`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8mb3;


CREATE TABLE IF NOT EXISTS `4whelss`.`carros` (
  `chassi` INT NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(50) NOT NULL,
  `valor_aluguel` INT NOT NULL,
  `quilometros_rodados` VARCHAR(45) NOT NULL,
  `id_marca` INT NOT NULL,
  PRIMARY KEY (`chassi`),
  INDEX `fk_carros_marcas_idx` (`id_marca` ASC) VISIBLE,
  CONSTRAINT `fk_carros_marcas`
    FOREIGN KEY (`id_marca`)
    REFERENCES `4whelss`.`marcas` (`id_marca`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb3;


CREATE TABLE IF NOT EXISTS `4whelss`.`users` (
  `email` VARCHAR(150) NOT NULL,
  `user_name` VARCHAR(150) NOT NULL,
  `pass` VARCHAR(24) NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


CREATE TABLE IF NOT EXISTS `4whelss`.`alugueis` (
  `id_aluguel` INT NOT NULL AUTO_INCREMENT,
  `data_aluguel` DATETIME NOT NULL,
  `prazo_aluguel` DATETIME NOT NULL,
  `users_email` VARCHAR(150) NOT NULL,
  `carros_id_carros` INT NOT NULL,
  PRIMARY KEY (`id_aluguel`),
  INDEX `fk_alugueis_users1_idx` (`users_email` ASC) VISIBLE,
  INDEX `fk_alugueis_carros1_idx` (`carros_id_carros` ASC) VISIBLE,
  CONSTRAINT `fk_alugueis_carros1`
    FOREIGN KEY (`carros_id_carros`)
    REFERENCES `4whelss`.`carros` (`chassi`),
  CONSTRAINT `fk_alugueis_users1`
    FOREIGN KEY (`users_email`)
    REFERENCES `4whelss`.`users` (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

--------------------------Data base inserts--------------------------

INSERT INTO `marcas`(`id_marca`, `nome`) VALUES (NULL,'Toyota');
INSERT INTO `marcas`(`id_marca`, `nome`) VALUES (NULL,'Chevrolet');
INSERT INTO `marcas`(`id_marca`, `nome`) VALUES (NULL,'Bugatti');
INSERT INTO `marcas`(`id_marca`, `nome`) VALUES (NULL,'Honda');
INSERT INTO `marcas`(`id_marca`, `nome`) VALUES (NULL,'McLaren');
INSERT INTO `marcas`(`id_marca`, `nome`) VALUES (NULL,'Hyundai');
INSERT INTO `marcas`(`id_marca`, `nome`) VALUES (NULL,'VolksWagen');


